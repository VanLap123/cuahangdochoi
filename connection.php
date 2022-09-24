<?php
// $conn= mysqli_connect('localhost', 'root', '','online_shopping')
//         or die("Can not connect database".mysqli_connect_error());
 
$Connect = pg_connect("postgres://gzrjiolcnnctoo:aff34d0d5a82e271fd03fcd00380037124d4a2dfcb3d1db6a407055b6de90ca4@ec2-3-214-2-141.compute-1.amazonaws.com:5432/d9455klrqhdq0a
");	
    if (!$Connect) {
        die("Connection failed");
    }
?>
