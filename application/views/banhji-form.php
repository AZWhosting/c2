<!-- #############################################
##################################################
#	INVOICE FORM VIEW 					 	 	 #
##################################################
############################################## -->
<script id="invoiceCustom" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2"
							data-bind="click: cancel"><i></i></span>
					</div>
			        <h2 style="padding:0 15px;"" data-bind="text: lang.lang.custom_forms"></h2>
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
								<h2 class="btn btn-block btn-primary" style="color: #fff !important;" >Form Style</h2>
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
								<h2 class="btn btn-block btn-primary" style="color: #fff !important;">Form Color</h2>
								<div class="colorPalatte span12">
									<div class="" style="margin-top: 15px;">
										<div data-selectable="true" data-bind="value: obj.color, events: { change : colorCC }" data-tile-size='{ width: 60, height: 35 }' data-role="colorpalette" data-columns="6" data-palette='[ "#ffffff", "#000000", "#eeece1", "#1f497d", "#4f81bd", "#c0504d", "#9bbb59", "#dbeef3", "#8064a2", "#f79646", "#f2f2f2", "#7f7f7f", "#ddd9c3", "#c6d9f0", "#dbe5f1", "#f2dcdb", "#ebf1dd", "#e5e0ec"]'></div>
                                	</div>
                                </div>
							</div>
							<div class="span12" style="margin-left:0; margin-top: 10px;padding-bottom: 30px;">
								<h2 class="btn btn-block btn-primary" style="color: #fff !important;">Form Appearance</h2>
								<div class="colorPalatte span12">
									<div class="" style="margin-top: 15px;">
										<input type="text" id="formtitle" name="Form Title" class="k-textbox" placeholder="Form Title" required validationMessage="" data-bind="value: obj.title" style="width: 100%;" />
										<textarea data-bind="value: obj.note, text: obj.note" placeholder="Note" class="span12" style="min-height: 100px;margin-top: 15px;padding-left: 10px; resize: none;"></textarea>
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
								<span class="btn-btn" id="saveClose" data-bind="click: save"><span data-bind="text: lang.lang.save"></span></span>
							  	<span class="btn-btn" id="saveDraft" data-bind="click: cancel"><span data-bind="text: lang.lang.close"></span></span><!--
								<span class="btn btn-icon btn-primary glyphicons ok_2" data-bind="click: save" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save"></span></span>
								<span class="btn btn-icon btn-success glyphicons power" data-bind="click: cancel" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.close"></span></span> -->
							</div>
						</div>
					</div>
					<!-- // Form actions END -->
				</div>
			</div>
		</div>
	</div>
</script>
<script id="invoiceForm" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2"
							data-bind="click: cancel"><i></i></span>
					</div>
			        <h2>PREVIEW FORM</h2>
				    <br>
				    <div class="row" style="margin-left:0;">
						<div class="span10" id="invFormContent" style="min-height: 300px;border:1px solid #ccc; margin: 0 auto;float:none;padding-bottom:20px;margin-bottom: 30px;">
							<div id="loading-inv" style="margin-left: -15px;text-align: center;position: absolute;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
								<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
							</div>
						</div>
					</div>
					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<span id="notification"></span>

						<span id="savePrint" class="btn btn-icon btn-primary glyphicons print" data-bind="click: printGrid" style="width: 80px; float: right; color: #fff; border: 0;"><i></i>Print / PDF</span>
						<!--span id="savePDF" class="btn btn-icon btn-success glyphicons edit" data-bind="click: savePDF" style="width: 120px;"><i></i> Save PDF</span-->
					</div>
					<!-- // Form actions END -->
				</div>
			</div>
		</div>
	</div>
</script>
<script id="invoiceForm1" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 50%;float: left;">
                <h3 style="text-align:left;" data-bind="html: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span style="font-size: 12px;" data-bind="text: company.telephone"></span></p>
                    <p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span  data-bind="text: company.address"></span></p>
                </div>
            </div>
           	<!-- <div style="float: right; width: 20%;">
           		<div id="invQR"></div>
           	</div> -->
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<!-- <div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 100%;">
                        	<p >
                        		<span style="font-size: 12px; font-weight: 700px;" data-bind="text: contactDS.data()[0].name"></span><br>
                        		<span data-bind="text: contactDS.data()[0].address"></span>
                        	</p>
                        	<p style="font-size: 10px;">Job: <span  data-bind="text: company.address"></span></p>
                        	<p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span  data-bind="text: company.address"></span></p>
                        </div>
                    </div>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 100%;">
                        	<sapne style="font-weight:bold" data-bind="text: contactDS.data()[0].phone"></p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<span style="font-weight:bold" data-bind="text: obj.number"></span>-<span style="font-weight:bold" data-bind="text: company.id"></span>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div> -->
                <div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
                        	គំរោង Job : <span data-bind="text: contactDS.data()[0].job"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: contactDS.data()[0].vat_no"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number" style="width: 42%;">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<span style="font-weight:bold" data-bind="text: obj.number"></span>-<span style="font-weight:bold" data-bind="text: company.id"></span>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប (បូក​បញ្ចូល​ទាំង​អាករ)​ Total (VAT included)</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm2" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 50%;float: left;">
            	<h2 ></h2>
                <h3 style="text-align:left;" data-bind="html: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                	<p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span></p>
                </div>
            </div>
           	<!-- <div style="float: right; width: 20%;">
           		<div id="invQR"></div>
           	</div> -->
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រអាករ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
                        	គំរោង Job : <span data-bind="text: contactDS.data()[0].job"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: contactDS.data()[0].vat_no"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number" style="width: 42%;">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<span style="font-weight:bold" data-bind="text: obj.number"></span>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>

        	<div class="clear inv2">
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<!--script id="invoiceForm3" type="text/x-kendo-template">
	<div class="inv1 sale-order">
    	<div class="head">
        	<h1>Sale Order</h1>
        	<div class="span12">
        		<div class="span10" style="text-align:right;">
        			Date : <br>
        			SONo :
        		</div>
        		<div class="span2" style="text-align:left;padding-left: 10px;">
        			<p data-bind="text: obj.issued_date"></p>
        			<p data-bind="text: obj.number"></p>
        		</div>
        	</div>
        </div>
        <div class="content clear">
        	<table class="span12">
        		<thead>
        			<tr>
	        			<th colspan="2">
	        				CUSTOMER INFORMATION
	        			</th>
	        			<th colspan="2">
	        				DELIVERED TO ADDRESS
	        			</th>
	        		</tr>
        		</thead>
        		<tbody>
        			<tr style="height: 100px">
        				<td colspan="2">
        					<p><span data-bind="text: obj.contact[0].name"></span><br>
        					<b>Address: </b> <span data-bind="text: obj.contact[0].address"></span>
	        			</td>
	        			<td colspan="2">
	        				<p><span data-bind="text: obj.contact[0].name"></span><br>
        					<b>Address: </b> <span data-bind="text: obj.contact[0].address"></span>
	        			</td>
        			</tr>
        			<tr>
	        			<td class="span3">TERM OF PAYMENT</td>
	        			<td class="span3"></td>
	        			<td class="span3">DELIVERY DATE</td>
	        			<td class="span3" data-bind="text: obj.issued_date"></td>
	        		</tr>
	        		<tr>
	        			<td class="span3">MODE OF PAYMENT</td>
	        			<td class="span3"></td>
	        			<td class="span3">TERM OF DELIVERY</td>
	        			<td class="span3"></td>
	        		</tr>
        		</tbody>
        	</table>
        	<table class="span12" style="margin-top: 5px;">
        		<thead>
        			<tr>
	        			<th data-bind="style: {backgroundColor: obj.color}">
	        				Item <br>Code
	        			</th>
	        			<th data-bind="style: {backgroundColor: obj.color}">
	        				Description
	        			</th>
	        			<th width="70" data-bind="style: {backgroundColor: obj.color}">
	        				Required<br>Date
	        			</th>
	        			<th width="40" data-bind="style: {backgroundColor: obj.color}">
	        				UM
	        			</th>
	        			<th width="40" data-bind="style: {backgroundColor: obj.color}">
	        				QTY
	        			</th>
	        			<th width="100" data-bind="style: {backgroundColor: obj.color}">
	        				Unit Price
	        			</th>
	        			<th width="70" data-bind="style: {backgroundColor: obj.color}">
	        				Total
	        			</th>
	        		</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template3"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td colspan="4" rowspan="4" style="text-align:left;padding-left:20px;">
	        				<b>Note:</b><br>
	        				<li>
								<li>Please notify us immediately if you are unable to deliver as specified.</li>
								<li>Check will be used to settled this order if the settled amount is equal to or greater than 500 USD</li>
								<li>Please send all correspondence to address above.</li>
							</ol>
        				</td>
        				<td style="text-align:left;padding-left:20px;" colspan="2"><b>SUB TOTAL</b></td>
        				<td data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td style="text-align:left;padding-left:20px;" colspan="2"><b>VAT​(10%) if applicable</b></td>
        				<td data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td style="text-align:left;padding-left:20px;" colspan="2"><b>Other charges</b></td>
        				<td></td>
        			</tr>
        			<tr>
        				<td style="text-align:left;padding-left:20px;" colspan="2"><b>Total</b></td>
        				<td data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<div class="span12 clear" style="margin-top: 15px">
	        	<div class="span6">
	        		<div class="span6">
	        			<p>Approved by: </p>
	        			<p style="margin-top: 40px;padding-top: 5px;width: 80%;border-top: 1px solid #000;">Name:<br>Date:<p>
	        		</div>
	        		<div class="span6">
	        			<p>Recieved by: </p>
	        			<p style="margin-top: 40px;padding-top: 5px;width: 80%;border-top: 1px solid #000;">Name:<br>Date:<p>
	        		</div>
	        	</div>
	        	<div class="span6">
	        		<table class="span12">
	        			<tr>
	        				<thead><th>I hereto accept the terms and conditions in the contract and purchase order:</th></thead>
	        			</tr>
	        			<tr><td>Customer Name:</td></tr>
	        			<tr><td>Position:</td></tr>
	        			<tr><td>Date:</td></tr>
	        		</table>
	        	</div>
	        </div>
        </div>
    </div>
</script>
<script id="invoiceForm4" type="text/x-kendo-template">
	<div class="inv1 quotation">
        <div class="content clear">
        	<table class="span12">
        		<tbody>
        			<tr>
        				<td style="border-top: none;border-left: none" width="500" colspan="2" rowspan="3">
        					<h2>Quotation Form</h2>
	        			</td>
	        			<td width="120">
	        				<b>Date</b>
	        			</td>
	        			<td data-bind="text: obj.issued_date"></td>
        			</tr>
        			<tr>
	        			<td ><b>Quotation Form #</b></td>
	        			<td data-bind="text: obj.number"></td>
	        		</tr>
	        		<tr>
	        			<td><b>Requisition #</b></td>
	        			<td></td>
	        		</tr>
	        		<tr>
	        			<td width="150"><b>Customer Name:</b></td>
	        			<td data-bind="text: obj.contact[0].name"></td>
	        			<td ><b>Date of contact:</b></td>
	        			<td ></td>
	        		</tr>
	        		<tr>
	        			<td width="150"><b>Contact Information:</b></td>
	        			<td data-bind="text: obj.contact[0].address"></td>
	        			<td ><b>Time of contact:</b></td>
	        			<td ></td>
	        		</tr>
	        		<tr>
	        			<td width="150"><b>Validity Date</b></td>
	        			<td ></td>
	        			<td ><b>Date price provided </b></td>
	        			<td ></td>
	        		</tr>
        		</tbody>
        	</table>
        	<table class="span12" style="margin-top: 5px;">
        		<thead>
        			<tr>
	        			<th data-bind="style: {backgroundColor: obj.color}">
	        				No
	        			</th>
	        			<th width="70" data-bind="style: {backgroundColor: obj.color}">
	        				Item<br>Code
	        			</th>
	        			<th width="" data-bind="style: {backgroundColor: obj.color}">
	        				Description
	        			</th>
	        			<th width="30" data-bind="style: {backgroundColor: obj.color}">

	        			</th>
	        			<th width="40" data-bind="style: {backgroundColor: obj.color}">
	        				UM
	        			</th>
	        			<th width="40" data-bind="style: {backgroundColor: obj.color}">
	        				QTY
	        			</th>
	        			<th width="80" data-bind="style: {backgroundColor: obj.color}">
	        				Unit Price
	        			</th>
	        			<th width="70" data-bind="style: {backgroundColor: obj.color}">
	        				Extended<br>Price
	        			</th>
	        		</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template4"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="text-align:right;padding-right:10px;" colspan="7"><b>Total</b></td>
        				<td data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<div class="span12 clear" style="margin-top: 10px">
	        	<p><b>Additional Specifications </b></p>
	        	<table class="span12" style="margin-top:10px;">
	        		<tr>
	        			<td colspan="3">
	        			<br><br><br><br>
	        			</td>
	        		</tr>
	        		<tr>
	        			<td colspan="3"><b>Prepared By:<br>Position:<br>Date:</b></td>
	        		</tr>
	        		<tr>
	        			<td rowspan="2">This form is used only when official quotation from supplier is not feasible.<td>
	        			<td>&nbsp;</td>
	        		</tr>
	        		<tr>
	        			<td width="80">&nbsp;</td>
	        			<td width="80">&nbsp;</td>
	        		</tr>
	        	</table>
	        </div>
        </div>
    </div>
</script>
<script id="invoiceForm5" type="text/x-kendo-template">
	<div class="inv1 quotation">
        <div class="content clear">
        	<table class="span12">
        		<tbody>
        			<tr>
        				<td class="main-color" width="300" colspan="4" rowspan="3">
        					<h2>GOODS DELIVERED NOTE </h2>
	        			</td>
	        			<td width="120">
	        				<b>GDN #</b>
	        			</td>
	        			<td width="100">&nbsp;</td>
        			</tr>
        			<tr>
	        			<td ><b>Date</b></td>
	        			<td data-bind="text: obj.issued_date"></td>
	        		</tr>
	        		<tr>
	        			<td><b>SO/ CONTRACT #</b></td>
	        			<td></td>
	        		</tr>
	        		<tr>
	        			<td width="90"><b>Name</b></td>
	        			<td width="80" data-bind="text: obj.contact[0].name"></td>
	        			<td width="90"><b>CODE</b></td>
	        			<td width="80"></td>
	        			<td ><b>CUSTOMER<br>INVOICE #</b></td>
	        			<td data-bind="text: obj.number"></td>
	        		</tr>
	        		<tr>
	        			<td ><b>ADDRESS</b></td>
	        			<td colspan="3" data-bind="text: obj.contact[0].address"></td>
	        			<td><b>DELIVERY NOTE #</b></td>
	        			<td ></td>
	        		</tr>
        		</tbody>
        	</table>
        	<table class="span12" style="margin-top: 5px;">
        		<thead>
        			<tr>
	        			<th rowspan="2" width="70" data-bind="style: {backgroundColor: obj.color}">
	        				Item<br>Code
	        			</th>
	        			<th rowspan="2" data-bind="style: {backgroundColor: obj.color}">
	        				DESCRIPTION
	        			</th>
	        			<th rowspan="2" data-bind="style: {backgroundColor: obj.color}">
	        				INSPECTION<br>CRITERIA
	        			</th>
	        			<th colspan="5" data-bind="style: {backgroundColor: obj.color}">
	        				QUANTITY
	        			</th>
	        		</tr>
	        		<tr>
	        			<th data-bind="style: {backgroundColor: obj.color}"><b style="font-size:10px">ORDERED</b></th>
	        			<th data-bind="style: {backgroundColor: obj.color}"><b style="font-size:10px">RECEIVED</b></th>
	        			<th data-bind="style: {backgroundColor: obj.color}"><b style="font-size:10px">INSPECTED</b></th>
	        			<th data-bind="style: {backgroundColor: obj.color}"><b style="font-size:10px">ACCEPTED</b></th>
	        			<th data-bind="style: {backgroundColor: obj.color}"><b style="font-size:10px">REJECTED</b></th>
	        		</tr>
        		</thead>
        		<tbody id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template5"
						data-bind="source: lineDS">
        		<tfoot>

        			<tr>
        				<td style="text-align:center;color:#fff;background:#000" colspan="8">Goods/ Materials received are delivered correctly in term of quantity, quality and other specifications according to the specified SO.</td>
        			</tr>
        		</tfoot>
        	</table>
        	<div class="span12 clear" style="margin-top: 10px">
	        	<div class="span6" style="padding-left: 30px;">
	        		<strong>
	        			Delivered By:<br>
	        			Received By:<br>
	        			Inspected By:
	        		</strong>
	        	</div>
	        	<div class="span6" style="padding-left: 30px;">
	        		<strong>
	        			Date/ Time:<br>
	        			Date/ Time:<br>
	        			Date/ Time:
	        		</strong>
	        	</div>
	        	<table class="span12" style="margin-top: 10px;">
	        		<tr>
	        			<td width="280">
	        				<b>Sample Lot</b><br><br>
	        				<p>Lot Size:_______________<span style="float:right;padding-right:10px;">Delivery Damage</span></p>
	        				<p><span style="float:right;padding-right:10px;">Markings/Finish</span></p><br>
	        				<p>Sample Qty:____________<span style="float:right;padding-right:10px;">Attributes</span></p><br>
	        			</td>
	        			<td>
	        				<b>Conformance/Discrepancies to Specifications</b><br><br>
	        			</td>
	        		</tr>
	        	</table>
	        </div>
        </div>
    </div>
</script-->

