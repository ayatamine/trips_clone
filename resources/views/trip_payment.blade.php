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
                <div class="row">
                  <div class="col-6 col-sm-4 col-md-3 text-center mb-4">
                    <img src="{{asset('theme/images/Visa_Inc._logo.svg.png')}}" height="27"  alt="">
                  </div>
                  <div class="col-6 col-sm-4 col-md-3 text-center mb-4">
                    <img src="{{asset('theme/images/MasterCard_Logo.svg.png')}}" height="27"  alt="">
                  </div>
                  <div class="col-6 col-sm-4 col-md-3 text-center mb-4">
                    <img src="{{asset('theme/images/mada_logo.svg')}}" height="27"  alt="">
                  </div>
                  <div class="col-6 col-sm-4 col-md-3 text-center mb-4">
                    <img src="{{asset('theme/images/768px-Apple_Pay_logo.svg.png')}}" height="27"  alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('trip_payment_store')}}" onSubmit="return validate();">
                @csrf
                <div class="row">
                  <div align="center" class="col-12">
                            {{-- if there are validation errors --}}
                            @if($errors->any())
                              @foreach ($errors->all() as $error)
                              <div id="error-message" class="alert alert-danger">{{$error}}</div>
                              @endforeach
                              @endif
                  </div>
                  <div class="col-12">
                    <div class="mb-3">
                      <label for="cname" class="form-label cd">الإسم حسب البطاقة</label>
                      <input autocomplete="off" type="text" value="" class="input_box form-control form-control-lg cd " id="cname" name="cname" placeholder="اكتب إسمك كما هو على بطاقتك" required>
                                        </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3">
                      <label for="cnmbr" class="form-label cd">رقم البطاقة</label>
                      <input autocomplete="off" onkeypress="return onlyNumberKey(event)" maxlength="16" type="tel" value="" class="input_box form-control form-control-lg cd " id="cnmbr" name="cnmbr" placeholder="اكتب رقم البطاقة المكون من 16 خانة" required>
                                        </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                        <label for="year" class="form-label cd">تاريخ الإنتهاء</label>
                        <select id="year" name="year" class="form-control form-control-lg cd mb-3" aria-label="example" required>
                            <option value="" disabled>yyyy</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            <option value="2031">2031</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div style="margin-right: -17px;" class="mb-3">
                        <label for="month" class="form-label cd"> *</label>
                        <select id="month" name="month" class="form-control form-control-lg cd mb-3" aria-label="example" required>
                            <option value="">MM</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                </div>
                  <div class="col-12">
                    <div class="mb-3">
                      <label for="resume" class="form-label cd">الرقم خلف البطاقة CVV *</label>
                      <input autocomplete="off" onkeypress="return onlyNumberKey(event)" maxlength="3" type="tel" value="" class="input_box form-control form-control-lg cd " name="resume" id="resume" placeholder="***" required>
                                        </div>
                  </div>
                </div>
                <div class="col-12 mt-2">
                  <button style="width: 100%;" type="submit" class="btn btn-secondary btn form-control">التالـــي</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection