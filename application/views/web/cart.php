<div class="container panel panel-default" ng-app="mytee" ng-controller="teeCtrl">
	
<center  ng-show="listbuy==''">
<br /><br />
<img src="<?php echo $base_url;?>/img/cart.png" width="150px">
<h1><b>
Your cart is empty.
</b>
</h1>
<br />
</center>

<div  ng-show="listbuy!=''">

	<h3>รายการสั่งซื้อ</h3>

<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>size</th>
			<th>จำนวน</th>
			<th>ราคา</th>
			<th>รวม</th>
			<th>#</th>
		</tr>
	</thead>
	<tbody>
	<tr ng-show="listbuy==''">
		<td colspan="6" class="text-center">ไม่มีรายการ</td>
	</tr>
		<tr ng-repeat="x in listbuy">
		
			<td>
			<img ng-if="x.show_back_first=='0'" ng-src="{{x.front_image}}" style="width: 50px;">
			<img ng-if="x.show_back_first=='1'" ng-src="{{x.back_image}}" style="width: 50px;">
			</td>
			<td>{{x.sizename}}</td>
			<td>{{x.qty}}</td>
			<td>{{x.price}}</td>
			<td>{{x.price * x.qty | number}}</td>
			<td><button class="btn btn-danger btn-xs" ng-click="Delbuy($index)">x</button></td>
		</tr>
		<tr>
		<td colspan="6" class="text-center" style="font-size: 20px;font-weight: bold;">รวมทั้งหมด {{sumqty() | number}} ตัว  ราคา {{sumprice() | number}} บาท</td>
		

		</tr>
	</tbody>
</table>

<hr />

<div class="text-right"><button class="btn btn-success btn-lg" ng-click="Payment()">ชำระเงิน</button></div>

<hr />

</div>



</div>


<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.listbuy = [];

<?php if(isset($_SESSION['listbuy'])){ ?>
$scope.sessionlist = <?php echo  json_encode($_SESSION['listbuy'], JSON_UNESCAPED_UNICODE ); ?>
<?php }else{ ?>
$scope.sessionlist = [];
<?php
} ?>


$scope.listbuy = $scope.sessionlist;

$scope.sumqty = function(){
	var sum = 0;
	angular.forEach($scope.listbuy,function(item){
sum += item.qty;
	});
	return sum;
};


$scope.sumprice = function(){
	var sum = 0;
	angular.forEach($scope.listbuy,function(item){
sum += (item.price*item.qty);
	});
	return sum;
};


$scope.Delbuy = function(index){


$scope.listbuy.splice(index,1);

$http({
        method : "POST",
        TYPE : "JSON",
        url : "Shop/Buy",
        data : {
listbuy: $scope.listbuy
        }
    }).then(function mySucces(response) {
       


    }, function myError(response) {
        
    });	



};

$scope.Payment = function(){
	window.open ('<?php echo $base_url; ?>/cart/payment','_self',false);
};


});

</script>