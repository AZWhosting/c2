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
</style>
<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
	<div class="container">
		<div class="row services">
			<div class="span12" style="position: relative;overflow: hidden;padding:0;">
				<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 999999;border-radius: 10px;">
					<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 40%;left: 40%">Loading</i>
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
		                            	field: 'description', 
		                            	title:'DESCRIPTION', 
		                            	width: '250px',
		                            	hidden: 'true', 
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
		                            	field: 'measurement', 
		                            	title: 'UOM', 
		                            	editor: measurementEditor, 
		                            	template: '#=measurement?measurement.measurement:banhji.emptyString#', 
		                            	width: '80px' 
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
					            <button style="background: #1c3b19; float:left;" class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i><span style="float: right; margin-left: 10px;">Add Serving</span></button>
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
									<!-- <div class="row"> -->
										<!-- <div class="span6 " style="padding-right: 0;">
											<a href="loyalty">
												<div class="button-book" style="margin-right: 1px;">
													<div class="img" style="margin-left: 33px;">
														<img src="<?php echo base_url();?>assets/spa/icon/loyalty-green.png" >
													</div>
													<p class="textSmall">Loyalty</p>
												</div>
											</a>
										</div> -->
										<!-- <div class="span4 " style="padding: 0;">
											<div class="button-pay">
												<div class="img">
													<img src="<?php echo base_url();?>assets/spa/icon/gift-green.png" >
												</div>
												<p class="textSmall">Gift Card</p>
											</div>
										</div> -->
										<!-- <div class="span6" style="padding-left: 0;">
											<p class="button-cancel" style="margin-left: 0;"><span>/</span> <br> Split</p>
										</div>
									</div> -->
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
			<a style="padding:28px;top: 80px;" href="<?php echo base_url(); ?>wellnez/pos/\#/room/#:room_id#" class="glyphicons no-js circle_plus"><i ></i></a>
		</div>
		#}else if(status == 'Maintenance'){#
			<a data-bind="click: availableRoom">Available</a>
		#}#
	</div>
</script>

<script id="print" type="text/x-kendo-template">
    <div id="slide-form">
        <div class="customer-background" style="overflow: hidden;margin-top: 15px;">
            <div>                 
                <div id="example" class="k-content">
                	<div style="overflow: hidden;position: relative;">
	                    <span id="savePrint" class="btn btn-icon btn-primary glyphicons print" data-bind="click: printGrid" style="width: 100px;margin-bottom:0;position: absolute;left:45%;"><i></i><span data-bind="text: lang.lang.print">Save PDF</span></span>
	                    <div class="hidden-print pull-right">
	                        <span style="padding: 5px 0 11px 35px;" class="glyphicons no-js remove_2" 
	                            data-bind="click: cancel"><i></i></span>    
	                    </div>
	                </div>
                    <br>
                    <div id="invoicecontent" style="width: 70%!important; margin: 0 auto;"></div>
                    <div class="box-generic" align="right" style="background-color: #0B0B3B;">
                        <span id="notification"></span>
                        <span id="savePrint" class="btn btn-icon btn-primary glyphicons print" data-bind="click: printGrid" style="width: 100px;margin-bottom:0!important;"><i></i><span data-bind="text: lang.lang.print">Save PDF</span></span>
                        <span class="btn btn-icon btn-warning glyphicons remove_2" data-bind="click: cancel" style="width: 90px;"><i></i> <span data-bind="text: lang.lang.cancel">Cancel </span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</script>
