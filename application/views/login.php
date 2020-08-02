<?php 
  if(isset($this->form_validation)){
    $err=$this->form_validation->error_array();
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
 <?php $this->load->view('head'); ?>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <!-- <?php #$this->load->view('sidebar');?> -->
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      
      <div id="content">
        <!-- TopBar -->
        <!-- <?php #$this->load->view('navbar');?> -->
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
           <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <?php if($this->session->flashdata('msg')){ ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('msg') ?></div>
                    <?php } ?>

                    <?php if($this->session->flashdata('msg2')){ ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('msg2') ?></div>
                    <?php } ?>
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form  method="post" action="<?php echo site_url(); ?>/register/login">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="email" 
                        placeholder="Enter Email Address..." value="<?php if(isset($loginData)){ echo $loginData[0]->email; } ?>">
                        <span class="text-danger"><?php if(isset($err['email'])){ echo $err['email']; } ?></span>
                    </div>
                    <div class="form-group">
                      <input type="password" name="pass" class="form-control" id="exampleInputPassword" placeholder="Password">
                        <span class="text-danger"><?php if(isset($err['pass'])){ echo $err['pass']; } ?></span>
                    </div>
                    
                    <div class="form-group">
                      <input type="submit"  class="btn btn-primary btn-block" value="Login" name="btn">
                    </div>
                    
                   
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="<?php echo site_url() ?>/welcome/">Create an Account!</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
     <!-- <?php $this->load->view('footer');?> -->
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="<?php echo base_url()?>panel/#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="<?php echo base_url()?>panel/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>panel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>panel/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url()?>panel/js/ruang-admin.min.js"></script>
  <script src="<?php echo base_url()?>panel/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url()?>panel/js/demo/chart-area-demo.js"></script>  
</body>

</html>