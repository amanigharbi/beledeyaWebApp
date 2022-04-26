<?php

namespace App\Http\Controllers;

use App\ReseauPublic;
use Illuminate\Http\Request;

class ReseauPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = ReseauPublic::all();
        return view('admin.ReseauPublic', compact('res'));
        
    }
    public function showView(){
        return view('ReseauPublic');
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
        $result = $request->validate($this->validationRules());
        try {
          

            //Check if request has email
            if (isset($request['email'])) {
                $result['email'] = $request['email'];
            }

         

            ReseauPublic::create($result);
            return back()->with('success', 'demande ajoutée!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Vérifier!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReseauPublic  $reseauPublic
     * @return \Illuminate\Http\Response
     */
    public function show(ReseauPublic $reseau)
    {
        if ($reseau->status == "0") {
            //Mark as seen
            $reseau->status = "1";
            $reseau->save();
            $reseau->status = "0";
        }
        return view('admin.reseauPublicPreview', compact('reseau'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReseauPublic  $reseauPublic
     * @return \Illuminate\Http\Response
     */
    public function edit(ReseauPublic $reseauPublic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReseauPublic  $reseauPublic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReseauPublic $reseauPublic)
    {
        try {
            $reseauPublic->status = "2";
            $reseauPublic->save();
            return back()->with('success', 'Marked as resolved');
        } catch (\Throwable $th) {
            return back()->with('error', 'Opss! something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReseauPublic  $reseauPublic
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReseauPublic $reseauPublic)
    {
        //
    }
    private function validationRules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email'=>'required',
            'cin' => 'required|numeric:8',
            'adresse' =>'required',
            'type' => 'required',
            'description' => 'string',
        ];
    }
}
