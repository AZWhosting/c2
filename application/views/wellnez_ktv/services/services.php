<div id="wrapperApplication" class="wrapper"></div>
<!--load before somthing not yet done -->
<div id="holdpageloadhide" style="display:block;text-align: center;position: fixed;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
	<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
</div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<!-- <div id="menu" class="menu"></div> -->
	<div id="content" ></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
</script>
<script type="text/x-kendo-template" id="menu-tmpl">
	<nav class="navbar navbar-inverse " role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="margin: 0">
            	<!-- Menu Phone -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Menu Phone Multipel Task-->
                <button type="button" class="navbar-toggle phone-multitasklist" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">	                   
                    <span class="icon-th-list"></span>
                </button>

                <!-- Menu Phone Langauge-->
                <button type="button" class="navbar-toggle phone-lang" data-toggle="collapse" data-target="#bs-example-navbar-collapse-4">
                    <span data-bind="text: lang.localeCode"></span>
                </button>

                <!--Logo-->
                <!-- <a class="navbar-brand" href="#/" data-bind="click: checkRole"> -->
                <a class="navbar-brand" href="<?php echo base_url();?>wellnez" >
                    <img src="<?php echo base_url();?>assets/spa/logo.png" >
                </a>
            </div>
            <div class="row" style="margin-right:0 ;">
	            <div class="col-sm-4 col-md-4" style="padding: 0;">
		            <form class="navbar-form pull-left  hidden-xs" >
					  	<input type="text" class="span2 search-query" placeholder="Search" id="search-placeholder" 
					  			data-bind="value: searchText" 
					  			style="background-color: #fff; color: #ffffff; border-color: #333333; height: 33px;">
					  	<button type="submit" class="btn btn-inverse" data-bind="click: search"><i class="icon-search"></i></button>
					</form>
				</div>
				<div class="hidden-sm col-md-3">
				</div>
				<!-- Menu rigth Desktop -->
				<div class="col-sm-4 col-md-3" style="float: right; padding: 0;">
					<ul class="menu-right  topnav pull-right hidden-xs">
						<li role="presentation" class="setting dropdown">
					  		<a style="color: #fff;" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="right-user-name" data-bind="text: getUsername"></span></a>
				  			<ul class="dropdown-menu">
				  				<li>
			                    	<a href="#" data-bind="click: lang.changeToKh">
			                    		<img class="kh-flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/kh.svg">
			                    		<span>ភាសាខ្មែរ</span>
			                    	</a>
			                    </li>
		    					<li>
		    						<a href="#" data-bind="click: lang.changeToEn">
		    							<img class="en-flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg">
		    							<span>English</span>
		    						</a>
		    					</li>
		    					<!-- <li>
									<a href='#/setting' >
										<i class="icon-power-off"></i>
										<span>Setting</span>
									</a>
								</li> -->
								<li class="divider"></li>
								<li>
									<a href="#/manage" data-bind="click: logout">
										<i class="icon-power-off"></i>
										<span>Logout</span>
									</a>
								</li>
				  			</ul>
					  	</li>
					  	<!-- <li role="presentation" class="dropdown multitasklist">
					  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					  			<i class="icon-th-list"></i>
					  		</a>
				  			<ul class="dropdown-menu ul-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">  				  				
				  			</ul>
					  	</li> -->
					  	<li class="question">
					  		<a style="padding-top: 0;" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					  			<i class="icon-question icon-question1"></i>
					  		</a>
					  		<ul class="dropdown-menu" style="width: 408px !important; left: -295px !important; margin-top: 0; padding-bottom: 0; border: none;">
					  			
					  			<div class="middle-help" style="background: #f4f4f4; padding: 20px 20px 20px; text-align: left; display: inline-block; width: 100%;">
					  				<div class="more-help" style="border-bottom: 1px solid #ddd; margin-bottom: 10px; width: 100%; float: left; padding-bottom: 10px;">
				  						<div class="help-img" style="margin-right: 20px; float: left;">
				  							<img src="http://fpoimg.com/51x51?text=Picture%201">
				  						</div>
				  						<div class="help-desc" style="float: left;">
				  							<p>Need more help?</p>
				  							<a href="" target="_blank">Help Center</a>
				  						</div>
				  					</div>
				  					<div class="what-help" style="width: 100%; float: left;">
				  						<div class="help-img" style="margin-right: 20px; float: left;">
				  							<img src="http://fpoimg.com/51x51?text=Picture%202">
				  						</div>
				  						<div class="help-desc">
				  							<p>Check out what's new</p>
				  							<a href="" target="_blank">Learn about new product features</a>
				  						</div>
				  					</div>
					  			</div>
					  			
					  		</ul>
					  	</li>
					  	<li class="icon-setting">
					  		<a href="#/setting" class="glyphicons settings">
					  			<i class="text-t"></i>
					  		</a>
					  	</li>
					  	<li class="iconbell">
					  		<a href="">
					  			<i class="icon-bell"></i>
					  		</a>
					  	</li>
					  	
					</ul>
				</div>
			</div>
			<!-- Secondary Menu -->
			<!-- <ul class="topnav hidden-xs " id="secondary-menu">
			</ul> -->

            <!-- Menu Phone -->
            <div class="menu-phone collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav hidden-lg hidden-md hidden-sm">
                	<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/' class='glyphicons show_big_thumbnails'><i></i><span >Dashnboard</span></a></li>
				  	<!-- <li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/center'><span data-bind="text: lang.lang.center"></span></a></li>
				  	<li role='presentation' class='dropdown'>
				  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span style="margin-top: 12px;" class='caret'></span></a>
			  			<ul class='dropdown-menu'>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/customer'><span >Add New Customer</span></a></li>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/property'><span >Add New Property</span></a></li> 
			  				<li ><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/reorder'><span >Reading Route Management</span></a></li>  				
			  				<li><span class="li-line"></span></li>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/reading'><span >1. Meter Reading</span></a></li>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/run_bill'><span >2. Run Bill</span></a></li> 
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/print_bill'><span >3. Print Bill</span></a></li>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/receipt'><span >4. Cash Receipt</span></a></li>
			  				<li><span class="li-line"></span></li>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/imports'><span >Import</span></a></li>
			  				<li><span class="li-line"></span></li>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" data-toggle="collapse" data-target=".navbar-collapse" href='#/backup'><span>Back Up</span></a></li>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/offline'><span>Offline</span></a></li>
			  			</ul>
				  	</li>
				  	<li>
				  		<a data-toggle="collapse" data-target=".navbar-collapse.in" href="#/reports">
				  			<span>REPORTS</span>
				  		</a>
				  	</li> -->
                	<li>
						<a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/setting' class='glyphicons settings'>
							<i ></i>
							<span>Setting</span>
						</a>
					</li>
					<li>
						<a data-toggle="collapse" data-target=".navbar-collapse.in" href="#/manage" data-bind="click: logout">
							<i class="icon-power-off"></i>
							<span>Logout</span>
						</a>
					</li>
                </ul>
            </div>


            <!-- Menu Phone Multipel Task-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            	<ul class="hidden-lg hidden-md hidden-sm ul-multiTaskList nav navbar-nav phone-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">  				  				
		  		</ul>
            </div>

            <!-- Menu Phone Search-->
            <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
            	<form class="navbar-form pull-left hidden-lg hidden-md hidden-sm">
				  	<input id="search-placeholder" class="span2 search-query" 
				  		type="text" 
				  		placeholder="Search" 
				  		data-bind="value: searchText" />
				  	<button data-toggle="collapse" data-target=".navbar-collapse" class="btn btn-inverse"
				  		type="submit" 
				  		data-bind="click: search" >
				  			<i class="icon-search "></i>
				  	</button>
				</form>
            </div> -->

            <!-- Menu Phone Langauge-->
            <div class="menu-phone collapse navbar-collapse" id="bs-example-navbar-collapse-4">
            	<ul class=" nav navbar-nav hidden-lg hidden-md hidden-sm phone-language">
                    <li>
                    	<a  href="#" data-bind="click: lang.changeToKh">
                    		<img class="kh-flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/kh.svg">
                    		<span style="margin-left: 0;">ភាសាខ្មែរ</span>
                    	</a>
                    </li>
					<li>
						<a  href="#" data-bind="click: lang.changeToEn">
							<img class="en-flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg">
							<span>English</span>
						</a>
					</li>	
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>	
</script>
<script id="multiTaskList-row-template" type="text/x-kendo-template">
    <li >
    	<a data-toggle="collapse" data-target=".navbar-collapse.in" href="\#/#=url#">
    		<span >#=name#</span>
    		<span title="Remove" class="multiTaskList glyphicons remove_2 pull-right" data-bind="click: removeLink">
    			<i></i>
    		</span>
    	</a>
    </li>	
