<?php 
  if(isset($this->form_validation)){
    $err=$this->form_validation->error_array();
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Form Page</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url()?>panel/img/logo/logo.png" rel="icon">
  
  <link href="<?php echo base_url()?>panel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>panel/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>panel/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php $this->load->view('sidebar');?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php $this->load->view('navbar');?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          
          <div class="row mb-3 ">
            <div class="col-lg-6">
              <?php if($this->session->flashdata('msg')){ ?>
                    <div class="alert alert-success">
                      <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                    </div>
                  <?php } ?>
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  
                  <h6 class="m-0 font-weight-bold text-primary">Simple Form</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="<?php echo site_url() ?>/<?php echo $url; ?>">
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="font-weight-bold">Enter Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if(isset($edit_data)){ echo $edit_data[0]->name; }?>">
                        <span class="text-danger"><?php if(isset($err['name'])){ echo $err['name']; } ?></span>
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1" class="font-weight-bold">Email Id</label>
                      <input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email Id" value="<?php if(isset($edit_data)){ echo $edit_data[0]->email; }?>">
                      <span class="text-danger"><?php if(isset($err['email'])){ echo $err['email']; } ?></span>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-success">Submit</button>
                  </form>
                </div>
              </div>

              <!-- Form Sizing -->
              
            </div>
            
          </div>
          <!--Row-->

          

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
     <?php $this->load->view('footer');?>
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