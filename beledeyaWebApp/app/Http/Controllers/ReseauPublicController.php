<?php

namespace App\Http\Controllers;

use App\ReseauPublic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

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
        $user =User::all();
        return view('admin.ReseauPublic', compact('res','user'));
        
    }
    public function showView(){
        
        $res = ReseauPublic::where('UserId', Auth::user()->id)->get();

        return view('ReseauPublic', compact('res'));
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
try{

            //Check if request has email
            if (isset($request['email'])) {
                $result['email'] = $request['email'];
            }
           
                $user =Auth::user();
            $result['UserId'] = $user->id;
            
            $digits_needed = 8;

            $num_branch = ''; // set up a blank string

            $count = 0;

            while ($count < $digits_needed) {
                $random_digit = mt_rand(0, 9);

                $num_branch .= $random_digit;
                $count++;
            }

            $result['num_branch'] = $num_branch;

         

            $reseauPublic=   ReseauPublic::create($result);
            session(['resId' => $reseauPublic->id]);
            return back()->with('success', 'demande de branchement aux réseaux publics ajoutée! télécharger votre décharge');
               
                  } catch (\Throwable $th) {
            return back()->with('error', 'Vérifier!');
        }
    }
    public function down($id){
        $reseauPublic=ReseauPublic::findOrFail($id);
        $data = [
            'title' => 'Demande du branchement réseaux public',
            'logo'=> 'assets/images/logo.png',
            'adr' => $reseauPublic['adresse'],
            'nom'=> $reseauPublic['last_name'] ,
            'prenom'=> $reseauPublic['first_name'] ,
            'email'=>$reseauPublic['email'],
            'date' => $reseauPublic['created_at'],
            'num' => $reseauPublic['num_branch'] ,
            'type' => $reseauPublic['type'],
            'cin' => $reseauPublic['cin'],
            'des' => $reseauPublic['description'],
            'h3_title' =>'Numéro dossier: '.$reseauPublic['num_branch'],
            'p1' =>'Nous avons bien reçu votre demande de branchement aux réseau publics de type '.$reseauPublic['type'].' et de description '.$reseauPublic['description'].
            '. Nous essayons de vous répondre dès que possible.',
            'type_doc' => 'demande de branchement aux réseau publics  de : '.$reseauPublic['type'],
            'exist_doc' => true,
            

            
        ];
        session(['resId' => null]);
        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download($reseauPublic['last_name'].$reseauPublic['first_name'].'Demande.pdf');
            
     

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReseauPublic  $reseauPublic
     * @return \Illuminate\Http\Response
     */
    public function show(ReseauPublic $ReseauPublic)
    {
        if ($ReseauPublic->status == "0") {
            //Mark as seen
            $ReseauPublic->status = "1";
            $ReseauPublic->save();
            $ReseauPublic->status = "0";
        }
        
        return view('admin.reseauPublicPreview', compact('ReseauPublic'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\ReseauPublic  $reseauPublic
     * @return \Illuminate\Http\Response
     * 
     */
    public function edit(ReseauPublic $reseauPublic,$id)
    {
        try { 
        $reseauPublic = ReseauPublic::find($id);
        $reseauPublic->status = "3";
        $reseauPublic->save();
            return back()->with('success', 'Marked as rejected');
      
           } catch (\Throwable $th) {
            return back()->with('error', 'Opss! something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReseauPublic  $reseauPublic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReseauPublic $reseauPublic,$id)
    {
        
        try {  
            
            $reseauPublic = ReseauPublic::find($id);
            $reseauPublic->status = "2";
            $reseauPublic->save();

           
            return back()->with('success', 'Marked as accepted');
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
