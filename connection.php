<?php
//  $conn= mysqli_connect('localhost', 'root', '','online_shopping')
//          or die("Can not connect database".mysqli_connect_error());
 
 $Connect = pg_connect("postgres://rbbhhkldicjtjf:8bedc6d832017bc8c798766400482a57fe2cfff5308fc5bbe962e22b64a06586@ec2-52-200-5-135.compute-1.amazonaws.com:5432/d2skp77qhslna8");	
     if (!$Connect) {
         die("Connection failed");
     }
?>
