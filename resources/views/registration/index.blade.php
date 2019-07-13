@extends('layouts.app', ['activePage' => 'Registration', 'titlePage' => __('Registration')])

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
                        <input class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="input-gender" type="text" placeholder="{{ __('Gender') }}" @if($user->details != null)  value="{{$user->details->gender}}"   @else value="{{old('gender')}}" @endif required="true" aria-required="true"/>
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
                            <input class="form-control{{ $errors->has('institue') ? ' is-invalid' : '' }}" name="institute" id="input-institute" type="text" placeholder="{{ __('Institue Name') }}" @if($user->details != null)  value="{{$user->details->institute}}"   @else value="{{old('institue')}}" @endif  required="true" aria-required="true"/>
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
            </div>
            <div class="col-md-3 text-center">
                @if($user->details!= null and$user->details->approved)
                    <img src="{{asset('/material/img/approved.png')}}" alt="ff" style="width:150px;margin-top:100px;">
                @endif
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
                        <label class="col-sm-2 col-form-label">{{ __('Bank Name') }}</label>
                        <div class="col-sm-7">
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
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" id="input-amount" type="text" placeholder="{{ __('Amount') }}" @if($user->details != null)  value="{{$user->details->amount}}"   @else value="{{old('amount')}}" @endif required="true" aria-required="true"/>
                                @if ($errors->has('amount'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('amount') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Transaction Id:') }}</label>
                        <div class="col-sm-7">
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
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('payment_date') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('payment_date') ? ' is-invalid' : '' }}" name="payment_date" id="input-payment_date" type="date" placeholder="{{ __('Payment Date') }}" @if($user->details != null)  value="{{$user->details->payment_date}}"   @else value="{{ Carbon\Carbon::now()->toDateString() }}" @endif  required="true" aria-required="true"/>
                                @if ($errors->has('payment_date'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('payment_date') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if($user->details != null and $user->details->approved)
                @else
                    @if(!Auth::user()->admin)
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-info">@if($user->details != null) {{ __('Update') }} @else{{ __('Submit') }} @endif</button>
                        </div>
                    @else
                        @if($user->details!= null and !$user->details->approved )
                            <div class="card-footer ml-auto mr-auto">
                                <a href="{{route('approve.registration',$user->details)}}"  class="btn btn-success">{{ __('Approve') }}</a>
                            </div>
                        @endif
                    @endif
                @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection