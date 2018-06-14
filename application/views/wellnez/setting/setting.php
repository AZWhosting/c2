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
	.setting .example{
		background: #fff;
	    width: 100%;
	    text-align: center;
	    position: relative; 
	    padding: 15px;
	    border-radius: 10px;
	    float: left;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	    
	}
	.setting .example h2{
		color: #0eac00 !important;
		text-align: left;
		margin-bottom: 10px;
	}
	.setting .example table th{
		text-transform: uppercase;
		background: #1c3b19;
	}
	.setting ul li {
	    color: #fff !important;
	    text-shadow: none;
	    background: #0eac00;
	    float: left;
	    width: 100%;
	    height: 40px;
	    line-height: 20px;
	}
	.setting ul li a {
	    color: #fff;
	}
	.setting .widget.widget-tabs > .widget-head ul li{
		text-align: left;
	}
	.setting .widget.widget-tabs > .widget-head ul li a {
	    color: #fff;
	}
	.setting .widget.widget-tabs > .widget-head ul li a i:before {
	    color: #fff;
	}
	.setting .widget.widget-tabs > .widget-head ul li.active a {
	    background: #fff;
	    color: #333 !important;
	}
	.setting .widget.widget-tabs > .widget-head ul li.active a i:before {
	    color: #333;
	    background: #fff;
	}
	.setting .tab-pane table{
		margin-top: 15px;
		float: left;
	}
	.setting .tab-pane input{
		border: 1px solid #ccc ;
	}
	.setting .tab-pane a.btn-icon{
		float: right;
	}
	.setting .tab-pane .k-header .k-icon {
	    margin-top: 6px;
	}
	.branch .example{
		background: #fff;
	    width: 100%;
	    text-align: center;
	    position: relative; 
	    padding: 15px;
	    border-radius: 10px;
	    float: left;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	    text-align: left;
	}
	.branch .example h2{
		color: #0eac00 !important;
		text-align: left;
		margin-bottom: 10px;
	}
	.branch .example .tabsbar ul li a,
	.branch .example .tabsbar ul li a i:before{
		color: #fff;
	}
	.branch .example .tabsbar ul li.active a,
	.branch .example .tabsbar ul li.active a i:before{
		color: #333;
	}

	#CancelReason .k-button.k-button-icontext.k-grid-add{
		background: #496cad;
    	color: #fff;
    	float: left;
	}
	#CancelReason .k-button.k-button-icontext.k-grid-save-changes{
		background: #496cad;
    	color: #fff;
    	float: left;
	}
	#CancelReason table th{
		color: #fff;
	}
