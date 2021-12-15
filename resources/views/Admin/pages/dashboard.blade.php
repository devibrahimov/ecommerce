@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">{{\Illuminate\Support\Facades\DB::table('blogs')->count()}}</h2>
                                   </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Blog Yazıları</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-newspaper"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                    class="set-doller"> </sup>{{\Illuminate\Support\Facades\DB::table('services')->count()}}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Xidmət
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class=" fas fa-ambulance"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">{{\Illuminate\Support\Facades\DB::table('press')->count()}}</h2>
                                </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Mətbuat xəbəri</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">{{\Illuminate\Support\Facades\DB::table('press')->count()}}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Mesaj</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-envelope"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End First Cards -->
        <!-- *************************************************************** -->

        <div class="row">
            <div class="col-lg-8 ">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="card-title">MANŞETDƏ OLANLAR</h4>

                        <div id="carouselExampleIndicators3" class="carousel slide"
                             data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators3" data-slide-to="0"
                                    class="active"></li>
                                <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                @foreach($carousels as $carousel)

                                <div class="carousel-item active">
                                    <img class="img-fluid" style="width:100%;height:400px;object-fit: cover" src=" {{$carousel->image}}"
                                         alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="text-white bg-dark p-1"> {!! getcarouseldata($carousel->id,defaultLang())->title !!}</h5>
                                        <br>
                                        <h6 class="text-white bg-dark p-1  "> {!! getcarouseldata($carousel->id,defaultLang())->header !!}</h6>
                                        <p  class="text-white bg-dark p-1">{{getcarouseldata($carousel->id,defaultLang())->content}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators3"
                               role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators3"
                               role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <!-- *************************************************************** -->
                    <!-- Start Sales Charts Section -->
                    <!-- *************************************************************** -->
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Xidmətlər</h4>
                                <div class="row">
                                @if(isset($services))
                                    @foreach($services as $service)
                                        <div class="col-md-4 col-lg-4">
                                            <div class="card">
                                                <img class="card-img-top img-fluid" src="{{$service->image}}"
                                                     alt="Card image cap">
                                                <div class="card-body">
                                                    <a href="{{route('serviceupdate',$service->id)}}">
                                                        <h4 class="card-title ">{{isset(getservicesdata($service->id,defaultLang())->name)? getservicesdata($service->id,defaultLang())->name: ''}}</h4>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- *************************************************************** -->
                    <!-- End Sales Charts Section -->
                    <!-- *************************************************************** -->

                </div>
                <!-- *************************************************************** -->
                <!-- Start Location and Earnings Charts Section -->
                <!-- *************************************************************** -->
                <div class="row">
                 <div class="col-md-12">
                     <div class="card">
                         <div class="card-body">
                             <h4 class="card-title">Son Blog Yazıları</h4>
                             <div class="row">
                                 @if(isset($blogs))
                                     @foreach($blogs as $blog)
                                         <div class="col-md-6 col-lg-6">
                                             <div class="card">
                                                 <img class="card-img-top img-fluid" src="{{$blog->image}}"
                                                      alt="Card image cap">
                                                 <div class="card-body">
                                                     <a href="{{route('blogupdate',$blog->id)}}">
                                                         <h4 class="card-title ">{{isset(getblogdata($blog->id,defaultLang())->name)? getblogdata($blog->id,defaultLang())->name: ''}}</h4>
                                                     </a>
                                                 </div>
                                             </div>
                                         </div>
                                     @endforeach
                                 @endif
                             </div>
                         </div>
                     </div>
                 </div>

                </div>
                <!-- *************************************************************** -->
                <!-- End Location and Earnings Charts Section -->
                <!-- *************************************************************** -->

            </div>
            <!-- *************************************************************** -->
            <!-- Start Currencies Table -->
            <!-- *************************************************************** -->
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Rəsmi məzənnələr bülleteni</h4>
                        <div class="" style="height:180px">
                            <div id="visitbylocate" style="height:100%"></div>
                        </div>

                        {{--                      ECHO  $icerik->Code .'-'. $icerik->Nominal.'-'. $icerik->Name.'-'. $icerik->Value . '////////////////';--}}
                        <div class="row  align-items-center mt-1 border-bottom">
                            <div class="col-4 text-left">
                                <span class=" font-12 text-primary font-weight-medium">Nominal</span>
                            </div>
                            <div class="col-5 text-left">
                                <span class=" font-12 text-primary font-weight-medium">Xarici Valyuta</span>
                            </div>

                            <div class="col-3 text-right">
                                <span class="mb-0 font-12 text-primary font-weight-medium">AZN</span>
                            </div>
                        </div>
                        @foreach ($currencies->ValType[1]  as $cur)
                            <div class="row  align-items-center mt-1 border-right">
                                <div class="col-2 text-right">
                                    <span class="text-muted font-10">  {{$cur->Nominal}} </span>
                                </div>

                                <div class="col-7 text-left">
                                    <span class="text-muted font-12"> {{$cur->Name}}</span>
                                </div>

                                <div class="col-3 text-right">
                                    <span class="mb-0 font-12 text-dark font-weight-medium">{{$cur->Value}}</span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- *************************************************************** -->
            <!-- End Currencies Section -->
            <!-- *************************************************************** -->
        </div>


    </div>
@endsection


@section('js')
@endsection
