<?php


if(isset($_POST['func'])){
    if($_POST['func']=="Register"){
        register();
    }
    if($_POST['func']=="Login"){
        login();
    }
    if($_POST['func']=="Articles"){
        createArticles();
    }else{
        header("Location: index.php");
    }
}

function login(){
    require_once "Connection.php";
	$username = $_POST['username'];
	$password = md5($_POST['password']);
    if(!empty($username)&&!empty($password)){
        $query = "select Username, Role from user where Username='$username' and Password='$password'";
        $result = $mysqli->query($query);
        if($result -> num_rows>0){
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['username'] = $row['Username'];
            $_SESSION['role'] = $row['Role'];
            header("Location: index.php");
        }else{
            header("Location: Login.html");
        }
    }else{
        header("Location: Login.html");
    }
}

function register(){
    require_once "Connection.php";
	$username = $_POST['username'];
	$password = md5($_POST['password']);
    if(!empty($username)&&!empty($password)){
        $query = "select Username from user where Username='$username'";
        $result = $mysqli->query($query);
        if($result -> num_rows>0){
            header("Location: Register.html");
        }
        else{
            $queryregister = "INSERT INTO `user`(`ID`, `Username`, `Password`, `Role`) VALUES (null, '$username', '$password', 2)";
            $result = $mysqli->query($queryregister);
            if($result){
                header("Location: index.html");
            }
            else{
                header("Location: Register.html");
            }
        }
    }
    else{
        header("Location: Register.html");
    }
}


function createArticles(){
    require_once "Connection.php";
    $username = $_POST['username'];
    $title = $_POST['title'];
    // $target_dir = "uploads/";
    // $content = $target_dir . basename($_FILES["contents"]['name']);
    // $uploadOk = 1;
    // $txtFileType = pathinfo($content,PATHINFO_EXTENSION);

     if(isset($_POST["submit"])) {
        // if (file_exists($content)) {
        //     echo "Maaf, File sudah ada";
        //     $uploadOk = 0;

         $content = $_FILES['contents']['name'];

        //  move_uploaded_file($_FILES["contents"]["tmp_name"], $target_dir.$content);
        $tmpFile = $_FILES['contents']['tmp_name'];
        move_uploaded_file($tmpFile, $target_dir.$content);
        
        // if($txtFileType != "text/plain") {
        //     echo "Maaf, hanya boleh memasukkan file .txt";
        //     $uploadOk = 0;
        // }
        // if ($uploadOk == 0) {
        //     echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
        //   } else {
        //     if (move_uploaded_file($_FILES["contents"]["tmp_name"], $content)) {
        //       echo "The file ". htmlspecialchars( basename( $_FILES["contents"]['name'])). " Berhasil Upload.";
        //     } else {
        //       echo "Maaf, terjadi error dalam mengupload file";
        //     }
        
    if(!empty($title)&&!empty($content)){
        // $query = "INSERT INTO articles VALUES (null,'$title','$content','$username');";
        $query = "INSERT INTO articles set title = '$title', content = '$content'";
        $result = mysqli_query($mysqli, $query);
        if($result){
            header("Location: index.php");
            echo "Data berhasil masuk";
        }
        else{
            header("Location: myarticles.php");
        }
    }
    else{
        header("Location: myarticles.php");
    }
}
}

?>