</style>
<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="Branch" type="text/x-kendo-template">
	<div class="container">
		<div class="row branch">
			<div class="span12">
				<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
					<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
				</div>
				<div class="k-content example">
					<h2 style="float: left;">Branch</h2>
					<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>
					</div>

					<div class="row-fluid">
			    		<div class="col-xs-12 col-sm-12 well">
							<div class="row">
								<div class="col-xs-12 col-sm-3" >	
									<!-- Group -->
									<div class="control-group">
										<label ><span>Name</span></label>
				              			<br>
				              			<input
				              				class="k-textbox" 
							            	data-bind="value: obj.name, attr: {placeholder: lang.lang.name}" 
						              		placeholder="Name" 
						              		style="width: 100%;" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="control-group">
										<label ><span data-bind="text: lang.lang.abbr">Abbr</span></label>
							            <input 
							            	class="k-textbox" 
							            	placeholder="Abbr" 
						            		data-bind="value: obj.abbr, attr: {placeholder: lang.lang.abbr}" 
						              		style="width: 100%;" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="control-group">
										<label ><span data-bind="text: lang.lang.representative">Representative</span></label>
										<input 
							            	class="k-textbox" 
							            	placeholder="Representative" 
						            		data-bind="value: obj.representative, attr: {placeholder: lang.lang.representative}"
						              		style="width: 100%;" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="control-group">
										<label ><span data-bind="text: lang.lang.segment">Segment</span></label>
										<select data-role="dropdownlist"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="
						                   	source: segmentItemDS,
						                   	value: obj.segment_item_id"
						                   style="width: 100%; margin-bottom: 15px;" ></select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="control-group">
										<label ><span data-bind="text: lang.lang.currency">Currency</span></label>
										<select data-role="dropdownlist"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="
						                   	source: selectCurrency,
						                   	value: obj.currency"
						                   style="width: 100%; margin-bottom: 15px;" ></select>
						    		</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="control-group">
										<label ><span data-bind="text: lang.lang.status">Status</span> </label>
							            <select data-role="dropdownlist"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="
						                   	source: selectType,
						                   	value: obj.status"
						                   style="width: 100%;" ></select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12">
									<div class="control-group">
										<label ><span data-bind="text: lang.lang.description">Description</span></label>
										<textarea rows="3" class="k-textbox k-valid" 
											style="width:100%" 
											data-bind="value: obj.description, attr: {placeholder: lang.lang.description}" 
											placeholder="Description ..."></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row-fluid">
						<div class="box-generic" >
						    <div class="tabsbar tabsbar-1" style="background: #203864 !important; color: #fff;">
						        <ul class="row-fluid row-merge">
						            <li class="span2 glyphicons nameplate_alt active">
						            	<a href="#tab1" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.info">Info</span></a>
						            </li>
						            <li class="span2 glyphicons nameplate" style="width: 21%;">
						            	<a href="#tab2" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.terms_condition">Terms & Condition</span></a>
						            </li>
						            <li class="span2 glyphicons paperclip">
						            	<a href="#tab3" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.logo">LOGO</span></a>
						            </li>
						        </ul>
						    </div>
						    <div class="tab-content">
						        <div class="tab-pane active" id="tab1">
						        	<div class="row" style="margin-bottom: 15px;">
						        		<div class="col-xs-12 col-sm-3">
						        			<span data-bind="text: lang.lang.address">Address</span>
						        		</div>
						        		<div class="col-xs-12 col-sm-9">
						        			<input class="k-textbox" 
				            					data-bind="value: obj.address, attr: {placeholder: lang.lang.address}" 
												placeholder="Address ..." style="width: 100%;" />
						        		</div>
						        	</div>

						        	<div class="row" style="margin-bottom: 15px;">
						        		<div class="col-xs-12 col-sm-3">
						        			<span data-bind="text: lang.lang.districts">District</span>
						        		</div>
						        		<div class="col-xs-12 col-sm-3">
						        			<input 
												data-role="dropdownlist" 
												style="width: 100%;" 
												data-option-label="District ..." 
												data-auto-bind="true" 
												data-value-primitive="true" 
												data-text-field="name_local" 
												data-value-field="id" 
												data-bind="
													value: obj.district,
	                              					source: districtDS" style="width: 100%;">
						        			
						        		</div>
						        		<div class="col-xs-12 col-sm-3">
						        			<span data-bind="text: lang.lang.mobile">Mobile</span>
						        		</div>
						        		<div class="col-xs-12 col-sm-3">
						        			<input class="k-textbox" 
						              			data-bind="value: obj.mobile, attr: {placeholder: lang.lang.mobile}" 
						              			placeholder="Mobile ..." 
						              			style="width: 100%;" /></td>
						        		</div>
						        	</div>

						        	<div class="row" style="margin-bottom: 15px;">
						        		<div class="col-xs-12 col-sm-3">
						        			<span data-bind="text: lang.lang.provinces">Province</span>
						        		</div>
						        		<div class="col-xs-12 col-sm-3">
						        			<input 
												data-role="dropdownlist" 
												style="width: 100%;" 
												data-option-label="Province ..." 
												data-auto-bind="true" 
												data-value-primitive="true" 
												data-text-field="name" 
												data-value-field="id" 
												data-bind="
													value: obj.province,
	                              					source: provinceSelect,
	                              					events: {change: provinceChange}">
						        		</div>
						        		<div class="col-xs-12 col-sm-3">
						        			<span data-bind="text: lang.lang.telephone">Telephone</span>
						        		</div>
						        		<div class="col-xs-12 col-sm-3">
						        			<input class="k-textbox" 
							              		data-bind="value: obj.telephone, attr: {placeholder: lang.lang.telephone}" 
							              		placeholder="Telephone ..." style="width: 100%;" />
						        		</div>
						        	</div>

						        	<div class="row">
						        		<div class="col-xs-12 col-sm-3">
						        			<span data-bind="text: lang.lang.email">Email</span>
						        		</div>
						        		<div class="col-xs-12 col-sm-3">
						        			<input class="k-textbox" 
						              			data-bind="value: obj.email, attr: {placeholder: lang.lang.email}" 
						              			placeholder="Email ..." style="width: 100%;" />
						              	</div>
						        	</div>
					        	</div>

						        <div class="tab-pane" id="tab2">
						        	<div class="row-fluid">
						        		<div class="controls">
											<textarea 
												class="span12" 
												placeholder="Terms & Condition..." 
						                      	data-bind="value: obj.term_of_condition"
						                      	style="height: 200px;">
							                </textarea>
				                      	</div>			        		
						            </div>
					        	</div>

						        <div class="tab-pane" id="tab3">
						        	<p><span >File Type</span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>	
						        	<img data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }" width="120px" style="margin-bottom: 15px; border: 1px solid #ddd;">
						            <input id="files" name="files"
					                   type="file"
					                   data-role="upload"
					                   data-show-file-list="false"
					                   data-bind="events: { 
			                   				select: onSelect
					                   }">
					        	</div>
						    </div>
						</div>
					</div>
					
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>
						<div class="row">
							<div class="span3">
							</div>
							<div class="col-sm-9" align="right">
								<span id="cancel" data-bind="click: cancel" class="btn-btn">
									<span data-bind="text: lang.lang.cancel">Cancel</span>
								</span>
								<span id="saveNew" class="btn-btn" data-bind="invisible: isEdit, click: save">
									<span data-bind="text: lang.lang.save">Save</span>
								</span>
							</div>
						</div>
					</div>

				</div>						
			</div>
		</div>
	</div>
