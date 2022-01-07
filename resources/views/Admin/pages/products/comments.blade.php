@extends('Admin.index')

@section('css')
@endsection


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-lg-3 col-xl-2 border-right">
                            <div class="card-body border-bottom">
                             <h4> Şərhlər Siyahısı </h4>
                            </div>
                            <div class="scrollable position-relative" style="height: calc(100vh - 111px);">
                                <ul class="mailbox list-style-none">
                                    <li>
                                        <div class="message-center">
                                            @foreach($comments as $comment)
                                            <span    class="message-item d-flex align-items-center border-bottom px-3 py-2" data-id="{{$comment->cr_id}}"     >
                                                <div class="user-img">
                                                    <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png"
                                                    alt="user" class="img-fluid rounded-circle" width="40px">
                                                    <span  class="profile-status online float-right"></span>
                                                </div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">{{$comment->customer->name}} {{$comment->customer->surname}} </h6>

                                                    <span class="font-12 text-nowrap d-block text-muted">{{$comment->created_at}}</span>
                                                </div>
                                            </span>
                                            @endforeach

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9  col-xl-10">
                            <div class="chat-box scrollable position-relative"
                                 style="height: calc(100vh - 111px);">
                                <!--chat Row -->
                                <ul class="chat-list list-style-none px-3 pt-3" id="chatcontent">
                                    <img  src="http://dash.coolsmartphone.com/wp-content/uploads/2015/09/mment1.jpg" alt="">
                                </ul>
                            </div>
                            <div class="card-body border-top" id="commentBox">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
    <script>


        var  commentsJsonData =   {!! json_encode( $comments , JSON_UNESCAPED_UNICODE   )  !!}

        $(document).on('click','.message-item ',function(){
            var a = $(this).attr('data-id')
           // console.log(   JSON.stringify(commentsJsonData) )
            var searchResult = commentsJsonData.find(commentsJsonData => commentsJsonData.cr_id == a);

            var usercomment =' <li class="chat-item list-style-none mt-3">'+
            '<div class="chat-img d-inline-block">'+
            '<img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="user" class="rounded-circle" width="45">'+
            '</div>'+
            '<div class="chat-content d-inline-block pl-3">'+
            '<h6 class="font-weight-medium">Istifadəçi Şərhi</h6>'+
            '<div class="msg p-2 d-inline-block mb-1">'+ searchResult.comment+'</div>'+
            '</div>'+
            '<div class="chat-time d-block font-10 mt-1 mr-0 mb-3">'+ searchResult.created_at +'</div>'+
            '</li>' ;
            $('#chatcontent').html('');
            $('#chatcontent').append(usercomment);

            if(searchResult.feedback != ''){
                var AdminAnsver =  '<li class="chat-item odd list-style-none mt-3">' +
                    '<div class="chat-content text-right d-inline-block pl-3">' +
                    '<div class="box msg p-2 d-inline-block mb-1"> ' +searchResult.feedback+'</div>' +
                    '<br></div></li>';

                $('#commentBox').html('');

                $('#chatcontent').append(AdminAnsver);
            }
            else{
                var AdminAnsverBox = '<div class="row"><div class="col-9"><div class="input-field mt-0 mb-0">' +
                    '<input id="textarea1" data-crid="'+searchResult.cr_id+'" placeholder="Bu Şərh üçün cavabınızı yazın" name="feedback" maxlength="2000" class="form-control border-0" type="text">' +
                    '</div> </div>' +
                    '<div class="col-3">' +
                    '<a class="btn-circle btn-lg btn-cyan float-right text-white" id="sendbox" href="javascript:void(0)">' +
                    '<i class="fas fa-paper-plane"></i></a>' +
                    '</div> </div>' ;

                $('#commentBox').html(AdminAnsverBox);

            }

            if(searchResult.see ==0){

            $.ajax({
                url: "{{route('productCommentAdminFeedback')}}/",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'feedback': null,
                    'crid': searchResult.cr_id ,
                    'see': 1
                },
                success: function (response) {

                  alert('goruldu')

                },

                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
                searchResult.see = 1;
            }

        });
        $(document).on('click','#sendbox',function(){
             var feedback = $('#textarea1').val();
             var crid = $('#textarea1').attr('data-crid');

            $.ajax({
                url: "{{route('productCommentAdminFeedback')}}/",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'feedback': feedback,
                    'crid': crid
                },
                success: function (response) {
                    var AdminAnsver =  '<li class="chat-item odd list-style-none mt-3">' +
                        '<div class="chat-content text-right d-inline-block pl-3">' +
                        '<div class="box msg p-2 d-inline-block mb-1"> ' +response+'</div>' +
                        '<br></div></li>';

                    $('#commentBox').html('');

                    $('#chatcontent').append(AdminAnsver);

                    // You will get response from your PHP page (what you echo or print)
                },

                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    </script>
@endsection
