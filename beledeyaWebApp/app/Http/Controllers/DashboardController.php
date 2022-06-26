<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\reclamation;
use App\ReseauPublic;
use App\PermisConstruction;

class DashboardController extends Controller
{
    public function index(User $userCount,reclamation $reclamationCount,ReseauPublic $ReseauPublicCount,PermisConstruction $PermisConstructionCount){
        $userCount = User::where('role', 'user')->count();
        $reclamationCount =reclamation::count();
        $ReseauPublicCount =ReseauPublic::count();
        $PermisConstructionCount =PermisConstruction::count();
        return view('admin.dashboard', compact('userCount','reclamationCount','ReseauPublicCount','PermisConstructionCount'));
    }
}
