<?php

namespace App\Http\Controllers;

use App\PermisConstruction;
use Illuminate\Http\Request;
use PDF;
class PermisConstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permis = PermisConstruction::all();
        return view('admin.PermisConstruction', compact('permis'));
    }
    public function autorisationBatir()
    {
        $autorisation=null;
        return view('PermisConstruction',compact('autorisation'));
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

          
            $digits_needed = 8;

            $num_autor = ''; // set up a blank string

            $count = 0;

            while ($count < $digits_needed) {
                $random_digit = mt_rand(0, 9);

                $num_autor .= $random_digit;
                $count++;
            }

            $result['num_autor'] = $num_autor;

           $permisConstruction= PermisConstruction::create($result);    
            
            

            session(['permisConsId' => $permisConstruction->id]);
              return back()->with('success','Demande de batir ajoutée. Merci de télécharger votre décharge');  
             } catch (\Throwable $th) {
            return back()->with('error', 'Vérifier!');
        }
        }
        public function down($id){
            $permisConstruction=PermisConstruction::findOrFail($id);
            $data = [
                'title' => 'Autorisation de batir',
                'logo'=> 'assets/images/logo.png',
                'adr' => $permisConstruction['adresse'],
                'nom'=> $permisConstruction['last_name'] ,
                'prenom'=> $permisConstruction['first_name'] ,
                'email'=>$permisConstruction['email'],
                'date' => $permisConstruction['created_at'],
                'num' => $permisConstruction['num_autor'] ,
                'type' => '',
                'cin' => $permisConstruction['cin'],
                'des' => '',
                'h3_title' =>'Numéro de demande d`autoriation de batir: '.$permisConstruction['num_autor'],
                'p1' =>'Nous avons bien reçu votre demande d`autoriation de batir de surface '.$permisConstruction['surface'].' Nous essayons de vous répondre dés que possible.',
                'type_doc' => ' demande d`autoriation de batir ',
                'exist_doc' =>true,
                

                
            ];
              
            // $pdf = PDF::loadView('myPDF', $data);
                session(['permisConsId' => null]);
                $pdf = PDF::loadView('myPDF', $data);
                return $pdf->download($permisConstruction['last_name'].$permisConstruction['first_name'].'Const.pdf');
    
        }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\PermisConstruction  $permisConstruction
     * @return \Illuminate\Http\Response
     */
    public function show(PermisConstruction $permisConstruction,$id)
    {
        $permisConstruction = PermisConstruction::find($id);
        if ($permisConstruction->status == "0") {
            //Mark as seen
            $permisConstruction->status = "1";
            $permisConstruction->save();
            $permisConstruction->status = "0";
        }
        return view('admin.PermisConstructionPreview', compact('permisConstruction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PermisConstruction  $permisConstruction
     * @return \Illuminate\Http\Response
     */
    public function edit(PermisConstruction $permisConstruction,$id)
    {
        try { 
            $permisConstruction = PermisConstruction::find($id);
            $permisConstruction->status = "3";
            $permisConstruction->save();
                return back()->with('success', 'Marked as rejected');
          
               } catch (\Throwable $th) {
                return back()->with('error', 'Opss! something went wrong');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PermisConstruction  $permisConstruction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PermisConstruction $permisConstruction,$id)
    {  
        try {  
            
            $permisConstruction = PermisConstruction::find($id);
            $permisConstruction->status = "2";
            $permisConstruction->save();

           
            return back()->with('success', 'Marked as accepted');
             } catch (\Throwable $th) {
            return back()->with('error', 'Opss! something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PermisConstruction  $permisConstruction
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermisConstruction $permisConstruction)
    {
        //
    }
    public function check(Request $request)
    {
        $data = $request->validate($this->checkValid());
            $autorisation = PermisConstruction::where([['num_autor', $data['num_autor']], ['cin', $data['cin']]])->first();
            if(!$autorisation){
                
                return back()->with('error', 'Demande de batir not found');
            }
            return view('PermisConstruction',compact('autorisation'));
            try {
            } catch (\Throwable $th) {
            return back()->with('error', 'something went wrong');
        }
    }
    private function validationRules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'cin' => 'required|numeric:8',
            'adresse' => 'required|string',
            'prop' => 'required',
            'surface' => 'required|string',
        ];
    }
    private function checkValid()
    {
        return [
            'cin' => 'required|numeric:8',
            'num_autor' => 'required|numeric:8',
        ];
    }
}
