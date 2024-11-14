<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Project</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-weight: 600;
            color: #555;
            margin-bottom: 0.5rem;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #4a90e2;
            outline: none;
        }

        textarea {
            min-height: 120px;
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

        .btn-submit {
            display: inline-block;
            padding: 0.8rem;
            background-color: #4a90e2;
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #357ab8;
        }

        .btn-submit:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.3);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Project</h1>
        <form method="POST" action="{{ route('projects.update', $project) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ $project->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ $project->description }}</textarea>
            </div>
            <div class="botones">
                <a href="{{ route('projects.index', [$project]) }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <button type="submit" class="btn-submit">Update</button>
            </div>
        </form>
    </div>
</body>

</html>
