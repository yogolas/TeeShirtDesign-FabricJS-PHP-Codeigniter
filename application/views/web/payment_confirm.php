<div class="container" style="width: 500px;" ng-app="mytee" ng-controller="teeCtrl">
	<div class="panel panel-default">
		<div class="panel-body">
			<h1>แจ้งโอนเงิน</h1>

<form action="payment_confirm/add" method="post" enctype="multipart/form-data" >
	
<input type="text" ng-model="order_number" name="order_number" placeholder="Order Number" class="form-control" required>
<br />
<input type="text" ng-model="name" name="name" placeholder="ชื่อ-นามสกุล" class="form-control" required>
<br />
<input type="email" ng-model="email" name="email" placeholder="email" class="form-control" required>
<br />
<input type="number" ng-model="tel" name="tel" placeholder="หมายเลขโทรศัพท์" class="form-control" required>
<hr />
เลือกธนาคารที่โอน

<div class="well">


<?php 

foreach ($banklist as $row) {
echo '

<input type="radio" ng-model="what_bank" name="what_bank" value="'.$row['payment_bank_name'].'" required>
'.$row['payment_bank_name'].' - '.$row['payment_bank_number'].' - '.$row['payment_bank_accountname'].' - '.$row['payment_bank_branch'].'

<br />


';
}

?>

</div>

<hr />
<input type="text" ng-model="amount" name="amount" placeholder="จำนวนเงินที่โอน" class="form-control" required>
<br />
<input type="text" ng-model="date_transfer" name="date_transfer" placeholder="วันที่โอน เช่น 03-12" class="form-control" required>
<br />
<input type="text" ng-model="time_transfer" name="time_transfer" placeholder="เวลาที่โอน เช่น 12:15" class="form-control" required>
<br />
<textarea type="text" ng-model="detail" name="detail" placeholder="รายละเอียด"  class="form-control"></textarea> 
<br />
	หลักฐานการโอนเงิน
<input type="file" ng-model="image" name="image" class="form-control" accept="image/*" required>
<br />
<button class="btn btn-success" type="submit" >ยืนยันการทำรายการ</button>

</form>



		</div>
	</div>
</div>


<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {




});

</script>