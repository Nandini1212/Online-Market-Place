<?
session_unset();
session_destroy();

setcookie('$cookie_name', '',time() - 3600);
echo "<script>alert('Logout Successful');</script>";
echo "<script>window.location='./index.php'</script>";
?>