</script>
<script id="Index" type="text/x-kendo-template">
	<div class="container">
		<div class="row setting">
			<div class="span12">
				<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
					<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
				</div>
				<div class="k-content example ">
					<h2 data-bind="text: lang.lang.settings">Setting</h2>
					<div style="float: left; width: 100%; " class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">
					    <div id="setting" class="widget-head col-xs-12 col-sm-3">
					        <ul>
					            <li class="active">
					            	<a href="#tab1" class="glyphicons old_man" data-toggle="tab">
					            		<i></i><span class="strong"><span>Branch</span></span>
					            	</a>
					            </li>
					            <!-- <li>
					            	<a href="<?php echo base_url(); ?>rrd/#/customer_setting" target="_blank" class="glyphicons calculator">
					            		<i></i><span class="strong"><span data-bind="text: lang.lang.customer_type">Branch</span></span>
					            	</a>
					            </li> -->
					            <li>
					            	<a href="#ServiceCharge" class="glyphicons wallet" data-bind="click: goServiceCharge" data-toggle="tab">
					            		<i></i><span class="strong"><span >Service Charge</span></span>
					            	</a>
					            </li>
					            <li>
					            	<a href="#CustomForm" class="glyphicons list" data-toggle="tab">
					            		<i></i><span class="strong"><span data-bind="text: lang.lang.custom_forms"></span></span>
					            	</a>
					            </li>
					            <li>
					            	<a href="#CancelReason" class="glyphicons lock" data-toggle="tab" data-bind="click: goCancellation">
					            		<i></i><span class="strong"><span>Cancellation Reasons</span></span>
					            	</a>
					            </li>
					            <!-- <li>
					            	<a href="#PayType" class="glyphicons nameplate_alt" data-toggle="tab">
					            		<i></i><span class="strong"><span >Payment Type</span></span>
					            	</a>
					            </li> -->
					        </ul>
					    </div>
					    <div class="widget-body col-xs-12 col-sm-9 setting">
					    	<div class="row-fluid">
						        <div class="tab-content">
						            <div class="tab-pane active" id="tab1">
						            	<a class="btn-icon btn-primary glyphicons circle_plus" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" href="#/branch">
						            		<i></i><span data-bind="text: lang.lang.add">Add</span>
						            	</a>
						            	<table style="width: 100%;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
						            		<thead>
						            			<tr>
						            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.name">Name</span></th>
						            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.mobile">Code</span></th>
						            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.telephone">Telephone</span></th>
						            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.action">Action</span></th>
						            			</tr>
						            		</thead>
						            		<tbody 
						            			data-role="listview"
								                data-template="branch-template"
								                data-bind="source: branchDS">
								            </tbody>
						            	</table>
						            </div>
						            <div class="tab-pane" id="CustomForm">
						            	<div class="row" style="clear:both;">
								        	<div class="row formstyle">
												<div id="formStyle"
													 data-role="listview"
													 data-selectable="true"
									                 data-template="invoiceCustom-txn-form-template"
									                 data-bind="source: txnFormDS"
									                 style="overflow: auto">
									            </div>
									        </div>
										</div>
						            </div>
						            <div class="tab-pane" id="ServiceCharge">
						            	<div class="row" style="clear:both;">
								        	<div class="col-sx-12 col-sm-12">
												<!-- Group -->
												<div class="control-group col-sm-3" style="text-align: left;width: 15%;">
													<label ><span>Activated</span></label>
										            <input type="checkbox" data-bind="checked: serviceobj.register" />
												</div>
												<div class="col-sm-3" style="width: 22%; text-align: left; padding: 0;"><input type="text" data-bind="value: serviceobj.percentage" style="height: 30px; padding: 4px;"> %
												</div>
												<div class="col-sm-3" style="text-align: left; float: left; ">
													<a class="btn-icon btn-primary glyphicons circle_plus" style="width: 100px; padding: 5px 7px 5px 35px !important; text-align: left; float: left;" data-bind="click: saveServiceCharge">
									            		<i></i><span data-bind="text: lang.lang.save">Add</span>
									            	</a>
									            </div>
								            	<table style="width: 100%;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
								            		<thead>
								            			<tr>
								            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.name">Name</span></th>
								            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.account">Code</span></th>
								            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.currency">Telephone</span></th>
								            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.action">Action</span></th>
								            			</tr>
								            		</thead>
								            		<tbody 
								            			data-role="listview"
										                data-template="service-charge-template"
										                data-bind="source: scItemDS">
										            </tbody>
								            	</table>
											</div>
										</div>
						            </div>
						            <div class="tab-pane" id="CancelReason">
						            	<div class="row">
						            		<div class="col-sx-12 col-sm-12">
							            		<style type="text/css">
							            			td {
							            				color: #000!important;
							            			}
							            		</style>
							            		<div data-role="grid"
								                 data-editable="true"
								                 data-toolbar="['create', 'save']"
								                 data-columns="[
								                                 { 'field': 'description', 'width': 670 },
								                              ]"
								                 data-bind="source: cancellationDS"
								                 style="height: 200px"></div>
								            </div>
						            	</div>
						            </div>
						        </div>
						    </div>
					    </div>
					    <div id="ntf1" data-role="notification"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="invoiceCustom-txn-form-template" type="text/x-kendo-template">
	<a class="span4 #= type #" data-id="#= id #" data-bind="click: selectedForm" style="padding-right: 0; width: 32%;">
    	<img src="<?php echo base_url(); ?>assets/invoice/img/#= image_url #.jpg" alt="#: name # image" />
    </a>
