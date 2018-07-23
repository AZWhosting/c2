<script>
    //-----------------------------------------
    banhji.Index = kendo.observable({
        lang     : langVM,
    });
    banhji.tapMenu =  kendo.observable({
        lang                : langVM,
        goReports          : function(){
            banhji.router.navigate('/reports');
        },
        goTransactions      : function(){
            banhji.router.navigate('/');
        },
        goMenuCashs        : function(){
            banhji.router.navigate('/cash_center');
        },
    });
    banhji.transactions = kendo.observable({
        lang     : langVM,
        pageLoad            : function(){
        }
    });
    banhji.cashTransactionsMenu =  kendo.observable({
        lang                : langVM,
        goMenuCashReceipt      : function(e){
            banhji.router.navigate('/');
            $(".l-m-active").removeClass("l-m-active");
            $("#"+e.currentTarget.id).addClass("l-m-active");
        },
        goMenuCashPayment        : function(e){
            banhji.router.navigate('/cash_payment');
            $(".l-m-active").removeClass("l-m-active");
            $("#"+e.currentTarget.id).addClass("l-m-active");
        },
        goMenuCashWithdrawal : function(e){
            banhji.router.navigate('/cash_withdrawal');
            $(".l-m-active").removeClass("l-m-active");
            $("#"+e.currentTarget.id).addClass("l-m-active");
        },
        goMenuCashDeposit : function(e){
            banhji.router.navigate('/cash_deposit');
            $(".l-m-active").removeClass("l-m-active");
            $("#"+e.currentTarget.id).addClass("l-m-active");
        },
        goMenuCashTransfer : function(e){
            banhji.router.navigate('/cash_transfer');
            $(".l-m-active").removeClass("l-m-active");
            $("#"+e.currentTarget.id).addClass("l-m-active");
        },
        goMenuPaymentRefund : function(e){
            banhji.router.navigate('/payment_refund');
            $(".l-m-active").removeClass("l-m-active");
            $("#"+e.currentTarget.id).addClass("l-m-active");
        },
        goMenuCashRefund : function(e){
            banhji.router.navigate('/cash_refund');
            $(".l-m-active").removeClass("l-m-active");
            $("#"+e.currentTarget.id).addClass("l-m-active");
        },
        goMenuCustomerDeposit : function(e){
            banhji.router.navigate('/customer_deposit');
            $(".l-m-active").removeClass("l-m-active");
            $("#"+e.currentTarget.id).addClass("l-m-active");
        },
        goMenuVendorDeposit : function(e){
            banhji.router.navigate('/vendor_deposit');
            $(".l-m-active").removeClass("l-m-active");
            $("#"+e.currentTarget.id).addClass("l-m-active");
        },
        goMenuCashTransactionExpense : function(e){
            banhji.router.navigate('/cash_transaction_expense');
            $(".l-m-active").removeClass("l-m-active");
            $("#"+e.currentTarget.id).addClass("l-m-active");
        },
    });
    banhji.cashReceipt =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        txnDS               : dataStore(apiUrl + "transactions"),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{ field: "type", value: "Cash_Receipt" }
        }),
        segmentItemDS       : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        contactDS           : banhji.source.customerDS,
        accountDS           : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter:{ field:"account_type_id", value: 10 },
            sort: { field:"number", dir:"asc" }
        }),
        paymentTermDS       : banhji.source.paymentTermDS,
        paymentMethodDS     : banhji.source.paymentMethodDS,
        amtDueColor         : banhji.source.amtDueColor,
        showCheckNo         : false,
        showReceiptNo       : false,
        obj                 : null,
        isEdit              : false,
        saveClose           : false,
        savePrint           : false,
        searchText          : "",
        contact_id          : "",
        invoice_id          : 0,
        total               : 0,
        total_received      : 0,
        deleteVisible       : false,
        user_id             : banhji.source.user_id,
        pageLoad            : function(id){
            if(id){
                this.set("isEdit", true);
                this.loadObj(id);
            }else{
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                }
            }
        },
        loadInvoice         : function(id){
            this.set("invoice_id", id);
            this.search();
        },
        //Contact
        loadContact         : function(id){
            this.set("contact_id", id);
            this.search();
        },
        contactChanges      : function(){
            this.search();
        },
        getContactName      : function(id){
            var raw = banhji.source.customerDS.get(id);
            if(raw){
                return raw.name;
            }else{
                return "";
            }
        },
        //Payment Method
        issuedDateChanges   : function(){
            this.applyTerm();
            this.setRate();
        },
        applyTerm           : function(){
            var self = this, obj = this.get("obj"),
            today = new Date();

            $.each(this.dataSource.data(), function(index, value){
                var term = self.paymentTermDS.get(value.payment_term_id),
                termDate = new Date(value.reference[0].issued_date),
                discountPeriod = 0;

                if(term){
                    discountPeriod = kendo.parseInt(term.discount_period);
                }

                termDate.setDate(termDate.getDate() + discountPeriod);

                if(today<=termDate){
                    if(value.reference[0].amount_paid==0){
                        var amount = value.reference[0].amount * term.discount_percentage;
                        value.set("discount", amount);
                        value.set("amount", value.reference[0].amount - amount);
                    }
                }
            });
        },
        //Currency Rate
        setRate             : function(){
            var obj = this.get("obj");

            $.each(this.dataSource.data(), function(index, value){
                var rate = banhji.source.getRate(value.locale, new Date(obj.issued_date));

                value.set("rate", rate);
            });

            this.changes();
        },
        //Segments
        segmentChanges      : function(e) {
            var dataArr = this.get("obj").segments,
            lastIndex = dataArr.length - 1,
            last = this.segmentItemDS.get(dataArr[lastIndex]);

            if(dataArr.length > 1) {
                for(var i = 0; i < dataArr.length - 1; i++) {
                    var current_index = dataArr[i],
                    current = this.segmentItemDS.get(current_index);

                    if(current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        //Search
        search              : function(){
            var self = this,
                para = [],
                obj = this.get("obj"),
                searchText = this.get("searchText"),
                invoice_id = this.get("invoice_id"),
                contact_id = this.get("contact_id");

            if(contact_id>0){
                para.push({ field:"contact_id", value: contact_id });
            }

            if(invoice_id>0){
                para.push({ field:"id", value: invoice_id });
            }

            if(searchText!==""){
                para.push({ field:"number", value: searchText });
            }

            if(para.length>0){
                para.push({ field:"type", operator:"where_in", value:["Commercial_Invoice", "Vat_Invoice", "Invoice"] });
                para.push({ field:"status", operator:"where_in", value:[0,2] });

                if(this.dataSource.total()>0){
                    var idList = [];
                    $.each(this.dataSource.data(), function(index, value){
                        idList.push(value.reference_id);
                    });
                    para.push({ field:"id", operator:"where_not_in", value:idList });
                }

                this.txnDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 100
                }).then(function(){
                    var view = self.txnDS.view();

                    if(view.length>0){
                        $.each(view, function(index, value){
                            var amount_due = value.amount - (value.amount_paid + value.deposit);

                            self.dataSource.add({
                                transaction_template_id : 0,
                                contact_id          : value.contact_id,
                                account_id          : obj.account_id,
                                payment_term_id     : value.payment_term_id,
                                payment_method_id   : obj.payment_method_id,
                                reference_id        : value.id,
                                user_id             : self.get("user_id"),
                                check_no            : value.check_no,
                                reference_no        : value.number,
                                number              : "",
                                type                : "Cash_Receipt",
                                sub_total           : amount_due,
                                amount              : amount_due,
                                discount            : 0,
                                discount_percentage : 0,
                                rate                : value.rate,
                                movement            : -1,
                                locale              : value.locale,
                                issued_date         : obj.issued_date,
                                memo                : obj.memo,
                                memo2               : obj.memo2,
                                status              : 0,
                                segments            : obj.segments,
                                is_journal          : 1,
                                //Recurring
                                recurring_name      : "",
                                start_date          : new Date(),
                                frequency           : "Daily",
                                month_option        : "Day",
                                interval            : 1,
                                day                 : 1,
                                week                : 0,
                                month               : 0,
                                is_recurring        : 0,
                                reference           : [value],
                                contact             : value.contact
                            });
                        });
                        self.applyTerm();
                        self.setRate();
                    }

                    self.set("searchText", "");
                    self.set("contact_id", "");
                    self.set("invoice_id", 0);
                });
            }
        },
        //Obj
        loadObj             : function(id){
            var self = this;

            this.dataSource.query({
                filter: { field:"id", value: id },
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.dataSource.view();

                self.set("obj", view[0]);
                self.set("total", kendo.toString(view[0].amount, "c", view[0].locale));
                self.set("total_received", kendo.toString(view[0].amount, "c", view[0].locale));

                self.journalLineDS.filter({ field: "transaction_id", value: id });
            });
        },
        changes             : function(){
            var self = this, obj = this.get("obj"),
            total = 0, sub_total = 0, discount = 0, total_received = 0, remaining = 0;

            $.each(this.dataSource.data(), function(index, value) {
                var amt = kendo.parseFloat(value.sub_total) - kendo.parseFloat(value.discount);
                if(kendo.parseFloat(value.amount)>amt){
                    value.set("amount", amt);
                }

                sub_total += kendo.parseFloat(value.sub_total) / value.rate;
                discount += kendo.parseFloat(value.discount) / value.rate;
                total_received += kendo.parseFloat(value.amount) / value.rate;
            });

            total = sub_total - discount;
            remaining = total - total_received;

            obj.set("sub_total", sub_total);
            obj.set("discount", discount);
            this.set("total", kendo.toString(total, "c2", banhji.locale));
            this.set("total_received", kendo.toString(total_received, "c2", banhji.locale));
            obj.set("remaining", remaining);
        },
        removeRow           : function(e){
            this.dataSource.remove(e.data);
            this.changes();
        },
        dataSourceChanges   : function(arg){
            var self = banhji.cashReceipt;

            if(arg.field){
                if(arg.field=="amount" || arg.field=="discount"){
                    self.changes();
                }else if(arg.field=="discount_percentage"){
                    var dataRow = arg.items[0],
                        percentageAmount = dataRow.sub_total * dataRow.discount_percentage;

                    dataRow.set("discount", percentageAmount);
                }
            }
        },
        addEmpty            : function(){
            this.clear();

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);
            this.set("total_received", 0);

            this.set("obj", {
                transaction_template_id: 6,
                account_id          : 7,
                payment_method_id   : 1,
                rate                : 1,
                sub_total           : 0,
                discount            : 0,
                remaining           : 0,
                locale              : banhji.locale,
                issued_date         : new Date(),
                memo                : "",
                memo2               : "",
                segments            : []
            });

            this.dataSource.data([]);
            this.txnDS.data([]);
            this.journalLineDS.data([]);
        },
        objSync             : function(){
            var dfd = $.Deferred();

            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.response){
                    dfd.resolve(e.response.results);
                }
            });
            this.dataSource.bind("error", function(e){
                dfd.reject(e.errorThrown);
            });

            return dfd;
        },
        save                : function(){
            var self = this, obj = this.get("obj");

            //Edit Mode
            if(this.get("isEdit")){
                obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

                //Delete Previouse Journal
                $.each(this.journalLineDS.data(), function(index, value){
                    value.set("deleted", 1);
                });
            }else{
                //Add brand new transaction
                $.each(this.dataSource.data(), function(index, value){
                    value.set("transaction_template_id", obj.transaction_template_id);
                    value.set("account_id", obj.account_id);
                    value.set("payment_method_id", obj.payment_method_id);
                    value.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
                    value.set("memo", obj.memo);
                    value.set("memo2", obj.memo2);
                    value.set("segments", obj.segments);
                });
            }

            //Obj
            this.objSync()
            .then(function(data){
                var ids = [];
                //Save journals
                $.each(data, function(index, value){
                    var contact = value.contact;
                    ids.push(value.reference_id);

                    //Cash on Dr
                    self.journalLineDS.add({
                        transaction_id      : value.id,
                        account_id          : obj.account_id,
                        contact_id          : value.contact_id,
                        description         : "",
                        reference_no        : "",
                        segments            : obj.segments,
                        dr                  : value.amount,
                        cr                  : 0,
                        rate                : value.rate,
                        locale              : value.locale
                    });

                    if(value.discount>0){
                        //Discount on Dr
                        self.journalLineDS.add({
                            transaction_id      : value.id,
                            account_id          : contact.settlement_discount_id,
                            contact_id          : value.contact_id,
                            description         : "",
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : value.discount,
                            cr                  : 0,
                            rate                : value.rate,
                            locale              : value.locale
                        });
                    }

                    //AR on Cr
                    self.journalLineDS.add({
                        transaction_id      : value.id,
                        account_id          : contact.account_id,
                        contact_id          : value.contact_id,
                        description         : "",
                        reference_no        : "",
                        segments            : obj.segments,
                        dr                  : 0,
                        cr                  : kendo.parseFloat(value.amount) + kendo.parseFloat(value.discount),
                        rate                : value.rate,
                        locale              : value.locale
                    });
                });

                self.journalLineDS.sync();
                self.updateTxnStatus(ids);

                return data;
            }, function(reason) { //Error
                $("#ntf1").data("kendoNotification").error(reason);
            }).then(function(result){
                $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);
                
                if(self.get("saveClose")){
                    //Save Close
                    banhji.router.navigate("/");
                    self.set("saveClose", false);
                    self.addEmpty();
                    // self.clear();
                    
                }else if(self.get("savePrint")){
                    //Save Print
                    self.set("savePrint", false);
                    self.addEmpty();
                    // self.clear();
                    
                    if(result[0].transaction_template_id>0){
                        banhji.router.navigate("/invoice_form/"+result[0].id);
                    }
                }else{
                    //Save New
                    self.addEmpty();
                }
            });
        },
        clear               : function(){
            this.dataSource.cancelChanges();
            this.txnDS.cancelChanges();
            this.journalLineDS.cancelChanges();

            this.dataSource.data([]);
            this.txnDS.data([]);
            this.journalLineDS.data([]);
        },
        cancel              : function(){
            this.dataSource.cancelChanges();
            this.dataSource.data([]);

            banhji.userManagement.removeMultiTask("cash_receipt");
        },
        updateTxnStatus     : function(ids){
            var self = this;

            if(ids.length>0){
                this.txnDS.query({
                    filter:{ field:"id", operator:"where_in", value:ids }
                }).then(function(){
                    var view = self.txnDS.view();

                    $.each(view, function(index, value){
                        var total = kendo.parseFloat(value.amount) - kendo.parseFloat(value.deposit);

                        if(value.amount_paid == 0){
                            value.set("status", 0);
                        }else if(value.amount_paid >= total){
                            value.set("status", 1);
                        }else{
                            value.set("status", 2);
                        }
                    });

                    self.txnDS.sync();
                });
            }
        }
    });
    banhji.cashPayment =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        txnDS               : dataStore(apiUrl + "transactions"),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{ field: "type", value: "Cash_Payment" }
        }),
        segmentItemDS       : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        contactDS           : banhji.source.supplierDS,
        accountDS           : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter:{ field:"account_type_id", value: 10 },
            sort: { field:"number", dir:"asc" }
        }),
        paymentTermDS       : banhji.source.paymentTermDS,
        paymentMethodDS     : banhji.source.paymentMethodDS,
        amtDueColor         : banhji.source.amtDueColor,
        showCheckNo         : false,
        showReceiptNo       : false,
        obj                 : null,
        isEdit              : false,
        saveClose           : false,
        savePrint           : false,
        searchText          : "",
        contact_id          : "",
        invoice_id          : 0,
        total               : 0,
        total_received      : 0,
        original_total      : 0,
        deleteVisible       : false,
        user_id             : banhji.source.user_id,
        pageLoad            : function(id){
            if(id){
                this.set("isEdit", true);
                this.loadObj(id);
            }else{
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                }
            }
        },
        //Contact
        loadContact         : function(id){
            this.set("contact_id", id);
            this.search();
        },
        contactChanges      : function(){
            this.search();
        },
        getContactName      : function(id){
            var raw = banhji.source.customerDS.get(id);
            if(raw){
                return raw.name;
            }else{
                return "";
            }
        },
        //Payment Term
        issuedDateChanges   : function(){
            this.applyTerm();
            this.setRate();
        },
        applyTerm           : function(){
            var self = this, obj = this.get("obj"),
            today = new Date();

            $.each(this.dataSource.data(), function(index, value){
                var term = self.paymentTermDS.get(value.payment_term_id),
                termDate = new Date(value.reference[0].issued_date),
                discountPeriod = 0;

                if(term){
                    discountPeriod = kendo.parseInt(term.discount_period);
                }

                termDate.setDate(termDate.getDate() + discountPeriod);

                if(today<=termDate){
                    if(value.reference[0].amount_paid==0){
                        var amount = value.reference[0].amount * term.discount_percentage;
                        value.set("discount", amount);
                        value.set("amount", value.reference[0].amount - amount);
                    }
                }
            });
        },
        //Currency Rate
        setRate             : function(){
            var obj = this.get("obj");

            $.each(this.dataSource.data(), function(index, value){
                var rate = banhji.source.getRate(value.locale, new Date(obj.issued_date));

                value.set("rate", rate);
            });

            this.changes();
        },
        //Search
        search              : function(){
            var self = this,
            para = [],
            obj = this.get("obj"),
            searchText = this.get("searchText"),
            invoice_id = this.get("invoice_id"),
            contact_id = this.get("contact_id");

            if(contact_id>0){
                para.push({ field:"contact_id", value: contact_id });
            }

            if(invoice_id>0){
                para.push({ field:"id", value: invoice_id });
            }

            if(searchText!==""){
                para.push({ field:"number", value: searchText });
            }

            if(para.length>0){
                para.push({ field:"type", value:"Credit_Purchase" });
                para.push({ field:"status", operator:"where_in", value:[0,2] });

                if(this.dataSource.total()>0){
                    var idList = [];
                    $.each(this.dataSource.data(), function(index, value){
                        idList.push(value.reference_id);
                    });
                    para.push({ field:"id", operator:"where_not_in", value:idList });
                }

                this.txnDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 100
                }).then(function(){
                    var view = self.txnDS.view();

                    if(view.length>0){
                        $.each(view, function(index, value){
                            var amount_due = value.amount - (value.amount_paid + value.deposit);

                            self.dataSource.add({
                                transaction_template_id : 0,
                                contact_id          : value.contact_id,
                                account_id          : obj.account_id,
                                payment_term_id     : value.payment_term_id,
                                payment_method_id   : obj.payment_method_id,
                                reference_id        : value.id,
                                user_id             : self.get("user_id"),
                                check_no            : value.check_no,
                                reference_no        : value.number,
                                type                : "Cash_Payment",
                                sub_total           : amount_due,
                                amount              : amount_due,
                                discount            : 0,
                                rate                : value.rate,
                                movement            : -1,
                                locale              : value.locale,
                                issued_date         : obj.issued_date,
                                memo                : obj.memo,
                                memo2               : obj.memo2,
                                status              : 0,
                                segments            : obj.segments,
                                is_journal          : 1,
                                //Recurring
                                recurring_name      : "",
                                start_date          : new Date(),
                                frequency           : "Daily",
                                month_option        : "Day",
                                interval            : 1,
                                day                 : 1,
                                week                : 0,
                                month               : 0,
                                is_recurring        : 0,

                                reference           : [value],
                                contact             : value.contact
                            });
                        });
                        self.applyTerm();
                        self.setRate();
                    }

                    self.set("searchText", "");
                    self.set("contact_id", "");
                    self.set("invoice_id", 0);
                });
            }
        },
        segmentChanges      : function(e) {
            var dataArr = this.get("obj").segments,
            lastIndex = dataArr.length - 1,
            last = this.segmentItemDS.get(dataArr[lastIndex]);

            if(dataArr.length > 1) {
                for(var i = 0; i < dataArr.length - 1; i++) {
                    var current_index = dataArr[i],
                    current = this.segmentItemDS.get(current_index);

                    if(current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        //Obj
        loadObj             : function(id){
            var self = this;

            this.dataSource.query({
                filter: { field:"id", value: id },
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.dataSource.view();

                self.set("obj", view[0]);
                self.set("total", kendo.toString(view[0].amount, "c", view[0].locale));
                self.set("total_received", kendo.toString(view[0].amount, "c", view[0].locale));

                self.journalLineDS.filter({ field: "transaction_id", value: id });
            });
        },
        loadInvoice         : function(id){
            this.set("invoice_id", id);
            this.search();
        },
        dataSourceChanges   : function(arg){
            var self = banhji.cashPayment;

            if(arg.field){
                if(arg.field=="amount" || arg.field=="discount"){
                    self.changes();
                }else if(arg.field=="discount_percentage"){
                    var dataRow = arg.items[0],
                        percentageAmount = dataRow.sub_total * dataRow.discount_percentage;

                    dataRow.set("discount", percentageAmount);
                }
            }
        },
        changes             : function(){
            var self = this, obj = this.get("obj"),
            total = 0, sub_total = 0, discount = 0, total_received = 0, remaining = 0;

            $.each(this.dataSource.data(), function(index, value) {
                var amt = kendo.parseFloat(value.sub_total) - kendo.parseFloat(value.discount);
                if(kendo.parseFloat(value.amount)>amt){
                    value.set("amount", amt);
                }

                sub_total += kendo.parseFloat(value.sub_total) / value.rate;
                discount += kendo.parseFloat(value.discount) / value.rate;
                total_received += kendo.parseFloat(value.amount) / value.rate;
            });

            total = sub_total - discount;
            remaining = total - total_received;

            obj.set("sub_total", sub_total);
            obj.set("discount", discount);
            this.set("total", kendo.toString(total, "c2", banhji.locale));
            this.set("total_received", kendo.toString(total_received, "c2", banhji.locale));
            obj.set("remaining", remaining);
        },
        removeRow           : function(e){
            var data = e.data;
            this.dataSource.remove(data);
            this.changes();
        },
        addEmpty            : function(){
            this.dataSource.data([]);
            this.txnDS.data([]);
            this.journalLineDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);
            this.set("total_received", 0);

            this.set("obj", {
                transaction_template_id : 12,
                account_id          : 7,
                payment_method_id   : 1,
                rate                : 1,
                sub_total           : 0,
                discount            : 0,
                remaining           : 0,
                locale              : banhji.locale,
                issued_date         : new Date(),
                memo                : "",
                memo2               : "",
                segments            : []
            });
        },
        objSync             : function(){
            var dfd = $.Deferred();

            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.response){
                    dfd.resolve(e.response.results);
                }
            });
            this.dataSource.bind("error", function(e){
                dfd.reject(e.errorThrown);
            });

            return dfd;
        },
        save                : function(){
            var self = this, obj = this.get("obj");

            if(this.get("isEdit")){
                obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

                //Delete Previouse Journal
                $.each(this.journalLineDS.data(), function(index, value){
                    value.set("deleted", 1);
                });
            }else{
                //Add brand new transaction
                $.each(this.dataSource.data(), function(index, value){
                    value.set("transaction_template_id", obj.transaction_template_id);
                    value.set("account_id", obj.account_id);
                    value.set("payment_method_id", obj.payment_method_id);
                    value.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
                    value.set("memo", obj.memo);
                    value.set("memo2", obj.memo2);
                    value.set("segments", obj.segments);
                });
            }

            this.objSync()
            .then(function(data){
                var ids = [];
                //Save journals
                $.each(data, function(index, value){
                    var contact = value.contact,
                    ref = self.dataSource.at(index);
                    ids.push(value.reference_id);

                    //AP on Dr
                    self.journalLineDS.add({
                        transaction_id      : value.id,
                        account_id          : ref.reference[0].account_id,
                        contact_id          : value.contact_id,
                        description         : "",
                        reference_no        : "",
                        segments            : obj.segments,
                        dr                  : kendo.parseFloat(value.amount) + kendo.parseFloat(value.discount),
                        cr                  : 0,
                        rate                : value.rate,
                        locale              : value.locale
                    });

                    //Cash on Cr
                    self.journalLineDS.add({
                        transaction_id      : value.id,
                        account_id          : obj.account_id,
                        contact_id          : value.contact_id,
                        description         : "",
                        reference_no        : "",
                        segments            : obj.segments,
                        dr                  : 0,
                        cr                  : value.amount,
                        rate                : value.rate,
                        locale              : value.locale
                    });

                    if(value.discount>0){
                        //Discount on Cr
                        self.journalLineDS.add({
                            transaction_id      : value.id,
                            account_id          : contact.settlement_discount_id,
                            contact_id          : value.contact_id,
                            description         : "",
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : 0,
                            cr                  : value.discount,
                            rate                : value.rate,
                            locale              : value.locale
                        });
                    }
                });

                self.journalLineDS.sync();
                self.updateTxnStatus(ids);

                return data;
            }, function(reason) { //Error
                $("#ntf1").data("kendoNotification").error(reason);
            }).then(function(result){
                $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

                if(self.get("saveClose")){
                    //Save Close
                    self.set("saveClose", false);
                    self.cancel();
                    window.history.back();
                }else if(self.get("savePrint")){
                    //Save Print
                    self.set("savePrint", false);
                    self.cancel();
                    if(result[0].transaction_template_id>0){
                        banhji.router.navigate("/invoice_form/"+result[0].id);
                    }
                }else{
                    //Save New
                    self.addEmpty();
                }
            });
        },
        cancel              : function(){
            this.dataSource.cancelChanges();

            banhji.userManagement.removeMultiTask("cash_payment");
        },
        updateTxnStatus     : function(ids){
            var self = this;

            if(ids.length>0){
                this.txnDS.query({
                    filter:{ field:"id", operator:"where_in", value:ids }
                }).then(function(){
                    var view = self.txnDS.view();

                    $.each(view, function(index, value){
                        if(value.amount_paid == 0){
                            value.set("status", 0);
                        }else if(value.amount_paid >= value.amount){
                            value.set("status", 1);
                        }else{
                            value.set("status", 2);
                        }
                    });

                    self.txnDS.sync();
                });
            }
        }
    });
    banhji.paymentRefund =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        referenceDS         : dataStore(apiUrl + "transactions"),
        returnDS            : dataStore(apiUrl + "transactions"),
        txnDS               : dataStore(apiUrl + "transactions"),
        numberDS            : dataStore(apiUrl + "transactions/number"),
        lineDS              : dataStore(apiUrl + "item_lines"),
        assemblyLineDS      : dataStore(apiUrl + "item_lines"),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        assemblyDS          : dataStore(apiUrl + "item_prices"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        jobDS               : new kendo.data.DataSource({
            data: banhji.source.jobList,
            sort: { field: "name", dir: "asc" }
        }),
        segmentItemDS       : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        taxItemDS           : new kendo.data.DataSource({
            data: banhji.source.taxList,
            filter:{
                logic: "or",
                filters: [
                    { field: "tax_type_id", value: 1 },//Supplier Tax
                    { field: "tax_type_id", value: 2 },
                    { field: "tax_type_id", value: 3 },
                    { field: "tax_type_id", value: 9 }
                ]
            },
            sort: [
                { field: "tax_type_id", dir: "asc" },
                { field: "name", dir: "asc" }
            ]
        }),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{ field: "type", value: "Payment_Refund" }
        }),
        itemDS              : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "items",
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
            schema  : {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter:{ field: "item_type_id <>", value: 3 },
            sort:[
                { field:"item_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
            ],
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        accountDS           : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter:{ field:"account_type_id", value: 10 },
            sort: { field:"number", dir:"asc" }
        }),
        contactDS           : banhji.source.supplierDS,
        amtDueColor         : banhji.source.amtDueColor,
        obj                 : null,
        isEdit              : false,
        saveClose           : false,
        savePrint           : false,
        notDuplicateNumber  : true,
        total               : 0,
        total_deposit       : 0,
        user_id             : banhji.source.user_id,
        pageLoad            : function(id){
            if(id){
                this.set("isEdit", true);
                this.loadObj(id);
            }else{
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                }
            }
        },
        //Upload
        onSelect            : function(e){
            // Array with information about the uploaded files
            var self = this,
            files = e.files,
            obj = this.get("obj");

            // Check the extension of each file and abort the upload if it is not .jpg
            $.each(files, function(index, value){
                if (value.extension.toLowerCase() === ".jpg"
                    || value.extension.toLowerCase() === ".jpeg"
                    || value.extension.toLowerCase() === ".tiff"
                    || value.extension.toLowerCase() === ".png"
                    || value.extension.toLowerCase() === ".gif"
                    || value.extension.toLowerCase() === ".pdf"){

                    var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

                    self.attachmentDS.add({
                        user_id         : self.get("user_id"),
                        transaction_id  : obj.id,
                        type            : "Transaction",
                        name            : value.name,
                        description     : "",
                        key             : key,
                        url             : banhji.s3 + key,
                        size            : value.size,
                        created_at      : new Date(),

                        file            : value.rawFile
                    });
                }else{
                    alert("This type of file is not allowed to attach.");
                }
            });
        },
        onRemove            : function(e){
            // Array with information about the uploaded files
            var self = this, files = e.files;
            $.each(this.attachmentDS.data(), function(index, value){
                if(value.name==files[0].name){
                    self.attachmentDS.remove(value);

                    return false;
                }
            });
        },
        removeFile          : function(e){
            var data = e.data;

            if (confirm("Are you sure, you want to delete it?")) {
                this.attachmentDS.remove(data);
            }
        },
        uploadFile          : function(){
            var self = this;

            $.each(this.attachmentDS.data(), function(index, value){
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

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e){
                if(e.type=="destroy"){
                    if(saved==false){
                        saved = true;

                        var response = e.response.results;
                        $.each(response, function(index, value){
                            var paramz = {
                                //Bucket: 'STRING_VALUE', /* required */
                                Delete: { /* required */
                                    Objects: [ /* required */
                                        {
                                            Key: value.data.key /* required */
                                        }
                                      /* more items */
                                    ]
                                }
                            };
                            bucket.deleteObjects(paramz, function(err, data) {
                                //console.log(err, data);
                            });
                        });
                    }
                }
            });

            //Clear upload files
            $(".k-upload-files").remove();
        },
        //Deposit
        loadDeposit         : function(){
            var self = this, obj = this.get("obj");

            if(obj.contact_id>0){
                this.txnDS.query({
                    filter:[
                        { field:"amount", operator:"select_sum", value:"amount" },
                        { field:"contact_id", value: obj.contact_id },
                        { field:"type", value: "Vendor_Deposit" }
                    ]
                }).then(function(){
                    var view = self.txnDS.view();

                    self.set("total_deposit", view[0].amount + obj.deposit);
                });
            }
        },
        //Contact
        setContact          : function(contact){
            var obj = this.get("obj");

            obj.set("contact", contact);
            this.contactChanges();
        },
        contactChanges      : function(){
            var self = this, obj = this.get("obj");

            if(obj.contact){
                var contact = obj.contact;

                obj.set("contact_id", contact.id);
                obj.set("locale", contact.locale);
                obj.set("bill_to", contact.bill_to);
                obj.set("ship_to", contact.ship_to);

                this.setRate();
                this.loadDeposit();
                this.loadReference();
            }

            this.changes();
        },
        //Currency Rate
        setRate             : function(){
            var obj = this.get("obj"),
            rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

            obj.set("rate", rate);

            $.each(this.lineDS.data(), function(index, value){
                var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));

                value.set("rate", itemRate);
            });
        },
        //Segment
        segmentChanges      : function(e) {
            var dataArr = this.get("obj").segments,
            lastIndex = dataArr.length - 1,
            last = this.segmentItemDS.get(dataArr[lastIndex]);

            if(dataArr.length > 1) {
                for(var i = 0; i < dataArr.length - 1; i++) {
                    var current_index = dataArr[i],
                    current = this.segmentItemDS.get(current_index);

                    if(current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        //Item
        itemChanges         : function(e){
            var self = this, data = e.data, obj = this.get("obj");

            if(data.item_id>0){
                var item = this.itemDS.get(data.item_id);

                if(item.is_catalog=="1"){
                    this.lineDS.remove(data);

                    $.each(item.catalogs, function(ind, val){
                        var catalogItem = self.itemDS.get(val);

                        if(catalogItem){
                            var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date)),
                                itemPrices = banhji.source.getPriceList(catalogItem.id);

                            self.lineDS.add({
                                transaction_id      : obj.id,
                                tax_item_id         : 0,
                                item_id             : catalogItem.id,
                                measurement_id      : itemPrices.length>0 ? itemPrices[0].measurement_id : catalogItem.measurement_id,
                                description         : catalogItem.purchase_description,
                                quantity            : 1,
                                conversion_ratio    : itemPrices.length>0 ? itemPrices[0].conversion_ratio : 1,
                                cost                : catalogItem.cost * rate,
                                amount              : 0,
                                discount            : 0,
                                rate                : rate,
                                locale              : catalogItem.locale,
                                movement            : -1,

                                item_prices         : itemPrices
                            });
                        }
                    });

                    this.changes();
                }else{
                    var rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date)),
                        itemPrices = banhji.source.getPriceList(data.item_id);

                    data.set("item_prices", itemPrices);
                    data.set("measurement_id", itemPrices.length>0 ? itemPrices[0].measurement_id : item.measurement_id);
                    data.set("description", item.purchase_description);
                    data.set("quantity", 1);
                    data.set("conversion_ratio", itemPrices.length>0 ? itemPrices[0].conversion_ratio : 1);
                    data.set("cost", item.cost * rate);
                    data.set("rate", rate);
                    data.set("locale", item.locale);

                    this.changes();
                }
            }else{
                data.set("item_id", "");
            }
        },
        measurementChanges  : function(e){
            var data = e.data, obj = this.get("obj");

            if(data.measurement_id>0){
                $.each(data.item_prices, function(index, value){
                    if(value.measurement_id==data.measurement_id){

                        data.set("conversion_ratio", value.conversion_ratio);

                        return false;
                    }
                });

                this.changes();
            }
        },
        //Number
        checkExistingNumber : function(){
            var self = this, para = [],
            obj = this.get("obj");

            if(obj.number!==""){

                if(obj.isNew()==false){
                    para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
                }

                para.push({ field:"number", value: obj.number });
                para.push({ field:"type", value: obj.type });

                this.txnDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 1
                }).then(function(e){
                    var view = self.txnDS.view();

                    if(view.length>0){
                        self.set("notDuplicateNumber", false);
                    }else{
                        self.set("notDuplicateNumber", true);
                    }
                });
            }
        },
        generateNumber      : function(){
            var self = this, obj = this.get("obj"),
                issueDate = new Date(obj.issued_date),
                startDate = new Date(obj.issued_date),
                endDate = new Date(obj.issued_date);

            this.set("notDuplicateNumber", true);

            startDate.setDate(1);
            startDate.setMonth(0);//Set to January
            endDate.setDate(31);
            endDate.setMonth(11);//Set to November

            this.numberDS.query({
                filter:[
                    { field:"type", value:obj.type },
                    { field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
                    { field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
                ]
            }).then(function(){
                var view = self.numberDS.view(),
                number = 0, str = "";

                if(view.length>0){
                    number = view[0].number.match(/\d+/g).map(Number);
                }

                number++;
                str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

                obj.set("number", str);
            });
        },
        //Obj
        loadObj             : function(id){
            var self = this, para = [];

            para.push({ field:"id", value: id });

            this.dataSource.query({
                filter: para
            }).then(function(e){
                var view = self.dataSource.view();

                self.set("obj", view[0]);
                self.set("total", kendo.toString(view[0].amount, "c", view[0].locale));

                self.loadLines(id);
                self.assemblyLineDS.filter([
                    { field: "transaction_id", value: id },
                    { field: "assembly_id >", value: 0 }
                ]);
                self.journalLineDS.filter({ field: "transaction_id", value: id });
                self.attachmentDS.filter({ field: "transaction_id", value: id });
                self.referenceDS.filter([
                    { field: "contact_id", value: view[0].contact_id },
                    { field: "amount >", value: 0 },
                    { field: "type", value:"Vendor_Deposit" }
                ]);

                self.returnDS.query({
                    filter:{ field: "return_id", value: id }
                }).then(function(){
                    var reInvoice = self.returnDS.view();

                    $.each(reInvoice, function(index, value){
                        value.set("amount", Math.abs(value.amount));
                    });
                });

                self.loadDeposit();
            });
        },
        loadLines           : function(id){
            var self = this;

            self.lineDS.query({
                filter: [
                    { field: "transaction_id", value: id },
                    { field: "assembly_id", value: 0 }
                ],
            }).then(function(){
                var view = self.lineDS.view();

                $.each(view, function(index, value){
                    value.set("item_prices", banhji.source.getPriceList(value.item_id));
                });
            });
        },
        changes             : function(){
            var self = this, obj = this.get("obj"),
            subTotal = 0, tax = 0, returnAmount = 0, itemIds = [];

            $.each(this.lineDS.data(), function(index, value) {
                var amt = value.quantity * value.cost;

                //Tax by line
                if(value.tax_item_id>0){
                    var taxItem = self.taxItemDS.get(value.tax_item_id);
                    tax += amt * taxItem.rate;
                }

                value.set("amount", amt);
                subTotal += amt;

                if(value.item_id>0){
                    itemIds.push(value.item_id);
                }
            });

            //Return
            $.each(this.returnDS.data(), function(index, value) {
                if(value.amount>value.sub_total){
                    value.set("amount", value.sub_total);
                }
                returnAmount += value.amount;
            });

            total = subTotal + tax + returnAmount;

            obj.set("sub_total", subTotal);
            obj.set("tax", tax);
            obj.set("deposit", returnAmount);
            obj.set("amount", total);

            this.set("total", kendo.toString(total, "c", obj.locale));

            //Remove Assembly Item List
            var raw = this.assemblyLineDS.data();
            var item, i;
            for(i=raw.length-1; i>=0; i--){
                item = raw[i];

                if (jQuery.inArray(kendo.parseInt(item.assembly_id), itemIds)==-1) {
                    this.assemblyLineDS.remove(item);
                }
            }
        },
        addEmpty            : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.assemblyLineDS.data([]);
            this.journalLineDS.data([]);
            this.returnDS.data([]);
            this.referenceDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);

            this.dataSource.insert(0, {
                contact_id          : "",
                reference_id        : "",
                recurring_id        : "",
                job_id              : 0,
                user_id             : this.get("user_id"),
                type                : "Payment_Refund", //Require
                number              : "",
                sub_total           : 0,
                discount            : 0,
                tax                 : 0,
                amount              : 0,
                deposit             : 0,
                amount_paid         : 0,
                remaining           : 0,
                rate                : 1,
                locale              : banhji.locale,
                issued_date         : new Date(),
                bill_to             : "",
                ship_to             : "",
                memo                : "",
                memo2               : "",
                status              : 0,
                segments            : [],
                is_journal          : 1,
                //Recurring
                recurring_name      : "",
                start_date          : new Date(),
                frequency           : "Daily",
                month_option        : "Day",
                interval            : 1,
                day                 : 1,
                week                : 0,
                month               : 0,
                is_recurring        : 0,

                contact             : { id:0, name:"" }
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);

            this.setRate();
            this.addRow();
            this.generateNumber();
        },
        addRow              : function(){
            var obj = this.get("obj");

            this.lineDS.add({
                transaction_id      : obj.id,
                tax_item_id         : "",
                item_id             : "",
                measurement_id      : 0,
                description         : "",
                quantity            : 1,
                conversion_ratio            : 1,
                cost                : 0,
                amount              : 0,
                discount            : 0,
                fine                : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                movement            : -1,
                reference_no        : "",

                item_prices         : []
            });
        },
        removeRow           : function(e){
            var data = e.data;

            //Remove Assembly Item List
            if(data.item_id>0){
                var raw = this.assemblyLineDS.data();

                var item, i;
                for(i=raw.length-1; i>=0; i--){
                    item = raw[i];
                    if (item.assembly_id==data.item_id){
                        this.assemblyLineDS.remove(item);
                    }

                }
            }

            this.lineDS.remove(data);
            this.changes();
        },
        objSync             : function(){
            var dfd = $.Deferred();

            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.response){
                    dfd.resolve(e.response.results);
                }
            });
            this.dataSource.bind("error", function(e){
                dfd.reject(e.errorThrown);
            });

            return dfd;
        },
        save                : function(){
            var self = this, obj = this.get("obj");
            obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

            //Mode
            if(obj.isNew()==false){
                //Journal
                $.each(this.journalLineDS.data(), function(index, value){
                    value.set("deleted", 1);
                });

                this.addJournal(obj.id);
            }

            //Save Obj
            this.objSync()
            .then(function(data){ //Success
                if(self.get("isEdit")==false){
                    //Item line
                    $.each(self.lineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //Assembly Item line
                    $.each(self.assemblyLineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //Attachment
                    $.each(self.attachmentDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //Journal
                    self.addJournal(data[0].id);
                }

                self.lineDS.sync();
                self.assemblyLineDS.sync();
                self.uploadFile();

                //Return
                var ids = [];
                $.each(self.returnDS.data(), function(index, value){
                    if(value.reference_id>0){
                        ids.push(value.reference_id);
                    }
                    value.set("return_id", data[0].id);
                    value.set("amount", value.amount*-1);
                    value.set("issued_date", kendo.toString(new Date(data[0].issued_date), "s"));
                });
                self.returnDS.sync();
                self.updateTxnStatus(ids);

                return data;
            }, function(reason) { //Error
                $("#ntf1").data("kendoNotification").error(reason);
            }).then(function(result){
                $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

                if(self.get("saveClose")){
                    //Save Close
                    self.set("saveClose", false);
                    self.cancel();
                    window.history.back();
                }else if(self.get("savePrint")){
                    //Save Print
                    self.set("savePrint", false);
                    self.cancel();
                    if(result[0].transaction_template_id>0){
                        banhji.router.navigate("/invoice_form/"+result[0].id);
                    }
                }else{
                    //Save New
                    self.addEmpty();
                }
            });
        },
        cancel              : function(){
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();
            this.returnDS.cancelChanges();
            this.assemblyLineDS.cancelChanges();
            this.attachmentDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.returnDS.data([]);
            this.assemblyLineDS.data([]);
            this.attachmentDS.data([]);

            banhji.userManagement.removeMultiTask("payment_refund");
        },
        validating          : function(){
            var result = true, obj = this.get("obj"),
            total_deposit = this.get("total_deposit");

            if(obj.deposit>total_deposit){
                $("#ntf1").data("kendoNotification").error("Over deposit amount to refund!");

                result = false;
            }

            if(this.lineDS.total()==0 && this.returnDS.total()==0){
                $("#ntf1").data("kendoNotification").error("Please select an item or deposit.");

                result = false;
            }

            return result;
        },
        updateTxnStatus     : function(ids){
            var self = this;

            if(ids.length>0){
                this.txnDS.query({
                    filter:{ field:"id", operator:"where_in", value:ids }
                }).then(function(){
                    var view = self.txnDS.view();

                    $.each(view, function(index, value){
                        value.set("status", 3);//Status 3 = refund
                    });

                    self.txnDS.sync();
                });
            }
        },
        //Return
        addRowReturn        : function(){
            var obj = this.get("obj"), account_id = 0;

            if(obj.contact_id>0){
                var contact = obj.contact;
                account_id = contact.deposit_account_id;
            }

            this.returnDS.add({
                return_id       : obj.id,
                account_id      : account_id,
                contact_id      : obj.contact_id,
                reference_id    : "",
                reference_no    : "",
                number          : "",
                type            : "Vendor_Deposit",
                amount          : 0,
                rate            : obj.rate,
                locale          : obj.locale,
                issued_date     : obj.issued_date
            });
        },
        removeRowReturn     : function(e){
            var data = e.data;

            this.returnDS.remove(data);
            this.changes();
        },
        loadReference       : function(){
            var obj = this.get("obj");

            if(obj.contact_id>0){
                this.referenceDS.filter([
                    { field: "contact_id", value: obj.contact_id },
                    { field: "amount >", value: 0 },
                    { field: "status <>", value: 3 },
                    { field: "type", value:"Vendor_Deposit" }
                ]);
            }
        },
        referenceChanges    : function(e){
            var data = e.data;

            if(data.reference_id>0){
                var txn = this.referenceDS.get(data.reference_id);

                data.set("account_id", txn.account_id);
                data.set("reference_no", txn.number);
                data.set("sub_total", txn.amount);
                data.set("amount", txn.amount);
            }else{
                data.set("account_id", 0);
                data.set("reference_no", "");
                data.set("sub_total", 0);
                data.set("amount", 0);
            }

            this.changes();
        },
        //Journal
        addJournal          : function(transaction_id){
            var self = this,
                obj = this.get("obj"),
                contact = obj.contact,
                raw = "", entries = {};

            //Cash on Dr
            var cashID = kendo.parseInt(obj.account_id);
            if(cashID>0){
                raw = "dr"+cashID;

                if(entries[raw]===undefined){
                    entries[raw] = {
                        transaction_id      : transaction_id,
                        account_id          : cashID,
                        contact_id          : obj.contact_id,
                        description         : obj.memo,
                        reference_no        : "",
                        segments            : obj.segments,
                        dr                  : obj.amount,
                        cr                  : 0,
                        rate                : obj.rate,
                        locale              : obj.locale
                    };
                }else{
                    entries[raw].dr += obj.amount;
                }
            }

            //Item lines
            $.each(this.lineDS.data(), function(index, value){
                var item = self.itemDS.get(value.item_id);

                //Service on Cr
                if(item.item_type_id==4){
                    var serviceID = kendo.parseInt(item.expense_account_id);
                    if(serviceID>0){
                        raw = "cr"+serviceID;

                        var serviceAmount = value.amount;
                        if(item.item_type_id==1 || item.item_type_id==4){
                            serviceAmount = value.quantity * value.conversion_ratio * value.cost;
                        }

                        if(entries[raw]===undefined){
                            entries[raw] = {
                                transaction_id      : transaction_id,
                                account_id          : serviceID,
                                contact_id          : obj.contact_id,
                                description         : value.description,
                                reference_no        : "",
                                segments            : obj.segments,
                                dr                  : 0,
                                cr                  : serviceAmount,
                                rate                : value.rate,
                                locale              : item.locale
                            };
                        }else{
                            entries[raw].cr += serviceAmount;
                        }
                    }
                }

                //Inventory on Cr
                var inventoryID = kendo.parseInt(item.inventory_account_id);
                if(inventoryID>0){
                    raw = "cr"+inventoryID;

                    var inventoryAmount = value.amount;
                    if(item.item_type_id==1 || item.item_type_id==4){
                        inventoryAmount = value.quantity * value.conversion_ratio * value.cost;
                    }

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : inventoryID,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : 0,
                            cr                  : inventoryAmount,
                            rate                : value.rate,
                            locale              : item.locale
                        };
                    }else{
                        entries[raw].cr += inventoryAmount;
                    }
                }

                //Tax on Cr
                if(value.tax_item_id>0){
                    var taxItem = self.taxItemDS.get(value.tax_item_id),
                        raw = "cr"+taxItem.account_id,
                        taxAmt = value.amount * taxItem.rate;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : taxItem.account_id,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : 0,
                            cr                  : taxAmt,
                            rate                : obj.rate,
                            locale              : obj.locale
                        };
                    }else{
                        entries[raw].cr += taxAmt;
                    }
                }
            });

            //Return Lines
            $.each(this.returnDS.data(), function(index, value){
                //Deposit on Cr
                var depositID = kendo.parseInt(value.account_id);
                if(depositID>0){
                    raw = "cr"+depositID;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : depositID,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : value.reference_no,
                            segments            : value.segments,
                            dr                  : 0,
                            cr                  : value.amount,
                            rate                : value.rate,
                            locale              : value.locale
                        };
                    }else{
                        entries[raw].cr += value.amount;
                    }
                }
            });

            //Add to journal entry
            if(!jQuery.isEmptyObject(entries)){
                $.each(entries, function(index, value){
                    self.journalLineDS.add(value);
                });
            }

            this.journalLineDS.sync();
        }
    });
    banhji.cashRefund =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        referenceDS         : dataStore(apiUrl + "transactions"),
        returnDS            : dataStore(apiUrl + "transactions"),
        txnDS               : dataStore(apiUrl + "transactions"),
        numberDS            : dataStore(apiUrl + "transactions/number"),
        lineDS              : dataStore(apiUrl + "item_lines"),
        assemblyLineDS      : dataStore(apiUrl + "item_lines"),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        assemblyDS          : dataStore(apiUrl + "item_prices"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        wacDS               : dataStore(apiUrl + "items/weighted_average_costing"),
        jobDS               : new kendo.data.DataSource({
            data: banhji.source.jobList,
            sort: { field: "name", dir: "asc" }
        }),
        segmentItemDS       : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        taxItemDS           : new kendo.data.DataSource({
            data: banhji.source.taxList,
            filter:{
                logic: "or",
                filters: [
                    { field: "tax_type_id", value: 3 },//Customer Tax
                    { field: "tax_type_id", value: 9 }
                ]
            },
            sort: [
                { field: "tax_type_id", dir: "asc" },
                { field: "name", dir: "asc" }
            ]
        }),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{ field: "type", value: "Cash_Refund" }
        }),
        accountDS           : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter:{ field:"account_type_id", value: 10 },
            sort: { field:"number", dir:"asc" }
        }),
        contactDS           : banhji.source.customerDS,
        amtDueColor         : banhji.source.amtDueColor,
        obj                 : null,
        isEdit              : false,
        saveClose           : false,
        savePrint           : false,
        notDuplicateNumber  : true,
        total               : 0,
        total_deposit       : 0,
        user_id             : banhji.source.user_id,
        pageLoad            : function(id){
            if(id){
                this.set("isEdit", true);
                this.loadObj(id);
            }else{
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                }
            }
        },
        //Upload
        onSelect            : function(e){
            // Array with information about the uploaded files
            var self = this,
            files = e.files,
            obj = this.get("obj");

            // Check the extension of each file and abort the upload if it is not .jpg
            $.each(files, function(index, value){
                if (value.extension.toLowerCase() === ".jpg"
                    || value.extension.toLowerCase() === ".jpeg"
                    || value.extension.toLowerCase() === ".tiff"
                    || value.extension.toLowerCase() === ".png"
                    || value.extension.toLowerCase() === ".gif"
                    || value.extension.toLowerCase() === ".pdf"){

                    var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

                    self.attachmentDS.add({
                        user_id         : self.get("user_id"),
                        transaction_id  : obj.id,
                        type            : "Transaction",
                        name            : value.name,
                        description     : "",
                        key             : key,
                        url             : banhji.s3 + key,
                        size            : value.size,
                        created_at      : new Date(),

                        file            : value.rawFile
                    });
                }else{
                    alert("This type of file is not allowed to attach.");
                }
            });
        },
        onRemove            : function(e){
            // Array with information about the uploaded files
            var self = this, files = e.files;
            $.each(this.attachmentDS.data(), function(index, value){
                if(value.name==files[0].name){
                    self.attachmentDS.remove(value);

                    return false;
                }
            });
        },
        removeFile          : function(e){
            var data = e.data;

            if (confirm("Are you sure, you want to delete it?")) {
                this.attachmentDS.remove(data);
            }
        },
        uploadFile          : function(){
            var self = this;

            $.each(this.attachmentDS.data(), function(index, value){
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

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e){
                if(e.type=="destroy"){
                    if(saved==false){
                        saved = true;

                        var response = e.response.results;
                        $.each(response, function(index, value){
                            var paramz = {
                                //Bucket: 'STRING_VALUE', /* required */
                                Delete: { /* required */
                                    Objects: [ /* required */
                                        {
                                            Key: value.data.key /* required */
                                        }
                                      /* more items */
                                    ]
                                }
                            };
                            bucket.deleteObjects(paramz, function(err, data) {
                                //console.log(err, data);
                            });
                        });
                    }
                }
            });

            //Clear upload files
            $(".k-upload-files").remove();
        },
        //Deposit
        loadDeposit         : function(){
            var self = this, obj = this.get("obj");

            if(obj.contact_id>0){
                this.txnDS.query({
                    filter:[
                        { field:"amount", operator:"select_sum", value:"amount" },
                        { field:"contact_id", value: obj.contact_id },
                        { field:"type", value: "Customer_Deposit" }
                    ]
                }).then(function(){
                    var view = self.txnDS.view();

                    self.set("total_deposit", view[0].amount + obj.deposit);
                });
            }
        },
        //Contact
        setContact          : function(contact){
            var obj = this.get("obj");

            obj.set("contact", contact);
            this.contactChanges();
        },
        contactChanges      : function(){
            var self = this, obj = this.get("obj");

            if(obj.contact){
                var contact = obj.contact;

                obj.set("contact_id", contact.id);
                obj.set("locale", contact.locale);
                obj.set("bill_to", contact.bill_to);
                obj.set("ship_to", contact.ship_to);

                this.setRate();
                this.loadDeposit();
                this.loadReference();
                this.jobDS.filter({ field:"contact_id", value: contact.id });
            }

            this.changes();
        },
        //Currency Rate
        setRate             : function(){
            var obj = this.get("obj"),
            rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

            obj.set("rate", rate);

            $.each(this.lineDS.data(), function(index, value){
                var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
                value.set("rate", itemRate);
            });
        },
        //Segment
        segmentChanges      : function(e) {
            var dataArr = this.get("obj").segments,
            lastIndex = dataArr.length - 1,
            last = this.segmentItemDS.get(dataArr[lastIndex]);

            if(dataArr.length > 1) {
                for(var i = 0; i < dataArr.length - 1; i++) {
                    var current_index = dataArr[i],
                    current = this.segmentItemDS.get(current_index);

                    if(current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        //Item
        addRow              : function(){
            var obj = this.get("obj");
            this.lineDS.add({
                transaction_id      : obj.id,
                tax_item_id         : "",
                item_id             : "",
                assembly_id         : 0,
                measurement_id      : 0,
                description         : "",
                quantity            : 1,
                conversion_ratio    : 0,
                price               : 0,
                amount              : 0,
                discount            : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                movement            : 1,
                reference_no        : "",

                item                : { id:"", name:"" },
                measurement         : { measurement_id:"", measurement:"" },
                tax_item            : { id:"", name:"" }
            });
        },
        addExtraRow         : function(uid){
            var row = this.lineDS.getByUid(uid),
                index = this.lineDS.indexOf(row);

            if(index==this.lineDS.total()-1){
                this.addRow();
            }
        },
        removeEmptyRow      : function(){
            var raw = this.lineDS.data();
            var item, i;
            for(i=raw.length-1; i>=0; i--){
                item = raw[i];

                if (item.item_id==0) {
                    this.lineDS.remove(item);
                }
            }
        },
        removeRow           : function(e){
            var data = e.data;

            //Remove Assembly Item List
            if(data.item_id>0){
                var raw = this.assemblyLineDS.data();

                var item, i;
                for(i=raw.length-1; i>=0; i--){
                    item = raw[i];
                    if (item.assembly_id==data.item_id){
                        this.assemblyLineDS.remove(item);
                    }

                }
            }

            this.lineDS.remove(data);
            this.changes();
        },
        addItem             : function(uid){
            var self = this,
                row = this.lineDS.getByUid(uid),
                obj = this.get("obj"),
                item = row.item,
                rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

            row.set("item_id", item.id);
            row.set("description", item.sale_description);
            // row.set("cost", item.cost * rate);
            row.set("rate", rate);
            row.set("locale", item.locale);

            //Get cost
            this.wacDS.query({
                filter:[
                    { field:"item_id", value: item.id },
                    { field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd  HH:mm:ss") }
                ]
            }).then(function(){
                var wac = self.wacDS.view();
                row.set("cost", wac[0].cost * rate);
            });

            //Get first price
            this.assemblyDS.query({
                filter:[
                    { field:"item_id", value:item.id },
                    { field:"assembly_id", value:0 }
                ],
                page: 1,
                pageSize: 1
            }).then(function(){
                var view = self.assemblyDS.view();

                if(view.length>0){
                    var measurement = {
                        measurement_id  : view[0].measurement_id,
                        price           : kendo.parseFloat(view[0].price),
                        conversion_ratio: view[0].conversion_ratio,
                        measurement     : view[0].measurement
                    };
                    row.set("measurement", measurement);
                }
            });
        },
        addItemCatalog      : function(uid){
            var self = this,
                row = this.lineDS.getByUid(uid),
                obj = this.get("obj"),
                item = row.item;

            this.lineDS.remove(row);

            $.each(item.catalogs, function(index, value){
                var catalogItem = banhji.source.itemDS.get(value);

                if(catalogItem){
                    var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date));

                    self.lineDS.add({
                        transaction_id      : obj.id,
                        tax_item_id         : 0,
                        item_id             : catalogItem.id,
                        measurement_id      : 0,
                        description         : catalogItem.sale_description,
                        quantity            : 1,
                        conversion_ratio    : 1,
                        cost                : catalogItem.cost * rate,
                        price               : 0,
                        amount              : 0,
                        discount            : 0,
                        rate                : rate,
                        locale              : catalogItem.locale,
                        movement            : -1,

                        discount_percentage : 0,
                        item                : catalogItem,
                        measurement         : { measurement_id:"", measurement:"" },
                        tax_item            : { id:"", name:"" }
                    });
                }
            });
        },
        addItemAssembly     : function(uid){
            var self = this,
                row = this.lineDS.getByUid(uid),
                obj = this.get("obj"),
                item = row.item,
                rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

            var notExist = true;
            $.each(this.assemblyLineDS.data(), function(index, value){
                if(value.assembly_id==item.id){
                    notExist = false;

                    return false;
                }
            });

            if(notExist){
                row.set("item_id", item.id);
                row.set("measurement_id", item.measurement_id);
                row.set("description", item.sale_description);
                row.set("conversion_ratio", 1);
                row.set("cost", item.cost * rate);
                row.set("price", item.price * rate);
                row.set("rate", rate);
                row.set("locale", item.locale);

                this.assemblyDS.query({
                    filter:{ field:"assembly_id", value:row.item_id }
                }).then(function(){
                    var view = self.assemblyDS.view();

                    $.each(view, function(index, value){
                        var itemAssembly = banhji.source.itemDS.get(value.item_id),
                            itemAssemblyRate = obj.rate / banhji.source.getRate(itemAssembly.locale, new Date(obj.issued_date));

                        self.assemblyLineDS.add({
                            transaction_id      : obj.id,
                            item_id             : value.item_id,
                            assembly_id         : value.assembly_id,
                            measurement_id      : value.measurement_id,
                            description         : itemAssembly.sale_description,
                            quantity            : value.quantity,
                            conversion_ratio    : value.conversion_ratio,
                            cost                : itemAssembly.cost * rate,
                            price               : value.price * itemAssemblyRate,
                            amount              : value.price * itemAssemblyRate,
                            rate                : itemAssemblyRate,
                            locale              : value.locale,
                            movement            : -1,

                            item                : itemAssembly
                        });
                    });
                });
            }else{
                alert("Duplicate Item Assembly!");
                row.set("item_id", 0);
                row.set("item", { id:"", name:"" });
            }
        },
        lineDSChanges       : function(arg){
            var self = banhji.cashRefund;

            if(arg.field){
                if(arg.field=="item"){
                    var dataRow = arg.items[0],
                        item = dataRow.item;

                    if(item.is_catalog=="1"){
                        self.addItemCatalog(dataRow.uid);
                    }else if(item.is_assembly=="1"){
                        self.addItemAssembly(dataRow.uid);
                    }else{
                        self.addItem(dataRow.uid);
                    }

                    self.addExtraRow(dataRow.uid);
                }else if(arg.field=="quantity" || arg.field=="price"){
                    self.changes();
                }else if(arg.field=="measurement"){
                    var dataRow = arg.items[0];

                    dataRow.set("measurement_id", dataRow.measurement.measurement_id);
                    dataRow.set("price", dataRow.measurement.price * dataRow.rate);
                    dataRow.set("conversion_ratio", dataRow.measurement.conversion_ratio);
                }else if(arg.field=="tax_item"){
                    var dataRow = arg.items[0];

                    dataRow.set("tax_item_id", dataRow.tax_item.id);
                    dataRow.set("tax", 0);

                    self.changes();
                }
            }
        },
        //Number
        checkExistingNumber : function(){
            var self = this, para = [],
            obj = this.get("obj");

            if(obj.number!==""){

                if(obj.isNew()==false){
                    para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
                }

                para.push({ field:"number", value: obj.number });
                para.push({ field:"type", value: obj.type });

                this.txnDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 1
                }).then(function(e){
                    var view = self.txnDS.view();

                    if(view.length>0){
                        self.set("notDuplicateNumber", false);
                    }else{
                        self.set("notDuplicateNumber", true);
                    }
                });
            }
        },
        generateNumber      : function(){
            var self = this, obj = this.get("obj"),
                issueDate = new Date(obj.issued_date),
                startDate = new Date(obj.issued_date),
                endDate = new Date(obj.issued_date);

            this.set("notDuplicateNumber", true);

            startDate.setDate(1);
            startDate.setMonth(0);//Set to January
            endDate.setDate(31);
            endDate.setMonth(11);//Set to November

            this.numberDS.query({
                filter:[
                    { field:"type", value:obj.type },
                    { field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
                    { field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
                ]
            }).then(function(){
                var view = self.numberDS.view(),
                number = 0, str = "";

                if(view.length>0){
                    number = view[0].number.match(/\d+/g).map(Number);
                }

                number++;
                str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

                obj.set("number", str);
            });
        },
        //Obj
        loadObj             : function(id){
            var self = this, para = [];

            para.push({ field:"id", value: id });

            this.dataSource.query({
                filter: para
            }).then(function(e){
                var view = self.dataSource.view();

                self.set("obj", view[0]);
                self.set("total", kendo.toString(view[0].amount, "c", view[0].locale));

                self.lineDS.query({
                    filter: [
                        { field: "transaction_id", value: id },
                        { field: "assembly_id", value: 0 }
                    ],
                });

                self.assemblyLineDS.query({
                    filter:[
                        { field: "transaction_id", value: id },
                        { field: "assembly_id >", value: 0 }
                    ]
                });

                self.journalLineDS.query({
                    filter:{ field: "transaction_id", value: id }
                });

                self.referenceDS.query({
                    filter:[
                        { field: "contact_id", value: view[0].contact_id },
                        { field: "amount >", value: 0 },
                        { field: "type", value:"Customer_Deposit" }
                    ]
                });

                self.returnDS.query({
                    filter:{ field: "return_id", value: id }
                }).then(function(){
                    var reInvoice = self.returnDS.view();

                    $.each(reInvoice, function(index, value){
                        value.set("amount", Math.abs(value.amount));
                    });
                });

                self.attachmentDS.filter({ field: "transaction_id", value: id });
                self.loadDeposit();
            });
        },
        changes             : function(){
            var self = this, obj = this.get("obj"),
            subTotal = 0, tax = 0, returnAmount = 0, itemIds = [];

            $.each(this.lineDS.data(), function(index, value) {
                var amt = value.quantity * value.price;

                //Tax by line
                if(value.tax_item_id>0){
                    var taxItem = value.tax_item;
                    tax += amt * taxItem.rate;
                }

                value.set("amount", amt);
                subTotal += amt;

                if(value.item_id>0){
                    itemIds.push(value.item_id);
                }
            });

            //Return
            $.each(this.returnDS.data(), function(index, value) {
                if(value.amount>value.sub_total){
                    value.set("amount", value.sub_total);
                }
                returnAmount += value.amount;
            });

            total = subTotal + tax + returnAmount;

            obj.set("sub_total", subTotal);
            obj.set("tax", tax);
            obj.set("deposit", returnAmount);
            obj.set("amount", total);

            this.set("total", kendo.toString(total, "c", obj.locale));

            //Remove Assembly Item List
            var raw = this.assemblyLineDS.data();
            var item, i;
            for(i=raw.length-1; i>=0; i--){
                item = raw[i];

                if (jQuery.inArray(kendo.parseInt(item.assembly_id), itemIds)==-1) {
                    this.assemblyLineDS.remove(item);
                }
            }
        },
        addEmpty            : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.assemblyLineDS.data([]);
            this.journalLineDS.data([]);
            this.attachmentDS.data([]);
            this.returnDS.data([]);
            this.referenceDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);

            this.dataSource.insert(0, {
                contact_id          : "",
                reference_id        : "",
                recurring_id        : "",
                job_id              : 0,
                user_id             : this.get("user_id"),
                type                : "Cash_Refund", //Require
                number              : "",
                sub_total           : 0,
                discount            : 0,
                tax                 : 0,
                amount              : 0,
                deposit             : 0,
                remaining           : 0,
                amount_paid         : 0,
                credit_allowed      : 0,
                rate                : 1,
                locale              : banhji.locale,
                issued_date         : new Date(),
                bill_to             : "",
                ship_to             : "",
                memo                : "",
                memo2               : "",
                status              : 0,
                segments            : [],
                is_journal          : 1,
                //Recurring
                recurring_name      : "",
                start_date          : new Date(),
                frequency           : "Daily",
                month_option        : "Day",
                interval            : 1,
                day                 : 1,
                week                : 0,
                month               : 0,
                is_recurring        : 0,

                contact             : { id:0, name:"" }
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            this.setRate();
            this.generateNumber();

            //Default rows
            for (var i = 0; i < banhji.source.defaultLines; i++) {
                this.addRow();
            }
        },
        objSync             : function(){
            var dfd = $.Deferred();

            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.response){
                    dfd.resolve(e.response.results);
                }
            });
            this.dataSource.bind("error", function(e){
                dfd.reject(e.errorThrown);
            });

            return dfd;
        },
        save                : function(){
            var self = this, obj = this.get("obj");
            obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

            //Save Obj
            this.objSync()
            .then(function(data){ //Success
                if(self.get("isEdit")==false){
                    //Item line
                    $.each(self.lineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //Assembly Item line
                    $.each(self.assemblyLineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //Attachment
                    $.each(self.attachmentDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });
                }

                //Journal
                if(data[0].is_recurring==0 && data[0].is_journal==1){
                    self.addJournal(data[0].id);
                }

                self.lineDS.sync();
                self.assemblyLineDS.sync();
                self.uploadFile();

                //Return
                var ids = [];
                $.each(self.returnDS.data(), function(index, value){
                    if(value.reference_id>0){
                        ids.push(value.reference_id);
                    }
                    value.set("return_id", data[0].id);
                    value.set("amount", value.amount*-1);
                    value.set("issued_date", kendo.toString(new Date(data[0].issued_date), "s"));
                });
                self.returnDS.sync();
                self.updateTxnStatus(ids);

                return data;
            }, function(reason) { //Error
                $("#ntf1").data("kendoNotification").error(reason);
            }).then(function(result){
                $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

                if(self.get("saveClose")){
                    //Save Close
                    self.set("saveClose", false);
                    self.cancel();
                    window.history.back();
                }else if(self.get("savePrint")){
                    //Save Print
                    self.set("savePrint", false);
                    self.cancel();
                    if(result[0].transaction_template_id>0){
                        banhji.router.navigate("/invoice_form/"+result[0].id);
                    }
                }else{
                    //Save New
                    self.addEmpty();
                }
            });
        },
        cancel              : function(){
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();
            this.returnDS.cancelChanges();
            this.assemblyLineDS.cancelChanges();
            this.attachmentDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.returnDS.data([]);
            this.assemblyLineDS.data([]);
            this.attachmentDS.data([]);

            banhji.userManagement.removeMultiTask("cash_refund");
        },
        validating          : function(){
            var result = true, obj = this.get("obj"),
            total_deposit = this.get("total_deposit");

            if(obj.deposit>total_deposit){
                $("#ntf1").data("kendoNotification").error("Over deposit amount to refund!");

                result = false;
            }

            if(this.lineDS.total()==0 && this.returnDS.total()==0){
                $("#ntf1").data("kendoNotification").error("Please select an item or deposit.");

                result = false;
            }

            return result;
        },
        updateTxnStatus     : function(ids){
            var self = this;

            if(ids.length>0){
                this.txnDS.query({
                    filter:{ field:"id", operator:"where_in", value:ids }
                }).then(function(){
                    var view = self.txnDS.view();

                    $.each(view, function(index, value){
                        value.set("status", 3);//Status 3 = refund
                    });

                    self.txnDS.sync();
                });
            }
        },
        //Return
        addRowReturn        : function(){
            var obj = this.get("obj"), account_id = 0;

            if(obj.contact_id>0){
                var contact = obj.contact;
                account_id = contact.deposit_account_id;
            }

            this.returnDS.add({
                return_id       : obj.id,
                account_id      : account_id,
                contact_id      : obj.contact_id,
                reference_id    : "",
                reference_no    : "",
                number          : "",
                type            : "Customer_Deposit",
                amount          : 0,
                rate            : obj.rate,
                locale          : obj.locale,
                issued_date     : obj.issued_date
            });
        },
        removeRowReturn     : function(e){
            var data = e.data;

            this.returnDS.remove(data);
            this.changes();
        },
        loadReference       : function(){
            var obj = this.get("obj");

            if(obj.contact_id>0){
                this.referenceDS.filter([
                    { field: "contact_id", value: obj.contact_id },
                    { field: "amount >", value: 0 },
                    { field: "status <>", value: 3 },
                    { field: "type", value:"Customer_Deposit" }
                ]);
            }
        },
        referenceChanges    : function(e){
            var data = e.data;

            if(data.reference_id>0){
                var txn = this.referenceDS.get(data.reference_id);

                data.set("account_id", txn.account_id);
                data.set("reference_no", txn.number);
                data.set("sub_total", txn.amount);
                data.set("amount", txn.amount);
            }else{
                data.set("account_id", 0);
                data.set("reference_no", "");
                data.set("sub_total", 0);
                data.set("amount", 0);
            }

            this.changes();
        },
        //Journal
        addJournal          : function(transaction_id){
            var self = this,
                obj = this.get("obj"),
                contact = obj.contact,
                raw = "", entries = {};

            //Edit Mode
            if(obj.isNew()==false){
                //Delete previous journal
                $.each(this.journalLineDS.data(), function(index, value){
                    value.set("deleted", 1);
                });
            }

            //Item lines
            $.each(this.lineDS.data(), function(index, value){
                var item = value.item,
                    itemRate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

                //COGS on Cr
                var cogsID = kendo.parseInt(item.expense_account_id);
                if(cogsID>0){
                    raw = "cr"+cogsID;

                    var cogsAmount = value.amount;
                    if(item.item_type_id==1 || item.item_type_id==4){
                        cogsAmount = (value.quantity*value.conversion_ratio)*value.cost;
                    }

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : cogsID,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : 0,
                            cr                  : cogsAmount * itemRate,
                            rate                : itemRate,
                            locale              : item.locale
                        };
                    }else{
                        entries[raw].cr += cogsAmount;
                    }
                }

                //Inventory on Dr
                var inventoryID = kendo.parseInt(item.inventory_account_id);
                if(inventoryID>0){
                    raw = "dr"+inventoryID;

                    var inventoryAmount = value.amount;
                    if(item.item_type_id==1 || item.item_type_id==4){
                        inventoryAmount = (value.quantity*value.conversion_ratio)*value.cost;
                    }

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : inventoryID,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : inventoryAmount * itemRate,
                            cr                  : 0,
                            rate                : itemRate,
                            locale              : item.locale
                        };
                    }else{
                        entries[raw].dr += inventoryAmount;
                    }
                }

                //Sale on Dr
                var incomeID = kendo.parseInt(item.income_account_id);
                if(incomeID>0){
                    raw = "dr"+incomeID;

                    var saleAmount = value.quantity * value.price;
                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : incomeID,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : saleAmount,
                            cr                  : 0,
                            rate                : obj.rate,
                            locale              : obj.locale
                        };
                    }else{
                        entries[raw].dr += value.amount;
                    }
                }

                //Tax on Dr
                if(value.tax_item_id>0){
                    var taxItem = value.tax_item,
                        raw = "dr"+taxItem.account_id,
                        taxAmt = value.amount * taxItem.rate;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : taxItem.account_id,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : taxAmt,
                            cr                  : 0,
                            rate                : obj.rate,
                            locale              : obj.locale
                        };
                    }else{
                        entries[raw].dr += taxAmt;
                    }
                }
            });

            //Assembly Item
            $.each(this.assemblyLineDS.data(), function(index, value){
                var item = value.item,
                    itemRate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

                //COGS on Cr
                var cogsID = kendo.parseInt(item.expense_account_id);
                if(cogsID>0){
                    raw = "cr"+cogsID;

                    var cogsAmount = value.amount;
                    if(item.item_type_id==1 || item.item_type_id==4){
                        inventoryAmount = (value.quantity*value.conversion_ratio)*value.cost;
                    }

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : cogsID,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : 0,
                            cr                  : cogsAmount * itemRate,
                            rate                : itemRate,
                            locale              : item.locale
                        };
                    }else{
                        entries[raw].cr += cogsAmount;
                    }
                }

                //Inventory on Dr
                var inventoryID = kendo.parseInt(item.inventory_account_id);
                if(inventoryID>0){
                    raw = "dr"+inventoryID;

                    var inventoryAmount = value.amount;
                    if(item.item_type_id==1 || item.item_type_id==4){
                        inventoryAmount = (value.quantity*value.conversion_ratio)*value.cost;
                    }

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : inventoryID,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : inventoryAmount * itemRate,
                            cr                  : 0,
                            rate                : itemRate,
                            locale              : item.locale
                        };
                    }else{
                        entries[raw].dr += inventoryAmount;
                    }
                }
            });

            //Return Lines
            $.each(this.returnDS.data(), function(index, value){
                //Deposit on Dr
                var depositID = kendo.parseInt(value.account_id);
                if(depositID>0){
                    raw = "dr"+depositID;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : depositID,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : value.amount,
                            cr                  : 0,
                            rate                : value.rate,
                            locale              : value.locale
                        };
                    }else{
                        entries[raw].dr += value.amount;
                    }
                }
            });

            //Cash on Cr
            var cashID = kendo.parseInt(obj.account_id);
            if(cashID>0){
                raw = "cr"+cashID;

                if(entries[raw]===undefined){
                    entries[raw] = {
                        transaction_id      : transaction_id,
                        account_id          : cashID,
                        contact_id          : obj.contact_id,
                        description         : obj.memo,
                        reference_no        : "",
                        segments            : obj.segments,
                        dr                  : 0,
                        cr                  : obj.amount,
                        rate                : obj.rate,
                        locale              : obj.locale
                    };
                }else{
                    entries[raw].cr += obj.amount;
                }
            }

            //Add to journal entry
            if(!jQuery.isEmptyObject(entries)){
                $.each(entries, function(index, value){
                    self.journalLineDS.add(value);
                });
            }

            this.journalLineDS.sync();
        }
    });



    banhji.reports = kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "micro_modules/cash_general_ledger"),
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : [],
        company             : banhji.institute,
        displayDate         : "",
        cash_in             : false,
        cash_out            : false,
        pageLoad            : function(){
            this.search();
        },
        sorterChanges       : function(){
            var today = new Date(),
            sdate = "",
            edate = "",
            sorter = this.get("sorter");

            switch(sorter){
                case "today":
                    this.set("sdate", today);
                    this.set("edate", "");

                    break;
                case "week":
                    var first = today.getDate() - today.getDay(),
                    last = first + 6;

                    this.set("sdate", new Date(today.setDate(first)));
                    this.set("edate", new Date(today.setDate(last)));

                    break;
                case "month":
                    this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
                    this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

                    break;
                case "year":
                    this.set("sdate", new Date(today.getFullYear(), 0, 1));
                    this.set("edate", new Date(today.getFullYear(), 11, 31));

                    break;
                default:
                    this.set("sdate", "");
                    this.set("edate", "");
            }
        },
        search              : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";

            //Cash Account Only
            para.push({ field:"account_type_id", operator:"where_related_account", value: 10 });

            //Cash In
            if(this.get("cash_in")){
                this.set("cash_in", false);

                para.push({ field:"dr >", value: 0 });
                para.push({ field:"cr", value: 0 });
            }

            //Cash Out
            if(this.get("cash_out")){
                this.set("cash_out", false);

                para.push({ field:"dr", value: 0 });
                para.push({ field:"cr >", value: 0 });
            }

            //Dates
            if(start && end){
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
                para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({ field:"issued_date", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter:para,
                sort:[
                    { field:"number", operator:"order_by_related_account", dir:"asc" },
                    { field:"issued_date", operator:"order_by_related_transaction", dir:"desc" }
                ],
                page: 1,
                pageSize: 100
            });
            this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response;

                    self.set("obj", response);
                }
            });
        },
        loadCashIn          : function(){
            this.set("cash_in", true);
            this.search();
        },
        loadCashOut          : function(){
            this.set("cash_out", true);
            this.search();
        },
        loadCashBalance          : function(){
            this.set("sorter", "all");
            this.sorterChanges();

            this.dataSource.filter([
                { field:"account_type_id", operator:"where_related_account", value: 10 },
                { field:"balance_forward", operator:"cash_balance", value: true }
            ]);
        }
    });
    banhji.accountingCenter = kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "accounts"),
        accountTypeDS       : banhji.source.accountTypeDS,
        summaryDS           : dataStore(apiUrl + 'centers/accounting_summary'),
        transactionDS       : dataStore(apiUrl + 'centers/accounting_txn'),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        cashgLDS          : dataStore(apiUrl + "micro_modules/cash_general_ledger"),
        sortList            : banhji.source.sortList,
        sorter              : "all",
        sdate               : "",
        edate               : "",
        obj                 : null,
        searchText          : "",
        balance             : 0,
        totalTxn            : 0,
        subName             : "",
        typeName            : "",
        nature              : "",
        user_id             : banhji.source.user_id,
        pageLoad            : function(id){
            if(id){
                this.loadObj(id);
            }
            //Refresh
            if(this.dataSource.total()>0){
                this.dataSource.fetch();
                this.loadSummary();
                this.searchTransaction();
            }else{
                this.search();
            }
        },
        //Upload
        onSelect            : function(e){
            // Array with information about the uploaded files
            var self = this,
            files = e.files,
            obj = this.get("obj");

            if(obj!==null){
                // Check the extension of each file and abort the upload if it is not .jpg
                $.each(files, function(index, value){
                    if (value.extension.toLowerCase() === ".jpg"
                        || value.extension.toLowerCase() === ".jpeg"
                        || value.extension.toLowerCase() === ".tiff"
                        || value.extension.toLowerCase() === ".png"
                        || value.extension.toLowerCase() === ".gif"
                        || value.extension.toLowerCase() === ".pdf"){

                        var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

                        self.attachmentDS.add({
                            user_id         : self.get("user_id"),
                            account_id      : obj.id,
                            type            : "Account",
                            name            : value.name,
                            description     : "",
                            key             : key,
                            url             : banhji.s3 + key,
                            size            : value.size,
                            created_at      : new Date(),

                            file            : value.rawFile
                        });
                    }else{
                        alert("This type of file is not allowed to attach.");
                    }
                });
            }
        },
        removeFile          : function(e){
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
                this.attachmentDS.sync();
            }
        },
        uploadFile          : function(){
            $.each(this.attachmentDS.data(), function(index, value){
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

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e){
                //Delete File
                if(e.type=="destroy"){
                    if(saved==false && e.response){
                        saved = true;

                        var response = e.response.results;
                        $.each(response, function(index, value){
                            var params = {
                                //Bucket: 'STRING_VALUE', /* required */
                                Delete: { /* required */
                                    Objects: [ /* required */
                                        {
                                            Key: value.data.key /* required */
                                        }
                                      /* more items */
                                    ]
                                }
                            };
                            bucket.deleteObjects(params, function(err, data) {
                                //console.log(err, data);
                            });
                        });
                    }
                }
            });
        },
        sorterChanges       : function(){
            var today = new Date(),
            sdate = "",
            edate = "",
            sorter = this.get("sorter");

            switch(sorter){
                case "today":
                    this.set("sdate", today);
                    this.set("edate", "");

                    break;
                case "week":
                    var first = today.getDate() - today.getDay(),
                    last = first + 6;

                    this.set("sdate", new Date(today.setDate(first)));
                    this.set("edate", new Date(today.setDate(last)));

                    break;
                case "month":
                    this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
                    this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

                    break;
                case "year":
                    this.set("sdate", new Date(today.getFullYear(), 0, 1));
                    this.set("edate", new Date(today.getFullYear(), 11, 31));

                    break;
                default:
                    this.set("sdate", "");
                    this.set("edate", "");
            }
        },
        loadObj             : function(id){
            var self = this;

            this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var data = e.response.results;

                    $.each(data, function(index, value){
                        if(value.id==id){
                            if(value.sub_of_id>0){
                                self.set("subName", value.name);
                            }else{
                                self.set("subName", "");
                            }

                            self.set("obj", value);
                            self.loadSummary();
                            self.searchTransaction();

                            return false;
                        }
                    });

                    //Sub Account
                    var obj = self.get("obj");
                    if(obj.sub_of_id>0){
                        $.each(data, function(index, value){
                            if(value.id==obj.sub_of_id){
                                self.set("subName", value.name);

                                return false;
                            }
                        });
                    }else{
                        self.set("subName", "");
                    }

                    var type = self.accountTypeDS.get(obj.account_type_id);
                    self.set("typeName", type.name);
                    self.set("nature", type.nature);
                }
            });
        },
        loadSummary         : function(){
            var self = this, obj = this.get("obj");

            this.summaryDS.query({
                filter: [
                    { field:"account_id", value: obj.id }
                ],
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.summaryDS.view();

                if(view.length>0){
                    self.set("balance", kendo.toString(view[0].balance, view[0].locale=="km-KH"?"c0":"c", view[0].locale));
                    self.set("totalTxn", self.summaryDS.total());
                }else{
                    self.set("balance", 0);
                    self.set("totalTxn", 0);
                }
            });
        },
        selectedRow         : function(e){
            var data = e.data,
            sub = this.dataSource.get(data.sub_of_id),
            type = this.accountTypeDS.get(data.account_type_id);

            if(sub && data.sub_of_id>0){
                this.set("subName", sub.name);
            }else{
                this.set("subName", "");
            }

            this.set("typeName", type.name);
            this.set("nature", type.nature);

            this.set("obj", data);
            this.loadSummary();
            this.searchTransaction();

            this.attachmentDS.query({
                filter:{ field:"account_id", value: data.id },
                page: 1,
                pageSize:10
            });
        },
        enterSearch         : function(e){
            e.preventDefault();

            this.search();
        },
        search              : function(){
            var self = this,
                para = [],
                account_type_id = this.get("account_type_id"),
                txtSearch = this.get("searchText");

            if(txtSearch){
                para.push(
                    { field: "number", operator: "like", value: txtSearch },
                    { field: "name", operator: "or_like", value: txtSearch }
                );
            }

            //Cash In
            if(this.get("cash_in")){
                this.set("cash_in", false);

                para.push({ field:"dr >", value: 0 });
                para.push({ field:"cr", value: 0 });
            }

            //Cash Out
            if(this.get("cash_out")){
                this.set("cash_out", false);

                para.push({ field:"dr", value: 0 });
                para.push({ field:"cr >", value: 0 });
            }

            if(account_type_id){
                para.push({ field:"account_type_id", value:account_type_id });
            }

            para.push({ field:"status", value:1 });
            para.push({ field:"account_type_id", value:10 });

            this.dataSource.query({
                filter:para,
                sort:[
                    { field:"account_type_id", dir:"asc" },
                    { field:"number", dir:"asc" }
                ],
                page:1,
                pageSize:100
            });

            //Clear search filters
            this.set("searchText", "");
            this.set("account_type_id", "");
        },
        searchTransaction   : function(){
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate");

            if(obj.id){
                para.push({ field:"account_id", value: obj.id });
            }

            //Dates
            if(start && end){
                start = new Date(start);
                end = new Date(end);
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date >=", operator: "where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
                para.push({ field:"issued_date <=", operator: "where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
                start = new Date(start);
                para.push({ field:"issued_date", operator: "where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
                end = new Date(end);
                end.setDate(end.getDate()+1);
                para.push({ field:"issued_date <=", operator: "where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{}

            this.transactionDS.query({
                filter: para,
                page: 1,
                pageSize: 10
            });
        },
        showActive          : function(){
            this.dataSource.filter({ field:"status", value: 1 });
        },
        showInactive        : function(){
            this.dataSource.filter({ field:"status", value: 0 });
        },
        loadTransaction     : function(){
            var self = this,
                para = [],
                obj = this.get("obj"),
                today = new Date(),
                start = kendo.toString(banhji.source.getFiscalDate(), "yyyy-MM-dd"),
                end = kendo.toString(today, "yyyy-MM-dd");

            if(obj.id){
                para.push({ field:"account_id", value: obj.id });
            }

            para.push({ field:"issued_date >=", operator:"where_related_transaction", value: start });
            para.push({ field:"issued_date <=", operator:"where_related_transaction", value: end });

            this.transactionDS.query({
                filter: para,
                page: 1,
                pageSize: 100
            });
        },
        goEdit              : function(){
            var obj = this.get("obj");
            banhji.router.navigate('/account/'+obj.id);
        },
        checkIsSub          : function(sub_of_id){
            var isSub = false, data = this.dataSource.get(sub_of_id);

            if(data){
                if(data.sub_of_id>0){
                    isSub = true;
                }
            }

            return isSub;
        },
        loadCashIn          : function(){
            this.set("cash_in", true);
            this.search();
        },
        loadCashOut          : function(){
            this.set("cash_out", true);
            this.search();
        },
    });

    banhji.account =  kendo.observable({
        lang                    : langVM,
        dataSource              : dataStore(apiUrl + "accounts"),
        deleteDS                : dataStore(apiUrl + "account_lines"),
        numberDS                : dataStore(apiUrl + "accounts"),
        accountTypeDS           : banhji.source.accountTypeDS,
        currencyDS              : new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: { field:"status", value: 1 }
        }),
        subAccountDS            : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: { field:"account_type_id", value: 10 }
        }),
        statusList              : banhji.source.statusList,
        confirmMessage          : banhji.source.confirmMessage,
        obj                     : null,
        isEdit                  : false,
        isProtected             : false,
        saveClose               : false,
        showConfirm             : false,
        notDuplicateNumber      : true,
        showBank                : false,
        pageLoad                : function(id){
            if(id){
                this.set("isEdit", true);
                this.loadObj(id);
            }else{
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                }
            }
        },
        //Number
        checkExistingNumber     : function(){
            var self = this, para = [],
            obj = this.get("obj");

            if(obj.number!==""){

                if(obj.isNew()==false){
                    para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
                }

                para.push({ field:"number", value: obj.number });
                para.push({ field:"account_type_id", value: obj.account_type_id });

                this.numberDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 1
                }).then(function(e){
                    var view = self.numberDS.view();

                    if(view.length>0){
                        self.set("notDuplicateNumber", false);
                    }else{
                        self.set("notDuplicateNumber", true);
                    }
                });
            }
        },
        generateNumber          : function(){
            var self = this, para = [],
            obj = this.get("obj");

            if(obj.sub_of_id>0){
                para.push({ field:"sub_of_id", value: obj.sub_of_id });
                para.push({ field:"id", operator:"or_where", value: obj.sub_of_id });
            }else{
                para.push({ field:"account_type_id", value:obj.account_type_id });
            }

            this.numberDS.query({
                filter: para,
                sort: { field:"number", dir:"desc" },
                page:1,
                pageSize:1
            }).then(function(){
                var view = self.numberDS.view();

                var lastNo = 0;
                if(view.length>0){
                    lastNo = kendo.parseInt(view[0].number);
                }
                lastNo++;
                obj.set("number",kendo.toString(lastNo, "00000"));
            });
        },
        //Obj
        loadObj                 : function(id){
            var self = this;

            this.dataSource.query({
                filter: { field:"id", value: id },
                page:1,
                pageSize:1
            }).then(function(e){
                var view = self.dataSource.view();

                self.set("obj", view[0]);

                if(view[0].account_type_id==10){
                    self.set("showBank", true);
                }else{
                    self.set("showBank", false);
                }
            });
        },
        typeChanges             : function(){
            var obj = this.get("obj");
            this.set("showBank", false);

            if(obj.account_type_id){
                if(obj.account_type_id==10){
                    this.set("showBank", true);
                }
                this.generateNumber();
            }
        },
        addEmpty                : function(){
            this.dataSource.data([]);

            this.set("isEdit", false);
            this.set("notDuplicateNumber", true);

            this.dataSource.insert(0, {
                account_type_id         : 10,
                sub_of_id               : 0,
                number                  : "",
                name                    : "",
                name_2                  : "",
                description             : "",
                bank_name               : "",
                bank_account_number     : "",
                locale                  : banhji.locale,
                is_taxable              : 0,
                status                  : 1,
                is_system               : 0
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);
        },
        objSync                 : function(){
            var dfd = $.Deferred();

            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.response){
                    dfd.resolve(e.response.results);
                }
            });
            this.dataSource.bind("error", function(e){
                dfd.reject(e.errorThrown);
            });

            return dfd;
        },
        save                    : function(){
            var self = this, obj = this.get("obj");

            //Save Obj
            this.objSync()
            .then(function(data){ //Success

                return data;
            }, function(reason) { //Error
                $("#ntf1").data("kendoNotification").error(reason);
            }).then(function(result){
                $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

                if(self.get("saveClose")){
                    //Save Close
                    self.set("saveClose", false);
                    self.cancel();
                    window.history.back();
                }else{
                    //Save New
                    self.addEmpty();
                }

                //Refresh all account
                banhji.source.loadAccounts();
            });
        },
        cancel                  : function(){
            this.dataSource.cancelChanges();
            this.dataSource.data([]);

            banhji.userManagement.removeMultiTask("account");
        },
        delete                  : function(){
            var self = this, obj = this.get("obj");
            this.set("showConfirm",false);

            if(obj.is_system!=="1"){
                this.deleteDS.query({
                    filter:[
                        { field:"account_id", value:obj.id },
                    ],
                    page:1,
                    pageSize:1
                }).then(function(){
                    var view = self.deleteDS.view();

                    if(view.length>0){
                        alert("Sorry, you can not delete it.");
                    }else{
                        var data = self.dataSource.get(obj.id);
                        self.dataSource.remove(data);
                        self.dataSource.sync();
                        self.dataSource.bind("requestEnd", function(e){
                            if(e.type==="destroy"){
                                //Refresh all account
                                banhji.source.loadAccounts();
                                window.history.back();
                            }
                        });
                    }
                });
            }
        },
        openConfirm             : function(){
            this.set("showConfirm", true);
        },
        closeConfirm            : function(){
            this.set("showConfirm", false);
        }
    });

    banhji.generalLedger =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "accounting_modules/general_ledger"),
        accountDS           : banhji.source.accountList,
        segmentItemDS       : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { account_id: 0, segments: [] },
        company             : banhji.institute,
        displayDate         : "",
        totalAmount         : 0,
        totalBalance        : 0,
        exArray             : [],
        pageLoad            : function(){
            this.search();
        },
        sorterChanges       : function(){
            var today = new Date(),
            sdate = "",
            edate = "",
            sorter = this.get("sorter");

            switch(sorter){
                case "today":
                    this.set("sdate", today);
                    this.set("edate", "");

                    break;
                case "week":
                    var first = today.getDate() - today.getDay(),
                    last = first + 6;

                    this.set("sdate", new Date(today.setDate(first)));
                    this.set("edate", new Date(today.setDate(last)));

                    break;
                case "month":
                    this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
                    this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

                    break;
                case "year":
                    this.set("sdate", new Date(today.getFullYear(), 0, 1));
                    this.set("edate", new Date(today.getFullYear(), 11, 31));

                    break;
                default:
                    this.set("sdate", "");
                    this.set("edate", "");
            }
        },
        segmentChanges      : function() {
            var dataArr = this.get("obj").segments,
            lastIndex = dataArr.length - 1,
            last = this.segmentItemDS.get(dataArr[lastIndex]);

            if(dataArr.length > 1) {
                for(var i = 0; i < dataArr.length - 1; i++) {
                    var current_index = dataArr[i],
                    current = this.segmentItemDS.get(current_index);

                    if(current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        search              : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";

            //Account
            if(obj.account_id>0){
                para.push({ field:"account_id", value:obj.account_id });
            }

            //Segment
            if(obj.segments.length>0){
                var segments = [];
                $.each(obj.segments, function(index, value){
                    segments.push(value);
                });
                para.push({ field:"segments", operator:"like_related_transaction", value:"%"+segments.toString()+"%" });
            }

            //Dates
            if(start && end){
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
                para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({ field:"issued_date", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter:para,
                sort:[
                    { field:"account_type_id", operator:"order_by_related_account", dir:"asc" },
                    { field:"number", operator:"order_by_related_account", dir:"asc" },
                    { field:"issued_date", operator:"order_by_related_transaction", dir:"asc" },
                    { field:"number", operator:"order_by_related_transaction", dir:"asc" }
                ]
            });
            this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response, balanceCal = 0;
                    self.exArray = [];
                    // self.set("totalAmount", kendo.toString(response.totalAmount, "c", banhji.locale));
                    // self.set("totalBalance", kendo.toString(response.totalBalance, "c", banhji.locale));

                    self.exArray.push({
                        cells: [
                            { value: self.company.name, textAlign: "center", colSpan: 6 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "General Ledger",bold: true, fontSize: 20, textAlign: "center", colSpan: 6 }
                        ]
                    });
                    if(self.displayDate){
                        self.exArray.push({
                            cells: [
                                { value: self.displayDate, textAlign: "center", colSpan: 6 }
                            ]
                        });
                    }
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 6 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Type", background: "#496cad", color: "#ffffff" },
                            { value: "Date", background: "#496cad", color: "#ffffff" },
                            { value: "Reference No", background: "#496cad", color: "#ffffff" },
                            { value: "Description", background: "#496cad", color: "#ffffff" },
                            { value: "Name", background: "#496cad", color: "#ffffff" },
                            { value: "Debit", background: "#496cad", color: "#ffffff" },
                            { value: "Credit", background: "#496cad", color: "#ffffff" },
                            { value: "Balance", background: "#496cad", color: "#ffffff" }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++){
                        self.exArray.push({
                            cells: [
                                { value: response.results[i].name, bold: true, },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: kendo.parseFloat(response.results[i].balance_forward), bold: true },
                            ]
                        });
                        var totalCr = 0, totalDr = 0;
                        balanceCal = response.results[i].balance_forward;
                        for(var j = 0; j < response.results[i].line.length; j++){
                            balanceCal += response.results[i].line[j].amount;
                            totalDr += response.results[i].line[j].dr;
                            totalCr += response.results[i].line[j].cr;
                            self.exArray.push({
                                cells: [
                                    { value: "    "+response.results[i].line[j].type },
                                    { value: kendo.toString(new Date(response.results[i].line[j].issued_date), "dd-MM-yyyy")  },
                                    { value: response.results[i].line[j].number },
                                    { value: response.results[i].line[j].memo },
                                    { value: response.results[i].line[j].contact },
                                    { value: kendo.parseFloat(response.results[i].line[j].dr)},
                                    { value: kendo.parseFloat(response.results[i].line[j].cr)},
                                    { value: kendo.parseFloat(balanceCal)}
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [
                                { value: "Total " + response.results[i].name, bold: true, },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: kendo.parseFloat(totalDr), bold: true, borderTop: { color: "#000000", size: 1 }  },
                                { value: kendo.parseFloat(totalCr), bold: true, borderTop: { color: "#000000", size: 1 }  },
                                { value: kendo.parseFloat(balanceCal), bold: true, borderTop: { color: "#000000", size: 1 }  },
                            ]
                        });
                        self.exArray.push({
                            cells: [
                                { value: "", colSpan: 7 }
                            ]
                        });
                    }
                    self.exArray.push({
                        cells: [
                            { value: "TOTAL", bold: true,fontSize: 16 },
                            { value: "" },
                            { value: "" },
                            { value: "" },
                            { value: "" },
                            { value: kendo.parseFloat(response.totalAmount), bold: true, fontSize: 16 },
                            { value: kendo.parseFloat(response.totalBalance), bold: true, fontSize: 16 },
                        ]
                    });
                }
            });
        },
        totalDr             : function() {
            var sum = 0;

            $.each(this.dataSource.data(), function(index, value) {
                $.each(value.line, function(ind, val) {
                    sum += kendo.parseFloat(val.dr);
                });
            });

            return sum;
        },
        totalCr             : function() {
            var sum = 0;

            $.each(this.dataSource.data(), function(index, value) {
                $.each(value.line, function(ind, val) {
                    sum += kendo.parseFloat(val.cr);
                });
            });

            return sum;
        },
        printGrid           : function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=990, height=900'),
                doc = win.document.open();
            var htmlStart =
                    '<!DOCTYPE html>' +
                    '<html>' +
                    '<head>' +
                    '<meta charset="utf-8" />' +
                    '<title></title>' +
                    '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                    '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<style>' +
                    'html { font: 11pt sans-serif; }' +
                    '.k-grid { border-top-width: 0; }' +
                    '.k-grid, .k-grid-content { height: auto !important; }' +
                    '.k-grid-content { overflow: visible !important; }' +
                    'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                    '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                    '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                    '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
                        '.inv1 .main-color {' +

                            '-webkit-print-color-adjust:exact; ' +
                        '} ' +
                        '.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
                        '-webkit-print-color-adjust:exact; color:#fff!important;}' +
                        '.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
                        '.inv1 .light-blue-td { ' +
                            'background-color: #c6d9f1!important;' +
                            'text-align: left;' +
                            'padding-left: 5px;' +
                            '-webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
                            'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
                        '}'+
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
                            ' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
                        '.journal_block1>.span2:first-child { ' +
                            'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span5:last-child {' +
                            'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.journal_block1>.span5 {' +
                            'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
                            'background-color: #1C2633!important;' +
                            'color: #fff!important; ' +
                            '-webkit-print-color-adjust:exact;' +
                        '}' +
                        '</style>' +
                    '</head>' +
                    '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
            var htmlEnd =
                    '</div></body>' +
                    '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function(){
                win.print();
                win.close();
            },2000);
        },
        ExportExcel         : function(){
            var workbook = new kendo.ooxml.Workbook({
              sheets: [
                {
                  columns: [
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true }
                  ],
                  title: "General Ledger",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
        }
    });
    banhji.generalLedgerBySegment =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "accounting_modules/general_ledger_by_segment"),
        segmentDS           : banhji.source.segmentDS,
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { segments: [] },
        company             : banhji.institute,
        displayDate         : "",
        totalAmount         : 0,
        totalBalance        : 0,
        pageLoad            : function(){
            this.search();
        },
        sorterChanges       : function(){
            var today = new Date(),
            sdate = "",
            edate = "",
            sorter = this.get("sorter");

            switch(sorter){
                case "today":
                    this.set("sdate", today);
                    this.set("edate", "");

                    break;
                case "week":
                    var first = today.getDate() - today.getDay(),
                    last = first + 6;

                    this.set("sdate", new Date(today.setDate(first)));
                    this.set("edate", new Date(today.setDate(last)));

                    break;
                case "month":
                    this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
                    this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

                    break;
                case "year":
                    this.set("sdate", new Date(today.getFullYear(), 0, 1));
                    this.set("edate", new Date(today.getFullYear(), 11, 31));

                    break;
                default:
                    this.set("sdate", "");
                    this.set("edate", "");
            }
        },
        search              : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";

            //Segments
            var segments = [];
            if(obj.segments.length>0){
                $.each(obj.segments, function(index, value){
                    $.each(banhji.source.segmentItemList, function(ind, val){
                        if(val.segment_id==value){
                            segments.push(val.id);
                        }
                    });
                });
                para.push({ field:"id", operator:"where_in_related_segmentitem", value: segments });
            }

            //Dates
            if(start && end){
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
                para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({ field:"issued_date", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter: para
            });
            var loaded = false;
            this.dataSource.bind("requestEnd", function(e){
                if(e.type==="read" && loaded==false){
                    loaded = true;

                    var response = e.response;
                    self.set("totalBalance", kendo.toString(response.totalBalance, "c2", banhji.locale));
                }
            });

            obj.set("segments", []);
        }
    });

    // Function
    banhji.cashTransaction =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        lineDS              : dataStore(apiUrl + "account_lines"),
        txnDS               : dataStore(apiUrl + "transactions"),
        numberDS            : dataStore(apiUrl + "transactions/number"),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "account_lines"),
        contactDS           : dataStore(apiUrl + "contacts"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        paymentMethodDS     : banhji.source.paymentMethodDS,
        currencyDS          : new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: { field:"status", value: 1 }
        }),
        accountDS           : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter:{ field:"account_type_id", value: 10 },
            sort: { field:"number", dir:"asc" }
        }),
        segmentItemDS       : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{
                logic: "or",
                filters: [
                    { field: "type", value: "Deposit" },
                    { field: "type", value: "Withdraw" },
                    { field: "type", value: "Transfer" }
                ]
            }
        }),
        types               : [
            {id: 'Deposit', name: 'Deposit'},
            {id: 'Withdraw', name: 'Withdraw'},
            {id: 'Transfer', name: 'Transfer'}
        ],
        confirmMessage      : banhji.source.confirmMessage,
        dateUnitList        : banhji.source.dateUnitList,
        monthOptionList     : banhji.source.monthOptionList,
        monthList           : banhji.source.monthList,
        weekDayList         : banhji.source.weekDayList,
        dayList             : banhji.source.dayList,
        fileMan             : banhji.fileManagement,
        showMonthOption     : false,
        showMonth           : false,
        showWeek            : false,
        showDay             : false,
        obj                 : null,
        isEdit              : false,
        saveDraft           : false,
        saveClose           : false,
        saveDraftPrint      : false,
        savePrint           : false,
        saveRecurring       : false,
        showConfirm         : false,
        notDuplicateNumber  : true,
        showRef             : true,
        showName            : false,
        showSegment         : false,
        recurring           : "",
        recurring_validate  : false,
        total               : 0,
        original_total      : 0,
        fromToTop           : "TO",
        fromToBottom        : "FROM",
        uer_id              : banhji.source.user_id,
        pageLoad            : function(id){
            if(id){
                this.set("isEdit", true);
                this.loadObj(id);
            }else{
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                }
            }
        },
        //Upload
        onSelect            : function(e){
            // Array with information about the uploaded files
            var self = this,
            files = e.files,
            obj = this.get("obj");

            // Check the extension of each file and abort the upload if it is not .jpg
            $.each(files, function(index, value){
                if (value.extension.toLowerCase() === ".jpg"
                    || value.extension.toLowerCase() === ".jpeg"
                    || value.extension.toLowerCase() === ".tiff"
                    || value.extension.toLowerCase() === ".png"
                    || value.extension.toLowerCase() === ".gif"
                    || value.extension.toLowerCase() === ".pdf"){

                    var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

                    self.attachmentDS.add({
                        user_id         : self.get("user_id"),
                        transaction_id  : obj.id,
                        type            : "Transaction",
                        name            : value.name,
                        description     : "",
                        key             : key,
                        url             : banhji.s3 + key,
                        size            : value.size,
                        created_at      : new Date(),

                        file            : value.rawFile
                    });
                }else{
                    alert("This type of file is not allowed to attach.");
                }
            });
        },
        onRemove            : function(e){
            // Array with information about the uploaded files
            var self = this, files = e.files;
            $.each(this.attachmentDS.data(), function(index, value){
                if(value.name==files[0].name){
                    self.attachmentDS.remove(value);

                    return false;
                }
            });
        },
        removeFile          : function(e){
            var data = e.data;

            if (confirm("Are you sure, you want to delete it?")) {
                this.attachmentDS.remove(data);
            }
        },
        uploadFile          : function(){
            var self = this;

            $.each(this.attachmentDS.data(), function(index, value){
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

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e){
                if(e.type=="destroy"){
                    if(saved==false){
                        saved = true;

                        var response = e.response.results;
                        $.each(response, function(index, value){
                            var paramz = {
                                //Bucket: 'STRING_VALUE', /* required */
                                Delete: { /* required */
                                    Objects: [ /* required */
                                        {
                                            Key: value.data.key /* required */
                                        }
                                      /* more items */
                                    ]
                                }
                            };
                            bucket.deleteObjects(paramz, function(err, data) {
                                //console.log(err, data);
                            });
                        });
                    }
                }
            });

            //Clear upload files
            $(".k-upload-files").remove();
        },
        //Currency Rate
        setRate             : function(){
            var obj = this.get("obj"),
            rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

            obj.set("rate", rate);

            $.each(this.lineDS.data(), function(index, value){
                value.set("rate", rate);
                value.set("locale", obj.locale);
            });
        },
        //Segment
        transactionSegmentChanges   : function() {
            var dataArr = this.get("obj").segments,
            lastIndex = dataArr.length - 1,
            last = this.segmentItemDS.get(dataArr[lastIndex]);

            if(dataArr.length > 1) {
                for(var i = 0; i < dataArr.length - 1; i++) {
                    var current_index = dataArr[i],
                    current = this.segmentItemDS.get(current_index);

                    if(current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        segmentChanges      : function(e) {
            var dataArr = e.data.segments,
            lastIndex = dataArr.length - 1,
            last = this.segmentItemDS.get(dataArr[lastIndex]);

            if(dataArr.length > 1) {
                for(var i = 0; i < dataArr.length - 1; i++) {
                    var current_index = dataArr[i],
                    current = this.segmentItemDS.get(current_index);

                    if(current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        //Number
        checkExistingNumber     : function(){
            var self = this, para = [],
            obj = this.get("obj");

            if(obj.number!==""){

                if(obj.isNew()==false){
                    para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
                }

                para.push({ field:"number", value: obj.number });
                para.push({ field:"type", value: obj.type });

                this.txnDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 1
                }).then(function(e){
                    var view = self.txnDS.view();

                    if(view.length>0){
                        self.set("notDuplicateNumber", false);
                    }else{
                        self.set("notDuplicateNumber", true);
                    }
                });
            }
        },
        generateNumber      : function(){
            var self = this, obj = this.get("obj"),
                issueDate = new Date(obj.issued_date),
                startDate = new Date(obj.issued_date),
                endDate = new Date(obj.issued_date);

            this.set("notDuplicateNumber", true);

            startDate.setDate(1);
            startDate.setMonth(0);//Set to January
            endDate.setDate(31);
            endDate.setMonth(11);//Set to November

            this.numberDS.query({
                filter:[
                    { field:"type", value:obj.type },
                    { field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
                    { field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
                ]
            }).then(function(){
                var view = self.numberDS.view(),
                number = 0, str = "";

                if(view.length>0){
                    number = view[0].number.match(/\d+/g).map(Number);
                }

                number++;
                str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

                obj.set("number", str);
            });
        },
        //Obj
        loadObj             : function(id){
            var self = this, para = [];

            para.push({ field:"id", value: id });

            if(this.get("recurring")=="use"){
                this.set("recurring","");
                this.addEmpty();
                this.loadRecurring(id);
            }else{
                if(this.get("recurring")=="edit"){
                    this.set("recurring","");
                    para.push({ field:"is_recurring", value: 1 });
                }

                this.dataSource.query({
                    filter: para,
                    page: 1,
                    pageSize: 1
                }).then(function(e){
                    var view = self.dataSource.view();

                    if(view.length>0){
                        self.set("obj", view[0]);
                        self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));

                        self.lineDS.filter({ field: "transaction_id", value: id });
                        self.journalLineDS.filter({ field: "transaction_id", value: id });
                        self.attachmentDS.filter({ field: "transaction_id", value: id });

                        self.typeChanges();
                    }
                });
            }
        },
        addEmpty            : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.journalLineDS.data([]);
            this.attachmentDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);

            this.dataSource.insert(0, {
                transaction_template_id : 0,
                recurring_id        : "",
                account_id          : "",
                user_id             : this.get("user_id"),
                type                : "Deposit", //required
                number              : "",
                amount              : 0,
                rate                : 1,
                locale              : banhji.locale,
                issued_date         : new Date(),
                memo                : "",
                memo2               : "",
                status              : 0,
                progress            : "",
                segments            : [],
                is_journal          : 1,
                //Recurring
                recurring_name      : "",
                start_date          : new Date(),
                frequency           : "Daily",
                month_option        : "Day",
                interval            : 1,
                day                 : 1,
                week                : 0,
                month               : 0,
                is_recurring        : 0
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);

            this.setRate();
            this.addRow();
            this.typeChanges();
            this.generateNumber();
        },
        addRow              : function(){
            var obj = this.get("obj");

            this.lineDS.add({
                transaction_id      : obj.id,
                payment_method_id   : 0,
                account_id          : "",
                contact_id          : "",
                description         : "",
                reference_no        : "",
                segments            : [],
                amount              : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                reference_no        : ""
            });
        },
        remove              : function(e){
            var data = e.data;

            if(this.lineDS.total()>1){
                this.lineDS.remove(data);
                this.changes();
            }
        },
        changes             : function(){
            var obj = this.get("obj"),
            sum = 0;

            $.each(this.lineDS.data(), function(index, value) {
                value.set("rate", obj.rate);

                sum += value.amount;
            });

            this.set("total", kendo.toString(sum, "c2", obj.locale));
            obj.set("amount", sum);
        },
        typeChanges         : function(){
            var obj = this.get("obj");

            this.txnTemplateDS.filter({ field:"type", value:obj.type });

            switch(obj.type) {
                case "Withdraw":
                    this.set("fromToTop", "FROM");
                    this.set("fromToBottom", "TO");
                    break;
                default:
                    this.set("fromToTop", "TO");
                    this.set("fromToBottom", "FROM");
            }
        },
        objSync             : function(){
            var dfd = $.Deferred();

            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.response){
                    dfd.resolve(e.response.results);
                }
            });
            this.dataSource.bind("error", function(e){
                dfd.reject(e.errorThrown);
            });

            return dfd;
        },
        save                : function(){
            var self = this, obj = this.get("obj");
            obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

            //Recurring
            if(this.get("saveRecurring")){
                this.set("saveRecurring", false);

                obj.set("number", "");
                obj.set("is_recurring", 1);
            }

            //Save Draft
            if(this.get("saveDraft")  || this.get("saveDraftPrint")){
                obj.set("status", 4); //In progress
                obj.set("progress", "Draft");
                obj.set("is_journal", 0);//No Journal
            }

            //Mode
            if(obj.isNew()==false){
                //Use draft
                if(obj.status==4){
                    obj.set("status", 0);//Open
                    obj.set("progress", "");
                    obj.set("is_journal", 1);//Add Journal
                }
            }

            //Save Obj
            this.objSync()
            .then(function(data){ //Success
                if(self.get("isEdit")==false){
                    //Item line
                    $.each(self.lineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //Attachment
                    $.each(self.attachmentDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });
                }

                //Journal
                if(data[0].is_recurring==0 && data[0].is_journal==1){
                    self.addJournal(data[0].id);
                }

                self.lineDS.sync();

                return data;
            }, function(reason) { //Error
                $("#ntf1").data("kendoNotification").error(reason);
            }).then(function(result){
                $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

                if(self.get("saveClose")){
                    //Save Close
                    self.set("saveClose", false);
                    self.cancel();
                    window.history.back();
                }else if(self.get("savePrint") || self.get("saveDraftPrint")){
                    //Save Print
                    self.set("savePrint", false);
                    self.set("saveDraftPrint", false);

                    self.cancel();
                    if(result[0].transaction_template_id>0){
                        banhji.router.navigate("/invoice_form/"+result[0].id);
                    }
                }else{
                    //Save New
                    self.addEmpty();
                }
            });
        },
        clear               : function(){
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();
            this.attachmentDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.attachmentDS.data([]);

            banhji.userManagement.removeMultiTask("cash_transaction");
        },
        cancel              : function(){
            this.clear();
            history.back();
        },
        delete              : function(){
            var self = this, obj = this.get("obj");
            this.set("showConfirm",false);

            this.txnDS.query({
                filter:[
                    { field:"reference_id", value:obj.id }
                ],
                page:1,
                pageSize:1
            }).then(function(){
                var view = self.txnDS.view();

                if(view.length>0){
                    alert("Sorry, you can not delete it.");
                }else{
                    obj.set("deleted", 1);
                    self.dataSource.sync();
                    self.dataSource.bind("requestEnd", function(e){
                        if(e.type==="update"){
                            window.history.back();
                        }
                    });
                }
            });
        },
        openConfirm         : function(){
            this.set("showConfirm", true);
        },
        closeConfirm        : function(){
            this.set("showConfirm", false);
        },
        //Journal
        addJournal          : function(transaction_id){
            var self = this,
                obj = this.get("obj"),
                raw = "", entries = {},
                dr = 0, cr = 0;

            //Edit Mode
            if(obj.isNew()==false){
                //Delete previous journal
                $.each(this.journalLineDS.data(), function(index, value){
                    value.set("deleted", 1);
                });
            }

            //Add Journal
            var objAccountID = kendo.parseInt(obj.account_id);
            if(objAccountID>0){
                if(obj.type=="Withdraw"){
                    raw = "cr"+objAccountID;
                    cr = obj.amount;
                }else{
                    raw = "dr"+objAccountID;
                    dr = obj.amount;
                }

                if(entries[raw]===undefined){
                    entries[raw] = {
                        transaction_id      : transaction_id,
                        account_id          : objAccountID,
                        contact_id          : obj.contact_id,
                        description         : obj.memo,
                        reference_no        : obj.reference_no,
                        segments            : obj.segments,
                        dr                  : dr,
                        cr                  : cr,
                        rate                : obj.rate,
                        locale              : obj.locale
                    };
                }else{
                    entries[raw].dr += dr;
                    entries[raw].cr += cr;
                }
            }

            $.each(this.lineDS.data(), function(index, value){
                dr = 0; cr = 0;
                if(obj.type=="Withdraw"){
                    raw = "dr"+value.account_id;
                    dr = value.amount;
                }else{
                    raw = "cr"+value.account_id;
                    cr = value.amount;
                }

                if(entries[raw]===undefined){
                    entries[raw] = {
                        transaction_id      : transaction_id,
                        account_id          : value.account_id,
                        contact_id          : value.contact_id,
                        description         : value.description,
                        reference_no        : value.reference_no,
                        segments            : value.segments,
                        dr                  : dr,
                        cr                  : cr,
                        rate                : obj.rate,
                        locale              : obj.locale
                    };
                }else{
                    entries[raw].dr += dr;
                    entries[raw].cr += cr;
                }
            });

            //Add to journal entry
            if(!jQuery.isEmptyObject(entries)){
                $.each(entries, function(index, value){
                    self.journalLineDS.add(value);
                });
            }

            this.journalLineDS.sync();
        },
        //Recurring
        loadRecurring       : function(id){
            var self = this;

            this.recurringDS.query({
                filter:[
                    { field:"id", value:id },
                    { field:"is_recurring", value:1 }
                ],
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.recurringDS.view(),
                obj = self.get("obj");

                obj.set("recurring_id", id);
                obj.set("type", view[0].type);
                obj.set("locale", view[0].locale);
                obj.set("account_id", view[0].account_id);
                obj.set("segments", view[0].segments);
                obj.set("memo", view[0].memo);
                obj.set("memo2", view[0].memo2);
            });

            this.recurringLineDS.query({
                filter: { field:"transaction_id", value:id },
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.recurringLineDS.view();
                self.lineDS.data([]);

                $.each(view, function(index, value){
                    self.lineDS.add({
                        transaction_id      : 0,
                        payment_method_id   : value.payment_method_id,
                        account_id          : value.account_id,
                        contact_id          : value.contact_id,
                        description         : value.description,
                        reference_no        : value.reference_no,
                        segments            : value.segments,
                        amount              : value.amount,
                        rate                : value.rate,
                        locale              : value.locale
                    });
                });

                self.changes();
            });
        },
        frequencyChanges    : function(){
            var obj = this.get("obj");

            switch(obj.frequency) {
                case "Daily":
                    this.set("showMonthOption", false);
                    this.set("showMonth", false);
                    this.set("showWeek", false);
                    this.set("showDay", false);

                    break;
                case "Weekly":
                    this.set("showMonthOption", false);
                    this.set("showMonth", false);
                    this.set("showWeek", true);
                    this.set("showDay", false);

                    break;
                case "Monthly":
                    this.set("showMonthOption", true);
                    this.set("showMonth", false);
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                case "Annually":
                    this.set("showMonthOption", false);
                    this.set("showMonth", true);
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                default:
                    //Default here..
            }
        },
        monthOptionChanges  : function(){
            var obj = this.get("obj");

            switch(obj.month_option) {
                case "Day":
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                default:
                    this.set("showWeek", true);
                    this.set("showDay", false);
            }
        },
        recurringSync       : function(){
            var dfd = $.Deferred();

            this.recurringDS.sync();
            this.recurringDS.bind("requestEnd", function(e){
                if(e.response){
                    dfd.resolve(e.response.results);
                }
            });
            this.recurringDS.bind("error", function(e){
                dfd.reject(e.errorThrown);
            });

            return dfd;
        }
    });
    banhji.cashAdvance =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        lineDS              : dataStore(apiUrl + "account_lines"),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        txnDS               : dataStore(apiUrl + "transactions"),
        numberDS            : dataStore(apiUrl + "transactions/number"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "account_lines"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        currencyDS          : new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: { field:"status", value: 1 }
        }),
        contactDS           : banhji.source.employeeDS,
        jobDS               : new kendo.data.DataSource({
            data: banhji.source.jobList,
            sort: { field: "name", dir: "asc" }
        }),
        segmentItemDS       : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        paymentMethodDS     : banhji.source.paymentMethodDS,
        accountDS           : banhji.source.accountList,
        cashAccountDS       : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: {
                logic: "or",
                filters: [
                    { field:"account_type_id", value: 10 },//Cash Account
                    { field:"account_type_id", value: 34 }//Retained Earning
                ]
            },
            sort:[
                { field:"account_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
            ]
        }),
        advAccountDS        : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter:{ field:"account_type_id", value: 11 },
            sort: { field:"number", dir:"asc" }
        }),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter: { field: "type", value:"Cash_Advance" }
        }),
        amtDueColor         : banhji.source.amtDueColor,
        confirmMessage      : banhji.source.confirmMessage,
        dateUnitList       : banhji.source.dateUnitList,
        monthOptionList     : banhji.source.monthOptionList,
        monthList           : banhji.source.monthList,
        weekDayList         : banhji.source.weekDayList,
        dayList             : banhji.source.dayList,
        showMonthOption     : false,
        showMonth           : false,
        showWeek            : false,
        showDay             : false,
        obj                 : null,
        isEdit              : false,
        saveDraft           : false,
        saveClose           : false,
        saveDraftPrint      : false,
        savePrint           : false,
        saveRecurring       : false,
        showConfirm         : false,
        statusSrc           : "",
        recurring           : "",
        recurring_validate  : false,
        showRef             : true,
        showName            : false,
        showSegment         : false,
        total               : 0,
        original_total      : 0,
        notDuplicateNumber  : true,
        user_id             : banhji.source.user_id,
        pageLoad            : function(id){
            if(id){
                this.set("isEdit", true);
                this.loadObj(id);
            }else{
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                }
            }
        },
        //Upload
        onSelect            : function(e){
            // Array with information about the uploaded files
            var self = this,
            files = e.files,
            obj = this.get("obj");

            // Check the extension of each file and abort the upload if it is not .jpg
            $.each(files, function(index, value){
                if (value.extension.toLowerCase() === ".jpg"
                    || value.extension.toLowerCase() === ".jpeg"
                    || value.extension.toLowerCase() === ".tiff"
                    || value.extension.toLowerCase() === ".png"
                    || value.extension.toLowerCase() === ".gif"
                    || value.extension.toLowerCase() === ".pdf"){

                    var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

                    self.attachmentDS.add({
                        user_id         : self.get("user_id"),
                        transaction_id  : obj.id,
                        type            : "Transaction",
                        name            : value.name,
                        description     : "",
                        key             : key,
                        url             : banhji.s3 + key,
                        size            : value.size,
                        created_at      : new Date(),

                        file            : value.rawFile
                    });
                }else{
                    alert("This type of file is not allowed to attach.");
                }
            });
        },
        removeFile          : function(e){
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
            }
        },
        uploadFile          : function(){
            $.each(this.attachmentDS.data(), function(index, value){
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

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e){
                //Delete File
                if(e.type=="destroy"){
                    if(saved==false && e.response){
                        saved = true;

                        var response = e.response.results;
                        $.each(response, function(index, value){
                            var params = {
                                //Bucket: 'STRING_VALUE', /* required */
                                Delete: { /* required */
                                    Objects: [ /* required */
                                        {
                                            Key: value.data.key /* required */
                                        }
                                      /* more items */
                                    ]
                                }
                            };
                            bucket.deleteObjects(params, function(err, data) {
                                //console.log(err, data);
                            });
                        });
                    }
                }
            });
        },
        //Contact
        contactChanges      : function(){
            var obj = this.get("obj");

            if(obj.contact){
                var contact = obj.contact;

                obj.set("contact_id", contact.id);
            }
        },
        //Currency Rate
        setRate             : function(){
            var obj = this.get("obj"),
            rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

            obj.set("rate", rate);

            $.each(this.lineDS.data(), function(index, value){
                value.set("rate", rate);
                value.set("locale", obj.locale);
            });
        },
        //Segment
        segmentChanges      : function(e) {
            var dataArr = e.data.segments;
            var lastIndex = dataArr.length - 1;
            if(dataArr.length > 1) {
                for(var i = 0; i < dataArr.length - 1; i++) {
                    var current = this.segmentItemDS.get(dataArr[i]);
                    var last = this.segmentItemDS.get(dataArr[lastIndex]);
                    if(current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        transactionSegmentChanges   : function() {
            dataArr = this.get("obj").segments,
            lastIndex = dataArr.length - 1;
            if(dataArr.length > 1) {
                for(var i = 0; i < dataArr.length - 1; i++) {
                    var current = this.segmentItemDS.get(dataArr[i]);
                    var last = this.segmentItemDS.get(dataArr[lastIndex]);
                    if(current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        //Number
        checkExistingNumber     : function(){
            var self = this, para = [],
            obj = this.get("obj");

            if(obj.number!==""){

                if(obj.isNew()==false){
                    para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
                }

                para.push({ field:"number", value: obj.number });
                para.push({ field:"type", value: obj.type });

                this.txnDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 1
                }).then(function(e){
                    var view = self.txnDS.view();

                    if(view.length>0){
                        self.set("notDuplicateNumber", false);
                    }else{
                        self.set("notDuplicateNumber", true);
                    }
                });
            }
        },
        generateNumber      : function(){
            var self = this, obj = this.get("obj"),
                issueDate = new Date(obj.issued_date),
                startDate = new Date(obj.issued_date),
                endDate = new Date(obj.issued_date);

            this.set("notDuplicateNumber", true);

            startDate.setDate(1);
            startDate.setMonth(0);//Set to January
            endDate.setDate(31);
            endDate.setMonth(11);//Set to November

            this.numberDS.query({
                filter:[
                    { field:"type", value:obj.type },
                    { field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
                    { field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
                ]
            }).then(function(){
                var view = self.numberDS.view(),
                number = 0, str = "";

                if(view.length>0){
                    number = view[0].number.match(/\d+/g).map(Number);
                }

                number++;
                str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

                obj.set("number", str);
            });
        },
        //Obj
        loadObj             : function(id){
            var self = this, para = [];

            para.push({ field:"id", value: id });

            if(this.get("recurring")=="use"){
                this.set("recurring","");
                this.addEmpty();
                this.loadRecurring(id);
            }else{
                if(this.get("recurring")=="edit"){
                    this.set("recurring","");
                    para.push({ field:"is_recurring", value: 1 });
                }

                this.dataSource.query({
                    filter: para,
                    page: 1,
                    pageSize: 1
                }).then(function(e){
                    var view = self.dataSource.view();

                    self.set("obj", view[0]);

                    self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));

                    self.lineDS.filter({ field: "transaction_id", value: id });
                    self.journalLineDS.filter({ field: "transaction_id", value: id });
                    self.attachmentDS.filter({ field: "transaction_id", value: id });
                });
            }
        },
        addEmpty            : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.journalLineDS.data([]);
            this.attachmentDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);

            this.dataSource.insert(0, {
                recurring_id        : "",
                account_id          : 1,
                payment_method_id   : 1,
                contact_id          : "",
                employee_id         : "",
                user_id             : this.get("user_id"),
                type                : "Cash_Advance", //required
                number              : "",
                amount              : 0,
                rate                : 1,
                locale              : banhji.locale,
                issued_date         : new Date(),
                due_date            : new Date(),
                memo                : "",
                memo2               : "",
                status              : 0,
                progress            : "",
                segments            : [],
                is_journal          : 1,
                //Recurring
                recurring_name      : "",
                start_date          : new Date(),
                frequency           : "Daily",
                month_option        : "Day",
                interval            : 1,
                day                 : 1,
                week                : 0,
                month               : 0,
                is_recurring        : 0
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);

            this.generateNumber();
            this.setRate();
            this.addRow();
        },
        addRow              : function(){
            var obj = this.get("obj");
            this.lineDS.add({
                transaction_id      : obj.id,
                account_id          : "",
                description         : "",
                reference_no        : "",
                segments            : [],
                amount              : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                reference_no        : ""
            });
        },
        remove              : function(e){
            var data = e.data;

            if(this.lineDS.total()>1){
                this.lineDS.remove(data);
                this.changes();
            }
        },
        changes             : function(){
            var obj = this.get("obj");

            if(this.lineDS.total()>0){
                var sum = 0;

                $.each(this.lineDS.data(), function(index, value) {
                    value.set("rate", obj.rate);

                    sum += value.amount;
                });

                this.set("total", kendo.toString(sum, "c0", obj.locale));
                obj.set("amount", sum);
            }else{
                this.set("total", 0);
                obj.set("amount", 0);
            }
        },
        objSync             : function(){
            var dfd = $.Deferred();

            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.response){
                    dfd.resolve(e.response.results);
                }
            });
            this.dataSource.bind("error", function(e){
                dfd.reject(e.errorThrown);
            });

            return dfd;
        },
        save                : function(){
            var self = this, obj = this.get("obj");
            obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

            //Recurring
            if(this.get("saveRecurring")){
                this.set("saveRecurring", false);

                obj.set("number", "");
                obj.set("is_recurring", 1);
            }

            //Save Draft
            if(this.get("saveDraft") || this.get("saveDraftPrint")){
                obj.set("status", 4); //In progress
                obj.set("progress", "Draft");
                obj.set("is_journal", 0);//No Journal
            }

            //Mode
            if(obj.isNew()==false){
                //Use draft
                if(obj.status==4){
                    obj.set("status", 0);//Open
                    obj.set("progress", "");
                    obj.set("is_journal", 1);//Add Journal
                }
            }

            //Save Obj
            this.objSync()
            .then(function(data){ //Success
                if(self.get("isEdit")==false){
                    //Item line
                    $.each(self.lineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //Attachment
                    $.each(self.attachmentDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });
                }

                //Journal
                if(data[0].is_recurring==0 && data[0].is_journal==1){
                    self.addJournal(data[0].id);
                }

                self.lineDS.sync();
                self.uploadFile();

                return data;
            }, function(reason) { //Error
                $("#ntf1").data("kendoNotification").error(reason);
            }).then(function(result){
                $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

                if(self.get("saveClose")){
                    //Save Close
                    self.set("saveClose", false);
                    self.cancel();
                    window.history.back();
                }else if(self.get("savePrint") || self.get("saveDraftPrint")){
                    //Save Print
                    self.set("savePrint", false);
                    self.set("saveDraftPrint", false);

                    self.cancel();
                    if(result[0].transaction_template_id>0){
                        banhji.router.navigate("/invoice_form/"+result[0].id);
                    }
                }else{
                    //Save New
                    self.addEmpty();
                }
            });
        },
        cancel              : function(){
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();
            this.attachmentDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.attachmentDS.data([]);

            banhji.userManagement.removeMultiTask("expense");
        },
        delete              : function(){
            var self = this, obj = this.get("obj");
            this.set("showConfirm",false);

            this.txnDS.query({
                filter:[
                    { field:"reference_id", value:obj.id },
                ],
                page:1,
                pageSize:1
            }).then(function(){
                var view = self.txnDS.view();

                if(view.length>0){
                    alert("Sorry, you can not delete it.");
                }else{
                    obj.set("deleted", 1);

                    self.dataSource.sync();
                    self.dataSource.bind("requestEnd", function(e){
                        if(e.type==="update"){
                            window.history.back();
                        }
                    });
                }
            });
        },
        openConfirm         : function(){
            this.set("showConfirm", true);
        },
        closeConfirm        : function(){
            this.set("showConfirm", false);
        },
        //Journal
        addJournal          : function(transaction_id){
            var self = this, obj = this.get("obj");

            //Edit Mode
            if(obj.isNew()==false){
                //Delete previous journal
                $.each(this.journalLineDS.data(), function(index, value){
                    value.set("deleted", 1);
                });
            }

            $.each(self.lineDS.data(), function(index, value){
                //Add Cash Advance Account on Dr
                self.journalLineDS.add({
                    transaction_id      : transaction_id,
                    account_id          : value.account_id,
                    description         : value.description,
                    reference_no        : value.reference_no,
                    segments            : value.segments,
                    dr                  : value.amount,
                    cr                  : 0,
                    rate                : value.rate,
                    locale              : value.locale
                });
            });

            //Add Cash Account on Cr
            this.journalLineDS.add({
                transaction_id      : transaction_id,
                account_id          : obj.account_id,
                description         : obj.memo,
                reference_no        : "",
                segments            : obj.segments,
                dr                  : 0,
                cr                  : obj.amount,
                rate                : obj.rate,
                locale              : obj.locale
            });

            this.journalLineDS.sync();
        },
        //Recurring
        loadRecurring       : function(id){
            var self = this;

            this.recurringDS.query({
                filter:[
                    { field:"id", value:id },
                    { field:"is_recurring", value:1 }
                ],
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.recurringDS.view(),
                obj = self.get("obj");

                obj.set("recurring_id", id);
                obj.set("contact_id", view[0].contact_id);
                obj.set("locale", view[0].locale);
                obj.set("payment_method_id", view[0].payment_method_id);
                obj.set("account_id", view[0].account_id);
                obj.set("segments", view[0].segments);
                obj.set("memo", view[0].memo);
                obj.set("contact", view[0].contact);
            });

            this.recurringLineDS.query({
                filter: { field:"transaction_id", value:id },
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.recurringLineDS.view();
                self.lineDS.data([]);

                $.each(view, function(index, value){
                    self.lineDS.add({
                        transaction_id      : 0,
                        account_id          : value.account_id,
                        description         : value.description,
                        reference_no        : value.reference_no,
                        segments            : value.segments,
                        amount              : value.amount,
                        rate                : value.rate,
                        locale              : value.locale
                    });
                });

                self.changes();
            });
        },
        frequencyChanges    : function(){
            var obj = this.get("obj");

            switch(obj.frequency) {
                case "Daily":
                    this.set("showMonthOption", false);
                    this.set("showMonth", false);
                    this.set("showWeek", false);
                    this.set("showDay", false);

                    break;
                case "Weekly":
                    this.set("showMonthOption", false);
                    this.set("showMonth", false);
                    this.set("showWeek", true);
                    this.set("showDay", false);

                    break;
                case "Monthly":
                    this.set("showMonthOption", true);
                    this.set("showMonth", false);
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                case "Annually":
                    this.set("showMonthOption", false);
                    this.set("showMonth", true);
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                default:
                    //Default here..
            }
        },
        monthOptionChanges  : function(){
            var obj = this.get("obj");

            switch(obj.month_option) {
                case "Day":
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                default:
                    this.set("showWeek", true);
                    this.set("showDay", false);
            }
        },
        recurringSync       : function(){
            var dfd = $.Deferred();

            this.recurringDS.sync();
            this.recurringDS.bind("requestEnd", function(e){
                if(e.response){
                    dfd.resolve(e.response.results);
                }
            });
            this.recurringDS.bind("error", function(e){
                dfd.reject(e.errorThrown);
            });

            return dfd;
        }
    });
    banhji.expense =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        lineDS              : dataStore(apiUrl + "account_lines"),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        txnDS               : dataStore(apiUrl + "transactions"),
        numberDS            : dataStore(apiUrl + "transactions/number"),
        referenceDS         : dataStore(apiUrl + "transactions"),
        referenceLineDS     : dataStore(apiUrl + "account_lines"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "account_lines"),
        invoiceDS           : dataStore(apiUrl + "account_lines"),
        currencyDS          : new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: { field:"status", value: 1 }
        }),
        contactDS           : banhji.source.employeeDS,
        jobDS               : new kendo.data.DataSource({
            data: banhji.source.jobList,
            sort: { field: "name", dir: "asc" }
        }),
        segmentItemDS       : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        taxItemDS           : new kendo.data.DataSource({
            data: banhji.source.taxList,
            sort: [
                { field: "tax_type_id", dir: "asc" },
                { field: "name", dir: "asc" }
            ]
        }),
        supplierDS          : banhji.source.supplierDS,
        accountDS           : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: {
                logic: "or",
                filters: [
                    { field: "account_type_id", value: 11 },//Cash Advance
                    { field: "account_type_id", value: 16 },//Fixed Asset
                    { field: "account_type_id", value: 17 },
                    { field: "account_type_id", value: 18 },
                    { field: "account_type_id", value: 19 },
                    { field: "account_type_id", value: 20 },
                    { field: "account_type_id", value: 21 },
                    { field: "account_type_id", value: 22 },
                    { field: "account_type_id", value: 36 },//Expense
                    { field: "account_type_id", value: 37 },
                    { field: "account_type_id", value: 38 },
                    { field: "account_type_id", value: 40 },
                    { field: "account_type_id", value: 41 },
                    { field: "account_type_id", value: 42 },
                    { field: "account_type_id", value: 43 },
                    { field: "account_type_id", value: 39 }//Other Revenue
                ]
            },
            sort: { field:"number", dir:"asc" }
        }),
        cashAccountDS       : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter:{ field:"account_type_id", value: 10 },
            sort: { field:"number", dir:"asc" }
        }),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{
                logic: "or",
                filters: [
                    { field: "type", value: "Direct_Expense" },
                    { field: "type", value: "Reimbursement" },
                    { field: "type", value: "Advance_Settlement" },
                    { field: "type", value: "Cash_Payment"},
                    { field: "status", value: 2  }
                ]
            }
        }),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        amtDueColor         : banhji.source.amtDueColor,
        confirmMessage      : banhji.source.confirmMessage,
        dateUnitList       : banhji.source.dateUnitList,
        monthOptionList     : banhji.source.monthOptionList,
        monthList           : banhji.source.monthList,
        weekDayList         : banhji.source.weekDayList,
        dayList             : banhji.source.dayList,
        showMonthOption     : false,
        showMonth           : false,
        showWeek            : false,
        showDay             : false,
        obj                 : null,
        isEdit              : false,
        saveDraft           : false,
        saveClose           : false,
        saveDraftPrint      : false,
        savePrint           : false,
        saveRecurring       : false,
        showConfirm         : false,
        statusSrc           : "",
        recurring           : "",
        recurring_validate  : false,
        isExistingInvoice   : false,
        showJob             : false,
        showSegment         : false,
        showCashAdvance     : false,
        notDuplicateNumber  : true,
        sub_total           : 0,
        tax                 : 0,
        total               : 0,
        credit              : 0,
        remain              : 0,
        user_id             : banhji.source.user_id,
        pageLoad            : function(id){
            if(id){
                this.set("isEdit", true);
                this.loadObj(id);
            }else{
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                }
            }
        },
        //Upload
        onSelect            : function(e){
            // Array with information about the uploaded files
            var self = this,
            files = e.files,
            obj = this.get("obj");

            // Check the extension of each file and abort the upload if it is not .jpg
            $.each(files, function(index, value){
                if (value.extension.toLowerCase() === ".jpg"
                    || value.extension.toLowerCase() === ".jpeg"
                    || value.extension.toLowerCase() === ".tiff"
                    || value.extension.toLowerCase() === ".png"
                    || value.extension.toLowerCase() === ".gif"
                    || value.extension.toLowerCase() === ".pdf"){

                    var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

                    self.attachmentDS.add({
                        user_id         : self.get("user_id"),
                        transaction_id  : obj.id,
                        type            : "Transaction",
                        name            : value.name,
                        description     : "",
                        key             : key,
                        url             : banhji.s3 + key,
                        size            : value.size,
                        created_at      : new Date(),

                        file            : value.rawFile
                    });
                }else{
                    alert("This type of file is not allowed to attach.");
                }
            });
        },
        removeFile          : function(e){
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
            }
        },
        uploadFile          : function(){
            $.each(this.attachmentDS.data(), function(index, value){
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

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e){
                //Delete File
                if(e.type=="destroy"){
                    if(saved==false && e.response){
                        saved = true;

                        var response = e.response.results;
                        $.each(response, function(index, value){
                            var params = {
                                //Bucket: 'STRING_VALUE', /* required */
                                Delete: { /* required */
                                    Objects: [ /* required */
                                        {
                                            Key: value.data.key /* required */
                                        }
                                      /* more items */
                                    ]
                                }
                            };
                            bucket.deleteObjects(params, function(err, data) {
                                //console.log(err, data);
                            });
                        });
                    }
                }
            });
        },
        //Currency Rate
        setRate             : function(){
            var obj = this.get("obj"),
            rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

            obj.set("rate", rate);

            $.each(this.lineDS.data(), function(index, value){
                value.set("rate", rate);
                value.set("locale", obj.locale);
            });
        },
        //Contact
        setContact          : function(contact){
            var obj = this.get("obj");

            obj.set("employee", contact);
            this.employeeChanges();
        },
        contactChanges      : function(){
            var obj = this.get("obj");

            if(obj.contact){
                var contact = obj.contact;

                obj.set("contact_id", contact.id);

                this.setRate();
                this.loadReference();
            }
        },
        typeChanges         : function(){
            var obj = this.get("obj");

            switch(obj.type) {
                case "Advance_Settlement":
                    this.set("showCashAdvance", true);
                    break;
                default:
                    this.set("showCashAdvance", false);
                    obj.set("reference_id", 0);
                    obj.set("deposit", 0);
                    obj.set("received", 0);
            }

            this.generateNumber();
        },
        //Segment
        segmentChanges      : function(e) {
            var dataArr = e.data.segments;
            var lastIndex = dataArr.length - 1;
            if(dataArr.length > 1) {
                for(var i = 0; i < dataArr.length - 1; i++) {
                    var current = this.segmentItemDS.get(dataArr[i]);
                    var last = this.segmentItemDS.get(dataArr[lastIndex]);
                    if(current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        transactionSegmentChanges   : function() {
            dataArr = this.get("obj").segments,
            lastIndex = dataArr.length - 1;
            if(dataArr.length > 1) {
                for(var i = 0; i < dataArr.length - 1; i++) {
                    var current = this.segmentItemDS.get(dataArr[i]);
                    var last = this.segmentItemDS.get(dataArr[lastIndex]);
                    if(current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        //Number
        checkExistingNumber     : function(){
            var self = this, para = [],
            obj = this.get("obj");

            if(obj.number!==""){

                if(obj.isNew()==false){
                    para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
                }

                para.push({ field:"number", value: obj.number });
                para.push({ field:"type", value: obj.type });

                this.txnDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 1
                }).then(function(e){
                    var view = self.txnDS.view();

                    if(view.length>0){
                        self.set("notDuplicateNumber", false);
                    }else{
                        self.set("notDuplicateNumber", true);
                    }
                });
            }
        },
        generateNumber      : function(){
            var self = this, obj = this.get("obj"),
                issueDate = new Date(obj.issued_date),
                startDate = new Date(obj.issued_date),
                endDate = new Date(obj.issued_date);

            this.set("notDuplicateNumber", true);

            startDate.setDate(1);
            startDate.setMonth(0);//Set to January
            endDate.setDate(31);
            endDate.setMonth(11);//Set to November

            this.numberDS.query({
                filter:[
                    { field:"type", value:obj.type },
                    { field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
                    { field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
                ]
            }).then(function(){
                var view = self.numberDS.view(),
                number = 0, str = "";

                if(view.length>0){
                    number = view[0].number.match(/\d+/g).map(Number);
                }

                number++;
                str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

                obj.set("number", str);
            });
        },
        //Obj
        checkExistingInvoice: function(){
            var self = this, obj = this.get("obj"),
            para = [], ids = [], contactIDs = [], referenceNos = [];

            $.each(this.lineDS.data(), function(index, value){
                if(value.contact_id>0 && value.reference_no!==""){

                    if(obj.isNew()==false){
                        ids.push(value.id);
                    }

                    contactIDs.push(value.contact_id);
                    referenceNos.push(value.reference_no);
                }
            });

            if(contactIDs.length>0 && referenceNos.length>0){
                if(obj.isNew()==false){
                    para.push({ field:"id", operator:"where_not_in", value: ids });
                }
                para.push({ field:"contact_id", operator:"where_in", value: contactIDs });
                para.push({ field:"reference_no", operator:"where_in", value: referenceNos });

                this.invoiceDS.query({
                    filter:para,
                    page:1,
                    pageSize:1
                }).then(function(){
                    var view = self.invoiceDS.view();

                    if(view.length>0){
                        self.set("isExistingInvoice", true);

                        $("#ntf1").data("kendoNotification").error(banhji.source.duplicateInvoice);
                    }else{
                        self.set("isExistingInvoice", false);
                    }
                });
            }
        },
        loadObj             : function(id){
            var self = this, para = [];

            para.push({ field:"id", value: id });

            if(this.get("recurring")=="use"){
                this.set("recurring","");
                this.addEmpty();
                this.loadRecurring(id);
            }else{
                if(this.get("recurring")=="edit"){
                    this.set("recurring","");
                    para.push({ field:"is_recurring", value: 1 });
                }

                this.dataSource.query({
                    filter: para,
                    page: 1,
                    pageSize: 1
                }).then(function(e){
                    var view = self.dataSource.view();

                    self.set("obj", view[0]);
                    self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));

                    self.lineDS.filter({ field: "transaction_id", value: id });
                    self.journalLineDS.filter({ field: "transaction_id", value: id });
                    self.attachmentDS.filter({ field: "transaction_id", value: id });

                    self.referenceLineDS.filter({ field: "transaction_id", value: view[0].reference_id });
                    self.referenceDS.query({
                        filter:{ field: "id", value: view[0].reference_id }
                    }).then(function(){
                        var dropdownlist = $("#ddlReference").data("kendoDropDownList");
                        dropdownlist.value(view[0].reference_id);
                    });

                    if(view[0].type=="Advance_Settlement") {
                        self.set("showCashAdvance", true);
                    }else{
                        self.set("showCashAdvance", false);
                    }
                });
            }
        },
        addEmpty            : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.journalLineDS.data([]);
            this.attachmentDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("sub_total", 0);
            this.set("tax", 0);
            this.set("total", 0);
            this.set("showCashAdvance", false);

            this.dataSource.insert(0, {
                recurring_id        : 0,
                reference_id        : 0,
                account_id          : 1,
                job_id              : 0,
                contact_id          : "",
                employee_id         : "",
                user_id             : this.get("user_id"),
                type                : "Direct_Expense", //required
                number              : "",
                sub_total           : 0,
                tax                 : 0,
                deposit             : 0,
                amount              : 0,
                remaining           : 0,
                received            : 0,
                rate                : 1,
                locale              : banhji.locale,
                issued_date         : new Date(),
                memo                : "",
                memo2               : "",
                status              : 0,
                segments            : [],
                progress            : "",
                is_journal          : 1,
                //Recurring
                recurring_name      : "",
                start_date          : new Date(),
                frequency           : "Daily",
                month_option        : "Day",
                interval            : 1,
                day                 : 1,
                week                : 0,
                month               : 0,
                is_recurring        : 0
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);

            this.generateNumber();
            this.setRate();
            this.addRow();
        },
        addRow              : function(){
            var obj = this.get("obj");

            this.lineDS.add({
                transaction_id      : obj.id,
                tax_item_id         : "",
                job_id              : "",
                contact_id          : "",
                account_id          : "",
                description         : "",
                reference_no        : "",
                segments            : [],
                amount              : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                reference_date      : new Date(),
                reference_no        : ""
            });
        },
        remove              : function(e){
            var data = e.data;

            this.lineDS.remove(data);
            this.changes();
        },
        changes             : function(){
            var self = this, obj = this.get("obj"),
            subTotal = 0, total = 0, tax = 0, remaining = 0;

            $.each(this.lineDS.data(), function(index, value) {
                value.set("rate", obj.rate);

                if(value.tax_item_id>0){
                    var taxItem = self.taxItemDS.get(value.tax_item_id);
                    tax += value.amount * taxItem.rate;
                }

                subTotal += value.amount;
            });

            total = subTotal + tax;

            if(obj.deposit>0){
                remaining = obj.deposit - (total + obj.received);
            }

            obj.set("sub_total", subTotal);
            obj.set("tax", tax);
            obj.set("amount", total);
            obj.set("remaining", remaining);

            this.set("total", kendo.toString(total, "c", obj.locale));
        },
        objSync             : function(){
            var dfd = $.Deferred();

            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.response){
                    dfd.resolve(e.response.results);
                }
            });
            this.dataSource.bind("error", function(e){
                dfd.reject(e.errorThrown);
            });

            return dfd;
        },
        save                : function(){
            var self = this, obj = this.get("obj");
            obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

            //Recurring
            if(this.get("saveRecurring")){
                this.set("saveRecurring", false);

                obj.set("number", "");
                obj.set("is_recurring", 1);
            }

            //Save Draft
            if(this.get("saveDraft") || this.get("saveDraftPrint")){
                obj.set("status", 4); //In progress
                obj.set("progress", "Draft");
                obj.set("is_journal", 0);//No Journal
            }

            //Mode
            if(obj.isNew()==false){
                //Use draft
                if(obj.status==4){
                    obj.set("status", 0);//Open
                    obj.set("progress", "");
                    obj.set("is_journal", 1);//Add Journal
                }
            }

            //Reference
            if(obj.reference_id>0){
                var ref = this.referenceDS.get(obj.reference_id);
                if(obj.remaining<1){
                    ref.set("status", 1);
                }else{
                    ref.set("status", 2);
                }

                this.referenceDS.sync();
            }else{
                obj.set("reference_id", 0);
            }

            //Save Obj
            this.objSync()
            .then(function(data){ //Success
                if(self.get("isEdit")==false){
                    //Item line
                    $.each(self.lineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //Attachment
                    $.each(self.attachmentDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });
                }

                //Journal
                if(data[0].is_recurring==0 && data[0].is_journal==1){
                    self.addJournal(data[0].id);
                }

                self.lineDS.sync();
                self.uploadFile();

                return data;
            }, function(reason) { //Error
                $("#ntf1").data("kendoNotification").error(reason);
            }).then(function(result){
                $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

                if(self.get("saveClose")){
                    //Save Close
                    self.set("saveClose", false);
                    self.cancel();
                    window.history.back();
                }else if(self.get("savePrint") || self.get("saveDraftPrint")){
                    //Save Print
                    self.set("savePrint", false);
                    self.set("saveDraftPrint", false);

                    self.clear();
                    if(result[0].transaction_template_id>0){
                        banhji.router.navigate("/invoice_form/"+result[0].id);
                    }
                }else{
                    //Save New
                    self.addEmpty();
                }
            });
        },
        clear               : function(){
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();
            this.attachmentDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.attachmentDS.data([]);

            banhji.userManagement.removeMultiTask("expense");
        },
        cancel              : function(){
            this.clear();
            history.back();
        },
        delete              : function(){
            var self = this, obj = this.get("obj");
            this.set("showConfirm",false);

            this.txnDS.query({
                filter:[
                    { field:"reference_id", value:obj.id },
                ],
                page:1,
                pageSize:1
            }).then(function(){
                var view = self.txnDS.view();

                if(view.length>0){
                    alert("Sorry, you can not delete it.");
                }else{
                    obj.set("deleted", 1);

                    self.dataSource.sync();
                    self.dataSource.bind("requestEnd", function(e){
                        if(e.type==="update"){
                            window.history.back();
                        }
                    });
                }
            });
        },
        openConfirm         : function(){
            this.set("showConfirm", true);
        },
        closeConfirm        : function(){
            this.set("showConfirm", false);
        },
        validating          : function(){
            var result = true, obj = this.get("obj");

            if(this.get("isExistingInvoice")){
                $("#ntf1").data("kendoNotification").error(banhji.source.duplicateInvoice);

                result = false;
            }

            return result;
        },
        //Journal
        addJournal          : function(transaction_id){
            var self = this, obj = this.get("obj"),
            sum = 0, sumExpense = 0, taxList = {};

            //Edit Mode
            if(obj.isNew()==false){
                //Delete previous journal
                $.each(this.journalLineDS.data(), function(index, value){
                    value.set("deleted", 1);
                });
            }

            //Expense on Dr
            $.each(this.lineDS.data(), function(index, value){
                sumExpense += value.amount;

                self.journalLineDS.add({
                    transaction_id      : transaction_id,
                    contact_id          : value.contact_id,
                    account_id          : value.account_id,
                    description         : value.description,
                    reference_no        : value.reference_no,
                    segments            : value.segments,
                    dr                  : value.amount,
                    cr                  : 0,
                    rate                : value.rate,
                    locale              : value.locale
                });
            });
            sum += sumExpense;

            //Tax accounts
            if(obj.tax>0){
                $.each(this.lineDS.data(), function(index, value){
                    if(value.tax_item_id>0){
                        var taxItem = self.taxItemDS.get(value.tax_item_id),
                        taxAmount = value.amount * taxItem.rate;
                        sum += taxAmount;

                        if(taxItem.account_id>0){
                            if(taxList[taxItem.account_id]===undefined){
                                taxList[taxItem.account_id]={"id": taxItem.account_id, "amount":taxAmount};
                            }else{
                                if(taxList[taxItem.account_id].id===taxItem.account_id){
                                    taxList[taxItem.account_id].amount += taxAmount;
                                }else{
                                    taxList[taxItem.account_id]={"id": taxItem.account_id, "amount": taxAmount};
                                }
                            }
                        }
                    }
                });

                //Tax account on Dr
                if(!jQuery.isEmptyObject(taxList)){
                    $.each(taxList, function(index, value){
                        self.journalLineDS.add({
                            transaction_id      : transaction_id,
                            account_id          : value.id,
                            contact_id          : value.contact_id,
                            description         : "",
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : value.amount,
                            cr                  : 0,
                            rate                : obj.rate,
                            locale              : obj.locale
                        });
                    });
                }
            }

            if(obj.type=="Advance_Settlement") {
                var reference = this.referenceDS.get(obj.reference_id),
                advance_account_id = this.referenceLineDS.at(0).account_id,
                sumExpense = 0;

                //Cash on Dr
                if(obj.received>0){
                    sum += obj.received;

                    this.journalLineDS.add({
                        transaction_id      : transaction_id,
                        contact_id          : obj.contact_id,
                        account_id          : obj.account_id,
                        description         : "",
                        reference_no        : "",
                        segments            : obj.segments,
                        dr                  : obj.received,
                        cr                  : 0,
                        rate                : obj.rate,
                        locale              : obj.locale
                    });
                }

                //Over Expense
                if(obj.remaining<0){
                    sum += obj.remaining;

                    //Cash on Cr
                    this.journalLineDS.add({
                        transaction_id      : transaction_id,
                        contact_id          : obj.contact_id,
                        account_id          : obj.account_id,
                        description         : "",
                        reference_no        : "",
                        segments            : obj.segments,
                        dr                  : 0,
                        cr                  : Math.abs(obj.remaining),
                        rate                : obj.rate,
                        locale              : obj.locale
                    });
                }

                //Advance Account on Cr
                this.journalLineDS.add({
                    transaction_id      : transaction_id,
                    contact_id          : reference.contact_id,
                    account_id          : advance_account_id,
                    description         : reference.memo,
                    reference_no        : reference.number,
                    segments            : reference.segments,
                    dr                  : 0,
                    cr                  : sum,
                    rate                : reference.rate,
                    locale              : reference.locale
                });
            }else{//Direct Expense & Reimbursement
                //Cash on Cr
                this.journalLineDS.add({
                    transaction_id      : transaction_id,
                    contact_id          : obj.contact_id,
                    account_id          : obj.account_id,
                    description         : "",
                    reference_no        : "",
                    segments            : obj.segments,
                    dr                  : 0,
                    cr                  : sum,
                    rate                : obj.rate,
                    locale              : obj.locale
                });
            }

            this.journalLineDS.sync();
        },
        //Reference
        loadReference       : function(){
            var self = this, obj = this.get("obj");

            if(obj.contact_id>0){
                this.referenceDS.filter([
                    { field:"contact_id", value:obj.contact_id },
                    { field:"type", value:"Cash_Advance" },
                    { field:"status", operator:"where_in", value:[0,2] }
                ]);
            }
        },
        referenceChanges    : function(){
            var obj = this.get("obj");
            if(obj.reference_id){
                var reference = this.referenceDS.get(obj.reference_id);

                obj.set("reference_no", reference.number);
                obj.set("deposit", reference.amount - reference.amount_paid);
                this.referenceLineDS.filter({ field:"transaction_id", value: obj.reference_id});
            }
        },
        //Recurring
        loadRecurring       : function(id){
            var self = this;

            this.recurringDS.query({
                filter:[
                    { field:"id", value:id },
                    { field:"is_recurring", value:1 }
                ],
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.recurringDS.view(),
                obj = self.get("obj");

                obj.set("recurring_id", id);
                obj.set("contact_id", view[0].contact_id);
                obj.set("type", view[0].type);
                obj.set("locale", view[0].locale);
                obj.set("account_id", view[0].account_id);
                obj.set("segments", view[0].segments);
                obj.set("job_id", view[0].job_id);
                obj.set("memo", view[0].memo);
                obj.set("memo2", view[0].memo2);
                obj.set("employee", view[0].employee);
            });

            this.recurringLineDS.query({
                filter: { field:"transaction_id", value:id },
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.recurringLineDS.view();
                self.lineDS.data([]);

                $.each(view, function(index, value){
                    self.lineDS.add({
                        transaction_id      : 0,
                        tax_item_id         : value.tax_item_id,
                        job_id              : value.job_id,
                        contact_id          : value.contact_id,
                        account_id          : value.account_id,
                        description         : value.description,
                        reference_no        : value.reference_no,
                        segments            : value.segments,
                        amount              : value.amount,
                        rate                : value.rate,
                        locale              : value.locale,
                        reference_date      : value.reference_date
                    });
                });

                self.changes();
            });
        },
        frequencyChanges    : function(){
            var obj = this.get("obj");

            switch(obj.frequency) {
                case "Daily":
                    this.set("showMonthOption", false);
                    this.set("showMonth", false);
                    this.set("showWeek", false);
                    this.set("showDay", false);

                    break;
                case "Weekly":
                    this.set("showMonthOption", false);
                    this.set("showMonth", false);
                    this.set("showWeek", true);
                    this.set("showDay", false);

                    break;
                case "Monthly":
                    this.set("showMonthOption", true);
                    this.set("showMonth", false);
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                case "Annually":
                    this.set("showMonthOption", false);
                    this.set("showMonth", true);
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                default:
                    //Default here..
            }
        },
        monthOptionChanges  : function(){
            var obj = this.get("obj");

            switch(obj.month_option) {
                case "Day":
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                default:
                    this.set("showWeek", true);
                    this.set("showDay", false);
            }
        },
        recurringSync       : function(){
            var dfd = $.Deferred();

            this.recurringDS.sync();
            this.recurringDS.bind("requestEnd", function(e){
                if(e.response){
                    dfd.resolve(e.response.results);
                }
            });
            this.recurringDS.bind("error", function(e){
                dfd.reject(e.errorThrown);
            });

            return dfd;
        }
    });
    banhji.journal =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        txnDS               : dataStore(apiUrl + "transactions"),
        numberDS            : dataStore(apiUrl + "transactions/number"),
        lineDS              : dataStore(apiUrl + "journal_lines"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "journal_lines"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        contactDS           : dataStore(apiUrl + "contacts"),
        segmentDS           : dataStore(apiUrl + "segments"),
        segmentItemDS       : dataStore(apiUrl + "segments/item"),
        currencyDS          : new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: { field:"status", value: 1 }
        }),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{
                logic: "or",
                filters: [
                    { field: "type", value: "Journal" }
                ]
            }
        }),
        types               : [
            {id: 'Journal', name: 'General Journal'},
            {id: 'Adjustment', name: 'Adjustment'},
            {id: 'Opening_Balance', name: 'Opening Balance'},
            {id: 'Closing_Entry', name: 'Closing Entry'},
            {id: 'Reclassification', name: 'Reclassification'},
            {id: 'Accrual', name: 'Accrual'},
            {id: 'Depreciation_amortization', name: 'Depreciation/Amortization'},
            {id: 'Others', name: 'Others'}
        ],
        jobDS               : banhji.source.jobList,
        accountDS           : banhji.source.accountList,
        confirmMessage      : banhji.source.confirmMessage,
        dateUnitList       : banhji.source.dateUnitList,
        monthOptionList     : banhji.source.monthOptionList,
        monthList           : banhji.source.monthList,
        weekDayList         : banhji.source.weekDayList,
        dayList             : banhji.source.dayList,
        showMonthOption     : false,
        showMonth           : false,
        showWeek            : false,
        showDay             : false,
        obj                 : null,
        segObj              : [],
        isEdit              : false,
        saveDraft           : false,
        saveClose           : false,
        saveDraftPrint      : false,
        savePrint           : false,
        saveRecurring       : false,
        showConfirm         : false,
        showRef             : true,
        showName            : false,
        showJob             : false,
        showSegment         : false,
        notDuplicateNumber  : true,
        recurring           : "",
        recurring_validate  : false,
        dr                  : 0,
        cr                  : 0,
        segment_id          : "",
        segmentitem_id      : "",
        segmentWindowVisible: false,
        user_id             : banhji.source.user_id,
        pageLoad            : function(id){
            if(id){
                this.set("isEdit", true);
                this.loadObj(id);
            }else{
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                }
            }
        },
        //Upload
        onSelect            : function(e){
            // Array with information about the uploaded files
            var self = this,
            files = e.files,
            obj = this.get("obj");

            // Check the extension of each file and abort the upload if it is not .jpg
            $.each(files, function(index, value){
                if (value.extension.toLowerCase() === ".jpg"
                    || value.extension.toLowerCase() === ".jpeg"
                    || value.extension.toLowerCase() === ".tiff"
                    || value.extension.toLowerCase() === ".png"
                    || value.extension.toLowerCase() === ".gif"
                    || value.extension.toLowerCase() === ".pdf"){

                    var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

                    self.attachmentDS.add({
                        user_id         : self.get("user_id"),
                        transaction_id  : obj.id,
                        type            : "Transaction",
                        name            : value.name,
                        description     : "",
                        key             : key,
                        url             : banhji.s3 + key,
                        size            : value.size,
                        created_at      : new Date(),

                        file            : value.rawFile
                    });
                }else{
                    alert("This type of file is not allowed to attach.");
                }
            });
        },
        removeFile          : function(e){
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
            }
        },
        uploadFile          : function(){
            $.each(this.attachmentDS.data(), function(index, value){
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

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e){
                //Delete File
                if(e.type=="destroy"){
                    if(saved==false && e.response){
                        saved = true;

                        var response = e.response.results;
                        $.each(response, function(index, value){
                            var params = {
                                //Bucket: 'STRING_VALUE', /* required */
                                Delete: { /* required */
                                    Objects: [ /* required */
                                        {
                                            Key: value.data.key /* required */
                                        }
                                      /* more items */
                                    ]
                                }
                            };
                            bucket.deleteObjects(params, function(err, data) {
                                //console.log(err, data);
                            });
                        });
                    }
                }
            });
        },
        //Currency Rate
        setRate             : function(){
            var obj = this.get("obj"),
            rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

            obj.set("rate", rate);

            $.each(this.lineDS.data(), function(index, value){
                value.set("rate", rate);
                value.set("locale", obj.locale);
            });
        },
        //Segments
        addSegmentItem      : function(){
            var obj = this.get("segObj"),
                notExisting = true,
                segment_id = this.get("segment_id"),
                segmentitem_id = this.get("segmentitem_id");

            if(segment_id && segmentitem_id){
                $.each(obj.segments, function(index, value){
                    if(value.segment_id==segment_id){
                        notExisting = false;

                        return false;
                    }
                });

                if(notExisting){
                    var segments = this.segmentDS.get(segment_id),
                        segmentitems = this.segmentItemDS.get(segmentitem_id);

                    obj.segments.push({
                        id : segmentitems.id,
                        segment_id: segment_id,
                        code: segmentitems.code,
                        name: segmentitems.name,
                        segment: { id : segment_id, name : segments.name}
                    });
                }else{
                    $("#ntf1").data("kendoNotification").warning("This segment is already selected!");
                }
            }

            this.set("segment_id", ""),
            this.set("segmentitem_id", "");
        },
        openWindow          : function(e){
            var data = e.data;

            this.set("segObj", data);

            this.set("segmentWindowVisible", true);
        },
        closeWindow             : function(){
            this.set("segmentWindowVisible", false);
        },
        //Number
        checkExistingNumber     : function(){
            var self = this, para = [],
            obj = this.get("obj");

            if(obj.number!==""){

                if(obj.isNew()==false){
                    para.push({ field:"id <>", value: obj.id });
                }

                para.push({ field:"number", value: obj.number });
                para.push({ field:"type", value: obj.type });

                this.txnDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 1
                }).then(function(e){
                    var view = self.txnDS.view();

                    if(view.length>0){
                        self.set("notDuplicateNumber", false);
                    }else{
                        self.set("notDuplicateNumber", true);
                    }
                });
            }
        },
        generateNumber      : function(){
            var self = this, obj = this.get("obj"),
                issueDate = new Date(obj.issued_date),
                startDate = new Date(obj.issued_date),
                endDate = new Date(obj.issued_date);

            this.set("notDuplicateNumber", true);

            startDate.setDate(1);
            startDate.setMonth(0);//Set to January
            endDate.setDate(31);
            endDate.setMonth(11);//Set to November

            this.numberDS.query({
                filter:[
                    { field:"type", value:obj.type },
                    { field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
                    { field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
                ]
            }).then(function(){
                var view = self.numberDS.view(),
                number = 0, str = "";

                if(view.length>0){
                    number = view[0].number.match(/\d+/g).map(Number);
                }

                number++;
                str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

                obj.set("number", str);
            });
        },
        //Obj
        loadObj             : function(id){
            var self = this, para = [];

            para.push({ field:"id", value: id });

            if(this.get("recurring")=="use"){
                this.set("recurring","");
                this.addEmpty();
                this.loadRecurring(id);
            }else{
                if(this.get("recurring")=="edit"){
                    this.set("recurring","");
                    para.push({ field:"is_recurring", value: 1 });
                }

                this.dataSource.query({
                    filter: para,
                    page: 1,
                    pageSize: 1
                }).then(function(e){
                    var view = self.dataSource.view();

                    self.set("obj", view[0]);
                    self.set("dr", kendo.toString(view[0].amount, "c", view[0].locale));
                    self.set("cr", kendo.toString(view[0].amount, "c", view[0].locale));
                });

                self.lineDS.query({
                    filter:{ field: "transaction_id", value: id }
                });
            }
        },
        addEmpty            : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.attachmentDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("dr", 0);
            this.set("cr", 0);

            this.dataSource.insert(0, {
                recurring_id        : "",
                transaction_template_id : 13,
                user_id             : this.get("user_id"),
                type                : "Journal", //required
                journal_type        : "Journal",
                number              : "",
                amount              : 0,
                rate                : 1,
                locale              : banhji.locale,
                issued_date         : new Date(),
                memo                : "",
                memo2               : "",
                status              : 0,
                progress            : "",
                is_journal          : 1,
                //Recuring
                recurring_name      : "",
                start_date          : new Date(),
                frequency           : "Daily",
                month_option        : "Day",
                interval            : 1,
                day                 : 1,
                week                : 0,
                month               : 0,
                is_recurring        : 0
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);

            this.setRate();
            this.generateNumber();

            //Default rows
            for (var i = 0; i < banhji.source.defaultLines; i++) {
                this.addRow();
            }
        },
        addRow              : function(){
            var obj = this.get("obj");

            this.lineDS.add({
                transaction_id      : obj.id,
                account_id          : "",
                contact_id          : "",
                description         : "",
                reference_no        : "",
                job_id              : "",
                segments            : [],
                dr                  : "",
                cr                  : "",
                rate                : obj.rate,
                locale              : obj.locale,
                reference_no        : "",

                account             : { id:0, name:"" },
                contact             : { id:0, name:"" },
                job                 : { id:0, name:"" },
                segments            : []
            });
        },
        removeRow               : function(e){
            var data = e.data;
            if(this.lineDS.total()>2){
                this.lineDS.remove(data);
                this.changes();
            }
        },
        addExtraRow         : function(uid){
            var row = this.lineDS.getByUid(uid),
                index = this.lineDS.indexOf(row);

            if(index==this.lineDS.total()-1){
                this.addRow();
            }
        },
        removeEmptyRow      : function(){
            var raw = this.lineDS.data();
            var row, i;
            for(i=raw.length-1; i>=0; i--){
                row = raw[i];

                if (row.account) {
                    if (row.account.id==0) {
                        this.lineDS.remove(row);
                    }
                }
            }
        },
        checkDr             : function(uid){
            var data = this.lineDS.getByUid(uid);

            if(data.dr>0 && data.cr>0){
                data.set("cr", "");
            }

            this.changes();
        },
        checkCr             : function(uid){
            var data = this.lineDS.getByUid(uid);

            if(data.dr>0 && data.cr>0){
                data.set("dr", "");
            }

            this.changes();
        },
        lineDSChanges       : function(arg){
            var self = banhji.journal;

            if(arg.field){
                var dataRow = arg.items[0];

                if(arg.field=="account"){
                    self.accountChanges(dataRow.uid);
                    self.addExtraRow(dataRow.uid);
                }else if(arg.field=="dr"){
                    self.checkDr(dataRow.uid);
                }else if(arg.field=="cr"){
                    self.checkCr(dataRow.uid);
                }
            }
        },
        accountChanges      : function(uid){
            var data = this.lineDS.getByUid(uid),
                index = this.lineDS.indexOf(data),
                beforeLine = this.lineDS.at(index-1);

            if(beforeLine){
                data.set("description", beforeLine.description);

                if(index==1){
                    if(beforeLine.dr>0){
                        data.set("dr", "");
                        data.set("cr", beforeLine.dr);
                    }else{
                        data.set("dr", beforeLine.cr);
                        data.set("cr", "");
                    }

                    this.changes();
                }
            }
        },
        changes             : function(){
            var obj = this.get("obj"), dr = 0, cr = 0;

            $.each(this.lineDS.data(), function(index, value) {
                value.set("rate", obj.rate);

                dr += kendo.parseFloat(value.dr);
                cr += kendo.parseFloat(value.cr);
            });

            obj.set("amount", dr);

            this.set("dr", kendo.toString(dr, "c", obj.locale));
            this.set("cr", kendo.toString(cr, "c", obj.locale));
        },
        validating          : function(){
            var result = true,
                obj = this.get("obj"),
                selectedAccount = 0,
                dr = 0, cr = 0;

            $.each(this.lineDS.data(), function(index, value) {
                if(kendo.parseFloat(value.dr)>0 || kendo.parseFloat(value.cr)>0){
                    if(value.account){
                        if(value.account.id>0){
                            selectedAccount++;
                        }
                    }
                }

                dr += kendo.parseFloat(value.dr);
                cr += kendo.parseFloat(value.cr);
            });

            dr = kendo.toString(dr, 'n');
            cr = kendo.toString(cr, 'n');

            if(selectedAccount<2){
                result = false;

                $("#ntf1").data("kendoNotification").warning("Please select account and enter amount!");
            }

            if(dr!=cr){
                result = false;

                $("#ntf1").data("kendoNotification").warning("Dr not equal Cr");
            }

            return result;
        },
        objSync             : function(){
            var dfd = $.Deferred();

            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.response){
                    dfd.resolve(e.response.results);
                }
            });
            this.dataSource.bind("error", function(e){
                dfd.reject(e.errorThrown);
            });

            return dfd;
        },
        save                : function(){
            var self = this, obj = this.get("obj");
            obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

            this.removeEmptyRow();

            //Recurring
            if(this.get("saveRecurring")){
                this.set("saveRecurring", false);

                obj.set("number", "");
                obj.set("is_recurring", 1);
            }

            //Save Draft
            if(this.get("saveDraft") || this.get("saveDraftPrint")){
                obj.set("status", 4); //In progress
                obj.set("progress", "Draft");
                obj.set("is_journal", 0);//No Journal
            }

            //Mode
            if(obj.isNew()==false){
                //Use draft
                if(obj.status==4){
                    obj.set("status", 0);//Open
                    obj.set("progress", "");
                    obj.set("is_journal", 1);//Add Journal
                }
            }

            //Save Obj
            this.objSync()
            .then(function(data){ //Success
                if(self.get("isEdit")==false){
                    //Item line
                    $.each(self.lineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //Attachment
                    $.each(self.attachmentDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });
                }

                self.lineDS.sync();
                self.uploadFile();

                return data;
            }, function(reason) { //Error
                $("#ntf1").data("kendoNotification").error(reason);
            }).then(function(result){
                $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

                if(self.get("saveClose")){
                    //Save Close
                    self.set("saveClose", false);
                    self.cancel();
                    window.history.back();
                }else if(self.get("savePrint") || self.get("saveDraftPrint")){
                    //Save Print
                    self.set("savePrint", false);
                    self.set("saveDraftPrint", false);

                    self.cancel();
                    if(result[0].transaction_template_id>0){
                        banhji.router.navigate("/invoice_form/"+result[0].id);
                    }
                }else{
                    //Save New
                    self.addEmpty();
                }
            });
        },
        cancel              : function(){
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();
            this.attachmentDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.attachmentDS.data([]);

            banhji.userManagement.removeMultiTask("journal");
        },
        delete              : function(){
            var self = this, obj = this.get("obj");
            this.set("showConfirm",false);

            this.txnDS.query({
                filter:[
                    { field:"reference_id", value:obj.id },
                ],
                page:1,
                pageSize:1
            }).then(function(){
                var view = self.txnDS.view();

                if(view.length>0){
                    alert("Sorry, you can not delete it.");
                }else{
                    obj.set("deleted", 1);

                    self.dataSource.sync();
                    self.dataSource.bind("requestEnd", function(e){
                        if(e.type==="update"){
                            window.history.back();
                        }
                    });
                }
            });
        },
        openConfirm         : function(){
            this.set("showConfirm", true);
        },
        closeConfirm        : function(){
            this.set("showConfirm", false);
        },
        //Recurring
        loadRecurring       : function(id){
            var self = this;

            this.recurringDS.query({
                filter:[
                    { field:"id", value:id },
                    { field:"is_recurring", value:1 }
                ],
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.recurringDS.view(),
                obj = self.get("obj");

                obj.set("journal_type", view[0].journal_type);
                obj.set("locale", view[0].locale);
                obj.set("memo", view[0].memo);
            });

            this.recurringLineDS.query({
                filter: { field:"transaction_id", value:id },
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.recurringLineDS.view();
                self.lineDS.data([]);

                $.each(view, function(index, value){
                    self.lineDS.add({
                        transaction_id      : 0,
                        account_id          : value.account_id,
                        contact_id          : value.contact_id,
                        job_id              : value.job_id,
                        description         : value.description,
                        reference_no        : value.reference_no,
                        dr                  : value.dr,
                        cr                  : value.cr,
                        rate                : value.rate,
                        locale              : value.locale,

                        account             : value.account,
                        contact             : value.contact,
                        job                 : value.job,
                        segments            : value.segments
                    });
                });

                self.changes();
            });
        },
        frequencyChanges    : function(){
            var obj = this.get("obj");

            switch(obj.frequency) {
                case "Daily":
                    this.set("showMonthOption", false);
                    this.set("showMonth", false);
                    this.set("showWeek", false);
                    this.set("showDay", false);

                    break;
                case "Weekly":
                    this.set("showMonthOption", false);
                    this.set("showMonth", false);
                    this.set("showWeek", true);
                    this.set("showDay", false);

                    break;
                case "Monthly":
                    this.set("showMonthOption", true);
                    this.set("showMonth", false);
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                case "Annually":
                    this.set("showMonthOption", false);
                    this.set("showMonth", true);
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                default:
                    //Default here..
            }
        },
        monthOptionChanges  : function(){
            var obj = this.get("obj");

            switch(obj.month_option) {
                case "Day":
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                default:
                    this.set("showWeek", true);
                    this.set("showDay", false);
            }
        },
        recurringSync       : function(){
            var dfd = $.Deferred();

            this.recurringDS.sync();
            this.recurringDS.bind("requestEnd", function(e){
                if(e.response){
                    dfd.resolve(e.response.results);
                }
            });
            this.recurringDS.bind("error", function(e){
                dfd.reject(e.errorThrown);
            });

            return dfd;
        }
    });
    banhji.currencyRate =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "currencies/rate"),
        currencyDS          : new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: { field:"status", value: 1 }
        }),
        currencyAllDS       : new kendo.data.DataSource({
            data: banhji.source.currencyList
        }),
        obj                 : null,
        isEdit              : false,
        baseCode            : banhji.institute.currency.country +' - '+ banhji.institute.currency.code,
        reportCode          : banhji.institute.reportCurrency.country +' - '+ banhji.institute.reportCurrency.code,
        windowVisible       : false,
        user_id             : banhji.source.user_id,
        pageLoad            : function(){
        },
        getCode             : function(id){
            var raw = banhji.source.currencyDS.get(id);
            if(raw){
                return raw.code;
            }else{
                return "";
            }
        },
        getCountry             : function(id){
            var raw = banhji.source.currencyDS.get(id);
            if(raw){
                return raw.country;
            }else{
                return "";
            }
        },
        openWindow          : function(){
            this.addEmpty();

            this.set("windowVisible", true);
        },
        closeWindow         : function(){
            this.dataSource.cancelChanges();

            this.set("windowVisible", false);
        },
        addEmpty            : function(){
            this.dataSource.insert(0, {
                user_id     : this.get("user_id"),
                currency_id : 0,
                rate        : 1,
                locale      : "",
                source      : "",
                method      : "Manual",
                date        : new Date(),

                currency    : []
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);
        },
        save                : function(){
            var obj = this.get("obj"),
            currency = this.currencyAllDS.get(obj.currency_id);
            obj.set("locale", currency.locale);

            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.type==="create" || e.type==="update"){
                    banhji.source.loadCurrencies();
                    banhji.source.loadRates();
                }
            });

            this.set("windowVisible", false);
        },
        edit                : function(e){
            var data = e.data;

            this.set("obj", data);

            this.set("windowVisible", true);
        },
        cancel              : function(){
            banhji.userManagement.removeMultiTask("currency_rate");
        }
    });
    
    banhji.cashMovement =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "accounting_modules/general_ledger"),
        accountDS       : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter:{ field:"account_type_id", value: 10 },
            sort: { field:"number", dir:"asc" }
        }),
        segmentItemDS       : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        sortList            : banhji.source.sortList,
        sorter              : "all",
        sdate               : "",
        edate               : "",
        obj                 : { account_id: 0, segments: [] },
        company             : banhji.institute,
        displayDate         : "",
        totalAmount         : 0,
        totalBalance        : 0,
        exArray             : [],
        pageLoad            : function(){
            this.search();
        },
        sorterChanges       : function(){
            var today = new Date(),
            sdate = "",
            edate = "",
            sorter = this.get("sorter");

            switch(sorter){
                case "today":
                    this.set("sdate", today);
                    this.set("edate", "");

                    break;
                case "week":
                    var first = today.getDate() - today.getDay(),
                    last = first + 6;

                    this.set("sdate", new Date(today.setDate(first)));
                    this.set("edate", new Date(today.setDate(last)));

                    break;
                case "month":
                    this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
                    this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

                    break;
                case "year":
                    this.set("sdate", new Date(today.getFullYear(), 0, 1));
                    this.set("edate", new Date(today.getFullYear(), 11, 31));

                    break;
                default:
                    this.set("sdate", "");
                    this.set("edate", "");
            }
        },
        segmentChanges      : function() {
            var dataArr = this.get("obj").segments,
            lastIndex = dataArr.length - 1,
            last = this.segmentItemDS.get(dataArr[lastIndex]);

            if(dataArr.length > 1) {
                for(var i = 0; i < dataArr.length - 1; i++) {
                    var current_index = dataArr[i],
                    current = this.segmentItemDS.get(current_index);

                    if(current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        search              : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";

            //Account
            if(obj.account_id>0){
                para.push({ field:"account_id", value:obj.account_id });
            }

            //Segment
            if(obj.segments.length>0){
                var segments = [];
                $.each(obj.segments, function(index, value){
                    segments.push(value);
                });
                para.push({ field:"segments", operator:"like_related_transaction", value:"%"+segments.toString()+"%" });
            }

            //Dates
            if(start && end){
                para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(new Date(start), "yyyy-MM-dd") });
                para.push({ field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(end), "yyyy-MM-dd") });

                displayDate = "From " + kendo.toString(new Date(start), "dd-MM-yyyy") + " To " + kendo.toString(new Date(end), "dd-MM-yyyy");
            }else if(start){
                para.push({ field:"issued_date", operator:"where_related_transaction", value: kendo.toString(new Date(start), "yyyy-MM-dd") });

                displayDate = "On " + kendo.toString(new Date(start), "dd-MM-yyyy");
            }else if(end){
                para.push({ field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(end), "yyyy-MM-dd") });

                displayDate = "As Of " + kendo.toString(new Date(end), "dd-MM-yyyy");
            }else{

            }
            this.set("displayDate", displayDate);

            para.push({ field:"account_type_id", operator:"where_related_account", value:10 });

            this.dataSource.query({
                filter:para,
                sort:[
                    { field:"account_type_id", operator:"order_by_related_account", dir:"asc" },
                    { field:"number", operator:"order_by_related_account", dir:"asc" },
                    { field:"issued_date", operator:"order_by_related_transaction", dir:"asc" },
                    { field:"number", operator:"order_by_related_transaction", dir:"asc" }
                ]
            });
            this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response.results, res = e.response, balanceCal = 0;
                    self.exArray = [];
                    self.set("totalAmount", kendo.toString(res.totalAmount, "c", banhji.locale));
                    self.set("totalBalance", kendo.toString(res.totalBalance, "c", banhji.locale));

                    self.exArray.push({
                        cells: [
                            { value: self.company.name, textAlign: "center", colSpan: 7 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Cash Movement",bold: true, fontSize: 20, textAlign: "center", colSpan: 7 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 7 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Type", background: "#496cad", color: "#ffffff" },
                            { value: "Date", background: "#496cad", color: "#ffffff" },
                            { value: "Reference No", background: "#496cad", color: "#ffffff" },
                            { value: "Description", background: "#496cad", color: "#ffffff" },
                            { value: "In", background: "#496cad", color: "#ffffff" },
                            { value: "Out", background: "#496cad", color: "#ffffff" },
                            { value: "Balance", background: "#496cad", color: "#ffffff" }
                        ]
                    });
                    for (var j = 0; j < response.length; j++){
                        self.exArray.push({
                            cells: [
                                { value: response[j].number + " " + response[j].name, bold: true, },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: kendo.parseFloat(response[j].balance_forward), bold: true },
                            ]
                        });
                        balanceCal = response[j].balance_forward;
                        for (var i = 0; i < response[j].line.length; i++){

                            //for(var j = 0; j < response.results[i].line.length; j++){
                            var IN, OUT;
                            if(kendo.parseFloat(response[j].line[i].amount) > 0){
                                IN = kendo.parseFloat(response[j].line[i].amount);
                                OUT = 0;
                                //totalA += kendo.parseFloat(response[j].line[i].amount);
                            }else{
                                IN = 0;
                                OUT = kendo.parseFloat(Math.abs(response[j].line[i].amount));
                                //totalB += kendo.parseFloat(response[j].line[i].amount);
                            }
                            balanceCal += response[j].line[i].amount;
                            self.exArray.push({
                                cells: [
                                    { value: response[j].line[i].type ? response[j].line[i].type: ""},
                                    { value: kendo.toString(new Date(response[j].line[i].issued_date), "dd-MM-yyyy")  },
                                    { value: response[j].line[i].number },
                                    { value: response[j].line[i].memo },
                                    { value: IN},
                                    { value: OUT},
                                    { value: kendo.parseFloat(balanceCal)}
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [
                                { value: "TOTAL " + response[j].number + " " + response[j].name, bold: true, },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: kendo.parseFloat(balanceCal), bold: true },
                            ]
                        });
                    }
                    self.exArray.push({
                        cells: [
                            { value: "TOTAL", bold: true,fontSize: 16 },
                            { value: "" },
                            { value: "" },
                            { value: "" },
                            { value: "" },
                            { value: kendo.parseFloat(res.totalAmount), bold: true, fontSize: 16 },
                            { value: kendo.parseFloat(res.totalBalance), bold: true, fontSize: 16 },
                        ]
                    });
                }
            });
        },
        printGrid           : function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=990, height=900'),
                doc = win.document.open();
            var htmlStart =
                    '<!DOCTYPE html>' +
                    '<html>' +
                    '<head>' +
                    '<meta charset="utf-8" />' +
                    '<title></title>' +
                    '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                    '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<style>' +
                    'html { font: 11pt sans-serif; }' +
                    '.k-grid { border-top-width: 0; }' +
                    '.k-grid, .k-grid-content { height: auto !important; }' +
                    '.k-grid-content { overflow: visible !important; }' +
                    'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                    '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                    '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                    '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
                        '.inv1 .main-color {' +

                            '-webkit-print-color-adjust:exact; ' +
                        '} ' +
                        '.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
                        '-webkit-print-color-adjust:exact; color:#fff!important;}' +
                        '.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
                        '.inv1 .light-blue-td { ' +
                            'background-color: #c6d9f1!important;' +
                            'text-align: left;' +
                            'padding-left: 5px;' +
                            '-webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
                            'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
                        '}'+
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
                            ' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
                        '.journal_block1>.span2:first-child { ' +
                            'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span5:last-child {' +
                            'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.journal_block1>.span5 {' +
                            'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
                            'background-color: #1C2633!important;' +
                            'color: #fff!important; ' +
                            '-webkit-print-color-adjust:exact;' +
                        '}' +
                        '</style>' +
                    '</head>' +
                    '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
            var htmlEnd =
                    '</div></body>' +
                    '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function(){
                win.print();
                win.close();
            },2000);
        },
        ExportExcel         : function(){
            var workbook = new kendo.ooxml.Workbook({
              sheets: [
                {
                  columns: [
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true }
                  ],
                  title: "Cash Movement",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "CashMovement.xlsx"});
        }
    });
    banhji.collectionReport =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/collection_report"),
        contactDS           : banhji.source.customerDS,
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { customers: [] },
        company             : banhji.institute,
        displayDate         : "",
        total_txn           : 0,
        totalAmount         : 0,
        exArray             : [],
        pageLoad            : function(){
            this.search();
        },
        sorterChanges       : function(){
            var today = new Date(),
            sdate = "",
            edate = "",
            sorter = this.get("sorter");

            switch(sorter){
                case "today":
                    this.set("sdate", today);
                    this.set("edate", "");

                    break;
                case "week":
                    var first = today.getDate() - today.getDay(),
                    last = first + 6;

                    this.set("sdate", new Date(today.setDate(first)));
                    this.set("edate", new Date(today.setDate(last)));

                    break;
                case "month":
                    this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
                    this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

                    break;
                case "year":
                    this.set("sdate", new Date(today.getFullYear(), 0, 1));
                    this.set("edate", new Date(today.getFullYear(), 11, 31));

                    break;
                default:
                    this.set("sdate", "");
                    this.set("edate", "");
            }
        },
        search              : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";

            //Customer
            if(obj.customers.length>0){
                var customers = [];
                $.each(obj.customers, function(index, value){
                    customers.push(value);
                });
                para.push({ field:"contact_id", operator:"where_in", value:customers });
            }

            //Dates
            if(start && end){
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
                para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter:para
            }).then(function(){
                var view = self.dataSource.view();

                var amount = 0, txn_count = 0;
                $.each(view, function(index, value){
                    $.each(value.line, function(ind, val){
                        txn_count++;
                        amount += val.amount;
                    });
                });

                self.set("total_txn", kendo.toString(txn_count, "n0"));
                self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
        },
        printGrid           : function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=990, height=900'),
                doc = win.document.open();
            var htmlStart =
                    '<!DOCTYPE html>' +
                    '<html>' +
                    '<head>' +
                    '<meta charset="utf-8" />' +
                    '<title></title>' +
                    '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                    '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<style>' +
                    'html { font: 11pt sans-serif; }' +
                    '.k-grid { border-top-width: 0; }' +
                    '.k-grid, .k-grid-content { height: auto !important; }' +
                    '.k-grid-content { overflow: visible !important; }' +
                    'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                    '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                    '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                    '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
                        '.inv1 .main-color {' +

                            '-webkit-print-color-adjust:exact; ' +
                        '} ' +
                        '.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
                        '-webkit-print-color-adjust:exact; color:#fff!important;}' +
                        '.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
                        '.inv1 .light-blue-td { ' +
                            'background-color: #c6d9f1!important;' +
                            'text-align: left;' +
                            'padding-left: 5px;' +
                            '-webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
                            'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
                        '}'+
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
                            ' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
                        '.journal_block1>.span2:first-child { ' +
                            'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span5:last-child {' +
                            'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.journal_block1>.span5 {' +
                            'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
                            'background-color: #1C2633!important;' +
                            'color: #fff!important; ' +
                            '-webkit-print-color-adjust:exact;' +
                        '}' +
                        '</style>' +
                    '</head>' +
                    '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
            var htmlEnd =
                    '</div></body>' +
                    '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function(){
                win.print();
                win.close();
            },2000);
        },
        ExportExcel         : function(){
            var workbook = new kendo.ooxml.Workbook({
              sheets: [
                {
                  columns: [
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true }
                  ],
                  title: "General Ledger",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
        }
    });
    banhji.cashAdvanceReport =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "cashReports/cash_advance"),
        contactDS           : banhji.source.employeeDS,
        accountDS           : banhji.source.accountList,
        as_of               : new Date(),
        obj                 : { account_id: 0, employees: [] },
        company             : banhji.institute,
        displayDate         : "",
        totalAmount         : 0,
        exArray             : [],
        pageLoad            : function(){
            this.search();
        },
        sorterChanges       : function(){
            var today = new Date(),
            sdate = "",
            edate = "",
            sorter = this.get("sorter");

            switch(sorter){
                case "today":
                    this.set("sdate", today);
                    this.set("edate", "");

                    break;
                case "week":
                    var first = today.getDate() - today.getDay(),
                    last = first + 6;

                    this.set("sdate", new Date(today.setDate(first)));
                    this.set("edate", new Date(today.setDate(last)));

                    break;
                case "month":
                    this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
                    this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

                    break;
                case "year":
                    this.set("sdate", new Date(today.getFullYear(), 0, 1));
                    this.set("edate", new Date(today.getFullYear(), 11, 31));

                    break;
                default:
                    this.set("sdate", "");
                    this.set("edate", "");
            }
        },
        search              : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                as_of = this.get("as_of"),
                displayDate = "";



            //Account
            if(obj.account_id>0){
                para.push({ field:"account_id", value:obj.account_id });
            }
            //Employees
            if(obj.employees.length>0){
                var employees = [];
                $.each(obj.employees, function(index, value){
                    employees.push(value);
                });
                para.push({ field:"contact_id", operator:"where_in", value:employees });
            }

            if(as_of){
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate()+1);

                para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter:para
            }).then(function(){
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value){
                    $.each(value.line, function(indexx, x){
                        amount += x.amount;
                    });
                });

                self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
        },
        printGrid           : function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=990, height=900'),
                doc = win.document.open();
            var htmlStart =
                    '<!DOCTYPE html>' +
                    '<html>' +
                    '<head>' +
                    '<meta charset="utf-8" />' +
                    '<title></title>' +
                    '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                    '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<style>' +
                    'html { font: 11pt sans-serif; }' +
                    '.k-grid { border-top-width: 0; }' +
                    '.k-grid, .k-grid-content { height: auto !important; }' +
                    '.k-grid-content { overflow: visible !important; }' +
                    'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                    '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                    '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                    '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
                        '.inv1 .main-color {' +

                            '-webkit-print-color-adjust:exact; ' +
                        '} ' +
                        '.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
                        '-webkit-print-color-adjust:exact; color:#fff!important;}' +
                        '.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
                        '.inv1 .light-blue-td { ' +
                            'background-color: #c6d9f1!important;' +
                            'text-align: left;' +
                            'padding-left: 5px;' +
                            '-webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
                            'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
                        '}'+
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
                            ' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
                        '.journal_block1>.span2:first-child { ' +
                            'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span5:last-child {' +
                            'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.journal_block1>.span5 {' +
                            'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
                            'background-color: #1C2633!important;' +
                            'color: #fff!important; ' +
                            '-webkit-print-color-adjust:exact;' +
                        '}' +
                        '</style>' +
                    '</head>' +
                    '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
            var htmlEnd =
                    '</div></body>' +
                    '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function(){
                win.print();
                win.close();
            },2000);
        },
        ExportExcel         : function(){
            var workbook = new kendo.ooxml.Workbook({
              sheets: [
                {
                  columns: [
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true }
                  ],
                  title: "General Ledger",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
        }
    });
    banhji.billPaymentList =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "vendorReports/bill_list"),
        contactDS           : banhji.source.supplierDS,
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { contactIds: [] },
        company             : banhji.institute,
        displayDate         : "",
        total_txn           : 0,
        totalAmount         : 0,
        exArray             : [],
        pageLoad            : function(){
            this.search();
        },
        sorterChanges       : function(){
            var today = new Date(),
            sdate = "",
            edate = "",
            sorter = this.get("sorter");

            switch(sorter){
                case "today":
                    this.set("sdate", today);
                    this.set("edate", "");

                    break;
                case "week":
                    var first = today.getDate() - today.getDay(),
                    last = first + 6;

                    this.set("sdate", new Date(today.setDate(first)));
                    this.set("edate", new Date(today.setDate(last)));

                    break;
                case "month":
                    this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
                    this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

                    break;
                case "year":
                    this.set("sdate", new Date(today.getFullYear(), 0, 1));
                    this.set("edate", new Date(today.getFullYear(), 11, 31));

                    break;
                default:
                    this.set("sdate", "");
                    this.set("edate", "");
            }
        },
        search              : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";

            //Customer
            if(obj.contactIds.length>0){
                var contactIds = [];
                $.each(obj.contactIds, function(index, value){
                    contactIds.push(value);
                });
                para.push({ field:"contact_id", operator:"where_in", value:contactIds });
            }

            //Dates
            if(start && end){
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
                para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
            }else if(end){
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate()+1);

                para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter:para
            }).then(function(){
                var view = self.dataSource.view();

                var amount = 0, txn = [];
                $.each(view, function(index, value){
                    $.each(value.line, function(indexx, x){
                        var txnId = kendo.parseInt(x.reference.id);
                        if(txnId>0){
                            txn.push(txnId);
                        }

                        amount += x.amount;
                    });
                });

                txn = jQuery.unique(txn);

                self.set("total_txn", kendo.toString(txn.length, "n0"));
                self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
        },
        printGrid           : function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=990, height=900'),
                doc = win.document.open();
            var htmlStart =
                    '<!DOCTYPE html>' +
                    '<html>' +
                    '<head>' +
                    '<meta charset="utf-8" />' +
                    '<title></title>' +
                    '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                    '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<style>' +
                    'html { font: 11pt sans-serif; }' +
                    '.k-grid { border-top-width: 0; }' +
                    '.k-grid, .k-grid-content { height: auto !important; }' +
                    '.k-grid-content { overflow: visible !important; }' +
                    'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                    '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                    '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                    '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
                        '.inv1 .main-color {' +

                            '-webkit-print-color-adjust:exact; ' +
                        '} ' +
                        '.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
                        '-webkit-print-color-adjust:exact; color:#fff!important;}' +
                        '.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
                        '.inv1 .light-blue-td { ' +
                            'background-color: #c6d9f1!important;' +
                            'text-align: left;' +
                            'padding-left: 5px;' +
                            '-webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
                            'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
                        '}'+
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
                            ' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
                        '.journal_block1>.span2:first-child { ' +
                            'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.journal_block1>.span5:last-child {' +
                            'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.journal_block1>.span5 {' +
                            'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
                        '}' +
                        '.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
                            'background-color: #1C2633!important;' +
                            'color: #fff!important; ' +
                            '-webkit-print-color-adjust:exact;' +
                        '}' +
                        '</style>' +
                    '</head>' +
                    '<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
            var htmlEnd =
                    '</div></body>' +
                    '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function(){
                win.print();
                win.close();
            },2000);
        },
        ExportExcel         : function(){
            var workbook = new kendo.ooxml.Workbook({
              sheets: [
                {
                  columns: [
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true }
                  ],
                  title: "General Ledger",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
        }
    });    

    
    /* views and layout */
    banhji.view = {
        layout: new kendo.Layout('#layout', {
            model: banhji.Layout
        }),
        blank: new kendo.View('<div></div>'),
        index: new kendo.Layout("#index", {
            model: banhji.index
        }),
        menu: new kendo.Layout('#menu-tmpl', {
            model: banhji.userManagement
        }),
        searchAdvanced: new kendo.Layout("#searchAdvanced", {
            model: banhji.searchAdvanced
        }),
        //------------------------------------
        Index: new kendo.Layout("#Index", {
            model: banhji.Index
        }),

        generalLedger: new kendo.Layout("#generalLedger", {model: banhji.generalLedger}),
        generalLedgerBySegment: new kendo.Layout("#generalLedgerBySegment", {model: banhji.generalLedgerBySegment}),
        
        account: new kendo.Layout("#account", {model: banhji.account}),

        // Function
        cashTransaction: new kendo.Layout("#cashTransaction", {model: banhji.cashTransaction}),
        cashAdvance: new kendo.Layout("#cashAdvance", {model: banhji.cashAdvance}),
        expense: new kendo.Layout("#expense", {model: banhji.expense}),
        journal: new kendo.Layout("#journal", {model: banhji.journal}),
        currencyRate: new kendo.Layout("#currencyRate", {model: banhji.currencyRate}),
        
        cashMovement: new kendo.Layout("#cashMovement", {model: banhji.cashMovement}),
        //cashCollectionReport: new kendo.Layout("#cashCollectionReport", {model: banhji.cashCollection}),
        collectionReport : new kendo.Layout("#collectionReport", {model: banhji.collectionReport}),
        cashAdvanceReport: new kendo.Layout("#cashAdvanceReport", {model: banhji.cashAdvanceReport}),
        billPaymentList: new kendo.Layout("#billPaymentList", {model: banhji.billPaymentList}),


        // Menu
        tapMenu: new kendo.View("#tapMenu", {model: banhji.tapMenu}),
        reports: new kendo.View("#reports", {model: banhji.reports}),
        transactions: new kendo.View("#transactions", {model: banhji.transactions}),
        cashs: new kendo.View("#cashCenter", {model: banhji.accountingCenter}),


        //Menu Cash Transaction
        cashTransactionsMenu: new kendo.View("#cashTransactionsMenu", {model: banhji.cashTransactionsMenu}),
        cashReceipt: new kendo.View("#cashReceipt", {model: banhji.cashReceipt}),
        cashPayment: new kendo.View("#cashPayment", {model: banhji.cashPayment}),
        cashWithdrawal: new kendo.View("#cashWithdrawal", {model: banhji.cashWithdrawal}),
        cashDeposit: new kendo.View("#cashDeposit", {model: banhji.cashDeposit}),
        cashTransfer: new kendo.View("#cashTransfer", {model: banhji.cashTransfer}),
        paymentRefund: new kendo.View("#paymentRefund", {model: banhji.paymentRefund}),
        cashRefund: new kendo.View("#cashRefund", {model: banhji.cashRefund}),
        customerDeposit: new kendo.View("#customerDeposit", {model: banhji.customerDeposit}),
        vendorDeposit: new kendo.View("#vendorDeposit", {model: banhji.vendorDeposit}),
        cashTransactionExpense: new kendo.View("#cashTransactionExpense", {model: banhji.cashTransactionExpense}),
    };
    /* views and layout */
    banhji.router = new kendo.Router({
        init: function() {
            var language = JSON.parse(localStorage.getItem('userData/lang'));
            switch (language) {
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
            localforage.getItem('user', function(err, data) {
                if (err) {

                } else {
                    $('#current-section').html('|&nbsp;Company');
                    $('#home-menu').addClass('active');
                    banhji.view.layout.render("#wrapperApplication");
                    banhji.index.set('companyName', data.institute.name);
                    banhji.index.set('companyLogo', data.institute.logo);
                    var blank = new kendo.View('#blank-tmpl');
                    banhji.view.layout.showIn('#menu', banhji.view.menu);
                    if (userPool.getCurrentUser() == null) {
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
    banhji.router.route('/', function() {
        var blank = new kendo.View('#blank-tmpl');

        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.transactions);
        banhji.view.Index.showIn('#cashTransactionsMenu', banhji.view.cashTransactionsMenu);
        banhji.view.Index.showIn('#cashTransactionContent', banhji.view.cashReceipt);

        var vm = banhji.cashReceipt;
        if(banhji.pageLoaded["index"]==undefined){
            banhji.pageLoaded["index"] = true;

            //vm.sorterChanges();
        }

        vm.pageLoad();        
    });
    banhji.router.route('/cash_payment', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.transactions);
        banhji.view.Index.showIn('#cashTransactionsMenu', banhji.view.cashTransactionsMenu);
        banhji.view.Index.showIn('#cashTransactionContent', banhji.view.cashPayment);

        var vm = banhji.cashPayment;
        if(banhji.pageLoaded["index"]==undefined){
            banhji.pageLoaded["index"] = true;

            //vm.sorterChanges();
        }
        vm.pageLoad();  
    });
    banhji.router.route('/cash_withdrawal', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.transactions);
        banhji.view.Index.showIn('#cashTransactionsMenu', banhji.view.cashTransactionsMenu);
        banhji.view.Index.showIn('#cashTransactionContent', banhji.view.cashWithdrawal);

        var vm = banhji.cashWithdrawal;
        if(banhji.pageLoaded["index"]==undefined){
            banhji.pageLoaded["index"] = true;

            //vm.sorterChanges();
        }
        //vm.pageLoad();  
    });
    banhji.router.route('/cash_deposit', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.transactions);
        banhji.view.Index.showIn('#cashTransactionsMenu', banhji.view.cashTransactionsMenu);
        banhji.view.Index.showIn('#cashTransactionContent', banhji.view.cashDeposit);

        var vm = banhji.cashDeposit;
        if(banhji.pageLoaded["index"]==undefined){
            banhji.pageLoaded["index"] = true;

            //vm.sorterChanges();
        }
        //vm.pageLoad();  
    });
    banhji.router.route('/cash_transfer', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.transactions);
        banhji.view.Index.showIn('#cashTransactionsMenu', banhji.view.cashTransactionsMenu);
        banhji.view.Index.showIn('#cashTransactionContent', banhji.view.cashTransfer);

        var vm = banhji.cashTransfer;
        if(banhji.pageLoaded["index"]==undefined){
            banhji.pageLoaded["index"] = true;

            //vm.sorterChanges();
        }
        //vm.pageLoad();  
    });
    banhji.router.route('/payment_refund', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.transactions);
        banhji.view.Index.showIn('#cashTransactionsMenu', banhji.view.cashTransactionsMenu);
        banhji.view.Index.showIn('#cashTransactionContent', banhji.view.paymentRefund);

        var vm = banhji.paymentRefund;
        if(banhji.pageLoaded["index"]==undefined){
            banhji.pageLoaded["index"] = true;

            //vm.sorterChanges();
        }
        vm.pageLoad();  
    });
    banhji.router.route('/cash_refund', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.transactions);
        
        banhji.view.Index.showIn('#cashTransactionsMenu', banhji.view.cashTransactionsMenu);
        banhji.view.Index.showIn('#cashTransactionContent', banhji.view.cashRefund);

        var vm = banhji.cashRefund;
        if(banhji.pageLoaded["index"]==undefined){
            banhji.pageLoaded["index"] = true;

            //vm.sorterChanges();
        }
        vm.pageLoad();  
    });
    banhji.router.route('/customer_deposit', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.transactions);
        banhji.view.Index.showIn('#cashTransactionsMenu', banhji.view.cashTransactionsMenu);
        banhji.view.Index.showIn('#cashTransactionContent', banhji.view.customerDeposit);

        var vm = banhji.customerDeposit;
        if(banhji.pageLoaded["index"]==undefined){
            banhji.pageLoaded["index"] = true;

            //vm.sorterChanges();
        }
        //vm.pageLoad();  
    });
    banhji.router.route('/vendor_deposit', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.transactions);
        banhji.view.Index.showIn('#cashTransactionsMenu', banhji.view.cashTransactionsMenu);
        banhji.view.Index.showIn('#cashTransactionContent', banhji.view.vendorDeposit);

        var vm = banhji.vendorDeposit;
        if(banhji.pageLoaded["index"]==undefined){
            banhji.pageLoaded["index"] = true;

            //vm.sorterChanges();
        }
        //vm.pageLoad();  
    });
    banhji.router.route('/cash_transaction_expense', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.transactions);
        banhji.view.Index.showIn('#cashTransactionsMenu', banhji.view.cashTransactionsMenu);
        banhji.view.Index.showIn('#cashTransactionContent', banhji.view.cashTransactionExpense);

        var vm = banhji.cashTransactionExpense;
        if(banhji.pageLoaded["index"]==undefined){
            banhji.pageLoaded["index"] = true;

            //vm.sorterChanges();
        }
        //vm.pageLoad();  
    });

    banhji.router.route('/reports', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.reports);

        //load MVVM
        //banhji.transactions.pageLoad();

        var vm = banhji.reports;
        if(banhji.pageLoaded["cashs"]==undefined){
            banhji.pageLoaded["cashs"] = true;
        }

        vm.pageLoad();
    });
    banhji.router.route('/cash_center', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.cashs);

        var vm = banhji.accountingCenter;
        if(banhji.pageLoaded["cashs"]==undefined){
            banhji.pageLoaded["cashs"] = true;
        }

        vm.pageLoad();
    });

    banhji.router.route("/account(/:id)", function(id){
        banhji.accessMod.query({
            filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        }).then(function(e){
            var allowed = false;
            if(banhji.accessMod.data().length > 0) {
                for(var i = 0; i < banhji.accessMod.data().length; i++) {
                    if("accounting" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            }
            if(allowed) {
                var vm = banhji.account;
                banhji.userManagement.addMultiTask("Account","account",vm);

                banhji.view.layout.showIn("#content", banhji.view.account);
                // kendo.fx($("#slide-form")).slideIn("down").play();

                if(banhji.pageLoaded["account"]==undefined){
                    banhji.pageLoaded["account"] = true;

                    var validator = $("#example").kendoValidator({
                        rules: {
                            customRule1: function(input){
                                if (input.is("[name=txtNumber]")) {
                                    return vm.get("notDuplicateNumber");
                                }
                                return true;
                            }
                        },
                        messages: {
                            customRule1: banhji.source.duplicateNumber
                        }
                    }).data("kendoValidator");

                    $("#saveNew").click(function(e){
                        e.preventDefault();

                        if(validator.validate()){
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });

                    $("#saveClose").click(function(e){
                        e.preventDefault();

                        if(validator.validate()){
                            vm.set("saveClose", true);
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });
                }

                vm.pageLoad(id);
            } else {
                window.location.replace(baseUrl + "admin");
            }
        });
    });

    // Function
    banhji.router.route("/cash_transaction(/:id)", function(id){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            //banhji.view.layout.showIn('#content', banhji.view.Index);
            //banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
            //banhji.view.Index.showIn('#indexContent', banhji.view.cashTransaction);
            banhji.view.layout.showIn("#content", banhji.view.cashTransaction);

            var vm = banhji.cashTransaction;
            banhji.userManagement.addMultiTask("Cash Transaction","cash_transaction",vm);

            if(banhji.pageLoaded["cash_transaction"]==undefined){
                banhji.pageLoaded["cash_transaction"] = true;

                var validator = $("#example").kendoValidator({
                    rules: {
                        customRule1: function(input) {
                            if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
                                vm.set("recurring_validate", false);
                                return $.trim(input.val()) !== "";
                            }
                            return true;
                        },
                        customRule2: function(input){
                            if (input.is("[name=txtNumber]")) {
                                return vm.get("notDuplicateNumber");
                            }
                            return true;
                        }
                    },
                    messages: {
                        customRule1: banhji.source.requiredMessage,
                        customRule2: banhji.source.duplicateNumber
                    }
                }).data("kendoValidator");

                $("#saveDraft1").click(function(e){
                    e.preventDefault();

                    if(validator.validate()){
                        vm.set("saveDraft", true);
                        vm.save();
                    }else{
                        $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                    }
                });

                $("#saveNew").click(function(e){
                    e.preventDefault();

                    if(validator.validate()){
                        vm.save();
                    }else{
                        $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                    }
                });

                $("#saveClose").click(function(e){
                    e.preventDefault();

                    if(validator.validate()){
                        vm.set("saveClose", true);
                        vm.save();
                    }else{
                        $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                    }
                });

                $("#savePrint").click(function(e){
                    e.preventDefault();

                    if(validator.validate()){
                        vm.set("savePrint", true);
                        vm.save();
                    }else{
                        $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                    }
                });

                $("#saveDraftPrint").click(function(e){
                    e.preventDefault();

                    if(validator.validate()){
                        vm.set("saveDraftPrint", true);
                        vm.save();
                    }else{
                        $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                    }
                });

                $("#saveRecurring").click(function(e){
                    e.preventDefault();

                    vm.set("recurring_validate", true);

                    if(validator.validate()){
                        vm.set("saveRecurring", true);
                        vm.save();
                    }else{
                        $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                    }
                });
            }

            vm.pageLoad(id);
        }
    });
    banhji.router.route("/cash_advance(/:id)", function(id){
        banhji.view.layout.showIn("#content", banhji.view.cashAdvance);
        kendo.fx($("#slide-form")).slideIn("down").play();

        var vm = banhji.cashAdvance;
        banhji.userManagement.addMultiTask("Cash Advance","cash_advance",vm);

        if(banhji.pageLoaded["cash_advance"]==undefined){
            banhji.pageLoaded["cash_advance"] = true;

            var validator = $("#example").kendoValidator({
                rules: {
                    customRule1: function(input) {
                        if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
                            vm.set("recurring_validate", false);
                            return $.trim(input.val()) !== "";
                        }
                        return true;
                    },
                    customRule2: function(input){
                        if (input.is("[name=txtNumber]")) {
                            return vm.get("notDuplicateNumber");
                        }
                        return true;
                    }
                },
                messages: {
                    customRule1: banhji.source.requiredMessage,
                    customRule2: banhji.source.duplicateNumber
                }
            }).data("kendoValidator");

            $("#saveDraft1").click(function(e){
                e.preventDefault();

                if(validator.validate()){
                    vm.set("saveDraft", true);
                    vm.save();
                }else{
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });

            $("#saveNew").click(function(e){
                e.preventDefault();

                if(validator.validate()){
                    vm.save();
                }else{
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });

            $("#saveClose").click(function(e){
                e.preventDefault();

                if(validator.validate()){
                    vm.set("saveClose", true);
                    vm.save();
                }else{
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });

            $("#savePrint").click(function(e){
                e.preventDefault();

                if(validator.validate()){
                    vm.set("savePrint", true);
                    vm.save();
                }else{
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });

            $("#saveDraftPrint").click(function(e){
                e.preventDefault();

                if(validator.validate()){
                    vm.set("saveDraftPrint", true);
                    vm.save();
                }else{
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });

            $("#saveRecurring").click(function(e){
                e.preventDefault();

                vm.set("recurring_validate", true);

                if(validator.validate()){
                    vm.set("saveRecurring", true);
                    vm.save();
                }else{
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });
        }

        vm.pageLoad(id);
    });
    banhji.router.route("/expense(/:id)", function(id){
        banhji.view.layout.showIn("#content", banhji.view.expense);
        kendo.fx($("#slide-form")).slideIn("down").play();

        var vm = banhji.expense;
        banhji.userManagement.addMultiTask("Expense","expense",vm);

        if(banhji.pageLoaded["expense"]==undefined){
            banhji.pageLoaded["expense"] = true;

            var validator = $("#example").kendoValidator({
                rules: {
                    customRule1: function(input) {
                        if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
                            vm.set("recurring_validate", false);
                            return $.trim(input.val()) !== "";
                        }
                        return true;
                    },
                    customRule2: function(input){
                        if (input.is("[name=txtNumber]")) {
                            return vm.get("notDuplicateNumber");
                        }
                        return true;
                    }
                },
                messages: {
                    customRule1: banhji.source.requiredMessage,
                    customRule2: banhji.source.duplicateNumber
                }
            }).data("kendoValidator");

            $("#saveDraft1").click(function(e){
                e.preventDefault();

                if(validator.validate()){
                    vm.set("saveDraft", true);
                    vm.save();
                }else{
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });

            $("#saveNew").click(function(e){
                e.preventDefault();

                if(validator.validate() && vm.validating()){
                    vm.save();
                }else{
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });

            $("#saveClose").click(function(e){
                e.preventDefault();

                if(validator.validate() && vm.validating()){
                    vm.set("saveClose", true);
                    vm.save();
                }else{
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });

            $("#savePrint").click(function(e){
                e.preventDefault();

                if(validator.validate() && vm.validating()){
                    vm.set("savePrint", true);
                    vm.save();
                }else{
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });

            $("#saveDraftPrint").click(function(e){
                e.preventDefault();

                if(validator.validate() && vm.validating()){
                    vm.set("saveDraftPrint", true);
                    vm.save();
                }else{
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });

            $("#saveRecurring").click(function(e){
                e.preventDefault();

                vm.set("recurring_validate", true);

                if(validator.validate()){
                    vm.set("saveRecurring", true);
                    vm.save();
                }else{
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });
        }

        vm.pageLoad(id);
    });
    banhji.router.route("/journal(/:id)", function(id){
        // banhji.accessMod.query({
        //  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        // }).then(function(e){
        //  var allowed = false;
        //  if(banhji.accessMod.data().length > 0) {
        //      for(var i = 0; i < banhji.accessMod.data().length; i++) {
        //          if("accounting" == banhji.accessMod.data()[i].name.toLowerCase()) {
        //              allowed = true;
        //              break;
        //          }
        //      }
        //  }
        //  if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.journal);
                kendo.fx($("#slide-form")).slideIn("down").play();

                var vm = banhji.journal;
                banhji.userManagement.addMultiTask("Journal Entry","journal",vm);

                if(banhji.pageLoaded["journal"]==undefined){
                    banhji.pageLoaded["journal"] = true;

                    vm.lineDS.bind("change", vm.lineDSChanges);

                    var validator = $("#example").kendoValidator({
                        rules: {
                            customRule1: function(input) {
                                if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
                                    vm.set("recurring_validate", false);
                                    return $.trim(input.val()) !== "";
                                }
                                return true;
                            },
                            customRule2: function(input){
                                if (input.is("[name=txtNumber]")) {
                                    return vm.get("notDuplicateNumber");
                                }
                                return true;
                            }
                        },
                        messages: {
                            customRule1: banhji.source.requiredMessage,
                            customRule2: banhji.source.duplicateNumber
                        }
                    }).data("kendoValidator");

                    $("#saveDraft1").click(function(e){
                        e.preventDefault();

                        if(validator.validate()){
                            vm.set("saveDraft", true);
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });

                    $("#saveNew").click(function(e){
                        e.preventDefault();

                        if(validator.validate() && vm.validating()){
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });

                    $("#saveClose").click(function(e){
                        e.preventDefault();

                        if(validator.validate() && vm.validating()){
                            vm.set("saveClose", true);
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });

                    $("#savePrint").click(function(e){
                        e.preventDefault();

                        if(validator.validate() && vm.validating()){
                            vm.set("savePrint", true);
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });

                    $("#saveDraftPrint").click(function(e){
                        e.preventDefault();

                        if(validator.validate() && vm.validating()){
                            vm.set("saveDraftPrint", true);
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });

                    $("#saveRecurring").click(function(e){
                        e.preventDefault();

                        vm.set("recurring_validate", true);

                        if(validator.validate() && vm.validating()){
                            vm.set("saveRecurring", true);
                            vm.save();
                        }else{
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });
                }

                vm.pageLoad(id);
        //  } else {
        //      window.location.replace(baseUrl + "admin");
        //  }
        // });
    });
    banhji.router.route("/currency_rate", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.currencyRate);
            kendo.fx($("#slide-form")).slideIn("down").play();

            var vm = banhji.currencyRate;
            banhji.userManagement.addMultiTask("Currency Rate","currency_rate",null);

            if(banhji.pageLoaded["currency_rate"]==undefined){
                banhji.pageLoaded["currency_rate"] = true;
            }

            vm.pageLoad();
        }
    });
    
    banhji.router.route("/general_ledger", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.generalLedger);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.accountingMenu);

            var vm = banhji.generalLedger;
            banhji.userManagement.addMultiTask("General Ledger","general_ledger",null);

            if(banhji.pageLoaded["general_ledger"]==undefined){
                banhji.pageLoaded["general_ledger"] = true;

            }

            vm.pageLoad();
        }
    });
    banhji.router.route("/general_ledger_by_segment", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.generalLedgerBySegment);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.accountingMenu);

            var vm = banhji.generalLedgerBySegment;
            banhji.userManagement.addMultiTask("General Ledger By Segment","general_ledger_by_segment",null);

            if(banhji.pageLoaded["general_ledger_by_segment"]==undefined){
                banhji.pageLoaded["general_ledger_by_segment"] = true;

                vm.sorterChanges();
            }

            vm.pageLoad();
        }
    });

    banhji.router.route("/cash_movement", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.cashMovement);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            //banhji.view.menu.showIn('#secondary-menu', banhji.view.accountingMenu);
            let self = this;
            // this.cashAccount= [];
            var vm = banhji.cashMovement;
            // banhji.source.loadAcct()
            // .then(function(data){
            //  self.cashAccount = data.filter(function(x){
            //      return x.account_type_id == 10;
            //  }).map(function(value){
            //      return value.id;
            //  });
            //  vm.dataSource.filter({
            //      field:'account_id', operator:'where_in', value:self.cashAccount
            //  });
            //  // console.log(self.cashAccount);
            // });

            // if(banhji.source.accountList.length>0) {
            //  var cashAccount = banhji.source.accountList.map(function(x){
            //  return x;
            //  });
            //  console.log(cashAccount);
            // } else {
            //  console.log('no data');
            // }

            banhji.userManagement.addMultiTask("Cash Movement","cash_movement",null);

            if(banhji.pageLoaded["cash_movement"]==undefined){
                banhji.pageLoaded["cash_movement"] = true;

            }

            vm.pageLoad();
        }
    });
    banhji.router.route("/collection_report", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            var vm = banhji.collectionReport;
            banhji.userManagement.addMultiTask("Collection Report","collection_report",null);
            banhji.view.layout.showIn("#content", banhji.view.collectionReport);

            if(banhji.pageLoaded["collection_report"]==undefined){
                banhji.pageLoaded["collection_report"] = true;

                vm.sorterChanges();
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/cash_advance_report", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            var vm = banhji.cashAdvanceReport;
            banhji.userManagement.addMultiTask("Cash Advance Report","cash_advance_report",null);
            banhji.view.layout.showIn("#content", banhji.view.cashAdvanceReport);

            if(banhji.pageLoaded["cash_advance_report"]==undefined){
                banhji.pageLoaded["cash_advance_report"] = true;

                vm.sorterChanges();
            }
            banhji.cashAdvanceReport.dataSource.bind('requestEnd', function(e){
                if(e.response) {
                    banhji.cashAdvanceReport.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.cashAdvanceReport.set('people', kendo.toString(e.response.people, 'n0'));
                }
            });
            vm.pageLoad();
        }
    });
    banhji.router.route("/bill_payment_list", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            var vm = banhji.billPaymentList;
            banhji.userManagement.addMultiTask("List of Payment","bill_payment_list", null);
            banhji.view.layout.showIn("#content", banhji.view.billPaymentList);

            if(banhji.pageLoaded["bill_payment_list"]==undefined){
                banhji.pageLoaded["bill_payment_list"] = true;

                vm.sorterChanges();
            }
            vm.pageLoad();
        }
    });
    
   
    $(function() {
        banhji.router.start();
        banhji.source.pageLoad();
    });
</script>