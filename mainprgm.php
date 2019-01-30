<?php
include 'dbcon.php';
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $country=$_POST['country'];
    $state=$_POST['state_select'];
    $district=$_POST['district_select'];
    $res=mysqli_query($con,"insert into user(`name`,`did`,`status`)values('$name','$district',1)");
}
?>
<html>
    <head></head>
    <body>
        <form action="#" method="POST">
            <div>
                <label>Name</label>
                <input type="text" name="name" placeholder="Enter Name"/>
            </div>
              <div>
	     <label><b>Country:</b></label>
	
                                                                           
                 <select  name="country" id="country"/>
                  <option value="-1">select</option>
                           
            <?php
            $q = mysqli_query($con, "SELECT cid,cname FROM country where status=1");
            //var_dump($q);

            while ($row = mysqli_fetch_array($q)) {
                echo '<option value=' . $row['cid'] . '>' . $row['cname'] . '</option>';
            }
            ?>
              </select>
									</div>
								
            <div>
									<label><b>State:</b></label>
            
                                                                           
                                                                            <select name="state_select" id="state_select" /><option value="-1">select</option></select>
									</div>
								<div>
									<label><b>District:</b></label>
								
                                                                           
									<select  name="district_select" id="district_select"/>
                        <option value="-1">select</option></select>
                                                                        </div>
                                                                
            <div>
                <input type="submit" name="submit" value="ADD"/>
            </div>
            
        </form>
        
            <script src="assets/js/jquery-3.3.1.min.js"></script>
 
    <script>
			$(document).ready(function() {

                            $("#country").on("change", function(){
                                 $country = $('#country').val();

                                 $html = "";
                                 $.ajax({
                                     type:'post',
                                     data:{'index':$country},
                                     url:'getstate.php',
                                     success:function(data){
                                         $data = JSON.parse(data);                                         
                                         $html = '<option value="">--SELECT STATE--</option>';
                                         for(var index=0; index<$data.length; index++){
                                            $html += '<option value="'+$data[index][0]+'">' + $data[index][1]+ "</option>";
                                         }
                                         
                                         $("#state_select").html($html);
                                     }
                                 });
                            });
                            
                            
                            $("#state_select").on("change", function(){
                                 $state = $('#state_select').val();
                                 //alert($taluk);
                                 $html = "";
                                 $.ajax({
                                     type:'post',
                                     data:{'index':$state},
                                     url:'getdistrict.php',
                                     success:function(data){
                                         $data = JSON.parse(data);
                                         
                                         
                                         $html = '<option value="">--SELECT DISTRICT--</option>';
                                         for(var index=0; index<$data.length; index++){
                                            $html += '<option value="'+$data[index][0]+'">' + $data[index][1]+ "</option>";
                                         }
                                         
                                         $("#district_select").html($html);
                                     }
                                 });
                            });
                            
			});
                              
                        
                        
		</script>
    </body>
</html>
