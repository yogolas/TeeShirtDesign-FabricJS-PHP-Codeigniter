<div class="container panel panel-default" ng-app="mytee" ng-controller="teeCtrl">
	<br />
	<div class="col-md-12" style="font-size: 20px;font-weight: bold;">Checkout</div>

	<div class="col-md-12">
<hr />
</div>
	<div class="col-md-6">
ข้อมูลติดต่อ<br/>
<input type="text" name="" placeholder="อีเมล์" class="form-control" ng-model="email">
<hr />		
ที่อยู่สำหรับจัดส่ง <br />

<input type="text" name="" placeholder="ชื่อ-นามสกุล" class="form-control" ng-model="name">
<br />
<textarea class="form-control" placeholder="ที่อยู่" ng-model="address"></textarea>

<br />

<input type="text" name="" placeholder="จังหวัด" class="form-control" style="width: 50%;" ng-model="province">
<br />
<input type="text" name="" placeholder="รหัสไปรษณีย์" class="form-control" style="width: 50%;" ng-model="zip">
<br />
<input type="text" name="" placeholder="หมายเลขโทรศัพท์" class="form-control" style="width: 50%;" ng-model="phone">
<br />
<select class="form-control" ng-model="country_name" style="width: 150px;">
	<option value="Thailand">Thailand</option>
</select>

<br />
<hr />
Payment Info <br />



<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>ธนาคาร</th>
			<th>เลขบัญชี</th>
			<th>ชื่อบัญชี</th>
			<th>สาขา</th>
		</tr>
	</thead>
	<tbody>
<?php 

foreach ($banklist as $row) {
echo '


		<tr>
			<td>
<input type="radio" ng-model="paymentcheck" name="bankcheck" value="'.$row['payment_bank_id'].'">
			</td>
			<td>'.$row['payment_bank_name'].'</td>
			<td>'.$row['payment_bank_number'].'</td>
			<td>'.$row['payment_bank_accountname'].'</td>
			<td>'.$row['payment_bank_branch'].'</td>
		</tr>


';
}

?>
	</tbody>
</table>

<table class="table table-bordered">
	<tbody>
		<tr>
			<td><input type="radio" ng-model="paymentcheck" name="bankcheck" value="creditcard">
Credit  Card
<br />
<span ng-show="paymentcheck=='creditcard'">
	
<input type="number" name="" placeholder="credit card number" class="form-control">
<br />

<form class="form-inline">
  <div class="form-group">
    <input type="number" class="form-control" id="mm" placeholder="MM" style="width: 33%;">

    <input type="number" class="form-control" id="yyyy" placeholder="YYYY" style="width: 33%;">

    <input type="number" class="form-control" id="cvc" placeholder="CVC" style="width: 32%;">
  </div>

</form>
<br />
<input type="number" class="form-control" id="cvc" placeholder="Billing zip" style="width: 50%;">

</span>
			</td>
		</tr>
		<tr>
			<td><input type="radio" ng-model="paymentcheck"  name="bankcheck" value="paypal">
			Paypal
			</td>
		</tr>
	</tbody>
</table>

<hr />

<button id="ordersuccess" ng-hide="paymentcheck=='creditcard' || paymentcheck=='paypal'" class="btn btn-success btn-lg" ng-click="Paymentsubmit()" style="width: 100%">
<span class="glyphicon glyphicon-refresh spin" ng-show="ordersuccess" aria-hidden="true" >	</span>
ชำระเงินผ่าน บัญชีธนาคาร</button>
<button id="ordersuccess" ng-show="paymentcheck=='creditcard'" class="btn btn-warning btn-lg" ng-click="Paymentcreditcardsubmit()" style="width: 100%">
<span class="glyphicon glyphicon-refresh spin" ng-show="ordersuccess" aria-hidden="true" >	</span>
ชำระเงินผ่าน บัตรเครดิต</button>




 <form ng-show="paymentcheck=='paypal'" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank">
        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="yogolaspas@gmail.com">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="Omerka">
        <input type="hidden" name="item_number" value="<?php echo time(); ?>">
        <input type="hidden" name="amount" value="{{sumprice() + shippingprice}}">
        <input type="hidden" name="currency_code" value="THB">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://localhost/paypal_integration_php/cancel.php'>
        <input type='hidden' name='return' value='http://localhost/paypal_integration_php/success.php'>
        

        <button id="ordersuccess" name="submit" ng-show="paymentcheck=='paypal'" class="btn btn-primary btn-lg" ng-click="Paymentpaypalsubmit()" style="width: 100%">
<span class="glyphicon glyphicon-refresh spin" ng-show="ordersuccess" aria-hidden="true" >	</span>
ชำระเงินผ่าน Paypal</button>

    </form>


<hr />
	</div>

	<div class="col-md-6">

<div class="col-md-6" style="font-size: 20px;font-weight: bold;">Order Summary</div>	
<div class="col-md-6 text-right">
<a href="<?php echo $base_url; ?>/cart">Modify Order</a>
</div>


<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>size</th>
			<th style="text-align: center;">จำนวน</th>
			<th>ราคา</th>
			<th style="text-align: right;">รวม</th>
			
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
			<td align="center">{{x.qty}}</td>
			<td>{{x.price}}</td>
			<td align="right">{{x.price * x.qty | number}}</td>
			
		</tr>
		<tr>
		<td>รวม</td>
		<td colspan="5" class="text-right" style="font-size: 20px;font-weight: bold;">{{sumprice() | number}} บาท</td>
		

		</tr>
		<tr>
		<td>ค่าจัดส่ง</td>
		<td colspan="6" class="text-right" style="font-size: 20px;font-weight: bold;"> {{shippingprice}} บาท</td>
		

		</tr>
		<tr>
		<td>รวมทั้งสิ้น</td>
		<td colspan="6" class="text-right" style="font-size: 20px;font-weight: bold;"> <span style="color: red;"> {{sumprice() + shippingprice | number}} </span> บาท</td>
		

		</tr>
	</tbody>
</table>

</div>



</div>


<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.country_name = 'Thailand';
$scope.shippingprice = 0;
$scope.listbuy = [];
$scope.email = '<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>';

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


$scope.Paymentsubmit = function(){
$('#ordersuccess').prop('disabled', true);
$scope.ordersuccess= true;
$http({
        method : "POST",
        TYPE : "JSON",
        url : "paymentsubmit",
        data : {
email: $scope.email,
name: $scope.name,
address: $scope.address,
province: $scope.province,
zipcode: $scope.zip,
tel: $scope.phone, 
country_name: $scope.country_name,
shipping: $scope.shippingprice,
paymentcheck: $scope.paymentcheck,  
order_numall: $scope.sumqty(),
price_all:  $scope.sumprice() + $scope.shippingprice,	
listbuy: $scope.listbuy
        }
    }).then(function mySucces(response) {
      
      setTimeout(function(){ 
    	window.open ('<?php echo $base_url; ?>/cart/ordersuccess','_self',false);
    	 }, 3000);	




    }, function myError(response) {
        
    });	



};


});

</script>