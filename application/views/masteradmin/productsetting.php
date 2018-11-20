<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">
	
<div class="panel panel-default">
	<div class="panel-body">
		


		<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#style" aria-controls="style" role="tab" data-toggle="tab">รูปแบบเสื้อ</a></li>
    <li><a data-toggle="tab" href="#category">หมวดหมู่</a></li>
     <li><a data-toggle="tab" href="#size">ขนาด/Size</a></li>
    <li role="presentation"><a href="#colors" aria-controls="colors" role="tab" data-toggle="tab">สีเสื้อ</a></li>
   </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="style">
  	

<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">
			<th>ชื่อรูปแบบ</th><th>หมวดหมู่</th><th>ด้านหน้า</th><th>ด้านหลัง</th><th>ขนาด/Size</th><th>สี</th><th>จัดการ</th>
		</tr>
	</thead>
	<tbody>

	<tr>
			<td><input type="text" class="form-control" placeholder="รูปแบบ" ng-model="product_style_name"></td>
			<td>
<select class="form-control" ng-model="product_category_id">
		<option ng-repeat="y in Categorylist" value="{{y.product_category_id}}">{{y.product_category_name}}</option>
	</select>
			</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>
			<button class="btn btn-success" ng-click="Stylesave(product_style_name,product_category_id)">บันทึก</button>
			</td>
		</tr>



		<tr ng-repeat="x in Stylelist">
			<td ng-show="product_style_id!=x.product_style_id">{{x.product_style_name}}</td>
			<td ng-show="product_style_id!=x.product_style_id">{{x.product_category_name}}</td>

			<td ng-show="product_style_id!=x.product_style_id">
				<label class="btn btn-default ">
    <img src="<?php echo $base_url; ?>/file/productstyle/{{x.product_style_front}}" width="30px"> 
</label>
			</td>
			<td ng-show="product_style_id!=x.product_style_id">
				<label class="btn btn-default">
    <img src="<?php echo $base_url; ?>/file/productstyle/{{x.product_style_back}}" width="30px"> 
</label>
			</td>
			

			<td ng-show="product_style_id!=x.product_style_id">
				<button class="btn btn-default" ng-click="Openmodalstylesize(x.product_style_id,x.product_style_name)">{{x.sizecount}} ขนาด</button>	
			</td>

			<td ng-show="product_style_id!=x.product_style_id">
				<button class="btn btn-default" ng-click="Openmodalstylecolor(x.product_style_id,x.product_style_name)">{{x.colorcount}} สี</button>	
			</td>
			

			<td ng-show="product_style_id==x.product_style_id"><input type="text" ng-model="x.product_style_name" class="form-control"></td>
			<td ng-show="product_style_id==x.product_style_id">
<select class="form-control" ng-model="x.product_category_id">
		<option ng-repeat="y in Categorylist" value="{{y.product_category_id}}">{{y.product_category_name}}</option>
	</select>
			</td>
			<td ng-show="product_style_id==x.product_style_id">

			</td>
			<td ng-show="product_style_id==x.product_style_id">

			</td>
			<td ng-show="product_style_id==x.product_style_id">

			</td>
			<td ng-show="product_style_id==x.product_style_id">

			</td>

			<td ng-show="product_style_id!=x.product_style_id">
			<button class="btn btn-warning btn-xs" ng-click="Editstyleinput(x.product_style_id)">แก้ไข</button> <button class="btn btn-danger btn-xs" ng-click="Deletestyle(x.product_style_id)">ลบ</button></td>

			<td ng-show="product_style_id==x.product_style_id"><button class="btn btn-success btn-xs" ng-click="Editsavestyle(x.product_style_id,x.product_style_name,x.product_category_id)">บันทึก</button> <button class="btn btn-default btn-xs" ng-click="Edtistylecancel(product_style_id)">ยกเลิก</button></td>

		</tr>

	</tbody>
</table>





    </div>
     <div  role="tabpanel" id="category" class="tab-pane fade">
   
<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">
			<th>ชื่อหมวดหมู่</th><th>จัดการ</th>
		</tr>
	</thead>
	<tbody>
	<tr>
			<td><input type="text" class="form-control" placeholder="ชื่อหมวดหมู่" ng-model="product_category_name"></td><td><button class="btn btn-success" ng-click="Savecategory(product_category_name)">บันทึก</button></td>
		</tr>
		<tr ng-repeat="x in Categorylist">
		<td ng-show="product_category_id==x.product_category_id"><input type="text" ng-model="x.product_category_name" class="form-control"></td>
			<td ng-show="product_category_id!=x.product_category_id">{{x.product_category_name}}</td>

			<td ng-show="product_category_id!=x.product_category_id"><button class="btn btn-warning btn-xs" ng-click="Editcategoryinput(x.product_category_id)">แก้ไข</button> <button class="btn btn-danger btn-xs" ng-click="Deletecategory(x.product_category_id)">ลบ</button></td>

			<td ng-show="product_category_id==x.product_category_id"><button class="btn btn-success btn-xs" ng-click="Editsavecategory(x.product_category_id,x.product_category_name)">บันทึก</button> <button class="btn btn-default btn-xs" ng-click="Edticategorycancel(product_category_id)">ยกเลิก</button></td>
		</tr>
	</tbody>
