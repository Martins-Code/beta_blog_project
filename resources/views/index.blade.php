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
            flex-direction: column;
        }

        .container, .post-container {
            width: 100%;
            max-width: 500px; /* Consistent width for all containers */
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            margin: 15px auto; /* Center and add consistent spacing between sections */
        }

        h2, h1 {
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
        input[type="password"],
        textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
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

        /* Styling for All Posts */
        .all-posts {
            margin-top: 30px;
            width: 100%;
            max-width: 500px;
            text-align: left;
        }

        .post-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 15px;
        }

        .post-card h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .post-card p {
            color: #555;
        }
    </style>
</head>

<body>

    @auth

    <div class="container">
        <p class="message">Congratulations! You are logged in!!!</p>
    </div>

    <div class="post-container">
        <h2>Create a new Post</h2>
        <form action="/create-post" method="post">
            @csrf
            <input type="text" name="title" id="title" placeholder="Title">
            <textarea name="body" placeholder="Enter Blog Post..."></textarea>
            <button type="submit">Save Post</button>
        </form>
    </div>

    <!-- All Posts Section -->
    <div class="all-posts">
        <h1>All Posts</h1>
        @foreach ($posts as $post)
        <div class="post-card">
            <h3>{{ $post['title'] }}</h3>
            <p>{{ $post['body'] }}</p>
            {{-- <p><strong>By:</strong> {{ $post->user->name }}</p> --}}
        </div>
        @endforeach
    </div>

    <div class="container">
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
