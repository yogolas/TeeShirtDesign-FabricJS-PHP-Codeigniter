
<center><h1 style="font-weight: bold;">Order Number: <?php echo $order_number;?></h1></center>

<div class="container panel panel-default">
	
<style type="text/css">
	.label-default{
		background-color: #ccc;
	}
</style>

<?php
if(!isset($hstatus)){
	header( "location:".$this->base_url."/track?no=1" );
}

if($hstatus!='0' && $cstatus=='0' || $cstatus=='1'){
	$status1 = 'success';
	$status2 = 'default';
$status3 = 'default';
}else if($hstatus!='0' && $cstatus!='0'  && $cstatus!='1'   && $cstatus!='6'){
$status1 = 'default';
$status2 = 'success';
$status3 = 'default';
}else if($hstatus!='0' && $cstatus=='6'){
$status1 = 'default';
$status2 = 'default';
$status3 = 'success';
}else{
	$status1 = 'default';
$status2 = 'default';
$status3 = 'default';
}



?>

<div class="col-md-12">
<hr />
<div class="col-md-4">
	<div class="label label-<?php echo $status1;?>" style="font-size: 30px;width: 100%;display: block;height: 150px;">
		<br />
		<span class="glyphicon glyphicon-ok-sign" aria-hidden="true" style="font-size: 60px;"></span> Order placed 
	</div>
</div>

<div class="col-md-4">
	<div class="label label-<?php echo $status2;?>"  style="font-size: 30px;width: 100%;display: block;height: 150px;">
	<br />
		<span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="font-size: 60px;"></span> Printing
	</div>
</div>

<div class="col-md-4">
	<div class="label label-<?php echo $status3;?>" style="font-size: 30px;width: 100%;display: block;height: 150px;">
	<br />
		<span class="glyphicon glyphicon-plane" aria-hidden="true" style="font-size: 60px;"></span> Shipped
	</div>
</div>


</div>

<div class="col-md-12">
<hr />
</div>


</div>
