<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ReFeeSet;
use App\AcFeeSet;
use App\Details;
use App\Accomodation;
use App\Institues;
use Carbon\Carbon;


class ProcessController extends Controller
{
    public function index(User $user,$active){

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


        $acFeeSet = AcFeeSet::where('category','Student')->first();
        if ($acFeeSet->fixed_amount == null) {
            if(Carbon::now()->between(Carbon::parse($acFeeSet->from),Carbon::parse($acFeeSet->to))){
                $accomodation_fee_student = $acFeeSet->valid_amount;
            }else{
                $accomodation_fee_student = $acFeeSet->invalid_amount;
            }
        }else{
            $accomodation_fee_student = $acFeeSet->fixed_amount;
        }

        $acFeeSet = AcFeeSet::where('category','Faculty')->first();
        if ($acFeeSet->fixed_amount == null) {
            if(Carbon::now()->between(Carbon::parse($acFeeSet->from),Carbon::parse($acFeeSet->to))){
                $accomodation_fee_faculty = $acFeeSet->valid_amount;
            }else{
                $accomodation_fee_faculty = $acFeeSet->invalid_amount;
            }
        }else{
            $accomodation_fee_faculty = $acFeeSet->fixed_amount;
        }

        return view('process.registration')->with('user',$user)
                                        ->with('registration_fee_student',$registration_fee_student)
                                        ->with('accompanied_person_fee_student',$accompanied_person_fee_student)
                                        ->with('registration_fee_faculty',$registration_fee_faculty)
                                        ->with('accompanied_person_fee_faculty',$accompanied_person_fee_faculty)
                                        ->with('accomodation_fee_student',$accomodation_fee_student)
                                        ->with('accomodation_fee_faculty',$accomodation_fee_faculty)
                                        ->with('active',$active);
    }

    
    public function storeRegistration(Request $request,User $user){
        if($user->details != null){
            $model = $user->details;
        }
        else{
            $model = new Details;
        }

        
        $model->user_id = $user->id;

        $test_detail = Details::where('registration_id','AICBC0001')->get();
        if ($test_detail->count()>0) {
            $latest = Details::orderBy('id','desc')->take(1)->get();
            $detail_prev_id = $latest[0]->registration_id;
            $registration_id = 'AICBC000'.(substr($detail_prev_id,5,8)+1);
        }
        else{
            $registration_id = 'AICBC0001';
        }


        $model->registration_id = $registration_id;
        $model->gender = $request->gender;
        $model->institute = $request->institute;

        
        if(!Institues::all()->pluck('name')->contains($request->institute)){
            $institute = new Institues;
            $institute->name =  $request->institute;
            $institute->save();
        }

        $model->department = $request->department;
        $model->address = $request->address;
        $model->phone = $request->phone;
        $model->category = $request->category;
        $model->accompanied_person = $request->accompanied_person;
       
        $model->registration_fee = $request->registration_fee;
        $model->accompanied_person_fee = $request->accompanied_person_fee;
        $model->total_registration_fee = $request->total_registration_fee;
        $model->save();
        return redirect()->route('registration.process',['user'=>$user,'active'=>'accomodation']);
    }

    public function storeAccomodation(Request $request,User $user){

        if($user->accomodation != null){
            $model = $user->accomodation;
        }
        else{
            $model = new Accomodation;
        }
        $model->user_id = $user->id;
        $model->accomodation_for = $request->accomodation_for;
        $model->accomodation_charges = $request->accomodation_charges;
        $model->category = $request->category_acc;
        $model->save();
        return redirect()->route('registration.process',['user'=>$user,'active'=>'conference']);

    }

    public function storePayment(Request $request,User $user){

        $details = $user->detail;
        
        $details->bank_name = $request->bank_name;
        $details->amount = $request->amount;
        $details->transaction_id = $request->transaction_id;
        $details->payment_date = $request->payment_date;
        $details->save();
        return redirect()->route('registration.process',['user'=>$user,'active'=>'conference']);

    }
}
