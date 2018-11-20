<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">

<div class="panel panel-default">
    <div class="panel-body">
        


<table class="table table-hover">
    <thead>
        <tr style="background-color: #eee;">
            <th>ชื่อประเทศ</th><th>ชื่อย่อ</th><th>Shipping Zone</th><th width="150px;">สถานะ</th><th width="150px;">จัดการ</th>
        </tr>
    </thead>
    <tbody>

    <tr>
            <td><input type="text" class="form-control" ng-model="country_name" placeholder="ชื่อประเทศ"></td>
            <td><input type="text" class="form-control" ng-model="country_code" placeholder="ชื่อย่อ"></td>

            <td>
                <select ng-model="shipping_zone_id" class="form-control">
                    <option ng-repeat="x in shippingzonelist" value="{{x.shipping_zone_id}}">
                        {{x.shipping_zone_name}}
                    </option>
                </select>
            </td>
            
            <td><span class="label label-default"> ใช้งาน</span></td>
            <td><button class="btn btn-success" ng-click="Add(country_name,country_code,shipping_zone_id)">บันทึก</button></td>
        </tr>

        <tr ng-repeat="x in list">
        

            

            <td ng-show="country_id==x.country_id"><input type="text" ng-model="x.country_name" class="form-control"></td>
            <td ng-show="country_id==x.country_id"><input type="text" ng-model="x.country_code" class="form-control"></td>
            <td ng-show="country_id==x.country_id">
                <select ng-model="x.shipping_zone_id" class="form-control">
                    <option ng-repeat="y in shippingzonelist" value="{{y.shipping_zone_id}}">
                        {{y.shipping_zone_name}}
                    </option>
                </select>
            </td>

            <td ng-show="country_id!=x.country_id">{{x.country_name}}</td>
            <td ng-show="country_id!=x.country_id">{{x.country_code}}</td>
             <td ng-show="country_id!=x.country_id">{{x.shipping_zone_name}}</td>
            

<td ng-if="x.country_status=='0'"><span class="label label-success" ng-click="Updatestatus(x.country_id,'1')" style="cursor:default">ใช้งาน</span></td>
<td ng-if="x.country_status=='1'" ><span class="label label-danger" ng-click="Updatestatus(x.country_id,'0')" style="cursor:default">ปิดใช้งาน</span></td>
            <td ng-show="country_id!=x.country_id"><button class="btn btn-warning btn-xs" ng-click="Editinput(x.country_id)">แก้ไข</button> <button class="btn btn-danger btn-xs" ng-click="Delete(x.country_id)">ลบ</button></td>

            <td ng-show="country_id==x.country_id"><button class="btn btn-success btn-xs" ng-click="Editsave(x.country_id,x.country_name,x.country_code,x.shipping_zone_id)">บันทึก</button> <button class="btn btn-default btn-xs" ng-click="Edticancel(country_id)">ยกเลิก</button></td>

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



$scope.Getlist = function(){
$http.get("Countrysetting/Get")
    .then(function(response) {
        $scope.list = response.data;
    });
};
$scope.Getlist();





$scope.Add = function(country_name,country_code,shipping_zone_id){

$http({
        method : "POST",
        TYPE : "JSON",
        url : "Countrysetting/Add",
        data : {
country_name: country_name,
country_code: country_code,
shipping_zone_id: shipping_zone_id
        }
    }).then(function mySucces(response) {
        
        $scope.Getlist();
    }, function myError(response) {
        
    });

};


$scope.Editinput = function(country_id){
$scope.country_id = country_id;
};

$scope.Edticancel = function(country_id){
$scope.country_id = '';
$scope.Getlist();
};

$scope.Editsave = function(country_id,country_name,country_code,shipping_zone_id){

$http({
        method : "POST",
        url : "Countrysetting/Edit",
        data : {
country_id: country_id,
country_name: country_name,
country_code: country_code,
shipping_zone_id: shipping_zone_id
        }
    }).then(function mySucces(response) {
        $scope.country_id = '';
         $scope.Getlist();
    }, function myError(response) {
        
    });

};


$scope.Delete = function(country_id){

$http({
        method : "POST",
        url : "Countrysetting/Delete",
        data : {
country_id: country_id,
        }
    }).then(function mySucces(response) {
        $scope.Getlist();
    }, function myError(response) {
        
    });

};

$scope.Updatestatus = function(country_id,status){
$http({
        method : "POST",
        url : "Countrysetting/Updatestatus",
        data : {
country_id: country_id,
country_status: status
        }
    }).then(function mySucces(response) {
        $scope.Getlist();
    }, function myError(response) {
        
    });
};


    });
</script>