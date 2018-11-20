<div class="col-md-10" ng-app="mytee" ng-controller="teeCtrl">
<h4>Payouts</h4>

<div class="panel panel-default">
	<div class="panel-body">

จำนวนเงินที่สามารถเบิกได้ <b style="color: red;font-weight: bold;">{{profit[0].profit | number}}</b> บาท

<button class="btn btn-default" ng-click="Modalamount()" style="float: right;">เบิกเงิน</button>
<table class="table table-hover">
	<thead>
		<tr>
			<th>จำนวนเงินที่เบิก/บาท</th>
			<th>email paypal รับเงิน</th>
			<th>สถานะ</th>
			<th>วันที่ร้องขอ</th>
		
		</tr>
	</thead>
	<tbody>
		<tr  ng-repeat="x in paylist">
			<td style="font-weight: bold;color: green;">{{x.amount | number}}</td>
			<td>{{x.email_paypal}}</td>
			<td>
<span ng-show="x.status=='0'" style="font-weight: bold;color: red;">ร้องขอเบิกเงิน</span>
<span ng-show="x.status=='1'" style="font-weight: bold;color: green;">จ่ายแล้ว</span>
		</td>
		<td>{{x.adddate2}}</td>

		</tr>
	</tbody>
</table>

</div>
</div>




<div class="modal fade" id="Modalamount">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เบิกเงิน จำนวน <b> {{profit[0].profit | number}} </b>บาท</h4>
			</div>
			<div class="modal-body">
				Paypal
<form name="myForm">
<input type="email" name="input" ng-init="email_paypal = profit[0].email_paypal" placeholder="email" class="form-control" ng-model="email_paypal" >

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" ng-click="Confirmpayme()">ยืนยันเบิกเงิน</button>
				</form>
			</div>
		</div>
	</div>
</div>







</div>



	<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {



$scope.ValidateEmail = function(mail){  
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.input.value))  
  {  
    return (true)  
  }  
    alert("กรุณากรอก email paypal ให้ถูกต้อง!")  
    return (false)  
};


$scope.profit = <?php echo $profit;?>;

$scope.Modalamount = function(){
	$('#Modalamount').modal('show');
};

$scope.Getpayoutslist = function(){
$http.get("Payouts/Getpayoutslist")
    .then(function(response) {
        $scope.paylist = response.data;
    });
};
$scope.Getpayoutslist();


$scope.Confirmpayme = function(){

	if($scope.ValidateEmail($scope.email_paypal)==true){
$http({
        method : "POST",
        TYPE : "JSON",
        url : "Payouts/Confirmpayme",
        data : {
        	email_paypal: $scope.email_paypal
        }
    }).then(function mySucces(response) {
    	$('#Modalamount').modal('hide');
$scope.Getpayoutslist();
    }, function myError(response) {
        
    });

    }

};


});

</script>