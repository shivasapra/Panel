@extends('layouts.app', ['activePage' => 'Abstract Report', 'titlePage' => __('Abstract Report')])

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
              <div class="card-header card-header-info">
                <h4 class="card-title ">{{ __('Abstract Report') }}</h4>
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
                <div class="table-responsive">
                  <table class="table" id="example">
                    <thead class=" text-info">
                        <th>
                            {{ __('Sno.') }}
                        </th>
                        <th>
                            {{ __('Registration Id') }}
                        </th>
                        <th>
                            {{ __('Name') }}
                        </th>
                        <th>
                            {{ __('Email') }}
                        </th>
                        <th>
                            {{ __('Institute') }}
                        </th>
                        <th>
                            {{ __('Subject Area') }}
                        </th>
                        <th>
                            {{ __('Abstract For') }}
                        </th>
                    </thead>
                    <tbody>
                        <?php $i = 1;?>
                      @foreach(App\User::where('admin',0)->get() as $user)
                        @if($user->abstract != null)
                            <tr>
                                <th>{{$i++}}.</th>
                                <td>{{$user->details->registration_id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->details->institute}}</td>
                                <td>{{$user->abstract->subject_area}}</td>
                                <td>
                                    <strong><span class="text-success">
                                        @if($user->abstract->poster != null or $user->abstract->same != null)
                                            Poster,
                                        @endif
                                        @if($user->abstract->talk != null or $user->abstract->same != null)
                                            Talk
                                        @endif
                                    </span></strong>
                                </td>
                            </tr>
                        @endif
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
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>


<script>
        $(document).ready(function() {
      $('#example').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              'copyHtml5',
              'excelHtml5',
              'csvHtml5',
              'pdfHtml5'
          ]
      } );
  } );
  </script>

@stop