<?php
    include 'session.php';
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
<<<<<<< HEAD
<<<<<<< HEAD
                echo "Hi $user";
                $current=$_SERVER['REMOTE_USER'];
                echo "User is= $current";
=======
                echo "<script>window.location.replace('/profile.php');</script>";
>>>>>>> ac0331919868ba5d150dee00c38a55880448d57e
=======
                $_SESSION['user'] = $user;
                header('location:/');
>>>>>>> 317c3d23d8cd98daecb73db30a2d6712930604d9
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