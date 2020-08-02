<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add Image Page</title>
    <?php $this->load->view('head');?>
 
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php $this->load->view('sidebar');?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">2
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
                  <form method="post"  enctype="multipart/form-data" action="<?php echo site_url()?>/<?php echo $url; ?>">
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="font-weight-bold">Upload Photos</label>
                      <input type="file" multiple="" class="form-control" name="photos[]" id="exampleInputEmail1" aria-describedby="emailHelp">
                      
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
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

  <script src="<?php echo base_url()?>panel/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>panel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>panel/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url()?>panel/js/ruang-admin.min.js"></script>
  <script src="<?php echo base_url()?>panel/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url()?>panel/js/demo/chart-area-demo.js"></script>  
</body>

</html>