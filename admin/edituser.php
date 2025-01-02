<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <title>Home</title>
</head>

<body>


<?php require "../admin/navAdmin.php";?>

    <main class="container mt-3 " style=" max-width:720px; margin:outo;">


        <?php
session_start();
require  "../functian.php";

if(isset($_SESSION['user'])){
if($_SESSION['user']->ROEL === "ADMIN"){
    require_once '../config.php';

if(isset( $_SESSION['userid'])){
  $edituser = $databass->prepare("SELECT * FROM users WHERE ID = :id");
$edituser->bindParam('id', $_SESSION['userid']);
$edituser->execute();
$edituser=$edituser->fetchObject();



echo '<form method="POST">

<div class="mb-3">
    <label for="name" class="form-label">NAME:</label>
    <input id="name" class="form-control" type="text" name="NAME" value="' . $edituser->NAME . '" required>
</div>

<div class="mb-3">
    <label for="age" class="form-label">AGE:</label>
    <input id="age" class="form-control" type="date" name="AGE" value="' . $edituser->AGE . '" required>
</div>

<div class="mb-3">
    <label for="email" class="form-label">EMAIL:</label>
    <input id="email" class="form-control" type="email" name="EMAIL" value="' . $edituser->EMAIL . '" required>
</div>

<div class="mb-3">
    <label for="activated" class="form-label">ACCOUNT STATUS:</label>
    <select id="activated" class="form-control" name="activated" required>
        <option value="' . $edituser->ACTIEV . '">' . ($edituser->ACTIEV === "1" ? "حساب مفعل" : "حساب غير مفعل") . '</option>
        <option value="0">الغاء تفعيل</option>
        <option value="1">تفعيل</option>
    </select>
</div>

<button class="w-100 btn btn-outline-info mt-3" type="submit" name="updat" value="' . $edituser->ID . '">تحديث</button>
</form>';

}



if(isset($_POST['updat'])){
    $updateuser =$databass->prepare("UPDATE users SET NAME=:NAME ,
    AGE=:AGE ,ACTIEV=:ACTIEV1, EMAIL=:EMAIL WHERE ID=:USERID");
    $updateuser->bindParam('USERID',$_SESSION['userid']);
    $updateuser->bindParam('NAME',$_POST['NAME']);
    $updateuser->bindParam('AGE',$_POST['AGE']);
    $updateuser->bindParam('EMAIL',$_POST['EMAIL']);
    $updateuser->bindParam('ACTIEV1',$_POST['activated']);
     if($updateuser->execute()){
        echo "تم تحديث ";
        // var_dump($updateuser->errorInfo());

        header("location:edituser.php");}
        else{
            echo "فشل التحديث ";
            
          }

      
    }
    

    }else{
        header("location:../login.php",true);
        die("");
      }
        }else{
            header("location:../login.php",true);
            die("");
        }
            


      if(isset($_GET['logout'])){
        logout(); // استدعاء دالة تسجيل الخروج
    // تأكد من التوقف عن تنفيذ الشيفرة بعد إعادة التوجيه
    
    }
    

    ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>