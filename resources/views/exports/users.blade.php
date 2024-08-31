<!DOCTYPE html>
<html>

<head>
    <title>Users List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Utilisateurs</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->firstname ?? ""}}</td>
                    <td>{{ $user->lastname ?? ""}}</td>
                    <td>{{ $user->email ?? ""}}</td>
                    <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>