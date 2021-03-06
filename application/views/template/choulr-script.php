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
                filter:{ field: "item_type_id", operator: "where_in", value: [1,4] },
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

    function contactEditor(container, options) {
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
                sort: [
                    { field:"contact_type_id", dir:"asc" },
                    { field:"number", dir:"asc" }
                ],
                batch: true,
                serverFiltering: true,
                serverSorting: true,
                serverPaging: true,
                page: 1,
                pageSize: 20
            }
        });
    }

    function jobEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            filter: "contains",         
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
                transport: {
                    read    : {
                        url: apiUrl + "jobs",
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
                pageSize: 20
            }
        });
    }
</script>
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDHdcKFHr8gdDC_eeCHgd8240VErCHuDAE"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
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
    function requireField(){
        var notificat = $("#ntf1").data("kendoNotification");
            notificat.hide();
            notificat.error(langVM.lang.field_required_message);
    }
    function successSend() {
        var notificat = $("#ntf1").data("kendoNotification");
            notificat.hide();
            notificat.success(langVM.lang.success_message);
    }
    //Source
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
    //DashBoard
    banhji.dashBoard = kendo.observable({
        lang: langVM,
        totalSale: 0,
        totalUsage: 0,
        totalUser: 0,
        totalDeposit: 0,
        avgUsage: 0,
        dataSource: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + 'choulr/dashboard',
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
                banhji.dashBoard.set('totalContract', this.data()[0].contracttotal);
                banhji.dashBoard.set('totalLeaseUnit', this.data()[0].leaseunittotal);
                banhji.dashBoard.set('totalMeter', this.data()[0].metertotal);
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        })
    });
    //Setting
    banhji.Setting = kendo.observable({
        lang: langVM,
        contactTypeName: "",
        contactTypeAbbr: "",
        contactTypeCompany: 0,
        blockCompanyId: 0,
        tabGo: 0,
        depositAccDS: banhji.source.depositAccountDS,
        exAccountDS: banhji.source.tradeDiscountDS,
        tariffAccDS: banhji.source.incomeAccountDS,
        areaDS: dataStore(apiUrl + "choulr/area"),
        areaPOSTDS: dataStore(apiUrl + "choulr/area"),
        brandDS: banhji.source.brandDS,
        planItemDS: dataStore(apiUrl + "plans/items"),
        tariffItemDS: dataStore(apiUrl + "choulr/tariff"),
        txnTemplateDS: dataStore(apiUrl + "transaction_templates"),
        objBloc: null,
        currencyDS: new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: {
                field: "status",
                value: 1
            }
        }),
        propertyDS: dataStore(apiUrl + "choulr/property"),
        branchDS: dataStore(apiUrl + "branches"),
        planDS: dataStore(apiUrl + "plans"),
        contactTypeDS: dataStore(apiUrl + "contacts/type"),
        patternDS: dataStore(apiUrl + "contacts"),
        amenityDS: dataStore(apiUrl + "choulr/amenity"),
        spaceDS: dataStore(apiUrl + "choulr/space"),
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
        currentProperty: "",
        currentAbbr: "",
        addArea: function(e) {
            var self = this;
            if (this.get("areaProperty") && this.get("areaName") && this.get("areaAbbr")) {
                this.areaPOSTDS.data([]);
                this.areaPOSTDS.add({
                    property_id: this.get("areaProperty"),
                    name: this.get("areaName"),
                    abbr: this.get("areaAbbr"),
                    main_location: 0,
                    sub_location: 0
                });
                this.areaPOSTDS.sync();
                this.areaPOSTDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("currentProperty", self.get("areaProperty"));
                        self.set("currentAbbr", self.get("areaAbbr"));

                        self.set("areaName", "");
                        self.set("areaAbbr", "");
                        self.set("areaProperty", "");
                        self.areaDS.fetch();

                    }
                });
                this.areaPOSTDS.bind("error", function(e) {
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
        poleDS: dataStore(apiUrl + "choulr/area"),
        polePOSTDS: dataStore(apiUrl + "choulr/area"),
        blocSelect: false,
        blocNameShow: null,
        poleVisible: false,
        viewPole: function(e) {
            var data = e.data;
            this.set("blocSelect", true);
            this.set("blocNameShow", data.name);
            this.poleDS.filter([{
                    field: "main_location",
                    value: data.id
                },
                {
                    field: "sub_location",
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
                this.polePOSTDS.data([]);
                this.polePOSTDS.add({
                    property_id: this.get("current").property_id,
                    name: this.get("poleName"),
                    abbr: this.get("current").abbr,
                    main_location: this.get("current").id,
                    sub_location: 0
                });
                this.polePOSTDS.sync();
                this.closePoleWin();
                this.polePOSTDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("poleName", "");
                    }
                });
                this.poleDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                    self.showPole();
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.success(self.lang.lang.field_required_message);
            }
        },
        boxDS: dataStore(apiUrl + "choulr/area"),
        poleNameShow: null,
        boxVisible: false,
        poleSelect: false,
        viewBox: function(e) {
            var data = e.data;
            this.set("poleSelect", true);
            this.set("poleNameShow", data.name);
            this.boxDS.filter({
                field: "sub_location",
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
                this.areaPOSTDS.data([]);
                this.areaPOSTDS.add({
                    property_id: this.get("pole").property_id,
                    name: this.get("boxName"),
                    abbr: this.get("pole").abbr,
                    main_location: this.get("pole").main_location,
                    sub_location: this.get("pole").id
                });
                this.areaPOSTDS.sync();
                this.closeBoxWin();
                this.areaPOSTDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("boxName", "");
                    }
                });
                this.areaPOSTDS.bind("error", function(e) {
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.error_message);
                    self.showBox();
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
        choulrTariffItemDS: dataStore(apiUrl + "choulr/tariff_item"),
        saveTariffItem: function(e) {
            var data = e.data.id,
                self = this;
            if (this.get("tariffItemName") && this.get("tariffItemUsage") && this.get("tariffItemAmount")) {
                this.choulrTariffItemDS.data([]);
                this.choulrTariffItemDS.add({
                    name: this.get("tariffItemName"),
                    type: "tariff",
                    tariff_id: this.get('current').id,
                    account: this.get('current').account,
                    is_flat: 0,
                    unit: this.get("tariffItemUnit"),
                    usage: this.get("tariffItemUsage"),
                    amount: this.get("tariffItemAmount"),
                    currency: this.get("current").currency,
                    _currency: []
                });
                this.choulrTariffItemDS.sync();
                this.choulrTariffItemDS.bind("requestEnd", function(e) {
                    console.log(e.type);
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("tariffItemName", "");
                        self.set("tariffItemFlat", 0);
                        self.set("tariffItemUsage", "");
                        self.set("tariffItemAmount", "");
                        self.set("tariffItemUnit", "");
                        self.set("windowTariffItemVisible", false);
                        self.closeTariffWindowItem();
                    }
                });
                this.choulrTariffItemDS.bind("error", function(e) {
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
        utiType: [{
                id: "w",
                name: "Water"
            },
            {
                id: "e",
                name: "Electricity"
            }
        ],
        addTariff: function(e) {
            var self = this;
            if (this.get("tariffName") && this.get("tariffAccount") && this.get("tariffCurrency")) {
                this.tariffItemDS.add({
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
                this.tariffItemDS.sync();
                this.tariffItemDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("tariffName", "");
                        self.set("tariffAccount", "");
                        self.set("tariffCurrency", "");
                        self.set("tariffFlat", "");
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
        closeTariffWindowItem: function() {
            this.set("windowTariffItemVisible", false);
        },
        viewTariffItem: function(e) {
            var data = e.data.id;
            this.set("tariffNameShow", e.data.name);
            this.set("tariffSelect", true);
            this.tariffItemDS.data([]);
            this.tariffItemDS.query({
                filter: {
                    field: "tariff_id",
                    value: data
                },
                sort: {
                    field: "unit",
                    dir: "asc"
                }
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
                    account_id: this.get("depositAccount"),
                    account: {name: ""},
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
                        self.goDeposit();
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
            this.planItemDS.data([]);
            this.planItemDS.filter({
                field: "type",
                value: "service"
            });
        },
        addService: function() {
            var self = this;
            if (this.get("serviceName") && this.get("serviceAccount") && this.get("serviceCurrency") && this.get("servicePrice")) {
                this.planItemDS.add({
                    name: this.get("serviceName"),
                    type: "service",
                    is_flat: false,
                    unit: null,
                    account: this.get("serviceAccount"),
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
                notificat.success(self.lang.lang.field_required_message);
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
                    account_id: this.get("fineAccount"),
                    account: {name: ""},
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
                        self.goFine();
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
        rentTypeDS: [{
                id: "ls",
                name: "Lump Sum"
            },
            {
                id: "m2",
                name: "m2"
            }
        ],
        rentDS: dataStore(apiUrl + "choulr/tariff"),
        goRent: function() {
            this.rentDS.data([]);
            this.rentDS.filter({
                field: "type",
                value: "rent"
            });
        },
        addRent: function() {
            var self = this;
            if (this.get("rentType") && this.get("rentName") && this.get("rentPrice") && this.get("rentAccount")) {
                this.choulrTariffItemDS.data([]);
                this.choulrTariffItemDS.add({
                    name: this.get("rentName"),
                    type: "rent",
                    tariff_id: 0,
                    account_id: this.get("rentAccount"),
                    account: {name: ""},
                    is_flat: 0,
                    unit: this.get("rentType"),
                    usage: 0,
                    amount: this.get("rentPrice"),
                    currency: this.get("rentCurrency")
                });
                this.choulrTariffItemDS.sync();
                this.choulrTariffItemDS.bind("requestEnd", function(e) {
                    if (e.type != 'read' && e.response) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        self.set("rentName", "");
                        self.set("rentPrice", "");
                        self.set("rentAccount", "");
                        self.set("rentCurrency", "");
                        self.set("tariffItemUnit", "");
                        self.set("rentType", "");
                        self.goRent();
                    }
                });
                this.choulrTariffItemDS.bind("error", function(e) {
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
        setWords: function() {
            this.tariffFlatType[0].set("name", this.lang.lang.not_flat);
            this.tariffFlatType[1].set("name", this.lang.lang.flat);
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
            this.areaDS.filter({
                field: "main_location",
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
        cancel: function() {
            // this.licenseDS.cancelChanges();
            banhji.router.navigate("/");
        },
        deleteForm: function(e) {
            var data = e.data;
            if (confirm("Do you want to delete it?") == true) {
                this.txnTemplateDS.remove(data);
                this.txnTemplateDS.sync();
            }
        },
        categoryDS: dataStore(apiUrl + "choulr/category"),
        updateCateDS: dataStore(apiUrl + "choulr/category"),
        addCate: function(){
            var self = this;
            this.updateCateDS.data([]);
            this.updateCateDS.add({
                name: this.get("cateName")
            });
            this.updateCateDS.sync();
            this.updateCateDS.bind("requestEnd", function(e){
                var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(self.lang.lang.success_message);
                self.set("cateName", "");
                self.categoryDS.fetch();
            });
        },
        deleteCate: function(e){
            var data = e.data;
            if(confirm("Do you want to delete it?") == true) {
                this.categoryDS.remove(data);
                this.categoryDS.sync();
            }
        },
        amenityDS: dataStore(apiUrl + "choulr/amenity"),
        updateamenityDS: dataStore(apiUrl + "choulr/amenity"),
        addAmen: function(){
            var self = this;
            if(this.get("amenName")){
                this.updateamenityDS.data([]);
                this.updateamenityDS.add({
                    name: this.get("amenName")
                });
                this.updateamenityDS.sync();
                this.updateamenityDS.bind("requestEnd", function(e){
                    var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                    self.set("amenName", "");
                    self.amenityDS.fetch();
                });
            }
        },
        deleteAmen: function(e){
            var data = e.data;
            if(confirm("Do you want to delete it?") == true) {
                this.amenityDS.remove(data);
                this.amenityDS.sync();
            }
        },
        spaceDS: dataStore(apiUrl + "choulr/space"),
        updatespaceDS: dataStore(apiUrl + "choulr/space"),
        addspace: function(){
            var self = this;
            if(this.get("spaceName")){
                this.updatespaceDS.data([]);
                this.updatespaceDS.add({
                    name: this.get("spaceName")
                });
                this.updatespaceDS.sync();
                this.updatespaceDS.bind("requestEnd", function(e){
                    var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                    self.set("spaceName", "");
                    self.spaceDS.fetch();
                });
            }
        },
        deleteSpace: function(e){
            var data = e.data;
            if(confirm("Do you want to delete it?") == true) {
                this.spaceDS.remove(data);
                this.spaceDS.sync();
            }
        },
    });
    banhji.Property = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "choulr/property"),
        provinceDS: dataStore(apiUrl + "provinces"),
        districtDS: dataStore(apiUrl + "districts"),
        toDay: new Date(),
        obj: null,
        provinceSelect: [],
        attachmentDS: dataStore(apiUrl + "attachments"),
        isEdit: false,
        selectType: [
            {
                id: "1",
                name: "Available"
            },
            {
                id: "2",
                name: "In Contract"
            },
            {
                id: "0",
                name: "Under Constrution"
            }
        ],
        selectCurrency: dataStore(apiUrl + "utibills/currency"),
        selectPropertyType: dataStore(apiUrl + "choulr/property_type"),
        proType: "",
        proCurrency: 1,
        proStatus: 1,
        pageLoad: function(id) {
            if (id) {
                this.loadObj(id);
            }else{
                this.clearForm();
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
        },
        provinceChange: function(pro) {
            this.districtDS.filter({
                field: "province_id",
                value: this.get("proProvinceId")
            });
        },
        loadObj: function(id) {
            var self = this;
            this.dataSource.query({
                filter: {field: "id", value: id},
                pageSize: 1
            }).then(function(e){
                var view = self.dataSource.view();
                self.set("obj", view[0]);
                self.loadMap();
            });
        },
        onSelect: function(e) {
            // Array with information about the uploaded files
            var self = this,
                ufiles = e.files,
                obj = this.get("obj");
            this.attachmentDS.data([]);
            $.each(e.files, function(i, v) {
                console.log(v);
                var files = v;
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
                    var key = 'WLOGO_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) + '_' + files.name;
                    self.attachmentDS.add({
                        user_id: banhji.userData.id,
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
            if (obj.name && obj.type_id && obj.number) {
                this.dataSource.sync();
                this.dataSource.bind("requestEnd", function(e){
                    var notificat = $("#ntf1").data("kendoNotification");
                    notificat.hide();
                    notificat.success(this.lang.lang.success_message);
                });
            } else {
                var notificat = $("#ntf1").data("kendoNotification");
                notificat.hide();
                notificat.error(this.lang.lang.field_required_message);
            }
        },
        clearForm: function(){
            this.set("obj", "");
            this.dataSource.insert(0, {
                type_id         : "",
                number          : "",
                name            : "",
                abbr            : "",
                code            : "",
                currency        : "",
                status          : "",
                latitute        : "",
                longtitute      : "",
                address         : "",
                country_id      : "",
                province_id     : "",
                district_id     : "",
                total_area      : "",
                area_of_servic  : "",
                building_type   : "",
                mobile          : "",
                telephone       : "",
                email           : "",
                area_for_rent   : "",
                common_area     : "",
                near_by         : "",
                terms_condition : "",
                img1            : "",
                img2            : "",
                img3            : "",
                amenity_line : [],
                space_line : [], 
            });
            this.set("obj", this.dataSource.data()[0]);
        },
        save: function(){
            var self = this;
            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                self.cancel();
            });
        },
        cancel: function() {
           window.history.back()
        },
        loadMap: function() {
            var latitute = this.get("obj").latitute;
            var longtitute = this.get("obj").longtitute,
            lat = kendo.parseFloat(latitute),
            lng = kendo.parseFloat(longtitute);
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
        countryDS               : banhji.source.countryDS,
        buildingTypeDS: [
            {id: "wood", type: "Wood"},
            {id: "stone", type: "Stone"},
            {id: "wood&stone", type: "Wood & Stone"}
        ]
    });
    banhji.Plan = kendo.observable({
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

        },
        cancel: function() {
            this.dataSource.data([]);
            banhji.router.navigate("/setting");
        }
    });
    //end Setting
    //Lease Unit
    banhji.leaseUnitCenter = kendo.observable({
        lang                : langVM,
        leaseUnitDS         : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "choulr/lease_unit",
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
                    field: "deleted",
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
            pageSize: 12
        }),
        contractDS          : dataStore(apiUrl + "choulr/contract"),
        pageLoad            : function(id) {
        },
        obj                 : "",
        contractobj         : "",
        selectedRow         : function(e){
            var data = e.data;
            this.set("obj", data);
            if(data.img1){
                this.get("obj").set("img1", data.img1);
            }else{
                this.get("obj").set("img1", "<?php echo base_url();?>/assets/choulr/img/no_image.png");
            }
            if(data.contract_id > 0){
                var self = this;
                this.contractDS.data([]);
                this.contractDS.query({
                    filter: {field: "id", value: data.contract_id},
                    pageSize: 1
                }).then(function(e){
                    var view = self.contractDS.view();
                    if(view.length > 0){
                        self.set("contractobj", view[0]);
                        self.getContactObj(view[0].customer_id);
                    }else{
                        self.set("contractobj", []);
                        self.getContactObj(0);
                    }
                });
            }else{
                this.set("contractobj", []);
                this.set("contactobj", []);
            }
        },
        contactobj          : "",
        contactDS           : dataStore(apiUrl + "contacts"),
        getContactObj       : function(id){
            var self = this;
            this.contactDS.query({
                filter: {field: "id", value: id}
            }).then(function(e){
                var v = self.contactDS.view();
                if(v.length > 0){
                    self.set("contactobj", v[0]);
                }else{
                    self.set("contactobj", []);
                }
            });
        }
    });
    banhji.leaseUnit = kendo.observable({
        lang: langVM,
        luPropertyDS: dataStore(apiUrl + "choulr/property"),
        luStatusList: [{
                id: 1,
                name: "Available"
            },
            {
                id: 0,
                name: "Vacant"
            },
            {
                id: 2,
                name: "Maintenance"
            }
        ],
        luAbbr: null,
        obj: "",
        dataSource: dataStore(apiUrl + "choulr/lease_unit"),
        pageLoad: function(id) {
            if (id) {
                this.loadObj(id);
            } else {
                this.addEmpty();
            }
        },
        loadObj: function(id) {
            var self = this;
            this.dataSource.query({
                filter: {field: "id", value: id},
                pageSize: 1
            }).then(function(e){
                var view = self.dataSource.view();
                self.set("obj", view[0]);
                self.setANS(view[0]);
            });
        },
        setANS: function(v){
            var self = this;
            this.get("obj").set("amenity_line", []);
            if(v.amenity_id.length > 0){
                $.each(v.amenity_id, function(i,v){
                    self.get("obj").get("amenity_line").push(v.amenity_id);
                });
            }
            this.get("obj").set("space_line", []);
            if(view[0].space_id.length > 0){
                $.each(view[0].space_id, function(i,v){
                    self.get("obj").get("space_line").push(v.space_id);
                });
            }
        },
        addEmpty: function() {
            this.set("obj", "");
            this.dataSource.insert(0, {
                property_id : "",
                code        : "",
                abbr        : "",
                name        : "",
                status      : "",
                register_date : "",
                area_id     : "",
                category_id : "",
                zone_id     : "",
                sub_zone_id : "",
                img1        : "",
                img2        : "",
                img3        : "",
                img4        : "",
                img5        : "",
                img6        : "",
                visitor_number: 0,
                amenity_line : [],
                space_line : [],
            });
            this.set("obj", this.dataSource.data()[0]);
        },
        areaDS           : dataStore(apiUrl + "choulr/area"),
        zoneDS           : dataStore(apiUrl + "choulr/area"),
        subZoneDS        : dataStore(apiUrl + "choulr/area"),
        haveProperty            : false,
        haveArea                : false,
        haveZone                : false,
        leaseUnitDS        : dataStore(apiUrl + "choulr/lease_unit"),
        luProperyChanges: function(e) {
            this.get("obj").set("abbr", this.luPropertyDS.data()[e.sender.selectedIndex - 1].abbr);
            var self = this;
            this.leaseUnitDS.query({
                filter: [{
                    field: "property_id",
                    value: this.get("obj").property_id
                }],
                sort: {
                    field: "id",
                    dir: "desc"
                },
                page: 1,
                pageSize: 1
            }).then(function(e) {
                var view = self.leaseUnitDS.view();
                if (view.length > 0) {
                    var NUM = parseInt(view[0].code) + 1;
                    self.get("obj").set("code", NUM);
                } else {
                    self.get("obj").set("code", 1);
                }
            });
            this.areaDS.query({
                filter: [
                    {field: "property_id", value: this.get("obj").property_id},
                    {field: "main_location", value: 0},
                    {field: "sub_location", value: 0}
                ]
            });
            this.set("haveProperty", true);
        },
        areaChange                 : function(e){
            var self = this;
            this.zoneDS.query({
                filter: [
                    {field: "main_location", value: this.get("luArea")},
                    {field: "sub_location", value: 0}
                ]
            }).then(function(e){
                if(self.zoneDS.data().length > 0){
                    self.set("haveArea", true);
                }else{
                    self.set("haveArea", false);
                }
            });
        },
        zoneChange                 : function(e){
            var self = this;
            this.subZoneDS.query({
                filter: [
                    {field: "sub_location", value: this.get("luZone")}
                ]
            }).then(function(e){
                if(self.subZoneDS.data().length > 0){
                    self.set("haveZone", true);
                }else{
                    self.set("haveZone", false);
                }
            });
        },
        checkLeaseUnitDS: dataStore(apiUrl + "choulr/lease_unit"),
        checkExistingNumber: function() {
            var self = this;
            var lastNum = this.get("luNumber");
            if (this.get("luNumber") !== "") {
                this.checkLeaseUnitDS.query({
                    filter: [{
                            field: "property_id",
                            value: this.get("luProperty")
                        },
                        {
                            field: "number",
                            value: this.get("luNumber")
                        }
                    ],
                    sort: {
                        field: "id",
                        dir: "desc"
                    },
                    page: 1,
                    pageSize: 1
                }).then(function(e) {
                    var view = self.checkLeaseUnitDS.view();

                    if (view.length > 0) {
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.error("Number Duplicate");
                        self.set("luNumber", lastNum);
                    }
                });
            }
        },
        categoryDS                  : dataStore(apiUrl + "choulr/category"),
        amenityitems                : [],
        amenityDS                   : dataStore(apiUrl + "choulr/amenity"),
        spaceitems                  : [],
        spaceDS                     : dataStore(apiUrl + "choulr/space"),
        saveUnitDS: dataStore(apiUrl + "choulr/lease_unit"),
        save                   : function(){
            var self = this;
            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.response.type != "read"){
                    successSend();
                    self.cancel();
                }
            });
        },
        cancel  : function(){
            banhji.router.navigate("/");
        }
    });
    //Utility
    banhji.utilityCenter = kendo.observable({
        lang: langVM,
        meterListDS: dataStore(apiUrl + "choulr/choulrmeter"),
        dataSource: dataStore(apiUrl + "choulr/readings"),
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
        meterRecordDS: dataStore(apiUrl + "choulr/record"),
        pageLoad: function() {
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
                                            value: 0
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
            var self = this;
            if (this.meterRecordDS.data().length > 0) {
                this.rows.push({
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
                $.each(this.meterRecordDS.data(),function(i,v){
                    self.rows.push({
                        cells: [
                            {
                                value: v.meter_number
                            },
                            {
                                value: v.from_date
                            },
                            {
                                value: v.to_date
                            },
                            {
                                value: v.month_of
                            },
                            {
                                value: v.current
                            },
                            {
                                value: 0
                            },
                            {
                                value: ""
                            }
                        ]
                    });
                });
            }
            var workbook = new kendo.ooxml.Workbook({
                sheets: [{
                    columns: [
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
                fileName: "[Reading-" + "<?php echo date('Y-m-d'); ?>" + "].xlsx"
            });
        },
        MonthTo: false,
        errorShow: false,
        existShow: false,
        fullCorrect: false,
        Uploaderror: dataStore(apiUrl + "choulr/blank"),
        ExistRUpload: dataStore(apiUrl + "choulr/blank"),
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
            this.Uploaderror.data([]);
            this.ExistRUpload.data([]);
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
                            if(self.existReading.data().length > 0){
                                for (var j = 0; j < self.existReading.data().length; j++) {
                                    if (roa[i].meter_number == self.existReading.data()[j].meter_number) {
                                        self.ExistRUpload.add({
                                            line: j + 1,
                                            meter_number: roa[i].meter_number,
                                            previous: roa[i].previous,
                                            current: roa[i].current,
                                            status: 0
                                        });
                                    }
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
                                    self.Uploaderror.add({
                                        line: i + 2,
                                        meter_number: roa[i].meter_number,
                                        previous: roa[i].previous,
                                        current: roa[i].current,
                                        status: 0
                                    });
                                }
                            }
                            self.dataSource.add(roa[i]);
                            $("#loadImport").css("display", "none");
                        }
                    }
                });
                if (self.Uploaderror.data().length > 0) {
                    self.set("errorShow", true);
                } else {
                    self.set("errorShow", false);
                }
                if (self.ExistRUpload.data().length > 0) {
                    self.set("existShow", true);
                } else {
                    self.set("existShow", false);
                }
                if (self.Uploaderror.data().length > 0 || self.ExistRUpload.data().length > 0) {
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
            if (this.dataSource.data().length > 0) {
                $("#loadImport").css("display", "block");
                this.dataSource.sync();
                this.dataSource.bind("requestEnd", function(e) {
                    if (e.type != 'read') {
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
                this.dataSource.bind("error", function(e) {
                    dfd.reject(e);
                });
            }
            return dfd.promise();
        },
        cancel: function() {
            this.dataSource.data([]);
            this.uploadDS.data([]);
        }
    });
    banhji.Meter = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "choulr/choulrmeter"),
        selectType: [
            {id: 1, name:"Active"},
            {id: 0, name:"Inactive"},
        ],
        typeAR:[
            {id: "w",name: "Water"},
            {id: "e",name: "Electricity"},
        ],
        tariffDS: dataStore(apiUrl + "choulr/tariff_main"),
        pageLoad: function(id) {
            if (id) {
                this.loadObj(id);
               
            } else {
                this.clearform();
            }
        },
        loadObj: function(id) {
            var self = this;
            this.dataSource.query({
                filter: {field: "id", value: id},
                pageSize: 1
            }).then(function(e){
                var view = self.dataSource.view();
                self.set("obj", view[0]);
                self.loadMap();
            });
        },
        existMeterDS: dataStore(apiUrl + "choulr/choulrmeter"),
        meterNumberChange: function(){
            var meterNum = this.get("obj").number;
            var self = this;
            this.existMeterDS.query({
                filter: {field: "number", value: meterNum},
                pageSize: 1
            }).then(function(e){
                if(self.existMeterDS.data().length > 0){
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.error(self.lang.lang.error_message);
                    self.get("obj").set("number", "");
                }
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
        clearform: function(){
            this.dataSource.data([]);
            this.set("obj", "");
            this.dataSource.insert(0, {
                type        : "w",
                multiplier  : 1,
                number      : "",
                number_digit : 4,
                tariff_id   : "",
                starting_number : 0,
                status      : 1,
                register_date : "<?php echo date('Y-m-d'); ?>",
                order       : "",
                latitute    : "",
                longtitute  : "",
                contract_id : "",
            });
            this.set("obj", this.dataSource.data()[0]);
        },
        save: function(){
            var self = this;
            $("#loadImport").css("display", "block");
            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.type != "read"){
                    $("#loadImport").css("display", "none");
                    var notifi = $("#ntf1").data("kendoNotification");
                    notifi.hide();
                    notifi.success(self.lang.lang.success_message);
                    self.cancel();
                }
            });
        },
        cancel: function() {
            this.clearform();
            banhji.utilityCenter.meterListDS.query();
            window.history.back();
        },
    });
    //Contract
    banhji.Contract = kendo.observable({
        lang                : langVM,
        lineDS              : dataStore(apiUrl + "item_lines"),
        assemblyLineDS      : dataStore(apiUrl + "item_lines"),
        txnDS               : dataStore(apiUrl + "transactions"),
        balanceDS           : dataStore(apiUrl + "transactions/balance"),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "item_lines"),
        referenceDS         : dataStore(apiUrl + "transactions"),
        referenceLineDS     : dataStore(apiUrl + "item_lines"),
        depositDS           : dataStore(apiUrl + "transactions"),
        wacDS               : dataStore(apiUrl + "items/weighted_average_costing"),
        itemPriceDS         : dataStore(apiUrl + "item_prices"),
        assemblyDS          : dataStore(apiUrl + "item_assemblies"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        segmentDS           : dataStore(apiUrl + "segments"),
        segItemDS           : dataStore(apiUrl + "segments/item"),
        segmentItemDS       : dataStore(apiUrl + "segments/item"),
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
        discountAccountDS   : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: { field:"id", value: 72 },
            sort: { field:"number", dir:"asc" }
        }),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{
                logic: "or",
                filters: [
                    { field: "type", value: "Commercial_Invoice" },
                    { field: "type", value: "Vat_Invoice" },
                    { field: "type", value: "Invoice" }
                ]
            }
        }),
        jobDS               : new kendo.data.DataSource({
            data: banhji.source.jobList,
            sort: { field: "name", dir: "asc" }
        }),
        contactDS           : banhji.source.customerDS,
        employeeDS          : banhji.source.employeeDS,
        statusObj           : banhji.source.statusObj,
        paymentTermDS       : banhji.source.paymentTermDS,
        paymentMethodDS     : banhji.source.paymentMethodDS,
        amtDueColor         : banhji.source.amtDueColor,
        confirmMessage      : banhji.source.confirmMessage,
        frequencyList       : banhji.source.frequencyList,
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
        savePrint           : false,
        saveRecurring       : false,
        showConfirm         : false,
        notDuplicateNumber  : true,
        recurring           : "",
        recurring_validate  : false,
        reference_id        : 0,
        balance             : 0,
        total_deposit       : 0,
        total               : 0,
        amount_due          : 0,
        segment_id          : "",
        segmentitem_id      : "",
        user_id             : banhji.source.user_id,
        loadData            : function(){
            this.setRate();
            this.setTerm();
            this.loadBalance();
            this.loadDeposit();
            this.loadReference();
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

            //Deposits on Edit Mode
            if(this.get("isEdit")){
                this.depositDS.filter([
                    { field:"type", value:"Customer_Deposit" },
                    { field:"reference_id", value:obj.id }
                ]);
            }

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
        addDeposit          : function(id){
            var obj = this.get("obj");
            
            this.depositDS.data([]);

            if(obj.deposit>0){
                this.depositDS.add({
                    contact_id          : obj.contact_id,
                    reference_id        : id,
                    user_id             : this.get("user_id"),
                    type                : "Customer_Deposit",
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
                obj.set("discount_account_id", contact.trade_discount_id);
                obj.set("payment_term_id", contact.payment_term_id);
                obj.set("payment_method_id", contact.payment_method_id);
                obj.set("locale", contact.locale);
                obj.set("bill_to", contact.bill_to);
                obj.set("ship_to", contact.ship_to);
                obj.set("note", contact.invoice_note);

                this.loadData();
                this.jobDS.filter({ field:"contact_id", value: contact.id });
            }
            
            this.changes();
        },
        employeeChanges     : function(){
            var obj = this.get("obj");

            if(obj.employee){
                var employee = obj.employee;
                
                obj.set("employee_id", employee.id);
            }else{
                obj.set("employee_id", 0);
            }
        },
        loadBalance         : function(){
            var self = this, obj = this.get("obj");

            this.balanceDS.query({
                filter:[
                    { field:"contact_id", value:obj.contact_id },
                    { field:"type", operator:"where_in", value:["Commercial_Invoice", "Vat_Invoice", "Invoice"] }
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

            //Assembly Lines
            $.each(this.assemblyLineDS.data(), function(index, value){
                var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
                value.set("rate", itemRate);
            });

            //Deposit
            $.each(this.depositDS.data(), function(index, value){
                var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
                value.set("rate", itemRate);
            });
        },
        //Payment Term
        setTerm             : function(){
            var duedate = new Date(), obj = this.get("obj");

            if(obj.payment_term_id>0){
                var term = this.paymentTermDS.get(obj.payment_term_id);

                duedate.setDate(duedate.getDate() + term.net_due);

                obj.set("due_date", duedate);
            }else{
                obj.set("due_date", new Date());
            }
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
                row.set("description", item.sale_description);
                row.set("rate", rate);
                row.set("locale", item.locale);

                var measurement = { 
                    measurement_id  : item.measurement_id,
                    price           : kendo.parseFloat(item.price * rate),
                    conversion_ratio: 1, 
                    measurement     : item.measurement.name 
                };
                row.set("measurement", measurement);

                this.assemblyDS.query({
                    filter:{ field:"assembly_id", value:row.item_id }
                }).then(function(){
                    var view = self.assemblyDS.view();

                    $.each(view, function(index, value){
                        var itemAssembly = value.item, 
                            itemAssemblyRate = obj.rate / banhji.source.getRate(itemAssembly.locale, new Date(obj.issued_date));

                        self.assemblyLineDS.add({
                            transaction_id      : obj.id,
                            item_id             : value.item_id,
                            assembly_id         : value.assembly_id,
                            measurement_id      : value.measurement_id,
                            description         : itemAssembly.sale_description,
                            quantity            : value.quantity,
                            conversion_ratio    : value.conversion_ratio,
                            cost                : value.cost,
                            rate                : itemAssemblyRate,
                            locale              : itemAssembly.locale,
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

            //Apply Deposit
            if(obj.deposit>0){
                if(obj.deposit <= this.get("total_deposit")){
                    if(obj.deposit <= total){
                        remaining = total - obj.deposit;
                    }else{
                        obj.set("deposit", total);
                    }
                }else{
                    obj.set("deposit", 0);
                    alert("Over deposit to apply!");
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
            obj.set("remaining", remaining);

            this.set("total", kendo.toString(total, "c", obj.locale));
            this.set("amount_due", kendo.toString(amount_due, "c", obj.locale));
            
            //Remove Assembly Item List
            var raw = this.assemblyLineDS.data();
            var item, i;
            for(i=raw.length-1; i>=0; i--){
                item = raw[i];

                if (jQuery.inArray(kendo.parseInt(item.assembly_id), itemIds)==-1) {
                    this.assemblyLineDS.remove(item);
                }
            }

            //Check invoice paid
            if(obj.status=="1" && this.lineDS.hasChanges()){
                this.lineDS.cancelChanges();

                $("#ntf1").data("kendoNotification").warning(banhji.source.noChangeInvoicePaidMessage);
            }
        },
        lineDSChanges       : function(arg){
            var self = banhji.Contract;

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

                    // self.addExtraRow(dataRow.uid);
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
        typeChanges         : function(){
            var obj = this.get("obj");

            $.each(this.txnTemplateDS.data(), function(index, value){
                if(value.type==obj.type){
                    obj.set("transaction_template_id", value.id);

                    return false;
                }
            });
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
                        filter:[
                            { field:"reference_id", value: obj.id },
                            { field:"type", operator:"where_in", value: ["Cash_Receipt", "Offset_Invoice"] }
                        ],
                        sort: { field:"issued_date", dir:"desc" },
                        page:1,
                        pageSize:1
                    }).then(function(){
                        var view = self.txnDS.view();

                        if(view.length>0){
                            statusObj.set("date", kendo.toString(new Date(view[0].issued_date), "dd-MM-yyyy h:mm:ss tt"));
                            statusObj.set("number", view[0].number);
                            
                            if(view[0].type=="Cash_Receipt"){
                                var url = "#/" + view[0].type.toLowerCase() + "/" + view[0].id;
                                statusObj.set("url", url);
                            }
                        }
                    });
                    break;
                case 2:
                    statusObj.set("text", "partialy paid");
                    break;
                case 3:
                    statusObj.set("text", "return");
                    break;
                case 4:
                    statusObj.set("text", "draft");
                    break;
                default:
                    //Default here
            }
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
                discount_percentage : 0,
                tax                 : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                movement            : -1,
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
        removeRow           : function(e){
            var data = e.data;
            if(this.lineDS.total()>1){
                this.lineDS.remove(data);
                this.changes();
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
        clear               : function(){
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();
            this.assemblyLineDS.cancelChanges();
            this.segmentItemDS.cancelChanges();
            this.attachmentDS.cancelChanges();
            this.referenceDS.cancelChanges();
            
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.assemblyLineDS.data([]);
            this.segmentItemDS.data([]);
            this.attachmentDS.data([]);
            this.referenceDS.data([]);

            banhji.userManagement.removeMultiTask("invoice");
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
        validating          : function(){
            var result = true, nonItem = true;

            //Check select non item
            $.each(this.lineDS.data(), function(index, value){
                if(value.item_id>0){
                    nonItem = false;
                }
            });
            
            if(nonItem){
                $("#ntf1").data("kendoNotification").error("Please select at least one item!");

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
                                transaction_id      : transaction_id,
                                account_id          : cogsID,
                                contact_id          : obj.contact_id,
                                description         : value.description,
                                reference_no        : "",
                                segments            : obj.segments,
                                dr                  : cogsAmount * value.rate,
                                cr                  : 0,
                                rate                : value.rate,
                                locale              : item.locale
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
                            transaction_id      : transaction_id,
                            account_id          : inventoryID,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : 0,
                            cr                  : inventoryAmount * value.rate,
                            rate                : value.rate,
                            locale              : item.locale
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
                            transaction_id      : transaction_id,
                            account_id          : incomeID,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : 0,
                            cr                  : saleAmount,
                            rate                : obj.rate,
                            locale              : obj.locale
                        };
                    }else{
                        entries[raw].cr += saleAmount;
                    }
                }

                //Tax on Cr
                if(value.tax_item_id>0){
                    var taxItem = value.tax_item,
                        raw = "cr"+taxItem.account_id;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : taxItem.account_id,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : 0,
                            cr                  : value.tax,
                            rate                : obj.rate,
                            locale              : obj.locale
                        };
                    }else{
                        entries[raw].cr += value.tax;
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
                                transaction_id      : transaction_id,
                                account_id          : cogsID,
                                contact_id          : obj.contact_id,
                                description         : value.description,
                                reference_no        : "",
                                segments            : obj.segments,
                                dr                  : cogsAmount * value.rate,
                                cr                  : 0,
                                rate                : value.rate,
                                locale              : item.locale
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
                            transaction_id      : transaction_id,
                            account_id          : inventoryID,
                            contact_id          : obj.contact_id,
                            description         : value.description,
                            reference_no        : "",
                            segments            : obj.segments,
                            dr                  : 0,
                            cr                  : inventoryAmount * value.rate,
                            rate                : value.rate,
                            locale              : item.locale
                        };
                    }else{
                        entries[raw].cr += inventoryAmount;
                    }
                }
            });

            // A/R on Dr
            var arID = kendo.parseInt(contact.account_id);
            if(arID>0){
                raw = "dr"+arID;

                var arAmount = obj.amount - obj.deposit;
                if(entries[raw]===undefined){
                    entries[raw] = {
                        transaction_id      : transaction_id,
                        account_id          : arID,
                        contact_id          : obj.contact_id,
                        description         : obj.memo,
                        reference_no        : obj.reference_no,
                        segments            : obj.segments,
                        dr                  : arAmount,
                        cr                  : 0,
                        rate                : obj.rate,
                        locale              : obj.locale
                    };
                }else{
                    entries[raw].dr += arAmount;
                }
            }

            //Discount on Dr            
            if(obj.discount > 0){
                var discountAccountId = kendo.parseInt(obj.discount_account_id);
                if(discountAccountId>0){
                    raw = "dr"+discountAccountId;

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id      : transaction_id,
                            account_id          : discountAccountId,
                            contact_id          : obj.contact_id,
                            description         : obj.memo,
                            reference_no        : obj.reference_no,
                            segments            : obj.segments,
                            dr                  : obj.discount,
                            cr                  : 0,
                            rate                : obj.rate,
                            locale              : obj.locale
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
                            transaction_id      : transaction_id,
                            account_id          : depositAccountId,
                            contact_id          : obj.contact_id,
                            description         : obj.memo,
                            reference_no        : obj.reference_no,
                            segments            : obj.segments,
                            dr                  : obj.deposit,
                            cr                  : 0,
                            rate                : obj.rate,
                            locale              : obj.locale
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
        //Reference
        loadReference       : function(){
            var self = this, obj = this.get("obj");

            if(obj.contact_id>0){
                this.referenceDS.filter([
                    { field: "contact_id", value: obj.contact_id },
                    { field: "type", operator:"where_in", value:["Sale_Order", "Quote", "GDN"] },
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

                //Segment
                // var segments = [];
                // $.each(reference.segments, function(index, value){
                //  segments.push(value);
                // });
                // if(segments.length>0){
                //  this.segmentItemDS.filter({ field: "id", operator:"where_in", value: segments });
                // }

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
                            price               : value.price,
                            amount              : value.amount,
                            discount            : value.discount,
                            rate                : value.rate,
                            locale              : value.locale,
                            movement            : -1,
                            reference_no        : reference.number,

                            item                : value.item,
                            measurement         : value.measurement,
                            tax_item            : value.tax_item
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
                
                obj.set("contact", view[0].contact);
                obj.set("contact_id", view[0].contact.id);
                obj.set("recurring_id", id);
                obj.set("payment_term_id", view[0].payment_term_id);
                obj.set("payment_method_id", view[0].payment_method_id);
                obj.set("employee_id", view[0].employee_id);//Sale Rep
                obj.set("job_id", view[0].job_id);
                obj.set("segments", view[0].segments);
                obj.set("locale", view[0].locale);
                obj.set("memo", view[0].memo);
                obj.set("note", view[0].note);
                obj.set("bill_to", view[0].bill_to);
                obj.set("ship_to", view[0].ship_to);

                // self.setContact(view[0].contact);
            });

            this.recurringLineDS.query({
                filter:[
                    { field: "transaction_id", value: id },
                    { field: "assembly_id", value: 0 }
                ]
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
                        price               : value.price,
                        amount              : value.amount,
                        discount            : value.discount,
                        rate                : value.rate,
                        locale              : value.locale,
                        movement            : -1,

                        item                : value.item,
                        measurement         : value.measurement,
                        tax_item            : value.tax_item
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
        },
        dataSource          : dataStore(apiUrl + "choulr/contract"),
        otherChargeAR       : [],
        contactDS           : dataStore(apiUrl + "contacts"),
        rentDS              : dataStore(apiUrl + "choulr/tariff"),
        eleMeterDS          : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "choulr/choulrmeter",
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
                    field: "type",
                    value: "e"
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
        waterMeterDS        : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "choulr/choulrmeter",
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
                    field: "type",
                    value: "w"
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
        leaseunitDS         : dataStore(apiUrl + "choulr/lease_unit_name"),
        rentDS              : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "choulr/tariff",
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
                    field: "type",
                    value: "rent"
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
        contractDepositDS   : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "choulr/tariff",
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
                    field: "type",
                    value: "deposit"
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
        fineDS              : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "choulr/tariff",
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
                    field: "type",
                    value: "fine"
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
        isEdit              : false,
        showConfirm         : false,
        pageLoad            : function(id) {
            if (id) {
                this.loadObj(id);
                this.set("isEdit", true);
            } else {
                this.addEmpty();
                this.eleMeterDS.filter([
                    {field: "contract_id", value: 0},
                    {field: "type", value: "e"}
                ]);
                this.waterMeterDS.filter([
                    {field: "contract_id", value: 0},
                    {field: "type", value: "w"}
                ]);
                this.leaseunitDS.filter({field: "contract_id", value: 0});
                this.set("isEdit", false);
            }
        },
        onLeaseUnitChange   : function(e){
            var inx = e.sender.selectedIndex;
            this.get("obj").set("property_id", this.leaseunitDS.data()[inx -1].property_id);
        },
        openConfirm         : function(){
            this.set("showConfirm", true);
        },
        qItemDS             : dataStore(apiUrl + "items"),
        loadObj             :  function(id) {
            var self = this;
            this.dataSource.query({
                filter: {field: "id",value: id},
                pageSize: 1
            }).then(function(e){
                var view = self.dataSource.view();
                self.set("obj", view[0]);
                if(view[0].rent_ar.length > 0){
                    $.each(view[0].rent_ar, function(i,v){
                        self.rentAR.push(v);
                    });
                }
                if(view[0].item_ar.length > 0){
                    $.each(view[0].item_ar, function(i,v){
                        self.qItemDS.data([]);
                        self.qItemDS.query({
                            filter: {field: "id", value: v.item_id}
                        }).then(function(e){
                            var it = self.qItemDS.view();
                            self.lineDS.add({
                                transaction_id      : "",
                                tax_item_id         : 0,
                                item_id             : 0,
                                assembly_id         : 0,
                                measurement_id      : 0,
                                description         : v.description,
                                quantity            : v.quantity,
                                conversion_ratio    : 1,
                                cost                : 0,
                                price               : v.price,
                                amount              : 0,
                                discount            : 0,
                                discount_percentage : 0,
                                tax                 : 0,
                                rate                : 1,
                                locale              : it[0].locale,
                                movement            : -1,
                                reference_no        : "",
                                item                : { id: it[0].id, name: it[0].name },
                                measurement         : { 
                                    measurement_id: it[0].measurement_id, 
                                    measurement: it[0].measurement.measurement },
                                tax_item            : { id:"", name:"" }
                            });
                        });
                    });
                }
                if(view[0].deposit_items.length > 0){
                    self.depositAR.splice(0, self.depositAR.length);
                    $.each(view[0].deposit_items, function(i,d){
                        self.depositAR.push({
                            id      : d.id,
                            name    : d.name,
                            amount  : d.amount,
                            locale  : d.locale,
                        });
                    })
                }
                self.changes();
            });
        },
        addEmpty            : function() {
            this.set("obj", "");
            this.dataSource.insert(0, {
                name                    : "",
                customer_id             : "",
                water_meter_id          : "",
                electrictiy_meter_id    : "",
                lease_unit_id           : "",
                rent_price_id           : "",
                memo                    : "",
                issued_date             : new Date(),
                end_date                : new Date(),
                start_date              : new Date(),
            });
            this.set("obj", this.dataSource.data()[0]);
        },
        depositAR           : [],
        depositChange       : function(e){
            var idx = e.sender.selectedIndex -1;
            var rent = this.contractDepositDS.data()[idx];
            var id = this.get("obj").deposit_id;
            var h = 0;
            $.each(this.depositAR, function(i,v){
                if(v.id == id){
                    h = 1;
                }
            });
            if(h != 1){
                this.depositAR.push({
                    id: rent.id,
                    name: rent.name,
                    amount: rent.amount,
                    locale: rent._currency.locale,
                });
                h = 0;
            }
            this.get("obj").set("deposit_id", 0);
        },
        rmDeposit           : function(e){
            var data = e.data;
            if(this.depositAR.length>1){
                this.depositAR.remove(data);
            }
        },
        conditionAR         : [
            {id: "monthly", name: "Monthly"},
            {id: "onetime", name: "One Time Only"}
        ],
        addOtherCharge      : function(){
            var amount = parseInt(this.get("ocQTY")) * parseFloat(this.get("ocPrice"));
            this.otherChargeAR.push({
                name: this.get("ocName"),
                price: this.get("ocPrice"),
                quantity: this.get("ocQTY"),
                amount: amount,
                condition: this.get("ocCondition"),
            });
        },
        save                :function(){
            $("#loadImport").css("display", "block");
            var self = this;
            var obj = this.get("obj");
            if(obj.customer_id && obj.issued_date && obj.lease_unit_id && obj.name){
                if(this.rentAR.length > 0){
                    this.dataSource.data()[0].set("rent_items", this.rentAR);
                    if(this.depositAR.length > 0){
                        this.dataSource.data()[0].set("deposit_items", this.depositAR);
                    }
                    if(this.lineDS.data().length > 0){
                        var lineAR = [];
                        $.each(this.lineDS.data(), function(i,v){
                            lineAR.push(v);
                        });
                        this.dataSource.data()[0].set("service_items", lineAR);
                    }
                    this.dataSource.sync();
                    this.dataSource.bind("requestEnd", function(e){
                        if(e.type != "read"){
                            $("#loadImport").css("display", "none");
                            successSend();
                            banhji.contractCenter.contractDS.query();
                            self.cancel();
                        }
                    });
                }else{
                    requireField();
                    $("#loadImport").css("display", "none");
                }
            }else{
                requireField();
                $("#loadImport").css("display", "none");
            }
        },
        delete              : function(){
            var self = this, obj = this.get("obj");
            this.set("showConfirm",false);
            obj.set("deleted", 1);

            this.dataSource.sync();
            this.dataSource.bind("requestEnd", function(e){
                if(e.type==="update"){
                    var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                        banhji.contractCenter.contractDS.query();
                    self.cancel();
                }
            });
        },
        rentAR              : [],
        priceChange         : function(e){
            var idx = e.sender.selectedIndex -1;
            var rent = this.rentDS.data()[idx];
            var id = this.get("obj").rent_price_id;
            var h = 0;
            $.each(this.rentAR, function(i,v){
                if(v.id == id){
                    h = 1;
                }
            });
            if(h != 1){
                this.rentAR.push({
                    id: rent.id,
                    name: rent.name,
                    price: rent.amount,
                    _currency: rent._currency,
                });
                h = 0;
            }
            this.get("obj").set("rent_price_id", 0);
        },
        rmRent              : function(e){
            var data = e.data;
            if(this.rentAR.length>1){
                this.rentAR.remove(data);
            }
        },
        cancel              : function(){
            this.addEmpty();
            window.history.back();
        },
    });
    banhji.contractCenter = kendo.observable({
        lang                : langVM,
        contractDS         : dataStore(apiUrl + "choulr/contract"),
        pageLoad            : function() {
        },
        rentAR              : [],
        selectedRow         : function(e){
            var data = e.data;
            this.set("obj", data);
            var self = this;
            this.rentAR.splice(0, this.rentAR.length);
            $.each(data.rent_ar, function(i,v){
                self.rentAR.push(v);
            });
        },
    });
    //Customer
    banhji.customerCenter = kendo.observable({
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
    banhji.customer = kendo.observable({
        lang                    : langVM,
        dataSource              : dataStore(apiUrl + "contacts"),
        attachmentDS            : dataStore(apiUrl + "attachments"),
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
        taxItemDS               : new kendo.data.DataSource({
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

                var key = 'ITEM_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ files.name;

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
                "gender"                : "M",
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
                "dob"                   : "",
                "registered_date"       : new Date(),
                "account_id"            : 0,
                "ra_id"                 : 0,
                "tax_item_id"           : 0,
                "deposit_account_id"    : 0,
                "trade_discount_id"     : 0,
                "settlement_discount_id": 0,
                "is_pattern"            : 0,
                "status"                : 1,
                "image_url"             : banhji.no_image,
                
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

            //Attachment
            if(this.attachmentDS.total()>0){
                var att = this.attachmentDS.at(0);
                obj.set("image_url", att.url);
            }

            //Save Obj
            this.objSync()
            .then(function(data){ //Success
                if(self.get("isEdit")==false){
                    //Contact Person
                    $.each(self.contactPersonDS.data(), function(index, value) {
                        value.set("contact_id", data[0].id);
                    });

                    //Attachment
                    $.each(self.attachmentDS.data(), function(index, value){
                        value.set("item_id", data[0].id);
                    });
                }
                self.contactPersonDS.sync();
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
    //Bill
    banhji.runBill = kendo.observable({
        lang: langVM,
        propertyDS: dataStore(apiUrl + "choulr/property"),
        invoiceDS: dataStore(apiUrl + "choulr/rawinvoice"),
        invoiceCollection: dataStore(apiUrl + "choulr/makeinvoice"),
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
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{
                logic: "or",
                filters: [
                    { field: "type", value: "Commercial_Invoice" },
                ]
            }
        }),
        pageLoad: function() {},
        invoiceArray: [],
        checkAll: function(e) {
            var self = this;
            this.invoiceArray =[];
            this.temGroupArray = [];
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
        search: function() {
            var monthOfSearch = this.get("monthSelect");
            var self = this;
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
                if (this.get("propertySelect")) {
                    para.push({
                        field: "property_id",
                        value: this.get("propertySelect")
                    });
                    this.invoiceDS.query({
                        filter: para
                    });
                    this.invoiceDS.bind("requestEnd", function(e){
                        self.calWithLocale();
                    });
                }
            } else {
                alert("Please Select Month Of");
            }
        },
        calWithLocale: function(){
            var self = this;
            $.each(this.invoiceDS.data(), function(i,v){
                var rate = banhji.source.getRate(v.rent_locale, new Date());
                console.log(v.rent_locale);
            });
        },
        makeInvoice: function(e) {
            var that = this;
            if (e.data.invoiced) {
                this.invoiceArray.push(e.data);
            } else {
                $.each(this.invoiceArray, function(i, v) {
                    if (e.data == v) {
                        that.invoiceArray.splice(i, 1);
                        return false;
                    }
                });
            }
            if (this.invoiceArray.length > 0) {
                this.set('showButton', true);
            } else {
                this.set('showButton', false);
            }
            this.makeBilled();
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
            this.set('totalOfInv', this.invoiceArray.length);
            $.each(this.invoiceArray, function(i, v) {
                var date = new Date();
                var rate = banhji.source.getRate(v.locale, date);
                var locale = v.locale;
                var invoiceItems = [];
                var enwTotal = v.eusage_total + v.wusage_total;
                mSold += enwTotal;
                //water
                if(v.wprice > 0) {
                    invoiceItems.push({
                        "item_id": v.water_meter_record.id, //Meter Record ID
                        "rate": v.water_ar.rate,
                        "name": v.water_meter_record.meter_number,
                        "price": v.water_ar.price,
                        "amount": v.water_ar.amount,
                        "locale": v.water_ar.locale,
                        "usage": v.wusage_total,
                        "type": "water_meter"
                    });
                }
                //electric
                if(v.eprice > 0) {
                    invoiceItems.push({
                        "item_id": v.ele_meter_record.id, //Meter Record ID
                        "rate": v.ele_ar.rate,
                        "name": v.ele_meter_record.meter_number,
                        "price": v.ele_ar.price,
                        "amount": v.ele_ar.amount,
                        "locale": v.ele_ar.locale,
                        "usage": v.eusage_total,
                        "type": "electricity_meter"
                    });
                }
                //Item
                if(v.item_ar.length > 0){
                    $.each(v.item_ar, function(l,m){
                        if(v.price > 0){
                            invoiceItems.push({
                                "item_id": m.item_id, //Meter Record ID
                                "rate": v.rate,
                                "name": m.description,
                                "price": m.price,
                                "amount": m.amount,
                                "locale": v.locale,
                                "usage": m.quantity,
                                "type": "item"
                            });
                        }
                    });
                }
                //price rent
                if(v.rent_ar.length > 0) {
                    $.each(v.rent_ar, function(j,k){
                        invoiceItems.push({
                            "item_id": k.id,
                            "rate": k.rate,
                            "name": k.name,
                            "price": 0,
                            "amount": k.amount,
                            "locale": k.locale,
                            "usage": 0,
                            "type": "rent"
                        });
                    });
                }
                var Total = v.total;
                //Roundup
                if(v.locale == "km-KH"){
                    var ATotal = Math.ceil(Total/100)*100;
                    MTotal = ATotal - Total;
                    if(MTotal > 0){
                        invoiceItems.push({
                            "item_id": 0,
                            "rate": v.rate,
                            "name": "ទឹកប្រាក់បូកបង្គ្រប់",
                            "price": 0,
                            "amount": MTotal,
                            "locale": v.locale,
                            "usage": 0,
                            "type": "roundup"
                        });
                    }
                }                
                aSold += Total;
                aSoldL = kendo.toString(aSold, banhji.institute.locale == "km-KH" ? "c0" : "c", banhji.institute.locale);
                //set INV
                self.calInvoice(Total, v.contact_id, invoiceItems, v.lease_unit.location_id, v.lease_unit.pole_id, v.lease_unit.box_id, v.id, locale, v.lease_unit.property_id, v.id);
            });
            this.set("amountSold", aSoldL);
            this.set("meterSold", mSold);
        },
        calInvoice: function(Total, Contact, invoiceItems, Location, Pole, Box, ID, Locale, PropertyID, ContractID) {
            var self = this;
            var date = new Date();
            var rate = banhji.source.getRate(Locale, date);
            var locale = Locale;
            var MonthOf = kendo.toString(new Date(this.get("FmonthSelect")), "s");
            var IssueDate = kendo.toString(new Date(this.get("IssueDate")), "s");
            var BillingDate = kendo.toString(new Date(this.get("BillingDate")), "s");
            var DueDate = kendo.toString(new Date(this.get("DueDate")), "s");
            this.invoiceCollection.add({
                contact_id: Contact,
                biller_id: banhji.userData.id,
                type: "Commercial_Invoice",
                amount: Total,
                rate: rate,
                locale: locale,
                location_id: Location,
                pole_id: Pole,
                box_id: Box,
                month_of: MonthOf,
                issued_date: IssueDate,
                bill_date: BillingDate,
                due_date: DueDate,
                meter_id: ID,
                property_id: PropertyID,
                contract_id: ContractID,
                invoice_lines: invoiceItems
            });
        },
        save: function() {
            var self = this;
            if (this.get("FmonthSelect") && this.get("BillingDate") && this.get("IssueDate") && this.get("DueDate")) {
                $("#loadImport").css("display", "block");
                this.invoiceCollection.sync();
                this.invoiceCollection.bind("requestEnd", function(e){
                    if(e.response.type != 'read'){
                        successSend();
                        $("#loadImport").css("display", "none");
                        banhji.previewInvoice.dataSource = [];
                        $.each(e.response.results, function(i,v){
                            banhji.previewInvoice.dataSource.push(v);
                        });
                        banhji.router.navigate('/preview_invoice');
                    }
                });
            } else {
                alert("Fields Required!");
            }
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
            $("#loadImport").css("display", "none");
            banhji.router.navigate("/");
        }
    });
    banhji.printBill = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "branches"),
        propertyDS: dataStore(apiUrl + "choulr/property"),
        invoiceDS: dataStore(apiUrl + "winvoices/make"),
        attachmentDS: dataStore(apiUrl + "attachments"),
        printBTN: false,
        invoiceCollection: dataStore(apiUrl + "choulr/search_inv"),
        // invoiceCollection: dataStore(apiUrl + "transactions"),
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
        pageLoad: function() {
        },
        printArray: [],
        checkAll: function(e) {
            var self = this;
            e.preventDefault();
            this.set("printArray", []);
            var bolValue = this.get("chkAll");
            var data = this.invoiceCollection.data();
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
                if (this.get("propertySelect")) {
                    para.push({
                        field: "type",
                        value: "Commercial_Invoice"
                    });
                    para.push({
                        field: "property_id",
                        value: this.get("propertySelect")
                    });
                    this.invoiceCollection.query({
                        filter: para,
                        order: {
                            field: "id",
                            dir: "asc"
                        }
                    }).then(function(e) {
                        var numberNoPrint = 0;
                        $.each(self.invoiceCollection.data(), function(i, v) {
                            if (v.print_count == 0) {
                                self.noPrintIDTransaction.push(v.id);
                                numberNoPrint++;
                            }
                        });
                        self.set("noPrint", numberNoPrint);
                    });
                    this.set("selectInv", true);
                } else {
                    alert("Please Select Property");
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
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{
                logic: "or",
                filters: [
                    { field: "type", value: "Commercial_Invoice" },
                    { field: "type", value: "Vat_Invoice" },
                    { field: "type", value: "Invoice" }
                ]
            }
        }),
        printBill: function() {
            if (this.get("TemplateSelect")) {
                if (this.invoiceCollection.total() > 0) {
                    if (this.printArray.length > 0) {
                        var self = this;
                        banhji.previewInvoice.dataSource = [];
                        $.each(this.printArray, function(i,v){
                            banhji.previewInvoice.dataSource.push(v);
                        });
                        banhji.router.navigate('/preview_invoice');
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
            this.clearAll();
            banhji.router.navigate("/");
        }
    });
    banhji.previewInvoice = kendo.observable({
        lang: langVM,
        dataSource: [],
        isVisible: true,
        company: banhji.institute,
        license: [],
        TemplateSelect: null,
        txnFormID: null,
        user_id: banhji.userManagement.getLogin() === null ? '' : banhji.userManagement.getLogin().id,
        pageLoad: function() {
            var self = this,
                TempForm = $("#commercialInvoice").html();
            $("#wInvoiceContent").kendoListView({
                dataSource: this.dataSource,
                template: kendo.template(TempForm)
            });
            // this.barcod("do");
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
            Win = window.open('', '', 'width=1050, height=900');
            pHeight = "215mm";
            pWidth = "297mm";
            var colorM = this.formColor;
            if (colorM == '#000000' || colorM == '#1f497d' || colorM == null) {
                ts = 'color: #fff!important;';
            } else {
                ts = 'color: #333;';
            }
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
            var listview = $("#wInvoiceContent").data("kendoListView");
            listview.refresh();
            window.history.back();
        }
    });
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
                self.set("paymentReceiptToday", kendo.toString(view[0].total_amount,banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
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
        // dataSource: dataStore(apiUrl + "wreports/kpi"),
        licenseDS: dataStore(apiUrl + "branches"),
        dataSource: dataStore(apiUrl + "utibillReports/utillBill_summary"),
        dataSourceKPI: dataStore(apiUrl + "utibillReports/kpi_summary"),
        dataSourceKPI11: new kendo.data.DataSource({
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
        licenseName: "",
        onLicenseChange: function(e){
            this.set("licenseName", e.sender.span[0].innerText);
        },
        search: function() {
            var self = this;
            var monthOfSearch = this.get("monthOfSelect");
            var para = [];
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
                if (this.get("licenseSelect")) {
                    para.push({
                        field: "branch_id",
                        value: this.get("licenseSelect")
                    });
                    this.dataSource.query({
                        filter: para,
                    }).then(function(e){
                        var total = 0;
                        self.exArray = [];
                        self.exArray.push({
                            cells: [{
                                value: self.get("licenseName"),
                                textAlign: "center",
                                colSpan: 15
                            }]
                        });
                        self.set("total", total);
                    });
                } else {
                    alert("Please Select License");
                }
            }else{
                alert("Please Select License");
            }
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
        onLicenseChange: function() {
            var that = this;
            this.dataSource.query({
                    filter: {
                        field: 'id',
                        value: this.get('summarySelect')
                    }
                })

        },
        searchKPI: function() {
            var self = this;
            var monthOfSearch = this.get("monthOfSelect");
            var para = [];
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
                if (this.get("licenseSelect")) {
                    para.push({
                        field: "branch_id",
                        value: this.get("licenseSelect")
                    });
                    this.dataSourceKPI.query({
                        filter: para,
                    }).then(function(e){
                        var total = 0;
                        self.exArray = [];
                        self.exArray.push({
                            cells: [{
                                value: self.get("licenseName"),
                                textAlign: "center",
                                colSpan: 15
                            }]
                        });
                        self.set("total", total);
                    });
                } else {
                    alert("Please Select License");
                }
            }else{
                alert("Please Select License");
            }
        },
        pageLoad: function() {
            var that = this;
        },
        save: function() {
            var self = this;
        },
        cancel: function() {
            this.dataSource.data([]);
            this.dataSourceKPI.data([]);
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
         exArray: [],
        pageLoad: function() {
            this.licenseDS.read();
            this.set("monthOfUpload", "<?php echo date('Y-m-d');?>");
            this.search();
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
            var self = this;

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
                    }).then(function(e) {
                    // if (e.type == "read") {
                        var response = self.dataSource.view();

                        self.exArray = [];

                        self.exArray.push({
                            cells: [{
                                value: "Customer List",
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
                                    value: "Code",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "Customer",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "Meter Number",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "Previous",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "Current",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "Address",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "License",
                                    background: "#496cad",
                                    color: "#ffffff"
                                }
                            ]
                        });
                        for (var i = 0; i < response.length; i++) {
                            self.exArray.push({
                                cells: [{
                                        value: response[i].number,
                                        bold: true,
                                    },
                                    {
                                        value: response[i].name,
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
                            for (var j = 0; j < response[i].line.length; j++) {
                                self.exArray.push({
                                    cells: [{
                                            value: ""
                                        },
                                        {
                                            value: ""
                                        },
                                        {
                                            value: response[i].line[j].meter
                                        },
                                        {
                                            value: response[i].line[j].previous
                                        },
                                        {
                                            value: response[i].line[j].current
                                        },
                                        {
                                            value: response[i].line[j].location
                                        },
                                        {
                                            value: response[i].line[j].branch
                                        },
                                    ]
                                });
                            }
                        }
                    // }
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
                        },
                        {
                            autoWidth: true
                        },
                        {
                            autoWidth: true
                        },
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
    banhji.to_be_connectionList = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/to_be_connection_list"),
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
                    field: "updated_at >=",
                    value: monthOf
                }, {
                    field: "updated_at <=",
                    value: monthL
                });
                this.set("monthOf", monthOf);
                //this.dataSource.filter(para);
                        if(license_id){
                            para.push({
                                field: "branch_id",
                                operator: "where",
                                value: license_id
                            });
                        }

                        if (box_id) {
                            para.push({
                                field: "box_id",
                                operator: "where",
                                value: box_id
                            });
                        } 

                        if (pole_id) {
                            para.push({
                                field: "pole_id",
                                operator: "where",
                                value: pole_id
                            });
                        } 

                        if (bloc_id){
                            para.push({
                                field: "location_id",
                                operator: "where",
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
    banhji.connectionList = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/connection_list"),
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
                    field: "updated_at >=",
                    value: monthOf
                }, {
                    field: "updated_at <=",
                    value: monthL
                });
                this.set("monthOf", monthOf);
                //this.dataSource.filter(para);
                        if(license_id){
                            para.push({
                                field: "branch_id",
                                operator: "where",
                                value: license_id
                            });
                        }

                        if (box_id) {
                            para.push({
                                field: "box_id",
                                operator: "where",
                                value: box_id
                            });
                        } 

                        if (pole_id) {
                            para.push({
                                field: "pole_id",
                                operator: "where",
                                value: pole_id
                            });
                        } 

                        if (bloc_id){
                            para.push({
                                field: "location_id",
                                operator: "where",
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
    banhji.inactiveList = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/inactive_list"),
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
    banhji.to_be_disconnectList = kendo.observable({
        lang: langVM,
        institute: banhji.institute,
        dataSource: dataStore(apiUrl + "utibillReports/to_be_disconnection_list"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: dataStore(apiUrl + "locations"),
        subLocationDS: dataStore(apiUrl + "locations"),
        licenseSelect: null,
        company: banhji.institute,
        blocSelect: null,
        exArray: [],
        pageLoad: function() {
            this.licenseDS.read();
            // this.search();
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
            this.set("haveLocation", false);
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
                            self.subLocationDS.data([]);
                        }
                    });
            }
            this.set("loSelectName", e.sender.span[0].innerText);
        },        
        search: function() {
            var pole_id = this.get("subLocationSelect");
                license_id = this.get("licenseSelect"),
                bloc_id = this.get("blocSelect");

            var para = [];
            
                if(license_id){
                    para.push({
                        field: "branch_id",
                        operator: "where_related_meter",
                        value: license_id
                    });
                }

                if (bloc_id){
                    para.push({
                        field: "location_id",
                        operator: "where_related_meter",
                        value: bloc_id
                    });
                }

                if (pole_id) {
                    para.push({
                        field: "pole_id",
                        operator: "where_related_meter",
                        value: pole_id
                    });
                } 
                this.dataSource.query({
                    filter: para,
                    limit: 300
                });  
             
            this.dataSource.bind("requestEnd", function(e){             
                if(e.type=="read"){
                    var response = e.response;
                    self.exArray = [];

                    // self.exArray.push({
                    //     cells: [
                    //         { value: self.institute.name, textAlign: "center", colSpan: 7}
                    //     ]
                    // });
                    self.exArray.push({
                        cells: [
                            { value: "To Be Disconnect Customer List",bold: true, fontSize: 20, textAlign: "center", colSpan: 7 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 7 }
                        ]
                    });
                    self.exArray.push({ 
                        cells: [
                            { value: "Customer Name", background: "#496cad", color: "#ffffff" },
                            { value: "Phone", background: "#496cad", color: "#ffffff" },
                            { value: "Box", background: "#496cad", color: "#ffffff" },
                            { value: "Meter Number", background: "#496cad", color: "#ffffff" },
                            { value: "Due Date", background: "#496cad", color: "#ffffff" },
                            { value: "Status", background: "#496cad", color: "#ffffff" },
                            { value: "Balance", background: "#496cad", color: "#ffffff" },
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++){
                        self.exArray.push({
                            cells: [
                                { value: response.results[i].location_name, bold: true, },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                            ]
                            
                        });
                        self.exArray.push({
                            cells: [
                                { value: response.results[i].name, },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                            ]
                            
                        });
                        for(var j = 0; j < response.results[i].line.length; j++){
                            var date = new Date(), dueDates = new Date(response.results[i].line[j].due_date).getTime(),overDue, toDay = new Date(date).getTime();
                            if(dueDates < toDay) {
                                overDue = "Over Due "+Math.floor((toDay - dueDates)/(1000*60*60*24))+"days";
                            } else {
                                overDue = Math.floor((dueDates - toDay)/(1000*60*60*24))+"days to pay";
                            }
                            self.exArray.push({
                                cells: [
                                    { value: "" },
                                    { value: response.results[i].line[j].phone },
                                    { value: response.results[i].line[j].box },
                                    { value: response.results[i].line[j].meter_number},
                                    { value: response.results[i].line[j].due_date },
                                    { value: overDue},
                                    { value: response.results[i].line[j].amount },
                                ]
                            });
                        }
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
                    title: "To Be Disconnect",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "ToBeDisconnect.xlsx"
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
        company: banhji.institute,
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
    banhji.totalSale = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/sale_total"),
        licenseDS: dataStore(apiUrl + "branches"),
        blocDS: new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "locations",
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
                    field: "main_bloc",
                    value: 0
                },
                {
                    field: "main_pole",
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
        total: 0,
        exArray: [],
        pageLoad: function() {
        },
        licenseName: "",
        onLicenseChange: function(e){
            this.set("licenseName", e.sender.span[0].innerText);
        },
        search: function() {
            var self = this;
            var monthOfSearch = this.get("monthOfSelect");
            var para = [];
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
                if (this.get("licenseSelect")) {
                    para.push({
                        field: "branch_id",
                        value: this.get("licenseSelect")
                    });
                    
                    this.dataSource.query({
                        filter: para,
                    }).then(function(e){
                        var total = 0;
                        self.exArray = [];
                        self.exArray.push({
                            cells: [{
                                value: self.get("licenseName"),
                                textAlign: "center",
                                colSpan: 15
                            }]
                        });
                        self.exArray.push({
                            cells: [{
                                value: "Total Sale Report",
                                bold: true,
                                fontSize: 20,
                                textAlign: "center",
                                colSpan: 15
                            }]
                        });
                        self.exArray.push({
                            cells: [{
                                value: kendo.toString(monthOf, "MM-yyyy"),
                                textAlign: "center",
                                colSpan: 15
                            }]
                        });
                        self.exArray.push({
                            cells: [{
                                value: "",
                                colSpan: 15
                            }]
                        });
                        self.exArray.push({
                            cells: [{
                                    value: "ប្លុក | Bloc",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "ចំ​នួនអតិថិជនសរុប | Total Customer",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "ចំ​នួនអតិថិជនផ្អាកប្រើ | Void",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "បរិមាណប្រើប្រាស់ | Usage",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "ជាសាច់ប្រាក់ | Cash",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "សេវាថែទាំ | Maintenance",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "រំលោះ | Installment",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "សេវាផ្សេងៗ | Other Service",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "អនុគ្រោះ | Exemption",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "ពិន័យ | Fine",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "បំណុលខែមុន | Balance Last Month",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "សរុបរួម | Sub Total",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "សាច់ប្រាក់ទទួលបាន | Cash Receipt",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "បញ្ចុះតម្លៃ | Discount",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                                {
                                    value: "បំណុលចុងគ្រា | Ending Balance",
                                    background: "#496cad",
                                    color: "#ffffff"
                                },
                            ]
                        });
                        $.each(self.dataSource.data(), function(i,v){
                            total += v.subtotal_amount
                            self.exArray.push({
                                cells: [{
                                        value: v.bloc_name,
                                    },
                                    {
                                        value: v.total_customer,
                                    },
                                    {
                                        value: v.void_customer,
                                    },
                                    {
                                        value: v.total_usage,
                                    },
                                    {
                                        value: v.amount_invoice,
                                    },
                                    {
                                        value: v.amount_maintenance,
                                    },
                                    {
                                        value: v.amount_int,
                                    },
                                    {
                                        value: v.amount_other_service,
                                    },
                                    {
                                        value: v.amount_exemption,
                                    },
                                    {
                                        value: v.amount_fine,
                                    },
                                    {
                                        value: v.balance_last_month,
                                    },
                                    {
                                        value: v.subtotal_amount,
                                    },
                                    {
                                        value: v.amount_receive,
                                    },
                                    {
                                        value: v.discount,
                                    },
                                    {
                                        value: v.ending_balance,
                                    },
                                ]
                            });
                        });
                        self.set("total", kendo.toString(total, banhji.locale == "km-KH" ? "c0" : "c", banhji.locale));
                    });
                } else {
                    alert("Please Select License");
                }
            }else{
                alert("Please Select License");
            }
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
                    title: "Sale Detail",
                    rows: this.exArray
                }]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({
                dataURI: workbook.toDataURL(),
                fileName: "saleDetail.xlsx"
            });
        },
        cancel: function(){
            this.dataSource.data([]);
            banhji.router.navigate('/reports');
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
    banhji.discountReport = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/discount"),
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
    banhji.cashReceiptbyuser = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "utibillReports/cash_receipt_user"),
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
    //View
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
        //Menu
        choulrMenu: new kendo.View("#choulrMenu", {
            model: langVM
        }),
        //DashBoard
        dashBoard: new kendo.Layout("#dashBoard", {
            model: banhji.dashBoard
        }), 
        //Setting
        Setting: new kendo.Layout("#Setting", {
            model: banhji.Setting
        }), 
        Property: new kendo.Layout("#Property", {
            model: banhji.Property
        }),
        Plan: new kendo.Layout("#Plan", {
            model: banhji.Plan
        }),
        //Lease Unit
        leaseUnitCenter: new kendo.Layout("#leaseUnitCenter", {
            model: banhji.leaseUnitCenter
        }),
        leaseUnit: new kendo.Layout("#leaseUnit", {
            model: banhji.leaseUnit
        }),
        //Utility
        utilityCenter: new kendo.Layout("#utilityCenter", {
            model: banhji.utilityCenter
        }),
        Meter: new kendo.Layout("#Meter", {
            model: banhji.Meter
        }),
        //Contract
        Contract: new kendo.Layout("#Contract", {
            model: banhji.Contract
        }),
        contractCenter: new kendo.Layout("#contractCenter", {
            model: banhji.contractCenter
        }),
        //Customer
        customerCenter: new kendo.Layout("#customerCenter", {model: banhji.customerCenter}),
        customer: new kendo.Layout("#customer", {model: banhji.customer}),
        //Bill
        runBill: new kendo.Layout("#runBill", {model: banhji.runBill}),
        printBill: new kendo.Layout("#printBill", {model: banhji.printBill}),
        Receipt: new kendo.Layout("#Receipt", {
            model: banhji.Receipt
        }),
        previewInvoice: new kendo.Layout("#previewInvoice", {
            model: banhji.previewInvoice
        }),
        Reports: new kendo.Layout("#Reports", {
            model: banhji.Reports
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
        cashReceiptbyuser: new kendo.Layout("#cashReceiptbyuser", {
            model: banhji.cashReceiptbyuser
        }),
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
                if (err) {} else {
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
    //DashBoard Page
    banhji.router.route('/', function() {
        var blank = new kendo.View('#blank-tmpl');
        $('body').css("background-image", "url(<?php echo base_url(); ?>assets/choulr/img/phnom-penh02.jpg)");
         $('body').css("background-size", "cover");
        banhji.view.layout.showIn('#content', banhji.view.dashBoard);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        banhji.dashBoard.dataSource.read();
    });
    //Setting
    banhji.router.route('/setting', function() {
        banhji.view.layout.showIn('#content', banhji.view.Setting);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.Setting;
        banhji.userManagement.addMultiTask("Setting", "setting", null);
        if (banhji.pageLoaded["setting"] == undefined) {
            banhji.pageLoaded["setting"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route("/plan(/:id)", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.Plan);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.Plan;
        banhji.userManagement.addMultiTask("Add Plan", "plan", null);
        if (banhji.pageLoaded["plan"] == undefined) {
            banhji.pageLoaded["plan"] = true;
        }
        vm.pageLoad(id);
    });
    banhji.router.route("/property(/:id)", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.Property);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.Property;
        banhji.userManagement.addMultiTask("Property", "property", null);
        if (banhji.pageLoaded["property"] == undefined) {
            banhji.pageLoaded["property"] = true;
        }
        vm.pageLoad(id);
    });
    //Lease Unit
    banhji.router.route('/lease_unit_center', function() {
        banhji.view.layout.showIn('#content', banhji.view.leaseUnitCenter);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.leaseUnitCenter;
        banhji.userManagement.addMultiTask("Lease Unit", "lease_unit_center", null);
        if (banhji.pageLoaded["lease_unit_center"] == undefined) {
            banhji.pageLoaded["lease_unit_center"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route("/lease_unit(/:id)", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.leaseUnit);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.leaseUnit;
        banhji.userManagement.addMultiTask("Lease Unit", "lease_unit", null);
        if (banhji.pageLoaded["lease_unit"] == undefined) {
            banhji.pageLoaded["lease_unit"] = true;
        }
        vm.pageLoad(id);
    });
    //Utility
    banhji.router.route('/utility_center', function() {
        banhji.view.layout.showIn('#content', banhji.view.utilityCenter);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.utilityCenter;
        banhji.userManagement.addMultiTask("Uitlity Center", "utility_center", null);
        vm.pageLoad();
    });
    banhji.router.route("/meter(/:id)", function(id) {
        banhji.view.layout.showIn("#content", banhji.view.Meter);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.Meter;
        banhji.userManagement.addMultiTask("Meter", "meter", null);
        if (banhji.pageLoaded["meter"] == undefined) {
            banhji.pageLoaded["meter"] = true;
        }
        vm.pageLoad(id);
    });
    //Contract
    banhji.router.route('/contract(/:id)', function(id) {
        banhji.view.layout.showIn('#content', banhji.view.Contract);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.Contract;
        if(banhji.pageLoaded["invoice"]==undefined){
            banhji.pageLoaded["invoice"] = true;
            vm.lineDS.bind("change", vm.lineDSChanges);
        }
        vm.pageLoad(id);
    });
    banhji.router.route('/contract_center', function() {
        banhji.view.layout.showIn('#content', banhji.view.contractCenter);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.view.menu.showIn('#secondary-menu', banhji.view.choulrMenu);
        var vm = banhji.contractCenter;
        banhji.userManagement.addMultiTask("Contract Center", "contract_center", null);
        if (banhji.pageLoaded["contract_center"] == undefined) {
            banhji.pageLoaded["contract_center"] = true;
        }
        vm.pageLoad();
    });
    //Customer
    banhji.router.route("/customer_center(/:id)", function(id){
        banhji.accessMod.query({
            filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        }).then(function(e){
            var allowed = false;
            if(banhji.accessMod.data().length > 0) {
                for(var i = 0; i < banhji.accessMod.data().length; i++) {
                    if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            } 
            if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.customerCenter);
                banhji.view.layout.showIn('#menu', banhji.view.menu);
                // banhji.view.menu.showIn('#secondary-menu', banhji.view.customerMenu);
                
                var vm = banhji.customerCenter;
                banhji.userManagement.addMultiTask("Customer Center","customer_center",null);
                if(banhji.pageLoaded["customer_center"]==undefined){
                    banhji.pageLoaded["customer_center"] = true;
                }

                vm.pageLoad(id);
            } else {
                window.location.replace(baseUrl + "admin");
            }
        });
    });
    banhji.router.route("/customer(/:id)(/:is_pattern)", function(id,is_pattern){
        banhji.accessMod.query({
            filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        }).then(function(e){
            var allowed = false;
            if(banhji.accessMod.data().length > 0) {
                for(var i = 0; i < banhji.accessMod.data().length; i++) {
                    if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            } 
            if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.customer);
                kendo.fx($("#slide-form")).slideIn("down").play();

                var vm = banhji.customer;
                banhji.userManagement.addMultiTask("Customer","customer",vm);
                if(banhji.pageLoaded["customer"]==undefined){
                    banhji.pageLoaded["customer"] = true;

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

                vm.pageLoad(id, is_pattern);
            } else {
                window.location.replace(baseUrl + "admin");
            }
        });
    });
    //Bill
    banhji.router.route("/run_bill", function(){
        banhji.view.layout.showIn("#content", banhji.view.runBill);
        banhji.view.layout.showIn('#menu', banhji.view.menu);
        banhji.userManagement.addMultiTask("Run Bill","run_bill",null);
    });
    banhji.router.route("/print_bill", function() {
        banhji.view.layout.showIn("#content", banhji.view.printBill);
        var vm = banhji.printBill;
        banhji.userManagement.addMultiTask("Print Bill", "print_bill", null);
        if (banhji.pageLoaded["print_bill"] == undefined) {
            banhji.pageLoaded["print_bill"] = true;
        }
        vm.pageLoad();
    });
    banhji.router.route("/preview_invoice", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.previewInvoice);
            var vm = banhji.previewInvoice;
            if (banhji.pageLoaded["preview_invoice"] == undefined) {
                banhji.pageLoaded["preview_invoice"] = true;
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
    //////Report Router/////
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
    banhji.router.route("/to_be_connection_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.to_be_connectionList);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

            var vm = banhji.to_be_connectionList;
            banhji.userManagement.addMultiTask("Customer To Be Connected", "to_be_connection_list", null);
            if (banhji.pageLoaded["to_be_connection_list"] == undefined) {
                banhji.pageLoaded["to_be_connection_list"] = true;

            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/connection_list", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.connectionList);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

            var vm = banhji.connectionList;
            banhji.userManagement.addMultiTask("Customer List", "connection_list", null);
            if (banhji.pageLoaded["connection_list"] == undefined) {
                banhji.pageLoaded["connection_list"] = true;

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
            banhji.to_be_disconnectList.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    banhji.to_be_disconnectList.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.to_be_disconnectList.set('total', kendo.toString(e.response.total, 'c2'));
                }
            });
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
    banhji.router.route("/total_sale", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.totalSale);

            var vm = banhji.totalSale;
            banhji.userManagement.addMultiTask("Total Sale Report", "total_sale", null);
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
    banhji.router.route("/discount_report", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.discountReport);

            var vm = banhji.discountReport;
            banhji.userManagement.addMultiTask("Discount Report", "discount_report", null);

            if (banhji.pageLoaded["discount_report"] == undefined) {
                banhji.pageLoaded["discount_report"] == true;

                vm.sorterChanges();
            }
            banhji.discountReport.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    banhji.discountReport.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.discountReport.set('total', kendo.toString(e.response.total, 'c2'));
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
    banhji.router.route("/cash_receipt_user", function() {
        if (!banhji.userManagement.getLogin()) {
            banhji.router.navigate('/manage');
        } else {
            banhji.view.layout.showIn("#content", banhji.view.cashReceiptbyuser);

            var vm = banhji.cashReceiptbyuser;
            banhji.userManagement.addMultiTask("Cash Receipt Source Detail", "cash_receipt_user", null);

            if (banhji.pageLoaded["cash_receipt_user"] == undefined) {
                banhji.pageLoaded["cash_receipt_user"] == true;

                vm.sorterChanges();
            }
            banhji.cashReceiptbyuser.dataSource.bind('requestEnd', function(e) {
                if (e.response) {
                    banhji.cashReceiptbyuser.set('count', e.response.count);
                    kendo.culture(banhji.locale);
                    banhji.cashReceiptbyuser.set('total', kendo.toString(e.response.total, 'c2'));
                }
            });
            vm.pageLoad();
        }
    });
    //Function
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
        //     // banhji.source.loadData();
            banhji.source.pageLoad();
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