<div class="col-md-6">
	<div class="card">
		<div class="card-header">
			<strong class="card-title mb-3">Lokasi</strong>
		</div>
		<div class="card-body">
			<div id="map" style="width: 100%; height: 450px;"></div>
		</div>
	</div>
</div>

<div class="col-md-6">
	<div class="card">
		<div class="card-header">
			<strong class="card-title mb-3">Gambar Lokasi</strong>
		</div>
		<div class="card-body">

			<div class="fancybox" href='<?= base_url('gambar/' . $wisata->gambar)  ?>' data-fancybox-group="gallery">
				<img src="<?= base_url('gambar/' . $wisata->gambar) ?>" width='150px' height='150px' class="img-thumbnail">
			</div>

			<div class="col-lg-12">
				<div class="row">
					<?php
					foreach ($galery as $gal => $galeri) { ?>


						<div class="fancybox" href='<?= base_url('lampiran/' . $galeri->foto)  ?>' data-fancybox-group="gallery">
							<img class="img-thumbnail" src='<?= base_url('lampiran/' . $galeri->foto)  ?>' width='100px' alt="" />
						</div>
					<?php } ?>
				</div>
			</div>


			<!-- <div class="fancybox" href='<?= base_url('gambar/' . $wisata->gambar)  ?>' data-fancybox-group="gallery">
				<img src="<?= base_url('gambar/' . $wisata->gambar) ?>" width='150px' height='150px' class="img-thumbnail">
			</div> -->
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title mb-3">Data Tempat Lokasi</strong>
		</div>
		<div class="card-body">
			<table class="table">
				<tr>
					<th width="200px">Nama Tempat</th>
					<th width="20px">:</th>
					<td><?= $wisata->nama_tempat ?></td>
					<th width="200px">Kategori</th>
					<th>:</th>
					<td><?= $wisata->kategori ?></td>
				</tr>

				<tr>
					<th width="200px">Kepemilikan</th>
					<th>:</th>
					<td><?= $wisata->kepemilikan ?></td>
					<th width="200px">Kondisi</th>
					<th>:</th>
					<td><?= $wisata->kondisi ?></td>
				</tr>

				<tr>
					<th width="200px">Tahun Pembuatan</th>
					<th>:</th>
					<td><?= $wisata->tahun_pembuatan ?></td>
					<th width="200px">Kategori</th>
					<th>:</th>
					<td><?= $wisata->kategori ?></td>
				</tr>

				<tr>
					<th width="200px">Kategori</th>
					<th>:</th>
					<td><?= $wisata->kategori ?></td>
					<th width="200px">Status</th>
					<th>:</th>
					<td><?= $wisata->status ?></td>
				</tr>


				<tr>
					<th width="200px">Operator</th>
					<th>:</th>
					<td><?= $wisata->operator ?></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<th width="200px">Deskripsi</th>
					<th>:</th>
					<td><?= $wisata->deskripsi ?></td>
				</tr>
			</table>
		</div>
	</div>

	<div class="login-checkbox">

		<a href="<?= base_url() ?>" class="btn btn-success ">Back</a>
	</div>
</div>





<script>
	navigator.geolocation.getCurrentPosition(function(location) {
		var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
		var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11'
		});

		var peta2 = L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
			attribution: 'google'
		});

		var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		});

		var map = L.map('map', {
			center: [<?= $wisata->latitude  ?>, <?= $wisata->longitude  ?>],
			zoom: 18,
			layers: [peta2]
		});

		var baseLayers = {
			"Grayscale": peta1,
			"Satelite": peta2,
			"Streets": peta3
		};
		L.control.layers(baseLayers).addTo(map);
		L.marker([<?= $wisata->latitude ?>, <?= $wisata->longitude ?>], {
			icon: L.icon({
				iconUrl: '<?= base_url('marker/' . $wisata->icon)  ?>',
				iconSize: [50, 50], // size of the icon

			})
		}).addTo(map).bindPopup("<img src='<?= base_url('gambar/' . $wisata->gambar) ?>' width='280px'>" +
			"Nama Tempat : <?= $wisata->nama_tempat ?></br>" +
			"Kategori : <?= $wisata->kategori ?></br>" +

			"<a href='https://www.google.com/maps/dir/?api=1&origin=" +
			location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $wisata->latitude ?>,<?= $wisata->longitude ?>' class='btn btn-sm btn-outline-success' target='_blank'>Rute</a>").openPopup();
	});
</script>