
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
    <h1>一時イメージ入力テスト欄</h1>
    <table>
        <form action='/web/temp_image' method='POST' enctype="multipart/form-data" >
            {{csrf_field()}}
            <tr><th>入力データ型</th>    <th>テキストボックス</th></tr>
            <tr><td>file: </td><td><input type="file" name="images"></td></tr>

            <tr><td></td><td><input type="text" name="hoge"></td></tr>
            <tr><td></td><td><input type="submit" value="GO"></td></tr>
        </form>
    </table>
    <h1>ブランドページ用入力テスト欄</h1>
    <table>
        <form action='/api/brand/1' method='POST' enctype="application/json">
            {{csrf_field()}}
            <tr><th>入力データ型</th>    <th>テキストボックス</th></tr>
            <tr><td>account_id</td>     <td><input type="text" name='account_id'></td></tr>
            <tr><td>brand_name</td>     <td><input type="text" name='brand_name'></td></tr>
            <tr><td>brand_url</td>      <td><input type="text" name='brand_url'></td></tr>
            <tr><td>brand_caption</td>  <td><input type="text" name='brand_caption'></td></tr>
            <tr><td>brand_telephone</td><td><input type="text" name='brand_telephone'></td></tr>
            <tr><td>brand_logo</td>     <td><input type="text" name='brand_logo'></td></tr>
            <tr><td></td><td><input type="text" name="hoge"></td></tr>
            <tr><td></td><td><input type="submit" value="GO"></td></tr>
        </form>
    </table>
    <h1>プロダクト作成用入力テスト欄</h1>
    <table>
        <form action='/api/product' method='POST' enctype="application/json">
            {{csrf_field()}}
            <tr><th>入力データ型</th>    <th>テキストボックス</th></tr>
            <tr><td>brand_id</td>       <td><input type="text" name="brand_id"></td></tr>
            <tr><td>project_name</td>   <td><input type="text" name="project_name"></td></tr>
            <tr><td>project_caption</td><td><input type="text" name="project_caption"></td></tr>
            <tr><td>product_name</td>   <td><input type="text" name="product_name"></td></tr>
            <tr><td>product_price</td>  <td><input type="text" name="product_price"></td></tr>
            <tr><td>product_cost</td>   <td><input type="text" name="product_cost"></td></tr>
            <tr><td>product_size</td>   <td><input type="text" name="product_size"></td></tr>
            <tr><td>product_caption</td><td><input type="text" name="product_caption"></td></tr>
            <tr><td></td><td><input type="text" name="hoge"></td></tr>
            <tr><td></td><td><input type="submit" value="GO"></td></tr>
        </form>
    </table>
    <h1>プロジェクト作成</h1>
    <table>
        <form action='/api/project' method='POST' enctype="application/json" >
            {{csrf_field()}}
            <tr><th>入力データ型</th>    <th>テキストボックス</th></tr>
            <tr><td>name: </td>    <td><input type="text" name="project_name"></td></tr>
            <tr><td>caption: </td> <td><input type="text" name="project_caption"></td></tr>
            <tr><td>brand_id: </td><td><input type="text" name="project_brand_id"></td></tr>
            <tr><td>file: </td>    <td><input type="hidden" name="project_image" id="hidden" value='[{"temp_image_id": 1,"project_image_caption": "実験中"}, {"temp_image_id": 2, "project_image_caption":"できるといいけどなぁ" }]' ></td></tr>

            <tr><td></td><td><input type="text" name="hoge"></td></tr>
            <tr><td></td><td><input type="submit"></td></tr>
        </form>
    </table>

    <h1>プロダクト作成</h1>
    <table>
        <form action='/api/product' method='POST' enctype="application/json" >
            {{csrf_field()}}
            <tr><th>入力データ型</th> <th>テキストボックス</th></tr>
            <tr><td>project_id: </td><td><input type="text"   name="project_id" ></td></tr>
            <tr><td>name: </td>      <td><input type="text"   name="product_name"></td></tr>
            <tr><td>price: </td>     <td><input type="text"   name="product_price"></td></tr>
            <tr><td>cost: </td>      <td><input type="text"   name="product_cost"></td></tr>
            <tr><td>size: </td>      <td><input type="text"   name="product_size"></td></tr>
            <tr><td>caption: </td>   <td><input type="text"   name="product_caption"></td></tr>
            <tr><td>numbers: </td>   <td><input type="hidden" name="image_numbers" value='[3, 4]' ></td></tr>

            <tr><td></td><td><input type="submit"></td></tr>
        </form>
    </table>

    <h1>簡易画像アップロード</h1>
    <table>
        <form action='/api/project/image' method='POST' enctype="application/json" >
            {{csrf_field()}}
            <tr><th>入力データ型</th> <th>テキストボックス</th></tr>
            <tr><td>temp_image_id: </td>        <td><input type="text" name="temp_image_id" ></td></tr>
            <tr><td>project_image_caption: </td><td><input type="text" name="project_image_caption"></td></tr>
            <tr><td>project_id: </td>           <td><input type="text" name="project_id"></td></tr>

            <tr><td></td><td><input type="submit"></td></tr>
        </form>
    </table>
</body>
</html>
