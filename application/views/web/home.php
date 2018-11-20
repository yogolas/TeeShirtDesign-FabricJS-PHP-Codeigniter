<div class="container">
	
			
<table width="100%">
	<tbody>
		<tr>
			<td width="50%">
				<img src="<?php echo $base_url; ?>/img/t.png">
			</td>
			<td width="50%">
				<h1>Create & sell T-shirts to turn your ideas into reality</h1>
				<h3 style="color: #777;">
No upfront cost. No risk. No hassle. We handle everything!
Start a campaign </h3>

<a class="btn btn-info btn-lg" href="<?php echo $base_url; ?>/campaigns">Start a Campaign</a>
			</td>
		</tr>
	</tbody>
</table>




</div>

<div class="row" style="background-color: #fff;"  ng-app="mytee" ng-controller="teeCtrl">
<h1 style="text-align: center;">Our Products</h1>
<div class="col-md-12">
<div class="col-md-3 text-center">
	<img src="<?php echo $base_url; ?>/img/ut.png" style="max-width: 170px;">
	<br />
	Unisex Tees
</div>

<div class="col-md-3 text-center">
	<img src="<?php echo $base_url; ?>/img/hs.png" style="max-width: 170px;">
	<br />
	Hoodies & Sweatshirts
</div>

<div class="col-md-3 text-center">
	<img src="<?php echo $base_url; ?>/img/tt.png" style="max-width: 170px;">
	<br />
	Tank Tops
</div>

<div class="col-md-3 text-center">
	<img src="<?php echo $base_url; ?>/img/lst.png" style="max-width: 170px;">
	<br />
	Long Sleeve Tees
</div>


<div class="col-md-12 text-center">
<br /><br /><br />
</div>



<div class="col-md-5 text-center">
</div>
<div class="col-md-3 text-center">

<ul class="nav nav-pills" style="font-size: 20px;">
  <li class="active"><a data-toggle="tab" href="#campaignending">Ending</a></li>
  <li><a data-toggle="tab" href="#campaignmostfunded">Most Funded</a></li>
  <li><a data-toggle="tab" href="#campaignlastest">Lastest</a></li>
</ul>

</div>
<div class="col-md-4 text-center">
</div>



<div class="col-md-12 text-center">
</div>



<div class="col-md-1 text-center">
</div>

<div class="col-md-10 text-center" style="border-style: solid;border-width:1px;border-color: #ccc; ">

<br />
<div class="tab-content">
  <div id="campaignending" class="tab-pane fade in active">


<div class="col-md-3 text-center" ng-repeat="x in campaignending" >
	
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


  <div id="campaignmostfunded" class="tab-pane fade">


<div class="col-md-3 text-center" ng-repeat="x in campaignmostfunded" >
	
<a href="<?php echo $base_url; ?>/{{x.url}}" class="link-dark-not-underline">


<img ng-if="x.show_back_first=='0'" ng-mouseenter="x.show_back_first='d'"  ng-src="<?php echo $base_url; ?>/tmp/{{x.front_image}}" class="img-responsive">

<img ng-if="x.show_back_first=='1'" ng-mouseover="x.show_back_first='a'" ng-src="<?php echo $base_url; ?>/tmp/{{x.back_image}}" class="img-responsive">

<img ng-if="x.show_back_first=='a'" ng-mouseleave="x.show_back_first='1'"  ng-src="<?php echo $base_url; ?>/tmp/{{x.front_image}}" class="img-responsive">
<img ng-if="x.show_back_first=='d'" ng-mouseleave="x.show_back_first='0'" ng-src="<?php echo $base_url; ?>/tmp/{{x.back_image}}" class="img-responsive">


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

  <div id="campaignlastest" class="tab-pane">


<div class="col-md-3 text-center" ng-repeat="x in campaignlastest" >
	
<a href="<?php echo $base_url; ?>/{{x.url}}" class="link-dark-not-underline">


<img ng-if="x.show_back_first=='0'" ng-mouseenter="x.show_back_first='d'"  ng-src="<?php echo $base_url; ?>/tmp/{{x.front_image}}" class="img-responsive">

<img ng-if="x.show_back_first=='1'" ng-mouseover="x.show_back_first='a'" ng-src="<?php echo $base_url; ?>/tmp/{{x.back_image}}" class="img-responsive">

<img ng-if="x.show_back_first=='a'" ng-mouseleave="x.show_back_first='1'"  ng-src="<?php echo $base_url; ?>/tmp/{{x.front_image}}" class="img-responsive">
<img ng-if="x.show_back_first=='d'" ng-mouseleave="x.show_back_first='0'" ng-src="<?php echo $base_url; ?>/tmp/{{x.back_image}}" class="img-responsive">


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


</div>

<div class="col-md-1 text-center">
</div>



<div class="col-md-12 text-center">
<br />
<br />
</div>



</div>
</div>








<script>
var app = angular.module('mytee', []);

app.controller('teeCtrl', function($scope,$http) {

$scope.campaignending = <?php echo $campaignending; ?>;

$scope.campaignmostfunded = <?php echo $campaignmostfunded; ?>;

$scope.campaignlastest = <?php echo $campaignlastest; ?>;

});

</script>
