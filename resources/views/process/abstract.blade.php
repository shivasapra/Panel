@extends('layouts.app', ['activePage' => 'Abstract', 'titlePage' => 'Abstract'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Abstract') }}</h4>
                            <p class="card-category"></p>
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
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">{{ __('Subject Area (Closest) :') }}</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <input type="radio" name="subject_area" value="Biophysics/Biochemistry/Molecular Biology (bbmb)"  required> Biophysics/Biochemistry/Molecular Biology (bbmb) <br>
                                                <input type="radio" name="subject_area" value="Developmental Biology (db)"  required> Developmental Biology (db) <br>
                                                <input type="radio" name="subject_area" value="Neurobiology (nb)" required> Neurobiology (nb) <br>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <input type="radio" name="subject_area" value="Immunology (im)" required> Immunology (im) <br>
                                                <input type="radio" name="subject_area" value="Genetics (gen)" required> Genetics (gen) <br>
                                                <input type="radio" name="subject_area" value="Evolution (evo)" required> Evolution (evo) <br>
                                                <input type="radio" name="subject_area" value="Genetics/Cytogenetics (gc)" required> Genetics/Cytogenetics (gc) <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">{{ __('Presenting Author Name:') }}</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="presenting_author_name" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">{{ __('Do You Want To Submit Abstract For Poster?') }}</label>
                                        <div class="col-sm-4">
                                            <input type="radio" name="poster" value="poster_yes" id="poster_yes" onclick="check();" required> Yes
                                            <input type="radio" name="poster" value="poster_No" onclick="check();" required> No
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">{{ __('Do You Want To Submit Abstract For talk?') }}</label>
                                        <div class="col-sm-4">
                                            <input type="radio" name="talk" value="talk_yes" id="talk_yes" onclick="check();" required> Yes
                                            <input type="radio" name="talk" value="talk_No" onclick="check();" required> No
                                        </div>
                                    </div>
                                    <br>
                                    <div id="target">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function check(){
            if($('#poster_yes').is(':checked')){
                if($('#talk_yes').is(':checked')){
                    var data =  
                        '<div class="row">'+
                            '<label class="col-sm-4 col-form-label">{{ __("Do You Want To Submit Same Abstract For Both ?") }}</label>'+
                            '<div class="col-sm-4">'+
                                '<input type="radio" name="same" value="Yes"   required> Yes'+
                                '<input type="radio" name="same" value="No"  required> No'+
                            '</div>'+
                        '</div>';
                        
                    $('#target').html(data);
                }
                else{
                    $('#target').html('');
                }
            }
        }
    </script>
@stop