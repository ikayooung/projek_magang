<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amplop Besar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body class="container-fluid">

    <div class="row">
        @foreach ($customer as $c)
        <div class="col-md-4 mt-2">
            <div class="card bg-white border border-black">
                <div class="card-body">
                    <h5> Kepada Yth. </h5>
                    <h5>{{$c->nama_perusahaan}}</h5>
                    <h5>{{$c->alamat_invoice}}</h5>
                    <h5>{{ $c->contact_person }}</h5>
                    <h5>{{$c->no_telepon}}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        window.print()
    </script>
</body>
</html>
