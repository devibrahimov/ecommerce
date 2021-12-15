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
                            data-target="#signup-modal"><i class="fa fa-plus-circle"></i> Yeni Admin Qeydiyyatı</button>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Ad</th>
                            <th scope="col">Email</th>
                            <th scope="col">Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($users))
                        @foreach($users as $u)
                        <tr>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-circle"
                                        data-toggle="modal" data-target="#edit-modal{{$u->id}}" >
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" onclick="document.getElementById('deleteuser{{$u->id}}').submit()" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>
                                </button>
                                <form id="deleteuser{{$u->id}}"
                              action="{{route('userdelete',$u->id)}}"
                              method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                            </td>
                        </tr>


                        <!-- Signup modal content -->
                        <div id="edit-modal{{$u->id}}" class="modal fade" tabindex="-1" role="dialog"
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

                                        <form class="pl-3 pr-3" action="{{route('adminusersupdate',$u->id)}}" method="post">

                                            <div class="form-group">
                                                <label for="username">Ad</label>
                                                <input class="form-control" type="text" id="username" required=""  name="username" value="{{$u->name}}" >
                                            </div>
                                            @csrf
                                            <div class="form-group">
                                                <label for="emailaddress">Email</label>
                                                <input class="form-control" type="email" id="emailaddress" required=""  name="emailaddress" value="{{$u->email}}"  >
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Şifrə</label>
                                                <input class="form-control" type="password" id="password"  minlength="6" name="password"  >
                                            </div>

                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <p>Saytın təhlükəsizliyi üçün Bu Məlumatları Gizli Saxlamağınızı xahiş edirik.<br>
                                                        Şifrə yazarkən  qarışıq Şifrələr yazmaqa çalışın<br><span class="span text-info"> (Nümunə : !Ad_19min.90 )</span>
                                                    </p>
                                                </div>
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

                <form class="pl-3 pr-3" action="{{route('adminusers')}}" method="post">

                    <div class="form-group">
                        <label for="username">Ad</label>
                        <input class="form-control" type="text" id="username" required=""  name="username" >
                    </div>
                    @csrf
                    <div class="form-group">
                        <label for="emailaddress">Email</label>
                        <input class="form-control" type="email" id="emailaddress" required=""  name="emailaddress" >
                    </div>

                    <div class="form-group">
                        <label for="password">Şifrə</label>
                        <input class="form-control" type="password" id="password" required=""  minlength="6" name="password"  >
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <p>Saytın təhlükəsizliyi üçün Bu Məlumatları Gizli Saxlamağınızı xahiş edirik.<br>
                          Şifrə yazarkən  qarışıq Şifrələr yazmaqa çalışın<br><span class="span text-info"> (Nümunə : !Ad_19min.90 )</span>
                          </p>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Qeyd Ol</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection


@section('js')
@endsection
