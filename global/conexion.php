<?php
$servidor="mysql:dbname=".BD.";host=".SERVIDOR;

try {
    $PDO=NEW pdo($servidor,USUARIO,PASSWORD,
    array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8")
);
//echo "<script> alert('conectando.....')</script>";
} catch (PDOException $e) {
   //echo "script>alert('error.....')</script>";
}



?>