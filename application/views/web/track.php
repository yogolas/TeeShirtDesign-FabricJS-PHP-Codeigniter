
<div class="container panel panel-default" ng-app="mytee" ng-controller="teeCtrl">
	
<h1>Track your order </h1>
Enter your lookup number (included in your confirmation email) to check the status of your order:
<br />


<form class="form-inline">
  <div class="form-group">
  
    <div class="input-group">
      <input type="text" ng-model="order_number" class="form-control" id="exampleInputAmount" placeholder="Lookup Number" style="width: 400px;height: 45px;" required>
    </div>
  </div>
  <button type="submit" class="btn btn-success btn-lg" ng-click="Checkorder()">Track Order</button>
</form>

<br />
<br />

</div>



	<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.order_number = '';

$scope.Checkorder = function(){
if($scope.order_number !=''){
window.open ('<?php echo $base_url; ?>/track/order/' + $scope.order_number,'_self',false);
}

};


});

</script>