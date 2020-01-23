<!-- MODAL - ADD -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title">TAMBAH DATA</h5>
			</div>

			<div class="modal-body">
				<form action="<?php echo base_url() . 'cMhs/addItem'; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-row">
						<div class="col-8">
							<div class="form-group">
								<label for="txt-add-name" class="mb-0">NAME</label><br>
								<input type="text" id="txt-add-name" name="txt-add-name" class="form-control" required /><br>
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label for="txt-add-nim" class="mb-0">NIM</label><br>
								<input type="text" id="txt-add-nim" name="txt-add-nim" class="form-control" required /><br>
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col-5">
							<div class="form-group">
								<label for="txt-add-jurusan" class="mb-0">JURUSAN</label><br>
								<input type="text" id="txt-add-jurusan" name="txt-add-jurusan" class="form-control" required /><br>
							</div>
						</div>
						<div class="col-5">
							<div class="form-group">
								<label for="txt-add-prodi" class="mb-0">PRODI</label><br>
								<input type="text" id="txt-add-prodi" name="txt-add-prodi" class="form-control" required><br>
							</div>
						</div>
						<div class="col-2">
							<div class="form-group">
								<label for="txt-add-kelas" class="mb-0">KELAS</label><br>
								<input type="text" id="txt-add-kelas" name="txt-add-kelas" class="form-control" required><br>
							</div>
						</div>
					</div>

					<!-- <div class="form-row">
						<div class="col-8">
							<div class="form-group">
								<label for="txt-add-photo" class="mb-0">PHOTO</label><br>
								<input type="text" id="txt-add-photo" name="txt-add-photo" class="form-control" readonly />
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<br>
								<input type="button" id="btn-add-photo" class='btn btn-success' value="UBAH PHOTO" />
							</div>
						</div>
					</div> -->

					<div class="form-row">
						<!-- PHOTO PREVIEW -->
						<div class="col-4">
							<div class="form-group">
								<label class="mb-0">PHOTO</label><br>
								<img id="img-add-preview" onerror="this.src='<?= base_url('uploads/default.jpg'); ?>'" height="90" width="120" style="border: 1px solid; padding: 2px;" />
							</div>
						</div>
						<!-- PHOTO UPLOAD -->
						<div class="col-8">
							<div class="form-group">
								<input type="file" id="file-add-upload" name="file-add-upload" class="form-control mt-5" accept=".jpg, .jpeg, .png">
							</div>
						</div>
					</div>

					<div class="form-row float-right">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" name="" class='btn btn-success' value="ADD" />
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

<!-- MODAL - EDIT -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title">UBAH DATA</h5>
				</button>
			</div>

			<div class="modal-body">
				<form id="form-edit" method="POST" enctype="multipart/form-data">
					<div class="form-row">
						<div class="col-8">
							<div class="form-group">
								<label for="txt-edit-name" class="mb-0">NAME</label><br>
								<input type="text" id="txt-edit-name" name="txt-edit-name" class="form-control" required /><br>
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label for="txt-edit-nim" class="mb-0">NIM</label><br>
								<input type="text" id="txt-edit-nim" name="txt-edit-nim" class="form-control" required /><br>
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col-5">
							<div class="form-group">
								<label for="txt-edit-jurusan" class="mb-0">JURUSAN</label><br>
								<input type="text" id="txt-edit-jurusan" name="txt-edit-jurusan" class="form-control" required /><br>
							</div>
						</div>
						<div class="col-5">
							<div class="form-group">
								<label for="txt-edit-prodi" class="mb-0">PRODI</label><br>
								<input type="text" id="txt-edit-prodi" name="txt-edit-prodi" class="form-control" required><br>
							</div>
						</div>
						<div class="col-2">
							<div class="form-group">
								<label for="txt-edit-kelas" class="mb-0">KELAS</label><br>
								<input type="text" id="txt-edit-kelas" name="txt-edit-kelas" class="form-control" required><br>
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col-8">
							<div class="form-group">
								<label for="txt-edit-photo" class="mb-0">PHOTO</label><br>
								<input type="text" id="txt-edit-photo" name="txt-edit-photo" class="form-control" readonly />
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<br>
								<input type="button" id="btn-edit-photo" class='btn btn-success' value="UBAH PHOTO" />
							</div>
						</div>
					</div>

					<div class="form-row">
						<!-- PHOTO PREVIEW -->
						<div class="col-4">
							<div class="form-group">
								<img id="img-edit-preview" onerror="this.src='<?= base_url('uploads/default.jpg'); ?>'" height="90" width="120" style="border: 1px solid; padding: 2px;" />
							</div>
						</div>
						<!-- PHOTO UPLOAD -->
						<div class="col-8">
							<div class="form-group">
								<input type="file" id="file-edit-upload" name="file-edit-upload" class="form-control" accept=".jpg, .jpeg, .png" hidden>
							</div>
						</div>
					</div>

					<div class="form-row float-right">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" name="" class='btn btn-success' value="EDIT" />
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

<!-- MODAL - DETAIL -->
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">Data Mahasiswa</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">

					<form method="POST">
						<div class="form-row">
							<div class="col-8">
								<div class="form-group">
									<label for="d-name">NAME</label><br>
									<input class="form-control" type="text" name="d-name" id="d-name" readonly /><br>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label for="d-nim">NIM</label><br>
									<input class="form-control" type="text" name="d-nim" id="d-nim" readonly /><br>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-5">
								<div class="form-group">
									<label for="d-jurusan">JURUSAN</label><br>
									<input class="form-control" type="text" name="d-jurusan" id="d-jurusan" readonly /><br>
								</div>
							</div>
							<div class="col-5">
								<div class="form-group">
									<label for="d-prodi">PRODI</label><br>
									<input class="form-control" type="text" name="d-prodi" id="d-prodi" readonly><br>
								</div>
							</div>
							<div class="col-2">
								<div class="form-group">
									<label for="d-kelas">KELAS</label><br>
									<input class="form-control" type="text" name="d-kelas" id="d-kelas" readonly><br>
								</div>
							</div>
							<div class="col-2">
								<div class="form-group">
									<label for="d-kelas">PHOTO</label><br>
									<input class="form-control" type="text" name="d-photo" id="d-photo" readonly></textarea><br>
								</div>
							</div>
						</div>

						<div class="form-row float-right">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>