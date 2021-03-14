<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(){
        $contacts = Contact::where('user_id', Auth::id())->paginate(20);
        return view('contacts.index', compact('contacts'));
    }

    /**
     * @param Contact $contact
     * @return Application|Factory|View
     */
    public function show(Contact $contact){
        return view('contacts.show', compact('contact'));
    }
}
