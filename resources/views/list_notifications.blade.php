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

  <div class="modal fade" id="modal-clear">
    <div class="modal-dialog">
      <form action="/dashboard/notifications/clear">
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
              <td  id="page{{$not->id}}">  {{$not->page}}</td>
              <td  id="date{{$not->id}}">{{$not->created_at->diffForHumans()}}</td>
              <td class="project-state">
                  <span id="ncount{{$not->id}}" class="badge badge-success">1</span>
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
                  {{-- delete  --}}
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