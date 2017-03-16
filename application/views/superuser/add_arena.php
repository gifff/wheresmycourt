<h3>add lapangan</h3>
<?php 
$nama = array(
    'name'  => 'nama',
    'id'    => 'nama',
    'value' => set_value('nama'),
    'maxlength' => 80,
    'size'  => 30,
    'class' => 'form-control',
    'autofocus' => 1,
    'required' => 'required'
);
$harga_per_jam = array(
    'name'  => 'harga_per_jam',
    'id'    => 'harga_per_jam',
    'value' => set_value('harga_per_jam'),
    'maxlength' => 11,
    'size'  => 30,
    'class' => 'form-control',
    'autofocus' => 1,
    'required' => 'required'
);
$lapangan_id = array( // this is a dropdown
    'name'  => 'lapangan_id',
    'id'    => 'lapangan_id',
    'options'   => $daftarLapangan,
    'value' => set_value('lapangan_id')
);
// id_pemilik
?>
<?php echo form_open( site_url(implode('/', $this->uri->segment_array()), is_https() ? 'https' : 'http')); ?>

<?php echo form_label('Nama', $nama['id']); ?>
<?php echo form_input($nama); ?>
<?php echo form_error($nama['name']); ?>
<br>
<?php echo form_label('Harga per Jam', $harga_per_jam['id']); ?>
<?php echo form_input($harga_per_jam); ?>
<?php echo form_error($harga_per_jam['name']); ?>
<br>
<?php echo form_label('Lapangan', $lapangan_id['id']); ?>
<?php echo form_dropdown($lapangan_id['name'], $lapangan_id['options'], $lapangan_id['value'], "id='$lapangan_id[id]'"); ?>
<?php echo form_error($lapangan_id['name']); ?>
<br>
<?php echo form_submit("mysumbit", "Submit"); echo form_close(); ?>
