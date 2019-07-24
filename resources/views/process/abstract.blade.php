@extends('layouts.app', ['activePage' => 'Abstract', 'titlePage' => 'Abstract'])
<?php use App\Settings;?>
@section('content')
<div class="content">
    <div class="container-fluid">
        <form action="{{route('abstract.submit',$user)}}" method="post" enctype="multipart/form-data">
           @csrf
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
                                    <div id="same"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="abstract_poster"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="abstract_talk"></div>
                        </div>
                        <div class="col-md-12">
                            <div id="same_abstract"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-md btn-info" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
    <script>
        
        function clickitposter(){
            $('#poster').click();
        }

        function clickittalk(){
            $('#talk').click();
        }

        function clickitsame(){
            $('#same_b').click();
        }
            
        
    </script>

    <script>
        function check(){
            if($('#poster_yes').is(':checked')){
                var poster = 
                    '<div class="card ">'+
                        '<div class="card-header card-header-info">'+
                            '<h4 class="card-title">{{ __("Abstract For Poster") }}'+
                                '<button type="button" id="poster_button" onclick="clickitposter();" class="btn btn-sm btn-rounded btn-info pull-right"><i class="fa fa-upload" aria-hidden="true"></i></button>'+
                                '<a href="@if($user->abstract != null and $user->abstract->poster != null)'+
                                            '{{asset($user->abstract->poster)}} '+
                                        '@else '+
                                            '{{asset(Settings::first()->abstract)}}'+
                                        '@endif" download   class="btn btn-sm btn-rounded btn-info pull-right"><i class="fa fa-download" aria-hidden="true"></i></a>'+
                            '</h4>'+
                            '<p class="card-category"></p>'+
                        '</div>'+
                        '<div class="card-body">'+
                            '<iframe src="'+
                                '@if($user->abstract != null and $user->abstract->poster != null)'+
                                    '{{asset(explode(".",$user->abstract->poster)[0]."html")}}'+
                                '@else '+
                                    '{{asset(explode(".",Settings::first()->abstract)[0]."html")}}'+
                                '@endif"  frameborder="0" style="width:100%;height:500px;"></iframe>'+
                        '</div>'+
                        '<input type="file" name="poster" id="poster" style="display:none";>'+
                    '</div>';
                $('#abstract_poster').html(poster);
            }else{
                $('#abstract_poster').html("");
            }

            if($('#talk_yes').is(':checked')){
                var talk = 
                    '<div class="card ">'+
                        '<div class="card-header card-header-info">'+
                            '<h4 class="card-title">{{ __("Abstract For Talk") }}'+
                                    '<button type="button" id="talk_button" onclick="clickittalk();"  class="btn btn-sm btn-rounded btn-info pull-right"><i class="fa fa-upload" aria-hidden="true"></i></button>'+
                                    '<a href="@if($user->abstract != null and $user->abstract->talk != null)'+
                                            '{{asset($user->abstract->talk)}} '+
                                        '@else '+
                                            '{{asset(Settings::first()->abstract)}}'+
                                        '@endif" download   class="btn btn-sm btn-rounded btn-info pull-right"><i class="fa fa-download" aria-hidden="true"></i></a>'+
                            '</h4>'+
                            '<p class="card-category"></p>'+
                        '</div>'+
                        '<div class="card-body">'+
                            '<iframe src="'+
                                '@if($user->abstract != null and $user->abstract->talk != null)'+
                                    '{{asset(explode(".",$user->abstract->talk)[0]."html")}}'+
                                '@else '+
                                '{{asset(explode(".",Settings::first()->abstract)[0]."html")}}'+
                                '@endif" frameborder="0" style="width:100%;height:500px;">'+
                            '</iframe>'+
                        '</div>'+
                        '<input type="file" name="talk" id="talk" style="display:none";>'+
                    '</div>';
                $('#abstract_talk').html(talk);
            }else{
                $('#abstract_talk').html("");
            }

            if($('#poster_yes').is(':checked') && $('#talk_yes').is(':checked')){
                var data =  
                    '<div class="row">'+
                        '<label class="col-sm-4 col-form-label">{{ __("Do You Want To Submit Same Abstract For Both ?") }}</label>'+
                        '<div class="col-sm-4">'+
                            '<input type="radio" name="same" value="same_Yes" id="same_yes" onclick="checkSame();" required> Yes'+
                            '<input type="radio" name="same" value="same_No" id="same_no" onclick="checkSame();" checked  required> No'+
                        '</div>'+
                    '</div>';
                $('#same').html(data);
            }
            else{
                $('#same').html('');
            }
            
        }
    </script>

    <script>
        function checkSame(){
            if($('#same_yes').is(':checked')){
                $('#abstract_talk').html("");
                $('#abstract_poster').html("");
                var same = 
                    '<div class="card ">'+
                        '<div class="card-header card-header-info">'+
                            '<h4 class="card-title">{{ __("Abstract For Poster & Talk") }}'+
                                    '<button type="button" id="same_button" onclick="clickitsame();"  class="btn btn-sm btn-rounded btn-info pull-right"><i class="fa fa-upload" aria-hidden="true"></i></button>'+
                                    '<a href="@if($user->abstract != null and $user->abstract->same != null)'+
                                            '{{asset($user->abstract->same)}} '+
                                        '@else '+
                                            '{{asset(Settings::first()->abstract)}}'+
                                        '@endif" download   class="btn btn-sm btn-rounded btn-info pull-right"><i class="fa fa-download" aria-hidden="true"></i></a>'+
                            '</h4>'+
                            '<p class="card-category"></p>'+
                        '</div>'+
                        '<div class="card-body">'+
                            '<iframe src="'+
                                '@if($user->abstract != null and $user->abstract->same != null)'+
                                    '{{asset(explode(".",$user->abstract->same)[0]."html")}}'+
                                '@else '+
                                    '{{asset(explode(".",Settings::first()->abstract)[0]."html")}}'+
                                '@endif" frameborder="0" style="width:100%;height:500px;">'+
                            '</iframe>'+
                        '</div>'+
                        '<input type="file" name="same" id="same_b" style="display:none";>'+
                    '</div>';
                $('#same_abstract').html(same);
            }
            if($('#same_no').is(':checked')){
                check();
                $('#same_abstract').html('');
            }
        }
    </script>

@stop