<script id="invoiceForm6" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 0px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			គំរោង Job : <span data-bind="text: contactDS.data()[0].job"></span><br/>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right; width: 40%">
        			<p class="form-title" style=" margin-bottom: 0; font-size: 20px; margin-top: 0; float: left; width: 100%;">បញ្ជាទិញ</p>
        			<p style="font-size: 18px;margin-bottom: 10px;" class="form-title" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD : <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th width="80" class="rside" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template6"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;color: #000" colspan="3" rowspan="4" data-bind="text: obj.note"></td>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;color: #000" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90" style="color:#000;">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80" style="color:#000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td width="90" style="color:#000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color:#000;">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color:#000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color:#000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm7" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style=" margin-bottom: 0; font-size: 20px; margin-top: 0; float: left; width: 100%;">បញ្ជាទិញ</p>
        			<p style="font-size: 18px;margin-bottom: 10px;" class="form-title" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD : <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th width="80" class="rside" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template6"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;" colspan="3" rowspan="4" data-bind="text: obj.note"></td>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;color: #000;" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;color: #000;" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>

        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90" style="color:#000;">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80" style="color:#000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td width="90" style="color:#000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color:#000;">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color:#000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color:#000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm8" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style=" margin-bottom: 0; font-size: 20px; margin-top: 4px; float: left; width: 100%;">បញ្ជាទិញ</p>
        			<p style="font-size: 18px;margin-bottom: 10px;" class="form-title" data-bind="text: obj.title" ></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        			<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}"><p>សរុប TOTAL <span data-bind="text: obj.amount"></span></p></div>
        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD : <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th class="rside" width="80" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template8"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;" colspan="2" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;color: #000;" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td class="rside" style="background-color: #eee;color: #000;" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90" style="color: #000;">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80" style="color: #000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td width="90" style="color: #000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color: #000;">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color: #000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm9" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style=" margin-bottom: 0; font-size: 20px; margin-top: 4px; float: left; width: 100%;">បញ្ជាទិញ</p>
        			<p style="font-size: 18px;margin-bottom: 10px;" class="form-title" data-bind="text: obj.title" ></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        			<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}"><p>សរុប TOTAL <span data-bind="text: obj.amount"></span></p></div>
        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD : <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th class="rside" width="80" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template8"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;color: #000;text-align: left;" colspan="2" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee; color: #000" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90" style="color: #000;">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80" style="color: #000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td width="90" style="color: #000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color: #000;">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color: #000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm10" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 0; float: left; width: 100%;">សម្រង់តំលៃ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px; font-size: 18px;"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD : <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th width="80" class="rside" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template10"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;" colspan="3" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;color:#000" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee; color:#000" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee; color:#000" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color:#000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90" style="color: #000">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80" style="color: #000">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000" width="90">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color: #000">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color: #000">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm11" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5">
        			<p data-bind="text: html.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 0; float: left; width: 100%;">សម្រង់តំលៃ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px; font-size: 18px;"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD : <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th width="80" class="rside" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template10"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;" colspan="3" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;color: #000" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td style="color: #000" width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td style="color: #000" width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000" width="90">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color: #000">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color: #000">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm12" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 4px; float: left; width: 100%;">សម្រង់តំលៃ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px;font-size: 18px; "></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        			<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}"><p>សរុប TOTAL <span data-bind="text: obj.amount"></span></p></div>
        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th class="rside" width="80" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template12"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;color: #000" colspan="2" rowspan="4" data-bind="text: obj.note"></td>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.discount"></td>

        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td style="color: #000" width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td style="color: #000" width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000" width="90">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color: #000">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color: #000">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm13" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 4px; float: left; width: 100%;">សម្រង់តំលៃ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px;font-size: 18px; "></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        			<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}"><p>សរុប TOTAL <span data-bind="text: obj.amount"></span></p></div>
        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th class="rside" width="80" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template12"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;color: #000" colspan="2" rowspan="4" data-bind="text: obj.note"></td>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.discount"></td>

        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>

        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td style="color: #000" width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td style="color: #000" width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000" width="90">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color: #000">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color: #000">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color: #000">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm14" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header" style="background:none;">
        		<div class="span3" style="margin-right: 15px;">
        			<b>Customer Information</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<b>Address: </b> <span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        		<div class="span6" style="float:right;">
        			<p class="form-title" data-bind="text: obj.title" style="font-size: 26px"></p>
        			<p><b>Sale Order Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>Sale Order No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<table class="span12">
        		<tr>
        			<td style="background: #c6d9f1;text-align: left;padding-left: 5px;" width="150"><b>SALE ORDER #</b></td>
        			<td width="100"><b data-bind="text: obj.reference_no"></b></td>
        			<td width="150" style="background: #c6d9f1;text-align: left;padding-left: 5px;"><b>INVOICE #</b></td>
        			<td><b></b></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1;text-align: left;padding-left: 5px;"><b>JOB/ CONTRACT #</b></td>
        			<td><b></b></td>
        			<td style="background: #c6d9f1"><b></b></td>
        			<td><b></b></td>
        		</tr>
        	</table>
        	<table class="span12" style="margin: 5px 0;">
        		<thead>
        			<tr>
        				<th width="50" style="background: #c6d9f1;">NO</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">ITEM CODE</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">DESCRIPTION</th>
        				<th style="background: #c6d9f1;">UM</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">QTY</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">REMARK</th>
        			</tr>
        		</thead>
        		<tbody id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template14"
						data-bind="source: lineDS">
        	</table>
        	<table class="span12">
        		<tr>
        			<td style="background: #c6d9f1" width="150">ISSUED BY</td>
        			<td width="100"></td>
        			<td width="150" style="background: #c6d9f1">DATE</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1">DELIVERED BY</td>
        			<td></td>
        			<td style="background: #c6d9f1">DATE</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1">RECEIVED BY</td>
        			<td></td>
        			<td style="background: #c6d9f1">DATE/TIME</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1">ACKNOWLEDGED BY</td>
        			<td></td>
        			<td style="background: #c6d9f1">DATE/TIME</td>
        			<td></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm15" type="text/x-kendo-template">
	<div class="inv1 pcg-cash">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<h2 data-bind="text: obj.title"></h2>
        	</div>
        	<div class="span12" style="background:none;margin-top: 15px;">
        		<table class="span12" border="1">
        			<tr>
        				<td width="200">លេខសក្ខីប័ត្រ TV No.</td>
        				<td width="200"></td>
        				<td width="200">កាលបរិច្ឆេទ Date</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td>Rational for transfer</td>
        				<td colspan="3"></td>
        			</tr>
        		</table>
        	</div>
        	<table class="span12" style="border-top: none;">
        		<tr>
        			<td colspan="4" style="background: #10253f; color: #fff;border-top: 0;">
        				ផ្ទេរប្រាក់​ពី Transfer from
        			</td>
        			<td colspan="2" style="background: #eee;border-top: 0;">
        				ផ្ទេរប្រាក់ទៅ Transfer to
        			</td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1;">
        				No.
        			</td>
        			<td style="background: #c6d9f1;">
        				Nature
        			</td>
        			<td style="background: #c6d9f1;">
        				Amount
        			</td>
        			<td style="background: #c6d9f1;">
        				Cheque No./<br>Account No.
        			</td>
        			<td>
        				Nature
        			</td>
        			<td>
        				Bank Account No./ Cash<br>Account Code
        			</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr>
        			<td style="background: #c6d9f1;text-align: right;padding-right: 5px;" colspan="2">ចំនួនសរុប<br>Total</td>
        			<td></td>
        			<td style="background: #c6d9f1;text-align: right;padding-right: 5px;" colspan="2">ចំនួនជាអក្សរ<br>Amount in Words</td>
        			<td></td>
        		</tr>
        	</table>
        	<div class="span12" style="background: #eee;padding: 5px;">
        		<div class="span9" style="background: #fff;border:1px solid #ccc;padding: 8px;">
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;">រៀបចំដោយ<br>Prepared by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;">ត្រួតពិនិត្យដោយ<br>Reviewed by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;font-weight:bold;">ពិនិត្យ និងសំរេចដោយ<br>Approved by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        		</div>
        		<div class="span3" style="padding: 10px;">
        			<p style="margin-bottom:45px;font-size:10px;">Transerred by:</p>
    				_______________
    				<p style="font-size:10px;">Name: <br>Date:</p>
        		</div>
        	</div>
        	<table class="span12" border="1">
        		<tr>
        			<td colspan="3" style="background: #10253f; color: #fff;padding-left: 5px;text-align:left;">
        				សម្រាប់ការិយាល័យហិរញ្ញវត្ថុ For Accounting Department
        			</td>
        		</tr>
        		<tr>
        			<td style="text-align: center;">លេខគណនី<br>Account code</td>
        			<td>ឥណពន្ធ<br>Debit</td>
        			<td>ឥណទាន<br>Credit</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr>
        			<td colspan="3" style="text-align: left;padding-left: 5px;">
        				<span style="font-size: 10px; margin-right: 100px;">Posted By:</span> Date:
        			</td>
        		</tr>
        	</table>
        	<table class="span12" border="1">
        		<tr>
        			<td rowspan="2" style="border-top:0;text-align: left;padding-left: 5px;">Used for internal deposit, withdraw, transfer amoung the company's Bank account to<br> bank account and to on hand and deposit back to the bank accounts.</td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;">Version</td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;"><b>V.01</b></td>
        		</tr>
        		<tr>
        			<td style="text-align: left;padding-left: 5px;">Doc. Control</td>
        			<td style="text-align: left;padding-left: 5px;"><b>TRM02-07</b></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm16" type="text/x-kendo-template">
	<div class="inv1 pcg-cash">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<h2>សក្ខីប័ត្រដាក់សាច់ប្រាក់ Deposit Voucher</h2>
        	</div>
        	<div class="span12" style="background:none;margin-top: 15px;">
        		<table class="span12" border="1">
        			<tr>
        				<td width="200">លេខសក្ខីប័ត្រ TV No.</td>
        				<td width="200"></td>
        				<td width="200">កាលបរិច្ឆេទ Date</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td>Rational for Deposit</td>
        				<td colspan="3"></td>
        			</tr>
        		</table>
        	</div>
        	<table class="span12" style="border-top: none;">
        		<tr>
        			<td colspan="4" style="background: #10253f; color: #fff;border-top: 0;">
        				ដាក់ប្រាក់​ពី Deposit from
        			</td>
        			<td colspan="2" style="background: #eee;border-top: 0;">
        				ដាក់ប្រាក់ទៅ Deposit to
        			</td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1;">
        				No.
        			</td>
        			<td style="background: #c6d9f1;">
        				Nature
        			</td>
        			<td style="background: #c6d9f1;">
        				Amount
        			</td>
        			<td style="background: #c6d9f1;">
        				Cheque No./<br>Account No.
        			</td>
        			<td>
        				Nature
        			</td>
        			<td>
        				Bank Account No./ Cash<br>Account Code
        			</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr>
        			<td style="background: #c6d9f1;text-align: right;padding-right: 5px;" colspan="2">ចំនួនសរុប<br>Total</td>
        			<td></td>
        			<td style="background: #c6d9f1;text-align: right;padding-right: 5px;" colspan="2">ចំនួនជាអក្សរ<br>Amount in Words</td>
        			<td></td>
        		</tr>
        	</table>
        	<div class="span12" style="background: #eee;padding: 5px;">
        		<div class="span9" style="background: #fff;border:1px solid #ccc;padding: 8px;">
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;">រៀបចំដោយ<br>Prepared by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;">ត្រួតពិនិត្យដោយ<br>Reviewed by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;font-weight:bold;">ពិនិត្យ និងសំរេចដោយ<br>Approved by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        		</div>
        		<div class="span3" style="padding: 10px;">
        			<p style="margin-bottom:45px;font-size:10px;">Deposited by:</p>
    				_______________
    				<p style="font-size:10px;">Name: <br>Date:</p>
        		</div>
        	</div>
        	<table class="span12" border="1">
        		<tr>
        			<td colspan="3" style="background: #10253f; color: #fff;padding-left: 5px;text-align:left;">
        				សម្រាប់ការិយាល័យហិរញ្ញវត្ថុ For Accounting Department
        			</td>
        		</tr>
        		<tr>
        			<td style="text-align: center;">លេខគណនី<br>Account code</td>
        			<td>ឥណពន្ធ<br>Debit</td>
        			<td>ឥណទាន<br>Credit</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr>
        			<td colspan="3" style="text-align: left;padding-left: 5px;">
        				<span style="font-size: 10px; margin-right: 100px;">Posted By:</span> Date:
        			</td>
        		</tr>
        	</table>
        	<table class="span12" border="1">
        		<tr>
        			<td rowspan="2" style="border-top:0;text-align: left;padding-left: 5px;">Used for internal deposit, withdraw, transfer amoung the company's Bank account to<br> bank account and to on hand and deposit back to the bank accounts.</td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;">Version</td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;"><b>V.01</b></td>
        		</tr>
        		<tr>
        			<td style="text-align: left;padding-left: 5px;">Doc. Control</td>
        			<td style="text-align: left;padding-left: 5px;"><b>TRM02-07</b></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm17" type="text/x-kendo-template">
	<div class="inv1 pcg-cash">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<h2>សក្ខីប័ត្រដកប្រាក់ Withdrawal Voucher</h2>
        	</div>
        	<div class="span12" style="background:none;margin-top: 15px;">
        		<table class="span12" border="1">
        			<tr>
        				<td width="200">លេខសក្ខីប័ត្រ TV No.</td>
        				<td width="200"></td>
        				<td width="200">កាលបរិច្ឆេទ Date</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td>Rational for Withdraw</td>
        				<td colspan="3"></td>
        			</tr>
        		</table>
        	</div>
        	<table class="span12" style="border-top: none;">
        		<tr>
        			<td colspan="4" style="background: #10253f; color: #fff;border-top: 0;">
        				ដកប្រាក់​ពី Withdraw from
        			</td>
        			<td colspan="2" style="background: #eee;border-top: 0;">
        				ដកប្រាក់ទៅ Withdraw to
        			</td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1;">
        				No.
        			</td>
        			<td style="background: #c6d9f1;">
        				Nature
        			</td>
        			<td style="background: #c6d9f1;">
        				Amount
        			</td>
        			<td style="background: #c6d9f1;">
        				Cheque No./<br>Account No.
        			</td>
        			<td>
        				Nature
        			</td>
        			<td>
        				Bank Account No./ Cash<br>Account Code
        			</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
        		<tr>
        			<td style="background: #c6d9f1;text-align: right;padding-right: 5px;" colspan="2">ចំនួនសរុប<br>Total</td>
        			<td></td>
        			<td style="background: #c6d9f1;text-align: right;padding-right: 5px;" colspan="2">ចំនួនជាអក្សរ<br>Amount in Words</td>
        			<td></td>
        		</tr>
        	</table>
        	<div class="span12" style="background: #eee;padding: 5px;">
        		<div class="span9" style="background: #fff;border:1px solid #ccc;padding: 8px;">
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;">រៀបចំដោយ<br>Prepared by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;">ត្រួតពិនិត្យដោយ<br>Reviewed by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        			<div class="span4">
        				<p style="margin-bottom:30px;font-size:10px;font-weight:bold;">ពិនិត្យ និងសំរេចដោយ<br>Approved by:</p>
        				_______________
        				<p style="font-size:10px;">Name: <br>Date:</p>
        			</div>
        		</div>
        		<div class="span3" style="padding: 10px;">
        			<p style="margin-bottom:45px;font-size:10px;">Withdrew by:</p>
    				_______________
    				<p style="font-size:10px;">Name: <br>Date:</p>
        		</div>
        	</div>
        	<table class="span12" border="1">
        		<tr>
        			<td colspan="3" style="background: #10253f; color: #fff;padding-left: 5px;text-align:left;">
        				សម្រាប់ការិយាល័យហិរញ្ញវត្ថុ For Accounting Department
        			</td>
        		</tr>
        		<tr>
        			<td style="text-align: center;">លេខគណនី<br>Account code</td>
        			<td>ឥណពន្ធ<br>Debit</td>
        			<td>ឥណទាន<br>Credit</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td></tr>
        		<tr>
        			<td colspan="3" style="text-align: left;padding-left: 5px;">
        				<span style="font-size: 10px; margin-right: 100px;">Posted By:</span> Date:
        			</td>
        		</tr>
        	</table>
        	<table class="span12" border="1">
        		<tr>
        			<td width="450" style="border-top:0;text-align: left;padding-left: 5px;"></td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;">Version</td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;"><b>V.01</b></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm18" type="text/x-kendo-template">
	<div class="inv1 pcg-cash">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<h2>សក្ខីប័ត្របុរេប្រទាន ADVANCE VOUCHER</h2>
        	</div>
        	<div class="span12" style="background:none;margin-top: 15px;">
        		<table class="span12 left-tbl" border="1">
        			<tr>
        				<td width="200">អ្នកស្នើសុំ NAME</td>
        				<td width="200"></td>
        				<td width="200">លេខសក្ខីប័ត្រ AV No.</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">តំណែង Position</td>
        				<td width="200"></td>
        				<td width="200">កាលបរិច្ឆេទ Date</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">ផ្នែក Department</td>
        				<td width="200"></td>
        				<td width="200">លេខប័ណ្ណលទ្ធកម្ម PR No.</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">ទូទាត់ដោយ Mode of<br>Payment</td>
        				<td colspan="3">ទូទាត់ដោយ mode of payment </td>
        			</tr>
        			<tr>
        				<td width="200">គោលបំណងនៃ​បុរេប្រទាន<br>Purpose of Advance</td>
        				<td colspan="3">&nbsp;</td>
        			</tr>
        		</table>
        	</div>
        	<table class="span12" style="border-top: none;">
        		<tr style="background: #c6d9f1;">
        			<th style="border-top: 0;">
        				No.
        			</th>
        			<th style="border-top: 0;">
        				បរិយាយ DESCRIPTION
        			</th>
        			<th style="border-top: 0;">
        				REF.
        			</th>
        			<th style="border-top: 0;">
        				AMOUNT
        			</th>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr>
        			<td colspan="3" style="text-align: right;padding-right: 5px;">សរុប Total</td>
        			<td></td>
        		</tr>
        	</table>
        	<table class="span12 left-tbl" >
        		<tr>
        			<td colspan="2" style="border-top: none;text-align:right;padding-right:5px;">
        				 ចំនួនជាអក្សរ<br>Amount in Words
        			</td>
        			<td colspan="3" style="border-top: none;">&nbsp;</td>
        		</tr>
        		<tr>
        			<td colspan="2"></td>
        			<td style="background: #000; color: #fff;text-align:center;">SIGNATURE</td>
        			<td style="background: #000; color: #fff;text-align:center;">POSITION</td>
        			<td style="background: #000; color: #fff;text-align:center;">DATE</td>
        		</tr>
        		<tr>
        			<td style="background: #10253f; color: #fff;text-align:center;" rowspan="2" width="20"><p class="upside">Requestiong<br>Dept</p></td>
        			<td width="100">រៀបចំដោយ<br>PREPARED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>យល់ស្របដោយ<br>ENDORSED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td rowspan="4" style="text-align:center;" width="20"><p class="upside">Finance Department</p></td>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>សំរេចដោយ<br>APPROVED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>ទួទាត់ដោយ<br>PAID BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>ទទួលដោយ<br>RECEIVED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background:#000;"></td>
        			<td colspan="4">For Accounting Department Only</td>
        		</tr>
        		<tr>
        			<td></td>
        			<td style="text-align:center;">Account Code</td>
        			<td style="text-align:center;">Account Description</td>
        			<td style="text-align:center;">Debit</td>
        			<td style="text-align:center;">Credit</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
        		<tr>
        			<td style="background: #c6d9f1;"></td>
        			<td style="background: #c6d9f1;">កត់ត្រាដោយ<br>POSTED BY</td>
        			<td style="text-align:center;"></td>
        			<td style="text-align:center;"></td>
        			<td style="text-align:center;"></td>
        		</tr>
        	</table>
        	<table class="span12" border="1" style="margin-top:5px;">
        		<tr>
        			<td rowspan="2" width="400" style="text-align: left;padding-left: 5px;">Advance Voucher should be used to account for cash advance request (either for operational or salary advance). No additional voucher is required to disburse cash. This is a pre-printed form and there are two copies, one of which (original) will be given to advance requestor; while another one is for the Finance Department.</td>
        			<td style="text-align: left;padding-left: 5px;">Version</td>
        			<td style="text-align: left;padding-left: 5px;"><b>V.01</b></td>
        		</tr>
        		<tr>
        			<td style="text-align: left;padding-left: 5px;">Doc. Control</td>
        			<td style="text-align: left;padding-left: 5px;"><b>APM02-02</b></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm19" type="text/x-kendo-template">
    <div class="inv1 pcg">
        <div class="content clear">
        	<div class="span12 clear" style="padding:20px 0;">
        		<div class="span5">
        			<div class="logo" style="width: 100%;">
		            	<img style="width: 45%" data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>

        		</div>
        		<div class="span7">
        			<p class="form-title" style="font-size: 20px!important; margin-bottom: 5px; line-height: 28px !important; margin-top: 0;">សក្ខីប័ត្រចំណាយ PAYMENT VOUCHER</p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">ឈ្មោះ Name : <span data-bind="text: obj.contact.name"> </span></div>
        		<div class="span6" style="text-align: left;padding-left: 10px;">ទូទាត់ដោយ Mode of Payment : <span data-bind="text: obj.payment_method[0].name"></span></div>
				<div class="span12" style="text-align: left;padding-left: 10px;margin-top: 10px;">គោលបំណងការចំណាយ Purpose of Payment : <span data-bind="text: obj.memo"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
	        		<tr style="background: #c6d9f1;">
	        			<th style="border-top: 0; text-align: center;" width="60">
	        				ល.រ<br>No.
	        			</th>
	        			<th style="border-top: 0; text-align: left;" width="120">
	        				វិក្កយបត្រលេខ<br>Invoice No.
	        			</th>
	        			<th style="border-top: 0;text-align: left;padding-left: 10px;">
	        				អ្នកផ្គត់ផ្គង់<br>Supplier
	        			</th>
	        			<th style="border-top: 0;text-align: left;padding-left: 10px;">
	        				បរិយាយ​<br>Description
	        			</th>
	        			<th style="border-top: 0; text-align: center;" width="120">
	        				ចំនួន<br>Amount
	        			</th>
	        		</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="payment-voucher-line-template"
						data-bind="source: accountLineDS">
				</tbody>
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;" colspan="3" rowspan="4">
        				</td>
        				<td style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>

        				<td style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>

        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tbody>
	        		<tr>
	        			<td width="145">រៀបចំដោយ PREPARED BY</td>
	        			<td width="150"></td>
	        			<td width="90">តំណែង POSITION</td>
	        			<td width="180"></td>
	        			<td width="82">កាលបរិច្ឆេទ DATE</td>
	        			<td width="120"></td>
	        		</tr>
	        		<tr>
	        			<td>ត្រួតពិនិត្យដោយ REVIEWED BY</td>
	        			<td></td>
	        			<td>តំណែង POSITION</td>
	        			<td width="120"></td>
	        			<td>កាលបរិច្ឆេទ DATE</td>
	        			<td width="120"></td>
	        		</tr>
	        		<tr>
	        			<td>អនុម័តដោយ APPROVED BY</td>
	        			<td></td>
	        			<td>តំណែង POSITION</td>
	        			<td width="120"></td>
	        			<td>កាលបរិច្ឆេទ DATE</td>
	        			<td width="120"></td>
	        		</tr>
	        		<tr>
	        			<td>ទួទាត់ដោយ PAID BY</td>
	        			<td></td>
	        			<td>តំណែង POSITION</td>
	        			<td width="120"></td>
	        			<td>កាលបរិច្ឆេទ DATE</td>
	        			<td width="120"></td>
	        		</tr>
	        		<tr>
	        			<td>ទទួលដោយ RECEIVED BY</td>
	        			<td></td>
	        			<td>តំណែង POSITION</td>
	        			<td width="80"></td>
	        			<td>កាលបរិច្ឆេទ DATE</td>
	        			<td width="120"></td>
	        		</tr>
	        	</tbody>
        	</table>

        	<table class="span12 left-tbl" style="margin-top: 30px;">
        		<tr class="mid-header">
        			<td colspan="4" style="text-align:left; font-weight: bold;">For Accounting Department Only</td>
        		</tr>
        		<tr style="background: #dce6f2;">
        			<td >Account Code</td>
        			<td >Account Description</td>
        			<td >Debit</td>
        			<td >Credit</td>
        		</tr>
        		<tfoot
        			data-role="listview"
					data-auto-bind="false"
					data-template="payment-voucher-journal-line-template"
					data-bind="source: journalLineDS">
        		</tfoot>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm20" type="text/x-kendo-template">
	<div class="inv1 pcg-cash">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<h2>សក្ខីប័ត្រចំណាយ REIMBURSEMENT VOUCHER</h2>
        	</div>
        	<div class="span12" style="background:none;margin-top: 15px;">
        		<table class="span12 left-tbl" border="1">
        			<tr>
        				<td width="200">ឈ្មោះ NAME</td>
        				<td width="200"></td>
        				<td width="200">លេខសក្ខីប័ត្រ PV No.</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">អ្នកផ្គត់ផ្គង់ Supplier Code</td>
        				<td width="200"></td>
        				<td width="200">កាលបរិច្ឆេទ Date</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">ផ្នែក Department</td>
        				<td width="200"></td>
        				<td width="200">លេខសក្ខីប័ត្របំណុល APV No.</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">ទូទាត់ដោយ Mode of<br>Payment</td>
        				<td colspan="3">ទូទាត់ដោយ mode of payment </td>
        			</tr>
        			<tr>
        				<td width="200">គោលបំណងការចំណាយ<br>Purpose of Advance</td>
        				<td colspan="2">&nbsp;</td>
        				<td>Budgeted: </td>
        			</tr>
        		</table>
        	</div>
        	<table class="span12" style="border-top: none;">
        		<tr style="background: #c6d9f1;">
        			<th style="border-top: 0;">
        				No.
        			</th>
        			<th style="border-top: 0;" width="100">
        				Invoice No.
        			</th>
        			<th style="border-top: 0;">
        				Description
        			</th>
        			<th style="border-top: 0;" width="120">
        				Amount
        			</th>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr>
        			<td colspan="3" style="text-align: right;padding-right: 5px;">Total</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td colspan="3" style="text-align: right;padding-right: 5px;">Settlement Discounts</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td colspan="3" style="text-align: right;padding-right: 5px;background: #c6d9f1;">NET AMOUNT PAID</td>
        			<td></td>
        		</tr>
        	</table>
        	<table class="span12 left-tbl" >
        		<tr>
        			<td colspan="2" style="background: #c6d9f1;border-top: none;text-align:right;padding-right:5px;">
        				Amount in Words
        			</td>
        			<td colspan="3" style="border-top: none;">&nbsp;</td>
        		</tr>
        		<tr>
        			<td colspan="2"></td>
        			<td style="background: #000; color: #fff;text-align:center;">SIGNATURE</td>
        			<td style="background: #000; color: #fff;text-align:center;">POSITION</td>
        			<td width="120" style="background: #000; color: #fff;text-align:center;">DATE</td>
        		</tr>
        		<tr>
        			<td style="background: #10253f; color: #fff;text-align:center;" rowspan="5" width="20"><p class="upside">Finance Department</p></td>
        			<td width="100">រៀបចំដោយ<br>PREPARED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td><b>សំរេចដោយ<br>APPROVED BY</b></td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>ទួទាត់ដោយ<br>PAID BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>ទទួលដោយ<br>RECEIVED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background:#000;"></td>
        			<td colspan="4">For Accounting Department Only</td>
        		</tr>
        		<tr>
        			<td></td>
        			<td style="text-align:center;">Account Code</td>
        			<td style="text-align:center;">Account Description</td>
        			<td style="text-align:center;">Debit</td>
        			<td style="text-align:center;">Credit</td>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
        		<tr>
        			<td style="background: #c6d9f1;"></td>
        			<td style="background: #c6d9f1;">កត់ត្រាដោយ<br>POSTED BY</td>
        			<td style="text-align:center;"></td>
        			<td style="text-align:center;"></td>
        			<td style="text-align:center;"></td>
        		</tr>
        	</table>
        	<table class="span12" border="1">
        		<tr>
        			<td rowspan="2" width="400" style="border-top:0;text-align: left;padding-left: 5px;">This is an automated voucher generated based on the payment made to outstanding invoice, reimbursements, claims, and other disbursement. The purpose of this voucher is used to approve payment transactions.</td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;">Version</td>
        			<td style="border-top:0;text-align: left;padding-left: 5px;"><b>V.01</b></td>
        		</tr>
        		<tr>
        			<td style="text-align: left;padding-left: 5px;">Doc. Control</td>
        			<td style="text-align: left;padding-left: 5px;"><b>TRM02-03</b></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm21" type="text/x-kendo-template">
	<div class="inv1 pcg-cash">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<h2>សក្ខីប័ត្រជំរះបុរេប្រទាន<br>ADVANCE SETTLEMENT VOUCHER</h2>
        	</div>
        	<div class="span12" style="background:none;margin-top: 15px;">
        		<table class="span12 left-tbl" border="1">
        			<tr>
        				<td width="200">អ្នកស្នើសុំ NAME</td>
        				<td width="200"></td>
        				<td width="200">លេខសក្ខីប័ត្រ AS No.</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">តំណែង Position</td>
        				<td width="200"></td>
        				<td width="200">កាលបរិច្ឆេទ Date</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">ផ្នែក Department</td>
        				<td width="200"></td>
        				<td width="200">លេខសំណើរបុរេប្រទាន ADR No.</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">គោលបំណងនៃ​ការទូទាត់បុរេប្រទាន <br>Purpose of Advance</td>
        				<td colspan="3">&nbsp;</td>
        			</tr>
        		</table>
        	</div>
        	<table class="span12" style="margin-top: 5px;">
        		<tr style="background: #c6d9f1;height: 30px;">
        			<th width="160">
        				ACCOUNT CODE
        			</th>
        			<th >
        				បរិយាយ DESCRIPTION
        			</th>
        			<th >
        				REF.
        			</th>
        			<th width="120">
        				AMOUNT
        			</th>
        		</tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td></td><td></td><td></td></tr>
        		<tr>
        			<td colspan="3" style="text-align: right;padding-right: 5px;">សរុបចំណាយជាក់ស្តែង TOTAL EXPENSES</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td colspan="3" style="text-align: right;padding-right: 5px;">ចំនួនបុរេប្រទាន ADVANCED AMOUNT</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td colspan="3" style="text-align: right;padding-right: 5px;">ប្រាក់ត្រូវ NET AMOUNT DUE <input type="checkbox" name="nad"> បង់អោយបុគ្គលិក TO STAFF <input type="checkbox" name="ts"> ទទួលពីបុគ្គលិក FROM STAFF <input type="checkbox" name="fs"></td>
        			<td></td>
        		</tr>
        	</table>
        	<table class="span12 left-tbl" >
        		<tr>
        			<td colspan="2" style="background: #c6d9f1;border-top: none;text-align:right;padding-right:5px;">
        				 ចំនួនជាអក្សរ<br>Amount in Words
        			</td>
        			<td colspan="3" style="border-top: none;">&nbsp;</td>
        		</tr>
        		<tr>
        			<td colspan="2"></td>
        			<td style="background: #000; color: #fff;text-align:center;">SIGNATURE</td>
        			<td style="background: #000; color: #fff;text-align:center;">POSITION</td>
        			<td style="background: #000; color: #fff;text-align:center;">DATE</td>
        		</tr>
        		<tr>
        			<td style="text-align:center;" rowspan="4" width="20"></td>
        			<td width="100" style="background: #c6d9f1;">រៀបចំដោយ<br>PREPARED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1;">ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>

        		<tr>
        			<td style="background: #c6d9f1;"><b>សំរេចដោយ<br>APPROVED BY</b></td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1;">កត់ត្រាដោយ<br>POSTED BY</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        	</table>

        </div>
    </div>
