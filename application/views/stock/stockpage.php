<div class="container" ng-app="mytee" ng-controller="teeCtrl">
	
<div class="col-md-12 panel panel-default">
<h2>เพิ่มเสื้อเข้า stock </h2>
<hr />
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;">ลำดับ</th>
			<th>รูปแบบเสื้อ</th>
			<th style="width: 50px;">ขนาด</th>
			<th style="width: 50px;">สี</th>
			<th style="width: 150px;">จำนวน/ตัว</th>
			<th style="width: 50px;">ลบ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listadd">
		<td align="center">{{$index+1}}</td>
			<td><button class="btn btn-default" ng-click="Openproductstyle($index)">{{x.product_style_name}}</button></td>
			<td><button class="btn btn-default" ng-click="Getstylesizelist(x.product_style_id,$index)">{{x.product_size_name}}</button></td>
			<td><button class="btn btn-default" ng-click="Getstylecolorlist(x.product_style_id,$index)"><span  style="background-color: #{{x.product_color_code}};padding-top: 5px;padding-bottom: 5px;padding-right: 15px;padding-left: 15px;""></span>   {{x.product_color_name}}  </button>

			</td>
			<td><input type="text" class="form-control" placeholder="จำนวน" ng-model="x.product_num" style="text-align: right;"></td>
			<td><button class="btn btn-danger" ng-click="Deletepush($index)">ลบ</button></td>
		</tr>
		<tr>
			<td colspan="4" align="right">รวม</td>
			<td align="right" style="font-weight: bold;">{{Productnumsum()}}</td>
			<td></td>
		</tr>
	</tbody>
</table>


<input type="text" name="" ng-model="remark" class="form-control" placeholder="หมายเหตุ">
<hr>

<button class="btn btn-primary btn-lg" ng-click="Addproductstock()">เพิ่มเสื้อ</button>
<button class="btn btn-success btn-lg" style="float: right;" ng-click="Savestock()">บันทึก</button>

<hr>
</div>

<div class="col-md-12 panel panel-default">
<hr>
รายการนำเข้า stock
<div style="float: right;"><input type="checkbox" ng-model="showbdel" name=""> แสดงปุ่มลบ</div>
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width: 50px;">ลำดับ</th>
			<th style="width: 50px;">Runno</th>
			<th style="width: 100px;">จำนวน/ตัว</th>
			<th>หมายเหตุ</th>
			<th style="width: 200px;">วันที่</th>
			<th style="width: 50px;"  ng-show="showbdel">ลบ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in Stockheaderlist">
			<td>{{$index+1}}</td>
			<td><button class="btn btn-default" ng-click="Openrunnolist(x)">{{x.runno}}</button></td>
			<td align="right">{{x.product_num_all}}</td>
			<td>{{x.remark}}</td>
			<td>{{x.adddate}}</td>
			<td ng-show="showbdel"><button class="btn btn-danger"  ng-click="Deletestockheader(x)">ลบ</button></td>
		</tr>
	</tbody>
</table>




<div class="modal fade" id="Openproductstyle">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">แบบเสื้อ</h4>
			</div>
			<div class="modal-body">
	<input type="text" name="" placeholder="ค้นหา" class="form-control" ng-model="searchstyle">			
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th>เลือก</th><th>รูปแบบเสื้อ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in Stylelist | filter:searchstyle">
			<td><button class="btn btn-success" ng-click="Selectproductstyle(x,index)">เลือก</button></td><td>{{x.product_style_name}}</td>
		</tr>
	</tbody>
</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
			</div>
		</div>
	</div>
</div>






<div class="modal fade" id="Openproductsize">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ขนาดเสื้อ</h4>
			</div>
			<div class="modal-body">
	<input type="text" name="" placeholder="ค้นหา" class="form-control" ng-model="searchsize">			
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th>เลือก</th><th>ขนาดเสื้อ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in Sizelist | filter:searchsize">
			<td><button class="btn btn-success" ng-click="Selectproductsize(x,index)">เลือก</button></td><td>{{x.product_size_name}}</td>
		</tr>
	</tbody>
</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
			</div>
		</div>
	</div>
</div>






<div class="modal fade" id="Openproductcolor">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">สีเสื้อ</h4>
			</div>
			<div class="modal-body">
	<input type="text" name="" placeholder="ค้นหา" class="form-control" ng-model="searchcolor">			
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th>เลือก</th><th>สีเสื้อ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in Colorlist | filter:searchcolor">
			<td><button class="btn btn-success" ng-click="Selectproductcolor(x,index)">เลือก</button></td><td>{{x.product_color_name}}</td>
		</tr>
	</tbody>
</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
			</div>
		</div>
	</div>
</div>









