<script id="top-product-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <span>
                #if(name.length>15){#
                    #=name.substring(0, 10)#...
                #}else{#
                    #=name#
                #}#
            </span>
            <span class="pull-right">#:kendo.toString(kendo.parseInt(total), banhji.locale=="km-KH"?"c0":"c2", banhji.locale)#</span>
        </td>
    </tr>
</script>
<script id="top-contact-template" type="text/x-kendo-tmpl">
    <tr data-uid="#: uid #">
        <td>
            <span>
                #if(name){#
                    #if(name.length>15){#
                        #=name.substring(0, 10)#...
                    #}else{#
                        #=name#
                    #}#
                #}#
            </span>
            <span class="pull-right">#=kendo.toString(kendo.parseFloat(total), banhji.locale=="km-KH"?"c0":"c2", banhji.locale)#</span>
        </td>
    </tr>
</script>

<!-- Template Report-->
<script id="contact-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
    <span>#=name#</span>
</script>
<script id="customer-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer_setting">+ Add New Term</a>
    </strong>
</script>
<script id="segment-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="/c2/rrd\#/segment">+ Add New Segment</a>
    </strong>
</script>
<script id="segment-list-tmpl" type="text/x-kendo-tmpl">
    <span>#=code#</span> <span>#=name#</span>
</script>
<script id="job-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="/c2/rrd\#/job">+ Add New Job</a>
    </strong>
</script>
<script id="job-list-tmpl" type="text/x-kendo-tmpl">
    <span>
        #=number# #=name#
    </span>
</script>
<script id="employee-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="<?php echo base_url(); ?>admin\#employeelist">+ Add New Employee</a>
    </strong>
</script>
<script id="item-group-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/item_setting">+ Add New Group</a>
    </strong>
</script>
<script id="item-category-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/item_setting">+ Add New Category</a>
    </strong>
</script>
<script id="account-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="/c2/rrd\#/account">+ Add New Account</a>
    </strong>
</script>
<script id="account-list-tmpl" type="text/x-kendo-tmpl">
    <span>#=name#</span>
</script>
<script id="reference-list-tmpl" type="text/x-kendo-tmpl">
    <span>
        #=number# :
        #if(type=="GDN" || type=="GRN"){#
            #=kendo.toString(amount, "n")#
        #}else{#
            #=kendo.toString(amount - amount_paid, "c", locale)#
        #}#
    </span>
    <span class="pull-right">
        #if(type=="GDN" || type=="GRN" || type=="Quote" || type=="Sale_Order"){#
            #if(status==1){#
                Used
            #}else{#
                Open
            #}#
        #}else{#
            #if(status==1){#
                Paid
            #}else if(status==2){#
                Partially Paid
            #}else{#
                Open
            #}#
        #}#
    </span>
</script>
<!-- <script id="top-product-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <span>
                #if(name.length>15){#
                    #=name.substring(0, 15)#...
                #}else{#
                    #=name#
                #}#
            </span>
            <span class="pull-right">#:kendo.toString(kendo.parseInt(total), banhji.locale=="km-KH"?"c0":"c2", banhji.locale)#</span>
        </td>
    </tr>
</script> -->
<!-- <script id="top-contact-template" type="text/x-kendo-tmpl">
    <tr data-uid="#: uid #">
        <td>
            <span>
                #if(name){#
                    #if(name.length>15){#
                        #=name.substring(0, 15)#...
                    #}else{#
                        #=name#
                    #}#
                #}#
            </span>
            <span class="pull-right">#=kendo.toString(kendo.parseFloat(total), banhji.locale=="km-KH"?"c0":"c2", banhji.locale)#</span>
        </td>
    </tr>
</script> -->
<!-- <script id="contact-list-tmpl" type="text/x-kendo-tmpl">
    <span>#=abbr##=number#</span>
    <span>#=name#</span>
