<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">

    <title>Reset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <?php require_once "nav.php";?>


    <main class="contanier m-auto" style=" text-align:center; max-width :720px; margin-top:50px !important">


        <?php
        require  "mail.php";
        require_once 'config.php';

        
if(isset($_GET['code'])){   

    echo 
    '<form method="POST">
    
    <div class="p-3 shadow mb-3">كلمه المرور الجديده   <div>
    <input class="form-control" type="password" name="password" required />
    <button class="btn btn-info mt-3 w-100" type="submit" name="pasupdat" >تغيير كلمه المرور</button>
    </form>';


}else if(isset($_GET['email']) ){
    //&& isset($_GET['code']
    echo 
    '<form method="POST">
    
    <div class="p-3 shadow mb-3">كلمه المرور الجديده   <div>
    <input class="form-control"  type="password" name="password" required/>
    <button class="btn btn-info mt-3 w-100 " type="submit" name="pasupdat" >تغيير كلمه المرور</button>
    </form>';


}else{
  echo'  <form method="post">

<div class="p-3 shadow mb-3"> User Email
</div>
<input class="form-control" type="email" name="email">

<button class="btn mt-3 btn-info mt-3 w-100 " name="reset" type="submit"> التحقق من اميل المتخدم </button>

</form>  ';
}
if(isset($_POST['reset'])){
$reset= $databass->prepare("SELECT EMAIL ,SECUERTY_COD FROM `users` WHERE EMAIL=:EMAIL " )  ;
$reset->bindParam('EMAIL',$_POST['email']);
$reset->execute();
if ($reset->rowCount() > 0) {
    echo '<div class="alert alert-success mt-3">تم التحقق من البريد الإلكتروني</div><br>';
    // header("refresh:2;");

    $user = $reset->fetchObject();

    try {
        // إعداد الرابط
        $activationLink = BASE_URL . '/reset.php?email=' . $_POST['email'] . '&code=' . $user->SECUERTY_COD;

        // إعداد المحتوى
        $subject = 'Reset Email';
        $body = '
            <p>يرجى تأكيد إعادة تعيين كلمة المرور:</p>
            <div>رابط إعادة التعيين:</div>
            <a href="' . $activationLink . '">اضغط هنا لإعادة تعيين كلمة المرور</a>
        ';
        $altBody = "CONFIRM " . $activationLink;

        // إضافة المستلم
        $email=$_POST['email'];

        // إرسال البريد
        $result = sendEmail($email, $subject, $body, $altBody);

        if ($result === true) {
            echo '<div class="alert alert-success mt-3">تم إرسال رابط إعادة التعيين إلى بريدك الإلكتروني.</div>';
        } else {
            echo $result; // عرض رسالة الخطأ إذا حدثت مشكلة
            echo '<div class="alert alert-danger mt-3">حدث خطأ أثناء إرسال البريد الإلكتروني.</div>';
        }
    } catch (Exception $e) {
        echo '<div class="alert alert-danger mt-3">حدث خطأ: ' . $e->getMessage() . '</div>';
    }
} else {
    echo '<div class="alert alert-danger mt-3">البريد الإلكتروني غير موجود.</div>';
}


} 







?>

        <?php


if(isset($_POST['pasupdat'])){
    


    $resetPassword= $databass->prepare("UPDATE `users` SET PASSWORD=:PASSWORD  WHERE EMAIL=:EMAIL " )  ;
    $password=sha1($_POST['password']);
    $resetPassword->bindParam('PASSWORD',$password);
    // $resetPassword->bindParam('PASSWORD',$_POST['password']);
$resetPassword->bindParam('EMAIL',$_GET['email']);  // الايميل المرسل من الرابط


if($resetPassword->execute()){
    echo '<div class="alert alert-success m-3" role="alert">

    
  تم تغيير كلمه المرو بنجاح </div>';




  

}else{
    echo '<div class="alert alert-danger" role="alert">

   
    خطاء في تعيين كلمه المرور </div>';
  
}

}

?>

    </main>

</body>

</html>