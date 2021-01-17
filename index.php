<?php 
    /* nama server kita */
    $servername = "localhost";

    /* nama database kita */
    $database = "db_user"; 

    /* nama user yang terdaftar pada database (default: root) */
    $username = "root";

    /* password yang terdaftar pada database (default : "") */ 
    $password = ""; 

    // membuat koneksi
    $conn = mysqli_connect($servername, $username, $password, $database);

    // mengecek koneksi
    if (!$conn) {
        die("Maaf koneksi anda gagal : " . mysqli_connect_error());
    }else{
        echo "<h1>Yes! Koneksi Berhasil..</h1>";
    }


    if(isset($_POST["tujuan"])){

        $tujuan = $_POST["tujuan"];
        
        if($tujuan == "LOGIN"){
            $username = $_POST["username"];
            $password = $_POST["password"];
            
            $query_sql = "SELECT * FROM tbl_pendaftaran 
                                   WHERE username = '$username' AND password = '$password'";
            
            $result = mysqli_query($conn, $query_sql);

            if(mysqli_num_rows($result) > 0){
                echo "<h1>Selamat Datang, ".$username."!</h1>";
            }else{
                echo "<h2>Username atau Password Salah!</h2>";
            }
    
        }else{
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            
            $query_sql = "INSERT INTO tbl_pendaftaran (username, password, email) 
                                               VALUES ('$username', '$password', '$email')";

            if (mysqli_query($conn, $query_sql)) {
                echo "
                        <h1>Username $username berhasil terdaftar</h1>
                        <a href='pages/login.php'>Kembali Login</h1>
                    ";
            } else {
                echo "Pendaftaran Gagal : " . mysqli_error($conn);
            }
        }
    }
    
    
    // tutup koneksi
    mysqli_close($conn);
?>