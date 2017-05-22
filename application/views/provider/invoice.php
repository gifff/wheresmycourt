            <div id="tf-portfolio">
              <div class="container">
                <div class="section-title">
                  <h1 class="page-header"><?= $field->nama; ?></h1>
                  <hr>
                </div>
                <div class="space"></div>
                <div id="tf-about">                  
                    <div class="container">
        <!-- /.row -->
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-primary" href="<?= site_url("/customer/book/" . $field_id); ?>"><span class="glyphicon glyphicon-chevron-left">Back</span></a>
            </div>
        </div>
        
        <!-- Project One -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="row">
                    <h3 class="section-title">Booking Confirmation</h3>
                </div>
                <?php echo form_open('/customer/confirmInvoice', '', array('intchk' => $flash_id)); ?>

                <div class="row">
                    <div class="col-md-5">
                        Arena
                    </div>
                    <div class="col-md-7">
                        <?= $chosenArena->nama; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        Tanggal:
                    </div>
                    <div class="col-md-7">
                        <?= $jam_tanggal; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        Durasi
                    </div>
                    <div class="col-md-7">
                        <?= $durasi; ?> Jam
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-5">
                        Harga
                    </div>
                    <div class="col-md-7">
                        <?= $price; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php echo form_submit('mysubmit', "Confirm!", array('class' => 'btn btn-primary')); ?>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- /.row -->
                    </div>
                </div>
              </div>
            </div>