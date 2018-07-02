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

<!-- Property Setting -->
<script id="Properties" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" >
                        	<h2 style="margin-bottom: 20px;">Property Setting</h2>
                        	<div class="vtabs" style="width: 100%;">
                        		<div class="col-md-12">
		                        	<ul class="nav nav-tabs tabs-vertical" role="tablist" style="width: 15%; float: left;">
									    <li class="nav-item"> 
									    	<a class="nav-link active" data-toggle="tab" href="#property-tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> 
									    		<span class="hidden-xs-down">Property</span>
									    	</a> 
									    </li>	
								    </ul>
								    <ul class="nav nav-tabs tabs-vertical" role="tablist" style="width: 15%; float: left;">
								    	<li class="nav-item" style="float:rar"> 
									    	<a class="nav-link" data-toggle="tab" href="#area-tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> 
									    		<span class="hidden-xs-down">Area</span>
									    	</a> 
									    </li>
									</ul>
								</div>

				                <div class="tab-content" style="float: left; width: 100%; padding: 10px;">
					                <div class="tab-pane active" id="property-tab" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<a class="btn-icon btn-primary glyphicons circle_plus" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" href="#/property"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
	                                            <table style="width: 100%;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	                                                <thead>
	                                                    <tr>
	                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.number">Number</span></th>
	                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.name">Name</span></th>
	                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.abbr">Abbr</span></th>
	                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.mobile">Mobile</span></th>
	                                                        <th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.status">Status</span></th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody data-role="listview"
	                                                        data-template="property-setting-template"
	                                                        data-bind="source: propertyDS"></tbody>
	                                            </table>
											</div>
										</div>
					                </div>
					                <div class="tab-pane" id="area-tab" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div style="clear: both;">
	                                                <input data-role="dropdownlist"
	                                                   class="span3"
	                                                   style="padding-right: 1px;height: 32px;" 
	                                                   data-option-label="(--- Select ---)"
	                                                   data-auto-bind="false"  
	                                                   data-value-primitive="true"
	                                                   data-text-field="name"
	                                                   data-value-field="id"
	                                                   data-bind="value: areaProperty,
	                                                              source: propertyDS" />
	                                                <input data-bind="
	                                                    value: areaName" type="text" placeholder="Location" style="height: 32px; padding: 5px; margin-right: 10px; margin-left: 10px;"  class="span3 k-textbox k-invalid" />
	                                                <input data-bind="
	                                                    value: areaAbbr" type="text" placeholder="Abbr" style="height: 32px; padding: 5px; margin-right: 10px;" class="span3 k-textbox k-invalid" />
	                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addArea"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
	                                            </div>
	                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	                                                <thead>
	                                                    <tr>
	                                                        <th style="text-align: center;"><span>Property</span></th>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.location">Location</span></th>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.abbr">Abbr</span></th>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody data-role="listview"     
	                                                    data-template="area-setting-template"
	                                                    data-edit-template="area-edit-template"
	                                                    data-auto-bind="false"
	                                                    data-bind="source: areaDS"></tbody>
	                                            </table>

	                                            <br>
	                                            <p data-bind="visible: blocSelect"><span >Location Name</span>: <span data-bind="text: blocNameShow"></span></p>
	                                            <table data-bind="visible: blocSelect" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	                                                <thead>
	                                                    <tr>
	                                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
	                                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody data-role="listview"                             
	                                                        data-template="pole-template"
	                                                        data-auto-bind="false"
	                                                        data-edit-template="pole-edit-template"
	                                                        data-bind="source: poleDS"></tbody>
	                                            </table>

	                                            <br>
	                                            <p data-bind="visible: poleSelect"><span>Zone Name</span>: <span data-bind="text: poleNameShow"></span></p>
	                                            <table data-bind="visible: poleSelect" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	                                                <thead>
	                                                    <tr>
	                                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
	                                                        <th style="vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody data-role="listview"                             
	                                                        data-template="box-template"
	                                                        data-auto-bind="false"
	                                                        data-edit-template="box-edit-template"
	                                                        data-bind="source: boxDS"></tbody>
	                                            </table>
	                                            <!-- Pole Item Window -->
	                                            <div id="addPole"
	                                                data-role="window"
	                                                     data-width="250"
	                                                     data-height="120"
	                                                     data-actions="{}"
	                                                     data-resizable="false"
	                                                     data-position="{top: '30%', left: '37%'}"                       
	                                                     data-bind="visible: poleVisible">
	                                                <table>
	                                                    <tr style="border-bottom: 8px solid #fff;">
	                                                        <td width="35%"><span data-bind="text: lang.lang.name"></span></td>
	                                                        <td>
	                                                            <input class="k-textbox" placeholder="Name ..." data-bind="attr: {placeholder: lang.lang.name}, value: poleName" style="width: 100%;">
	                                                        </td>
	                                                    </tr>
	                                                </table>

	                                                <br>
	                                                <div style="text-align: center;">
	                                                    <span style="margin-bottom: 0;" class="btn btn-success btn-icon glyphicons ok_2" data-bind="click: savePole"><i></i><span data-bind="text: lang.lang.save"></span></span>

	                                                    <span class="btn btn-danger btn-icon glyphicons remove_2" data-bind="click: closePoleWin"><i></i><span data-bind="text: lang.lang.close"></span></span>  
	                                                </div>
	                                            </div>
	                                            <!-- Box Item Window -->
	                                            <div id="addBox"
	                                                data-role="window"
	                                                     data-width="250"
	                                                     data-height="120"
	                                                     data-actions="{}"
	                                                     data-resizable="false"
	                                                     data-position="{top: '30%', left: '37%'}"
	                                                     data-bind="visible: boxVisible">
	                                                <table>
	                                                    <tr style="border-bottom: 8px solid #fff;">
	                                                        <td width="35%"><span data-bind="text: lang.lang.name"></span></td>
	                                                        <td>
	                                                            <input class="k-textbox" placeholder="Name ..." data-bind="attr: {placeholder: lang.lang.name}, value: boxName" style="width: 100%;">
	                                                        </td>
	                                                    </tr>
	                                                </table>

	                                                <br>
	                                                <div style="text-align: center;">
	                                                    <span style="margin-bottom: 0;" class="btn btn-success btn-icon glyphicons ok_2" data-bind="click: saveBox"><i></i><span data-bind="text: lang.lang.save"></span></span>
	                                                    <span class="btn btn-danger btn-icon glyphicons remove_2" data-bind="click: closeBoxWin"><i></i><span data-bind="text: lang.lang.close"></span></span>  
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
</script>
<script id="property-setting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= number #</td>
        <td>#= name #</td>
        <td>#= abbr #</td>
        <td>#= mobile #</td>
        <td style="text-align: center;">
            #if(status==1){#
                <span class="btn-action glyphicons ok_2 btn-success" title="Active"><i></i> Active</span>
            #}else if(status==2){#
                <span class="btn-action glyphicons lock btn-danger" title="Void"><i></i> </span>
            #}else{#
                <span class="btn-action glyphicons unlock btn-danger" title="Inactive"><i></i> Inactive</span>
            #}#
            <a class="btn-action glyphicons pencil btn-success" title="Edit" href="\#/property/#= id #"><i></i> Edit</a>
        </td>
    </tr>
