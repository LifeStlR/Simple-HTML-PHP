<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location:Login.html");
	}
?>
<html>
	<head>
		<style>
				.button2
				 {background-color: #f44336;
				}
		</style>
	</head>
<title>Create Articles</title>
<form action="p_data.php" name="readfile" method="post" enctype="multipart/form-data">
		<table cellpadding="10" align="center" rules="all" frame="box">
			<tr>
				<td colspan="2">
					<h3>
						 upload data
					</h3>
				</td>
			</tr>
			<tr>
				<td>
					<label for="txt-file">Open File(*.txt):</label>
				</td>
				<td>
					<input type="file" name="file1"><!--file to read-->
				</td>
			</tr>
			
			<tr>
				<td colspan="2" align="right">
					<input type="submit" name="read" value="Insert"><!--button to submit the form to read data from the file-->
				</td>
			</tr>
		</table>
		</form>
</html>