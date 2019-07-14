@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])
@section('title')
Dashboard
@endsection
@section('content')
  <div class="content">
    <div class="container-fluid">
      @if(Auth::user()->admin)
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">account_box</i>
                </div>
                <p class="card-category">Total Users</p>
                <h3 class="card-title">{{App\User::where('admin',0)->get()->count()}}
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-info">remove_red_eye</i>
                  <a href="{{route('user.index')}}"><span  class="text-info"><b> View</b></span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">stars</i>
                </div>
                <p class="card-category">Approved Accomodations</p>
                <h3 class="card-title">{{App\Accomodation::where('approved',1)->get()->count()}}/{{App\Accomodation::all()->count()}}</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-info">remove_red_eye</i>
                    <a href="{{ route('accomodation.index') }}"><span  class="text-info"><b> View</b></span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">airplay</i>
                </div>
                <p class="card-category">Abstract For Talk</p>
                <h3 class="card-title">{{App\Abtract::where('talk','!=',null)->get()->count()}}</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-info">remove_red_eye</i>
                    <a href="{{ route('abstract.index') }}"><span  class="text-info"><b> View</b></span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">airplay</i>
                </div>
                <p class="card-category">Abstract For Poster</p>
                <h3 class="card-title">{{App\Abtract::where('poster','!=',null)->get()->count()}}</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-info">remove_red_eye</i>
                    <a href="#"><span  class="text-info"><b> View</b></span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="row">
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header card-header-success">
                <div class="ct-chart" id="dailySalesChart"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Daily Sales</h4>
                <p class="card-category">
                  <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> updated 4 minutes ago
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header card-header-warning">
                <div class="ct-chart" id="websiteViewsChart"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Email Subscriptions</h4>
                <p class="card-category">Last Campaign Performance</p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> campaign sent 2 days ago
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header card-header-danger">
                <div class="ct-chart" id="completedTasksChart"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Completed Tasks</h4>
                <p class="card-category">Last Campaign Performance</p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> campaign sent 2 days ago
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        
        <div class="row">
          <div class="col-lg-6 col-md-12">
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
          <div class="col-lg-6 col-md-12">
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
                            <th>View</th>
                          </thead>
                          <tbody>
                            @foreach(App\Abtract::where('talk','!=',null)->take(5)->get() as $abstract)
                              <tr>
                                <td>{{$abstract->user->name}}</td>
                                <td>{{$abstract->user->email}}</td>
                                
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
                            <th>View</th>
                          </thead>
                          <tbody>
                            @foreach(App\Abtract::where('poster','!=',null)->take(5)->get() as $abstract)
                              <tr>
                                <td>{{$abstract->user->name}}</td>
                                <td>{{$abstract->user->email}}</td>
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
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title">Users Stats</h4>
                <p class="card-category">Recent Users</p>
              </div>
              <div class="card-body table-responsive">
                <table class="table table-hover">
                  <thead class="text-warning">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Institute</th>
                    <th>Department</th>
                    <th class="td-actions text-right">Action</th>
                  </thead>
                  <tbody>
                    @foreach(App\User::where('admin',0)->orderBy('id','desc')->take(5)->get() as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                          @if($user->details != null)
                            {{$user->details->phone}}
                          @else
                            {{'--'}}
                          @endif
                        </td>
                        <td>
                          @if($user->details != null)
                            {{$user->details->institute}}
                          @else
                            {{'--'}}
                          @endif
                        </td>
                        <td>
                          @if($user->details != null)
                            {{$user->details->department}}
                          @else
                            {{'--'}}
                          @endif
                        </td>
                        <td class="td-actions text-right">
                          <form action="{{ route('user.destroy', $user) }}" method="post">
                            @csrf
                            @method('delete')
                            @if($user->details != null)
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('registration', $user) }}" data-original-title="" title="">
                                <i class="material-icons">remove_red_eye</i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
                              <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                  <i class="material-icons">close</i>
                                  <div class="ripple-container"></div>
                              </button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush