<?php 
  if(isset($this->form_validation)){
    $err=$this->form_validation->error_array();
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>New User Registration</title>
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
          <?php if($this->session->flashdata('msg')){ ?>
            <div class="alert alert-success">
              <strong><?php echo $this->session->flashdata('msg'); ?></strong>
            </div>
          <?php } ?>
          <div class="row justify-content-center">
              <div class="col-lg-6">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>
                  <form method="post" enctype="multipart/form-data" action="<?php echo site_url(); ?>/register/checkForm">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control" name="name" id="exampleInputFirstName" placeholder="Enter First Name">
                      <span class="text-danger"><?php if(isset($err['name'])){ echo $err['name'];} ?></span>
                    </div>
                    
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address...">
                      <span class="text-danger"><?php if(isset($err['email'])){ echo $err['email'];} ?></span>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="pass" class="form-control" id="exampleInputPassword" placeholder="Password">
                      <span class="text-danger"><?php if(isset($err['pass'])){ echo $err['pass'];} ?></span>
                    </div>

                    <div class="form-group">
                      <label>Profile Image</label>
                      <input type="file" name="image" class="form-control">
                      <!-- <span class="text-danger"><?php if(isset($err['image'])){ echo $err['image'];} ?></span> -->
                    </div>
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-success btn-block">Register</button>
                    </div>
                  
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="<?php echo site_url() ?>/welcome/login">Already have an account?</a>
                  </div>
                  <div class="text-center">
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