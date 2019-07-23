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
                                                                    <select name="category" class="form-control" style="color:black" required id="input-category">
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
                                                            <label class="col-sm-3 col-form-label">{{ __('Accompanied Person') }}</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group{{ $errors->has('accompanied_person') ? ' has-danger' : '' }}">
                                                                    <input class="form-control{{ $errors->has('accompanied_person') ? ' is-invalid' : '' }}" name="accompanied_person" id="input-accompanied_person" type="number" @if($user->details != null)  value="{{$user->details->accompanied_person}}"   @else value="0" @endif required="true" aria-required="true"/>
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
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-md btn-info">Save & Next</button>
                                                </div>
                                            </form> 
                                        </div>
                                        <div class="tab-pane {{ $active== 'accomodation' ? ' active' : '' }}" id="accomodation">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">{{ __('Do You Want Accomodation?') }}</label>
                                                        <div class="col-sm-8">
                                                            <input type="radio" id="yes" name="accomodation" value="yes" >Yes
                                                            <input type="radio" id="no" name="accomodation" value="no" checked>No
                                                        </div>
                                                    </div><hr>
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">{{ __('Category') }}</label>
                                                        <div class="col-sm-8">
                                                            <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                                                                <select name="category" class="form-control toggle" style="color:black" required id="category" disabled>
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
                                                                <input type="number" class="form-control" name="accomodation_charges" id="accomodation_charges" @if($user->accomodation != null)  value="{{$user->accomodation->accomodation_charges}}"   @else readonly value="{{old('accomodation_charges')}}" @endif>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane {{ $active== 'conference' ? ' active' : '' }}" id="conference">
                                        </div>
                                        <div class="tab-pane {{ $active== 'payment' ? ' active' : '' }}" id="payment">
                                            <div class="row">
                                                <div class="col-md-8">
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
                                                        <label class="col-sm-4 col-form-label">{{ __('Amount') }}</label>
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
                                                                <input class="form-control{{ $errors->has('payment_date') ? ' is-invalid' : '' }}" name="payment_date" id="input-payment_date" type="date" placeholder="{{ __('Payment Date') }}" @if($user->details != null)  value="{{$user->details->payment_date}}"   @else value="{{ Carbon\Carbon::now()->toDateString() }}" @endif  required="true" aria-required="true"/>
                                                                @if ($errors->has('payment_date'))
                                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('payment_date') }}</span>
                                                                @endif
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
            var category = document.getElementById('input-category').value;
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
        
        }, 1000);
    </script>
    <script>
        
            setInterval(function(){ 
                var category = document.getElementById('input-category').value;
                var accompanied_person = document.getElementById('input-accompanied_person').value;
                var amount = document.getElementById('input-amount').value;

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
            var registration_charges = document.getElementById('total_registration_fee').value; 
            var accomodation_charges = document.getElementById('accomodation_charges').value;
            $('#input-amount').val(Number(registration_charges) + Number(accomodation_charges));
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