<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">

<div class="panel panel-default">
	<div class="panel-body">
		


<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">
			<th>สี</th><th>ชื่อสี</th><th>โค้ดสี</th><th width="150px;">สถานะ</th><th width="150px;">จัดการ</th>
		</tr>
	</thead>
	<tbody>

	<tr>
			<td style="background-color: #{{color_code}};" width="65px;"></td><td><input type="text" class="form-control" ng-model="color_name" placeholder="ชื่อสี"></td>
			<td><input type="text" class="form-control" ng-model="color_code" placeholder="โค้ดสี"></td>
			
			<td><span class="label label-default"> ใช้งาน</span></td>
			<td><button class="btn btn-success" ng-click="Addcolor(color_name,color_code)">บันทึก</button></td>
		</tr>

		<tr ng-repeat="x in Colorlist">
		

			<td style="background-color: #{{x.color_print_code}};"></td>

			<td ng-show="color_print_id==x.color_print_id"><input type="text" ng-model="x.color_print_name" class="form-control"></td>
			<td ng-show="color_print_id==x.color_print_id"><input type="text" ng-model="x.color_print_code" class="form-control"></td>
			
			<td ng-show="color_print_id!=x.color_print_id">{{x.color_print_name}}</td>
			<td ng-show="color_print_id!=x.color_print_id">{{x.color_print_code}}</td>
			

<td ng-if="x.color_print_status=='0'"><span class="label label-success" ng-click="Updatecolorstatus(x.color_print_id,'1')" style="cursor:default">ใช้งาน</span></td>
<td ng-if="x.color_print_status=='1'" ><span class="label label-danger" ng-click="Updatecolorstatus(x.color_print_id,'0')" style="cursor:default">ปิดใช้งาน</span></td>
			<td ng-show="color_print_id!=x.color_print_id"><button class="btn btn-warning btn-xs" ng-click="Editcolorinput(x.color_print_id)">แก้ไข</button> <button class="btn btn-danger btn-xs" ng-click="Deletecolor(x.color_print_id)">ลบ</button></td>

			<td ng-show="color_print_id==x.color_print_id"><button class="btn btn-success btn-xs" ng-click="Editsavecolor(x.color_print_id,x.color_print_name,x.color_print_code)">บันทึก</button> <button class="btn btn-default btn-xs" ng-click="Edticolorcancel(color_print_id)">ยกเลิก</button></td>

		</tr>
		

	</tbody>
</table>



	</div>
</div>

</div>

<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {


$scope.Getcolorlist = function(){
$http.get("Colorofprint/Getcolorlist")
    .then(function(response) {
        $scope.Colorlist = response.data;
    });
};
$scope.Getcolorlist();





$scope.Addcolor = function(color_name,color_code){

$http({
        method : "POST",
        TYPE : "JSON",
        url : "Colorofprint/Addcolor",
        data : {
color_print_name: color_name,
color_print_code: color_code
        }
    }).then(function mySucces(response) {
        
        $scope.Getcolorlist();
    }, function myError(response) {
        
    });

};


$scope.Editcolorinput = function(color_print_id){
$scope.color_print_id = color_print_id;
};

$scope.Edticolorcancel = function(color_print_id){
$scope.color_print_id = '';
};

$scope.Editsavecolor = function(color_print_id,color_print_name,color_print_code){

$http({
        method : "POST",
        url : "Colorofprint/Editcolor",
        data : {
color_print_id: color_print_id,
color_print_name: color_print_name,
color_print_code: color_print_code
        }
    }).then(function mySucces(response) {
        $scope.color_print_id = '';
         $scope.Getcolorlist();
    }, function myError(response) {
        
    });

};


$scope.Deletecolor = function(color_print_id){

$http({
        method : "POST",
        url : "Colorofprint/Deletecolor",
        data : {
color_print_id: color_print_id,
        }
    }).then(function mySucces(response) {
        $scope.Getcolorlist();
    }, function myError(response) {
        
    });

};

$scope.Updatecolorstatus = function(color_print_id,status){
$http({
        method : "POST",
        url : "Colorofprint/Updatecolorstatus",
        data : {
color_print_id: color_print_id,
color_print_status: status
        }
    }).then(function mySucces(response) {
        $scope.Getcolorlist();
    }, function myError(response) {
        
    });
};


	});
</script>