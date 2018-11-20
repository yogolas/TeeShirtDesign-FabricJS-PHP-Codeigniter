
<div class="container panel panel-default " ng-app="mytee" ng-controller="teeCtrl">
	

<div class="col-md-12">
<center>

<br />
<span ng-show="recovercontents" class="alert-warning">
	
An email containing a link that will allow you to change your password has been sent to you. If you do not receive an email in the next ten minutes, please <a href="<?php echo $base_url; ?>/contact" target="_blank">contact us</a>.

</span>
<br />
<h4 style="font-weight: bold;">Request a Password Reset</h4>

<h4>Enter the email you used to register</h4>

<br />
<input type="email" name="email" ng-model="email" class="form-control" style="width: 300px;height: 50px;display:contents;" placeholder="email">
<br />

	

<button class="btn btn-info btn-lg" ng-click="Sendre()">Request</button>

<br /><br />
</center>

</div>


</div>



	<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.email = '';

$scope.Sendre = function(){

if($scope.email != ''){

	$http({
        method : "POST",
        TYPE : "JSON",
        url : "Recover/check",
        data : {
email: $scope.email
        }
    }).then(function mySucces(response) {
       
$scope.recovercontents =  true;
$scope.email = '';
    }, function myError(response) {
        
    });

}else{

}



};



});

</script>