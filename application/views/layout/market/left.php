

<div class="col-md-2">

</div>


<div class="col-md-2">



<div class="panel panel-default">
		<div class="panel-body text-center">
			

<ul>

<?php 

foreach ($menuleft as $row) {
echo '
<li style="list-style: none;text-align: left;">
<a href="'.$base_url.'/marketplace?cat='.$row['campaign_category_id'].'" style="color:#000;">	'.$row['campaign_category_name'].' </a>
	</li>
';
}

?>
	
</ul>



		</div>
	</div>







</div>


