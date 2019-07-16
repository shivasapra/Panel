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
                <p class="card-category">Total Conference Registered Members </p>
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
                    <a href="{{ route('abstract.index') }}"><span  class="text-info"><b> View</b></span></a>
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
                            <th>View</th>
                          </thead>
                          <tbody>
                            @foreach(App\Abtract::where('poster','!=',null)->take(5)->get() as $abstract)
                              <tr>
                                <td>{{$abstract->user->name}}</td>
                                <td>{{$abstract->user->email}}</td>
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
      @else
        <?php $user = Auth::user(); ?> 
        @if(Auth::user()->details != null)
          <div class="card ">
            <div class="card-header card-header-info">
              <h4 class="card-title">{{ __('Details') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
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
              <div class="row">
                <div class="col-md-9">
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                    <div class="col-sm-10">
                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name',$user->name) }}" required="true" aria-required="true"/>
                          @if ($errors->has('name'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                          @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                    <div class="col-sm-10">
                      <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email',$user->email) }}" required />
                        @if ($errors->has('email'))
                          <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Gender') }}</label>
                    <div class="col-sm-10">
                        <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="input-gender" type="text" placeholder="{{ __('Gender') }}" @if($user->details != null)  value="{{$user->details->gender}}"   @else value="{{old('gender')}}" @endif required="true" aria-required="true"/>
                            @if ($errors->has('gender'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('gender') }}</span>
                            @endif
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Institue Name') }}</label>
                    <div class="col-sm-10">
                        <div class="form-group{{ $errors->has('institue') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('institue') ? ' is-invalid' : '' }}" name="institute" id="input-institute" type="text" placeholder="{{ __('Institue Name') }}" @if($user->details != null)  value="{{$user->details->institute}}"   @else value="{{old('institue')}}" @endif  required="true" aria-required="true"/>
                            @if ($errors->has('institute'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('institute') }}</span>
                            @endif
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Department') }}</label>
                    <div class="col-sm-10">
                        <div class="form-group{{ $errors->has('department') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" id="input-department" type="text" placeholder="{{ __('Department') }}" @if($user->details != null)  value="{{$user->details->department}}"   @else value="{{old('department')}}" @endif required="true" aria-required="true"/>
                            @if ($errors->has('department'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('department') }}</span>
                            @endif
                        </div>
                    </div>
                  </div> 
                  <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Address') }}</label>
                      <div class="col-sm-10">
                          <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __('Address') }}" @if($user->details != null)  value="{{$user->details->address}}"   @else value="{{old('address')}}" @endif required="true" aria-required="true"/>
                              @if ($errors->has('address'))
                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('address') }}</span>
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                      <div class="col-sm-10">
                          <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-phone" type="text" placeholder="{{ __('Phone') }}" @if($user->details != null)  value="{{$user->details->phone}}"   @else value="{{old('phone')}}" @endif required="true" aria-required="true"/>
                              @if ($errors->has('phone'))
                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('phone') }}</span>
                              @endif
                          </div>
                      </div>
                  </div>
                </div>
              <div class="col-md-3 text-center">
                  @if($user->details->approved )
                      <img src="{{asset('/material/img/approved.png')}}" alt="ff" style="width:150px;margin-top:100px;">
                  @endif
              </div>
            </div>
            </div>
          </div>
          <div class="card ">
            <div class="card-header card-header-warning">
                <h4 class="card-title">{{ __('Registration Fee') }}</h4>
                <p class="card-category"></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Bank Name') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('bank_name') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('bank_name') ? ' is-invalid' : '' }}" name="bank_name" id="input-bank_name" type="text" placeholder="{{ __('Bank Name') }}" @if($user->details != null)  value="{{$user->details->bank_name}}"   @else value="{{old('bank_name')}}" @endif required="true" aria-required="true"/>
                            @if ($errors->has('bank_name'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('bank_name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Amount') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" id="input-amount" type="text" placeholder="{{ __('Amount') }}" @if($user->details != null)  value="{{$user->details->amount}}"   @else value="{{old('amount')}}" @endif required="true" aria-required="true"/>
                            @if ($errors->has('amount'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('amount') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Transaction Id:') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('transaction_id') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('transaction_id') ? ' is-invalid' : '' }}" name="transaction_id" id="input-transaction_id" type="text" placeholder="{{ __('Transaction Id') }}" @if($user->details != null)  value="{{$user->details->transaction_id}}"   @else value="{{old('transaction_id')}}" @endif required="true" aria-required="true"/>
                            @if ($errors->has('transaction_id'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('transaction_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Date Of Payment:') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('payment_date') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('payment_date') ? ' is-invalid' : '' }}" name="payment_date" id="input-payment_date" type="date" placeholder="{{ __('Payment Date') }}" @if($user->details != null)  value="{{$user->details->payment_date}}"   @else value="{{ Carbon\Carbon::now()->toDateString() }}" @endif  required="true" aria-required="true"/>
                            @if ($errors->has('payment_date'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('payment_date') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
          </div>
        @endif
        @if(Auth::user()->accomodation != null)
          <div class="card ">
              <div class="card-header card-header-success">
                  <h4 class="card-title">{{ __('Accomodation') }}</h4>
                  <p class="card-category"></p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Bank Name') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group{{ $errors->has('bank_name') ? ' has-danger' : '' }}">
                                <input class="form-control toggle {{ $errors->has('bank_name') ? ' is-invalid' : '' }}" name="bank_name" id="input-bank_name" type="text" placeholder="{{ __('Bank Name') }}" @if($user->accomodation != null)   value="{{$user->accomodation->bank_name}}"   @else disabled value="{{old('bank_name')}}" @endif required="true" aria-required="true"/ >
                                @if ($errors->has('bank_name'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('bank_name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Amount') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                <input class="form-control toggle {{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" id="input-amount" type="text" placeholder="{{ __('Amount') }}" @if($user->accomodation != null)  value="{{$user->accomodation->amount}}"   @else disabled value="{{old('amount')}}" @endif required="true" aria-required="true"/ >
                                @if ($errors->has('amount'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('amount') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Transaction Id:') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group{{ $errors->has('transaction_id') ? ' has-danger' : '' }}">
                                <input class="form-control toggle {{ $errors->has('transaction_id') ? ' is-invalid' : '' }}" name="transaction_id" id="input-transaction_id" type="text" placeholder="{{ __('Transaction Id') }}" @if($user->accomodation != null)  value="{{$user->accomodation->transaction_id}}"   @else disabled value="{{old('transaction_id')}}" @endif required="true" aria-required="true"/ >
                                @if ($errors->has('transaction_id'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('transaction_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Date Of Payment:') }}</label>
                        <div class="col-sm-10">
                            <div class="form-group{{ $errors->has('payment_date') ? ' has-danger' : '' }}">
                                <input class="form-control toggle {{ $errors->has('payment_date') ? ' is-invalid' : '' }}" name="payment_date" id="input-payment_date" type="date" placeholder="{{ __('Payment Date') }}" @if($user->accomodation != null)  value="{{$user->accomodation->payment_date}}"   @else disabled value="{{ Carbon\Carbon::now()->toDateString() }}" @endif  required="true" aria-required="true"/ >
                                @if ($errors->has('payment_date'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('payment_date') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-3 text-center">
                      @if($user->accomodation->approved )
                          <img src="{{asset('/material/img/approved.png')}}" alt="ff" style="width:150px;margin-top:100px;">
                      @endif
                  </div>
                </div>
              </div>
          </div>
        @endif
        @if(Auth::user()->abstract != null)
          <div class="row">
              @if($user->abstract->poster != null)
                <div class="col-md-6">
                  <div class="card ">
                    <div class="card-header card-header-danger">
                      <h4 class="card-title">{{ __('Abstract For Poster') }}
                      <p class="card-category"></p>
                    </div>
                    <div class="card-body">
                        <iframe src="{{asset($user->abstract->poster)}}"  frameborder="0" style="width:100%;height:500px;"></iframe>
                    </div>
                    <input type="file" name="poster" id="poster" style="display:none";>
                    <br><p style="font-size:20px;margin-left:25px;"><b>Terms & Conditions:</b></p>
                    <p style="font-size:17px;margin-left:25px;margin-right:10px;">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                  </div>
                </div>
              @endif
              @if($user->abstract->talk != null)
                <div class="col-md-6">
                  <div class="card ">
                      <div class="card-header card-header-primary">
                          <h4 class="card-title">{{ __('Abstract For Talk') }}
                              {{-- <button type="button" id="talk_button" class="btn btn-sm btn-rounded btn-primary pull-right"><i class="fa fa-upload" aria-hidden="true"></i></button></h4> --}}
                          <p class="card-category"></p>
                      </div>
                      <div class="card-body">
                          <iframe src="{{asset($user->abstract->talk)}}" frameborder="0" style="width:100%;height:500px;"></iframe>
                      </div>
                      <input type="file" name="talk" id="talk" style="display:none";>
                      <br><p style="font-size:20px;margin-left:25px;"><b>Terms & Conditions:</b></p>
                      <p style="font-size:17px;margin-left:25px;margin-right:10px;">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                      </p>
                  </div>
                </div>
              @endif
          </div>
        @endif
      @endif
    </div>
  </div>
<a href="#" id="target2" style="display:none;" data-toggle="modal" data-target="#talk_view"></a>
<a href="#" id="target" style="display:none;" data-toggle="modal" data-target="#poster_view"></a>
<div id="talk-modal"></div>
<div id="poster-modal"></div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
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

  <script>
      window.onload=function(){
        @if(!Auth::user()->admin)
            $('input').attr('disabled','disabled')
            var elements = document.getElementsByTagName('input');
    
                for (var i = 0, element; element = elements[i++];) {
                    if (element.type === "hidden")
                    element.removeAttribute('disabled');
                    
                }
            };
        @endif
  </script>
@endpush