<!DOCTYPE html>
<html>
<head>
	<title>Email Verification</title>
	<link href="<?=base_url();?>assets/frontend/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
  body{
    background-color: #a3a3a3;
  }
  .container{
    background-color: white;
    width: 500px;
    margin: 100px auto;
    border: 1px dashed;
    padding: 50px;
    text-align: center;
  }
  img.img-checked{
    width: 150px;
    height: 150px;
  }
  </style>
</head>
<body>
	<div class="container">
    <div class="row">
      <div class="col-md-12">
        <img class="img-checked" src="<?=base_url()?>assets/frontend/pages/img/checked_red.jpg">
        <br><br>
      </div>
    </div>
		<div class="row">
			<div class="col-md-12">
				<h4> Your Email was successfully confirmed.<br><br>Now you can click below button to main page.</h4>
        <br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<a class="btn btn-danger" href="<?=base_url()?>auth/login?username=<?=$username?>">Get Started</a>
			</div>
		</div>
	</div>
	<script src="<?=base_url();?>assets/frontend/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?=base_url();?>assets/frontend/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>