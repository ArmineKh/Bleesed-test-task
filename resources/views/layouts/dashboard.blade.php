<!DOCTYPE html>
  <html lang="en">

   <head>
     <meta charset="utf-8" />
     <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
     <link rel="icon" type="image/png" href="../assets/img/favicon.png">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
       <title>
       Custom Laravel
       </title>
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
     <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
     <link href="/assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
     
     <style>
     .main-panel {
       width: 100%;
      }
    </style>
  </head>

  <body class="">
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
         <div class="container">
            <a href="/login" class="navbar-brand">
            Laravel Custom Auth
            </a> <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
               <ul class="navbar-nav mr-auto"></ul>
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                  <li class="nav-item"><a href="/register" class="nav-link">Register</a></li>
                  <li class="nav-item"><a 
                  href="/logout" 
                  class="nav-link"  
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                >Logout</a>
                <form id="logout-form" action="/logout"
                  method="POST"style="display: none;">
                    {{ csrf_field() }}
                </form>
                </li>
               </ul>
            </div>
         </div>
      </nav>
     <div class="wrapper ">
         <div class="main-panel">
           @yield('content')
         </div>
     </div>

    <!--   Core JS Files   -->
    <script src="/assets/js/core/jquery.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
  </body>

  </html>