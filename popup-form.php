
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>make offer</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 

<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 

<script src="https://apis.google.com/js/platform.js" async defer></script>

<style>

.checkbox label:after, 
.radio label:after {
    content: '';
    display: table;
    clear: both;
}

.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
	background: #f5f5f5 none repeat scroll 0 0;
}

.radio .cr {
    border-radius: 50%;
}

.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}

.radio .cr .cr-icon {
    margin-left: 0.04em;
}

.checkbox label input[type="checkbox"],
.radio label input[type="radio"] {
    display: none;
}

.checkbox label input[type="checkbox"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-20deg);
    opacity: 0;
    transition: all .3s ease-in;
}

.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}

.checkbox label input[type="checkbox"]:disabled + .cr,
.radio label input[type="radio"]:disabled + .cr {
    opacity: .5;
}

</style>

<script type="text/javascript" src="jquery.js"></script>

<script type="text/javascript" src="validation.min.js"></script>

<script type="text/javascript" src="bootstrap/js/jquery.form.js"></script>





<script type="text/javascript" src="image-map.js"></script>



<link href="style.css" rel="stylesheet" media="screen">





<link rel="stylesheet" href="bootstrap/css/style.css" >



</head>



<body>

 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_view"><i class="fa fa-search"></i> Quick View</button>



<div class="modal fade product_view" id="product_view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Share on Your Timeline</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">
                        <img src="http://img.bbystatic.com/BestBuy_US/images/products/5613/5613060_sd.jpg" class="img-responsive">
                    </div>
                    <div class="col-md-6 product_content">
                        
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      
                        
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                           
                            <button type="button" class="btn btn-primary" style="background-color:#006;"> share</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>


</body>

</html>