</script>
<script id="room-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= branch_name#
   		</td>
   		<td align="center">
    		#= name#
   		</td>
   		<td align="center">
    		#= number#
   		</td>
   		<td align="center">   			   
		    #if(status == 1){#
		    	Active
		    #}else{#
		    	Inactive
		    #}#
   		</td> 
   		<td>
   			<span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
   		</td> 		
   	</tr>
</script>
<script id="room-edit-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
            <input data-role="dropdownlist"
			   data-option-label="(--- Select ---)"       
               data-value-primitive="true"
               data-text-field="name"
               data-value-field="id"
               data-bind="
               		value: branch_id,
                    source: branchDS" />
        </td>
		<td align="center">
            <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
        </td>
		<td align="center">
            <input type="text" class="k-textbox" data-bind="value:number" name="abbr" required="required" validationMessage="required" />
        </td>
        <td align="center">
            <input data-role="dropdownlist"    
               data-value-primitive="true"
               data-text-field="name"
               data-value-field="id"
               data-bind="
               		value: status,
                    source: statusAR" />
        </td>
		<td align="center">
	        <div class="edit-buttons">
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
	        </div>
	    </td>
	</tr>
</script>
<script id="customerSetting-contact-type-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#:name#
   		</td>
   		<td align="center">
    		#:abbr#
   		</td>
   		<td align="center">
    		#if(is_company=="1"){#
    			Yes
    		#}else{#
    			No
    		#}#
   		</td>
   		<td align="center">   			
   			<div class="edit-buttons">       
		        <a class="k-button k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
		        #if(is_system=="0"){#
			        <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>				        
		        #}#
		        <a class="k-button" href="\#/customer/0/#=id#"><span data-bind="text: lang.lang.pattern"></span></a>
		   	</div>		   	
   		</td>   		
   	</tr>
