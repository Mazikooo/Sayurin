<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url('assets/img/daun.png') ?>" type="image/ico" />
    <title>Sayurin Login</title>

  <!-- Bootstrap -->
<link href="<?php echo base_url('admin/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php echo base_url('admin/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
<!-- NProgress -->
<link href="<?php echo base_url('admin/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
<!-- Animate.css -->
<link href="<?php echo base_url('admin/vendors/animate.css/animate.min.css'); ?>" rel="stylesheet">

<!-- Custom Theme Style -->



<link href="<?php echo base_url('admin/build/css/custom.min.css'); ?>" rel="stylesheet">
</head>


  <body class="login" style="background-image: url('<?php echo base_url('assets/img/vege22.jpg'); ?>'); background-size: 100%;">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content" style="background-color: rgba(255, 255, 255, 0.8); border-radius: 10px; padding: 20px;" >
            <form action="<?php echo site_url('Loginadmin/masuk');?>" method="post">
              <h1 style="color: black;">Login Form</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
              <button type="submit" class="btn btn-default" style="color: black;">Log in</button>
              <div class="dropdown" style="display: inline-block;">
      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black;">
        Dashboard
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Admin</a>
        <a class="dropdown-item" href="#">Penjual</a>
        </div>
        </div>
    

              <?php if (!empty(validation_errors())): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo validation_errors(); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (isset($error)): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $error; ?>
                                        </div>
                                    <?php endif; ?>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link" style="color: black;">New to site?
                  <a href="#signup" class="to_register" style="color: black;"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                <a href="<?php echo site_url('main'); ?>">
    <img src="<?php echo base_url('assets/img/LOGO1-removebg (2).png'); ?>" alt="" style="width: 200px; height: auto;">
</a>
                  <h1 style="color: black;"></h1>
                  <p ></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    <!-- jQuery -->
<script src="<?php echo base_url('admin/vendors/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url('admin/build/js/custom.min.js'); ?>"></script>

  </body>
</html>
