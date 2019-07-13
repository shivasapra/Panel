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
                            <h4 class="card-title">{{ __('Abstract For Poster') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <iframe src="@if($user->abstract != null){{asset($user->abstract->poster)}}"@endif frameborder="0" style="width:100%;height:500px;"></iframe>
                        </div>
                        <input type="file" name="poster">
                        <div class="card-footer ml-auto mr-auto">
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Abstract For Talk') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <iframe src="@if($user->abstract != null){{asset($user->abstract->talk)}}"@endif frameborder="0" style="width:100%;height:500px;"></iframe>
                        </div>
                        <input type="file" name="talk">
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
});
</script>
@stop