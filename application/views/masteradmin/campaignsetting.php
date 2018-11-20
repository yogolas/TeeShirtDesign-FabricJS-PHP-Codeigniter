<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">


<div class="panel panel-default">
	<div class="panel-body">
		

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#category">หมวดหมู่หลัก</a></li>
  <li><a data-toggle="tab" href="#subcategory">หมวดหมู่ย่อย</a></li>
  <li><a data-toggle="tab" href="#limitday">Limit Day</a></li>
</ul>

<div class="tab-content">
  <div id="category" class="tab-pane fade in active">
   
<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">
			<th>ชื่อหมวดหมู่หลัก</th><th>จัดการ</th>
		</tr>
	</thead>
	<tbody>
	<tr>
			<td><input type="text" class="form-control" placeholder="ชื่อหมวดหมู่หลัก" ng-model="campaign_category_name"></td><td><button class="btn btn-success" ng-click="Savecategory(campaign_category_name)">บันทึก</button></td>
		</tr>
		<tr ng-repeat="x in Categorylist">
		<td ng-show="campaign_category_id==x.campaign_category_id"><input type="text" ng-model="x.campaign_category_name" class="form-control"></td>
			<td ng-show="campaign_category_id!=x.campaign_category_id">{{x.campaign_category_name}}</td>

			<td ng-show="campaign_category_id!=x.campaign_category_id"><button class="btn btn-warning btn-xs" ng-click="Editcategoryinput(x.campaign_category_id)">แก้ไข</button> <button class="btn btn-danger btn-xs" ng-click="Deletecategory(x.campaign_category_id)">ลบ</button></td>

			<td ng-show="campaign_category_id==x.campaign_category_id"><button class="btn btn-success btn-xs" ng-click="Editsavecategory(x.campaign_category_id,x.campaign_category_name)">บันทึก</button> <button class="btn btn-default btn-xs" ng-click="Edticategorycancel(campaign_category_id)">ยกเลิก</button></td>
		</tr>
	</tbody>
</table>


  </div>
  <div id="subcategory" class="tab-pane fade">
    

<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">
			<th>ชื่อหมวดหมู่ย่อย</th><th>หมวดหมู่หลัก</th><th>จัดการ</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<tr>
			<td><input type="text" class="form-control" placeholder="ชื่อหมวดหมู่ย่อย" ng-model="campaign_subcategory_name"></td>
<td>
	<select class="form-control" ng-model="campaign_category_id_sub">
		<option ng-repeat="x in Categorylist" value="{{x.campaign_category_id}}">{{x.campaign_category_name}}</option>
	</select>
</td>
			<td><button class="btn btn-success" ng-click="Savesubcategory(campaign_subcategory_name,campaign_category_id_sub)">บันทึก</button></td>
		</tr>
		<tr ng-repeat="x in subCategorylist">
		<td ng-show="campaign_subcategory_id==x.campaign_subcategory_id"><input type="text" ng-model="x.campaign_subcategory_name" class="form-control"></td>
		<td ng-show="campaign_subcategory_id==x.campaign_subcategory_id">
	<select class="form-control" ng-model="x.campaign_category_id">
		<option ng-repeat="y in Categorylist" value="{{y.campaign_category_id}}">{{y.campaign_category_name}}</option>
	</select>
</td>

			<td ng-show="campaign_subcategory_id!=x.campaign_subcategory_id">{{x.campaign_subcategory_name}}</td>
			<td ng-show="campaign_subcategory_id!=x.campaign_subcategory_id">{{x.campaign_category_name}}</td>


			<td ng-show="campaign_subcategory_id!=x.campaign_subcategory_id"><button class="btn btn-warning btn-xs" ng-click="Editsubcategoryinput(x.campaign_subcategory_id,x.campaign_category_id)">แก้ไข</button> <button class="btn btn-danger btn-xs" ng-click="Deletesubcategory(x.campaign_subcategory_id)">ลบ</button></td>

			<td ng-show="campaign_subcategory_id==x.campaign_subcategory_id"><button class="btn btn-success btn-xs" ng-click="Editsavesubcategory(x.campaign_subcategory_id,x.campaign_subcategory_name,x.campaign_category_id)">บันทึก</button> <button class="btn btn-default btn-xs" ng-click="Edtisubcategorycancel(campaign_subcategory_id)">ยกเลิก</button></td>
		</tr>
		</tr>
	</tbody>
</table>



  </div>
  <div id="limitday" class="tab-pane fade">
   
