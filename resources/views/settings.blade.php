@extends('layouts.app', ['activePage' => 'Settings', 'titlePage' => __('Settings')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('student.reg.settings')}}" method="post">
                        @csrf
                        <div class="card-header card-header-info">
                            <h4 class="card-title "><b>Student/PostDoc:</b> {{ __('Registration Fee Settings ') }}</h4>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                    </button>
                                    <span>{{ session('status_one') }}</span>
                                </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                DateWise Amount <input type="radio" value="datewise-reg-student" name="reg_type_student" id="reg-datewise-student" @if(App\RefeeSet::where('category','Student')->where('fixed_amount',null)->count()>0) checked @endif>
                                Fixed Amount <input type="radio" value="fixed-reg-student" name="reg_type_student" id="reg-fixed-student"  @if(App\RefeeSet::where('category','Student')->where('fixed_amount','!=',null)->count()>0) checked @endif>
                                </div>
                            </div><br>
                            <div id="datewise-reg-student" class="div" @if(App\RefeeSet::where('category','Student')->where('fixed_amount',null)->count()>0) style="" @else style="display:none;" @endif>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="reg_from_student">From:</label>
                                        <input type="Date" class="form-control" name="reg_from_student" @if($reg_type_student != null)value="{{$reg_type_student->from}}"@endif>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="reg_to_student">To:</label>
                                        <input type="Date" class="form-control" name="reg_to_student" @if($reg_type_student != null)value="{{$reg_type_student->to}}"@endif>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="reg_valid_amount_student">Charges:</label>
                                        <input type="text" class="form-control" name="reg_valid_amount_student" @if($reg_type_student != null)value="{{$reg_type_student->valid_amount}}"@endif>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="reg_invalid_amount_student">Late Fee Charges:</label>
                                        <input type="text" class="form-control" name="reg_invalid_amount_student" @if($reg_type_student != null)value="{{$reg_type_student->invalid_amount}}"@endif>
                                    </div>
                                </div>
                                <br>
                                {{-- <div class="row">
                                    <div class="col-md-4">
                                        <label for="reg_accompanied_person_amount_student">Accompanied Person Amount To Be Deducted:</label>
                                        <input type="text" class="form-control" name="reg_accompanied_person_amount_student" @if($reg_type_student != null)value="{{$reg_type_student->accompanied_person_amount}}"@endif>
                                    </div>
                                </div> --}}
                            </div>
                            <br>
                            <div id="fixed-reg-student" class="div" @if(App\RefeeSet::where('category','Student')->where('fixed_amount','!=',null)->count()>0) style="" @else style="display:none;" @endif>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="reg_fixed_amount_student">Fixed Amount:</label>
                                        <input type="text" class="form-control" name="reg_fixed_amount_student" @if($reg_type_student != null)value="{{$reg_type_student->fixed_amount}}"@endif>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <label for="reg_accompanied_person_amount_student_two">Accompanied Person Amount To Be Deducted:</label>
                                        <input type="text" class="form-control" name="reg_accompanied_person_amount_student_two" @if($reg_type_student != null)value="{{$reg_type_student->accompanied_person_amount}}"@endif>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-sm btn-danger">Save</button>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <form action="{{route('faculty.reg.settings')}}" method="post">
                        @csrf
                        <div class="card-header card-header-info">
                            <h4 class="card-title "><b>Faculty:</b> {{ __('Registration Fee Settings ') }}</h4>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                    </button>
                                    <span>{{ session('status_two') }}</span>
                                </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    DateWise Amount <input type="radio" value="datewise-reg-faculty" name="reg_type_faculty" id="reg-datewise-faculty" @if(App\RefeeSet::where('category','Faculty')->where('fixed_amount',null)->count()>0) checked @endif>
                                    Fixed Amount <input type="radio" value="fixed-reg-faculty" name="reg_type_faculty" id="reg-fixed-faculty" @if(App\RefeeSet::where('category','Faculty')->where('fixed_amount','!=',null)->count()>0) checked @endif>
                                </div>
                            </div><br>
                            <div id="datewise-reg-faculty" class="div_three" @if(App\RefeeSet::where('category','Faculty')->where('fixed_amount',null)->count()>0) style=" " @else style="display:none;" @endif>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="reg_from_faculty">From:</label>
                                        <input type="Date" class="form-control" name="reg_from_faculty" @if($reg_type_faculty != null)value="{{$reg_type_faculty->from}}"@endif>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="reg_to_faculty">To:</label>
                                        <input type="Date" class="form-control" name="reg_to_faculty" @if($reg_type_faculty != null)value="{{$reg_type_faculty->to}}"@endif>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="reg_valid_amount_faculty">Charges:</label>
                                        <input type="text" class="form-control" name="reg_valid_amount_faculty" @if($reg_type_faculty != null)value="{{$reg_type_faculty->valid_amount}}"@endif>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="reg_invalid_amount_faculty">Late Fee Charges:</label>
                                        <input type="text" class="form-control" name="reg_invalid_amount_faculty" @if($reg_type_faculty != null)value="{{$reg_type_faculty->invalid_amount}}"@endif>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="reg_accompanied_person_amount_faculty">Accompanied Person Amount To Be Deducted:</label>
                                        <input type="text" class="form-control" name="reg_accompanied_person_amount_faculty" @if($reg_type_faculty != null)value="{{$reg_type_faculty->accompanied_person_amount}}"@endif>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="fixed-reg-faculty" class="div_three" @if(App\RefeeSet::where('category','Faculty')->where('fixed_amount','!=',null)->count()>0) style=" " @else style="display:none;" @endif>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="reg_fixed_amount_faculty">Fixed Amount:</label>
                                        <input type="text" class="form-control" name="reg_fixed_amount_faculty" @if($reg_type_faculty != null)value="{{$reg_type_faculty->fixed_amount}}"@endif>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="reg_accompanied_person_amount_faculty_two">Accompanied Person Amount To Be Deducted:</label>
                                        <input type="text" class="form-control" name="reg_accompanied_person_amount_faculty_two" @if($reg_type_faculty != null)value="{{$reg_type_faculty->accompanied_person_amount}}"@endif>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-sm btn-danger">Save</button>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <form action="{{route('student.ac.settings')}}" method="post">
                        @csrf
                        <div class="card-header card-header-info">
                            <h4 class="card-title ">{{ __('Accomodation Charges For Student/Post Doc ') }}</h4>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                    </button>
                                    <span>{{ session('status_three') }}</span>
                                </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    DateWise Amount <input type="radio" value="datewise-ac-student" name="ac_type_student" id="ac-datewise-student" @if(App\AcfeeSet::where('category','Student')->where('fixed_amount',null)->count()>0) checked @endif>
                                    Fixed Amount <input type="radio" value="fixed-ac-student" name="ac_type_student" id="ac-fixed-student" @if(App\AcfeeSet::where('category','Student')->where('fixed_amount','!=',null)->count()>0) checked @endif>
                                </div>
                            </div><br>
                            <div id="datewise-ac-student" class="div_two" @if(App\AcfeeSet::where('category','Student')->where('fixed_amount',null)->count()>0) style=" " @else style="display:none;" @endif>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="ac_from_student">From:</label>
                                        <input type="Date" class="form-control" name="ac_from_student" @if($ac_type_student != null)value="{{$ac_type_student->from}}"@endif>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ac_to_student">To:</label>
                                        <input type="Date" class="form-control" name="ac_to_student" @if($ac_type_student != null)value="{{$ac_type_student->to}}"@endif>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ac_valid_amount_student">Charges:</label>
                                        <input type="text" class="form-control" name="ac_valid_amount_student" @if($ac_type_student != null)value="{{$ac_type_student->valid_amount}}"@endif>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ac_invalid_amount_student">Late Fee Charges:</label>
                                        <input type="text" class="form-control" name="ac_invalid_amount_student" @if($ac_type_student != null)value="{{$ac_type_student->invalid_amount}}"@endif>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="fixed-ac-student" class="div_two" @if(App\AcfeeSet::where('category','Student')->where('fixed_amount','!=',null)->count()>0) style=" " @else style="display:none;" @endif>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="ac_fixed_amount_student">Fixed Amount:</label>
                                        <input type="text" class="form-control" name="ac_fixed_amount_student" @if($ac_type_student != null)value="{{$ac_type_student->fixed_amount}}"@endif>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-sm btn-danger">Save</button>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <form action="{{route('faculty.ac.settings')}}" method="post">
                        @csrf
                        <div class="card-header card-header-info">
                            <h4 class="card-title ">{{ __('Accomodation Charges For Faculty') }}</h4>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                    </button>
                                    <span>{{ session('status_four') }}</span>
                                </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    DateWise Amount <input type="radio" value="datewise-ac-faculty" name="ac_type_faculty" id="ac-datewise-faculty" @if(App\AcfeeSet::where('category','Faculty')->where('fixed_amount',null)->count()>0) checked @endif>
                                    Fixed Amount <input type="radio" value="fixed-ac-faculty" name="ac_type_faculty" id="ac-fixed-faculty" @if(App\AcfeeSet::where('category','Faculty')->where('fixed_amount','!=',null)->count()>0) checked @endif>
                                </div>
                            </div><br>
                            <div id="datewise-ac-faculty" class="div_four" @if(App\AcfeeSet::where('category','Faculty')->where('fixed_amount',null)->count()>0) style=" " @else style="display:none;" @endif>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="ac_from_faculty">From:</label>
                                        <input type="Date" class="form-control" name="ac_from_faculty" @if($ac_type_faculty != null)value="{{$ac_type_faculty->from}}"@endif>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ac_to_faculty">To:</label>
                                        <input type="Date" class="form-control" name="ac_to_faculty" @if($ac_type_faculty != null)value="{{$ac_type_faculty->to}}"@endif>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ac_valid_amount_faculty">Charges:</label>
                                        <input type="text" class="form-control" name="ac_valid_amount_faculty" @if($ac_type_faculty != null)value="{{$ac_type_faculty->valid_amount}}"@endif>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ac_invalid_amount_faculty">Late Fee Charges:</label>
                                        <input type="text" class="form-control" name="ac_invalid_amount_faculty" @if($ac_type_faculty != null)value="{{$ac_type_faculty->invalid_amount}}"@endif>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="fixed-ac-faculty" class="div_four" @if(App\AcfeeSet::where('category','Faculty')->where('fixed_amount','!=',null)->count()>0) style=" " @else style="display:none;" @endif>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="ac_fixed_amount_faculty">Fixed Amount:</label>
                                        <input type="text" class="form-control" name="ac_fixed_amount_faculty" @if($ac_type_faculty != null)value="{{$ac_type_faculty->fixed_amount}}"@endif>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-sm btn-danger">Save</button>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <form action="{{route('settings.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header card-header-info">
                            <h4 class="card-title ">{{ __('Bank Details & Abstract') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Bank Name') }}</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input class="form-control" name="bank" id="input-bank_name" type="text" placeholder="{{ __('Bank Name') }}" @if($settings != null)  value="{{$settings->bank}}"   @else value="{{old('bank')}}" @endif required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Account No') }}</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input class="form-control" name="account_no" type="text" placeholder="{{ __('Account No') }}" @if($settings != null)  value="{{$settings->account_no}}"   @else value="{{old('account_no')}}" @endif required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Account Holder Name') }}</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input class="form-control" name="account_holder_name" type="text" placeholder="{{ __('Account Holder Name') }}" @if($settings != null)  value="{{$settings->account_holder_name}}"   @else value="{{old('account_holder_name')}}" @endif required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('IFSC Code') }}</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input class="form-control" name="IFSC" type="text" placeholder="{{ __('IFSC Code') }}" @if($settings != null)  value="{{$settings->IFSC}}"   @else value="{{old('IFSC')}}" @endif required="true" aria-required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Abstract') }}</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input class="form-control" type="file" name="abstract" accept=".doc,.docx"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Conference Amount') }}</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input class="form-control" type="text" @if($settings != null)  value="{{$settings->conference_amount}}"   @else value="{{old('conference_amount')}}" @endif name="conference_amount" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-sm btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>     
    </div>
