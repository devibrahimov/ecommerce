@extends('Admin.index')

@section('css')
    <link href="/admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Mesajlar</h4>
                        <h6 class="card-subtitle"> Saytda bizimlə Əlaqə bölümündə formdan göndərilən mesajlar </h6>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th>Ad</th>
                                    <th>Soyad</th>
                                    <th>E-Poçt</th>
                                    <th>Nömrə</th>
                                    <th>Mesaj tarixi</th>
                                    <th>   </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{$message->name}}</td>
                                        <td>{{$message->surname}}</td>
                                        <td>{{$message->email}}</td>
                                        <td>{{$message->number}}</td>
                                        <td>{{$message->created_at}}</td>
                                        <td>
                                            <a href="{{route('messageread',$message->id)}}" class="btn btn-warning btn-circle"><i class="fa fa-eye"></i>
                                            </a>
                                            @if($message->show == 0)
                                                <button  class="btn waves-effect waves-light btn-rounded btn-success"  >
                                                    Oxunmayıb
                                                </button>
                                            @endif
                                            <button type="button" onclick="document.getElementById('messagedelete{{$message->id}}').submit()" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>
                                            </button>
                                            <form id="messagedelete{{$message->id}}"
                                                  action="{{route('messagedelete',$message->id)}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Ad</th>
                                    <th>Soyad</th>
                                    <th>E-Poçt</th>
                                    <th>Nömrə</th>
                                    <th>Mesaj tarixi</th>
                                    <th>   </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="/admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/js/pages/datatable/datatable-basic.init.js"></script>
@endsection