</script> -->
<script id="item-list-tmpl" type="text/x-kendo-tmpl">
    <div class="pull-left">
        #=abbr##=number# #=name#
        &nbsp;&nbsp;
        #if(variant.length>0){#
            [
            #for(var i=0; i < variant.length; i++){#
                #=variant[i].name#,
            #}#
            ]
        #}#
    </div>
    <div class="pull-right">
        #=category#
    </div>
</script>
<script id="customer-payment-method-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer_setting">+ Add New Payment Method</a>
    </strong>
</script>
<script id="customer-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer_setting">+ Add New Customer Type</a>
    </strong>
</script>
<script id="customer-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer">+ Add New Customer</a>
    </strong>
</script>
<script id="currency-list-tmpl" type="text/x-kendo-tmpl">
    <span>
        #=code# - #=country#
    </span>
</script>
<!-- End -->

<script id="account-type-list-tmpl" type="text/x-kendo-tmpl">
    <span>
        #=number#
    </span>
    -
    <span>#=name#</span>
</script>
<script id="accountingCenter-list-tmpl" type="text/x-kendo-tmpl">
    <tr data-bind="click: selectedRow">
        <td>
            <div class="media-body">
                #if(sub_of_id==0){#
                    <span >#=number#</span>
                    -
                    <span >#=name#</span>
                #}else{#
                    #if(banhji.accountingCenter.checkIsSub(sub_of_id)){#
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>#=number#</span>
                        -
                        <span >#=name#</span>
                    #}else{#
                        &nbsp;&nbsp;
                        <span>#=number#</span>
                        -
                        <span >#=name#</span>
                    #}#
                #}#
            </div>
        </td>
    </tr>
</script>
<script id="accountingCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>
        <td style="text-align: center; border-bottom: 1px solid \#1F4774;">#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
        <td style="text-align: center; border-bottom: 1px solid \#1F4774;">
            #if(dr==0 && cr==0){#
                #=type#
            #}else{#
                <a href="\#/#=type.toLowerCase()#/#=transaction_id#"><i></i> #=type#</a>
            #}#
        </td>
        <td style="text-align: center; border-bottom: 1px solid \#1F4774;">
            #if(dr==0 && cr==0){#
                #=number#
            #}else{#
                <a class="underline" href="\#/#=type.toLowerCase()#/#=transaction_id#"><i></i> #=number#</a>
            #}#
        </td>
        <td style="text-align: center; border-bottom: 1px solid \#1F4774;">#=description#</td>
        <td style="text-align: center; border-bottom: 1px solid \#1F4774; text-align: right;">
            #=kendo.toString(dr, locale=="km-KH"?"c0":"c", locale)#
        </td>
        <td style="text-align: center; border-bottom: 1px solid \#1F4774; text-align: right;">
            #=kendo.toString(cr, locale=="km-KH"?"c0":"c", locale)#
        </td>
        <td style="text-align: center; border-bottom: 1px solid \#1F4774; text-align: center;" >
            #if(type==="Commercial_Invoice" || type==="Vat_Invoice" || type==="Invoice"){#
                <a href="\#/invoice/#=id#"><i></i> Pay</a>
            #}#
        </td>
    </tr>
</script>


<script id="itemCenter-item-list-tmpl" type="text/x-kendo-tmpl">
    <tr data-bind="click: selectedRow">
        <td>
            <div class="media-body">
                <span >
                    #=abbr##=number# #=name#
                </span>

                <span>
                    #if(variant.length>0){#
                        [
                        #for(var i=0; i < variant.length; i++){#
                            #=variant[i].name#,
                        #}#
                        ]
                    #}#
                </span>
            </div>
        </td>
    </tr>
</script>
<script id="itemCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>
        <td>#=kendo.toString(new Date(transaction_issued_date), "dd-MM-yyyy")#</td>
        <td>#=transaction_type#</td>
        <td align="center">
            <a href="\#/#=transaction_type.toLowerCase()#/#=id#">#=transaction_number#</a>
        </td>
        <td align="center">#=kendo.toString(quantity * movement, "n0")#</td>
        <td align="right">
            #if(cost>0){#
                #=kendo.toString((cost+additional_cost)/rate, "c", locale)#
            #}#
        </td>
        <td align="right">
            #if(price>0){#
                #=kendo.toString(price/rate, "c", locale)#
            #}#
        </td>
    </tr>