</script>
<script id="area-setting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= property_name #</td>
        <td>#= name #</td>
        <td>#= abbr #</td>
        <td align="center">                
            <span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
            |
            <span style="cursor: pointer;" data-bind="click: viewPole"><i class="icon-view"></i> <span data-bind="text: lang.lang.view_item">View Item</span></span>
            |
            <span style="cursor: pointer;" data-bind="click: showPole"><i class="icon-plus icon-white"></i> <span data-bind="text: lang.lang.add_sub_location">Add Zone</span></span>
        </td> 
    </tr>
</script>
<script id="area-edit-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <input data-role="dropdownlist"
                   data-option-label="(--- Select ---)"       
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: property_id,
                              source: propertyDS" />
        </td>
            <td align="center">
    
            <input type="text" class="k-textbox" data-bind="value: name" name="ProductName" required="required" validationMessage="required" />
        </td>
            <td align="center">
            <input type="text" class="k-textbox" data-bind="value: abbr" name="abbr" required="required" validationMessage="required" />
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
            <span style="cursor: pointer;" data-bind="click: showBox"><i class="icon-plus icon-white"></i> <span >Add Sub Zone</span></span>
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
<script id="Property" type="text/x-kendo-template">
    <div class="container">
        <div class="row-fluid">
            <div class="background">
                <div class="row-fluid">
                    <div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
                    </div>
                    <div id="example" class="k-content">
                        <h2 >Property</h2>
                        <div class="hidden-print pull-right">
                            <span class="glyphicons no-js remove_2" 
                                data-bind="click: cancel"><i></i></span>
                        </div>
                        <div class="clear"></div>
                        <div class="row-fluid">
                            <div class="col-xs-6 col-sm-6 well">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label >
                                                <span data-bind="text: lang.lang.type">Type</span> <span style="color:red">*</span>
                                            </label>
                                            <select data-role="dropdownlist"
                                               data-value-primitive="true"
                                               data-text-field="name"
                                               data-value-field="id"
                                               data-option-label="( ... Select ... )"
                                               data-bind="
                                                source: selectPropertyType,
                                                value: obj.type_id"
                                               style="width: 100%;" ></select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label >
                                                <span>No.</span> <span style="color:red">*</span>
                                            </label>
                                            <input 
                                                class="k-textbox" 
                                                data-bind="
                                                    value: obj.number"
                                                placeholder="No." 
                                                required data-required-msg="required"
                                                style="width: 100%;" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6" >
                                        <div class="control-group">
                                            <label ><span>Name</span> <span style="color:red">*</span></label>          
                                            <br>
                                            <input
                                                class="k-textbox" 
                                                data-bind="
                                                    value: obj.name" 
                                                placeholder="Name" 
                                                style="width: 100%;" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <div class="col-xs-5" style="padding-left: 0;">
                                                <label ><span data-bind="text: lang.lang.abbr">Abbr</span></label>
                                                <input 
                                                    class="k-textbox" 
                                                    placeholder="Abbr" 
                                                    data-bind="
                                                        value: obj.abbr" 
                                                    style="width: 100%;" />
                                            </div>
                                            <div class="col-xs-7" style="padding-left:0;padding-right: 0;">
                                                <label ><span>Code</span></label>
                                                <input 
                                                    class="k-textbox"
                                                    placeholder="Code" 
                                                    data-bind="value: obj.code" 
                                                    style="width: 100%;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label ><span data-bind="text: lang.lang.currency">Currency</span></label>
                                            <select data-role="dropdownlist"
                                               data-value-primitive="true"
                                               data-text-field="code"
                                               data-value-field="id"
                                               data-bind="
                                                source: selectCurrency,
                                                value: obj.currency"
                                               style="width: 100%; margin-bottom: 15px;" ></select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
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
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="row-fluid">
                                    <div id="map" class="col-xs-12 col-sm-12" style="height: 155px;"></div>
                                </div>
                                <div class="separator line bottom"></div>
                                <div class="row-fluid"> 
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label for="latitute"><span data-bind="text: lang.lang.latitute"></span> </label>
                                            <div class="input-prepend">
                                                <span style="float: left;" class="add-on glyphicons direction"><i></i></span>
                                                <input style="float: left;  width: 77%; padding: 4px 8px; border: 1px solid #efefef; line-height: 20px; box-shadow: none;" type="text" class="input-large span12" data-bind="value: obj.latitute, events:{change: loadMap}" placeholder="012345.67897">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="control-group">
                                            <label for="longtitute"><span data-bind="text: lang.lang.longtitute"></span> </label>
                                            <div class="input-prepend">
                                                <span style="float: left;" class="add-on glyphicons google_maps"><i></i></span>
                                                <input style="float: left;  width: 77%;  box-shadow: none;padding: 4px 8px; border: 1px solid #efefef; line-height: 20px; box-shadow: none;" type="text" class="input-large span12" data-bind="value: obj.longtitute, events:{change: loadMap}" placeholder="012345.67897">
                                            </div>
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
                                            <a href="#tab2" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.terms_condition">Terms Condition</span></a>
                                        </li>
                                        <li class="span2 glyphicons paperclip">
                                            <a href="#tab3" data-toggle="tab"><i></i> <span>Gallery</span></a>
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
                                                    data-bind="value: obj.address" 
                                                    placeholder="Address ..." style="width: 100%;" />
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-sm-3 col-sx-12"><span data-bind="text: lang.lang.country"></span></div>
                                            <div class="col-sm-3 col-sx-12">
                                                <input data-role="dropdownlist"
                                                   data-option-label="Country ..."
                                                   data-value-primitive="true"
                                                   data-text-field="name"
                                                   data-value-field="id"
                                                   data-bind="value: obj.country_id,
                                                              source: countryDS" style="width: 100%;" />
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <span data-bind="text: lang.lang.mobile">Mobile</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind="value: obj.mobile" 
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
                                                        value: obj.province_id,
                                                        source: provinceSelect,
                                                        events: {change: provinceChange}">
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <span data-bind="text: lang.lang.telephone">Telephone</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind="
                                                        value: obj.telephone" 
                                                    placeholder="Telephone ..." style="width: 100%;" />
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
                                                        value: obj.district_id,
                                                        source: districtDS" style="width: 100%;">
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <span data-bind="text: lang.lang.email">Email</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind="value: obj.email" 
                                                    placeholder="Email ..." style="width: 100%;" />
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-xs-12 col-sm-3">
                                                <span>Total Area</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind=" value: obj.total_area" 
                                                    placeholder="Total Area ..." 
                                                    style="width: 100%;" />
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <span >Area for Rent</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind=" value: obj.area_for_rent" 
                                                    placeholder="Area for Rent ..." 
                                                    style="width: 100%;" />
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col-xs-12 col-sm-3">
                                                <span>Area of Service</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind=" value: obj.area_of_service" 
                                                    placeholder="Area of Service ..." 
                                                    style="width: 100%;" />
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <span>Common Area</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind=" value: obj.common_area" 
                                                    placeholder="Common Area ..." 
                                                    style="width: 100%;" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3">
                                                <span>Building Type</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input 
                                                    data-role="dropdownlist" 
                                                    style="width: 100%;" 
                                                    data-option-label="Building Type ..." 
                                                    data-auto-bind="true" 
                                                    data-value-primitive="true" 
                                                    data-text-field="type"
                                                    data-value-field="id"
                                                    data-bind="
                                                        value: obj.building_type,
                                                        source: buildingTypeDS" style="width: 100%;">
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <span>Near By</span>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <input class="k-textbox" 
                                                    data-bind=" value: obj.near_by" 
                                                    placeholder="Near By ..." 
                                                    style="width: 100%;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <div class="row-fluid">
                                            <div class="controls">
                                                <textarea 
                                                    class="span12" 
                                                    placeholder="Terms & Condition..." 
                                                    data-bind="value: obj.terms_condition"
                                                    style="height: 200px;">
                                                </textarea>
                                            </div>                                          
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <div class="col-xs-12 col-sm-4">
                                            <img style="width: 100%;margin-bottom: 15px;" data-bind="attr: { src: proImg1 } ">
                                            <input class="k-textbox" 
                                                    data-bind=" value: obj.img1" 
                                                    placeholder="Url ..." 
                                                    style="width: 100%;" />
                                        </div>
                                        <div class="col-xs-12 col-sm-4">
                                            <img style="width: 100%;margin-bottom: 15px;" data-bind="attr: { src: proImg2 } ">
                                            <input class="k-textbox" 
                                                    data-bind=" value: obj.img2" 
                                                    placeholder="Url ..." 
                                                    style="width: 100%;" />
                                        </div>
                                        <div class="col-xs-12 col-sm-4">
                                            <img style="width: 100%;margin-bottom: 15px;" data-bind="attr: { src: proImg3 } ">
                                            <input class="k-textbox" 
                                                    data-bind=" value: obj.img3" 
                                                    placeholder="Url ..." 
                                                    style="width: 100%;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-generic bg-action-button">
                            <div id="ntf1" data-role="notification"></div>
                            <div class="row">
                                <div class="col-sm-12" align="right">
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
    </div>
