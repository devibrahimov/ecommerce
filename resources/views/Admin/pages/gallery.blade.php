@extends('Admin.index')

@section('css')
    <link href="/admin/assets/libs/dropzone-5.7.0/dist/min/dropzone.min.css" rel="stylesheet" />

@endsection


@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('gallery')}}" class="dropzone rounded-5" id="dropzoneForm"  method="post" enctype="multipart/form-data">
                    @csrf
                </form>

                <div align="center" class="mt-1 mb-2">
                    <button type="button" class="btn btn-outline-info  btn-block" id="submit-all">Yüklə</button>
                </div>
                <hr>
                <h3 class="panel-title">Yüklenen Resimler</h3>

                <div class="panel-body  " id="uploaded_image">

                </div>
            </div>
            </div>
    </div>
    </div>
</div>
</div>
@endsection


@section('js')
    <script src="/admin/assets/libs/dropzone-5.7.0/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.dropzoneForm = {
            autoProcessQueue : false,
            acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",
            parallelUploads:20,
            maxFiles: 20,
            dictDefaultMessage: "Yükləmək üçün faylları buraya buraxın",
            dictFallbackMessage: "Brauzeriniz drag'n'drop fayl yükləmələrini dəstəkləmir.",
            dictFallbackText: "Zəhmət olmasa, köhnə günlərdəki kimi fayllarınızı yükləmək üçün aşağıdakı geri formasını istifadə edin",
            dictFileTooBig: "Fayl çox böyükdür.  ",
            dictInvalidFileType: "Bu tip faylları yükləyə bilməzsiniz.",
            dictCancelUpload: "Yüklənməni ləğv edin",
            dictUploadCanceled: "Yükləmə ləğv edildi.",
            dictCancelUploadConfirmation: "Bu yükləməni ləğv etmək istədiyinizə əminsiniz?",
            dictRemoveFile: "Faylı silin",
            dictRemoveFileConfirmation: null,
            dictMaxFilesExceeded: "Başqa bir fayl yükləyə bilməzsiniz.",

            init:function(){
                var submitButton = document.querySelector("#submit-all");
                myDropzone = this;
                submitButton.addEventListener('click', function(){
                    myDropzone.processQueue();
                });

                var x = document.getElementById("successCallback");
                var y = document.getElementById("dangerCallback");

                this.on("complete", function(file)
                {
                    if (x.style.display === "none") {
                        x.style.display = "block";
                        y.style.display = "none";
                    } else {
                        x.style.display = "none";
                        y.style.display = "block";
                    }
                });

                this.on("error",function (file){
                    if (y.style.display === "none") {
                        y.style.display = "block";
                        x.style.display = "none";
                    } else {
                        y.style.display = "none";
                        x.style.display = "block";
                    }
                });

                this.on("complete", function(){
                    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                    {
                        var _this = this;
                        _this.removeAllFiles();
                    }
                    load_images();
                });
            }
        };


        load_images();

        // load images
        function load_images()
        {
            $.ajax({
                url:"{{ route('gallery.fetch') }}",
                success:function(data)
                {

                    $('#uploaded_image').html(data);
                }
            })
        }

        // remove
        $(document).on('click', '.remove_image', function(){
            var id = $(this).data('id');
            $.ajax({
                url:"{{ route('gallery.delete') }}",
                data:{
                    id : id
                },
                success:function(data){
                    load_images();
                }
            })
        });
    </script>

@endsection
