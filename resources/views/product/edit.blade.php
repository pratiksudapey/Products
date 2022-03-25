<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Product Create</title>
</head>
<body>
    <div class="container">
        <div class="row mt-3" style="display: flex; justify-content: center">
            <h2 class="text-center">Product Edit Form</h2><br>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route("product.index")}}" class="btn btn-primary lg">Back</a>
                    </div>
                    <div class="card-body">
                      <form action="{{route("product.update", ["product"=> $product->id])}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                          @csrf

                          <div class="form-group">
                              <label for="name">Product Name</label>
                              <input id="name" class="form-control" type="text" name="name" value="{{$product->name}}">
                          </div>
                          <div class="form-group mt-3">
                              <label for="price">Price</label>
                              <input id="price" class="form-control" type="number" name="price" value="{{$product->price}}">
                          </div>
                          <div class="form-group mt-3">
                              <label for="description">Description</label>
                              <input id="description" class="form-control" type="text" name="description" value="{{$product->description}}">
                          </div>
                          <div class="form-group mt-3">
                              <label for="image">Image</label>
                              <input id="image" class="form-control" type="file" name="image"value="{{$product->name}}" >
                          </div>
                          <button type="submit" class="btn btn-primary mt-3">Submit</button>
                      </form>
                    </div>
                </div>

            </div>
          </div>
    </div>



</body>
</html>
