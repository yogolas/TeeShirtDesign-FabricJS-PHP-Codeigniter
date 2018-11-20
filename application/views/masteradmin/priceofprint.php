<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">

<div class="panel panel-default">
	<div class="panel-body">
		

<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">
			<th>จำนวนสี Color</th> 
			<th>สั่งขั่นต่ำ Min Quantity</th>
			<th>สั่งไม่เกิน Max 	Quantity</th>
			<th>ราคา Base Price</th>
			<th>การปริ้น Screen / DTG</th>
			<th style="width: 150px;">จัดการ</th>
		</tr>
	</thead>
	<tbody>
	<tr>
			<td><input type="text" class="form-control" placeholder="จำนวน" ng-model="price_print_numcolor"></td>
			<td><input type="text" class="form-control" placeholder="Min Quantity" ng-model="price_print_nummin"></td>
			<td><input type="text" class="form-control" placeholder="Max Quantity" ng-model="price_print_nummax"></td>
			<td><input type="text" class="form-control" placeholder="Base Price" ng-model="price_print_baseprice"></td>
			<td>
<select class="form-control" ng-model="price_print_screendtg">
	<option value="1">
		Screen
	</option>
	<option  value="2">
		DTG
	</option>
</select>
			</td>

			<td>
			<button class="btn btn-success" ng-click="Add(price_print_numcolor,price_print_nummin,price_print_nummax,price_print_baseprice,price_print_screendtg)">บันทึก</button>
			</td>

		</tr>

		<tr ng-repeat="x in list">

		<td ng-show="price_print_id==x.price_print_id"><input type="text" ng-model="x.price_print_numcolor" class="form-control"></td>
			<td ng-show="price_print_id==x.price_print_id"><input type="text" ng-model="x.price_print_nummin" class="form-control"></td>
			<td ng-show="price_print_id==x.price_print_id"><input type="text" ng-model="x.price_print_nummax" class="form-control"></td>
			<td ng-show="price_print_id==x.price_print_id"><input type="text" ng-model="x.price_print_baseprice" class="form-control"></td>
			<td ng-show="price_print_id==x.price_print_id">
<select class="form-control" ng-model="x.price_print_screendtg">
	<option value="1">
		Screen
	</option>
	<option  value="2">
		DTG
	</option>
</select>
			</td>

		<td ng-show="price_print_id!=x.price_print_id">{{x.price_print_numcolor}}</td>
			<td ng-show="price_print_id!=x.price_print_id">{{x.price_print_nummin}}</td>
			<td ng-show="price_print_id!=x.price_print_id">{{x.price_print_nummax}}</td>
			<td ng-show="price_print_id!=x.price_print_id">{{x.price_print_baseprice}}</td>
			<td ng-show="price_print_id!=x.price_print_id">
			<span ng-show="x.price_print_screendtg=='1'">Screen</span>
			<span ng-show="x.price_print_screendtg=='2'">DTG</span>
			</td>



			<td ng-show="price_print_id!=x.price_print_id">
			<button class="btn btn-warning btn-xs" ng-click="Editinput(x.price_print_id)">แก้ไข</button> <button class="btn btn-danger btn-xs" ng-click="Delete(x.price_print_id)">ลบ</button></td>

			<td ng-show="price_print_id==x.price_print_id"><button class="btn btn-success btn-xs" ng-click="Editsave(x.price_print_id,x.price_print_numcolor,x.price_print_nummin,x.price_print_nummax,x.price_print_baseprice,x.price_print_screendtg)">บันทึก</button> <button class="btn btn-default btn-xs" ng-click="Edticancel(price_print_id)">ยกเลิก</button></td>

		</tr>
	</tbody>
</table>






	</div>
</div>

</div>

<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {




$scope.Getlist = function(){
$http.get("Priceofprint/Getlist")
    .then(function(response) {
        $scope.list = response.data;
    });
};
$scope.Getlist();



$scope.Add = function(price_print_numcolor,price_print_nummin,price_print_nummax,price_print_baseprice,price_print_screendtg){

$http({
        method : "POST",
        TYPE : "JSON",
        url : "Priceofprint/Add",
        data : {
price_print_numcolor: price_print_numcolor,
price_print_nummin: price_print_nummin,
price_print_nummax: price_print_nummax,
price_print_baseprice: price_print_baseprice,
price_print_screendtg: price_print_screendtg
        }
    }).then(function mySucces(response) {
        $scope.Getlist();
    }, function myError(response) {
        
    });

};


$scope.Editinput = function(price_print_id){
$scope.price_print_id = price_print_id;
};

$scope.Edticancel = function(price_print_id){
$scope.price_print_id = '';
};

$scope.Editsave = function(price_print_id,price_print_numcolor,price_print_nummin,price_print_nummax,price_print_baseprice,price_print_screendtg){

$http({
        method : "POST",
        url : "Priceofprint/Edit",
        data : {
price_print_id: price_print_id,
price_print_numcolor: price_print_numcolor,
price_print_nummin: price_print_nummin,
price_print_nummax: price_print_nummax,
price_print_baseprice: price_print_baseprice,
price_print_screendtg: price_print_screendtg
        }
    }).then(function mySucces(response) {
        $scope.price_print_id = '';
         $scope.Getlist();
    }, function myError(response) {
        
    });

};


$scope.Delete = function(price_print_id){

$http({
        method : "POST",
        url : "Priceofprint/Delete",
        data : {
price_print_id: price_print_id,
        }
    }).then(function mySucces(response) {
        $scope.Getlist();
    }, function myError(response) {
        
    });

};





	});
</script>