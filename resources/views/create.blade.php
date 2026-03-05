<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
</head>

<body>
    <center>
        <h1>Create</h1>
        <form action="/create" method="post">
            @csrf
            <table>
                <tr>
                    <td>Name :</td>
                    <td><input type="text" name="name" id=""></td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td><input type="text" name="email" id=""></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="text" name="password" id=""></td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">Create</button>
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>