</script>
<style>
	@media (min-width: 768px){
		html.no-touch.sticky-top:not(.animations-gpu) #content {
		    padding-top: 0;
		}
	}
	.services .example{
		background: #0eac00;
	    width: 100%;
	    text-align: center;
	    position: relative; 
	    padding: 15px;
	    border-radius: 10px;
	    float: left;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);

	}
	.block-number{
		width: 27% !important;
	    float: left;
	    background: #fff;
	    color: #333;
	    text-align: center;
	    margin-right: 1px;
	    padding: 15px;
	    margin-bottom: 1px;
	    font-size: 14px;	    
	    cursor: pointer;
	    /*box-shadow: 2px 0px 12px 0px rgba(68,68,68,1)*/
	}
		
	.services .example table{
		width: 100%;
		background: none;
		float: left;
		color: #fff;
		border: none;
		text-align: left;
	}
	.services .example table th{
		text-transform: uppercase;
		background: #1c3b19 !important;
		color: #fff;

	}
	.services .example table tr th,
	.services .example table tr td{
		padding: 8px;
		border: 1px solid #ddd;
	}

	.services .example table tr{
		border-bottom: 1px solid #fff;
	}
	.table-condensed tr td {
	    border: none !important;
	    
	}
	.table-striped > tbody > tr:nth-of-type(odd){
		background: none;
	}
	.table-condensed th, .table-condensed td {
	    padding: 5px 5px 5px 10px !important;
	}
	.table-striped tbody tr:nth-child(odd) td, 
	.table-striped tbody tr:nth-child(odd) th {
	    background: #none !important;
	}
	.services .example table tr td{
		background: none !important;
	}
	.botton .button-service{
		background: #fff;
	    padding: 10px;
	    float: left;
	    width: 100%;
	    border-radius:  5px;
	    cursor: pointer;
	    /*box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);*/
	    color: #0eac00;
	    margin-top: 1px;
	}
	.botton .button-service .img{
		width: 40px;
	    float: left;
	    margin-right: 15px;
	    margin-left: 30px;
	}
	.botton .button-service .img img{
		width: 100%
	}
	.botton .button-service p{
		font-size: 27px;
	}
	
	.botton .button-book{
		background: #fff;
	    padding: 13px;
	    border-radius: 5px 0 0 0 ;
	    cursor: pointer;
	   /* box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);*/
	    color: #0eac00;
	}
	.botton .button-book .img{
		width: 38px;
	    margin-left: 9px;
	    margin-bottom: 4px;
	}
	.botton .button-book .img img{
		width: 100%
	}
	.botton .button-book p{
		margin-bottom: 0;
	}

	.botton .button-pay{
		background: #fff;
	    padding: 16px 16px 10px 16px;
	    text-align: center;
	    margin-left: 1px;
	    cursor: pointer;
	    /*box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);*/
	    color: #0eac00;
	}
	.botton .button-pay .img{
		width: 38px;
	    margin-left: 13px;
	    margin-bottom: 4px;
	}
	.botton .button-pay .img img{
		width: 100%
	}
	.botton .button-pay p{
		margin-bottom: 0
	}
	.button-cancel{
		background: #fff;
	    width: 100%;
	    text-align: center;
	    margin-left: 1px;
	    border-radius: 0  5px 0 0;
	    line-height: 38px;
	    cursor: pointer;
	    /*box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);*/
	    color: #0eac00;
	    margin-bottom: 0;
	    height: 87px;
	}
	.button-cancel span{
		font-size: 45px;
	    padding: 5px;
	    float: left;
	    width: 100%;
	}
	.example .k-grid table {
	    color: #333;
	    font-size: 13px;
	}
	.block-number.k-state-selected{
		background: green !important;
		color: #fff !important;
	}
	.serving {
		background: #1c3b19;
		color: #fff;
	}
	.circle_plus i:before{
		font-size: 55px;
		text-align: center;
		color: #0eac00;
	}
	.bg-action-button .btn-btn {
	    color: #FFF;
	    border: 1px solid #d5d5d5;
	    border-radius: 2px;
	    padding: 5px 15px;
	    cursor: pointer;
	    float: right;
	    margin-left: 8px;
	}
	.glyphicons.print i:before {
	    content: "\e016";
	    color: #fff !important;
	}
	.box-generic.bg-action-button .glyphicons.remove_2 i:before{
		color: #fff !important;
	}
