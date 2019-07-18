@extends('layouts.app', ['activePage' => 'Settings', 'titlePage' => __('Settings')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">{{ __('Registration Fee Settings ') }}</h4>
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
                                DateWise <input type="radio" name="type" id="reg-datewise">
                                Fixed <input type="radio" name="type" id="reg-fixed">
                            </div>
                        </div><br>
                        <div id="datewise-reg">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="from">From:</label>
                                    <input type="Date" class="form-control" name="from">
                                </div>
                                <div class="col-md-3">
                                    <label for="to">To:</label>
                                    <input type="Date" class="form-control" name="to">
                                </div>
                                <div class="col-md-3">
                                    <label for="valid_amount">Valid Period Amount:</label>
                                    <input type="text" class="form-control" name="valid_amount">
                                </div>
                                <div class="col-md-3">
                                    <label for="valid_amount">Invalid Period Amount:</label>
                                    <input type="text" class="form-control" name="valid_amount">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="accompanied_person_amount">Accompanied Person Amount To Be Deducted:</label>
                                    <input type="text" class="form-control" name="accompanied_person_amount">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="fixed-reg">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="fixed_amount">Fixed Amount:</label>
                                    <input type="text" class="form-control" name="fixed_amount">
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