<?php 
session_start();

include_once("../crudop/crud.php");
$crud = new Crud();
$tableName = 'products';
$tableName1 = 'prod_images';

$catg_id          = isset($_POST['catg_id'])?trim($_POST['catg_id']):'';
$prod_code        = isset($_POST['prod_code'])?trim($_POST['prod_code']):'';
$prod_name        = isset($_POST['prod_name'])?trim($_POST['prod_name']):'';
$prod_description = isset($_POST['prod_description'])?trim($_POST['prod_description']):'';
$price            = isset($_POST['price'])?trim($_POST['price']):'';
$quantity         = isset($_POST['quantity'])?trim($_POST['quantity']):'';
$vat_rate         = isset($_POST['vat_rate'])?trim($_POST['vat_rate']):'';
$old_image        = isset($_POST['old_image'])?trim($_POST['old_image']):'';
$old_pics         = isset($_POST['old_pics']) ? $_POST['old_pics'] : array();
$hdn_id      = isset($_POST['hdn_id'])?trim($_POST['hdn_id']):'';
$randomId    = uniqid(substr(0, 10));

 if (empty($vat_rate)) {
    $selVat = "SELECT * FROM vat_rates WHERE status = 1 ORDER BY id ASC LIMIT 1"; 
    $resDefaultVat = $crud->getData($selVat);

    if (!empty($resDefaultVat)) {
        $vat_rate = $resDefaultVat[0]['vat_rate'];
    } else {
        $vat_rate = $vat_rate;
       
    }
}

$product_image = '';
$image = '';
$image_targetDir = "../assets/images/";
    if(isset($_FILES['product_image'])){

        $product_imagefileName = basename($_FILES["product_image"]["name"]);
        $targetproduct_imageFilePath = $image_targetDir."product_image_".$randomId.".jpg";
            if(move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetproduct_imageFilePath)){
                $product_image = $targetproduct_imageFilePath;
            }
    }else{
        $product_image = $old_image;
    }

if(isset($_POST['action']) && $_POST['action'] == 'save'){

   $insProduct = "insert into ".$tableName." set catg_id = '".$catg_id."',prod_code = '".$prod_code."',prod_name = '".$prod_name."',prod_description = '".$prod_description."',price = '".$price."',quantity = '".$quantity."',vat_rate = '".$vat_rate."', product_image = '".$product_image."', randomId = '".$randomId."'";

   $Product_data = $crud->execute($insProduct);
    $i = 0;
      foreach($_FILES['image']['name'] as $key => $value){
        if(isset($_FILES['image'])){

        $imagefileName = basename($_FILES["image"]["name"][$key]);
        $targetimageFilePath = $image_targetDir."image_".$randomId.$key.".jpg";
            if(move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetimageFilePath)){
                $image = $targetimageFilePath;
            }
        }
 
     $ins_qry = "insert into prod_images set prod_code = '".$prod_code."', image = '".$image."', randomId = '".$randomId.$i."' ";
     $ins_data = $crud->execute($ins_qry);
    $i++;
}

    if ($Product_data && $ins_data){
        echo "true";
    }else{
        echo "false";
    }
}


if(isset($_POST["action"]) && $_POST['action'] == 'Display'){

    $sql_show = "SELECT c.catg_name, p.* FROM products as p left join categories as c on c.id =p.catg_id order by p.id  desc";
 
    $show_data = $crud->getData($sql_show);        
       $response = array(
        "draw" => 1,
        "recordsTotal" => count($show_data),
        "data" => $show_data
    );
    echo json_encode($response);
}

if (isset($_POST['action'])&&$_POST['action'] == 'delete') {
    
     $selDis = "delete from ".$tableName." where id='".$_POST['id']."'";
   $resSel = $crud->execute($selDis);
    
    if ($resSel) {
        echo "true";
    }else{
        echo "false";
    }
}

if (isset($_POST['action'])&&$_POST['action'] == 'singleDelete') {
    
   $selDis = "delete from prod_images where id='".$_POST['Rid']."'";
   $resSel = $crud->execute($selDis);
    
    if ($resSel) {
        echo "true";
    }else{
        echo "false";
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'update'){  

    $Upd_Data = "UPDATE ".$tableName." SET catg_id = '".$catg_id."',prod_code = '".$prod_code."',prod_name = '".$prod_name."',prod_description = '".$prod_description."',price = '".$price."',quantity = '".$quantity."',vat_rate = '".$vat_rate."',product_image = '".$product_image."' WHERE randomId ='".$hdn_id."'";

  $Upd_res = $crud->execute($Upd_Data);

  $Del_imgs = "DELETE FROM prod_images WHERE prod_code = '".$prod_code."'";
  $del_data = $crud->execute($Del_imgs);

if(isset($_FILES['image'])){
      foreach($_FILES['image']['name'] as $key => $value){
        if(isset($_FILES['image'])){

        $imagefileName = basename($_FILES["image"]["name"][$key]);
        $targetimageFilePath = $image_targetDir."image_".$randomId.$key.".jpg";
            if(move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetimageFilePath)){
                $image = $targetimageFilePath;
            }
        }else{
            $image = $old_pics[$key];
        }
 
     $ins_qry = "insert into prod_images set prod_code = '".$prod_code."', image = '".$image."', randomId = '".$randomId.$key."' ";
     $ins_data = $crud->execute($ins_qry);
}}else{

foreach ($old_pics as $key => $old_image) {
    $ins_qry = "INSERT INTO prod_images SET prod_code = '".$prod_code."', image = '".$old_image."', randomId = '".$randomId.$key."'";
     $ins_data = $crud->execute($ins_qry);
}
 }
   if ($Upd_res && $ins_data){
        echo "true";
   }else{
        echo"false";
   }
}

if (isset($_POST['action']) && $_POST['action'] == 'changeStatus'){   
      
   $Upd_Status = "UPDATE ".$tableName." SET status = '".$_POST['status']."' WHERE id='".$_POST['id']."'";

        $Status_data = $crud->execute($Upd_Status);

        if ($Status_data){
            echo "true";
        }else{
            echo "false";
        }
}

?>