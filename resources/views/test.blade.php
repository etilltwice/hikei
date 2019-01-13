<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <form action='/api/temp_image' medhod='POST' enctype="multipart/form-data">
            {{csrf_field()}}
            <tr><td>json</td>  <td><input type="text" name='json'></td></tr>
            <tr><td></td><td><input type="submit" value="GO"></td></tr>
        </form>
    </table>
</body>
</html>
