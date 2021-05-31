<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/summernote/summernote.css')}}">
    <link rel="stylesheet" href="{{asset('css/swal.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet"
    href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/croppie/croppie.css')}}">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="{{url('home')}}" class="logo">
                <span class="logo-mini"><b>Yo</b>T</span>
                <span class="logo-lg"><b>Serikat</b> YoTani</span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{url('images/user.png')}}" class="img-circle"
                                                    alt="User Image">
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{url('images/user.png')}}" class="img-circle"
                                                    alt="User Image">
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{url('images/user.png')}}" class="img-circle"
                                                    alt="User Image">
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{url('images/user.png')}}" class="img-circle"
                                                    alt="User Image">
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{url('images/user.png')}}" class="img-circle"
                                                    alt="User Image">
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{url('images/'.Auth::user()->photo_profile)}}" class="user-image img-user-related" alt="User Image">
                                <span class="hidden-xs">{{Auth::user()->seker_fullname}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="{{url('images/'.Auth::user()->photo_profile)}}" class="img-circle img-user-related" alt="User Image">
                                    <p>
                                        {{Auth::user()->seker_fullname}}
                                        <small>Anggota sejak {{date('M Y', strtotime(Auth::user()->created_at))}}</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="{{url('logout')}}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Sign out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                <div class="pull-left">
                                    <a href="{{url('detail')}}" id="" class="btn btn-default btn-flat">Profil</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{url('images/'.Auth::user()->photo_profile)}}" class="img-circle img-user-related" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->seker_fullname}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
                {{-- <form action="#" method="get" class="sidebar-form">
                    <div class="manjang">
                        <a href="{{url('/')}}" class="btn btn-sm btn-success" target="__blank">Kunjungi Website</a>
                    </div>
                </form> --}}
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    {{-- <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> <span>Profil</span></a></li> --}}
                    <?php //echo $menuHTML 
                    function getData(){
                        $menu = DB::select("SELECT * FROM ytk_seker_user a JOIN ytk_seker_user_role b ON a.seker_user_id=b.seker_user_id JOIN ytk_seker_role c on b.seker_role_id=c.seker_role_id JOIN ytk_seker_role_menu d ON c.seker_role_id=d.seker_role_id JOIN ytk_seker_menu e ON d.seker_menu_id=e.seker_menu_id WHERE a.seker_user_id = '".Auth::user()->seker_user_id."'");

                        return $menu;
                    }

                    function getFind($parentId){
                        $sub = DB::select("SELECT * FROM ytk_seker_user a JOIN ytk_seker_user_role b ON a.seker_user_id=b.seker_user_id JOIN ytk_seker_role c on b.seker_role_id=c.seker_role_id JOIN ytk_seker_role_menu d ON c.seker_role_id=d.seker_role_id JOIN ytk_seker_menu e ON d.seker_menu_id=e.seker_menu_id WHERE e.parent_id = '".$parentId."' AND a.seker_user_id = '".Auth::user()->seker_user_id."'");

                        return $sub;
                    }

                    function menuGenerate(){
                        
                        $menu = getData();
                        $menuHtml = '';

                        foreach ($menu as $m) {
                            if ($m->parent_id == '0') {
                                $menuHtml .= '<li class="treeview">
                                <a href="'.$m->seker_menu_url.'">
                                <i class="'.$m->seker_menu_icon.'"></i>
                                <span>'.$m->seker_menu_label.'</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                </a>';
                                $menuHtml .= subMenuGenerate($m->seker_menu_id);
                                $menuHtml .= '</li>';
                            }elseif($m->seker_menu_url != '#'){
                                if ($m->parent_id == '0') {
                                    $menuHtml .= '<li><a href="'.$m->seker_menu_url.'"><i class="'.$m->seker_menu_icon.'"></i> <span>'.$m->seker_menu_label.'</span></a></li>';
                                }
                            }
                        }

                        return $menuHtml;
                    }

                    function subMenuGenerate($parentId){
                        $submenu = getFind($parentId);
                        $subMenuHtml = '';

                        $subMenuHtml .= '<ul class="treeview-menu">';
                        foreach ($submenu as $sub) {
                            $subMenuHtml .= '
                            <li><a href="'.$sub->seker_menu_url.'"><i class="'.$sub->seker_menu_icon.'"></i> '.$sub->seker_menu_label.'</a></li>';
                        }
                        $subMenuHtml .= '</ul>';

                        return $subMenuHtml;
                    }

                    echo menuGenerate();

                    ?>
                    {{-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Anggota</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('pengurus/list')}}"><i class="fa fa-list"></i> List</a></li>
                            <li><a href="{{url('pengurus/tambah')}}"><i class="fa fa-plus"></i> Tambah</a></li>
                        </ul>
                    </li> --}}

                    {{-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tag"></i>
                            <span>Kategori</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-tree"></i>
                                    <span>Spot</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url('admin/spot/kategori/list')}}"><i class="fa fa-list"></i>
                                            List</a></li>
                                    <li><a href="{{url('admin/spot/kategori/tambah')}}"><i class="fa fa-plus"></i>
                                            Tambah</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-pencil"></i>
                                    <span>Blog</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url('admin/blog/kategori/list')}}"><i class="fa fa-list"></i>
                                            List</a></li>
                                    <li><a href="{{url('admin/blog/kategori/tambah')}}"><i class="fa fa-plus"></i>
                                            Tambah</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-map-marker"></i>
                            <span>Lokasi</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-pencil"></i>
                                    <span>Provinsi</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url('admin/provinsi/list')}}"><i class="fa fa-list"></i> List</a>
                                    </li>
                                    <li><a href="{{url('admin/provinsi/tambah')}}"><i class="fa fa-plus"></i> Tambah</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-pencil"></i>
                                    <span>Kota</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url('admin/kota/list')}}"><i class="fa fa-list"></i> List</a></li>
                                    <li><a href="{{url('admin/kota/tambah')}}"><i class="fa fa-plus"></i> Tambah</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i>
                            <span>Konten</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-pencil"></i>
                                    <span>Spot</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url('admin/spot/list')}}"><i class="fa fa-list"></i> List</a></li>
                                    <li><a href="{{url('admin/spot/tambah')}}"><i class="fa fa-plus"></i> Tambah</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-pencil"></i>
                                    <span>Blog</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url('admin/blog/list')}}"><i class="fa fa-list"></i> List</a></li>
                                    <li><a href="{{url('admin/blog/tambah')}}"><i class="fa fa-plus"></i> Tambah</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-clone"></i>
                            <span>Page</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('admin/page/kontak')}}"><i class="fa fa-phone"></i> Kontak</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </section>
        </aside>
        {{-- ini konten --}}
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    @yield('judul1')
                    <small>@yield('judul2')</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Parent</a></li>
                    <li class="active">@yield('judul1')</li>
                </ol>
            </section>
            @yield('konten')
        </div>
        {{-- end konten --}}
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a> | Yotani Serikat Kerja</strong> All rights
            reserved.
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <h3 class="control-sidebar-heading">Chat Settings</h3>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i
                                    class="fa fa-trash-o"></i></a>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </aside>
            <!-- immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);

            $(document).ready(function(){
                var url = window.location;
                $('ul.sidebar-menu li a').filter(function() {
                    return this.href == url;
                }).parent().addClass('active');



                $('ul.treeview-menu li a').filter(function() {

                    return this.href == url;

                }).parentsUntil( $( "ul.level-1" ) ).addClass('active');

                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }

                });


            })

        </script>
        <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('dist/js/bootstrap-tagsinput.min.js')}}"></script>
        <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('dist/summernote/summernote.js')}}"></script>
        <script src="{{asset('dist/summernote/summernote-image-attributes.js')}}"></script>
        <script src="{{asset('dist/summernote/summernote-image-captionit.js')}}"></script>
        <script src="{{asset('dist/js/uploadcare.js')}}"></script>
        <script src="{{asset('bower_components/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('bower_components/morris.js/morris.min.js')}}"></script>
        <script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script src="{{asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
        <script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
        <script src="{{asset('js/swal.min.js')}}"></script>
        <script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
        <script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
        <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
        <script src="{{asset('plugins/croppie/croppie.js')}}"></script>
        <script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
        <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
        <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
        <script src="{{asset('dist/js/demo.js')}}"></script>
        <script>
            $(document).ready(function(){
                var title = '{{session('title')}}';
                var text = '{{session('text')}}';
                var icon = '{{session('icon')}}';

                if (title) {
                    swal(title, text, icon);
                }
            })
        </script>
    </body>

    </html>
