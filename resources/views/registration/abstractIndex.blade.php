@extends('layouts.app', ['activePage' => 'Abstracts', 'titlePage' => __('Abstracts')])
@section('title')
Users
@stop
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-danger">
                    <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <span class="nav-tabs-title">Abstracts:</span>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#talk" data-toggle="tab">
                            <i class="material-icons">airplay</i> For Talk
                            <div class="ripple-container"></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#poster" data-toggle="tab">
                            <i class="material-icons">airplay</i> For Poster
                            <div class="ripple-container"></div>
                            </a>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="talk">
                            <div class="table-responsive">
                                <table class="table">
                                <thead class=" text-danger">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Institute</th>
                                    <th>Department</th>
                                    <th>View</th>
                                </thead>
                                <tbody>
                                    @foreach(App\Abtract::where('talk','!=',null)->take(5)->get() as $abstract)
                                    <tr>
                                        <td>{{$abstract->user->name}}</td>
                                        <td>{{$abstract->user->email}}</td>
                                        <td>
                                            @if($abstract->user->details != null)
                                                {{$abstract->user->details->phone}}
                                            @else
                                                {{'--'}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($abstract->user->details != null)
                                                {{$abstract->user->details->institute}}
                                            @else
                                                {{'--'}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($abstract->user->details != null)
                                                {{$abstract->user->details->department}}
                                            @else
                                                {{'--'}}
                                            @endif
                                        </td>
                                        <td class="td_talk">
                                            <input type="text" class="ab_id" value="{{$abstract->id}}" hidden>
                                            <button type="button" onclick="talk(this);" class="btn-btn sm btn-info">View</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="poster">
                            <div class="table-responsive">
                                <table class="table">
                                <thead class=" text-danger">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Institute</th>
                                    <th>Department</th>
                                    <th>View</th>
                                </thead>
                                <tbody>
                                    @foreach(App\Abtract::where('poster','!=',null)->take(5)->get() as $abstract)
                                    <tr>
                                        <td>{{$abstract->user->name}}</td>
                                        <td>{{$abstract->user->email}}</td>
                                        <td>
                                            @if($abstract->user->details != null)
                                                {{$abstract->user->details->phone}}
                                            @else
                                                {{'--'}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($abstract->user->details != null)
                                                {{$abstract->user->details->institute}}
                                            @else
                                                {{'--'}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($abstract->user->details != null)
                                                {{$abstract->user->details->department}}
                                            @else
                                                {{'--'}}
                                            @endif
                                        </td>
                                        <td class="td_poster">
                                            <input type="text" class="ab_id" value="{{$abstract->id}}" hidden>
                                            <button type="button" onclick="poster(this);" class="btn-btn sm btn-info">View</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
      </div>
    </div>
  </div>
<a href="#" id="target2" style="display:none;" data-toggle="modal" data-target="#talk_view"></a>
<a href="#" id="target" style="display:none;" data-toggle="modal" data-target="#poster_view"></a>
<div id="talk-modal"></div>
<div id="poster-modal"></div>
@endsection
@section('js')
  <script>
      function talk(temp){
          var i = $(temp).parents('.td_talk').find('.ab_id').val();
          @foreach(App\Abtract::all() as $a)
            var j = {{$a->id}};
            if (i == j) {
                var data = 
                '<div class="modal fade" id="talk_view">'+
                    '<div class="modal-dialog modal-dialog modal-dialog-centered">'+
                        '<div class="modal-content">'+
            
                            '<!-- Modal Header -->'+
                            '<div class="modal-header">'+
                                '<h4 class="modal-title">Talk Abstract</h4>'+
                                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                            '</div>'+
            
                            '<!-- Modal body -->'+
                            '<div class="modal-body">'+
                                '<iframe src="{{asset($a->talk)}}" frameborder="0" style="width:100%;height:500px;"></iframe>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
            }
          @endforeach
                
            
         
	  $('#talk-modal').html(data);
	  $('#target2').click();
          
      }

      function poster(temp){
          var i = $(temp).parents('.td_poster').find('.ab_id').val();
          @foreach(App\Abtract::all() as $a)
            var j = {{$a->id}};
            if (i == j) {
                var data = 
                '<div class="modal fade" id="poster_view">'+
                    '<div class="modal-dialog modal-dialog modal-dialog-centered">'+
                        '<div class="modal-content">'+
            
                            '<!-- Modal Header -->'+
                            '<div class="modal-header">'+
                                '<h4 class="modal-title">Poster Abstract</h4>'+
                                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                            '</div>'+
            
                            '<!-- Modal body -->'+
                            '<div class="modal-body">'+
                                '<iframe src="{{asset($a->poster)}}" frameborder="0" style="width:100%;height:500px;"></iframe>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
            }
          @endforeach
                
            
         
	  $('#poster-modal').html(data);
	  $('#target').click();
          
      }
  </script>
@stop