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
                        <a href="{{route('newservice')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i>
                            Yeni Ximət Əlavə Edin </a>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(isset($services))
                    @foreach($services as $service)
                        <div class="col-lg-3 col-md-3">
                            <div class="card">
                            <img class="card-img-top img-fluid" src="{{$service->image}}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title text-truncate">{{isset(getservicesdata($service->id,defaultLang())->name)? getservicesdata($service->id,defaultLang())->name: ''}}</h4>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('serviceupdate',$service->id)}}" class="btn btn-warning btn-circle"><i class="fa fa-pencil-alt"></i>
                                </a>
                                <button type="button" onclick="document.getElementById('deleteservice{{$service->id}}').submit()" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>
                                </button>
                                @if($service->active == 1)
                                    <a  href="{{route('servicedeactive',$service->id)}}" class="btn btn-success btn-rounded"  >
                                        <i class=" fas fa-check"></i>  Pasif et
                                    </a>
                                @else
                                    <a href="{{route('serviceactive',$service->id)}}" class="btn waves-effect waves-light btn-rounded btn-secondary"  >
                                        Aktif et
                                    </a>
                                @endif
                                <form id="deleteservice{{$service->id}}"
                                      action="{{route('servicedelete',$service->id)}}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@endsection
