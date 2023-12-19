@extends('layouts.main')
@section('content')


    <section class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 shadow rounded-bottom">

                <div class="card mt-2">
                    <div class="card-header">
                        تذاكر
                    </div>
                    <!-- <div class="card-body">
                        <p>رحلة باتجاه واحد من الرياض مركز النقل العام, الى ابو ظبي ( الشهامة الجديدة ) - التاريخ 04-12-2023</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">اسم الراكب</th>
                                    <th scope="col">رقم الهوية</th>
                                    <th scope="col">رمز الرحلة</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>عمار مصطفى</td>
                                    <td>2271980738</td>
                                    <td>8752</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> -->

                <div class="card mt-3">
                    <div class="card-header bg-secondary text-light">
                        ملخص رسوم حجز حافلة
                    </div>
                    <div class="p-3 m-3">

                        <p class="text-center">{{$summary->busType}} </p>

                        <div class="row shadow">
                            {{-- <div class="col-12 text-center">
                                <h5 class="mb-3 mt-3">{{date('Y-m-d',strtotime($summary->departure_date))}} | {{$summary->departure_time}}</h5>
                                @if($summary->return_date)
                                <h5 class="mb-3 mt-3">{{date('Y-m-d',strtotime($summary->return_date))}} إياب</h5>
                                @endif
                            </div>
                             --}}
                             <hr>
                            <div class="col-6 text-center">
                                <p>{{date('Y-m-d',strtotime($summary->serviceDate))}}</p>
                            </div>
                            <div class="col-6 text-center">
                                <p>{{$summary->servicedeparture_time}}</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-center">
                        بعد إكمال خطوات تقديم الطلب سيتم التواصل معك في أقرب وقتٍ ممكن
                    </p>
                    <ul class="list-group">
                        <li class="list-group-item bg-secondary text-light" aria-current="true">سيتم فرض 50 ر.س رسوم مسبقة لتأكيد حجز الحافلة </li>
                        <li class="list-group-item bg-secondary text-light" aria-current="true">الرسوم مستردة عند موعد إستلام الحافلة</li>
                        <li class="list-group-item bg-secondary text-light" aria-current="true">الرسوم مستردة عند موعد إستلام الحافلة</li>
                    </ul>

                    <a href="{{route('people_data_get')}}" class="btn btn-secondary text-light w-100 mt-3 mb-3">التالـــي</a>
                </div>

            </div>
        </div>
    </section>


@endsection