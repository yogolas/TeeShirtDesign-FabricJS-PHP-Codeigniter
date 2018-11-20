<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">
<h4>Campaigns</h4>
<div class="panel panel-default">
	<div class="panel-body">
Overview
<hr />


<div class="col-md-4 text-center">
	
<span style="font-size: 30px;font-weight: bold;">	
{{profit | number}} บาท
 </span>
	<br />
	ยอดเงินที่เบิกได้
</div>


<div class="col-md-4 text-center">
	
<span style="font-size: 30px;font-weight: bold;">	
{{salenum_all}}
 </span>
	<br />
	Total Order
</div>

<div class="col-md-4 text-center">
	<span style="font-size: 30px;font-weight: bold;">
	{{profit_all | number }} บาท </span>
	<br />
	Total Profit
</div>


</div>
</div>


<div class="panel panel-default">
	<div class="panel-body">




<table class="table">
	
	<tbody>
		<tr ng-repeat="x in getlist">
			<td width="80px;">
			<a href="<?php echo $base_url; ?>/{{x.url}}" target="_blank">
			<img ng-show="x.show_back_first=='1'" ng-src="<?php echo $base_url; ?>/tmp/{{x.back_image}}" class="img-responsive">
			<img ng-hide="x.show_back_first=='1'" ng-src="<?php echo $base_url; ?>/tmp/{{x.front_image}}" class="img-responsive"></a></td>
			<td style="vertical-align: middle;"><a href="<?php echo $base_url; ?>/{{x.url}}" target="_blank"  style="color:#000;">{{x.campaign_title}}</a></td>
			<td style="vertical-align: middle;">{{x.how_many_sale | number}}/{{x.salegole_unit | number}} <br /> sold</td>
			<td style="vertical-align: middle;">{{x.enddate2}}</td>
			
			
		</tr>
	</tbody>
</table>


	</div>
</div>

</div>



	<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.profit = <?php echo $profit;?>;
$scope.profit_all = <?php echo $profit_all;?>;
$scope.salenum_all = <?php echo $salenum_all;?>;

$scope.Getcampaign = function(){
$http.get("Campaigns/Getcampaign")
    .then(function(response) {
        $scope.getlist = response.data;
    });
};
$scope.Getcampaign();


});

</script>