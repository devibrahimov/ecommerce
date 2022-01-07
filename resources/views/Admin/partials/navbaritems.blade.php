<!-- Notification -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
       id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false">
        <span><i class="fas fa-comment-alt"></i></span>
        <span class="badge badge-primary notify-no rounded-circle">5</span>
    </a>

</li>
<!-- End Notification -->
<!-- ============================================================== -->



<!-- ============================================================== -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
       id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false">
        <span><i data-feather="mail" class="svg-icon mr-2  "></i></span>
        <span class="badge badge-warning notify-no rounded-circle">{{\Illuminate\Support\Facades\DB::table('message')->where('show',0)->count()}}</span>
    </a>
    @if( \Illuminate\Support\Facades\DB::table('message')->where('show',0)->count() != 0)

        <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
            <ul class="list-style-none">
                <li>
                    <div class="message-center notifications position-relative">
                        <!-- Message -->
                        @php
                            $messages = \Illuminate\Support\Facades\DB::table('message')->where('show',0)->get();
                        @endphp
                        @foreach($messages as $m)
                            <a href="{{route('messageread',$m->id)}}"
                               class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                <div class="btn btn-danger rounded-circle btn-circle"><i
                                        class="fas fa-envelope" class="text-white"></i></div>
                                <div class="w-75 d-inline-block v-middle pl-2">
                                    <h6 class="message-title mb-0 mt-1">{{$m->name}} {{$m->surname}}</h6>
                                    <span class="font-12 text-nowrap d-block text-muted">{{$m->email}}</span>
                                    <span class="font-12 text-nowrap d-block text-muted">{{$m->created_at}}</span>
                                </div>
                            </a>
                    @endforeach
                    <!-- Message -->

                    </div>
                </li>
                <li>
                    <a class="nav-link pt-3 text-center text-dark" href="{{route('messages')}}">
                        <strong>Bütün Mesajları Gör</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>

            </ul>

        </div>
    @endif
</li>
<!-- Notification -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
       id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false">
        <span><i data-feather="bell" class="svg-icon"></i></span>
        <span class="badge badge-primary notify-no rounded-circle">5</span>
    </a>
    {{--    <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">--}}
    {{--        <ul class="list-style-none">--}}
    {{--            <li>--}}
    {{--                <div class="message-center notifications position-relative">--}}
    {{--                    <!-- Message -->--}}
    {{--                    <a href="javascript:void(0)"--}}
    {{--                       class="message-item d-flex align-items-center border-bottom px-3 py-2">--}}
    {{--                        <div class="btn btn-danger rounded-circle btn-circle"><i--}}
    {{--                                data-feather="airplay" class="text-white"></i></div>--}}
    {{--                        <div class="w-75 d-inline-block v-middle pl-2">--}}
    {{--                            <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>--}}
    {{--                            <span class="font-12 text-nowrap d-block text-muted">Just see--}}
    {{--                                                        the my new--}}
    {{--                                                        admin!</span>--}}
    {{--                            <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>--}}
    {{--                        </div>--}}
    {{--                    </a>--}}
    {{--                    <!-- Message -->--}}
    {{--                    <a href="javascript:void(0)"--}}
    {{--                       class="message-item d-flex align-items-center border-bottom px-3 py-2">--}}
    {{--                                                <span class="btn btn-success text-white rounded-circle btn-circle"><i--}}
    {{--                                                        data-feather="calendar" class="text-white"></i></span>--}}
    {{--                        <div class="w-75 d-inline-block v-middle pl-2">--}}
    {{--                            <h6 class="message-title mb-0 mt-1">Event today</h6>--}}
    {{--                            <span--}}
    {{--                                class="font-12 text-nowrap d-block text-muted text-truncate">Just--}}
    {{--                                                        a reminder that you have event</span>--}}
    {{--                            <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>--}}
    {{--                        </div>--}}
    {{--                    </a>--}}
    {{--                    <!-- Message -->--}}
    {{--                    <a href="javascript:void(0)"--}}
    {{--                       class="message-item d-flex align-items-center border-bottom px-3 py-2">--}}
    {{--                                                <span class="btn btn-info rounded-circle btn-circle"><i--}}
    {{--                                                        data-feather="settings" class="text-white"></i></span>--}}
    {{--                        <div class="w-75 d-inline-block v-middle pl-2">--}}
    {{--                            <h6 class="message-title mb-0 mt-1">Settings</h6>--}}
    {{--                            <span--}}
    {{--                                class="font-12 text-nowrap d-block text-muted text-truncate">You--}}
    {{--                                                        can customize this template--}}
    {{--                                                        as you want</span>--}}
    {{--                            <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>--}}
    {{--                        </div>--}}
    {{--                    </a>--}}
    {{--                    <!-- Message -->--}}
    {{--                    <a href="javascript:void(0)"--}}
    {{--                       class="message-item d-flex align-items-center border-bottom px-3 py-2">--}}
    {{--                                                <span class="btn btn-primary rounded-circle btn-circle"><i--}}
    {{--                                                        data-feather="box" class="text-white"></i></span>--}}
    {{--                        <div class="w-75 d-inline-block v-middle pl-2">--}}
    {{--                            <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span--}}
    {{--                                class="font-12 text-nowrap d-block text-muted">Just--}}
    {{--                                                        see the my admin!</span>--}}
    {{--                            <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>--}}
    {{--                        </div>--}}
    {{--                    </a>--}}
    {{--                </div>--}}
    {{--            </li>--}}
    {{--            <li>--}}
    {{--                <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">--}}
    {{--                    <strong>Check all notifications</strong>--}}
    {{--                    <i class="fa fa-angle-right"></i>--}}
    {{--                </a>--}}
    {{--            </li>--}}
    {{--        </ul>--}}
    {{--    </div>--}}
</li>
<!-- End Notification -->
