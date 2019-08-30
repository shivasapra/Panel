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
                                                <input type="radio" name="subject_area" value="Biophysics/Biochemistry/Molecular Biology (bbmb)" @if($user->abstract != null) disabled @if($user->abstract->subject_area == "Biophysics/Biochemistry/Molecular Biology (bbmb)") checked  @endif @endif  required> Biophysics/Biochemistry/Molecular Biology (bbmb) <br>
                                                <input type="radio" name="subject_area" value="Developmental Biology (db)" @if($user->abstract != null) disabled @if($user->abstract->subject_area == "Developmental Biology (db)") checked  @endif @endif  required> Developmental Biology (db) <br>
                                                <input type="radio" name="subject_area" value="Neurobiology (nb)" @if($user->abstract != null) disabled @if($user->abstract->subject_area == "Neurobiology (nb)" ) checked  @endif @endif required> Neurobiology (nb) <br>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <input type="radio" name="subject_area" value="Immunology (im)" @if($user->abstract != null) disabled @if($user->abstract->subject_area == "Immunology (im)" ) checked  @endif @endif required> Immunology (im) <br>
                                                <input type="radio" name="subject_area" value="Microbiology (mib)" @if($user->abstract != null) disabled @if($user->abstract->subject_area == "Microbiology (mib)" ) checked  @endif @endif required> Microbiology (mib) <br>
                                                <input type="radio" name="subject_area" value="Evolution (evo)" @if($user->abstract != null) disabled @if($user->abstract->subject_area == "Evolution (evo)" ) checked  @endif @endif required> Evolution (evo) <br>
                                                <input type="radio" name="subject_area" value="Genetics/Cytogenetics (gc)" @if($user->abstract != null) disabled @if($user->abstract->subject_area == "Genetics/Cytogenetics (gc)" ) checked  @endif @endif required> Genetics/Cytogenetics (gc) <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">{{ __('Presenting Author Name:') }}</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" @if($user->abstract != null) value="{{$user->abstract->presenting_author_name}}" disabled @else value="{{$user->name}}" @endif name="presenting_author_name" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">{{ __('Do You Want To Submit Abstract For Poster?') }}</label>
                                        <div class="col-sm-4">
                                            <input type="radio" name="poster" value="poster_yes" id="poster_yes" onclick="check();" @if($user->abstract != null) disabled @if($user->abstract->poster != null or $user->abstract->same != null ) checked  @endif @endif required> Yes
                                            <input type="radio" name="poster" value="poster_No"  id="poster_no"  onclick="check();" @if($user->abstract != null) disabled @if($user->abstract->poster == null and $user->abstract->same == null ) checked  @endif @endif required> No
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">{{ __('Do You Want To Submit Abstract For talk?') }}</label>
                                        <div class="col-sm-4">
                                            <input type="radio" name="talk" value="talk_yes" id="talk_yes" onclick="check();" @if($user->abstract != null) disabled @if($user->abstract->talk != null or $user->abstract->same != null ) checked  @endif @endif required> Yes
                                            <input type="radio" name="talk" value="talk_No"  id="talk_yes" onclick="check();" @if($user->abstract != null) disabled @if($user->abstract->talk == null and $user->abstract->same == null ) checked  @endif @endif required > No
                                        </div>
                                    </div>
                                    <br>
                                    @if($user->abstract != null)
                                        @if($user->abstract->same != null)
                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">{{ __("Do You Want To Submit Same Abstract For Both ?") }}</label>
                                                <div class="col-sm-4">
                                                    <input type="radio" name="same" value="same_Yes" id="same_yes" onclick="checkSame();" checked disabled  required> Yes
                                                    <input type="radio" name="same" value="same_No" id="same_no" onclick="checkSame();"    disabled required> No
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    <div id="same"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-danger">
                            <b>*Note:- </b>  &nbsp; Upload only preassigned template in <b> &nbsp;doc/docx &nbsp;</b> format only.
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
            @if($user->abstract == null)
                <div class="text-center">
                    <button class="btn btn-md btn-info" type="submit">Submit</button>
                </div>
            @endif
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
                                '<button type="button" id="poster_button" onclick="clickitposter();" @if($user->abstract != null) style="display:none;" @endif class="btn btn-sm btn-rounded btn-info pull-right"><i class="fa fa-upload" aria-hidden="true"></i></button>'+
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
                        '<input type="file" name="poster" accept=".doc,.docx" id="poster" style="display:none";>'+
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
                                    '<button type="button" id="talk_button" onclick="clickittalk();" @if($user->abstract != null) style="display:none;" @endif  class="btn btn-sm btn-rounded btn-info pull-right"><i class="fa fa-upload" aria-hidden="true"></i></button>'+
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
                        '<input type="file" name="talk" accept=".doc,.docx" id="talk" style="display:none";>'+
                    '</div>';
                $('#abstract_talk').html(talk);
            }else{
                $('#abstract_talk').html("");
            }

        @if($user->abstract == null)
            if($('#poster_yes').is(':checked') && $('#talk_yes').is(':checked')){
                var data =  
                    '<div class="row">'+
                        '<label class="col-sm-4 col-form-label">{{ __("Do You Want To Submit Same Abstract For Both ?") }}</label>'+
                        '<div class="col-sm-4">'+
                            '<input type="radio" name="same" value="same_Yes" id="same_yes" onclick="checkSame();"  required> Yes'+
                            '<input type="radio" name="same" value="same_No" id="same_no" onclick="checkSame();" checked  required> No'+
                        '</div>'+
                    '</div>';
                $('#same').html(data);
            }
            else{
                $('#same').html('');
            }
        @endif
            
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
                                    '<button type="button" id="same_button" onclick="clickitsame();" @if($user->abstract != null) style="display:none;" @endif class="btn btn-sm btn-rounded btn-info pull-right"><i class="fa fa-upload" aria-hidden="true"></i></button>'+
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
                        '<input type="file" name="same" accept=".doc,.docx" id="same_b" style="display:none";>'+
                    '</div>';
                $('#same_abstract').html(same);
            }
            if($('#same_no').is(':checked')){
                check();
                $('#same_abstract').html('');
            }
        }
    </script>

    <script>
        window.onload=function(){
            check();
            checkSame();
        }
    </script>
@stop