<?php

include_once 'dbcon.php';
if (isset($_POST['index'])) {
    $index = $_POST['index'];
    $q = mysqli_query($con, "SELECT did,dname FROM district where sid='" . $index . "' and status=1");
    //var_dump($q);
    
     if($q){
        $data = json_encode(mysqli_fetch_all($q));
        echo $data;
    }else{
        echo 'err';
    }

}
?>