</script>
<script id="customerSetting-edit-contact-type-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>                
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>               
        </dl>
        <dl>                
            <dd>
                <input type="text" class="k-textbox" data-bind="value:abbr" name="abbr" required="required" validationMessage="required" />
                <span data-for="abbr" class="k-invalid-msg"></span>
            </dd>               
        </dl>
        <dl>                
            <dd>
                <select data-bind="value: is_company" >
	                <option value="0"><span data-bind="text: lang.lang.not_a_company"></span></option>
	                <option value="1"><span data-bind="text: lang.lang.it_is_a_company"></span></option>			                
	            </select>
            </dd>              
        </dl>
        <div class="edit-buttons">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </div>
    </div>
</script>
<script id="blocSetting-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= branch.name#
   		</td>
   		<td>
    		#= name#
   		</td>
   		<td align="center">
    		#= abbr#
   		</td>
   		<td align="center">   			   
		    <span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
    		|
    		<span style="cursor: pointer;" data-bind="click: viewPole"><i class="icon-view"></i> <span data-bind="text: lang.lang.view_item">View Item</span></span>
    		|
    		<span style="cursor: pointer;" data-bind="click: showPole"><i class="icon-plus icon-white"></i> <span data-bind="text: lang.lang.add_sub_location">Add Sub Location</span></span>
   		</td>   		
   	</tr>
</script>
<script id="bloc-edit-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
            <input data-role="dropdownlist"
    			   data-option-label="(--- Select ---)"       
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: branch.id,
                              source: licenseDS" />
        </td>
			<td align="center">
    
            <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
        </td>
			<td align="center">
            <input type="text" class="k-textbox" data-bind="value:abbr" name="abbr" required="required" validationMessage="required" />
            <span data-for="abbr" class="k-invalid-msg"></span>
        </td>
		<td align="center">
    
	        <div class="edit-buttons">
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
	        </div>
	    </td>
	</tr>
</script>
<script id="pole-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= name#
   		</td>
   		<td align="center">   			   
		    <span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
    		|
    		<span style="cursor: pointer;" data-bind="click: viewBox"><i class="icon-view"></i> <span data-bind="text: lang.lang.view_item">View Item</span></span>
    		|
    		<span style="cursor: pointer;" data-bind="click: showBox"><i class="icon-plus icon-white"></i> <span data-bind="text: lang.lang.add_box">Add Box</span></span>
   		</td>   		
   	</tr>
</script>
<script id="pole-edit-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
            <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
        </td>
		<td align="center">
    
	        <div class="edit-buttons">
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
	        </div>
	    </td>
	</tr>
</script>
<script id="box-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= name#
   		</td>
   		<td align="center">   			   
		    <span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
   		</td>   		
   	</tr>
</script>
<script id="box-edit-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
            <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
        </td>
		<td align="center">
    
	        <div class="edit-buttons">
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
	        </div>
	    </td>
	</tr>
</script>
<script id="item-list-tmpl" type="text/x-kendo-tmpl">
	<span style="width:55%; float: left">
		#=name#
	</span>
	<span style="width:15%; text-align: right; float: right; padding-right: 15px; text-transform: capitalize;">#=type#</span>
</script>

<script id="branch-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= name#
   		</td>
   		<td align="center">
    		#= mobile#
   		</td>
   		<td align="center">
    		#= telephone#
   		</td>
   		<td align="center">   			   
		    <a class="btn-action glyphicons pencil btn-success" href="\\#/branch/#= id#"><i></i></a>
   		</td>   		
   	</tr>
</script>
<script id="service-charge-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= name#
   		</td>
   		<td align="center">
    		
   		</td>
   		<td align="center">
    		#= locale #
   		</td>
   		<td align="center">   			   
		    <a style="cursor: pointer;" href="<?php echo base_url(); ?>rrd/\#/txn_item/#:id#" target="_blank"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
   		</td>   		
   	</tr>
