<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project -Tasks</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 50px auto;
        }

        h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }

        p {
            font-size: 18px;
            color: #666;
            text-align: center;
        }

        .cont-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        h2 {
            font-size: 28px;
            color: #007bff;
            margin-bottom: 1px;
            text-align: center;
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

        .description {
            text-align: justify;
            margin-left: 10px;
        }

        .status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 4px;
            text-transform: capitalize;
            display: inline-block;
            margin-top: 10px;
            text-align: right;
            margin-left: 100px;
        }

        .status.pendiente {
            color: #f44336;
            text-align: right;
        }

        .status.progreso {
            color: #ff9800;
        }

        .status.completada {
            color: #4caf50;
        }

        .tasks {
            background-color: #b3b1b1;
            padding: 20px;
            border-radius: 15px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
            height: calc(100vh - 150px);
            overflow-y: auto;
            padding-bottom: 20px;
        }

        .task-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
            display: flex;
            flex-direction: column;
            height: 300px;
            transition: transform 0.3s ease;
        }

        .task-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .task-card h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 5px;
            text-align: center;
        }

        .task-card p {
            font-size: 14px;
            color: #777;
            margin-bottom: 5px;
        }

        .task-card .task-info {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        .task-card .task-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        .btn {
            padding: 10px 15px;
            font-size: 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            color: white;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn-detail {
            color: #28a745;
        }

        .btn-detail:hover {
            color: #218838;
        }

        .btn-edit {
            color: #007bff;
        }

        .btn-edit:hover {
            color: #0056b3;
        }

        .btn-delete {
            color: #dc3545;
        }

        .btn-delete:hover {
            color: #c82333;
        }

        .create-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .create-btn:hover {
            background-color: #0056b3;
        }

        /* Modal Styles */
        #modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
        }

        #modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        .modal-btn {
            margin: 10px;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-btn-yes {
            background-color: #dc3545;
            color: white;
        }

        .modal-btn-no {
            background-color: #28a745;
            color: white;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
            padding-top: 100px;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .modal-content {
            background-color: white;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            width: 40%;
            max-width: 600px;
        }

        .modal-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .modal-button {
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .modal-button-yes {
            background-color: #dc3545;
            color: white;
        }

        .modal-button-no {
            background-color: #28a745;
            color: white;
        }

        .modal-button:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>{{ $project->name }}</h1>
        <p>{{ $project->description }}</p>
        <div class="cont-title">
            <a href="{{ route('tasks.create', $project) }}" class="create-btn">Create Task</a>
            <h2>Tasks</h2>
            <a href="{{ route('projects.index', [$project]) }}" class="btn-back">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <div class="tasks">
            @foreach ($tasks as $task)
                <div class="task-card">
                    <h3>{{ $task->title }}</h3>
                    <p class="description">{{ Str::limit($task->description, 100, '...') }}</p>
                    <div class="task-info">
                        <p class="description">{{ $task->due_date }}</p>
                        <p class="description">
                            <span class="status {{ strtolower($task->status) }}">{{ $task->status }}</span>
                        </p>
                    </div>
                    <div class="task-buttons">
                        <a href="{{ route('tasks.show', [$project, $task]) }}" class="btn btn-detail">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a href="{{ route('tasks.edit', [$project, $task]) }}" class="btn btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-delete" onclick="openModal({{ $task->id }})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Global Modal -->
    <div id="modal" class="modal">
        <div id="modal-content" class="modal-content">
            <p>¿Estás seguro que deseas eliminar este tarea?</p>
            <div class="modal-footer">
                <button class="modal-btn modal-btn-no" id="modalBtnNo">No</button>
                <button class="modal-btn modal-btn-yes" id="modalBtnYes">Yes</button>
            </div>
        </div>
    </div>

    <script>
        let modal = document.getElementById("modal");
        let modalBtnYes = document.getElementById("modalBtnYes");
        let modalBtnNo = document.getElementById("modalBtnNo");
        let taskToDelete = null;

        function openModal(taskId) {
            taskToDelete = taskId;
            modal.style.display = "flex";
        }

        modalBtnNo.onclick = function() {
            modal.style.display = "none";
        }

        modalBtnYes.onclick = function() {
            if (taskToDelete) {
                let form = document.createElement('form');
                form.action = "/projects/{{ $project->id }}/tasks/" + taskToDelete;
                form.method = "POST";
                form.innerHTML = `
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                `;
                document.body.appendChild(form);
                form.submit();
            }
            modal.style.display = "none";
        }
    </script>
</body>

</html>
