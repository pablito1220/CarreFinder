<?php
include '../conexion.php'; // Archivo de conexión a la base de datos

$error = ''; // Inicializa la variable de error

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Verifica si el correo electrónico ya está registrado
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "El correo electrónico ya está registrado.";
    } else {
        // Inserta el nuevo usuario
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $password);

        if ($stmt->execute()) {
            header("Location: http://localhost/Proyecto%20-%20copia/auth/custom_login.php?registered=success");
            exit();
        } else {
            $error = "Error en el registro. Intenta nuevamente: " . $stmt->error;
        }
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
                    <h2>Regístrate</h2>
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form action="custom_register.php" method="post" id="registrationForm">
                        <div class="form-group mt-3">
                            <input type="text" name="name" class="form-control" placeholder="Tu Nombre" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="email" name="email" class="form-control" placeholder="Tu Correo Electrónico" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="password" name="password" class="form-control" placeholder="Tu Contraseña" required>
                        </div>
                        <button class="cta-btn" type="submit">Registrarme</button>
                        <div class="error-message" style="display:none;"></div> <!-- Mensaje de error -->
                    </form>

                    <p>¿Ya tienes cuenta? <a href="custom_login.php">Inicia sesión aquí</a></p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../src/components/footer.php'; ?>
<?php include '../src/components/scripts.php'; ?>
</body>
</html>
