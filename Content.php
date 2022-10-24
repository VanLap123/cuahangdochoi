  <?php
	include_once("connection.php");

	?>
  <style>
  	.col-2th {
  		flex: 0 0 20%;
  		max-width: 20%;
  		margin: 23px;
  	}

  	.card {
  		margin-bottom: 50px;
  		margin-left: 100px;
  	}
  </style>
   

  <div class="row">
  	<?php
		// 	include_once("database.php");
		$result = pg_query($conn, "SELECT * FROM product");

		while ($row = pg_fetch_array($result)) {
		?>

  		<div class="col-2th">
  			<div class="card">
  				<div>
  					<img src="image/<?php echo $row['proimage'] ?>" width="260" height="220" alt="">
  				</div>

  				<div>
  					<h3> <?php echo  $row['productname'] ?></h3>
  				</div>

  				<div>
  					<h3 class="mb-0 font-weight-semibold">$<?php echo  $row['saleprice'] ?></h3>
  				</div>
  			</div>
  		</div>


  	<?php
		}
		?>
  </div>