</table>


  </div>
  <div  role="tabpanel" id="size" class="tab-pane fade">


<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">
			<th>ชื่อขนาด</th>
			
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in Sizelist">
			

			<td>{{x.product_size_name}}</td>
			


		</tr>
	</tbody>
</table>



  </div>
    <div role="tabpanel" class="tab-pane fade" id="colors">
   	



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
		

			<td style="background-color: #{{x.product_color_code}};"></td>

			<td ng-show="product_color_id==x.product_color_id"><input type="text" ng-model="x.product_color_name" class="form-control"></td>
			<td ng-show="product_color_id==x.product_color_id"><input type="text" ng-model="x.product_color_code" class="form-control"></td>
			
			<td ng-show="product_color_id!=x.product_color_id">{{x.product_color_name}}</td>
			<td ng-show="product_color_id!=x.product_color_id">{{x.product_color_code}}</td>
			

<td ng-if="x.product_color_status=='0'"><span class="label label-success" ng-click="Updatecolorstatus(x.product_color_id,'1')" style="cursor:default">ใช้งาน</span></td>
<td ng-if="x.product_color_status=='1'" ><span class="label label-danger" ng-click="Updatecolorstatus(x.product_color_id,'0')" style="cursor:default">ปิดใช้งาน</span></td>
			<td ng-show="product_color_id!=x.product_color_id"><button class="btn btn-warning btn-xs" ng-click="Editcolorinput(x.product_color_id)">แก้ไข</button> <button class="btn btn-danger btn-xs" ng-click="Deletecolor(x.product_color_id)">ลบ</button></td>

			<td ng-show="product_color_id==x.product_color_id"><button class="btn btn-success btn-xs" ng-click="Editsavecolor(x.product_color_id,x.product_color_name,x.product_color_code)">บันทึก</button> <button class="btn btn-default btn-xs" ng-click="Edticolorcancel(product_color_id)">ยกเลิก</button></td>

		</tr>
		

	</tbody>
</table>




    </div>

  </div>

</div>




<div class="modal fade" id="Openmodalstylecolor">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">รายการสี ของ {{product_style_color_name}}</h4>
			</div>
			<div class="modal-body">
				
<button  class="btn" ng-repeat="x in Colorlist" class="label" ng-click="Addstylecolor(product_style_color_id,x.product_color_id)" style="background-color: #{{x.product_color_code}};cursor: default;margin-left: 1px;">+ {{x.product_color_name}}</button>

<br /><br />

<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;"> 
			<th width="5px;">ลำดับ</th><th>สี</th><th>ชื่อสี</th><th width="50px;">ลบ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in Stylecolorlist">
		<td align="center">{{$index+1}}</td>
			<td style="background-color: #{{x.product_color_code}};"></td>
			<td>{{x.product_color_name}}</td>
			<td><button class="btn btn-danger btn-xs" ng-click="Deletestylecolor(product_style_color_id,x.product_color_id)">ลบ</button></td>
		</tr>
	</tbody>
</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				
			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="Openmodalstylesize">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">รายการ ขนาด/Size และราคา ของ {{product_style_size_name}}</h4>
			</div>
			<div class="modal-body">
				


<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;"> 
			<th width="5px;">ลำดับ</th><th>ขนาด</th><th>ราคา/บาท</th>
			<th>น้ำหนัก/kg</th>
			<th>Dimensions (L×W×H) (cm)</th>
			<th width="50px;">จัดการ</th>
		</tr>
	</thead>
	<tbody>

<tr>
<td></td>
<td>
<select class="form-control" ng-model="product_size_id">
		<option ng-repeat="y in Sizelist" value="{{y.product_size_id}}">{{y.product_size_name}}</option>
	</select>
	</td>
