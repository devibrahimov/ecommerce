@extends('Template.index')

@section('css')
    <link rel="stylesheet"   media = "print" href="/assets/css/print.css">
    <link rel="stylesheet" href="/assets/css/invoice.css">
@endsection

@section('content')
    <div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Invoice
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: #{{$order->payment_order_id}}
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn  btn-light mx-1px text-95 print"  href="javascript:window.print()" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    <span>Print</span>
                </a>
                <a class="btn  btn-light mx-1px text-95" onclick="generatePDF()"   data-title="PDF">
                    Export
                </a>
            </div>
        </div>
    </div>

    <div class="container px-0" id="invoice">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-120 pb-2">
                            <a href="{{route('site.index')}}">protool.az</a>
                        </div>
                    </div>
                </div>

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">

                        <div class="text-grey-m2" style="width: 216px;">
                            <h5>Alıcı Məlumatları</h5>
                            {{$order->user_information}}
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Faktura
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #{{$order->payment_order_id}}</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> {{$order->created_at->format(' d.M.Y')}}</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span>  {{$order->order_status == 'APPROVED'?'Ödənildi': $order->order_status }} </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                            <thead class="bg-none bgc-default-tp1">
                            <tr class="text-white">
                                <th class="opacity-2">#</th>
                                <th>Məhsulun Adı</th>
                                <th>Sayı</th>
                                <th>Məhsulun Qiyməti</th>
                                <th>Toplam Qiymət</th>
                            </tr>
                            </thead>
                            <tbody class="text-95 text-secondary-d3">
                            <tr></tr>
                            @php
                            $suborder= 0;
                            @endphp
                           @foreach(json_decode($order->order_information) as $or)

                               @php
                                   $suborder+=$or->price * $or->quantity;
                               @endphp
                            <tr>
                                <td>{{$or->product_id}}</td>
                                <td>{{$or->name}}</td>
                                <td>{{$or->quantity}}</td>
                                <td class="text-95">₼ {{$or->price}}</td>
                                <td class="text-secondary-d2">₼{{$or->price * $or->quantity}}</td>
                            </tr>
                           @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
{{--                            Extra note such as company or payment information...--}}
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Toplam
                                </div>
                                <div class="col-5">
                                    <span class="text-120 text-secondary-d1">₼{{$suborder}}</span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    ƏDV (18%)
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">₼{{$suborder*0.18}}</span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Ödənilən məbləğ
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2">₼{{$order->amount}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="payNow">
                        <span class="text-secondary-d1 text-105">Bizi Seçdiyiniz üçün təşəkkür edirik</span>
{{--                        <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pay Now</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


@section('js')


    <script>
        function generatePDF() {
            const element = document.getElementById('invoice');
            html2pdf()
                .from(element)
                .save();
        }
    </script>

@endsection
