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
            this.loadTaxes();
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
    /*Reading*/
    banhji.reading = kendo.observable({
        lang: langVM,
        meterVM: banhji.meter,
        dataSource: dataStore(apiUrl + "readings"),
        uploadDS: dataStore(apiUrl + "readings/books"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        subLocationDS: dataStore(apiUrl + "locations"),
        boxDS: dataStore(apiUrl + "locations"),
        licenseDSU: dataStore(apiUrl + "branches"),
        blocDSU: dataStore(apiUrl + "locations"),
        subLocationDSU: dataStore(apiUrl + "locations"),
        boxDSU: dataStore(apiUrl + "locations"),
        meterDS: dataStore(apiUrl + "meters/record"),
        existReading: dataStore(apiUrl + "readings"),
        itemDS: null,
        obj: null,
        monthOfSelect: null,
        licenseSelect: null,
        blocSelect: null,
        selectMeter: false,
        haveData: false,
        rows: [],
        miniMonthofS: new Date(),
        haveLicense: false,
        haveLocation: false,
        haveSubLocation: false,
        haveLicenseU: false,
        haveLocationU: false,
        haveSubLocationU: false,
        liSelectName: "",
        pageLoad: function(id) {},
        licenseChange: function(e) {
            var self = this;
            this.blocDS.data([]);
            this.set("locationSelect", "");
            this.set("haveLicense", false)
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveLocation", false);
            this.set("haveSubLocation", false);
            this.blocDS.filter([{
                    field: "branch_id",
                    value: this.get("licenseSelect")
                },
                {
                    field: "main_bloc",
                    value: 0
                },
                {
                    field: "main_pole",
                    value: 0
                }
            ]);
            this.set("haveLicense", true);
            this.set("liSelectName", e.sender.span[0].innerText);
        },
        loSelectName: "",
        onLocationChange: function(e) {
            var self = this;
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveSubLocation", false);
            if (this.get("blocSelect")) {
                this.subLocationDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: 0
                            }
                        ],
                        page: 1
                    })
                    .then(function(e) {
                        if (self.subLocationDS.data().length > 0) {
                            self.set("haveLocation", true);
                        } else {
                            self.set("haveLocation", false);
                            self.set("subLocationSelect", "");
                            self.subLocationDS.data([]);
                        }
                    });
            }
            this.set("loSelectName", e.sender.span[0].innerText);
        },
        onSubLocationChange: function(e) {
            var self = this;
            if (this.get("subLocationSelect")) {
                this.boxDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: this.get("subLocationSelect")
                            }
                        ]
                    })
                    .then(function(e) {
                        if (self.boxDS.data().length > 0) {
                            self.set("haveSubLocation", true);
                        } else {
                            self.set("haveSubLocation", false);
                            self.set("boxSelect", "");
                            self.boxDS.data([]);
                        }
                    });
            }
        },
        licenseChangeU: function(e) {
            var self = this;
            this.blocDSU.data([]);
            this.set("locationSelectU", "");
            this.set("haveLicenseU", false)
            this.subLocationDSU.data([]);
            this.boxDSU.data([]);
            this.set("boxSelectU", "");
            this.set("haveLocationU", false);
            this.set("haveSubLocationU", false);

            this.blocDSU.filter([{
                    field: "branch_id",
                    value: this.get("licenseSelectU")
                },
                {
                    field: "main_bloc",
                    value: 0
                },
                {
                    field: "main_pole",
                    value: 0
                }
            ]);
            this.set("haveLicenseU", true);
        },
        monthOfUen: false,
        onLocationChangeU: function(e) {
            var self = this;
            this.set("monthOfUen", true);
            this.subLocationDSU.data([]);
            this.boxDSU.data([]);
            this.set("boxSelectU", "");
            this.set("haveSubLocationU", false);
            if (this.get("blocSelectU")) {
                this.subLocationDSU.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelectU")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelectU")
                            },
                            {
                                field: "main_pole",
                                value: 0
                            }
                        ],
                        page: 1
                    })
                    .then(function(e) {
                        if (self.subLocationDSU.data().length > 0) {
                            self.set("haveLocationU", true);
                        } else {
                            self.set("haveLocationU", false);
                            self.set("subLocationSelectU", "");
                            self.subLocationDSU.data([]);
                        }
                    });
            }
        },
        onSubLocationChangeU: function(e) {
            var self = this;
            if (this.get("subLocationSelectU")) {
                this.boxDSU.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelectU")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelectU")
                            },
                            {
                                field: "main_pole",
                                value: this.get("subLocationSelectU")
                            }
                        ]
                    })
                    .then(function(e) {
                        if (self.boxDSU.data().length > 0) {
                            self.set("haveSubLocationU", true);
                        } else {
                            self.set("haveSubLocationU", false);
                            self.set("boxSelectU", "");
                            self.boxDSU.data([]);
                        }
                    });
            }
        },
        search: function() {
            this.uploadDS.data([]);
            this.set("haveData", false);
            var monthOfSearch = this.get("monthOfSelect"),
                license_id = this.get("licenseSelect"),
                bloc_id = this.get("blocSelect");
            var para = [];
            if (license_id) {
                if (bloc_id) {
                    this.set("selectMeter", true);
                    if (this.get("boxSelect")) {
                        para.push({
                            field: "box_id",
                            value: this.get("boxSelect")
                        });
                    } else if (this.get("subLocationSelect")) {
                        para.push({
                            field: "pole_id",
                            value: this.get("subLocationSelect")
                        });
                    } else {
                        para.push({
                            field: "location_id",
                            value: bloc_id
                        });
                    }
                    var self = this;
                    this.uploadDS.query({
                        filter: para
                    }).then(function() {
                        var FromDate, ToDate, MonthOf;
                        self.rows = [];
                        if (self.uploadDS.data().length > 0) {
                            self.set("haveData", true);
                            self.rows.push({
                                cells: [{
                                        value: "_contact",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "meter_number",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "from_date",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "to_date",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "month_of",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "previous",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "current",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "round",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    }
                                ]
                            });
                            for (var i = 0; i < self.uploadDS.data().length; i++) {
                                FromDate = kendo.toString(new Date(self.uploadDS.data()[i].from_date), "dd-MMM-yyyy");
                                ToDate = kendo.toString(new Date(self.uploadDS.data()[i].to_date), "dd-MMM-yyyy");
                                MonthOf = kendo.toString(new Date(self.uploadDS.data()[i].month_of), "MMM-yyyy");
                                self.rows.push({
                                    cells: [{
                                            value: self.uploadDS.data()[i]._contact
                                        },
                                        {
                                            value: self.uploadDS.data()[i].meter_number
                                        },
                                        {
                                            value: FromDate
                                        },
                                        {
                                            value: ToDate
                                        },
                                        {
                                            value: MonthOf
                                        },
                                        {
                                            value: self.uploadDS.data()[i].previous
                                        },
                                        {
                                            value: ""
                                        },
                                        {
                                            value: ""
                                        }
                                    ]
                                });
                            }
                        }
                    });
                } else {
                    alert("Please Select Location");
                }
            } else {
                alert("Please Select License");
            }
        },
        monthOfSR: null,
        toDateSR: null,
        NumberSR: null,
        previousSR: 0,
        currentSR: 0,
        newRound: 0,
        toDateDisabled: true,
        addSingleReading: function() {
            var self = this;
            if (banhji.reading.get('monthOfSR')) {
                if(banhji.reading.newRound == 0){
                    if (kendo.parseInt(banhji.reading.get('previousSR')) > kendo.parseInt(banhji.reading.get('currentSR'))) {
                        alert("Current Reading is smaller than Previous Reading");
                    } else {
                        banhji.reading.saveSingleReading();
                    }
                }else{
                    banhji.reading.saveSingleReading();
                }
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(this.lang.lang.field_required_message);
            }
        },
        saveSingleReading : function(e){
            var self = this;
            banhji.reading.dataSource.insert(0, {
                month_of: banhji.reading.get('monthOfSR'),
                to_date: banhji.reading.get('toDateSR'),
                meter_number: banhji.reading.get('NumberSR'),
                previous: banhji.reading.get('previousSR'),
                current: banhji.reading.get('currentSR'),
                round: banhji.reading.get('newRound'),
                invoiced: 0,
                condition: "new",
                usage: banhji.reading.get('currentSR') - banhji.reading.get('previousSR')
            });
            banhji.reading.dataSource.sync();
            banhji.reading.dataSource.bind("requestEnd",
                function(data) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.success_message);
                    banhji.reading.set('monthOfSR', null);
                    banhji.reading.set('toDateSR', null);
                    banhji.reading.set('previousSR', null);
                    banhji.reading.set('currentSR', null);
                    $("#loadImport").css("display", "none");
                }
            );
        },
        exportEXCEL: function(e) {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Reading",
                    rows: this.rows
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "[" + this.get("liSelectName") + "]-[" + this.get("loSelectName") + "]-[" + "<?php echo date('Ym'); ?>" + "]-[" + "<?php echo date('dmY'); ?>" + "].xlsx"
            });
        },
        MonthTo: false,
        errorShow: false,
        existShow: false,
        fullCorrect: false,
        Uploaderror: [],
        ExistRUpload: [],
        monthOfUSelect: function(e) {
            $("#loadImport").css("display", "block");
            var para = [],
                self = this;
            var monthOfSearch = self.get("monthOfUpload");
            var monthOf = new Date(monthOfSearch);
            monthOf.setDate(1);
            monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
            var monthL = new Date(monthOfSearch);
            var lastDayOfMonth = new Date(monthL.getFullYear(), monthL.getMonth() + 1, 0);
            lastDayOfMonth = lastDayOfMonth.getDate();
            monthL.setDate(lastDayOfMonth);
            monthL = kendo.toString(monthL, "yyyy-MM-dd");
            if (this.get("boxSelectU")) {
                para.push({
                    field: "box_id",
                    operator: "where_related_meter",
                    value: this.get("boxSelectU")
                });
            } else if (this.get("subLocationSelectU")) {
                para.push({
                    field: "pole_id",
                    operator: "where_related_meter",
                    value: this.get("subLocationSelectU")
                });
            } else {
                para.push({
                    field: "location_id",
                    operator: "where_related_meter",
                    value: this.get("blocSelectU")
                });
            }
            para.push({
                field: "month_of >",
                value: monthOf
            }, {
                field: "month_of <=",
                value: monthL
            });
            para.push({
                field: "invoiced",
                value: 0
            });
            this.existReading.query({
                    filter: para
                })
                .then(function(e) {
                    self.set("toDateDisabled", false);
                    $("#loadImport").css("display", "none");
                });
        },
        selectMonthTo: function(e) {
            if (this.get("monthOfUpload") && this.get("toDateUpload")) {
                this.set("MonthTo", true);
            } else {
                this.set("MonthTo", false);
            }
        },
        onSelected: function(e) {
            var files = e.files,
                self = this;
            $('li.k-file').remove();
            this.Uploaderror.splice(0, this.Uploaderror.length);
            this.ExistRUpload.splice(0, this.ExistRUpload.length);
            $("#loadImport").css("display", "block");
            var reader = new FileReader();
            banhji.reading.dataSource.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    if (roa.length > 0) {
                        result[sheetName] = roa;
                        for (var i = 0; i < roa.length; i++) {
                            for (var j = 0; j < self.existReading.data().length; j++) {
                                if (roa[i].meter_number == self.existReading.data()[j].meter_number) {
                                    self.ExistRUpload.push({
                                        line: j + 1,
                                        meter_number: roa[i].meter_number,
                                        previous: roa[i].previous,
                                        current: roa[i].current,
                                        status: 0
                                    });
                                }
                            }
                            roa[i].invoiced = 0;
                            var monthOf = self.get("monthOfUpload");
                            monthOf.setDate(1);
                            roa[i].month_of = monthOf;
                            roa[i].from_date = new Date(roa[i].to_date);
                            roa[i].to_date = self.get("toDateUpload");
                            if(roa[i].round != 1){
                                if (kendo.parseInt(roa[i].current) < kendo.parseInt(roa[i].previous)) {
                                    self.Uploaderror.push({
                                        line: i + 2,
                                        meter_number: roa[i].meter_number,
                                        previous: roa[i].previous,
                                        current: roa[i].current,
                                        status: 0
                                    });
                                }
                            }
                            banhji.reading.dataSource.add(roa[i]);
                            $("#loadImport").css("display", "none");
                        }
                    }
                });
                if (self.Uploaderror.length > 0) {
                    self.set("errorShow", true);
                } else {
                    self.set("errorShow", false);
                }
                if (self.ExistRUpload.length > 0) {
                    self.set("existShow", true);
                } else {
                    self.set("existShow", false);
                }
                if (self.Uploaderror.length > 0 || self.ExistRUpload.length > 0) {
                    self.set("fullCorrect", false);
                } else {
                    self.set("fullCorrect", true);
                }
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        save: function() {
            var self = this;
            var dfd = $.Deferred();
            if (banhji.reading.dataSource.data().length > 0) {
                $("#loadImport").css("display", "block");
                banhji.reading.dataSource.sync();
                banhji.reading.dataSource.bind("requestEnd", function(e) {
                    if (e.type != 'read') {
                        if (e.type == 'update') {
                            // update current invoice
                            banhji.invoice.dataSource.query({
                                filter: {
                                    field: 'meter_record_id',
                                    operator: 'where_related_winvoice_line',
                                    value: e.response.results[0]._meta.id
                                }
                            }).then(function(e) {});
                            // create new invoice
                        }
                        if (e.response) {
                            dfd.resolve(e.response.results);
                            // self.cancel();
                            $("#loadImport").css("display", "none");
                            $('li.k-file').remove();
                            self.dataSource.data([]);
                            self.set("monthOfUpload", "");
                            self.set("toDateUpload", "");
                            banhji.router.navigate("/run_bill");
                        }
                    }
                });
                banhji.reading.dataSource.bind("error", function(e) {
                    dfd.reject(e);
                });
            }
            return dfd.promise();
        },
        cancel: function() {
            banhji.reading.dataSource.data([]);
            banhji.reading.uploadDS.data([]);
            // banhji.reading.dataSource.data([]);
            // banhji.reading.uploadDS.data([]);
            banhji.router.navigate("/");
        }
    });
    banhji.EditReading = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "readings"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        monthOfSearch: null,
        licenseSelect: null,
        blocSelect: null,
        pageLoad: function(id) {
            this.licenseDS.read();
        },
        onLicenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
        },
        blocChange: function(e) {
            var data = e.data;
            var bloc = this.blocDS.at(e.sender.selectedIndex - 1);
            this.set("blocSelect", bloc);
        },
        search: function() {
            var monthOfSearch = this.get("monthOfSelect"),
                license_id = this.get("licenseSelect"),
                bloc_id = this.get("blocSelect");
            var para = [];
            if (monthOfSearch) {
                var monthOf = new Date(monthOfSearch);
                monthOf.setDate(1);
                monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
                var monthL = new Date(monthOfSearch);
                monthL.setDate(31);
                monthL = kendo.toString(monthL, "yyyy-MM-dd");

                para.push({
                    field: "month_of >=",
                    value: monthOf
                }, {
                    field: "month_of <=",
                    value: monthL
                });
                //this.dataSource.filter(para);
                if (license_id) {
                    para.push({
                        field: "branch_id",
                        operator: "where_related_meter",
                        value: license_id.id
                    });
                }
                if (bloc_id) {
                    para.push({
                        field: "location_id",
                        operator: "where_related_meter",
                        value: bloc_id.id
                    });
                }
                this.set("selectMeter", true);
                var self = this;
                this.dataSource.query({
                    filter: para
                }).then(function() {
                    for (var i = 0; i < self.dataSource.data().length; i++) {
                        self.rows.push({
                            cells: [{
                                    value: self.dataSource.data()[i].meter_number
                                },
                                {
                                    value: self.dataSource.data()[i].from_date
                                },
                                {
                                    value: self.dataSource.data()[i].to_date
                                },
                                {
                                    value: self.dataSource.data()[i].previous
                                },
                                {
                                    value: self.dataSource.data()[i].current
                                },
                                {
                                    value: self.dataSource.data()[i].consumption
                                },
                                {
                                    value: self.dataSource.data()[i].status
                                }
                            ]
                        });
                    }
                });
            } else {
                alert("សូមSelect ខែ");
            }
        },
        exportEXCEL: function(e) {
            $("#loadImport").css("display", "block");
            var ds = new kendo.data.DataSource({
                type: "json",
                transport: {
                    read: apiUrl + "readings"
                },
                schema: {
                    model: {
                        fields: {
                            meter_number: {
                                type: "meter_number"
                            },
                            date: {
                                type: "date"
                            },
                            previous: {
                                type: "previous"
                            },
                            reading: {
                                type: "reading"
                            },
                            current: {
                                type: "current"
                            }
                        }
                    }
                }
            });

            var rows = [{
                cells: [{
                        value: "meter_number"
                    },
                    {
                        value: "date"
                    },
                    {
                        value: "previous"
                    },
                    {
                        value: "reading"
                    },
                    {
                        value: "current"
                    }
                ]
            }];
            ds.fetch(function() {
                var data = this.data();
                for (var i = 0; i < data[0].count; i++) {
                    rows.push({
                        cells: [{
                                value: data[0].results[i].meter_number
                            },
                            {
                                value: data[0].results[i].date
                            },
                            {
                                value: data[0].results[i].previous
                            },
                            {
                                value: data[0].results[i].reading
                            },
                            {
                                value: data[0].results[i].current
                            }
                        ]
                    })
                }
                var workbook = new kendo.ooxml.Workbook({
                    sheets: [{
                        columns: [{
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            }
                        ],
                        // Title of the sheet
                        title: "Reading",
                        // Rows of the sheet
                        rows: rows
                    }]
                });
                //save the file as Excel file with extension xlsx
                kendo.saveAs({
                    dataURI: workbook.toDataURL(),
                    fileName: "Reading.xlsx"
                });
            }).then(function() {
                $("#loadImport").css("display", "none");
            });
        },
        cancel: function() {
            this.dataSource.data([]);
            banhji.router.navigate("/");
        }
    });
    banhji.waterImport = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "districts"),
        pageLoad: function(id) {},
        onSelected: function(e) {
            $('li.k-file').remove();
            var files = e.files,
                self = this;
            $("#loadImport").css("display", "block");
            var reader = new FileReader();
            this.dataSource.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    if (roa.length > 0) {
                        result[sheetName] = roa;
                        for (var i = 0; i < roa.length; i++) {
                            self.dataSource.add(roa[i]);
                            $("#loadImport").css("display", "none");
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        exportEXCEL: function(e) {
            $("#loadImport").css("display", "block");
            var ds = new kendo.data.DataSource({
                type: "json",
                transport: {
                    read: apiUrl + "readings"
                },
                schema: {
                    model: {
                        fields: {
                            meter_number: {
                                type: "meter_number"
                            },
                            date: {
                                type: "date"
                            },
                            previous: {
                                type: "previous"
                            },
                            reading: {
                                type: "reading"
                            },
                            current: {
                                type: "current"
                            }
                        }
                    }
                }
            });

            var rows = [{
                cells: [{
                        value: "meter_number"
                    },
                    {
                        value: "date"
                    },
                    {
                        value: "previous"
                    },
                    {
                        value: "reading"
                    },
                    {
                        value: "current"
                    }
                ]
            }];
            ds.fetch(function() {
                var data = this.data();
                for (var i = 0; i < data[0].count; i++) {
                    rows.push({
                        cells: [{
                                value: data[0].results[i].meter_number
                            },
                            {
                                value: data[0].results[i].date
                            },
                            {
                                value: data[0].results[i].previous
                            },
                            {
                                value: data[0].results[i].reading
                            },
                            {
                                value: data[0].results[i].current
                            }
                        ]
                    })
                }
                var workbook = new kendo.ooxml.Workbook({
                    sheets: [{
                        columns: [{
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            }
                        ],
                        // Title of the sheet
                        title: "Reading",
                        // Rows of the sheet
                        rows: rows
                    }]
                });
                //save the file as Excel file with extension xlsx
                kendo.saveAs({
                    dataURI: workbook.toDataURL(),
                    fileName: "Reading.xlsx"
                });
            }).then(function() {
                $("#loadImport").css("display", "none");
            });
        },
        save: function() {
            var self = this;
            if (this.dataSource.data().length > 0) {
                $("#loadImport").css("display", "block");
                this.dataSource.sync();
                this.dataSource.bind("requestEnd", function(e) {
                    if (e.type != 'read') {
                        if (e.response) {
                            $("#ntf1").data("kendoNotification").success("Activated user successfully!");
                            self.cancel();
                            $("#loadImport").css("display", "none");
                        }
                    }
                });
                this.dataSource.bind("error", function(e) {
                    $("#ntf1").data("kendoNotification").error("Error activated!");
                    $("#loadImport").css("display", "none");
                });
            }
        },
        cancel: function() {
            this.dataSource.data([]);
            banhji.router.navigate("/");
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
        scurrencyDS: dataStore(apiUrl + "currencies"),
        serviceAccount: "",
        assName: "",
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
                this.planItemDS.add({
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
            console.log("save");
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
            console.log(haveTariff + "haveTa_" + haveDeposit + "haveDe_" + haveService + "haveSer");
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
    /*==== Meter=====*/
    banhji.meter = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "meters"),
        reactiveDS: dataStore(apiUrl + "meters"),
        planDS: dataStore(apiUrl + "plans"),
        userActivatDS: dataStore(apiUrl + "activate_water"),
        brandDS: banhji.source.brandDS,
        licenseDS: dataStore(apiUrl + "branches"),
        licenseQueryDS: dataStore(apiUrl + "branches"),
        locationDS: dataStore(apiUrl + "locations"),
        poleDS: dataStore(apiUrl + "locations"),
        boxDS: dataStore(apiUrl + "locations"),
        phaseDS: dataStore(apiUrl + "electricity_units"),
        ampereDS: dataStore(apiUrl + "electricity_units"),
        voltageDS: dataStore(apiUrl + "electricity_units"),
        attachmentDS: dataStore(apiUrl + "attachments"),
        itemDS: null,
        obj: null,
        objReactive: null,
        isEdit: false,
        disableOnly: false,
        contact: null,
        electricMeter: false,
        haveEdit: false,
        propertyID: 0,
        selectType: [{
                id: 1,
                name: "Active"
            },
            {
                id: 0,
                name: "Inactive"
            },
            {
                id: 2,
                name: "Void"
            }
        ],
        boxSelect : "",
        selectLocation: false,
        selectSLocation: false,
        meterOrder: 0,
        txnTemplateDS : dataStore(apiUrl + "transaction_templates"),
        pageLoad: function(id) {
            this.set("haveEdit", false);
            this.set("licenseSelect", "");
            this.set("locationSelect", "");
            this.set("subLocationSelect", "");
            this.set("boxSelect", "");
            this.set("haveLocation", false);
            this.set("haveSubLocation", false);
            this.set("ampereSelect", "");
            this.set("phaseSelect", "");
            this.set("voltageSelect", "");
            this.phaseDS.filter({
                field: "type",
                value: "phase"
            });
            this.ampereDS.filter({
                field: "type",
                value: "ampere"
            });
            this.voltageDS.filter({
                field: "type",
                value: "voltage"
            });
            if (id) {
                this.loadObj(id);
                this.set("otherINFO", true);
                this.set("haveEdit", true);
            } else {
                this.set("chkRe", false);
                if (this.propertyID) {
                    this.addEmpty(this.propertyID);
                    this.addEmptyRe(this.propertyID);

                    this.locationDS.filter([{
                        field: "main_bloc",
                        value: "0"
                    }, {
                        field: "main_pole",
                        value: "0"
                    }]);
                } else {
                    banhji.router.navigate("/center");
                }
                this.set("haveLocation", false);
                this.set("haveSubLocation", false);
            }
            this.planDS.fetch();
            this.setWords();
            this.txnTemplateDS.filter([
                { field: "type", value: "Invoice"},
                { field: "moduls", value: "customer_mg"}
            ]);
            this.get("obj").set("invoice_type", "Invoice");
        },
        typeList            : new kendo.data.DataSource({
            data: banhji.source.prefixList,
            filter:{
                logic: "or",
                filters: [
                    { field: "type", value: "Commercial_Invoice" },
                    { field: "type", value: "Vat_Invoice" },
                    { field: "type", value: "Invoice" }
                ]
            }
        }),
        typeChanges         : function(){
            var obj = this.get("obj");
            $.each(this.txnTemplateDS.data(), function(index, value){
                if(value.type==obj.type){
                    obj.set("transaction_template_id", value.id);
                    return false;
                }
            });
        },
        licenseData: [],
        otherINFO: false,
        licenseID: "",
        licenseChange: function(e) {
            var obj = this.get("obj"),
                self = this;
            this.set("otherINFO", false);
            this.licenseQueryDS.query({
                filter: {
                    field: "id",
                    value: obj.branch_id
                },
                take: 1
            }).then(function(e) {
                var view = self.licenseQueryDS.view();
                if (view[0].type == "e") {
                    self.set("electricMeter", true);
                } else {
                    self.set("electricMeter", false);
                }
                self.locationDS.filter([{
                        field: "branch_id",
                        value: view[0].id
                    },
                    {
                        field: "main_bloc",
                        value: 0
                    },
                    {
                        field: "main_pole",
                        value: 0
                    }
                ]);
                self.set("otherINFO", true);
                self.get("obj").set("type", view[0].type);
                self.set("licenseID", view[0].id);
                // self.get("objReactive").set("type", view[0].type);
            });
        },
        setWords: function() {
            this.selectType[0].set("name", this.lang.lang.active);
            this.selectType[1].set("name", this.lang.lang.inactive);
            this.selectType[2].set("name", this.lang.lang.void);
        },
        oldPlan: "",
        loadObj: function(id) {
            var self = this;
            this.dataSource.data([]);
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
                }
                //Check Reactive
                if (view[0].reactive_id != 0) {
                    self.set("chkRe", true);
                    self.set("visibleReMeter", true);
                    self.editRe(view[0].reactive_id);
                } else {
                    self.set("chkRe", false);
                    self.set("visibleReMeter", false);
                }
                //Check Type meter
                if (view[0].type == "e") {
                    self.set("electricMeter", true);
                    self.set("selectLocation", true);
                    self.set("selectSLocation", true);
                    if (view[0].ampere_id != 0) {
                        self.set("ampereSelect", view[0].ampere_id);
                    }
                    if (view[0].phase_id != 0) {
                        self.set("phaseSelect", view[0].phase_id);
                    }
                    if (view[0].voltage_id != 0) {
                        self.set("voltageSelect", view[0].voltage_id);
                    }
                } else {
                    self.set("electricMeter", false);
                }
                //Set all OBJ
                self.set("obj", view[0]);
                self.set("licenseID", view[0].branch_id);
                self.set("licenseSelect", view[0].branch_id);
                self.set("locationSelect", view[0].location_id);
                if (view[0].pole_id != 0) {
                    self.set("haveLocation", true);
                    self.set("subLocationSelect", view[0].pole_id);
                }
                if (view[0].box_id != 0) {
                    self.set("haveSubLocation", true);
                    self.set("boxSelect", view[0].box_id);
                }
                self.set("oldPlan", view[0].plan_id);
                self.set("meterOrder", view[0].worder);
                self.loadMap();
                self.set("propertyID", view[0].property_id);
            });
        },
        editRe: function(id) {
            var self = this;
            this.reactiveDS.query({
                filter: {
                    field: "id",
                    value: id
                },
                take: 1
            }).then(function(e) {
                var view = self.reactiveDS.view();
                self.set("objReactive", view[0]);

            });
        },
        loadMap: function() {
            var obj = this.get("obj");
            lat = kendo.parseFloat(obj.latitute),
                lng = kendo.parseFloat(obj.longtitute);

            if (lat && lng) {
                var myLatLng = {
                    lat: lat,
                    lng: lng
                };
                var mapOptions = {
                    zoom: 17,
                    center: myLatLng,
                    mapTypeControl: false,
                    zoomControl: false,
                    scaleControl: false,
                    streetViewControl: false
                };
                var map = new google.maps.Map(document.getElementById('map'), mapOptions);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map
                });
            }
        },
        visibleReMeter: false,
        chkRe: false,
        checkRe: function(e) {
            if (this.chkRe == true) {
                this.set("visibleReMeter", true);
                this.addEmptyRe(this.propertyID);
                this.meterNumberChange();
            } else {
                this.set("visibleReMeter", false);
            }
        },
        addEmpty: function(id) {
            var self = this;
            this.dataSource.data([]);
            this.set("obj", null);
            this.dataSource.insert(0, {
                property_id: id,
                meter_number: "",
                contact_id: this.get("contact").id,
                status: 1,
                location_id: 0,
                pole_id: 0,
                box_id: 0,
                branch_id: 0,
                brand_id: 0,
                latitute: null,
                longtitute: null,
                plan_id: 0,
                date_used: null,
                map: null,
                memo: null,
                type: "w",
                multiplier: 1,
                starting_no: 0,
                attachment_id: 0,
                reactive_id: 0,
                ampere_id: 0,
                phase_id: 0,
                voltage_id: 0,
                activated: 0,
                reactive_status: 0,
                number_digit: 4,
                worder: 0,
                image_url: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg"
            });
            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            this.set("meterOrder", 0);
        },
        addEmptyRe: function(id) {
            this.reactiveDS.data([]);
            this.reactiveDS.insert(0, {
                property_id: this.propertyID,
                contact_id: this.get("obj").contact_id,
                meter_number: this.get("obj").meter_number,
                status: 1,
                location_id: this.get("obj").location_id,
                pole_id: this.get("obj").pole_id,
                box_id: this.get("obj").box_id,
                branch_id: this.get("obj").branch_id,
                brand_id: 0,
                latitute: this.get("obj").latitute,
                longtitute: this.get("obj").longtitute,
                plan_id: this.get("obj").plan_id,
                date_used: this.get("obj").date_used,
                map: null,
                memo: null,
                type: "e",
                multiplier: 1,
                starting_no: 0,
                attachment_id: 0,
                reactive_id: 0,
                ampere_id: 0,
                activated: 1,
                phase_id: 0,
                voltage_id: 0,
                reactive_status: 1,
                number_digit: this.get("obj").number_digit,
                image_url: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg"
            });
            var objReactive = this.reactiveDS.at(0);
            this.set("objReactive", objReactive);
        },
        meterNumberChange: function(e) {
            var Name = this.get("obj").meter_number + "(REAKTIVE)";
            this.get("objReactive").set("meter_number", Name);
        },
        haveLocation: false,
        haveSubLocation: false,
        onLocationChange: function() {
            var self = this;
            this.poleDS.data([]);
            if (this.get("locationSelect")) {
                this.poleDS.query({
                    filter: [{
                            field: "branch_id",
                            value: this.get("licenseID")
                        },
                        {
                            field: "main_bloc",
                            value: this.get("locationSelect")
                        },
                        {
                            field: "main_pole",
                            value: 0
                        }
                    ],
                    page: 1
                }).then(function(e) {
                    if (self.poleDS.data().length > 0) {
                        self.set("haveLocation", true);
                    } else {
                        self.set("haveLocation", false);
                        self.set("subLocationSelect", "");
                        self.boxDS.data([]);
                    }
                });
                this.set("selectLocation", true);
            }
        },
        onSubLocationChange: function() {
            var self = this;
            if (this.get("subLocationSelect")) {
                this.boxDS.data([]);
                this.boxDS.query({
                    filter: [{
                            field: "branch_id",
                            value: this.get("licenseID")
                        },
                        {
                            field: "main_bloc",
                            value: this.get("locationSelect")
                        },
                        {
                            field: "main_pole",
                            value: this.get("subLocationSelect")
                        }
                    ],
                    page: 1
                }).then(function(e) {
                    if (self.boxDS.data().length > 0) {
                        self.set("haveSubLocation", true);
                    } else {
                        self.set("haveSubLocation", false);
                    }
                });
            }
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
                var key = 'METER_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) + '_' + files.name;
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
            var obj = this.get("obj");
            if (obj.meter_number && obj.plan_id != 0 && obj.plan_id && this.get("locationSelect") && obj.date_used && obj.number_digit) {
                obj.location_id = this.get("locationSelect");
                obj.pole_id = this.get("subLocationSelect");
                obj.box_id = this.get("boxSelect");
                obj.worder = this.get("meterOrder");
                if (obj.type == "w") {
                    if (this.attachmentDS.hasChanges() == true) {
                        this.uploadFile();
                    } else {
                        this.checkReactive();
                    }
                } else {
                    obj.ampere_id = this.get("ampereSelect");
                    obj.phase_id = this.get("phaseSelect");
                    obj.voltage_id = this.get("voltageSelect");
                    if (obj.pole_id != 0 && obj.box_id != 0) {
                        if (this.attachmentDS.hasChanges() == true) {
                            this.uploadFile();
                        } else {
                            this.checkReactive();
                        }
                    } else {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.error(self.lang.lang.field_required_message);
                    }
                }
                if (this.get("haveEdit") == true) {
                    if (obj.plan_id != this.get("oldPlan")) {
                        alert(this.lang.lang.plan_change_alert);
                    }
                }
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(self.lang.lang.field_required_message);
            }
        },
        readingDS: dataStore(apiUrl + "readings"),
        addReading: function(meterNum) {
            var self = this,
                obj = this.get("obj");
            this.readingDS.data([]);
            var monthOf = obj.date_used;
            monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
            var monthL = new Date(obj.date_used);
            var lastDayOfMonth = new Date(monthL.getFullYear(), monthL.getMonth() + 1, 0);
            lastDayOfMonth = lastDayOfMonth.getDate();
            monthL.setDate(lastDayOfMonth);
            this.readingDS.insert(0, {
                month_of: monthOf,
                meter_number: meterNum,
                previous: 0,
                to_date: monthL,
                current: obj.starting_no,
                invoiced: 1,
                condition: "new",
                consumption: 0
            });
            this.readingDS.sync();
        },
        checkReactive: function() {
            var self = this,
                obj = this.get("obj");
            if (this.chkRe == true) {
                if (this.reactiveDS.hasChanges() == true) {
                    this.get("objReactive").set("location_id", obj.location_id);
                    this.reactiveDS.sync();
                    this.reactiveDS.bind("requestEnd", function(e) {
                        if (e.type != 'read' && e.response) {
                            var ID = e.response.results[0].id;
                            var meterNum = e.response.results[0].meter_number;
                            self.get("obj").set("reactive_id", ID);
                            self.addReading(meterNum);
                            self.saveDataSource();
                        }
                    });
                    this.reactiveDS.bind("error", function(e) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.error(self.lang.lang.error_message);
                    });
                } else {
                    this.saveDataSource();
                }
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
                        banhji.router.navigate("/center");
                        banhji.source.loadMeters();
                    }
                });
                this.dataSource.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.error(self.lang.lang.error_message);
                });
            }
        },
        serviceAmount: 0,
        depositAmount: 0,
        haveService: false,
        currencyRateDS: dataStore(apiUrl + "currencies/rate"),
        getRate                     : function(locale, date){
            var rate = 0, lastRate = 1;
            $.each(this.currencyRateDS.data(), function(index, value){
                if(value.locale == locale){
                    lastRate = kendo.parseFloat(value.rate);
                    if(date >= new Date(value.date)){
                        rate = kendo.parseFloat(value.rate);
                        return false;
                    }
                }
            });
            //If no rate, use the last rate
            if(rate==0){
                rate = lastRate;
            }
            return rate;
        },
        itemDS: dataStore(apiUrl + "items"),
        lineDS: dataStore(apiUrl + "item_lines"),
        Locale: "km-KH",
        planChange: function(e){
            this.set("haveService", false);
            var IND = e.sender.selectedIndex;
            var self = this;
            var sAmount = 0, dAmount = 0;
            var assID = "";
            this.lineDS.data([]);
            $.each(this.planDS.data()[IND -1].items, function(i,v){
                if(v.type == 'service'){
                    self.set("serviceName", v.name);
                    sAmount += v.amount;
                    assID = v.assembly_id;
                }else if(v.type == 'deposit'){
                    self.set("depositName", v.name);
                    dAmount += v.amount;
                }
            });
            this.set("serviceAmount", kendo.toString(sAmount, this.planDS.data()[IND -1]._currency.locale == "km-KH" ? "c0" : "c", this.planDS.data()[IND -1]._currency.locale));
            this.set("depositAmount", kendo.toString(dAmount, this.planDS.data()[IND -1]._currency.locale == "km-KH" ? "c0" : "c", this.planDS.data()[IND -1]._currency.locale));
            this.set("haveService", true);
            this.itemDS.query({
                filter: { field: "id", value: assID },
                pageSize: 1
            }).then(function(e){
                var view = self.itemDS.view();
                self.lineDS.add({
                    tax_item_id         : 0,
                    item_id             : 0,
                    assembly_id         : 0,
                    measurement_id      : 0,
                    description         : view[0].name,
                    quantity            : 1,
                    conversion_ratio    : 1,
                    cost                : 0,
                    price               : view[0].price,
                    amount              : view[0].price,
                    discount            : 0,
                    tax                 : 0,
                    rate                : self.getRate(view[0].locale, "<?php echo date('Y-m-d'); ?>"),
                    locale              : view[0].locale,
                    movement            : -1,
                    discount_percentage : 0,
                    item                : { id: view[0].id, name:view[0].name },
                    measurement         : { measurement_id:0, measurement:"" },
                    tax_item            : { id:"", name:"" }
                });
                self.set("Locale", view[0].locale);
                self.get("obj").set("locale", view[0].locale);
                self.changes();
                // self.addRow();
            });
        },
        addRow              : function(){
            var obj = this.get("obj");
            this.lineDS.add({
                transaction_id      : obj.id,
                tax_item_id         : 0,
                item_id             : 0,
                assembly_id         : 0,
                measurement_id      : 0,
                description         : "",
                quantity            : 1,
                conversion_ratio    : 1,
                cost                : 0,
                price               : 0,
                amount              : 0,
                discount            : 0,
                tax                 : 0,
                rate                : this.getRate(this.get("Locale"), "<?php echo date('Y-m-d'); ?>"),
                locale              : obj.locale,
                movement            : -1,
                discount_percentage : 0,
                item                : { id:"", name:"" },
                measurement         : { measurement_id:1, measurement:"" },
                tax_item            : { id:"", name:"" }
            });
        },
        removeRow           : function(e){
            var data = e.data;
            if(this.lineDS.total()>1){
                this.lineDS.remove(data);
                this.changes();
            }
        },
        wacDS               : dataStore(apiUrl + "items/weighted_average_costing"),
        assemblyDS          : dataStore(apiUrl + "item_prices"),
        //Item
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
        assemblyLineDS      : dataStore(apiUrl + "item_lines"),
        addExtraRow         : function(uid){
            var row = this.lineDS.getByUid(uid),
                index = this.lineDS.indexOf(row);
            if(index==this.lineDS.total()-1){
                // this.addRow();
            }
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
            var self = banhji.meter;

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
        changes             : function(){
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
                if(value.tax_item_id>0){
                    var taxAmount = amt * value.tax_item.rate;
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

            amount_due = total - obj.deposit;

            obj.set("sub_total", subTotal);
            obj.set("discount", discount);
            obj.set("tax", tax);
            obj.set("amount", total);
            obj.set("remaining", remaining);

            this.set("total", kendo.toString(total, "c", obj.locale));
            this.set("amount_due", kendo.toString(amount_due, "c", obj.locale));
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
        cancel: function() {
            this.dataSource.data([]);
            banhji.router.navigate("/center");
            this.set("selectLocation", true);
            this.set("selectSLocation", true);
        }
    });
    banhji.ActivateMeter = kendo.observable({
        lang: langVM,
        meterDS: dataStore(apiUrl + "meters"),
        worderDS: dataStore(apiUrl + "meters"),
        dataSource: null,
        readingDS: dataStore(apiUrl + "readings"),
        planDS: dataStore(apiUrl + "plans"),
        cashAccountDS: new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: [{
                    field: "account_type_id",
                    value: 10
                },
                {
                    field: "status",
                    value: 1
                }
            ],
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        arAccountDS: new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: [{
                    field: "account_type_id",
                    value: 12
                },
                {
                    field: "status",
                    value: 1
                }
            ],
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        paymentMethodDS: dataStore(apiUrl + "payment_methods"),
        meterObj: null,
        isEdit: false,
        obj: null,
        installShow: false,
        startDate: new Date(),
        issued_date: new Date(),
        period: 12,
        percentage: 0,
        showInstallment: false,
        activatProcess: false,
        pageLoad: function(id) {
            $("#loadImport").css("display", "block");
            banhji.reading.dataSource.data([]);
            var self = this;
            this.meterDS.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                take: 100
            }).then(function(e) {
                var view = self.meterDS.view();
                if (view[0].activated == 0) {
                    self.set("meterObj", view[0]);
                    self.setObj(view[0].plan_id);
                    self.goWorder(view[0].branch_id, view[0].location_id);
                    self.addReading();
                } else {
                    banhji.router.navigate('/center');
                }

            });
            this.paymentMethodDS.read();
            //this.cashAccountDS.read();
        },
        addReading: function(e) {
            this.readingDS.data([]);
            var obj = this.get("meterObj");
            var monthOf = banhji.ActivateMeter.get("issued_date");
            monthOf.setDate(1);
            monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
            this.readingDS.insert(0, {
                month_of: monthOf,
                meter_number: obj.meter_number,
                previous: 0,
                to_date: this.get("issued_date"),
                current: obj.starting_no,
                invoiced: 1,
                round: 0,
                condition: "new",
                consumption: 0
            });
        },
        cashAccount: 7,
        arAccount: 10,
        paymentMethod: 1,
        checkNumber: null,
        amountRecievChange: function(e) {
            var amount = this.get("NamountToBeRecieved");
            var new_amount = e.data.amountToBeRecieved;
            if (new_amount < amount) {
                this.set("installShow", true);
            } else {
                this.set("installShow", false);
            }
        },
        items: [],
        lWorder: 0,
        goWorder: function(branch_id, location_id) {
            var self = this,
                meterObj = this.get("meterObj");
            this.worderDS.query({
                filter: [{
                        field: "activated",
                        value: 1
                    },
                    {
                        field: "branch_id",
                        value: branch_id
                    },
                    {
                        field: "location_id",
                        value: location_id
                    }
                ],
                sort: {
                    field: "worder",
                    dir: "desc"
                },
                page: 1,
                take: 1
            }).then(function(e) {
                var view = self.worderDS.view();
                var lastNo;
                if (self.worderDS._total > 0) {
                    lastNo = kendo.parseInt(view[0].worder) + 1;
                } else {
                    lastNo = 1;
                }
                if (lastNo) {
                    $("#loadImport").css("display", "none");
                    self.set("activatProcess", true);
                    meterObj.set('worder', lastNo);

                }
            });
        },
        amountToBeRecieved: 0.0,
        amountBilled: 0.0,
        amountRemain: 0.00,
        onAmountChange: function(e) {
            var that = this;
            if (this.items.length > 0) {
                var amount = 0.00;
                $.each(this.items, function(i, v) {
                    amount += kendo.parseFloat(v.received);
                });
                var remain = this.get('amountBilled') - amount;
                this.set('amountRemain', remain);
                this.set('amountToBeRecieved', amount);
                if (this.get('amountRemain') > 0) {
                    this.set('showInstallment', true);
                } else {
                    this.set('showInstallment', false);
                }
            }
        },
        NamountToBeRecieved: 0.0,
        setObj: function(plan_id) {
            var self = this;
            this.planDS.query({
                    filter: {
                        field: "id",
                        value: plan_id
                    }
                })
                .then(function(e) {
                    var data = self.planDS.view()[0];
                    self.items.splice(0, self.items.length);
                    var amount = 0.0;
                    $.each(data.items, function(i, v) {
                        if (v.type == 'service' || v.type == 'deposit') {
                            self.items.push({
                                id: v.item,
                                account_id: v.account_id,
                                name: v.name,
                                type: v.type,
                                amount: v.amount,
                                received: v.amount
                            });
                            amount += parseFloat(v.amount);
                        }
                    });
                    self.set('amountBilled', amount);
                    self.set('amountToBeRecieved', amount);
                });
        },
        save: function() {

            $("#loadImport").css("display", "block");

            var self = this;
            var amount = 0.0;
            var receivedAmount = 0.00;
            self.deposit = null,
                self.service = null;
            if (this.items[0].type === "deposit") {
                self.deposit = this.items[0];
                self.service = this.items[1];
            } else {
                self.deposit = this.items[1];
                self.service = this.items[0];
            }

            $.each(this.items, function(i, v) {
                amount += kendo.parseFloat(v.amount);
                if (kendo.parseFloat(v.received) != 'null') {
                    receivedAmount += kendo.parseFloat(v.received);
                } else {
                    receivedAmount += kendo.parseFloat(0.0);
                }
            });

            this.set('amountToBeRecieved', receivedAmount);

            banhji.transaction.makeInvoice(self.get('meterObj').contact_id, self.get('paymentMethod'), self.service.received, 'Meter_Activation', self.get('meterObj').location_id, self.get('meterObj').id)
                .then(function(transaction) {
                    return banhji.transaction.save();
                })
                .then(function(trx) {
                    if (self.service.received == self.service.amount) {
                        banhji.transactionLine.addById(trx[0].id, banhji.ActivateMeter.get('meterObj').contact_id, banhji.ActivateMeter.get('cashAccount'), 'Meter Activation', self.service.received, 0, banhji.ActivateMeter.get('issued_date'));

                        banhji.transactionLine.addById(trx[0].id, banhji.ActivateMeter.get('meterObj').contact_id, self.service.account_id, 'Meter Activation', 0, self.service.received, banhji.ActivateMeter.get('issued_date'));
                    } else if (self.service.received == 0) {
                        banhji.transactionLine.addById(trx[0].id, banhji.ActivateMeter.get('meterObj').contact_id, banhji.ActivateMeter.get('arAccount'), 'Meter Activation', self.service.received, 0, banhji.ActivateMeter.get('issued_date'));

                        banhji.transactionLine.addById(trx[0].id, banhji.ActivateMeter.get('meterObj').contact_id, self.service.account_id, 'Meter Activation', 0, self.service.received, banhji.ActivateMeter.get('issued_date'));
                    } else {
                        banhji.transactionLine.addById(trx[0].id, banhji.ActivateMeter.get('meterObj').contact_id, banhji.ActivateMeter.get('cashAccount'), 'Meter Activation', self.service.received, 0, banhji.ActivateMeter.get('issued_date'));

                        banhji.transactionLine.addById(trx[0].id, banhji.ActivateMeter.get('meterObj').contact_id, banhji.ActivateMeter.get('arAccount'), 'Meter Activation', self.service.received, 0, banhji.ActivateMeter.get('issued_date'));

                        banhji.transactionLine.addById(trx[0].id, banhji.ActivateMeter.get('meterObj').contact[0].id, self.service.account_id, 'Meter Activation', 0, self.service.received, banhji.ActivateMeter.get('issued_date'));
                    }
                    return banhji.transactionLine.save();
                })
                .then(function(lines) {
                    // get another transaction
                    banhji.transaction.dataSource.data([]);
                    if (self.deposit.received == self.deposit.amount) {
                        return banhji.transaction.makeInvoice(self.get('meterObj').contact_id, self.get('paymentMethod'), self.deposit.received, 'Utility_Deposit', self.get('meterObj').location_id, self.get('meterObj').id);
                    }
                })
                .then(function(transaction) {
                    return banhji.transaction.save();
                })
                .then(function(trx) {
                    banhji.transactionLine.dataSource.data([]);
                    if (self.deposit.received == self.deposit.amount) {
                        banhji.transactionLine.addById(trx[0].id, banhji.ActivateMeter.get('meterObj').contact_id, banhji.ActivateMeter.get('cashAccount'), 'Utility Deposit', self.deposit.received, 0, banhji.ActivateMeter.get('issued_date'));

                        banhji.transactionLine.addById(trx[0].id, banhji.ActivateMeter.get('meterObj').contact_id, self.deposit.account_id, 'Utility Deposit', 0, self.deposit.received, banhji.ActivateMeter.get('issued_date'));
                    }
                    banhji.transactionLine.save();
                });

            if (this.get('amountToBeRecieved') < amount) {
                banhji.ActivateMeter.get('meterObj').set('activated', 1);
                banhji.installment.setDate(banhji.ActivateMeter.get('startDate'));
                banhji.installment.setPeriod(banhji.ActivateMeter.get('period'));
                banhji.installment.makeSchedule(amount - kendo.parseFloat(banhji.ActivateMeter.get('amountToBeRecieved')), banhji.ActivateMeter.get('meterObj').id, banhji.ActivateMeter.get('startDate'), banhji.ActivateMeter.get('period'), banhji.ActivateMeter.get('percentage'));
                banhji.installment.save()
                    .then(function(installment) {
                        if (installment[0]) {
                            // show message
                            banhji.ActivateMeter.set('amountBilled', 0.00);
                            banhji.ActivateMeter.set('cashAccount', 7);
                            banhji.ActivateMeter.set('arAccount', 10);
                            banhji.ActivateMeter.set('paymentMethod', 1);
                            banhji.ActivateMeter.set('amountToBeRecieved', 0.00);
                            banhji.ActivateMeter.set('amountRemain', 0.00);
                            banhji.ActivateMeter.set('percentage', 0);
                            var notifi = $("#ntf1").data("kendoNotification");
                            notifi.hide();
                            notifi.success("success_message");
                            banhji.ActivateMeter.cancel();
                            banhji.waterCenter.meterDS.read();
                        } else {
                            // show error
                            var notifi = $("#ntf1").data("kendoNotification");
                            notifi.hide();
                            notifi.error("error_message");
                        }
                    });
            } else {
                banhji.ActivateMeter.get('meterObj').set('activated', 1);
            }
            banhji.ActivateMeter.meterDS.sync();
            banhji.ActivateMeter.meterDS.bind('requestEnd', function(e) {
                if (e.type != 'read') {
                    self.set('amountToBeRecieved', 0.00);
                    self.readingDS.sync();
                    self.cancel();
                }

            });
        },
        cancel: function() {
            $("#loadImport").css("display", "none");
            this.meterDS.data([]);
            this.planDS.data([]);
            this.paymentMethodDS.data([]);
            this.readingDS.data([]);
            this.set("showInstallment", false);
            this.set("issued_date", new Date());
            banhji.waterCenter.meterDS.data([]);
            banhji.router.navigate("/center");
        }
    });
    banhji.Reorder = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "meters"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        subLocationDS: dataStore(apiUrl + "locations"),
        boxDS: dataStore(apiUrl + "locations"),
        licenseSelect: null,
        blocSelect: null,
        selectMeter: false,
        selectLocation: false,
        haveLicense: false,
        haveLocation: false,
        haveSubLocation: false,
        pageLoad: function(id) {},
        licenseChange: function(e) {
            var self = this;
            this.blocDS.data([]);
            this.set("locationSelect", "");
            this.set("haveLicense", false)
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveSubLocation", false);

            this.blocDS.filter([{
                    field: "branch_id",
                    value: this.get("licenseSelect")
                },
                {
                    field: "main_bloc",
                    value: 0
                },
                {
                    field: "main_pole",
                    value: 0
                }
            ]);
            this.set("haveLicense", true);
        },
        onLocationChange: function(e) {
            var self = this;
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveSubLocation", false);
            if (this.get("blocSelect")) {
                this.subLocationDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: 0
                            }
                        ],
                        page: 1
                    })
                    .then(function(e) {
                        if (self.subLocationDS.data().length > 0) {
                            self.set("haveLocation", true);
                        } else {
                            self.set("haveLocation", false);
                            self.set("subLocationSelect", "");
                            self.subLocationDS.data([]);
                        }
                    });
            }
        },
        onSubLocationChange: function(e) {
            var self = this;
            this.boxDS.data([]);
            if (this.get("subLocationSelect")) {
                this.boxDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: this.get("subLocationSelect")
                            }
                        ],
                        page: 1
                    })
                    .then(function(e) {
                        if (self.boxDS.data().length > 0) {
                            self.set("haveSubLocation", true);
                        } else {
                            self.set("haveSubLocation", false);
                            self.set("boxSelect", "");
                            self.boxDS.data([]);
                        }
                    });
            }
        },
        exArray: [],
        search: function() {
            license_id = this.get("licenseSelect"),
                bloc_id = this.get("blocSelect");
            var para = [{
                field: "activated",
                value: 1
            }];

            if (license_id) {
                para.push({
                    field: "branch_id",
                    value: license_id
                });
                if (bloc_id) {
                    if (this.get("boxSelect")) {
                        para.push({
                            field: "box_id",
                            value: this.get("boxSelect")
                        });
                    } else if (this.get("subLocationSelect")) {
                        para.push({
                            field: "pole_id",
                            value: this.get("subLocationSelect")
                        });
                    } else {
                        para.push({
                            field: "location_id",
                            value: bloc_id
                        });
                    }

                    var self = this;
                    this.dataSource.query({
                        filter: para
                    }).then(function() {
                        if (self.dataSource.data().length > 0) {
                            self.exArray.push({
                                cells: [{
                                        value: "Order",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "Meter Number",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    },
                                    {
                                        value: "Customer",
                                        background: "#496cad",
                                        color: "#ffffff"
                                    }
                                ]
                            });
                            for (var i = 0; i < self.dataSource.data().length; i++) {
                                self.exArray.push({
                                    cells: [{
                                            value: self.dataSource.data()[i].worder
                                        },
                                        {
                                            value: self.dataSource.data()[i].meter_number
                                        },
                                        {
                                            value: self.dataSource.data()[i].contact_name
                                        }
                                    ]
                                });
                            }
                        }
                    });
                } else {
                    alert("Please Select Location");
                }
            } else {
                alert("Please Select License");
            }
        },
        save: function() {
            var self = this;
            $.each(this.dataSource.data(), function(index, value) {
                value.set("worder", index);
            });
            this.dataSource.sync();
            var saved = false;
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "update" && saved == false) {
                    saved = true;
                }
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.success_message);
            });
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Reorder Meter",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: this.get("licenseSelect").name + "_" + this.get("blocSelect").name + "_" + "<?php echo date('d-M-Y'); ?>.xlsx"
            });
        },
        meterOrderDS: dataStore(apiUrl + "utibills/meter_order"),
        onSelected: function(e) {
            var files = e.files,
                self = this;
            $("#loadImport").css("display", "block");
            var reader = new FileReader();
            this.meterOrderDS.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    if (roa.length > 0) {
                        result[sheetName] = roa;
                        for (var i = 0; i < roa.length; i++) {
                            self.meterOrderDS.add(roa[i]);
                            $("#loadImport").css("display", "none");
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        orderSave: function() {
            var self = this;
            if (this.meterOrderDS.data().length > 0) {
                $("#loadImport").css("display", "block");
                this.meterOrderDS.sync();
                this.meterOrderDS.bind("requestEnd", function(e) {
                    if (e.type != 'read') {
                        if (e.response) {
                            $("#ntf1").data("kendoNotification").success("Activated user successfully!");
                            self.cancel();
                            $("#loadImport").css("display", "none");
                        }
                    }
                });
                this.meterOrderDS.bind("error", function(e) {
                    $("#ntf1").data("kendoNotification").error("Error activated!");
                    $("#loadImport").css("display", "none");
                });
            }
        },
        printGrid: function() {
            var self = this,
                Win, pHeight, pWidth;

            Win = window.open('', '', 'width=800, height=900');
            pHeight = "210mm";
            pWidth = "150mm";

            banhji.invoice.dataSource.sync();
            var gridElement = $('#grid'),
                printableContent = '',
                win = Win,
                doc = win.document.open();
            var htmlStart =
                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="utf-8" />' +
                '<title></title>' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>resources/js/kendoui/styles/kendo.bootstrap.min.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link href="<?php echo base_url(); ?>assets/water/water.css" rel="stylesheet" />' +
                '<link href="<?php echo base_url(); ?>assets/water/winvoice-print.css" rel="stylesheet" />' +
                '<link href="<?php echo base_url(); ?>resources/common/theme/css/style-default-menus-dark.css" rel="stylesheet" />' +
                '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                '<style type="text/css" media="print">' +
                '@page { size: portrait; margin:0.5cm;' +
                'size: A5;' +
                '} ' +
                '@media print {' +
                'html, body {' +
                'max-width: ' + pWidth + ';' +
                'max-height: ' + pHeight + ';' +
                'min-width: ' + pWidth + ';' +
                'min-height: ' + pHeight + ';' +
                '}' +
                '}' +
                '.inv1 .light-blue-td { ' +
                'background-color: #c6d9f1!important;' +
                'text-align: left;' +
                'padding-left: 5px;' +
                '-webkit-print-color-adjust:exact; ' +
                '}' +
                '.logoP{ max-height 50px;max-width100px}' +
                '.inv1 thead tr {' +
                'background-color: rgb(242, 242, 242)!important;' +
                '-webkit-print-color-adjust:exact; ' +
                '}' +
                '.pcg .mid-title div {}' +
                '.pcg .mid-header {' +
                'background-color: #dce6f2!important; ' +
                '-webkit-print-color-adjust:exact; ' +
                '}' +
                '.winvoice-print table thead .darkbblue, .winvoice-print table tbody td.darkbblue { ' +
                'background-color: #355176!important;' +
                'color: #fff!important;' +
                '-webkit-print-color-adjust:exact; ' +
                '}' +
                '.winvoice-print table td.greyy {' +
                'background-color: #ccc!important;-webkit-print-color-adjust:exact;' +
                '}' +
                '.inv1 span.total-amount { ' +
                'color:#fff!important;' +
                '}</style>' +
                '</head>' +
                '<body><div class="row-fluid" ><div id="example" class="k-content">';
            var htmlEnd =
                '</div></div></body>' +
                '</html>';
            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                //win.close();
            }, 2000)
        },
        cancel: function() {
            this.dataSource.data([]);
            banhji.router.navigate("/");
        }
    });
    /*==== End Meter=====*/

    // Invoice
    /*Bill*/
    banhji.runBill = kendo.observable({
        lang: langVM,
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        subLocationDS: dataStore(apiUrl + "locations"),
        boxDS: dataStore(apiUrl + "locations"),
        invoiceDS: dataStore(apiUrl + "winvoices/make"),
        invoiceCollection: dataStore(apiUrl + "winvoices"),
        chkAll: false,
        licenseSelect: null,
        monthSelect: null,
        blocSelect: null,
        totalOfInv: 0,
        meterSold: 0,
        amountSold: 0,
        haveLicense: false,
        haveLocation: false,
        haveSubLocation: false,
        pageLoad: function() {},
        invoiceArray: [],
        checkAll: function(e) {
            var self = this;
            this.set("invoiceArray", []);
            var bolValue = this.get("chkAll");
            var data = this.invoiceDS.data();
            if (bolValue == true) {
                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        value.set("invoiced", bolValue);
                        self.invoiceArray.push(value);
                    });
                    this.set("showButton", true);
                }
            } else {
                this.set("invoiceArray", []);
                $.each(data, function(index, value) {
                    value.set("invoiced", bolValue);
                });
                this.set("showButton", false);
            }
            this.makeBilled();
        },
        total: function() {
            var sum = 0;
            $.each(this.readingDS.data(), function(index, value) {
                sum += kendo.parseInt(value.usage);
            });
            return kendo.toString(sum, "n0");
        },
        licenseChange: function(e) {
            var self = this;
            this.blocDS.data([]);
            this.set("locationSelect", "");
            this.set("haveLicense", false)
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveSubLocation", false);
            this.blocDS.filter([{
                    field: "branch_id",
                    value: this.get("licenseSelect")
                },
                {
                    field: "main_bloc",
                    value: 0
                },
                {
                    field: "main_pole",
                    value: 0
                }
            ]);
            this.set("haveLicense", true);
        },
        onLocationChange: function(e) {
            var self = this;
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveSubLocation", false);
            if (this.get("blocSelect")) {
                this.subLocationDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: 0
                            }
                        ],
                        page: 1
                    })
                    .then(function(e) {
                        if (self.subLocationDS.data().length > 0) {
                            self.set("haveLocation", true);
                        } else {
                            self.set("haveLocation", false);
                            self.set("subLocationSelect", "");
                            self.subLocationDS.data([]);
                        }
                    });
            }
        },
        onSubLocationChange: function(e) {
            var self = this;
            this.boxDS.data([]);
            if (this.get("subLocationSelect")) {
                this.boxDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: this.get("subLocationSelect")
                            }
                        ],
                        page: 1
                    })
                    .then(function(e) {
                        if (self.boxDS.data().length > 0) {
                            self.set("haveSubLocation", true);
                        } else {
                            self.set("haveSubLocation", false);
                            self.set("boxSelect", "");
                            self.boxDS.data([]);
                        }
                    });
            }
        },
        search: function() {
            var monthOfSearch = this.get("monthSelect"),
                license_id = this.get("licenseSelect"),
                bloc_id = this.get("blocSelect");
            pole_id = this.get("subLocationSelect");
            box_id = this.get("boxSelect");
            this.clearAll();
            var para = [];
            var monthPara = [];
            if (monthOfSearch) {
                var monthOf = new Date(monthOfSearch);
                monthOf.setDate(1);
                monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

                var monthL = new Date(monthOfSearch);
                var lastDayOfMonth = new Date(monthL.getFullYear(), monthL.getMonth() + 1, 0);
                lastDayOfMonth = lastDayOfMonth.getDate();

                monthL.setDate(lastDayOfMonth);
                monthL = kendo.toString(monthL, "yyyy-MM-dd");

                para.push({
                    field: "month_of >=",
                    value: monthOf
                }, {
                    field: "month_of <=",
                    value: monthL
                });
                //this.dataSource.filter(para);
                if (license_id) {
                    if (bloc_id) {
                        if (box_id) {
                            para.push({
                                field: "box_id",
                                value: box_id
                            });
                        } else if (pole_id) {
                            para.push({
                                field: "pole_id",
                                value: pole_id
                            });
                        } else {
                            para.push({
                                field: "location_id",
                                value: bloc_id
                            });
                        }
                        this.invoiceDS.query({
                            filter: para,
                            limit: 300
                        });
                    } else {
                        alert("Please Select Location");
                    }
                } else {
                    alert("Please Select License");
                }
            } else {
                alert("Please Select Month Of");
            }
        },
        makeInvoice: function(e) {
            var that = this;
            if (e.data.invoiced) {
                banhji.runBill.invoiceArray.push(e.data);
            } else {
                $.each(banhji.runBill.invoiceArray, function(i, v) {
                    if (e.data == v) {
                        that.invoiceArray.splice(i, 1);
                        return false;
                    }
                });
            }
            if (banhji.runBill.invoiceArray.length > 0) {
                this.set('showButton', true);
            } else {
                this.set('showButton', false);
            }
            banhji.runBill.makeBilled();
        },
        showButton: false,
        exUnitType: null,
        exUnitAmount: null,
        makeBilled: function() {
            this.invoiceCollection.data([]);
            var mSold = 0,
                aSold = 0,
                self = this,
                aSoldL = 0,
                TariffDS = [];
            this.set('totalOfInv', banhji.runBill.invoiceArray.length);
            $.each(banhji.runBill.invoiceArray, function(i, v) {
                var date = new Date(),
                    aTariff = 0,
                    exT = '',
                    exA, exU, rUsage = 0,
                    tUsage = 0,
                    isFlate = 0;
                var rate = banhji.source.getRate(v.locale, date);
                var locale = v.meter.locale;
                var record_id = v.items[0].line.id;
                var invoiceItems = [];
                mSold += kendo.parseInt(v.items[0].line.usage);
                //Add to Itmes
                $.each(v.items, function(index, value) {
                    invoiceItems.push({
                        "item_id": v.meter.id,
                        "invoice_id": 0,
                        "meter_record_id": record_id,
                        "description": value.line.name,
                        "quantity": value.type == 'usage' ? value.line.usage : 1,
                        "price": value.line.amount,
                        "amount": 0,
                        "rate": rate,
                        "locale": locale,
                        "has_vat": false,
                        "type": value.type
                    });
                });
                //Calculate Exemption
                if (v.exemption.length > 0) {
                    var Usage = kendo.parseInt(v.items[0].line.usage),
                        AmountEx = kendo.parseFloat(v.exemption[0].line.amount);
                    if (v.exemption[0].line.unit == 'usage') {
                        //rUsage = Usage - AmountEx;
                        tUsage = Usage - AmountEx;
                    } else {
                        exT = v.exemption[0].line.unit;
                        exA = AmountEx;
                        exU = v.items[0].line.usage;
                        tUsage = exU;
                    }
                } else {
                    exU = v.items[0].line.usage;
                    tUsage = exU;
                    exT = 'usage';
                }

                //Calculate Tariff
                var that = this;
                that.tariffTemp = null;
                $.each(v.tariff, function(j, v) {
                    if (kendo.parseInt(tUsage) >= kendo.parseInt(v.line.usage)) {
                        that.tariffTemp = v;
                        aTariff = v.line.amount;
                    }
                });
                if (that.tariffTemp) {
                    invoiceItems.push({
                        "item_id": that.tariffTemp.line.id,
                        "invoice_id": 0,
                        "meter_record_id": record_id,
                        "description": that.tariffTemp.line.name,
                        "quantity": that.tariffTemp.line.usage,
                        "price": 0,
                        "amount": that.tariffTemp.line.amount,
                        "rate": rate,
                        "locale": locale,
                        "has_vat": false,
                        "type": 'tariff'
                    });
                } else {
                    invoiceItems.push({
                        "item_id": v.tariff[0].line.id,
                        "invoice_id": 0,
                        "meter_record_id": record_id,
                        "description": v.tariff[0].line.name,
                        "quantity": v.tariff[0].line.usage,
                        "price": 0,
                        "amount": v.tariff[0].line.amount,
                        "rate": rate,
                        "locale": locale,
                        "has_vat": false,
                        "type": 'tariff'
                    });
                }
                //Calculate Installment
                if (v.installment.length > 0) {
                    invoiceItems.push({
                        "item_id": v.installment[0].line.id,
                        "invoice_id": 0,
                        "meter_record_id": record_id,
                        "description": v.installment[0].line.name,
                        "quantity": v.installment[0].line.usage,
                        "price": 0,
                        "amount": v.installment[0].line.amount,
                        "rate": rate,
                        "locale": locale,
                        "has_vat": false,
                        "type": 'installment'
                    });
                }
                //Calculate Other Charge
                if (v.maintenance.length > 0) {
                    $.each(v.maintenance, function(i, v) {
                        invoiceItems.push({
                            "item_id": v.line.id,
                            "invoice_id": 0,
                            "meter_record_id": record_id,
                            "description": v.line.name,
                            "quantity": v.line.usage,
                            "price": 0,
                            "amount": v.line.amount,
                            "rate": rate,
                            "locale": locale,
                            "has_vat": false,
                            "type": 'maintenance'
                        });
                    });
                }
                //Calculate Exemption
                if (v.exemption.length > 0) {
                    invoiceItems.push({
                        "item_id": v.exemption[0].line.id,
                        "invoice_id": 0,
                        "meter_record_id": record_id,
                        "description": v.exemption[0].line.name,
                        "quantity": v.exemption[0].line.usage,
                        "price": 0,
                        "amount": v.exemption[0].line.amount,
                        "rate": rate,
                        "locale": locale,
                        "has_vat": false,
                        "type": 'exemption'
                    });
                }
                //Calculate Fine
                if (v.fine.length > 0) {
                    invoiceItems.push({
                        "item_id": v.fine[0].line.id,
                        "invoice_id": 0,
                        "meter_record_id": record_id,
                        "description": v.fine[0].line.name,
                        "quantity": v.fine[0].line.usage,
                        "price": 0,
                        "amount": v.fine[0].line.amount,
                        "rate": rate,
                        "locale": locale,
                        "has_vat": false,
                        "type": 'fine'
                    });
                }
                var ReactivePrice = 0,
                    AmountUsage = 0,
                    AmountReactive = 0;
                //Calculate Reactive
                if (v.reactive != 0) {
                    AmountUsage = v.items[0].line.usage;
                    AmountReactive = v.reactive.usage;
                    var PAmount = (AmountReactive / AmountUsage) - 0484;
                    if (PAmount > 0) {
                        ReactivePrice = (PAmount * AmountUsage) * 0.025;
                    }
                    invoiceItems.push({
                        "item_id": v.reactive.id,
                        "invoice_id": 0,
                        "meter_record_id": record_id,
                        "description": v.reactive.meter_number,
                        "quantity": AmountReactive,
                        "price": 0,
                        "amount": ReactivePrice,
                        "rate": rate,
                        "locale": locale,
                        "has_vat": false,
                        "type": 'reactive'
                    });
                }

                //Calculate Flat
                isFlate = v.tariffM[0].is_flat;
                if (isFlate == 1) {
                    if (tUsage < 1) {
                        tUsage = 1;
                        exU = 1;
                    }
                }
                //Total after Tariff
                var Total = 0;
                if (exT == '%') {
                    exU = kendo.parseFloat(exU) * kendo.parseFloat(aTariff);
                    var exP = (exU * exA) / 100;
                    Total = kendo.parseFloat(exU) - kendo.parseFloat(exP);
                } else if (exT == 'money') {
                    exU = kendo.parseFloat(exU) * kendo.parseFloat(aTariff);
                    Total = kendo.parseFloat(exU) - kendo.parseFloat(exA);
                } else {
                    Total = kendo.parseInt(tUsage) * kendo.parseFloat(aTariff);
                }
                //Installment
                if (v.installment.length > 0) {
                    if (v.installment[0].line.amount > 0) {
                        Total = Total + v.installment[0].line.amount;
                    }
                }
                //Maintenance
                if (v.maintenance.length > 0) {
                    if (v.maintenance[0].line.amount > 0) {
                        Total = Total + v.maintenance[0].line.amount;
                    }
                }
                //Plus Reactive
                var AddH = 0;
                var MTotal = Total;
                Total = Total + ReactivePrice;
                if(banhji.institute.id != 860){
                    if(locale == "km-KH"){
                        Total = Math.ceil(Total/100)*100;
                        MTotal = Total - MTotal;
                        if(MTotal > 0){
                            invoiceItems.push({
                                "item_id": 0,
                                "invoice_id": 0,
                                "meter_record_id": record_id,
                                "description": "ទឹកប្រាក់បូកបង្គ្រប់",
                                "quantity": 1,
                                "price": 0,
                                "amount": MTotal,
                                "rate": rate,
                                "locale": locale,
                                "has_vat": false,
                                "type": 'roundup'
                            });
                        }
                    }
                }
                //Meter Location
                var MeterLocation = v.meter.location_id;
                var MeterPole = v.meter.pole_id;
                var MeterBox = v.meter.box_id;
                var MeterID = v.meter.id;
                
                aSold += Total;
                aSoldL = kendo.toString(aSold, banhji.institute.currency.locale == "km-KH" ? "c0" : "c", v.contact.locale);
                //set INV
                if(v.meter.group == 0){
                    self.calInvoice(Total, v.contact, invoiceItems, MeterLocation, MeterPole, MeterBox, MeterID, locale);
                }else{
                    self.calInvoiceGroup(Total, v.meter.id, v.meter.meter_number, MeterLocation, MeterPole, MeterBox, v.items[0].line.current, v.items[0].line.prev, v.meter.multiplier, v.items[0].line.usage, locale, v.contact, v.tariff, v.fine, v.meter.group, record_id);
                }
            });
            this.set("amountSold", aSoldL);
            this.set("meterSold", mSold);
        },
        calInvoice: function(Total, Contact, invoiceItems, MeterLocation, MeterPole, MeterBox, MeterID, Locale) {
            var self = this;
            var date = new Date();
            var rate = banhji.source.getRate(Locale, date);
            var locale = Locale;
            var MonthOf = kendo.toString(new Date(this.get("FmonthSelect")), "s");
            var IssueDate = kendo.toString(new Date(this.get("IssueDate")), "s");
            var BillingDate = kendo.toString(new Date(this.get("BillingDate")), "s");
            var DueDate = kendo.toString(new Date(this.get("DueDate")), "s");
            this.invoiceCollection.add({
                contact: Contact,
                biller_id: banhji.userData.id,
                type: "Utility_Invoice",
                amount: Total,
                rate: rate,
                locale: locale,
                location_id: MeterLocation,
                pole_id: MeterPole,
                box_id: MeterBox,
                month_of: MonthOf,
                issued_date: IssueDate,
                bill_date: BillingDate,
                due_date: DueDate,
                meter_id: MeterID,
                invoice_lines: invoiceItems
            });
        },
        temGroupArray       : [],
        tmpGroup            : [],
        calInvoiceGroup: function(Total, MeterID, MeterNum, MeterLocation, MeterPole, MeterBox, Current, Previous, Multi, Usage, Locale, Contact, Tariff, Fine, Group,MeterRID) {
            var self = this;
            var date = new Date();
            var rate = banhji.source.getRate(Locale, date);
            this.temGroupArray.push({
                "total": Total,
                "meter_id": MeterID,
                "meter_number": MeterNum,
                "meter_location": MeterLocation,
                "meter_pole": MeterPole,
                "meter_box": MeterBox,
                "current": Current,
                "previous": Previous,
                "multi": Multi,
                "usage": Usage,
                "locale": Locale,
                "rate": rate,
                "contact": Contact,
                "tariff": Tariff,
                "fine": Fine,
                "group": Group,
                "meter_record_id": MeterRID,
            });
            this.tmpGroup = [];
            if (jQuery.inArray(Group, this.tmpGroup) != -1) {
            }else{
                this.tmpGroup.push(Group);
            }
        },
        save: function() {
            var self = this;
            if (this.get("FmonthSelect") && this.get("BillingDate") && this.get("IssueDate") && this.get("DueDate")) {
                $("#loadImport").css("display", "block");
                if(this.tmpGroup.length > 0){
                    this.calGroupInv();
                }else{
                    this.saveInoices();
                }
            } else {
                alert("Fields Required!");
            }
        },
        calGroupInv         : function(){
            var self = this;
            $.each(this.tmpGroup, function(i,v){
                var items = [];
                var Total = 0, aTariff = 0, Usage = 0, Locale = "", Rate = "", MeterID = "", MeterLocation = 0, MeterPole = 0, MeterBox = 0, Contact = "",MeterRecordID = "", Tariff = [], Fine = [];
                $.each(self.temGroupArray, function(j,k){
                    if(k.group == v){
                        items.push({
                            "item_id": k.meter_id,
                            "invoice_id": "",
                            "meter_record_id": k.meter_record_id,
                            "description": k.meter_number,
                            "quantity": k.multi,
                            "price": k.previous,
                            "amount": k.usage,
                            "rate": k.rate,
                            "locale": k.locale,
                            "type": "meter"
                        });
                    }
                    if(j == 0){
                        Locale = k.locale;
                        Rate = k.rate;
                        MeterID = k.meter_id;
                        MeterLocation = k.meter_location;
                        MeterPole = k.meter_pole;
                        MeterBox = k.meter_box;
                        Contact = k.contact;
                        Tariff = k.tariff;
                        Fine = k.fine;
                        MeterRecordID = k.meter_record_id;
                    }
                    Usage += k.usage;
                });
                //Calculate Tariff
                $.each(Tariff, function(x, y) {
                    if (kendo.parseInt(Usage) >= kendo.parseInt(y.line.usage)) {
                        aTariff = y.line.amount;
                    }
                });
                items.push({
                    "item_id": MeterID,
                    "invoice_id": "",
                    "meter_record_id": MeterID,
                    "description": "សរុបថាមពល",
                    "quantity": "",
                    "price": aTariff,
                    "amount": Usage,
                    "rate": Rate,
                    "locale": Locale,
                    "type": "total_usage"
                });
                Total = Usage * aTariff;
                //Plus Round Money KH
                var AddH = 0;
                var MTotal = Total;
                if(Locale == "km-KH"){
                    Total = Math.ceil(Total/100)*100;
                    MTotal = Total - MTotal;
                    if(MTotal > 0){
                        items.push({
                            "item_id": 0,
                            "invoice_id": 0,
                            "meter_record_id": MeterID,
                            "description": "ទឹកប្រាក់បូកបង្គ្រប់",
                            "quantity": 1,
                            "price": 0,
                            "amount": MTotal,
                            "rate": Rate,
                            "locale": Locale,
                            "has_vat": false,
                            "type": 'roundup'
                        });
                    }
                }
                if(Fine.length > 0){
                    items.push({
                        "item_id": Fine[0].line.id,
                        "invoice_id": 0,
                        "meter_record_id": MeterID,
                        "description": Fine[0].line.name,
                        "quantity": Fine[0].line.usage,
                        "price": 0,
                        "amount": Fine[0].line.amount,
                        "rate": Rate,
                        "locale": Locale,
                        "has_vat": false,
                        "type": 'fine'
                    });
                }
                var date = new Date();
                var locale = Locale;
                var MonthOf = kendo.toString(new Date(self.get("FmonthSelect")), "s");
                var IssueDate = kendo.toString(new Date(self.get("IssueDate")), "s");
                var BillingDate = kendo.toString(new Date(self.get("BillingDate")), "s");
                var DueDate = kendo.toString(new Date(self.get("DueDate")), "s");
                self.invoiceCollection.add({
                    contact: Contact,
                    biller_id: banhji.userData.id,
                    type: "Utility_Invoice",
                    amount: Total,
                    rate: Rate,
                    locale: locale,
                    location_id: MeterLocation,
                    pole_id: MeterPole,
                    box_id: MeterBox,
                    month_of: MonthOf,
                    issued_date: IssueDate,
                    bill_date: BillingDate,
                    due_date: DueDate,
                    meter_id: MeterID,
                    invoice_lines: items
                });
            });
            this.saveInoices();
        },
        saveInoices         : function(){
            var self = this;
            this.invoiceCollection.sync();
            this.invoiceCollection.bind("requestEnd", function(e) {
                if (e.type != 'read') {
                    if (e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        self.invoiceCollection.data([]);
                        self.invoiceDS.data([]);
                        self.set("monthSelect", null);
                        self.set("licenseSelect", null);
                        self.set("blocSelect", null);
                        self.set("FmonthSelect", null);
                        self.set("BillingDate", null);
                        self.set("DueDate", null);
                        self.set("IssueDate", null);
                        self.tmpGroup = [];
                        self.invoiceArray = [];
                        banhji.router.navigate("/print_bill");
                    }
                }
            });
            this.invoiceCollection.bind("error", function(e) {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(self.lang.lang.error_message);
                $("#loadImport").css("display", "none");
            });
        },
        clearAll: function() {
            this.set("chkAll", false);
            this.invoiceArray = [];
            this.set("totalOfInv", 0);
            this.set("meterSold", 0);
            this.set("amountSold", 0);
        },
        cancel: function() {
            this.invoiceCollection.data([]);
            this.invoiceDS.data([]);
            this.set("monthSelect", null);
            this.set("licenseSelect", null);
            this.set("blocSelect", null);
            this.set("FmonthSelect", null);
            this.set("BillingDate", null);
            this.set("DueDate", null);
            this.set("IssueDate", null);
            this.invoiceArray = [];
            banhji.router.navigate("/");
        }
    });
    banhji.printBill = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "branches"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        subLocationDS: dataStore(apiUrl + "locations"),
        boxDS: dataStore(apiUrl + "locations"),
        invoiceDS: dataStore(apiUrl + "winvoices/make"),
        attachmentDS: dataStore(apiUrl + "attachments"),
        printBTN: false,
        invoiceCollection: banhji.invoice,
        invoiceNoPrint: new kendo.data.DataSource({
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
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        }),
        selectInv: false,
        chkAll: false,
        licenseSelect: null,
        monthSelect: null,
        TemplateSelect: null,
        SelectSize: null,
        obj: [],
        blocSelect: null,
        totalInv: 0,
        noPrint: 0,
        amountTotal: 0,
        totalMeter: 0,
        haveLicense: false,
        haveLocation: false,
        haveSubLocation: false,
        pageLoad: function(id) {
            this.txnTemplateDS.filter({
                field: "moduls",
                value: "water_mg"
            });
        },
        printArray: [],
        checkAll: function(e) {
            var self = this;
            e.preventDefault();
            this.set("printArray", []);
            var bolValue = this.get("chkAll");
            var data = this.invoiceCollection.dataSource.data();
            if (bolValue == true) {
                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        value.set("printed", bolValue);
                        self.printArray.push(value);
                    });
                }
            } else {
                this.set("printArray", []);
                $.each(data, function(index, value) {
                    value.set("printed", bolValue);
                });
            }
            this.preparePrint();
        },
        isCheck: function(e) {
            var that = this;
            this.set("chkAll", false);
            if (e.data.printed) {
                this.printArray.push(e.data);
            } else {
                $.each(this.printArray, function(i, v) {
                    if (e.data == v) {
                        that.printArray.splice(i, 1);
                        return false;
                    }
                });
            }
            this.preparePrint();
        },
        preparePrint: function() {
            var self = this,
                AmountT = 0,
                AmountTA = 0,
                tMeter = 0;
            $.each(this.printArray, function(i, v) {
                tMeter += kendo.parseInt(v.consumption);
                AmountT += kendo.parseFloat(v.amount);
                AmountTA = kendo.toString(AmountT, banhji.institute.currency.locale == "km-KH" ? "c0" : "c", v.locale);
            });
            this.set("amountTotal", AmountTA);
            this.set("totalMeter", tMeter);
            this.set("totalInv", this.printArray.length);
        },
        blocEnable: false,
        licenseChange: function(e) {
            var self = this;
            this.blocDS.data([]);
            this.set("locationSelect", "");
            this.set("haveLicense", false)
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveSubLocation", false);

            this.blocDS.filter([{
                    field: "branch_id",
                    value: this.get("licenseSelect")
                },
                {
                    field: "main_bloc",
                    value: 0
                },
                {
                    field: "main_pole",
                    value: 0
                }
            ]);
            this.set("haveLicense", true);
            this.dataSource.query({
                filter: {
                    field: "id",
                    value: this.get("licenseSelect")
                }
            }).then(function(e) {
                var view = self.dataSource.view();
                banhji.InvoicePrint.license = view[0];
            });
        },
        onLocationChange: function(e) {
            var self = this;
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveSubLocation", false);
            if (this.get("blocSelect")) {
                this.subLocationDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: 0
                            }
                        ],
                        page: 1
                    })
                    .then(function(e) {
                        if (self.subLocationDS.data().length > 0) {
                            self.set("haveLocation", true);
                        } else {
                            self.set("haveLocation", false);
                            self.set("subLocationSelect", "");
                            self.subLocationDS.data([]);
                        }
                    });
            }
        },
        onSubLocationChange: function(e) {
            var self = this;
            if (this.get("subLocationSelect")) {
                this.boxDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: this.get("subLocationSelect")
                            }
                        ]
                    })
                    .then(function(e) {
                        if (self.boxDS.data().length > 0) {
                            self.set("haveSubLocation", true);
                        } else {
                            self.set("haveSubLocation", false);
                            self.set("boxSelect", "");
                            self.boxDS.data([]);
                        }
                    });
            }
        },
        noPrintIDTransaction: [],
        exArray: [],
        search: function() {
            var monthOfSearch = this.get("monthSelect"),
                license_id = this.get("licenseSelect"),
                bloc_id = this.get("blocSelect"),
                self = this;
            this.clearAll();
            this.set("noPrint", 0);
            var para = [];
            this.exArray = [];
            if (monthOfSearch) {
                var monthOf = new Date(monthOfSearch);
                monthOf.setDate(1);
                monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
                var monthL = new Date(monthOfSearch);
                var lastDayOfMonth = new Date(monthL.getFullYear(), monthL.getMonth() + 1, 0);
                lastDayOfMonth = lastDayOfMonth.getDate();
                monthL.setDate(lastDayOfMonth);
                monthL = kendo.toString(monthL, "yyyy-MM-dd");
                this.noPrintIDTransaction = [];
                para.push({
                    field: "month_of >=",
                    value: monthOf
                }, {
                    field: "month_of <=",
                    value: monthL
                });
                if (license_id) {
                    if (bloc_id) {
                        para.push({
                            field: "type",
                            value: "Utility_Invoice"
                        });
                        if (this.get("boxSelect")) {
                            para.push({
                                field: "box_id",
                                value: this.get("boxSelect")
                            });
                        } else if (this.get("subLocationSelect")) {
                            para.push({
                                field: "pole_id",
                                value: this.get("subLocationSelect")
                            });
                        } else {
                            para.push({
                                field: "location_id",
                                value: this.get("blocSelect")
                            });
                        }
                        this.invoiceCollection.dataSource.query({
                            filter: para,
                            order: {
                                field: "worder",
                                operator: "where_related_meter",
                                dir: "asc"
                            }
                        }).then(function(e) {

                            var numberNoPrint = 0;
                            self.exArray.push({
                                cells: [{
                                        value: "Invoice Number",
                                        bold: true,
                                        background: "#bbbbbb"
                                    },
                                    {
                                        value: "Customer Code",
                                        background: "#bbbbbb"
                                    },
                                    {
                                        value: "Customer Name",
                                        background: "#bbbbbb"
                                    },
                                    {
                                        value: "Invoice Date",
                                        background: "#bbbbbb"
                                    },
                                    {
                                        value: "Amount",
                                        background: "#bbbbbb"
                                    }
                                ]
                            });
                            $.each(self.invoiceCollection.dataSource.data(), function(i, v) {
                                if (v.print_count == 0) {
                                    self.noPrintIDTransaction.push(v.id);
                                    numberNoPrint++;
                                }
                                self.exArray.push({
                                    cells: [{
                                            value: v.number
                                        },
                                        {
                                            value: v.contact.number
                                        },
                                        {
                                            value: v.contact.name
                                        },
                                        {
                                            value: v.issue_date
                                        },
                                        {
                                            value: (v.amount + v.amount_remain)
                                        }
                                    ]
                                });
                            });
                            self.set("noPrint", numberNoPrint);
                        });
                        this.set("selectInv", true);
                    } else {
                        alert("Please Select Location");
                    }
                } else {
                    alert("Please Select License");
                }
            } else {
                alert("Please Select Month Of");
            }
        },
        goNoPrint: function() {
            if (this.noPrintIDTransaction.length > 0) {
                this.clearAll();
                var noPArray = [];
                $.each(this.noPrintIDTransaction, function(i, v) {
                    noPArray.push(v);
                });
                this.invoiceCollection.dataSource.query({
                    filter: {
                        field: "id",
                        operator: "where_in",
                        value: noPArray
                    }
                });
            }
        },
        clearAll: function() {
            this.set("chkAll", false);
            this.printArray = [];
            this.set("totalInv", 0);
            this.set("amountTotal", 0);
            this.set("totalMeter", 0);
        },
        txnTemplateDS: dataStore(apiUrl + "transaction_templates"),
        printBill: function() {
            if (this.get("TemplateSelect")) {
                if (this.invoiceCollection.dataSource.total() > 0) {
                    if (this.printArray.length > 0) {
                        var self = this;
                        banhji.InvoicePrint.dataSource = [];
                        this.txnTemplateDS.query({
                                filter: {
                                    field: "id",
                                    value: this.get("TemplateSelect")
                                }
                            })
                            .then(function(e) {
                                if (self.txnTemplateDS.data()[0].transaction_form_id == "45") {
                                    banhji.InvoicePrint.formVisible = 'visibility: visible;';
                                    banhji.InvoicePrint.formBorder = 'border: 1px solid #000!important;';
                                    if (self.txnTemplateDS.data()[0].color) {
                                        banhji.InvoicePrint.formColor = self.txnTemplateDS.data()[0].color;
                                        $.each(self.printArray, function(index, value) {
                                            self.printArray[index].formcolor = self.txnTemplateDS.data()[0].color;
                                            banhji.InvoicePrint.dataSource.push(self.printArray[index]);
                                        });
                                    } else {
                                        $.each(self.printArray, function(index, value) {
                                            self.printArray[index].formcolor = "#355176";
                                            banhji.InvoicePrint.dataSource.push(self.printArray[index]);
                                        });
                                    }
                                } else {
                                    if (self.txnTemplateDS.data()[0].transaction_form_id == "44") {
                                        banhji.InvoicePrint.formVisible = 'visibility: hidden;';
                                        banhji.InvoicePrint.formBorder = 'border: 1px solid #fff!important;';
                                    } else {
                                        banhji.InvoicePrint.formVisible = 'visibility: visible;';
                                        banhji.InvoicePrint.formBorder = 'border: 1px solid #000!important;';
                                    }
                                    if (self.txnTemplateDS.data()[0].color) {
                                        banhji.InvoicePrint.formColor = self.txnTemplateDS.data()[0].color;
                                        $.each(self.printArray, function(index, value) {
                                            self.printArray[index].formcolor = self.txnTemplateDS.data()[0].color;
                                            banhji.InvoicePrint.dataSource.push(self.printArray[index]);
                                        });
                                    } else {
                                        $.each(self.printArray, function(index, value) {
                                            self.printArray[index].formcolor = "#355176";
                                            banhji.InvoicePrint.dataSource.push(self.printArray[index]);
                                        });
                                    }
                                }
                                banhji.InvoicePrint.txnFormID = self.txnTemplateDS.data()[0].transaction_form_id;
                                banhji.router.navigate('/invoice_print');
                            });
                    } else {
                        alert("Please check the box!");
                    }
                } else {
                    alert("No data found");
                }
            } else {
                alert("Please Select Template!");
            }
        },
        ExportExcel: function() {
            if (this.exArray.length > 1) {
                $("#loadImport").css("display", "none");
                var workbook = new kendo.ooxml.Workbook({
                    sheets: [{
                        columns: [{
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            }
                        ],
                        title: "Receive",
                        rows: this.exArray
                    }]
                });
                //save the file as Excel file with extension xlsx
                kendo.saveAs({
                    dataURI: workbook.toDataURL(),
                    fileName: "Receive.xlsx"
                });
            }
        },
        cancel: function() {
            this.invoiceCollection.dataSource.data([]);
            this.invoiceDS.data([]);
            this.set("monthSelect", null);
            this.set("licenseSelect", null);
            this.set("blocSelect", null);
            this.noPrintIDTransaction = [];
            this.set("noPrint", 0);
            this.clearAll();
            banhji.router.navigate("/");
        }
    });
    banhji.InvoicePrint = kendo.observable({
        lang: langVM,
        invoiceDS: dataStore(baseUrl + "invoices"),
        dataSource: [],
        isVisible: true,
        company: banhji.institute,
        license: [],
        TemplateSelect: null,
        txnFormID: null,
        user_id: banhji.userManagement.getLogin() === null ? '' : banhji.userManagement.getLogin().id,
        formColor: "#355176",
        formVisible: "visibility: visible;",
        formBorder: "border: 1px solid #000!important;",
        pageLoad: function(id) {
            if (this.dataSource.length <= 0) {
                banhji.router.navigate('/print_bill');
            }
            var self = this,
                TempForm = "";
            if (this.txnFormID == "45") {
                TempForm = $("#InvoiceFormTemplate2").html();
            } else if (this.txnFormID == "49") {
                TempForm = $("#InvoiceFormElectric").html();
            } else {
                TempForm = $("#InvoiceFormTemplate1").html();
            }
            $("#wInvoiceContent").kendoListView({
                dataSource: this.dataSource,
                template: kendo.template(TempForm)
            });
            for (var i = 0; i < this.dataSource.length; i++) {
                var PrintCount = this.dataSource[i].print_count + 1;
                banhji.InvoicePrint.dataSource[i].set("print_count", PrintCount);
            }
            this.barcod("do");
        },
        barcod: function(re) {
            var view = this.dataSource;
            for (var i = 0; i < view.length; i++) {
                var d = view[i];
                if (re == "reset") {
                    $("#secondwnumber" + d.id).css("height", "0px").data("kendoBarcode").resize();
                    $("#footwnumber" + d.id).css("height", "0px").data("kendoBarcode").resize();
                } else {
                    $("#secondwnumber" + d.id).kendoBarcode({
                        renderAs: "svg",
                        value: d.number,
                        type: "code128",
                        width: 200,
                        height: 25,
                        text: {
                            visible: false
                        }
                    });
                    $("#footwnumber" + d.id).kendoBarcode({
                        renderAs: "svg",
                        value: d.number,
                        type: "code128",
                        width: 200,
                        height: 25,
                        text: {
                            visible: false
                        }
                    });
                }
                var DataM = [],
                    MonthM = [];
                $.each(d.minusMonth, function(i, v) {
                    DataM.push(v.usage);
                    MonthM.push(v.month);
                });
                $("#monthchart" + d.id).kendoChart({
                    title: {
                        text: ""
                    },
                    series: [{
                        name: "",
                        data: DataM,
                        color: '#236DA4',
                        overlay: {
                            gradient: 'none'
                        }
                    }],
                    categoryAxis: {
                        categories: MonthM
                    }
                });
            }
        },
        printGrid: function() {
            var self = this,
                Win, pHeight, pWidth, ts;
            if (this.txnFormID == "45") {
                Win = window.open('', '', 'width=1050, height=900');
                pHeight = "215mm";
                pWidth = "297mm";
                var colorM = this.formColor;
                if (colorM == '#000000' || colorM == '#1f497d' || colorM == null) {
                    ts = 'color: #fff!important;';
                } else {
                    ts = 'color: #333;';
                }
                console.log(colorM);
                banhji.invoice.dataSource.sync();
                var gridElement = $('#grid'),
                    printableContent = '',
                    win = Win,
                    doc = win.document.open();
                var htmlStart =
                    '<!DOCTYPE html>' +
                    '<html>' +
                    '<head>' +
                    '<meta charset="utf-8" />' +
                    '<title></title>' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>resources/js/kendoui/styles/kendo.bootstrap.min.css">' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                    '<link href="<?php echo base_url(); ?>assets/water/water.css" rel="stylesheet" />' +
                    '<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.common.min.css" rel="stylesheet" />' +
                    '<link href="<?php echo base_url(); ?>assets/water/winvoice-print.css" rel="stylesheet" />' +
                    '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
                    '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" />' +
                    '<link href="https://fonts.googleapis.com/css?family=Preahvihear" rel="stylesheet" />' +
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Battambang&amp;subset=khmer" media="all">' +
                    '<style type="text/css" media="print">' +
                    '@page { size: portrait; margin:0.1cm;' +
                    'size: A4;' +
                    '} ' +
                    '* {font-weight: lighter!important;}' +
                    '@media print {' +
                    'html, body {' +
                    'max-width: ' + pWidth + ';' +
                    'max-height: ' + pHeight + ';' +
                    'min-width: ' + pWidth + ';' +
                    'min-height: ' + pHeight + ';' +
                    '}' +
                    '.main-color {' +
                    'background-color: ' + colorM + '!important; ' + ts +
                    '-webkit-print-color-adjust:exact; ' +
                    '} ' +
                    '}' +
                    '.main-color {' +
                    'background-color: ' + colorM + '!important; ' + ts +
                    '-webkit-print-color-adjust:exact; ' +
                    '} ' +
                    '.inv1 .light-blue-td { ' +
                    'background-color: #c6d9f1!important;' +
                    'text-align: left;' +
                    'padding-left: 5px;' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.logoP{ max-height 50px;max-width100px}' +
                    '.inv1 thead tr {' +
                    'background-color: rgb(242, 242, 242)!important;' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.pcg .mid-title div {}' +
                    '.pcg .mid-header {' +
                    'background-color: #dce6f2!important; ' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.winvoice-print table thead .darkbblue, .winvoice-print table tbody td.darkbblue { ' +
                    'background-color: #355176!important;' +
                    'color: #fff!important;' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.winvoice-print table td.greyy {' +
                    'background-color: #ccc!important;-webkit-print-color-adjust:exact;' +
                    '}' +
                    '.inv1 span.total-amount { ' +
                    'color:#fff!important;' +
                    '}</style>' +
                    '</head>' +
                    '<body style="background: #fff;"><div class="row-fluid" ><div id="example" class="k-content" style="width: 1000px;overflow: hidden">';
                var htmlEnd =
                    '</div></div></body>' +
                    '</html>';
                printableContent = $('#wInvoiceContent').html();
                doc.write(htmlStart + printableContent + htmlEnd);
                doc.close();
                setTimeout(function() {
                    win.print();
                    //win.close();
                }, 2000);
            } else {
                Win = window.open('', '', 'width=1000, height=900');
                pHeight = "210mm";
                pWidth = "150mm";
                var colorM = this.formColor;
                if (colorM == '#000000' || colorM == '#1f497d' || colorM == null) {
                    ts = 'color: #fff!important;';
                } else {
                    ts = 'color: #333;';
                }
                console.log(colorM);
                banhji.invoice.dataSource.sync();
                var gridElement = $('#grid'),
                    printableContent = '',
                    win = Win,
                    doc = win.document.open();
                var htmlStart =
                    '<!DOCTYPE html>' +
                    '<html>' +
                    '<head>' +
                    '<meta charset="utf-8" />' +
                    '<title></title>' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>resources/js/kendoui/styles/kendo.bootstrap.min.css">' +
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                    '<link href="<?php echo base_url(); ?>assets/water/water.css" rel="stylesheet" />' +
                    '<link href="<?php echo base_url(); ?>assets/water/winvoice-print.css" rel="stylesheet" />' +
                    '<link href="<?php echo base_url(); ?>resources/common/theme/css/style-default-menus-dark.css" rel="stylesheet" />' +
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Battambang&amp;subset=khmer" media="all">' +
                    '<style type="text/css" media="print">' +
                    '@page { size: portrait; margin:0.2cm;' +
                    'size: A5;' +
                    '} ' +
                    '@media print {' +
                    'html, body {' +
                    '}' +
                    '.main-color {' +
                    'background-color: ' + colorM + '!important; ' + ts +
                    '-webkit-print-color-adjust:exact; ' +
                    '} ' +
                    '}' +
                    '.main-color {' +
                    'background-color: ' + colorM + '!important; ' + ts +
                    '-webkit-print-color-adjust:exact; ' +
                    '} ' +
                    '.inv1 .light-blue-td { ' +
                    'background-color: #c6d9f1!important;' +
                    'text-align: left;' +
                    'padding-left: 5px;' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.logoP{ max-height 50px;max-width100px}' +
                    '.inv1 thead tr {' +
                    'background-color: rgb(242, 242, 242)!important;' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.pcg .mid-title div {}' +
                    '.pcg .mid-header {' +
                    'background-color: #dce6f2!important; ' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.winvoice-print table thead .darkbblue, .winvoice-print table tbody td.darkbblue { ' +
                    'background-color: #355176!important;' +
                    'color: #fff!important;' +
                    '-webkit-print-color-adjust:exact; ' +
                    '}' +
                    '.winvoice-print table td.greyy {' +
                    'background-color: #ccc!important;-webkit-print-color-adjust:exact;' +
                    '}' +
                    '.inv1 span.total-amount { ' +
                    'color:#fff!important;' +
                    '}</style>' +
                    '</head>' +
                    '<body style="background: #fff;"><div class="row-fluid" ><div id="example" class="k-content">';
                var htmlEnd =
                    '</div></div></body>' +
                    '</html>';
                printableContent = $('#wInvoiceContent').html();
                doc.write(htmlStart + printableContent + htmlEnd);
                doc.close();
                setTimeout(function() {
                    win.print();
                    //win.close();
                }, 2000);
            }
        },
        hideFrameInvoice: function(e) {
            var printBtn = e.target;
            if (printBtn.checked) {
                $(".hiddenPrint").css("visibility", "hidden");
            } else {
                $(".hiddenPrint").css("visibility", "visible");
            }
        },
        cancel: function() {
            this.dataSource = [];
            this.barcod("reset");
            var listview = $("#wInvoiceContent").data("kendoListView");
            listview.refresh();
            window.history.back();
        }
    });
    banhji.reconReceipt = kendo.observable({
        dataSource: dataStore(apiUrl + 'cashier_sessions/reconcile'),
        sDate: new Date(2016, 01, 12, 01),
        eDate: new Date(),
        search: function() {
            var dfd = $.Deferred();
            banhji.reconReceipt.dataSource.query({
                filter: {
                    field: "status",
                    value: "0"
                },
                limit: 1
            }).then(function(e) {
                if (banhji.reconReceipt.dataSource.data().length > 0) {
                    dfd.resolve(banhji.reconReceipt.dataSource.data());
                } else {
                    dfd.reject(false);
                }
            });
            return dfd.promise();
        },
        addRow: function() {
            banhji.reconReceipt.dataSource.add({
                code: null,
                amount: 0,
                _date: Date.now()
            });
        },
        rmCurrencyRow: function(e) {
            banhji.reconReceipt.dataSource.remove(e.data);
        },
        sync: function() {
            banhji.reconReceipt.dataSource.sync();
        }
    });
    banhji.reconList = kendo.observable({
        dataSource: dataStore(apiUrl + 'reconciles/item'),
        cashReceiptArr: [],
        addRow: function() {
            // var that = this;
            banhji.reconList.dataSource.add({
                reconcile_id: null,
                code: "USD",
                note: 1,
                unit: 0,
                total: 0
            });
            // alert("l");
        },
        removeRow: function(e) {
            if (banhji.reconList.dataSource.data().length > 1) {
                banhji.reconList.dataSource.remove(e.data);
            }
        },
        onChange: function(e) {
            e.data.set('total', e.data.note * e.data.unit);
        },
        countActual: function(data) {
            var self = this,
                temp = [];
            banhji.reconList.cashReceiptArr.splice(0, banhji.reconList.cashReceiptArr.length);
            $.each(data, function(i, v) {
                temp.push({
                    code: v.code,
                    total: 0
                });
            });
            $.each(temp, function(x, y) {
                $.each(banhji.reconList.dataSource.data(), function(i, v) {
                    if (temp[x].code == v.code) {
                        temp[x].total += v.total;
                    }
                });
            });
            $.each(temp, function(i, v) {
                banhji.reconList.cashReceiptArr.push(v);
            });
        },
        sync: function(id) {
            var dfd = $.Deferred();
            $.each(banhji.reconList.dataSource.data(), function(i, v) {
                v.set('reconcile_id', id);
            });
            banhji.reconList.dataSource.sync();
            banhji.reconList.dataSource.bind('requestEnd', function(e) {
                if (e.type !== 'read' && e.response) {
                    dfd.resolve(e.response.results);
                }
            });
            banhji.reconList.dataSource.bind('error', function(e) {
                dfd.reject(e.status);
            });

            return dfd.promise();
        }
    });
    banhji.reconcileVM = kendo.observable({
        dataSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'reconciles',
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create: {
                    url: apiUrl + 'reconciles',
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update: {
                    url: apiUrl + 'reconciles',
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy: {
                    url: apiUrl + 'reconciles',
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
        cancel: function() {
            this.dataSource.cancelChanges();
            this.list.dataSource.cancelChanges();
            this.currencyVM.dataSource.cancelChanges();
            window.history.back();
        },
        receiptDS: [],
        currencyDS: [],
        currencyList: [],
        list: banhji.reconList,
        currencyVM: banhji.reconReceipt,
        search: function() {
            banhji.reconcileVM.receiptDS.splice(0, banhji.reconcileVM.receiptDS.length);
            this.currencyVM.search()
                .then(function(success) {
                    $.each(banhji.reconcileVM.currencyVM.dataSource.data(), function(i, v) {
                        banhji.reconcileVM.receiptDS.push(v);
                    });
                }, function(error) {});
        },
        setCurrent: function(current) {
            this.set('current', current);
        },
        notMatch: false,
        verify: function() {
            banhji.reconcileVM.receiptDS.splice(0, banhji.reconcileVM.receiptDS.length);
            this.currencyVM.search()
                .then(function(data) {
                    $.each(data, function(i, v) {
                        banhji.reconcileVM.receiptDS.push(v);
                    });
                    banhji.reconcileVM.list.countActual(data);
                }, function(error) {});
        },
        sync: function() {
            var dfd = $.Deferred();
            banhji.reconcileVM.add({
                cashier: banhji.userData.id,
                memo: "",
                currencies: banhji.reconcileVM.currencyList
            });
            banhji.reconcileVM.dataSource.sync();
            banhji.reconcileVM.dataSource.bind('requestEnd', function(e) {
                banhji.reconcileVM.list.sync(e.response.results[0].id);
                $.each(banhji.reconcileVM.currencyVM.dataSource.data(), function(i, v) {
                    v.set('status', 1);
                });
                banhji.reconcileVM.currencyVM.dataSource.sync();
            });
            banhji.reconcileVM.dataSource.bind('error', function(e) {});
        }
    });
    banhji.cashReceipt = kendo.observable({
        lang: langVM,
        numCustomer: 0,
        paymentReceiptToday: 0,
        currencyDS: banhji.source.currencyDS,
        reconcileVM: banhji.reconcileVM,
        reconReceipt: banhji.reconReceipt,
        cashCurrencyDS: [],
        addRow: function() {
            this.cashCurrencyDS.push({
                id: 1,
                code: "USD",
                cash_receipt: 0
            });
            this.cashCurrencyDS.push({
                id: 3,
                code: "KHR",
                cash_receipt: 0
            });
        },
        removeCurrencyRow: function(e) {
            var that = this;
            $.each(this.cashCurrencyDS, function(i, v) {
                if (v === e.data) {
                    that.cashCurrencyDS.splice(i, 1);
                    return false;
                }
            });
        },
        dataSource: dataStore(apiUrl + "transactions"),
        deleteDS: dataStore(apiUrl + "transactions"),
        invoiceDS: dataStore(apiUrl + "transactions"),
        creditDS: dataStore(apiUrl + "transactions"),
        journalLineDS: dataStore(apiUrl + "journal_lines"),
        currencyRateDS: dataStore(apiUrl + "currencies/rate"),
        contactDS: banhji.source.customerDS,
        employeeDS: banhji.source.saleRepDS,
        accountDS: new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: [{
                    field: "account_type_id",
                    value: 10
                },
                {
                    field: "status",
                    value: 1
                }
            ],
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        paymentTermDS: banhji.source.paymentTermDS,
        paymentMethodDS: banhji.source.paymentMethodDS,
        txnTemplateDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "transaction_templates",
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
                field: "type",
                value: "Cash_Receipt"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        segmentItemDS: banhji.source.segmentItemDS,
        amtDueColor: banhji.source.amtDueColor,
        showCheckNo: false,
        obj: null,
        isEdit: false,
        saveClose: false,
        savePrint: false,
        searchText: "",
        contact_id: "",
        invoice_id: 0,
        sub_total: 0,
        discount: 0,
        total: 0,
        pay: 0,
        remain: 0,
        user_id: banhji.source.user_id,
        pageLoad: function(id) {
            if (id) {
                this.set("isEdit", true);
                this.loadObj(id);
            } else {
                if (this.get("isEdit") || this.dataSource.total() == 0) {
                    this.addEmpty();
                }
            }
        },
        loadInvoice: function(id) {
            this.set("invoice_id", id);
            this.search();
        },
        //Contact
        loadContact: function(id) {
            this.set("contact_id", id);
            this.search();
        },
        contactChanges: function() {
            this.search();
        },
        //Payment Method
        issuedDateChanges: function() {
            this.applyTerm();
            this.setRate();
        },
        applyTerm: function() {
            var self = this,
                obj = this.get("obj"),
                today = new Date();
            $.each(this.dataSource.data(), function(index, value) {
                var term = value.payment_term_id != "0" ? self.paymentTermDS.get(value.payment_term_id) : 0,
                    percentage = term != 0 ? term.discount_percentage : 0,
                    period = term.discount_period || 0,
                    termDate = new Date(value.reference[0].issued_date);
                termDate.setDate(termDate.getDate() + period);
                if (today <= termDate) {
                    if (value.amount_paid == 0) {
                        var amount = value.reference[0].amount * percentage;
                        value.set("discount", amount);
                        value.set("amount", value.reference[0].amount - amount);
                    }
                }
            });
        },
        //Currency Rate   
        setRate: function() {
            var obj = this.get("obj");
            $.each(this.dataSource.data(), function(index, value) {
                var rate = banhji.source.getRate(value.locale, new Date(obj.issued_date));
                value.set("rate", rate);
            });
            this.changes();
        },
        //Segments    
        segmentChanges: function(e) {
            var dataArr = this.get("obj").segments,
                lastIndex = dataArr.length - 1,
                last = this.segmentItemDS.get(dataArr[lastIndex]);
            if (dataArr.length > 1) {
                for (var i = 0; i < dataArr.length - 1; i++) {
                    var current_index = dataArr[i],
                        current = this.segmentItemDS.get(current_index);
                    if (current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        //Search    
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                date = kendo.toString(new Date(obj.issued_date), "yyyy-MM-dd"),
                searchText = this.get("searchText"),
                invoice_id = this.get("invoice_id"),
                contact_id = this.get("contact_id");
            if (contact_id > 0) {
                para.push({
                    field: "contact_id",
                    value: contact_id
                });
            }
            if (invoice_id > 0) {
                para.push({
                    field: "id",
                    value: invoice_id
                });
            }
            if (searchText !== "") {
                para.push({
                    field: "number",
                    value: searchText
                });
            }
            para.push({
                field: "type",
                value: "Utility_Invoice"
            });
            para.push({
                field: "status",
                operator: "where_in",
                value: [0, 2]
            });
            if (this.dataSource.total() > 0) {
                var idList = [];
                $.each(this.dataSource.data(), function(index, value) {
                    idList.push(value.reference_id);
                });
            }
            this.invoiceDS.query({
                filter: para,
                page: 1,
                pageSize: 100
            }).then(function() {
                var view = self.invoiceDS.view();
                if (view.length > 0) {
                    $.each(view, function(index, value) {
                        var amount_due = value.amount - (value.amount_paid + value.deposit);
                        var contact = banhji.source.contactDS.get(value.contact_id);
                        self.dataSource.add({
                            transaction_template_id: 0,
                            number: value.number,
                            contact_id: value.contact_id,
                            account_id: obj.account_id,
                            payment_term_id: value.payment_term_id,
                            payment_method_id: obj.payment_method_id,
                            reference_id: value.id,
                            user_id: self.get("user_id"),
                            check_no: value.check_no,
                            type: "Cash_Receipt",
                            amount: amount_due,
                            discount: 0,
                            rate: value.rate,
                            locale: value.locale,
                            issued_date: obj.issued_date,
                            memo: obj.memo,
                            memo2: obj.memo2,
                            due_date: value.due_date,
                            status: 0,
                            segments: obj.segments,
                            is_journal: 1,
                            //Recurring
                            recurring_name: "",
                            discount_period: typeof value.discount_period !== undefined ? value.discount_period : null,
                            start_date: new Date(),
                            frequency: "Daily",
                            month_option: "Day",
                            interval: 1,
                            day: 1,
                            week: 0,
                            month: 0,
                            is_recurring: 0,
                            contact: {
                                id: contact.id,
                                name: contact.name
                            },
                            amount_due: kendo.toString(amount_due, value.locale == "km-KH" ? "c0" : "c", value.locale),
                            amount_paid: value.amount_paid,
                            reference: [{
                                "number": value.number,
                                "amount": value.amount,
                                "deposit": value.deposit,
                                "issued_date": value.issued_date,
                                "account_id": value.account_id
                            }]
                        });
                        self.set('numCustomer', self.get('numCustomer') + 1);
                    });
                    self.applyTerm();
                    self.setRate();
                }
                self.set("searchText", "");
                self.set("contact_id", "");
                self.set("invoice_id", 0);
            });
        },
        //Obj
        loadObj: function(id) {
            var self = this,
                para = [];
            para.push({
                field: "id",
                value: id
            });
            this.dataSource.query({
                filter: para,
                page: 1,
                pageSize: 100
            }).then(function() {
                var view = self.dataSource.view();
                var amount_due = kendo.parseFloat(view[0].reference[0].amount) - (view[0].amount_paid + kendo.parseFloat(view[0].reference[0].deposit)),
                    total = amount_due - view[0].discount,
                    remain = amount_due - (view[0].amount + view[0].discount);
                view[0].set("amount_due", kendo.toString(amount_due, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.set("obj", view[0]);
                self.set("sub_total", kendo.toString(amount_due, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.set("discount", kendo.toString(view[0].discount, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.set("total", kendo.toString(total, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.set("pay", kendo.toString(view[0].amount, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.set("remain", kendo.toString(remain, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.journalLineDS.filter({
                    field: "transaction_id",
                    value: id
                });
                self.creditDS.filter([{
                        field: "reference_id",
                        value: id
                    },
                    {
                        field: "type",
                        value: "Customer_Deposit"
                    }
                ]);
            });
        },
        changes: function() {
            var self = this,
                obj = this.get("obj"),
                total = 0,
                subTotal = 0,
                discount = 0,
                pay = 0,
                remain = 0;
            $.each(this.dataSource.data(), function(index, value) {
                subTotal += kendo.parseFloat(value.amount_due) / value.rate;
                discount += value.discount / value.rate;
                pay += value.amount / value.rate;
            });
            total = subTotal - discount;
            remain = total - pay;
            this.set("sub_total", kendo.toString(subTotal, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            this.set("discount", kendo.toString(discount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            this.set("total", kendo.toString(total, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            this.set("pay", kendo.toString(pay, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            this.set("remain", kendo.toString(remain, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
        },
        removeRow: function(e) {
            this.dataSource.remove(e.data);
            this.changes();
        },
        addEmpty: function() {
            this.dataSource.data([]);
            this.invoiceDS.data([]);
            this.creditDS.data([]);
            this.journalLineDS.data([]);
            this.set("isEdit", false);
            this.set("obj", null);
            this.set("sub_total", 0);
            this.set("discount", 0);
            this.set("total", 0);
            this.set("pay", 0);
            this.set("remain", 0);
            this.set("obj", {
                transaction_template_id: 6,
                account_id: 7,
                payment_method_id: 1,
                rate: 1,
                locale: banhji.locale,
                issued_date: new Date(),
                memo: "",
                memo2: "",
                segments: []
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
            //Edit Mode
            if (this.get("isEdit")) {
                //Update Journal
                $.each(this.journalLineDS.data(), function(index, value) {
                    value.set("deleted", 1);
                });
                this.addJournal(obj.id);
                //Credit
                if (this.creditDS.total() > 0) {
                    var credit = this.creditDS.at(0),
                        overAmount = ((obj.reference[0].amount - obj.amount_paid) - obj.amount) - obj.discount;

                    if (overAmount < 0) {
                        credit.set("amount", overAmount * -1);
                    } else {
                        credit.set("amount", 0);
                    }
                    this.creditDS.sync();
                } else {
                    this.addCredit(obj.id);
                }
            } else {
                //Add brand new transaction
                $.each(this.dataSource.data(), function(index, value) {
                    value.set("transaction_template_id", obj.transaction_template_id);
                    value.set("account_id", obj.account_id);
                    value.set("payment_method_id", obj.payment_method_id);
                    value.set("issued_date", obj.issued_date);
                    value.set("memo", obj.memo);
                    value.set("memo2", obj.memo2);
                    value.set("segments", obj.segments);
                });
            }
            this.objSync()
                .then(function(data) {
                    if (self.get("isEdit") == false) {
                        self.addCredit(data[0].id);
                        self.addJournal(data[0].id);
                    }
                    return data;
                }, function(reason) { //Error
                    $("#ntf1").data("kendoNotification").error(reason);
                }).then(function(result) {
                    $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);
                    self.set('paymentReceiptToday', self.get('paymentReceiptToday') + self.get('total'));
                    self.set('total', 0);
                    if (self.get("saveClose")) {
                        //Save Close          
                        self.set("saveClose", false);
                        self.cancel();
                        window.history.back();
                    } else if (self.get("savePrint")) {
                        //Save Print          
                        self.set("savePrint", false);
                        self.cancel();
                        if (result[0].transaction_template_id > 0) {
                            banhji.router.navigate("/invoice_form/" + result[0].id);
                        }
                    } else {
                        //Save New
                        self.addEmpty();
                    }
                });
        },
        cancel: function() {
            this.dataSource.cancelChanges();
            banhji.userManagement.removeMultiTask("cash_receipt");
            banhji.router.navigate("/");
        },
        //Deposit
        addCredit: function(cash_receipt_id) {
            var self = this,
                obj = this.get("obj");
            //Add over amount to customer credit
            $.each(this.dataSource.data(), function(index, value) {
                var overAmount = ((value.reference[0].amount - value.amount_paid) - value.amount) - value.discount;
                if (overAmount < 0) {
                    self.creditDS.add({
                        contact_id: value.contact_id,
                        account_id: value.contact[0].deposit_account_id,
                        payment_method_id: obj.payment_method_id,
                        reference_id: cash_receipt_id,
                        user_id: self.get("user_id"),
                        check_no: value.check_no,
                        type: "Customer_Deposit",
                        amount: overAmount * -1,
                        discount: 0,
                        rate: value.rate,
                        locale: value.locale,
                        issued_date: obj.issued_date,
                        memo: obj.memo,
                        memo2: obj.memo2,
                        status: 0,
                        segments: obj.segments,
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
                }
            });
            this.creditDS.sync();
        },
        //Journal
        addJournal: function(transaction_id) {
            var self = this,
                obj = this.get("obj");
            $.each(this.dataSource.data(), function(index, value) {
                var overAmount = ((value.reference[0].amount - value.amount_paid) - value.amount) - value.discount;
                //Cash on Dr
                self.journalLineDS.add({
                    transaction_id: transaction_id,
                    account_id: obj.account_id,
                    contact_id: value.contact_id,
                    description: "",
                    reference_no: "",
                    segments: [],
                    dr: value.amount,
                    cr: 0,
                    rate: value.rate,
                    locale: value.locale
                });
                if (value.discount > 0) {
                    //Discount on Dr
                    self.journalLineDS.add({
                        transaction_id: transaction_id,
                        account_id: value.contact[0].settlement_discount_id,
                        contact_id: value.contact_id,
                        description: "",
                        reference_no: "",
                        segments: [],
                        dr: value.discount,
                        cr: 0,
                        rate: value.rate,
                        locale: value.locale
                    });
                }
                //AR on Cr
                self.journalLineDS.add({
                    transaction_id: transaction_id,
                    account_id: value.contact[0].account_id,
                    contact_id: value.contact_id,
                    description: "",
                    reference_no: "",
                    segments: [],
                    dr: 0,
                    cr: kendo.parseFloat(value.amount),
                    rate: value.rate,
                    locale: value.locale
                });
                if (overAmount < 0) {
                    self.journalLineDS.add({
                        transaction_id: transaction_id,
                        account_id: value.contact[0].deposit_account_id,
                        contact_id: value.contact_id,
                        description: "",
                        reference_no: "",
                        segments: [],
                        dr: 0,
                        cr: overAmount * -1,
                        rate: value.rate,
                        locale: value.locale
                    });
                }
            });
            self.journalLineDS.sync();
        }
    });
    //Receipt
    banhji.Receipt = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibills/cashreceipt"),
        txnDS: dataStore(apiUrl + "utibills/search"),
        remainDS: dataStore(apiUrl + "transactions"),
        balanceDS: dataStore(apiUrl + "transactions"),
        journalLineDS: dataStore(apiUrl + "journal_lines"),
        haveSession: false,
        currencyDS: dataStore(apiUrl + "utibills/currency"),
        txnTemplateDS: new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter: {
                field: "type",
                value: "Cash_Receipt"
            }
        }),
        segmentItemDS: new kendo.data.DataSource({
            data: banhji.source.segmentItemList,
            sort: [{
                    field: "segment_id",
                    dir: "asc"
                },
                {
                    field: "code",
                    dir: "asc"
                }
            ]
        }),
        employeeDS: new kendo.data.DataSource({
            data: banhji.source.employeeList,
            filter: {
                field: "item_type_id",
                value: 10
            }, //Sale Rep.
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        accountDS: new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: [{
                    field: "account_type_id",
                    value: 10
                },
                {
                    field: "status",
                    value: 1
                }
            ],
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        paymentTermDS: banhji.source.paymentTermDS,
        paymentMethodDS: banhji.source.paymentMethodDS,
        amtDueColor: banhji.source.amtDueColor,
        chhDiscount: false,
        chhFine: false,
        obj: null,
        isEdit: false,
        saveClose: false,
        savePrint: false,
        searchText: "",
        contact_id: "",
        invoice_id: 0,
        total: 0,
        total_received: 0,
        user_id: banhji.source.user_id,
        licenseDS: dataStore(apiUrl + "branches"),
        locationDS: dataStore(apiUrl + "locations"),
        slocation: false,
        ssublocation: false,
        sbox: false,
        balanceView: false,
        haveMonth: false,
        licenseChange: function(e) {
            this.locationDS.filter([{
                    field: "branch_id",
                    value: this.get("licenseSelect")
                },
                {
                    field: "main_bloc",
                    value: 0
                },
                {
                    field: "main_pole",
                    value: 0
                }
            ]);
            this.set("slocation", true);
        },
        blocChange: function() {
            this.set("haveMonth", true);
            this.set("balanceView", true);
        },
        monthChange: function() {},
        exArray: [],
        downloadView: false,
        searchINV: function() {
            $("#loadING").css("display", "block");
            var self = this,
                license_id = this.get("licenseSelect"),
                bloc_id = this.get("locationSelect"),
                monthOfSearch = this.get("monthSelect");
            this.set("downloadView", false);
            var para = [];
            this.exArray = [];
            this.exArray.push({
                cells: [{
                        value: "Date",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                    {
                        value: "Name",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                    {
                        value: "Number",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                    {
                        value: "Meter",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                    {
                        value: "Amount",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                    {
                        value: "Discount",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                    {
                        value: "Fine",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                    {
                        value: "Receive",
                        background: "#496cad",
                        color: "#ffffff"
                    },
                ]
            });
            if (license_id) {
                if (bloc_id) {
                    para.push({
                        field: "location_id",
                        value: bloc_id
                    });
                    para.push({
                        field: "meter_id <>",
                        value: 0
                    });
                    para.push({
                        field: "type",
                        value: "Utility_Invoice"
                    });
                    para.push({
                        field: "status",
                        operator: "where_in",
                        value: [0, 2]
                    });
                    if (monthOfSearch) {
                        var monthOf = new Date(monthOfSearch);
                        monthOf.setDate(1);
                        monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
                        var monthL = new Date(monthOfSearch);
                        var lastDayOfMonth = new Date(monthL.getFullYear(), monthL.getMonth() + 1, 0);
                        lastDayOfMonth = lastDayOfMonth.getDate();
                        monthL.setDate(lastDayOfMonth);
                        monthL = kendo.toString(monthL, "yyyy-MM-dd");
                        para.push({
                            field: "month_of >=",
                            value: monthOf
                        }, {
                            field: "month_of <=",
                            value: monthL
                        });
                    }
                    this.txnDS.query({
                        filter: para,
                        page: 1,
                        pageSize: 100
                    }).then(function() {
                        var view = self.txnDS.view();
                        self.dataSource.data([]);
                        if (view.length > 0) {
                            $.each(view, function(index, value) {
                                var amount_due = value.amount - (value.amount_paid + value.deposit);
                                self.dataSource.add({
                                    transaction_template_id: 0,
                                    contact_id: value.contact_id,
                                    account_id: obj.account_id,
                                    payment_term_id: value.payment_term_id,
                                    payment_method_id: obj.payment_method_id,
                                    reference_id: value.id,
                                    due_date_fine: value.due_date,
                                    status_inv_fine: value.status,
                                    user_id: self.get("user_id"),
                                    check_no: value.check_no,
                                    reference_no: value.number,
                                    number: "",
                                    invnumber: value.number,
                                    type: "Cash_Receipt",
                                    sub_total: amount_due,
                                    amount: amount_due,
                                    discount: 0,
                                    fine: 0,
                                    rate: value.rate,
                                    locale: value.locale,
                                    issued_date: obj.issued_date,
                                    invissued_date: value.issued_date,
                                    memo: obj.memo,
                                    memo2: obj.memo2,
                                    status: 0,
                                    segments: obj.segments,
                                    is_journal: 1,
                                    location_id: value.location_id,
                                    //Recurring
                                    recurring_name: "",
                                    start_date: new Date(),
                                    frequency: "Daily",
                                    month_option: "Day",
                                    interval: 1,
                                    day: 1,
                                    week: 0,
                                    month: 0,
                                    is_recurring: 0,
                                    meter_id: value.meter_id,
                                    meter: value.meter,
                                    reference: [value]
                                });
                                self.exArray.push({
                                    cells: [{
                                            value: kendo.toString(new Date(value.issued_date), "dd-MMMM-yyyy", "km-KH")
                                        },
                                        {
                                            value: self.getContactName(value.contact_id)
                                        },
                                        {
                                            value: value.number
                                        },
                                        {
                                            value: value.meter
                                        },
                                        {
                                            value: amount_due
                                        },
                                        {
                                            value: 0
                                        },
                                        {
                                            value: 0
                                        },
                                        {
                                            value: amount_due
                                        },
                                    ]
                                });
                                self.numCustomer += 1;
                            });
                            self.applyTerm();
                            self.setRate();
                            $("#loadING").css("display", "none");
                            self.set("downloadView", true);
                            self.set("btnActive", true);
                        } else {
                            var notifi = $("#ntf1").data("kendoNotification");
                            notifi.hide();
                            notifi.error(self.lang.lang.no_data);
                            $("#loadING").css("display", "none");
                        }
                        self.set("searchText", "");
                        self.set("contact_id", "");
                        self.set("invoice_id", 0);
                    });
                } else {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(this.lang.lang.field_required_message);
                }
            } else {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.field_required_message);
            }
        },
        upArray: [],
        onSelected: function(e) {
            var files = e.files,
                self = this;
            var obj = this.get("obj");
            $('li.k-file').remove();
            $("#loadImport").css("display", "block");
            var reader = new FileReader();
            this.dataSource.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    if (roa.length > 0) {
                        result[sheetName] = roa;
                        for (var i = 0; i < roa.length; i++) {
                            self.upArray.push(roa[i].Number);
                        }
                        self.insertDS(self.upArray);
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        insertDS: function(NU) {
            $("#loadING").css("display", "block");
            this.dataSource.data([]);
            this.exArray = [];
            var self = this,
                para = [],
                obj = this.get("obj"),
                searchText = this.get("searchText"),
                invoice_id = this.get("invoice_id");
            para.push({
                field: "type",
                value: "Utility_Invoice"
            });
            para.push({
                field: "status",
                operator: "where_in",
                value: [0, 2]
            });
            para.push({
                field: "number",
                operator: "where_in",
                value: NU
            });
            this.txnDS.query({
                filter: para
            }).then(function() {
                var view = self.txnDS.view();
                if (view.length > 0) {
                    self.numCustomer = 0;
                    $.each(view, function(index, value) {
                        var amount_due = value.amount - (value.amount_paid + value.deposit);
                        self.dataSource.add({
                            transaction_template_id: 0,
                            contact_id: value.contact_id,
                            account_id: obj.account_id,
                            payment_term_id: value.payment_term_id,
                            payment_method_id: obj.payment_method_id,
                            reference_id: value.id,
                            user_id: self.get("user_id"),
                            check_no: value.check_no,
                            reference_no: value.number,
                            number: "",
                            invnumber: value.number,
                            type: "Cash_Receipt",
                            sub_total: amount_due,
                            amount: amount_due,
                            discount: 0,
                            fine: 0,
                            rate: value.rate,
                            locale: value.locale,
                            issued_date: obj.issued_date,
                            invissued_date: value.issued_date,
                            memo: obj.memo,
                            memo2: obj.memo2,
                            status: 0,
                            segments: obj.segments,
                            is_journal: 1,
                            location_id: obj.location_id,
                            recurring_name: "",
                            start_date: new Date(),
                            frequency: "Daily",
                            month_option: "Day",
                            interval: 1,
                            day: 1,
                            week: 0,
                            month: 0,
                            is_recurring: 0,
                            meter_id: value.meter_id,
                            meter: value.meter,
                            reference: [value]
                        });
                    });
                    self.applyTerm();
                    self.setRate();
                    $("#loadING").css("display", "none");
                } else {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.no_data);
                    $("#loadING").css("display", "none");
                }
                self.set("searchText", "");
                self.set("contact_id", "");
                self.set("invoice_id", 0);
            });
        },
        cashierSessionDS: dataStore(apiUrl + "cashier_sessions"),
        updateSessionDS: dataStore(apiUrl + "cashier_sessions"),
        cashierItemDS: dataStore(apiUrl + "cashier_sessions/item"),
        sessionReceiveDS: dataStore(apiUrl + "cashier_sessions/receive"),
        CashierID: "",
        pageLoad: function(id) {
            var self = this;
            $("#loadING").css("display", "block");
            this.currencyDS.query({
                sort: {
                    field: "created_at",
                    dir: "asc"
                }
            }).then(function(e) {
                self.setCashierItems();
            });
            this.addEmpty();
            this.cashierSessionDS.query({
                filter: {
                    field: "status",
                    value: 0
                },
                limit: 1,
                sort: {
                    field: "id",
                    dir: "desc"
                }
            }).then(function(e) {
                var view = self.cashierSessionDS.view();
                if (view.length > 0) {
                    self.set("haveSession", true);
                    self.updateSessionDS.add({
                        id: view[0].id,
                        cashier_id: view[0].cashier_id,
                        start_date: view[0].start_date,
                        end_date: new Date(),
                        status: 1
                    });
                    $("#loadING").css("display", "none");
                    self.set("CashierID", view[0].id);
                    self.setReceive();
                } else {
                    self.set("haveSession", false);
                    self.updateSessionDS.data([]);
                    self.updateSessionDS.add({
                        cashier_id: banhji.userData.id,
                        start_date: new Date(),
                        end_date: "",
                        status: 0,
                        items: []
                    });
                    $("#loadING").css("display", "none");
                }
            });
        },
        setCashierItems: function() {
            var self = this;
            $.each(this.currencyDS.data(), function(i, v) {
                self.cashierItemDS.add({
                    cashier_session_id: "",
                    currency: v.code,
                    amount: 0,
                });
            });
        },
        endSession: function() {
            var self = this;
            this.updateSessionDS.data()[0].set("end_date", new Date());
            this.updateSessionDS.data()[0].set("status", 1);
            this.updateSessionDS.sync();
            this.updateSessionDS.bind("requestEnd", function(e) {
                if (e.response) {
                    self.set("haveSession", false);
                    self.pageLoad();
                }
            });
        },
        addSession: function() {
            var self = this;
            this.updateSessionDS.data()[0].set("items", this.cashierItemDS.data());
            this.updateSessionDS.sync();
            this.updateSessionDS.bind("requestEnd", function(e) {
                if (e.response) {
                    self.set("haveSession", true);
                    self.pageLoad();
                }
            });
        },
        loadInvoice: function(id) {
            this.set("invoice_id", id);
            this.search();
        },
        //Contact
        loadContact: function(id) {
            this.set("contact_id", id);
            this.search();
        },
        contactChanges: function() {
            this.search();
        },
        getContactName: function(id) {
            var raw = banhji.source.customerDS.get(id);
            if (raw) {
                return raw.name;
            } else {
                return "";
            }
        },
        //Payment Method
        issuedDateChanges: function() {
            this.applyTerm();
            this.setRate();
        },
        applyTerm: function() {
            var self = this,
                obj = this.get("obj"),
                today = new Date();
            $.each(this.dataSource.data(), function(index, value) {
                if (value.payment_term_id) {
                    value.payment_term_id = value.payment_term_id;
                } else {
                    value.payment_term_id = 5;
                }
                var term = self.paymentTermDS.get(value.payment_term_id),
                    termDate = new Date(value.reference[0].issued_date);
                term.discount_period
                termDate.setDate(termDate.getDate() + term.discount_period);
                if (today <= termDate) {
                    if (value.reference[0].amount_paid == 0) {
                        var amount = value.reference[0].amount * term.discount_percentage;
                        value.set("discount", amount);
                        value.set("amount", value.reference[0].amount - amount);
                    }
                }
            });
        },
        //Currency Rate
        setRate: function() {
            var obj = this.get("obj");
            $.each(this.dataSource.data(), function(index, value) {
                var rate = banhji.source.getRate(value.locale, new Date(obj.issued_date));
                value.set("rate", rate);
            });
            this.changes();
        },
        //Segments
        segmentChanges: function(e) {
            var dataArr = this.get("obj").segments,
                lastIndex = dataArr.length - 1,
                last = this.segmentItemDS.get(dataArr[lastIndex]);
            if (dataArr.length > 1) {
                for (var i = 0; i < dataArr.length - 1; i++) {
                    var current_index = dataArr[i],
                        current = this.segmentItemDS.get(current_index);
                    if (current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        btnActive: false,
        idList: [],
        haveFine: false,
        amountFine: false,
        searchSelect    : 1,
        searchSelectDS  : [
            {id: 1, name: "Invoice Number" },
            {id: 2, name: "Customer Name" },
            {id: 3, name: "Meter Number" }
        ],
        haveSearchInv       : true,
        haveSearchCus       : false,
        haveSearchMet       : false,
        changeSearchMethod  : function(e){
            if(this.get("searchSelect") == 1){
                this.set("haveSearchInv", true);
                this.set("haveSearchCus", false);
                this.set("haveSearchMet", false);
            }else if(this.get("searchSelect") == 2){
                this.set("haveSearchInv", false);
                this.set("haveSearchCus", true);
                this.set("haveSearchMet", false);
            }else if(this.get("searchSelect") == 3){
                this.set("haveSearchInv", false);
                this.set("haveSearchCus", false);
                this.set("haveSearchMet", true);
            }
        },
        customerDS              : dataStore(apiUrl + "contacts"),
        searchMeterDS           : dataStore(apiUrl + "utibills/meters"),
        onCustomerSearch        : function(e){
            this.search();
        },
        onMeterSearch           : function(e){
            this.search();
        },
        //Search
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                searchText = "";
            if(this.get("searchSelect") == 1){
                searchText = this.get("searchText");
                para.push({
                    field: "number",
                    value: searchText
                });
            }else if(this.get("searchSelect") == 2){
                console.log(this.get("selectedCustomer"));
                para.push({
                    field: "contact_id",
                    value: this.get("selectedCustomer")
                });
            }else if(this.get("searchSelect") == 3){
                para.push({
                    field: "meter_id",
                    value: this.get("selectedMeter")
                });
            }
            $("#loadING").css("display", "block");
            this.exArray = [];
            if (jQuery.inArray(searchText, this.idList) != -1) {
                alert("This Invoice already Included!");
                this.set("searchText", "");
                $("#loadING").css("display", "none");
            } else {
                this.txnDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 100
                }).then(function() {
                    var view = self.txnDS.view();
                    if (view.length > 0) {
                        self.set("btnActive", false);
                        $.each(view, function(index, v) {
                            if (v.amount_fine > 0) {
                                self.set("haveFine", true);
                            }
                            if (jQuery.inArray(v.number, self.idList) != -1) {
                            }else{
                                var amount_due = (v.amount - (v.amount_paid + v.deposit)) + v.amount_fine;
                                self.dataSource.add({
                                    transaction_template_id: 0,
                                    contact_id: v.contact_id,
                                    contact_name: v.contact_name,
                                    account_id: obj.account_id,
                                    payment_term_id: v.payment_term_id,
                                    payment_method_id: obj.payment_method_id,
                                    reference_id: v.id,
                                    reference_no: v.number,
                                    due_date_fine: v.due_date,
                                    status_inv_fine: v.status,
                                    number: "",
                                    invnumber: v.number,
                                    type: "Cash_Receipt",
                                    sub_total: amount_due,
                                    amountshow: v.amount,
                                    amount: amount_due,
                                    discount: 0,
                                    fine: 0,
                                    rate: v.rate,
                                    locale: v.locale,
                                    issued_date: obj.issued_date,
                                    invissued_date: v.issued_date,
                                    memo: obj.memo,
                                    memo2: obj.memo2,
                                    status: 0,
                                    segments: obj.segments,
                                    is_journal: 1,
                                    location_id: v.location_id,
                                    pole_id: v.pole_id,
                                    box_id: v.box_id,
                                    meter_id: v.meter_id,
                                    reference_id: v.id,
                                    meter: v.meter,
                                    month_of: v.month_of,
                                    user_id: banhji.userData.id,
                                    amount_fine: v.amount_fine,
                                    session_id: self.get("CashierID")
                                });
                                self.idList.push(v.number);
                            }
                            $("#loadING").css("display", "none");
                        });
                        self.setRate();
                        self.set("btnActive", true);
                    } else {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.error(self.lang.lang.no_data);
                        $("#loadING").css("display", "none");
                    }
                    self.set("searchText", "");
                    self.set("selectedCustomer", "");
                    self.set("selectedMeter", "");
                });
            }
        },
        remainFind: function(meter_id) {
            var para = [],
                obj = this.get("obj"),
                self = this;
            para.push({
                field: "type",
                value: "Utility_Invoice"
            });
            para.push({
                field: "status",
                operator: "where_in",
                value: [0, 2]
            });
            para.push({
                field: "meter_id",
                value: meter_id
            });
            para.push({
                field: "deleted <>",
                value: 1
            });
            if (this.idList.length > 0) {
                $.each(this.idList, function(i, v) {
                    para.push({
                        field: "id",
                        operator: "where_not_in",
                        value: v
                    });
                });
            }
            this.remainDS.query({
                filter: para,
                page: 1,
                pageSize: 10
            }).then(function() {
                var view = self.remainDS.view();
                if (view.length > 0) {
                    $.each(view, function(index, value) {
                        var amount_due = value.amount - (value.amount_paid + value.deposit);
                        self.dataSource.add({
                            transaction_template_id: 0,
                            contact_id: value.contact_id,
                            account_id: obj.account_id,
                            payment_term_id: value.payment_term_id,
                            payment_method_id: obj.payment_method_id,
                            reference_id: value.id,
                            user_id: self.get("user_id"),
                            check_no: value.check_no,
                            reference_no: value.number,
                            number: "",
                            invnumber: value.number,
                            type: "Cash_Receipt",
                            sub_total: amount_due,
                            amount: amount_due,
                            discount: 0,
                            fine: 0,
                            rate: value.rate,
                            locale: value.locale,
                            issued_date: obj.issued_date,
                            invissued_date: value.issued_date,
                            memo: obj.memo,
                            memo2: obj.memo2,
                            status: 0,
                            segments: obj.segments,
                            is_journal: 1,
                            location_id: obj.location_id,
                            //Recurring
                            recurring_name: "",
                            start_date: new Date(),
                            frequency: "Daily",
                            month_option: "Day",
                            interval: 1,
                            day: 1,
                            week: 0,
                            month: 0,
                            is_recurring: 0,
                            meter_id: value.meter_id,
                            meter: value.meter,
                            reference: [value]
                        });
                    });
                    self.applyTerm();
                    self.setRate();
                    self.set("btnActive", true);
                }
                $("#loadING").css("display", "none");
            });
        },
        serachBalance: function() {
            var para = [],
                obj = this.get("obj"),
                self = this,
                bloc_id = this.get("locationSelect");
            para.push({
                field: "type",
                value: "Utility_Invoice"
            });
            para.push({
                field: "status",
                operator: "where_in",
                value: [0, 2]
            });
            para.push({
                field: "journal_type",
                value: "journal"
            });
            para.push({
                field: "location_id",
                value: bloc_id
            });
            para.push({
                field: "deleted <>",
                value: 1
            });
            this.dataSource.data([]);
            $("#loadING").css("display", "block");
            this.balanceDS.query({
                filter: para
            }).then(function() {
                var view = self.balanceDS.view();
                if (view.length > 0) {
                    $.each(view, function(index, value) {
                        var amount_due = value.amount - (value.amount_paid + value.deposit);
                        self.dataSource.add({
                            transaction_template_id: 0,
                            contact_id: value.contact_id,
                            account_id: obj.account_id,
                            payment_term_id: value.payment_term_id,
                            payment_method_id: obj.payment_method_id,
                            reference_id: value.id,
                            user_id: self.get("user_id"),
                            check_no: value.check_no,
                            reference_no: value.number,
                            number: "",
                            invnumber: value.number,
                            type: "Cash_Receipt",
                            sub_total: amount_due,
                            amount: amount_due,
                            discount: 0,
                            fine: 0,
                            rate: value.rate,
                            locale: value.locale,
                            issued_date: obj.issued_date,
                            invissued_date: value.issued_date,
                            memo: obj.memo,
                            memo2: obj.memo2,
                            status: 0,
                            segments: obj.segments,
                            is_journal: 1,
                            location_id: obj.location_id,
                            //Recurring
                            recurring_name: "",
                            start_date: new Date(),
                            frequency: "Daily",
                            month_option: "Day",
                            interval: 1,
                            day: 1,
                            week: 0,
                            month: 0,
                            is_recurring: 0,
                            meter_id: value.meter_id,
                            meter: value.meter,
                            reference: [value]
                        });
                    });
                    self.applyTerm();
                    self.setRate();
                    $("#loadING").css("display", "none");
                    self.set("btnActive", true);
                } else {
                    $("#loadING").css("display", "none");
                    var notifact = $("#ntf1").data("kendoNotification");
                    notifact.hide();
                    notifact.success(self.lang.lang.no_data);
                }
            });
        },
        ExportExcel: function() {
            if (this.exArray.length > 1) {
                $("#loadImport").css("display", "none");
                var workbook = new kendo.ooxml.Workbook({
                    sheets: [{
                        columns: [{
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            },
                            {
                                autoWidth: true
                            }
                        ],
                        title: "Receive",
                        rows: this.exArray
                    }]
                });
                //save the file as Excel file with extension xlsx
                kendo.saveAs({
                    dataURI: workbook.toDataURL(),
                    fileName: "Receive.xlsx"
                });
            }
        },
        //Obj
        loadObj: function(id) {
            var self = this;
            this.dataSource.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                pageSize: 100
            }).then(function() {
                var view = self.dataSource.view();
                view[0].set("reference", []);
                self.set("obj", view[0]);
                self.set("total", kendo.toString(view[0].amount, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.set("total_received", kendo.toString(view[0].amount, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.journalLineDS.filter({
                    field: "transaction_id",
                    value: id
                });
                self.txnDS.query({
                    filter: {
                        field: "id",
                        value: view[0].reference_id
                    }
                }).then(function() {
                    var txn = self.txnDS.view(),
                        obj = self.get("obj");
                    obj.set("reference", txn);
                });
            });
        },
        amountReceive: 0,
        oldAmountR: 0,
        changes: function() {
            var self = this,
                obj = this.get("obj"),
                total = 0,
                sub_total = 0,
                discount = 0,
                total_received = 0,
                remaining = 0,
                amountFine = 0;
            $.each(this.dataSource.data(), function(index, value) {
                var amt = kendo.parseFloat(value.sub_total) - kendo.parseFloat(value.discount);
                if (kendo.parseFloat(value.amount) > amt) {
                    value.set("amount", amt);
                }
                sub_total += kendo.parseFloat(value.sub_total) / value.rate;
                discount += kendo.parseFloat(value.discount) / value.rate;
                total_received += kendo.parseFloat(value.amount) / value.rate;
                if(banhji.institute.id != 860){
                    amountFine += kendo.parseFloat(value.amount_fine);
                }else{
                    if(value.status_inv_fine == 0){
                        self.checkFineBKK(value.due_date_fine,value.amountshow);
                    }
                }
                self.set("oldAmountR", value.amount_fine);
            });
            total = sub_total - discount;
            remaining = total - total_received;
            obj.set("sub_total", sub_total);
            obj.set("discount", discount);
            this.set("total", kendo.toString(total, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            if(banhji.institute.id != 860){
                this.set("amountFine", kendo.toString(amountFine, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            }
            this.set("total_received", kendo.toString(total_received, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            obj.set("remaining", remaining);
            this.set("amountReceive", total_received)
            this.setDefaultReceiptCurrency(total_received);
        },
        bkkFineAmount: 0,
        checkFineBKK: function(DUEDATE, AMOUNT){
            var chDATE = this.daysBetween(new Date(DUEDATE), new Date("<?php echo date('Y-m-d'); ?>"));
            if(chDATE > 30){

            }else if(chDATE > 0){
                var tmpABKK = AMOUNT * 0.01;
                var oAfine = this.get("oldAmountR");
                if(tmpABKK > 0){
                    this.set("amountFine", kendo.toString(oAfine + (chDATE * tmpABKK), banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
                    this.set("haveFine", true);
                }
            }
        },
        treatAsUTC: function(date) {
            var result = new Date(date);
            result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
            return result;
        },
        daysBetween: function(startDate, endDate) {
            var millisecondsPerDay = 24 * 60 * 60 * 1000;
            return (this.treatAsUTC(endDate) - this.treatAsUTC(startDate)) / millisecondsPerDay;
        },
        removeRow: function(e) {
            var self = this;
            this.dataSource.remove(e.data);
            this.changes();
            var i = 0;
            var j = "";
            $.each(this.idList, function(i, v) {
                if (v == e.data.invnumber) {
                    j = i;
                }
                i++;
            });
            this.idList.splice(j, 1);
        },
        addEmpty: function() {
            this.dataSource.data([]);
            this.txnDS.data([]);
            this.journalLineDS.data([]);
            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);
            this.set("amountFine", 0);
            this.set("haveFine", false);
            this.idList = [];
            this.set("total_received", 0);
            this.set("obj", {
                transaction_template_id: 6,
                account_id: 7,
                payment_method_id: 1,
                rate: 1,
                sub_total: 0,
                discount: 0,
                remaining: 0,
                locale: banhji.locale,
                issued_date: new Date(),
                memo: "",
                memo2: "",
                segments: []
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
            this.set("btnActive", false);
            $("#loadING").css("display", "block");
            //Add brand new transaction
            $.each(this.dataSource.data(), function(index, value) {
                value.set("transaction_template_id", obj.transaction_template_id);
                value.set("account_id", obj.account_id);
                value.set("payment_method_id", obj.payment_method_id);
                value.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
                value.set("memo", obj.memo);
                value.set("memo2", obj.memo2);
                value.set("segments", obj.segments);
            });
            //Obj
            this.objSync()
                .then(function(data) {
                    self.setReceive();
                    return data;
                }, function(reason) { //Error
                    $("#ntf1").data("kendoNotification").error(reason);
                }).then(function(result) {
                    var notifact = $("#ntf1").data("kendoNotification");
                    notifact.hide();
                    notifact.success(banhji.source.successMessage);
                    //Save New
                    self.addEmpty();
                    self.set("btnActive", false);
                    $("#loadING").css("display", "none");
                });
            this.receipCurrencyDS.sync();
            this.receipChangeDS.sync();
        },
        receiveDS: dataStore(apiUrl + "cashier_sessions/total_receive"),
        setReceive: function() {
            var self = this;
            this.receiveDS.query({
                filter: {
                    field: "cashier_session_id",
                    value: this.get("CashierID")
                }
            }).then(function(e) {
                var view = self.receiveDS.view();
                self.set("numCustomer", view[0].total_contact);
                self.set("paymentReceiptToday", view[0].total_amount);
            });
        },
        setDefaultReceiptCurrency: function(firstReceipt) {
            var self = this,
                FR = firstReceipt;
            this.receipCurrencyDS.data([]);
            var j = 1;
            $.each(this.currencyDS.data(), function(i, v) {
                if (j == 1) {
                    self.receipCurrencyDS.add({
                        cashier_session_id: self.get("CashierID"),
                        type: 0,
                        currency: v.code,
                        locale: v.locale,
                        rate: v.rate,
                        amount: FR
                    });
                } else {
                    self.receipCurrencyDS.add({
                        cashier_session_id: self.get("CashierID"),
                        type: 0,
                        currency: v.code,
                        locale: v.locale,
                        rate: v.rate,
                        amount: 0
                    });
                }
                j++;
            });
        },
        haveChangeMoney: false,
        checkChange: function(e) {
            var data = e.data;
            if (data.amount === undefined || data.amount === null) {
                var index = this.receipCurrencyDS.indexOf(data);
                alert(this.lang.lang.error_input);
                this.receipCurrencyDS.data()[index].set("amount", 0);
            } else {
                var self = this;
                var currencyReceipt = 0;
                var moneyReceipt = parseFloat(this.get("amountReceive"));
                $.each(this.receipCurrencyDS.data(), function(i, v) {
                    var amountAfterRate = parseFloat(v.amount) / parseFloat(v.rate);
                    currencyReceipt += amountAfterRate;
                });
                var changeAmount = parseFloat(currencyReceipt) - moneyReceipt;
                if (currencyReceipt > moneyReceipt) {
                    this.setDefaultChangeCurrency(changeAmount);
                    this.set("haveChangeMoney", true);
                } else {
                    this.set("haveChangeMoney", false);
                }
            }
        },
        receipCurrencyDS: dataStore(apiUrl + "cashier_sessions/currency"),
        receipChangeDS: dataStore(apiUrl + "cashier_sessions/currency"),
        changeMoney: 0,
        setDefaultChangeCurrency: function(firstReceipt) {
            var self = this,
                FR = firstReceipt;
            this.set("changeMoney", FR);
            this.receipChangeDS.data([]);
            var j = 1;
            $.each(this.currencyDS.data(), function(i, v) {
                if (j == 1) {
                    self.receipChangeDS.add({
                        cashier_session_id: self.get("CashierID"),
                        type: 1,
                        currency: v.code,
                        locale: v.locale,
                        rate: v.rate,
                        amount: FR
                    });
                } else {
                    self.receipChangeDS.add({
                        cashier_session_id: self.get("CashierID"),
                        type: 1,
                        currency: v.code,
                        locale: v.locale,
                        rate: v.rate,
                        amount: 0
                    });
                }
                j++;
            });
        },
        tmpChangeMoney: 0,
        checkChangeMoney: function(e) {
            var data = e.data;
            var currentAmountChange = data.amount / parseFloat(data.rate);
            var changeMoney = 0;
            var currencyReceipt = 0;
            if (data.amount === undefined || data.amount === null) {
                var index = this.receipChangeDS.indexOf(data);
                alert(this.lang.lang.error_input);
                this.receipChangeDS.data()[index].set("amount", 0);
            } else {
                if (this.get("tmpChangeMoney") == 0) {
                    changeMoney = parseFloat(this.get("changeMoney"));
                } else {
                    changeMoney = this.get("tmpChangeMoney");
                }
                if (currentAmountChange < this.receipChangeDS.data()[0].amount) {
                    var firstAmountChagne = changeMoney - currentAmountChange;
                    this.receipChangeDS.data()[0].set("amount", firstAmountChagne);
                    this.set("tmpChangeMoney", firstAmountChagne);
                } else {
                    var index = this.receipChangeDS.indexOf(data);
                    alert(this.lang.lang.error_input);
                    this.receipChangeDS.data()[index].set("amount", 0);
                }
            }
            this.recheckChangeMoney();
        },
        recheckChangeMoney: function() {
            var allChangeMoney = 0,
                totalChangeMoney = 0;
            $.each(this.receipChangeDS.data(), function(i, v) {
                var amountAfterRate = parseFloat(v.amount) / parseFloat(v.rate);
                allChangeMoney += amountAfterRate;
            });
            if (allChangeMoney > this.get("changeMoney")) {
                totalChangeMoney = allChangeMoney - this.get("changeMoney");
                var AMOUNT = this.receipChangeDS.data()[0].amount;
                this.receipChangeDS.data()[0].set("amount", AMOUNT - totalChangeMoney);
            } else {
                totalChangeMoney = this.get("changeMoney") - allChangeMoney;
                var AMOUNT = this.receipChangeDS.data()[0].amount;
                this.receipChangeDS.data()[0].set("amount", AMOUNT + totalChangeMoney);
            }
        },
        cancel: function() {
            this.dataSource.data([]);
            window.history.back();
        }
    });
    banhji.customerDeposit = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "transactions"),
        deleteDS: dataStore(apiUrl + "transactions"),
        lineDS: dataStore(apiUrl + "account_lines"),
        referenceDS: dataStore(apiUrl + "transactions"),
        referenceLineDS: dataStore(apiUrl + "account_lines"),
        recurringDS: dataStore(apiUrl + "transactions"),
        recurringLineDS: dataStore(apiUrl + "account_lines"),
        journalLineDS: dataStore(apiUrl + "journal_lines"),
        currencyRateDS: dataStore(apiUrl + "currencies/rate"),
        attachmentDS: dataStore(apiUrl + "attachments"),
        txnTemplateDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "transaction_templates",
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
                field: "type",
                value: "Customer_Deposit"
            },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page: 1,
            pageSize: 100
        }),
        contact: null,
        contactDS: banhji.source.customerDS,
        depositAccountDS: banhji.source.depositAccountDS,
        segmentItemDS: banhji.source.segmentItemDS,
        accountDS: banhji.source.cashAccountDS,
        amtDueColor: banhji.source.amtDueColor,
        confirmMessage: banhji.source.confirmMessage,
        frequencyList: banhji.source.frequencyList,
        monthList: banhji.source.monthList,
        monthOptionList: banhji.source.monthOptionList,
        weekDayList: banhji.source.weekDayList,
        dayList: banhji.source.dayList,
        showMonthOption: false,
        showMonth: false,
        showWeek: false,
        showDay: false,
        obj: null,
        isEdit: false,
        saveClose: false,
        savePrint: false,
        saveRecurring: false,
        showConfirm: false,
        statusSrc: "",
        enableRef: false,
        total: 0,
        original_total: 0,
        user_id: banhji.source.user_id,
        pageLoad: function(id, is_recurring) {
            if (id) {
                this.set("isEdit", true);
                this.loadObj(id, is_recurring);
            } else {
                if (this.get("isEdit") || this.dataSource.total() == 0) {
                    this.addEmpty();
                }
            }
        },
        //Upload
        onSelect: function(e) {
            // Array with information about the uploaded files
            var self = this,
                files = e.files,
                obj = this.get("obj");
            // Check the extension of each file and abort the upload if it is not .jpg
            $.each(files, function(index, value) {
                if (value.extension.toLowerCase() === ".jpg" ||
                    value.extension.toLowerCase() === ".jpeg" ||
                    value.extension.toLowerCase() === ".tiff" ||
                    value.extension.toLowerCase() === ".png" ||
                    value.extension.toLowerCase() === ".gif" ||
                    value.extension.toLowerCase() === ".pdf") {
                    var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) + '_' + value.name;
                    self.attachmentDS.add({
                        user_id: self.get("user_id"),
                        transaction_id: obj.id,
                        type: "Transaction",
                        name: value.name,
                        description: "",
                        key: key,
                        url: banhji.s3 + key,
                        size: value.size,
                        created_at: new Date(),
                        file: value.rawFile
                    });
                } else {
                    alert("This type of file is not allowed to attach.");
                }
            });
        },
        removeFile: function(e) {
            var data = e.data;

            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
            }
        },
        uploadFile: function() {
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
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e) {
                //Delete File
                if (e.type == "destroy") {
                    if (saved == false && e.response) {
                        saved = true;

                        var response = e.response.results;
                        $.each(response, function(index, value) {
                            var params = {
                                //Bucket: 'STRING_VALUE', /* required */
                                Delete: { /* required */
                                    Objects: [ /* required */ {
                                            Key: value.data.key /* required */
                                        }
                                        /* more items */
                                    ]
                                }
                            };
                            bucket.deleteObjects(params, function(err, data) {});
                        });
                    }
                }
            });
        },
        //Contact
        loadContact: function(id) {
            var self = this;

            this.contactDS.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                pageSize: 100
            }).then(function(e) {
                var view = self.contactDS.view(),
                    obj = self.get("obj");

                obj.set("contact_id", view[0].id);
                obj.set("account_id", view[0].deposit_account_id);
                obj.set("locale", view[0].locale);

                self.setRate();
                self.loadReference();
                self.loadRecurring();
            });
        },
        contactChanges: function() {
            var obj = this.get("obj");

            if (obj.contact_id > 0) {
                var contact = this.contactDS.get(obj.contact_id);

                obj.set("account_id", contact.deposit_account_id);
                obj.set("locale", contact.locale);
                this.setRate();
                this.loadReference();
                this.loadRecurring();
            }

            this.lineDS.data([]);
            this.addRow();
            this.changes();
        },
        //Currency Rate
        setRate: function() {
            var obj = this.get("obj"),
                rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

            obj.set("rate", rate);

            $.each(this.lineDS.data(), function(index, value) {
                value.set("rate", rate);
                value.set("locale", obj.locale);
            });
        },
        //Segment
        segmentChanges: function(e) {
            var dataArr = this.get("obj").segments,
                lastIndex = dataArr.length - 1,
                last = this.segmentItemDS.get(dataArr[lastIndex]);

            if (dataArr.length > 1) {
                for (var i = 0; i < dataArr.length - 1; i++) {
                    var current_index = dataArr[i],
                        current = this.segmentItemDS.get(current_index);

                    if (current.segment_id === last.segment_id) {
                        dataArr.splice(lastIndex, 1);
                        break;
                    }
                }
            }
        },
        //Obj
        loadObj: function(id, is_recurring) {
            var self = this,
                para = [];

            para.push({
                field: "id",
                value: id
            });

            if (is_recurring) {
                para.push({
                    field: "is_recurring",
                    value: 1
                });
            }

            this.dataSource.query({
                filter: para,
                page: 1,
                pageSize: 1
            }).then(function(e) {
                var view = self.dataSource.view();

                self.set("obj", view[0]);
                self.set("original_total", view[0].amount);
                self.set("total", kendo.toString(view[0].amount, view[0].locale == "km-KH" ? "c0" : "c", view[0].locale));
                self.lineDS.filter({
                    field: "transaction_id",
                    value: id
                });
                self.journalLineDS.filter({
                    field: "transaction_id",
                    value: id
                });
                self.referenceDS.filter({
                    field: "id",
                    value: view[0].reference_id
                });

                self.loadRecurring();
            });
        },
        changes: function() {
            var obj = this.get("obj");

            if (this.lineDS.total() > 0) {
                var sum = 0;

                $.each(this.lineDS.data(), function(index, value) {
                    sum += value.amount;
                });

                this.set("total", kendo.toString(sum, obj.locale == "km-KH" ? "c0" : "c", obj.locale));
                obj.set("amount", sum);
            } else {
                this.set("total", 0);
                obj.set("amount", 0);
            }
        },
        addEmpty: function() {
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.attachmentDS.data([]);
            this.journalLineDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);

            this.dataSource.insert(0, {
                contact_id: "",
                transaction_template_id: "",
                recurring_id: "",
                reference_id: "",
                account_id: "",
                user_id: this.get("uer_id"),
                type: "Customer_Deposit", //required
                amount: 0,
                rate: 1,
                locale: banhji.locale,
                issued_date: new Date(),
                memo: "",
                memo2: "",
                segments: [],
                is_journal: 1,
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

            var obj = this.dataSource.at(0);
            this.set("obj", obj);

            this.setRate();
            this.addRow();
        },
        addRow: function() {
            var obj = this.get("obj");

            this.lineDS.add({
                transaction_id: obj.id,
                account_id: "",
                description: "",
                reference_no: "",
                amount: 0,
                rate: obj.rate,
                locale: obj.locale
            });
        },
        removeRow: function(e) {
            var data = e.data;
            if (this.lineDS.total() > 1) {
                this.lineDS.remove(data);
                this.changes();
            }
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
            //Reference
            if (obj.reference_id > 0) {
                var ref = this.referenceDS.get(obj.reference_id);
                ref.set("deposit", obj.amount);
                this.referenceDS.sync();
            } else {
                obj.set("reference_id", 0);
            }
            //Recurring
            if (this.get("saveRecurring")) {
                this.set("saveRecurring", false);
                if (this.get("isEdit")) {
                    if (obj.is_recurring == "0") {
                        //Add brand new recurring from existing transaction
                        this.addNewRecurring();
                        this.recurringSync()
                            .then(function(data) { //Success
                                $.each(self.recurringLineDS.data(), function(index, value) {
                                    value.set("transaction_id", data[0].id);
                                });
                                self.recurringLineDS.sync();
                                return data;
                            }, function(reason) { //Error
                                $("#ntf1").data("kendoNotification").error(reason);
                            }).then(function(result) {
                                $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);
                                self.addEmpty();
                            });
                    }
                } else {
                    obj.set("is_recurring", 1);
                }
            }
            //Edit Mode
            if (this.get("isEdit")) {
                obj.set("dirty", true);
                //Line has changed
                if (obj.amount !== this.get("original_total") && obj.is_recurring == 0) {
                    this.set("original_total", 0);
                    $.each(this.journalLineDS.data(), function(index, value) {
                        value.set("deleted", 1);
                    });
                    this.addJournal(obj.id);
                }
            }
            //Save Obj
            this.objSync()
                .then(function(data) { //Success
                    if (self.get("isEdit") == false) {
                        //Item line
                        $.each(self.lineDS.data(), function(index, value) {
                            value.set("transaction_id", data[0].id);
                        });
                        //Attachment
                        $.each(self.attachmentDS.data(), function(index, value) {
                            value.set("transaction_id", data[0].id);
                        });
                        if (obj.is_recurring == 0) {
                            //Journal
                            self.addJournal(data[0].id);
                        }
                    }
                    self.lineDS.sync();
                    self.uploadFile();
                    return data;
                }, function(reason) { //Error
                    $("#ntf1").data("kendoNotification").error(reason);
                }).then(function(result) {
                    $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);
                    if (self.get("saveClose")) {
                        //Save Close          
                        self.set("saveClose", false);
                        self.cancel();
                        window.history.back();
                    } else if (self.get("savePrint")) {
                        //Save Print          
                        self.set("savePrint", false);
                        self.cancel();
                        banhji.router.navigate("/invoice_form/" + result[0].id);
                    } else {
                        //Save New
                        self.addEmpty();
                    }
                    // Refresh Customer
                    self.contactDS.filter({
                        field: "parent_id",
                        operator: "where_related",
                        model: "contact_type",
                        value: 1
                    });
                });
        },
        cancel: function() {
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();
            this.attachmentDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.attachmentDS.data([]);

            this.contactDS.filter({
                field: "parent_id",
                operator: "where_related",
                model: "contact_type",
                value: 1
            });

            banhji.userManagement.removeMultiTask("customer_deposit");
        },
        delete: function() {
            var self = this,
                obj = this.get("obj");
            this.set("showConfirm", false);

            this.deleteDS.query({
                filter: [{
                    field: "reference_id",
                    value: obj.id
                }],
                page: 1,
                pageSize: 1
            }).then(function() {
                var view = self.deleteDS.view();

                if (view.length > 0) {
                    alert("Sorry, you can not delete it.");
                } else {
                    obj.set("deleted", 1);
                    self.dataSource.sync();

                    window.history.back();
                }
            });
        },
        openConfirm: function() {
            this.set("showConfirm", true);
        },
        closeConfirm: function() {
            this.set("showConfirm", false);
        },
        //Journal
        addJournal: function(transaction_id) {
            var self = this,
                sum = 0,
                obj = this.get("obj");

            //Cash account on DR
            $.each(this.lineDS.data(), function(index, value) {
                sum += value.amount;
                self.journalLineDS.add({
                    transaction_id: transaction_id,
                    account_id: value.account_id,
                    contact_id: value.contact_id,
                    description: "",
                    reference_no: value.reference_no,
                    segments: [],
                    dr: value.amount,
                    cr: 0,
                    rate: value.rate,
                    locale: value.locale
                });
            });

            //Deposit on CR
            this.journalLineDS.add({
                transaction_id: transaction_id,
                account_id: obj.account_id,
                contact_id: obj.contact_id,
                description: "",
                reference_no: "",
                segments: obj.segments,
                dr: 0,
                cr: sum,
                rate: obj.rate,
                locale: obj.locale
            });

            this.journalLineDS.sync();
        },
        //Reference
        loadReference: function() {
            var obj = this.get("obj");

            if (obj.contact_id > 0) {
                this.set("enableRef", true);

                this.referenceDS.filter([{
                        field: "contact_id",
                        value: obj.contact_id
                    },
                    {
                        field: "status",
                        value: 0
                    },
                    {
                        field: "type",
                        value: "Sale_Order"
                    },
                    {
                        field: "due_date >=",
                        value: kendo.toString(obj.issued_date, "yyyy-MM-dd")
                    }
                ]);
            } else {
                this.set("enableRef", false);
                obj.set("reference_id", "");
            }
        },
        referenceChanges: function() {
            var obj = this.get("obj");

            if (obj.reference_id > 0) {
                var data = this.referenceDS.get(obj.reference_id);

                obj.set("segments", data.segments);
                obj.set("amount", data.amount);

                this.lineDS.data([]);
                this.lineDS.add({
                    transaction_id: obj.id,
                    account_id: "",
                    description: "",
                    reference_no: data.number,
                    amount: data.amount,
                    rate: data.rate,
                    locale: data.locale
                });
                this.set("total", kendo.toString(data.amount, data.locale == "km-KH" ? "c0" : "c", data.locale));
            }
        },
        //Recurring
        loadRecurring: function() {
            var obj = this.get("obj");

            this.recurringDS.filter([{
                    field: "type",
                    value: obj.type
                },
                {
                    field: "contact_id",
                    value: obj.contact_id
                },
                {
                    field: "is_recurring",
                    value: 1
                }
            ]);
        },
        applyRecurring: function() {
            var self = this,
                obj = this.get("obj");

            if (obj.recurring_id) {
                var data = this.recurringDS.get(obj.recurring_id);

                obj.set("employee_id", data.employee_id); //Sale Rep
                obj.set("segments", data.segments);
                obj.set("rate", data.rate);
                obj.set("locale", data.locale);
                obj.set("memo", data.memo);
                obj.set("memo2", data.memo2);
                obj.set("bill_to", data.bill_to);
                obj.set("ship_to", data.ship_to);

                this.recurringLineDS.query({
                    filter: {
                        field: "transaction_id",
                        value: data.id
                    },
                    page: 1,
                    pageSize: 100
                }).then(function() {
                    var view = self.recurringLineDS.view();
                    self.lineDS.data([]);

                    $.each(view, function(index, value) {
                        self.lineDS.add({
                            transaction_id: obj.id,
                            tax_item_id: value.tax_item_id,
                            item_id: value.item_id,
                            description: value.description,
                            quantity: value.quantity,
                            price: value.price,
                            amount: value.amount,
                            rate: value.rate,
                            locale: value.locale,

                            item_prices: value.item_prices
                        });
                    });

                    self.changes();
                });
            } else {
                this.addEmpty();
            }
        },
        frequencyChanges: function() {
            var obj = this.get("obj");

            switch (obj.frequency) {
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
        monthOptionChanges: function() {
            var obj = this.get("obj");

            switch (obj.month_option) {
                case "Day":
                    this.set("showWeek", false);
                    this.set("showDay", true);

                    break;
                default:
                    this.set("showWeek", true);
                    this.set("showDay", false);
            }
        },
        validateRecurring: function() {
            var result = true,
                obj = this.get("obj");

            if (obj.recurring_name !== "") {
                //Check existing name
                $.each(this.recurringDS.data(), function(index, value) {
                    if (value.recurring_name == obj.recurring_name) {
                        result = false;
                        alert("This is name is taken.");

                        return false;
                    }
                });
            } else {
                result = false;
                alert("Recurring name is required.");
            }

            return result;
        },
        addNewRecurring: function() {
            var self = this,
                obj = this.get("obj");

            this.recurringDS.add({
                contact_id: obj.contact_id,
                transaction_template_id: obj.transaction_template_id,
                user_id: this.get("user_id"),
                employee_id: obj.employee_id,
                type: obj.type,
                amount: obj.amount,
                discount: obj.discount,
                tax: obj.tax,
                rate: obj.rate,
                locale: obj.locale,
                bill_to: obj.bill_to,
                ship_to: obj.ship_to,
                memo: obj.memo,
                memo2: obj.memo2,
                segments: obj.segments,
                recurring_name: obj.recurring_name,
                start_date: obj.start_date,
                frequency: obj.frequency,
                month_option: obj.month_option,
                interval: obj.interval,
                day: obj.day,
                week: obj.week,
                month: obj.month,
                is_recurring: 1
            });

            $.each(this.lineDS.data(), function(index, value) {
                self.recurringLineDS.add({
                    transaction_id: 0,
                    measurement_id: value.measurement_id,
                    tax_item_id: value.tax_item_id,
                    item_id: value.item_id,
                    description: value.description,
                    quantity: value.quantity,
                    price: value.price,
                    amount: value.amount,
                    discount: value.discount,
                    rate: value.rate,
                    locale: value.locale
                });
            });
        },
        recurringSync: function() {
            var dfd = $.Deferred();

            this.recurringDS.sync();
            this.recurringDS.bind("requestEnd", function(e) {
                if (e.response) {
                    dfd.resolve(e.response.results);
                }
            });
            this.recurringDS.bind("error", function(e) {
                dfd.reject(e.errorThrown);
            });

            return dfd;
        }
    });
    banhji.invoiceCustom = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "transaction_templates"),
        txnFormDS: dataStore(apiUrl + "transaction_forms"),
        obj: null,
        objForm: null,
        formTitle: "Invoice",
        formType: "Invoice",
        company: banhji.institute,
        selectCustom: "water_mg",
        isEdit: false,
        user_id: banhji.source.user_id,
        licenseDS: dataStore(apiUrl + "branches"),
        objLicense: null,
        pageLoad: function(id) {
            if (id) {
                this.set("isEdit", true);
                this.loadObj(id);
            } else {
                var obj = this.get("obj"),
                    self = this;
                banhji.view.invoiceCustom.showIn('#invFormContent', banhji.view.invoiceForm1);
                //banhji.invoiceForm.pageLoad();
                this.addEmpty();
                this.txnFormDS.query({
                    filter: [{
                        field: "moduls",
                        value: "water_mg"
                    }],
                    page: 1,
                    take: 100
                }).then(function(e) {
                    var view = self.txnFormDS.view();
                    var obj = self.get("obj");
                    obj.set("type", view[0].type);
                    obj.set("title", view[0].title);
                    obj.set("note", view[0].note);

                });
            }
            var self = this;
            this.licenseDS.query({
                filter: {
                    field: "id",
                    value: 1
                },
                take: 1
            }).then(function(e) {
                var view = self.licenseDS.view();
                self.set("objLicense", view[0]);
            });
        },
        onChange: function(e) {
            var obj = this.get("obj"),
                self = this;
            this.txnFormDS.query({
                filter: [{
                    field: "type",
                    value: obj.type
                }, {
                    field: "moduls",
                    value: "water_mg"
                }],
                page: 1,
                take: 100
            }).then(function(e) {
                var view = self.txnFormDS.view();
                if (view.length > 0) {
                    banhji.invoiceForm.set("obj", view[0]);
                    var obj = self.get("obj");
                    obj.set("type", view[0].type);
                    obj.set("title", view[0].title);
                    obj.set("note", view[0].note);
                }
            });
            setTimeout(function(e) {
                $('#formStyle a').eq(0).click();
            }, 2000);
        },
        addEmpty: function() {
            this.dataSource.data([]);
            this.set("obj", null);
            this.dataSource.insert(0, {
                user_id: banhji.source.user_id,
                transaction_form_id: 0,
                type: "Invoice",
                name: "",
                title: "Invoice",
                note: "",
                color: null,
                moduls: "water_mg",
                item_id: '',
                status: 0
            });
            var obj = this.dataSource.at(0);
            this.set("obj", obj);
        },
        activeInvoiceTmp: function(e) {
            var Active;
            switch (e) {
                case 43:
                    Active = banhji.view.invoiceForm1;
                    break;
                case 44:
                    Active = banhji.view.invoiceForm2;
                    break;
                case 45:
                    Active = banhji.view.invoiceForm3;
                    break;
                case 49:
                    Active = banhji.view.invoiceForm4;
                    break;
            }
            banhji.view.invoiceCustom.showIn('#invFormContent', Active);
        },
        colorCC: function(e) {
            var Color = e.value;
            var tS = '';
            if (Color == '#000000' || Color == '#1f497d') tS = '#fff';
            else tS = '#333';
            $('.main-color').css({
                'background-color': e.value,
                'color': tS
            });
            $('.main-color div').css({
                'color': tS
            });
            $('.main-color p').css({
                'color': tS
            });
            $('.main-color span').css({
                'color': tS
            });
            $('.main-color th').css({
                'color': tS
            });
        },
        selectedForm: function(e) {
            var Index = e.data.id;
            this.activeInvoiceTmp(Index);
            var data = e.data,
                obj = this.get("obj");
            obj.set("transaction_form_id", data.id);
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

                //banhji.invoiceForm.set("obj", view[0]); 
                var Index = parseInt(view[0].transaction_form_id);
                self.activeInvoiceTmp(Index);
                //self.addRowLineDS();

                self.txnFormDS.filter({
                    field: "moduls",
                    value: "water_mg"
                });
            });
        },
        save: function() {
            var self = this;
            if (this.dataSource.data().length > 0) {
                this.dataSource.sync();
                this.dataSource.bind("requestEnd", function(e) {
                    if (e.type != 'read') {
                        if (e.response) {
                            $("#ntf1").data("kendoNotification").success("Successfully!");
                            //self.dataSource.addNew();
                            banhji.router.navigate("/setting");
                            banhji.setting.txnTemplateDS.fetch();
                        }
                    }
                });
                this.dataSource.bind("error", function(e) {
                    $("#ntf1").data("kendoNotification").error("Error!");
                });
            }
        },
        cancel: function() {
            this.dataSource.cancelChanges();
            banhji.router.navigate("/setting");
        }
    });
    banhji.waterInvoice = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "winvoices"),
        licenseDS: dataStore(apiUrl + "branches"),
        company: banhji.institute,
        obj: null,
        invoiceArray: [],
        pageLoad: function(id) {
            var self = this;
            this.set("obj", null);
            this.dataSource.query({
                    filter: {
                        field: "id",
                        value: id
                    },
                    take: 1
                })
                .then(function(e) {
                    var view = self.dataSource.view();
                    self.invoiceArray = [];
                    if (self.dataSource.data().length > 0) {
                        view[0].set("formcolor", "#355176");
                        self.invoiceArray.push(view[0]);
                        self.getLicense(view[0].meter.location[0].branch_id);
                    }
                });
        },
        getLicense: function(branch_id) {
            var self = this;
            this.licenseDS.query({
                filter: {
                    field: "id",
                    value: branch_id
                }
            }).then(function(e) {
                var view = self.licenseDS.view();
                banhji.InvoicePrint.license = view[0];
                banhji.InvoicePrint.dataSource = [];
                banhji.InvoicePrint.dataSource = self.invoiceArray;

                banhji.router.navigate("/invoice_print");

            });
        },
        printGrid: function() {
            var obj = this.get('obj'),
                colorM, ts;
            if (obj.color == null) {
                colorM = "#10253f";
            } else {
                colorM = obj.color;
            }
            if (obj.color == '#000000' || obj.color == '#1f497d' || obj.color == null) {
                ts = 'color: #fff!important;';
            } else {
                ts = 'color: #333;';
            }
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=800, height=900'),
                doc = win.document.open();
            var htmlStart =
                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="utf-8" />' +
                '<title></title>' +
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:0mm;margin-top: 1mm; }' +
                '.inv1 .main-color {' +
                'background-color: ' + colorM + '!important; ' + ts +
                '-webkit-print-color-adjust:exact; ' +
                '} ' +
                '.inv1 .light-blue-td { ' +
                'background-color: #c6d9f1!important;' +
                'text-align: left;' +
                'padding-left: 5px;' +
                '-webkit-print-color-adjust:exact; ' +
                '}' +
                '.inv1 thead tr {' +
                'background-color: rgb(242, 242, 242)!important;' +
                '-webkit-print-color-adjust:exact; ' +
                '}' +
                '.pcg .mid-title div {' + ts + '}' +
                '.pcg .mid-header {' +
                'background-color: #dce6f2!important; ' +
                '-webkit-print-color-adjust:exact; ' +
                '}' +
                '.inv1 span.total-amount { ' +
                'color:#fff!important;' +
                '}</style>' +
                '</head>' +
                '<body>';
            var htmlEnd =
                '</body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                //win.close();
            }, 2000);
        },
        cancel: function() {
            this.dataSource.data([]);
            window.history.back();
        }
    });

    banhji.Reconcile = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        actualCash: 0,
        actualDS: dataStore(apiUrl + "utibills/cashier_actual"),
        sessionDS: dataStore(apiUrl + "utibills/session"),
        pageLoad: function() {

        },
        save: function() {

        },
        cancel: function() {
            window.history.back();
        }
    });
    /* Report */
    banhji.Reports = kendo.observable({
        lang: langVM,
        nCustomer: 0,
        tCustomer: 0,
        activeCustomer: 0,
        waterSold: 0,
        avgUsage: 0,
        avgRevenue: 0,
        waterRevenue: 0,
        totalDeposit: 0,
        licenseSelect: 0,
        dataSource: dataStore(apiUrl + "wreports/kpi"),
        licenseDS: dataStore(apiUrl + "branches"),
        dataSourceSummary: new kendo.data.DataSource({
            transport: {
                read: {
                    url: baseUrl + 'api/waterdash/license',
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
            change: function(e) {
                var vm = banhji.wDashboard;
                var sale = 0,
                    usage = 0,
                    user = 0,
                    deposit = 0;
                $.each(this.data(), function(index, value) {
                    sale += value.sale;
                    usage += value.usage;
                    user += value.activeCustomer;
                    deposit += value.deposit;
                });
                banhji.wDashBoard.set('totalSale', kendo.toString(sale, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
                banhji.wDashBoard.set('totalUsage', kendo.toString(usage, "n0", banhji.locale));
                banhji.wDashBoard.set('totalUser', kendo.toString(user, "n0", banhji.locale));
                banhji.wDashBoard.set('totalDeposit', kendo.toString(deposit, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
                banhji.wDashBoard.set('avgUsage', usage / user);
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        }),
        dataSourceKPI: new kendo.data.DataSource({
            transport: {
                read: {
                    url: baseUrl + 'api/waterdash/kpi',
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
        graphMoney: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'utibillReports/money_collection',
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            filter: options.filter
                        };
                    }
                }
            },
            schema: {
                data: 'results',
                total: 'count'
            },
            // group: {
            //  field: 'month',
            //  aggregates: [
            //    {field: 'amount', aggregate: 'sum'}
            //  ]
            // },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 1000
        }),
        graphSale: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'utibillReports/sale',
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            filter: options.filter
                        };
                    }
                }
            },
            schema: {
                data: 'results',
                total: 'count'
            },
            // group: {
            //  field: 'month',
            //  aggregates: [
            //    {field: 'amount', aggregate: 'sum'}
            //  ]
            // },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 1000
        }),
        graphBalance: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'utibillReports/balance',
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            filter: options.filter
                        };
                    }
                }
            },
            schema: {
                data: 'results',
                total: 'count'
            },
            // group: {
            //  field: 'month',
            //  aggregates: [
            //    {field: 'amount', aggregate: 'sum'}
            //  ]
            // },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 1000
        }),
        graphCustomer: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'utibillReports/cusotmer',
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            filter: options.filter
                        };
                    }
                }
            },
            schema: {
                data: 'results',
                total: 'count'
            },
            // group: {
            //  field: 'month',
            //  aggregates: [
            //    {field: 'amount', aggregate: 'sum'}
            //  ]
            // },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 1000
        }),
        onLicenseChange: function() {
            var that = this;
            this.dataSourceSummary.query({
                    filter: {
                        field: 'id',
                        value: this.get('licenseSelect')
                    }
                })
                .then(function(e) {
                    let data = that.dataSourceSummary.data();
                    that.set('blocCount', kendo.toString(data[0].blocCount, 'n'));
                    that.set('activeCustomer', kendo.toString(data[0].activeCustomer, 'n'));
                    that.set('inActiveCount', kendo.toString(data[0].inActiveCount, 'n'));
                    that.set('deposit', kendo.toString(data[0].deposit, 'n'));
                    that.set('usage', kendo.toString(data[0].usage, 'n'));
                    that.set('sale', kendo.toString(data[0].sale, 'n'));
                    that.set('balance', kendo.toString(data[0].balance, 'n'));
                });
        },
        onLicenseChangeKPI: function() {
            var that = this;
            this.dataSourceKPI.query({
                    filter: {
                        field: 'id',
                        value: this.get('licenseKPISelect')
                    }
                })

        },
        pageLoad: function() {
            var that = this;
        },
        save: function() {
            var self = this;
        },
        cancel: function() {
            this.dataSource.data([]);
            banhji.router.navigate("/");
        },
        // bindMarkerToPolylines(marker, index) {
        //     var infoWindow = new google.maps.InfoWindow();
        //     google.maps.event.addListener(marker, 'click', function(e) {
        //         var nextlatlng, prevlatlng, newMarkerLatLng = marker.getPosition();

        //         // for all markers apart from the last one, we have the polyline from this marker to the next one to update
        //         if (index < arrDestinations.length-1) {
        //             nextlatlng = new google.maps.LatLng(arrDestinations[index+1].lat, arrDestinations[index+1].lng);
        //             arrDestinations[index].polyline.setPath([newMarkerLatLng, nextlatlng]);
        //         }

        //         // for all markers apart from the first one, we have the polyline to this marker from the previous one
        //         if (index > 0) {
        //             prevlatlng = new google.maps.LatLng(arrDestinations[index-1].lat, arrDestinations[index-1].lng);
        //             arrDestinations[index-1].polyline.setPath([prevlatlng, newMarkerLatLng]);
        //         }

        //         // update our lat/lng values
        //         arrDestinations[index].lat = newMarkerLatLng.lat();
        //         arrDestinations[index].lng = newMarkerLatLng.lng();
        //         infoWindow.setContent("<div style = 'width:200px;min-height:40px'>" 
        //             +"<b>"+ arrDestinations[index].title +"</b>"+"<br><br>"
        //             + arrDestinations[index].lat + " ," 
        //             + arrDestinations[index].lng + "</div>");

        //         infoWindow.open(map, marker);
        //     });
        // },
        // initMap() {
        //     map = new google.maps.Map(document.getElementById('map'), {
        //       center: {lat: -34.397, lng: 150.644},
        //       zoom: 8
        //     });
        // },
        // viewMap: function() {
        //     var arrDestinations;
        //     var mapElemnt = $("#map");
        //     var map;
        //     this.initMap();
        //     google.maps.event.addDomListener(window, 'load', this.initialize());
        // },
        // initialize: function() {

        //         var i, latlng, nextlatlng, marker, map = new google.maps.Map(map, {
        //             zoom: 17,
        //             center: new google.maps.LatLng(10.598616,104.165910),
        //             mapTypeId: google.maps.MapTypeId.ROADMAP
        //         });

        //         arrDestinations = [
        //             {lat: 10.599540, lng: 104.167985, title: "WS-0001 តេង​ ពេញ"},
        //             {lat: 10.599614, lng: 104.167561, title: "WS-0002 ពេជ្រ វណ្ណៈ"},
        //             {lat: 10.599630, lng: 104.167132, title: "WS-0003 សុខ សារួន"},
        //             {lat: 10.599630, lng: 104.166166, title: "WS-0004 ចឹក តុប"},          
        //             {lat: 10.599556, lng: 104.165501, title: "WS-0005 គ្រី តង"},
        //             {lat: 10.599451, lng: 104.165122, title: "WS-0006 ជីព ផល"},
        //             {lat: 10.599436, lng: 104.165064, title: "WS-0007 ខាត់ ខៃ"},
        //             {lat: 10.599299, lng: 104.164277, title: "WS-0008 ផូ ស្រី"},
        //             {lat: 10.599312, lng: 104.163700, title: "WS-0009 បូ ថារី"},
        //             {lat: 10.599254, lng: 104.163641, title: "WS-0010 ចែត សំបូរ"},
        //             {lat: 10.599232, lng: 104.163453, title: "WS-0011 ហ៊ីង ណែម"},
        //             {lat: 10.599198, lng: 104.163319, title: "WS-0012 ជា​ ជំនិត"}, 
        //             {lat: 10.599162, lng: 104.163362, title: "WS-0013 កាយ ម៉ៅ"},
        //             {lat: 10.599020, lng: 104.163469, title: "WS-0014 អុន ឌីណា"},
        //             {lat: 10.598917, lng: 104.163541, title: "WS-0015 អ៊ុច ហូរ"},
        //             {lat: 10.598818, lng: 104.163635, title: "WS-0016 ពេជ្រ ចន្ធូ"},
        //             {lat: 10.598657, lng: 104.163825, title: "WS-0017 នួន នឿន"},
        //             {lat: 10.598483, lng: 104.163964, title: "WS-0018 អ៊ុច សេងគង័"},
        //             {lat: 10.598389, lng: 104.164031, title: "WS-0019 ផាន វៃ"},
        //             {lat: 10.598194, lng: 104.164203, title: "WS-0020 ដូង ស៊ីណាត"},
        //             {lat: 10.598141, lng: 104.164102, title: "WS-0021 សំ រ៉េន"},
        //             {lat: 10.598291, lng: 104.163984, title: "WS-0022 រឺន វណ្ណា"},
        //             {lat: 10.598562, lng: 104.163683, title: "WS-0023 ទេព សុភា"}, 
        //             {lat: 10.598710, lng: 104.163576 , title: "WS-0024 បូ សៅ"},
        //             {lat: 10.599039, lng: 104.163267, title: "WS-0025 ណយ ភាស់"},
        //             {lat: 10.599081, lng: 104.162980 , title: "WS-0026 ជា យូរ៉ា"},
        //             {lat: 10.599039, lng: 104.162556 , title: "WS-0027 វី​ ណារី"},  
        //             {lat: 10.599039, lng: 104.162556 , title: "WS-0028 ជា សេង"},
        //             {lat: 10.599023, lng: 104.162272 , title: "WS-0029 ហឿង ហាក់"},
        //             {lat: 10.598873, lng: 104.161317 , title: "WS-0030 ណុច សាវី"},
        //             {lat: 10.598556, lng: 104.160544 , title: "WS-0030 ណុច សាវី"},
        //             {lat: 10.597823, lng: 104.160409 , title: "WS-0030 ណុច សាវី"} 
                    
        //         ]; 
        //         var self = this;
        //         for (i = 0; i < arrDestinations.length; i++) {
        //             latlng = new google.maps.LatLng(arrDestinations[i].lat, arrDestinations[i].lng);

        //             if (i < arrDestinations.length-1) {
        //                 nextlatlng = new google.maps.LatLng(arrDestinations[i+1].lat, arrDestinations[i+1].lng);

        //                 // draw a line from this marker to the next one 
        //                 arrDestinations[i].polyline = new google.maps.Polyline({
        //                     path: [latlng, nextlatlng],
        //                     strokeColor: "#FF0000",
        //                     strokeOpacity: 0.5,
        //                     strokeWeight: 2,
        //                     map: map
        //                 });
        //             }

        //             marker = new google.maps.Marker({
        //                 position: latlng,
        //                 map: map, 
        //                 title: arrDestinations[i].title
        //             });

        //             self.bindMarkerToPolylines(marker, i);
        //         }
        // }   
    });
    banhji.customerList = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/customer_list"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        subLocationDS: dataStore(apiUrl + "locations"),
        boxDS: dataStore(apiUrl + "locations"),
        licenseSelect: null,
        company: banhji.institute,
        blocSelect: null,
        loSelectName: "",
        monthOf: "",
        monthOfUpload: null,
        pageLoad: function() {
            this.licenseDS.read();
            this.set("monthOfUpload", "<?php echo date('Y-m-d');?>");
            this.search();
        },
        printGrid: function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=900, height=700'),
                doc = win.document.open();
            var htmlStart =
                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="utf-8" />' +
                '<title></title>' +
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
                '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                '<style>' +
                '*{  } html { font: 11pt sans-serif; }' +
                '.k-grid { border-top-width: 0; }' +
                '.k-grid, .k-grid-content { height: auto !important; }' +
                '.k-grid-content { overflow: visible !important; }' +
                'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        licenseChange: function(e) {
            var self = this;
            this.blocDS.data([]);
            this.set("locationSelect", "");
            this.set("haveLicense", false)
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveLocation", false);
            this.set("haveSubLocation", false);
            this.blocDS.filter([{
                    field: "branch_id",
                    value: this.get("licenseSelect")
                },
                {
                    field: "main_bloc",
                    value: 0
                },
                {
                    field: "main_pole",
                    value: 0
                }
            ]);
            this.set("haveLicense", true);
            this.set("liSelectName", e.sender.span[0].innerText);
        },        
        onLocationChange: function(e) {
            var self = this;
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveSubLocation", false);
            if (this.get("blocSelect")) {
                this.subLocationDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: 0
                            }
                        ],
                        page: 1
                    })
                    .then(function(e) {
                        if (self.subLocationDS.data().length > 0) {
                            self.set("haveLocation", true);
                        } else {
                            self.set("haveLocation", false);
                            self.set("subLocationSelect", "");
                            self.subLocationDS.data([]);
                        }
                    });
            }
            this.set("loSelectName", e.sender.span[0].innerText);
        },
        onSubLocationChange: function(e) {
            var self = this;
            if (this.get("subLocationSelect")) {
                this.boxDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: this.get("subLocationSelect")
                            }
                        ]
                    })
                    .then(function(e) {
                        if (self.boxDS.data().length > 0) {
                            self.set("haveSubLocation", true);
                        } else {
                            self.set("haveSubLocation", false);
                            self.set("boxSelect", "");
                            self.boxDS.data([]);
                        }
                    });
            }
        },
        search: function() {
            var monthOfSearch = this.get("monthOfUpload"),
                license_id = this.get("licenseSelect"),
                bloc_id = this.get("blocSelect");
                pole_id = this.get("subLocationSelect");
                box_id = this.get("boxSelect");

            var para = [];
            var monthPara = [];
            var monthOf = new Date(monthOfSearch);
                monthOf.setDate(1);
                monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

                var monthL = new Date(monthOfSearch);
                var lastDayOfMonth = new Date(monthL.getFullYear(), monthL.getMonth() + 1, 0);
                lastDayOfMonth = lastDayOfMonth.getDate();

                monthL.setDate(lastDayOfMonth);
                monthL = kendo.toString(monthL, "yyyy-MM-dd");

                para.push({
                    field: "month_of >=",
                    value: monthOf
                }, {
                    field: "month_of <=",
                    value: monthL
                });
                this.set("monthOf", monthOf);
                //this.dataSource.filter(para);
                        if(license_id){
                            para.push({
                                field: "branch_id",
                                operator: "where_related_meter",
                                value: license_id
                            });
                        }

                        if (box_id) {
                            para.push({
                                field: "box_id",
                                operator: "where_related_meter",
                                value: box_id
                            });
                        } 

                        if (pole_id) {
                            para.push({
                                field: "pole_id",
                                operator: "where_related_meter",
                                value: pole_id
                            });
                        } 

                        if (bloc_id){
                            para.push({
                                field: "location_id",
                                operator: "where_related_meter",
                                value: bloc_id
                            });
                        }
                        this.dataSource.query({
                            filter: para,
                            limit: 300
                        });                     
        },
        cancel: function() {
            this.contact.cancelChanges();
            window.history.back();
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Customer List",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "customerList.xlsx"
            });
        }
    });
    banhji.customerNoConnection = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "wreports/noConnection_list"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        licenseSelect: null,
        blocSelect: null,
        pageLoad: function() {
            this.licenseDS.read();
        },
        printGrid: function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=900, height=700'),
                doc = win.document.open();
            var htmlStart =
                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="utf-8" />' +
                '<title></title>' +
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
                '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                '<style>' +
                '*{  } html { font: 11pt sans-serif; }' +
                '.k-grid { border-top-width: 0; }' +
                '.k-grid, .k-grid-content { height: auto !important; }' +
                '.k-grid-content { overflow: visible !important; }' +
                'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
        },
        search: function() {
            var para = [],
                license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }
            this.dataSource.filter(para);
        },
        cancel: function() {
            this.contact.cancelChanges();
            window.history.back();
        }
    });
    banhji.disconnectList = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/disconnection_list"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        company: banhji.institute,
        licenseSelect: null,
        blocSelect: null,
        pageLoad: function() {
            this.licenseDS.read();
            this.search();
            this.set("haveBloc", false);
        },
        printGrid: function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=900, height=700'),
                doc = win.document.open();
            var htmlStart =
                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="utf-8" />' +
                '<title></title>' +
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
                '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                '<style>' +
                '*{  } html { font: 11pt sans-serif; }' +
                '.k-grid { border-top-width: 0; }' +
                '.k-grid, .k-grid-content { height: auto !important; }' +
                '.k-grid-content { overflow: visible !important; }' +
                'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            this.dataSource.filter(para);
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Disconnect Customer List",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Customer",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "License",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Number",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Phone",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Address",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name
                                },
                                {
                                    value: response.results[i].license
                                },
                                {
                                    value: response.results[i].number
                                },
                                {
                                    value: response.results[i].phone
                                },
                                {
                                    value: response.results[i].address
                                },
                            ]
                        });
                    }
                }
            });
        },
        cancel: function() {
            this.contact.cancelChanges();
            window.history.back();
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Disconnect Customer List",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "disconnectCustomer.xlsx"
            });
        }
    });
    banhji.connectionList = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/connection_list"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        subLocationDS: dataStore(apiUrl + "locations"),
        boxDS: dataStore(apiUrl + "locations"),
        company: banhji.institute,
        licenseSelect: null,
        blocSelect: null,
        pageLoad: function() {
            this.licenseDS.read();
            this.search();
        },
        printGrid: function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=900, height=700'),
                doc = win.document.open();
            var htmlStart =
                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="utf-8" />' +
                '<title></title>' +
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
                '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                '<style>' +
                '*{  } html { font: 11pt sans-serif; }' +
                '.k-grid { border-top-width: 0; }' +
                '.k-grid, .k-grid-content { height: auto !important; }' +
                '.k-grid-content { overflow: visible !important; }' +
                'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        licenseChange: function(e) {
            var self = this;
            this.blocDS.data([]);
            this.set("locationSelect", "");
            this.set("haveLicense", false)
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveLocation", false);
            this.set("haveSubLocation", false);
            this.blocDS.filter([{
                    field: "branch_id",
                    value: this.get("licenseSelect")
                },
                {
                    field: "main_bloc",
                    value: 0
                },
                {
                    field: "main_pole",
                    value: 0
                }
            ]);
            this.set("haveLicense", true);
            this.set("liSelectName", e.sender.span[0].innerText);
        },        
        onLocationChange: function(e) {
            var self = this;
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveSubLocation", false);
            if (this.get("blocSelect")) {
                this.subLocationDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: 0
                            }
                        ],
                        page: 1
                    })
                    .then(function(e) {
                        if (self.subLocationDS.data().length > 0) {
                            self.set("haveLocation", true);
                        } else {
                            self.set("haveLocation", false);
                            self.set("subLocationSelect", "");
                            self.subLocationDS.data([]);
                        }
                    });
            }
            this.set("loSelectName", e.sender.span[0].innerText);
        },
        onSubLocationChange: function(e) {
            var self = this;
            if (this.get("subLocationSelect")) {
                this.boxDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: this.get("subLocationSelect")
                            }
                        ]
                    })
                    .then(function(e) {
                        if (self.boxDS.data().length > 0) {
                            self.set("haveSubLocation", true);
                        } else {
                            self.set("haveSubLocation", false);
                            self.set("boxSelect", "");
                            self.boxDS.data([]);
                        }
                    });
            }
        },
        search: function() {
            var monthOfSearch = this.get("monthOfUpload"),
                license_id = this.get("licenseSelect"),
                bloc_id = this.get("blocSelect");
                pole_id = this.get("subLocationSelect");
                box_id = this.get("boxSelect");

            var para = [];
            var monthPara = [];
            var monthOf = new Date(monthOfSearch);
                monthOf.setDate(1);
                monthOf = kendo.toString(monthOf, "yyyy-MM-dd");

                var monthL = new Date(monthOfSearch);
                var lastDayOfMonth = new Date(monthL.getFullYear(), monthL.getMonth() + 1, 0);
                lastDayOfMonth = lastDayOfMonth.getDate();

                monthL.setDate(lastDayOfMonth);
                monthL = kendo.toString(monthL, "yyyy-MM-dd");

                para.push({
                    field: "created_at >=",
                    value: monthOf
                }, {
                    field: "created_at <=",
                    value: monthL
                });
                this.set("monthOf", monthOf);
                //this.dataSource.filter(para);
                        if(license_id){
                            para.push({
                                field: "branch_id",
                                operator: "where_related_meter",
                                value: license_id
                            });
                        }

                        if (box_id) {
                            para.push({
                                field: "box_id",
                                operator: "where_related_meter",
                                value: box_id
                            });
                        } 

                        if (pole_id) {
                            para.push({
                                field: "pole_id",
                                operator: "where_related_meter",
                                value: pole_id
                            });
                        } 

                        if (bloc_id){
                            para.push({
                                field: "location_id",
                                operator: "where_related_meter",
                                value: bloc_id
                            });
                        }
                        this.dataSource.query({
                            filter: para,
                            limit: 300
                        });                     
        },
        cancel: function() {
            this.contact.cancelChanges();
            window.history.back();
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Disconnect Customer List",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "disconnectCustomer.xlsx"
            });
        }
    });
    banhji.inactiveList = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/inactive_list"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        company: banhji.institute,
        licenseSelect: null,
        blocSelect: null,
        pageLoad: function() {
            this.licenseDS.read();
            this.search();
            this.set("haveBloc", false);
        },
        printGrid: function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=900, height=700'),
                doc = win.document.open();
            var htmlStart =
                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="utf-8" />' +
                '<title></title>' +
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
                '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                '<style>' +
                '*{  } html { font: 11pt sans-serif; }' +
                '.k-grid { border-top-width: 0; }' +
                '.k-grid, .k-grid-content { height: auto !important; }' +
                '.k-grid-content { overflow: visible !important; }' +
                'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            this.dataSource.filter(para);
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Disconnect Customer List",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Customer",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "License",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Number",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Phone",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Address",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name
                                },
                                {
                                    value: response.results[i].license
                                },
                                {
                                    value: response.results[i].number
                                },
                                {
                                    value: response.results[i].phone
                                },
                                {
                                    value: response.results[i].address
                                },
                            ]
                        });
                    }
                }
            });
        },
        cancel: function() {
            this.contact.cancelChanges();
            window.history.back();
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Disconnect Customer List",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "disconnectCustomer.xlsx"
            });
        }
    });
    banhji.to_be_disconnectList = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/to_be_disconnection_list"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        licenseSelect: null,
        blocSelect: null,
        company: banhji.institute,
        pageLoad: function() {
            this.licenseDS.read();
            this.search();
            this.set("haveBloc", false);
        },
        printGrid: function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=900, height=700'),
                doc = win.document.open();
            var htmlStart =
                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="utf-8" />' +
                '<title></title>' +
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
                '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                '<style>' +
                '*{  } html { font: 11pt sans-serif; }' +
                '.k-grid { border-top-width: 0; }' +
                '.k-grid, .k-grid-content { height: auto !important; }' +
                '.k-grid-content { overflow: visible !important; }' +
                'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }
            this.dataSource.filter(para);
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "To Be Disconnect Customer List",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Customer",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Status",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        var date = new Date(),
                            dueDates = new Date(response.results[i].due_date).getTime(),
                            overDue, toDay = new Date(date).getTime();
                        if (dueDates < toDay) {
                            overDue = Math.floor((toDay - dueDates) / (1000 * 60 * 60 * 24)) + "days";
                        } else {
                            overDue = Math.floor((dueDates - toDay) / (1000 * 60 * 60 * 24)) + "days to pay";
                        }
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name
                                },
                                {
                                    value: response.results[i].issued_date
                                },
                                {
                                    value: response.results[i].number
                                },
                                {
                                    value: overDue
                                },
                                {
                                    value: response.results[i].location
                                },
                            ]
                        });
                    }
                }
            });
        },
        cancel: function() {
            this.contact.cancelChanges();
            window.history.back();
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "To Be Disconnect Customer List",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "tobeDisconnect.xlsx"
            });
        }
    });
    banhji.newCustomerList = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/newProperty_list"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        totalAmount: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            this.blocDS.filter([{
                    field: "branch_id",
                    value: this.get("licenseSelect")
                },
                {
                    field: "main_bloc",
                    value: 0
                },
                {
                    field: "main_pole",
                    value: 0
                }
            ]);
        },
        search: function(e) {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            //Account

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);
                para.push({
                    field: "date_used >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "date_used <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");
                para.push({
                    field: "date_used",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "date_used <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter: para
            }).then(function(e) {
                var view = self.dataSource.view();
                console.log(view);
                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "General Ledger",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "GeneralLedger.xlsx"
            });
        }
    });
    banhji.miniUsageList = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/miniusage"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.supplierList,
            filter: {
                field: "status",
                value: 1
            },
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        displayDate: "",
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        licenseSelect: null,
        blocSelect: null,
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        printGrid: function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=900, height=700'),
                doc = win.document.open();
            var htmlStart =
                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="utf-8" />' +
                '<title></title>' +
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
                '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                '<style>' +
                '*{  } html { font: 11pt sans-serif; }' +
                '.k-grid { border-top-width: 0; }' +
                '.k-grid, .k-grid-content { height: auto !important; }' +
                '.k-grid-content { overflow: visible !important; }' +
                'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }


            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "date_used >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "date_used <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "date_used",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "date_used <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);

            this.dataSource.filter(para);
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.institute.name,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Disconnect Customer List",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 5
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Meter Number",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "License",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Address",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Usage",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        var from_date = response.results[i].from_date,
                            to_date = response.results[i].to_date,
                            date;
                        date = from_date + "-" + to_date;
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].meter_number
                                },
                                {
                                    value: date
                                },
                                {
                                    value: response.results[i].license
                                },
                                {
                                    value: response.results[i].address
                                },
                                {
                                    value: response.results[i].usage
                                },
                            ]
                        });
                    }
                }
            });
        },
        cancel: function() {
            this.contact.cancelChanges();
            window.history.back();
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Minimum Water Usage List",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "minimumWaterUsage.xlsx"
            });
        }
    });
    banhji.customerNoMeter = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        contact: dataStore(apiUrl + "customers"),
        dataSource: dataStore(apiUrl + "contacts/no_meter"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        licenseSelect: null,
        blocSelect: null,
        contactTypeDS: banhji.source.customerTypeDS,
        contactAAA: banhji.source.customerDS,
        statusList: banhji.source.statusList,
        contact_type_id: null,
        status: null,
        pageLoad: function() {
            this.contact.filter({
                field: "use_water",
                value: 1
            });
            this.licenseDS.read();

        },
        printGrid: function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=900, height=700'),
                doc = win.document.open();
            var htmlStart =
                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="utf-8" />' +
                '<title></title>' +
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
                '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                '<style>' +
                '*{  } html { font: 11pt sans-serif; }' +
                '.k-grid { border-top-width: 0; }' +
                '.k-grid, .k-grid-content { height: auto !important; }' +
                '.k-grid-content { overflow: visible !important; }' +
                'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
        },
        search: function() {
            var para = [],
                status = this.get("status"),
                contact_type_id = this.get("contact_type_id");

            if (status !== null) {
                para.push({
                    field: "status",
                    value: status
                });
            }

            if (contact_type_id) {
                para.push({
                    field: "contact_type_id",
                    value: contact_type_id
                });
            }

            this.dataSource.filter(para);
            this.set("status", null);
            this.set("contact_type_id", null);
        },
        selectedRow: function(e) {
            var data = e.data;

            this.set("obj", data);
            this.loadData();
        },
    });
    banhji.saleSummary = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/sale_summary"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        totalAmount: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "issued_date",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Sale Summary Report",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 5
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Customer",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Usage",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Invoice Number",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Total Sale",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        balanceRec += response.results[i].amount;
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name
                                },
                                {
                                    value: response.results[i].location
                                },
                                {
                                    value: response.results[i].usage
                                },
                                {
                                    value: response.results[i].invoice
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].amount)
                                },
                            ]
                        });
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 5
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceRec),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                    ],
                    title: "Sale Summary",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "saleSummary.xlsx"
            });
        }
    });
    banhji.connectServiceRevenue = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/connect_service_revenue"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        totalAmount: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }
            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "issued_date",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceCal = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 4
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Connection Service Revenue Report",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 4
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 4
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 4
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Type",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Revenue",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                }
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            balanceCal += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].type
                                    },
                                    {
                                        value: response.results[i].line[j].date
                                    },
                                    {
                                        value: response.results[i].line[j].location
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].amount)
                                    },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 4
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceCal),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                    ],
                    title: "Connection Service Revenue",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "connectionRevenue.xlsx"
            });
        }
    });
    banhji.saleDetail = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/sale_detail"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        total: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "issued_date",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceCal = 0,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 6
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Sale Detail Report",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 6
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 6
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 6
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Type",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Usage",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                }
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            balanceCal += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].type
                                    },
                                    {
                                        value: response.results[i].line[j].date
                                    },
                                    {
                                        value: response.results[i].line[j].location
                                    },
                                    {
                                        value: response.results[i].line[j].number
                                    },
                                    {
                                        value: response.results[i].line[j].usage
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].amount)
                                    },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 6
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceCal),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Sale Detail",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "saleDetail.xlsx"
            });
        }
    });
    banhji.fineCollect = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/fine_collect"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        total: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "issued_date",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceCal = 0,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Fine Collection",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 5
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 5
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 5
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Type",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            balanceCal += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].type
                                    },
                                    {
                                        value: response.results[i].line[j].date
                                    },
                                    {
                                        value: response.results[i].line[j].location
                                    },
                                    {
                                        value: response.results[i].line[j].number
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].amount)
                                    },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 5
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceCal),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                    ],
                    title: "Fine Collect",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "fineCollect.xlsx"
            });
        }
    });
    banhji.otherRevenues = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "customers"),
        pageLoad: function() {},
        printGrid: function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=900, height=700'),
                doc = win.document.open();
            var htmlStart =
                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="utf-8" />' +
                '<title></title>' +
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
                '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                '<style>' +
                '*{  } html { font: 11pt sans-serif; }' +
                '.k-grid { border-top-width: 0; }' +
                '.k-grid, .k-grid-content { height: auto !important; }' +
                '.k-grid-content { overflow: visible !important; }' +
                'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        cancel: function(e) {
            this.dataSource.cancelChanges();
            window.history.back();
        },
    });
    banhji.accountReceivableList = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/Reciveble_invoice"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        as_of: new Date(),
        displayDate: "",
        totalAmount: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                as_of = this.get("as_of"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            if (as_of) {
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(as_of, "yyyy-MM-dd")
                });
            }

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 7
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Accounts Receivable Listing",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 7
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 7
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 7
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Type",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Name",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Status",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        balanceRec += response.results[i].amount;
                        var date = new Date(),
                            dueDates = new Date(response.results[i].due_date).getTime(),
                            overDue, toDay = new Date(date).getTime();
                        if (dueDates < toDay) {
                            overDue = Math.floor((toDay - dueDates) / (1000 * 60 * 60 * 24)) + "days";
                        } else {
                            overDue = Math.floor((dueDates - toDay) / (1000 * 60 * 60 * 24)) + "days to pay";
                        }
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].type
                                },
                                {
                                    value: response.results[i].issued_date
                                },
                                {
                                    value: response.results[i].name
                                },
                                {
                                    value: response.results[i].number
                                },
                                {
                                    value: response.results[i].location
                                },
                                {
                                    value: overDue
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].amount)
                                },
                            ]
                        });
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 7
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceRec),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Accounts Receivable Listing",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "ARListing.xlsx"
            });
        }
    });
    banhji.agingSummary = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/aging_summary"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        as_of: new Date(),
        displayDate: "",
        totalBalance: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                as_of = this.get("as_of"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            if (as_of) {
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(as_of, "yyyy-MM-dd")
                });
            }

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var balance = 0;
                $.each(view, function(index, value) {
                    balance += value.total;
                });

                self.set("totalBalance", kendo.toString(balance, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 7
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Receivable Aging Summary",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 7
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 7
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 7
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Customer",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Current",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "1-30",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "31-60",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "61-90",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Over90",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Total",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        balanceRec += response.results[i].total;
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].current)
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].in30)
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].in60)
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].in90)
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].over90)
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].total)
                                },
                            ]
                        });
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 7
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceRec),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Receivable Agin Summary",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "receivableAginSummary.xlsx"
            });
        }
    });
    banhji.customerDepositReport = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/deposit"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        totalAmount: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");


            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "issued_date",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);

            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    $.each(value.line, function(ind, val) {
                        amount += val.amount;
                    });
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceCal = 0,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 7
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Customer Deposit Report",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 7
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 7
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 7
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Type",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Number",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Balance",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                }
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            balanceCal += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].type
                                    },
                                    {
                                        value: response.results[i].line[j].issued_date
                                    },
                                    {
                                        value: response.results[i].line[j].number
                                    },
                                    {
                                        value: response.results[i].line[j].reference
                                    },
                                    {
                                        value: response.results[i].line[j].location
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].amount)
                                    },
                                    {
                                        value: balanceCal
                                    },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 7
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceCal),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Customer Deposit",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "customerDeposit.xlsx"
            });
        }
    });
    banhji.customerBalanceSummary = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/balance_summary"),
        obj: null,
        company: banhji.institute,
        as_of: new Date(),
        displayDate: "",
        totalTxn: 0,
        totalBalance: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
        },
        search: function() {
            var self = this,
                para = [],
                as_of = this.get("as_of"),
                displayDate = "";

            if (as_of) {
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(as_of, "yyyy-MM-dd")
                });
            }

            this.dataSource.query({
                filter: para,
                page: 1
            }).then(function() {
                var view = self.dataSource.view();

                var balance = 0,
                    txnCount = 0;
                $.each(view, function(index, value) {
                    txnCount += value.txn_count;
                    balance += value.amount;
                });

                self.set("total_txn", kendo.toString(txnCount, "n0"));
                self.set("total_balance", kendo.toString(balance, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 3
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Customer Balance Summary",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 3
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 3
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 3
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Customer Name",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "No. OF Invoice",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Balance",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        balanceRec += response.results[i].amount;
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name
                                },
                                {
                                    value: response.results[i].number
                                },
                                {
                                    value: kendo.parseFloat(response.results[i].amount)
                                },
                            ]
                        });
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 3
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceRec),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Customer Balance Summary",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "customerBalanceSummary.xlsx"
            });
        }
    });
    banhji.customerBalanceDetail = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/balance_detail"),
        obj: null,
        company: banhji.institute,
        as_of: new Date(),
        displayDate: "",
        totalTxn: 0,
        totalBalance: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                as_of = this.get("as_of"),
                displayDate = "";

            if (as_of) {
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(as_of, "yyyy-MM-dd")
                });
            }

            this.dataSource.query({
                filter: para,
                sort: [{
                        field: "issued_date",
                        dir: "asc"
                    },
                    {
                        field: "number",
                        operator: "order_by_related_contact",
                        dir: "asc"
                    }
                ]
            }).then(function() {
                var view = self.dataSource.view();

                var balance = 0,
                    txnCount = 0;
                $.each(view, function(index, value) {
                    txnCount += value.line.length;
                    $.each(value.line, function(ind, val) {
                        balance += val.amount;
                    });
                });

                self.set("total_txn", kendo.toString(txnCount, "n0"));
                self.set("total_balance", kendo.toString(balance, "c2", banhji.locale));
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "General Ledger",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "GeneralLedger.xlsx"
            });
        }
    });
    banhji.agingDetail = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/aging_detail"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        as_of: new Date(),
        displayDate: "",
        totalBalance: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                as_of = this.get("as_of"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");


            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            if (as_of) {
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(as_of, "yyyy-MM-dd")
                });
            }

            this.dataSource.query({
                filter: para,
                sort: [{
                        field: "issued_date",
                        dir: "asc"
                    },
                    {
                        field: "number",
                        operator: "order_by_related_contact",
                        dir: "asc"
                    }
                ]
            }).then(function() {
                var view = self.dataSource.view();

                var balance = 0;
                $.each(view, function(index, value) {
                    $.each(value.line, function(ind, val) {
                        balance += val.amount;
                    });
                });

                self.set("totalBalance", kendo.toString(balance, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceCal = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 8
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Customer Aging Detail List",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 8
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 8
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 8
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Type",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Invoice data",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Due Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Location",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Status",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Balance",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                }
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            balanceCal += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].type
                                    },
                                    {
                                        value: response.results[i].line[j].issued_date
                                    },
                                    {
                                        value: response.results[i].line[j].due_date
                                    },
                                    {
                                        value: response.results[i].line[j].number
                                    },
                                    {
                                        value: response.results[i].line[j].location
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].amount)
                                    },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 8
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceCal),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Customer Aging Detail",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "customerAgingDetail.xlsx"
            });
        }
    });
    banhji.cashReceiptSummary = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "wreports/cr_summary"),
        pageLoad: function() {},
        printGrid: function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=900, height=700'),
                doc = win.document.open();
            var htmlStart =
                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="utf-8" />' +
                '<title></title>' +
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
                '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                '<style>' +
                '*{  } html { font: 11pt sans-serif; }' +
                '.k-grid { border-top-width: 0; }' +
                '.k-grid, .k-grid-content { height: auto !important; }' +
                '.k-grid-content { overflow: visible !important; }' +
                'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        cancel: function(e) {
            this.dataSource.cancelChanges();
            window.history.back();
        },
    });
    banhji.cashReceiptSourceSummary = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/wsource_summary"),
        pageLoad: function() {},
        printGrid: function() {
            var gridElement = $('#grid'),
                printableContent = '',
                win = window.open('', '', 'width=900, height=700'),
                doc = win.document.open();
            var htmlStart =
                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '<meta charset="utf-8" />' +
                '<title></title>' +
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
                '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                '<style>' +
                '*{  } html { font: 11pt sans-serif; }' +
                '.k-grid { border-top-width: 0; }' +
                '.k-grid, .k-grid-content { height: auto !important; }' +
                '.k-grid-content { overflow: visible !important; }' +
                'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
                '</head>' +
                '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
            var htmlEnd =
                '</div></body>' +
                '</html>';

            printableContent = $('#invFormContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        cancel: function(e) {
            this.dataSource.cancelChanges();
            window.history.back();
        },
    });
    banhji.cashReceiptDetail = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/cash_receipt"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        sorter: "month",
        sdate: "",
        edate: "",
        as_of: new Date(),
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        total_txn: 0,
        totalAmount: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");


            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }


            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "issued_date",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);
            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0,
                    txn_count = 0;
                $.each(view, function(index, value) {
                    $.each(value.line, function(indexx, x) {
                        txn_count++;
                        $.each(x.payments, function(indexy, y) {
                            amount += y.amount;
                        });
                    });
                });

                self.set("total_txn", kendo.toString(txn_count, "n0"));
                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceCal = 0,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 6
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Cash Receipt Detail",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 6
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 6
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 6
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Receipt Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Receipt Number",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Receipt Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Invoice Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Invoice Number",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Invoice Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].name,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                }
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            balanceCal += response.results[i].line[j].reference_amount;
                            balanceRec += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].issued_date
                                    },
                                    {
                                        value: response.results[i].line[j].number
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].amount)
                                    },
                                    {
                                        value: response.results[i].line[j].reference_issued_date
                                    },
                                    {
                                        value: response.results[i].line[j].reference_number
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].reference_amount)
                                    },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 6
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                                value: "TOTAL",
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceRec),
                                bold: true,
                                fontSize: 16
                            },
                            {
                                value: ""
                            },
                            {
                                value: ""
                            },
                            {
                                value: kendo.parseFloat(response.balanceCal),
                                bold: true,
                                fontSize: 16
                            },
                        ]
                    });
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Cash Receipt Detail",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "cashReceiptDetail.xlsx"
            });
        }
    });
    banhji.cashReceiptSourceDetail = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/cash_receipt_source"),
        contactDS: new kendo.data.DataSource({
            data: banhji.source.customerList,
            sort: {
                field: "number",
                dir: "asc"
            }
        }),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        sortList: banhji.source.sortList,
        obj: {
            contactIds: [],
            licenseID: 0,
            locationID: []
        },
        company: banhji.institute,
        displayDate: "",
        sorter: "month",
        as_of: new Date(),
        totalAmount: 0,
        exArray: [],
        pageLoad: function() {
            this.search();
            this.set("haveBloc", false);
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        licenseChange: function(e) {
            var data = e.data;
            var license = this.licenseDS.at(e.sender.selectedIndex - 1);
            this.set("licenseSelect", license);
            this.blocDS.filter({
                field: "branch_id",
                value: license.id
            });
            this.set("haveBloc", true);
        },
        search: function() {
            var self = this,
                para = [],
                obj = this.get("obj"),
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";
            license = this.get("licenseSelect"),
                bloc = this.get("blocSelect");

            if (license) {
                para.push({
                    field: "branch_id",
                    value: license.id
                });
            }

            if (bloc) {
                para.push({
                    field: "location_id",
                    value: bloc.id
                });
            }

            //Customer
            if (obj.contactIds.length > 0) {
                var contactIds = [];
                $.each(obj.contactIds, function(index, value) {
                    contactIds.push(value);
                });
                para.push({
                    field: "contact_id",
                    operator: "where_in",
                    value: contactIds
                });
            }

            //Dates
            if (start && end) {
                start = new Date(start);
                end = new Date(end);
                displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date >=",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else if (start) {
                start = new Date(start);
                displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

                para.push({
                    field: "issued_date",
                    value: kendo.toString(start, "yyyy-MM-dd")
                });
            } else if (end) {
                end = new Date(end);
                displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
                end.setDate(end.getDate() + 1);

                para.push({
                    field: "issued_date <",
                    value: kendo.toString(end, "yyyy-MM-dd")
                });
            } else {

            }
            this.set("displayDate", displayDate);
            this.dataSource.query({
                filter: para
            }).then(function() {
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value) {
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e) {
                if (e.type == "read") {
                    var response = e.response,
                        balanceRec = 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [{
                            value: self.company.name,
                            textAlign: "center",
                            colSpan: 4
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                            value: "Cash Receipt by Sources Detail",
                            bold: true,
                            fontSize: 20,
                            textAlign: "center",
                            colSpan: 4
                        }]
                    });
                    if (self.displayDate) {
                        self.exArray.push({
                            cells: [{
                                value: self.displayDate,
                                textAlign: "center",
                                colSpan: 4
                            }]
                        });
                    }
                    self.exArray.push({
                        cells: [{
                            value: "",
                            colSpan: 4
                        }]
                    });
                    self.exArray.push({
                        cells: [{
                                value: "Customer Name",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Reference",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "Amount",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++) {
                        self.exArray.push({
                            cells: [{
                                    value: response.results[i].payment,
                                    bold: true,
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                }
                            ]
                        });
                        for (var j = 0; j < response.results[i].line.length; j++) {
                            balanceRec += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [{
                                        value: response.results[i].line[j].name
                                    },
                                    {
                                        value: response.results[i].line[j].date
                                    },
                                    {
                                        value: response.results[i].line[j].number
                                    },
                                    {
                                        value: kendo.parseFloat(response.results[i].line[j].amount)
                                    }
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 4
                            }]
                        });
                    }
                }
            });
        },
        printGrid: function() {
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
                '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
                '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />' +
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
                '</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }' +
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
                '}' +
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
            setTimeout(function() {
                win.print();
                win.close();
            }, 2000);
        },
        ExportExcel: function() {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Cash Receipt by Sources",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "CashReceiptSources.xlsx"
            });
        }
    });

    banhji.importContact = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "imports/wcontact"),
        onSelected: function(e) {
            $('li.k-file').remove();
            var files = e.files;
            var reader = new FileReader();
            banhji.importContact.dataSource.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    if (sheetName == 'contact') {
                        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                        if (roa.length > 0) {
                            result[sheetName] = roa;
                            for (var i = 0; i < roa.length; i++) {
                                banhji.importContact.dataSource.add(roa[i]);
                            }
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        save: function() {
            var self = this;
            if (banhji.importContact.dataSource.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                banhji.importContact.dataSource.sync();
                banhji.importContact.dataSource.bind("requestEnd", function(e) {
                    if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        banhji.importContact.dataSource.data([]);
                    }
                });
                banhji.importContact.dataSource.bind("error", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(this.lang.lang.error_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    banhji.importContact.dataSource.data([]);
                });
            }
        }
    });
    banhji.importItem = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "imports/meter"),
        onSelected: function(e) {
            $('li.k-file').remove();
            var files = e.files;
            var reader = new FileReader();
            banhji.importItem.dataSource.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    if (sheetName == 'meter') {
                        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                        if (roa.length > 0) {
                            result[sheetName] = roa;
                            for (var i = 0; i < roa.length; i++) {
                                banhji.importItem.dataSource.add(roa[i]);
                            }
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        save: function() {
            var self = this;
            if (banhji.importItem.dataSource.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                banhji.importItem.dataSource.sync();
                banhji.importItem.dataSource.bind("requestEnd", function(e) {
                    // if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        banhji.importItem.dataSource.data([]);
                    // }
                });
                // banhji.importItem.dataSource.bind("error", function(e) {
                //     var notifi = $("#ntf1").data("kendoNotification");
                //     notifi.hide();
                //     notifi.error(self.lang.lang.error_message);
                //     $("#loadImport").css("display", "none");
                //     $('li.k-file').remove();
                //     banhji.importItem.dataSource.data([]);
                // });
            }
        }
    });
    banhji.importProptery = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "imports/property"),
        onSelected: function(e) {
            $('li.k-file').remove();
            var files = e.files;
            var reader = new FileReader();
            banhji.importProptery.dataSource.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    if (sheetName == 'property') {
                        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                        if (roa.length > 0) {
                            result[sheetName] = roa;
                            for (var i = 0; i < roa.length; i++) {
                                banhji.importProptery.dataSource.add(roa[i]);
                            }
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        save: function() {
            var self = this;
            if (banhji.importProptery.dataSource.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                banhji.importProptery.dataSource.sync();
                banhji.importProptery.dataSource.bind("requestEnd", function(e) {
                    if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        self.dataSource.data([]);

                    }
                });
                banhji.importProptery.dataSource.bind("error", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    banhji.importProptery.dataSource.data([]);
                });
            }
        }
    });
    banhji.importView = kendo.observable({
        lang: langVM,
        contact: banhji.importContact,
        item: banhji.importItem,
        property: banhji.importProptery,
        locationDS: dataStore(apiUrl + "imports/location"),
        onLocationSelected: function(e) {
            $('li.k-file').remove();
            var self = this;
            var files = e.files;
            var reader = new FileReader();
            this.locationDS.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    if (sheetName == 'location') {
                        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                        if (roa.length > 0) {
                            result[sheetName] = roa;
                            for (var i = 0; i < roa.length; i++) {
                                self.locationDS.add(roa[i]);
                            }
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        locationSave: function() {
            var self = this;
            if (this.locationDS.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                this.locationDS.sync();
                this.locationDS.bind("requestEnd", function(e) {
                    if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        self.locationDS.data([]);
                    }
                });
                this.locationDS.bind("error", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    self.locationDS.data([]);
                });
            }
        },
        subLocationDS: dataStore(apiUrl + "imports/sublocation"),
        onSubLocationSelected: function(e) {
            $('li.k-file').remove();
            var self = this;
            var files = e.files;
            var reader = new FileReader();
            this.subLocationDS.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    if (sheetName == 'sublocation') {
                        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                        if (roa.length > 0) {
                            result[sheetName] = roa;
                            for (var i = 0; i < roa.length; i++) {
                                self.subLocationDS.add(roa[i]);
                            }
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        subLocationSave: function() {
            var self = this;
            if (this.subLocationDS.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                this.subLocationDS.sync();
                this.subLocationDS.bind("requestEnd", function(e) {
                    if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        self.subLocationDS.data([]);
                    }
                });
                this.subLocationDS.bind("error", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    self.subLocationDS.data([]);
                });
            }
        },
        boxDS: dataStore(apiUrl + "imports/box"),
        onBoxSelected: function(e) {
            $('li.k-file').remove();
            var self = this;
            var files = e.files;
            var reader = new FileReader();
            this.boxDS.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    if (sheetName == 'box') {
                        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                        if (roa.length > 0) {
                            result[sheetName] = roa;
                            for (var i = 0; i < roa.length; i++) {
                                self.boxDS.add(roa[i]);
                            }
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        boxSave: function() {
            var self = this;
            if (this.boxDS.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                this.boxDS.sync();
                this.boxDS.bind("requestEnd", function(e) {
                    if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        self.boxDS.data([]);
                    }
                });
                this.boxDS.bind("error", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    self.boxDS.data([]);
                });
            }
        },
        cancel: function(e) {
            this.contact.dataSource.data([]);
            this.item.dataSource.data([]);
            this.property.dataSource.cancelChanges();
            banhji.router.navigate("/");
        }
    });
    banhji.choeun = kendo.observable({
        lang: langVM,
        contact: banhji.importContact,
        item: banhji.importItem,
        property: banhji.importProptery,
        meterOrderDS: dataStore(apiUrl + "utibills/meter_order_xls"),
        onSelected: function(e) {
            $('li.k-file').remove();
            var self = this;
            var files = e.files;
            var reader = new FileReader();
            this.meterOrderDS.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    if (roa.length > 0) {
                        result[sheetName] = roa;
                        for (var i = 0; i < roa.length; i++) {
                            self.meterOrderDS.add(roa[i]);
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        save: function() {
            var self = this;
            if (this.meterOrderDS.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                this.meterOrderDS.sync();
                this.meterOrderDS.bind("requestEnd", function(e) {
                    if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        self.meterOrderDS.data([]);
                    }
                });
                this.meterOrderDS.bind("error", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    self.meterOrderDS.data([]);
                });
            }
        },
        cancel: function(e) {
            this.contact.dataSource.data([]);
            this.item.dataSource.data([]);
            this.property.dataSource.cancelChanges();
            banhji.router.navigate("/");
        }
    });
    //Backup Block//
    banhji.Backup = kendo.observable({
        lang: langVM,
        institute_id: banhji.institute.id,
        user_id: banhji.userData.id,
        pageLoad: function() {},
        offTxnDS: dataStore(apiUrl + "transactions"),
        txnArray        : [],
        offTxnGet       : function(){
            var self = this;
            this.txnArray = [];
            this.offTxnDS.query({
                filter: [
                    {field: "sync", value: 1},
                    {field: "status <>", value: 1}
                ],
                page: 1
            }).then(function(e){
                var view = self.offTxnDS.view();
                if(view.length > 0){
                    self.txnArray.push({
                        cells: [
                            { value: "number", background: "#bbbbbb" },
                            { value: "contact_id", background: "#bbbbbb" },
                            { value: "location_id", background: "#bbbbbb" },
                            { value: "pole_id", background: "#bbbbbb" },
                            { value: "box_id", background: "#bbbbbb" },
                            { value: "meter_id", background: "#bbbbbb" },
                            { value: "rate", background: "#bbbbbb" },
                            { value: "locale", background: "#bbbbbb" },
                            { value: "amount", background: "#bbbbbb" },
                            { value: "issued_date", background: "#bbbbbb" },
                            { value: "bill_date", background: "#bbbbbb" },
                            { value: "due_date", background: "#bbbbbb" },
                            { value: "month_of", background: "#bbbbbb" }
                        ]
                    });
                    $.each(view, function(i,v){
                        var AmountAfterPaid = 0;
                        AmountAfterPaid = v.amount - v.amount_paid;
                        self.txnArray.push({
                            cells: [
                                { value: v.number },
                                { value: v.contact_id },
                                { value: v.location_id },
                                { value: v.pole_id },
                                { value: v.box_id },
                                { value: v.meter_id },
                                { value: v.rate },
                                { value: v.locale },
                                { value: AmountAfterPaid },
                                { value: v.issued_date },
                                { value: v.bill_date },
                                { value: v.due_date },
                                { value: v.month_of }
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
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true }
                            ],
                            title: "transaction_offline",
                            rows: self.txnArray
                        }]
                    });
                    //save the file as Excel file with extension xlsx
                    kendo.saveAs({
                        dataURI: workbook.toDataURL(),
                        fileName: "transaction_offline.xlsx"
                    });
                }else{
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.no_data);
                }
            });
        },
        offContactDS: dataStore(apiUrl + "utibills/ocontacts"),
        contactArray        : [],
        offContactGet       : function(){
            var self = this;
            this.contactArray = [];
            this.offContactDS.query({
                filter: [
                    {field: "sync <>", value: 0 }
                ],
                page: 1
            }).then(function(e){
                var view = self.offContactDS.view();
                if(view.length > 0){
                    self.contactArray.push({
                        cells: [
                            { value: "contact_type_id", background: "#bbbbbb" },
                            { value: "abbr", background: "#bbbbbb" },
                            { value: "number", background: "#bbbbbb" },
                            { value: "name", background: "#bbbbbb" },
                            { value: "gender", background: "#bbbbbb" },
                            { value: "phone", background: "#bbbbbb" },
                            { value: "address", background: "#bbbbbb" },
                            { value: "account_id", background: "#bbbbbb" },
                            { value: "status", background: "#bbbbbb" }
                        ]
                    });
                    $.each(view, function(i,v){
                        self.contactArray.push({
                            cells: [
                                { value: v.contact_type_id },
                                { value: v.abbr },
                                { value: v.number },
                                { value: v.name },
                                { value: v.gender },
                                { value: v.phone },
                                { value: v.address },
                                { value: v.account_id },
                                { value: v.status }
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
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true }
                            ],
                            title: "contact_offline",
                            rows: self.contactArray
                        }]
                    });
                    //save the file as Excel file with extension xlsx
                    kendo.saveAs({
                        dataURI: workbook.toDataURL(),
                        fileName: "contact_offline.xlsx"
                    });
                }else{
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.no_data);
                }
            });
        },
        offPropertyDS: dataStore(apiUrl + "utibills/oproperty"),
        propertyArray        : [],
        offPropertyGet       : function(){
            var self = this;
            this.propertyArray = [];
            this.offPropertyDS.query({
                filter: [
                    {field: "sync <>", value: 0}
                ],
                page: 1
            }).then(function(e){
                var view = self.offPropertyDS.view();
                if(view.length > 0){
                    self.propertyArray.push({
                        cells: [
                            { value: "contact_name", background: "#bbbbbb" },
                            { value: "name", background: "#bbbbbb" },
                            { value: "abbr", background: "#bbbbbb" },
                            { value: "code", background: "#bbbbbb" },
                            { value: "status", background: "#bbbbbb" }
                        ]
                    });
                    $.each(view, function(i,v){
                        self.propertyArray.push({
                            cells: [
                                { value: v.contact_name },
                                { value: v.name },
                                { value: v.abbr },
                                { value: v.code },
                                { value: v.status }
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
                                { autoWidth: true }
                            ],
                            title: "property_offline",
                            rows: self.propertyArray
                        }]
                    });
                    //save the file as Excel file with extension xlsx
                    kendo.saveAs({
                        dataURI: workbook.toDataURL(),
                        fileName: "property_offline.xlsx"
                    });
                }else{
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.no_data);
                }
            });
        },
        offMeterDS: dataStore(apiUrl + "utibills/ometer"),
        meterArray        : [],
        offMeterGet       : function(){
            var self = this;
            this.meterArray = [];
            this.offMeterDS.query({
                filter: [
                    {field: "sync <>", value: 0}
                ],
                page: 1
            }).then(function(e){
                var view = self.offMeterDS.view();
                if(view.length > 0){
                    self.meterArray.push({
                        cells: [
                            { value: "meter_number", background: "#bbbbbb" },
                            { value: "property_id", background: "#bbbbbb" },
                            { value: "contact_id", background: "#bbbbbb" },
                            { value: "type", background: "#bbbbbb" },
                            { value: "worder", background: "#bbbbbb" },
                            { value: "status", background: "#bbbbbb" },
                            { value: "number_digit", background: "#bbbbbb" },
                            { value: "plan_id", background: "#bbbbbb" },
                            { value: "starting_no", background: "#bbbbbb" },
                            { value: "location_id", background: "#bbbbbb" },
                            { value: "pole_id", background: "#bbbbbb" },
                            { value: "box_id", background: "#bbbbbb" },
                            { value: "ampere_id", background: "#bbbbbb" },
                            { value: "phase_id", background: "#bbbbbb" },
                            { value: "voltage_id", background: "#bbbbbb" },
                            { value: "branch_id", background: "#bbbbbb" },
                            { value: "multiplier", background: "#bbbbbb" },
                            { value: "date_used", background: "#bbbbbb" },
                            { value: "reactive_id", background: "#bbbbbb" },
                            { value: "reactive_status", background: "#bbbbbb" },
                            { value: "status_sync", background: "#bbbbbb" }
                        ]
                    });
                    $.each(view, function(i,v){
                        self.meterArray.push({
                            cells: [
                                { value: v.meter_number },
                                { value: v.property_id },
                                { value: v.contact_id },
                                { value: v.type },
                                { value: v.worder },
                                { value: v.status },
                                { value: v.number_digit },
                                { value: v.plan_id },
                                { value: v.starting_no },
                                { value: v.location_id },
                                { value: v.pole_id },
                                { value: v.box_id },
                                { value: v.ampere_id },
                                { value: v.phase_id },
                                { value: v.voltage_id },
                                { value: v.branch_id },
                                { value: v.multiplier },
                                { value: v.date_used },
                                { value: v.reactive_id },
                                { value: v.reactive_status },
                                { value: v.status_sync }
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
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true }
                            ],
                            title: "meter_offline",
                            rows: self.meterArray
                        }]
                    });
                    //save the file as Excel file with extension xlsx
                    kendo.saveAs({
                        dataURI: workbook.toDataURL(),
                        fileName: "meter_offline.xlsx"
                    });
                }else{
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.no_data);
                }
            });
        },
        offRecordDS: dataStore(apiUrl + "utibills/orecord"),
        recordArray        : [],
        offRecordGet       : function(){
            var self = this;
            this.recordArray = [];
            this.offRecordDS.query({
                filter: [
                    {field: "sync <>", value: 0}
                ],
                page: 1
            }).then(function(e){
                var view = self.offRecordDS.view();
                if(view.length > 0){
                    self.recordArray.push({
                        cells: [
                            { value: "meter_number", background: "#bbbbbb" },
                            { value: "previous", background: "#bbbbbb" },
                            { value: "current", background: "#bbbbbb" },
                            { value: "usage", background: "#bbbbbb" },
                            { value: "month_of", background: "#bbbbbb" },
                            { value: "from_date", background: "#bbbbbb" },
                            { value: "to_date", background: "#bbbbbb" },
                            { value: "invoiced", background: "#bbbbbb" },
                            { value: "status", background: "#bbbbbb" }
                        ]
                    });
                    $.each(view, function(i,v){
                        self.recordArray.push({
                            cells: [
                                { value: v.meter_number },
                                { value: v.previous },
                                { value: v.current },
                                { value: v.usage },
                                { value: v.month_of },
                                { value: v.from_date },
                                { value: v.to_date },
                                { value: v.invoiced },
                                { value: v.status }
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
                                { autoWidth: true },
                                { autoWidth: true },
                                { autoWidth: true }
                            ],
                            title: "record_offline",
                            rows: self.recordArray
                        }]
                    });
                    //save the file as Excel file with extension xlsx
                    kendo.saveAs({
                        dataURI: workbook.toDataURL(),
                        fileName: "record_offline.xlsx"
                    });
                }else{
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.no_data);
                }
            });
        },
        offInstallmentDS: dataStore(apiUrl + "utibills/oinstallment"),
        intstallmentArray        : [],
        offInstallmentGet       : function(){
            var self = this;
            this.intstallmentArray = [];
            this.offInstallmentDS.query({
                filter: [
                    {field: "sync <>", value: 0}
                ],
                page: 1
            }).then(function(e){
                var view = self.offInstallmentDS.view();
                if(view.length > 0){
                    self.intstallmentArray.push({
                        cells: [
                            { value: "meter_number", background: "#bbbbbb" },
                            { value: "start_month", background: "#bbbbbb" },
                            { value: "percentage", background: "#bbbbbb" },
                            { value: "amount", background: "#bbbbbb" },
                            { value: "period", background: "#bbbbbb" },
                            { value: "payment_number", background: "#bbbbbb" }
                        ]
                    });
                    $.each(view, function(i,v){
                        self.intstallmentArray.push({
                            cells: [
                                { value: v.meter_number },
                                { value: v.start_month },
                                { value: v.percentage },
                                { value: v.amount },
                                { value: v.period },
                                { value: v.payment_number }
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
                                { autoWidth: true }
                            ],
                            title: "installment_offline",
                            rows: self.intstallmentArray
                        }]
                    });
                    //save the file as Excel file with extension xlsx
                    kendo.saveAs({
                        dataURI: workbook.toDataURL(),
                        fileName: "installment_offline.xlsx"
                    });
                }else{
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.no_data);
                }
            });
        },
        offInsItemDS        : dataStore(apiUrl + "utibills/oinsitem"),
        insItemArray        : [],
        offInsItemGet       : function(){
            var self = this;
            this.insItemArray = [];
            this.offInsItemDS.query({
                filter: [
                    {field: "sync <>", value: 0}
                ],
                page: 1
            }).then(function(e){
                var view = self.offInsItemDS.view();
                if(view.length > 0){
                    self.insItemArray.push({
                        cells: [
                            { value: "meter_number", background: "#bbbbbb" },
                            { value: "date", background: "#bbbbbb" },
                            { value: "amount", background: "#bbbbbb" },
                            { value: "invoiced", background: "#bbbbbb" }
                        ]
                    });
                    $.each(view, function(i,v){
                        self.insItemArray.push({
                            cells: [
                                { value: v.meter_number },
                                { value: v.date },
                                { value: v.amount },
                                { value: v.invoiced }
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
                                { autoWidth: true }
                            ],
                            title: "installment_item_offline",
                            rows: self.insItemArray
                        }]
                    });
                    //save the file as Excel file with extension xlsx
                    kendo.saveAs({
                        dataURI: workbook.toDataURL(),
                        fileName: "installment_item_offline.xlsx"
                    });
                }else{
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.no_data);
                }
            });
        },
        offClearDS        : dataStore(apiUrl + "utibills/offlineclear"),
        offClear            : function(){
            var self = this;
            this.offClearDS.data([]);
            this.offClearDS.add({
                method : "clear"
            });
            this.offClearDS.sync();
            this.offClearDS.bind("requestEnd", function(e){
                var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.success(self.lang.lang.success_message);
            });
            this.offClearDS.bind("error", function(e){
                var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_message);
            });
        }
    });
    banhji.Offline = kendo.observable({
        lang: langVM,
        pageLoad: function() {},
        licenseDS           : dataStore(apiUrl + "branches"),
        locationDS          : dataStore(apiUrl + "locations"),
        subLocationDS       : dataStore(apiUrl + "locations"),
        boxDS               : dataStore(apiUrl + "locations"),
        lSelect             : false,
        loSelect            : false,
        timesyncID          : null,
        haveLicense         : false,
        haveLocation        : false,
        haveSubLocation     : false,
        subLocationSelect   : "",
        boxSelect           : "",
        licenseChange       : function(e) {
            var self = this;
            this.locationDS.data([]);
            this.set("locationSelect", "");
            this.set("haveLicense", false)
            this.subLocationDS.data([]);
            this.locationDS.data([]);
            this.set("boxSelect", "");
            this.set("haveLocation", false);
            this.set("haveSubLocation", false);
            this.locationDS.filter([
                {field: "branch_id",value: this.get("licenseSelect")},
                {field: "main_bloc",value: 0},
                {field: "main_pole",value: 0}
            ]);
            this.set("haveLicense", true);
        },
        onLocationChange    : function(e) {
            var self = this;
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveSubLocation", false);
            if(this.get("locationSelect")){
                this.subLocationDS.query({
                    filter: [
                        {field: "main_bloc", value: this.get("locationSelect")},
                        {field: "main_pole", value: 0}
                        ],
                    page: 1
                })
                .then(function(e){
                    if(self.subLocationDS.data().length > 0){
                        self.set("haveLocation", true);
                    }else{
                        self.set("haveLocation", false);
                        self.set("subLocationSelect", "");
                        self.subLocationDS.data([]);
                    }
                });
            }
        },
        onSubLocationChange : function(e) {
            var self = this;
            if(this.get("subLocationSelect")){
                this.boxDS.query({
                    filter: [
                        {field: "main_pole", value: this.get("subLocationSelect")}
                    ]
                })
                .then(function(e){
                    if(self.boxDS.data().length > 0){
                        self.set("haveSubLocation", true);
                    }else{
                        self.set("haveSubLocation", false);
                        self.set("boxSelect", "");
                        self.boxDS.data([]);
                    }
                });
            }
        },
        offLineDB           : dataStore(apiUrl + "utibills/offlinework"),
        rows                : [],
        TabletAbbr          : "",
        getOfflineDB        : function(){
            if(this.get("licenseSelect") && this.get("locationSelect") && this.get("monthOfSR") && this.get("toDateSR") && this.get("IssueDate") && this.get("BillingDate") && this.get("DueDate") && this.get("readerSelect") && this.get("tabletSelect")){
                $("#loadImport").css("display", "block");
                var self = this,
                    para = [],
                    searchID = 0;
                if(this.get("boxSelect")){
                    para.push({field: "box_id", value: this.get("boxSelect")});
                }else if(this.get("subLocationSelect")){
                    para.push({field: "pole_id", value: this.get("subLocationSelect")});
                }else{
                    para.push({field: "location_id", value: this.get("locationSelect")});
                }
                this.offLineDB.query({
                    filter: para
                }).then(function(e){
                    var view = self.offLineDB.view();
                    if (view.length > 0) {
                        self.rows = [];
                        self.set("haveData", true);
                        self.rows.push({
                            cells: [
                                { value: "branch_id", background: "#496cad", color: "#ffffff" },
                                { value: "meter_id", background: "#496cad", color: "#ffffff" },
                                { value: "meter_number", background: "#496cad", color: "#ffffff" },
                                { value: "multiplier", background: "#496cad", color: "#ffffff" },
                                { value: "previous", background: "#496cad", color: "#ffffff" },
                                { value: "current", background: "#496cad", color: "#ffffff" },
                                { value: "from_date", background: "#496cad", color: "#ffffff" },
                                { value: "contact_id", background: "#496cad", color: "#ffffff" },
                                { value: "contact_name", background: "#496cad", color: "#ffffff" },
                                { value: "contact_code", background: "#496cad", color: "#ffffff" },
                                { value: "location_id", background: "#496cad", color: "#ffffff" },
                                { value: "location_name", background: "#496cad", color: "#ffffff" },
                                { value: "pole_id", background: "#496cad", color: "#ffffff" },
                                { value: "pole_name", background: "#496cad", color: "#ffffff" },
                                { value: "box_id", background: "#496cad", color: "#ffffff" },
                                { value: "box_name", background: "#496cad", color: "#ffffff" },
                                { value: "balance", background: "#496cad", color: "#ffffff" },
                                { value: "plan_id", background: "#496cad", color: "#ffffff" },
                                { value: "number_digit", background: "#496cad", color: "#ffffff" },
                                { value: "month_of", background: "#496cad", color: "#ffffff" },
                                { value: "to_date", background: "#496cad", color: "#ffffff" },
                                { value: "issue_date", background: "#496cad", color: "#ffffff" },
                                { value: "bill_date", background: "#496cad", color: "#ffffff" },
                                { value: "due_date", background: "#496cad", color: "#ffffff" },
                                { value: "reader_id", background: "#496cad", color: "#ffffff" },
                                { value: "tablet_id", background: "#496cad", color: "#ffffff" },
                                { value: "tablet_abbr", background: "#496cad", color: "#ffffff" },
                                { value: "installment", background: "#496cad", color: "#ffffff" },
                                { value: "institute_id", background: "#496cad", color: "#ffffff" }
                            ]
                        });
                        var MonthOf = kendo.toString(new Date(self.get("monthOfSR")), "yyyy-M-dd");
                        var ToDate = kendo.toString(new Date(self.get("toDateSR")), "yyyy-M-dd");
                        var IssueDate = kendo.toString(new Date(self.get("IssueDate")), "yyyy-M-dd");
                        var BillingDate = kendo.toString(new Date(self.get("BillingDate")), "yyyy-M-dd");
                        var DueDate = kendo.toString(new Date(self.get("DueDate")), "yyyy-M-dd");
                        $.each(view, function(i,v){
                            self.rows.push({
                                cells: [
                                    { value: v.branch_id },
                                    { value: v.meter_id },
                                    { value: v.meter_number },
                                    { value: v.multiplier },
                                    { value: v.previous },
                                    { value: v.current },
                                    { value: v.from_date },
                                    { value: v.contact_id },
                                    { value: v.contact_name },
                                    { value: v.contact_code },
                                    { value: v.location_id },
                                    { value: v.location_name },
                                    { value: v.pole_id },
                                    { value: v.pole_name },
                                    { value: v.box_id },
                                    { value: v.box_name },
                                    { value: v.balance },
                                    { value: v.plan_id },
                                    { value: v.number_digit },
                                    { value: MonthOf },
                                    { value: ToDate },
                                    { value: IssueDate },
                                    { value: BillingDate },
                                    { value: DueDate },
                                    { value: self.get("readerSelect") },
                                    { value: self.get("tabletSelect") },
                                    { value: self.get("TabletAbbr") },
                                    { value: v.installment},
                                    { value: banhji.institute.id}
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
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true },
                                    { autoWidth: true }
                                ],
                                title: "Offline_Get",
                                rows: self.rows
                            }]
                        });
                        //save the file as Excel file with extension xlsx
                        kendo.saveAs({
                            dataURI: workbook.toDataURL(),
                            fileName: "offline-"+"<?php echo date('d-M-Y H:s'); ?>" + ".xlsx"
                        });
                        $("#loadImport").css("display", "none");
                    }else{
                        var notifi = $("#ntf1").data("kendoNotification");
                            notifi.hide();
                            notifi.error(self.lang.lang.no_data);
                        $("#loadImport").css("display", "none");
                    }
                });
            }else{
                var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(this.lang.lang.field_required_message);
            }
        },
        readerDS            : dataStore(apiUrl + "utibills/reader"),
        tabletDS            : dataStore(apiUrl + "utibills/tablet"),
        tabletChange        : function(e){
            var data = e.sender.selectedIndex;
            this.set("TabletAbbr", this.tabletDS.data()[data - 1].abbr);
        },
        uploadOfflineDS     : dataStore(apiUrl + "utibills/uploadoff"),
        txnSelected: function(e) {
            $('li.k-file').remove();
            var self = this;
            var files = e.files;
            var reader = new FileReader();
            this.uploadOfflineDS.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    if (sheetName == 'transaction_offline') {
                        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                        if (roa.length > 0) {
                            result[sheetName] = roa;
                            for (var i = 0; i < roa.length; i++) {
                                self.uploadOfflineDS.add(roa[i]);
                            }
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        saveTXNoffline      : function(){
            var self = this;
            if (this.uploadOfflineDS.data().length === 0) {
            } else {
                $("#loadImport").css("display", "block");
                this.uploadOfflineDS.sync();
                this.uploadOfflineDS.bind("requestEnd", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.success(self.lang.lang.success_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    self.uploadOfflineDS.data([]);
                });
            }
        }
    });
    //Head Meter
    banhji.HeadMeter = kendo.observable({
        lang: langVM,
        meterDS             : dataStore(apiUrl + "utibills/head_meter"),
        cancel              : function(){
            banhji.router.navigate("/");
        },
        haveMeter           : false,
        newRound            : 0,
        roundDS             : [
            {id: 0, name: "No"},
            {id: 1, name: "Yes"}
        ],
        meterReadingDS      : dataStore(apiUrl + "utibills/head_meter_reading"),
        meterID             : "",
        selectedRow         : function(e) {
            var data = e.data,
                self = this;
            this.set("meterID", data.id);
            this.set("numberSR", data.number);
            this.set('haveMeter', true);
            this.meterReadingDS.query({
                filter: [{
                    field: "head_meter_id",
                    value: data.id
                }],
                page: 1,
                pageSize: 100
            })
            .then(function(e) {
                self.set("previousSR", self.meterReadingDS.data()[0].current);
            });
        },
        addReading          : function() {
            var self = this,
                round = this.get("newRound"),
                month_of = this.get("monthOfSR"),
                current = this.get("currentSR"),
                previous = this.get("previousSR"),
                to_date = this.get("toDateSR");
            if(round == 0){
                if(current < previous){
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_input);
                }else{
                    this.saveSingleReading();
                }
            }else{
                if(month_of != "" && current != "" && to_date != "" ){
                    this.saveSingleReading();
                }else{
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_input);
                }
            }
        },
        singleReadingDS     : dataStore(apiUrl + "utibills/head_meter_reading"),
        saveSingleReading   : function() {
            var self = this,
                round = this.get("newRound"),
                month_of = this.get("monthOfSR"),
                current = this.get("currentSR"),
                previous = this.get("previousSR"),
                to_date = this.get("toDateSR");
            this.singleReadingDS.data([]);
            this.singleReadingDS.add({
                head_meter_id       : this.get("meterID"),
                month_of            : month_of,
                previous            : previous,
                current             : current,
                round               : round,
                to_date             : to_date,
                read_by             : banhji.userData.id,
                input_by            : banhji.userData.id,
            });
            this.singleReadingDS.sync();
            this.singleReadingDS.bind("requestEnd", function(e){
                self.meterReadingDS.filter({ field: "head_meter_id", value: self.get("meterID") });
                self.set("currentSR", "");
                self.set("newRound", 0);
                self.set("previousSR", current);
                var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.success(self.lang.lang.success_message);
            });
        },
        pageLoad            : function() {
            this.meterDS.fetch();
        },
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        subLocationDS: dataStore(apiUrl + "locations"),
        boxDS: dataStore(apiUrl + "locations"),
        haveLicense : false,
        haveLocation : false,
        haveSubLocation : false,
        licenseChange: function(e) {
            var self = this;
            this.blocDS.data([]);
            this.set("locationSelect", "");
            this.set("haveLicense", false)
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveLocation", false);
            this.set("haveSubLocation", false);
            this.blocDS.filter([{
                    field: "branch_id",
                    value: this.get("licenseSelect")
                },
                {
                    field: "main_bloc",
                    value: 0
                },
                {
                    field: "main_pole",
                    value: 0
                }
            ]);
            this.set("haveLicense", true);
            this.set("liSelectName", e.sender.span[0].innerText);
        },
        loSelectName: "",
        onLocationChange: function(e) {
            var self = this;
            this.subLocationDS.data([]);
            this.boxDS.data([]);
            this.set("boxSelect", "");
            this.set("haveSubLocation", false);
            if (this.get("blocSelect")) {
                this.subLocationDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: 0
                            }
                        ],
                        page: 1
                    })
                    .then(function(e) {
                        if (self.subLocationDS.data().length > 0) {
                            self.set("haveLocation", true);
                        } else {
                            self.set("haveLocation", false);
                            self.set("subLocationSelect", "");
                            self.subLocationDS.data([]);
                        }
                    });
            }
            this.set("loSelectName", e.sender.span[0].innerText);
        },
        onSubLocationChange: function(e) {
            var self = this;
            if (this.get("subLocationSelect")) {
                this.boxDS.query({
                        filter: [{
                                field: "branch_id",
                                value: this.get("licenseSelect")
                            },
                            {
                                field: "main_bloc",
                                value: this.get("blocSelect")
                            },
                            {
                                field: "main_pole",
                                value: this.get("subLocationSelect")
                            }
                        ]
                    })
                    .then(function(e) {
                        if (self.boxDS.data().length > 0) {
                            self.set("haveSubLocation", true);
                        } else {
                            self.set("haveSubLocation", false);
                            self.set("boxSelect", "");
                            self.boxDS.data([]);
                        }
                    });
            }
        },
        getReadingDS : dataStore(apiUrl + "utibills/head_meter_book"),
        search: function() {
            this.getReadingDS.data([]);
            this.set("haveData", false);
            var monthOfSearch = this.get("monthOfSelect"),
                license_id = this.get("licenseSelect"),
                bloc_id = this.get("blocSelect");
            var para = [];
            this.set("selectMeter", true);
            if (this.get("boxSelect")) {
                para.push({
                    field: "box_id",
                    value: this.get("boxSelect")
                });
            } else if (this.get("subLocationSelect")) {
                para.push({
                    field: "pole_id",
                    value: this.get("subLocationSelect")
                });
            } else if (this.get("locationSelect")){
                para.push({
                    field: "location_id",
                    value: bloc_id
                });
            } else {
                para.push({
                    field: "branch_id",
                    value: this.get("licenseSelect")
                });
            }
            var self = this;
            this.getReadingDS.query({
                filter: para
            }).then(function() {
                var FromDate, ToDate, MonthOf;
                self.rows = [];
                if (self.getReadingDS.data().length > 0) {
                    self.set("haveData", true);
                    self.rows.push({
                        cells: [
                            {
                                value: "meter_number",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "from_date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "to_date",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "month_of",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "previous",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "current",
                                background: "#496cad",
                                color: "#ffffff"
                            },
                            {
                                value: "round",
                                background: "#496cad",
                                color: "#ffffff"
                            }
                        ]
                    });
                    for (var i = 0; i < self.getReadingDS.data().length; i++) {
                        self.rows.push({
                            cells: [
                                {
                                    value: self.uploadDS.data()[i].meter_number
                                },
                                {
                                    value: self.uploadDS.data()[i].from_date
                                },
                                {
                                    value: self.uploadDS.data()[i].to_date
                                },
                                {
                                    value: self.uploadDS.data()[i].month_of
                                },
                                {
                                    value: self.uploadDS.data()[i].previous
                                },
                                {
                                    value: ""
                                },
                                {
                                    value: ""
                                }
                            ]
                        });
                    }
                }
            });
        },
        exportEXCEL: function(e) {
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [{
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        }
                    ],
                    title: "Reading",
                    rows: this.rows
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "[" + this.get("liSelectName") + "]-[" + this.get("loSelectName") + "]-[" + "<?php echo date('Ym'); ?>" + "]-[" + "<?php echo date('dmY'); ?>" + "].xlsx"
            });
        },
    });
    banhji.AddHeadMeter = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibills/head_meter"),
        userActivatDS: dataStore(apiUrl + "activate_water"),
        brandDS: banhji.source.brandDS,
        licenseDS: dataStore(apiUrl + "branches"),
        locationDS: dataStore(apiUrl + "locations"),
        poleDS: dataStore(apiUrl + "locations"),
        boxDS: dataStore(apiUrl + "locations"),
        attachmentDS: dataStore(apiUrl + "attachments"),
        itemDS: null,
        obj: null,
        objReactive: null,
        isEdit: false,
        disableOnly: false,
        contact: null,
        electricMeter: false,
        haveEdit: false,
        propertyID: 0,
        selectType: [{
                id: 1,
                name: "Active"
            },
            {
                id: 0,
                name: "Inactive"
            },
            {
                id: 2,
                name: "Void"
            }
        ],
        boxSelect : "",
        selectLocation: false,
        selectSLocation: false,
        meterOrder: 0,
        pageLoad: function(id) {
            this.set("haveEdit", false);
            this.set("licenseSelect", "");
            this.set("locationSelect", "");
            this.set("subLocationSelect", "");
            this.set("boxSelect", "");
            this.set("haveLocation", false);
            this.set("haveSubLocation", false);
            this.set("ampereSelect", "");
            this.set("phaseSelect", "");
            this.set("voltageSelect", "");
            if (id) {
                this.loadObj(id);
                this.set("otherINFO", true);
                this.set("haveEdit", true);
            } else {
                this.set("haveLocation", false);
                this.set("haveSubLocation", false);
                this.addEmpty();
            }
            this.setWords();
        },
        licenseData: [],
        otherINFO: false,
        licenseID: "",
        licenseChange: function(e) {
            this.locationDS.filter([{
                    field: "branch_id",
                    value: this.get("obj").branch_id
                },
                {
                    field: "main_bloc",
                    value: 0
                },
                {
                    field: "main_pole",
                    value: 0
                }
            ]);
            var ind =e.sender._oldIndex;
            this.get("obj").set("type", this.licenseDS.data()[ind - 1].type);
        },
        setWords: function() {
            this.selectType[0].set("name", this.lang.lang.active);
            this.selectType[1].set("name", this.lang.lang.inactive);
            this.selectType[2].set("name", this.lang.lang.void);
        },
        oldPlan: "",
        allowD : true,
        loadObj: function(id) {
            var self = this;
            this.dataSource.data([]);
            this.dataSource.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                take: 1,
                sort: {field: "id", dir: "desc"}
            }).then(function(e) {
                var view = self.dataSource.view();
                if (view[0].image_url) {
                    self.set("obj", view[0]);
                } else {
                    view[0].set("image_url", "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg");
                }
                //Set all OBJ
                self.set("obj", view[0]);
                self.set("licenseID", view[0].branch_id);
                self.set("licenseSelect", view[0].branch_id);
                self.set("locationSelect", view[0].location_id);
                if (view[0].pole_id != 0) {
                    self.set("haveLocation", true);
                    self.set("subLocationSelect", view[0].pole_id);
                }
                if (view[0].box_id != 0) {
                    self.set("haveSubLocation", true);
                    self.set("boxSelect", view[0].box_id);
                }
                self.set("oldPlan", view[0].plan_id);
                self.set("meterOrder", view[0].order);
                self.loadMap();
                self.set("propertyID", view[0].property_id);
                self.set("allowD", false);
                if(view.length == 0){
                    banhji.router.navigate("/head_meter");
                }
            });
        },
        editRe: function(id) {
            var self = this;
            this.reactiveDS.query({
                filter: {
                    field: "id",
                    value: id
                },
                take: 1
            }).then(function(e) {
                var view = self.reactiveDS.view();
                self.set("objReactive", view[0]);

            });
        },
        loadMap: function() {
            var obj = this.get("obj");
            lat = kendo.parseFloat(obj.latitute),
                lng = kendo.parseFloat(obj.longtitute);

            if (lat && lng) {
                var myLatLng = {
                    lat: lat,
                    lng: lng
                };
                var mapOptions = {
                    zoom: 17,
                    center: myLatLng,
                    mapTypeControl: false,
                    zoomControl: false,
                    scaleControl: false,
                    streetViewControl: false
                };
                var map = new google.maps.Map(document.getElementById('map'), mapOptions);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map
                });
            }
        },
        visibleReMeter: false,
        chkRe: false,
        checkRe: function(e) {
            if (this.chkRe == true) {
                this.set("visibleReMeter", true);
                this.addEmptyRe(this.propertyID);
                this.meterNumberChange();
            } else {
                this.set("visibleReMeter", false);
            }
        },
        addEmpty: function() {
            var self = this;
            this.dataSource.data([]);
            this.set("obj", null);
            this.dataSource.insert(0, {
                number: "",
                status: 1,
                location_id: 0,
                pole_id: 0,
                box_id: 0,
                branch_id: 0,
                latitute: null,
                longtitute: null,
                date_used: "<?php echo date('Y-m-d'); ?>",
                type: "w",
                multiplier: 1,
                starting_no: 0,
                attachment_id: 0,
                number_digit: 4,
                order: 0,
                image_url: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg"
            });
            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            this.set("meterOrder", 0);
            this.set("allowD", true);
        },
        existMeter      : dataStore(apiUrl + "utibills/head_meter"),
        meterNumberChange: function(e) {
            var self = this;
            this.existMeter.query({
                filter: {field: "number", value: this.get("obj").number}
            }).then(function(e){
                var v = self.existMeter.view();
                if(v.length > 0){
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.error(self.lang.lang.error_message);
                    self.get("obj").set("number", "");
                }
            });
        },
        haveLocation: false,
        haveSubLocation: false,
        onLocationChange: function() {
            var self = this;
            this.poleDS.data([]);
            if (this.get("locationSelect")) {
                this.poleDS.query({
                    filter: [
                        {
                            field: "main_bloc",
                            value: this.get("locationSelect")
                        },
                        {
                            field: "main_pole",
                            value: 0
                        }
                    ],
                    page: 1
                }).then(function(e) {
                    if (self.poleDS.data().length > 0) {
                        self.set("haveLocation", true);
                    } else {
                        self.set("haveLocation", false);
                        self.set("subLocationSelect", "");
                        self.boxDS.data([]);
                    }
                });
                this.set("selectLocation", true);
            }
        },
        onSubLocationChange: function() {
            var self = this;
            if (this.get("subLocationSelect")) {
                this.boxDS.data([]);
                this.boxDS.query({
                    filter: [
                        {
                            field: "main_pole",
                            value: this.get("subLocationSelect")
                        }
                    ],
                    page: 1
                }).then(function(e) {
                    if (self.boxDS.data().length > 0) {
                        self.set("haveSubLocation", true);
                    } else {
                        self.set("haveSubLocation", false);
                    }
                });
            }
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
                var key = 'METER_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) + '_' + files.name;
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
            var obj = this.get("obj");
            if (obj.number && this.get("locationSelect") && obj.date_used && obj.number_digit) {
                obj.location_id = this.get("locationSelect");
                obj.pole_id = this.get("subLocationSelect");
                obj.box_id = this.get("boxSelect");
                obj.order = this.get("meterOrder");
                if(banhji.userData.id){
                    obj.read_by = banhji.userData.id;
                    obj.input_by = banhji.userData.id;
                }else{
                    obj.read_by = 0;
                    obj.input_by = 0;
                }
                if (this.attachmentDS.hasChanges() == true) {
                    this.uploadFile();
                } else {
                    this.saveDataSource();
                }
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(self.lang.lang.field_required_message);
            }
        },
        readingDS: dataStore(apiUrl + "readings"),
        addReading: function(meterNum) {
            var self = this,
                obj = this.get("obj");
            this.readingDS.data([]);
            var monthOf = obj.date_used;
            monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
            var monthL = new Date(obj.date_used);
            var lastDayOfMonth = new Date(monthL.getFullYear(), monthL.getMonth() + 1, 0);
            lastDayOfMonth = lastDayOfMonth.getDate();
            monthL.setDate(lastDayOfMonth);
            this.readingDS.insert(0, {
                month_of: monthOf,
                meter_number: meterNum,
                previous: 0,
                to_date: monthL,
                current: obj.starting_no,
                invoiced: 1,
                condition: "new",
                consumption: 0
            });
            this.readingDS.sync();
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
                        banhji.router.navigate("/head_meter");
                        banhji.source.loadMeters();
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
            this.dataSource.data([]);
            banhji.router.navigate("/head_meter");
            this.set("selectLocation", true);
            this.set("selectSLocation", true);
        }
    });
    /*************************
     * Water Section     * 
     **************************/
    banhji.wDashBoard = kendo.observable({
        lang: langVM,
        totalSale: 0,
        totalUsage: 0,
        totalUser: 0,
        totalDeposit: 0,
        avgUsage: 0,
        dataSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: baseUrl + 'api/waterdash/license',
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
            change: function(e) {
                var vm = banhji.wDashboard;
                var sale = 0,
                    usage = 0,
                    user = 0,
                    deposit = 0;
                $.each(this.data(), function(index, value) {
                    sale += value.sale;
                    usage += value.usage;
                    user += value.activeCustomer;
                    deposit += value.deposit;
                });

                banhji.wDashBoard.set('totalUser', kendo.toString(user, "n0", banhji.locale));
                banhji.wDashBoard.set('totalDeposit', kendo.toString(deposit, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
                banhji.wDashBoard.set('avgUsage', usage / user);
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        }),
        graphDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'waterdash/graph',
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            filter: options.filter
                        };
                    }
                }
            },
            schema: {
                data: 'results',
                total: 'count'
            },
            // group: {
            //  field: 'month',
            //  aggregates: [
            //    {field: 'amount', aggregate: 'sum'}
            //  ]
            // },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 1000
        }),   
        graphWater: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'waterdash/graph_water',
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            page: options.page,
                            filter: options.filter
                        };
                    }
                }
            },
            schema: {
                data: 'results',
                total: 'count'
            },
            // group: {
            //  field: 'month',
            //  aggregates: [
            //    {field: 'amount', aggregate: 'sum'}
            //  ]
            // },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 1000
        }),      
        backupdbDS: dataStore(apiUrl + "localsync"),
        invoice: 0,
        activeCust: 0,
        invCust: 0,
        overDue: 0,
        totalCust: 0,
        voidCust: 0,
        totalAmount: 0,
        dashSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: baseUrl + 'api/waterdash/board',
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
            change: function(e) {
                var vm = banhji.wDashboard;
                var totalCust = 0,
                    invCust = 0,
                    overDue = 0,
                    voided = 0,
                    invoice = 0,
                    amount = 0,
                    activeCust = 0,
                    inActiveCust = 0;
                    totalSale = 0;
                    totalUsage = 0;
                    totalDisconnect = 0;
                    totalConnect = 0;

                $.each(this.data(), function(index, value) {
                    activeCust += value.activeCustomer;
                    totalCust += value.totalCustomer;
                    invCust += value.invoiceCust;
                    overDue += value.overDue;
                    invoice += value.totalInvoice;
                    inActiveCust += value.inActiveCustomer;
                    voided += value.void;
                    amount += value.total;
                    totalSale += value.totalSale;
                    totalUsage += value.totalUsage;
                    totalDisconnect += value.totalDisconnect;
                    totalConnect += value.totalConnect;
                });
                banhji.wDashBoard.set('activeCust', kendo.toString(activeCust, "n0", banhji.locale));
                banhji.wDashBoard.set('inActiveCust', inActiveCust);
                banhji.wDashBoard.set('invoice', kendo.toString(invoice, "n0", banhji.locale));
                banhji.wDashBoard.set('invCust', kendo.toString(invCust, "n0", banhji.locale));
                banhji.wDashBoard.set('overDue', kendo.toString(overDue, "n0", banhji.locale));
                banhji.wDashBoard.set('totalCust', kendo.toString(totalCust, "n0", banhji.locale));
                banhji.wDashBoard.set('voidCust', voided);
                banhji.wDashBoard.set('voidCust', kendo.toString(voided, "n0", banhji.locale));
                banhji.wDashBoard.set('totalAmount', kendo.toString(amount, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
                banhji.wDashBoard.set('totalSale', kendo.toString(totalSale, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
                banhji.wDashBoard.set('totalUsage', kendo.toString(totalUsage, "n0", banhji.locale));
                banhji.wDashBoard.set('totalDisconnect', kendo.toString(totalDisconnect, "n0", banhji.locale));
                banhji.wDashBoard.set('totalConnect', kendo.toString(totalConnect, "n0", banhji.locale));
            
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        }),

    });
    banhji.waterCenter = kendo.observable({
        lang: langVM,
        summaryDS: dataStore(apiUrl + "transactions"),
        noteDS: dataStore(apiUrl + 'notes'),
        attachmentDS: dataStore(apiUrl + "attachments"),
        meterDS: dataStore(apiUrl + "utibills/meters"),
        contactTypeDS: banhji.source.customerTypeDS,
        graphDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'waterdash/usage',
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if (operation === 'read') {
                        return {
                            limit: options.take,
                            page: options.page,
                            filter: options.filter
                        };
                    }
                }
            },
            schema: {
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 1000
        }),
        contactDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "properties",
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
        ownerDS: new kendo.data.DataSource({
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
            filter: [{
                    field: "use_water",
                    value: 1
                },
                {
                    field: "parent_id",
                    operation: "where_related",
                    model: "contact_type",
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
        meter_visible: false,
        readingVM: banhji.reading,
        installmentVM: banhji.installment,
        invoiceVM: banhji.invoice,
        currencyDS: banhji.source.currencyDS,
        sortList: banhji.source.sortList,
        sorter: "all",
        sdate: "",
        edate: "",
        obj: {
            id: 0
        },
        objMeter: null,
        note: "",
        searchText: "",
        contact_type_id: null,
        currency_id: 0,
        balance: 0,
        deposit: 0,
        outInvoice: 0,
        overInvoice: 0,
        currencyCode: "",
        user_id: banhji.source.user_id,
        roundDS : [
            {id: 0, name: "No"},
            {id: 1, name: "Yes"}
        ],
        exportEXCEL: function() {},
        pageLoad: function(id) {
            this.contactDS.fetch();
            this.loadSummary();
        },
        sorterChanges: function() {
            var today = new Date(),
                sdate = "",
                edate = "",
                sorter = this.get("sorter");

            switch (sorter) {
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
        setCurrencyCode: function() {
            var code = "",
                obj = this.get("obj");
            $.each(banhji.source.currencyRateDS.data(), function(index, value) {
                if (value.locale == obj.locale) {
                    code = value.currency[0].code;
                    return false;
                }
            });
            this.set("currencyCode", code);
        },
        loadObj: function(id) {
            var self = this;
            this.ownerDS.query({
                filter: {
                    field: "id",
                    value: id
                },
                page: 1,
                pageSize: 100
            }).then(function() {
                var view = self.ownerDS.view();

                if (view.length > 0) {
                    self.set("obj", view[0]);
                    self.loadData();
                }
            });
        },
        loadData: function() {
            var obj = this.get("obj");
            this.loadSummary(obj.id);
            this.setCurrencyCode();
            this.attachmentDS.filter({
                field: "contact_id",
                value: obj.id
            });
            this.noteDS.query({
                filter: {
                    field: "contact_id",
                    value: obj.id
                },
                sort: {
                    field: "noted_date",
                    dir: "desc"
                },
                page: 1,
                pageSize: 10
            });
        },
        //Upload
        onSelect: function(e) {
            // Array with information about the uploaded files
            var self = this,
                files = e.files,
                obj = this.get("obj");

            if (obj.id > 0) {
                // Check the extension of each file and abort the upload if it is not .jpg
                $.each(files, function(index, value) {
                    if (value.extension.toLowerCase() === ".jpg" ||
                        value.extension.toLowerCase() === ".jpeg" ||
                        value.extension.toLowerCase() === ".tiff" ||
                        value.extension.toLowerCase() === ".png" ||
                        value.extension.toLowerCase() === ".gif" ||
                        value.extension.toLowerCase() === ".pdf") {

                        var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) + '_' + value.name;
                        self.attachmentDS.add({
                            user_id: self.get("user_id"),
                            contact_id: obj.id,
                            type: "Contact",
                            name: value.name,
                            description: "",
                            key: key,
                            url: banhji.s3 + key,
                            size: value.size,
                            created_at: new Date(),
                            file: value.rawFile
                        });
                    } else {
                        alert("This type of file is not allowed to attach.");
                    }
                });
            } else {
                alert("Please select a customer!");
            }
        },
        removeFile: function(e) {
            var data = e.data;
            if (confirm(banhji.source.confirmMessage)) {
                this.attachmentDS.remove(data);
                this.attachmentDS.sync();
            }
        },
        uploadFile: function() {
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
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e) {
                //Delete File
                if (e.type == "destroy") {
                    if (saved == false && e.response) {
                        saved = true;
                        var response = e.response.results;
                        $.each(response, function(index, value) {
                            var params = {
                                //Bucket: 'STRING_VALUE', /* required */
                                Delete: { /* required */
                                    Objects: [ /* required */ {
                                            Key: value.data.key /* required */
                                        }
                                        /* more items */
                                    ]
                                }
                            };
                            bucket.deleteObjects(params, function(err, data) {});
                        });
                    }
                }
            });
        },
        //Summary
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
        loadSummary: function(id) {
            var self = this,
                obj = this.get("obj");

            this.summaryDS.query({
                filter: [{
                        field: "contact_id",
                        value: obj.id
                    },
                    {
                        field: "type",
                        operator: "where_in",
                        value: ["Utility_Deposit", "Utility_Invoice"]
                    },
                    {
                        field: "status",
                        operator: "where_in",
                        value: [0, 2]
                    }
                ],
                sort: {
                    field: "issued_date",
                    dir: "desc"
                }
            }).then(function() {
                var view = self.summaryDS.view(),
                    deposit = 0,
                    open = 0,
                    over = 0,
                    balance = 0,
                    today = new Date();

                $.each(view, function(index, value) {
                    if (value.type == "Utility_Deposit") {
                        deposit += kendo.parseFloat(value.amount);
                    } else {
                        balance += (kendo.parseFloat(value.amount) - kendo.parseFloat(value.deposit)) - kendo.parseFloat(value.amount_paid);
                        open++;
                        if (new Date(value.due_date) < today) {
                            over++;
                        }
                    }
                });
                self.set("deposit", kendo.toString(deposit, obj.locale == "km-KH" ? "c0" : "c", obj.locale));
                self.set("outInvoice", kendo.toString(open, "n0"));
                self.set("overInvoice", kendo.toString(over, "n0"));
                self.set("balance", kendo.toString(balance, obj.locale == "km-KH" ? "c0" : "c", obj.locale));
            });
        },
        loadBalance: function() {
            $("#tabTxn").click();

            var obj = this.get("obj");
            this.invoiceVM.dataSource.query({
                filter: [{
                        field: "contact_id",
                        value: obj.id
                    },
                    {
                        field: "type",
                        value: "Utility_Invoice"
                    },
                    {
                        field: "status",
                        operator: "where_in",
                        value: [0, 2]
                    }
                ],
                sort: [{
                        field: "issued_date",
                        dir: "desc"
                    },
                    {
                        field: "id",
                        dir: "desc"
                    }
                ],
                page: 1,
                pageSize: 10
            });
        },
        loadOverInvoice: function() {
            $("#tabTxn").click();

            var obj = this.get("obj");
            this.invoiceVM.dataSource.query({
                filter: [{
                        field: "contact_id",
                        value: obj.id
                    },
                    {
                        field: "type",
                        value: "Utility_Invoice"
                    },
                    {
                        field: "status",
                        operator: "where_in",
                        value: [0, 2]
                    },
                    {
                        field: "due_date <",
                        value: kendo.toString(new Date(), "yyyy-MM-dd")
                    }
                ],
                sort: [{
                        field: "issued_date",
                        dir: "desc"
                    },
                    {
                        field: "id",
                        dir: "desc"
                    }
                ],
                page: 1,
                pageSize: 10
            });
        },
        loadTransaction: function() {
            if(this.objMeter){
                if (this.invoiceVM.dataSource.total() == 0) {
                    this.searchTransaction();
                }
            }
        },
        loadReading: function() {
            var that = this,
                objMeter = this.get("objMeter");
            if (this.readingVM.dataSource.total() == 0) {
                if (objMeter) {
                    this.readingVM.set('NumberSR', objMeter.meter_number);
                    this.readingVM.dataSource.query({
                        filter: {
                            field: 'meter_id',
                            value: objMeter.id
                        }
                    }).then(function(e) {
                        var last = that.readingVM.dataSource.data()[0];
                        that.readingVM.set('previousSR', last.current);
                        that.set("miniMonthofS", last.month_of);
                    });
                }
            }
        },
        loadInstallment: function() {
            var objMeter = this.get("objMeter");

            if (objMeter && this.installmentVM.dataSource.total() == 0) {
                this.installmentVM.dataSource.filter({
                    field: 'meter_id',
                    value: objMeter.id
                });
            }
        },
        propertyID: 0,
        haveGroup: false,
        selectedRow: function(e) {
            this.goMonthlyTab();
            var data = e.data,
                self = this;
            this.set('meter_visible', true);
            this.set('propertyID', data.id);
            this.meterDS.query({
                filter: [{
                    field: "property_id",
                    value: data.id
                }, {
                    field: "reactive_status",
                    value: 0
                }],
                page: 1,
                pageSize: 100
            })
            .then(function(e) {
                var meters = self.meterDS.data();
                if (meters.length > 0) {
                    self.graphDS.filter({
                        field: 'meter_id',
                        value: meters[0].id
                    });
                }
                if(meters.length > 1){
                    self.set("haveGroup", true);
                }else{
                    self.set("haveGroup", false);
                }
            });
            let currency = banhji.source.currencyList.filter(function(elem, i, array) {
                return elem.locale === data.contact.locale;
            });
            data.contact.currency = currency[0];

            this.set("obj", data.contact);
            banhji.meter.contact = data.contact;
            this.loadData();
        },
        miniMonthofS: "<?php echo date('Y-m-d'); ?>",
        onSelectedMeter: function(e) {
            this.goMonthlyTab();
            var data = e.data;
            this.set("objMeter", data);
            this.graphDS.filter({
                field: 'meter_id',
                value: e.data.id
            });
            this.invoiceVM.dataSource.data([]);
            this.readingVM.dataSource.data([]);
            this.installmentVM.dataSource.data([]);
        },
        goMonthlyTab: function(e) {
            $(".row-merge").eq(0).children("li").removeClass("active");
            $(".row-merge").eq(0).children("li").eq(0).addClass("active");
            $(".cover-tab-content").children(".tab-pane").removeClass("active");
            $(".cover-tab-content").children(".tab-pane").eq(0).addClass("active");
        },
        goMeter: function() {
            banhji.meter.set("contact", this.get("obj"));
            banhji.meter.set("propertyID", this.get("propertyID"));
            banhji.router.navigate("/meter");
        },
        goDeposit: function() {
            banhji.customerDeposit.set("contact", this.get("obj"));
            banhji.router.navigate("/customer_deposit");
        },
        search: function() {
            var self = this,
                para = [],
                searchText = this.get("searchText"),
                contact_type_id = this.get("contact_type_id");
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
                        field: "code",
                        operator: "or_where",
                        value: textParts[1]
                    });
                }
            }
            this.contactDS.filter(para);
            self.set("contact_type_id", 0);
        },
        groupMeterDS        : dataStore(apiUrl + "utibills/groupmeter"),
        groupMeter          : function(e){
            var self = this;
            this.groupMeterDS.data([]);
            this.groupMeterDS.add({
                property_id : this.get("propertyID")
            });
            this.groupMeterDS.sync();
            this.groupMeterDS.bind("requestEnd", function(e){
                self.meterDS.filter({field: "property_id", value: self.get("propertyID")});
            });
        },
        searchTransaction: function() {
            var self = this,
                start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"),
                end = kendo.toString(this.get("edate"), "yyyy-MM-dd"),
                para = [],
                obj = this.get("obj"),
                objMeter = this.get("objMeter");

            if (obj.id > 0) {
                para.push({
                    field: "contact_id",
                    value: obj.id
                });

                //Dates
                if (start && end) {
                    para.push({
                        field: "issued_date >=",
                        value: start
                    });
                    para.push({
                        field: "issued_date <=",
                        value: end
                    });
                } else if (start) {
                    para.push({
                        field: "issued_date",
                        value: start
                    });
                } else if (end) {
                    para.push({
                        field: "issued_date <=",
                        value: end
                    });
                } else {

                }

                this.invoiceVM.dataSource.query({
                    filter: para,
                    sort: [{
                            field: "issued_date",
                            dir: "desc"
                        },
                        {
                            field: "id",
                            dir: "desc"
                        }
                    ],
                    page: 1,
                    pageSize: 10
                });
            }
        },
        //Note
        saveNoteEnter: function(e) {
            e.preventDefault();
            this.saveNote();
        },
        saveNote: function() {
            var obj = this.get("obj");
            if (obj.id > 0 && this.get("note") !== "") {
                this.noteDS.insert(0, {
                    contact_id: obj.id,
                    note: this.get("note"),
                    noted_date: new Date(),
                    created_by: this.get("user_id"),
                    creator: ""
                });
                this.noteDS.sync();
                this.set("note", "");
            } else {
                alert("Please select a customer and Memo is required");
            }
        },
        goEdit: function() {
            var obj = this.get("obj");
            if (obj !== null && obj.id !== 0) {
                //window.open('<?php echo base_url(); ?>rrd#/customer/'+obj.id,'_self');
                banhji.router.navigate('/customer/' + obj.id);
            } else {
                alert("Please select a customer.");
            }
        },
        singleInvDS: dataStore(apiUrl + "winvoices"),
        payInvoice: function(e) {
            var data = e.data;
            if (obj !== null) {
                banhji.router.navigate('/receipt');
                banhji.Receipt.loadInvoice(data.id);
            } else {
                alert(banhji.source.selectCustomerMessage);
            }
        },
        branchDS: dataStore(apiUrl + "branches"),
        viewInv: function(e){
            var data = e.data;
            var self = this;
            this.singleInvDS.data([]);
            this.singleInvDS.query({
                filter: {field: "id", value: data.id}
            }).then(function(e){
                var view = self.singleInvDS.view();
                banhji.InvoicePrint.dataSource = [];
                banhji.InvoicePrint.dataSource.push(view[0]);
                banhji.InvoicePrint.txnFormID = 14;
                self.branchDS.query({
                    filter: {
                        field: "id",
                        value: view[0].meter.branch_id
                    }
                }).then(function(e) {
                    var v = self.branchDS.view();
                    banhji.InvoicePrint.license = v[0];
                    banhji.router.navigate('/invoice_print');
                });
                
                
            });
        }
    });
    //Customer
    banhji.customer = kendo.observable({
        lang                    : langVM,
        dataSource              : dataStore(apiUrl + "contacts"),
        patternDS               : dataStore(apiUrl + "contacts"),
        numberDS                : dataStore(apiUrl + "contacts"),
        deleteDS                : dataStore(apiUrl + "transactions"),
        existingDS              : dataStore(apiUrl + "contacts"),
        contactPersonDS         : dataStore(apiUrl + "contact_persons"),
        paymentTermDS           : banhji.source.paymentTermDS,
        paymentMethodDS         : banhji.source.paymentMethodDS,
        countryDS               : banhji.source.countryDS,
        currencyDS              : new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: { field:"status", value: 1 }
        }),
        contactTypeDS           : new kendo.data.DataSource({
            data: banhji.source.contactTypeList,
            filter: { field:"parent_id", value: 1 }//Customer
        }),
        arDS                    : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: { field:"account_type_id", value: 12 },
            sort: { field:"number", dir:"asc" }
        }),
        raDS                    : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter:{
                logic: "or",
                filters: [
                    { field: "account_type_id", value: 35 },
                    { field: "account_type_id", value: 39 }
                ]
            },
            sort: { field:"number", dir:"asc" }
        }),
        depositDS               : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: {
                logic: "or",
                filters: [
                    { field: "account_type_id", value: 25 },
                    { field: "account_type_id", value: 30 }
                ]
            },
            sort: { field:"number", dir:"asc" }
        }),
        tradeDiscountDS         : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: { field:"id", value: 72 },
            sort: { field:"number", dir:"asc" }
        }),
        settlementDiscountDS    : new kendo.data.DataSource({
            data: banhji.source.accountList,
            // filter: { field:"id", value: 99 },
            filter: {
                logic: "or",
                filters: [
                    { field: "account_type_id", value: 36 },
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
        taxItemDS       : new kendo.data.DataSource({
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
        genders                 : banhji.source.genderList,
        statusList              : banhji.source.statusList,
        confirmMessage          : banhji.source.confirmMessage,
        isEdit                  : false,
        isProtected             : false,
        obj                     : null,
        saveClose               : false,
        showConfirm             : false,
        notDuplicateNumber      : true,
        phFullname              : "Customer Name ...",
        contact_type_id         : 0,
        pageLoad                : function(id, contact_type_id){
            if(id){
                this.set("isEdit", true);
                this.loadObj(id, contact_type_id);
            }else{
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                }
            }   
        },
        //Contact Person
        addEmptyContactPerson   : function(){
            var obj = this.get("obj");
            
            this.contactPersonDS.add({
                contact_id          : obj.id,
                prefix              : "",
                name                : "",
                department          : "",
                phone               : "",
                email               : ""
            });
        },
        deleteContactPerson     : function(e){
            if (confirm("Are you sure, you want to delete it?")) {
                var d = e.data,
                obj = this.contactPersonDS.getByUid(d.uid);

                this.contactPersonDS.remove(obj);
            }
        },
        //Map
        loadMap                 : function(){
            var obj = this.get("obj"), lat = kendo.parseFloat(obj.latitute),
            lng = kendo.parseFloat(obj.longtitute);
            
            if(lat && lng){
                var myLatLng = {lat:lat, lng:lng};
                var mapOptions = {
                    zoom: 17,
                    center: myLatLng,
                    mapTypeControl: false,
                    zoomControl: false,
                    scaleControl: false,
                    streetViewControl: false
                };
                var map = new google.maps.Map(document.getElementById('map'),mapOptions);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: obj.number
                });
            } 
        },
        copyBillTo              : function(){
            var obj = this.get("obj");

            obj.set("ship_to", obj.bill_to);
        },
        //Number        
        checkExistingNumber     : function(){
            var self = this, para = [], 
            obj = this.get("obj");
            
            if(obj.number!==""){

                if(obj.isNew()==false){
                    para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
                }

                para.push({ field:"abbr", value: obj.abbr });
                para.push({ field:"number", value: obj.number });
                para.push({ field:"contact_type_id", value: obj.contact_type_id });
                
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
                    { field:"contact_type_id", value:obj.contact_type_id }
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
        checkExistingTxn        : function(){
            var self = this, obj = this.get("obj");
            
            this.deleteDS.query({
                filter: { field:"contact_id", value: obj.id },
                page: 1,
                pageSize: 1
            }).then(function(e){
                var view = self.deleteDS.view();
                
                if(view.length>0){
                    self.set("isProtected", true);
                }else{
                    self.set("isProtected", false);
                }
            });
        },
        //Obj
        loadObj                 : function(id, contact_type_id){
            var self = this, para = [];

            if(id>0){
                para.push({ field:"id", value: id });
            }

            if(contact_type_id){
                para.push({ field:"contact_type_id", value: contact_type_id });
                para.push({ field:"is_pattern", value: 1 });
            }

            this.dataSource.query({
                filter: para,
                page: 1,
                pageSize: 100
            }).then(function(e){
                var view = self.dataSource.view();
                
                self.set("obj", view[0]);
                self.loadMap();
                self.checkExistingTxn();
            });

            this.contactPersonDS.filter({ field:"contact_id", value: id });
        },
        addEmpty                : function(){
            this.dataSource.data([]);
            this.contactPersonDS.data([]);
            
            this.set("isEdit", false);
            this.set("isProtected", false);
            this.set("notDuplicateNumber", true);
            this.set("obj", null);
            
            this.dataSource.insert(0, {
                "country_id"            : 0,
                "user_id"               : 0,
                "contact_type_id"       : 4, //General Customer
                "abbr"                  : "",
                "number"                : "",
                "surname"               : "",
                "name"                  : "",
                "gender"                : "",
                "phone"                 : "",
                "email"                 : "",
                "company"               : "",
                "vat_no"                : "",
                "memo"                  : "",
                "city"                  : "",
                "post_code"             : "",
                "address"               : "",
                "bill_to"               : "",
                "ship_to"               : "",
                "latitute"              : "",
                "longtitute"            : "",
                "credit_limit"          : 0,
                "locale"                : banhji.locale,
                "invoice_note"          : "",
                "payment_term_id"       : 0,
                "payment_method_id"     : 0,
                "registered_date"       : new Date(),
                "account_id"            : 0,
                "ra_id"                 : 0,
                "tax_item_id"           : 0,
                "deposit_account_id"    : 0,
                "trade_discount_id"     : 0,
                "settlement_discount_id": 0,
                "is_pattern"            : 0,
                "status"                : 1
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            this.typeChanges();
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
                //Contact Person has changes
                if(this.contactPersonDS.hasChanges()){
                    obj.set("dirty", true);
                }
            }

            //Save Obj
            this.objSync()
            .then(function(data){ //Success
                if(self.get("isEdit")==false){
                    //Contact Person
                    $.each(self.contactPersonDS.data(), function(index, value) {
                        value.set("contact_id", data[0].id);
                    });
                }
                self.contactPersonDS.sync();
                
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
            this.contactPersonDS.cancelChanges();
            this.dataSource.data([]);
            this.contactPersonDS.data([]);
            this.set("contact_type_id", 0);

            banhji.userManagement.removeMultiTask("customer");
        },
        delete                  : function(){
            var obj = this.get("obj");
            this.set("showConfirm",false);

            if(!obj.is_system==1){
                if(this.get("isProtected")){
                    alert("Sorry, this data is protected!");
                }else{
                    obj.set("deleted", 1);
                    this.dataSource.sync();
                    banhji.source.customerDS.fetch();

                    window.history.back();
                }
            }   
        },
        openConfirm             : function(){
            this.set("showConfirm", true);
        },
        closeConfirm            : function(){
            this.set("showConfirm", false);
        },
        //Pattern
        typeChanges             : function(){
            var obj = this.get("obj");

            if(obj.contact_type_id && obj.isNew()){
                this.applyPattern();
                this.generateNumber();
            }
        },
        applyPattern            : function(){
            var self = this, obj = self.get("obj");

            this.patternDS.query({
                filter: [
                    { field:"contact_type_id", value: obj.contact_type_id },
                    { field:"is_pattern", value: 1 }
                ],
                page: 1,
                pageSize: 1
            }).then(function(data){
                var view = self.patternDS.view(),
                type = self.contactTypeDS.get(view[0].contact_type_id);
                if(view.length>0){
                    obj.set("country_id", view[0].country_id);
                    obj.set("abbr", type.abbr);
                    obj.set("gender", view[0].gender);
                    obj.set("company", view[0].company);
                    obj.set("vat_no", view[0].vat_no);
                    obj.set("memo", view[0].memo);
                    obj.set("city", view[0].city);
                    obj.set("post_code", view[0].post_code);
                    obj.set("address", view[0].address);
                    obj.set("bill_to", view[0].bill_to);
                    obj.set("ship_to", view[0].ship_to);
                    obj.set("invoice_note", view[0].invoice_note);
                    obj.set("payment_term_id", view[0].payment_term_id);
                    obj.set("payment_method_id", view[0].payment_method_id);
                    obj.set("credit_limit", view[0].credit_limit);
                    obj.set("locale", view[0].locale);
                    obj.set("account_id", view[0].account_id);
                    obj.set("ra_id", view[0].ra_id);
                    obj.set("tax_item_id", view[0].tax_item_id);
                    obj.set("deposit_account_id", view[0].deposit_account_id);
                    obj.set("trade_discount_id", view[0].trade_discount_id);
                    obj.set("settlement_discount_id", view[0].settlement_discount_id);
                }
            });
        }
    });

    banhji.cashReAuto = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibills/receiptauto"),
        onSelected: function(e) {
            $('li.k-file').remove();
            var self = this;
            var files = e.files;
            var reader = new FileReader();
            this.dataSource.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    if (roa.length > 0) {
                        result[sheetName] = roa;
                        for (var i = 0; i < roa.length; i++) {
                            self.dataSource.add(roa[i]);
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        save: function() {
            var self = this;
            if (this.dataSource.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                this.dataSource.sync();
                this.dataSource.bind("requestEnd", function(e) {
                    if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        self.dataSource.data([]);
                    }
                });
                this.dataSource.bind("error", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    self.dataSource.data([]);
                });
            }
        },
        cusDS: dataStore(apiUrl + "utibills/receiptautocus"),
        onCusSelected: function(e) {
            $('li.k-file').remove();
            var self = this;
            var files = e.files;
            var reader = new FileReader();
            this.cusDS.data([]);
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    if (roa.length > 0) {
                        result[sheetName] = roa;
                        for (var i = 0; i < roa.length; i++) {
                            self.cusDS.add(roa[i]);
                        }
                    }
                });
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        saveCus: function() {
            var self = this;
            if (this.cusDS.data().length === 0) {
                var notifi = $("#ntf1").data("kendoNotification");
                notifi.hide();
                notifi.error(this.lang.lang.error_message);
            } else {
                $("#loadImport").css("display", "block");
                this.cusDS.sync();
                this.cusDS.bind("requestEnd", function(e) {
                    if (e.response) {
                        var notifi = $("#ntf1").data("kendoNotification");
                        notifi.hide();
                        notifi.success(self.lang.lang.success_message);
                        $("#loadImport").css("display", "none");
                        $('li.k-file').remove();
                        self.cusDS.data([]);
                    }
                });
                this.cusDS.bind("error", function(e) {
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_message);
                    $("#loadImport").css("display", "none");
                    $('li.k-file').remove();
                    self.cusDS.data([]);
                });
            }
        },
        cancel: function(e) {
            window.history.back();
        }
    });

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
        fineCollect: new kendo.Layout("#fineCollect", {
            model: banhji.fineCollect
        }),
        otherRevenues: new kendo.Layout("#otherRevenues", {
            model: banhji.otherRevenues
        }),
        accountReceivableList: new kendo.Layout("#accountReceivableList", {
            model: banhji.accountReceivableList
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
        banhji.view.layout.showIn('#content', banhji.view.wDashBoard);
        //banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        // $('#main-top-navigation').append('<li><a href="\#">Home</a></li>');
        // $('#current-section').text("");
        // $("#secondary-menu").html("");
        banhji.index.getLogo();
        banhji.index.pageLoad();
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
    /*************************
     *   Water Section   *
     **************************/
    banhji.router.route("/center(/:id)", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.waterCenter);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.waterCenter;
        banhji.userManagement.addMultiTask("Water Center", "center", null);
        if (banhji.pageLoaded["water_center"] == undefined) {
            banhji.pageLoaded["water_center"] = true;
        }
        vm.pageLoad(id);
    });
    banhji.router.route("/customer(/:id)(/:is_pattern)", function(id, is_pattern) {
        banhji.accessMod.query({
            filter: {
                field: 'username',
                value: JSON.parse(localStorage.getItem('userData/user')).username
            }
        }).then(function(e) {
            var allowed = false;
            if (banhji.accessMod.data().length > 0) {
                for (var i = 0; i < banhji.accessMod.data().length; i++) {
                    if ("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            }
            if (allowed) {
                banhji.view.layout.showIn("#content", banhji.view.customer);
                kendo.fx($("#slide-form")).slideIn("down").play();
                var vm = banhji.customer;
                banhji.userManagement.addMultiTask("Customer", "customer", vm);
                if (banhji.pageLoaded["customer"] == undefined) {
                    banhji.pageLoaded["customer"] = true;
                    var validator = $("#example").kendoValidator({
                        rules: {
                            customRule1: function(input) {
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
                    $("#saveClose").click(function(e) {
                        e.preventDefault();
                        if (validator.validate()) {
                            vm.set("saveClose", true);
                            vm.save();
                        } else {
                            $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                        }
                    });
                }
                vm.pageLoad(id, is_pattern);
            } else {
                window.location.replace(baseUrl + "admin");
            }
        });
    });
    banhji.router.route("/property(/:id)", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.property);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.property;
        banhji.property.set('contactOBJ', null);
        banhji.userManagement.addMultiTask("Activate User", "activate_user", null);
        if (banhji.pageLoaded["property"] == undefined) {
            banhji.pageLoaded["property"] = true;
        } else {
            alert("login");
        }
        vm.pageLoad(id);
    });
    banhji.router.route("/meter(/:id)", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.meter);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.meter;
        banhji.userManagement.addMultiTask("Add Meter", "meter", null);
        if (banhji.pageLoaded["meter"] == undefined) {
            banhji.pageLoaded["meter"] = true;
        }
        vm.lineDS.bind("change", vm.lineDSChanges);
        vm.pageLoad(id);
    });
    banhji.router.route("/activate_meter/:id", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.ActivateMeter);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.ActivateMeter;
        banhji.userManagement.addMultiTask("Activate Meter", "activate_meter", null);
        if (banhji.pageLoaded["activate_meter"] == undefined) {
            banhji.pageLoaded["activate_meter"] = true;
        }
        vm.pageLoad(id);
    });
    banhji.router.route("/plan(/:id)", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.plan);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.plan;
        banhji.userManagement.addMultiTask("Add Plan", "plan", null);
        if (banhji.pageLoaded["plan"] == undefined) {
            banhji.pageLoaded["plan"] = true;
        }
        vm.pageLoad(id);
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
    banhji.router.route("/reading", function() {
        localforage.getItem('user')
            .then(function(data) {
                for (var i = 0; i < data.roles.length; i++) {
                    if ('reading' == data.roles[i].name) {
                        banhji.view.layout.showIn("#content", banhji.view.reading);
                        banhji.view.layout.showIn('#menu', banhji.view.menu);
                        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
                        var vm = banhji.reading;
                        banhji.userManagement.addMultiTask("Reading", "reading", null);
                        if (banhji.pageLoaded["reading"] == undefined) {
                            banhji.pageLoaded["reading"] = true;
                        }
                        vm.pageLoad();
                        break;
                    }
                }
            });
    });
    banhji.router.route("/edit_reading", function() {
        banhji.view.layout.showIn("#content", banhji.view.EditReading);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.EditReading;
        banhji.userManagement.addMultiTask("Edit Reading", "Edit Reading", null);
        if (banhji.pageLoaded["edit_reading"] == undefined) {
            banhji.pageLoaded["edit_reading"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route("/import", function() {
        banhji.view.layout.showIn("#content", banhji.view.waterImport);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.waterImport;
        banhji.userManagement.addMultiTask("Import", "import", null);
        if (banhji.pageLoaded["import"] == undefined) {
            banhji.pageLoaded["import"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route("/run_bill", function() {
        localforage.getItem('user')
            .then(function(data) {
                for (var i = 0; i < data.roles.length; i++) {
                    if ('run_bill' == data.roles[i].name) {
                        banhji.view.layout.showIn("#content", banhji.view.runBill);
                        banhji.view.layout.showIn('#menu', banhji.view.menu);
                        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

                        var vm = banhji.runBill;
                        banhji.userManagement.addMultiTask("Run Bill", "run_bill", null);
                        if (banhji.pageLoaded["run_bill"] == undefined) {
                            banhji.pageLoaded["run_bill"] = true;
                        }
                        break;
                    }
                }
            });
        //vm.pageLoad();
    });
    banhji.router.route("/print_bill", function() {
        localforage.getItem('user')
            .then(function(data) {
                for (var i = 0; i < data.roles.length; i++) {
                    if ('print_bill' == data.roles[i].name) {
                        banhji.view.layout.showIn("#content", banhji.view.printBill);
                        banhji.view.layout.showIn('#menu', banhji.view.menu);
                        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

                        var vm = banhji.printBill;
                        banhji.userManagement.addMultiTask("Print Bill", "print_bill", null);
                        if (banhji.pageLoaded["print_bill"] == undefined) {
                            banhji.pageLoaded["print_bill"] = true;
                        }
                        vm.pageLoad();
                        break;
                    }
                }
            });
    });
    banhji.router.route("/invoice_print", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.InvoicePrint);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
            var vm = banhji.InvoicePrint;
            if (banhji.pageLoaded["invoice_print"] == undefined) {
                banhji.pageLoaded["invoice_print"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/receipt", function() {
        localforage.getItem('user')
            .then(function(data) {
                for (var i = 0; i < data.roles.length; i++) {
                    if ('receipt' == data.roles[i].name) {
                        banhji.view.layout.showIn("#content", banhji.view.Receipt);
                        banhji.view.layout.showIn('#menu', banhji.view.menu);
                        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

                        var vm = banhji.Receipt;
                        banhji.userManagement.addMultiTask("Receipt", "receipt", null);
                        if (banhji.pageLoaded["receipt"] == undefined) {
                            banhji.pageLoaded["receipt"] = true;
                            vm.paymentTermDS.read();
                            var validator = $("#example").kendoValidator().data("kendoValidator");
                        }
                        vm.pageLoad();
                        break;
                    }
                }
            });
    });
    banhji.router.route("/reconcile", function() {
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.Reconcile;
        banhji.userManagement.addMultiTask("Reconcile", "reconcile", null);
        if (banhji.pageLoaded["reconcile"] == undefined) {
            banhji.pageLoaded["reconcile"] = true;
        }
        vm.pageLoad();
        if (banhji.Receipt.currencyDS.data().length == 0) {
            banhji.Receipt.currencyDS.read()
                .then(function(e) {
                    $.each(banhji.Receipt.currencyDS.data(), function(i, v) {
                        banhji.reconcileVM.currencyDS.push(v);
                    });
                    banhji.view.layout.showIn("#content", banhji.view.Reconcile);
                });
        } else {
            $.each(banhji.Receipt.currencyDS.data(), function(i, v) {
                banhji.reconcileVM.currencyDS.push(v);
            });
            banhji.view.layout.showIn("#content", banhji.view.Reconcile);
        }
    });
    banhji.router.route("/reports", function() {
        banhji.view.layout.showIn("#content", banhji.view.Reports);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.Reports;
        banhji.userManagement.addMultiTask("Reports", "reports", null);
        if (banhji.pageLoaded["reports"] == undefined) {
            banhji.pageLoaded["reports"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route("/customer_deposit(/:id)(/:is_recurring)", function(id, is_recurring) {
        // banhji.accessMod.query({
        //  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        // }).then(function(e){
        //  var allowed = false;
        //  if(banhji.accessMod.data().length > 0) {
        //    for(var i = 0; i < banhji.accessMod.data().length; i++) {
        //      if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
        //        allowed = true;
        //        break;
        //      }
        //    }
        //  } 
        //  if(allowed) {
        banhji.view.layout.showIn("#content", banhji.view.customerDeposit);
        kendo.fx($("#slide-form")).slideIn("down").play();

        var vm = banhji.customerDeposit;
        banhji.userManagement.addMultiTask("Customer Deposit", "customer_deposit", vm);
        if (banhji.pageLoaded["customer_deposit"] == undefined) {
            banhji.pageLoaded["customer_deposit"] = true;
            var validator = $("#example").kendoValidator().data("kendoValidator");
            $("#saveNew").click(function(e) {
                e.preventDefault();
                if (validator.validate()) {
                    vm.save();
                } else {
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });
            $("#saveClose").click(function(e) {
                e.preventDefault();
                if (validator.validate()) {
                    vm.set("saveClose", true);
                    vm.save();
                } else {
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });
            $("#savePrint").click(function(e) {
                e.preventDefault();

                if (validator.validate()) {
                    vm.set("savePrint", true);
                    vm.save();
                } else {
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });
            $("#saveRecurring").click(function(e) {
                e.preventDefault();
                if (validator.validate() && vm.validateRecurring()) {
                    vm.set("saveRecurring", true);
                    vm.save();
                } else {
                    $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                }
            });
        }

        vm.pageLoad(id, is_recurring);
        //  } else {
        //    window.location.replace(baseUrl + "admin");
        //  }
        // });
    });
    banhji.router.route("/invoice_custom(/:id)", function(id) {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.invoiceCustom);
            kendo.fx($("#slide-form")).slideIn("down").play();
            var vm = banhji.invoiceCustom;
            if (banhji.pageLoaded["invoice_custom"] == undefined) {
                banhji.pageLoaded["invoice_custom"] = true;
                //Function write css to header
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
                var Href1 = '<?php echo base_url(); ?>assets/invoice/invoice.css';
                loadStyle(Href1);
            };

            vm.pageLoad(id);
        };
    });
    banhji.router.route("/utility_invoice/:id", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.waterInvoice);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.waterInvoice;
        banhji.userManagement.addMultiTask("Water Invoice", "water_invoice", null);
        if (banhji.pageLoaded["water_invoice"] == undefined) {
            banhji.pageLoaded["water_invoice"] = true;
        }
        vm.pageLoad(id);
    });
    banhji.router.route("/add_accountingprefix(/:id)", function(id) {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.addAccountingprefix);
            kendo.fx($("#slide-form")).slideIn("down").play();
            var vm = banhji.addAccountingprefix;
            banhji.userManagement.addMultiTask("Add Accounting Prefix", "add_accountingprefix", null);
            if (banhji.pageLoaded["add_accountingprefix"] == undefined) {
                banhji.pageLoaded["add_accountingprefix"] = true;
                setTimeout(function() {
                    var validator = $("#example").kendoValidator().data("kendoValidator");
                    var notification = $("#notification").kendoNotification({
                        autoHideAfter: 5000,
                        width: 300,
                        height: 50
                    }).data('kendoNotification');
                    $("#saveNew").click(function(e) {
                        e.preventDefault();
                        if (validator.validate()) {
                            vm.save();
                            notification.success("Save Successful");
                        } else {
                            notification.error("Warning, please review it again!");
                        }
                    });
                    $("#saveClose").click(function(e) {
                        e.preventDefault();
                        if (validator.validate()) {
                            vm.save();
                            window.history.back();
                            notification.success("Save Successful");
                        } else {
                            notification.error("Warning, please review it again!");
                        }
                    });
                }, 2000);
            };
            vm.pageLoad(id);
        };
    });
    banhji.router.route("/reorder", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.Reorder);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.Reorder;
        banhji.userManagement.addMultiTask("Route Management", "reorder", null);
        if (banhji.pageLoaded["reorder"] == undefined) {
            banhji.pageLoaded["reorder"] = true;
            var grid = $("#grid").kendoGrid({
                dataSource: vm.dataSource,
                autoBind: false,
                scrollable: false,
                columns: [{
                        field: "worder",
                        title: "Route ID"
                    },
                    {
                        field: "meter_number",
                        title: vm.lang.lang.number
                    },
                    {
                        field: "property_name",
                        title: vm.lang.lang.property_name
                    }
                ]
            }).data("kendoGrid");
            grid.table.kendoSortable({
                filter: ">tbody >tr",
                hint: $.noop,
                cursor: "move",
                placeholder: function(element) {
                    return element.clone().addClass("k-state-hover").css("opacity", 0.65);
                },
                container: "#grid tbody",
                change: function(e) {
                    var skip = grid.dataSource.skip(),
                        oldIndex = e.oldIndex + skip,
                        newIndex = e.newIndex,
                        data = grid.dataSource.data(),
                        dataItem = grid.dataSource.getByUid(e.item.data("uid"));
                    grid.dataSource.remove(dataItem);
                    grid.dataSource.insert(newIndex, dataItem);
                }
            });
        }
        vm.pageLoad();
    });
    banhji.router.route("/backup", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.Backup);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.Backup;
        banhji.userManagement.addMultiTask("Backup", "backup", null);
        if (banhji.pageLoaded["backup"] == undefined) {
            banhji.pageLoaded["backup"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route("/offline", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.Offline);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.Offline;
        banhji.userManagement.addMultiTask("Offline", "offline", null);
        if (banhji.pageLoaded["offline"] == undefined) {
            banhji.pageLoaded["offline"] = true;
        }
        vm.pageLoad();
    });
    //////Report Router/////
    banhji.router.route("/customer_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.customerList);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

            var vm = banhji.customerList;
            banhji.userManagement.addMultiTask("Customer List", "customer_list", null);
            if (banhji.pageLoaded["customer_list"] == undefined) {
                banhji.pageLoaded["customer_list"] = true;

            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_no_connection", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.customerNoConnection);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

            var vm = banhji.customerNoConnection;
            banhji.userManagement.addMultiTask("Customer No Connection", "customer_no_connection", null);
            if (banhji.pageLoaded["customer_no_connection"] == undefined) {
                banhji.pageLoaded["customer_no_connection"] = true;

            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/disconnect_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.disconnectList);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

            var vm = banhji.disconnectList;
            banhji.userManagement.addMultiTask("Disconnect List", "disconnect_list", null);
            if (banhji.pageLoaded["disconnect_list"] == undefined) {
                banhji.pageLoaded["disconnect_list"] = true;

            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/connect_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.connectionList);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

            var vm = banhji.connectionList;
            banhji.userManagement.addMultiTask("Connected List", "connect_list", null);
            if (banhji.pageLoaded["disconnect_list"] == undefined) {
                banhji.pageLoaded["disconnect_list"] = true;

            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/inactive_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.inactiveList);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

            var vm = banhji.inactiveList;
            banhji.userManagement.addMultiTask("Disconnect List", "inactive_list", null);
            if (banhji.pageLoaded["inactive_list"] == undefined) {
                banhji.pageLoaded["inactive_list"] = true;

            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/to_be_disconnect_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            to_be_disconnectList
            banhji.view.layout.showIn("#content", banhji.view.to_be_disconnectList);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

            var vm = banhji.to_be_disconnectList;
            banhji.userManagement.addMultiTask("To Be Disconnect List", "to_be_disconnectList", null);
            if (banhji.pageLoaded["to_be_disconnectList"] == undefined) {
                banhji.pageLoaded["to_be_disconnectList"] = true;

            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/new_customer_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.newCustomerList);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

            var vm = banhji.newCustomerList;
            banhji.userManagement.addMultiTask("New Customer List", "new_customer_list", null);
            if (banhji.pageLoaded["new_customer_list"] == undefined) {
                banhji.pageLoaded["new_customer_list"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/mini_usage_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.miniUsageList);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

            var vm = banhji.miniUsageList;
            banhji.userManagement.addMultiTask("Minimum Water Usage List", "mini_usage_list", null);
            if (banhji.pageLoaded["mini_usage_list"] == undefined) {
                banhji.pageLoaded["mini_usage_list"] = true;
            }
            banhji.miniUsageList.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    banhji.miniUsageList.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.miniUsageList.set('amount', kendo.toString(e.response.amount, 'n0'));
                }
            });
            vm.pageLoad();
        }
    });
    banhji.router.route("/sale_summary", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.saleSummary);

            var vm = banhji.saleSummary;
            banhji.userManagement.addMultiTask(" Water Sale Summary", "sale_summary", null);

            if (banhji.pageLoaded["sale_summary"] == undefined) {
                banhji.pageLoaded["sale_summary"] == true;

                vm.sorterChanges();
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/connect_service_revenue", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.connectServiceRevenue);

            var vm = banhji.connectServiceRevenue;
            banhji.userManagement.addMultiTask("Connect Service Revenue", "connect_service_revenue", null);

            if (banhji.pageLoaded["connect_service_revenue"] == undefined) {
                banhji.pageLoaded["connect_service_revenue"] == true;

                vm.sorterChanges();
            }
            banhji.connectServiceRevenue.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    banhji.connectServiceRevenue.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.connectServiceRevenue.set('total', kendo.toString(e.response.total, 'c2'));
                }
            });
            vm.pageLoad();
        }
    });
    banhji.router.route("/sale_detail", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.saleDetail);

            var vm = banhji.saleDetail;
            banhji.userManagement.addMultiTask(" Water Sale Detail", "sale_detail", null);

            if (banhji.pageLoaded["sale_detail"] == undefined) {
                banhji.pageLoaded["sale_detail"] == true;

                vm.sorterChanges();
            }
            banhji.saleDetail.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    banhji.saleDetail.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.saleDetail.set('total', kendo.toString(e.response.total, 'c2'));
                }
            });
            vm.pageLoad();
        }
    });
    banhji.router.route("/fine_collect", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.fineCollect);

            var vm = banhji.fineCollect;
            banhji.userManagement.addMultiTask("Utibill Fine Collect", "fine_collect", null);

            if (banhji.pageLoaded["fine_collect"] == undefined) {
                banhji.pageLoaded["fine_collect"] == true;

                vm.sorterChanges();
            }
            banhji.fineCollect.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    banhji.fineCollect.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.fineCollect.set('total', kendo.toString(e.response.total, 'c2'));
                }
            });
            vm.pageLoad();
        }
    });
    banhji.router.route("/other_revenues", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.otherRevenues);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

            var vm = banhji.otherRevenues;
            banhji.userManagement.addMultiTask("Other Revenues", "other_revenues", null);
            if (banhji.pageLoaded["other_revenues"] == undefined) {
                banhji.pageLoaded["other_revenues"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/account_receivable_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.accountReceivableList);

            var vm = banhji.accountReceivableList;
            banhji.userManagement.addMultiTask("Account Receivable Listing", "account_receivable_list", null);

            if (banhji.pageLoaded["account_receivable_list"] == undefined) {
                banhji.pageLoaded["account_receivable_list"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_aging_sum_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.agingSummary);

            var vm = banhji.agingSummary;
            banhji.userManagement.addMultiTask("Receivable Aging Summary", "customer_aging_sum_list", null);

            if (banhji.pageLoaded["customer_aging_sum_list"] == undefined) {
                banhji.pageLoaded["customer_aging_sum_list"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_deposit_report", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.customerDepositReport);

            var vm = banhji.customerDepositReport;
            banhji.userManagement.addMultiTask("Customer Deposit Report", "customer_deposit_report", null);

            if (banhji.pageLoaded["customer_deposit_report"] == undefined) {
                banhji.pageLoaded["customer_deposit_report"] = true;

                vm.sorterChanges();
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_aging_detail", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.agingDetail);

            var vm = banhji.agingDetail;
            banhji.userManagement.addMultiTask("Customer Aging Detail", "customer_aging_detail", null);

            if (banhji.pageLoaded["receivable_aging_detail"] == undefined) {
                banhji.pageLoaded["receivable_aging_detail"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_balance_summary", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.customerBalanceSummary);

            var vm = banhji.customerBalanceSummary;
            banhji.userManagement.addMultiTask("Customer Balance Summary", "customer_balance_summary", null);

            if (banhji.pageLoaded["customer_balance_summary"] == undefined) {
                banhji.pageLoaded["customer_balance_summary"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_balance_detail", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            var vm = banhji.customerBalanceDetail;
            banhji.userManagement.addMultiTask("Customer Balance Detail", "customer_balance_detail", null);
            banhji.view.layout.showIn("#content", banhji.view.customerBalanceDetail);
            if (banhji.pageLoaded["customer_balance_detail"] == undefined) {
                banhji.pageLoaded["customer_balance_detail"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/cash_receipt_summary", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.cashReceiptSummary);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

            var vm = banhji.cashReceiptSummary;
            banhji.userManagement.addMultiTask("Cash Receipt Summary", "cash_receipt_summary", null);
            if (banhji.pageLoaded["cash_receipt_summary"] == undefined) {
                banhji.pageLoaded["cash_receipt_summary"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/cash_receipt_source_summary", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.cashReceiptSourceSummary);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

            var vm = banhji.cashReceiptSourceSummary;
            banhji.userManagement.addMultiTask("Cash Receipt Source Summary", "cash_receipt_source_summary", null);
            if (banhji.pageLoaded["cash_receipt_source_summary"] == undefined) {
                banhji.pageLoaded["cash_receipt_source_summary"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/cash_receipt_detail", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            var vm = banhji.cashReceiptDetail;
            banhji.userManagement.addMultiTask("Cash Receipt Detail", "cash_receipt_detail", null);
            banhji.view.layout.showIn("#content", banhji.view.cashReceiptDetail);

            if (banhji.pageLoaded["cash_receipt_detail"] == undefined) {
                banhji.pageLoaded["cash_receipt_detail"] = true;

                vm.sorterChanges();
            }
            banhji.cashReceiptDetail.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    banhji.cashReceiptDetail.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.cashReceiptDetail.set('total', kendo.toString(e.response.total, 'c2'));
                    banhji.cashReceiptDetail.set('cashReceipt', kendo.toString(e.response.cashReceipt));
                }
            });
            vm.pageLoad();
        }
    });
    banhji.router.route("/cash_receipt_source_detail", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.cashReceiptSourceDetail);

            var vm = banhji.cashReceiptSourceDetail;
            banhji.userManagement.addMultiTask("Cash Receipt Source Detail", "cash_receipt_source_detail", null);

            if (banhji.pageLoaded["cash_receipt_source_detail"] == undefined) {
                banhji.pageLoaded["cash_receipt_source_detail"] == true;

                vm.sorterChanges();
            }
            banhji.cashReceiptSourceDetail.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    banhji.cashReceiptSourceDetail.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.cashReceiptSourceDetail.set('total', kendo.toString(e.response.total, 'c2'));
                }
            });
            vm.pageLoad();
        }
    });
    banhji.router.route("/cash_auto", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.cashReAuto);

            var vm = banhji.cashReAuto;

            // vm.pageLoad();
        }
    });
    banhji.router.route("/head_meter", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.HeadMeter);
            banhji.HeadMeter.pageLoad();
        }
    });
    banhji.router.route("/add_head_meter(/:id)", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.AddHeadMeter);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
        var vm = banhji.AddHeadMeter;
        banhji.userManagement.addMultiTask("Add Head Meter", "add_head_meter", null);
        if (banhji.pageLoaded["add_head_meter"] == undefined) {
            banhji.pageLoaded["add_head_meter"] = true;
        }
        vm.pageLoad(id);
    });
    

    /*************************
     *   Import Section   *
     **************************/
    banhji.router.route("/imports", function() {
        banhji.view.layout.showIn("#content", banhji.view.imports);
    });
    banhji.router.route("/choeun", function() {
        banhji.view.layout.showIn("#content", banhji.view.choeun);
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