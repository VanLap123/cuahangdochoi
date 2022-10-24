<?php 
        if(isset($_SESSION["admin"]) && $_SESSION["admin"]!=1)
        {
            echo "<script>alert('You are not administrator')</sript>";
            echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
        }
        else{
    ?>
<!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script>
        function deleteConfirm() {
            if (confirm("Are you sure to delete!")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <?php
    include_once("connection.php");
    if (isset($_GET["function"]) == "del") {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            //$result = pg_query($conn,"SELECT proimage from product where productid='$id'");
            //$image = pg_fetch_array($result);
            //$del = $image["proimage"];
            //unlink("image/$del");
            pg_query($conn, "delete from product where productid='$id'");
          
            
        }
    }
    ?>
        <form name="frm" method="post" action="">
        <h1>Product Management</h1>
        <p> 
            <a href="?page=add_product">
        	<img src="image/add.png" alt="" width="16" height="16" border="0" /> Add new
            </a>
        </p>
        <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No</strong></th>
                    <th><strong>Product ID</strong></th>
                    <th><strong>Shop ID</strong></th>
                    <th><strong>Supplier ID</strong></th>
                    <th><strong>Category ID</strong></th>
                    <th><strong>Product Name</strong></th>
                    <th><strong>Import Price</strong></th>
                    <th><strong>Sale Price</strong></th>
                    <th><strong>Description</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Image</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

             <tbody>
                <?php
                include_once("connection.php");
                $No = 1;
                $result = pg_query($conn, "SELECT productid, shopid, supplier_id,categoryid, productname, importprice, saleprice, descriptions, quantity, proimage FROM product");
            
                while ($row = pg_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $No; ?></td>
                        <td><?php echo $row["productid"]; ?></td>
                        <td><?php echo $row["shopid"]; ?></td>
                        <td><?php echo $row["supplier_id"]; ?></td>
                        <td><?php echo $row["categoryid"]; ?></td>
                        <td><?php echo $row["productname"]; ?></td>
                        <td><?php echo $row["importprice"]; ?></td>
                        <td><?php echo $row["saleprice"]; ?></td>
                        <td><?php echo $row["descriptions"]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                       
                        <td align='center' class='columnfunction'>
                            <img src='image/<?php echo $row["proimage"]; ?>' border='0' width="50" height="50" />
                        </td>
                        <td align='center' class='columnfunction'>
                            <a href="?page=update_product&&id=<?php echo $row['productid']; ?>"> <img src="image/edit.png" width="16" height="16" border='0' />
                               
                            </a>
                        </td>
                        <td align='center' class='columnfunction'>
                            <a href="?page=product_management&&function=del&&id=<?php echo $row["productid"]; ?>" onclick="return deleteConfirm()">
                                <img src="image/delete.png" width="16" height="16" border='0' />
                            </a>
                        </td>
                    </tr>
                <?php
                    $No++;
                }
                ?>
            </tbody>
        
        </table>  

 </form>
<?php
}
?>