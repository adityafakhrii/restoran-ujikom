<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
	  <a class="navbar-brand mr-auto ml-5" href="/">Restoran</a>

	    <ul class="navbar-nav mr-5" >
	      <li class="nav-item">
	        <a class="nav-link" href="/daftarmenu">Daftar Menu</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="/keranjang">Keranjang</a>
	      </li>
	      @if(Session::has('dibayar'))
	      <li class="nav-item">
	        <a class="nav-link" href="/pesanan-saya">Pesanan saya</a>
	      </li>
	      @endif
	    </ul>
	    <form class="form-inline my-2 my-lg-0" method="GET" action="/search">
	      <input class="form-control mr-sm-2" type="text" name="search" placeholder="Cari menu">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
    	</form>
</nav>