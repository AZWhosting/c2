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

    function itemEditor(container, options) {
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

    function itemPurchaseEditor(container, options) {
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

    function oneDigitMaskedTextboxEditor(container, options) {
        $('<input name="' + options.field + '" class="k-textbox" style="width: 95%;" />')
        .appendTo(container)
        .kendoMaskedTextBox({
            mask: "A",
            promptChar: "_"
        });;
    }

    function twoDigitMaskedTextboxEditor(container, options) {
        $('<input name="' + options.field + '" class="k-textbox" style="width: 95%;" />')
        .appendTo(container)
        .kendoMaskedTextBox({
            mask: "AA",
            promptChar: "_"
        });;
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
</script>
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
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
            banhji.wDashBoard.dashSource.read();
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
        supplierDS: dataStore(apiUrl + "contacts"),
        employeeDS: dataStore(apiUrl + "contacts"),
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
        pageLoad: function() {
            this.loadAccounts();
            // this.accountTypeDS.read();
            // this.loadTaxes();
            // this.loadJobs();
            this.loadSegmentItems();
            this.loadCurrencies();
            this.loadRates();
            this.loadPrefixes();
            this.loadTxnTemplates();

            // this.loadCategories();
            // this.loadItemGroups();
            // this.loadItems();
            // this.itemTypeDS.read();
            // this.loadItemPrices();
            // this.loadMeasurements();

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
    //-----------------------------------------
    banhji.Index = kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        lineDS              : dataStore(apiUrl + "item_lines"),
        assemblyLineDS      : dataStore(apiUrl + "item_lines"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "item_lines"),
        txnDS               : dataStore(apiUrl + "transactions"),
        balanceDS           : dataStore(apiUrl + "transactions/balance"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        assemblyDS          : dataStore(apiUrl + "item_prices"),
        wacDS               : dataStore(apiUrl + "items/weighted_average_costing"),
        itemsDS             : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "items",
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
            filter: [
                {
                    field: "is_system",
                    value: 0
                }
            ],
            sort: {
                field: "id",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 8
        }),
        employeeDS          : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "contacts",
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
            filter: [
                {
                    field: "contact_type_id",
                    value: 9
                }
            ],
            sort: {
                field: "id",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 4
        }),        
        customerItemsDS     : dataStore(apiUrl + "items/less", 9),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        referenceDS         : dataStore(apiUrl + "transactions"),
        referenceLineDS     : dataStore(apiUrl + "item_lines"),
        depositDS           : dataStore(apiUrl + "transactions"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        assemblyDS          : dataStore(apiUrl + "item_prices"),
        wacDS               : dataStore(apiUrl + "items/weighted_average_costing"),
        segmentDS           : dataStore(apiUrl + "segments"),
        segItemDS           : dataStore(apiUrl + "segments/item"),
        segmentItemDS       : dataStore(apiUrl + "segments/item"),
        segmentItemDS       : new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [
                { field: "segment_id", dir: "asc" },
                { field: "code", dir: "asc" }
            ]
        }),
        txnTemplateDS     : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{ field: "type", value: "Quote" }
        }),
        contactDS          : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "contacts",
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
            filter: [
                {
                    field: "contact_type_id",
                    value: 4
                }
            ],
            sort: {
                field: "id",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        categoryDS         : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "categories",
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
            filter: [
                {
                    field: "is_system",
                    value: 0
                }
            ],
            sort: {
                field: "id",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        paymentTermDS      : banhji.source.paymentTermDS,
        statusObj          : banhji.source.statusObj,
        amtDueColor        : banhji.source.amtDueColor,
        confirmMessage     : banhji.source.confirmMessage,
        frequencyList      : banhji.source.frequencyList,
        monthOptionList    : banhji.source.monthOptionList,
        monthList          : banhji.source.monthList,
        weekDayList        : banhji.source.weekDayList,
        dayList            : banhji.source.dayList,
        showMonthOption    : false,
        showMonth          : false,
        showWeek           : false,
        showDay            : false,
        obj                : null,
        category_id        : null,
        isEdit             : false,
        saveDraft          : false,
        saveClose          : false,
        savePrint          : false,
        saveRecurring      : false,
        showConfirm        : false,
        notDuplicateNumber : true,
        recurring          : "",
        recurring_validate : false,
        balance            : 0,
        total              : 0,
        user_id            : banhji.source.user_id,
        isVisible          : true,
        isEnabled          : true,
        pageLoad           : function(id){
            var x = banhji.userData.username;
            $("#userCut").text(x);
            if(id){
                this.set("isEdit", true);
                this.loadObj(id);
            }else{
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                }
            }
            if(JSON.parse(localStorage.getItem('userData/cashier_id')) > 0){
            }else{
                alert("You didn't have session yet.");
                window.location.href = "<?php echo base_url(); ?>wellnez/session";
            }
        },
        millisToMinutesAndSeconds: function(millis) {
            var minutes = Math.floor(millis / 60000);
            var seconds = ((millis % 60000) / 1000).toFixed(0);
            return minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
        },
        getItems        : function(){
            var self = this;
            var t0 = performance.now();
            this.itemsDS.query({
                take: 10,
                skip: 1,
                filter:{ field: "item_type_id <>", value: 3 },
                sort: [
                { field:"item_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
                ],
                group: []
            }).then(function(){
                
                $("#productPager").kendoPager({
                    dataSource: self.itemsDS,
                    buttonCount: 9
                });

                var items = self.itemsDS.view();
                var itemArr = [];

                for (var i = 0; i < 1; i ++){
                    itemArr.push({
                        id: items[i].id,
                        abbr: items[i].abbr,
                        category_id: items[i].category_id,
                        cost: items[i].cost,
                        dirty: items[i].dirty, 
                        expense_account_id: items[i].expense_account_id,
                        image_url: items[i].image_url,
                        income_account_id: items[i].income_account_id,
                        inventory_account_id: items[i].inventory_account_id,
                        item_type_id: items[i].item_type_id,
                        locale: items[i].locale,
                        measurement_id: items[i].measurement_id,
                        name: items[i].name,
                        number: items[i].number,
                        price: items[i].price,
                        uid: items[i].uid
                    });
                }

                var db = new Dexie("PosDB");

                db.version(1).stores({
                    items: "id,abbr,category_id,cost,dirty,expense_account_id,image_url,income_account_id,inventory_account_id,item_type_id,locale,measurement_id,name,number,price,uid"
                });

                db.items.bulkPut(itemArr).then(function(lastKey) {
                    var t1 = performance.now();
                    var timelapse = t1 - t0;
                    console.log("Time Spend " + self.millisToMinutesAndSeconds(timelapse) + " milliseconds.");
                    console.log("SUCCESS, Last item keys id was: " + lastKey); 
                }).catch(Dexie.BulkError, function (e) {
                    console.error ("ERROR, Some items did not succeed. However, " +
                                   100000-e.failures.length + " raindrops was added successfully");
                });
            });
        },
        getCustomerItemsDS: function(){
            var self = this;
            var t0 = performance.now();
            this.customerItemsDS.query({
                take: 5,
                skip: 1,
                filter:{ field: "item_type_id <>", value: 3 },
                sort: [
                { field:"item_type_id", dir:"asc" },
                { field:"number", dir:"asc" }
                ],
                group: []
            }).then(function(){
                
            });
        },
        onSelect      : function(e){
            var self = this, 
            files = e.files,
            obj = this.get("obj");
            $.each(files, function(index, value){
                if (value.extension.toLowerCase() === ".jpg"
                    || value.extension.toLowerCase() === ".jpeg"
                    || value.extension.toLowerCase() === ".tiff"
                    || value.extension.toLowerCase() === ".png" 
                    || value.extension.toLowerCase() === ".gif"
                    || value.extension.toLowerCase() === ".pdf"){

                    var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

                self.attachmentDS.add({
                    user_id        : self.get("user_id"),
                    transaction_id : obj.id,
                    type           : "Transaction",
                    name           : value.name,
                    description    : "",
                    key            : key,
                    url            : banhji.s3 + key,
                    size           : value.size,
                    created_at     : new Date(),
                    file           : value.rawFile
                });
                }else{
                    alert("This type of file is not allowed to attach.");
                }
            });
        },
        removeFile      : function(e){
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
            }
        },
        uploadFile      : function(){
            $.each(this.attachmentDS.data(), function(index, value){
                if(!value.id){
                    var params = { 
                        Body: value.file, 
                        Key: value.key 
                    };
                    bucket.upload(params, function (err, data) {

                    });
                }
            });

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e){

                if(e.type=="destroy"){
                    if(saved==false && e.response){
                        saved = true;

                        var response = e.response.results;
                        $.each(response, function(index, value){
                            var params = {

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
                            });
                        });
                    }
                }
            });
        },   
        //Contact
        setContact      : function(contact){
            var obj = this.get("obj");

            obj.set("contact", contact);
            this.contactChanges();
        },
        contactChanges    : function(){
            var self = this, obj = this.get("obj");

            if(obj.contact){
                var contact = obj.contact;

                obj.set("contact_id", contact.id);
                obj.set("payment_term_id", contact.payment_term_id);
                obj.set("locale", contact.locale);
                obj.set("bill_to", contact.bill_to);
                obj.set("ship_to", contact.ship_to);

                this.setRate();
                this.setTerm();
                this.loadBalance();
                this.jobDS.filter({ field:"contact_id", value: contact.id });
            }

            this.changes();
        },
        //Category
        setCategory      : function(category){
            var obj = this.get("obj");

            obj.set("category", category);
            this.categoryChanges();
        },
        itemGroupDS : dataStore(apiUrl + "items/group"),
        categorySelect    : function(e){
            var data = e.data;
            this.itemGroupDS.query({
                filter: {
                    field: "category_id",
                    value: data.id
                }
            });
        },
        groupSelect    : function(e){
            var data = e.data;
            this.itemsDS.filter({
                field: "item_group_id",
                value: data.id
            });
        },
        //Room
        roomDS       : dataStore(apiUrl + "utibills/room"),
        roomAR          : [],
        emSelect: true,
        supplierDS : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "contacts",
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
            filter: [
                {
                    field: "contact_type_id",
                    value: 6
                }
            ],
            sort: {
                field: "id",
                dir: "asc"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 4
        }),
        employeeAR : [],
        addEmployee: function(e){
            if(this.get("employeeSelected")){
                var name = e.sender.span[0].innerText;
                var id = this.get("employeeSelected");
                var h = 0;
                $.each(this.employeeAR, function(i,v){
                    if(v.id == id){
                        h = 1;
                    }
                });
                if(h != 1){
                    this.employeeAR.push({
                        id: id,
                        name: name
                    });
                    h = 0;
                }
            }
        },
        addRoom : function(e){
            if(this.get("roomSelected")){
                var name = e.sender.span[0].innerText;
                var id = this.get("roomSelected");
                var h = 0;
                $.each(this.roomAR, function(i,v){
                    if(v.id == id){
                        h = 1;
                    }
                });
                if(h != 1){
                    this.roomAR.push({
                        id: id,
                        name: name
                    });
                    h = 0;
                }
            }
        },
        rmRoom : function(e){
            var data = e.data;
            this.roomAR.remove(data);
        },
        rmEmployee : function(e){
            var data = e.data;
            this.employeeAR.remove(data);
        },
        customerAR : [],
        addCustomer : function(e){
            if(this.get("customerSelected")){
                var name = e.sender.span[0].innerText;
                var id = this.get("customerSelected");
                var h = 0;
                var IND = e.sender.selectedIndex - 1;
                this.set("invAccountID", this.contactDS.data()[IND].account_id);
                $.each(this.customerAR, function(i,v){
                    if(v.id == id){
                        h = 1;
                    }
                });
                if(h != 1){
                    this.customerAR.push({
                        id: id,
                        name: name
                    });
                    h = 0;
                }
            }
        },
        rmCustomer : function(e){
            var data = e.data;
            this.customerAR.remove(data);
        },
        selectEmployee : function(e){
            this.set("employeeSelect", "");
            this.set("supplierSelect", "");
            this.set("emSelect", true);
        },
        selectOutsource : function(e){
            this.set("employeeSelect", "");
            this.set("supplierSelect", "");
            this.set("emSelect", false);
        },
        selectCategory  : function(e){
        },
        toDay : new Date(),
        dateSelected: new Date(),
        setRate       : function(){
            var obj = this.get("obj"), 
            rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

            obj.set("rate", rate);

            $.each(this.lineDS.data(), function(index, value){
                var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
                value.set("rate", itemRate);
            });

            $.each(this.assemblyLineDS.data(), function(index, value){
                var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
                value.set("rate", itemRate);
            });
        },
        segmentChanges    : function(e) {
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
        addItem       : function(uid){
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
                { field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd HH:mm:ss") }
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
                        price       : kendo.parseFloat(view[0].price),
                        conversion_ratio: view[0].conversion_ratio, 
                        measurement   : view[0].measurement 
                    };
                    row.set("measurement", measurement);
                }
            });
        },
        addItemCatalog    : function(uid){
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
                        transaction_id    : obj.id,
                        tax_item_id     : 0,
                        item_id       : catalogItem.id,
                        measurement_id    : 0,
                        description     : catalogItem.sale_description,
                        quantity      : 1,
                        conversion_ratio  : 1,
                        cost        : catalogItem.cost * rate,
                        price         : 0,
                        amount        : 0,
                        discount      : 0,
                        rate        : rate,
                        locale        : catalogItem.locale,
                        movement      : 0,

                        discount_percentage : 0,
                        item        : catalogItem,
                        measurement     : { measurement_id:"", measurement:"" },
                        tax_item      : { id:"", name:"" }
                    });
                }
            });
        },
        addItemAssembly   : function(uid){
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
                            transaction_id    : obj.id,
                            item_id       : value.item_id,
                            assembly_id     : value.assembly_id,
                            measurement_id    : value.measurement_id,
                            description     : itemAssembly.sale_description,
                            quantity      : value.quantity,
                            conversion_ratio  : value.conversion_ratio,
                            cost        : itemAssembly.cost * rate,
                            price         : value.price * itemAssemblyRate,
                            amount        : value.price * itemAssemblyRate,
                            rate        : itemAssemblyRate,
                            locale        : value.locale,
                            movement      : 0,

                            item        : itemAssembly
                        });
                    });
                });
            }else{
                alert("Duplicate Item Assembly!");
                row.set("item_id", 0);
                row.set("item", { id:"", name:"" });
            }
        },
        invTax : 0,
        invDiscount: 0,
        invSubTotal: 0,
        invAmount: 0,
        invAccountID : 0,
        invLocale: banhji.institute.locale,
        changes       : function(){
            var self = this, obj = this.get("obj"),
                total = 0, subTotal = 0, discount =0, tax = 0, remaining = 0, amount_due = 0, itemIds = [];

            $.each(this.lineDS.data(), function(index, value) {
                var amt = value.quantity * value.price;
                subTotal += amt;

                //Discount by line
                if(value.discount>0){
                    amt -= value.discount;
                    discount += value.discount;
                }

                //Tax by line
                if(value.tax_item.id>0){
                    var taxAmount = amt * parseFloat(value.tax_item.rate);
                    tax += taxAmount;
                    value.set("tax", taxAmount);
                }else{
                    value.set("tax", 0);
                }

                value.set("amount", amt);

                if(value.item_id>0){
                    itemIds.push(value.item_id);
                }
            });

            //Total
            total = (subTotal + tax) - discount;

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
            obj.set("remaining", remaining);

            this.set("total", kendo.toString(total, "c", obj.locale));
            this.set("amount_due", kendo.toString(amount_due, "c", obj.locale));
            
            
            this.set("invTax", tax);
            this.set("invDiscount", discount);
            this.set("invSubTotal", subTotal);
            this.set("invAmount", total);

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
        lineDSChanges     : function(arg){
            console.log('lineDSChanges', arg.field);
            var self = banhji.pos;
            self.changes();

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
                }else if(arg.field=="quantity" || arg.field=="price" || arg.field=="discount"){
                    self.changes();
                }else if(arg.field=="measurement"){
                    var dataRow = arg.items[0];

                    dataRow.set("measurement_id", dataRow.measurement.measurement_id);
                    dataRow.set("price", dataRow.measurement.price * dataRow.rate);
                    dataRow.set("conversion_ratio", dataRow.measurement.conversion_ratio);
                }else if(arg.field=="discount_percentage"){
                    var dataRow = arg.items[0],
                    percentageAmount = dataRow.quantity * dataRow.price * dataRow.discount_percentage;

                    dataRow.set("discount", percentageAmount);
                }else if(arg.field=="tax_item"){
                    var dataRow = arg.items[0];

                    dataRow.set("tax_item_id", dataRow.tax_item.id);
                    dataRow.set("tax", 0);

                    self.changes();
                }
            }
        },
        //Number        
        checkExistingNumber   : function(){
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
            this.txnDS.query({
                filter:[
                    { field:"type", value:obj.type },
                    { field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
                    { field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
                ],
                sort: { field:"number", dir:"desc" },
                page:1,
                pageSize:1
            }).then(function(){
                var view = self.txnDS.view(),
                number = 0, str = "";
                if(view.length>0){
                    str = view[0].number;
                    str = str.substring(str.length-4, str.length);
                    number = kendo.parseInt(str);
                }
                number++;
                str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

                obj.set("number", str);
            });
        },
        setStatus       : function(){
            var self = this,
            obj = this.get("obj"), 
            statusObj = this.get("statusObj");
            statusObj.set("text", "");
            statusObj.set("date", "");
            statusObj.set("number", "");
            statusObj.set("url", "");
            switch(obj.status) {
                case 1:
                statusObj.set("text", "used");

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
                case 3:
                statusObj.set("text", "return");
                break;
                case 4:
                statusObj.set("text", "draft");
                break;
                default:
            }
        },
        loadObj       : function(id){
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

                    self.set("obj", view[0]);
                    self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));
                    self.set("amount_due", kendo.toString(view[0].amount - view[0].deposit, "c2", view[0].locale));         
                    self.setStatus();
                    self.loadDeposit();

                    self.lineDS.query({
                        filter: [
                        { field: "transaction_id", value: id },
                        { field: "assembly_id", value: 0 }
                        ],
                    });

                    self.assemblyLineDS.filter([
                                               { field: "transaction_id", value: id },
                                               { field: "assembly_id >", value: 0 }
                                               ]);

                    self.journalLineDS.filter({ field: "transaction_id", value: id });
                    self.attachmentDS.filter({ field: "transaction_id", value: id });

              //Segment
                    var segments = [];
                    $.each(view[0].segments, function(index, value){
                        segments.push(value);
                    });
                    self.segmentItemDS.filter({ field: "id", operator:"where_in", value: segments });

              //References
                    if(view[0].references.length>0){
                        $.each(view[0].references, function(index, value){
                            referenceIds.push(value);
                        });

                        self.referenceDS.query({
                            filter:{ field: "id", operator:"where_in", value: referenceIds }
                        }).then(function(){
                            var reference = self.referenceDS.view();

                            self.set("referenceList", reference);
                        });
                    }else{
                        self.loadReference();
                    }
                });
            }
        },
        addEmpty      : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.assemblyLineDS.data([]);
            this.depositDS.data([]);
            this.journalLineDS.data([]);
            this.attachmentDS.data([]);
            this.referenceDS.data([]);
            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);
            this.set("total_deposit", 0);
            this.set("amount_due", 0);
            this.set("amtDueColor", banhji.source.amtDueColor);
            this.set("referenceList", []);
            this.dataSource.insert(0, {
                transaction_template_id: 10,
                contact_id      : "",//Customer
                payment_method_id : 0,
                reference_id    : "",
                recurring_id    : "",
                account_id      : 1,
                discount_account_id : 0,
                job_id        : 0,
                user_id       : this.get("user_id"),
                employee_id     : "",//Sale Rep
                type        : "Commercial_Cash_Sale",//Required
                number        : "",
                sub_total       : 0,
                discount      : 0,
                tax         : 0,
                amount        : 0,
                deposit       : 0,
                remaining       : 0,
                credit_allowed    : 0,
                credit        : 0,
                check_no      : "",
                rate        : 1,
                locale        : banhji.locale,
                issued_date     : new Date(),
                bill_to       : "",
                ship_to       : "",
                memo        : "",
                memo2         : "",
                status        : 0,
                references      : [],
                segments      : [],
                is_journal      : 1,
                //Recurring
                recurring_name    : "",
                start_date      : new Date(),
                frequency       : "Daily",
                month_option    : "Day",
                interval      : 1,
                day         : 1,
                week        : 0,
                month         : 0,
                is_recurring    : 0,
                contact       : { id:"", name:"" }
            });
            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            this.setRate();
            this.generateNumber();
        },
        averageCostDS : dataStore(apiUrl + "items/weighted_average_costing"),
        addRow        : function(e){
            $("#loadImport").css("display", "block");
            var obj = this.get("obj");
            var item = e.data;
            var self = this;
            this.averageCostDS.query({
                filter:[
                    { field:"item_id", value: item.id },
                    { field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(this.get("dateSelected")),"yyyy-MM-dd HH:mm:ss") }
                ]
            }).then(function(e){
                var view = self.averageCostDS.view();
                var rate = banhji.source.getRate(item.locale, self.get("dateSelected"));
                var cost = view[0].cost * rate;
                var price = item.price / rate;
                self.lineDS.add({
                    transaction_id      : obj.id,
                    tax_item_id         : "",
                    item_id             : "",
                    assembly_id         : 0,
                    measurement_id      : 0,
                    description         : "",
                    quantity            : 1,
                    conversion_ratio    : 0,
                    cost                : item.cost,
                    price               : price,
                    amount              : price,
                    avarage_cost        : cost,
                    discount            : 0,
                    rate                : rate,
                    locale              : item.locale,
                    movement            : 0,
                    discount_percentage : 0,
                    item                : { 
                        id:item.id, 
                        name:item.name , 
                        item_type_id: item.item_type_id
                    },
                    measurement         : item.measurement,
                    tax_item            : { id:"", name:"" }
                });
                self.changes();
                $("#loadImport").css("display", "none");
            });
        },
        addExtraRow     : function(uid){
            var row = this.lineDS.getByUid(uid),
            index = this.lineDS.indexOf(row);

            if(index==this.lineDS.total()-1){
                this.addRow();
            }
        },
        removeEmptyRow    : function(){
            var raw = this.lineDS.data();
            var item, i;
            for(i=raw.length-1; i>=0; i--){
                item = raw[i];

                if (item.item_id==0) {
                    this.lineDS.remove(item);
                }
            }
        },
        //Journal
        addJournal      : function(transaction_id){
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

            //COGS on Dr
                if(item.item_type_id==1){
                    var cogsID = kendo.parseInt(item.expense_account_id);
                    if(cogsID>0){
                        raw = "dr"+cogsID;

                        var cogsAmount = value.amount;
                        if(item.item_type_id==1 || item.item_type_id==4){
                            cogsAmount = (value.quantity*value.conversion_ratio)*value.cost;
                        }

                        if(entries[raw]===undefined){
                            entries[raw] = {
                                transaction_id    : transaction_id,
                                account_id      : cogsID,
                                contact_id      : obj.contact_id,
                                description     : value.description,
                                reference_no    : "",
                                segments      : obj.segments,
                                dr          : cogsAmount * value.rate,
                                cr          : 0,
                                rate        : value.rate,
                                locale        : item.locale
                            };
                        }else{
                            entries[raw].dr += cogsAmount;
                        }
                    }
                }

            //Inventory on Cr
                var inventoryID = kendo.parseInt(item.inventory_account_id);
                if(inventoryID>0){
                    raw = "cr"+inventoryID;

                    var inventoryAmount = value.amount;
                    if(item.item_type_id==1 || item.item_type_id==4){
                        inventoryAmount = (value.quantity*value.conversion_ratio)*value.cost;
                    }

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id    : transaction_id,
                            account_id      : inventoryID,
                            contact_id      : obj.contact_id,
                            description     : value.description,
                            reference_no    : "",
                            segments      : obj.segments,
                            dr          : 0,
                            cr          : inventoryAmount * value.rate,
                            rate        : value.rate,
                            locale        : item.locale
                        };
                    }else{
                        entries[raw].cr += inventoryAmount;
                    }
                }

            //Sale on Cr
                var incomeID = kendo.parseInt(item.income_account_id);
                if(incomeID>0){
                    raw = "cr"+incomeID;

                    var saleAmount = value.quantity * value.price;
                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id    : transaction_id,
                            account_id      : incomeID,
                            contact_id      : obj.contact_id,
                            description     : value.description,
                            reference_no    : "",
                            segments      : obj.segments,
                            dr          : 0,
                            cr          : saleAmount,
                            rate        : obj.rate,
                            locale        : obj.locale
                        };
                    }else{
                        entries[raw].cr += value.amount;
                    }
                }

            //Tax on Cr
                if(value.tax_item_id>0){
                    var taxItem = value.tax_item,
                    raw = "cr"+taxItem.account_id;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id    : transaction_id,
                            account_id      : taxItem.account_id,
                            contact_id      : obj.contact_id,
                            description     : value.description,
                            reference_no    : "",
                            segments      : obj.segments,
                            dr          : 0,
                            cr          : value.tax,
                            rate        : obj.rate,
                            locale        : obj.locale
                        };
                    }else{
                        entries[raw].cr += taxAmt;
                    }
                }
            });

          //Assembly Item
            $.each(this.assemblyLineDS.data(), function(index, value){
                var item = value.item;

            //COGS on Dr
                if(item.item_type_id==1){
                    var cogsID = kendo.parseInt(item.expense_account_id);
                    if(cogsID>0){
                        raw = "dr"+cogsID;

                        var cogsAmount = value.amount;
                        if(item.item_type_id==1 || item.item_type_id==4){
                            cogsAmount = (value.quantity*value.conversion_ratio)*value.cost;
                        }

                        if(entries[raw]===undefined){
                            entries[raw] = {
                                transaction_id    : transaction_id,
                                account_id      : cogsID,
                                contact_id      : obj.contact_id,
                                description     : value.description,
                                reference_no    : "",
                                segments      : obj.segments,
                                dr          : cogsAmount * value.rate,
                                cr          : 0,
                                rate        : value.rate,
                                locale        : item.locale
                            };
                        }else{
                            entries[raw].dr += cogsAmount;
                        }
                    }
                }

            //Inventory on Cr
                var inventoryID = kendo.parseInt(item.inventory_account_id);
                if(inventoryID>0){
                    raw = "cr"+inventoryID;

                    var inventoryAmount = value.amount;
                    if(item.item_type_id==1 || item.item_type_id==4){
                        inventoryAmount = (value.quantity*value.conversion_ratio)*value.cost;
                    }

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id    : transaction_id,
                            account_id      : inventoryID,
                            contact_id      : obj.contact_id,
                            description     : value.description,
                            reference_no    : "",
                            segments      : obj.segments,
                            dr          : 0,
                            cr          : inventoryAmount * value.rate,
                            rate        : value.rate,
                            locale        : item.locale
                        };
                    }else{
                        entries[raw].cr += inventoryAmount;
                    }
                }
            });

          //Obj Account, Cash on Dr
            var objAccountID = kendo.parseInt(obj.account_id);
            if(objAccountID>0){
                raw = "dr"+objAccountID;

                var objAmount = obj.amount - obj.deposit;
                if(entries[raw]===undefined){
                    entries[raw] = {
                        transaction_id    : transaction_id,
                        account_id      : objAccountID,
                        contact_id      : obj.contact_id,
                        description     : obj.memo,
                        reference_no    : obj.reference_no,
                        segments      : obj.segments,
                        dr          : objAmount,
                        cr          : 0,
                        rate        : obj.rate,
                        locale        : obj.locale
                    };
                }else{
                    entries[raw].dr += objAmount;
                }
            }

          //Discount on Dr      
            if(obj.discount > 0){
                var discountAccountId = kendo.parseInt(obj.discount_account_id);
                if(discountAccountId>0){
                    raw = "dr"+discountAccountId;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id    : transaction_id,
                            account_id      : discountAccountId,
                            contact_id      : obj.contact_id,
                            description     : obj.memo,
                            reference_no    : obj.reference_no,
                            segments      : obj.segments,
                            dr          : obj.discount,
                            cr          : 0,
                            rate        : obj.rate,
                            locale        : obj.locale
                        };
                    }else{
                        entries[raw].dr += obj.discount;
                    }
                }
            }

          //Deposit on Dr
            if(obj.deposit > 0){
                var depositAccountId = kendo.parseInt(contact.deposit_account_id);
                if(depositAccountId>0){
                    raw = "dr"+depositAccountId;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id    : transaction_id,
                            account_id      : depositAccountId,
                            contact_id      : obj.contact_id,
                            description     : obj.memo,
                            reference_no    : obj.reference_no,
                            segments      : obj.segments,
                            dr          : obj.deposit,
                            cr          : 0,
                            rate        : obj.rate,
                            locale        : obj.locale
                        };
                    }else{
                        entries[raw].dr += obj.deposit;
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
        removeRow       : function(e){
            var data = e.data;
            this.lineDS.remove(data);
            this.changes();
        },
        addDeposit      : function(id){
            var obj = this.get("obj");

            this.depositDS.data([]);

            if(obj.deposit>0){
                this.depositDS.add({
                    contact_id      : obj.contact_id,
                    reference_id    : id,
                    user_id       : this.get("user_id"),
                    type        : "Customer_Deposit",
                    amount        : obj.deposit*-1,
                    rate        : obj.rate,
                    locale        : obj.locale,
                    issued_date     : obj.issued_date
                });
            }
        },
        saveDeposit     : function(id){
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
        payCash                 : function(e){
            var self = this, obj = this.get("obj"), segments = [];

            obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
            obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));

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

            //Reference
            var referenceIds = [];
            $.each(this.get("referenceList"), function(index, value){
                referenceIds.push(value.id);
            });
            obj.set("references", referenceIds);
            this.referenceDS.sync();

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
                    self.saveDeposit(data[0].id);
                }

                self.lineDS.sync();
                self.assemblyLineDS.sync();
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
        payPopup           : function(){
            this.payVisible = this.payVisible == true ? false : true;
            console.log('payVisible', this.payVisible);
            $("#dialog").kendoWindow({
                title: "",
                width: "70%",
                height: "50%",
                actions: [ "close" ],
                draggable: false,
                resizable: false,
                modal: true,
                visible: false,
                modal: true
            });


            var dialog = $("#dialog").getKendoWindow();
            dialog.open();
            dialog.center();
        },
        objSync       : function(){
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
        save        : function(){
            var self = this, obj = this.get("obj");

            obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
            obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));


            if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
                alert("Over credit allowed!");
            }

            this.removeEmptyRow();


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

                    //Assembly Item line
                    $.each(self.assemblyLineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });

                    //Attachment
                    $.each(self.attachmentDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                    });
                } 

                self.lineDS.sync();
                self.assemblyLineDS.sync();
                self.uploadFile();

                return data;
            }, function(reason) { //Error
                $("#ntf1").data("kendoNotification").error(reason);
            }).then(function(result){
                $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);
                if(self.get("saveDraft") || self.get("saveClose")){
                    self.set("saveDraft", false);
                    self.set("saveClose", false);
                    self.cancel();
                }else if(self.get("savePrint")){
                    self.set("savePrint", false);
                    self.clear();
                    if(result[0].transaction_template_id>0){
                        banhji.router.navigate("/invoice_form/"+result[0].id);
                    }
                }else{
                    self.addEmpty();
                }
            });
        },
        clear         : function(){
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();
            this.assemblyLineDS.cancelChanges();
            this.attachmentDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.assemblyLineDS.data([]);
            this.attachmentDS.data([]);

            banhji.userManagement.removeMultiTask("quote");
        },
        cancel        : function(){
            this.clear();
            window.history.back();
        },
        delete        : function(){
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
        workDS : dataStore(apiUrl + "spa/work"),
        addInvoice : function(e){
            var self = this;
            if(this.lineDS.data().length > 0){
                if(this.employeeAR.length > 0){
                    if(this.roomAR.length > 0){
                        if(this.customerAR.length >0){
                            if(this.get("dateSelected")){
                                $("#loadImport").css("display", "block");
                                var rate = banhji.source.getRate(this.get("invLocale"), new Date(this.get("dateSelected")));
                                this.workDS.data([]);
                                this.workDS.add({
                                    items : this.lineDS.data(),
                                    employee : this.employeeAR,
                                    room : this.roomAR,
                                    customer : this.customerAR,
                                    date : this.get("dateSelected"),
                                    amount : this.get("invAmount"),
                                    tax : this.get("invTax"),
                                    sub_total : this.get("invSubTotal"),
                                    discount : this.get("invDiscount"),
                                    locale : this.get("invLocale"),
                                    rate : rate,
                                    account_id : 7,
                                    contact_id : this.customerAR[0].id,
                                    phone: this.get("customerPhone")
                                });
                                this.workDS.sync();
                                this.workDS.bind("requestEnd", function(e){
                                    self.addWorkSuccess();
                                    $("#loadImport").css("display", "none");
                                });
                            }else{
                                this.alertRequiredMSG();
                            }
                        }else{
                            this.alertRequiredMSG();
                        }
                    }else{
                        this.alertRequiredMSG();
                    }
                }else{
                    this.alertRequiredMSG();
                }
            }else{
                this.alertRequiredMSG();
            }
        },
        alertRequiredMSG: function(){
           var noti = $("#ntf1").data("kendoNotification");
                noti.hide();
                noti.error(this.lang.lang.error_input);
        },
        addWorkSuccess: function(){
            var noti = $("#ntf1").data("kendoNotification");
                noti.hide();
                noti.success(this.lang.lang.success_message);
            this.lineDS.data([]);
            this.employeeAR = [];
            this.roomAR = [];
            this.customerAR = [];
            this.changes();
            this.set("dateSelected", new Date());
        },
        catChange: function(e){
            if(this.get("catSelected")){
                this.itemsDS.filter({field: "category_id", value: this.get("catSelected")});
                this.itemGroupDS.filter({field: "category_id", value: this.get("catSelected")});
            }else{
                this.itemsDS.filter({field: "deleted", value: 0});
            }
        },
        groupChange: function(e){
            if(this.get("groupSelected")){
                this.itemsDS.filter({field: "item_group_id", value: this.get("groupSelected")});
            }else{
                this.itemsDS.filter({field: "deleted", value: 0});
            }
        },
        search: function() {
            var self = this,
                para = [],
                searchText = this.get("searchText");
            if (searchText) {
                var textParts = searchText.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);
                para.push(
                    {
                        field: "name",
                        operator: "like",
                        value: searchText
                    },
                    {
                        field: "abbr",
                        operator: "or_where",
                        value: searchText
                    }
                );
                if(textParts[1]){
                    para.push({
                        field: "number",
                        operator: "or_where",
                        value: textParts[1]
                    });
                }
            }
            this.itemsDS.filter(para);
        },
        bookDS : dataStore(apiUrl + "spa/book"),
        addBook : function(e){
            var self = this;
            if(this.lineDS.data().length > 0){
                if(this.employeeAR.length > 0){
                    if(this.roomAR.length > 0){
                        if(this.customerAR.length >0){
                            if(this.get("dateSelected")){
                                $("#loadImport").css("display", "block");
                                var rate = banhji.source.getRate(this.get("invLocale"), new Date(this.get("dateSelected")));
                                this.bookDS.add({
                                    items : this.lineDS.data(),
                                    employee : this.employeeAR,
                                    room : this.roomAR,
                                    customer : this.customerAR,
                                    date : this.get("dateSelected"),
                                    amount : this.get("invAmount"),
                                    tax : this.get("invTax"),
                                    sub_total : this.get("invSubTotal"),
                                    discount : this.get("invDiscount"),
                                    locale : this.get("invLocale"),
                                    rate : rate,
                                    phone : this.get("customerPhone"),
                                    account_id : 7,
                                    contact_id : this.customerAR[0].id
                                });
                                var f = 0;
                                this.bookDS.sync();
                                this.bookDS.bind("requestEnd", function(e){
                                    self.addWorkSuccess();
                                    $("#loadImport").css("display", "none");
                                    if(f == 0){
                                        self.bookDS.query();
                                    }
                                    f = 1;
                                });
                            }else{
                                this.alertRequiredMSG();
                            }
                        }else{
                            this.alertRequiredMSG();
                        }
                    }else{
                        this.alertRequiredMSG();
                    }
                }else{
                    this.alertRequiredMSG();
                }
            }else{
                this.alertRequiredMSG();
            }
        },
        editBook: function(e){
            var data = e.data;
            var self = this;
            console.log(data);
            //Customer
            $.each(data.customer_ar, function(i,v){
                self.customerAR.push(v);
            });
            //Employee
            $.each(data.employee_ar, function(i,v){
                self.employeeAR.push(v);
            });
            //Room
            $.each(data.room_ar, function(i,v){
                self.roomAR.push(v);
            });
            //Item
            $.each(data.items, function(i,v){
                self.lineDS.add({
                    tax_item_id         : v.tax_item_id,
                    item_id             : v.item_id,
                    assembly_id         : v.assembly_id,
                    measurement_id      : v.measurement_id,
                    description         : v.description,
                    quantity            : v.quantity,
                    conversion_ratio    : v.conversion_ratio,
                    cost                : v.cost,
                    price               : v.price,
                    amount              : v.amount,
                    avarage_cost        : v.avarage_cost,
                    discount            : v.discount,
                    rate                : v.rate,
                    locale              : v.locale,
                    movement            : v.movement,
                    discount_percentage : 0,
                    item                : { 
                        id: v.item_id, 
                        name: v.item_name, 
                        item_type_id: v.item_type_id},
                    measurement         : {
                        measurement_id : v.measurement_id,
                        measurement : v.measurement_name
                    },
                    tax_item            : { 
                        id: v.tax_item_id, 
                        name: v.tax_item_name 
                    }
                });
            });
            this.set("dateSelected", new Date(data.date));
            this.set("customerPhone", data.phone);
        },
        today   : new Date()
    });
    banhji.loyaltyCenter = kendo.observable({
        lang                : langVM,
        transactionDS       : dataStore(apiUrl + 'transactions'),
        noteDS              : dataStore(apiUrl + 'notes'),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        txnDS               : dataStore(apiUrl + "transactions"),
        currencyDS          : new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: { field:"status", value: 1 }
        }),
        contactTypeDS       : new kendo.data.DataSource({
            data: banhji.source.contactTypeList,
            filter: { field:"parent_id", value: 1 }//Customer
        }),
        contactDS           : new kendo.data.DataSource({
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
            filter:{ field:"parent_id", operator:"where_related_contact_type", value:1 },
            sort:{ field:"number", dir:"asc" },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        sortList            : banhji.source.sortList,
        sorter              : "all",
        sdate               : "",
        edate               : "",
        obj                 : null,
        note                : "",
        searchText          : "",
        contact_type_id     : null,
        currency_id         : 0,
        balance             : 0,
        deposit             : 0,
        outInvoice          : 0,
        overInvoice         : 0,
        currencyCode        : "",
        user_id             : banhji.source.user_id,
        pageLoad            : function(id){
            if(id){
                this.loadObj(id);
            }

            //Refresh
            if(this.contactDS.total()>0){
                this.contactDS.fetch();
                this.searchTransaction();
                this.loadSummary();
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
        setCurrencyCode     : function(){
            var code = "", obj = this.get("obj");

            $.each(banhji.source.currencyDS.data(), function(index, value){
                if(value.locale == obj.locale){
                    code = value.code;

                    return false;
                }
            });

            this.set("currencyCode", code);
        },
        //Obj
        loadObj             : function(id){
            var self = this;

            this.contactDS.query({
                filter: { field:"id", value:id},
                page:1,
                pageSize:100
            }).then(function(){
                var view = self.contactDS.view();

                if(view.length>0){
                    self.set("obj", view[0]);
                    self.loadData();
                }
            });
        },
        loadData            : function(){
            var obj = this.get("obj");

            if(obj!==null){
                this.searchTransaction();
                this.loadSummary();
                this.setCurrencyCode();

                this.attachmentDS.query({
                    filter:{ field:"contact_id", value: obj.id },
                    page: 1,
                    pageSize:10
                });
                this.noteDS.query({
                    filter: { field:"contact_id", value: obj.id },
                    sort: { field:"noted_date", dir:"desc" },
                    page: 1,
                    pageSize: 10
                });
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

                        var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

                        self.attachmentDS.add({
                            user_id         : self.get("user_id"),
                            contact_id      : obj.id,
                            type            : "Contact",
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
        //Summary
        loadContact         : function(id){
            var self = this;
            
            this.contactDS.query({
                filter:[
                    { field:"id", value:id }
                ],
                page: 1,
                pageSize: 50
            }).then(function(e) {
                var view = self.contactDS.data();
                
                if(view.length>0){
                    self.set("obj", view[0]);
                    self.loadData();
                }
            });
        },
        loadSummary         : function(){
            var self = this, obj = this.get("obj");

            if(obj!==null){
                this.txnDS.query({
                    filter: [
                        { field:"contact_id", value: obj.id },
                        { field:"type", operator:"where_in", value: ["Customer_Deposit", "Commercial_Invoice", "Vat_Invoice", "Invoice"] },
                        { field:"status", operator:"where_in", value: [0,2] }
                    ],
                    sort: { field: "issued_date", dir: "desc" },
                    page: 1,
                    pageSize: 1000
                }).then(function(){
                    var view = self.txnDS.view(),
                    deposit = 0, open = 0, over = 0, balance = 0, today = new Date();

                    $.each(view, function(index, value){
                        if(value.type=="Customer_Deposit"){
                            deposit += kendo.parseFloat(value.amount);
                        }else{
                            balance += kendo.parseFloat(value.amount) - (kendo.parseFloat(value.deposit) + value.amount_paid);
                            open++;

                            if(new Date(value.due_date)<today){
                                over++;
                            }
                        }
                    });
                    
                    self.set("deposit", kendo.toString(deposit, obj.locale=="km-KH"?"c0":"c", obj.locale));
                    self.set("outInvoice", kendo.toString(open, "n0"));
                    self.set("overInvoice", kendo.toString(over, "n0"));
                    self.set("balance", kendo.toString(balance, obj.locale=="km-KH"?"c0":"c", obj.locale));
                });
            }
        },
        loadBalance         : function(){
            var obj = this.get("obj");

            if(obj!==null){
                this.transactionDS.query({
                    filter: [
                        { field:"contact_id", value: obj.id },
                        { field:"type", operator:"where_in", value:["Commercial_Invoice", "Vat_Invoice", "Invoice"] },
                        { field:"status", operator:"where_in", value: [0,2] }
                    ],
                    sort: [
                        { field: "issued_date", dir: "desc" },
                        { field: "id", dir: "desc" }
                    ],
                    page: 1,
                    pageSize: 10
                });
            }
        },
        loadDeposit         : function(){
            var obj = this.get("obj");

            if(obj!==null){
                this.transactionDS.query({
                    filter: [
                        { field:"contact_id", value: obj.id },
                        { field:"type", value:"Customer_Deposit" }
                    ],
                    sort: [
                        { field: "issued_date", dir: "desc" },
                        { field: "id", dir: "desc" }
                    ],
                    page: 1,
                    pageSize: 10
                });
            }
        },
        loadOverInvoice     : function(){
            var obj = this.get("obj");

            if(obj!==null){
                this.transactionDS.query({
                    filter: [
                        { field:"contact_id", value: obj.id },
                        { field:"type", operator:"where_in", value: ["Commercial_Invoice", "Vat_Invoice", "Invoice"] },
                        { field:"status", operator:"where_in", value: [0,2] },
                        { field:"due_date <", value: kendo.toString(new Date(), "yyyy-MM-dd") }
                    ],
                    sort: [
                        { field: "issued_date", dir: "desc" },
                        { field: "id", dir: "desc" }
                    ],
                    page: 1,
                    pageSize: 10
                });
            }
        },  
        selectedRow         : function(e){
            var data = e.data;
            
            this.set("obj", data);
            this.loadData();
        },
        //Search
        enterSearch         : function(e){
            e.preventDefault();

            this.search();
        },
        search              : function(){
            var self = this, 
            para = [],
            searchText = this.get("searchText"),
            contact_type_id = this.get("contact_type_id");
            
            if(searchText){
                var textParts = searchText.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);

                para.push(
                    { field: "abbr", value: textParts[0] },
                    { field: "number", value: textParts[1] },
                    { field: "name", operator: "or_like", value: searchText }
                );
            }

            if(contact_type_id){
                para.push({ field: "contact_type_id", value: contact_type_id });
            }else{
                para.push({ field: "parent_id", operator:"where_related_contact_type", value: 1 });
            }

            this.contactDS.filter(para);
            
            //Clear search filters
            self.set("searchText", "");
            self.set("contact_type_id", 0);
        },
        searchTransaction   : function(){
            var self = this,
                start = this.get("sdate"),
                end = this.get("edate"),
                para = [], obj = this.get("obj");

            if(obj!==null){
                para.push({ field:"contact_id", value: obj.id });
            
                //Dates
                if(start && end){
                    start = new Date(start);
                    end = new Date(end);
                    end.setDate(end.getDate()+1);

                    para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
                    para.push({ field:"issued_date <=", value: kendo.toString(end, "yyyy-MM-dd") });
                }else if(start){
                    start = new Date(start);
                    para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
                }else if(end){
                    end = new Date(end);
                    end.setDate(end.getDate()+1);
                    para.push({ field:"issued_date <=", value: kendo.toString(end, "yyyy-MM-dd") });
                }else{}

                this.transactionDS.query({
                    filter: para,
                    sort: { field: "issued_date", dir: "desc" },
                    page: 1,
                    pageSize: 10
                });
            }
        },
        //Links         
        goEdit              : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/customer/'+obj.id);
            }
        },
        goReference         : function(e){
            var self = this, data = e.data;

            this.txnDS.query({
                filter:{ field:"id", value:data.reference_id}
            }).then(function(){
                var view = self.txnDS.view();

                banhji.router.navigate('/' + view[0].type.toLowerCase() +'/'+ data.reference_id);
            });
        },
        goQuote             : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/quote');
                banhji.quote.setContact(obj);
            }
        },
        goDeposit           : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/customer_deposit');
                banhji.customerDeposit.setContact(obj);
            }
        },
        goSaleOrder         : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/sale_order');
                banhji.saleOrder.setContact(obj);
            }
        },
        goCashSale          : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/cash_sale');
                banhji.cashSale.setContact(obj);
            }
        },
        goInvoice           : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/invoice');
                banhji.invoice.setContact(obj);
            }
        },
        goGDN               : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/gdn');
                banhji.gdn.setContact(obj);
            }
        },
        goSaleReturn        : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/sale_return');
                banhji.saleReturn.setContact(obj);
            }
        },
        goStatement         : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/statement');
                banhji.statement.loadContact(obj.id);
            }
        },
        goCashRefound       : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/cash_refund');
                banhji.cashRefund.setContact(obj);
            }
        },
        goCashReceipt       : function(){
            var obj = this.get("obj");

            if(obj!==null){
                banhji.router.navigate('/cash_receipt');
                banhji.cashReceipt.loadContact(obj.id);
            }
        },
        payInvoice          : function(e){
            var data = e.data;

            if(obj!==null){
                banhji.router.navigate('/cash_receipt');
                banhji.cashReceipt.loadInvoice(data.id);
            }
        },
        //Note
        saveNoteEnter       : function(e){
            e.preventDefault();
            this.saveNote();
        },
        saveNote            : function(){
            var obj = this.get("obj");

            if(obj!==null && this.get("note")!==""){
                this.noteDS.insert(0, {
                    contact_id  : obj.id,
                    note        : this.get("note"),
                    noted_date  : new Date(),
                    created_by  : this.get("user_id"),

                    creator     : ""
                });

                this.noteDS.sync();
                this.set("note", "");
            }else{
                alert("Please select a customer and Memo is required");
            }
        }
    });
    banhji.Loyalty = kendo.observable({
        lang        : langVM,
        dataSource  : dataStore(apiUrl + "spa/loyalty"),
        baseAR      : [
            {id: 1, name: 'Promotion'},
            {id: 2, name: 'Point'}
        ],
        tapeAR   : [
            {id: 1, name: 'Fixed'},
            {id: 2, name: 'Variant'}
        ],
        pageLoad    : function(id){
            if(id){
                this.loadObj(id);
            }else{
                this.addEmpty();
            }
        },
        obj         : null,
        payrollobj  : null,
        statusDS  : [
            {id: 0, value: "inactive"},
            {id: 1, value: "active"}
        ],
        genderDS  : [
            {id: "M", value: "Male"},
            {id: "F", value: "Female"}
        ],
        userDS : banhji.userDS,
        addEmpty                : function(){
            this.dataSource.data([]);
            this.set("obj", null);
            this.dataSource.insert(0, {
                "name"          :"",
                "gender"        :"M",
                "number"        :"",
                "is_fulltime"   :false,
                "role"          : "",
                "status"        :1,
                "phone"         :"",
                "email"         :"",
                "address"       :"",
                "memo"          :"",
                "bill_to"       :"",
                "ship_to"       :"",
                "abbr"          :"",
                "currency"      :"km-KH",
                "userid"        :0,
                "account"       :{id: 9, name: 'Cash Advance'},
                "salary"        :{id: 78, name: 'Salary'},
                "registered_date":new Date()
            });
            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            //Payroll
            this.payrollDS.data([]);
            this.set("payrollobj", null);
            this.payrollDS.insert(0, {
                "children"          : 0,
                "city"              : "",
                "country"           : "",
                "contact_id"        : "",
                "emergency_name"    : "",
                "employeement_date" : "",
                "emergency_number"  : "", 
                "married_status"    : 0,
                "nationality"       : "",
            });
            var payrollobj = this.payrollDS.at(0);
            this.set("payrollobj", payrollobj);
        },
        loadObj                 : function(id){
            var self = this;
            this.dataSource.query({
                filter: {field: "id", value: id},
                page: 1,
                pageSize: 1
            }).then(function(e){
                var view = self.dataSource.view();
                self.set("obj", view[0]);
            });
        },
        typeChange: function(e) {
          var type = this.roleDS.data()[e.sender.selectedIndex - 1];
          this.get('obj').set('abbr', type.abbr);
        },
        save        : function(e){
            var self = this;
            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.response.type != 'read'){
                    $.each(self.payrollDS.data(), function(i,v){
                        v.set("contact_id", e.response.results[0].id);
                    });
                    self.payrollDS.sync();
                    self.payrollDS.bind("requestEnd", function(e){
                        self.cancel();
                        var noti = $("#ntf1").data("kendoNotification");
                        noti.hide();
                        noti.success(self.lang.lang.success_message);
                    });
                }
            });
        },
        cancel      : function(e){
            this.dataSource.data([]);
            banhji.router.navigate("/");
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
        loyaltyCenter: new kendo.Layout("#loyaltyCenter", {model: banhji.loyaltyCenter}),
        Loyalty: new kendo.Layout("#Loyalty", {model: banhji.Loyalty}),
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
        banhji.view.layout.showIn("#content", banhji.view.loyaltyCenter);
        var vm = banhji.loyaltyCenter;
        vm.pageLoad();
    });
    banhji.router.route("/loyalty(/:id)", function(id){
        banhji.view.layout.showIn("#content", banhji.view.Loyalty);
        kendo.fx($("#slide-form")).slideIn("down").play();
        banhji.Loyalty.pageLoad(id);
    });
    
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
                    if ("wellnez" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        if(banhji.userData.role == 1){
                            allowed = true;
                        }else{
                            $.each(banhji.userData.roles, function(i,v){
                                if(v.name == 'wnz_loyalty'){
                                    allowed = true;
                                }
                            });
                        }
                        break;
                    }
                }
            }
            if (!allowed) {
                alert("You don't have permission to access this page!");
                window.location.replace(baseUrl + "wellnez/home");
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