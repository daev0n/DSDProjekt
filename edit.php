<?php
require_once('connection.php');
$post = new Post;

if (isset($_GET['adID'])) {
  $_SESSION['adID'] = $_GET['adID'];
}

$row = $post->getPosts($connection, " AND adID = ? ", null, $_SESSION['adID']);

if(isset($_POST['btn_edit1']))
{
    $adID = $_GET["adID"];
    $title = $_POST['title1'];
    $content = $_POST['content1'];
    $brand = $_POST['brand1'];
    $model = $_POST['model1'];
    $type = $_POST['type1'];
    $fueltype = $_POST['fueltype1'];
    $price = $_POST['price1']; 
    
    $query = "UPDATE `ad` SET `title`=:title,`content`=:content,`brand`=:brand,`model`=:model,`type`=:type,`fueltype`=:fueltype,`price`=:price WHERE `adID` = :adID";
   
    $pdoResult = $conn->prepare($query);
    //$pdoResult2 = $conn2->prepare($query);
    //$pdoResult3 = $conn3->prepare($query);
  
    $pdoExec = $pdoResult->execute(array(":title"=>$title,":content"=>$content,":brand"=>$brand,":model"=>$model,":type"=>$type,":fueltype"=>$fueltype,":price"=>$price,":adID"=>$adID));
    //$pdoExec2 = $pdoResult2->execute(array(":title"=>$title,":content"=>$content,":brand"=>$brand,":model"=>$model,":type"=>$type,":fueltype"=>$fueltype,":price"=>$price,":adID"=>$adID));
   // $pdoExec3 = $pdoResult3->execute(array(":title"=>$title,":content"=>$content,":brand"=>$brand,":model"=>$model,":type"=>$type,":fueltype"=>$fueltype,":price"=>$price,":adID"=>$adID));


}

if(isset($_POST['delete']))
{  
   $adID = $_GET['adID'];
    $query = "UPDATE `ad` SET `deleted`= CURRENT_TIMESTAMP WHERE `adID` = :adID";
   
    $pdoResult = $conn->prepare($query);
    //$pdoResult2 = $conn2->prepare($query);
    //$pdoResult3 = $conn3->prepare($query);
  
    $pdoExec = $pdoResult->execute(array("adID"=>$adID));
     header('Location: '.'index.php');

    //$pdoExec2 = $pdoResult2->execute(array("adID"=>$adID));
    //header('Location: '.'index.php');

    //$pdoExec3 = $pdoResult3->execute(array("adID"=>$adID));
    //header('Location: '.'index.php');
  
 }
?>