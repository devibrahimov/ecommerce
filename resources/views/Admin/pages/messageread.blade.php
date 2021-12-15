@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mesaj detayı. </h5>
                        <div class="media">
                             <div class="media-body">
                                <h5 class="mt-0"><strong>Ad: </strong>{{$message->name}}</h5>
                                <h5 class="mt-0"><strong>Soyad: </strong>{{$message->surname}}</h5>
                                <h5 class="mt-0"><strong>Telefon: </strong>{{$message->number}}</h5>
                                <h5 class="mt-0"><strong>E-Poçt: </strong>{{$message->email}}</h5>
                                 <br>
                                 <h5 class="mt-0"><strong>Mesaj Tarixi :</strong>  {{$message->created_at}}</h5>
                                 <h5 class="mt-0"><strong>Mesaj Mətni : </strong> </h5>
                                 <p>{{$message->content}}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
@endsection
