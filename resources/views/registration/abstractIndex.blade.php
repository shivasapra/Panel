@extends('layouts.app', ['activePage' => 'Abstracts', 'titlePage' => __('Abstracts')])

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
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
                        <form method="post" action="{{route('abstract.talk.download')}}">
                            @csrf
                            <div class="table-responsive">
                                <table class="table example">
                                <thead class=" text-danger">
                                    <tr>
                                    <th>Sno.</th>
                                    <th>Registration ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Institute</th>
                                    <th>Subject Area</th>
                                    <th>View</th>
                                    <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i =1 ;?>
                                    @foreach(App\Abtract::where('talk','!=',null)->orWhere('same','!=',null)->get()->reverse() as $abstract)
                                    <tr>
                                        <th>{{$i++}}.</th>
                                        <th>
                                            @if($abstract->user->details != null)
                                                {{$abstract->user->details->registration_id}}
                                            @else
                                                {{__('--')}}
                                            @endif
                                        </th>
                                        <td>{{$abstract->user->name}}</td>
                                        <td>{{$abstract->user->email}}</td>
                                        <td>
                                            @if($abstract->user->details != null)
                                                {{$abstract->user->details->institute}}
                                            @else
                                                {{'--'}}
                                            @endif
                                        </td>
                                        <td>{{$abstract->subject_area}}</td>
                                        <td class="td_talk">
                                            <input type="text" class="ab_id" value="{{$abstract->id}}" hidden>
                                            <button type="button" onclick="talk(this);" class="btn-btn sm btn-info">View</button>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="talk[]" value="{{$abstract->id}}" id="">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table><br>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-md btn-danger">Download</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="poster">
                            <div class="table-responsive">
                            <form method="post" action="{{route('abstract.poster.download')}}">
                                @csrf
                                <table class="table example">
                                <thead class=" text-danger">
                                    <tr>
                                    <th>Sno.</th>
                                    <th>Registration ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Institute</th>
                                    <th>Subject Area</th>
                                    <th>View</th>
                                    <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i =1;?>
                                    @foreach(App\Abtract::where('poster','!=',null)->orWhere('same','!=',null)->get()->reverse() as $abstract)
                                    <tr>
                                        <th>{{$i++}}.</th>
                                        <th>
                                            @if($abstract->user->details != null)
                                                {{$abstract->user->details->registration_id}}
                                            @else
                                                {{__('--')}}
                                            @endif
                                        </th>
                                        <td>{{$abstract->user->name}}</td>
                                        <td>{{$abstract->user->email}}</td>
                                        <td>
                                            @if($abstract->user->details != null)
                                                {{$abstract->user->details->institute}}
                                            @else
                                                {{'--'}}
                                            @endif
                                        </td>
                                        <td>{{$abstract->subject_area}}</td>
                                        <td class="td_poster">
                                            <input type="text" class="ab_id" value="{{$abstract->id}}" hidden>
                                            <button type="button" onclick="poster(this);" class="btn-btn sm btn-info">View</button>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="poster[]" value="{{$abstract->id}}" id="">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table><br>
                                <div class="float-right">
                                        <button type="submit" class="btn btn-md btn-danger">Download</button>
                                    </div>
                            </form>
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
@if($array != 1)
    @foreach(collect($array) as $a)
        <iframe src="{{$a}}"  frameborder="0" style="width:100%;height:500px;" style="display:none;"></iframe>
    @endforeach
@endif


@endsection
@section('js')

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>


<script>
        $(document).ready(function() {
      $('.example').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          ]
      } );
  } );
  </script>
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
                                '<iframe src="'+
                                '@if($a->talk != null)'+
                                    '{{asset(explode(".",$a->talk)[0]."html")}}'+
                                '@else'+
                                    '{{asset(explode(".",$a->same)[0]."html")}}'+
                                '@endif"  frameborder="0" style="width:100%;height:500px;"></iframe>'+
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
                                '<iframe src="'+
                                '@if($a->poster != null)'+
                                    '{{asset(explode(".",$a->poster)[0]."html")}}'+
                                '@else'+
                                    '{{asset(explode(".",$a->same)[0]."html")}}'+
                                '@endif"  frameborder="0" style="width:100%;height:500px;"></iframe>'+
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