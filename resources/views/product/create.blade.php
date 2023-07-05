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
                <form method="POST" action="{{ route('products.store') }}">
                    @csrf
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Add a new Product
                            </p>
                        </header>

                        <div class="card-content">
                            <div class="content">
                                <div class="field">
                                    <label class="label">Name</label>
                                    <div class="control">
                                            <textarea
                                                name="name"
                                                class="input @error('name') is-danger @enderror"
                                                type="text"
                                                rows="1"
                                                placeholder="Name of the product..."></textarea>
                                    </div>
                                    @error('name')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label">Price</label>
                                    <div class="control">
                                            <textarea
                                                name="price"
                                                class="textarea @error('price') is-danger @enderror"
                                                type="number"
                                                rows="1"
                                                placeholder="A positive number..."></textarea>
                                    </div>
                                    @error('price')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label">Quantity</label>
                                    <div class="control">
                                            <textarea
                                                name="quantity"
                                                class="textarea @error('quantity') is-danger @enderror"
                                                rows="1"
                                                placeholder="A positive number..."></textarea>
                                    </div>
                                    @error('quantity')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field is-grouped">
                                {{-- Here are the form buttons: save, reset and cancel --}}
                                <div class="control">
                                    <button type="submit" class="button is-primary">Save</button>
                                </div>
                                <div class="control">
                                    <button type="reset" class="button is-warning">Reset</button>
                                </div>
                                <div class="control">
                                    <a type="button" href="{{ route('products.index') }}" class="button is-light">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
