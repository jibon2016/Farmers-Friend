<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>কৃষকবন্ধু</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" >
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <div class="waraper">
  <!--  Navbar Start -->
    <nav class="navbar navbar-expand-lg sticky-top">
    <!-- Toggle button -->
      <div class="toggle__btn">
        <div id="sidebarCollapse">
          <i class="fas fa-bars"></i>
        </div>
        <div class="logo">
          <h3><a href="{{ route('home') }}">কৃষকবন্ধু</a></h3>
        </div>
       </div>
       <div id="without_logo">
        <form autocomplete="off">
          <div class="input-group">
            <input type="text" class="form-control search_input" id="topSearchbox" placeholder="পণ্য খুঁজুন (যেমন: পেঁয়াজ, চাল, আলু)">
            <div class="input-group-append">
              <button class="btn" type="button">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> 
       </div>
       <div class="to-go">
          <div class="dropdown">
            <button class="dropbtn"><i class="fas fa-home"></i> ঢাকা <i class="fas fa-chevron-down"></i></button>
            <div class="dropdown-content">
              <a href="#">বর্তমান অবস্থান ব্যবহার করুন</a>
              <a href="#">শহর পরিবর্তন করুন</a>  
            </div>
          </div>
        </div>
        <div class="help">
          <i class="fas fa-question"></i>
          <h3>সাহায্য</h3>
        </div>
        <div class="language">
          <div class="language-content">
            <h3>EN | বাং</h3>
          </div>
        </div>
        <div class="sign-up" id="exampleModalLong">
          @if (Auth::check())
          <div class="dropdownlogin">
            <button class="dropbtnlogin"> {{Auth::user()->name}}<i class="fas fa-chevron-down"></i></button>
            <div class="dropdown-content-login text-left">
              <a class="dropdown-item" href="{{ route('user.order.offer', ['id'=>Auth::user()->id]) }}">Orders of <span id="userType">{{ Auth::user()->user_type }}</span></a>  
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
            </div>
          </div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
          @else
            <a type="button" @if (Route::current()->getName() != 'login')
              @if( Route::current()->getName() != 'register' )
              data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"
              @endif 
              @endif >সাইন ইন</a>
          @endif
        </div>
    </nav>
    <!-- Vertical navbar -->
    <div class="vertical-nav bg-white" id="sidebar">
      <ul class="nav flex-column bg-white mb-0">
        @foreach ($categories as $category )
          <li class="nav-item">
            <a href="{{ route('category', ['id'=> $category->id]) }}" class="nav-link text-dark bg-light">
              <i class="fa {{ $category->category_icon }} mr-3 text-primary fa-fw"></i>
              {{ $category->title }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>
    <!-- End vertical navbar -->

    <!-- Page content holder -->
    <div class="page-content dynamic-row" id="content">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
      {{-- <div class="row" id=""> --}}
        @yield('main-content')
      {{-- </div> --}}
    </div>
  <!-- End demo content -->
  </div>

@if (Route::current()->getName() != 'login' || Route::current()->getName() != 'register')
@if (!Auth::check() )
      <!-- Modal For Login -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content ">
              <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModal">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <form autocomplete="off" method="POST" action="{{route('login')}}">
                @csrf
                <div class="modal-body px-5">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Name/Email:</label>
                    <input type="text" name="phone" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Password:</label>
                    <input type="password" name="password" class="form-control" id="recipient-name">
                  </div>
                </div>
                <div class="modal-footer px-5">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a type="button" href="{{ route('register') }}" class="btn btn-success text-white" >Register</a>
                  <button type="submit" class="btn btn-primary">Log in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endif



<!-- Modal For Register -->
<div class="modal fade bd-example-modal-lg" id="registerMedal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title" id="registerMedal">Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form autocomplete="off" method="POST" action="{{ url('register') }}">
          @csrf
          <div class="modal-body px-3 py-0">
            <div class="form-group row py-3">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Name/Email:</label>
              <div class="col-sm-9">
                <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Your Name/Email">
              </div>
            </div>
            <div class="form-group row py-3">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Phone Number:</label>
              <div class="col-sm-9">
                <input type="number" name="phone" class="form-control" id="inputEmail3" placeholder="Your Phone Number">
              </div>
            </div>
            <div class="form-group row py-3">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Password:</label>
              <div class="col-sm-9">
                <input type="password" name="password" class="form-control" id="inputEmail3" placeholder="Password">
              </div>
            </div>
            <div class="form-group row py-3">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Confirm Password:</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="inputEmail3" placeholder="Confirm Password">
              </div>
            </div>
            <div class="form-group row py-3">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Location(District):</label>
              <div class="col-sm-9">
                <input type="text" name="distirct" class="form-control" id="inputEmail3" placeholder="Your District">
              </div>
            </div>
            <div class="form-group row py-3">
              <label for="inputEmail3" class="col-sm-3 col-form-label">User Type:</label>
              <div class="col-sm-9">
                <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    <select name="user_type" class="custom-select" id="inputGroupSelect01">
                      <option selected>Type</option>
                      <option value="Saller">Seller</option>
                      <option value="Buyer">Buyer</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer px-5">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" data-dismiss="modal">Log in</button>
          <button type="submit" class="btn btn-success" >Register</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
@endif

@if( Session::has('modal_login'))
  <script type="text/javascript">
    $(document).ready(function() {
      $('#exampleModal').modal();
    });
  </script>
@endif

@if( Session::has('modal_register'))
  <script type="text/javascript">
    $(document).ready(function() {
      $('#registerMedal').modal();
    });
  </script>
@endif

@yield('js')
{{-- <script src="{{ asset('assets/js/jquery-3.3.1.slim.min.js')}}" ></script> --}}
<script src="{{ asset('assets/js/popper.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/index.js')}}"></script>
<script>
  (function (window, document) {
      var loader = function () {
          var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
          script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
          tag.parentNode.insertBefore(script, tag);
      };
  
      window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
  })(window, document);
</script>
</body>
</html>