</script>
<script id="invoiceForm22" type="text/x-kendo-template">
	<div class="inv1 pcg-cash">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<h2 data-bind="text: obj.title" style="text-align: left; font-size: 20px;line-height: 43px !important; padding-top: 0;"></h2>
        		<p>អាស័យ​ដ្ឋាន Address : <span data-bind="text: company.address"></span></p>
        		<p>លេខទូរស័ព្ទ Phone : <span data-bind="text: company.telephone"></span></p>
        		<p>អុីម៉ែល Email : <span data-bind="text: company.email"></span></p>
        	</div>
        	<div class="span12" style="background:none;margin-top: 15px;">
        		<table class="span12 left-tbl" border="1">
        			<tr>
        				<td width="200" style="text-align:center;"><b>លេខសក្ខីប័ត្រ JV No.</b></td>
        				<td width="200" style="text-align:center;" data-bind="text: obj.number"></td>
        				<td width="200" style="text-align:center;"><b>កាលបរិច្ឆេទ Date<b></td>
        				<td width="200" style="text-align:center;" data-bind="text: obj.issued_date"></td>
        			</tr>
        			<tr>
        				<td colspan="4">ប្រភេទប្រតិបត្តិការ Type of transaction : <span data-bind="text: obj.type"></span></td>
        			</tr>

        			<tr>
        				<td colspan="4">Please specify, if applicable</td>
        			</tr>
        			<tr>
        				<td width="200">វិក្ក័យប័ត្រ Invoice No.</td>
        				<td width="200"></td>
        				<td width="200">សក្ខីប័ត្របុរេប្រទាន<br>Advance Voucher No.</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">សក្ខីប័ត្របំណុល<br>AP Voucher No.</td>
        				<td width="200"></td>
        				<td width="200">សក្ខីប័ត្រចំណាយ<br>Payment Voucher No</td>
        				<td width="200"></td>
        			</tr>
        			<tr>
        				<td width="200">សក្ខីប័ត្រទិន្នានុប្បវត្តិ<br>Journal Voucher No.</td>
        				<td width="200"></td>
        				<td width="200">Other</td>
        				<td width="200"></td>
        			</tr>
        		</table>
        	</div>
        	<table class="span12 left-tbl" style="margin-top: 5px;">
        		<tr>
        			<td style="background: #c6d9f1;">
        				<p>ពន្យល់ Description of the transaction : <span data-bind="text: obj.memo"></span></p>
        			</td>
        		</tr>
        		<tr>
        			<td data-bind="html: obj.memo2">&nbsp;</td>
        		</tr>
        	</table>
        	<table class="span12" style="margin-top: 5px;">
        		<thead>
	        		<tr>
	        			<th style="padding: 5px;"><b>លេខកូដគណនី<br>Account Code</b></th>
	        			<th style="padding: 5px;"><b>ឈ្មោះគណនី</b> Account Name</th>
	        			<th style="padding: 5px;"><b>ពិពណ៌នា Description</b></th>
	        			<th style="padding: 5px;"><b>ឥណពន្ធ<br>Debit</b></th>
	        			<th style="padding: 5px;"><b>ឥណទាន<br>Credit</b></th>
	        		</tr>
        		</thead>
        		<tbody data-auto-bind="false"
        			data-template="invoiceForm-journal-line-template"
        			data-bind="source: journalLineDS">
        		</tbody>
        		<tfoot data-template="invoiceForm-journal-line-footer-template" data-bind="source: this"></tfoot>
        	</table>
        	<div class="span12" style="background: #eee;padding: 5px;">
    			<div class="span3">
    				<p style="margin-bottom:30px;font-size:10px;">រៀបចំដោយ<br>Prepared by:</p>
    				_______________
    				<p style="font-size:10px;">Name: <br>Date:</p>
    			</div>
    			<div class="span3">
    				<p style="margin-bottom:30px;font-size:10px;">ត្រួតពិនិត្យដោយ<br>Reviewed by:</p>
    				_______________
    				<p style="font-size:10px;">Name: <br>Date:</p>
    			</div>
    			<div class="span3">
    				<p style="margin-bottom:30px;font-size:10px;font-weight:bold;">អ្នកអនុម័ត<br>Approved by:</p>
    				_______________
    				<p style="font-size:10px;">Name: <br>Date:</p>
    			</div>
        		<div class="span3">
        			<p style="margin-bottom:30px;font-size:10px;">អ្នកកត់ត្រា<br>Recorded by:</p>
    				_______________
    				<p style="font-size:10px;">Name: <br>Date:</p>
        		</div>
        	</div>

        </div>
    </div>
</script>
<!--script id="invoiceForm23" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5">
        			<p data-bind="text: company.name"></p>
        			<p><b>Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span3" style="margin-right: 15px;">
        			<b>Customer Information</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<b>Address: </b> <span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        		<div class="span3">
        			<b>Delivered to</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<b>Address: </b> <span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" data-bind="text: obj.title"></p>
        			<p><b>PO Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>PO No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span3">TERM OF PAYMENT</div>
        		<div class="span3">MODE OF PAYMENT</div>
        		<div class="span3">DELIVERY DATE</div>
        		<div class="span3">SALE REP</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr>
        				<th width="90">CODE</th>
        				<th>ITEM DESCRIPTION</th>
        				<th>ឯកតា<br>UM</th>
        				<th>QTY</th>
        				<th>UNIT PRICE</th>
        				<th width="80">Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template6"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;" colspan="3"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">SUB TOTAL</td>
        				<td style="background-color: #eee;" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td style="border:none;" colspan="3"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">TAX (Rate:       )</td>
        				<td style="background-color: #eee;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td style="border:none;" colspan="3"></td>
        				<td colspan="2" class="main-color" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">GRAND TOTAL</td>
        				<td style="background-color: #dce6f2;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="120">PREPARED BY</td><td width="100"></td>
        			<td>POSITION</td><td width="100"></td>
        			<td>DATE</td><td width="80"></td>
        		</tr>
        		<tr>
        			<td>REVIEWED BY</td><td></td>
        			<td>POSITION</td><td></td>
        			<td>DATE</td><td></td>
        		</tr>
        		<tr>
        			<td>APROVED BY</td><td></td>
        			<td>POSITION</td><td></td>
        			<td>DATE</td><td></td>
        		</tr>
        		<tr>
        			<td>ACCEPTED BY</td><td></td>
        			<td>POSITION</td><td></td>
        			<td>DATE</td><td></td>
        		</tr>
        	</table>
        </div>
    </div>
</script-->
<script id="invoiceForm23" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span12">
	        	<div class="span7">
	        		<div class="logo" style="width: 40%">
		            	<img style="width: " data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
	        	</div>
	        	<div class="span5">
	        		<div class="span12" style="margin-bottom: 10px;">
	        			<p class="form-title" style="font-size: 20px; float: left; width: 100%; margin-bottom: 0;">បណ័្ឌទទួលប្រាក់</p>
	        			<h2 style="font-size: 18px; text-align: left;color:#10253f " data-bind="text: obj.title"></h2>
	        			<!--img src="<?php echo base_url(); ?>assets/invoice/img/official-receipt.jpg" /-->

	        		</div>
	        		<div class="span12">
	        			<table class="span12">
	        				<tr>
	        					<td class="light-blue-td" width="100">កាលបរិច្ឆេទ Date</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.issued_date"></td>
	        				</tr>
	        				<tr>
	        					<td class="light-blue-td">លេខបបង្កាន់ដៃ Receipt No.</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.number"></td>
	        				</tr>
	        			</table>
	        		</div>
	        	</div>
	        </div>
        	<div class="span12" style="margin-top: 10px;">
		    	<div class="span7" style="margin-top: 10px;">
		    		<table class="span11">
						<tr>
							<td class="light-blue-td" width="120">ទទួលពីឈ្មោះ​ <br>Recieve From</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].name"></td>
						</tr>
						<tr>
							<td class="light-blue-td">អាស័យ​ដ្ឋាន <br>Contact Address</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].address"></td>
						</tr>
						<tr>
							<td class="light-blue-td">គោលបំណង​​ <br>Purpose</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: lineDS.data()[0].description"></td>
						</tr>
						<tr>
							<td class="light-blue-td">លេខយោង <br> Reference Document</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.reference_no"></td>
						</tr>
					</table>
		    	</div>
		    	<div class="span5" style="float:right">
		    		<p style="padding: 5px 0; text-align: left;font-weight: bold;color: #000;">ចំនួនទទួលសរុប​ <br> TOTAL RECEIVED AMOUNT</p>
		    		<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}">
		    			<p><span class="total-amount" data-bind="text: obj.amount"></span></p>
		    		</div>
		    		<p style="padding: 5px 0;font-weight: bold;color: #000;clear:both;">វិធីសាស្រ្តទូទាត់​ Mode of payment</p>
		    		<p style="color: #000;clear:both;" data-bind="text: paymentMethodDS.data()[0].name"></p>
		    	</div>
		    </div>
        	<div class="span12">
        		<div class="span8">
        			<p style="color:black;margin: 10px 0;" data-bind="text: obj.note"></p>
        		</div>
        	</div>
        	<div class="span12">
        		<div class="span5">
        			<p>On behalf of <span data-bind="text: company.name"></span></p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p>Paid By:</p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        	</div>
        	<div style="margin-top: 15px" class="span12">
        		<p>Address: <span data-bind="text: company.address"></span> <sapn data-bind="text: company.city"></sapn> <span data-bind="text: company.country.name"></span>.</p>
        	</div>
        </div>
    </div>
</script>
<script id="invoiceForm24" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header" style="background:none;">
        		<div class="span3" style="margin-right: 15px;">
        			<b>Customer Information</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<b>Address: </b> <span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        		<div class="span6" style="float:right;">
        			<p class="form-title" data-bind="text: obj.title" style="font-size: 26px"></p>
        			<p><b>Sale Order Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>Sale Order No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<table class="span12">
        		<tr>
        			<td style="background: #c6d9f1;text-align: left;padding-left: 5px;" width="150"><b>SALE ORDER #</b></td>
        			<td width="100"><b></b></td>
        			<td width="150" style="background: #c6d9f1;text-align: left;padding-left: 5px;"><b>INVOICE #</b></td>
        			<td><b></b></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1;text-align: left;padding-left: 5px;"><b>JOB/ CONTRACT #</b></td>
        			<td><b></b></td>
        			<td style="background: #c6d9f1"><b></b></td>
        			<td><b></b></td>
        		</tr>
        	</table>
        	<table class="span12" style="margin: 5px 0;">
        		<thead>
        			<tr>
        				<th width="50" style="background: #c6d9f1;">NO</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">ITEM CODE</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">DESCRIPTION</th>
        				<th style="background: #c6d9f1;">ឯកតា<br>UM</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">QTY</th>
        				<th style="background: #c6d9f1;text-align: left;padding-left: 5px;">REMARK</th>
        			</tr>
        		</thead>
        		<tbody id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template14"
						data-bind="source: lineDS">
        	</table>
        	<table class="span12">
        		<tr>
        			<td style="background: #c6d9f1" width="150">ISSUED BY</td>
        			<td width="100"></td>
        			<td width="150" style="background: #c6d9f1">DATE</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1">DELIVERED BY</td>
        			<td></td>
        			<td style="background: #c6d9f1">DATE</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1">RECEIVED BY</td>
        			<td></td>
        			<td style="background: #c6d9f1">DATE/TIME</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td style="background: #c6d9f1">ACKNOWLEDGED BY</td>
        			<td></td>
        			<td style="background: #c6d9f1">DATE/TIME</td>
        			<td></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm25" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span12">
	        	<div class="span7">
	        		<div class="logo" style="width: 40%">
		            	<img style="width: " data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
	        	</div>
	        	<div class="span5">
	        		<div class="span12" style="margin-bottom: 10px;">
	        			<h2 style="font-size: 24px;text-align: left;color:#10253f " data-bind="text: obj.title"></h2>
	        			<!--img src="<?php echo base_url(); ?>assets/invoice/img/official-receipt.jpg" /-->
	        			<!-- <p class="form-title" style="font-size: 20px; margin-top: 7px; float: left; width: 100%;">ប្រាក់កក់អិថិជន</p> -->
	        		</div>
	        		<div class="span12">
	        			<table class="span12">
	        				<tr>
	        					<td class="light-blue-td" width="100">កាលបរិច្ឆេទ Date</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.issued_date"></td>
	        				</tr>
	        				<tr>
	        					<td class="light-blue-td">លេខបបង្កាន់ដៃ Receipt No.</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.number"></td>
	        				</tr>
	        			</table>
	        		</div>
	        	</div>
	        </div>
        	<div class="span12" style="margin-top: 10px;">
		    	<div class="span7" style="margin-top: 10px;">
		    		<table class="span11">
						<tr>
							<td class="light-blue-td" width="120">ទទួលពីឈ្មោះ​ <br>Recieve From</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].name"></td>
						</tr>
						<tr>
							<td class="light-blue-td">អាស័យ​ដ្ឋាន <br>Contact Address</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].address"></td>
						</tr>
						<tr>
							<td class="light-blue-td">គោលបំណង​​ <br>Purpose</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: accountLineDS.data()[0].description"></td>
						</tr>
						<tr>
							<td class="light-blue-td">លេខយោង <br> Reference Document</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.reference_no"></td>
						</tr>
					</table>
		    	</div>
		    	<div class="span5" style="float:right">
		    		<p style="padding: 5px 0; text-align: left;font-weight: bold;color: #000;">ចំនួនទទួលសរុប​ <br> TOTAL RECEIVED AMOUNT</p>
		    		<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}">
		    			<p><span class="total-amount" data-bind="text: obj.amount"></span></p>
		    		</div>
		    		<p style="padding: 5px 0;font-weight: bold;color: #000;clear:both;">វិធីសាស្រ្តទូទាត់​ Mode of payment</p>
		    		<p style="color: #000;clear:both;" data-bind="text: paymentMethodDS.data()[0].name"></p>
		    	</div>
		    </div>
        	<div class="span12">
        		<div class="span8">
        			<p style="color:black;margin: 10px 0;" data-bind="text: obj.note"></p>
        		</div>
        	</div>
        	<div class="span12">
        		<div class="span5">
        			<p>On behalf of <span data-bind="text: company.name"></span></p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p>Paid By:</p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        	</div>
        	<div style="margin-top: 15px" class="span12">
        		<p>Address: <span data-bind="text: company.address"></span> <sapn data-bind="text: company.city"></sapn> <span data-bind="text: company.country.name"></span>.</p>
        	</div>
        </div>
    </div>
</script>
<script id="invoiceForm26" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<table class="span12 left-tbl">
        		<tr>
        			<td colspan="4" rowspan="2" data-bind="style: {backgroundColor: obj.color}" style="text-align:center;padding-left:0;" class="main-color">
        			ប័ណ្ណកែតម្រូវបរិមាណសន្និធិ<br>Material Adjustment Note
        			</td>
        			<td colspan="2">កាលបរិច្ឆេទ Date</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td colspan="2">លេខ MA No</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td colspan="2" width="100">
        				គម្រោង Project
        			</td>
        			<td colspan="2" width="100">

        			</td>
        			<td colspan="2">
        				ផល្ូវ Street #
        			</td>
        			<td width="120">

        			</td>
        		</tr>
        		<tr>
        			<td colspan="2">
        				ល្វែង Bloc #
        			</td>
        			<td colspan="2">

        			</td>
        			<td colspan="2">
        				អគារ House #
        			</td>
        			<td>

        			</td>
        		</tr>
        		<tr>
        			<td colspan="2">
        				មេការ
        			</td>
        			<td colspan="2">

        			</td>
        			<td colspan="2">
        				មេជាង
        			</td>
        			<td>

        			</td>
        		</tr>
        		<tr class="center-tbl" style="background: #c6d9f1;">
        			<td>
        				ល.រ<br>No
        			</td>
        			<td colspan="2">
        				ប្រភេទសន្និធិ ឬ​សម្ភារៈ<br>Item Description
        			</td>
        			<td>
        				លេខកូដ<br>Sku
        			</td>
        			<td>
        				ខ្នាត<br>UM
        			</td>
        			<td>
        				ចំនួន Qty
        			</td>
        			<td>
        				ផ្សេងៗ Remark
        			</td>
        		</tr>
        		<tr><td>&nbsp;</td><td colspan="2"></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td colspan="2"></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td colspan="2"></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td colspan="2"></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td colspan="2"></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td>&nbsp;</td><td colspan="2"></td><td></td><td></td><td></td><td></td></tr>
        		<tr><td colspan="7"></td></tr>
        		<tr>
        			<td colspan="2" width="100">
        				អ្នករៀបចំ<br>Prepared By
        			</td>
        			<td colspan="2" width="100">

        			</td>
        			<td colspan="2">
        				អ្នកយល់ព្រម<br>Approved By
        			</td>
        			<td width="120">

        			</td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm27" type="text/x-kendo-template">
	<div class="inv1">
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="2" rowspan="4" style="text-align: left;padding-left: 10px;" data-bind="html: obj.note">
                        	</td>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm23" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company">
            	<h2 ></h2>
                <h3 style="text-align:left;" data-bind="text: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                	<pre>អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></pre>
                    <pre>ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span></pre>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-weight:bold">
                        		<span data-bind="text: obj.contact[0].name"></span><br>
                        		<span data-bind="text: obj.contact[0].address"></span>
                        	</p>
                        </div>
                    </div>
                    <div class="clear">
                    	<!--div class="left">
                    		<p>ទូរស័ព្ទ​លេខ HP:</p>
                        </div-->
                        <div class="left dotted-ruler" style="width: 78%;">
                        	<p style="font-weight:bold" data-bind="text: obj.contact[0].phone"></p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th width="50" style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th width="50" style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប (បូក​បញ្ចូល​ទាំង​អាករ)​ Total (VAT included)</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ទទួលបាន Cash Receipt</td>
                            <td class="rside" data-bind="text: obj.cash_receipt"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សមតុល្យ Balance</td>
                            <td class="rside" data-bind="text: obj.balance"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm28" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company">
            	<h2 ></h2>
                <h3 style="text-align:left;" data-bind="html: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                	<pre>អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></pre>
                    <pre>ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span></pre>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>

        	<div class="clear inv2">
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
						 data-auto-bind="false"
		                 data-template="invoiceForm-lineDS-template"
		                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">
                        	សាច់ប្រាក់ទទួលបាន Cash Receipt</td>
                            <td class="rside" data-bind="text: obj.cash_receipt"></td>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm29" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company">
            	<h2 ></h2>
                <h3 style="text-align:left;" data-bind="html: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                	<pre>អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></pre>
                    <pre>ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span></pre>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រអាករ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: contactDS.data()[0].vat_no"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>

        	<div class="clear inv2">
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">
                        	សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">
                        	សាច់ប្រាក់ទទួលបាន Cash Receipt</td>
                            <td class="rside" data-bind="text: obj.cash_receipt"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">
                        	សមតុល្យ Balance</td>
                            <td class="rside" data-bind="text: obj.balance"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm30" type="text/x-kendo-template">
	<div class="inv1">
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ទទួលបាន Cash Receipt</td>
                            <td class="rside" data-bind="text: obj.cash_receipt"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សមតុល្យ Balance</td>
                            <td class="rside" data-bind="text: obj.balance"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm31" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 0; float: left; width: 100%;">បណ័្ឌដឹកទំនិញ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px; font-size: 18px"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<!-- <p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p> -->
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<!-- <th class="rside">កំណត់សំគាល់<br>REMARK</th> -->
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template31"
						data-bind="source: lineDS">

        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="90">ចេញដោយ <br>ISSUED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">ដឹកជញ្ជូន <br>DELIVERED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td>អ្នកទទួល<br>Reveived BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
         <div class="foot">
        	<div class="cover-signature">
                <div class="singature" style="float:right">
                	<p>អតិថិជន អ្នកទទួល និង ហត្ថលេខា<br /></p>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="invoiceForm32" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 0; float: left; width: 100%;">បណ័្ឌដឹកទំនិញ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px; font-size: 18px"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<!-- <th class="rside">កំណត់សំគាល់<br>REMARK</th> -->
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template31"
						data-bind="source: lineDS">

        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="90">ចេញដោយ <br>ISSUED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">ដឹកជញ្ជូន <br>DELIVERED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td>អ្នកទទួល<br>Reveived BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
         <div class="foot">
        	<div class="cover-signature">
                <div class="singature" style="float:right">
                	<p>អតិថិជន អ្នកទទួល និង ហត្ថលេខា<br /></p>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="invoiceForm33" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 4px; float: left; width: 100%;">បណ័្ឌដឹកទំនិញ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px; font-size: 18px"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>

        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<!-- <th class="rside">កំណត់សំគាល់<br>REMARK</th> -->
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template33"
						data-bind="source: lineDS">
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="90">ចេញដោយ <br>ISSUED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">ដឹកជញ្ជូន <br>DELIVERED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td>អ្នកទទួល<br>Reveived BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
         <div class="foot">
        	<div class="cover-signature">
                <div class="singature" style="float:right">
                	<p>អតិថិជន អ្នកទទួល និង ហត្ថលេខា<br /></p>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="invoiceForm34" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style=" margin-bottom: 0px; font-size: 20px; margin-top: 4px; float: left; width: 100%;">បណ័្ឌដឹកទំនិញ</p>
        			<p class="form-title" data-bind="text: obj.title" style="margin-bottom: 10px; font-size: 18px"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>

        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<!-- <th class="rside">កំណត់សំគាល់<br>REMARK</th> -->
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template33"
						data-bind="source: lineDS">
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="90">ចេញដោយ <br>ISSUED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">ដឹកជញ្ជូន <br>DELIVERED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td>អ្នកទទួល<br>Reveived BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
         <div class="foot">
        	<div class="cover-signature">
                <div class="singature" style="float:right">
                	<p>អតិថិជន អ្នកទទួល និង ហត្ថលេខា<br /></p>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="invoiceForm35" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង់ SUPPLIER INFO</b></br>
        			<div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-weight:bold">
                        		<span style="font-size: 12px;" data-bind="text: contactDS.data()[0].name"></span><br>
                        		<span data-bind="text: contactDS.data()[0].address"></span>
                        	</p>
                        </div>
                    </div>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 78%;">
                        	<sapne style="font-weight:bold" data-bind="text: contactDS.data()[0].phone"></p>
                        </div>
                    </div>
        			<!-- <p><span data-bind="text: obj.contact[0].name"></span><br>
        			<span data-bind="text: obj.contact[0].address"></span>
        			</p> -->
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT</div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT COST</th>
        				<th width="80" class="rside" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template6"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;" colspan="3" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm36" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង់ SUPPLIER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT</div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT COST</th>
        				<th width="80" class="rside" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template6"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;" colspan="3" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm37" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style="margin-bottom: 15px;" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        			<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}"><p>សរុប TOTAL <span data-bind="text: obj.amount"></span></p></div>
        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង់ SUPPLIER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT</div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT COST</th>
        				<th class="rside" width="80" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template8"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;" colspan="2" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td style="background-color: #eee;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td style="background-color: #dce6f2;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm38" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style="margin-bottom: 15px;" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        			<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}"><p>សរុប TOTAL <span data-bind="text: obj.amount"></span></p></div>
        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង់ SUPPLIER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT</div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT COST</th>
        				<th class="rside" width="80" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template8"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;" colspan="2" rowspan="4" data-bind="text: obj.note"></td>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td style="background-color: #eee;" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td style="background-color: #dce6f2;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm39" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<style>
				.inv2 table td {
					padding: 10px;
					font-size: 14px;
				}
				.inv1 th {
					font-size: 14px;
				}
				.inv1 * {
					font-size: 14px;
					line-height: 25px;
				}
				.inv1 td {
					font-size: 16px;
				}
				.inv1 .cover-signature .singature p {
					font-size: 14px;
					font-weight: normal;
				}
				.inv1 .ten * {
					font-size: 14px!important;
				}
			</style>
	    	<div class="head" style="width: 90%;">
	        	<div class="logo">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
	            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
	            	<h2></h2>
	            	<h3 style="float: left;font-size: 20px;" data-bind="html: company.name"></h3>
	                <div class="vattin" style="float: left; width: 100%">
	                	<p style="float: left; width: 100%">
	                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
	                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" data-bind="text: company.vat_number"></span>
	                	</p>
	                </div>
	                <div class="clear" style="float: left;">
	                	<p style="float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
	                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> Email: <span data-bind="text: company.email"></span></p>
	                </div>
	            </div>
	        </div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង SUPPLIER INFO</b><br>
        			<p><span data-bind="text: obj.contact.name"></span><br>
        			<span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style="font-size: 26px!important; text-transform: uppercase;margin-bottom: 10px;">ប័ណ្ណទទួលទំនិញ</p>
        			<p class="form-title" style="font-size: 26px!important; text-transform: uppercase;">RECIEVE NOTE</p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th style="width: 8%;text-align: center;">ល.រ<br />N<sup style="color: #fff!important;">o</sup></th>
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: left;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">កំណត់សំគាល់<br>REMARK</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-recievenot"
						data-bind="source: lineDS">

        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="150">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="150">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm40" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង SUPPLIER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style="font-size: 24px;" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">កំណត់សំគាល់<br>REMARK</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template31"
						data-bind="source: lineDS">

        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm41" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style="margin-bottom: 15px;font-size: 24px;" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>

        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង SUPPLIER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">កំណត់សំគាល់<br>REMARK</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template33"
						data-bind="source: lineDS">
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm42" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span5">
        		<div class="logo" style="width: 50%">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span7">
        		<div class="span5" style="margin-right: 30px;">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" >
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear" style="margin: 20px 0;">
        		<div class="span4" style="margin-right:45px;">
        			<p class="form-title" style="margin-bottom: 15px;font-size: 24px;" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>

        		</div>
        		<div class="span7">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង SUPPLIER INFO</b><br><br>
        			<p><span data-bind="text: obj.contact[0].name"></span><br>
        			<span data-bind="text: obj.contact[0].address"></span>
        			</p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">កំណត់សំគាល់<br>REMARK</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template33"
						data-bind="source: lineDS">
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="90">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm43" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span12">
	        	<div class="span7">
	        		<div class="logo" style="width: 40%">
		            	<img style="width: " data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
	        	</div>
	        	<div class="span5">
	        		<div class="span12" style="margin-bottom: 10px;">
	        			<h2 style="font-size: 24px;text-align: left;color:#10253f " data-bind="text: obj.title"></h2>
	        			<!--img src="<?php echo base_url(); ?>assets/invoice/img/official-receipt.jpg" /-->
	        			<p class="form-title" style="font-size: 20px; margin-top: 7px; float: left; width: 100%; margin-bottom: 0;">ប្រាក់កក់អិថិជន</p>
	        		</div>
	        		<div class="span12">
	        			<table class="span12">
	        				<tr>
	        					<td class="light-blue-td" width="100">កាលបរិច្ឆេទ Date</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.issued_date"></td>
	        				</tr>
	        				<tr>
	        					<td class="light-blue-td">លេខបបង្កាន់ដៃ Receipt No.</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.number"></td>
	        				</tr>
	        			</table>
	        		</div>
	        	</div>
	        </div>
        	<div class="span12" style="margin-top: 10px;">
		    	<div class="span7" style="margin-top: 10px;">
		    		<table class="span11">
						<tr>
							<td class="light-blue-td" width="120">ទទួលពីឈ្មោះ​ <br>Recieve From</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].name"></td>
						</tr>
						<tr>
							<td class="light-blue-td">អាស័យ​ដ្ឋាន <br>Contact Address</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].address"></td>
						</tr>
						<tr>
							<td class="light-blue-td">គោលបំណង​​ <br>Purpose</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: lineDS.data()[0].description"></td>
						</tr>
						<tr>
							<td class="light-blue-td">លេខយោង <br> Reference Document</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.reference_no"></td>
						</tr>
					</table>
		    	</div>
		    	<div class="span5" style="float:right">
		    		<p style="padding: 5px 0; text-align: left;font-weight: bold;color: #000;">ចំនួនទទួលសរុប​ <br> TOTAL RECEIVED AMOUNT</p>
		    		<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}">
		    			<p><span class="total-amount" data-bind="text: obj.amount"></span></p>
		    		</div>
		    		<p style="padding: 5px 0;font-weight: bold;color: #000;clear:both;">វិធីសាស្រ្តទូទាត់​ Mode of payment</p>
		    		<p style="color: #000;clear:both;" data-bind="text: paymentMethodDS.data()[0].name"></p>
		    	</div>
		    </div>
        	<div class="span12">
        		<div class="span8">
        			<p style="color:black;margin: 10px 0;" data-bind="text: obj.note"></p>
        		</div>
        	</div>
        	<div class="span12">
        		<div class="span5">
        			<p>On behalf of <span data-bind="text: company.name"></span></p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p>Paid By:</p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        	</div>
        	<div style="margin-top: 15px" class="span12">
        		<p>Address: <span data-bind="text: company.address"></span> <sapn data-bind="text: company.city"></sapn> <span data-bind="text: company.country.name"></span>.</p>
        	</div>
        </div>
    </div>
