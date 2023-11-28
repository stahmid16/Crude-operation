
<?php

require_once('operation.php');
require('config.php')
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
		<h3 class="text-center mt-5 mb-5">Enter product</h3>
             

            <div class="container d-flex justify-content-center">
             	<form method="post" action="display.php"  class="w-50" enctype="multipart/form-data">

             
         
           <?php  inputfield("Enter Product Name","name","","text")  ?>
           <?php  inputfield("Enter description","description","","text")  ?>
           <?php  inputfield("","file","","file")  ?>

           <button  class="btn btn-success my-5 d-flex justify-content-center w-100" name="submit" type="submit">Submit</button>


          	</form>
             	

             </div>
	</div>


</body>
</html>