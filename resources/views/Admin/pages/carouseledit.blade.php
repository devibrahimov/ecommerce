@extends('Admin.index')

@section('css')
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Manşet Redaktə Səhifəsi</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('carouselupdate',$carousel->id)}}" method="post"   enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div class="col-md-6">
                            <img src="{{$carousel->image}}" alt="" height="300">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="">Sıralama </label>
                                    <input type="number" class="form-control" required name="desk" value="{{isset
                                    ($carousel->desk)? $carousel->desk:null}}" >
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Şəkil</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" accept="image/*" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Şəkil seçin</label>

                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                        <hr>
                        <div class="form-group">
                            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                @foreach(languages() as $lang)
                                    <li class="nav-item">
                                        <a href="#{{$lang->code}}" data-toggle="tab" aria-expanded="@if($loop->first) true @else false @endif "
                                           class="nav-link @if($loop->first)   active @endif ">
                                            <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                            <span class="d-none d-lg-block">{{$lang->name}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content">
                                @foreach(languages() as $lang)
                                    <div class="tab-pane @if($loop->first) show active @endif " id="{{$lang->code}}">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label for="">Başlıq üstü yazı({{$lang->name}})</label>
                                                <input type="text" class="form-control"  name="title_{{$lang->code}}"
                                                 value="{{isset(getcarouselcontent($carousel->id,$lang->code)->title)?getcarouselcontent($carousel->id,$lang->code)->title:null}}"  >
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="">Başlıq ({{$lang->name}})</label>
                                                <input type="text" class="form-control"  name="header_{{$lang->code}}"
                                                 value="{{isset(getcarouselcontent($carousel->id,$lang->code)->header)?getcarouselcontent($carousel->id,$lang->code)->header:null}}"  >
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="">Mətin ({{$lang->name}})</label>
                                                <input type="text" class="form-control" maxlength="100" name="content_{{$lang->code}}"
                                                value="{{isset(getcarouselcontent($carousel->id,$lang->code)->content)?getcarouselcontent($carousel->id,$lang->code)->content:null}}">
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="">Yönləndiriləcək Url ({{$lang->name}})</label>
                                                <input type="text" class="form-control" maxlength="1000" name="url_{{$lang->code}}"
                                                value="{{isset(getcarouselcontent($carousel->id,$lang->code)->url)?getcarouselcontent($carousel->id,$lang->code)->url:null}}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-success">Yadda Saxla</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
    <script src="/admin/assets/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '.mycontent',
            height:250
        });
    </script>
@endsection
