<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Setting Variable Fuzzy C-Means</h3>
                <div class="col text-right">
                  
                </div>
            </div>
            <!-- Light table -->

            <div class="col-md-12 ">  
              <form class="ml-5 mr-5 pb-3 pt-5" method="post" action="EditSetting">
                  <div class="form-group">
					<h5>Jumlah Cluster</h5>
                    <input class="form-control" type="text" value="<?php if(!empty($data)){echo $data[0]->jmlCluster;} ?>" name="jmlCluster" placeholder="Jumlah Cluster">
                  </div>
                  <div class="form-group">
				  <h5>Pangkat</h5>
                    <input class="form-control" value="<?php if(!empty($data)){echo $data[0]->pangkat;} ?>" type="text" name="pangkat" placeholder="Pangkat">
                  </div>
                  <div class="form-group">
				  <h5>Maksimal Iterasi</h5>
                    <input class="form-control" value="<?php if(!empty($data)){echo $data[0]->maxIterasi;} ?>" type="text" name="maxIterasi" placeholder="Maximum Iterasi">
                  </div>
                  <div class="form-group">
				  <h5>Error Terkecil</h5>
                    <input class="form-control" value="<?php if(!empty($data)){echo $data[0]->errorTerkecil;} ?>" type="text" name="errorTerkecil" placeholder="Error Terkecil Yg Diharapkan">
                  </div>
                  <button type="submit" class="btn btn-theme btn-block btn-warning text-white">Tambah Data</button>
              </form>
            </div>
          </div>
        </div>
  