<div class="modal fade" id="Openrunnolist">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">รายการนำเข้า Runno: {{runnotitle}}</h4>
			</div>
			<div class="modal-body">
				
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width: 50px;">ลำดับ</th>
			<th>รูปแบบเสื้อ</th>
			<th>ขนาด</th>
			<th>สี</th>
			<th>จำนวน</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in runnolist">
			<td>{{$index+1}}</td>
			<td>{{x.product_style_name}}</td>
			<td>{{x.product_size_name}}</td>
			<td><span  style="background-color: #{{x.product_color_code}};padding-top: 5px;padding-bottom: 5px;padding-right: 15px;padding-left: 15px;""></span>   {{x.product_color_name}}  </td>
			<td>{{x.product_num}}</td>
		</tr>
	</tbody>
</table>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>













	

</div>

</div>


<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.remark = '';
$scope.listadd = [];
$scope.pagelist = [];
$scope.Getstockheader = function(){

$http({
        method : "POST",
        type: 'JSON',
        url : "Stockpage/Getstockheader",
        data : ''
    }).then(function mySucces(response) {

        $scope.Stockheaderlist = response.data;


for($i=1;$i<=$scope.Stockheaderlistpageall;$i++){
	$scope.pagelist.push({
		x: $i
	});
}

    }, function myError(response) {
        
    });

};
$scope.Getstockheader();


$scope.Addproductstock = function(){
$scope.listadd.push({
	product_style_id: '0',
	product_style_name: 'เลือกแบบเสื้อ',
	product_color_name: 'เลือกสี',
	product_color_id: '0',
	product_color_code: '',
	product_size_name: 'เลือกขนาด',
	product_size_id: '0',
	product_num: '0'
});
};

$scope.Deletepush = function(index){
$scope.listadd.splice(index,1);
};


$scope.Getstylelist = function(){
$http.get("Stockpage/Getstylelist")
    .then(function(response) {
        $scope.Stylelist = response.data;
    });
};



$scope.Openproductstyle = function(index){
$('#Openproductstyle').modal('show');
$scope.index = index;
$scope.Getstylelist();
};

$scope.Selectproductstyle = function(x,index){
$scope.listadd[index].product_style_name = x.product_style_name;
$scope.listadd[index].product_style_id = x.product_style_id;
$('#Openproductstyle').modal('hide');
};





$scope.Getstylesizelist =function(product_style_id,index){
	$scope.index = index;
	$('#Openproductsize').modal('show');
$http({
        method : "POST",
        url : "Stockpage/Stylesizelist",
        data : {
product_style_id: product_style_id,
        }
    }).then(function mySucces(response) {
        $scope.Sizelist = response.data;
    }, function myError(response) {
        
    });
};

$scope.Selectproductsize = function(x,index){
$scope.listadd[index].product_size_name = x.product_size_name;
$scope.listadd[index].product_size_id = x.product_size_id;
$('#Openproductsize').modal('hide');
};




$scope.Getstylecolorlist =function(product_style_id,index){
	$scope.index = index;
	$('#Openproductcolor').modal('show');
$http({
        method : "POST",
        url : "Stockpage/Stylecolorlist",
        data : {
product_style_id: product_style_id,
        }
    }).then(function mySucces(response) {
        $scope.Colorlist = response.data;
    }, function myError(response) {
        
    });
};

$scope.Selectproductcolor = function(x,index){
$scope.listadd[index].product_color_name = x.product_color_name;
$scope.listadd[index].product_color_id = x.product_color_id;
$scope.listadd[index].product_color_code = x.product_color_code;
$('#Openproductcolor').modal('hide');
};


$scope.Productnumsum = function(){
	var sum = 0;


for($i=0;$i<$scope.listadd.length;$i++){

	if($scope.listadd[$i].product_style_id!='0' && $scope.listadd[$i].product_color_id!='0' && $scope.listadd[$i].product_size_id!='0')
sum += parseInt($scope.listadd[$i].product_num);
};



return sum;
};



$scope.Savestock = function(){
	if($scope.listadd[0].product_style_id != '0'){
$http({
        method : "POST",
        url : "Stockpage/Savestock",
        data : {
listadd: $scope.listadd,
product_num_all: $scope.Productnumsum(),
remark: $scope.remark
        }
    }).then(function mySucces(response) {
        $scope.listadd = [];
        $scope.remark = '';
        $scope.Getstockheader();
    }, function myError(response) {
        
    });
}else{

}


};


$scope.Deletestockheader = function(x){
$http({
        method : "POST",
        url : "Stockpage/Deletestockheader",
        data : {
runno: x.runno
        }
    }).then(function mySucces(response) {
        $scope.Getstockheader();
    }, function myError(response) {
        
    });
};


$scope.Openrunnolist =function(x){
	$('#Openrunnolist').modal('show');
$http({
        method : "POST",
        url : "Stockpage/Openrunnolist",
        data : {
runno: x.runno
        }
    }).then(function mySucces(response) {
       $scope.runnolist = response.data;
       $scope.runnotitle =  x.runno;
    }, function myError(response) {
        
    });
};


});
</script>