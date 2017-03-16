<h3>arena list</h3>
<table border="1px">
	<tr>
		<th>id</th>
		<th>nama</th>
		<th>harga_per_jam</th>
		<th>lapangan_id</th>
	</tr>

<?php
foreach ($arena as $are) {
	echo "<tr>";
	echo "<td>$are->id</td>";
	echo "<td>$are->nama</td>";
	echo "<td>$are->harga_per_jam</td>";
	echo "<td>$are->lapangan_id</td>";
	echo "</tr>";
}
?>
</table>