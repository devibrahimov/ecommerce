@extends('Admin.index')

@section('css')
    <style>
        .card img{
            height: 260px;
            object-fit: contain;
            object-position: center;
        }
        .card-footer{
            padding: 0px!important;
        }
        .card-body {
            flex: 1 1 auto;
            padding: 6px;
        }
        .card-footer a{
            padding: 0.375rem 0.75rem;
        }
        .card{
            border: darkgray;
        }

        .image-files input {
            display:none;
        }

    </style>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Məhsul Məlumatlarını Redaktə Edin</h4>
                    </div>
                    <div class="card-body">
                         <div class="row">
                        <div class="form-group col-12">
                            <div class="row image-files">
                                @foreach($product->images as $key => $image)
                                    @if($image->cover == 1)
                                        <div class=" col-2 m-3 ">
                                            <div class="card" >
                                                <img id="file-ip-1-preview" src="{{$image->imagepath}}" class="card-img-top" alt="...">

                                                <div class="card-body">
                                                    <p class="card-text" >Əsas Şəkil.</p>
                                                </div>
                                                <div class="card-footer d-flex justify-content-around">

                                                    <label href="#" class="btn btn-block btn-primary">
                                                        <input type="file" id="file-ip-1" accept="image/*"  data-imageid="{{$image->image_id}}"  name="image[]" onchange="showPreview(event);">
                                                        <i class="fas fa-image"></i> Dəyişdir</label>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-2 m-3">
                                            <div class="card">
                                                <img id="file-ip-{{$key+1}}-preview" src="{{$image->imagepath}}" class="card-img-top">
                                                <div class="card-body">
                                                    <p class="card-text">  Şəkil  № {{$key+1}}</p>
                                                </div>
                                                <div class="card-footer justify-content-around">
                                                    <label href="#" style="padding: 0.250rem 2.75rem;" class="btn btn-primary">
                                                        <input type="file" id="file-ip-{{$key+1}}" data-imageid="{{$image->image_id}}"  accept="image/*" name="image[]" onchange="showPreview{{$key+1}}(event);">
                                                        <i class="fas fa-image"></i> Dəyişdir</label>
                                                    <button type="button" onclick="showPreview{{$key+1}}remove({{$image->image_id}})"   style="padding: 0.250rem 0.5rem;" class="btn btn-danger"> <i class="fas fa-trash"></i> sil</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                @if(count($product->images) < 5)
                                    @php
                                        $imagecount = 5 - count($product->images);
                                        $i = 5 - $imagecount+1 ;
                                    @endphp
                                    @while($i <=  5 )

                                        <div class=" col-2 m-3 ">
                                            <div class="card">
                                                <img id="file-ip-{{$i}}-preview" src="/admin/assets/images/big/mehsulsehkili-preview.jpg" class="card-img-top" alt="...">

                                                <div class="card-body">
                                                    <p class="card-text">Şəkil. № {{$i}}  </p>
                                                </div>
                                                <div class="card-footer justify-content-around">
                                                    <label href="#" style="padding: 0.250rem 2.75rem;" class="btn btn-primary" id="imagechangebutton{{$i}}">
                                                        <input type="file" id="file-ip-{{$i}}"  accept="image/*" name="image[]" data-imageid="{{null}}" onchange="showPreview{{$i}}(event);">
                                                        <i class="fas fa-image"></i> elave et</label>
                                                        <button type="button" onclick="showPreview{{$i}}remove()"    style="padding: 0.250rem 0.85rem;" class="btn btn-danger"> <i class="fas fa-trash"></i> sil</a>
                                                </div>
                                            </div>
                                        </div>
                                        @php $i++ ; @endphp
                                    @endwhile
                                @endif
                            </div>
                        </div>
                         </div>
                        <form action="{{route('productupdate',$product->id)}}" method="post"   enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="form-group col-12">
                                    <div class="row">
                                        <div class="form-group col-3">
                                            <label for="categories">Kategoriya</label>
                                            <select name="category" required id="categories" class="custom-select mr-sm-2">
                                                @foreach($categories as $cat)
                                                    <option {{$cat->id==$product->category_id? 'selected':''}}  value="{{$cat->id}}"> {{isset(getproductcategorycontent($cat->id,defaultLang())->name)? getproductcategorycontent($cat->id,defaultLang())->name: ''}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{--                                <div class="form-group col-2">--}}
                                        {{--                                    <label for="">Qiymət </label>--}}
                                        {{--                                    <input type="number" class="form-control"  name="price"  >--}}
                                        {{--                                </div>--}}
                                        {{--                                <div class="form-group col-2">--}}
                                        {{--                                    <label for="">Endirimli Qiymət </label>--}}
                                        {{--                                    <input type="number" class="form-control"  name="price"  >--}}
                                        {{--                                </div>--}}
                                                                        <div class="form-group col-2">
                                                                            <label for="">Stok sayısı </label>
                                                                            <input type="number" class="form-control"  name="stock"  value="{{$product->stock}}" >
                                                                        </div>
                                        {{--                                <div class="form-group col-3">--}}
                                        {{--                                    <label for="">SKU </label>--}}
                                        {{--                                    <input type="number" class="form-control"  name="price"  >--}}
                                        {{--                                </div>--}}
                                    </div>
                                    {{--                            <div class="row">--}}
                                    {{--                                <div class="form-group col-6">--}}
                                    {{--                                    <label for="">Rənglər </label>--}}
                                    {{--                                    <input type="number" class="form-control"  name="price"  >--}}
                                    {{--                                </div>--}}
                                    {{--                                <div class="form-group col-6">--}}
                                    {{--                                    <label for="">Ölçülər </label>--}}
                                    {{--                                    <input type="number" class="form-control"  name="price"  >--}}
                                    {{--                                </div>--}}

                                    {{--                            </div>--}}
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                    @foreach(languages() as $lang)
                                        <li class="nav-item">
                                            <a href="#{{$lang->code}}" data-toggle="tab" aria-expanded="@if($loop->first) true @else false @endif "
                                               class="nav-link @if($loop->first)   active @endif ">
                                                <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                                <span class="d-none d-lg-block">{{$lang->name}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @foreach(languages() as $lang)
                                        <div class="tab-pane @if($loop->first) show active @endif " id="{{$lang->code}}">
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label for="">Başlıq ({{$lang->name}})</label>
                                                    <input type="text" class="form-control"  name="name_{{$lang->code}}"
                                                           value="{{isset(getproductcontent($product->id,$lang->code)->name)?getproductcontent($product->id,$lang->code)->name:null}}">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="">Meta Açıqlama ({{$lang->name}})</label>
                                                    <input type="text" class="form-control" maxlength="160" name="metacontent_{{$lang->code}}"
                                                           value="{{isset(getproductcontent($product->id,$lang->code)->meta_content)?getproductcontent($product->id,$lang->code)->meta_content:null}}">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="">Meta Açar Kəlimələr ({{$lang->name}})</label>
                                                    <input type="text" class="form-control" maxlength="800" name="metakeywords_{{$lang->code}}"
                                                           value="{{isset(getproductcontent($product->id,$lang->code)->meta_keywords)?getproductcontent($product->id,$lang->code)->meta_keywords:null}}">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="">Açıqlama ({{$lang->name}}) </label>
                                                    <textarea type="text"   class="form-control mycontent"
                                                              name="content_{{$lang->code}}" >{!!isset(getproductcontent($product->id,$lang->code)->content)?getproductcontent($product->id,$lang->code)->content:null!!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="submit" class="btn btn-success">Yadda Saxla</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="/admin/assets/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '.mycontent',
            height:250,
            plugins: 'media',
        });

        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
                    console.log(event)
                var image_id = event.target.dataset.imageid;
                var product_id = {{$product->id}};

                data = new FormData();
                data.append('file',event.target.files[0]);
                // $( "#file-ip-5")[0].files[0]
                data.append('image_id', image_id );
                data.append('product_id', product_id );
                data.append('_token', "@php echo csrf_token() @endphp" );
                $.ajax({
                    url:  "@php echo route('productimageupload')@endphp",
                    type: "POST",
                    data: data,
                    enctype: 'multipart/form-data',
                    processData: false,//tell jQuery not to process the data
                    contentType: false,//tell jQuery not to set contentType
                    success:function(a){
                        console.log(a);
                    }
                });
                location.reload();

            }
        }

        function showPreview2(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-2-preview");
                preview.src = src;
                preview.style.display = "block";

                var image_id = event.target.dataset.imageid;
                var product_id = {{$product->id}};

                data = new FormData();
                data.append('file',event.target.files[0]);
                data.append('image_id', image_id );
                data.append('product_id', product_id );
                data.append('_token', "@php echo csrf_token() @endphp" );
                $.ajax({
                    url:  "@php echo route('productimageupload')@endphp",
                    type: "POST",
                    data: data,
                    enctype: 'multipart/form-data',
                    processData: false,//tell jQuery not to process the data
                    contentType: false,//tell jQuery not to set contentType
                    success:function(a){
                        location.reload();
                    }
                });


            }
        }
        function showPreview2remove(image_id = null){
            var src = '/admin/assets/images/big/mehsulsehkili-preview.jpg' ;
            var preview = document.getElementById("file-ip-2-preview");
            preview.src = src;
            preview.style.display = "block";

            if (image_id !=null){
                $.ajax({
                    url:  "@php echo route('productimagedelete')@endphp",
                    type: "POST",
                    data: {
                        'image_id':image_id ,
                        '_token':"@php echo csrf_token() @endphp"
                    },
                    success:function(data){
                        location.reload();
                    }
                });
            }
        }

        function showPreview3(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-3-preview");
                preview.src = src;
                preview.style.display = "block";

                var image_id = event.target.dataset.imageid;
                var product_id = {{$product->id}};

                data = new FormData();
                data.append('file',event.target.files[0]);
                // $( "#file-ip-5")[0].files[0]
                data.append('image_id', image_id );
                data.append('product_id', product_id );
                data.append('_token', "@php echo csrf_token() @endphp" );
                $.ajax({
                    url:  "@php echo route('productimageupload')@endphp",
                    type: "POST",
                    data: data,
                    enctype: 'multipart/form-data',
                    processData: false,//tell jQuery not to process the data
                    contentType: false,//tell jQuery not to set contentType
                    success:function(a){
                        location.reload();
                    }
                });
                console.log(data);
            }
        }

        function showPreview3remove(image_id = null){
            var src = '/admin/assets/images/big/mehsulsehkili-preview.jpg' ;
            var preview = document.getElementById("file-ip-3-preview");
            preview.src = src;
            preview.style.display = "block";

            if (image_id !=null){
                $.ajax({
                    url:  "@php echo route('productimagedelete')@endphp",
                    type: "POST",
                    data: {
                        'image_id':image_id ,
                        '_token':"@php echo csrf_token() @endphp"
                    },
                    success:function(data){
                        location.reload();
                    }
                });
            }
        }

        function showPreview4(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-4-preview");
                preview.src = src;
                preview.style.display = "block";

                var image_id = event.target.dataset.imageid;
                var product_id = {{$product->id}};

                data = new FormData();
                data.append('file',event.target.files[0]);
                // $( "#file-ip-5")[0].files[0]
                data.append('image_id', image_id );
                data.append('product_id', product_id );
                data.append('_token', "@php echo csrf_token() @endphp" );

                $.ajax({
                    url:  "@php echo route('productimageupload')@endphp",
                    type: "POST",
                    data: data,
                    enctype: 'multipart/form-data',
                    processData: false,//tell jQuery not to process the data
                    contentType: false,//tell jQuery not to set contentType
                    success:function(a){
                        location.reload();
                    }
                });
                console.log(data);
            }
        }
        function showPreview4remove(image_id = null){
            var src = '/admin/assets/images/big/mehsulsehkili-preview.jpg' ;
            var preview = document.getElementById("file-ip-4-preview");
            preview.src = src;
            preview.style.display = "block";


            if (image_id !=null){
                $.ajax({
                    url:  "@php echo route('productimagedelete')@endphp",
                    type: "POST",
                    data: {
                        'image_id':image_id ,
                        '_token':"@php echo csrf_token() @endphp"
                    },
                    success:function(data){
                        location.reload();
                    }
                });
            }
        }

        function showPreview5(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-5-preview");
                preview.src = src;
                preview.style.display = "block";

                var image_id = event.target.dataset.imageid;
                var product_id = {{$product->id}};

                data = new FormData();
                data.append('file',event.target.files[0]);
                // $( "#file-ip-5")[0].files[0]
                data.append('image_id', image_id );
                data.append('product_id', product_id );
                data.append('_token', "@php echo csrf_token() @endphp" );
                $.ajax({
                    url:  "@php echo route('productimageupload')@endphp",
                    type: "POST",
                    data: data,
                    enctype: 'multipart/form-data',
                    processData: false,//tell jQuery not to process the data
                    contentType: false,//tell jQuery not to set contentType
                    success:function(a){
                        location.reload();
                    }
                });
                console.log(data);
            }
        }
        function showPreview5remove(image_id = null){
            var src = '/admin/assets/images/big/mehsulsehkili-preview.jpg' ;
            var preview = document.getElementById("file-ip-5-preview");
            preview.src = src;
            preview.style.display = "block";

            if (image_id !=null){
                $.ajax({
                    url:  "@php echo route('productimagedelete')@endphp",
                    type: "POST",
                    data: {
                        'image_id':image_id ,
                        '_token':"@php echo csrf_token() @endphp"
                    },
                    success:function(data){
                        location.reload();
                    }
                });
            }
        }




    </script>



@endsection
