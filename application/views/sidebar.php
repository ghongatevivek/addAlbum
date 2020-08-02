<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>panel/index.html">
        <div class="sidebar-brand-icon">
          <!-- <img src="<?php echo base_url()?>panel/img/logo/logo2.png"> -->
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>
      <hr class="sidebar-divider my-0">
      
      <hr class="sidebar-divider">
      
      
      

      <li class="nav-item">
        <a class="nav-link " href="<?php echo base_url()?>panel/#" data-toggle="collapse" data-target="#album" aria-expanded="true"
          aria-controls="album">
          <i class="fas fa-fw fa-image folder"></i>
          <span>Album</span>
        </a>
        <div id="album" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Album</h6>
            <a class="collapse-item" href="<?php echo site_url()?>/welcome/addAlbum">Create Album</a>

            <a class="collapse-item" href="<?php echo site_url()?>/register/viewAlbum">View Album</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="<?php echo site_url()?>/register/editProfile/<?php echo $this->session->userdata("user_id"); ?>"  >
          <i class="fas fa fa-user text-gray-550"></i>
          <span>Edit Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="<?php echo site_url()?>/register/changedPassword"  >
          <i class="fas fa fa-key text-gray-550"></i>
          <span>Changed Password</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="<?php echo site_url()?>/welcome/logout"  >
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-550"></i>
          <span>Logout</span>
        </a>
      </li>

      
      
      <hr class="sidebar-divider">

    </ul>