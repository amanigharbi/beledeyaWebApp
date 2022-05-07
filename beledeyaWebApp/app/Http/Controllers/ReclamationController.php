<?php

namespace App\Http\Controllers;

use App\reclamation;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

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
        $rec=null;
        return view('reclamation',compact('rec'));
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
            $digits_needed = 8;

            $num_rec = ''; // set up a blank string

            $count = 0;

            while ($count < $digits_needed) {
                $random_digit = mt_rand(0, 9);

                $num_rec .= $random_digit;
                $count++;
            }

            $result['num_rec'] = $num_rec;

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

    public function check(Request $request)
    {
        $data = $request->validate($this->checkValid());
            $rec = Reclamation::where([['num_rec', $data['numRec']], ['cin', $data['cin']]])->first();
            if(!$rec){
                
                return back()->with('error', 'Réclamation not found');
            }
            return view('reclamation',compact('rec'));
            try {
            } catch (\Throwable $th) {
            return back()->with('error', 'something went wrong');
        }
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

    private function checkValid()
    {
        return [
            'cin' => 'required|numeric:8',
            'numRec' => 'required|numeric:8',
        ];
    }
}
