<div class="container"  ng-app="mytee" ng-controller="teeCtrl">
Campaign Wait Shipping
<div class="panel panel-default">
	<div class="panel-body">
		




Order แคมเปญ รอส่ง

<input type="text" ng-model="searchcid2" placeholder="Campaign ID" class="form-control" style="width: 200px;">

<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width: 60px;">Campaign ID</th>
			<th>รูป</th>
			<th>ชื่อ campaign</th>
			<th>รายการสั่งซื้อ</th>

			<th>สถานะ</th>		
			<th>ตรวจสอบ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in campaignprocesslist | filter:searchcid2">
			<td>{{x.campaign_id}}</td>
		<td width="60px">
				<button class="btn btn-default" ng-click="Opentee(x)">
				<img ng-src="<?php echo $base_url; ?>/tmp/{{x.front_image}}" class="img-responsive"></button>
			</td>
			
			<td>{{x.campaign_title}}</td>
			<td width="60px">
				<button class="btn btn-default" ng-click="Openorder(x)">Order</button>
			</td>

			<td>
			<span ng-if="x.campaign_status=='6'" class="label label-success">ส่งแล้ว</span>
			</td>
			<td>
				<button class="btn btn-success" ng-click="Okthisprocesssuccess(x)">ส่ง</button>

			</td>
		</tr>
	</tbody>
</table>





<div class="modal fade" id="Openorder">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Order</h4>
				<h2 class="modal-title">Campaign ID: {{campaign_id}}</h2>
			</div>
			<div class="modal-body">
				
<div style="height: 600px;overflow: auto;">
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th></th>
			<th>Order Number</th>
			<th>ชื่อลูกค้า</th>

			<th>จำนวนที่ต้องแพ็ค</th>

			<th>สถานะ</th>
			
			
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in orderlist" style="font-size: 20px;">
		<td style="width: 20px;text-align: center;">{{$index+1}}</td>
			<td><button class="btn btn-default" ng-click="Openodno(x)">{{x.order_number}}</button></td>
			<td>{{x.name}}</td>
			
<td>{{x.qty}}</td>
			<td>
				<span ng-show="x.odstatus=='0'" class="label label-warning">รอแพ็ค</span>
				<span ng-show="x.odstatus=='1'" class="label label-success">แพ็คเรียบร้อย</span>
			</td>

			
		
		</tr>
	</tbody>
</table>
</div>

			</div>
			<div class="modal-footer">
			
			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="Openodno">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Order No: {{order_number}}</h4>
			</div>
			<div class="modal-body">
		
		{{name}}
		 {{address}} 
		 {{province}} 
		{{country_name}}
		 {{zipcode}}		
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th>รูปแบบ</th>
			<th>ขนาด</th>
			<th>สี</th>
			<th>จำนวน/ตัว</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in getorderlist" style="font-size: 20px;">
			<td>{{x.product_style_name}}</td>
			<td>{{x.product_size_name}}</td>
			<td>{{x.product_color_name}}</td>
			<td>{{x.qty}}</td>
		</tr>
	</tbody>
</table>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
			</div>
		</div>
	</div>
</div>











<div class="modal fade" id="Opentee">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Check Design</h4>
			</div>
			<div class="modal-body">
				

<center>
<table>
	<tr>
		<td align="center">
	<img ng-src="<?php echo $base_url; ?>/tmp/{{front_image}}" class="img-responsive">
หน้า 
	
	</td>
		<td align="center">
		<img ng-src="<?php echo $base_url; ?>/tmp/{{back_image}}" class="img-responsive">
หลัง 

		</td>
	</tr>
</table>


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


$scope.Getcampaign = function(){
$http.get("Orderall/Getcampaign")
    .then(function(response) {
        $scope.campaignlist = response.data;
    });
};
$scope.Getcampaign();



$scope.Getcampaignprocess = function(){
$http.get("Orderall/Getcampaignprocess")
    .then(function(response) {
        $scope.campaignprocesslist = response.data;
    });
};
$scope.Getcampaignprocess();



$scope.Okthisprocess = function(x){
$http({
        method : "POST",
        url : "Orderall/Okthisprocess",
        data : {
campaign_id: x.campaign_id

        }
    }).then(function mySucces(response) {
       $scope.Getcampaignprocess();
        $scope.Getcampaign();
    }, function myError(response) {
        
    });
};


$scope.Okthisprocesssuccess = function(x){
$http({
        method : "POST",
        url : "Orderall/Okthisprocesssuccess",
        data : {
campaign_id: x.campaign_id

        }
    }).then(function mySucces(response) {
       $scope.Getcampaignprocess();
        $scope.Getcampaign();
    }, function myError(response) {
        
    });
};



$scope.Opentee = function(x){
$('#Opentee').modal('show');
$scope.front_image = x.front_image;
$scope.back_image = x.back_image;
};


$scope.Openorder = function(x){
$('#Openorder').modal('show');
$scope.campaign_id = x.campaign_id;
$http({
        method : "POST",
        url : "Orderall/Openorder",
        data : {
campaign_id: x.campaign_id

        }
    }).then(function mySucces(response) {
       $scope.orderlist = response.data;
        
    }, function myError(response) {
        
    });
};



$scope.Okthisdetailpackok = function(x){
$http({
        method : "POST",
        url : "Orderall/Okthisdetailpackok",
        data : {
order_number: x.order_number

        }
    }).then(function mySucces(response) {
      $scope.Openorder(x);
    }, function myError(response) {
        
    });
};

$scope.Openodno = function(x){
$('#Openodno').modal('show');
$scope.order_number = x.order_number;
$scope.name = x.name;
$scope.address = x.address;
$scope.province = x.province;
$scope.country_name = x.country_name;
$scope.zipcode = x.zipcode;
$http({
        method : "POST",
        url : "Orderall/Openodno",
        data : {
order_number: x.order_number

        }
    }).then(function mySucces(response) {
       $scope.getorderlist = response.data;
        
    }, function myError(response) {
        
    });
};





});

</script>



