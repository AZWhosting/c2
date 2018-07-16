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