<?php
include("header.php");
session_start();
?>
<form action="salir" method="post">
    <input type="button" value="Salir">
</form>

<?php
//$_SESSION=array();
/* Si se desea destruir la sesión completamente, también se debe destruir la cookie de sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}*/
session_unset();
session_destroy();
header("Location:index.php");
exit;
include("footer.php");
?>