</script>
<script id="purchaseSampleService" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
            <div class="cover-name-company" style="float: left;">
            	<h2 ></h2>
                <h3 style="text-align:left;" data-bind="text: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                	<p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                	<p style="font-size: 10px;">អ៊ីម៉ែល: </p>
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span></p>
                </div>
            </div>
            <div class="logo" style="float: right;">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
        </div>
        <div class="content">
        	<!-- <div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div> -->
        	<div>
        		<p style="font-weight: 600; font-size: 12px; margin-bottom: 8px;">Purchase order No. xxxxxxx dated xxxxxxxx</p>
        		<p style="font-size: 10px; ">Please state our order no, Item no, material no, and delivery address on all delivery documents, delivery items and invoices.</p>
        		<p style="font-weight: 600; font-size: 12px;">Procurement/ Contact person</p>
        		<p style="font-size: 10px; ">Name:</p>
        		<p style="font-size: 10px; ">Phone:</p>
        		<p style="font-size: 10px; margin-bottom: 8px;">Fax:</p>
        		<p style="font-size: 10px; margin-bottom: 8px;">Delivery date</p>
        		<p style="font-size: 10px; ">We order under our present General Conditions of Purchase (if these conditions are not already available to you please contact our responsible purchaser).</p>
        	</div>
            <!-- <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-weight:bold">
                        		<span style="font-size: 12px;" data-bind="text: contactDS.data()[0].name"></span><br>
                        		<span data-bind="text: contactDS.data()[0].address"></span>
                        	</p>
                        </div>
                    </div>
                    <div class="clear">
                    	div class="left">
                    		<p>ទូរស័ព្ទ​លេខ HP:</p>
                        </div
                        <div class="left dotted-ruler" style="width: 78%;">
                        	<p style="font-weight:bold" data-bind="text: contactDS.data()[0].phone"></p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div> -->
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">Item</th>
                            <th style="text-align: center;">Quantity</th>
                            <th style="text-align: center;">Item Description</th>
                            <th style="text-align: center;">Price(USD</th>
                            <th style="text-align: center;">Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <!-- <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប (បូក​បញ្ចូល​ទាំង​អាករ)​ Total (VAT included)</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.deposit"></td>
                        </tr> -->
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">Total USD</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <p style="font-size: 10px; margin-bottom: 8px; margin-top: 8px;">
            	By accepting the order, the supplier confirms to satisfy all regulatory requirements applicable to the country of manufacturing and sale.
            </p>

			<p style="font-size: 10px; border-bottom: 1px solid #333; width: 100%; float: left; padding-bottom: 8px;">
				Please pay attention to our invoice address. Invoices with wrong addresses cannot be handled and will be returned to you. The agreed payment terms will start only after the receipt of the corrected invoice.
            </p>
            <div style="font-size: 10px; width: 20%; float: left; margin-top: 8px;">
            	<p>Terms of payment:</p>
				<p>Invoices / credit notes:</p>
            </div>
            <div style="font-size: 10px; width: 45%; float: left; margin-left: 25px;margin-top: 8px;">
            	<p>Mekong Strategic Partners</p>
				<p>Level 2, #33 Samdech Sothearos Blvd (Corner of Street 178), Sangkat Chey Chumnas, Khan Daun Penh, Phnom Penh, Cambodia
				</p>
            </div>
            <div style="font-size: 10px; border-bottom: 1px solid #333; width: 100%; float: left; padding-bottom: 10px;">
            	<p>Work condition:	</p>
            </div>
            <p style="font-size: 10px; float: left; margin-top: 8px;">Yours faithfully</p>



        </div>
        <div class="foot" style="margin-top: 10px;">
        	<p style="font-size: 10px; float: left; margin-left: 65px; margin-bottom: 50px; width: 21%; font-weight: 600;">Mekong Strategic Partners Authorized Representative:</p>
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>Signature & Date</p>
                </div>
                <!-- <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div> -->
            </div>
            <!-- <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6> -->
        </div>
    </div>
</script>
<script id="invoiceTaxMekong" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 50%;float: right;">
            	<h2 ></h2>
            	<h3 style="float: right;">មេគង្គ ស្រេ្ទធីជីក ផាតនើរ</h3>
            	<h3 style="float: right;">Mekong Strategic Partners Co., Ltd.</h3>
                <!-- <h3 style="text-align:left;" data-bind="text: company.name"></h3> -->
                <!-- <h3 style="text-align:left;">វិក្កយបត្រពន្ធ</h3>
                <h3 style="text-align:left;">Tax Invoice</h3> -->
                <div class="vattin" style="float: right;">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear" style="float: right;">
                	<!-- <p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address">#182E1, St.63, Boeng Keng Kang Ti Muoy, Chamkar Mon, Phnom Penh</span></p>
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone">+855 (0) 12 639 733</span></p>
                    <p style="font-size: 10px;">Email: <span data-bind="text: company.telephone"> Info@mekongstrategic.com</span></p>
					<p style="font-size: 10px;">Website: <span data-bind="text: company.telephone">www.mekongstrategic.com</span></p>   -->
					<p style="font-size: 10px;float: right; text-align: right;">អាស័យ​ដ្ឋាន Address: <span data-bind="">#182E1, St.63, Boeng Keng Kang Ti Muoy, Chamkar Mon, Phnom Penh</span></p>
                    <p style="font-size: 10px;float: right;">ទូរស័ព្ទលេខ HP <span data-bind="">+855 (0) 12 639 733</span></p>
                    <p style="font-size: 10px;float: right;">Email: <span data-bind=""> Info@mekongstrategic.com</span></p>
					<p style="font-size: 10px;float: right;">Website: <span data-bind="">www.mekongstrategic.com</span></p>
                </div>
            </div>
           	<div style="float: right; width: 20%;">
           		<div id="invQR"></div>
           	</div>
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រពន្ធ</h1>
            	<h2 data-bind="">Tax Invoice</h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: contactDS.data()[0].vat_no"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<span style="font-weight:bold" data-bind="text: obj.number"></span>-<span style="font-weight:bold" data-bind="text: company.id"></span>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>

        	<div class="clear inv2">
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">ការពិពណ៌នា<br />Description</th>
                            <th style="text-align: center;">ចំនួនគិតជាដុល្លារ<br />Amount (USD)</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <!-- <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr> -->
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                       <!--  <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr> -->
                        <!-- <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr> -->
                    </tfoot>
                </table>
            </div>

            <div style="float: left;width: 35%; font-size: 10px; margin-top: 10px;">
            	<p>Please make the payment to:</p>
            	<p><b>Account name: </b>Mekong Strategic Partners</p>
            	<p><b>Bank: </b>ANZ Royal Bank</p>
            	<p><b>Address: </b>20 Kramoun Sar, PP, Cam.</p>
            	<p><b>Account No: </b>3242528</p>
            	<p><b>Swift Code: </b>ANZBKHPP</p>
            </div>
            <div style="float: left;width: 35%; font-size: 10px; margin-top: 10px; margin-left: 20px;">
            	<p style="margin-bottom: 10px;">Payment due withinin 14 days of date of invoice.</p>
            	<p>Thank you for choosing Mekong Strategic Partners</p>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceMsp" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 50%;float: right;">
            	<h2 ></h2>
            	<h3 style="float: right;">មេគង្គ ស្រេ្ទធីជីក ផាតនើរ</h3>
            	<h3 style="float: right;">Mekong Strategic Partners Co., Ltd.</h3>
                <!-- <h3 style="text-align:left;" data-bind="text: company.name"></h3> -->
                <!-- <h3 style="text-align:left;">វិក្កយបត្រពន្ធ</h3>
                <h3 style="text-align:left;">Tax Invoice</h3> -->
                <div class="vattin" style="float: right;">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear" style="float: right;">
                	<!-- <p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address">#182E1, St.63, Boeng Keng Kang Ti Muoy, Chamkar Mon, Phnom Penh</span></p>
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone">+855 (0) 12 639 733</span></p>
                    <p style="font-size: 10px;">Email: <span data-bind="text: company.telephone"> Info@mekongstrategic.com</span></p>
					<p style="font-size: 10px;">Website: <span data-bind="text: company.telephone">www.mekongstrategic.com</span></p>   -->
					<p style="font-size: 10px;float: right; text-align: right;">អាស័យ​ដ្ឋាន Address: <span data-bind="">#182E1, St.63, Boeng Keng Kang Ti Muoy, Chamkar Mon, Phnom Penh</span></p>
                    <p style="font-size: 10px;float: right;">ទូរស័ព្ទលេខ HP <span data-bind="">+855 (0) 12 639 733</span></p>
                    <p style="font-size: 10px;float: right;">Email: <span data-bind=""> Info@mekongstrategic.com</span></p>
					<p style="font-size: 10px;float: right;">Website: <span data-bind="">www.mekongstrategic.com</span></p>
                </div>
            </div>
           	<div style="float: right; width: 20%;">
           		<div id="invQR"></div>
           	</div>
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រពន្ធ</h1>
            	<h2 data-bind="">Tax Invoice</h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: contactDS.data()[0].vat_no"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<span style="font-weight:bold" data-bind="text: obj.number"></span>-<span style="font-weight:bold" data-bind="text: company.id"></span>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>

        	<div class="clear inv2">
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;">ការពិពណ៌នា<br />Description</th>
                            <th style="text-align: center;">ចំនួនគិតជាដុល្លារ<br />Amount (USD)</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <!-- <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr> -->
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                       <!--  <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr> -->
                        <!-- <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr> -->
                    </tfoot>
                </table>
            </div>

            <div style="float: left;width: 35%; font-size: 10px; margin-top: 10px;">
            	<p>Please make the payment to:</p>
            	<p><b>Account name: </b>Mekong Strategic Partners</p>
            	<p><b>Bank: </b>ANZ Royal Bank</p>
            	<p><b>Address: </b>20 Kramoun Sar, PP, Cam.</p>
            	<p><b>Account No: </b>3242528</p>
            	<p><b>Swift Code: </b>ANZBKHPP</p>
            </div>
            <div style="float: left;width: 35%; font-size: 10px; margin-top: 10px; margin-left: 20px;">
            	<p style="margin-bottom: 10px;">Payment due withinin 14 days of date of invoice.</p>
            	<p>Thank you for choosing Mekong Strategic Partners</p>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoicePcg" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
            	<h2 ></h2>
            	<h3 style="float: left;">ភីស៊ីជី &  ផាតនើរ PCG & Partners Co., Ltd</h3>
                <div class="vattin" style="float: left; width: 100%">
                	<p style="float: left; width: 100%">
                		<span style="float: left; margin-left:0;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN) </span>
                		<span style="float: left; margin-left:0;" id="vat_number" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="font-size: 10px;float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="">#133, , Parkway Square 1st Floor (Room 1.21), Street Mao Tse Tong Blvd, Sangkat Toul Svay Prey, Khan Chamkarmon, Phnom Penh, Cambodia)</span></p>
                    <p style="font-size: 10px;float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="">+855 (0) 236666979</span></p>
                    <p style="font-size: 10px;float: left; width: 100%">Email: <span data-bind=""> Info@pro-cg.com</span></p>
					<p style="font-size: 10px;float: left; width: 100%">Website: <span data-bind="">www.pro-cg.com</span></p>
                </div>
            </div>
           	<div style="float: right; width: 20%;">
           		<div id="invQR"></div>
           	</div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; background: #001F5F; color: #fff; margin-bottom: 15px;">
        		<div class="span6">
        			<h1 style="color: #fff !important;">វិក្កយបត្រ Invoice</h1>
        		</div>
        		<div class="span6">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;">លេខវិក្កយបត្រ INVOICE NO </td>
        					<td style="border:0;text-align: left;">0917-0665 </td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;">30/09/2017 </td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span6" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1;">អតថិជិន (Customer) </td>
        					<td style="text-align: left; background: #F1F1F1;">អាស័យ​ដ្ឋាន (Address) </td>
        				</tr>
        				<tr>
        					<td style="text-align: left;"></td>
        					<td style="text-align: left;">ភូមិដងហ៊ត ឃ ំ ចំប៉ សសុក ពសពកបាស លខតតតកកវ សបធនសកុមសប៊កាភបិ លបណត ញសកុមកកលមអរទ នបងវិល </td>
        				</tr>
        			</table>
        		</div>
        		<div class="span6">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: #F1F1F1;">លក្ខ័ខណ្ឌ ទូរទាត់ <br> Payment Term </td>
        					<td style="text-align: left;"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: #F1F1F1;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;background: #F1F1F1; color: #333;">ល.រ<br />N<sup>0</sup></th>
                            <th style="text-align: center;background: #F1F1F1; color: #333;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="text-align: center;background: #F1F1F1; color: #333;">បរិមាណ<br />QTY</th>
                            <th style="text-align: center;background: #F1F1F1; color: #333;">ឯកតា​<br />UOM</th>
                            <th style="text-align: center;background: #F1F1F1; color: #333;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;background: #F1F1F1; color: #333;">ថ្លៃ​ទំនិញ Amount</th>
                        </tr>
                    </thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>
							<td>5</td>
							<td>6</td>
						</tr>
						<tr>
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>
							<td>5</td>
							<td>6</td>
						</tr>
						<tr>
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>
							<td>5</td>
							<td>6</td>
						</tr>
						<tr>
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>
							<td>5</td>
							<td>6</td>
						</tr>
						<tr>
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>
							<td>5</td>
							<td>6</td>
						</tr>
					</tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ (បូកបញ្ជូលទាំងអាករ) GRAND TOTAL (VAT INCLUSIVE) </td>
                            <td style="background: #333; color: #fff;" class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="border-bottom: 1px solid #BEBEBE; padding-bottom:15px;">
				<div class="span8">
					<div style="border-radius: 5px; width: 100%; padding: 8px;border: 1px solid #BEBEBE; font-size: 11px;">
						<p style="font-weight: 600;">កំណត់សំគាល់៖ </p>
						<ul>
							<li>
								<b>ជម្រើសនៃការបង់ប្រាក់៖</b>
								អ្នកអាចបង់ប្រាក់ផ្ទាល់នៅការិយាល័យបង់ប្រាក់របស់ប្រាក់របស់ក្រុមហ៊ុន រឺ តាមភ្នាក់ងាររបស់ស្ថាប័នហិរញ្ញវត្ថុដូចមានរាយមានខាងក្រោម។ ក្នុងករណីអ្នកត្រូវការផ្ទេរសាច់ប្រាក់តាមធនាគារ សូមផ្ទេរមកកាន់គណនី៖
								<ul>
									<li><b>គណនីឈ្មោះ៖</b> PCG & Partners Co., Ltd </ol>
									<li><b>គណនីឈ្មោះ៖</b> 1400-01569868-1-1 </ol>
									<li><b>គណនីឈ្មោះ៖</b> ACLEDA Bank Plc. សាខាខេត្ត ព្រៃវែង</ol>
								</ul>
							</ol>
							<li>
								កម្រៃសេវាផ្ទេរសាច់ប្រាក់ជាការទទួលខុសត្រូវរបស់អ្នក
							</li>
							<li>
								សូមផ្តល់ពត័មានដែលអ្នកបានទូទាត់រួចមកកាន់៖ </br>
								លេខទូរស័ព្ទ <b> +855 087 719 898</b> រឺ <b> Email: lalinda@pro-cg.com </b>
							</li>
						</ul>
					</div>
				</div>
				<div class="span4">
					<div class="foot" style="margin-top: 45px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="margin-top: 57px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>

			        </div>
				</div>
           	</div>
        </div>
        <div class="foot" style="margin-top:10px;">
        	<div class="span3">
        		<div style="float: right; width: 20%;">
	           		<div id="invQR"></div>
	           	</div>
        	</div>
        	<div class="span3">
        		<p style="font-size: 11px;margin-bottom: 8px;">អ្នកអាចទូរទាត់វិក្កយបត្រនេះ ដោយប្រើប្រាស់លេខកូដខាងក្រោម៖</p>
        		<div  style="float: left; width: 100%; text-align:center; border: 1px solid #E9E9E9; border-radius:5px;padding: 8px;">0917-0665/353
        		</div>
        		<div style="float: left; width: 100%; height: 30px; background: #333; margin-top: 8px; margin-bottom: 20px;"></div>
        	</div>
        	<div class="span6" style="padding-left:15px; margin-bottom: 10px;">
        		<b style="font-size:12px; float:left; margin-bottom: 8px;">តាមរយៈភ្នាក់ងាររបស់ស្ថាប័នហិរញ្ញវត្ថុខាងក្រោមនេះ</b>
        		<div  style="float: left; width: 90%; text-align:center; border: 1px solid #E9E9E9; border-radius:5px;padding: 8px;min-height: 50px; margin-bottom: 20px;">
        		</div>
        	</div>
        </div>
    </div>
</script>
<script id="invoiceHDCom" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<div class="span3">
        		<div class="logo" style="width: 97%;margin-left: -9px;">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
        	</div>
        	<div class="span9">
        		<div class="span5">
        			<p data-bind="html: company.name"></p>
        			<p><b>អាស័យ​ដ្ឋាន Address:</b> <span data-bind="text: company.address"></span></p>
        		</div>
        		<div class="span5" style="float:right">
        			<p><b>Tel: </b><span data-bind="text: company.telephone"></span></p>
        			<p><b>Email: </b><span data-bind="text: company.email"></span></p>
        			<p><b>Website: </b><span data-bind="text: company.website"></span></p>
        		</div>
        	</div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 0px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអតិថិជន CUSTOMER INFO</b>
        			<p>ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
        			គំរោង Job : <span data-bind="text: contactDS.data()[0].job"></span><br/>
        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right; width: 40%">
        			<p class="form-title" style=" margin-bottom: 0; font-size: 20px; margin-top: 0; float: left; width: 100%;">បញ្ជាទិញ</p>
        			<p style="font-size: 18px;margin-bottom: 10px;" class="form-title" data-bind="text: obj.title"></p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<div class="span12 mid-title main-color" data-bind="style: {backgroundColor: obj.color}">
        		<div class="span6" style="text-align: left;padding-left: 10px;">លក្ខខណ្ឌ<br>TERM OF PAYMENT : <span data-bind="text: paymentMethodDS.data()[0].name"></span></div>

        		<div class="span6" style="text-align: left;padding-left: 10px;"><span style="margin-left: 47px;">សុពលភាព</span> <br>VALIDITY PERIOD : <span data-bind="text: obj.due_date"></span></div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="ten">
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: center;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">តម្លៃ​ឯកតា<br>UNIT PRICE</th>
        				<th width="80" class="rside" style="text-align: center;">សរុប<br>Total</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-template6"
						data-bind="source: lineDS">
        		<tfoot>
        			<tr>
        				<td style="border:none;text-align: left;color: #000" colspan="3" rowspan="4" data-bind="text: obj.note"></td>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.discount"></td>
        			</tr>
        			<tr>

        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">សរុបរង SUB TOTAL</td>
        				<td style="background-color: #eee;color: #000" class="rside" data-bind="text: obj.sub_total"></td>
        			</tr>
        			<tr>
        				<td colspan="2" style="text-align: left;padding-left: 10px;color: #000;font-weight:bold;">ពន្ធ TAX</td>
        				<td class="rside" style="background-color: #eee;color: #000" data-bind="text: obj.tax"></td>
        			</tr>
        			<tr>
        				<td colspan="2" class="main-color lside" data-bind="style: {backgroundColor: obj.color}" style="text-align: center;color: #fff;font-weight:bold;">សរុបរួម GRAND TOTAL</td>
        				<td class="rside" style="background-color: #dce6f2;color: #000;font-weight: bold;" data-bind="text: obj.amount"></td>
        			</tr>
        		</tfoot>
        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 20px;">
        		<tr>
        			<td width="90" style="color:#000;">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="80" style="color:#000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td width="90" style="color:#000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<!--tr>
        			<td>ត្រួតពិនិត្យដោយ<br>REVIEWED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr-->
        		<tr>
        			<td style="color:#000;">អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td style="color:#000;">តំណែង<br>POSITION</td><td width="80"></td>
        			<td style="color:#000;">កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="defaultCashAdvance" type="text/x-kendo-template">
	<style >
		.advance-voucher{
			width: 45%;
			margin: 50px auto 0;
			height: 250px;
		}
		.advance-voucher .advoucher-header .title{
			float: right;
			padding: 10px 10px 0;
			border: 1px solid #333;
			margin-bottom: 15px;
		}
		.advance-voucher .advoucher-header .title .kh{
			float: left;
			font-size: 30px;
			font-weight: 700;
			margin-right: 8px;
		}
		.advance-voucher .advoucher-header .title .EN{
			float: left;
			font-size: 20px;
			font-weight: 700;
			text-transform: uppercase;
			line-height: 46px;
		}
		.advance-voucher .advoucher-header table{
			width: 100%;
			float: left;
			border: 1px solid #333;
			border-collapse: collapse;
		}
		.advance-voucher .advoucher-header table tr td{
			padding: 5px;
			border: 1px solid #333;
			font-size: 13px;
		}
		.advance-voucher .advoucher-content table{
			width: 100%;
			float: left;
			border: 1px solid #333;
			border-collapse: collapse;
		}
		.advance-voucher .advoucher-content table tr th{
			padding: 5px;
			font-size: 13px;
			font-weight: 700;
			background: #1E4E78;
			text-transform: uppercase;
			border: 1px solid #333;
			color: #fff;
		}
		.advance-voucher .advoucher-content table tr td{
			padding: 5px;
			border: 1px solid #333;
			font-size: 13px;
		}
		.advance-voucher .advoucher-footer table{
			width: 100%;
			float: left;
			border: 1px solid #333;
			border-collapse: collapse;
		}
		.advance-voucher .advoucher-footer table tr th{
			padding: 5px;
			font-size: 13px;
			font-weight: 700;
			background: #ccc;
			text-transform: uppercase;
			border: 1px solid #333;
			color: #333;
		}
		.advance-voucher .advoucher-footer table tr td{
			padding: 5px;
			border: 1px solid #333;
			font-size: 13px;
		}
		.advance-voucher .advoucher-footer table tr td.rotate {
		    -moz-transform: rotate(-90.0deg);
		    -o-transform: rotate(-90.0deg);
		    -webkit-transform: rotate(-90.0deg);
		    filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);
		    -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)";
		}
	</style>
	<div class="advance-voucher">
		<div class="advoucher-header">
			<div class="title">
				<h2 class="kh">សក្ខីប័ត្របុរេប្រទាន </h2>
				<h2 class="en">advance voucher</h2>
			</div>
			<table>
				<tr>
					<td style="width: 22%;"><b>អ្នកស្នើសុំ Name</b></td>
					<td style="width: 20%;"></td>
					<td><b>លេខសក្ខីប័ត្រ AV No.</b></td>
					<td style="width: 20%;"></td>
				</tr>
				<tr>
					<td><b>តំណែង Position</b></td>
					<td></td>
					<td><b>កាលបរិចេ្ឆទ Date</b></td>
					<td></td>
				</tr>
				<tr>
					<td><b>ផ្នែក Department</b></td>
					<td></td>
					<td><b>លេខប័ណ្ណលទ្ធកម្ម PR No.</b></td>
					<td></td>
				</tr>
				<tr>
					<td><b>ទូទាត់ដោយ Mode of Payment</b></td>
					<td colspan="3"><b>ទូទាត់ដោយ Mode of Payment</b> 
						<input type="checkbox" name="cash" value="cash"> សាច់ប្រាក់ Cash 
						<input type="checkbox" name="cheque" value="cheque"> មូលប្បទានប័ត្រ Cheque(No.<span style="margin-right: 50px;"></span>)<br>
						<input type="checkbox" name="bank" value="bank"> ផ្ទេរតាមធនាគារ T.T(Account No:<span style="margin-right: 50px;"></span>) Currency Required:
						<input type="checkbox" name="currency" value="currency"> USD
						<input type="checkbox" name="usd" value="usd"> KHR
						<input type="checkbox" name="khr" value="khr">
					</td>
				</tr>
				<tr>
					<td><b>គោលបំណងនៃបុរេប្រទាន <br> Purpose of Advance</b></td>
					<td colspan="3"></td>
				</tr>
			</table>
		</div>
		<div class="advoucher-content">
			<table>
				<tr>
					<th style="width: 5%">No.</th>
					<th>បិរយាយ Description</th>
					<th style="width: 5%">REF.</th>
					<th>Amount</th>
				</tr>
				<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>
				</tr>
				<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>
				</tr>
				<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>
				</tr>
				<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>
				</tr>
				<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>
				</tr>
				<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: right; font-size: 18px; font-weight: 700;"> <span style="font-size: 25px;">សរុប</span> Total</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2" style="background: #1E4E78; color: #fff" colspan="">ចំនួនជាអក្សរ Amount in Words</td>
					<td colspan="2"></td>
				</tr>
			</table>
		</div>
		<div class="advoucher-footer">
			<table>
				<tr>
					<th colspan="2"></th>
					<th>ហត្ថលេខា SINATURE</th>
					<th>តំណែង POSITION</th>
					<th>កាលបរិចេ្ឆទ DATE</th>
				</tr>
				<tr>
					<td rowspan="2" class="rotate">Requesting Dept</td>
					<td style="padding: 10px 5px;">រៀបចំដោយ <br> PREPARED BY</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td style="padding: 10px 5px;">យល់ស្របដោយ <br> ENDORSED BY</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td rowspan="4" class="rotate">Finance Department</td>
					<td>ត្រួតពិនិត្យដោយ <br> REVIEWED BY</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>សំរេចដោយ <br> APPROVED BY</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>ទូទាត់ដោយ <br> PAID BY</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>ទទួលដោយ <br> RECEIVED BY</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="4">For Accounting Department Only</td>
				</tr>
				<tr>
					<td></td>
					<td>Account Code</td>
					<td>Account Description</td>
					<td>Debit</td>
					<td>Credit</td>
				</tr>
				<tr>
					<td></td>
					<td>កត់ត្រាដោយ POSTED ONLY</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</div>
	</div>
</script>
<!-- MAX Concrete Form-->
<script id="invoiceMAXConcrete" type="text/x-kendo-template">
	<div class="inv1" style="page-break-after: always;padding-top: 20px;">
		<style>
			.inv2 table td {
				padding: 5px;
				font-size: 12px;
			}
			.inv1 th {
				font-size: 12px;
			}
			.inv1 * {
				font-size: 12px;
				line-height: 20px;
			}
			.inv1 td {
				font-size: 14px;
			}
			.inv1 .cover-signature .singature p {
				font-size: 12px;
				font-weight: normal;
			}
		</style>
    	<div class="head" style="width: 90%;">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
            	<h2></h2>
            	<h3 style="float: left;font-size: 20px;" data-bind="text: company.name"></h3>
                <div class="vattin" style="float: left; width: 100%">
                	<p style="float: left; width: 100%">
                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> <br>Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; background: \\#001F5F!important;-webkit-print-color-adjust:exact; color: \\#fff; margin-bottom: 15px;">
        		<div class="span5">
        			<h1 style="color: \\#fff !important;margin-top: 15px;padding-left: 30px; text-align: left;text-transform: uppercase;">វិក្កយបត្រ Invoice</h1>
        		</div>
        		<div class="span6" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;text-transform: uppercase;color:\\#fff!important;">លេខវិក្កយបត្រ INVOICE NO</td>
        					<td style="border:0;text-align: left;font-weight: bold;color:\\#fff!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color:\\#fff!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color:\\#fff!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span6" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: \\#F1F1F1;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left; background: \\#F1F1F1;">អាស័យ​ដ្ឋាន (Address) </td>
        				</tr>
        				<tr>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].name"></td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: \\#F1F1F1;">លក្ខ័ខណ្ឌ ទូរទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: \\#F1F1F1;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="padding: 10px 0;width: 8%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ល.រ<br />No</th>
                            <th style="padding: 10px 0;width: 25%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">លេខយោង<br />Reference</th>
                            <th style="padding: 10px 0;width: 12%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិមាណ<br />QTY</th>
                            <th style="padding: 10px 0;width: 812%;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">កម្លាំង<br />Strange</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">Slump</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ឯកតា​<br />UOM</th>
                            <th style="padding: 10px 0;width: 14%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="padding: 10px 0;width: 15%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃ​ទំនិញ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="max-concrete-line"
						data-bind="source: lineDS">
						<tr>
							<td style="height:40px!important;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="8" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ (បូកបញ្ជូលទាំងអាករ) GRAND TOTAL (VAT INCLUSIVE) </td>
                            <td style="font-size: 16px;background: \\#333; color: \\#fff;" class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="border-bottom: 1px solid \\#BEBEBE; padding-bottom:15px;">
				<div class="span12">
					<div style="border-radius: 5px; width: 100%; padding: 8px;border: 1px solid \\#BEBEBE; font-size: 11px;">
						<p data-bind="html: obj.note"></p>
					</div>
				</div>
				<div class="span12">
					<div class="span4" style="margin-top: 80px; float: left;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="span4" style="margin-top: 80px; float: right;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<script id="invoiceVATMAXConcrete" type="text/x-kendo-template">
	<div class="inv1" style="page-break-after: always;padding-top: 20px;">
		<style>
			.inv2 table td {
				padding: 5px;
				font-size: 12px;
			}
			.inv1 th {
				font-size: 12px;
			}
			.inv1 * {
				font-size: 12px;
				line-height: 20px;
			}
			.inv1 td {
				font-size: 14px;
			}
			.inv1 .cover-signature .singature p {
				font-size: 12px;
				font-weight: normal;
			}
		</style>
    	<div class="head" style="width: 90%;">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
            	<h2></h2>
            	<h3 style="float: left;font-size: 20px;" data-bind="text: company.name"></h3>
                <div class="vattin" style="float: left; width: 100%">
                	<p style="float: left; width: 100%">
                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> <br>Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; background: \\#001F5F!important;-webkit-print-color-adjust:exact; color: \\#fff; margin-bottom: 15px;">
        		<div class="span6">
        			<h1 style="color: \\#fff !important;margin-top: 15px;padding-left: 30px; text-align: left;text-transform: uppercase;">វិក្កយបត្រ Invoice</h1>
        		</div>
        		<div class="span5" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;text-transform: uppercase;color:\\#fff!important;">លេខវិក្កយបត្រ<br> INVOICE NO</td>
        					<td style="border:0;text-align: left;font-weight: bold;color:\\#fff!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color:\\#fff!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color:\\#fff!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span6" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: \\#F1F1F1;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left; background: \\#F1F1F1;" data-bind="text: contactDS.data()[0].name"> </td>
        				</tr>
        				<tr>
        					<td style="text-align: left;" >អាស័យ​ដ្ឋាន (Address)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left;font-size: 11px;line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)(ប្រសិន​បើ​មាន / If any)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].vat_no"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: \\#F1F1F1;">លក្ខ័ខណ្ឌ ទូរទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: \\#F1F1F1;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="padding: 10px 0;width: 8%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ល.រ<br />No</th>
                            <th style="padding: 10px 0;width: 25%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">លេខយោង<br />Reference</th>
                            <th style="padding: 10px 0;width: 12%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិមាណ<br />QTY</th>
                            <th style="padding: 10px 0;width: 812%;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">កម្លាំង<br />Strange</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">Slump</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ឯកតា​<br />UOM</th>
                            <th style="padding: 10px 0;width: 14%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="padding: 10px 0;width: 15%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃ​ទំនិញ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="max-concrete-line"
						data-bind="source: lineDS">
						<tr>
							<td style="height:40px!important;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="8" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr><!-- 
                        <tr>
                        	<td colspan="8" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr> -->
                        <tr>
                        	<td colspan="8" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="8" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <!-- <tr>
                        	<td colspan="8" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr> -->
                        <!-- <tr>
                        	<td colspan="8" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr> -->
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="border-bottom: 1px solid \\#BEBEBE; padding-bottom:15px;">
				<div class="span12">
					<div style="border-radius: 5px; width: 100%; padding: 8px;border: 1px solid \\#BEBEBE; font-size: 11px;">
						<p data-bind="html: obj.note"></p>
					</div>
				</div>
				<div class="span12">
					<div class="span4" style="margin-top: 80px; float: left;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="span4" style="margin-top: 80px; float: right;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<!-- Heritage walk -->
