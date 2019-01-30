<?php
include("dbcon.php");
if (isset($_POST['signup'])) {
    
    $sname = $_POST['sname'];
    $cname = $_POST['cname'];
    $sql4=mysqli_query($con,"select * from state where sname='$sname'");
    $row8 = mysqli_fetch_array($sql4);
     $sql1=mysqli_query($con,"INSERT INTO `state`( `sname`,`cid`,`status`) VALUES ('$sname',$cname,1)");
     $p = mysqli_query($con,"select sid from state");
      $row = mysqli_fetch_array($p);
        }
?>

     

<!DOCTYPE HTML>
<html>
<head>
<title></title>
                 
</head> 
<body>
    
               
   
    
        <center><b>ADD STATE</b><br>
      

<form  method="post" action="" onSubmit="return">
   <div>
    <label> Country</label>  
           
                 
                        <select name="cname" id="cname">
                        <option value="-1">select</option> 
                     <?php
            $q = mysqli_query($con, "SELECT cid,cname FROM country where status=1");
            

            while ($row = mysqli_fetch_array($q)) {
                echo '<option value=' . $row['cid'] . '>' . $row['cname'] . '</option>';
            }
            ?></select>

            </div>
       
               <div>
            <label>District</label>  
            
                <input type="text" id="sname" name="sname" placeholder="Enter District Name">
<input type="submit" name="signup" value="ADD" >
            
        </div>
       </center>
</form>
                                            
         <center><b>ADDED STATES</b></center>
         <form >
                                                
                                                 <?php

      $qry="select * from state";
$result=mysqli_query($con,$qry);

?>
 <?php
while($row=mysqli_fetch_array($result)){
?>
                                                <table style="margin-left: 450px;margin-top:20px;" ><form action="#" method="post">
       <tr></tr>     <tr>
          <td></td>
          <td style="font-size: 20px;font-family:Georgia;"><?php echo $row['sname'];?></td>
     
        
      </tr>
      <?php
}
?>
    </table></form>
    </div>
        
     
  
</body>
</html>
