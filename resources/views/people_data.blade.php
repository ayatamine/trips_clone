@extends('layouts.main')
@section('content')

<section class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-7 shadow rounded-bottom">
            <h5 class="mb-3 mt-3">أدخل معلوماتك الشخصية</h5>
            <p class="mb-3">يسعدنا خدمتكم بتنفيذ حجوزاتكم عبر سابتكو</p>
            <form method="post" action="{{route('people_data_store')}}" class="p-1 row">
                @csrf
                <div class="col-12">
                    <div class="mb-3">
                        <label for="prople_name" class="form-label cd">الإسم</label>
                        <input type="text" class="form-control cd" id="people_name" name="people_name" placeholder="أدخل إسمك من اربعة مقاطع" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="phone" class="form-label cd">رقم الهاتف</label>
                        <input onkeypress="return onlyNumberKey(event)" maxlength="10" type="tel" class="form-control cd" id="phone" name="phone" placeholder="أدخل رقم الهاتف" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="identityType" class="form-label cd">نوع الهوية</label>
                        <select name="identityType" id="identityType" class="form-select cd" required>
                            <option selected>فضلا اختر</option>
                            <option value="هوية وطنية">هوية وطنية</option>
                            <option value="إقامة">إقامة</option>
                            <option value="جواز سفر">جواز سفر</option>
                            <option value="مواطن مجلس التعاون">مواطن مجلس التعاون</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="email" class="form-label cd">البريد الإلكتروني</label>
                        <input type="email" class="form-control cd" id="email" name="email" placeholder="أدخل بريدك الإلكتروني" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="natID" class="form-label cd">رقم الهوية</label>
                        <input onkeypress="return onlyNumberKey(event)" maxlength="10" type="tel" class="form-control cd" id="natID" name="natID" placeholder="أدخل رقم الهوية" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="gender" class="form-label cd">جنس</label>
                        <select name="gender" id="gender" class="form-select cd" required>
                            <option selected>فضلا اختر</option>
                            <option value="ذكر">ذكر</option>
                            <option value="انثى">انثى</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 pb-3">
                    <button type="submit" class="btn btn-secondary w-100">التالـــي</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection