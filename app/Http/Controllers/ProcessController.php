<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ReFeeSet;
use App\AcFeeSet;
use App\Details;
use App\Accomodation;
use App\Institues;
use App\Conference;
use Carbon\Carbon;
use App\Abtract;
use Mail;
use Session;


class ProcessController extends Controller
{
    public function index(User $user,$active){

        $reFeeSet = ReFeeSet::where('category','Student')->first();
        $accompanied_person_fee_student = $reFeeSet->accompanied_person_amount;
        if ($reFeeSet->fixed_amount == null) {
            if(Carbon::now()->between(Carbon::parse($reFeeSet->from),Carbon::parse($reFeeSet->to))){
                $registration_fee_student = $reFeeSet->valid_amount;
            }else{
                $registration_fee_student = $reFeeSet->valid_amount + $reFeeSet->invalid_amount;
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
                $registration_fee_faculty =$reFeeSet->valid_amount + $reFeeSet->invalid_amount;
            }
        }else{
            $registration_fee_faculty = $reFeeSet->fixed_amount;
        }


        $acFeeSet = AcFeeSet::where('category','Student')->first();
        if ($acFeeSet->fixed_amount == null) {
            if(Carbon::now()->between(Carbon::parse($acFeeSet->from),Carbon::parse($acFeeSet->to))){
                $accomodation_fee_student = $acFeeSet->valid_amount;
            }else{
                $accomodation_fee_student =$acFeeSet->valid_amount + $acFeeSet->invalid_amount;
            }
        }else{
            $accomodation_fee_student = $acFeeSet->fixed_amount;
        }

        $acFeeSet = AcFeeSet::where('category','Faculty')->first();
        if ($acFeeSet->fixed_amount == null) {
            if(Carbon::now()->between(Carbon::parse($acFeeSet->from),Carbon::parse($acFeeSet->to))){
                $accomodation_fee_faculty = $acFeeSet->valid_amount;
            }else{
                $accomodation_fee_faculty =$acFeeSet->valid_amount + $acFeeSet->invalid_amount;
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

        $contactEmail = $user->email;
        $data = ['name'=> $user->name];
        Mail::send('emails.registered', $data, function($message) use ($contactEmail)
        {  
            $message->to($contactEmail)->subject('Thanks For Registering!!');
        });
        Session::flash('registered','Dear Participant,
        Thanks for registering for the XLIII All India Cell Biology Conference, 2019 to be organized in IISER Mohali from December 19-21, 2019.
        You will receive a conformation email upon reconciliation of your payment.
        Looking forward to see you in the conference.
        Thanks much!
        Best wishes,
        Organizers, AICBC 2019.');
        return redirect()->route('registration.process',['user'=>$user,'active'=>'accomodation']);
    }

    public function storeAccomodation(Request $request,User $user){
        if($request->accomodation == 'yes'){
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
        }
        
        return redirect()->route('registration.process',['user'=>$user,'active'=>'conference']);

    }

    public function storePayment(Request $request,User $user){

        $details = $user->details;
        
        $details->bank_name = $request->bank_name;
        $details->amount = $request->amount;
        $details->transaction_id = $request->transaction_id;
        $details->payment_date = $request->payment_date;
        $details->save();
        return redirect()->back()->withStatus('Registered Successfully');

    }

    public function storeConference(Request $request,User $user){
        if($request->conference == 'yes'){
            if($user->conference != null){
                $model = $user->conference;
            }
            else{
                $model = new Conference;
            }
            $model->user_id = $user->id;
            $model->conference_amount = $request->conference_amount;
            $model->reason = $request->reason;
            $model->save();
        }
        return redirect()->route('registration.process',['user'=>$user,'active'=>'payment']);

    }

    public function abstract(User $user){
        return view('emails.abstract')->with('user',$user);
    }

    public function abstractSubmit(Request $request,User $user){
        if($user->abstract ==null){
            $model = new Abtract;
        }
        else{
            $model = $user->abstract;
        }
        $model->user_id = $user->id;
        $model->presenting_author_name = $request->presenting_author_name;
        $model->subject_area = $request->subject_area;
        if($request->hasFile('talk')){
            $talk_file = $request->file('talk');
            $talk_new_name = $user->details->registration_id.'_'.explode(')',explode('(',$request->subject_area)[1])[0].'_talk.docx';
            $phpWord = \PhpOffice\PhpWord\IOFactory::load($talk_file);
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
            $objWriter->save('abstract/talk/'.explode('.',$talk_new_name)[0].'html');

            $talk = $request->talk;
            $talk->move('abstract/talk',$talk_new_name);
            $model->talk = 'abstract/talk/'.$talk_new_name;
            $model->save();
        }
        if($request->hasFile('poster')){
            $poster_file = $request->file('poster');
            $poster_new_name = $user->details->registration_id.'_'.explode(')',explode('(',$request->subject_area)[1])[0].'_poster.docx';
            $phpWord = \PhpOffice\PhpWord\IOFactory::load($poster_file);
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
            $objWriter->save('abstract/poster/'.explode('.',$poster_new_name)[0].'html');

            $poster = $request->poster;
            $poster->move('abstract/poster',$poster_new_name);
            $model->poster = 'abstract/poster/'.$poster_new_name;
            $model->save();
        }

        if($request->hasFile('same')){
            $same_file = $request->file('same');
            $same_new_name = $user->details->registration_id.'_'.explode(')',explode('(',$request->subject_area)[1])[0].'_talk_poster.docx';
            $phpWord = \PhpOffice\PhpWord\IOFactory::load($same_file);
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
            $objWriter->save('abstract/same/'.explode('.',$same_new_name)[0].'html');

            $same = $request->same;
            $same->move('abstract/same',$same_new_name);
            $model->same = 'abstract/same/'.$same_new_name;
            $model->save();
        }

        $model->save();

        $contactEmail = $user->email;
        $data = ['name'=> $user->name];
        Mail::send('abstract.registered', $data, function($message) use ($contactEmail)
        {  
            $message->to($contactEmail)->subject('Abstract Submission!!');
        });
        Session::flash('abstract','Dear Participant,
        Thanks for submitting your abstract for the XLIII All India Cell Biology Conference, 2019 to be organized in IISER Mohali from December 19-21, 2019.
        You will be informed soon about the acceptance of your abstract.
        Looking forward to see you in the conference.
        Thanks much!
        Best wishes,
        Organizers, AICBC 2019.');
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

    public function abstractTalkDownload(Request $request){
        $array = array();
        foreach($request->talk as $talk){
            if(Abtract::find($talk)->talk != null){
                array_push($array,asset(Abtract::find($talk)->talk));
            }
            else{
                array_push($array,asset(Abtract::find($talk)->same));
            }
        }
        return view('registration.abstractIndex')->with('array',$array);
    }

    public function abstractPosterDownload(Request $request){
        $array = array();
        foreach($request->poster as $poster){
            if(Abtract::find($poster)->poster != null){
                array_push($array,asset(Abtract::find($poster)->poster));
            }
            else{
                array_push($array,asset(Abtract::find($poster)->same));
            }
        }
        return view('registration.abstractIndex')->with('array',$array);
    }
}
