<script>
    function invalidUser() {
        alert("Invalid User");
        window.location.href = "/"
    }
    
    function invalidPass() {
        alert("Invalid Password");
        window.location.href = "/"
    }
</script>
<?php
    include "db.php";
    $connect = Connect();

    if( isset($_POST["user"]) && isset($_POST["password"])){
        $user = mysqli_real_escape_string($connect, $_POST["user"]);
        $password = mysqli_real_escape_string($connect, $_POST["password"]);
    
        $stmt = "SELECT username, password FROM user WHERE username = '$user'";
        $results = mysqli_query($connect, $stmt);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $count = mysqli_num_rows($results);
    
        $stmt2 = "SELECT email, password FROM user WHERE email = '$user'";
        $results2 = mysqli_query($connect, $stmt2);
        $row2 = mysqli_fetch_array($results2, MYSQLI_ASSOC);
        $count2 = mysqli_num_rows($results2);
        $passwordCheck = $row['password'];
        
        if ($count == 1 or $count2 == 1) {
            if ($password != $passwordCheck) {
                echo "<script>invalidPass()</script>";
            } else
            echo "Hi $user";
    } else
        echo "<script>invalidUser()</script>";
}
	 
?>