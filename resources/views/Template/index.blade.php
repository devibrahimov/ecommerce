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
    <meta name="author" content="https://lumusoft.com">
    {!! setting()->any_meta_tags !!}
<!-- LANGUAGE -->
    <link rel="stylesheet" href="/general/flag/css/flag-icon.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="/assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="/assets/css/flaticon.css" rel="stylesheet">
    <link href="/assets/css/owl.css" rel="stylesheet">
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/assets/css/animate.css" rel="stylesheet">
    <link href="/assets/css/nice-select.css" rel="stylesheet">
    <link href="/assets/css/color.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/responsive.css" rel="stylesheet">
    {!! setting()->g_analytcs_script !!}
    @yield('css')
    <style>
        .flacgactive{
            border: 1px solid #32343a;
            padding: 0px 3px;
        }
        .langlist{
            line-height: 30px!important;
            background:none!important;
        }

        .langlistmobile{display: none;}
        @media only screen and (max-width: 399px) {
            .langlistmobile {
                display: block!important;
                line-height: 30px!important;
                background: none!important;
                position: absolute!important;
                right: 53px!important;
                top: 20px!important;
            }
            .langlistmobile .flacgactive{
                margin: 8px;
            }
        }

    </style>
</head>


<!-- page wrapper -->
<body>

<div class="boxed_wrapper red">



@include('Template.layouts.header')
{{--------------------------------------------------------------------}}
    @yield('content')



{{----------------------------------------}}
@include('Template.layouts.footer')
</div>

<!-- jequery plugins -->
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/owl.js"></script>
<script src="/assets/js/wow.js"></script>
<script src="/assets/js/validation.js"></script>
<script src="/assets/js/jquery.fancybox.js"></script>
<script src="/assets/js/appear.js"></script>
<script src="/assets/js/scrollbar.js"></script>
<script src="/assets/js/jquery.nice-select.min.js"></script>

<!-- main-js -->
<script src="/assets/js/script.js"></script>
<script>

    function getVal() {


    }

    $("#sendformmessage").on('click',function () {
        let  username  = document.querySelector('#username').value;
        let email  = document.querySelector('#email').value;
        let  phone  = document.querySelector('#phone').value;
        let  service  = document.querySelector('#service').value;
        let  message  = document.querySelector('#message').value;
        val = username + email +phone+service+message;
        console.log(val);

        whatsapp_se_btn_phone = '{{contact()->number}}'; //Telefon numaramız.
        whatsapp_se_btn_msg =`DIREKTKURSE.COM \n Ad :${username} \n Email: ${email} \n Xidmət növü :${service} \n Mesaj:${message}`;

        //Yazılmasını istediğimiz hazır mesaj.
        window.open("https://wa.me/"+whatsapp_se_btn_phone+"?text="+whatsapp_se_btn_msg)
    });

</script>

{!! setting()->chat_script !!}
</body><!-- End of .page_wrapper -->
</html>
