<h3>lapangan list</h3>
<table border="1px">
	<tr>
		<th>id</th>
		<th>nama</th>
		<th>telp</th>
		<th>alamat</th>
		<th>id_pemilik</th>
	</tr>

<?php
foreach ($lapangan as $lap) {
	echo "<tr>";
	echo "<td>$lap->id</td>";
	echo "<td>$lap->nama</td>";
	echo "<td>$lap->telp</td>";
	echo "<td>$lap->alamat</td>";
	echo "<td>$lap->id_pemilik</td>";
	echo "</tr>";
}
?>
</table>