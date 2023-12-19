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
    </style>
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
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom border-5 border-header fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">عنوان الموقع</a>
        </div>
    </nav>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img style="height: 180px;" src="{{asset('theme/images/page-header.jpg')}}" class="d-block w-100">
                <div class="carousel-caption d-block">
                    <h1 class="d-block text-light">عنوان الموقع</h1>
                    <p class="d-block text-light">يسعدنا خدمتكم بتنفيذ حجوزاتكم لخدمات النقل الدولي والنقل داخل المدن
                    </p>
                </div>
            </div>
        </div>
    </div>
     @yield('content')


    <footer>
        <p class="text-light">الشركة السعودية للنقل الجماعي (عنوان الموقع)</p>
    </footer>

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
    @yield('scripts')

</body>
</html>