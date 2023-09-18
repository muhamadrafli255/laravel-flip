<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-5">
            <h3>List Transaksi</h3>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Status</th>
                <th scope="col">Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transaction as $data)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="{{ $data->Product->image }}" class="w-25 h-25"></td>
                <td>{{ $data->Product->name }}</td>
                <td>{{ "Rp " . number_format($data->Product->price,2,',','.') }}</td>
                @if ($data->status == "ACTIVE")
                    <td><span class="badge bg-warning">Belum Di Bayar</span></td>
                @else
                    <td><span class="badge bg-warning">Sukses</span></td>
                @endif
                @if ($data->status == "ACTIVE")
                    <td><a href="{{ $data->url }}" class="btn btn-success">Bayar</a></td>
                @else
                    <td><button class="btn btn-secondary disabled">Bayar</button></td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>