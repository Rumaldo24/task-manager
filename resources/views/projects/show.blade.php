<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project -Tasks</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 50%;
            /* height: 50%; */
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        h1 {
            margin-top: 20px;
            font-size: 32px;
            color: #333;
            margin-bottom: 10px;
        }

        p {
            margin-top: 20px;
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
            text-align: justify;
            padding: 10px;
        }

        .cont-title {
            display: flex;
            justify-content: space-between;
            position: absolute;
            left: 0;
            right: 0;
            bottom: 2px;
            padding: 10px;
            justify-content: center;
            gap: 20px;
        }

        .btn-back,
        .btn-detail {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            font-size: 25px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-back {
            color: #007bff;
        }

        .btn-back:hover {
            color: #0056b3;
        }

        .btn-back i,
        .btn-detail i {
            margin-right: 8px;
        }

        .btn-detail {
            color: #28a745;
        }

        .btn-detail:hover {
            color: #218838;
        }

        .btn-back:active,
        .btn-detail:active {
            transform: scale(0.98);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            h1 {
                font-size: 28px;
            }

            p {
                font-size: 16px;
            }

            .cont-title {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn-back,
            .btn-detail {
                width: 100%;
                text-align: left;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>{{ $project->name }}</h1>
        <p>{{ $project->description }}</p>
        <div class="cont-title">
            <a href="{{ route('tasks.index', $project) }}" class="btn-detail">
                <i class="fas fa-tasks"></i>
            </a>
            <a href="{{ route('projects.index', [$project]) }}" class="btn-back">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>

    </div>
</body>

</html>
