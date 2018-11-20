
<div class="container panel panel-default " ng-app="mytee" ng-controller="teeCtrl">
	

<div class="col-md-12">
<center>
<br />
<span class="alert-warning" ng-show="recovererror">
    Confirm did not match new password
</span>
<span class="alert-danger" ng-show="recovererror2">
    Cannot Create new password
</span>
<br />
<h4 style="font-weight: bold;">Create a new password</h4>


<br />
<input type="password" name="newpassword" ng-model="newpassword" class="form-control" style="width: 300px;height: 50px;display:contents;" placeholder="New Password">
<br />
<input type="password" name="confirmnewpassword" ng-model="confirmnewpassword" class="form-control" style="width: 300px;height: 50px;display:contents;" placeholder="Confirm new password">
<br />
<button class="btn btn-info btn-lg" ng-click="Changepass()">Change Password</button>

<br /><br />
</center>

</div>


</div>



	<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.email = '';

$scope.Changepass = function(){

if($scope.newpassword != '' && $scope.newpassword == $scope.confirmnewpassword){

	$http({
        method : "POST",
        TYPE : "JSON",
        url : "<?php echo $base_url;?>/Recover/changepassword",
        data : {
newpassword: $scope.newpassword,
recover_code: '<?php echo $code;?>'
        }
    }).then(function mySucces(response) {
       
       if(response.data == '1'){
window.open ('<?php echo $base_url; ?>/login','_self',false);
}else{
$scope.recovererror2 =  true;
$scope.recovererror =  false;
}

    }, function myError(response) {
        
    });

}else{

$scope.recoversuccess =  false;
$scope.recovererror =  true;

}



};



});

</script>