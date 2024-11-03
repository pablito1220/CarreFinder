<?php
include '../conexion.php'; // Archivo de conexión a la base de datos

session_start(); // Inicia la sesión

$error = ''; // Inicializa la variable de error

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Establece la sesión del usuario
            $_SESSION['user_id'] = $user['id']; // Suponiendo que tienes un campo 'id' en tu tabla
            header("Location: http://localhost/Proyecto%20-%20copia/home.php"); // Cambia a la ruta de tu home
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "No se encontró un usuario con ese correo electrónico.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../src/components/head.php'; ?>

<body>
<main id="main" data-aos="fade" data-aos-delay="1500">
    <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Iniciar Sesión</h2>
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form action="custom_login.php" method="post" role="form" class="loginForm">
                        <div class="form-group mt-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Tu Correo Electrónico" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Tu Contraseña" required>
                        </div>
                        <button class="cta-btn" type="submit">Iniciar Sesión</button>
                    </form>
                    <p>¿No tienes cuenta? <a href="custom_register.php">Regístrate aquí</a></p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../src/components/footer.php'; ?>
<?php include '../src/components/scripts.php'; ?>
</body>
</html>
