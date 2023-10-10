<h3 class="title-5 m-b-35"><?= $title ?></h3>
<div class="row">

	<div class="col-lg-7">
		<div class="card">
			<div class="card-header">Lokasi Asset</div>
			<div class="card-body">
				<div id="mapid" style="height: 700px;"></div>
			</div>
		</div>
	</div>



	<div class="col-lg-5">
		<div class="card">
			<div class="card-header">Data Tempat Asset</div>
			<div class="card-body">
				<?php
				echo validation_errors('<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
				if (isset($error_upload)) {
					echo '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
				}


				echo form_open_multipart('lokasi/add');
				?>

				<div class="form-group">
					<label>Kode Asset</label>
					<input name="kode_asset" placeholder="Kode Asset" type="text" class="form-control">
				</div>


				<div class="form-group">
					<label>Nama Tempat</label>
					<input name="nama_tempat" placeholder="Nama Tempat" type="text" class="form-control">
				</div>

				<div class="form-group">
					<label>Kategori</label>
					<!-- <select name="kategori" placeholder="Kategori" class="form-control">
						<?php foreach ($kategori as $kategoris => $kategori) { ?>
							<option kategori="<?= $kategori->kategori ?>"><?= $kategori->kategori ?></option>
						<?php } ?>
					</select> -->

					<select name="kategori" class="form-control" onchange='changeValueNIM(this.value)'>
						<option value="-">-- Pilih --</option>
						<?php
						$jsArray = "var prdName = new Array();\n";
						foreach ($kategorix as $kategori) { ?>
							<option value="<?= $kategori->nama_icon ?>"><?= $kategori->nama_icon ?></option>

						<?php
							$jsArray .= "prdName['" . $kategori->nama_icon . "'] = {nama:'" . addslashes($kategori->gambaran) . "'};\n";
						} ?>
					</select>

				</div>

				<div class="form-group">
					<label>Kepemilikan</label>
					<input name="kepemilikan" placeholder="Kepemilikan" type="text" class="form-control">
				</div>

				<div class="form-group">
					<label>Kondisi</label>
					<input name="kondisi" placeholder="kondisi" type="text" class="form-control">
				</div>

				<div class="form-group">
					<label>Tahun Pembuatan</label>
					<input name="tahun_pembuatan" placeholder="Tahun Pembuatan" type="text" class="form-control">
				</div>

				<div class="form-group">
					<label>Operator</label>
					<input name="operator" placeholder="Operator" type="text" class="form-control">
				</div>

				<div class="form-group">
					<label>Status</label>
					<input name="status" placeholder="Status" type="text" class="form-control">
				</div>







				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label>Latitude</label>
							<input id="Latitude" name="latitude" placeholder="Latitude" type="text" class="form-control">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label>Longitude</label>
							<input name="longitude" id="Longitude" placeholder="Longitude" class="form-control">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>Deskripsi</label>
					<textarea name="deskripsi" rows="20" class="form-control" id="">
					<p style="line-height: 1;"><span style="font-size: 8pt;"><strong><span style="text-decoration: underline;">DERMAGA </span></strong></span></p>
<p style="line-height: 1;"><span style="font-size: 8pt;"><strong>PERUNTUKAN :</strong></span></p>
<p style="line-height: 1;"><span style="font-size: 8pt;"><strong>SPESIFKASI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></p>
<ul>
<li><span style="font-size: 8pt;"><strong>PANJANG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>LEBAR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>LUAS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>KEDALAMAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>KONSTRUKSI DERMAGA :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>DAYA LANTAI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>FENDER &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>KAPASITAS FENDER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>BOLLARD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>KAPASITAS BOLLARD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></li>
</ul>
<p style="line-height: 1;"><span style="font-size: 8pt;"><strong>TIPE KARGO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></p>
<p style="line-height: 1;"><span style="font-size: 8pt;"><strong>KETERANGAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></p>
<p style="line-height: 1;">&nbsp;</p>
<p><span style="font-size: 8pt;"><strong>GUDANG</strong></span></p>
<ol>
<li><span style="font-size: 8pt;"><strong>PERUNTUKAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>STATUS PENGGUNAAN :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>SPESIFIKASI</strong></span></li>
</ol>
<ul>
<li style="list-style-type: none;">
<ul>
<li><span style="font-size: 8pt;"><strong>PANJANG :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>LEBAR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>TINGGI :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>LUAS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>KAPASITAS GUDANG :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>DAYA LANTAI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></li>
</ul>
</li>
</ul>
<ol start="9">
<li><span style="font-size: 8pt;"><strong>TIPE KARGO :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>KETERANGAN :</strong></span></li>
</ol>
<p>&nbsp;</p>
<p><span style="font-size: 8pt;"><strong>LAPANGAN</strong></span></p>
<ol>
<li><span style="font-size: 8pt;"><strong>PERUNTUKAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>SPESIFIKASI LAPANGAN NON PETIKEMAS</strong></span></li>
</ol>
<ul>
<li style="list-style-type: none;">
<ul>
<li><span style="font-size: 8pt;"><strong>PANJANG :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>LEBAR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>LUAS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>HOLDING CAPACITY :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>JARAK DENGAN DERMAGA :</strong></span></li>
</ul>
</li>
</ul>
<ol start="7">
<li><span style="font-size: 8pt;"><strong>SPESIFIKASI LAPANGAN PETIKEMAS</strong></span></li>
</ol>
<ul>
<li style="list-style-type: none;">
<ul>
<li><span style="font-size: 8pt;"><strong>LUAS :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>GROUND SLOT :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>TIER :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>DWELLING TIME :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>HOLDING CAPACITY :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>JARAK DENGAN DERMAGA :</strong></span></li>
</ul>
</li>
</ul>
<ol start="8">
<li><span style="font-size: 8pt;"><strong>KONSTRUKSI :</strong></span></li>
</ol>
<p>&nbsp;</p>
<p><span style="font-size: 8pt;"><strong>WORKSHOP</strong></span></p>
<ol>
<li><span style="font-size: 8pt;"><strong>PERUNTUKAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>SPESIFIKASI</strong></span></li>
</ol>
<ul>
<li><span style="font-size: 8pt;"><strong>LUAS LAHAN :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>LUAS BANGUNAN :</strong></span></li>
</ul>
<p>&nbsp;</p>
<p><span style="font-size: 8pt;"><strong>LAHAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span></p>
<ol>
<li><span style="font-size: 8pt;"><strong>LOKASI :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>LUAS :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>TARIF / M2 / TAHUN:</strong></span></li>
<li><span style="font-size: 8pt;"><strong>PERUNTUKAN :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>STATUS :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>PENYEWA : *)</strong></span></li>
<li><span style="font-size: 8pt;"><strong>PERIODE KERJASAMA:*)</strong></span></li>
<li><span style="font-size: 8pt;"><strong>NILAI KERJASAMA :*)</strong></span></li>
<li><span style="font-size: 8pt;"><strong>JARAK DENGAN DERMAGA :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>KONDISI LAHAN :</strong></span></li>
</ol>
<p>&nbsp;</p>
<p><span style="font-size: 8pt;"><strong>ALAT UTAMA</strong></span></p>
<ol>
<li><span style="font-size: 8pt;"><strong>NOMOR ALAT :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>PENEMPATAN :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>MERK PABRIK :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>SUMBER ENERGI :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>TAHUN PRODUKSI :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>TAHUN PENGOPERASIAN :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>SERTIFIKASI ALAT :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>KINERJA ALAT</strong></span></li>
</ol>
<ul>
<li style="list-style-type: none;">
<ul>
<li><span style="font-size: 8pt;"><strong>AVAILABILITY :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>UTILITY :</strong></span></li>
<li><span style="font-size: 8pt;"><strong>KAPASITAS :</strong></span></li>
</ul>
</li>
</ul>
<ol start="12">
<li><span style="font-size: 8pt;"><strong>STATUS ASET :</strong></span></li>
</ol>
					</textarea>
					<!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
					<!-- <br><input name="formx" id="d" class="form-control"> -->
				</div>

				<!-- <div class="form-group">
					<label>Icon Marker</label>
					<select name="id_icon" class="form-control">
						<?php foreach ($icon as $key => $value) { ?>
							<option value="<?= $value->id_icon ?>"><?= $value->nama_icon ?></option>
						<?php } ?>
					</select>
				</div> -->

				<div class="form-group">
					<label>Gambar</label>
					<input type="file" name="gambar" class="form-control" multiple accept="image/*" required>
				</div>

				<div>
					<button type="submit" class="btn btn-info">Simpan</button>
					<button type="reset" class="btn btn-success">Reset</button>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<script>
	var curLocation = [0, 0];
	if (curLocation[0] == 0 && curLocation[1] == 0) {
		// curLocation = [-1.0054119978527456, 100.37328330192625];
		curLocation = [-1.0054119978527456, 100.37328330192625];
	}

	var mymap = L.map('mapid').setView([-1.0054119978527456, 100.37328330192625], 15);
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: ' GIS Pelabuhan Teluk Bayur &copy;Sistem Informasi Teluk Bayur',
		id: 'mapbox/streets-v11'
	}).addTo(mymap);

	mymap.attributionControl.setPrefix(false);
	var marker = new L.marker(curLocation, {
		draggable: 'true'
	});

	marker.on('dragend', function(event) {
		var position = marker.getLatLng();
		marker.setLatLng(position, {
			draggable: 'true'
		}).bindPopup(position).update();
		$("#Latitude").val(position.lat);
		$("#Longitude").val(position.lng).keyup();
	});

	$("#Latitude, #Longitude").change(function() {
		var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
		marker.setLatLng(position, {
			draggable: 'true'
		}).bindPopup(position).update();
		mymap.panTo(position);
	});
	mymap.addLayer(marker);



	<?php echo $jsArray; ?>

	function changeValueNIM(x) {
		document.getElementById('d').value = prdName[x].nama;
	};
</script>