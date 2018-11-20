


<?php
if($tabmenu == 'productsetting'){
	$active1 = 'active';
}
if($tabmenu == 'artworksetting'){
	$active2 = 'active';
}
if($tabmenu == 'fontsetting'){
	$active3 = 'active';
}

if($tabmenu == 'colorofprint'){
	$active4 = 'active';
}

if($tabmenu == 'priceofprint'){
	$active5 = 'active';
}

if($tabmenu == 'campaignsetting'){
	$active6 = 'active';
}

if($tabmenu == 'paymentsetting'){
	$active7 = 'active';
}
if($tabmenu == 'shippingsetting'){
	$active8 = 'active';
}
if($tabmenu == 'currencysetting'){
	$active9 = 'active';
}
if($tabmenu == 'countrysetting'){
	$active10 = 'active';
}

if($tabmenu == 'adminsetting'){
	$active11 = 'active';
}

?>

<div class="col-md-2">
	

		<div class="list-group">
		<li class="list-group-item text-center">Menu Setting</li>
		<a href="productsetting" class="list-group-item <?php if(isset($active1)){ echo $active1; } ?>">1. Product</a>	
		<a href="artworksetting" class="list-group-item <?php if(isset($active2)){echo $active2;} ?>">2. Art Work</a>
		<a href="fontsetting" class="list-group-item <?php if(isset($active3)){echo $active3;} ?>">3. Font</li>
		<a href="colorofprint" class="list-group-item <?php if(isset($active4)){echo $active4;} ?>">4. Color Of Print</a>
		<a href="priceofprint" class="list-group-item <?php if(isset($active5)){echo $active5;} ?>">5. Price Of Print</a>	
		<a href="campaignsetting" class="list-group-item <?php if(isset($active6)){echo $active6;} ?>">6. Campaign</a>
		<a href="paymentsetting" class="list-group-item <?php if(isset($active7)){echo $active7;} ?>">7. Payment</a>
		<a href="shippingsetting" class="list-group-item <?php if(isset($active8)){echo $active8;} ?>">8. Shipping Rate</a>
		<a href="currencysetting" class="list-group-item <?php if(isset($active9)){echo $active9;} ?>">9. Currency Rate</a>
		<a href="countrysetting" class="list-group-item <?php if(isset($active10)){echo $active10;} ?>">10. Country</a>
		<a href="adminsetting" class="list-group-item <?php if(isset($active11)){echo $active11;} ?>">11. Admin Setting</a>

		</div>
		

	
</div>