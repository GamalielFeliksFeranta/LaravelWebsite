<!DOCTYPE HTML>
<html>
<head>
	<title>SneakItUp</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
 </head>
 <body>
    <div class="container">
        <h2 class="text-center">Cek Ongkir</h2>
        <div class="w-50">
            <form action="" method="post" class="w-50">
                @csrf
                <div class="mt-3">
                    <label for="origin">Asal Kota</label>
                    <select name="origin" id="origin" class="form-control" required>
                        <option value="">Pilih Kota Asal</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="destination">Kota Tujuan</label>
                    <select name="destination" id="destination" class="form-control" required>
                        <option value="">Pilih Kota Tujuan</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="weight">Berat Barang</label>
                    <input type="number" name="weight" id="weight" class="form-controll" required>
                </div>
                <div class="mt-3">
                    <label for="courier">Pilih Kurir</label>
                    <select name="courier" id="courier" class="form-control" required>
                        <option value="">Pilih Kurir</option>
                        <option value="jne">JNE</option>
                        <option value="pos">POS</option>
                        <option value="tiki">TIKI</option>
                    </select>
                </div>
                <div class="mt-3">
                    <input type="submit" name="cekOngkir" class="btn btn-primary w-100">
                </div>
            </form>

            <div class="mt-5">
                @if ($ongkir != '')
                    <h3>Rincian Ongkir</h3>
                    @foreach ($ongkir as $item)
                        <div>
                            <label for="name">Nama : {{ $item['name']}}</label>

                            @foreach ($item['costs'] as $cost)
                                <div class="mb-3">
                                    <label for="service">Service : {{ $cost['service']}}</label>
                                    @foreach ($cost['cost'] as $harga)
                                        <div class="mb-3">
                                            <label for="harga">
                                                Harga : {{$harga['value']}} (est : {{ $harga['etd'] }} hari)
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
 </body>
</html>