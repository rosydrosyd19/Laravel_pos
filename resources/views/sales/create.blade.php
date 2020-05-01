@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penjualan
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'sales.store']) !!}

                        @include('sales.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $('document').ready(function(){
        $('#customer_stock').select2();
        $('.select-item').select2();

        $('.select-item').on('select2:select',function(e){
            var id = $(this).val();
            $.get('/item/'+id,function(data,status){
                $('#stock').focus();
            });
        });
    });
    $('document').ready(function() {
        $('#customer_id').select2();
        $('#customer_stock').select2();
        $('.select-item').select2();
        
        $('.select-item').on('select2:select',function(e){
            var id = $(this).val();
            $.get('/item/'+id,function(data,status){
                $('#price').val(data.price);
                $('#stock').val(data.stock);
                $('#qty').focus();
            });
        });
        var i=1;
        $('#btn-tambah').click(function(e){
            if (!$('#qty').val()) {
               alert('Jumlah harus diisi');
               e.preventDefault();
          }
          else{
            var item = $('.select-item').select2('data');
            var stock = $('.select-item').select2('data');
            var name = item[0].text; //mendapatkan nama item yang dipilih dari dropdown item
            var item_id = item[0].id; //mendapatkan nama item yang dipilih dari dropdown item
            var stock_id = stock[0].id;
            var price = parseInt($('#price').val());
            var qty = parseInt($('#qty').val());
            var stock1 = parseInt($('#stock').val());
            var sub_total = (price*qty); //engisi input id sub_total dengan perkaloan harga*jumlah
            if(stock1-qty < 0){
                alert('Stock Kurang');
                e.preventDefault();
            }else{
            $('#sub_total').val(price*qty);
            $("#daftar-penjualan").append('<div class="row">'+
                   '<div class="col-md-1"><center>'+i+'</center></div>'+
                   '<div class="col-md-2"><input type="hidden" name="item_id[]" value="'+item_id+'"><input type="text" readonly class="text-center form-control" name="nama[]" value="'+name+'"></div>'+
                   '<div class="col-md-3 "><input type="text" readonly class="text-center form-control" name="price[]" value="'+price+'"></div>'+
                   '<div class="col-md-3 "><input type="text" readonly class="text-center form-control" name="qty[]" value="'+qty+'"></div>'+
                   '<div class="col-md-3 "><input type="text" readonly class="text-center form-control sub_total" name="sub_total[]" value="'+sub_total+'"></div>'+
                   '</div>');
                   i++;
                   var total = 0;
                   $(".sub_total").each(function() {total += parseInt($(this).val());});
               $('#total').val(total);
            e.preventDefault();
        }
        }
        });
    });
</script>    
@endsection