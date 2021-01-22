<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        
        <div class="container py-3 p-3">
            <div class="title h1 text-center">Wally’s Widget Company</div>
            <div class="card">
                <div class="row ">
                    <div class="col-md-7 p-5">
                        <form method="post" action="{{ route('order') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity Value:</label>
                                <input type="text" class="form-control" name="value" placeholder="Enter quantity" id="quantity" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <hr> 
                        @if (session('result'))
                            <div class="card card-body resultCard">
                                <div class="container">
                                    <h2> Product Details</h2>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Number of Widgets</th>
                                                <th>Product delivered</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @forelse (session('result') as $key =>  $r)
                                                    <td>{{ $r }}</td>
                                                @empty
                                                    No Results
                                                @endforelse
                                            </tr>
                                        </tbody>
                                    </table>
                                  </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
 
        <script>
            setTimeout(function() {
                $('.resultCard').hide();
            }, 5000); 
        </script>
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    </body>
</html>