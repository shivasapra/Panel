@extends('layouts.app', ['activePage' => 'Accomodations', 'titlePage' => __('Accomodations')])
@section('title')
Users
@stop
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-success">
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
                <div class="tab-content">
                    <div class="tab-pane active" id="approved">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-success">
                            <th>Name</th>
                            <th>Bank</th>
                            <th>Amount</th>
                            <th>Transaction Id</th>
                            <th>Payment Date</th>
                            </thead>
                            <tbody>
                            @foreach(App\Accomodation::where('approved',1)->take(5)->get() as $accomodation)
                                <tr>
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
                    <div class="tab-pane" id="not_approved">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-success">
                            <th>Name</th>
                            <th>Bank</th>
                            <th>Amount</th>
                            <th>Transaction Id</th>
                            <th>Payment Date</th>
                            </thead>
                            <tbody>
                            @foreach(App\Accomodation::where('approved',0)->take(5)->get() as $accomodation)
                                <tr>
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
                        <table class="table">
                            <thead class=" text-success">
                            <th>Name</th>
                            <th>Bank</th>
                            <th>Amount</th>
                            <th>Transaction Id</th>
                            <th>Payment Date</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                            @foreach(App\Accomodation::take(5)->get() as $accomodation)
                                <tr>
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
@endsection