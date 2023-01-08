<!DOCTYPE html>
<html>
<head>
    <title>TS - Assessment</title>
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <link href="<?php echo base_url('asset/loginbootstrap/css/bootstrap-responsive.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/loginbootstrap/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/loginbootstrap/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/loginbootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/loginbootstrap/js/bootstrap.js') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/loginbootstrap/js/bootstrap.min.js') ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic|Material+Icons">

    <style type="text/css">
    .login_main-content{width: 50%;border-radius: 20px;box-shadow: 0 5px 5px rgba(0,0,0,.4);margin: 5em auto;display: flex;}.company__info{background-color: #008080;border-top-left-radius: 20px;border-bottom-left-radius: 20px;display: flex;flex-direction: column;justify-content: center;color: #fff;}.fa-android{font-size:3em;}
    @media screen and (max-width: 640px) {.login_main-content{width: 90%;}.company__info{display: none;}.login_form{border-top-left-radius:20px;border-bottom-left-radius:20px;}}
    @media screen and (min-width: 642px) and (max-width:800px){.login_main-content{width: 70%;}}.login_row > h2{color:#008080;}.login_form{background-color: #fff;border-top-right-radius:20px;border-bottom-right-radius:20px;border-top:1px solid #ccc;border-right:1px solid #ccc;}form{padding: 0 2em;}.form__input{width: 100%;border:0px solid transparent;border-radius: 0;border-bottom: 1px solid #aaa;padding: 1em .5em .5em;padding-left: 2em;outline:none;margin:1.5em auto;transition: all .5s ease;}.form__input:focus{border-bottom-color: #008080;box-shadow: 0 0 5px rgba(0,80,80,.4);border-radius: 4px;}.login_btn{transition: all .5s ease;width: 70%;border-radius: 30px;color:#008080;font-weight: 600;background-color: #fff;border: 1px solid #008080;margin-top: 1.5em;margin-bottom: 1em;}.login_btn:hover, .login_btn:focus{background-color: #008080;color:#fff;}</style>
  
</head>
<body class="skin-blue-light sidebar-mini">
    <?php
        // var_dump($this->session->flashdata('notif'));

         if($this->session->flashdata('notif') == 'error')
         {
          ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
       

          <?php echo $this->session->flashdata('message'); ?>

          </div>
          <?php
         }
         ?>
<div class="container">
        <div class="container-fluid">
            <div class="login_row login_main-content bg-success text-center">
                <div class="col-md-4 text-center company__info">
                    <span class="company__logo"><h2><img src="<?php echo base_url('images/login_logo.jpg') ?>"></h2></span>
                    <h4 class="company_title"></h4>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                    <div class="container-fluid">
                        <div class="login_row">
                            <h2>Login</h2>
                        </div>
                        <div class="login_row">
                            <form method="POST" action="<?php echo base_url('welcome/login_auth') ?>">
                              
                                <div class="login_row">
                                    <input type="text" id="username" class="form-control " placeholder="Username" name="username" required autocomplete="username" autofocus>
                                      
                                            <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                      
                                </div>
                                <div class="login_row">
                                    <!-- <span class="fa fa-lock"></span> -->
                                    <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password" placeholder="Password">
                                   
                                            <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                     
                                </div>
                                <div class="login_row">
                                    <input type="submit" name="submit" value="Submit" class="login_btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
</div>

</body>
</html>