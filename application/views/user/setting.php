<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">
<h4>Setting</h4>

<div class="panel panel-default">
	<div class="panel-body">





<div class="col-md-3">

<label>ชื่อ</label>
<input type="text" ng-model="user_name" placeholder="ชื่อ-สกุล" class="form-control">
<br />

<label>เบอร์โทร</label>
<input type="text" ng-model="user_phone" placeholder="เบอร์โทร" class="form-control" style="width: 200px;">
<br />

<label>ที่อยู่</label>
<textarea  ng-model="user_address" placeholder="ที่อยู่" class="form-control"></textarea>
<br />


<label>จังหวัด</label>
<input type="text" ng-model="user_province" placeholder="จังหวัด" class="form-control" style="width: 200px;">
<br />

<label>รหัสไปรษณีย์</label>
<input type="text" ng-model="user_zipcode" placeholder="รหัสไปรษณีย์" class="form-control" style="width: 200px;">
<br />

<label>ประเทศ</label>
<select class="form-control" ng-model="user_country_id" style="width: 200px;">
	<option ng-repeat="x in countrylist" value="{{x.country_id}}">
		{{x.country_name}}
	</option>
</select>
<br />

<button class="btn btn-success" ng-click="Saveinfomation()">อัฟเดตข้อมูล</button>
<span ng-show="updatesuccess" style="color: green;">อัฟเดตสำเร็จ</span>

</div>







	</div>
</div>



<div class="panel panel-default">
	<div class="panel-body">

<label>รหัสผ่านใหม่</label>
<input type="password" ng-model="user_newpassword" placeholder="รหัสผ่านใหม่ 6 ตัวขึ้นไป" class="form-control" style="width: 200px;">
<br />
<label>ยืนยันรหัสผ่านใหม่</label>
<input type="password" ng-model="user_newpassword_confirm" placeholder="ยืนยันรหัสผ่านใหม่" class="form-control" style="width: 200px;">
<br />



<button class="btn btn-success" ng-click="Savepassword()">อัฟเดตรหัสผ่าน</button>
<span ng-show="updatepasssuccess" style="color: green;">อัฟเดตสำเร็จ</span>
<span ng-show="newpass6" style="color: red;">กรุณากรอกรหัสผ่าน 6 ตัวขึ้นไป</span>
<span ng-show="newpassconf" style="color: red;">กรุณายืนยันรหัสผ่านให้ตรงกัน</span>

	</div>
	</div>



</div>



	<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.Getcountry = function(){
$http.get("Setting/Getcountry")
    .then(function(response) {
        $scope.countrylist = response.data;
    });
};
$scope.Getcountry();


$scope.Getuserinfo = function(){
$http.get("Setting/Getuserinfo")
    .then(function(response) {
        $scope.userinfo = response.data;
        $scope.user_name = response.data.name;
        $scope.user_address = response.data.address;
        $scope.user_country_id = response.data.country_id;
        $scope.user_province = response.data.province;
        $scope.user_zipcode = response.data.zipcode;
        $scope.user_phone = response.data.phone;
    });
};
$scope.Getuserinfo();



$scope.Saveinfomation = function(){
$http({
        method : "POST",
        TYPE : "JSON",
        url : "Setting/Updateinfo",
        data : {
        	name: $scope.user_name,
        	address: $scope.user_address,
        	country_id: $scope.user_country_id,
        	province: $scope.user_province,
        	zipcode: $scope.user_zipcode,
        	phone: $scope.user_phone

        }
    }).then(function mySucces(response) {
$scope.Getuserinfo();
$scope.updatesuccess = true;
    }, function myError(response) {
        
    });
};


$scope.user_newpassword = '';
$scope.Savepassword = function(){
$scope.updatepasssuccess = false;
if($scope.user_newpassword!=''){
if($scope.user_newpassword.length>=6){
	if($scope.user_newpassword_confirm == $scope.user_newpassword){
$http({
        method : "POST",
        TYPE : "JSON",
        url : "Setting/Updatepass",
        data : {
        	user_newpassword: $scope.user_newpassword,
        }
    }).then(function mySucces(response) {
$scope.Getuserinfo();
$scope.updatepasssuccess = true;
$scope.newpassconf = false;
$scope.newpass6 = false;
    }, function myError(response) {
        
    });
}else{
$scope.newpassconf = true;
$scope.newpass6 = false;
}
}
else{
$scope.newpass6 = true;
$scope.newpassconf = false;
}
}else{
	$scope.newpass6 = true;
$scope.newpassconf = false;
}

};









});

</script>