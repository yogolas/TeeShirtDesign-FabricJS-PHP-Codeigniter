<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">

<div class="panel panel-default">
	<div class="panel-body">
		


<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">
			<th>Shipping By</th><th>Zone List</th><th>Min-Max(weight)</th><th>Cost Base</th><th>Cost(per unit)</th><th width="50px;">สถานะ</th><th width="110px;">จัดการ</th>
		</tr>
	</thead>
	<tbody>

	<tr>

    <td><input type="text" class="form-control" ng-model="shipping_rate_shippingby" placeholder="Shipping By"></td>
         
                    <td>
<select ng-model="shipping_zone_id" class="form-control">
<option value="0">
    Rest of the World
</option>
    <option ng-repeat="x in shippingzonelist" value="{{x.shipping_zone_id}}">
        {{x.shipping_zone_name}}
    </option>
</select>
</td>

         <td>
<form class="form-inline">
<div class="form-group">
<input type="text" class="form-control" placeholder="Min" ng-model="shipping_rate_minweight" style="width: 50px;">
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Max" ng-model="shipping_rate_maxweight" style="width: 50px;">
</div>
</form>
</td>   

<td><input type="text" class="form-control" ng-model="shipping_rate_costbase" placeholder="Cost Base"></td>
<td><input type="text" class="form-control" ng-model="shipping_rate_costperunit" placeholder="Cost(per unit)"></td>
       

			<td><span class="label label-default"> ใช้งาน</span></td>
			<td><button class="btn btn-success" ng-click="Add(shipping_rate_shippingby,shipping_zone_id,shipping_rate_minweight,shipping_rate_maxweight,shipping_rate_costbase,shipping_rate_costperunit)">บันทึก</button></td>
		</tr>



		<tr ng-repeat="x in list">
		

			  <td  ng-show="shipping_rate_id==x.shipping_rate_id"><input type="text" class="form-control" ng-model="x.shipping_rate_shippingby" placeholder="Shipping By"></td>
    

			<td ng-show="shipping_rate_id==x.shipping_rate_id">

<select ng-model="x.shipping_zone_id" class="form-control">
<option value="0">
    Rest of the World
</option>
    <option ng-repeat="y in shippingzonelist" value="{{y.shipping_zone_id}}">
        {{y.shipping_zone_name}}
    </option>
</select>
            
            </td>
			 <td  ng-show="shipping_rate_id==x.shipping_rate_id">
<form class="form-inline">
<div class="form-group">
<input type="text" class="form-control" placeholder="Min" ng-model="x.shipping_rate_minweight" style="width: 50px;">
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Max" ng-model="x.shipping_rate_maxweight" style="width: 50px;">
</div>
</form>
</td>   

<td  ng-show="shipping_rate_id==x.shipping_rate_id"><input type="text" class="form-control" ng-model="x.shipping_rate_costbase" placeholder="Cost Base"></td>
<td  ng-show="shipping_rate_id==x.shipping_rate_id"><input type="text" class="form-control" ng-model="x.shipping_rate_costperunit" placeholder="Cost(per unit)"></td>
			
			<td ng-show="shipping_rate_id!=x.shipping_rate_id">{{x.shipping_rate_shippingby}}</td>
			<td ng-show="shipping_rate_id!=x.shipping_rate_id" align="center">
            <span ng-show="x.shipping_zone_id!='0'">{{x.shipping_zone_name}}</span>
            <span ng-show="x.shipping_zone_id=='0'">Rest of the World</span>
            </td>
            <td ng-show="shipping_rate_id!=x.shipping_rate_id" align="center">{{x.shipping_rate_minweight}} - {{x.shipping_rate_maxweight}}</td>
            <td ng-show="shipping_rate_id!=x.shipping_rate_id" align="center">{{x.shipping_rate_costbase}}</td>
            <td ng-show="shipping_rate_id!=x.shipping_rate_id" align="center">{{x.shipping_rate_costperunit}}</td>
            			

