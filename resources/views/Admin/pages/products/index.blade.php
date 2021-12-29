@extends('Admin.index')

@section('css')

    <style>
        .card img {
            height: 150px;
            object-fit: contain;
            object-position: center;
        }

        .card-footer {
            padding: 0px !important;
        }

        .card-body {
            flex: 1 1 auto;
            padding: 6px;
        }

        .card-footer a {
            padding: 0.375rem 0.75rem;
        }

        .card {
            border: darkgray;
        }

        .image-files input {
            display: none;
        }

        .productslist-card hr {
            margin-top: 0 !important;
            margin-bottom: 0rem !important;
        }

        .productslist-card .btn {
            padding: 0px 6px !important;
            margin-top: 10px;
        }

        .productslist-card .card-text {
            height: 20px;
            color: #000a52;
            font-family: Rubik, sans-serif;
            font-size: 0.700rem;
            font-weight: bold;
            line-height: 1.5;
        }

        .productslist-card .card {
            border: 1px solid #3e3737 !important;
        }

        /*____________________________________________*/
        .example .btn-toggle {
            top: 50%;
            transform: translateY(-50%);
        }

        .btn-toggle {
            margin: 0 4rem;
            padding: 0;
            position: relative;
            border: none;
            height: 1.5rem;
            width: 3rem;
            border-radius: 1.5rem;
            color: #6b7381;
            background: #bdc1c8;
        }

        .btn-toggle:focus,
        .btn-toggle.focus,
        .btn-toggle:focus.active,
        .btn-toggle.focus.active {
            outline: none;
        }

        .btn-toggle:before,
        .btn-toggle:after {
            line-height: 1.5rem;
            width: 4rem;
            text-align: center;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: absolute;
            bottom: 0;
            transition: opacity 0.25s;
        }

        .btn-toggle:before {
            content: 'Off';
            left: -4rem;
        }

        .btn-toggle:after {
            content: 'On';
            right: -4rem;
            opacity: 0.5;
        }

        .btn-toggle > .handle {
            position: absolute;
            top: 0.1875rem;
            left: 0.1875rem;
            width: 1.125rem;
            height: 1.125rem;
            border-radius: 1.125rem;
            background: #fff;
            transition: left 0.25s;
        }

        .btn-toggle.active {
            transition: background-color 0.25s;
        }

        .btn-toggle.active > .handle {
            left: 1.6875rem;
            transition: left 0.25s;
        }

        .btn-toggle.active:before {
            opacity: 0.5;
        }

        .btn-toggle.active:after {
            opacity: 1;
        }

        .btn-toggle.btn-sm:before,
        .btn-toggle.btn-sm:after {
            line-height: -0.5rem;
            color: #fff;
            letter-spacing: 0.75px;
            left: 0.4125rem;
            width: 2.325rem;
        }

        .btn-toggle.btn-sm:before {
            text-align: right;
        }

        .btn-toggle.btn-sm:after {
            text-align: left;
            opacity: 0;
        }

        .btn-toggle.btn-sm.active:before {
            opacity: 0;
        }

        .btn-toggle.btn-sm.active:after {
            opacity: 1;
        }

        .btn-toggle.btn-xs:before,
        .btn-toggle.btn-xs:after {
            display: none;
        }

        .btn-toggle:before,
        .btn-toggle:after {
            color: #6b7381;
        }

        .btn-toggle.active {
            background-color: #29b5a8;
        }

        .btn-toggle.btn-lg {
            margin: 0 5rem;
            padding: 0;
            position: relative;
            border: none;
            height: 2.5rem;
            width: 5rem;
            border-radius: 2.5rem;
        }

        .btn-toggle.btn-lg:focus,
        .btn-toggle.btn-lg.focus,
        .btn-toggle.btn-lg:focus.active,
        .btn-toggle.btn-lg.focus.active {
            outline: none;
        }

        .btn-toggle.btn-lg:before,
        .btn-toggle.btn-lg:after {
            line-height: 2.5rem;
            width: 5rem;
            text-align: center;
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: absolute;
            bottom: 0;
            transition: opacity 0.25s;
        }

        .btn-toggle.btn-lg:before {
            content: 'Off';
            left: -5rem;
        }

        .btn-toggle.btn-lg:after {
            content: 'On';
            right: -5rem;
            opacity: 0.5;
        }

        .btn-toggle.btn-lg > .handle {
            position: absolute;
            top: 0.3125rem;
            left: 0.3125rem;
            width: 1.875rem;
            height: 1.875rem;
            border-radius: 1.875rem;
            background: #fff;
            transition: left 0.25s;
        }

        .btn-toggle.btn-lg.active {
            transition: background-color 0.25s;
        }

        .btn-toggle.btn-lg.active > .handle {
            left: 2.8125rem;
            transition: left 0.25s;
        }

        .btn-toggle.btn-lg.active:before {
            opacity: 0.5;
        }

        .btn-toggle.btn-lg.active:after {
            opacity: 1;
        }

        .btn-toggle.btn-lg.btn-sm:before,
        .btn-toggle.btn-lg.btn-sm:after {
            line-height: 0.5rem;
            color: #fff;
            letter-spacing: 0.75px;
            left: 0.6875rem;
            width: 3.875rem;
        }

        .btn-toggle.btn-lg.btn-sm:before {
            text-align: right;
        }

        .btn-toggle.btn-lg.btn-sm:after {
            text-align: left;
            opacity: 0;
        }

        .btn-toggle.btn-lg.btn-sm.active:before {
            opacity: 0;
        }

        .btn-toggle.btn-lg.btn-sm.active:after {
            opacity: 1;
        }

        .btn-toggle.btn-lg.btn-xs:before,
        .btn-toggle.btn-lg.btn-xs:after {
            display: none;
        }

        .btn-toggle.btn-sm {
            margin: 0 0.5rem;
            top: 5px;
            padding: 0;
            position: relative;
            border: none;
            height: 1.5rem;
            width: 3rem;
            border-radius: 1.5rem;
        }

        .btn-toggle.btn-sm:focus,
        .btn-toggle.btn-sm.focus,
        .btn-toggle.btn-sm:focus.active,
        .btn-toggle.btn-sm.focus.active {
            outline: none;
        }

        .btn-toggle.btn-sm:before,
        .btn-toggle.btn-sm:after {
            line-height: 1.5rem;
            width: 0.5rem;
            text-align: center;
            font-weight: 600;
            font-size: 0.55rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: absolute;
            bottom: 0;
            transition: opacity 0.25s;
        }

        .btn-toggle.btn-sm:before {
            content: 'Off';
            left: -0.5rem;
        }

        .btn-toggle.btn-sm:after {
            content: 'On';
            right: -0.5rem;
            opacity: 0.5;
        }

        .btn-toggle.btn-sm > .handle {
            position: absolute;
            top: 0.1875rem;
            left: 0.1875rem;
            width: 1.125rem;
            height: 1.125rem;
            border-radius: 1.125rem;
            background: #fff;
            transition: left 0.25s;
        }

        .btn-toggle.btn-sm.active {
            transition: background-color 0.25s;
        }

        .btn-toggle.btn-sm.active > .handle {
            left: 1.6875rem;
            transition: left 0.25s;
        }

        .btn-toggle.btn-sm.active:before {
            opacity: 0.5;
        }

        .btn-toggle.btn-sm.active:after {
            opacity: 1;
        }

        .btn-toggle.btn-sm.btn-sm:before,
        .btn-toggle.btn-sm.btn-sm:after {
            line-height: -0.5rem;
            color: #fff;
            letter-spacing: 0.75px;
            left: 0.4125rem;
            width: 2.325rem;
        }

        .btn-toggle.btn-sm.btn-sm:before {
            text-align: right;
        }

        .btn-toggle.btn-sm.btn-sm:after {
            text-align: left;
            opacity: 0;
        }

        .btn-toggle.btn-sm.btn-sm.active:before {
            opacity: 0;
        }

        .btn-toggle.btn-sm.btn-sm.active:after {
            opacity: 1;
        }

        .btn-toggle.btn-sm.btn-xs:before,
        .btn-toggle.btn-sm.btn-xs:after {
            display: none;
        }

        .btn-toggle.btn-xs {
            margin: 0 0;
            padding: 0;
            position: relative;
            border: none;
            height: 1rem;
            width: 2rem;
            border-radius: 1rem;
        }

        .btn-toggle.btn-xs:focus,
        .btn-toggle.btn-xs.focus,
        .btn-toggle.btn-xs:focus.active,
        .btn-toggle.btn-xs.focus.active {
            outline: none;
        }

        .btn-toggle.btn-xs:before,
        .btn-toggle.btn-xs:after {
            line-height: 1rem;
            width: 0;
            text-align: center;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: absolute;
            bottom: 0;
            transition: opacity 0.25s;
        }

        .btn-toggle.btn-xs:before {
            content: 'Off';
            left: 0;
        }

        .btn-toggle.btn-xs:after {
            content: 'On';
            right: 0;
            opacity: 0.5;
        }

        .btn-toggle.btn-xs > .handle {
            position: absolute;
            top: 0.125rem;
            left: 0.125rem;
            width: 0.75rem;
            height: 0.75rem;
            border-radius: 0.75rem;
            background: #fff;
            transition: left 0.25s;
        }

        .btn-toggle.btn-xs.active {
            transition: background-color 0.25s;
        }

        .btn-toggle.btn-xs.active > .handle {
            left: 1.125rem;
            transition: left 0.25s;
        }

        .btn-toggle.btn-xs.active:before {
            opacity: 0.5;
        }

        .btn-toggle.btn-xs.active:after {
            opacity: 1;
        }

        .btn-toggle.btn-xs.btn-sm:before,
        .btn-toggle.btn-xs.btn-sm:after {
            line-height: -1rem;
            color: #fff;
            letter-spacing: 0.75px;
            left: 0.275rem;
            width: 1.55rem;
        }

        .btn-toggle.btn-xs.btn-sm:before {
            text-align: right;
        }

        .btn-toggle.btn-xs.btn-sm:after {
            text-align: left;
            opacity: 0;
        }

        .btn-toggle.btn-xs.btn-sm.active:before {
            opacity: 0;
        }

        .btn-toggle.btn-xs.btn-sm.active:after {
            opacity: 1;
        }

        .btn-toggle.btn-xs.btn-xs:before,
        .btn-toggle.btn-xs.btn-xs:after {
            display: none;
        }

        .btn-toggle.btn-secondary {
            color: #6b7381;
            background: #bdc1c8;
        }

        .btn-toggle.btn-secondary:before,
        .btn-toggle.btn-secondary:after {
            color: #6b7381;
        }

        .btn-toggle.btn-secondary.active {
            background-color: #ff8300;
        }

    </style>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-3 border-right pr-0">
                                <div class="card-body border-bottom">
                                    <div class="btn-list">
                                        <a href="{{route('newproduct')}}" class="btn btn-success"><i
                                                class="fas fa-plus-circle"></i>
                                            Yeni Məhsul Əlavə Edin </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="calendar-events" class="">

                                                <div class="calendar-events mb-3" data-class="bg-info">
                                                    <i class="fa fa-circle text-info mr-2"></i>KATEQORIYALAR
                                                </div>
                                                <div class="list-group" id="list-tab" role="tablist">
                                                    @foreach($categories as $cat)
                                                        {{-- <option value="{{$cat->id}}"> </option>--}}
                                                        <a class="list-group-item list-group-item-action "
                                                           id="list-home-list"
                                                           href="{{route('admincatproducts',$cat->id)}}">
                                                            {{isset(getproductcategorycontent($cat->id,defaultLang())->name)? getproductcategorycontent($cat->id,defaultLang())->name: ''}}
                                                        </a>

                                                    @endforeach

                                                </div>
                                            </div>
                                            <!-- checkbox -->
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="drop-remove">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                <div class="card-header">

                                    {{--                                <a href="{{route('newproduct')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i>--}}
                                    {{--                                    Yeni Məhsul Əlavə Edin </a>--}}
                                    <a href="{{route('newproduct')}}" class="btn btn-secondary"><i
                                            class=" fas fa-file-code"> </i>
                                        1C Entegrasiyası</a>
                                    <a href="{{route('newproduct')}}" class="btn btn-danger"><i
                                            class="fas fa-file-excel"> </i>
                                        Excel Çıxdısı al </a>

                                    <div class="btn-group mr-2 float-right" role="group" aria-label="First group">
                                        {!! $products->links('vendor.pagination.admin-pagination') !!}
                                    </div>

                                    <div class="input-group  mr-3 float-right" style="width: 25%">
                                        <input type="text" class="form-control" placeholder="Axtar" aria-label="Input group example" aria-describedby="btnGroupAddon">
                                    </div>
                                </div>
                                <div class="card-body b-l calender-sidebar">

                                    <div class="row productslist-card">

                                        {{--products items--}}
                                        @foreach($products as $product)
                                            <div class=" col-md-3 col-lg-x-2 col-sm-12 ">
                                                <div class="card " style="bg-color:20px">
                                                    <img id="file-ip-1-preview" src="{{$product->imagepath}}"
                                                         class="card-img-top">

                                                    <div class="card-body ">
                                                        <p class="card-text"> {{$product->name}} </p>
                                                        <hr>
                                                        <span>Stok Sayısı</span>
                                                        <span class="float-right">{{$product->stock}}</span>
                                                        <hr>
                                                        <span> Açar Sözlər</span>

                                                        @if($product->meta_keywords != null)
                                                            <span class="float-right"><i
                                                                    class="ti-check-box"></i></span>
                                                        @endif
                                                        <hr>
                                                        <span>Meta Açıqlama</span>
                                                        @if($product->meta_content != null)
                                                            <span class="float-right"><i
                                                                    class="ti-check-box"></i></span>
                                                        @endif
                                                        <hr>
                                                        <span>Kontent dilleri</span>
                                                        <span class="float-right">
                                                    @foreach(languages() as $lang)
                                                                @if(productlangcontrol($product->id,$lang->code) != null)
                                                                    <span
                                                                        class=" mt-1 ml-1 flag-icon flag-icon-{{productlangcontrol($product->id,$lang->code)=='en'?'gb' :productlangcontrol($product->id,$lang->code)}}"> </span>
                                                                @endif
                                                            @endforeach
                                                      </span>
                                                        <hr>
                                                        @if($product->active == 1)

                                                            <button type="button"
                                                                    class="btn btn-sm btn-toggle productActive active focus "
                                                                    data-id="{{$product->id}}" data-toggle="button"
                                                                    aria-pressed="true" autocomplete="off">
                                                                <div class="handle"></div>
                                                            </button>
                                                        @else
                                                            <button type="button"
                                                                    class="btn btn-sm btn-toggle productActive"
                                                                    data-id="{{$product->id}}" data-toggle="button"
                                                                    aria-pressed="false" autocomplete="off">
                                                                <div class="handle"></div>
                                                            </button>
                                                        @endif
                                                        <a target="_blank"
                                                           href="{{route('site.productDetail',['id'=>$product->id,'slug'=>\Illuminate\Support\Str::slug($product->name)])}}"
                                                           class="btn btn-secondary"><i class="ti-eye"></i></a>
                                                        <a href="{{route('productupdate',$product->id)}}"
                                                           class="btn btn-secondary"><i
                                                                class="ti-pencil"></i></a>

                                                        <button type="button" onclick="document.getElementById('pd{{$product->id}}').submit()" class="btn btn-secondary"><i
                                                                class="ti-trash"></i></button>


                                                        <form id="pd{{$product->id}}"
                                                              action="{{route('productdelete',$product->id)}}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{--products items--}}

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">


                    {{--                @if(isset($products))--}}
                    {{--                    @foreach($products as $product)--}}
                    {{--                        <div class="col-lg-4  col-md-6">--}}
                    {{--                            <div class="card">--}}
                    {{--                            <img class="card-img-top img-fluid" src="{{$service->image}}"--}}
                    {{--                                 alt="Card image cap">--}}
                    {{--                            <div class="card-body">--}}
                    {{--                                <h4 class="card-title text-truncate">{{isset(getservicesdata($service->id,defaultLang())->name)? getservicesdata($service->id,defaultLang())->name: ''}}</h4>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="card-footer">--}}
                    {{--                                <a href="{{route('serviceupdate',$service->id)}}" class="btn btn-warning btn-circle"><i class="fa fa-pencil-alt"></i>--}}
                    {{--                                </a>--}}
                    {{--                                <button type="button" onclick="document.getElementById('deleteservice{{$service->id}}').submit()" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>--}}
                    {{--                                </button>--}}
                    {{--                                @if($service->active == 1)--}}
                    {{--                                    <a  href="{{route('servicedeactive',$service->id)}}" class="btn btn-success btn-rounded"  >--}}
                    {{--                                        <i class=" fas fa-check"></i>  Pasif et--}}
                    {{--                                    </a>--}}
                    {{--                                @else--}}
                    {{--                                    <a href="{{route('serviceactive',$service->id)}}" class="btn waves-effect waves-light btn-rounded btn-secondary"  >--}}
                    {{--                                        Aktif et--}}
                    {{--                                    </a>--}}
                    {{--                                @endif--}}
                    {{--                                <form id="deleteservice{{$service->id}}"--}}
                    {{--                                      action="{{route('servicedelete',$service->id)}}"--}}
                    {{--                                      method="post">--}}
                    {{--                                    @csrf--}}
                    {{--                                    @method('DELETE')--}}
                    {{--                                </form>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                     </div>--}}
                    {{--                    @endforeach--}}
                    {{--                @endif--}}

                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).on('click', '.productActive', function () {
            var ariapressed = $(this).attr('aria-pressed');
            var dataid = $(this).attr('data-id');
            console.log(ariapressed)
            console.log(dataid)
            $.ajax({
                url: "{{route('productactivestatus')}}/",
                type: "post",

                data: {
                    "_token": "{{ csrf_token() }}",
                    'product_id': dataid,
                    'active': ariapressed
                },
                success: function (response) {
                    console.log(response.feedback)
                    // You will get response from your PHP page (what you echo or print)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        })

        // $('.productActive').on('click',function () {
        //     var ariapressed = $(this).attr('aria-pressed');
        //     var dataid = $(this).attr('data-id');
        //     console.log(ariapressed)
        //     console.log(dataid)
        // })
    </script>
@endsection
