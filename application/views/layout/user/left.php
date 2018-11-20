


<?php
if($tabmenu == 'campaigns'){
	$active1 = 'active';
}

if($tabmenu == 'stores'){
	$active2 = 'active';
}

if($tabmenu == 'orders'){
	$activeo = 'active';
}

if($tabmenu == 'message'){
	$active3 = 'active';
}

if($tabmenu == 'promotion'){
	$active4 = 'active';
}

if($tabmenu == 'setting'){
	$active5 = 'active';
}


if($tabmenu == 'payouts'){
	$active6= 'active';
}



?>

<div class="col-md-2">
	

		<div class="list-group">
		<a href="campaigns" class="list-group-item <?php if(isset($active1)){ echo $active1; } ?>"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Campaigns</a>	
		<a href="stores" class="list-group-item <?php if(isset($active2)){echo $active2;} ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Stores</a>
		<a href="orders" class="list-group-item <?php if(isset($activeo)){echo $activeo;} ?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Orders</a>

		<!-- 
		<a href="message" class="list-group-item <?php if(isset($active3)){echo $active3;} ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Message</li>
		<a href="promotion" class="list-group-item <?php if(isset($active4)){echo $active4;} ?>"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Promotion</a> -->



		<a href="payouts" class="list-group-item <?php if(isset($active6)){echo $active6;} ?>"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Payouts</a>	
		<a href="setting" class="list-group-item <?php if(isset($active5)){echo $active5;} ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Setting</a>	

		</div>
		

	
</div>