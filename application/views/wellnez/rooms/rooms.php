<div id="wrapperApplication" class="wrapper"></div>
<!--load before somthing not yet done -->
<div id="holdpageloadhide" style="display:block;text-align: center;position: fixed;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
	<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
</div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">	
	<div id="content"></div>
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
<style >
	#productListView{
		border: none;
	}
	.demo-section.span12{
		padding: 15px;
		margin-bottom: 1px;
		background: #0eac00;
		border-radius: 0 0 10px 10px;
	}
	.product {
	    float: left;
	    position: relative;
	    width: 129px;
	    height: 180px;
	    padding: 0;
	    cursor: pointer;
	    background: #fff;
	    margin-right: 2px;
	    margin-bottom: 1px;
	}
	.listWrapper{
		padding-right: 0;
		width: 47%;
	}
	.product img {	    
	    height: 110px;
	    margin-bottom: 5px;
	    border-bottom: 1px solid #0eac00;
	    width: 100%;
	    padding-bottom: 15px;
	}
	.product h3 {
	    margin: 0 auto;
	    width: 100%;
	    overflow: hidden;
	    font-size: .9em;
	    text-transform: uppercase;
	    color: #333;
	    font-weight: 700;
	    text-align: center;
	    height: 35px;
	    padding: 0;
	    margin: 0;
	    background: #ccc;
	}
	.topnav.addNew {
	    display: inline-block;
	    background: #203864;
	    padding: 3px 10px 3px 10px;
	    margin: 0;
	    line-height: 23px;
	    border: 1px solid #fff;
	    border-radius: 3px;
	}
	.topnav.addNew li {
	    list-style: none;
	}
	.topnav.addNew li a {
	    color: #fff;
	}
	#posProductList {
	    overflow: scroll;
	    border: #ccc 1px solid;
	    background: #fff;
	    padding: 15px;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.costom-grid {
	    clear: both;
	    margin-bottom: 15px;
	    border-radius: 0px;
	    border-width: 1px 0px 2px 0px;
	    border-style: solid;
	    border-color: rgb(221, 221, 221);
	    overflow-x: auto;
	    overflow-y: auto;
	}
	.costom-grid table tr th {
	    font-weight: 700 !important;
	    font-size: 13px !important;
	    background: #1c3b19 !important;
	    color: #fff;
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
	.btn-center-text {
	    background: #213863;
	    display: flex;
	    align-items: center;
	    justify-content: space-around;
	    border-radius: 5px !important;
	}
	#pager{
		margin-top: 15px;
	    float: left;
	    width: 98.2%;
	}
	.pos table.table-customer th{
		background: #1c3b19;
		
	}
	.pos table th{
		background: #203864 ;
	}
	@media (min-width: 768px){
		html.no-touch.sticky-top:not(.animations-gpu) #content {
		    padding-top: 0;
		}
	}
	.botton .button-service{
		background: #0eac00;
	    padding: 10px;
	    float: left;
	    width: 100%;
	    border-radius: 5px 5px 0 0;
	    margin-bottom: 1px;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
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
		background: #0eac00;
	    padding: 13px;
	    border-radius: 0 0 0 5px;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.botton .button-book .img{
		width: 38px;
	    margin-left: 8px;
	    margin-bottom: 4px;
	}
	.botton .button-book .img img{
		width: 100%
	}
	.botton .button-book p{
		margin-bottom: 0;
	}

	.botton .button-pay{
		background: #0eac00;
	    padding: 17px 17px 10px 17px;
	    text-align: center;
	    margin-left: 1px;
	    text-align: center;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.botton .button-pay .img{
		width: 38px;
	    margin-left: 8px;
	    margin-bottom: 4px;
	}
	.botton .button-pay .img img{
		width: 100%
	}
	.botton .button-pay p{
		margin-bottom: 0
	}
	.button-cancel{
		background: #1c3b19;
	    width: 100%;
	    text-align: center;
	    margin-left: 1px;
	    margin-bottom: 0;
	    border-radius: 0 0 5px 0;
	    line-height: 39px;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.button-cancel span{
		font-size: 45px;
	    padding: 5px;
	    float: left;
	    width: 100%;
	}
	.listWrapper{
		background: #0eac00;
	    padding: 0 0 15px 0;
	    margin-bottom: 1px;
	    width: 100%;
	    float: left;
	    border-radius: 10px 10px 0 0;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.table.table-white {
	    background: #fff;
	    color: #333;
	}
	.k-icon.k-i-seek-w,
	.k-icon.k-i-arrow-w,
	.k-icon.k-i-arrow-e,
	.k-icon.k-i-seek-e{
		margin-top: 5px;
	}
	#pager {
	    margin-top: 15px;
	    float: left;
	    width: 99.5%;
	}
	.addRooms{
		padding: 8px 15px;
		float: left;
		text-align: center;
		background: #1c3b19;
		color: #fff;
		margin-top: 15px;
		margin-left: 15px;
	}
	a:hover {
		color: #fff;
	}
	.customerCenter .example {
	    background: #fff;
	    width: 100%;
	    text-align: left;
	    position: relative;
	    padding: 15px;
	    border-radius: 10px;
	    float: left;
	    color: #333;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.box-generic {
	    background: #0B0B3B;
	    clear: both;
	    display: inline-block;
	    height: auto !important;
	    padding: 15px;
	    position: relative;
	    width: 100%;
	    text-align: right;
	    margin-top: 15px;
	}
	.box-generic .btn-save {
	    background: #609450;
	    color: #fff;
	    border: none;
	    padding: 3px 20px;
	}
	.box-generic .btn-main {
	    background: #609450;
	    color: #fff;
	    border: none;
	    padding: 3px 20px;
	    float: left;
	}
</style>
<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
	<div id="ntf1" data-role="notification"></div>
	<div class="container">
		<div class="row pos">
			<div class="span12">
				<div style="position: relative;overflow: hidden;">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div class="row" style="padding: 0;">
						<div class="span12">
							<div class="listWrapper">
								<div class="row">
									
									<div class="span6" style="padding-right: 1px; width: 50%;">
										<a href="#/room" class="addRooms">Add Room</a>
										<div class="innerAll" style="height: 45px; padding-bottom: 0; padding: 15px 0 0 15px; float: left; width: 100%;">
											<div class="widget-search separator bottom" style="padding: 0;">
												<a class="btn btn-default pull-right" data-bind="click: search" style="padding: 7px 10px;"><i class="icon-search"></i></a>
												<div class="overflow-hidden">
													<input style="height: 30px; padding: 5px; border: 1px solid #ccc; color: #333; " type="search" placeholder="Number or Name..." data-bind="value: searchText, events:{change: search}">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="demo-section k-content wide span12" style="box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);">
								<div class="demo-section k-content wide">
									<div 
										id="productListView"
										data-role="listview"
										data-template="item-list-view-template"
										data-auto-bind="true"
										data-bind="source: roomDS">
									</div>
									<div id="pager" class="k-pager-wrap"
								    	 data-role="pager"
								    	 data-auto-bind="true"
							             data-bind="source: roomDS">
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

<script id="item-list-view-template" type="text/x-kendo-template">
	<div class="product" style="text-align: center;">
		<h3>#:name#</h3>
		<p style="text-align: center">#:square_meter# sqm</p>
		
		<a href="\#/room/#= id#">Edit</a>
	</div>
</script>
<script id="sale-summary-template" type="text/x-kendo-template">
	<div class="item-row">
		<div class="item-name">
			#= item.name #
		</div>
		<div class="item-price">
			<span data-format="c2" data-bind="text: amount"></span>
		</div>
	</div>
</script>
<script id="favorite-category-list-template" type="text/x-kendo-template">
	<button class="btn btn-inverse btn-round" data-value="1" data-bind="click: categorySelect">
		#=name#
	</button>
</script>
<script id="item-group-list-template" type="text/x-kendo-template">
	<button class="btn btn-inverse btn-round" data-value="1" data-bind="click: groupSelect">
		#=name# [#=abbr#]
	</button>
</script>
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=abbr##=number#</span>	
	<span>#=name#</span>	
</script>
<script id="employee-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: rmEmployee }"></i>
			#:banhji.Index.employeeAR.indexOf(data)+1#      
		</td>
		<td>#= name#</td>
	</tr>
</script>
<script id="room-select-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: rmRoom }"></i>
			#:banhji.Index.roomAR.indexOf(data)+1#      
		</td>
		<td>#= name#</td>
	</tr>
</script>
<script id="customer-select-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: rmCustomer }"></i>
			#:banhji.Index.customerAR.indexOf(data)+1#      
		</td>
		<td>#= name#</td>
	</tr>
</script>
<script id="room-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=number#</span>	
	<span>#=name#</span>	
</script>
<script id="book-list-tmpl" type="text/x-kendo-template">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: rmBook }"></i>
			#:banhji.Index.bookDS.indexOf(data)+1#      
		</td>
		<td>#= name#</td>
		<td>#= phone#</td>
		<td>#= room#</td>
		<td>#= employee#</td>
		<td>#= date#</td>
		<td align="center">   			
   			<div class="edit-buttons">       
		        <a class="k-button" data-bind="click: editBook"><span class="k-icon k-i-edit"></span></a>
			    <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		   	</div>		   	
   		</td>
	</tr>
</script>

<script id="Room" type="text/x-kendo-template">
	<div class="container">
		<div class="row customerCenter">
			<div class="span12">
				<div class="example">
					<span class="glyphicons no-js remove_2 pull-right" data-bind="click: cancel"><i></i></span>
					<div class="row">
						<div class="span6">
							<h2 style="margin-bottom: 15px;">Add Room</h2>
							<div style="overflow: hidden">
								<div class="span6" style="padding-left: 0;">
									<p>Branch</p>
									<input data-role="dropdownlist"
						                   data-auto-bind="false"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.branch_id,
						                              source: branchDS"
						                   style="width: 100%; height: 30px;"
						            />
								</div>
								<div class="span6">
									<p>Sqm</p>
									<input type="text" class="k-textbox" 
										data-bind="value: obj.square_meter"
										placeholder="Sqm... " style="width: 100%; margin-bottom: 15px;border: 1px solid #ccc; height: 30px;"/>
								</div>
								<div class="span12" style="padding-left: 0;">
									<p>Name</p>
									<input type="text" class="k-textbox" 
										data-bind="value: obj.name"
										placeholder="Name... " style="width: 100%; margin-bottom: 15px;border: 1px solid #ccc; height: 30px;"/>
								</div>
							</div>
							<div class="span12" style="padding-right: 0;"><a style="float: right; padding: 5px 15px;    background: green; color: #fff; margin-bottom: 5px;" data-bind="visible: isEdit, click: clearItem">Clear</a></div>
					    	<select id="listbox1" data-role="listbox"
				                data-text-field="name"
				                data-value-field="id" 
				                data-toolbar='{
				                	tools: ["moveUp", "moveDown", "transferTo", "transferFrom", "transferAllTo", "transferAllFrom", "remove"]
				            	}'
				                data-connect-with="listbox2"
				                data-auto-bind="true"
				                data-bind="source: itemDS" style="width: 50%; min-height: 550px;">
				            </select>
				           	
				            <select id="listbox2" data-role="listbox"
				                data-connect-with="listbox1"
				                data-text-field="name"
				                data-value-field="id"
				                data-auto-bind="false"
				                data-bind="source: obj.items"
				                style="width: 49%; min-height: 550px;">
				            </select>
				            <br>
				            <div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: itemDS"></div>
						</div>
						<div class="span6" style="padding-left:0; margin-top: 35px;">
							<h2 style="margin-bottom: 15px;">Information</h2>
							<textarea style="resize: none;border: 1px solid #ccc;" class="span12" rows="8" data-bind="value: obj.description" placeholder=""></textarea>
						</div>
					</div>

					<div class="box-generic">
						<button data-role="button" class="k-button btn-main" role="button" aria-disabled="false" tabindex="0" data-bind="click: save">
                  			Maintenance
              			</button>

              			<button data-role="button" class="k-button btn-save" role="button" aria-disabled="false" tabindex="0" data-bind="click: save">
                  			Save
              			</button>
              			&nbsp;
              			<button data-role="button" class="k-button btn-cancel" role="button " aria-disabled="false" tabindex="0" data-bind="click: cancel">
                  			Cancel
                		</button>
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