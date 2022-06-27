<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\reclamation;
use App\ReseauPublic;
use App\PermisConstruction;
use App\Documents;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(User $userCount,reclamation $reclamationCount,ReseauPublic $ReseauPublicCount,PermisConstruction $PermisConstructionCount){
        $userCount = User::where('role', 'user')->count();
        $reclamationCount =reclamation::count();
        $ReseauPublicCount =ReseauPublic::count();
        $PermisConstructionCount =PermisConstruction::count();
        $DocumentsCount = Documents::count();
        $new = reclamation::where('status','0')->get();
        $Inprogress = reclamation::where('status','1')->get();
        $finished = reclamation::where('status','2')->get();
        $new_count = count($new);    	
        $Inprogress_count = count($Inprogress);
        $finished_count = count($finished);
        $count_rec = reclamation::select('status', DB::raw("COUNT('id') as count"))
        ->groupBy('status')
        ->get();
        $count_res = ReseauPublic::select('status', DB::raw("COUNT('id') as count"))
        ->groupBy('status')
        ->get();
        $count_permis = PermisConstruction::select('status', DB::raw("COUNT('id') as count"))
        ->groupBy('status')
        ->get();
        $TabConfirm = [];
        $TabNoConfirm = [];
        $userConfirmed = User::where('emailConfirmed', 'true')->count();
        $TabConfirm =array(
            "name" => __('main.emailConfirmed'),
            "data" => [
                intval($userConfirmed),
            ],
        );
      
        $userNonConfirmed = User::where('emailConfirmed', 'false')->count();
        $TabNoConfirm =array(
            "name" => __('main.Email not confirmed'),
            "data" => [
                intval($userNonConfirmed),
            ],
        );

        $TabEmail = [];
        $TabGoogle = [];
        $userEmail = User::where('social', 'email')->count();
        $TabEmail =array(
            "name" => __('main.Registered users with email'),
            "data" => [
                intval($userEmail),
            ],
        );
      
        $userGoogle = User::where('social', 'Google')->count();
        $TabGoogle =array(
            "name" => __('main.Registered users with google account'),
            "data" => [
                intval($userGoogle),
            ],
        );
        return view('admin.dashboard',
        [
            "data" => json_encode([$TabConfirm,$TabNoConfirm,$TabEmail,$TabGoogle]),
            "terms" => json_encode(array(
                __('main.Rules'),
                

        
            )),
           
        ]
        , compact('userCount','reclamationCount','ReseauPublicCount','PermisConstructionCount','DocumentsCount','count_rec','count_res','count_permis'));
    }
    public function echartReclamation(Request $request)
    {
        $new = reclamation::where('status','0')->get();
        $Inprogress = reclamation::where('status','1')->get();
        $finished = reclamation::where('status','2')->get();
        $new_count = count($new);    	
        $Inprogress_count = count($Inprogress);
        $finished_count = count($finished);
        return view('admin.dashboard',compact('new_count','Inprogress_count','finished_count'));
    }
}

