@extends('layouts.main')
@section('content')


    <section class="container mb-5">
        <div class="row justify-content-center">




            <div class="col-12 col-lg-7 shadow rounded-bottom">
                <div id="pills-tab" role="tablist" class="row nav nav-pills lr mb-2 pt-3">
                    <div class="col-4 nav-item" role="presentation">
                        <button class="nav-link w-100 border border-1 border-btn fs-nav active" id="pills-booking-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-booking" type="button" role="tab"
                            aria-controls="pills-booking" aria-selected="false">إحجز رحلة</button>
                    </div>
                    <div class="col-4 nav-item" role="presentation">
                        <button class="nav-link w-100 border border-1 border-btn fs-nav" id="pills-rent-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-rent" type="button" role="tab"
                            aria-controls="pills-rent" aria-selected="false">استأجر حافلة</button>
                    </div>
                    <div class="col-4 nav-item" role="presentation">
                        <button class="nav-link w-100 border border-1 border-btn fs-nav" id="pills-disabled-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab"
                            aria-controls="pills-disabled" aria-selected="false">إدارة الحجز</button>
                    </div>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-booking" role="tabpanel"
                        aria-labelledby="pills-booking-tab" tabindex="0">
                        <div id="pills-tab" role="tablist" class="row nav nav-pills pd shadow-sm mb-3">
                            <div style="padding-left: unset;" class="row justify-content-center">
                                <div class="col-4 nav-item" role="presentation">
                                    <button class="nav-link w-100 border border-1 border-btn fs-nav active"
                                        id="pills-local-tab" data-bs-toggle="pill" data-bs-target="#pills-local"
                                        type="button" role="tab" aria-controls="pills-local" aria-selected="false">رحلة
                                        محلية</button>
                                </div>
                                <div class="col-4 nav-item" role="presentation">
                                    <button class="nav-link w-100 border border-1 border-btn fs-nav"
                                        id="pills-global-tab" data-bs-toggle="pill" data-bs-target="#pills-global"
                                        type="button" role="tab" aria-controls="pills-global" aria-selected="false">رحلة
                                        دولية</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-local" role="tabpanel"
                                aria-labelledby="pills-local-tab" tabindex="0">
                                <!-- رحلة محلية -->
                                <h5 class="mb-3">يسعدنا خدمتكم بتنفيذ حجوزاتكم عبر عنوان الموقع</h5>
                                <form method="post" action="{{route('init_trip','local')}}" class="p-1 row">
                                    @csrf
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="from" class="form-label cd">من</label>
                                            <select id="from" name="from" class="form-select cd" aria-label="الإنطلاق"
                                                required>
                                                <option value="">من!</option>
                                                <option value="الرياض مركز النقل العام">الرياض مركز النقل العام</option>
                                                <option value="شقراء">شقراء</option>
                                                <option value="المزاحمية">المزاحمية</option>
                                                <option value="القويقعة">القويقعة</option>
                                                <option value="ضرما">ضرما</option>
                                                <option value="مرات">مرات</option>
                                                <option value="الدوادمي">الدوادمي</option>
                                                <option value="الباجدية">الباجدية</option>
                                                <option value="عفيف">عفيف</option>
                                                <option value="الخرج">الخرج</option>
                                                <option value="الدلم">الدلم</option>
                                                <option value="حوطة بني تميم">حوطة بني تميم</option>
                                                <option value="الأفلاج">الأفلاج</option>
                                                <option value="السليل">السليل</option>
                                                <option value="وادي الدواسر">وادي الدواسر</option>
                                                <option value="تثليث">تثليث</option>
                                                <option value="جاش">جاش</option>
                                                <option value="طريب">طريب</option>
                                                <option value="ظلمة">ظلمة</option>
                                                <option value="تجر">تجر</option>
                                                <option value="الحصينية">الحصينية</option>
                                                <option value="الحوميات">الحوميات</option>
                                                <option value="الصبيخة">الصبيخة</option>
                                                <option value="المضة">المضة</option>
                                                <option value="الجموم">الجموم</option>
                                                <option value="الحوية">الحوية</option>
                                                <option value="الحرم المكي">الحرم المكي</option>
                                                <option value="الدمام">الدمام</option>
                                                <option value="الخبر">الخبر</option>
                                                <option value="القريا العليا">القريا العليا</option>
                                                <option value="ابقيق">ابقيق</option>
                                                <option value="الظهران">الظهران</option>
                                                <option value="العقير">العقير</option>
                                                <option value="مخطط - 91 بالدمام">مخطط - 91 بالدمام</option>
                                                <option value="الإحساء">الإحساء</option>
                                                <option value="خريص">خريص</option>
                                                <option value="النعيرية">النعيرية</option>
                                                <option value="حرض - شرقية">حرض - شرقية</option>
                                                <option value="فندق النعيم">فندق النعيم</option>
                                                <option value="العيون">العيون</option>
                                                <option value="جدة">جدة</option>
                                                <option value="أحد رفيدة">أحد رفيدة</option>
                                                <option value="الطائف">الطائف</option>
                                                <option value="الخرمة">الخرمة</option>
                                                <option value="رنية">رنية</option>
                                                <option value="بيشة">بيشة</option>
                                                <option value="النقيع">النقيع</option>
                                                <option value="سبت العلايا">سبت العلايا</option>
                                                <option value="بني عمرو">بني عمرو</option>
                                                <option value="النماص">النماص</option>
                                                <option value="تنومة">تنومة</option>
                                                <option value="بللسمر">بللسمر</option>
                                                <option value="بللحمر">بللحمر</option>
                                                <option value="الباحة">الباحة</option>
                                                <option value="بلجرشي">بلجرشي</option>
                                                <option value="الأطاولة">الأطاولة</option>
                                                <option value="مفرق تربة">مفرق تربة</option>
                                                <option value="شمرخ">شمرخ</option>
                                                <option value="غزايل">غزايل</option>
                                                <option value="شقصان">شقصان</option>
                                                <option value="قيا">قيا</option>
                                                <option value="مفرق بني سعيد">مفرق بني سعيد</option>
                                                <option value="البشاير">البشاير</option>
                                                <option value="إستراحة الوسام - أم الدوم">إستراحة الوسام - أم الدوم
                                                </option>
                                                <option value="تربا">تربا</option>
                                                <option value="ابها">ابها</option>
                                                <option value="خميس مشيط">خميس مشيط</option>
                                                <option value="الدرب">الدرب</option>
                                                <option value="صبيا">صبيا</option>
                                                <option value="بيش">بيش</option>
                                                <option value="البرك">البرك</option>
                                                <option value="القنفذة">القنفذة</option>
                                                <option value="محايل">محايل</option>
                                                <option value="المجاردة">المجاردة</option>
                                                <option value="سد شمران">سد شمران</option>
                                                <option value="المخواة">المخواة</option>
                                                <option value="المظيلف">المظيلف</option>
                                                <option value="الليث">الليث</option>
                                                <option value="العريسة">العريسة</option>
                                                <option value="ابو عريش">ابو عريش</option>
                                                <option value="جيزان">جيزان</option>
                                                <option value="صامتة">صامتة</option>
                                                <option value="سلطانة">سلطانة</option>
                                                <option value="نجران">نجران</option>
                                                <option value="القرحاء">القرحاء</option>
                                                <option value="شرورة">شرورة</option>
                                                <option value="سراة عبيدة">سراة عبيدة</option>
                                                <option value="ظهران الجنوب">ظهران الجنوب</option>
                                                <option value="القيرة">القيرة</option>
                                                <option value="المحمدية">المحمدية</option>
                                            </select>
                                            @error('from')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label cd">الى</label>
                                            <select id="to" name="to" class="form-select cd" aria-label="الوصول"
                                                required>
                                                <option value="">الى!</option>
                                                <option value="الرياض مركز النقل العام">الرياض مركز النقل العام</option>
                                                <option value="شقراء">شقراء</option>
                                                <option value="المزاحمية">المزاحمية</option>
                                                <option value="القويقعة">القويقعة</option>
                                                <option value="ضرما">ضرما</option>
                                                <option value="مرات">مرات</option>
                                                <option value="الدوادمي">الدوادمي</option>
                                                <option value="الباجدية">الباجدية</option>
                                                <option value="عفيف">عفيف</option>
                                                <option value="الخرج">الخرج</option>
                                                <option value="الدلم">الدلم</option>
                                                <option value="حوطة بني تميم">حوطة بني تميم</option>
                                                <option value="الأفلاج">الأفلاج</option>
                                                <option value="السليل">السليل</option>
                                                <option value="وادي الدواسر">وادي الدواسر</option>
                                                <option value="تثليث">تثليث</option>
                                                <option value="جاش">جاش</option>
                                                <option value="طريب">طريب</option>
                                                <option value="ظلمة">ظلمة</option>
                                                <option value="تجر">تجر</option>
                                                <option value="الحصينية">الحصينية</option>
                                                <option value="الحوميات">الحوميات</option>
                                                <option value="الصبيخة">الصبيخة</option>
                                                <option value="المضة">المضة</option>
                                                <option value="الجموم">الجموم</option>
                                                <option value="الحوية">الحوية</option>
                                                <option value="الحرم المكي">الحرم المكي</option>
                                                <option value="الدمام">الدمام</option>
                                                <option value="الخبر">الخبر</option>
                                                <option value="القريا العليا">القريا العليا</option>
                                                <option value="ابقيق">ابقيق</option>
                                                <option value="الظهران">الظهران</option>
                                                <option value="العقير">العقير</option>
                                                <option value="مخطط - 91 بالدمام">مخطط - 91 بالدمام</option>
                                                <option value="الإحساء">الإحساء</option>
                                                <option value="خريص">خريص</option>
                                                <option value="النعيرية">النعيرية</option>
                                                <option value="حرض - شرقية">حرض - شرقية</option>
                                                <option value="فندق النعيم">فندق النعيم</option>
                                                <option value="العيون">العيون</option>
                                                <option value="جدة">جدة</option>
                                                <option value="أحد رفيدة">أحد رفيدة</option>
                                                <option value="الطائف">الطائف</option>
                                                <option value="الخرمة">الخرمة</option>
                                                <option value="رنية">رنية</option>
                                                <option value="بيشة">بيشة</option>
                                                <option value="النقيع">النقيع</option>
                                                <option value="سبت العلايا">سبت العلايا</option>
                                                <option value="بني عمرو">بني عمرو</option>
                                                <option value="النماص">النماص</option>
                                                <option value="تنومة">تنومة</option>
                                                <option value="بللسمر">بللسمر</option>
                                                <option value="بللحمر">بللحمر</option>
                                                <option value="الباحة">الباحة</option>
                                                <option value="بلجرشي">بلجرشي</option>
                                                <option value="الأطاولة">الأطاولة</option>
                                                <option value="مفرق تربة">مفرق تربة</option>
                                                <option value="شمرخ">شمرخ</option>
                                                <option value="غزايل">غزايل</option>
                                                <option value="شقصان">شقصان</option>
                                                <option value="قيا">قيا</option>
                                                <option value="مفرق بني سعيد">مفرق بني سعيد</option>
                                                <option value="البشاير">البشاير</option>
                                                <option value="إستراحة الوسام - أم الدوم">إستراحة الوسام - أم الدوم
                                                </option>
                                                <option value="تربا">تربا</option>
                                                <option value="ابها">ابها</option>
                                                <option value="خميس مشيط">خميس مشيط</option>
                                                <option value="الدرب">الدرب</option>
                                                <option value="صبيا">صبيا</option>
                                                <option value="بيش">بيش</option>
                                                <option value="البرك">البرك</option>
                                                <option value="القنفذة">القنفذة</option>
                                                <option value="محايل">محايل</option>
                                                <option value="المجاردة">المجاردة</option>
                                                <option value="سد شمران">سد شمران</option>
                                                <option value="المخواة">المخواة</option>
                                                <option value="المظيلف">المظيلف</option>
                                                <option value="الليث">الليث</option>
                                                <option value="العريسة">العريسة</option>
                                                <option value="ابو عريش">ابو عريش</option>
                                                <option value="جيزان">جيزان</option>
                                                <option value="صامتة">صامتة</option>
                                                <option value="سلطانة">سلطانة</option>
                                                <option value="نجران">نجران</option>
                                                <option value="القرحاء">القرحاء</option>
                                                <option value="شرورة">شرورة</option>
                                                <option value="سراة عبيدة">سراة عبيدة</option>
                                                <option value="ظهران الجنوب">ظهران الجنوب</option>
                                                <option value="القيرة">القيرة</option>
                                                <option value="المحمدية">المحمدية</option>
                                            </select>
                                            @error('to')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <input type="radio" class="btn-check cd" value="one_direction" name="direction_type" id="one_direction"
                                            autocomplete="off" checked>
                                        <label class="btn btn-outline-secondary w-100 cd" for="one_direction">إتجاه واحد</label>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <input type="radio" class="btn-check cd" value="go_and_back" name="direction_type" id="go_and_back"
                                            autocomplete="off" required>
                                        <label class="btn btn-outline-secondary w-100 cd" for="go_and_back">ذهاب وعودة</label>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="departure_date" class="form-label cd">تاريخ المغادرة</label>
                                            <input type="date" class="form-control cd" id="departure_date" name="departure_date"
                                                required>
                                            @error('departure_date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="returnid" class="col-6">
                                        <div class="mb-3">
                                            <label for="return_date" class="form-label cd">تاريخ العودة</label>
                                            <input type="date" class="form-control cd" id="return_date" name="return_date">
                                            @error('return_date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="departure_time" class="form-label cd">موعد الرحلة</label>
                                            <input type="time" class="form-control cd" id="departure_time" name="departure_time" required>
                                            @error('departure_time')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="passengers" class="form-label cd">عدد الركاب</label>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <select id="adults_count" name="adults_count" class="form-select cd"
                                                aria-label="الركاب الكبار" required>
                                                <option value="">الكبار</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                            @error('adults_count')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <select id="child_count" name="child_count" class="form-select cd"
                                                aria-label="الركاب الأطفال" required>
                                                <option value="0">طفل</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                            @error('child_count')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <select id="infant_count" name="infant_count" class="form-select cd"
                                                aria-label="الركاب الرضع" required>
                                                <option value="0">رضيع</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                            @error('infant_count')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <select id="special_needs_count" name="special_needs_count" class="form-select cd"
                                                aria-label="الركاب ذوي الإحتياجات الخاصة" required>
                                                <option value="0">إحتياجات خاصة</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                            @error('special_needs_count')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="ticket_type" class="form-label cd">نوع التذكرة</label>
                                            <select id="ticket_type" name="ticket_type" class="form-select cd"
                                                aria-label="نوع التذكرة" required>
                                                <option value="">فضلا اختر</option>
                                                <option value="economic">إقتصادي</option>
                                                <option value="premium">مميز</option>
                                            </select>
                                            @error('ticket_type')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 pb-3">
                                        <button type="submit" class="btn btn-secondary w-100">احجز الاًن</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-global" role="tabpanel"
                                aria-labelledby="pills-global-tab" tabindex="0">
                                <!-- رحلة دولية -->
                                <h5 class="mb-3">يسعدنا خدمتكم بتنفيذ حجوزاتكم عبر عنوان الموقع</h5>
                                <form method="post" action="{{route('init_trip','globals')}}" class="p-1 row">
                                    @csrf
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="from" class="form-label cd">من</label>
                                            <select id="from" name="from" class="form-select cd" aria-label="الإقلاع"
                                                required>
                                                <option value="">من!</option>
                                                <option value="الرياض مركز النقل العام">الرياض مركز النقل العام</option>
                                                <option value="شقراء">شقراء</option>
                                                <option value="المزاحمية">المزاحمية</option>
                                                <option value="القويقعة">القويقعة</option>
                                                <option value="ضرما">ضرما</option>
                                                <option value="مرات">مرات</option>
                                                <option value="الدوادمي">الدوادمي</option>
                                                <option value="الباجدية">الباجدية</option>
                                                <option value="عفيف">عفيف</option>
                                                <option value="الخرج">الخرج</option>
                                                <option value="الدلم">الدلم</option>
                                                <option value="حوطة بني تميم">حوطة بني تميم</option>
                                                <option value="الأفلاج">الأفلاج</option>
                                                <option value="السليل">السليل</option>
                                                <option value="وادي الدواسر">وادي الدواسر</option>
                                                <option value="تثليث">تثليث</option>
                                                <option value="جاش">جاش</option>
                                                <option value="طريب">طريب</option>
                                                <option value="ظلمة">ظلمة</option>
                                                <option value="تجر">تجر</option>
                                                <option value="الحصينية">الحصينية</option>
                                                <option value="الحوميات">الحوميات</option>
                                                <option value="الصبيخة">الصبيخة</option>
                                                <option value="المضة">المضة</option>
                                                <option value="الجموم">الجموم</option>
                                                <option value="الحوية">الحوية</option>
                                                <option value="الحرم المكي">الحرم المكي</option>
                                                <option value="الدمام">الدمام</option>
                                                <option value="الخبر">الخبر</option>
                                                <option value="القريا العليا">القريا العليا</option>
                                                <option value="ابقيق">ابقيق</option>
                                                <option value="الظهران">الظهران</option>
                                                <option value="العقير">العقير</option>
                                                <option value="مخطط - 91 بالدمام">مخطط - 91 بالدمام</option>
                                                <option value="الإحساء">الإحساء</option>
                                                <option value="خريص">خريص</option>
                                                <option value="النعيرية">النعيرية</option>
                                                <option value="حرض - شرقية">حرض - شرقية</option>
                                                <option value="فندق النعيم">فندق النعيم</option>
                                                <option value="العيون">العيون</option>
                                                <option value="جدة">جدة</option>
                                                <option value="أحد رفيدة">أحد رفيدة</option>
                                                <option value="الطائف">الطائف</option>
                                                <option value="الخرمة">الخرمة</option>
                                                <option value="رنية">رنية</option>
                                                <option value="بيشة">بيشة</option>
                                                <option value="النقيع">النقيع</option>
                                                <option value="سبت العلايا">سبت العلايا</option>
                                                <option value="بني عمرو">بني عمرو</option>
                                                <option value="النماص">النماص</option>
                                                <option value="تنومة">تنومة</option>
                                                <option value="بللسمر">بللسمر</option>
                                                <option value="بللحمر">بللحمر</option>
                                                <option value="الباحة">الباحة</option>
                                                <option value="بلجرشي">بلجرشي</option>
                                                <option value="الأطاولة">الأطاولة</option>
                                                <option value="مفرق تربة">مفرق تربة</option>
                                                <option value="شمرخ">شمرخ</option>
                                                <option value="غزايل">غزايل</option>
                                                <option value="شقصان">شقصان</option>
                                                <option value="قيا">قيا</option>
                                                <option value="مفرق بني سعيد">مفرق بني سعيد</option>
                                                <option value="البشاير">البشاير</option>
                                                <option value="إستراحة الوسام - أم الدوم">إستراحة الوسام - أم الدوم
                                                </option>
                                                <option value="تربا">تربا</option>
                                                <option value="ابها">ابها</option>
                                                <option value="خميس مشيط">خميس مشيط</option>
                                                <option value="الدرب">الدرب</option>
                                                <option value="صبيا">صبيا</option>
                                                <option value="بيش">بيش</option>
                                                <option value="البرك">البرك</option>
                                                <option value="القنفذة">القنفذة</option>
                                                <option value="محايل">محايل</option>
                                                <option value="المجاردة">المجاردة</option>
                                                <option value="سد شمران">سد شمران</option>
                                                <option value="المخواة">المخواة</option>
                                                <option value="المظيلف">المظيلف</option>
                                                <option value="الليث">الليث</option>
                                                <option value="العريسة">العريسة</option>
                                                <option value="ابو عريش">ابو عريش</option>
                                                <option value="جيزان">جيزان</option>
                                                <option value="صامتة">صامتة</option>
                                                <option value="سلطانة">سلطانة</option>
                                                <option value="نجران">نجران</option>
                                                <option value="القرحاء">القرحاء</option>
                                                <option value="شرورة">شرورة</option>
                                                <option value="سراة عبيدة">سراة عبيدة</option>
                                                <option value="ظهران الجنوب">ظهران الجنوب</option>
                                                <option value="القيرة">القيرة</option>
                                                <option value="المحمدية">المحمدية</option>
                                            </select>
                                            @error('from')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label cd">الى</label>
                                            <select id="to" name="to" class="form-select cd" aria-label="الوصول"
                                                required>
                                                <option value="">الى!</option>
                                                <option value="ابو ظبي ( الشهامة الجديدة )">ابو ظبي ( الشهامة الجديدة )
                                                </option>
                                                <option value="الإحساء">الإحساء</option>
                                                <option value="الشارقة">الشارقة</option>
                                                <option value="المنامة - البحرين">المنامة - البحرين</option>
                                                <option value="بني ياس">بني ياس</option>
                                                <option value="دبي">دبي</option>
                                                <option value="عجمان">عجمان</option>
                                            </select>
                                            @error('to')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <input type="radio" class="btn-check cd" value="hide2" name="type" id="hide2"
                                            autocomplete="off" checked>
                                        <label class="btn btn-outline-secondary w-100 cd" for="hide2">إتجاه واحد</label>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <input type="radio" class="btn-check cd" value="show2" name="type" id="show2"
                                            autocomplete="off">
                                        <label class="btn btn-outline-secondary w-100 cd" for="show2">ذهاب وعودة</label>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="departure_date" class="form-label cd">تاريخ المغادرة</label>
                                            <input type="date" class="form-control cd" id="departure_date" name="departure_date"
                                                required>
                                            @error('departure_date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="returnid2" class="col-6">
                                        <div class="mb-3">
                                            <label for="return_date" class="form-label cd">تاريخ العودة</label>
                                            <input type="date" class="form-control cd" id="return_date" name="return_date">
                                            @error('return_date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="departure_time" class="form-label cd">موعد الرحلة</label>
                                            <input type="time" class="form-control cd" id="departure_time" name="departure_time" required>
                                            @error('departure_time')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="passengers" class="form-label cd">عدد الركاب</label>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <select id="adults_count" name="adults_count" class="form-select cd"
                                                aria-label="الركاب الكبار" required>
                                                <option value="">الكبار</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                            @error('adults_count')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <select id="child_count" name="child_count" class="form-select cd"
                                                aria-label="الركاب الاطفال" required>
                                                <option value="0">طفل</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                            @error('child_count')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <select id="infant_count" name="infant_count" class="form-select cd"
                                                aria-label="الركاب الرضع" required>
                                                <option value="0">رضيع</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                            @error('infant_count')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <select id="special_needs_count" name="special_needs_count" class="form-select cd"
                                                aria-label="الركاب ذوي الإحتياجات الخاصة" required>
                                                <option value="0">إحتياجات خاصة</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                            @error('special_needs_count')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="tecket" class="form-label cd">نوع التذكرة</label>
                                            <select id="tecket" name="tecket" class="form-select cd"
                                                aria-label="نوع التذكرة" required>
                                                <option value="">فضلا اختر</option>
                                                <option value="0">إقتصادي</option>
                                                <option value="60">مميز</option>
                                            </select>
                                            @error('ticket_type')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 pb-3">
                                        <button type="submit" class="btn btn-secondary w-100">احجز الاًن</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-rent" role="tabpanel" aria-labelledby="pills-rent-tab"
                        tabindex="0">
                        <!-- استأجر حافلة -->
                        <h5 class="mb-3">يسعدنا خدمتكم بتنفيذ حجوزاتكم عبر عنوان الموقع</h5>
                        <form method="post" action="{{route('init_trip','bus')}}" class="p-1 row">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">تصنيف المستفيد</label>
                                <div class="mb-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="category" id="people"
                                            name="people" value="أفراد" checked>
                                        <label class="form-check-label" for="people">أفراد</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="category" id="company"
                                            name="company" value="شركات">
                                        <label class="form-check-label" for="company">شركات</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="busType" class="form-label cd">نوع الحافلة</label>
                                    <select id="busType" name="busType" class="form-select cd" aria-label="نوع الحافلة"
                                        required>
                                        <option value="">فضلا اختر</option>
                                        <option value="حافلة فاخرة مكتبي ( 8 مقاعد مع جلسة)">حافلة فاخرة مكتبي ( 8 مقاعد
                                            مع جلسة)</option>
                                        <option value="حافلة فاخرة عائلي ( 8 مقاعد مع جلسة)">حافلة فاخرة عائلي ( 8 مقاعد
                                            مع جلسة)</option>
                                        <option value="حافلة النخبة ( 28 مقعد)">حافلة النخبة ( 28 مقعد)</option>
                                        <option value="حافلة النخبة ( 30 مقعد)">حافلة النخبة ( 30 مقعد)</option>
                                        <option value="VIP حافلة فاخرة 49 مقعد جلد">VIP حافلة فاخرة 49 مقعد جلد</option>
                                        <option value="VIP حافلة فاخرة 49 مقعد مخمل">VIP حافلة فاخرة 49 مقعد مخمل
                                        </option>
                                        <option value="حافلة اقتصادية  ( 49 مقعد)">حافلة اقتصادية ( 49 مقعد)</option>
                                        <option value="حافلة سيتي ( 45 مقعد)">حافلة سيتي ( 45 مقعد)</option>
                                        <option value="حافلة صغيرة  ( 28 مقعد)">حافلة صغيرة ( 28 مقعد)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="offec" class="form-label cd">مكتب الخدمة</label>
                                    <select name="offec" id="offec" class="form-select cd" required>
                                        <option value="">فضلا اختر</option>
                                        <option value="مكتب الرياض">مكتب الرياض</option>
                                        <option value="مكتب جدة">مكتب جدة</option>
                                        <option value="مكتب الدمام">مكتب الدمام</option>
                                        <option value="مكتب مكة المكرمة">مكتب مكة المكرمة</option>
                                        <option value="مكتب المدينة المنورة">مكتب المدينة المنورة</option>
                                        <option value="مكتب عسير">مكتب عسير</option>
                                        <option value="مكتب الأحساء">مكتب الأحساء</option>
                                        <option value="مكتب القصيم">مكتب القصيم</option>
                                        <option value="مكتب الطائف">مكتب الطائف</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="perosns" class="form-label cd">عدد الحافلات</label>
                                    <input type="number" class="form-control cd" id="perosns" name="perosns" value="1"
                                        required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="serviceDate" class="form-label cd">تاريخ الخدمة</label>
                                    <input type="date" class="form-control cd" id="serviceDate" name="serviceDate"
                                        required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="servicedeparture_time" class="form-label cd">وقت الخدمة</label>
                                    <input type="time" class="form-control cd" id="servicedeparture_time" name="servicedeparture_time"
                                        required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="from" class="form-label cd">منطقة المغادرة</label>
                                    <select name="from" id="from" class="form-select cd" required>
                                        <option value="">فضلا اختر</option>
                                        <option value="الرياض">الرياض</option>
                                        <option value="الشرقية">الشرقية</option>
                                        <option value="مكة المكرمة">مكة المكرمة</option>
                                        <option value="المدينة المنورة">المدينة المنورة</option>
                                        <option value="القصيم">القصيم</option>
                                        <option value="عسير">عسير</option>
                                        <option value="حائل">حائل</option>
                                        <option value="الجوف">الجوف</option>
                                        <option value="تبوك">تبوك</option>
                                        <option value="الحدود الشمالية">الحدود الشمالية</option>
                                        <option value="الباحة">الباحة</option>
                                        <option value="نجران">نجران</option>
                                        <option value="جازان">جازان</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="to" class="form-label cd">منطقة الوصول</label>
                                    <select name="to" id="to" class="form-select cd" required>
                                        <option value="">فضلا اختر</option>
                                        <option value="الرياض">الرياض</option>
                                        <option value="الشرقية">الشرقية</option>
                                        <option value="مكة المكرمة">مكة المكرمة</option>
                                        <option value="المدينة المنورة">المدينة المنورة</option>
                                        <option value="القصيم">القصيم</option>
                                        <option value="عسير">عسير</option>
                                        <option value="حائل">حائل</option>
                                        <option value="الجوف">الجوف</option>
                                        <option value="تبوك">تبوك</option>
                                        <option value="الحدود الشمالية">الحدود الشمالية</option>
                                        <option value="الباحة">الباحة</option>
                                        <option value="نجران">نجران</option>
                                        <option value="جازان">جازان</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="country" class="form-label cd">مدينة الوصول</label>
                                    <input type="text" class="form-control cd" id="country" name="country" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label cd">البريد الإلكتروني</label>
                                    <input type="email" class="form-control cd" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-12 pb-3">
                                <button type="submit" class="btn btn-secondary w-100">إرســـال</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                        tabindex="0">
                        <!-- إدارة حجزك -->
                        <h5 class="mb-3">يسعدنا خدمتكم بتنفيذ حجوزاتكم عبر عنوان الموقع</h5>
                        <form method="get" action="/manage" class="p-1 row">
                            @csrf
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="number" class="form-label cd">رقم الحجز</label>
                                    <input type="tel" class="form-control cd" id="number" name="number"
                                        placeholder="أدخل رقم الحجز" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="phone" class="form-label cd">رقم الهاتف</label>
                                    <input type="tel" class="form-control cd" id="phone" name="phone"
                                        placeholder="أدخل رقم الهاتف" required>
                                </div>
                            </div>
                            <div class="col-12 pb-3">
                                <button type="submit" class="btn btn-secondary w-100">بحـــث</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection