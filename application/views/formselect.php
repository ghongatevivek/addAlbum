<!DOCTYPE html>
<html lang="en">

<head>
  <title>Select Page</title>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url()?>panel/img/logo/logo.png" rel="icon">
  <link href="<?php echo base_url()?>panel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>panel/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>panel/css/ruang-admin.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>panel/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                <?php if($this->session->flashdata('msg')){ ?>
                    <div class="alert alert-dark">
                      <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                    </div>
                  <?php } ?>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                </div>

                <div class="table-responsive p-3">
                 <table class="table table-bordered">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                    <?php $i=1; foreach ($select as $key => $value) {?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td>
                          <a href="<?php echo site_url() ?>/form/deleteData/<?php echo $value->f_id; ?>" class="btn btn-danger">Delete</a>
                          <a href="<?php echo site_url() ?>/form/editData/<?php echo $value->f_id; ?>" class="btn btn-success">Edit</a>
                         
                        </td>
                      </tr>
                    <?php } ?>
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

  <script src="<?php echo base_url()?>panel/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>panel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>panel/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url()?>panel/js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?php echo base_url()?>panel/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url()?>panel/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>