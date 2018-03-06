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
	.session .example{
		background: #fff;
	    width: 100%;
	    text-align: center;
	    position: relative; 
	    padding: 15px;
	    border-radius: 10px;
	    float: left;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	    
	}
	.session .example h2{
		color: #fff;
		text-align: left;
		margin-bottom: 10px;
	}
	.session .example table th{
		text-transform: uppercase;
		background: #1c3b19;
	}
	.session .example table tr td{
		font-size: 13px;
	}
</style>
<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
		<div class="container">
		<div class="row session">
			<div class="span12">
				<div class="example">
					<h2 style="width: 30%; float: left;">Session Management</h2>
					<ul class="topnav addNew" style="float: left;width: 14%; background: #0eac00">
						<li role="presentation" class="dropdown ">
					  		<a class="dropdown-toggle" data-bind="click: addNewSession" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					  			<span > Add New Session</span>
					  		</a>
					  	</li>
					</ul>
					<div data-bind="visible: noSession">
						<table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px;">
					        <thead>
					            <tr>
					            	<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
					            	<th style="vertical-align: top;" data-bind="text: lang.lang.employee"></th>
					            	<th style="vertical-align: top;" data-bind="text: lang.lang.start"></th>
					            	<th style="vertical-align: top;" data-bind="text: lang.lang.end"></th>
					            	<th style="vertical-align: top;" data-bind="text: lang.lang.status"></th>
					            	<th style="vertical-align: top;" data-bind="text: lang.lang.action"></th>
					            </tr>
					        </thead>
					        <tbody data-role="listview" 
				        		data-template="session-list-template" 
				        		data-auto-bind="true"
				        		data-bind="source: sessionDS"></tbody>
					    </table>
					    
					</div>
					<div data-bind="invisible: noSession" style="display: none;">
						<table class="table table-bordered table-primary table-striped table-vertical-center">
					        <thead>
					            <tr>
					                <th class="center" style="width: 50px;"><span data-bind="text: lang.lang.no_">No.</span></th>
					                <th><span data-bind="text: lang.lang.currency">Currency</span></th>
					                <th><span data-bind="text: lang.lang.amount">Amount</span></th>
					            </tr> 
					        </thead>
					        <tbody data-role="listview" 
				        		data-template="cashier-session-template" 
				        		data-auto-bind="false"
				        		data-bind="source: cashierItemDS"></tbody>
					    </table>
					    <span class="btn btn-icon btn-primary glyphicons ok_2" style="width: 135px;float: left; margin-bottom: 0px;" data-bind="click: addSession"><i></i><span data-bind="text: lang.lang.add">Save</span></span>
					    <span data-bind="click: backSession" class="btn btn-icon btn-primary glyphicons remove_2" style="background: red;width: 135px;float: left; margin-bottom: 0px;"><i></i><span data-bind="text: lang.lang.cancel">Cancel</span></span>
					</div>
				</div>
			</div>

			<div class="span12" style="margin-top: 20px;">
				<p data-bind="text: today"></span>
			</div>
		</div>
	</div>
