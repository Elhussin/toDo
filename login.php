<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">

    <title>logIn</title>
</head>

<body>
    <?php require_once "nav.php";?>



    <main class="container mt-3 ">

        <form method="POST">
            <LAbel class="font-weight-blod">Email</LAbel>
            <input class="form-control" type="email" name="email" required />
            <label class="font-weight-blod">Bassword</label>
            <input class="form-control" type="password" name="bassword" required />

            <button class="btn btn-info  mt-3" type="submit" name="login">Sign In </button>
            <a class="btn btn-dark  mt-3" href="register.php">Sign UP </a>

            <br>
            <a href="reset.php">Rest Password</a>



        </form>
        <?php
 

 if(isset($_POST['login'])){

    require_once 'config.php';


    
$login= $databass->prepare("SELECT * FROM `users` WHERE EMAIL=:EMAIL AND PASSWORD=:PASSWORD")  ;
$passworeduser=sha1($_POST['bassword']);  // لتشفير البيانات لتطابق مع المخز   
$login->bindParam("EMAIL",$_POST['email']);
$login->bindParam("PASSWORD",$passworeduser);
$login->execute();
if($login->rowCount()===1){




    $user=$login->fetchObject();  // للتحويل البيانات الي بيانات objevt
    if($user->ACTIEV=== "1"){  // للتحقق من ان الايميل فعال او لا 
        session_start();
        $_SESSION['user']= $user; // تخزين بيانات المستخدم 



        if($user->ROEL=== "USER"){// التحقق من نوع المستخدم

            header("location:user/user.php",true);
        }elseif($user->ROEL=== "ADMIN"){

            header("location:admin/admin.php",true);}

        
echo '<div class="alert alert-info" role="alert">
 مرحبا' . $user->NAME.'
</div>';

// لحفظ بيانات تسجيل الدخول 
$_SESSION['email']=$user->EMAIL;
$_SESSION['bassword']=$user->PASSWORD;
$_SESSION['name']=$user->NAME;
}else{

    echo '<div class="alert alert-danger" role="alert">
    يرجي تفعيل الحساب
  </div>';

}



}else{

    echo '<div class="alert alert-danger" role="alert">
    خطاء في بيانات الدخول
  </div>';
  
}



 }

?>

    </main>

</body>

</html>