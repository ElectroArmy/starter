<?php

namespace App\Http\Controllers;

use App\Events\ContactWasSent;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactFormRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request)
    {
        $data = $request->all();

        event(new ContactWasSent($data));

        return redirect('/admin/products');


    }
}
