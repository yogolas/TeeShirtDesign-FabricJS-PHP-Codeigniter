

<div ng-app="mytee" ng-controller="teeCtrl">


<style type="text/css">
	.xgridline{
		top: 0px;
		left: {{xline_left}}px; 
		opacity: 0;
		position: absolute;
    -webkit-transition: opacity .4s ease;
    transition: opacity .4s ease;
    background-color: #39ace6;    
    height: 650px;
    width: 1px;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
	}
	.ygridline{
		top: {{yline_top}}px; 
		left: 15px; 
		opacity: 0;
		position: absolute;
    -webkit-transition: opacity .4s ease;
    transition: opacity .4s ease;
    background-color: #39ace6;    
    height: 1px;
    width: 540px;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
	}

	.left{
		top: {{left_top}}px;
		left: {{left_left}}px;
		opacity: 1;
		position: absolute;
    -webkit-transition: opacity .4s ease;
    transition: opacity .4s ease;
    background-color: #8a6d3b;    
    height: {{left_height}}px;
    width: 1px;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
	}
	.right{
		top: {{right_top}}px;
		left: {{right_left}}px;
		opacity: 1;
		position: absolute;
    -webkit-transition: opacity .4s ease;
    transition: opacity .4s ease;
    background-color: #8a6d3b;    
    height: {{right_height}}px;
    width: 1px;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
	}
	.top{
		left: {{top_left}}px;
		top: {{top_top}}px; 
		opacity: 1;
		position: absolute;
    -webkit-transition: opacity .4s ease;
    transition: opacity .4s ease;
    background-color: #8a6d3b;    
    height: 1px;
    width: {{top_width}}px;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
	}
	.under{
		left: {{under_left}}px;
		top: {{under_top}}px; 
		opacity: 1;
		position: absolute;
    -webkit-transition: opacity .4s ease;
    transition: opacity .4s ease;
    background-color: #8a6d3b;    
    height: 1px;
    width: {{under_width}}px;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
	}
	.zip{
		top: {{left_top}}px;
		left: 290px;
		opacity: 1;
		position: absolute;
    -webkit-transition: opacity .4s ease;
    transition: opacity .4s ease;
    background-color: #8a6d3b;    
    height: {{left_height}}px;
    width: 25px;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
	}
</style>

<div class="col-md-4"></div>

<div class="col-md-4 text-center">
 <h4><b>
 <a href="<?php echo $base_url; ?>/campaigns">Design</a> 
<span class="glyphicon glyphicon-chevron-right"></span>
  <a href="<?php echo $base_url; ?>/campaigns/details"  style="color:#000;"> Description </a>

  </b></h4>
</div>

<div class="col-md-4"></div>



 <div  class="col-md-12">
<br />
 </div>


<div class="container">







<div class="col-md-3  col-sm-3 col-xs-3 panel panel-default"  style="width: 285px;">

	<div class="panel-body">
		


<ul class="nav nav-tabs">
  <li class="active text-center" style="width: 50%;"><a data-toggle="tab" href="#texttab" style="font-size: 16px;font-weight: bold;color: #000;">Text</a></li>
  <li class="text-center" style="width: 50%;"><a data-toggle="tab" href="#imagetab"  style="font-size: 16px;font-weight: bold;color: #000;">Image</a></li>
</ul>

<div class="tab-content">
  <div id="texttab" class="tab-pane fade in active">


   <br />


<form class="form-inline">
<input class="form-control" placeholder="Add Text" ng-model="addtext" style="width: 160px;">
<button class="btn btn-success" ng-click="Addtextjson()">Add</button>
</form>

<hr />

Font Color<br />
<div ng-repeat="x in colorprint" class="boxcolor" style="focus:default;background-color: #{{x.color_print_code}};width: 20px;height: 20px;float: left;
    border-width: 1px;
    border-color: #eee;" ng-click="Selectcolorprint(x)">	
</div>




<div class="col-md-12">
<br />
</div>



