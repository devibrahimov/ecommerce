@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#presscategories"><i class="fa fa-list"></i>
                            Kategoriyalar
                        </button>

                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#signup-modal"><i class="fa fa-plus-circle"></i>
                            Yeni Xəbər Əlavə Et
                        </button>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th width="15%">Başlıq</th>
                                <th width="20%">Şəkil</th>
                                <th width="35%">Mətn</th>
                                <th width="5%">Ana Səhifədə</th>
                                <th width="25%">Əməliyyatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($items))
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{$item->title}}</td>
                                        <td><img src="{{$item->image}}" width="200px" alt=""></td>
                                        <td>
                                            <b>URL</b>:{{$item->url}} <br>
                                            <b>video url</b> :{{$item->movie}}<br>
                                            <b>Metn</b>: {{$item->content}}
                                        </td>
                                        <td>
                                            @if($item->athome == 1)
                                                <div  class="btn btn-success btn-circle"  >
                                                    <i class=" fas fa-check"></i>
                                                </div>
                                            @else
                                                <a href="{{route('pressactiveathome',$item->id)}}" class="btn btn-secondary athomeactive"  >
                                                    Önə Çək
                                                </a>
                                            @endif
                                        </td>
                                        <td>

                                            <button type="button" class="btn btn-info btn-circle"
                                                    data-toggle="modal" data-target="#edit-modal{{$item->id}}" >
                                                <i class="fa fa-pencil-alt"></i>
                                            </button>
                                            <button type="button" onclick="document.getElementById('deletepress{{$item->id}}').submit()" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>
                                            </button>
                                            <form id="deletepress{{$item->id}}"
                                                  action="{{route('pressdelete',$item->id)}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>


                                    <!-- Signup modal content -->
                                    <div id="edit-modal{{$item->id}}" class="modal fade" tabindex="-1" role="dialog"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-body">
                                                    <div class="text-center mt-2 mb-4">
                                                        <a href="index.html" class="text-success">
                                    <span> <img  src="{{setting()->logo}}" alt=""
                                                 height="18"></span>
                                                        </a>
                                                    </div>

                                                    <form class="pl-3 pr-3" action="{{route('adminpressupdate',$item->id)}}" method="post" enctype="multipart/form-data">

                                                        <div class="form-group">
                                                            <label> Şəkil </label>
                                                            <input class="form-control" type="file" name="image" >
                                                        </div>

                                                        <div class="form-group mb-4">
                                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Kategoriya</label>
                                                            <select class="custom-select mr-sm-2" name="category">
                                                                @foreach($categories as $category)
                                                                    <option {{$item->category == $category->category_id? 'selected':''}} value="{{$category->category_id}}">{{getpresssdata($category->category_id,defaultLang())->name}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Başlıq</label>
                                                            <input class="form-control" type="text" value="{{$item->title}}"  name="title" >
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Mətin</label>
                                                            <textarea class="form-control"  minlength="6" maxlength="490" name="contentdata" >{{$item->content}}</textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Url Adresi</label>
                                                            <input class="form-control" type="text" value="{{$item->url}}"  name="url" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Video Url Adresi</label>
                                                            <input class="form-control" type="text" value="{{$item->movie}}"  name="movie" >
                                                        </div>
                                                        <div class="form-group text-center">
                                                            <button class="btn btn-primary" type="submit">Redaktə et</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="presscategories" class="modal fade" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
{{--                   <div class="row">--}}
{{--                       <div class="col-12">--}}
{{--                           <div class="card">--}}
{{--                               <div class="card-body">--}}

{{--                                   <button type="button" class="btn btn-primary" data-toggle="modal"--}}
{{--                                           data-target="#newcategory"><i class="fa fa-plus-circle"></i>--}}
{{--                                       Yeni Kategoriya Əlavə Et--}}
{{--                                   </button>--}}

{{--                               </div>--}}
{{--                           </div>--}}
{{--                       </div>--}}
{{--                   </div>--}}
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ad</th>
{{--                            <th scope="col">Əməliyyatlar</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$category->category_id}}</th>
                                <td>{{isset(getpresssdata($category->category_id,defaultLang())->name)? getpresssdata($category->category_id,defaultLang())->name: ''}}</td>
{{--                                <td>--}}
{{--                                    <button type="button" class="btn btn-info btn-circle"--}}
{{--                                            data-toggle="modal" data-target="#edit-modal{{$category->category_id}}" >--}}
{{--                                        <i class="fa fa-pencil-alt"></i>--}}
{{--                                    </button>--}}
{{--                                    <button type="button" onclick="document.getElementById('deletepress{{$category->category_id}}').submit()" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>--}}
{{--                                    </button>--}}
{{--                                    <form id="deletepress{{$category->category_id}}"--}}
{{--                                          action="{{route('pressdelete',$category->category_id)}}"--}}
{{--                                          method="post">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                    </form>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">

                      <span> <img  src="{{setting()->logo}}" alt=""
                                   height="180">
                      </span>
                    </div>

                    <form class="pl-3 pr-3" action="{{route('adminpress')}}" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label > Şəkil </label>
                            <input class="form-control" type="file" required=""  name="image" >
                        </div>
                        <div class="form-group mb-4">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Kategoriya</label>
                            <select class="custom-select mr-sm-2" name="category">
                               @foreach($categories as $category)
                                <option value="{{ $category->category_id }}">{{getpresssdata($category->category_id,defaultLang())->name}}</option>
                               @endforeach
                            </select>
                        </div>
                        @csrf
                        <div class="form-group">
                            <label>Başlıq</label>
                            <input class="form-control" type="text" required=""  name="title" >
                        </div>

                        <div class="form-group">
                            <label>Mətin</label>
                            <textarea class="form-control"  required=""  minlength="6" maxlength="490" name="contentdata"  ></textarea>
                        </div>

                        <div class="form-group">
                            <label>Url Adresi</label>
                            <input class="form-control" type="text" required=""  name="url" >
                        </div>
                        <div class="form-group">
                            <label>Video Url Adresi</label>
                            <input class="form-control" type="text"    name="movie" >
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">Əlavə et</button>
                        </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


@endsection


@section('js')
@endsection
