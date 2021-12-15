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
                            data-target="#full-width-modal"><i class="fa fa-plus-circle"></i> Yeni Sual Əlavə Et</button>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Sual</th>
                            <th scope="col">Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody>
                         @if(isset($items))
                        @foreach($items as $item)
                        <tr>
                            <td>{{isset(getfaqdata($item->id,defaultLang())->question)? getfaqdata($item->id,defaultLang())->question: ''}}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-circle"
                                        data-toggle="modal" data-target="#edit-modal{{$item->id}}" >
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" onclick="document.getElementById('deletefaq{{$item->id}}').submit()" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>
                                </button>
                                <form id="deletefaq{{$item->id}}"
                              action="{{route('faqdelete',$item->id)}}"
                              method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                            </td>
                        </tr>
                        <!-- Signup modal content -->
                        <div id="edit-modal{{$item->id}}" class="modal fade" tabindex="-1" role="dialog"
                             aria-hidden="true">
                            <div class="modal-dialog modal-full-width">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form class="pl-3 pr-3" action="{{route('faqupdate',$item->id)}}"
                                              method="post" >
                                            @csrf
                                            <div class="form-group">
                                                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                                    @foreach(languages() as $lang)
                                                        <li class="nav-item">
                                                            <a href="#content{{$item->id}}{{$lang->code}}" data-toggle="tab" aria-expanded="@if($loop->first) true @else false @endif "
                                                               class="nav-link @if($loop->first)   active @endif ">
                                                                <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                                                <span class="d-none d-lg-block">{{$lang->name}}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                                <div class="tab-content">
                                                    @foreach(languages() as $language)
                                                        <div class="tab-pane @if($loop->first) show active @endif " id="content{{$item->id}}{{$language->code}}">
                                                            <div class="row">
                                                                <div class="form-group col-12">
                                                                    <label for="">Sual ({{$language->name}})</label>
                                                                    <input type="text" class="form-control" required  name="question_{{$language->code}}"
                                                                           value="{{isset(getfaqdata($item->id,$language->code)->question)? getfaqdata($item->id,$language->code)->question: ''}}" >
                                                                </div>
                                                                <div class="form-group col-12">
                                                                    <label for="">Cavab ({{$language->name}}) </label>
                                                                    <textarea type="text" rows="10" required class="form-control mycontent"
                                                                              name="answer_{{$language->code}}" >{!! isset(getfaqdata($item->id,$language->code)->answer)? getfaqdata($item->id,$language->code)->answer: ''!!}</textarea>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button type="submit" class="btn btn-success">Yadda Saxla</button>
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
<div id="full-width-modal" class="modal fade " tabindex="-1" role="dialog"
     aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <a href="index.html" class="text-success">
                      <span> <img  src="{{setting()->logo}}" alt=""
                              height="18"></span>
                    </a>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Yeni Sual Əlavə Edin</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('adminfaq')}}" method="post">
                                        @csrf
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
                                                            <label for="">Sual ({{$lang->name}})</label>
                                                            <input type="text" class="form-control" required  name="question_{{$lang->code}}"  >
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="">Cavab ({{$lang->name}}) </label>
                                                            <textarea type="text" rows="10" required class="form-control mycontent"
                                                                      name="answer_{{$lang->code}}" ></textarea>
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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection


@section('js')
@endsection