</script>
<!-- Unit -->
<script id="Units" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" >
                        	<h2 style="margin-bottom: 20px;">Units Setting</h2>
                        	<div class="vtabs" style="width: 100%;">
	                        	<ul class="nav nav-tabs tabs-vertical" role="tablist" style="width: 17%; float: left;">
								    <li class="nav-item"> 
								    	<a class="nav-link active" data-toggle="tab" href="#unit-type-tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> 
								    		<span class="hidden-xs-down">Unit Type</span>
								    	</a> 
								    </li>
								    <li class="nav-item"> 
								    	<a class="nav-link" data-toggle="tab" href="#amenity-item-tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> 
								    		<span class="hidden-xs-down">Amenity Item</span>
								    	</a> 
								    </li>
								    <li class="nav-item"> 
								    	<a class="nav-link" data-toggle="tab" href="#space-item-tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> 
								    		<span class="hidden-xs-down">Space Item</span>
								    	</a> 
								    </li>
							    </ul>
				                <div class="tab-content" style="float: left; width: 100%; padding: 10px;">
					                <div class="tab-pane active" id="unit-type-tab" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div style="clear: both;">
	                                                <input data-bind="value: cateName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />
	                                                
	                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addCate"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
	                                            </div>
	                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	                                                <thead>
	                                                    <tr>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.name">Name</span></th>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody data-role="listview"
	                                                        data-template="categorySetting-template"
	                                                        data-auto-bind="true"
	                                                        data-edit-template="category-edit-template"
	                                                        data-bind="source: categoryDS"></tbody>
	                                            </table>
											</div>
										</div>
					                </div>
					                <div class="tab-pane" id="amenity-item-tab" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div style="clear: both;">
	                                                <input data-bind="value: amenName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />  
	                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addAmen"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
	                                            </div>
	                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	                                                <thead>
	                                                    <tr>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.name">Name</span></th>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody data-role="listview"
	                                                        data-template="amenSetting-template"
	                                                        data-auto-bind="true"
	                                                        data-edit-template="amen-edit-template"
	                                                        data-bind="source: amenityDS"></tbody>
	                                            </table>
											</div>
										</div>
					                </div>
					                <div class="tab-pane" id="space-item-tab" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div style="clear: both;">
	                                                <input data-bind="value: spaceName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />
	                                                
	                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addspace"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
	                                            </div>
	                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	                                                <thead>
	                                                    <tr>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.name">Name</span></th>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody data-role="listview"
	                                                        data-template="spaceSetting-template"
	                                                        data-auto-bind="true"
	                                                        data-edit-template="space-edit-template"
	                                                        data-bind="source: spaceDS"></tbody>
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
    </div>	
