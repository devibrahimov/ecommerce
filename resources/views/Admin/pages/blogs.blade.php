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
                            <a href="{{route('blogcreate')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i>
                                Yeni Blog Yazısı Əlavə Edin </a>
                        </div>
                    </div>
                </div>
                <div class="card-columns">
                    @foreach($blogs as $blog)
                        <div class="card">
                            <img class="card-img-top img-fluid" src="{{$blog->image}}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title text-truncate">{{isset(getblogdata($blog->id,defaultLang())->name)? getblogdata($blog->id,defaultLang())->name: ''}}</h4>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('blogupdate',$blog->id)}}" class="btn btn-warning btn-circle"><i class="fa fa-pencil-alt"></i>
                                </a>
                                <button type="button" onclick="document.getElementById('deleteblog{{$blog->id}}').submit()" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>
                                </button>
                                <form id="deleteblog{{$blog->id}}"
                                      action="{{route('blogdelete',$blog->id)}}"
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
