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
			  	<!-- <li>
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
			  	</li> -->
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


<!-- #############################################
##################################################
#	APP CENTER VIEW 					 		#
##################################################
############################################## -->
<script type="text/x-kendo-template" id="appCenter">
	<!-- <div  class="row-fluid saleSummaryCustomer">
		<h2 style="margin-top: 120px; float: left;">App Center</h2>
	    <br>
	</div> -->
	<span style="margin-bottom: 20px;" class="glyphicons no-js remove_2 pull-right" 
		onclick="javascript:window.history.back()"
		data-bind="click: cancel"><i></i></span>
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
					        		<ul class="row" style="margin-top: 20px; padding: 0;"
										data-role="listview" data-bind="source: dataSource.data()[0].appSubscribed"
										data-template="entity-application-list-tmpl"
									>	
					        		</ul>
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

					        	<div class="row-fluid" style="margin-top: 20px; float: left; background: #ebeef3 ; padding: 15px 20px 0px; width: 100%;">
					        		<h2>Featured</h2>
					        		<ul class="row" style="margin-top: 20px; padding: 0;"
										data-role="listview" data-bind="source: applications.dataSource"
										data-template="application-list-tmpl"
									>	
					        		</ul>
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
							    <div data-role="window"
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
								</div>

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
#	TEMPLATE LIST VIEW 					 		 #
##################################################
############################################## -->
<script id="application-list-tmpl" type="text/x-kendo-tmpl">
	<li class="col-xs-12 col-sm-6 col-md-3" style="list-style: none; float: left;  width: 22%; margin-bottom: 15px;">
		<a data-bind="click: openWindow">
			<div class="app-recommand ">
				<div class="appIcon">
					<img src="#=image#" />
				</div>
				<div class="bigappcard-details">
					<div class="bigappcard-display-name">
						#=name#
					</div>
					<div class="bigappcard-vendor-name">
						#=developer.name#
					</div>
					<div class="bigappcard-tagline">
						#=summary#
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
	</li>
</script>
<script id="entity-application-list-tmpl" type="text/x-kendo-tmpl">
	<li class="col-xs-12 col-sm-6 col-md-3" style="list-style: none; float: left;">
		<a data-bind="attr: {href:home}">
			<div class="app-recommand ">
				<div class="appIcon">
					<img src="#=image#" />
				</div>
				<div class="bigappcard-details">
					<div class="bigappcard-display-name">
						#=name#
					</div>
					<div class="bigappcard-vendor-name">
						#=developer.name#
					</div>
					<div class="bigappcard-tagline">
						#=summary#
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
	</li>
</script>
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
			this.setObj();
			this.loadData();


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

	banhji.applicationStore = new kendo.data.DataSource({
		transport: {
			read  : {
				url: baseUrl + 'v1/apps/index/',
				type: "GET",
				dataType: 'json',
				headers: {
					Uid: banhji.userData.id
				}
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
		serverFiltering: true,
		serverPaging: true,
		pageSize: 100
	});

	banhji.applicationEntityStore = new kendo.data.DataSource({
		transport: {
			read  : {
				url: baseUrl + 'v1/entities/index/' + banhji.userData.institute.id + "/modules",
				type: "GET",
				dataType: 'json',
				headers: {
					Uid: banhji.userData.id
				}
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
		serverFiltering: true,
		serverPaging: true,
		pageSize: 100
	});

	banhji.applicationViewModel = kendo.observable({
		dataSource: banhji.applicationStore
	});
	/*************************************************
	*   APP CENTER		  							 *
	*************************************************/	
	banhji.appCenter = kendo.observable({
		lang 				: langVM,
		applications 		: banhji.applicationViewModel,
		dataSource 			: banhji.applicationEntityStore,
		windowVisible 		: false,
		window1Visible 		: false,
		windowItemVisible 	: false,
		obj 				: {},
		pageLoad 			: function(){
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
		setObj 				: function(){
			this.set("obj", {
				//Sale
				sale 			: 0,
				sale_customer 	: 0,
				sale_product 	: 0,
				sale_ordered 	: 0,
				//Order
				so 				: 0,
				so_avg 			: 0,
				so_open 		: 0,
				//AR
				ar 				: 0,
				ar_open 		: 0,
				ar_customer 	: 0,
				ar_overdue 		: 0
			});
		},
		loadData 			: function(){
			var self = this, obj = this.get("obj");

			this.graphDS.read();

			this.dataSource.query({
				filter: []
			}).then(function(){
				var view = self.dataSource.view();
				
				obj.set("sale", kendo.toString(view[0].sale, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("sale_customer", kendo.toString(view[0].sale_customer, "n0"));
				obj.set("sale_product", kendo.toString(view[0].sale_product, "n0"));
				obj.set("sale_ordered", kendo.toString(view[0].sale_ordered, "n0"));

				obj.set("so", kendo.toString(view[0].so, "n0"));
				obj.set("so_avg", kendo.toString(view[0].so_avg, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));				
				obj.set("so_open", kendo.toString(view[0].so_open, "n0"));

				obj.set("ar", kendo.toString(view[0].ar, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("ar_open", kendo.toString(view[0].ar_open, "n0"));
				obj.set("ar_customer", kendo.toString(view[0].ar_customer, "n0"));
				obj.set("ar_overdue", kendo.toString(view[0].ar_overdue, "n0"));
			});

			this.topCustomerDS.query({
				filter: []
			});

			this.topARDS.query({
				filter: []
			});

			this.topProductDS.query({
				filter: []
			});										
		}
	});


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


		//App Center
		appCenter: new kendo.Layout("#appCenter", {model: banhji.appCenter}),
		riceMill: new kendo.Layout("#riceMill", {model: banhji.riceMill}),
		riceReportCenter: new kendo.Layout("#riceReportCenter", {model: banhji.riceReportCenter}),

		
		//Menu
		
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

	/*************************************************
	*   APP CENTER ROUTER  							 	 *
	*************************************************/
	banhji.router.route("/", function(){
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
			var allowed = false;
			if(banhji.accessMod.data().length > 0) {
				for(var i = 0; i < banhji.accessMod.data().length; i++) {
					if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
						allowed = true;
						break;
					}
				}
			} 
			if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.appCenter);
				banhji.view.layout.showIn('#menu', banhji.view.menu);
				banhji.appCenter.dataSource.read();
				
				banhji.userManagement.addMultiTask("App Center","app_center",null);
			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});

	$(function() {
		banhji.router.start();
		//console.log($(location).attr('hash').substr(1));

		var cognitoUser = userPool.getCurrentUser();
		cognitoUser.getSession(function(err, session) {
          	if(session) {
            	// window.location.replace(baseUrl + "rrd/");
          	} else {
            	window.location.replace(baseUrl + "login/");
          	}
        });
	});
</script>