</script>
<script id="contact-person-row-tmpl" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <input id="name" name="name"
                    type="text" class="k-textbox"
                    data-bind="value: name"
                    placeholder="eg: Mr. John"
                    required="required" validationMessage="required" style="width: 100%;" />
            <span data-for="name" class="k-invalid-msg"></span>
        </td>
        <td>
            <input type="text" class="k-textbox" data-bind="value: department" placeholder="eg: Accounting" style="width: 100%;" />
        </td>
        <td>
            <input type="text" class="k-textbox" data-bind="value: phone" placeholder="eg: 012 333 444" style="width: 100%;" />
        </td>
        <td>
            <input type="text" class="k-textbox" data-bind="value: email" placeholder="eg: john@email.com" style="width: 100%;" />
        </td>
        <td style="text-align: center;">
            <span class="glyphicons btn-danger delete" data-bind="click: deleteContactPerson"><i class="ti-close"></i></span>
        </td>
    </tr>
</script>
<script id="attachment-list-tmpl" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <input id="txtName-#:uid#" name="txtName-#:uid#"
                    type="text" class="k-textbox"
                    data-bind="value: name" />
        </td>
        <td>
            <input id="txtDescription-#:uid#" name="txtDescription-#:uid#"
                    type="text" class="k-textbox"
                    data-bind="value: description"
                    style="width: 100%; margin-bottom: 0;" />
        </td>
        <td>#=kendo.toString(created_at, "dd-MM-yyyy")#</td>
        <td style="text-align: center;">
            #if(id){#
                <a href="#=url#" target="_blank" class="btn-action glyphicons download btn-default"><i></i></a>
            #}#
            <span class="btn-action glyphicons btn-danger" data-bind="click: removeFile"><i class="ti-close"></i></span>
        </td>
    </tr>
</script>
<script id="item-brand-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/item_setting">+ Add New Brand</a>
    </strong>
</script>
<script id="item-measurement-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/item_setting">+ Add New Measurement</a>
    </strong>
</script>
<!-- End -->


<!-- Template-->
<!-- <script id="contact-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer">+ Add New Customer</a></li>
    </strong>
</script> -->
<!-- <script id="contact-list-tmpl" type="text/x-kendo-tmpl">
    <span>#=abbr##=number#</span>
    <span>#=name#</span>
</script> -->
<!-- <script id="customer-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer_setting">+ Add New Term</a>
    </strong>
</script> -->
<!-- <script id="segment-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/segment">+ Add New Segment</a>
    </strong>
</script> -->
<!-- <script id="segment-list-tmpl" type="text/x-kendo-tmpl">
    <span>#=code#</span> <span>#=name#</span>
</script> -->
<!-- <script id="job-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/job">+ Add New Job</a>
    </strong>
</script> -->
<!-- <script id="job-list-tmpl" type="text/x-kendo-tmpl">
    <span>
        #=number# #=name#
    </span>
</script> -->
<!-- <script id="employee-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="<?php echo base_url(); ?>admin\#employeelist">+ Add New Employee</a>
    </strong>
</script> -->
<!-- <script id="item-group-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/item_setting">+ Add New Group</a>
    </strong>
</script> -->
<!-- <script id="item-category-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/item_setting">+ Add New Category</a>
    </strong>
</script> -->
<!-- <script id="account-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/account">+ Add New Account</a>
    </strong>
</script> -->
<!-- <script id="account-list-tmpl" type="text/x-kendo-tmpl">
    <span>#=name#</span>
</script> -->
<!-- <script id="reference-list-tmpl" type="text/x-kendo-tmpl">
    <span>
        #=number# :
        #if(type=="GDN" || type=="GRN"){#
            #=kendo.toString(amount, "n")#
        #}else{#
            #=kendo.toString(amount - amount_paid, "c", locale)#
        #}#
    </span>
    <span class="pull-right">
        #if(type=="GDN" || type=="GRN" || type=="Quote" || type=="Sale_Order"){#
            #if(status==1){#
                Used
            #}else{#
                Open
            #}#
        #}else{#
            #if(status==1){#
                Paid
            #}else if(status==2){#
                Partially Paid
            #}else{#
                Open
            #}#
        #}#
    </span>
