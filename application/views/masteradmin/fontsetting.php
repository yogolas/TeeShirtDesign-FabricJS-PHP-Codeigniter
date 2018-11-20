

<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">

<div class="panel panel-default">
    <div class="panel-body">
        


<table class="table table-hover">
    <thead>
        <tr style="background-color: #eee;">
            <th>ชื่อ font</th> <th>รหัส font</th><th>ชื่อไฟล์</th><th>ตัวอย่าง</th><th  width="150px;">Font ของ ประเทศ</th><th>สถานะ</th><th width="150px;">จัดการ</th>
        </tr>
    </thead>
    <tbody>

   

     <tr>
            <td><input type="text" class="form-control" ng-model="font_name" placeholder="ชื่อ font"></td>
            <td><input type="text" class="form-control" ng-model="font_family" placeholder="รหัส font"></td>
            <td><input type="text" class="form-control" ng-model="font_file" placeholder="ชื่อไฟล์"></td>
            <td><input type="text" class="form-control" ng-model="font_example" placeholder="ตัวอย่าง"></td>
            <td>
<select ng-model="country_id" class="form-control">
	<option ng-repeat="x in countrylist" value="{{x.country_id}}">
		{{x.country_name}}
	</option>
</select>
           </td>
            
            
            <td><span class="label label-default"> ใช้งาน</span></td>
            <td><button class="btn btn-success" ng-click="Add(font_name,font_family,font_file,font_example,country_id)">บันทึก</button></td>
        </tr>



        <tr ng-repeat="x in list">
        

 			<td ng-show="font_id==x.font_id"><input type="text" ng-model="x.font_name" class="form-control"></td>
            <td ng-show="font_id==x.font_id"><input type="text" ng-model="x.font_family" class="form-control"></td>
            <td ng-show="font_id==x.font_id"><input type="text" ng-model="x.font_file" class="form-control"></td>
            <td ng-show="font_id==x.font_id"><input type="text" ng-model="x.font_example" class="form-control"></td>
            <td ng-show="font_id==x.font_id">
<select ng-model="x.country_id" class="form-control">
	<option ng-repeat="y in countrylist" value="{{y.country_id}}">
		{{y.country_name}}
	</option>
</select>
            </td>
            


<style type="text/css">
	@font-face {
    font-family: '{{x.font_family}}'; 
    src: url('<?php echo $base_url;?>/file/font/{{x.country_code}}/{{x.font_file}}');
}
</style>
 
            <td ng-show="font_id!=x.font_id">{{x.font_name}}</td>
            <td ng-show="font_id!=x.font_id">{{x.font_family}}</td>
            <td ng-show="font_id!=x.font_id">{{x.font_file}}</td>
            <td ng-show="font_id!=x.font_id"><span  style="font-family: '{{x.font_family}}';font-size: 20px;">{{x.font_example}}</span></td>
             <td ng-show="font_id!=x.font_id">{{x.country_name}}</td>

            

<td ng-if="x.font_status=='0'"><span class="label label-success" ng-click="Updatestatus(x.font_id,'1')" style="cursor:default">ใช้งาน</span></td>
<td ng-if="x.font_status=='1'" ><span class="label label-danger" ng-click="Updatestatus(x.font_id,'0')" style="cursor:default">ปิดใช้งาน</span></td>

<td ng-show="font_id!=x.font_id"><button class="btn btn-warning btn-xs" ng-click="Editinput(x.font_id)">แก้ไข</button> <button class="btn btn-danger btn-xs" ng-click="Delete(x.font_id)">ลบ</button></td>

            <td ng-show="font_id==x.font_id"><button class="btn btn-success btn-xs" ng-click="Editsave(x.font_id,x.font_name,x.font_family,x.font_file,x.font_example,x.country_id)">บันทึก</button> <button class="btn btn-default btn-xs" ng-click="Edticancel(font_id)">ยกเลิก</button></td>

          

        </tr>
        

    </tbody>
</table>



    </div>
</div>

</div>

<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {


$scope.Getcountrylist = function(){
$http.get("Countrysetting/Get")
    .then(function(response) {
        $scope.countrylist = response.data;
    });
};
$scope.Getcountrylist();


$scope.Getlist = function(){
$http.get("Fontsetting/Get")
    .then(function(response) {
        $scope.list = response.data;
    });
};
$scope.Getlist();


$scope.Add = function(font_name,font_family,font_file,font_example,country_id){

$http({
        method : "POST",
        TYPE : "JSON",
        url : "Fontsetting/Add",
        data : {
font_name: font_name,
font_family: font_family,
font_file: font_file,
font_example: font_example,
country_id: country_id
        }
    }).then(function mySucces(response) {
        
        $scope.Getlist();
    }, function myError(response) {
        
    });

};


$scope.Editinput = function(font_id){
$scope.font_id = font_id;
};

$scope.Edticancel = function(font_id){
$scope.font_id = '';
$scope.Getlist();
};

$scope.Editsave = function(font_id,font_name,font_family,font_file,font_example,country_id){

$http({
        method : "POST",
        url : "Fontsetting/Edit",
        data : {
font_id: font_id,
font_name: font_name,
font_family: font_family,
font_file: font_file,
font_example: font_example,
country_id: country_id
        }
    }).then(function mySucces(response) {
        $scope.font_id = '';
         $scope.Getlist();
    }, function myError(response) {
        
    });

};


$scope.Delete = function(font_id){

$http({
        method : "POST",
        url : "Fontsetting/Delete",
        data : {
font_id: font_id,
        }
    }).then(function mySucces(response) {
        $scope.Getlist();
    }, function myError(response) {
        
    });

};




$scope.Updatestatus = function(font_id,status){
$http({
        method : "POST",
        url : "Fontsetting/Updatestatus",
        data : {
font_id: font_id,
font_status: status
        }
    }).then(function mySucces(response) {
        $scope.Getlist();
    }, function myError(response) {
        
    });
};


    });
</script>