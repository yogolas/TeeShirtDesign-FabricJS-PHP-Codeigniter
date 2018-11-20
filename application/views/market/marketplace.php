<div class="col-md-6"  ng-app="mytee" ng-controller="teeCtrl">




<?php 
if(isset($menutop)){
echo '<div class="panel panel-default">
		<div class="panel-body text-center">
			

';

foreach ($menutop as $row) {
echo '

<a class="btn btn-default" href="'.$base_url.'/marketplace?subcat='.$row['campaign_subcategory_id'].'" style="color:#000;">	'.$row['campaign_subcategory_name'].' </a>

';
}

echo '



		</div>
	</div>';
}
?>
	




	<div class="panel panel-default">
		<div class="panel-body text-center"  ng-init="start = 0; end = 12;">
			

<div class="col-md-4 text-center" ng-repeat="x in campaignlist  | slice:start:end" >
	
<a href="<?php echo $base_url; ?>/{{x.url}}" class="link-dark-not-underline">


<img ng-show="x.show_back_first=='0'" ng-mouseenter="x.show_back_first='d'"  ng-src="<?php echo $base_url; ?>/tmp/{{x.front_image}}" class="img-responsive">

<img ng-show="x.show_back_first=='1'" ng-mouseover="x.show_back_first='a'" ng-src="<?php echo $base_url; ?>/tmp/{{x.back_image}}" class="img-responsive">

<img ng-show="x.show_back_first=='a'" ng-mouseleave="x.show_back_first='1'"  ng-src="<?php echo $base_url; ?>/tmp/{{x.front_image}}" class="img-responsive">
<img ng-show="x.show_back_first=='d'" ng-mouseleave="x.show_back_first='0'" ng-src="<?php echo $base_url; ?>/tmp/{{x.back_image}}" class="img-responsive">





{{x.campaign_title}}
</a>
<br />
{{x.sale_price}} บาท

<div class="time-left-end" ng-show="x.hoursleft <= 0">end</div>

<div class="time-left" ng-show="x.hoursleft > 24">{{x.dayleft}} days left</div>

<div class="time-left" ng-show="x.hoursleft < 24 && x.hoursleft > 0">{{x.hoursleft}} hours left</div>
<br /><br /><br />
</div>


		</div>
	</div>

		<div class="panel panel-default">
				<div class="panel-body text-center" >
			
<ul class="pagination">
  <li ng-repeat="x in page"><a href="" ng-click="Clickpage(x.page)">{{x.page}}</a></li>
</ul>
</div>
	</div>





</div>




	<script>
var app = angular.module('mytee', []);

app.filter('slice', function() {
  return function(arr, start, end) {
  	if (!arr || !arr.length) { return; }
    return arr.slice(start, end);
  };
});

app.controller('teeCtrl', function($scope,$http) {

$scope.page = [];

$scope.Getcampaign = function(){
$http.get("<?php echo $base_url; ?>/Marketplace/Getcampaign<?php 

	if(isset($_GET['cat'])){echo '?cat='.$_GET['cat'];}else{echo '?cat=0';}  

	if(isset($_GET['subcat'])){echo '&subcat='.$_GET['subcat'];}else{echo '&subcat=0';} 
	if(isset($_GET['search'])){echo '&search='.$_GET['search'];}else{echo '&search=0';}
	?>")
    .then(function(response) {
        $scope.campaignlist = response.data;

         $scope.campaignlistlength =  Math.ceil($scope.campaignlist.length/12);

         for($i=1;$i<$scope.campaignlistlength;$i++){
$scope.page.push({page:$i});
         }
    });
};
$scope.Getcampaign();

$scope.Clickpage = function(page){
if(page=='1'){
	$scope.start = '0';
}else{
	$scope.start = page * 11;
}

$scope.end = $scope.start + 12;
};


});




</script>
