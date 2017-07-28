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
				<li><a href="#" data-bind="click: checkRole"><img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png" style="height: 40px;"></a></li>
			</ul>
			<form class="navbar-form pull-left">
				<div class="btn-group">
				  	<a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
				    	<i class="icon-th"></i>
				    	<!-- <span class="caret"></span> -->
				  	</a>
				  	<!-- <ul class="dropdown-menu">
				    	<li data-bind="click: searchContact"><a href="#"><i class="icon-user"></i> Contact</a></li>
				    	<li data-bind="click: searchTransaction"><a href="#"><i class="icon-random"></i> Transaction</a></li>
				    	<li data-bind="click: searchItem"><a href="#"><i class="icon-th-list"></i> Item</a></li>
				  	</ul> -->
				</div>
			  	<input type="text" class="span2 search-query" placeholder="Search" id="search-placeholder" 
			  			data-bind="value: searchText" 
			  			style="background-color: #555555; color: #ffffff; border-color: #333333; height: 22px;">
			  	<button type="submit" class="btn btn-inverse" data-bind="click: search"><i class="icon-search"></i></button>
			</form>
			<ul class="topnav" id="secondary-menu">
			</ul> 
			<ul class="topnav pull-right">
				<li role="presentation" class="dropdown">
			  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="icon-th-list"></i></a>
		  			<ul class="dropdown-menu ul-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">  				  				
		  			</ul>
			  	</li>
			  	<li>
			  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
			  			<i class="icon-question icon-question1"></i>
			  		</a>
			  		<ul class="dropdown-menu" style="width: 408px !important; left: -293px !important; padding-bottom: 0; border: none;">
			  			<div class="top-help" style="background: #fff; padding: 10px 20px 20px; text-align: left; display: inline-block; width: 100%;">
			  				<h3 style="margin-bottom: 12px;">Help</h3>
			  				<div class="row-fluid">
				        		<div class="span12" style="padding: 0;">
									<select data-role="multiselect"
										    data-value-primitive="true"
										    data-header-template="contact-header-tmpl"
										    data-item-template="contact-list-tmpl"
										    data-value-field="id"
										    data-text-field="name"
										    data-bind="value: obj.contactIds, 
										   			source: contactDS"
										    data-placeholder="Search for an app..."
										    style="width: 77%; float: left;" /></select>
									<button type="button" data-role="button" data-bind="click: search" style="float: left; width: 35px; margin-left: 8px; height: 30px;"><i class="icon-search"></i></button>
								</div>
							</div>
			  			</div>
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
			  			<div class="bottom-help" style="background: #fff; padding: 20px 20px 20px; text-align: left; display: inline-block; width: 100%;">
			  				<h3 style="float: left; margin-right: 10px;">Direct Chat by</h3>
			  				<div class="fb-messengermessageus" 
					            messenger_app_id="1301847836514973"
					            page_id="862386433857166"
					            color="blue"
					            width="180"
					            size="standard" style="float: left; margin-top: 6px;"></div>
			  			</div>
			  		</ul>
			  	</li>
				<li role="presentation" class="dropdown">
			  		<a style="color: #fff;" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">[<span data-bind="text: getUsername"></span>]</a>
		  			<ul class="dropdown-menu">  				  				
		  				<li><a href="#" data-bind="click: lang.changeToKh">ភាសាខ្មែរ</a></li>
    					<li><a href="#" data-bind="click: lang.changeToEn">English</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo base_url(); ?>admin">Setting</a></li>
						<li><a href="#/manage" data-bind="click: logout"><i class="icon-power-off"></i> Logout</a></li> 				
		  			</ul>
			  	</li>				
			</ul>
		</div>
	</div>
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
	<!-- <div  class="row-fluid saleSummaryCustomer">
		<h2 style="margin-top: 120px; float: left;">App Center</h2>
	    <br>
	</div> -->
	<div class="span12">
		<div class="relativeWrap" data-toggle="source-code">
			<div class="widget widget-tabs widget-tabs-gray report-tab" style="background: #fff; overflow: hidden;">
				<div class="widget-head head-custom" style="height: 50px;">
					<ul>
						<li class="active"><a href="#tab-1" data-toggle="tab"><i></i><span >My Apps</span></a></li>
						<li><a href="#tab-2" data-toggle="tab"><i></i><span >All Apps</span></a></li>
					</ul>
				</div>

				<div class="widget-body" style="padding: 20px 0; float: left; width: 100%;">
					<div class="tab-content">
				        <div class="tab-pane active" id="tab-1">
							<div class="row-fluid" style="padding: 0 20px;">
								<div class="row-fluid" style="float: left; background: #ebeef3; padding: 15px 20px 20px; width: 100%;">
					        		<h2>Bring your apps along for the ride</h2>
					        		<p>Connect your apps to get them working together in one place.</p>
					        		<div class="row" style="margin-top: 20px;">
					        			<div class="col-xs-12 col-sm-6 col-md-3">
					        				<a href="#/bill">
					        					<div class="app-recommand " style="height: 200px; text-align: center; width: 100%">
					        						<div class="appIcon">
					        							<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/Utibill.png" />
					        						</div>
					        						<div class="bigappcard-details">
						        						<div class="bigappcard-display-name">
						        							Utibill
						        						</div>
						        						<div class="bigappcard-display-description">
						        							testing testing
						        						</div>
						        					</div>

					        					</div>
					        				</a>
					        			</div>
					        			<div class="col-xs-12 col-sm-6 col-md-3">
					        				<a href="#/rice_mill">
					        					<div class="app-recommand " style="height: 200px; text-align: center; width: 100%">
					        						<div class="appIcon" >
					        							<img src="<?php echo base_url(); ?>assets/rice_mill/ricemill.png" style="width: auto; height: 80px;"/>
					        						</div>
					        						<div class="bigappcard-details">
						        						<div class="bigappcard-display-name">
						        							Rice Mill
						        						</div>
						        						<div class="bigappcard-display-description">
						        							testing testing
						        						</div>
						        					</div>
					        					</div>
					        				</a>
					        			</div>
					        			<div class="col-xs-12 col-sm-6 col-md-3">
					        				<a href="">
					        					<div class="app-recommand " style="height: 200px; text-align: center; width: 100%">
					        						<div class="appIcon" >
					        							<img src="https://images.appcenter.intuit.com/Content/images/AppCards/b7q4xvfdhu/Submitted23/LogoName.png" />
					        						</div>
					        						<div class="bigappcard-details">
						        						<div class="bigappcard-display-name">
						        							Futrli
						        						</div>
						        						<div class="bigappcard-display-description">
						        							testing testing
						        						</div>
						        					</div>
					        					</div>
					        				</a>
					        			</div>
					        			<div class="col-xs-12 col-sm-6 col-md-3">
					        				<a href="">
					        					<div class="app-recommand " style="height: 200px; text-align: center; width: 100%">
					        						<div class="appIcon" >
					        							<img src="https://images.appcenter.intuit.com/Content/images/AppCards/b7q4xvfdhu/Submitted23/LogoName.png" />
					        						</div>
					        						<div class="bigappcard-details">
						        						<div class="bigappcard-display-name">
						        							Futrli
						        						</div>
						        						<div class="bigappcard-display-description">
						        							testing testing
						        						</div>
						        					</div>
					        					</div>
					        				</a>
					        			</div>
					        		</div>
					        	</div>					        	
							</div>
			        	</div>

			        	<div class="tab-pane" id="tab-2">
				        	<div class="row-fluid" style="padding: 0 20px;">
				        		<div class="row-fluid">
					        		<div class="span7" style="padding-left: 5px;">
										<select data-role="multiselect"
											    data-value-primitive="true"
											    data-header-template="contact-header-tmpl"
											    data-item-template="contact-list-tmpl"
											    data-value-field="id"
											    data-text-field="name"
											    data-bind="value: obj.contactIds, 
											   			source: contactDS"
											    data-placeholder="Search for an app..."
											    style="width: 88%; float: left; height: 31px; border-radius: 0;" /></select>
										<button type="button" data-role="button" data-bind="click: search" style="float: left; width: 35px; margin-left: 8px; height: 31px;"><i class="icon-search"></i></button>
									</div>
									<div class="span2"></div>
									<div class="span3" style="padding-right: 5px;">
										<input data-role="dropdownlist"
										    class="sorter"
								            data-value-primitive="true"
								            data-text-field="text"
								            data-value-field="value"
								            data-bind="value: sorter,
								                      source:s sortList,
								                      events: { change: sorterChanges }"
								           	style="width: 100%; float: right;" />
									</div>
								</div>

					        	<!-- <div class="row-fluid" style="margin-top: 20px; float: left; background: #ebeef3; padding: 15px 20px 0; width: 100%;">
					        		<h2>Apps Recommended For You</h2>
					        		<div class="row-fluid" style="margin-top: 20px;">
					        			<div class="wrapper">
					        				<div class="jcarousel-wrapper">
								                <div class="jcarousel">
								                    <ul>
								                        <li><img src="<?php echo base_url(); ?>assets/app_center/img1.jpg" alt="Image 1"></li>
								                        <li><img src="<?php echo base_url(); ?>assets/app_center/img2.jpg" alt="Image 2"></li>
								                        <li><img src="<?php echo base_url(); ?>assets/app_center/img3.jpg" alt="Image 3"></li>
								                        <li><img src="<?php echo base_url(); ?>assets/app_center/img4.jpg" alt="Image 4"></li>
								                        <li><img src="<?php echo base_url(); ?>assets/app_center/img5.jpg" alt="Image 5"></li>
								                        <li><img src="<?php echo base_url(); ?>assets/app_center/img6.jpg" alt="Image 6"></li>
								                    </ul>
								                </div>

								                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
								                <a href="#" class="jcarousel-control-next">&rsaquo;</a>

								                <p class="jcarousel-pagination"></p>
								            </div>
								        </div>
					        		</div>
					        	</div> -->

					        	<div class="row-fluid" style="margin-top: 20px; float: left; background: #ebeef3 ; padding: 15px 20px 15px; width: 100%;">
					        		<h2>Featured</h2>
					        		<div class="row" style="margin-top: 20px;">
					        			<div class="col-xs-12 col-sm-6 col-md-3">
					        				<a data-bind="click: openWindow">
					        					<div class="app-recommand ">
					        						<div class="appIcon">
					        							<img src="https://images.appcenter.intuit.com/Content/images/AppCards/b7q4xvfdhu/Submitted23/LogoName.png" />
					        						</div>
					        						<div class="bigappcard-details">
						        						<div class="bigappcard-display-name">
						        							Futrli
						        						</div>
						        						<div class="bigappcard-vendor-name">
								        					by CrunchBoards
							        					</div>
							        					<div class="bigappcard-tagline">
							        						The all-in-one Forecasting & Reporting Engine
							        					</div>
						        					</div>
						        					
						        					<div class="ratings" style="float: left;">
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="review">
										                    <span class="reviews">(7)</span>
										                </span>
										            </div>
					        					</div>
					        				</a>
					        			</div>
					        			<div class="col-xs-12 col-sm-6 col-md-3">
					        				<a>
					        					<div class="app-recommand ">
					        						<div class="appIcon">
					        							<img src="https://images.appcenter.intuit.com/Content/images/AppCards/b7q4xvfdhu/Submitted23/LogoName.png" />
					        						</div>
					        						<div class="bigappcard-details">
						        						<div class="bigappcard-display-name">
						        							Futrli
						        						</div>
						        						<div class="bigappcard-vendor-name">
								        					by CrunchBoards
							        					</div>
							        					<div class="bigappcard-tagline">
							        						The all-in-one Forecasting & Reporting Engine
							        					</div>
						        					</div>
						        					
						        					<div class="ratings" style="float: left;">
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="review">
										                    <span class="reviews">(7)</span>
										                </span>
										            </div>
					        					</div>
					        				</a>
					        			</div>
					        			<div class="col-xs-12 col-sm-6 col-md-3">
					        				<a>
					        					<div class="app-recommand ">
					        						<div class="appIcon">
					        							<img src="https://images.appcenter.intuit.com/Content/images/AppCards/b7q4xvfdhu/Submitted23/LogoName.png" />
					        						</div>
					        						<div class="bigappcard-details">
						        						<div class="bigappcard-display-name">
						        							Futrli
						        						</div>
						        						<div class="bigappcard-vendor-name">
								        					by CrunchBoards
							        					</div>
							        					<div class="bigappcard-tagline">
							        						The all-in-one Forecasting & Reporting Engine
							        					</div>
						        					</div>
						        					
						        					<div class="ratings" style="float: left;">
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="review">
										                    <span class="reviews">(7)</span>
										                </span>
										            </div>
					        					</div>
					        				</a>
					        			</div>
					        			<div class="col-xs-12 col-sm-6 col-md-3">
					        				<a >
					        					<div class="app-recommand ">
					        						<div class="appIcon">
					        							<img src="https://images.appcenter.intuit.com/Content/images/AppCards/b7q4xvfdhu/Submitted23/LogoName.png" />
					        						</div>
					        						<div class="bigappcard-details">
						        						<div class="bigappcard-display-name">
						        							Futrli
						        						</div>
						        						<div class="bigappcard-vendor-name">
								        					by CrunchBoards
							        					</div>
							        					<div class="bigappcard-tagline">
							        						The all-in-one Forecasting & Reporting Engine
							        					</div>
						        					</div>
						        					
						        					<div class="ratings" style="float: left;">
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="review">
										                    <span class="reviews">(7)</span>
										                </span>
										            </div>
					        					</div>
					        				</a>
					        			</div>
					        		</div>
					        	</div>

					        	<!--First Window -->
							    <div data-role="window" id="appcenter"
							    	data-title="false"
						            data-width="90%"
						            data-height="680"
						            data-resizable= "false"
						            data-actions="{}"
						            data-modal="{mask: 'true'}"
						            data-position="{top: '7%', left: '5%'}"
						            data-bind="visible: windowVisible">

						    		<div class="win-wrapper">
						    			<div class="window-header">
						    				<div class="win-logo" style="width: 60px; height: 60px; background: red; float: left; margin-right: 10px;"></div>
						    				<div class="win-header-title" style="float: left;">
						    					<h2>Office Online</h2>
						    					<span class="win-header-offered-by">offered by banhji.com</span>
						    					<p>
						    						<span class="win-header-rate">
						    							<span class="win-header-averrage-star">(1577)</span>
						    						</span>
						    						<span class="win-header-line-dotted"></span>
						    						<a href="" class="win-header-productivity">Productivity</a>
						    						<span class="win-header-line-dotted"></span>
						    						<span class="win-header-sount-user">2,871,240 users</span>
						    					</p>
						    				</div>
						    				<span style="float: right; margin-top: -5px; cursor: pointer; color: #999; font-weight: 600; font-size: 15px; margin-right: -15px;" data-bind="click: closeWindow" >x</span>
						    				<div class="win-heder-btn" style="float: right;">
						    					<span class="win-header-bth-share">
						    						<a class="glyphicons no-js share_alt win_share_alt">
						    							<i></i>
						    						</a>
						    					</span>
						    					<span class="win-header-bth-plus" style="margin-left: 10px;">
						    						<i class="icon-plus"></i>
						    						<span class="win-header-get-btn" data-bind="click: openWindow1">Get App Now</span>
						    					</span>
						    				</div>
						    			</div>
						    			<div class="window-content">
						    				<div class="row">
							    				<div class="span12" style="width: 96%;">
													<div class="relativeWrap" data-toggle="source-code" style="float: left; width: 100%;">
														<div class="widget widget-tabs widget-tabs-gray report-tab" style="background: #fff; overflow: hidden;">
															<div class="widget-head head-custom" style="height: 50px;">
																<ul>
																	<li class="active"><a href="#tab1-1" data-toggle="tab"><i></i><span >Overview</span></a></li>
																	<li><a href="#tab1-2" data-toggle="tab"><i></i><span >REVIEW</span></a></li>
																	<li><a href="#tab1-3" data-toggle="tab"><i></i><span >RELATED</span></a></li>
																</ul>
															</div>

															<div class="widget-body" style="float: left; width: 97%; padding: 15px;">
																<div class="tab-content">
															        <div class="tab-pane active" id="tab1-1" style="width: 100%; float: left;">
																		<div style="width: 100%; float: left; ">
																			<div class="col-sm-8" style="padding-left: 0; padding-right: 30px;">
																				<div class="win-video" style="width: 100%;">
																					<div id="carousel-1" class="carousel slide" style="margin-bottom: 0;">
																						
																						<ol class="carousel-indicators" style="bottom: 0;">
																							<li data-target="#carousel-1" data-slide-to="0" class="active"></li>
																							<li data-target="#carousel-1" data-slide-to="1"></li>
																							<li data-target="#carousel-1" data-slide-to="2"></li>
																							<li data-target="#carousel-1" data-slide-to="3"></li>
																							<li data-target="#carousel-1" data-slide-to="4"></li>
																						</ol>
																						
																						<div class="carousel-inner">
																						
																							
																							<div class="item active">
																								<img src="http://fpoimg.com/677x405?text=Picture%201">
																								
																							</div>
																							
																							<div class="item">
																								<img src="http://fpoimg.com/677x405?text=Picture%202">
																								
																							</div>
																							
																							<div class="item">
																								<img src="http://fpoimg.com/677x405?text=Picture%203">
																								
																							</div>
																							
																							<div class="item">
																								<img src="http://fpoimg.com/677x405?text=Picture%204">
																								
																							</div>
																							
																							<div class="item">
																								<img src="http://fpoimg.com/677x405?text=Picture%205">
																								
																							</div>
																							

																						</div>																					
																						
																					</div>
																					
																				</div>
																			</div>
																			<div class="col-sm-4" style="padding: 0; width: 30.3%;">
																				<div class="win-widget-Rfirst">
																					<div class="win-title">
																						<p style="margin-bottom: 20px;">Compatible with your device<p>
																					</div>
																					<div class="win-line"></div>
																					<p style="color: #333; font-size: 13px; font-weight: bold; word-wrap: break-word;">
																						View, edit, and create Office files in your browser.
																					</p>
																					<p>
																						Built for Chrome – Use Word, Excel, PowerPoint, OneNote, and Sway Online without needing Office installed.
																					</p>
																					<p>
																						Create with confidence – Use familiar formatting and layout options to express your ideas in full fidelity.
																					</p>
																					<p>
																						Work on the go – Get to your files from anywhere, thanks to integration with OneDrive and OneDrive for Business.
																					</p>
																					<p>
																						Copy and paste conveniently – Use Copy and Paste buttons on the ribbon and right-click menu, or use keyboard shortcuts for copying and pasting.
																					</p>
																					<p>
																						By installing the app, you agree to these terms and conditions: 
																					</p>
																					<p>
																						PLEASE NOTE: Refer to your license terms for Microsoft Office Online software (the "software") to identify the entity licensing this supplement to you and for support information. You may use a copy of this supplement with each validly licensed copy of the software. You may not use the supplement if you do not have a license for the software. The license terms for the software apply to your use of this supplement.
																					</p>
																					<p>
																						Privacy Policy: http://aka.ms/privacy
																					</p>
																				</div>
																				<div class="win-line"></div>
																				<div class="win-widget-Second">
																					<p><a href="">Report Abuse</a></p>
																					<div class="win-title">
																						<p style="margin-bottom: 20px;">Additional Information<p>
																					</div>
																					<p>
																						Version: 1.5.1 <br>
																						Updated: May 10, 2017 <br>
																						Size: 1.08MiB <br>
																						Languages: See all 52
																					</p>
																					<div class="win-title">
																						<p style="margin-bottom: 20px;">Developer<p>
																					</div>
																					<p><a href="">Privacy Policy</a></p>
																				</div>
																			</div>
																		</div>
														        	</div>

														        	<div class="tab-pane" id="tab1-2">
															        	<div style="width: 100%; float: left; ">
															        		<div class="col-sm-8" style="padding-left: 0; padding-right: 30px;">
																				<div class="win-tabTwo-header" style="width: 100%;">
																					<h2>User Reviews</h2>
																					<div class="win-tabTwo-tabMore">
																						<div class="relativeWrap" data-toggle="source-code" style="float: left; width: 100%;">
																							<div class="widget widget-tabs widget-tabs-gray report-tab" style="background: #fff; overflow: hidden;margin-bottom: 0;">
																								<div class="widget-head head-custom" style="height: 20px; padding-right: 0; line-height: 20px;">
																									<ul style="height: 20px !important; line-height: 20px;">
																										<li class="active" style="height: 20px !important; line-height: 20px !important;">
																											<a href="#tab2-1" data-toggle="tab" style="line-height: 20px !important; font-size: 12px; text-transform: capitalize; height: 20px !important;">
																												<i></i><span >Helpful</span>
																											</a>
																										</li>
																										<li style="height: 20px !important; line-height: 20px !important;">
																											<a href="#tab2-2" data-toggle="tab" style="line-height: 20px !important; font-size: 12px; text-transform: capitalize; height: 20px !important;">
																												<i></i><span >Recent</span>
																											</a>
																										</li>
																									</ul>
																								</div>

																							</div>
																						</div>
																					</div>
																				</div>
																				<div class="win-tabTwo-content">
																					<div class="widget-body" style="float: left; width: 97%; padding: 15px;">
																						<div class="tab-content">
																					        <div class="tab-pane active" id="tab2-1" style="width: 100%; float: left;">
																					        	Helpful
																				        	</div>

																				        	<div class="tab-pane" id="tab2-2">
																					        	<div style="width: 100%; float: left; ">
																					        		Recent
																					        	</div>
																				        	</div>

																					    </div>
																					</div>
																				</div>
																			</div>
																			<div class="col-sm-4" style="padding: 0; width: 30.3%;">
																				<h2 style="font-size: 20px; margin: 0 0 10px 0;">Rate this extension</h2>
																				<div class="sign-to-rate">
																					<div class="rsw-stars">
																					</div>
																					<p class="text-sign-to-rate">
																						<a href="" target="_blank">Sign</a> in to rate
																					</p>
																				</div>
																			</div>
															        	</div>
														        	</div>

														        	<div class="tab-pane" id="tab1-3">
															        	<div style="width: 100%; float: left; ">
															        		<h2>Related</h2>
															        		<div class="row">
																        		<div class="col-sm-3">
																					1
																				</div>
																				<div class="col-sm-3">
																					2
																				</div>
																				<div class="col-sm-3">
																					3
																				</div>
																				<div class="col-sm-3">
																					4
																				</div>
																			</div>
															        	</div>
														        	</div>
														        	
															    </div>
															</div>
														</div>
													</div>		
												</div>
											</div>
						    			</div>
						    		</div>
								</div>

								<!--Second Window -->
							    <!-- <div data-role="window"
							    	data-title="false"
							    	data-resizable= "false"
						            data-width="610"
						            data-height="540"
						            data-actions="{}"
						            data-modal="{mask: 'true'}"
						            data-position="{top: '11%', left: '25%'}"
						            data-bind="visible: window1Visible">

						    		<div class="win-wrapper" style="width: 100%;">
						    			<div class="window-header" style="width: 93%;">
						    				<span style="float: right; margin-top: -5px; cursor: pointer; color: #999; font-weight: 600; font-size: 15px; margin-right: -15px;" data-bind="click: closeWindow1" >x</span>
						    				
						    			</div>
						    			<div class="window-content" style="width: 92%;">
						    				<div class="row">
							    				<h1 style="font-size: 25px; text-align: center;">Start using Gusto with QuickBooks</h1>
							    				<p style="text-align: center;">Authorize the Sharing of Your Data Between Gusto and Intuit.</p>
							    				<div class="authorizeSync">
							    					<div id="preAuthContent">
							    						<div class="quickbooksSyncIcon wrapText">
							    							<img class="brandLogo" src="https://images.appcenter.intuit.com/Content/Static/7.12.0-rel-598/images/v2/logo/Logo-Intuit-Auth-0615-2016.png">
							    							<br>
							    							<span class="smallText">Company</span>
							    						</div>
							    						<div class="dashLine">
							    							<span></span>
							    							<span></span>
							    							<span></span>
							    							<span></span>
							    							<span></span>
							    						</div>
							    						<div class="quickbooksSyncIcon wrapText">
							    							<img class="appIcon80" src="https://images.appcenter.intuit.com/Content/images/AppCards/b7pnhdevpa/Submitted46/LogoName.png">
							    							<br>
							    							<span class="smallText">Gusto</span>
							    						</div>
							    						<div class="clear"></div>
							    					</div>
							    				</div>
							    				<div id="authorizeContent">
							    					<span class="termsLinks">
							    						By clicking Authorize, I allow Gusto and Intuit to use my information* in accordance with each company’s respective terms of service and privacy policy Gusto’s
							    						<a target="_new" href="https://gusto.com/terms">Terms of Service</a>
							    						and
							    						<a target="_new" href="https://gusto.com/privacy">Privacy Policy</a>.
							    						Additionally, where applicable, I give Gusto limited access to my QuickBooks Payments account to provide me payments-related services. I authorize the sharing of data between Intuit and Gusto.  *Information may include data from QuickBooks Online, QuickBooks Desktop and QuickBooks Payments.
							    					</span>
							    				</div>
											</div>
						    			</div>
						    			<div class="window-content" style="width: 92%; margin-top: 25px;">
						    				<a data-bind="click: closeWindow1" style="float: left; background: #ddd; color: #fff; padding: 8px 15px; border: 1px solid #333;">
						    					No, thanks
						    				</a>
						    				<a style="float: right; background: blue; color: #fff; padding: 8px 15px;">
						    					Authorize
						    				</a>
						    			</div>
						    		</div>									
								</div> -->

					        	<div class="row-fluid" style="float: left; background: #f7f9fb ; padding: 15px 20px 15px; width: 100%;">
					        		<h2>Newest</h2>
					        		<div class="row" style="margin-top: 20px;">
					        			<div class="col-xs-12 col-sm-6 col-md-3">
					        				<a href="">
					        					<div class="app-recommand ">
					        						<div class="appIcon">
					        							<img src="https://images.appcenter.intuit.com/Content/images/AppCards/b7q4xvfdhu/Submitted23/LogoName.png" />
					        						</div>
					        						<div class="bigappcard-details">
						        						<div class="bigappcard-display-name">
						        							Futrli
						        						</div>
						        						<div class="bigappcard-vendor-name">
								        					by CrunchBoards
							        					</div>
							        					<div class="bigappcard-tagline">
							        						The all-in-one Forecasting & Reporting Engine
							        					</div>
						        					</div>
						        					
						        					<div class="ratings" style="float: left;">
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="review">
										                    <span class="reviews">(7)</span>
										                </span>
										            </div>
					        					</div>
					        				</a>
					        			</div>
					        			<div class="col-xs-12 col-sm-6 col-md-3">
					        				<a href="">
					        					<div class="app-recommand ">
					        						<div class="appIcon">
					        							<img src="https://images.appcenter.intuit.com/Content/images/AppCards/b7q4xvfdhu/Submitted23/LogoName.png" />
					        						</div>
					        						<div class="bigappcard-details">
						        						<div class="bigappcard-display-name">
						        							Futrli
						        						</div>
						        						<div class="bigappcard-vendor-name">
								        					by CrunchBoards
							        					</div>
							        					<div class="bigappcard-tagline">
							        						The all-in-one Forecasting & Reporting Engine
							        					</div>
						        					</div>
						        					
						        					<div class="ratings" style="float: left;">
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="review">
										                    <span class="reviews">(7)</span>
										                </span>
										            </div>
					        					</div>
					        				</a>
					        			</div>
					        			<div class="col-xs-12 col-sm-6 col-md-3">
					        				<a href="">
					        					<div class="app-recommand ">
					        						<div class="appIcon">
					        							<img src="https://images.appcenter.intuit.com/Content/images/AppCards/b7q4xvfdhu/Submitted23/LogoName.png" />
					        						</div>
					        						<div class="bigappcard-details">
						        						<div class="bigappcard-display-name">
						        							Futrli
						        						</div>
						        						<div class="bigappcard-vendor-name">
								        					by CrunchBoards
							        					</div>
							        					<div class="bigappcard-tagline">
							        						The all-in-one Forecasting & Reporting Engine
							        					</div>
						        					</div>
						        					
						        					<div class="ratings" style="float: left;">
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="review">
										                    <span class="reviews">(7)</span>
										                </span>
										            </div>
					        					</div>
					        				</a>
					        			</div>
					        			<div class="col-xs-12 col-sm-6 col-md-3">
					        				<a href="">
					        					<div class="app-recommand ">
					        						<div class="appIcon">
					        							<img src="https://images.appcenter.intuit.com/Content/images/AppCards/b7q4xvfdhu/Submitted23/LogoName.png" />
					        						</div>
					        						<div class="bigappcard-details">
						        						<div class="bigappcard-display-name">
						        							Futrli
						        						</div>
						        						<div class="bigappcard-vendor-name">
								        					by CrunchBoards
							        					</div>
							        					<div class="bigappcard-tagline">
							        						The all-in-one Forecasting & Reporting Engine
							        					</div>
						        					</div>
						        					
						        					<div class="ratings" style="float: left;">
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="fa fa-star"></span>
										                <span class="review">
										                    <span class="reviews">(7)</span>
										                </span>
										            </div>
					        					</div>
					        				</a>
					        			</div>
					        		</div>
					        	</div>

					        	<div class="row-fluid" style="float: left; background: #ebeef3; padding: 15px 20px 0; width: 100%;">
					        		<h2>Collections</h2>
					        		<div class="row">
					        			<div class="collection">
						        			<ul>
						        				<li class="col-xs-12 col-sm-4">
						        					<a href="">
						        						<div class="home-bigappcard-class" style="">
						        							<div class="home-bigappcard-inner" style="">
						        								<div class="appIcon-accountant" style="">
						        									<img src="https://css.appcenter.intuit.com/Content/Static/7.11.0-rel-593/images/collection_tile_accountant.png" width="100%">
						        								</div>
						        								<div class="bigappcard-details" style="">
						        									<div class="bigappcard-display-name" style="">
						        										Apps by BanhJi                                
						        									</div>
						        									<div class="bigappcard-tagline" style="">
						        										Key apps that streamline your practice and support your business.
						        									</div>
						        								</div>
						        							</div> 
						        						</div>
						        					</a>
						        				</li>
						        				<li class="col-xs-12 col-sm-4">
						        					<a href="">
						        						<div class="home-bigappcard-class" style="">
						        							<div class="home-bigappcard-inner" style="">
						        								<div class="appIcon-accountant" style="">
						        									<img src="https://css.appcenter.intuit.com/Content/Static/7.11.0-rel-593/images/collection_tile_accountant.png" width="100%">
						        								</div>
						        								<div class="bigappcard-details" style="">
						        									<div class="bigappcard-display-name" style="">
						        										Apps by Industry                              
						        									</div>
						        									<div class="bigappcard-tagline" style="">
						        										Key apps that streamline your practice and support your business.
						        									</div>
						        								</div>
						        							</div> 
						        						</div>
						        					</a>
						        				</li>
						        				<li class="col-xs-12 col-sm-4">
						        					<a href="">
						        						<div class="home-bigappcard-class" style="">
						        							<div class="home-bigappcard-inner" style="">
						        								<div class="appIcon-accountant" style="">
						        									<img src="https://css.appcenter.intuit.com/Content/Static/7.11.0-rel-593/images/collection_tile_accountant.png" width="100%">
						        								</div>
						        								<div class="bigappcard-details" style="">
						        									<div class="bigappcard-display-name" style="">
						        										Apps by Function                                
						        									</div>
						        									<div class="bigappcard-tagline" style="">
						        										Key apps that streamline your practice and support your business.
						        									</div>
						        								</div>
						        							</div> 
						        						</div>
						        					</a>
						        				</li>
						        			</ul>
						        		</div>
					        		</div>
					        	</div>
					        </div>
			        	</div>
			        	
				    </div>
				</div>
			</div>
		</div>		
	</div>		
