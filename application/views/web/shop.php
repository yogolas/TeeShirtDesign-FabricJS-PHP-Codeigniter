<?php if(!isset($campaign_title)){
echo '<center><h1 style="font-size:100px;">OOP!</h1></center>';

}else{
?>



<style type="text/css">
	#clockdiv{
    font-family: sans-serif;
    color: #fff;
    display: inline-block;
    font-weight: 100;
    text-align: center;
    font-size: 30px;
}

#clockdiv > div{
    border-radius: 3px;
    background: #fff;
    display: inline-block;
    border-style: solid;
    border-width: 1px;
    color: #ccc;
    width: 103px;
    height: 90px;
}

#clockdiv div > span{
    padding: 5px;
    border-radius: 3px;
    color: #777;
    display: inline-block;

}

.smalltext{
    font-size: 16px;
}
</style>




<style type="text/css">
	body{
		background-color: #fff;
	}

	input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}
</style>

<div ng-app="mytee" ng-controller="teeCtrl">


<div class="col-md-3 text-right">
<br /><br />
<a href="" ng-click="Selectproductimagefront()"><img src="<?php echo $base_url.'/tmp/'.$front_image;?>" style="width:100px;"></a>
<br />
<a href="" ng-click="Selectproductimageback()"> <img src="<?php echo $base_url.'/tmp/'.$back_image;?>"  style="width:100px;"></a>
</div>



<div class="col-md-5" style="height: 700px;">
	


<div id="c1" ng-hide="slideback"  style="left: 30px;
    top: 20px;
    width: 510px;
    height: 700px;
    border: 1px solid #fff;
    color: rgb(255, 255, 255) !important;
    position: absolute;
    box-sizing: content-box;
    margin-left: -2px;
    -webkit-transition: all .4s ease;
    transition: all .4s ease;">
    <img id="i1" src="<?php echo $base_url.'/tmp/'.$front_image;?>">
</div> 





<div id="c2" ng-show="slideback" style="left: 30px;
    top: 20px;
    width: 510px;
    height: 700px;
    border: 1px solid #fff;
    color: rgb(255, 255, 255) !important;
    position: absolute;
    box-sizing: content-box;
    margin-left: -2px;
    -webkit-transition: all .4s ease;
    transition: all .4s ease;">
    <img id="i2" src="<?php echo $base_url.'/tmp/'.$back_image;?>">
</div> 






</div>

<div class="col-md-3">
<h1><?php echo $campaign_title; ?></h1>
<br />	
<?php echo $campaign_description; ?>
<hr />	

<h1 style="color: red;text-align: center;">ราคา <?php echo number_format($sale_price); ?> บาท</h1>



<?php if($timeleft > 0){ ?>

<button class="btn btn-success btn-lg" style="width: 100%;" ng-click="Buymodal()">Buy It Now</button>

<br /><br />
We reached our goal! You can keep buying until the campaign ends!
<div id="clockdiv">
  <div>
    <span class="days"></span>
    <div class="smalltext">Days</div>
  </div>
  <div>
    <span class="hours"></span>
    <div class="smalltext">Hours</div>
  </div>
  <div>
    <span class="minutes"></span>
    <div class="smalltext">Minutes</div>
  </div>
  <div>
    <span class="seconds"></span>
    <div class="smalltext">Seconds</div>
  </div>
</div>
<?php } ?>




</div>




<div class="modal fade" id="Buymodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h1>Your Order</h1>
			</div>
			<div class="modal-body">

<table class="table table-hover">
	<thead>
		<tr>
			<th></th>
			<th>Qty</th>
			<th>Size</th>
			
			<th>Price/บาท</th>
		</tr>
	</thead>
	<tbody ng-hide="hidebuy">
		<tr ng-repeat="x in listbuy">
			<td width="50px;">

<?php if($show_back_first=='0'){ ?>
			<img ng-src="{{x.front_image}}" class="img-responsive" >
		<?php } ?>

<?php if($show_back_first=='1'){ ?>
			<img ng-src="{{x.back_image}}" class="img-responsive" >
		<?php } ?>


			</td>
			<td width="80px;"><input ng-model="x.qty"  type="number" min="1" max="10000" step="1" class="form-control" style="text-align: center;"></td>
			<td width="80px;">
				<select class="form-control" ng-model="x.product_size_id" ng-change="Addsizename(x.product_size_id,$index)">

				

					<option ng-repeat="y in psize" value="{{y.product_size_id}} , {{y.product_size_name}}">
						{{ y.product_size_name }}
					</option>
					
				</select>

			</td>
			
			<td width="100px;">{{x.qty*x.price | number}} </td>
			<td width="10px;"><button class="btn btn-danger btn-xs" ng-click="Del($index)" ng-if="$index != '0'">x</button></td>
		</tr>
	</tbody>
