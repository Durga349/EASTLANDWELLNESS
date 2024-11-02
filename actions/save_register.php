  <?php 
session_start();
include("../crudop/crud.php");
$crud = new Crud;
$tableName = 'email_verification';
$tableName1 = 'customers';
$tableName2 = 'user_logins';


if(isset($_POST['action']) && $_POST['action'] == 'save_reg')
{
  
      $regFname    = isset($_POST['fname'])?trim($_POST['fname']):'';
      $regLname    = isset($_POST['lname'])?trim($_POST['lname']):'';
      $regEmail    = isset($_POST['email'])?trim($_POST['email']):'';
      $regPhone    = isset($_POST['phone'])?trim($_POST['phone']):'';
      $regPassword = isset($_POST['password'])?trim($_POST['password']):'';
      $randomId    = uniqid(substr(0, 10));
      $encpassword = md5($password);

      $insUserReg =" INSERT INTO " .$tableName1." SET customer_type='Normal',first_name = '".$regFname."',last_name = '".$regLname."',email = '".$regEmail."',phone_number = '".$regPhone."',password = '".$regPassword."', randomId = '".$randomId."'";
      $UserRegData =$crud->execute($insUserReg);

      // save userlogins
      $ins_login ="INSERT INTO ".$tableName2." SET user_type ='Normal', email ='".$regEmail."',password = '".$regPassword."',encpassword = '".$encpassword."', randomId = '".$randomId ."'";
      $log_data =$crud->execute($ins_login);

  
        if($UserRegData && $log_data)
        {
          echo "true";
        } else{
          echo "false";
        }
}

if(isset($_POST['submit']) && $_POST['submit'] == 'Save')
{

    $footerEmail    = isset($_POST['footerEmail'])?trim($_POST['footerEmail']):'';
    $randomId       = uniqid(substr(0, 10));

    $ins_reg =" INSERT INTO " .$tableName." SET email = '".$footerEmail."', randomId = '".$randomId."'";
    $reg_data =$crud->execute($ins_reg);

    if($reg_data)
    {
      echo "true";
    } else{
      echo "false";
    }
}


if (isset($_POST['action1']) && $_POST['action1'] == 'user_email') 
{
  
      $email_qry = "select * from " .$tableName." where email = '".$_POST['email']."'";
    //exit;
      $email_data = $crud->getData($email_qry);


      if (count($email_data)>0){
        // echo "count($email_data)";
        // exit;
        echo "true";
      }else{
        echo "false";
      }
}


if(isset($_POST['action']) && $_POST['action'] == 'login')
{

    extract($_POST);
    $regEmail    = isset($_POST['email'])?trim($_POST['email']):'';

    $regPassword = isset($_POST['password'])?trim($_POST['password']):'';


    $SelLogin = "select * from ".$tableName2." where  email = '".$regEmail."' and password = '".$regPassword."' ";
    $LoginData = $crud->getData($SelLogin);

    $UserID = $LoginData[0]['id'];
    $User_type = $LoginData[0]['user_type'];

    $cartQry = "SELECT * FROM cart WHERE user_id = '".$UserID."' ORDER BY id DESC";
    $cartData = $crud->getData($cartQry);

    $precartId = $cartData[0]['cart_id'];
    $_SESSION['cartID'] = $precartId;
    // exit;
    
    $_SESSION["UserID"] = $UserID;
    $_SESSION['user_type'] = $User_type;

        if(count($LoginData) > 0){
          echo "true";
        }else{
            echo "false";
        }

}


if(isset($_POST['action']) && $_POST['action'] == 'userValidate'){

 $username= $_POST['useremail'];

  $ForgetPassQuery="SELECT * FROM ".$tableName2." WHERE email ='".$username."'";  
  $resForgetData=$crud->getData($ForgetPassQuery);

  if (count($resForgetData) > 0) {
    $_SESSION['randomId'] = $resForgetData[0]['randomId'];
    $_SESSION['username'] = $resForgetData[0]['email'];
    echo "true";
} else {
    echo "false";
}


}


if(isset($_POST['action']) && $_POST['action'] == 'forPassword'){


$hid          = isset($_POST['hid'])?trim($_POST['hid']):'';
$cpass        = isset($_POST['cpass'])?trim($_POST['cpass']):'';
$encpassword  = md5($cpass);
 

 $changePasswordQuery = "UPDATE ".$tableName2." SET password ='".$cpass."',encpassword ='".$encpassword."' WHERE id ='".$hid."'";
  //exit;
 
  $resCpUptd = $crud->execute($changePasswordQuery);

  if ($resCpUptd) {
    echo "true";
  }else
  {
    echo "false";
  }

}


if(isset($_POST['action']) && $_POST['action'] == 'update')
{
  
      $regFname    = isset($_POST['first_name'])?trim($_POST['first_name']):'';
      $regLname    = isset($_POST['last_name'])?trim($_POST['last_name']):'';
      $regEmail    = isset($_POST['email'])?trim($_POST['email']):'';
      $regPhone    = isset($_POST['phone_number'])?trim($_POST['phone_number']):'';
      $hid_password    = isset($_POST['hid_password'])?trim($_POST['hid_password']):'';
      $hid_id       = isset($_POST['hid_id'])?trim($_POST['hid_id']):'';

      $randomId    = uniqid(substr(0, 10));
      $encpassword = md5($password);

       $UpdateRegData =" Update " .$tableName1." SET customer_type='Normal',first_name = '".$regFname."',last_name = '".$regLname."',email = '".$regEmail."',phone_number = '".$regPhone."',password = '".$hid_password."' where randomId = '".$hid_id."'";
      $UserUpdateData =$crud->execute($UpdateRegData);

      // save userlogins
       $UpdateLogData ="Update  ".$tableName2." SET user_type ='Normal', email ='".$regEmail."',password = '".$hid_password."',encpassword = '".$encpassword."' where  randomId = '".$hid_id ."'";
      $LoginsData =$crud->execute($UpdateLogData);

  
        if($UserUpdateData && $LoginsData)
        {
          echo "true";
        } else{
          echo "false";
        }
}

 ?>