<div class="col-md-6 dropdown" style="
    padding-left: 0px;
    padding-right: 1px;">

  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="font-family:Tahoma;width: 100%;font-size: 22px;">{{getcountrycat}}
  <span class="caret"></span></button>
  <ul class="dropdown-menu" style="overflow:hidden; overflow-y:scroll;height:200px;">

    <li ng-repeat="x in contryfont" ng-click="Getcountryone(x)">
   <a href="" style="font-size: 22px;">{{x.country_name}}</a>
    </li>
   
  </ul>
</div>



<div class="col-md-6 dropdown" style="
    padding-left: 1px;
    padding-right: 0px;">



  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="font-family:'{{getfontfamilyall.font_family}}';width: 100%;font-size: 22px;">{{getfontfamilyall.font_name}}
  <span class="caret"></span></button>
  <ul class="dropdown-menu" style="overflow:hidden; overflow-y:scroll;height:200px;">

    <li ng-repeat="x in fontfamily" ng-click="Getfontfamilyone(x)">
<style type="text/css">
	@font-face {
    font-family: '{{x.font_family}}'; 
    src: url('<?php echo $base_url;?>/file/font/{{x.country_code}}/{{x.font_file}}');
}
</style>
   <a href="" style="font-family: '{{x.font_family}}';font-size: 22px;">{{x.font_name}}</a>
    </li>
   
  </ul>
</div>

<div class="col-md-12">
<hr />
</div>

<select class="form-control" ng-model="strokewidth" ng-change="Addstroke(strokewidth)">
	<option value="0">
		ไม่มีขอบ
	</option>
	<option value="1">
		มีขอบเล็กน้อย
	</option>
	<option value="2">
		มีขอบขนาดใหญ่
	</option>
</select>


<span ng-show="strokewidth != '0'">Stroke Font Color</span><br />
<div  ng-show="strokewidth != '0'" ng-repeat="x in colorprint" class="boxcolor" style="focus:default;background-color: #{{x.color_print_code}};width: 20px;height: 20px;float: left;
    border-width: 1px;
    border-color: #eee;" ng-click="Selectcolorstrokeprint(x)">	
</div>





<div class="col-md-12">
<hr />
</div>




  </div>
  <div id="imagetab" class="tab-pane fade">

<br />

<button class="btn btn-default" ng-click="Openartwork()" style="width: 100%">Art Work</button>
<br /><br />
<form id="uploadImg" runat="server"  enctype="multipart/form-data" method="POST">
<input class="btn btn-default" name="imagefile" id="uploadedImg" style="width: 100%" type="file" accept="image/*" hide>Upload Image</input>
 <button type="submit" id="uploadImgsubmit" class="btn btn-success">
 <span class="glyphicon glyphicon-refresh spin" ng-show="uploadImg1" aria-hidden="true" >	
 	</span>
 อัปโหลด
 </button>
</form>
<br /><br />

  </div>


</div>



 <!-- <button class="btn btn-danger btn-lg" ng-click="removeSelected()" style="width: 100%">
            Remove selected
          </button>  -->  




	</div>
</div>




<div class="col-md-6 col-sm-6 col-xs-6">




<div class="panel panel-default"  style="height: 650px;width: 540px;">
	<div class="panel-body">







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

<canvas id="c2" ng-show="slideback"  style="left: 30px;
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

<div class="xgridline"></div>
<div class="ygridline"></div>


<div class="left"></div>
<div class="right"></div>
<div class="top"></div>
<div class="under"></div>
<div ng-show="product_style_id=='20' || product_style_id=='27' && !slideback" class="zip"></div>





</div>
</div>


<div class="panel panel-default">
	<div class="panel-body">
<center>
<ul class="nav nav-tabs nav-justified">
  <li><a href="" ng-click="Selectproductimagefront()">FRONT</a></li>
  <li><a href="" ng-click="Selectproductimageback()">BACK</a></li>
</ul>
</center>


	</div>
</div>



</div>




