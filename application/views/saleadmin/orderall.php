<div class="container"  ng-app="mytee" ng-controller="teeCtrl">
Order
<div class="panel panel-default">
	<div class="panel-body">
		

<input type="text" name="" ng-model="searchtext" placeholder="ค้นหา" class="form-control" style="width: 250px;">
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th>Order Number</th>
			<th>ชื่อลูกค้า</th>
			<th>Email</th>
			<th>Tel</th>
			<th>จำนวนเสื้อ</th>
			<th>ยอดเงิน</th>
			<th>วันที่</th>
			<th>สถานะการชำระเงิน</th>
			<th>ยืนยันการชำระเงิน</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in orderlist | filter:searchtext">
			<td><button class="btn btn-default" ng-click="Openorder(x)">{{x.order_number}}</button></td>
			<td>{{x.name}}</td>
			<td>{{x.email}}</td>
			<td>{{x.tel}}</td>
			<td style="text-align: right;">{{x.order_numall | number}}</td>
			<td style="text-align: right;">{{x.price_all | number}}</td>
			<td>{{x.adddate2}}</td>
			<td>
<span ng-if="x.status=='0'" class="label label-warning">รอการชำระงเิน</span>
			</td>
			<td>
				<button class="btn btn-success" ng-click="OKthispayment(x)">ชำระเงินแล้ว</button>

			</td>
		</tr>
	</tbody>
</table>



<div class="modal fade" id="openorder">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Order Number: {{order_number}}
				<br />
ซื้อโดย: {{name}} <br />
อีเมล์: {{email}}<br />
โทร: {{tel}}
				</h4>
			</div>
			<div class="modal-body">
				

<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th>#</th>
			<th>Campaign</th>
			<th>Size</th>
			<th>สี</th>
			<th>จำนวน</th>
			<th>ราคา</th>
			<th>รวม</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in myorderlist">
			<td width="50px;"><img ng-src="<?php echo $base_url; ?>/tmp/{{x.front_image}}" class="img-responsive">
			</td>
			<td>{{x.campaign_title}}
			</td>
			<td>{{x.product_size_name}}</td>
			<td>{{x.product_color_name}}</td>
			<td>{{x.qty}}</td>
			<td>{{x.price}}</td>
			<td>{{x.qty * x.price | number}}</td>
		</tr>
	</tbody>
</table>

<center>
	
	<h3>
จำนวนเสื้อทั้งหมด {{order_numall}} ตัว  ค่าส่ง {{shipping}} บาท   รวมทั้งหมด {{price_all | number}} บาท	
</h3>

</center>




			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>



	</div>
</div>

</div>




<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {


$scope.Getorder = function(){
$http.get("Orderall/Getorder")
    .then(function(response) {
        $scope.orderlist = response.data;
    });
};
$scope.Getorder();

$scope.OKthispayment = function(x){
$http({
        method : "POST",
        url : "Orderall/OKthispayment",
        data : {
order_number: x.order_number

        }
    }).then(function mySucces(response) {
        $('#Openmodaladdcategory').modal('hide');
        $scope.Getorder();
    }, function myError(response) {
        
    });
};


$scope.Openorder = function(x){
	$scope.order_number = x.order_number;
	$scope.shipping = x.shipping;
    $scope.price_all = x.price_all;
	$scope.order_numall = x.order_numall;
	$scope.name = x.name;
	$scope.email = x.email;
	$scope.tel = x.tel;
$http({
        method : "POST",
        url : "Orderall/Myorder",
        data : {
order_number: x.order_number

        }
    }).then(function mySucces(response) {
        $('#openorder').modal('show');
        $scope.myorderlist = response.data;
    }, function myError(response) {
        
    });

};

});

</script>



