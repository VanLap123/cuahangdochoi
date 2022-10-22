<link rel="stylesheet" type="text/css" href="style.css" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
<?php 

        if(isset($_SESSION["admin"]) && $_SESSION["admin"]!=1)
        {
            echo "<script> alert('You are not administrator') </sript>";
            echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
        }
        else{
    ?>
        
   <!-- Bootstrap -->
    <script>
        function deleteConfirm() {
            if (confirm("Are you sure to delete")) {
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
            pg_query($conn, "DELETE FROM supplier WHERE supplier_id = '$id'");
        }
    }
    ?>
   
    <form name="frm" method="post" action="">
        <h1>Supplier</h1>
        <p>
            <img src="image/add.png" alt="Add new" width="16" height="16" border="0" /> <a href="?page=add_supplier"> Add</a>
        </p>
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>Supplier ID</strong></th>
                    <th><strong>Supplier  Name</strong></th>
                    <th><strong>Supplier  Address</strong></th>
                    <th><strong>Supplier  Email</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
            </thead>

            <tbody>
                <?php
                include_once("connection.php");
                $result = pg_query($conn, "SELECT * FROM supplier");
                while ($row = pg_fetch_array($result)) {

                ?>
                    <tr>
                        <td class="cotCheckBox"><?php echo $row["supplier_id"]; ?></td>
                        <td><?php echo $row["supplier_name"]; ?></td>
                        <td><?php echo $row["supplier_address"]; ?></td>
                        <td><?php echo $row["supplier_email"]; ?></td>
                      

                        <td style='text-align:center'>
                            <a href="?page=supplier_management&&function=del&&id=<?php echo $row["supplier_id"]; ?>" onclick="return deleteConfirm()">
                                <img src='image/delete.png' border='0' />
                            </a>
                        </td>
                    </tr>
                <?php
                  
                }
                ?>

            </tbody>
        </table>


        <!--Nut them moi nut xoa tat ca->
        <div class="row" style="background-color:#FFF"><!--Nut chuc nang-->
        <div class="col-md-12">

        </div>
        </div>
        <!--Nut chuc nang-->
    </form>
    <?php
        }
    ?>