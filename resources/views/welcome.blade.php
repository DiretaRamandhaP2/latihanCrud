<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
</head>

<body>
    <center>
        <a href="/create"><button>Create</button></a>
        <br>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                {{-- Untuk Menampilkan data --}}
                @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>
                            <a href="/edit/{{ $user['id'] }}"><button>Edit</button></a>
                            <a href="/delete/{{ $user['id'] }}"><button>Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>
</body>

</html>
