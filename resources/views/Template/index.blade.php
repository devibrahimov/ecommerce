<!DOCTYPE html>
<html lang="@if ( adjustment()->multilang == 1) {{LaravelLocalization::getCurrentLocale()}}  @endif
@if ( adjustment()->multilang == 0)  {{adjustment()->default_lang}}  @endif">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title> {{setting()->title}}  </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{setting()->favicon}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{setting()->favicon}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{setting()->favicon}}" />
    <meta name="description" content="@if(isset($meta_content)) {{$meta_content}} @else {{setting()->meta_content}} @endif">
    <meta name="keywords" content="@if(isset($meta_keywords)) {{$meta_keywords}} @else {{setting()->meta_keywords}} @endif">

    {!! setting()->any_meta_tags !!}
    <!-- LANGUAGE -->
    <link rel="stylesheet" href="/assets/general/flag/css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/css/header-footer.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {!! setting()->g_analytcs_script !!}
    @yield('css')
</head>

<body>
@include('Template.layouts.header')
  <main>
@yield('content')
   </main>
@include('Template.layouts.footer')

<div class="modal1">
    <!-- Modal content -->
    <div class="modal-content1">
        <span class="close1">x</span>
        <div class="leftModalImg">
            <img src="img/2.jpg">
        </div>
        <div class="rightModalText">
            <h3>4PCS HOOK + PICK SET -1PC</h3>
            <p><strong>28</strong> AZN</p>
            <p>Полностью металлическая рабочая часть для большей прочности и защиты от ржавчины</p>
            <p>Покрытие хромом противостоит коррозии</p>
            <p><b>Артикул:</b> 4932373387</p>
            <p>Полностью металлическая рабочая часть для большей прочности и защиты от ржавчины</p>
            <p>Покрытие хромом противостоит коррозии</p>
            <p><b>Артикул:</b> 4932373387</p>
            <p><b>Артикул:</b> 4932373387</p>
        </div>
    </div>
</div>

<div class="modal-compare">
    <span class="close2">x</span>
    <div class="compare_content">
        <table class="table ">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Наименование товара</th>
                <th scope="col">Цена за единицу</th>
                <th scope="col">Цена за единицу</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <img src="./img/c3.jpg" />
                </td>
                <td class="tdText">1/4” 50pc Drive Ratchet & Socket Set –Metric Imperial</td>
                <td>190AZN</td>
                <td>Распродано</td>
                <td scope="row">
                    <span><i class="fas fa-times"></i></span>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="./img/c3.jpg" />
                </td>
                <td class="tdText">1/4” 50pc Drive Ratchet & Socket Set –Metric Imperial</td>
                <td>190AZN</td>
                <td>Распродано</td>
                <td scope="row">
                    <span><i class="fas fa-times"></i></span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/assets/js/script.js"></script>
<script src="/assets/js/jquery.js"></script>