</script>




<!-- #############################################
##################################################
#	APP CENTER VIEW 					 		#
##################################################
############################################## -->


<script id="riceMill" type="text/x-kendo-template">
	<img style="margin-bottom: 5px; width: 200px;" src="<?php echo base_url(); ?>assets/rice_mill/ricemill_logo.png" >
	<div class="row-fluid" >
		<div class="col-xs-12 col-sm-12 col-md-5" style="padding-left: 0;">
			<div class="cash-bg" style="margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; ">
				
				<div class="" style="padding-left: 0; text-align: center; width: 20%; float: left; margin-right: 15px">
					<a href="#/grn">
						<img title="Add Goods Received Note" src="<?php echo base_url();?>/assets/rice_mill/grn.png" style="width: 98%; float: left;"  />
						<span data-bind="text: lang.lang.goods_received_note"  style=" text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block; font-size: 12px;"></span>
					</a>
				</div>

				<div class="" style="padding-left: 0; text-align: center; width: 20%; float: left; margin-right: 15px">
					<a href="#/purchase">
						<img title="Add Purchase" src="<?php echo base_url(); ?>assets/rice_mill/purchase.png"  style="width:98%; float: left; "  />
						<span data-bind="text: lang.lang.purchase" style="text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block; font-size: 12px;">Readings</span>
					</a>
				</div>

				<div class="" style="padding-left: 0; text-align: center; width: 20%; float: left; margin-right: 15px;">
					<a href="#/cash_payment">
						<img title="Add Cash Payment" src="<?php echo base_url(); ?>assets/rice_mill/cash_payment.jpg" style="width: 98%; float: left;"  />
						<span data-bind="text: lang.lang.cash_payment" style=" text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block; font-size: 12px;">Run Bill</span>
					</a>
				</div>

				<div class="" style="padding-left: 0; text-align: center; width: 20%; float: left; margin-bottom: 15px;">
					<a href="#/internal_usage">
						<img title="Add Internal Usage" src="<?php echo base_url();?>/assets/rice_mill/internal_usage.png" style="width: 98%; float: left;"  />
						<span data-bind="text: lang.lang.app_internal_usage"  style=" text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;font-size: 12px;"></span>
					</a>
				</div>

				<div class="" style="padding-left: 0; text-align: center; width: 20%; float: left; margin-right: 15px;">
					<a href="#/invoice">
						<img title="Add Invoice" src="<?php echo base_url(); ?>assets/rice_mill/invoice.png" style="width: 98%; float: left;"  />
						<span data-bind="text: lang.lang.invoice" style="text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;font-size: 12px;">Print Bill</span>
					</a>
				</div>
			
				<div class="" style="padding-left: 0; text-align: center; width: 20%; float: left; margin-right: 15px;">
					<a href="#/cash_receipt">
						<img title="Add Cash Receipt" src="<?php echo base_url(); ?>assets/rice_mill/cash_receipt.png" style="width: 98%; float: left;"  />
						<span data-bind="text: lang.lang.cash_receipt"  style=" text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;font-size: 12px;">Receipt</span>
					</a>
				</div>

				
				
			</div>

			<div class="cash-bg" style="margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
	    		<a href="#/cash_movement">
					<div class="cash-invoice" style="background: #eac654; color: #fff; margin-bottom: 0;">
						<div class="span6" style="padding-left: 0;">
							<span style="font-size: 20px; color: #333">Cash Position</span>
							<br>
							<span style="color: #9EA7B8;" data-bind="text: totalUser"></span>
						</div>
						<div class="span6" style=" text-align: center; font-size: 20px; font-weight: 600; padding: 0;">
							<span style="float: right; color: #333" >1000</span>
						</div>
						<!-- <div class="span3" style="text-align: center; margin-top: 7px; padding-right: 0; color: #fff; font-size: 35px;">
							<span data-bind="text: totalUser"></span>
						</div> -->					
					</div>
				</a>
				<!-- <a href="#/">
					<div class="cash-invoice" style=" background: #24351b; color: #fff;">
						<div class="span7" style="padding-left: 0;">
							<span style="font-size: 15px; color: #fff;">Amount to Collect</span><br>
							<span style="color: #9EA7B8;" ></span>
						</div>
						<div class="span5" style="color: #fff; text-align: center; font-size: 15px; font-weight: 600; padding: 0;">
							<span style="float: right;" >1000</span>
						</div>									
					</div>
				</a>
				<a href="#/">
					<div class="cash-invoice" style="margin-bottom: 0; background: #24351b; color: #fff;">
						<div class="span6" style="padding-left: 0;">
							<span style="font-size: 15px; color: #fff;">Amount to Pay</span><br>
							<span style="color: #9EA7B8;" > </span>
						</div>
						<div class="span6" style="color: #fff; text-align: center; font-size: 15px; font-weight: 600; padding: 0;">
							<span style="float: right;" >1000</span>
						</div>									
					</div>
				</a> -->
	    	</div>

	    	<div class="cash-bg" style="margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
		    	<div class="row-fluid">
		    		<div class="col-xs-12 col-sm-6 col-md-12" style="padding: 0">
						<div class="widget widget-3 customer-border" style="margin-bottom: 0;">
							<div class="widget-body alert alert-primary" style="min-height: 135px; background: #eac654; color: #333; padding-top: 10px; padding-bottom: 10px; margin-bottom: 0;">
								<div align="center" class="text-large strong" style="font-size: 25px;">
									<span data-bind="text: ccc"></span>
									<br>
									<p style="font-size: 14px" data-bind="text: lang.lang.cash_conversion_cycle">Cash Conversion Cycle</p>
								</div>
								<table width="100%">
									<tbody>
										<tr align="center" style="vertical-align: top;">
											<td width="33%">										
												<span style="font-size: 18px;" data-bind="text: arCollectionPeriod"></span>
												<br>
												<span style="font-size: 12px;" data-bind="text: lang.lang.receivable_collection_days"></span>
											</td>
											<td width="33%">
												<span style="font-size: 18px;" data-bind="text: apPaymentPeriod"></span>
												<br>
												<span style="font-size: 12px;" data-bind="text: lang.lang.payable_payment_days"></span>
											</td>
											<td width="33%">
												<span style="font-size: 18px;" data-bind="text: inventoryTurnOver"></span>
												<br>
												<span style="font-size: 12px;" data-bind="text: lang.lang.inventory_turnover_days"></span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>									
						</div>
					</div>
					<!-- <div class="col-xs-12 col-sm-6 col-md-12" style="padding: 0;">
						<div class="widget widget-3 customer-border" style="margin-bottom: 0;">					
							<div class="widget-body alert-info" style="min-height: 135px; background: #eac654; color: #333; padding-top: 10px; padding-bottom: 10px; ">
								<div align="center" class="text-large strong" style="font-size: 25px;">
									<span data-bind="text: currentRatio"></span>
									<br>
									<p style="font-size: 14px" data-bind="text: lang.lang.current_ratio">Current Ratio</p>
								</div>
								<table width="100%">
									<tbody>
										<tr align="center" style="vertical-align: top;">
											<td width="33%">										
												<span style="font-size: 18px;" data-bind="text: quickRatio"></span>
												<br>
												<span style="font-size: 12px;" data-bind="text: lang.lang.quick_ratio"></span>
											</td>
											<td width="33%">
												<span style="font-size: 18px;" data-bind="text: cashRatio"></span>
												<br>
												<span style="font-size: 12px;" data-bind="text: lang.lang.cash_ratio"></span>
											</td>
											<td width="33%">
												<span style="font-size: 18px;" data-bind="text: wcSale"></span>
												<br>
												<span style="font-size: 12px;" data-bind="text: lang.lang.working_capital_to_sale_ratio"></span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>										
						</div>				
					</div> -->
				</div>
	    	</div>
		</div>

	    <div class="col-xs-12 col-sm-12 col-md-7" style="padding-left: 0;">
	    	<div class="cash-bg" style="margin-bottom: 15px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
	    		<div class="row-fluid" >
					<div class="span4">
						<a href="#/customer_balance_summary">
							<div class="widget-body alert alert-primary sale-overview" style="background: #4f961f; border: none; padding: 30px 15px!important;">
								<h2 style="color: #fff !important;" data-bind="text: lang.lang.receivable"></h2>
								<div align="center" class="text-large strong" data-bind="text: obj.ar"></div>
								<!-- <table width="100%">
									<tr align="center">
										<td width="33%" style="vertical-align: top">										
											<span data-bind="text: obj.ar_open"></span>
											<br>
											<span><span data-bind="text: lang.lang.open"></span></span>
										</td>
										<td width="33%" style="vertical-align: top">
											<span data-bind="text: obj.ar_customer"></span>
											<br>
											<span><span data-bind="text: lang.lang.customers"></span></span>
										</td>
										<td width="33%" style="vertical-align: top">
											<span data-bind="text: obj.ar_overdue"></span>
											<br>
											<span><span data-bind="text: lang.lang.overdue"></span></span>
										</td>
									</tr>
								</table> -->
							</div>
						</a>						
					</div>

					<div class="span4">
						<a href="#/suppliers_balance_summary">
							<div class="widget-body alert alert-primary sale-overview" style="background: #4f961f; border: none; padding: 30px 15px!important;">
								<h2 style="color: #fff !important;" data-bind="text: lang.lang.payables"></h2>
								<div align="center" class="text-large strong" data-bind="text: obj.ap"></div>
								<!-- <table width="100%">
									<tr align="center">
										<td>
											<span data-bind="text: obj.ap_open"></span>
											<br>
											<span><span data-bind="text: lang.lang.open"></span></span>
										</td>
										<td>
											<span data-bind="text: obj.ap_supplier"></span>
											<br>
											<span><span data-bind="text: lang.lang.supplier"></span></span>
										</td>
										<td>
											<span data-bind="text: obj.ap_overdue"></span>
											<br>
											<span><span data-bind="text: lang.lang.overdue"></span></span>
										</td>
									</tr>
								</table> -->
							</div>
						</a>						
					</div>

					<div class="span4">
						<a href="#/inventory_position_summary">
							<div class="widget-body alert alert-primary sale-overview" style="background: #4f961f; border: none; padding: 30px 15px!important;">
								<h2 style="color: #fff !important;" data-bind="text: lang.lang.inventory_value">Inventory Value</h2>
								<div align="center" class="text-large strong" data-bind="text: obj.inventory_value"></div>
								<!-- <table width="100%">
									<tr align="center">
										<td>
											<span data-bind="text: obj.gross_profit_margin"></span>
											<br>
											<span data-bind="text: lang.lang.average_margin"></span>
										</td>
										<td>
											<span data-bind="text: obj.inventory_turnover_day"></span>
											<br>
											<span data-bind="text: lang.lang.turnover_days"></span>
										</td>
									</tr>
								</table> -->
							</div>
						</a>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<table class="table table-bordered table-primary table-striped table-vertical-center" style="font-size: 12px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; margin-bottom: 0;">
					        <thead>
					            <tr>
					                <th class="center" colspan="2" style="background: #4f961f;"><span data-bind="text: lang.lang.top_5_ar_balance"></span></th>				                			                
					            </tr>					        
					        </thead>
					        <tbody data-role="listview"
					        	 data-auto-bind="false"				        	                  
				                 data-template="customerDashBoard-top-ar-template"
				                 data-bind="source: topARDS"></tbody>			        
					    </table>
					</div>
					<div class="span4">
						<table class="table table-bordered table-primary table-striped table-vertical-center" style="font-size: 12px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; margin-bottom: 0;">
					        <thead>
					            <tr>
					                <th style="background: #4f961f;" class="center" colspan="2"><span data-bind="text: lang.lang.top_5_ap_balance"></span></th>
					            </tr>
					        </thead>
					        <tbody data-role="listview"
					        	 data-auto-bind="false"
				                 data-template="vendorDashboard-top-ap-template"
				                 data-bind="source: topAPDS"></tbody>
					    </table>
					</div>
					<div class="span4">
						<table class="table table-bordered table-primary table-striped table-vertical-center" style="font-size: 12px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; margin-bottom: 0;">
					        <thead>
					            <tr>
					                <th style="background: #4f961f;" colspan="2" class="center"><span data-bind="text: lang.lang.top_5_purchased_products"></span></th>				                			                
					            </tr>
					        </thead>
					        <tbody data-role="listview"
					        	 data-auto-bind="false"
				                 data-template="itemDashboard-top-purchase-product-template"
				                 data-bind="source: topPurchaseProductDS"></tbody>
					    </table>
					</div>
				</div>
	    	</div>

	    	<div class="row-fluid" style="margin-top: 5px;">
				<div class="span12" style="width: 100%; padding: 0 5px;">
					<div class="home-chart" style="    padding: 6px 15px 6px 20px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
						
						<div data-role="chart"
							 data-auto-bind="false"
			                 data-legend="{ position: 'top' }"
			                 data-series-defaults="{ type: 'column' }"
			                 data-tooltip='{
			                    visible: true,
			                    format: "{0}%",
			                    template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
			                 }'                 
			                 data-series="[
			                                 { field: 'cash_in', name: 'Cash In', categoryField:'month', color: '#24351b', overlay:{ gradient: 'none'}  },
			                                 { field: 'cash_out', name: 'Cash Out', categoryField:'month', color: '#54833b' , overlay:{ gradient: 'none'} }
			                             ]"	                             
			                 data-bind="source: graphDS"
			                 style="height: 240px;" ></div>
			           
					</div>
				</div>
			</div>
	   </div>


	   <a href="https://m.me/coderexample">
		    Message us on Facebook
		 </a>

	</div>
