<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">

<div class="panel panel-default">
	<div class="panel-body">
		
<button class="btn btn-default btn-lg" ng-click="Addnew()">+ Add New</button>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Name</th>
			<th>System</th>
			<th style="width: 50px;">edit</th>
			<th style="width: 50px;">delete</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td>{{x.name}}</td>
			<td>{{x.system_name}}</td>
			<td>
				<BUTTON class="btn btn-warning btn-xs" ng-click="Edit(x)">edit</BUTTON>
			</td>
			<td>
				<BUTTON class="btn btn-danger btn-xs" ng-click="Delete(x)">delete</BUTTON>
			</td>
		</tr>
	</tbody>
</table>


<div class="modal fade" id="addnew">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				
<input type="text" name="" ng-model="name" placeholder="Name" class="form-control">
<br />
<input type="text" name="" ng-model="user" placeholder="User" class="form-control">
<br />
<input type="password" name="" ng-model="pass" placeholder="Password" class="form-control">
<br />

<select class="form-control" ng-model="system_id">
	<option ng-repeat="x in systemlist" value="{{x.system_id}}">
		{{x.system_name}}
	</option>
</select>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" ng-click="Add()">Save changes</button>
			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="editmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				


<input type="text" name="" ng-model="name" placeholder="Name" class="form-control">
<br />
<input type="text" name="" ng-model="user" placeholder="User" class="form-control">
<br />
<input type="password" name="" ng-model="pass" placeholder="Password" class="form-control">
<br />

<select class="form-control" ng-model="system_id">
	<option ng-repeat="x in systemlist" value="{{x.system_id}}">
		{{x.system_name}}
	</option>
</select>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" ng-click="Editsave()">Edit changes</button>
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


$scope.Getlist = function(){
$http.get("Adminsetting/Getlist")
    .then(function(response) {
        $scope.list = response.data;
    });
};
$scope.Getlist();


$scope.Addnew = function(){
	$scope.ID = '';
	$scope.name = '';
	$scope.user = '';
	$scope.pass = '';
	$scope.system_id = '';


$('#addnew').modal('show');
$http.get("Adminsetting/Getsystemlist")
    .then(function(response) {
        $scope.systemlist = response.data;
    });
};


$scope.Add = function(){

$http({
        method : "POST",
        TYPE : "JSON",
        url : "Adminsetting/Add",
        data : {
name: $scope.name,
user: $scope.user,
pass: $scope.pass,
system_id: $scope.system_id
        }
    }).then(function mySucces(response) {
        $scope.Getlist();
        $('#addnew').modal('hide');
    }, function myError(response) {
        
    });

};

$scope.Edit = function(x){
	$scope.ID = x.ID;
	$scope.name = x.name;
	$scope.user = x.user;
	$scope.pass = x.pass;
	$scope.system_id = x.system_id;
$('#editmodal').modal('show');
$http.get("Adminsetting/Getsystemlist")
    .then(function(response) {
        $scope.systemlist = response.data;
    });
};


$scope.Editsave = function(){

$http({
        method : "POST",
        url : "Adminsetting/Edit",
        data : {
ID: $scope.ID,
name: $scope.name,
user: $scope.user,
pass: $scope.pass,
system_id: $scope.system_id
        }
    }).then(function mySucces(response) {
      $('#editmodal').modal('hide');
         $scope.Getlist();
    }, function myError(response) {
        
    });

};


$scope.Delete = function(x){

$http({
        method : "POST",
        url : "Adminsetting/Delete",
        data : {
ID: x.ID,
        }
    }).then(function mySucces(response) {
        $scope.Getlist();
    }, function myError(response) {
        
    });

};





	});
</script>