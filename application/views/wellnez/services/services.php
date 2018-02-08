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
	    border-radius: 20px;
	    float: left;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);	    
	}
	.block-number{
		width: 19.7%;
	    float: left;
	    background: #fff;
	    color: #333;
	    text-align: center;
	    margin-right: 1px;
	    padding: 15px;
	    margin-bottom: 1px;
	    font-size: 25px;
	    font-weight: 700;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1)
	}
		
	.services .example table{
		width: 100%;
		background: #fff;
		float: left;
		color: #333;
		border: 1px solid #ddd;
		text-align: left;
	}
	.services .example table th{
		text-transform: uppercase;
		background: #1c3b19;
		color: #fff;

	}
	.services .example table tr th,
	.services .example table tr td{
		padding: 8px;
		border: 1px solid #ddd;
	}
	.table-condensed tr td {
	    border: none !important;
	}
	.table-condensed th, .table-condensed td {
	    padding: 5px 5px 5px 10px !important;
	}
	.table-striped tbody tr:nth-child(odd) td, 
	.table-striped tbody tr:nth-child(odd) th {
	    background: #f4f5f8 !important;
	}
	.botton .button-service{
		background: #fff;
	    padding: 10px;
	    float: left;
	    width: 100%;
	    border-radius: 5px 5px 0 0;
	    margin-bottom: 1px;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	    color: #0eac00;
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
	    border-radius: 0 0 0 5px;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
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
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
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
	    margin-bottom: 0;
	    border-radius: 0 0 5px 0;
	    line-height: 39px;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	    color: #0eac00;
	}
	.button-cancel span{
		font-size: 45px;
	    padding: 5px;
	    float: left;
	    width: 100%;
	}
</style>
<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
	<div class="container">
		<div class="row services">
			<div class="span12">	
				<div class="row ">
					<div class="span6 ">
						<div class="example">
							<div class="row-fluid ">
								<div class="block-number">
									1
								</div>
								<div class="block-number">
									2
								</div>
								<div class="block-number">
									3
								</div>
								<div class="block-number">
									4
								</div>
								<div class="block-number">
									5
								</div>
							</div>
							<div class="row-fluid ">
								<div class="block-number">
									6
								</div>
								<div class="block-number">
									7
								</div>
								<div class="block-number">
									8
								</div>
								<div class="block-number">
									9
								</div>
								<div class="block-number">
									10
								</div>
							</div>
							<div class="row-fluid ">
								<div class="block-number">
									11
								</div>
								<div class="block-number">
									12
								</div>
								<div class="block-number">
									13
								</div>
								<div class="block-number">
									14
								</div>
								<div class="block-number">
									15
								</div>
							</div>
							<div class="row-fluid ">
								<div class="block-number">
									16
								</div>
								<div class="block-number">
									17
								</div>
								<div class="block-number">
									18
								</div>
								<div class="block-number">
									19
								</div>
								<div class="block-number">
									20
								</div>
							</div>
							<div class="row-fluid ">
								<div class="block-number">
									21
								</div>
								<div class="block-number">
									22
								</div>
								<div class="block-number">
									23
								</div>
								<div class="block-number">
									24
								</div>
								<div class="block-number">
									25
								</div>
							</div>							
						</div>
					</div>
					<div class="span6">
						<div class="example" style="box-shadow: 2px 0px 12px 0px rgba(68,68,68,1); border-radius: 20px 20px 0 0 ; margin-bottom: 1px;">
							<table >
								<tr>
									<th>Services</th>
									<th>Qty</th>
									<th>UOM</th>
								</tr>
								<tr>
									<td>1</td>
									<td>2</td>
									<td>3</td>
								</tr>
								<tr>
									<td>1</td>
									<td>2</td>
									<td>3</td>
								</tr>
								<tr>
									<td>1</td>
									<td>2</td>
									<td>3</td>
								</tr>
								<tr>
									<td>1</td>
									<td>2</td>
									<td>3</td>
								</tr>
							</table>
						</div>
						<div class="example" style="box-shadow: 2px 0px 12px 0px rgba(68,68,68,1); border-radius: 0 0 20px 20px;">
							<div class="row ">
								<div class="span6 ">
									<table class="table table-condensed table-striped table-white" >
										<tbody>
											<tr>
												<td class="right" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
												<td class="right strong" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
											</tr>               
											<tr>
												<td class="right"><span>Discount</span></td>
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
								<div class="span6 botton" style="padding-left: 0;">
									<div class="row">
										<div class="span12 ">
											<div class="button-service">
												<div class="img">
													<img src="<?php echo base_url();?>assets/spa/icon/pay-green.png" >
												</div>
												<p class="textBig">Print </p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="span4 " style="padding-right: 0;">
											<div class="button-book">
												<div class="img">
													<img src="<?php echo base_url();?>assets/spa/icon/pay-green.png" >
												</div>
												<p class="textSmall">Loyalty</p>
											</div>
										</div>
										<div class="span4 " style="padding: 0;">
											<div class="button-pay">
												<div class="img">
													<img src="<?php echo base_url();?>assets/spa/icon/pay-green.png" >
												</div>
												<p class="textSmall">Gift Card</p>
											</div>
										</div>
										<div class="span4 " style="padding-left: 0;">
											<p class="button-cancel"><span>X</span> <br> Split</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="span12" style="margin-top: 20px;">
				<p data-bind="text: today"></span>
			</div>
		</div>
	</div>
</script>