<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projects</title>
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
            text-align: center;
            margin-bottom: 30px;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            color: #0056b3;
        }

        .create-btn {
            margin: 20px auto;
            padding: 12px 20px;
            background-color: #1165bf;
            color: white;
            text-align: center;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .create-btn:hover {
            background-color: #2c82de;
            color: white;
        }

        .projects {
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

        .project-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 200px;
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .project-card h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .project-card p {
            font-size: 14px;
            color: #777;
            margin-bottom: 15px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: auto;
        }

        .btn-detail,
        .btn-edit,
        .btn-delete {
            display: inline-block;
            padding: 10px 15px;
            font-size: 20px;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
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

        /* Estilos para el perfil y el menú desplegable */
        .profile-container {
            position: fixed;
            top: 50px;
            right: 100px;
            cursor: pointer;
        }

        .profile-icon {
            font-size: 24px;
            color: #333;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 35px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 10px;
            min-width: 150px;
            z-index: 1;
        }

        .dropdown-menu a {
            color: #333;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .dropdown-menu a:hover {
            background-color: #f4f7fc;
        }
    </style>
</head>

<body>
    <div class="profile-container" onclick="toggleDropdown()">
        <i class="fas fa-user profile-icon"></i>
        <div id="dropdown-menu" class="dropdown-menu">
            <a href="#" onclick="logout()">Cerrar sesión</a>
        </div>
    </div>
    <div class="container">
        <h1>My Projects</h1>
        <div>
            <a href="{{ route('projects.create') }}" class="create-btn">Create Project</a>
        </div>

        <div class="projects">
            @foreach ($projects as $project)
                <div class="project-card">
                    <h3>{{ $project->name }}</h3>
                    <p>{{ Str::limit($project->description, 100, '...') }}</p>

                    <div class="button-container">
                        <a href="{{ route('tasks.index', $project) }}" class="btn-detail">
                            <i class="fas fa-tasks"></i>
                        </a>
                        <a href="{{ route('projects.edit', $project) }}" class="btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('projects.show', [$project]) }}" class="btn btn-detail">
                            <i class="fas fa-eye"></i>
                        </a>

                        <button class="btn-delete" onclick="openModal({{ $project->id }})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Modal for deletion confirmation -->
    <div id="modal">
        <div id="modal-content">
            <h3>¿Estás seguro que deseas eliminar este proyecto?</h3>
            <button class="modal-btn modal-btn-yes" id="modal-btn-yes">Yes</button>
            <button class="modal-btn modal-btn-no" id="modal-btn-no">No</button>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById("dropdown-menu");
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        }

        // Cerrar sesión y redirigir al login
        function logout() {
            let form = document.createElement('form');
            form.action = "/logout";
            form.method = "POST";
            form.innerHTML = `<input type="hidden" name="_token" value="{{ csrf_token() }}">`;
            document.body.appendChild(form);
            form.submit();
        }

        window.onclick = function(event) {
            const dropdown = document.getElementById("dropdown-menu");
            if (event.target !== dropdown && !dropdown.contains(event.target) && event.target.className !== 'profile-container') {
                dropdown.style.display = "none";
            }
        }

        let modal = document.getElementById("modal");
        let modalBtnYes = document.getElementById("modal-btn-yes");
        let modalBtnNo = document.getElementById("modal-btn-no");
        let projectToDelete = null;

        function openModal(projectId) {
            projectToDelete = projectId;
            modal.style.display = "block";
        }

        modalBtnNo.onclick = function() {
            modal.style.display = "none";
        }

        modalBtnYes.onclick = function() {
            if (projectToDelete) {
                let form = document.createElement('form');
                form.action = "/projects/" + projectToDelete;
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

        // Close modal if clicked outside of the modal content
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
