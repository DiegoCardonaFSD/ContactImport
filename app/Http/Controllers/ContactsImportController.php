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
        $files = File::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(20);
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

        $fileReader = new FileReader(storage_path('app/'.$filePath));

        if($fileReader->numberOfLines() == 0 ||
            ($fileReader->numberOfLines() == 1 && $fileReader->getLine(1) == "")){
            return redirect(route('contacts-import.index'))->with('error', trans('contacts.file_empty'));
        }

        $file = new File();
        $file->user_id = Auth::id();
        $file->path = $filePath;
        $file->save();

        return view('contacts.imports.preview.show', [
            'file' =>  $file,
            'data' => explode(',', $fileReader->getLine(1)),
            'fields' => config('import.fields')
        ]);
    }
}
