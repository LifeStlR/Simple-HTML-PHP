<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location:CreateArticles.php");
	}
?>
<html>
<textarea> Halo </textarea>
</html>