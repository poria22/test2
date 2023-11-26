<html dir="rtl">
<head>
    <meta charset="UTF-8" >
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100" >
        <div class="col-8 ">

            <table class=" table table-hover  shadow-lg bg-body rounded rounded">
                <thead>
                <tr>
                    <th scope="col">شماره</th>
                    <th scope="col">تصویر</th>
                    <th scope="col">نام</th>
                    <th scope="col">تعداد</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}} </td>
                    <td><img src="{{$product->getImage()}}" class="img-fluid rounded" alt="تصویر" style="width: 40px"></td>
                    <td>{{$product->Name}}</td>
                    <td><input class="updateNumberInput" type="number" value="{{$product->Number}}" data-item-id="{{$product->id}}"></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <button class="btn btn-success submitButton" id="submitButton">ثبت تغییرات</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#submitButton').click(function(e) {
            var updatedProducts = [];
            $('.updateNumberInput').each(function() {
                var productId = $(this).data('item-id');
                var number = $(this).val();
                updatedProducts.push({
                    id: productId,
                    number: number
                });
            });

            $.ajax({
                type: 'PUT',
                url: "{{ route('product.update', $product->id) }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    products: updatedProducts
                },
                success: function(response) {
                    console.log(response);
                    alert('تغییرات با موفقیت ذخیره شدند!');
                    location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    alert('خطایی رخ داده است. لطفاً مجدداً تلاش کنید!');
                }
            });
        });
    });
</script>
</body>
</html>
