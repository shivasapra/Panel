<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    
    <a href="http://www.iisermohali.ac.in/" class="simple-text logo-normal">
      <img src="{{asset('material/img/iisermlogo.jpg')}}" style="width:50px;"><br>{{ __('IISER') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      {{-- <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a> --}}
        {{-- <div class="collapse show" id="laravelExample">
          <ul class="nav"> --}}
            {{-- <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li> --}}
            @if(Auth::user()->admin)
              <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="material-icons">account_circle</i>
                    <p>{{ __('Registered Members ') }}</p>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'Accomodations' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('accomodation.index') }}">
                    <i class="material-icons">stars</i>
                    <p>{{ __('Accomodations') }}</p>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'Abstracts' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('abstract.index') }}">
                    <i class="material-icons">airplay</i>
                    <p>{{ __('Abstracts') }}</p>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'Registration Report' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('regTran') }}">
                    <i class="material-icons">description</i>
                    <p>{{ __('Registration Report') }}</p>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'Accomodation Report' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('accTran') }}">
                    <i class="material-icons">description</i>
                    <p>{{ __('Accomodation Report') }}</p>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'Settings' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('settings') }}">
                    <i class="material-icons">settings</i>
                    <p>{{ __('Settings') }}</p>
                </a>
              </li>
              {{-- <li class="nav-item{{ $activePage == 'Feedbacks' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('feedbacks')}}">
                  <i class="fa fa-comments-o" aria-hidden="true"></i>
                    <p>{{ __('Feedbacks') }}</p>
                </a>
              </li> --}}
            @else
              <li class="nav-item{{ $activePage == 'Registration Process' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('registration.process',['user'=>Auth::user(),'active'=>'registration']) }}">
                    <i class="material-icons">account_circle</i>
                    <p>{{ __('Registration Process') }}</p>
                </a>
              </li>
              {{-- <li class="nav-item{{ $activePage == 'Registration' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('registration',Auth::user()) }}">
                    <i class="material-icons">account_circle</i>
                    <p>{{ __('Registration') }}</p>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'Accomodation' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('accomodation',Auth::user())}}">
                    <i class="material-icons">stars</i>
                    <p>{{ __('Accomodation') }}</p>
                </a>
              </li> --}}
              <li class=" @if(Auth::user()->details != null) @if(Auth::user()->details->payment_date == null) li-disable @endif @else li-disable @endif nav-item{{ $activePage == 'Abstract' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('abstract',Auth::user())}}" >
                    <i class="material-icons">airplay</i>
                    <p>{{ __('Abstract') }}</p>
                </a>
              </li>
              {{-- <li class="nav-item{{ $activePage == 'Feedback' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('feedback')}}">
                  <i class="fa fa-comments-o" aria-hidden="true"></i>
                    <p>{{ __('Feedback') }}</p>
                </a>
              </li> --}}
              
            @endif
            <li class="nav-item">
                    <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="material-icons">power_settings_new</i>
                    <p>{{ __('Logout') }}</p>
                </a>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                  @csrf
                </form>
            
          {{-- </ul>
        </div> --}}
      {{-- </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('upgrade') }}">
          <i class="material-icons">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li> --}}
    </ul>
  </div>
</div>