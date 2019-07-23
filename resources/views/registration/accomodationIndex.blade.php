@extends('layouts.app', ['activePage' => 'Accomodations', 'titlePage' => __('Accomodations')])
@section('title')
Users
@stop
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
                <div class="card-header card-header-tabs card-header-info">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                    <span class="nav-tabs-title">Accomodations:</span>
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                        <a class="nav-link active" href="#approved" data-toggle="tab">
                            <i class="material-icons">done</i> Approved
                            <div class="ripple-container"></div>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#not_approved" data-toggle="tab">
                            <i class="material-icons">highlight_off</i> Not Approved
                            <div class="ripple-container"></div>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#all" data-toggle="tab">
                            <i class="material-icons">stars</i> All
                            <div class="ripple-container"></div>
                        </a>
                        </li>
                    </ul>
                    </div>
                </div>
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
                <div class="tab-content">
                    <div class="tab-pane active" id="approved">
                    <div class="table-responsive">
                        <table class="table example">
                            <thead class=" text-info">
                            <th>Sno.</th>
                            <th>Registration ID</th>
                            <th>Name</th>
                            <th>Bank</th>
                            <th>Amount</th>
                            <th>Transaction Id</th>
                            <th>Payment Date</th>
                            <th>##</th>
                            <th>Room Allotment</th>
                            </thead>
                            <tbody>
                                <?php $i =1;?>
                            @foreach(App\Accomodation::where('approved',1)->get()->reverse() as $accomodation)
                                <tr>
                                <th>{{$i++}}.</th>
                                <th>
                                    @if($accomodation->user->details != null)
                                        {{$accomodation->user->details->registration_id}}
                                    @else
                                        {{__('--')}}
                                    @endif
                                </th>
                                <td>{{$accomodation->user->name}}</td>
                                <td>{{$accomodation->bank_name}}</td>
                                <td>{{$accomodation->amount}}</td>
                                <td>{{$accomodation->transaction_id}}</td>
                                <td>{{$accomodation->payment_date}}</td>
                                <td class="can">
                                <input type="hidden" value="{{$accomodation->id}}" class="hid">
                                    @if($accomodation->cancellation_remarks != null and $accomodation->cancellation_approved == 0)
                                        <button onclick="req(this);" type="button" class="btn btn-sm btn-warning">Requested Cancellation</button><br>
                                        <a href="{{route('approve.cancellation',['id'=>$accomodation->id])}}" class="btn btn-success btn-sm">Approve Cancellation</a>
                                    @elseif($accomodation->cancellation_approved)
                                        <span class="text-success"><b>{{__('Cancellation Approved')}}</b></span>
                                    @else
                                        {{__('--')}}
                                    @endif
                                </td>
                                <td class="parent-td">
                                    <input type="hidden" value="{{$accomodation->id}}" class="acc-id">
                                    @if($accomodation->Room_no == null)
                                        <button type="button" onclick="temp(this);" class="btn-btn sm btn-info">Allot Room</button>
                                    @else
                                        <input type="hidden" value="{{$accomodation->Room_no}}" class="all_room_no">
                                        <input type="hidden" value="{{$accomodation->Address}}" class="all_address">
                                        <button type="button" onclick="temp_two(this);" class="btn-btn sm btn-info">Room Alloted</button>
                                    @endif
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="tab-pane" id="not_approved">
                    <div class="table-responsive">
                        <table class="table example">
                            <thead class=" text-info">
                            <th>Sno.</th>
                            <th>Registration ID</th>
                            <th>Name</th>
                            <th>Bank</th>
                            <th>Amount</th>
                            <th>Transaction Id</th>
                            <th>Payment Date</th>
                            </thead>
                            <tbody>
                                <?php $i = 1;?>
                            @foreach(App\Accomodation::where('approved',0)->get()->reverse() as $accomodation)
                                <tr>
                                <th>{{$i++}}.</th>
                                <th>
                                    @if($accomodation->user->details != null)
                                        {{$accomodation->user->details->registration_id}}
                                    @else
                                        {{__('--')}}
                                    @endif
                                </th>
                                <td>{{$accomodation->user->name}}</td>
                                <td>{{$accomodation->bank_name}}</td>
                                <td>{{$accomodation->amount}}</td>
                                <td>{{$accomodation->transaction_id}}</td>
                                <td>{{$accomodation->payment_date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="tab-pane " id="all">
                    <div class="table-responsive">
                        <table class="table example">
                            <thead class=" text-info">
                            <th>Sno.</th>
                            <th>Registration ID</th>
                            <th>Name</th>
                            <th>Bank</th>
                            <th>Amount</th>
                            <th>Transaction Id</th>
                            <th>Payment Date</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                            @foreach(App\Accomodation::all()->reverse() as $accomodation)
                                <tr>
                                <th>{{$i++}}.</th>
                                <th>
                                    @if($accomodation->user->details != null)
                                        {{$accomodation->user->details->registration_id}}
                                    @else
                                        {{__('--')}}
                                    @endif
                                </th>
                                <td>{{$accomodation->user->name}}</td>
                                <td>{{$accomodation->bank_name}}</td>
                                <td>{{$accomodation->amount}}</td>
                                <td>{{$accomodation->transaction_id}}</td>
                                <td>{{$accomodation->payment_date}}</td>
                                <td>
                                    @if($accomodation->approved)
                                    <span class="text-success"><b>Approved</b></span>
                                    @else
                                    <span class="text-danger"><b>Not Approved</b></span>
                                    @endif
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
  <a href="#" id="target" style="display:none;" data-toggle="modal" data-target="#cd"></a>
<div id="c"></div>
<a href="#" id="target_two" style="display:none;" data-toggle="modal" data-target="#room-allot"></a>
<div id="room"></div>

<a href="#" id="target_three" style="display:none;" data-toggle="modal" data-target="#room-alloted"></a>
<div id="room_all"></div>

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
    function req(temp){
          var i = $(temp).parents('.can').find('.hid').val();
          @foreach(App\Accomodation::all() as $a)
            var j = {{$a->id}};
            if (i == j) {
                var data = 
                '<div class="modal fade" id="cd">'+
                    '<div class="modal-dialog modal-dialog modal-dialog-centered">'+
                        '<div class="modal-content">'+
            
                            '<!-- Modal Header -->'+
                            '<div class="modal-header">'+
                                '<h4 class="modal-title">Cancellation Remarks</h4>'+
                                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                            '</div>'+
            
                            '<!-- Modal body -->'+
                            '<div class="modal-body">'+
                                    '<textarea name="remarks" id="" placeholder="Enter Remarks..." value="{{$a->cancellation_remarks}}" class="form-control"  style="height:120px !important;border:1px solid #ddd;padding:10px;">{{$a->cancellation_remarks}}</textarea>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
            }
          @endforeach
                
            
         
	  $('#c').html(data);
	  $('#target').click();
          
      }
</script>

<script>
    function temp(temp){
          var i = $(temp).parents('.parent-td').find('.acc-id').val();
                var data = 
                '<div class="modal fade" id="room-allot">'+
                    '<div class="modal-dialog modal-dialog modal-dialog-centered">'+
                        '<div class="modal-content">'+
            
                            '<!-- Modal Header -->'+
                            '<div class="modal-header">'+
                                '<h3 class="modal-title">Room Allotment</h3>'+
                                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                            '</div>'+
            
                            '<!-- Modal body -->'+
                            '<form action="{{route("allotment")}}" method="post">'+
                            '@csrf'+
                                '<div class="modal-body">'+
                                        '<input type="hidden" value="'+i+'" name="acc_id">'+
                                        '<label for="room_no">Room No.</label>'+
                                        '<input type="text" name="room_no" class="form-control"><br>'+
                                        '<label for="address">Address</label>'+
                                        '<input type="text" name="address" class="form-control">'+
                                '</div>'+
                                '<div class="text-center">'+
                                '<button type="submit" class="btn btn-sm btn-success">Submit</button>'+
                                '</div>'+
                            '</form>'+
                        '</div>'+
                    '</div>'+
                '</div>';

	  $('#room').html(data);
	  $('#target_two').click();
          
      }
</script>

<script>
    function temp_two(temp){
          var room_no = $(temp).parents('.parent-td').find('.all_room_no').val();
          var address = $(temp).parents('.parent-td').find('.all_address').val();
                var data = 
                '<div class="modal fade" id="room-alloted">'+
                    '<div class="modal-dialog modal-dialog modal-dialog-centered">'+
                        '<div class="modal-content">'+
            
                            '<!-- Modal Header -->'+
                            '<div class="modal-header">'+
                                '<h3 class="modal-title">Room Alloted</h3>'+
                                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                            '</div>'+
            
                            '<!-- Modal body -->'+
                                '<div class="modal-body">'+
                                        
                                        '<label for="room_no">Room No.</label>'+
                                        '<input type="text" name="room_no" value="'+room_no+'" class="form-control"><br>'+
                                        '<label for="address">Address</label>'+
                                        '<input type="text" name="address" value="'+address+'" class="form-control">'+
                                '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';

	  $('#room_all').html(data);
	  $('#target_three').click();
          
      }
</script>

@stop