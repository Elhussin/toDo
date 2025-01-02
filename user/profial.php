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

<?php require "../user/navUser.php";?>


    <main class="container mt-3 " style=" max-width:720px; margin:outo;">
        <!-- "text-align:right; direction:ltr; -->

        <?php
        ob_start();  // بدء التخزين المؤقت للمخرجات

        session_start();
        require_once '../config.php';
        require  "../functian.php";
        
            
        if(isset($_GET['logout'])){
            logout(); // استدعاء دالة تسجيل الخروج
   // تأكد من التوقف عن تنفيذ الشيفرة بعد إعادة التوجيه

        }

            if(isset($_SESSION['user'])){
                if($_SESSION['user']->ROEL === "USER"){
                    echo '<div class="container mt-5">
                        <!-- عرض البيانات في كرت -->
                        <div class="card mb-4">
                            <div class="card-header bg-info text-white text-center">
                                بيانات المستخدم
                            </div>
                            <div class="card-body">
                                <p><strong>Name:</strong> ' . $_SESSION['user']->NAME . '</p>
                                <p><strong>Age:</strong> ' . $_SESSION['user']->AGE . '</p>
                            </div>
                        </div>
                        <!-- نموذج التحديث -->
                        <form method="POST" class="shadow p-4 rounded">
                            <div class="row align-items-center mb-3">
                                <label class="col-sm-2 col-form-label text-end">NAME:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="NAME" value="' . $_SESSION['user']->NAME . '" required>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <label class="col-sm-2 col-form-label text-end">AGE:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" name="AGE" value="' . $_SESSION['user']->AGE . '" required>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <label class="col-sm-2 col-form-label text-end">PASSWORD:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="PASSWORD" required>
                                </div>
                            </div>
                            <button class="w-100 btn btn-outline-info mt-3" type="submit" name="updat" value="' . $_SESSION['user']->ID . '">تحديث</button>
             
                        </form>
                    </div>';
            
                    if(isset($_POST['updat'])){
                        require_once '../config.php';
                        $updteUser = $databass->prepare("UPDATE `users` SET NAME = :NAME, AGE = :AGE, PASSWORD = :PASSWORD WHERE ID = :id");
                        $updteUser->bindParam('NAME', $_POST['NAME']);
                        $updteUser->bindParam('AGE', $_POST['AGE']);
                        $password = sha1($_POST['PASSWORD']);
                        $updteUser->bindParam('PASSWORD', $password);
                        $updteUser->bindParam('id', $_POST['updat']);
                        if($updteUser->execute()){
                            echo '<div class="alert alert-info" role="alert"> تم تحديث البيانات</div>';
                            $user = $databass->prepare("SELECT * FROM `users` WHERE ID = :id");
                            $user->bindParam('id', $_POST['updat']);
                            $user->execute();
                            $_SESSION['user'] = $user->fetchObject();
                            header("refresh"); // تحديث الصفحه
            
                        } else {
                            echo '<div class="alert alert-danger" role="alert"> فشل تحديث البيانات</div>';
                        }
                    }
                } else {
                    logout(); // استدعاء دالة تسجيل الخروج
                }
            }
            
            else{
                session_unset(); // حذف الجلسة وتدمير البيانات
                session_destroy(); // تدمير الجلسة
                header("../location:login.php", true); // إعادة التوجيه إلى صفحة تسجيل الدخول
                exit(); // تأكد من التوقف عن تنفيذ الشيفرة بعد إعادة التوجيه
            }

            ob_end_flush();  // إنهاء التخزين المؤقت للمخرجات بعد تنفيذ كل شيء

        ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>