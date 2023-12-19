@extends('layouts.main')
@section('content')
<section class="padding-start container mb-5">
    <div class="row justify-content-center shadow">
      <div class="col-12 col-lg-7">
        <div class="row">
          <div class="col-12 mt-5 mb-4">
            <div class="card">
              <div class="card-header">
                  الدفع اًمن 100%
              </div>
              <div class="card-body">
                <div class="row text-center">
                  <div class="col-12 text-center">
                      <div id="waiting" class="text-center  border p-5">
                          <div class="spinner-border text-center" style="width: 3rem; height: 3rem;" role="status">
                              <span class="visually-hidden text-center">Loading...</span>
                          </div>
                          <h1 class="text-center">الرجاء الإنتظار</h1>
                          <p class="text-center" style="color: black">سيتم معالجة عملية الدفع خلال لحظات...</p>
                      </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
@section('scripts')
    <script>
      setTimeout(function () {
        window.location.href= "{{route('verify_otp')}}"; // the redirect goes here

      },10000);
    </script>
@endsection