</script>
<script id="categorySetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= name #</td>
        <td align="center">
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
            # if(is_system == 0) {#
                <a data-bind="click: deleteCate" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            # } #
        </td>
    </tr>
</script>
<script id="category-edit-template" type="text/x-kendo-tmpl">
    <tr>
        <td align="center">
            <input type="text" class="k-textbox" data-bind="value: name" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td align="center">
            <div class="edit-buttons">
                <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
                <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
            </div>
        </td>
    </tr>
</script>
<script id="amenSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= name #</td>
        <td align="center">
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
            # if(is_system == 0) {#
                <a data-bind="click: deleteAmen" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            # } #
        </td>
    </tr>
</script>
<script id="amen-edit-template" type="text/x-kendo-tmpl">
    <tr>
        <td align="center">
            <input type="text" class="k-textbox" data-bind="value: name" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td align="center">
            <div class="edit-buttons">
                <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
                <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
            </div>
        </td>
    </tr>
</script>
<script id="spaceSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= name #</td>
        <td align="center">
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
            # if(is_system == 0) {#
                <a data-bind="click: deleteAmen" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            # } #
        </td>
    </tr>
</script>
<script id="space-edit-template" type="text/x-kendo-tmpl">
    <tr>
        <td align="center">
            <input type="text" class="k-textbox" data-bind="value: name" name="ProductName" required="required" validationMessage="required" />
        </td>
        <td align="center">
            <div class="edit-buttons">
                <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
                <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
            </div>
        </td>
    </tr>