</div>  
@endsection
@section('js')
<script>
    $(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        // console.log(inputValue);
        
        if (inputValue == 'datewise-reg-student' || inputValue == 'fixed-reg-student') {
            var targetDiv = $("#" + inputValue);
            $(".div").not(targetDiv).hide();
            $(targetDiv).show();
        }
    });
});
</script>

<script>
        $(document).ready(function(){
        $('input[type="radio"]').click(function(){
            var inputValue = $(this).attr("value");
            // console.log(inputValue);
            
            if (inputValue == 'datewise-reg-faculty' || inputValue == 'fixed-reg-faculty') {
                var targetDiv = $("#" + inputValue);
                $(".div_three").not(targetDiv).hide();
                $(targetDiv).show();
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        if (inputValue == 'datewise-ac-student' || inputValue == 'fixed-ac-student') {
            var targetDiv = $("#" + inputValue);
            $(".div_two").not(targetDiv).hide();
            $(targetDiv).show();
        }
    });
});
</script>

<script>
    $(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        if (inputValue == 'datewise-ac-faculty' || inputValue == 'fixed-ac-faculty') {
            var targetDiv = $("#" + inputValue);
            $(".div_four").not(targetDiv).hide();
            $(targetDiv).show();
        }
    });
});
</script>
@endsection