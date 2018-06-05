<?php
    include "db.php";
    $connect = Connect();

    if( isset($_POST["user"]) && isset($_POST["password"])){
        $user = mysqli_real_escape_string($connect, $_POST["user"]);
        $password = mysqli_real_escape_string($connect, $_POST["password"]);
    
        $stmt = "SELECT username, password FROM user WHERE username = '$user' or email = '$user' ";
        $results = mysqli_query($connect, $stmt);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $count = mysqli_num_rows($results);
        $passwordVerify = $row['password'];
        if ($count == 1) {
            if (password_verify($password, $passwordVerify)) {
                echo "<script>alert('Hi $user');
                    window.location.replace('/');
                        </script>";
            } else
                echo 
                    "<script>
                        alert('Invalid Password');
                        window.history.back();
                    </script>";
            
    } else
        echo 
            "<script>
                alert('User not registered')
                window.history.back();
            </script>";
}
	 
?>