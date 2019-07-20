@extends('layouts.app', ['activePage' => 'Abstract', 'titlePage' => 'Abstract '.'('.$user->name.')'])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('abstract.submit',$user)}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">{{ __('Abstract For Poster') }}
                                <button type="button" id="poster_button" class="btn btn-sm btn-rounded btn-success pull-right"><i class="fa fa-upload" aria-hidden="true"></i></button>
                                <button type="button"  class="btn btn-sm btn-rounded btn-success pull-right"><i class="fa fa-download" aria-hidden="true"></i></button>
                            </h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <iframe src="@if($user->abstract != null and $user->abstract->poster != null){{asset($user->abstract->poster)}} @else test.html @endif"  frameborder="0" style="width:100%;height:500px;"></iframe>
                        </div>
                        <input type="file" name="poster" id="poster" style="display:none";>
                        <br><p style="font-size:20px;margin-left:25px;"><b>Terms & Conditions:</b></p>
                        <p style="font-size:17px;margin-left:25px;margin-right:10px;">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <div class="card-footer ml-auto mr-auto">
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Abstract For Talk') }}
                                    <button type="button" id="talk_button" class="btn btn-sm btn-rounded btn-primary pull-right"><i class="fa fa-upload" aria-hidden="true"></i></button>
                                <button type="button"  class="btn btn-sm btn-rounded btn-primary pull-right"><i class="fa fa-download" aria-hidden="true"></i></button>
                            </h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <iframe src="@if($user->abstract != null and $user->abstract->talk != null){{asset($user->abstract->talk)}} @else test.html @endif" frameborder="0" style="width:100%;height:500px;"></iframe>
                        </div>
                        <input type="file" name="talk" id="talk" style="display:none";>
                        <br><p style="font-size:20px;margin-left:25px;"><b>Terms & Conditions:</b></p>
                        <p style="font-size:17px;margin-left:25px;margin-right:10px;">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <div class="card-footer ml-auto mr-auto">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-info">Submit</button>
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

    $("#poster_button").click(function () {
        $('#poster').click();
    });

    $("#talk_button").click(function () {
        $('#talk').click();
    });
});


</script>
@stop