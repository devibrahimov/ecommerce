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
                            <th scope="col">Dil</th>
                            <th scope="col">Fayl</th>
                            <th scope="col">Digər</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($files as $file)
                        <tr>
                            <td>{{$language}}</td>
                            <td>{{str_replace('.php','',$file)}}</td>
                            <td>   <button type="button" class="btn btn-primary  editlangfile"
                                           data-toggle="modal" data-target="#full-width-modal"
                                   data-lang="{{$language}}" data-file="{{str_replace('.php','',$file)}}"> Redaktə Et</button>
                            </td>
                        </tr>
                       @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Full width modal content -->
<div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <form action="{{route('editlangfile')}}" method="post">
                @csrf

                 <div class="modal-header">
                    <h4 class="modal-title" id="fullWidthModalLabel">Dil Tənzimləmələri</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×</button>
                </div>
                <input type="hidden" name="file">
                <input type="hidden" name="lang" value="{{$language}}">
                <div class="modal-body">
                    <h6>Tərcümə</h6>
                    <p>Saytda görülen yazıların seçilmiş olan dillərə görə tərcümə edilməsi </p>
                    <hr>

                     <div id="filecontent"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                            data-dismiss="modal">vazkeç</button>
                    <button type="submit"   class="btn btn-primary ">Yadda saxla</button>
                </div>
           </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection


@section('js')
    <script>
        $('.editlangfile').on('click',function(){
            let lang = $(this).data('lang');
            let file = $(this).data('file');
            $.ajax({
                url:"{{route('getlangfile')}}",
                method:"post",
                data :{
                    "_token":"{{csrf_token()}}",
                     "lang":lang ,
                     "file":file
                },
                success:function (data){
                    $('#filecontent').html(null);
                    $.each(data,function (index,value) {
                        $html ='<div class="row"><div class="col-3"> <div class="form-group">'+
                            '<input type="text" class="form-control " name="key[]" value="'+index+'" >'+
                            '</div></div><div class="col-9"><div class="form-group">'+
                            '<input type="text" class="form-control" name="value[]" value="'+value+'" >'+
                            '</div>  </div> </div>';
                        $('#filecontent').append($html);
                    });

                $('input[name="file"]').val(file);

                }

            })
        });


    </script>
@endsection
