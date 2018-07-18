<!--  List Templates -->
<script>
    function itemComboBoxEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoComboBox({
            placeholder: "Select Item",
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#item-list-tmpl").html()),
            dataSource: banhji.source.itemList
        });
    }
    function itemEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            filter: "contains",         
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#item-list-tmpl-1").html()),
            dataSource: {
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
                sort: [
                    { field:"item_type_id", dir:"asc" },
                    { field:"number", dir:"asc" }
                ],
                batch: true,
                serverFiltering: true,
                serverSorting: true,
                serverPaging: true,
                page: 1,
                pageSize: 50
            }
        });
    }
    function variantAttributeEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            valuePrimitive: false,
            filter: "startswith",           
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: dataStore(apiUrl + "variant_attributes")
        });
    }
    function attributeValueEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoMultiSelect({
            valuePrimitive: false,
            dataTextField: "name",
            dataValueField: "id",
            autoBind: false,
            dataSource: {
                transport: {
                    read    : {
                        url: apiUrl + "attribute_values",
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
                filter:{ field: "variant_attribute_id", value: options.model.variant_attribute.id },
                sort: { field:"name", dir:"asc" },
                batch: true,
                serverFiltering: true,
                serverSorting: true,
                serverPaging: true,
                page: 1,
                pageSize: 100
            }
        });
    }
    function locationTypeEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
                transport: {
                    read    : {
                        url: apiUrl + "location_types",
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
                batch: true,
                serverFiltering: true,
                serverSorting: true,
                serverPaging: true,
                page: 1,
                pageSize: 100
            }
        });
    }
    function inventoryForSaleEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            filter: "contains",         
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#item-list-tmpl").html()),
            dataSource: {
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
                filter:{ field: "item_type_id", value: 1 },
                sort: { field:"number", dir:"asc" },
                batch: true,
                serverFiltering: true,
                serverSorting: true,
                serverPaging: true,
                page: 1,
                pageSize: 100
            }
        });
    }
    function accountEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            filter: "contains",         
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#account-list-tmpl").html()),
            dataSource: {
                data: banhji.source.accountList,
                sort: [
                    { field: "account_type_id", dir: "asc" },
                    { field: "number", dir: "asc" }
                ]
            }
        });
    }
    function toAccountEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            filter: "contains",         
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#account-list-tmpl").html()),
            dataSource: {
                data: banhji.source.accountList,
                filter: [
                    { field: "account_type_id", operator:"neq", value: 10 },
                    { field: "account_type_id", operator:"neq", value: 11 },
                    { field: "account_type_id", operator:"neq", value: 12 }
                ],
                sort: [
                    { field: "account_type_id", dir: "asc" },
                    { field: "number", dir: "asc" }
                ]
            }
        });
    }
    function whtAccountEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            filter: "contains",         
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#account-list-tmpl").html()),
            dataSource: {
                data: banhji.source.accountList,
                filter: {
                    logic: "or",
                    filters: [
                        { field: "account_type_id", value: 13 },//Inventory
                        { field: "account_type_id", value: 16 },//Fixed Asset
                        { field: "account_type_id", value: 17 },//Intangible Assets
                        { field: "account_type_id", value: 36 },//Expense
                        { field: "account_type_id", value: 37 },
                        { field: "account_type_id", value: 38 },
                        { field: "account_type_id", value: 40 },
                        { field: "account_type_id", value: 41 },
                        { field: "account_type_id", value: 42 },
                        { field: "account_type_id", value: 43 }
                    ]
                },
                sort: [
                    { field: "account_type_id", dir: "asc" },
                    { field: "number", dir: "asc" }
                ]
            }
        });
    }
    function measurementEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({        
            dataTextField: "measurement",
            dataValueField: "measurement_id",
            autoWidth: true,
            height: 200,
            dataSource: {
                transport: {
                    read    : {
                        url: apiUrl + "item_prices",
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
                    { field:"item_id", value: options.model.item_id },
                    { field:"assembly_id", value: 0 }
                ],
                batch: true,
                serverFiltering: true,
                serverSorting: true,
                serverPaging: true,
                page: 1,
                pageSize: 100
            }
        });
    }
    function discountEditor(container, options) {
        $('<input name="' + options.field + '" type="number" class="k-textbox" style="width: 95%;" min="0" max="1" />')
        .appendTo(container);
    }
    function taxForSaleEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
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
            }
        });
    }
    function taxForPurchaseEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
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
            }
        });
    } 
    

    function segmentEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            filter: "startswith",           
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
                transport: {
                    read    : {
                        url: apiUrl + "segments",
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
                serverFiltering: true,
                serverSorting: true,
                serverPaging: true,
                page: 1,
                pageSize: 100
            }
        });
    }
    function segmentItemEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            filter: "startswith",           
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#segment-list-tmpl").html()),
            dataSource: {
                transport: {
                    read    : {
                        url: apiUrl + "segments/item",
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
                filter:{ field: "segment_id", value: options.model.segment.id },
                serverFiltering: true,
                serverSorting: true,
                serverPaging: true,
                page: 1,
                pageSize: 100
            }
        });
    }
    function numberTextboxEditor(container, options) {
        $('<input name="' + options.field + '" type="number" class="k-textbox" style="width: 95%;" />')
        .appendTo(container);
    }
    function dateEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDatePicker({
            format: "dd-MM-yyyy",
            parseFormats: ["yyyy-MM-dd"]
        });
    }
    function customBoolEditor(container, options) {
        $('<input class="k-checkbox" type="checkbox" name="applyAdditionalCostChk" data-type="boolean" data-bind="checked:additional_applied">').appendTo(container);
        $('<label class="k-checkbox-label">&#8203;</label>').appendTo(container);
    }
    function supplierEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            filter: "contains",         
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#contact-list-tmpl").html()),
            dataSource: {
                transport: {
                    read    : {
                        url: apiUrl + "contacts",
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
                filter:{ field: "parent_id", operator:"where_related_contact_type", value: 2 },
                sort: [
                    { field:"contact_type_id", dir:"asc" },
                    { field:"number", dir:"asc" }
                ],
                batch: true,
                serverFiltering: true,
                serverSorting: true,
                serverPaging: true,
                page: 1,
                pageSize: 100
            }
        });
    }

    function itemPurchaseEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            filter: "contains",
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#item-list-tmpl-purchase").html()),
            dataSource: {
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
                    { field: "item_type_id <>", value: 3 },
                    { field: "is_assembly", value: 0 }
                ],
                sort: [
                    { field:"item_type_id", dir:"asc" },
                    { field:"number", dir:"asc" }
                ],
                batch: true,
                serverFiltering: true,
                serverSorting: true,
                serverPaging: true,
                page: 1,
                pageSize: 50
            }
        });
    }
