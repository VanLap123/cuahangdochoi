     <!-- Bootstrap --> 
     <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	    
	<?php
	
	include_once("connection.php");
	if(isset($_POST["btnAdd"]))
	{
		$id = $_POST["txtID"];
		$name = $_POST["txtName"];
        $address =$_POST["txtAddress"];
        $email =$_POST["txtEmail"];
        $phone =$_POST["txtPhone"];

    
	
		$err="";
		if($id=="")
		{
			$err.="<li>Enter shop ID, please</li>";
		}
		if($name=="")
		{
			$err.="<li>Enter shop Name, please</li>";
		}
        if($address=="")
		{
			$err.="<li>Enter address, please</li>";
		}
        if($email=="")
		{
			$err.="<li>Enter email, please</li>";
		}
        if($phone=="")
		{
			$err.="<li>Enter phone number, please</li>";
		}
		if($err!="")
		{
			echo "<ul>$err</ul>";
		}
		else{
			$sq="Select * from shop where shopid='$id'";
			$result = pg_query($conn,$sq);
			if(pg_num_rows($result)==0)
			{
				pg_query($conn,"INSERT INTO shop (shopid, shopname, shopaddress, shopemail, shopphonenumber) VALUES ('$id', '$name','$address','$email','$phone')");
				echo '<meta http-equiv="refresh" content="0;URL=?page=shop_management"/>';
			}
			else
			{
				echo"<li>Duplicaye shop ID</li>";
			}
		}
	}
	
	?>

<div class="container">
	<h2>Adding Shop</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Shop ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Shop ID" value='<?php echo isset($_POST["txtID"])?($_POST["txtID"]):"";?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Shop Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Shop Name" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
							</div>
				</div>
                <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Address(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtAddress" id="txtAddress" class="form-control" placeholder="Address" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
							</div>
				</div>
                <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Email(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
							</div>
				</div>
                <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Phone number(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtPhone" id="txtPhone" class="form-control" placeholder="Phone Number" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
							</div>
				</div>
                    
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='Shop_Management.php'" />
                              	
						</div>
					</div>
				</form>
	</div>