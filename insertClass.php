<?php
require_once('messageClass.php');
class Post {

public function addPost($conn, $values) {
    $msg = new Message;
    
    $title = validateData($values['title']);
    $content = validateData($values['content']);
    $brand = validateData($values['brand']);
    $model = validateData($values['model']);
    $type = validateData($values['type']);
    $fueltype = validateData($values['fueltype']);
    $price = validateData($values['price']);
    $editPassword = validateData($values['editPassword']);

    $imageFileType = strtolower(pathinfo($values['imageName'], PATHINFO_EXTENSION));
    $values['imageName'] =='' ? $isImage = null : $isImage = 1;
    
    $fileToUpload = 1;
    
    if($isImage == 1) {
        if($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg") {
            $fileToUpload = 0;
            $msg->addMessage("Súbor nie je obrázok|TYPE_ERROR");
        }
        if($values['imageSize'] > 550000) {
            $fileToUpload = 0;
            $msg->addMessage("Príliš veľký súbor|TYPE_ERROR");
        }
    }
    
    if($fileToUpload == 1) {
        
        $timestamp = new DateTime;
        $isImage == 1 ? $imageName = "image_".$timestamp->getTimestamp().".".$imageFileType : $imageName = null;
        
        if($isImage == 1) {
            $dest = dirname(__DIR__)."/DSD_Projekt 2/img/".basename($imageName);
            move_uploaded_file($values['imageTmpName'], $dest);
        }
        
        $sql = $conn['conn']->prepare("INSERT INTO ad (title, content, image, brand, model, type, fueltype, price, editPassword) "
                                    . "VALUES "
                                    . "(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->execute([$title, $content, $imageName, $brand, $model, $type, $fueltype, $price, $editPassword]);



       // if(!$conn['conn2']){
       //     createTempSQL(2,"INSERT INTO ad (title, content, image, brand, model, type, fueltype, price, editPassword) "
                    //        . "VALUES ('$title', '$content', '$imageName', '$brand', '$model', '$type', '$fueltype', '$price', $editPassword)");
       
    //    } else {    

       // $sql2 = $conn['conn2']->prepare("INSERT INTO ad (title, content, image, brand, model, type, fueltype, price, editPassword) "
                                    //    . "VALUES "
                                      //  . "(?, ?, ?, ?, ?, ?, ?, ?, ?)");
       // $sql2->execute([$title, $content, $imageName, $brand, $model, $type, $fueltype, $price, $editPassword]);
     //   }

        /*$sql3 = $conn['conn3']->prepare("INSERT INTO ad (title, content, image, brand, model, type, fueltype, price, editPassword) "
          . "VALUES "
          . "(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql3->execute([$title, $content, $imageName, $brand, $model, $type, $fueltype, $price, $editPassword]);*/

        $msg->addMessage("Inzerát bol pridaný|TYPE_SUCCESS");
    }
}



public function getPosts($conn, $where ='', $key = null, $adID = null) {
    $sql = $conn['conn']->prepare("SELECT adID, title, content, image, created, deleted, brand, model, type, fueltype, price, editPassword "
                                . "FROM ad "
                                . "WHERE deleted IS NULL "
                                .$where);
                                if($adID==null) {
                                    $key = validateData($key);
                                    $sql->execute();
                                    $rows = $sql->fetchAll();
                                } else {
                                    $sql->execute([$adID]);
                                    $rows = $sql->fetch();
                                }
                                
                                return $rows;
                                      
                            }
                            
}