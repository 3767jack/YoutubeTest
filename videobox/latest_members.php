<?php
include ( './includes/header.php' );
?>
<br /><br /><br />
<?php
$get_users = mysql_query("SELECT * FROM users ORDER by date_joined DESC");
if (mysql_num_rows($get_users) == 0) {
	echo "There are no users yet!";
}
else {
	while ($row = mysql_fetch_assoc($get_users)) {
		$id = $row['id'];
		$username = $row['username'];
		
		echo $username."<br />";
	}
}
?>