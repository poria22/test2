<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" >
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

</head>
<body>
<div class="container-fluid text-right">
    <div class="row vh-100 justify-content-center align-items-center">
        <form class="col-md-5 shadow-lg p-3 mb-5 bg-body rounded rounded" action="{{route('product.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            <p class="fs-5 fw-light">فرم ثبت قطعه</p><hr>
            <div class="mb-3">
                <label for="Name" class="form-label">نام قطعه</label>
                <input type="text" class="form-control" id="Name" name="Name">
            </div>
            @error('Name')
            <p style="color: red">{{$message}}</p>
            @enderror
            <div class="mb-3">
                <label for="Weight" class="form-label">وزن(کیلوگرم)</label>
                <input type="number" step="0.1" class="form-control" id="Weight" name="Weight">
            </div>
            @error('Weight')
            <p style="color: red">{{$message}}</p>
            @enderror
            <div class="mb-3">
                <label for="Number" class="form-label">تعداد</label>
                <input type="number" class="form-control" id="Number" name="Number">
            </div>
            @error('Number')
            <p style="color: red">{{$message}}</p>
            @enderror
            <label for="Image" class="form-label">تصویر محصول</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="Image" name="Image">
                <label class="input-group-text" for="Image">بارگیری</label>
            </div>
            @error('Image')
            <p style="color: red">{{$message}}</p>
            @enderror
            <div class="mb-3 text-center mt-4">
                <button type="submit" class="btn btn-outline-success">ثبت مشخصات</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