<script id="invoiceHeritageWalk" type="text/x-kendo-template">
	<div class="inv1" style="page-break-after: always;padding-top: 20px;">
		<style>
			.inv2 table td {
				padding: 5px;
				font-size: 12px;
			}
			.inv1 th {
				font-size: 12px;
			}
			.inv1 * {
				font-size: 12px;
				line-height: 20px;
			}
			.inv1 td {
				font-size: 14px;
			}
			.inv1 .cover-signature .singature p {
				font-size: 12px;
				font-weight: normal;
			}
		</style>
    	<div class="head" style="width: 90%;">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
            	<h2></h2>
            	<h3 style="float: left;font-size: 20px;text-align: left;" data-bind="html: company.name"></h3>
                <div class="vattin" style="float: left; width: 100%">
                	<p style="float: left; width: 100%">
                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> <br>Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; background: \\#001F5F!important;-webkit-print-color-adjust:exact; color: \\#fff; margin-bottom: 15px;">
        		<div class="span5">
        			<h1 style="color: \\#fff !important;margin-top: 15px;padding-left: 30px; text-align: left;text-transform: uppercase;">វិក្កយបត្រ Invoice</h1>
        		</div>
        		<div class="span6" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;text-transform: uppercase;color:\\#fff!important;">លេខវិក្កយបត្រ INVOICE NO</td>
        					<td style="border:0;text-align: left;font-weight: bold;color:\\#fff!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color:\\#fff!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color:\\#fff!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span6" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: \\#F1F1F1;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left;" >គម្រោង (Project)</td>
        					<td style="text-align: left;" data-bind="text: jobDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: \\#F1F1F1;">អាស័យ​ដ្ឋាន (Address) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: \\#F1F1F1;">លេខទូរស័ព្ទ (Telephone) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].phone"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: \\#F1F1F1;">លក្ខ័ខណ្ឌ ទូរទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: \\#F1F1F1;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="padding: 10px 0;width: 8%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ល.រ<br />No</th>
                            <th style="padding: 10px 0;width: 25%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="padding: 10px 0;width: 12%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិមាណ<br />QTY</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ឯកតា​<br />UOM</th>
                            <th style="padding: 10px 0;width: 14%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="padding: 10px 0;width: 15%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃ​ទំនិញ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="heritage-walk-line"
						data-bind="source: lineDS">
						<tr>
							<td style="height:40px!important;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ (បូកបញ្ជូលទាំងអាករ) GRAND TOTAL (VAT INCLUSIVE) </td>
                            <td style="font-size: 16px;background: \\#333; color: \\#fff;" class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="border-bottom: 1px solid #BEBEBE; padding-bottom:15px;">
				<div class="span8">
					<div style="border-radius: 5px; width: 100%; padding: 8px;border: 1px solid #BEBEBE; font-size: 11px;" data-bind="html: obj.note">

					</div>
				</div>
				<div class="span4">
					<div class="foot" style="margin-top: 45px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="margin-top: 57px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<script id="invoiceVATHeritageWalk" type="text/x-kendo-template">
	<div class="inv1" style="page-break-after: always;padding-top: 20px;">
		<style>
			.inv2 table td {
				padding: 5px;
				font-size: 12px;
			}
			.inv1 th {
				font-size: 12px;
			}
			.inv1 * {
				font-size: 12px;
				line-height: 20px;
			}
			.inv1 td {
				font-size: 14px;
			}
			.inv1 .cover-signature .singature p {
				font-size: 12px;
				font-weight: normal;
			}
		</style>
    	<div class="head" style="width: 90%;">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
            	<h2></h2>
            	<h3 style="float: left;font-size: 20px;text-align: left;" data-bind="html: company.name"></h3>
                <div class="vattin" style="float: left; width: 100%">
                	<p style="float: left; width: 100%">
                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> <br>Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; background: \\#001F5F!important;-webkit-print-color-adjust:exact; color: \\#fff; margin-bottom: 15px;">
        		<div class="span6">
        			<h1 style="color: \\#fff !important;margin-top: 15px;padding-left: 30px; text-align: left;text-transform: uppercase;">វិក្កយបត្រ Invoice</h1>
        		</div>
        		<div class="span5" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;text-transform: uppercase;color:\\#fff!important;">លេខវិក្កយបត្រ<br> INVOICE NO</td>
        					<td style="border:0;text-align: left;font-weight: bold;color:\\#fff!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color:\\#fff!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color:\\#fff!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span6" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: \\#F1F1F1;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left; background: \\#F1F1F1;" data-bind="text: contactDS.data()[0].name"> </td>
        				</tr>
        				<tr>
        					<td style="text-align: left;" >គម្រោង (Project)</td>
        					<td style="text-align: left;" data-bind="text: jobDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left;" >អាស័យ​ដ្ឋាន (Address)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: \\#F1F1F1;">លេខទូរស័ព្ទ (Telephone) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].phone"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left;font-size: 11px;line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].vat_no"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: \\#F1F1F1;">លក្ខ័ខណ្ឌ ទូរទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: \\#F1F1F1;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="padding: 10px 0;width: 8%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ល.រ<br />No</th>
                            <th style="padding: 10px 0;width: 25%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="padding: 10px 0;width: 12%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">បរិមាណ<br />QTY</th>
                            <th style="padding: 10px 0;width: 10%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ឯកតា​<br />UOM</th>
                            <th style="padding: 10px 0;width: 14%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="padding: 10px 0;width: 15%;text-align: center;background: \\#F1F1F1; color: \\#333;text-transform: uppercase;">ថ្លៃ​ទំនិញ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="heritage-walk-line"
						data-bind="source: lineDS">
						<tr>
							<td style="height:40px!important;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <!-- <tr>
                        	<td colspan="6" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="6" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr> -->
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="border-bottom: 1px solid \\#BEBEBE; padding-bottom:15px;">
				<div class="span8">
					<div style="border-radius: 5px; width: 100%; padding: 8px;border: 1px solid #BEBEBE; font-size: 11px;" data-bind="html: obj.note">

					</div>
				</div>
				<div class="span4">
					<div class="foot" style="margin-top: 45px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="margin-top: 57px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<script id="depositHeritageWalk" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span12">
	        	<div class="span7">
	        		<div class="logo" style="width: 40%">
		            	<img style="width: " data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
	        	</div>
	        	<div class="span5">
	        		<div class="span12" style="margin-bottom: 10px;">
	        			<h2 style="font-size: 24px;text-align: left;color:#10253f">ប្រាក់កក់អតិថិជន</h2>
	        			<p class="form-title" style="font-size: 20px; margin-top: 7px; float: left; width: 100%; margin-bottom: 0;" data-bind="text: obj.title"></p>
	        		</div>
	        		<div class="span12">
	        			<table class="span12">
	        				<tr>
	        					<td class="light-blue-td" width="100">កាលបរិច្ឆេទ Date</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.issued_date"></td>
	        				</tr>
	        				<tr>
	        					<td class="light-blue-td">លេខបង្កាន់ដៃ Receipt No.</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.number"></td>
	        				</tr>
	        			</table>
	        		</div>
	        	</div>
	        </div>
        	<div class="span12" style="margin-top: 10px;">
		    	<div class="span7" style="margin-top: 10px;">
		    		<table class="span11">
						<tr>
							<td class="light-blue-td" width="120">ទទួលពីឈ្មោះ​ <br>Recieve From</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].name"></td>
						</tr>
						<tr>
        					<td class="light-blue-td" >គម្រោង <br>Project</td>
        					<td style="text-align: left;padding-left: 5px;" data-bind="text: jobDS.data()[0].name"></td>
        				</tr>
						<tr>
							<td class="light-blue-td">អាស័យ​ដ្ឋាន <br>Contact Address</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].address"></td>
						</tr>
						<tr>
							<td class="light-blue-td">គោលបំណង​​ <br>Purpose</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="html: accountLineDS.data()[0].description"></td>
						</tr>
						<tr>
							<td class="light-blue-td">លេខយោង <br> Reference Document</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.reference_no"></td>
						</tr>
					</table>
		    	</div>
		    	<div class="span5" style="float:right">
		    		<p style="padding: 5px 0; text-align: left;font-weight: bold;color: #000;">ចំនួនទទួលសរុប​ <br> TOTAL RECEIVED AMOUNT</p>
		    		<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}">
		    			<p><span class="total-amount" data-bind="text: obj.amount"></span></p>
		    		</div>
		    		<p style="padding: 5px 0;font-weight: bold;color: #000;clear:both;">វិធីសាស្រ្តទូទាត់​ Mode of payment</p>
		    		<p style="color: #000;clear:both;" data-bind="text: paymentMethodDS.data()[0].name"></p>
		    	</div>
		    </div>
        	<div class="span12">
        		<div class="span5">
        			<p>On behalf of <span data-bind="html: company.name"></span></p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p>Paid By:</p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        	</div>
        	<div style="margin-top: 15px" class="span12">
        		<p>Address: <span data-bind="text: company.address"></span> <sapn data-bind="text: company.city"></sapn> <span data-bind="text: company.country.name"></span>.</p>
        	</div>
        </div>
    </div>
</script>
<script id="receiptHeritageWalk" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span12">
	        	<div class="span7">
	        		<div class="logo" style="width: 40%">
		            	<img style="width: " data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
	        	</div>
	        	<div class="span5">
	        		<div class="span12" style="margin-bottom: 10px;">
	        			<h2 style="font-size: 24px;text-align: left;color:#10253f">ទទួលប្រាក់អតិថិជន</h2>
	        			<p class="form-title" style="font-size: 20px; margin-top: 7px; float: left; width: 100%; margin-bottom: 0;" data-bind="text: obj.title"></p>
	        		</div>
	        		<div class="span12">
	        			<table class="span12">
	        				<tr>
	        					<td class="light-blue-td" width="100">កាលបរិច្ឆេទ Date</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.issued_date"></td>
	        				</tr>
	        				<tr>
	        					<td class="light-blue-td">លេខបបង្កាន់ដៃ Receipt No.</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.number"></td>
	        				</tr>
	        			</table>
	        		</div>
	        	</div>
	        </div>
        	<div class="span12" style="margin-top: 10px;">
		    	<div class="span7" style="margin-top: 10px;">
		    		<table class="span11">
						<tr>
							<td class="light-blue-td" width="120">ទទួលពីឈ្មោះ​ <br>Recieve From</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].name"></td>
						</tr>
						<tr>
        					<td class="light-blue-td" >គម្រោង <br>Project</td>
        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.reference[0].job"></td>
        				</tr>
						<tr>
							<td class="light-blue-td">អាស័យ​ដ្ឋាន <br>Contact Address</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: contactDS.data()[0].address"></td>
						</tr>
						<tr>
							<td class="light-blue-td">គោលបំណង​​ <br>Purpose</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="html: obj.memo"></td>
						</tr>
						<tr>
							<td class="light-blue-td">លេខយោង <br> Reference Document</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.reference_no"></td>
						</tr>
					</table>
		    	</div>
		    	<div class="span5" style="float:right">
		    		<p style="padding: 5px 0; text-align: left;font-weight: bold;color: #000;">ចំនួនទទួលសរុប​ <br> TOTAL RECEIVED AMOUNT</p>
		    		<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}">
		    			<p><span class="total-amount" data-bind="text: obj.amount"></span></p>
		    		</div>
		    		<p style="padding: 5px 0;font-weight: bold;color: #000;clear:both;">វិធីសាស្រ្តទូទាត់​ Mode of payment</p>
		    		<p style="color: #000;clear:both;" data-bind="text: paymentMethodDS.data()[0].name"></p>
		    	</div>
		    </div>
        	<div class="span12">
        		<div class="span5">
        			<p>On behalf of <span data-bind="html: company.name"></span></p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p>Paid By:</p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        	</div>
        	<div style="margin-top: 15px" class="span12">
        		<p>Address: <span data-bind="text: company.address"></span> <sapn data-bind="text: company.city"></sapn> <span data-bind="text: company.country.name"></span>.</p>
        	</div>
        </div>
    </div>
</script>
<!-- REACHS -->
<script id="normalInvoiceREACHS" type="text/x-kendo-template">
	<style>
		.inv2 table td {
			padding: 5px;
			font-size: 14px;
		}
		.inv1 th {
			font-size: 14px;
		}
		.inv1 * {
			font-size: 14px;
			line-height: 20px;
		}
		.inv1 td {
			font-size: 12px;
		}
		.inv1 .cover-signature .singature p {
			font-size: 12px;
			font-weight: normal;
		}
		body {
		    color: #333;
		    font-family: "Open Sans", 'Battambang';
		    font-size: 13px;
		    background: #fff;
		}
		*{
		  margin: 0 auto;
		  padding: 0;
		}
		.clear{
			clear: both;
		}
		.invoice-pcg {
			width: 50%;
			margin: 50px auto 0;
		}
		.invoice-pcg .invoicepcg-header{
			width: 100%;
			float: left;
			position: relative;
			margin-bottom: 50px;
		}
		.invoice-pcg .invoicepcg-content{
			width: 100%;
			float: left;
			position: relative;
			margin-bottom: 70px;
		}
		.invoice-pcg .invoicepcg-content table{
			width: 100%;
			float: left;
			border: 1px solid #333;
			border-collapse: collapse;
			margin-bottom: 15px;
		}
		.invoice-pcg .invoicepcg-content table tr td{
			padding: 5px;
			border: 1px solid #333;
			font-size: 13px;
		}
		.invoice-pcg .invoicepcg-content table tr th{
			padding: 5px;
			font-size: 13px;
			font-weight: 700;
			border: 1px solid #333;
			background: #ccc;
		}
		.invoice-pcg .invoicepcg-footer p{
			margin-bottom: 8px;
		}
	</style>
	<div class="inv1">
    	<div class="invoice-pcg" style="width: 80%;padding-top: 70px;">
			<div class="invoicepcg-header">
				<h1 style="line-height: 70px;font-size: 85px; font-weight: 700; float: right; width: 100%; margin-bottom: 60px; text-align: right;color: #203864 !important;">INVOICE</h1>
				<p style="width: 100%;font-size: 16px; float: left; margin-bottom: 35px;" data-bind="text: obj.issued_date">
				</p>
				<p style="margin-bottom: 10px;"><b style="margin-right: 8px; float: left;">To:</b> <span data-bind="text: contactDS.data()[0].name"></span></p>
				<p><b>Address:</b> <span data-bind="text: contactDS.data()[0].address"></span></p>
				<p><b>Phone:</b> <span data-bind="text: contactDS.data()[0].phone"></span></p>
			</div>
			<div class="invoicepcg-content">
				<p style="margin-bottom: 20px;">INVOICE NO: <span data-bind="text: obj.number"></span></p>
				<table>
					<thead>
						<tr>
							<th style="width: 10%;background: #203864!important; color: #fff!important;">No.</th>
							<th style="background: #203864!important; color: #fff!important;">Description.</th>
							<th style="width: 25%;background: #203864!important; color: #fff!important;">Amount</th>
						</tr>
					</thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="pcg-normal-invoice-line"
						data-bind="source: lineDS">
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2" style="text-align: right;">Total</td>
							<td style="text-align: right; font-weight: 700;" data-bind="text: obj.amount"></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: left;">In words: <span data-bind="text: numberToString"></span></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="invoicepcg-footer">
				<span style="float: left; width: 40%; border-bottom: 1px solid #333;margin-bottom: 40px;"></span>
				<div class="clear"></div>
				<p style="float: left; padding-bottom: 25px;  border-bottom: 1px solid #333; width: 28%; margin-bottom: 25px;">Received by</p>
				<div class="clear"></div>
				<p><b style="float: left; margin-right: 5px;">Name:</b>....................................</p>
				<p><b style="float: left; margin-right: 5px;">Position:</b>................................</p>
				<p><b style="float: left; margin-right: 5px;">Date:</b>......................................</p>
			</div>
		</div>
    </div>
</script>
<script id="invoiceREACHS" type="text/x-kendo-template">
	<style>
		.inv2 table td {
			padding: 5px;
			font-size: 12px;
		}
		.inv1 th {
			font-size: 12px;
		}
		.inv1 * {
			font-size: 12px;
			line-height: 20px;
		}
		.inv1 td {
			font-size: 12px;
		}
		.inv1 .cover-signature .singature p {
			font-size: 12px;
			font-weight: normal;
		}
	</style>
	<div class="inv1">
    	<div class="head" style="width: 90%;margin-top: 100px;">
        	<div class="logo">
            	<!-- <img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" /> -->
            </div>
            <div class="cover-name-company" style="width: 70%!important;float: none;margin: 0 auto;">
            	<h2 ></h2>
            	<h3 style="float: none; text-align: center;font-size: 20px;" data-bind="text: company.name"></h3>
                <div class="vattin" style="float: none; width: 100%">
                	<p style="float: none; width: 100%;text-align: center;">
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN) </span>
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;" id="vat_number" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="font-size: 14px!important;float: left; text-align: center;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="font-size: 14px!important;float: left;width: 100%;text-align: center;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> | Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; color: #fff; margin-bottom: 15px;">
        		<div class="span7">
        			<h1 style="color: #fff !important;text-align: left;margin-top: 13px;font-family: 'Preahvihear', 'Roboto Slab' !important;">វិក្កយបត្រ INVOICE</h1>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;color: #000!important;">លេខវិក្កយបត្រ INVOICE NO </td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color: #000!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span7" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left;" data-bind="text: obj.contact.name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អាស័យ​ដ្ឋាន (Address)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">លេខទូរស័ព្ទ (Telephone) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].phone"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: #F1F1F1!important;">លក្ខ័ខណ្ឌ ទូទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: #F1F1F1!important;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="width: 8%;text-align: center;background: #F1F1F1!important; color: #333!important;">ល.រ<br />N<sup>o</sup></th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="width: 12%;text-align: center;background: #F1F1F1!important; color: #333!important;">បរិមាណ<br />QTY</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ឯកតា​<br />UOM</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="width: 20%;text-align: center;background: #F1F1F1!important; color: #333!important;">តម្លៃ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="heritage-walk-line"
						data-bind="source: lineDS">
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប (បូក​បញ្ចូល​ទាំង​អាករ)​ Total (VAT included)	</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit	</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="padding-bottom:15px;">
            	<div class="span12">
					<div style="border-radius: 5px; width: 100%; padding: 8px; font-size: 11px;" data-bind="html: obj.note">
					</div>
				</div>
				<div class="span12">
			        <div class="foot" style="clear: none;margin-top: 80px; float: left; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="clear: none;margin-top: 80px; float: right; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<script id="invoiceVATREACHS" type="text/x-kendo-template">
	<style>
		.inv2 table td {
			padding: 5px;
			font-size: 12px;
		}
		.inv1 th {
			font-size: 12px;
		}
		.inv1 * {
			font-size: 12px;
			line-height: 20px;
		}
		.inv1 td {
			font-size: 12px;
		}
		.inv1 .cover-signature .singature p {
			font-size: 12px;
			font-weight: normal;
		}
	</style>
	<div class="inv1">
    	<div class="head" style="width: 90%;margin-top: 100px;">
        	<div class="logo">
            	<!-- <img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" /> -->
            </div>
            <div class="cover-name-company" style="width: 70%!important;float: none;margin: 0 auto;">
            	<h2 ></h2>
            	<h3 style="float: none; text-align: center;font-size: 20px;" data-bind="text: company.name"></h3>
                <div class="vattin" style="float: none; width: 100%">
                	<p style="float: none; width: 100%;text-align: center;">
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN) </span>
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;" id="vat_number" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="font-size: 14px!important;float: left; text-align: center;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="font-size: 14px!important;float: left;width: 100%;text-align: center;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> | Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; color: #fff; margin-bottom: 15px;">
        		<div class="span7">
        			<h1 style="color: #000 !important;text-align: left;margin-top: 13px;font-family: 'Preahvihear', 'Roboto Slab' !important;">វិក្កយបត្រអាករ TAX INVOICE</h1>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;color: #000!important;">លេខវិក្កយបត្រ INVOICE NO </td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color: #000!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span7" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left;" data-bind="text: obj.contact.name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អាស័យ​ដ្ឋាន (Address)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">លេខទូរស័ព្ទ (Telephone) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].phone"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">លេខ​អត្ត​សញ្ញាណ​កម្ម (VATTIN)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].vat_no"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: #F1F1F1!important;">លក្ខ័ខណ្ឌ ទូទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: #F1F1F1!important;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="width: 8%;text-align: center;background: #F1F1F1!important; color: #333!important;">ល.រ<br />N<sup>o</sup></th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="width: 12%;text-align: center;background: #F1F1F1!important; color: #333!important;">បរិមាណ<br />QTY</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ឯកតា​<br />UOM</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="width: 20%;text-align: center;background: #F1F1F1!important; color: #333!important;">តម្លៃ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="heritage-walk-line"
						data-bind="source: lineDS">
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="padding-bottom:15px;">
            	<div class="span12">
					<div style="border-radius: 5px; width: 100%; padding: 8px; font-size: 11px;" data-bind="html: obj.note">
					</div>
				</div>
				<div class="span12">
			        <div class="foot" style="clear: none;margin-top: 80px; float: left; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="clear: none;margin-top: 80px; float: right; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<!-- PCG -->
