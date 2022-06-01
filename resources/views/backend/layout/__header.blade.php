<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
	  <a class="navbar-brand mr-auto ml-5" href="/dashboard">Restoran</a>

	    <ul class="navbar-nav mr-5" >
	      <li class="nav-item">
	        <a class="nav-link" href="/dashboard">Dashboard</a>
	      </li>
	      @if(auth()->user()->role == 'admin')
	      <li class="nav-item">
	        <a class="nav-link" href="/daftarmenu-admin">Daftar Menu</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="/waiter">Data Waiter</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="/kasir">Data Kasir</a>
	      </li>
	      <li>
	        <a href="/data-transaksi" class="nav-link">Data Transaksi</a>
	      </li>
	      <li>
	        <a href="/data-pesanan" class="nav-link">Data Pesanan</a>
	      </li>
	      @endif
	      
	      @if(auth()->user()->role == 'waiter')
	      <li class="nav-item">
	        <a class="nav-link" href="/data-pesanan">Data Pesanan</a>
	      </li>
	      @endif

	      @if(auth()->user()->role == 'kasir')
	      <li>
	        <a href="/data-transaksi" class="nav-link">Data Transaksi</a>
	      </li>
	      @endif

	      @if(auth()->user()->role == 'owner')
	      <li>
	        <a href="/data-transaksi" class="nav-link">Data Transaksi</a>
	      </li>
	      <li>
	        <a href="/data-pesanan" class="nav-link">Data Pesanan</a>
	      </li>
	      @endif

	      <li class="nav-item">
	        <a href="/logout" class="nav-link btn-sm btn-outline-danger">Logout</a>
	      </li>


	    </ul>
	</nav>