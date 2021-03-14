<?php

namespace App\Imports;

use App\Http\Helpers;
use App\Models\Contact;
use App\Models\FailedContact;
use App\Models\File;
use App\Rules\CheckCardFranchise;
use App\Rules\CheckContactUnique;
use App\Rules\CheckPhoneFormat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class FilesImport implements ToModel,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure,
    WithBatchInserts,
    WithChunkReading,
    ShouldQueue,
    WithEvents
{
    use Importable, SkipsErrors, RegistersEventListeners;

    private File $file;

    private array $fields;


    /**
     * FilesImport constructor.
     * @param File $file
     * @param array $fields
     */
    public function __construct(File $file, array $fields)
    {
        $this->file = $file;
        $this->fields = $fields;
    }


    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        return new Contact([
            'name' => $row[$this->fields[0]],
            'date_of_birth' => $row[$this->fields[1]],
            'phone' => $row[$this->fields[2]],
            'address' => $row[$this->fields[3]],
            'card_token' => Helpers::getCardToken($row[$this->fields[4]]),
            'card_last_digits' => substr($row[$this->fields[4]],-4),
            'franchise' => Helpers::getFranchise($row[$this->fields[4]]),
            'email' => $row[$this->fields[5]],
            'file_id' => $this->file->id,
        ]);
    }

    /**
     * @param Throwable $error
     */
    public function onError(Throwable $error)
    {

    }

    public function rules(): array
    {

        return [
            '*.'.$this->fields[0] => ['required', 'string', 'regex:/^[a-zA-Z -]*$/'],
            '*.'.$this->fields[1] => ['required','date_multi_format:"Y-m-d","Ymd"'],
            '*.'.$this->fields[2] => ['required', new CheckPhoneFormat()],
            '*.'.$this->fields[3] => ['required'],
            '*.'.$this->fields[4] => ['required', new CheckCardFranchise()],
            '*.'.$this->fields[5] => ['required','email',new CheckContactUnique($this->file)],
        ];

    }

    public function onFailure(Failure ...$failures)
    {

        $errors = [];
        collect($failures)->each(function($failure) use (&$errors) {

            if(isset($errors[$failure->row()])){
                $messages = $errors[$failure->row()]['messages'];
                array_push($messages, $failure->errors()[0]);
                $current['record'] = implode(",", $failure->values());
                $errors[$failure->row()]['messages'] = $messages;
            }else{
                $current['record'] = implode(",", $failure->values());
                $current['messages'] = [$failure->errors()[0]];
                $current['row'] = $failure->row();
                $errors[$failure->row()] = $current;
            }

        });

        foreach ($errors as $error){
            $failedContact = new FailedContact();
            $failedContact->row = $error['row'];
            $failedContact->record = $error['record'];
            $failedContact->messages = $error['messages'];
            $failedContact->file_id = $this->file->id;
            $failedContact->save();
        }


    }

    /**
     * @return int
     */
    public function batchSize(): int
    {
        return 20;
    }

    /**
     * @return int
     */
    public function chunkSize(): int
    {
        return 20;
    }


}
