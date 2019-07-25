@extends('layouts.app', ['activePage' => 'Registration Process', 'titlePage' => __('Registration Process')])
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
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-info">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link {{ $active== 'registration' ? ' active' : '' }}" href="#registration" data-toggle="tab">
                                                <i class="material-icons">account_box</i> Registration
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ $active== 'accomodation' ? ' active' : '' }}" href="#accomodation" data-toggle="tab">
                                                <i class="material-icons">store</i> Accomodation
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ $active== 'conference' ? ' active' : '' }}" href="#conference" data-toggle="tab">
                                                <i class="material-icons">stars</i> Pre-Conference Workshop
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ $active== 'payment' ? ' active' : '' }}" href="#payment" data-toggle="tab">
                                                <i class="material-icons">account_balance</i> Payment
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="card-body">
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
                                    <div class="tab-content">
                                        <div class="tab-pane {{ $active== 'registration' ? ' active' : '' }}" id="registration">
                                            <form action="{{route('registration.store',$user)}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name',$user->name) }}" required="true" aria-required="true"/>
                                                                    @if ($errors->has('name'))
                                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email',$user->email) }}" required />
                                                                @if ($errors->has('email'))
                                                                    <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">{{ __('Gender') }}</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                                                    <select name="gender" class="form-control" style="color:black" required>
                                                                        <option value="">Select Gender</option>
                                                                        <option value="Male" @if($user->details != null) {{($user->details->gender == 'Male')? 'selected': ' '}} @endif>Male</option>
                                                                        <option value="Female" @if($user->details != null) {{($user->details->gender == 'Female')? 'selected': ' '}} @endif>Female</option>
                                                                        <option value="Transgender" @if($user->details != null) {{($user->details->gender == 'Transgender')? 'selected': ' '}} @endif>Transgender</option>
                                                                    </select>
                                                                    @if ($errors->has('gender'))
                                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('gender') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">{{ __('Institue Name') }}</label>
                                                            <div class="col-sm-9">
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
                                                            <label class="col-sm-3 col-form-label">{{ __('Department') }}</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group{{ $errors->has('department') ? ' has-danger' : '' }}">
                                                                    <input class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" id="input-department" type="text" placeholder="{{ __('Department') }}" @if($user->details != null)  value="{{$user->details->department}}"   @else value="{{old('department')}}" @endif required="true" aria-required="true"/>
                                                                    @if ($errors->has('department'))
                                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('department') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">{{ __('Address') }}</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                                                    <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __('Address') }}" @if($user->details != null)  value="{{$user->details->address}}"   @else value="{{old('address')}}" @endif required="true" aria-required="true"/>
                                                                    @if ($errors->has('address'))
                                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('address') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">{{ __('Phone') }}</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                                                    <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-phone" type="text" placeholder="{{ __('Phone') }}" @if($user->details != null)  value="{{$user->details->phone}}"   @else value="{{old('phone')}}" @endif required="true" aria-required="true"/>
                                                                    @if ($errors->has('phone'))
                                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('phone') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">{{ __('Category') }}</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                                                                    <select name="category" class="form-control" style="color:black" required id="input-category" @if($active != 'registration') disabled @endif>
                                                                        <option value="">Select Category</option>
                                                                        <option value="Student/Post Doc" @if($user->details != null) {{($user->details->category == 'Student/Post Doc')? 'selected': ' '}} @endif>Student/Post Doc</option>
                                                                        <option value="Faculty" @if($user->details != null) {{($user->details->category == 'Faculty')? 'selected': ' '}} @endif>Faculty</option>
                                                                    </select>                                                      
                                                                    @if ($errors->has('accompanied_person'))
                                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('category') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">{{ __('Accompanied Person (Non Atendee Of The Conference)') }}</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group{{ $errors->has('accompanied_person') ? ' has-danger' : '' }}">
                                                                    <input class="form-control{{ $errors->has('accompanied_person') ? ' is-invalid' : '' }}" @if($active != 'registration') readonly @endif name="accompanied_person" id="input-accompanied_person" type="number" @if($user->details != null)  value="{{$user->details->accompanied_person}}"   @else value="0" @endif required="true" aria-required="true"/>
                                                                    @if ($errors->has('accompanied_person'))
                                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('accompanied_person') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">{{ __('Registration Fee') }}</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <input type="text" name="registration_fee" id="registration_fee" readonly  class="form-control" @if($user->details != null)  value="{{$user->details->registration_fee}}" @endif>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">{{ __('Accompanied Person Fee') }}</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <input type="text" name="accompanied_person_fee" id="accompanied_person_fee" readonly class="form-control" @if($user->details != null)  value="{{$user->details->accompanied_person_fee}}"  @endif>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">{{ __('Total Registration Fee') }}</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <input type="text" name="total_registration_fee" id="total_registration_fee" readonly class="form-control" @if($user->details != null)  value="{{$user->details->total_registration_fee}}" @endif>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                @if(!Auth::user()->admin)
                                                    @if($user->details != null)
                                                        <div class="text-center">
                                                            @if(!$user->details->approved)
                                                                <button type="submit" class="btn btn-md btn-info" @if($active != 'registration') style="display:none;" @endif>Save & Next</button>
                                                            @else
                                                                <img src="{{asset('/material/img/approved.png')}}" alt="ff" style="width:150px;margin-top:100px;">
                                                            @endif
                                                        </div>
                                                    @endif
                                                @else
                                                    @if($user->details != null)
                                                        <div class="text-center">
                                                            @if(!$user->details->approved)
                                                                <a href="{{route('approve.registration',$user->details)}}" class="btn btn-md btn-success">Approve</a>
                                                            @else
                                                                <img src="{{asset('/material/img/approved.png')}}" alt="ff" style="width:150px;margin-top:100px;">
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endif
                                            </form> 
                                        </div>
                                        <div class="tab-pane {{ $active== 'accomodation' ? ' active' : '' }}" id="accomodation">
                                            <form action="{{route('accomodation.store',$user)}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        @if($user->accomodation == null)
                                                            <div class="row">
                                                                <label class="col-sm-4 col-form-label">{{ __('Do You Want Accomodation?') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="radio" id="yes" name="accomodation" value="yes" >Yes
                                                                    <input type="radio" id="no" name="accomodation" value="no" checked>No
                                                                </div>
                                                            </div><hr>
                                                        @endif
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Category') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                                                                    <select name="category_acc" class="form-control toggle" style="color:black" disabled required id="category_acc" @if($active != 'accomodation') disabled @endif>
                                                                        <option value="">Select Category</option>
                                                                        <option value="Student/Post Doc" @if($user->accomodation != null) {{($user->accomodation->category == 'Student/Post Doc')? 'selected': ' '}} @endif>Student/Post Doc</option>
                                                                        <option value="Faculty" @if($user->accomodation != null) {{($user->accomodation->category == 'Faculty')? 'selected': ' '}} @endif>Faculty</option>
                                                                    </select>
                                                                    @if ($errors->has('accompanied_person'))
                                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('category') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Accomodation For') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="number" class="form-control toggle" name="accomodation_for" id="accomodation_for" @if($user->accomodation != null)  value="{{$user->accomodation->accomodation_for}}"   @else disabled value="{{old('accomodation_for')}}" @endif>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Accomodation Charges') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="number" class="form-control" readonly name="accomodation_charges" id="accomodation_charges" @if($user->accomodation != null)  value="{{$user->accomodation->accomodation_charges}}"   @else readonly value="{{old('accomodation_charges')}}" @endif>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(!Auth::user()->admin)
                                                    @if($user->accomodation != null)
                                                        <div class="text-center">
                                                            @if(!$user->accomodation->approved)
                                                                <button type="submit" @if($active != 'accomodation') style="display:none;" @endif class="btn btn-md btn-info">Save & Next</button>
                                                            @else
                                                                <img src="{{asset('/material/img/approved.png')}}" alt="ff" style="width:150px;margin-top:100px;">
                                                            @endif
                                                        </div>
                                                    @endif
                                                    <div class="text-center">
                                                        <button type="submit" @if($active != 'accomodation') style="display:none;" @endif class="btn btn-md btn-info">Save & Next</button>
                                                    </div>
                                                @else
                                                    @if($user->accomodation != null)
                                                        <div class="text-center">
                                                            @if(!$user->accomodation->approved)
                                                                <a href="{{route('approve.accomodation',$user->accomodation)}}" class="btn btn-md btn-success">Approve</a>
                                                            @else
                                                                <img src="{{asset('/material/img/approved.png')}}" alt="ff" style="width:150px;margin-top:100px;">
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endif
                                                
                                            </form>
                                        </div>
                                        <div class="tab-pane {{ $active== 'conference' ? ' active' : '' }}" id="conference">
                                            <form action="{{route('conference.store',$user)}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Introduction') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Conference Charges') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="number" class="form-control toggle" name="conference_amount" id="conference_amount" @if($user->conference != null)  value="{{$user->conference->conference_amount}}"   @else value="{{App\Settings::first()->conference_amount}}" @endif readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if($user->conference == null)
                                                            <div class="row">
                                                                <label class="col-sm-4 col-form-label">{{ __('Do You Want To Attend Pre Conference Workshop?') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="radio" id="yes_conference" name="conference" value="yes" >Yes
                                                                    <input type="radio" id="no_conference"  name="conference" value="no" checked>No
                                                                </div>
                                                            </div>
                                                        @else
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label" ><b>{{ __('Why You Want To Attend Workshop?') }}</b></label><br>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <p>@if($user->conference != null) {{$user->conference->reason}}@endif</p>            
                                                                </div>
                                                            </div>
                                                        </div>  
                                                        @endif
                                                        <div class="row" id="con" style="display:none;">
                                                            <label class="col-sm-4 col-form-label" ><b>{{ __('Why You Want To Attend Workshop?') }}</b></label><br>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <textarea name="reason" id="reason"  class="form-control">@if($user->conference != null) {{$user->conference->reason}}@endif</textarea>            
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    @if(!Auth::user()->admin)
                                                        <button type="submit" class="btn btn-md btn-info" @if($active != 'conference') style="display:none;" @endif>Save & Next</button>
                                                    @endif
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane {{ $active== 'payment' ? ' active' : '' }}" id="payment">
                                            <form action="{{route('payment.store',$user)}}" method="post">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <label class="col-sm-10 col-form-label"><b>{{ __('Deposit The Amount On Below Mentioned Bank Account:') }}</b></label><br>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Bank') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" disabled @if(App\Settings::first() != null) value="{{App\Settings::first()->bank}}" @endif>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Account Holder Name') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" disabled @if(App\Settings::first() != null) value="{{App\Settings::first()->account_holder_name}}" @endif>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Account No.') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" disabled @if(App\Settings::first() != null) value="{{App\Settings::first()->account_no}}" @endif>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('IFSC Code') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" disabled @if(App\Settings::first() != null) value="{{App\Settings::first()->IFSC}}" @endif>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br><hr>
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Registration Charges') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input class="form-control" readonly id="registration_charge" @if($user->details != null) value="{{$user->details->total_registration_fee}}" @endif type="text" required="true" aria-required="true"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Accomodation Charges') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input class="form-control" readonly id="accomodation_charge" @if($user->accomodation != null) value="{{$user->accomodation->accomodation_charges}}" @endif type="text" required="true" aria-required="true"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Conference Charges') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input class="form-control" readonly id="conference_charge" @if($user->conference != null) value="{{$user->conference->conference_amount}}" @endif type="text" required="true" aria-required="true"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Total Charges') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                                                    <input class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" readonly name="amount" id="input-amount" type="text" placeholder="{{ __('Amount') }}" @if($user->details != null)  value="{{$user->details->amount}}"   @else value="{{old('amount')}}" @endif required="true" aria-required="true"/>
                                                                    @if ($errors->has('amount'))
                                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('amount') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Bank Name') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group{{ $errors->has('bank_name') ? ' has-danger' : '' }}">
                                                                    <input class="form-control{{ $errors->has('bank_name') ? ' is-invalid' : '' }}" name="bank_name" id="input-bank_name" type="text" placeholder="{{ __('Bank Name') }}" @if($user->details != null)  value="{{$user->details->bank_name}}"   @else value="{{old('bank_name')}}" @endif required="true" aria-required="true"/>
                                                                    @if ($errors->has('bank_name'))
                                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('bank_name') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Transaction Id:') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group{{ $errors->has('transaction_id') ? ' has-danger' : '' }}">
                                                                    <input class="form-control{{ $errors->has('transaction_id') ? ' is-invalid' : '' }}" name="transaction_id" id="input-transaction_id" type="text" placeholder="{{ __('Transaction Id') }}" @if($user->details != null)  value="{{$user->details->transaction_id}}"   @else value="{{old('transaction_id')}}" @endif required="true" aria-required="true"/>
                                                                    @if ($errors->has('transaction_id'))
                                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('transaction_id') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">{{ __('Date Of Payment:') }}</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group{{ $errors->has('payment_date') ? ' has-danger' : '' }}">
                                                                    <input class="form-control{{ $errors->has('payment_date') ? ' is-invalid' : '' }}" name="payment_date" id="input-payment_date" type="date" placeholder="{{ __('Payment Date') }}" @if($user->details != null and $user->details->payment_date != null)  value="{{$user->details->payment_date}}"   @else value="{{ Carbon\Carbon::now()->toDateString() }}" @endif  required="true" aria-required="true"/>
                                                                    @if ($errors->has('payment_date'))
                                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('payment_date') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    @if(!Auth::user()->admin)
                                                        <button type="submit" @if($active != 'payment' ) style="display:none;" @endif @if($user->details != null) @if($user->details->payment_date != null) style="display:none;" @endif  @endif class="btn btn-md btn-info">Submit</button>
                                                    @endif
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
            $(document).ready(function() {
            $("#yes").click(function () {
                console.log('shiva');
                
                $('.toggle').removeAttr("disabled");
            });
        
            $("#no").click(function () {
                $('.toggle').attr("disabled",'disabled');
            })

            
        });
    </script>
    <script>
        setInterval(function(){ 
            var category = document.getElementById('category_acc').value;
            var accomodation_for = document.getElementById('accomodation_for').value;
            var amount = document.getElementById('input-amount').value;
            
                if (category == 'Student/Post Doc') {
                    console.log(accomodation_for);
                    
                    var accomodation_fee = {{$accomodation_fee_student}};
                    var accomodation_charges = accomodation_for * accomodation_fee;
                    $('#accomodation_charges').val(accomodation_charges);
                    
                    
                }
                if (category == 'Faculty') {
                    var accomodation_fee = {{$accomodation_fee_faculty}};
                    var accomodation_charges = accomodation_for * accomodation_fee;
                    $('#accomodation_charges').val(accomodation_charges);
                    
                    
                }
                
                if($('#yes_conference').is(':checked')){
                    $('#con').show();
            }
            if($('#no_conference').is(':checked')){
                    $('#con').hide();
            }
        }, 1000);
    </script>
    <script>
        
            setInterval(function(){ 
                var category = document.getElementById('input-category').value;
                var accompanied_person = document.getElementById('input-accompanied_person').value;
                var amount = document.getElementById('input-amount').value;
                var conference_charge =  document.getElementById('conference_amount').value;

                    if (category == 'Student/Post Doc') {
                        var registration_fee = {{$registration_fee_student}};
                        var temp = {{$accompanied_person_fee_student}};
                        var accompanied_person_fee = accompanied_person * (registration_fee - temp) 
                        $('#registration_fee').val(registration_fee);
                        $('#accompanied_person_fee').val(accompanied_person_fee);
                        $('#total_registration_fee').val(registration_fee + accompanied_person_fee);
                        
                        
                    }
                    if (category == 'Faculty') {
                        var registration_fee = {{$registration_fee_faculty}};
                        var temp = {{$accompanied_person_fee_faculty}};
                        var accompanied_person_fee = accompanied_person * (registration_fee - temp) 
                        $('#registration_fee').val(registration_fee);
                        $('#accompanied_person_fee').val(accompanied_person_fee);
                        $('#total_registration_fee').val(registration_fee + accompanied_person_fee);
                        
                    }
                    
                    
            }, 1000);
        
    </script>
    <script>
        setInterval(function(){
            var registration_charge = document.getElementById('registration_charge').value; 
            var accomodation_charge = document.getElementById('accomodation_charge').value;
            var conference_charge = document.getElementById('conference_charge').value;
            $('#input-amount').val(Number(registration_charge) + Number(accomodation_charge) + Number(conference_charge));
        },1000)
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