<nav>
	<ul>
		<li><a class="rest-menu" href="/">Restaurant</a></li>
	</ul>
	<ul class="ul-right">
		<li class="menu-cari">
			<form action="/carimenu">
				@csrf
				<input type="text" name="search" placeholder="Cari menu..." class="cari">
				<button class="btn btn-cari cari" type="submit">Cari</button>
			</form>
		</li>
		<li><a class="rest-menu2" href="/">Home</a></li>
		<li><a class="rest-menu2" href="/daftarmenu">Menu</a></li>
		<li><a class="rest-menu2" href="/keranjang">Keranjang</a></li>
	</ul>
</nav>