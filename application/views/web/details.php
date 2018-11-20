



<style type="text/css">
	
	input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}

input[type=range] {
  -webkit-appearance: none;
  margin: 18px 0;
  width: 100%;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #398439;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
}
input[type=range]::-webkit-slider-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ccc;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -14px;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #398439;
}
input[type=range]::-moz-range-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #3071a9;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
}
input[type=range]::-moz-range-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
}
input[type=range]::-ms-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  background: transparent;
  border-color: transparent;
  border-width: 16px 0;
  color: transparent;
}
input[type=range]::-ms-fill-lower {
  background: #2a6495;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-fill-upper {
  background: #3071a9;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
}
input[type=range]:focus::-ms-fill-lower {
  background: #3071a9;
}
input[type=range]:focus::-ms-fill-upper {
  background: #367ebd;
}
</style>


<div ng-app="mytee" ng-controller="teeCtrl">




<?php 

foreach ($fontall as $row) {  ?>



<style type="text/css">
	@font-face {
    font-family: '<?php echo $row['font_family']; ?>'; 
    src: url('<?php echo $base_url;?>/file/font/<?php echo $row['country_code']; ?>/<?php echo $row['font_file']; ?>');
}
</style>

<?php
}

?>





<div class="col-md-4"></div>

<div class="col-md-4 text-center">
 <h4><b>
 <a href="<?php echo $base_url; ?>/campaigns"  style="color:#000;">Design</a> 
<span class="glyphicon glyphicon-chevron-right"></span>
  <a href="<?php echo $base_url; ?>/campaigns/details"> Description </a>

  </b></h4>
</div>

<div class="col-md-4"></div>

<div class="col-md-12"><br /></div>

<div class="col-md-2"></div>




<div class="col-md-4">
<div class="col-md-12 panel panel-default">


<br />
<br />


<input name="thumb-roundness" ng-model="salegole_unit" label="" class="form-control" type="range" min="1" max="1000" step="1" >
<br />

<form class="form-inline">
  <div class="form-group">
   
    <div class="input-group">
      <div class="input-group-addon"># ตัว</div>
      <input name="thumb-roundness" ng-model="salegole_unit" label="" class="form-control" type="number" min="1" max="1000" step="1"  style="width: 70px;text-align: center;">
      
    </div>
  </div>
 
</form>
<br />
กำไร ประมาณการ
<br />
<span style="font-size: 30px;font-weight: bold;"><span style="color: green;">{{salegole_unit*(sale_price - base_price) | number}}+</span> บาท</span>

<br />

<div class="well">
	
<table class="table table-hover">
	<tbody>
		<tr>
			<td style="font-size: 20px;">
				
				{{sale_price - base_price | number}} บาท กำไร/ตัว
			</td>
			<td width="100px">

			<form class="form-inline">
  <div class="form-group">
   <div class="input-group">
   <div class="input-group-addon">ราคาขาย</div>
				 <input  ng-model="sale_price" id="sale_price" class="form-control" type="number" min="{{base_price}}" max="3000" step="1"   style="width: 70px;text-align: center;" >
				 <div class="input-group-addon">บาท</div>
				 </div>
				 </div>
				 </form>
				
      
			</td>
		</tr>
	</tbody>
</table>

</div>

<hr />
<br />


	<br />
<input type="text" name="" class="form-control" placeholder="title" ng-model="campaign_title">
<br />
<textarea id="textarea" class="form-control" placeholder="detail" ng-model="campaign_description" style="height: 150px;"></textarea>

<br />

<form class="form-inline">
  <div class="form-group">
<select class="form-control" ng-model="cat_id" ng-change="Getsubcat(cat_id)">
<option value="0">เลือกหมวดหมู่</option>
	<option ng-repeat="x in catlist" value="{{x.campaign_category_id}}">
		{{x.campaign_category_name}}
	</option>
</select>
</div>
<span ng-show="subcat">-></span>
  <div class="form-group" ng-show="subcat">
<select class="form-control" ng-model="subcat_id">
	<option ng-repeat="x in subcatlist" value="{{x.campaign_subcategory_id}}">
		{{x.campaign_subcategory_name}}
	</option>
</select>
</div>

</form>

<br />

Campaign length
<select class="form-control" ng-model="campaign_length" style="width: 150px;">
	<option value="7">7 วัน</option>
</select>
<br />

<input type="checkbox" ng-model="show_back_first" ng-true-value="'1'"> แสดงด้านหลัง

<br />
<br />
URL
<form class="form-inline">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon"><?php echo $base_url;?>/</div>
      <input type="text" class="form-control" id="" placeholder="" ng-model="url" onkeyup="this.value=this.value.replace(/[^a-z,0-9,_,-]/g,'');">
      
    </div>
  </div>

