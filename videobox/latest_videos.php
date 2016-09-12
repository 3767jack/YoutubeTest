<?php
include ( './includes/header.php' );
?>
<br /><br /><br />
<?php
$get_videos = mysql_query("SELECT * FROM videos ORDER by date_uploaded DESC");
if (mysql_num_rows($get_videos) == 0) {
	echo "There are no videos yet!";
}
else {
	while ($row = mysql_fetch_assoc($get_videos)) {
		$id = $row['id'];
		$video_title = $row['video_title'];
		$video_description = $row['video_description'];
		$video_keywords = $row['video_keywords'];
		$uploaded_by = $row['uploaded_by'];
		$privacy = $row['privacy'];
		$views = $row['views'];
		$video_id = $row['video_id'];
		$thumbnail = $row['thumbnail'];
		$deleted = $row['deleted'];
		?>
		<div class="myvideosdiv" style="max-height: 90px;">
			<div style="float: left;">
				<a href="<?php echo $uploaded_by; ?>"><img src="data/users/videos/thumbnails/<?php echo $thumbnail; ?>" width="150" height="80"/></a>
			</div>
			<h2><?php echo $video_title; ?></h2>
			<div class="myvideosdiv_desc"><?php echo $video_description; ?></div><br />
			Video Views: <strong><?php echo $views; ?></strong>
		</div>

		<?php
		
	}
}
?>