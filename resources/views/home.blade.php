<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fermer Friend</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
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
          <h3>Your Logo</h3>
        </div>
       </div>
       <div id="without_logo">
        <form>
          <div class="input-group">
            <input type="text" class="form-control search_input" placeholder="পণ্য খুঁজুন (যেমন: পেঁয়াজ, চাল, আলু)">
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
          <a type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">সাইন ইন</a>
        </div>
    </nav>
    <!-- Vertical navbar -->
    <div class="vertical-nav bg-white" id="sidebar">
      <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-dark bg-light">
              <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
              home
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-dark">
            <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
            about
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-dark">
            <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
            services
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-dark">
            <i class="fas fa-images mr-3 text-primary fa-fw"></i>
            Gallery
          </a>
        </li>
      </ul>

      <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Charts</p>
      <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-dark">
            <i class="fa fa-area-chart mr-3 text-primary fa-fw"></i>
            area charts
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-dark">
            <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
            bar charts
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-dark">
            <i class="fa fa-pie-chart mr-3 text-primary fa-fw"></i>
            pie charts
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-dark">
            <i class="fa fa-line-chart mr-3 text-primary fa-fw"></i>
            line charts
          </a>
        </li>
      </ul>
    </div>
    <!-- End vertical navbar -->

    <!-- Page content holder -->

    <div class="page-content" id="content">
      <div class="main-content">
        <div class="banner">
          <div class="img">
            <div class="banner-content">
              <h3>আপনার পন্য খুজুন এখানে</h3>
              <form class="banner_input border">
                <div class="input-group ">
                  <input type="text" class="form-control  border-0" placeholder="পণ্য খুঁজুন (যেমন: পেঁয়াজ, চাল, আলু)" >
                  <div class="input-group-append">
                    <button class="btn bg-transparent" type="button">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                  </imput>
                </div>
              </form> 
            </div>
          </div>      
        </div>
        <div class="mini-banner">
          <div class="mini-b-full">
            <div class="single-img">
              <img src="{{ asset('assets/img/mini-banner-1.jpg') }}">
            </div>
            <div class="single-img">
              <img src="{{ asset('assets/img/mini-banner-2.jpg') }}">
            </div>
          </div>
        </div>
        <div class="main-category">
          <div class="category-heading text-center">
            <h2>আমাদের পণ্যের বিভাগ সমূহ</h2>
          </div>
          <div class="container pb-5">
            <div class="row justify-content-start">
                <div class="col-lg-4 col-md-4 text-center">
                  <div class="product">
                    <div class="product-name">
                      ফল ও শাকসবজি
                      <i class=" product-icon fas fa-apple-alt"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                  <div class="product ">
                    <div class="product-name text-center">
                      মাছ ও মাংস   পানীয়
                      <i class=" product-icon fas fa-fish"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                  <div class="product">
                    <div class="product-name">
                      পানীয়
                      <i class=" product-icon fas fa-wine-glass-alt"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                  <div class="product">
                    <div class="product-name">
                      ফল ও শাকসবজি
                      <i class=" product-icon fas fa-apple-alt"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                  <div class="product ">
                    <div class="product-name text-center">
                      মাছ ও মাংস   পানীয়
                      <i class=" product-icon fas fa-fish"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                  <div class="product">
                    <div class="product-name">
                      পানীয়
                      <i class=" product-icon fas fa-wine-glass-alt"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                  <div class="product">
                    <div class="product-name">
                      ফল ও শাকসবজি
                      <i class=" product-icon fas fa-apple-alt"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                  <div class="product ">
                    <div class="product-name text-center">
                      মাছ ও মাংস   পানীয়
                      <i class=" product-icon fas fa-fish"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                  <div class="product">
                    <div class="product-name">
                      পানীয়
                      <i class=" product-icon fas fa-wine-glass-alt"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                  <div class="product">
                    <div class="product-name">
                      ফল ও শাকসবজি
                      <i class=" product-icon fas fa-apple-alt"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                  <div class="product ">
                    <div class="product-name text-center">
                      মাছ ও মাংস   পানীয়
                      <i class=" product-icon fas fa-fish"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                  <div class="product">
                    <div class="product-name">
                      পানীয়
                      <i class=" product-icon fas fa-wine-glass-alt"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </div>
      </div>
    </div>
  <!-- End demo content -->
  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
        <div class="modal-header text-center">
          <h5 class="modal-title" id="exampleModal">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Name/Email:</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Password:</label>
              <input type="password" class="form-control" id="recipient-name">
            </div>
          </form>
        </div>
        <div class="modal-footer px-5">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#registerMedal" data-whatever="@getbootstrap">Register</button>
          <button type="button" class="btn btn-primary">Log in</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="registerMedal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title" id="registerMedal">Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Name/Email:</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Phone Number:</label>
              <input type="Number" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Password:</label>
              <input type="password" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Confirm Password:</label>
              <input type="password" class="form-control" id="recipient-name">
            </div>
          </form>
        </div>
        <div class="modal-footer px-5">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" data-dismiss="modal">Log in</button>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Register</button>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/index.js"></script>
</body>
</html>

