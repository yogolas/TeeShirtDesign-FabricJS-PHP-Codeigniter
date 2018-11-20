<div class="container" ng-app="mytee" ng-controller="teeCtrl">
	<div class="col-md-12 panel panel-default">

	<hr />
	<input type="text" name="" ng-model="searchstyle" placeholder="ค้นหาแบบเสื้อ" class="form-control" style="width: 300px;">
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th style="width: 50px;">ลำดับ</th>
			<th>รูปแบบเสื้อ</th>
			<th>ขนาด</th>
			<th>สี</th>
			<th style="width: 200px;text-align: center">จำนวนคงเหลือ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in stocklist | filter:searchstyle">
			<td align="center">{{$index+1}}</td>
			<td>{{x.product_style_name}}</td>
			<td>{{x.product_size_name}}</td>
			<td><span  style="background-color: #{{x.product_color_code}};padding-top: 5px;padding-bottom: 5px;padding-right: 15px;padding-left: 15px;""></span>   {{x.product_color_name}}</td>
			<td align="right">{{x.product_num_all}}</td>
		</tr>
	</tbody>
</table>

<hr />









</div>	

</div>


<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {





$scope.Getstocklist = function(){
$http.get("Checkstock/Getstocklist")
    .then(function(response) {
        $scope.stocklist = response.data;
    });
};
$scope.Getstocklist();



});

</script>