</style>
<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
	<div class="container">
		<div class="row services">
			<div class="span12" style="position: relative;overflow: hidden;padding:0;">
				<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 999999;border-radius: 10px;">
					<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 40%;left: 40%">Loading...</i>
				</div>
				<div class="row ">
					<div class="span6 ">
						<div class="example" style="height: 633px; overflow-y: scroll;padding-bottom: 15px;">
							<div id="formStyle"
								 data-role="listview"
								 data-auto-bind="true"
								 data-selectable="true"
				                 data-template="work-list-tmpl"
				                 data-bind="source: workDS"
				                 style="overflow: auto;width: 100%;background: none;">
				            </div>						
						</div>
					</div>
					<div class="span6">
						<div class="example" style="box-shadow: 2px 0px 12px 0px rgba(68,68,68,1); border-radius: 10px 10px 0 0 ; margin-bottom: 1px;">
							<div data-role="grid" class="costom-grid"
						    	 data-column-menu="true"
						    	 data-reorderable="true"
						    	 data-scrollable="false"
						    	 data-resizable="true"
						    	 data-editable="true"
				                 data-columns="[
								    { 
								    	title:'NO',
								    	width: '50px', 
								    	attributes: { style: 'text-align: center;' },
								    	editable: 'false', 
								        template: function (dataItem) {
								        	var rowIndex = banhji.Index.lineDS.indexOf(dataItem)+1;
								        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
								      	}
								    },
				                 	{ 
				                 		field: 'item', 
				                 		title: 'Name', 
				                 		editor: itemEditor, 
				                 		template: '#=item.name#', width: '170px' 
				                 	},
		                            { 
		                            	field: 'measurement', 
		                            	title: 'UOM', 
		                            	editor: measurementEditor, 
		                            	template: '#=measurement?measurement.measurement:banhji.emptyString#', 
		                            	width: '80px' 
		                            },
		                            {
									    field: 'quantity',
									    title: 'QTY',
									    format: '{0:n}',
									    editor: numberTextboxEditor,
									    width: '120px',
									    attributes: { style: 'text-align: right;' }
									},
		                            {
									    field: 'price',
									    title: 'PRICE',
									    hidden: true,
									    format: '{0:n}',
									    editor: numberTextboxEditor,
									    width: '120px',
									    attributes: { style: 'text-align: right;' }
									},
		                            { 
		                            	field: 'amount', 
		                            	title:'AMOUNT', 
		                            	format: '{0:n}', 
		                            	editable: 'false', 
		                            	attributes: { style: 'text-align: right;' }, width: '120px' 
		                            }
		                         ]"
		                         data-auto-bind="false"
				                 data-bind="source: lineDS" >
		                 	</div>
		                 	<div data-bind="visible: haveWork">
					            <button style="background: #1c3b19; float:left;" class="btn btn-inverse" data-bind="click: goPOS"><i class="icon-plus icon-white"></i><span style="float: right; margin-left: 10px;">Add Serving</span></button>
					            <button style="background: darkred;float: left;border: 1px solid darkred;" class="btn btn-inverse" data-bind="click: saveWork"><i class="icon-plus icon-white"></i><span style="float: right; margin-left: 10px;" data-bind="text: lang.lang.save">Add Serving</span></button>
					        </div>
						</div>
						<div class="example" style="box-shadow: 2px 0px 12px 0px rgba(68,68,68,1); border-radius: 0 0 10px 10px;">
							<div class="row ">
								<div class="span6 ">
									<table class="table table-condensed table-striped table-white" >
										<tbody>
											<tr>
												<td style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
												<td class="right strong" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
											</tr>               
											<tr>
												<td><span>Service Charge</span></td>
												<td class="right ">
													<span data-format="n" data-bind="text: obj.service_charge"></span>
												</td>
											</tr>               
											<tr>
												<td><span data-bind="text: lang.lang.total_tax"></span></td>
												<td class="right "><span data-format="n" data-bind="text: obj.tax"></span></td>
											</tr>                             
											<tr>
												<td><h4 span data-bind="text: lang.lang.total" style="font-weight: 700;  color: #fff !important;"></h4></td>
												<td class="right strong"><h4 data-bind="text: total" style="font-weight: 700; color: #fff !important;"></h4></td>
											</tr>               
										</tbody>
									</table>
								</div>
								<div class="span6 botton" style="padding-left: 0;">
									<div class="">
										<div class=" ">
											<div class="button-service" data-bind="click: printBill">
												<div class="img">
													<img src="<?php echo base_url();?>assets/spa/icon/pay-green.png" >
												</div>
												<p class="textBig">Print </p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="ntf1" data-role="notification"></div>
				</div>
			</div>
			<div class="span12" style="margin-top: 20px;">
				<p data-bind="text: today"></span>
			</div>
		</div>
	</div>