</script>

<script id="riceReportCenter" type="text/x-kendo-template" >
	<div class="row-fluid">
		<div class="span12">
			<div class="span4 report-module">
				<img style="margin-bottom: 5px; width: 200px; float: left;" src="http://192.168.88.100/c2/assets/rice_mill/ricemill_logo.png">
				<h2 style="float: left; font-family: 'Open Sans', sans-serif; margin: 24px 0 0 7px ;font-weight: 400; color: #4f961f; font-size: 26px; text-transform: uppercase;" data-bind="text: lang.lang.reports">REPORTS</h2>
				<p style="float: left; width:100%; margin: 0 0 10px; line-height: normal;" data-bind="text: lang.lang.rice_report_center_description">					
				</p>
			</div>
			<div class="span8">				
			</div>
		</div>	

		<div class="span12" style="margin-top: 20px;">
			<div class="relativeWrap" data-toggle="source-code">
				<div class="widget widget-tabs widget-tabs-gray report-tab" style="padding-bottom: 20px; background: #fff; overflow: hidden;">
					<div class="widget-head head-custom" style="height: 50px; background: #4f961f !important;">
						<ul>
							<li class="active"><a href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.customer"></span></a></li>
							<li><a href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.supplier"></span></a></li>
							<li><a href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.products_services"></span></a></li>
							<li><a href="#tab-4" data-toggle="tab"><i></i><span data-bind="text: lang.lang.cash"></span></a></li>
							<li><a href="#tab-5" data-toggle="tab"><i></i><span data-bind="text: lang.lang.period_end"></span></a></li>
							<li><a href="#tab-6" data-toggle="tab"><i></i><span data-bind="text: lang.lang.financial_statements"></span></a></li>
						</ul>
					</div>

					<div class="widget-body">
						<div class="tab-content">
					        <div class="tab-pane active" id="tab-1">
								<div class="row-fluid">
									<div class="row-fluid sale-report rice-report">
										<h2 data-bind="text: lang.lang.sale_managment_reports" style="text-transform: uppercase;"></h2>
										<p data-bind="text: lang.lang.the_following_reports_provide">
											The following reports provide summary and detailed reports in 
											different ways to help analyze your revenue performance.
										</p>
										<div class="row-fluid">
											<table class="span12" style="margin-top: 10px;">
												<tr>
													<td class="span4">
														<h3 ><a href="#/sale_summary_by_customer" data-bind="text: lang.lang.sale_summary_by_customer" style="text-transform: capitalize;"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer" style="text-transform: capitalize;"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/customer_transaction_list" data-bind="text: lang.lang.customer_transaction_list" style="text-transform: capitalize;"></a></h3>
													</td>
												</tr>

												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.summarizes_total_sales">
															Summarizes total sales for each customer within a period 
															of time so you can see which ones generate the most revenue for you.
														</p>									
													</td>
													<td class="span4" style="vertical-align: top;">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_sale">
															Lists individual sale transactions by date for each customer with a period of time.
														</p>
													</td>
													<td class="span4" >
														<p data-bind="text: lang.lang.list_of_all_transactions_related">
															List of all transactions related to and grouped by each customer, including invoice, cash sale
														</p>
													</td>
												</tr>

												<tr>
													<td class="span4">
														<h3><a href="#/sale_summary_by_product" data-bind="text: lang.lang.sale_summary_by_product_services" style="text-transform: capitalize;"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_services" style="text-transform: capitalize;"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/deposit_detail_by_customer" data-bind="text: lang.lang.deposit_detail_by_customer" style="text-transform: capitalize;"></a></h3>
													</td>
												</tr>

												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.summarizes_total_sales_for_each_product">
															Summarizes total sales for each product/ service within a period of time. In addition, it also includes gross profit margin, quantity, amount, cost, and average prices. 
														</p>
													</td>
													<td class="span4" style="vertical-align: top;">
														<p data-bind="text: lang.lang.lists_individual_sale_transactions">
															Lists individual sale transactions by date for each product/ service with a period of time.
														</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.provides_detailed_information_about_customer_deposit">
															Provides detailed information about customer deposit for specific order, prepayment, or credit.
														</p>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<h3><a href="#/sale_order_list" data-bind="text: lang.lang.sale_order_list" style="text-transform: capitalize;"></a></h3>
													</td>
													<td class="span4"></td>
													<td class="span4"></td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;"></p>
													</td>
													<td class="span4"></td>
													<td class="span4"></td>
												</tr>


												<!-- <tr>
													<td class="span4" ><h3><a href="#/deposit_detail_by_customer" data-bind="text: lang.lang.deposit_detail_by_customer"></a></h3></td>
													<td class="span4" ><h3><a href="#/customer_transaction_list" data-bind="text: lang.lang.customer_transaction_list"></a></h3></td>
													<td class="span4" ><h3><a href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer"></a></h3></td>
												</tr>												
												<tr>
													<td class="span4" ><p style="padding-right: 25px;">Provides detailed information about customer deposit for specific order, prepayment, or credit.</p></td>													
													<td class="span4" ><p style="padding-right: 25px;">List of all transactions related to and grouped by each customer, including invoice, cash sale</p></td>
													<td class="span4" ><p>Lists individual sale transactions by date for each customer with a period of time.</p></td>
												</tr>

												<tr>
													<td class="span4" ><h3><a href="#/sale_summary_by_customer" data-bind="text: lang.lang.sale_summary_by_customer"></a></h3></td>
													<td class="span4" ><h3><a href="#/sale_summary_by_product" data-bind="text: lang.lang.sale_summary_by_product_Services"></a></h3></td>
													<td class="span4" ><h3><a href="#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_Services"></a></h3></td>
												</tr>												
												<tr>
													<td class="span4" ><p style="padding-right: 25px;">Summarizes total sales for each customer within a period of time so you can see which ones generate the most revenue for you.</p></td>
													<td class="span4" ><p style="padding-right: 25px;">Summarizes total sales for each product/ service within a period of time. In addition, it also includes gross profit margin, quantity, amount, cost, and average prices.</p></td>
													<td class="span4" ><p>Lists individual sale transactions by date for each product/ service with a period of time.</p></td>
												</tr>

												<tr>
													<td class="span4" ><h3><a href="#/sale_job_engagement" data-bind="text: lang.lang.sale_by_job_engagement"></a></h3></td>
													<td class="span4" ><h3><a href="#/sale_order_list" data-bind="text: lang.lang.sale_order_list"></a></h3></td>
												</tr> -->												
											</table>
										</div>
									</div>

									<div class="row-fluid recevable-report rice-report" style="margin-top: 15px; display: inline-block;">
										<h2 data-bind="text: lang.lang.receivable_management_reports" style="text-transform: uppercase;"></h2>
										<p data-bind="text: lang.lang.the_following_reports_provide_summary">
											The following reports provide summary and detailed reports.
										</p>
										<div class="row-fluid">
											<table class="span12" >
												<tr>
													<td class="span4">
														<h3><a href="#/customer_balance_summary" data-bind="text: lang.lang.customer_balance_summary"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail"></a></h3>								
													</td>
													<td class="span4">
														<h3><a href="#/customer_list" data-bind="text: lang.lang.customer_list"></a></h3>
													</td>
												</tr>
												<tr>													
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.show_each_customers_total_outstanding_balances">
															Show each customer’s total outstanding balances.
														</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_unpaid_invoices_for_each_customer">Lists all unpaid invoices, grouped by Due today and Overdue.</p>
													</td>
													<td class="span4">													
														<p data-bind="text: lang.lang.list_of_all_active_customers">
															List of all active customers
														</p>													
													</td>													
												</tr>
												<tr>
													<td class="span4">
														<h3><a href="#/receivable_aging_summary" data-bind="text: lang.lang.receivable_aging_summary"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/receivable_aging_detail" data-bind="text: lang.lang.receivable_aging_detail"></a></h3>
													</td>
													<td class="span4" >
														<h3><a href="#/invoice_list" data-bind="text: lang.lang.invoice_list"></a></h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_all_unpaid_invoices1">
															Lists all unpaid invoices for the current period, 30, 60, 90, and more than 90 days, grouped by individual customers.
														</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_unpaid_invoices_grouped_by_customer">Lists individual unpaid invoices, grouped by customer. This includes due date, outstanding days (aging days), and amount.</p>
													</td>
													<td class="span4" >
														<p data-bind="text: lang.lang.shows_a_chronological_list_of_all_your_invoices_for_a_selected_date_range">
															Shows a chronological list of all your invoices for a selected date range.
														</p>													
													</td>
												</tr>
												<tr>
													<td class="span4">
														<h3><a href="#/collect_invoice" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/collection_report" data-bind="text: lang.lang.collection_report"></a></h3>
													</td>
													<td class="span4"></td>
												</tr>
												<tr>
													<td class="span4">
														<p data-bind="text: lang.lang.lists_all_unpaid_invoices_grouped_by_due_today_and_overdue">
															Lists individual unpaid invoices for each customer
														</p>														
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_of_collected_invoices_for_the_select_period_of_time_group_by_method_of_payment">
															Lists of collected invoices for the select period of time, group by method of payment.
														</p>														
													</td>
													<td class="span4">
													</td>
												</tr>


												<!-- <tr>
													
																										
																			
												</tr>
												<tr>
													
												
													
													
													
												</tr>
												<tr>
													
													
																										
													
													
												</tr>
												<tr>
																										
													
													<td class="span4" >
														<p>Lists individual unpaid invoices for each customer</p>
													</td>
												</tr>

												<tr>
													<td class="span4" >
														<h3><a href="#/customer_balance_summary" data-bind="text: lang.lang.customer_balance_summary"></a></h3>
													</td>
													
												</tr>
												
													
												</tr> -->

											</table>
										</div>
									</div>
									
									<div class=" span12  recevable-report rice-report" style="margin-top: 15px; display: inline-block; padding-left: 0;">
										<h2 data-bind="text: lang.lang.other_reports_lists"></h2>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4" >
														<h3><a href="#/customer_recurring" data-bind="text: lang.lang.recurring_customer_template_list"></a></h3>
													</td>
													<td class="span4" >
														<h3><a href="#/customer_setting" data-bind="text: lang.lang.payment_method_term_list"></a></h3>								
													</td>
													<td class="span4"></td>						
												</tr>
												<tr>
													<td class="span4">																				
													</td>
													<td class="span4" >
															List the types of payments and the term that determine due date for payment from customers.
														
													</td>
													<td class="span4"></td>															
												</tr>
											</table>
										</div>
									</div>
								</div>
				        	</div>

				        	<div class="tab-pane" id="tab-2">
					        	<div class="row-fluid">
					        		<div class="row-fluid sale-report rice-report">
										<h2 data-bind="text: lang.lang.expense_purchase_management_reports" style="text-transform: uppercase;"></h2>
										<p data-bind="text: lang.lang.the_following_reports_provide_summary_and_detailed_reports">
											The following reports provide summary and detailed reports in different ways to help analyze what 
											you spent and their impact on your cash flow and performance. 
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/expenses_purchase_summary_supplier" data-bind="text: lang.lang.expenses_purchase_summary_by_supplier"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/expenses_purchase_detail_supplier" data-bind="text: lang.lang.expeneses_purchase_detail_by_suppplier"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/suppliers_transaction_list" data-bind="text: lang.lang.suppliers_transaction_list"></a></h3>								
													</td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.summarizes_total_expenses_purchase_for_each">
															Summarizes total expenses/ purchase for each suppliers within a period of time.
														</p>																												
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_expenses_purchase_transactions_by">
															Lists individual expenses/ purchase transactions by date for each supplier within a period of time.
														</p>														
													</td>
													<td class="span4">
														<p data-bind="text: lang.lang.lists_of_all_transactions_related_to_and_grouped_by_each_suppliers">
															Lists of all transactions related to and grouped by each suppliers
														</p>													
													</td>
												</tr>
												<tr>
													<td class="span4">
														<h3><a href="#/purchase_summary_product_services" data-bind="text: lang.lang.purchase_summary_by_product_services"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/purchase_detail_product_services" data-bind="text: lang.lang.purchase_detail_by_product_services"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/deposit_detail_supplier" data-bind="text: lang.lang.deposit_detail_by_supplier"></a></h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.summarizes_total_expenses_purchase_for_each">
															Summarizes total expenses/ purchase for each product/ service within a period of time.
														</p>														
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_sale_transactions_by_date_for_each_product">
															Lists individual sale transactions by date for each product/ service with a period of time.
														</p>													
													</td>
													<td class="span4">
														<p data-bind="text: lang.lang.provides_detailed_information_about_supplier_deposit">
															Provides detailed information about supplier deposit for specific order, prepayment, or credit.
														</p>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<h3><a href="#/open_purchase_order" data-bind="text: lang.lang.open_purchase_order"></a></h3>
													</td>
													<td class="span4"></td>
													<td class="span4"></td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_all_the_open_purchase_order_grouped_by_suppliers">
															Lists all the open purchase order grouped by suppliers including the original amount as well.
														</p>														
													</td>
													<td class="span4"></td>
													<td class="span4"></td>
												</tr>
											</table>
										</div>
									</div>

									<div class="row-fluid recevable-report rice-report" style="margin-top: 15px; display: inline-block;">
										<h2 data-bind="text: lang.lang.payable_management_reports"></h2>
										<p data-bind="text: lang.lang.the_following_reports_provide_summary_and_detailed_reports">
											The following reports provide summary and detailed reports.
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/suppliers_balance_summary" data-bind="text: lang.lang.suppliers_balance_summary"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/suppliers_balance_detail" data-bind="text: lang.lang.suppliers_balance_detail"></a></h3>								
													</td>
													<td class="span4">
														<h3><a href="#/bill_payment_list" data-bind="text: lang.lang.bill_payment_list"></a></h3>
													</td>																			
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.show_each_supplier_total_outstanding_balances">
															Show each supplier’s total outstanding balances.
														</p>														
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_unpaid_bill_for_each_supplier">
															Lists individual unpaid bill for each supplier
														</p>													
													</td>
													<td class="span4">
														<p data-bind="text: lang.lang.lists_of_paid_bills_for_the_select_period_of_time_group_by_method_of_payments">
															Lists individual unpaid bills, grouped by suppliers. This includes due date, outstanding days (aging days), and amount.
														</p>														
													</td>																										
												</tr>												
												<tr>
													<td class="span4">
														<h3><a href="#/payables_aging_summary" data-bind="text: lang.lang.payables_aging_summary"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/payables_aging_detail" data-bind="text: lang.lang.payables_aging_detail"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/list_bills_paid" data-bind="text: lang.lang.list_of_bills_to_be_paid"></a></h3>
													</td>													
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_all_unpaid_bills_for_the_current_period_30_60_90_and_more">
															Lists all unpaid bills for the current period, 30, 60, 90, and more than 90 days, grouped by individual suppliers.
														</p> 														
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_unpaid_bills_grouped_by_suppliers_this_includes">
															Lists all unpaid invoices, grouped by Due today and Overdue.
														</p>
													</td>
													<td class="span4">
														<p data-bind="text: lang.lang.lists_of_paid_bills_for_the_select_period_of_time_group_by_method_of_payments">
															Lists of paid bills for the select period of time, group by method of payments.
														</p>													
													</td>
													
												</tr>						

											</table>
										</div>
									</div>

									<div class="row-fluid recevable-report rice-report">
										<h2 data-bind="text: lang.lang.other_reports_lists"></h2>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<!-- <td class="span4">
														<h3><a href="#/product_service_list">Product/ Service List</a></h3>
													</td> -->
													<td class="span4">
														<h3><a href="#/supplier_list" data-bind="text: lang.lang.supplier_list"></a></h3>								
													</td>
													<td class="span4">
														<h3><a href="#/customer_recurring" data-bind="text: lang.lang.recurring_supplier_template_list"></a></h3>								
													</td>
													<td class="span4">
													</td>						
												</tr>
												<tr>
													<!-- <td class="span4">
														Lists the products and services you purchase. The following information is included: name, 
															description, cost, sales price, and quantity on hand.
													</td> -->
													<td class="span4">
														<p data-bind="text: lang.lang.lists_of_all_active_suppliers">
															Lists of all active suppliers
														</p>
													</td>
													<td class="span4">
													</td>
													<td class="span4">
													</td>						
												</tr>												
											</table>
										</div>
									</div>
					        	</div>
				        	</div>

				        	<div class="tab-pane" id="tab-3">
					        	<div class="row-fluid">
					        		<div class="row-fluid sale-report rice-report">
										<h2 data-bind="text: lang.lang.inventory_position" style="text-transform: uppercase;"></h2>
										<p data-bind="text: lang.lang.the_following_reports_provide_summary_and_detailed_reports_on_the_position_of_inventory">
											The following reports provide summary and detailed reports on the position of inventory. 
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/inventory_position_summary" data-bind="text: lang.lang.inventory_position_summary"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/inventory_position_detail" data-bind="text: lang.lang.inventory_position_detail"></a></h3>
													</td>
													<td class="span4"></td>						
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.summarizes_each_inventory_balance_by_quantity_on_hand">
															Summarizes each inventory balance by quantity on hand, on purchase order and sale order. In addition, it also includes average cost and price.
														</p> 
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_inventory_movement_transactions_by_date_for_each_inventory_within_a_period_of_time">
															Lists individual inventory movement transactions by date for each inventory within a period of time.
														</p>
													</td>
													<td class="span4"></td>
												</tr>
												<!-- <tr>													
													<td class="span4">
														<h3><a href="#/inventory_turnover_list">Inventory Turnover List</a></h3>
													</td>
												</tr>
												<tr>													
													<td class="span4">
														Provides analysis of inventory turnover days by each inventory.
													</td>
												</tr> -->
											</table>
										</div>
									</div>

									<div class="row-fluid recevable-report rice-report" style="margin-top: 15px; display: inline-block;">
										<h2 data-bind="text: lang.lang.inventory_movement_reports" style="text-transform: uppercase;"></h2>
										<p data-bind="text: lang.lang.the_following_reports_provide_summary_and_detailed_reports_on_the_movement_of_the_inventories">
											The following reports provide summary and detailed reports on the movement of the inventories
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/purchase_summary_product_services" data-bind="text: lang.lang.purchase_summary_by_product_services""></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/purchase_detail_product_services" data-bind="text: lang.lang.purchase_detail_by_product_services"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/sale_summary_by_customer" data-bind="text: lang.lang.sale_by_customer_summary"></a></h3>
													</td>					
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">Lists all inventory purchases from each suppliers</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;">Lists all inventory sold to each customer</p>
													</td>
													<td class="span4">
														<p >Lists of detailed inventory sale transactions to each customer</p>
													</td>
												</tr>
												
												<tr>													
													<td class="span4">
														<h3><a href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_by_customer_detail"></a></h3>
													</td>
													<td class="span4"></td>
													<td class="span4"></td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">Lists of detailed inventory purchase transactions from each suppliers</p>
													</td>
													<td class="span4"></td>
													<td class="span4"></td>
												</tr>
												
											</table>
										</div>
									</div>
									<!-- <div class="span12 recevable-report" style="margin-top: 15px; display: inline-block; padding-left: 0;">
										<h2>OTHER REPORTS/ LISTS</h2>
										<p>
											The following reports provide summary and detailed reports on the movement of the inventories
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/inventory_list">Inventory List</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/">Recurring Inventory Template List</a></h3>
													</td>
													<td class="span4">								
													</td>						
												</tr>
												<tr>
													<td class="span4">
														Lists the products you purchase and sold. The following information is included: name, description, cost, sales price, and quantity on hand.		
													</td>
													<td class="span4">								
													</td>
													<td class="span4">								
													</td>
												</tr>
												
											</table>
										</div>
									</div> -->
					        	</div>
				        	</div>

				        	<div class="tab-pane" id="tab-4">
				        		<!-- <div align="center" style="min-height: 150px;">
				        			<h1 style="font-style: 30px; margin-top: 20px;">Coming Soon</h1>
				        		</div> -->
				        		<div class="row-fluid">
									<div class="row-fluid sale-report rice-report" style="margin-top: 15px;">
										<h2 data-bind="text: lang.lang.cash_position" style="text-transform: uppercase;"></h2>
										<p>
											The following reports provide summary and detailed reports on your cash position and related cash transactions.  
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/cash_movement" data-bind="text: lang.lang.cash_movement"></a></h3>
													</td>													
													<td class="span4">
														<h3><a href="#/collection_report" data-bind="text: lang.lang.cash_collection_report"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/bill_payment_list" data-bind="text: lang.lang.bill_payment_report"></a></h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">List of detail movement transaction by each Cash & Cash Equivalent accounts</p> 
													</td>
													<td class="span4">
														<p style="padding-right: 25px;">Lists of collected invoices for the select period of time, group by method of payment.</p>
													</td>
													<td class="span4">
														<p>Lists of paid bills for the select period of time, group by method of payments.</p>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<h3><a href="#/cash_advance_report" data-bind="text: lang.lang.cash_advance"></a></h3>
													</td>	
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">List of detail movement transaction by each Cash Advance accounts</p>
													</td>
												</tr>
											</table>					
										</div>
									</div>									
					        	</div>						        	
					        	<!-- <div class="row-fluid">
									<div class="row-fluid sale-report" style="margin-top: 15px;">
										<h2>CASH POSITION</h2>
										<p>
											The following reports provide summary and detailed reports on employee related transactions.  
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/cash_position_report">Cash Position Report</a></h3>
													</td>
													<td class="span4">
														<h3>Cash Payment Report (Coming Soon)</h3>
													</td>
													<td class="span4">
														<h3>Cash Receipt Report (Coming Soon)</h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														Summarizes each inventory balance by quantity on hand, on purchase order and sale order. In addition, it also includes average cost and price. 
													</td>
													<td class="span4">
														Lists of all transactions related to and grouped by each inventory with analysis of average gross profit margin.
													</td>
													<td class="span4">
														Lists individual inventory movement transactions by date for each inventory within a period of time.
													</td>
												</tr>
												<tr>													
													<td class="span4">
														<h3>Reconciliation Report (Coming Soon)</h3>
													</td>
												</tr>
												<tr>													
													<td class="span4">
														List of all cash related reconciliation reports.
													</td>
												</tr>
											</table>					
										</div>
									</div>									
					        	</div> -->
				        	</div>

				        	<div class="tab-pane" id="tab-5">
					        	<div class="row-fluid">
					        		<div class="row-fluid sale-report rice-report">
										<h2 data-bind="text: lang.lang.period_end_closing_reports"></h2>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/journal_report" data-bind="text: lang.lang.journal_entry_report"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/general_ledger" data-bind="text: lang.lang.general_ledger"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/trial_balance" data-bind="text: lang.lang.trial_balance"></a></h3>
													</td>					
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">Lists all accounting transactions within a period of time into debits and credits and displays them chronologically.</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;">Groups all accounting transactions by each account in your chart of accounts within a period of time into debits, credits, and balances.</p>
													</td>
													<td class="span4">
														<p >Summarizes each account balance on your chart of accounts in the format of debit and credit within a period of time</p>
													</td>
												</tr>

												<!-- <tr>
													<td class="span4">
														<h3><a href="#/transaction_list_date">Transaction List by Date</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/recent_transactions_list">Recent Transactions List</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/">Period-End Closing Checklist</a></h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														This is similar with journal entry; however, it does not include debit and credit. In addition, it includes not financial transactions, such as sale order or purchase order.
													</td>
													<td class="span4">
														Lists all transaction recorded or edited within the last five days.
													</td>
													<td class="span4">
														
													</td>
												</tr> -->
											</table>
										</div>
									</div>									
					        	</div>

					        	<div class="span12 recevable-report rice-report" style="margin-top: 15px; display: inline-block; padding-left: 0;">
										<h2 data-bind="text: lang.lang.other_reports_lists"></h2>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/chart_of_account" data-bind="text: lang.lang.chart_of_account"></a></h3>
													</td>
													<td class="span4"></td>
													<td class="span4"></td>
													<!-- <td class="span4">
														<h3><a href="#/audit_trial_report">Audit Trial Report</a></h3>								
													</td>
													<td class="span4">
														<h3><a href="#/recurring_journal_list">Recurring Journal List</a></h3>							
													</td>	 -->					
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">Lists of all accounts with name, type, and balance.</p>
													</td>
													<td class="span4"></td>
													<td class="span4"></td>
												</tr>
												<!-- <tr>
													<td class="span4">
														<h3><a href="#/">Realized Exchange Gains & Losses</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/">Unrealized Exchange Gains & Losses</a></h3>							
													</td>						
												</tr>
												<tr>
													<td class="span4">
														This detailed report lists foreign transactions that are closed (referred to as realized gains and losses) and totals the gains and losses due to changes in exchange rates.
													</td>
													<td class="span4">
														This summary report lists your foreign accounts and calculates the potential gain or loss for each account.
													</td>							
												</tr>			 -->									
											</table>
										</div>
									</div>

				        	</div>

				        	<div class="tab-pane" id="tab-6">
					        	<div class="row-fluid">

									<div class="row-fluid recevable-report rice-report" style="margin-top: 15px;">
										<h2 data-bind="text: lang.lang.financial_statements"></h2>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/statement_profit_loss" data-bind="text: lang.lang.statement_of_profit_or_loss"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/statement_financial_position" data-bind="text: lang.lang.statement_of_financial_position"></a></h3>								
													</td>
													<td class="span4">
														<!-- <h3><a href="#/statement_profit_loss_comparison">Statement of Profit or Loss Comparison</a></h3> -->
													</td>					
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">Provides the progress of your company’s financial performance, summarized in a record of income generated and expenses incurred over a given period.</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;">Provides the snapshot of your company’s financial position on value and ownership. It is the relationship of the company’s assets, liabilities and equities as of a specific date.</p>
													</td>
													<td class="span4">
														<!-- Shows a year-over-year comparison of your financial performance. -->
													</td>													
												</tr>
												<!-- <tr>
													<td class="span4">
														<h3><a href="#/statement_financial_position_comparison">Statement of Financial Position Comparison</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/statement_cash_flow">Statement of Cash Flow</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/statement_changes_equity">Statement of Changes in Equity</a></h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														Shows cash generated by your company operating activities, cash spent on investing in your company assets long term asset, and cash in or out from your own share or financial institutions.
													</td>
													<td class="span4">
														Shows the movement of your paid-up capital, dividends, the effects of changes in accounting policies and corrections of errors recognized in the period, and the profit or loss for a reporting period
													</td>
													<td class="span4">
														Shows a year-over-year comparison of your financial position.
													</td>
												</tr> -->

											</table>
										</div>
									</div>

									

									
					        	</div>
				        	</div>

				        	

					    </div>
					</div>
				</div>
			</div>		
		</div>
	</div>
