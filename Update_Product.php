<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>
    <?php
	include_once("connection.php");
	
	function bind_Category_List($conn,$selectValue)
	{
		$sqlstring = "SELECT CategoryID, CategoryName from Category";
		$result = pg_query($conn, $sqlstring);
		echo "<select name='CategoryList' class='form-control'>
					<option value='0'>Choose category</option>";
		while ($row = pg_fetch_array($result)) {
		    if ($row['CategoryID'] == $selectValue) {
				echo "<option value='" . $row['CategoryID'] . "' selected>" . $row['CategoryName'] . "</option>";
			} else {
				echo "<option value='" . $row['CategoryID'] . "'>" . $row['CategoryName'] . "</option>";
			}
		}
		
		echo "</select>";
	}

	function bind_Shop_List($conn1,$selectValue)
	{
		$sqlstring = "SELECT ShopID, ShopName from Shop";
		$result = pg_query($conn1, $sqlstring);
		echo "<select name='ShopList' class='form-control'>
					<option value='0'>Choose shop</option>";
		while ($row = pg_fetch_array($result)) {
			if ($row['ShopID'] == $selectValue) {
				echo "<option value='" . $row['ShopID'] . "' selected>" . $row['ShopName'] . "</option>";
			} else {
				echo "<option value='" . $row['ShopID'] . "'>" . $row['ShopName'] . "</option>";
			}
		
		}
		echo "</select>";
	}

	function bind_Supplier_List($conn2,$selectValue)
	{
		$sqlstring = "SELECT SupplierID, SupplierName from Supplier";
		$result = pg_query($conn2, $sqlstring);
		echo "<select name='SupplierList' class='form-control'>
					<option value='0'>Choose supplier</option>";
		while ($row = pg_fetch_array($result)) {
			if ($row['SupplierID'] == $selectValue) {
				echo "<option value='" . $row['SupplierID'] . "' selected>" . $row['SupplierName'] . "</option>";
			} else {
				echo "<option value='" . $row['SupplierID'] . "'>" . $row['SupplierName'] . "</option>";
			}
		}
		
		echo "</select>";
	}


	if (isset($_GET["id"])) {
		$id = $_GET["id"];
		$sqlstring = "SELECT ProductID, ShopID, SupplierID, CategoryID, ProductName, ImportPrice, SalePrice, Descriptions,Pro_image, Quantity
						FROM Product WHERE ProductID = '$id'";
		$result = pg_query($conn, $sqlstring);
		$row = pg_fetch_array($result);

		$category = $row["ShopID"];
		$category = $row["SupplierID"];
		$category = $row["CategoryID"];
		$proname = $row["ProductName"];
		$importprice = $row["ImportPrice"];
		$saleprice = $row["SalePrice"];
		$detail = $row["Descriptions"];
		$pic = $row["Pro_image"];
		$qty = $row["Quantity"];
		
	?>
			<div class="container">
    	<h2>Adding new Product</h2>

    	<form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
    		<div class="form-group">
    			<label for="txtTen" class="col-sm-2 control-label">Product ID(*): </label>
    			<div class="col-sm-10">
    				<input type="text" name="txtID" id="txtID" class="form-control" placeholder="Product ID" value='' />
    			</div>
    		</div>
			<div class="form-group">
    			<label for="" class="col-sm-2 control-label">Shop ID(*): </label>
    			<div class="col-sm-10">
    				<?php
					bind_Shop_List($conn1);
					?>
    			</div>
    		</div>
			<div class="form-group">
    			<label for="" class="col-sm-2 control-label">Supplier ID(*): </label>
    			<div class="col-sm-10">
    				<?php
					bind_Supplier_List($conn2);
					?>
    			</div>
    		</div>
			<div class="form-group">
    			<label for="" class="col-sm-2 control-label">Product category(*): </label>
    			<div class="col-sm-10">
    				<?php
					bind_Category_List($conn);
					?>
    			</div>
    		</div>
    		<div class="form-group">
    			<label for="txtTen" class="col-sm-2 control-label">Product Name(*): </label>
    			<div class="col-sm-10">
    				<input type="text" name="txtName" id="txtName" class="form-control" placeholder="Product Name" value='' />
    			</div>
    		</div>
    		

    		<div class="form-group">
    			<label for="lblGia" class="col-sm-2 control-label">ImportPrice(*): </label>
    			<div class="col-sm-10">
    				<input type="text" name="txtImportPrice" id="txtImportPrice" class="form-control" placeholder="Price" value='' />
    			</div>
    		</div>
			<div class="form-group">
    			<label for="lblGia" class="col-sm-2 control-label">SalePrice(*): </label>
    			<div class="col-sm-10">
    				<input type="text" name="txtSalePrice" id="txtSalePrice" class="form-control" placeholder="Price" value='' />
    			</div>
    		</div>

    		<div class="form-group">
    			<label for="lblDetail" class="col-sm-2 control-label">Detail description(*): </label>
    			<div class="col-sm-10">
    				<textarea name="txtDetail" rows="4" class="ckeditor"></textarea>
    				<script language="javascript">
    					CKEDITOR.replace('txtDetail', {
    						skin: 'kama',
    						extraPlugins: 'uicolor',
    						uiColor: '#eeeeee',
    						toolbar: [
    							['Source', 'DocProps', '-', 'Save', 'NewPage', 'Preview', '-', 'Templates'],
    							['Cut', 'Copy', 'Paste', 'PasteText', 'PasteWord', '-', 'Print', 'SpellCheck'],
    							['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
    							['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
    							['Bold', 'Italic', 'Underline', 'StrikeThrough', '-', 'Subscript', 'Superscript'],
    							['OrderedList', 'UnorderedList', '-', 'Outdent', 'Indent', 'Blockquote'],
    							['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyFull'],
    							['Link', 'Unlink', 'Anchor', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'],
    							['Image', 'Flash', 'Table', 'Rule', 'Smiley', 'SpecialChar'],
    							['Style', 'FontFormat', 'FontName', 'FontSize'],
    							['TextColor', 'BGColor'],
    							['UIColor']
    						]
    					});
    				</script>

    			</div>
    		</div>

    		<div class="form-group">
    			<label for="sphinhanh" class="col-sm-2 control-label">Image(*): </label>
    			<div class="col-sm-10">
    				<input type="file" name="txtImage" id="txtImage" class="form-control" value="" />
    			</div>
    		</div>
			<div class="form-group">
    			<label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*): </label>
    			<div class="col-sm-10">
    				<input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value="" />
    			</div>
    		</div>

    		<div class="form-group">
    			<div class="col-sm-offset-2 col-sm-10">
    				<input type="submit" class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new" />
    				<input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='Product_Management.php'" />

    			</div>
    		</div>
			
    	</form>
    </div

    <?php
	} else {
		echo '<meta http-equiv="refresh" content = "0; URL=?page=product_management"/>';
	}
	?>
    <?php
	if (isset($_POST["btnUpdate"])) {
		$id = $_POST["txtID"];
		$proname = $_POST["txtName"];
		$short = $_POST["txtShort"];
		$detail = $_POST["txtDetail"];
		$price = $_POST["txtPrice"];
		$qty = $_POST["txtQty"];
		$pic = $_FILES["txtImage"];
		$category = $_POST["CategoryList"];
		$err = "";

		if (trim($id) == "") {
			$err .= "<li>Enter product ID, please</li>";
		}
		if (trim($proname) == "") {
			$err .= "<li>Enter product Name, please</li>";
		}
		if ($category == "0") {
			$err .= "<li>Choose product category, please</li>";
		}
		if (!is_numeric($price)) {
			$err .= "<li>Product price must be number</li>";
		}
		if (!is_numeric($qty)) {
			$err .= "<li>Product quantity must be number</li>";
		} else {
			if ($pic['name'] != "") {
				if ($pic["type"] == "image/jpg" || $pic["type"] == "image/jpeg" || $pic["type"] == "image/png" || $pic["type"] == "image/gif") {
					if ($pic["size"] < 614400) {
						$sq = "SELECT * FROM product WHERE Product_ID = '$id' or Product_Name = '$proname'";
						$result = pg_query($conn, $sq);
						if (pg_num_rows($result) == 0) {
							copy($pic['tmp_name'], "img/" . $pic['name']);
							$filePic = $pic['name'];
							$sqlstring = "UPDATE product SET 
							Product_Name ='$proname', Price='$price', SmallDesc='$short', 
							DetailDesc='$detail', Pro_qty='$qty',
							Pro_image='$filePic', Cat_ID='$category',
							ProDate='".date('Y-m-d H:i:s')."' WHERE Product_ID='$id'";
							pg_query($conn, $sqlstring);
							echo '<meta http-equiv="refresh" content = "0; URL=?page=product_management"/>';
						} else {
							echo "<li>Duplicate category ID or Name</li>";
						}
					} else {
						echo "Size of image too big";
					}
				} else {
					echo "Image format is not correct";
				}
			} else {
				$sq = "SELECT * FROM product WHERE Product_ID != '$id' and Product_Name = '$proname'";
				$result = pg_query($conn, $sq);
				if (pg_num_rows($result) == 0) {
					// copy($pic['tmp_name'], "img/" . $pic['name']);
					$filePic = $pic['name'];
					$sqlstring = "UPDATE product SET Product_Name ='$proname', 
					Price='$price', SmallDesc='$short', DetailDesc='$detail', 
					Pro_qty='$qty', Cat_ID='$category',
					ProDate='".date('Y-m-d H:i:s')."' WHERE Product_ID='$id'";
					pg_query($conn, $sqlstring);
					echo '<meta http-equiv="refresh" content="0;URL=?page=product_management"/>';
				} else {
					echo "<li>Duplicate category ID or Name</li>";
				}
			}
		}
	}
	?>