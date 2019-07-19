<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        return view('settings');
    }

    public function studentRegSettings(Request $request){
        //
    }

    public function facultyRegSettings(Request $request){
        //
    }

    public function studentAcSettings(Request $request){
        //
    }

    public function facultyAcSettings(Request $request){
        //
    }
}
