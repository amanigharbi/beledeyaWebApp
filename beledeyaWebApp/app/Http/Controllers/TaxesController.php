<?php

namespace App\Http\Controllers;

use App\Taxes;
use Illuminate\Http\Request;

class TaxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taxes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function show(Taxes $taxes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function edit(Taxes $taxes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taxes $taxes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taxes $taxes)
    {
        //
    }
}
