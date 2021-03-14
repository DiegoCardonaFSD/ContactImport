<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessImportStoreRequest;
use App\Imports\FilesImport;
use App\Jobs\NotifyUserOfCompletedImport;
use App\Models\File;
use App\Notifications\FileProcessFinished;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProcessImportController extends Controller
{
    private const status = "PROCESSING";
    /**
     * @param ProcessImportStoreRequest $request
     */
    public function store(ProcessImportStoreRequest $request){
        $file = File::find($request->input('id'));
        $file->status = self::status;
        $file->save();

        $fields = config('import.fields');
        foreach ($fields as $key => $value){
            $fields[$request->input("option_$key")] = $key;
        }

        $fileImport = new FilesImport($file, $fields);
        $fileImport->queue($file->path)->chain([
            new NotifyUserOfCompletedImport(Auth::user())
        ]);

        return redirect(route('contacts-import.index'))->with('message', trans('contacts.send_message'));

    }

}
