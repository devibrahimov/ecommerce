@extends('Template.index')

@section('css')
    <link rel="stylesheet" href="/assets/css/contact.css">
@endsection


@section('content')
    <div class="contactPage">
        <h3>Свяжитесь С Нами</h3>
        <p>
        <li><a href="{{route('site.index')}}">{{__('content.home')}}</a></li>
            <span> <i class="fas fa-angle-double-right"></i> </span>
            <span> {{__('content.contact')}} </span>
        </p>
    </div>
    <div class="container-contact">
        <div class="gmap_canvas">
            {!! contact()->googlemap !!}
        </div>
    </div>
    <div class="container2">
        <div class="empty"></div>
        <div class="container-form">
            <div class="left-itm forms">

                <form action="{{route('sendmessage')}}" method="post">
                    <div class="form_group">
                        <div class="left-input">
                            <label for="exampleFormControlInput1" class="form-label"> Ad</label>
                            <input type="text" name="name" class="form-control"  maxlength="20" required placeholder="{{__('content.First Name')}} *">
                        </div>
                        <div class="right-input">
                            <label for="exampleFormControlInput1" class="form-label"> E-poçt</label>
                          <input type="text"  name="surname" class="form-control" maxlength="20"  required  placeholder="{{__('content.Last Name')}} *">
                        </div>
                    </div>
                    @csrf
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">Mövzu</label>
                              <input type="email"  name="email" class="form-control" maxlength="50"  required placeholder="{{__('content.Email')}} *">

                        </div>
                    </div>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">Mövzu</label>
                           <input type="text"   name="number" class="form-control" required maxlength="13"  placeholder="{{__('content.Phone Number')}} *">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlTextarea1" class="form-label">Mesajınız (istəyə
                                görə)</label>
                            <textarea name="message" class="form-control" maxlength="500" required cols="30" rows="5"placeholder="{{__('content.Message')}} *"></textarea>
                        </div>
                    </div>
                    <div class="form_group">
                        <button type="submit">{{__('content.Send')}}</button>
                    </div>
                </form>
            </div>
            <div class="right-itm forms">
                <div class="item-contact">
                    <div class="left-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="right-text">
                        <p>{{__('content.address')}}</p>
                        <span>{{contact()->address}}</span>
                    </div>
                </div>
                <div class="item-contact">
                    <div class="left-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="right-text">
                        <p>{{__('content.number')}}</p>
                        <span>{{__('content.number')}}</span>
                    </div>
                </div>
                <div class="item-contact">
                    <div class="left-icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="right-text">
                        <p>{{__('content.email')}}</p>
                        <span><a href="mailto:{{contact()->email}}">{{contact()->email}}</a></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')


@endsection
