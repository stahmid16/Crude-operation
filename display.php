<?php
require('config.php');

if(isset($_POST['submit'])){
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

        	move_uploaded_file($tmp_dir, $upload_dir.$userpic);
        	 $sql= "INSERT INTO  `imgreg`  (name,description,img ) VALUES ('$name','$discip','$userpic')";

        $result=mysqli_query($conn,$sql);
        if($result){
        	echo "Sucess";
        }
        else{
        	die(mysqli_error($con));
        	echo "failed";
        }



        }  
        else{
        	echo "To large";
        }


	}


         
        // echo "<br>";
	//print_r($img);
	  // echo "<br>";
	//print_r($tmp_dir);
	 //echo "<br>";
	//print_r($imgSize);
      //echo "<br>";
	//print_r($imgExt);


}
	/* echo $name;
	echo $discip;
	echo "<br>";
       print_r($img);
       echo "<br>";
       $imgfilename=$img['name'];
        print_r($imgfilename);
         echo "<br>";
        $imgtempname=$img['tmp_name'];
        print_r($imgtempname);
         echo "<br>";
        $imgerrorname=$img['error'];
        print_r($imgerrorname);

        $imgfile_separate=explode('.',$imgfilename);

            echo "<br>";
       
        print_r($imgfile_separate);

        $file_extension=strtolower($imgfile_separate[1]);
          echo "<br>";
       
        print_r($file_extension);

        $extension=array('jpeg,jpg,png');
        if(in_array($file_extension,$extension )){
        	$upload_img='img/'.$imgfilename;
        	move_uploaded_file($imgtempname, $upload_img);

        	

        $sql= "INSERT INTO  `imgreg`  (name,description,img ) VALUES ('$name','$discip','$upload_img')";

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
*/

?>




<!DOCTYPE html>
<html>
<head>

			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<title></title>
</head>
<body>
	<h1></h1>
<div class="container">
	<table class="table">
  <thead>
  	
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Name</th>
      <th scope="col">Discription</th>
      <th scope="col">Image</th>
      <th scope="col">Operation</th>
    </tr>
   
  </thead>
  <tbody>

  	<?php
  
  $sql="SELECT * FROM imgreg  ";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
     $id=$row['id'];
   $name=$row['name'];
   $dis=$row['description'];
   $img=$row['img'];
   

    

    

  	?>
    <tr>
      <th scope="row"><?php echo $id ?></th>
      <td><?php echo $name ?></td>
      <td><?php echo $dis ?> </td>
      <td><img  src=" img/<?php echo $img ?>" width="150px" height="160px" > </td>

        <td> 
           <a href="update.php?upid=<?php echo $id ?>">
         

         <button type="button" class="btn btn-warning">EIDITE</button>
         
              </a>

             <a href="delete.php?delid=<?php echo $id; ?>>">
         <button type="button" class="btn btn-danger">DELETE</button>
     </a>


         </td>
    </tr>
     <?php
         }
    ?>
    
   
  </tbody>
</table>
</div>
</body>
</html>