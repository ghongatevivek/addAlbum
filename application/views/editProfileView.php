<?php
  if(isset($this->form_validation)){
    $err=$this->form_validation->error_array();

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit Profile Page</title>
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
                      <label for="exampleInputEmail1">User Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name"
                        value="<?php if(isset($err)){ echo $this->input->post("name");}elseif(isset($editData)){ echo $editData[0]->name;} ?>">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="text" class="form-control" name="email" id="exampleInputPassword1" value="<?php if(isset($err)){ echo $this->input->post("email");}elseif(isset($editData)){ echo $editData[0]->email;} ?>">
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