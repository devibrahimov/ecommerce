@extends('Admin.index')

@section('css')
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Dil</th>
                            <th scope="col">Uri</th>
                            <th scope="col">Aktivlik</th>
                            <th scope="col">Digər</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($languages as $lng)
                        <tr>
                            <th scope="row">4</th>
                            <td>{{$lng->name}}</td>
                            <td>{{$lng->code}}</td>
                            <td>
                                @if($lng->active == 0)
                                <button class="btn btn-sm btn-success">Aktiv et</button>
                                @endif
                                @if($lng->active == 1)
                                    <button class="btn btn-sm btn-info">Deaktiv et</button>
                                @endif

                            </td>
                            <td>  <a href="{{route('languageEdit', $lng->code )}}" class="btn btn-sm btn-warning">Redaktə Et</a> </td>
                        </tr>
                       @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@endsection
