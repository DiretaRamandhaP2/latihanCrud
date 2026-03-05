<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
</head>

<body>
    <center>
        <h1>edit</h1>
        {{-- Form untuk mengedit data --}}
        <form action="/edit/{{ $data['id'] }}" method="post">
            @csrf
            <table>
                <tr>
                    <td>Name :</td>
                    <td><input type="text" name="name" value="{{ $data->name ?? '' }}" id=""></td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td><input type="email" name="email" value="{{ $data->email ?? '' }}" id=""></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <input type="hidden" name="password_lama" value="{{ $data->password ?? '' }}">
                    <td><input type="password" name="password" id=""></td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">Simpan</button>
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>
