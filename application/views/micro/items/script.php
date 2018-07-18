<script>
    //-----------------------------------------
    banhji.Index = kendo.observable({
        lang     : langVM
    });
    banhji.tapMenu =  kendo.observable({
        lang                : langVM,
        // goReports          : function(){
        //     banhji.router.navigate('/reports');
        // },
        // goCheckOut         : function(){
        //     banhji.router.navigate('/check_out');
        // },
        // goTransactions      : function(){
        //     banhji.router.navigate('/transactions');
        // },
        goMenuItems        : function(){
            banhji.router.navigate('/');
        },
        goInventoryPositionSummary  :function(){
            banhji.router.navigate('/inventory_position_summary');
        },
        goInventoryPositionDetail  :function(){
            banhji.router.navigate('/inventory_position_detail');
        },
    });
    banhji.reports = kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "inventory_modules/dashboard"),
        graphDS             : dataStore(apiUrl + "inventory_modules/monthly_item_purchase_sale"),
        obj                 : {},
        pageLoad            : function(){
            this.loadData();
        },
        loadData            : function(){
            var self = this;

            this.graphDS.read();

            this.dataSource.query({
                filter: []
            }).then(function(){
                var view = self.dataSource.view();

                self.set("obj", view[0]);
            });
        }
    });

    banhji.items = kendo.observable({
        lang                : langVM,
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
            filter:[
                { field:"item_type_id <>", value: 3 },
                { field:"item_type_id <>", value: 5 }
            ],
            sort:[
                { field:"item_type_id", dir:"asc" },
                { field:"id", dir:"asc" }
            ],
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        dataSource          : dataStore(apiUrl + "inventory_modules/center"),
        transactionDS       : dataStore(apiUrl + "items/movement"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        categoryDS          : new kendo.data.DataSource({
            data: banhji.source.categoryList,
            filter:[
                { field:"item_type_id", operator:"neq", value: 2 },
                { field:"item_type_id", operator:"neq", value: 3 },
                { field:"item_type_id", operator:"neq", value: 5 }
            ]
        }),
        sortList            : banhji.source.sortList,
        sorter              : "all",
        sdate               : "",
        edate               : "",
        obj                 : null,
        raw                 : null,
        searchText          : "",
        pageLoad            : function(id){
            if(id){
                this.loadObj(id);
            }

            //Refresh
            if(this.itemDS.total()>0){
                this.itemDS.fetch();
                this.transactionDS.fetch();
            }
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
                        item_id         : obj.id,
                        type            : "Item",
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
        //Obj
        loadObj             : function(id){
            var self = this;

            this.itemDS.query({
                filter: { field:"id", value:id},
                page:1,
                pageSize:100
            }).then(function(){
                var view = self.itemDS.view();

                if(view.length>0){
                    self.set("obj", view[0]);
                    self.loadData();
                }
            });
        },
        loadData            : function(){
            var self = this, obj = this.get("obj");

            if(obj!==null){
                this.searchTransaction();

                this.dataSource.query({
                    filter: { field:"id", value: obj.id }
                }).then(function(){
                    var view = self.dataSource.view();

                    self.set("raw", view[0]);
                });

                this.attachmentDS.query({
                    filter:{ field:"item_id", value: obj.id },
                    page: 1,
                    pageSize:10
                });
            }
        },
        selectedRow         : function(e){
            var self = this, data = e.data;

            this.set("obj", data);
            this.loadData();
        },
        sorterChanges       : function(){
            var value = this.get("sorter");

            switch(value){
            case "today":
                var today = new Date();

                this.set("sdate", today);
                this.set("edate", today);

                break;
            case "week":
                var thisWeek = new Date;
                var first = thisWeek.getDate() - thisWeek.getDay();
                var last = first + 6;

                var firstDayOfWeek = new Date(thisWeek.setDate(first));
                var lastDayOfWeek = new Date(thisWeek.setDate(last));

                this.set("sdate", firstDayOfWeek);
                this.set("edate", lastDayOfWeek);

                break;
            case "month":
                var thisMonth = new Date;
                var firstDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth(), 1);
                var lastDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth() + 1, 0);

                this.set("sdate", firstDayOfMonth);
                this.set("edate", lastDayOfMonth);

                break;
            case "year":
                var thisYear = new Date();
                var firstDayOfYear = new Date(thisYear.getFullYear(), 0, 1);
                var lastDayOfYear = new Date(thisYear.getFullYear(), 11, 31);

                this.set("sdate", firstDayOfYear);
                this.set("edate", lastDayOfYear);

                break;
            default:
                this.set("sdate", "");
                this.set("edate", "");
            }
        },
        search              : function(){
            var self = this,
            para = [],
            searchText = this.get("searchText"),
            category_id = this.get("category_id");

            if(searchText){
                var textParts = searchText.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);

                para.push(
                    // { field: "abbr", operator: "or_like", value: textParts[0] },
                    // { field: "number", value: textParts[1] },
                    { field: "number", operator: "startswith", value: searchText },
                    { field: "name", operator: "or_like", value: searchText }
                );
            }

            if(category_id){
                para.push({ field:"category_id", value:category_id });
            }

            // para.push({ field:"item_type_id", value:1 });
            // para.push({ field:"is_catalog", value: 0 });
            // para.push({ field:"is_assembly", value: 0 });

            this.itemDS.filter(para);

            this.set("searchText", "");
            this.set("category_id", 0);
        },
        searchTransaction   : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate");

            if(obj!==null){
                para.push({ field:"item_id", value: obj.id });

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
            }
        },
        goEdit                : function(){
            var obj = this.get("obj");

            if(obj!==null){
                if(obj.item_type_id=="1"){
                    if(obj.is_catalog=="1"){
                        banhji.router.navigate('/item_catalog/'+obj.id);
                    }else if(obj.is_assembly=="1"){
                        banhji.router.navigate('/item_assembly/'+obj.id);
                    }else{
                        banhji.router.navigate('/item/'+obj.id);
                    }
                }else if(obj.item_type_id=="2"){
                    banhji.router.navigate('/non_inventory_part/'+obj.id);
                }else if(obj.item_type_id=="3"){
                    banhji.router.navigate('/fixed_assets/'+obj.id);
                }else if(obj.item_type_id=="4"){
                    banhji.router.navigate('/item_service/'+obj.id);
                }else if(obj.item_type_id=="5"){
                    banhji.router.navigate('/txn_item/'+obj.id);
                }else{

                }
            }
        },
        pricing             : function(){
            var obj = this.get("obj");

            if(obj!==null){
                if(obj.is_catalog=="1"){
                    banhji.router.navigate('/item_catalog/'+obj.id);
                }else if(obj.is_assembly=="1"){
                    banhji.router.navigate('/item_assembly/'+obj.id);
                }else{
                    banhji.router.navigate('/item_prices/'+obj.id);
                }
            }
        },
        variant             : function(){
            var obj = this.get("obj");

            if(obj!==null){
                if(obj.variant.length>0){
                    banhji.router.navigate('/item_variant/'+obj.sub_of_id);
                }
            }
        }
    });

    // Function
    banhji.item = kendo.observable({
        lang                    : langVM,
        dataSource              : dataStore(apiUrl + "items"),
        patternDS               : dataStore(apiUrl + "items"),
        numberDS                : dataStore(apiUrl + "items"),
        deleteDS                : dataStore(apiUrl + "item_lines"),
        attachmentDS            : dataStore(apiUrl + "attachments"),
        itemPriceDS             : dataStore(apiUrl + "item_prices"),
        itemVendorDS            : dataStore(apiUrl + "items/contact"),
        itemCustomerDS          : dataStore(apiUrl + "items/contact"),
        itemVariantDS           : dataStore(apiUrl + "item_variants"),
        generateVariantDS       : dataStore(apiUrl + "item_variants/generate"),
        itemGroupDS             : banhji.source.itemGroupDS,
        brandDS                 : banhji.source.brandDS,
        measurementDS           : banhji.source.measurementDS,
        currencyDS              : new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: { field:"status", value: 1 }
        }),
        vendorDS                : banhji.source.supplierDS,
        customerDS              : banhji.source.customerDS,
        categoryDS              : new kendo.data.DataSource({
            data: banhji.source.categoryList,
            filter: [
                { field:"item_type_id", value: 1 },
                { field:"id", operator:"neq", value: 5 },
                { field:"id", operator:"neq", value: 6 }
            ]
        }),
        incomeAccountDS         : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: {
                logic: "or",
                filters: [
                    { field: "account_type_id", value: 35 },
                    { field: "account_type_id", value: 39 }
                ]
            },
            sort: { field:"number", dir:"asc" }
        }),
        cogsAccountDS           : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter:{ field:"account_type_id", value: 36 },
            sort: { field:"number", dir:"asc" }
        }),
        inventoryAccountDS      : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter:{ field:"account_type_id", value: 13 },
            sort: { field:"number", dir:"asc" }
        }),
        statusList              : banhji.source.statusList,
        confirmMessage          : banhji.source.confirmMessage,
        tagList                 : [],
        obj                     : [],
        isEdit                  : false,
        saveClose               : false,
        showConfirm             : false,
        isLock                  : false,
        notDuplicateNumber      : true,
        variantDisplay          : false,
        subcribedAdvanceInventory : true,
        user_id                 : banhji.source.user_id,
        pageLoad                : function(id, category_id){
            if(id){
                this.set("isEdit", true);
                this.loadObj(id, category_id);
                this.checkExistingTxn(id);
            }else{
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                }
            }
        },
        accessModule            : function(){
            // if(banhji.source.checkAccessModule("Advance Inventory")){
            //  this.set("subcribedAdvanceInventory", true);
            // }else{
            //  this.set("subcribedAdvanceInventory", false);
            // }
        },
        //Upload
        onSelect                : function(e){
            // Array with information about the uploaded files
            var self = this,
            files = e.files[0],
            obj = this.get("obj");

            var fileReader = new FileReader();
            fileReader.onload = function (event) {
                var mapImage = event.target.result;
                self.obj.set('image_url', mapImage);
            }
            fileReader.readAsDataURL(files.rawFile);

            // Check the extension of each file and abort the upload if it is not .jpg
            if (files.extension.toLowerCase() === ".jpg"
                || files.extension.toLowerCase() === ".jpeg"
                || files.extension.toLowerCase() === ".tiff"
                || files.extension.toLowerCase() === ".png"
                || files.extension.toLowerCase() === ".gif"){

                if(this.attachmentDS.total()>0){
                    var att = this.attachmentDS.at(0);
                    this.attachmentDS.remove(att);
                }

                var key = 'ITEM_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

                this.attachmentDS.add({
                    user_id         : this.get("user_id"),
                    item_id         : obj.id,
                    type            : "Item",
                    name            : files.name,
                    description     : "",
                    key             : key,
                    url             : banhji.s3 + key,
                    size            : files.size,
                    created_at      : new Date(),

                    file            : files.rawFile
                });
            }else{
                alert("This type of file is not allowed to attach.");
            }
        },
        saveAttachment          : function(){
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
        //Pattern
        loadPattern             : function(){
            var self = this, obj = self.get("obj"),
            cat = this.categoryDS.get(obj.category_id);

            this.patternDS.query({
                filter: [
                    { field:"category_id", value: obj.category_id },
                    { field:"is_pattern", value: 1 }
                ],
                page: 1,
                pageSize: 1
            }).then(function(data){
                var view = self.patternDS.view();

                if(view.length>0){
                    obj.set("item_group_id", view[0].item_group_id);
                    obj.set("brand_id", view[0].brand_id);
                    obj.set("measurement_id", view[0].measurement_id);
                    obj.set("abbr", cat.abbr);
                    obj.set("number", "");
                    obj.set("international_code", view[0].international_code);
                    obj.set("color_code", view[0].color_code);
                    obj.set("name", "");
                    obj.set("purchase_description", view[0].purchase_description);
                    obj.set("sale_description", view[0].sale_description);
                    obj.set("measurements", view[0].measurements);
                    obj.set("cost", view[0].cost);
                    obj.set("price", view[0].price);
                    obj.set("locale", view[0].locale);
                    obj.set("order_point", view[0].order_point);
                    obj.set("income_account_id", view[0].income_account_id);
                    obj.set("expense_account_id", view[0].expense_account_id);
                    obj.set("inventory_account_id", view[0].inventory_account_id);
                    obj.set("favorite", view[0].favorite);
                }else{
                    obj.set("item_group_id", "");
                    obj.set("brand_id", "");
                    obj.set("measurement_id", "");
                    obj.set("abbr", "");
                    obj.set("number", "");
                    obj.set("international_code", "");
                    obj.set("color_code", "");
                    obj.set("name", "");
                    obj.set("purchase_description", "");
                    obj.set("sale_description", "");
                    obj.set("measurements", "");
                    obj.set("cost", "");
                    obj.set("price", "");
                    obj.set("locale", "");
                    obj.set("order_point", "");
                    obj.set("income_account_id", "");
                    obj.set("expense_account_id", "");
                    obj.set("inventory_account_id", "");
                    obj.set("favorite", false);
                }
            });
        },
        //Number
        checkExistingNumber     : function(){
            var self = this, para = [],
            obj = this.get("obj");

            if(obj.number!==""){

                if(this.get("isEdit")){
                    para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
                }

                para.push({ field:"abbr", value: obj.abbr });
                para.push({ field:"number", value: obj.number });
                para.push({ field:"category_id", value: obj.category_id });

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
            var self = this, obj = this.get("obj");

            this.numberDS.query({
                filter:[
                    { field:"category_id", value:obj.category_id }
                ],
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
        categoryChanges         : function(){
            var obj = this.get("obj");

            if(obj.category_id && obj.isNew()){
                this.loadPattern();
                this.generateNumber();

                var cat = this.categoryDS.get(obj.category_id);

                if(jQuery.inArray( cat.name, obj.tags )==-1){
                    this.tagList.push(cat.name);
                    obj.tags.push(cat.name);
                }
            }
        },
        //Item Contact
        loadItemContact         : function(){
            var obj = this.get("obj");

            this.itemVendorDS.query({
                filter: [
                    { "field":"item_id", value: obj.id },
                    { "field":"type", value: "vendor" }
                ],
                page: 1,
                pageSize: 100
            });

            this.itemCustomerDS.query({
                filter: [
                    { "field":"item_id", value: obj.id },
                    { "field":"type", value: "customer" }
                ],
                page: 1,
                pageSize: 100
            });
        },
        addEmptyItemVendor      : function(){
            var obj = this.get("obj");

            this.itemVendorDS.add({
                item_id     : obj.id,
                contact_id  : "",
                code        : "",
                type        : "vendor"
            });
        },
        deleteItemVendor        : function(e){
            if (confirm("Are you sure, you want to delete it?")) {
                var d = e.data,
                obj = this.itemVendorDS.getByUid(d.uid);

                this.itemVendorDS.remove(obj);
            }
        },
        addEmptyItemCustomer    : function(){
            var obj = this.get("obj");

            this.itemCustomerDS.add({
                item_id     : obj.id,
                contact_id  : "",
                code        : "",
                type        : "customer"
            });
        },
        deleteItemCustomer      : function(e){
            if (confirm("Are you sure, you want to delete it?")) {
                var d = e.data,
                obj = this.itemCustomerDS.getByUid(d.uid);

                this.itemCustomerDS.remove(obj);
            }
        },
        checkExistingTxn        : function(id){
            var self = this;

            this.deleteDS.query({
                filter: { field: "item_id", value: id },
                page: 1,
                pageSize: 1
            }).then(function() {
                var view = self.deleteDS.view();

                if(view.length>0){
                    self.set("isLock", true);
                }else{
                    self.set("isLock", false);
                }
            });
        },
        tagChanges              : function(e){
            var obj = this.get("obj"),
                filter = e.filter;

            if(filter){
                this.tagList.push(filter.value);
            }
        },
        //Obj
        loadObj                 : function(id, category_id){
            var self = this, para = [];

            if(id>0){
                para.push({ field:"id", value: id });
            }

            if(category_id){
                para.push({ field:"category_id", value: category_id });
                para.push({ field:"is_pattern", value: 1 });
            }

            para.push({ field:"nature", value: "" });

            this.dataSource.query({
                filter: para,
            }).then(function(e){
                var view = self.dataSource.view();

                self.set("obj", view[0]);
                self.set("tagList", view[0].tags);
                self.loadItemContact();

                self.set("variantDisplay", false);
                if(view[0].nature=="variant"){
                    self.set("variantDisplay", true);
                }
            });

            this.itemVariantDS.filter({ field:"item_id", value: id });
            this.attachmentDS.filter({ field:"item_id", value: id });
        },
        addVariant              : function(){
            var obj = this.get("obj");

            this.itemVariantDS.add({
                item_id                 : obj.id,
                variant_attribute_id    : 0,
                variants                : [],
                variant_attribute       : { id:0, name:"" }
            });
        },
        generateVariant         : function(){
            var triats = [];

            $.each(this.itemVariantDS.data(), function(index, value){
                $.each(value.variants, function(ind, val){
                    triats.push(val);
                });
            });

            console.log(triats);

            this.generateVariantDS.query({
                filter: { field: "variant", value: triats }
            });
        },
        addEmpty                : function(){
            var self = this;

            this.dataSource.data([]);
            this.itemVariantDS.data([]);
            this.itemVendorDS.data([]);
            this.itemCustomerDS.data([]);

            this.set("isLock", false);
            this.set("isEdit", false);
            this.set("obj", null);
            self.set("variantDisplay", false);
            
            this.patternDS.query({
                filter:[
                    { field:"category_id", value:1 },
                    { field:"is_pattern", value:1 }
                ],
                page:1,
                pageSize:1
            }).then(function(){
                var view = self.patternDS.view(),
                cat = self.categoryDS.at(0);
                self.tagList.push(cat.name);

                self.dataSource.insert(0, {
                    item_type_id            : 1,//Inventory Part
                    category_id             : view[0].category_id,
                    item_group_id           : view[0].item_group_id,
                    brand_id                : view[0].brand_id,
                    measurement_id          : view[0].measurement_id,
                    abbr                    : cat.abbr,
                    number                  : "",
                    international_code      : view[0].international_code,
                    color_code              : view[0].color_code,
                    name                    : "",
                    purchase_description    : view[0].purchase_description,
                    sale_description        : view[0].sale_description,
                    measurements            : view[0].measurements,
                    cost                    : view[0].cost,
                    price                   : view[0].price,
                    locale                  : view[0].locale,
                    order_point             : view[0].order_point,
                    income_account_id       : view[0].income_account_id,
                    expense_account_id      : view[0].expense_account_id,
                    inventory_account_id    : view[0].inventory_account_id,
                    image_url               : banhji.no_image,
                    favorite                : view[0].favorite,
                    tags                    : [cat.name],
                    nature                  : "",
                    is_pattern              : 0,
                    status                  : 1,
                    deleted                 : 0,

                    variant                 : []
                });

                var obj = self.dataSource.at(0);
                //Pattern
                // if(self.get("contact_type_id")>0){
                //  obj.set("contact_type_id", self.get("contact_type_id"));
                //  obj.set("abbr", "");
                //  obj.set("is_pattern", 1);
                // }

                self.set("obj", obj);
                self.generateNumber();
            });
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

            //Variant
            if(this.itemVariantDS.total()>0){
                obj.set("nature", "main_variant");

                $.each(this.itemVariantDS.data(), function(index, value){
                    value.set("item_id", obj.id);
                    value.set("variant_attribute_id", value.variant_attribute.id);
                });
            }else{
                obj.set("nature", "");
            }

            //Edit Mode
            if(obj.isNew()==false){
                obj.set("dirty", true);
            }

            //Attachment
            if(this.attachmentDS.total()>0){
                var att = this.attachmentDS.at(0);
                obj.set("image_url", att.url);
            }

            //Save Obj
            this.objSync()
            .then(function(data){ //Success
                if(self.get("isEdit")==false){
                    $.each(self.itemVariantDS.data(), function(index, value){
                        value.set("item_id", data[0].id);
                        value.set("variant_attribute_id", value.variant_attribute.id);
                    });

                    $.each(self.itemVendorDS.data(), function(index, value){
                        value.set("item_id", data[0].id);
                    });

                    $.each(self.itemCustomerDS.data(), function(index, value){
                        value.set("item_id", data[0].id);
                    });

                    //Attachment
                    $.each(self.attachmentDS.data(), function(index, value){
                        value.set("item_id", data[0].id);
                    });
                }

                self.itemVariantDS.sync();
                self.itemVendorDS.sync();
                self.itemCustomerDS.sync();
                self.saveAttachment();

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
            });
        },
        cancel                  : function(){
            this.dataSource.cancelChanges();
            this.itemVariantDS.cancelChanges();
            this.itemVendorDS.cancelChanges();
            this.itemCustomerDS.cancelChanges();

            this.dataSource.data([]);
            this.itemVariantDS.data([]);
            this.itemVendorDS.data([]);
            this.itemCustomerDS.data([]);

            this.set("tagList", []);

            banhji.userManagement.removeMultiTask("item");
        },
        delete                  : function(){
            var self = this, obj = this.get("obj");
            this.set("showConfirm",false);

            if(!obj.is_system==1){
                this.deleteDS.query({
                    filter: { field: "item_id", value: obj.id },
                    page: 1,
                    pageSize: 1
                }).then(function() {
                    var view = self.deleteDS.view();

                    if(view.length>0){
                        alert("Sorry, you can not delete it because it is using now.");
                    }else{
                        obj.set("deleted", 1);
                        self.dataSource.sync();

                        window.history.back();
                    }
                });
            }else{
                alert("Sorry, you can not delete it because it is system's item.");
            }
        },
        openConfirm             : function(){
            this.set("showConfirm", true);
        },
        closeConfirm            : function(){
            this.set("showConfirm", false);
        }
    });
    banhji.itemService =  kendo.observable({
        lang                    : langVM,
        dataSource              : dataStore(apiUrl + "items"),
        patternDS               : dataStore(apiUrl + "items"),
        numberDS                : dataStore(apiUrl + "items"),
        deleteDS                : dataStore(apiUrl + "item_lines"),
        itemGroupDS             : dataStore(apiUrl + "items/group"),
        itemVendorDS            : dataStore(apiUrl + "items/contact"),
        itemCustomerDS          : dataStore(apiUrl + "items/contact"),
        attachmentDS            : dataStore(apiUrl + "attachments"),
        currencyDS              : new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: { field:"status", value: 1 }
        }),
        categoryDS              : new kendo.data.DataSource({
            data: banhji.source.categoryList,
            filter: { field:"item_type_id", value: 4 }//Service
        }),
        measurementDS           : banhji.source.measurementDS,
        vendorDS                : banhji.source.supplierDS,
        customerDS              : banhji.source.customerDS,
        incomeAccountDS         : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: {
                logic: "or",
                filters: [
                    { field: "account_type_id", value: 35 },
                    { field: "account_type_id", value: 39 }
                ]
            },
            sort: { field:"number", dir:"asc" }
        }),
        cogsAccountDS           : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: {
                logic: "or",
                filters: [
                    { field: "account_type_id", value: 36 },//Expense
                    { field: "account_type_id", value: 37 },
                    { field: "account_type_id", value: 38 },
                    { field: "account_type_id", value: 40 },
                    { field: "account_type_id", value: 41 },
                    { field: "account_type_id", value: 42 },
                    { field: "account_type_id", value: 43 }
                ]
            },
            sort: { field:"number", dir:"asc" }
        }),
        statusList              : banhji.source.statusList,
        confirmMessage          : banhji.source.confirmMessage,
        obj                     : null,
        isEdit                  : false,
        isLock                  : false,
        saveClose               : false,
        showConfirm             : false,
        notDuplicateNumber      : true,
        pageLoad                : function(id, category_id){
            if(id){
                this.set("isEdit", true);
                this.loadObj(id, category_id);
                this.checkExistingTxn(id);
            }else{
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                }
            }
        },
        //Upload
        onSelect                : function(e){
            // Array with information about the uploaded files
            var self = this,
            files = e.files[0],
            obj = this.get("obj");

            var fileReader = new FileReader();
            fileReader.onload = function (event) {
                var mapImage = event.target.result;
                self.obj.set('image_url', mapImage);
            }
            fileReader.readAsDataURL(files.rawFile);

            // Check the extension of each file and abort the upload if it is not .jpg
            if (files.extension.toLowerCase() === ".jpg"
                || files.extension.toLowerCase() === ".jpeg"
                || files.extension.toLowerCase() === ".tiff"
                || files.extension.toLowerCase() === ".png"
                || files.extension.toLowerCase() === ".gif"){

                if(this.attachmentDS.total()>0){
                    var att = this.attachmentDS.at(0);
                    this.attachmentDS.remove(att);
                }

                var key = 'ITEM_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

                this.attachmentDS.add({
                    user_id         : this.get("user_id"),
                    item_id         : obj.id,
                    type            : "Item",
                    name            : files.name,
                    description     : "",
                    key             : key,
                    url             : banhji.s3 + key,
                    size            : files.size,
                    created_at      : new Date(),

                    file            : files.rawFile
                });
            }else{
                alert("This type of file is not allowed to attach.");
            }
        },
        saveAttachment          : function(){
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
        //Pattern
        loadPattern             : function(){
            var self = this, obj = self.get("obj"),
            cat = this.categoryDS.get(obj.category_id);

            this.patternDS.query({
                filter: [
                    { field:"category_id", value: obj.category_id },
                    { field:"is_pattern", value: 1 }
                ],
                page: 1,
                pageSize: 1
            }).then(function(data){
                var view = self.patternDS.view();

                if(view.length>0){
                    obj.set("measurement_id", view[0].measurement_id),
                    obj.set("abbr", cat.abbr),
                    obj.set("price", view[0].price);
                    obj.set("cost", view[0].cost);
                    obj.set("locale", view[0].locale);
                    obj.set("purchase_description", view[0].purchase_description),
                    obj.set("sale_description", view[0].sale_description),
                    obj.set("income_account_id", view[0].income_account_id);
                    obj.set("expense_account_id", view[0].expense_account_id);
                }else{
                    obj.set("measurement_id", 0),
                    obj.set("abbr", ""),
                    obj.set("price", view[0].price);
                    obj.set("cost", view[0].cost);
                    obj.set("locale", banhji.locale);
                    obj.set("purchase_description", ""),
                    obj.set("sale_description", ""),
                    obj.set("income_account_id", 0);
                    obj.set("expense_account_id", 0);
                }
            });
        },
        //Number
        checkExistingNumber     : function(){
            var self = this, para = [],
            obj = this.get("obj");

            if(obj.number!==""){

                if(this.get("isEdit")){
                    para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
                }

                para.push({ field:"abbr", value: obj.abbr });
                para.push({ field:"number", value: obj.number });
                para.push({ field:"category_id", value: obj.category_id });

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
            var self = this, obj = this.get("obj");

            this.numberDS.query({
                filter:[
                    { field:"category_id", value:obj.category_id }
                ],
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
        categoryChanges         : function(){
            var obj = this.get("obj");

            if(obj.category_id && obj.isNew()){
                this.loadPattern();
                this.generateNumber();
            }
        },
        //Item Contact
        loadItemContact         : function(){
            var obj = this.get("obj");

            this.itemVendorDS.query({
                filter: [
                    { "field":"item_id", value: obj.id },
                    { "field":"type", value: "vendor" }
                ],
                page: 1,
                pageSize: 100
            });

            this.itemCustomerDS.query({
                filter: [
                    { "field":"item_id", value: obj.id },
                    { "field":"type", value: "customer" }
                ],
                page: 1,
                pageSize: 100
            });
        },
        addEmptyItemVendor      : function(){
            var item_id = 0;
            if(this.get("isEdit")){
                item_id = this.get("obj").id;
            }

            this.itemVendorDS.add({
                item_id     : item_id,
                contact_id  : "",
                code        : "",
                type        : "vendor"
            });
        },
        deleteItemVendor        : function(e){
            if (confirm("Are you sure, you want to delete it?")) {
                var d = e.data,
                obj = this.itemVendorDS.getByUid(d.uid);

                this.itemVendorDS.remove(obj);
            }
        },
        addEmptyItemCustomer    : function(){
            var item_id = 0;
            if(this.get("isEdit")){
                item_id = this.get("obj").id;
            }

            this.itemCustomerDS.add({
                item_id     : item_id,
                contact_id  : "",
                code        : "",
                type        : "customer"
            });
        },
        deleteItemCustomer      : function(e){
            if (confirm("Are you sure, you want to delete it?")) {
                var d = e.data,
                obj = this.itemCustomerDS.getByUid(d.uid);

                this.itemCustomerDS.remove(obj);
            }
        },
        checkExistingTxn        : function(id){
            var self = this;

            this.deleteDS.query({
                filter: { field: "item_id", value: id },
                page: 1,
                pageSize: 1
            }).then(function() {
                var view = self.deleteDS.view();

                if(view.length>0){
                    self.set("isLock", true);
                }else{
                    self.set("isLock", false);
                }
            });
        },
        //Obj
        loadObj                 : function(id, category_id){
            var self = this, para = [];

            if(id>0){
                para.push({ field:"id", value: id });
            }

            if(category_id){
                para.push({ field:"category_id", value: category_id });
                para.push({ field:"is_pattern", value: 1 });
            }

            this.dataSource.query({
                filter: para,
            }).then(function(e){
                var view = self.dataSource.view();

                self.set("obj", view[0]);
                self.loadItemContact();
            });
        },
        addEmpty                : function(){
            var self = this;

            this.dataSource.data([]);
            this.itemVendorDS.data([]);
            this.itemCustomerDS.data([]);

            this.set("isLock", false);
            this.set("isEdit", false);
            this.set("obj", null);

            this.patternDS.query({
                filter:[
                    { field:"category_id", value: 3 },
                    { field:"is_pattern", value: 1 }
                ],
                page:1,
                pageSize:1
            }).then(function(){
                var view = self.patternDS.view(),
                cat = self.categoryDS.get(view[0].category_id);

                self.dataSource.insert(0, {
                    item_type_id            : 4,//Service
                    category_id             : view[0].category_id,
                    item_group_id           : view[0].item_group_id,
                    measurement_id          : view[0].measurement_id,
                    abbr                    : cat.abbr,
                    number                  : "",
                    name                    : "",
                    price                   : view[0].price,
                    cost                    : view[0].cost,
                    locale                  : view[0].locale,
                    purchase_description    : view[0].purchase_description,
                    sale_description        : view[0].sale_description,
                    income_account_id       : view[0].income_account_id,
                    expense_account_id      : view[0].expense_account_id,
                    image_url               : banhji.no_image,
                    favorite                : view[0].favorite,
                    is_pattern              : 0,
                    status                  : 1
                });

                var obj = self.dataSource.at(0);
                //Pattern
                // if(self.get("contact_type_id")>0){
                //  obj.set("contact_type_id", self.get("contact_type_id"));
                //  obj.set("abbr", "");
                //  obj.set("is_pattern", 1);
                // }

                self.set("obj", obj);
                self.generateNumber();
            });
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

            //Edit Mode
            if(this.get("isEdit")){
                //Contact Item has changes
                if(this.itemVendorDS.hasChanges() || this.itemCustomerDS.hasChanges()){
                    obj.set("dirty", true);
                }
            }

            //Attachment
            if(this.attachmentDS.total()>0){
                var att = this.attachmentDS.at(0);
                obj.set("image_url", att.url);
            }

            //Save Obj
            this.objSync()
            .then(function(data){ //Success
                if(self.get("isEdit")==false){
                    $.each(self.itemVendorDS.data(), function(index, value){
                        value.set("item_id", data[0].id);
                    });

                    $.each(self.itemCustomerDS.data(), function(index, value){
                        value.set("item_id", data[0].id);
                    });

                    //Attachment
                    $.each(self.attachmentDS.data(), function(index, value){
                        value.set("item_id", data[0].id);
                    });
                }

                self.itemVendorDS.sync();
                self.itemCustomerDS.sync();
                self.saveAttachment();

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
            });
        },
        cancel                  : function(){
            this.dataSource.cancelChanges();
            this.itemVendorDS.cancelChanges();
            this.itemCustomerDS.cancelChanges();

            this.dataSource.data([]);
            this.itemVendorDS.data([]);
            this.itemCustomerDS.data([]);

            banhji.userManagement.removeMultiTask("item_service");
        },
        delete                  : function(){
            var self = this, obj = this.get("obj");
            this.set("showConfirm",false);

            if(!obj.is_system==1){
                this.deleteDS.query({
                    filter: { field: "item_id", value: obj.id },
                    page: 1,
                    pageSize: 1
                }).then(function() {
                    var view = self.deleteDS.view();

                    if(view.length>0){
                        alert("Sorry, you can not delete it because it is using now.");
                    }else{
                        obj.set("deleted", 1);
                        self.dataSource.sync();

                        window.history.back();
                    }
                });
            }else{
                alert("Sorry, you can not delete it because it is system's item.");
            }
        },
        openConfirm             : function(){
            this.set("showConfirm", true);
        },
        closeConfirm            : function(){
            this.set("showConfirm", false);
        }
    });
    banhji.itemCatalog =  kendo.observable({
        lang                    : langVM,
        dataSource              : dataStore(apiUrl + "items"),
        deleteDS                : dataStore(apiUrl + "transactions"),
        existingDS              : dataStore(apiUrl + "items"),
        numberDS                : dataStore(apiUrl + "items"),
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
            filter:[
                { field: "is_catalog <>", value: 1 },
                { field: "is_assembly <>", value: 1 },
                { field: "item_type_id", operator:"where_in", value: [1,4] }
            ],
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
        statusList              : banhji.source.statusList,
        confirmMessage          : banhji.source.confirmMessage,
        obj                     : null,
        isEdit                  : false,
        saveClose               : false,
        showConfirm             : false,
        originalNo              : "",
        notDuplicateNumber      : false,
        user_id                 : banhji.source.user_id,
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
            obj = this.get("obj"),
            originalNo = this.get("originalNo");

            if(obj.number!=="" && obj.number!==originalNo){
                this.existingDS.query({
                    filter: [
                        { field:"number", value: obj.number },
                        { field:"category_id", value: obj.category_id }
                    ],
                    page: 1,
                    pageSize: 100
                }).then(function(e){
                    var view = self.existingDS.view();

                    if(view.length>0){
                        self.set("isDuplicateNumber", true);
                    }else{
                        self.set("isDuplicateNumber", false);
                    }
                });
            }else{
                this.set("isDuplicateNumber", false);
            }
        },
        generateNumber          : function(){
            var self = this, obj = this.get("obj");

            this.numberDS.query({
                filter:[
                    { field:"category_id", value:obj.category_id }
                ],
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
                filter: { field:"id", value: id }
            }).then(function(e){
                var view = self.dataSource.view();

                self.set("obj", view[0]);
            });
        },
        addEmpty                : function(){
            this.dataSource.data([]);

            this.set("isEdit", false);
            this.set("obj", null);

            this.dataSource.insert(0, {
                item_type_id            : 1,
                category_id             : 6,
                abbr                    : "CAT",
                number                  : "",
                name                    : "",
                purchase_description    : "",
                sale_description        : "",
                catalogs                : [],
                locale                  : banhji.locale,
                image_url               : banhji.no_image,
                favorite                : false,
                status                  : 1,
                is_catalog              : 1,
                deleted                 : 0
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            this.generateNumber();
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
            });
        },
        cancel                  : function(){
            this.dataSource.cancelChanges();
            this.dataSource.data([]);

            banhji.userManagement.removeMultiTask("item_catalog");
        },
        delete                  : function(){
            var self = this, obj = this.get("obj");
            this.set("showConfirm",false);

            this.deleteDS.query({
                filter: { field: "item_id", value: obj.id },
                page: 1,
                pageSize: 1
            }).then(function() {
                var view = self.deleteDS.view();

                if(view.length>0){
                    alert("Sorry, you can not delete it because it is using now.");
                }else{
                    obj.set("deleted", 1);
                    self.dataSource.sync();

                    window.history.back();
                }
            });
        },
        openConfirm             : function(){
            this.set("showConfirm", true);
        },
        closeConfirm            : function(){
            this.set("showConfirm", false);
        }
    });
    banhji.itemAssembly =  kendo.observable({
        lang                    : langVM,
        dataSource              : dataStore(apiUrl + "items"),
        lineDS                  : dataStore(apiUrl + "item_assemblies"),
        deleteDS                : dataStore(apiUrl + "transactions"),
        existingDS              : dataStore(apiUrl + "items"),
        numberDS                : dataStore(apiUrl + "items"),
        incomeAccountDS         : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: {
                logic: "or",
                filters: [
                    { field: "account_type_id", value: 35 },
                    { field: "account_type_id", value: 39 }
                ]
            },
            sort: { field:"number", dir:"asc" }
        }),
        itemDS                  : new kendo.data.DataSource({
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
            filter:[
                { field: "is_catalog <>", value: 1 },
                { field: "is_assembly <>", value: 1 },
                { field: "item_type_id", operator:"where_in", value: [1,4] }
            ],
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
        currencyDS              : new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: { field:"status", value: 1 }
        }),
        measurementDS           : banhji.source.measurementDS,
        statusList              : banhji.source.statusList,
        confirmMessage          : banhji.source.confirmMessage,
        obj                     : null,
        isEdit                  : false,
        saveClose               : false,
        showConfirm             : false,
        originalNo              : "",
        notDuplicateNumber      : true,
        total                   : 0,
        user_id                 : banhji.source.user_id,
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
        lineDSChanges       : function(arg){
            var self = banhji.itemAssembly;

            if(arg.field){
                if(arg.field=="item"){
                    var dataRow = arg.items[0],
                        item = dataRow.item;

                    dataRow.set("item_id", item.id);
                    dataRow.set("measurement_id", item.measurement_id);
                    dataRow.set("measurement", item.measurement);

                    self.addExtraRow(dataRow.uid);
                }else if(arg.field=="measurement"){
                    var dataRow = arg.items[0];

                    dataRow.set("measurement_id", dataRow.measurement.measurement_id);
                }
            }
        },
        addRow                  : function(){
            var obj = this.get("obj");

            this.lineDS.add({
                assembly_id     : obj.id,
                measurement_id  : 0,
                item_id         : 0,
                quantity        : 1,

                item            : { id:"", name:"" },
                measurement     : { measurement_id:"", measurement:"" }
            });
        },
        removeRow               : function(e){
            e.preventDefault();

            if(this.lineDS.total()>1){
                var data = e.data;
                this.lineDS.remove(data);
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
            var item, i;
            for(i=raw.length-1; i>=0; i--){
                item = raw[i];

                if (item.item_id==0) {
                    this.lineDS.remove(item);
                }
            }
        },
        //Number
        checkExistingNumber     : function(){
            var self = this, para = [],
            obj = this.get("obj");

            if(obj.number!==""){

                if(this.get("isEdit")){
                    para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
                }

                para.push({ field:"abbr", value: obj.abbr });
                para.push({ field:"number", value: obj.number });
                para.push({ field:"category_id", value: obj.category_id });

                this.existingDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 1
                }).then(function(e){
                    var view = self.existingDS.view();

                    if(view.length>0){
                        self.set("notDuplicateNumber", false);
                    }else{
                        self.set("notDuplicateNumber", true);
                    }
                });
            }
        },
        generateNumber          : function(){
            var self = this, obj = this.get("obj");

            this.numberDS.query({
                filter:[
                    { field:"category_id", value:obj.category_id }
                ],
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
                filter: { field:"id", value: id }
            }).then(function(e){
                var view = self.dataSource.view();

                self.set("obj", view[0]);
                self.lineDS.filter({ field:"assembly_id", value:id });
            });
        },
        addEmpty                : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);

            this.dataSource.insert(0, {
                item_type_id            : 1,
                category_id             : 5,
                income_account_id       : 0,
                abbr                    : "ASS",
                number                  : "",
                name                    : "",
                purchase_description    : "",
                sale_description        : "",
                price                   : 0,
                rate                    : banhji.source.getRate(banhji.locale, new Date()),
                locale                  : banhji.locale,
                image_url               : banhji.no_image,
                favorite                : false,
                status                  : 1,
                is_assembly             : 1,
                deleted                 : 0,

                measurement             : { id:"", name:"" }
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            this.generateNumber();

            //Default rows
            for (var i = 0; i < banhji.source.defaultLines; i++) {
                this.addRow();
            }
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

            this.removeEmptyRow();

            //Edit Mode
            if(this.get("isEdit")){
                //Line
                if(this.lineDS.hasChanges()){
                    obj.set("dirty", true);
                }
            }

            //Save Obj
            this.objSync()
            .then(function(data){ //Success
                if(self.get("isEdit")==false){
                    $.each(self.lineDS.data(), function(index, value){
                        value.set("assembly_id", data[0].id);
                    });
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
                }else{
                    //Save New
                    self.addEmpty();
                }
            });
        },
        cancel                  : function(){
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);

            banhji.userManagement.removeMultiTask("item_assembly");
        },
        delete                  : function(){
            var self = this, obj = this.get("obj");
            this.set("showConfirm",false);

            this.deleteDS.query({
                filter: { field: "item_id", value: obj.id },
                page: 1,
                pageSize: 1
            }).then(function() {
                var view = self.deleteDS.view();

                if(view.length>0){
                    alert("Sorry, you can not delete it because it is using now.");
                }else{
                    obj.set("deleted", 1);
                    self.dataSource.sync();

                    window.history.back();
                }
            });
        },
        openConfirm             : function(){
            this.set("showConfirm", true);
        },
        closeConfirm            : function(){
            this.set("showConfirm", false);
        }
    });
    banhji.itemPrice = kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "item_prices"),
        itemDS              : dataStore(apiUrl + "items"),
        recordDS            : dataStore(apiUrl + "items/movement"),
        poDS                : dataStore(apiUrl + "item_lines"),
        soDS                : dataStore(apiUrl + "item_lines"),
        onHandDS            : dataStore(apiUrl + "item_lines"),
        measurementDS       : banhji.source.measurementDS,
        currencyDS          : new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: { field:"status", value: 1 }
        }),
        obj                 : null,
        priceList           : null,
        windowVisible       : false,
        isltBase            : true,
        type                : "ltBase",
        isBase              : false,
        on_po               : 0,
        on_so               : 0,
        on_hand             : 0,
        pageLoad            : function(id){
            this.dataSource.filter([
                { field:"item_id", value: id },
                { field:"assembly_id", value: 0 }
            ]);
            this.recordDS.query({
                filter: { field:"item_id", value: id },
                page:1,
                pageSize:10
            });
            this.loadObj(id);
            this.loadData(id);
        },
        loadObj             : function(id){
            var self = this;

            this.itemDS.query({
                filter: { field:"id", value: id },
                page:1,
                pageSize:1
            }).then(function(e){
                var view = self.itemDS.view();

                self.set("obj", view[0]);

                if(view[0].item_type_id==1){
                    self.loadOnHand(view[0].id);
                }else{
                    self.set("on_hand", 0);
                }
            });
        },
        loadData            : function(id){
            var self = this;

            //PO
            this.poDS.query({
                filter:[
                    { field:"item_id", value:id },
                    { field:"type", operator:"where_related_transaction",  value:"Purchase_Order" },
                    { field:"status", operator:"where_related_transaction", value:0 }
                ],
                page:1,
                pageSize:100
            }).then(function(){
                var view = self.poDS.view(),
                sum = 0;

                $.each(view, function(index, value){
                    sum += kendo.parseInt(value.quantity);
                });

                self.set("on_po", kendo.toString(sum, "n0"));
            });

            //SO
            this.soDS.query({
                filter:[
                    { field:"item_id", value: id },
                    { field:"type", operator:"where_related_transaction", value:"Sale_Order" },
                    { field:"status", operator:"where_related_transaction", value:0 }
                ],
                page:1,
                pageSize:1
            }).then(function(){
                var view = self.soDS.view(),
                sum = 0;

                $.each(view, function(index, value){
                    sum += kendo.parseInt(value.quantity);
                });

                self.set("on_so", kendo.toString(sum, "n0"));
            });
        },
        loadOnHand          : function(id){
            var self = this;

            this.onHandDS.query({
                filter:[
                    { field:"item_id", value: id },
                    { field:"type", operator:"where_in_related_transaction", value:["Cash_Purchase", "Credit_Purchase", "Commercial_Invoice", "Vat_Invoice", "Invoice", "Commercial_Cash_Sale", "Vat_Cash_Sale", "Cash_Sale", "Item_Adjustment", "Internal_Usage"] },
                    { field:"is_recurring <>", operator:"where_related_transaction", value: 1 },
                    { field:"deleted <>", operator:"where_related_transaction", value: 1 }
                ]
            }).then(function(){
                var view = self.onHandDS.view();

                var onHand = 0;
                $.each(view, function(index, value){
                    onHand += (value.quantity * value.conversion_ratio * value.movement);
                });

                self.set("on_hand", kendo.toString(onHand, "n0"));
            });
        },
        changes             : function(){
            var p = this.get("priceList"),
            unitValue = 0;

            if(this.get("type")=="ltBase"){
                if(p.quantity>0){
                    unitValue = 1 / p.quantity;
                }else{
                    unitValue = 0;
                }
            }else{
                unitValue = p.quantity;
            }

            p.set("conversion_ratio", unitValue);
        },
        typeChanges         : function(){
            if(this.get("type")=="ltBase"){
                this.set("isltBase", true);
            }else{
                this.set("isltBase", false);
            }

            this.changes();
        },
        measurementChanges  : function(){
            var priceList = this.get("priceList"), lastIndex = this.dataSource.total()-1;

            if(priceList.measurement_id>0){
                $.each(this.dataSource.data(), function(index, value){
                    if(index < lastIndex && value.measurement_id==priceList.measurement_id){
                        priceList.set("measurement_id", 0);

                        $("#ntf1").data("kendoNotification").error(banhji.source.duplicateMeasurementMessage);

                        return false;
                    }
                });
            }
        },
        openWindow          : function(){
            this.addEmpty();
            this.set('windowVisible', true);
        },
        closeWindow         : function(){
            this.dataSource.cancelChanges();
            this.set('windowVisible', false);
        },
        addEmpty            : function () {
            var obj = this.get("obj");
            this.set("isBase", false);
            this.set("type", "ltBase");

            this.dataSource.add({
                item_id         : obj.id,
                measurement_id  : 0,
                quantity        : 1,
                price           : 0,
                conversion_ratio: 0,
                locale          : obj.locale,
                measurement     : ""
            });

            var data = this.dataSource.data();
            var obj = data[data.length - 1];

            this.set("priceList", obj);
        },
        validating          : function(){
            var result = true,
                priceList = this.get("priceList");

            if(priceList.measurement_id==0){
                result = false;
            }

            return result;
        },
        save                : function(){
            if(this.validating()){
                this.dataSource.sync();
                var saved = false;
                this.dataSource.bind("requestEnd",function(e){
                    if(saved==false){
                        saved = true;

                        $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);
                    }
                });

                this.set("windowVisible", false);
            }else{
                $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
            }
        },
        edit                : function(e){
            var data = e.data;

            this.set("priceList", data);

            if(this.dataSource.indexOf(data)==0){
                this.set("isBase", true);
                data.set("quantity", 1);
            }else{
                this.set("isBase", false);

                if(data.conversion_ratio>1){
                    this.set("type", "gtBase");
                    this.set("isltBase", false);
                }else{
                    this.set("type", "ltBase");
                    this.set("isltBase", true);
                }
            }

            this.set("windowVisible", true);
        },
        delete              : function(e){
            if (confirm("Are you sure, you want to delete it?")) {
                var data = e.data;

                this.dataSource.remove(data);
                this.dataSource.sync();
            }
        }
    });
    banhji.itemAdjustment = kendo.observable({
        lang                    : langVM,
        dataSource              : dataStore(apiUrl + "transactions"),
        txnDS                   : dataStore(apiUrl + "transactions"),
        numberDS                : dataStore(apiUrl + "transactions/number"),
        recurringDS             : dataStore(apiUrl + "transactions"),
        lineDS                  : dataStore(apiUrl + "item_lines"),
        recurringLineDS         : dataStore(apiUrl + "item_lines"),
        journalLineDS           : dataStore(apiUrl + "journal_lines"),
        attachmentDS            : dataStore(apiUrl + "attachments"),
        wacDS                   : dataStore(apiUrl + "items/weighted_average_costing"),
        itemDS                  : dataStore(apiUrl + "items"),
        contactDS               : banhji.source.employeeDS,
        accountDS               : banhji.source.accountList,
        jobDS                   : banhji.source.jobList,
        segmentItemDS           : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        txnTemplateDS           : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{ field: "type", value: "Item_Adjustment" }
        }),
        categoryDS              : new kendo.data.DataSource({
            data: banhji.source.categoryList,
            filter: [
                { field:"item_type_id", value: 1 },
                { field:"id", operator:"neq", value: 5 },
                { field:"id", operator:"neq", value: 6 }
            ]
        }),
        itemGroupDS             : banhji.source.itemGroupDS,
        confirmMessage          : banhji.source.confirmMessage,
        dateUnitList           : banhji.source.dateUnitList,
        monthOptionList         : banhji.source.monthOptionList,
        monthList               : banhji.source.monthList,
        weekDayList             : banhji.source.weekDayList,
        dayList                 : banhji.source.dayList,
        showMonthOption         : false,
        showMonth               : false,
        showWeek                : false,
        showDay                 : false,
        obj                     : null,
        isEdit                  : false,
        saveClose               : false,
        savePrint               : false,
        saveRecurring           : false,
        recurring_validate      : false,
        recurring               : "",
        barcode                 : "",
        barcodeVisible          : false,
        category_id             : 0,
        item_group_id           : 0,
        user_id                 : banhji.source.user_id,
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
        //Barcode
        search              : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                category_id = this.get("category_id"),
                item_group_id = this.get("item_group_id");

            if(item_group_id>0){
                para.push({ field:"number", value:item_group_id });
            }else{
                if(category_id>0){
                    para.push({ field:"category_id", value:category_id });
                }
            }

            this.itemDS.query({
                filter: para,
                page:1,
                pageSize: 10
            });

            this.set("category_id", 0);
            this.set("item_group_id", 0);
        },
        searchByBarcode     : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                barcode = this.get("barcode");

            if(barcode!==""){
                this.itemDS.query({
                    filter: { field: "barcode", value: barcode },
                    page:1,
                    pageSize: 1
                }).then(function(){
                    var view = self.itemDS.view();

                    if(view.length>0){
                        self.insertItem(view[0]);
                    }
                });

                this.set("barcode", "");
            }
        },
        addSearchItem       : function(e){
            var data = e.data;

            this.insertItem(data);
        },
        openBarcodeWindow   : function(){
            this.set("barcodeVisible", true);
        },
        closeBarcodeWindow  : function(){
            this.set("barcodeVisible", false);
        },
        insertItem          : function(data){
            var self = this,
                obj = this.get("obj"),
                rate = obj.rate / banhji.source.getRate(data.locale, new Date(obj.issued_date));

            //Get cost
            this.wacDS.query({
                filter:[
                    { field:"item_id", value: data.id },
                    { field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd  HH:mm:ss") }
                ]
            }).then(function(){
                var wac = self.wacDS.view();

                var item_price = {
                    measurement_id  : data.measurement_id,
                    price           : kendo.parseFloat(data.price),
                    conversion_ratio: 1,
                    measurement     : data.measurement.name
                };

                self.lineDS.insert(0, {
                    transaction_id      : obj.id,
                    item_id             : data.id,
                    measurement_id      : data.measurement_id,
                    description         : data.sale_description,
                    on_hand             : wac[0].quantity,
                    quantity_adjusted   : 0,
                    quantity            : 0,
                    conversion_ratio    : 1,
                    cost                : wac[0].cost * rate,
                    rate                : 1,
                    locale              : data.locale,
                    movement            : 1,
                    reference_no        : "",

                    item                : data,
                    item_price          : item_price,
                    measurement         : item_price
                });
            });
        },
        //Upload
        onSelect                : function(e){
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
        removeFile              : function(e){
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
            }
        },
        uploadFile              : function(){
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
        //Employee
        employeeChanges             : function(){
            var obj = this.get("obj");

            if(obj.employee){
                var employee = obj.employee;

                obj.set("employee_id", employee.id);
            }else{
                obj.set("employee_id", 0);
            }
        },
        //Currency Rate
        setRate                 : function(){
            var obj = this.get("obj"),
            rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

            obj.set("rate", rate);
        },
        //Segment
        segmentChanges          : function(e) {
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
        loadObj                 : function(id){
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
                    page:1,
                    pageSize:100
                }).then(function(e){
                    var view = self.dataSource.view();

                    self.set("obj", view[0]);
                    self.lineDS.query({
                        filter:{ field:"transaction_id", value: id }
                    });

                    self.journalLineDS.query({
                        filter: { field: "transaction_id", value: id }
                    });
                });
            }
        },
        lineDSChanges           : function(arg){
            var self = banhji.itemAdjustment;

            if(arg.field){
                if(arg.field=="item"){
                    var dataItem = arg.items[0],
                        obj = self.get("obj"),
                        rate = banhji.source.getRate(dataItem.item.locale, new Date(obj.issued_date));

                    dataItem.set("item_id", dataItem.item.id);
                    dataItem.set("measurement_id", dataItem.item.measurement_id);
                    dataItem.set("description", dataItem.item.name);
                    dataItem.set("rate", rate);
                    dataItem.set("locale", dataItem.item.locale);
                    dataItem.set("measurement", dataItem.item.measurement);
                    dataItem.set("item_price", dataItem.item.measurement);

                    //Get cost
                    self.wacDS.query({
                        filter:[
                            { field:"item_id", value: dataItem.item.id },
                            { field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd  HH:mm:ss") }
                        ]
                    }).then(function(){
                        var wac = self.wacDS.view();

                        dataItem.set("cost", wac[0].cost * rate);
                        dataItem.set("on_hand", wac[0].quantity);
                        dataItem.set("quantity", wac[0].quantity);
                        dataItem.set("movement", -1);
                    });

                    self.addExtraRow(dataItem.uid);
                }else if(arg.field=="quantity_adjusted"){
                    $.each(banhji.itemAdjustment.lineDS.data(), function(index, value){
                        var diff = 0;
                        if(value.quantity_adjusted>value.on_hand){
                            diff = value.on_hand - value.quantity_adjusted;
                            value.set("movement", 1);
                        }else{
                            diff = value.quantity_adjusted - value.on_hand;
                            value.set("movement", -1);
                        }

                        value.set("quantity", Math.abs(diff));
                    });
                }
            }
        },
        addEmpty                : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.journalLineDS.data([]);
            this.attachmentDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);

            this.dataSource.insert(0, {
                transaction_template_id : "",
                employee_id             : "",
                job_id                  : "",
                account_id              : "",
                type                    : "Item_Adjustment",
                rate                    : 1,
                locale                  : banhji.locale,
                issued_date             : new Date(),
                memo                    : "",
                memo2                   : "",
                segments                : [],
                is_journal              : 1,
                //Recurring
                recurring_name          : "",
                start_date              : new Date(),
                frequency               : "Daily",
                month_option            : "Day",
                interval                : 1,
                day                     : 1,
                week                    : 0,
                month                   : 0,
                is_recurring            : 0
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            this.generateNumber();
            this.setRate();

            //Default rows
            for (var i = 0; i < banhji.source.defaultLines; i++) {
                this.addRow();
            }
        },
        addRow                  : function(){
            var obj = this.get("obj");

            this.lineDS.add({
                transaction_id      : obj.id,
                item_id             : "",
                measurement_id      : 0,
                description         : "",
                on_hand             : 0,
                quantity_adjusted   : 0,
                quantity            : 0,
                conversion_ratio    : 1,
                cost                : 0,
                rate                : 1,
                locale              : banhji.locale,
                movement            : 1,
                reference_no        : "",

                item                : { id:"", name:"" },
                measurement         : { measurement_id:"", measurement:"" }
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
        removeRow               : function(e){
            var d = e.data;
            this.lineDS.remove(d);
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
            obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

            this.removeEmptyRow();

            //Recurring
            if(this.get("saveRecurring")){
                this.set("saveRecurring", false);

                obj.set("number", "");
                obj.set("is_recurring", 1);
            }

            // Save Obj
            this.objSync()
            .then(function(data){ //Success
                if(self.get("isEdit")==false){
                    //Item Line
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
        cancel                  : function(){
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();
            this.journalLineDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.journalLineDS.data([]);

            banhji.userManagement.removeMultiTask("item_adjustment");
        },
        //Journal
        addJournal              : function(transaction_id){
            var self = this,
                obj = this.get("obj"),
                raw = "", entries = {}, gainLoss = 0;

            //Edit Mode
            if(obj.isNew()==false){
                //Delete previous journal
                $.each(this.journalLineDS.data(), function(index, value){
                    value.set("deleted", 1);
                });
            }

            //Item Lines
            $.each(this.lineDS.data(), function(index, value){
                var accountID = value.item.inventory_account_id,
                    itemRate = banhji.source.getRate(value.item.locale, new Date(obj.issued_date)),
                    itemCost = (value.quantity*value.conversion_ratio) * value.movement * (kendo.parseFloat(value.cost)/itemRate);

                gainLoss += itemCost;

                if(itemCost>0){//Add + Positive Inventory On Dr
                    raw = "dr"+accountID;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : accountID,
                            contact_id          : obj.contact_id,
                            description         : obj.memo,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : Math.abs(itemCost),
                            cr                  : 0,
                            rate                : itemRate,
                            locale              : value.item.locale
                        };
                    }else{
                        entries[raw].dr += Math.abs(itemCost);
                    }
                }else{
                    //Add - Negative Inventory On Cr
                    raw = "cr"+accountID;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : accountID,
                            contact_id          : obj.contact_id,
                            description         : obj.memo,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : 0,
                            cr                  : Math.abs(itemCost),
                            rate                : itemRate,
                            locale              : value.item.locale
                        };
                    }else{
                        entries[raw].cr += Math.abs(itemCost);
                    }
                }
            });//End Foreach Loop

            //Add Gain Or Loss Account
            var objAccountID = kendo.parseInt(obj.account_id),
                dr = 0, cr = 0;

            if(objAccountID>0){
                if(gainLoss>0){
                    raw = "cr"+objAccountID;
                    cr = Math.abs(gainLoss);
                }else{
                    raw = "dr"+objAccountID;
                    dr = Math.abs(gainLoss);
                }

                if(entries[raw]===undefined){
                    entries[raw] = {
                        transaction_id      : transaction_id,
                        account_id          : objAccountID,
                        contact_id          : obj.contact_id,
                        description         : obj.memo,
                        reference_no        : "",
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
                obj.set("account_id", view[0].account_id);
                obj.set("employee_id", view[0].employee_id);//Employee
                obj.set("job_id", view[0].job_id);
                obj.set("segments", view[0].segments);
                obj.set("memo", view[0].memo);
                obj.set("memo2", view[0].memo2);
            });

            this.recurringLineDS.query({
                filter:[
                    { field:"transaction_id", value:id },
                    { operator:"item" }
                ],
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.recurringLineDS.view();
                self.lineDS.data([]);

                var ids = [];
                $.each(view, function(index, value){
                    ids.push(value.item_id);

                    self.lineDS.add({
                        transaction_id      : 0,
                        item_id             : value.item_id,
                        measurement_id      : value.item.measurement_id,
                        description         : value.description,
                        on_hand             : 0,
                        quantity_adjusted   : 0,
                        quantity            : 0,
                        conversion_ratio    : 1,
                        cost                : kendo.parseFloat(value.item.cost),
                        rate                : 1,
                        locale              : value.item.locale,
                        movement            : 1,

                        item                : value.item,
                        item_price          : value.item_price
                    });
                });

                self.onHandDS.query({
                    filter:{ field:"item_id", operator:"where_in", value:ids }
                }).then(function(){
                    $.each(self.lineDS.data(), function(index, value){
                        var item = self.onHandDS.get(value.item_id);
                        if(item){
                            value.set("on_hand", item.on_hand);
                        }
                    });
                });
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
        validateRecurring   : function(){
            var result = true, obj = this.get("obj");

            if(obj.recurring_name!==""){
                //Check existing name
                $.each(this.recurringDS.data(), function(index, value){
                    if(value.recurring_name==obj.recurring_name){
                        result = false;
                        alert("This is name is taken.");

                        return false;
                    }
                });
            }
            else{
                result = false;
                alert("Recurring name is required.");
            }

            return result;
        }
    });
    banhji.internalUsage = kendo.observable({
        lang                    : langVM,
        dataSource              : dataStore(apiUrl + "transactions"),
        lineDS                  : dataStore(apiUrl + "item_lines"),
        txnDS                   : dataStore(apiUrl + "transactions"),
        numberDS                : dataStore(apiUrl + "transactions/number"),
        accountLineDS           : dataStore(apiUrl + "account_lines"),
        toItemLineDS            : dataStore(apiUrl + "item_lines"),
        toAccountLineDS         : dataStore(apiUrl + "account_lines"),
        recurringDS             : dataStore(apiUrl + "transactions"),
        recurringLineDS         : dataStore(apiUrl + "item_lines"),
        recurringAccountLineDS  : dataStore(apiUrl + "account_lines"),
        journalLineDS           : dataStore(apiUrl + "journal_lines"),
        attachmentDS            : dataStore(apiUrl + "attachments"),
        itemPriceDS             : dataStore(apiUrl + "item_prices"),
        wacDS                   : dataStore(apiUrl + "items/weighted_average_costing"),
        txnTemplateDS           : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{
                logic: "or",
                filters: [
                    { field: "type", value: "Internal_Usage" },
                    { field: "type", value: "Transfer_In" },
                    { field: "type", value: "Transfer_Out" },
                    { field: "type", value: "Usage_Disposal" }
                ]
            }
        }),
        jobDS                   : new kendo.data.DataSource({
            data: banhji.source.jobList,
            sort: { field: "name", dir: "asc" }
        }),
        segmentItemDS           : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        amtDueColor             : banhji.source.amtDueColor,
        confirmMessage          : banhji.source.confirmMessage,
        dateUnitList           : banhji.source.dateUnitList,
        monthOptionList         : banhji.source.monthOptionList,
        monthList               : banhji.source.monthList,
        weekDayList             : banhji.source.weekDayList,
        dayList                 : banhji.source.dayList,
        showMonthOption         : false,
        showMonth               : false,
        showWeek                : false,
        showDay                 : false,
        obj                     : null,
        isEdit                  : false,
        saveDraft               : false,
        saveClose               : false,
        savePrint               : false,
        saveRecurring           : false,
        showConfirm             : false,
        notDuplicateNumber      : true,
        total                   : 0,
        totalFrom               : 0,
        totalTo                 : 0,
        different               : 0,
        user_id                 : banhji.source.user_id,
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
        //Upload
        onSelect                : function(e){
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
        removeFile              : function(e){
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
            }
        },
        uploadFile              : function(){
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
        setRate                 : function(){
            var obj = this.get("obj"),
            rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

            obj.set("rate", rate);

            //Item Lines
            $.each(this.lineDS.data(), function(index, value){
                var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
                value.set("rate", itemRate);
            });

            //Account Line
            $.each(this.accountLineDS.data(), function(index, value){
                value.set("rate", rate);
                value.set("locale", obj.locale);
            });

            //Item Lines To
            $.each(this.toItemLineDS.data(), function(index, value){
                var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
                value.set("rate", itemRate);
            });

            //Account Line To
            $.each(this.toAccountLineDS.data(), function(index, value){
                value.set("rate", rate);
                value.set("locale", obj.locale);
            });
        },
        //Segment
        segmentChanges          : function(e) {
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
        //From Item
        addItem                 : function(uid){
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
            // row.set("measurement", item.measurement);

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
            this.itemPriceDS.query({
                filter:[
                    { field:"item_id", value:item.id },
                    { field:"assembly_id", value:0 }
                ],
                page: 1,
                pageSize: 1
            }).then(function(){
                var view = self.itemPriceDS.view();

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

            self.changes();
        },
        addItemCatalog          : function(uid){
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
                        cost                : 0,
                        price               : 0,
                        amount              : 0,
                        discount            : 0,
                        rate                : rate,
                        locale              : catalogItem.locale,
                        movement            : -1,

                        item                : catalogItem,
                        measurement         : { measurement_id:"", measurement:"" }
                    });
                }
            });
        },
        addRow                  : function(){
            var obj = this.get("obj");

            this.lineDS.add({
                transaction_id      : obj.id,
                item_id             : "",
                measurement_id      : 0,
                description         : "",
                quantity            : 1,
                conversion_ratio    : 1,
                cost                : 0,
                price               : 0,
                amount              : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                movement            : -1,
                reference_no        : "",

                item                : { id:"", name:"" },
                measurement         : { measurement_id:"", measurement:"" }
            });
        },
        addExtraRow             : function(uid){
            var row = this.lineDS.getByUid(uid),
                index = this.lineDS.indexOf(row);

            if(index==this.lineDS.total()-1){
                this.addRow();
            }
        },
        removeRow               : function(e){
            var data = e.data;
            if(this.lineDS.total()>1){
                this.lineDS.remove(data);
                this.changes();
            }
        },
        removeEmptyRow          : function(){
            var row, i;

            //Item
            var item = this.lineDS.data();
            for(i=item.length-1; i>=0; i--){
                row = item[i];

                if (row.item_id==0) {
                    this.lineDS.remove(row);
                }
            }

            //Account
            var account = this.accountLineDS.data();
            for(i=account.length-1; i>=0; i--){
                row = account[i];

                if (row.account_id==0) {
                    this.accountLineDS.remove(row);
                }
            }

            //Item To
            var itemTo = this.toItemLineDS.data();
            for(i=itemTo.length-1; i>=0; i--){
                row = itemTo[i];

                if (row.item_id==0) {
                    this.toItemLineDS.remove(row);
                }
            }

            //Account To
            var accountTo = this.toAccountLineDS.data();
            for(i=accountTo.length-1; i>=0; i--){
                row = accountTo[i];

                if (row.account_id==0) {
                    this.toAccountLineDS.remove(row);
                }
            }
        },
        itemLineDSChanges       : function(arg){
            var self = banhji.internalUsage;

            if(arg.field){
                if(arg.field=="item"){
                    var dataRow = arg.items[0],
                        item = dataRow.item;

                    if(item.is_catalog=="1"){
                        self.addItemCatalog(dataRow.uid);
                    }else{
                        self.addItem(dataRow.uid);
                    }

                    self.addExtraRow(dataRow.uid);
                }else if(arg.field=="quantity"){
                    self.changes();
                }else if(arg.field=="measurement"){
                    var dataRow = arg.items[0];

                    dataRow.set("measurement_id", dataRow.measurement.measurement_id);
                    dataRow.set("conversion_ratio", dataRow.measurement.conversion_ratio);
                }
            }
        },
        //From Account
        addRowAccount           : function(){
            var obj = this.get("obj");

            this.accountLineDS.add({
                transaction_id      : obj.id,
                account_id          : "",
                description         : "",
                amount              : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                movement            : -1, //From Account

                account             : { id:"", name:"" }
            });
        },
        addExtraRowAccount      : function(uid){
            var row = this.accountLineDS.getByUid(uid),
                index = this.accountLineDS.indexOf(row);

            if(index==this.accountLineDS.total()-1){
                this.addRowAccount();
            }
        },
        removeRowAccount        : function(e){
            var d = e.data;

            this.accountLineDS.remove(d);
            this.changes();
        },
        accountLineDSChanges    : function(arg){
            var self = banhji.internalUsage;

            if(arg.field){
                if(arg.field=="account"){
                    var dataRow = arg.items[0],
                        account = dataRow.account;

                    dataRow.set("account_id", account.id);

                    self.addExtraRowAccount(dataRow.uid);
                }else if(arg.field=="amount"){
                    self.changes();
                }
            }
        },
        //To Item
        addRowTo                : function(){
            var obj = this.get("obj");

            this.toItemLineDS.add({
                transaction_id      : obj.id,
                item_id             : "",
                measurement_id      : 0,
                description         : "",
                quantity            : 1,
                conversion_ratio    : 1,
                cost                : 0,
                price               : 0,
                amount              : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                movement            : 1,
                reference_no        : "",

                item                : { id:"", name:"" },
                measurement         : { measurement_id:"", measurement:"" }
            });

            this.changes();
        },
        addExtraRowTo           : function(uid){
            var row = this.toItemLineDS.getByUid(uid),
                index = this.toItemLineDS.indexOf(row);

            if(index==this.toItemLineDS.total()-1){
                this.addRowTo();
            }
        },
        removeRowTo             : function(e){
            var data = e.data;

            this.toItemLineDS.remove(data);
            this.changes();
        },
        addItemTo               : function(uid){
            var self = this,
                row = this.toItemLineDS.getByUid(uid),
                obj = this.get("obj"),
                item = row.item,
                rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

            row.set("item_id", item.id);
            row.set("description", item.sale_description);
            // row.set("cost", item.cost * rate);
            row.set("rate", rate);
            row.set("locale", item.locale);
            // row.set("measurement", item.measurement);

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
            this.itemPriceDS.query({
                filter:[
                    { field:"item_id", value:item.id },
                    { field:"assembly_id", value:0 }
                ],
                page: 1,
                pageSize: 1
            }).then(function(){
                var view = self.itemPriceDS.view();

                if(view.length>0){
                    var measurement = {
                        measurement_id  : view[0].measurement_id,
                        price           : view[0].price * rate,
                        conversion_ratio: view[0].conversion_ratio,
                        measurement     : view[0].measurement
                    };
                    row.set("measurement", measurement);
                }
            });

            self.changes();
        },
        addItemCatalogTo        : function(uid){
            var self = this,
                row = this.toItemLineDS.getByUid(uid),
                obj = this.get("obj"),
                item = row.item;

            this.toItemLineDS.remove(row);

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
                        cost                : 0,
                        price               : 0,
                        amount              : 0,
                        discount            : 0,
                        rate                : rate,
                        locale              : catalogItem.locale,
                        movement            : 1,

                        item                : catalogItem,
                        measurement         : catalogItem.measurement
                    });
                }
            });
        },
        toItemLineDSChanges     : function(arg){
            var self = banhji.internalUsage;

            if(arg.field){
                if(arg.field=="item"){
                    var dataRow = arg.items[0],
                        item = dataRow.item;

                    if(item.is_catalog=="1"){
                        self.addItemCatalogTo(dataRow.uid);
                    }else{
                        self.addItemTo(dataRow.uid);
                    }

                    self.addExtraRowTo(dataRow.uid);
                }else if(arg.field=="quantity" || arg.field=="cost"){
                    self.changes();
                }else if(arg.field=="measurement"){
                    var dataRow = arg.items[0];

                    dataRow.set("measurement_id", dataRow.measurement.measurement_id);
                    dataRow.set("conversion_ratio", dataRow.measurement.conversion_ratio);
                }
            }
        },
        //To Account
        addRowAccountTo             : function(){
            var obj = this.get("obj");
            this.toAccountLineDS.add({
                transaction_id      : obj.id,
                account_id          : "",
                description         : "",
                amount              : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                movement            : 1, //To Account

                account             : { id:"", name:"" }
            });

            this.changes();
        },
        addExtraRowAccountTo        : function(uid){
            var row = this.toAccountLineDS.getByUid(uid),
                index = this.toAccountLineDS.indexOf(row);

            if(index==this.toAccountLineDS.total()-1){
                this.addRowAccountTo();
            }
        },
        removeRowAccountTo      : function(e){
            var data = e.data;

            this.toAccountLineDS.remove(data);
            this.changes();
        },
        toAccountLineDSChanges  : function(arg){
            var self = banhji.internalUsage;

            if(arg.field){
                if(arg.field=="account"){
                    var dataRow = arg.items[0],
                        account = dataRow.account;

                    dataRow.set("account_id", account.id);

                    self.addExtraRowAccountTo(dataRow.uid);
                }else if(arg.field=="amount"){
                    self.changes();
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
        loadObj                 : function(id){
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
                    page:1,
                    pageSize:100
                }).then(function(e){
                    var view = self.dataSource.view();

                    self.set("obj", view[0]);
                    self.set("totalFrom", kendo.toString(view[0].amount, "c2", view[0].locale));
                    self.set("totalTo", kendo.toString(view[0].amount, "c2", view[0].locale));
                    self.set("different", 0);

                    self.journalLineDS.query({
                        filter:{ field:"transaction_id", value: id }
                    });

                    //From
                    self.lineDS.query({
                        filter: [
                            { field: "transaction_id", value: id },
                            { field: "movement", value: -1 }
                        ]
                    });
                    self.accountLineDS.query({
                        filter:[
                            { field:"transaction_id", value: id },
                            { field:"movement", value: -1 }
                        ]
                    });

                    //To
                    self.toItemLineDS.query({
                        filter:[
                            { field:"transaction_id", value: id },
                            { field:"movement", value: 1 }
                        ]
                    });
                    self.toAccountLineDS.query({
                        filter:[
                            { field:"transaction_id", value: id },
                            { field:"movement", value: 1 }
                        ]
                    });
                });
            }
        },
        changes                 : function() {
            var obj = this.get("obj"), sumFrom = 0, sumTo = 0;

            //From
            $.each(this.lineDS.data(), function(index, value){
                var fromItemAmount = value.quantity * value.cost;
                value.set("amount", fromItemAmount);
                sumFrom += fromItemAmount;
            });
            $.each(this.accountLineDS.data(), function(index, value){
                sumFrom += value.amount;
            });

            //To
            $.each(this.toItemLineDS.data(), function(index, value){
                var toItemAmount = value.quantity * value.cost;
                value.set("amount", toItemAmount);
                sumTo += toItemAmount;
            });
            $.each(this.toAccountLineDS.data(), function(index, value){
                sumTo += value.amount;
            });

            obj.set("amount", sumFrom);

            this.set("total", kendo.toString(sumFrom, "c2", obj.locale));
            this.set("totalFrom", sumFrom);
            this.set("totalTo", sumTo);
            this.set("different", Math.abs(sumFrom - sumTo));
        },
        addEmpty                : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.accountLineDS.data([]);
            this.toItemLineDS.data([]);
            this.toAccountLineDS.data([]);
            this.journalLineDS.data([]);
            this.attachmentDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);
            this.set("totalFrom", 0);
            this.set("totalTo", 0);
            this.set("different", 0);

            this.dataSource.insert(0, {
                transaction_template_id : 0,
                recurring_id        : "",
                item_id             : "",
                job_id              : 0,
                user_id             : this.get("user_id"),
                type                : "Internal_Usage",//Required
                number              : "",
                amount              : 0,
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
                frequency           : "Day",
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
                this.addRowAccount();
                this.addRowTo();
                this.addRowAccountTo();
            }
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
            obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

            this.removeEmptyRow();

            //Save Draft
            if(this.get("saveDraft")){
                obj.set("status", 4); //In progress
                obj.set("progress", "Draft");
                obj.set("is_journal", 0);//No Journal
            }

            //Recurring
            if(this.get("saveRecurring")){
                this.set("saveRecurring", false);

                obj.set("number", "");
                obj.set("is_recurring", 1);
            }

            //Edit Mode
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
                    //Item Line
                    $.each(self.lineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //Account Line
                    $.each(self.accountLineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //To Item Line
                    $.each(self.toItemLineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //To Account Line
                    $.each(self.toAccountLineDS.data(), function(index, value){
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
                self.accountLineDS.sync();
                self.toItemLineDS.sync();
                self.toAccountLineDS.sync();

                self.uploadFile();

                return data;
            }, function(reason) { //Error
                $("#ntf1").data("kendoNotification").error(reason);
            }).then(function(result){
                $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

                if(self.get("saveDraft") || self.get("saveClose")){
                    //Save Draft or Save Close
                    self.set("saveDraft", false);
                    self.set("saveClose", false);
                    self.cancel();
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
        clear                   : function(){
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();
            this.accountLineDS.cancelChanges();
            this.toItemLineDS.cancelChanges();
            this.toAccountLineDS.cancelChanges();
            this.journalLineDS.cancelChanges();
            this.attachmentDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.accountLineDS.data([]);
            this.toItemLineDS.data([]);
            this.toAccountLineDS.data([]);
            this.journalLineDS.data([]);
            this.attachmentDS.data([]);

            banhji.userManagement.removeMultiTask("internal_usage");
        },
        cancel                  : function(){
            this.clear();
            window.history.back();
        },
        validating              : function(){
            var result = true, obj = this.get("obj");

            if(this.get("totalFrom")!==this.get("totalTo")){
                $("#ntf1").data("kendoNotification").error("Total From must equal to Total To");

                result = false;
            }

            return result;
        },
        //Journal
        addJournal              : function(transaction_id){
            var self = this,
                obj = this.get("obj"),
                raw = "",
                entries = {};

            //Edit Mode
            if(obj.isNew()==false){
                //Delete previous journal
                $.each(this.journalLineDS.data(), function(index, value){
                    value.set("deleted", 1);
                });
            }

            //To on Dr
            $.each(this.toItemLineDS.data(), function(index, value){
                var item = value.item,
                    itemRate = banhji.source.getRate(item.locale, new Date(obj.issued_date));

                //Inventory on Dr
                var inventoryID = kendo.parseInt(item.inventory_account_id);
                if(inventoryID>0){
                    raw = "dr"+inventoryID;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : inventoryID,
                            contact_id          : 0,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : value.amount,
                            cr                  : 0,
                            rate                : itemRate,
                            locale              : item.locale
                        };
                    }else{
                        entries[raw].dr += value.amount;
                    }
                }
            });
            $.each(this.toAccountLineDS.data(), function(index, value){
                raw = "dr"+value.account_id;

                //Account on Dr
                if(entries[raw]===undefined){
                    entries[raw] = {
                        transaction_id      : transaction_id,
                        account_id          : value.account_id,
                        contact_id          : 0,
                        description         : value.description,
                        reference_no        : "",
                        segments            : value.segments,
                        dr                  : value.amount,
                        cr                  : 0,
                        rate                : obj.rate,
                        locale              : obj.locale
                    };
                }else{
                    entries[raw].dr += value.amount;
                }
            });


            //From on Cr
            $.each(this.lineDS.data(), function(index, value){
                var item = value.item,
                    itemRate = banhji.source.getRate(item.locale, new Date(obj.issued_date));

                //Inventory on Cr
                var inventoryID = kendo.parseInt(item.inventory_account_id);
                if(inventoryID>0){
                    raw = "cr"+inventoryID;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : inventoryID,
                            contact_id          : 0,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : 0,
                            cr                  : value.amount,
                            rate                : itemRate,
                            locale              : item.locale
                        };
                    }else{
                        entries[raw].cr += value.amount;
                    }
                }
            });
            $.each(this.accountLineDS.data(), function(index, value){
                raw = "cr"+value.account_id;

                //Account on Cr
                if(entries[raw]===undefined){
                    entries[raw] = {
                        transaction_id      : transaction_id,
                        account_id          : value.account_id,
                        contact_id          : 0,
                        description         : value.description,
                        reference_no        : "",
                        segments            : value.segments,
                        dr                  : 0,
                        cr                  : value.amount,
                        rate                : obj.rate,
                        locale              : obj.locale
                    };
                }else{
                    entries[raw].cr += value.amount;
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
        loadRecurring           : function(id){
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
                obj.set("employee_id", view[0].employee_id);//Employee
                obj.set("job_id", view[0].job_id);
                obj.set("segments", view[0].segments);
                obj.set("memo", view[0].memo);
                obj.set("memo2", view[0].memo2);
            });

            //Item Line
            this.recurringLineDS.query({
                filter: { field:"transaction_id", value:id }
            }).then(function(){
                var view = self.recurringLineDS.view();
                self.lineDS.data([]);
                self.toItemLineDS.data([]);

                $.each(view, function(index, value){
                    if(value.movement==-1){//FROM
                        self.lineDS.add({
                            transaction_id      : 0,
                            tax_item_id         : value.tax_item_id,
                            item_id             : value.item_id,
                            measurement_id      : value.measurement_id,
                            description         : value.description,
                            quantity            : value.quantity,
                            cost                : value.cost,
                            price               : value.price,
                            amount              : value.amount,
                            rate                : value.rate,
                            locale              : value.locale,
                            movement            : value.movement,

                            item                : value.item,
                            measurement         : value.measurement
                        });
                    }else{//TO
                        self.toItemLineDS.add({
                            transaction_id      : 0,
                            tax_item_id         : value.tax_item_id,
                            item_id             : value.item_id,
                            measurement_id      : value.measurement_id,
                            description         : value.description,
                            quantity            : value.quantity,
                            cost                : value.cost,
                            price               : value.price,
                            amount              : value.amount,
                            rate                : value.rate,
                            locale              : value.locale,
                            movement            : value.movement,

                            item                : value.item,
                            measurement         : value.measurement
                        });
                    }
                });

                self.changes();
            });

            //Account Line
            this.recurringAccountLineDS.query({
                filter: { field:"transaction_id", value:id }
            }).then(function(){
                var view = self.recurringAccountLineDS.view();
                self.accountLineDS.data([]);
                self.toAccountLineDS.data([]);

                $.each(view, function(index, value){
                    if(value.movement==-1){//FROM
                        self.accountLineDS.add({
                            transaction_id      : 0,
                            account_id          : value.account_id,
                            description         : value.description,
                            amount              : value.amount,
                            rate                : value.rate,
                            locale              : value.locale,
                            movement            : value.movement,

                            account             : value.account
                        });
                    }else{//TO
                        self.toAccountLineDS.add({
                            transaction_id      : 0,
                            account_id          : value.account_id,
                            description         : value.description,
                            amount              : value.amount,
                            rate                : value.rate,
                            locale              : value.locale,
                            movement            : value.movement,

                            account             : value.account
                        });
                    }
                });

                self.changes();
            });
        },
        frequencyChanges        : function(){
            var obj = this.get("obj");

            switch(obj.frequency) {
                case "Day":
                    this.set("showMonthOption", false);
                    this.set("showMonth", false);
                    this.set("showWeek", false);
                    this.set("showDay", false);

                    break;
                case "Week":
                    this.set("showMonthOption", false);
                    this.set("showMonth", false);
                    this.set("showWeek", true);
                    this.set("showDay", false);

                    break;
                case "Month":
                    this.set("showMonthOption", true);
                    this.set("showMonth", false);
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                case "Annual":
                    this.set("showMonthOption", false);
                    this.set("showMonth", true);
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                default:
                    //Default here..
            }
        },
        monthOptionChanges      : function(){
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
        validateRecurring       : function(){
            var result = true, obj = this.get("obj");

            if(obj.recurring_name!==""){
                //Check existing name
                $.each(this.recurringDS.data(), function(index, value){
                    if(value.recurring_name==obj.recurring_name){
                        result = false;
                        alert("This is name is taken.");

                        return false;
                    }
                });
            }
            else{
                result = false;
                alert("Recurring name is required.");
            }

            return result;
        }
    });

    // Report
    banhji.inventoryPositionSummary = kendo.observable({
        lang                : langVM,
        // dataSource           : dataStore(apiUrl + "inventory_modules/position_summary"),
        dataSource              : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "inventory_modules/position_summary",
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
            sort: [
                { field:"quantity", dir:"desc" },
                { field:"amount", dir:"desc" }
            ],
            serverFiltering: true,
            serverPaging: true,
            page: 1,
            pageSize: 10
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
            filter: [
                { field: "is_catalog", value: 0 },
                { field: "is_assembly", value: 0 },
                { field: "item_type_id", operator:"where_in", value: [1,4] }//Inventory For Sale & Service
            ],
            sort: [
                { field:"item_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
            ],
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 10
        }),
        categoryDS          : new kendo.data.DataSource({
            data: banhji.source.categoryList,
            filter: [
                {field:"item_type_id", value: 1}
            ]
        }),
        itemGroupDS         : banhji.source.itemGroupDS,
        itemCustomerDS      : dataStore(apiUrl + "items/contact"),
        obj                 : { itemIds: []},
        institute           : banhji.institute,
        as_of               : new Date(),
        displayDate         : "",
        total               : 0,
        exArray             : [],
        pageLoad            : function(){
            this.search();

            this.set("haveGroup", false);
        },
        catagoryChange      : function(){
            var self = this;
            this.itemGroupDS.data([]);

            this.itemGroupDS.filter([
                {field: "category_id", value: this.get("categorySelect")}
            ]);
            this.set("haveGroup", true);
        },
        search              : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                as_of = this.get("as_of"),
                displayDate = "";
                group  = this.get("groupSelect");
                category_id = this.get("categorySelect");

            if(category_id){
                para.push({field:"category_id", value: category_id});
            }

            if(group){
                para.push({field:"item_group_id", value: group.id});
            }

            //Items
            if(obj.itemIds.length>0){
                var itemIds = [];
                $.each(obj.itemIds, function(index, value){
                    itemIds.push(value);
                });
                para.push({ field:"id", operator:"where_in", value:itemIds });
            }

            if(as_of){
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate() + 1);

                para.push({ field:"issued_date <", operator:"as_of", value:kendo.toString(as_of, "yyyy-MM-dd") });
            }

            this.dataSource.query({
                filter:para,
                page: 1,
                pageSize: 50
            }).then(function(){
                // var view = self.dataSource.view();

                // var amount = 0;
                // $.each(view, function(index, value){
                //  amount += value.amount;
                // });

                // self.set("total", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response;

                    if(response){
                        self.set("total", kendo.toString(response.totalAmount, "c2", banhji.locale));
                    }

                    self.exArray = [];

                    self.exArray.push({
                        cells: [
                            { value: self.institute.name, textAlign: "center", colSpan: 7 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Inventory Position Summary",bold: true, fontSize: 20, textAlign: "center", colSpan: 7 }
                        ]
                    });
                    if(self.displayDate){
                        self.exArray.push({
                            cells: [
                                { value: self.displayDate, textAlign: "center", colSpan: 7 }
                            ]
                        });
                    };
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 7 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Item Name", background: "#496cad", color: "#ffffff" },
                            { value: "QOH", background: "#496cad", color: "#ffffff" },
                            { value: "ON PO", background: "#496cad", color: "#ffffff" },
                            { value: "ON SO", background: "#496cad", color: "#ffffff" },
                            { value: "Average Cost", background: "#496cad", color: "#ffffff" },
                            { value: "Average Price", background: "#496cad", color: "#ffffff" },
                            { value: "Amount", background: "#496cad", color: "#ffffff" }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++){
                            self.exArray.push({
                                cells: [
                                    { value: response.results[i].name },
                                    { value: kendo.parseFloat(response.results[i].qoh)},
                                    { value: kendo.parseFloat(response.results[i].po)},
                                    { value: kendo.parseFloat(response.results[i].so)},
                                    { value: kendo.parseFloat(response.results[i].cost)},
                                    { value: kendo.parseFloat(response.results[i].price)},
                                    { value: kendo.parseFloat(response.results[i].amount)},
                                ]
                            });
                        self.exArray.push({
                            cells: [
                                { value: "", colSpan: 7 }
                            ]
                        });
                    }
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
                    '<link href="https://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
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
        dataSourceEX        : dataStore(apiUrl + "inventory_modules/position_summary"),
        ExportExcel         : function(){
            $("#loadImport").css("display", "block");
           var self = this, para = [],
                obj = this.get("obj"),
                as_of = this.get("as_of"),
           displayDate = "";
           group  = this.get("groupSelect");
           category_id = this.get("categorySelect");

           if(category_id){
                para.push({field:"category_id", value: category_id});
           }

           if(group){
                para.push({field:"item_group_id", value: group.id});
           }

           //Items
           if(obj.itemIds.length>0){
                var itemIds = [];
                $.each(obj.itemIds, function(index, value){
                     itemIds.push(value);
                });
                para.push({ field:"id", operator:"where_in", value:itemIds });
           }

           if(as_of){
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate() + 1);
                para.push({ field:"issued_date <", operator:"as_of", value:kendo.toString(as_of, "yyyy-MM-dd") });
           }

           this.dataSourceEX.query({
                filter:para,
           }).then(function(e){
                self.exArray = [];
                self.exArray.push({
                     cells: [
                          { value: self.institute.name, textAlign: "center", colSpan: 7 }
                     ]
                });
                self.exArray.push({
                     cells: [
                          { value: "Inventory Position Summary",bold: true, fontSize: 20, textAlign: "center", colSpan: 7 }
                     ]
                });
                if(self.displayDate){
                     self.exArray.push({
                          cells: [
                               { value: self.displayDate, textAlign: "center", colSpan: 7 }
                          ]
                     });
                };
                self.exArray.push({
                     cells: [
                          { value: "", colSpan: 7 }
                     ]
                });
                self.exArray.push({
                     cells: [
                          { value: "Item Name", background: "#496cad", color: "#ffffff" },
                          { value: "ON PO", background: "#496cad", color: "#ffffff" },
                          { value: "ON SO", background: "#496cad", color: "#ffffff" },
                          { value: "QOH", background: "#496cad", color: "#ffffff" },
                          { value: "UOM", background: "#496cad", color: "#ffffff" },
                          { value: "Average Cost", background: "#496cad", color: "#ffffff" },
                          { value: "Inventory Value", background: "#496cad", color: "#ffffff" }
                     ]
                });
                if(self.dataSourceEX.data().length > 0){
                     $.each(self.dataSourceEX.data(), function(i,v){
                          self.exArray.push({
                               cells: [
                                    { value: v.name },
                                    { value: kendo.parseFloat(v.on_po)},
                                    { value: kendo.parseFloat(v.on_so)},
                                    { value: kendo.parseFloat(v.quantity)},
                                    { value: kendo.parseFloat(v.measurement)},
                                    { value: kendo.parseFloat(v.cost)},
                                    { value: kendo.parseFloat(v.amount)},
                               ]
                          });
                     });
                     var workbook = new kendo.ooxml.Workbook({
                          sheets: [{
                               columns: [
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true }
                               ],
                               title: "Inventory Position Summary",
                               rows: self.exArray
                          }]
                     });
                     //save the file as Excel file with extension xlsx
                     kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "inventoryPositionSummary.xlsx"});
                     $("#loadImport").css("display", "none");
                }
           });
        }
    });
    banhji.inventoryPositionDetail = kendo.observable({
        lang                    : langVM,
        dataSource              : dataStore(apiUrl + "inventory_modules/position_detail"),
        itemDS                  : new kendo.data.DataSource({
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
            filter: [
                { field: "is_catalog", value: 0 },
                { field: "is_assembly", value: 0 },
                { field: "item_type_id", operator:"where_in", value: [1,4] }//Inventory For Sale & Service
            ],
            sort: [
                { field:"item_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
            ],
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 10
        }),
        categoryDS              : new kendo.data.DataSource({
            data: banhji.source.categoryList,
            filter: [
                {field:"item_type_id", value: 1}
            ]
        }),
        itemGroupDS             : banhji.source.itemGroupDS,
        obj                     : { itemIds: [] },
        sortList                : banhji.source.sortList,
        sorter                  : "month",
        sdate                   : "",
        edate                   : "",
        institute               : banhji.institute,
        displayDate             : "",
        total                   : 0,
        exArray                 : [],
        pageLoad                : function(){
            // this.search();
            this.set("haveGroup", false);
        },
        catagoryChange      : function(){
            var self = this;
            this.itemGroupDS.data([]);

            this.itemGroupDS.filter([
                {field: "category_id", value: this.get("categorySelect")}
            ]);
            this.set("haveGroup", true);
        },
        sorterChanges           : function(){
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
        search                  : function(){
            var self = this, para = [], displayDate = "",
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate");
                group  = this.get("groupSelect");
                category = this.get("categorySelect");

            if(category){
                para.push({field:"category_id", operator:"where_related_item", value: category});
            }

            if(group){
                para.push({field:"item_group_id", operator:"where_related_item", value: group.id});
            }

            //Dates
            if(start && end){
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                //Add 1 day
                end.setDate(end.getDate() + 1);

                para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
                para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(start){
                start = new Date(start);
                end = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");
                //Add 1 day
                end.setDate(end.getDate() + 1);

                para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
                para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else if(end){
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                //Add 1 day
                end.setDate(end.getDate() + 1);

                para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
            }else{}
            this.set("displayDate", displayDate);

            //Item list
            if(obj.itemIds.length>0){
                var itemIds = [];
                $.each(obj.itemIds, function(index, value){
                    itemIds.push(value);
                });

                para.push({ field: "item_id", operator:"where_in", value:itemIds });
            }

            this.dataSource.query({
                filter:para
            }).then(function(){
                // var view = self.dataSource.view();

                // var sum = 0;
                // $.each(view, function(index, value){
                //  sum += value.balance_forward;
                //  $.each(value.line, function(ind, val){
                //      sum += val.amount;
                //  });
                // });
                // self.set("total", kendo.toString(sum, "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response, balanceCal = 0, balanceRec = 0, qty= 0, balance= 0;

                    if(response){
                        self.set("total", kendo.toString(response.totalAmount, "c2", banhji.locale));
                    }

                    self.exArray = [];

                    self.exArray.push({
                        cells: [
                            { value: self.institute.name, textAlign: "center", colSpan: 8}
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Inventory Position Detail",bold: true, fontSize: 20, textAlign: "center", colSpan: 8}
                        ]
                    });
                    if(self.displayDate){
                        self.exArray.push({
                            cells: [
                                { value: self.displayDate, textAlign: "center", colSpan: 8}
                            ]
                        });
                    }
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 8}
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "TXN Type", background: "#496cad", color: "#ffffff" },
                            { value: "Date", background: "#496cad", color: "#ffffff" },
                            { value: "REF", background: "#496cad", color: "#ffffff" },
                            { value: "QTY", background: "#496cad", color: "#ffffff" },
                            { value: "Cost", background: "#496cad", color: "#ffffff" },
                            { value: "Price", background: "#496cad", color: "#ffffff" },
                            { value: "On Hand", background: "#496cad", color: "#ffffff" },
                            { value: "Balance", background: "#496cad", color: "#ffffff" }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++){
                        qty = response.results[i].qoh_forward, balance = response.results[i].balance_forward;
                        self.exArray.push({
                            cells: [
                                { value: response.results[i].name, bold: true, },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: response.results[i].qoh_forward, bold: true, },
                                { value: response.results[i].balance_forward, bold: true, }
                            ]

                        });
                        for(var j = 0; j < response.results[i].line.length; j++){
                            qty += response.results[i].line[j].quantity;
                            balance += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [
                                    { value: response.results[i].line[j].type },
                                    { value: response.results[i].line[j].issued_date },
                                    { value: response.results[i].line[j].number},
                                    { value: response.results[i].line[j].quantity },
                                    { value: response.results[i].line[j].cost},
                                    { value: response.results[i].line[j].price},
                                    { value: qty},
                                    { value: balance},
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
                            { value: "" },
                            { value: "" },
                            { value: balance, bold: true, fontSize: 16 },
                        ]
                        });
                        self.exArray.push({
                            cells: [
                                { value: "", colSpan: 7 }
                            ]
                        });
                    }
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
                    '<link href="https://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
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
                    { autoWidth: true },
                    { autoWidth: true }
                  ],
                  title: "Inventory Position Detail",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "inventoryPositionDetail.xlsx"});
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

        // Function
        item: new kendo.Layout("#item", {model: banhji.item}),
        itemService: new kendo.Layout("#itemService", {model: banhji.itemService}),
        itemPrice: new kendo.Layout("#itemPrice", {model: banhji.itemPrice}),
        itemCatalog: new kendo.Layout("#itemCatalog", {model: banhji.itemCatalog}),
        itemAssembly: new kendo.Layout("#itemAssembly", {model: banhji.itemAssembly}),
        itemAdjustment: new kendo.Layout("#itemAdjustment", {model: banhji.itemAdjustment}),
        internalUsage: new kendo.Layout("#internalUsage", {model: banhji.internalUsage}),
        
        // Report
        inventoryPositionSummary: new kendo.Layout("#inventoryPositionSummary", {model: banhji.inventoryPositionSummary}),
        inventoryPositionSummaryByLocation: new kendo.Layout("#inventoryPositionSummaryByLocation", {model: banhji.inventoryPositionSummaryByLocation}),
        inventoryPositionDetail: new kendo.Layout("#inventoryPositionDetail", {model: banhji.inventoryPositionDetail}),

        // Menu
        tapMenu: new kendo.View("#tapMenu", {model: banhji.tapMenu}),
        reports: new kendo.View("#reports", {model: banhji.reports}),
        checkOut: new kendo.View("#checkOut", {model: banhji.checkOut}),
        transactions: new kendo.View("#transactions", {model: banhji.transactions}),
        items: new kendo.View("#items", {model: banhji.items}),
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
        banhji.view.Index.showIn('#indexContent', banhji.view.items);

        banhji.items.pageLoad();        
    });
    banhji.router.route('/check_out', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.checkOut);

        //load MVVM
        //banhji.checkOut.pageLoad();
    });
    banhji.router.route('/transactions', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.transactions);

        //load MVVM
        //banhji.transactions.pageLoad();
    });
    banhji.router.route('/reports', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.reports);

        // if(banhji.pageLoaded["customers"]==undefined){
        //     banhji.pageLoaded["customers"] = true;
            
        //     banhji.source.supplierDS.filter({
        //         field: "parent_id",
        //         operator: "where_related_contact_type",
        //         value: 2
        //     });
        // }

        

        //load MVVM
        banhji.reports.pageLoad();
    });

    // Function
    banhji.router.route("/item(/:id)(/:category_id)", function(id, category_id){
        // var allowed = banhji.source.checkAccessModule("Products/Services");

        // if(allowed) {
            var vm = banhji.item;

            banhji.view.layout.showIn("#content", banhji.view.item);
            banhji.userManagement.addMultiTask("Inventory For Sale","item",null);

            if(banhji.pageLoaded["item"]==undefined){
                banhji.pageLoaded["item"] = true;

                // vm.accessModule();

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

            vm.pageLoad(id, category_id);
        // } else {
        //  // window.location.replace(baseUrl + "admin");
        // }
    });
    banhji.router.route("/item_catalog(/:id)", function(id){
        banhji.accessMod.query({
            filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        }).then(function(e){
            var allowed = false;
            if(banhji.accessMod.data().length > 0) {
                for(var i = 0; i < banhji.accessMod.data().length; i++) {
                    if("products/services" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            }
            if(allowed) {
                var vm = banhji.itemCatalog;

                banhji.userManagement.addMultiTask("Inventory Catalog","item_catalog",vm);

                banhji.view.layout.showIn("#content", banhji.view.itemCatalog);

                if(banhji.pageLoaded["item_catalog"]==undefined){
                    banhji.pageLoaded["item_catalog"] = true;

                    var validator = $("#example").kendoValidator().data("kendoValidator");
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
    banhji.router.route("/item_service(/:id)(/:category_id)", function(id, category_id){
        banhji.accessMod.query({
            filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        }).then(function(e){
            var allowed = false;
            if(banhji.accessMod.data().length > 0) {
                for(var i = 0; i < banhji.accessMod.data().length; i++) {
                    if("products/services" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            }
            if(allowed) {
                var vm = banhji.itemService;

                banhji.userManagement.addMultiTask("Service","item_service",vm);

                banhji.view.layout.showIn("#content", banhji.view.itemService);

                if(banhji.pageLoaded["item_service"]==undefined){
                    banhji.pageLoaded["item_service"] = true;

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

                vm.pageLoad(id, category_id);
            } else {
                window.location.replace(baseUrl + "admin");
            }
        });
    });
    banhji.router.route("/item_assembly(/:id)", function(id){
        banhji.accessMod.query({
            filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        }).then(function(e){
            var allowed = false;
            if(banhji.accessMod.data().length > 0) {
                for(var i = 0; i < banhji.accessMod.data().length; i++) {
                    if("products/services" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            }
            if(allowed) {
                var vm = banhji.itemAssembly;

                banhji.view.layout.showIn("#content", banhji.view.itemAssembly);
                banhji.userManagement.addMultiTask("Inventory Assembly","item_assembly",vm);

                if(banhji.pageLoaded["item_assembly"]==undefined){
                    banhji.pageLoaded["item_assembly"] = true;

                    vm.lineDS.bind("change", vm.lineDSChanges);

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
    banhji.router.route("/item_prices/:id", function(id){
        banhji.accessMod.query({
            filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        }).then(function(e){
            var allowed = false;
            if(banhji.accessMod.data().length > 0) {
                for(var i = 0; i < banhji.accessMod.data().length; i++) {
                    if("products/services" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            }
            if(allowed) {
                var vm = banhji.itemPrice;

                banhji.userManagement.addMultiTask("Inventory Price","item_prices",null);

                banhji.view.layout.showIn("#content", banhji.view.itemPrice);

                if(banhji.pageLoaded["item_prices"]==undefined){
                    banhji.pageLoaded["item_prices"] = true;

                }

                vm.pageLoad(id);
            } else {
                window.location.replace(baseUrl + "admin");
            }
        });
    });
    banhji.router.route("/item_adjustment(/:id)", function(id){
        banhji.accessMod.query({
            filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        }).then(function(e){
            var allowed = false;
            if(banhji.accessMod.data().length > 0) {
                for(var i = 0; i < banhji.accessMod.data().length; i++) {
                    if("products/services" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            }
            if(allowed) {
                banhji.view.layout.showIn('#content', banhji.view.Index);
                banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
                banhji.view.Index.showIn('#indexContent', banhji.view.itemAdjustment);

                var vm = banhji.itemAdjustment;
                banhji.userManagement.addMultiTask("Inventory Adjustment","item_adjustment",vm);

                if(banhji.pageLoaded["item_adjustment"]==undefined){
                    banhji.pageLoaded["item_adjustment"] = true;

                    vm.lineDS.bind("change", vm.lineDSChanges);

                    var validator = $("#example").kendoValidator({
                        rules: {
                            customRule1: function(input) {
                                if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
                                    vm.set("recurring_validate", false);
                                    return $.trim(input.val()) !== "";
                                }
                                return true;
                            }
                        },
                        messages: {
                            customRule1: banhji.source.requiredMessage
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

                    $("#savePrint").click(function(e){
                        e.preventDefault();

                        if(validator.validate()){
                            vm.set("savePrint", true);
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
            } else {
                window.location.replace(baseUrl + "admin");
            }
        });
    });
    banhji.router.route("/internal_usage(/:id)", function(id){
        banhji.accessMod.query({
            filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        }).then(function(e){
            var allowed = false;
            if(banhji.accessMod.data().length > 0) {
                for(var i = 0; i < banhji.accessMod.data().length; i++) {
                    if("products/services" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            }
            if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.internalUsage);
                banhji.view.layout.showIn('#menu', banhji.view.menu);
                banhji.view.menu.showIn('#secondary-menu', banhji.view.inventoryMenu);

                var vm = banhji.internalUsage;

                banhji.userManagement.addMultiTask("Internal Usage","internal_usage",null);

                if(banhji.pageLoaded["internal_usage"]==undefined){
                    banhji.pageLoaded["internal_usage"] = true;

                    vm.lineDS.bind("change", vm.itemLineDSChanges);
                    vm.accountLineDS.bind("change", vm.accountLineDSChanges);
                    vm.toItemLineDS.bind("change", vm.toItemLineDSChanges);
                    vm.toAccountLineDS.bind("change", vm.toAccountLineDSChanges);

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

                    $("#saveDraft1").click(function(e){
                        e.preventDefault();

                        if(validator.validate() && vm.validating()){
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
            } else {
                window.location.replace(baseUrl + "admin");
            }
        });
    });
    
    // Report
    banhji.router.route("/inventory_position_summary", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn('#content', banhji.view.Index);
            banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
            banhji.view.Index.showIn('#indexContent', banhji.view.inventoryPositionSummary);

            var vm = banhji.inventoryPositionSummary;
            banhji.userManagement.addMultiTask("Inventory Position Summary","inventory_position_summary",null);

            if(banhji.pageLoaded["inventory_position_summary"]==undefined){
                banhji.pageLoaded["inventory_position_summary"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/inventory_position_detail", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            
            banhji.view.layout.showIn('#content', banhji.view.Index);
            banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
            banhji.view.Index.showIn("#indexContent", banhji.view.inventoryPositionDetail);

            var vm = banhji.inventoryPositionDetail;
            banhji.userManagement.addMultiTask("Inventory Position Detail","inventory_position_detail",null);

            if(banhji.pageLoaded["inventory_position_detail"]==undefined){
                banhji.pageLoaded["inventory_position_detail"] = true;

                vm.sorterChanges();
            }
            vm.pageLoad();
        }
    });
    

   
    $(function() {
        banhji.router.start();
        banhji.source.pageLoad();
    });
</script> 