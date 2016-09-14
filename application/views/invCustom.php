<div id="slide-form">
	<div class="customer-background">
		<div class="container-960">					
			<div id="example" class="k-content">
		    	<div class="hidden-print pull-right">
		    		<span class="glyphicons no-js remove_2" 
						data-bind="click: cancel"><i></i></span>						
				</div>
		        <h2 style="padding:0 15px;"">CUSTOM FORMS</h2>
			    <br>	
			    <div class="row" style="margin-left:0;">			   				
					<div class="span4">	
						<div class="span12">
							<select class="span12 selectType" 
								data-role="dropdownlist" 
								data-value-primitive="true" 
								data-text-field="name" 
								data-value-field="id" 
								data-bind="value: obj.type, 
											source: selectTypeList, 
											events:{change: onChange}" ></select>
						</div>
						<div class="span12" style="margin-bottom: 10px;">
							<input type="text" id="formName" name="Form Name" class="k-textbox" placeholder="Form Name" required validationMessage="" data-bind="value: obj.name" style="width: 100%;" />
						</div>
						<div class="span12">
							<h2 class="btn btn-block btn-primary">Form Style</h2>
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
						<div class="span12" style="margin-left:0; margin-top: 10px;">
							<h2 class="btn btn-block btn-primary">Form Color</h2>
							<div class="colorPalatte span12">
								<div class="" style="margin-top: 15px;">
									<div data-selectable="true" data-bind="value: obj.color, events: { change : colorCC }" data-tile-size='{ width: 60, height: 35 }' data-role="colorpalette" data-columns="6" data-palette='[ "#ffffff", "#000000", "#eeece1", "#1f497d", "#4f81bd", "#c0504d", "#9bbb59", "#dbeef3", "#8064a2", "#f79646", "#f2f2f2", "#7f7f7f", "#ddd9c3", "#c6d9f0", "#dbe5f1", "#f2dcdb", "#ebf1dd", "#e5e0ec"]'></div>
                            	</div>
                            </div>
						</div>
						<div class="span12" style="margin-left:0; margin-top: 10px;padding-bottom: 30px;">
							<h2 class="btn btn-block btn-primary">Form Appearance</h2>
							<div class="colorPalatte span12">
								<div class="" style="margin-top: 15px;">
									<input type="text" id="formtitle" name="Form Title" class="k-textbox" placeholder="Form Title" required validationMessage="" data-bind="value: obj.title" style="width: 100%;" />
									<textarea data-bind="value: obj.note, text: obj.note" class="span12" style="min-height: 100px;margin-top: 15px;"></textarea>
                            	</div>
                            </div>
						</div>
					</div>
					<div class="span8" id="invFormContent" style="padding-left:0;padding-right: 0;width: 63%;border:1px solid #eee;margin-bottom:20px;">

					</div>
				</div>
				<!-- Form actions -->
				<div class="box-generic bg-action-button">
					<div id="ntf1" data-role="notification"></div>
					<div class="row">
						<div class="span3">
							
						</div>
						<div class="span9" align="right">
							<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 80px;"><i></i> Save New</span>
							<span id="saveClose" class="btn btn-icon btn-success glyphicons power" style="width: 80px;"><i></i> Save Close</span>			
						</div>
					</div>
				</div>
				<!-- // Form actions END -->	
			</div>							
		</div>
	</div>
</div>