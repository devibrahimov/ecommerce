@extends('Admin.index')

@section('css')

    <link href="/admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
@endsection


@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> İstifadəçi Siyahısı </h4>

                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th>Ad</th>
                                    <th>Soyad</th>
                                    <th>Email</th>
                                    <th>Telefon nömrəsi</th>
                                    <th>Adres</th>
                                    <th>Qeydiyyat Tarixi</th>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach($customers as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->surname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->adress}}</td>
                                    <td>{{$user->created_at}}</td>

                                </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Ad</th>
                                    <th>Soyad</th>
                                    <th>Email</th>
                                    <th>Telefon nömrəsi</th>
                                    <th>Adres</th>
                                    <th>Qeydiyyat Tarixi</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- order table -->

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
@endsection

@section('js')

    <script src="/admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/js/pages/datatable/datatable-basic.init.js"></script>
@endsection