</script>
<script id="item-list-tmpl" type="text/x-kendo-tmpl">
	<div class="pull-left">
		#=abbr##=number# #=name#
		&nbsp;&nbsp;
		#if(variant.length>0){#
			[
			#for(var i=0; i < variant.length; i++){# 
				#=variant[i].name#, 
			#}#
			]
		#}#
	</div>
	<div class="pull-right">
		#=category#
	</div>
</script>
<script id="work-list-tmpl" type="text/x-kendo-tmpl">
	<div class="block-number #if(status == 'Serving'){# serving #}#" style="position: relative;width: 27.4%;min-height: 175px;" data-bind="click: selectRow">
		<h2 style="text-align: center; font-size: 14px;background: \#ccc;"><b>#: roomshow#</b></h2>
		#if(item.length > 1){#
		 	#var tt = 0#
			#$.each(item, function(i,v){#
				#tt += v.amount#
			#})#
			<p style="text-align: left;"><b>Item Name:</b> <span style="text-align: center;font-size: 12px;">--</span></p>
			<p style="text-align: left;"><b>Amount:</b> <span style="text-align: center;font-size: 12px;">#=kendo.toString(tt, locale=="km-KH"?"c0":"c2", locale)#</span></p>
		#}else{#
			#$.each(item, function(i,v){#
				<p style="text-align: left;"><b>Item Name:</b> <span style="text-align: center;font-size: 12px;">#: v.name#</span></p>
				<p style="text-align: left;"><b>Amount:</b> <span style="text-align: center;font-size: 12px;">#=kendo.toString(v.amount, v.locale=="km-KH"?"c0":"c2", v.locale)#</span></p>
			#})#
		#}#
		<p style="text-align: left;"><b>Status:</b> <span style="text-align: center;font-size: 12px;">#: status#</span></p>
		#if(status == 'Available'){#
		<div class="shadow" style="z-index: 9999;position: absolute;top: 0;left: 0;width: 100%;height: 100%;background: rgba(255,255,255.0.5)">
			<a style="padding:28px;top: 80px;" href="<?php echo base_url(); ?>wellnez_ktv/pos/\#/room/#:room_id#" class="glyphicons no-js circle_plus"><i ></i></a>
		</div>
		#}else if(status == 'Maintenance'){#
			<p style="text-align: left;"><b>Time:</b> <span style="text-align: center;font-size: 12px;">#: kendo.toString(new Date(maintenance_date), "F")#</span></p>
			<a style="background: \#1c3b19;  color: \#fff; padding: 5px 15px;" data-bind="click: availableRoom">Available</a>
		#}#
	</div>
