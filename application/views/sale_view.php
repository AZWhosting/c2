<style >
	/*@media (min-width: 768px){
		html.no-touch.sticky-top:not(.animations-gpu) #content {
		    
		}
	}*/
	html.no-touch.sticky-top:not(.animations-gpu) #content {
	    padding-top: 45px !important;
	    overflow: inherit;
	}
	.home .bg-green{
		background: #203864;
		width: 100%;
		text-align: center;
		position: relative;
		box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.height250{
		height: 200px;
	}
	.height100{
		height: 100px;
	}
	.no-padding{
		padding: 0;
	}
	.no-paddingLeft{
		padding-left: 0;
		padding-right: 2px;
	}
	.nopadding-right{
		padding-right: 0
	}
	.nopadding-left{
		padding-left: 0
	}
	.paddingLeftRigth{
		padding: 0 2px;
	}
	.paddingTopBottom{
		padding: 2px 0;
	}
	.top-left{
		border-radius: 20px 0 0 0;
	}
	.top-rigth{
		border-radius: 0 20px 0 0;
	}
	.bottom-left{
		border-radius: 0 0 0 20px ;
	}
	.bottom-rigth{
		border-radius: 0 0 20px 0;
	}
	.paddingLeft{
		padding-left: 2px;
	}	
	.nopadding-right .height250.top-left .img img,
	.nopadding-left .height250.top-left .img img,
	.nopadding-right .height250 .img img,
	.paddingLeft .height250 .img img{
		width: 120px;
	    margin-top: 40px;
	    float: left;
	    margin-left: 70px;
	}
	.paddingLeftRigth .height250 .img,
	.nopadding-left .height250.top-rigth .img,
	.nopadding-left .height250 .img{
		width: 100%;
	    float: left;
	    padding: 18% 0 20px 32%;
	    text-align: center;
	}
	.paddingLeftRigth .height250 .img img,
	.nopadding-left .height250.top-rigth .img img,
	.nopadding-left .height250 .img img{
		width: 100px;
	    float: left;
	}
	.bg-green.height250.top-left .textBig{
		float: right;
	    padding: 35px 35px 0 0;
	    font-size: 50px;
	    width: 245px;
	    text-align: left;
	}
	.nopadding-right .height250 .textBig{
		float: right;
	    padding: 35px 35px 0 0;
	    font-size: 35px;
	    width: 245px;
	    text-align: left;
	}
	.paddingLeft .height250 .textBig{
		float: right;
	    padding: 27px 35px 0 0;
	    font-size: 35px;
	    width: 245px;
	    text-align: left;
	}
	.paddingLeftRigth .height250 .textSmall,
	.nopadding-left .height250.top-rigth .textSmall,
	.nopadding-left .height250 .textSmall{
		font-size: 17px;
	    margin-bottom: 0;
	    float: left;
	    text-align: center;
	    width: 100%;
	}
	.nopadding-right .height100.bottom-left .img,
	.paddingLeftRigth .height100 .img,
	.no-padding .height100 .img,
	.paddingLeft .height100.bottom-rigth .img{
		width: 100%;
	    float: left;
	    padding: 7% 0 8px 36%;
	    text-align: center;
	}

	.nopadding-right .height100.bottom-left .img img,
	.paddingLeftRigth .height100 .img img, 
	.no-padding .height100 .img img,
	.paddingLeft .height100.bottom-rigth .img img{
		width: 50px;
	    float: left;
	}
	.paddingLeft .height100.bottom-rigth .img{
		padding: 3% 0 0 32%;
	    width: 50%;
	    text-align: center;
	}
	.paddingLeft .height100.bottom-rigth .img img{
		width:  70px;
	}
	.nopadding-left a p, .nopadding-left a:hover p,
	.paddingLeftRigth a p, .paddingLeftRigth a:hover p,
	.paddingTopBottom a p,
	.paddingTopBottom a:hover p{
		color: #fff;
	}
	@media only screen 
	and (min-device-width : 768px) 
	and (max-device-width : 1024px) 
	and (orientation : landscape) {
		.nopadding-right .height250.top-left .textBig{
			padding: 20px 0 0 0;
		    font-size: 55px;
		    width: 202px;
		}
		.nopadding-right .height250 .textBig {
			padding-top: 45px;
    		font-size: 35px;
    		width: 195px
		}
	}

	@media only screen 
	and (min-device-width : 768px) 
	and (max-device-width : 1024px) 
	and (orientation : portrait) {
		.menu .span9 {
		    margin-top: 12px;
		}
		.search-menu .search-query{
			width: 210px;
		}
		.nopadding-right .height250.top-left .img img,
		.nopadding-right .height250 .img img{
			width: 140px;
		    margin-top: 35px;
		    margin-left: 55px;
		}
		.nopadding-right .height250.top-left .textBig{
			padding: 45px 0 0 0;
		    font-size: 40px;
		    width: 146px;
		}
		.nopadding-right .height250 .textBig{
		    padding: 70px 0 0 0;
		    font-size: 25px;
		    width: 146px;
		}
		.paddingLeftRigth .height250 .img, 
		.nopadding-left .height250.top-rigth .img, 
		.nopadding-left .height250 .img{
			padding: 20px 0 10px 25%;
		}
		.paddingLeftRigth .height250 .textSmall, 
		.nopadding-left .height250.top-rigth .textSmall, 
		.nopadding-left .height250 .textSmall{
			font-size: 22px;
		}
		.paddingLeft .height100.bottom-rigth .img{
			padding: 3% 0 0 24%;
		}
		.nopadding-right .height100.bottom-left .img, 
		.paddingLeftRigth .height100 .img, 
		.no-padding .height100 .img, 
		.paddingLeft .height100.bottom-rigth .img{
			padding: 5% 0 8px 28%;
		}
	}
	@media (min-width: 1200px){
		.container {
		    width: 1170px;
		}
	}
	.fixed-bottom{
		position: fixed;
	    bottom: 20px;
	    text-align: center;
	    margin: 0 auto;
	    width: 78%;
	}
</style>
<div id="wrapperApplication" class="container-fluid"></div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<div id="menu"></div>			
	<div id="content" class="row-fluid container"></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
</script>
<script type="text/x-kendo-template" id="menu-tmpl">   
	<div class="menu-hidden sidebar-hidden-phone menu-left hidden-print">
		<div class="navbar main navbar-fixed-top" id="main-menu">
			<ul class="topnav">
				<li><a href="#" data-bind="click: checkRole"><img src="<?php echo base_url();?>assets/update/banhji-blank.png" style="height: 35px;"></a></li>
			</ul>
			<form class="navbar-form pull-left">
			  	<input type="text" class="span2 search-query" placeholder="Search" id="search-placeholder"
			  			data-bind="value: searchText"
			  			style="background-color: #fff; color: #333; border-color: #333333; height: 22px; border-radius: 2px; width: 250px !important;">
			  	<button type="submit" class="btn btn-inverse" data-bind="click: search"><i class="icon-search"></i></button>
			</form>
			<ul class="topnav" id="secondary-menu">
			</ul> 
			<ul class="topnav pull-right">
				<li >
			  		<a onclick="fullScreen(); return false;" class="fullscreen " href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="icon-fullscreen"></i></a>
		  			<a onclick="exitFullScreen(); return false;" class="exitfullscreen " style="display: none;"  href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="icon-resize-small"></i></a>
			  	</li>
				<li role="presentation" class="dropdown">
			  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="icon-th-list"></i></a>
		  			<ul class="dropdown-menu ul-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">
		  			</ul>
			  	</li>
				<li role="presentation" class="dropdown">
			  		<a style="color: #fff;" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">[<span data-bind="text: getUsername"></span>]</a>
		  			<ul class="dropdown-menu">  				  				
		  				<li><a href="#" data-bind="click: lang.changeToKh">ភាសាខ្មែរ</a></li>
    					<li><a href="#" data-bind="click: lang.changeToEn">English</a></li>
						<li class="divider"></li>
					<!-- 	<li><a href="<?php echo base_url(); ?>admin">Setting</a></li> -->
						<li><a href="#/manage" data-bind="click: logout"><i class="icon-power-off"></i> Logout</a></li> 				
		  			</ul>
			  	</li>				
			</ul>
		</div>
	</div>
</script>
<script type="text/javascript">
	
    function fullScreen(){
        var docElm = document.documentElement;
        if (docElm.requestFullscreen) {
            docElm.requestFullscreen();
        }
        else if (docElm.mozRequestFullScreen) {
            docElm.mozRequestFullScreen();
        }
        else if (docElm.webkitRequestFullScreen) {
            docElm.webkitRequestFullScreen();
        }
        $('.exitfullscreen').show();
        $('.fullscreen').hide();
    }
    function exitFullScreen(){
        var docElm = document.documentElement;
        if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        $('.exitfullscreen').hide();
        $('.fullscreen').show();
    }
</script>
<script id="multiTaskList-row-template" type="text/x-kendo-template">
    <li>
    	<a href="\#/#=url#">
    		#=name#
    		<span title="Remove" class="multiTaskList glyphicons remove_2 pull-right" data-bind="click: removeLink">
    			<i></i>
    		</span>
    	</a>

    </li>	
</script>
<script type="text/x-kendo-template" id="index">
	
	<!-- <a href="#/sale_center"><h1>WELCOME</h1></a> -->
	<div class="container" >
		<div class="row home" >
			<div class="span12">
				<div class="row">
					<div class="span6 nopadding-right">
						<a href="#/sale_center">
							<div class="bg-green height250 top-left" style="background: #fff; color: #0eac00; box-shadow: none; box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);">
								<div class="img">
									<img src="<?php echo base_url();?>assets/spa/sale-01.png" >
								</div>
								<p class="textBig">Sale Module</p>
							</div>
						</a>
					</div>
					<div class="span6" >
						<div class="row">						
							<div class="span6 paddingLeftRigth">
								<a href="rrd/#/item_center">
									<div class="bg-green height250">
										<div class="img">
											<img src="<?php echo base_url();?>assets/spa/icon/session.png" >
										</div>
										<p class="textSmall">Outlet</p>
									</div>
								</a>
							</div>							
							
							<div class="span6 nopadding-left">
								<a href="rrd/#/inventory_position_summary">
									<div class="bg-green height250 top-rigth">
										<div class="img">
											<img src="<?php echo base_url();?>assets/spa/icon/book.png" >
										</div>
										<p class="textSmall">Inventory</p>
									</div>
								</a>
							</div>						
						</div>
					</div>
				</div>
			</div>

			<div class="span12">
				<div class="row paddingTopBottom">
					<a href="admin#employeelist">
						<div class="span6 nopadding-right">
							<div class="bg-green height250">
								<div class="img">
									<img src="<?php echo base_url();?>assets/spa/icon/serving.png" >
								</div>
								<p class="textBig">Employee</p>
							</div>
						</div>
					</a>
					<a href="#/customer_report_center">
						<div class="span6 paddingLeft">
							<div class="bg-green height250 bottom-rigth" >
								<div class="img">
									<img src="<?php echo base_url();?>assets/spa/icon/report.png">
								</div>
								<p class="textBig">Sale Management Reports</p>
							</div>
						</div>
					</a>
				</div>
			</div>

			<!-- <div class="span12">
				<div class="row">
					<div class="span6" >
						<div class="row">
							<div class="span4 nopadding-right">
								<div class="bg-green height100 bottom-left">
									<div class="img">
										<img src="<?php echo base_url();?>assets/spa/icon/customers.png" >
									</div>
									<p>Customer</p>
								</div>
							</div>
							<div class="span4 paddingLeftRigth">
								<div class="bg-green height100">
									<div class="img">
										<img src="<?php echo base_url();?>assets/spa/icon/rooms-facilities.png" >
									</div>
									<p>Rooms/ facilities</p>
								</div>
							</div>
							<div class="span4 no-padding">
								<div class="bg-green height100">
									<div class="img">
										<img src="<?php echo base_url();?>assets/spa/icon/serving.png" >
									</div>
									<p>Therapist</p>
								</div>
							</div>
						</div>
					</div>
					<div class="span6 paddingLeft">
						<div class="bg-green height100 bottom-rigth" >							
							<div class="img">
								<img src="<?php echo base_url();?>assets/spa/icon/report.png">
							</div>
							<p style="margin-bottom: 0; font-size: 40px; padding: 20px 0 0;  width: 50%; float: left; text-align: left; ">Reports</p>
						</div>
					</div>
				</div>
			</div> -->

			<div class="span12" style="margin-top: 20px;">
				<p data-bind="text: today"></span>
			</div>
		</div>
	</div>
	
	<div class="row-fluid">
		<div class="fixed-bottom">
			<p>&copy; <?php echo date('Y'); ?><span data-bind="text: lang.lang.all_rights_reserved"></span></p>
		</div>	
	</div>		
</script>
<!-- ADVANCE SEARCH -->
<script id="searchAdvanced" type="text/x-kendo-template">
    <div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" onclick="javascript:window.history.back()"><i></i></span>						
					</div>
			        
			        <h2>SEARCH</h2>
				    
				    <br>	
				    
				    <!-- Result -->
				    <span class="results"><span data-format="n0" data-bind="text: found"></span> result found <i class="icon-circle-arrow-down"></i></span>
					
					<div data-role="listview"
						 data-auto-bind="false"
						 data-selectable="true"				                 
		                 data-template="searchAdvanced-contact-template"
		                 data-bind="source: contactDS"></div>
		            <div data-role="listview"
						 data-auto-bind="false"
						 data-selectable="true"				                 
		                 data-template="searchAdvanced-transaction-template"
		                 data-bind="source: transactionDS"></div>
		            <div data-role="listview"
						 data-auto-bind="false"
						 data-selectable="true"				                 
		                 data-template="searchAdvanced-item-template"
		                 data-bind="source: itemDS"></div>
		            <div data-role="listview"
						 data-auto-bind="false"
						 data-selectable="true"				                 
		                 data-template="searchAdvanced-account-template"
		                 data-bind="source: accountDS"></div>					
					<!-- End Result -->

				</div>							
			</div>
		</div>
	</div>
</script>
<script id="searchAdvanced-contact-template" type="text/x-kendo-template">
	<dl data-bind="click: selectedContact">			
		<dt>
			<div class="widget widget-heading-simple widget-body-multiple widget-offers">
				<div class="widget-body">
					
					<!-- Media item -->
					<div class="media">
						<img class="media-object pull-left thumb hidden-tablet hidden-phone" 
							src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/contact.ico" 
							style="width: 100px; height: 100px;">
						<div class="media-body">
							<h5>#=surname# #=name#</h5>							
							<span>#=abbr# #=number#</span>							
							<br>
							<span>#=company#</span>
							<br>
							<span>#=contact_type#</span>
														
						</div>
					</div>
					<!-- // Media item END -->
						
				</div>
			</div>
		</dt>											
	</dl>	
</script>
<script id="searchAdvanced-transaction-template" type="text/x-kendo-template">
	<dl data-bind="click: selectedTransaction">			
		<dt>
			<div class="widget widget-heading-simple widget-body-multiple widget-offers">
				<div class="widget-body">
					
					<!-- Media item -->
					<div class="media">
						<img class="media-object pull-left thumb hidden-tablet hidden-phone" 
							src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/transaction.ico" 
							style="width: 100px; height: 100px;">
						<div class="media-body">
							<h5>#=number#</h5>
							<span>#=amount#</span>
							<br>
							<span>#=issued_date#</span>					
						</div>
					</div>
					<!-- // Media item END -->
						
				</div>
			</div>
		</dt>											
	</dl>	
</script>
<script id="searchAdvanced-item-template" type="text/x-kendo-template">
	<dl data-bind="click: selectedItem">			
		<dt>
			<div class="widget widget-heading-simple widget-body-multiple widget-offers">
				<div class="widget-body">
					
					<!-- Media item -->
					<div class="media">
						<img class="media-object pull-left thumb hidden-tablet hidden-phone" 
							src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/item.ico" 
							style="width: 100px; height: 100px;">
						<div class="media-body">
							<h5>#=name#</h5>
							<span>#=number#</span>
							<br>
							<span>#=on_hand#</span>					
						</div>
					</div>
					<!-- // Media item END -->
						
				</div>
			</div>
		</dt>											
	</dl>	
</script>
<script id="searchAdvanced-account-template" type="text/x-kendo-template">
	<dl data-bind="click: selectedAccount">			
		<dt>
			<div class="widget widget-heading-simple widget-body-multiple widget-offers">
				<div class="widget-body">
					
					<!-- Media item -->
					<div class="media">
						<img class="media-object pull-left thumb hidden-tablet hidden-phone" 
							src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/journal.ico" 
							style="width: 100px; height: 100px;">
						<div class="media-body">
							<h5>#=name#</h5>
							<span>#=number#</span>				
						</div>
					</div>
					<!-- // Media item END -->
						
				</div>
			</div>
		</dt>											
	</dl>	
</script>


<script id="saleCenter" type="text/x-kendo-template">	
	<div class="widget widget-heading-simple widget-body-gray widget-employees">
		<div class="widget-body padding-none">			
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" >
					<div class="innerAll">							
						<form autocomplete="off" class="form-inline">
							
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" placeholder="Number or Name..." data-bind="value: searchText">
								</div>
							</div>						
							<div class="select2-container" style="width: 100%;  margin-bottom: 10px;">
								<input data-role="dropdownlist"
					                   data-option-label="Select Type..."
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: contact_type_id,
					                              source: contactTypeDS"
					                   style="width: 100%;" />
							</div>
						</form>					
					</div>
					
					<span class="results"><span data-bind="text: contactDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>

					<div class="table table-condensed" style="height: 580px;"						 
						 data-role="grid"
						 data-auto-bind="true"
						 data-bind="source: contactDS"
						 data-row-template="saleCenter-customer-list-tmpl"
						 data-columns="[{title: ''}]"
						 data-selectable=true
						 data-height="600"						 
						 data-scrollable="{virtual: true}"></div>									
				</div>
				<div class="span9 detailsWrapper">
					<div class="row-fluid">					
						<div class="span6">
							<div class="widget widget-4 widget-tabs-icons-only margin-bottom-none">

							    <!-- Widget Heading -->
							    <div class="widget-head">

							        <!-- Tabs -->
							        <ul class="pull-right">
							        	<li style="font-size: large; color: black; font-weight: bold;">							            	
							            	<span data-bind="text: obj.name"></span>
							            </li>
							            <li class="glyphicons text_bigger active"><span data-toggle="tab" data-target="#tab1-4"><i></i></span>
							            </li>							            							            
							            <li class="glyphicons circle_info"><span data-toggle="tab" data-target="#tab2-4"><i></i></span>
							            </li>							            
							            <li class="glyphicons pen"><span data-toggle="tab" data-target="#tab3-4"><i></i></span>
							            </li>
							            <li class="glyphicons paperclip"><span data-toggle="tab" data-target="#tab4-4"><i></i></span>
							            </li>							            							            
							        </ul>
							        <div class="clearfix"></div>
							        <!-- // Tabs END -->

							    </div>
							    <!-- Widget Heading END -->

							    <div class="widget-body">
							        <div class="tab-content">

							            <!-- Transactions Tab content -->
							            <div id="tab1-4" class="tab-pane active box-generic">
							            	<table class="table table-borderless table-condensed cart_total cash-table">
								            	<tr>
								            		<td width="50%">
								            			<span class="btn btn-block btn-inverse" data-bind="click: goQuote"><span><span data-bind="text: lang.lang.quote"></span></span>
								            		</td>
								            		<td width="50%">
								            			<span class="btn btn-block btn-inverse" data-bind="click: goSaleOrder"><span><span data-bind="text: lang.lang.sale_order"></span></span>								            			
								            		</td>
								            	</tr>
								            	<tr>
								            		<td width="50%">
								            			<span class="btn btn-block btn-inverse" data-bind="click: goDeposit"><span><span data-bind="text: lang.lang.c_deposit"></span></span>
								            		</td>
								            		<td width="50%">
								            			<span class="btn btn-block btn-inverse" data-bind="click: goCashSale"><span><span data-bind="text: lang.lang.cash_sale"></span></span>								            											            			
								            		</td>
								            	</tr>
							            	</table>
							            </div>
							            <!-- // Transactions Tab content END -->							           					            

							            <!-- INFO Tab content -->
							            <div id="tab2-4" class="tab-pane box-generic">
							            	<div class="row-fluid">
							            		<div class="accounCetner-textedit">
									            	<table width="100%">
														<tr>
															<td width="40%"><span data-bind="text: lang.lang.customer_type"></span></td>
															<td width="60%">
																<span class="strong" data-bind="text: obj.contact_type"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.number"></span></td>
															<td>
																<span class="strong" data-bind="text: obj.abbr"></span>
																<span class="strong" data-bind="text: obj.number"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.name"></span></td>
															<td>
																<span data-bind="text: obj.name"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.billed_address"></span></td>
															<td>
																<span data-bind="text: obj.address"></span>
															</td>
														</tr>								
														<tr>
															<td><span data-bind="text: lang.lang.phone"></span></td>
															<td>
																<span data-bind="text: obj.phone"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.currency"></span></td>
															<td>										
																<span data-bind="text: currencyCode"></span>
															</td>
														</tr>
													</table>

													<span class="btn btn-primary btn-icon glyphicons edit pull-right" data-bind="click: goEdit"><i></i><span data-bind="text: lang.lang.view_edit_profile"></span></span>
												</div>
											</div>
							            </div>
							            <!-- // INFO Tab content END -->

							            <!-- NOTE Tab content -->
							            <div id="tab3-4" class="tab-pane">

										    <div>
												<input type="text" class="k-textbox" 
														data-bind="value: note" 
														placeholder="Add memo ..." 
														style="width: 366px;" />
												<span class="btn btn-primary" data-bind="click: saveNote"><span data-bind="text: lang.lang.add"></span></span>
											</div>

											<br>

											<div class="table table-condensed" style="height: 100;"						 
												 data-role="grid"
												 data-auto-bind="false"						 
												 data-bind="source: noteDS"
												 data-row-template="saleCenter-note-tmpl"
												 data-columns="[{title: ''}]"
												 data-height="100"						 
												 data-scrollable="{virtual: true}"></div>
											
							            </div>
							            <!-- // NOTE Tab content END -->

							            <!-- Attach Tab content -->
								        <div id="tab4-4" class="tab-pane">							            	
								            <p><span data-bind="text: lang.lang.file_type"></span> [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>
								            <input id="files" name="files"
							                   type="file"
							                   data-role="upload"
							                   data-show-file-list="false"
							                   data-bind="events: { 
					                   				select: onSelect
							                   }">

								            <table class="table table-bordered">
										        <thead>
										            <tr>			                
										                <th><span data-bind="text: lang.lang.file_name"></span></th>
										                <th><span data-bind="text: lang.lang.description"></span></th>
										                <th><span data-bind="text: lang.lang.date"></span></th>
										                <th style="width: 13%;"></th>                			                
										            </tr> 
										        </thead>
										        <tbody data-role="listview" 
										        		data-template="attachment-list-tmpl" 
										        		data-auto-bind="false"
										        		data-bind="source: attachmentDS"></tbody>			        
										    </table>

										    <span class="btn btn-icon btn-success glyphicons ok_2" data-bind="click: uploadFile" style="color: #fff; padding: 5px 38px; text-align: left; width: 98px !important; display: inline-block; margin-top: 10px;"><i></i> <span data-bind="text: lang.lang.save"></span></span>

								        </div>
								        <!-- // Attach Tab content END -->							            								            

							        </div>
							    </div>
							</div>
						</div>

						<div class="span6" style="margin-bottom: 10px;">
							<div class="row-fluid">
								<div class="span6">
									<div class="widget-stats widget-stats-primary widget-stats-5" data-bind="click: loadSaleOrder">
										<span class="glyphicons shopping_cart"><i></i></span>
										<span class="txt"><span data-bind="text: lang.lang.sale_order"></span><span data-bind="text: objSmr.sale_order_count" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-inverse widget-stats-5" data-bind="click: loadSale">
										<span class="glyphicons cart_in"><i></i></span>
										<span class="txt"><span data-bind="text: lang.lang.sale"></span><span data-bind="text: objSmr.sale_count" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div>
						<input data-role="dropdownlist"
							   class="sorter"                  
					           data-value-primitive="true"
					           data-text-field="text"
					           data-value-field="value"
					           data-bind="value: sorter,
					                      source: sortList,                              
					                      events: { change: sorterChanges }" />

						<input data-role="datepicker"
							   class="sdate"
							   data-format="dd-MM-yyyy"
					           data-bind="value: sdate,
					           			  max: edate"
					           placeholder="From ..." >

					    <input data-role="datepicker"
					    	   class="edate"
					    	   data-format="dd-MM-yyyy"
					           data-bind="value: edate,
					                      min: sdate"
					           placeholder="To ..." >

					  	<button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
					</div>

					<table class="table table-bordered table-striped table-white">
						<thead>
							<tr>
								<th><span data-bind="text: lang.lang.date"></span></th>
								<th><span data-bind="text: lang.lang.type"></span></th>								
								<th><span data-bind="text: lang.lang.reference_no"></span></th>
								<th><span data-bind="text: lang.lang.amount"></span></th>
								<th><span data-bind="text: lang.lang.status"></span></th>
								<th><span data-bind="text: lang.lang.action"></span></th>
							</tr>
						</thead>
	            		<tbody data-role="listview"
	            				data-auto-bind="false"
				                data-template="saleCenter-transaction-tmpl"
				                data-bind="source: transactionDS" >
				        </tbody>
	            	</table>

	            	<div id="pager" class="k-pager-wrap"
	            		 data-role="pager"
				    	 data-auto-bind="false"
			             data-bind="source: transactionDS"></div>
				</div>
			</div>			
		</div>
	</div>
</script>
<script id="saleCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>    	  	
    	<td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
    	<td>#=type#</td>
        <!-- Reference -->
        <td>
        	#if(type=="Customer_Deposit" && amount<0){#			
				<a data-bind="click: goReference">#=number#</a>			
			#}else{#
				<a href="\#/#=type.toLowerCase()#/#=id#"><i></i> #=number#</a>
			#}#        	
        </td>
        <!-- Amount -->
    	<td class="right">
    		#if(type=="GDN"){#
    			#=kendo.toString(amount, "n0")#
    		#}else if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice" || type=="Commercial_Cash_Sale" || type=="Vat_Cash_Sale" || type=="Cash_Sale"){#
    			#=kendo.toString(amount-deposit, locale=="km-KH"?"c0":"c", locale)#
    		#}else{#
    			#=kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
    		#}#
    	</td>
    	<!-- Status -->
    	<td align="center">
    		#if(status=="4") {#
    			#=progress#
    		#}#

    		#if(type=="Quote"){#       		
				#if(status=="0"){#
        			Open      			
        		#}#
        	#}else if(type=="Sale_Order"){#
        		#if(status=="0"){#
        			Open
        		#}else{#
        			Done        			
        		#}#
        	#}else if(type=="GDN"){#
        		Delivered
        	#}else if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice"){#
        		#if(status=="0" || status=="2") {#
        			# var date = new Date(), dueDate = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
					#if(dueDate < toDay) {#
						Over Due #:Math.floor((toDay - dueDate)/(1000*60*60*24))# days
					#} else {#
						#:Math.floor((dueDate - toDay)/(1000*60*60*24))# days to pay
					#}#
				#} else if(status=="1") {#
					Paid
				#} else if(status=="3") {#
					Returned
				#}#        	
        	#}#        				
		</td>
		<!-- Actions -->
    	<td align="center">
			#if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice"){#
				#if(status=="0" || status=="2") {#
        			<a data-bind="click: payInvoice"><i></i> <span data-bind="text: lang.lang.receive_payment"></span></a>
        		#}#
        	#}#

        	#if(status=="4") {#
				<a href="\#/#=type.toLowerCase()#/#=id#"><i></i> Use</a>
    		#}#
		</td>     	
    </tr>
</script>
<script id="saleCenter-customer-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td>
			<div class="media-body strong">				
				<span>#=abbr##=number#</span>
				<span>#=name#</span>
			</div>
		</td>
	</tr>
</script>
<script id="saleCenter-note-tmpl" type="text/x-kendo-template">
	<tr>
		<td>			
			<blockquote>
				<small class="author">
					<span class="strong">#=creator#</span> :
					<cite>#=kendo.toString(new Date(noted_date), "g")#</cite>
				</small>					
				<p>#=note#</p>
			</blockquote>				
		</td>
	</tr>	
</script>
<script id="customer" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
			    
			    	<span class="glyphicons no-js remove_2 pull-right" 
	    				onclick="javascript:window.history.back()"
						data-bind="click: cancel"><i></i></span>						
					
			        <h2 span data-bind="text: lang.lang.customers"></h2>			    		   

				    <br>

				    <!-- Top Part -->
			    	<div class="row-fluid">
			    		<div class="span6 well">									
							<div class="row">
								<div class="span6">														
									<!-- Group -->
									<div class="control-group">										
										<label for="ddlContactType"><span data-bind="text: lang.lang.customer_type"></span> <span style="color:red">*</span></label>
										<input id="ddlContactType" name="ddlContactType"
												   data-role="dropdownlist"
												   data-header-template="customer-type-header-tmpl"       
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.contact_type_id,
								                   			  disabled: obj.is_pattern,
								                              source: contactTypeDS,
								                              events:{change: typeChanges}"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />																				            
									</div>
									<!-- // Group END -->
								</div>

								<div class="span6" style="padding-right: 0;">	
									<!-- Group -->
									<div class="control-group">							
										<label for="txtAbbr"><span data-bind="text: lang.lang.number"></span> <span style="color:red">*</span></label>										
				              			<br>
				              			<input id="txtAbbr" name="txtAbbr" class="k-textbox"
					              				data-bind="value: obj.abbr, 
					              						   disabled: obj.is_pattern" 
					              				placeholder="eg. AB" required data-required-msg="required"
					              				style="width: 55px;" />
					              		-					              		
					              		<input id="txtNumber" name="txtNumber"
					              			   class="k-textbox"					              			   					                   
							                   data-bind="value: obj.number, 
							                   			  disabled: obj.is_pattern,
							                   			  events:{change:checkExistingNumber}"
							                   placeholder="eg. 001" required data-required-msg="required"
							                   style="width: 143px;" />
									</div>
									<!-- // Group END -->											
								</div>
							</div>
							
							<div class="row">
								<div class="span12">	
									<!-- Group -->
									<div class="control-group">								
										<label for="fullname"><span data-bind="text: lang.lang.full_name"></span> <span style="color:red">*</span></label>
							            <input id="fullname" name="fullname" class="k-textbox" 
							            		data-bind="value: obj.name, 
							            					disabled: obj.is_pattern,
							            					attr: { placeholder: phFullname }" 
							              		required data-required-msg="required"
							              		style="width: 100%;" />
									</div>																		
									<!-- // Group END -->
								</div>
							</div>

							<div class="row">
								<div class="span6">	
									<!-- Group -->
									<div class="control-group">								
										<label for="customerStatus"><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></label>
							            <input id="customerStatus" name="customerStatus" 
							              				data-role="dropdownlist"
									            		data-text-field="name"
						           						data-value-field="id"
						           						data-value-primitive="true" 
									            		data-bind="source: statusList, value: obj.status"
									            		data-option-label="(--- Select ---)"
									            		required data-required-msg="required" style="width: 100%;" />
									</div>																		
									<!-- // Group END -->
								</div>

								<div class="span6">	
									<!-- Group -->
									<div class="control-group">								
										<label for="registeredDate"><span data-bind="text: lang.lang.register_date"></span> <span style="color:red">*</span></label>
							            <input id="registeredDate" name="registeredDate" 
								            		data-role="datepicker"			            		
					            					data-bind="value: obj.registered_date, disabled: obj.is_pattern" 
					            					data-format="dd-MM-yyyy"
					            					data-parse-formats="yyyy-MM-dd" 
					            					placeholder="dd-MM-yyyy" required data-required-msg="required" style="width: 100%;" />
									</div>																		
									<!-- // Group END -->
								</div>
							</div>																					
						</div>
						<div class="span6">
							<div class="row-fluid">	
								<!-- Map -->
								<div id="map" class="span12" style="height: 130px;"></div>
							</div>

							<div class="separator line bottom"></div>

							<div class="row-fluid">	
								<div class="span6">									
									<!-- Group -->
									<div class="control-group">
						    			<label for="latitute"><span data-bind="text: lang.lang.latitute"></span> </label>
										<div class="input-prepend">
											<span class="add-on glyphicons direction"><i></i></span>
											<input type="text" class="input-large span12" data-bind="value: obj.latitute, events:{change: loadMap}" placeholder="012345.67897">
										</div>
									</div>									
									<!-- // Group END -->
								</div>	
								
								<div class="span6">	
									<!-- Group -->
									<div class="control-group">
						    			<label for="longtitute"><span data-bind="text: lang.lang.longtitute"></span> </label>
						    			<div class="input-prepend">
											<span class="add-on glyphicons google_maps"><i></i></span>
											<input type="text" class="input-large span12" data-bind="value: obj.longtitute, events:{change: loadMap}" placeholder="012345.67897">
										</div>										
									</div>
									<!-- // Group END -->
								</div>										
							</div>
						</div>
					</div>								
							
					<!-- // Bottom Tabs -->
					<div class="row-fluid">								
						<div class="box-generic">
						    <!-- //Tabs Heading -->
						    <div class="tabsbar tabsbar-1">
						        <ul class="row-fluid row-merge">						            
						            <li class="span2 glyphicons nameplate_alt active">
						            	<a href="#tab1" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.info"></span></span></a>
						            </li>								            
						            <li class="span2 glyphicons usd">
						            	<a href="#tab2" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.account"></span></span></a>
						            </li>
						            <li class="span2 glyphicons parents">
						            	<a href="#tab3" data-toggle="tab"><i></i> <span><span ></span>Contact</span></a>
						            </li>
						            <li class="span2 glyphicons notes">
						            	<a href="#tab4" data-toggle="tab"><i></i> <span>Invoice Note</span></a>
						            </li>						            					            
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">

						    	<!-- //GENERAL INFO -->
						        <div class="tab-pane active" id="tab1">
					            	<table class="table table-borderless table-condensed cart_total">					            		
							            <tr>
							                <td><span data-bind="text: lang.lang.vat_no"></span></td>
							              	<td>
					            				<input class="k-textbox" data-bind="value: obj.vat_no" 
													placeholder="e.g. 01234567897" style="width: 100%;" />									
							              	</td>							              	
							            	<td><span data-bind="text: lang.lang.phone"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.phone" placeholder="e.g. 012 333 444" style="width: 100%;" /></td>
							            </tr>
							            <tr>
							            	<td><span data-bind="text: lang.lang.country"></span></td>
							              	<td>
							              		<input data-role="dropdownlist"
							              			   data-option-label="(--- Select ---)"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: obj.country_id,
									                              source: countryDS" style="width: 100%;" />
							              	</td>							            								              	
							            	<td><span data-bind="text: lang.lang.email"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.email" placeholder="e.g. me@email.com" style="width: 100%;" />							            	
							            </tr>
							            <tr>
							            	<td><span data-bind="text: lang.lang.city"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.city" placeholder="city name ..." style="width: 100%;" /></td>							              	
							            	<td><span data-bind="text: lang.lang.post_code"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.post_code" placeholder="e.g. 12345" style="width: 100%;" /></td>
							            </tr>							            
							            <tr style="vertical-align: top;">
							            	<td><span data-bind="text: lang.lang.address"></span></td>
							              	<td><textarea class="k-textbox" data-bind="value: obj.address" placeholder="where you live ..." style="width: 100%;" /></textarea></td>									            								              	
							            	<td><span data-bind="text: lang.lang.memo"></span></td>
							              	<td><textarea rows="2" class="k-textbox" data-bind="value: obj.memo" placeholder="memo ..." style="width: 100%;" ></textarea></td>							              	
							            </tr>									            
							            <tr  style="vertical-align: top;">
							            	<td>
							            		<span for="txtBillTo" data-bind="click: copyBillTo"><span data-bind="text: lang.lang.bill_to"></span> </span>											            
							            	</td>
							            	<td>
							            		<textarea rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="billed to ..."></textarea>
							            	</td>
							            	<td><span data-bind="text: lang.lang.delivered_to"></span></td>
							            	<td>
							            		<textarea rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="delivered to ..."></textarea>
							            	</td>
							            </tr>							            							            							            								            								            			            
							        </table>
					        	</div>
						        <!-- //GENERAL INFO END -->

						        <!-- //ACCOUNTING -->
						        <div class="tab-pane" id="tab2">
						        	
						        	<div class="row-fluid">								        		
						            	<div class="span3">
											<label for="ddlAR"><span data-bind="text: lang.lang.account_receiveable"></span> <span style="color:red">*</span></label>
											<input id="ddlAR" name="ddlAR"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"      
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.account_id,
								                              source: arDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />													
										</div>
										<div class="span3">
											<label for="ddlRA"><span data-bind="text: lang.lang.revenue_account"></span> <span style="color:red">*</span></label>
											<input id="ddlRA" name="ddlRA"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl" 
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.ra_id,
								                              source: raDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />													
										</div>
										<div class="span3">
											<label for="ddlDepositAccount"><span data-bind="text: lang.lang.deposit_account"></span> <span style="color:red">*</span></label>
											<input id="ddlDepositAccount" name="ddlDepositAccount"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"      
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.deposit_account_id,
								                              source: depositDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />													
										</div>
										<div class="span3">
											<label for="ddlTradeDiscount"><span data-bind="text: lang.lang.trade_discount"></span> <span style="color:red">*</span></label>
											<input id="ddlTradeDiscount" name="ddlTradeDiscount"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"      
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.trade_discount_id,
								                              source: tradeDiscountDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />														
										</div>												
							        </div>

							        <div class="separator line bottom"></div>

							        <div class="row-fluid">
						        		<div class="span3">						
								            <label for="currency"><span data-bind="text: lang.lang.currency"></span> <span style="color:red">*</span></label>
								            <input id="currency" name="currency" 
								            	data-role="dropdownlist"
								            	data-template="currency-list-tmpl"
								            	data-value-primitive="true"
								                data-text-field="code"
								                data-value-field="locale"
												data-bind="value: obj.locale,
															disabled: isProtected, 
															source: currencyDS"
												data-option-label="(--- Select ---)" 
												required data-required-msg="required" style="width: 100%;" />
								        </div>
						            	<div class="span3">
											<label for="ddlPaymentTerm"><span data-bind="text: lang.lang.payment_term"></span></label>
											<input id="ddlPaymentTerm" name="ddlPaymentTerm"
												data-header-template="customer-term-header-tmpl"
												data-role="dropdownlist"
								            	data-value-primitive="true"
								                data-text-field="name"
								                data-value-field="id"
												data-bind="value: obj.payment_term_id, source: paymentTermDS" 
												data-option-label="(--- Select ---)"
												style="width: 100%;" />
										</div>
										<div class="span3">
											<label for="ddlPaymentMethod"><span data-bind="text: lang.lang.payment_method"></span></label>
											<input id="ddlPaymentMethod" name="ddlPaymentMethod"
												data-header-template="customer-payment-method-header-tmpl"
												data-role="dropdownlist"
								            	data-value-primitive="true"
								                data-text-field="name"
								                data-value-field="id"
												data-bind="value: obj.payment_method_id, source: paymentMethodDS"
												data-option-label="(--- Select ---)" 
												style="width: 100%;" />
										</div>
										<div class="span3">
											<label for="ddlSettlementDiscount"><span data-bind="text: lang.lang.settlement_discount"></span> <span style="color:red">*</span></label>
											<input id="ddlSettlementDiscount" name="ddlSettlementDiscount"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"      
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.settlement_discount_id,
								                              source: settlementDiscountDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />														
										</div>												
							        </div>

							        <div class="separator line bottom"></div>

							        <div class="row-fluid">
							        	<div class="span3">
											<label for="ddlTaxItem"><span data-bind="text: lang.lang.tax"></span></label>
											<input id="ddlTaxItem" name="ddlTaxItem"
												   data-role="dropdownlist"								
												   data-header-template="tax-header-tmpl"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.tax_item_id,
								                              source: taxItemDS"
								                   data-option-label="(--- Select ---)"
								                   style="width: 100%;" />
										</div>	
								        <div class="span3">
											<label for="txtCreditLimit"><span data-bind="text: lang.lang.credit_limit"></span> </label>								              		
								            <input data-role="numerictextbox"
								                   data-format="n"
								                   data-min="0"										                   
								                   data-bind="value: obj.credit_limit"										                  
								                   style="width: 100%;">
										</div>																							
									</div>
					        	</div>
						        <!-- //ACCOUNTING END -->						       

						        <!-- //CONTACT PERSON -->
						        <div class="tab-pane" id="tab3">
						        	<span style="margin-bottom: 15px;" class="btn btn-primary btn-icon glyphicons circle_plus" data-bind="click: addEmptyContactPerson"><i></i><span data-bind="text: lang.lang.new_contact_person"></span></span>

						        	<table class="table table-bordered table-white">
								        <thead>
								            <tr>
								                <th><span data-bind="text: lang.lang.name"></span></th>
								                <th><span data-bind="text: lang.lang.department"></span></th>						                
								                <th><span data-bind="text: lang.lang.phone"></span></th>
								                <th><span data-bind="text: lang.lang.email"></span></th>
								                <th width="20px"></th>										               
								            </tr>
								        </thead>
								        <tbody data-role="listview"										        		
								        		data-auto-bind="false"										        						        		 
								        		data-template="contact-person-row-tmpl" 
								        		data-bind="source: contactPersonDS">
								        </tbody>										        						        
								    </table>
					        	</div>
						        <!-- //CONTACT PERSON END -->

						        <!-- //INVOICE NOTE -->
						        <div class="tab-pane" id="tab4">
						        	<textarea data-role="editor"
					                      data-tools="['bold',
					                                   'italic',
					                                   'underline',
					                                   'strikethrough',
					                                   'justifyLeft',
					                                   'justifyCenter',
					                                   'justifyRight',
					                                   'justifyFull']"
					                      data-bind="value: obj.invoice_note"
					                      style="height: 200px;"></textarea>
					        	</div>
						        <!-- //INVOICE NOTE END -->

						    </div>
						</div>
					</div>

					<br>											
					
					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>

						<!-- Delete Confirmation -->
						<div data-role="window"
			                 data-title="Delete Confirmation"
			                 data-width="350"
			                 data-height="200"
			                 data-iframe="true"
			                 data-modal="true"
			                 data-visible="false"
			                 data-position="{top:'40%',left:'35%'}"
			                 data-actions="{}"
			                 data-resizable="false"
			                 data-bind="visible: showConfirm"
			                 style="text-align:center;">
			                <p style="font-size:25px; margin: 15px 0 25px;" class="delete-message" data-bind="text: confirmMessage"></p>
						    <button style="font-size:14px; border:none; background:#496cad; color:#fff; padding:5px 25px;" data-bind="click:delete">Yes</button> 
						    <button style="font-size:14px; border:none; background:red; color:#fff; padding:5px 25px;" data-bind="click:closeConfirm">No</button>
			            </div>
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span4" style="padding-left: 15px;"><a style="color: #fff; float: left;">Print Preview</a></div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<!-- <li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li> -->
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft"><span data-bind="text: lang.lang.save_draft"></span></span>
								<!-- <span class="btn-btn" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_close"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_print"></span></span> -->
							</div>
						</div>
					</div>
					<!-- // Form actions END -->

				</div>
			</div>
		</div>
	</div>
</script>
<script id="contact-person-row-tmpl" type="text/x-kendo-tmpl">
	<tr>		
		<td>
			<input id="name" name="name" 
					type="text" class="k-textbox" 
					data-bind="value: name"
					placeholder="eg: Mr. John" 
					required="required" validationMessage="required" style="width: 190px;" />
            <span data-for="name" class="k-invalid-msg"></span>
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value: department" placeholder="eg: Accounting" style="width: 190px;" />
		</td>		
		<td>
			<input type="text" class="k-textbox" data-bind="value: phone" placeholder="eg: 012 333 444" style="width: 190px;" />
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value: email" placeholder="eg: john@email.com" style="width: 190px;" />
		</td>		
		<td align="center">            
			<span class="glyphicons no-js delete" data-bind="click: deleteContactPerson"><i></i></span>									
		</td>		
	</tr>
</script>
<!-- FUNCTIONS -->
<script id="sale" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">
					<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>

					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head widget-custome" style="background: #203864 !important;">
									<ul>
										<li class="active"><a  class="glyphicons search" href="#tab-1" data-toggle="tab"><i></i>Search</a></li>
										<li><a  class="glyphicons cargo" href="#tab-2" data-toggle="tab"><i></i>Category</a></li>
										<li><a  class="glyphicons heart" data-toggle="tab" data-bind="click: favorite"><i></i>Favorite</a></li>
									</ul>
									<div style="float: right;">
										<span style="position: relative; height: 35px; line-height: 35px; padding-right: 15px; float: left; display: block; ">
											<a style="color: #fff; margin-top: 4px; line-height: 17px;" class="glyphicons shopping_cart" href="#/quote" >
												<i></i><span class="badge fix badge-primary" style="color: #fff; position: absolute; left: -8px; top: -9px; background: red;" data-bind="text: quoteLineDS.total()"></span>
												Quote												
											</a>
										</span>
										<sapn style="position: relative; height: 35px; line-height: 35px; padding-left: 15px; float: left; display: block; border-left: 1px solid #efefef;">
											<a style="color: #fff; margin-top: 4px; line-height: 17px;" class="glyphicons cart_in" href="#/sale_order" >
												<i></i><span class="badge fix badge-primary" style="color: #fff; position: absolute; left: -12px; top: -9px; background: red;" data-bind="text: soLineDS.total()"></span>
												Sale Order
											</a>
										</span>
									</div>

									
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <div class="tab-pane active" id="tab-1">
											<input type="text" class="span2 search-query" placeholder="Search" id="search-placeholder" data-bind="value: searchText" style="background-color: #fff; color: #333; border-color: #ddd; height: 33px; width: 192px;">
											<button type="submit" class="btn btn-inverse" data-bind="click: search"><i class="icon-search"></i></button>					
									    </div>
									    <div class="tab-pane" id="tab-2">

									    	<ul data-role="listview"
									    		 data-auto-bind="false"
									    		 data-selectable="true"
								                 data-template="sale-category-template"
								                 data-bind="source: categoryDS,"
								                 style="overflow: auto; padding-top: 15px; padding-left: 15px; padding-bottom: 15px;"></ul>
									    	
									    </div>
									   								        							       
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					</div>

					<div class="row-fluid" id="main-section" style="overflow: hidden;margin-top: 15px;">
						<ul data-role="listview"
							 data-auto-bind="false"
			                 data-template="sale-template"
			                 data-bind="source: dataSource"
			                 style="height: 300px; "></ul>
			        </div>

			        <div id="pager" class="k-pager-wrap"
				    	 data-auto-bind="false"
			             data-role="pager" data-bind="source: dataSource"></div>


			        <!--  Top Up Sale Detail -->
			        <div class="modal fade popRightBlog-saleDetail" id="saleDetail">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-right: 15px; font-size: 35px; color: #000;">×</button>
						<div class="row-fluid sale-detail">
							<div id="details">
				                <a id="navigate-prev" data-bind="click: prevItem"></a>
			                	
			                	<div id="detail-info" style="background: none;">
			                		<img class="main-image" width="200px" data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }" style="border: 1px solid #ddd;">
			                		<div id="description">
										<h1 data-bind="text:obj.name"></h1>
										<p data-bind="text:obj.sale_description"></p>
										<div id="details-total">
											<p id="price-quantity" data-bind="text:obj.item_prices[0].price" style="font-weight: 600;color: #333;background: none; font-size: 30px;padding-left: 0;"></p>												
										</div>
									</div>
								</div>
								<div id="nutrition-info" style="border: 1px solid #ddd;">
									<h2 style="padding-top: 15PX;padding-bottom: 5px;padding-left: 10px;font-size: 20px;font-weight: 600;">Information</h2>
									<dl>
										<dt style="padding-left: 10px;">Categories:</dt>
										<dd data-bind="text:obj.category"></dd>
										<dt style="padding-left: 10px;">UOM</dt>
										<dd data-bind="text:obj.measurement_id"></dd>
										<dt style="padding-left: 10px;">On Hand</dt>
										<dd data-bind="text:on_hand"></dd>
										<dt style="padding-left: 10px;">On SO</dt>
										<dd data-bind="text:on_so"></dd>
										<dt style="padding-left: 10px;">On PO</dt>
										<dd data-bind="text:on_po"></dd>
									</dl>
								</div>

								<a data-bind="click: nextItem" id="navigate-next"></a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="sale-category-template" type="text/x-kendo-tmpl">
    <li class="btn btn-primary" 
    	data-bind="text: name, click: selectedType"
    	style="width: auto !important; text-align: center; padding:5px 10px !important; margin-bottom: 10px;">
    </li>
</script>
<script id="sale-template" type="text/x-kendo-tmpl">	
	<li class="products span2" aria-selected="false" >
	    <a class="view-details" href="\#saleDetail" data-toggle="modal" data-bind="click:loadDetail">
	        <img class="main-image" src="#= image_url!==null ? image_url : banhji.no_image #" alt="#=name#" title="#=name#">
	    </a>
	    <div style=" padding-bottom: 49px;">
	        <strong style="color: \#2B569A;">#=name#</strong>
	        <span style="color: \#2B569A;" class="price"><span>$</span><span data-bind="text: price"></span></span>

		    <div class="add-to-cart row-fluid"> 
		    	<span class="span5" data-bind="click: addQuote" style="background: \#203864; padding: 5px; cursor: pointer; width: 60px; margin-left: 7px; color: \#fff;"> Quote </span>
		    	<span class="span6" data-bind="click: addSO" style="background: \#1b8330; padding: 5px; margin-left: 5px; cursor: pointer; width: 58px; color: \#fff;"> Order </span>
		    </div>
		</div>
	</li>
</script>
<script id="quote" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
				    
			    	<span class="glyphicons no-js remove_2 pull-right"
							data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.quote"></h2>

				    <br>

					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 190px;">				
								<table class="table table-borderless table-condensed cart_total">									
									<tr>
										<td style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></td>
										<td>
											<input id="txtNumber" name="txtNumber" class="k-textbox" 
													data-bind="value: obj.number,
																disabled: obj.is_recurring,
																events:{change:checkExistingNumber}" 
													required data-required-msg="required" 
													placeholder="eg. ABC00001" style="width: 83%; float: left; margin-right: 5px;" />
											<div style="padding-left: 0; width: 25px; float: left;">
												<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 2px 0 0 0 ;"><i></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.date"></span></td>
										<td class="right">
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd HH:mm:ss" 
													data-bind="value: obj.issued_date, 
																events:{ change : setRate }" 
													required data-required-msg="required"
													style="width: 210px;" />
										</td>
									</tr>								
									<tr>
										<td><span data-bind="text: lang.lang.customers"></span></td>
										<td>
											<input id="cbbContact" name="cbbContact"
												   data-role="dropdownlist"
												   data-header-template="contact-header-tmpl"
								                   data-template="contact-list-tmpl"
								                   data-auto-bind="false"
								                   data-value-primitive="false"
								                   data-filter="startswith"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.contact,
								                              source: contactDS,
								                              events: {change: contactChanges}"
								                   data-option-label="Select Customer..."
								                   required data-required-msg="required" style="width: 210px;" />
										</td>
									</tr>																															
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: { backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.amount_quoted"></span></div>
									<h2 data-bind="text: total" align="right"></h2>
								</div>

							</div>						
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab2-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons circle_info"><a href="#tab3-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab4-5" data-toggle="tab"><i></i></a>
							            </li>						            
							            <li class="span1 glyphicons history"><a href="#tab5-5" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.recuring"></span></a>
							            </li>						            								            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-5">						            
							            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">							            
											<tr>
												<td>
													<span data-bind="text: lang.lang.balance"></span> <span data-bind="text: balance"></span>
												</td>										
												<td>
													<span data-bind="text: lang.lang.credit_allowed"></span> <span data-format="n" data-bind="text: obj.credit_allowed"></span>
												</td>
											</tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.validity_date"></span></td>
								            	<td>
								            		<input id="txtDueDate" name="txtDueDate" 
															data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd" 
															data-bind="value: obj.due_date" 
															required data-required-msg="required"
															style="width:100%;" />
								            	</td>
								            </tr>							           
											<tr>							            				
												<td>
								            		<span data-bind="text: lang.lang.refrence"></span>	            						            		
								            	</td>
								            </tr>
								            <tr>
								            	<td>
								            		<span data-bind="text: lang.lang.term"></span>     		
								            	</td>				
												<td>
													<input data-role="dropdownlist"														
								              				data-value-primitive="true"
															data-text-field="name" 
								              				data-value-field="id"	
								              				data-header-template='customer-term-header-tmpl'					              				 
								              				data-bind="value: obj.payment_term_id,
								              							source: paymentTermDS,
								              							events:{ change: setTerm }"
								              				data-option-label="Select Term..." 
								              				style="width: 100%" />
												</td>
											</tr>
							            </table>						            
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Address Tab content -->
							        <div class="tab-pane" id="tab2-5">
							        	<span data-bind="text: lang.lang.billing_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>								
										
										<span data-bind="text: lang.lang.delivery_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>	
												
							        </div>
							        <!-- // Address Tab content END -->

							        <!-- Info Tab content -->
							        <div class="tab-pane" id="tab3-5">
							        	
										<table class="table table-borderless table-condensed cart_total">
											<tr>
												<td><span data-bind="text: lang.lang.segments"></span></td>
												<td>
													<select data-role="multiselect"
														   data-value-primitive="true"
														   data-header-template="segment-header-tmpl"
														   data-item-template="segment-list-tmpl"				    
														   data-value-field="id" 
														   data-text-field="code"
														   data-bind="value: obj.segments, 
														   			source: segmentItemDS,
														   			events:{ change: segmentChanges }"
														   data-placeholder="Add Segment.."				   
														   style="width: 100%" /></select>
												</td>
											</tr>
											<tr>
												<td><span data-bind="text: lang.lang.job"></span></td>
												<td>
													<input id="ddlJob" name="ddlJob"
														   data-role="dropdownlist"
														   data-header-template="job-header-tmpl"
														   data-template="job-list-tmpl"
														   data-auto-bind="false"				                
										                   data-value-primitive="true"		   
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.job_id, 
										                   			source: jobDS"
										                   data-option-label="Select job..." 
										                   style="width: 100%" />										
												</td>
											</tr>											
							            </table>
												
							        </div>
							        <!-- // Info Tab content END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab4-5">
							         	<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>							            	
							            
							            <input id="files" name="files"
						                   type="file"
						                   data-role="upload"
						                   data-show-file-list="false"
						                   data-bind="events: { 
				                   				select: onSelect
						                   }">

							            <table class="table table-bordered">
									        <thead>
									            <tr>			                
									                <th><span data-bind="text: lang.lang.file_name"></span></th>
									                <th><span data-bind="text: lang.lang.description"></span></th>
									                <th><span data-bind="text: lang.lang.date"></span></th>
									                <th style="width: 13%;"></th>                			                
									            </tr> 
									        </thead>
									        <tbody data-role="listview" 
									        		data-template="attachment-list-tmpl" 
									        		data-auto-bind="false"
									        		data-bind="source: attachmentDS"></tbody>			        
									    </table>

							        </div>
							        <!-- // Attach Tab content END -->						        

							        <!-- Recurring Tab content -->
							        <div class="tab-pane" id="tab5-5">
							            <table style="width: 100%" class="table borderless">
							            	<tr align="right">
							            		<td style="border-top: 0;">
							            			<span data-bind="text: lang.lang.name"></span>
							            		</td>
							            		<td style="border-top: 0;">
							            			<input id="txtRecurringName" name="txtRecurringName"
							            					class="k-textbox" 
							            					data-bind="value: obj.recurring_name" 
							            					placeholder="Recurring name.." 
							            					style="width: 43%; " />

							            			<span data-bind="text: lang.lang.start"></span>

									                <input data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd"
															data-bind="value: obj.start_date"
															style="width: 40%; " />
							            		</td>
							            	</tr>
							            	<tr align="right">
							            		<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.every"></span>
								            	</td>
							            		<td style="border-top: 0;">
								            		<input data-role="numerictextbox"
									                   data-format="n0"
									                   data-min="0"								                   
									                   data-bind="value: obj.interval"
									                   style="width: 45%; " />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.frequency,
										                              source: frequencyList,
										                              events: { change: frequencyChanges }"
										                   style="width: 45%;" />
								            	</td>
							            	</tr>
								            <tr align="right">
								            	<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.on"></span>
								            	</td>							            	
								            	<td style="border-top: 0;">

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month,
										                   			  visible: showMonth,
										                              source: monthList"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month_option,
										                   			  visible: showMonthOption,
										                              source: monthOptionList,
										                              events: { change: monthOptionChanges }"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.week,
										                   			  visible: showWeek,
										                              source: weekDayList"										                  
										                   style="width: 45%;" />										            
										        
								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.day,
										                   			  visible: showDay,
										                              source: dayList"										                   
										                   style="width: 45%;" />

								            	</td>
								            </tr>
							            </table>

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" data-bind="visible: obj.isNew" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>
							        </div>
							        <!-- // Recuring Tab content END -->						        								        

							    </div>
							</div>

					    </div>
					</div>

					<!-- Item List -->
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
						        	var rowIndex = banhji.quote.lineDS.indexOf(dataItem)+1;
						        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
						      	}
						    },
		                 	{ field: 'item', title: 'PRODUCTS/SERVICES', editor: itemEditor, template: '#=item.name#', width: '170px' },
                            { field: 'description', title:'DESCRIPTION', width: '250px' },                            
                            {
							    field: 'quantity',
							    title: 'QTY',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            { field: 'measurement', title: 'UOM', editor: measurementEditor, template: '#=measurement.measurement#', width: '80px' },
                            {
							    field: 'price',
							    title: 'PRICE',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
							{
							    field: 'discount',
							    title: 'DISCOUNT VALUE',
							    hidden: true,
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
							{
							    field: 'discount_percentage',
							    title: 'DISCOUNT %',
							    hidden: true,
							    format: '{0:p}',
							    editor: discountEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            { field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' },
                            { field: 'tax_item', title:'TAX', editor: taxForSaleEditor, template: '#=tax_item.name#', width: '90px' }
                         ]"
                         data-auto-bind="false"
		                 data-bind="source: lineDS" ></div>	
									
		            <!-- Bottom part -->
		            <div class="row-fluid">
			
						<!-- Column -->
						<div class="span4">
							<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>												

							<!-- Add New Item -->
							<ul class="topnav addNew">
								<li role="presentation" class="dropdown ">
							  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  			<span data-bind="text: lang.lang.add_new_item"></span>
				    					<span class="caret"></span>
							  		</a>
						  			<ul class="dropdown-menu addNewItem">  				  				
						  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
						  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>						  				
						  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
						  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>  				
						  				 				
						  			</ul>
							  	</li>				
							</ul>
							<!--End Add New Item -->

							<br><br>
							<div class="well">
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
								<br>
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
							</div>
						</div>
						<!-- Column END -->

						<!-- Column -->
						<div class="span4" align="center">
							<div data-bind="visible: isEdit" style="margin-top: 10%;">
								<h2 data-bind="text: statusObj.text" style="text-transform: uppercase;"></h2>
								<p data-bind="text: statusObj.date"></p>
								<a data-bind="text: statusObj.number,
											attr: { href: statusObj.url }"></a>
							</div>
						</div>
						<!-- Column END -->
						
						<!-- Column -->
						<div class="span4">
							<table class="table table-condensed table-striped table-white">
								<tbody>
									<tr>
										<td class="right" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
										<td class="right strong" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_discount"></span></td>
										<td class="right ">
											<span data-format="n" data-bind="text: obj.discount"></span>
	                   					</td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
										<td class="right "><span data-format="n" data-bind="text: obj.tax"></span></td>
									</tr>															
									<tr>
										<td class="right"><h4 span data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
										<td class="right strong"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
									</tr>								
								</tbody>
							</table>
						</div>
						<!-- // Column END -->
						
					</div>	           
					
					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>

						<!-- Delete Confirmation -->
						<div data-role="window"
			                 data-title="Delete Confirmation"
			                 data-width="350"
			                 data-height="200"
			                 data-iframe="true"
			                 data-modal="true"
			                 data-visible="false"
			                 data-position="{top:'40%',left:'35%'}"
			                 data-actions="{}"
			                 data-resizable="false"
			                 data-bind="visible: showConfirm"
			                 style="text-align:center;">
			                <p style="font-size:25px; margin: 15px 0 25px;" class="delete-message" data-bind="text: confirmMessage"></p>
						    <button style="font-size:14px; border:none; background:#496cad; color:#fff; padding:5px 25px;" data-bind="click:delete">Yes</button> 
						    <button style="font-size:14px; border:none; background:red; color:#fff; padding:5px 25px;" data-bind="click:closeConfirm">No</button>
			            </div>
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
					         	
							</div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span>
							</div>
						</div>
					</div>
					<!-- // Form actions END -->								

				</div>							
			</div>
		</div>
	</div>
</script>
<script id="quote-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.quote.lineDS.indexOf(data)+1#
		</td>
		<td>
			<input id="ccbItem" name="ccbItem-#:uid#"
				   data-role="combobox"
				   data-template="item-list-tmpl"
				   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-filter="contains"
                   data-min-length="3"
                   data-bind="value: item_id, 
                   			  source: itemDS,
                   			  events:{ change: itemChanges }"
                   placeholder="Add Item..." 
                   required data-required-msg="required" style="width: 100%" />			
		</td>		
		<td>
			<input id="txtDescription-#:uid#" name="txtDescription-#:uid#" 
					type="text" class="k-textbox" 
					data-bind="value: description"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>
			<input id="txtQuantity-#:uid#" name="txtQuantity-#:uid#"
            	   type="number" class="k-textbox"
            	   min="0"
                   data-bind="value: quantity, events: {change : changes}"
                   required data-required-msg="required"
                   placeholder="Qty..." 
                   style="text-align: right; width: 40%;" />

			<input id="ddlMesurement"
					data-role="dropdownlist"
					data-value-primitive="true"                 
                	data-text-field="measurement"
                   	data-value-field="measurement_id"
                   	data-bind="value: measurement_id,
                   			  source: item_prices,
                   			  events:{ change: measurementChanges }"
                   data-option-label="UM"
                   style="width: 57%;" />
		</td>					
		<td>
			<input id="txtPrice-#:uid#" name="txtPrice-#:uid#"
            	   type="number" class="k-textbox"
            	   min="0"
                   data-bind="value: price, events: {change : changes}"
                   required data-required-msg="required"
                   placeholder="Price..." 
                   style="text-align: right; width: 100%;" />
		</td>
		<td class="center" data-bind="visible: showDiscount">
			<input data-role="numerictextbox"
                   data-format="p0"
                   data-min="0"
                   data-max="0.99"
                   data-step="0.1"                   
                   data-bind="value: discount,
                              events: { change: changes }"
                   style="width: 100%;">			
		</td>				
		<td class="right">
			<span data-format="n" data-bind="text: amount"></span> 						
		</td>
		<td>
			<input 	id="ccbTaxItem" 
					name="ccbTaxItem-#:uid#"
					data-header-template="tax-header-tmpl"
				   	data-role="combobox"   
				   	data-value-primitive="true"
                   	data-text-field="name"
                   	data-value-field="id"
                   	data-bind="value: tax_item_id, 
                   			  source: taxItemDS,
                   			  events:{ change: changes }"
                   	style="width: 100%" />			
		</td>						
    </tr>
</script>
<script id="saleOrder" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">

		    		<span class="glyphicons no-js remove_2 pull-right"
							data-bind="click: cancel"><i></i></span>

			        <h2>Sale Order</h2>

				    <br>

					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 190px;">				
								<table class="table table-borderless table-condensed cart_total">									
									<tr>
										<td style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></td>
										<td>
											<input id="txtNumber" name="txtNumber" class="k-textbox" 
													data-bind="value: obj.number,
																disabled: obj.is_recurring,
																events:{change:checkExistingNumber}" 
													required data-required-msg="required" 
													placeholder="eg. ABC00001" style="width: 83%; float: left; margin-right: 5px;" />
											<div style="padding-left: 0; width: 25px; float: left;">
												<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 2px 0 0 0 ;"><i></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.date"></span></td>
										<td class="right">
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd HH:mm:ss"
													data-bind="value: obj.issued_date, 
																events:{ change : setRate }" 
													required data-required-msg="required"
													style="width:100%;" />
										</td>
									</tr>								
									<tr>
										<td><span data-bind="text: lang.lang.customers"></span></td>
										<td>
											<input id="cbbContact" name="cbbContact"
												   data-role="dropdownlist"
												   data-header-template="contact-header-tmpl"
								                   data-template="contact-list-tmpl"
								                   data-auto-bind="false"
								                   data-value-primitive="false"
								                   data-filter="startswith"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.contact,
								                              source: contactDS,
								                              events: {change: contactChanges}"
								                   data-option-label="Select Customer..."
								                   required data-required-msg="required" style="width: 100%;" />
										</td>
									</tr>																															
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: {backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.amount_ordered"></span></div>
									<h2 data-bind="text: total" align="right"></h2>
								</div>

							</div>						
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab2-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons circle_info"><a href="#tab3-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab4-5" data-toggle="tab"><i></i></a>
							            </li>						            
							            <li class="span1 glyphicons history"><a href="#tab5-5" data-toggle="tab"><i></i> Recuring</a>
							            </li>						            								            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-5">						            
							            <table class="table table-borderless table-condensed cart_total">							            
											<tr>
												<td>
													<span data-bind="text: lang.lang.balance"></span> <span data-bind="text: balance"></span>
												</td>										
												<td>
													<span data-bind="text: lang.lang.credit_allowed"></span> <span data-format="n" data-bind="text: obj.credit_allowed"></span>
												</td>
											</tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.expected_date"></span></td>
								            	<td>
								            		<input id="txtDueDate" name="txtDueDate" 
															data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd" 
															data-bind="value: obj.due_date" 
															required data-required-msg="required"
															style="width:100%;" />
								            	</td>
								            </tr>							           
											<tr>							            				
												<td>
								            		<span data-bind="text: lang.lang.reference"></span>	                    		
								            	</td>
								            	<td>
													<input data-role="combobox"
															data-template="reference-list-tmpl"
								              				data-value-primitive="true"
								              				data-auto-bind="false"
															data-text-field="number" 
								              				data-value-field="id"						              				 
								              				data-bind="value: obj.reference_id,
								              							enabled: enableRef,
								              							source: referenceDS,						              							
								              							events:{change: referenceChanges}" 
								              				style="width: 100%" />
												</td>
											</tr>	
							            </table>						            
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Address Tab content -->
							        <div class="tab-pane" id="tab2-5">
							        	<span data-bind="text: lang.lang.billing_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>								
										
										<span data-bind="text: lang.lang.delivery_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>	
												
							        </div>
							        <!-- // Address Tab content END -->

							        <!-- Info Tab content -->
							        <div class="tab-pane" id="tab3-5">
							        	
										<table class="table table-borderless table-condensed cart_total">
											<tr>
												<td><span data-bind="text: lang.lang.segments"></span></td>
												<td>
													<select data-role="multiselect"
														   data-value-primitive="true"
														   data-header-template="segment-header-tmpl"
														   data-item-template="segment-list-tmpl"				    
														   data-value-field="id" 
														   data-text-field="code"
														   data-bind="value: obj.segments, 
														   			source: segmentItemDS,
														   			events:{ change: segmentChanges }"
														   data-placeholder="Add Segment.."				   
														   style="width: 100%" /></select>
												</td>
											</tr>
											<tr>
												<td><span data-bind="text: lang.lang.job"></span></td>
												<td>
													<input id="ddlJob" name="ddlJob"
														   data-role="dropdownlist"
														   data-header-template="job-header-tmpl"
														   data-template="job-list-tmpl"
														   data-auto-bind="false"				                
										                   data-value-primitive="true"		   
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.job_id, 
										                   			source: jobDS"
										                   data-option-label="Select job..." 
										                   style="width: 100%" />										
												</td>
											</tr>											
							            </table>
												
							        </div>
							        <!-- // Info Tab content END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab4-5">
							         	<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>		
							            <input id="files" name="files"
						                   type="file"
						                   data-role="upload"
						                   data-show-file-list="false"
						                   data-bind="events: { 
				                   				select: onSelect
						                   }">

							            <table class="table table-bordered">
									        <thead>
									            <tr>			                
									                <th><span data-bind="text: lang.lang.file_name"></span></th>
									                <th><span data-bind="text: lang.lang.description"></span></th>
									                <th><span data-bind="text: lang.lang.date"></span></th>
									                <th style="width: 13%;"></th>                			                
									            </tr> 
									        </thead>
									        <tbody data-role="listview" 
									        		data-template="attachment-list-tmpl" 
									        		data-auto-bind="false"
									        		data-bind="source: attachmentDS"></tbody>			        
									    </table>

							        </div>
							        <!-- // Attach Tab content END -->						        

							        <!-- Recuring Tab content -->
							        <div class="tab-pane" id="tab5-5">							            	
							            
							             <table style="width: 100%" class="table borderless">
							            	<tr align="right">
							            		<td style="border-top: 0;">
							            			<span data-bind="text: lang.lang.name"></span>
							            		</td>
							            		<td style="border-top: 0;">
							            			<input id="txtRecurringName" name="txtRecurringName"
							            					class="k-textbox" 
							            					data-bind="value: obj.recurring_name" 
							            					placeholder="Recurring name.." 
							            					style="width: 43%; " />

							            			<span data-bind="text: lang.lang.start"></span>

									                <input data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd"
															data-bind="value: obj.start_date"
															style="width: 40%; " />
							            		</td>
							            	</tr>
							            	<tr align="right">
							            		<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.every"></span>
								            	</td>
							            		<td style="border-top: 0;">
								            		<input data-role="numerictextbox"
									                   data-format="n0"
									                   data-min="0"								                   
									                   data-bind="value: obj.interval"
									                   style="width: 45%; " />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.frequency,
										                              source: frequencyList,
										                              events: { change: frequencyChanges }"
										                   style="width: 45%;" />
								            	</td>
							            	</tr>
								            <tr align="right">
								            	<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.on"></span>
								            	</td>							            	
								            	<td style="border-top: 0;">

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month,
										                   			  visible: showMonth,
										                              source: monthList"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month_option,
										                   			  visible: showMonthOption,
										                              source: monthOptionList,
										                              events: { change: monthOptionChanges }"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.week,
										                   			  visible: showWeek,
										                              source: weekDayList"										                  
										                   style="width: 45%;" />										            
										        
								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.day,
										                   			  visible: showDay,
										                              source: dayList"										                   
										                   style="width: 45%;" />

								            	</td>
								            </tr>
							            </table>

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" data-bind="visible: obj.isNew" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>									     
							            
							        </div>
							        <!-- // Recuring Tab content END -->						        								        

							    </div>
							</div>

					    </div>
					</div>

					<!-- Item List -->
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
						        	var rowIndex = banhji.saleOrder.lineDS.indexOf(dataItem)+1;
						        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
						      	}
						    },
		                 	{ field: 'item', title: 'PRODUCTS/SERVICES', editor: itemEditor, template: '#=item.name#', width: '170px' },
                            { field: 'description', title:'DESCRIPTION', width: '250px' },                            
                            {
							    field: 'quantity',
							    title: 'QTY',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            { field: 'measurement', title: 'UOM', editor: measurementEditor, template: '#=measurement.measurement#', width: '80px' },
                            {
							    field: 'price',
							    title: 'PRICE',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
							{
							    field: 'discount',
							    title: 'DISCOUNT VALUE',
							    hidden: true,
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
							{
							    field: 'discount_percentage',
							    title: 'DISCOUNT %',
							    hidden: true,
							    format: '{0:p}',
							    editor: discountEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            { field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' },
                            { field: 'tax_item', title:'TAX', editor: taxForSaleEditor, template: '#=tax_item.name#', width: '90px' },
                         	{ field: 'required_date', title:'DELIVERY DATE', format: '{0: dd-MM-yyyy}', hidden: true, editor: dateEditor, width: '120px' },
                         	{ field: 'contact', title:'SUPPLIER', hidden: true, editor: supplierEditor, template: '#=contact.name#', width: '150px' },
                         	{
							    field: 'cost',
							    title: 'COST',
							    format: '{0:n}',
							    hidden: true,
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							}
                         ]"
                         data-auto-bind="false"
		                 data-bind="source: lineDS" ></div>			    

		            <!-- Bottom part -->
		            <div class="row-fluid">
			
						<!-- Column -->
						<div class="span4">
							<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>												

							<!-- Add New Item -->
							<ul class="topnav addNew">
								<li role="presentation" class="dropdown ">
							  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  			<span data-bind="text: lang.lang.add_new_item"></span>
				    					<span class="caret"></span>
							  		</a>
						  			<ul class="dropdown-menu addNewItem">  				  				
						  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
						  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>						  				
						  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
						  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>	
						  			</ul>
							  	</li>				
							</ul>
							<!--End Add New Item -->
							
							<br><br>
							<div class="well">
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
								<br>						
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
							</div>
						</div>
						<!-- Column END -->

						<!-- Column -->
						<div class="span4" align="center">
							<div data-bind="visible: isEdit" style="margin-top: 10%;">
								<h2 data-bind="text: statusObj.text" style="text-transform: uppercase;"></h2>
								<p data-bind="text: statusObj.date"></p>
								<a data-bind="text: statusObj.number,
											attr: { href: statusObj.url }"></a>
							</div>
						</div>
						<!-- Column END -->
						
						<!-- Column -->
						<div class="span4">
							<table class="table table-condensed table-striped table-white">
								<tbody>
									<tr>
										<td class="right" style="width: 60%"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
										<td class="right "><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_discount"></span></td>
										<td class="right ">
											<span data-format="n" data-bind="text: obj.discount"></span>
	                   					</td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
										<td class="right "><span data-format="n" data-bind="text: obj.tax"></span></td>
									</tr>
									<tr>
										<td class="right"><h4 data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
										<td class="right "><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
									</tr>								
								</tbody>
							</table>
						</div>
						<!-- // Column END -->

					</div>
					
					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>

						<!-- Delete Confirmation -->
						<div data-role="window"
			                 data-title="Delete Confirmation"
			                 data-width="350"
			                 data-height="200"
			                 data-iframe="true"
			                 data-modal="true"
			                 data-visible="false"
			                 data-position="{top:'40%',left:'35%'}"
			                 data-actions="{}"
			                 data-resizable="false"
			                 data-bind="visible: showConfirm"
			                 style="text-align:center;">
			                <p style="font-size:25px; margin: 15px 0 25px;" class="delete-message" data-bind="text: confirmMessage"></p>
						    <button style="font-size:14px; border:none; background:#496cad; color:#fff; padding:5px 25px;" data-bind="click:delete">Yes</button> 
						    <button style="font-size:14px; border:none; background:red; color:#fff; padding:5px 25px;" data-bind="click:closeConfirm">No</button>
			            </div>
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
								
							</div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span>								
							</div>
						</div>
					</div>
					<!-- // Form actions END -->

				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerDeposit" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
				    
			    	<span class="glyphicons no-js remove_2 pull-right" 
							data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.customer_deposit"></h2>			    		   

				    <br>				   				
						
					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 150px;">				
								<table class="table table-borderless table-condensed cart_total">									
									<tr>
										<td style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></td>
										<td>
											<input id="txtNumber" name="txtNumber" class="k-textbox" 
													data-bind="value: obj.number,
																disabled: obj.is_recurring,
																events:{change:checkExistingNumber}" 
													required data-required-msg="required" 
													placeholder="eg. ABC00001" style="width: 83%; float: left; margin-right: 5px;" />
											<div style="padding-left: 0; width: 25px; float: left;">
												<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 2px 0 0 0 ;"><i></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.date"></span></td>
										<td class="right">
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd HH:mm:ss"
													data-bind="value: obj.issued_date, 
																events:{ change : setRate }" 
													required data-required-msg="required"
													style="width: 210px;" />
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.customers"></span></td>
										<td>
											<input id="cbbContact" name="cbbContact"
												   data-role="dropdownlist"
												   data-header-template="contact-header-tmpl"
								                   data-template="contact-list-tmpl"
								                   data-auto-bind="false"
								                   data-value-primitive="false"
								                   data-filter="startswith"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.contact,
								                              source: contactDS,
								                              events: {change: contactChanges}"
								                   data-option-label="Select Customer..."
								                   required data-required-msg="required" style="width: 210px;" />
										</td>
									</tr>
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: {backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.amount_deposited"></span></div>
									<h2 data-bind="text: total" align="right"></h2>
								</div>

							</div>
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab2-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons circle_info"><a href="#tab3-5" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab4-5" data-toggle="tab"><i></i></a>
							            </li>						            
							            <li class="span1 glyphicons history"><a href="#tab5-5" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.recurring"></span></a>
							            </li>
							            <!-- <li class="span1 glyphicons show_liness"><a href="#tab5-6" data-toggle="tab"><i></i></a>
							            </li> -->						            								            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-5">						            
							            <table class="table table-borderless table-condensed cart_total">							            
											<tr>
												<td>
													<span data-bind="text: lang.lang.balance"></span> <span data-bind="text: balance"></span>
												</td>										
												<td>
													<span data-bind="text: lang.lang.credit_allowed"></span> <span data-format="n" data-bind="text: obj.credit_allowed"></span>
												</td>
											</tr> 
											<tr>
												<td style="width: 15%"><span data-bind="text: lang.lang.deposit_to"></span></td>
												<td style="width: 40%">
													<input id="cbbAccount" name="cbbAccount"
														   data-role="combobox"
										                   data-value-primitive="true"
										                   data-header-template="account-header-tmpl"
										                   data-template="account-list-tmpl"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.account_id,
										                   			  source: depositAccountDS"
										                   data-placeholder="Add Account.."
										                   required data-required-msg="required" style="width: 100%" />
												</td>
											</tr>  
											<tr>							            				
												<td>
								            		<span data-bind="text: lang.lang.reference"></span>   						     		
								            	</td>
								            	<td>
													<input data-role="combobox"
															data-template="reference-list-tmpl"
								              				data-value-primitive="true"
												            data-auto-bind="false"
															data-text-field="number" 
								              				data-value-field="id"						              				 
								              				data-bind="value: obj.reference_id,
								              							enabled: enableRef,
								              							source: referenceDS,						              							
								              							events:{change: referenceChanges}" 
								              				style="width: 100%" />
												</td>
											</tr>	
							            </table>						            
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Address Tab content -->
							        <div class="tab-pane" id="tab2-5">
							        	<span data-bind="text: lang.lang.billing_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>								
										
										<span data-bind="text: lang.lang.delivery_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>	
												
							        </div>
							        <!-- // Address Tab content END -->

							        <!-- Info Tab content -->
							        <div class="tab-pane" id="tab3-5">
							        	
										<table class="table table-borderless table-condensed cart_total">							                        	
											<tr>
												<td><span data-bind="text: lang.lang.segments"></span></td>
												<td>
													<select data-role="multiselect"
														   data-value-primitive="true"
														   data-header-template="segment-header-tmpl"
														   data-item-template="segment-list-tmpl"				    
														   data-value-field="id" 
														   data-text-field="code"
														   data-bind="value: obj.segments, 
														   			source: segmentItemDS,
														   			events:{ change: segmentChanges }"
														   data-placeholder="Add Segment.."				   
														   style="width: 100%" /></select>
												</td>
											</tr>
											<tr>
												<td><span data-bind="text: lang.lang.job"></span></td>
												<td>
													<input id="ddlJob" name="ddlJob"
														   data-role="dropdownlist"
														   data-header-template="job-header-tmpl"
														   data-template="job-list-tmpl"
														   data-auto-bind="false"				                
										                   data-value-primitive="true"		   
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.job_id, 
										                   			source: jobDS"
										                   data-option-label="Select job..." 
										                   style="width: 100%" />										
												</td>
											</tr>											
							            </table>
												
							        </div>
							        <!-- // Info Tab content END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab4-5">
							         	<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p> 
							            <input id="files" name="files"
						                   type="file"
						                   data-role="upload"
						                   data-show-file-list="false"
						                   data-bind="events: { 
				                   				select: onSelect
						                   }">

							            <table class="table table-bordered">
									        <thead>
									            <tr>			                
									                <th><span data-bind="text: lang.lang.file_name"></span></th>
									                <th><span data-bind="text: lang.lang.description"></span></th>
									                <th><span data-bind="text: lang.lang.date"></span></th>
									                <th style="width: 13%;"></th>                			                
									            </tr> 
									        </thead>
									        <tbody data-role="listview" 
									        		data-template="attachment-list-tmpl" 
									        		data-auto-bind="false"
									        		data-bind="source: attachmentDS"></tbody>			        
									    </table>

							        </div>
							        <!-- // Attach Tab content END -->						        

							        <!-- Recuring Tab content -->
							        <div class="tab-pane" id="tab5-5">							            	
							            
							            <table style="width: 100%" class="table borderless">
							            	<tr align="right">
							            		<td style="border-top: 0;">
							            			<span data-bind="text: lang.lang.name"></span>
							            		</td>
							            		<td style="border-top: 0;">
							            			<input id="txtRecurringName" name="txtRecurringName"
							            					class="k-textbox" 
							            					data-bind="value: obj.recurring_name" 
							            					placeholder="Recurring name.." 
							            					style="width: 43%; " />

							            			<span data-bind="text: lang.lang.start"></span>

									                <input data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd"
															data-bind="value: obj.start_date"
															style="width: 40%; " />
							            		</td>
							            	</tr>
							            	<tr align="right">
							            		<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.every"></span>
								            	</td>
							            		<td style="border-top: 0;">
								            		<input data-role="numerictextbox"
									                   data-format="n0"
									                   data-min="0"								                   
									                   data-bind="value: obj.interval"
									                   style="width: 45%; " />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.frequency,
										                              source: frequencyList,
										                              events: { change: frequencyChanges }"
										                   style="width: 45%;" />
								            	</td>
							            	</tr>
								            <tr align="right">
								            	<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.on"></span>
								            	</td>							            	
								            	<td style="border-top: 0;">

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month,
										                   			  visible: showMonth,
										                              source: monthList"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month_option,
										                   			  visible: showMonthOption,
										                              source: monthOptionList,
										                              events: { change: monthOptionChanges }"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.week,
										                   			  visible: showWeek,
										                              source: weekDayList"										                  
										                   style="width: 45%;" />										            
										        
								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.day,
										                   			  visible: showDay,
										                              source: dayList"										                   
										                   style="width: 45%;" />

								            	</td>
								            </tr>
							            </table>

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" data-bind="visible: obj.isNew" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>								     
							            
							        </div>
							        <!-- // Recuring Tab content END -->						        								        

							        <div class="tab-pane saleSummaryCustomer" id="tab5-6">
										<table class="table table-borderless table-condensed">
									        <thead>
									            <tr>
									                <th>NUMBER</th>
									                <th>ACCOUNT</th>                		                
									                <th class="right">DEBITS (Dr)</th>
									                <th class="right">CREDITS (Cr)</th>		                
									            </tr>
									        </thead> 
									        <tbody>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        </tbody>			        
									    </table>
									</div>

							    </div>
							</div>

					    </div>
					</div>

					<!-- Item List -->
					<table class="table table-bordered table-primary table-striped table-vertical-center">
				        <thead>
				            <tr>
				                <th style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></th>			               
				                <th style="width: 30%;"><span data-bind="text: lang.lang.account"></span></th>
				                <th><span data-bind="text: lang.lang.description"></span></th>
				                <th style="width: 15%;"><span data-bind="text: lang.lang.reference"></span></th>			                
				                <th style="width: 15%;"><span data-bind="text: lang.lang.amount"></span></th>			                
				            </tr> 
				        </thead>
				        <tbody data-role="listview" 
				        		data-template="customerDeposit-template" 
				        		data-auto-bind="false"
				        		data-bind="source: lineDS"></tbody>			        
				    </table>			    
									
		            <!-- Bottom part -->
		            <div class="row">
			
						<!-- Column -->
						<div class="span6">
							<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>
							
							<!-- Add New Item -->
							<!-- <ul class="topnav addNew">
								<li role="presentation" class="dropdown ">
							  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  			<span data-bind="text: lang.lang.add_new_item"></span>
				    					<span class="caret"></span>
							  		</a>
						  			<ul class="dropdown-menu addNewItem">  				  				
						  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
						  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
						  				<li><a href='#/fixed_assets'><span data-bind="text: lang.lang.add_fixed_assets"></span></a></li>
						  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
						  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li> 
						  			</ul>
							  	</li>				
							</ul> -->
							<!--End Add New Item -->

							<!--Add Account -->
							<a href="#/account" class="btn btn-default" style="background: #203864; color: #fff;"><span data-bind="text: lang.lang.add_account"></span></a>

						</div>
						<!-- Column END -->


						
						<!-- Column -->
						<div class="span6">
							<table class="table table-borderless table-condensed cart_total">
								<tbody>								
									<tr>
										<td class="right" style="width: 60%"><span data-bind="text: lang.lang.total" style="font-size: 15px; font-weight: 700;"></span>:</td>
										<td class="right "><span data-bind="text: total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>								
								</tbody>
							</table>
						</div>
						<!-- // Column END -->
						
					</div>
		           
		            <br>

					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>

						<!-- Delete Confirmation -->
						<div data-role="window"
			                 data-title="Delete Confirmation"
			                 data-width="350"
			                 data-height="200"
			                 data-iframe="true"
			                 data-modal="true"
			                 data-visible="false"
			                 data-position="{top:'40%',left:'35%'}"
			                 data-actions="{}"
			                 data-resizable="false"
			                 data-bind="visible: showConfirm"
			                 style="text-align:center;">
			                <p style="font-size:25px; margin: 15px 0 25px;" class="delete-message" data-bind="text: confirmMessage"></p>
						    <button style="font-size:14px; border:none; background:#496cad; color:#fff; padding:5px 25px;" data-bind="click:delete">Yes</button> 
						    <button style="font-size:14px; border:none; background:red; color:#fff; padding:5px 25px;" data-bind="click:closeConfirm">No</button>
			            </div>
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
								
							</div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft"><span data-bind="text: lang.lang.save_draft"></span></span>
								<!-- <span class="btn-btn" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_close"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_print"></span></span> -->
							</div>
						</div>
					</div>
					<!-- // Form actions END -->

				</div>							
			</div>
		</div>
	</div>
</script>
<script id="customerDeposit-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">		
		<td class="center">
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.customerDeposit.lineDS.indexOf(data)+1#			
		</td>				
		<td>
			<input id="cbbAccounts" name="cbbAccounts"
				   data-role="combobox"
                   data-header-template="account-header-tmpl"                   
                   data-template="account-list-tmpl"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: account_id,
                              source: accountDS"
                   data-placeholder="Add Account.."
                   required data-required-msg="required" style="width: 100%" />	
		</td>		
		<td>
			<input name="description" 
					type="text" class="k-textbox" 
					data-bind="value: description"					
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>
			<input type="text" class="k-textbox" 
					data-bind="value: reference_no"				
					style="width: 100%; margin-bottom: 0;" />		
		</td>		
		<td>
			<input id="txtAmount-#:uid#" name="txtAmount-#:uid#"
			   type="number" class="k-textbox"
			   min="0"
		       data-bind="value: amount, events: {change : changes}"
		       required data-required-msg="required"
		       placeholder="Amount..." 
		       style="text-align: right; width: 100%;" />
		</td>			
    </tr>   
</script>
<script id="cashSale" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
				    
			    	<span class="glyphicons no-js remove_2 pull-right"
							data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.cash_sale"></h2>			    		   

				    <br>				   				
						
					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 190px;">				
								<table class="table table-borderless table-condensed cart_total">									
									<tr>
										<td style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></td>
										<td>
											<input id="txtNumber" name="txtNumber" class="k-textbox" 
													data-bind="value: obj.number,
																disabled: obj.is_recurring,
																events:{change:checkExistingNumber}" 
													required data-required-msg="required" 
													placeholder="eg. ABC00001" style="width: 83%; float: left; margin-right: 5px;" />
											<div style="padding-left: 0; width: 25px; float: left;">
												<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 2px 0 0 0 ;"><i></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.date"></span></td>
										<td class="right">
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd HH:mm:ss"
													data-bind="value: obj.issued_date, 
																events:{ change : setRate }" 
													required data-required-msg="required"
													style="width: 210px;" />
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.type"></span></td>
										<td>
											<input id="cbbType" name="cbbType"
												   data-role="dropdownlist"											                    
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="type"
								                   data-bind="value: obj.type,
								                              source: typeList,
								                              events:{ change: typeChanges }"
								                   required data-required-msg="required" style="width: 210px" />
										</td>
									</tr>								
									<tr>
										<td><span data-bind="text: lang.lang.customers"></span></td>
										<td>
											<input id="cbbContact" name="cbbContact"
												   data-role="dropdownlist"
												   data-header-template="contact-header-tmpl"
								                   data-template="contact-list-tmpl"
								                   data-auto-bind="false"
								                   data-value-primitive="false"
								                   data-filter="startswith"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.contact,
								                              source: contactDS,
								                              events: {change: contactChanges}"
								                   data-option-label="Select Customer..."
								                   required data-required-msg="required" style="width: 210px;" />
										</td>
									</tr>																															
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: { backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.amount_received"></span></div>
									<h2 data-bind="text: amount_due" align="right"></h2>
								</div>

							</div>						
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab2-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons circle_info"><a href="#tab3-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons link"><a href="#tab4-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons sort"><a href="#tab5-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab6-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons history"><a href="#tab7-7" data-toggle="tab"><i></i></a>
							            </li>
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-7">						            
							            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">							            
											<tr>
												<td>
													<span data-bind="text: lang.lang.balance"></span>
													<span data-bind="text: balance"></span>
												</td>
												<td>
													<span data-bind="text: lang.lang.credit_allowed"></span>
													<span data-format="n" data-bind="text: obj.credit_allowed"></span>
												</td>
											</tr>
											<tr>
								            	<td><span data-bind="text: lang.lang.payment_method"></span></td>				
												<td>
													<input data-role="dropdownlist"
								              				data-value-primitive="true"
								              				data-header-template="customer-payment-method-header-tmpl"
															data-text-field="name" 
								              				data-value-field="id"
								              				data-bind="value: obj.payment_method_id,
								              							source: paymentMethodDS"
								              				data-option-label="Select method..."							              				 
								              				style="width: 100%" />
												</td>
											</tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.cash_account"></span></td>
							            		<td>
							            			<input id="ddlCash" name="ddlCash"
							            				data-role="dropdownlist"
							            				data-header-template="account-header-tmpl"
							            				data-template="account-list-tmpl"
							              				data-value-primitive="true"
														data-text-field="name" 
							              				data-value-field="id"
							              				data-bind="value: obj.account_id,
							              							source: cashAccountDS"
							              				data-option-label="Select Account..." 
							              				required data-required-msg="required" 
							              				style="width: 100%" />
												</td>
								            </tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.trade_discount"></span></td>
							            		<td>
							            			<input id="ddlDiscountAccount" name="ddlDiscountAccount"
							            				data-role="dropdownlist"
							            				data-header-template="account-header-tmpl"
							            				data-template="account-list-tmpl"
							              				data-value-primitive="true"
														data-text-field="name" 
							              				data-value-field="id"
							              				data-bind="value: obj.discount_account_id,
							              							source: discountAccountDS"
							              				data-option-label="Select Account..." 
							              				required data-required-msg="required" 
							              				style="width: 100%" />
												</td>
								            </tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.check_no"></span></td>							            	
							            		<td>
													<input class="k-textbox" placeholder="type check number ..." data-bind="value: obj.check_no" style="width: 100%;">
												</td>							            	
								            </tr>
							            </table>						            
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Address Tab content -->
							        <div class="tab-pane" id="tab2-7">
							        	<span data-bind="text: lang.lang.billing_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>								
										
										<span data-bind="text: lang.lang.delivery_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>	
												
							        </div>
							        <!-- // Address Tab content END -->

							        <!-- Info Tab content -->
							        <div class="tab-pane" id="tab3-7">
							        	
										<table class="table table-borderless table-condensed cart_total">
											<tr>
												<td><span data-bind="text: lang.lang.sale_rep"></span></td>
												<td>
													<input id="cbbContact" name="cbbContact"
														   data-role="dropdownlist"
														   data-header-template="employee-header-tmpl"
										                   data-template="contact-list-tmpl"
										                   data-auto-bind="false"
										                   data-value-primitive="false"
										                   data-filter="startswith"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.employee,
										                              source: employeeDS,
										                              events: {change: employeeChanges}"
										                   data-option-label="Select Sale Rep..."
										                   style="width: 100%;" />
												</td>
											</tr>
											<tr>
												<td><span data-bind="text: lang.lang.job"></span></td>
												<td>
													<input id="ddlJob" name="ddlJob"
														   data-role="dropdownlist"
														   data-header-template="job-header-tmpl"
														   data-template="job-list-tmpl"
														   data-auto-bind="false"				                
										                   data-value-primitive="true"	   
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.job_id, 
										                   			source: jobDS"
										                   data-option-label="Add job..." 
										                   style="width: 100%" />										
												</td>
											</tr>											
							            </table>
												
							        </div>
							        <!-- // Info Tab content END -->

							        <!-- References -->
							        <div class="tab-pane" id="tab4-7">
							            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">											
								            <tr>
												<td style="vertical-align: top;">
								            		<span data-bind="text: lang.lang.reference"></span>
								            	</td>
								            	<td>
								            		<input data-role="dropdownlist"
								            			   data-item-template="reference-list-tmpl"
										                   data-auto-bind="false"
										                   data-value-primitive="true"
										                   data-filter="startswith"
										                   data-text-field="number"
										                   data-value-field="id"
										                   data-bind="value: reference_id,
										                              source: referenceDS,
										                              events: { change: referenceChanges }"
										                   data-option-label="Add Reference..."
										                   style="width: 100%;" />
										            <br>
										            <table class="table table-bordered">
												        <tbody data-template="invoice-reference-template"
												        		data-bind="source: obj.references"></tbody>
												    </table>
												</td>
											</tr>
							            </table>
							        </div>
							        <!-- // References END -->

							        <!-- Segment -->
							        <div class="tab-pane" id="tab5-7">

							        	<input id="cbbSegment" name="cbbSegment"
							        		   data-role="combobox"
							                   data-value-primitive="true"
							                   data-filter="startswith"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: segment_id,
							                              source: segmentDS"
							                   data-placeholder="Select segment..."
							                   style="width: 46%" />

							            <input id="cbbSegmentItem" name="cbbSegmentItem"
							            	   data-role="combobox"
							            	   data-cascade-from="cbbSegment"
							            	   data-cascade-from-field="segment_id"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-auto-bind="false"
							                   data-bind="value: segmentitem_id,
							                              source: segItemDS"
							                   data-placeholder="Select segment item..."
							                   style="width: 46%" />

							            <button class="btn btn-inverse" data-bind="click: addSegmentItem"><i class="icon-plus icon-white"></i></button>

							            <br><br>

							            <div data-role="grid" class="costom-grid"
							            	 data-editable="true"
							                 data-columns="[
							                 	{ field: 'segment', 
							                 		title: 'SEGMENT',
							                 		editable: 'false',
							                 		template: '#=segment.name#'
							                 	},
							                 	{ field: 'name', 
							                 		title: 'SEGMENT ITEM',
							                 		editable: 'false',
							                 		template: '#=code# #=name#'
							                 	},
							                 	{ command: 'destroy', title: '&nbsp;', width: 150 }
					                         ]"
					                         data-auto-bind="false"
							                 data-bind="source: segmentItemDS"></div>

							        </div>
							        <!-- // Segment END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab6-7">

							        	<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>		
							            <input id="files" name="files"
							                   type="file"
							                   data-role="upload"
							                   data-show-file-list="false"
							                   data-bind="events: { 
					                   				select: onSelect
							                   }">

							            <table class="table table-bordered">
									        <thead>
									            <tr>			                
									                <th><span data-bind="text: lang.lang.file_name"></span></th>
									                <th><span data-bind="text: lang.lang.description"></span></th>
									                <th><span data-bind="text: lang.lang.date"></span></th>
									                <th style="width: 13%;"></th>                			                
									            </tr> 
									        </thead>
									        <tbody data-role="listview" 
									        		data-template="attachment-list-tmpl" 
									        		data-auto-bind="false"
									        		data-bind="source: attachmentDS"></tbody>			        
									    </table>

							        </div>
							        <!-- // Attach Tab content END -->						        

							        <!-- Recuring Tab content -->
							        <div class="tab-pane" id="tab7-7">							            	
							            
							            <table style="width: 100%" class="table borderless">
							            	<tr align="right">
							            		<td style="border-top: 0;">
							            			<span data-bind="text: lang.lang.name"></span>
							            		</td>
							            		<td style="border-top: 0;">
							            			<input id="txtRecurringName" name="txtRecurringName"
							            					class="k-textbox" 
							            					data-bind="value: obj.recurring_name" 
							            					placeholder="Recurring name.." 
							            					style="width: 43%; " />

							            			<span data-bind="text: lang.lang.start"></span>

									                <input data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd"
															data-bind="value: obj.start_date"
															style="width: 40%; " />
							            		</td>
							            	</tr>
							            	<tr align="right">
							            		<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.every"></span>
								            	</td>
							            		<td style="border-top: 0;">
								            		<input data-role="numerictextbox"
									                   data-format="n0"
									                   data-min="0"								                   
									                   data-bind="value: obj.interval"
									                   style="width: 45%; " />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.frequency,
										                              source: frequencyList,
										                              events: { change: frequencyChanges }"
										                   style="width: 45%;" />
								            	</td>
							            	</tr>
								            <tr align="right">
								            	<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.on"></span>
								            	</td>							            	
								            	<td style="border-top: 0;">

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month,
										                   			  visible: showMonth,
										                              source: monthList"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month_option,
										                   			  visible: showMonthOption,
										                              source: monthOptionList,
										                              events: { change: monthOptionChanges }"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.week,
										                   			  visible: showWeek,
										                              source: weekDayList"										                  
										                   style="width: 45%;" />										            
										        
								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.day,
										                   			  visible: showDay,
										                              source: dayList"										                   
										                   style="width: 45%;" />

								            	</td>
								            </tr>
							            </table>

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" data-bind="visible: obj.isNew" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>								     
							            
							        </div>
							        <!-- // Recuring Tab content END -->						        								        

							        <div class="tab-pane saleSummaryCustomer" id="tab5-6">
										<table class="table table-borderless table-condensed">
									        <thead>
									            <tr>
									                <th>NUMBER</th>
									                <th>ACCOUNT</th>                		                
									                <th class="right">DEBITS (Dr)</th>
									                <th class="right">CREDITS (Cr)</th>		                
									            </tr>
									        </thead> 
									        <tbody>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        </tbody>			        
									    </table>
									</div>

							    </div>
							</div>

					    </div>
					</div>

					<!-- Item List -->
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
						        	var rowIndex = banhji.cashSale.lineDS.indexOf(dataItem)+1;
						        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
						      	}
						    },
		                 	{ field: 'item', title: 'PRODUCTS/SERVICES', editor: itemEditor, template: '#=item.name#', width: '170px' },
                            { field: 'description', title:'DESCRIPTION', width: '250px' },                            
                            {
							    field: 'quantity',
							    title: 'QTY',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            { 
                            	field: 'item_price', 
                            	title: 'UOM', 
                            	editor: measurementEditor, 
                            	template: '#=item_price?item_price.measurement:banhji.emptyString#', 
                            	width: '80px' 
                            },
                            {
							    field: 'price',
							    title: 'PRICE',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
							{
							    field: 'discount',
							    title: 'DISCOUNT VALUE',
							    hidden: true,
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
							{
							    field: 'discount_percentage',
							    title: 'DISCOUNT %',
							    hidden: true,
							    format: '{0:p}',
							    editor: discountEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            { field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' },                            
                            { field: 'tax_item', title:'TAX', editor: taxForSaleEditor, template: '#=tax_item.name#', width: '90px' },
                         	{ field: 'reference_no', title:'REFERENCE NO.', hidden: true, width: '120px' }
                         ]"
                         data-auto-bind="false"
		                 data-bind="source: lineDS" ></div>
					

					<!-- Window Barcode -->
					<div data-role="window"
		                 data-title="Barcode"
		                 data-width="600"
		                 data-height="400"
		                 data-iframe="true"
		                 data-modal="true"
		                 data-visible="false"
		                 data-position="{top:'30%',left:'30%'}"
		                 data-actions="{}"
		                 data-resizable="false"
		                 data-bind="visible: barcodeVisible"
		                 style="text-align:center;">

		                <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">
			        		<tr>
			        			<td>
			        				<input type="text" class="k-textbox" 
			        						data-bind="value: barcode,
			        									events: {change: searchByBarcode}"
			        						placeholder="Scan barcode ..." style="width: 100%;" />
			        			</td>
			        			<td>
			        				<input id="ddlCategory" id="ddlCategory"
									   data-role="dropdownlist"
									   data-option-label="Select Category..."
									   data-header-template="item-category-header-tmpl"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: category_id,
					                              source: categoryDS,
					                              events: {change: search}"
					                   style="width: 100%;" />
			        			</td>
			        			<td>
			        				<input id="ddlItemGroup" id="ddlItemGroup"
									   data-role="dropdownlist"
									   data-header-template="item-group-header-tmpl"
									   data-option-label="Select Group..."
									   data-cascade-from="ddlCategory"
									   data-cascade-from-field="category_id"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: item_group_id,
					                              source: itemGroupDS,
					                              events: {change: search}"
					                   style="width: 100%;" />
			        			</td>
			        		</tr>
			        	</table>

			        	<div data-role="grid"
			                 data-auto-bind="false"
			                 data-columns='[
                                { field: "number", title: "NUMBER", template:"#=abbr##=number#" },
                                { field: "name", title: "NAME" },
                                { field: "category", title: "CATEGORY" },
                                { title: "", template:"<button class=k-button data-bind=click:addSearchItem style=min-width:30px><i class=icon-plus></i></button>", width:"50px" }
                             ]'
			                 data-bind="source: itemDS"
			                 style="height: 212px;"></div>

			            <div id="pager" class="k-pager-wrap"
				             data-role="pager" 
				             data-auto-bind="false"
							 data-bind="source: itemDS"></div>
						<br>

						<div class="box-generic bg-action-button">
							<div class="row">
								<div class="span10">
									
								</div>
								<div class="span2" align="right">
									<span class="btn-btn" data-bind="click: closeBarcodeWindow"><i></i> <span data-bind="text: lang.lang.close"></span></span>
								</div>
							</div>
						</div>

		            </div>
		            <!-- // End Window Barcode -->

		            <!-- Bottom part -->
		            <div class="row-fluid">
			
						<!-- Column -->
						<div class="span4">
							<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>												
							<button class="btn btn-inverse" data-bind="click: openBarcodeWindow" style="background: green !important; margin-left: 0 !important;"><i class="icon-barcode icon-white" style="margin-right: 10px;"></i> Barcode</button>

							<!-- Add New Item -->
							<ul class="topnav addNew">
								<li role="presentation" class="dropdown ">
							  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  			<span data-bind="text: lang.lang.add_new_item"></span>
				    					<span class="caret"></span>
							  		</a>
						  			<ul class="dropdown-menu addNewItem">  				  				
						  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
						  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
						  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
						  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li> 	
						  			</ul>
							  	</li>				
							</ul>
							<!--End Add New Item -->
							
							<br><br>
							<div class="well">
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
								<br>						
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
							</div>
						</div>
						<!-- Column END -->

						<!-- Column -->
						<div class="span4" align="center">
							<div data-bind="visible: isEdit" style="margin-top: 10%;">
								<h2 data-bind="text: statusObj.text" style="text-transform: uppercase;"></h2>
								<p data-bind="text: statusObj.date"></p>
								<a data-bind="text: statusObj.number,
											attr: { href: statusObj.url }"></a>
							</div>
						</div>
						<!-- Column END -->
						
						<!-- Column -->
						<div class="span4">
							<table class="table table-condensed table-striped table-white">
								<tbody>
									<tr>
										<td class="right" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
										<td class="right" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_discount"></span></td>
										<td class="right"><span data-format="n" data-bind="text: obj.discount"></span></td>
									</tr>
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
										<td class="right"><span data-format="n" data-bind="text: obj.tax"></span></td>
									</tr>						
									<tr>
										<td class="right" ><h4 data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
										<td class="right" ><h4 data-bind="text: total" style=" font-weight: 700;"></h4></td>
									</tr>
									<tr>
										<td class="right">
											<span data-bind="text: lang.lang.deposit"></span>
											<span data-format="n" data-bind="text: total_deposit"></span>										
										</td>
										<td class="right">
											<input data-role="numerictextbox"
								                   data-format="n"
								                   data-spinners="false"
								                   data-min="0"							                                      
								                   data-bind="value: obj.deposit,
								                              events: { change: changes }"
								                   style="width: 90%; text-align: right;">
										</td>
									</tr>
									<tr>
										<td class="right">
											<span data-bind="text: lang.lang.remaining" style="font-size: 15px; font-weight: 700;"></span>
										</td>
										<td class="right">
											<span data-format="n" data-bind="text: obj.remaining" style="font-size: 15px; font-weight: 700;"></span>
										</td>
									</tr>								
								</tbody>
							</table>
						</div>
						<!-- // Column END -->
						
					</div>	           
					
					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>

						<!-- Delete Confirmation -->
						<div data-role="window"
			                 data-title="Delete Confirmation"
			                 data-width="350"
			                 data-height="200"
			                 data-iframe="true"
			                 data-modal="true"
			                 data-visible="false"
			                 data-position="{top:'40%',left:'35%'}"
			                 data-actions="{}"
			                 data-resizable="false"
			                 data-bind="visible: showConfirm"
			                 style="text-align:center;">
			                <p style="font-size:25px; margin: 15px 0 25px;" class="delete-message" data-bind="text: confirmMessage"></p>
						    <button style="font-size:14px; border:none; background:#496cad; color:#fff; padding:5px 25px;" data-bind="click:delete">Yes</button> 
						    <button style="font-size:14px; border:none; background:red; color:#fff; padding:5px 25px;" data-bind="click:closeConfirm">No</button>
			            </div>
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
								
							</div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span>
							</div>
						</div>
					</div>
					<!-- // Form actions END -->								

				</div>							
			</div>
		</div>
	</div>
</script>
<script id="invoice-reference-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<i class="icon-trash" data-bind="events: { click: referenceRemoveRow }"></i>
			#=number#
		</td>
		<td align="right">
			#if(type=="GDN"){# 
				#=kendo.toString(kendo.parseFloat(amount), "n2")#
			#}else{#
				#=kendo.toString(kendo.parseFloat(amount), "c2", locale)#
			#}#
		</td>
    </tr>   
</script>
<script id="saleRecurring" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">

		    		<span class="glyphicons no-js remove_2 pull-right"
							data-bind="click: cancel"><i></i></span>

				    <h2>Sale Recurring</h2>

				    <br>

				    <div class="row-fluid">
						<!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">	
							    <!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons user" href="#tab-1" data-toggle="tab"><i></i>Select Customer</a></li>
									</ul>
								</div>
							    <!-- // Tabs Heading END -->
								<div class="widget-body">
								    <div class="tab-content">

								    	<!-- //GENERAL INFO -->
								        <div class="tab-pane active" id="tab-1">									
									       <input id="ccbItem" name="cbbContact"
												   data-role="combobox"
								                   data-header-template="contact-header-tmpl"
								                   data-template="contact-list-tmpl"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: contact_id,
								                              source: contactDS,
								                              events:{change: search}"
								                   data-placeholder="Customer..." style="width: 200px;" />
							        	</div>
								        <!-- //GENERAL INFO END -->

								    </div>
								</div>
							</div>
						</div>
					</div>
					                           					
	            	<table class="table table-bordered table-primary table-striped table-vertical-center">
	            		<thead style="background-color: blue; color: #fff; font-weight: bold">
			                <th>TYPE</th>
			                <th>RECURRING NAME</th>
			                <th>CUSTOMER</th>
			                <th>START DATE</th>
			                <th class="center">FREQUENCY</th>
			                <th></th>
	            		</thead>
	            		<tbody data-role="listview" 
				        		data-template="saleRecurring-template" 
				        		data-auto-bind="false"
				        		data-bind="source: dataSource"></tbody>
	            	</table>

	            	<div id="pager" class="k-pager-wrap"
			             data-role="pager" 
			             data-auto-bind="false"
			             data-bind="source: dataSource"></div>

	            </div>	            						
			</div>
		</div>
	</div>
</script>
<script id="saleRecurring-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>#=type#</td>
		<td>#=recurring_name#</td>
		<td>#=contact.abbr##=contact.number# #=contact.name#</td>
		<td>#=kendo.toString(new Date(start_date), "dd-MM-yyyy")#</td>
		<td class="center">#=frequency#</td>
		<td class="center">
			<a class="btn btn-warning" data-bind="click: edit,text: lang.lang.edit"><i></i></a>
			<a class="btn btn-success" data-bind="click: use, text: lang.lang.use"><i></i></a>
		</td>		
    </tr>   
</script>
<script id="internalUsage" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">

			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2"
							data-bind="click: cancel"><i></i></span>
					</div>

			        <h2 data-bind="text: lang.lang.internal_usage"></h2>

				    <br>

					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 150px;">
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></td>
										<td>
											<input id="txtNumber" name="txtNumber" class="k-textbox"
													data-bind="value: obj.number,
																disabled: obj.is_recurring,
																events:{change:checkExistingNumber}"
													required data-required-msg="required"
													placeholder="eg. ABC00001" style="width: 83%; float: left; margin-right: 5px;" />
											<div style="padding-left: 0; width: 25px; float: left;">
												<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 2px 0 0 0 ;"><i></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.date"></span></td>
										<td class="right">
											<input id="issuedDate" name="issuedDate"
													data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd HH:mm:ss"
													data-bind="value: obj.issued_date,
																events:{ change : setRate }"
													required data-required-msg="required"
													style="width:100%;" />
										</td>
									</tr>
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: { backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.total_usage"></span></div>
									<h2 data-bind="text: total" align="right"></h2>
								</div>

							</div>
						</div>

						<div class="span8">
							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons circle_info active"><a href="#tab-1" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab-2" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab-3" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons history"><a href="#tab-4" data-toggle="tab"><i></i></a>
							            </li>
							            <!-- <li class="span1 glyphicons show_liness"><a href="#tab3-4" data-toggle="tab"><i></i></a></li>	 -->
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab-1">
							           	<table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">
											<tr>
												<td><span data-bind="text: lang.lang.segments"></span></td>
												<td>
													<select data-role="multiselect"
														   data-value-primitive="true"
														   data-header-template="segment-header-tmpl"
														   data-item-template="segment-list-tmpl"
														   data-value-field="id"
														   data-text-field="code"
														   data-bind="value: obj.segments,
														   			source: segmentItemDS,
														   			events:{ change: segmentChanges }"
														   data-placeholder="Add Segment.."
														   style="width: 100%" /></select>
												</td>
											</tr>
											<tr>
												<td><span data-bind="text: lang.lang.job"></span></td>
												<td>
													<input id="ddlJob" name="ddlJob"
														   data-role="dropdownlist"
														   data-header-template="job-header-tmpl"
														   data-template="job-list-tmpl"
														   data-auto-bind="false"
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.job_id,
										                   			source: jobDS"
										                   data-option-label="Select job..."
										                   style="width: 100%" />
												</td>
											</tr>
							            </table>
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Address Tab content -->
							        <div class="tab-pane" id="tab-2">
							        	<span data-bind="text: lang.lang.from"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>

										<span data-bind="text: lang.lang.to"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>

							        </div>
							        <!-- // Address Tab content END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab-3">
							         	<p><span data-bind="text: lang.lang.file_type"></span> [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>

							            <input id="files" name="files"
						                   type="file"
						                   data-role="upload"
						                   data-show-file-list="false"
						                   data-bind="events: {
				                   				select: onSelect
						                   }">

							            <table class="table table-bordered">
									        <thead>
									            <tr>
									                <th data-bind="text: lang.lang.file_name"></th>
									                <th data-bind="text: lang.lang.description"></th>
									                <th data-bind="text: lang.lang.date"></th>
									                <th style="width: 13%;"></th>
									            </tr>
									        </thead>
									        <tbody data-role="listview"
									        		data-template="attachment-list-tmpl"
									        		data-auto-bind="false"
									        		data-bind="source: attachmentDS"></tbody>
									    </table>

							        </div>
							        <!-- // Attach Tab content END -->

							        <!-- Recuring Tab content -->
							        <div class="tab-pane" id="tab-4">

							            <table style="width: 100%" class="table borderless">
							            	<tr align="right">
							            		<td style="border-top: 0;">
							            			<span data-bind="text: lang.lang.name"></span>
							            		</td>
							            		<td style="border-top: 0;">
							            			<input id="txtRecurringName" name="txtRecurringName"
							            					class="k-textbox"
							            					data-bind="value: obj.recurring_name"
							            					placeholder="Recurring name.."
							            					style="width: 43%; " />

							            			<span data-bind="text: lang.lang.start"></span>

									                <input data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd"
															data-bind="value: obj.start_date"
															style="width: 40%; " />
							            		</td>
							            	</tr>
							            	<tr align="right">
							            		<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.every"></span>
								            	</td>
							            		<td style="border-top: 0;">
								            		<input data-role="numerictextbox"
									                   data-format="n0"
									                   data-min="0"
									                   data-bind="value: obj.interval"
									                   style="width: 45%; " />

								            		<input data-role="dropdownlist"
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.frequency,
										                              source: frequencyList,
										                              events: { change: frequencyChanges }"
										                   style="width: 45%;" />
								            	</td>
							            	</tr>
								            <tr align="right">
								            	<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.on"></span>
								            	</td>
								            	<td style="border-top: 0;">

								            		<input data-role="dropdownlist"
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month,
										                   			  visible: showMonth,
										                              source: monthList"
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month_option,
										                   			  visible: showMonthOption,
										                              source: monthOptionList,
										                              events: { change: monthOptionChanges }"
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.week,
										                   			  visible: showWeek,
										                              source: weekDayList"
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.day,
										                   			  visible: showDay,
										                              source: dayList"
										                   style="width: 45%;" />

								            	</td>
								            </tr>
							            </table>

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>

							        </div>
							        <!-- // Recuring Tab content END -->

							        <div class="tab-pane saleSummaryCustomer" id="tab3-4">
										<table class="table table-borderless table-condensed">
									        <thead>
									            <tr>
									                <th>NUMBER</th>
									                <th>ACCOUNT</th>
									                <th class="right">DEBITS (Dr)</th>
									                <th class="right">CREDITS (Cr)</th>
									            </tr>
									        </thead>
									        <tbody>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        </tbody>
									    </table>
									</div>

							    </div>
							</div>
					    </div>
					</div>

					<!-- Middle Part -->
					<div class="row-fluid">
						<div class="box-generic-noborder">

						    <!-- Tabs Heading -->
						    <div class="tabsbar tabsbar-2">
						        <ul class="row-fluid row-merge">
						        	<li class="span3 active" style="width: 135px;"><a href="#tab-FROM" data-toggle="tab">FROM</a>
						            </li>
						            <li class="span3 " style="width: 135px !important;"><a href="#tab-TO" data-toggle="tab">TO</a>
						            </li>
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">

						    	<!-- FROM -->
						        <div class="tab-pane active" id="tab-FROM">

						        	<!-- From Item Line -->
									<div id="grid" data-role="grid" class="costom-grid"
								    	 data-column-menu="true"
								    	 data-reorderable="true"
								    	 data-scrollable="false"
								    	 data-resizable="true"
								    	 data-editable="true"
						                 data-columns="[
										    {
										    	title:'NO.',
										    	width: '50px',
										    	attributes: { style: 'text-align: center;' },
										        template: function (dataItem) {
										        	var rowIndex = banhji.internalUsage.lineDS.indexOf(dataItem)+1;
										        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
										      	}
										    },
						                 	{ field: 'item', title: 'PRODUCTS/SERVICES', editor: itemEditor, template: '#=item.name#', width: '170px' },
				                            { field: 'description', title:'DESCRIPTION', width: '250px' },
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
											    field: 'cost',
											    title: 'COST',
											    format: '{0:n}',
											    editable: 'false',
											    editor: numberTextboxEditor,
											    width: '120px',
											    attributes: { style: 'text-align: right;' }
											},
											{ field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' }
				                         ]"
				                         data-auto-bind="false"
						                 data-bind="source: lineDS" ></div>

									<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>

									<br><br>

						        	<!-- From Account Line -->
									<div data-role="grid" class="costom-grid"
								    	 data-column-menu="true"
								    	 data-reorderable="true"
								    	 data-scrollable="false"
								    	 data-resizable="true"
								    	 data-editable="true"
						                 data-columns="[
										    {
										    	title:'NO.',
										    	width: '50px',
										    	attributes: { style: 'text-align: center;' },
										        template: function (dataItem) {
										        	var rowIndex = banhji.internalUsage.accountLineDS.indexOf(dataItem)+1;
										        	return '<i class=icon-trash data-bind=click:removeRowAccount></i>' + ' ' + rowIndex;
										      	}
										    },
						                 	{ field: 'account', title: 'ACCOUNT', editor: accountEditor, template: '#=account.name#', width: '300px' },
				                            { field: 'description', title:'DESCRIPTION', width: '300px' },
				                            {
											    field: 'amount',
											    title: 'AMOUNT',
											    format: '{0:n}',
											    editor: numberTextboxEditor,
											    width: '150px',
											    attributes: { style: 'text-align: right;' }
											}
				                         ]"
				                         data-auto-bind="false"
						                 data-bind="source: accountLineDS" ></div>

									<button class="btn btn-inverse" data-bind="click: addRowAccount"><i class="icon-plus icon-white"></i></button>

						        </div>
						        <!-- // Item Line & Account Line END -->

						        <!-- TO -->
						        <div class="tab-pane" id="tab-TO">

									<div class="row-fluid">

										<!-- To Item Line -->
										<div id="grid" data-role="grid" class="costom-grid"
									    	 data-column-menu="true"
									    	 data-reorderable="true"
									    	 data-scrollable="false"
									    	 data-resizable="true"
									    	 data-editable="true"
							                 data-columns="[
											    {
											    	title:'NO.',
											    	width: '50px',
											    	attributes: { style: 'text-align: center;' },
											        template: function (dataItem) {
											        	var rowIndex = banhji.internalUsage.toItemLineDS.indexOf(dataItem)+1;
											        	return '<i class=icon-trash data-bind=click:removeRowTo></i>' + ' ' + rowIndex;
											      	}
											    },
							                 	{ field: 'item', title: 'PRODUCTS/SERVICES', editor: itemEditor, template: '#=item.name#', width: '170px' },
					                            { field: 'description', title:'DESCRIPTION', width: '250px' },
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
												    field: 'cost',
												    title: 'COST',
												    format: '{0:n}',
												    editor: numberTextboxEditor,
												    width: '120px',
												    attributes: { style: 'text-align: right;' }
												},
												{ field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' }
					                         ]"
					                         data-auto-bind="false"
							                 data-bind="source: toItemLineDS" ></div>

									    <button class="btn btn-inverse" data-bind="click: addRowTo"><i class="icon-plus icon-white"></i></button>

										<br><br>

										<!-- To Account Line -->
										<div data-role="grid" class="costom-grid"
									    	 data-column-menu="true"
									    	 data-reorderable="true"
									    	 data-scrollable="false"
									    	 data-resizable="true"
									    	 data-editable="true"
							                 data-columns="[
											    {
											    	title:'NO.',
											    	width: '50px',
											    	attributes: { style: 'text-align: center;' },
											        template: function (dataItem) {
											        	var rowIndex = banhji.internalUsage.toAccountLineDS.indexOf(dataItem)+1;
											        	return '<i class=icon-trash data-bind=click:removeRowAccountTo></i>' + ' ' + rowIndex;
											      	}
											    },
							                 	{ field: 'account', title: 'ACCOUNT', editor: toAccountEditor, template: '#=account.name#', width: '300px' },
					                            { field: 'description', title:'DESCRIPTION', width: '300px' },
					                            {
												    field: 'amount',
												    title: 'AMOUNT',
												    format: '{0:n}',
												    editor: numberTextboxEditor,
												    width: '150px',
												    attributes: { style: 'text-align: right;' }
												}
					                         ]"
					                         data-auto-bind="false"
							                 data-bind="source: toAccountLineDS" ></div>

									    <button class="btn btn-inverse" data-bind="click: addRowAccountTo"><i class="icon-plus icon-white"></i></button>

									</div>

						        </div>

						    </div>
						</div>


						<!-- Bottom part -->
			            <div class="row-fluid">

							<!-- Column -->
							<div class="span6 hidden-print">

								<!-- Add New Item -->
								<ul class="topnav addNew">
									<li role="presentation" class="dropdown ">
								  		<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								  			<span data-bind="text: lang.lang.add_new_item"></span>
					    					<span class="caret"></span>
								  		</a>
							  			<ul class="dropdown-menu addNewItem">
							  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
							  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
							  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
							  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>
							  			</ul>
								  	</li>
								</ul>
								<!--End Add New Item -->
						  		<a href="#/account" class="btn" style="background: #203864; color: #fff; width: 137px;">
						  			<span data-bind="text: lang.lang.add_account"></span>
						  		</a>

							</div>
							<!-- Column END -->

							<!-- Column -->
							<div class="span6">
								<table class="table table-borderless table-condensed cart_total">
									<tbody>
										<tr>
											<td class="right"><span >Total From:</span></td>
											<td class="right strong"><span data-bind="text: totalFrom"></span></td>
											<td class="right"><span >Total To:</span></td>
											<td class="right strong"><span data-bind="text: totalTo"></span></td>
										</tr>
										<tr>
											<td class="right"><span>Different:</span></td>
											<td class="right strong"><span data-bind="text: different"></span></td>
											<td class="right"></td>
											<td class="right strong"></td>
										</tr>
									</tbody>
								</table>
							</div>
							<!-- // Column END -->

						</div>
					</div>

		            <br>

					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>

						<!-- Delete Confirmation -->
						<div data-role="window"
			                 data-title="Delete Confirmation"
			                 data-width="350"
			                 data-height="200"
			                 data-iframe="true"
			                 data-modal="true"
			                 data-visible="false"
			                 data-position="{top:'40%',left:'35%'}"
			                 data-actions="{}"
			                 data-resizable="false"
			                 data-bind="visible: showConfirm"
			                 style="text-align:center;">
			                <p style="font-size:25px; margin: 15px 0 25px;" class="delete-message" data-bind="text: confirmMessage"></p>
						    <button style="font-size:14px; border:none; background:#496cad; color:#fff; padding:5px 25px;" data-bind="click:delete">Yes</button>
						    <button style="font-size:14px; border:none; background:red; color:#fff; padding:5px 25px;" data-bind="click:closeConfirm">No</button>
			            </div>
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />

							</div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span>
							</div>
						</div>
					</div>
					<!-- // Form actions END -->

				</div>
			</div>
		</div>
	</div>
</script>
<!-- SALES REPORT -->
<script id="saleReportCenter" type="text/x-kendo-template">
	<div class="row-fluid customer-report-center">
		<div class="span7">
			<div class="row-fluid sale-report">				
				<h2>SALE MANAGEMENT REPORTS</h2>
				<p>
					The following reports provide summary and detailed reports in 
					different ways to help analyze your revenue performance.
				</p>
				<div class="row-fluid">
					<table class="table table-borderless table-condensed">						
						<tr>
							<td width="50%">
								<h3><a href="#/quotation_list">Quotation List</a></h3>
							</td>
							<td width="50%">
								<h3><a href="#/sale_order_list">Sale Order List</a></h3>
							</td>
						</tr>
						<tr>
							<td >
								<h3><a href="#/sale_order_by_job_engagement">Sale Order By Job/Engagement</a></h3>
							</td>
							<!-- <td >
								<h3><a href="#/customer_list">Customer List</a></h3>
							</td> -->
						</tr>
						<!-- <tr>
							<td >
							</td>
							<td >
								<p>
									List of all active customers
								</p>
							</td>
						</tr> -->
						<!-- <tr>
							<td>
								<h3><a href="#/sale_inventory_position_summary">Inventory Position Summary</a></h3>
							</td>
							<td>
								
							</td>

						</tr> -->
						<tr>
							<td>
								<p>
									Summarizes each inventory balance by quantity on hand, on purchase order and sale order. In addition, it also includes average cost and price.
								</p>
							</td>
							<td>
								
							</td>

						</tr>
					</table>
				</div>
			</div>

			
			<!-- <div class="row-fluid recevable-report">
				<h2>OTHER REPORTS/ LISTS</h2>
				<div class="row-fluid">
					<table class="table table-borderless table-condensed">
						<tr>
							<td style="width: 48%; padding-right: 8px !important;">
								<h3><a href="#/customer_recurring">Recurring Customer Template List</a></h3>
							</td>
							<td >
								<h3><a href="#/customer_setting">Payment Method & Term List</a></h3>								
							</td>						
						</tr>
						<tr>
							<td style="width: 48%; padding-right: 8px !important;">
								<p></p>								
							</td>
							<td>
								<p>
									List the types of payments and the term that determine due date for payment from customers.
								</p>
							</td>
							
						</tr>
						<tr >
							<td></td>														
						</tr>

					</table>
				</div>
			</div> -->
		</div>
		<div class="span5">
			<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>
			<br>
			<br>
			<div class="report-chart">
				<div class="widget-body alert alert-primary sale-overview">
					<h2>SALE ORDER</h2>
					<div align="center" class="text-large strong" data-bind="text: sale"></div>
					<table width="100%">
						<tr align="center">
							<td>										
								<span data-bind="text: sale_customer"></span>
								<br>
								<span>Customer</span>
							</td>
							<td>
								<span data-bind="text: sale_product"></span>
								<br>
								<span>Product</span>
							</td>
							<td>
								<span data-bind="text: order"></span>
								<br>
								<span>Order</span>
							</td>
							<td >
								<span data-bind="text: sale_order"></span>
								<br>
								<span>Sale Order</span>
							</td>

						</tr>
					</table>
				</div>
				<!-- Graph -->
				<div class="home-chart">
					<div data-role="chart"
		                 data-legend="{ position: 'top' }"
		                 data-series-defaults="{ type: 'column' }"
		                 data-tooltip='{
		                    visible: true,
		                    format: "{0}%",
		                    template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
		                 }'                 
		                 data-series="[
		                                 { field: 'sale', name: 'Monthly Sale', categoryField:'month', color: '#236DA4' },
		                                 { field: 'order', name: 'Monthly Order', categoryField:'month', color: '#A6C9E3' }
		                             ]"	                             
		                 data-bind="source: graphDS"
		                 style="height: 250px;" ></div>
	            <!-- End Graph -->
	            </div>
			</div>
			
			</div>
		</div>
	</div>
</script>
<script id="quotationList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">		
			    	<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">									        	
											
											<input data-role="dropdownlist"
												   class="sorter"                  
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,                              
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
							
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds, 
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>													
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i><span data-bind="text: lang.lang.print"></span></span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		<span data-bind="text: lang.lang.export_to_excel"></span>
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: company.name"></h3>
							<h2>Quotation List</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.order"></p>
										<span data-bind="text: orderCount"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">									
									<p data-bind="text: lang.lang.amount"></p>
									<span data-bind="text: totalAmount"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.number"></th>
									<th data-bind="text: lang.lang.reference"></th>
									<th data-bind="text: lang.lang.date"></th>
									<th style="text-align: center;" data-bind="text: lang.lang.status"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-template="quotationList-template"
									data-auto-bind="false"
									data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>		
			</div>
		</div>
	</div>
</script>
<script id="quotationList-template" type="text/x-kendo-template">
	<tr style="font-weight: bold; color: black;">
		<td colspan="5">#=name#</td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td>
				#if(line[i].reference.length>0){#
					<a href="\#/#=line[i].reference[0].type.toLowerCase()#/#=line[i].reference[0].id#"><i></i> #=line[i].reference[0].number#</a>
				#}#
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: center;">
        		#if(line[i].status==="0"){#
        			Open
        		#}else{#
        			Used
        		#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="4" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span> #=name#</td>    	
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="saleOrderList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">		
			    	<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">									        	
											
											<input data-role="dropdownlist"
												   class="sorter"                  
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,                              
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
							
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds, 
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>													
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i><span data-bind="text: lang.lang.print"></span></span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		<span data-bind="text: lang.lang.export_to_excel"></span>
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: company.name"></h3>
							<h2 data-bind="text: lang.lang.sale_order_list"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.order"></p>
										<span data-bind="text: orderCount"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">									
									<p data-bind="text: lang.lang.amount"></p>
									<span data-bind="text: totalAmount"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.number"></th>
									<th data-bind="text: lang.lang.reference"></th>
									<th data-bind="text: lang.lang.date"></th>
									<th style="text-align: center;" data-bind="text: lang.lang.status"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-template="saleOrderList-template"
									data-auto-bind="false"
									data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>		
			</div>
		</div>
	</div>
</script>
<script id="saleOrderList-template" type="text/x-kendo-template">
	<tr style="font-weight: bold; color: black;">
		<td colspan="5">#=name#</td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td>
				#if(line[i].reference.length>0){#
					<a href="\#/#=line[i].reference[0].type.toLowerCase()#/#=line[i].reference[0].id#"><i></i> #=line[i].reference[0].number#</a>
				#}#
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: center;">
        		#if(line[i].status==="0"){#
        			Open
        		#}else{#
        			Used
        		#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="4" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span> #=name#</td>    	
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="saleOrderByJobEngagment" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">		
			    	<span class="pull-right glyphicons no-js remove_2" 
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">									        	
											
											<input data-role="dropdownlist"
												   class="sorter"                  
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,                              
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
							
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds, 
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>													
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i><span data-bind="text: lang.lang.print"></span></span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		<span data-bind="text: lang.lang.export_to_excel"></span>
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: company.name"></h3>
							<h2>Sale Order by Job/Engagement</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<p>Number of Job Ordered</p>
									<span data-format="n0" data-bind="text: dataSource.total()"></span>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
										<p>Amount</p>
										<span data-bind="text: total"></span>							
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th><span>Name</span></th>
									<th><span>Date</span></th>
									<th><span>Reference</span></th>
									<th><span>Status</span></th>
									<th style="text-align: right;"><span>Amount</span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									 data-auto-bind="false"
									 data-bind="source: dataSource"
									 data-template="saleOrderByJobEngagment-template"
							></tbody>
						</table>					
					</div>	
				</div>		
			</div>
		</div>
	</div>
</script>
<script id="saleOrderByJobEngagment-template" type="text/x-kendo-template">
	<tr style="font-weight: bold; color: black;">
		<td colspan="5">#=job#</td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i < line.length; i++) {#
		#amount += line[i].amount;#
		<tr>
			<td>#=line[i].name#</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: center;">
        		#if(line[i].status==="0"){#
        			Open
        		#}else{#
        			Used
        		#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="4" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span>Total #=job#</td>    	
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>



<!-- CUSTOMER REPORTS -->
<script id="customerReportCenter" type="text/x-kendo-template">
	<div class="cover-block" style="width: 99%; background: #fff;">
		<div class="row-fluid customer-report-center">
			<span class="pull-right glyphicons no-js remove_2" onclick="javascript:window.history.back()"><i></i></span>
			<br>
			<div class="span7">
				<div class="row-fluid sale-report" style="margin-bottom: 20px; padding: 10px 15px;; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
					<h2 data-bind="text: lang.lang.sale_managment_reports" style="text-transform: uppercase;"></h2>
					<p data-bind="text: lang.lang.the_following_reports_provide">
						The following reports provide summary and detailed reports in
						different ways to help analyze your revenue performance.
					</p>
					<div class="row-fluid">
						<table class="table table-borderless table-condensed">
							<tr>
								<td style="vertical-align: top;">
									<h3 ><a href="#/sale_summary_by_customer" data-bind="text: lang.lang.sale_summary_by_customer" style="text-transform: capitalize;"></a></h3>
								</td>
								<td style="vertical-align: top;">
									<h3><a href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer" style="text-transform: capitalize;"></a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.summarizes_total_sales">
										Summarizes total sales for each customer within a period
										of time so you can see which ones generate the most revenue for you.
									</p>
								</td>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_sale">
										Lists individual sale transactions by date for each customer with a period of time.
									</p>
								</td>

							</tr>

							<tr>
								<td style="vertical-align: top;">
									<h3><a href="#/sale_summary_by_product" data-bind="text: lang.lang.sale_summary_by_product_services" style="text-transform: capitalize;"></a></h3>
								</td>
								<td style="vertical-align: top;">
									<h3><a href="#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_services" style="text-transform: capitalize;"></a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.summarizes_total_sales_for_each_product">
										Summarizes total sales for each product/ service within a period of time. In addition, it also includes gross profit margin, quantity, amount, cost, and average prices.
									</p>
								</td>
								<td style="vertical-align: top;" data-bind="text: lang.lang.lists_individual_sale_transactions">
									<p>
										Lists individual sale transactions by date for each product/ service with a period of time.
									</p>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<h3><a href="#/sale_summary_by_brand" data-bind="text: lang.lang.sale_summary_by_brand" style="text-transform: capitalize;"></a></h3>
								</td>
								<td style="vertical-align: top;">
									<h3><a href="#/sale_detail_by_brand" data-bind="text: lang.lang.sale_detail_by_brand" style="text-transform: capitalize;"></a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.summarizes_total_sales_for_each_product">
										Summarizes total sales for each product/ service within a period of time. In addition, it also includes gross profit margin, quantity, amount, cost, and average prices.
									</p>
								</td>
								<td style="vertical-align: top;" data-bind="text: lang.lang.lists_individual_sale_transactions">
									<p>
										Lists individual sale transactions by date for each product/ service with a period of time.
									</p>
								</td>
							</tr>

							<tr>
								<!-- <td>
									<h3><a href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer" style="text-transform: capitalize;"></a></h3>
								</td> -->
								<td style="vertical-align: top;">
									<h3><a href="#/customer_transaction_list" data-bind="text: lang.lang.customer_transaction_list" style="text-transform: capitalize;"></a></h3>
								</td>
								<td style="vertical-align: top;">
									<h3><a href="#/deposit_detail_by_customer" data-bind="text: lang.lang.deposit_detail_by_customer" style="text-transform: capitalize;"></a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.list_of_all_transactions_related">
										List of all transactions related to and grouped by each customer, including invoice, cash sale
									</p>
								</td>
								<td style="vertical-align: top;" data-bind="text: lang.lang.provides_detailed_information_about_customer_deposit">
									<p >
										Provides detailed information about customer deposit for specific order, prepayment, or credit.
									</p>
								</td>

							</tr>
							<tr>
								<td style="vertical-align: top;">
									<h3><a href="#/profitability_summary_job" data-bind="text: lang.lang.profitability_summary_by_job" style="text-transform: capitalize;"></a></h3>
								</td>
								<td style="vertical-align: top;">
									<h3><a href="#/profitability_detail_job" data-bind="text: lang.lang.profitability_detail_by_job" style="text-transform: capitalize;"></a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.profitability_summary_by_job_summarize">
										Summarizes total profitability for each customer by job within a period of time so you can see which ones generate the most revenue for you.
									</p>
								</td>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.profitability_detail_by_job_summarize">
										List individual profitability sale by date each job with a period of time.
									</p>
								</td>

							</tr>
							<tr>
								<td style="vertical-align: top;">
									<h3><a href="#/saleOrder_deatil_customer" data-bind="text: lang.lang.sale_order_list" style="text-transform: capitalize;"></a></h3>
								</td>
								<td style="vertical-align: top;">
									<h3><a href="#/sale_order_by_item" data-bind="text: lang.lang.saleOrder_detail_by_product" style="text-transform: capitalize;"></a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" data-bind="text: lang.lang.sale_order_summarize">
									<p >
										List of sale order relate to and grouped by each product including cusomter name.
									</p>
								</td>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.salesOrder_summary_summarize">
										Lists individual sale order transactions by date for each product/ service with a period of time.
									</p>
								</td>

							</tr>
							<tr>
								<td style="vertical-align: top;">
									<h3><a href="#/sale_order_by_employee"  style="text-transform: capitalize;">Sale Order by Employee</a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<h3><a href="#/cashSale_summary_by_customer" data-bind="text: lang.lang.cash_sale_summary" style="text-transform: capitalize;"></a></h3>
								</td>
								<td style="vertical-align: top;">
									<h3><a href="#/cashSale_detail_by_customer" data-bind="text: lang.lang.cash_sale_detail" style="text-transform: capitalize;"></a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.cash_sale_summary_summarize">
										Summarizes total cash sales for each customer within a period of time. In addition, it includes gross profit margin, quantity, amount, cost, and average prices.
									</p>
								</td>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.cash_sale_detail__summarize">
										Lists individual cash sale transactions by date for each customer within a period of time.
									</p>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<h3><a href="#/cashSale_summary_by_product"  data-bind="text: lang.lang.cashSale_summary_by_product" style="text-transform: capitalize;"></a></h3>
								</td>
								<td style="vertical-align: top;">
									<h3><a href="#/cashSale_detail_by_product"  data-bind="text: lang.lang.cashSale_detail_by_product" style="text-transform: capitalize;"></a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.cash_sale_summary_product_summarize">
										Summarizes total cash sales for each product/service within a period of time. In addition, it includes gross profit margin, quantity, amount, cost, and average prices.
									</p>
								</td>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.cash_sale_detail_product_summarize">
										Lists individual cash sale transactions by date for each product/service within a period of time.
									</p>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<h3><a href="#/sale_summary_by_employee" data-bind="text: lang.lang.sale_summary_by_employee" style="text-transform: capitalize;"></a></h3>
								</td>
								<td style="vertical-align: top;">
									<h3><a href="#/sale_detail_by_employee" data-bind="text: lang.lang.sale_detail_by_employee" style="text-transform: capitalize;"></a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.sale_summary_by_employee_summarize">
										Summarizes total sales for each employee within a period of time so you can see which ones generate the most revenue for you.
									</p>
								</td>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.sale_detail_by_employee_summarize">
									Lists individual sale transactions by date for each employee with a period of time.
									</p>
								</td>

							</tr>
							<tr>
								<td style="vertical-align: top;">
									<h3><a href="#/saleProduct_detail_by_employee" data-bind="text: lang.lang.sale_products_detail_employee" style="text-transform: capitalize;"></a></h3>
								</td>
								<td style="vertical-align: top;">
									<h3><a href="#/draft_list" data-bind="text: lang.lang.draft_list" style="text-transform: capitalize;"></a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.sale_products_detail_by_employee_summarize">
										Lists individual sale product/ service by employee with a period of time.
									</p>
								</td>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.draft_list_summarize">
										Lists individual draft transactions by date for each customer within a period of time.
									</p>
								</td>

							</tr>
						</table>
					</div>
				</div>

				<div class="row-fluid recevable-report" style="margin-bottom: 20px; padding: 10px 15px;; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">

					<h2 data-bind="text: lang.lang.receivable_management_reports"></h2>

					<p data-bind="text: lang.lang.the_following_reports_provide_summary">
						The following reports provide summary and detailed reports.
					</p>
					<div class="row-fluid">
						<table class="table table-borderless table-condensed">
							<tr>
								<td style="vertical-align: top;">
									<h3><a href="#/customer_balance_summary" data-bind="text: lang.lang.customer_balance_summary">Customer Balance Summary</a></h3>
								</td>
								<td style="vertical-align: top;">
									<h3><a href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail">Customer Balance Detail</a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.show_each_customers_total_outstanding_balances">
										Show each customer’s total outstanding balances.
									</p>

								</td>
								<td style="vertical-align: top;" data-bind="text: lang.lang.lists_individual_unpaid_invoices_for_each_customer">
									<p>
										Lists individual unpaid invoices for each customer
									</p>
								</td>

							</tr>
							<tr>
								<td style="vertical-align: top;">
									<h3><a href="#/receivable_aging_summary" data-bind="text: lang.lang.receivable_aging_summary">Receivable Aging Summary</a></h3>
								</td>
								<td style="vertical-align: top;">
									<h3><a href="#/receivable_aging_detail" data-bind="text: lang.lang.receivable_aging_detail">Receivable Aging Detail</a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_all_unpaid_invoices1">
										Lists all unpaid invoices for the current period, 30, 60, 90,
										and more than 90 days, grouped by individual customers.
									</p>
								</td>
								<td style="vertical-align: top;">
									<p data-bind="text: lang.lang.lists_individual_unpaid_invoices_grouped_by_customer">
										Lists individual unpaid invoices, grouped by customer. This includes due date,
										outstanding days (aging days), and amount.
									</p>
								</td>
							</tr>

							<tr>
								<td style="vertical-align: top;">
									<h3><a href="#/collect_invoice" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a></h3>
								</td>
								<td style="vertical-align: top;">
									<h3><a href="#/collection_report" data-bind="text: lang.lang.collection_report"></a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_all_unpaid_invoices_grouped_by_due_today_and_overdue">
										Lists all unpaid invoices, grouped by Due today and Overdue.
									</p>
								</td>
								<td style="vertical-align: top;">
									<p data-bind="text: lang.lang.lists_of_collected_invoices_for_the_select_period_of_time_group_by_method_of_payment">
										Lists of collected invoices for the select period of time, group by method of payment.
									</p>
								</td>
							</tr>

							<tr>
								<td style="vertical-align: top;">
									<h3><a href="#/invoice_list" data-bind="text: lang.lang.invoice_list"></a></h3>
								</td>
								<td style="vertical-align: top;">
									<h3><a href="#/customer_list" data-bind="text: lang.lang.customer_list"></a></h3>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<p style="padding-right: 25px;"  data-bind="text: lang.lang.shows_a_chronological_list_of_all_your_invoices_for_a_selected_date_range">
										Shows a chronological list of all your invoices for a selected date range.
									</p>
								</td>
								<td style="vertical-align: top;" data-bind="text: lang.lang.list_of_all_active_customers">
									<p>
										List of all active customers
									</p>
								</td>
							</tr>

						</table>
					</div>
				</div>
			</div>
			<div class="span5">
				<div class="report-chart" style="margin-bottom: 20px; padding: 15px; margin-top: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
					<div class="widget-body alert alert-primary sale-overview">
						<h2 data-bind="text: lang.lang.sale_overview">SALE OVERVIEW</h2>
						<div align="center" class="text-large strong" data-bind="text: obj.sale"></div>
						<table width="100%">
							<tr align="center">
								<td>
									<span data-bind="text: obj.sale_customer"></span>
									<br>
									<span data-bind="text: lang.lang.customer">Customer</span>
								</td>
								<td>
									<span data-bind="text: obj.sale_product"></span>
									<br>
									<span data-bind="text: lang.lang.product">Product</span>
								</td>
								<td>
									<span data-bind="text: obj.sale_ordered"></span>
									<br>
									<span data-bind="text: lang.lang.order">Order</span>
								</td>
							</tr>
						</table>
					</div>
					<!-- Graph -->
					<div class="home-chart">
						<div data-role="chart"
			                 data-legend="{ position: 'top' }"
			                 data-series-defaults="{ type: 'column' }"
			                 data-tooltip='{
			                    visible: true,
			                    format: "{0}%",
			                    template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
			                 }'
			                 data-series="[
			                                 { field: 'sale', name: langVM.lang.monthly_sale, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'} },
			                                 { field: 'order', name: langVM.lang.monthly_order, categoryField:'month', color: '#9CB9D9', overlay:{ gradient: 'none'} }
			                             ]"
			                 data-auto-bind="false"
			                 data-bind="source: graphDS"
			                 style="height: 250px;" ></div>
		            <!-- End Graph -->
		            </div>
				</div>
				<div class="report-chart" style="padding: 15px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
					<div class="widget-body receivable-overview" style="background-color: #fff; margin-bottom: 0; color: #203864;">
						<h2 data-bind="text: lang.lang.receivable_management" style="text-transform: uppercase; color: #203864; font-weight: 800;"></h2>
						<div align="center" class="text-large strong" data-bind="text: obj.ar"></div>
						<table width="100%">
							<tr align="center">
								<td>
									<span data-bind="text: obj.ar_open"></span>
									<br>
									<span data-bind="text: lang.lang.open1">Open</span>
								</td>
								<td>
									<span data-bind="text: obj.ar_customer"></span>
									<br>
									<span data-bind="text: lang.lang.customer">Customer</span>
								</td>
								<td>
									<span data-bind="text: obj.ar_overdue"></span>
									<br>
									<span data-bind="text: lang.lang.overdue">Overdue</span>
								</td>
								<td>
									<span data-bind="text: obj.collection_day"></span> <span data-bind="text: lang.lang.days">days</span>
									<br>
									<span data-bind="text: lang.lang.collection_day">Collection Days</span>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</script>
</script>
<script id="saleSummaryByCustomer" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background ">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        								        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.sale_summary_by_customer"></h2>
							<p data-bind="text: displayDate"></p>
						</div>
						<div class="row-fluid">
							<div class="span3">
								<div class="total-customer">
									<p data-bind="text: lang.lang.number_of_customer"></p>
									<span data-bind="text: dataSource.total"></span>
								</div>
							</div>
							<div class="span9">
								<div class="total-sale">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: totalAmount"></sapn>
								</div>
							</div>
						</div>
						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text:lang.lang.customer"></th>
									<th style="text-align: center;" data-bind="text: lang.lang.number_of_invoice"></th>
									<th style="text-align: center;" data-bind="text: lang.lang.number_of_cash_sale"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.total_sale"></th>
								</tr>
							</thead>
		            		<tbody  data-role="listview"
		            				data-auto-bind="false"
					                data-template="saleSummaryByCustomer-template"
					                data-bind="source: dataSource" >
					        </tbody>
		            	</table>
		            	<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
		            </div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleSummaryByCustomer-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: center;">#=invoice_count#</td>
		<td style="text-align: center;">#=cash_sale_count#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="saleDetailByCustomer" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.sale_detail_by_customer"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span3">
								<div class="total-customer">
									<p data-bind="text: lang.lang.number_of_customer"></p>
									<span data-bind="text: dataSource.total"></span>
								</div>

							</div>
							<div class="span9">
								<div class="total-sale">
									<p data-bind="text: lang.lang.amount"></p>
									<span data-bind="text: totalAmount"></sapn>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.type"><span></span></th>
									<th data-bind="text: lang.lang.date"><span></span></th>
									<th data-bind="text: lang.lang.reference"><span></span></th>
									<th data-bind="text: lang.lang.memo"><span></span></th>
									<th data-bind="text: lang.lang.amount"><span></span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-template="saleDetailByCustomer-template"
									data-auto-bind="false"
									data-bind="source: dataSource">
							</tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
</script>
<script id="saleDetailByCustomer-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=name#</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: right;">#=line[i].memo#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;"> <span data-bind="text: lang.lang.total"></span> #=name#</td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="customerTransactionList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.customer_transaction_list"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.type"></th>
									<th data-bind="text: lang.lang.date"></th>
									<th data-bind="text: lang.lang.reference"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-bind="source: dataSource"
										 data-auto-bind="false"
										 data-template="customerTransactionList-template"
							></tbody>
						</table>

						<div class="k-pager-wrap"
							 data-role="pager"
					    	 data-auto-bind="false"
				             data-bind="source: dataSource"></div>

					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerTransactionList-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=name#</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span>Total #: name #</td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="4">&nbsp;</td>
    </tr>
</script>
<script id="saleSummaryByProduct" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.sale_summary_by_product_services"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.total_product_services"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.avg_sale_per_invoice"></p>
										<span data-bind="text: avg_sale"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: total_sale"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th style="text-transform: uppercase;" data-bind="text: lang.lang.item"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.qty"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.amount"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.avg_price"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.avg_cost"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.gross_profit_margin"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-template="saleSummaryByProduct-template"
										 data-auto-bind="false"
										 data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleSummaryByProduct-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=kendo.toString(quantity, "n")# #=measurement#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(avg_price, "c3", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(avg_cost, "c3", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(gpm, "p")#</td>
	</tr>
</script>
<script id="saleDetailByProduct" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
													<td style="padding: 8px 0 0 0 !important;">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.sale_detail_by_product_services"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.total_product_services"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.avg_sale_per_invoice"></p>
										<span data-bind="text: product_sale"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: total_sale"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text:lang.lang.customer"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.invoice_date"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.reference"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.item_name"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.qty"></th>
									<th data-bind="text: lang.lang.uom"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.price"></th>
									<th data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-template="saleDetailByProduct-template"
										 data-auto-bind="false"
										 data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleDetailByProduct-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td colspan="8">#=name#</td>
	</tr>
	#var totalAmount = 0, totalQty = 0;#
	#for(var i= 0; i <line.length; i++) {#
		#totalQty += kendo.parseInt(line[i].quantity);#
		#totalAmount += kendo.parseFloat(line[i].amount);#
		<tr>
			<td>#=line[i].customer#</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].issued_date),"dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td>#=line[i].item_name#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].quantity, "c2")#</td>
			<td>#=line[i].measurement#</td>
			<td style="text-align: right;">#=kendo.toString(parseFloat(line[i].price), "c2", banhji.locale)#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>

	#}#
	<tr>
    	<td colspan="4" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span>Total #: name #</td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalQty, "n")#
    	</td>
    	<td colspan="2" style="font-weight: bold; border-top: 1px solid black !important; color: black;"></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalAmount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="7">&nbsp;</td>
    </tr>
</script>
<script id="saleSummaryByBrand" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.sale_summary_by_brand"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.total_brand"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.avg_sale_per_invoice"></p>
										<span data-bind="text: avg_sale"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: total_sale"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th style="text-transform: uppercase;" data-bind="text: lang.lang.brand"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.qty"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.amount"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.avg_price"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.avg_cost"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.gross_profit_margin"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-template="saleSummaryByBrand-template"
										 data-auto-bind="false"
										 data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleSummaryByBrand-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=kendo.toString(quantity, "n")# #=measurement#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(avg_price, "c3", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(avg_cost, "c3", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(gpm, "p")#</td>
	</tr>
</script>
<script id="saleDetailByBrand" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.sale_detail_by_brand"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.total_brand"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.avg_sale_per_invoice"></p>
										<span data-bind="text: product_sale"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: total_sale"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.brand"></th>
									<th data-bind="text:lang.lang.customer"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.invoice_date"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.reference"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.qty"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.price"></th>
									<th data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-template="saleDetailByBrand-template"
										 data-auto-bind="false"
										 data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleDetailByBrand-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td colspan="7">#=name#</td>
	</tr>
	#var totalAmount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		#totalAmount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important; color: black;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].type#</a>
			</td>
			<td>#=line[i].customer#</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].issued_date),"dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].quantity, "c2")# #=line[i].measurement#</td>
			<td style="text-align: right;">#=kendo.toString(parseFloat(line[i].price), "c2", banhji.locale)#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>

	#}#
	<tr>
    	<td colspan="6" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span>Total #: name #</td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalAmount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="7">&nbsp;</td>
    </tr>
</script>
<script id="depositDetailByCustomer" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.deposit_detail_by_customer"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<p data-bind="text: lang.lang.number_of_customer"></p>
									<span data-bind="text: dataSource.total"></span>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.deposit_balance"></p>
									<span data-bind="text: totalAmount"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.type"></th>
									<th data-bind="text: lang.lang.date"></th>
									<th data-bind="text: lang.lang.number"></th>
									<th data-bind="text: lang.lang.reference"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.amount"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.balance"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									 data-bind="source: dataSource"
									 data-auto-bind="false"
									 data-template="depositDetailByCustomer-template"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="depositDetailByCustomer-template" type="text/x-kendo-tmpl">
	<tr>
		<td colspan="5" style="font-weight: bold;">#: name #</td>
    	<td class="right strong" style="color: black;">
    		#=kendo.toString(balance_forward, "c", banhji.locale)#
    	</td>
	</tr>
	#var balance = balance_forward;#
	#for(var i=0; i<line.length; i++){#
		#balance += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important; color: black;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
			</td>
			<td style="color: black;">
				#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#
			</td>
			<td style="color: black;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].number#</a>
			</td>
			<td style="color: black;">
				#if(line[i].reference.length>0){#
					<a href="\#/#=line[i].reference[0].type.toLowerCase()#/#=line[i].reference[0].id#"><i></i> #=line[i].reference[0].number#</a>
				#}#
			</td>
			<td align="right" style="color: black;">
				#=kendo.toString(line[i].amount, "c2", banhji.locale)#
			</td>
			<td class="right" style="color: black;">
				#=kendo.toString(balance, "c2", banhji.locale)#
			</td>
	    </tr>
    #}#
    <tr>
    	<td colspan="5" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span> #: name #</td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(balance, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="cashSaleSummaryByCustomer" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background ">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span>Print/Export</a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>							        								<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2>Cash Sale Summary by Customer</h2>
							<p data-bind="text: displayDate"></p>
						</div>
						<div class="row-fluid">
							<div class="span3">
								<div class="total-customer">
									<p data-bind="text: lang.lang.number_of_customer"></p>
									<span data-bind="text: dataSource.total"></span>
								</div>
							</div>
							<div class="span9">
								<div class="total-sale">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: totalAmount"></sapn>
								</div>
							</div>
						</div>
						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text:lang.lang.customer"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.number_of_cash_sale"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.total_sale"></th>
								</tr>
							</thead>
		            		<tbody  data-role="listview"
		            				data-auto-bind="false"
					                data-template="cashSaleSummaryByCustomer-template"
					                data-bind="source: dataSource" >
					        </tbody>
		            	</table>
		            	<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
		            </div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashSaleSummaryByCustomer-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=cash_sale_count#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="cashSaleDetailByCustomer" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!--PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2>Cash Sale Detail by Customer</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span3">
								<div class="total-customer">
									<p data-bind="text: lang.lang.number_of_customer"></p>
									<span data-bind="text: dataSource.total"></span>
								</div>

							</div>
							<div class="span9">
								<div class="total-sale">
									<p data-bind="text: lang.lang.amount"></p>
									<span data-bind="text: totalAmount"></sapn>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.type"><span></span></th>
									<th data-bind="text: lang.lang.date"><span></span></th>
									<th data-bind="text: lang.lang.reference"><span></span></th>
									<th data-bind="text: lang.lang.memo"><span></span></th>
									<th data-bind="text: lang.lang.amount"><span></span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-template="cashSaleDetailByCustomer-template"
									data-auto-bind="false"
									data-bind="source: dataSource">
							</tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
</script>
<script id="cashSaleDetailByCustomer-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=name#</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: right;">#=line[i].memo#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span> #: name #</td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="cashSaleSummaryByProduct" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!--PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2>Cash Sale by Product/Service</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.total_product_services"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.avg_sale_per_invoice"></p>
										<span data-bind="text: avg_sale"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: total_sale"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th style="text-transform: uppercase;" data-bind="text: lang.lang.item"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.qty"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.amount"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.avg_price"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.avg_cost"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.gross_profit_margin"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-template="cashSaleSummaryByProduct-template"
										 data-auto-bind="false"
										 data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashSaleSummaryByProduct-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=kendo.toString(quantity, "n")# #=measurement#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(avg_price, "c3", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(avg_cost, "c3", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(gpm, "p")#</td>
	</tr>
</script>
<script id="cashSaleDetailByProduct" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!--PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2>Cash Sale Detail by Product/Services</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.total_product_services"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.avg_sale_per_invoice"></p>
										<span data-bind="text: product_sale"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: total_sale"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.type"></th>
									<th data-bind="text:lang.lang.customer"></th>
									<th data-bind="text: lang.lang.invoice_date"></th>
									<th data-bind="text: lang.lang.reference"></th>
									<th data-bind="text: lang.lang.qty"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.price"></th>
									<th data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-template="cashSaleDetailByProduct-template"
										 data-auto-bind="false"
										 data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashSaleDetailByProduct-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td colspan="7">#=name#</td>
	</tr>
	#var totalAmount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		#totalAmount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important; color: black;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].type#</a>
			</td>
			<td style="text-align: left;">#=line[i].customer#</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].issued_date),"dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: left;">#=kendo.toString(line[i].quantity, "n")# #=line[i].measurement#</td>
			<td style="text-align: right;">#=kendo.toString(parseFloat(line[i].price), "c2", banhji.locale)#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>

	#}#
	<tr>
    	<td colspan="6" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span>Total #: name #</td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalAmount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="7">&nbsp;</td>
    </tr>
</script>
<script id="saleSummaryByEmployee" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background ">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span>Print/Export</a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.employee"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Employee.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        								        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2>Sale Summary by Employee</h2>
							<p data-bind="text: displayDate"></p>
						</div>
						<div class="row-fluid">
							<div class="span3">
								<div class="total-customer">
									<p data-bind="text: lang.lang.number_of_customer"></p>
									<span data-bind="text: dataSource.total"></span>
								</div>
							</div>
							<div class="span9">
								<div class="total-sale">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: totalAmount"></sapn>
								</div>
							</div>
						</div>
						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text:lang.lang.employee"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.number_of_invoice"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.number_of_cash_sale"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.total_sale"></th>
								</tr>
							</thead>
		            		<tbody  data-role="listview"
		            				data-auto-bind="false"
					                data-template="saleSummaryByEmployee-template"
					                data-bind="source: dataSource" >
					        </tbody>
		            	</table>
		            	<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
		            </div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleSummaryByEmployee-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=invoice_count#</td>
		<td style="text-align: right;">#=cash_sale_count#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="saleDetailByEmployee" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        								        								        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2>Sale Detail by Employee</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span3">
								<div class="total-customer">
									<p data-bind="text: lang.lang.number_of_customer"></p>
									<span data-bind="text: dataSource.total"></span>
								</div>

							</div>
							<div class="span9">
								<div class="total-sale">
									<p data-bind="text: lang.lang.amount"></p>
									<span data-bind="text: totalAmount"></sapn>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.type"><span></span></th>
									<th data-bind="text: lang.lang.name"><span></span></th>
									<th data-bind="text: lang.lang.date"><span></span></th>
									<th style="text-align: right;" data-bind="text: lang.lang.reference"><span></span></th>
									<th data-bind="text: lang.lang.amount"><span></span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-template="saleDetailByEmployee-template"
									data-auto-bind="false"
									data-bind="source: dataSource">
							</tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
</script>
<script id="saleDetailByEmployee-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=name#</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">
				#=line[i].type#
			</td>
			<td style="padding-left: 20px !important;">
				#=line[i].customer#
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: right;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;" data-bind="text: lang.lang.print_export"></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="4">&nbsp;</td>
    </tr>
</script>
<script id="saleProductDetailByEmployee" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        								        								        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2>Sale Detail by Employee</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span3">
								<div class="total-customer">
									<p data-bind="text: lang.lang.number_of_customer"></p>
									<span data-bind="text: dataSource.total"></span>
								</div>

							</div>
							<div class="span9">
								<div class="total-sale">
									<p data-bind="text: lang.lang.amount"></p>
									<span data-bind="text: total"></sapn>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.type"><span></span></th>
									<th data-bind="text: lang.lang.customer"><span></span></th>
									<th data-bind="text: lang.lang.date"><span></span></th>
									<th style="text-align: right;" data-bind="text: lang.lang.reference"><span></span></th>
									<th data-bind="text: lang.lang.product"><span></span></th>
									<th data-bind="text: lang.lang.qty"><span></span></th>
									<th data-bind="text: lang.lang.price"><span></span></th>
									<th data-bind="text: lang.lang.amount"><span></span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-template="saleProductDetailByEmployee-template"
									data-auto-bind="false"
									data-bind="source: dataSource">
							</tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
</script>
<script id="saleProductDetailByEmployee-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=name#</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">
				#=line[i].type#
			</td>
			<td style="padding-left: 20px !important;">
				#=line[i].customer#
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: right;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="padding-left: 20px !important;">
				#=line[i].product#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].quantity, "n0")#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].price, "c2", banhji.locale)#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;" data-bind="text: lang.lang.print_export"></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="8">&nbsp;</td>
    </tr>
</script>
<script id="customerBalanceSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">
								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
									        <span data-bind="text: lang.lang.as_of"></span>:
									        <input data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd"
													data-bind="value: as_of" />

								            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>
							        	<!--PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.customer_balance_summary"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.open_invoice"></p>
										<span data-bind="text: total_txn"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_customer_balance"></p>
									<span data-bind="text: total_balance"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.customer_name" style="text-transform: uppercase;"></th>
									<th style="text-align: center;text-transform: uppercase;" data-bind="text: lang.lang.no_transaction"></th>
									<th data-bind="text: lang.lang.account_receivable_balance"></th>
								</tr>
							</thead>
		            		<tbody data-role="listview"
		            				data-auto-bind="false"
					                data-template="customerBalanceSummary-template"
					                data-bind="source: dataSource" >
					        </tbody>
		            	</table>
		            	<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
		            </div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerBalanceSummary-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: center;">#=txn_count#</td>
		<td align="right">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="customerBalanceDetail" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>					
					
					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
									        <span data-bind="text: lang.lang.as_of"></span>:
									        <input data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd" 
													data-bind="value: as_of" />

								            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
							
							        	</div>
							        	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds, 
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>													
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!--PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.customer_balance_detail"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.open_invoice"></p>
										<span data-bind="text: total_txn"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_customer_balance"></p>
									<span data-bind="text: total_balance"></span>						
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.type"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.invoice_date"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.reference"></th>		
									<th data-bind="text: lang.lang.receivable_balance"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-auto-bind="false"
										 data-bind="source: dataSource"										 
										 data-template="customerBalanceDetail-template"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerBalanceDetail-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td colspan="4">#=name#</td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += kendo.parseFloat(line[i].amount);#
		<tr>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
			</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>			
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;" data-bind="text: lang.lang.total"></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="4">&nbsp;</td>
    </tr>
</script>
<script id="receivableAgingSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
									        <span data-bind="text: lang.lang.as_of"></span>:
									        <input data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd"
													data-bind="value: as_of" />

								            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>
								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.customers,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!--PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.receivable_aging_summary"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row">
							<div class="span3" style="padding-right: 0;">
								<div class="total-customer">
									<p data-bind="text: lang.lang.number_of_customer"></p>
									<span data-format="n0" data-bind="text: dataSource.total"></span>
								</div>
							</div>
							<div class="span9">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_customer_balance"></p>
									<span data-bind="text: totalBalance"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.name"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.current"></th>
									<th style="text-align: right;"><span>1-30</span></th>
									<th style="text-align: right;"><span>31-60</span></th>
									<th style="text-align: right;"><span>61-90</span></th>
									<th style="text-align: right;"><span data-bind="text: lang.lang.over"></span> 90</th>
									<th style="text-align: right;" data-bind="text: lang.lang.total"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-auto-bind="false"
								 	data-bind="source: dataSource"
								 	data-template="receivableAgingSummary-template"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="receivableAgingSummary-template" type="text/x-kendo-template" >
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=kendo.toString(current, "c2", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(in30, "c2", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(in60, "c2", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(in90, "c2", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(over90, "c2", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(total, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="receivableAgingDetail" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
									        <span data-bind="text: lang.lang.as_of"></span>:
									        <input data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd"
													data-bind="value: as_of" />

								            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filters -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.customers,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!--PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.receivable_aging_detail"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row">
							<div class="span3" style="padding-right: 0;">
								<div class="total-customer">
									<p data-bind="text: lang.lang.number_of_customer"></p>
									<span data-format="n0" data-bind="text: dataSource.total"></span>
								</div>
							</div>
							<div class="span9">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_customer_balance"></p>
									<span data-bind="text: totalBalance"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.type"><span>Type</span></th>
									<th data-bind="text: lang.lang.invoice_date"><span>Invoice Date</span></th>
									<th data-bind="text: lang.lang.due_date"><span>Due Date</span></th>
									<th data-bind="text: lang.lang.reference"><span>Reference</span></th>
									<th style="text-align: center;" data-bind="text: lang.lang.status"><span>Status</span></th>
									<th style="text-align: right;" data-bind="text: lang.lang.amount"><span>Amount</span></th>
									<th style="text-align: right;" data-bind="text: lang.lang.balance"><span>Balance</span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
								 data-auto-bind="false"
								 data-bind="source: dataSource"
								 data-template="receivableAgingDetail-template"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="receivableAgingDetail-template" type="text/x-kendo-tmpl">
	<tr>
		<td colspan="7" style="font-weight: bold; color: black;">#: name #</td>
	</tr>
	#var totalBalance = 0;#
	#for(var i = 0; i < line.length; i++){#
	#totalBalance += line[i].amount;#
	<tr>
		<td style="padding-left: 20px !important;">
			<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
		</td>
		<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
		<td>#=kendo.toString(new Date(line[i].due_date), "dd-MM-yyyy")#</td>
		<td><a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].number#</a></td>
		<td style="text-align: right;">
    		#if(line[i].type==="Cash_Receipt"){#
				PMT
			#}else if(line[i].type==="Sale_Return"){#
				Returned
        	#}else{#
        		#if(line[i].status==="0" || line[i].status==="2") {#
					# var date = new Date(), dueDates = new Date(line[i].due_date).getTime(), toDay = new Date(date).getTime(); #
					#if(dueDates < toDay) {#
						Over Due #:Math.floor((toDay - dueDates)/(1000*60*60*24))# days
					#} else {#
						#:Math.floor((dueDates - toDay)/(1000*60*60*24))# days to pay
					#}#
				#}else{#
					Paid
				#}#
        	#}#
		</td>
		<td style="text-align: right;">
			#=kendo.toString(line[i].amount, "c2", banhji.locale)#
		</td>
		<td style="text-align: right;">
			#=kendo.toString(totalBalance, "c2", banhji.locale)#
		</td>
	</tr>
    #}#
    <tr>
    	<td colspan="6" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalBalance, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="7">&nbsp;</td>
    </tr>
</script>
<script id="collectInvoice" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab" data-bind="click: printGrid"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
									        <span data-bind="text: lang.lang.as_of"></span>:
									        <input data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd"
													data-bind="value: as_of" />

								            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>
								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.customers,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.list_of_invoices_to_be_collected"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span3">
								<div class="total-customer">
									<p data-bind="text: lang.lang.number_of_invoice"></p>
									<span data-bind="text: total_txn"></span>
								</div>
							</div>
							<div class="span9">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_amount"></p>
									<span data-bind="text: totalAmount"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.date"></th>
									<th data-bind="text: lang.lang.type"></th>
									<th data-bind="text: lang.lang.number"></th>
									<th style="text-align: center;" data-bind="text: lang.lang.status"></th>
									<th data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-auto-bind="false"
								 	data-bind="source: dataSource"
								 	data-template="collectInvoice-template"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="collectInvoice-template" type="text/x-kendo-template">
	<tr>
		<td colspan="5" style="font-weight: bold; color: black;">#: name #</td>
	</tr>
	# var totalAmount = 0;#
	#for(var i=0; i<line.length; i++){#
		#totalAmount += line[i].amount;#
		<tr>
			<td>&nbsp;&nbsp; #=kendo.toString(new Date(line[i].issued_date),"dd-MM-yyyy")#</td>
			<td><a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].type#</a></td>
			<td><a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a></td>
			<td style="text-align: center;">
				# var date = new Date(), dueDates = new Date(line[i].due_date).getTime(), toDay = new Date(date).getTime(); #
				#if(dueDates < toDay) {#
					<span data-bind="text: lang.lang.over_due"></span> #:Math.floor((toDay - dueDates)/(1000*60*60*24))# <span data-bind="text: lang.lang.days"></span>
				#} else {#
					#:Math.floor((dueDates - toDay)/(1000*60*60*24))# <span data-bind="text: lang.lang.days_to_pay"></span>
				#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="4" style="font-weight: bold; color: black;" data-bind="text: lang.lang.total">Total</td>
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalAmount, "c2", banhji.locale)#
    	</td>
    </tr>
	<tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="collectionReport" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab" data-bind="click: printGrid"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.customers,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.collection_report"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span3" style="padding: 0;">
								<div class="total-customer">
									<p>Number Of Receipt</p>
									<span data-format="n0" data-bind="text: total_txn"></span>
								</div>
							</div>
							<div class="span9" style="padding-right: 0;">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_amount"></p>
									<span data-bind="text: totalAmount"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.receipt_date"></th>
									<th data-bind="text: lang.lang.receipt_number"></th>
									<th data-bind="text: lang.lang.check_no"></th>
									<th data-bind="text: lang.lang.receipt_amount"></th>
									<th data-bind="text: lang.lang.invoice_date"></th>
									<th data-bind="text: lang.lang.invoice_number"></th>
									<th data-bind="text: lang.lang.invoice_amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
								 data-auto-bind="false"
								 data-bind="source: dataSource"
								 data-template="collectionReport-template"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="collectionReport-template" type="text/x-kendo-template">
	<tr>
		<td colspan="7" style="font-weight: bold; color: black;">#: name #</td>
	</tr>
	# var totalReceived = 0;#
	#for(var i=0; i<line.length; i++){#
		#totalReceived += line[i].amount;#
		<tr>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td><a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a></td>
			<td>#=line[i].check_no#</td>
			<td style="text-align: center;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
			<td>#=kendo.toString(new Date(line[i].reference_issued_date), "dd-MM-yyyy")#</td>
			<td><a href="\#/#=line[i].reference_type.toLowerCase()#/#=line[i].reference_id#">#=line[i].reference_number#</a></td>
			<td style="text-align: right;">#=kendo.toString(line[i].reference_amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="3" style="font-weight: bold; color: black;" data-bind="text: lang.lang.total">Total</td>
    	<td style="text-align: center; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalReceived, "c2", banhji.locale)#
    	</td>
    	<td colspan="3"></td>
    </tr>
	<tr>
    	<td colspan="7">&nbsp;</td>
    </tr>
</script>
<script id="invoiceList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab" data-bind="click: printGrid"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
								        	<table class="table table-condensed">
												<tr>
													<td style="width: 50px;"><span data-bind="text: lang.lang.reference"></span></td>
													<td>
														<input data-role="dropdownlist"
												           data-value-primitive="true"
												           data-text-field="text"
												           data-value-field="value"
												           data-bind="value: type,
												                      source: typeList"
												           style="width: 100%" />
													</td>
													<td style="width: 50px;"><span data-bind="text: lang.lang.customers"></span></td>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.invoice_list"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_balance"></p>
									<span data-bind="text: totalAmount"></span>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.number_of_invoice"></p>
										<span data-bind="text: invoiceCount"></span>
									</div>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.type"></th>
									<th data-bind="text: lang.lang.date"></th>
									<th data-bind="text: lang.lang.number"></th>
									<th data-bind="text: lang.lang.reference"></th>
									<th data-bind="text: lang.lang.due_date"></th>
									<th style="text-align: center;" data-bind="text: lang.lang.status"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-template="invoiceList-template"
									data-auto-bind="false"
									data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="invoiceList-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td colspan="7">#=name#</td>
	</tr>
	# var totalAmount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# totalAmount += line[i].amount;#
		<tr>
			<td><a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].type#</a></td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].issued_date),"dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="color: black;">
				#if(line[i].reference.length>0){#
					#for(var j= 0; j < line[i].reference.length; j++) {#
						<a href="\#/#=line[i].reference[j].type.toLowerCase()#/#=line[i].reference[j].id#"><i></i> #=line[i].reference[j].number#</a>
					#}#
				#}#
			</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].due_date),"dd-MM-yyyy")#</td>
			<td style="text-align: right;">
				#if(line[i].status==="0" || line[i].status==="2") {#
    				# var date = new Date(), dueDate = new Date(line[i].due_date).getTime(), toDay = new Date(date).getTime(); #
					#if(dueDate < toDay) {#
						<span data-bind="text: lang.lang.over_due"></span> #:Math.floor((toDay - dueDate)/(1000*60*60*24))# <span data-bind="text: lang.lang.days"></span>
					#} else {#
						#:Math.floor((dueDate - toDay)/(1000*60*60*24))# <span data-bind="text: lang.lang.days_to_pay"></span>
					#}#
				#} else if(line[i].status==="1") {#
					<span data-bind="text: lang.lang.paid"></span>
				#} else if(line[i].status==="3") {#
					<span data-bind="text: lang.lang.returned"></span>
				#}#

			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>

	#}#
	<tr>
    	<td colspan="6" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span> #=name#</td>
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalAmount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="7">&nbsp;</td>
    </tr>
</script>
<script id="customerList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">

										</span></a></li>
									</ul>
								</div>
								<div class="widget-body">
									<div class="tab-content">
							        <!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: institute.name"></h3>
							<h2 data-bind="text: lang.lang.customer_list"></h2>
						</div>
						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th><span>Customer ID</span></th>
									<th><span data-bind="text: lang.lang.customer_name"></span></th>
									<th><span data-bind="text: lang.lang.type"></span></th>
									<th><span data-bind="text: lang.lang.address"></span></th>
									<th><span data-bind="text: lang.lang.phone"></span></th>
									<th><span data-bind="text: lang.lang.email"></span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-bind="source: dataSource"
										 data-template="customerList-temp"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: contact"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerList-temp" type="text/x-kendo-template" >
	# kendo.culture(banhji.customerSale.locale); #
	<tr>
		<td>#=abbr+number#</td>
		<td>#=name#</td>
		<td>#=contact_type#</td>
		<td>#=address#</td>
		<td>#=phone#</td>
		<td style="text-align: right;">#=email#</td>
	</tr>
</script>
<script id="customerBalance" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">

					<div class="box-generic hidden-print">

						<span class="pull-right glyphicons no-js remove_2"
							onclick="javascript:window.history.back()"><i></i></span>

						Type:
						<input data-role="dropdownlist"
						   data-option-label="Select Type..."
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: contact_type_id,
		                              source: contactTypeDS" />

		                Status:
		                <input data-role="dropdownlist"
						   data-option-label="Select Status..."
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: status,
		                              source: statusList" />

		                As of Date:
		                <input data-role="datepicker"
		                   data-format="dd-MM-yyyy"
		                   data-parse-formats="yyyy-MM-dd"
		                   data-bind="value: date"
		                   placeholder="Pick A Date..." />

						<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> |
						<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>
					</div>

					<br>

					<h3 align="center">Customer Balance</h3>

					<br>

					<div class="row-fluid row-merge">
						<div class="col-md-6">
							<div class="innerAll padding-bottom-none-phone">
								<a href="" class="widget-stats widget-stats-gray widget-stats-4">
									<span class="txt">Total Customer </span>
									<span class="count" data-format="n0" data-bind="text: dataSource.total()"></span>
									<span class="glyphicons user"><i></i></span>
									<div class="clearfix"></div>
									<i class="icon-play-circle"></i>
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="innerAll padding-bottom-none-phone">
								<a href="" class="widget-stats widget-stats-primary widget-stats-4">
									<span class="txt">Total Balance As Of <span data-format="dd-MM-yyyy" data-bind="text: date"></span> </span>
									<span class="count" data-bind="text: total"></span>
									<span class="glyphicons coins"><i></i></span>
									<div class="clearfix"></div>
									<i class="icon-play-circle"></i>
								</a>
							</div>
						</div>
					</div>

					<br>

					<div data-role="grid"
						 data-auto-bind="false"
						 data-groupable="true"
						 data-sortable="true"
						 data-pageable="true"
		                 data-columns="[
                            { field: 'number', title:'Number' },
                            { field: 'fullname', title:'Name' },
                            { field: 'contact_type_id', title:'Type', template:'#=contact_type#' },
                            { field: 'balance', title:'Balance',
                            	template:'#=kendo.toString(balance, &quot;c0&quot;, banhji.locale)#',
                            	attributes:{style:'text-align:right;'}
                            }
                         ]"
		                 data-bind="source: dataSource"></div>

				</div> <!-- //End div example-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>
</script>
<script id="saleJobEngagement" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i>Date</a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i>Filter</a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab" data-bind="click: printGrid"><i></i>Print/Export</a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">
								        <div class="tab-pane active" id="tab-1">
											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
									    </div>
									    <div class="tab-pane" id="tab-2">
								        	<select data-role="multiselect"
								        		   data-item-template="contact-list-tmpl"
												   data-value-primitive="true"
												   data-value-field="id"
												   data-text-field="name"
												   data-bind="value: customerList,
												   			source: customerDS"
												   data-placeholder="Add Customer..."
												   style="width: 100%" /></select>
									    </div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2>Sale by Job/Engagement</h2>
							<p>From <span data-bind="text: displayDateStart"></span> to <span data-bind="text: displayDateEnd"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<p>Number of Job Sale</p>
									<span data-bind="text: count"></span>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
										<p>Amount</p>
										<span data-bind="text: total"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th><span>Job</span></th>
									<th style="text-align: right;"><span>Name</span></th>
									<th style="text-align: right;"><span>Type</span></th>
									<th style="text-align: right;"><span>Date</span></th>
									<th style="text-align: right;"><span>Reference</span></th>
									<th><span>Amount</span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-bind="source: saleJob.dataSource"
										 data-template="saleJobEngagement-temp"
							></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleJobEngagement-temp" type="text/x-kendo-template" >
	# kendo.culture(banhji.customerSale.locale); #
	<tr>
		# var myDate = kendo.toString(new Date(date),'dd-MM-yyyy'); #
		<td>#=job#</td>
		<td style="text-align: right;">#=name#</td>
		<td style="text-align: right;">#=type#</td>
		<td style="text-align: right;">#=myDate#</td>
		<td style="text-align: right;">
			<a href="\#/#=type.toLowerCase()#/#=id#">#=number#</a>
		</td>
		<td align="right">#=kendo.toString(amount, 'c2')#</td>
	</tr>
</script>
<script id="saleOrderList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i><span data-bind="text: lang.lang.print"></span></span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		<span data-bind="text: lang.lang.export_to_excel"></span>
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.sale_order_list"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.order"></p>
										<span data-bind="text: orderCount"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.amount"></p>
									<span data-bind="text: totalAmount"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.number"></th>
									<th data-bind="text: lang.lang.reference"></th>
									<th data-bind="text: lang.lang.date"></th>
									<th style="text-align: center;" data-bind="text: lang.lang.status"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-template="saleOrderList-template"
									data-auto-bind="false"
									data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleOrderList-template" type="text/x-kendo-template">
	<tr style="font-weight: bold; color: black;">
		<td colspan="5">#=name#</td>
	</tr>
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td>
				#if(line[i].reference.length>0){#
					<a href="\#/#=line[i].reference[0].type.toLowerCase()#/#=line[i].reference[0].id#"><i></i> #=line[i].reference[0].number#</a>
				#}#
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: center;">
        		#if(line[i].status==="0"){#
        			Open
        		#}else{#
        			Used
        		#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="4" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span> #=name#</td>
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="saleOrderDetailByProduct" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.saleOrder_detail_by_product"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.total_product_services"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.avg_sale_per_invoice"></p>
										<span data-bind="text: product_sale"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: total_sale"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.type"></th>
									<th data-bind="text:lang.lang.customer"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.invoice_date"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.reference"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.qty"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.price"></th>
									<th data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-template="saleOrderDetailByProduct-template"
										 data-auto-bind="false"
										 data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleOrderDetailByProduct-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td colspan="7">#=name#</td>
	</tr>
	#var totalAmount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		#totalAmount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important; color: black;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].type#</a>
			</td>
			<td>#=line[i].customer#</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].issued_date),"dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].quantity, "c2")# #=line[i].measurement#</td>
			<td style="text-align: right;">#=kendo.toString(parseFloat(line[i].price), "c2", banhji.locale)#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>

	#}#
	<tr>
    	<td colspan="6" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span>Total #: name #</td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalAmount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="7">&nbsp;</td>
    </tr>
</script>
<script id="draftTransaction" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>							        								    <!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2>Draft Transaction</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span3">
								<div class="total-customer">
									<p data-bind="text: lang.lang.number_of_customer"></p>
									<span data-bind="text: dataSource.total"></span>
								</div>

							</div>
							<div class="span9">
								<div class="total-sale">
									<p data-bind="text: lang.lang.amount"></p>
									<span data-bind="text: totalAmount"></sapn>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.type"><span></span></th>
									<th data-bind="text: lang.lang.date"><span></span></th>
									<th data-bind="text: lang.lang.reference"><span></span></th>
									<th data-bind="text: lang.lang.action"><span></span></th>
									<th data-bind="text: lang.lang.amount"><span></span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-template="draftTransaction-template"
									data-auto-bind="false"
									data-bind="source: dataSource">
							</tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
</script>
<script id="draftTransaction-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=name#</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td>
	        	#if(line[i].status=="4") {#
					<a href="\#/#=line[i].type.toLowerCase()#/#=id#"><i></i> Use</a>
	    		#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;" data-bind="text: lang.lang.print_export"></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="customerGroup" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="padding-bottom: 15px;">
			<div class="container-960">
				<div id="example" class="k-content">

					<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<div class="row">
						<div class="span6">
							<h2 style="margin-bottom: 15px;">CUSTOMER GROUP</h2>
							<div style="overflow: hidden">
								<div class="span6" style="padding-left: 0;">
									<input type="text" class="k-textbox"
										data-bind="value: textSearch"
										placeholder="Number / Name... " style="width: 92%; margin-bottom: 15px;"/>

									<input data-role="dropdownlist"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-auto-bind="false"
						                   data-bind="value: contact_type_id,
						                              source: contactTypeDS"
						                   data-option-label="Select Type..."
						                   style="width: 78%;" />

						            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

								</div>
								<div class="span6">
									<input type="text" class="k-textbox"
										data-bind="value: obj.name"
										placeholder="Group Name... " style="width: 100%; margin-bottom: 15px;"/>

									<div style="margin-bottom: 15px; float: right;">
										<span class="k-button" data-bind="click: save">Save</span>
										<span class="k-button" data-bind="click: cancel">Cancel</span>
									</div>

								</div>
							</div>

					    	<select id="listbox1" data-role="listbox"
				                data-text-field="name"
				                data-value-field="id"
				                data-toolbar='{
				                	tools: ["moveUp", "moveDown", "transferTo", "transferFrom", "transferAllTo", "transferAllFrom", "remove"]
				            	}'
				                data-connect-with="listbox2"
				                data-auto-bind="false"
				                data-bind="source: contactDS" style="width: 50%; min-height: 550px;">
				            </select>

				            <select id="listbox2" data-role="listbox"
				                data-connect-with="listbox1"
				                data-text-field="name"
				                data-value-field="id"
				                data-auto-bind="false"
				                data-bind="source: obj.contacts"
				                style="width: 49%; min-height: 550px;">
				            </select>

				            <br>

				            <div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: contactDS"></div>
						</div>
						<div class="span6" style="padding-left:0; margin-top: 35px;">

							<table class="table table-bordered table-primary table-striped table-vertical-center">
						        <thead>
						            <tr>
						                <th><span data-bind="text: lang.lang.name"></span></th>
						                <th><span>Number of Customer</span></th>
						                <th></th>
						            </tr>
						        </thead>
						        <tbody data-role="listview"
						        		data-template="customerGroup-template"
						        		data-auto-bind="false"
						        		data-bind="source: dataSource"></tbody>
						    </table>

				            <div id="ntf1" data-role="notification"></div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerGroup-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>#=name#</td>
		<td class="right">#=contacts.length#</td>
		<td>
			<span class="k-button" data-bind="click: edit">View/Edit</span>
		</td>
    </tr>
</script>
<script id="contactAssignee" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="padding-bottom: 15px;">
			<div class="container-960">
				<div id="example" class="k-content">

					<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>

					<div class="row">
						<div class="span6">
							<h2 style="margin-bottom: 15px;">SALE REP. ASSIGMENT</h2>
							<div style="overflow: hidden">
								<div class="span6" style="padding-left: 0;">
									<input type="text" class="k-textbox"
										data-bind="value: textSearch"
										placeholder="Number / Name... " style="width: 92%; margin-bottom: 15px;"/>

									<input data-role="dropdownlist"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-auto-bind="false"
						                   data-bind="value: contact_type_id,
						                              source: contactTypeDS"
						                   data-option-label="Select Type..."
						                   style="width: 78%;" />

						            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

								</div>
								<div class="span6">
									<input data-role="dropdownlist"
										   data-value-primitive="false"
						                   data-auto-bind="false"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.assignee,
						                              source: employeeDS"
						                   data-option-label="Select Employee..."
						                   required data-required-msg="required" style="width: 100%;" />

									<div style="margin-bottom: 15px; float: right;">
										<span class="k-button" data-bind="click: save">Save</span>
										<span class="k-button" data-bind="click: cancel">Cancel</span>
									</div>

								</div>
							</div>

					    	<select id="listbox1" data-role="listbox"
				                data-text-field="name"
				                data-value-field="id"
				                data-toolbar='{
				                	tools: ["moveUp", "moveDown", "transferTo", "transferFrom", "transferAllTo", "transferAllFrom", "remove"]
				            	}'
				                data-connect-with="listbox2"
				                data-auto-bind="false"
				                data-bind="source: contactDS" style="width: 50%; min-height: 550px;">
				            </select>

				            <select id="listbox2" data-role="listbox"
				                data-connect-with="listbox1"
				                data-text-field="name"
				                data-value-field="id"
				                data-auto-bind="false"
				                data-bind="source: obj.contacts"
				                style="width: 49%; min-height: 550px;">
				            </select>

				            <br>

				            <div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: contactDS"></div>
						</div>
						<div class="span6" style="padding-left:0; margin-top: 35px;">

							<div data-role="grid"
				                 data-columns="[
	                                 { 'field': 'assignee', 'title': 'EMPLOYEE', template:'#=assignee.name#' },
	                                 { 'field': 'contacts', 'title': 'TOTAL CUSTOMER', template:'#=contacts.length#' },
	                                 { 'title': '', template:'<button data-bind=click:edit>VIEW / EDIT</button>' }
	                              ]"
				                 data-bind="source: dataSource"></div>

				            <div id="ntf1" data-role="notification"></div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleOrderDetailbyCustomer" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2>Sale Order Detail by Customer</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									
								
										<p data-bind="text: lang.lang.order"></p>
										<span data-bind="text: dataSource.total"></span>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: total_sale"></span>
								</div>
							</div>
						</div>

						<div class="costom-grid"
							 data-role="grid"
							 data-sortable="true"
	                         data-column-menu="true"
			                 data-columns="[
                                { field: 'name', title:'NAME',  width: 200 },
                                { field: 'number', title:'NUMBER' },
                                { field: 'item', title:'ITEM',  width: 200  },                                
                                { 
                                	field: 'issued_date', 
                                	title:'DATE', 
                                	template: '#= kendo.toString(new Date(issued_date), \'dd/MM/yyyy\') # ',
                                	attributes: {
								      	style: 'text-align: right;'
								    },
                                },
                                { 
                                	field: 'quantity', 
                                	title:'QUANTITY',
                                	format: '{0:n}', 
                                	attributes: {
								      	style: 'text-align: right;'
								    },
								    width: 120
                                },
                                { 
                                	field: 'amount', 
                                	title:'AMOUNT',
                                	format: '{0:n}',
                                	attributes: {
								      	style: 'text-align: right;'
								    },
								    width: 200 
                                }
                             ]"
                             data-auto-bind="false"
			                 data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleOrderDetailbyItem" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
													<td style="padding: 8px 0 0 0 !important;">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2>Sale Order Detail by Item</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
										<p data-bind="text: lang.lang.total_product_services"></p>
										<span data-bind="text: dataSource.total"></span>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: total_sale"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text:lang.lang.item"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.name"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.date"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.status"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.qty"></th>
									<th data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-template="saleOrderDetailbyItem-template"
										 data-auto-bind="false"
										 data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleOrderDetailbyItem-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td colspan="6">#=name#</td>
	</tr>
	#for(var i= 0; i <line.length; i++) {#
		<tr>
			<td></td>
			<td>#=line[i].customer_name#</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].issued_date),"dd-MM-yyyy")#</td>
			<td>
				#if(line[i].status=== 0){#
					Open
				#}else if(line[i].status==="1"){#
				    Used
        		#}else{#
					Paid
        		#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].quantity, "c2")#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>

	#}#
</script>
<script id="saleOrderDetailbyEmployee" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

											<input data-role="dropdownlist"
												   class="sorter"
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
													<td style="padding: 8px 0 0 0 !important;">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2>Sale Order Detail by Employee</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
										<p data-bind="text: lang.lang.total_product_services"></p>
										<span data-bind="text: dataSource.total"></span>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: total_sale"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text:lang.lang.employee"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.name"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.date"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.status"></th>
									<th data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-template="saleOrderDetailbyEmployee-template"
										 data-auto-bind="false"
										 data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleOrderDetailbyEmployee-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td colspan="6">#=name#</td>
	</tr>
	#for(var i= 0; i <line.length; i++) {#
		<tr>
			<td></td>
			<td>#=line[i].customer_name#</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].issued_date),"dd-MM-yyyy")#</td>
			<td>
				#if(line[i].status=== 0){#
					Open
				#}else if(line[i].status==="1"){#
				    Used
        		#}else{#
					Paid
        		#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>

	#}#
</script>

<!--Invoice Form-->
<script id="invoiceForm" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2"
							data-bind="click: cancel"><i></i></span>
					</div>
			        <h2>PREVIEW FORM</h2>
				    <br>
				    <div class="row" style="margin-left:0;">
						<div class="span10" id="invFormContent" style="min-height: 300px;border:1px solid #ccc; margin: 0 auto;float:none;padding-bottom:20px;margin-bottom: 30px;">
							<div id="loading-inv" style="margin-left: -15px;text-align: center;position: absolute;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
								<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
							</div>
						</div>
					</div>
					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<span id="notification"></span>

						<span id="savePrint" class="btn btn-icon btn-primary glyphicons print" data-bind="click: printGrid" style="width: 80px; float: right; color: #fff; border: 0;"><i></i>Print / PDF</span>
						<!--span id="savePDF" class="btn btn-icon btn-success glyphicons edit" data-bind="click: savePDF" style="width: 120px;"><i></i> Save PDF</span-->
					</div>
					<!-- // Form actions END -->
				</div>
			</div>
		</div>
	</div>
</script>
<script id="invoiceForm1" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 50%;float: left;">
                <h3 style="text-align:left;" data-bind="html: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span style="font-size: 12px;" data-bind="text: company.telephone"></span></p>
                    <p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span  data-bind="text: company.address"></span></p>
                </div>
            </div>
           	<!-- <div style="float: right; width: 20%;">
           		<div id="invQR"></div>
           	</div> -->
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<!-- <div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 100%;">
                        	<p >
                        		<span style="font-size: 12px; font-weight: 700px;" data-bind="text: contactDS.data()[0].name"></span><br>
                        		<span data-bind="text: contactDS.data()[0].address"></span>
                        	</p>
                        	<p style="font-size: 10px;">Job: <span  data-bind="text: company.address"></span></p>
                        	<p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span  data-bind="text: company.address"></span></p>
                        </div>
                    </div>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 100%;">
                        	<sapne style="font-weight:bold" data-bind="text: contactDS.data()[0].phone"></p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<span style="font-weight:bold" data-bind="text: obj.number"></span>-<span style="font-weight:bold" data-bind="text: company.id"></span>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div> -->
                <div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
                        	គំរោង Job : <span data-bind="text: contactDS.data()[0].job"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: contactDS.data()[0].vat_no"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number" style="width: 42%;">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<span style="font-weight:bold" data-bind="text: obj.number"></span>-<span style="font-weight:bold" data-bind="text: company.id"></span>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប (បូក​បញ្ចូល​ទាំង​អាករ)​ Total (VAT included)</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm2" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 50%;float: left;">
            	<h2 ></h2>
                <h3 style="text-align:left;" data-bind="html: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                	<p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span></p>
                </div>
            </div>
           	<!-- <div style="float: right; width: 20%;">
           		<div id="invQR"></div>
           	</div> -->
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រអាករ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
                        	គំរោង Job : <span data-bind="text: contactDS.data()[0].job"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: contactDS.data()[0].vat_no"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number" style="width: 42%;">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<span style="font-weight:bold" data-bind="text: obj.number"></span>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>

        	<div class="clear inv2">
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<!--script id="invoiceForm3" type="text/x-kendo-template">
	<div class="inv1 sale-order">
    	<div class="head">
        	<h1>Sale Order</h1>
        	<div class="span12">
        		<div class="span10" style="text-align:right;">
        			Date : <br>
        			SONo :
        		</div>
        		<div class="span2" style="text-align:left;padding-left: 10px;">
        			<p data-bind="text: obj.issued_date"></p>
        			<p data-bind="text: obj.number"></p>
        		</div>
        	</div>
        </div>
        <div class="content clear">
        	<table class="span12">
        		<thead>
        			<tr>
	        			<th colspan="2">
	        				CUSTOMER INFORMATION
	        			</th>
	        			<th colspan="2">
	        				DELIVERED TO ADDRESS
	        			</th>
	        		</tr>
        		</thead>
        		<tbody>
        			<tr style="height: 100px">
        				<td colspan="2">
        					<p><span data-bind="text: obj.contact[0].name"></span><br>
        					<b>Address: </b> <span data-bind="text: obj.contact[0].address"></span>
	        			</td>
	        			<td colspan="2">
	        				<p><span data-bind="text: obj.contact[0].name"></span><br>
        					<b>Address: </b> <span data-bind="text: obj.contact[0].address"></span>
	        			</td>
        			</tr>
        			<tr>
	        			<td class="span3">TERM OF PAYMENT</td>
	        			<td class="span3"></td>
	        			<td class="span3">DELIVERY DATE</td>
	        			<td class="span3" data-bind="text: obj.issued_date"></td>
	        		</tr>
	        		<tr>
	        			<td class="span3">MODE OF PAYMENT</td>
	        			<td class="span3"></td>
	        			<td class="span3">TERM OF DELIVERY</td>
	        			<td class="span3"></td>
	        		</tr>
        		</tbody>
        	</table>
        	<table class="span12" style="margin-top: 5px;">
        		<thead>
        			<tr>
	        			<th data-bind="style: {backgroundColor: obj.color}">
	        				Item <br>Code
	        			</th>
	        			<th data-bind="style: {backgroundColor: obj.color}">
	        				Description
	        			</th>
	        			<th width="70" data-bind="style: {backgroundColor: obj.color}">
	        				Required<br>Date
	        			</th>
	        			<th width="40" data-bind="style: {backgroundColor: obj.color}">
	        				UM
	        			</th>
	        			<th width="40" data-bind="style: {backgroundColor: obj.color}">
	        				QTY
	        			</th>
	        			<th width="100" data-bind="style: {backgroundColor: obj.color}">
	        				Unit Price
	        			</th>
	        			<th width="70" data-bind="style: {backgroundColor: obj.color}">
	        				Total
	        			</th>
	        		</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template3"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td colspan="4" rowspan="4" style="text-align:left;padding-left:20px;">
	        				<b>Note:</b><br>
	        				<li>
								<li>Please notify us immediately if you are unable to deliver as specified.</li>
								<li>Check will be used to settled this order if the settled amount is equal to or greater than 500 USD</li>
								<li>Please send all correspondence to address above.</li>
							</ol>
        				</td>
        				<td style="text-align:left;padding-left:20px;" colspan="2"><b>SUB TOTAL</b></td>
        				<td data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td style="text-align:left;padding-left:20px;" colspan="2"><b>VAT​(10%) if applicable</b></td>
        				<td data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td style="text-align:left;padding-left:20px;" colspan="2"><b>Other charges</b></td>
        				<td></td>
        			</tr>
        			<tr>
        				<td style="text-align:left;padding-left:20px;" colspan="2"><b>Total</b></td>
        				<td data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<div class="span12 clear" style="margin-top: 15px">
	        	<div class="span6">
	        		<div class="span6">
	        			<p>Approved by: </p>
	        			<p style="margin-top: 40px;padding-top: 5px;width: 80%;border-top: 1px solid #000;">Name:<br>Date:<p>
	        		</div>
	        		<div class="span6">
	        			<p>Recieved by: </p>
	        			<p style="margin-top: 40px;padding-top: 5px;width: 80%;border-top: 1px solid #000;">Name:<br>Date:<p>
	        		</div>
	        	</div>
	        	<div class="span6">
	        		<table class="span12">
	        			<tr>
	        				<thead><th>I hereto accept the terms and conditions in the contract and purchase order:</th></thead>
	        			</tr>
	        			<tr><td>Customer Name:</td></tr>
	        			<tr><td>Position:</td></tr>
	        			<tr><td>Date:</td></tr>
	        		</table>
	        	</div>
	        </div>
        </div>
    </div>
</script>
<script id="invoiceForm4" type="text/x-kendo-template">
	<div class="inv1 quotation">
        <div class="content clear">
        	<table class="span12">
        		<tbody>
        			<tr>
        				<td style="border-top: none;border-left: none" width="500" colspan="2" rowspan="3">
        					<h2>Quotation Form</h2>
	        			</td>
	        			<td width="120">
	        				<b>Date</b>
	        			</td>
	        			<td data-bind="text: obj.issued_date"></td>
        			</tr>
        			<tr>
	        			<td ><b>Quotation Form #</b></td>
	        			<td data-bind="text: obj.number"></td>
	        		</tr>
	        		<tr>
	        			<td><b>Requisition #</b></td>
	        			<td></td>
	        		</tr>
	        		<tr>
	        			<td width="150"><b>Customer Name:</b></td>
	        			<td data-bind="text: obj.contact[0].name"></td>
	        			<td ><b>Date of contact:</b></td>
	        			<td ></td>
	        		</tr>
	        		<tr>
	        			<td width="150"><b>Contact Information:</b></td>
	        			<td data-bind="text: obj.contact[0].address"></td>
	        			<td ><b>Time of contact:</b></td>
	        			<td ></td>
	        		</tr>
	        		<tr>
	        			<td width="150"><b>Validity Date</b></td>
	        			<td ></td>
	        			<td ><b>Date price provided </b></td>
	        			<td ></td>
	        		</tr>
        		</tbody>
        	</table>
        	<table class="span12" style="margin-top: 5px;">
        		<thead>
        			<tr>
	        			<th data-bind="style: {backgroundColor: obj.color}">
	        				No
	        			</th>
	        			<th width="70" data-bind="style: {backgroundColor: obj.color}">
	        				Item<br>Code
	        			</th>
	        			<th width="" data-bind="style: {backgroundColor: obj.color}">
	        				Description
	        			</th>
	        			<th width="30" data-bind="style: {backgroundColor: obj.color}">

	        			</th>
	        			<th width="40" data-bind="style: {backgroundColor: obj.color}">
	        				UM
	        			</th>
	        			<th width="40" data-bind="style: {backgroundColor: obj.color}">
	        				QTY
	        			</th>
	        			<th width="80" data-bind="style: {backgroundColor: obj.color}">
	        				Unit Price
	        			</th>
	        			<th width="70" data-bind="style: {backgroundColor: obj.color}">
	        				Extended<br>Price
	        			</th>
	        		</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template4"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="text-align:right;padding-right:10px;" colspan="7"><b>Total</b></td>
        				<td data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<div class="span12 clear" style="margin-top: 10px">
	        	<p><b>Additional Specifications </b></p>
	        	<table class="span12" style="margin-top:10px;">
	        		<tr>
	        			<td colspan="3">
	        			<br><br><br><br>
	        			</td>
	        		</tr>
	        		<tr>
	        			<td colspan="3"><b>Prepared By:<br>Position:<br>Date:</b></td>
	        		</tr>
	        		<tr>
	        			<td rowspan="2">This form is used only when official quotation from supplier is not feasible.<td>
	        			<td>&nbsp;</td>
	        		</tr>
	        		<tr>
	        			<td width="80">&nbsp;</td>
	        			<td width="80">&nbsp;</td>
	        		</tr>
	        	</table>
	        </div>
        </div>
    </div>
</script>
<script id="invoiceForm5" type="text/x-kendo-template">
	<div class="inv1 quotation">
        <div class="content clear">
        	<table class="span12">
        		<tbody>
        			<tr>
        				<td class="main-color" width="300" colspan="4" rowspan="3">
        					<h2>GOODS DELIVERED NOTE </h2>
	        			</td>
	        			<td width="120">
	        				<b>GDN #</b>
	        			</td>
	        			<td width="100">&nbsp;</td>
        			</tr>
        			<tr>
	        			<td ><b>Date</b></td>
	        			<td data-bind="text: obj.issued_date"></td>
	        		</tr>
	        		<tr>
	        			<td><b>SO/ CONTRACT #</b></td>
	        			<td></td>
	        		</tr>
	        		<tr>
	        			<td width="90"><b>Name</b></td>
	        			<td width="80" data-bind="text: obj.contact[0].name"></td>
	        			<td width="90"><b>CODE</b></td>
	        			<td width="80"></td>
	        			<td ><b>CUSTOMER<br>INVOICE #</b></td>
	        			<td data-bind="text: obj.number"></td>
	        		</tr>
	        		<tr>
	        			<td ><b>ADDRESS</b></td>
	        			<td colspan="3" data-bind="text: obj.contact[0].address"></td>
	        			<td><b>DELIVERY NOTE #</b></td>
	        			<td ></td>
	        		</tr>
        		</tbody>
        	</table>
        	<table class="span12" style="margin-top: 5px;">
        		<thead>
        			<tr>
	        			<th rowspan="2" width="70" data-bind="style: {backgroundColor: obj.color}">
	        				Item<br>Code
	        			</th>
	        			<th rowspan="2" data-bind="style: {backgroundColor: obj.color}">
	        				DESCRIPTION
	        			</th>
	        			<th rowspan="2" data-bind="style: {backgroundColor: obj.color}">
	        				INSPECTION<br>CRITERIA
	        			</th>
	        			<th colspan="5" data-bind="style: {backgroundColor: obj.color}">
	        				QUANTITY
	        			</th>
	        		</tr>
	        		<tr>
	        			<th data-bind="style: {backgroundColor: obj.color}"><b style="font-size:10px">ORDERED</b></th>
	        			<th data-bind="style: {backgroundColor: obj.color}"><b style="font-size:10px">RECEIVED</b></th>
	        			<th data-bind="style: {backgroundColor: obj.color}"><b style="font-size:10px">INSPECTED</b></th>
	        			<th data-bind="style: {backgroundColor: obj.color}"><b style="font-size:10px">ACCEPTED</b></th>
	        			<th data-bind="style: {backgroundColor: obj.color}"><b style="font-size:10px">REJECTED</b></th>
	        		</tr>
        		</thead>
        		<tbody id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template5"
						data-bind="source: lineDS">
        		<tfoot>

        			<tr>
        				<td style="text-align:center;color:#fff;background:#000" colspan="8">Goods/ Materials received are delivered correctly in term of quantity, quality and other specifications according to the specified SO.</td>
        			</tr>
        		</tfoot>
        	</table>
        	<div class="span12 clear" style="margin-top: 10px">
	        	<div class="span6" style="padding-left: 30px;">
	        		<strong>
	        			Delivered By:<br>
	        			Received By:<br>
	        			Inspected By:
	        		</strong>
	        	</div>
	        	<div class="span6" style="padding-left: 30px;">
	        		<strong>
	        			Date/ Time:<br>
	        			Date/ Time:<br>
	        			Date/ Time:
	        		</strong>
	        	</div>
	        	<table class="span12" style="margin-top: 10px;">
	        		<tr>
	        			<td width="280">
	        				<b>Sample Lot</b><br><br>
	        				<p>Lot Size:_______________<span style="float:right;padding-right:10px;">Delivery Damage</span></p>
	        				<p><span style="float:right;padding-right:10px;">Markings/Finish</span></p><br>
	        				<p>Sample Qty:____________<span style="float:right;padding-right:10px;">Attributes</span></p><br>
	        			</td>
	        			<td>
	        				<b>Conformance/Discrepancies to Specifications</b><br><br>
	        			</td>
	        		</tr>
	        	</table>
	        </div>
        </div>
    </div>
</script-->

<script id="invoiceForm6" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 0px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			គំរោង Job : <span data-bind="text: contactDS.data()[0].job"></span><br/>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right; width: 40%">
        			<p class="form-title" style=" margin-bottom: 0; font-size: 20px; margin-top: 0; float: left; width: 100%;">បញ្ជាទិញ</p>
        			<p style="font-size: 18px;margin-bottom: 10px;" class="form-title" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD : <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th width="80" class="rside" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template6"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;color: #000" colspan="3" rowspan="4" data-bind="text: obj.note"></td>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;color: #000" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90" style="color:#000;">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80" style="color:#000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td width="90" style="color:#000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color:#000;">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color:#000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color:#000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm7" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style=" margin-bottom: 0; font-size: 20px; margin-top: 0; float: left; width: 100%;">បញ្ជាទិញ</p>
        			<p style="font-size: 18px;margin-bottom: 10px;" class="form-title" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD : <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th width="80" class="rside" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template6"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;" colspan="3" rowspan="4" data-bind="text: obj.note"></td>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;color: #000;" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;color: #000;" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>

        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90" style="color:#000;">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80" style="color:#000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td width="90" style="color:#000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color:#000;">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color:#000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color:#000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm8" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style=" margin-bottom: 0; font-size: 20px; margin-top: 4px; float: left; width: 100%;">បញ្ជាទិញ</p>
        			<p style="font-size: 18px;margin-bottom: 10px;" class="form-title" data-bind="text: obj.title" ></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        			<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}"><p>សរុប TOTAL <span data-bind="text: obj.amount"></span></p></div>
        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD : <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th class="rside" width="80" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template8"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;" colspan="2" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;color: #000;" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td class="rside" style="background-color: #eee;color: #000;" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90" style="color: #000;">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80" style="color: #000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td width="90" style="color: #000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color: #000;">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color: #000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm9" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style=" margin-bottom: 0; font-size: 20px; margin-top: 4px; float: left; width: 100%;">បញ្ជាទិញ</p>
        			<p style="font-size: 18px;margin-bottom: 10px;" class="form-title" data-bind="text: obj.title" ></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        			<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}"><p>សរុប TOTAL <span data-bind="text: obj.amount"></span></p></div>
        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD : <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th class="rside" width="80" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template8"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;color: #000;text-align: left;" colspan="2" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee; color: #000" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90" style="color: #000;">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80" style="color: #000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td width="90" style="color: #000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color: #000;">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color: #000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm10" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 0; float: left; width: 100%;">សម្រង់តំលៃ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px; font-size: 18px;"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD : <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th width="80" class="rside" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template10"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;" colspan="3" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;color:#000" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee; color:#000" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee; color:#000" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color:#000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90" style="color: #000">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80" style="color: #000">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000" width="90">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color: #000">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color: #000">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm11" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5">
        			<p data-bind="text: html.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 0; float: left; width: 100%;">សម្រង់តំលៃ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px; font-size: 18px;"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD : <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th width="80" class="rside" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template10"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;" colspan="3" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;color: #000" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td style="color: #000" width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td style="color: #000" width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000" width="90">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color: #000">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color: #000">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm12" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 4px; float: left; width: 100%;">សម្រង់តំលៃ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px;font-size: 18px; "></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        			<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}"><p>សរុប TOTAL <span data-bind="text: obj.amount"></span></p></div>
        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th class="rside" width="80" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template12"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;color: #000" colspan="2" rowspan="4" data-bind="text: obj.note"></td>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.discount"></td>

        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td style="color: #000" width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td style="color: #000" width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000" width="90">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color: #000">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color: #000">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm13" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 4px; float: left; width: 100%;">សម្រង់តំលៃ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px;font-size: 18px; "></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        			<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}"><p>សរុប TOTAL <span data-bind="text: obj.amount"></span></p></div>
        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th class="rside" width="80" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template12"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;color: #000" colspan="2" rowspan="4" data-bind="text: obj.note"></td>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.discount"></td>

        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>

        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td style="color: #000" width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td style="color: #000" width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000" width="90">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color: #000">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color: #000">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm14" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header" style="background:none;">
        		<div class="span3" style="margin-right: 15px;">
        			<b>Customer Information</b><br><br>
        			<p><span data-bind="text: obj.contact.name"></span><br>
        			<b>Address: </b> <span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        		<div class="span6" style="float:right;">
        			<p class="form-title" data-bind="text: obj.title" style="font-size: 26px"></p>
        			<p><b>Sale Order Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>Sale Order No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<table class="span12">
        		<tr>
        			<td style="background: #c6d9f1;text-align: left;padding-left: 5px;" width="150"><b>SALE ORDER #</b></td>
        			<td width="100"><b data-bind="text: obj.reference_no"></b></td>
        			<td width="150" style="background: #c6d9f1;text-align: left;padding-left: 5px;"><b>INVOICE #</b></td>
        			<td><b></b></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1;text-align: left;padding-left: 5px;"><b>JOB/ CONTRACT #</b></td>
        			<td><b></b></td>
        			<td style="background: #c6d9f1"><b></b></td>
        			<td><b></b></td>
        		</tr>
        	</table>
        	<table class="span12" style="margin: 5px 0;">
        		<thead>
        			<tr>
        				<th width="50" style="background: #c6d9f1;">NO</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">ITEM CODE</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">DESCRIPTION</th>
        				<th style="background: #c6d9f1;">UM</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">QTY</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">REMARK</th>
        			</tr>
        		</thead>
        		<tbody id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template14"
						data-bind="source: lineDS">
        	</table>
        	<table class="span12">
        		<tr>
        			<td style="background: #c6d9f1" width="150">ISSUED BY</td>
        			<td width="100"></td>
        			<td width="150" style="background: #c6d9f1">DATE</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1">DELIVERED BY</td>
        			<td></td>
        			<td style="background: #c6d9f1">DATE</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1">RECEIVED BY</td>
        			<td></td>
        			<td style="background: #c6d9f1">DATE/TIME</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1">ACKNOWLEDGED BY</td>
        			<td></td>
        			<td style="background: #c6d9f1">DATE/TIME</td>
        			<td></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm15" type="text/x-kendo-template">
	<div class="inv1 pcg-cash">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<h2 data-bind="text: obj.title"></h2>
        	</div>
        	<div class="span12" style="background:none;margin-top: 15px;">
        		<table class="span12" border="1">
        			<tr>
        				<td width="200">លេខសក្ខីប័ត្រ TV No.</td>
        				<td width="200"></td>
        				<td width="200">កាលបរិច្ឆេទ Date</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td>Rational for transfer</td>
        				<td colspan="3"></td>
        			</tr>
        		</table>
        	</div>
        	<table class="span12" style="border-top: none;">
        		<tr>
        			<td colspan="4" style="background: #10253f; color: #fff;border-top: 0;">
        				ផ្ទេរប្រាក់​ពី Transfer from
        			</td>
        			<td colspan="2" style="background: #eee;border-top: 0;">
        				ផ្ទេរប្រាក់ទៅ Transfer to
        			</td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1;">
        				No.
        			</td>
        			<td style="background: #c6d9f1;">
        				Nature
        			</td>
        			<td style="background: #c6d9f1;">
        				Amount
        			</td>
        			<td style="background: #c6d9f1;">
        				Cheque No./<br>Account No.
        			</td>
        			<td>
        				Nature
        			</td>
        			<td>
        				Bank Account No./ Cash<br>Account Code
        			</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr>
        			<td style="background: #c6d9f1;text-align: right;padding-right: 5px;" colspan="2">ចំនួនសរុប<br>Total</td>
        			<td></td>
        			<td style="background: #c6d9f1;text-align: right;padding-right: 5px;" colspan="2">ចំនួនជាអក្សរ<br>Amount in Words</td>
        			<td></td>
        		</tr>
        	</table>
        	<div class="span12" style="background: #eee;padding: 5px;">
        		<div class="span9" style="background: #fff;border:1px solid #ccc;padding: 8px;">
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;">រៀបចំដោយ<br>Prepared by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;">ត្រួតពិនិត្យដោយ<br>Reviewed by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;font-weight:bold;">ពិនិត្យ និងសំរេចដោយ<br>Approved by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        		</div>
        		<div class="span3" style="padding: 10px;">
        			<p style="margin-bottom:45px;font-size:10px;">Transerred by:</p>
    				_______________
    				<p style="font-size:10px;">Name: <br>Date:</p>
        		</div>
        	</div>
        	<table class="span12" border="1">
        		<tr>
        			<td colspan="3" style="background: #10253f; color: #fff;padding-left: 5px;text-align:left;">
        				សម្រាប់ការិយាល័យហិរញ្ញវត្ថុ For Accounting Department
        			</td>
        		</tr>
        		<tr>
        			<td style="text-align: center;">លេខគណនី<br>Account code</td>
        			<td>ឥណពន្ធ<br>Debit</td>
        			<td>ឥណទាន<br>Credit</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr>
        			<td colspan="3" style="text-align: left;padding-left: 5px;">
        				<span style="font-size: 10px; margin-right: 100px;">Posted By:</span> Date:
        			</td>
        		</tr>
        	</table>
        	<table class="span12" border="1">
        		<tr>
        			<td rowspan="2" style="border-top:0;text-align: left;padding-left: 5px;">Used for internal deposit, withdraw, transfer amoung the company's Bank account to<br> bank account and to on hand and deposit back to the bank accounts.</td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;">Version</td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;"><b>V.01</b></td>
        		</tr>
        		<tr>
        			<td style="text-align: left;padding-left: 5px;">Doc. Control</td>
        			<td style="text-align: left;padding-left: 5px;"><b>TRM02-07</b></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm16" type="text/x-kendo-template">
	<div class="inv1 pcg-cash">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<h2>សក្ខីប័ត្រដាក់សាច់ប្រាក់ Deposit Voucher</h2>
        	</div>
        	<div class="span12" style="background:none;margin-top: 15px;">
        		<table class="span12" border="1">
        			<tr>
        				<td width="200">លេខសក្ខីប័ត្រ TV No.</td>
        				<td width="200"></td>
        				<td width="200">កាលបរិច្ឆេទ Date</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td>Rational for Deposit</td>
        				<td colspan="3"></td>
        			</tr>
        		</table>
        	</div>
        	<table class="span12" style="border-top: none;">
        		<tr>
        			<td colspan="4" style="background: #10253f; color: #fff;border-top: 0;">
        				ដាក់ប្រាក់​ពី Deposit from
        			</td>
        			<td colspan="2" style="background: #eee;border-top: 0;">
        				ដាក់ប្រាក់ទៅ Deposit to
        			</td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1;">
        				No.
        			</td>
        			<td style="background: #c6d9f1;">
        				Nature
        			</td>
        			<td style="background: #c6d9f1;">
        				Amount
        			</td>
        			<td style="background: #c6d9f1;">
        				Cheque No./<br>Account No.
        			</td>
        			<td>
        				Nature
        			</td>
        			<td>
        				Bank Account No./ Cash<br>Account Code
        			</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr>
        			<td style="background: #c6d9f1;text-align: right;padding-right: 5px;" colspan="2">ចំនួនសរុប<br>Total</td>
        			<td></td>
        			<td style="background: #c6d9f1;text-align: right;padding-right: 5px;" colspan="2">ចំនួនជាអក្សរ<br>Amount in Words</td>
        			<td></td>
        		</tr>
        	</table>
        	<div class="span12" style="background: #eee;padding: 5px;">
        		<div class="span9" style="background: #fff;border:1px solid #ccc;padding: 8px;">
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;">រៀបចំដោយ<br>Prepared by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;">ត្រួតពិនិត្យដោយ<br>Reviewed by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;font-weight:bold;">ពិនិត្យ និងសំរេចដោយ<br>Approved by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        		</div>
        		<div class="span3" style="padding: 10px;">
        			<p style="margin-bottom:45px;font-size:10px;">Deposited by:</p>
    				_______________
    				<p style="font-size:10px;">Name: <br>Date:</p>
        		</div>
        	</div>
        	<table class="span12" border="1">
        		<tr>
        			<td colspan="3" style="background: #10253f; color: #fff;padding-left: 5px;text-align:left;">
        				សម្រាប់ការិយាល័យហិរញ្ញវត្ថុ For Accounting Department
        			</td>
        		</tr>
        		<tr>
        			<td style="text-align: center;">លេខគណនី<br>Account code</td>
        			<td>ឥណពន្ធ<br>Debit</td>
        			<td>ឥណទាន<br>Credit</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr>
        			<td colspan="3" style="text-align: left;padding-left: 5px;">
        				<span style="font-size: 10px; margin-right: 100px;">Posted By:</span> Date:
        			</td>
        		</tr>
        	</table>
        	<table class="span12" border="1">
        		<tr>
        			<td rowspan="2" style="border-top:0;text-align: left;padding-left: 5px;">Used for internal deposit, withdraw, transfer amoung the company's Bank account to<br> bank account and to on hand and deposit back to the bank accounts.</td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;">Version</td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;"><b>V.01</b></td>
        		</tr>
        		<tr>
        			<td style="text-align: left;padding-left: 5px;">Doc. Control</td>
        			<td style="text-align: left;padding-left: 5px;"><b>TRM02-07</b></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm17" type="text/x-kendo-template">
	<div class="inv1 pcg-cash">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<h2>សក្ខីប័ត្រដកប្រាក់ Withdrawal Voucher</h2>
        	</div>
        	<div class="span12" style="background:none;margin-top: 15px;">
        		<table class="span12" border="1">
        			<tr>
        				<td width="200">លេខសក្ខីប័ត្រ TV No.</td>
        				<td width="200"></td>
        				<td width="200">កាលបរិច្ឆេទ Date</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td>Rational for Withdraw</td>
        				<td colspan="3"></td>
        			</tr>
        		</table>
        	</div>
        	<table class="span12" style="border-top: none;">
        		<tr>
        			<td colspan="4" style="background: #10253f; color: #fff;border-top: 0;">
        				ដកប្រាក់​ពី Withdraw from
        			</td>
        			<td colspan="2" style="background: #eee;border-top: 0;">
        				ដកប្រាក់ទៅ Withdraw to
        			</td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1;">
        				No.
        			</td>
        			<td style="background: #c6d9f1;">
        				Nature
        			</td>
        			<td style="background: #c6d9f1;">
        				Amount
        			</td>
        			<td style="background: #c6d9f1;">
        				Cheque No./<br>Account No.
        			</td>
        			<td>
        				Nature
        			</td>
        			<td>
        				Bank Account No./ Cash<br>Account Code
        			</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr>
        			<td style="background: #c6d9f1;text-align: right;padding-right: 5px;" colspan="2">ចំនួនសរុប<br>Total</td>
        			<td></td>
        			<td style="background: #c6d9f1;text-align: right;padding-right: 5px;" colspan="2">ចំនួនជាអក្សរ<br>Amount in Words</td>
        			<td></td>
        		</tr>
        	</table>
        	<div class="span12" style="background: #eee;padding: 5px;">
        		<div class="span9" style="background: #fff;border:1px solid #ccc;padding: 8px;">
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;">រៀបចំដោយ<br>Prepared by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;">ត្រួតពិនិត្យដោយ<br>Reviewed by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;font-weight:bold;">ពិនិត្យ និងសំរេចដោយ<br>Approved by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        		</div>
        		<div class="span3" style="padding: 10px;">
        			<p style="margin-bottom:45px;font-size:10px;">Withdrew by:</p>
    				_______________
    				<p style="font-size:10px;">Name: <br>Date:</p>
        		</div>
        	</div>
        	<table class="span12" border="1">
        		<tr>
        			<td colspan="3" style="background: #10253f; color: #fff;padding-left: 5px;text-align:left;">
        				សម្រាប់ការិយាល័យហិរញ្ញវត្ថុ For Accounting Department
        			</td>
        		</tr>
        		<tr>
        			<td style="text-align: center;">លេខគណនី<br>Account code</td>
        			<td>ឥណពន្ធ<br>Debit</td>
        			<td>ឥណទាន<br>Credit</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr>
        			<td colspan="3" style="text-align: left;padding-left: 5px;">
        				<span style="font-size: 10px; margin-right: 100px;">Posted By:</span> Date:
        			</td>
        		</tr>
        	</table>
        	<table class="span12" border="1">
        		<tr>
        			<td width="450" style="border-top:0;text-align: left;padding-left: 5px;"></td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;">Version</td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;"><b>V.01</b></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm18" type="text/x-kendo-template">
	<div class="inv1 pcg-cash">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<h2>សក្ខីប័ត្របុរេប្រទាន ADVANCE VOUCHER</h2>
        	</div>
        	<div class="span12" style="background:none;margin-top: 15px;">
        		<table class="span12 left-tbl" border="1">
        			<tr>
        				<td width="200">អ្នកស្នើសុំ NAME</td>
        				<td width="200"></td>
        				<td width="200">លេខសក្ខីប័ត្រ AV No.</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">តំណែង Position</td>
        				<td width="200"></td>
        				<td width="200">កាលបរិច្ឆេទ Date</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">ផ្នែក Department</td>
        				<td width="200"></td>
        				<td width="200">លេខប័ណ្ណលទ្ធកម្ម PR No.</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">ទូទាត់ដោយ Mode of<br>Payment</td>
        				<td colspan="3">ទូទាត់ដោយ mode of payment </td>
        			</tr>
        			<tr>
        				<td width="200">គោលបំណងនៃ​បុរេប្រទាន<br>Purpose of Advance</td>
        				<td colspan="3">&nbsp;</td>
        			</tr>
        		</table>
        	</div>
        	<table class="span12" style="border-top: none;">
        		<tr style="background: #c6d9f1;">
        			<th style="border-top: 0;">
        				No.
        			</th>
        			<th style="border-top: 0;">
        				បរិយាយ DESCRIPTION
        			</th>
        			<th style="border-top: 0;">
        				REF.
        			</th>
        			<th style="border-top: 0;">
        				AMOUNT
        			</th>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr>
        			<td colspan="3" style="text-align: right;padding-right: 5px;">សរុប Total</td>
        			<td></td>
        		</tr>
        	</table>
        	<table class="span12 left-tbl" >
        		<tr>
        			<td colspan="2" style="border-top: none;text-align:right;padding-right:5px;">
        				 ចំនួនជាអក្សរ<br>Amount in Words
        			</td>
        			<td colspan="3" style="border-top: none;">&nbsp;</td>
        		</tr>
        		<tr>
        			<td colspan="2"></td>
        			<td style="background: #000; color: #fff;text-align:center;">SIGNATURE</td>
        			<td style="background: #000; color: #fff;text-align:center;">POSITION</td>
        			<td style="background: #000; color: #fff;text-align:center;">DATE</td>
        		</tr>
        		<tr>
        			<td style="background: #10253f; color: #fff;text-align:center;" rowspan="2" width="20"><p class="upside">Requestiong<br>Dept</p></td>
        			<td width="100">រៀបចំដោយ<br>PREPARED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>យល់ស្របដោយ<br>ENDORSED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td rowspan="4" style="text-align:center;" width="20"><p class="upside">Finance Department</p></td>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>សំរេចដោយ<br>APPROVED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>ទួទាត់ដោយ<br>PAID BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>ទទួលដោយ<br>RECEIVED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background:#000;"></td>
        			<td colspan="4">For Accounting Department Only</td>
        		</tr>
        		<tr>
        			<td></td>
        			<td style="text-align:center;">Account Code</td>
        			<td style="text-align:center;">Account Description</td>
        			<td style="text-align:center;">Debit</td>
        			<td style="text-align:center;">Credit</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
        		<tr>
        			<td style="background: #c6d9f1;"></td>
        			<td style="background: #c6d9f1;">កត់ត្រាដោយ<br>POSTED BY</td>
        			<td style="text-align:center;"></td>
        			<td style="text-align:center;"></td>
        			<td style="text-align:center;"></td>
        		</tr>
        	</table>
        	<table class="span12" border="1" style="margin-top:5px;">
        		<tr>
        			<td rowspan="2" width="400" style="text-align: left;padding-left: 5px;">Advance Voucher should be used to account for cash advance request (either for operational or salary advance). No additional voucher is required to disburse cash. This is a pre-printed form and there are two copies, one of which (original) will be given to advance requestor; while another one is for the Finance Department.</td>
        			<td style="text-align: left;padding-left: 5px;">Version</td>
        			<td style="text-align: left;padding-left: 5px;"><b>V.01</b></td>
        		</tr>
        		<tr>
        			<td style="text-align: left;padding-left: 5px;">Doc. Control</td>
        			<td style="text-align: left;padding-left: 5px;"><b>APM02-02</b></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm19" type="text/x-kendo-template">
    <div class="inv1 pcg">
        <div class="content clear">
        	<div class="span12 clear" style="padding:20px 0;">
        		<div class="span5">
        			<div class="logo" style="width: 100%;">
		            	<img style="width: 45%" data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>

        		</div>
        		<div class="span7">
        			<p class="form-title" style="font-size: 20px!important; margin-bottom: 5px; line-height: 28px !important; margin-top: 0;">សក្ខីប័ត្រចំណាយ PAYMENT VOUCHER</p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">ឈ្មោះ Name : <span data-bind="text: obj.contact.name"> </span></div>
        		<div class="span6" style="text-align: left;padding-left: 10px;">ទូទាត់ដោយ Mode of Payment : <span data-bind="text: obj.payment_method[0].name"></span></div>
				<div class="span12" style="text-align: left;padding-left: 10px;margin-top: 10px;">គោលបំណងការចំណាយ Purpose of Payment : <span data-bind="text: obj.memo"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
	        		<tr style="background: #c6d9f1;">
	        			<th style="border-top: 0; text-align: center;" width="60">
	        				ល.រ<br>No.
	        			</th>
	        			<th style="border-top: 0; text-align: left;" width="120">
	        				វិក្កយបត្រលេខ<br>Invoice No.
	        			</th>
	        			<th style="border-top: 0;text-align: left;padding-left: 10px;">
	        				អ្នកផ្គត់ផ្គង់<br>Supplier
	        			</th>
	        			<th style="border-top: 0;text-align: left;padding-left: 10px;">
	        				បរិយាយ​<br>Description
	        			</th>
	        			<th style="border-top: 0; text-align: center;" width="120">
	        				ចំនួន<br>Amount
	        			</th>
	        		</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="payment-voucher-line-template"
						data-bind="source: accountLineDS">
				</tbody>
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;" colspan="3" rowspan="4">
        				</td>
        				<td style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>

        				<td style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>

        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tbody>
	        		<tr>
	        			<td width="145">រៀបចំដោយ PREPARED BY</td>
	        			<td width="150"></td>
	        			<td width="90">តំណែង POSITION</td>
	        			<td width="180"></td>
	        			<td width="82">កាលបរិច្ឆេទ DATE</td>
	        			<td width="120"></td>
	        		</tr>
	        		<tr>
	        			<td>ត្រួតពិនិត្យដោយ REVIEWED BY</td>
	        			<td></td>
	        			<td>តំណែង POSITION</td>
	        			<td width="120"></td>
	        			<td>កាលបរិច្ឆេទ DATE</td>
	        			<td width="120"></td>
	        		</tr>
	        		<tr>
	        			<td>អនុម័តដោយ APPROVED BY</td>
	        			<td></td>
	        			<td>តំណែង POSITION</td>
	        			<td width="120"></td>
	        			<td>កាលបរិច្ឆេទ DATE</td>
	        			<td width="120"></td>
	        		</tr>
	        		<tr>
	        			<td>ទួទាត់ដោយ PAID BY</td>
	        			<td></td>
	        			<td>តំណែង POSITION</td>
	        			<td width="120"></td>
	        			<td>កាលបរិច្ឆេទ DATE</td>
	        			<td width="120"></td>
	        		</tr>
	        		<tr>
	        			<td>ទទួលដោយ RECEIVED BY</td>
	        			<td></td>
	        			<td>តំណែង POSITION</td>
	        			<td width="80"></td>
	        			<td>កាលបរិច្ឆេទ DATE</td>
	        			<td width="120"></td>
	        		</tr>
	        	</tbody>
        	</table>

        	<table class="span12 left-tbl" style="margin-top: 30px;">
        		<tr class="mid-header">
        			<td colspan="4" style="text-align:left; font-weight: bold;">For Accounting Department Only</td>
        		</tr>
        		<tr style="background: #dce6f2;">
        			<td >Account Code</td>
        			<td >Account Description</td>
        			<td >Debit</td>
        			<td >Credit</td>
        		</tr>
        		<tfoot
        			data-role="listview"
					data-auto-bind="false"
					data-template="payment-voucher-journal-line-template"
					data-bind="source: journalLineDS">
        		</tfoot>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm20" type="text/x-kendo-template">
	<div class="inv1 pcg-cash">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<h2>សក្ខីប័ត្រចំណាយ REIMBURSEMENT VOUCHER</h2>
        	</div>
        	<div class="span12" style="background:none;margin-top: 15px;">
        		<table class="span12 left-tbl" border="1">
        			<tr>
        				<td width="200">ឈ្មោះ NAME</td>
        				<td width="200"></td>
        				<td width="200">លេខសក្ខីប័ត្រ PV No.</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">អ្នកផ្គត់ផ្គង់ Supplier Code</td>
        				<td width="200"></td>
        				<td width="200">កាលបរិច្ឆេទ Date</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">ផ្នែក Department</td>
        				<td width="200"></td>
        				<td width="200">លេខសក្ខីប័ត្របំណុល APV No.</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">ទូទាត់ដោយ Mode of<br>Payment</td>
        				<td colspan="3">ទូទាត់ដោយ mode of payment </td>
        			</tr>
        			<tr>
        				<td width="200">គោលបំណងការចំណាយ<br>Purpose of Advance</td>
        				<td colspan="2">&nbsp;</td>
        				<td>Budgeted: </td>
        			</tr>
        		</table>
        	</div>
        	<table class="span12" style="border-top: none;">
        		<tr style="background: #c6d9f1;">
        			<th style="border-top: 0;">
        				No.
        			</th>
        			<th style="border-top: 0;" width="100">
        				Invoice No.
        			</th>
        			<th style="border-top: 0;">
        				Description
        			</th>
        			<th style="border-top: 0;" width="120">
        				Amount
        			</th>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr>
        			<td colspan="3" style="text-align: right;padding-right: 5px;">Total</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td colspan="3" style="text-align: right;padding-right: 5px;">Settlement Discounts</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td colspan="3" style="text-align: right;padding-right: 5px;background: #c6d9f1;">NET AMOUNT PAID</td>
        			<td></td>
        		</tr>
        	</table>
        	<table class="span12 left-tbl" >
        		<tr>
        			<td colspan="2" style="background: #c6d9f1;border-top: none;text-align:right;padding-right:5px;">
        				Amount in Words
        			</td>
        			<td colspan="3" style="border-top: none;">&nbsp;</td>
        		</tr>
        		<tr>
        			<td colspan="2"></td>
        			<td style="background: #000; color: #fff;text-align:center;">SIGNATURE</td>
        			<td style="background: #000; color: #fff;text-align:center;">POSITION</td>
        			<td width="120" style="background: #000; color: #fff;text-align:center;">DATE</td>
        		</tr>
        		<tr>
        			<td style="background: #10253f; color: #fff;text-align:center;" rowspan="5" width="20"><p class="upside">Finance Department</p></td>
        			<td width="100">រៀបចំដោយ<br>PREPARED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td><b>សំរេចដោយ<br>APPROVED BY</b></td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>ទួទាត់ដោយ<br>PAID BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>ទទួលដោយ<br>RECEIVED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background:#000;"></td>
        			<td colspan="4">For Accounting Department Only</td>
        		</tr>
        		<tr>
        			<td></td>
        			<td style="text-align:center;">Account Code</td>
        			<td style="text-align:center;">Account Description</td>
        			<td style="text-align:center;">Debit</td>
        			<td style="text-align:center;">Credit</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
        		<tr>
        			<td style="background: #c6d9f1;"></td>
        			<td style="background: #c6d9f1;">កត់ត្រាដោយ<br>POSTED BY</td>
        			<td style="text-align:center;"></td>
        			<td style="text-align:center;"></td>
        			<td style="text-align:center;"></td>
        		</tr>
        	</table>
        	<table class="span12" border="1">
        		<tr>
        			<td rowspan="2" width="400" style="border-top:0;text-align: left;padding-left: 5px;">This is an automated voucher generated based on the payment made to outstanding invoice, reimbursements, claims, and other disbursement. The purpose of this voucher is used to approve payment transactions.</td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;">Version</td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;"><b>V.01</b></td>
        		</tr>
        		<tr>
        			<td style="text-align: left;padding-left: 5px;">Doc. Control</td>
        			<td style="text-align: left;padding-left: 5px;"><b>TRM02-03</b></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm21" type="text/x-kendo-template">
	<div class="inv1 pcg-cash">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<h2>សក្ខីប័ត្រជំរះបុរេប្រទាន<br>ADVANCE SETTLEMENT VOUCHER</h2>
        	</div>
        	<div class="span12" style="background:none;margin-top: 15px;">
        		<table class="span12 left-tbl" border="1">
        			<tr>
        				<td width="200">អ្នកស្នើសុំ NAME</td>
        				<td width="200"></td>
        				<td width="200">លេខសក្ខីប័ត្រ AS No.</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">តំណែង Position</td>
        				<td width="200"></td>
        				<td width="200">កាលបរិច្ឆេទ Date</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">ផ្នែក Department</td>
        				<td width="200"></td>
        				<td width="200">លេខសំណើរបុរេប្រទាន ADR No.</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">គោលបំណងនៃ​ការទូទាត់បុរេប្រទាន <br>Purpose of Advance</td>
        				<td colspan="3">&nbsp;</td>
        			</tr>
        		</table>
        	</div>
        	<table class="span12" style="margin-top: 5px;">
        		<tr style="background: #c6d9f1;height: 30px;">
        			<th width="160">
        				ACCOUNT CODE
        			</th>
        			<th >
        				បរិយាយ DESCRIPTION
        			</th>
        			<th >
        				REF.
        			</th>
        			<th width="120">
        				AMOUNT
        			</th>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr>
        			<td colspan="3" style="text-align: right;padding-right: 5px;">សរុបចំណាយជាក់ស្តែង TOTAL EXPENSES</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td colspan="3" style="text-align: right;padding-right: 5px;">ចំនួនបុរេប្រទាន ADVANCED AMOUNT</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td colspan="3" style="text-align: right;padding-right: 5px;">ប្រាក់ត្រូវ NET AMOUNT DUE <input type="checkbox" name="nad"> បង់អោយបុគ្គលិក TO STAFF <input type="checkbox" name="ts"> ទទួលពីបុគ្គលិក FROM STAFF <input type="checkbox" name="fs"></td>
        			<td></td>
        		</tr>
        	</table>
        	<table class="span12 left-tbl" >
        		<tr>
        			<td colspan="2" style="background: #c6d9f1;border-top: none;text-align:right;padding-right:5px;">
        				 ចំនួនជាអក្សរ<br>Amount in Words
        			</td>
        			<td colspan="3" style="border-top: none;">&nbsp;</td>
        		</tr>
        		<tr>
        			<td colspan="2"></td>
        			<td style="background: #000; color: #fff;text-align:center;">SIGNATURE</td>
        			<td style="background: #000; color: #fff;text-align:center;">POSITION</td>
        			<td style="background: #000; color: #fff;text-align:center;">DATE</td>
        		</tr>
        		<tr>
        			<td style="text-align:center;" rowspan="4" width="20"></td>
        			<td width="100" style="background: #c6d9f1;">រៀបចំដោយ<br>PREPARED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1;">ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>

        		<tr>
        			<td style="background: #c6d9f1;"><b>សំរេចដោយ<br>APPROVED BY</b></td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1;">កត់ត្រាដោយ<br>POSTED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        	</table>

        </div>
    </div>
</script>
<script id="invoiceForm22" type="text/x-kendo-template">
	<div class="inv1 pcg-cash">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<h2 data-bind="text: obj.title" style="text-align: left; font-size: 20px;line-height: 43px !important; padding-top: 0;"></h2>
        		<p>អាស័យ​ដ្ឋាន Address : <span data-bind="text: company.address"></span></p>
        		<p>លេខទូរស័ព្ទ Phone : <span data-bind="text: company.telephone"></span></p>
        		<p>អុីម៉ែល Email : <span data-bind="text: company.email"></span></p>
        	</div>
        	<div class="span12" style="background:none;margin-top: 15px;">
        		<table class="span12 left-tbl" border="1">
        			<tr>
        				<td width="200" style="text-align:center;"><b>លេខសក្ខីប័ត្រ JV No.</b></td>
        				<td width="200" style="text-align:center;" data-bind="text: obj.number"></td>
        				<td width="200" style="text-align:center;"><b>កាលបរិច្ឆេទ Date<b></td>
        				<td width="200" style="text-align:center;" data-bind="text: obj.issued_date"></td>
        			</tr>
        			<tr>
        				<td colspan="4">ប្រភេទប្រតិបត្តិការ Type of transaction : <span data-bind="text: obj.type"></span></td>
        			</tr>

        			<tr>
        				<td colspan="4">Please specify, if applicable</td>
        			</tr>
        			<tr>
        				<td width="200">វិក្ក័យប័ត្រ Invoice No.</td>
        				<td width="200"></td>
        				<td width="200">សក្ខីប័ត្របុរេប្រទាន<br>Advance Voucher No.</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">សក្ខីប័ត្របំណុល<br>AP Voucher No.</td>
        				<td width="200"></td>
        				<td width="200">សក្ខីប័ត្រចំណាយ<br>Payment Voucher No</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">សក្ខីប័ត្រទិន្នានុប្បវត្តិ<br>Journal Voucher No.</td>
        				<td width="200"></td>
        				<td width="200">Other</td>
        				<td width="200"></td>
        			</tr>
        		</table>
        	</div>
        	<table class="span12 left-tbl" style="margin-top: 5px;">
        		<tr>
        			<td style="background: #c6d9f1;">
        				<p>ពន្យល់ Description of the transaction : <span data-bind="text: obj.memo"></span></p>
        			</td>
        		</tr>
        		<tr>
        			<td data-bind="html: obj.memo2">&nbsp;</td>
        		</tr>
        	</table>
        	<table class="span12" style="margin-top: 5px;">
        		<thead>
	        		<tr>
	        			<th style="padding: 5px;"><b>លេខកូដគណនី<br>Account Code</b></th>
	        			<th style="padding: 5px;"><b>ឈ្មោះគណនី</b> Account Name</th>
	        			<th style="padding: 5px;"><b>ពិពណ៌នា Description</b></th>
	        			<th style="padding: 5px;"><b>ឥណពន្ធ<br>Debit</b></th>
	        			<th style="padding: 5px;"><b>ឥណទាន<br>Credit</b></th>
	        		</tr>
        		</thead>
        		<tbody data-auto-bind="false"
        			data-template="invoiceForm-journal-line-template"
        			data-bind="source: journalLineDS">
        		</tbody>
        		<tfoot data-template="invoiceForm-journal-line-footer-template" data-bind="source: this"></tfoot>
        	</table>
        	<div class="span12" style="background: #eee;padding: 5px;">
    			<div class="span3">
    				<p style="margin-bottom:30px;font-size:10px;">រៀបចំដោយ<br>Prepared by:</p>
    				_______________
    				<p style="font-size:10px;">Name: <br>Date:</p>
    			</div>
    			<div class="span3">
    				<p style="margin-bottom:30px;font-size:10px;">ត្រួតពិនិត្យដោយ<br>Reviewed by:</p>
    				_______________
    				<p style="font-size:10px;">Name: <br>Date:</p>
    			</div>
    			<div class="span3">
    				<p style="margin-bottom:30px;font-size:10px;font-weight:bold;">អ្នកអនុម័ត<br>Approved by:</p>
    				_______________
    				<p style="font-size:10px;">Name: <br>Date:</p>
    			</div>
        		<div class="span3">
        			<p style="margin-bottom:30px;font-size:10px;">អ្នកកត់ត្រា<br>Recorded by:</p>
    				_______________
    				<p style="font-size:10px;">Name: <br>Date:</p>
        		</div>
        	</div>

        </div>
    </div>
</script>
<!--script id="invoiceForm23" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5">
        			<p data-bind="text: company.name"></p>
        			<p><b>Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span3" style="margin-right: 15px;">
        			<b>Customer Information</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<b>Address: </b> <span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        		<div class="span3">
        			<b>Delivered to</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<b>Address: </b> <span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" data-bind="text: obj.title"></p>
        			<p><b>PO Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>PO No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span3">TERM OF PAYMENT</div>
        		<div class="span3">MODE OF PAYMENT</div>
        		<div class="span3">DELIVERY DATE</div>
        		<div class="span3">SALE REP</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr>
        				<th width="90">CODE</th>
        				<th>ITEM DESCRIPTION</th>
        				<th>ឯកតា<br>UM</th>
        				<th>QTY</th>
        				<th>UNIT PRICE</th>
        				<th width="80">Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template6"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;" colspan="3"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">SUB TOTAL</td>
        				<td style="background-color: #eee;" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td style="border:none;" colspan="3"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">TAX (Rate:       )</td>
        				<td style="background-color: #eee;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td style="border:none;" colspan="3"></td>
        				<td colspan="2" class="main-color" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">GRAND TOTAL</td>
        				<td style="background-color: #dce6f2;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="120">PREPARED BY</td><td width="100"></td>
        			<td>POSITION</td><td width="100"></td>
        			<td>DATE</td><td width="80"></td>
        		</tr>
        		<tr>
        			<td>REVIEWED BY</td><td></td>
        			<td>POSITION</td><td></td>
        			<td>DATE</td><td></td>
        		</tr>
        		<tr>
        			<td>APROVED BY</td><td></td>
        			<td>POSITION</td><td></td>
        			<td>DATE</td><td></td>
        		</tr>
        		<tr>
        			<td>ACCEPTED BY</td><td></td>
        			<td>POSITION</td><td></td>
        			<td>DATE</td><td></td>
        		</tr>
        	</table>
        </div>
    </div>
</script-->
<script id="invoiceForm23" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span12">
	        	<div class="span7">
	        		<div class="logo" style="width: 40%">
		            	<img style="width: " data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
	        	</div>
	        	<div class="span5">
	        		<div class="span12" style="margin-bottom: 10px;">
	        			<p class="form-title" style="font-size: 20px; float: left; width: 100%; margin-bottom: 0;">បណ័្ឌទទួលប្រាក់</p>
	        			<h2 style="font-size: 18px; text-align: left;color:#10253f " data-bind="text: obj.title"></h2>
	        			<!--img src="<?php echo base_url(); ?>assets/invoice/img/official-receipt.jpg" /-->

	        		</div>
	        		<div class="span12">
	        			<table class="span12">
	        				<tr>
	        					<td class="light-blue-td" width="100">កាលបរិច្ឆេទ Date</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.issued_date"></td>
	        				</tr>
	        				<tr>
	        					<td class="light-blue-td">លេខបបង្កាន់ដៃ Receipt No.</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.number"></td>
	        				</tr>
	        			</table>
	        		</div>
	        	</div>
	        </div>
        	<div class="span12" style="margin-top: 10px;">
		    	<div class="span7" style="margin-top: 10px;">
		    		<table class="span11">
						<tr>
							<td class="light-blue-td" width="120">ទទួលពីឈ្មោះ​ <br>Recieve From</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].name"></td>
						</tr>
						<tr>
							<td class="light-blue-td">អាស័យ​ដ្ឋាន <br>Contact Address</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].address"></td>
						</tr>
						<tr>
							<td class="light-blue-td">គោលបំណង​​ <br>Purpose</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: lineDS.data()[0].description"></td>
						</tr>
						<tr>
							<td class="light-blue-td">លេខយោង <br> Reference Document</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.reference_no"></td>
						</tr>
					</table>
		    	</div>
		    	<div class="span5" style="float:right">
		    		<p style="padding: 5px 0; text-align: left;font-weight: bold;color: #000;">ចំនួនទទួលសរុប​ <br> TOTAL RECEIVED AMOUNT</p>
		    		<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}">
		    			<p><span class="total-amount" data-bind="text: obj.amount"></span></p>
		    		</div>
		    		<p style="padding: 5px 0;font-weight: bold;color: #000;clear:both;">វិធីសាស្រ្តទូទាត់​ Mode of payment</p>
		    		<p style="color: #000;clear:both;" data-bind="text: paymentMethodDS.data()[0].name"></p>
		    	</div>
		    </div>
        	<div class="span12">
        		<div class="span8">
        			<p style="color:black;margin: 10px 0;" data-bind="text: obj.note"></p>
        		</div>
        	</div>
        	<div class="span12">
        		<div class="span5">
        			<p>On behalf of <span data-bind="text: company.name"></span></p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p>Paid By:</p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        	</div>
        	<div style="margin-top: 15px" class="span12">
        		<p>Address: <span data-bind="text: company.address"></span> <sapn data-bind="text: company.city"></sapn> <span data-bind="text: company.country.name"></span>.</p>
        	</div>
        </div>
    </div>
</script>
<script id="invoiceForm24" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header" style="background:none;">
        		<div class="span3" style="margin-right: 15px;">
        			<b>Customer Information</b><br><br>
        			<p><span data-bind="text: obj.contact.name"></span><br>
        			<b>Address: </b> <span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        		<div class="span6" style="float:right;">
        			<p class="form-title" data-bind="text: obj.title" style="font-size: 26px"></p>
        			<p><b>Sale Order Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>Sale Order No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<table class="span12">
        		<tr>
        			<td style="background: #c6d9f1;text-align: left;padding-left: 5px;" width="150"><b>SALE ORDER #</b></td>
        			<td width="100"><b></b></td>
        			<td width="150" style="background: #c6d9f1;text-align: left;padding-left: 5px;"><b>INVOICE #</b></td>
        			<td><b></b></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1;text-align: left;padding-left: 5px;"><b>JOB/ CONTRACT #</b></td>
        			<td><b></b></td>
        			<td style="background: #c6d9f1"><b></b></td>
        			<td><b></b></td>
        		</tr>
        	</table>
        	<table class="span12" style="margin: 5px 0;">
        		<thead>
        			<tr>
        				<th width="50" style="background: #c6d9f1;">NO</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">ITEM CODE</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">DESCRIPTION</th>
        				<th style="background: #c6d9f1;">ឯកតា<br>UM</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">QTY</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">REMARK</th>
        			</tr>
        		</thead>
        		<tbody id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template14"
						data-bind="source: lineDS">
        	</table>
        	<table class="span12">
        		<tr>
        			<td style="background: #c6d9f1" width="150">ISSUED BY</td>
        			<td width="100"></td>
        			<td width="150" style="background: #c6d9f1">DATE</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1">DELIVERED BY</td>
        			<td></td>
        			<td style="background: #c6d9f1">DATE</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1">RECEIVED BY</td>
        			<td></td>
        			<td style="background: #c6d9f1">DATE/TIME</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1">ACKNOWLEDGED BY</td>
        			<td></td>
        			<td style="background: #c6d9f1">DATE/TIME</td>
        			<td></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm25" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span12">
	        	<div class="span7">
	        		<div class="logo" style="width: 40%">
		            	<img style="width: " data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
	        	</div>
	        	<div class="span5">
	        		<div class="span12" style="margin-bottom: 10px;">
	        			<h2 style="font-size: 24px;text-align: left;color:#10253f " data-bind="text: obj.title"></h2>
	        			<!--img src="<?php echo base_url(); ?>assets/invoice/img/official-receipt.jpg" /-->
	        			<!-- <p class="form-title" style="font-size: 20px; margin-top: 7px; float: left; width: 100%;">ប្រាក់កក់អិថិជន</p> -->
	        		</div>
	        		<div class="span12">
	        			<table class="span12">
	        				<tr>
	        					<td class="light-blue-td" width="100">កាលបរិច្ឆេទ Date</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.issued_date"></td>
	        				</tr>
	        				<tr>
	        					<td class="light-blue-td">លេខបបង្កាន់ដៃ Receipt No.</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.number"></td>
	        				</tr>
	        			</table>
	        		</div>
	        	</div>
	        </div>
        	<div class="span12" style="margin-top: 10px;">
		    	<div class="span7" style="margin-top: 10px;">
		    		<table class="span11">
						<tr>
							<td class="light-blue-td" width="120">ទទួលពីឈ្មោះ​ <br>Recieve From</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].name"></td>
						</tr>
						<tr>
							<td class="light-blue-td">អាស័យ​ដ្ឋាន <br>Contact Address</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].address"></td>
						</tr>
						<tr>
							<td class="light-blue-td">គោលបំណង​​ <br>Purpose</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: accountLineDS.data()[0].description"></td>
						</tr>
						<tr>
							<td class="light-blue-td">លេខយោង <br> Reference Document</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.reference_no"></td>
						</tr>
					</table>
		    	</div>
		    	<div class="span5" style="float:right">
		    		<p style="padding: 5px 0; text-align: left;font-weight: bold;color: #000;">ចំនួនទទួលសរុប​ <br> TOTAL RECEIVED AMOUNT</p>
		    		<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}">
		    			<p><span class="total-amount" data-bind="text: obj.amount"></span></p>
		    		</div>
		    		<p style="padding: 5px 0;font-weight: bold;color: #000;clear:both;">វិធីសាស្រ្តទូទាត់​ Mode of payment</p>
		    		<p style="color: #000;clear:both;" data-bind="text: paymentMethodDS.data()[0].name"></p>
		    	</div>
		    </div>
        	<div class="span12">
        		<div class="span8">
        			<p style="color:black;margin: 10px 0;" data-bind="text: obj.note"></p>
        		</div>
        	</div>
        	<div class="span12">
        		<div class="span5">
        			<p>On behalf of <span data-bind="text: company.name"></span></p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p>Paid By:</p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        	</div>
        	<div style="margin-top: 15px" class="span12">
        		<p>Address: <span data-bind="text: company.address"></span> <sapn data-bind="text: company.city"></sapn> <span data-bind="text: company.country.name"></span>.</p>
        	</div>
        </div>
    </div>
</script>
<script id="invoiceForm26" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<table class="span12 left-tbl">
        		<tr>
        			<td colspan="4" rowspan="2" data-bind="style: {backgroundColor: obj.color}" style="text-align:center;padding-left:0;" class="main-color">
        			ប័ណ្ណកែតម្រូវបរិមាណសន្និធិ<br>Material Adjustment Note
        			</td>
        			<td colspan="2">កាលបរិច្ឆេទ Date</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td colspan="2">លេខ MA No</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td colspan="2" width="100">
        				គម្រោង Project
        			</td>
        			<td colspan="2" width="100">

        			</td>
        			<td colspan="2">
        				ផល្ូវ Street #
        			</td>
        			<td width="120">

        			</td>
        		</tr>
        		<tr>
        			<td colspan="2">
        				ល្វែង Bloc #
        			</td>
        			<td colspan="2">

        			</td>
        			<td colspan="2">
        				អគារ House #
        			</td>
        			<td>

        			</td>
        		</tr>
        		<tr>
        			<td colspan="2">
        				មេការ
        			</td>
        			<td colspan="2">

        			</td>
        			<td colspan="2">
        				មេជាង
        			</td>
        			<td>

        			</td>
        		</tr>
        		<tr class="center-tbl" style="background: #c6d9f1;">
        			<td>
        				ល.រ<br>No
        			</td>
        			<td colspan="2">
        				ប្រភេទសន្និធិ ឬ​សម្ភារៈ<br>Item Description
        			</td>
        			<td>
        				លេខកូដ<br>Sku
        			</td>
        			<td>
        				ខ្នាត<br>UM
        			</td>
        			<td>
        				ចំនួន Qty
        			</td>
        			<td>
        				ផ្សេងៗ Remark
        			</td>
        		</tr>
        		<tr><td>&nbsp;</td><td colspan="2"></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td colspan="2"></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td colspan="2"></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td colspan="2"></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td colspan="2"></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td colspan="2"></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td colspan="7"></td></tr>
        		<tr>
        			<td colspan="2" width="100">
        				អ្នករៀបចំ<br>Prepared By
        			</td>
        			<td colspan="2" width="100">

        			</td>
        			<td colspan="2">
        				អ្នកយល់ព្រម<br>Approved By
        			</td>
        			<td width="120">

        			</td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm27" type="text/x-kendo-template">
	<div class="inv1">
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="2" rowspan="4" style="text-align: left;padding-left: 10px;" data-bind="html: obj.note">
                        	</td>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm23" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company">
            	<h2 ></h2>
                <h3 style="text-align:left;" data-bind="text: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                	<pre>អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></pre>
                    <pre>ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span></pre>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-weight:bold">
                        		<span data-bind="text: obj.contact.name"></span><br>
                        		<span data-bind="text: obj.contact.address"></span>
                        	</p>
                        </div>
                    </div>
                    <div class="clear">
                    	<!--div class="left">
                    		<p>ទូរស័ព្ទ​លេខ HP:</p>
                        </div-->
                        <div class="left dotted-ruler" style="width: 78%;">
                        	<p style="font-weight:bold" data-bind="text: obj.contact.phone"></p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th width="50" style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th width="50" style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប (បូក​បញ្ចូល​ទាំង​អាករ)​ Total (VAT included)</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ទទួលបាន Cash Receipt</td>
                            <td class="rside" data-bind="text: obj.cash_receipt"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សមតុល្យ Balance</td>
                            <td class="rside" data-bind="text: obj.balance"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm28" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company">
            	<h2 ></h2>
                <h3 style="text-align:left;" data-bind="html: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                	<pre>អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></pre>
                    <pre>ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span></pre>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>

        	<div class="clear inv2">
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
						 data-auto-bind="false"
		                 data-template="invoiceForm-lineDS-template"
		                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">
                        	សាច់ប្រាក់ទទួលបាន Cash Receipt</td>
                            <td class="rside" data-bind="text: obj.cash_receipt"></td>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm29" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company">
            	<h2 ></h2>
                <h3 style="text-align:left;" data-bind="html: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                	<pre>អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></pre>
                    <pre>ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span></pre>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រអាករ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: contactDS.data()[0].vat_no"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>

        	<div class="clear inv2">
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">
                        	សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">
                        	សាច់ប្រាក់ទទួលបាន Cash Receipt</td>
                            <td class="rside" data-bind="text: obj.cash_receipt"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">
                        	សមតុល្យ Balance</td>
                            <td class="rside" data-bind="text: obj.balance"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm30" type="text/x-kendo-template">
	<div class="inv1">
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ទទួលបាន Cash Receipt</td>
                            <td class="rside" data-bind="text: obj.cash_receipt"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សមតុល្យ Balance</td>
                            <td class="rside" data-bind="text: obj.balance"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm31" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 0; float: left; width: 100%;">បណ័្ឌដឹកទំនិញ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px; font-size: 18px"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<!-- <p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p> -->
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<!-- <th class="rside">កំណត់សំគាល់<br>REMARK</th> -->
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template31"
						data-bind="source: lineDS">

        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="90">ចេញដោយ <br>ISSUED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">ដឹកជញ្ជូន <br>DELIVERED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td>អ្នកទទួល<br>Reveived BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
         <div class="foot">
        	<div class="cover-signature">
                <div class="singature" style="float:right">
                	<p>អតិថិជន អ្នកទទួល និង ហត្ថលេខា<br /></p>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="invoiceForm32" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name: <span data-bind="text: obj.contact.name"></span></p><br>
        			<p>អាស័យដ្ឋាន Address: <span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 0; float: left; width: 100%;">បណ័្ឌដឹកទំនិញ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px; font-size: 18px"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th width="120" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th width="90" style="text-align: center;">ឯកតា<br>UM</th>
        				<th width="90" style="text-align: center;">ចំនួន<br>QTY</th>
        				<!-- <th class="rside">កំណត់សំគាល់<br>REMARK</th> -->
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template31"
						data-bind="source: lineDS">

        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="90">ចេញដោយ <br>ISSUED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">ដឹកជញ្ជូន <br>DELIVERED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td>អ្នកទទួល<br>Reveived BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
         <div class="foot">
        	<div class="cover-signature">
                <div class="singature" style="float:right">
                	<p>អតិថិជន អ្នកទទួល និង ហត្ថលេខា<br /></p>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="invoiceForm33" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 4px; float: left; width: 100%;">បណ័្ឌដឹកទំនិញ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px; font-size: 18px"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>

        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact.name"></span><br>
        			<span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<!-- <th class="rside">កំណត់សំគាល់<br>REMARK</th> -->
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template33"
						data-bind="source: lineDS">
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="90">ចេញដោយ <br>ISSUED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">ដឹកជញ្ជូន <br>DELIVERED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td>អ្នកទទួល<br>Reveived BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
         <div class="foot">
        	<div class="cover-signature">
                <div class="singature" style="float:right">
                	<p>អតិថិជន អ្នកទទួល និង ហត្ថលេខា<br /></p>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="invoiceForm34" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 4px; float: left; width: 100%;">បណ័្ឌដឹកទំនិញ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px; font-size: 18px"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>

        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact.name"></span><br>
        			<span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<!-- <th class="rside">កំណត់សំគាល់<br>REMARK</th> -->
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template33"
						data-bind="source: lineDS">
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="90">ចេញដោយ <br>ISSUED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">ដឹកជញ្ជូន <br>DELIVERED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td>អ្នកទទួល<br>Reveived BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
         <div class="foot">
        	<div class="cover-signature">
                <div class="singature" style="float:right">
                	<p>អតិថិជន អ្នកទទួល និង ហត្ថលេខា<br /></p>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="invoiceForm35" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង់ SUPPLIER INFO</b></br>
        			<div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-weight:bold">
                        		<span style="font-size: 12px;" data-bind="text: contactDS.data()[0].name"></span><br>
                        		<span data-bind="text: contactDS.data()[0].address"></span>
                        	</p>
                        </div>
                    </div>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 78%;">
                        	<sapne style="font-weight:bold" data-bind="text: contactDS.data()[0].phone"></p>
                        </div>
                    </div>
        			<!-- <p><span data-bind="text: obj.contact[0].name"></span><br>
        			<span data-bind="text: obj.contact[0].address"></span>
        			</p> -->
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT</div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT COST</th>
        				<th width="80" class="rside" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template6"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;" colspan="3" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm36" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង់ SUPPLIER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact.name"></span><br>
        			<span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT</div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT COST</th>
        				<th width="80" class="rside" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template6"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;" colspan="3" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm37" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style="margin-bottom: 15px;" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        			<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}"><p>សរុប TOTAL <span data-bind="text: obj.amount"></span></p></div>
        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង់ SUPPLIER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact.name"></span><br>
        			<span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT</div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT COST</th>
        				<th class="rside" width="80" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template8"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;" colspan="2" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td style="background-color: #eee;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td style="background-color: #dce6f2;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm38" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style="margin-bottom: 15px;" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        			<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}"><p>សរុប TOTAL <span data-bind="text: obj.amount"></span></p></div>
        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង់ SUPPLIER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact.name"></span><br>
        			<span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT</div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT COST</th>
        				<th class="rside" width="80" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template8"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;" colspan="2" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td style="background-color: #eee;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td style="background-color: #dce6f2;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm39" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<style>
				.inv2 table td {
					padding: 10px;
					font-size: 14px;
				}
				.inv1 th {
					font-size: 14px;
				}
				.inv1 * {
					font-size: 14px;
					line-height: 25px;
				}
				.inv1 td {
					font-size: 16px;
				}
				.inv1 .cover-signature .singature p {
					font-size: 14px;
					font-weight: normal;
				}
				.inv1 .ten * {
					font-size: 14px!important;
				}
			</style>
	    	<div class="head" style="width: 90%;">
	        	<div class="logo">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
	            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
	            	<h2></h2>
	            	<h3 style="float: left;font-size: 20px;" data-bind="html: company.name"></h3>
	                <div class="vattin" style="float: left; width: 100%">
	                	<p style="float: left; width: 100%">
	                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
	                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" data-bind="text: company.vat_number"></span>
	                	</p>
	                </div>
	                <div class="clear" style="float: left;">
	                	<p style="float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
	                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> Email: <span data-bind="text: company.email"></span></p>
	                </div>
	            </div>
	        </div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង SUPPLIER INFO</b><br>
        			<p><span data-bind="text: obj.contact.name"></span><br>
        			<span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style="font-size: 26px!important; text-transform: uppercase;margin-bottom: 10px;">ប័ណ្ណទទួលទំនិញ</p>
        			<p class="form-title" style="font-size: 26px!important; text-transform: uppercase;">RECIEVE NOTE</p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th style="width: 8%;text-align: center;">ល.រ<br />N<sup style="color: #fff!important;">o</sup></th>
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: left;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">កំណត់សំគាល់<br>REMARK</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-recievenot"
						data-bind="source: lineDS">

        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="150">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="150">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm40" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង SUPPLIER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact.name"></span><br>
        			<span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style="font-size: 24px;" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">កំណត់សំគាល់<br>REMARK</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template31"
						data-bind="source: lineDS">

        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm41" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style="margin-bottom: 15px;font-size: 24px;" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>

        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង SUPPLIER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact.name"></span><br>
        			<span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">កំណត់សំគាល់<br>REMARK</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template33"
						data-bind="source: lineDS">
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm42" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style="margin-bottom: 15px;font-size: 24px;" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>

        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង SUPPLIER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact.name"></span><br>
        			<span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">កំណត់សំគាល់<br>REMARK</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template33"
						data-bind="source: lineDS">
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm43" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span12">
	        	<div class="span7">
	        		<div class="logo" style="width: 40%">
		            	<img style="width: " data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
	        	</div>
	        	<div class="span5">
	        		<div class="span12" style="margin-bottom: 10px;">
	        			<h2 style="font-size: 24px;text-align: left;color:#10253f " data-bind="text: obj.title"></h2>
	        			<!--img src="<?php echo base_url(); ?>assets/invoice/img/official-receipt.jpg" /-->
	        			<p class="form-title" style="font-size: 20px; margin-top: 7px; float: left; width: 100%; margin-bottom: 0;">ប្រាក់កក់អិថិជន</p>
	        		</div>
	        		<div class="span12">
	        			<table class="span12">
	        				<tr>
	        					<td class="light-blue-td" width="100">កាលបរិច្ឆេទ Date</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.issued_date"></td>
	        				</tr>
	        				<tr>
	        					<td class="light-blue-td">លេខបបង្កាន់ដៃ Receipt No.</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.number"></td>
	        				</tr>
	        			</table>
	        		</div>
	        	</div>
	        </div>
        	<div class="span12" style="margin-top: 10px;">
		    	<div class="span7" style="margin-top: 10px;">
		    		<table class="span11">
						<tr>
							<td class="light-blue-td" width="120">ទទួលពីឈ្មោះ​ <br>Recieve From</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].name"></td>
						</tr>
						<tr>
							<td class="light-blue-td">អាស័យ​ដ្ឋាន <br>Contact Address</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].address"></td>
						</tr>
						<tr>
							<td class="light-blue-td">គោលបំណង​​ <br>Purpose</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: lineDS.data()[0].description"></td>
						</tr>
						<tr>
							<td class="light-blue-td">លេខយោង <br> Reference Document</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.reference_no"></td>
						</tr>
					</table>
		    	</div>
		    	<div class="span5" style="float:right">
		    		<p style="padding: 5px 0; text-align: left;font-weight: bold;color: #000;">ចំនួនទទួលសរុប​ <br> TOTAL RECEIVED AMOUNT</p>
		    		<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}">
		    			<p><span class="total-amount" data-bind="text: obj.amount"></span></p>
		    		</div>
		    		<p style="padding: 5px 0;font-weight: bold;color: #000;clear:both;">វិធីសាស្រ្តទូទាត់​ Mode of payment</p>
		    		<p style="color: #000;clear:both;" data-bind="text: paymentMethodDS.data()[0].name"></p>
		    	</div>
		    </div>
        	<div class="span12">
        		<div class="span8">
        			<p style="color:black;margin: 10px 0;" data-bind="text: obj.note"></p>
        		</div>
        	</div>
        	<div class="span12">
        		<div class="span5">
        			<p>On behalf of <span data-bind="text: company.name"></span></p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p>Paid By:</p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        	</div>
        	<div style="margin-top: 15px" class="span12">
        		<p>Address: <span data-bind="text: company.address"></span> <sapn data-bind="text: company.city"></sapn> <span data-bind="text: company.country.name"></span>.</p>
        	</div>
        </div>
    </div>
</script>
<script id="defaultSaleReturn" type="text/x-kendo-template">
	<div class="inv1">
        <div class="content">
        	<div class="advoucher-header">
				<div class="head" style="width: 100%;">
		        	<div class="logo" style="width: 15%;">
		            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
		            <div class="cover-name-company" style="width: 70%!important;float: left;margin-left: 15px;">
		            	<h2 ></h2>
		            	<h3 style="float: none; text-align: center;font-size: 25px;line-height: 37px!important;" data-bind="text: company.name"></h3>
		                <div class="clear" style="float: none;">
		                	<p style="font-size: 14px!important;float: none; text-align: center;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
		                    <p style="font-size: 14px!important;float: none;width: 100%;text-align: center;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> | Email: <span data-bind="text: company.email"></span></p>
		                </div>
		            </div>
		        </div>
				<div class="title" style="">
					<h2 class="kh">ប័ណ្ណបង្វិលទំនិញ / ចំណាយ</h2>
					<h2 class="en">Sale Return</h2>
				</div>
			</div>
            <div class="clear mid-header" style="margin-top: 20px;padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;width: 10%;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;width: 16%;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" 
                    	id="formListView" 
                    	data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template"
						data-bind="source: lineDS">
                    </tbody>
                </table>
            </div>
            <div class="clear" data-bind="visible: haveAccount" style="margin-top: 20px;">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;width: 10%;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">គណនី<br />Account</th>
                            <th style="text-align: center;width: 16%;">តម្លៃ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" 
                    	id="formListView" 
                    	data-role="listview"
						data-auto-bind="false"
						data-template="account-lineDS-template"
						data-bind="source: accountLineDS">
                    </tbody>
                </table>
            </div>
            <div class="clear" style="margin-top: 20px;">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                    <tfoot>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
                            <td class="rside" style="width: 16%;" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សរុបពីវក្កយបត្រ៖ <span data-bind="text: offsetnumber"></span></td>
                            <td class="rside" data-bind="text: offsetamount"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="defaultCashRefund" type="text/x-kendo-template">
	<div class="inv1">
        <div class="content">
        	<div class="advoucher-header">
				<div class="head" style="width: 100%;">
		        	<div class="logo" style="width: 15%;">
		            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
		            <div class="cover-name-company" style="width: 70%!important;float: left;margin-left: 15px;">
		            	<h2 ></h2>
		            	<h3 style="float: none; text-align: center;font-size: 25px;line-height: 37px!important;" data-bind="text: company.name"></h3>
		                <div class="clear" style="float: none;">
		                	<p style="font-size: 14px!important;float: none; text-align: center;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
		                    <p style="font-size: 14px!important;float: none;width: 100%;text-align: center;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> | Email: <span data-bind="text: company.email"></span></p>
		                </div>
		            </div>
		        </div>
				<div class="title" style="">
					<h2 class="kh">ប័ណ្ណបង្វិលសាច់ប្រាក់</h2>
					<h2 class="en">Cash Refund</h2>
				</div>
			</div>
            <div class="clear mid-header" style="margin-top: 20px;padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>គណនី Cash Account:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: accountDS.name"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;width: 10%;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;width: 16%;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" 
                    	id="formListView" 
                    	data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template"
						data-bind="source: lineDS">
                    </tbody>
                </table>
            </div>
            <div class="clear" style="margin-top: 20px;">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                    <tfoot>
                    	<tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់៖ <span data-bind="text: depositnumber"></span></td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
                            <td class="rside" style="width: 16%;" data-bind="text: obj.amount"></td>
                        </tr>
                        
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="defaultPurchase" type="text/x-kendo-template">
	<div class="inv1">
        <div class="content">
        	<div class="advoucher-header">
				<div class="head" style="width: 100%;">
		        	<div class="logo" style="width: 15%;">
		            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
		            <div class="cover-name-company" style="width: 70%!important;float: left;margin-left: 15px;">
		            	<h2 ></h2>
		            	<h3 style="float: none; text-align: center;font-size: 25px;line-height: 37px!important;" data-bind="text: company.name"></h3>
		                <div class="clear" style="float: none;">
		                	<p style="font-size: 14px!important;float: none; text-align: center;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
		                    <p style="font-size: 14px!important;float: none;width: 100%;text-align: center;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> | Email: <span data-bind="text: company.email"></span></p>
		                </div>
		            </div>
		        </div>
				<div class="title" style="">
					<h2 class="kh" style="font-size: 20px; line-height: 35px!important;">សក្ខីប័ត្រអ្នកផ្គត់ផ្គង់</h2>
					<h2 class="en" style="font-size: 16px;">Account Payable Voucher</h2>
				</div>
			</div>
            <div class="clear mid-header" style="margin-top: 20px;padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>អ្នកផ្គត់ផ្គង់:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;width: 10%;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;width: 16%;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" 
                    	id="formListView" 
                    	data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template"
						data-bind="source: lineDS">
                    </tbody>
                </table>
            </div>
            <div class="clear" data-bind="visible: haveAccount" style="margin-top: 20px;">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;width: 10%;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">គណនី<br />Account</th>
                            <th style="text-align: center;width: 16%;">តម្លៃ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" 
                    	id="formListView" 
                    	data-role="listview"
						data-auto-bind="false"
						data-template="account-lineDS-template"
						data-bind="source: accountLineDS">
                    </tbody>
                </table>
            </div>
            <div class="clear" style="margin-top: 20px;">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                    <tfoot>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
                            <td class="rside" style="width: 16%;" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សរុបពីវក្កយបត្រ៖ <span data-bind="text: offsetnumber"></span></td>
                            <td class="rside" data-bind="text: offsetamount"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div style="margin-top: 60px;overflow:hidden;">
				<div class="span4" style="text-align: center;">
					<div style="padding: 10px 5px;">រៀបចំដោយ <br> PREPARED BY</div>
					<div style="padding-top: 60px;border-bottom: 1px solid #000;width: 90%;margin: 0 auto;"></div>
				</div>
				<div class="span4" style="text-align: center;">
					<div style="padding: 10px 5px;">ត្រួតពិនិត្យដោយ <br> REVIEWED BY</div>
					<div style="padding-top: 60px;border-bottom: 1px solid #000;width: 90%;margin: 0 auto;"></div>
				</div>
				<div class="span4" style="text-align: center;">
					<div style="padding: 10px 5px;">សំរេចដោយ <br> APPROVED BY</div>
					<div style="padding-top: 60px;border-bottom: 1px solid #000;width: 90%;margin: 0 auto;"></div>
				</div>
			</div>
        	<!-- <div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6> -->
        </div>
    </div>
</script>
<script id="invoiceHaveBalance" type="text/x-kendo-template">
	<div class="inv1">
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="2" rowspan="4" style="text-align: left;padding-left: 10px;" data-bind="html: obj.note">
                        	</td>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">ខ្វះពីមុន Old Remain</td>
                            <td class="rside" data-bind="text: old_remain"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">ជំពាក់សរុប Owed</td>
                            <td class="rside" data-bind="text: amount_owed"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>

<script id="account-lineDS-template" type="text/x-kendo-template">
	<tr>
		<td><i>#:banhji.invoiceForm.accountLineDS.indexOf(data)+1#</i>&nbsp;</td>
		<td class="lside">#= description ? description : "" #</td>
		<td class="rside">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="purchaseSampleService" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
            <div class="cover-name-company" style="float: left;">
            	<h2 ></h2>
                <h3 style="text-align:left;" data-bind="text: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                	<p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                	<p style="font-size: 10px;">អ៊ីម៉ែល: </p>
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span></p>
                </div>
            </div>
            <div class="logo" style="float: right;">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
        </div>
        <div class="content">
        	<!-- <div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div> -->
        	<div>
        		<p style="font-weight: 600; font-size: 12px; margin-bottom: 8px;">Purchase order No. xxxxxxx dated xxxxxxxx</p>
        		<p style="font-size: 10px; ">Please state our order no, Item no, material no, and delivery address on all delivery documents, delivery items and invoices.</p>
        		<p style="font-weight: 600; font-size: 12px;">Procurement/ Contact person</p>
        		<p style="font-size: 10px; ">Name:</p>
        		<p style="font-size: 10px; ">Phone:</p>
        		<p style="font-size: 10px; margin-bottom: 8px;">Fax:</p>
        		<p style="font-size: 10px; margin-bottom: 8px;">Delivery date</p>
        		<p style="font-size: 10px; ">We order under our present General Conditions of Purchase (if these conditions are not already available to you please contact our responsible purchaser).</p>
        	</div>
            <!-- <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-weight:bold">
                        		<span style="font-size: 12px;" data-bind="text: contactDS.data()[0].name"></span><br>
                        		<span data-bind="text: contactDS.data()[0].address"></span>
                        	</p>
                        </div>
                    </div>
                    <div class="clear">
                    	div class="left">
                    		<p>ទូរស័ព្ទ​លេខ HP:</p>
                        </div
                        <div class="left dotted-ruler" style="width: 78%;">
                        	<p style="font-weight:bold" data-bind="text: contactDS.data()[0].phone"></p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div> -->
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">Item</th>
                            <th style="text-align: center;">Quantity</th>
                            <th style="text-align: center;">Item Description</th>
                            <th style="text-align: center;">Price(USD</th>
                            <th style="text-align: center;">Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <!-- <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប (បូក​បញ្ចូល​ទាំង​អាករ)​ Total (VAT included)</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.deposit"></td>
                        </tr> -->
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">Total USD</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <p style="font-size: 10px; margin-bottom: 8px; margin-top: 8px;">
            	By accepting the order, the supplier confirms to satisfy all regulatory requirements applicable to the country of manufacturing and sale.
            </p>

			<p style="font-size: 10px; border-bottom: 1px solid #333; width: 100%; float: left; padding-bottom: 8px;">
				Please pay attention to our invoice address. Invoices with wrong addresses cannot be handled and will be returned to you. The agreed payment terms will start only after the receipt of the corrected invoice.
            </p>
            <div style="font-size: 10px; width: 20%; float: left; margin-top: 8px;">
            	<p>Terms of payment:</p>
				<p>Invoices / credit notes:</p>
            </div>
            <div style="font-size: 10px; width: 45%; float: left; margin-left: 25px;margin-top: 8px;">
            	<p>Mekong Strategic Partners</p>
				<p>Level 2, #33 Samdech Sothearos Blvd (Corner of Street 178), Sangkat Chey Chumnas, Khan Daun Penh, Phnom Penh, Cambodia
				</p>
            </div>
            <div style="font-size: 10px; border-bottom: 1px solid #333; width: 100%; float: left; padding-bottom: 10px;">
            	<p>Work condition:	</p>
            </div>
            <p style="font-size: 10px; float: left; margin-top: 8px;">Yours faithfully</p>



        </div>
        <div class="foot" style="margin-top: 10px;">
        	<p style="font-size: 10px; float: left; margin-left: 65px; margin-bottom: 50px; width: 21%; font-weight: 600;">Mekong Strategic Partners Authorized Representative:</p>
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>Signature & Date</p>
                </div>
                <!-- <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div> -->
            </div>
            <!-- <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6> -->
        </div>
    </div>
</script>
<script id="invoiceTaxMekong" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 50%;float: right;">
            	<h2 ></h2>
            	<h3 style="float: right;">មេគង្គ ស្រេ្ទធីជីក ផាតនើរ</h3>
            	<h3 style="float: right;">Mekong Strategic Partners Co., Ltd.</h3>
                <!-- <h3 style="text-align:left;" data-bind="text: company.name"></h3> -->
                <!-- <h3 style="text-align:left;">វិក្កយបត្រពន្ធ</h3>
                <h3 style="text-align:left;">Tax Invoice</h3> -->
                <div class="vattin" style="float: right;">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear" style="float: right;">
                	<!-- <p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address">#182E1, St.63, Boeng Keng Kang Ti Muoy, Chamkar Mon, Phnom Penh</span></p>
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone">+855 (0) 12 639 733</span></p>
                    <p style="font-size: 10px;">Email: <span data-bind="text: company.telephone"> Info@mekongstrategic.com</span></p>
					<p style="font-size: 10px;">Website: <span data-bind="text: company.telephone">www.mekongstrategic.com</span></p>   -->
					<p style="font-size: 10px;float: right; text-align: right;">អាស័យ​ដ្ឋាន Address: <span data-bind="">#182E1, St.63, Boeng Keng Kang Ti Muoy, Chamkar Mon, Phnom Penh</span></p>
                    <p style="font-size: 10px;float: right;">ទូរស័ព្ទលេខ HP <span data-bind="">+855 (0) 12 639 733</span></p>
                    <p style="font-size: 10px;float: right;">Email: <span data-bind=""> Info@mekongstrategic.com</span></p>
					<p style="font-size: 10px;float: right;">Website: <span data-bind="">www.mekongstrategic.com</span></p>
                </div>
            </div>
           	<div style="float: right; width: 20%;">
           		<div id="invQR"></div>
           	</div>
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រពន្ធ</h1>
            	<h2 data-bind="">Tax Invoice</h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: contactDS.data()[0].vat_no"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<span style="font-weight:bold" data-bind="text: obj.number"></span>-<span style="font-weight:bold" data-bind="text: company.id"></span>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>

        	<div class="clear inv2">
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">ការពិពណ៌នា<br />Description</th>
                            <th style="text-align: center;">ចំនួនគិតជាដុល្លារ<br />Amount (USD)</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <!-- <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr> -->
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                       <!--  <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr> -->
                        <!-- <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr> -->
                    </tfoot>
                </table>
            </div>

            <div style="float: left;width: 35%; font-size: 10px; margin-top: 10px;">
            	<p>Please make the payment to:</p>
            	<p><b>Account name: </b>Mekong Strategic Partners</p>
            	<p><b>Bank: </b>ANZ Royal Bank</p>
            	<p><b>Address: </b>20 Kramoun Sar, PP, Cam.</p>
            	<p><b>Account No: </b>3242528</p>
            	<p><b>Swift Code: </b>ANZBKHPP</p>
            </div>
            <div style="float: left;width: 35%; font-size: 10px; margin-top: 10px; margin-left: 20px;">
            	<p style="margin-bottom: 10px;">Payment due withinin 14 days of date of invoice.</p>
            	<p>Thank you for choosing Mekong Strategic Partners</p>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceMsp" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 50%;float: right;">
            	<h2 ></h2>
            	<h3 style="float: right;">មេគង្គ ស្រេ្ទធីជីក ផាតនើរ</h3>
            	<h3 style="float: right;">Mekong Strategic Partners Co., Ltd.</h3>
                <!-- <h3 style="text-align:left;" data-bind="text: company.name"></h3> -->
                <!-- <h3 style="text-align:left;">វិក្កយបត្រពន្ធ</h3>
                <h3 style="text-align:left;">Tax Invoice</h3> -->
                <div class="vattin" style="float: right;">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear" style="float: right;">
                	<!-- <p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address">#182E1, St.63, Boeng Keng Kang Ti Muoy, Chamkar Mon, Phnom Penh</span></p>
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone">+855 (0) 12 639 733</span></p>
                    <p style="font-size: 10px;">Email: <span data-bind="text: company.telephone"> Info@mekongstrategic.com</span></p>
					<p style="font-size: 10px;">Website: <span data-bind="text: company.telephone">www.mekongstrategic.com</span></p>   -->
					<p style="font-size: 10px;float: right; text-align: right;">អាស័យ​ដ្ឋាន Address: <span data-bind="">#182E1, St.63, Boeng Keng Kang Ti Muoy, Chamkar Mon, Phnom Penh</span></p>
                    <p style="font-size: 10px;float: right;">ទូរស័ព្ទលេខ HP <span data-bind="">+855 (0) 12 639 733</span></p>
                    <p style="font-size: 10px;float: right;">Email: <span data-bind=""> Info@mekongstrategic.com</span></p>
					<p style="font-size: 10px;float: right;">Website: <span data-bind="">www.mekongstrategic.com</span></p>
                </div>
            </div>
           	<div style="float: right; width: 20%;">
           		<div id="invQR"></div>
           	</div>
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រពន្ធ</h1>
            	<h2 data-bind="">Tax Invoice</h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: contactDS.data()[0].vat_no"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<span style="font-weight:bold" data-bind="text: obj.number"></span>-<span style="font-weight:bold" data-bind="text: company.id"></span>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>

        	<div class="clear inv2">
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">ការពិពណ៌នា<br />Description</th>
                            <th style="text-align: center;">ចំនួនគិតជាដុល្លារ<br />Amount (USD)</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <!-- <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr> -->
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                       <!--  <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr> -->
                        <!-- <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr> -->
                    </tfoot>
                </table>
            </div>

            <div style="float: left;width: 35%; font-size: 10px; margin-top: 10px;">
            	<p>Please make the payment to:</p>
            	<p><b>Account name: </b>Mekong Strategic Partners</p>
            	<p><b>Bank: </b>ANZ Royal Bank</p>
            	<p><b>Address: </b>20 Kramoun Sar, PP, Cam.</p>
            	<p><b>Account No: </b>3242528</p>
            	<p><b>Swift Code: </b>ANZBKHPP</p>
            </div>
            <div style="float: left;width: 35%; font-size: 10px; margin-top: 10px; margin-left: 20px;">
            	<p style="margin-bottom: 10px;">Payment due withinin 14 days of date of invoice.</p>
            	<p>Thank you for choosing Mekong Strategic Partners</p>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoicePcg" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
            	<h2 ></h2>
            	<h3 style="float: left;">ភីស៊ីជី &  ផាតនើរ PCG & Partners Co., Ltd</h3>
                <div class="vattin" style="float: left; width: 100%">
                	<p style="float: left; width: 100%">
                		<span style="float: left; margin-left:0;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN) </span>
                		<span style="float: left; margin-left:0;" id="vat_number" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="font-size: 10px;float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="">#133, , Parkway Square 1st Floor (Room 1.21), Street Mao Tse Tong Blvd, Sangkat Toul Svay Prey, Khan Chamkarmon, Phnom Penh, Cambodia)</span></p>
                    <p style="font-size: 10px;float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="">+855 (0) 236666979</span></p>
                    <p style="font-size: 10px;float: left; width: 100%">Email: <span data-bind=""> Info@pro-cg.com</span></p>
					<p style="font-size: 10px;float: left; width: 100%">Website: <span data-bind="">www.pro-cg.com</span></p>
                </div>
            </div>
           	<div style="float: right; width: 20%;">
           		<div id="invQR"></div>
           	</div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; background: #001F5F; color: #fff; margin-bottom: 15px;">
        		<div class="span6">
        			<h1 style="color: #fff !important;">វិក្កយបត្រ Invoice</h1>
        		</div>
        		<div class="span6">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;">លេខវិក្កយបត្រ INVOICE NO </td>
        					<td style="border:0;text-align: left;">0917-0665 </td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;">30/09/2017 </td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span6" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1;">អតថិជិន (Customer) </td>
        					<td style="text-align: left; background: #F1F1F1;">អាស័យ​ដ្ឋាន (Address) </td>
        				</tr>
        				<tr>
        					<td style="text-align: left;"></td>
        					<td style="text-align: left;">ភូមិដងហ៊ត ឃ ំ ចំប៉ សសុក ពសពកបាស លខតតតកកវ សបធនសកុមសប៊កាភបិ លបណត ញសកុមកកលមអរទ នបងវិល </td>
        				</tr>
        			</table>
        		</div>
        		<div class="span6">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: #F1F1F1;">លក្ខ័ខណ្ឌ ទូរទាត់ <br> Payment Term </td>
        					<td style="text-align: left;"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: #F1F1F1;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;background: #F1F1F1; color: #333;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;background: #F1F1F1; color: #333;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="text-align: center;background: #F1F1F1; color: #333;">បរិមាណ<br />QTY</th>
                            <th style="text-align: center;background: #F1F1F1; color: #333;">ឯកតា​<br />UOM</th>
                            <th style="text-align: center;background: #F1F1F1; color: #333;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;background: #F1F1F1; color: #333;">ថ្លៃ​ទំនិញ Amount</th>
                        </tr>
                    </thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>
							<td>5</td>
							<td>6</td>
						</tr>
						<tr>
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>
							<td>5</td>
							<td>6</td>
						</tr>
						<tr>
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>
							<td>5</td>
							<td>6</td>
						</tr>
						<tr>
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>
							<td>5</td>
							<td>6</td>
						</tr>
						<tr>
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>
							<td>5</td>
							<td>6</td>
						</tr>
					</tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ (បូកបញ្ជូលទាំងអាករ) GRAND TOTAL (VAT INCLUSIVE) </td>
                            <td style="background: #333; color: #fff;" class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="border-bottom: 1px solid #BEBEBE; padding-bottom:15px;">
				<div class="span8">
					<div style="border-radius: 5px; width: 100%; padding: 8px;border: 1px solid #BEBEBE; font-size: 11px;">
						<p style="font-weight: 600;">កំណត់សំគាល់៖ </p>
						<ul>
							<li>
								<b>ជម្រើសនៃការបង់ប្រាក់៖</b>
								អ្នកអាចបង់ប្រាក់ផ្ទាល់នៅការិយាល័យបង់ប្រាក់របស់ប្រាក់របស់ក្រុមហ៊ុន រឺ តាមភ្នាក់ងាររបស់ស្ថាប័នហិរញ្ញវត្ថុដូចមានរាយមានខាងក្រោម។ ក្នុងករណីអ្នកត្រូវការផ្ទេរសាច់ប្រាក់តាមធនាគារ សូមផ្ទេរមកកាន់គណនី៖
								<ul>
									<li><b>គណនីឈ្មោះ៖</b> PCG & Partners Co., Ltd </ol>
									<li><b>គណនីឈ្មោះ៖</b> 1400-01569868-1-1 </ol>
									<li><b>គណនីឈ្មោះ៖</b> ACLEDA Bank Plc. សាខាខេត្ត ព្រៃវែង</ol>
								</ul>
							</ol>
							<li>
								កម្រៃសេវាផ្ទេរសាច់ប្រាក់ជាការទទួលខុសត្រូវរបស់អ្នក
							</li>
							<li>
								សូមផ្តល់ពត័មានដែលអ្នកបានទូទាត់រួចមកកាន់៖ </br>
								លេខទូរស័ព្ទ <b> +855 087 719 898</b> រឺ <b> Email: lalinda@pro-cg.com </b>
							</li>
						</ul>
					</div>
				</div>
				<div class="span4">
					<div class="foot" style="margin-top: 45px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="margin-top: 57px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>

			        </div>
				</div>
           	</div>
        </div>
        <div class="foot" style="margin-top:10px;">
        	<div class="span3">
        		<div style="float: right; width: 20%;">
	           		<div id="invQR"></div>
	           	</div>
        	</div>
        	<div class="span3">
        		<p style="font-size: 11px;margin-bottom: 8px;">អ្នកអាចទូរទាត់វិក្កយបត្រនេះ ដោយប្រើប្រាស់លេខកូដខាងក្រោម៖</p>
        		<div  style="float: left; width: 100%; text-align:center; border: 1px solid #E9E9E9; border-radius:5px;padding: 8px;">0917-0665/353
        		</div>
        		<div style="float: left; width: 100%; height: 30px; background: #333; margin-top: 8px; margin-bottom: 20px;"></div>
        	</div>
        	<div class="span6" style="padding-left:15px; margin-bottom: 10px;">
        		<b style="font-size:12px; float:left; margin-bottom: 8px;">តាមរយៈភ្នាក់ងាររបស់ស្ថាប័នហិរញ្ញវត្ថុខាងក្រោមនេះ</b>
        		<div  style="float: left; width: 90%; text-align:center; border: 1px solid #E9E9E9; border-radius:5px;padding: 8px;min-height: 50px; margin-bottom: 20px;">
        		</div>
        	</div>
        </div>
    </div>
</script>
<script id="invoiceHDCom" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 0px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			គំរោង Job : <span data-bind="text: contactDS.data()[0].job"></span><br/>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right; width: 40%">
        			<p class="form-title" style=" margin-bottom: 0; font-size: 20px; margin-top: 0; float: left; width: 100%;">បញ្ជាទិញ</p>
        			<p style="font-size: 18px;margin-bottom: 10px;" class="form-title" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD : <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th width="80" class="rside" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template6"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;color: #000" colspan="3" rowspan="4" data-bind="text: obj.note"></td>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;color: #000" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90" style="color:#000;">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80" style="color:#000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td width="90" style="color:#000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color:#000;">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color:#000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color:#000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="defaultCashAdvance" type="text/x-kendo-template">
	<style >
		.advance-voucher{
			width: 100%;
			margin: 50px auto 0;
			height: 250px;
		}
		.advance-voucher .advoucher-header .title{
			float: right;
			padding: 10px 10px 0;
			margin-bottom: 15px;
			line-height: 45px;
			width: 100%;
		}
		.advance-voucher .advoucher-header .title .kh{
			float: none;
			width: 100%;
			text-align: center;
			font-size: 30px;
			font-weight: 700;
			line-height: 55px!important;
			margin-right: 8px;
		}
		.advance-voucher .advoucher-header .title .en{
			float: none;
			font-size: 20px;
			font-weight: 700;
			text-align: center;
			text-transform: uppercase;
			line-height: 46px;
		}
		.advance-voucher .advoucher-header table{
			width: 100%;
			float: left;
			border: 1px solid #333;
			border-collapse: collapse;
		}
		.advance-voucher .advoucher-header table tr td{
			padding: 5px;
			border: 1px solid #333;
			font-size: 13px;
		}
		.advance-voucher .advoucher-content table{
			width: 100%;
			float: left;
			border: 1px solid #333;
			border-collapse: collapse;
		}
		.advance-voucher .advoucher-content table tr th{
			padding: 5px;
			font-size: 13px;
			font-weight: 700;
			background: #1E4E78;
			text-transform: uppercase;
			border: 1px solid #333;
			color: #fff;
		}
		.advance-voucher .advoucher-content table tr td{
			padding: 5px;
			border: 1px solid #333;
			font-size: 13px;
		}
		.advance-voucher .advoucher-footer table{
			width: 100%;
			float: left;
			border: 1px solid #333;
			border-collapse: collapse;
		}
		.advance-voucher .advoucher-footer table tr th{
			padding: 5px;
			font-size: 13px;
			font-weight: 700;
			background: #ccc;
			text-transform: uppercase;
			border: 1px solid #333;
			color: #333;
		}
		.advance-voucher .advoucher-footer table tr td{
			padding: 5px;
			border: 1px solid #333;
			font-size: 13px;
		}
		.advance-voucher .advoucher-footer table tr td.rotate {
		    -moz-transform: rotate(-90.0deg);
		    -o-transform: rotate(-90.0deg);
		    -webkit-transform: rotate(-90.0deg);
		    filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);
		    -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)";
		}
		.inv1 td {
			text-align: left;
		}
	</style>
	<div class="inv1">
		<div class="advance-voucher" style="width: 90%;">
			<div class="advoucher-header">
				<div class="head" style="width: 100%;">
		        	<div class="logo" style="width: 15%;">
		            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
		            <div class="cover-name-company" style="width: 70%!important;float: left;margin-left: 15px;">
		            	<h2 ></h2>
		            	<h3 style="float: none; text-align: center;font-size: 25px;line-height: 37px!important;" data-bind="text: company.name"></h3>
		                <div class="clear" style="float: none;">
		                	<p style="font-size: 14px!important;float: none; text-align: center;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
		                    <p style="font-size: 14px!important;float: none;width: 100%;text-align: center;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> | Email: <span data-bind="text: company.email"></span></p>
		                </div>
		            </div>
		        </div>
				<div class="title">
					<h2 class="kh">សក្ខីប័ត្របុរេប្រទាន </h2>
					<h2 class="en">advance voucher</h2>
				</div>
				<table>
					<tr>
						<td style="width: 22%;"><b>អ្នកស្នើសុំ Name</b></td>
						<td style="width: 20%;" data-bind="text: contactDS.data()[0].name"></td>
						<td><b>លេខសក្ខីប័ត្រ AV No.</b></td>
						<td style="width: 20%;" data-bind="text: obj.number"></td>
					</tr>
					<tr>
						<td><b>តំណែង Position</b></td>
						<td></td>
						<td><b>កាលបរិចេ្ឆទ Date</b></td>
						<td data-bind="text: obj.issued_date"></td>
					</tr>
					<tr>
						<td><b>ផ្នែក Department</b></td>
						<td></td>
						<td><b>លេខប័ណ្ណលទ្ធកម្ម PR No.</b></td>
						<td></td>
					</tr>
					<tr>
						<td><b>ទូទាត់ដោយ Mode of Payment</b></td>
						<td colspan="3">
							<b>ទូទាត់ដោយ Mode of Payment</b> : <span data-bind="text: paymentMethodDS.data()[0].name"></span><br>
							<b>ប្រភេទរូបិយប័ណ្ណ Currency Required : </b> <span data-bind="text: currencyDS.data()[0].code"></span>
						</td>
					</tr>
					<tr>
						<td><b>គោលបំណងនៃបុរេប្រទាន <br> Purpose of Advance</b></td>
						<td colspan="3" data-bind="text: accountLineDS.data()[0].description"></td>
					</tr>
				</table>
			</div>
			<div class="advoucher-content">
				<table>
					<tr>
						<th style="background: #1E4E78!important;color: #fff!important;width: 22%;">Account Code</th>
						<th style="background: #1E4E78!important;color: #fff!important;">Account Description</th>
						<th style="background: #1E4E78!important;color: #fff!important;">Debit</th>
						<th style="background: #1E4E78!important;color: #fff!important;width: 19%;">Credit</th>
					</tr>
					<tr>
						<td data-bind="text: journalLineDS.data()[0].account.number"></td>
						<td data-bind="text: journalLineDS.data()[0].account.name"></td>
						<td style="text-align: right;" data-bind="text: journalLineDS.data()[0].dr"></td>
						<td style="text-align: right;"></td>
					</tr>
					<tr>
						<td data-bind="text: journalLineDS.data()[1].account.number"></td>
						<td data-bind="text: journalLineDS.data()[1].account.name"></td>
						<td style="text-align: right;"></td>
						<td style="text-align: right;" data-bind="text: journalLineDS.data()[1].cr"></td>
					</tr>
					<tr>
						<td colspan="3" style="text-align: right; font-size: 18px; font-weight: 700;"> <span style="font-size: 17px;">សរុប</span> Total</td>
						<td style="text-align: right; font-weight: bold;" data-bind="text: obj.amount"></td>
					</tr>
					<tr>
						<td colspan="2" style="background: #1E4E78!important; color: #fff!important;">ចំនួនជាអក្សរ Amount in Words</td>
						<td colspan="2" data-bind="text: numberToString"></td>
					</tr>
				</table>
			</div>
			<div class="advoucher-footer">
				<table>
					<tr>
						<th style="background: #ccc!important;" colspan="2"></th>
						<th style="background: #ccc!important;">ហត្ថលេខា SINATURE</th>
						<th style="background: #ccc!important;">តំណែង POSITION</th>
						<th style="background: #ccc!important;width: 19%;">កាលបរិចេ្ឆទ DATE</th>
					</tr>
					<tr>
						<td rowspan="6" class="rotate">Finance Department</td>
						<td style="padding: 10px 5px;">រៀបចំដោយ <br> PREPARED BY</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>ត្រួតពិនិត្យដោយ <br> REVIEWED BY</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>សំរេចដោយ <br> APPROVED BY</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>ទូទាត់ដោយ <br> PAID BY</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>ទទួលដោយ <br> RECEIVED BY</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>កត់ត្រាដោយ <br> POSTED BY</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</script>
<!-- MAX Concrete Form-->
<script id="invoiceMAXConcrete" type="text/x-kendo-template">
	<div class="inv1" style="page-break-after: always;padding-top: 20px;">
		<style>
			.inv2 table td {
				padding: 5px;
				font-size: 12px;
			}
			.inv1 th {
				font-size: 12px;
			}
			.inv1 * {
				font-size: 12px;
				line-height: 20px;
			}
			.inv1 td {
				font-size: 14px;
			}
			.inv1 .cover-signature .singature p {
				font-size: 12px;
				font-weight: normal;
			}
		</style>
    	<div class="head" style="width: 90%;">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
            	<h2></h2>
            	<h3 style="float: left;font-size: 20px;" data-bind="text: company.name"></h3>
                <div class="vattin" style="float: left; width: 100%">
                	<p style="float: left; width: 100%">
                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> <br>Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; background: \\#001F5F!important;-webkit-print-color-adjust:exact; color: \\#fff; margin-bottom: 15px;">
        		<div class="span5">
        			<h1 style="color: \\#fff !important;margin-top: 15px;padding-left: 30px; text-align: left;text-transform: uppercase;">វិក្កយបត្រ Invoice</h1>
        		</div>
        		<div class="span6" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;text-transform: uppercase;color:\\#fff!important;">លេខវិក្កយបត្រ INVOICE NO</td>
        					<td style="border:0;text-align: left;font-weight: bold;color:\\#fff!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color:\\#fff!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color:\\#fff!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span6" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: \\#F1F1F1;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left; background: \\#F1F1F1;">អាស័យ​ដ្ឋាន (Address) </td>
        				</tr>
        				<tr>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].name"></td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: \\#F1F1F1;">លក្ខ័ខណ្ឌ ទូរទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: \\#F1F1F1;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="padding: 10px 0;width: 8%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ល.រ<br />No</th>
                            <th style="padding: 10px 0;width: 25%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">លេខយោង<br />Reference</th>
                            <th style="padding: 10px 0;width: 12%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិមាណ<br />QTY</th>
                            <th style="padding: 10px 0;width: 812%;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">កម្លាំង<br />Strange</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">Slump</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ឯកតា​<br />UOM</th>
                            <th style="padding: 10px 0;width: 14%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="padding: 10px 0;width: 15%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃ​ទំនិញ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="max-concrete-line"
						data-bind="source: lineDS">
						<tr>
							<td style="height:40px!important;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="8" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ (បូកបញ្ជូលទាំងអាករ) GRAND TOTAL (VAT INCLUSIVE) </td>
                            <td style="font-size: 16px;background: \\#333; color: \\#fff;" class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="border-bottom: 1px solid \\#BEBEBE; padding-bottom:15px;">
				<div class="span12">
					<div style="border-radius: 5px; width: 100%; padding: 8px;border: 1px solid \\#BEBEBE; font-size: 11px;">
						<p data-bind="html: obj.note"></p>
					</div>
				</div>
				<div class="span12">
					<div class="span4" style="margin-top: 80px; float: left;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="span4" style="margin-top: 80px; float: right;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<script id="invoiceVATMAXConcrete" type="text/x-kendo-template">
	<div class="inv1" style="page-break-after: always;padding-top: 20px;">
		<style>
			.inv2 table td {
				padding: 5px;
				font-size: 12px;
			}
			.inv1 th {
				font-size: 12px;
			}
			.inv1 * {
				font-size: 12px;
				line-height: 20px;
			}
			.inv1 td {
				font-size: 14px;
			}
			.inv1 .cover-signature .singature p {
				font-size: 12px;
				font-weight: normal;
			}
		</style>
    	<div class="head" style="width: 90%;">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
            	<h2></h2>
            	<h3 style="float: left;font-size: 20px;" data-bind="text: company.name"></h3>
                <div class="vattin" style="float: left; width: 100%">
                	<p style="float: left; width: 100%">
                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> <br>Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; background: \\#001F5F!important;-webkit-print-color-adjust:exact; color: \\#fff; margin-bottom: 15px;">
        		<div class="span6">
        			<h1 style="color: \\#fff !important;margin-top: 15px;padding-left: 30px; text-align: left;text-transform: uppercase;">វិក្កយបត្រ Invoice</h1>
        		</div>
        		<div class="span5" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;text-transform: uppercase;color:\\#fff!important;">លេខវិក្កយបត្រ<br> INVOICE NO</td>
        					<td style="border:0;text-align: left;font-weight: bold;color:\\#fff!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color:\\#fff!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color:\\#fff!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span6" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: \\#F1F1F1;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left; background: \\#F1F1F1;" data-bind="text: contactDS.data()[0].name"> </td>
        				</tr>
        				<tr>
        					<td style="text-align: left;" >អាស័យ​ដ្ឋាន (Address)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left;font-size: 11px;line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)(ប្រសិន​បើ​មាន / If any)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].vat_no"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: \\#F1F1F1;">លក្ខ័ខណ្ឌ ទូរទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: \\#F1F1F1;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="padding: 10px 0;width: 8%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ល.រ<br />No</th>
                            <th style="padding: 10px 0;width: 25%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">លេខយោង<br />Reference</th>
                            <th style="padding: 10px 0;width: 12%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិមាណ<br />QTY</th>
                            <th style="padding: 10px 0;width: 812%;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">កម្លាំង<br />Strange</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">Slump</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ឯកតា​<br />UOM</th>
                            <th style="padding: 10px 0;width: 14%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="padding: 10px 0;width: 15%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃ​ទំនិញ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="max-concrete-line"
						data-bind="source: lineDS">
						<tr>
							<td style="height:40px!important;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="8" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr><!-- 
                        <tr>
                        	<td colspan="8" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr> -->
                        <tr>
                        	<td colspan="8" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="8" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <!-- <tr>
                        	<td colspan="8" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr> -->
                        <!-- <tr>
                        	<td colspan="8" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr> -->
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="border-bottom: 1px solid \\#BEBEBE; padding-bottom:15px;">
				<div class="span12">
					<div style="border-radius: 5px; width: 100%; padding: 8px;border: 1px solid \\#BEBEBE; font-size: 11px;">
						<p data-bind="html: obj.note"></p>
					</div>
				</div>
				<div class="span12">
					<div class="span4" style="margin-top: 80px; float: left;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="span4" style="margin-top: 80px; float: right;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<!-- Heritage walk -->
<script id="invoiceHeritageWalk" type="text/x-kendo-template">
	<div class="inv1" style="page-break-after: always;padding-top: 20px;">
		<style>
			.inv2 table td {
				padding: 5px;
				font-size: 12px;
			}
			.inv1 th {
				font-size: 12px;
			}
			.inv1 * {
				font-size: 12px;
				line-height: 20px;
			}
			.inv1 td {
				font-size: 14px;
			}
			.inv1 .cover-signature .singature p {
				font-size: 12px;
				font-weight: normal;
			}
		</style>
    	<div class="head" style="width: 90%;">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
            	<h2></h2>
            	<h3 style="float: left;font-size: 20px;text-align: left;" data-bind="html: company.name"></h3>
                <div class="vattin" style="float: left; width: 100%">
                	<p style="float: left; width: 100%">
                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> <br>Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; background: \\#001F5F!important;-webkit-print-color-adjust:exact; color: \\#fff; margin-bottom: 15px;">
        		<div class="span5">
        			<h1 style="color: \\#fff !important;margin-top: 15px;padding-left: 30px; text-align: left;text-transform: uppercase;">វិក្កយបត្រ Invoice</h1>
        		</div>
        		<div class="span6" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;text-transform: uppercase;color:\\#fff!important;">លេខវិក្កយបត្រ INVOICE NO</td>
        					<td style="border:0;text-align: left;font-weight: bold;color:\\#fff!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color:\\#fff!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color:\\#fff!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span6" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: \\#F1F1F1;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left;" >គម្រោង (Project)</td>
        					<td style="text-align: left;" data-bind="text: jobDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: \\#F1F1F1;">អាស័យ​ដ្ឋាន (Address) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: \\#F1F1F1;">លេខទូរស័ព្ទ (Telephone) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].phone"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: \\#F1F1F1;">លក្ខ័ខណ្ឌ ទូរទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: \\#F1F1F1;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="padding: 10px 0;width: 8%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ល.រ<br />No</th>
                            <th style="padding: 10px 0;width: 25%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="padding: 10px 0;width: 12%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិមាណ<br />QTY</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ឯកតា​<br />UOM</th>
                            <th style="padding: 10px 0;width: 14%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="padding: 10px 0;width: 15%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃ​ទំនិញ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="heritage-walk-line"
						data-bind="source: lineDS">
						<tr>
							<td style="height:40px!important;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ (បូកបញ្ជូលទាំងអាករ) GRAND TOTAL (VAT INCLUSIVE) </td>
                            <td style="font-size: 16px;background: \\#333; color: \\#fff;" class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="border-bottom: 1px solid #BEBEBE; padding-bottom:15px;">
				<div class="span8">
					<div style="border-radius: 5px; width: 100%; padding: 8px;border: 1px solid #BEBEBE; font-size: 11px;" data-bind="html: obj.note">

					</div>
				</div>
				<div class="span4">
					<div class="foot" style="margin-top: 45px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="margin-top: 57px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<script id="invoiceVATHeritageWalk" type="text/x-kendo-template">
	<div class="inv1" style="page-break-after: always;padding-top: 20px;">
		<style>
			.inv2 table td {
				padding: 5px;
				font-size: 12px;
			}
			.inv1 th {
				font-size: 12px;
			}
			.inv1 * {
				font-size: 12px;
				line-height: 20px;
			}
			.inv1 td {
				font-size: 14px;
			}
			.inv1 .cover-signature .singature p {
				font-size: 12px;
				font-weight: normal;
			}
		</style>
    	<div class="head" style="width: 90%;">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
            	<h2></h2>
            	<h3 style="float: left;font-size: 20px;text-align: left;" data-bind="html: company.name"></h3>
                <div class="vattin" style="float: left; width: 100%">
                	<p style="float: left; width: 100%">
                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> <br>Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; background: \\#001F5F!important;-webkit-print-color-adjust:exact; color: \\#fff; margin-bottom: 15px;">
        		<div class="span6">
        			<h1 style="color: \\#fff !important;margin-top: 15px;padding-left: 30px; text-align: left;text-transform: uppercase;">វិក្កយបត្រ Invoice</h1>
        		</div>
        		<div class="span5" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;text-transform: uppercase;color:\\#fff!important;">លេខវិក្កយបត្រ<br> INVOICE NO</td>
        					<td style="border:0;text-align: left;font-weight: bold;color:\\#fff!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color:\\#fff!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color:\\#fff!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span6" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: \\#F1F1F1;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left; background: \\#F1F1F1;" data-bind="text: contactDS.data()[0].name"> </td>
        				</tr>
        				<tr>
        					<td style="text-align: left;" >គម្រោង (Project)</td>
        					<td style="text-align: left;" data-bind="text: jobDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left;" >អាស័យ​ដ្ឋាន (Address)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: \\#F1F1F1;">លេខទូរស័ព្ទ (Telephone) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].phone"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left;font-size: 11px;line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].vat_no"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: \\#F1F1F1;">លក្ខ័ខណ្ឌ ទូរទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: \\#F1F1F1;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="padding: 10px 0;width: 8%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ល.រ<br />No</th>
                            <th style="padding: 10px 0;width: 25%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="padding: 10px 0;width: 12%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិមាណ<br />QTY</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ឯកតា​<br />UOM</th>
                            <th style="padding: 10px 0;width: 14%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="padding: 10px 0;width: 15%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃ​ទំនិញ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="heritage-walk-line"
						data-bind="source: lineDS">
						<tr>
							<td style="height:40px!important;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <!-- <tr>
                        	<td colspan="6" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="6" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr> -->
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="border-bottom: 1px solid \\#BEBEBE; padding-bottom:15px;">
				<div class="span8">
					<div style="border-radius: 5px; width: 100%; padding: 8px;border: 1px solid #BEBEBE; font-size: 11px;" data-bind="html: obj.note">

					</div>
				</div>
				<div class="span4">
					<div class="foot" style="margin-top: 45px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="margin-top: 57px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<script id="depositHeritageWalk" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span12">
	        	<div class="span7">
	        		<div class="logo" style="width: 40%">
		            	<img style="width: " data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
	        	</div>
	        	<div class="span5">
	        		<div class="span12" style="margin-bottom: 10px;">
	        			<h2 style="font-size: 24px;text-align: left;color:#10253f">ប្រាក់កក់អតិថិជន</h2>
	        			<p class="form-title" style="font-size: 20px; margin-top: 7px; float: left; width: 100%; margin-bottom: 0;" data-bind="text: obj.title"></p>
	        		</div>
	        		<div class="span12">
	        			<table class="span12">
	        				<tr>
	        					<td class="light-blue-td" width="100">កាលបរិច្ឆេទ Date</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.issued_date"></td>
	        				</tr>
	        				<tr>
	        					<td class="light-blue-td">លេខបង្កាន់ដៃ Receipt No.</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.number"></td>
	        				</tr>
	        			</table>
	        		</div>
	        	</div>
	        </div>
        	<div class="span12" style="margin-top: 10px;">
		    	<div class="span7" style="margin-top: 10px;">
		    		<table class="span11">
						<tr>
							<td class="light-blue-td" width="120">ទទួលពីឈ្មោះ​ <br>Recieve From</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].name"></td>
						</tr>
						<tr>
        					<td class="light-blue-td" >គម្រោង <br>Project</td>
        					<td style="text-align: left;padding-left: 5px;" data-bind="text: jobDS.data()[0].name"></td>
        				</tr>
						<tr>
							<td class="light-blue-td">អាស័យ​ដ្ឋាន <br>Contact Address</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].address"></td>
						</tr>
						<tr>
							<td class="light-blue-td">គោលបំណង​​ <br>Purpose</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="html: accountLineDS.data()[0].description"></td>
						</tr>
						<tr>
							<td class="light-blue-td">លេខយោង <br> Reference Document</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.reference_no"></td>
						</tr>
					</table>
		    	</div>
		    	<div class="span5" style="float:right">
		    		<p style="padding: 5px 0; text-align: left;font-weight: bold;color: #000;">ចំនួនទទួលសរុប​ <br> TOTAL RECEIVED AMOUNT</p>
		    		<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}">
		    			<p><span class="total-amount" data-bind="text: obj.amount"></span></p>
		    		</div>
		    		<p style="padding: 5px 0;font-weight: bold;color: #000;clear:both;">វិធីសាស្រ្តទូទាត់​ Mode of payment</p>
		    		<p style="color: #000;clear:both;" data-bind="text: paymentMethodDS.data()[0].name"></p>
		    	</div>
		    </div>
        	<div class="span12">
        		<div class="span5">
        			<p>On behalf of <span data-bind="html: company.name"></span></p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p>Paid By:</p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        	</div>
        	<div style="margin-top: 15px" class="span12">
        		<p>Address: <span data-bind="text: company.address"></span> <sapn data-bind="text: company.city"></sapn> <span data-bind="text: company.country.name"></span>.</p>
        	</div>
        </div>
    </div>
</script>
<script id="receiptHeritageWalk" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span12">
	        	<div class="span7">
	        		<div class="logo" style="width: 40%">
		            	<img style="width: " data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
	        	</div>
	        	<div class="span5">
	        		<div class="span12" style="margin-bottom: 10px;">
	        			<h2 style="font-size: 24px;text-align: left;color:#10253f">ទទួលប្រាក់អតិថិជន</h2>
	        			<p class="form-title" style="font-size: 20px; margin-top: 7px; float: left; width: 100%; margin-bottom: 0;" data-bind="text: obj.title"></p>
	        		</div>
	        		<div class="span12">
	        			<table class="span12">
	        				<tr>
	        					<td class="light-blue-td" width="100">កាលបរិច្ឆេទ Date</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.issued_date"></td>
	        				</tr>
	        				<tr>
	        					<td class="light-blue-td">លេខបបង្កាន់ដៃ Receipt No.</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.number"></td>
	        				</tr>
	        			</table>
	        		</div>
	        	</div>
	        </div>
        	<div class="span12" style="margin-top: 10px;">
		    	<div class="span7" style="margin-top: 10px;">
		    		<table class="span11">
						<tr>
							<td class="light-blue-td" width="120">ទទួលពីឈ្មោះ​ <br>Recieve From</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].name"></td>
						</tr>
						<tr>
        					<td class="light-blue-td" >គម្រោង <br>Project</td>
        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.reference[0].job"></td>
        				</tr>
						<tr>
							<td class="light-blue-td">អាស័យ​ដ្ឋាន <br>Contact Address</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].address"></td>
						</tr>
						<tr>
							<td class="light-blue-td">គោលបំណង​​ <br>Purpose</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="html: obj.memo"></td>
						</tr>
						<tr>
							<td class="light-blue-td">លេខយោង <br> Reference Document</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.reference_no"></td>
						</tr>
					</table>
		    	</div>
		    	<div class="span5" style="float:right">
		    		<p style="padding: 5px 0; text-align: left;font-weight: bold;color: #000;">ចំនួនទទួលសរុប​ <br> TOTAL RECEIVED AMOUNT</p>
		    		<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}">
		    			<p><span class="total-amount" data-bind="text: obj.amount"></span></p>
		    		</div>
		    		<p style="padding: 5px 0;font-weight: bold;color: #000;clear:both;">វិធីសាស្រ្តទូទាត់​ Mode of payment</p>
		    		<p style="color: #000;clear:both;" data-bind="text: paymentMethodDS.data()[0].name"></p>
		    	</div>
		    </div>
        	<div class="span12">
        		<div class="span5">
        			<p>On behalf of <span data-bind="html: company.name"></span></p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p>Paid By:</p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        	</div>
        	<div style="margin-top: 15px" class="span12">
        		<p>Address: <span data-bind="text: company.address"></span> <sapn data-bind="text: company.city"></sapn> <span data-bind="text: company.country.name"></span>.</p>
        	</div>
        </div>
    </div>
</script>
<script id="normalInvoiceHeritageWalk" type="text/x-kendo-template">
	<div class="inv1">
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
                        	<p style="font-size: 12px; line-height: 20px;">គម្រោង Project : <span data-bind="text: jobDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="2" rowspan="4" style="text-align: left;padding-left: 10px;" data-bind="html: obj.note">
                        	</td>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<!-- REACHS -->
<script id="normalInvoiceREACHS" type="text/x-kendo-template">
	<style>
		.inv2 table td {
			padding: 5px;
			font-size: 14px;
		}
		.inv1 th {
			font-size: 14px;
		}
		.inv1 * {
			font-size: 14px;
			line-height: 20px;
		}
		.inv1 td {
			font-size: 12px;
		}
		.inv1 .cover-signature .singature p {
			font-size: 12px;
			font-weight: normal;
		}
		body {
		    color: #333;
		    font-family: "Open Sans", 'Battambang';
		    font-size: 13px;
		    background: #fff;
		}
		*{
		  margin: 0 auto;
		  padding: 0;
		}
		.clear{
			clear: both;
		}
		.invoice-pcg {
			width: 50%;
			margin: 50px auto 0;
		}
		.invoice-pcg .invoicepcg-header{
			width: 100%;
			float: left;
			position: relative;
			margin-bottom: 50px;
		}
		.invoice-pcg .invoicepcg-content{
			width: 100%;
			float: left;
			position: relative;
			margin-bottom: 70px;
		}
		.invoice-pcg .invoicepcg-content table{
			width: 100%;
			float: left;
			border: 1px solid #333;
			border-collapse: collapse;
			margin-bottom: 15px;
		}
		.invoice-pcg .invoicepcg-content table tr td{
			padding: 5px;
			border: 1px solid #333;
			font-size: 13px;
		}
		.invoice-pcg .invoicepcg-content table tr th{
			padding: 5px;
			font-size: 13px;
			font-weight: 700;
			border: 1px solid #333;
			background: #ccc;
		}
		.invoice-pcg .invoicepcg-footer p{
			margin-bottom: 8px;
		}
	</style>
	<div class="inv1">
    	<div class="invoice-pcg" style="width: 80%;padding-top: 70px;">
			<div class="invoicepcg-header">
				<h1 style="line-height: 70px;font-size: 85px; font-weight: 700; float: right; width: 100%; margin-bottom: 60px; text-align: right;color: #203864 !important;">INVOICE</h1>
				<p style="width: 100%;font-size: 16px; float: left; margin-bottom: 35px;" data-bind="text: obj.issued_date">
				</p>
				<p style="margin-bottom: 10px;"><b style="margin-right: 8px; float: left;">To:</b> <span data-bind="text: contactDS.data()[0].name"></span></p>
				<p><b>Address:</b> <span data-bind="text: contactDS.data()[0].address"></span></p>
				<p><b>Phone:</b> <span data-bind="text: contactDS.data()[0].phone"></span></p>
			</div>
			<div class="invoicepcg-content">
				<p style="margin-bottom: 20px;">INVOICE NO: <span data-bind="text: obj.number"></span></p>
				<table>
					<thead>
						<tr>
							<th style="width: 10%;background: #203864!important; color: #fff!important;">No.</th>
							<th style="background: #203864!important; color: #fff!important;">Description.</th>
							<th style="width: 25%;background: #203864!important; color: #fff!important;">Amount</th>
						</tr>
					</thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="pcg-normal-invoice-line"
						data-bind="source: lineDS">
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2" style="text-align: right;">Total</td>
							<td style="text-align: right; font-weight: 700;" data-bind="text: obj.amount"></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: left;">In words: <span data-bind="text: numberToString"></span></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="invoicepcg-footer">
				<span style="float: left; width: 40%; border-bottom: 1px solid #333;margin-bottom: 40px;"></span>
				<div class="clear"></div>
				<p style="float: left; padding-bottom: 25px;  border-bottom: 1px solid #333; width: 28%; margin-bottom: 25px;">Received by</p>
				<div class="clear"></div>
				<p><b style="float: left; margin-right: 5px;">Name:</b>....................................</p>
				<p><b style="float: left; margin-right: 5px;">Position:</b>................................</p>
				<p><b style="float: left; margin-right: 5px;">Date:</b>......................................</p>
			</div>
		</div>
    </div>
</script>
<script id="invoiceREACHS" type="text/x-kendo-template">
	<style>
		.inv2 table td {
			padding: 5px;
			font-size: 12px;
		}
		.inv1 th {
			font-size: 12px;
		}
		.inv1 * {
			font-size: 12px;
			line-height: 20px;
		}
		.inv1 td {
			font-size: 12px;
		}
		.inv1 .cover-signature .singature p {
			font-size: 12px;
			font-weight: normal;
		}
	</style>
	<div class="inv1">
    	<div class="head" style="width: 90%;margin-top: 100px;">
        	<div class="logo">
            	<!-- <img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" /> -->
            </div>
            <div class="cover-name-company" style="width: 70%!important;float: none;margin: 0 auto;">
            	<h2 ></h2>
            	<h3 style="float: none; text-align: center;font-size: 20px;" data-bind="text: company.name"></h3>
                <div class="vattin" style="float: none; width: 100%">
                	<p style="float: none; width: 100%;text-align: center;">
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN) </span>
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;" id="vat_number" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="font-size: 14px!important;float: left; text-align: center;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="font-size: 14px!important;float: left;width: 100%;text-align: center;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> | Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; color: #fff; margin-bottom: 15px;">
        		<div class="span7">
        			<h1 style="color: #fff !important;text-align: left;margin-top: 13px;font-family: 'Preahvihear', 'Roboto Slab' !important;">វិក្កយបត្រ INVOICE</h1>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;color: #000!important;">លេខវិក្កយបត្រ INVOICE NO </td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color: #000!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span7" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left;" data-bind="text: obj.contact.name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អាស័យ​ដ្ឋាន (Address)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">លេខទូរស័ព្ទ (Telephone) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].phone"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: #F1F1F1!important;">លក្ខ័ខណ្ឌ ទូទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: #F1F1F1!important;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="width: 8%;text-align: center;background: #F1F1F1!important; color: #333!important;">ល.រ<br />N<sup>o</sup></th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="width: 12%;text-align: center;background: #F1F1F1!important; color: #333!important;">បរិមាណ<br />QTY</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ឯកតា​<br />UOM</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="width: 20%;text-align: center;background: #F1F1F1!important; color: #333!important;">តម្លៃ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="heritage-walk-line"
						data-bind="source: lineDS">
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប (បូក​បញ្ចូល​ទាំង​អាករ)​ Total (VAT included)	</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit	</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="padding-bottom:15px;">
            	<div class="span12" style="border: 1px solid #ccc;">
					<div style="border-radius: 5px; width: 100%; padding: 8px; font-size: 13px;" data-bind="html: obj.note">
					</div>
				</div>
				<div class="span12">
			        <div class="foot" style="clear: none;margin-top: 80px; float: left; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="clear: none;margin-top: 80px; float: right; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<script id="invoiceVATREACHS" type="text/x-kendo-template">
	<style>
		.inv2 table td {
			padding: 5px;
			font-size: 12px;
		}
		.inv1 th {
			font-size: 12px;
		}
		.inv1 * {
			font-size: 12px;
			line-height: 20px;
		}
		.inv1 td {
			font-size: 12px;
		}
		.inv1 .cover-signature .singature p {
			font-size: 12px;
			font-weight: normal;
		}
	</style>
	<div class="inv1">
    	<div class="head" style="width: 90%;margin-top: 100px;">
        	<div class="logo">
            	<!-- <img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" /> -->
            </div>
            <div class="cover-name-company" style="width: 70%!important;float: none;margin: 0 auto;">
            	<h2 ></h2>
            	<h3 style="float: none; text-align: center;font-size: 20px;" data-bind="text: company.name"></h3>
                <div class="vattin" style="float: none; width: 100%">
                	<p style="float: none; width: 100%;text-align: center;">
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN) </span>
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;" id="vat_number" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="font-size: 14px!important;float: left; text-align: center;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="font-size: 14px!important;float: left;width: 100%;text-align: center;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> | Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; color: #fff; margin-bottom: 15px;">
        		<div class="span7">
        			<h1 style="color: #000 !important;text-align: left;margin-top: 13px;font-family: 'Preahvihear', 'Roboto Slab' !important;">វិក្កយបត្រអាករ TAX INVOICE</h1>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;color: #000!important;">លេខវិក្កយបត្រ INVOICE NO </td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color: #000!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span7" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left;" data-bind="text: obj.contact.name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អាស័យ​ដ្ឋាន (Address)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">លេខទូរស័ព្ទ (Telephone) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].phone"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">លេខ​អត្ត​សញ្ញាណ​កម្ម (VATTIN)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].vat_no"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: #F1F1F1!important;">លក្ខ័ខណ្ឌ ទូទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: #F1F1F1!important;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="width: 8%;text-align: center;background: #F1F1F1!important; color: #333!important;">ល.រ<br />N<sup>o</sup></th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="width: 12%;text-align: center;background: #F1F1F1!important; color: #333!important;">បរិមាណ<br />QTY</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ឯកតា​<br />UOM</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="width: 20%;text-align: center;background: #F1F1F1!important; color: #333!important;">តម្លៃ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="heritage-walk-line"
						data-bind="source: lineDS">
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="padding-bottom:15px;">
            	<div class="span12" style="border: 1px solid #ccc;">
					<div style="border-radius: 5px; width: 100%; padding: 8px; font-size: 13px;" data-bind="html: obj.note">
					</div>
				</div>
				<div class="span12">
			        <div class="foot" style="clear: none;margin-top: 80px; float: left; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="clear: none;margin-top: 80px; float: right; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<!-- PCG -->
<script id="normalInvoicePCG" type="text/x-kendo-template">
	<style>
		.inv2 table td {
			padding: 5px;
			font-size: 14px;
		}
		.inv1 th {
			font-size: 14px;
		}
		.inv1 * {
			font-size: 14px;
			line-height: 20px;
		}
		.inv1 td {
			font-size: 12px;
		}
		.inv1 .cover-signature .singature p {
			font-size: 12px;
			font-weight: normal;
		}
		body {
		    color: #333;
		    font-family: "Open Sans", 'Battambang';
		    font-size: 13px;
		    background: #fff;
		}
		*{
		  margin: 0 auto;
		  padding: 0;
		}
		.clear{
			clear: both;
		}
		.invoice-pcg {
			width: 50%;
			margin: 50px auto 0;
		}
		.invoice-pcg .invoicepcg-header{
			width: 100%;
			float: left;
			position: relative;
			margin-bottom: 50px;
		}
		.invoice-pcg .invoicepcg-content{
			width: 100%;
			float: left;
			position: relative;
			margin-bottom: 70px;
		}
		.invoice-pcg .invoicepcg-content table{
			width: 100%;
			float: left;
			border: 1px solid #333;
			border-collapse: collapse;
			margin-bottom: 15px;
		}
		.invoice-pcg .invoicepcg-content table tr td{
			padding: 5px;
			border: 1px solid #333;
			font-size: 13px;
		}
		.invoice-pcg .invoicepcg-content table tr th{
			padding: 5px;
			font-size: 13px;
			font-weight: 700;
			border: 1px solid #333;
			background: #ccc;
		}
		.invoice-pcg .invoicepcg-footer p{
			margin-bottom: 8px;
		}
	</style>
	<div class="inv1">
    	<div class="invoice-pcg" style="width: 80%;padding-top: 70px;">
			<div class="invoicepcg-header">
				<h1 style="line-height: 70px;font-size: 85px; font-weight: 700; float: right; width: 100%; margin-bottom: 60px; text-align: right;color: #203864 !important;">INVOICE</h1>
				<p style="width: 100%;font-size: 16px; float: left; margin-bottom: 35px;" data-bind="text: obj.issued_date">
				</p>
				<p style="margin-bottom: 10px;"><b style="margin-right: 8px; float: left;">To:</b> <span data-bind="text: contactDS.data()[0].name"></span></p>
				<p><b>Address:</b> <span data-bind="text: contactDS.data()[0].address"></span></p>
				<p><b>Phone:</b> <span data-bind="text: contactDS.data()[0].phone"></span></p>
			</div>
			<div class="invoicepcg-content">
				<p style="margin-bottom: 20px;">INVOICE NO: <span data-bind="text: obj.number"></span></p>
				<table>
					<thead>
						<tr>
							<th style="width: 10%;background: #203864!important; color: #fff!important;">No.</th>
							<th style="background: #203864!important; color: #fff!important;">Description.</th>
							<th style="width: 25%;background: #203864!important; color: #fff!important;">Amount</th>
						</tr>
					</thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="pcg-normal-invoice-line"
						data-bind="source: lineDS">
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2" style="text-align: right;">Total</td>
							<td style="text-align: right; font-weight: 700;" data-bind="text: obj.amount"></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: left;">In words: <span data-bind="text: numberToString"></span></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="invoicepcg-footer">
				<span style="float: left; width: 40%; border-bottom: 1px solid #333;margin-bottom: 40px;"></span>
				<div class="clear"></div>
				<p style="float: left; padding-bottom: 25px;  border-bottom: 1px solid #333; width: 28%; margin-bottom: 25px;">Received by</p>
				<div class="clear"></div>
				<p><b style="float: left; margin-right: 5px;">Name:</b>....................................</p>
				<p><b style="float: left; margin-right: 5px;">Position:</b>................................</p>
				<p><b style="float: left; margin-right: 5px;">Date:</b>......................................</p>
			</div>
		</div>
    </div>
</script>
<script id="invoicePCG" type="text/x-kendo-template">
	<style>
		.inv2 table td {
			padding: 5px;
			font-size: 12px;
		}
		.inv1 th {
			font-size: 12px;
		}
		.inv1 * {
			font-size: 12px;
			line-height: 20px;
		}
		.inv1 td {
			font-size: 12px;
		}
		.inv1 .cover-signature .singature p {
			font-size: 12px;
			font-weight: normal;
		}
	</style>
	<div class="inv1">
    	<div class="head" style="width: 90%;margin-top: 100px;">
        	<div class="logo">
            	<!-- <img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" /> -->
            </div>
            <div class="cover-name-company" style="width: 70%!important;float: none;margin: 0 auto;">
            	<h2 ></h2>
            	<h3 style="float: none; text-align: center;font-size: 20px;" data-bind="text: company.name"></h3>
                <div class="vattin" style="float: none; width: 100%">
                	<p style="float: none; width: 100%;text-align: center;">
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN) </span>
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;" id="vat_number" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="font-size: 14px!important;float: left; text-align: center;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="font-size: 14px!important;float: left;width: 100%;text-align: center;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> | Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; color: #fff; margin-bottom: 15px;">
        		<div class="span7">
        			<h1 style="color: #fff !important;text-align: left;margin-top: 13px;font-family: 'Preahvihear', 'Roboto Slab' !important;">វិក្កយបត្រ INVOICE</h1>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;color: #000!important;">លេខវិក្កយបត្រ INVOICE NO </td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color: #000!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span7" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left;" data-bind="text: obj.contact.name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អាស័យ​ដ្ឋាន (Address)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">លេខទូរស័ព្ទ (Telephone) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].phone"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: #F1F1F1!important;">លក្ខ័ខណ្ឌ ទូទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: #F1F1F1!important;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="width: 8%;text-align: center;background: #F1F1F1!important; color: #333!important;">ល.រ<br />N<sup>o</sup></th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="width: 12%;text-align: center;background: #F1F1F1!important; color: #333!important;">បរិមាណ<br />QTY</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ឯកតា​<br />UOM</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="width: 20%;text-align: center;background: #F1F1F1!important; color: #333!important;">តម្លៃ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="heritage-walk-line"
						data-bind="source: lineDS">
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប (បូក​បញ្ចូល​ទាំង​អាករ)​ Total (VAT included)	</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit	</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="padding-bottom:15px;">
            	<div class="span12">
					<div style="border-radius: 5px; width: 100%; padding: 8px; font-size: 11px;" data-bind="html: obj.note">
					</div>
				</div>
				<div class="span12">
			        <div class="foot" style="clear: none;margin-top: 80px; float: left; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="clear: none;margin-top: 80px; float: right; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<script id="invoiceVATPCG" type="text/x-kendo-template">
	<style>
		.inv2 table td {
			padding: 5px;
			font-size: 12px;
		}
		.inv1 th {
			font-size: 12px;
		}
		.inv1 * {
			font-size: 12px;
			line-height: 20px;
		}
		.inv1 td {
			font-size: 12px;
		}
		.inv1 .cover-signature .singature p {
			font-size: 12px;
			font-weight: normal;
		}
	</style>
	<div class="inv1">
    	<div class="head" style="width: 90%;margin-top: 100px;">
        	<div class="logo">
            	<!-- <img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" /> -->
            </div>
            <div class="cover-name-company" style="width: 70%!important;float: none;margin: 0 auto;">
            	<h2 ></h2>
            	<h3 style="float: none; text-align: center;font-size: 20px;" data-bind="text: company.name"></h3>
                <div class="vattin" style="float: none; width: 100%">
                	<p style="float: none; width: 100%;text-align: center;">
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN) </span>
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;" id="vat_number" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="font-size: 14px!important;float: left; text-align: center;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="font-size: 14px!important;float: left;width: 100%;text-align: center;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> | Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; color: #fff; margin-bottom: 15px;">
        		<div class="span7">
        			<h1 style="color: #000 !important;text-align: left;margin-top: 13px;font-family: 'Preahvihear', 'Roboto Slab' !important;">វិក្កយបត្រអាករ TAX INVOICE</h1>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;color: #000!important;">លេខវិក្កយបត្រ INVOICE NO </td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color: #000!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span7" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left;" data-bind="text: obj.contact.name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អាស័យ​ដ្ឋាន (Address)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">លេខទូរស័ព្ទ (Telephone) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].phone"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">លេខ​អត្ត​សញ្ញាណ​កម្ម (VATTIN)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].vat_no"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: #F1F1F1!important;">លក្ខ័ខណ្ឌ ទូទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: #F1F1F1!important;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="width: 8%;text-align: center;background: #F1F1F1!important; color: #333!important;">ល.រ<br />N<sup>o</sup></th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="width: 12%;text-align: center;background: #F1F1F1!important; color: #333!important;">បរិមាណ<br />QTY</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ឯកតា​<br />UOM</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="width: 20%;text-align: center;background: #F1F1F1!important; color: #333!important;">តម្លៃ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="heritage-walk-line"
						data-bind="source: lineDS">
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="padding-bottom:15px;">
            	<div class="span12">
					<div style="border-radius: 5px; width: 100%; padding: 8px; font-size: 11px;" data-bind="html: obj.note">
					</div>
				</div>
				<div class="span12">
			        <div class="foot" style="clear: none;margin-top: 80px; float: left; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="clear: none;margin-top: 80px; float: right; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<script id="advanceVoucherPCG" type="text/x-kendo-template">
	<style type="text/css">
		* {
			padding: 0;
			margin: 0;
		}
		* td {
			border: 1px solid black;
    		border-collapse: collapse;
		}
		table {
			border-spacing: 0;
		}
		.inv1 th {
			text-transform: uppercase;
			text-align: right;
			padding: 15px 5px;
			border: 1px solid #000;
			background: #eee;
		}
		.inv1 td {
			padding: 5px;
			text-align: left;
		}
		table.bottom td {
			border: none;
		}
	</style>
	<div class="inv1" style="margin-top: 40px;">
		<table style="width: 100%" >
			<tr>
				<td colspan="2" style="text-align: center;font-size: 16px;font-weight: bold;padding: 30px 0;" data-bind="html: company.name">
					
				</td>
				<td colspan="4" style="text-align: center;font-size: 16px;font-weight: bold;padding: 30px 0;">
					ADVANCE VOUCHER
				</td>
			</tr>
			<tr>
				<td style="width: 20%;text-align: left;">
					Ref.:
				</td>
				<td data-bind="text: obj.reference_no">
				</td>
				<td rowspan="3" style="width: 15%;text-align: center;">
					DEVISION
				</td>
				<td rowspan="3" style="width: 15%;text-align: center;">
					Banhji
				</td>
				<td style="text-align:left;width: 15%">
					Ex. Leaving date: 
				</td>
				<td>N/A</td>
			</tr>
			<tr>
				<td style="text-align:left;">Requested by:</td>
				<td>N/A</td>
				<td style="text-align:left;">Ex. coming date:</td>
				<td>N/A</td>
			</tr>
			<tr>
				<td style="text-align:left;">Position:</td>
				<td>N/A</td>
				<td style="text-align:left;">Amount Req. (USD):</td>
				<td>N/A</td>
			</tr>
			<tr>
				<td colspan="6" style="height: 50px; text-align: left;" data-bind="html: obj.note" >
				</td>
			</tr>
		</table>
		<table style="margin-top: 10px; width: 100%;">
			<thead>
				<tr>
					<th colspan="2" style="text-align: center;width: 40%">
						Description
					</th>
					<th style="text-align: center;width: 13%">
						Reference
					</th>
					<th style="width: 12%">
						Quantity
					</th>
					<th style="width: 15%">
						Unit cost
					</th>
					<th style="width: 20%">
						Amount(USD)
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="2" style="height: 20px;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2" style="height: 20px;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2" style="height: 20px;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<table style="margin-top: 10px; width: 100%;" class="bottom">
			<tbody >
				<tr>
					<td style="height: 20px; width: 20%;">Requested by:</td>
					<td style="width: 20%;border-top: 1px solid #000;text-align: center;"></td>
					<td style="width: 13%;"></td>
					<td style="width: 12%;">Reviewd by:</td>
					<td style="width: 35%;border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Name:</td>
					<td style="border-top: 1px solid #000;text-align: center;">Hul Ratana</td>
					<td style=""></td>
					<td style="">Name:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Position:</td>
					<td style="border-top: 1px solid #000;text-align: center;"></td>
					<td style=""></td>
					<td style="">Position:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Date:</td>
					<td style="border-top: 1px solid #000;text-align: center;">31/10/2017</td>
					<td style=""></td>
					<td style="">Date:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;"></td>
					<td style="border-top: 1px solid #000;text-align: center;"></td>
					<td style=""></td>
					<td style=""></td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Approved by:</td>
					<td style="border-top: 1px solid #000;text-align: center;"></td>
					<td style=""></td>
					<td style="">Approved by:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Name:</td>
					<td style="border-top: 1px solid #000;text-align: center;">Roeurn Bunheng</td>
					<td style=""></td>
					<td style="">Name:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Position:</td>
					<td style="border-top: 1px solid #000;text-align: center;">Finance Director</td>
					<td style=""></td>
					<td style="">Position:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Date:</td>
					<td style="border-top: 1px solid #000;text-align: center;">31/10/2017</td>
					<td style=""></td>
					<td style="">Date:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px; width: 10%;"></td>
					<td style="width: 20%;border-top: 1px solid #000;text-align: center;"></td>
					<td style="width: 15%;"></td>
					<td style="width: 15%;"></td>
					<td style="width: 40%;border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Paid by:</td>
					<td style="border-top: 1px solid #000;text-align: center;"></td>
					<td style=""></td>
					<td style="">Received by:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Name:</td>
					<td style="border-top: 1px solid #000;text-align: center;">LCT</td>
					<td style=""></td>
					<td style="">Name:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2">Hul Ratana</td>
				</tr>
				<tr>
					<td style="height: 20px;">Position:</td>
					<td style="border-top: 1px solid #000;text-align: center;">Accountant</td>
					<td style=""></td>
					<td style="">Position:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Date:</td>
					<td style="border-top: 1px solid #000;text-align: center;">31/10/2017</td>
					<td style=""></td>
					<td style="">Date:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
			</tbody>
		</table>
	</div>
</script>
<!-- PCG PADEE -->
<script id="invoicePCGPADEE" type="text/x-kendo-template">
	<style>
		.inv2 table td {
			padding: 5px;
			font-size: 12px;
		}
		.inv1 th {
			font-size: 12px;
		}
		.inv1 * {
			font-size: 12px;
			line-height: 20px;
		}
		.inv1 td {
			font-size: 12px;
		}
		.inv1 .cover-signature .singature p {
			font-size: 12px;
			font-weight: normal;
		}
		text {
			display: none!important;
		}
	</style>
	<div class="inv1">
    	<div class="head" style="width: 90%;">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
            	<h2></h2>
            	<h3 style="float: left;font-size: 20px; font-family: 'Preahvihear', 'Roboto Slab' !important;" data-bind="html: company.name"></h3>
                <div class="vattin" style="float: left; width: 100%">
                	<p style="float: left; width: 100%">
                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; background: #001F5F!important;-webkit-print-color-adjust:exact; color: #fff; margin-bottom: 15px;">
        		<div class="span5">
        			<h1 style="color: #fff !important;margin-top: 15px;padding-left: 30px; text-align: left;text-transform: uppercase;font-family: 'Preahvihear', 'Roboto Slab' !important;">វិក្កយបត្រ Invoice</h1>
        		</div>
        		<div class="span6" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;text-transform: uppercase;color:#fff!important;">លេខវិក្កយបត្រ INVOICE NO</td>
        					<td style="border:0;text-align: left;font-weight: bold;color:#fff!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color:#fff!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color:#fff!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span7" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left;" data-bind="text: obj.contact.name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អាស័យ​ដ្ឋាន (Address)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">លេខទូរស័ព្ទ (Telephone) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].phone"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: #F1F1F1!important;">លក្ខ័ខណ្ឌ ទូទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: #F1F1F1!important;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="width: 8%;text-align: center;background: #F1F1F1!important; color: #333!important;">ល.រ<br />N<sup>o</sup></th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="width: 12%;text-align: center;background: #F1F1F1!important; color: #333!important;">បរិមាណ<br />QTY</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ឯកតា​<br />UOM</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="width: 20%;text-align: center;background: #F1F1F1!important; color: #333!important;">តម្លៃ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="heritage-walk-line"
						data-bind="source: lineDS">
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
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ (បូកបញ្ជូលទាំងអាករ) GRAND TOTAL (VAT INCLUSIVE) </td>
                            <td style="font-size: 16px;background: #333; color: #fff;" class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="border-bottom: 1px solid #BEBEBE; padding-bottom:15px;">
				<div class="span8">
					<div style="border-radius: 5px; width: 100%; padding: 8px;border: 1px solid #BEBEBE; font-size: 11px;" data-bind="html: obj.note">
					</div>
				</div>
				<div class="span4">
					<div class="foot" style="margin-top: 80px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="margin-top: 80px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
        <div class="foot" style="margin-top:10px;">
        	<div class="span3">
        		<div style="float: right; width: 88%;">
	           		<div
	           			data-role="qrcode"
              			data-error-correction="M"
              			data-encoding="UTF_8"
              			data-bind="value: obj.qrcodevalue"
              			style="height: 180px;">
              		</div>
	           	</div>
        	</div>
        	<div class="span3">
        		<p style="font-size: 14px;margin-bottom: 8px;">អ្នកអាចទូរទាត់វិក្កយបត្រនេះ ដោយប្រើប្រាស់លេខកូដខាងក្រោម៖</p>
        		<div  style="float: left; width: 100%; text-align:center; border: 1px solid #E9E9E9; border-radius:5px;padding: 8px;font-size: 25px;font-weight: bold;"><span data-bind="text: obj.number"></span>-<span data-bind="text: company.id"></span>
        		</div>
        		<div style="float: left; width: 100%; height: 30px; margin-top: 8px; margin-bottom: 20px;margin-left: -20px;">
        			<span
        				data-role="barcode"
                  		data-type="code128"
                  		data-bind="value: obj.number"
                  		style="width: 100%;height: 50px;">
                  	</span>
        		</div>
        	</div>
        	<div class="span5" style="float: right;padding-left:15px; margin-bottom: 10px;">
        		<b style="font-size:14px; float:left; margin-bottom: 8px;">តាមរយៈភ្នាក់ងាររបស់ស្ថាប័នហិរញ្ញវត្ថុខាងក្រោមនេះ</b>
        		<div  style="float: left; width: 90%; text-align:center; border: 1px solid #E9E9E9; border-radius:5px;padding: 8px;min-height: 50px; margin-bottom: 20px;">
        			<img src="<?php echo base_url();?>assets/img/amk-logo.png" style="width: 42%; height: auto;" />
        		</div>
        	</div>
        </div>
    </div>
</script>
<!--Caritas Company-->
<script id="pcg-normal-invoice-line" type="text/x-kendo-template">
	#if(price > 0){#
		<tr>
			<td class="center" style="color: \\#000">&nbsp;#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
			<td class="lside" style="color: \\#000">#= description ? description : "" #</td>
			<td class="rside" style="color: \\#000;text-align: right;font-weight: bold;">
				#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
			</td>
		</tr>
	#}#
</script>
<script id="max-concrete-line" type="text/x-kendo-template">
	#if(price > 0){#
		<tr>
			<td class="center" style="color: \\#000">&nbsp;#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
			<td class="lside" style="color: \\#000">#= description ? description : "" #</td>
			<td class="lside" style="color: \\#000">#= reference_no #</td>
			<td>#: quantity#</td>
			<td style="color: \\#000">
				#if(variant.length > 0){#
					#$.each(variant, function(j,k){#
						#if(k.variant_attribute_id == '1'){#
							#:k.name#
						#}#
					#});#
				#}#
			</td>
			<td style="color: \\#000">
				#if(variant.length > 0){#
					#$.each(variant, function(j,k){#
						#if(k.variant_attribute_id == '2'){#
							#:k.name#
						#}#
					#});#
				#}#
			</td>
			<td class="rside" width="70" style="color: \\#000;text-align: center;">
				#: measurement.measurement#
			</td>
			<td class="rside" style="background-color: \\#eee;color: \\#000;text-align: right;">
				#if(price > 0){##= kendo.toString(price, locale=="km-KH"?"c0":"c", locale)##}#
			</td>
			<td class="rside" style="background-color: \\#eee;color: \\#000;text-align: right;">
				#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
			</td>
		</tr>
	#}#
</script>
<script id="heritage-walk-line" type="text/x-kendo-template">
	#if(price > 0){#
		<tr>
			<td class="center" style="color: \\#000">&nbsp;#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
			<td class="lside" style="color: \\#000">#= description ? description : "" #</td>
			<td>#: quantity#</td>
			<td class="rside" width="70" style="color: \\#000;text-align: center;">
				#: measurement.measurement#
			</td>
			<td class="rside" style="background-color: \\#eee;color: \\#000;text-align: right;">
				#if(price > 0){##= kendo.toString(price, locale=="km-KH"?"c0":"c", locale)##}#
			</td>
			<td class="rside" style="background-color: \\#eee;color: \\#000;text-align: right;">
				#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
			</td>
		</tr>
	#}#
</script>
<script id="formCaritasExpense" type="text/x-kendo-template">
	<div class="voucher1">
    	<div class="head">
    		<div class="logo">
            	<img style="max-width: 100px;width: 100px;" data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="official">
            	Official
            </div>
            <div class="head-title" data-bind="text: obj.title">
            </div>
            <div class="row">
            	<div class="span12">
	    			<div class="span7" style="padding-left: 0; padding-right: 15px;">
	    				<table class="tableright">
	    					<tr>
	    						<td style="width: 156px; text-align: right;">PAID TO/ RECEIVED FROM</td>
	    						<td data-bind="text: contactDS.data()[0].name"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">PAYMENT METHOD</td>
	    						<td data-bind="text: accountDS.name"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">Location</td>
	    						<td data-bind="text: company.name"></td>
	    					</tr>
	    				</table>
	    			</div>
	    			<div class="span5" style="padding-right: 0; ">
	    				<table class="tableright">
	    					<tr>
	    						<td style="width: 130px; text-align: right;">Transaction Date:</td>
	    						<td style="text-align: center; color: #333; font-weight: 600;" data-bind="text: obj.issued_date"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">Transaction No:</td>
	    						<td style="text-align: center; color: #333; font-weight: 600; background: #d9d9d9;" data-bind="text: obj.number"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">Project Name:</td>
	    						<td style="text-align: center;" data-bind="text: proaccountLineDS.name"></td>
	    					</tr>
	    				</table>
	    			</div>
	    		</div>
    		</div>
    	</div>
    	<div class="content">
    		<div class="row">
    			<div class="span12" style="padding-bottom: 15px;">
    				<table class="tablecontent">
    					<thead>
	    					<tr>
	    						<th style="width: 240px; border: 1px solid #333; text-align: center; padding: 5px;" rowspan="2">DESCRIPTION</th>
	    						<th style="width: 50px; border: 1px solid #333; text-align: center; padding: 5px;" rowspan="2">REF</th>
	    						<th style="width: 109px; border: 1px solid #333; text-align: center; padding: 5px;" rowspan="2">DONOR</th>
	    						<th style="border: 1px solid #333; text-align: center; padding: 5px; background: #fbda6c; " colspan="3">ACCOUNTING ENTRY</th>
	    					</tr>
	    					<tr>
	    						<th style="border: 1px solid #333; padding: 5px; text-align: center; background: #fbda6c;">ACCOUNT</th>
	    						<th style="border: 1px solid #333; padding: 5px; text-align: center; background: #fbda6c;">DR</th>
	    						<th style="border: 1px solid #333; padding: 5px; text-align: center; background: #fbda6c;">CR</th>
	    					</tr>
	    				</thead>
	    				<tbody style="margin-top: 2px" id="formListView"
	        				data-role="listview"
							data-auto-bind="false"
							data-template="formCaritasExpense-journallineDS-template"
							data-bind="source: journalLineDS">
						</tbody>
	    				<tfoot>
	    					<tr>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: left;" colspan="2">PREPARED BY :</td>
	    						<td style="border: 1px solid #333; padding: 5px; font-weight: 800;">Total</td>
	    						<td style="border: 1px solid #333; padding: 5px; font-weight: 800;"></td>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: right; font-weight: 800;" data-bind="text: totalDR"></td>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: right; font-weight: 800;" data-bind="text: totalCR"></td>
	    					</tr>
	    					<tr>
	    						<td colspan="2" rowspan="2" style="border: 1px solid #333; padding: 5px;">VERIFIED BY :</td>
	    						<td rowspan="2" style="border: 1px solid #333; padding: 5px; font-weight: 800; background: #808080; color: #FFF;">Only for Advance Clearance</td>
	    						<td colspan="2" style="border: 1px solid #333; padding: 5px; ">AV No:    <span data-bind="text: obj.reference_no"></span></td>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: right;" data-bind="text: obj.deposit"></td>
	    					</tr>
	    					<tr>
	    						<td colspan="2" style="border: 1px solid #333; padding: 5px; text-align: left; font-weight: 800;">NET AMOUNT DUE FROM STAFF</td>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: right; font-weight: 800;" data-bind="text: netAmountDUE"></td>
	    					</tr>
	    					<tr>
	    						<td colspan="2" style="border: 1px solid #333; padding: 5px;">APPROVED BY :</td>
	    						<td colspan="4" style="border: 1px solid #333; padding: 5px; ">In Words:</td>

	    					</tr>
	    					<tr>
	    						<td colspan="2" style="border: 1px solid #333; padding: 5px;">RECEIVED BY :</td>
	    						<td colspan="4" style="border: 1px solid #333; padding: 5px; "></td>
	    					</tr>
	    				</tfoot>
    				</table>
    			</div>
    		</div>
    	</div>
    	<div class="footer">
    	</div>
    </div>
</script>
<script id="formCaritasJournal" type="text/x-kendo-template">
	<div class="voucher1">
    	<div class="head">
    		<div class="logo">
            	<img style="max-width: 100px;width: 100px;" data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="official">
            	Official
            </div>
            <div class="head-title" data-bind="text: obj.title">
            </div>
            <div class="row">
            	<div class="span12">
	    			<div class="span7" style="padding-left: 0; padding-right: 15px;">
	    				<table class="tableright">
	    					<tr>
	    						<td style="width: 156px; text-align: right;">PAID TO/ RECEIVED FROM</td>
	    						<td data-bind="text: contactDS.data()[0].name"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">JOURNAL TYPE</td>
	    						<td data-bind="text: accountDS.name"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">Location</td>
	    						<td data-bind="text: company.name"></td>
	    					</tr>
	    				</table>
	    			</div>
	    			<div class="span5" style="padding-right: 0; ">
	    				<table class="tableright">
	    					<tr>
	    						<td style="width: 130px; text-align: right;">Transaction Date:</td>
	    						<td style="text-align: center; color: #333; font-weight: 600;" data-bind="text: obj.issued_date"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">Transaction No:</td>
	    						<td style="text-align: center; color: #333; font-weight: 600; background: #d9d9d9;" data-bind="text: obj.number"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">Project Name:</td>
	    						<td style="text-align: center;" data-bind="text: proaccountLineDS.name"></td>
	    					</tr>
	    				</table>
	    			</div>
	    		</div>
    		</div>
    	</div>
    	<div class="content">
    		<div class="row">
    			<div class="span12" style="padding-bottom: 15px;">
    				<table class="tablecontent">
    					<thead>
	    					<tr>
	    						<th style="width: 240px; border: 1px solid #333; text-align: center; padding: 5px;" rowspan="2">DESCRIPTION</th>
	    						<th style="width: 50px; border: 1px solid #333; text-align: center; padding: 5px;" rowspan="2">REF</th>
	    						<th style="width: 109px; border: 1px solid #333; text-align: center; padding: 5px;" rowspan="2">DONOR</th>
	    						<th style="border: 1px solid #333; text-align: center; padding: 5px; background: #fbda6c; " colspan="3">ACCOUNTING ENTRY</th>
	    					</tr>
	    					<tr>
	    						<th style="border: 1px solid #333; padding: 5px; text-align: center; background: #fbda6c;">ACCOUNT</th>
	    						<th style="border: 1px solid #333; padding: 5px; text-align: center; background: #fbda6c;">DR</th>
	    						<th style="border: 1px solid #333; padding: 5px; text-align: center; background: #fbda6c;">CR</th>
	    					</tr>
	    				</thead>
	    				<tbody style="margin-top: 2px" id="formListView"
	        				data-role="listview"
							data-auto-bind="false"
							data-template="formCaritasExpense-journallineDS-template"
							data-bind="source: journalLineDS">
						</tbody>
	    				<tfoot>
	    					<tr>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: left;" colspan="2">PREPARED BY :</td>
	    						<td style="border: 1px solid #333; padding: 5px; font-weight: 800;">Total</td>
	    						<td style="border: 1px solid #333; padding: 5px; font-weight: 800;"></td>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: right; font-weight: 800;" data-bind="text: totalDR"></td>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: right; font-weight: 800;" data-bind="text: totalCR"></td>
	    					</tr>
	    					<tr>
	    						<td colspan="6" style="border: 1px solid #333; padding: 5px;">VERIFIED BY :</td>

	    					</tr>
	    					<tr>
	    						<td colspan="2" style="border: 1px solid #333; padding: 5px;">APPROVED BY :</td>
	    						<td colspan="4" style="border: 1px solid #333; padding: 5px; ">In Words:</td>
	    					</tr>
	    					<tr>
	    						<td colspan="2" style="border: 1px solid #333; padding: 5px;">RECEIVED BY :</td>
	    						<td colspan="4" style="border: 1px solid #333; padding: 5px; "></td>
	    					</tr>
	    				</tfoot>
    				</table>
    			</div>
    		</div>
    	</div>
    	<div class="footer">
    	</div>
    </div>
</script>
<script id="formCaritasExpense-journallineDS-template" type="text/x-kendo-template">
	<tr>
		<td style="border: 1px solid \\#333; padding: 5px;" align="left">#: description#&nbsp;</td>
		<td style="border: 1px solid \\#333; padding: 5px;" align="center">#: banhji.invoiceForm.journalLineDS.data()[0].reference_no#</td>
		<td style="border: 1px solid \\#333; padding: 5px;" align="center">#= donor#</td>
		<td style="border: 1px solid \\#333; padding: 5px;background: \\#fbda6c;" align="center">#: account[0].number#</td>
		<td style="border: 1px solid \\#333; padding: 5px;background: \\#fbda6c;" align="right">#: dr==0?'':kendo.toString(dr, locale=='km-KH'?'c':'c2', locale)#</td>
		<td style="border: 1px solid \\#333; padding: 5px;background: \\#fbda6c;" align="right">#: cr==0?'':kendo.toString(cr, locale=='km-KH'?'c':'c2', locale)#</td>
	</tr>
</script>
<!-- KSLM -->
<script id="normalInvoiceKSLM" type="text/x-kendo-template">
	<div class="inv1">
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">កូដ<br />Code</th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
						data-auto-bind="false"
		                data-template="invoiceForm-lineDS-template-kslm"
		                data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="2" rowspan="4" style="text-align: left;padding-left: 10px;" data-bind="html: obj.note">
                        	</td>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm-lineDS-template-kslm" type="text/x-kendo-template">
	<tr>
		<td><i>#= item.number ? item.number : "" #</i>&nbsp;</td>
		<td class="lside">#= description ? description : "" #</td>
		<td>#= quantity#</td>
		<td class="rside" width="70">#if(price > 0){# #= kendo.toString(price, "c", locale) # #}#</td>
		<td class="rside">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="vatInvoiceKSLM" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 50%;float: left;">
            	<h2 ></h2>
                <h3 style="text-align:left;" data-bind="html: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                	<p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span></p>
                </div>
            </div>
           	<!-- <div style="float: right; width: 20%;">
           		<div id="invQR"></div>
           	</div> -->
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រអាករ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
                        	គំរោង Job : <span data-bind="text: contactDS.data()[0].job"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: contactDS.data()[0].vat_no"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number" style="width: 42%;">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<span style="font-weight:bold" data-bind="text: obj.number"></span>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>

        	<div class="clear inv2">
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">កូដ<br />Code</th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
						 data-auto-bind="false"
		                 data-template="invoiceForm-lineDS-template-kslm"
		                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="commercialInvoiceKSLM" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 50%;float: left;">
                <h3 style="text-align:left;" data-bind="html: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span style="font-size: 12px;" data-bind="text: company.telephone"></span></p>
                    <p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span  data-bind="text: company.address"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
                <div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
                        	គំរោង Job : <span data-bind="text: contactDS.data()[0].job"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: contactDS.data()[0].vat_no"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number" style="width: 42%;">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<span style="font-weight:bold" data-bind="text: obj.number"></span>-<span style="font-weight:bold" data-bind="text: company.id"></span>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">កូដ<br />Code</th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
						 data-auto-bind="false"
		                 data-template="invoiceForm-lineDS-template-kslm"
		                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប (បូក​បញ្ចូល​ទាំង​អាករ)​ Total (VAT included)</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="posInvoiceKSLM" type="text/x-kendo-template">
	<div style="margin: 0 auto;">		
		<div class="inv1" style="width: 500px;margin: 0 auto;">
	        <div class="content">
	        	<div style="overflow: hidden;padding:10px 0;">
	        		<h1>វិក្កយបត្រ</h1>
	            	<h2>Invoice</h2>
	        	</div>
	            <div class="clear mid-header" style="padding-bottom: 10px;">
	            	<div class="cover-customer" style="width: 100%!important;">
	                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
	                    <div class="clear">
	                        <div class="left dotted-ruler" style="width: 62%;">
	                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
			        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
			        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
			        			</p>
	                        </div>
	                    </div>
	                </div>
	                <div class="cover-inv-number" style="width: 100%!important;margin-top: 10px;">
	                	<div class="clear">
	                    	<div class="left">
	                    		<p>លេខ No. :</p>
	                        </div>
	                        <div class="left dotted-ruler" style="width: 42%;">
	                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
	                        </div>
	                    </div>
	                    <div class="clear">
	                    	<div class="left">
	                    		<p>កាល​បរិច្ឆេទ Date:</p>
	                        </div>
	                        <div class="left dotted-ruler" style="width: 57%;">
	                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        	<div class="clear">
	            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
	                	<thead>
	                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
	                            <th style="text-align: center;width: 8%;">ល.រ<br />N<sup>0</sup></th>
	                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
	                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
	                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
	                            <th style="text-align: center;width: 20%;">ថ្លៃ​ទំនិញ<br />Amount</th>
	                        </tr>
	                    </thead>
	                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
							data-auto-bind="false"
			                data-template="invoiceForm-lineDS-template-pos"
			                data-bind="source: lineDS">
	                    </tbody>
	                    <tfoot>
	                        <tr>
	                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
	                            <td class="rside" data-bind="text: obj.discount"></td>
	                        </tr>
	                        <tr>
	                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
	                            <td class="rside" data-bind="text: obj.amount"></td>
	                        </tr>
	                        <tr>
	                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
	                            <td class="rside" data-bind="text: obj.amount_due"></td>
	                        </tr>
	                    </tfoot>
	                </table>
	            </div>
	        </div>
	        <div class="foot">
	            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
	        </div>
	    </div>
	</div>
</script>
<script id="posCashSaleKSLM" type="text/x-kendo-template">
	<div style="margin: 0 auto;">		
		<div class="inv1" style="width: 500px;margin: 0 auto;">
	        <div class="content">
	        	<div style="overflow: hidden;padding:10px 0;">
	        		<h1>វិក្កយបត្រ</h1>
	            	<h2>Invoice</h2>
	        	</div>
	            <div class="clear mid-header" style="padding-bottom: 10px;">
	            	<div class="cover-customer" style="width: 100%!important;">
	                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
	                    <div class="clear">
	                        <div class="left dotted-ruler" style="width: 62%;">
	                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
			        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
			        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
			        			</p>
	                        </div>
	                    </div>
	                </div>
	                <div class="cover-inv-number" style="width: 100%!important;margin-top: 10px;">
	                	<div class="clear">
	                    	<div class="left">
	                    		<p>លេខ No. :</p>
	                        </div>
	                        <div class="left dotted-ruler" style="width: 42%;">
	                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
	                        </div>
	                    </div>
	                    <div class="clear">
	                    	<div class="left">
	                    		<p>កាល​បរិច្ឆេទ Date:</p>
	                        </div>
	                        <div class="left dotted-ruler" style="width: 57%;">
	                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        	<div class="clear">
	            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
	                	<thead>
	                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
	                            <th style="text-align: center;width: 8%;">ល.រ<br />N<sup>0</sup></th>
	                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
	                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
	                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
	                            <th style="text-align: center;width: 20%;">ថ្លៃ​ទំនិញ<br />Amount</th>
	                        </tr>
	                    </thead>
	                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
							data-auto-bind="false"
			                data-template="invoiceForm-lineDS-template-pos"
			                data-bind="source: lineDS">
	                    </tbody>
	                    <tfoot>
	                        <tr>
	                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
	                            <td class="rside" data-bind="text: obj.discount"></td>
	                        </tr>
	                        <tr>
	                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
	                            <td class="rside" data-bind="text: obj.amount"></td>
	                        </tr>
	                        <tr>
	                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
	                            <td class="rside" data-bind="text: obj.amount_due"></td>
	                        </tr>
	                    </tfoot>
	                </table>
	            </div>
	        </div>
	        <div class="foot">
	            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
	        </div>
	    </div>
	</div>
</script>
<script id="invoiceForm-lineDS-template-pos" type="text/x-kendo-template">
	#if(amount){#
		<tr>
			<td><i>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</i>&nbsp;</td>
			<td class="lside">#= description ? description : "" #</td>
			<td>#= quantity#</td>
			<td class="rside" width="70">#if(price > 0){# #= kendo.toString(price, "c", locale) # #}#</td>
			<td class="rside">#= kendo.toString(amount, "c", locale) #</td>
		</tr>
	#}#
</script>
<!--Hurban Hub-->
<script id="advanceVoucherHurbanHub" type="text/x-kendo-template">
	<style >
		.advance-voucher{
			width: 100%;
			margin: 50px auto 0;
		}
		.advance-voucher .advoucher-header .title{
			float: right;
			padding: 10px 10px 0;
			margin-bottom: 15px;
			line-height: 45px;
			width: 100%;
		}
		.advance-voucher .advoucher-header .title .kh{
			float: none;
			width: 100%;
			text-align: center;
			font-size: 30px;
			font-weight: 700;
			line-height: 55px!important;
			margin-right: 8px;
		}
		.advance-voucher .advoucher-header .title .en{
			float: none;
			font-size: 20px;
			font-weight: 700;
			text-align: center;
			text-transform: uppercase;
			line-height: 46px;
		}
		.advance-voucher .advoucher-header table{
			width: 100%;
			float: left;
			border: 1px solid #333;
			border-collapse: collapse;
		}
		.advance-voucher .advoucher-header table tr td{
			padding: 5px;
			border: 1px solid #333;
			font-size: 13px;
		}
		.advance-voucher .advoucher-content table{
			width: 100%;
			float: left;
			border: 1px solid #333;
			border-collapse: collapse;
		}
		.advance-voucher .advoucher-content table tr th{
			padding: 5px;
			font-size: 13px;
			font-weight: 700;
			background: #1E4E78;
			text-transform: uppercase;
			border: 1px solid #333;
			color: #fff;
		}
		.advance-voucher .advoucher-content table tr td{
			padding: 5px;
			border: 1px solid #333;
			font-size: 13px;
		}
		.advance-voucher .advoucher-footer table{
			width: 100%;
			float: left;
			border: 1px solid #333;
			border-collapse: collapse;
		}
		.advance-voucher .advoucher-footer table tr th{
			padding: 5px;
			font-size: 13px;
			font-weight: 700;
			background: #ccc;
			text-transform: uppercase;
			border: 1px solid #333;
			color: #333;
		}
		.advance-voucher .advoucher-footer table tr td{
			padding: 5px;
			border: 1px solid #333;
			font-size: 13px;
		}
		.advance-voucher .advoucher-footer table tr td.rotate {
		    -moz-transform: rotate(-90.0deg);
		    -o-transform: rotate(-90.0deg);
		    -webkit-transform: rotate(-90.0deg);
		    filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);
		    -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)";
		}
		.inv1 td {
			text-align: left;
		}
	</style>
	<div class="inv1">
		<div class="advance-voucher" style="width: 90%;">
			<div class="advoucher-header" style="overflow: hidden;position: relative;clear: both;">
				<div class="head" style="width: 100%;">
		        	<div class="logo" style="width: 15%;">
		            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
		            <div class="cover-name-company" style="width: 70%!important;float: left;margin-left: 15px;">
		            	<h2 ></h2>
		            	<h3 style="float: none; text-align: center;font-size: 25px;line-height: 37px!important;" data-bind="text: company.name"></h3>
		                <div class="clear" style="float: none;">
		                	<p style="font-size: 14px!important;float: none; text-align: center;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
		                    <p style="font-size: 14px!important;float: none;width: 100%;text-align: center;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> | Email: <span data-bind="text: company.email"></span></p>
		                </div>
		            </div>
		        </div>
				<div class="title">
					<h2 class="kh">សក្ខីប័ត្របុរេប្រទាន </h2>
					<h2 class="en">advance voucher</h2>
				</div>
				<table>
					<tr>
						<td style="width: 22%;"><b>អ្នកស្នើសុំ Name</b></td>
						<td style="width: 20%;" data-bind="text: contactDS.data()[0].name"></td>
						<td><b>លេខសក្ខីប័ត្រ AV No.</b></td>
						<td style="width: 20%;" data-bind="text: obj.number"></td>
					</tr>
					<tr>
						<td><b>តំណែង Position</b></td>
						<td></td>
						<td><b>កាលបរិចេ្ឆទ Date</b></td>
						<td data-bind="text: obj.issued_date"></td>
					</tr>
					<tr>
						<td><b>ផ្នែក Department</b></td>
						<td></td>
						<td><b>លេខប័ណ្ណលទ្ធកម្ម PR No.</b></td>
						<td></td>
					</tr>
					<tr>
						<td><b>ទូទាត់ដោយ Mode of Payment</b></td>
						<td colspan="3">
							<b>ទូទាត់ដោយ Mode of Payment</b> : <span data-bind="text: paymentMethodDS.data()[0].name"></span><br>
							<b>ប្រភេទរូបិយប័ណ្ណ Currency Required : </b> <span data-bind="text: currencyDS.data()[0].code"></span>
						</td>
					</tr>
					<tr>
						<td><b>គោលបំណងនៃបុរេប្រទាន <br> Purpose of Advance</b></td>
						<td colspan="3" data-bind="text: accountLineDS.data()[0].description"></td>
					</tr>
				</table>
			</div>
			<div class="advoucher-content" style="overflow: hidden;position: relative;clear: both;">
				<table>
					<tr>
						<th style="background: #1E4E78!important;color: #fff!important;width: 22%;">Account Code</th>
						<th style="background: #1E4E78!important;color: #fff!important;">Account Description</th>
						<th style="background: #1E4E78!important;color: #fff!important;">Debit</th>
						<th style="background: #1E4E78!important;color: #fff!important;width: 19%;">Credit</th>
					</tr>
					<tr>
						<td data-bind="text: journalLineDS.data()[0].account.number"></td>
						<td data-bind="text: journalLineDS.data()[0].account.name"></td>
						<td style="text-align: right;" data-bind="text: journalLineDS.data()[0].dr"></td>
						<td style="text-align: right;"></td>
					</tr>
					<tr>
						<td data-bind="text: journalLineDS.data()[1].account.number"></td>
						<td data-bind="text: journalLineDS.data()[1].account.name"></td>
						<td style="text-align: right;"></td>
						<td style="text-align: right;" data-bind="text: journalLineDS.data()[1].cr"></td>
					</tr>
					<tr>
						<td colspan="3" style="text-align: right; font-size: 18px; font-weight: 700;"> <span style="font-size: 17px;">សរុប</span> Total</td>
						<td style="text-align: right; font-weight: bold;" data-bind="text: obj.amount"></td>
					</tr>
					<tr>
						<td colspan="2" style="background: #1E4E78!important; color: #fff!important;">ចំនួនជាអក្សរ Amount in Words</td>
						<td colspan="2" data-bind="text: numberToString"></td>
					</tr>
				</table>
			</div>
			<div class="advoucher-footer" style="overflow: hidden;position: relative;clear: both;">
				<div style="margin-top: 160px;overflow:hidden;">
					<div class="span3" style="text-align: center;">
						<div style="padding: 10px 5px;">រៀបចំដោយ <br> PREPARED BY</div>
						<div style="padding-top: 60px;border-bottom: 1px solid #000;width: 90%;margin: 0 auto;"></div>
					</div>
					<div class="span3" style="text-align: center;">
						<div style="padding: 10px 5px;">ត្រួតពិនិត្យដោយ <br> REVIEWED BY</div>
						<div style="padding-top: 60px;border-bottom: 1px solid #000;width: 90%;margin: 0 auto;"></div>
					</div>
					<div class="span3" style="text-align: center;">
						<div style="padding: 10px 5px;">សំរេចដោយ <br> APPROVED BY</div>
						<div style="padding-top: 60px;border-bottom: 1px solid #000;width: 90%;margin: 0 auto;"></div>
					</div>
					<div class="span3" style="text-align: center;">
						<div style="padding: 10px 5px;">ទទួលដោយ <br> RECEIVED BY</div>
						<div style="padding-top: 60px;border-bottom: 1px solid #000;width: 90%;margin: 0 auto;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<!--Invoice Line-->
<script id="invoiceCustom-txn-form-template" type="text/x-kendo-template">
	<a class="span4 #= type #" data-id="#= id #" data-bind="click: selectedForm" style="padding-right: 0; width: 32%;">
    	<img src="<?php echo base_url(); ?>assets/invoice/img/#= image_url #.jpg" alt="#: name # image" />
    </a>
</script>
<script id="invoiceForm-lineDS-template" type="text/x-kendo-template">
	<tr>
		<td><i>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</i>&nbsp;</td>
		<td class="lside">#= description ? description : "" #</td>
		<td>#= quantity#</td>
		<td class="rside" width="70">#if(price > 0){# #= kendo.toString(price, "c", locale) # #}#</td>
		<td class="rside">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template3" type="text/x-kendo-template">
	<tr>
		<td><i>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</i></td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td style="text-align: left; padding-left: 5px;"></td>
		<td>#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td>#= quantity#</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template4" type="text/x-kendo-template">
	<tr>
		<td><i>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</i></td>
		<td style="text-align: left; padding-left: 5px;"></td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td></td>
		<td></td>
		<td>#= quantity#</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template5" type="text/x-kendo-template">
	<tr>
		<td style="text-align: left; padding-left: 5px;">&nbsp;</td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td style="text-align: right; padding-right: 5px;"></td>
		<td style="text-align: right; padding-right: 5px;"></td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template6" type="text/x-kendo-template">
	<tr>
		<td class="center" style="color: \\#000">&nbsp;#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
		<td class="lside" style="color: \\#000">#= description ? description : "" #</td>
		<td style="color: \\#000">#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td style="color: \\#000">#= quantity#</td>
		<td class="rside" width="70" style="color: \\#000">#= kendo.toString(price, "c", locale) #</td>
		<td class="rside" style="background-color: \\#eee;color: \\#000">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template8" type="text/x-kendo-template">
	<tr>
		<td style="text-align: left; padding-left: 5px;color: \\#000;">&nbsp;#= description ? description : "" #</td>
		<td style="color: \\#000;">#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td style="color: \\#000;">#= quantity#</td>
		<td class="rside" style="color: \\#000;">#= kendo.toString(price, "c", locale) #</td>
		<td class="rside" style="background-color: \\#eee;color: \\#000;">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template10" type="text/x-kendo-template">
	<tr>
		<td class="center" style="color:\\#000">&nbsp;#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
		<td class="lside" style="color:\\#000">#= description ? description : "" #</td>
		<td style="color:\\#000">#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td style="color:\\#000">#= quantity#</td>
		<td class="rside" width="70" style="color:\\#000">#if(price > 0){##= kendo.toString(price, "c", locale) ##}#</td>
		<td class="rside" style="background-color: \\#eee;color: \\#000">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template12" type="text/x-kendo-template">
	<tr>
		<td class="lside" style="color:\\#000">#= description ? description : "" #</td>
		<td style="color:\\#000">#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td style="color:\\#000">#= quantity#</td>
		<td class="rside" width="70" style="color:\\#000">#= kendo.toString(price, "c", locale) #</td>
		<td class="rside" style="background-color: \\#eee;color:\\#000">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template14" type="text/x-kendo-template">
	<tr>
		<td>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
		<td style="text-align: left; padding-left: 5px;"></td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td>#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td>#= quantity#</td>
		<td style="text-align: right; padding-right: 5px;"></td>
	</tr>
</script>
<script id="payment-voucher-line-template" type="text/x-kendo-template">
	<tr>
		<td>#:banhji.invoiceForm.accountLineDS.indexOf(data)+1#</td>
		<td style="text-align: left; padding-left: 5px;">#: reference_no#</td>
		<td style="text-align: left; padding-left: 5px;">#: contact.name#</td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="payment-voucher-journal-line-template" type="text/x-kendo-template">
	<tr>
		<td>#: account.number#</td>
		<td style="text-align: left; padding-left: 5px;">#: account.name#</td>
		<td style="text-align: left; padding-left: 5px;"># if(dr > 0){# #: dr # #}#</td>
		<td># if(cr > 0){# #: cr# #}#</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template31" type="text/x-kendo-template">
	<tr>
		<td style="text-align: left; padding-left: 5px;">&nbsp; #: item.number ? item.number : ""#</td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td>#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td>#= quantity#</td>
		<!-- <td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td> -->
	</tr>
</script>
<script id="invoiceForm-lineDS-template33" type="text/x-kendo-template">
	<tr>
		<td style="text-align: left; padding-left: 5px;">&nbsp;#= description ? description : "" #</td>
		<td>#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td>#= quantity#</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td>
		<!-- <td style="text-align: right; padding-right: 5px;">#= kendo.toString(amount, "c", locale) #</td> -->
	</tr>
</script>
<script id="invoiceForm-lineDS-recievenot" type="text/x-kendo-template">
	<tr>
		<td class="center" style="color: \\#000">&nbsp;#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
		<td style="text-align: left; padding-left: 5px;">&nbsp;#= item.abbr ? item.abbr: ""##= item.number ? item.number: ""#</td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td>#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td>#= quantity#</td>
		<td></td>

		<!-- <td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td> -->
	</tr>
</script>
<!-- Rice Mill Form-->
<script id="recieptNoteRicemill" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<style>
				.inv2 table td {
					padding: 10px;
					font-size: 14px;
				}
				.inv1 th {
					font-size: 14px;
				}
				.inv1 * {
					font-size: 14px;
					line-height: 25px;
				}
				.inv1 td {
					font-size: 16px;
				}
				.inv1 .cover-signature .singature p {
					font-size: 14px;
					font-weight: normal;
				}
				.inv1 .ten * {
					font-size: 14px!important;
				}
			</style>
	    	<div class="head" style="width: 90%;">
	        	<div class="logo">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
	            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
	            	<h2></h2>
	            	<h3 style="float: left;font-size: 20px;" data-bind="html: company.name"></h3>
	                <div class="vattin" style="float: left; width: 100%">
	                	<p style="float: left; width: 100%">
	                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
	                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" data-bind="text: company.vat_number"></span>
	                	</p>
	                </div>
	                <div class="clear" style="float: left;">
	                	<p style="float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
	                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> Email: <span data-bind="text: company.email"></span></p>
	                </div>
	            </div>
	        </div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង SUPPLIER INFO</b><br>
        			<p><span data-bind="text: obj.contact.name"></span><br>
        			<span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style="font-size: 26px!important; text-transform: uppercase;margin-bottom: 10px;">ប័ណ្ណទទួលទំនិញ</p>
        			<p class="form-title" style="font-size: 26px!important; text-transform: uppercase;">RECIEVE NOTE</p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th style="width: 8%;text-align: center;">ល.រ<br />N<sup style="color: #fff!important;">o</sup></th>
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: left;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ទម្ងន់ដុល<br>Gross W</th>
        				<th style="text-align: center;">ទម្ងន់ឡាន<br>Truck W</th>
        				<th style="text-align: center;">ទម្ងន់សំបក់បាវ<br>Bag W</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">កំណត់សំគាល់<br>REMARK</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-recievenot-ricemill"
						data-bind="source: lineDS">

        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="150">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="150">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm-lineDS-recievenot-ricemill" type="text/x-kendo-template">
	<tr>
		<td class="center" style="color: \\#000">&nbsp;#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
		<td style="text-align: left; padding-left: 5px;">&nbsp;#= item.abbr ? item.abbr: ""##= item.number ? item.number: ""#</td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td>#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td>#= quantity#</td>
		<td></td>

		<!-- <td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td> -->
	</tr>
</script>
<!-- #############################################
##################################################
#	TEMPLATE LIST VIEW 					 		 #
##################################################
############################################## -->
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=abbr##=number#</span>	
	<span>#=name#</span>	
</script>
<script id="contact-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<script id="supplier-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor">+ Add New Supplier</a></li>
    </strong>
</script>
<script id="currency-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=code# - #=country#
	</span>
</script>
<script id="segment-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/segment">+ Add New Segment</a>
    </strong>
</script>
<script id="segment-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=code#</span> <span>#=name#</span>
</script>
<script id="job-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/job">+ Add New Job</a>
    </strong>
</script>
<script id="job-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=number# #=name#
	</span>
</script>

<script id="customer-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer_setting">+ Add New Customer Type</a>
    </strong>
</script>
<script id="customer-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer">+ Add New Customer</a>
    </strong>
</script>
<script id="customer-payment-method-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="\#/customer_setting">+ Add New Payment Method</a>
    </strong>	
</script>
<script id="customer-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer_setting">+ Add New Term</a>
    </strong>
</script>

<script id="employee-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="<?php echo base_url(); ?>admin\#employeelist">+ Add New Employee</a>
    </strong>
</script>

<script id="item-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item">+ Add New Item</a> &nbsp;&nbsp;
    	<a href="\#/item_service">+ Add New Service</a>
    </strong>
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
<script id="item-group-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item_setting">+ Add New Group</a>
    </strong>
</script>
<script id="item-category-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item_setting">+ Add New Category</a>
    </strong>
</script>
<script id="item-brand-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item_setting">+ Add New Brand</a>
    </strong>
</script>
<script id="item-measurement-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item_setting">+ Add New Measurement</a>
    </strong>
</script>

<script id="vendor-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor_setting">+ Add New Supplier Type</a>
    </strong>
</script>
<script id="vendor-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor">+ Add New Supplier</a>
    </strong>
</script>
<script id="vendor-payment-method-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor_setting">+ Add New Payment Method</a>
    </strong>
</script>
<script id="vendor-payment-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor_setting">+ Add New Payment Term</a>
    </strong>
</script>

<script id="cash-payment-method-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/cash_seting">+ Add New Payment Method</a>
    </strong>
</script>
<script id="cash-payment-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/cash_seting">+ Add New Payment Term</a>
    </strong>
</script>

<script id="account-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/account">+ Add New Account</a>
    </strong>
</script>
<script id="account-list-tmpl" type="text/x-kendo-tmpl">	
	<span>
		#=number#				
	</span>
	-
	<span>#=name#</span>
</script>
<script id="account-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer_setting">+ Add New Customer Type</a>
    </strong>
</script>
<script id="account-type-list-tmpl" type="text/x-kendo-tmpl">	
	<span>
		#=number#				
	</span>
	-
	<span>#=name#</span>
</script>

<script id="tax-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="\#/tax">+ Add New Tax</a>
    </strong>	
</script>

<script id="reference-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=number# :
		#if(type=="GDN" || type=="GRN"){# 
			#=kendo.toString(amount, "n")#
		#}else{#
			#=kendo.toString(amount - amount_paid, "c", locale)#
		#}#
	</span>
	<span class="pull-right">
		#if(type=="GDN" || type=="GRN" || type=="Quote" || type=="Sale_Order"){# 
			#if(status==1){#
				Used
			#}else{#
				Open
			#}#
		#}else{#
			#if(status==1){#
				Paid
			#}else if(status==2){#
				Partially Paid
			#}else{#
				Open
			#}#
		#}#		
	</span>
</script>
<script id="attachment-rith-list-tmpl" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<input id="txtName-#:uid#" name="txtName-#:uid#" 
					type="text" class="k-textbox" 
					data-bind="value: name" />
		</td>
		<td>
			<input id="txtDescription-#:uid#" name="txtDescription-#:uid#" 
					type="text" class="k-textbox" 
					data-bind="value: description"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>#=kendo.toString(created_at, "dd-MM-yyyy")#</td>
		<td>
			#if(id){#
				<a href="#=url#" target="_blank" class="btn-action glyphicons download btn-default"><i></i></a>
			#}#
			<span class="btn-action glyphicons remove_2 btn-danger" data-bind="click: onRemove"><i></i></span>			
		</td>
	</tr>
</script>
<script id="attachment-list-tmpl" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<input id="txtName-#:uid#" name="txtName-#:uid#" 
					type="text" class="k-textbox" 
					data-bind="value: name" />
		</td>
		<td>
			<input id="txtDescription-#:uid#" name="txtDescription-#:uid#" 
					type="text" class="k-textbox" 
					data-bind="value: description"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>#=kendo.toString(created_at, "dd-MM-yyyy")#</td>
		<td>
			#if(id){#
				<a href="#=url#" target="_blank" class="btn-action glyphicons download btn-default"><i></i></a>
			#}#
			<span class="btn-action glyphicons remove_2 btn-danger" data-bind="click: removeFile"><i></i></span>			
		</td>
	</tr>
</script>
<script id="errorTemplate" type="text/x-kendo-template">
    <div class="wrong-pass">
        <img style="float: left; cursor: pointer;" src="http://demos.telerik.com/kendo-ui/content/web/notification/error-icon.png" />        
        <h3>#= message #</h3>
    </div>
</script>
<script id="successTemplate" type="text/x-kendo-template">
    <div class="upload-success">
        <img src="http://demos.telerik.com/kendo-ui/content/web/notification/success-icon.png" />
        <h3>#= message #</h3>
    </div>
</script>

<!--  List Templates -->
<script>
	function itemComboBoxEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoComboBox({
        	placeholder: "Select Item",
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#item-list-tmpl").html()),
            dataSource: banhji.source.itemList
        });
    }

    function itemEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#item-list-tmpl").html()),
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "items",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "item_type_id <>", value: 3 },
				sort: [
					{ field:"item_type_id", dir:"asc" },
					{ field:"number", dir:"asc" }
				],
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 50
            }
        });
    }

    function variantAttributeEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	valuePrimitive: false,
        	filter: "startswith",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: dataStore(apiUrl + "variant_attributes")
        });
    }

    function attributeValueEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoMultiSelect({
        	valuePrimitive: false,
            dataTextField: "name",
            dataValueField: "id",
            autoBind: false,
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "attribute_values",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "variant_attribute_id", value: options.model.variant_attribute.id },
				sort: { field:"name", dir:"asc" },
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function locationTypeEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "location_types",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function inventoryForSaleEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#item-list-tmpl").html()),
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "items",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "item_type_id", value: 1 },
				sort: { field:"number", dir:"asc" },
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function accountEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#account-list-tmpl").html()),
            dataSource: {
            	data: banhji.source.accountList,
			  	sort: [
				  	{ field: "account_type_id", dir: "asc" },
				  	{ field: "number", dir: "asc" }
				]
            }
        });
    }

    function toAccountEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#account-list-tmpl").html()),
            dataSource: {
            	data: banhji.source.accountList,
            	filter: [
			      	{ field: "account_type_id", operator:"neq", value: 10 },
			      	{ field: "account_type_id", operator:"neq", value: 11 },
			      	{ field: "account_type_id", operator:"neq", value: 12 }
			    ],
			  	sort: [
				  	{ field: "account_type_id", dir: "asc" },
				  	{ field: "number", dir: "asc" }
				]
            }
        });
    }

    function whtAccountEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#account-list-tmpl").html()),
            dataSource: {
            	data: banhji.source.accountList,
            	filter: {
		      		logic: "or",
				    filters: [
				      	{ field: "account_type_id", value: 13 },//Inventory
				      	{ field: "account_type_id", value: 16 },//Fixed Asset
				      	{ field: "account_type_id", value: 17 },//Intangible Assets
				      	{ field: "account_type_id", value: 36 },//Expense
				      	{ field: "account_type_id", value: 37 },
				      	{ field: "account_type_id", value: 38 },
				      	{ field: "account_type_id", value: 40 },
				      	{ field: "account_type_id", value: 41 },
				      	{ field: "account_type_id", value: 42 },
				      	{ field: "account_type_id", value: 43 }
				    ]
				},
			  	sort: [
				  	{ field: "account_type_id", dir: "asc" },
				  	{ field: "number", dir: "asc" }
				]
            }
        });
    }    

    function measurementEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({       	
            dataTextField: "measurement",
            dataValueField: "measurement_id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "item_prices",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:[
					{ field:"item_id", value: options.model.item_id },
					{ field:"assembly_id", value: 0 }
				],
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function discountEditor(container, options) {
        $('<input name="' + options.field + '" type="number" class="k-textbox" style="width: 95%;" min="0" max="1" />')
        .appendTo(container);
    }

    function taxForSaleEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	data: banhji.source.taxList,
			  	filter:{
				    logic: "or",
				    filters: [
				      	{ field: "tax_type_id", value: 3 },//Customer Tax
				      	{ field: "tax_type_id", value: 9 }
				    ]
				},
			  	sort: [
				  	{ field: "tax_type_id", dir: "asc" },
				  	{ field: "name", dir: "asc" }
				]
            }
        });
    }

    function taxForPurchaseEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	data: banhji.source.taxList,
			  	filter:{
				    logic: "or",
				    filters: [
				      	{ field: "tax_type_id", value: 1 },//Supplier Tax
				      	{ field: "tax_type_id", value: 2 },
				      	{ field: "tax_type_id", value: 3 },
				      	{ field: "tax_type_id", value: 9 }
				    ]
				},
			  	sort: [
				  	{ field: "tax_type_id", dir: "asc" },
				  	{ field: "name", dir: "asc" }
				]
            }
        });
    } 

    function segmentEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "startswith",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "segments",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function segmentItemEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "startswith",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#segment-list-tmpl").html()),
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "segments/item",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "segment_id", value: options.model.segment.id },
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function numberTextboxEditor(container, options) {
        $('<input name="' + options.field + '" type="number" class="k-textbox" style="width: 95%;" />')
        .appendTo(container);
    }

    function dateEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDatePicker({
        	format: "dd-MM-yyyy",
        	parseFormats: ["yyyy-MM-dd"]
        });
    }

    function customBoolEditor(container, options) {
        $('<input class="k-checkbox" type="checkbox" name="applyAdditionalCostChk" data-type="boolean" data-bind="checked:additional_applied">').appendTo(container);
        $('<label class="k-checkbox-label">&#8203;</label>').appendTo(container);
    }

    function supplierEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#contact-list-tmpl").html()),
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "contacts",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "parent_id", operator:"where_related_contact_type", value: 2 },
				sort: [
					{ field:"contact_type_id", dir:"asc" },
					{ field:"number", dir:"asc" }
				],
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }
    
</script>





<!-- #############################################
##################################################
#	MENU VIEW 					 			 	#
##################################################
############################################## -->
<script id="saleMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<!-- <li><a href='#/sale_center' class='glyphicons show_big_thumbnails'><i></i></a></li> -->
	  	<li><a href='#/sale_center'><span data-bind="text: lang.lang.center" style="color: #fff;"></span></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/customer'><span data-bind="text: lang.lang.add_customer"></span></a></li> 
  				<li ><a href='rrd/#/job'><span data-bind="text: lang.lang.add_job"></span></a></li>	
  				<!-- <li><a href='#/item_catalog'><span data-bind="text: lang.lang.add_new_catalog"></span></a></li> -->
  				<li><a href='rrd/#/item_assembly'><span data-bind="text: lang.lang.build_assembly"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<!-- <li ><a href='#/sale'>Mobile Sale</a></li> -->
  				<li ><a href='#/quote'><span data-bind="text: lang.lang.create_quotation"></span></a></li>
  				<li><a href='#/sale_order'><span data-bind="text: lang.lang.create_sale_order"></span></a></li>
  				<li><a href='#/cash_sale'><span data-bind="text: lang.lang.create_cash_sale"></span></a></li>
  				<li><a href='#/customer_deposit'><span data-bind="text: lang.lang.create_customer_deposit"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li><a href='#/sale_recurring'>Recurring</a></li>
  				<!-- <li><a href='#/imports'><span ></span>Imports</a></li> -->
  			</ul>
	  	</li>
	  	<li><a href="#/sale_report_center" style="color: #fff;">Reports</a></li>
	</ul>
</script>

<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>