</script>
<script id="plan" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.add_plan"></h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
						<div class="row-fluid">
				        	<div id="plan" class="box-generic well" style="margin-bottom: 0;">
				        		<div class="row">
				        			<div class="col-xs-12 col-sm-1">
				        				<span data-bind="text: lang.lang.name">Name</span>
				        			</div>
				        			<div class="col-xs-12 col-sm-3">
				        				<input
											class="k-textbox k-invalid"
											data-required-msg="required" 
											style="width: 100%;" 
											placeholder="Name ..." 
											aria-invalid="true"
											data-bind="value: current.name, attr: {placeholder: lang.lang.name}" />
				        			</div>
				        			<div class="col-xs-12 col-sm-1">
				        				<span data-bind="text: lang.lang.code">Code</span>
				        			</div>
				        			<div class="col-xs-12 col-sm-3">
				        				<input 
											class="k-textbox k-invalid" 
											data-required-msg="required" 
											style="width: 100%;" 
											placeholder="Code ..." 
											aria-invalid="true"
											data-bind="value: current.code, attr: {placeholder: lang.lang.code}" />
				        			</div>
				        			<div class="col-xs-12 col-sm-1">
				        				<span data-bind="visible: currencyEnable"><span data-bind="text: lang.lang.currency">Currency</span></span>
				        			</div>
				        			<div class="col-xs-12 col-sm-3">
				        				<input data-role="dropdownlist"
						            	   style="width: 100%; height: 32px;" 
				            			   data-option-label="(--- Currency ---)"
				            			   data-auto-bind="false"
						                   data-value-primitive="true"
						                   data-text-field="code"
						                   data-value-field="id"
						                   data-bind="value: current.currency,
						                            source: currencyDS,
						                            enabled: currencyEnable,
						                            events: {change: currencyChange}"/>
				        			</div>
				        		</div>		
							</div>
						</div>

		                <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs" style="margin-top: 15px;">
		                	<thead>
		                		<tr>
		                			<th style="vertical-align: top;" ><span data-bind="text: lang.lang.item">Item</span></th>
		                			<th style="vertical-align: top;" ><span data-bind="text: lang.lang.type">Type</span></th>
		                			<th style="vertical-align: top;" ><span data-bind="text: lang.lang.name">Name</span></th>
		                			<th style="vertical-align: top;" ><span data-bind="text: lang.lang.rate">Rate</span></th>
		                			<th style="vertical-align: top;" ><span data-bind="text: lang.lang.action">Action</span></th>
		                		</tr>
		                	</thead>
		                	<tbody 
		                		data-bind="source: current.items" 
		                		data-auto-bind="true" 
		                		data-role="listview" 
		                		data-template="planItem-list-item">
		                	</tbody>
		                </table>

		                 <!-- Bottom part -->
			            <div class="row" style="margin-bottom: 15px;">
							<!-- Column -->
							<div class="col-sm-4">
								<button style="float: left" class="btn btn-inverse" data-bind="click: addItem">
									<i class="icon-plus icon-white"></i>
								</button>
							</div>
							<!-- Column END -->
						</div>

						<!-- Form actions -->
						<div class="box-generic bg-action-button">
							<div id="ntf1" data-role="notification"></div>
							<div class="row">
								<div class="span3">
								</div>
								<div class="col-sm-9" align="right">
									<span id="cancel" data-bind="click: cancel" class="btn-btn">
										<span data-bind="text: lang.lang.cancel">Cancel</span>
									</span>
									<span id="saveNew" class="btn-btn" data-bind="invisible: isEdit, click: save">
										<span data-bind="text: lang.lang.save">Save</span>
									</span>									
								</div>
							</div>
						</div>
						<!-- // Form actions END -->

					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="planItem-list-item" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<input id="ccbItem" name="ccbItem-#:uid#"
			   data-role="combobox"
			   data-template="item-list-tmpl"
               data-text-field="name"
               data-auto-bind="true"
               data-value-field="id"
               data-bind="value: item, 
               			  source: itemDS,
               			  events:{ change: onChange }"
               placeholder="Select ..." 
               required data-required-msg="required" style="width: 100%" />	
		</td>
		<td><span data-bind="text: type"></span></td>
		<td><span data-bind="text: name"></span></td>
		<td><input type="text" style="text-align:right;" class="k-textbox" data-bind="value: amount" /></td>
		<td align="center">
			<a class="btn-action glyphicons remove_2 btn-danger k-delete-button"><i></i></a>
		</td>
	</tr>
</script>
<script id="item-list-tmpl" type="text/x-kendo-tmpl">
	<span style="width:55%; float: left">
		#=name#
	</span>
	<span style="width:15%; text-align: right; float: right; padding-right: 15px; text-transform: capitalize;">#=type#</span>
</script>