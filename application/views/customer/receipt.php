            <div id="tf-portfolio">
              <div class="container">
                <div class="section-title">
                  <h1 class="page-header">Invoice</h1>
                  <hr>
                </div>
                <div class="space"></div>
                <div id="tf-about">                  
                    <div class="container">
        <!-- /.row -->
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-primary" href="<?= site_url("/customer/lapangan/" . $chosenArena->lapangan_id); ?>"><span class="glyphicon glyphicon-chevron-left">Back</span></a>
            </div>
        </div>
        
        <!-- Project One -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="row">
                    <h3 class="section-title">Details</h3>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        Lapangan
                    </div>
                    <div class="col-md-7">
                        <?= $field->nama; ?>
                    </div>
                </div>
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

            </div>
        </div>
        <!-- /.row -->
                    </div>
                </div>
              </div>
            </div>