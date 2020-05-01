<li class="treeview">
    <a href="#"><i class="fa fa-server"></i> <span>Manajemen Produk</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
        
        <li class="{{ Request::is('categories*') ? 'active' : '' }}">
            <a href="{!! route('categories.index') !!}"><i class="fa fa-list-alt"></i><span>Kategori</span></a>
        </li>

        <li class="{{ Request::is('items*') ? 'active' : '' }}">
            <a href="{!! route('items.index') !!}"><i class="fa fa-cubes"></i><span>Produk</span></a>
        </li>

        </ul>
</li>

<li class="{{ Request::is('customers*') ? 'active' : '' }}">
    <a href="{!! route('customers.index') !!}"><i class="fa fa-users"></i><span>Pelanggan</span></a>
</li>

<li class="{{ Request::is('suppliers*') ? 'active' : '' }}">
    <a href="{!! route('suppliers.index') !!}"><i class="fa fa-truck"></i><span>Pemasok</span></a>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-money"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
        
        <li class="{{ Request::is('purchases*') ? 'active' : '' }}">
            <a href="{!! route('purchases.index') !!}"><i class="fa fa-cart-plus"></i><span>Membeli</span></a>
        </li>

        <li class="{{ Request::is('sales*') ? 'active' : '' }}">
            <a href="{!! route('sales.index') !!}"><i class="fa fa-shopping-basket"></i><span>Penjualan</span></a>
        </li>

        </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-key"></i> <span>Hak Akses</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
        
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Pengguna</span></a>
        </li>


        </ul>
</li>


<!-- Logout -->
        <li >
            <a href="{{ route('logout') }}" 
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i><span>Logout</span></a>
        </li>