</script>

<script id="print" type="text/x-kendo-template">
    <div class="container">
		<div class="row customerCenter" style="background: #fff; padding-top: 15px; border-radius: 10px; ">
			<div class="span12">
				<div class="example">
                	<div style="overflow: hidden;position: relative;height: 50px;">
	                    <span id="savePrint" class="btn btn-icon btn-primary glyphicons print" data-bind="click: printGrid" style="width: 85px !important; margin-bottom: 0; position: absolute; left: 45%; "><i></i><span data-bind="text: lang.lang.print" style="color: #fff;"></span></span>
	                    <div class="hidden-print pull-right">
	                        <span style="padding: 5px 0 11px 35px;" class="glyphicons no-js remove_2" 
	                            data-bind="click: cancel"><i></i></span>    
	                    </div>
	                </div>
                    <div id="invoicecontent" style="width: 80%!important; margin: 0 auto; border: 1px solid #ccc;"></div>
                    <div class="box-generic bg-action-button" align="right" style="background-color: #203864; margin-top: 15px; margin-bottom: 11px;">
                        <span id="notification"></span>
                        <span class="btn btn-icon btn-btn glyphicons remove_2" data-bind="click: cancel" style="width: 90px !important; text-align: right;"><i></i> <span data-bind="text: lang.lang.cancel" style="color: #fff;"> </span></span>
                        <span id="saveClose" class="btn-btn btn btn-icon glyphicons print" data-bind="click: printGrid" style="width: 85px !important; margin-bottom: 0!important; text-align: right;"><i></i><span data-bind="text: lang.lang.print" style="color: #fff;"></span></span>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>  