จำนวนวันหมดอายุขั้นต่ำของ campaign
<input type="text" class="form-control" placeholder="จำนวนวัน" style="width: 100px;" ng-model="list.campaign_limitday_num">
วัน

<br />
<button class="btn btn-success" ng-click="Savelimitday()">บันทึก</button>
<span ng-show="success" style="color: green">บันทึกสำเร็จ</span>
<span ng-show="nosuccess" style="color: red">บันทึกไม่สำเร็จ</span>

  </div>
</div>


	</div>
</div>



</div>





<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {



$scope.Getcategorylist = function(){
$http.get("Campaignsetting/Getcategorylist")
    .then(function(response) {
        $scope.Categorylist = response.data;
    });
};
$scope.Getcategorylist();


$scope.Savecategory = function(campaign_category_name){
$http({
        method : "POST",
        TYPE : "JSON",
        url : "Campaignsetting/Addcategory",
        data : {
campaign_category_name: campaign_category_name
        }
    }).then(function mySucces(response) {
       $scope.Getcategorylist();
    }, function myError(response) {
        
    });

};




$scope.Editcategoryinput = function(campaign_category_id){
$scope.campaign_category_id = campaign_category_id;
};

$scope.Edticategorycancel = function(campaign_category_id){
$scope.campaign_category_id = '';
};

$scope.Editsavecategory = function(campaign_category_id,campaign_category_name){

$http({
        method : "POST",
        url : "Campaignsetting/Editcategory",
        data : {
campaign_category_id: campaign_category_id,
campaign_category_name: campaign_category_name
        }
    }).then(function mySucces(response) {
        $scope.campaign_category_id = '';
         $scope.Getcategorylist();
    }, function myError(response) {
        
    });

};


$scope.Deletecategory = function(campaign_category_id){

$http({
        method : "POST",
        url : "Campaignsetting/Deletecategory",
        data : {
campaign_category_id: campaign_category_id,
        }
    }).then(function mySucces(response) {
        $scope.Getcategorylist();
    }, function myError(response) {
        
    });

};











$scope.Getsubcategorylist = function(){
$http.get("Campaignsetting/Getsubcategorylist")
    .then(function(response) {
        $scope.subCategorylist = response.data;
    });
};
$scope.Getsubcategorylist();


$scope.Savesubcategory = function(campaign_subcategory_name,campaign_category_id_sub){
$http({
        method : "POST",
        TYPE : "JSON",
        url : "Campaignsetting/Addsubcategory",
        data : {
campaign_subcategory_name: campaign_subcategory_name,
campaign_category_id: campaign_category_id_sub
        }
    }).then(function mySucces(response) {
       $scope.Getsubcategorylist();
    }, function myError(response) {
        
    });

};




$scope.Editsubcategoryinput = function(campaign_subcategory_id,campaign_category_id){
$scope.campaign_subcategory_id = campaign_subcategory_id;
$scope.campaign_category_id = campaign_category_id;
};

$scope.Edtisubcategorycancel = function(campaign_subcategory_id){
$scope.campaign_subcategory_id = '';
};

$scope.Editsavesubcategory = function(campaign_subcategory_id,campaign_subcategory_name,campaign_category_id){

$http({
        method : "POST",
        url : "Campaignsetting/Editsubcategory",
        data : {
campaign_subcategory_id: campaign_subcategory_id,
campaign_subcategory_name: campaign_subcategory_name,
campaign_category_id: campaign_category_id
        }
    }).then(function mySucces(response) {
        $scope.campaign_subcategory_id = '';
         $scope.Getsubcategorylist();
    }, function myError(response) {
        
    });

};


$scope.Deletesubcategory = function(campaign_subcategory_id){

$http({
        method : "POST",
        url : "Campaignsetting/Deletesubcategory",
        data : {
campaign_subcategory_id: campaign_subcategory_id,
        }
    }).then(function mySucces(response) {
        $scope.Getsubcategorylist();
    }, function myError(response) {
        
    });

};






$scope.Getlimitday = function(){
$http.get("Campaignsetting/Getlimitday")
    .then(function(response) {
        $scope.list = response.data;
    });
};
$scope.Getlimitday();



$scope.Savelimitday = function(){
	$scope.success = false;
	$scope.nosuccess = false;
$http({
        method : "POST",
        url : "Campaignsetting/Savelimitday",
        data : {
campaign_limitday_num: $scope.list.campaign_limitday_num

        }
    }).then(function mySucces(response) {
        if(response.data.status=='success'){
        	$scope.success = true;
        	$scope.Getlimitday();
        }else{
        	$scope.nosuccess = true;
        }
    }, function myError(response) {
        
    });
};



});
</script>	