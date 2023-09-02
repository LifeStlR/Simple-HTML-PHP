<?php

	if(isset($_POST['read'])){//check if button have been click or not
		// mysql_connect('localhost','root','') or die('could not connect to database'.mysql_error());//connection to database server
		// //mysql_connect(servername,username,password)
		// mysql_select_db('coba');//select database
        $dsn = 'mysql:dbname=session;host=127.0.0.1';
        $user = 'root';
        $password = '';
         
        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
		//mysql_select_db(databasename);
		// $terminated=$_POST['deli'];//get the value of terminated character from a form with post method
		$file_type=$_FILES['file1']['type'];//get file type of selected file to read
		$allow_type=array('text/plain');//allow only file that have extesion with .txt
		$fieldall="";
		if(in_array($file_type,$allow_type)){//check if selected file type is match to the allow file type we have defined
		  move_uploaded_file($_FILES['file1']['tmp_name'],"files/".$_FILES['file1']['name']);//move file to specifice directory to be read
		  $file=fopen("files/".$_FILES['file1']['name'],"r") or die ("Unable to open file!");//open file to read
          $file_array = file('files/'.$_FILES['file1']['name']); # read file into array
          $count = count($file_array);

         while(!feof($file))
        {
            $line= fgets($file);
            list($name,$lname,$birth)=explode(';',$line);
            
            $sth = $dbh->prepare('INSERT INTO articles values(NULL,?,?,?)');
            $sth->bindValue(1,$name,PDO::PARAM_STR);
            $sth->bindValue(2,$lname,PDO::PARAM_STR);
            $sth->bindValue(3,$birth,PDO::PARAM_STR);
            $sth->execute();   

            if($sth){
                header("Location: index.php");
                echo "Data berhasil masuk";
            }
            else{
                header("Location: myarticles.php");
            }
        }
	}
}

    /* Connect to a MySQL database using driver invocation */
?>