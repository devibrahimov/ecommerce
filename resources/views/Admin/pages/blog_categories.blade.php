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
                                data-target="#signup-modal"><i class="fa fa-plus-circle"></i> Yeni Kateqoriya Əlavə Et</button>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Başlıq</th>
                                <th scope="col">Əməliyyatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($items))
                               @foreach($items as $item)
                                <tr>
                                    <td>
                                        {{isset(getblogcategorycontent($item->id,defaultLang())->name)? getblogcategorycontent($item->id,defaultLang())->name: ''}}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-circle"
                                                data-toggle="modal" data-target="#edit-modal{{$item->id}}" >
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" onclick="document.getElementById('deleteblogcat{{$item->id}}').submit()" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>
                                        </button>
                                        <form id="deleteblogcat{{$item->id}}"
                                              action="{{route('blogcatdelete',$item->id)}}"
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

                                                <form class="pl-3 pr-3" action="{{route('blog_category_update',$item->id)}}" method="post" >
                                                  @csrf
                                                    @foreach(languages() as $lang)
                                                    <div class="form-group">
                                                        <label>Başlıq ({{$lang->name}})</label>
                                                        <input class="form-control" type="text" name="name_{{$lang->code}}"
                                                        value="   {{isset(getblogcategorycontent($item->id,$lang->code)->name)? getblogcategorycontent($item->id,$lang->code)->name: ''}}">
                                                    </div>
                                                    @endforeach
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


    <!-- Signup modal content -->
    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog"
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

                    <form class="pl-3 pr-3" action="{{route('blog_categories')}}" method="post">

                        @csrf
                        @foreach(languages() as $lang)
                        <div class="form-group">
                            <label>Kategoriya adı ( {{$lang->name}} )</label>
                            <input class="form-control" type="text" required  name="name_{{$lang->code}}" >
                        </div>
                        @endforeach
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">Əlavə et</button>
                        </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@endsection


@section('js')
@endsection
