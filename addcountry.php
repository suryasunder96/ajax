<?php
include 'dbcon.php';
if(isset($_POST['submit']))
{
    $cname=$_POST['country'];
  
    $sql1=mysqli_query($con,"INSERT INTO `country`(`cname`,`status`) VALUES ('$cname',1)");
  
}
?>
<html>
    <head>
        
    </head>
    <body>
        <center><b>ADD COUNTRY</b><br>
        <form action="#" method="POST">
                     <table>
                <tr>
                    <td>Country Name</td>
                  <td> <input type="text" name="country" placeholder="Enter Country"></td>
                   </tr>
                   <tr>
                       <td><input type="submit" name="submit" value="ADD"</td>
                   </tr>
                         
    
        
             
        </table>
             </center>
    </form>
            
            <center><b>ADDED COUNTRY</b></center>
         <form >
                                                
                                                 <?php

      $qry="select * from country";
$result=mysqli_query($con,$qry);

?>
 <?php
while($row=mysqli_fetch_array($result)){
?>
        <table style="margin-left: 450px;margin-top:20px;" ><form action="#" method="post">
       <tr></tr>     <tr>
          <td></td>
          <td style="font-size: 20px;font-family:Georgia;"><?php echo $row['cname'];?></td>
     
        
      </tr>
      <?php
}
?>
    </table></form>
    </body>
</html>

