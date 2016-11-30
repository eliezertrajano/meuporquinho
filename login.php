<?php
if (!isset($_SESSION)) {
    session_start();
}

session_destroy();
?><!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <meta name="google-signin-client_id" content="306249428147-inj8d8mgl2rhlgn1d6miprrdalhemq24.apps.googleusercontent.com">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App title -->
    <title>Meu porquinho - finanças pessoais</title>

    <!-- App CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>
    <body>

        <div class="text-center logo-alt-box">
            <a href="index.php" class="logo">Meu Porquinho</a>
            <h5 class="text-muted m-t-0">Um gerenciador financeiro rápido e fácil <br /> para ajudar na sua prosperidade financeira</h5>
        </div>

        <div class="wrapper-page">

        	<div class="m-t-30 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Acesse com uma das suas contas</h4>
                </div>
                <div class="wrapper-md">
                    <div class="g-signin2" data-onsuccess="onSignIn">  Google+</div>
                </div>
            </div>
        </div>
        <!-- end card-box -->
   </div>
   <!-- end wrapper page -->


<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>

      
      
         <script>
    var resizefunc = [];
       //in your callback page (can be the same page)
  
 function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
   $.post( "/validar.php", profile).done(function(response) {     
     if(parseInt(response.split("#")[0])!=0){
       $('body').append("<form action='/process/utils/validauser.php' id='validauser' method='POST' ><input type='hidden' name='token' value='"+response.split("#")[1]+"'></form>");
       $('#validauser').submit();        
     }else{
       if(response.split("#")[1]=="NA"){
         alert('Usuário, identificamos seu registro. Porém você ainda não foi autorizado. Aguarde Autorização');
         signOut();
       }
       if(response.split("#")[1]=="I"){
         alert('Parabéns, você foi registrado. Aguarde Autorização para acesso ao sistema');
         signOut();
       }
        
     }

   });


}
           
 function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }


    
</script>
</body>
</html>