<script id="invoiceform" type="text/x-kendo-tmpl">
    <div class="container winvoice-print" style="page-break-after: always;width: 800px;min-height: 1120px;position: relative;">
    	<style type="text/css">
    		* {
    			color: #000!important;
    		}
    		td{
    			color: #000!important;
    		}
    	</style>
		<div class="span12 headerinv " style="border-bottom: 2px solid \#000!important;padding: 15px 0;padding-bottom: 30px">
            <img class="logoP" style="position: absolute;left: 0;top: 20px;width: auto;height: 90px;" src="#: banhji.institute.logo.url#" alt="#: banhji.institute.name#" title="#: banhji.institute.name#" />
			<div class="span12" align="center">
				<h4 style="line-height: 40px;">#: banhji.institute.name#</h4>					
				<h5 style="line-height: 30px;">#: banhji.institute.address# 
				<br>
				#:typeof banhji.institute.telephone != 'undefined' ? banhji.institute.telephone: ''#</h5>					
			</div>
		</div>
		<div class="span12 cover-customer">
			<div class="span6">
				<span id="secondwnumber#= id#" style="margin-left: -14px; float: left;"></span><br />
				<div class="span12">
					<table >
						<tr>
							<td width="140" style><p>អ្នកគិតលុយ</p></td>
							<td><p>#: cashier_name#</p></td>
						</tr>
						<tr>
							<td style><p>លេខបន្ទប់</p></td>
							<td><p>#: room_number#</p></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="span5">
				<table >
					<tr>
						<td width="140" style><p>លេខ​វិក្កយ​បត្រ</p></td>
						<td><p>#:number#</p></td>
					</tr>
					<tr>
						<td style><p>ថ្ងៃ​ចេញ វិក្កយ​បត្រ</p></td>
						<td><p>#= kendo.toString(new Date(issued_date), "F")#</p></td>
					</tr>
					<tr>
						<td style><p>សាខា</p></td>
						<td><p></p></td>
					</tr>
				</table>		
			</div>
		</div>
		<table class="span12 table table-bordered footerTbl" style="padding:0;margin-top: 40px; border-radius: 3px;border-collapse: inherit;margin-left: 0px;">
			<thead style>
				<tr>
					<th class="darkbblue main-color" style="width: 20%;border:none!important; vertical-align: top;">បរិយាមុខទំនិញ<br>DESCRIPTION</th>
					<th class="darkbblue main-color" style="width: 15%;border:none!important; vertical-align: top;">បរិមាណ<br>QTY</th>
					<th class="darkbblue main-color" style="width: 15%;border:none!important; vertical-align: top;">ឯកតា<br>UOM</th>
					<th class="darkbblue main-color" style="width: 15%;border:none!important; vertical-align: top;">ថ្លៃឯកតា<br>UNIT PRICE</th>
					<th class="darkbblue main-color" style="border:none!important; vertical-align: top;">ថ្លៃទំនិញ<br>AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				#$.each(items, function(i,v){#
					<tr>
						<td>#: v.item.name#</td>
						<td align="center"><strong>#: v.quantity #</strong></td>
						<td align="center"><strong>#: v.measurement.measurement#</strong></td>
						<td align="center"><strong>#= kendo.toString(v.price, v.locale=="km-KH"?"c0":"c", v.locale)#</strong></td>
						<td>#= kendo.toString(v.amount, v.locale=="km-KH"?"c0":"c", v.locale)#</td>
					</tr>
				#})#
				<tr>
					<td colspan="5">
						បុគ្គលិក (staff) : #= employee_name#
					</td>
				</tr>
				<tr>
					<td colspan="4" style="padding-right: 10px;text-align: right;">សរុប TOTAL</td>
					<td style="border: 1px solid;text-align: right">#= kendo.toString(sub_total, locale=="km-KH"?"c0":"c", locale)#</td>
				</tr>
				<tr>
					<td colspan="4" style="padding-right: 10px;text-align: right;">បញ្ចុះតម្លៃ DISCOUNT</td>
					<td style="border: 1px solid;text-align: right">#= kendo.toString(discount, locale=="km-KH"?"c0":"c", locale)#</td>
				</tr>
				<tr>
					<td colspan="4" style="padding-right: 10px;text-align: right;">ប្រាក់ត្រូវបង់សរុប SUB TOTAL</td>
					<td style="border: 1px solid;text-align: right">#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#</td>
				</tr>
			</tbody>
		</table>
	</div>
</script>