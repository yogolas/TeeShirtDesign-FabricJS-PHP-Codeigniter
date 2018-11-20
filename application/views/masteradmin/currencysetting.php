<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">

<div class="panel panel-default">
    <div class="panel-body">
        


<table class="table table-hover">
    <thead>
        <tr style="background-color: #eee;">
            <th>สกุลเงิน</th><th>อัตราแลกเปลี่ยน/ 1 บาท</th><th width="150px;">สถานะ</th><th width="150px;">จัดการ</th>
        </tr>
    </thead>
    <tbody>

    <tr>
            <td><input type="text" class="form-control" ng-model="currency_name" placeholder="สกุลเงิน"></td>
            <td><input type="text" class="form-control" ng-model="currency_rate" placeholder="อัตราแลกเปลี่ยน"></td>
            
            <td><span class="label label-default"> ใช้งาน</span></td>
            <td><button class="btn btn-success" ng-click="Add(currency_name,currency_rate)">บันทึก</button></td>
        </tr>

        <tr ng-repeat="x in list">
        

            

            <td ng-show="currency_rate_id==x.currency_rate_id"><input type="text" ng-model="x.currency_rate_name" class="form-control"></td>
            <td ng-show="currency_rate_id==x.currency_rate_id"><input type="text" ng-model="x.currency_rate_rate" class="form-control"></td>
            
            <td ng-show="currency_rate_id!=x.currency_rate_id">{{x.currency_rate_name}}</td>
            <td ng-show="currency_rate_id!=x.currency_rate_id">{{x.currency_rate_rate}}</td>
            

<td ng-if="x.currency_rate_status=='0'"><span class="label label-success" ng-click="Updatestatus(x.currency_rate_id,'1')" style="cursor:default">ใช้งาน</span></td>
<td ng-if="x.currency_rate_status=='1'" ><span class="label label-danger" ng-click="Updatestatus(x.currency_rate_id,'0')" style="cursor:default">ปิดใช้งาน</span></td>
            <td ng-show="currency_rate_id!=x.currency_rate_id"><button class="btn btn-warning btn-xs" ng-click="Editinput(x.currency_rate_id)">แก้ไข</button> <button class="btn btn-danger btn-xs" ng-click="Delete(x.currency_rate_id)">ลบ</button></td>

            <td ng-show="currency_rate_id==x.currency_rate_id"><button class="btn btn-success btn-xs" ng-click="Editsave(x.currency_rate_id,x.currency_rate_name,x.currency_rate_rate)">บันทึก</button> <button class="btn btn-default btn-xs" ng-click="Edticancel(currency_rate_id)">ยกเลิก</button></td>

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
$http.get("Currencysetting/Get")
    .then(function(response) {
        $scope.list = response.data;
    });
};
$scope.Getlist();





$scope.Add = function(currency_rate_name,currency_rate_rate){

$http({
        method : "POST",
        TYPE : "JSON",
        url : "Currencysetting/Add",
        data : {
currency_rate_name: currency_rate_name,
currency_rate_rate: currency_rate_rate
        }
    }).then(function mySucces(response) {
        
        $scope.Getlist();
    }, function myError(response) {
        
    });

};


$scope.Editinput = function(currency_rate_id){
$scope.currency_rate_id = currency_rate_id;
};

$scope.Edticancel = function(currency_rate_id){
$scope.currency_rate_id = '';
$scope.Getlist();
};

$scope.Editsave = function(currency_rate_id,currency_rate_name,currency_rate_rate){

$http({
        method : "POST",
        url : "Currencysetting/Edit",
        data : {
currency_rate_id: currency_rate_id,
currency_rate_name: currency_rate_name,
currency_rate_rate: currency_rate_rate
        }
    }).then(function mySucces(response) {
        $scope.currency_rate_id = '';
         $scope.Getlist();
    }, function myError(response) {
        
    });

};


$scope.Delete = function(currency_rate_id){

$http({
        method : "POST",
        url : "Currencysetting/Delete",
        data : {
currency_rate_id: currency_rate_id,
        }
    }).then(function mySucces(response) {
        $scope.Getlist();
    }, function myError(response) {
        
    });

};

$scope.Updatestatus = function(currency_rate_id,status){
$http({
        method : "POST",
        url : "Currencysetting/Updatestatus",
        data : {
currency_rate_id: currency_rate_id,
shipping_rate_status: status
        }
    }).then(function mySucces(response) {
        $scope.Getlist();
    }, function myError(response) {
        
    });
};


    });
</script>