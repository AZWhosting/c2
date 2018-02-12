<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Grid Example</title>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/styles/kendo.common.core.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/styles/kendo.common.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/styles/kendo.common-material.core.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/styles/kendo.common-material.min.css">
	<script src="<?php echo base_url()?>assets/kendo/js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/kendo/js/kendo.all.min.js"></script>
</head>
<body>
	<div id="grid"></div>
</body>
	<script>
		var url      = window.location.href;
		var pathname = window.location.pathname;
		if(pathname == '/c2/wellnez/'){
			window.location.href = url + 'home';
		}
		$(function(){
			$('#grid').kendoGrid({
				dataSource: new kendo.data.DataSource({
		          	transport: {
			            read  : {
			              url: "<?php echo base_url()?>" + 'api/attachments',
			              type: "GET",
			              dataType: 'json',
			              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
			            },
			            create  : {
			              url: "<?php echo base_url()?>" + 'api/attachments',
			              type: "POST",
			              dataType: 'json',
			              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
			            },
			            update  : {
			              url: "<?php echo base_url()?>" + 'api/attachments',
			              type: "PUT",
			              dataType: 'json',
			              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
			            },
			            destroy  : {
			              url: "<?php echo base_url()?>" + 'api/attachments',
			              type: "DELETE",
			              dataType: 'json',
			              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
			            },
			            parameterMap: function(options, operation) {
			              if(operation === 'read') {
			                return {
			                  limit: options.take,
			                  page: options.page,
			                  filter: options.filter
			                };
			              } else {
			                return {models: kendo.stringify(options.models)};
			              }
			            }
			          },
			        schema  : {
			            model: {
			              id: 'id'
			            },
			            data: 'results',
			            total: 'count'
			        },
		          	batch: true,
		          	serverFiltering: true,
		          	serverPaging: true,
		          	pageSize: 50
		        })
			});
		});
	</script>
</html>