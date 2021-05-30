<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog ">
	<!-- Modal content-->
		<form class="form-horizontal style-form" action="addDataAnak" method="post">								
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Data Anak</h4>	
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">						
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="nama" class="form-control nama" placeholder="Nama" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="gender" class="form-control gender" placeholder="Gender" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="umur" class="form-control umur" placeholder="Umur" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="tb" class="form-control tb" placeholder="Tinggi Badan" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="bb" class="form-control bb" placeholder="Berat Badan" type="text">
					  </div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-theme">Tambah Data</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="modal fade" id="myModalEditAnak" role="dialog">
	<div class="modal-dialog ">
	<!-- Modal content-->
		<form class="form-horizontal style-form" action="editDataAnak" method="post">								
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Data Anak</h4>	
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">						
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="id" class="form-control id" placeholder="id" type="text" readonly>
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="nama" class="form-control nama" placeholder="Nama" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="gender" class="form-control gender" placeholder="Gender" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="umur" class="form-control umur" placeholder="Umur" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="tb" class="form-control tb" placeholder="Tinggi Badan" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="bb" class="form-control bb" placeholder="Berat Badan" type="text">
					  </div>
					</div>
					
				</div>
				
			</div>
		</form>
	</div>
</div>


<div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Selamat Datang</h3>
			  <div class="col text-right">
                  
               </div>
            </div>
            <!-- Light table -->
              
          </div>
        </div>
	