</form>

<span ng-show="urldup" class="bg-danger">url ไม่สามารถใช้งานได้ กรุณาเปลี่ยนใหม่</span>
<br />


<button id="launch" class="btn btn-success btn-lg" style="width: 100%" ng-click="Launch()">
<span class="glyphicon glyphicon-refresh spin" ng-show="launchid" aria-hidden="true" >	
</span>
LAUNCH</button>

<br />
<br />

</div>
</div>

<div class="col-md-4  panel panel-default" style="width: 540px;height: 640px;">
	
<canvas id="c1" ng-hide="slideback  || show_back_first=='1'"  style="left: 30px;
    top: 20px;
    width: 510px;
    height: 600px;
    border: 1px solid #fff;
    color: rgb(255, 255, 255) !important;
    position: absolute;
    box-sizing: content-box;
    margin-left: -2px;
    -webkit-transition: all .4s ease;
    transition: all .4s ease;">
</canvas> 
<canvas id="c2" ng-show="slideback || show_back_first=='1'" style="left: 30px;
    top: 20px;
    width: 510px;
    height: 600px;
    border: 1px solid #fff;
    color: rgb(255, 255, 255) !important;
    position: absolute;
    box-sizing: content-box;
    margin-left: -2px;
    -webkit-transition: all .4s ease;
    transition: all .4s ease;">
</canvas> 






<div class="panel panel-default">

<center>
<ul class="nav nav-tabs nav-justified">
  <li><a href="" ng-click="Selectproductimagefront()">FRONT</a></li>
  <li><a href="" ng-click="Selectproductimageback()">BACK</a></li>
</ul>
</center>


</div>


</div>




<div class="col-md-2"></div>




</div>


	<script>








var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.campaign_length = '7';
$scope.salegole_unit = 5;
$scope.slideback = false;
$scope.base_price = <?php echo  json_encode($_SESSION['basecost'], JSON_UNESCAPED_UNICODE ); ?>.product_style_size_price;
$scope.sale_price = 600;
$scope.show_back_first = '0';

$scope.campaign_title = '';
$scope.campaign_description = '';
$scope.cat_id = '';
$scope.subcat_id = '';

$scope.url = '<?php echo uniqid();?>';



$('#sale_price').keyup(function(){
  if ($(this).val() < 100){
    
    $(this).val($scope.base_price);
    $scope.sale_price = $scope.base_price;
  }

if ($(this).val() > 3000){
    
    $(this).val('3000');
    $scope.sale_price = $scope.base_price;
  }



});



$scope.Getcat = function(){
$http.get("Getcat")
    .then(function(response) {
        $scope.catlist = response.data;
        $scope.cat_id = '0';
    });
};
$scope.Getcat();



$scope.Getsubcat = function(cat_id){
$http({
        method : "POST",
        TYPE : "JSON",
        url : "Getsubcat",
        data : {
cat_id: cat_id
        }
    }).then(function mySucces(response) {

 $scope.subcat = true;      
$scope.subcatlist = response.data;
$scope.subcat_id = response.data[0].campaign_subcategory_id;

    }, function myError(response) {
        
    });

};


  $scope.frontdata = '';
$scope.changedatajson = function(){
  $scope.frontdata =   <?php echo json_encode($_SESSION['alljsonfront'], JSON_UNESCAPED_UNICODE ); ?>;
  $scope.backdata =   <?php echo json_encode($_SESSION['alljsonback'], JSON_UNESCAPED_UNICODE ); ?>;

$scope.frontdata2 = [];
$scope.backdata2 = [];
angular.forEach($scope.frontdata,function(item){

$scope.frontdata2.push({
	type : item.type,
	left : item.left * 10,
	top : item.top * 10,
	height : item.height * 10,
	width : item.width * 10,
	fontFamily : item.fontFamily,
	fontSize : item.fontSize * 10,
	fill : item.fill,
	scaleX : item.scaleX,
	scaleY : item.scaleY,
	strokeWidth : item.strokeWidth,
	text : item.text,
	src : item.src

});

});

angular.forEach($scope.backdata,function(item){
$scope.backdata2.push({
	type : item.type,
	left : item.left * 5,
	top : item.top * 5,
	height : item.height * 5,
	width : item.width * 5,
	fontFamily : item.fontFamily,
	fontSize : item.fontSize * 5,
	fill : item.fill,
	scaleX : item.scaleX,
	scaleY : item.scaleY,
	strokeWidth : item.strokeWidth,
	text : item.text,
	src : item.src

});


});

$scope.fontdata3 = {objects : $scope.frontdata2};
$scope.backdata3 = {objects : $scope.backdata2};

};
$scope.changedatajson();


