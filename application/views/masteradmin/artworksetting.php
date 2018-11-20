<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">




<div class="col-md-2">
	<div class="panel panel-default">
	<div class="panel-body">

<div class="text-center" >หมวดหมู่ <button type="submit" class="btn btn-primary btn-xs" ng-click="Openmodaladdcategory()">+</button></div>


  <hr />
  
<div class="list-group">
<a href="#" class="list-group-item" ng-click="Openartworkinthiscatall(x.artwork_category_id)">แสดงทั้งหมด</a>

<a href="#" class="list-group-item" ng-repeat="x in Categorylist" ng-click="Openartworkinthiscat(x.artwork_category_id,x.artwork_category_name)">{{x.artwork_category_name}}</a>

</div>




		
	


	</div>
	</div>
</div>


<div class="col-md-10">
	<div class="panel panel-default">
	<div class="panel-body">
<div ng-hide="category_id" style="float: left;">แสดงทั้งหมด </div>
<div ng-show="category_id" style="float: left;">{{category_name}} </div> 
<div  ng-show="category_id" style="float: right;"> 

<button ng-click="Openmodaladdimage()" class="btn btn-primary">+ เพิ่ม Artwork</button>


</div>


<br /><br />


<table class="table table-hover" ng-hide="category_id">
	<thead>
		<tr style="background-color: #eee;">
			<th>รูป</th><th>ชื่อรูป</th><th>หมวดหมู่</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in Getimageallcategory">
			<td><img src="<?php echo $base_url; ?>/file/artwork/{{x.artwork_filename}}" width="30px"></td>
			<td>{{x.artwork_name}}</td>
			<td>{{x.artwork_category_name}}</td>
		</tr>
	</tbody>
</table>


<table class="table table-hover" ng-show="category_id">
	<thead>
		<tr style="background-color: #eee;">
			<th>รูป</th><th>ชื่อรูป</th><th>หมวดหมู่</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in Getimagecategory">
			<td><img src="<?php echo $base_url; ?>/file/artwork/{{x.artwork_filename}}" width="30px"></td>
			<td>{{x.artwork_name}}</td>
			<td>{{x.artwork_category_name}}</td>
		</tr>
	</tbody>
</table>


	</div>
	</div>
</div>






<div class="modal fade" id="Openmodaladdcategory">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เพิ่มหมวดหมู่</h4>
			</div>
			<div class="modal-body">
				

				<form class="form-inline">
  <div class="form-group">
 
    <input type="text" class="form-control" placeholder="ชื่อหมวดหมู่" ng-model="artwork_category_name">
  </div>

  <button type="submit" class="btn btn-success" ng-click="Add(artwork_category_name)">บันทึก</button>
</form>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Openmodaladdimage">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เลือก artwork</h4>
			</div>
			<div class="modal-body">
				
  <form id="uploadartwork" enctype="multipart/form-data" method="POST">
    <input type="file" name="artwork_file[]" class="btn btn-default" multiple>
      <br />
      
<input type="hidden"  name="category_id" value="{{category_id}}" >
 <input type="submit" value="อัปโหลด" class="btn btn-success">

</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
			</div>
		</div>
	</div>
</div>




	</div>



	<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.Getcategorylist = function(){
$http.get("Artworksetting/Getcategorylist")
    .then(function(response) {
        $scope.Categorylist = response.data;
    });
};
$scope.Getcategorylist();


$scope.Openmodaladdcategory = function(){
$('#Openmodaladdcategory').modal('show');
};


$scope.Openmodaladdimage = function(){
$('#Openmodaladdimage').modal('show');
};



$scope.Add = function(artwork_category_name){
$http({
        method : "POST",
        url : "Artworksetting/Addcategory",
        data : {
artwork_category_name: artwork_category_name

        }
    }).then(function mySucces(response) {
        $('#Openmodaladdcategory').modal('hide');
        $scope.Getcategorylist();
    }, function myError(response) {
        
    });
};



$scope.Getimageall = function(){
$http.get("Artworksetting/Getimageall")
    .then(function(response) {
        $scope.Getimageallcategory = response.data;
    });
};
$scope.Getimageall();



$scope.Getimage = function(category_id){

	$http({
        method : "POST",
        url : "Artworksetting/Getimage",
        data : {
category_id: category_id

        }
    }).then(function mySucces(response) {
        $scope.Getimagecategory = response.data;
    }, function myError(response) {
        
    });

};


$scope.Openartworkinthiscat = function(artwork_category_id,artwork_category_name){
$scope.category_name = artwork_category_name;
$scope.category_id = artwork_category_id;

$scope.Getimage(artwork_category_id);

};


$scope.Openartworkinthiscatall = function(){
$scope.category_id = false;
$scope.Getimageall();

};






$(document).ready(function (e) {
    $('#uploadartwork').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Artworksetting/Addimage',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log("success");
                console.log(data);
                $scope.Getimage($scope.category_id);
                $('#Openmodaladdimage').modal('hide');
                $('#uploadartwork')[0].reset();
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

 
});









});
</script>	