<div class="col-md-3  col-sm-3 col-xs-3 panel panel-default" style="width: 285px;">



<b>Choose a product</b>
		<select class="form-control" ng-model="product_category_id" ng-change="Getproduct(product_category_id)">
			<option ng-repeat="x in productcategory" value="{{x.product_category_id}}">
				{{x.product_category_name}}
			</option>
		</select>
		<hr />



<ul class="nav nav-pills nav-stacked" style="border-style: solid;border-width: 1px;border-color: #ccc;">
<li ng-repeat="x in productlist" class="productlist{{x.product_style_id}}">
	<a href=""  style="color: #777;" ng-click="Selectproduct(x)">
	<img ng-src="<?php echo $base_url; ?>/file/productstyle/{{x.product_style_front}}" width="30px" style="border-style: solid;border-width: 1px;border-color: #ccc;background-color: #000000;">
	{{x.product_style_name}}

	</a>

</li>
</ul>

<br />
		<b>Select Product Color</b><br />

	<div ng-repeat="y in productcolorlist" title="{{y.product_color_name}}" class="boxcolor" style="focus:default;background-color: #{{y.product_color_code}};display: inline-block;border-radius: 4px;padding: 10px;border: 1px solid #e3e3e3;" ng-click="Selectproductcolor(y.product_color_code,y.product_color_id)"></div>


<br />




<hr /><br />


Base cost @ 50 units
<br />
<div class="pricecosedesign">
	{{basecost.product_style_size_price}} บาท
</div>
<br />


<a class="btn btn-success btn-lg" style="width: 100%"  ng-click="Clicknextstep()" >ขายเสื้อตัวนี้</a>

<hr />

</div>






</div>






<div class="modal fade" id="Modalartwork">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Art Work</h4>
			</div>
			<div class="modal-body">
			
			<form class="form-inline">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="ค้นหา" ng-model="searchartwork">
  </div>
  <button type="submit" class="btn btn-info" ng-click="Getartwork('0',searchartwork)">search</button>
</form>

<br />
<select class="form-control" ng-model="categoryartwork"  ng-change="Getartwork(categoryartwork)">
	<option ng-repeat="x in artworkcategorylist" value="{{x.artwork_category_id}}">
		{{x.artwork_category_name}}
	</option>
</select>

<div class="col-md-12">
<br />
</div>

<div class="col-md-12" style="overflow-y:scroll;height:500px;">

<div class="col-md-4" ng-repeat="x in artworklistall" ng-click="addImage(x.artwork_filename)">
	<img ng-src="<?php echo $base_url; ?>/file/artwork/{{x.artwork_filename}}" style="max-height: 50px; ">
</div>
</div>



			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>