</script> -->
<!-- <script id="top-product-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <span>
                #if(name.length>15){#
                    #=name.substring(0, 15)#...
                #}else{#
                    #=name#
                #}#
            </span>
            <span class="pull-right">#:kendo.toString(kendo.parseInt(total), "n0")#</span>
        </td>
    </tr>
</script> -->
<!-- <script id="top-contact-template" type="text/x-kendo-tmpl">
    <tr data-uid="#: uid #">
        <td>
            <span>
                #if(name){#
                    #if(name.length>15){#
                        #=name.substring(0, 15)#...
                    #}else{#
                        #=name#
                    #}#
                #}#
            </span>
            <span class="pull-right">#=kendo.toString(kendo.parseFloat(total), banhji.locale=="km-KH"?"c0":"c2", banhji.locale)#</span>
        </td>
    </tr>
</script> -->
<!-- <script id="contact-list-tmpl" type="text/x-kendo-tmpl">
    <span>#=abbr##=number#</span>
    <span>#=name#</span>
</script> -->
<!-- <script id="item-list-tmpl" type="text/x-kendo-tmpl">
    <div class="pull-left">
        #=abbr##=number# #=name#
        &nbsp;&nbsp;
        #if(variant.length>0){#
            [
            #for(var i=0; i < variant.length; i++){#
                #=variant[i].name#,
            #}#
            ]
        #}#
    </div>
    <div class="pull-right">
        #=category#
    </div>
</script> -->
<!-- <script id="customer-payment-method-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer_setting">+ Add New Payment Method</a>
    </strong>
</script> -->
<!-- <script id="customer-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer_setting">+ Add New Customer Type</a>
    </strong>
</script> -->
<!-- <script id="customer-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/customer">+ Add New Customer</a>
    </strong>
</script> -->
<!-- <script id="currency-list-tmpl" type="text/x-kendo-tmpl">
    <span>
        #=code# - #=country#
    </span>
</script> -->
<!-- End -->

<script id="vendorCenter-vendor-list-tmpl" type="text/x-kendo-tmpl">
    <tr data-bind="click: selectedRow">
        <td>
            <div class="">
                <span>#=name#</span>
            </div>
        </td>
    </tr>
</script>
<script id="vendor-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/vendor_setting">+ Add New Supplier Type</a>
    </strong>
</script>
<script id="vendor-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/vendor">+ Add New Supplier</a>
    </strong>
</script>
<script id="vendor-payment-method-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/vendor_setting">+ Add New Payment Method</a>
    </strong>
</script>
<script id="vendor-payment-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="\#/vendor_setting">+ Add New Payment Term</a>
    </strong>
</script>
<script id="vendorCenter-note-tmpl" type="text/x-kendo-template">
    <tr>
        <td>
            <blockquote>
                <small class="author">
                    <span class="strong">#=creator#</span> :
                    <cite>#=kendo.toString(new Date(noted_date), "g")#</cite>
                </small>
                <p>#=note#</p>
            </blockquote>
        </td>
    </tr>
</script>
<script id="attachment-list-tmpl" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <input id="txtName-#:uid#" name="txtName-#:uid#"
                    type="text" class="k-textbox"
                    data-bind="value: name" />
        </td>
        <td>
            <input id="txtDescription-#:uid#" name="txtDescription-#:uid#"
                    type="text" class="k-textbox"
                    data-bind="value: description"
                    style="width: 100%; margin-bottom: 0;" />
        </td>
        <td>#=kendo.toString(created_at, "dd-MM-yyyy")#</td>
        <td>
            #if(id){#
                <a href="#=url#" target="_blank" class="btn-action glyphicons download btn-default"><i></i></a>
            #}#
            <span class="btn-action glyphicons remove_2 btn-danger" data-bind="click: removeFile"><i></i></span>
        </td>
    </tr>
