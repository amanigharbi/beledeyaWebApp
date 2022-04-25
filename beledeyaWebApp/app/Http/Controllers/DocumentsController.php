<?php

namespace App\Http\Controllers;

use App\Documents;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doc = Documents::all();
        return view('admin.document', compact('doc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $doc = Documents::all();
        return view('documents', compact('doc'));
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
        $curTime = new \DateTime();
        $result['date']=$curTime->format("Y-m-d H:i:s");
        try {
            Documents::create($result);
            return back()->with('success', 'Document add!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Opss! something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function show(Documents $documents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function edit(Documents $documents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documents $documents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documents $documents,$docID)
    {
        try {
            $documents = Documents::findOrFail($docID);
            $documents->save();

            return back()->with('success', 'Category deleted!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Ops category not found!');
        }
    }
    private function validationRules()
    {
        return [
            'name' => 'required|string',
            'file' => 'required',
            
        ];
    }
}