</script>
<!-- Reconcile -->
<script id="Reconcile" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style=" margin-top: 15px;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>	
					</div>
			        <h2 style="margin-bottom: 10px;" data-bind="text: lang.lang.reconcile">Reconcile</h2>
			        <br>
			        <div class="row-fluid" style="position: relative;">
			        	<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
							<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
						</div>
			        	<div class="row" style="padding: 0;margin: 0;position: absolute;left:0;top:0;width: 100%;height: 100%;background: #fff;z-index: 999;" data-bind="visible: noSession">
							<table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px;">
						        <thead>
						            <tr>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.employee"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.start"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.end"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.action"></th>
						            </tr>
						        </thead>
						        <tbody data-role="listview" 
					        		data-template="session-list-template" 
					        		data-auto-bind="false"
					        		data-bind="source: sessionDS"></tbody>
						    </table>
						</div>
			        	<div class="row" style="padding: 0px;margin: 0;">
		        			<div class="span3" style="padding-left: 0;">
			        			<table class="table table-bordered table-primary table-striped table-vertical-center" >
			        				<thead>
			        					<tr>
			        						<th colspan="2" style="background: #fefefe;color: #000;border: 1px solid #ccc;" >
			        							ប្រាក់ដើមគ្រា
			        						</th>
			        					</tr>
			        				</thead>
			        				<tbody 
			        					data-role="listview" 
			        					data-bind="source: startAR" 
			        					data-template="reconcile-start-list">
			        				</tbody>
			        			</table>
			        		</div>
			        		<div class="span3" style="">
			        			<table class="table table-bordered table-primary table-striped table-vertical-center" >
			        				<thead>
			        					<tr>
			        						<th colspan="2" style="background: #fefefe;color: #000;border: 1px solid #ccc;" >
			        							ប្រាក់ទទួលមិនទាន់អាប់
			        						</th>
			        					</tr>
			        				</thead>
			        				<tbody 
			        					data-role="listview" 
			        					data-bind="source: receiveNoChangeAR" 
			        					data-template="reconcile-receivenochange-list">
			        				</tbody>
			        			</table>
			        		</div>
			        		<div class="span3" style="">
			        			<table class="table table-bordered table-primary table-striped table-vertical-center" >
			        				<thead>
			        					<tr>
			        						<th colspan="2" style="background: #fefefe;color: #000;border: 1px solid #ccc;" >
			        							ប្រាក់អាប់
			        						</th>
			        					</tr>
			        				</thead>
			        				<tbody 
			        					data-role="listview" 
			        					data-bind="source: changeAR" 
			        					data-template="reconcile-change-list">
			        				</tbody>
			        			</table>
			        		</div>
			        		<div class="span3" style="padding-left: 0;">
			        			<table class="table table-bordered table-primary table-striped table-vertical-center" >
			        				<thead>
			        					<tr>
			        						<th colspan="2" style="background: #fefefe;color: #000;border: 1px solid #ccc;" >
			        							សមតុលសាច់ប្រាក់ក្នុងរបាយការណ៍
			        						</th>
			        					</tr>
			        				</thead>
			        				<tbody 
			        					data-role="listview"
			        					data-bind="source: receiveAR" 
			        					data-template="reconcile-recieve-list">
			        				</tbody>
			        			</table>
			        		</div>
		        		</div>
						<div class="row" style="padding: 0;margin: 0;">
							<table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px;">
						        <thead>
						            <tr>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.currency"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.note"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.unit"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.amount"></th>
						            </tr>
						        </thead>
						        <tbody data-role="listview" 
					        		data-template="reconcile-list-template" 
					        		data-auto-bind="false"
					        		data-bind="source: noteDS"></tbody>
						    </table>
						    <button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>
						</div>
		        		<div class="row" style="padding: 0px;margin: 0;margin-top: 20px;">
		        			<div class="span4" style="padding-left: 0;">
			        			<table class="table table-bordered table-primary table-striped table-vertical-center" >
			        				<thead>
			        					<tr>
			        						<th colspan="2" style="background: #fefefe;color: #000;border: 1px solid #ccc;" >
			        							សមតុលសាច់ប្រាក់ជាក់ស្តែង
			        						</th>
			        					</tr>
			        				</thead>
			        				<tbody 
			        					data-role="listview"
			        					data-bind="source: actualCountDS" 
			        					data-template="reconcile-actualcount-list">
			        				</tbody>
			        				<tfoot>
			        					<tr>
			        						<td colspan="2" style="text-align: center;background: #91268f;">
			        							<span data-bind="text: actualAmount" style="color: #fff;font-weight: bold;font-size: 18px;"></span>
			        						</td>
			        					</tr>
			        				</tfoot>
			        			</table>
			        		</div>
			        		<div class="span4" style="">
			        			<table class="table table-bordered table-primary table-striped table-vertical-center" >
			        				<thead>
			        					<tr>
			        						<th colspan="2" style="background: #fefefe;color: #000;border: 1px solid #ccc;" >
			        							សមតុលសាច់ប្រាក់រាប់ជាក់ស្តែង
			        						</th>
			        					</tr>
			        				</thead>
			        				<tbody 
			        					data-role="listview" 
			        					data-bind="source: actualDS" 
			        					data-template="reconcile-actual-list">
			        				</tbody>
			        				<tfoot>
			        					<tr>
			        						<td colspan="2" style="text-align: center;background: #91268f;">
			        							<span data-bind="text: countAmount" style="color: #fff;font-weight: bold;font-size: 18px;"></span>
			        						</td>
			        					</tr>
			        				</tfoot>
			        			</table>
			        		</div>
			        		<div class="span4" style="padding-right: 0;" >
			        			<table class="table table-bordered table-primary table-striped table-vertical-center" >
			        				<thead>
			        					<tr>
			        						<th colspan="2" style="background: #fefefe;color: #000;border: 1px solid #ccc;" >
			        							ផ្ទៀងផ្ទាត់
			        						</th>
			        					</tr>
			        				</thead>
			        				<tbody >
			        					<tr data-bind="visible: haveDef">
			        						<td colspan="2" style="text-align: center;" data-bind="style: { backgroundColor: defBG}">
			        							<p style="color: #fff;margin: 0;">ចំនួនខុសសរុប ៖ <span style="font-weight: bold;font-size: 18px;" data-bind="text: deferentAmount"></span></p>
			        						</td>
			        					</tr>
			        					<tr data-bind="invisible: haveDef">
			        						<td colspan="2">
			        							<p style="font-weight: bold;font-size: 18px;color: lightgreen;">
			        								ត្រឹមត្រូវ
			        							</p>
			        						</td>
			        					</tr>
			        				</tbody>
			        				<tfoot data-bind="visible: haveDef">
			        					<tr>
			        						<td colspan="2"  >
			        							<input data-role="dropdownlist"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   style="width: 100%;" 
								                   data-auto-bind="false"
								                   data-bind="value: accountSelect,
								                              source: accountDS"
								                   data-option-label="Select Accounting..." />
			        						</td>
			        					</tr>
			        				</tfoot>
			        			</table>
			        		</div>
			        	</div>
			        </div>
			        <div class="box-generic bg-action-button" data-bind="invisible: noSession" style="margin-top: 15px;">
						<div id="ntf1" data-role="notification"></div>
				        <div class="row">
							<div class="col-sm-12" align="right">
								<span class="btn-btn" style="float: left;" data-bind="click: saveDraft" ><i></i> 
									<span data-bind="text: lang.lang.save_draft">Record</span>
								</span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 15px; float: left; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span >Reconcile Option</span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" >
						  					<span data-bind="click: saveClose">Reconcile Close</span>
						  				</li>
						  				<li id="savePrint">
						  					<span >Reconcile Print</span>
						  				</li>
						  				<li id="savePrint">
						  					<span >Reconcile and Transfer</span>
						  				</li>
						  			</ul>
							  	</span>
								<span class="btn-btn" style="float: right;" data-bind="click: cancel" ><i></i> 
									<span data-bind="text: lang.lang.cancel"></span>
								</span>
							</div>
						</div>
					</div>
				</div>						
			</div>
		</div>
	</div>				  	
