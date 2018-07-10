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

    function customFieldEditor(container, options) {
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
                        url: apiUrl + "custom_fields",
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
                // filter:{ field: "type", value: "contacts" },
                sort: { field:"name", dir:"asc" },
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
        lang                        : langVM,
        testDS                      : dataStore(apiUrl + "transactions/number"),
        countryDS                   : dataStore(apiUrl + "countries"),
        //Contact
        customerDS                  : new kendo.data.DataSource({
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
                { field:"parent_id", operator:"where_related_contact_type", value:1 },//Customer
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
        employeeDS                  : new kendo.data.DataSource({
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
                { field:"parent_id", operator:"where_related_contact_type", value:3 },//Employee
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
        employeeUserDS              : dataStore(apiUrl + "contacts"),
        //Contact Type
        contactTypeList             : [],
        contactTypeDS               : dataStore(apiUrl + "contacts/type"),
        //Job
        jobList                     : [],
        jobDS                       : dataStore(apiUrl + "jobs"),
        //Currency
        currencyList                : [],
        currencyDS                  : dataStore(apiUrl + "currencies"),
        currencyRateDS              : dataStore(apiUrl + "currencies/rate"),
        //Item
        itemDS                      : dataStore(apiUrl + "items"),
        itemTypeDS                  : dataStore(apiUrl + "item_types"),
        itemGroupList               : [],
        itemGroupDS                 : dataStore(apiUrl + "items/group"),
        brandDS                     : dataStore(apiUrl + "brands"),
        categoryList                : [],
        categoryDS                  : dataStore(apiUrl + "categories"),
        itemPriceDS                 : dataStore(apiUrl + "item_prices"),
        measurementList             : [],
        measurementDS               : dataStore(apiUrl + "measurements"),
        locationDS                  : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "locations",
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
            filter:{ field:"contact_id", operator:"by_user_id", value:banhji.userData.id },
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        //Tax
        taxTypeDS                   : dataStore(apiUrl + "tax_types"),
        taxList                     : [],
        taxItemDS                   : dataStore(apiUrl + "tax_items"),
        //Accounting
        accountList                 : [],
        accountDS                   : dataStore(apiUrl + "accounts"),
        accountTypeDS               : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "accounts/type",
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
            filter:{ field:"id >", value:9 },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        //Payment Term, Method, Segment
        paymentTermDS               : dataStore(apiUrl + "payment_terms"),
        paymentMethodDS             : dataStore(apiUrl + "payment_methods"),
        //Segment
        segmentDS                   : dataStore(apiUrl + "segments"),
        segmentItemList             : [],
        segmentItemDS               : dataStore(apiUrl + "segments/item"),
        //Txn Template
        txnTemplateList             : [],
        txnTemplateDS               : dataStore(apiUrl + "transaction_templates"),
        //Prefixes
        prefixList                  : [],
        prefixDS                    : dataStore(apiUrl + "prefixes"),
        dateUnitList               : [
            { text: 'Day', value: 'Day' },
            { text: 'Week', value: 'Week' },
            { text: 'Month', value: 'Month' },
            { text: 'Quarter', value: 'Quarter' },
            { text: 'Annual', value: 'Annual' }
        ],
        frequencyList               : [
            { id: 'Daily', name: 'Daily' },
            { id: 'Weekly', name: 'Weekly' },
            { id: 'Monthly', name: 'Monthly' },
            { id: 'Quarterly', name: 'Quarterly' },
            { id: 'Annually', name: 'Annually' }
        ],
        monthOptionList             : [
            { id: 'Day', name: 'Day' },
            { id: '1st', name: '1st' },
            { id: '2nd', name: '2nd' },
            { id: '3rd', name: '3rd' },
            { id: '4th', name: '4th' }
        ],
        monthList                   : [
            { id: 0, name: 'January' },
            { id: 1, name: 'February' },
            { id: 2, name: 'March' },
            { id: 3, name: 'April' },
            { id: 4, name: 'May' },
            { id: 5, name: 'June' },
            { id: 6, name: 'July' },
            { id: 7, name: 'August' },
            { id: 8, name: 'September' },
            { id: 9, name: 'October' },
            { id: 10, name: 'November' },
            { id: 11, name: 'December' }
        ],
        weekDayList                 : [
            { id: 0, name: 'Sunday' },
            { id: 1, name: 'Monday' },
            { id: 2, name: 'Tuesday' },
            { id: 3, name: 'Wednesday' },
            { id: 4, name: 'Thurday' },
            { id: 5, name: 'Friday' },
            { id: 6, name: 'Saturday' }
        ],
        dayList                     : [
            { id: 1, name: '1st' },
            { id: 2, name: '2nd' },
            { id: 3, name: '3rd' },
            { id: 4, name: '4th' },
            { id: 5, name: '5th' },
            { id: 6, name: '6th' },
            { id: 7, name: '7th' },
            { id: 8, name: '8th' },
            { id: 9, name: '9th' },
            { id: 10, name: '10th' },
            { id: 11, name: '11st' },
            { id: 12, name: '12nd' },
            { id: 13, name: '13rd' },
            { id: 14, name: '14th' },
            { id: 15, name: '15th' },
            { id: 16, name: '16th' },
            { id: 17, name: '17th' },
            { id: 18, name: '18th' },
            { id: 19, name: '19th' },
            { id: 20, name: '20th' },
            { id: 21, name: '21st' },
            { id: 22, name: '22nd' },
            { id: 23, name: '23rd' },
            { id: 24, name: '24th' },
            { id: 25, name: '25th' },
            { id: 26, name: '26th' },
            { id: 27, name: '27th' },
            { id: 28, name: '28th' },
            { id: 0, name: 'Last' }
        ],
        sortList                    : [
            { text:"All", value: "all" },
            { text:"Today", value: "today" },
            { text:"This Week", value: "week" },
            { text:"This Month", value: "month" },
            { text:"This Year", value: "year" }
        ],
        statusList                  : [
            { "id": 1, "name": "Active" },
            { "id": 0, "name": "Inactive" },
            { "id": 2, "name": "Void" }
        ],
        applicationStatusList       : [
            { "id": 1, "name": "Approve" },
            { "id": 0, "name": "Pending" },
            { "id": 2, "name": "Review" },
            { "id": 3, "name": "Submit" }
        ],
        customerFormList            : [
            { id: "Quote", name: "Quotation" },
            { id: "Sale_Order", name: "Sale Order" },
            { id: "Deposit", name: "Deposit" },
            { id: "Cash_Sale", name: "Cash Sale" },
            { id: "Invoice", name: "Invoice" },
            { id: "Cash_Receipt", name: "Cash Receipt" },
            //{ id: "Sale_Return", name: "Sale Return" },
            { id: "GDN", name: "Delivered Note" }
        ],
        vendorFormList              : [
            { id: "Purchase_Order", name: "Purchase Order" },
            { id: "GRN", name: "GRN" },
            // { id: "Deposit", name: "Deposit" },
            // { id: "Purchase", name: "Purchase" },
            // { id: "Pur_Return", name: "Pur.Return" },
            { id: "Cash_Payment", name: "Cash Payment" }
        ],
        cashFormList                : [
            { id: "Cash_Transfer", name: "Cash Transaction" },
            { id: "Cash_Receipt", name: "Cash Receipt" },
            { id: "Cash_Payment", name: "Cash Payment" },
            { id: "Cash_Advance", name: "Cash Advance" },
            { id: "Reimbursement", name: "Reimbursement" },
            { id: "Advance_Settlement", name: "Advance Settlement" }
        ],
        cashMGTFormList             : [
            { id: "Cash_Transfer", name: "Transfer" },
            { id: "Deposit", name: "Deposit" },
            { id: "Withdraw", name: "Withdraw" },
            { id: "Cash_Advance", name: "Advance" },
            { id: "Cash_Payment", name: "Payment" },
            { id: "Reimbursement", name: "Reimbursement" },
            { id: "Journal", name: "Journal" }
        ],
        statusObj                   : { text:"", date:"", number:"", url:"" },
        defaultLines                : 2,
        genderList                  : ["M", "F"],
        typeList                    : ['Invoice','Commercial_Invoice','Vat_Invoice','Electricity_Invoice','Water_Invoice','Cash_Sale','Commercial_Cash_Sale','Vat_Cash_Sale','Receipt_Allocation','Sale_Order','Quote','GDN','Sale_Return','Purchase_Order','GRN','Cash_Purchase','Credit_Purchase','Purchase_Return','Payment_Allocation','Deposit','Electricty_Deposit','Water_Deposit','Customer_Deposit','Vendor_Deposit','Withdraw','Transfer','Journal','Item_Adjustment','Cash_Advance','Reimbursement','Direct_Expense','Advance_Settlement','Additional_Cost','Cash_Payment','Cash_Receipt','Credit_Note','Debit_Note','Offset_Bill','Offset_Invoice','Cash_Transfer','Internal_Usage'],
        user_id                     : banhji.userData.id,
        active                      : "Active",
        inactive                    : "Inactive",
        amtDueColor                 : "#eee",
        acceptedSrc                 : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/accepted.ico",
        approvedSrc                 : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/approved.ico",
        cancelSrc                   : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/cancel.ico",
        openSrc                     : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/open.ico",
        paidSrc                     : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/paid.ico",
        partialyPaidSrc             : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/partialy_paid.ico",
        usedSrc                     : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/used.ico",
        receivedSrc                 : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/received.ico",
        deliveredSrc                : "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/delivered.ico",
        successMessage              : "Saved Successful!",
        errorMessage                : "Warning, please review it again!",
        confirmMessage              : "Are you sure, you want to delete it?",
        requiredMessage             : "Required",
        duplicateNumber             : "Duplicate Number!",
        duplicateInvoice            : "Duplicate Invoice!",
        selectCustomerMessage       : "Please select a customer.",
        selectSupplierMessage       : "Please select a supplier.",
        selectItemMessage           : "Please select an item.",
        duplicateMeasurementMessage : "Sorry, you can not use the same measurement.",
        duplicateSelectedItemMessage: "You already selected this item.",
        noChangeInvoicePaidMessage  : "Sorry, you can not change the amount of paid invoice.",
        test : function () {
            var a = "foo 12.34 bar 56 baz 78.90";
            var numbers = a.match(/\d+/g).map(Number);
            console.log(numbers);
        },
        pageLoad                    : function(){
            this.loadAccounts();
            this.accountTypeDS.read();
            this.taxTypeDS.read();
            this.loadTaxes();
            this.loadJobs();
            this.loadSegmentItems();
            this.loadCurrencies();
            this.loadRates();
            this.loadPrefixes();
            this.loadTxnTemplates();

            this.loadCategories();
            this.loadItemGroups();
            this.itemTypeDS.read();
            this.loadMeasurements();

            this.loadContactTypes();
        },
        checkAccessModule           : function(moduleName){
            banhji.accessMod.query({
                filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
            }).then(function(e){
                var allowed = false;
                if(banhji.accessMod.data().length > 0) {
                    for(var i = 0; i < banhji.accessMod.data().length; i++) {
                        if(moduleName.toLowerCase() == banhji.accessMod.data()[i].name.toLowerCase()) {
                            allowed = true;
                            break;
                        }
                    }
                }
                return allowed;
            });
        },
        getFiscalDate               : function(){
            var today = new Date(),
            fDate = new Date(today.getFullYear() +"-"+ banhji.institute.fiscal_date);

            if(today < fDate){
                fDate.setFullYear(today.getFullYear()-1);
            }

            return fDate;
        },
        loadPrefixes                : function(){
            var self = this, raw = this.get("prefixList");

            //Clear array
            if(raw.length>0){
                raw.splice(0,raw.length);
            }

            this.prefixDS.query({
                filter: [],
            }).then(function(){
                var view = self.prefixDS.view();

                $.each(view, function(index, value){
                    raw.push(value);
                });
            });
        },
        loadTxnTemplates            : function(){
            var self = this, raw = this.get("txnTemplateList");

            //Clear array
            if(raw.length>0){
                raw.splice(0,raw.length);
            }

            this.txnTemplateDS.query({
                filter:[]
            }).then(function(){
                var view = self.txnTemplateDS.view();

                $.each(view, function(index, value){
                    raw.push(value);
                });
            });
        },
        loadCurrencies              : function(){
            var self = this, raw = this.get("currencyList");

            //Clear array
            if(raw.length>0){
                raw.splice(0,raw.length);
            }

            this.currencyDS.query({
                filter:[]
            }).then(function(){
                var view = self.currencyDS.view();

                $.each(view, function(index, value){
                    raw.push(value);
                });
            });
        },
        loadRates                   : function(){
            this.currencyRateDS.query({
                filter:[],
                sort:{ field:"date", dir:"desc"}
            });
        },
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
        loadTaxes                   : function(){
            var self = this, raw = this.get("taxList");

            //Clear array
            if(raw.length>0){
                raw.splice(0,raw.length);
            }

            this.taxItemDS.query({
                filter:[]
            }).then(function(){
                var view = self.taxItemDS.view();

                $.each(view, function(index, value){
                    raw.push(value);
                });
            });
        },
        checkWHT                    : function(tax_type_id){
            var result = false,
                types = this.taxTypeDS.get(tax_type_id);

            if(types.sub_of_id==12){
                result = true;
            }

            return result;
        },
        loadJobs                    : function(){
            var self = this, raw = this.get("jobList");

            //Clear array
            if(raw.length>0){
                raw.splice(0,raw.length);
            }

            this.jobDS.query({
                filter:[]
            }).then(function(){
                var view = self.jobDS.view();

                $.each(view, function(index, value){
                    raw.push(value);
                });
            });
        },
        loadSegmentItems            : function(){
            var self = this, raw = this.get("segmentItemList");

            //Clear array
            if(raw.length>0){
                raw.splice(0,raw.length);
            }

            this.segmentItemDS.query({
                filter:{ field:"segment_id >", value: 0 }
            }).then(function(){
                var view = self.segmentItemDS.view();

                $.each(view, function(index, value){
                    raw.push(value);
                });
            });
        },
        loadAccounts                : function(){
            var self = this, raw = this.get("accountList");

            //Clear array
            if(raw.length>0){
                raw.splice(0,raw.length);
            }

            this.accountDS.query({
                filter: { field:"status", value:1 },
                sort: [
                    { field: "account_type_id", dir: "asc" },
                    { field: "number", dir: "asc" }
                ]
            }).then(function(){
                var view = self.accountDS.view();

                $.each(view, function(index, value){
                    raw.push(value);
                });
            });
        },
        loadCategories              : function(){
            var self = this, raw = this.get("categoryList");

            //Clear array
            if(raw.length>0){
                raw.splice(0,raw.length);
            }

            this.categoryDS.query({
                filter:[]
            }).then(function(){
                var view = self.categoryDS.view();

                $.each(view, function(index, value){
                    raw.push(value);
                });
            });
        },
        loadItemGroups              : function(){
            var self = this, raw = this.get("itemGroupList");

            //Clear array
            if(raw.length>0){
                raw.splice(0,raw.length);
            }

            this.itemGroupDS.query({
                filter:[]
            }).then(function(){
                var view = self.itemGroupDS.view();

                $.each(view, function(index, value){
                    raw.push(value);
                });
            });
        },
        loadMeasurements            : function(){
            var self = this, raw = this.get("measurementList");

            //Clear array
            if(raw.length>0){
                raw.splice(0,raw.length);
            }

            this.measurementDS.query({
                filter:[],
            }).then(function(){
                var view = self.measurementDS.view();

                $.each(view, function(index, value){
                    raw.push(value);
                });
            });
        },
        loadContactTypes            : function(){
            var self = this, raw = this.get("contactTypeList");

            //Clear array
            if(raw.length>0){
                raw.splice(0,raw.length);
            }

            this.contactTypeDS.query({
                filter:[]
            }).then(function(){
                var view = self.contactTypeDS.view();

                $.each(view, function(index, value){
                    raw.push(value);
                });
            });
        },
        getPaymentTerm              : function(id){
            var data = this.paymentTermDS.get(id);
            return data.name;
        },
        getPrefixAbbr               : function(type){
            var abbr = "";
            $.each(this.prefixList, function(index, value){
                if(value.type==type){
                    abbr = value.abbr;

                    return false;
                }
            });

            return abbr;
        },
        getCurrencyCode             : function(locale){
            var code = "";

            $.each(this.currencyDS.data(), function(index, value){
                if(value.locale==locale){
                    code = value.code;

                    return false;
                }
            });

            return code;
        },
        getPriceList                : function(id){
            var priceList = [],
                item = this.itemDS.get(id),
                measurement = this.measurementDS.get(item.measurement_id);

            $.each(this.itemPriceList, function(index, value){
                if(value.item_id==id){
                    priceList.push(value);
                }
            });

            return priceList;
        }
    });
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
                banhji.view.layout.showIn("#content", banhji.view.itemAdjustment);
                banhji.view.layout.showIn('#menu', banhji.view.menu);
                banhji.view.menu.showIn('#secondary-menu', banhji.view.inventoryMenu);

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