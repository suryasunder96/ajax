<?php

 
	include("dbcon.php");


if (isset($_POST['signup'])) {
    
    $dname = $_POST['dname'];
    $sname = $_POST['sname'];
 $sql4=mysqli_query($con,"select * from district where dname='$dname'");
  $sql1=mysqli_query($con,"INSERT INTO `district`( `dname`,`sid`,`status`) VALUES ('$dname',$sname,1)");
   $p = mysqli_query($con,"select did from district");
   $row = mysqli_fetch_array($p);
    
        }
        
  

?>

<html>
<head>
<title></title>
                 
</head> 
<body>
    
               
   
    <div>
        <center><b>ADD DISTRICT</b></center><br>
      
    <center>

<form  method="post" action="" onSubmit="return">
    <table>
   <div>
       
               <label>State</label>
           
                 
                        <select name="sname" id="sname">
                        <option value="-1">select</option> 
                     <?php
            $q = mysqli_query($con, "SELECT sid,sname FROM state where status=1");
            

            while ($row = mysqli_fetch_array($q)) {
                echo '<option value=' . $row['sid'] . '>' . $row['sname'] . '</option>';
            }
            ?></select>

           
        </div>
               <div>
            <label>District</label>  
            
                <input type="text" id="dname" name="dname"  placeholder="Enter State Name">
<input type="submit" name="signup" value="ADD" >
            </div>
        
    </table>
</form></center>
                                            
         <center><b>ADDED DISTRICT</b></center>
         <form >
                                                
                                                 <?php

      $qry="select * from district";
$result=mysqli_query($con,$qry);

?>
 <?php
while($row=mysqli_fetch_array($result)){
?>
        <table style="margin-left: 450px;margin-top:20px;" ><form action="#" method="post">
       <tr></tr>     <tr>
          <td></td>
          <td style="font-size: 20px;font-family:Georgia;"><?php echo $row['dname'];?></td>
     
        
      </tr>
      <?php
}
?>
    </table></form>
    </div>
        
     
  
</body>
</html>
