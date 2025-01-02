<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">

    <title>Sign Up</title>
</head>

<body>
    <?php require_once "nav.php";?>
    <div class="container">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Name<SPAn style="color:red">*</SPAn></label>
                <input class="form-control" id="" type="text" name="Name" required />

            </div>
            <div class="mb-3">
                <label class="form-label" required>Age <SPAn style="color:red">*</SPAn></label>
                <input type="date" name="Age" />
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email <SPAn style="color:red">*</SPAn></label>
                <input class="form-control" id="exampleInputEmail1" type="email" name="Email" required />
            </div>
            <div class="mb-3">
                <label class="form-label">Password<SPAn style="color:red">*</SPAn></label>
                <input class="form-control" type="password" name="Password" required />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit" name="signUP">signUP</button>

                <a class="btn btn-dark  " href="login.php">Log In </a>

            </div>
        </form>
    </div>

    <?php

// require_once 'datapass.php';
require  "mail.php";
require_once 'config.php';

// التحقق من عدم وجود الايميل سابقا
if(isset($_POST['signUP'])){
$checkEmail =$databass->prepare("SELECT * FROM `users` WHERE EMAIL= :EMAIL1");
$Email=$_POST['Email'];
$checkEmail->bindParam('EMAIL1',$Email);
$checkEmail->execute();

if($checkEmail->rowCount()>0){
    echo '<div class="alert alert-danger" role="alert">
    This Email Is Use 
  </div>';


}
else{
    // البيانات المستقبله من العميل 
    $name=$_POST['Name'];
    $email=$_POST['Email'];
    $age=$_POST['Age'];
    $password=sha1($_POST['Password']); // لتشفير كلمه المرور ايضا يمكن استعمال md5
    $SECUERTY_COD=md5(date("h:i:s"));

    $register=$databass->prepare("INSERT INTO `users`(`NAME`, `EMAIL`, `AGE`, `PASSWORD` ,`SECUERTY_COD`,`ROEL`,`ACTIEV` ) 
    VALUES (:name,:email ,:age,:password ,:SECUERTY_COD,'USER' ,'0')");
    $register->bindParam('name',$name);
    $register->bindParam('email',$email);
    $register->bindParam('age',$age);
    
    $register->bindParam('password',$password);


    $register->bindParam('SECUERTY_COD', $SECUERTY_COD);  

    if($register->execute()){


   echo '<div class="alert alert-success" role="alert">
  "يرجي تفعيل حسابك من خلال الرابط المرسل الي الايميل الخاص بك"
</div>';


try {
    // إعداد العنوان
    $subject = 'CONFIRM MAIL'; // إضافة الفاصلة المنقوطة
    $activationLink = BASE_URL . '/active.php?code=' . $SECUERTY_COD;
    // إعداد المحتوى
    $body = ' <p>يرجى تفعيل حسابك، أهلاً وسهلاً بك في عالمك الجديد.</p>
        <div>رابط التحقق:</div>
        <a href="' . $activationLink . '">اضغط هنا لتفعيل حسابك</a>';

        $altBody = "CONFIRM " . $activationLink;

    
    // إرسال البريد الإلكتروني
    $result = sendEmail($email, $subject, $body, $altBody);

    if ($result === true) {
        echo '<div class="alert alert-success" role="alert">تم إرسال رابط التفعيل بنجاح.</div>';
    } else {
        echo $result; // عرض رسالة الخطأ إذا حدثت مشكلة
        echo '<div class="alert alert-danger" role="alert">حدث خطأ أثناء إرسال البريد الإلكتروني.</div>';
    }
} catch (Exception $e) {
    echo '<div class="alert alert-danger" role="alert">
        حدث خطأ: ' . $e->getMessage() . '
    </div>';
}

}


}

}
?>
</body>

</html>