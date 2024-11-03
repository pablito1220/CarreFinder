<!DOCTYPE html>
<html lang="en">
<?php include 'database.php'; // Incluye el archivo de conexión

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recoger datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Preparar y bindear
    $stmt = $conn->prepare("INSERT INTO contactform (name, email, asunto, mensaje) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "<script>alert('Mensaje enviado correctamente.');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>

<?php include './src/components/head.php';?>

<body>
<?php include './src/components/header.php';?>

<main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Contáctanos</h2>
                    <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                </div>
            </div>
        </div>
    </div><!-- End Page Header -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-3">
                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>Location:</h4>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3">
                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3">
                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-lg-9">
                    <form action="contact.php" method="post" role="form" class=".php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>

                        <div class="text-center"><button type="submit">Enviar mensaje</button></div>
                    </form>
                </div><!-- End Contact Form -->
            </div>
        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<?php include './src/components/footer.php' ?>
<?php include './src/components/scripts.php' ?>

</body>
</html>
