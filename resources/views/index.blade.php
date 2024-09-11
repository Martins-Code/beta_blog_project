<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
        }

        button {
            padding: 10px;
            border: none;
            background-color: #5cb85c;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .logout {
            text-align: center;
        }

        .logout button {
            background-color: #d9534f;
        }

        .logout button:hover {
            background-color: #c9302c;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
            color: #555;
        }
    </style>
</head>

<body>

    @auth
    <div class="container">
        <p class="message">Congratulations! You are logged in!!!</p>
        <div class="logout">
            <form action="/logout" method="post">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
    @else
    <div class="container">
        <h2>Register</h2>
        <form action="/register" method="post">
            @csrf
            <input type="text" name="name" id="name" placeholder="Username..." required>
            <input type="email" name="email" id="email" placeholder="Email..." required>
            <input type="password" name="password" id="password" placeholder="Password..." required>
            <button type="submit">Register</button>
        </form>
    </div>

    <div class="container">
        <h2>Login</h2>
        <form action="/login" method="post">
            @csrf
            <input type="text" name="loginname" id="username" placeholder="Username..." required>
            <input type="password" name="loginpassword" id="password" placeholder="Password..." required>
            <button type="submit">Login</button>
        </form>
    </div>
    @endauth

</body>

</html>
