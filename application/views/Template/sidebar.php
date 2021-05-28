<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="<?php echo base_url()?>assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>" href="<?= site_url('Stunting'); ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo $this->uri->segment(2) == 'TenagaKesehatan' ? 'active': '' ?>" href="<?= site_url('Stunting/TenagaKesehatan'); ?>">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Data Tenaga Kesehatan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo $this->uri->segment(2) == 'dataAnak' ? 'active': '' ?>" href="<?= site_url('Stunting/dataAnak'); ?>">
                <i class="ni ni-pin-3 text-primary"></i>
                <span class="nav-link-text">Data Anak</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo $this->uri->segment(2) == 'Stunting' ? 'active': '' ?>" href="<?= site_url('Stunting/newcalcStunting'); ?>">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Stunting</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  