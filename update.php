<?php


 require('config.php');
 require_once('operation.php');


 $id= $_GET['upid'];
$sql="SELECT * FROM imgreg WHERE id=$id ";

 $result=mysqli_query($conn,$sql);

 $row=mysqli_fetch_assoc($result);

 $name=$row['name'];
 $dis=$row['description'];
 $img=$row['img'];










?>





<!DOCTYPE html>
<html>
<head>



		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<title></title>
</head>
<body>




<div class="container">
		<h3 class="text-center mt-5 mb-5">Update product</h3>
             

            <div class="container d-flex justify-content-center">
             	<form method="post" action="display.php"  class="w-50" enctype="multipart/form-data">

             
         
           <?php  inputfield2("Enter Product Name","name","$name","text")  ?>
           <?php  inputfield2("Enter description","description","$dis","text")  ?>
           <?php  inputfield2("","file","","file")  ?>

           <button  class="btn btn-success my-5 d-flex justify-content-center w-100"  name="" type="#" id="sub" >Update</button>


          	</form>
             	

             </div>
	</div>


</body>
</html>


<?php 
  

if(isset($_POST['#sub'])){

    $name=$_POST['name'];
	$discip=$_POST['description'];
	$img=$_FILES['file']['name'];
	$tmp_dir = $_FILES['file']['tmp_name'];
	$imgSize = $_FILES['file']['size'];

	$upload_dir = 'img/';

          
$imgExt = strtolower(pathinfo($img, PATHINFO_EXTENSION));

	$valid_extensions = array('jpeg','jpg','png','gif');

	$userpic = rand(1000,1000000).".".$imgExt;




    if(in_array($imgExt, $valid_extensions)){


               if($imgSize < 5000000){

                         if(isset($_GET['upid'])){
                           $id= $_GET['upid'];


                           $sql="UPDATE `imgreg` SET name='$name', description='$discip',img='$userpic' WHERE id=$id ";

                           $result=mysqli_query($conn,$sql);
        if($result){
        	echo "Sucess";
        }
        else{
        	die(mysqli_error($con));
        	echo "failed";
        }

                            }


               }
               else{
               	echo "TO large";
               }


    }

    else{
    	echo "Extenting does't match";
    }










    }

?>