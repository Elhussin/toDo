<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<main  class="container mt-3 ">

<?php


if(isset($_GET['code'])){
    require_once 'config.php';
// hasin3112@gmail.com
$activ=$databass->prepare("SELECT SECUERTY_COD FROM `users` WHERE SECUERTY_COD =:SECUERTY_COD");
$activ->bindParam("SECUERTY_COD",$_GET['code']);
$activ->execute();
if($activ->rowCount()>0){
    $updte=$databass->prepare("UPDATE `users` SET SECUERTY_COD =:NEWSECUERTY_COD, ACTIEV =true WHERE SECUERTY_COD =:SECUERTY_COD");
   
   $SECUERTY_COD=md5(date("h:i:s"));
   
   
   $updte->bindParam("SECUERTY_COD",$_GET['code']);
   
    $updte->bindParam("NEWSECUERTY_COD",$SECUERTY_COD);
    if($updte->execute()){

        echo '<div class="alert alert-success" role="alert">
        تم الحقق بنجاح 
      </div>';
      echo '<a href="login.php"  class="btn btn-primary">signIn</a>';
 
    }
    }else{
        echo '<div class="alert alert-success" role="alert">
كود غير صالح
        </div>';
    }

}else{
    echo '<div class="alert alert-success" role="alert">
Not Found
            </div>';
        

 
}

?>

</main>