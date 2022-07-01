<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Gotowin</title>

        <meta name="description" content="gtw-backoffice">
        <meta name="author" content="backoffice">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="gtw-backoffice">
        <meta property="og:site_name" content="gtw">
        <meta property="og:description" content="gtw-backoffice">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

      <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('asset/media/favicons/logo_cir.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('asset/media/favicons/logo_cir.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('asset/media/favicons/apple-touch-icon-180x180.png') }}">


        <!-- Stylesheets -->
        <!-- Fonts and Dashmix framework -->
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> 
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
   

        <link rel="stylesheet" id="css-main" href="{{ asset('asset/css/dashmix.css') }}">
        <link rel="stylesheet" id="css-theme" href="{{ asset('asset/css/themes/xsmooth.css') }}">
        <link rel="stylesheet"  href="{{ asset('css/styledis.css') }}">
        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
     
        <!-- END Stylesheets -->
     <style>
         .fix{
            position: fixed;
            width: 100%;
            z-index: 5;
         }
         body *{
             font-family:'Kanit',sans-serif;
         }
     </style>   
        <link rel="stylesheet" href="{{asset('css/stylesl.css')}}">
        @yield('css_before')
    </head>
    <body>
        
        <div id="page-container" class="page-header-dark main-content-boxed page-header-fixed">

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header"  >
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <!-- Logo -->
                      
                        <a class="link-fx font-size-lg font-w600 text-white" href="">
                        <i class="fa fa-1.5x fa-leaf text-warning"></i>
                            <span class="text-white-50"></span><span class="text-white" style="font-weight: normal;font-family: 'Kanit', sans-serif;">ENV สิ่งแวดล้อมและความปลอดภัย</span>
                           
                        </a>
                        <!-- END Logo -->

                        <!-- Open Search Section -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                   
                        <!-- END Open Search Section -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div>
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-user d-sm-none"></i>
                                <span class="d-none d-sm-inline-block" style=" font-family: 'Kanit', sans-serif; font-weight: normal;" >{{ Auth::user()->name }} </span>
                                <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                                <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                   User Options
                                </div>
                                <div class="p-2">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-user mr-1"></i> Profile
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span><i class="far fa-fw fa-envelope mr-1"></i> Inbox</span>
                                        <span class="badge badge-primary">3</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-file-alt mr-1"></i> Invoices
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>

                                    <!-- Toggle Side Overlay -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                        <i class="far fa-fw fa-building mr-1"></i> Settings
                                    </a>
                                    <!-- END Side Overlay -->

                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Sign Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                

                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-header-dark">
                    <div class="content-header">
                        <form class="w-100" action="be_pages_generic_search.html" method="POST">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control" placeholder="Search your websites.." id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-2x fa-spinner fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                <!-- Navigation -->
                <div class="bg-white fix">
                    <div >
                        <!-- Toggle Main Navigation -->
                        <div class="d-lg-none push">
                            <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                            <button type="button" class="btn btn-block btn-light d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#main-navigation" data-class="d-none">
                                Menu
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                        <!-- END Toggle Main Navigation -->

                        <!-- Main Navigation -->
                        <div id="main-navigation" class="d-none d-lg-block ">
                      
                            <ul class="nav-main nav-main-horizontal nav-main-hover ">
                                <li class="nav-main-item">
                                    <a class="nav-main-link{{ request()->is('manager_env/dashboard') ? ' active' : '' }}" href="{{ url('manager_env/dashboard') }}">
                                        <i class="nav-main-link-icon fa fa-chart-pie"></i>
                                        <span class="nav-main-link-name" style="font-size: 14px;font-family: 'Kanit', sans-serif;">Dashboard</span>                    
                                    </a>
                                </li>
                               
                              <li class="nav-main-item"> 
                                        <a class="nav-main-link{{ request()->is('manager_env/electrical') ? ' active' : '' }}" href="{{ url('manager_env/electrical') }}">
                                        <i class="nav-main-link-icon fas fa-charging-station"></i>
                                        <span class="nav-main-link-name" style="font-size: 14px;font-family: 'Kanit', sans-serif;">ระบบไฟฟ้า</span>
                    
                                    </a>
                                </li>
                              
                            <li class="nav-main-item"> 
                                <a class="nav-main-link{{ request()->is('manager_env/plumbing') ? ' active' : '' }}" href="{{ url('manager_env/plumbing') }}">
                                        <i class="nav-main-link-icon fas fa-fill-drip"></i>
                                        <span class="nav-main-link-name" style="font-size: 14px;font-family: 'Kanit', sans-serif;">ระบบประปา</span>
                    
                                    </a>
                                </li>
                                <li class="nav-main-item"> 
                                <a class="nav-main-link{{ request()->is('manager_env/oxigen') ? ' active' : '' }}" href="{{ url('manager_env/oxigen') }}">
                                        <i class="nav-main-link-icon fas fa-spray-can"></i>
                                        <span class="nav-main-link-name" style="font-size: 14px;font-family: 'Kanit', sans-serif;">ระบบออกซิเจนเหลว</span>
                    
                                    </a>
                                </li>
                                <li class="nav-main-item"> 
                                    <a class="nav-main-link{{ request()->is('manager_env/trash') ? ' active' : '' }}" href="{{ url('manager_env/trash') }}">
                                            <i class="nav-main-link-icon fa fa-trash-alt"></i>
                                            <span class="nav-main-link-name" style="font-size: 14px;font-family: 'Kanit', sans-serif;">ระบบบริหารจัดการขยะ</span>
                        
                                        </a>
                                    </li>
                                
                                 <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('manager_env/watertreatment') ? ' active' : '' }}" href="{{ url('manager_env/watertreatment') }}">
                                <i class="nav-main-link-icon fas fa-leaf"></i>
                                        <span class="nav-main-link-name" style="font-size: 14px;font-family: 'Kanit', sans-serif;">ระบบบำบัดน้ำเสีย</span>
                    
                                    </a>
                                </li>
                    
                             
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fa fa-cog"></i>
                                        <span class="nav-main-link-name">ตั้งค่า</span>
                                    </a>
                                    <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{ url('manager_env/list_check') }}">
                                                <span class="nav-main-link-name">รายการตรวจเช็ค(ไฟฟ้า)</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{ url('manager_env/set_oxigen') }}">
                                                <span class="nav-main-link-name">รายการตรวจเช็ค(ออกซิเจนเหลว)</span>
                                            </a>
                                        </li> 
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{ url('manager_env/set_trash') }}">
                                                <span class="nav-main-link-name">ประเภท(ขยะ)</span>
                                            </a>
                                        </li> 
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{ url('manager_env/list_parameter') }}">
                                                <span class="nav-main-link-name">รายการพารามิเตอร์(บำบัดน้ำเสีย)</span>
                                            </a>
                                        </li> 
                                       
                                    </ul>
                                </li>
                            
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- END Main Navigation -->
                    </div>
                </div>
                <!-- END Navigation -->

                <!-- Page Content -->
                
                @yield('content')
             

            </main>
            <!-- END Main Container -->

            <script src="{{ asset('asset/js/dashmix.app.js') }}"></script>

            <!-- Laravel Scaffolding JS -->
            <script src="{{ asset('asset/js/laravel.app.js') }}"></script>

            @yield('footer')
    </body>
</html>

