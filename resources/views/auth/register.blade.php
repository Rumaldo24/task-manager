<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrate</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .register-form h1 {
            font-size: 24px;
            color: #0073e6;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .register-form label {
            font-size: 14px;
            color: #555;
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        .register-form input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .register-form input:focus {
            border-color: #0073e6;
            outline: none;
        }

        .register-form p {
            font-size: 12px;
            color: #888;
            margin-top: -10px;
            margin-bottom: 20px;
            text-align: left;
        }

        .register-form button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #0073e6;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .register-form button:hover {
            background-color: #005bb5;
        }

        .switch-form {
            margin-top: 15px;
        }

        .switch-form .switch-button {
            font-size: 14px;
            color: #0073e6;
            text-decoration: none;
            transition: color 0.3s;
        }

        .switch-form .switch-button:hover {
            color: #005bb5;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-bottom: 15px;
            display: none;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="register-form">
        <h1>Registrarse</h1>
        <form id="register-form" method="POST" action="{{ route('register') }}">
            @csrf
            <label for="register-name">Nombre:</label>
            <input type="text" id="name" name="name" required>

            <label for="register-email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <p id="email-error" style="display: none; color: red;">El correo ya está en uso.</p>

            <label for="register-password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <p>Mínimo 8 caracteres</p>
            <div class="error-message" id="password-error">La contraseña debe tener al menos 8 caracteres.</div>

            <button type="submit">Registrarse</button>
        </form>
        <div class="switch-form">
            <a class="switch-button" href="{{ route('login') }}">¿Ya tienes cuenta? Inicia Sesión</a>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const passwordInput = document.getElementById("password");
            const passwordError = document.getElementById("password-error");
            const emailInput = document.getElementById("email");
            const emailError = document.getElementById("email-error");

            passwordInput.addEventListener("input", function () {
                if (passwordInput.value.length < 8) {
                    passwordError.style.display = "block";
                } else {
                    passwordError.style.display = "none";
                }
            });

            emailInput.addEventListener("blur", function () {
                const email = emailInput.value;

                if (email) {
                    fetch("/api/check-email", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}" // Token CSRF para seguridad
                        },
                        body: JSON.stringify({ email: email })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            emailError.style.display = "block";
                            emailError.textContent = data.error;
                        } else {
                            emailError.style.display = "none";
                        }
                    })
                    .catch(error => {
                        console.error("Error al verificar el correo:", error);
                    });
                }
            });
        });
    </script>
</body>

</html>
