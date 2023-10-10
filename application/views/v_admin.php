<script>
	navigator.geolocation.getCurrentPosition(function(location) {
		var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

		<?php foreach ($kategori as $kat => $kate) { ?>
			var <?= $kate->nama_icon ?> = L.layerGroup();

		<?php } ?>
		// var grupwisata = L.layerGroup();
		// var grupwisata2 = L.layerGroup();
		// var grupwisata3 = L.layerGroup();



		var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapboxaaaa</a>',
			id: 'mapbox/streets-v11'
		});

		var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/satellite-v9'
		});

		var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		});

		var map = L.map('map', {
			center: [-0.9980316867525314, 100.37517067937796],
			zoom: 16,
			layers: [peta2,
				<?php foreach ($kategori as $kat => $kate) { ?>
					<?= $kate->nama_icon ?>,

				<?php } ?>
			]
			// dermaga] //menapilkan default
		});

		var baseLayers = {
			"Grayscale": peta1,
			"Satelite": peta2,
			"Streets": peta3
		};

		var overlays = {

			<?php foreach ($kategori as $kat => $kate) { ?>
				<?= $kate->nama_icon ?>: <?= $kate->nama_icon ?>,

			<?php } ?>

			//"Semua": grupwisata,
			// "Wisataa": grupwisata2,
			// "xxx": grupwisata3,
		}

		L.control.layers(baseLayers, overlays).addTo(map);

		//tambahkan disini per kategori tampilkan kategori dulu baru ini
		<?php foreach ($kategori as $kate) { ?>
			<?php
			$lokasi = $this->m_wisata->get_all_data_by_kategori($kate->nama_icon);
			foreach ($lokasi as $key => $value) { ?>

				L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
					icon: L.icon({
						iconUrl: '<?= base_url('marker/' . $value->icon)  ?>',
						iconSize: [50, 50], // size of the icon
					})

					//setelahaddto merupakan nam layer yang akan ditampilkan
				}).addTo(<?= $kate->nama_icon ?>).bindPopup("<img src='<?= base_url('gambar/' . $value->gambar) ?>' width='280px'>" +
					"Nama Tempat : <?= $value->nama_tempat ?></br>" +
					"lokasi : <?= $value->kategori ?></br>" +

					"<a href='<?= base_url('home/detail/' . $value->id_wisata) ?>' class='btn btn-sm btn-outline-primary'>Detail</a>" +
					"<a href='https://www.google.com/maps/dir/?api=1&origin=" +
					location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $value->latitude ?>,<?= $value->longitude ?>' class='btn btn-sm btn-outline-success' target='_blank'>Rute</a>");
			<?php } ?>
		<?php } ?>
	});
</script>

<div class="col-md-12">
	<div id="map" style="width: 100%; height: 700px;"></div>

</div>