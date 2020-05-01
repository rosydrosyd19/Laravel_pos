<div class="row">
    <div class="col-md-4 col-sm-4">
        <!-- <h4>{{ config('app.name') }}</h4> -->
        <h4>Echonk outlet</h4>
        <address>
            <p>Gg. 12 A No. 52, Gadang,</p>
            <p>Kec. sukun, Kota Malang,</p>
            <p>Jawa Timur</p>
            <p>65132</p>
        </address>
    </div>
    <div class="col-md-4 col-sm-4">
        <h4>Penjualan</h4>
        <p>{{\Carbon\Carbon::parse($sale->created_at)->format('d-M-Y')}}</p>
        <p>ID : {{$sale->id}} </p>
        <p>Pelanggan : {{$sale->customer->name}} </p>
    </div>
    <div class="col-md-4 col-sm-4">
        <h4>Pelanggan</h4>
        <p>Nama : {{$sale->customer->name}}</p>
        <p>Address : {{$sale->customer->address}}</p>
        <p>Telp : {{$sale->customer->phone}}</p>
        <p>Email :{{$sale->customer->email}}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3>Detail Penjualan</h3>
        <table class="table table-bordered">
            <tr>
                <th class="col-md-1 text-center">No</th>
                <th class="col-md-3 text-center">Produk</th>
                <th class="col-md-3 text-center">Harga</th>
                <th class="col-md-2 text-center">Jumlah</th>
                <th class="col-md-3 text-center">Total</th>
            </tr>
            @foreach ($sale->sale_detail as $row=>$item)
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
        </table>
    </div>
</div>