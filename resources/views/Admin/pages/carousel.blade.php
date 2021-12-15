@extends('Admin.index')

@section('css')
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="btn-list">
                        <a href="{{route('newcarousel')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i>
                            Yeni Manşet Əlavə Edin </a>
                    </div>
                </div>
            </div>
            <div class="card-columns">
                @foreach($carousels as $carousel)
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{$carousel->image}}"
                         alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title text-truncate">{{getcarouseldata($carousel->id,defaultLang())->title}}</h4>
                        <p class="card-text"> </p>
                        <p class="card-text"><small class="text-muted">Sıralama ({{$carousel->desk}})</small><br>
                            <small class="text-muted">Mətin ({{getcarouseldata($carousel->id,defaultLang())->content}})</small>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('carouselupdate',$carousel->id)}}" class="btn btn-warning btn-circle"><i class="fa fa-pencil-alt"></i>
                        </a>
                        <button type="button" onclick="document.getElementById('carouseldelete{{$carousel->id}}').submit()" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>
                        </button>
                        @if($carousel->active == 1)
                            <a  href="{{route('carouseldeactive',$carousel->id)}}" class="btn btn-success btn-rounded"  >
                                <i class=" fas fa-check"></i>  Pasif et
                            </a>
                        @else
                            <a href="{{route('carouselactive',$carousel->id)}}" class="btn waves-effect waves-light btn-rounded btn-secondary"  >
                                Aktif et
                            </a>
                        @endif
                        <form id="carouseldelete{{$carousel->id}}"
                              action="{{route('carouseldelete',$carousel->id)}}"
                              method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@endsection
