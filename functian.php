
<?php
function logout() {
    session_unset(); // حذف الجلسة وتدمير البيانات
    session_destroy(); // تدمير الجلسة
    header("location:../login.php", true); // إعادة التوجيه إلى صفحة تسجيل الدخول
    exit(); // تأكد من التوقف عن تنفيذ الشيفرة بعد إعادة التوجيه
}

?>