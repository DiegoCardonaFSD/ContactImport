<?php

namespace App\Imports;

use App\Http\Helpers;
use App\Models\Contact;
use App\Models\FailedContact;
use App\Models\File;
use App\Rules\CheckCardFranchise;
use App\Rules\CheckPhoneFormat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class FilesImport implements ToModel, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors;

    private File $file;

    /**
     * FilesImport constructor.
     * @param File $file
     */
    public function __construct(File $file)
    {
        $this->file = $file;
    }


    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        return new Contact([
            'name' => $row[0],
            'date_of_birth' => $row[1],
            'phone' => $row[2],
            'address' => $row[3],
            'card_token' => Helpers::getCardToken($row[4]),
            'card_last_digits' => substr($row[4],-4),
            'franchise' => Helpers::getFranchise($row[4]),
            'email' => $row[5],
            'file_id' => $this->file->id,
            'user_id' => Auth::id(),
        ]);
    }

    /**
     * @param Throwable $error
     */
    public function onError(Throwable $error)
    {
        //todo: implements save errors
        //$failedContact = new FailedContact();
        dd($error);
    }

    public function rules(): array
    {

        return [
            '*.0' => ['required', 'string', 'regex:/^[a-zA-Z -]*$/'],
            '*.1' => ['required','date_multi_format:"Y-m-d","Ymd"'],
            '*.2' => ['required', new CheckPhoneFormat()],
            '*.3' => ['required'],
            '*.4' => ['required', new CheckCardFranchise()],
            '*.5' => ['required', 'email'], //todo: validar unico por cuenta
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        $messages = [];
        $row = 0;
        $record = '';

        collect($failures)->each(function($failure) use (&$messages, &$record, &$row) {

            $row = $failure->row();
            $record = implode(",", $failure->values());
            $messages[] = $failure->errors()[0];
        });

        $failedContact = new FailedContact();
        $failedContact->row = $row;
        $failedContact->record = $record;
        $failedContact->messages = $messages;
        $failedContact->file_id = $this->file->id;
        $failedContact->save();
    }
}
