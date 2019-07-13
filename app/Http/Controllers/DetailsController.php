<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Accomodation;
use App\Details;

class DetailsController extends Controller
{
    public function registration(User $user){
        return view('registration.index')->with('user',$user);
    }

    public function register(Request $request,User $user, Details $model){
        $model->user_id = $user->id;
        $model->gender = $request->gender;
        $model->institute = $request->institute;
        $model->department = $request->department;
        $model->address = $request->address;
        $model->phone = $request->phone;
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
        return redirect()->back()->with('user',$details->user)->withStatus(__('Approved'));
    }

    public function accomodation(User $user){
        return view('registration.accomodation')->with('user',$user);
    }

    public function accomodationSubmit(Request $request,User $user,Accomodation $model){
        $model->user_id = $user->id;
        $model->bank_name = $request->bank_name;
        $model->amount = $request->amount;
        $model->transaction_id = $request->transaction_id;
        $model->payment_date = $request->payment_date;
        $model->save();
        return redirect()->back()->with('user',$user)->withStatus(__('Accomodation Added'));
    }

    public function abstract(User $user){
        dd($user);
    }
}
