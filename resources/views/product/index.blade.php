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
            <div class="column is-full">
                <div class="content">
                    @if (Session::has('msg'))
                        <div class="has-text-success text-center ">
                            <p style=" text-align:center !important;"><b>Success! </b>{!! \Session::get('msg') !!}</p>
                        </div>
                    @endif
                    @if (Auth::id() && Auth()->user()->role == 'admin')
                            <div class="has-text-right">
                                <a href="{{ route('products.create') }}" class="button is-primary">{{ __('New Product') }}...</a>
                            </div>
                    @endif

                    <div class="column is-12">
                        @forelse($products as $product)
                            <article class="panel">
                                <a class="panel-block" href="{{ route('products.show', $product) }}">
                                    <article class="media">
                                        <div class="media-content ">
                                            <div class="content">
                                                <p>
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
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                                </a>
                            </article>
                        @empty
                            <article class="panel">
                                    <article class="media">
                                        <div class="media-content ">
                                            <div class="content p-4">
                                                <p>
                                                    {{ __('There are no products, currently.') }}
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                            </article>
                        @endforelse
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>

