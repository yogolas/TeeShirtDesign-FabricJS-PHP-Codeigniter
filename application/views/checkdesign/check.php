




<div class="container"  ng-app="mytee" ng-controller="teeCtrl">
Campaign Have Order
<div class="panel panel-default">
	<div class="panel-body">
		

<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width: 60px;">Campaign ID</th>
			<th>รูป</th>
			
			<th>ชื่อ campaign</th>
			<th>วันที่เริ่มแคมเปญ</th>		
			<th>วันที่สิ้นสุดแคมเปญ</th>	
			<th>ตรวจสอบ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in campaignlist">
			<td>{{x.campaign_id}}</td>
			<td width="60px">
				<button class="btn btn-default" ng-click="Opentee(x)"><img ng-src="<?php echo $base_url; ?>/tmp/{{x.front_image}}" class="img-responsive"></button>
			</td>
			
			<td>{{x.campaign_title}}</td>
			<td>{{x.adddate2}}</td>
			<td>{{x.enddate2}}</td>
			<td>
				<button class="btn btn-success" ng-click="OKthischeck(x)">ผ่าน</button>

			</td>
		</tr>
	</tbody>
</table>



<div class="modal fade" id="Opentee">
	<div class="modal-dialog modal-lg">
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
<a href="<?php echo $base_url; ?>/file/design/{{front_design_image}}" target="_blank"  class="btn btn-default">ดูภาพ Design ขนาดใหญ่</a>
	
	</td>
		<td align="center">
		<img ng-src="<?php echo $base_url; ?>/tmp/{{back_image}}" class="img-responsive">
หลัง 
<br />
<a href="<?php echo $base_url; ?>/file/design/{{back_design_image}}" target="_blank" class="btn btn-default">ดูภาพ Design ขนาดใหญ่</a>

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
$http.get("Check/Getcampaign")
    .then(function(response) {
        $scope.campaignlist = response.data;
    });
};
$scope.Getcampaign();

$scope.OKthischeck = function(x){
$http({
        method : "POST",
        url : "Check/OKthischeck",
        data : {
campaign_id: x.campaign_id

        }
    }).then(function mySucces(response) {
       
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








});






</script>