</table>

<center><button class="btn btn-default btn-lg" ng-click="Addlist()">+ เพิ่มรายการ</button></center>


			</div>
			<div class="modal-footer">
				
				<button type="button" class="btn btn-success" ng-click="Buy()">สั่งซื้อ</button>
			</div>
		</div>
	</div>
</div>







<div class="col-md-3"></div>

</div>


	<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

//$scope.qty = 1;
$scope.sale_price = <?php echo $sale_price; ?>;
$scope.listbuy = [];



function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(Date.parse(new Date()) + <?php echo $timeleft; ?> * 1000);
initializeClock('clockdiv', deadline);





$scope.Getsize = function(){

	$http({
        method : "POST",
        TYPE : "JSON",
        url : "Shop/Getproductsize",
        data : {
product_style_id: '<?php echo $product_style_id; ?>'
        }
    }).then(function mySucces(response) {
       
$scope.psize = response.data;

    }, function myError(response) {
        
    });	
};
$scope.Getsize();


$scope.Buymodal = function(){
$('#Buymodal').modal('show');

$scope.listbuy = [{
campaign_id: '<?php echo $campaign_id; ?>',
campaign_title: '<?php echo $campaign_title; ?>',
product_style_id: '<?php echo $product_style_id; ?>',
product_color_id: '<?php echo $product_color_id; ?>',
front_image: '<?php echo $base_url.'/tmp/'.$front_image;?>',
back_image: '<?php echo $base_url.'/tmp/'.$back_image;?>',
show_back_first: '<?php echo $show_back_first;?>',
qty: 1,
product_size_id: $scope.psize[0].product_size_id + ' , ' + $scope.psize[0].product_size_name,
sizename: $scope.psize[0].product_size_name,
price: $scope.sale_price
}];
};
 
$scope.Addlist = function(){
$scope.listbuy.push({
campaign_id: '<?php echo $campaign_id; ?>',
campaign_title: '<?php echo $campaign_title; ?>',
product_style_id: '<?php echo $product_style_id; ?>',
product_color_id: '<?php echo $product_color_id; ?>',
front_image: '<?php echo $base_url.'/tmp/'.$front_image;?>',
back_image: '<?php echo $base_url.'/tmp/'.$back_image;?>',
show_back_first: '<?php echo $show_back_first;?>',
qty: 1,
product_size_id: $scope.psize[0].product_size_id + ' , ' + $scope.psize[0].product_size_name,
sizename: $scope.psize[0].product_size_name,
price: $scope.sale_price
});
};

$scope.Del = function(index){
$scope.listbuy.splice(index,1);
};


<?php if($show_back_first=='0'){ ?>
$scope.slideback = false;
<?php } ?>

<?php if($show_back_first=='1'){ ?>
$scope.slideback = true;
<?php } ?>



$scope.Selectproductimageback = function(){
$scope.slideback = true;
};

$scope.Selectproductimagefront = function(){
$scope.slideback = false;
};


$scope.Addsizename = function(product_size_name,index){

var split = product_size_name.split(",");
var v1 = split[0];
var v2 = split[1];

$scope.listbuy[index].sizename = v2;

};


$scope.Buy = function(){
$scope.hidebuy = true;

$scope.listbuy2 = [];

angular.forEach($scope.listbuy,function(item){
$scope.listbuy = [];
var split = item.product_size_id.split(",");
var v1 = split[0];
var v2 = split[1];


$scope.listbuy2.push({
campaign_id: item.campaign_id,
campaign_title: item.campaign_title,
product_style_id: item.product_style_id,
product_color_id: item.product_color_id,
front_image: item.front_image,
back_image: item.back_image,
show_back_first: item.show_back_first,
qty: item.qty,
product_size_id: v1,
sizename: item.sizename,
price: item.price
});


});



/*
<?php if(isset($_SESSION['listbuy'])){ ?>
$scope.sessionlist = <?php echo  json_encode($_SESSION['listbuy'], JSON_UNESCAPED_UNICODE ); ?>;

angular.forEach($scope.sessionlist,function(item){

$scope.listbuy2.push({
campaign_id: item.campaign_id,
product_style_id: item.product_style_id,
product_color_id: item.product_color_id,
front_image: item.front_image,
back_image: item.back_image,
show_back_first: item.show_back_first,
qty: item.qty,
product_size_id: item.product_size_id,
sizename: item.sizename,
price: item.price
});


});


<?php }?>*/







	$http({
        method : "POST",
        TYPE : "JSON",
        url : "Shop/Buy",
        data : {
listbuy: $scope.listbuy2
        }
    }).then(function mySucces(response) {
       
window.open ('<?php echo $base_url; ?>/cart','_self',false);

    }, function myError(response) {
        
    });	
};





});

</script>












<?php } ?>