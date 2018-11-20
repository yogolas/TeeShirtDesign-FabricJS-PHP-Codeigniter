<div class="container"  ng-app="mytee" ng-controller="teeCtrl">
รายการแจ้งโอนเงิน
<div class="panel panel-default">
	<div class="panel-body">



<table class="table table-hover">
	<thead>
		<tr>
<th>หลักฐาน</th>
			
			<th>จัดการ</th>
			<th>Order Number</th>
			<th>วันที่โอน</th>
			<th>เวลาที่โอน</th>
			<th>ชื่อ</th>
			<th>ธนาคาร</th>
			<th>email</th>
			<th>โทร</th>
			<th>จำนวนเงิน</th>
			<th>รายละเอียด</th>

				<th>ลบ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
		<td><button ng-click="Openslip(x)"><img ng-src="<?php echo $base_url; ?>/file/slip/{{x.image}}" style="width: 30px;height: 30px;"></button></td>
		<td><button class="btn btn-success btn-xs" ng-click="OKthispayment(x)">ตรวจแล้วว่าโอนจริง</button></td>
			<td>{{x.order_number}}</td>
			<td>{{x.date_transfer}}</td>
			<td>{{x.time_transfer}}</td>
			<td>{{x.name}}</td>
			<td>{{x.what_bank}}</td>
			<td>{{x.email}}</td>
			<td>{{x.tel}}</td>
			<td>{{x.amount}}</td>
			<td>{{x.detail}}</td>
			
			
			<td><button class="btn btn-danger btn-xs" ng-click="Delthispayment(x)">ลบ</button></td>
		</tr>
	</tbody>
</table>


<div class="modal fade" id="Openslip">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
			
<center>
		<img ng-src="<?php echo $base_url; ?>/file/slip/{{image}}"  class="img-responsive">
</center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

$scope.Openslip = function(x){
	$('#Openslip').modal('show');
	$scope.image = x.image;
};

$scope.Getorder = function(){
$http.get("Payment_confirm/payment_confirm")
    .then(function(response) {
        $scope.list = response.data;
    });
};
$scope.Getorder();

$scope.OKthispayment = function(x){
$http({
        method : "POST",
        url : "Payment_confirm/OKthispayment_confirm",
        data : {
ID: x.ID

        }
    }).then(function mySucces(response) {
       
        $scope.Getorder();
    }, function myError(response) {
        
    });
};


$scope.Delthispayment = function(x){
$http({
        method : "POST",
        url : "Payment_confirm/Delthispayment_confirm",
        data : {
ID: x.ID

        }
    }).then(function mySucces(response) {
       
        $scope.Getorder();
    }, function myError(response) {
        
    });
};



});

</script>











