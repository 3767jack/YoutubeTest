<?php
include ( './includes/header.php' );
$videoid = $_GET['videoid'];

$check = mysql_query("SELECT * FROM videos WHERE video_id='$videoid'");
if (mysql_num_rows($check) == 1) {
while($row = mysql_fetch_assoc($check)) {  // This data is only specific to the video itself
           $id = $row['id'];
           $video_title = $row['video_title'];
           $video_description = $row['video_description'];
           $video_keywords = $row['video_keywords'];
           $uploaded_by = $row['uploaded_by'];
           $privacy = $row['privacy'];
           $date_uploaded = $row['date_uploaded'];
           $views = $row['views'];
           $video_id = $row['video_id'];
           $videosrc = $row['file_location'];
           $newviews = $views + 1;
           $updateviews = mysql_query("UPDATE videos SET views='$newviews' WHERE video_id='$videoid'") or die(mysql_error());

           if ($privacy=='Public') {
           	$c = 'checked';
           	$c2 = '';
           } else { 	
           	$c = '';
           	$c2 = 'checked';
           }

           if (isset($_POST['submit'])) {
           	$v_title = $_POST['video_title'];
           	$v_desc = $_POST['video_description'];
           	$v_keywords = $_POST['video_keywords'];
           	$v_privacy = $_POST['privacy'];

           	if ($v_title == "") {
           		die("You can't leave the title field blank.");
           	} else if ($v_desc == "") {
           		die("You can't leave the description field blank.");
           	}
           	else if ($v_keywords == "") {
           		die("You can't leave the keywords field blank.");
           	}
           	else {
           		mysql_query("UPDATE videos SET video_title='$v_title', video_description='$v_desc', video_keywords='$v_keywords', privacy='$v_privacy' WHERE video_id='$videoid'");
           		die("Success");
           	}
           }
}
}
?>
<h2>Upload a Video</h2>
<form action='edit_video.php?videoid=<?php echo $videoid; ?>' method='POST' enctype='multipart/form-data'>
Video Title: <input type='text' name='video_title' value='<?php echo $video_title; ?>' /><br />
Video Description:<br />
<textarea rows='10' cols='40' name='video_description'><?php echo $video_description; ?></textarea><br />
Video Keywords: <input type='text' name='video_keywords' value='<?php echo $video_keywords; ?>' /><br />
Privacy: <input type='radio' name='privacy' <?php echo $c; ?> value='Public' /> Public &nbsp;&nbsp; <input type='radio' name='privacy' <?php echo $c2; ?> value='Private' /> Private<br />
<input type='submit' name='submit' value='Edit Video'>
</form>