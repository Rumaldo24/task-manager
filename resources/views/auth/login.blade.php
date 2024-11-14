<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión o Registrarse</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
            padding: 2rem;
        }

        .forms-container {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .login-register {
            position: absolute;
            top: 0;
            width: 100%;
            transition: all 0.6s ease-in-out;
        }

        .login-form {
            left: 0;
            opacity: 1;
            z-index: 2;
        }

        .register-form {
            left: 100%;
            opacity: 0;
            z-index: 1;
            height: ;
        }

        .container.register-mode .login-form {
            left: -100%;
            opacity: 0;
        }

        .container.register-mode .register-form {
            left: 0;
            opacity: 1;
        }

        h1 {
            color: #333;
            margin-bottom: 2rem;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            padding: 0 1.5rem;
        }

        label {
            color: #555;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        input {
            background-color: #f7f7f7;
            border: none;
            border-radius: 5px;
            padding: 12px 15px;
            margin-bottom: 1.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            background-color: #fff;
            box-shadow: 0 0 0 2px #667eea;
        }

        button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 5px;
            color: white;
            padding: 12px 45px;
            font-size: 1rem;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        button:hover {
            transform: scale(1.02);
        }

        .switch-form {
            text-align: center;
            margin-top: 1.5rem;
        }

        .switch-button {
            background: none;
            border: none;
            color: #667eea;
            font-size: 0.9rem;
            cursor: pointer;
            text-decoration: underline;
        }

        .error-message {
            color: #ff4444;
            text-align: center;
            margin: 1rem 0;
            font-size: 0.9rem;
        }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 2;
        }

        .modal {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .modal h2 {
            margin-bottom: 10px;
            color: #ff4444;
        }

        .modal p {
            color: #333;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #999;
        }

        .close-button:hover {
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="login-register login-form">
                <h1>Iniciar Sesión</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label for="login-email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="login-password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Iniciar Sesión</button>
                </form>
                <div class="switch-form">
                    <a href="{{ route('register') }}" class="switch-button">¿No tienes cuenta? Regístrate</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de error -->
    @if ($errors->has('loginError'))
    <div class="modal-overlay" id="errorModal">
        <div class="modal">
            <button class="close-button" onclick="closeModal()">&times;</button>
            <h2>Error</h2>
            <p>{{ $errors->first('loginError') }}</p>
        </div>
    </div>
    @endif

    <script>
        // Mostrar el modal si hay un error
        document.addEventListener("DOMContentLoaded", function () {
            var modalOverlay = document.getElementById('errorModal');
            if (modalOverlay) {
                modalOverlay.style.display = 'flex';
            }
        });

        // Función para cerrar el modal
        function closeModal() {
            var modalOverlay = document.getElementById('errorModal');
            if (modalOverlay) {
                modalOverlay.style.display = 'none';
            }
        }
    </script>
</body>

</html>
