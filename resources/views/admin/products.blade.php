
<!doctype html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <title>Products</title>
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>

        <table>
            <tr>
                <th>Id</th>
                <th>Quantity</th>
                <th>Name</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td> {{ $product->id }} </td>
                <td> {{ $product->quantity }} </td>
                <td> {{ $product->name }} </td>
            </tr>
            @endforeach


        </table>

    </body>
</html>