</script>
<script id="invoiceform" type="text/x-kendo-tmpl">
	<style>
		body {
		    color: \#333;
		    font-family: "Open Sans", 'Battambang';
		    font-size: 12px;
		    background: \#fff;
		}
		*{
		  margin: 0 auto;
		  padding: 0;
		  -webkit-print-color-adjust:exact;
		  font-size: 12px;
		  color: \#000;
		}
		.clear{
			clear: both;
		}
		table td {
			padding: 5px;
		}
	</style>
	<div class="inv1" style="width: 100%; background-color: \#fff!important; position: relative; overflow: hidden;padding-top: 40px;page-break-after: always;">
    	<div class="head" style="width: 90%;">
        	<div class="logo" style="width: 20%; float: left;">
            	<img class="logoP" style="width: 100%;" src="#: banhji.institute.logo.url#" alt="#: banhji.institute.name#" title="#: banhji.institute.name#" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
            	<h3 style="float: left;font-size: 20px; font-family: 'Preahvihear', 'Roboto Slab' !important;" >#: banhji.institute.name#</h3>
                <!-- <div class="vattin" style="float: left; width: 100%">
                	<p style="float: left; width: 100%">
                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" >K009-103005765</span>
                	</p>
                </div> -->
                <div class="clear" style="float: left;">
                	<p style="float: left; text-align: left;font-size: 14px;margin: 0;">អាស័យ​ដ្ឋាន Address: <span >#: banhji.institute.address#</span></p>
                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP: <span >#: banhji.institute.telephone# </span> <br/> Email: <span >#: banhji.institute.email#</span></p>
                </div>
            </div>
        </div>
        <div class="content" style="padding: 1% 5%; position: relative; clear: both; overflow: hidden;">
        	<div style="overflow: hidden; padding:10px 0; background: \#001F5F!important;-webkit-print-color-adjust:exact; color: \#fff; margin-bottom: 15px;">
        		<div class="span5" style="width: 41.66666667%; float: left;">
        			<h1 style="float: left; color: \#fff!important;margin-top: 5px;padding-left: 30px; text-align: left;text-transform: uppercase;font-family: 'Preahvihear', 'Roboto Slab'!important;font-size: 23px;">វិក្កយបត្រ Invoice</h1>
        		</div>
        		<div class="span6" style="float: right; width: 51%;">
        			<table style="float: left; width: 100%;margin-top: 10px;">
        				<tr>
        					<td style="border:0;text-align: left; width: 40%;text-transform: uppercase;color: \#fff!important;">លេខវិក្កយបត្រ (Invoice N0.) :</td>
        					<td style="border:0;text-align: left;font-weight: bold;color: \#fff!important;">#: number#</td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left; text-transform: uppercase;color: \#fff!important;">កាលបរិច្ឆេទ (Date) :</td>
        					<td style="border:0;text-align: left;font-weight: bold;color: \#fff!important;">#= kendo.toString(new Date(issued_date), "F")#</td>
        				</tr>
        				<!-- <tr>
        					<td style="border:0;text-align: left;color: \#fff!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color: \#fff!important;" >#= kendo.toString(new Date(issued_date), "F")#</td>
        				</tr> -->
        			</table>
        		</div>        		
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;padding: 0;">
        		<div class="span6" style="padding-right: 10px; width: 48%; float: left;padding: 0;">
        			<table style="float: left; width: 100%; border: 1px solid \#000;border-collapse: collapse; margin-bottom: 0px;">
        				<!-- <tr>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">អ្នកគិតលុយ (Cashier) </td>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left;">#: cashier_name#</td>
        				</tr> -->
        				<tr>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">ឈ្មោះអតិថិជន (Customer Name) </td>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left;">#: contact.name#</td>
        				</tr>
        				<tr>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">លេខបន្ទប់ (Room No.) :</td>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left;">#: room_number#</td>
        				</tr>
        			</table>
        		</div>
        		<div class="span6" style=" width: 51%; padding-left: 0; float: right;padding: 0;">
        			<table style="float: left; width: 100%; border: 1px solid \#000; border-collapse: collapse;">
        				<!-- <tr>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">កាលបរិច្ឆេទ (Date) </td>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left;">#= kendo.toString(new Date(issued_date), "F")#</td>
        				</tr> -->
        				<tr>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">អ្នកគិតលុយ (Cashier) :</td>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left;">#: cashier_name#</td>
        				</tr>
        				<tr>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left; width: 35%; background: \#F1F1F1!important;">បុគ្គលិក (Staff) :</td>
        					<td style="padding: 5px; border: 1px solid \#000; text-align: left;" >#= employee_name#</td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" > 
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;">
                            <th style="width: 8%;text-align: center;background: \#F1F1F1!important; color: \#333!important;">ល.រ<br />N<sup>o</sup></th>
                            <th style="text-align: center;background: \#F1F1F1!important; color: \#333!important;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="width: 12%;text-align: center;background: \#F1F1F1!important; color: \#333!important;">បរិមាណ<br />QTY</th>
                            <th style="text-align: center;background: \#F1F1F1!important; color: \#333!important;">ឯកតា​<br />UOM</th>
                            <th style="text-align: center;background: \#F1F1F1!important; color: \#333!important;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="width: 20%;text-align: center;background: \#F1F1F1!important; color: \#333!important;">តម្លៃ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView">
						#$.each(items, function(i,v){#
							<tr>
								<td align="center">#: i+ 1#</td>
								<td>#: v.item.name#</td>
								<td align="center"><strong>#: v.quantity #</strong></td>
								<td align="center"><strong>#: v.measurement.measurement#</strong></td>
								<td align="right">#= kendo.toString(v.price, v.locale=="km-KH"?"c0":"c", v.locale)#</td>
								<td align="right"><strong>#= kendo.toString(v.amount, v.locale=="km-KH"?"c0":"c", v.locale)#</strong></td>
							</tr>
						#})#
					</tbody>
                    <tfoot>
                    	<tr>
							<td style="height:40px!important;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr><!-- 
                        <tr>
                        	<td colspan="5" style="padding-right: 10px;text-align: right;">សរុប SUB TOTAL</td>
							<td style="border: 1px solid;text-align: right"><strong>#= kendo.toString(sub_total, locale=="km-KH"?"c0":"c", locale)#</strong></td>
                        </tr>
                        <tr>
							<td colspan="5" style="padding-right: 10px;text-align: right;">បញ្ចុះតម្លៃ DISCOUNT</td>
							<td style="border: 1px solid;text-align: right"><strong>#= kendo.toString(discount, locale=="km-KH"?"c0":"c", locale)#</strong></td>
						</tr>
						#if(tax > 0){#
                        <tr>
                        	<td colspan="5" style="padding-right: 10px;text-align: right;">អាករលើតម្លៃបន្ថែម ១០% VAT (10%)</td>
							<td style="border: 1px solid;text-align: right"><strong>#= kendo.toString(tax, locale=="km-KH"?"c0":"c", locale)#</strong></td>
                        </tr>
                        #}# -->
						<tr>
							<td colspan="5" style="padding-right: 10px;text-align: right;">សរុប (បូកបញ្ចូលទាំងអាករ) GRAND TOTAL (VAT INCLUSIVE)</td>
							<td style="border: 1px solid;text-align: right"><strong>#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#</strong></td>
						</tr>
                    </tfoot>
                </table>
            </div>
            <div class="clear">
            	<div class="span6">
            		<span id="secondwnumber#= id#" style="margin-left: -14px; float: left;"></span>
            	</div>
            </div>
        </div>
    </div>
