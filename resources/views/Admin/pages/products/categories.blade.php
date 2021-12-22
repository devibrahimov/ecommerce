@extends('Admin.index')

@section('css')
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Yeni Kateqoriya Əlavə Et</h3>
                    </div>
                   <div class="card-body">
                       <form class="pl-3 pr-3" action="{{route('product_categories',$id)}}" method="post" enctype="multipart/form-data">
                           <div class="row">

                               <div class="input-group mb-3 col-12">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text">Yükləmə</span>
                                   </div>
                                   <div class="custom-file">
                                       <input type="file" class="custom-file-input" required name="image" id="inputGroupFile01">
                                       <label class="custom-file-label" for="inputGroupFile01">Şəkil seçin</label>
                                   </div>
                               </div>



                           </div>
                           @csrf
                           @foreach(languages() as $lang)
                               <div class="form-group">
                                   <label>Kategoriya adı ( {{$lang->name}} )</label>
                                   <input class="form-control" type="text" required  name="name_{{$lang->code}}" >
                               </div>
                           @endforeach
                           <div class="form-group text-center">
                               <button class="btn btn-primary" type="submit">Əlavə et</button>
                           </div>
                       </form>
                   </div>
                </div>
            </div>
            <div class="col-md-7">

                <div class="card">
                    <div class="card-header">
                        <h3> Kateqoriyalar </h3>
                    </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-striped">
                              <thead>
                              <tr>
                                  <th scope="col">Başlıq</th>
                                  <th scope="col">Şəkil</th>
                                  <th scope="col">Əməliyyatlar</th>
                              </tr>
                              </thead>
                              <tbody>
                              @if(isset($items))
                                  @foreach($items as $item)
                                      <tr>
                                          <td>
                                              {{isset(getproductcategorycontent($item->id,defaultLang())->name)? getproductcategorycontent($item->id,defaultLang())->name: ''}}
                                          </td>
                                          <td>
                                              {{isset(getproductcategorycontent($item->id,defaultLang())->name)? getproductcategorycontent($item->id,defaultLang())->name: ''}}
                                          </td>
                                          <td>
                                              <button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#edit-modal{{$item->id}}" >
                                                  <i class="fa fa-pencil-alt"></i>
                                              </button>
                                              <a href="{{route('product_categories',$item->id)}}" class="btn btn-secondary " >
                                                  <i class="fa fa-list-alt"> </i> Alt Kategoriyalar
                                              </a>
                                              <button type="button" onclick="document.getElementById('deleteproductcat{{$item->id}}').submit()" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>
                                              </button>
                                              <form id="deleteproductcat{{$item->id}}"
                                                    action="{{route('productcatdelete',$item->id)}}" method="post">
                                                  @csrf
                                                  @method('DELETE')
                                              </form>
                                          </td>
                                      </tr>


                                      <!-- Signup modal content -->
                                      <div id="edit-modal{{$item->id}}" class="modal fade" tabindex="-1" role="dialog"
                                           aria-hidden="true">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-body">
                                                      <form class="pl-3 pr -3" action="{{route('product_category_update',$item->id)}}" method="post" enctype="multipart/form-data">

                                                          <div class="input-group mb-3 col-12">
                                                              <div class="input-group-prepend">
                                                                  <span class="input-group-text">Yükləmə</span>
                                                              </div>
                                                              <div class="custom-file">
                                                                  <input type="file" class="custom-file-input" required name="image" id="inputGroupFile01">
                                                                  <label class="custom-file-label" for="inputGroupFile01">Şəkil seçin</label>
                                                              </div>
                                                          </div>

                                                          <div class="form-group mb-3 col-12">
                                                              <label for="categories">Kategoriya</label>

                                                              <select name="parent"   id="categories" class="custom-select mr-sm-2">
                                                                  <option value="{{null}}">Ana Kateqoriya</option>
                                                                  @foreach(allProductCategories() as $parentcat)
                                                                      <option {{$parentcat->id ==$item->parent_id ? 'selected': ''}} value="{{$parentcat->id}}"> {{$parentcat->name}}</option>
                                                                  @endforeach
                                                              </select>
                                                          </div>
                                                          @csrf
                                                          @foreach(languages() as $lang)
                                                              <div class="form-group">
                                                                  <label>Başlıq ({{$lang->name}})</label>
                                                                  <input class="form-control" type="text" name="name_{{$lang->code}}"
                                                                         value="   {{isset(getproductcategorycontent($item->id,$lang->code)->name)? getproductcategorycontent($item->id,$lang->code)->name: ''}}">
                                                              </div>
                                                          @endforeach
                                                          <div class="form-group text-center">
                                                              <button class="btn btn-primary" name="catupdate{{$item->id}}" type="submit">Redaktə et</button>
                                                          </div>
                                                      </form>
                                                  </div>
                                              </div><!-- /.modal-content -->
                                          </div><!-- /.modal-dialog -->
                                      </div><!-- /.modal -->

                                  @endforeach
                              @endif

                              </tbody>
                          </table>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('js')
@endsection