</script>
<!-- Utility -->
<script id="Utility" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" >
                        	<h2 style="margin-bottom: 20px;">Utility Setting</h2>
                        	<div class="vtabs" style="width: 100%;">
	                        	<ul class="nav nav-tabs tabs-vertical" role="tablist" style="width: 17%; float: left;">
								    <li class="nav-item"> 
								    	<a class="nav-link active" data-toggle="tab" href="#tariff-tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> 
								    		<span class="hidden-xs-down">Tariff</span>
								    	</a> 
								    </li>
							    </ul>
				                <div class="tab-content" style="float: left; width: 83%; padding: 10px;">
					                <div class="tab-pane active" id="tariff-tab" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div style="clear: both; ">
	                                                <input data-bind="value: tariffName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span3 k-textbox k-invalid" />
	                                                <input data-role="dropdownlist"
	                                                   class="span2"
	                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
	                                                   data-option-label="(--- Flat ---)"
	                                                   data-auto-bind="false"
	                                                   data-value-primitive="true"
	                                                   data-text-field="name"
	                                                   data-value-field="id"
	                                                   data-bind="value: tariffFlat,
	                                                              source: tariffFlatType"/>
	                                                <input data-role="dropdownlist"
	                                                   class="span3"
	                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
	                                                   data-option-label="(--- Acount ---)"
	                                                   data-auto-bind="false"       
	                                                   data-value-primitive="false"
	                                                   data-text-field="name"
	                                                   data-value-field="id"
	                                                   data-bind="value: tariffAccount,
	                                                              source: tariffAccDS"/>
	                                                <input data-role="dropdownlist"
	                                                   class="span2"
	                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
	                                                   data-option-label="(--- Currency ---)"
	                                                   data-auto-bind="false"                              
	                                                   data-value-primitive="true"
	                                                   data-text-field="code"
	                                                   data-value-field="id"
	                                                   data-bind="value: tariffCurrency,
	                                                              source: currencyDS"/>
	                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addTariff"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
	                                            </div>
	                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	                                                <thead>
	                                                    <tr>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.flat">Flat</span></th>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.account">Account</span></th>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.currency">Currency</span></th>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody data-role="listview"                             
	                                                        data-template="tariffSetting-template"
	                                                        data-edit-template="tariff-edit-template"
	                                                        data-auto-bind="false"
	                                                        data-bind="source: planItemDS"></tbody>
	                                            </table>
	                                            
	                                            <br>
	                                            <p data-bind="visible: tariffSelect"><span data-bind="text: lang.lang.tariff_name"></span>: <span data-bind="text: tariffNameShow"></span></p>
	                                            <table data-bind="visible: tariffSelect" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	                                                <thead>
	                                                    <tr>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.usage">Usage</span></th>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.price">Price</span></th>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody data-role="listview"                             
	                                                        data-template="tariff-item-template"
	                                                        data-auto-bind="false"
	                                                        data-edit-template="tariff-edit-item-template"
	                                                        data-bind="source: tariffItemDS"></tbody>
	                                            </table>
	                                            <!-- Tariff Item Window -->
	                                            <div id="addTariffItem"
	                                                    data-role="window"                       
	                                                     data-width="250"
	                                                     data-height="225"
	                                                     data-resizable="false"
	                                                     data-actions="{}"
	                                                     data-position="{top: '30%', left: '37%'}"
	                                                     data-bind="visible: windowTariffItemVisible">
	                                                <table>
	                                                    <tr style="border-bottom: 8px solid #fff;">
	                                                        <td width="35%"><span data-bind="text: lang.lang.name"></span></td>
	                                                        <td>
	                                                            <input class="k-textbox" placeholder="Item Name ..." data-bind="attr :{placeholder: lang.lang.name}, value: tariffItemName" style="width: 100%;" />
	                                                        </td>
	                                                    </tr>
	                                                    <tr style="border-bottom: 8px solid #fff;">
	                                                        <td><span data-bind="text: lang.lang.usage">Usage</span></td>
	                                                        <td>
	                                                            <input class="k-textbox" placeholder="Usage ..." data-bind="attr:{placeholder: lang.lang.usage},value: tariffItemUsage" style="width: 100%;" />
	                                                        </td>
	                                                    </tr>
	                                                    <tr style="border-bottom: 8px solid #fff;">
	                                                        <td><span data-bind="text: lang.lang.type">Usage</span></td>
	                                                        <td>
	                                                        <input data-role="dropdownlist"
	                                                               style="padding-right: 1px; height: 32px; margin-right: 10px;" 
	                                                               data-option-label="(--- Type ---)"
	                                                               data-auto-bind="false"       
	                                                               data-value-primitive="true"
	                                                               data-text-field="name"
	                                                               data-value-field="id"
	                                                               data-bind="value: tariffItemUnit,
	                                                                          source: utiType"/>
	                                                        </td>
	                                                    </tr>
	                                                    <tr style="border-bottom: 8px solid #fff;">
	                                                        <td><span data-bind="text: lang.lang.price">Price</span></td>
	                                                        <td>
	                                                            <input class="k-textbox" placeholder="Price ..." data-bind="attr:{placeholder: lang.lang.price}, value: tariffItemAmount" style="width: 100%;" />
	                                                        </td>
	                                                    </tr>
	                                                </table>

	                                                <br>
	                                                <div style="text-align: center;">
	                                                    <span style="margin-bottom: 0;" class="btn btn-success btn-icon glyphicons ok_2" data-bind="click: saveTariffItem"><i></i><span data-bind="text: lang.lang.save"></span></span>

	                                                    <span class="btn btn-danger btn-icon glyphicons remove_2" data-bind="click: closeTariffWindowItem"><i></i><span data-bind="text: lang.lang.close"></span></span>  
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
</script>
<script id="tariffSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= name#
        </td>
        <td>
            # if(is_flat == 0){# #: banhji.Setting.lang.lang.not_flat# #}else{# #: banhji.Setting.lang.lang.flat# #}#
        </td>
        <td>
            #= account.name#
        </td>
        <td align="center">
            #= _currency.code#
        </td>
        <td style="text-align: center;">   
            <span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
            |
            <span style="cursor: pointer;" data-bind="click: viewTariffItem"><i class="icon-view"></i> <span data-bind="text: lang.lang.view_tariff">View Tariff</span></span>
            |
            <span style="cursor: pointer;" data-bind="click: showTariffItem"><i class="icon-plus icon-white"></i> <span data-bind="text: lang.lang.add_tariff">Add Tariff</span></span>
        </td>           
    </tr>
