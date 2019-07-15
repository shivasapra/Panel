@extends('layouts.app', ['activePage' => 'Feedback', 'titlePage' => 'Feedback'])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('feedback.submit')}}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
                <div class="card-header card-header-info">
                    <h4 class="card-title">{{ __('Share Feedback') }}</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 text-center offset-3">
                            <img src="{{asset('material\img\Feedback.jpg')}}" alt="feedback" class="img-responsive img-fluid">
                            <textarea name="feedback" id="" placeholder="Enter Feedback..." class="form-control"  style="height:120px !important;border:1px solid #ddd;padding:10px;"></textarea>
                            <button type="submit" class="btn btn-md btn-info">Submit</button>
                        </div>
                    </div>
                </div>  
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection