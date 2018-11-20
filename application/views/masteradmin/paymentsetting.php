<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">
	
<div class="panel panel-default">
	<div class="panel-body">
		

<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">
			<th>ธนาคาร</th> 
			<th>เลขบัญชี</th>
			<th>ชื่อบัญชี</th>
			<th>สาขา</th>
			<th>จัดการ</th>
		</tr>
	</thead>
	<tbody>
	<tr>
			<td><input type="text" class="form-control" placeholder="ชื่อธนาคาร" ng-model="payment_bank_name"></td>
			<td><input type="text" class="form-control" placeholder="เลขบัญชี" ng-model="payment_bank_number"></td>
			<td><input type="text" class="form-control" placeholder="ชื่อบัญชี" ng-model="payment_bank_accountname"></td>
			<td><input type="text" class="form-control" placeholder="สาขา" ng-model="payment_bank_branch"></td>

			<td>
			<button class="btn btn-success" ng-click="Addbank(payment_bank_name,payment_bank_number,payment_bank_accountname,payment_bank_branch)">บันทึก</button>
			</td>

		</tr>

		<tr ng-repeat="x in Banklist">

		<td ng-show="payment_bank_id==x.payment_bank_id"><input type="text" ng-model="x.payment_bank_name" class="form-control"></td>
			<td ng-show="payment_bank_id==x.payment_bank_id"><input type="text" ng-model="x.payment_bank_number" class="form-control"></td>
			<td ng-show="payment_bank_id==x.payment_bank_id"><input type="text" ng-model="x.payment_bank_accountname" class="form-control"></td>
			<td ng-show="payment_bank_id==x.payment_bank_id"><input type="text" ng-model="x.payment_bank_branch" class="form-control"></td>

		<td ng-show="payment_bank_id!=x.payment_bank_id">{{x.payment_bank_name}}</td>
			<td ng-show="payment_bank_id!=x.payment_bank_id">{{x.payment_bank_number}}</td>
			<td ng-show="payment_bank_id!=x.payment_bank_id">{{x.payment_bank_accountname}}</td>
			<td ng-show="payment_bank_id!=x.payment_bank_id">{{x.payment_bank_branch}}</td>


			<td ng-show="payment_bank_id!=x.payment_bank_id">
			<button class="btn btn-warning btn-xs" ng-click="Editbankinput(x.payment_bank_id)">แก้ไข</button> <button class="btn btn-danger btn-xs" ng-click="Deletebank(x.payment_bank_id)">ลบ</button></td>

			<td ng-show="payment_bank_id==x.payment_bank_id"><button class="btn btn-success btn-xs" ng-click="Editsavebank(x.payment_bank_id,x.payment_bank_name,x.payment_bank_number,x.payment_bank_accountname,x.payment_bank_branch)">บันทึก</button> <button class="btn btn-default btn-xs" ng-click="Edtibankcancel(payment_bank_id)">ยกเลิก</button></td>

		</tr>
	</tbody>
</table>


<hr />

ตั้งค่า Payment API

<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">
			<th>Code</th>
			<th>ชื่อ Payment</th>
			<th>หมายเลข/อีเมล์</th>
			<th>KEY/Token</th>
			<th>จัดการ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in Apilist">
			

			<td ng-show="payment_api_id==x.payment_api_id">{{x.payment_api_code}}</td>
			<td ng-show="payment_api_id==x.payment_api_id"><input type="text" ng-model="x.payment_api_name" class="form-control"></td>
			<td ng-show="payment_api_id==x.payment_api_id"><input type="text" ng-model="x.payment_api_number" class="form-control"></td>
			<td ng-show="payment_api_id==x.payment_api_id"><input type="text" ng-model="x.payment_api_key" class="form-control"></td>

		<td ng-show="payment_api_id!=x.payment_api_id">{{x.payment_api_code}}</td>
			<td ng-show="payment_api_id!=x.payment_api_id">{{x.payment_api_name}}</td>
			<td ng-show="payment_api_id!=x.payment_api_id">{{x.payment_api_number}}</td>
			<td ng-show="payment_api_id!=x.payment_api_id">{{x.payment_api_key}}</td>


			<td ng-show="payment_api_id!=x.payment_api_id">
			<button class="btn btn-warning btn-xs" ng-click="Editapiinput(x.payment_api_id)">แก้ไข</button>

			<td ng-show="payment_api_id==x.payment_api_id"><button class="btn btn-success btn-xs" ng-click="Editsaveapi(x.payment_api_id,x.payment_api_code,x.payment_api_name,x.payment_api_number,x.payment_api_key)">บันทึก</button> <button class="btn btn-default btn-xs" ng-click="Edtiapicancel(payment_api_id)">ยกเลิก</button></td>



		</tr>
	</tbody>
</table>



	</div>
</div>

</div>


<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.payment_bank_id = '';

$scope.Getbanklist = function(){
$http.get("Paymentsetting/Getbanklist")
    .then(function(response) {
        $scope.Banklist = response.data;
    });
};
$scope.Getbanklist();



$scope.Addbank = function(payment_bank_name,payment_bank_number,payment_bank_accountname,payment_bank_branch){

$http({
        method : "POST",
        TYPE : "JSON",
        url : "Paymentsetting/Addbank",
        data : {
payment_bank_name: payment_bank_name,
payment_bank_number: payment_bank_number,
payment_bank_accountname: payment_bank_accountname,
payment_bank_branch: payment_bank_branch
        }
    }).then(function mySucces(response) {
        $scope.Getbanklist();
    }, function myError(response) {
        
    });

};


$scope.Editbankinput = function(payment_bank_id){
$scope.payment_bank_id = payment_bank_id;
};

$scope.Edtibankcancel = function(payment_bank_id){
$scope.payment_bank_id = '';
};

$scope.Editsavebank = function(payment_bank_id,payment_bank_name,payment_bank_number,payment_bank_accountname,payment_bank_branch){

$http({
        method : "POST",
        url : "Paymentsetting/Editbank",
        data : {
payment_bank_id: payment_bank_id,
payment_bank_name: payment_bank_name,
payment_bank_number: payment_bank_number,
payment_bank_accountname: payment_bank_accountname,
payment_bank_branch: payment_bank_branch
        }
    }).then(function mySucces(response) {
        $scope.payment_bank_id = '';
         $scope.Getbanklist();
    }, function myError(response) {
        
    });

};


$scope.Deletebank = function(payment_bank_id){

$http({
        method : "POST",
        url : "Paymentsetting/Deletebank",
        data : {
payment_bank_id: payment_bank_id,
        }
    }).then(function mySucces(response) {
        $scope.Getbanklist();
    }, function myError(response) {
        
    });

};





$scope.Getapilist = function(){
$http.get("Paymentsetting/Getapilist")
    .then(function(response) {
        $scope.Apilist = response.data;
    });
};
$scope.Getapilist();






$scope.Editapiinput = function(payment_api_id){
$scope.payment_api_id = payment_api_id;
};

$scope.Edtiapicancel = function(payment_api_id){
$scope.payment_api_id = '';
};

$scope.Editsaveapi = function(payment_api_id,payment_api_code,payment_api_name,payment_api_number,payment_api_key){

$http({
        method : "POST",
        url : "Paymentsetting/Editapi",
        data : {
payment_api_id: payment_api_id,
payment_api_code: payment_api_code,
payment_api_name: payment_api_name,
payment_api_number: payment_api_number,
payment_api_key: payment_api_key
        }
    }).then(function mySucces(response) {
        $scope.payment_api_id = '';
         $scope.Getbanklist();
    }, function myError(response) {
        
    });

};



});

</script>