<td><input type="text" class="form-control" placeholder="ราคา" ng-model="product_style_size_price"></td>
<td><input type="text" class="form-control" placeholder="น้ำหนัก kg" ng-model="product_style_size_weight"></td>
<td>
<form class="form-inline">
<div class="form-group">
<input type="text" class="form-control" placeholder="L" ng-model="product_style_size_dil" style="width: 70px;">
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="W" ng-model="product_style_size_diw" style="width: 70px;">
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="H" ng-model="product_style_size_dih" style="width: 70px;">
</div>
</form>
</td>
<td><button class="btn btn-success" ng-click="Addstylesize(product_style_size_id,product_size_id,product_style_size_price,product_style_size_weight,product_style_size_dil,product_style_size_diw,product_style_size_dih)">บันทึก</button></td>
</tr>

		<tr ng-repeat="x in Stylesizelist">
		<td align="center">{{$index+1}}</td>
			<td align="center">{{x.product_size_name}}</td>
			<td align="center">{{x.product_style_size_price}}</td>
			<td align="center">{{x.product_style_size_weight}}</td>
			<td align="center">{{x.product_style_size_dil}} x {{x.product_style_size_diw}} x {{x.product_style_size_dih}}</td>
			<td><button class="btn btn-danger btn-xs" ng-click="Deletestylesize(product_style_size_id,x.product_size_id)">ลบ</button></td>
		</tr>
	</tbody>
</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				
			</div>
		</div>
	</div>
</div>








	</div>
</div>

</div>



