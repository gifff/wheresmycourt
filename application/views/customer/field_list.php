            <div id="tf-portfolio">
              <div class="container">
                <div class="section-title">
                  <h3>Pilih Lapangan <?= $field_type; ?></h3>
                  <hr>
                </div>
                <div class="space"></div>
                <div id="tf-about">
                  
                    <div class="container">
                    <?php
                        if(!is_null($fields)):
                            foreach($fields as $field):
                    ?>
        <!-- Project One -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="<?= base_url($fields_photo_path . $field->link_foto); ?>" style="width:700px; height:300px" alt="">
                    
                </a>
            </div>
            <div class="col-md-5">
                <h3><?= $field->nama;?></h3>
                <h4>Starting at Rp<?= $field->price; ?>/hour</h4>
                <p>
                    <?= $field->alamat;?> <br>
                    Telp. <?= $field->telp; ?>
                </p>
                <a class="btn btn-primary" href="<?= site_url("/customer/lapangan/" . $field->id); ?>">Pilih Lapangan<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->
        <div class="space"></div>
                    <?php
                        endforeach;
                        else:
                    ?>
    <!-- Not available -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="<?= base_url("/public/images/not_available.jpg"); ?>" style="width:700px; height:300px" alt="">
                    
                </a>
            </div>
            <div class="col-md-5">
                <h3>No fields available</h3>
                <h4>We are sorry but up to this magnitude, there's not fields available.</h4>
                <p>
                    Please come back here again later. :)
                </p>
                <a class="btn btn-primary" href="<?= site_url("/customer/pilihLapangan"); ?>"><span class="glyphicon glyphicon-chevron-left"></span> Go back :(</a>
            </div>
        </div>
        <!-- /.row -->
        <div class="space"></div>
        
                    <?php
                        endif;
                    ?>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <a class="btn btn-primary" href="<?= site_url("/customer/pilihLapangan"); ?>"><span class="glyphicon glyphicon-chevron-left"> Back</span></a>
                    </div>
                </div>
              </div>
            </div>