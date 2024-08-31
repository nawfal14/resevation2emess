<!DOCTYPE html>
<html>

<head>
    <title>Shows List</title>
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
    <h1>Shows List</h1>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Duration (mins)</th>
                <th>Date de creation</th>
                <th>Lieu</th>
                <th>Reservable</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shows as $show)
                <tr>
                    <td>{{ $show->title ?? "" }}</td>
                    <td>{{ $show->duration ?? "" }}</td>
                    <td>{{ $show->created_in ?? "" }}</td>
                    <td>{{ $show->location->designation ?? "" }}</td>
                    <td>{{ $show->bookable ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>