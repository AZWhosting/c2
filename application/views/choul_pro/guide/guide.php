<link rel="stylesheet" href="<?php echo base_url()?>assets/micro/tab-page.css">
<div id="wrapperApplication" class="wrapper"></div>
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
<!-- ***************************
*	Sale Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template"></script>

<script id="homeGuide" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body table-resposive" >
                        	<h2 data-bind="">Home Guide as Video and PDF</h2>
                        	<div class="row">
                        		<div class="col-lg-4 video-wrapper">
                        			<a target="_blank" class="youtube cboxElement" <iframe="" width="560" height="315" href="https://www.youtube.com/embed/oi4PkuIyDD0?autohide=1&amp;autoplay=1&amp;controls=0 frameborder=" 0"="" allowfullscreen"=""> 
										<img class="youtube-thumb" src="http://img.youtube.com/vi/oi4PkuIyDD0/mqdefault.jpg">
										<div class="btnplay"></div>
										<div class="mask"></div>
									</a>
                        		</div>
                        		<div class="col-lg-4 ">
                        			<a target="_blank" href="<?php echo base_url(); ?>/assets/micro/pdf.pdf">
                        				<img style="height: 220px;" src="<?php echo base_url(); ?>assets/micro/img.jpeg" />
                        				<div class="mask"></div>
                        			</a>
                        		</div>
                        	</div>
			            </div>
			        </div>
	            </div>
	        </div>
        </div>
    </div>	
</script>

<script id="customerGuide" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body table-resposive" >
                        	<h2 data-bind="">Customer Guide as Video and PDF</h2>
                        	<div class="row">
                        		<div class="col-lg-4 video-wrapper">
                        			<a target="_blank" class="youtube cboxElement" <iframe="" width="560" height="315" href="https://www.youtube.com/embed/oi4PkuIyDD0?autohide=1&amp;autoplay=1&amp;controls=0 frameborder=" 0"="" allowfullscreen"=""> 
										<img class="youtube-thumb" src="http://img.youtube.com/vi/oi4PkuIyDD0/mqdefault.jpg">
										<div class="btnplay"></div>
										<div class="mask"></div>
									</a>
                        		</div>
                        		<div class="col-lg-4 ">
                        			<a target="_blank" href="<?php echo base_url(); ?>/assets/micro/pdf.pdf">
                                        <img style="height: 220px;" src="<?php echo base_url(); ?>assets/micro/img.jpeg" />
                                        <div class="mask"></div>
                                    </a>
                        		</div>
                        	</div>
			            </div>
			        </div>
	            </div>
	        </div>
        </div>
    </div>	
</script>

<script id="vendorGuide" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body table-resposive" >
                        	<h2 data-bind="">Supplier Guide as Video and PDF</h2>
                        	<div class="row">
                        		<div class="col-lg-4 video-wrapper">
                        			<a target="_blank" class="youtube cboxElement" <iframe="" width="560" height="315" href="https://www.youtube.com/embed/oi4PkuIyDD0?autohide=1&amp;autoplay=1&amp;controls=0 frameborder=" 0"="" allowfullscreen"=""> 
										<img class="youtube-thumb" src="http://img.youtube.com/vi/oi4PkuIyDD0/mqdefault.jpg">
										<div class="btnplay"></div>
										<div class="mask"></div>
									</a>
                        		</div>
                        		<div class="col-lg-4 ">
                        			<a target="_blank" href="<?php echo base_url(); ?>/assets/micro/pdf.pdf">
                                        <img style="height: 220px;" src="<?php echo base_url(); ?>assets/micro/img.jpeg" />
                                        <div class="mask"></div>
                                    </a>
                        		</div>
                        	</div>
			            </div>
			        </div>
	            </div>
	        </div>
        </div>
    </div>	
</script>

<script id="itemGuide" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body table-resposive" >
                        	<h2 data-bind="">Item Guide as Video and PDF</h2>
                        	<div class="row">
                        		<div class="col-lg-4 video-wrapper">
                        			<a target="_blank" class="youtube cboxElement" <iframe="" width="560" height="315" href="https://www.youtube.com/embed/oi4PkuIyDD0?autohide=1&amp;autoplay=1&amp;controls=0 frameborder=" 0"="" allowfullscreen"=""> 
										<img class="youtube-thumb" src="http://img.youtube.com/vi/oi4PkuIyDD0/mqdefault.jpg">
										<div class="btnplay"></div>
										<div class="mask"></div>
									</a>
                        		</div>
                        		<div class="col-lg-4 ">
                        			<a target="_blank" href="<?php echo base_url(); ?>/assets/micro/pdf.pdf">
                                        <img style="height: 220px;" src="<?php echo base_url(); ?>assets/micro/img.jpeg" />
                                        <div class="mask"></div>
                                    </a>
                        		</div>
                        	</div>
			            </div>
			        </div>
	            </div>
	        </div>
        </div>
    </div>	
</script>

<script id="cashGuide" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body table-resposive" >
                        	<h2 data-bind="">Cash Guide as Video and PDF</h2>
                        	<div class="row">
                        		<div class="col-lg-4 video-wrapper">
                        			<a target="_blank" class="youtube cboxElement" <iframe="" width="560" height="315" href="https://www.youtube.com/embed/oi4PkuIyDD0?autohide=1&amp;autoplay=1&amp;controls=0 frameborder=" 0"="" allowfullscreen"=""> 
										<img class="youtube-thumb" src="http://img.youtube.com/vi/oi4PkuIyDD0/mqdefault.jpg">
										<div class="btnplay"></div>
										<div class="mask"></div>
									</a>
                        		</div>
                        		<div class="col-lg-4 ">
                        			<a target="_blank" href="<?php echo base_url(); ?>/assets/micro/pdf.pdf">
                                        <img style="height: 220px;" src="<?php echo base_url(); ?>assets/micro/img.jpeg" />
                                        <div class="mask"></div>
                                    </a>
                        		</div>
                        	</div>
			            </div>
			        </div>
	            </div>
	        </div>
        </div>
    </div>	
</script>