<script id="normalInvoicePCG" type="text/x-kendo-template">
	<style>
		.inv2 table td {
			padding: 5px;
			font-size: 14px;
		}
		.inv1 th {
			font-size: 14px;
		}
		.inv1 * {
			font-size: 14px;
			line-height: 20px;
		}
		.inv1 td {
			font-size: 12px;
		}
		.inv1 .cover-signature .singature p {
			font-size: 12px;
			font-weight: normal;
		}
		body {
		    color: #333;
		    font-family: "Open Sans", 'Battambang';
		    font-size: 13px;
		    background: #fff;
		}
		*{
		  margin: 0 auto;
		  padding: 0;
		}
		.clear{
			clear: both;
		}
		.invoice-pcg {
			width: 50%;
			margin: 50px auto 0;
		}
		.invoice-pcg .invoicepcg-header{
			width: 100%;
			float: left;
			position: relative;
			margin-bottom: 50px;
		}
		.invoice-pcg .invoicepcg-content{
			width: 100%;
			float: left;
			position: relative;
			margin-bottom: 70px;
		}
		.invoice-pcg .invoicepcg-content table{
			width: 100%;
			float: left;
			border: 1px solid #333;
			border-collapse: collapse;
			margin-bottom: 15px;
		}
		.invoice-pcg .invoicepcg-content table tr td{
			padding: 5px;
			border: 1px solid #333;
			font-size: 13px;
		}
		.invoice-pcg .invoicepcg-content table tr th{
			padding: 5px;
			font-size: 13px;
			font-weight: 700;
			border: 1px solid #333;
			background: #ccc;
		}
		.invoice-pcg .invoicepcg-footer p{
			margin-bottom: 8px;
		}
	</style>
	<div class="inv1">
    	<div class="invoice-pcg" style="width: 80%;padding-top: 70px;">
			<div class="invoicepcg-header">
				<h1 style="line-height: 70px;font-size: 85px; font-weight: 700; float: right; width: 100%; margin-bottom: 60px; text-align: right;color: #203864 !important;">INVOICE</h1>
				<p style="width: 100%;font-size: 16px; float: left; margin-bottom: 35px;" data-bind="text: obj.issued_date">
				</p>
				<p style="margin-bottom: 10px;"><b style="margin-right: 8px; float: left;">To:</b> <span data-bind="text: contactDS.data()[0].name"></span></p>
				<p><b>Address:</b> <span data-bind="text: contactDS.data()[0].address"></span></p>
				<p><b>Phone:</b> <span data-bind="text: contactDS.data()[0].phone"></span></p>
			</div>
			<div class="invoicepcg-content">
				<p style="margin-bottom: 20px;">INVOICE NO: <span data-bind="text: obj.number"></span></p>
				<table>
					<thead>
						<tr>
							<th style="width: 10%;background: #203864!important; color: #fff!important;">No.</th>
							<th style="background: #203864!important; color: #fff!important;">Description.</th>
							<th style="width: 25%;background: #203864!important; color: #fff!important;">Amount</th>
						</tr>
					</thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="pcg-normal-invoice-line"
						data-bind="source: lineDS">
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2" style="text-align: right;">Total</td>
							<td style="text-align: right; font-weight: 700;" data-bind="text: obj.amount"></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: left;">In words: <span data-bind="text: numberToString"></span></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="invoicepcg-footer">
				<span style="float: left; width: 40%; border-bottom: 1px solid #333;margin-bottom: 40px;"></span>
				<div class="clear"></div>
				<p style="float: left; padding-bottom: 25px;  border-bottom: 1px solid #333; width: 28%; margin-bottom: 25px;">Received by</p>
				<div class="clear"></div>
				<p><b style="float: left; margin-right: 5px;">Name:</b>....................................</p>
				<p><b style="float: left; margin-right: 5px;">Position:</b>................................</p>
				<p><b style="float: left; margin-right: 5px;">Date:</b>......................................</p>
			</div>
		</div>
    </div>
</script>
<script id="invoicePCG" type="text/x-kendo-template">
	<style>
		.inv2 table td {
			padding: 5px;
			font-size: 12px;
		}
		.inv1 th {
			font-size: 12px;
		}
		.inv1 * {
			font-size: 12px;
			line-height: 20px;
		}
		.inv1 td {
			font-size: 12px;
		}
		.inv1 .cover-signature .singature p {
			font-size: 12px;
			font-weight: normal;
		}
	</style>
	<div class="inv1">
    	<div class="head" style="width: 90%;margin-top: 100px;">
        	<div class="logo">
            	<!-- <img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" /> -->
            </div>
            <div class="cover-name-company" style="width: 70%!important;float: none;margin: 0 auto;">
            	<h2 ></h2>
            	<h3 style="float: none; text-align: center;font-size: 20px;" data-bind="text: company.name"></h3>
                <div class="vattin" style="float: none; width: 100%">
                	<p style="float: none; width: 100%;text-align: center;">
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN) </span>
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;" id="vat_number" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="font-size: 14px!important;float: left; text-align: center;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="font-size: 14px!important;float: left;width: 100%;text-align: center;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> | Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; color: #fff; margin-bottom: 15px;">
        		<div class="span7">
        			<h1 style="color: #fff !important;text-align: left;margin-top: 13px;font-family: 'Preahvihear', 'Roboto Slab' !important;">វិក្កយបត្រ INVOICE</h1>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;color: #000!important;">លេខវិក្កយបត្រ INVOICE NO </td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color: #000!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span7" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left;" data-bind="text: obj.contact.name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អាស័យ​ដ្ឋាន (Address)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">លេខទូរស័ព្ទ (Telephone) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].phone"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: #F1F1F1!important;">លក្ខ័ខណ្ឌ ទូទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: #F1F1F1!important;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="width: 8%;text-align: center;background: #F1F1F1!important; color: #333!important;">ល.រ<br />N<sup>o</sup></th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="width: 12%;text-align: center;background: #F1F1F1!important; color: #333!important;">បរិមាណ<br />QTY</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ឯកតា​<br />UOM</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="width: 20%;text-align: center;background: #F1F1F1!important; color: #333!important;">តម្លៃ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="heritage-walk-line"
						data-bind="source: lineDS">
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប (បូក​បញ្ចូល​ទាំង​អាករ)​ Total (VAT included)	</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit	</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="padding-bottom:15px;">
            	<div class="span12">
					<div style="border-radius: 5px; width: 100%; padding: 8px; font-size: 11px;" data-bind="html: obj.note">
					</div>
				</div>
				<div class="span12">
			        <div class="foot" style="clear: none;margin-top: 80px; float: left; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="clear: none;margin-top: 80px; float: right; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<script id="invoiceVATPCG" type="text/x-kendo-template">
	<style>
		.inv2 table td {
			padding: 5px;
			font-size: 12px;
		}
		.inv1 th {
			font-size: 12px;
		}
		.inv1 * {
			font-size: 12px;
			line-height: 20px;
		}
		.inv1 td {
			font-size: 12px;
		}
		.inv1 .cover-signature .singature p {
			font-size: 12px;
			font-weight: normal;
		}
	</style>
	<div class="inv1">
    	<div class="head" style="width: 90%;margin-top: 100px;">
        	<div class="logo">
            	<!-- <img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" /> -->
            </div>
            <div class="cover-name-company" style="width: 70%!important;float: none;margin: 0 auto;">
            	<h2 ></h2>
            	<h3 style="float: none; text-align: center;font-size: 20px;" data-bind="text: company.name"></h3>
                <div class="vattin" style="float: none; width: 100%">
                	<p style="float: none; width: 100%;text-align: center;">
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN) </span>
                		<span style="font-size: 16px;float: none; margin-left:0;text-align: center;" id="vat_number" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="font-size: 14px!important;float: left; text-align: center;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="font-size: 14px!important;float: left;width: 100%;text-align: center;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> | Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; color: #fff; margin-bottom: 15px;">
        		<div class="span7">
        			<h1 style="color: #000 !important;text-align: left;margin-top: 13px;font-family: 'Preahvihear', 'Roboto Slab' !important;">វិក្កយបត្រអាករ TAX INVOICE</h1>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;color: #000!important;">លេខវិក្កយបត្រ INVOICE NO </td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color: #000!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color: #000!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span7" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left;" data-bind="text: obj.contact.name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អាស័យ​ដ្ឋាន (Address)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">លេខទូរស័ព្ទ (Telephone) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].phone"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">លេខ​អត្ត​សញ្ញាណ​កម្ម (VATTIN)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].vat_no"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: #F1F1F1!important;">លក្ខ័ខណ្ឌ ទូទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: #F1F1F1!important;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="width: 8%;text-align: center;background: #F1F1F1!important; color: #333!important;">ល.រ<br />N<sup>o</sup></th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="width: 12%;text-align: center;background: #F1F1F1!important; color: #333!important;">បរិមាណ<br />QTY</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ឯកតា​<br />UOM</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="width: 20%;text-align: center;background: #F1F1F1!important; color: #333!important;">តម្លៃ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="heritage-walk-line"
						data-bind="source: lineDS">
					</tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="padding-bottom:15px;">
            	<div class="span12">
					<div style="border-radius: 5px; width: 100%; padding: 8px; font-size: 11px;" data-bind="html: obj.note">
					</div>
				</div>
				<div class="span12">
			        <div class="foot" style="clear: none;margin-top: 80px; float: left; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="clear: none;margin-top: 80px; float: right; width: 40%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
    </div>
</script>
<script id="advanceVoucherPCG" type="text/x-kendo-template">
	<style type="text/css">
		* {
			padding: 0;
			margin: 0;
		}
		* td {
			border: 1px solid black;
    		border-collapse: collapse;
		}
		table {
			border-spacing: 0;
		}
		.inv1 th {
			text-transform: uppercase;
			text-align: right;
			padding: 15px 5px;
			border: 1px solid #000;
			background: #eee;
		}
		.inv1 td {
			padding: 5px;
			text-align: left;
		}
		table.bottom td {
			border: none;
		}
	</style>
	<div class="inv1" style="margin-top: 40px;">
		<table style="width: 100%" >
			<tr>
				<td colspan="2" style="text-align: center;font-size: 16px;font-weight: bold;padding: 30px 0;" data-bind="html: company.name">
					
				</td>
				<td colspan="4" style="text-align: center;font-size: 16px;font-weight: bold;padding: 30px 0;">
					ADVANCE VOUCHER
				</td>
			</tr>
			<tr>
				<td style="width: 20%;text-align: left;">
					Ref.:
				</td>
				<td data-bind="text: obj.reference_no">
				</td>
				<td rowspan="3" style="width: 15%;text-align: center;">
					DEVISION
				</td>
				<td rowspan="3" style="width: 15%;text-align: center;">
					Banhji
				</td>
				<td style="text-align:left;width: 15%">
					Ex. Leaving date: 
				</td>
				<td>N/A</td>
			</tr>
			<tr>
				<td style="text-align:left;">Requested by:</td>
				<td>N/A</td>
				<td style="text-align:left;">Ex. coming date:</td>
				<td>N/A</td>
			</tr>
			<tr>
				<td style="text-align:left;">Position:</td>
				<td>N/A</td>
				<td style="text-align:left;">Amount Req. (USD):</td>
				<td>N/A</td>
			</tr>
			<tr>
				<td colspan="6" style="height: 50px; text-align: left;" data-bind="html: obj.note" >
				</td>
			</tr>
		</table>
		<table style="margin-top: 10px; width: 100%;">
			<thead>
				<tr>
					<th colspan="2" style="text-align: center;width: 40%">
						Description
					</th>
					<th style="text-align: center;width: 13%">
						Reference
					</th>
					<th style="width: 12%">
						Quantity
					</th>
					<th style="width: 15%">
						Unit cost
					</th>
					<th style="width: 20%">
						Amount(USD)
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="2" style="height: 20px;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2" style="height: 20px;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2" style="height: 20px;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<table style="margin-top: 10px; width: 100%;" class="bottom">
			<tbody >
				<tr>
					<td style="height: 20px; width: 20%;">Requested by:</td>
					<td style="width: 20%;border-top: 1px solid #000;text-align: center;"></td>
					<td style="width: 13%;"></td>
					<td style="width: 12%;">Reviewd by:</td>
					<td style="width: 35%;border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Name:</td>
					<td style="border-top: 1px solid #000;text-align: center;">Hul Ratana</td>
					<td style=""></td>
					<td style="">Name:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Position:</td>
					<td style="border-top: 1px solid #000;text-align: center;"></td>
					<td style=""></td>
					<td style="">Position:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Date:</td>
					<td style="border-top: 1px solid #000;text-align: center;">31/10/2017</td>
					<td style=""></td>
					<td style="">Date:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;"></td>
					<td style="border-top: 1px solid #000;text-align: center;"></td>
					<td style=""></td>
					<td style=""></td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Approved by:</td>
					<td style="border-top: 1px solid #000;text-align: center;"></td>
					<td style=""></td>
					<td style="">Approved by:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Name:</td>
					<td style="border-top: 1px solid #000;text-align: center;">Roeurn Bunheng</td>
					<td style=""></td>
					<td style="">Name:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Position:</td>
					<td style="border-top: 1px solid #000;text-align: center;">Finance Director</td>
					<td style=""></td>
					<td style="">Position:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Date:</td>
					<td style="border-top: 1px solid #000;text-align: center;">31/10/2017</td>
					<td style=""></td>
					<td style="">Date:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px; width: 10%;"></td>
					<td style="width: 20%;border-top: 1px solid #000;text-align: center;"></td>
					<td style="width: 15%;"></td>
					<td style="width: 15%;"></td>
					<td style="width: 40%;border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Paid by:</td>
					<td style="border-top: 1px solid #000;text-align: center;"></td>
					<td style=""></td>
					<td style="">Received by:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Name:</td>
					<td style="border-top: 1px solid #000;text-align: center;">LCT</td>
					<td style=""></td>
					<td style="">Name:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2">Hul Ratana</td>
				</tr>
				<tr>
					<td style="height: 20px;">Position:</td>
					<td style="border-top: 1px solid #000;text-align: center;">Accountant</td>
					<td style=""></td>
					<td style="">Position:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
				<tr>
					<td style="height: 20px;">Date:</td>
					<td style="border-top: 1px solid #000;text-align: center;">31/10/2017</td>
					<td style=""></td>
					<td style="">Date:</td>
					<td style="border-top: 1px solid #000;text-align: center;" colspan="2"></td>
				</tr>
			</tbody>
		</table>
	</div>
</script>
<!-- PCG PADEE -->
<script id="invoicePCGPADEE" type="text/x-kendo-template">
	<style>
		.inv2 table td {
			padding: 5px;
			font-size: 12px;
		}
		.inv1 th {
			font-size: 12px;
		}
		.inv1 * {
			font-size: 12px;
			line-height: 20px;
		}
		.inv1 td {
			font-size: 12px;
		}
		.inv1 .cover-signature .singature p {
			font-size: 12px;
			font-weight: normal;
		}
		text {
			display: none!important;
		}
	</style>
	<div class="inv1">
    	<div class="head" style="width: 90%;">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
            	<h2></h2>
            	<h3 style="float: left;font-size: 20px; font-family: 'Preahvihear', 'Roboto Slab' !important;" data-bind="html: company.name"></h3>
                <div class="vattin" style="float: left; width: 100%">
                	<p style="float: left; width: 100%">
                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" data-bind="text: company.vat_number"></span>
                	</p>
                </div>
                <div class="clear" style="float: left;">
                	<p style="float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> Email: <span data-bind="text: company.email"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden; padding:10px 0; background: #001F5F!important;-webkit-print-color-adjust:exact; color: #fff; margin-bottom: 15px;">
        		<div class="span5">
        			<h1 style="color: #fff !important;margin-top: 15px;padding-left: 30px; text-align: left;text-transform: uppercase;font-family: 'Preahvihear', 'Roboto Slab' !important;">វិក្កយបត្រ Invoice</h1>
        		</div>
        		<div class="span6" style="float: right;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="border:0;text-align: left; width: 53%;text-transform: uppercase;color:#fff!important;">លេខវិក្កយបត្រ INVOICE NO</td>
        					<td style="border:0;text-align: left;font-weight: bold;color:#fff!important;" data-bind="text: obj.number"></td>
        				</tr>
        				<tr>
        					<td style="border:0;text-align: left;color:#fff!important;">កាលបរិច្ឆេទ DATE</td>
        					<td style="border:0;text-align: left;color:#fff!important;" data-bind="text: obj.issued_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="span12 pcg2" style="margin-bottom: 15px;">
        		<div class="span7" style="padding-right: 10px;">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អតិថិជិន (Customer) </td>
        					<td style="text-align: left;" data-bind="text: obj.contact.name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">អាស័យ​ដ្ឋាន (Address)</td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].address"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; width: 45%; background: #F1F1F1!important;">លេខទូរស័ព្ទ (Telephone) </td>
        					<td style="text-align: left;" data-bind="text: contactDS.data()[0].phone"></td>
        				</tr>
        			</table>
        		</div>
        		<div class="span5">
        			<table style="float: left; width: 100%;">
        				<tr>
        					<td style="text-align: left; width: 53%; background: #F1F1F1!important;">លក្ខ័ខណ្ឌ ទូទាត់ <br> Payment Term </td>
        					<td style="text-align: left;" data-bind="text: paymentMethodDS.data()[0].name"></td>
        				</tr>
        				<tr>
        					<td style="text-align: left; background: #F1F1F1!important;">ថ្ងៃផុតកំណត់ Due Date </td>
        					<td style="text-align: left;" data-bind="text: obj.due_date"></td>
        				</tr>
        			</table>
        		</div>
        	</div>
        	<div class="clear inv2" style="margin-bottom:20px;" >
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="width: 8%;text-align: center;background: #F1F1F1!important; color: #333!important;">ល.រ<br />N<sup>o</sup></th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">បរិយាយមុខទំនិញ<br />Description</th>
                            <th style="width: 12%;text-align: center;background: #F1F1F1!important; color: #333!important;">បរិមាណ<br />QTY</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ឯកតា​<br />UOM</th>
                            <th style="text-align: center;background: #F1F1F1!important; color: #333!important;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="width: 20%;text-align: center;background: #F1F1F1!important; color: #333!important;">តម្លៃ<br> Amount</th>
                        </tr>
                    </thead>
					<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="heritage-walk-line"
						data-bind="source: lineDS">
					</tbody>
                    <tfoot>
                    	<tr>
							<td style="height:40px!important;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
                        <tr>
                        	<td colspan="5" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ (បូកបញ្ជូលទាំងអាករ) GRAND TOTAL (VAT INCLUSIVE) </td>
                            <td style="font-size: 16px;background: #333; color: #fff;" class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="span12 pcg-list" style="border-bottom: 1px solid #BEBEBE; padding-bottom:15px;">
				<div class="span8">
					<div style="border-radius: 5px; width: 100%; padding: 8px;border: 1px solid #BEBEBE; font-size: 11px;" data-bind="html: obj.note">
					</div>
				</div>
				<div class="span4">
					<div class="foot" style="margin-top: 80px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
			                </div>
			            </div>
			        </div>
			        <div class="foot" style="margin-top: 80px; float: left; width: 100%;">
			        	<div class="cover-signature">
			                <div class="singature" style="float:left; width: 100%;">
			                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
			                </div>
			            </div>
			        </div>
				</div>
           	</div>
        </div>
        <div class="foot" style="margin-top:10px;">
        	<div class="span3">
        		<div style="float: right; width: 88%;">
	           		<div
	           			data-role="qrcode"
              			data-error-correction="M"
              			data-encoding="UTF_8"
              			data-bind="value: obj.qrcodevalue"
              			style="height: 180px;">
              		</div>
	           	</div>
        	</div>
        	<div class="span3">
        		<p style="font-size: 14px;margin-bottom: 8px;">អ្នកអាចទូរទាត់វិក្កយបត្រនេះ ដោយប្រើប្រាស់លេខកូដខាងក្រោម៖</p>
        		<div  style="float: left; width: 100%; text-align:center; border: 1px solid #E9E9E9; border-radius:5px;padding: 8px;font-size: 25px;font-weight: bold;"><span data-bind="text: obj.number"></span>-<span data-bind="text: company.id"></span>
        		</div>
        		<div style="float: left; width: 100%; height: 30px; margin-top: 8px; margin-bottom: 20px;margin-left: -20px;">
        			<span
        				data-role="barcode"
                  		data-type="code128"
                  		data-bind="value: obj.number"
                  		style="width: 100%;height: 50px;">
                  	</span>
        		</div>
        	</div>
        	<div class="span5" style="float: right;padding-left:15px; margin-bottom: 10px;">
        		<b style="font-size:14px; float:left; margin-bottom: 8px;">តាមរយៈភ្នាក់ងាររបស់ស្ថាប័នហិរញ្ញវត្ថុខាងក្រោមនេះ</b>
        		<div  style="float: left; width: 90%; text-align:center; border: 1px solid #E9E9E9; border-radius:5px;padding: 8px;min-height: 50px; margin-bottom: 20px;">
        			<img src="<?php echo base_url();?>assets/img/amk-logo.png" style="width: 42%; height: auto;" />
        		</div>
        	</div>
        </div>
    </div>
</script>
<!--Caritas Company-->
<script id="pcg-normal-invoice-line" type="text/x-kendo-template">
	#if(price > 0){#
		<tr>
			<td class="center" style="color: \\#000">&nbsp;#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
			<td class="lside" style="color: \\#000">#= description ? description : "" #</td>
			<td class="rside" style="color: \\#000;text-align: right;font-weight: bold;">
				#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
			</td>
		</tr>
	#}#
</script>
<script id="max-concrete-line" type="text/x-kendo-template">
	#if(price > 0){#
		<tr>
			<td class="center" style="color: \\#000">&nbsp;#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
			<td class="lside" style="color: \\#000">#= description ? description : "" #</td>
			<td class="lside" style="color: \\#000">#= reference_no #</td>
			<td>#: quantity#</td>
			<td style="color: \\#000">
				#if(variant.length > 0){#
					#$.each(variant, function(j,k){#
						#if(k.variant_attribute_id == '1'){#
							#:k.name#
						#}#
					#});#
				#}#
			</td>
			<td style="color: \\#000">
				#if(variant.length > 0){#
					#$.each(variant, function(j,k){#
						#if(k.variant_attribute_id == '2'){#
							#:k.name#
						#}#
					#});#
				#}#
			</td>
			<td class="rside" width="70" style="color: \\#000;text-align: center;">
				#: measurement.measurement#
			</td>
			<td class="rside" style="background-color: \\#eee;color: \\#000;text-align: right;">
				#if(price > 0){##= kendo.toString(price, locale=="km-KH"?"c0":"c", locale)##}#
			</td>
			<td class="rside" style="background-color: \\#eee;color: \\#000;text-align: right;">
				#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
			</td>
		</tr>
	#}#
</script>
<script id="heritage-walk-line" type="text/x-kendo-template">
	#if(price > 0){#
		<tr>
			<td class="center" style="color: \\#000">&nbsp;#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
			<td class="lside" style="color: \\#000">#= description ? description : "" #</td>
			<td>#: quantity#</td>
			<td class="rside" width="70" style="color: \\#000;text-align: center;">
				#: measurement.measurement#
			</td>
			<td class="rside" style="background-color: \\#eee;color: \\#000;text-align: right;">
				#if(price > 0){##= kendo.toString(price, locale=="km-KH"?"c0":"c", locale)##}#
			</td>
			<td class="rside" style="background-color: \\#eee;color: \\#000;text-align: right;">
				#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
			</td>
		</tr>
	#}#
