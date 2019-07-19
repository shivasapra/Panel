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
                                        <label for="reg_from_student">From:</label>
                                        <input type="Date" class="form-control" name="reg_from_student">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="reg_to_student">To:</label>
                                        <input type="Date" class="form-control" name="reg_to_student">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="reg_valid_amount_student">Valid Period Amount:</label>
                                        <input type="text" class="form-control" name="reg_valid_amount_student">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="reg_invalid_amount_student">Invalid Period Amount:</label>
                                        <input type="text" class="form-control" name="reg_invalid_amount_student">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="reg_accompanied_person_amount_student">Accompanied Person Amount To Be Deducted:</label>
                                        <input type="text" class="form-control" name="reg_accompanied_person_amount_student">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="fixed-reg-student" class="div" style="display:none;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="reg_fixed_amount_student">Fixed Amount:</label>
                                        <input type="text" class="form-control" name="reg_fixed_amount_student">
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
                                        <label for="reg_from_faculty">From:</label>
                                        <input type="Date" class="form-control" name="reg_from_faculty">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="reg_to_faculty">To:</label>
                                        <input type="Date" class="form-control" name="reg_to_faculty">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="reg_valid_amount_faculty">Valid Period Amount:</label>
                                        <input type="text" class="form-control" name="reg_valid_amount_faculty">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="reg_invalid_amount_faculty">Invalid Period Amount:</label>
                                        <input type="text" class="form-control" name="reg_invalid_amount_faculty">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="reg_accompanied_person_amount_faculty">Accompanied Person Amount To Be Deducted:</label>
                                        <input type="text" class="form-control" name="reg_accompanied_person_amount_faculty">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="fixed-reg-faculty" class="div_three" style="display:none;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="reg_fixed_amount_faculty">Fixed Amount:</label>
                                        <input type="text" class="form-control" name="reg_fixed_amount_faculty">
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
                            <h4 class="card-title "><b>Student/PostDoc:</b> {{ __('Accomodation Fee Settings ') }}</h4>
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
                                        <label for="ac_ac_from_student">From:</label>
                                        <input type="Date" class="form-control" name="ac_ac_from_student">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ac_ac_to_student">To:</label>
                                        <input type="Date" class="form-control" name="ac_ac_to_student">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ac_ac_valid_amount_student">Valid Period Amount:</label>
                                        <input type="text" class="form-control" name="ac_ac_valid_amount_student">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ac_ac_invalid_amount_student">Invalid Period Amount:</label>
                                        <input type="text" class="form-control" name="ac_ac_invalid_amount_student">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="fixed-ac-student" class="div_two" style="display:none;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="ac_ac_fixed_amount_student">Fixed Amount:</label>
                                        <input type="text" class="form-control" name="ac_ac_fixed_amount_student">
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
                            <h4 class="card-title "><b>Faculty:</b> {{ __('Accomodation Fee Settings ') }}</h4>
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
                                    DateWise <input type="radio" value="datewise-ac-faculty" name="ac_type_faculty" id="ac-datewise-faculty">
                                    Fixed <input type="radio" value="fixed-ac-faculty" name="ac_type_faculty" id="ac-fixed-faculty">
                                </div>
                            </div><br>
                            <div id="datewise-ac-faculty" class="div_four" style="display:none;">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="ac_from_faculty">From:</label>
                                        <input type="Date" class="form-control" name="ac_from_faculty">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ac_to_faculty">To:</label>
                                        <input type="Date" class="form-control" name="ac_to_faculty">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ac_valid_amount_faculty">Valid Period Amount:</label>
                                        <input type="text" class="form-control" name="ac_valid_amount_faculty">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ac_invalid_amount_faculty">Invalid Period Amount:</label>
                                        <input type="text" class="form-control" name="ac_invalid_amount_faculty">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="fixed-ac-faculty" class="div_four" style="display:none;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="ac_fixed_amount_faculty">Fixed Amount:</label>
                                        <input type="text" class="form-control" name="ac_fixed_amount_faculty">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-sm btn-danger">Save</button>
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