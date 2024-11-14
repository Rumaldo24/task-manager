<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project create</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
            text-align: center;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        .botones {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #e70d0d;
            padding: 10px 20px;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s, transform 0.3s;
            text-transform: uppercase;
        }

        .btn-back i {
            margin-left: 10px;
        }

        .btn-back:hover {
            color: #ee4444;
            transform: scale(1.05);
        }

        .btn-back:active {
            color: #004080;
        }

        button {
            padding: 12px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 480px) {
            .form-container {
                width: 90%;
                padding: 20px;
            }

            h1 {
                font-size: 20px;
            }

            label {
                font-size: 13px;
            }

            input[type="text"],
            textarea {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Create Project</h1>
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf
            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <div class="botones">
                <a href="{{ route('projects.index') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
</body>

</html>
