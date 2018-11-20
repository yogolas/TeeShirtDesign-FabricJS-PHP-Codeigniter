<div class="container"  ng-app="mytee" ng-controller="teeCtrl">
รายการร้องขอเบิกเงิน
<div class="panel panel-default">
	<div class="panel-body">
		


<input type="text" ng-model="searchtext" placeholder="ค้นหา..." class="form-control" style="width: 200px;">

<table class="table table-hover">
	<thead>
		<tr>
			<th>email user</th>
			<th>จำนวนขายรวม</th>
			<th>กำไรรวม</th>
			<th>email paypal</th>
			<th>จำนวนเงินที่เบิก</th>
			<th>วันที่ร้องขอ</th>
			<th>สถานะ</th>
			<th>#</th>
			<th>#</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in payoutslist | filter: searchtext">
			<td>{{x.email}}</td>
			<td>{{x.salenum_all |number}}</td>
			<td>{{x.profit_all | number}}</td>
			<td>{{x.email_paypal}}</td>
			<td style="color: red;font-weight: bold;">{{x.amount | number}}</td>
			<td>{{x.adddate2}}</td>
			<td><span ng-show="x.status=='0'" style="color: green;font-weight: bold;">เบิกเงิน</span></td>
			<td><button id="paynow-{{$index}}" class="btn btn-primary btn-xs" ng-click="Paynow(x,$index)">โอนแล้ว</button></td>
				<td>
		
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">

    <!-- Identify your business so that you can collect the payments. -->
    <input type="hidden" name="business"
        value="{{x.email_paypal}}">

    <input type="hidden" name="cmd" value="_xclick">

    <input type="hidden" name="item_name" value="PAY FROM TEE">
    <input type="hidden" name="item_number" value="<?php time().uniqid();?>">
    <input type="hidden" name="amount" value="{{x.amount | number}}">
    <input type="hidden" name="currency_code" value="THB">

    <!-- Display the payment button. -->
    <button class="btn btn-success btn-xs" type="image" name="submit"
    alt="Donate">คลิกโอนเงิน PAYPAL</button>
   

</form>
		
	</td>
		</tr>
	</tbody>
</table>






	</div>
</div>

</div>




<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.Getpayoutslist = function(){
$http.get("Pay/Getpayoutslist")
    .then(function(response) {
        $scope.payoutslist = response.data;
    });
};
$scope.Getpayoutslist();



$scope.Paynow = function(x,$index){

$('#paynow-'+ $index).prop('disabled',true);

$http({
        method : "POST",
        url : "Pay/Paynow",
        data : {
payouts_id: x.payouts_id,
amount: x.amount,
email_paypal: x.email_paypal,
user_id: x.user_id

        }
    }).then(function mySucces(response) {
$scope.Getpayoutslist();
    }, function myError(response) {
        
    });
};








});

</script>



