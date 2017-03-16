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
$alamat = array(
    'name'  => 'alamat',
    'id'    => 'alamat',
    'value' => set_value('alamat'),
    'maxlength' => 80,
    'size'  => 30,
    'class' => 'form-control',
    'autofocus' => 1,
    'required' => 'required'
);
$telp = array(
    'name'  => 'telp',
    'id'    => 'telp',
    'value' => set_value('telp'),
    'maxlength' => 80,
    'size'  => 30,
    'class' => 'form-control',
    'autofocus' => 1,
    'required' => 'required'
);
// $daftarPemilik = array();
// foreach ($users as $user) {
//     // echo $user->id."<br>";
//     $daftarPemilik[$user->id] = $user->username;
// }
$pemilik = array( // this is a dropdown
    'name'  => 'pemilik',
    'id'    => 'pemilik',
    'options'   => $daftarPemilik,
    'value' => set_value('pemilik')
);
// id_pemilik
?>
<?php echo form_open( site_url(implode('/', $this->uri->segment_array()), is_https() ? 'https' : 'http')); ?>

<?php echo form_label('Nama', $nama['id']); ?>
<?php echo form_input($nama); ?>
<?php echo form_error($nama['name']); ?>
<br>
<?php echo form_label('Alamat', $alamat['id']); ?>
<?php echo form_input($alamat); ?>
<?php echo form_error($alamat['name']); ?>
<br>
<?php echo form_label('Telp.', $telp['id']); ?>
<?php echo form_input($telp); ?>
<?php echo form_error($telp['name']); ?>
<br>
<?php echo form_label('Nama Pemilik', $pemilik['id']); ?>
<?php echo form_dropdown($pemilik['name'], $pemilik['options'], $pemilik['value'], "id='$pemilik[id]'"); ?>
<?php echo form_error($pemilik['name']); ?>
<br>
<?php echo form_submit("mysumbit", "Submit"); echo form_close(); ?>
