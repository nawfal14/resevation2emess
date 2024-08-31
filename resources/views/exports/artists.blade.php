<!DOCTYPE html>
<html>

<head>
    <title>Artists List</title>
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
    <h1>Artistes</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Types</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artists as $artist)
                <tr>
                    <td>{{ $artist->firstname ?? "" }}</td>
                    <td>{{ $artist->lastname ?? ""}}</td>
                    <td>
                        @foreach($artist->types as $type)
                            {{ $type->name }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>