<br>
<br>
<br>
<br>
<div class="container">
	<div class="form-row mt-3 mb-3">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">ADD</button>
		<a class="navbar-brand"></a>
	</div>
	<a class="btn btn-warning" href="<?= base_url('cPdf') ?>"><i class="fa fa-file" data-target="_blank"></i>Export PDF</button></a>
	<a class="btn btn-success" href="<?= base_url('excel') ?>"><i class="fa fa-file-excel"></i>EXCEL</button></a>
	</a>
	<?= $this->session->flashdata('mahasiswa'); ?>
	<table class="table table-striped text-center " id="mahasiswa">
		<thead class="thead-dark">
			<tr>
				<th scope="col">NO</th>
				<th scope="col">PHOTO</th>
				<th scope="col">NAME</th>
				<th scope="col">NIM</th>
				<th scope="col">JURUSAN</th>
				<th scope="col">PRODI</th>
				<th scope="col">KELAS</th>
				<th scope="col">OPSI</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($mahasiswa as $row) : ?>

				<tr>
					<td scope="row"><?= $no++ ?> </td>
					<td>
						<img src="<?= $row['photo'] != "" ? base_url('uploads/Mahasiswa/' . $row['photo']) : base_url('uploads/default.jpg'); ?>" onerror="this.src='<?= base_url('uploads/default.jpg'); ?>'" width="64" />
					</td>
					<td><?= $row['name'] ?></td>
					<td><?= $row['nim'] ?></td>
					<td><?= $row['jurusan'] ?></td>
					<td><?= $row['prodi'] ?></td>
					<td><?= $row['kelas'] ?></td>
					<td>
						<a class="btn btn-warning btn-sm" data-toggle="modal" href="#modal-detail" data-row-id="<?= $row['id'] ?>"><i class="far fa-eye"></i></a>
						<a class="btn btn-success btn-sm" data-toggle="modal" href="#modal-edit" data-row-id="<?= $row['id'] ?>"><i class="far fa-edit"></i></a>
						<a onclick="return confirm('anda yakin ingin menghapus ini')" class="btn btn-danger btn-sm" href="cMhs/deleteItem?rowID=<?= $row['id'] ?>">
							<i class="far fa-trash-alt"></i></a>
					</td>
				</tr>


			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<br>
<br>
<br>
<br>
<!-- Button trigger modal -->