</script>
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
    localforage.config({
        driver: localforage.LOCALSTORAGE,
        name: 'userData'
    });
    var langVM = kendo.observable({
        lang: null,
        localeCode: null,
        changeToEn: function() {
            localforage.setItem("lang", "EN").then(function(value) {
                location.reload(false);
            });
        },
        changeToKh: function() {
            localforage.setItem("lang", "KH").then(function(value) {
                location.reload(false);
            });
        }
    });
    var banhji = banhji || {};
    var baseUrl = "<?php echo base_url(); ?>";
    var apiUrl = baseUrl + 'api/';
    banhji.s3 = "https://banhji.s3.amazonaws.com/";
    banhji.token = null;
    banhji.no_image = "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg";
    // custom widget for min and max
    kendo.data.binders.widget.max = kendo.data.Binder.extend({
        init: function(widget, bindings, options) { //call the base constructor
            kendo.data.Binder.fn.init.call(this, widget.element[0], bindings, options);
        },
        refresh: function() {
            var that = this,
                value = that.bindings["max"].get(); //get the value from the View-Model
            $(that.element).data("kendoDatePicker").max(value); //update the widget
        }
    });

    kendo.data.binders.widget.min = kendo.data.Binder.extend({
        init: function(widget, bindings, options) {
            //call the base constructor
            kendo.data.Binder.fn.init.call(this, widget.element[0], bindings, options);
        },
        refresh: function() {
            var that = this,
                value = that.bindings["min"].get(); //get the value from the View-Model
            $(that.element).data("kendoDatePicker").min(value); //update the widget
        }
    });
    // end of custom widget
    banhji.fileManagement = kendo.observable({
        dataSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: baseUrl + 'api/attachments',
                    type: "GET",
                    dataType: 'json',
                    headers: {
                        Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id
                    }
                },
                create: {
                    url: baseUrl + 'api/attachments',
                    type: "POST",
                    dataType: 'json',
                    headers: {
                        Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id
                    }
                },
                update: {
                    url: baseUrl + 'api/attachments',
                    type: "PUT",
                    dataType: 'json',
                    headers: {
                        Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id
                    }
                },
                destroy: {
                    url: baseUrl + 'api/attachments',
                    type: "DELETE",
                    dataType: 'json',
                    headers: {
                        Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id
                    }
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.take,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 50
        }),
        fileArray: [],
        onRemove: function(e) {
            banhji.fileManagement.dataSource.remove(e.data);
        },
        onSelected: function(e) {
            var files = e.files;
            var key = 'ATTACH_' + JSON.parse(localStorage.getItem('userData/user')).institute.id + "_" + Math.floor(Math.random() * 100000000000000001) + '_' + files[0].name;
            banhji.fileManagement.dataSource.add({
                transaction_id: 0,
                type: "Transaction",
                name: files[0].name,
                contact_id: null,
                description: "",
                key: key,
                url: "https://s3-ap-southeast-1.amazonaws.com/banhji/" + key,
                created_at: new Date(),
                file: files[0].rawFile
            });
        },
        transactionSize: 0,
        contactSize: 0,
        totalSize: 0,
        transactionNu: 0,
        contactNu: 0,
        save: function(contact_id) {
            $.each(banhji.fileManagement.dataSource.data(), function(index, value) {
                banhji.fileManagement.dataSource.at(index).set("transaction_id", contact_id);
                if (!value.id) {
                    var params = {
                        Body: value.file,
                        Key: value.key
                    };
                    bucket.upload(params, function(err, data) {
                        // console.log(err, data);
                        // var url = data.Location;               
                    });
                }
            });

            banhji.fileManagement.dataSource.sync();
            var saved = false;
            banhji.fileManagement.dataSource.bind("requestEnd", function(e) {
                //Delete File
                if (e.type == "destroy") {
                    if (saved == false && e.response) {
                        saved = true;
                        var response = e.response.results;
                        $.each(response, function(index, value) {
                            var params = {
                                Delete: { /* required */
                                    Objects: [ /* required */ {
                                        Key: value.data.key
                                    }]
                                }
                            };
                            bucket.deleteObjects(params, function(err, data) {
                                //console.log(err, data);
                            });
                        });
                    }
                }
                banhji.fileManagement.dataSource.data([]);
            });
        }
    });
    banhji.pageLoaded = {};
    // Initializing AWS Cognito service
    var userPool = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserPool(poolData);
    // Initializing AWS S3 Service
    var bucket = new AWS.S3({
        params: {
            Bucket: 'banhji'
        }
    });
    banhji.accessMod = new kendo.data.DataSource({
        transport: {
            read: {
                url: baseUrl + 'api/users/access',
                type: "GET",
                dataType: 'json'
            },
            parameterMap: function(options, operation) {
                if (operation === 'read') {
                    return {
                        limit: options.pageSize,
                        page: options.page,
                        filter: options.filter
                    };
                } else {
                    return {
                        models: kendo.stringify(options.models)
                    };
                }
            }
        },
        schema: {
            model: {
                id: 'id'
            },
            data: 'results',
            total: 'count'
        },
        batch: true,
        serverFiltering: true,
        serverPaging: true,
        filter: {
            field: 'username',
            value: userPool.getCurrentUser() == null ? '' : userPool.getCurrentUser().username
        },
        pageSize: 1
    });
    banhji.allowed;

    function checkRole(arg) {
        var dfd = $.Deferred();
        // var roleName = $(location).attr('hash').substr(2);
        // loop through roles if this has in the role list
        banhji.accessMod.query({
            filter: {
                field: 'username',
                value: JSON.parse(localStorage.getItem('userData/user')).username
            }
        }).then(function(e) {
            if (banhji.accessMod.data().length > 0) {
                for (var i = 0; i < banhji.accessMod.data().length; i++) {
                    if (arg == banhji.accessMod.data()[i].name.toLowerCase()) {
                        dfd.resolve(true);
                        break;
                    }
                }
            }
        });
    }
    banhji.companyDS = new kendo.data.DataSource({
        transport: {
            read: {
                url: baseUrl + 'api/profiles/company',
                type: "GET",
                dataType: 'json'
            },
            update: {
                url: baseUrl + 'api/profiles/company',
                type: "PUT",
                dataType: 'json'
            },
            parameterMap: function(options, operation) {
                if (operation === 'read') {
                    return {
                        limit: options.pageSize,
                        page: options.page,
                        filter: options.filter
                    };
                } else {
                    return {
                        models: kendo.stringify(options.models)
                    };
                }
            }
        },
        schema: {
            model: {
                id: 'id'
            },
            data: 'results',
            total: 'count'
        },
        batch: true,
        serverFiltering: true,
        serverPaging: true,
        filter: {
            field: 'username',
            value: userPool.getCurrentUser() == null ? '' : userPool.getCurrentUser().username
        },
        pageSize: 1
    });
    banhji.profileDS = new kendo.data.DataSource({
        transport: {
            read: {
                url: baseUrl + 'api/profiles',
                type: "GET",
                dataType: 'json',
                headers: banhji.header,
            },
            parameterMap: function(options, operation) {
                if (operation === 'read') {
                    return {
                        limit: options.pageSize,
                        page: options.page,
                        filter: options.filter
                    };
                } else {
                    return {
                        models: kendo.stringify(options.models)
                    };
                }
            }
        },
        schema: {
            model: {
                id: 'id'
            },
            data: 'results',
            total: 'count'
        },
        batch: true,
        serverFiltering: true,
        serverPaging: true,
        filter: {
            field: 'username',
            value: userPool.getCurrentUser() == null ? '' : userPool.getCurrentUser().username
        },
        pageSize: 100
    });
    banhji.aws = kendo.observable({
        password: null,
        confirm: null,
        email: null,
        verificationCode: null,
        cognitoUser: null,
        newPass: null,
        oldPass: null,
        image: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png",
        getImage: function() {
            banhji.profileDS.fetch(function(e) {
                banhji.aws.set('image', banhji.profileDS.data()[0].profile_photo);
            });
        },
        signUp: function() {
            // e.preventDefault();
            if (this.get('password') != this.get('confirm')) {
                alert('Passwords do not match');
            } else {
                // using cognito to sign up
                var attributeList = [];

                var dataEmail = {
                    Name: 'email',
                    Value: this.get('email')
                };

                var attributeEmail = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserAttribute(dataEmail);

                attributeList.push(attributeEmail);

                userPool.signUp(this.get('email'), this.get('password'), attributeList, null, function(err, result) {
                    if (err) {
                        alert(err);
                        return;
                    }
                    // update attribute
                    // 2. move to admin page
                    // banhji.awsCognito.set('cognitoUser', result.user);
                    banhji.router.navigate('confirm');
                });
            }
        },
        comfirmCode: function(e) {
            e.preventDefault();
            // confirm user verification code after signed up
            var userData = {
                Username: userPool.getCurrentUser().username,
                Pool: userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.confirmRegistration(this.get('verificationCode'), true, function(err, result) {
                if (err) {
                    alert(err);
                    return;
                }
                banhji.router.navigate('index');
            });
        },
        resendCode: function(e) {
            e.preventDefault();
            alert('code resent');
        },
        signIn: function() {
            var authenticationData = {
                Username: this.get('email'),
                Password: this.get('password'),
            };
            var authenticationDetails = new AWSCognito.CognitoIdentityServiceProvider.AuthenticationDetails(authenticationData);

            var userData = {
                Username: this.get('email'),
                Pool: userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.authenticateUser(authenticationDetails, {
                onSuccess: function(result) {
                    banhji.awsCognito.set('cognitoUser', cognitoUser);
                },

                onFailure: function(err) {
                    alert(err);
                },

            });
        },
        signOut: function(e) {
            e.preventDefault();
            var userData = {
                Username: userPool.getCurrentUser().username,
                Pool: userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            if (cognitoUser != null) {
                cognitoUser.signOut();
                localforage.clear().then(function() {
                    window.location.replace("<?php base_url(); ?>login");
                });
            } else {
                console.log('No user');
            }
        },
        changePassword: function() {
            var userData = {
                Username: this.get('email'),
                Pool: userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.changePassword('oldPassword', 'newPassword', function(err, result) {
                if (err) {
                    alert(err);
                    return;
                }
                console.log('call result: ' + result);
            });
        },
        forgotPassword: function(e) {
            e.preventDefault();
            var userData = {
                Username: this.get('email'),
                Pool: userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.forgotPassword({
                onSuccess: function(result) {
                    console.log('call result: ' + result);
                },
                onFailure: function(err) {
                    alert(err);
                },
                inputVerificationCode() {
                    var verificationCode = prompt('Please input verification code ', '');
                    var newPassword = prompt('Enter new password ', '');
                    cognitoUser.confirmPassword(verificationCode, newPassword, this);
                }
            });
        },
        getCurrentUser: function() {
            var cognitoUser = null;
            if (userPool.getCurrentUser() != null) {
                cognitoUser = userPool.getCurrentUser();
            }
            return cognitoUser;
        }
    });
    // Check if user is logged and authenticated via cognito service
    if (userPool.getCurrentUser() == null) {
        // if not login return to login page    
        //window.location.replace('http://localhost/aws/login.html');
    } else {
        var cognitoUser = userPool.getCurrentUser();
        if (cognitoUser !== null) {
            // banhji.aws.getImage();
            cognitoUser.getSession(function(err, result) {
                if (result) {
                    AWS.config.credentials = new AWS.CognitoIdentityCredentials({
                        IdentityPoolId: 'us-east-1:35445541-da4c-4dbb-b83f-d1d0301a26a9',
                        Logins: {
                            'cognito-idp.us-east-1.amazonaws.com/us-east-1_56S0nUDS4': result.getIdToken().getJwtToken()
                        }
                    });
                }
            });
        }
    }
    banhji.userData = JSON.parse(localStorage.getItem('userData/user')) ? JSON.parse(localStorage.getItem('userData/user')) : "";
    if (banhji.userData == "") {
        banhji.companyDS.fetch(function() {
            banhji.profileDS.fetch(function() {
                var data = banhji.companyDS.data();
                var id = 0;
                id = banhji.profileDS.data()[0].id;
                if (data.length > 0) {
                    var user = {
                        id: id,
                        username: userPool.getCurrentUser().username,
                        institute: data
                    };
                    localforage.setItem('user', user);
                }
                banhji.userData = JSON.parse(localStorage.getItem('userData/user'));
            });
        });
    }
    banhji.institute = banhji.userData ? banhji.userData.institute : "";
    banhji.locale = banhji.institute.currency.locale;
    banhji.localeReport = banhji.institute.reportCurrency.locale;
    banhji.header = {
        Institute: banhji.institute.id
    };
    var dataStore = function(url) {
        var o = new kendo.data.DataSource({
            transport: {
                read: {
                    url: url,
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create: {
                    url: url,
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update: {
                    url: url,
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy: {
                    url: url,
                    type: "DELETE",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            limit: options.pageSize,
                            filter: options.filter,
                            sort: options.sort
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        });
        return o;
    };
    banhji.userManagement = kendo.observable({
        lang: langVM,
        multiTaskList: [],
        searchText: "",
        searchType: "contacts",
        checkRole: function(e) {
            e.preventDefault();
            if (JSON.parse(localStorage.getItem('userData/user')).role == 1) {
                window.location.replace("<?php echo base_url(); ?>rrd");
            } else {
                window.location.replace("<?php echo base_url(); ?>admin");
            }
        },
        searchContact: function() {
            this.set("searchType", "contacts");

            $("#search-placeholder").attr('placeholder', "Search Contact");
        },
        searchTransaction: function() {
            this.set("searchType", "transactions");

            $("#search-placeholder").attr('placeholder', "Search Transaction");
        },
        searchItem: function() {
            this.set("searchType", "items");

            $("#search-placeholder").attr('placeholder', "Search Item");
        },
        search: function(e) {
            e.preventDefault();

            banhji.searchAdvanced.set("searchText", this.get("searchText"));
            banhji.searchAdvanced.set("searchType", this.get("searchType"));
            banhji.searchAdvanced.search();
            banhji.router.navigate('/search_advanced');
        },
        removeLink: function(e) {
            e.preventDefault();

            var data = e.data,
                index = this.multiTaskList.indexOf(data);

            if (data.vm !== null) {
                data.vm.cancel();
            }

            this.multiTaskList.splice(index, 1);
        },
        removeMultiTask: function(url) {
            var self = this;

            $.each(this.multiTaskList, function(index, value) {
                if (value.url == url) {
                    self.multiTaskList.splice(index, 1);

                    return false;
                }
            });
        },
        addMultiTask: function(name, url, vm) {
            var isExisting = false;
            $.each(this.multiTaskList, function(index, value) {
                if (value.url == url) {
                    isExisting = true;

                    return false;
                }
            });

            if (isExisting == false) {
                this.multiTaskList.push({
                    name: name,
                    url: url,
                    vm: vm
                });
            }
        },
        auth: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'authentication',
                    type: "GET",
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + 'authentication',
                    type: "POST",
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + 'authentication',
                    type: "PUT",
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + 'authentication',
                    type: "DELETE",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            // pageSize: 100
        }),
        inst: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'banhji/company',
                    type: "GET",
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + 'banhji/company',
                    type: "POST",
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + 'banhji/company',
                    type: "PUT",
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + 'banhji/company',
                    type: "DELETE",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            // pageSize: 100
        }),
        industry: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'banhji/industry',
                    type: "GET",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            // pageSize: 100
        }),
        countries: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'banhji/countries',
                    type: "GET",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            // pageSize: 100
        }),
        provinces: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'banhji/provinces',
                    type: "GET",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            // pageSize: 100
        }),
        types: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'banhji/types',
                    type: "GET",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            // pageSize: 100
        }),
        instMod: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'admin/modules_institute',
                    type: "GET",
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + 'admin/modules_institute',
                    type: "POST",
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + 'admin/modules_institute',
                    type: "PUT",
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + 'admin/modules_institute',
                    type: "DELETE",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            filter: {
                field: 'id',
                value: 1
            }
            // pageSize: 100
        }),
        onSuccessUpload: function(e) {
            var logo = e.response.results.url;
            this.get('newInst').set('logo', logo);
            this.saveIntitute();
            // console.log(logo);
        },
        close: function() {
            window.history.back(-1);
            if (this.inst.hasChanges()) {
                this.inst.cancelChanges();
            }
            if (this.auth.hasChanges()) {
                this.auth.cancelChanges();
            }
        },
        getUsername: function() {
            var x = banhji.userData.username.substring(0, 2);
            return x.toUpperCase();
        },
        taxRegimes: [{
                code: 'small',
                type: 'ខ្នាតតូច'
            },
            {
                code: 'medium',
                type: 'ខ្នាតមធ្យម'
            },
            {
                code: 'large',
                type: 'ខ្នាតធំ'
            }
        ],
        currency: [{
                code: 'KHR',
                locale: 'km-KH'
            },
            {
                code: 'USD',
                locale: 'us-US'
            },
            {
                code: 'VND',
                locale: 'vn-VN'
            }
        ],
        username: null,
        password: null,
        _password: null,
        pwdDS: new kendo.data.DataSource({
            transport: {
                create: {
                    url: apiUrl + 'banhji/password',
                    type: "POST",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        }),
        validateEmail: function() {
            var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
            var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
            var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
            var sQuotedPair = '\\x5c[\\x00-\\x7f]';
            var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
            var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
            var sDomain_ref = sAtom;
            var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
            var sWord = '(' + sAtom + '|' + sQuotedString + ')';
            var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
            var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
            var sAddrSpec = sLocalPart + '\\x40' + sDomain; // complete RFC822 email address spec
            var sValidEmail = '^' + sAddrSpec + '$'; // as whole string

            var reValidEmail = new RegExp(sValidEmail);

            if (!reValidEmail.test(this.get('username'))) {
                alert("Please enter valid address");
                this.set('passed', false);
            }
            this.set('passed', false);
        },
        loginBtn: function() {
            banhji.view.layout.showIn('#content', banhji.view.loginView);
        },
        login: function() {
            this.auth.query({
                filter: [{
                        field: 'username',
                        value: banhji.userManagement.get('username')
                    },
                    {
                        field: 'password',
                        value: banhji.userManagement.get('password')
                    }
                ]
            }).done(function(e) {
                var data = banhji.userManagement.auth.data();
                if (data.length > 0) {
                    var user = banhji.userManagement.auth.data()[0];
                    localforage.setItem('user', user);
                    if (user.institute.length === 0) {
                        banhji.router.navigate('/no-page');
                    } else {
                        banhji.router.navigate('/');
                    }
                } else {
                    console.log('bad');
                }
            });
        },
        registerBtn: function() {
            banhji.view.layout.showIn('#content', banhji.view.signupView);
        },
        logout: function(e) {
            e.preventDefault();
            var userData = {
                Username: userPool.getCurrentUser().username,
                Pool: userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            if (cognitoUser != null) {
                cognitoUser.signOut();
                localforage.removeItem('user').then(function() {
                    // Run this code once the key has been removed.
                    console.log('Key is cleared!');
                }).catch(function(err) {
                    // This code runs if there were any errors
                    console.log(err);
                });
                window.location.replace("<?php echo base_url(); ?>login");
            } else {
                console.log('No user');
            }
        },
        setCurrent: function(current) {
            this.set('current', current);
        },
        changePwd: function() {
            if (this.get('password') !== this.get('_password')) {
                alert("Password does not match");
            } else {
                this.pwdDS.sync();
            }
        },
        getLogin: function() {
            return JSON.parse(localStorage.getItem('userData/user'));
        },
        page: function() {
            if (banhji.userManagement.getLogin()) {
                if (banhji.userManagement.getLogin().perm === 1) {
                    return 'admin';
                }
            } else {
                return 'home';
            }
            // if(this.getLogin()) {
            //  return '\#/page';
            // } else {
            //  return '\#/page/';
            // }

        },
        createComp: function() {
            banhji.router.navigate('/create_company');
        },
        setInstitute: function(newIns) {
            this.set('newInst', newIns);
        },
        addInst: function() {
            this.inst.insert(0, {
                name: "",
                email: "",
                address: "",
                description: "",
                industry: {
                    id: null,
                    name: null
                },
                type: {
                    id: null,
                    name: null
                },
                country: {
                    id: null,
                    code: null,
                    name: null
                },
                province: {
                    id: null,
                    local: null,
                    english: null
                },
                vat_no: null,
                fiscal_date: null,
                tax_regime: null,
                locale: null,
                legal_name: null,
                date_founded: null,
                logo: ""
            });
            this.setInstitute(this.inst.at(0));
        },
        cancelInst: function() {
            this.inst.cancelChanges();
        },
        saveIntitute: function() {
            if (this.get('newInst').industry.id !== null || this.get('newInst').province.id || this.get('newInst').country.id) {
                this.inst.sync();
                this.inst.bind('requestEnd', function(e) {
                    var type = e.type,
                        res = e.response.results;
                    if (e.response.error === false) {
                        if (e.type === 'create') {
                            $('#createComMessage').text("created. Please wait till site admin created database for you.");
                        } else {
                            localforage.removeItem('company', function(err) {
                                //
                            });
                            localforage.setItem('company', res);
                            $('#createComMessage').text("Updated");
                        }
                    } else {
                        $('#createComMessage').text("error creating company.");
                    }
                });
            } else {
                alert('filling all fields');
            }
        },
        signup: function() {
            this.auth.add({
                username: this.get('username'),
                password: this.get('password')
            });
            this.sync();
            this.auth.bind('requestEnd', function(e) {
                if (e.type === 'create' && e.response.error === false) {
                    alert("អ្នកបានចុះឈ្មោះរួច");
                    banhji.router.route('')
                }
            });
        },
        onFileSelect: function(e) {
            console.log(e.files[0]);
        },
        sync: function() {
            this.auth.sync();
            this.auth.bind('requestEnd', function(e) {
                var type = e.type;
                var result = e.response.results;
                if (type === "read" && e.error !== true) {
                    // get login info
                    console.log('true');
                } else if (type === "create") {
                    if (e.response.error === true) {
                        banhji.userManagement.auth.cancelChanges();
                        alert('មានរួចហើយ');
                    } else {
                        var user = banhji.userManagement.auth.data()[0];
                        localforage.setItem('user', user);
                        if (!user.institute) {
                            banhji.router.navigate('/page', false);
                        } else {
                            banhji.router.navigate('/app', false);
                        }
                    }
                }
            });
        }
    });

    function getDB() {
        var entity = null;
        if (banhji.userManagement.getLogin()) {
            if (banhji.userManagement.getLogin().institute) {
                if (banhji.userManagement.getLogin().institute.length > 0) {
                    entity = banhji.userManagement.getLogin().institute.name
                }

            } else {
                entity = false
            }
        }
        return entity;
    }
    banhji.currency = kendo.observable({
        dataSource: dataStore(apiUrl + 'currencies'),
        getCurrencyID: function(locale) {
            var currency_id = 0;

            $.each(this.dataSource.data(), function(index, value) {
                if (value.locale === locale) {
                    currency_id = value.id;
                    return false;
                }
            });

            return currency_id;
        }
    });
    banhji.users = kendo.observable({
        dataStore: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'banhji/users',
                    type: "GET",
                    headers: {
                        "Entity": getDB(),
                        "User": banhji.userManagement.getLogin() === null ? '' : banhji.userManagement.getLogin().id
                    },
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + 'banhji/users',
                    type: "POST",
                    headers: {
                        "Entity": getDB(),
                        "User": banhji.userManagement.getLogin() === null ? '' : banhji.userManagement.getLogin().id
                    },
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + 'banhji/users',
                    type: "PUT",
                    headers: {
                        "Entity": getDB(),
                        "User": banhji.userManagement.getLogin() === null ? '' : banhji.userManagement.getLogin().id
                    },
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + 'banhji/users',
                    type: "DELETE",
                    headers: {
                        "Entity": getDB(),
                        "User": banhji.userManagement.getLogin() === null ? '' : banhji.userManagement.getLogin().id
                    },
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        }),
        roleDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'banhji/roles',
                    type: "GET",
                    headers: {
                        "Entity": getDB(),
                        "User": banhji.userManagement.getLogin() === null ? '' : banhji.userManagement.getLogin().id
                    },
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        }),
        add: function() {
            banhji.view.pageAdmin.showIn('#col2', banhji.view.addUserView);
            this.dataStore.insert(0, {
                username: '',
                password: null,
                permission: {
                    id: null,
                    name: null
                }
            });
            this.setCurrent(this.dataStore.at(0));
        },
        remove: function(e) {
            var user = confirm('Are you sure you want to remove this user?');
            if (user === true) {
                this.dataStore.remove(e.data);
                this.sync();
            }
        },
        editRight: function(e) {
            banhji.view.pageAdmin.showIn('#col2', banhji.view.editRoleView);
            this.setCurrent(e.data);
        },
        cancelAdd: function() {
            banhji.view.pageAdmin.showIn('#col2', banhji.view.userListView);
            this.dataStore.cancelChanges();
        },
        setCurrent: function(current) {
            this.set('current', current);
        },
        sync: function() {
            this.dataStore.sync();
            this.dataStore.bind('requestEnd', function(e) {
                var type = e.type;
                var data = e.response.results;
                if (type !== 'read') {
                    console.log('data recorded');
                }
            });
        }
    });
    banhji.people = kendo.observable({
        dataSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "people",
                    type: "GET",
                    headers: {
                        "Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name : ""
                    },
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + "people",
                    type: "POST",
                    headers: {
                        "Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name : ""
                    },
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + "people",
                    type: "PUT",
                    headers: {
                        "Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institutename : ""
                    },
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + "people",
                    type: "DELETE",
                    headers: {
                        "Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name : ""
                    },
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            offset: options.skip,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count',
                errors: 'error'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 20
        }),
        filterBy: function() {},
        save: function() {}
    });
    // end TEst offline
    var obj = function(url) {
        var o = kendo.observable({
            dataStore: new kendo.data.DataSource({
                transport: {
                    read: {
                        url: url,
                        type: "GET",
                        headers: {
                            "Entity": getDB()
                        },
                        dataType: 'json'
                    },
                    create: {
                        url: url,
                        type: "POST",
                        headers: {
                            "Entity": getDB()
                        },
                        dataType: 'json'
                    },
                    update: {
                        url: url,
                        type: "PUT",
                        headers: {
                            "Entity": getDB()
                        },
                        dataType: 'json'
                    },
                    destroy: {
                        url: url,
                        type: "DELETE",
                        headers: {
                            "Entity": getDB()
                        },
                        dataType: 'json'
                    },
                    parameterMap: function(options, operation) {
                        if (operation === 'read') {
                            return {
                                limit: options.pageSize,
                                offset: options.skip,
                                filter: options.filter
                            };
                        } else {
                            return {
                                models: kendo.stringify(options.models)
                            };
                        }
                    }
                },
                schema: {
                    model: {
                        id: 'id'
                    },
                    data: 'results',
                    total: 'count',
                    errors: 'error'
                },
                batch: true,
                serverFiltering: true,
                serverPaging: true,
                pageSize: 20
            }),
            findById: function(id) {},
            findBy: function(arr) {},
            insert: function(data) {},
            remove: function(model) {
                this.dataStore.remove(model);
                this.save();
            },
            save: function() {
                this.dataStore.sync();
                this.dataStore.bind('requestEnd', function(e) {
                    var type = e.type,
                        res = e.response.results;
                });
            }
        });
        return o;
    }
    banhji.Layout = kendo.observable({
        locale: "km-KH",
        menu: [],
        // isShown : true,
        // isAdmin : auth.isAdmin(),
        // logout   : function(e) {
        //  e.preventDefault();
        //  auth.logout();
        // },
        // isLogin : function(){
        //  if(banhji.userManagement.getLogin()) {
        //    return true;
        //  } else {
        //    return false;
        //  }
        // },
        // init: function() {
        //  // initialize when the whole page load
        // },
        // ui: function() {
        //  // get UI information from source base on locale
        // }
    });
    var role = kendo.observable({
        dataStore: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'roles',
                    dataType: 'json',
                    headers: {
                        "Entity": getDB()
                    },
                    type: 'GET'
                },
                create: {
                    url: apiUrl + 'roles',
                    dataType: 'json',
                    headers: {
                        "Entity": getDB()
                    },
                    type: 'GET'
                },
                update: {
                    url: apiUrl + 'roles',
                    dataType: 'json',
                    headers: {
                        "Entity": getDB()
                    },
                    type: 'GET'
                },
                destroy: {
                    url: apiUrl + 'roles',
                    dataType: 'json',
                    headers: {
                        "Entity": getDB()
                    },
                    type: 'GET'
                },
                parameterMap: function(data, operation) {
                    if (operation === 'read') {
                        return {
                            limit: data.pageSize,
                            offset: data.skip,
                            filter: data.filter
                        };
                    }
                    return {
                        models: kendo.stringify(data.models)
                    };
                }
            },
            schema: {
                model: {
                    id: "id"
                },
                data: "results"
            },
            pageSize: 20,
            serverPaging: true,
            serverFiltering: true,
            batch: true
        }),
        roleUserDs: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'roles/user',
                    dataType: 'json',
                    headers: {
                        "Entity": getDB()
                    },
                    type: 'GET'
                },
                create: {
                    url: apiUrl + 'roles/user',
                    dataType: 'json',
                    headers: {
                        "Entity": getDB()
                    },
                    type: 'POST'
                },
                update: {
                    url: apiUrl + 'roles/user',
                    dataType: 'json',
                    headers: {
                        "Entity": getDB()
                    },
                    type: 'PUT'
                },
                destroy: {
                    url: apiUrl + 'roles/user',
                    dataType: 'json',
                    headers: {
                        "Entity": getDB()
                    },
                    type: 'DELETE'
                },
                parameterMap: function(data, operation) {
                    if (operation === 'read') {
                        return {
                            limit: data.pageSize,
                            offset: data.skip,
                            filter: data.filter
                        };
                    }
                    return {
                        models: kendo.stringify(data.models)
                    };
                }
            },
            schema: {
                model: {
                    id: "id"
                },
                data: "results"
            },
            pageSize: 20,
            serverPaging: true,
            serverFiltering: true,
            batch: true
        }),
        find: function(arg) {},
        setCurrent: function(currentRole) {},
        save: function() {}
    });
    banhji.index = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "dashboards/home"),
        summaryDS: dataStore(apiUrl + "accounting_reports/financial_snapshot"),
        companyLogo: '',
        modules: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'admin/modules',
                    type: "GET",
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + 'admin/modules',
                    type: "POST",
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + 'admin/modules',
                    type: "PUT",
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + 'admin/modules',
                    type: "DELETE",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.pageSize,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            // pageSize: 100
        }),
        companyName: null,
        companyInf: function() {
            var company = JSON.parse(localStorage.getItem('userData/user'));
            return company;
        },
        getLogo: function() {
            banhji.companyDS.fetch(function() {
                if (banhji.companyDS.data().length > 0) {
                    banhji.index.set('companyLogo', banhji.companyDS.data()[0].logo);
                }
            });
        },
        today: new Date(),
        ar: 0,
        ar_open: 0,
        ar_customer: 0,
        ar_overdue: 0,
        ap: 0,
        ap_open: 0,
        ap_vendor: 0,
        ap_overdue: 0,
        income: 0,
        expense: 0,
        net_income: 0,
        asset: 0,
        liability: 0,
        equity: 0,
        pageLoad: function() {
            var self = this;
            banhji.wDashBoard.meterDS.read();
            banhji.wDashBoard.txnDS.read();
        }
    });
    banhji.searchAdvanced = kendo.observable({
        lang: langVM,
        contactDS: dataStore(apiUrl + "contacts"),
        contactTypeDS: dataStore(apiUrl + "contacts/type"),
        transactionDS: dataStore(apiUrl + "transactions"),
        itemDS: dataStore(apiUrl + "items"),
        accountDS: dataStore(apiUrl + "accounts"),
        searchType: "",
        searchText: "",
        found: 0,
        pageLoad: function() {},
        search: function() {
            var self = this,
                searchText = this.get("searchText");
            this.set("found", 0);

            if (searchText) {
                this.contactDS.query({
                    filter: [{
                            field: "number",
                            operator: "like",
                            value: searchText
                        },
                        {
                            field: "surname",
                            operator: "or_like",
                            value: searchText
                        },
                        {
                            field: "name",
                            operator: "or_like",
                            value: searchText
                        },
                        {
                            field: "company",
                            operator: "or_like",
                            value: searchText
                        }
                    ],
                    page: 1,
                    pageSize: 10
                }).then(function() {
                    var found = self.get("found") + self.contactDS.total();
                    self.set("found", found);
                });

                this.transactionDS.query({
                    filter: [{
                        field: "number",
                        operator: "like",
                        value: searchText
                    }],
                    page: 1,
                    pageSize: 10
                }).then(function() {
                    var found = self.get("found") + self.transactionDS.total();
                    self.set("found", found);
                });

                this.itemDS.query({
                    filter: [{
                            field: "number",
                            operator: "like",
                            value: searchText
                        },
                        {
                            field: "name",
                            operator: "or_like",
                            value: searchText
                        }
                    ],
                    page: 1,
                    pageSize: 10
                }).then(function() {
                    var found = self.get("found") + self.itemDS.total();
                    self.set("found", found);
                });

                this.accountDS.query({
                    filter: [{
                            field: "number",
                            operator: "like",
                            value: searchText
                        },
                        {
                            field: "name",
                            operator: "or_like",
                            value: searchText
                        }
                    ],
                    page: 1,
                    pageSize: 10
                }).then(function() {
                    var found = self.get("found") + self.accountDS.total();
                    self.set("found", found);
                });
            }
        },
        selectedContact: function(e) {
            e.preventDefault();

            var data = e.data,
                type = this.contactTypeDS.get(data.contact_type_id);

            if (type.parent_id == 1) {
                banhji.customerCenter.loadContact(data.id);
                banhji.router.navigate('/customer_center', false);
            } else {
                banhji.vendorCenter.loadContact(data.id);
                banhji.router.navigate('/vendor_center', false);
            }
        },
        selectedTransaction: function(e) {
            e.preventDefault();

            var data = e.data;
            banhji.router.navigate('/' + data.type.toLowerCase() + '/' + data.id);
        },
        selectedItem: function(e) {
            e.preventDefault();

            var data = e.data;
            banhji.router.navigate('/item_center/' + e.data.id);
        },
        selectedAccount: function(e) {
            e.preventDefault();

            var data = e.data;
            banhji.router.navigate('/accounting_center/' + e.data.id);
        }
    });
    //DAWINE -----------------------------------------------------------------------------------------
    banhji.source = kendo.observable({
        lang: langVM,
        countryDS: dataStore(apiUrl + "countries"),
        //Contact
        customerList: [],
        supplierList: [],
        employeeList: [],
        contactDS: dataStore(apiUrl + "contacts"),
        customerDS: dataStore(apiUrl + "contacts"),
        
        employeeDS: dataStore(apiUrl + "contacts"),
        //user
        employeeUserDS                  : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "users",
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
            filter:{
                field: 'id', value: JSON.parse(localStorage.getItem('userData/user')).institute.id
            },
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),

        supplierDS                  : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "contacts",
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
                { field:"parent_id", operator:"where_related_contact_type", value:2 },//Supplier
                { field:"status", value:1 }
            ],
            sort:[
                { field:"contact_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
            ],
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        //Contact Type
        contactTypeList: [],
        contactTypeDS: dataStore(apiUrl + "contacts/type"),
        //Job
        jobList: [],
        jobDS: dataStore(apiUrl + "jobs"),
        //Currency
        currencyList: [],
        currencyDS: dataStore(apiUrl + "currencies"),
        currencyRateDS: dataStore(apiUrl + "currencies/rate"),
        //Item
        itemList: [],
        itemDS: dataStore(apiUrl + "items"),
        itemTypeDS: dataStore(apiUrl + "item_types"),
        itemGroupList: [],
        itemGroupDS: dataStore(apiUrl + "items/group"),
        brandDS: dataStore(apiUrl + "brands"),
        categoryList: [],
        categoryDS: dataStore(apiUrl + "categories"),
        itemPriceList: [],
        itemPriceDS: dataStore(apiUrl + "item_prices"),
        measurementList: [],
        measurementDS: dataStore(apiUrl + "measurements"),
        //Tax
        taxList: [],
        taxItemDS: dataStore(apiUrl + "tax_items"),
        //Accounting
        accountList: [],
        accountDS: dataStore(apiUrl + "accounts"),
        accountTypeDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "accounts/type",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            limit: options.pageSize,
                            filter: options.filter,
                            sort: options.sort
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter: {
                field: "id >",
                value: 9
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        //Payment Term, Method, Segment
        paymentTermDS: dataStore(apiUrl + "payment_terms"),
        paymentMethodDS: dataStore(apiUrl + "payment_methods"),
        //Segment
        segmentItemList: [],
        segmentItemDS: dataStore(apiUrl + "segments/item"),
        //Txn Template
        txnTemplateList: [],
        txnTemplateDS: dataStore(apiUrl + "transaction_templates"),
        //Prefixes
        prefixList: [],
        prefixDS: dataStore(apiUrl + "prefixes"),
        frequencyList: [{
                id: 'Daily',
                name: 'Day'
            },
            {
                id: 'Weekly',
                name: 'Week'
            },
            {
                id: 'Monthly',
                name: 'Month'
            },
            {
                id: 'Annually',
                name: 'Annual'
            }
        ],
        monthOptionList: [{
                id: 'Day',
                name: 'Day'
            },
            {
                id: '1st',
                name: '1st'
            },
            {
                id: '2nd',
                name: '2nd'
            },
            {
                id: '3rd',
                name: '3rd'
            },
            {
                id: '4th',
                name: '4th'
            }
        ],
        monthList: [{
                id: 0,
                name: 'January'
            },
            {
                id: 1,
                name: 'February'
            },
            {
                id: 2,
                name: 'March'
            },
            {
                id: 3,
                name: 'April'
            },
            {
                id: 4,
                name: 'May'
            },
            {
                id: 5,
                name: 'June'
            },
            {
                id: 6,
                name: 'July'
            },
            {
                id: 7,
                name: 'August'
            },
            {
                id: 8,
                name: 'September'
            },
            {
                id: 9,
                name: 'October'
            },
            {
                id: 10,
                name: 'November'
            },
            {
                id: 11,
                name: 'December'
            }
        ],
        weekDayList: [{
                id: 0,
                name: 'Sunday'
            },
            {
                id: 1,
                name: 'Monday'
            },
            {
                id: 2,
                name: 'Tuesday'
            },
            {
                id: 3,
                name: 'Wednesday'
            },
            {
                id: 4,
                name: 'Thurday'
            },
            {
                id: 5,
                name: 'Friday'
            },
            {
                id: 6,
                name: 'Saturday'
            }
        ],
        dayList: [{
                id: 1,
                name: '1st'
            },
            {
                id: 2,
                name: '2nd'
            },
            {
                id: 3,
                name: '3rd'
            },
            {
                id: 4,
                name: '4th'
            },
            {
                id: 5,
                name: '5th'
            },
            {
                id: 6,
                name: '6th'
            },
            {
                id: 7,
                name: '7th'
            },
            {
                id: 8,
                name: '8th'
            },
            {
                id: 9,
                name: '9th'
            },
            {
                id: 10,
                name: '10th'
            },
            {
                id: 11,
                name: '11st'
            },
            {
                id: 12,
                name: '12nd'
            },
            {
                id: 13,
                name: '13rd'
            },
            {
                id: 14,
                name: '14th'
            },
            {
                id: 15,
                name: '15th'
            },
            {
                id: 16,
                name: '16th'
            },
            {
                id: 17,
                name: '17th'
            },
            {
                id: 18,
                name: '18th'
            },
            {
                id: 19,
                name: '19th'
            },
            {
                id: 20,
                name: '20th'
            },
            {
                id: 21,
                name: '21st'
            },
            {
                id: 22,
                name: '22nd'
            },
            {
                id: 23,
                name: '23rd'
            },
            {
                id: 24,
                name: '24th'
            },
            {
                id: 25,
                name: '25th'
            },
            {
                id: 26,
                name: '26th'
            },
            {
                id: 27,
                name: '27th'
            },
            {
                id: 28,
                name: '28th'
            },
            {
                id: 0,
                name: 'Last'
            }
        ],
        sortList: [{
                text: "All",
                value: "all"
            },
            {
                text: "Today",
                value: "today"
            },
            {
                text: "This Week",
                value: "week"
            },
            {
                text: "This Month",
                value: "month"
            },
            {
                text: "This Year",
                value: "year"
            }
        ],
        statusList: [{
                "id": 1,
                "name": "Active"
            },
            {
                "id": 0,
                "name": "Inactive"
            },
            {
                "id": 2,
                "name": "Void"
            }
        ],
        customerFormList: [{
                id: "Quote",
                name: "Quotation"
            },
            {
                id: "Sale_Order",
                name: "Sale Order"
            },
            {
                id: "Deposit",
                name: "Deposit"
            },
            {
                id: "Cash_Sale",
                name: "Cash Sale"
            },
            {
                id: "Invoice",
                name: "Invoice"
            },
            {
                id: "Cash_Receipt",
                name: "Cash Receipt"
            },
            //{ id: "Sale_Return", name: "Sale Return" },
            {
                id: "GDN",
                name: "Delivered Note"
            }
        ],
        vendorFormList: [{
                id: "Purchase_Order",
                name: "Purchase Order"
            },
            {
                id: "GRN",
                name: "GRN"
            },
            // { id: "Deposit", name: "Deposit" },
            // { id: "Purchase", name: "Purchase" },
            // { id: "Pur_Return", name: "Pur.Return" },
            {
                id: "Cash_Payment",
                name: "Cash Payment"
            }
        ],
        cashFormList: [{
                id: "Cash_Transfer",
                name: "Cash Transaction"
            },
            {
                id: "Cash_Receipt",
                name: "Cash Receipt"
            },
            {
                id: "Cash_Payment",
                name: "Cash Payment"
            },
            {
                id: "Cash_Advance",
                name: "Cash Advance"
            },
            {
                id: "Reimbursement",
                name: "Reimbursement"
            },
            {
                id: "Advance_Settlement",
                name: "Advance Settlement"
            }
        ],
        cashMGTFormList: [{
                id: "Cash_Transfer",
                name: "Transfer"
            },
            {
                id: "Deposit",
                name: "Deposit"
            },
            {
                id: "Withdraw",
                name: "Withdraw"
            },
            {
                id: "Cash_Advance",
                name: "Advance"
            },
            {
                id: "Cash_Payment",
                name: "Payment"
            },
            {
                id: "Reimbursement",
                name: "Reimbursement"
            },
            {
                id: "Journal",
                name: "Journal"
            }
        ],
        genderList: ["M", "F"],
        typeList: ['Invoice', 'Commercial_Invoice', 'Vat_Invoice', 'Electricity_Invoice', 'Utility_Invoice', 'Cash_Sale', 'Commercial_Cash_Sale', 'Vat_Cash_Sale', 'Receipt_Allocation', 'Sale_Order', 'Quote', 'GDN', 'Sale_Return', 'Purchase_Order', 'GRN', 'Cash_Purchase', 'Credit_Purchase', 'Purchase_Return', 'Payment_Allocation', 'Deposit', 'Electricty_Deposit', 'Utility_Deposit', 'Customer_Deposit', 'Vendor_Deposit', 'Withdraw', 'Transfer', 'Journal', 'Item_Adjustment', 'Cash_Advance', 'Reimbursement', 'Direct_Expense', 'Advance_Settlement', 'Additional_Cost', 'Cash_Payment', 'Cash_Receipt', 'Credit_Note', 'Debit_Note', 'Offset_Bill', 'Offset_Invoice', 'Cash_Transfer', 'Internal_Usage'],
        user_id: banhji.userData.id,
        amtDueColor: "#D5DBDB",
        acceptedSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/accepted.ico",
        approvedSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/approved.ico",
        cancelSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/cancel.ico",
        openSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/open.ico",
        paidSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/paid.ico",
        partialyPaidSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/partialy_paid.ico",
        usedSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/used.ico",
        receivedSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/received.ico",
        deliveredSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/delivered.ico",
        successMessage: "Saved Successful!",
        errorMessage: "Warning, please review it again!",
        confirmMessage: "Are you sure, you want to delete it?",
        requiredMessage: "Required",
        duplicateNumber: "Duplicate Number!",
        duplicateInvoice: "Duplicate Invoice!",
        selectCustomerMessage: "Please select a customer.",
        selectSupplierMessage: "Please select a supplier.",
        selectItemMessage: "Please select an item.",
        duplicateSelectedItemMessage: "You already selected this item.",
        meterDS: dataStore(apiUrl + "meters"),
        meterlist: [],
        defaultLines : 2,
        pageLoad: function() {
            this.loadAccounts();
            // this.accountTypeDS.read();
            this.loadTaxes();
            // this.loadJobs();
            this.loadSegmentItems();
            this.loadCurrencies();
            this.loadRates();
            this.loadPrefixes();
            this.loadTxnTemplates();

            this.loadCategories();
            this.loadItemGroups();
            this.loadItems();
            this.itemTypeDS.read();
            this.loadItemPrices();
            this.loadMeasurements();

            this.loadContactTypes();
            // this.loadCustomers();
            // this.loadSuppliers();
            // this.loadEmployees();
            // this.loadMeters();
        },
        getFiscalDate: function() {
            var today = new Date(),
                fDate = new Date(today.getFullYear() + "-" + banhji.institute.fiscal_date);

            if (today < fDate) {
                fDate.setFullYear(today.getFullYear() - 1);
            }

            return fDate;
        },
        loadMeters: function() {
            var self = this,
                raw = this.get("meterlist");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.meterDS.query({
                filter: {
                    field: "type",
                    value: "e"
                },
            }).then(function() {
                var view = self.meterDS.view();

                $.each(view, function(index, value) {
                    raw.push({
                        id: view[index].id,
                        number: view[index].meter_number
                    });
                });
            });
        },
        loadPrefixes: function() {
            var self = this,
                raw = this.get("prefixList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.prefixDS.query({
                filter: [],
            }).then(function() {
                var view = self.prefixDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadTxnTemplates: function() {
            var self = this,
                raw = this.get("txnTemplateList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.txnTemplateDS.query({
                filter: []
            }).then(function() {
                var view = self.txnTemplateDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadCurrencies: function() {
            var self = this,
                raw = this.get("currencyList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.currencyDS.query({
                filter: []
            }).then(function() {
                var view = self.currencyDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadRates: function() {
            this.currencyRateDS.query({
                filter: [],
                sort: {
                    field: "date",
                    dir: "desc"
                }
            });
        },
        getRate: function(locale, date) {
            var rate = 0,
                lastRate = 1;
            $.each(this.currencyRateDS.data(), function(index, value) {
                if (value.locale == locale) {
                    lastRate = kendo.parseFloat(value.rate);

                    if (date >= new Date(value.date)) {
                        rate = kendo.parseFloat(value.rate);

                        return false;
                    }
                }
            });

            //If no rate, use the last rate
            if (rate == 0) {
                rate = lastRate;
            }

            return rate;
        },
        loadTaxes: function() {
            var self = this,
                raw = this.get("taxList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.taxItemDS.query({
                filter: []
            }).then(function() {
                var view = self.taxItemDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadJobs: function() {
            var self = this,
                raw = this.get("jobList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.jobDS.query({
                filter: []
            }).then(function() {
                var view = self.jobDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadSegmentItems: function() {
            var self = this,
                raw = this.get("segmentItemList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.segmentItemDS.query({
                filter: {
                    field: "segment_id >",
                    value: 0
                }
            }).then(function() {
                var view = self.segmentItemDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadAccounts: function() {
            var self = this,
                raw = this.get("accountList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.accountDS.query({
                filter: []
            }).then(function() {
                var view = self.accountDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadCategories: function() {
            var self = this,
                raw = this.get("categoryList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.categoryDS.query({
                filter: []
            }).then(function() {
                var view = self.categoryDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadItemGroups: function() {
            var self = this,
                raw = this.get("itemGroupList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.itemGroupDS.query({
                filter: []
            }).then(function() {
                var view = self.itemGroupDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadItems: function() {
            var self = this,
                raw = this.get("itemList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.itemDS.query({
                filter: {
                    field: "status",
                    value: 1
                }
            }).then(function() {
                var view = self.itemDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadItemPrices: function() {
            var self = this,
                raw = this.get("itemPriceList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.itemPriceDS.query({
                filter: [{
                        field: "assembly_id",
                        value: 0
                    },
                    {
                        field: "status",
                        operator: "where_related_item",
                        value: 1
                    }
                ]
            }).then(function() {
                var view = self.itemPriceDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadMeasurements: function() {
            var self = this,
                raw = this.get("measurementList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.measurementDS.query({
                filter: [],
            }).then(function() {
                var view = self.measurementDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadContactTypes: function() {
            var self = this,
                raw = this.get("contactTypeList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.contactTypeDS.query({
                filter: []
            }).then(function() {
                var view = self.contactTypeDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadCustomers: function() {
            var self = this,
                raw = this.get("customerList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.customerDS.query({
                filter: [{
                    field: "parent_id",
                    operator: "where_related_contact_type",
                    value: 1
                }],
                page: 1,
                sort: {
                    field: "id",
                    dir: "desc"
                }
            }).then(function() {
                var view = self.customerDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });

        },
        loadSuppliers: function() {
            var self = this,
                raw = this.get("supplierList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.supplierDS.query({
                filter: [{
                    field: "parent_id",
                    operator: "where_related_contact_type",
                    value: 2
                }]
            }).then(function() {
                var view = self.supplierDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        loadEmployees: function() {
            var self = this,
                raw = this.get("employeeList");

            //Clear array
            if (raw.length > 0) {
                raw.splice(0, raw.length);
            }

            this.employeeDS.query({
                filter: [{
                        field: "parent_id",
                        operator: "where_related_contact_type",
                        value: 3
                    },
                    {
                        field: "status",
                        value: 1
                    }
                ]
            }).then(function() {
                var view = self.employeeDS.view();

                $.each(view, function(index, value) {
                    raw.push(value);
                });
            });
        },
        getPaymentTerm: function(id) {
            var data = this.paymentTermDS.get(id);
            return data.name;
        },
        getPrefixAbbr: function(type) {
            var abbr = "";
            $.each(this.prefixList, function(index, value) {
                if (value.type == type) {
                    abbr = value.abbr;

                    return false;
                }
            });

            return abbr;
        },
        //Water
        tradeDiscountDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "accounts",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            limit: options.pageSize,
                            filter: options.filter,
                            sort: options.sort
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter: [{
                    field: "id",
                    value: 72
                },
                {
                    field: "status",
                    value: 1
                }
            ],
            sort: {
                field: "number",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        depositAccountDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "accounts",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            limit: options.pageSize,
                            filter: options.filter,
                            sort: options.sort
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter: [{
                    field: "account_type_id",
                    operator: "where_in",
                    value: [25, 30]
                },
                {
                    field: "status",
                    value: 1
                }
            ],
            sort: {
                field: "number",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        incomeAccountDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "accounts",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            limit: options.pageSize,
                            filter: options.filter,
                            sort: options.sort
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter: [{
                    field: "account_type_id",
                    operator: "where_in",
                    value: [35, 39]
                },
                {
                    field: "status",
                    value: 1
                }
            ],
            sort: {
                field: "number",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        })
    });
    banhji.invoice = kendo.observable({
        makes: new kendo.data.DataSource({
            transport: {
                read: {
                    url: baseUrl + 'api/winvoices/make',
                    type: "GET",
                    dataType: 'json',
                    headers: {
                        Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id
                    }
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.take,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        }),
        dataSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: baseUrl + 'api/winvoices',
                    type: "GET",
                    dataType: 'json',
                    headers: {
                        Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id
                    }
                },
                create: {
                    url: baseUrl + 'api/winvoices',
                    type: "POST",
                    dataType: 'json',
                    headers: {
                        Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id
                    }
                },
                update: {
                    url: baseUrl + 'api/winvoices',
                    type: "PUT",
                    dataType: 'json',
                    headers: {
                        Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id
                    }
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.take,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            sort: {
                field: "worder",
                operator: "where_related_meter",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        }),
        remove: function(e) {
            this.dataSource.remove(e.data);
        },
        queryReading: function() {
            var dfd = $.Deferred();
            return this.makes.query({
                filter: {
                    field: '',
                    value: ''
                }
            });
        },
        save: function() {
            var that = this,
                dfd = $.Deferred();
            this.dataSource.sync();
            this.dataSource.bind('requestEnd', function(e) {
                if (e.type != 'read' && e.response.results) {
                    dfd.resolve(e.response.results);
                } else {
                    dfd.reject(e.response);
                }
            });
            this.dataSource.bind('error', function(e) {
                dfd.reject(e.status);
            });
            return dfd.promise();
        }
    });
    banhji.installment = kendo.observable({
        dataSource: dataStore(apiUrl + "installments"),
        startDate: new Date(),
        period: 12,
        percentage: 0,
        setDate: function(date) {
            this.set('startDate', date);
        },
        setPeriod: function(period) {
            this.set('period', period);
        },
        makeSchedule: function(amount, meterId, startDate, period, percentage) {
            var dfd = $.Deferred();
            try {
                if (amount == undefined) throw "TypeError: Amount is not defined";

                banhji.installment.dataSource.insert(0, {
                    biller_id: banhji.userData.id,
                    meter_id: meterId,
                    percentage: percentage,
                    start_month: kendo.toString(startDate, 'yyyy-MM-dd'),
                    amount: amount,
                    payment_number: null,
                    period: period,
                    invoiced: 0
                });
                dfd.resolve(banhji.installment.dataSource.at(0));
                return dfd.promise();
            } catch (err) {
                dfd.reject(err);
            }

        },
        save: function() {
            var dfd = $.Deferred();
            banhji.installment.dataSource.sync();
            banhji.installment.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    dfd.resolve(e.response.results);
                } else {
                    dfd.reject(false);
                }
            });
            banhji.installment.dataSource.bind('error', function(e) {
                dfd.reject(e);
            });
            return dfd.promise();
        }
    });
    //Setting
    function deviceStatus(container, options) {
        $('<input />')
        .attr('data-bind', 'value:status')
        .appendTo(container)
        .kendoDropDownList({
            dataTextField: "name",
            dataValueField: "id",
            dataSource: [
                {id: 1, name: "Active"},
                {id: 2, name: "Inactive"}
            ]
        });
    }
    function deviceFormatter(gridRow){
        if(gridRow.status){
            return gridRow.status.name;
        }else{
            return 'Active';
        }
    }
    banhji.setting = kendo.observable({
        lang: langVM,
        contactTypeName: "",
        contactTypeAbbr: "",
        contactTypeCompany: 0,
        blockCompanyId: 0,
        tabGo: 0,
        depositAccDS: banhji.source.depositAccountDS,
        exAccountDS: banhji.source.tradeDiscountDS,
        tariffAccDS: banhji.source.incomeAccountDS,
        blocDS: dataStore(apiUrl + "locations"),
        brandDS: banhji.source.brandDS,
        planItemDS: dataStore(apiUrl + "plans/items"),
        tariffItemDS: dataStore(apiUrl + "plans/tariff"),
        txnTemplateDS: dataStore(apiUrl + "transaction_templates"),
        objBloc: null,
        currencyDS: new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: {
                field: "status",
                value: 1
            }
        }),
        taxDs: [
            {
                id: "noTax",
                name: "NoTax"
            },
            {
                id: "Tax",
                name: "Tax"
            }
        ],
        licenseDS: dataStore(apiUrl + "branches"),
        branchDS: dataStore(apiUrl + "branches"),
        planDS: dataStore(apiUrl + "plans"),
        contactTypeDS: dataStore(apiUrl + "contacts/type"),
        patternDS: dataStore(apiUrl + "contacts"),
        wordUsage: null,
        typeUnit: [{
                id: "usage",
                name: this.wordUsage
            },
            {
                id: "money",
                name: "money"
            },
            {
                id: "%",
                name: "%"
            }
        ],
        tariffItemFlat: 0,
        tariffSelect: false,
        tariffNameShow: null,
        exCurrency: null,
        planSelect: false,
        priceUnit: true,
        percentUnit: false,
        meterUnit: false,
        windowTariffItemVisible: false,
        planNameShow: null,
        sFalse: false,
        prefixDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "prefixes",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + "prefixes",
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + "prefixes",
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + "prefixes",
                    type: "DELETE",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            limit: options.pageSize,
                            filter: options.filter,
                            sort: options.sort
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter: {
                field: "type",
                operator: "where",
                value: "Utility_Invoice"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        serviceAssDS : dataStore(apiUrl + "items"),
        onLicenseChange: function(e) {
            var index = e.sender.selectedIndex;
            var block = this.licenseDS.at(index - 1);
            this.set('blockCompanyId', {
                id: block.id,
                name: block.name
            });
        },
        addContactType: function() {
            var self = this,
                name = this.get("contactTypeName");

            if (name !== "") {
                this.contactTypeDS.add({
                    parent_id: 1,
                    name: name,
                    abbr: this.get("contactTypeAbbr"),
                    description: "",
                    is_company: this.get("contactTypeCompany"),
                    is_system: 0
                });

                this.contactTypeDS.sync();
                this.contactTypeDS.bind("requestEnd", function(e) {
                    if (e.type === "create") {
                        var response = e.response.results[0];
                        self.addPattern(response.id);
                        banhji.source.loadContactTypes();
                    }
                });

                this.set("contactTypeName", "");
                this.set("contactTypeAbbr", "");
                this.set("contactTypeCompany", 0);
            }
        },
        addPattern: function(id) {
            var self = this;
            this.patternDS.insert(0, {
                "contact_type_id": id,
                "number": "",
                "locale": banhji.locale,
                "is_pattern": 1,
                "status": 1
            });
            this.patternDS.sync();
            this.patternDS.bind("requestEnd", function(e) {
                if (e.type != 'read' && e.response) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.success_message);
                    self.set("contactTypeName", "");
                    self.set("contactTypeAbbr", "");
                    self.set("contactTypeCompany", 0);
                }
            });
            this.patternDS.bind("error", function(e) {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(self.lang.lang.error_message);
            });
        },
        addBloc: function(e) {
            var branch = this.get("blockCompanyId"),
                self = this;
            if (branch && this.get("blocName") && this.get("blocAbbr")) {
                this.blocDS.add({
                    branch: {
                        id: branch.id,
                        name: branch.name
                    },
                    name: this.get("blocName"),
                    abbr: this.get("blocAbbr"),
                    main_bloc: 0,
                    type: "w"
                });
                this.blocDS.sync();
                this.blocDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("blocName", "");
                        self.set("blocAbbr", "");
                        self.set("blockCompanyId", 0);
                    }
                });
                this.blocDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        poleDS: dataStore(apiUrl + "locations"),
        blocSelect: false,
        blocNameShow: null,
        poleVisible: false,
        viewPole: function(e) {
            var data = e.data;
            this.set("blocSelect", true);
            this.set("blocNameShow", data.name);
            this.poleDS.filter([{
                    field: "main_bloc",
                    value: data.id
                },
                {
                    field: "main_pole",
                    value: 0
                }
            ]);
        },
        showPole: function(e) {
            this.set("poleVisible", true);
            this.setCurrent(e.data);
        },
        closePoleWin: function(e) {
            this.set("poleVisible", false);
        },
        savePole: function(e) {
            var self = this;
            if (this.get("poleName")) {
                var data = e.data;
                this.poleDS.data([]);
                this.poleDS.add({
                    branch: {
                        id: this.get("current").branch.id,
                        name: this.get("current").branch.name
                    },
                    name: this.get("poleName"),
                    abbr: this.get("current").abbr,
                    main_bloc: this.get("current").id,
                    type: "e"
                });
                this.poleDS.sync();
                this.poleDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("poleName", "");
                        self.closePoleWin();
                    }
                });
                this.poleDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        boxDS: dataStore(apiUrl + "locations"),
        poleNameShow: null,
        boxVisible: false,
        poleSelect: false,
        viewBox: function(e) {
            var data = e.data;
            this.set("poleSelect", true);
            this.set("poleNameShow", data.name);
            this.boxDS.filter({
                field: "main_pole",
                value: data.id
            });
        },
        pole: null,
        showBox: function(e) {
            this.set("boxVisible", true);
            this.set("pole", e.data);
        },
        closeBoxWin: function(e) {
            this.set("boxVisible", false);
        },
        saveBox: function(e) {
            var self = this;
            if (this.get("boxName")) {
                var data = e.data;
                this.boxDS.data([]);
                this.boxDS.add({
                    branch: {
                        id: this.get("pole").branch.id,
                        name: this.get("pole").branch.name
                    },
                    name: this.get("boxName"),
                    abbr: this.get("pole").abbr,
                    main_bloc: this.get("pole").main_bloc,
                    main_pole: this.get("pole").id,
                    type: "e"
                });
                this.boxDS.sync();
                this.boxDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("boxName", "");
                        self.closeBoxWin();
                    }
                });
                this.boxDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        goExemption: function() {
            this.planItemDS.data([]);
            this.planItemDS.filter({
                field: "type",
                value: "exemption"
            });
        },
        exSaveDS: dataStore(apiUrl + "plans/items"),
        addEx: function(e) {
            var self = this;
            if (this.get("exName") && this.get("exAccount") && this.get("exUnit") && this.get("exCurrency") && this.get("exPrice")) {
                this.exSaveDS.data([]);
                this.exSaveDS.add({
                    name: this.get("exName"),
                    type: "exemption",
                    is_flat: false,
                    usage: 0,
                    account_id: this.get("exAccount"),
                    unit: this.get("exUnit"),
                    currency: this.get("exCurrency"),
                    amount: this.get("exPrice"),
                    _currency: []
                });
                this.exSaveDS.sync();
                this.exSaveDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("exName", "");
                        self.set("exAccount", "");
                        self.set("exPrice", "");
                        self.set("exUnit", "");
                        self.set("exCurrency", "");
                        self.goExemption();
                    }
                });
                this.exSaveDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        unitChange: function(e) {
            this.set("exPrice", "");
            if (this.exUnit === "%") {
                this.set("percentUnit", true);
                this.set("priceUnit", false);
                this.set("meterUnit", false);
            } else if (this.exUnit === "usage") {
                this.set("percentUnit", false);
                this.set("priceUnit", false);
                this.set("meterUnit", true);
            } else {
                this.set("percentUnit", false);
                this.set("priceUnit", true);
                this.set("meterUnit", false);
            }
        },
        goTariff: function() {
            this.set("tariffSelect", false)
            this.planItemDS.data([]);
            this.tariffItemDS.data([]);
            this.planItemDS.filter({
                field: "type",
                value: "tariff"
            });
        },
        showTariffItem: function(e) {
            var data = e.data;
            this.set("windowTariffItemVisible", true);
            this.setCurrent(e.data);
        },
        setCurrent: function(current) {
            this.set('current', current);
        },
        saveTariffItem: function(e) {
            var data = e.data.id,
                self = this;
            if (this.get("tariffItemName") && this.get("tariffItemUsage") && this.get("tariffItemAmount")) {
                this.tariffItemDS.data([]);
                this.tariffItemDS.add({
                    name: this.get("tariffItemName"),
                    type: "tariff",
                    tariff_id: this.get('current').id,
                    account: this.get('current').account,
                    is_flat: 0,
                    unit: null,
                    usage: this.get("tariffItemUsage"),
                    amount: this.get("tariffItemAmount"),
                    currency: this.get("current").currency,
                    _currency: []
                });
                this.tariffItemDS.sync();
                this.tariffItemDS.bind("requestEnd", function(e) {
                    console.log(e.type);
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("tariffItemName", "");
                        self.set("tariffItemFlat", 0);
                        self.set("tariffItemUsage", "");
                        self.set("tariffItemAmount", "");
                        self.set("windowTariffItemVisible", false);
                        self.closeTariffWindowItem();
                        self.closeTariffWindowItem();
                        self.tariffItemDS.filter({
                            field: "tariff_id",
                            value: self.get('current').id
                        });
                    }
                });
                this.tariffItemDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        updateTariffItem: function(e) {
            this.tariffItemDS.sync();
            this.tariffItemDS.bind("requestEnd", function(e) {
                if (e.type != 'read' && e.response) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.success_message);
                    self.tariffItemDS.filter({
                        field: "tariff_id",
                        value: self.get('current').id
                    });
                }
            });
            this.tariffItemDS.bind("error", function(e) {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.error_message);
            });
        },
        tariffFlatType: [{
                id: 0,
                name: "Not Flat"
            },
            {
                id: 1,
                name: "Flat"
            }
        ],
        tariffSaveDS: dataStore(apiUrl + "plans/items"),
        addTariff: function(e) {
            var self = this;
            if (this.get("tariffName") && this.get("tariffAccount") && this.get("tariffCurrency")) {
                this.tariffSaveDS.data([]);
                this.tariffSaveDS.add({
                    name: this.get("tariffName"),
                    type: "tariff",
                    is_flat: this.get("tariffFlat"),
                    tariff_id: 0,
                    unit: 0,
                    currency: this.get("tariffCurrency"),
                    account_id: this.get("tariffAccount"),
                    usage: 0,
                    amount: 0,
                    _currency: []
                });
                this.tariffSaveDS.sync();
                this.tariffSaveDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("tariffName", "");
                        self.set("tariffAccount", "");
                        self.set("tariffCurrency", "");
                        self.set("tariffFlat", "");
                        self.tariffItemDS.data([]);
                        self.tariffItemDS.add({
                            name: "តម្លៃទូទៅ",
                            type: "tariff",
                            tariff_id: e.response.results[0].id,
                            account: 0,
                            is_flat: 0,
                            unit: null,
                            usage: 0,
                            amount: 0,
                            currency: e.response.results[0]._currency.id,
                            _currency: []
                        });
                        self.tariffItemDS.sync();
                        self.goTariff();
                    }
                });
                this.tariffSaveDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        closeTariffWindowItem: function() {
            this.set("windowTariffItemVisible", false);
        },
        viewTariffItem: function(e) {
            var data = e.data.id;
            this.set("tariffNameShow", e.data.name);
            this.set("tariffSelect", true);
            this.tariffItemDS.data([]);
            this.tariffItemDS.filter({
                field: "tariff_id",
                value: data
            });
        },
        goDeposit: function() {
            this.planItemDS.data([]);
            this.planItemDS.filter({
                field: "type",
                value: "deposit"
            });
        },
        depositSaveDS: dataStore(apiUrl + "plans/items"),
        addDeposit: function() {
            var self = this;
            if (this.get("depositName") && this.get("depositAccount") && this.get("depositCurrency") && this.get("depositPrice")) {
                this.depositSaveDS.data([]);
                this.depositSaveDS.add({
                    name: this.get("depositName"),
                    type: "deposit",
                    is_flat: false,
                    unit: null,
                    account_id: this.get("depositAccount"),
                    usage: 0,
                    currency: this.get("depositCurrency"),
                    amount: this.get("depositPrice"),
                    _currency: []
                });
                this.depositSaveDS.sync();
                this.depositSaveDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("depositName", "");
                        self.set("depositPrice", "");
                        self.set("depositCurrency", "");
                        self.set("depositAccount", "");
                        self.goDeposit();
                    }
                });
                this.depositSaveDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        serviceItemDS: dataStore(apiUrl + "plans/items"),
        goService: function() {
            this.serviceAssDS.filter({
                field: "is_assembly", value: 1
            })
            this.serviceItemDS.data([]);
            this.serviceItemDS.filter({
                field: "type",
                value: "service"
            });
        },
        scurrencyDS: dataStore(apiUrl + "currencies"),
        serviceAccount: "",
        assName: "",
        serviceSaveDS: dataStore(apiUrl + "plans/items"),
        serviceAssChange: function(e){
            var INX = e.sender.selectedIndex;
            var self = this;
            this.set("serviceAccount", this.serviceAssDS.data()[INX -1].income_account_id);
            this.set("servicePrice", kendo.toString(this.serviceAssDS.data()[INX -1].price, this.serviceAssDS.data()[INX -1].locale=="km-KH"?"c0":"c2", this.serviceAssDS.data()[INX -1].locale));
            this.scurrencyDS.query({
                filter: {field: "locale", value: this.serviceAssDS.data()[INX -1].locale},
                pageSize: 1
            }).then(function(e){
                self.set("serviceCurrency", self.scurrencyDS.data()[0].id);
            });
            //To API
            this.set("sAccount", this.serviceAssDS.data()[INX -1].income_account_id);
            this.set("sPrice", this.serviceAssDS.data()[INX -1].price);
            this.set("assName", this.serviceAssDS.data()[INX -1].name);
        },
        addService: function() {
            var self = this;
            if (this.get("serviceName") && this.get("serviceAss") && this.get("serviceCurrency") && this.get("servicePrice")) {
                this.serviceSaveDS.data([]);
                this.serviceSaveDS.add({
                    name: this.get("serviceName"),
                    type: "service",
                    is_flat: false,
                    unit: null,
                    account: this.get("serviceAccount"),
                    assembly_id: this.get("serviceAss"),
                    assembly: {name: this.get("assName")},
                    usage: 0,
                    currency: this.get("serviceCurrency"),
                    amount: this.get("sPrice"),
                    _currency: []
                });
                this.serviceSaveDS.sync();
                this.serviceSaveDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("serviceName", "");
                        self.set("servicePrice", "");
                        self.set("serviceCurrency", "");
                        self.set("serviceAss", "");
                        self.set("serviceAccount", "");
                        self.goService();
                    }
                });
                this.serviceSaveDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(self.lang.lang.field_required_message);
            }
        },
        goMaintenance: function() {
            this.planItemDS.data([]);
            this.planItemDS.filter({
                field: "type",
                value: "maintenance"
            });
        },
        mainSaveDS: dataStore(apiUrl + "plans/items"),
        addMaintenance: function() {
            var self = this;
            if (this.get("maintenanceName") && this.get("maintenanceAccount") && this.get("maintenanceCurrency") && this.get("maintenancePrice")) {
                this.mainSaveDS.data([]);
                this.mainSaveDS.add({
                    name: this.get("maintenanceName"),
                    type: "maintenance",
                    is_flat: false,
                    unit: null,
                    account_id: this.get("maintenanceAccount"),
                    usage: 0,
                    currency: this.get("maintenanceCurrency"),
                    amount: this.get("maintenancePrice"),
                    _currency: []
                });
                this.mainSaveDS.sync();
                this.mainSaveDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("maintenanceName", "");
                        self.set("maintenancePrice", "");
                        self.set("maintenanceAccount", "");
                        self.set("maintenanceCurrency", "");
                        self.goMaintenance();
                    }
                });
                this.mainSaveDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        goFine: function() {
            this.planItemDS.data([]);
            this.planItemDS.filter({
                field: "type",
                value: "fine"
            });
        },
        fineSaveDS: dataStore(apiUrl + "plans/items"),
        addFine: function() {
            var self = this;
            if (this.get("fineName") && this.get("fineAccount") && this.get("fineCurrency") && this.get("finePrice") && this.get("fineDay")) {
                this.fineSaveDS.data([]);
                this.fineSaveDS.add({
                    name: this.get("fineName"),
                    type: "fine",
                    is_flat: 0,
                    unit: null,
                    account_id: this.get("fineAccount"),
                    usage: this.get("fineDay"),
                    currency: this.get("fineCurrency"),
                    amount: this.get("finePrice"),
                    _currency: []
                });
                this.fineSaveDS.sync();
                this.fineSaveDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("fineName", "");
                        self.set("finePrice", "");
                        self.set("fineAccount", "");
                        self.set("fineCurrency", "");
                        self.set("fineDay", "");
                    }
                });
                this.fineSaveDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        goPlan: function() {
            this.planDS.read();
            this.planItemDS.data([]);
            this.set("planSelect", false);
        },
        viewPlanItem: function(e) {
            var data = e.data,
                self = this;
            var idList = [];
            this.set("planNameShow", e.data.name);
            $.each(data.items, function(index, value) {
                idList.push(value.item);
            });
            this.set("planSelect", true);
            this.planItemDS.data([]);
            this.planItemDS.query({
                    filter: {
                        field: "id",
                        operator: "where_in",
                        value: idList
                    }
                })
                .then(function(e) {
                    var view = self.planItemDS.view();
                });
        },
        goBrand: function() {
            this.brandDS.data([]);
            this.brandDS.filter({
                field: "sub_of",
                value: "water"
            });
        },
        addBrand: function() {
            var self = this;
            if (this.get("brandCode") && this.get("brandName") && this.get("brandAbbr")) {
                this.brandDS.add({
                    sub_of: "water",
                    code: this.get("brandCode"),
                    name: this.get("brandName"),
                    abbr: this.get("brandAbbr")
                });
                this.brandDS.sync();
                this.brandDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("brandCode", "");
                        self.set("brandName", "");
                        self.set("brandAbbr", "");
                    }
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        pageLoad: function() {
            this.set("havePassword", false);
            this.txnTemplateDS.filter({
                field: "moduls",
                value: "water_mg"
            });
            $(".widget-head li").eq(this.tabGo).children("a").click();
            var boxwindow = $("#addBox").kendoWindow({
                title: this.lang.lang.add_box
            });
            var polewindow = $("#addPole").kendoWindow({
                title: this.lang.lang.add_sub_location
            });
            var itemwindow = $("#addTariffItem").kendoWindow({
                title: this.lang.lang.add_tariff
            });
            this.blocDS.filter({
                field: "main_bloc",
                value: 0
            });
            var self = this;
            $.each(this.typeUnit, function(i, v) {
                if (i == 0) {
                    self.typeUnit[i].set("name", self.lang.lang.usage);
                } else if (i == 1) {
                    self.typeUnit[i].set("name", self.lang.lang.money);
                }
            });
            this.setWords();
            this.contactTypeDS.filter({
                field: "parent_id",
                value: 1
            });
        },
        setWords: function() {
            this.tariffFlatType[0].set("name", this.lang.lang.not_flat);
            this.tariffFlatType[1].set("name", this.lang.lang.flat);
        },
        cancel: function() {
            this.licenseDS.cancelChanges();
            banhji.router.navigate("/");
        },
        deleteForm: function(e) {
            var data = e.data;
            if (confirm("Do you want to delete it?") == true) {
                this.txnTemplateDS.remove(data);
                this.txnTemplateDS.sync();
            }
        },
        tabletDS        : dataStore(apiUrl + "utibills/tablet"),
        readerDS        : dataStore(apiUrl + "utibills/reader"),
        readingDeviceDS : dataStore(apiUrl + "utibills/device"),
        havePassword    : false,
        addPassword     : function(){
            if(this.get("settingPassword") == 'utibill168'){
                this.set("havePassword", true);
                this.set("settingPassword", "");
            }else{
                // alert("Wrong Password");
                this.set("settingPassword", "");
                this.set("havePassword", true);
            }
        },
    });
    banhji.addLicense = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "branches"),
        provinceDS: dataStore(apiUrl + "provinces"),
        districtDS: dataStore(apiUrl + "districts"),
        toDay: new Date(),
        obj: null,
        provinceSelect: [],
        attachmentDS: dataStore(apiUrl + "attachments"),
        isEdit: false,
        selectType: [{
            id: "1",
            name: "Active"
        }, {
            id: "0",
            name: "Inactive"
        }, {
            id: "2",
            name: "Void"
        }],
        selectCurrency: [{
            id: "3",
            name: "KHR"
        }, {
            id: "1",
            name: "USD"
        }, {
            id: "10",
            name: "THB"
        }, {
            id: "11",
            name: "VND"
        }],
        selectMeterType: [{
                id: "w",
                name: "Meter"
            },
            {
                id: "e",
                name: "Electircity"
            }
        ],
        segmentItemDS              : dataStore(apiUrl + "segments/item"),
        pageLoad: function(id) {
            if (id) {
                this.loadObj(id);
            } else {
                this.addNew();
            }
            //Province
            var self = this;
            this.provinceDS.read()
                .then(function(e) {
                    var Lenght = self.provinceDS.data().length;
                    var view = self.provinceDS.view();
                    for (var i = 0; i < self.provinceDS.data().length; i++) {
                        self.provinceSelect.push({
                            'id': view[i].id,
                            'name': view[i].name_local
                        });
                    }
                });
            this.setWords();
            this.segmentItemDS.filter({field: "segment_id", value: 1});
        },
        setWords: function() {
            this.selectType[0].set("name", this.lang.lang.active);
            this.selectType[1].set("name", this.lang.lang.inactive);
            this.selectType[2].set("name", this.lang.lang.void);
            this.selectMeterType[0].set("name", this.lang.lang.for_water);
            this.selectMeterType[1].set("name", this.lang.lang.for_electricity);
        },
        provinceChange: function(pro) {
            this.districtDS.filter({
                field: "province_id",
                value: this.obj.province
            });
        },
        loadObj: function(id) {
            var self = this;
            this.dataSource.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                take: 100
            }).then(function(e) {
                var view = self.dataSource.view();
                if (view[0].image_url) {
                    self.set("obj", view[0]);
                } else {
                    view[0].set("image_url", "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg");
                    self.set("obj", view[0]);
                }

            });
        },
        addNew: function() {
            this.set("obj", null);
            this.set("isEdit", false);
            this.dataSource.insert(0, {
                number: null,
                name: null,
                abbr: null,
                representative: null,
                currency: 3,
                status: 1,
                expire_date: null,
                max_customer: null,
                description: null,
                address: null,
                province: null,
                district: null,
                email: null,
                mobile: null,
                telephone: null,
                attachment_id: 0,
                type: "w",
                day_disconnect: 90,
                image_url: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg",
                term_of_condition: null
            });
            var obj = this.dataSource.at(0);
            this.set("obj", obj);
        },
        onSelect: function(e) {
            // Array with information about the uploaded files
            var self = this,
                files = e.files[0],
                obj = this.get("obj");

            var fileReader = new FileReader();
            fileReader.onload = function(event) {
                var mapImage = event.target.result;
                self.obj.set('image_url', mapImage);
            }
            fileReader.readAsDataURL(files.rawFile);

            // Check the extension of each file and abort the upload if it is not .jpg         
            if (files.extension.toLowerCase() === ".jpg" ||
                files.extension.toLowerCase() === ".jpeg" ||
                files.extension.toLowerCase() === ".tiff" ||
                files.extension.toLowerCase() === ".png" ||
                files.extension.toLowerCase() === ".gif") {

                if (this.attachmentDS.total() > 0) {
                    var att = this.attachmentDS.at(0);
                    this.attachmentDS.remove(att);
                }

                var key = 'WLOGO_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) + '_' + files.name;

                this.attachmentDS.add({
                    user_id: this.get("user_id"),
                    item_id: obj.id,
                    type: "Item",
                    name: files.name,
                    description: "",
                    key: key,
                    url: banhji.s3 + key,
                    size: files.size,
                    created_at: new Date(),

                    file: files.rawFile
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(this.lang.lang.file_not_allow);
            }
        },
        uploadFile: function() {
            var self = this;
            $.each(this.attachmentDS.data(), function(index, value) {
                if (!value.id) {
                    var params = {
                        Body: value.file,
                        Key: value.key
                    };
                    bucket.upload(params, function(err, data) {});
                }
            });

            this.attachmentDS.sync();
            this.attachmentDS.bind("requestEnd", function(e) {
                //Delete File
                if (e.type != 'read' && e.response) {
                    var response = e.response.results;
                    self.get("obj").set("attachment_id", response[0].id);
                    self.get("obj").set("image_url", "");
                    self.saveDataSource();
                }
            });
        },
        removeFile: function(e) {
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
            }
        },
        save: function() {
            var self = this;
            if (this.get("obj").number && this.get("obj").max_customer) {
                if (this.attachmentDS.hasChanges() == true) {
                    this.uploadFile();
                } else {
                    this.saveDataSource();
                }
            } else {
                alert("License Number required!");
            }
        },
        saveDataSource: function() {
            var self = this;
            if (this.dataSource.data().length > 0) {
                this.dataSource.sync();
                this.dataSource.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        banhji.router.navigate("/setting");
                        banhji.setting.licenseDS.fetch();
                    }
                });
                this.dataSource.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.error(self.lang.lang.error_message);
                });
            }
        },
        cancel: function() {
            this.dataSource.cancelChanges();
            this.dataSource.data([]);
            this.attachmentDS.cancelChanges();
            this.attachmentDS.data([]);
            banhji.router.navigate("/setting");
        }
    });
    banhji.plan = kendo.observable({
        lang: langVM,
        dataSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "plans",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + "plans",
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + "plans",
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + "plans",
                    type: "DELETE",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            limit: options.pageSize,
                            filter: options.filter,
                            sort: options.sort
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        itemDS: dataStore(apiUrl + "plans/items"),
        itemSelect: 0,
        ItemTypeDS: [{
                id: "exemption",
                name: "Exemption"
            },
            {
                id: "tariff",
                name: "Tariff"
            },
            {
                id: "deposit",
                name: "Deposit"
            },
            {
                id: "service",
                name: "Service"
            },
            {
                id: "maintenance",
                name: "Maintenance"
            },
            {
                id: "installment",
                name: "Installment"
            }
        ],
        addNewItemType: null,
        current: null,
        currencyDS: new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: {
                field: "status",
                value: 1
            }
        }),
        list: [],
        planItemList: [],
        currencyEnable: true,
        pageLoad: function(id) {
            if (id) {
                this.loadObj(id);
                this.set("currencyEnable", false);
            } else {
                this.addNew();
                this.set("currencyEnable", true);
                this.addItem();
            }
        },
        loadObj: function(id) {
            var self = this;
            this.dataSource.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                take: 100
            }).then(function(e) {
                var view = self.dataSource.view();
                self.setCurrent(view[0]);
                // self.itemDS.filter({field: "currency_id", value: view[0]._currency.id});
            });
        },
        onChange: function(e) {
            let self = this;
            let myData = self.dataSource.data()[0];

            var data = e.data,
                selected = e.sender.selectedIndex,
                dataitemDs = this.itemDS.at(selected);
            data.set("type", dataitemDs.type);
            data.set("name", dataitemDs.name);
            data.set("amount", dataitemDs.amount);
            myData.set('dirty', true);
        },
        currencyChange: function(e) {
            var data = e.data;
            this.itemDS.filter({
                field: "currency_id",
                value: this.current.currency
            });
            this.get("current").items.splice(0, this.get("current").items.length);
            this.addItem();
        },
        setCurrent: function(current) {
            this.set('current', current);
        },
        addNew: function() {
            this.dataSource.add({
                name: null,
                code: null,
                items: []
            });
            this.setCurrent(this.dataSource.at(this.dataSource.data().length - 1));
        },
        remove: function(e) {
            this.dataSource.remove(e.data);
        },
        addItem: function() {
            this.get("current").items.push({
                item: "",
                type: "",
                name: "",
                amount: 0
            });
        },
        removeItem: function(e) {
            this.items.remove(e);
        },
        save: function() {
            var self = this;
            var haveTariff = "",
                haveService = "",
                haveDeposit = "";
            //Check Tariff
            $.each(this.dataSource.data()[0].items, function(i, v) {
                if (v.type == "tariff") {
                    haveTariff = v.item;
                } else if (v.type == "service") {
                    haveService = v.item;
                } else if (v.type == "deposit") {
                    haveDeposit = v.item;
                }
            });
            if (haveTariff && haveService && haveDeposit) {
                // console.log("aaaa");
                this.dataSource.sync();
                this.dataSource.bind('requestEnd', function(e) {
                    if (e.type != 'read' && e.response.results) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.cancel();
                    }
                });
                this.dataSource.bind('error', function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.error(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(self.lang.lang.error_message);
            }
            console.log("save");
        },
        cancel: function() {
            this.dataSource.data([]);
            banhji.router.navigate("/setting");
        }
    });
    //end Setting

    banhji.addAccountingprefix = kendo.observable({
        lang: langVM,
        selectTypeList: banhji.source.typeList,
        Type: "Invoice",
        dataSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "prefixes",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + "prefixes",
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + "prefixes",
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + "prefixes",
                    type: "DELETE",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            limit: options.pageSize,
                            filter: options.filter,
                            sort: options.sort
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            filter: {
                field: "type",
                operator: "where_not_in",
                value: ["Electricity_Invoice", "Utility_Invoice"]
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        pageLoad: function(id) {
            if (id) {
                this.set("isEdit", true);
                this.loadObj(id);
            } else {
                this.cancel;
            }
        },
        loadObj: function(id) {
            var self = this;
            this.dataSource.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                take: 100
            }).then(function(e) {
                var view = self.dataSource.view();
                self.set("obj", view[0]);

            });
        },
        objSync: function() {
            var dfd = $.Deferred();

            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e) {
                if (e.response) {
                    dfd.resolve(e.response.results);
                }
            });
            this.dataSource.bind("error", function(e) {
                dfd.reject(e.errorThrown);
            });
            return dfd;
        },
        save: function() {
            var self = this,
                obj = this.get("obj");
            //Save Obj
            this.objSync()
                .then(function(data) { //Success 
                    banhji.accountingSetting.prefixDS.fetch();
                    return data;
                }, function(reason) { //Error
                    $("#ntf1").data("kendoNotification").error(reason);
                }).then(function(result) {
                    $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);
                    if (self.get("saveClose")) {
                        //Save Close
                        self.set("saveClose", false);
                        self.cancel();
                        //window.history.back();
                    } else {
                        //Save New
                        self.addEmpty();
                    }
                });
        },
        cancel: function() {
            this.dataSource.cancelChanges();
            window.history.back();
        }
    });
    //Add Property
    banhji.property = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "properties"),
        propertyDS: dataStore(apiUrl + "properties"),
        numberDS: dataStore(apiUrl + "properties"),
        contactDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "utibills/contacts",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            limit: options.pageSize,
                            filter: options.filter,
                            sort: options.sort
                        };
                    } else {
                        return {
                            models: kendo.stringify(options.models)
                        };
                    }
                }
            },
            schema: {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            sort: {
                field: "id",
                dir: "desc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        onContactChange: function(e) {
            this.dataSource.query({
                filter: {
                    field: 'contact_id',
                    value: this.get('contactOBJ')
                }
            });
            this.set("haveContact", true);
        },
        contactID: "",
        haveContact: false,
        selectedRow: function(e) {
            var data = e.data,
                self = this;
            this.set("haveContact", false);
            this.dataSource.query({
                    filter: [{
                        field: "contact_id",
                        value: data.id
                    }]
                })
                .then(function(e) {
                    self.set("haveContact", true);
                    self.set("contactID", data.id);
                });
        },
        obj: null,
        contactOBJ: null,
        Codeabbr: null,
        Codenumber: null,
        notDuplicateNumber: true,
        isEdit: false,
        pageLoad: function(id) {
            var boxwindow = $("#addProperty").kendoWindow({
                title: this.lang.lang.add_property
            });
        },
        loadContact: function(id) {
            var self = this;
            this.contactDS.query({
                filter: [{
                    field: "id",
                    value: id
                }],
                page: 1,
                pageSize: 50
            }).then(function(e) {
                var view = self.contactDS.data();
                if (view.length > 0) {
                    self.set("obj", view[0]);
                    self.loadData();
                }
            });
        },
        closePropertyWin: function() {
            this.set("pVisible", false);
        },
        haveContact: false,
        addEmpty: function(id) {
            this.propertyDS.data([]);
            this.propertyDS.insert(0, {
                contact_id: id,
                code: this.get("pCode"),
                abbr: this.get("pAbbr"),
                name: this.get("pName"),
                address: this.get("pAddress")
            });
        },
        addProperty: function() {
            var self = this;
            if (this.get("pName") && this.get("pCode") && this.get("pAbbr")) {
                this.propertyDS.data([]);
                this.propertyDS.add({
                    contact_id: this.get("contactID"),
                    code: this.get("pCode"),
                    abbr: this.get("pAbbr"),
                    name: this.get("pName"),
                    address: this.get("pAddress")
                });
                this.propertyDS.sync();
                this.propertyDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("pCode", "");
                        self.set("pAbbr", "");
                        self.set("pName", "");
                        self.set("pAddress", "");
                        self.dataSource.filter({
                            field: "contact_id",
                            value: self.get("contactID")
                        });
                    }
                });
                this.propertyDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.error(self.lang.lang.error_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(this.lang.lang.field_required_message);
            }
        },
        licenseChange: function(e) {
            var obj = this.get("obj"),
                self = this;
            this.licenseDS.query({
                filter: {
                    field: "id",
                    value: obj.branch_id
                },
                page: 1,
                take: 1
            }).then(function(e) {
                var view = self.licenseDS.view();
                self.goNumber(view[0].abbr);
                self.set("Codeabbr", view[0].abbr);
                self.dataSource.pushUpdate({
                    abbr: view[0].abbr
                });
            });
        },
        goNumber: function(abbr) {
            var self = this,
                obj = this.get("obj");
            this.numberDS.query({
                filter: {
                    field: "abbr",
                    value: abbr
                },
                sort: {
                    field: "code",
                    dir: "desc"
                },
                page: 1,
                take: 1
            }).then(function(e) {
                var view = self.numberDS.view();
                var lastNo;
                if (self.numberDS._total > 0) {
                    lastNo = kendo.parseInt(view[0].code) + 1;
                } else {
                    lastNo = 1;
                }
                if (lastNo) {
                    obj.set("code", lastNo);
                    self.set("Codenumber", lastNo);
                }
            });
        },
        checkExistingNumber: function() {
            var self = this,
                para = [],
                obj = this.get("obj");
            if (obj.code !== "") {
                para.push({
                    field: "abbr",
                    value: obj.abbr
                });
                para.push({
                    field: "code",
                    value: obj.code
                });
                this.existingDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 1
                }).then(function(e) {
                    var view = self.existingDS.view();

                    if (view.length > 0) {
                        self.set("notDuplicateNumber", false);
                    } else {
                        self.set("notDuplicateNumber", true);
                    }
                });
            }
        },
        save: function() {
            var self = this,
                obj = this.get("obj");
            if (obj.abbr != null && obj.code != null) {
                this.dataSource.sync();
                this.dataSource.bind("requestEnd", function(e) {
                    if (e.type != 'read') {
                        if (e.response) {
                            $("#ntf1").data("kendoNotification").success("Activated user successfully!");
                            self.cancel();
                        }
                    }
                });
                this.dataSource.bind("error", function(e) {
                    $("#ntf1").data("kendoNotification").error("Error activated!");
                });
            } else {
                alert("Fields Required!");
            }
        },
        search: function() {
            var self = this,
                para = [],
                searchText = this.get("searchText"),
                contact_type_id = this.get("contact_type_id");
            if (searchText) {
                var textParts = searchText.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);
                para.push({
                    field: "name",
                    operator: "like",
                    value: searchText
                }, {
                    field: "number",
                    operator: "or_where",
                    value: textParts[1]
                }, {
                    field: "abbr",
                    operator: "or_where",
                    value: searchText
                });
            }
            this.contactDS.filter(para);
        },
        cancel: function() {
            this.dataSource.data([]);
            banhji.router.navigate("/center");
        }
    });
    //Add Purchase
    banhji.purchase =  kendo.observable({
        lang                        : langVM,
        dataSource                  : dataStore(apiUrl + "transactions"),
        lineDS                      : dataStore(apiUrl + "item_lines"),
        txnDS                       : dataStore(apiUrl + "transactions"),
        numberDS                    : dataStore(apiUrl + "transactions/number"),
        accountLineDS               : dataStore(apiUrl + "account_lines"),
        journalLineDS               : dataStore(apiUrl + "journal_lines"),
        additionalCostDS            : dataStore(apiUrl + "transactions"),
        recurringDS                 : dataStore(apiUrl + "transactions"),
        recurringLineDS             : dataStore(apiUrl + "item_lines"),
        recurringAccountLineDS      : dataStore(apiUrl + "account_lines"),
        recurringAdditionalCostDS   : dataStore(apiUrl + "transactions"),
        referenceDS                 : dataStore(apiUrl + "transactions"),
        referenceLineDS             : dataStore(apiUrl + "item_lines"),
        attachmentDS                : dataStore(apiUrl + "attachments"),
        depositDS                   : dataStore(apiUrl + "transactions"),
        balanceDS                   : dataStore(apiUrl + "transactions/balance"),
        itemDS                      : dataStore(apiUrl + "items"),
        itemPriceDS                 : dataStore(apiUrl + "item_prices"),
        assemblyDS                  : dataStore(apiUrl + "item_assemblies"),
        segmentDS                   : dataStore(apiUrl + "segments"),
        segItemDS                   : dataStore(apiUrl + "segments/item"),
        segmentItemDS               : dataStore(apiUrl + "segments/item"),
        jobDS                       : new kendo.data.DataSource({
            data: banhji.source.jobList,
            sort: { field: "name", dir: "asc" }
        }),
        accountDS                   : new kendo.data.DataSource({
            data: banhji.source.accountList
        }),
        whtAccountDS                : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: {
                logic: "or",
                filters: [
                    { field: "account_type_id", value: 13 },//Inventory
                    { field: "account_type_id", value: 16 },//Fixed Asset
                    { field: "account_type_id", value: 17 },//Intangible Assets
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
        additionalCostAccountDS     : new kendo.data.DataSource({
            data: banhji.source.accountList
        }),
        txnTemplateDS               : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{
                logic: "or",
                filters: [
                    { field: "type", value: "Cash_Purchase" },
                    { field: "type", value: "Credit_Purchase" }
                ]
            }
        }),
        taxItemDS                   : new kendo.data.DataSource({
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
        categoryDS                  : new kendo.data.DataSource({
            data: banhji.source.categoryList,
            filter: [
                { field:"item_type_id", value: 1 },
                { field:"id", operator:"neq", value: 5 },
                { field:"id", operator:"neq", value: 6 }
            ]
        }),
        itemGroupDS                 : banhji.source.itemGroupDS,
        paymentTermDS               : banhji.source.paymentTermDS,
        paymentMethodDS             : banhji.source.paymentMethodDS,
        contactDS                   : banhji.source.supplierDS,
        additionalContactDS         : banhji.source.supplierDS,
        statusObj                   : banhji.source.statusObj,
        amtDueColor                 : banhji.source.amtDueColor,
        confirmMessage              : banhji.source.confirmMessage,
        frequencyList               : banhji.source.frequencyList,
        monthOptionList             : banhji.source.monthOptionList,
        monthList                   : banhji.source.monthList,
        weekDayList                 : banhji.source.weekDayList,
        dayList                     : banhji.source.dayList,
        showMonthOption             : false,
        showMonth                   : false,
        showWeek                    : false,
        showDay                     : false,
        obj                         : null,
        additCostObj                : null,
        isEdit                      : false,
        saveDraft                   : false,
        saveClose                   : false,
        savePrint                   : false,
        saveRecurring               : false,
        showConfirm                 : false,
        notDuplicateNumber          : true,
        recurring                   : "",
        recurring_validate          : false,
        isCash                      : true,
        isAdditCostCash             : true,
        windowVisible               : false,
        balance                     : 0,
        total                       : 0,
        amount_due                  : 0,
        total_deposit               : 0,
        reference_id                : 0,
        additCostCurrency           : "",
        barcode                     : "",
        barcodeVisible              : false,
        category_id                 : 0,
        item_group_id               : 0,
        user_id                     : banhji.source.user_id,
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
        insertItem      : function(data){
            var obj = this.get("obj"),
                rate = obj.rate / banhji.source.getRate(data.locale, new Date(obj.issued_date));

            var item_price = {
                measurement_id  : data.measurement_id,
                conversion_ratio: 1,
                measurement     : data.measurement.name
            };

            this.lineDS.insert(0, {
                transaction_id      : obj.id,
                tax_item_id         : 0,
                item_id             : data.id,
                assembly_id         : 0,
                measurement_id      : data.measurement_id,
                description         : data.purchase_description,
                quantity            : 1,
                conversion_ratio    : 1,
                cost                : 0,
                price               : 0,
                amount              : 0,
                discount            : 0,
                discount_percentage : 0,
                tax                 : 0,
                rate                : rate,
                locale              : data.locale,
                movement            : 1,
                reference_no        : "",

                item                : data,
                item_price          : item_price,
                tax_item            : { id:"", name:"" },
                wht_account         : { id:"", name:"" }
            });
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

                    var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

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
        //Deposit
        loadDeposit         : function(){
            var self = this, obj = this.get("obj");

            //Deposits on Edit Mode
            if(this.get("isEdit")){
                this.depositDS.filter([
                    { field:"type", value:"Vendor_Deposit" },
                    { field:"reference_id", value:obj.id }
                ]);
            }

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
        addDeposit          : function(id){
            var obj = this.get("obj");

            this.depositDS.data([]);

            if(obj.deposit>0){
                this.depositDS.add({
                    contact_id          : obj.contact_id,
                    reference_id        : id,
                    user_id             : this.get("user_id"),
                    type                : "Vendor_Deposit",
                    amount              : obj.deposit*-1,
                    rate                : obj.rate,
                    locale              : obj.locale,
                    issued_date         : obj.issued_date
                });
            }
        },
        saveDeposit         : function(id){
            var obj = this.get("obj");

            if(this.get("isEdit")){
                if(this.depositDS.total()>0){
                    var deposit = this.depositDS.at(0);
                    deposit.set("amount", obj.deposit*-1);
                }else{
                    this.addDeposit(id);
                }
            }else{
                this.addDeposit(id);
            }

            this.depositDS.sync();
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
                obj.set("account_id", contact.account_id);
                obj.set("payment_term_id", contact.payment_term_id);
                obj.set("payment_method_id", contact.payment_method_id);
                obj.set("locale", contact.locale);
                obj.set("bill_to", contact.bill_to);
                obj.set("ship_to", contact.ship_to);

                this.setRate();
                this.loadDeposit();
                this.loadBalance();
                this.loadReference();
            }

            this.changes();
        },
        loadBalance         : function(){
            var self = this, obj = this.get("obj");

            this.balanceDS.query({
                filter:[
                    { field:"contact_id", value:obj.contact_id },
                    { field:"type", operator:"where_in", value:["Cash_Purchase", "Credit_Purchase"] }
                ]
            }).then(function(){
                var view = self.balanceDS.view(),
                    contact = obj.contact,
                    balance = view[0].amount,
                    creditAllowed = 0;

                if(contact.credit_limit > balance){
                    creditAllowed = contact.credit_limit - balance;
                }

                self.set("balance", kendo.toString(balance, "c", obj.locale));
                obj.set("credit_allowed", creditAllowed);
            });
        },
        //Currency Rate
        setRate             : function(){
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
        },
        //Segments
        addSegmentItem      : function(){
            var obj = this.get("obj"),
                notExisting = true,
                segment_id = this.get("segment_id"),
                segmentitem_id = this.get("segmentitem_id");

            if(segment_id && segmentitem_id){
                $.each(this.segmentItemDS.data(), function(index, value){
                    if(value.segment_id==segment_id){
                        notExisting = false;

                        return false;
                    }
                });

                if(notExisting){
                    var segments = this.segmentDS.get(segment_id),
                        segmentitems = this.segItemDS.get(segmentitem_id);

                    this.segmentItemDS.add({
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
        //Additional Cost
        additCostContactChanges: function(){
            var additCostObj = this.get("additCostObj");

            if(additCostObj.contact){
                var contact = additCostObj.contact,
                    code = banhji.source.getCurrencyCode(contact.locale);

                additCostObj.set("contact_id", contact.id);
                additCostObj.set("locale", contact.locale);
                this.set("additCostCurrency", code);
                this.additCostSetRate();
            }
        },
        additCostTypeChanges: function(){
            var additCostObj = this.get("additCostObj");

            if(additCostObj.type=="Cash_Purchase"){
                this.set("isAdditCostCash", true);

                this.additionalCostAccountDS.filter({ field:"account_type_id", value: 10 });
            }else{
                this.set("isAdditCostCash", false);

                this.additionalCostAccountDS.filter({
                    logic: "or",
                    filters: [
                      { field: "account_type_id", value: 23 },
                      { field: "account_type_id", value: 24 }
                    ]
                });
            }

            additCostObj.set("account_id", 0);
        },
        additCostSetRate: function(){
            var additCostObj = this.get("additCostObj"),
                rate = banhji.source.getRate(additCostObj.locale, new Date(additCostObj.issued_date));

                additCostObj.set("rate", rate);
        },
        windowCreate        : function(){
            var self = this,
                obj = this.get("obj"),
                additCostObj = this.get("additCostObj");

            this.additionalCostAccountDS.filter({ field:"account_type_id", value:10 });

            this.additionalCostDS.insert(0, {
                contact_id          : "",
                account_id          : 1,
                payment_term_id     : 0,
                reference_id        : obj.id,
                recurring_id        : "",
                tax_item_id         : "",
                wht_account_id      : "",
                user_id             : this.get("user_id"),
                reference_no        : "",
                type                : "Cash_Purchase",//Required
                sub_total           : 0,
                amount              : 0,
                tax                 : 0,
                rate                : 1,
                locale              : obj.locale,
                issued_date         : new Date(),
                due_date            : new Date(),
                bill_to             : "",
                ship_to             : "",
                memo                : "",
                memo2               : "",
                status              : 0,
                segments            : [],
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

            var additCostObj = this.additionalCostDS.at(0);
            this.set("additCostObj", additCostObj);
            this.additCostSetRate();

            // Apply additional cost to item line
            $.each(this.lineDS.data(), function(index, value) {
                if(value.item_id>0){
                    if(value.item.item_type_id==1){
                        value.set("additional_applied", true);
                    }
                }
            });

            this.set("windowVisible", true);
        },
        windowEdit          : function(e){
            var data = e.data;

            if(data.type=="Cash_Purchase"){
                this.set("isAdditCostCash", true);

                this.additionalCostAccountDS.filter({ field:"account_type_id", value: 10 });
            }else{
                this.set("isAdditCostCash", false);

                this.additionalCostAccountDS.filter({
                    logic: "or",
                    filters: [
                      { field: "account_type_id", value: 23 },
                      { field: "account_type_id", value: 24 }
                    ]
                });
            }

            this.set("additCostObj", data);
            this.set("windowVisible", true);
        },
        windowSave          : function(){
            this.set("windowVisible", false);
        },
        windowDiscard       : function(){
            var additCostObj = this.get("additCostObj"),
                index = this.additionalCostDS.indexOf(additCostObj),
                selected = this.additionalCostDS.at(index);

            this.additionalCostDS.remove(selected);
            this.changes();

            this.set("windowVisible", false);
        },
        windowClose         : function(){
            this.set("windowVisible", false);
        },
        //Item
        addItem             : function(uid){
            var self = this,
                row = this.lineDS.getByUid(uid),
                obj = this.get("obj"),
                item = row.item,
                rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

            row.set("item_id", item.id);
            row.set("description", item.sale_description);
            row.set("rate", rate);
            row.set("locale", item.locale);

            //Item base price
            var item_price = {
                measurement_id  : item.measurement_id,
                conversion_ratio: 1,
                measurement     : item.measurement.name
            };
            row.set("item_price", item_price);
        },
        addItemCatalog      : function(uid){
            var self = this,
                row = this.lineDS.getByUid(uid),
                obj = this.get("obj"),
                item = row.item;

            this.lineDS.remove(row);

            var catalogList = [];
            $.each(item.catalogs, function(index, value){
                catalogList.push(value);
            });

            this.itemDS.query({
                filter: { field:"id", operator:"where_in", value: catalogList }
            }).then(function(){
                var view = self.itemDS.view();

                $.each(view, function(index, value){
                    var rate = obj.rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));

                    self.lineDS.add({
                        transaction_id      : obj.id,
                        tax_item_id         : 0,
                        item_id             : value.id,
                        measurement_id      : 0,
                        description         : value.sale_description,
                        quantity            : 1,
                        conversion_ratio    : 1,
                        cost                : 0,
                        price               : 0,
                        amount              : 0,
                        discount            : 0,
                        rate                : rate,
                        locale              : value.locale,
                        movement            : 1,

                        discount_percentage : 0,
                        item                : value,
                        measurement         : { measurement_id:"", measurement:"" },
                        tax_item            : { id:"", name:"" },
                        wht_account         : { id:"", name:"" }
                    });
                });

            });
        },
        addRow              : function(){
            var obj = this.get("obj");

            this.lineDS.add({
                transaction_id      : obj.id,
                tax_item_id         : "",
                wht_account_id      : "",
                item_id             : "",
                measurement_id      : 0,
                description         : "",
                quantity            : 1,
                conversion_ratio    : 1,
                cost                : 0,
                amount              : 0,
                discount            : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                additional_cost     : 0,
                additional_applied  : false,
                movement            : 1,
                reference_no        : "",

                discount_percentage : 0,
                item                : { id:"", name:"" },
                item_price          : { measurement_id:"", measurement:"" },
                tax_item            : { id:"", name:"" },
                wht_account         : { id:"", name:"" }
            });
        },
        addExtraRow         : function(uid){
            var row = this.lineDS.getByUid(uid),
                index = this.lineDS.indexOf(row);

            if(index==this.lineDS.total()-1){
                this.addRow();
            }
        },
        removeRow           : function(e){
            var d = e.data;

            this.lineDS.remove(d);
            this.changes();
        },
        removeEmptyRow      : function(){
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
        },
        itemLineDSChanges       : function(arg){
            var self = banhji.purchase;

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
                }else if(arg.field=="quantity" || arg.field=="cost" || arg.field=="discount" || arg.field=="additional_applied"){
                    self.changes();
                }else if(arg.field=="item_price"){
                    var dataRow = arg.items[0];

                    dataRow.set("measurement_id", dataRow.item_price.measurement_id);
                    dataRow.set("conversion_ratio", dataRow.item_price.conversion_ratio);
                }else if(arg.field=="discount_percentage"){
                    var dataRow = arg.items[0],
                        percentageAmount = dataRow.quantity * dataRow.cost * dataRow.discount_percentage;

                    dataRow.set("discount", percentageAmount);
                }else if(arg.field=="tax_item"){
                    var dataRow = arg.items[0];

                    dataRow.set("tax_item_id", dataRow.tax_item.id);
                    dataRow.set("tax", 0);

                    self.changes();
                }else if(arg.field=="wht_account"){
                    var dataRow = arg.items[0];

                    dataRow.set("wht_account_id", dataRow.wht_account.id);

                    self.changes();
                }
            }
        },
        //Account
        addRowAccount       : function(){
            var obj = this.get("obj");

            this.accountLineDS.add({
                transaction_id      : obj.id,
                tax_item_id         : "",
                wht_account_id      : "",
                account_id          : "",
                description         : "",
                reference_no        : "",
                segments            : [],
                amount              : 0,
                rate                : obj.rate,
                locale              : obj.locale,

                account             : { id:"", name:"" },
                tax_item            : { id:"", name:"" },
                wht_account         : { id:"", name:"" }
            });
        },
        addExtraRowAccount      : function(uid){
            var row = this.accountLineDS.getByUid(uid),
                index = this.accountLineDS.indexOf(row);

            if(index==this.accountLineDS.total()-1){
                this.addRowAccount();
            }
        },
        removeRowAccount    : function(e){
            var d = e.data;

            this.accountLineDS.remove(d);
            this.changes();
        },
        accountLineDSChanges        : function(arg){
            var self = banhji.purchase;

            if(arg.field){
                if(arg.field=="account"){
                    var dataRow = arg.items[0],
                        account = dataRow.account;

                    dataRow.set("account_id", account.id);

                    self.addExtraRowAccount(dataRow.uid);
                }else if(arg.field=="amount"){
                    self.changes();
                }else if(arg.field=="tax_item"){
                    var dataRow = arg.items[0];

                    dataRow.set("tax_item_id", dataRow.tax_item.id);
                    dataRow.set("tax", 0);

                    self.changes();
                }else if(arg.field=="wht_account"){
                    var dataRow = arg.items[0];

                    dataRow.set("wht_account_id", dataRow.wht_account.id);

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
        setStatus           : function(){
            var self = this,
                obj = this.get("obj"),
                statusObj = this.get("statusObj");

            statusObj.set("text", "");
            statusObj.set("date", "");
            statusObj.set("number", "");
            statusObj.set("url", "");

            switch(obj.status) {
                case 0:
                    statusObj.set("text", "open");
                    break;
                case 1:
                    statusObj.set("text", "paid");

                    this.txnDS.query({
                        filter:{ field:"reference_id", value: obj.id },
                        sort: { field:"issued_date", dir:"desc" },
                        page:1,
                        pageSize:1
                    }).then(function(){
                        var view = self.txnDS.view();

                        if(view.length>0){
                            statusObj.set("date", kendo.toString(new Date(view[0].issued_date), "dd-MM-yyyy h:mm:ss tt"));
                            statusObj.set("number", view[0].number);

                            var url = "#/" + view[0].type.toLowerCase() + "/" + view[0].id;
                            statusObj.set("url", url);
                        }
                    });
                    break;
                case 2:
                    statusObj.set("text", "partialy paid");
                    break;
                case 4:
                    statusObj.set("text", "draft");
                    break;
                default:
                    //Default here
            }
        },
        //Obj
        loadObj             : function(id){
            var self = this, para = [], referenceIds = [];

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
                    pageSize: 100
                }).then(function(e){
                    var view = self.dataSource.view();

                    if(view[0].type=="Cash_Purchase"){
                        self.set("isCash", true);

                        self.accountDS.filter({ field: "account_type_id", value: 10 });
                    }else{
                        self.set("isCash", false);

                        self.accountDS.filter({ field: "account_type_id", value: 23 });
                    }

                    self.set("obj", view[0]);
                    self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));
                    self.set("amount_due", kendo.toString(view[0].amount - view[0].deposit, "c", view[0].locale));
                    self.set("additional_cost", kendo.toString(view[0].additional_cost, "c", view[0].locale));
                    self.setStatus();

                    self.lineDS.query({
                        filter: { field: "transaction_id", value: id }
                    });

                    self.accountLineDS.query({
                        filter: { field: "transaction_id", value: id }
                    });

                    self.journalLineDS.query({
                        filter: { field: "transaction_id", value: id }
                    });

                    self.attachmentDS.filter({ field: "transaction_id", value: id });

                    //Additional Cost
                    var additionalCostPara = [];
                    if(view[0].is_recurring=="1"){
                        additionalCostPara.push({ field: "is_recurring", value: 1 });
                    }
                    additionalCostPara.push({ field: "reference_id", value: id });
                    additionalCostPara.push({ field: "type", operator:"where_in", value: ["Cash_Purchase","Credit_Purchase"] });
                    self.additionalCostDS.filter(additionalCostPara);

                    //Segment
                    var segments = [];
                    $.each(view[0].segments, function(index, value){
                        segments.push(value);
                    });
                    self.segmentItemDS.query({
                        filter: { field: "id", operator:"where_in", value: segments }
                    });

                    self.loadDeposit();
                    self.loadReference();
                });
            }
        },
        changes             : function(){
            var self = this, obj = this.get("obj"),
                total = 0, subTotal = 0, discount = 0, tax = 0,
                countAdditCheck = 0, amountAdditCheck = 0, additionalCost = 0,
                remaining = 0, amount_due = 0;

            //Item Line
            $.each(this.lineDS.data(), function(index, value) {
                var amt = value.quantity * value.cost;
                subTotal += amt;

                //Discount by line
                if(value.discount>0){
                    amt -= value.discount;
                    discount += value.discount;
                }

                //Tax by line
                if(value.tax_item_id>0){
                    var taxAmount = amt * value.tax_item.rate;

                    if(banhji.source.checkWHT(value.tax_item.tax_type_id) && value.wht_account_id==0){
                        tax -= taxAmount;
                    }else{
                        tax += taxAmount;
                    }

                    value.set("tax", taxAmount);
                }else{
                    value.set("tax", 0);
                }

                //Count additional cost and check
                if(value.additional_applied){
                    amountAdditCheck += amt;
                    countAdditCheck++;
                }

                value.set("amount", amt);
                value.set("additional_cost", 0);//Reset additional cost
            });

            //Account Line
            $.each(this.accountLineDS.data(), function(index, value) {
                subTotal += value.amount;

                //Tax by line
                if(value.tax_item_id>0){
                    var taxAmount = value.amount * value.tax_item.rate;

                    if(banhji.source.checkWHT(value.tax_item.tax_type_id) && value.wht_account_id==0){
                        tax -= taxAmount;
                    }else{
                        tax += taxAmount;
                    }

                    value.set("tax", taxAmount);
                }else{
                    value.set("tax", 0);
                }
            });

            //Additional Cost Line
            $.each(this.additionalCostDS.data(), function(index, value) {
                //Tax by line
                var additionalTax = 0, additionalRate = obj.rate / value.rate;
                if(value.tax_item_id>0){
                    var taxItem = self.taxItemDS.get(value.tax_item_id),
                        additionalTax = value.sub_total * taxItem.rate;

                    if(banhji.source.checkWHT(taxItem.tax_type_id) && value.wht_account_id==0){
                        tax -= additionalTax;
                    }else{
                        tax += additionalTax;
                    }

                    value.set("tax", additionalTax);
                }else{
                    value.set("tax", 0);
                }

                additionalCost += value.sub_total * additionalRate;
                value.set("amount", value.sub_total + additionalTax);
            });

            //Apply additional cost
            if(additionalCost>0){
                // this.set("showAdditionalCost", true);

                if(countAdditCheck>0){
                    $.each(this.lineDS.data(), function(index, value) {
                        if(value.additional_applied){
                            if(obj.additional_apply=="Equal"){
                                //subTotal += singleAdditionalCost;
                                var singleAdditionalCost = additionalCost / countAdditCheck;
                                value.set("additional_cost", singleAdditionalCost);
                            }else{
                                var percentageAdditionalCheck = value.amount / amountAdditCheck;
                                var weightedAdditionalCost = additionalCost * percentageAdditionalCheck;

                                //subTotal += weightedAdditionalCost;
                                value.set("additional_cost", weightedAdditionalCost);
                            }
                        }
                    });
                }

                var grid = $("#grid").data("kendoGrid");
                grid.showColumn("additional_cost");
                grid.showColumn("additional_applied");
                grid.refresh();
            }else{
                // this.set("showAdditionalCost", false);

                $.each(this.lineDS.data(), function(index, value) {
                    value.set("additional_cost", 0);
                    value.set("additional_applied", false);
                });
            }

            //Total
            total = (subTotal + tax) - discount;

            //Apply Deposit
            if(obj.deposit>0){
                if(obj.deposit <= this.get("total_deposit")){
                    if(obj.deposit <= total){
                        remaining = total - obj.deposit;
                    }else{
                        obj.set("deposit", total);
                    }
                }else{
                    alert("Over deposit to apply!");
                    obj.set("deposit", 0);
                }

                //Status
                if(remaining==0){
                    obj.set("status", 1);
                }else if(remaining==total){
                    obj.set("status", 0);
                }else{
                    obj.set("status", 2);
                }
            }

            //Warning over credit allowed
            if(obj.credit_allowed>0 && total>obj.credit_allowed){
                this.set("amtDueColor", "Gold");
            }else{
                this.set("amtDueColor", banhji.source.amtDueColor);
            }

            amount_due = total - obj.deposit;

            obj.set("sub_total", subTotal);
            obj.set("discount", discount);
            obj.set("tax", tax);
            obj.set("amount", total);
            obj.set("additional_cost", additionalCost);
            obj.set("remaining", remaining);

            this.set("total", kendo.toString(total, "c2", obj.locale));
            this.set("amount_due", kendo.toString(amount_due, "c2", obj.locale));
        },
        typeChanges         : function(){
            var obj = this.get("obj");

            if(obj.type=="Cash_Purchase"){
                this.set("isCash", true);

                this.accountDS.filter({ field:"account_type_id", value: 10 });
                obj.set("account_id", 0);

                var dropdownlist = $("#ddlAccount").data("kendoDropDownList");
                //dropdownlist.select(1);
                //dropdownlist.trigger("change");
            }else{
                this.set("isCash", false);
                
                this.accountDS.filter({ field: "account_type_id", value: 23 });
                obj.set("account_id", 0);
                obj.set("account_id", obj.contact.account_id);
            }

            this.generateNumber();
        },
        addEmpty            : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.accountLineDS.data([]);
            this.journalLineDS.data([]);
            this.additionalCostDS.data([]);
            this.attachmentDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);
            this.set("amount_due", 0);
            this.set("amtDueColor", banhji.source.amtDueColor);

            //Set Date
            var duedate = new Date();
            duedate.setDate(duedate.getDate() + 30);
            var month_of = new Date();
            month_of.setDate(month_of.getDate());

            this.dataSource.insert(0, {
                transaction_template_id : 0,
                account_id          : 1,
                contact_id          : "",
                payment_term_id     : 0,
                payment_method_id   : 0,
                reference_id        : "",
                recurring_id        : "",
                job_id              : 0,
                user_id             : this.get("user_id"),
                type                : "Cash_Purchase", //Required
                number              : "",
                sub_total           : 0,
                sub_type            : "Power_Purchase",
                discount            : 0,
                tax                 : 0,
                amount              : 0,
                deposit             : 0,
                remaining           : 0,
                credit_allowed      : 0,
                additional_cost     : 0,
                additional_apply    : "Equal",
                rate                : 1,
                locale              : banhji.locale,
                issued_date         : new Date(),
                bill_date           : new Date(),
                due_date            : duedate,
                bill_to             : "",
                ship_to             : "",
                memo                : "",
                memo2               : "",
                status              : 0,
                reference_no        : "",
                check_no            : "",
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
                month_of             : month_of,
                month               : 0,
                is_recurring        : 0,

                contact             : { id:0, name:"" },
                references          : []
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            this.setRate();
            this.typeChanges();
            this.generateNumber();

            //Default rows
            for (var i = 0; i < banhji.source.defaultLines; i++) {
                this.addRow();
                this.addRowAccount();
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
            var self = this, obj = this.get("obj"), segments = [];

            obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
            obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));
            obj.set("bill_date", kendo.toString(new Date(obj.bill_date), "yyyy-MM-dd"));

            //Warning over credit allowed
            if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
                alert("Over credit allowed!");
            }

            this.removeEmptyRow();

            //Segment
            $.each(this.segmentItemDS.data(), function(index, value){
                segments.push(value.id);
            });
            obj.set("segments", segments);

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
                    //Item line
                    $.each(self.lineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //Account line
                    $.each(self.accountLineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //Additional Cost line
                    $.each(self.additionalCostDS.data(), function(index, value){
                        value.set("reference_id", data[0].id);
                    });

                    //Attachment
                    $.each(self.attachmentDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });
                }

                //Journal
                if(data[0].is_recurring==0 && data[0].is_journal==1){
                    self.addJournal(data[0].id);
                    self.saveDeposit(data[0].id);
                }

                self.lineDS.sync();
                self.accountLineDS.sync();
                self.additionalCostDS.sync();
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
            this.accountLineDS.cancelChanges();
            this.additionalCostDS.cancelChanges();
            this.referenceDS.cancelChanges();
            this.attachmentDS.cancelChanges();
            this.segmentItemDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.accountLineDS.data([]);
            this.additionalCostDS.data([]);
            this.referenceDS.data([]);
            this.attachmentDS.data([]);
            this.segmentItemDS.data([]);

            banhji.userManagement.removeMultiTask("purchase");
        },
        cancel              : function(){
            this.clear();
            window.history.back();
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

            if(obj.contact_id==0){
                $("#ntf1").data("kendoNotification").warning("Please select a supplier.");

                result = false;
            }

            if(this.lineDS.total()==0 && this.accountLineDS.total()==0){
                $("#ntf1").data("kendoNotification").warning("Please select an item or account.");

                result = false;
            }

            return result;
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
                var item = value.item;

                //Service on Dr
                var serviceID = kendo.parseInt(item.expense_account_id);
                if(serviceID>0 && item.item_type_id==4){
                    raw = "dr"+serviceID;

                    var serviceAmount = (value.quantity*value.conversion_ratio*value.cost) + value.additional_cost;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : serviceID,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : serviceAmount,
                            cr                  : 0,
                            rate                : value.rate,
                            locale              : item.locale
                        };
                    }else{
                        entries[raw].dr += serviceAmount;
                    }
                }

                //Inventory on Dr
                var inventoryID = kendo.parseInt(item.inventory_account_id);
                if(inventoryID>0){
                    raw = "dr"+inventoryID;

                    var inventoryAmount = (value.quantity*value.conversion_ratio*value.cost) + value.additional_cost;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : inventoryID,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : inventoryAmount,
                            cr                  : 0,
                            rate                : value.rate,
                            locale              : item.locale
                        };
                    }else{
                        entries[raw].dr += inventoryAmount;
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

            //Account line
            $.each(this.accountLineDS.data(), function(index, value){
                //Expense Account on Dr
                var accountID = kendo.parseInt(value.account_id);
                if(accountID>0){
                    raw = "dr"+accountID;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : accountID,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : value.reference_no,
                            segments            : value.segments,
                            dr                  : value.amount,
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

            //Additional cost line
            $.each(this.additionalCostDS.data(), function(index, value){
                var additionalRate = obj.rate / value.rate,
                    additionalAccountID = value.account_id,
                    additionalAmt = value.sub_total * additionalRate;

                //Cash or A/P on Cr
                if(additionalAccountID>0){
                    raw = "cr"+additionalAccountID;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : additionalAccountID,
                            contact_id          : value.contact_id,
                            description         : value.memo,
                            reference_no        : value.reference_no,
                            segments            : value.segments,
                            dr                  : 0,
                            cr                  : additionalAmt,
                            rate                : additionalRate,
                            locale              : value.locale
                        };
                    }else{
                        entries[raw].cr += additionalAmt;
                    }
                }

                //Tax on Dr
                if(value.tax_item_id>0){
                    var taxItem = self.taxItemDS.get(value.tax_item_id),
                        raw = "dr"+taxItem.account_id,
                        taxAmt = value.sub_total * additionalRate * taxItem.rate;

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

            //Obj Account on Cr
            var objAccountID = kendo.parseInt(obj.account_id);
            if(objAccountID>0){
                raw = "cr"+objAccountID;

                var objAmount = obj.amount - obj.deposit;
                if(entries[raw]===undefined){
                    entries[raw] = {
                        transaction_id      : transaction_id,
                        account_id          : objAccountID,
                        contact_id          : obj.contact_id,
                        description         : obj.memo,
                        reference_no        : obj.reference_no,
                        segments            : obj.segments,
                        dr                  : 0,
                        cr                  : objAmount,
                        rate                : obj.rate,
                        locale              : obj.locale
                    };
                }else{
                    entries[raw].cr += objAmount;
                }
            }

            //Discount on Cr
            if(obj.discount > 0){
                var discountAccountId = kendo.parseInt(contact.trade_discount_id);
                if(discountAccountId>0){
                    raw = "cr"+discountAccountId;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : discountAccountId,
                            contact_id          : obj.contact_id,
                            description         : obj.memo,
                            reference_no        : obj.reference_no,
                            segments            : obj.segments,
                            dr                  : 0,
                            cr                  : obj.discount,
                            rate                : obj.rate,
                            locale              : obj.locale
                        };
                    }else{
                        entries[raw].cr += obj.discount;
                    }
                }
            }

            //Deposit on Cr
            if(obj.deposit > 0){
                var depositAccountId = kendo.parseInt(contact.deposit_account_id);
                if(depositAccountId>0){
                    raw = "cr"+depositAccountId;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : depositAccountId,
                            contact_id          : obj.contact_id,
                            description         : obj.memo,
                            reference_no        : obj.reference_no,
                            segments            : obj.segments,
                            dr                  : 0,
                            cr                  : obj.deposit,
                            rate                : obj.rate,
                            locale              : obj.locale
                        };
                    }else{
                        entries[raw].cr += obj.deposit;
                    }
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
        //Reference
        loadReference       : function(){
            var obj = this.get("obj");

            if(obj.contact_id>0){
                this.referenceDS.filter([
                    { field: "contact_id", value: obj.contact_id },
                    { field: "status", value:0 },
                    { field: "reuse", operator:"or_where", value:1 },
                    { field: "type", operator:"where_in", value: ["Purchase_Order","GRN","Receipt_Note"] },
                    { field: "due_date >=", value: kendo.toString(obj.issued_date, "yyyy-MM-dd") }
                ]);
            }
        },
        referenceChanges    : function(e){
            var self = this,
                isExisting = false,
                obj = this.get("obj"),
                reference_id = this.get("reference_id");

            $.each(obj.references, function(index, value){
                if(value.id==reference_id){
                    isExisting = true;

                    return false;
                }
            });

            if(reference_id>0 && isExisting==false){
                var reference = this.referenceDS.get(reference_id),
                    deposit = kendo.parseFloat(reference.deposit) + kendo.parseFloat(obj.deposit);

                obj.set("deposit", deposit);
                obj.references.push(reference);

                this.referenceLineDS.query({
                    filter:[
                        { field:"transaction_id", value: reference_id },
                        { field: "assembly_id", value: 0 }
                    ]
                }).then(function(){
                    var view = self.referenceLineDS.view();

                    $.each(view, function(index, value){
                        self.lineDS.insert(0, {
                            transaction_id      : obj.id,
                            reference_id        : reference.id,
                            tax_item_id         : value.tax_item_id,
                            item_id             : value.item_id,
                            measurement_id      : value.measurement_id,
                            description         : value.description,
                            quantity            : value.quantity,
                            conversion_ratio    : value.conversion_ratio,
                            cost                : value.cost,
                            amount              : value.amount,
                            discount            : value.discount,
                            rate                : value.rate,
                            locale              : value.locale,
                            movement            : 1,
                            additional_cost     : value.additional_cost,
                            additional_applied  : value.additional_applied,
                            reference_no        : reference.number,

                            item                : value.item,
                            item_price          : value.item_price,
                            tax_item            : value.tax_item,
                            wht_account         : value.wht_account
                        });
                    });

                    self.changes();
                });
            }

            this.set("reference_id", 0);
        },
        referenceRemoveRow  : function(e){
            var data = e.data,
                obj = this.get("obj"),
                index = obj.references.indexOf(data),
                deposit = kendo.parseFloat(obj.deposit) - kendo.parseFloat(data.deposit);

            obj.set("deposit", deposit);

            obj.references.splice(index, 1);
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
                obj.set("contact", view[0].contact);
                obj.set("contact_id", view[0].contact.id);
                obj.set("account_id", view[0].account_id);
                obj.set("payment_method_id", view[0].payment_method_id);
                obj.set("job_id", view[0].job_id);
                obj.set("type", view[0].type);
                obj.set("additional_cost", view[0].additional_cost);
                obj.set("additional_apply", view[0].additional_apply);
                obj.set("check_no", view[0].check_no);
                obj.set("segments", view[0].segments);
                obj.set("locale", view[0].locale);
                obj.set("memo", view[0].memo);
                obj.set("memo2", view[0].memo2);
                obj.set("bill_to", view[0].bill_to);
                obj.set("ship_to", view[0].ship_to);
                obj.set("contact", view[0].contact);

                self.setContact(view[0].contact);
                self.typeChanges();
            });

            this.recurringLineDS.query({
                filter:{ field: "transaction_id", value: id }
            }).then(function(){
                var view = self.recurringLineDS.view();
                self.lineDS.data([]);

                $.each(view, function(index, value){
                    self.lineDS.add({
                        transaction_id      : 0,
                        tax_item_id         : value.tax_item_id,
                        item_id             : value.item_id,
                        measurement_id      : value.measurement_id,
                        description         : value.description,
                        quantity            : value.quantity,
                        cost                : value.cost,
                        amount              : value.amount,
                        discount            : value.discount,
                        rate                : value.rate,
                        locale              : value.locale,
                        additional_cost     : value.additional_cost,
                        additional_applied  : value.additional_applied,
                        movement            : 1,

                        item                : value.item,
                        item_price          : value.item_price,
                        tax_item            : value.tax_item,
                        wht_account         : value.wht_account
                    });
                });

                self.changes();
            });

            //Account Line
            this.recurringAccountLineDS.query({
                filter: { field:"transaction_id", value:id },
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.recurringAccountLineDS.view();
                self.accountLineDS.data([]);

                $.each(view, function(index, value){
                    self.accountLineDS.add({
                        transaction_id      : 0,
                        tax_item_id         : value.tax_item_id,
                        account_id          : value.account_id,
                        description         : value.description,
                        reference_no        : value.reference_no,
                        segments            : value.segments,
                        amount              : value.amount,
                        rate                : value.rate,
                        locale              : value.locale,

                        tax_item            : value.tax_item,
                        wht_account         : value.wht_account
                    });
                });

                self.changes();
            });

            //Additional Cost Line
            this.recurringAdditionalCostDS.query({
                filter: [
                    { field:"reference_id", value:id },
                    { field:"is_recurring", value:1 }
                ],
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.recurringAdditionalCostDS.view();
                self.additionalCostDS.data([]);

                $.each(view, function(index, value){
                    self.additionalCostDS.add({
                        contact_id          : value.contact_id,
                        payment_term_id     : value.payment_term_id,
                        reference_id        : value.reference_id,
                        recurring_id        : value.recurring_id,
                        tax_item_id         : value.tax_item_id,
                        user_id             : value.user_id,
                        reference_no        : value.reference_no,
                        type                : value.type,//Required
                        sub_total           : value.sub_total,
                        amount              : value.amount,
                        tax                 : value.tax,
                        rate                : value.rate,
                        locale              : value.locale,
                        issued_date         : new Date(),
                        due_date            : new Date(),
                        bill_to             : value.bill_to,
                        ship_to             : value.ship_to,
                        memo                : value.memo,
                        memo2               : value.memo2,
                        status              : value.status,
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
    /* Invoice Section */
    banhji.transactionLine = kendo.observable({
        dataSource: dataStore(apiUrl + "journal_lines"),
        addById: function(transactionId, contactId, accountId, description, dr, cr, issuedDate) {
            // todo: create chart of accounts: water_sale_revenue(42610) & service_charge(42620) & maintenance(42630)
            // get from customer 
            this.dataSource.add({
                transaction_id: transactionId,
                account_id: accountId,
                contact_id: contactId,
                description: description,
                reference_no: "",
                job_id: "",
                segments: [],
                dr: dr,
                cr: cr,
                rate: banhji.source.getRate(banhji.locale, issuedDate),
                locale: banhji.locale
            });
        },
        save: function() {
            // customer account and Cash account
            var that = this,
                dfd = $.Deferred();
            this.dataSource.sync();
            this.dataSource.bind('requestEnd', function(e) {
                if (e.response && e.type != 'read') {
                    dfd.resolve(e.response.results);
                } else {
                    dfd.reject(false);
                }
            });
            this.dataSource.bind('error', function(e) {
                dfd.reject(false);
            });
            return dfd.promise();
        }
    });
    banhji.transaction = kendo.observable({
        dataSource: dataStore(apiUrl + "transactions"),
        makeInvoice: function(contactId, payment, amount, type, location, meterID) {
            var duedate = new Date(),
                dfd = $.Deferred();
            duedate.setDate(duedate.getDate() + 7);
 
            banhji.transaction.dataSource.insert(0, {
                contact_id: contactId, //Customer
                transaction_template_id: 3,
                payment_term_id: 0,
                reference_id: "",
                recurring_id: "",
                job_id: 0,
                location_id: location,
                user_id: banhji.userData.id,
                employee_id: "", //Sale Rep           
                type: type, //Required
                discount: 0,
                tax: 0,
                deposit: 0,
                amount: amount,
                sub_total: amount,
                payment_term_id: 5,
                meter_id: meterID,
                remaining: 0,
                credit_allowed: 0,
                rate: 1,
                locale: banhji.locale,
                issued_date: new Date(),
                due_date: duedate,
                bill_to: "",
                ship_to: "",
                memo: "",
                memo2: "",
                status: 0,
                segments: [],
                is_journal: 0,
                //Recurring
                recurring_name: "",
                start_date: new Date(),
                frequency: "Daily",
                month_option: "Day",
                interval: 1,
                day: 1,
                week: 0,
                month: 0,
                is_recurring: 0
            });
            if (banhji.transaction.dataSource.at(0)) {
                dfd.resolve(banhji.transaction.dataSource.at(0));
            } else {
                dfd.reject(false);
            }
            return dfd.promise();
        },
        save: function() {
            var that = this,
                dfd = $.Deferred();
            banhji.transaction.dataSource.sync();
            banhji.transaction.dataSource.bind('requestEnd', function(e) {
                if (e.response && e.type != 'read') {
                    dfd.resolve(e.response.results);
                } else {
                    dfd.reject(false);
                }
            });
            banhji.transaction.dataSource.bind('error', function(e) {
                dfd.reject(false);
            });
            return dfd.promise();
        }
    });

    /* End of Invoice Section */

    //End Customer
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
        //Water
        setting: new kendo.Layout("#setting", {
            model: banhji.setting
        }),
        waterCenter: new kendo.Layout("#waterCenter", {
            model: banhji.waterCenter
        }),
        property: new kendo.Layout("#property", {
            model: banhji.property
        }),
        purchase: new kendo.Layout("#purchase", {
            model: banhji.purchase
        }),
        meter: new kendo.Layout("#waterAddMeter", {
            model: banhji.meter
        }),
        ActivateMeter: new kendo.Layout("#ActivateMeter", {
            model: banhji.ActivateMeter
        }),
        plan: new kendo.Layout("#plan", {
            model: banhji.plan
        }),
        reading: new kendo.Layout("#Reading", {
            model: banhji.reading
        }),
        EditReading: new kendo.Layout("#EditReading", {
            model: banhji.EditReading
        }),
        customerDeposit: new kendo.Layout("#customerDeposit", {
            model: banhji.customerDeposit
        }),
        addLicense: new kendo.Layout("#addLicense", {
            model: banhji.addLicense
        }),
        addAccountingprefix: new kendo.Layout("#addAccountingprefix", {
            model: banhji.addAccountingprefix
        }),

        waterImport: new kendo.Layout("#waterImport", {
            model: banhji.waterImport
        }),
        runBill: new kendo.Layout("#runBill", {
            model: banhji.runBill
        }),
        printBill: new kendo.Layout("#printBill", {
            model: banhji.printBill
        }),
        InvoicePrint: new kendo.Layout("#InvoicePrint", {
            model: banhji.InvoicePrint
        }),

        Receipt: new kendo.Layout("#Receipt", {
            model: banhji.Receipt
        }),
        Reports: new kendo.Layout("#Reports", {
            model: banhji.Reports
        }),
        Reconcile: new kendo.Layout("#Reconcile", {
            model: banhji.reconcileVM
        }),
        Reorder: new kendo.Layout("#Reorder", {
            model: banhji.Reorder
        }),
        //custom form
        invoiceCustom: new kendo.Layout("#invoiceCustom", {
            model: banhji.invoiceCustom
        }),
        invoiceForm: new kendo.Layout("#invoiceForm", {
            model: banhji.invoiceCustom
        }),
        invoiceForm1: new kendo.Layout("#invoiceForm1", {
            model: banhji.invoiceCustom
        }),
        invoiceForm2: new kendo.Layout("#invoiceForm2", {
            model: banhji.invoiceCustom
        }),
        invoiceForm3: new kendo.Layout("#invoiceForm3", {
            model: banhji.invoiceCustom
        }),
        invoiceForm4: new kendo.Layout("#invoiceForm4", {
            model: banhji.invoiceCustom
        }),

        //Menu
        accountingMenu: new kendo.View("#accountingMenu", {
            model: langVM
        }),
        employeeMenu: new kendo.View("#employeeMenu", {
            model: langVM
        }),
        vendorMenu: new kendo.View("#vendorMenu", {
            model: langVM
        }),
        customerMenu: new kendo.View("#customerMenu", {
            model: langVM
        }),
        cashMenu: new kendo.View("#cashMenu", {
            model: langVM
        }),
        waterMenu: new kendo.View("#waterMenu", {
            model: langVM
        }),
        inventoryMenu: new kendo.View("#inventoryMenu", {
            model: langVM
        }),
        saleTaxMenu: new kendo.View("#saleTaxMenu", {
            model: langVM
        }),
        saleMenu: new kendo.View("#saleMenu", {
            model: langVM
        }),

        wDashBoard: new kendo.View("#wDashBoard", {
            model: banhji.wDashBoard
        }),
        customer: new kendo.Layout("#customer", {
            model: banhji.customer
        }),
        Backup: new kendo.Layout("#Backup", {
            model: banhji.Backup
        }),
        Offline: new kendo.Layout("#Offline", {
            model: banhji.Offline
        }),
        cashReAuto: new kendo.Layout("#cashReAuto", {
            model: banhji.cashReAuto
        }),
        //Report
        customerList: new kendo.Layout("#customerList", {
            model: banhji.customerList
        }),
        customerNoConnection: new kendo.Layout("#customerNoConnection", {
            model: banhji.customerNoConnection
        }),
        disconnectList: new kendo.Layout("#disconnectList", {
            model: banhji.disconnectList
        }),
        connectionList: new kendo.Layout("#connectionList", {
            model: banhji.connectionList
        }),
        to_be_connectionList: new kendo.Layout("#to_be_connectionList", {
            model: banhji.to_be_connectionList
        }),
        to_be_disconnectList: new kendo.Layout("#to_be_disconnectList", {
            model: banhji.to_be_disconnectList
        }),
        inactiveList: new kendo.Layout("#inactiveList", {
            model: banhji.inactiveList
        }),
        newCustomerList: new kendo.Layout("#newCustomerList", {
            model: banhji.newCustomerList
        }),
        miniUsageList: new kendo.Layout("#miniUsageList", {
            model: banhji.miniUsageList
        }),
        saleSummary: new kendo.Layout("#saleSummary", {
            model: banhji.saleSummary
        }),
        connectServiceRevenue: new kendo.Layout("#connectServiceRevenue", {
            model: banhji.connectServiceRevenue
        }),
        saleDetail: new kendo.Layout("#saleDetail", {
            model: banhji.saleDetail
        }),
        totalSale: new kendo.Layout("#totalSale", {
            model: banhji.totalSale
        }),
        fineCollect: new kendo.Layout("#fineCollect", {
            model: banhji.fineCollect
        }),
        discountReport: new kendo.Layout("#discountReport", {
            model: banhji.discountReport
        }),
        maintenanceReport: new kendo.Layout("#maintenanceReport", {
            model: banhji.maintenanceReport
        }),
        otherRevenues: new kendo.Layout("#otherRevenues", {
            model: banhji.otherRevenues
        }),
        accountReceivableList: new kendo.Layout("#accountReceivableList", {
            model: banhji.accountReceivableList
        }),
        totalBalance: new kendo.Layout("#totalBalance", {
            model: banhji.totalBalance
        }),
        agingSummary: new kendo.Layout("#agingSummary", {
            model: banhji.agingSummary
        }),
        customerDepositReport: new kendo.Layout("#customerDepositReport", {
            model: banhji.customerDepositReport
        }),
        agingDetail: new kendo.Layout("#agingDetail", {
            model: banhji.agingDetail
        }),
        customerBalanceSummary: new kendo.Layout("#customerBalanceSummary", {
            model: banhji.customerBalanceSummary
        }),
        customerBalanceDetail: new kendo.Layout("#customerBalanceDetail", {
            model: banhji.customerBalanceDetail
        }),
        cashReceiptSummary: new kendo.Layout("#cashReceiptSummary", {
            model: banhji.cashReceiptSummary
        }),
        cashReceiptSourceSummary: new kendo.Layout("#cashReceiptSourceSummary", {
            model: banhji.cashReceiptSourceSummary
        }),
        cashReceiptDetail: new kendo.Layout("#cashReceiptDetail", {
            model: banhji.cashReceiptDetail
        }),
        cashReceiptSourceDetail: new kendo.Layout("#cashReceiptSourceDetail", {
            model: banhji.cashReceiptSourceDetail
        }),
        cashReceiptbyuser: new kendo.Layout("#cashReceiptbyuser", {
            model: banhji.cashReceiptbyuser
        }),
        cashReceiptbyuserSummary: new kendo.Layout("#cashReceiptbyuserSummary", {
            model: banhji.cashReceiptbyuserSummary
        }),
        dailyCashReceipt: new kendo.Layout("#dailyCashReceipt", {
            model: banhji.dailyCashReceipt
        }),
        sale_power: new kendo.Layout("#sale_power", {
            model: banhji.sale_power
        }),
        imports: new kendo.Layout("#importView", {
            model: banhji.importView
        }),
        HeadMeter: new kendo.Layout("#HeadMeter", {
            model: banhji.HeadMeter
        }),
        AddHeadMeter: new kendo.Layout("#AddHeadMeter", {
            model: banhji.AddHeadMeter
        }),

        choeun: new kendo.Layout("#Choeun", {
            model: banhji.choeun
        }),

        waterInvoice: new kendo.Layout("#waterInvoice", {
            model: banhji.waterInvoice
        }),
        autoAddBallance: new kendo.Layout("#autoAddBallance", {
            model: banhji.autoAddBallance
        }),
        //
        itemAssembly: new kendo.Layout("#itemAssembly", {model: banhji.itemAssembly}),
        installmentReport: new kendo.Layout("#installmentReport", {model: banhji.installmentReport}),
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
        banhji.view.layout.showIn("#content", banhji.view.setting);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.setting;
        banhji.userManagement.addMultiTask("Setting", "setting", null);
        if (banhji.pageLoaded["setting"] == undefined) {
            banhji.pageLoaded["setting"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route('/setting', function() {
        banhji.view.layout.showIn("#content", banhji.view.setting);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.setting;
        banhji.userManagement.addMultiTask("Setting", "setting", null);
        if (banhji.pageLoaded["setting"] == undefined) {
            banhji.pageLoaded["setting"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route("/search_advanced", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            var vm = banhji.searchAdvanced;
            banhji.view.layout.showIn("#content", banhji.view.searchAdvanced);
            if (banhji.pageLoaded["search_advanced"] == undefined) {
                banhji.pageLoaded["search_advanced"] = true;
                vm.contactTypeDS.read();
            }
            vm.pageLoad();
        }
    });
     banhji.router.route("/add_license(/:id)", function(id) {
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        banhji.view.layout.showIn("#content", banhji.view.addLicense);
        banhji.userManagement.addMultiTask("Add Licence", "Licence", null);
        if (banhji.pageLoaded["add_license"] == undefined) {
            banhji.pageLoaded["add_license"] = true;
        }
        var vm = banhji.addLicense;
        vm.pageLoad(id);
    });
    /*************************
     *   Water Section   *
     **************************/

    /*************************
     *   Import Section   *
     **************************/
    banhji.router.route("/imports", function() {
        banhji.view.layout.showIn("#content", banhji.view.imports);
    });
    banhji.router.route("/choeun", function() {
        banhji.view.layout.showIn("#content", banhji.view.choeun);
    });

    banhji.router.route("/installment", function() {
        banhji.view.layout.showIn("#content", banhji.view.installmentReport);
    });
    checkRoleMG = function(){
        var role = banhji.userData.role;
        if(role == "2"){
            if(banhji.userData.roles.length == 1){
                if(banhji.userData.roles[0].name == "receipt"){
                    window.location.replace("<?php echo base_url(); ?>"+"cashier");
                }
            }
        }
    }
    checkRoleMG();
    checkError = function(){
        window.onerror = function(error) {
          // alert(langVM.alert_error);
          // alert(error);
        };
    }
    $(function() {
        
        banhji.accessMod.query({
            filter: {
                field: 'username',
                value: JSON.parse(localStorage.getItem('userData/user')).username
            }
        }).then(function(e) {
            var allowed = false;
            if (banhji.accessMod.data().length > 0) {
                for (var i = 0; i < banhji.accessMod.data().length; i++) {
                    if ("utibill" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            }
            if (!allowed) {
                window.location.replace(baseUrl + "admin");
                // banhji.view.layout.showIn("#content", banhji.view.wDashBoard);
            }
            $("#holdpageloadhide").css("display", "none");
        });
        banhji.source.contactDS.read().then(function() {
            banhji.router.start();
            // banhji.source.loadData();
            banhji.source.pageLoad();
        });

        function loadStyle(href) {
            // avoid duplicates
            for (var i = 0; i < document.styleSheets.length; i++) {
                if (document.styleSheets[i].href == href) {
                    return;
                }
            }
            var head = document.getElementsByTagName('head')[0];
            var link = document.createElement('link');
            link.rel = 'stylesheet';
            link.type = 'text/css';
            link.href = href;
            head.appendChild(link);
        }
        var Href1 = '<?php echo base_url(); ?>assets/water/winvoice-res.css';
        var Href2 = '<?php echo base_url(); ?>assets/water/winvoice-print.css';
    });
</script>