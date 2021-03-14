<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessImportStoreRequest;
use App\Imports\FilesImport;
use App\Jobs\NotifyUserOfCompletedImport;
use App\Models\File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;


class ProcessImportController extends Controller
{
    /** @var string status */
    private const status = "PROCESSING";

    /**
     * @param ProcessImportStoreRequest $request
     * @return Application|RedirectResponse|Redirector
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
