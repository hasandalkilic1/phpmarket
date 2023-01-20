<?php
session_start();

require_once('../inc/config.php');

$fetchD=$db->prepare("SELECT category_name FROM categories");
$fetchD->execute();
$categories=array();
while($row=$fetchD->fetch()){
	$categories[]=$row['category_name'];
}

if(isset($_SESSION['id'])&& isset($_SESSION['user_name'])){
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>HOME</title>

	</head>

	<form method="POST" action="home2.php">
		<body style="text-align: center;">

		<h1>Hello,<?php echo $_SESSION['user_name'];?></h1>

		<h3>Select the category.</h3>

		<select name="Category">
			<?php

    foreach($categories as $select ) {

        echo '<option value="' . $select . '">' . $select . '</option>';

    }

    ?>
		</select>
		<br><br>

		<input type="submit" name="Select">
		<br><br>
		
		<a href="logout.php">Logout</a>
	
	</body>
	</form>
	
	</html>
	<?php
}
else
{
	header("Location: index.php");
	exit();
}
?>

<?php
$uname=$_SESSION['user_name'];
$sql = "SELECT * FROM users WHERE user_name='$uname'";

$result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['user_name'] === $uname && $row['is_admin']==='1') 
            {?>

            	<!DOCTYPE html>
				<html>
				<head>
					<title>Add</title>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1">
				</head>
				<body>
					<form method="POST" action="home.php" style="text-align: center;">
					<h2>Add Category</h2>

					<label> Category Name:</label>
					<input name="category_name" placeholder="Category Name">
					<br><br>

					<?php
					if(isset($_POST['add_category']))
					{

						$category_name=$_POST['category_name'];
						$sqlquery="INSERT INTO categories(category_name) VALUES ('$category_name')";
						$conn->query($sqlquery);
					
					}
					?>

					<input type="submit" name="add_category" value="Add Category" >
					<br><br>




					<label> Product Name:</label>
					<input name="product_name" placeholder="Product Name">
					<br><br>
					<label> Short Description:</label>
					<input name="short_description" placeholder="Short Description">
					<br><br>
					<label> Price:</label>
					<input name="price" placeholder="Price">
					<br><br>
					<label> Product Image:</label>
					<input type="file" class="form-control" name="file" />
					<br><br>
					<label> Category:</label>
					<select name="product_category">
					<?php

    					foreach($categories as $select ) {

        					echo '<option value="' . $select . '">' . $select . '</option>';

    					}

    				?>
    				</select>

    				<br><br>

    				<?php


    				if(isset($_POST['product_name'])AND isset($_POST['short_description'])AND isset($_POST['price'])AND isset($_POST['product_category'])){

    					$product_name=$_POST['product_name'];
    					$short_description=$_POST['short_description'];
    					$price=$_POST['price'];
    					$product_category=$_POST['product_category'];

    					$sqlquery1="INSERT INTO products(product_name,short_description,price,is_featured,is_active,category) VALUES ('$product_name','$short_description','$price',0,1,'$product_category')";

    					if(isset($_POST['add_product'])){

    						$conn->query($sqlquery1);

    					}


    				}

    				if(isset($_FILES['file']['name'])){

    					$product_img=$_FILES['file']['name'];

    					$query=mysql_query("SELECT id FROM products WHERE product_name='$product_name'");
    					$product_id=mysql_fetch_array($query);

    					$sqlquery2="INSERT INTO product_images(product_id,img,is_featured) VALUES ('$product_id','$product_img',1)";

    					if(isset($_POST['add_product'])){

    						$conn->query($sqlquery2);

    					}



    				}
    				else{

    					if(isset($_POST['product_name'])AND isset($_POST['short_description'])AND isset($_POST['price'])AND isset($_POST['product_category'])){

    						$sql="SELECT id FROM products WHERE product_name='$product_name'";
    						$query=mysqli_query($conn,$sql);
    						$row=mysqli_fetch_row($query);
    						$product_id=$row[0];
    						



    						$sqlquery2="INSERT INTO product_images(product_id,is_featured) VALUES ('$product_id',1)";

    						if(isset($_POST['add_product'])){

    							$conn->query($sqlquery2);

    						}

    					}


    					

    				}

					?>




					<input type="submit" name="add_product" value="Add Product">

					


				</form>
 					

				</body>
				</html>


				

				

<?php
            }
        }
?>