</script>
<script id="vendorCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>
        <td style="border-bottom: 1px solid \#1F4774;">#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
        <td style="border-bottom: 1px solid \#1F4774;">#=type#</td>
        <td style="border-bottom: 1px solid \#1F4774;">
            #if(type=="Vendor_Deposit" && amount<0){#
                <a class="underline" data-bind="click: goReference">#=number#</a>
            #}else{#
                <a class="underline" href="\#/#=type.toLowerCase()#/#=id#">#=number#</a>
            #}#
        </td>
        <td style="border-bottom: 1px solid \#1F4774; text-align: right;">
            #if(type=="GRN"){#
                #=kendo.toString(amount, "n0")#
            #}else if(type=="Cash_Purchase" || type=="Credit_Purchase"){#
                #=kendo.toString(amount-deposit, locale=="km-KH"?"c0":"c", locale)#
            #}else{#
                #=kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
            #}#
        </td>
        <!-- Status -->
        <td style="border-bottom: 1px solid \#1F4774; text-align: center;">
            #if(status=="4") {#
                <span data-bind="text: lang.lang.draft"></span>
            #}#

            #if(type=="Credit_Purchase"){#
                #if(status=="0" || status=="2") {#
                    # var date = new Date(), dueDate = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
                    #if(dueDate < toDay) {#
                         <span data-bind="text: lang.lang.over_due"></span> #:Math.floor((toDay - dueDate)/(1000*60*60*24))#  <span data-bind="text: lang.lang.days"></span>
                    #} else {#
                        #:Math.floor((dueDate - toDay)/(1000*60*60*24))# <span data-bind="text: lang.lang.days_to_pay"></span> 
                    #}#
                #} else if(status=="1") {#
                     <span data-bind="text: lang.lang.paid"></span>
                #} else if(status=="3") {#
                     <span data-bind="text: lang.lang.return"></span>
                #}#
            #}else if(type=="Purchase_Order"){#
                #if(status=="0"){#
                     <span data-bind="text: lang.lang.open"></span>
                #}else if(status=="1"){#
                     <span data-bind="text: lang.lang.done"></span>
                #}#
            #}else if(type=="GRN"){#
                #if(status=="0"){#
                     <span data-bind="text: lang.lang.open"></span>
                #}else if(status=="1"){#
                     <span data-bind="text: lang.lang.received"></span>
                #}#
            #}#
        </td>
        <!-- Actions -->
        <td style="border-bottom: 1px solid \#1F4774; text-align: center;">
            #if(type=="Credit_Purchase"){#
                #if(status=="0" || status=="2") {#
                    <a class="k-button btn-info" data-bind="click: payBill"><i></i><span data-bind="text: lang.lang.pay_bill"></span></a>
                #}#
            #}#

            #if(status=="4") {#
                <a class="k-button btn-info"><i></i> <span data-bind="text: lang.lang.use"></span></a>
            #}#
        </td>
    </tr>
</script>
<script id="tax-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
        <a href="/c2/rrd\#/tax">+ Add New Tax</a>
    </strong>
</script>
<script id="vendor-contact-person-row-tmpl" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <input id="name" name="name"
                    type="text" class="k-textbox"
                    data-bind="value: name"
                    placeholder="eg: Mr. John"
                    required="required" validationMessage="required" style="width: 190px;" />
            <span data-for="name" class="k-invalid-msg"></span>
        </td>
        <td>
            <input type="text" class="k-textbox" data-bind="value: department" placeholder="eg: Accounting" style="width: 190px;" />
        </td>
        <td>
            <input type="text" class="k-textbox" data-bind="value: phone" placeholder="eg: 012 333 444" style="width: 190px;" />
        </td>
        <td>
            <input type="text" class="k-textbox" data-bind="value: email" placeholder="eg: john@email.com" style="width: 190px;" />
        </td>
        <td align="center">
            <span class="glyphicons no-js delete" data-bind="click: deleteContactPerson"><i></i></span>
        </td>
    </tr>
</script>