<?php
// database/connection.php
$servername ='localhost';
$username ='root';
$password ='';

try {
   
    // Create a PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=rangiri",$username,$password);
    //set the pdoerror mode to exception.
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    

}catch (\Exception $e) {
    error_log($e->getMessage());
}
?>

