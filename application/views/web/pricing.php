



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
 <a href="<?php echo $base_url; ?>/campaigns" style="color:#000;">Design</a> 
<span class="glyphicon glyphicon-chevron-right"></span>
 <a href="<?php echo $base_url; ?>/campaigns/pricing"> Set Up </a>
<span class="glyphicon glyphicon-chevron-right"></span>
  <a href="<?php echo $base_url; ?>/campaigns/details" style="color:#000;"> Description </a>

  </b></h4>
</div>

<div class="col-md-4"></div>

<div class="col-md-12"><br /></div>

<div class="col-md-2"></div>



<div class="col-md-4">
	<div class="col-md-12 panel panel-default">
<br />
<br />

<p class="alert alert-success">High quality artwork detected. Goal of One enabled! </p>
<br />
<input name="thumb-roundness" ng-model="slider" label="" class="form-control" type="range" min="1" max="1000" step="1" >
<br />

<form class="form-inline">
  <div class="form-group">
   
    <div class="input-group">
      <div class="input-group-addon"># of units</div>
      <input name="thumb-roundness" ng-model="slider" label="" class="form-control" type="number" min="1" max="1000" step="1"  style="width: 70px;text-align: center;">
      
    </div>
  </div>
 
</form>
<br />
Estimated profit
<br />
<span style="font-size: 30px;font-weight: bold;"><span style="color: green;">{{slider*(priceconfig - base_price) | number}}+</span> บาท</span>

<br />

<div class="well">
	
<table class="table table-hover">
	<tbody>
		<tr>
			<td width="70px">
				<img src="<?php echo $base_url; ?>/file/productstyle/product_style_1_front.png" class="img-responsive">
			</td>
			<td>
				Hanes Tagless Tee
				<br />
				{{priceconfig - base_price | number}} บาท profit/sale
			</td>
			<td width="100px">

			<form class="form-inline">
  <div class="form-group">
   <div class="input-group">
   <div class="input-group-addon">ราคาขาย</div>
				 <input name="thumb-roundness" ng-model="priceconfig" label="" class="form-control" type="number" min="1" max="1000" step="1"  style="width: 70px;text-align: center;">
				 <div class="input-group-addon">บาท</div>
				 </div>
				 </div>
				 </form>
				
      
			</td>
		</tr>
	</tbody>
</table>

</div>

<br />
<br />
<a class="btn btn-success btn-lg" style="width: 100%" href="<?php echo $base_url; ?>/campaigns/details">ถัดไป</a>

<br />
<br />

</div>


</div>






<div class="col-md-4  panel panel-default" style="width: 540px;height: 640px;">
	
<canvas id="c1" ng-hide="slideback"  style="left: 30px;
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
<canvas id="c2" ng-show="slideback" style="left: 30px;
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





<div class="col-md-2">

 </div>


</div>


	<script>


var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.slider = 5;
$scope.base_price = <?php echo  json_encode($_SESSION['basecost'], JSON_UNESCAPED_UNICODE ); ?>.product_style_size_price;
$scope.priceconfig = 600;
$scope.slideback = false;





var canvases = new fabric.Canvas('c1');
var canvases2 = new fabric.Canvas('c2');


	<?php if(isset($_SESSION['alljson'])){ ?>
canvases.clear();
//canvases.setBackgroundColor('#ff3300', canvases.renderAll.bind(canvases));
canvases.loadFromJSON('<?php echo  json_encode($_SESSION['alljson'], JSON_UNESCAPED_UNICODE ); ?>', canvases.renderAll.bind(canvases));
canvases2.loadFromJSON('<?php echo  json_encode($_SESSION['alljson2'], JSON_UNESCAPED_UNICODE ); ?>', canvases2.renderAll.bind(canvases2));


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







});

</script>