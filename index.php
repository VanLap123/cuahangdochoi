<!DOCTYPE html>
<html>

<head>
	<title>Lucky Shop</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<?php
 session_start();
 include_once("connection.php");
?>

	<header class="sticky-top">
		<div class="container">
			<div class="row">
				<div class="col-2 menu">
					<a>LUCKY SHOP</a>
				</div>
				<div class="col-2">

				</div>
				<div class="col-8 menu">
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="">Management</a>
							<ul class="menu_child">
								<li><a href="?page=category_management">Category</a></li>
								<li><a href="?page=product_management">Product</a></li>
                                <li><a href="?page=shop_management">Shop</a></li>
                                <li><a href="?page=supplier_management">Supplier</a></li>

							</ul>
						</li>
						<?php
						if (isset($_SESSION['us']) && $_SESSION['us'] != "") {
						?>
							<li>
								<a href="?page=update_customer">
									Account: <?php echo $_SESSION['us'] ?>
								</a>
							</li>
							<li><a href="?page=logout">Logout</a></li>
						<?php
						} else {
						?>
							<li><a href="?page=login">Login</a></li>
							<li><a href="?page=register">Register</a></li>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</header>
	
		<br>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="image/hinh1.png" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="image/hinh2.png" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="image/hinh4.png" style="width:100%">
  <div class="text"></div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<div>
         <form class="d-flex" action="?page=search" method="POST">
          <input class="form-control me-2" type="search" placeholder="Search" name="txtSearch" aria-label="Search">
          <button class="btn btn-outline-success" name="btnsearch" type="submit">Search</button>
        </form>


</div>


<?php
	if(isset($_GET['page']))
    {
        $page = $_GET['page'];
        if($page=="register")
        {
            include_once("Register.php");
        }
        elseif($page=="login")
        {
            include_once("Login.php");
        }
        elseif($page=="search")
        {
            include_once("Search.php");
        }
        elseif($page=="category_management")
        {
            include_once("Category_Management.php");
        }
        elseif($page=="product_management")
        {
            include_once("Product_Management.php");
        }
        elseif($page=="shop_management")
        {
            include_once("Shop_Management.php");
        }
        elseif($page=="add_shop")
        {
            include_once("Add_shop.php");
        }
        elseif($page=="supplier_management")
        {
            include_once("Supplier_Management.php");
        }
        elseif($page=="add_supplier")
        {
            include_once("Add_Supplier.php");
        }
        elseif($page=="add_category")
        {
            include_once("Add_Category.php");
        }
        elseif($page=="update_category")
        {
            include_once("Update_Category.php");
        }
		    elseif($page=="add_product")
        {
            include_once("Add_Product.php");
        }
        elseif($page=="update_product")
        {
            include_once("Update_Product.php");
        }
        elseif($page=="update_customer")
        {
            include_once("Update_Customer.php");
        }
        elseif($page=="logout")
        {
            include_once("Logout.php");
        }
    }
    else
        {
            include("Content.php");
        }
?>
		
	<footer>
		<div class="container">
			<div class="row footer">
				<div class="col-3">
					<h3>About us</h3>
					<ul class="menu_footer">
						<li><a>160, 30/4 Street, An Phu, Ninh Kieu, Can Tho</a></li>
						<li><a>Hotline: 0968.670.804 | 0936.600.861</a></li>
						<li><a>Telephone: 0292.730.0068</a></li>

					</ul>
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-12 copy_right">
				<a href="">No copyRight designer By Lapnvgcc200247@fpt.edu.vn</a>
			</div>
		</div>
	</footer>
</body>


</html>