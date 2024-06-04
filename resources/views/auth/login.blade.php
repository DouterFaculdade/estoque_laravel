<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            width: 350px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }

        .form {
            display: flex;
            flex-direction: column;
        }

        .group {
            position: relative;
            margin-bottom: 20px;
            padding-right: 20px;
        }

        .group label {
            font-size: 14px;
            color: rgb(99, 102, 102);
            position: absolute;
            top: -10px;
            left: 10px;
            background-color: #fff;
            transition: all .3s ease;
            padding: 0 5px;
        }

        .group input,
        .group textarea {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            outline: 0;
            width: 100%;
            background-color: transparent;
        }

        .group input:placeholder-shown + label,
        .group textarea:placeholder-shown + label {
            top: 10px;
            background-color: transparent;
        }

        .group input:focus,
        .group textarea:focus {
            border-color: #3366cc;
        }

        .group input:focus + label,
        .group textarea:focus + label {
            top: -10px;
            left: 10px;
            background-color: #fff;
            color: #3366cc;
            font-weight: 600;
            font-size: 14px;
        }

        .group textarea {
            resize: none;
            height: 100px;
        }

        form button {
            background-color: #3366cc;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        form button:hover {
            background-color: #27408b;
        }

        .error-message {
            color: red;
            margin-bottom: 1em;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            color: #3366cc;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="title">Login</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            @if ($errors->has('login_error'))
                <div class="error-message">
                    {{ $errors->first('login_error') }}
                </div>
            @endif

            <div class="form">
                <div class="group">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder=" ">
                    <label for="email">Email</label>
                </div>
                <div class="group">
                    <input type="password" id="password" name="password" required placeholder=" ">
                    <label for="password">Password</label>
                </div>
                <button type="submit">Login</button>
            </div>
        </form>
        <div class="register-link">
            <p>Não tem uma conta? <a href="{{ route('register') }}">Registre-se</a></p>
        </div>
    </div>
</body>
</html>
