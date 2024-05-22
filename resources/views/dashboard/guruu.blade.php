<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            flex: 0 0 250px;
            background-color: #343a40;
            color: white;
            padding: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .navbar,
        .footer {
            flex: 0 0 auto;
        }

        .main-content {
            flex: 1 1 auto;
            padding: 20px;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Guru</h2>
        <a href="/guru/matapelajaran">Mata Pelajaran</a>
        <a href="/materi">Materi</a>
        <a href="/guru/quiz">Quiz</a>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="dropdown-item">
                Logout
            </button>
        </form>
    </div>

    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/guruu">Guru Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item pe-2">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="main-content">
            @yield('body')
        </div>

        <footer class="footer bg-light text-center">
            <div class="container">
                <span class="text-muted">&copy; 2024 CUS(Cerdas, Unggul, Sukses)</span>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>

    <script>
        feather.replace();
    </script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>
