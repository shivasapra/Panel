@extends('layouts.app', ['activePage' => 'Accomodation', 'titlePage' => 'Accomodation '.'('.$user->name.')'])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('accomodation.submit',$user) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            
            <div class="card ">
                <div class="card-header card-header-danger">
                    <h4 class="card-title">{{ __('Accomodation') }}</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    @if($user->details != null and $user->details->approved)
                    @if($user->accomodation == null)
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Accomodation') }}</label>
                        <div class="col-sm-7">
                            <input type="radio" id="yes" name="accomodation" value="yes" >Yes
                            <input type="radio" id="no" name="accomodation" value="no" checked>No
                        </div>
                    </div>
                    @endif
                    <br><br>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Bank Name') }}</label>
                        <div class="col-sm-7">
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
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                <input class="form-control toggle {{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" id="input-amount" type="text" placeholder="{{ __('Amount') }}" @if($user->accomodation != null)  value="{{$user->accomodation->amount}}"   @else disabled value="{{old('amount')}}" @endif required="true" aria-required="true"/ >
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
                                <input class="form-control toggle {{ $errors->has('transaction_id') ? ' is-invalid' : '' }}" name="transaction_id" id="input-transaction_id" type="text" placeholder="{{ __('Transaction Id') }}" @if($user->accomodation != null)  value="{{$user->accomodation->transaction_id}}"   @else disabled value="{{old('transaction_id')}}" @endif required="true" aria-required="true"/ >
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
                                <input class="form-control toggle {{ $errors->has('payment_date') ? ' is-invalid' : '' }}" name="payment_date" id="input-payment_date" type="date" placeholder="{{ __('Payment Date') }}" @if($user->accomodation != null)  value="{{$user->accomodation->payment_date}}"   @else disabled value="{{ Carbon\Carbon::now()->toDateString() }}" @endif  required="true" aria-required="true"/ >
                                @if ($errors->has('payment_date'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('payment_date') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="text-center">
                    <h3>{{__('Your Registration Must Be Approved By Admin For Proceeding To Accomodation.')}}</h3>
                </div>
                @endif
                @if($user->accomodation == null and $user->details != null and $user->details->approved)
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-info toggle " disabled>{{ __('Submit') }}</button>
                    </div>
                @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
    $("#yes").click(function () {
        $('.toggle').removeAttr("disabled");
    });

    $("#no").click(function () {
        $('.toggle').attr("disabled",'disabled');
    });
});
</script>
@stop