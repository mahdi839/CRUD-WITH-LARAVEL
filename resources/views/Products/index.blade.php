<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark">

        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="/">Products</a>
          </li>

        </ul>

      </nav>
        <div class="container ">
           <div class="text-right">
            <a href="{{ route('product.create') }}" class="btn btn-dark mt-2"> New Product</a>
           </div>
           <table class="table table-hover mt-5">
            <thead>

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>
                        Image
                    </th>
                    <th>Action</th>
                  </tr>


            </thead>
            <tbody>
                @foreach ($products as $product)
              <tr>
                <td>{{ $loop->index + 1 }}</td>

                <td><a href="products/{{ $product->id }}/show " class="text-dark"> {{ $product->name }} </a></td>
                <td> <img src="products/{{ $product->image }} " class="rounded-circle" width="50" height="50" alt=""></td>
                <td>
                  <a href="products/{{ $product->id }}/edit" class="btn btn-dark btn-small">Edit</a>


                  <form class="d-inline" method="POST" action="products/{{ $product->id }}/delete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>

            </table>
            {{ $products->links() }}
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
