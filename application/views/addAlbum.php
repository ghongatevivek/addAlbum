<?php
  if(isset($this->form_validation)){
    $err=$this->form_validation->error_array();

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add Album Page</title>
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
            <div class="row justify-content-center">
            	<div class="col-md-6">
            		<?php if($this->session->flashdata('msg')){?>
                		<div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
                	<?php }?>
            		<div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                	
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $title;?></h6>
                </div>
                <div class="card-body">
                  <form method="post" action="<?php echo site_url()?>/<?php echo $url; ?>">
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="font-weight-bold">Album Name</label>
                      <input type="text" class="form-control" name="aname" id="exampleInputEmail1" aria-describedby="emailHelp"
                       value="<?php if(isset($edit_data)){ echo $edit_data[0]->aname ; } ?>" 
                        placeholder="Enter Album Name">
                      <span class="text-danger"><?php if(isset($err['aname'])){ echo $err['aname']; }?></span>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
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