</div>





	<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {

$scope.product_style_id = '0';
$scope.product_color_id = '0';
$scope.product_color_code = 'ffffff';
$scope.getfontfamily = 'Tahoma';
$scope.getcountrycat = 'Thai';
$scope.slideback = false;



var canvases = new fabric.Canvas('c1');
var canvases2 = new fabric.Canvas('c2');


$scope.jsonall = function(){

	<?php if(isset($_SESSION['alljson'])){ ?>
canvases.clear();
//canvases.setBackgroundColor('#ff3300', canvases.renderAll.bind(canvases));
canvases.loadFromJSON('<?php echo  json_encode($_SESSION['alljson'], JSON_UNESCAPED_UNICODE ); ?>', canvases.renderAll.bind(canvases));
canvases2.loadFromJSON('<?php echo  json_encode($_SESSION['alljson2'], JSON_UNESCAPED_UNICODE ); ?>', canvases2.renderAll.bind(canvases2));


<?php } ?>




};
$scope.jsonall();





$scope.addtext = '';
$scope.fontdraft = [];
$scope.DrowText = function(css_width,css_height){



$('.upper-canvas').css({width:css_width,height:css_height });    


canvases.setDimensions({width:css_width, height:css_height});
canvases2.setDimensions({width:css_width, height:css_height});





};


$scope.fontdraftget = [];
$scope.Addtextjson = function(){
	if($scope.addtext!=''){
$scope.fontdraft = [];
$scope.fontdraft.push({
text: $scope.addtext,
fontFamily: 'hinn-free_regular',
fill: '#000000'
//stroke: '#000000',
//strokeWidth: 1
});



//console.log($scope.fontdraftget);

angular.forEach($scope.fontdraft,function(item){

var iText = new fabric.IText(item.text, {
   left: 200,
  top: 200,
  fontFamily: item.fontFamily,
  fill: item.fill,
  lineHeight: 1.1
  //stroke: item.stroke,
 // strokeWidth: item.strokeWidth
});

iText.setControlsVisibility({
    mtr: false,
    transparentCorners: true

});

if($scope.slideback==false){
canvases.add(iText);
}else{
	canvases2.add(iText);
}

});
}


$scope.addtext = '';




};


 $scope.removeSelected = function() {

 	if($scope.slideback==false){
 		var activeObject = canvases.getActiveObject(),
      activeGroup = canvases.getActiveGroup();
}else{
	var activeObject = canvases2.getActiveObject(),
      activeGroup = canvases2.getActiveGroup();
}
    

    if (activeGroup) {
      var objectsInGroup = activeGroup.getObjects();
      canvases.discardActiveGroup();
      objectsInGroup.forEach(function(object) {

      	if($scope.slideback==false){
        canvases.remove(object);
    }else{
    	canvases2.remove(object);
    }

      });
    }
    else if (activeObject) {
    	if($scope.slideback==false){
      canvases.remove(activeObject);
  }else{
canvases2.remove(activeObject);
  }

    }
  };


 $scope.rasterize = function() {
   
     var dataURL  = canvases.toDataURL('image/png');
    //window.location.href=image;

    $.ajax({
  type: "POST",
  url: "Campaigns/Uploadcanvas",
  data: { 
     imgBase64: dataURL 
  }
}).done(function(o) {
  console.log('saved'); 
});
//$scope.alljson = canvases.toJSON();
    //window.open(image); 
  };



$scope.artworkjson = [];
   $scope.addImage = function(imageName, minScale, maxScale) {
$scope.artworkjson.push({
image: imageName
});

var img = new Image();
img.onload = function() {
	
$scope.xthiswidth = this.width;
$scope.xthisheight = this.height;

if(this.width > 220){
$scope.imgwidth = 220;
$scope.imgwidthratio = ($scope.xthiswidth / 220);
$scope.imgheight = ($scope.xthisheight / $scope.imgwidthratio);
}else{
	$scope.imgwidth = this.width;
	$scope.imgheight = this.height;
}


}




img.src = '<?php echo $base_url?>/file/artwork/' + imageName;

    fabric.Image.fromURL('<?php echo $base_url?>/file/artwork/' + imageName, function(image) {

      image.set({
         left: 150,
  top: 150,
        width: $scope.imgwidth,
        height: $scope.imgheight,
        angle: 0
      });

image.setControlsVisibility({
    mtr: false,
    transparentCorners: true

});

if($scope.slideback==false){
      canvases.add(image);
  }else{
  	canvases2.add(image);
  }

    });




console.log($scope.artworkjson);

    $('#Modalartwork').modal('hide');

    $("div.inner img.bbc_img").each(function(){
if($(this).width()>max_w){
$(this).css("max-width", max_w+"px").css("height", "auto");
}
});

  };




  $scope.UploadImage = function(imageName) {





var img = new Image();
img.onload = function() {
	
$scope.xthiswidth = this.width;
$scope.xthisheight = this.height;

if(this.width > 220){
$scope.imgwidth = 220;
$scope.imgwidthratio = ($scope.xthiswidth / 220);
$scope.imgheight = ($scope.xthisheight / $scope.imgwidthratio);
}else{
	$scope.imgwidth = this.width;
	$scope.imgheight = this.height;
}




}




img.src = '<?php echo $base_url?>/file/image/' + imageName;

    fabric.Image.fromURL('<?php echo $base_url?>/file/image/' + imageName, function(image) {

      image.set({
         left: 150,
  top: 150,
        width: $scope.imgwidth,
        height: $scope.imgheight,
        angle: 0
      });

image.setControlsVisibility({
    mtr: false,
    transparentCorners: true

});

if($scope.slideback==false){
      canvases.add(image);
  }else{
  	canvases2.add(image);
  }

    });




  };


$scope.Addimagejs = function(x){
$scope.imagedatajson = [];
if(x){
$scope.imagedatajson.push({image: x});

console.log($scope.imagedatajson);
}
};

$(document).ready(function (e) {
    $('#uploadImg').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

$scope.uploadImg1 = true;
$('#uploadImgsubmit').prop('disabled',true);

        $.ajax({
            type:'POST',
            url: 'Campaigns/Uploadimage',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){ 

            if(data){
         $scope.UploadImage(data.imageurl);
         $scope.Addimagejs(data.imageurl);
     }

     $('#uploadImgsubmit').prop('disabled',false);
$( "#uploadImg" )[0].reset();
$scope.uploadImg1 = false;
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

 
});








$scope.DrowText(510,600);





$scope.Getfontcountry = function(){
$http.get("Campaigns/Getfontcountry")
    .then(function(response) {
        $scope.contryfont = response.data;
    });
};
$scope.Getfontcountry();



$scope.Getfont = function(country_id){
$http({
        method : "POST",
        TYPE : "JSON",
        url : "Campaigns/Getfont",
        data : {
country_id: country_id
        }
    }).then(function mySucces(response) {
       
$scope.fontfamily = response.data;
$scope.getfontfamilyall = $scope.fontfamily[0];

    }, function myError(response) {
        
    });

};
$scope.Getfont('1');


$scope.Getcolorprint = function(){
$http.get("Campaigns/Getcolorprint")
    .then(function(response) {
        $scope.colorprint = response.data;
    });
};
$scope.Getcolorprint();







$scope.Getbasecostwithsizes = function(product_style_id){

$http({
        method : "POST",
        TYPE : "JSON",
        url : "Campaigns/Getbasecostwithsizes",
        data : {
product_style_id: product_style_id
        }
    }).then(function mySucces(response) {
$scope.basecost = response.data[0];
    }, function myError(response) {
        
    });

};




$scope.Getproduct = function(product_category_id){


$http({
        method : "POST",
        TYPE : "JSON",
        url : "Campaigns/Getproduct",
        data : {
product_category_id: product_category_id
        }
    }).then(function mySucces(response) {
 
 $scope.slideback = false;
 
$scope.productlist = response.data;
product_style_id = $scope.productlist[0].product_style_id;
product_style_front = $scope.productlist[0].product_style_front;
product_style_back = $scope.productlist[0].product_style_back;


if(!product_style_id){
	product_style_id = '<?php if(isset($_SESSION['product_style_id'])){echo $_SESSION['product_style_id'];} ?>';
}

$scope.Getproductcolor(product_style_id);
$scope.product_style_id = product_style_id;

$scope.product_style_front = product_style_front
$scope.product_style_image = product_style_front;
$scope.product_style_back = product_style_back;



$scope.productcss = $scope.productlist[0];

$scope.xline_left = $scope.productlist[0].xline_front_left;
$scope.yline_top = $scope.productlist[0].yline_front_top;

$scope.left_top = $scope.productlist[0].front_left_top;
$scope.left_left = $scope.productlist[0].front_left_left;
$scope.left_height = $scope.productlist[0].front_left_height;

$scope.right_top = $scope.productlist[0].front_right_top;
$scope.right_left = $scope.productlist[0].front_right_left;
$scope.right_height = $scope.productlist[0].front_right_height;

$scope.top_top = $scope.productlist[0].front_top_top;
$scope.top_left = $scope.productlist[0].front_top_left;
$scope.top_width = $scope.productlist[0].front_top_width;

$scope.under_top = $scope.productlist[0].front_under_top;
$scope.under_left = $scope.productlist[0].front_under_left;
$scope.under_width = $scope.productlist[0].front_under_width;






$scope.productalldata = $scope.productlist[0];

$scope.Getbasecostwithsizes(product_style_id);




canvases.setBackgroundImage('<?php echo $base_url; ?>/file/productstyle/' + $scope.productlist[0].product_style_front, canvases.renderAll.bind(canvases), {
   backgroundImageStretch: false
});

canvases2.setBackgroundImage('<?php echo $base_url; ?>/file/productstyle/' + $scope.productlist[0].product_style_back, canvases2.renderAll.bind(canvases2), {
   backgroundImageStretch: false
});






    }, function myError(response) {
        
    });

};




$scope.Getproductcategory = function(){
$http.get("Campaigns/Getproductcategory")
    .then(function(response) {
        $scope.productcategory = response.data;
        $scope.product_category_id = $scope.productcategory[0].product_category_id;

        $scope.Getproduct($scope.product_category_id);  


    });
};
$scope.Getproductcategory();




$scope.Getproductcolor = function(product_style_id){


$http({
        method : "POST",
        TYPE : "JSON",
        url : "Campaigns/Getproductcolor",
        data : {
product_style_id: product_style_id
        }
    }).then(function mySucces(response) {
       
$scope.productcolorlist = response.data;
$('.productlist' + product_style_id).css({'background-color':'#eee','border':'1px solid #eee'});

    }, function myError(response) {
        
    });

};




$scope.Selectproduct = function(x){
$scope.slideback = false;
$scope.productcss = x;

$scope.xline_left = x.xline_front_left;
$scope.yline_top = x.yline_front_top;

$scope.left_top = x.front_left_top;
$scope.left_left = x.front_left_left;
$scope.left_height = x.front_left_height;

$scope.right_top = x.front_right_top;
$scope.right_left = x.front_right_left;
$scope.right_height = x.front_right_height;

$scope.top_top = x.front_top_top;
$scope.top_left = x.front_top_left;
$scope.top_width = x.front_top_width;

$scope.under_top = x.front_under_top;
$scope.under_left = x.front_under_left;
$scope.under_width = x.front_under_width;







$scope.productstyleid = [];
$scope.productstyleid.push({productid: x.product_style_id});




angular.forEach($scope.productlist,function(item){

if(x.product_style_id==item.product_style_id){
	$('.productlist'+ x.product_style_id).css({'background-color':'#eee','border':'1px solid #eee'});
}else{
	$('.productlist'+ item.product_style_id).css({'background-color':'#fff','border':'0px solid #fff'});
}

});

$scope.Getbasecostwithsizes(x.product_style_id);




$scope.DrowText(510,600);

$scope.product_color_id = '1';


$scope.productalldata = x;

if($scope.product_style_id != x.product_style_id){
$scope.product_style_id = x.product_style_id;
$scope.product_style_front = x.product_style_front;
$scope.product_style_image = $scope.product_style_front;
$scope.product_style_back = x.product_style_back;
$scope.Getproductcolor(x.product_style_id);
//var product_color_code = $scope.product_color_code;


canvases.setBackgroundImage('<?php echo $base_url; ?>/file/productstyle/' + x.product_style_front, canvases.renderAll.bind(canvases), {
   backgroundImageStretch: false
});

canvases2.setBackgroundImage('<?php echo $base_url; ?>/file/productstyle/' + x.product_style_back, canvases2.renderAll.bind(canvases2), {
   backgroundImageStretch: false
});




}






};

$scope.Selectproductcolor = function(product_color_code,product_color_id){
//$scope.product_color_code = product_color_code;
$scope.productcolorcode = [];
$scope.productcolorcode.push({productcolorcode: product_color_code});
canvases.setBackgroundColor('#' + product_color_code, canvases.renderAll.bind(canvases));
canvases2.setBackgroundColor('#' + product_color_code, canvases2.renderAll.bind(canvases2));
$scope.product_color_id = product_color_id;

};

$scope.Selectproductimageback = function(){
$scope.slideback = true;

$scope.xline_left = $scope.productcss.xline_back_left;
$scope.yline_top = $scope.productcss.yline_back_top;

$scope.left_top = $scope.productcss.back_left_top;
$scope.left_left = $scope.productcss.back_left_left;
$scope.left_height = $scope.productcss.back_left_height;

$scope.right_top = $scope.productcss.back_right_top;
$scope.right_left = $scope.productcss.back_right_left;
$scope.right_height = $scope.productcss.back_right_height;

$scope.top_top = $scope.productcss.back_top_top;
$scope.top_left = $scope.productcss.back_top_left;
$scope.top_width = $scope.productcss.back_top_width;

$scope.under_top = $scope.productcss.back_under_top;
$scope.under_left = $scope.productcss.back_under_left;
$scope.under_width = $scope.productcss.back_under_width;

};

$scope.Selectproductimagefront = function(){
$scope.slideback = false;

$scope.xline_left = $scope.productcss.xline_front_left;
$scope.yline_top = $scope.productcss.yline_front_top;

$scope.left_top = $scope.productcss.front_left_top;
$scope.left_left = $scope.productcss.front_left_left;
$scope.left_height = $scope.productcss.front_left_height;

$scope.right_top = $scope.productcss.front_right_top;
$scope.right_left = $scope.productcss.front_right_left;
$scope.right_height = $scope.productcss.front_right_height;

$scope.top_top = $scope.productcss.front_top_top;
$scope.top_left = $scope.productcss.front_top_left;
$scope.top_width = $scope.productcss.front_top_width;

$scope.under_top = $scope.productcss.front_under_top;
$scope.under_left = $scope.productcss.front_under_left;
$scope.under_width = $scope.productcss.front_under_width;

};


$scope.Getartwork = function(artwork_category_id,searchartwork){

$http({
        method : "POST",
        TYPE : "JSON",
        url : "Campaigns/Getartwork",
        data : {
artwork_category_id: artwork_category_id,
searchartwork: searchartwork
        }
    }).then(function mySucces(response) {
       
$scope.artworklistall = response.data;

    }, function myError(response) {
        
    });



};

$scope.Openartwork = function(){
$('#Modalartwork').modal('show');

$http.get("Campaigns/Getartworkcategorylist")
    .then(function(response) {
        $scope.artworkcategorylist = response.data;
    });
$scope.Getartwork('0','');

};


$scope.Getcountryone = function(x){
$scope.getcountrycat = x.country_name;
$scope.Getfont(x.country_id);
};

$scope.Getfontfamilyone = function(x){
$scope.getfontfamily = x.font_name;
$scope.getfontfamilyall = x;


 var tObj = canvases.getActiveObject();
  if(tObj){
    tObj.set({
      fontFamily: x.font_family
    });

      canvases.renderAll();
  }

     var tObj2 = canvases2.getActiveObject();
  if(tObj2){
    tObj2.set({
      fontFamily: x.font_family
    });

	canvases2.renderAll();

}



};








$scope.Selectcolorprint = function(x){



 var tObj = canvases.getActiveObject();
 if(tObj){
    tObj.set({
      fill: '#' + x.color_print_code
    });
    canvases.renderAll();
    }

     var tObj2 = canvases2.getActiveObject();
 if(tObj2){
    tObj2.set({
      fill: '#' + x.color_print_code
    });
 canvases2.renderAll();
}


};




$scope.Selectcolorartwork = function(x){
 var tObj = canvases.getActiveObject();
 if(tObj){
    tObj.set({
      fill: '#' + x.color_print_code
    });
    canvases.renderAll();
    }

     var tObj2 = canvases2.getActiveObject();
 if(tObj2){
    tObj2.set({
      fill: '#' + x.color_print_code
    });
 canvases2.renderAll();
}


};






$scope.strokewidth = '0';
$scope.Addstroke = function(width){
var tObj = canvases.getActiveObject();
 if(tObj){
    tObj.set({
       strokeWidth: width
    });
    canvases.renderAll();
    }

     var tObj2 = canvases2.getActiveObject();
 if(tObj2){
    tObj2.set({
      strokeWidth: width
    });
 canvases2.renderAll();
}

	  
};


$scope.Selectcolorstrokeprint = function(x){
 var tObj = canvases.getActiveObject();
 if(tObj){
    tObj.set({
       stroke: '#' + x.color_print_code
    });
    canvases.renderAll();
    }

     var tObj2 = canvases2.getActiveObject();
 if(tObj2){
    tObj2.set({
      stroke: '#' + x.color_print_code
    });
 canvases2.renderAll();
}



};







$scope.Clicknextstep = function(){
	
	if($scope.product_style_id=='0'){
$scope.product_style_id = '<?php if(isset($_SESSION['product_style_id'])){ echo $_SESSION['product_style_id']; } ?>';
}

	if($scope.product_color_id=='0'){
$scope.product_color_id = '<?php if(isset($_SESSION['product_color_id'])){ echo $_SESSION['product_color_id']; } ?>';
	}


$http({
        method : "POST",
        TYPE : "JSON",
        url : "Campaigns/Alljson",
        data : {
alljson: canvases.toJSON(),
alljson2: canvases2.toJSON(),
alljsonfront: canvases.toJSON().objects,
alljsonback: canvases2.toJSON().objects,
product_style_id: $scope.product_style_id,
product_color_id: $scope.product_color_id,
basecost: $scope.basecost
        }
    }).then(function mySucces(response) {
       
window.open ('<?php echo $base_url; ?>/campaigns/details','_self',false);

    }, function myError(response) {
        
    });	

};



canvases.on('object:moving', function (e) {
        $(".xgridline").css("opacity", "1");
        $(".ygridline").css("opacity", "1");
    }); 

canvases.on('mouse:up', function (e) {
        $(".xgridline").css("opacity", "0");
        $(".ygridline").css("opacity", "0");
    });



canvases2.on('object:moving', function (e) {
        $(".xgridline").css("opacity", "1");
        $(".ygridline").css("opacity", "1");
    }); 

canvases2.on('mouse:up', function (e) {
        $(".xgridline").css("opacity", "0");
        $(".ygridline").css("opacity", "0");
    });



fabric.Canvas.prototype.customiseControls({
br: {
        action: 'scale'
    },
    tr: {
        action: 'rotate',
        cursor: 'pointer'
    },
    tl: {
        action: 'moveUp',
        cursor: 'pointer'
    },
    bl: {
        action: 'remove',
        cursor: 'pointer'
    }
     
}, function() {
     canvases.renderAll();
    canvases2.renderAll();
} );


fabric.Object.prototype.customiseCornerIcons({
    settings: {
        borderColor: 'black',
        cornerSize: 30,
        cornerShape: 'rect',
        cornerBackgroundColor: 'transparent',
        cornerPadding: 10
    },
    tl: {
        icon: 'icons/drag.png'
    },
    br: {
        icon: 'icons/scale.png'
    },
    bl: {
        icon: 'icons/delete.png'
    },
    ml: {
        icon: 'icons/mtt.png'
    },
    mr: {
        icon: 'icons/mtt.png'
    },
    mt: {
        icon: 'icons/mtt.png'
    },
    mb: {
        icon: 'icons/mtt.png'
    },
    tr: {
        icon: 'icons/rotate.png'
    }
}, function() {
    canvases.renderAll();
    canvases2.renderAll();
} );


var canvasWrapper = document.getElementById('c1');
canvasWrapper.tabIndex = 1000;
//canvasWrapper.addEventListener("keydown", false);




		});
</script>
