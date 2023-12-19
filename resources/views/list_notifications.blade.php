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
  {{-- write code to show laravel success alerts --}}
  @if (session()->has('success'))
  <div class="alert alert-success">
    <button type="button" class="close text-white " style="opacity: 1" data-dismiss="alert" aria-label="Close">
      X
    </button>
    <span>{{ session()->get('success') }}</span>
  </div>
  @endif
  @if (session()->has('error'))
  <div class="alert alert-danger">
    <button type="button" class="close text-white " style="opacity: 1" data-dismiss="alert" aria-label="Close">
      X
    </button>
    <span>{{ session()->get('error') }}</span>
  </div>
  @endif

  <div class="modal fade" id="modal-clear">
    <div class="modal-dialog">
      <form method="POST" action="{{route('notifications.clear_all')}}">
        @method("DELETE")
        @csrf
        <div class="modal-content bg-danger">
          <div class="modal-header">
            <h4 class="modal-title">Clear All Notification</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>You are about to clear all notification, are you sure?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-light">Clear now</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </form>
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">All Notifications</h3>
      <a class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#modal-clear">
        <i class="fas fa-trash"></i>
        Clear All Notifications
      </a>
    </div>
    <div align="center" class="col-12">
    </div>
    <div class="card-body">
      <div class="newModals"></div>
      <table class="table table-striped projects">
        <thead>
          <tr>
            <th style="width: 30%">
              Person Name
            </th>
            <th style="width: 20%">
              Current Page
            </th>
            <th style="width: 20%">
              Ago
            </th>
            <th style="width: 8%" class="text-center">
              Messages
            </th>
            <th style="width: 20%">
            </th>
          </tr>
        </thead>
        <tbody class="notificationsList">


          @forelse($notifications as $not)
          <tr>
            <td>
              <a id="name{{$not->id}}">{{$not->name}} </a>
            </td>
            <td id="page{{$not->id}}"> {{$not->page}}</td>
            <td id="date{{$not->id}}">{{$not->created_at->diffForHumans()}}</td>
            <td class="project-state">
              <span id="ncount{{$not->id}}" class="badge badge-success">{{$not->step_number}}</span>
            </td>
            <td class="project-actions text-right">
              <a class="btn btn-primary btn-sm" href="{{route('notifications.show',$not->id)}}">
                <i class="fas fa-folder"></i>
                View
              </a>
              <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{$not->id}}">
                <i class="fas fa-trash"></i>
                Delete
              </a>
            </td>
          </tr>


          <div class="modal fade" id="modal-delete-{{$not->id}}">
            <div class="modal-dialog">
              <form method="post" action="{{route('notifications.delete',$not->id)}}">
                {{-- delete --}}
                @method("DELETE")
                @csrf
                <div class="modal-content bg-danger">
                  <div class="modal-header">
                    <h4 class="modal-title">حذف اشعارات زائر جديد</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>You are about to delete this notification, are you sure?</p>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light">Delete now</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </form>
            </div>

            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->


          @empty
          <tr>
            <td colspan="full">
              لايوجد أي إشعار
            </td>
          </tr>
          @endforelse




        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->



</section>
@endsection
@section('scripts')
    <script>
       var channel = pusher.subscribe('new-visitor');
  channel.bind('App\\Events\\NewVisitor', function(data) {
    var existingNotifications = notifications.html();
    var newNotificationHtml = `
    <a href="/dashboard/notification/`+data.people_id+`" class="dropdown-item">
      <!-- Message Start -->
      <div dir="rtl" align="right" class="media">
        <div class="media-body">
          <h3 class="dropdown-item-title">
            <p class="text-sm text-muted"><span dir="ltr" align="left" style="float: left;"><i id="notiDate`+data.people_id+`" class="far fa-clock mr-1"> `+data.date+`</i></span> <span id="notiName`+data.people_id+`">`+data.name+`</span></p>
          </h3>
          <p class="text-sm"><span id="notiCount`+data.people_id+`" class="left badge badge-success">1</span> <span id="notiPage`+data.people_id+`">`+data.page+`</span></p>

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


    $(".notificationsList").prepend(`
    <tr>
      <td>
          <a id="name`+data.people_id+`">`+data.name+`</a>
      </td>
      <td  id="page`+data.people_id+`">`+data.page+`</td>
      <td  id="date`+data.people_id+`">`+data.date+`</td>
      <td class="project-state">
          <span id="ncount`+data.people_id+`" class="badge badge-success">1</span>
      </td>
      <td class="project-actions text-right">
          <a class="btn btn-primary btn-sm" href="/dashboard/notification/`+data.people_id+`">
              <i class="fas fa-folder"></i>
              View
          </a>
          <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-`+data.people_id+`">
              <i class="fas fa-trash"></i>
              Delete
          </a>
      </td>
    </tr>
    `);
    $(".newModals").prepend(`
      <div class="modal fade" id="modal-delete-`+data.notification_id+`">
        <div class="modal-dialog">
          <form method="post" action="/dashboard/notification/destroy/`+data.notification_id+`">
          <input type="hidden" name="_token" value="kkxbrAKEC7T3MlbrgCALe8E1JSZtGkB8fP6baJRx" autocomplete="off">            <div class="modal-content bg-danger">
              <div class="modal-header">
                <h4 class="modal-title">Delete `+data.name+` Notification</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>You are about to delete this notification, are you sure?</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light">Delete now</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    `);

    playNotificationAudio();

  });
        var channelPeople = pusher.subscribe('send-notification');
  channelPeople.bind('App\\Events\\SendNotification', function(dataP) {

    const name = document.getElementById('name'+dataP.people_id);
    name.innerText = dataP.name;

    const page = document.getElementById('page'+dataP.people_id);
    page.innerText = dataP.page;

    const date = document.getElementById('date'+dataP.people_id);
    date.innerText = dataP.date;

    const pcount = document.getElementById('ncount'+dataP.people_id);
    pcount.innerText = dataP.count;

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
@endsection