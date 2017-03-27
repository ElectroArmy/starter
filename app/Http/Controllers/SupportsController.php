<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SupportWasSent;
use App\Http\Requests\SupportRequest;

class SupportsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('supports.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param SupportRequest $request
     * @return \Illuminate\Http\Response
     * @internal param $
     */
    public function store(SupportRequest $request)
    {

        $data = $request->all();

        event(new SupportWasSent($data));

        return redirect('/admin/products');


    }
}
