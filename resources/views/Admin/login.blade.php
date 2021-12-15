 <!--
/**
 * @Company: LUMUSOFT
 * @CompanyURI: https://lumusoft.com
 * @Description: Developed by LUMUSOFT Software team.
 * @Version: 1.0.0
 * @Date :    25.06.2021
 */
 -->

 <!DOCTYPE html>
 <html dir="ltr">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- Tell the browser to be responsive to screen width -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="https://lumusoft.com">
     <!-- Favicon icon -->
     <link rel="icon" type="image/png" sizes="16x16" href="{{setting()->favicon}}">
     <title> {{setting()->title}}</title>
     <!-- Custom CSS -->
     <link href="/admin/assets/css/style.min.css" rel="stylesheet">

 </head>

 <body>
 <div class="main-wrapper">
     <!-- ============================================================== -->
     <!-- Preloader - style you can find in spinners.css -->
     <!-- ============================================================== -->
     <div class="preloader">
         <div class="lds-ripple">
             <div class="lds-pos"></div>
             <div class="lds-pos"></div>
         </div>
     </div>
     <!-- ============================================================== -->
     <!-- Preloader - style you can find in spinners.css -->
     <!-- ============================================================== -->
     <!-- ============================================================== -->
     <!-- Login box.scss -->
     <!-- ============================================================== -->
     <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
          style="background:url(/admin/assets/images/big/auth-bg.jpg) no-repeat center center;">
         <div class="auth-box row">
             <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(/admin/assets/images/big/3.jpg);">
             </div>
             <div class="col-lg-5 col-md-7 bg-white">
                 <div class="p-3">
                     <div class="text-center">
                         <img src="{{setting()->logo}}" alt="wrapkit" width="150px">
                     </div>
                     <h2 class="mt-3 text-center">Admin Giriş</h2>
                     <p class="text-center">İdarə panelinə daxil olmaq üçün e-poçt adresinizi və şifrənizi daxil edin.</p>
                     @foreach ($errors->all() as $error)

                         <div>{{ $error }}</div>

                     @endforeach
                     <form action="{{route('login')}}" method="post"  class="mt-4">
                         <div class="row">
                             @csrf
                             <div class="col-lg-12">
                                 <div class="form-group">
                                     <label class="text-dark" for="uname">E-mail </label>
                                     <input class="form-control" required type="email" name="email" placeholder="email adresinizi yazın" >
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="form-group">
                                     <label class="text-dark" for="pwd">Şifrə</label>
                                     <input class="form-control" required type="password" name="password" placeholder="********">
                                 </div>
                             </div>
                             <div class="col-lg-12 text-center">
                                 <button type="submit" class="btn btn-block btn-dark">Giriş</button>
                             </div>
                             <div class="col-lg-12 text-center mt-2">
                                 Giriş bilgilərini xatırlamırsız? <a href="#" class="text-danger">Xidmət aldığınız firma ilə əlaqə saxlayın</a>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <!-- ============================================================== -->
     <!-- Login box.scss -->
     <!-- ============================================================== -->
 </div>
 <!-- ============================================================== -->
 <!-- All Required js -->
 <!-- ============================================================== -->
 <script src="/admin/assets/libs/jquery/dist/jquery.min.js "></script>
 <!-- Bootstrap tether Core JavaScript -->
 <script src="/admin/assets/libs/popper.js/dist/umd/popper.min.js "></script>
 <script src="/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
 <!-- ============================================================== -->
 <!-- This page plugin js -->
 <!-- ============================================================== -->
 <script>
     $(".preloader ").fadeOut();
 </script>
 </body>

 </html>
