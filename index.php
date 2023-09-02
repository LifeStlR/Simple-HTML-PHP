<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location:Login.html");
	}
	require_once "Connection.php";
?>
 Welcome <?php echo $_SESSION ["username"]; ?><br><br>
<html>
<table class="table table-bordered">
<tr bgcolor="blue">
                <th>No</th>
                <th>Judul</th>
                <th>Content</th>
            </tr>

                <?php

                include "Connection.php";
                $no=1;
                $query= mysqli_query($mysqli, "Select * from articles");
                while ($data = mysqli_fetch_Array($query)) {
                    echo "
                    <tr>
                    <td>$no</td>
                    <td>$data[Title]</td>
                    <td>$data[Content]</td>
                    </tr>";

                    $no++;
                }

                ?>
		</table>
<title>Home</title>
<a href="myarticles.php"><button>My Article</button></a>
<?php
if($_SESSION["username"]) {
?>
<br><br><a href="logout.php" tite="Logout">Logout.
<?php
}else echo "<h1>Please login first .</h1>";
?>
</html>