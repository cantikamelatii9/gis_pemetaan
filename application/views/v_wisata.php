<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title mb-3"></strong>
		</div>
		<div class="card-body">

			<table class="table table-borderless table-striped table-earning table-responsive">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Tempat</th>
						<th>Alamat</th>
						<th>Desa</th>
						<th>Kec</th>
						<th>Gambar</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($wisata as $key => $value) { ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $value->nama_tempat ?></td>
							<td><?= $value->alamat ?></td>
							<td><?= $value->desa ?></td>
							<td><?= $value->kec ?></td>

							<td><img src="<?= base_url('gambar/' . $value->gambar)  ?>" width="200px"></td>
							<td>
								<a href="<?= base_url('home/detail/' . $value->id_wisata) ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> Detail</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>


		</div>
	</div>
</div>
