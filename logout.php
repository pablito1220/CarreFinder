<?php
session_start(); // Inicia la sesión

// Destruir todas las variables de sesión
$_SESSION = array();

// Si se desea destruir la sesión completamente, se debe eliminar también el identificador de sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, se destruye la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión
header("Location: http://localhost/Proyecto%20-%20copia/auth/custom_login.php");
exit();
?>
