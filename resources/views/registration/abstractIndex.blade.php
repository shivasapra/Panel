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
    </div>
  </div>
@endsection