<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
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
        // countryDS: dataStore(apiUrl + "countries"),
        // //Contact
        // customerList: [],
        // supplierList: [],
        // employeeList: [],
        // contactDS: dataStore(apiUrl + "contacts"),
        // customerDS: dataStore(apiUrl + "contacts"),
        // supplierDS: dataStore(apiUrl + "contacts"),
        // employeeDS: dataStore(apiUrl + "contacts"),
        // //Contact Type
        // contactTypeList: [],
        // contactTypeDS: dataStore(apiUrl + "contacts/type"),
        // //Job
        // jobList: [],
        // jobDS: dataStore(apiUrl + "jobs"),
        // //Currency
        // currencyList: [],
        // currencyDS: dataStore(apiUrl + "currencies"),
        currencyRateDS: dataStore(apiUrl + "currencies/rate"),
        // //Item
        // itemList: [],
        // itemDS: dataStore(apiUrl + "items"),
        // itemTypeDS: dataStore(apiUrl + "item_types"),
        // itemGroupList: [],
        // itemGroupDS: dataStore(apiUrl + "items/group"),
        // brandDS: dataStore(apiUrl + "brands"),
        // categoryList: [],
        // categoryDS: dataStore(apiUrl + "categories"),
        // itemPriceList: [],
        // itemPriceDS: dataStore(apiUrl + "item_prices"),
        // measurementList: [],
        // measurementDS: dataStore(apiUrl + "measurements"),
        // //Tax
        // taxList: [],
        // taxItemDS: dataStore(apiUrl + "tax_items"),
        // //Accounting
        // accountList: [],
        // accountDS: dataStore(apiUrl + "accounts"),
        // accountTypeDS: new kendo.data.DataSource({
        //     transport: {
        //         read: {
        //             url: apiUrl + "accounts/type",
        //             type: "GET",
        //             headers: banhji.header,
        //             dataType: 'json'
        //         },
        //         parameterMap: function(options, operation) {
        //             if (operation === 'read') {
        //                 return {
        //                     page: options.page,
        //                     limit: options.pageSize,
        //                     filter: options.filter,
        //                     sort: options.sort
        //                 };
        //             } else {
        //                 return {
        //                     models: kendo.stringify(options.models)
        //                 };
        //             }
        //         }
        //     },
        //     schema: {
        //         model: {
        //             id: 'id'
        //         },
        //         data: 'results',
        //         total: 'count'
        //     },
        //     filter: {
        //         field: "id >",
        //         value: 9
        //     },
        //     batch: true,
        //     serverFiltering: true,
        //     serverSorting: true,
        //     serverPaging: true,
        //     page: 1,
        //     pageSize: 100
        // }),
        // //Payment Term, Method, Segment
        // paymentTermDS: dataStore(apiUrl + "payment_terms"),
        // paymentMethodDS: dataStore(apiUrl + "payment_methods"),
        // //Segment
        // segmentItemList: [],
        // segmentItemDS: dataStore(apiUrl + "segments/item"),
        // //Txn Template
        // txnTemplateList: [],
        // txnTemplateDS: dataStore(apiUrl + "transaction_templates"),
        // //Prefixes
        // prefixList: [],
        // prefixDS: dataStore(apiUrl + "prefixes"),
        // frequencyList: [{
        //         id: 'Daily',
        //         name: 'Day'
        //     },
        //     {
        //         id: 'Weekly',
        //         name: 'Week'
        //     },
        //     {
        //         id: 'Monthly',
        //         name: 'Month'
        //     },
        //     {
        //         id: 'Annually',
        //         name: 'Annual'
        //     }
        // ],
        // monthOptionList: [{
        //         id: 'Day',
        //         name: 'Day'
        //     },
        //     {
        //         id: '1st',
        //         name: '1st'
        //     },
        //     {
        //         id: '2nd',
        //         name: '2nd'
        //     },
        //     {
        //         id: '3rd',
        //         name: '3rd'
        //     },
        //     {
        //         id: '4th',
        //         name: '4th'
        //     }
        // ],
        // monthList: [{
        //         id: 0,
        //         name: 'January'
        //     },
        //     {
        //         id: 1,
        //         name: 'February'
        //     },
        //     {
        //         id: 2,
        //         name: 'March'
        //     },
        //     {
        //         id: 3,
        //         name: 'April'
        //     },
        //     {
        //         id: 4,
        //         name: 'May'
        //     },
        //     {
        //         id: 5,
        //         name: 'June'
        //     },
        //     {
        //         id: 6,
        //         name: 'July'
        //     },
        //     {
        //         id: 7,
        //         name: 'August'
        //     },
        //     {
        //         id: 8,
        //         name: 'September'
        //     },
        //     {
        //         id: 9,
        //         name: 'October'
        //     },
        //     {
        //         id: 10,
        //         name: 'November'
        //     },
        //     {
        //         id: 11,
        //         name: 'December'
        //     }
        // ],
        // weekDayList: [{
        //         id: 0,
        //         name: 'Sunday'
        //     },
        //     {
        //         id: 1,
        //         name: 'Monday'
        //     },
        //     {
        //         id: 2,
        //         name: 'Tuesday'
        //     },
        //     {
        //         id: 3,
        //         name: 'Wednesday'
        //     },
        //     {
        //         id: 4,
        //         name: 'Thurday'
        //     },
        //     {
        //         id: 5,
        //         name: 'Friday'
        //     },
        //     {
        //         id: 6,
        //         name: 'Saturday'
        //     }
        // ],
        // dayList: [{
        //         id: 1,
        //         name: '1st'
        //     },
        //     {
        //         id: 2,
        //         name: '2nd'
        //     },
        //     {
        //         id: 3,
        //         name: '3rd'
        //     },
        //     {
        //         id: 4,
        //         name: '4th'
        //     },
        //     {
        //         id: 5,
        //         name: '5th'
        //     },
        //     {
        //         id: 6,
        //         name: '6th'
        //     },
        //     {
        //         id: 7,
        //         name: '7th'
        //     },
        //     {
        //         id: 8,
        //         name: '8th'
        //     },
        //     {
        //         id: 9,
        //         name: '9th'
        //     },
        //     {
        //         id: 10,
        //         name: '10th'
        //     },
        //     {
        //         id: 11,
        //         name: '11st'
        //     },
        //     {
        //         id: 12,
        //         name: '12nd'
        //     },
        //     {
        //         id: 13,
        //         name: '13rd'
        //     },
        //     {
        //         id: 14,
        //         name: '14th'
        //     },
        //     {
        //         id: 15,
        //         name: '15th'
        //     },
        //     {
        //         id: 16,
        //         name: '16th'
        //     },
        //     {
        //         id: 17,
        //         name: '17th'
        //     },
        //     {
        //         id: 18,
        //         name: '18th'
        //     },
        //     {
        //         id: 19,
        //         name: '19th'
        //     },
        //     {
        //         id: 20,
        //         name: '20th'
        //     },
        //     {
        //         id: 21,
        //         name: '21st'
        //     },
        //     {
        //         id: 22,
        //         name: '22nd'
        //     },
        //     {
        //         id: 23,
        //         name: '23rd'
        //     },
        //     {
        //         id: 24,
        //         name: '24th'
        //     },
        //     {
        //         id: 25,
        //         name: '25th'
        //     },
        //     {
        //         id: 26,
        //         name: '26th'
        //     },
        //     {
        //         id: 27,
        //         name: '27th'
        //     },
        //     {
        //         id: 28,
        //         name: '28th'
        //     },
        //     {
        //         id: 0,
        //         name: 'Last'
        //     }
        // ],
        // sortList: [{
        //         text: "All",
        //         value: "all"
        //     },
        //     {
        //         text: "Today",
        //         value: "today"
        //     },
        //     {
        //         text: "This Week",
        //         value: "week"
        //     },
        //     {
        //         text: "This Month",
        //         value: "month"
        //     },
        //     {
        //         text: "This Year",
        //         value: "year"
        //     }
        // ],
        // statusList: [{
        //         "id": 1,
        //         "name": "Active"
        //     },
        //     {
        //         "id": 0,
        //         "name": "Inactive"
        //     },
        //     {
        //         "id": 2,
        //         "name": "Void"
        //     }
        // ],
        // customerFormList: [{
        //         id: "Quote",
        //         name: "Quotation"
        //     },
        //     {
        //         id: "Sale_Order",
        //         name: "Sale Order"
        //     },
        //     {
        //         id: "Deposit",
        //         name: "Deposit"
        //     },
        //     {
        //         id: "Cash_Sale",
        //         name: "Cash Sale"
        //     },
        //     {
        //         id: "Invoice",
        //         name: "Invoice"
        //     },
        //     {
        //         id: "Cash_Receipt",
        //         name: "Cash Receipt"
        //     },
        //     //{ id: "Sale_Return", name: "Sale Return" },
        //     {
        //         id: "GDN",
        //         name: "Delivered Note"
        //     }
        // ],
        // vendorFormList: [{
        //         id: "Purchase_Order",
        //         name: "Purchase Order"
        //     },
        //     {
        //         id: "GRN",
        //         name: "GRN"
        //     },
        //     // { id: "Deposit", name: "Deposit" },
        //     // { id: "Purchase", name: "Purchase" },
        //     // { id: "Pur_Return", name: "Pur.Return" },
        //     {
        //         id: "Cash_Payment",
        //         name: "Cash Payment"
        //     }
        // ],
        // cashFormList: [{
        //         id: "Cash_Transfer",
        //         name: "Cash Transaction"
        //     },
        //     {
        //         id: "Cash_Receipt",
        //         name: "Cash Receipt"
        //     },
        //     {
        //         id: "Cash_Payment",
        //         name: "Cash Payment"
        //     },
        //     {
        //         id: "Cash_Advance",
        //         name: "Cash Advance"
        //     },
        //     {
        //         id: "Reimbursement",
        //         name: "Reimbursement"
        //     },
        //     {
        //         id: "Advance_Settlement",
        //         name: "Advance Settlement"
        //     }
        // ],
        // cashMGTFormList: [{
        //         id: "Cash_Transfer",
        //         name: "Transfer"
        //     },
        //     {
        //         id: "Deposit",
        //         name: "Deposit"
        //     },
        //     {
        //         id: "Withdraw",
        //         name: "Withdraw"
        //     },
        //     {
        //         id: "Cash_Advance",
        //         name: "Advance"
        //     },
        //     {
        //         id: "Cash_Payment",
        //         name: "Payment"
        //     },
        //     {
        //         id: "Reimbursement",
        //         name: "Reimbursement"
        //     },
        //     {
        //         id: "Journal",
        //         name: "Journal"
        //     }
        // ],
        // genderList: ["M", "F"],
        // typeList: ['Invoice', 'Commercial_Invoice', 'Vat_Invoice', 'Electricity_Invoice', 'Utility_Invoice', 'Cash_Sale', 'Commercial_Cash_Sale', 'Vat_Cash_Sale', 'Receipt_Allocation', 'Sale_Order', 'Quote', 'GDN', 'Sale_Return', 'Purchase_Order', 'GRN', 'Cash_Purchase', 'Credit_Purchase', 'Purchase_Return', 'Payment_Allocation', 'Deposit', 'Electricty_Deposit', 'Utility_Deposit', 'Customer_Deposit', 'Vendor_Deposit', 'Withdraw', 'Transfer', 'Journal', 'Item_Adjustment', 'Cash_Advance', 'Reimbursement', 'Direct_Expense', 'Advance_Settlement', 'Additional_Cost', 'Cash_Payment', 'Cash_Receipt', 'Credit_Note', 'Debit_Note', 'Offset_Bill', 'Offset_Invoice', 'Cash_Transfer', 'Internal_Usage'],
        // user_id: banhji.userData.id,
        // amtDueColor: "#D5DBDB",
        // acceptedSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/accepted.ico",
        // approvedSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/approved.ico",
        // cancelSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/cancel.ico",
        // openSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/open.ico",
        // paidSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/paid.ico",
        // partialyPaidSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/partialy_paid.ico",
        // usedSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/used.ico",
        // receivedSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/received.ico",
        // deliveredSrc: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/delivered.ico",
        // successMessage: "Saved Successful!",
        // errorMessage: "Warning, please review it again!",
        // confirmMessage: "Are you sure, you want to delete it?",
        // requiredMessage: "Required",
        // duplicateNumber: "Duplicate Number!",
        // duplicateInvoice: "Duplicate Invoice!",
        // selectCustomerMessage: "Please select a customer.",
        // selectSupplierMessage: "Please select a supplier.",
        // selectItemMessage: "Please select an item.",
        // duplicateSelectedItemMessage: "You already selected this item.",
        // meterDS: dataStore(apiUrl + "meters"),
        // meterlist: [],
        // pageLoad: function() {
        //     this.loadAccounts();
        //     // this.accountTypeDS.read();
        //     // this.loadTaxes();
        //     // this.loadJobs();
        //     this.loadSegmentItems();
        //     this.loadCurrencies();
        //     this.loadRates();
        //     this.loadPrefixes();
        //     this.loadTxnTemplates();

        //     // this.loadCategories();
        //     // this.loadItemGroups();
        //     // this.loadItems();
        //     // this.itemTypeDS.read();
        //     // this.loadItemPrices();
        //     // this.loadMeasurements();

        //     this.loadContactTypes();
        //     // this.loadCustomers();
        //     // this.loadSuppliers();
        //     // this.loadEmployees();
        //     // this.loadMeters();
        // },
        // getFiscalDate: function() {
        //     var today = new Date(),
        //         fDate = new Date(today.getFullYear() + "-" + banhji.institute.fiscal_date);

        //     if (today < fDate) {
        //         fDate.setFullYear(today.getFullYear() - 1);
        //     }

        //     return fDate;
        // },
        // loadMeters: function() {
        //     var self = this,
        //         raw = this.get("meterlist");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.meterDS.query({
        //         filter: {
        //             field: "type",
        //             value: "e"
        //         },
        //     }).then(function() {
        //         var view = self.meterDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push({
        //                 id: view[index].id,
        //                 number: view[index].meter_number
        //             });
        //         });
        //     });
        // },
        // loadPrefixes: function() {
        //     var self = this,
        //         raw = this.get("prefixList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.prefixDS.query({
        //         filter: [],
        //     }).then(function() {
        //         var view = self.prefixDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // loadTxnTemplates: function() {
        //     var self = this,
        //         raw = this.get("txnTemplateList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.txnTemplateDS.query({
        //         filter: []
        //     }).then(function() {
        //         var view = self.txnTemplateDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // loadCurrencies: function() {
        //     var self = this,
        //         raw = this.get("currencyList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.currencyDS.query({
        //         filter: []
        //     }).then(function() {
        //         var view = self.currencyDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // loadRates: function() {
        //     this.currencyRateDS.query({
        //         filter: [],
        //         sort: {
        //             field: "date",
        //             dir: "desc"
        //         }
        //     });
        // },
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
        // loadTaxes: function() {
        //     var self = this,
        //         raw = this.get("taxList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.taxItemDS.query({
        //         filter: []
        //     }).then(function() {
        //         var view = self.taxItemDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // loadJobs: function() {
        //     var self = this,
        //         raw = this.get("jobList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.jobDS.query({
        //         filter: []
        //     }).then(function() {
        //         var view = self.jobDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // loadSegmentItems: function() {
        //     var self = this,
        //         raw = this.get("segmentItemList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.segmentItemDS.query({
        //         filter: {
        //             field: "segment_id >",
        //             value: 0
        //         }
        //     }).then(function() {
        //         var view = self.segmentItemDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // loadAccounts: function() {
        //     var self = this,
        //         raw = this.get("accountList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.accountDS.query({
        //         filter: []
        //     }).then(function() {
        //         var view = self.accountDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // loadCategories: function() {
        //     var self = this,
        //         raw = this.get("categoryList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.categoryDS.query({
        //         filter: []
        //     }).then(function() {
        //         var view = self.categoryDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // loadItemGroups: function() {
        //     var self = this,
        //         raw = this.get("itemGroupList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.itemGroupDS.query({
        //         filter: []
        //     }).then(function() {
        //         var view = self.itemGroupDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // loadItems: function() {
        //     var self = this,
        //         raw = this.get("itemList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.itemDS.query({
        //         filter: {
        //             field: "status",
        //             value: 1
        //         }
        //     }).then(function() {
        //         var view = self.itemDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // loadItemPrices: function() {
        //     var self = this,
        //         raw = this.get("itemPriceList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.itemPriceDS.query({
        //         filter: [{
        //                 field: "assembly_id",
        //                 value: 0
        //             },
        //             {
        //                 field: "status",
        //                 operator: "where_related_item",
        //                 value: 1
        //             }
        //         ]
        //     }).then(function() {
        //         var view = self.itemPriceDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // loadMeasurements: function() {
        //     var self = this,
        //         raw = this.get("measurementList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.measurementDS.query({
        //         filter: [],
        //     }).then(function() {
        //         var view = self.measurementDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // loadContactTypes: function() {
        //     var self = this,
        //         raw = this.get("contactTypeList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.contactTypeDS.query({
        //         filter: []
        //     }).then(function() {
        //         var view = self.contactTypeDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // loadCustomers: function() {
        //     var self = this,
        //         raw = this.get("customerList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.customerDS.query({
        //         filter: [{
        //             field: "parent_id",
        //             operator: "where_related_contact_type",
        //             value: 1
        //         }],
        //         page: 1,
        //         sort: {
        //             field: "id",
        //             dir: "desc"
        //         }
        //     }).then(function() {
        //         var view = self.customerDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });

        // },
        // loadSuppliers: function() {
        //     var self = this,
        //         raw = this.get("supplierList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.supplierDS.query({
        //         filter: [{
        //             field: "parent_id",
        //             operator: "where_related_contact_type",
        //             value: 2
        //         }]
        //     }).then(function() {
        //         var view = self.supplierDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // loadEmployees: function() {
        //     var self = this,
        //         raw = this.get("employeeList");

        //     //Clear array
        //     if (raw.length > 0) {
        //         raw.splice(0, raw.length);
        //     }

        //     this.employeeDS.query({
        //         filter: [{
        //                 field: "parent_id",
        //                 operator: "where_related_contact_type",
        //                 value: 3
        //             },
        //             {
        //                 field: "status",
        //                 value: 1
        //             }
        //         ]
        //     }).then(function() {
        //         var view = self.employeeDS.view();

        //         $.each(view, function(index, value) {
        //             raw.push(value);
        //         });
        //     });
        // },
        // getPaymentTerm: function(id) {
        //     var data = this.paymentTermDS.get(id);
        //     return data.name;
        // },
        // getPrefixAbbr: function(type) {
        //     var abbr = "";
        //     $.each(this.prefixList, function(index, value) {
        //         if (value.type == type) {
        //             abbr = value.abbr;

        //             return false;
        //         }
        //     });

        //     return abbr;
        // },
        // //Water
        // tradeDiscountDS: new kendo.data.DataSource({
        //     transport: {
        //         read: {
        //             url: apiUrl + "accounts",
        //             type: "GET",
        //             headers: banhji.header,
        //             dataType: 'json'
        //         },
        //         parameterMap: function(options, operation) {
        //             if (operation === 'read') {
        //                 return {
        //                     page: options.page,
        //                     limit: options.pageSize,
        //                     filter: options.filter,
        //                     sort: options.sort
        //                 };
        //             } else {
        //                 return {
        //                     models: kendo.stringify(options.models)
        //                 };
        //             }
        //         }
        //     },
        //     schema: {
        //         model: {
        //             id: 'id'
        //         },
        //         data: 'results',
        //         total: 'count'
        //     },
        //     filter: [{
        //             field: "id",
        //             value: 72
        //         },
        //         {
        //             field: "status",
        //             value: 1
        //         }
        //     ],
        //     sort: {
        //         field: "number",
        //         dir: "asc"
        //     },
        //     batch: true,
        //     serverFiltering: true,
        //     serverSorting: true,
        //     serverPaging: true,
        //     page: 1,
        //     pageSize: 100
        // }),
        // depositAccountDS: new kendo.data.DataSource({
        //     transport: {
        //         read: {
        //             url: apiUrl + "accounts",
        //             type: "GET",
        //             headers: banhji.header,
        //             dataType: 'json'
        //         },
        //         parameterMap: function(options, operation) {
        //             if (operation === 'read') {
        //                 return {
        //                     page: options.page,
        //                     limit: options.pageSize,
        //                     filter: options.filter,
        //                     sort: options.sort
        //                 };
        //             } else {
        //                 return {
        //                     models: kendo.stringify(options.models)
        //                 };
        //             }
        //         }
        //     },
        //     schema: {
        //         model: {
        //             id: 'id'
        //         },
        //         data: 'results',
        //         total: 'count'
        //     },
        //     filter: [{
        //             field: "account_type_id",
        //             operator: "where_in",
        //             value: [25, 30]
        //         },
        //         {
        //             field: "status",
        //             value: 1
        //         }
        //     ],
        //     sort: {
        //         field: "number",
        //         dir: "asc"
        //     },
        //     batch: true,
        //     serverFiltering: true,
        //     serverSorting: true,
        //     serverPaging: true,
        //     page: 1,
        //     pageSize: 100
        // }),
        // incomeAccountDS: new kendo.data.DataSource({
        //     transport: {
        //         read: {
        //             url: apiUrl + "accounts",
        //             type: "GET",
        //             headers: banhji.header,
        //             dataType: 'json'
        //         },
        //         parameterMap: function(options, operation) {
        //             if (operation === 'read') {
        //                 return {
        //                     page: options.page,
        //                     limit: options.pageSize,
        //                     filter: options.filter,
        //                     sort: options.sort
        //                 };
        //             } else {
        //                 return {
        //                     models: kendo.stringify(options.models)
        //                 };
        //             }
        //         }
        //     },
        //     schema: {
        //         model: {
        //             id: 'id'
        //         },
        //         data: 'results',
        //         total: 'count'
        //     },
        //     filter: [{
        //             field: "account_type_id",
        //             operator: "where_in",
        //             value: [35, 39]
        //         },
        //         {
        //             field: "status",
        //             value: 1
        //         }
        //     ],
        //     sort: {
        //         field: "number",
        //         dir: "asc"
        //     },
        //     batch: true,
        //     serverFiltering: true,
        //     serverSorting: true,
        //     serverPaging: true,
        //     page: 1,
        //     pageSize: 100
        // })
    });
    //-----------------------------------------
    banhji.Index = kendo.observable({
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
        addEx: function(e) {
            var self = this;
            if (this.get("exName") && this.get("exAccount") && this.get("exUnit") && this.get("exCurrency") && this.get("exPrice")) {
                this.planItemDS.add({
                    name: this.get("exName"),
                    type: "exemption",
                    is_flat: false,
                    usage: 0,
                    account: this.get("exAccount"),
                    unit: this.get("exUnit"),
                    currency: this.get("exCurrency"),
                    amount: this.get("exPrice"),
                    _currency: []
                });
                this.planItemDS.sync();
                this.planItemDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("exName", "");
                        self.set("exAccount", "");
                        self.set("exPrice", "");
                        self.set("exUnit", "");
                        self.set("exCurrency", "");
                    }
                });
                this.planItemDS.bind("error", function(e) {
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
        addTariff: function(e) {
            var self = this;
            if (this.get("tariffName") && this.get("tariffAccount") && this.get("tariffCurrency")) {
                this.planItemDS.add({
                    name: this.get("tariffName"),
                    type: "tariff",
                    is_flat: this.get("tariffFlat"),
                    tariff_id: 0,
                    unit: 0,
                    currency: this.get("tariffCurrency"),
                    account: this.get("tariffAccount"),
                    usage: 0,
                    amount: 0,
                    _currency: []
                });
                this.planItemDS.sync();
                this.planItemDS.bind("requestEnd", function(e) {
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
                    }
                });
                this.planItemDS.bind("error", function(e) {
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
        addDeposit: function() {
            var self = this;
            if (this.get("depositName") && this.get("depositAccount") && this.get("depositCurrency") && this.get("depositPrice")) {
                this.planItemDS.add({
                    name: this.get("depositName"),
                    type: "deposit",
                    is_flat: false,
                    unit: null,
                    account: this.get("depositAccount"),
                    usage: 0,
                    currency: this.get("depositCurrency"),
                    amount: this.get("depositPrice"),
                    _currency: []
                });
                this.planItemDS.sync();
                this.planItemDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("depositName", "");
                        self.set("depositPrice", "");
                        self.set("depositCurrency", "");
                        self.set("depositAccount", "");
                    }
                });
                this.planItemDS.bind("error", function(e) {
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
        goService: function() {
            this.serviceAssDS.filter({
                field: "is_assembly", value: 1
            })
            this.planItemDS.data([]);
            this.planItemDS.filter({
                field: "type",
                value: "service"
            });
        },
        serviceAccount: "",
        serviceAssChange: function(e){
            var INX = e.sender.selectedIndex;
            this.set("serviceAccount", this.serviceAssDS.data()[INX -1].income_account_id);
        },
        addService: function() {
            var self = this;
            if (this.get("serviceName") && this.get("serviceAss") && this.get("serviceCurrency") && this.get("servicePrice")) {
                this.planItemDS.add({
                    name: this.get("serviceName"),
                    type: "service",
                    is_flat: false,
                    unit: null,
                    account: this.get("serviceAccount"),
                    assembly_id: this.get("serviceAss"),
                    usage: 0,
                    currency: this.get("serviceCurrency"),
                    amount: this.get("servicePrice"),
                    _currency: []
                });
                this.planItemDS.sync();
                this.planItemDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("serviceName", "");
                        self.set("servicePrice", "");
                        self.set("serviceCurrency", "");
                        self.set("serviceAss", "");
                        self.set("serviceAccount", "");
                    }
                });
                this.planItemDS.bind("error", function(e) {
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
        addMaintenance: function() {
            var self = this;
            if (this.get("maintenanceName") && this.get("maintenanceAccount") && this.get("maintenanceCurrency") && this.get("maintenancePrice")) {
                this.planItemDS.add({
                    name: this.get("maintenanceName"),
                    type: "maintenance",
                    is_flat: false,
                    unit: null,
                    account: this.get("maintenanceAccount"),
                    usage: 0,
                    currency: this.get("maintenanceCurrency"),
                    amount: this.get("maintenancePrice"),
                    _currency: []
                });
                this.planItemDS.sync();
                this.planItemDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("maintenanceName", "");
                        self.set("maintenancePrice", "");
                        self.set("maintenanceAccount", "");
                        self.set("maintenanceCurrency", "");
                    }
                });
                this.planItemDS.bind("error", function(e) {
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
        addFine: function() {
            var self = this;
            if (this.get("fineName") && this.get("fineAccount") && this.get("fineCurrency") && this.get("finePrice") && this.get("fineDay")) {
                this.planItemDS.add({
                    name: this.get("fineName"),
                    type: "fine",
                    is_flat: 0,
                    unit: null,
                    account: this.get("fineAccount"),
                    usage: this.get("fineDay"),
                    currency: this.get("fineCurrency"),
                    amount: this.get("finePrice"),
                    _currency: []
                });
                this.planItemDS.sync();
                this.planItemDS.bind("requestEnd", function(e) {
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
                this.planItemDS.bind("error", function(e) {
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
        //Room
        roomDS: dataStore(apiUrl + "utibills/room"),
        goRoom: function() {},
        statusAR: [
            {name: "Active", id: 1},
            {name: "Inactive", id: 0}
        ],
        branchName: "",
        branchRChange: function(e){
            this.set("branchName", e.sender.span[0].innerText);
        },
        roomStatus: 1,
        addRoom: function(){
            if(this.get("roomBranch") && this.get("roomName") && this.get("roomNumber")){
                var self = this;
                this.roomDS.add({
                    branch_id: this.get("roomBranch"),
                    branch_name: this.get("branchName"),
                    name: this.get("roomName"),
                    number: this.get("roomNumber"),
                    status: this.get("roomStatus")
                });
                this.roomDS.sync();
                this.roomDS.bind("requestEnd", function(e){
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.success_message);
                    self.set("roomBranch", "");
                    self.set("roomName", "");
                    self.set("roomNumber", "");
                    self.set("roomStatus", 1);
                    self.set("branchName", "");
                });
            }else{
                var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.error(self.lang.lang.error_input);
            }
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
        serviceChargeDS : dataStore(apiUrl + "spa/service_charge"),
        serviceobj : [],
        haveServiceCharge : false,
        scItemDS: dataStore(apiUrl + "items"),
        goServiceCharge : function(){
            var self = this;
            this.serviceChargeDS.query({
                filter: {field: "id", value: 1}
            }).then(function(e){
                var v = self.serviceChargeDS.view();
                if(v.length > 0){
                    self.set("haveServiceCharge", true);
                    self.set("serviceobj", v[0]);
                    self.get("serviceobj").set("locale", banhji.locale);
                    self.scItemDS.filter({field: "id", value: v[0].item_id});
                }else{
                    self.set("haveServiceCharge", false);
                    self.serviceChargeDS.insert(0, {
                        "register"              : false,
                        "item_id"               : 0,
                        "status"                : 0,
                        "percentage"            : 0,
                        "locale"                : banhji.locale
                    });
                    var serviceobj = self.serviceChargeDS.at(0);
                    self.set("serviceobj", serviceobj);
                }
            });
        },
        saveServiceCharge : function(){
            var self = this;
            this.serviceChargeDS.sync();
            this.serviceChargeDS.bind("requestEnd", function(e){
                if(e.type != 'read'){
                    var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                }
            });
        }
    });
    banhji.Branch = kendo.observable({
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
            if (this.attachmentDS.hasChanges() == true) {
                this.uploadFile();
            } else {
                this.saveDataSource();
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
        Branch: new kendo.Layout("#Branch", {
            model: banhji.Branch
        })
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
        banhji.Index.pageLoad();
    });
    banhji.router.route("/branch(/:id)", function(id){
        banhji.view.layout.showIn("#content", banhji.view.Branch);
        var vm = banhji.Branch;
        vm.pageLoad(id);
    });
    $(function() {
        
        // banhji.accessMod.query({
        //     filter: {
        //         field: 'username',
        //         value: JSON.parse(localStorage.getItem('userData/user')).username
        //     }
        // }).then(function(e) {
        //     var allowed = false;
        //     if (banhji.accessMod.data().length > 0) {
        //         for (var i = 0; i < banhji.accessMod.data().length; i++) {
        //             if ("utibill" == banhji.accessMod.data()[i].name.toLowerCase()) {
        //                 allowed = true;
        //                 break;
        //             }
        //         }
        //     }
        //     if (!allowed) {
        //         window.location.replace(baseUrl + "admin");
        //         // banhji.view.layout.showIn("#content", banhji.view.wDashBoard);
        //     }
            $("#holdpageloadhide").css("display", "none");
        // });
        // banhji.source.contactDS.read().then(function() {
            banhji.router.start();
            // banhji.source.loadData();
            // banhji.source.pageLoad();
        // });

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