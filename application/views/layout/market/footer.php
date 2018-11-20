</body>
</html>










	<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {





$scope.Getcategory = function(){
$http.get("Marketplace/Getcategory")
    .then(function(response) {
        $scope.categorylist = response.data;
    });
};
$scope.Getcategory();



$scope.Getcampaign = function(){
$http.get("Marketplace/Getcampaign")
    .then(function(response) {
        $scope.campaignlist = response.data;
    });
};
$scope.Getcampaign();

});

</script>