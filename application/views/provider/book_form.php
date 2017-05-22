<?php 

// $jamOpt = array(
//     '00.00','01.00','02.00','03.00','04.00','05.00','06.00','07.00','08.00','09.00','10.00','11.00','12.00',
//     '13.00','14.00','15.00','16.00','17.00','18.00','19.00','20.00','21.00','22.00','23.00'
//     );
// $durasiOpt = array('1', '2', '3', '4', '5');
$tanggal = array(
    'name'  => 'tanggal',
    'id'    => 'tanggal',
    'value' => set_value('tanggal'),
    'maxlength' => 80,
    'size'  => 30,
    'class' => 'form-control',
    'autofocus' => 1,
    'required' => 'required'
);
$jam = array( // this is a dropdown
    'name'  => 'jam',
    'id'    => 'jam',
    'options'   => $jamOpt,
    'value' => set_value('jam'),
    'attr' => array('class' => 'form-control')
);
$durasi = array( // this is a dropdown
    'name'  => 'durasi',
    'id'    => 'durasi',
    'options'   => $durasiOpt,
    'value' => set_value('durasi'),
    'attr' => array('class' => 'form-control')
);
$arena = array( // this is a dropdown
    'name'  => 'arena',
    'id'    => 'arena',
    'options'   => $arenaOpt,
    'value' => set_value('arena'),
    'attr' => array('class' => 'form-control')
);
// id_pemilik
$formAttr = array(
    'class' => 'form-horizontal'
);
?>

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
                <a class="btn btn-primary" href="<?= site_url("/customer/lapangan/" . $field_id); ?>"><span class="glyphicon glyphicon-chevron-left">Back</span></a>
            </div>
        </div>
        
        <!-- Project One -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="row">
                    <h3 class="section-title">Booking form</h3>
                </div>
                <?php echo form_open( site_url(implode('/', $this->uri->segment_array()), is_https() ? 'https' : 'http'), $formAttr); ?>
                <div class="form-group">
                <?php echo form_label('Tanggal', $tanggal['id'], array('class' => 'control-label col-md-2')); ?>
                    <div class="col-md-10">
                        <?php echo form_input($tanggal); ?>
                    </div>
                <?php echo form_error($tanggal['name']); ?>
                </div>

                <div class="form-group">
                <?php echo form_label('Jam', $jam['id'], array('class' => 'control-label col-md-2')); ?>
                    <div class="col-md-10">
                        <?php echo form_dropdown($jam['name'], $jam['options'], $jam['value'], 'id="$jam[id]" class="form-control"'); ?>
                    </div>
                <?php echo form_error($jam['name']); ?>
                </div>

                <div class="form-group">
                <?php echo form_label('Durasi', $durasi['id'], array('class' => 'control-label col-md-2')); ?>
                    <div class="col-md-10">
                        <?php echo form_dropdown($durasi['name'], $durasi['options'], $durasi['value'], 'id="$durasi[id]" class="form-control"'); ?>
                    </div>
                    
                <?php echo form_error($durasi['name']); ?>
                </div>

                <div class="form-group">
                <?php echo form_label('Arena', $arena['id'], array('class' => 'control-label col-md-2')); ?>
                    <div class="col-md-10">
                        <?php echo form_dropdown($arena['name'], $arena['options'], $arena['value'], 'id="$arena[id]" class="form-control"'); ?>
                    </div>
                <?php echo form_error($arena['name']); ?>
                </div>


                <?php echo form_submit("mysumbit", "Submit"); echo form_close(); ?>
            </div>
        </div>
        <!-- /.row -->
                    </div>
                </div>
              </div>
            </div>