</script>
<script id="tariff-edit-template" type="text/x-kendo-tmpl">
    <tr>                       
        <td>
            <input type="text" class="k-textbox" data-bind="value:name" />
        </td>
        <td align="center">
            <input data-role="dropdownlist"
               style="padding-right: 1px;height: 32px;" 
               data-auto-bind="false"                              
               data-value-primitive="true"
               data-text-field="name"
               data-value-field="id"
               data-bind="value: is_flat,
               source: tariffFlatType"/>
        </td> 
        <td>            
            <input data-role="dropdownlist"
                   data-value-primitive="false"
                   data-text-field="name"
                   data-auto-bind="true"
                   data-value-field="id"
                   data-bind="value: account,
                   source: tariffAccDS" />
        </td>
        <td>
            <input data-role="dropdownlist"
                   style="padding-right: 1px; height: 32px;" 
                   data-auto-bind="true"                               
                   data-value-primitive="false"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                   source: currencyDS"/>
        </td>  
        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>
</script>
<script id="tariff-item-template" type="text/x-kendo-tmpl">
    <tr>
        <td>#= name#</td>
        <td align="center">#= usage#</td>
        <td align="right">#= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#</td>
        <td align="center">
            <span class="k-edit-button"><i class="icon-edit"></i> Edit</span>
        </td>
    </tr>
</script>
<script id="tariff-edit-item-template" type="text/x-kendo-tmpl">
    <tr>
        <td><input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" /></td>
        <td>
            #if(banhji.Setting.tariffItemDS.indexOf(data) != 0){#
                <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:usage" />
            #}else{# #:usage# #}#
        </td>
        <td><input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" /></td>
        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>
