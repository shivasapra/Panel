@extends('layouts.app', ['activePage' => 'Feedbacks', 'titlePage' => 'Feedbacks'])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            @method('post')
            <div class="card ">
                <div class="card-header card-header-info">
                    <h4 class="card-title ">{{ __('Feedbacks') }}</h4>
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
                        <table class="table">
                            <thead class=" text-info">
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
                                    {{ __('Feedback') }}
                                </th>
                            </thead>
                            <tbody>
                                <?php $i =1 ;?>
                                @foreach(App\Feedback::all() as $feedback)
                                <tr>
                                    <th>
                                        {{$i++}}.
                                    </th>
                                    <td>
                                        {{ $feedback->user->name }}
                                    </td>
                                    <td>
                                        {{ $feedback->user->email }}
                                    </td>
                                    <td>
                                        {{ $feedback->feedback }}
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
@endsection