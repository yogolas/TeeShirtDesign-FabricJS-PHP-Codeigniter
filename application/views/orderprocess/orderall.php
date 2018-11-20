<div class="container"  ng-app="mytee" ng-controller="teeCtrl">
Campaign Process
<div class="panel panel-default">
	<div class="panel-body">
		


		<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="waitprocess active"><a href="#waitprocess" aria-controls="waitprocess" role="tab" data-toggle="tab">Campaign Wait For ProCess</a></li>
    <li role="presentation"><a href="#process" aria-controls="process" role="tab" data-toggle="tab">Campaign Processing</a></li>
  </ul>


<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active" id="waitprocess">
แคมเปญรอการปริ้น ออเดอร์จากลูกค้าที่ทำการสั่งซื้อ
<input type="text" ng-model="searchcid" placeholder="Campaign ID" class="form-control" style="width: 200px;">

<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width: 60px;">Campaign ID</th>
			<th>ไฟล์ Design</th>
			<th>ชื่อ campaign</th>
			
			<th>รายการสั่งซื้อ</th>
				
			<th>สถานะ</th>		
			<th>ตรวจสอบ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in campaignlist | filter:searchcid">
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
<span ng-if="x.campaign_status=='1'" class="label label-warning">รอปริ้น</span>
			</td>
			<td>
				<button class="btn btn-success" ng-click="Okthisprocess(x)">เริ่มปริ้น</button>

			</td>
		</tr>
	</tbody>
</table>

</div>
  <div role="tabpanel" class="tab-pane fade" id="process">


แคมเปญกำลังปริ้น

<input type="text" ng-model="searchcid2" placeholder="Campaign ID" class="form-control" style="width: 200px;">

<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width: 60px;">Campaign ID</th>
			<th>ไฟล์ Design</th>
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
<span ng-if="x.campaign_status=='2'" class="label label-warning">กำลังปริ้น</span>
			</td>
			<td>
				<button class="btn btn-success" ng-click="Okthisprocesssuccess(x)">ปริ้นเรียบร้อย</button>

			</td>
		</tr>
	</tbody>
</table>




</div>
</div>



<div class="modal fade" id="Openorder">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Order</h4>
				<h2 class="modal-title">Campaign ID: {{campaign_id}}</h2>
			</div>
			<div class="modal-body">
				

<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>แบบเสื้อ</th>
			<th>ขนาด</th>
			<th>สี</th>
			<th>จำนวน</th>

			<th>จำนวนคงเหลือใน stock</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in orderlist" style="font-size: 20px;">
			<td>{{x.product_style_name}}</td>
			<td>{{x.product_size_name}}</td>
			<td>{{x.product_color_name}}</td>
			<td align="right"  style="color: red">{{x.qty | number}}</td>

			<td align="right"><i>{{x.instock | number}}</i></td>
		</tr>
	</tbody>
</table>


			</div>
			<div class="modal-footer">
			
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
<br />
<a href="<?php echo $base_url; ?>/file/design/{{front_design_image}}" target="_blank"  class="btn btn-default">ภาพ Design ขนาดใหญ่</a>
	
	</td>
		<td align="center">
		<img ng-src="<?php echo $base_url; ?>/tmp/{{back_image}}" class="img-responsive">
หลัง 
<br />
<a href="<?php echo $base_url; ?>/file/design/{{back_design_image}}" target="_blank" class="btn btn-default">ภาพ Design ขนาดใหญ่</a>

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

$scope.front_design_image = x.front_design_image;
$scope.back_design_image = x.back_design_image;
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
      //  $scope.Getcampaign();
    }, function myError(response) {
        
    });
};





});

</script>



