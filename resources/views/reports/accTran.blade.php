@extends('layouts.app', ['activePage' => 'Accomodation Report', 'titlePage' => __('Accomodation-Transaction Report')])

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
                <h4 class="card-title ">{{ __('Accomodation Transaction Report') }}</h4>
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
                        <th>Registration ID</th>
                        <th>
                            {{ __('Name') }}
                        </th>
                        <th>
                            {{ __('Institute') }}
                        </th>
                        <th>
                            {{ __('Bank') }}
                        </th>
                        <th>
                            {{ __('Amount') }}
                        </th>
                        <th>
                            {{ __('Transaction Id') }}
                        </th>
                        <th>
                            {{ __('Payment Date') }}
                        </th>
                        <th>
                            {{ __('Approved') }}
                        </th>
                    </thead>
                    <tbody>
                      <?php $i =1 ;?>
                      @foreach(App\User::where('admin',0)->get()->reverse() as $user)
                      @if($user->accomodation != null)
                        <tr>
                            <th>
                                {{$i++}}.
                            </th>
                            <th>
                              @if($user->details != null)
                                {{$user->details->registration_id}}
                              @else
                                {{__('--')}}
                              @endif
                            </th>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                @if($user->details != null)
                                {{$user->details->institute}}
                                @else
                                {{'--'}}
                                @endif
                            </td>
                            <td>
                                @if($user->accomodation != null)
                                    {{$user->accomodation->bank_name}}
                                @else
                                    {{'--'}}
                                @endif
                            </td>
                            <td>
                                @if($user->accomodation != null)
                                    {{$user->accomodation->amount}}
                                @else
                                    {{'--'}}
                                @endif
                            </td>
                            <td>
                                @if($user->accomodation != null)
                                    {{$user->accomodation->transaction_id}}
                                @else
                                    {{'--'}}
                                @endif
                            </td>
                            <td>
                                @if($user->accomodation != null)
                                    {{$user->accomodation->payment_date}}
                                @else
                                    {{'--'}}
                                @endif
                            </td>
                            <td>
                              <strong>
                                @if($user->accomodation->approved)
                                  <span class="text-success">Yes</span>
                                @else
                                  <span class="text-danger">No</span>
                                @endif
                              </strong>
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