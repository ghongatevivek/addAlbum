<!DOCTYPE html>
<html lang="en">

<head>
  <title>View Photos</title>
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
           <div class="col-lg-12">
            
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Photos</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Photos</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <!-- loop  -->
                      <?php $i=1; foreach ($select as $key => $value) { ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                              <img height="150px" src="<?php echo base_url() ?>/image/<?php echo $value->image; ?>">
                            </td>
                            <td>
                              <a href="" class="btn btn-danger">Delete Image</a>
                            </td>
                          </tr>
                      <?php } ?>
                    </tbody>
                  </table>
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
  <?php $this->load->view('script') ?>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>