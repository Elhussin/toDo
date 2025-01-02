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

    <main class="container mt-3 " style="max-width: 720px;">

        <?php
ob_start();  // بدء التخزين المؤقت للمخرجات

session_start();

require_once '../functian.php';

require_once '../config.php';
//  كود المل عن الحمايه لمنع الاختراق والتحقق قبل عند اعاده التوجيه 
 if(isset($_SESSION['user'])){
    
 if($_SESSION['user']->ROEL=== "ADMIN"){// التحقق من نوع المستخدم



echo
'<form method="POST" class="d-flex">
<input  class="form-control me-2"  placeholder="writ your list"   type="text" name="text" required/>

<button class="  btn btn-info" type="submit" name="add" >add</button>

</form>';



if(isset($_POST['add'])){
 
    $addIteam=$databass->prepare("INSERT INTO todo (TEXT,USERID,status) VALUES (:TEXT, :USERID ,'no') ")  ;
    $addIteam->bindParam("TEXT",$_POST['text']);
    $userid=$_SESSION['user']->ID;
    
    $addIteam->bindParam("USERID",$userid);
    if($addIteam->execute()){
        echo '<div class="alert alert-success mt-3 mb-3" >تم اضافه المهام</div>';
        header("refresh:2;");
    }
    
}




$viewtodo=$databass->prepare("SELECT * FROM  todo WHERE USERID=:USERID");
$userid=$_SESSION['user']->ID;
$viewtodo->bindParam('USERID',$userid);
$viewtodo->execute();
// عرض البيانات من خلا الجدول 

echo'<table class="table  mt-3" >';
echo '<tr class="alert-info">';
echo  '<th>المهمه </th>';
echo  '<th> الحاله </th>';
echo  '<th>حذف</th>';
echo '</tr>';

foreach($viewtodo AS $VIEW){
    echo ' <form> <tr> ';
    echo '<tr>';
    echo  '<th>'.$VIEW['TEXT'].'</th>';
  if($VIEW['status'] ===  "no"){

    echo ' <th>
     <input type="hidden" name="satuvalue" value="'.$VIEW['status'].'"/>

   
    <button type="submit" class="btn btn-outline-warning" 
     name="status" value="'.$VIEW['id'].'">Witing</button> 
    </th>';


}

elseif($VIEW['status'] ===  "yes"){
    echo ' <th> 
    <input type="hidden" name="satuvalue" value="'.$VIEW['status'].'">

    <button type="submit" class="btn btn-outline-success" 
    name="status" value="'.$VIEW['id'].'">Done</button> 
     </th>';
    

  }

   echo ' <th> 
   <button type="submit" class="btn btn-outline-danger" name="remove" value="'.$VIEW['id'].'"> حذف</button> 
   </th>';

   echo '</tr> </form> ';

   }
   echo' </table>';


// ubate   status 
if(isset($_GET['status'])){
    if($_GET['satuvalue'] === "no"){
        $updatSatus=$databass->prepare("UPDATE todo SET status ='yes'  WHERE ID=:id ");
        $updatSatus->bindParam("id",$_GET['status']);
        $updatSatus->execute();
        header("location:todo.php",true);  // لحذف القيمه المخزنه بالرابط
    }else if($_GET['satuvalue'] === "yes"){
        $updatSatus=$databass->prepare("UPDATE todo SET status ='no'  WHERE ID=:id ");
        $updatSatus->bindParam("id",$_GET['status']);
        $updatSatus->execute();
    //    header("refrech:0; url:todo.php",true);  كود جيد للتحديث 
    header("location:todo.php",true);

    }
}

    if(isset($_GET['remove'])){
        $removeSatus=$databass->prepare("DELETE FROM  todo  WHERE ID=:id ");
        $removeSatus->bindParam('id',$_GET['remove']);
        $removeSatus->execute();
        header("location:todo.php",true);
    
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
    logout();
}

ob_end_flush();  // إنهاء التخزين المؤقت للمخرجات بعد تنفيذ كل شيء


?>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>