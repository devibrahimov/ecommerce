@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">

                    <form action="{{route('adminaboutus')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                        <h4 class="card-title mb-3">Hakkımızda </h4>
                        <div class="row">
                            <div class="input-group mb-3 col-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Yükləmə</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" required name="image" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Şəkil seçin</label>
                                </div>
                            </div>

                        </div>

                        <hr>
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
                            <div class="tab-pane @if($loop->first) show active @endif" id="{{$lang->code}}">
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label for="">Başlıq ({{$lang->name}})</label>
                                        <input type="text" class="form-control" maxlength="160" name="header_{{$lang->code}}"  >
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Ana Səhifə Açıqlama ({{$lang->name}}) </label>
                                        <textarea type="text" class="form-control mycontent"
                                                  name="homecontent_{{$lang->code}}" ></textarea>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="">Açıqlama ({{$lang->name}}) </label>
                                        <textarea type="text" class="form-control mycontent"
                                                  name="content_{{$lang->code}}" ></textarea>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Meta Açıqlama ({{$lang->name}})</label>
                                        <input type="text" class="form-control" maxlength="160" name="metacontent_{{$lang->code}}" >
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Meta Açar Kəlimələr ({{$lang->name}})</label>
                                        <input type="text" class="form-control" maxlength="800" name="metakeywords_{{$lang->code}}"  >
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-success">Yadda Saxla</button>
                    </div> <!-- end card-body-->
                    </form>
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row-->
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
@endsection

@section('js')
    <script src="/admin/assets/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '.mycontent',
            height:250,
            plugins: "code",
            toolbar: "code"
        });
    </script>
@endsection