<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {




// Colors ------------------------------------------>

$scope.Getcolorlist = function(){
$http.get("Productsetting/Getcolorlist")
    .then(function(response) {
        $scope.Colorlist = response.data;
    });
};
$scope.Getcolorlist();




$scope.Addinputcolor = function() {
	$scope.inputcolor = [{
		color_name: '',
		color_code: ''
	}];
$scope.Addinputcolortrue = true;
$('#buttoninputcolor').prop('disabled',true);
};

$scope.CancelAddinputcolor = function(){
$scope.inputcolor = [];
$scope.Addinputcolortrue = false;
$('#buttoninputcolor').prop('disabled',false);
};


$scope.Addcolor = function(color_name,color_code){

$http({
        method : "POST",
        TYPE : "JSON",
        url : "Productsetting/Addcolor",
        data : {
product_color_name: color_name,
product_color_code: color_code
        }
    }).then(function mySucces(response) {
        $scope.CancelAddinputcolor();
        $scope.Getcolorlist();
    }, function myError(response) {
        
    });

};


$scope.Editcolorinput = function(product_color_id){
$scope.product_color_id = product_color_id;
};

$scope.Edticolorcancel = function(product_color_id){
$scope.product_color_id = '';
};

$scope.Editsavecolor = function(product_color_id,product_color_name,product_color_code){

$http({
        method : "POST",
        url : "Productsetting/Editcolor",
        data : {
product_color_id: product_color_id,
product_color_name: product_color_name,
product_color_code: product_color_code
        }
    }).then(function mySucces(response) {
        $scope.product_color_id = '';
         $scope.Getcolorlist();
    }, function myError(response) {
        
    });

};


$scope.Deletecolor = function(product_color_id){

$http({
        method : "POST",
        url : "Productsetting/Deletecolor",
        data : {
product_color_id: product_color_id,
        }
    }).then(function mySucces(response) {
        $scope.Getcolorlist();
    }, function myError(response) {
        
    });

};

$scope.Updatecolorstatus = function(product_color_id,status){
$http({
        method : "POST",
        url : "Productsetting/Updatecolorstatus",
        data : {
product_color_id: product_color_id,
product_color_status: status
        }
    }).then(function mySucces(response) {
        $scope.Getcolorlist();
    }, function myError(response) {
        
    });
};



// end Colors --------------------------------------------->




// style coding ---------------------------->

$scope.Getstylelist = function(){
$http.get("Productsetting/Getstylelist")
    .then(function(response) {
        $scope.Stylelist = response.data;
    });
};
$scope.Getstylelist();


$scope.Stylesave = function(product_style_name,product_category_id){
$http({
        method : "POST",
        url : "Productsetting/Addstyle",
        data : {
product_style_name: product_style_name,
product_category_id: product_category_id
        }
    }).then(function mySucces(response) {
        $scope.Getstylelist();
    }, function myError(response) {
        
    });
};




$scope.Editstyleinput = function(product_style_id){
$scope.product_style_id = product_style_id;
};

$scope.Edtistylecancel = function(product_style_id){
$scope.product_style_id = '';
};

$scope.Editsavestyle = function(product_style_id,product_style_name,product_category_id){

$http({
        method : "POST",
        url : "Productsetting/Editstyle",
        data : {
product_style_id: product_style_id,
product_style_name: product_style_name,
product_category_id: product_category_id
        }
    }).then(function mySucces(response) {
        $scope.product_style_id = '';
         $scope.Getstylelist();
    }, function myError(response) {
        
    });

};


$scope.Deletestyle = function(product_style_id){

$http({
        method : "POST",
        url : "Productsetting/Deletestyle",
        data : {
product_style_id: product_style_id
        }
    }).then(function mySucces(response) {
        $scope.Getstylelist();
    }, function myError(response) {
        
    });

};
// end style coding ----->


// style add multi color

$scope.Getstylecolorlist =function(product_style_id){
$http({
        method : "POST",
        url : "Productsetting/Stylecolorlist",
        data : {
product_style_id: product_style_id,
        }
    }).then(function mySucces(response) {
        $scope.Stylecolorlist = response.data;
    }, function myError(response) {
        
    });
};


$scope.Openmodalstylecolor = function(product_style_id,product_style_name){
$('#Openmodalstylecolor').modal('show');
$scope.product_style_color_id = product_style_id;
$scope.product_style_color_name = product_style_name;
$scope.Getstylecolorlist(product_style_id);

};


$scope.Addstylecolor = function(product_style_id,product_color_id){


$http({
        method : "POST",
        url : "Productsetting/Addstylecolor",
        data : {
product_style_id: product_style_id,
product_color_id: product_color_id
        }
    }).then(function mySucces(response) {
       $scope.Getstylecolorlist(product_style_id);
       $scope.Getstylelist();
    }, function myError(response) {
        
    });
};



$scope.Deletestylecolor = function(product_style_id,product_color_id){
$http({
        method : "POST",
        url : "Productsetting/Deletestylecolor",
        data : {
product_style_id: product_style_id,
product_color_id: product_color_id
        }
    }).then(function mySucces(response) {
      $scope.Getstylecolorlist(product_style_id);
      $scope.Getstylelist();
    }, function myError(response) {
        
    });
};



// category -------------------


$scope.Getcategorylist = function(){
$http.get("Productsetting/Getcategorylist")
    .then(function(response) {
        $scope.Categorylist = response.data;
    });
};
$scope.Getcategorylist();


$scope.Savecategory = function(product_category_name){
$http({
        method : "POST",
        TYPE : "JSON",
        url : "Productsetting/Addcategory",
        data : {
product_category_name: product_category_name
        }
    }).then(function mySucces(response) {
       $scope.Getcategorylist();
    }, function myError(response) {
        
    });

};




$scope.Editcategoryinput = function(product_category_id){
$scope.product_category_id = product_category_id;
};

$scope.Edticategorycancel = function(product_category_id){
$scope.product_category_id = '';
};

$scope.Editsavecategory = function(product_category_id,product_category_name){

$http({
        method : "POST",
        url : "Productsetting/Editcategory",
        data : {
product_category_id: product_category_id,
product_category_name: product_category_name
        }
    }).then(function mySucces(response) {
        $scope.product_category_id = '';
         $scope.Getcategorylist();
    }, function myError(response) {
        
    });

};


$scope.Deletecategory = function(product_category_id){

$http({
        method : "POST",
        url : "Productsetting/Deletecategory",
        data : {
product_category_id: product_category_id,
        }
    }).then(function mySucces(response) {
        $scope.Getcategorylist();
    }, function myError(response) {
        
    });

};


// size -------------

$scope.Getsizelist = function(){
$http.get("Productsetting/Getsizelist")
    .then(function(response) {
        $scope.Sizelist = response.data;
    });
};
$scope.Getsizelist();



$scope.Getstylesizelist =function(product_style_id){
$http({
        method : "POST",
        url : "Productsetting/Stylesizelist",
        data : {
product_style_id: product_style_id,
        }
    }).then(function mySucces(response) {
        $scope.Stylesizelist = response.data;
    }, function myError(response) {
        
    });
};



$scope.Openmodalstylesize = function(product_style_id,product_style_name){
$('#Openmodalstylesize').modal('show');
$scope.product_style_size_id = product_style_id;
$scope.product_style_size_name = product_style_name;
$scope.Getstylesizelist(product_style_id);

};




$scope.Addstylesize = function(product_style_id,product_size_id,product_style_size_price,product_style_size_weight,product_style_size_dil,product_style_size_diw,product_style_size_dih){


$http({
        method : "POST",
        url : "Productsetting/Addstylesize",
        data : {
product_style_id: product_style_id,
product_size_id: product_size_id,
product_style_size_price: product_style_size_price,
product_style_size_weight: product_style_size_weight,
product_style_size_dil: product_style_size_dil,
product_style_size_diw: product_style_size_diw,
product_style_size_dih: product_style_size_dih

        }
    }).then(function mySucces(response) {
       $scope.Getstylesizelist(product_style_id);
       $scope.Getstylelist();
    }, function myError(response) {
        
    });
};



$scope.Deletestylesize = function(product_style_id,product_size_id){
$http({
        method : "POST",
        url : "Productsetting/Deletestylesize",
        data : {
product_style_id: product_style_id,
product_size_id: product_size_id
        }
    }).then(function mySucces(response) {
      $scope.Getstylesizelist(product_style_id);
      $scope.Getstylelist();
    }, function myError(response) {
        
    });
};





});
</script>
