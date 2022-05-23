<?php

namespace App\Http\Controllers;

use App\ReseauPublic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Carbon;
use Carbon\CarbonInterval;

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
            if(preg_match("/[a-zA-Z]/",$request['first_name'])
            and preg_match("/[a-zA-Z]/",$request['last_name'])
            and preg_match("/[a-zA-Z]/",$request['adresse'])
            and  preg_match("/[a-zA-Z]/",$request['description'])
            ){
                session(['resFrAng' => $reseauPublic->id]);
            }
        else{
            session(['resAr' => $reseauPublic->id]);
        }
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
            'doc1' => 'Une demande au nom de madame le maire, identifiable par signature sous la forme de plus d`un propriétaire ',
            'doc2' => 'Certificat de propriété ou contrat de vente',
            'doc3' => '',
            'doc4' => '',
            'doc5' => '',

            
        ];
        session(['resId' => null]);
        $pdf = PDF::loadView('pdf.myPDF', $data);

        return $pdf->download($reseauPublic['last_name'].$reseauPublic['first_name'].'Demande.pdf');
            
     

    }
    public function downArabic($id){
        $reseauPublic=ReseauPublic::findOrFail($id);
         $data = [
            'title' => 'طلب الاتصال بالشبكات العامة',
                'logo'=> 'assets/images/logo.png',
                'adr' => $reseauPublic['adresse'],
                'nom'=> $reseauPublic['last_name'] ,
                'prenom'=> $reseauPublic['first_name'] ,
                'email'=>$reseauPublic['email'],
                'date' =>$reseauPublic['created_at'],
                'num' => $reseauPublic['num_branch'] ,
                'type' => $reseauPublic['type'],
                'cin' => $reseauPublic['cin'],
                'des' => $reseauPublic['description'],
                'h3_title' =>'رقم الملف: '.$reseauPublic['num_branch'],
                'p1' => 'لقد تلقينا طلبك للاتصال بالشبكات العامة من النوع '.$reseauPublic['type'].' و الموضوع '.$reseauPublic['description'].
                '. سنحاول الرد عليك في أقرب وقت ممكن',
                'type_doc' => ' طلب الاتصال بالشبكة العامة لـ:  '.$reseauPublic['type'],
                'exist_doc' =>true,    
                'doc1' => 'مطلب باسم السيدة رئيسة البلدية معرف بالامضاء في صورة اكثر من مالك',
                'doc2' => 'شهادة ملكية او عقد بيع ',
                'doc3' => '',
                'doc4' => '',
                'doc5' => '',          
            ];
            session(['resAr' => null]);
            session(['resId' => null]);
            $pdf = PDF::loadView('pdf.myPDFArabic', $data);
            return $pdf->download($reseauPublic['last_name'].$reseauPublic['first_name'].'Demande.pdf');

    }
    public function downPdfDecisionRes($id)
    {
        $reseauPublic=ReseauPublic::findOrFail($id);
        if (
            preg_match("/[a-zA-Z]/", $reseauPublic['first_name'])
            and preg_match("/[a-zA-Z]/", $reseauPublic['last_name'])
            and preg_match("/[a-zA-Z]/", $reseauPublic['adresse'])
            and preg_match("/[a-zA-Z]/", $reseauPublic['description'])
        ) {
            if ($reseauPublic['type'] == 'Sonede') {
                $type = 'eau potable';
                $type_soc ='Société nationale d`exploitation et de distribution des eaux';
                $type_res ='réseau public de distribution d`eau';
            }
            if ($reseauPublic['type'] == 'Steg') {
                $type = 'eclairage public';
                $type_soc ='Société tunisienne de l`électricité et du gaz';
                $type_res ='réseau public de distribution de l`électricité';
            }
            $data = [
                'title' => 'Réponse de demande de branchement au réeau public',
                'logo' => 'assets/images/logo.png',
                'date' => date('Y-m-d'),
                'nom' => $reseauPublic['last_name'],
                'prenom' => $reseauPublic['first_name'],
                'adr' => $reseauPublic['adresse'],
                'type_soc' => $type_soc,
                'date_reunion' => Carbon::parse($reseauPublic['created_at'])->format('Y-m-d'),
                'type' => $type,
                'date_gouv' =>Carbon::parse($reseauPublic['created_at']->add(CarbonInterval::months(2)))->format('Y-m-d'),
                'date_gouv_ar' => Carbon::parse($reseauPublic['created_at']->add(CarbonInterval::months(4)))->format('Y-m-d'),
                'type_res' => $type_res,
                'num' => $reseauPublic['num_branch'],



            ];

            $pdf = PDF::loadView('pdf.PDFDecisionRes', $data);
        } else {
            
            if ($reseauPublic['type'] == 'Sonede') {
                $type = ' الماء الصالح للشراب ';
                $type_soc =' الشركة الوطنية لاستغلال و توزيع المياه ';
                $type_res =' الشبكة العمومية لتوزيع المياه ';
            }
            if ($reseauPublic['type'] == 'Steg') {
                $type = ' الإنارة العامة ';
                $type_soc =' الشركة التونسية للكهرباء والغاز ';
                $type_res =' شبكة توزيع الكهرباء العامة ';
            }
            $data = [
                'title' => ' الاستجابة لطلب الاتصال بالشبكة العامة ',
                'logo' => 'assets/images/logo.png',
                'date' => date('Y-m-d'),
                'nom' => $reseauPublic['last_name'],
                'prenom' => $reseauPublic['first_name'],
                'adr' => $reseauPublic['adresse'],
                'type_soc' => $type_soc,
                'date_reunion' => Carbon::parse($reseauPublic['created_at'])->format('Y-m-d'),
                'type' => $type,
                'date_gouv' =>Carbon::parse($reseauPublic['created_at']->add(CarbonInterval::months(2)))->format('Y-m-d'),
                'date_gouv_ar' => Carbon::parse($reseauPublic['created_at']->add(CarbonInterval::months(4)))->format('Y-m-d'),
                'type_res' => $type_res,
                'num' => $reseauPublic['num_branch'],



            ];

            $pdf = PDF::loadView('pdf.PDFDecisionResAr', $data);
        }
        return $pdf->download($reseauPublic['last_name'] . $reseauPublic['first_name'] . 'Response.pdf');
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
