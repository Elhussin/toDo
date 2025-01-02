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

    <main class="container mt-5 ">
        <?php

session_start();
require  "../functian.php";

//  كود المل عن الحمايه لمنع الاختراق والتحقق قبل عند اعاده التوجيه 
if(isset($_SESSION['user'])){
    
    if($_SESSION['user']->ROEL=== "ADMIN"){// التحقق من نوع المستخدم
        echo 'Welcome : ' . strtoupper($_SESSION['user']->NAME);

        echo
        '<div class="container mt-5">
            <div class="row mt-5">
                <!-- Card 1 -->
                <div class="col-md-6 mt-5">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">تحديث البيانات</h5>
                            <p class="card-text">قم بتحديث بياناتك الشخصية بكل سهولة.</p>
                            <a class="btn btn-outline-info w-100" href="profial.php">تحديث البيانات</a>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-6 mt-5">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">TO DO</h5>
                            <p class="card-text">إدارة مهامك اليومية بشكل منظم وسهل.</p>
                            <a class="btn btn-outline-info w-100" href="todo.php">TO DO</a>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-6 mt-5">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">All Users</h5>
                        <p class="card-text">عرض واداره الأعضاء </p>
                        <a class="btn btn-outline-info w-100" href="users.php">View Users</a>
                    </div>
                </div>
            </div>
                </div>
        </div>';
        
    }else{
        header("location:../login.php",true);
    
    }
}else{
    header("location:../login.php",true);

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