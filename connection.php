<?php
 
  $conn = pg_connect("postgres://uhvblmtpmvtikd:28834cba613f68851543d94d831b106b1be52f96b5daa0acfab962d9c49c19c8@ec2-44-199-9-102.compute-1.amazonaws.com:5432/d4ldg3300pr6ep");	
      if (!$conn) {
          die("Connection failed");
     }
?>