</script>





<!-- #############################################
##################################################
#	MENU VIEW 					 			 	#
##################################################
############################################## -->
<script id="accountingMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/accounting' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/accounting_center' style="color: #fff;">CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>  	
  				<li><a href='#/account'><span data-bind="text: lang.lang.add_account"></span></a></li>
  				<li><a href='#/segment'><span data-bind="text: lang.lang.add_segment"></span></a></li>  				
  				<li><a href='#/fixed_assets'><span data-bind="text: lang.lang.add_fixed_assets"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li><a href='#/journal'><span data-bind="text: lang.lang.make_journal"></span></a></li>
  				<li><a href='#/cash_transaction'><span data-bind="text: lang.lang.make_cash_transaction"></span></a></li>
  				<li><a href='#/cash_advance'><span data-bind="text: lang.lang.make_cash_advance"></span></a></li>
  				<li><a href='#/expense'><span data-bind="text: lang.lang.make_expense"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li><a href='#/txn_item_list'><span >Transaction Item List</span></a></li>
  				<li><a href='#/fixed_asset_item_list'><span >Fixed Asset Item List</span></a></li> 		
  				<li><a href='#/currency_rate'><span data-bind="text: lang.lang.set_exchange_rate"></span></a></li>
  				<li><a href='#/accounting_recurring'><span data-bind="text: lang.lang.accounting_recurring_list"></span></a></li>
  				<li><a href='#/chart_of_account'><span data-bind="text: lang.lang.chart_of_account"></span></a></li>
  				 				
  				<li><a href='#/imports'><span ></span>Imports</a></li> 			  				 		
  			</ul>
	  	</li>	  	  	
	  	<li><a href='#/accounting_report_center' style="color: #fff;">REPORTS</a></li>	  	
	  	<li><a href='#/accounting_setting' class='glyphicons settings'><i></i></a></li>	  				
	</ul>
</script>
<script id="employeeMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/employees' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/employee_center' style="color: #fff;">CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/employee'>New Employee</a></li>  				  				
  				<li><a href='#/cash_advance'>Cash Advance</a></li>
  				<li><a href='#/expense'>Expense</a></li>  				 				 				  				 				
  			</ul>
	  	</li>	  	  	
	  	<li><a href='#/employee_report_center' style="color: #fff;">REPORTS</a></li>	  	
	  	<li><a href='#/employees_setting' class='glyphicons settings'><i></i></a></li>	  	
	</ul>
</script>
<script id="vendorMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/vendors' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/vendor_center' style="color: #fff;">CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/vendor'><span data-bind="text: lang.lang.add_supplier"></span></a></li>
  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory"></span></a></li>
  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
  				<li><a href='#/fixed_assets'><span data-bind="text: lang.lang.add_fixed_assets"></span></a></li>
  				<li><a href="#/txn_item"><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>
  				<li> <span class="li-line"></span></li>			  				
  				<li  style="padding-top: 10px;"><a href='#/purchase_order'><span data-bind="text: lang.lang.make_purchase_order"></span></a></li>
  				<li><a href='#/vendor_deposit'><span data-bind="text: lang.lang.make_vendor_deposit"></span></a></li>
  				<li><a href='#/grn'><span data-bind="text: lang.lang.make_goods_received_note"></span></a></li> 
  				<li><a href='#/purchase'><span data-bind="text: lang.lang.make_purchase"></span></a></li>  		
  				<li><a href='#/purchase_return'><span data-bind="text: lang.lang.make_purchase_return"></span></a></li>  		
  				<li><a href='#/cash_payment'><span data-bind="text: lang.lang.make_cash_payment"></span></a></li>
  				<li><a href='#/payment_refund'><span >Make Payment Refund</span></a></li>
  				<li> <span class="li-line"></span></li> 		
  				<li><a href='#/vendor_recurring'><span data-bind="text: lang.lang.supplier_recurring_list"></span></a></li>  			 				  				 				
  				<li><a href='#/imports'><span ></span>Imports</a></li>
  			</ul>
	  	</li>	  	  	
	  	<li><a href='#/vendor_report_center' style="color: #fff;">REPORTS</a></li>	  	
	  	<li><a href='#/vendor_setting' class='glyphicons settings'><i></i></a></li>	  	
	</ul>
</script>
<script id="customerMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/customers' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/customer_center'><span data-bind="text: lang.lang.center" style="color: #fff;"></span></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/customer'><span data-bind="text: lang.lang.add_customer"></span></a></li> 
  				<li ><a href='#/job'><span data-bind="text: lang.lang.add_job"></span></a></li>
  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory"></span></a></li>
  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
  				<li ><a href="#/txn_item"><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li style="padding-top: 10px;"><a href='#/quote'><span data-bind="text: lang.lang.create_quotation"></span></a></li>  				
  				<li><a href='#/sale_order'><span data-bind="text: lang.lang.create_sale_order"></span></a></li>
  				<li><a href='#/gdn'><span data-bind="text: lang.lang.create_goods_delivery_note"></span></a></li>
  				<li><a href='#/customer_deposit'><span data-bind="text: lang.lang.create_customer_deposit"></span></a></li>
  				<li><a href='#/cash_sale'><span data-bind="text: lang.lang.create_cash_sale"></span></a></li>  
  				<li><a href='#/invoice'><span data-bind="text: lang.lang.create_invoice"></span></span></a></li>
  				<li><a href='#/cash_receipt'><span data-bind="text: lang.lang.create_cash_receipt"></span></span></a></li>
  				<li><a href='#/sale_return'><span data-bind="text: lang.lang.create_sale_return"></span></a></li>
  				<li><a href='#/statement'><span data-bind="text: lang.lang.create_statement"></span></a></li> 
  				<li><a href='#/cash_refund'><span >Create Cash Refund</span></a></li> 
  				<li> <span class="li-line"></span></li> 				
  				<li><a href='#/customer_recurring'><span data-bind="text: lang.lang.customer_recurring_list"></span></a></li>  				 				  				 				
  				<li><a href='#/imports'><span ></span>Imports</a></li>
  			</ul>
	  	</li>	  	  	
	  	<li><a href="#/customer_report_center" style="color: #fff;">Reports</a></li>	  	
	  	<li><a href='#/customer_setting' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>
<script id="cashMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/cashs' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/cash_center' style="color: #fff;">CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>  				  				
  				<li><a href='#/quote'>Add Quote</a></li>  				
  				<li><a href='#/sale_order'>Add Sale Order</a></li>
  				<li><a href='#/gdn'>Add Goods Delivery Note</a></li>
  				<li><a href='#/customer_deposit'>Deposit</a></li>
  				<li><a href='#/cash_sale'>Cash Sale</a></li>  				
  				<li><a href='#/invoice'><span data-bind="text: lang.invoice"></span></a></li>
  				<li><a href='#/statement'>Statement</a></li>
  				<li><a href='#/cash_receipt'>Receive Payment</a></li>
  				<li><a href="#/customerInvoiceSent">Invoice Sent To</a></li>
  				<li><a href='#/customer'>Add <span data-bind="text: lang.new_customer"></span></a></li>
  				<li><a href='#/imports'><span ></span>Imports</a></li>				  				 				
  			</ul>
	  	</li>	  	  	
	  	<li><a href='#/cash_report_center' style="color: #fff;">REPORTS</a></li>	  	
	  	<li><a href='#/cash_setting' class='glyphicons settings'><i></i></a></li>	  		  	
	</ul>
</script>
<script id="inventoryMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/inventories' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/item_center' style="color: #fff;">CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
  				<!-- <li ><a href="#/txn_item"><span data-bind="text: lang.lang.add_transaction_item"></span></a></li> -->
  				<li><a href='#/item_assembly'><span data-bind="text: lang.lang.build_assembly"></span></a></li>  
  				<li><a href='#/item_catalog'><span data-bind="text: lang.lang.add_new_catalog"></span></a></li>
  				<li> <span class="li-line"></span></li> 
  				<li><a href='#/grn'><span data-bind="text: lang.lang.add_received_note"></span></a></li>
  				<li><a href='#/gdn'><span data-bind="text: lang.lang.add_delivery_note"></span></a></li>
  				<li><a href='#/item_adjustment'><span data-bind="text: lang.lang.create_item_adjustment"></span></a></li>
  				<li><a href='#/internal_usage'><span data-bind="text: lang.lang.create_internal_usage"></span></a></li>
  				<li><span class="li-line"></span></li> 	
  				<li><a href='#/item_recurring'>Inventory Recurring List</a></li>
  				<li><a href='#/imports'><span ></span>Imports</a></li>
  			</ul>
	  	</li>	  	  	
	  	<li><a href='#/item_report_center' style="color: #fff;">REPORTS</a></li>
	  	<li><a href='#/item_setting' class='glyphicons settings'><i></i></a></li>
	</ul>	
</script>
<script id="taxMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/tax' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/journal'>Journal</a></li>
  				<li><a href='#/tax'>Tax</a></li>
  				<li><a href='#/imports'><span ></span>Imports</a></li>
  			</ul>
	  	</li>
	  	<li><a href='#/tax_report_center' style="color: #fff;">REPORTS</a></li>
	  	<li><a href='#/' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>
<script id="saleMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/sales' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/sale_center'><span data-bind="text: lang.lang.center" style="color: #fff;"></span></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/customer'><span data-bind="text: lang.lang.add_customer"></span></a></li> 
  				<li ><a href='#/job'><span data-bind="text: lang.lang.add_job"></span></a></li>	
  				<li><a href='#/item_catalog'><span data-bind="text: lang.lang.add_new_catalog"></span></a></li>
  				<li><a href='#/item_assembly'><span data-bind="text: lang.lang.build_assembly"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li ><a href='#/sale'>Mobile Sale</a></li>
  				<li ><a href='#/quote'><span data-bind="text: lang.lang.create_quotation"></span></a></li>
  				<li><a href='#/sale_order'><span data-bind="text: lang.lang.create_sale_order"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li><a href='#/sale_recurring'>Recurring</a></li>
  				<li><a href='#/imports'><span ></span>Imports</a></li>
  			</ul>
	  	</li>
	  	<li><a href="#/sale_report_center" style="color: #fff;">Reports</a></li>
	</ul>
</script>
<script id="riceMillMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/rice_mill' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a style="color: #fff;" class='dropdown-toggle glyphicons ' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>CENTER<span class='caret'></span></a>
	  		<ul class='dropdown-menu'>
  				<li><a href='#/rice_customer_center'><span >Customer Center</span></a></li> 
  				<li ><a href='#/rice_vendor_center'><span >Supplier Center</span></a></li>	
  				<li><a href='#/rice_item_center'><span >Inventory Center</span></a></li>
  			</ul>
	  	</li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/customer'><span data-bind="text: lang.lang.add_customer"></span></a></li> 
  				<li ><a href='#/job'><span data-bind="text: lang.lang.add_job"></span></a></li>	
  				<li><a href='#/vendor'><span data-bind="text: lang.lang.add_supplier"></span></a></li>
  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory"></span></a></li>
  				<li><a href='#/internal_usage'><span data-bind="text: lang.lang.internal_usage"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li ><a href='#/gdn'><span data-bind="text: lang.lang.create_goods_delivery_note"></span></a></li>
  				<li><a href='#/cash_sale'><span data-bind="text: lang.lang.create_cash_sale"></span></a></li>
  				<li><a href='#/invoice'><span data-bind="text: lang.lang.create_invoice"></span></a></li>
  				<li><a href='#/cash_receipt'><span data-bind="text: lang.lang.create_cash_receipt"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li><a href='#/grn'><span data-bind="text: lang.lang.make_goods_received_note"></span></a></li>
  				<li><a href='#/vendor_deposit'><span data-bind="text: lang.lang.make_vendor_deposit"></span></a></li>
  				<li><a href='#/purchase'><span data-bind="text: lang.lang.make_purchase"></span></a></li>
  				<li><a href='#/cash_payment'><span data-bind="text: lang.lang.make_cash_payment"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li><a href='#/journal'><span data-bind="text: lang.lang.make_journal"></span></a></li>
  				<li><a href='#/cash_transaction'><span data-bind="text: lang.lang.make_cash_transaction"></span></a></li>
  				<li><a href='#/cash_advance'><span data-bind="text: lang.lang.make_cash_advance"></span></a></li>
  				<li><a href='#/expense'><span data-bind="text: lang.lang.make_expense"></span></a></li>  				
  				<li><a href='#/'><span data-bind="text: lang.lang.recurring_list">Recurring List</a></li>
  			</ul>
	  	</li>
	  	<li><a href="#/rice_report_center" style="color: #fff;">Reports</a></li>
	</ul>
</script>


