<script>
    navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);


        //bagian grup layer 1
        <?php foreach ($statusa1 as $stat => $status) { ?>
            var <?= $status->status ?> = L.layerGroup();

        <?php } ?>
       // var grupwisata = L.layerGroup();
        //var grupwisata2 = L.layerGroup();
        //var grupwisata3 = L.layerGroup();



        var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapboxaaaa</a>',
            id: 'mapbox/streets-v11'
        });

        var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: '© SI Teluk Bayur' + "<br><?php foreach ($kategori as $kat => $kate) { ?><img src=<?= base_url('marker/' . $kate->icon)  ?> width='20px'><?= $kate->nama_icon ?><br><?php } ?>",
            id: 'mapbox/satellite-v9'
        });

        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: "<br><?php foreach ($kategori as $kat => $kate) { ?><img src=<?= base_url('marker/' . $kate->icon)  ?> width='20px'><?= $kate->nama_icon ?><br><?php } ?>"
        });



        //bagian grup layer 2
        var map = L.map('map', {
            center: [-0.9980316867525314, 100.37517067937796],
            zoom: 16,
            layers: [peta2,
                <?php foreach ($statusa1 as $stat => $status) { ?>
                    <?= $status->status ?>,

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
            //bagian grup layer 3
            <?php foreach ($statusa1 as $stat => $status) { ?>
                <?= $status->status ?>: <?= $status->status ?>,
            <?php } ?>

           // "Semua": grupwisata,
           // "Wisataa": grupwisata2,
            //"xxx": grupwisata3,
        }

        L.control.layers(baseLayers, overlays).addTo(map);

        //tambahkan disini per kategori tampilkan kategori dulu baru ini
        <?php foreach ($statusa1 as $stat => $status) { ?>
            <?php
            $lokasi = $this->m_wisata->get_all_data_by_status($key_1, $status->status); //query
            foreach ($lokasi as $key => $value) { ?>

                L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                    icon: L.icon({
                        iconUrl: '<?= base_url('marker/' . $value->icon)  ?>',
                        iconSize: [50, 50], // size of the icon
                    })

                    //setelahaddto merupakan nam layer yang akan ditampilkan
                }).addTo(<?= $status->status ?>).bindPopup("<img src='<?= base_url('gambar/' . $value->gambar) ?>' width='280px'>" +
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
    <?php echo form_open() ?>


    <div class="form-group col-md-4">
    </div>
    <div class="form-group col-md-4">
        <input name="key_1" placeholder="Pencarian" type="text" class="form-controlx">
        <input type="submit" name="search_submit" value="Cari" class="btn btn-success">
    </div>

    <!-- <input type="text" name="keyword" placeholder="search" class="form-control"> -->

    <?php echo form_close() ?>
</div>
<div class="col-md-12">
    <div id="map" style="width: 100%; height: 700px;"></div>
</div>