<td ng-if="x.shipping_rate_status=='0'"><span class="label label-success" ng-click="Updatestatus(x.shipping_rate_id,'1')" style="cursor:default">ใช้งาน</span></td>
<td ng-if="x.shipping_rate_status=='1'" ><span class="label label-danger" ng-click="Updatestatus(x.shipping_rate_id,'0')" style="cursor:default">ปิดใช้งาน</span></td>
			<td ng-show="shipping_rate_id!=x.shipping_rate_id"><button class="btn btn-warning btn-xs" ng-click="Editinput(x.shipping_rate_id)">แก้ไข</button> <button class="btn btn-danger btn-xs" ng-click="Delete(x.shipping_rate_id)">ลบ</button></td>

			<td ng-show="shipping_rate_id==x.shipping_rate_id"><button class="btn btn-success btn-xs" ng-click="Editsave(x.shipping_rate_id,x.shipping_rate_shippingby,x.shipping_zone_id,x.shipping_rate_minweight,x.shipping_rate_maxweight,x.shipping_rate_costbase,x.shipping_rate_costperunit)">บันทึก</button> <button class="btn btn-default btn-xs" ng-click="Edticancel(shipping_rate_id)">ยกเลิก</button></td>

		</tr>
		

	</tbody>
</table>



	</div>
</div>

</div>

<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.Getshippingzone = function(){
$http.get("Shippingzone/Getlist")
    .then(function(response) {
        $scope.shippingzonelist = response.data;
    });
};
$scope.Getshippingzone();

$scope.Getcountrylist = function(){
$http.get("Countrysetting/Get")
    .then(function(response) {
        $scope.countrylist = response.data;
    });
};
$scope.Getcountrylist();


$scope.Getlist = function(){
$http.get("Shippingsetting/Get")
    .then(function(response) {
        $scope.list = response.data;
    });
};
$scope.Getlist();





$scope.Add = function(shipping_rate_shippingby,shipping_zone_id,shipping_rate_minweight,shipping_rate_maxweight,shipping_rate_costbase,shipping_rate_costperunit){

$http({
        method : "POST",
        TYPE : "JSON",
        url : "Shippingsetting/Add",
        data : {
shipping_rate_shippingby: shipping_rate_shippingby,
shipping_zone_id: shipping_zone_id,
shipping_rate_minweight: shipping_rate_minweight,
shipping_rate_maxweight: shipping_rate_maxweight,
shipping_rate_costbase: shipping_rate_costbase,
shipping_rate_costperunit: shipping_rate_costperunit
        }
    }).then(function mySucces(response) {
        
        $scope.Getlist();
    }, function myError(response) {
        
    });

};


$scope.Editinput = function(shipping_rate_id){
$scope.shipping_rate_id = shipping_rate_id;
};

$scope.Edticancel = function(shipping_rate_id){
$scope.shipping_rate_id = '';
$scope.Getlist();
};

$scope.Editsave = function(shipping_rate_id,shipping_rate_shippingby,shipping_zone_id,shipping_rate_minweight,shipping_rate_maxweight,shipping_rate_costbase,shipping_rate_costperunit){

$http({
        method : "POST",
        url : "Shippingsetting/Edit",
        data : {
shipping_rate_id: shipping_rate_id,
shipping_rate_shippingby: shipping_rate_shippingby,
shipping_zone_id: shipping_zone_id,
shipping_rate_minweight: shipping_rate_minweight,
shipping_rate_maxweight: shipping_rate_maxweight,
shipping_rate_costbase: shipping_rate_costbase,
shipping_rate_costperunit: shipping_rate_costperunit
        }
    }).then(function mySucces(response) {
        $scope.shipping_rate_id = '';
         $scope.Getlist();
    }, function myError(response) {
        
    });

};


$scope.Delete = function(shipping_rate_id){

$http({
        method : "POST",
        url : "Shippingsetting/Delete",
        data : {
shipping_rate_id: shipping_rate_id,
        }
    }).then(function mySucces(response) {
        $scope.Getlist();
    }, function myError(response) {
        
    });

};

$scope.Updatestatus = function(shipping_rate_id,status){
$http({
        method : "POST",
        url : "Shippingsetting/Updatestatus",
        data : {
shipping_rate_id: shipping_rate_id,
shipping_rate_status: status
        }
    }).then(function mySucces(response) {
        $scope.Getlist();
    }, function myError(response) {
        
    });
};


	});
</script>