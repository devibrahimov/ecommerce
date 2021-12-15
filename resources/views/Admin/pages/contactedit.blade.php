@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <div class="container-fluid">
        <form action="{{route('admincontactupdate')}}" method="post" >

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Telefon</label>
                                            <input type="text" class="form-control"  name="number" value="{{$contact->number}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Telefon</label>
                                            <input type="text" class="form-control"  name="phone" value="{{$contact->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Fax</label>
                                            <input type="text" class="form-control"  name="fax" value="{{$contact->fax}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" name="email" value="{{$contact->email}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Adres</label>
                                            <textarea class="form-control" name="address"
                                                      maxlength="180" rows="4" >{!!$contact->address !!}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Google Map iframe kodu </label>
                                            <textarea class="form-control" name="googlemap"
                                                      maxlength="800" rows="4" >{!! $contact->googlemap !!}</textarea>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Facebook</label>
                                            <input type="text" class="form-control"  name="facebook" value="{{$contact->facebook}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">İnstagram</label>
                                            <input type="text" class="form-control"  name="instagram" value="{{$contact->instagram}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Likedin</label>
                                            <input type="text" class="form-control"  name="linkedin" value="{{$contact->linkedin}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Youtube</label>
                                            <input type="text" class="form-control"  name="youtube" value="{{$contact->youtube}}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Həftə içi İş Saatı (Başlama)</label>
                                            <input type="text" class="form-control"  name="workinghourstart" value="{{$contact->workinghourstart}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Həftə içi İş Saatı (Bitmə)</label>
                                            <input type="text" class="form-control"  name="workinghourend" value="{{$contact->workinghourend}}">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Yadda Saxla</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @csrf
        </form>
    </div>
@endsection


@section('js')
@endsection
