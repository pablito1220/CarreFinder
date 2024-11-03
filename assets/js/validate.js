document.addEventListener('DOMContentLoaded', function () {
    // Validación para el formulario de registro
    const registrationForm = document.getElementById('registrationForm');
    if (registrationForm) {
        registrationForm.onsubmit = function (event) {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (!name || !email || !password) {
                alert('Por favor completa todos los campos.');
                event.preventDefault(); // Evita que el formulario se envíe
            }
        };
    }

    // Validación para el formulario de inicio de sesión
    const loginForm = document.querySelector('form[action="custom_login.php"]');
    if (loginForm) {
        loginForm.onsubmit = function (event) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (!email || !password) {
                alert('Por favor completa todos los campos.');
                event.preventDefault(); // Evita que el formulario se envíe
            }
        };
    }
});
