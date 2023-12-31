<div class="col-md-12">
	<!-- DATA TABLE -->
	<h3 class="title-5 m-b-35"><?= $title ?></h3>
	<div class="table-data__tool">
		<div class="table-data__tool-left">
			<div class="rs-select2--light rs-select2--md">
				<a href="<?= base_url('lokasi/add'); ?>" class="au-btn au-btn-icon au-btn--green au-btn--small">
					<i class="zmdi zmdi-plus"></i> Add</a>
			</div>
		</div>
	</div>

	<?php

	if ($this->session->flashdata('pesan')) {
		echo '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		echo $this->session->flashdata('pesan');
		echo '</div>';
	}

	?>
	<table class="table table-borderless table-striped table-earning table-responsive">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Tempat</th>
				<th>Kategori</th>
				<th>Gambar</th>
				<th>Galery</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
			foreach ($wisata as $key => $value) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $value->nama_tempat ?></td>
					<td><?= $value->kategori ?></td>

					<td><img src="<?= base_url('gambar/' . $value->gambar)  ?>" width='100px' ></td>
					<td><a href="<?= base_url('lokasi/galery/' . $value->id_wisata); ?>" class="au-btn au-btn-icon au-btn--green au-btn--small">
							<i class="zmdi zmdi-book"></i> Galeri</a></td>
					<td>
						<a href="<?= base_url('lokasi/edit/' . $value->id_wisata) ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
						<a href="<?= base_url('lokasi/delete/' . $value->id_wisata) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus..?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>