var canvases = new fabric.Canvas('c1');
var canvases2 = new fabric.Canvas('c2');

var canvasesfront = new fabric.Canvas();
var canvasesback = new fabric.Canvas();

	<?php if(isset($_SESSION['alljson'])){ ?>
canvases.clear();
//canvases.setBackgroundColor('#ff3300', canvases.renderAll.bind(canvases));
canvases.loadFromJSON('<?php echo  json_encode($_SESSION['alljson'], JSON_UNESCAPED_UNICODE ); ?>', canvases.renderAll.bind(canvases));
canvases2.loadFromJSON('<?php echo  json_encode($_SESSION['alljson2'], JSON_UNESCAPED_UNICODE ); ?>', canvases2.renderAll.bind(canvases2));

canvasesfront.loadFromJSON($scope.fontdata3, canvasesfront.renderAll.bind(canvasesfront));
canvasesback.loadFromJSON($scope.backdata3, canvasesback.renderAll.bind(canvasesback));



$('.upper-canvas').css({width:'510',height:'600' });    


canvases.setDimensions({width:'510',height:'600' });
canvases2.setDimensions({width:'510',height:'600' });


  fabric.Object.prototype.selectable = false;
  fabric.Object.prototype.evented = false;


<?php } ?>



$scope.Selectproductimageback = function(){
$scope.slideback = true;
};

$scope.Selectproductimagefront = function(){
$scope.slideback = false;
};








$scope.urldup = false;
$scope.Launch = function(){
$('#launch').prop('disabled', true);
$scope.launchid= true;



var dataURL  = canvases.toDataURL('image/png');
var dataURL2  = canvases2.toDataURL('image/png');

var imagefront  = canvasesfront.toDataURL({
    format: 'png',
    width: 3000,
    height: 2250
});
var imageback  = canvasesback.toDataURL({
    format: 'png',
    width: 3000,
    height: 2250
});


if($scope.launchid==true){

if($scope.campaign_title==''){
$scope.launchid=false;
$('#launch').prop('disabled', false);
}else if($scope.campaign_description==''){
$scope.launchid=false;
$('#launch').prop('disabled', false);
}else if($scope.cat_id==''){
$scope.launchid=false;
$('#launch').prop('disabled', false);
}else if($scope.subcat_id==''){
$scope.launchid=false;
$('#launch').prop('disabled', false);
}else if($scope.campaign_length==''){
$scope.launchid=false;
$('#launch').prop('disabled', false);
}else if($scope.base_price==''){
$scope.launchid=false;
$('#launch').prop('disabled', false);
}else if($scope.salegole_unit==''){
$scope.launchid=false;
$('#launch').prop('disabled', false);
}else if($scope.sale_price=='' && $scope.sale_price > $scope.base_price && $scope.sale_price < 3000){
$scope.launchid=false;
$('#launch').prop('disabled', false);
}else if($scope.url==''){
$scope.launchid=false;
$('#launch').prop('disabled', false);
}else{


$.ajax({
        method : "POST",
        TYPE : "JSON",
        url : "Launch",
        data : {
campaign_title: $scope.campaign_title,
campaign_description: $scope.campaign_description,
campaign_category_id: $scope.cat_id,
subcategory_id: $scope.subcat_id,
campaign_length: $scope.campaign_length,
base_price: $scope.base_price,
salegole_unit: $scope.salegole_unit,
sale_price: $scope.sale_price,
show_back_first: $scope.show_back_first,
url: $scope.url,
front_image: dataURL,
back_image: dataURL2,
front_design_image: imagefront,
back_design_image: imageback
        }


    }).then(function mySucces(response) {


<?php if(!isset($_SESSION['user_id'])){ ?>

window.location = "<?php echo $base_url;?>/login"; 

<?php }else{ ?>
	
    	if(response=='1'){
$scope.urldup = true;
    	}else{

    	setTimeout(function(){ 
    	window.location = "<?php echo $base_url;?>/" + $scope.url; 
    	 }, 3000);	
    		   
    	}

    	<?php } ?>
   

    }, function myError(response) {
        
    });	




}

}



};




 $scope.rasterize = function() {
   
     var dataURL  = canvases.toDataURL('image/png');
    //window.location.href=image;

    $.ajax({
  type: "POST",
  url: "Campaigns/Uploadcanvas",
  data: { 
     imgBase64: dataURL 
  }
}).done(function(o) {
  console.log('saved'); 
});
//$scope.alljson = canvases.toJSON();
    //window.open(image); 
  };




});




</script>