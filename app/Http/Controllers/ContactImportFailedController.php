<?php

namespace App\Http\Controllers;

use App\Models\FailedContact;
use App\Models\File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ContactImportFailedController extends Controller
{
    /**
     * @param File $file
     * @return Application|Factory|View
     */
    public function index(File $file){
        $failedContacts = FailedContact::where('file_id', $file->id)->paginate(20);

        return view('contacts.imports.failed.index', [
            'file' => $file,
            'failed_contacts' => $failedContacts,
        ]);
    }

    public function show(FailedContact $failedContact){
        return view('contacts.imports.failed.show', ['failed_contact' => $failedContact]);
    }
}