</script>
<!-- Contract -->
<script id="Contracts" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" >
                        	<h2 style="margin-bottom: 20px;">Contract Setting</h2>
                        	<div class="vtabs" style="width: 100%;">
	                        	<ul class="nav nav-tabs tabs-vertical" role="tablist" style="width: 17%; float: left;">
								    <li class="nav-item"> 
								    	<a class="nav-link active" data-toggle="tab" data-bind="click: goRent" href="#rent-tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> 
								    		<span class="hidden-xs-down">Rent</span>
								    	</a>
								    	<a class="nav-link" data-toggle="tab" href="#service-tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> 
								    		<span class="hidden-xs-down">Service</span>
								    	</a>
								    	<a class="nav-link" data-toggle="tab" data-bind="click: goDeposit" href="#deposit-tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> 
								    		<span class="hidden-xs-down">Deposit</span>
								    	</a> 
								    	<a class="nav-link" data-bind="click: goFine" data-toggle="tab" href="#fine-tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> 
								    		<span class="hidden-xs-down">Fine</span>
								    	</a>
								    	<a class="nav-link" data-toggle="tab" href="#custom-form-tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> 
								    		<span class="hidden-xs-down">Custom Form</span>
								    	</a>
								    </li>
							    </ul>
				                <div class="tab-content" style="float: left; width: 83%; padding: 10px;">
					                <div class="tab-pane active" id="rent-tab" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
												<div style="clear: both;">
	                                                <input data-role="dropdownlist"
	                                                   class="span2"
	                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
	                                                   data-option-label="(--- Type ---)"
	                                                   data-auto-bind="false"
	                                                   data-value-primitive="true"
	                                                   data-text-field="name"
	                                                   data-value-field="id"
	                                                   data-bind="value: rentType,
	                                                              source: rentTypeDS"/>

	                                                <input data-bind="value: rentName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name ..." style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />

	                                                <input data-role="dropdownlist"
	                                                   class="span2"
	                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
	                                                   data-option-label="(--- Currency ---)"
	                                                   data-auto-bind="false"                              
	                                                   data-value-primitive="true"
	                                                   data-text-field="code"
	                                                   data-value-field="id"
	                                                   data-bind="value: rentCurrency,
	                                                              source: currencyDS"/>

	                                                <input data-role="dropdownlist"
	                                                   class="span2"
	                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
	                                                   data-option-label="(--- Acount ---)"
	                                                   data-auto-bind="false"       
	                                                   data-value-primitive="true"
	                                                   data-text-field="name"
	                                                   data-value-field="id"
	                                                   data-bind="value: rentAccount,
	                                                              source: tariffAccDS"/>

	                                                <input data-bind="value: rentPrice, attr: {placeholder: lang.lang.price}" type="text" placeholder="Name ..." style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />

	                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addRent"><i></i><span data-bind="text: lang.lang.add">Add</span></a>

	                                            </div>
	                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	                                                <thead>
	                                                    <tr>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.type">Code</span></th>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.currency">Abbr</span></th>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.account">Action</span></th>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.price">Action</span></th>
	                                                        <th style="text-align: center; vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody data-role="listview"     
	                                                    data-template="rent-setting-template"
	                                                    data-edit-template="rent-edit-template"
	                                                    data-auto-bind="false"
	                                                    data-bind="source: rentDS"></tbody>
	                                            </table>
											</div>
										</div>
					                </div>
					                <div class="tab-pane" id="service-tab" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">

											</div>
										</div>
					                </div>
					                <div class="tab-pane" id="deposit-tab" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
								                <div style="clear: both;">
			                                        <input data-bind="value: depositName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />
			                                        <input data-role="dropdownlist"
			                                           class="span2"
			                                           style="padding-right: 1px; height: 32px; margin-right: 10px;" 
			                                           data-option-label="(--- Acount ---)"
			                                           data-auto-bind="false"                              
			                                           data-value-primitive="true"
			                                           data-text-field="name"
			                                           data-value-field="id"
			                                           data-bind="value: depositAccount,
			                                                      source: depositAccDS"/>
			                                        <input data-role="dropdownlist"
			                                           class="span2"
			                                           style="padding-right: 1px; height: 32px; margin-right: 10px;" 
			                                           data-option-label="(--- Currency ---)"
			                                           data-auto-bind="false"         
			                                           data-value-primitive="true"
			                                           data-text-field="code"
			                                           data-value-field="id"
			                                           data-bind="value: depositCurrency,
			                                                      source: currencyDS"/>
			                                        <input data-bind="value: depositPrice, attr: {placeholder: lang.lang.price}" type="text" placeholder="Price" style="height: 32px; padding: 5px; margin-right: 10px;" class="span2 k-textbox k-invalid" />

			                                        <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addDeposit"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
			                                    </div>
			                                    <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
			                                        <thead>
			                                            <tr>
			                                                <th style="text-align: center;"><span data-bind="text: lang.lang.name">Name</span></th>
			                                                <th style="text-align: center;"><span data-bind="text: lang.lang.account">Account</span></th>
			                                                <th style="text-align: center;"><span data-bind="text: lang.lang.currency">Currency</span></th>
			                                                <th style="text-align: center;"><span data-bind="text: lang.lang.price">Price</span></th>
			                                                <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
			                                            </tr>
			                                        </thead>
			                                        <tbody data-role="listview"                             
			                                                data-template="depositSetting-template"
			                                                data-edit-template="deposit-edit-template"
			                                                data-auto-bind="false"
			                                                data-bind="source: planItemDS"></tbody>
			                                    </table>
			                                </div>
			                            </div>
			                        </div>
			                        <div class="tab-pane" id="fine-tab" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">
			                        			<div style="clear: both;">
	                                                <input data-bind="value: fineName, attr: {placeholder: lang.lang.name}" type="text" placeholder="Name" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span2 k-textbox k-invalid" />

	                                                <input data-role="dropdownlist"
	                                                   class="span2"
	                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
	                                                   data-option-label="-Acount-"
	                                                   data-auto-bind="false" 
	                                                   data-value-primitive="true"
	                                                   data-text-field="name"
	                                                   data-value-field="id"
	                                                   data-bind="value: fineAccount,
	                                                              source: tariffAccDS"/>

	                                                <input data-role="dropdownlist"
	                                                   class="span2"
	                                                   style="padding-right: 1px; height: 32px; margin-right: 10px;" 
	                                                   data-option-label="-Currency-"
	                                                   data-auto-bind="false"                              
	                                                   data-value-primitive="true"
	                                                   data-text-field="code"
	                                                   data-value-field="id"
	                                                   data-bind="value: fineCurrency,
	                                                              source: currencyDS"/>

	                                                <input data-bind="value: fineDay, attr: {placeholder: lang.lang.day}" type="text" placeholder="Day" style="height: 32px; padding: 5px; margin-right: 10px;" class="span2 k-textbox k-invalid" />

	                                                <input data-bind="value: finePrice, attr: {placeholder: lang.lang.price}" type="text" placeholder="Price" style="height: 32px; padding: 5px; margin-right: 10px;" class="span2 k-textbox k-invalid" />

	                                                <a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addFine"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
	                                            </div>
	                                            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	                                                <thead>
	                                                    <tr>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.name">Name</span></th>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.account">Account</span></th>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.currency">Currency</span></th>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.flat">Flat</span></th>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.day">Day</span></th>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.price">Price</span></th>
	                                                        <th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
	                                                    </tr>
	                                                </thead>
	                                                <tbody data-role="listview"                             
	                                                        data-template="findSetting-template"
	                                                        data-auto-bind="false"
	                                                        data-edit-template="find-edit-template"
	                                                        data-bind="source: planItemDS"></tbody>
	                                            </table>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="tab-pane" id="custom-form-tab" role="tabpanel">
					                	<div class="row">
											<div class="col-md-12">

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
</script>
<script id="rent-setting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            # if(unit == "ls"){#Lump Sum #}else{# m2 #}#
        </td>
        <td>
            #= name#
        </td>
        <td align="center">
            #= _currency.code#
        </td>
        <td align="center" >
            #= account.name#
        </td>
        <td align="right">#= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#</td>
        <td align="center">                
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
        </td>           
    </tr>
