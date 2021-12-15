@extends('Admin.index')

@section('css')
@endsection


@section('content')
<div class="container-fluid">
    <form action="{{route('sitesetting')}}" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-sm-12 col-md-4">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Logo</h4>
                  <h6 class="card-subtitle">Saytda Yuxarı hissədə və digər logo tələb edən yerlərdə bu logodan isdifadə ediləcək
                  </h6>

                      <div class="input-group mb-3">

                          <div class="custom-file">
                              <input type="file" class="custom-file-input" name="logo" id="inputGroupFile01">
                              <label class="custom-file-label" for="inputGroupFile01">Şəkil Seç</label>
                          </div>
                      </div>

              </div>
          </div>
      </div>
      <div class="col-sm-12 col-md-4">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Footer Logo</h4>
                  <h6 class="card-subtitle">To use add <code>.custom-file-input</code> class to the input
                  </h6>

                      <div class="input-group mb-3">

                          <div class="custom-file">
                              <input type="file" class="custom-file-input"  name="footer_logo">
                              <label class="custom-file-label" >Şəkil Seç</label>
                          </div>
                      </div>

              </div>
          </div>
      </div>
      <div class="col-sm-12 col-md-4">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Favicon  </h4>
                  <h6 class="card-subtitle">To use add <code>.custom-file-input</code> class to the input
                  </h6>

                      <div class="input-group mb-3">

                          <div class="custom-file">
                              <input type="file" class="custom-file-input" name="favicon">
                              <label class="custom-file-label" >Şəkil Seç</label>
                          </div>
                      </div>

              </div>
          </div>
      </div>
  </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Site ana url</label>
                                        <input type="text" class="form-control"  name="site_url">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Site Başlıq</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Meta açıqlama mətni</label>
                                        <textarea class="form-control  " name="meta_content"
                                                  maxlength="180" rows="4" ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meta açar kəlimələr</label>
                                        <textarea class="form-control  " name="meta_keywords"
                                                  maxlength="800" rows="4" ></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Əlavə meta taglar</label>
                                        <textarea class="form-control" name="any_meta_tags"
                                                  maxlength="800" rows="4" ></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Whatsapp script Kodu</label>
                                        <textarea class="form-control bg-dark text-cyan"  name="whatsapp_script"
                                                  rows="4" ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Google Analytics script Kodu</label>
                                        <textarea class="form-control bg-dark text-cyan" name="g_analytcs_script"
                                                  rows="4" ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Canlı Destek Kodu </label>
                                        <textarea class="form-control bg-dark text-cyan" name="chat_script"
                                                  rows="4" ></textarea>
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
