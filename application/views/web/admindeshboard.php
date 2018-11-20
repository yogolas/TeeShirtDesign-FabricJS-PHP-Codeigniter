
<?php if(isset($_GET['o'])){
unset($_SESSION['adminname']);
unset($_SESSION['system_id']);	
	}?>
<style type="text/css">
	.box {
		font-size: 25px;
		font-weight: bold;
		width: 100%;
		height: 100px;
	}
</style>

<div class="container panel panel-default" ng-app="mytee" ng-controller="teeCtrl">


<?php if(!isset($_SESSION['system_id'])){ ?>
<div class="col-md-4">
	
</div>

<div class="col-md-4 text-center">
<h1>	<b>Admin Deshboard</b>  </h1>
<form action="<?php echo $base_url;?>/admindeshboard/adminlogin" method="POST">
<input type="text" name="user" class="form-control" placeholder="User" style="height: 50px;">
<br />
<input type="password" name="pass" class="form-control" placeholder="Password" style="height: 50px;">
<br />
<button type="submit" class="btn btn-success btn-lg">เข้าสู่ระบบ</button>
</form>
</div>


<div class="col-md-4">
	
</div>
<?php } ?>



<div class="col-md-12">
	<br />
</div>
	

<?php if(isset($_SESSION['system_id'])){ ?>

<center>
<h3><b><?php echo $_SESSION['adminname']; ?></b></h3>
<form action="?o=1" method="POST">
<button type="submit" class="btn btn-default btn-lg">ออกจากระบบ</button>
</form>
</center>

<hr />

<div class="col-md-3">
<a ng-show="system_id=='1'" href="<?php echo $base_url;?>/masteradmin/productsetting" class=" btn btn-default box" target="_blank">	Admin <br />Master Setting </a>
</div>

<div class="col-md-3">
<a ng-show="system_id=='2' || system_id=='1'" href="<?php echo $base_url;?>/stock/stockpage" class=" btn btn-default box" target="_blank">	Stock <br />Item T-Shirt </a>
</div>

<div class="col-md-12">
	<br />
</div>


<div class="col-md-3">
<a ng-show="system_id=='3' || system_id=='1'" href="<?php echo $base_url;?>/saleadmin/orderall" class=" btn btn-primary box" target="_blank">	Order <br />From customer </a>
</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-3">
<a ng-show="system_id=='4' || system_id=='1'" href="<?php echo $base_url;?>/checkdesign/check" class=" btn btn-warning box" target="_blank">	Check <br />Design Campaign </a>
</div>



<div class="col-md-3">
<a ng-show="system_id=='5' || system_id=='1'" href="<?php echo $base_url;?>/orderprocess/orderall" class=" btn btn-warning box" target="_blank">	Print <br />Campaign Process </a>
</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-3">
<a ng-show="system_id=='6' || system_id=='1'" href="<?php echo $base_url;?>/orderpackaging/orderall" class=" btn btn-danger box" target="_blank">	Packaging <br />Order Packing </a>
</div>


<div class="col-md-3">
<a ng-show="system_id=='7' || system_id=='1'" href="<?php echo $base_url;?>/ordershipping/orderall" class=" btn btn-danger box" target="_blank">	Shipping <br />Campaign </a>
</div>


<div class="col-md-3">
<a ng-show="system_id=='7' || system_id=='1'" href="<?php echo $base_url;?>/ordershipped/orderall" class=" btn btn-danger box" target="_blank">	Shipped <br />Campaign </a>
</div>


<div class="col-md-12">
	<br />
</div>


<div class="col-md-3">
<a ng-show="system_id=='100' || system_id=='1'" href="<?php echo $base_url;?>/payoutsadmin/pay" class=" btn btn-success box" target="_blank">	Payouts <br />Admin </a>
</div>


<?php } ?>


<div class="col-md-12">
	<hr />
</div>
</div>








<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

<?php if(isset($_SESSION['system_id'])){ ?>

$scope.system_id = '<?php echo $_SESSION['system_id']; ?>';

<?php } ?>



});

</script>