</script>
<script id="rent-edit-template" type="text/x-kendo-tmpl">
    <tr>                       
        <td>
            <input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-auto-bind="true"
                   data-value-field="id"
                   data-bind="value: unit,
                              source: rentTypeDS" />
        </td>    
        <td>       
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />     
            
        </td> 
        <td>
            <input data-role="dropdownlist"
                   style="padding-right: 1px;height: 32px;" 
                   data-auto-bind="true"                               
                   data-value-primitive="true"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                              source: currencyDS"/>
        </td>  
        <td>
            <input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: account_id,
                              source: tariffAccDS" />
        </td>
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" />
        </td>
        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>
</script>
<script id="depositSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= name#
        </td>
        <td align="left">
            #= account.name#
        </td>
        <td align="center">
            #= _currency.code #
        </td>
        <td align="right">
            #= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#
        </td>
        <td align="center">                
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
        </td>           
    </tr>
</script>
<script id="deposit-edit-template" type="text/x-kendo-tmpl">
    <tr>                       
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />
        </td>  
        <td>
            <input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="true"
                   data-text-field="name"
                   data-auto-bind="true"
                   data-value-field="id"
                   data-bind="value: account_id,
                              source: depositAccDS" />
        </td>    
        <td>
            <input data-role="dropdownlist"
                   style="padding-right: 1px;height: 32px;" 
                   data-auto-bind="true"                               
                   data-value-primitive="true"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                              source: currencyDS"/>
        </td>    
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" />
        </td>

        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>
</script>
<script id="serviceSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= name#
        </td>
        <td align="left">
            #= account.name#
        </td>
        <td align="center">
            #= _currency.code #
        </td>
        <td align="right">
            #= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#
        </td>
        <td align="center">
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
        </td>
    </tr>
</script>
<script id="service-edit-template" type="text/x-kendo-tmpl">
    <tr>                       
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />
        </td>  
        <td>
            <input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: account,
                              source: tariffAccDS" />
        </td>   
        <td>
            <input data-role="dropdownlist"
                   style="padding-right: 1px;height: 32px;" 
                   data-auto-bind="true"                               
                   data-value-primitive="true"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                              source: currencyDS"/>
        </td>      
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" />
        </td>

        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>
</script>
<script id="findSetting-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            #= name#
        </td>
        <td>
            #= account.name#
        </td>
        <td align="center">
            #= _currency.code #
        </td>
        <td>
            # if(is_flat == 0){# #: banhji.Setting.lang.lang.not_flat# #}else{# #: banhji.Setting.lang.lang.flat# #}#
        </td>
        <td align="right">
            #= usage#
        </td>
        <td align="right">
            #= kendo.toString(amount, _currency.locale=="km-KH"?"c0":"c", _currency.locale)#
        </td>
        <td align="center">
            <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i>
            </a>
        </td>
    </tr>
</script>
<script id="find-edit-template" type="text/x-kendo-tmpl">
    <tr>                       
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />
        </td>       
        <td>
            <input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="true"
                   data-text-field="name"
                   data-auto-bind="true"
                   data-value-field="id"
                   data-bind="value: account_id,
                              source: tariffAccDS" />
        </td>  
        <td>
            <input data-role="dropdownlist"
                   style="padding-right: 1px;height: 32px;" 
                   data-auto-bind="true"                               
                   data-value-primitive="true"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                              source: currencyDS"/>
        </td>  
        <td align="center">
            <input data-role="dropdownlist"
               style="padding-right: 1px;height: 32px;" 
               data-auto-bind="false"                              
               data-value-primitive="true"
               data-text-field="name"
               data-value-field="id"
               data-bind="value: is_flat,
                          source: tariffFlatType"/>
        </td> 
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:usage" />
        </td>
        <td>
            <input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" />
        </td>

        <td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>
</script>
