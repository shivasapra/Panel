<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ReFeeSet;
use Carbon\Carbon;


class ProcessController extends Controller
{
    public function index(User $user){

        $reFeeSet = ReFeeSet::where('category','Student')->first();
        $accompanied_person_fee_student = $reFeeSet->accompanied_person_amount;
        if ($reFeeSet->fixed_amount == null) {
            if(Carbon::now()->between(Carbon::parse($reFeeSet->from),Carbon::parse($reFeeSet->to))){
                $registration_fee_student = $reFeeSet->valid_amount;
            }else{
                $registration_fee_student = $reFeeSet->invalid_amount;
            }
        }else{
            $registration_fee_student = $reFeeSet->fixed_amount;
        }

        $reFeeSet = ReFeeSet::where('category','Faculty')->first();
        $accompanied_person_fee_faculty = $reFeeSet->accompanied_person_amount;
        if ($reFeeSet->fixed_amount == null) {
            if(Carbon::now()->between(Carbon::parse($reFeeSet->from),Carbon::parse($reFeeSet->to))){
                $registration_fee_faculty = $reFeeSet->valid_amount;
            }else{
                $registration_fee_faculty = $reFeeSet->invalid_amount;
            }
        }else{
            $registration_fee_faculty = $reFeeSet->fixed_amount;
        }

        return view('process.registration')->with('user',$user)
                                        ->with('registration_fee_student',$registration_fee_student)
                                        ->with('accompanied_person_fee_student',$accompanied_person_fee_student)
                                        ->with('registration_fee_faculty',$registration_fee_faculty)
                                        ->with('accompanied_person_fee_faculty',$accompanied_person_fee_faculty);
    }
}
