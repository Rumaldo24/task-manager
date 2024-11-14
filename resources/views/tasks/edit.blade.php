<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Task</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f8fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 700px;
            padding: 40px;
            background-color: #ffffff;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 20px;
            box-sizing: border-box;
        }

        h1 {
            font-size: 2rem;
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 1rem;
            font-weight: 600;
            color: #4f4f4f;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            font-size: 1rem;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f7f7f7;
            color: #333;
            width: 100%;
            outline: none;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #007bff;
            background-color: #ffffff;
        }

        textarea {
            resize: vertical;
            min-height: 150px;
        }

        button {
            font-size: 1rem;
            padding: 12px 18px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 1.6rem;
            }

            .container {
                width: 90%;
                padding: 25px;
            }

            label {
                font-size: 0.95rem;
            }

            button {
                font-size: 0.95rem;
            }
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            margin-top: 5px;
        }

        .form-group button {
            margin-top: 20px;
            width: auto;
            align-self: flex-end;
        }

        .button-group {
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Task for {{ $project->name }}</h1>
        <form method="POST" action="{{ route('tasks.update', ['project' => $project->id, 'task' => $task->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" type="text" name="title" value="{{ $task->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ $task->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="due_date">Due Date</label>
                @php
                    use Carbon\Carbon;
                @endphp
                <input id="due_date" type="date" name="due_date"
                    value="{{ Carbon::parse($task->due_date)->format('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="pendiente" {{ $task->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en progreso" {{ $task->status == 'en progreso' ? 'selected' : '' }}>En Progreso
                    </option>
                    <option value="completada" {{ $task->status == 'completada' ? 'selected' : '' }}>Completada</option>
                </select>
            </div>
            <div class="button-group">
                <button type="submit">Update</button>
                <a href="{{ route('tasks.index', [$project]) }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </form>
    </div>
</body>

</html>
