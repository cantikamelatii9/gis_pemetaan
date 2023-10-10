<h3 class="title-5 m-b-35"><?= $title ?></h3>
<div class="row">



    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">Form Upload Galery <b> <?= $wisata->nama_tempat ?></b></div>
            <div class="card-body">

                <?php
                echo validation_errors('<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
                if (isset($error_upload)) {
                    echo '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                }

                echo form_open_multipart('lokasi/galery/' . $wisata->id_wisata);
                ?>

                <input name="id_lokasi" type="hidden" class="form-control" value="<?= $wisata->id_wisata ?>">


                <div class="form-group">
                    <label>Gambar</label> 
                    <input type="file" name="files[]"  class="form-control" multiple="" required>
                </div>

                <div>
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <button type="reset" class="btn btn-success">Reset</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Galery <b> <?= $wisata->nama_tempat ?></b></div>
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="row">
                        <?php

                        foreach ($galery as $gal => $galeri) { ?>

<div class="col-lg-2" style="margin-top: 15px;">
                            <div class="fancybox" href='<?= base_url('lampiran/' . $galeri->foto)  ?>' data-fancybox-group="gallery"> <img class="img-polaroid" src='<?= base_url('lampiran/' . $galeri->foto)  ?>' width='150' height='150' alt="" /> 
                     <a href="<?= base_url('lokasi/delete_galery/' . $galeri->foto . '/' . $galeri->id_wisata . '/' . $galeri->id_galery); ?>" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-minus"></i> Delete</a>
                    </div>
</div>

                            <!-- <div class="col-lg-2" style="margin-top: 15px;">
                                <img src="<?= base_url('lampiran/' . $galeri->foto)  ?>" style="height: 250px;" class="img-thumbnail">
                                <a href="<?= base_url('lokasi/delete_galery/' . $galeri->foto . '/' . $galeri->id_wisata . '/' . $galeri->id_galery); ?>" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-minus"></i> Delete</a>
                            </div> -->

                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>