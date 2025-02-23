<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table,thead, th, tr, td{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 20px;
    }
</style>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        @if ($products->count())
        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{"R" .$product->price}}</td>
            <td>{{$product->stock}}</td>
            <td>
                <img src="{{asset($product->image_url)}}" alt="{{$product->name}}" width="100px" height="100px">
            </td>
            <td> <button></button> </td>
           </tr>
        @endforeach
        @else
            <p>There are no products</p>
        @endif
       
      
    </table>



    
</body>
</html>