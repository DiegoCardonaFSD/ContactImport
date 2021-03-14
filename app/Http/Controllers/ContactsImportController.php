<?php

namespace App\Http\Controllers;

use App\Imports\FilesImport;
use App\Models\File;
use Facade\FlareClient\Stacktrace\File as FileReader;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use SplFileObject;


class ContactsImportController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(){
        $files = File::where('user_id', Auth::id())->paginate(20);
        return view('contacts.imports.index', compact('files'));
    }

    public function show(File $file){
        $contacts = $file->contacts()->paginate(20);
        return view('contacts.imports.show', [
            'file' => $file,
            'contacts' => $contacts,
            ]);
    }

    public function create(){
        return view('contacts.imports.create');
    }

    public function store(Request $request){
        $filePath = $request->file('file')->store('import');

        $file = new File();
        $file->user_id = Auth::id();
        $file->path = $filePath;
        $file->save();

        $fileReader = new FileReader(storage_path('app/'.$filePath));


        return view('contacts.imports.preview.show', [
            'file' =>  $file,
            'data' => explode(',', $fileReader->getLine(1)),
            'fields' => config('import.fields')
        ]);
    }
}
