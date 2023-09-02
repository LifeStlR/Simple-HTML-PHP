<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location:Login.html");
	}


    require_once "Connection.php";
    
    $query = "select * from articles where CreatorUsername = '".$_SESSION['username']."'";
    $result = $mysqli->query($query);
    while($row= $result->fetch_assoc()){
    	echo('<ul>');
    	echo('<li>');
    	echo($row["Title"]);
    	echo('</li>');
    	echo('<li>');
    	echo($row["Content"]);
    	echo('</li>');
    	echo('</ul>');
    }

?>

<html>
	<head>
		<style>
			.button3 {background-color: #f44336;}
		</style>
	</head>
<title>My Articles</title>
<a href="CreateArticles.php"><button>Create Article</button></a><br><br>
<a href="index.php"><button class="button3">Back</button></a>
</html>