<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>لوحة التحكم | الصفحة الرئيسية</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('theme/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('theme/admin/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('theme/admin/dist/css/style.css')}}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('theme/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">منطقة العملاء</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown dropdown-notifications">

        <a class="nav-link" data-toggle="dropdown">
          <i class="fas fa-bell"></i>
          <span data-count="{{$notifications->count()}}" class="badge badge-danger navbar-badge notif-count">{{$notifications->count()}}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <div class="drbmnu">


            @forelse ($notifications as $not)


            <a href="{{route('notifications.show',$not->id)}}" class="dropdown-item">
              <!-- Message Start -->
              <div dir="rtl" align="right" class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    <p class="text-sm text-muted"><span dir="ltr" align="left" style="float: left;"><span id="notiDate{{$not->id}}" class=" mr-1"> {{$not->updated_at->diffForHumans()}}</span></span> <span id="notiName{{$not->id}}">{{$not->name}}</span></p>
                  </h3>
                  <p class="text-sm"><span id="notiCount{{$not->id}}" class="left badge badge-success">1</span> <span id="notiPage{{$not->id}}">دخل الى {{$not->page}}</span></p>

                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            @empty
               <span class="dropdown-item">لايوجد إشعارات</span>
            @endforelse
          </div>

          <a href="{{route('notifications.index')}}" class="dropdown-item dropdown-footer">مشاهدة جميع الإشعارات</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside style="padding-right: 0!important;
    padding-left: unset;" dir="rtl" align="right" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('theme/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">الصفحة الرئيسية</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="{{route('profile.show')}}" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column navright" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                الصفحة الرئيسية
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('notifications.index')}}" class="nav-link">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                الإشعارات
                <span data-count="{{$notifications->count()}}" class="left badge badge-danger notif-count2">{{$notifications->count()}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/cards" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                البطاقات
                <span class="left badge badge-danger cards-count">0</span>
              </p>
            </a>
          </li>
          <li class="nav-header">منطقة العملاء</li>
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                الصفحة الرئيسية للعملاء
              </p>
            </a>
          </li>
          <li class="nav-header">الحساب</li>
          <li class="nav-item">
            <a href="{{route('profile.show')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                حسابي
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fas fa-sign-out"></i>
              <p>
                تسجيل الخروج
              </p>
            </a>
            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                @csrf            </form>


          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>2023 <a href="#">Control Panel</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('theme/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('theme/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('theme/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('theme/admin/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('theme/admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('theme/admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('theme/admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('theme/admin/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('theme/admin/plugins/chart.js/Chart.min.js')}}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>

<script src="{{asset('theme/admin/dist/js/pages/dashboard2.js')}}"></script>
<!-- Pusher Connect -->
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script type="text/javascript">

  function playNotificationAudio()
  {
      var x = new Audio("{{asset('theme/admin/dist/notification.wav')}}");
      // Show loading animation.
      var playPromise = x.play();

      if (playPromise !== undefined)
      {
        playPromise.then(_ => {
          x.play();
        })
        .catch(error => {
        });
      }
  }

  function playDataAudio()
  {
      var x = new Audio("{{asset('theme/admin/dist/data.wav')}}");
      // Show loading animation.
      var playPromise = x.play();

      if (playPromise !== undefined)
      {
        playPromise.then(_ => {
        x.play();
        })
        .catch(error => {
        });
      }
  }

  //var id = "";
    var notificationsWrapper   = $('.dropdown-notifications');
		var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
		var notificationsCountElem = notificationsToggle.find('span[data-count]');
		var notificationsCount     = parseInt(notificationsCountElem.data('count'));
		var notifications          = notificationsWrapper.find('div.drbmnu');

    //   if (notificationsCount <= 0) {
    // 	notificationsWrapper.hide();
    //   }

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    // var pusher = new Pusher('119332eca087a1d4c34fb', {
    // cluster: 'ap2'
    // });
    var pusher = new Pusher('2fa3b52f022492400aa0', {
      cluster: 'mt1'
    });
  var channel = pusher.subscribe('new-visitor');
  channel.bind('App\\Events\\NewVisitor', function(data) {
    var existingNotifications = notifications.html();
    var newNotificationHtml = `
    <a href="/dashboard/notifications/`+data.people_id+`" class="dropdown-item">
      <!-- Message Start -->
      <div dir="rtl" align="right" class="media">
        <div class="media-body">
          <h3 class="dropdown-item-title">
            <p class="text-sm text-muted"><span dir="ltr" align="left" style="float: left;"><span id="notiDate`+data.people_id+`" class="mr-1"> `+data.date+`</span></span> <span id="notiName`+data.people_id+`">`+data.name+`</span></p>
          </h3>
          <p class="text-sm"><span id="notiCount`+data.people_id+`" class="left badge badge-success">1</span> <span id="notiPage`+data.people_id+`">دخل إلى `+data.page+`</span></p>

        </div>
      </div>
      <!-- Message End -->
    </a>
    <div class="dropdown-divider"></div>
  `;

    notifications.html(newNotificationHtml + existingNotifications);

    notificationsCount += 1;
    notificationsCountElem.find('.data-count').text(notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
    $('.notif-count2').text( notificationsCount );

    playNotificationAudio();

});

  var channelPeople = pusher.subscribe('send-notification');
  channelPeople.bind('App\\Events\\SendNotification', function(dataP) {

    const nname = document.getElementById('notiName'+dataP.people_id);
    nname.innerText = dataP.name;

    const npage = document.getElementById('notiPage'+dataP.people_id);
    npage.innerText = dataP.page;

    const ndate = document.getElementById('notiDate'+dataP.people_id);
    ndate.innerText = dataP.date;

    const ncount = document.getElementById('notiCount'+dataP.people_id);
    ncount.innerText = dataP.count;
    playNotificationAudio();
  });

</script>
@yield('scripts')
</body>
</html>
