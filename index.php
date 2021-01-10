<?php 
    if(isset($_POST["tujuan"])){

        $tujuan = $_POST["tujuan"];
        
        if($tujuan == "LOGIN"){
            $username = $_POST["username"];
            $password = $_POST["password"];
            
            /* logika sederhana admin */
            if($username == "admin" && $password == "admin"){
                echo "<h1>Selamat Datang, ".$username."!</h1>";
            }else{
                echo "<h2>Username atau Password Salah!</h2>";
            }
    
        }else{
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
    
            echo "<h1>Anda sudah terdaftar sebagai ".$username."!</h1>";
            
        }
    }   
?>