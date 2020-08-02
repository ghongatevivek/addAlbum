<?php
  if(isset($this->form_validation)){
    $err=$this->form_validation->error_array();
}
  if(isset($old_pass)){
    $err['opass'] = $old_pass;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Changed Password Page</title>
    <?php $this->load->view('head');?>
 
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
            <?php if($this->session->flashdata("msg")){ ?>
            <div class="alert alert-success">
              <strong>Success !!</strong><?php echo $this->session->flashdata("msg"); ?>
            </div>
          <?php } ?>
            <div class="col-md-6">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
                </div>
                <div class="card-body">
                  <form method="post" action="<?php echo site_url($url); ?>">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Old Password</label>
                      <input type="Password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="opass"
                        >
                      <span class="text-danger"><?php echo isset($err['opass'])?$err['opass']:""; ?></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">New Password</label>
                      <input type="Password" class="form-control" name="npass" id="exampleInputPassword1" >
                      <span class="text-danger"><?php echo isset($err['npass'])?$err['npass']:""; ?></span>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Re-Enter New Password</label>
                      <input type="Password" class="form-control" name="rnpass" id="exampleInputPassword1" >
                      <span class="text-danger"><?php echo isset($err['rnpass'])?$err['rnpass']:""; ?></span>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div> 
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
     <?php $this->load->view('script');?>

  
</body>

</html>