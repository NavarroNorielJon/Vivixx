<?php
    include '../../utilities/db.php';
    $connect = Connect();

    $user_id = $_POST["userid2_5"];
    $sql = "SELECT count(user_id) as 'total' FROM user_offspring where user_id='$user_id';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $total = $row['total'];
    $child_name = $_POST['add_child_name'];
    $child_birth = $_POST['add_child_birth'];

    for ($i=0; $i < count($child_name) ; $i++) {
        $c = ++$total;
        if ($child_name[$i] === "" && $child_birth[$i] === "") {
            continue;
        } else{
            $child_name[$i] = ucwords($child_name[$i]);
            $insert_stmt = "INSERT INTO `user_offspring` (`n_id`,`child_name`,`child_birth_date`,`user_id`) VALUES ('$c','$child_name[$i]','$child_birth[$i]','$user_id');";
            if ($connect->query($insert_stmt) === true) {
                echo "Successfully added";
            } else {
                print_r($connect->error);
            }
        }
    }
?>
