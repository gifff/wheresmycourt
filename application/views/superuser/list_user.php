<h3>user list</h3>
<table border="1px">
	<tr>
		<th>id</th>
		<th>username</th>
		<th>name</th>
		<th>phone</th>
		<th>email</th>
		<th>access level</th>
		<th>activated</th>
		<th>banned</th>
		<th>ban reason</th>
		<th>last_ip</th>
		<th>last_login</th>
		<th>created</th>
		<th>modified</th>
	</tr>

<?php
foreach ($users as $user) {
	echo "<tr>";
	echo "<td>$user->id</td>";
	echo "<td>$user->username</td>";
	echo "<td>$user->name</td>";
	echo "<td>$user->phone</td>";
	echo "<td>$user->email</td>";
	echo "<td>$user->access_level</td>";
	echo "<td>$user->activated</td>";
	echo "<td>$user->banned</td>";
	echo "<td>$user->ban_reason</td>";
	echo "<td>$user->last_ip</td>";
	echo "<td>$user->last_login</td>";
	echo "<td>$user->created</td>";
	echo "<td>$user->modified</td>";
	echo "</tr>";
}
?>
</table>