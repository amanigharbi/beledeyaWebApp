<?php

namespace App\Http\Controllers;

use App\reclamation;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recs = Reclamation::all();
        return view('admin.reclamation', compact('recs'));
    }
    public function reclamation()
    {
        $rec = reclamation::all();
        return view('reclamation', compact('rec'));
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
            //Check if there's a photo
            if (isset($request['photo'])) {
                $result['photo'] = $request['photo']->store('uploads', 'public');
            }

            //Check if request has email
            if (isset($request['email'])) {
                $result['email'] = $request['email'];
            }

            //Check if request has adresse
            if (isset($request['adresse'])) {
                $result['adresse'] = $request['adresse'];
            }

            reclamation::create($result);
            return back()->with('success', 'Réclamation ajoutée!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Vérifier!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function show(reclamation $reclamation)
    {
        if ($reclamation->status == "0") {
            //Mark as seen
            $reclamation->status = "1";
            $reclamation->save();
            $reclamation->status = "0";
        }
        return view('admin.reclamationPreview', compact('reclamation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function edit(reclamation $reclamation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reclamation $reclamation)
    {
        try {
            $reclamation->status = "2";
            $reclamation->save();
            return back()->with('success', 'Marked as resolved');
        } catch (\Throwable $th) {
            return back()->with('error', 'Opss! something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function destroy(reclamation $reclamation)
    {
        //
    }
    private function validationRules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'cin' => 'required|numeric:8',
            'type' => 'required',
            'sujet' => 'required|string',
        ];
    }
}
