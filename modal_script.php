<script>
	$(document).ready(function() {
		// MODAL - ADD ==========================================================
		$('#file-add-upload').change(function() {
			if (this.files && this.files[0]) {
				const reader = new FileReader();
				reader.onload = (e) => {
					$('#img-add-preview').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			}
		});


		// MODAL - EDIT ==========================================================
		$('#btn-edit-photo').click((e) => {
			const _IsHidden_InputFile = $('#file-edit-upload').is(':hidden');

			if (_IsHidden_InputFile) {
				$('#btn-edit-photo').val('CANCEL');
				$('#file-edit-upload').removeAttr('hidden');
			} else {
				$('#btn-edit-photo').val('UBAH PHOTO');
				$('#file-edit-upload').attr('hidden', true);
			}
		});

		$('#file-edit-upload').change(function() {
			if (this.files && this.files[0]) {
				const reader = new FileReader();
				reader.onload = (e) => {
					$('#img-edit-preview').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			}
		});

		$('#modal-edit').on('show.bs.modal', (e) => {
			const RowID = $(e.relatedTarget).data('row-id');

			$('#form-edit').removeAttr('action');
			$('#form-edit').attr('action', 'cMhs/editItem?rowID=' + RowID);
			$('#name').val('');
			$('#nim').val('');
			$('#jurusan').val('');
			$('#prodi').val('');
			$('#kelas').val('');
			$('#mhs-photo').val('');
			$('#mhs-photo-preview').removeAttr('src');

			$.ajax({
				type: 'POST',
				url: 'cMhs/getItemById',
				dataType: 'JSON',
				data: {
					rowID: RowID
				},
				success: (result) => {
					$('#txt-edit-name').val(result._DataMahasiswa.name);
					$('#txt-edit-nim').val(result._DataMahasiswa.nim);
					$('#txt-edit-jurusan').val(result._DataMahasiswa.jurusan);
					$('#txt-edit-prodi').val(result._DataMahasiswa.prodi);
					$('#txt-edit-kelas').val(result._DataMahasiswa.kelas);
					$('#txt-edit-photo').val(result._DataMahasiswa.photo);
					const _ImgName = $('#txt-edit-photo').val();
					const _ImgURL = _ImgName != "" ? '<?= base_url('uploads/Mahasiswa/'); ?>' + _ImgName : '<?= base_url('uploads/default.jpg'); ?>';
					toBase64(_ImgURL, (base64) => {
						$('#img-edit-preview').attr('src', base64);
					});

					function toBase64(url, callback) {
						var xhr = new XMLHttpRequest();
						xhr.onload = function() {
							var reader = new FileReader();
							reader.onloadend = function() {
								callback(reader.result);
							}
							reader.readAsDataURL(xhr.response);
						};
						xhr.open('GET', url);
						xhr.responseType = 'blob';
						xhr.send();
					}
				},
				error: (error) => {
					console.log(error);
				}
			});
		});

		// MODAL - DETAIL ==========================================================
		$('#modal-detail').on('show.bs.modal', function(e) {
			const RowID = $(e.relatedTarget).data('row-id');

			$('#d-name').val('');
			$('#d-nim').val('');
			$('#d-jurusan').val('');
			$('#d-prodi').val('');
			$('#d-kelas').val('');

			$.ajax({
				type: 'POST',
				url: 'cMhs/getItemById',
				dataType: 'JSON',
				data: {
					rowID: RowID
				},
				success: function(result) {
					$('#d-name').val(result._DataMahasiswa.name);
					$('#d-nim').val(result._DataMahasiswa.nim);
					$('#d-jurusan').val(result._DataMahasiswa.jurusan);
					$('#d-prodi').val(result._DataMahasiswa.prodi);
					$('#d-kelas').val(result._DataMahasiswa.kelas);
				},
				error: function(error) {
					console.log(error);
				}
			});
		});
	});
</script>