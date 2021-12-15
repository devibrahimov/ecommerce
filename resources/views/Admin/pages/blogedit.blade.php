@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Blog Yazısını Redaktə Edin</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('blogupdate',$blog->id)}}" method="post"   enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="form-group col-5">
                                    <label for="">Şəkil</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"   name="image" accept="image/jpeg ,image/png" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Şəkil seçin</label>

                                    </div>
                                </div>
                                <div class="form-group col-5">
                                    <label for="">Kategoriya</label>
                                    <select name="category" required class="custom-select mr-sm-2">
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}" {{$cat->id == $blog->category?'selected':''}}> {{isset(getblogcategorycontent($cat->id,defaultLang())->name)? getblogcategorycontent($cat->id,defaultLang())->name: ''}}</option>
                                        @endforeach
                                    </select>
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
                                                    <label for="">Başlıq ({{$lang->name}})</label>
                                                    <input type="text" class="form-control"  name="name_{{$lang->code}}"
                                                           value="{{isset(getblogdata($blog->id,$lang->code)->name)?getblogdata($blog->id,$lang->code)->name:null}}"  >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="">Açıqlama ({{$lang->name}}) </label>
                                                    <textarea type="text" class="form-control mycontent"
                                                              name="content_{{$lang->code}}" >{!!isset(getblogdata($blog->id,$lang->code)->content)?getblogdata($blog->id,$lang->code)->content:null!!}</textarea>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="">Meta Açıqlama ({{$lang->name}})</label>
                                                    <input type="text" class="form-control" maxlength="160" name="metacontent_{{$lang->code}}"
                                                           value="{{isset(getblogdata($blog->id,$lang->code)->meta_content)?getblogdata($blog->id,$lang->code)->meta_content:null}}">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="">Meta Açar Kəlimələr ({{$lang->name}}) <span class="text-danger">(sözləri birbirindən , ilə ayırın)*</span></label>
                                                    <input type="text" class="form-control" maxlength="800" name="metakeywords_{{$lang->code}}"
                                                           value="{{isset(getblogdata($blog->id,$lang->code)->meta_keywords)?getblogdata($blog->id,$lang->code)->meta_keywords:null}}">
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
            height:250,
            plugins: 'media',
        });
    </script>
@endsection
