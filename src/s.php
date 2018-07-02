<?php
$account = $_POST['sample'];
$accounts = "";
for ($i=0; $i < count($account); $i++) {
    if ($i !== (count($account)-1)) {
        $accounts .= $account[$i]."|";
    }else {
        $accounts .= $account[$i];
    }
}

 ?>
