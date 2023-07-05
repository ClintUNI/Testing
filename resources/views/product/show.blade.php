<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.typekit.net/oov2wcw.css"><!--Link to the family font-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="{{ asset('css/grid_style.css') }}" rel="stylesheet">
    @yield('style')
    @yield('title')
</head>
<body>
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-12">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Product
                        </p>
                    </header>

                    <div class="card-content">
                        <div class="content">
                            Name: <strong>{{$product->name}}</strong>
                            <br>
                            Price: <strong>{{$product->price}}</strong>
                            <br>
                            Quantity: <strong>{{$product->quantity}}</strong>
                            <br>
                            Total Price: ${{ $product->totalPrice() }}
                            <br>
                            Total Price in EUR: €{{ $product->totalPriceToEUR() }}
                            <br>
                            Created at: <strong>{{ $product->created_at }}</strong>
                        </div>
                        <div class="field is-grouped">
                            {{-- Here are the form buttons: save, reset and cancel --}}
                            <div class="control">
                                <a href="/" class="button is-primary">Edit</a>
                            </div>
                            <div class="control">
                                <form method="POST" action="/">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-group">
                                        <button class="button is-danger" type="submit">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
