<!DOCTYPE html>
<html>
<head>
	<title>SQL Update</title>
	<link href="<?=base_url();?>assets/backend/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>assets/backend/demo/demo12/base/style.bundle.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="<?=base_url();?>assets/backend/demo/demo12/media/img/logo/favicon.ico" />
	<style type="text/css">
		td{
			text-align: center;
			vertical-align: baseline!important;
		}
		h5{
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="m-grid__item m-grid__item--fluid m-wrapper">
			<div class="m-content">
				<div class="m-portlet m-portlet--mobile">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h2>
									<?=$label['sql_files']?>
								</h2>
							</div>
						</div>
					</div>
					<div class="m-portlet__body">
						<table class="table m-table m-table--head-bg-brand">
							<thead>
								<th><h5>ID</h5></th>
								<th><h5>File Name</h5></th>
								<th><h5>Modified Date</h5></th>
								<th><h5>File Type</h5></th>
								<th><h5>File Size</h5></th>
								<th><h5>Action</h5></th>
							</thead>
							<tbody>
							<?php
						        if ($handle = opendir('7414')) {
						            $thelist = "";
						            $id=0;
						            while (false !== ($file = readdir($handle)))
						            {
						                if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'sql')
						                {
						                    $id++;
						                    $thelist .= '<tr><td><h5>'.$id.'</h5></td><td><h5>'.$file.'</h5></td><td><h5>'.date("F d Y H:i:s.", filemtime("7414/".$file)).'</h5></td><td><h5>'.pathinfo("7414/".$file, PATHINFO_EXTENSION).'</h5></td><td><h5>'.(ceil(filesize("7414/".$file)/1024)).'KB'.'</h5></td><td><a href="/admin/updateSQL?file='.$file.'" class="btn btn-outline-info btn-sm">Update</a><a class="btn_delete_sql btn btn-outline-info btn-sm" value="'.$file.'"><i class="la la-trash"></i></a></td></tr>';
						                }
						            }
						            closedir($handle);
						        }
						        echo $thelist;
						    ?>
					    	</tbody>
				    	</table>
					</div>
				</div>
			</div>	
		</div>
	</div>
	<script src="<?=base_url();?>assets/backend/vendors/base/vendors.bundle.js" type="text/javascript"></script>
	<script src="<?=base_url();?>assets/backend/demo/demo12/base/scripts.bundle.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			$('table tr >td a.btn_delete_sql').click(function(){
				var file = $(this).attr('value');
				swal({
		            title:"Are you sure?",
		            text:"You won't be able to revert this!",
		            type:"warning",
		            showCancelButton:!0,
		            confirmButtonText:"Yes, delete it!",
		            cancelButtonText:"No, cancel!",
		            reverseButtons:!0
		        }).then(function(e){
		            e.value
		            ? window.location.href="/admin/deleteSQL?file="+file
		            :"cancel"===e.dismiss}) 
					});
		})
	</script>
</body>
</html>				
				