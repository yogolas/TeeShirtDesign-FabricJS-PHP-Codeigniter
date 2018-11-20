
<div class="container panel panel-default text-center">
<h1 style="font-weight: bold;"><?php echo $storetitle; ?> </h1>
</div>

<div class="container panel panel-default"  ng-app="mytee" ng-controller="teeCtrl">
	

<div class="col-md-3 text-center" ng-repeat="x in data">

<a href="<?php echo $base_url; ?>/{{x.url}}">


<img ng-if="x.show_back_first=='0'" ng-mouseenter="x.show_back_first='d'"  ng-src="<?php echo $base_url; ?>/tmp/{{x.front_image}}" class="img-responsive">

<img ng-if="x.show_back_first=='1'" ng-mouseover="x.show_back_first='a'" ng-src="<?php echo $base_url; ?>/tmp/{{x.back_image}}" class="img-responsive">

<img ng-if="x.show_back_first=='a'" ng-mouseleave="x.show_back_first='1'"  ng-src="<?php echo $base_url; ?>/tmp/{{x.front_image}}" class="img-responsive">
<img ng-if="x.show_back_first=='d'" ng-mouseleave="x.show_back_first='0'" ng-src="<?php echo $base_url; ?>/tmp/{{x.back_image}}" class="img-responsive">





{{x.campaign_title}}
</a>
<br />
{{x.sale_price}} บาท

</div>

</div>


	<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {


$scope.data = <?php echo $storedata; ?>;



});

</script>

