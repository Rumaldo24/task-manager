<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>task</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 600px;
            width: 100%;
        }

        .content{
            padding: 20px;
        }
        h1 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .title {
            margin-left: 50px;
        }

        p {
            color: #555;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .description {
            font-style: italic;
            color: #777;
        }

        .descp {
            margin-left: 42px;
        }

        .date {
            margin-left: 55px;
        }

        .status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 4px;
            text-transform: capitalize;
            display: inline-block;
            margin-top: 10px;
            margin-left: 70px;
        }

        .status.pendiente {
            color: #f44336;
        }

        .status.progreso {
            color: #ff9800;
        }

        .status.completada {
            color: #4caf50;
        }

        .cont-title {
            margin-top: 2rem;
        }

        .btn-detail {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s, transform 0.3s;
            text-transform: uppercase;
        }

        .btn-detail i {
            margin-left: 10px;
        }

        .btn-detail:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-detail:active {
            background-color: #004080;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <h1>Title: <span class="title">{{ $task->title }}</span> </h1>
            <p>Description: <span class="descp">{{ $task->description }}</span></p>
            <p class="description">Due Date: <span class="date">{{ $task->due_date }}</span></p>

            <p>
                Status: <span class="status {{ strtolower($task->status) }}">{{ $task->status }}</span>
            </p>
            <div class="cont-title">
                <a href="{{ route('tasks.index', [$project]) }}" class="btn-detail">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
