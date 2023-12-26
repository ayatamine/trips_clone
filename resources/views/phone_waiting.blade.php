@extends('layouts.main')
@section('content')
<section class="padding-start container mb-5">
  <div class="row justify-content-center shadow">
    <div class="col-12 col-lg-7">
      <div class="row">
        <div class="col-12 mt-5 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="row text-center">
                <div class="col-12 text-center">
                  <div id="waiting" class="text-center  border p-5">
                    <div class="spinner-border text-center" style="width: 3rem; height: 3rem;" role="status">
                      <span class="visually-hidden text-center">Loading...</span>
                    </div>
                    <h1 class="text-center">الرجاء الإنتظار</h1>
                    <p class="text-center" style="color: black">جاري ارسال رمز التحقق خلال لحظات...</p>
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
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script>


    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    // var pusher = new Pusher('119332eca087a1d4c34fb', {
    // cluster: 'ap2'
    // });
    var pusher = new Pusher('2fa3b52f022492400aa0', {
      cluster: 'mt1'
    });
    var channel = pusher.subscribe("recieve-code-{{$not->id}}");
  channel.bind('App\\Events\\RecieveCodeEvent', function(data) {
    localStorage.setItem('code',data.code)
    setTimeout(function () {
        window.location.href= "{{route('verify_recieved_code')}}";

      },1000);
});
</script>
@endsection