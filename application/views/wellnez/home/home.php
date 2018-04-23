<div id="wrapperApplication" class="wrapper"></div>
<!--load before somthing not yet done -->
<div id="holdpageloadhide" style="display:block;text-align: center;position: fixed;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
	<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
</div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<!-- <div id="menu" class="menu"></div> -->
	<div id="content"></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
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
	@media (min-width: 768px){
		html.no-touch.sticky-top:not(.animations-gpu) #content {
		    padding-top: 0;
		}
	}
	.span6 a{
		color: #fff;
	}
	.home .bg-green{
		background: #0eac00;
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
	.nopadding-right .height250 .img img{
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
		    width: 1024px;
		}
	}
</style>
<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
	<div class="container" id="myDiv">
		<div class="row home">
			<div class="span12">
				<div class="row">
					<div class="span6 nopadding-right">
						<a href="pos">
							<div class="bg-green height250 top-left" style="background: #fff; color: #0eac00; box-shadow: none;">
								<div class="img">
									<img src="<?php echo base_url();?>assets/spa/icon/pos-green.png" >
								</div>
								<p class="textBig">Point of Sale</p>
							</div>
						</a>
					</div>
					<div class="span6" >
						<div class="row">
							<a href="session">
								<div class="span6 paddingLeftRigth">
									<div class="bg-green height250">
										<div class="img">
											<img src="<?php echo base_url();?>assets/spa/icon/session.png" >
										</div>
										<p class="textSmall">Session Management</p>
									</div>
								</div>
							</a>
							<a href="books">
								<div class="span6 nopadding-left">
									<div class="bg-green height250 top-rigth">
										<div class="img">
											<img src="<?php echo base_url();?>assets/spa/icon/book.png" >
										</div>
										<p class="textSmall">Booking Management</p>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="span12">
				<div class="row paddingTopBottom">
					<div class="span6 nopadding-right">
						<a href="services">
							<div class="bg-green height250">
								<div class="img">
									<img src="<?php echo base_url();?>assets/spa/icon/serving.png" >
								</div>
								<p class="textBig">Servicing Customers</p>
							</div>
						</a>
					</div>
					<div class="span6" >
						<div class="row">
							<div class="span6 paddingLeftRigth">
								<a href="pay">
									<div class="bg-green height250">
										<div class="img">
											<img src="<?php echo base_url();?>assets/spa/icon/pay.png" >
										</div>
										<p class="textSmall">Receipt</p>
									</div>
								</a>
							</div>
							<div class="span6 nopadding-left">
								<a href="reports">
									<div class="bg-green height250">
										<div class="img">
											<img src="<?php echo base_url();?>assets/spa/icon/report.png" >
										</div>
										<p class="textSmall">Reports</p>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="span12">
				<div class="row">
					<div class="span6" >
						<div class="row">
							<div class="span4 nopadding-right">
								<a href="customer">
									<div class="bg-green height100 bottom-left">
										<div class="img">
											<img src="<?php echo base_url();?>assets/spa/icon/customers.png" >
										</div>
										<p>Customer</p>
									</div>
								</a>
							</div>
							<div class="span4 paddingLeftRigth">
								<a href="rooms">
									<div class="bg-green height100">
										<div class="img">
											<img src="<?php echo base_url();?>assets/spa/icon/rooms-facilities.png" >
										</div>
										<p>Rooms/ facilities</p>
									</div>
								</a>
							</div>
							<div class="span4 no-padding">
								<a href="employee">
									<div class="bg-green height100">
										<div class="img">
											<img src="<?php echo base_url();?>assets/spa/icon/serving.png" >
										</div>
										<p>Therapist</p>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="span6 ">
						<div class="row">
							<div class="span6">
								<div class="row">
									<div class="span6 paddingLeftRigth">
										<a href="loyalty">
											<div class="bg-green height100">
												<div class="img" style="padding-left: 31%; padding-top: 10%;">
													<img src="<?php echo base_url();?>assets/spa/icon/loyalty.png" >
												</div>
												<p>Cards</p>
											</div>
										</a>
									</div>
									<div class="span6 no-padding" style="padding-right: 2px;">
										<a href="setting">
											<div class="bg-green height100">
												<div class="img" style="padding-left: 31%; padding-top: 10%;">
													<img src="<?php echo base_url();?>assets/spa/icon/loyalty.png" > 
												</div>
												<p>Setting</p>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="span6 paddingLeft" style="padding-left: 0;">
								<a href="<?php echo base_url()?>rrd" target="_blank">
									<div class="bg-green height100 bottom-rigth" style="background: #0e213e;">
										<div class="img" style="width: 100%; padding: 22px 0 0;">
											<img src="<?php echo base_url();?>assets/spa/banhji-logo.png" style="width: 100%;">
										</div>
									</div>
								</a>
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