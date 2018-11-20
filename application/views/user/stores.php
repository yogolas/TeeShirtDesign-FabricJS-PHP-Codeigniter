<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">

<style>
.storeslist:hover {
    background-color: #ccc;
}
</style>

<h4>Stores</h4>

<div class="panel panel-default">
	<div class="panel-body">




Use storefronts to group related campaigns together. You'll have a single page to show customers and we'll even help you cross-promote to encourage multiple purchases!




	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body">

<div class="text-right"><button class="btn btn-default btn-lg" ng-click="Modalnewstore()">Create New Store</button></div>

<hr />

<div class="col-md-3" ng-repeat="x in storeslist">
<div class="col-md-12"  style="height: 340px;border: solid;border-width: 1px;">

<div class="col-md-4" ng-repeat="y in storescampaignlist  | filter: { stores_id: x.stores_id } | limitTo:9">
<img ng-hide="y.show_back_first=='1'" ng-src="<?php echo $base_url; ?>/tmp/{{y.front_image}}" style="width: 100%;">
<img ng-show="y.show_back_first=='1'" ng-src="<?php echo $base_url; ?>/tmp/{{y.back_image}}" style="width: 100%;">
</div>	

<div class="col-md-12" style="position: absolute;bottom: 5px;">
<hr />
<span class="glyphicon glyphicon-edit" aria-hidden="true" ng-click="Modaledit(x)"></span>
<a href="<?php echo $base_url; ?>/stores/{{x.stores_id}}" target="_blank">	{{x.stores_title}} </a>
<button class="btn btn-default btn-xs" ng-click="Opencampaign(x)" style="float: right;"> + Campaign</button>
</div>

</div>

<div class="col-md-12">
<br />
</div>

</div>




	</div>
</div>



<div class="modal fade" id="Modalnewstore">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ชื่อ Store</h4>
			</div>
			<div class="modal-body">
			
<input type="text" name="" ng-model="stores_title" class="form-control" placeholder="name">
<br />
<center>
<button class="btn btn-success" ng-click="Addstore()">สร้าง store</button>
</center>

			</div>
			<div class="modal-footer">
			
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="Modaledit">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ชื่อ Store</h4>
			</div>
			<div class="modal-body">
			
<input type="text" name="" ng-model="stores_title_edit" class="form-control" placeholder="name">
<br />
<center>
<button class="btn btn-success" ng-click="Editstore()">อัฟเดต store</button>
</center>

			</div>
			<div class="modal-footer">
			
			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="Opencampaign">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Select Campaign For "{{stores_title}}"</h4>
			</div>
			<div class="modal-body">
				

<table class="table table-hover">

	<tbody>
		<tr ng-repeat="x in mycampaignlist">
			<td width="10px;"><input type="checkbox" name="" ng-model="x.campaign_select" ng-true-value="1" ng-false-value="0"></td>
			<td width="10px;">
			<img ng-hide="x.show_back_first=='1'" ng-src="<?php echo $base_url; ?>/tmp/{{x.front_image}}" style="width: 40px;">
<img ng-show="x.show_back_first=='1'" ng-src="<?php echo $base_url; ?>/tmp/{{x.back_image}}" style="width: 40px;">
			</td>
			<td>
				<b>{{x.campaign_title}} </b><br />
				{{x.product_style_name}}
			</td>
			<td>0/{{x.salegole_unit}}</td>
			<td>END</td>
		</tr>
	</tbody>
</table>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" ng-click="Addcampaign()">Save changes</button>
			</div>
		</div>
	</div>
</div>


</div>



	<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.stores_title = '';

$scope.Modalnewstore = function(){
$('#Modalnewstore').modal('show');
};

$scope.Getstores = function(){
$http.get("Stores/Getstores")
    .then(function(response) {
        $scope.storeslist = response.data;
    });

    $http.get("Stores/Getstorescampaign")
    .then(function(response) {
        $scope.storescampaignlist = response.data;
    });
};
$scope.Getstores();


$scope.Addstore = function(){
if($scope.stores_title != ''){
$http({
        method : "POST",
        TYPE : "JSON",
        url : "Stores/Addtitle",
        data : {
        	stores_title: $scope.stores_title
        }
    }).then(function mySucces(response) {
$('#Modalnewstore').modal('hide');
$scope.Getstores();
    }, function myError(response) {
        
    });



}

};



$scope.Opencampaign = function(x){
	$scope.stores_title = x.stores_title
	$scope.stores_id = x.stores_id;
$('#Opencampaign').modal('show');
$http.get("Stores/Getmycampaign")
    .then(function(response) {
        $scope.mycampaignlist = response.data;
    });
};




$scope.Addcampaign = function(){
$http({
        method : "POST",
        TYPE : "JSON",
        url : "Stores/Addcampaign",
        data : {
        	stores_id: $scope.stores_id,
        	mycampaignlist: $scope.mycampaignlist
        }
    }).then(function mySucces(response) {
$('#Opencampaign').modal('hide');
$scope.Getstores();
    }, function myError(response) {
        
    });



};





$scope.Modaledit = function(x){
$('#Modaledit').modal('show');

$scope.stores_title_edit = x.stores_title;
$scope.stores_id_edit = x.stores_id;
};

$scope.Editstore = function(){
if($scope.stores_title_edit !=''){
$http({
        method : "POST",
        TYPE : "JSON",
        url : "Stores/Editstore",
        data : {
        	stores_id: $scope.stores_id_edit,
        	stores_title: $scope.stores_title_edit
        }
    }).then(function mySucces(response) {
$scope.Getstores();
$('#Modaledit').modal('hide');
    }, function myError(response) {
        
    });
}

};



});

</script>