</script>
<script id="formCaritasExpense" type="text/x-kendo-template">
	<div class="voucher1">
    	<div class="head">
    		<div class="logo">
            	<img style="max-width: 100px;width: 100px;" data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="official">
            	Official
            </div>
            <div class="head-title" data-bind="text: obj.title">
            </div>
            <div class="row">
            	<div class="span12">
	    			<div class="span7" style="padding-left: 0; padding-right: 15px;">
	    				<table class="tableright">
	    					<tr>
	    						<td style="width: 156px; text-align: right;">PAID TO/ RECEIVED FROM</td>
	    						<td data-bind="text: contactDS.data()[0].name"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">PAYMENT METHOD</td>
	    						<td data-bind="text: accountDS.name"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">Location</td>
	    						<td data-bind="text: company.name"></td>
	    					</tr>
	    				</table>
	    			</div>
	    			<div class="span5" style="padding-right: 0; ">
	    				<table class="tableright">
	    					<tr>
	    						<td style="width: 130px; text-align: right;">Transaction Date:</td>
	    						<td style="text-align: center; color: #333; font-weight: 600;" data-bind="text: obj.issued_date"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">Transaction No:</td>
	    						<td style="text-align: center; color: #333; font-weight: 600; background: #d9d9d9;" data-bind="text: obj.number"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">Project Name:</td>
	    						<td style="text-align: center;" data-bind="text: proaccountLineDS.name"></td>
	    					</tr>
	    				</table>
	    			</div>
	    		</div>
    		</div>
    	</div>
    	<div class="content">
    		<div class="row">
    			<div class="span12" style="padding-bottom: 15px;">
    				<table class="tablecontent">
    					<thead>
	    					<tr>
	    						<th style="width: 240px; border: 1px solid #333; text-align: center; padding: 5px;" rowspan="2">DESCRIPTION</th>
	    						<th style="width: 50px; border: 1px solid #333; text-align: center; padding: 5px;" rowspan="2">REF</th>
	    						<th style="width: 109px; border: 1px solid #333; text-align: center; padding: 5px;" rowspan="2">DONOR</th>
	    						<th style="border: 1px solid #333; text-align: center; padding: 5px; background: #fbda6c; " colspan="3">ACCOUNTING ENTRY</th>
	    					</tr>
	    					<tr>
	    						<th style="border: 1px solid #333; padding: 5px; text-align: center; background: #fbda6c;">ACCOUNT</th>
	    						<th style="border: 1px solid #333; padding: 5px; text-align: center; background: #fbda6c;">DR</th>
	    						<th style="border: 1px solid #333; padding: 5px; text-align: center; background: #fbda6c;">CR</th>
	    					</tr>
	    				</thead>
	    				<tbody style="margin-top: 2px" id="formListView"
	        				data-role="listview"
							data-auto-bind="false"
							data-template="formCaritasExpense-journallineDS-template"
							data-bind="source: journalLineDS">
						</tbody>
	    				<tfoot>
	    					<tr>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: left;" colspan="2">PREPARED BY :</td>
	    						<td style="border: 1px solid #333; padding: 5px; font-weight: 800;">Total</td>
	    						<td style="border: 1px solid #333; padding: 5px; font-weight: 800;"></td>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: right; font-weight: 800;" data-bind="text: totalDR"></td>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: right; font-weight: 800;" data-bind="text: totalCR"></td>
	    					</tr>
	    					<tr>
	    						<td colspan="2" rowspan="2" style="border: 1px solid #333; padding: 5px;">VERIFIED BY :</td>
	    						<td rowspan="2" style="border: 1px solid #333; padding: 5px; font-weight: 800; background: #808080; color: #FFF;">Only for Advance Clearance</td>
	    						<td colspan="2" style="border: 1px solid #333; padding: 5px; ">AV No:    <span data-bind="text: obj.reference_no"></span></td>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: right;" data-bind="text: obj.deposit"></td>
	    					</tr>
	    					<tr>
	    						<td colspan="2" style="border: 1px solid #333; padding: 5px; text-align: left; font-weight: 800;">NET AMOUNT DUE FROM STAFF</td>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: right; font-weight: 800;" data-bind="text: netAmountDUE"></td>
	    					</tr>
	    					<tr>
	    						<td colspan="2" style="border: 1px solid #333; padding: 5px;">APPROVED BY :</td>
	    						<td colspan="4" style="border: 1px solid #333; padding: 5px; ">In Words:</td>

	    					</tr>
	    					<tr>
	    						<td colspan="2" style="border: 1px solid #333; padding: 5px;">RECEIVED BY :</td>
	    						<td colspan="4" style="border: 1px solid #333; padding: 5px; "></td>
	    					</tr>
	    				</tfoot>
    				</table>
    			</div>
    		</div>
    	</div>
    	<div class="footer">
    	</div>
    </div>
</script>
<script id="formCaritasJournal" type="text/x-kendo-template">
	<div class="voucher1">
    	<div class="head">
    		<div class="logo">
            	<img style="max-width: 100px;width: 100px;" data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="official">
            	Official
            </div>
            <div class="head-title" data-bind="text: obj.title">
            </div>
            <div class="row">
            	<div class="span12">
	    			<div class="span7" style="padding-left: 0; padding-right: 15px;">
	    				<table class="tableright">
	    					<tr>
	    						<td style="width: 156px; text-align: right;">PAID TO/ RECEIVED FROM</td>
	    						<td data-bind="text: contactDS.data()[0].name"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">JOURNAL TYPE</td>
	    						<td data-bind="text: accountDS.name"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">Location</td>
	    						<td data-bind="text: company.name"></td>
	    					</tr>
	    				</table>
	    			</div>
	    			<div class="span5" style="padding-right: 0; ">
	    				<table class="tableright">
	    					<tr>
	    						<td style="width: 130px; text-align: right;">Transaction Date:</td>
	    						<td style="text-align: center; color: #333; font-weight: 600;" data-bind="text: obj.issued_date"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">Transaction No:</td>
	    						<td style="text-align: center; color: #333; font-weight: 600; background: #d9d9d9;" data-bind="text: obj.number"></td>
	    					</tr>
	    					<tr>
	    						<td style="text-align: right;">Project Name:</td>
	    						<td style="text-align: center;" data-bind="text: proaccountLineDS.name"></td>
	    					</tr>
	    				</table>
	    			</div>
	    		</div>
    		</div>
    	</div>
    	<div class="content">
    		<div class="row">
    			<div class="span12" style="padding-bottom: 15px;">
    				<table class="tablecontent">
    					<thead>
	    					<tr>
	    						<th style="width: 240px; border: 1px solid #333; text-align: center; padding: 5px;" rowspan="2">DESCRIPTION</th>
	    						<th style="width: 50px; border: 1px solid #333; text-align: center; padding: 5px;" rowspan="2">REF</th>
	    						<th style="width: 109px; border: 1px solid #333; text-align: center; padding: 5px;" rowspan="2">DONOR</th>
	    						<th style="border: 1px solid #333; text-align: center; padding: 5px; background: #fbda6c; " colspan="3">ACCOUNTING ENTRY</th>
	    					</tr>
	    					<tr>
	    						<th style="border: 1px solid #333; padding: 5px; text-align: center; background: #fbda6c;">ACCOUNT</th>
	    						<th style="border: 1px solid #333; padding: 5px; text-align: center; background: #fbda6c;">DR</th>
	    						<th style="border: 1px solid #333; padding: 5px; text-align: center; background: #fbda6c;">CR</th>
	    					</tr>
	    				</thead>
	    				<tbody style="margin-top: 2px" id="formListView"
	        				data-role="listview"
							data-auto-bind="false"
							data-template="formCaritasExpense-journallineDS-template"
							data-bind="source: journalLineDS">
						</tbody>
	    				<tfoot>
	    					<tr>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: left;" colspan="2">PREPARED BY :</td>
	    						<td style="border: 1px solid #333; padding: 5px; font-weight: 800;">Total</td>
	    						<td style="border: 1px solid #333; padding: 5px; font-weight: 800;"></td>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: right; font-weight: 800;" data-bind="text: totalDR"></td>
	    						<td style="border: 1px solid #333; padding: 5px; text-align: right; font-weight: 800;" data-bind="text: totalCR"></td>
	    					</tr>
	    					<tr>
	    						<td colspan="6" style="border: 1px solid #333; padding: 5px;">VERIFIED BY :</td>

	    					</tr>
	    					<tr>
	    						<td colspan="2" style="border: 1px solid #333; padding: 5px;">APPROVED BY :</td>
	    						<td colspan="4" style="border: 1px solid #333; padding: 5px; ">In Words:</td>
	    					</tr>
	    					<tr>
	    						<td colspan="2" style="border: 1px solid #333; padding: 5px;">RECEIVED BY :</td>
	    						<td colspan="4" style="border: 1px solid #333; padding: 5px; "></td>
	    					</tr>
	    				</tfoot>
    				</table>
    			</div>
    		</div>
    	</div>
    	<div class="footer">
    	</div>
    </div>
</script>
<script id="formCaritasExpense-journallineDS-template" type="text/x-kendo-template">
	<tr>
		<td style="border: 1px solid \\#333; padding: 5px;" align="left">#: description#&nbsp;</td>
		<td style="border: 1px solid \\#333; padding: 5px;" align="center">#: banhji.invoiceForm.journalLineDS.data()[0].reference_no#</td>
		<td style="border: 1px solid \\#333; padding: 5px;" align="center">#= donor#</td>
		<td style="border: 1px solid \\#333; padding: 5px;background: \\#fbda6c;" align="center">#: account[0].number#</td>
		<td style="border: 1px solid \\#333; padding: 5px;background: \\#fbda6c;" align="right">#: dr==0?'':kendo.toString(dr, locale=='km-KH'?'c':'c2', locale)#</td>
		<td style="border: 1px solid \\#333; padding: 5px;background: \\#fbda6c;" align="right">#: cr==0?'':kendo.toString(cr, locale=='km-KH'?'c':'c2', locale)#</td>
	</tr>
</script>
<!-- KSLM -->
<script id="normalInvoiceKSLM" type="text/x-kendo-template">
	<div class="inv1">
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">កូដ<br />Code</th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
						data-auto-bind="false"
		                data-template="invoiceForm-lineDS-template-kslm"
		                data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="2" rowspan="4" style="text-align: left;padding-left: 10px;" data-bind="html: obj.note">
                        	</td>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm-lineDS-template-kslm" type="text/x-kendo-template">
	<tr>
		<td><i>#= item.number ? item.number : "" #</i>&nbsp;</td>
		<td class="lside">#= description ? description : "" #</td>
		<td>#= quantity#</td>
		<td class="rside" width="70">#if(price > 0){# #= kendo.toString(price, "c", locale) # #}#</td>
		<td class="rside">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="vatInvoiceKSLM" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 50%;float: left;">
            	<h2 ></h2>
                <h3 style="text-align:left;" data-bind="html: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                	<p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span></p>
                </div>
            </div>
           	<!-- <div style="float: right; width: 20%;">
           		<div id="invQR"></div>
           	</div> -->
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រអាករ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
                        	គំរោង Job : <span data-bind="text: contactDS.data()[0].job"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: contactDS.data()[0].vat_no"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number" style="width: 42%;">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<span style="font-weight:bold" data-bind="text: obj.number"></span>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>

        	<div class="clear inv2">
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">កូដ<br />Code</th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
						 data-auto-bind="false"
		                 data-template="invoiceForm-lineDS-template-kslm"
		                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td class="rside" data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td class="rside" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td class="rside" data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td class="rside" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td class="rside" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td class="rside" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="commercialInvoiceKSLM" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head" style="width: 90%">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company" style="margin-left: 20px;width: 50%;float: left;">
                <h3 style="text-align:left;" data-bind="html: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                    <p style="font-size: 10px;">ទូរស័ព្ទលេខ HP <span style="font-size: 12px;" data-bind="text: company.telephone"></span></p>
                    <p style="font-size: 10px;">អាស័យ​ដ្ឋាន Address: <span  data-bind="text: company.address"></span></p>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
                <div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span data-bind="text: contactDS.data()[0].name"></span><br>
                        	គំរោង Job : <span data-bind="text: contactDS.data()[0].job"></span><br>
		        			អាស័យ​ដ្ឋាន Address : <span data-bind="text: contactDS.data()[0].address"></span><br>
		        			លេខទូរស័ព្ទ Tel : <span data-bind="text: contactDS.data()[0].phone"></span>
		        			</p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: contactDS.data()[0].vat_no"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number" style="width: 42%;">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<span style="font-weight:bold" data-bind="text: obj.number"></span>-<span style="font-weight:bold" data-bind="text: company.id"></span>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th style="text-align: center;">កូដ<br />Code</th>
                            <th style="text-align: center;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th style="text-align: center;">បរិមាណ<br />Quantity</th>
                            <th style="text-align: center;">ថ្លៃឯកតា​<br />Unit Price</th>
                            <th style="text-align: center;">ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
						 data-auto-bind="false"
		                 data-template="invoiceForm-lineDS-template-kslm"
		                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប (បូក​បញ្ចូល​ទាំង​អាករ)​ Total (VAT included)</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6 style="padding-left: 35px;">សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<!--Invoice Line-->
<script id="invoiceCustom-txn-form-template" type="text/x-kendo-template">
	<a class="span4 #= type #" data-id="#= id #" data-bind="click: selectedForm" style="padding-right: 0; width: 32%;">
    	<img src="<?php echo base_url(); ?>assets/invoice/img/#= image_url #.jpg" alt="#: name # image" />
    </a>
</script>
<script id="invoiceForm-lineDS-template" type="text/x-kendo-template">
	<tr>
		<td><i>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</i>&nbsp;</td>
		<td class="lside">#= description ? description : "" #</td>
		<td>#= quantity#</td>
		<td class="rside" width="70">#if(price > 0){# #= kendo.toString(price, "c", locale) # #}#</td>
		<td class="rside">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template3" type="text/x-kendo-template">
	<tr>
		<td><i>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</i></td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td style="text-align: left; padding-left: 5px;"></td>
		<td>#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td>#= quantity#</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template4" type="text/x-kendo-template">
	<tr>
		<td><i>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</i></td>
		<td style="text-align: left; padding-left: 5px;"></td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td></td>
		<td></td>
		<td>#= quantity#</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template5" type="text/x-kendo-template">
	<tr>
		<td style="text-align: left; padding-left: 5px;">&nbsp;</td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td style="text-align: right; padding-right: 5px;"></td>
		<td style="text-align: right; padding-right: 5px;"></td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template6" type="text/x-kendo-template">
	<tr>
		<td class="center" style="color: \\#000">&nbsp;#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
		<td class="lside" style="color: \\#000">#= description ? description : "" #</td>
		<td style="color: \\#000">#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td style="color: \\#000">#= quantity#</td>
		<td class="rside" width="70" style="color: \\#000">#= kendo.toString(price, "c", locale) #</td>
		<td class="rside" style="background-color: \\#eee;color: \\#000">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template8" type="text/x-kendo-template">
	<tr>
		<td style="text-align: left; padding-left: 5px;color: \\#000;">&nbsp;#= description ? description : "" #</td>
		<td style="color: \\#000;">#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td style="color: \\#000;"">#= quantity#</td>
		<td class="rside" style="color: \\#000;">#= kendo.toString(price, "c", locale) #</td>
		<td class="rside" style="background-color: \\#eee;color: \\#000;">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template10" type="text/x-kendo-template">
	<tr>
		<td class="center" style="color:\\#000">&nbsp;#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
		<td class="lside" style="color:\\#000">#= description ? description : "" #</td>
		<td style="color:\\#000">#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td style="color:\\#000">#= quantity#</td>
		<td class="rside" width="70" style="color:\\#000">#= kendo.toString(price, "c", locale) #</td>
		<td class="rside" style="background-color: \\#eee;color: \\#000">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template12" type="text/x-kendo-template">
	<tr>
		<td class="lside" style="color:\\#000">#= description ? description : "" #</td>
		<td style="color:\\#000">#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td style="color:\\#000">#= quantity#</td>
		<td class="rside" width="70" style="color:\\#000">#= kendo.toString(price, "c", locale) #</td>
		<td class="rside" style="background-color: \\#eee;color:\\#000">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template14" type="text/x-kendo-template">
	<tr>
		<td>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
		<td style="text-align: left; padding-left: 5px;"></td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td>#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td>#= quantity#</td>
		<td style="text-align: right; padding-right: 5px;"></td>
	</tr>
</script>
<script id="payment-voucher-line-template" type="text/x-kendo-template">
	<tr>
		<td>#:banhji.invoiceForm.accountLineDS.indexOf(data)+1#</td>
		<td style="text-align: left; padding-left: 5px;">#: reference_no#</td>
		<td style="text-align: left; padding-left: 5px;">#: contact.name#</td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="payment-voucher-journal-line-template" type="text/x-kendo-template">
	<tr>
		<td>#: account.number#</td>
		<td style="text-align: left; padding-left: 5px;">#: account.name#</td>
		<td style="text-align: left; padding-left: 5px;"># if(dr > 0){# #: dr # #}#</td>
		<td># if(cr > 0){# #: cr# #}#</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template31" type="text/x-kendo-template">
	<tr>
		<td style="text-align: left; padding-left: 5px;">&nbsp;</td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td>#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td>#= quantity#</td>
		<!-- <td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td> -->
	</tr>
</script>
<script id="invoiceForm-lineDS-template33" type="text/x-kendo-template">
	<tr>
		<td style="text-align: left; padding-left: 5px;">&nbsp;#= description ? description : "" #</td>
		<td>#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td>#= quantity#</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td>
		<!-- <td style="text-align: right; padding-right: 5px;">#= kendo.toString(amount, "c", locale) #</td> -->
	</tr>
</script>
<script id="invoiceForm-lineDS-recievenot" type="text/x-kendo-template">
	<tr>
		<td class="center" style="color: \\#000">&nbsp;#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
		<td style="text-align: left; padding-left: 5px;">&nbsp;#= item.abbr ? item.abbr: ""##= item.number ? item.number: ""#</td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td>#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td>#= quantity#</td>
		<td></td>

		<!-- <td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td> -->
	</tr>
</script>
<!-- Rice Mill Form-->
<script id="recieptNoteRicemill" type="text/x-kendo-template">
	<div class="inv1 pcg">
        <div class="content clear">
        	<style>
				.inv2 table td {
					padding: 10px;
					font-size: 14px;
				}
				.inv1 th {
					font-size: 14px;
				}
				.inv1 * {
					font-size: 14px;
					line-height: 25px;
				}
				.inv1 td {
					font-size: 16px;
				}
				.inv1 .cover-signature .singature p {
					font-size: 14px;
					font-weight: normal;
				}
				.inv1 .ten * {
					font-size: 14px!important;
				}
			</style>
	    	<div class="head" style="width: 90%;">
	        	<div class="logo">
	            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
	            </div>
	            <div class="cover-name-company" style="margin-left: 20px;width: 72%;float: left;">
	            	<h2></h2>
	            	<h3 style="float: left;font-size: 20px;" data-bind="html: company.name"></h3>
	                <div class="vattin" style="float: left; width: 100%">
	                	<p style="float: left; width: 100%">
	                		<span style="float: left; margin-left:0;font-size: 14px; line-height: 20px;">លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VAT TIN) </span>
	                		<span style="float: left; margin-left:0;font-size:14px;line-height: 20px;" data-bind="text: company.vat_number"></span>
	                	</p>
	                </div>
	                <div class="clear" style="float: left;">
	                	<p style="float: left; text-align: left;">អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></p>
	                    <p style="float: left;width: 100%">ទូរស័ព្ទលេខ HP <span data-bind="text: company.telephone"></span> Email: <span data-bind="text: company.email"></span></p>
	                </div>
	            </div>
	        </div>
        	<div class="span12 clear mid-header">
        		<div class="span7" style="margin-right: 15px;">
        			<b style="font-size: 14px;line-height: 24px;">ព័ត៌មានអ្នកផ្គត់ផ្គង SUPPLIER INFO</b><br>
        			<p><span data-bind="text: obj.contact.name"></span><br>
        			<span data-bind="text: obj.contact.address"></span>
        			</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p class="form-title" style="font-size: 26px!important; text-transform: uppercase;margin-bottom: 10px;">ប័ណ្ណទទួលទំនិញ</p>
        			<p class="form-title" style="font-size: 26px!important; text-transform: uppercase;">RECIEVE NOTE</p>
        			<p><b>កាលបរិច្ឆេទ Date : </b><span data-bind="text: obj.issued_date"></span></p>
        			<p><b>លេខ No. : </b><span data-bind="text: obj.number"></span></p>
        		</div>
        	</div>
        	<table class="span12" rules="rows">
        		<thead>
        			<tr class="main-color ten">
        				<th style="width: 8%;text-align: center;">ល.រ<br />N<sup style="color: #fff!important;">o</sup></th>
        				<th width="90" style="text-align: center;">លេខកូដ<br>CODE</th>
        				<th class="lside" style="text-align: left;">ពិពណ៌នា<br>ITEM DESCRIPTION</th>
        				<th style="text-align: center;">ឯកតា<br>UM</th>
        				<th style="text-align: center;">ទម្ងន់ដុល<br>Gross W</th>
        				<th style="text-align: center;">ទម្ងន់ឡាន<br>Truck W</th>
        				<th style="text-align: center;">ទម្ងន់សំបក់បាវ<br>Bag W</th>
        				<th style="text-align: center;">ចំនួន<br>QTY</th>
        				<th class="rside" style="text-align: center;">កំណត់សំគាល់<br>REMARK</th>
        			</tr>
        		</thead>
        		<tbody style="margin-top: 2px" id="formListView"
        				data-role="listview"
						data-auto-bind="false"
						data-template="invoiceForm-lineDS-recievenot-ricemill"
						data-bind="source: lineDS">

        	</table>
        	<table class="span12 left-tbl ten" rules="rows" style="margin-top: 40px;">
        		<tr>
        			<td width="150">រៀបចំដោយ <br>PREPARED BY</td><td width="120"></td>
        			<td width="150">តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        		<tr>
        			<td>អនុម័តដោយ<br>APPROVED BY</td><td></td>
        			<td>តំណែង<br>POSITION</td><td width="80"></td>
        			<td>កាលបរិច្ឆេទ<br>DATE</td><td width="120"></td>
        		</tr>
        	</table>
        </div>
    </div>
</script>
<script id="invoiceForm-lineDS-recievenot-ricemill" type="text/x-kendo-template">
	<tr>
		<td class="center" style="color: \\#000">&nbsp;#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
		<td style="text-align: left; padding-left: 5px;">&nbsp;#= item.abbr ? item.abbr: ""##= item.number ? item.number: ""#</td>
		<td style="text-align: left; padding-left: 5px;">#= description ? description : "" #</td>
		<td>#= item_prices.measurement ? item_prices.measurement : "" #</td>
		<td>#= quantity#</td>
		<td></td>

		<!-- <td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td> -->
	</tr>
</script>