</script>
<script id="invoiceFormPOS" type="text/x-kendo-tmpl">
	<style>
		.inv1 td {
			padding: 5px;
		}
		* {
			-webkit-print-color-adjust:exact; 
			font-size: 14px;
			padding: 0;
			margin: 0;
		}
	</style>
  	<div style="margin: 0 auto;">
		<div class="inv1" style="width: 500px;margin: 0 auto;">
	        <div class="content">
	        	<div style="overflow: hidden;padding:10px 0;">
	        		<div style="text-align: center; margin: 0 auto; width:100% ;">
	        			<img style="text-align: center; width: 150px; margin-bottom: 10px;" src="#= banhji.institute.logo.url#" />
	            	</div>
	            	<p style="text-align: center; margin-bottom: 5px;">#= banhji.institute.name #</p>
	            	<p style="text-align: center; margin-bottom: 5px;">Tel: #= banhji.institute.telephone#</p>
	            	<p style="text-align: center; margin-bottom: 5px;"><span style="font-size: 15px; font-weight: 700;">បង្កាន់ដៃបង់ប្រាក់</span>/<span style="font-size: 16px; font-weight: 700;">Receipt</span></p>
	        	</div>
	            <div class="clear mid-header" style="padding-bottom: 10px;">
	                <table style="width: 100%; ">
	                	<tr>
	                		<td style="width: 35%; padding: 0;">
	                			<span style="font-size: 13px;">វិក្កយបត្រ</span>
	                			/
	                			<span style="font-size: 14px;">Invoice No</span>
	                		</td>
	                		<td style="padding: 0;">:</td>
	                		<td style="text-align: right; padding: 0;"><b>#= number#</b></td>
	                	</tr>
	                	<tr>
	                		<td style="padding: 0;">
	                			<span style="font-size: 13px;">កាល​បរិច្ឆេទ</span>
	                			/
	                			<span style="font-size: 14px;">Date Time</span>
	                		</td>
	                		<td style="padding: 0;">:</td>
	                		<td style="text-align: right; padding: 0; ">#= kendo.toString(new Date(issued_date), "yyyy-MM-dd HH:mm:ss")#</td>
	                	</tr>
	                	<tr>
        					<td style="padding: 0;">ឈ្មោះអតិថិជន (Customer Name) </td>
        					<td style="padding: 0;">:</td>
        					<td style="text-align: right; padding: 0; ">#: contact.name#</td>
        				</tr>
        				<tr>
        					<td style="padding: 0;">លេខបន្ទប់ (Room No.) :</td>
        					<td style="padding: 0;">:</td>
        					<td style="text-align: right; padding: 0; ">#: room_number#</td>
        				</tr>
	                </table>
	            </div>
	        	<div class="clear">
	            	<table cellpadding="0" cellspacing="0" border="1" class="span12" style="width: 100%; margin-bottom: 20px;">
	                	<thead style="">
	                        <tr class="main-color" style="height: 45px;background: \#203864!important;">
	                            <th style="text-align: center;width: 8%;color: \#fff!important;background: \#203864!important;">ល.រ<br />N<sup>0</sup></th>
	                            <th style="text-align: center;color: \#fff!important;background: \#203864!important;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
	                            <th style="text-align: center;color: \#fff!important;background: \#203864!important;">បរិមាណ<br />Quantity</th>
	                            <th style="text-align: center;color: \#fff!important;background: \#203864!important;">ថ្លៃឯកតា​<br />Unit Price</th>
	                            <th style="text-align: center;color: \#fff!important;background: \#203864!important;">ថ្លៃឯកតា​<br />Unit Price</th>
	                            <th style="text-align: center;width: 20%;color: \#fff!important;background: \#203864!important;">ថ្លៃ​ទំនិញ<br />Amount</th>
	                        </tr>
	                    </thead>
						<tbody style="margin-top: 2px" id="formListView">
							#$.each(items, function(i,v){#
								<tr>
									<td align="center">#: i+ 1#</td>
									<td>#: v.item.name#</td>
									<td align="center"><strong>#: v.quantity #</strong></td>
									<td align="center"><strong>#: v.measurement.measurement#</strong></td>
									<td align="right">#= kendo.toString(v.price, v.locale=="km-KH"?"c0":"c", v.locale)#</td>
									<td align="right"><strong>#= kendo.toString(v.amount, v.locale=="km-KH"?"c0":"c", v.locale)#</strong></td>
								</tr>
							#})#
						</tbody>
	                    <tfoot>
	                    	<tr>
								<td style="height:40px!important;"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td colspan="5" style="padding-right: 10px;text-align: right;">សរុប (បូកបញ្ចូលទាំងអាករ) GRAND TOTAL (VAT INCLUSIVE)</td>
								<td style="border: 1px solid;text-align: right"><strong>#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#</strong></td>
							</tr>
							#if(banhji.print.amountperson > 0){#
								<tr>
									<td colspan="5" style="padding-right: 10px;text-align: right;">ទឹកប្រាក់ត្រូវបង់</td>
									<td style="border: 1px solid;text-align: right"><strong>#= kendo.toString(banhji.print.amountperson, locale=="km-KH"?"c0":"c", locale)#</strong></td>
								</tr>
							#}#
	                    </tfoot>
	                </table>
	                <p style="text-align: center; font-size: 12px; margin-top: 8px; margin-bottom: 5px;clear: both;">
	                	សូមអរគុណ សូមអញ្ជើញមកម្តងទៀត ! <i>Thanks, Please come again!</i>
	                </p>
	                <div style="text-align: center; height: 60px; width: 90%; margin: 0 auto;">
	                	<span id="footwnumber#= id#"></span>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</script>