<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
<script>
	localforage.config({
		driver: localforage.LOCALSTORAGE,
		name: 'userData'
	});	
	var banhji = banhji || {};
	var baseUrl = "<?php echo base_url(); ?>";
	var apiUrl = baseUrl + 'api/';
	banhji.s3 = "https://banhji.s3.amazonaws.com/";	
	banhji.token = null;
	banhji.no_image = "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg";

	// custom widget for min and max
	kendo.data.binders.widget.max = kendo.data.Binder.extend({
		init: function(widget, bindings, options) {//call the base constructor
            kendo.data.Binder.fn.init.call(this, widget.element[0], bindings, options);
        },
        refresh: function() {
            var that = this,
            value = that.bindings["max"].get(); //get the value from the View-Model
            $(that.element).data("kendoDatePicker").max(value); //update the widget
        }
    });
    kendo.data.binders.widget.min = kendo.data.Binder.extend({
        init: function(widget, bindings, options) {
            //call the base constructor
            kendo.data.Binder.fn.init.call(this, widget.element[0], bindings, options);
        },
        refresh: function() {
            var that = this,
            value = that.bindings["min"].get(); //get the value from the View-Model
            $(that.element).data("kendoDatePicker").min(value); //update the widget
        }
    });
	// end of custom widget

	banhji.fileManagement = kendo.observable({
        dataSource: new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/attachments',
              type: "GET",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            create  : {
              url: baseUrl + 'api/attachments',
              type: "POST",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            update  : {
              url: baseUrl + 'api/attachments',
              type: "PUT",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            destroy  : {
              url: baseUrl + 'api/attachments',
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
        }),
        fileArray     : [],
        onRemove      : function(e) {
          banhji.fileManagement.dataSource.remove(e.data);
        },
        onSelected    : function(e) {
          var files = e.files;
          var key = 'ATTACH_' + JSON.parse(localStorage.getItem('userData/user')).institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ files[0].name;
          banhji.fileManagement.dataSource.add({
            transaction_id  : 0,
            type            : "Transaction",
            name            : files[0].name,
            contact_id      : null,
            description     : "",
            key             : key,
            url             : "https://s3-ap-southeast-1.amazonaws.com/banhji/"+key,
            created_at      : new Date(),
            file            : files[0].rawFile
          });
        },
        allowSize	  : 0,
        transactionSize: 0,
        contactSize   : 0,
        totalSize 	  : 0,
        transactionNu : 0,
        contactNu 	  : 0,
        save                : function(contact_id){
          $.each(banhji.fileManagement.dataSource.data(), function(index, value){ 
            banhji.fileManagement.dataSource.at(index).set("transaction_id", contact_id);
            if(!value.id){
              var params = { 
                Body: value.file, 
                Key: value.key
              };
              bucket.upload(params, function (err, data) {
                  // console.log(err, data);
                  // var url = data.Location;
              });
            }
          });

          banhji.fileManagement.dataSource.sync();
          var saved = false;
          banhji.fileManagement.dataSource.bind("requestEnd", function(e){
            //Delete File
            if(e.type=="destroy"){
              if(saved==false && e.response){
                saved = true;
                var response = e.response.results;
                $.each(response, function(index, value){
                  var params = {
                    Delete: { /* required */
                      Objects: [ /* required */
                        {
                          Key: value.data.key
                        }
                      ]
                    }
                  };
                  bucket.deleteObjects(params, function(err, data) {
                    //console.log(err, data);
                  });
                });
              }
            }
            banhji.fileManagement.dataSource.data([]);
          });
        }
    });
	banhji.pageLoaded = {};
	// Initializing AWS Cognito service
	var userPool = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserPool(poolData);
	// Initializing AWS S3 Service
	var bucket = new AWS.S3({params: {Bucket: 'banhji'}});
	banhji.accessMod = new kendo.data.DataSource({
      transport: {
        read  : {
          url: baseUrl + 'api/users/access',
          type: "GET",
          dataType: 'json'
        },
        parameterMap: function(options, operation) {
          if(operation === 'read') {
            return {
              limit: options.pageSize,
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
      filter: {field: 'username', value: userPool.getCurrentUser() == null ? '': userPool.getCurrentUser().username},
      pageSize: 1
    });
    banhji.allowed;
	function checkRole(arg) {
		var dfd = $.Deferred();
		// var roleName = $(location).attr('hash').substr(2);
		// loop through roles if this has in the role list
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
				if(banhji.accessMod.data().length > 0) {
					for(var i = 0; i < banhji.accessMod.data().length; i++) {
						if(arg == banhji.accessMod.data()[i].name.toLowerCase()) {
							dfd.resolve(true);
							break;
						}
					}
				}
			}
		);
	}
	banhji.companyDS = new kendo.data.DataSource({
      transport: {
        read  : {
          url: baseUrl + 'api/profiles/company',
          type: "GET",
          dataType: 'json'
        },
        update  : {
          url: baseUrl + 'api/profiles/company',
          type: "PUT",
          dataType: 'json'
        },
        parameterMap: function(options, operation) {
          if(operation === 'read') {
            return {
              limit: options.pageSize,
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
      filter: {field: 'username', value: userPool.getCurrentUser() == null ? '': userPool.getCurrentUser().username},
      pageSize: 1
    });
	banhji.profileDS = new kendo.data.DataSource({
      transport: {
        read  : {
          url: baseUrl + 'api/profiles',
          type: "GET",
          dataType: 'json',
          headers: banhji.header,
        },
        parameterMap: function(options, operation) {
          if(operation === 'read') {
            return {
              limit: options.pageSize,
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
      filter: {field: 'username', value: userPool.getCurrentUser() == null ? '':userPool.getCurrentUser().username},
      pageSize: 100
    });
	banhji.aws = kendo.observable({
        password: null,
        confirm: null,
        email: null,
        verificationCode: null,
        cognitoUser: null,
        newPass: null,
        oldPass: null,
        image: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png",
        getImage: function() {
          banhji.profileDS.fetch(function(e){
            banhji.aws.set('image', banhji.profileDS.data()[0].profile_photo);
          });
        },
        signUp: function() {
          // e.preventDefault();
          if(this.get('password') != this.get('confirm')) {
            alert('Passwords do not match');
          } else {
            // using cognito to sign up
            var attributeList = [];

            var dataEmail = {
                Name : 'email',
                Value : this.get('email')
            };

            var attributeEmail = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserAttribute(dataEmail);

            attributeList.push(attributeEmail);

            userPool.signUp(this.get('email'), this.get('password'), attributeList, null, function(err, result){
                if (err) {
                    alert(err);
                    return;
                }
                // update attribute
                // 2. move to admin page
                // banhji.awsCognito.set('cognitoUser', result.user);
                banhji.router.navigate('confirm');
            });
          }
        },
        comfirmCode: function(e) {
           e.preventDefault();
            // confirm user verification code after signed up
            var userData = {
                Username : userPool.getCurrentUser().username,
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.confirmRegistration(this.get('verificationCode'), true, function(err, result) {
                if (err) {
                    alert(err);
                    return;
                }
                banhji.router.navigate('index');
            });
        },
        resendCode: function(e) {
          e.preventDefault();
          alert('code resent');
        },
        signIn: function() {
            var authenticationData = {
                Username : this.get('email'),
                Password : this.get('password'),
            };
            var authenticationDetails = new AWSCognito.CognitoIdentityServiceProvider.AuthenticationDetails(authenticationData);
            
            var userData = {
                Username : this.get('email'),
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.authenticateUser(authenticationDetails, {
                onSuccess: function (result) {
                    banhji.awsCognito.set('cognitoUser', cognitoUser);
                },

                onFailure: function(err) {
                    alert(err);
                },

            });
        },
        signOut: function(e){
          e.preventDefault();
          var userData = {
              Username : userPool.getCurrentUser().username,
              Pool : userPool
          };
          var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
          if(cognitoUser != null) {
              cognitoUser.signOut();
              localforage.clear().then(function(){
              	window.location.replace("<?php base_url(); ?>login");
              });              
          } else {
              console.log('No user');
          }
        },
        changePassword: function() {
            var userData = {
                Username : this.get('email'),
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.changePassword('oldPassword', 'newPassword', function(err, result) {
                if (err) {
                    alert(err);
                    return;
                }
                console.log('call result: ' + result);
            });
        },
        forgotPassword: function(e) {
            e.preventDefault();
            var userData = {
                Username : this.get('email'),
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.forgotPassword({
                onSuccess: function (result) {
                    console.log('call result: ' + result);
                },
                onFailure: function(err) {
                    alert(err);
                },
                inputVerificationCode() {
                    var verificationCode = prompt('Please input verification code ' ,'');
                    var newPassword = prompt('Enter new password ' ,'');
                    cognitoUser.confirmPassword(verificationCode, newPassword, this);
                }
            });
        },
        getCurrentUser: function() {
            var cognitoUser = null;
            if (userPool.getCurrentUser() != null) {
                cognitoUser = userPool.getCurrentUser();
            }
            return cognitoUser;
        }
    });
	// Check if user is logged and authenticated via cognito service
	if(userPool.getCurrentUser() == null) {
		// if not login return to login page		
	  	//window.location.replace('http://localhost/aws/login.html');
	} else {
	  	var cognitoUser = userPool.getCurrentUser();
	  	if(cognitoUser !== null) {
	    	// banhji.aws.getImage();
	    	cognitoUser.getSession(function(err, result) {
	      		if(result) {
	        		AWS.config.credentials = new AWS.CognitoIdentityCredentials({
	          			IdentityPoolId: 'us-east-1:35445541-da4c-4dbb-b83f-d1d0301a26a9',
	          			Logins: {
	            			'cognito-idp.us-east-1.amazonaws.com/us-east-1_56S0nUDS4' : result.getIdToken().getJwtToken()
	          			}
	        		});
	     		}
	    	});
	  	}
	}	
	var langVM = kendo.observable({
		lang 		: null,		
		localeCode 	: null,		
		changeToEn 	: function() {
			localforage.setItem("lang", "EN").then(function(value){
				location.reload(false);
			});
		},
		changeToKh 	: function() {
			localforage.setItem("lang", "KH").then(function(value){
				location.reload(false);
			});
		}
	});
	banhji.userData = JSON.parse(localStorage.getItem('userData/user')) ? JSON.parse(localStorage.getItem('userData/user')) : "";
	if(banhji.userData == "") {
		banhji.companyDS.fetch(function() {
			banhji.profileDS.fetch(function(){
				var data = banhji.companyDS.data();
				var id = 0;
				id = banhji.profileDS.data()[0].id;
				if(data.length > 0) {
					var user = {
						id: id,
						username: userPool.getCurrentUser().username,
						institute: data
					};
					localforage.setItem('user', user);
				}
				banhji.userData = JSON.parse(localStorage.getItem('userData/user'));
			});
		});
	}
	banhji.institute = banhji.userData ? banhji.userData.institute : "";
	banhji.locale = banhji.institute.currency.locale;
	banhji.localeReport = banhji.institute.reportCurrency.locale;
	banhji.header = { Institute: banhji.institute.id };	
	var dataStore = function(url) {
		var o = new kendo.data.DataSource({
			transport: {
				read 	: {
					url: url,
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				create 	: {
					url: url,
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: url,
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: url,
					type: "DELETE",
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
		});
		return o;
	};
	banhji.userManagement = kendo.observable({
		lang : langVM,
		multiTaskList 		: [],
		searchText : "",
		searchType : "contacts",
		checkRole  : function(e) {
			e.preventDefault();
		if(JSON.parse(localStorage.getItem('userData/user')).role == 1) {
            banhji.router.navigate("");
          } else {
           	window.location.replace("<?php echo base_url(); ?>admin");
          }
		},
		searchContact: function() {
			this.set("searchType", "contacts");

			$("#search-placeholder").attr('placeholder', "Search Contact");
		},
		searchTransaction: function() {
			this.set("searchType", "transactions");

			$("#search-placeholder").attr('placeholder', "Search Transaction");
		},
		searchItem: function() {
			this.set("searchType", "items");

			$("#search-placeholder").attr('placeholder', "Search Item");
		},
		search: function(e) {
			e.preventDefault();
			
			banhji.searchAdvanced.set("searchText", this.get("searchText"));
			banhji.searchAdvanced.set("searchType", this.get("searchType"));
			banhji.searchAdvanced.search();
			banhji.router.navigate('/search_advanced');
		},
		removeLink 			: function(e){
			e.preventDefault();

			var data = e.data,
			index = this.multiTaskList.indexOf(data);
			
			if(data.vm!==null){				
				data.vm.cancel();
			}			

			this.multiTaskList.splice(index, 1);
		},
		removeMultiTask		: function(url){
			var self = this;

			$.each(this.multiTaskList, function(index, value){
				if(value.url==url){
					self.multiTaskList.splice(index, 1);

					return false;
				}
			});
		},
		addMultiTask 		: function(name, url, vm){
			var isExisting = false;
			$.each(this.multiTaskList, function(index, value){
				if(value.url==url){
					isExisting = true;

					return false;
				}
			});

			if(isExisting==false){
				this.multiTaskList.push({ name:name, url:url, vm:vm });
			}
		},				
		auth : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'authentication',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'authentication',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'authentication',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'authentication',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			// pageSize: 100
		}),		
		inst 	 : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/company',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'banhji/company',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'banhji/company',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'banhji/company',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			// pageSize: 100
		}),
		industry : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/industry',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			// pageSize: 100
		}),
		countries: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/countries',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			// pageSize: 100
		}),
		provinces: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/provinces',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			// pageSize: 100
		}),
		types 	 : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/types',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			// pageSize: 100
		}),
		instMod 	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'admin/modules_institute',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'admin/modules_institute',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'admin/modules_institute',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'admin/modules_institute',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			filter: {field: 'id', value: 1}
			// pageSize: 100
		}),
		onSuccessUpload: function(e){
			var logo = e.response.results.url;
			this.get('newInst').set('logo', logo);
			this.saveIntitute();
			// console.log(logo);
		},	 
		close 		: function() {
			window.history.back(-1);
			if(this.inst.hasChanges()) {
				this.inst.cancelChanges();
			}
			if(this.auth.hasChanges()) {
				this.auth.cancelChanges();
			}
		},
		getUsername : function() {
			var x = banhji.userData.username.substring(0,2);
			return x.toUpperCase();
		},
		taxRegimes: [
			{ code: 'small', type: 'ខ្នាតតូច'},
			{ code: 'medium', type: 'ខ្នាតមធ្យម'},
			{ code: 'large', type: 'ខ្នាតធំ'}
		],
		currency : [
			{ code: 'KHR', locale: 'km-KH'},
			{ code: 'USD', locale: 'us-US'},
			{ code: 'VND', locale: 'vn-VN'}
		],
		username : null,
		password : null,
		_password: null,
		pwdDS 	 : new kendo.data.DataSource({
			transport: {
				create 	: {
					url: apiUrl + 'banhji/password',
					type: "POST",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			pageSize: 100
		}),
		validateEmail: function() {
			var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
		  	var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
		  	var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
		  	var sQuotedPair = '\\x5c[\\x00-\\x7f]';
		  	var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
		  	var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
		  	var sDomain_ref = sAtom;
		  	var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
		  	var sWord = '(' + sAtom + '|' + sQuotedString + ')';
		  	var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
		  	var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
		  	var sAddrSpec = sLocalPart + '\\x40' + sDomain; // complete RFC822 email address spec
		  	var sValidEmail = '^' + sAddrSpec + '$'; // as whole string

		  	var reValidEmail = new RegExp(sValidEmail);

		  	if(!reValidEmail.test(this.get('username'))){
		  		alert("Please enter valid address");
				this.set('passed', false);
		  	}
		  	this.set('passed', false);
		},
		loginBtn : function() {
			banhji.view.layout.showIn('#content', banhji.view.loginView);
		},
		login  	 : function() {
			this.auth.query({
				filter: [
					{field: 'username', value: banhji.userManagement.get('username')},
					{field: 'password', value: banhji.userManagement.get('password')}
				]
			}).done(function(e){
				var data = banhji.userManagement.auth.data();
				if(data.length > 0) {
					var user = banhji.userManagement.auth.data()[0];
					localforage.setItem('user', user);
					if(user.institute.length === 0) {
						banhji.router.navigate('/no-page');
					} else {
						banhji.router.navigate('/');
					}
				} else {
					console.log('bad');
				}
			});
		},
		registerBtn: function() {
			banhji.view.layout.showIn('#content', banhji.view.signupView);	
		},
		logout 		: function(e) {
			e.preventDefault();
			var userData = {
              	Username : userPool.getCurrentUser().username,
              	Pool : userPool
	        };
          	var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
          	if(cognitoUser != null) {
              	cognitoUser.signOut();
              	localforage.removeItem('user').then(function() {
				    // Run this code once the key has been removed.
				    console.log('Key is cleared!');
				}).catch(function(err) {
				    // This code runs if there were any errors
				    console.log(err);
				});
              	window.location.replace("<?php echo base_url(); ?>login");
          	} else {
              	console.log('No user');
          	}
		},
		setCurrent : function(current) {
			this.set('current', current);
		},
		changePwd  : function() {
			if(this.get('password') !== this.get('_password')) {
				alert("Password does not match");
			} else {
				this.pwdDS.sync();
			}
		},
		getLogin 	: function() {
			return JSON.parse(localStorage.getItem('userData/user'));
		},
		page 	 : function() {
			if(banhji.userManagement.getLogin()) {
				if(banhji.userManagement.getLogin().perm === 1) {
					return 'admin';
				}
			} else {
				return 'home';
			}
			// if(this.getLogin()) {
			// 	return '\#/page';
			// } else {
			// 	return '\#/page/';
			// }
			
		},
		createComp : function() {
			banhji.router.navigate('/create_company');
		},
		setInstitute: function(newIns) {
			this.set('newInst', newIns);
		},
		addInst    : function() {
			this.inst.insert(0, {
				name: "",
				email: "",
				address: "",
				description: "",
				industry: {id: null, name: null},
				type: {id: null, name: null},
				country: {id: null, code: null, name: null},
				province: {id: null, local: null, english: null},
				vat_no: null,
				fiscal_date: null,
				tax_regime: null,
				locale : null,
				legal_name: null,
				date_founded: null,
				logo: ""
			});
			this.setInstitute(this.inst.at(0));
		},
		cancelInst : function() {
			this.inst.cancelChanges();
		},
		saveIntitute: function() {
			if(this.get('newInst').industry.id !== null || this.get('newInst').province.id || this.get('newInst').country.id) {
				this.inst.sync();
				this.inst.bind('requestEnd', function(e){
					var type = e.type, res = e.response.results;
					if(e.response.error === false) {
						if(e.type === 'create') {
							$('#createComMessage').text("created. Please wait till site admin created database for you.");
						} else {
							localforage.removeItem('company', function(err){
								//
							});
							localforage.setItem('company', res);
							$('#createComMessage').text("Updated");
						}
					} else {
						$('#createComMessage').text("error creating company.");
					}
				});
			} else {
				alert('filling all fields');
			}
		},
		signup 	   : function() {
			this.auth.add({username: this.get('username'), password: this.get('password')});
			this.sync();
			this.auth.bind('requestEnd', function(e){
				if(e.type === 'create' && e.response.error === false) {
					alert("អ្នកបានចុះឈ្មោះរួច");
					banhji.router.route('')
				}
			});
		},
		onFileSelect: function(e) {
			console.log(e.files[0]);
		},
		sync: function() {
			this.auth.sync();
			this.auth.bind('requestEnd', function(e){
				var type = e.type;
				var result = e.response.results;
				if(type === "read" && e.error !== true) {
					// get login info
					console.log('true');
				} else if(type === "create") {
					if(e.response.error === true) {
						banhji.userManagement.auth.cancelChanges();
						alert('មានរួចហើយ');
					} else {
						var user = banhji.userManagement.auth.data()[0];
						localforage.setItem('user', user);
						if(!user.institute) {
							banhji.router.navigate('/page', false);
						} else {
							banhji.router.navigate('/app', false);
						}
					}
				}
			});
		}
	});	
	function getDB() {
		var entity = null;
		if(banhji.userManagement.getLogin()) {
			if(banhji.userManagement.getLogin().institute) {
				if(banhji.userManagement.getLogin().institute.length > 0) {
					entity = banhji.userManagement.getLogin().institute.name
				}
				
			} else {
				entity = false
			}
		}
		return entity;
	}
	banhji.currency = kendo.observable({
		dataSource 			: dataStore(apiUrl + 'currencies'),
		getCurrencyID 		: function(locale){
			var currency_id = 0;

			$.each(this.dataSource.data(), function(index, value){
				if(value.locale===locale){
					currency_id = value.id;
					return false;
				}
			});

			return currency_id;
		}
	});
	banhji.users = kendo.observable({
		dataStore	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/users',
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'banhji/users',
					type: "POST",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'banhji/users',
					type: "PUT",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'banhji/users',
					type: "DELETE",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			pageSize: 100
		}),
		roleDS 		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/roles',
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			pageSize: 100
		}),
		add 		: function() {
			banhji.view.pageAdmin.showIn('#col2', banhji.view.addUserView);
			this.dataStore.insert(0, {username: '', password: null, permission: {id: null, name: null}});
			this.setCurrent(this.dataStore.at(0));
		},
		remove 		: function(e) {
			var user = confirm('Are you sure you want to remove this user?');
			if(user === true) {
				this.dataStore.remove(e.data);
				this.sync();
			}
		},
		editRight 	: function(e) {
			banhji.view.pageAdmin.showIn('#col2', banhji.view.editRoleView);
			this.setCurrent(e.data);
		},
		cancelAdd 	: function() {
			banhji.view.pageAdmin.showIn('#col2', banhji.view.userListView);
			this.dataStore.cancelChanges();
		},
		setCurrent 	: function(current) {
			this.set('current', current);
		},
		sync 		: function() {
			this.dataStore.sync();
			this.dataStore.bind('requestEnd', function(e){
				var type = e.type;
				var data = e.response.results;
				if(type !== 'read') {
					console.log('data recorded');
				}
			});
		}
	});
	banhji.people = kendo.observable({
		dataSource : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "people",
					type: "GET",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name:""
					},
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + "people",
					type: "POST",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name:""
					},
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "people",
					type: "PUT",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institutename:""
					},
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + "people",
					type: "DELETE",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name:""
					},
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							offset: options.skip,
							filter: options.filter
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
				total: 'count',
				errors: 'error'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			pageSize: 20
		}),
		filterBy   : function() {},
		save 	   : function() {}
	});
	// end TEst offline
	var obj = function(url) {
		var o = kendo.observable({
			dataStore: new kendo.data.DataSource({
				transport: {
					read 	: {
						url: url,
						type: "GET",
						headers: {
							"Entity": getDB()
						},
						dataType: 'json'
					},
					create 	: {
						url: url,
						type: "POST",
						headers: {
							"Entity": getDB()
						},
						dataType: 'json'
					},
					update 	: {
						url: url,
						type: "PUT",
						headers: {
							"Entity": getDB()
						},
						dataType: 'json'
					},
					destroy : {
						url: url,
						type: "DELETE",
						headers: {
							"Entity": getDB()
						},
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								limit: options.pageSize,
								offset: options.skip,
								filter: options.filter
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
					total: 'count',
					errors: 'error'
				},
				batch: true,
				serverFiltering: true,
				serverPaging: true,
				pageSize: 20
			}),
			findById: function(id) {},
			findBy 	: function(arr) {},
			insert 	: function(data) {},
			remove 	: function(model) {
				this.dataStore.remove(model);
				this.save();
			},
			save 	: function() {
				this.dataStore.sync();
				this.dataStore.bind('requestEnd', function(e){
					var type = e.type, res = e.response.results;
					console.log(type + " operation is successful.");
				});
			}
		});
		return o;
	}	
	banhji.Layout = kendo.observable({
		locale: "km-KH",
		menu 	: [],
		// isShown : true,
		// isAdmin : auth.isAdmin(),
		// logout 	: function(e) {
		// 	e.preventDefault();
		// 	auth.logout();
		// },
		// isLogin : function(){
		// 	if(banhji.userManagement.getLogin()) {
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}
		// },
		// init: function() {
		// 	// initialize when the whole page load
		// },
		// ui: function() {
		// 	// get UI information from source base on locale
		// }
	});	
	var role = kendo.observable({
		dataStore 	: new kendo.data.DataSource({
			transport: {
				read: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				create: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				update: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				destroy: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				parameterMap: function(data, operation) {
					if(operation === 'read') {
						return {
							limit: data.pageSize,
							offset: data.skip,
							filter: data.filter
						};
					}
					return {models: kendo.stringify(data.models)};
				}
			},
			schema: {
	        	model: {
	        		id: "id"
	        	},
	        	data: "results"
	        },
			pageSize: 20,
			serverPaging: true,
			serverFiltering: true,
			batch: true
		}),
		roleUserDs 	: new kendo.data.DataSource({
			transport: {
				read: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				create: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'POST'
				},
				update: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'PUT'
				},
				destroy: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'DELETE'
				},
				parameterMap: function(data, operation) {
					if(operation === 'read') {
						return {
							limit: data.pageSize,
							offset: data.skip,
							filter: data.filter
						};
					}
					return {models: kendo.stringify(data.models)};
				}
			},
			schema: {
	        	model: {
	        		id: "id"
	        	},
	        	data: "results"
	        },
			pageSize: 20,
			serverPaging: true,
			serverFiltering: true,
			batch: true
		}),
		find 		: function(arg) {},
		setCurrent 	: function(currentRole) {},
		save 		: function() {}
	});

	// DBS
	banhji.store = banhji.store || {};
	banhji.dbsUrl = "https://developers.dbs.com:10443/api/sg/v1/accounts/1018260032/accountHolders?productType=CA";
	banhji.dbsApiKey = "9c976436-9f86-42b1-965c-3a6d15c73d66";
	banhji.dbsToken = "bPIIqpDNbR14tBI0X+DbkVWa0Ao=";
	banhji.dbsHeaders = {
		'apiKey' 		: banhji.dbsApiKey,
		'uuid' 	 		: banhji.dbsApiKey,
		'Authorization' : banhji.dbsToken == "" ? banhji.authorization : banhji.dbsToken
	};
	banhji.store.dbsDataSource = new kendo.data.DataSource({
		transport: {
		    read: {
		    	url: banhji.dbsUrl,
		    	headers: banhji.dbsHeaders,
				type: "GET",
		        dataType: "json",
		        contentType: 'application/json'
		    }
		},
		batch: false,
		schema: {
			data: function(response) {
				var data = [];
				data.push(response);
				return data;
			}
		}
	});

	// SOURCE #############################################################################################
	banhji.source = kendo.observable({
		lang 						: langVM,
		countryDS					: dataStore(apiUrl + "countries"),
		//Contact
		customerList 				: [],
		supplierList 				: [],
		employeeList 				: [],
		contactDS					: dataStore(apiUrl + "contacts"),
		customerDS					: dataStore(apiUrl + "contacts"),
		supplierDS					: dataStore(apiUrl + "contacts"),
		employeeDS					: dataStore(apiUrl + "contacts"),
		//Contact Type
		contactTypeList 			: [],
		contactTypeDS				: dataStore(apiUrl + "contacts/type"),
		//Job
		jobList 					: [],
		jobDS						: dataStore(apiUrl + "jobs"),
		//Currency
		currencyList 				: [],
		currencyDS					: dataStore(apiUrl + "currencies"),
		currencyRateDS				: dataStore(apiUrl + "currencies/rate"),
		//Item
		itemList 					: [],
		itemDS						: dataStore(apiUrl + "items"),
		itemTypeDS					: dataStore(apiUrl + "item_types"),
		itemGroupList 				: [],
		itemGroupDS					: dataStore(apiUrl + "items/group"),
		brandDS						: dataStore(apiUrl + "brands"),
		categoryList 				: [],
		categoryDS					: dataStore(apiUrl + "categories"),		
		itemPriceList 				: [],
		itemPriceDS					: dataStore(apiUrl + "item_prices"),
		measurementList 			: [],
		measurementDS				: dataStore(apiUrl + "measurements"),
		//Tax
		taxTypeDS					: dataStore(apiUrl + "tax_types"),
		taxList 					: [],
		taxItemDS					: dataStore(apiUrl + "tax_items"),
		//Accounting
		accountList 				: [],
		accountDS					: dataStore(apiUrl + "accounts"),
		accountTypeDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts/type",
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
			filter:{ field:"id >", value:9 },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Payment Term, Method, Segment
		paymentTermDS				: dataStore(apiUrl + "payment_terms"),
		paymentMethodDS				: dataStore(apiUrl + "payment_methods"),
		//Segment
		segmentDS					: dataStore(apiUrl + "segments"),
		segmentItemList 			: [],
		segmentItemDS				: dataStore(apiUrl + "segments/item"),
		//Txn Template
		txnTemplateList 			: [],
		txnTemplateDS				: dataStore(apiUrl + "transaction_templates"),
		//Prefixes
		prefixList 					: [],
		prefixDS					: dataStore(apiUrl + "prefixes"),
		frequencyList 				: [
			{ id: 'Daily', name: 'Day' },
			{ id: 'Weekly', name: 'Week' },
			{ id: 'Monthly', name: 'Month' },
			{ id: 'Annually', name: 'Annual' }
		],
		monthOptionList 			: [
			{ id: 'Day', name: 'Day' },
			{ id: '1st', name: '1st' },
			{ id: '2nd', name: '2nd' },
			{ id: '3rd', name: '3rd' },
			{ id: '4th', name: '4th' }
		],
		monthList 					: [
			{ id: 0, name: 'January' },
			{ id: 1, name: 'February' },
			{ id: 2, name: 'March' },
			{ id: 3, name: 'April' },
			{ id: 4, name: 'May' },
			{ id: 5, name: 'June' },
			{ id: 6, name: 'July' },
			{ id: 7, name: 'August' },
			{ id: 8, name: 'September' },
			{ id: 9, name: 'October' },
			{ id: 10, name: 'November' },
			{ id: 11, name: 'December' }
		],
		weekDayList 				: [
			{ id: 0, name: 'Sunday' },
			{ id: 1, name: 'Monday' },
			{ id: 2, name: 'Tuesday' },
			{ id: 3, name: 'Wednesday' },
			{ id: 4, name: 'Thurday' },
			{ id: 5, name: 'Friday' },
			{ id: 6, name: 'Saturday' }
		],
		dayList 					: [
			{ id: 1, name: '1st' },
			{ id: 2, name: '2nd' },
			{ id: 3, name: '3rd' },
			{ id: 4, name: '4th' },
			{ id: 5, name: '5th' },
			{ id: 6, name: '6th' },
			{ id: 7, name: '7th' },
			{ id: 8, name: '8th' },
			{ id: 9, name: '9th' },
			{ id: 10, name: '10th' },
			{ id: 11, name: '11st' },
			{ id: 12, name: '12nd' },
			{ id: 13, name: '13rd' },
			{ id: 14, name: '14th' },
			{ id: 15, name: '15th' },
			{ id: 16, name: '16th' },
			{ id: 17, name: '17th' },
			{ id: 18, name: '18th' },
			{ id: 19, name: '19th' },
			{ id: 20, name: '20th' },
			{ id: 21, name: '21st' },
			{ id: 22, name: '22nd' },
			{ id: 23, name: '23rd' },
			{ id: 24, name: '24th' },
			{ id: 25, name: '25th' },
			{ id: 26, name: '26th' },
			{ id: 27, name: '27th' },
			{ id: 28, name: '28th' },
			{ id: 0, name: 'Last' }
		],
		sortList					: [
	 		{ text:"All", value: "all" },
	 		{ text:"Today", value: "today" },
	 		{ text:"This Week", value: "week" },
	 		{ text:"This Month", value: "month" },
	 		{ text:"This Year", value: "year" }
		],
		statusList 					: [
			{ "id": 1, "name": "Active" },
			{ "id": 0, "name": "Inactive" },
			{ "id": 2, "name": "Void" }
        ],
        customerFormList 			: [
	    	{ id: "Quote", name: "Quotation" },
			{ id: "Sale_Order", name: "Sale Order" },
			{ id: "Deposit", name: "Deposit" },
			{ id: "Cash_Sale", name: "Cash Sale" },
			{ id: "Invoice", name: "Invoice" },
			{ id: "Cash_Receipt", name: "Cash Receipt" },
			//{ id: "Sale_Return", name: "Sale Return" },
			{ id: "GDN", name: "Delivered Note" }
	    ],
	    vendorFormList 				: [
	    	{ id: "Purchase_Order", name: "Purchase Order" },
	    	{ id: "GRN", name: "GRN" },
			// { id: "Deposit", name: "Deposit" },
			// { id: "Purchase", name: "Purchase" },
			// { id: "Pur_Return", name: "Pur.Return" },
			{ id: "Cash_Payment", name: "Cash Payment" }
	    ],
	    cashFormList 				: [
	    	{ id: "Cash_Transfer", name: "Cash Transaction" },
	    	{ id: "Cash_Receipt", name: "Cash Receipt" },
			{ id: "Cash_Payment", name: "Cash Payment" },
			{ id: "Cash_Advance", name: "Cash Advance" },
			{ id: "Reimbursement", name: "Reimbursement" },
			{ id: "Advance_Settlement", name: "Advance Settlement" }
	    ],
	    cashMGTFormList				: [
	    	{ id: "Cash_Transfer", name: "Transfer" },
	    	{ id: "Deposit", name: "Deposit" },
			{ id: "Withdraw", name: "Withdraw" },
			{ id: "Cash_Advance", name: "Advance" },
			{ id: "Cash_Payment", name: "Payment" },
			{ id: "Reimbursement", name: "Reimbursement" },
			{ id: "Journal", name: "Journal" }
	    ],
		genderList					: ["M", "F"],
		typeList 					: ['Invoice','Commercial_Invoice','Vat_Invoice','Electricity_Invoice','Water_Invoice','Cash_Sale','Commercial_Cash_Sale','Vat_Cash_Sale','Receipt_Allocation','Sale_Order','Quote','GDN','Sale_Return','Purchase_Order','GRN','Cash_Purchase','Credit_Purchase','Purchase_Return','Payment_Allocation','Deposit','Electricty_Deposit','Water_Deposit','Customer_Deposit','Vendor_Deposit','Withdraw','Transfer','Journal','Item_Adjustment','Cash_Advance','Reimbursement','Direct_Expense','Advance_Settlement','Additional_Cost','Cash_Payment','Cash_Receipt','Credit_Note','Debit_Note','Offset_Bill','Offset_Invoice','Cash_Transfer','Internal_Usage'],
		user_id						: banhji.userData.id,
		amtDueColor 				: "#D5DBDB",
		acceptedSrc					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/accepted.ico",
		approvedSrc					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/approved.ico",
		cancelSrc					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/cancel.ico",
		openSrc 					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/open.ico",
		paidSrc 					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/paid.ico",
		partialyPaidSrc 			: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/partialy_paid.ico",
		usedSrc 					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/used.ico",
		receivedSrc 				: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/received.ico",
		deliveredSrc 				: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/delivered.ico",
		successMessage 				: "Saved Successful!",
		errorMessage 				: "Warning, please review it again!",
		confirmMessage 				: "Are you sure, you want to delete it?",
		requiredMessage 			: "Required",
		duplicateNumber 			: "Duplicate Number!",
		duplicateInvoice 			: "Duplicate Invoice!",
		selectCustomerMessage 		: "Please select a customer.",
		selectSupplierMessage 		: "Please select a supplier.",
		selectItemMessage 			: "Please select an item.",
		duplicateSelectedItemMessage: "You already selected this item.",
		pageLoad 					: function(){
			this.loadAccounts();
			this.accountTypeDS.read();
			this.taxTypeDS.read();
			this.loadTaxes();
			this.loadJobs();
			this.loadSegmentItems();
			this.loadCurrencies();
			this.loadRates();
			this.loadPrefixes();
			this.loadTxnTemplates();

			this.loadCategories();
			this.loadItemGroups();
			this.loadItems();
			this.itemTypeDS.read();
			this.loadItemPrices();
			this.loadMeasurements();

			this.loadContactTypes();
			this.loadCustomers();
			this.loadSuppliers();
			this.loadEmployees();
		},
		getFiscalDate 				: function(){
			var today = new Date(),	
			fDate = new Date(today.getFullYear() +"-"+ banhji.institute.fiscal_date);

			if(today < fDate){
				fDate.setFullYear(today.getFullYear()-1);
			}		

			return fDate;
		},
		loadPrefixes 				: function(){
			var self = this, raw = this.get("prefixList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.prefixDS.query({
				filter: [],
			}).then(function(){
				var view = self.prefixDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadTxnTemplates 			: function(){
			var self = this, raw = this.get("txnTemplateList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.txnTemplateDS.query({
				filter:[]
			}).then(function(){
				var view = self.txnTemplateDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadCurrencies 				: function(){
			var self = this, raw = this.get("currencyList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.currencyDS.query({
				filter:[]
			}).then(function(){
				var view = self.currencyDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadRates 					: function(){
			this.currencyRateDS.query({
				filter:[],
				sort:{ field:"date", dir:"desc"}
			});
		},
		getRate						: function(locale, date){
			var rate = 0, lastRate = 1;
			$.each(this.currencyRateDS.data(), function(index, value){
				if(value.locale == locale){
					lastRate = kendo.parseFloat(value.rate);

					if(date >= new Date(value.date)){
						rate = kendo.parseFloat(value.rate);

						return false;
					}
				}
			});

			//If no rate, use the last rate
			if(rate==0){
				rate = lastRate;
			}

			return rate;
		},
		loadTaxes 					: function(){
			var self = this, raw = this.get("taxList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.taxItemDS.query({
				filter:[]
			}).then(function(){
				var view = self.taxItemDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		checkWHT 					: function(tax_type_id){
			var result = false,
				types = this.taxTypeDS.get(tax_type_id);

			if(types.sub_of_id==12){
				result = true;
			}

			return result;
		},
		loadJobs 					: function(){
			var self = this, raw = this.get("jobList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.jobDS.query({
				filter:[]
			}).then(function(){
				var view = self.jobDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadSegmentItems 			: function(){
			var self = this, raw = this.get("segmentItemList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.segmentItemDS.query({
				filter:{ field:"segment_id >", value: 0 }
			}).then(function(){
				var view = self.segmentItemDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadAccounts 				: function(){
			var self = this, raw = this.get("accountList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.accountDS.query({
				filter: []
			}).then(function(){
				var view = self.accountDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadCategories 				: function(){
			var self = this, raw = this.get("categoryList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.categoryDS.query({
				filter:[]
			}).then(function(){
				var view = self.categoryDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadItemGroups 				: function(){
			var self = this, raw = this.get("itemGroupList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.itemGroupDS.query({
				filter:[]
			}).then(function(){
				var view = self.itemGroupDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadItems 					: function(){
			var self = this, raw = this.get("itemList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.itemDS.query({
				filter:{ field:"status", value:1 }
			}).then(function(){
				var view = self.itemDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadItemPrices 				: function(){
			var self = this, raw = this.get("itemPriceList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.itemPriceDS.query({
				filter:[
					{ field:"assembly_id", value:0 },
					{ field:"status", operator:"where_related_item", value:1 }
				]
			}).then(function(){
				var view = self.itemPriceDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadMeasurements 			: function(){
			var self = this, raw = this.get("measurementList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.measurementDS.query({
				filter:[],
			}).then(function(){
				var view = self.measurementDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadContactTypes			: function(){
			var self = this, raw = this.get("contactTypeList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.contactTypeDS.query({
				filter:[]
			}).then(function(){
				var view = self.contactTypeDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadCustomers 				: function(){
			var self = this, raw = this.get("customerList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.customerDS.query({
				filter:[
					{ field:"parent_id", operator:"where_related_contact_type", value:1 }
				]
			}).then(function(){
				var view = self.customerDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadSuppliers 				: function(){
			var self = this, raw = this.get("supplierList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.supplierDS.query({
				filter:[
					{ field:"parent_id", operator:"where_related_contact_type", value:2 }
				]
			}).then(function(){
				var view = self.supplierDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadEmployees 				: function(){
			var self = this, raw = this.get("employeeList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.employeeDS.query({
				filter:[
					{ field:"parent_id", operator:"where_related_contact_type", value:3 },
					{ field:"status", value:1 }
				]
			}).then(function(){
				var view = self.employeeDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		getPaymentTerm 				: function(id){
			var data = this.paymentTermDS.get(id);
			return data.name;
		},
		getPrefixAbbr 				: function(type){
			var abbr = "";
			$.each(this.prefixList, function(index, value){
				if(value.type==type){
					abbr = value.abbr;

					return false;
				}
			});

			return abbr;
		},
		getCurrencyCode 			: function(locale){
			var code = "";

			$.each(this.currencyDS.data(), function(index, value){
				if(value.locale==locale){
					code = value.code;

					return false;
				}
			});

			return code;
		}
	});
	
	/*************************************************
	*   HOME PAGE MVVM		  						 *
	*************************************************/
	banhji.index = kendo.observable({
		lang 				: langVM,
		dataSource			: dataStore(apiUrl+"accounting_modules/apar"),
		summaryDS			: dataStore(apiUrl+"accounting_modules/financial_snapshot"),
		graphDS 			: dataStore(apiUrl+"cash_modules/cash_in_out"),
		modules 			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'admin/modules',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'admin/modules',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'admin/modules',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'admin/modules',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			// pageSize: 100
		}),
		companyInf 			: function() {
			var company = JSON.parse(localStorage.getItem('userData/user'));
			return company;
		},
		getLogo   			: function() {
			banhji.companyDS.fetch(function(){
				if(banhji.companyDS.data().length > 0) {
					banhji.index.set('companyLogo', banhji.companyDS.data()[0].logo);
				}
			});
		},
		obj 				: {},
		today 				: new Date(),
		companyName 		: null,
		companyLogo 		: "",
		pageLoad 			: function(){
			//this.setObj();
			this.loadData();


		},
		openWindow			: function(){
      		//this.addType();

         	this.set("windowVisible", true);
      	},
      	closeWindow 		: function(){
      		//this.dataSource.cancelChanges();

      		this.set("windowVisible", false);
      	},
      	openWindow1			: function(){
      		//this.addType();

         	this.set("window1Visible", true);
      	},
      	closeWindow1 		: function(){
      		//this.dataSource.cancelChanges();

      		this.set("window1Visible", false);
      	},
		setObj 		: function(){
			this.set("obj", {
				//AR
				ar 					: 0,
				ar_open 			: 0,
				ar_customer 		: 0,
				ar_overdue 			: 0,
				//AP
				ap 					: 0,
				ap_open 			: 0,
				ap_vendor 			: 0,
				ap_overdue 			: 0,
				//Performance
				income 				: 0,
				expense 			: 0,
				net_income 			: 0,
				//Position
				asset 				: 0,
				liability 	 		: 0,
				equity 	 			: 0
			});
		},
		loadData 			: function(){
			var self = this, obj = this.get("obj");

			this.graphDS.read();

			this.dataSource.query({
				filter: [],
				page: 1,
				pageSize: 5
			}).then(function(){
				var view = self.dataSource.view();
				
				obj.set("ar", kendo.toString(view[0].ar, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("ar_open", kendo.toString(view[0].ar_open, "n0"));
				obj.set("ar_customer", kendo.toString(view[0].ar_customer, "n0"));
				obj.set("ar_overdue", kendo.toString(view[0].ar_overdue, "n0"));

				obj.set("ap", kendo.toString(view[0].ap, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("ap_open", kendo.toString(view[0].ap_open, "n0"));
				obj.set("ap_vendor", kendo.toString(view[0].ap_vendor, "n0"));
				obj.set("ap_overdue", kendo.toString(view[0].ap_overdue, "n0"));
			});

			this.summaryDS.query({
				filter: [],
				page: 1,
				pageSize: 5
			}).then(function(){
				var view = self.summaryDS.view();
				
				obj.set("income", kendo.toString(view[0].income, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("expense", kendo.toString(view[0].expense, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("net_income", kendo.toString(view[0].net_income, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				
				obj.set("asset", kendo.toString(view[0].asset, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("liability", kendo.toString(view[0].liability, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("equity", kendo.toString(view[0].equity, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
			});
		}
	});
	// banhji.searchAdvanced =  kendo.observable({
 //    	lang 				: langVM,
 //    	contactDS 			: dataStore(apiUrl+"contacts"),
 //    	contactTypeDS 		: dataStore(apiUrl+"contacts/type"),
 //    	transactionDS 		: dataStore(apiUrl+"transactions"),
 //    	itemDS 				: dataStore(apiUrl+"items"),
 //    	accountDS 			: dataStore(apiUrl+"accounts"),
 //    	searchType 			: "",
 //    	searchText 			: "",
 //    	found 				: 0,
 //    	pageLoad 			: function(){
	// 	},
	// 	search 				: function(){
	// 		var self = this, 
	// 		searchText = this.get("searchText");
	// 		this.set("found", 0);

	// 		if(searchText){
	// 			this.contactDS.query({
	// 				filter:[
	// 					{ field:"number", operator:"like", value: searchText },
	// 					{ field:"surname", operator:"or_like", value: searchText },
	// 					{ field:"name", operator:"or_like", value: searchText },
	// 					{ field:"company", operator:"or_like", value: searchText }
	// 				],
	// 				page:1,
	// 				pageSize: 10
	// 			}).then(function(){
	// 				var found = self.get("found") + self.contactDS.total();
	// 				self.set("found", found);
	// 			});

	// 			this.transactionDS.query({
	// 				filter:[
	// 					{ field:"number", operator:"like", value: searchText }
	// 				],
	// 				page:1,
	// 				pageSize: 10
	// 			}).then(function(){
	// 				var found = self.get("found") + self.transactionDS.total();
	// 				self.set("found", found);
	// 			});

	// 			this.itemDS.query({
	// 				filter:[
	// 					{ field:"number", operator:"like", value: searchText },
	// 					{ field:"name", operator:"or_like", value: searchText }
	// 				],
	// 				page:1,
	// 				pageSize: 10
	// 			}).then(function(){
	// 				var found = self.get("found") + self.itemDS.total();
	// 				self.set("found", found);
	// 			});

	// 			this.accountDS.query({
	// 				filter:[
	// 					{ field:"number", operator:"like", value: searchText },
	// 					{ field:"name", operator:"or_like", value: searchText }
	// 				],
	// 				page:1,
	// 				pageSize: 10
	// 			}).then(function(){
	// 				var found = self.get("found") + self.accountDS.total();
	// 				self.set("found", found);
	// 			});
	// 		}
	// 	},
	// 	selectedContact 	: function(e){
	// 		e.preventDefault();

	// 		var data = e.data, 
	// 		type = this.contactTypeDS.get(data.contact_type_id);
			
	// 		if(type.parent_id==1){
	// 			banhji.customerCenter.loadContact(data.id);
	// 			banhji.router.navigate('/customer_center', false);
	// 		}else{
	// 			banhji.vendorCenter.loadContact(data.id);
	// 			banhji.router.navigate('/vendor_center', false);
	// 		}
	// 	},
	// 	selectedTransaction : function(e){
	// 		e.preventDefault();

	// 		var data = e.data;
	// 		banhji.router.navigate('/'+data.type.toLowerCase()+'/'+data.id);
	// 	},
	// 	selectedItem 		: function(e){
	// 		e.preventDefault();

	// 		var data = e.data;
	// 		banhji.router.navigate('/item_center/'+e.data.id);
	// 	},
	// 	selectedAccount 		: function(e){
	// 		e.preventDefault();

	// 		var data = e.data;
	// 		banhji.router.navigate('/accounting_center/'+e.data.id);
	// 	}
 //    });
 //    banhji.customTable =  kendo.observable({
 //    	lang 			: langVM,
 //    	id 				: 6,
 //    	txnDS 			: dataStore(apiUrl+"transactions"),
 //    	itemLineDS 		: dataStore(apiUrl+"item_lines"),
 //    	accountLineDS 	: dataStore(apiUrl+"account_lines"),
 //    	journalLineDS 	: dataStore(apiUrl+"journal_lines"),
 //    	pageLoad 		: function(){
	// 	},
	// 	searchTxn 		: function(){
	// 		var id = this.get("id");

	// 		this.txnDS.filter({ field:"id", value: id });
	// 		this.itemLineDS.filter({ field:"transaction_id", value: id });
	// 		this.accountLineDS.filter({ field:"transaction_id", value: id });
	// 		this.journalLineDS.filter({ field:"transaction_id", value: id });
	// 	}
 //    });





	

	/*************************************************
	*   APP CENTER		  							 *
	*************************************************/	
	// banhji.appCenter = kendo.observable({
	// 	lang 				: langVM,
	// 	dataSource 			: dataStore(apiUrl + "customer_modules/dashboard"),
	// 	topCustomerDS 		: dataStore(apiUrl + "customer_modules/top_customer"),
	// 	topARDS 			: dataStore(apiUrl + "customer_modules/top_ar"),
	// 	topProductDS 		: dataStore(apiUrl + "inventory_modules/top_sale_product"),
	// 	graphDS 			: dataStore(apiUrl + "customer_modules/monthly_sale"),
	// 	windowVisible 		: false,
	// 	window1Visible 		: false,
	// 	windowItemVisible 	: false,
	// 	obj 				: {},
	// 	pageLoad 			: function(){
	// 		this.loadData();
	// 	},
	// 	openWindow			: function(){
 //      		//this.addType();

 //         	this.set("windowVisible", true);
 //      	},
 //      	closeWindow 		: function(){
 //      		//this.dataSource.cancelChanges();

 //      		this.set("windowVisible", false);
 //      	},
 //      	openWindow1			: function(){
 //      		//this.addType();

 //         	this.set("window1Visible", true);
 //      	},
 //      	closeWindow1 		: function(){
 //      		//this.dataSource.cancelChanges();

 //      		this.set("window1Visible", false);
 //      	},
	// 	setObj 				: function(){
	// 		this.set("obj", {
	// 			//Sale
	// 			sale 			: 0,
	// 			sale_customer 	: 0,
	// 			sale_product 	: 0,
	// 			sale_ordered 	: 0,
	// 			//Order
	// 			so 				: 0,
	// 			so_avg 			: 0,
	// 			so_open 		: 0,
	// 			//AR
	// 			ar 				: 0,
	// 			ar_open 		: 0,
	// 			ar_customer 	: 0,
	// 			ar_overdue 		: 0
	// 		});
	// 	},
	// 	loadData 			: function(){
	// 		var self = this, obj = this.get("obj");

	// 		this.graphDS.read();

	// 		this.dataSource.query({
	// 			filter: []
	// 		}).then(function(){
	// 			var view = self.dataSource.view();
				
	// 			obj.set("sale", kendo.toString(view[0].sale, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
	// 			obj.set("sale_customer", kendo.toString(view[0].sale_customer, "n0"));
	// 			obj.set("sale_product", kendo.toString(view[0].sale_product, "n0"));
	// 			obj.set("sale_ordered", kendo.toString(view[0].sale_ordered, "n0"));

	// 			obj.set("so", kendo.toString(view[0].so, "n0"));
	// 			obj.set("so_avg", kendo.toString(view[0].so_avg, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));				
	// 			obj.set("so_open", kendo.toString(view[0].so_open, "n0"));

	// 			obj.set("ar", kendo.toString(view[0].ar, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
	// 			obj.set("ar_open", kendo.toString(view[0].ar_open, "n0"));
	// 			obj.set("ar_customer", kendo.toString(view[0].ar_customer, "n0"));
	// 			obj.set("ar_overdue", kendo.toString(view[0].ar_overdue, "n0"));
	// 		});

	// 		this.topCustomerDS.query({
	// 			filter: []
	// 		});

	// 		this.topARDS.query({
	// 			filter: []
	// 		});

	// 		this.topProductDS.query({
	// 			filter: []
	// 		});										
	// 	}
	// });
	// banhji.riceMill = kendo.observable({
	// 	lang 				: langVM,
	// 	dataSource 			: dataStore(apiUrl + "customer_modules/dashboard"),
	// 	vendorDS 			: dataStore(apiUrl + "vendor_modules/dashboard"),
	// 	itemDS 				: dataStore(apiUrl + "inventory_modules/dashboard"),
	// 	topARDS 			: dataStore(apiUrl + "customer_modules/top_ar"),
	// 	topAPDS 			: dataStore(apiUrl + "vendor_modules/top_ap"),
	// 	topPurchaseProductDS: dataStore(apiUrl + "inventory_modules/top_purchase_product"),
	// 	graphDS 			: dataStore(apiUrl+"cash_modules/cash_in_out"),
	// 	cashConcycleDS		: dataStore(apiUrl+"accounting_modules/ratio_analysis"),
	// 	quickRatio			: 0,
	// 	currentRatio 		: 0,
	// 	cashRatio  			: 0,
	// 	wcSale 				: 0,
	// 	grossProfitMargin 	: 0,
	// 	profitMargin 		: 0,
	// 	returnOnAsset 		: 0,
	// 	roce 				: 0,
	// 	arCollectionPeriod 	: 0,
	// 	apPaymentPeriod 	: 0,
	// 	inventoryTurnOver 	: 0,
	// 	ccc 				: 0,
	// 	obj 				: {},
	// 	pageLoad 			: function(){
	// 		this.loadData();

			
	// 	},
	// 	setObj 				: function(){
	// 		this.set("obj", {
	// 			//Sale
	// 			sale 			: 0,
	// 			sale_customer 	: 0,
	// 			sale_product 	: 0,
	// 			sale_ordered 	: 0,
	// 			//Order
	// 			so 				: 0,
	// 			so_avg 			: 0,
	// 			so_open 		: 0,
	// 			//AR
	// 			ar 				: 0,
	// 			ar_open 		: 0,
	// 			ar_customer 	: 0,
	// 			ar_overdue 		: 0,

	// 			//Purchase
	// 			purchase 			: 0,
	// 			purchase_supplier 	: 0,
	// 			purchase_product 	: 0,
	// 			purchase_ordered 	: 0,
	// 			//PO
	// 			po 					: 0,
	// 			po_avg 				: 0,
	// 			po_open 			: 0,
	// 			//AP
	// 			ap 					: 0,
	// 			ap_open 			: 0,
	// 			ap_supplier 		: 0,
	// 			ap_overdue 			: 0
	// 		});
	// 	},
	// 	loadData 			: function(){
	// 		var self = this, obj = this.get("obj");

	// 		this.graphDS.read();

	// 		//Load RECEIVABLES
	// 		this.dataSource.query({
	// 			filter: []
	// 		}).then(function(){
	// 			var view = self.dataSource.view();
				
	// 			obj.set("sale", kendo.toString(view[0].sale, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
	// 			obj.set("sale_customer", kendo.toString(view[0].sale_customer, "n0"));
	// 			obj.set("sale_product", kendo.toString(view[0].sale_product, "n0"));
	// 			obj.set("sale_ordered", kendo.toString(view[0].sale_ordered, "n0"));

	// 			obj.set("so", kendo.toString(view[0].so, "n0"));
	// 			obj.set("so_avg", kendo.toString(view[0].so_avg, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));				
	// 			obj.set("so_open", kendo.toString(view[0].so_open, "n0"));

	// 			obj.set("ar", kendo.toString(view[0].ar, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
	// 			obj.set("ar_open", kendo.toString(view[0].ar_open, "n0"));
	// 			obj.set("ar_customer", kendo.toString(view[0].ar_customer, "n0"));
	// 			obj.set("ar_overdue", kendo.toString(view[0].ar_overdue, "n0"));
	// 		});

	// 		//Load PAYABLES
	// 		this.vendorDS.query({
	// 			filter: [],
	// 			page: 1,
	// 			pageSize: 100
	// 		}).then(function(){
	// 			var view = self.vendorDS.view();
				
	// 			obj.set("purchase", kendo.toString(view[0].purchase, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
	// 			obj.set("purchase_supplier", kendo.toString(view[0].purchase_supplier, "n0"));
	// 			obj.set("purchase_product", kendo.toString(view[0].purchase_product, "n0"));
	// 			obj.set("purchase_ordered", kendo.toString(view[0].purchase_ordered, "n0"));

	// 			obj.set("po", kendo.toString(view[0].po, "n0"));
	// 			obj.set("po_avg", kendo.toString(view[0].po_avg, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));				
	// 			obj.set("po_open", kendo.toString(view[0].po_open, "n0"));

	// 			obj.set("ap", kendo.toString(view[0].ap, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
	// 			obj.set("ap_open", kendo.toString(view[0].ap_open, "n0"));
	// 			obj.set("ap_supplier", kendo.toString(view[0].ap_supplier, "n0"));
	// 			obj.set("ap_overdue", kendo.toString(view[0].ap_overdue, "n0"));
	// 		});

	// 		//Load Inventory Value
	// 		this.itemDS.query({
	// 			filter: []
	// 		}).then(function(){
	// 			var view = self.itemDS.view();
				
	// 			obj.set("inventory_value", kendo.toString(view[0].inventory_value, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
	// 			obj.set("gross_profit_margin", kendo.toString(view[0].gross_profit_margin, "p"));				
	// 			obj.set("inventory_turnover_day", kendo.toString(view[0].inventory_turnover_day, "n0"));				
	// 		});

	// 		//Load Cash Conversion Cycle
	// 		this.cashConcycleDS.query({
	// 			filter: [],
	// 			page: 1,
	// 			pageSize: 100
	// 		}).then(function(){
	// 			var view = self.cashConcycleDS.view();				
				
	// 			self.set("quickRatio", kendo.toString(view[0].quickRatio, "n"));
	// 			self.set("currentRatio", kendo.toString(view[0].currentRatio, "n"));
	// 			self.set("cashRatio", kendo.toString(view[0].cashRatio, "n"));
				
	// 			self.set("wcSale", kendo.toString(view[0].wcSale, "p"));
	// 			self.set("grossProfitMargin", kendo.toString(view[0].grossProfitMargin, "p"));
	// 			self.set("profitMargin", kendo.toString(view[0].profitMargin, "p"));
	// 			self.set("returnOnAsset", kendo.toString(view[0].returnOnAsset, "n"));
				
	// 			self.set("roce", kendo.toString(view[0].roce, "p"));
	// 			self.set("arCollectionPeriod", kendo.toString(view[0].arCollectionPeriod, "n"));
	// 			self.set("apPaymentPeriod", kendo.toString(view[0].apPaymentPeriod, "n"));
	// 			self.set("inventoryTurnOver", kendo.toString(view[0].inventoryTurnOver, "n"));
	// 			self.set("ccc", kendo.toString(view[0].ccc, "n"));
	// 		});

	// 		this.topARDS.query({
	// 			filter: []
	// 		});

	// 		this.topAPDS.query({
	// 			filter: []
	// 		});

	// 		this.topPurchaseProductDS.query({
	// 			filter: []
	// 		});								
	// 	}
	// });
	// banhji.riceReportCenter = kendo.observable({
 //    	lang 				: langVM,
 //    	dataSource			: dataStore(apiUrl+"accounting_modules/ratio_analysis"),
 //    	quickRatio			: 0,
	// 	currentRatio 		: 0,
	// 	cashRatio  			: 0,
	// 	wcSale 				: 0,
	// 	grossProfitMargin 	: 0,
	// 	profitMargin 		: 0,
	// 	returnOnAsset 		: 0,
	// 	roce 				: 0,
	// 	arCollectionPeriod 	: 0,
	// 	apPaymentPeriod 	: 0,
	// 	inventoryTurnOver 	: 0,
	// 	ccc 				: 0,
 //    	pageLoad 			: function(){
	// 		var self = this;

	// 		this.dataSource.query({
	// 			filter: [],
	// 			page: 1,
	// 			pageSize: 100
	// 		}).then(function(){
	// 			var view = self.dataSource.view();				
				
	// 			self.set("quickRatio", kendo.toString(view[0].quickRatio, "n"));
	// 			self.set("currentRatio", kendo.toString(view[0].currentRatio, "n"));
	// 			self.set("cashRatio", kendo.toString(view[0].cashRatio, "n"));
				
	// 			self.set("wcSale", kendo.toString(view[0].wcSale, "p"));
	// 			self.set("grossProfitMargin", kendo.toString(view[0].grossProfitMargin, "p"));
	// 			self.set("profitMargin", kendo.toString(view[0].profitMargin, "p"));
	// 			self.set("returnOnAsset", kendo.toString(view[0].returnOnAsset, "n"));
				
	// 			self.set("roce", kendo.toString(view[0].roce, "p"));
	// 			self.set("arCollectionPeriod", kendo.toString(view[0].arCollectionPeriod, "n"));
	// 			self.set("apPaymentPeriod", kendo.toString(view[0].apPaymentPeriod, "n"));
	// 			self.set("inventoryTurnOver", kendo.toString(view[0].inventoryTurnOver, "n"));
	// 			self.set("ccc", kendo.toString(view[0].ccc, "n"));
	// 		});
	// 	}
 //    });




    /*************************************************
	*   VIEW & LAYOUT	  				 		 	 *
	*************************************************/
	banhji.view = {
		layout 		: new kendo.Layout('#layout', {model: banhji.Layout}),
		blank		: new kendo.View('<div></div>'),
		index  		: new kendo.Layout("#index", {model: banhji.index}),
		menu 		: new kendo.Layout('#menu-tmpl', {model: banhji.userManagement}),
		searchAdvanced: new kendo.Layout("#searchAdvanced", {model: banhji.searchAdvanced}),
		customTable: new kendo.Layout("#customTable", {model: banhji.customTable}),

		//Accounting
		accountingDashboard: new kendo.Layout("#accountingDashboard", {model: banhji.accountingDashboard}),
		accountingCenter: new kendo.Layout("#accountingCenter", {model: banhji.accountingCenter}),
		account: new kendo.Layout("#account", {model: banhji.account}),
		txnItemList: new kendo.Layout("#txnItemList", {model: banhji.txnItemList}),
		fixedAssetItemList: new kendo.Layout("#fixedAssetItemList", {model: banhji.fixedAssetItemList}),
		txnItem: new kendo.Layout("#txnItem", {model: banhji.txnItem}),
		journal: new kendo.Layout("#journal", {model: banhji.journal}),
		cashTransaction: new kendo.Layout("#cashTransaction", {model: banhji.cashTransaction}),
		cashAdvance: new kendo.Layout("#cashAdvance", {model: banhji.cashAdvance}),
		expense: new kendo.Layout("#expense", {model: banhji.expense}),
		currencyRate: new kendo.Layout("#currencyRate", {model: banhji.currencyRate}),
		journalReport: new kendo.Layout("#journalReport", {model: banhji.journalReport}),
		journalReportBySegment: new kendo.Layout("#journalReportBySegment", {model: banhji.journalReportBySegment}),
		generalLedger: new kendo.Layout("#generalLedger", {model: banhji.generalLedger}),
		trialBalance: new kendo.Layout("#trialBalance", {model: banhji.trialBalance}),
		chartOfAccount: new kendo.Layout("#chartOfAccount", {model: banhji.chartOfAccount}),
		accountingReportCenter: new kendo.Layout("#accountingReportCenter", {model: banhji.accountingReportCenter}),
		accountingSetting: new kendo.Layout("#accountingSetting", {model: banhji.accountingSetting}),
		accountingRecurring: new kendo.Layout("#accountingRecurring", {model: banhji.accountingRecurring}),
		addAccountingprefix: new kendo.Layout("#addAccountingprefix", {model: banhji.addAccountingprefix}),

		segment: new kendo.Layout("#segment", {model: banhji.segment}),
		transactionListDate: new kendo.Layout("#transactionListDate", {model: banhji.transactionListDate}),
		recentTransactionsList: new kendo.Layout("#recentTransactionsList", {model: banhji.recentTransactionsList}),
		recurringJournalList: new kendo.Layout("#recurringJournalList", {model: banhji.recurringJournalList}),
		statementProfitLoss: new kendo.Layout("#statementProfitLoss", {model: banhji.statementProfitLoss}),
		statementProfitLossBySegment: new kendo.Layout("#statementProfitLossBySegment", {model: banhji.statementProfitLossBySegment}),
		statementFinancialPosition: new kendo.Layout("#statementFinancialPosition", {model: banhji.statementFinancialPosition}),
		statementProfitLossComparison: new kendo.Layout("#statementProfitLossComparison", {model: banhji.statementProfitLossComparison}),
		statementFinancialPositionComparison: new kendo.Layout("#statementFinancialPositionComparison", {model: banhji.statementFinancialPositionComparison}),
		statementChangesEquity: new kendo.Layout("#statementChangesEquity", {model: banhji.statementChangesEquity}),
		statementCashFlow: new kendo.Layout("#statementCashFlow", {model: banhji.statementCashFlow}),
		auditTrialReport: new kendo.Layout("#auditTrialReport", {model: banhji.auditTrialReport}),

		//Tax
		tax: new kendo.Layout("#tax", {model: banhji.tax}),
		taxReportCenter: new kendo.Layout("#taxReportCenter", {model: banhji.taxReportCenter}),
		saleJournal: new kendo.Layout("#saleJournal", {model: banhji.saleJournal}),
		purchaseJournal: new kendo.Layout("#purchaseJournal", {model: banhji.purchaseJournal}),


		//Employee
		employeeDashboard: new kendo.Layout("#employeeDashboard", {model: banhji.employeeDashboard}),
		employeeCenter: new kendo.Layout("#employeeCenter", {model: banhji.employeeCenter}),
		employee: new kendo.Layout("#employee", {model: banhji.employee}),
		employeeReportCenter: new kendo.Layout("#employeeReportCenter"),

		//Vendor
		vendorDashboard: new kendo.Layout("#vendorDashboard", {model: banhji.vendorDashboard}),
		vendorCenter: new kendo.Layout("#vendorCenter", {model: banhji.vendorCenter}),
		vendor: new kendo.Layout("#vendor", {model: banhji.vendor}),
		purchaseOrder: new kendo.Layout("#purchaseOrder", {model: banhji.purchaseOrder}),
		grn: new kendo.Layout("#grn", {model: banhji.grn}),
		purchase: new kendo.Layout("#purchase", {model: banhji.purchase}),
		purchaseReturn: new kendo.Layout("#purchaseReturn", {model: banhji.purchaseReturn}),
		paymentRefund: new kendo.Layout("#paymentRefund", {model: banhji.paymentRefund}),
		vendorDeposit: new kendo.Layout("#vendorDeposit", {model: banhji.vendorDeposit}),
		vendorSetting: new kendo.Layout("#vendorSetting", {model: banhji.vendorSetting}),
		vendorReportCenter: new kendo.Layout("#vendorReportCenter", {model: banhji.vendorReportCenter}),
		purchaseSummaryProductServices: new kendo.Layout("#purchaseSummaryProductServices", {model: banhji.purchaseSummaryProductServices}),
		expensesSummarySupplier: new kendo.Layout("#expensesSummarySupplier", {model: banhji.expensesSummarySupplier}),
		expensesDetailSupplier: new kendo.Layout("#expensesDetailSupplier", {model: banhji.expensesDetailSupplier}),
		purchaseOrderList: new kendo.Layout("#purchaseOrderList", {model: banhji.purchaseOrderList}),
		purchaseDetailProductServices: new kendo.Layout("#purchaseDetailProductServices", {model: banhji.purchaseDetailProductServices}),
		supplierTransaction: new kendo.Layout("#supplierTransaction", {model: banhji.supplierTransaction}),
		depositDetailSupplier: new kendo.Layout("#depositDetailSupplier", {model: banhji.depositDetailSupplier}),
		suppliersBalanceSummary: new kendo.Layout("#suppliersBalanceSummary", {model: banhji.suppliersBalanceSummary}),
		suppliersBalanceDetail: new kendo.Layout("#suppliersBalanceDetail", {model: banhji.suppliersBalanceDetail}),
		payablesAgingSummary: new kendo.Layout("#payablesAgingSummary", {model: banhji.payablesAgingSummary}),
		payablesAgingDetail: new kendo.Layout("#payablesAgingDetail", {model: banhji.payablesAgingDetail}),
		listBillsPaid: new kendo.Layout("#listBillsPaid", {model: banhji.listBillsPaid}),
		billPaymentList: new kendo.Layout("#billPaymentList", {model: banhji.billPaymentList}),
		productServiceList: new kendo.Layout("#productServiceList", {model: banhji.vendorSale}),
		supplierList: new kendo.Layout("#supplierList", {model: banhji.supplierList}),
		vendorRecurring: new kendo.Layout("#vendorRecurring", {model: banhji.vendorRecurring}),

		//Customer
		customerDashboard: new kendo.Layout("#customerDashboard", {model: banhji.customerDashboard}),
		customerCenter: new kendo.Layout("#customerCenter", {model: banhji.customerCenter}),
		customer: new kendo.Layout("#customer", {model: banhji.customer}),
		invoice: new kendo.Layout("#invoice", {model: banhji.invoice}),
		cashSale: new kendo.Layout("#cashSale", {model: banhji.cashSale}),
		saleOrder: new kendo.Layout("#saleOrder", {model: banhji.saleOrder}),
		quote: new kendo.Layout("#quote", {model: banhji.quote}),
		gdn: new kendo.Layout("#gdn", {model: banhji.gdn}),
		saleReturn: new kendo.Layout("#saleReturn", {model: banhji.saleReturn}),
		cashRefund: new kendo.Layout("#cashRefund", {model: banhji.cashRefund}),
		statement: new kendo.Layout("#statement", {model: banhji.statement}),
		customerDeposit: new kendo.Layout("#customerDeposit", {model: banhji.customerDeposit}),
		customerReportCenter: new kendo.Layout("#customerReportCenter", {model: banhji.customerReportCenter}),
		customerList : new kendo.Layout("#customerList"),
		customerBalance : new kendo.Layout("#customerBalance", {model: banhji.customerBalance}),
		customerSetting: new kendo.Layout("#customerSetting", {model: banhji.customerSetting}),
		customerRecurring : new kendo.Layout("#customerRecurring", {model: banhji.customerRecurring}),
		job: new kendo.Layout("#job", {model: banhji.job}),
		invoiceCustom: new kendo.Layout("#invoiceCustom", {model: banhji.invoiceCustom}),
		invoiceForm: new kendo.Layout("#invoiceForm", {model: banhji.invoiceForm}),
		invoiceForm1: new kendo.Layout("#invoiceForm1", {model: banhji.invoiceForm}),
		invoiceForm2: new kendo.Layout("#invoiceForm2", {model: banhji.invoiceForm}),
		//invoiceForm3: new kendo.Layout("#invoiceForm3", {model: banhji.invoiceForm}),
		//invoiceForm4: new kendo.Layout("#invoiceForm4", {model: banhji.invoiceForm}),
		//invoiceForm5: new kendo.Layout("#invoiceForm5", {model: banhji.invoiceForm}),
		invoiceForm6: new kendo.Layout("#invoiceForm6", {model: banhji.invoiceForm}),
		invoiceForm7: new kendo.Layout("#invoiceForm7", {model: banhji.invoiceForm}),
		invoiceForm8: new kendo.Layout("#invoiceForm8", {model: banhji.invoiceForm}),
		invoiceForm9: new kendo.Layout("#invoiceForm9", {model: banhji.invoiceForm}),
		invoiceForm10: new kendo.Layout("#invoiceForm10", {model: banhji.invoiceForm}),
		invoiceForm11: new kendo.Layout("#invoiceForm11", {model: banhji.invoiceForm}),
		invoiceForm12: new kendo.Layout("#invoiceForm12", {model: banhji.invoiceForm}),
		invoiceForm13: new kendo.Layout("#invoiceForm13", {model: banhji.invoiceForm}),
		invoiceForm14: new kendo.Layout("#invoiceForm14", {model: banhji.invoiceForm}),
		invoiceForm15: new kendo.Layout("#invoiceForm15", {model: banhji.invoiceForm}),
		invoiceForm16: new kendo.Layout("#invoiceForm16", {model: banhji.invoiceForm}),
		invoiceForm17: new kendo.Layout("#invoiceForm17", {model: banhji.invoiceForm}),
		invoiceForm18: new kendo.Layout("#invoiceForm18", {model: banhji.invoiceForm}),
		invoiceForm19: new kendo.Layout("#invoiceForm19", {model: banhji.invoiceForm}),
		invoiceForm20: new kendo.Layout("#invoiceForm20", {model: banhji.invoiceForm}),
		invoiceForm21: new kendo.Layout("#invoiceForm21", {model: banhji.invoiceForm}),
		invoiceForm22: new kendo.Layout("#invoiceForm22", {model: banhji.invoiceForm}),
		invoiceForm23: new kendo.Layout("#invoiceForm23", {model: banhji.invoiceForm}),
		invoiceForm24: new kendo.Layout("#invoiceForm24", {model: banhji.invoiceForm}),
		invoiceForm25: new kendo.Layout("#invoiceForm25", {model: banhji.invoiceForm}),
		invoiceForm26: new kendo.Layout("#invoiceForm26", {model: banhji.invoiceForm}),
		invoiceForm27: new kendo.Layout("#invoiceForm27", {model: banhji.invoiceForm}),
		invoiceForm28: new kendo.Layout("#invoiceForm28", {model: banhji.invoiceForm}),
		invoiceForm29: new kendo.Layout("#invoiceForm29", {model: banhji.invoiceForm}),
		invoiceForm30: new kendo.Layout("#invoiceForm30", {model: banhji.invoiceForm}),
		invoiceForm31: new kendo.Layout("#invoiceForm31", {model: banhji.invoiceForm}),
		invoiceForm32: new kendo.Layout("#invoiceForm32", {model: banhji.invoiceForm}),
		invoiceForm33: new kendo.Layout("#invoiceForm33", {model: banhji.invoiceForm}),
		invoiceForm34: new kendo.Layout("#invoiceForm34", {model: banhji.invoiceForm}),
		invoiceForm35: new kendo.Layout("#invoiceForm35", {model: banhji.invoiceForm}),
		invoiceForm36: new kendo.Layout("#invoiceForm36", {model: banhji.invoiceForm}),
		invoiceForm37: new kendo.Layout("#invoiceForm37", {model: banhji.invoiceForm}),
		invoiceForm38: new kendo.Layout("#invoiceForm38", {model: banhji.invoiceForm}),
		invoiceForm39: new kendo.Layout("#invoiceForm39", {model: banhji.invoiceForm}),
		invoiceForm40: new kendo.Layout("#invoiceForm40", {model: banhji.invoiceForm}),
		invoiceForm41: new kendo.Layout("#invoiceForm41", {model: banhji.invoiceForm}),
		invoiceForm42: new kendo.Layout("#invoiceForm42", {model: banhji.invoiceForm}),
		//Caritas Company
		formCaritasExpense: new kendo.Layout("#formCaritasExpense", {model: banhji.invoiceForm}),
		formCaritasJournal: new kendo.Layout("#formCaritasJournal", {model: banhji.invoiceForm}),

		saleSummaryByCustomer: new kendo.Layout("#saleSummaryByCustomer", {model: banhji.saleSummaryByCustomer}),
		saleDetailByCustomer: new kendo.Layout("#saleDetailByCustomer", {model: banhji.saleDetailByCustomer}),
		saleSummaryByProduct: new kendo.Layout("#saleSummaryByProduct", {model: banhji.saleSummaryByProduct}),
		saleDetailByProduct : new kendo.Layout("#saleDetailByProduct", {model: banhji.saleDetailByProduct}),
		customerTransactionList: new kendo.Layout("#customerTransactionList", {model: banhji.customerTransactionList}),
		depositDetailByCustomer: new kendo.Layout("#depositDetailByCustomer", {model: banhji.depositDetailByCustomer}),		
		customerBalanceSummary : new kendo.Layout("#customerBalanceSummary", {model: banhji.customerBalanceSummary}),
		customerBalanceDetail : new kendo.Layout("#customerBalanceDetail", {model: banhji.customerBalanceDetail}),
		receivableAgingSummary : new kendo.Layout("#receivableAgingSummary", {model: banhji.receivableAgingSummary}),
		receivableAgingDetail : new kendo.Layout("#receivableAgingDetail", {model: banhji.receivableAgingDetail}),
		collectInvoice : new kendo.Layout("#collectInvoice", {model: banhji.collectInvoice}),
		collectionReport : new kendo.Layout("#collectionReport", {model: banhji.collectionReport}),
		invoiceList : new kendo.Layout("#invoiceList", {model: banhji.invoiceList}),
		saleJobEngagement: new kendo.Layout("#saleJobEngagement", {model: banhji.saleJob}),
		saleOrderList: new kendo.Layout("#saleOrderList", {model: banhji.saleOrderList}),

		//Sale
		saleDashboard: new kendo.Layout("#saleDashboard", {model: banhji.saleDashboard}),
		saleCenter: new kendo.Layout("#saleCenter", {model: banhji.saleCenter}),
		sale: new kendo.Layout("#sale", {model: banhji.sale}),
		saleDetail: new kendo.Layout("#saleDetail", {model: banhji.saleDetail}),
		saleReportCenter: new kendo.Layout("#saleReportCenter", {model: banhji.saleReportCenter}),
		saleRecurring : new kendo.Layout("#saleRecurring", {model: banhji.saleRecurring}),
		saleInventoryPositionSummary: new kendo.Layout("#saleInventoryPositionSummary", {model: banhji.inventoryPositionSummary}),

		//Inventory		
		itemDashBoard: new kendo.Layout("#itemDashBoard", {model: banhji.itemDashBoard}),
		itemCenter: new kendo.Layout("#itemCenter", {model: banhji.itemCenter}),
		item: new kendo.Layout("#item", {model: banhji.item}),
		itemService: new kendo.Layout("#itemService", {model: banhji.itemService}),
		nonInventoryPart: new kendo.Layout("#nonInventoryPart", {model: banhji.nonInventoryPart}),
		itemPrice: new kendo.Layout("#itemPrice", {model: banhji.itemPrice}),
		itemCatalog: new kendo.Layout("#itemCatalog", {model: banhji.itemCatalog}),
		itemAssembly: new kendo.Layout("#itemAssembly", {model: banhji.itemAssembly}),
		itemAdjustment: new kendo.Layout("#itemAdjustment", {model: banhji.itemAdjustment}),
		itemSetting: new kendo.Layout("#itemSetting", {model: banhji.itemSetting}),
		internalUsage: new kendo.Layout("#internalUsage", {model: banhji.internalUsage}),
		serviceSetting: new kendo.Layout("#serviceSetting", {model: banhji.serviceSetting}),
		itemReportCenter: new kendo.Layout("#itemReportCenter", {model: banhji.itemReportCenter}),
		inventoryPositionSummary: new kendo.Layout("#inventoryPositionSummary", {model: banhji.inventoryPositionSummary}),
		inventoryPositionDetail: new kendo.Layout("#inventoryPositionDetail", {model: banhji.inventoryPositionDetail}),
		inventoryTurnoverList: new kendo.Layout("#inventoryTurnoverList", {model: banhji.inventorySale}),
		inventorySaleItemAnalysis: new kendo.Layout("#inventorySaleItemAnalysis", {model: banhji.inventorySale}),
		inventoryMovementSummary: new kendo.Layout("#inventoryMovementSummary", {model: banhji.inventorySale}),
		inventoryMovementDetail: new kendo.Layout("#inventoryMovementDetail", {model: banhji.inventorySale}),
		inventorySaleByItem: new kendo.Layout("#inventorySaleByItem", {model: banhji.inventorySaleByItem}),
		inventoryList: new kendo.Layout("#inventoryList", {model: banhji.inventoryList}),		
		inventoryPurchaseByVendorSummary: new kendo.Layout("#inventoryPurchaseByVendorSummary", {model: banhji.inventoryPurchaseByVendorSummary}),
		inventoryPurchaseByVendorDetail: new kendo.Layout("#inventoryPurchaseByVendorDetail", {model: banhji.inventoryPurchaseByVendorDetail}),
		fixedAssets: new kendo.Layout("#fixedAssets", {model: banhji.fixedAssets}),
		itemRecurring: new kendo.Layout("#itemRecurring", {model: banhji.itemRecurring}),
		cashMovement: new kendo.Layout("#cashMovement", {model: banhji.cashMovement}),
		cashPositionReport: new kendo.Layout("#cashPositionReport", {model: banhji.cashPositionReport}),
		cashCollectionReport: new kendo.Layout("#cashCollectionReport", {model: banhji.cashSales}),
		cashPaymentReport: new kendo.Layout("#cashPaymentReport", {model: banhji.cashPaymentReport}),
		cashAdvanceReport: new kendo.Layout("#cashAdvanceReport", {model: banhji.cashAdvanceReport}),

		//Cash Managment
		cashDashboard: new kendo.Layout("#cashDashboard", {model: banhji.cashDashboard}),
		cashCenter: new kendo.Layout("#cashCenter", {model: banhji.cashCenter}),
		cash: new kendo.Layout("#cash", {model: banhji.cash}),
		cashList : new kendo.Layout("#cashList", {model: banhji.cashList}),		
		cashDeposit: new kendo.Layout("#cashDeposit", {model: banhji.cashDeposit}),
		cashReportCenter: new kendo.Layout("#cashReportCenter"),
		cashier: new kendo.Layout("#cashier", {model: banhji.cashier}),
		reconcile: new kendo.Layout("#reconcile", {model: banhji.reconcile}),
		cashReceipt: new kendo.Layout("#cashReceipt", {model: banhji.cashReceipt}),
		cashPayment: new kendo.Layout("#cashPayment", {model: banhji.cashPayment}),
		cashFlowForecast: new kendo.Layout("#cashFlowForecast", {model: banhji.cashFlowForecast}),
		cashSetting: new kendo.Layout("#cashSetting", {model: banhji.cashSetting}),

		//Cash Management Dashbaord
		cashManagementDashboard: new kendo.Layout("#cashManagementDashboard", {model: banhji.cashManagementDashboard}),
		
		//Document
		documents: new kendo.Layout("#documents", {model: banhji.fileManagement}),

		//Report
		reportDashboard: new kendo.Layout("#reportDashboard", {model: banhji.reportDashboard}),
		profitabilitySummaryJob: new kendo.Layout("#profitabilitySummaryJob", {model: banhji.profitabilitySummaryJob}),
		profitabilityDetailJob: new kendo.Layout("#profitabilityDetailJob", {model: banhji.profitabilityDetailJob}),

		//Imports
		imports: new kendo.Layout("#importView", {model: banhji.importView}),

		//App Center
		appCenter: new kendo.Layout("#appCenter", {model: banhji.appCenter}),
		riceMill: new kendo.Layout("#riceMill", {model: banhji.riceMill}),
		riceReportCenter: new kendo.Layout("#riceReportCenter", {model: banhji.riceReportCenter}),

		//Help Center
		helpCenter: new kendo.Layout("#helpCenter", {model: banhji.helpCenter}),

		//Menu
		accountingMenu: new kendo.View("#accountingMenu", {model: langVM}),
		employeeMenu: new kendo.View("#employeeMenu", {model: langVM}),
		vendorMenu: new kendo.View("#vendorMenu", {model: langVM}),
		customerMenu: new kendo.View("#customerMenu", {model: langVM}),
		cashMenu: new kendo.View("#cashMenu", {model: langVM}),
		inventoryMenu: new kendo.View("#inventoryMenu", {model: langVM}),
		taxMenu: new kendo.View("#taxMenu", {model: langVM}),
		saleMenu: new kendo.View("#saleMenu", {model: langVM}),
		riceMillMenu: new kendo.View("#riceMillMenu", {model: langVM})	
	};
	banhji.router = new kendo.Router({
		init: function() {	
			var language = JSON.parse(localStorage.getItem('userData/lang'));	
			switch(language) {
				case "KH": 
					langVM.set('lang', km_KH);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
					break;
				case "EN":
					langVM.set('lang', en_US);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
					break;
				default: 
					langVM.set('lang', en_US);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
			}
			localforage.getItem('user', function(err, data){
				if (err) {
					
				} else {
					$('#current-section').html('|&nbsp;Company');
					$('#home-menu').addClass('active');
					banhji.view.layout.render("#wrapperApplication");
					banhji.index.set('companyName', data.institute.name);
					banhji.index.set('companyLogo', data.institute.logo);
					var blank = new kendo.View('#blank-tmpl');
					banhji.view.layout.showIn('#menu', banhji.view.menu);
					if(userPool.getCurrentUser() == null) {
						window.location.replace(baseUrl + "login");
					}
					banhji.aws.getImage();
				}
			});
		},
		routeMissing: function(e) {
			// banhji.view.layout.showIn("#layout-view", banhji.view.missing);
			console.log("no resource found.")
		}
	});
	/* Login page */
	banhji.router.route('/', function(){
		var blank = new kendo.View('#blank-tmpl');
		var admin = JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).role : 0;
        if(admin != 1) {
        	window.location.replace("<?php echo base_url(); ?>admin");
        } else {
        	banhji.view.layout.showIn('#content', banhji.view.index);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			$('#main-top-navigation').append('<li><a href="\#">Home</a></li>');
			$('#current-section').text("");
			$("#secondary-menu").html("");
			banhji.index.getLogo();
			banhji.index.pageLoad();
			banhji.pageLoaded["index"] = true;
        }

        window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '387834344756149',
	      xfbml      : true,
	      version    : 'v2.7'
	    });
	    FB.AppEvents.logPageView();
	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));

	});
	// banhji.router.route("/search_advanced", function(){
	// 	if(!banhji.userManagement.getLogin()){
	// 		banhji.router.navigate('/manage');
	// 	}else{
	// 		var vm = banhji.searchAdvanced;
	// 		banhji.view.layout.showIn("#content", banhji.view.searchAdvanced);
			
	// 		if(banhji.pageLoaded["search_advanced"]==undefined){
	// 			banhji.pageLoaded["search_advanced"] = true;
	// 		}

	// 		vm.pageLoad();
	// 	}
	// });
	// banhji.router.route("/custom_table", function(){
	// 	if(!banhji.userManagement.getLogin()){
	// 		banhji.router.navigate('/manage');
	// 	}else{
	// 		var vm = banhji.customTable;
	// 		banhji.view.layout.showIn("#content", banhji.view.customTable);
			
	// 		if(banhji.pageLoaded["custom_table"]==undefined){
	// 			banhji.pageLoaded["custom_table"] = true;

	// 		}

	// 		vm.pageLoad();
	// 	}
	// });



	/*************************************************
	*   APP CENTER ROUTER  							 	 *
	*************************************************/
	// banhji.router.route("/app_center", function(){
	// 	banhji.accessMod.query({
	// 		filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
	// 	}).then(function(e){
	// 		var allowed = false;
	// 		if(banhji.accessMod.data().length > 0) {
	// 			for(var i = 0; i < banhji.accessMod.data().length; i++) {
	// 				if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
	// 					allowed = true;
	// 					break;
	// 				}
	// 			}
	// 		} 
	// 		if(allowed) {
	// 			banhji.view.layout.showIn("#content", banhji.view.appCenter);
	// 			banhji.view.layout.showIn('#menu', banhji.view.menu);
	// 			banhji.view.menu.showIn('#secondary-menu', banhji.view.appMenu);
				
	// 			//eraseCookie("isshow");
	// 			var isshow = readCookie("cusVisit");
				
	// 		    if (isshow != 1) {
	// 		        createCookie("cusVisit", 1);
	// 				$("a.aCustomer").click();
	// 			}

	// 			var vm = banhji.appCenter;
	// 			banhji.userManagement.addMultiTask("App Center","app_center",null);
	// 			if(banhji.pageLoaded["appCenter"]==undefined){
	// 				banhji.pageLoaded["appCenter"] = true;

	// 				vm.setObj();
	// 			}
	// 			vm.pageLoad();
	// 		} else {
	// 			window.location.replace(baseUrl + "admin");
	// 		}
	// 	});
	// });
	// banhji.router.route("/rice_mill", function(){
	// 	banhji.accessMod.query({
	// 		filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
	// 	}).then(function(e){
	// 		var allowed = false;
	// 		if(banhji.accessMod.data().length > 0) {
	// 			for(var i = 0; i < banhji.accessMod.data().length; i++) {
	// 				if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
	// 					allowed = true;
	// 					break;
	// 				}
	// 			}
	// 		} 
	// 		if(allowed) {
	// 			banhji.view.layout.showIn("#content", banhji.view.riceMill);
	// 			banhji.view.layout.showIn('#menu', banhji.view.menu);
	// 			banhji.view.menu.showIn('#secondary-menu', banhji.view.riceMillMenu);
				
	// 			//eraseCookie("isshow");
	// 			var isshow = readCookie("cusVisit");
				
	// 		    if (isshow != 1) {
	// 		        createCookie("cusVisit", 1);
	// 				$("a.aCustomer").click();
	// 			}

	// 			var vm = banhji.riceMill;
	// 			banhji.userManagement.addMultiTask("Rice Mill","rice_mill",null);
	// 			if(banhji.pageLoaded["riceMill"]==undefined){
	// 				banhji.pageLoaded["riceMill"] = true;

	// 				vm.setObj();
	// 			}
	// 			vm.pageLoad();
	// 		} else {
	// 			window.location.replace(baseUrl + "admin");
	// 		}
	// 	});
	// });
	// banhji.router.route("/rice_report_center", function(){
	// 	banhji.accessMod.query({
	// 		filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
	// 	}).then(function(e){
	// 		var allowed = false;
	// 		if(banhji.accessMod.data().length > 0) {
	// 			for(var i = 0; i < banhji.accessMod.data().length; i++) {
	// 				if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
	// 					allowed = true;
	// 					break;
	// 				}
	// 			}
	// 		} 
	// 		if(allowed) {
	// 			banhji.view.layout.showIn("#content", banhji.view.riceReportCenter);
	// 			banhji.view.layout.showIn('#menu', banhji.view.menu);
	// 			banhji.view.menu.showIn('#secondary-menu', banhji.view.riceMillMenu);
				
	// 			//eraseCookie("isshow");
	// 			var isshow = readCookie("cusVisit");
				
	// 		    if (isshow != 1) {
	// 		        createCookie("cusVisit", 1);
	// 				$("a.aCustomer").click();
	// 			}

	// 			var vm = banhji.riceReportCenter;
	// 			banhji.userManagement.addMultiTask("Rice Report Center","rice_report_center",null);
	// 			if(banhji.pageLoaded["riceReportCenter"]==undefined){
	// 				banhji.pageLoaded["riceReportCenter"] = true;

	// 				vm.setObj();
	// 			}
	// 			vm.pageLoad();
	// 		} else {
	// 			window.location.replace(baseUrl + "admin");
	// 		}
	// 	});
	// });






	$(function() {
		banhji.router.start();
		banhji.source.pageLoad();
		//console.log($(location).attr('hash').substr(1));

		var cognitoUser = userPool.getCurrentUser();
		cognitoUser.getSession(function(err, session) {
          	if(session) {
            	// window.location.replace(baseUrl + "rrd/");
          	} else {
            	window.location.replace(baseUrl + "login/");
          	}
        });

		function createCookie(name,value,days) {
		    if (days) {
		        var date = new Date();
		        date.setTime(date.getTime()+(days*24*60*60*1000000000000000));
		        var expires = "; expires="+date.toGMTString();
		    }
		    else var expires = "";
		    document.cookie = name+"="+value+expires+"; path=/";
		}
		function readCookie(name) {
		    var nameEQ = name + "=";
		    var ca = document.cookie.split(';');
		    for(var i=0;i < ca.length;i++) {
		        var c = ca[i];
		        while (c.charAt(0)==' ') c = c.substring(1,c.length);
		        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		    }
		    return null;
		}
		function eraseCookie(name) {
		    createCookie(name,"");
		}
	});
</script>