<!doctype html>

<html lang="en">
<head>
  	<meta charset="utf-8">

  	<title>Virtulized Combobox</title>
  	<meta name="description" content="The HTML5 Herald">
  	<meta name="author" content="SitePoint">

  	<link rel="stylesheet" href="<?php echo base_url()?>assets/libraries/kendoui/styles/kendo.common.min.css">
	<link href='https://fonts.googleapis.com/css?family=Battambang:400,700' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
	<![endif]-->
</head>

<body>
	<input type="text" id='combo' data-role="combobox" data-bind="source: dataSource" data-value-field="id" data-text-field="name" data-virtual='true' data-height='320'>
	<script>window.jQuery || document.write('<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/jquery-1.8.2.min.js"><\/script>')</script>
	<script src="<?php echo base_url()?>assets/libraries/kendoui/js/kendo.all.min.js"></script>
	<script>
		var viewModel = kendo.observable({
			dataSource: new kendo.data.DataSource({
                transport: {
                	read  : {
		              	url: 'http://192.168.88.100/c2/api/items',
		              	type: "GET",
		              	dataType: 'json',
		              	headers: { Institute: 51 }
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
	          	pageSize: 10
	        }),
	        myNum : 1000
		});
		// $(function(){
			// "use strict"
			
			kendo.bind($('#combo'), viewModel);
			// $("#combo").kendoComboBox({
			// 	dataSource: {
   //                  transport: {
   //                  	read  : {
			//               	url: 'http://192.168.88.100/c2/api/items',
			//               	type: "GET",
			//               	dataType: 'json',
			//               	headers: { Institute: 1 }
			//             },
			//             parameterMap: function(options, operation) {
			//               	if(operation === 'read') {
			//                 	return {
			//                   		limit: options.take,
			//                   		page: options.page,
			//                   		filter: options.filter
			//                 	};
			//               	} else {
			//                 	return {models: kendo.stringify(options.models)};
			//               	}
			//             }
		 //          	},
	  //         		schema  : {
		 //            	model: {
		 //              		id: 'id'
		 //            	},
		 //            	data: 'results',
		 //            	total: 'count'
		 //          	},
		 //          	batch: true,
		 //          	serverFiltering: true,
		 //          	serverPaging: true,
		 //          	pageSize: 10
		 //        },
		 //        dataTextField: "name",
		 //        dataValueField: "id",
		 //        height: 100,
		 //        virtual: true
			// });

		// });
	</script>
</body>
</html>