</script>
<!-- <script id="session-list-template" type="text/x-kendo-template">
    <tr>
		<td style="border-left: 0; border-bottom: 0;">
			#:banhji.Reconcile.sessionDS.indexOf(data)+1#
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			<a href="\\#/reconcile/#= id#">#: employee#</a>
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			#: kendo.toString(new Date(start_date), "dd-MMMM-yyyy", "km-KH")#
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			#if(end_date != "0000-00-00 00:00:00"){#
				#: kendo.toString(new Date(end_date), "dd-MMMM-yyyy", "km-KH")#
			#}#
		</td>
		<td style="border-left: 0; border-bottom: 0; text-align: center;">
			#if(status == 1){#
				<span style="cursor: pointer; margin-top: 3px;" title="Finish" class="btn-action glyphicons ok_2 btn-success"><i></i></span> Done
			#}else if(status == 2){#
				<a style="cursor: pointer;" class="btn-action glyphicons btn-success" href="\\#/reconcile/#= id # ">Save Draft</a>
			#}else{#
				<a style="cursor: pointer;" href="\\#/reconcile/#= id # ">Reconcile</a>
			#}#
			<a style="cursor: pointer;" class="btn-action glyphicons pencil btn-success" href="\\#/reconcile/#= id # "><i></i></a>
		</td>
	</tr>
