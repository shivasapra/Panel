<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Abtract;
use App\Accomodation;
use App\Details;
use App\Feedback;
use Auth;
use Mail;
use App\Institues;
use PhpOffice\PhpWord\IOFactory;
use App\ReFeeSet;
use App\AcFeeSet;
use Carbon\Carbon;

class DetailsController extends Controller
{
    public function registration(User $user){
       
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



        return view('registration.index')->with('user',$user)
                                        ->with('registration_fee_student',$registration_fee_student)
                                        ->with('accompanied_person_fee_student',$accompanied_person_fee_student)
                                        ->with('registration_fee_faculty',$registration_fee_faculty)
                                        ->with('accompanied_person_fee_faculty',$accompanied_person_fee_faculty);

    }

    public function register(Request $request,User $user, Details $model){
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
        $model->bank_name = $request->bank_name;
        $model->amount = $request->amount;
        $model->transaction_id = $request->transaction_id;
        $model->payment_date = $request->payment_date;
        $model->registration_fee = $request->registration_fee;
        $model->accompanied_person_fee = $request->accompanied_person_fee;
        $model->total_registration_fee = $request->total_registration_fee;
        $model->save();
        return redirect()->back()->with('user',$user)->withStatus(__('Registered.'));
    }

    public function editRegistration(Request $request,User $user, Details $details){
        $details->user_id = $user->id;
        $details->gender = $request->gender;
        $details->institute = $request->institute;
        $details->department = $request->department;
        $details->address = $request->address;
        $details->phone = $request->phone;
        $details->bank_name = $request->bank_name;
        $details->amount = $request->amount;
        $details->transaction_id = $request->transaction_id;
        $details->payment_date = $request->payment_date;
        $details->save();
        return redirect()->back()->with('user',$user)->withStatus(__('Updated.'));
    }

    public function approve(Details $details){
        $details->approved = 1;
        $details->save();
        $contactEmail = $details->user->email;
        $data = ['name'=> $details->user->name];
        Mail::send('emails.approveRegistration', $data, function($message) use ($contactEmail)
        {  
            $message->to($contactEmail)->subject('Registration Approved');
        });
        return redirect()->back()->with('user',$details->user)->withStatus(__(' Details Approved!'));
    }

    public function accomodation(User $user){

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
        return view('registration.accomodation')->with('user',$user)
                                                ->with('accomodation_fee_student',$accomodation_fee_student)
                                                ->with('accomodation_fee_faculty',$accomodation_fee_faculty);
    }

    

    public function abstract(User $user){
        return view('registration.abstract')->with('user',$user);
    }

    public function abstractSubmit(Request $request,User $user){
        if($user->abstract ==null){
            $model = new Abtract;
        }
        else{
            $model = $user->abstract;
        }
        $model->user_id = $user->id;
        if($request->hasFile('talk')){
            $talk_file = $request->file('talk');
            $talk_new_name = time().$talk_file->getClientOriginalName();
            $phpWord = \PhpOffice\PhpWord\IOFactory::load($talk_file);
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
            $objWriter->save('talk/'.explode('.',$talk_new_name)[0].'html');

            $talk = $request->talk;
            $talk->move('talk',$talk_new_name);
            $model->talk = 'talk/'.$talk_new_name;
            $model->save();
        }
        if($request->hasFile('poster')){
            $poster_file = $request->file('poster');
            $poster_new_name = time().$poster_file->getClientOriginalName();
            $phpWord = \PhpOffice\PhpWord\IOFactory::load($poster_file);
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
            $objWriter->save('poster/'.explode('.',$poster_new_name)[0].'html');

            $poster = $request->poster;
            $poster->move('poster',$poster_new_name);
            $model->poster = 'poster/'.$poster_new_name;
            $model->save();
        }
        $model->save();

        return redirect()->back();
    }

    public function approveAccomodation(Accomodation $accomodation){
        $accomodation->approved = 1;
        $accomodation->save();
        $contactEmail = $accomodation->user->email;
        $data = ['name'=> $accomodation->user->name];
        Mail::send('emails.approveAccomodation', $data, function($message) use ($contactEmail)
        {  
            $message->to($contactEmail)->subject('Accomodation Approved');
        });
        return redirect()->back()->with('user',$accomodation->user)->withStatus(__('Accomodation Approved!'));
    }

    public function allotment(Request $request){
        $accomodation = Accomodation::find($request->acc_id);
        $accomodation->Room_no = $request->room_no;
        $accomodation->Address = $request->address;
        $accomodation->save();
        $contactEmail = $accomodation->user->email;
        $data = ['name'=> $accomodation->user->name,'room_no'=> $accomodation->Room_no, 'address'=> $accomodation->Address];
        Mail::send('emails.roomAllotment', $data, function($message) use ($contactEmail)
        {  
            $message->to($contactEmail)->subject('Room Alloted');
        });
        return redirect()->back()->withStatus('Room Alloted');
    } 

    public function feedbackSubmit(Request $request,Feedback $feedback){
        $feedback->user_id = Auth::user()->id;
        $feedback->feedback = $request->feedback;
        $feedback->save();
        return redirect()->route('home')->withStatus('FeedbackSent!');
    }

    public function accomodationSubmit(Request $request,User $user,Accomodation $model){
        $model->user_id = $user->id;
        $model->bank_name = $request->bank_name;
        $model->accomodation_for = $request->accomodation_for;
        $model->accomodation_charges = $request->accomodation_charges;
        $model->category = $request->category;
        $model->amount = $request->amount;
        $model->transaction_id = $request->transaction_id;
        $model->payment_date = $request->payment_date;
        $model->save();
        if ($request->has('remarks')) {
            $model->cancellation_remarks = $request->remarks;
            $model->save();
        }
        return redirect()->back()->with('user',$user)->withStatus(__('Accomodation Added'));
    }

    public function requestCancellation(Request $request,User $user){
        $accomodation = $user->accomodation;
        $accomodation->cancellation_remarks = $request->remarks;
        $accomodation->save();
        return redirect()->back()->withStatus('Cancellation Requested');
    }

    public function InstituteSearch(Request $request){
        if($request->ajax()){
            $output= "";
            $institutes = Institues::where('name','LIKE','%'.$request->search."%")->get();
            if($institutes){
                    foreach ($institutes as $key => $product) {
                        $output.='<option onClick="InstituteAssign(this)" value="'.$product->name.'">'.$product->name.'</option>';
                    }
                return Response($output);
            }
        }
    }
}
