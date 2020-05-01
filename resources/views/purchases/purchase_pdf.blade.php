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
<div class="row">
	<table>
		<tr>
			<th>
							<div class="col-md-4">
							<h4>Echonk outlet</h4>
            <p>Gg. 12 A No. 52, Gadang,</p>
            <p>Kec. sukun, Kota Malang,</p>
            <p>Kota Malang, Jawa Timur</p>
            <p>65132</p>
							</div>
			</th>
			<th>
					<div class="col-md-4">
							<h4>Pembelian</h4>
							<p>{{\Carbon\Carbon::parse($purchase->created_at)->format('d-M-Y')}}</p>
							<p>ID : {{$purchase->id}} </p>
							<p>User : {{$purchase->user->name}} </p>
						</div>
			</th>
			<th>
					<div class="col-md-4">
							<h4>Pemasok</h4>
							<p>Nama : {{$purchase->supplier->name}}</p>
							<p>Alamat : {{$purchase->supplier->address}}</p>
							<p>Telp : {{$purchase->supplier->handphone}}</p>
							<p>Email :{{$purchase->supplier->email}}</p>
						</div>
			</th>
		</tr>
	</table>
</div>
<div class="row">
	<div class="col-md-12">
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th class="col-md-3 text-center">No</th>
					<th class="col-md-5 text-center">Nama</th>
					<th class="col-md-2 text-center">harga</th>
					<th class="col-md-2 text-center">Jumlah</th>
					<th class="col-md-2 text-center">Total</th>
					</tr>
			</thead>
			<tbody>
				@foreach($purchase->purchase_detail as $row=>$item)
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
						<td class="text-center">{{$purchase->total}}</td>
					</tr>
			</tbody>
		</table>
	</div>
</div>
 
</body>
</html>