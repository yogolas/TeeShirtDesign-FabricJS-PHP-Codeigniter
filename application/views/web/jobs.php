
<div class="container panel panel-default" ng-app="mytee" ng-controller="teeCtrl">
	<br />
<img src="https://d1b2zzpxewkr9z.cloudfront.net/images/jobs/photo_large_1.jpg" class="img-responsive">


<h3><b>Current Open Positions</b></h3>


<a href="" ng-click="OpenmodalSoftware()">Senior Software Engineer</a> 
<br />
BKK, Thailand

<br />
<br />

<div class="modal fade" id="software">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Senior Software Engineer</h4>
			</div>
			<div class="modal-body">
				

<h4><b>Server Side Engineer</b></h4>

Skills we need
<ul>
<li>Good English verbal, written and spoken</li>
<li>Strong knowledge of PHP and MVC frameworks such as Codeigniter</li>
<li>Experience with SQL, such as MySQL</li>
<li>Proficiency of HTML5/CSS, JavaScript / JQuery / frameworks</li>
<li>An open mind and ability to work in a team</li>
</ul>

<hr/>

<h4><b>Client Side Engineer</b></h4>

Skills we need

<ul>
<li>Good English verbal, written and spoken</li>
<li>Strong knowledge of HTML and CSS</li>
<li>Strong knowledge of Javascript AngularJS</li>
<li>Experience with responsive design and grid-based layouts</li>
<li>Experience with PHP</li>
<li>Familiar with CSS pre-processers (LESS, SASS, etc.)</li>
<li>Familiar with front-end build tools (Grunt, Gulp, etc.)</li>
<li>An open mind and ability to work in a team</li>
</ul>






			</div>
			
		</div>
	</div>
</div>

</div>



	<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.OpenmodalSoftware = function(){
$('#software').modal('show');
};



});

</script>