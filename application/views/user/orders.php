<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">

<h4>Orders</h4>
<div class="panel panel-default">
	<div class="panel-body">



<table class="table table-striped">
	<thead>
		<tr>
			<th>Campaign Product</th>
			<th>Qty</th>
			<th>Purchased On</th>
			<th>Order Number</th>
			<th>Delivery Status</th>
			<th>Order Total</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in orderlist">
			<td>
<a href="<?php echo $base_url;?>/{{x.url}}" target="_blank" style="color:#000;">
			<img ng-src="<?php echo $base_url;?>/tmp/{{x.front_image}}" style="width: 30px;"> {{x.campaign_title}}
</a>
			</td>
			<td>{{x.qty}}</td>
			<td>{{x.adddate2}}</td>
			<td>{{x.order_number}}</td>
			<td>

<a href="<?php echo $base_url;?>/track/order/{{x.order_number}}" target="_blank" style="font-weight: bold;">
<span ng-show="x.hstatus=='0'">No Payment</span>
<span ng-show="x.hstatus!='0' && x.campaign_status=='0' || x.campaign_status=='1'">Order placed</span>
<span ng-show="x.hstatus!='0' && x.campaign_status=='2' || x.campaign_status=='3' || x.campaign_status=='4' || x.campaign_status=='5'">Printing</span>
<span ng-show="x.hstatus!='0' && x.campaign_status=='6'">Shipped</span>
<span class="glyphicon glyphicon-play" aria-hidden="true"></span>
</a>
			</td>
			<td>{{x.qty * x.price | number}}</td>
		</tr>
	</tbody>
</table>




	</div>
</div>

</div>



	<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.Getorder = function(){
$http.get("Orders/Getorders")
    .then(function(response) {
        $scope.orderlist = response.data;
    });
};
$scope.Getorder();


});

</script>