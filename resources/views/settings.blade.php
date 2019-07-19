@extends('layouts.app', ['activePage' => 'Settings', 'titlePage' => __('Settings')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
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
                                <span>{{ session('status') }}</span>
                            </div>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-3">
                               DateWise <input type="radio" value="datewise-reg-student" name="reg_type_student" id="reg-datewise-student">
                               Fixed <input type="radio" value="fixed-reg-student" name="reg_type_student" id="reg-fixed-student">
                            </div>
                        </div><br>
                        <div id="datewise-reg-student" class="div" style="display:none;">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="from_student">From:</label>
                                    <input type="Date" class="form-control" name="from_student">
                                </div>
                                <div class="col-md-3">
                                    <label for="to_student">To:</label>
                                    <input type="Date" class="form-control" name="to_student">
                                </div>
                                <div class="col-md-3">
                                    <label for="valid_amount_student">Valid Period Amount:</label>
                                    <input type="text" class="form-control" name="valid_amount_student">
                                </div>
                                <div class="col-md-3">
                                    <label for="invalid_amount_student">Invalid Period Amount:</label>
                                    <input type="text" class="form-control" name="invalid_amount_student">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="accompanied_person_amount_student">Accompanied Person Amount To Be Deducted:</label>
                                    <input type="text" class="form-control" name="accompanied_person_amount_student">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="fixed-reg-student" class="div" style="display:none;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="fixed_amount_student">Fixed Amount:</label>
                                    <input type="text" class="form-control" name="fixed_amount_student">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
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
                                <span>{{ session('status') }}</span>
                            </div>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-3">
                                DateWise <input type="radio" value="datewise-reg-faculty" name="reg_type_faculty" id="reg-datewise-faculty">
                                Fixed <input type="radio" value="fixed-reg-faculty" name="reg_type_faculty" id="reg-fixed-faculty">
                            </div>
                        </div><br>
                        <div id="datewise-reg-faculty" class="div_three" style="display:none;">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="from_faculty">From:</label>
                                    <input type="Date" class="form-control" name="from_faculty">
                                </div>
                                <div class="col-md-3">
                                    <label for="to_faculty">To:</label>
                                    <input type="Date" class="form-control" name="to_faculty">
                                </div>
                                <div class="col-md-3">
                                    <label for="valid_amount_faculty">Valid Period Amount:</label>
                                    <input type="text" class="form-control" name="valid_amount_faculty">
                                </div>
                                <div class="col-md-3">
                                    <label for="invalid_amount_faculty">Invalid Period Amount:</label>
                                    <input type="text" class="form-control" name="invalid_amount_faculty">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="accompanied_person_amount_faculty">Accompanied Person Amount To Be Deducted:</label>
                                    <input type="text" class="form-control" name="accompanied_person_amount_faculty">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="fixed-reg-faculty" class="div_three" style="display:none;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="fixed_amount_faculty">Fixed Amount:</label>
                                    <input type="text" class="form-control" name="fixed_amount_faculty">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">{{ __('Accomodation Fee Settings ') }}</h4>
                    </div>
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
                        <div class="row">
                            <div class="col-md-2">
                                DateWise <input type="radio" value="datewise-ac-student" name="ac_type_student" id="ac-datewise-student">
                                Fixed <input type="radio" value="fixed-ac-student" name="ac_type_student" id="ac-fixed-student">
                            </div>
                        </div><br>
                        <div id="datewise-ac-student" class="div_two" style="display:none;">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="from_student">From:</label>
                                    <input type="Date" class="form-control" name="from_student">
                                </div>
                                <div class="col-md-3">
                                    <label for="to_student">To:</label>
                                    <input type="Date" class="form-control" name="to_student">
                                </div>
                                <div class="col-md-3">
                                    <label for="valid_amount_student">Valid Period Amount:</label>
                                    <input type="text" class="form-control" name="valid_amount_student">
                                </div>
                                <div class="col-md-3">
                                    <label for="invalid_amount_student">Invalid Period Amount:</label>
                                    <input type="text" class="form-control" name="invalid_amount_student">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="fixed-ac-student" class="div_two" style="display:none;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="fixed_amount_student">Fixed Amount:</label>
                                    <input type="text" class="form-control" name="fixed_amount_student">
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
    $(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        console.log(inputValue);
        
        if (inputValue == 'datewise-reg' || inputValue == 'fixed-reg') {
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
        if (inputValue == 'datewise-ac' || inputValue == 'fixed-ac') {
            var targetDiv = $("#" + inputValue);
            $(".div_two").not(targetDiv).hide();
            $(targetDiv).show();
        }
    });
});
</script>
@endsection