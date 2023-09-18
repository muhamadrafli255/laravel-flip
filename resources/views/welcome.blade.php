<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="mt-5 mb-3 text-center">
            <h3>List Produk</h3>
        </div>
        <div class="row">
            @foreach ($products as $data)
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $data->image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $data->name }}</h5>
                      <p>{{ "Rp " . number_format($data->price,2,',','.') }}</p>
                        <form action="/api/createbill" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <input type="hidden" name="title" value="{{ $data->name }}">
                            <input type="hidden" name="amount" value="{{ $data->price }}">
                            <input type="hidden" name="type" value="SINGLE">
                            <input type="hidden" name="expired_date" value="{{ \Carbon\Carbon::now()->addDay(2)->format('Y-m-d H:i') }}">
                            {{-- <input type="hidden" name="redirect_url" value="https://flip.test"> --}}
                            <button type="submit" class="btn btn-primary">Beli Sekarang</button>
                        </form>
                    </div>
                  </div>
                </div>
                @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>