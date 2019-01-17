<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            table-layout: fixed;
            width: 400px;
            border:solid 2px black;
        };
        tr{
            height:50px;
        };
    </style>
</head>
<body>
    <table>
        <form action='/api/brand/1' method='POST' enctype="application/json">
            {{csrf_field()}}
            <tr><th>入力データ型</th>    <th>テキストボックス</th></tr>
            {{-- ブランドページ用入力テスト欄 --}}
            <tr><td>account_id</td>     <td><input type="text" name='account_id'></td></tr>
            <tr><td>brand_name</td>     <td><input type="text" name='brand_name'></td></tr>
            <tr><td>brand_url</td>      <td><input type="text" name='brand_url'></td></tr>
            <tr><td>brand_caption</td>  <td><input type="text" name='brand_caption'></td></tr>
            <tr><td>brand_telephone</td><td><input type="text" name='brand_telephone'></td></tr>
            <tr><td>brand_logo</td>     <td><input type="text" name='brand_logo'></td></tr>

            {{--  --}}
            <tr><td></td><td><input type="text"></td></tr>
            <tr><td></td><td><input type="submit" value="GO"></td></tr>
        </form>
    </table>
</body>
</html>
