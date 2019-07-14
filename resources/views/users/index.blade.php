@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])
@section('title')
Users
@stop
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Users') }}</h4>
                <p class="card-category"> {{ __('Here you can manage users') }}</p>
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
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Sno.') }}
                      </th>
                      <th>
                          {{ __('Name') }}
                      </th>
                      <th>
                        {{ __('Email') }}
                      </th>
                      <th>
                        {{ __('Phone') }}
                      </th>
                      <th>
                          {{ __('Institute') }}
                      </th>
                      <th>
                        {{ __('Department') }}
                      </th>
                      {{-- <th>
                          {{ __('Status') }}
                      </th> --}}
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      <?php $i =1 ;?>
                      @foreach($users as $user)
                      @if ($user->id != auth()->id() and !$user->admin and Auth::user()->admin)
                        <tr>
                          <th>
                            {{$i++}}.
                          </th>
                          <td>
                            {{ $user->name }}
                          </td>
                          <td>
                            {{ $user->email }}
                          </td>
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
                          {{-- <td><strong>
                            @if($user->details == null)
                              <span class="text-dange">{{__('Not Registered')}}</span>
                            @elseif(!$user->details->approved)
                              <span class="text-warning">{{__('Registered')}}</span>
                            @else
                              <span class="text-success">{{__('Approved')}}</span>
                            @endif
                          </strong>
                          </td> --}}
                          <td class="td-actions text-right">
                            {{-- @if ($user->id != auth()->id() and Auth::user()->admin) --}}
                            
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
                            {{-- @else
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('profile.edit') }}" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif --}}
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