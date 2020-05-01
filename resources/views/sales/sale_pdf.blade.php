<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css"> --}}
</head>
<body>
	{{-- <style type="text/css">
		table tr td,
		table tr th{
			font-size: 12pt;
		}
	</style> --}}
<center>
	<h4>Nota Pembelian</h4>
</center>
<center>
<div>
	<table class='table table-bordered'>
		<tr>
			<td>
				<h4>Echonk Oulet</h4>
					<p>Gg. 12 A No. 52, Gadang,<br>
					Kec. sukun, Kota Malang,<br>
					Kota Malang, Jawa Timur,<br>
					65132</p>
			</td>
			<td>
				<h4>Pembelian</h4>
					<p>{{\Carbon\Carbon::parse($sale->created_at)->format('d-M-Y')}}<br>
					Id Pembelian: {{$sale->id}} </p>
					<p>
						instagram 	: echonkmx<br>
						whatsapp	: 0858-5559-9901
					</p>
			</td>
		
			<td>
				<h4>Pelanggan</h4>
					<p>Nama		: ......................<br>
					Terima kasih atas pembelian <br> Anda
					di Echonk Outlet</p>
			</td>
		</tr>
	</table>
</div>
</center>

<div class="row">
	<div class="col-md-12">
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th class="col-md-1 text-center">No</th>
					<th class="col-md-5 text-center">Nama</th>
					<th class="col-md-5 text-center">Harga satuan</th>
					<th class="col-md-2 text-center">Jumlah</th>
					<th class="col-md-2 text-center">Total</th>
					</tr>
			</thead>
			<tbody>
					@foreach($sale->sale_detail as $row=>$item)
					<tr>
					<td class="text-center">{{$row + 1 }}</td>
					<td class="text-center">{{$item->item->name}}</td>
					<td class="text-center">{{$item->item->price}}</td>
					<td class="text-center">{{$item->qty}}</td>
					<td class="text-center">{{$item->sub_total}}</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="4" class="text-center">Total</td>
						<td class="text-center">{{$sale->total}}</td>
					</tr>
			</tbody>
		</table>
	</div>
</div>
 
</body>
</html>
