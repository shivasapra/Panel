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
use PhpOffice\PhpWord\IOFactory;

class DetailsController extends Controller
{
    public function registration(User $user){
        return view('registration.index')->with('user',$user);
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
        $model->department = $request->department;
        $model->address = $request->address;
        $model->phone = $request->phone;
        $model->category = $request->category;
        $model->accompanied_person = $request->accompanied_person;
        $model->bank_name = $request->bank_name;
        $model->amount = $request->amount;
        $model->transaction_id = $request->transaction_id;
        $model->payment_date = $request->payment_date;
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
        // $data = ['name'=> $details->user->name];
        // Mail::send('emails.approveRegistration', $data, function($message) use ($contactEmail)
        // {  
        //     $message->to($contactEmail);
        // });
        return redirect()->back()->with('user',$details->user)->withStatus(__(' Details Approved!'));
    }

    public function accomodation(User $user){
        return view('registration.accomodation')->with('user',$user);
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
            $phpWord = \PhpOffice\PhpWord\IOFactory::load($talk_file);
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
            $rand_one = str_random();
            $objWriter->save('word/'.$rand_one.'html');
            $model->talk = 'word/'.$rand_one.'html';
        }
        if($request->hasFile('poster')){
            $poster_file = $request->file('poster');
            $phpWord = \PhpOffice\PhpWord\IOFactory::load($poster_file);
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
            $rand_two = str_random();
            $objWriter->save('word/'.$rand_two.'html');
            $model->poster = 'word/'.$rand_two.'html';
        }
        $model->save();

        return redirect()->back();
    }

    public function approveAccomodation(Accomodation $accomodation){
        $accomodation->approved = 1;
        $accomodation->save();
        $contactEmail = $accomodation->user->email;
        $data = ['name'=> $accomodation->user->name];
        // Mail::send('emails.approveAccomodation', $data, function($message) use ($contactEmail)
        // {  
        //     $message->to($contactEmail);
        // });
        return redirect()->back()->with('user',$accomodation->user)->withStatus(__('Accomodation Approved!'));
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
}
