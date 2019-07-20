@extends('layouts.app', ['activePage' => 'Registration', 'titlePage' => __('Registration')])
@section('css')
<style>
.institute_html {
    background-color: #fff;
    box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
}
.institute_html option {
    border-bottom: 1px solid #f4f4f4;
    padding: 7px 15px;
}
.institute_html option:hover{
    cursor: pointer;
    background-color:#54458b;
    color:#fff;
}
</style>
@stop
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="@if($user->details != null){{ route('edit.register',[$user,$user->details]) }}@else {{ route('registerr',$user) }}@endif" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Details') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                    @if (session('status'))
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                          </button>
                          <span>{{ session('status') }}</span>
                        </div>
                      </div>
                    </div>
                  @endif
                {{-- <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div> --}}
                <div class="row">
                <div class="col-md-9">
                @if($user->details != null)
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Registration ID') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                {{$user->details->registration_id}}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name',$user->name) }}" required="true" aria-required="true"/>
                        @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                </div>
            
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-10">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email',$user->email) }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Gender') }}</label>
                    <div class="col-sm-10">
                        <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                            <select name="gender" class="form-control" style="color:black" required>
                                <option value="">Select Gender</option>
                                <option value="Male" @if($user->details != null) {{($user->details->gender == 'Male')? 'selected': ' '}} @endif>Male</option>
                                <option value="Female" @if($user->details != null) {{($user->details->gender == 'Female')? 'selected': ' '}} @endif>Female</option>
                                <option value="Transgender" @if($user->details != null) {{($user->details->gender == 'Transgender')? 'selected': ' '}} @endif>Transgender</option>
                            </select>
                        {{-- <input class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="input-gender" type="text" placeholder="{{ __('Gender') }}" @if($user->details != null)  value="{{$user->details->gender}}"   @else value="{{old('gender')}}" @endif required="true" aria-required="true"/> --}}
                            @if ($errors->has('gender'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('gender') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Institue Name') }}</label>
                    <div class="col-sm-10">
                        <div class="form-group{{ $errors->has('institue') ? ' has-danger' : '' }}">
                            <div class="dropdown">	<div id="myDropdown" class="dropdown-content">
                            <input class="form-control{{ $errors->has('institue') ? ' is-invalid' : '' }} institute-name" onkeyup="InstituteDataExtract(this)" name="institute" id="myInput" type="text" placeholder="{{ __('Institue Name') }}" @if($user->details != null)  value="{{$user->details->institute}}"   @else value="{{old('institue')}}" @endif  required="true" aria-required="true"/>
                            <div class="institute_html"></div></div></div>
                            @if ($errors->has('institute'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('institute') }}</span>
                            @endif
                        </div>
                        
                        
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Department') }}</label>
                    <div class="col-sm-10">
                        <div class="form-group{{ $errors->has('department') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" id="input-department" type="text" placeholder="{{ __('Department') }}" @if($user->details != null)  value="{{$user->details->department}}"   @else value="{{old('department')}}" @endif required="true" aria-required="true"/>
                            @if ($errors->has('department'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('department') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Address') }}</label>
                    <div class="col-sm-10">
                        <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __('Address') }}" @if($user->details != null)  value="{{$user->details->address}}"   @else value="{{old('address')}}" @endif required="true" aria-required="true"/>
                            @if ($errors->has('address'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                    <div class="col-sm-10">
                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-phone" type="text" placeholder="{{ __('Phone') }}" @if($user->details != null)  value="{{$user->details->phone}}"   @else value="{{old('phone')}}" @endif required="true" aria-required="true"/>
                            @if ($errors->has('phone'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Category') }}</label>
                    <div class="col-sm-10">
                        <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                            <select name="category" class="form-control" style="color:black" required id="input-category">
                                <option value="">Select Category</option>
                                <option value="Student/Post Doc" @if($user->details != null) {{($user->details->category == 'Student/Post Doc')? 'selected': ' '}} @endif>Student/Post Doc</option>
                                <option value="Faculty" @if($user->details != null) {{($user->details->category == 'Faculty')? 'selected': ' '}} @endif>Faculty</option>
                            </select>
                        {{-- <input class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="input-gender" type="text" placeholder="{{ __('Gender') }}" @if($user->details != null)  value="{{$user->details->gender}}"   @else value="{{old('gender')}}" @endif required="true" aria-required="true"/> --}}
                            @if ($errors->has('accompanied_person'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('category') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Accompanied Person') }}</label>
                    <div class="col-sm-10">
                        <div class="form-group{{ $errors->has('accompanied_person') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('accompanied_person') ? ' is-invalid' : '' }}" name="accompanied_person" id="input-accompanied_person" type="number" @if($user->details != null)  value="{{$user->details->accompanied_person}}"   @else value="0" @endif required="true" aria-required="true"/>
                            @if ($errors->has('accompanied_person'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('accompanied_person') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Registration Fee') }}</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" name="registration_fee" id="registration_fee" readonly  class="form-control" @if($user->details != null)  value="{{$user->details->registration_fee}}" @endif>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Accompanied Person Fee') }}</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" name="accompanied_person_fee" id="accompanied_person_fee" readonly class="form-control" @if($user->details != null)  value="{{$user->details->accompanied_person_fee}}"  @endif>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Total Registration Fee') }}</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" name="total_registration_fee" id="total_registration_fee" readonly class="form-control" @if($user->details != null)  value="{{$user->details->total_registration_fee}}" @endif>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <label class="col-sm-6 col-form-label"><b>{{ __('Deposit Registration- Charges On Below Mentioned Bank Account:') }}</b></label><br>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Bank') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" class="form-control" disabled @if(App\Settings::first() != null) value="{{App\Settings::first()->bank}}" @endif>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Account No.') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" class="form-control" disabled @if(App\Settings::first() != null) value="{{App\Settings::first()->account_no}}" @endif>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('IFSC Code') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" class="form-control" disabled @if(App\Settings::first() != null) value="{{App\Settings::first()->IFSC}}" @endif>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                
               
                </div>
                </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">{{ __('Registration Fee') }}</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-9">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Bank Name') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group{{ $errors->has('bank_name') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('bank_name') ? ' is-invalid' : '' }}" name="bank_name" id="input-bank_name" type="text" placeholder="{{ __('Bank Name') }}" @if($user->details != null)  value="{{$user->details->bank_name}}"   @else value="{{old('bank_name')}}" @endif required="true" aria-required="true"/>
                                @if ($errors->has('bank_name'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('bank_name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Amount') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" readonly name="amount" id="input-amount" type="text" placeholder="{{ __('Amount') }}" @if($user->details != null)  value="{{$user->details->amount}}"   @else value="{{old('amount')}}" @endif required="true" aria-required="true"/>
                                @if ($errors->has('amount'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('amount') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Transaction Id:') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group{{ $errors->has('transaction_id') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('transaction_id') ? ' is-invalid' : '' }}" name="transaction_id" id="input-transaction_id" type="text" placeholder="{{ __('Transaction Id') }}" @if($user->details != null)  value="{{$user->details->transaction_id}}"   @else value="{{old('transaction_id')}}" @endif required="true" aria-required="true"/>
                                @if ($errors->has('transaction_id'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('transaction_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Date Of Payment:') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group{{ $errors->has('payment_date') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('payment_date') ? ' is-invalid' : '' }}" name="payment_date" id="input-payment_date" type="date" placeholder="{{ __('Payment Date') }}" @if($user->details != null)  value="{{$user->details->payment_date}}"   @else value="{{ Carbon\Carbon::now()->toDateString() }}" @endif  required="true" aria-required="true"/>
                                @if ($errors->has('payment_date'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('payment_date') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-3">
                            @if($user->details!= null)
                            @if(!$user->details->approved and auth::user()->admin )
                                
                                    <a href="{{route('approve.registration',$user->details)}}" style="margin-top:100px;"  class="btn btn-success">{{ __('Approve') }}</a>
                                
                            @endif
                            @if($user->details->approved )
                                <img src="{{asset('/material/img/approved.png')}}" alt="ff" style="width:150px;margin-top:100px;">
                            @endif
                        @endif
                    </div>
                    </div>
                </div>
                @if($user->details != null and $user->details->approved)
                @else
                    @if(!Auth::user()->admin)
                        <div class="text-center">
                            <button type="submit" class="btn btn-info" >@if($user->details != null) {{ __('Update') }} @else{{ __('Submit') }} @endif</button>
                        </div>
                    @endif
                @endif
            </div>
          </form>
          @if(Auth::user()->admin and $user->accomodation != null )
            <div class="card ">
                <div class="card-header card-header-success">
                    <h4 class="card-title">{{ __('Accomodation') }}</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Category') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                                <select name="category" class="form-control" style="color:black" required id="input-category">
                                    <option value="">Select Category</option>
                                    <option value="Student/Post Doc" @if($user->accomodation != null) {{($user->accomodation->category == 'Student/Post Doc')? 'selected': ' '}} @endif>Student/Post Doc</option>
                                    <option value="Faculty" @if($user->accomodation != null) {{($user->accomodation->category == 'Faculty')? 'selected': ' '}} @endif>Faculty</option>
                                </select>
                            {{-- <input class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="input-gender" type="text" placeholder="{{ __('Gender') }}" @if($user->details != null)  value="{{$user->details->gender}}"   @else value="{{old('gender')}}" @endif required="true" aria-required="true"/> --}}
                                @if ($errors->has('accompanied_person'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('category') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Accomodation For') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="number" class="form-control" name="accomodation_for" id="accomodation_for" @if($user->accomodation != null)  value="{{$user->accomodation->accomodation_for}}"   @else disabled value="{{old('accomodation_for')}}" @endif>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Accomodation Charges') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="number" class="form-control" name="accomodation_charges" id="accomodation_charges" @if($user->accomodation != null)  value="{{$user->accomodation->accomodation_charges}}"   @else disabled value="{{old('accomodation_charges')}}" @endif>
                            </div>
                        </div>
                    </div>
                       
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Bank Name') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group{{ $errors->has('bank_name') ? ' has-danger' : '' }}">
                                <input class="form-control toggle {{ $errors->has('bank_name') ? ' is-invalid' : '' }}" name="bank_name" id="input-bank_name" type="text" placeholder="{{ __('Bank Name') }}" @if($user->accomodation != null)   value="{{$user->accomodation->bank_name}}"   @else disabled value="{{old('bank_name')}}" @endif required="true" aria-required="true"/ >
                                @if ($errors->has('bank_name'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('bank_name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Amount') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                <input class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" id="input-amount" type="text" placeholder="{{ __('Amount') }}" readonly @if($user->accomodation != null)  value="{{$user->accomodation->amount}}"   @else  value="{{old('amount')}}" @endif required="true" aria-required="true"/ >
                                @if ($errors->has('amount'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('amount') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Transaction Id:') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group{{ $errors->has('transaction_id') ? ' has-danger' : '' }}">
                                <input class="form-control toggle {{ $errors->has('transaction_id') ? ' is-invalid' : '' }}" name="transaction_id" id="input-transaction_id" type="text" placeholder="{{ __('Transaction Id') }}" @if($user->accomodation != null)  value="{{$user->accomodation->transaction_id}}"   @else disabled value="{{old('transaction_id')}}" @endif required="true" aria-required="true"/ >
                                @if ($errors->has('transaction_id'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('transaction_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Date Of Payment:') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group{{ $errors->has('payment_date') ? ' has-danger' : '' }}">
                                <input class="form-control toggle {{ $errors->has('payment_date') ? ' is-invalid' : '' }}" name="payment_date" id="input-payment_date" type="date" placeholder="{{ __('Payment Date') }}" @if($user->accomodation != null)  value="{{$user->accomodation->payment_date}}"   @else disabled value="{{ Carbon\Carbon::now()->toDateString() }}" @endif  required="true" aria-required="true"/ >
                                @if ($errors->has('payment_date'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('payment_date') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if($user->accomodation != null and $user->accomodation->Room_no != null)
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Room No:') }}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input class="form-control toggle" name="room_no"  type="text" @if($user->accomodation != null)  value="{{$user->accomodation->Room_no}}" @endif  required="true" aria-required="true"/ >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Address:') }}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input class="form-control toggle  name="address"  type="text" @if($user->accomodation != null)  value="{{$user->accomodation->Address}}" @endif  required="true" aria-required="true"/ >
                                </div>
                            </div>
                        </div>
                    @endif
                    </div>
                    <div class="col-md-3 text-center">
                        @if($user->accomodation!= null)
                            @if(!$user->accomodation->approved and auth::user()->admin )
                                <div class="card-footer ml-auto mr-auto">
                                    <a href="{{route('approve.accomodation',$user->accomodation)}}" style="margin-top:100px;"  class="btn btn-success">{{ __('Approve') }}</a>
                                </div>
                            @endif
                            @if($user->accomodation->approved )
                                <img src="{{asset('/material/img/approved.png')}}" alt="ff" style="width:150px;margin-top:100px;">
                            @endif
                        @endif
                    </div>
                </div>
                </div>
            </div>
          @endif
          @if($user->abstract != null and Auth::user()->admin)
            <div class="row">
                @if($user->abstract->poster != null)
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="card-header card-header-danger">
                                <h4 class="card-title">{{ __('Abstract For Poster') }}
                                    {{-- <button type="button" id="poster_button" class="btn btn-sm btn-rounded btn-success pull-right"><i class="fa fa-upload" aria-hidden="true"></i></button></h4> --}}
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <iframe src="{{asset($user->abstract->poster)}}"  frameborder="0" style="width:100%;height:500px;"></iframe>
                            </div>
                            <input type="file" name="poster" id="poster" style="display:none";>
                            <br><p style="font-size:20px;margin-left:25px;"><b>Terms & Conditions:</b></p>
                            <p style="font-size:17px;margin-left:25px;margin-right:10px;">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                            <div class="card-footer ml-auto mr-auto">
                                
                            </div>
                        </div>
                    </div>
                @endif
                @if($user->abstract->talk != null)
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Abstract For Talk') }}
                                    {{-- <button type="button" id="talk_button" class="btn btn-sm btn-rounded btn-primary pull-right"><i class="fa fa-upload" aria-hidden="true"></i></button></h4> --}}
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <iframe src="{{asset($user->abstract->talk)}}" frameborder="0" style="width:100%;height:500px;"></iframe>
                            </div>
                            <input type="file" name="talk" id="talk" style="display:none";>
                            <br><p style="font-size:20px;margin-left:25px;"><b>Terms & Conditions:</b></p>
                            <p style="font-size:17px;margin-left:25px;margin-right:10px;">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                            <div class="card-footer ml-auto mr-auto">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  
@endsection
@section('js')
    <script>
        window.onload=function(){
            @if($user->details != null)
                @if(Auth::user()->admin or $user->details->approved)
                    $('input').attr('disabled','disabled');
                    $('select').attr('disabled','disabled');
                    var elements = document.getElementsByTagName('input');
        
                    for (var i = 0, element; element = elements[i++];) {
                        if (element.type === "hidden")
                        element.removeAttribute('disabled');
                        
                    }
                @endif
            @endif
                };
    </script>

    <script>
        @if(!Auth::user()->admin and $user->details == null)
            setInterval(function(){ 
                var category = document.getElementById('input-category').value;
                var accompanied_person = document.getElementById('input-accompanied_person').value;
                
                    if (category == 'Student/Post Doc') {
                        var registration_fee = {{$registration_fee_student}};
                        var temp = {{$accompanied_person_fee_student}};
                        var accompanied_person_fee = accompanied_person * (registration_fee - temp) 
                        $('#registration_fee').val(registration_fee);
                        $('#accompanied_person_fee').val(accompanied_person_fee);
                        $('#total_registration_fee').val(registration_fee + accompanied_person_fee);
                        $('#input-amount').val(registration_fee + accompanied_person_fee);
                    }
                    if (category == 'Faculty') {
                        var registration_fee = {{$registration_fee_faculty}};
                        var temp = {{$accompanied_person_fee_faculty}};
                        var accompanied_person_fee = accompanied_person * (registration_fee - temp) 
                        $('#registration_fee').val(registration_fee);
                        $('#accompanied_person_fee').val(accompanied_person_fee);
                        $('#total_registration_fee').val(registration_fee + accompanied_person_fee);
                        $('#input-amount').val(registration_fee + accompanied_person_fee);
                    }

            }, 1000);
        @endif
    </script>
    <script>
            function InstituteDataExtract(test){
                $value = test.value;
                $.ajax({
                    type : 'get',
                    url : '{{URL::to('searchInstitute')}}',
                    data:{'search':$value},
                    success:function(data){
                        $(test).next(".institute_html").html(data);
                    }
                });
            }
            function InstituteAssign(temp){
                var div = $(temp).closest(".dropdown-content");
                div.find('.institute-name').val(temp.value);
                $(temp).closest(".institute_html").html('');
            }
        
        </script>
@stop
