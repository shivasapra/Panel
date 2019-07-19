<?php

namespace App\Http\Controllers;
use App\ReFeeSet;
use App\AcFeeSet;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        return view('settings');
    }

    public function studentRegSettings(Request $request){
        
        foreach (ReFeeSet::where('category','Student')->get() as $re) {
            $re->delete();
        }
        if($request->reg_type_student == 'datewise-reg-student'){
            $model = new ReFeeSet;
            $model->category = 'Student';
            $model->from = $request->reg_from_student;
            $model->to = $request->reg_to_student;
            $model->valid_amount = $request->reg_valid_amount_student;
            $model->invalid_amount = $request->reg_invalid_amount_student;
            $model->save();
        }
        if($request->reg_type_student == 'fixed-reg-student'){
            $model = new ReFeeSet;
            $model->category = 'Student';
            $model->fixed_amount = $request->reg_fixed_amount_student;
            $model->save();
        }
    }

    public function facultyRegSettings(Request $request){
        foreach (ReFeeSet::where('category','Faculty')->get() as $re) {
            $re->delete();
        }
        if($request->reg_type_student == 'datewise-reg-faculty'){
            $model = new ReFeeSet;
            $model->category = 'Faculty';
            $model->from = $request->reg_from_faculty;
            $model->to = $request->reg_to_faculty;
            $model->valid_amount = $request->reg_valid_amount_faculty;
            $model->invalid_amount = $request->reg_invalid_amount_faculty;
            $model->save();
        }
        if($request->reg_type_faculty == 'fixed-reg-faculty'){
            $model = new ReFeeSet;
            $model->category = 'Faculty';
            $model->fixed_amount = $request->reg_fixed_amount_faculty;
            $model->save();
        }
    }

    public function studentAcSettings(Request $request){
        foreach (AcFeeSet::where('category','Student')->get() as $ac) {
            $ac->delete();
        }
        if($request->ac_type_student == 'datewise-ac-student'){
            $model = new AcFeeSet;
            $model->category = 'Student';
            $model->from = $request->ac_from_student;
            $model->to = $request->ac_to_student;
            $model->valid_amount = $request->ac_valid_amount_student;
            $model->invalid_amount = $request->ac_invalid_amount_student;
            $model->save();
        }
        if($request->ac_type_student == 'fixed-ac-student'){
            $model = new AcFeeSet;
            $model->category = 'Student';
            $model->fixed_amount = $request->ac_fixed_amount_student;
            $model->save();
        }
    }

    public function facultyAcSettings(Request $request){
        foreach (AcFeeSet::where('category','Faculty')->get() as $ac) {
            $ac->delete();
        }
        if($request->ac_type_faculty == 'datewise-ac-faculty'){
            $model = new AcFeeSet;
            $model->category = 'Faculty';
            $model->from = $request->ac_from_faculty;
            $model->to = $request->ac_to_faculty;
            $model->valid_amount = $request->ac_valid_amount_faculty;
            $model->invalid_amount = $request->ac_invalid_amount_faculty;
            $model->save();
        }
        if($request->ac_type_faculty == 'fixed-ac-faculty'){
            $model = new AcFeeSet;
            $model->category = 'Faculty';
            $model->fixed_amount = $request->ac_fixed_amount_faculty;
            $model->save();
        }
    }
}