</script> -->
<script id="reconcile-list-template" type="text/x-kendo-template">
    <tr>
		<td style="border-left: 0; border-bottom: 0;">
			#if(banhji.Reconcile.noteDS.indexOf(data) > 0){#
				<i style="cursor: pointer;" class="icon-trash" data-bind="events: {click: removeRow}" ></i>
			#}#
			#:banhji.Reconcile.noteDS.indexOf(data)+1#
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			<input type="text" 
				data-role="combobox" 
				data-bind="source: currencyAR, value: currency, events: {change: onChange}" 
				data-text-field="code" 
				data-value-field="locale">
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			<input 
				type="number" 
				class="k-textbox" 
				data-role="numerictextbox" 
				data-format="n0" 
				data-min="0" 
				data-spinners="false" 
				data-bind="value: note, events: {change: onChange}" 
				style="padding-right: 10px;display: inline-block; text-align: right; height: 28px; border: none; width: 168px !important;">
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			<input 
				type="number" 
				class="k-textbox" 
				data-role="numerictextbox" 
				data-format="n0" 
				data-min="0" 
				data-spinners="false" 
				data-bind="value: unit, events: {change: onChange}" 
				style="padding-right: 10px;text-align: right; display: inline-block; height: 28px; border: none; width: 168px !important;">
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			<input 
				type="number" 
				data-role="numerictextbox" 
				data-format="n" data-min="0" 
				data-spinners="false" 
				data-bind="value:total" 
				disabled="disabled" 
				style="padding-right: 10px;text-align: right; display: inline-block; border: none; width: 168px !important;">
		</td>
	</tr>
</script>
<script id="reconcile-start-list" type="text/x-kendo-template">
	<tr>
		<td width="100">#=currency#</td>
		<td style="text-align: right;">#=amount#</td>
	</tr>
</script>
<script id="reconcile-receivenochange-list" type="text/x-kendo-template">
	<tr>
		<td width="100">#= currency#</td>
		<td style="text-align: right;">#=amount#</td>
	</tr>
</script>
<script id="reconcile-change-list" type="text/x-kendo-template">
	<tr>
		<td width="100">#= currency#</td>
		<td style="text-align: right;">#=amount#</td>
	</tr>
</script>
<script id="reconcile-cash-list" type="text/x-kendo-template">
	<tr>
		<td width="100">#=code#</td>
		<td>#=total#</td>
	</tr>
</script>
<script id="reconcile-recieve-list" type="text/x-kendo-template">
	<tr>
		<td width="100">#=code#</td>
		<td>#=amount#</td>
	</tr>
</script>
<script id="reconcile-actual-list" type="text/x-kendo-template">
	<tr>
		<td width="100">#=code#</td>
		<td><p data-bind="text: amount"></p></td>
	</tr>
</script>
<script id="reconcile-actualcount-list" type="text/x-kendo-template">
	<tr>
		<td width="100">#= currency#</td>
		<td style="text-align: right;"><p data-bind="text: amount"></p></td>
	</tr>
</script>
<!-- Template -->
<script id="cashier-session-template" type="text/x-kendo-template">
	<tr>
		<td>
			#:banhji.Index.cashierItemDS.indexOf(data)+1#	
		</td>
		<td>
			<p> #: currency# </p>
		</td>
		<td>
			<input style="text-align: right;" id="numeric" class="k-formatted-value k-input" type="number" value="17" min="0" data-bind="value: amount" step="1" />
		</td>
	</tr>
</script>
<script id="session-list-template" type="text/x-kendo-template">
    <tr>
		<td style="border-left: 0; border-bottom: 0;">
			#:banhji.Index.sessionDS.indexOf(data)+1#
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			<a href="\\#/reconcile/#= id#">#: employee#</a>
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			#: kendo.toString(new Date(start_date), "dd-MMMM-yyyy", "km-KH")#
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			#if(end_date != "0000-00-00 00:00:00"){#
				#: kendo.toString(new Date(end_date), "dd-MMMM-yyyy", "km-KH")#
			#}#
		</td>
		<td style="border-left: 0; border-bottom: 0; text-align: center;">
			#if(status == 1){#
				 Done
			#}else if(status == 2){#
				Already Save in Draft
			#}else{#
				Not yet Reconcile
			#}#
		</td>
		<td style="border-left: 0; border-bottom: 0; text-align: center;">
			#if(status == 2){#
				<a style="cursor: pointer;" href="\\#/reconcile/#= id # ">Edit</a>
			#}else if(status == 0){#
				<a style="cursor: pointer;padding: 5px;background: red; color: \\#fff;" href="\\#/reconcile/#= id # ">Reconcile</a> | 
				<a style="cursor: pointer;padding: 5px;background: green; color: \\#fff;" data-bind="click: selectSession">Continue</a>
			#}#
		</td>
	</tr>
</script>