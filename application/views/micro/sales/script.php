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
    banhji.dateFormat = "dd-MM-yyyy";
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
        lang     : langVM,
        goReports          : function(){
            banhji.router.navigate('/reports');
        },
        goCheckOut         : function(){
            banhji.router.navigate('/');
        },
        goTransactions      : function(){
            banhji.router.navigate('/transactions');
        },
        goMenuCustomers        : function(){
            banhji.router.navigate('/customers');
        },
    });
    banhji.reports = kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "micro_modules/sales_reports_snapshot"),
        txnDS               : dataStore(apiUrl + "micro_modules/customer_transaction_list"),
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : [],
        fiscalDate          : kendo.toString(new Date(banhji.userData.institute.fiscal_date),"m"),
        pageLoad            : function(){
            var self = this;

            this.search();

            this.dataSource.query({
                filter: [],
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.dataSource.view();

                self.set("obj", view[0]);
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
        search              : function(){
            var self = this, para = [],
                start = this.get("sdate"),
                end = this.get("edate"),
                displayDate = "";

            // para.push({ field:"type", operator:"where_in", value:["Sale_Order","Customer_Deposit","Cash_Receipt","Cash_Refund","Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"] });

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

            this.txnDS.filter(para);
        },
        loadSale            : function(){
            this.txnDS.filter(
                { field:"type", operator:"where_in", value:["Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"] }
            );
        },
        loadReceiveable            : function(){
            this.txnDS.filter([
                { field:"type", operator:"where_in", value:["Commercial_Invoice","Vat_Invoice","Invoice"] },
                { field:"status", operator:"where_in", value:[0,2] }
            ]);
        },
        loadDraft            : function(){
            this.txnDS.filter([
                { field:"type", operator:"where_in", value:["Sale_Order","Customer_Deposit","Quote","Commercial_Invoice","Vat_Invoice","Invoice","Commercial_Cash_Sale","Vat_Cash_Sale","Cash_Sale"] },
                { field:"status", value:4 },
                { field:"progress", value:"Draft" }
            ]);
        },
        payInvoice          : function(e){
            var data = e.data;

            if(obj!==null){
                banhji.router.navigate('/cash_receipt');
                banhji.cashReceipt.loadInvoice(data.id);
            }
        }
    });
    banhji.checkOut = kendo.observable({
        lang                : langVM,
        displayUserName     : "",
        userDS              : dataStore(apiUrl + "users"),
        dataSource          : dataStore(apiUrl + "transactions"),
        lineDS              : dataStore(apiUrl + "item_lines"),
        assemblyLineDS      : dataStore(apiUrl + "item_lines"),
        txnDS               : dataStore(apiUrl + "transactions"),
        numberDS            : dataStore(apiUrl + "transactions/number"),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        depositDS           : dataStore(apiUrl + "transactions"),
        wacDS               : dataStore(apiUrl + "items/weighted_average_costing"),
        itemDS              : dataStore(apiUrl + "items"),
        assemblyDS          : dataStore(apiUrl + "item_assemblies"),
        defaultContactDS    : dataStore(apiUrl + "contacts"),
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
        contactDS           : new kendo.data.DataSource({
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
            filter:{ field:"parent_id", operator:"where_related_contact_type", value:1 },
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
        categoryDS          : new kendo.data.DataSource({
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
            filter:  [
                { field: "id", operator: "where_in", value: [1, 3, 5, 6] },
                { field: "is_system",  operator: "or_where", value: 0 }
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
                    field: "item_type_id",
                    operator: "where_in",
                    value: [1, 4]
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
                    operator: "where_in",
                    value: [11,12]
                },
                {   
                    field: "work_id",
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
        itemGroupDS         : banhji.source.itemGroupDS,
        statusObj           : banhji.source.statusObj,
        paymentTermDS       : banhji.source.paymentTermDS,
        paymentMethodDS     : banhji.source.paymentMethodDS,
        amtDueColor         : banhji.source.amtDueColor,
        confirmMessage      : banhji.source.confirmMessage,
        obj                 : null,
        isEdit              : false,
        saveDraft           : false,
        saveClose           : false,
        savePrint           : false,
        saveRecurring       : false,
        showConfirm         : false,
        notDuplicateNumber  : true,
        balance             : 0,
        total_deposit       : 0,
        total               : 0,
        amount_due          : 0,
        barcode             : "",
        barcodeVisible      : false,
        category_id         : 0,
        item_group_id       : 0,
        user_id             : banhji.source.user_id,
        sessionDS           : dataStore(apiUrl + "cashier"),
        haveItems           : false,
        parkSaleDS          : dataStore(apiUrl + "transactions"),
        parkSaleLineDS      : dataStore(apiUrl + "item_lines"),
        currencyDS          : dataStore(apiUrl + "utibills/currency"),
        currencyDS          : dataStore(apiUrl + "utibills/currency"),
        numberParkSale      : 0,
        pageLoad            : function(){
            var self = this;
            this.parkSaleDS.query({
                filter: [
                    {field: "status", value: 4},
                    {field: "type", value: "Cash_Sale"}
                ],
                sort: {
                    field: "id",
                    dir: "desc"
                }
            }).then(function(e){
                self.set("numberParkSale", self.parkSaleDS.data().length);
            });
            this.addEmpty();
            this.currencyDS.query({
                sort: {
                    field: "created_at",
                    dir: "asc"
                }
            }).then(function(e) {
                self.setCashierItems();
            });
            var self = this;
            this.userDS.query({
                filter: {field: "id", operator:"where", value: banhji.userData.id},
                page: 1,
                pageSize: 1,
            }).then(function(e){
                var v = self.userDS.view();
                self.set("displayUserName", v[0].last_name + " "+ v[0].first_name);
            });
            var interval = setInterval(function() {
                var momentNow = moment();
                $('#date-part').html(momentNow.format('YYYY MMMM DD') + ' '
                                    + momentNow.format('dddd')
                                     .substring(0,3).toUpperCase());
                $('#time-part').html(momentNow.format('A hh:mm:ss'));
            }, 100);
        },
        loadData            : function(){
            this.setRate();
            this.setTerm();
            this.loadDeposit();
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
        //Contact
        setContact          : function(contact){
            var obj = this.get("obj");

            obj.set("contact", contact);
            this.contactChanges();
        },
        setDefaultContact   : function(){
            var self = this, obj = this.get("obj");

            this.defaultContactDS.query({
                filter: { "field":"id", value: 6 }
            }).then(function(){
                var view = self.defaultContactDS.view();

                obj.set("contact", view[0]);
            });
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

                duedate.setDate(duedate.getDate() + 30); //term.net_due);

                obj.set("due_date", duedate);
            }else{
                obj.set("due_date", new Date());
            }
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
                price           : kendo.parseFloat(item.price),
                conversion_ratio: 1,
                measurement     : item.measurement.name
            };
            row.set("item_price", item_price);

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
        invTax : 0,
        invDiscount: 0,
        invSubTotal: 0,
        invAmount: 0,
        invAccountID : 0,
        invLocale: banhji.institute.locale,
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
            var self = banhji.checkOut;

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
                }else if(arg.field=="item_price"){
                    var dataRow = arg.items[0];

                    dataRow.set("measurement_id", dataRow.item_price.measurement_id);
                    dataRow.set("price", dataRow.item_price.price * dataRow.rate);
                    dataRow.set("conversion_ratio", dataRow.item_price.conversion_ratio);
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

                    self.set("obj", view[0]);
                    self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));
                    self.set("amount_due", kendo.toString(view[0].amount - view[0].deposit, "c2", view[0].locale));
                    
                    self.loadDeposit();

                    self.lineDS.query({
                        filter: [
                            { field: "transaction_id", value: id },
                            { field: "assembly_id", value: 0 }
                        ]
                    });

                    self.assemblyLineDS.query({
                        filter:[
                            { field: "transaction_id", value: id },
                            { field: "assembly_id >", value: 0 }
                        ]
                    });

                    self.journalLineDS.query({
                        filter: { field: "transaction_id", value: id }
                    });
                });
            }
        },
        addEmpty            : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.assemblyLineDS.data([]);
            this.depositDS.data([]);
            this.journalLineDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total_deposit", 0);
            this.set("total", 0);
            this.set("amount_due", 0);
            this.set("amtDueColor", banhji.source.amtDueColor);

            //Set Date
            var duedate = new Date();
            duedate.setDate(duedate.getDate() + 30);

            this.dataSource.insert(0, {
                transaction_template_id: 10,
                contact_id          : 6,//Customer
                payment_method_id   : 1,
                reference_id        : "",
                recurring_id        : "",
                account_id          : 7,
                discount_account_id : 72,
                job_id              : 0,
                user_id             : this.get("user_id"),
                employee_id         : "",//Sale Rep
                type                : "Cash_Sale",//Required
                number              : "",
                sub_total           : 0,
                discount            : 0,
                tax                 : 0,
                amount              : 0,
                deposit             : 0,
                remaining           : 0,
                credit_allowed      : 0,
                credit              : 0,
                check_no            : "",
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

                contact             : { id:"", name:"" },
                references          : [],
            });                
            
            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            this.setRate();
            this.generateNumber();
            this.setDefaultContact();

            this.receipCurrencyDS.data([]);
            this.receipChangeDS.data([]);
            this.set("haveChangeMoney", false);
            this.set("haveInvoice", false);
            this.customerAR.splice(0, this.customerAR.length);
            this.customerAR.push({id: 6, name: "Walk-In Customer"});
            $('#havepay').css({"display": "none"});
            this.set('haveParkSale', false);
            this.makeChoice();
        },
        addRowLine          : function(){
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
                item_price          : { measurement_id:"", measurement:"" },
                tax_item            : { id:"", name:"" }
            });
        },
        addRow              : function(e){
            var self = this, 
                obj = this.get("obj"), 
                item = e.data,
                rate = banhji.source.getRate(item.locale, this.get("dateSelected")),
                price = item.price / rate,
                notExist = true;

            //Check exist item            
            $.each(this.lineDS.data(), function(index, value){
                if(value.item_id==item.id){
                    notExist = false;

                    value.set("quantity", value.quantity+1);

                    self.changes();

                    return false;
                }
            });

            if(notExist){
                //Get cost
                this.wacDS.query({
                    filter:[
                        { field:"item_id", value: item.id },
                        { field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd  HH:mm:ss") }
                    ]
                }).then(function(){
                    var wac = self.wacDS.view();

                    self.lineDS.add({
                        transaction_id      : obj.id,
                        tax_item_id         : "",
                        item_id             : item.id,
                        assembly_id         : 0,
                        measurement_id      : 0,
                        description         : "",
                        quantity            : 1,
                        conversion_ratio    : 1,
                        cost                : wac[0].cost * rate,
                        price               : price,
                        amount              : price,
                        avarage_cost        : 0,
                        discount            : 0,
                        rate                : rate,
                        locale              : item.locale,
                        movement            : -1,
                        discount_percentage : 0,
                        item                : item,
                        measurement         : item.measurement,
                        item_price          : item.measurement,
                        tax_item            : { id:"", name:"" },
                        therapist           : { id: "", name: ""},
                        therapistname       : "",
                    });

                    self.changes();
                });
            }
        },
        addRowFromPS        : function(e){
            var data = e.data;

            this.loadObj(data.id);
            this.parkSaleClose();
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
                if(item.item_type_id=="1"){
                    var cogsID = kendo.parseInt(item.expense_account_id);
                    if(cogsID>0){
                        raw = "dr"+cogsID;

                        var cogsAmount = value.amount;
                        if(item.item_type_id=="1" || item.item_type_id=="4"){
                            cogsAmount = (value.quantity*value.conversion_ratio)*value.cost;
                        }

                        if(entries[raw]===undefined){
                            entries[raw] = {
                                transaction_id  : transaction_id,
                                account_id      : cogsID,
                                contact_id      : obj.contact_id,
                                description     : value.description,
                                reference_no    : "",
                                segments        : obj.segments,
                                dr              : cogsAmount * value.rate,
                                cr              : 0,
                                rate            : value.rate,
                                locale          : item.locale
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
                    if(item.item_type_id=="1" || item.item_type_id=="4"){
                        inventoryAmount = (value.quantity*value.conversion_ratio)*value.cost;
                    }

                    if(entries[raw]===undefined){
                        entries[raw] = {
                            transaction_id  : transaction_id,
                            account_id      : inventoryID,
                            contact_id      : obj.contact_id,
                            description     : value.description,
                            reference_no    : "",
                            segments        : obj.segments,
                            dr              : 0,
                            cr              : inventoryAmount * value.rate,
                            rate            : value.rate,
                            locale          : item.locale
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
                            transaction_id  : transaction_id,
                            account_id      : incomeID,
                            contact_id      : obj.contact_id,
                            description     : value.description,
                            reference_no    : "",
                            segments        : obj.segments,
                            dr              : 0,
                            cr              : saleAmount,
                            rate            : obj.rate,
                            locale          : obj.locale
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
                            transaction_id  : transaction_id,
                            account_id      : taxItem.account_id,
                            contact_id      : obj.contact_id,
                            description     : value.description,
                            reference_no    : "",
                            segments        : obj.segments,
                            dr              : 0,
                            cr              : value.tax,
                            rate            : obj.rate,
                            locale          : obj.locale
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
            var objAccountID = kendo.parseInt(obj.account_id);//Cash account
            if(obj.type=="Invoice"){
                objAccountID = kendo.parseInt(contact.account_id);//AR account
            }            
            if(objAccountID>0){
                raw = "dr"+objAccountID;

                var objAmount = obj.amount - obj.deposit;
                if(entries[raw]===undefined){
                    entries[raw] = {
                        transaction_id  : transaction_id,
                        account_id      : objAccountID,
                        contact_id      : obj.contact_id,
                        description     : obj.memo,
                        reference_no    : obj.reference_no,
                        segments        : obj.segments,
                        dr              : objAmount,
                        cr              : 0,
                        rate            : obj.rate,
                        locale          : obj.locale
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
        removeRow           : function(e){
            var data = e.data;
            this.lineDS.remove(data);
            this.changes();
        },
        //Deposit
        addDeposit          : function(id){
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
        //POS
        payCash             : function(e){
            var self = this, obj = this.get("obj"), segments = [];

            obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
            obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));

            //Warning over credit allowed
            if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
                alert("Over credit allowed!");
            }

            this.removeEmptyRow();

            //Save Draft
            if(this.get("saveDraft")){
                obj.set("status", 4); //In progress
                obj.set("progress", "Draft");
                obj.set("is_journal", 0);//No Journal
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
                }

                //Journal
                if(data[0].is_recurring==0 && data[0].is_journal==1){
                    self.addJournal(data[0].id);
                    self.saveDeposit(data[0].id);
                }

                self.lineDS.sync();
                self.assemblyLineDS.sync();

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
        payPopup            : function(){
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
        clear               : function(){
            this.dataSource.cancelChanges();
            this.lineDS.cancelChanges();
            this.assemblyLineDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.assemblyLineDS.data([]);

            banhji.userManagement.removeMultiTask("checkout");
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
        workDS              : dataStore(apiUrl + "spa/work"),
        addInvoice          : function(e){
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
                                    start_date : this.get("dateSelected"),
                                    amount : this.get("invAmount"),
                                    tax : this.get("invTax"),
                                    sub_total : this.get("invSubTotal"),
                                    discount : this.get("invDiscount"),
                                    locale : this.get("invLocale"),
                                    rate : rate,
                                    account_id : 7,
                                    contact_id : this.customerAR[0].id,
                                    phone: this.get("customerPhone"),
                                    user_id : banhji.userData.id,
                                    male : this.get("Male"),
                                    female : this.get("Female"),
                                });
                                this.workDS.sync();
                                this.workDS.bind("requestEnd", function(e){
                                    window.location.href = "<?php echo base_url(); ?>wellnez/services";
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
        alertRequiredMSG    : function(){
           var noti = $("#ntf1").data("kendoNotification");
                noti.hide();
                noti.error(this.lang.lang.error_input);
        },
        addWorkSuccess      : function(){
            var noti = $("#ntf1").data("kendoNotification");
                noti.hide();
                noti.success(this.lang.lang.success_message);
            this.lineDS.data([]);
            this.employeeAR.splice(0,this.employeeAR.length);
            this.employeeDS.query({
                filter: {field: "work_id", value: 0}
            });
            this.roomAR.splice(0,this.roomAR.length);
            this.roomDS.query({
                filter: {field: "work_id", value: 0}
            });
            this.customerAR.splice(0,this.customerAR.length);
            this.customerAR.push({id: 6, name: "Walk-In Customer"});
            this.changes();
            this.set("dateSelected", new Date());
            this.set("customerPhone", "");
            this.bookDS.data([]);
            this.workDS.data([]);
            this.itemsDS.query({
                filter: {
                    field: "item_type_id",
                    operator: "where_in",
                    value: [1, 4]
                },
                pageSize: 8,
            })
        },
        catChange           : function(e){
            var para = [];
            para.push({
                field: "item_type_id",
                operator: "where_in",
                value: [1, 4]
            });
            if(this.get("catSelected")){
                para.push({field: "category_id", value: this.get("catSelected")});
                this.itemsDS.query({
                    filter: para,
                    pageSize: 8,
                });
                this.itemGroupDS.filter({
                    field: "category_id", value: this.get("catSelected")
                });
            }else{ 
                this.itemsDS.query({
                    filter: para,
                    pageSize: 8,
                });
            }
        },
        groupChange         : function(e){
            var para = [];
            para.push({
                field: "item_type_id",
                operator: "where_in",
                value: [1, 4]
            });
            if(this.get("groupSelected")){
                para.push({
                    field: "item_group_id", 
                    value: this.get("groupSelected")
                });
                this.itemsDS.query({
                    filter: para,
                    pageSize: 8,
                });
            }else{
                this.itemsDS.query({
                    filter: para,
                    pageSize: 8,
                });
            }
        },
        search              : function() {
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
                para.push({
                    field: "item_type_id",
                    operator: "where_in",
                    value: [1,4]
                });
                this.itemsDS.query({
                    filter: para,
                    page: 1,
                    pageSize: 8,
                });
            }
        },
        bookDS              : dataStore(apiUrl + "spa/book"),
        addBook             : function(e){
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
                                    start_date : this.get("dateSelected"),
                                    amount : this.get("invAmount"),
                                    tax : this.get("invTax"),
                                    sub_total : this.get("invSubTotal"),
                                    discount : this.get("invDiscount"),
                                    locale : this.get("invLocale"),
                                    rate : rate,
                                    phone : this.get("customerPhone"),
                                    account_id : 7,
                                    contact_id : this.customerAR[0].id,
                                    user_id : banhji.userData.id,
                                    male : this.get("Male"),
                                    female : this.get("Female"),
                                });
                                var f = 0;
                                this.bookDS.sync();
                                this.bookDS.bind("requestEnd", function(e){
                                    self.addWorkSuccess();
                                    window.location.href = "<?php echo base_url(); ?>wellnez/books";
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
        editBook            : function(e){
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
        Male    : 0,
        Female  : 0,
        today   : new Date(),
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
        roomDS          : new kendo.data.DataSource({
            transport: {
                read: {
                    url: apiUrl + "spa/roomname",
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
                    field: "work_id",
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
                this.set("employeeSelected", 0);
            }
        },
        relationRoom: dataStore(apiUrl + "spa/roomservice"),
        addRoom : function(e){
            if(this.get("roomSelected")){
                var self = this;
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
                this.relationRoom.query({
                    filter: {field: "room_id", value: this.get("roomSelected")},
                    pageSize: 1
                }).then(function(e){
                    self.queryItemRoom(self.relationRoom.data()[0].item);
                });
                this.set("roomSelected", 0);
            }
        },
        queryItemRoom: function(id){
            var ids = [];
            $.each(id, function(i,v){
                ids.push(v);
            })
            this.itemsDS.query({
                filter: {field: "id", operator: "where_in", value: ids}
            })
        },
        rmRoom : function(e){
            var data = e.data;
            this.roomAR.remove(data);
        },
        rmEmployee : function(e){
            var data = e.data;
            this.employeeAR.remove(data);
        },
        customerAR : [{id: 6, name: "Walk-In Customer"}],
        addCustomer : function(e){
            if(this.get("customerSelected")){
                var name = e.sender.span[0].innerText;
                var id = this.get("customerSelected");
                var h = 0;
                var IND = e.sender.selectedIndex - 1;
                this.set("invAccountID", this.contactDS.data()[IND].account_id);
                this.customerAR.splice(0, this.customerAR.length);
                // $.each(this.customerAR, function(i,v){
                //     if(v.id == id){
                //         h = 1;
                //     }
                // });
                // if(h != 1){
                this.customerAR.push({
                    id: id,
                    name: name
                });
                h = 0;
                // }
                this.set("customerSelected", 0);
            }
        },
        rmCustomer : function(e){
            var data = e.data;
            this.customerAR.remove(data);
        },
        toDay : new Date(),
        dateSelected: new Date(),
        searchItemByCategory: function(e){
            var data = e.data;
            var self = this;
            $("#loading").css("display", "block");
            this.itemsDS.query({
                filter: {field: "category_id", value: data.id},
                page: 1,
                pageSize: 8,
            }).then(function(e){
                $("#loading").css("display", "none");
                if(self.itemsDS.data().length > 0){
                    self.set("haveItems", true);
                }else{
                    alert('មិនមានទិន្ន័យ (No Data)!');
                }
            });
        },
        backCategory    : function(){
            this.set("haveItems", false);
        },
        barcodItemDS    : dataStore(apiUrl + "items"),
        barcodeChange   : function(e){
            var barcode = this.get("barcode");
            var self = this;
            var data = [];
            this.barcodItemDS.query({
                filter: {field: "barcode", value: barcode},
                page: 1,
                pageSize: 1
            }).then(function(e){

                if(self.barcodItemDS.data().length > 0){
                    data.push({data: self.barcodItemDS.data()[0] });
                    console.log(data);
                    self.addRow(data[0]);
                }else{
                    self.superChoeunNTF('error',self.lang.lang.no_data);
                }
                self.set("barcode", "");
            });
        },
        //Session
        cashierSessionDS: dataStore(apiUrl + "cashier_sessions"),
        updateSessionDS: dataStore(apiUrl + "cashier_sessions"),
        cashierItemDS: dataStore(apiUrl + "cashier_sessions/item"),
        sessionReceiveDS: dataStore(apiUrl + "cashier_sessions/receive"),
        setCashierItems: function() {
            var self = this;
            this.cashierItemDS.data([]);
            $.each(this.currencyDS.data(), function(i, v) {
                self.cashierItemDS.add({
                    cashier_session_id: "",
                    currency: v.code,
                    amount: 0,
                });
            });
        },
        checkChange: function(e) {
            var data = e.data;
            var self = this;
            var obj = this.get("obj");
            var currencyReceipt = 0;
            $.each(this.receipCurrencyDS.data(), function(i, v) {
                if(v.amount == null){
                    v.amount = 0;
                }
                var amountAfterRate = parseFloat(v.amount) / parseFloat(v.rate);
                currencyReceipt += amountAfterRate;
            });
            //Check wrong input
            if(currencyReceipt < obj.sub_total){
                alert(this.lang.lang.error_input);
                $.each(this.receipCurrencyDS.data(), function(i,v){
                    if(i == 0){
                        self.receipCurrencyDS.data()[i].set("amount", obj.sub_total);
                    }else{
                        self.receipCurrencyDS.data()[i].set("amount", 0);
                    }
                });
                this.set("haveChangeMoney", false);
            }else if(currencyReceipt > obj.sub_total){
                this.set("haveChangeMoney", true);
                var ramount = currencyReceipt - obj.sub_total;
                this.setDefaultChangeCurrency(ramount);
            }else{
                this.set("haveChangeMoney", false);
                this.receipChangeDS.data([]);
            }
        },
        CashierID: 1,
        receipCurrencyDS: dataStore(apiUrl + "cashier_sessions/currency"),
        receipChangeDS: dataStore(apiUrl + "cashier_sessions/currency"),
        syncSession: function(){
        },
        setDefaultChangeCurrency: function(firstReceipt) {
            var self = this,
                FR = firstReceipt;
            this.set("changeMoney", FR);
            this.receipChangeDS.data([]);
            var j = 1;
            $.each(this.currencyDS.data(), function(i, v) {
                if (j == 1) {
                    self.receipChangeDS.add({
                        cashier_session_id: 1,
                        type: 1,
                        currency: v.code,
                        locale: v.locale,
                        rate: v.rate,
                        amount: FR
                    });
                } else {
                    self.receipChangeDS.add({
                        cashier_session_id: 1,
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
        setDefaultReceiptCurrency: function(firstReceipt) {
            var self = this,
                FR = 0;

            this.receipCurrencyDS.data([]);
            this.set("haveChangeMoney", false);
            this.receipChangeDS.data([]);
            var j = 1;
            $.each(this.currencyDS.data(), function(i, v) {
                var amount = kendo.toString(self.get("obj").amount * v.rate, "c", v.locale);
                if (j == 1) {
                    self.receipCurrencyDS.add({
                        cashier_session_id: 1,
                        type: 0,
                        currency: v.code,
                        locale: v.locale,
                        rate: v.rate,
                        amount_rate: amount,
                        amount: FR
                    });
                } else {
                    self.receipCurrencyDS.add({
                        cashier_session_id: 1,
                        type: 0,
                        currency: v.code,
                        locale: v.locale,
                        amount_rate: amount,
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
                this.superChoeunNTF('error', this.lang.lang.error_input);
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
        saveCashSale        : function(status){
            var self = this, obj = this.get("obj");
            
            obj.set("issued_date", kendo.toString(new Date(this.get("dateSelected")), "s"));
            obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));

            //Warning over credit allowed
            if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
                alert("Over credit allowed!");
            }

            this.removeEmptyRow();

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
                    banhji.printBill.line = [];
                    //Item line
                    $.each(self.lineDS.data(), function(index, value){
                        value.set("transaction_id", data[0].id);
                        banhji.printBill.line.push(value);
                    });

                    //Assembly Item line
                    $.each(self.assemblyLineDS.data(), function(index, value){
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
                self.receipCurrencyDS.sync();
                self.receipChangeDS.sync();
                self.parkSaleDS.query({
                    filter: [
                        { field:"status", value:4 },
                        { field: "type", value: "Cash_Sale"}
                    ],
                    sort: {
                        field: "id",
                        dir: "desc"
                    },
                }).then(function(e){
                    self.set("numberParkSale", self.parkSaleDS.data().length);
                });
                return data;
            }, function(reason) { //Error
                // $("#ntf1").data("kendoNotification").error(reason);
            }).then(function(result){
                if(status != 3){
                    banhji.router.navigate("/print_bill/"+self.dataSource.data()[0].id);
                }
                self.addEmpty();
                // $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);
            });
        },
        saveInvoice         : function(){
            var obj = this.get("obj");

            obj.set("type", "Invoice");
            obj.set("payment_term_id", 5);
            obj.set("transaction_template_id", 3);
            // obj.set("account_id", "");
            this.receipCurrencyDS.data([]);
            this.receipChangeDS.data([]);
            obj.set("number", "");
            this.setTerm();
            this.saveCashSale(2);            
        },
        parkSale            : function(){
            var obj = this.get("obj");

            obj.set("status", 4); //In progress
            obj.set("progress", "Draft");
            obj.set("is_journal", 0);//No Journal
            this.saveCashSale(3);
        },
        rmParkSale          : function(e){
            console.log(e.data);
        },
        haveParkSale        : false,
        parkSaleShow        : function(e){
            this.set('haveParkSale', true);
        },   
        parkSaleClose       : function(){
            this.set('haveParkSale', false);
        },
        payClick            : function(e){
            if(this.lineDS.data().length){
                $('#havepay').css('display', 'block');
            }else{
                this.superChoeunNTF('error', this.lang.lang.error_input);
            }
        },
        closePay            : function(e){
            $('#havepay').css({"display": "none"});
            this.makeChoice();
        },
        superChoeunNTF      : function(module, message){
            var it = $('#supercheoun-ntf');
            it.css("right", "-800px");
            it.css({
                "padding": "10px", 
                "color": "#fff", 
                "position": "fixed", 
                "bottom": "20%", 
                "box-shadow": "3px 3px #888888",
                "z-index": "9999"
            });
            it.animate({right: '0px'});
            if(module == 'success'){
                it.css("background", "#4CAF50");
                it.children(".message").html("<p style='margin: 0px;'>"+message+"</p>");
            }else{
                it.css("background", "#be1e2d");
                it.children(".message").html("<p style='margin: 0px;'>"+message+"</p>");
            }
            var i = 5;
            var x = setInterval(function() {
                it.children(".second").html(i);
                i -= 1;
                if(i == 0){
                    it.animate({right: '-800px'});
                    clearInterval(x);
                }
            }, 1000);
        },
        haveInvoice         : false,
        haveMakeChoice      : true,
        clickInvoice        : function(e){
            this.set("haveInvoice", true);
            this.set("haveCash", false);
            this.set("haveMakeChoice", false);
        },
        cancelClickInvoice  : function(){
            this.set("haveInvoice", false);
        },
        haveCash            : false,
        cashClick           : function(e){
            this.set("haveCash", true);
            this.set("haveInvoice", false);
            this.set("haveMakeChoice", false);
        },
        makeChoice          : function(){
            this.set("haveCash", false);
            this.set("haveInvoice", false);
            this.set("haveMakeChoice", true);
        }
    });
    banhji.printBill = kendo.observable({
        lang: langVM,
        dataSource: dataStore(apiUrl + "transactions"),
        amountperson: 0,
        line: [],
        company: banhji.institute,
        pageLoad: function(id) {
            var self = this;
            if (id){
                this.dataSource.query({
                    filter: {field: "id", value: id},
                    pageSize: 1
                }).then(function(e){
                    var TempForm = $("#invoiceForm").html();
                    $("#invoiceContent").kendoListView({
                        dataSource: self.dataSource.data(),
                        template: kendo.template(TempForm)
                    });
                    if(self.line.length == 0){
                        self.getItem(self.dataSource.data()[0].id);
                    }
                    self.barcod("do");
                });
            } else {
                banhji.router.navigate('/');
            }
        },
        itemDS          : dataStore(apiUrl + "item_lines"),
        getItem         : function(transaction_id){
            var self = this;
            this.itemDS.query({
                filter: [
                    {field: "transaction_id", value: transaction_id},
                    {field: "deleted", value: 0}
                ]
            }).then(function(e){
                var data = self.itemDS.data();
                self.line.splice(0, self.line.length);
                $.each(data, function(i,v){
                    self.line.push(v);
                });
                var listview = $("#invoiceContent").data("kendoListView");
                listview.refresh();
                self.barcod("reset");
                self.barcod("do");
            });
        },
        barcod: function(re) {
            var view = this.dataSource.data();
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
                        width: 350,
                        height: 40,
                        text: {
                            visible: false
                        }
                    });
                    $(".secondwnumber" + d.id).kendoBarcode({
                        renderAs: "svg",
                        value: d.number,
                        type: "code128",
                        width: 350,
                        height: 40,
                        text: {
                            visible: false
                        }
                    });
                    $("#footwnumber" + d.id).kendoBarcode({
                        renderAs: "svg",
                        value: d.number,
                        type: "code128",
                        width: 450,
                        height: 40,
                        text: {
                            visible: false
                        }
                    });
                    // console.log(d.number);
                }
            }
        },
        printGrid       : function(){
            var self = this, Win, pHeight, pWidth, ts;
            Win = window.open('', '', 'width=1048, height=900');
            pHeight = "210mm";
            pWidth = "150mm";
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
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>resources/js/kendoui/styles/kendo.bootstrap.min.css">'+
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">'+
                    '<link href="<?php echo base_url(); ?>assets/css/water/water.css" rel="stylesheet" />'+
                    '<link href="<?php echo base_url(); ?>assets/css/offline/offline.css" rel="stylesheet" />'+
                    '<link href="<?php echo base_url(); ?>assets/css/water/winvoice-print.css" rel="stylesheet" />'+
                    '<link href="<?php echo base_url(); ?>assets/kendo/styles/kendo.common.min.css" rel="stylesheet" />'+
                    '<link href="<?php echo base_url(); ?>assets/spa/wellnez.css" rel="stylesheet" />'+
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">'+
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<link href="https://fonts.googleapis.com/css?family=Preahvihear" rel="stylesheet">'+
                    '<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Battambang&amp;subset=khmer" media="all">'+
                    '<style type="text/css" media="print">' +
                        '@page { size: portrait; margin:0.05cm;' +
                            
                        '} '+
                        '@media print {' +
                            'html, body {' +
                            '}' +
                            '.main-color {' +
                                '-webkit-print-color-adjust:exact; ' +
                            '} ' +
                        '}' +
                        '* {' +
                            '-webkit-print-color-adjust:exact; ' +
                        '} ' +
                        '.inv1 .light-blue-td { ' +
                            'background-color: #c6d9f1!important;' +
                            'text-align: left;' +
                            'padding-left: 5px;' +
                            '-webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.logoP{ max-height 50px;max-width100px}' +
                        '.inv1 thead tr {'+
                            'background-color: rgb(242, 242, 242)!important;'+
                            '-webkit-print-color-adjust:exact; ' +
                        '}'+
                        '.pcg .mid-title div {}' +
                        '.pcg .mid-header {' +
                            'background-color: #dce6f2!important; ' +
                            '-webkit-print-color-adjust:exact; ' +
                        '}'+
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
                    '<body><div class="row-fluid" ><div id="invoicecontent" class="k-content">';
            var htmlEnd =
                    '</div></div></body>' +
                    '</html>';
            printableContent = $('#invoiceContent').html();
            doc.write(htmlStart + printableContent + htmlEnd);
            doc.close();
            setTimeout(function(){
                win.print();    
                // win.close();
            },1000);
        },
        hideFrameInvoice: function(e) {
            var printBtn = e.target;
            if (printBtn.checked) {
                $(".hiddenPrint").css("visibility", "hidden");
            } else {
                $(".hiddenPrint").css("visibility", "visible");
            }
        },
        cancel          : function() {
            this.dataSource.data([]);
            this.barcod("reset");
            var listview = $("#invoiceContent").data("kendoListView");
            listview.refresh();
            banhji.router.navigate("/");
        }
    });
    banhji.transactions = kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/customer_transaction_list_grid"),
        contactDS           : banhji.source.customerDS,
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { contactIds: [] },
        company             : banhji.institute,
        displayDate         : "",
        totalCustomer       : 0,
        totalSale           : 0,
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

            this.dataSource.filter(para);
        },
        payInvoice          : function(e){
            var data = e.data;

            if(obj!==null){
                banhji.router.navigate('/cash_receipt');
                banhji.cashReceipt.loadInvoice(data.id);
            }
        }
    });
    banhji.invoiceForm =  kendo.observable({
        pageLoad            : function(id){
            if(id){
                banhji.router.navigate("/print_bill/"+id);
            }else{
                banhji.router.navigate("/");
            }
        }
    });


    banhji.customers = kendo.observable({
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

                        var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

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

                            if(new Date(value.due_date) < today){
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
                //Phone
                if(this.phonenumber(searchText)){
                    para.push({ field: "phone", operator: "contains", value: searchText });
                }else{
                    var textParts = searchText.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);
                    if(textParts.length===2){
                        if(textParts[0]!=="" && textParts[1]!==""){
                            para.push({ field: "abbr", value: textParts[0] });
                            para.push({ field: "number", value: textParts[1] });
                        }else{
                            para.push({ field: "name", operator: "contains", value: searchText });
                        }
                    }else{
                        para.push({ field: "name", operator: "contains", value: searchText });
                    }
                }
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
        phonenumber         : function (inputtxt){
            var phoneno = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
            if(inputtxt.match(phoneno)){
                return true;
            }else{
                return false;
            }
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
                banhji.statement.setContact(obj);
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

    //Add Customer
    banhji.customer = kendo.observable({
        lang                    : langVM,
        dataSource              : dataStore(apiUrl + "contacts"),
        attachmentDS            : dataStore(apiUrl + "attachments"),
        patternDS               : dataStore(apiUrl + "contacts"),
        numberDS                : dataStore(apiUrl + "contacts"),
        deleteDS                : dataStore(apiUrl + "transactions"),
        existingDS              : dataStore(apiUrl + "contacts"),
        contactTypeDS           : dataStore(apiUrl + "contacts/type"),
        paymentTermDS           : banhji.source.paymentTermDS,
        paymentMethodDS         : banhji.source.paymentMethodDS,
        countryDS               : banhji.source.countryDS,
        currencyDS              : new kendo.data.DataSource({
            data: banhji.source.currencyList,
            filter: { field:"status", value: 1 }
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
                if(this.dataSource.total()==0){
                    this.addEmpty();
                }else{
                    var obj = this.get("obj");
                    if(obj.isNew()==false){
                        this.addEmpty();
                    }
                }
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
                self.checkExistingTxn();
            });
        },
        addEmpty                : function(){
            this.dataSource.insert(0, {
                "country_id"            : 0,
                "user_id"               : 0,
                "contact_type_id"       : 4, //General Customer
                "abbr"                  : "",
                "number"                : "",
                "membership_number"     : "",
                "surname"               : "",
                "name"                  : "",
                "gender"                : "M",
                "dob"                   : "",
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
                "status"                : 1,
                "image_url"             : banhji.no_image,

                "custom_fields"         : []
            });

            var obj = this.dataSource.at(0);
            this.set("obj", obj);
            this.applyPattern();
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

            obj.set("registered_date", kendo.toString(new Date(obj.registered_date), "yyyy-MM-dd"));
            if(obj.dob!==""){
                obj.set("dob", kendo.toString(new Date(obj.dob), "yyyy-MM-dd"));
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
                    //Attachment
                    $.each(self.attachmentDS.data(), function(index, value){
                        value.set("item_id", data[0].id);
                    });
                }
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
                }else{
                    //Save New
                    self.addEmpty();
                }
            });
        },
        clear                   : function(){
            this.dataSource.cancelChanges();
            this.dataSource.data([]);

            this.set("isEdit", false);
            this.set("isProtected", false);
            this.set("notDuplicateNumber", true);
            this.set("contact_type_id", 0);
        },
        cancel                  : function(){
            this.clear();

            banhji.userManagement.removeMultiTask("customer");

            history.back();
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
                var view = self.patternDS.view();

                obj.set("country_id", view[0].country_id);
                // obj.set("abbr", type.abbr);
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
            });

            this.contactTypeDS.query({
                filter: { field:"id", value: obj.contact_type_id },
                page: 1,
                pageSize: 1
            }).then(function(data){
                var view = self.contactTypeDS.view();

                obj.set("abbr", view[0].abbr);
            });
        }
    });

    // Function
    banhji.quote =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        lineDS              : dataStore(apiUrl + "item_lines"),
        assemblyLineDS      : dataStore(apiUrl + "item_lines"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "item_lines"),
        txnDS               : dataStore(apiUrl + "transactions"),
        numberDS            : dataStore(apiUrl + "transactions/number"),
        balanceDS           : dataStore(apiUrl + "transactions/balance"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        itemDS              : dataStore(apiUrl + "items"),
        assemblyDS          : dataStore(apiUrl + "item_assemblies"),
        itemPriceDS         : dataStore(apiUrl + "item_prices"),
        wacDS               : dataStore(apiUrl + "items/weighted_average_costing"),
        employeeDS          : banhji.source.employeeDS,
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
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{ field: "type", value: "Quote" }
        }),
        categoryDS          : new kendo.data.DataSource({
            data: banhji.source.categoryList,
            filter: [
                { field:"item_type_id", value: 1 },
                { field:"id", operator:"neq", value: 5 },
                { field:"id", operator:"neq", value: 6 }
            ]
        }),
        itemGroupDS         : banhji.source.itemGroupDS,
        contactDS           : banhji.source.customerDS,
        paymentTermDS       : banhji.source.paymentTermDS,
        statusObj           : banhji.source.statusObj,
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
        savePrint           : false,
        saveRecurring       : false,
        showConfirm         : false,
        notDuplicateNumber  : true,
        recurring           : "",
        recurring_validate  : false,
        balance             : 0,
        total               : 0,
        barcode             : "",
        barcodeVisible      : false,
        category_id         : 0,
        item_group_id       : 0,
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
                    tax_item_id         : 0,
                    item_id             : data.id,
                    assembly_id         : 0,
                    measurement_id      : data.measurement_id,
                    description         : data.sale_description,
                    quantity            : 1,
                    conversion_ratio    : 1,
                    cost                : wac[0].cost * rate,
                    price               : data.price,
                    amount              : data.price,
                    discount            : 0,
                    discount_percentage : 0,
                    tax                 : 0,
                    rate                : rate,
                    locale              : data.locale,
                    movement            : 0,
                    reference_no        : "",

                    item                : data,
                    item_price          : item_price,
                    tax_item            : { id:"", name:"" }
                });
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
        setContact      : function(contact){
            var obj = this.get("obj");

            obj.set("contact", contact);
            this.contactChanges();
        },
        contactChanges      : function(){
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
        employeeChanges         : function(){
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
                price           : kendo.parseFloat(item.price),
                conversion_ratio: 1,
                measurement     : item.measurement.name
            };
            row.set("item_price", item_price);

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
                        movement            : 0,

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
                            movement            : 0,

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

            //Warning over credit allowed
            if(obj.credit_allowed>0 && total>obj.credit_allowed){
                this.set("amtDueColor", "Gold");
            }else{
                this.set("amtDueColor", banhji.source.amtDueColor);
            }

            obj.set("sub_total", subTotal);
            obj.set("discount", discount);
            obj.set("tax", tax);
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
        lineDSChanges       : function(arg){
            var self = banhji.quote;

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
                }else if(arg.field=="item_price"){
                    var dataRow = arg.items[0];

                    dataRow.set("measurement_id", dataRow.item_price.measurement_id);
                    dataRow.set("price", dataRow.item_price.price * dataRow.rate);
                    dataRow.set("conversion_ratio", dataRow.item_price.conversion_ratio);
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
                    //Default here
            }
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
                    self.setStatus();

                    self.lineDS.query({
                        filter: [
                            { field: "transaction_id", value: id },
                            { field: "assembly_id", value: 0 }
                        ]
                    });

                    self.assemblyLineDS.query({
                        filter:[
                            { field: "transaction_id", value: id },
                            { field: "assembly_id >", value: 0 }
                        ]
                    });

                    self.attachmentDS.filter({ field: "transaction_id", value: id });
                });
            }
        },
        addEmpty            : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.assemblyLineDS.data([]);
            this.attachmentDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);
            this.set("amtDueColor", banhji.source.amtDueColor);

            //Set Date
            var duedate = new Date();
            duedate.setDate(duedate.getDate() + 30);

            this.dataSource.insert(0, {
                contact_id          : "",
                transaction_template_id : 1,
                payment_term_id     : 0,
                reference_id        : "",
                recurring_id        : "",
                job_id              : 0,
                user_id             : this.get("user_id"),
                employee_id         : "",
                type                : "Quote",//Required
                number              : "",
                sub_total           : 0,
                amount              : 0,
                credit_allowed      : 0,
                discount            : 0,
                tax                 : 0,
                rate                : 1,
                locale              : banhji.locale,
                issued_date         : new Date(),
                due_date            : duedate,
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

                contact             : { id:"", name:"" }
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
                tax_item_id         : "",
                item_id             : "",
                assembly_id         : 0,
                measurement_id      : 0,
                description         : "",
                quantity            : 1,
                conversion_ratio    : 0,
                cost                : 0,
                price               : 0,
                amount              : 0,
                discount            : 0,
                rate                : obj.rate,
                locale              : obj.locale,
                movement            : 0,

                discount_percentage : 0,
                item                : { id:"", name:"" },
                item_price          : { measurement_id:"", measurement:"" },
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
            if(this.lineDS.total()>1){
                this.lineDS.remove(data);
                this.changes();
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
            obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));

            //Warning over credit allowed
            if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
                alert("Over credit allowed!");
            }

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
            this.attachmentDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.assemblyLineDS.data([]);
            this.attachmentDS.data([]);

            banhji.userManagement.removeMultiTask("quote");
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
                obj.set("employee_id", view[0].employee_id);//Sale Rep
                obj.set("job_id", view[0].job_id);
                obj.set("segments", view[0].segments);
                obj.set("locale", view[0].locale);
                obj.set("memo", view[0].memo);
                obj.set("memo2", view[0].memo2);
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
                        cost                : value.cost,
                        price               : value.price,
                        amount              : value.amount,
                        discount            : value.discount,
                        rate                : value.rate,
                        locale              : value.locale,
                        movement            : 0,

                        item                : value.item,
                        item_price          : value.item_price,
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
    banhji.saleOrder =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        txnDS               : dataStore(apiUrl + "transactions"),
        numberDS            : dataStore(apiUrl + "transactions/number"),
        lineDS              : dataStore(apiUrl + "item_lines"),
        assemblyLineDS      : dataStore(apiUrl + "item_lines"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "item_lines"),
        referenceLineDS     : dataStore(apiUrl + "item_lines"),
        balanceDS           : dataStore(apiUrl + "transactions/balance"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        wacDS               : dataStore(apiUrl + "items/weighted_average_costing"),
        itemDS              : dataStore(apiUrl + "items"),
        assemblyDS          : dataStore(apiUrl + "item_assemblies"),
        itemPriceDS         : dataStore(apiUrl + "item_prices"),
        segmentDS           : dataStore(apiUrl + "segments"),
        segItemDS           : dataStore(apiUrl + "segments/item"),
        segmentItemDS       : dataStore(apiUrl + "segments/item"),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{ field: "type", value: "Sale_Order" }
        }),
        jobDS               : new kendo.data.DataSource({
            data: banhji.source.jobList,
            sort: { field: "name", dir: "asc" }
        }),
        referenceDS         : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "transactions",
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
            filter:{ field: "type", value: "Quote" },
            sort:{ field:"issued_date", dir:"desc" },
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 30
        }),
        categoryDS          : new kendo.data.DataSource({
            data: banhji.source.categoryList,
            filter: [
                { field:"item_type_id", value: 1 },
                { field:"id", operator:"neq", value: 5 },
                { field:"id", operator:"neq", value: 6 }
            ]
        }),
        itemGroupDS         : banhji.source.itemGroupDS,
        employeeDS          : banhji.source.employeeDS,
        contactDS           : banhji.source.customerDS,
        statusObj           : banhji.source.statusObj,
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
        savePrint           : false,
        saveRecurring       : false,
        showConfirm         : false,
        notDuplicateNumber  : true,
        recurring           : "",
        recurring_validate  : false,
        enableRef           : false,
        balance             : 0,
        total               : 0,
        reference_id        : "",
        segment_id          : "",
        segmentitem_id      : "",
        barcode             : "",
        barcodeVisible      : false,
        category_id         : 0,
        item_group_id       : 0,
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
                    tax_item_id         : 0,
                    item_id             : data.id,
                    assembly_id         : 0,
                    measurement_id      : data.measurement_id,
                    description         : data.sale_description,
                    quantity            : 1,
                    conversion_ratio    : 1,
                    cost                : wac[0].cost * rate,
                    price               : data.price,
                    amount              : data.price,
                    discount            : 0,
                    discount_percentage : 0,
                    tax                 : 0,
                    rate                : rate,
                    locale              : data.locale,
                    movement            : 0,
                    reference_no        : "",

                    item                : data,
                    item_price          : item_price,
                    tax_item            : { id:"", name:"" }
                });
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
                this.loadBalance();
                this.loadReference();
                this.jobDS.filter({ field:"contact_id", value: contact.id });
            }

            this.changes();
        },
        employeeChanges         : function(){
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
        },
        //Segment
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

            //Item base price
            var item_price = {
                measurement_id  : item.measurement_id,
                price           : kendo.parseFloat(item.price),
                conversion_ratio: 1,
                measurement     : item.measurement.name
            };
            row.set("item_price", item_price);

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
                        movement            : 0,
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
                            movement            : 0,

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

            //Warning over credit allowed
            if(obj.credit_allowed>0 && total>obj.credit_allowed){
                this.set("amtDueColor", "Gold");
            }else{
                this.set("amtDueColor", banhji.source.amtDueColor);
            }

            obj.set("sub_total", subTotal);
            obj.set("discount", discount);
            obj.set("tax", tax);
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
        lineDSChanges       : function(arg){
            var self = banhji.saleOrder;

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
                }else if(arg.field=="item_price"){
                    var dataRow = arg.items[0];

                    dataRow.set("measurement_id", dataRow.item_price.measurement_id);
                    dataRow.set("price", dataRow.item_price.price * dataRow.rate);
                    dataRow.set("conversion_ratio", dataRow.item_price.conversion_ratio);
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
                case 2:
                    statusObj.set("text", "partialy used");
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

                    self.set("obj", view[0]);
                    self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));
                    self.setStatus();

                    self.lineDS.query({
                        filter: [
                            { field: "transaction_id", value: id },
                            { field: "assembly_id", value: 0 }
                        ]
                    });

                    self.assemblyLineDS.query({
                        filter:[
                            { field: "transaction_id", value: id },
                            { field: "assembly_id >", value: 0 }
                        ]
                    });

                    self.attachmentDS.filter({ field: "transaction_id", value: id });
                    self.loadReference();

                    //Segment
                    var segments = [];
                    $.each(view[0].segments, function(index, value){
                        segments.push(value);
                    });
                    self.segmentItemDS.filter({ field: "id", operator:"where_in", value: segments });
                });
            }
        },
        addEmpty            : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.assemblyLineDS.data([]);
            this.attachmentDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);
            this.set("amtDueColor", banhji.source.amtDueColor);

            //Set Date
            var duedate = new Date();
            duedate.setDate(duedate.getDate() + 30);

            this.dataSource.insert(0, {
                contact_id          : "",
                transaction_template_id : 2,
                reference_id        : "",
                recurring_id        : "",
                job_id              : 0,
                user_id             : this.get("user_id"),
                employee_id         : "",
                type                : "Sale_Order",//Required
                number              : "",
                sub_total           : 0,
                amount              : 0,
                credit_allowed      : 0,
                discount            : 0,
                tax                 : 0,
                rate                : 1,
                locale              : banhji.locale,
                issued_date         : new Date(),
                due_date            : duedate,
                bill_to             : "",
                ship_to             : "",
                memo                : "",
                memo2               : "",
                reuse               : 0,
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

                contact             : { id:"", name:"" },
                references          : []
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
                movement            : 0,
                required_date       : "",
                reference_no        : "",

                discount_percentage : 0,
                item                : { id:"", name:"" },
                item_price          : { measurement_id:"", measurement:"" },
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
            if(this.lineDS.total()>1){
                this.lineDS.remove(data);
                this.changes();
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

            banhji.userManagement.removeMultiTask("sale_order");
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
                            banhji.router.navigate("/lease_unit_center");
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
        //Reference
        loadReference       : function(){
            var obj = this.get("obj");

            if(obj.contact_id>0){
                this.referenceDS.filter([
                    { field: "contact_id", value: obj.contact_id },
                    { field: "type", value: "Quote" },
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

            if(reference_id && isExisting==false){
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
                            transaction_id      : 0,
                            reference_id        : reference.id,
                            item_id             : value.item_id,
                            tax_item_id         : value.tax_item_id,
                            measurement_id      : value.measurement_id,
                            description         : value.description,
                            quantity            : value.quantity,
                            cost                : value.cost,
                            price               : value.price,
                            amount              : value.amount,
                            discount            : value.discount,
                            conversion_ratio    : value.conversion_ratio,
                            rate                : value.rate,
                            locale              : value.locale,
                            movement            : 0,
                            required_date       : value.required_date,
                            reference_no        : reference.number,

                            item                : value.item,
                            item_price          : value.item_price,
                            tax_item            : value.tax_item
                        });
                    });

                    self.changes();
                });
            }

            this.set("reference_id", "");
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
                obj.set("employee_id", view[0].employee_id);//Sale Rep
                obj.set("job_id", view[0].job_id);
                obj.set("segments", view[0].segments);
                obj.set("locale", view[0].locale);
                obj.set("memo", view[0].memo);
                obj.set("memo2", view[0].memo2);
                obj.set("bill_to", view[0].bill_to);
                obj.set("ship_to", view[0].ship_to);
                obj.set("reuse", view[0].reuse);

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
                        cost                : value.cost,
                        price               : value.price,
                        amount              : value.amount,
                        discount            : value.discount,
                        rate                : value.rate,
                        locale              : value.locale,
                        movement            : 0,
                        required_date       : value.required_date,

                        item                : value.item,
                        item_price          : value.item_price,
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
    banhji.customerDeposit =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        txnDS               : dataStore(apiUrl + "transactions"),
        numberDS            : dataStore(apiUrl + "transactions/number"),
        lineDS              : dataStore(apiUrl + "account_lines"),
        referenceDS         : dataStore(apiUrl + "transactions"),
        referenceLineDS     : dataStore(apiUrl + "account_lines"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "account_lines"),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{ field: "type", value: "Deposit" }
        }),
        accountDS           : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: {
                logic: "or",
                filters: [
                    { field: "account_type_id", value: 10 },//Cash
                    { field: "account_type_id", value: 34 },//Retained Earning
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
        depositAccountDS    : new kendo.data.DataSource({
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
        employeeDS          : banhji.source.employeeDS,
        contactDS           : banhji.source.customerDS,
        amtDueColor         : banhji.source.amtDueColor,
        confirmMessage      : banhji.source.confirmMessage,
        dateUnitList       : banhji.source.dateUnitList,
        monthList           : banhji.source.monthList,
        monthOptionList     : banhji.source.monthOptionList,
        weekDayList         : banhji.source.weekDayList,
        dayList             : banhji.source.dayList,
        showMonthOption     : false,
        showMonth           : false,
        showWeek            : false,
        showDay             : false,
        obj                 : null,
        isEdit              : false,
        saveClose           : false,
        savePrint           : false,
        saveRecurring       : false,
        showConfirm         : false,
        notDuplicateNumber  : true,
        statusSrc           : "",
        recurring           : "",
        recurring_validate  : false,
        enableRef           : false,
        total               : 0,
        original_total      : 0,
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
                obj.set("account_id", contact.deposit_account_id);
                obj.set("locale", contact.locale);

                this.setRate();
                this.loadReference();
                this.jobDS.filter({ field:"contact_id", value: contact.id });
            }

            this.changes();
        },
        employeeChanges         : function(){
            var obj = this.get("obj");

            if(obj.employee){
                var employee = obj.employee;

                obj.set("employee_id", employee.id);
            }else{
                obj.set("employee_id", 0);
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
                    self.set("original_total", view[0].amount);
                    self.set("total", kendo.toString(view[0].amount, "c", view[0].locale));

                    self.lineDS.query({
                        filter: { field: "transaction_id", value: id }
                    });

                    self.journalLineDS.query({
                        filter: { field: "transaction_id", value: id }
                    });

                    self.referenceDS.filter({ field: "id", value: view[0].reference_id });
                });
            }
        },
        changes             : function(){
            var obj = this.get("obj");

            if(this.lineDS.total()>0){
                var sum = 0;

                $.each(this.lineDS.data(), function(index, value) {
                    sum += value.amount;
                });

                this.set("total", kendo.toString(sum, "c", obj.locale));
                obj.set("amount", sum);
            }else{
                this.set("total", 0);
                obj.set("amount", 0);
            }
        },
        addEmpty            : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.attachmentDS.data([]);
            this.journalLineDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total", 0);

            this.dataSource.insert(0, {
                contact_id              : "",
                transaction_template_id : 7,
                recurring_id            : "",
                reference_id            : "",
                account_id              : "",
                employee_id             : "",
                user_id                 : this.get("uer_id"),
                type                    : "Customer_Deposit", //required
                number                  : "",
                amount                  : 0,
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
                is_recurring            : 0,

                contact                 : { id:"", name:"" }
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
                account_id          : "",
                description         : "",
                reference_no        : "",
                amount              : 0,
                rate                : obj.rate,
                locale              : obj.locale
            });
        },
        removeRow           : function(e){
            var data = e.data;
            if(this.lineDS.total()>1){
                this.lineDS.remove(data);
                this.changes();
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

            //Reference
            if(obj.reference_id>0){
                var ref = this.referenceDS.get(obj.reference_id);
                ref.set("deposit", obj.amount);
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
            this.attachmentDS.cancelChanges();

            this.dataSource.data([]);
            this.lineDS.data([]);
            this.attachmentDS.data([]);

            banhji.userManagement.removeMultiTask("customer_deposit");
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
                if(value.account_id>0){
                    nonItem = false;
                }
            });

            if(nonItem){
                $("#ntf1").data("kendoNotification").error("Please select at least one account!");

                result = false;
            }

            return result;
        },
        //Journal
        addJournal          : function(transaction_id){
            var self = this,
            sum = 0,
            obj = this.get("obj");

            //Edit Mode
            if(obj.isNew()==false){
                //Delete previous journal
                $.each(this.journalLineDS.data(), function(index, value){
                    value.set("deleted", 1);
                });
            }

            //Cash account on DR
            $.each(this.lineDS.data(), function(index, value){
                sum += value.amount;

                self.journalLineDS.add({
                    transaction_id      : transaction_id,
                    account_id          : value.account_id,
                    contact_id          : value.contact_id,
                    description         : "",
                    reference_no        : value.reference_no,
                    segments            : obj.segments,
                    dr                  : value.amount,
                    cr                  : 0,
                    rate                : value.rate,
                    locale              : value.locale
                });
            });

            //Deposit on CR
            this.journalLineDS.add({
                transaction_id      : transaction_id,
                account_id          : obj.account_id,
                contact_id          : obj.contact_id,
                description         : "",
                reference_no        : "",
                segments            : obj.segments,
                dr                  : 0,
                cr                  : sum,
                rate                : obj.rate,
                locale              : obj.locale
            });

            this.journalLineDS.sync();
        },
        //Reference
        loadReference       : function(){
            var obj = this.get("obj");

            if(obj.contact_id>0){
                this.set("enableRef", true);

                this.referenceDS.filter([
                    { field: "contact_id", value: obj.contact_id },
                    { field: "status", value: 0 },
                    { field: "deposit", value: 0 },
                    { field: "type", value: "Sale_Order" },
                    { field: "reuse", operator:"or_where", value:1 },
                    { field: "due_date >=", value: kendo.toString(obj.issued_date, "yyyy-MM-dd") }
                ]);
            }else{
                this.set("enableRef", false);
                obj.set("reference_id", "");
            }
        },
        referenceChanges    : function(){
            var obj = this.get("obj");

            if(obj.reference_id>0){
                var reference = this.referenceDS.get(obj.reference_id);

                obj.set("reference_no", reference.number);
                obj.set("segments", reference.segments);
                obj.set("amount", reference.amount);

                this.lineDS.data([]);
                this.lineDS.add({
                    transaction_id      : obj.id,
                    reference_id        : reference.id,
                    account_id          : "",
                    description         : "",
                    reference_no        : reference.number,
                    amount              : reference.amount,
                    conversion_ratio    : reference.conversion_ratio,
                    rate                : reference.rate,
                    locale              : reference.locale
                });
                this.set("total", kendo.toString(reference.amount, "c", reference.locale));
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

                obj.set("contact", view[0].contact);
                obj.set("contact_id", view[0].contact.id);
                obj.set("recurring_id", id);
                obj.set("employee_id", view[0].employee_id);//Sale Rep
                obj.set("job_id", view[0].job_id);
                obj.set("segments", view[0].segments);
                obj.set("locale", view[0].locale);
                obj.set("memo", view[0].memo);
                obj.set("memo2", view[0].memo2);
                obj.set("bill_to", view[0].bill_to);
                obj.set("ship_to", view[0].ship_to);

                // self.setContact(view[0].contact);
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
    banhji.cashSale =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        lineDS              : dataStore(apiUrl + "item_lines"),
        assemblyLineDS      : dataStore(apiUrl + "item_lines"),
        txnDS               : dataStore(apiUrl + "transactions"),
        amountSumDS         : dataStore(apiUrl + "transactions/amount_sum"),
        numberDS            : dataStore(apiUrl + "transactions/number"),
        balanceDS           : dataStore(apiUrl + "transactions/balance"),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "item_lines"),
        referenceDS         : dataStore(apiUrl + "transactions"),
        referenceLineDS     : dataStore(apiUrl + "item_lines"),
        depositDS           : dataStore(apiUrl + "transactions"),
        attachmentDS        : dataStore(apiUrl + "attachments"),
        itemDS              : dataStore(apiUrl + "items"),
        itemPriceDS         : dataStore(apiUrl + "item_prices"),
        assemblyDS          : dataStore(apiUrl + "item_assemblies"),
        wacDS               : dataStore(apiUrl + "items/weighted_average_costing"),
        segmentDS           : dataStore(apiUrl + "segments"),
        segItemDS           : dataStore(apiUrl + "segments/item"),
        segmentItemDS       : dataStore(apiUrl + "segments/item"),
        typeList            : new kendo.data.DataSource({
            data: banhji.source.prefixList,
            filter:{
                logic: "or",
                filters: [
                    { field: "type", value: "Commercial_Cash_Sale" },
                    { field: "type", value: "Vat_Cash_Sale" },
                    { field: "type", value: "Cash_Sale" }
                ]
            }
        }),
        txnTemplateDS       : new kendo.data.DataSource({
            data: banhji.source.txnTemplateList,
            filter:{
                logic: "or",
                filters: [
                    { field: "type", value: "Commercial_Cash_Sale" },
                    { field: "type", value: "Vat_Cash_Sale" },
                    { field: "type", value: "Cash_Sale" }
                ]
            }
        }),
        cashAccountDS       : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter:{ field:"account_type_id", value: 10 },
            sort: { field:"number", dir:"asc" }
        }),
        discountAccountDS   : new kendo.data.DataSource({
            data: banhji.source.accountList,
            filter: { field:"id", value: 72 },
            sort: { field:"number", dir:"asc" }
        }),
        jobDS               : new kendo.data.DataSource({
            data: banhji.source.jobList,
            sort: { field: "name", dir: "asc" }
        }),
        categoryDS          : new kendo.data.DataSource({
            data: banhji.source.categoryList,
            filter: [
                { field:"item_type_id", value: 1 },
                { field:"id", operator:"neq", value: 5 },
                { field:"id", operator:"neq", value: 6 }
            ]
        }),
        itemGroupDS         : banhji.source.itemGroupDS,
        employeeDS          : banhji.source.employeeDS,
        contactDS           : banhji.source.customerDS,
        statusObj           : banhji.source.statusObj,
        paymentMethodDS     : banhji.source.paymentMethodDS,
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
        barcode             : "",
        barcodeVisible      : false,
        category_id         : 0,
        item_group_id       : 0,
        segment_id          : "",
        segmentitem_id      : "",
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
        loadData            : function(){
            var obj = this.get("obj");

            this.setRate();
            this.loadDeposit();
            this.loadBalance();
            this.loadReference();
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
                    tax_item_id         : 0,
                    item_id             : data.id,
                    assembly_id         : 0,
                    measurement_id      : data.measurement_id,
                    description         : data.sale_description,
                    quantity            : 1,
                    conversion_ratio    : 1,
                    cost                : wac[0].cost * rate,
                    price               : data.price,
                    amount              : data.price,
                    discount            : 0,
                    discount_percentage : 0,
                    tax                 : 0,
                    rate                : rate,
                    locale              : data.locale,
                    movement            : -1,
                    reference_no        : "",

                    item                : data,
                    item_price          : item_price,
                    tax_item            : { id:"", name:"" }
                });
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
                this.amountSumDS.query({
                    filter:[
                        { field:"contact_id", value: obj.contact_id },
                        { field:"type", value: "Customer_Deposit" }
                    ]
                }).then(function(){
                    var view = self.amountSumDS.view();
                    
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
        setContact      : function(contact){
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
                obj.set("payment_method_id", contact.payment_method_id);
                obj.set("locale", contact.locale);
                obj.set("bill_to", contact.bill_to);
                obj.set("ship_to", contact.ship_to);

                this.loadData();
                this.jobDS.filter({ field:"contact_id", value: contact.id });
            }

            this.changes();
        },
        employeeChanges         : function(){
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
        //Segment
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

            //Item base price
            var item_price = {
                measurement_id  : item.measurement_id,
                price           : kendo.parseFloat(item.price),
                conversion_ratio: 1,
                measurement     : item.measurement.name
            };
            row.set("item_price", item_price);

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
        },
        lineDSChanges       : function(arg){
            var self = banhji.cashSale;

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
                }else if(arg.field=="item_price"){
                    var dataRow = arg.items[0];

                    dataRow.set("measurement_id", dataRow.item_price.measurement_id);
                    dataRow.set("price", dataRow.item_price.price * dataRow.rate);
                    dataRow.set("conversion_ratio", dataRow.item_price.conversion_ratio);
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
                case 3:
                    statusObj.set("text", "return");
                    break;
                case 4:
                    statusObj.set("text", "draft");
                    break;
                default:
                    statusObj.set("text", "paid");
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

                    self.set("obj", view[0]);
                    self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));
                    self.set("amount_due", kendo.toString(view[0].amount - view[0].deposit, "c2", view[0].locale));
                    self.setStatus();
                    self.loadDeposit();

                    self.lineDS.query({
                        filter: [
                            { field: "transaction_id", value: id },
                            { field: "assembly_id", value: 0 }
                        ]
                    });

                    self.assemblyLineDS.query({
                        filter:[
                            { field: "transaction_id", value: id },
                            { field: "assembly_id >", value: 0 }
                        ]
                    });

                    self.journalLineDS.query({
                        filter: { field: "transaction_id", value: id }
                    });

                    self.attachmentDS.filter({ field: "transaction_id", value: id });

                    //Segment
                    var segments = [];
                    $.each(view[0].segments, function(index, value){
                        segments.push(value);
                    });
                    self.segmentItemDS.filter({ field: "id", operator:"where_in", value: segments });

                    self.loadReference();
                });
            }
        },
        addEmpty            : function(){
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

            this.dataSource.insert(0, {
                transaction_template_id: 10,
                contact_id          : "",//Customer
                payment_method_id   : 0,
                reference_id        : "",
                recurring_id        : "",
                account_id          : 1,
                discount_account_id : 0,
                job_id              : 0,
                user_id             : this.get("user_id"),
                employee_id         : "",//Sale Rep
                type                : "Commercial_Cash_Sale",//Required
                number              : "",
                sub_total           : 0,
                discount            : 0,
                tax                 : 0,
                amount              : 0,
                deposit             : 0,
                remaining           : 0,
                credit_allowed      : 0,
                credit              : 0,
                check_no            : "",
                rate                : 1,
                movement            : 1,
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

                contact             : { id:"", name:"" },
                references          : []
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
                movement            : -1,
                reference_no        : "",

                discount_percentage : 0,
                item                : { id:"", name:"" },
                item_price          : { measurement_id:"", measurement:"" },
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

            banhji.userManagement.removeMultiTask("cash_sale");
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

            //Obj Account, Cash on Dr
            var objAccountID = kendo.parseInt(obj.account_id);
            if(objAccountID>0){
                raw = "dr"+objAccountID;

                var objAmount = obj.amount - obj.deposit;
                if(entries[raw]===undefined){
                    entries[raw] = {
                        transaction_id      : transaction_id,
                        account_id          : objAccountID,
                        contact_id          : obj.contact_id,
                        description         : obj.memo,
                        reference_no        : obj.reference_no,
                        segments            : obj.segments,
                        dr                  : objAmount,
                        cr                  : 0,
                        rate                : obj.rate,
                        locale              : obj.locale
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
                    { field: "status", value:0 },
                    { field: "reuse", operator:"or_where", value:1 },
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
                        self.lineDS.insert(index, {
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
                            item_price          : value.item_price,
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
                obj.set("payment_method_id", view[0].payment_method_id);
                obj.set("account_id", view[0].account_id);
                obj.set("employee_id", view[0].employee_id);//Sale Rep
                obj.set("job_id", view[0].job_id);
                obj.set("segments", view[0].segments);
                obj.set("locale", view[0].locale);
                obj.set("memo", view[0].memo);
                obj.set("memo2", view[0].memo2);
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
                        item_price          : value.item_price,
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
    banhji.invoice =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        lineDS              : dataStore(apiUrl + "item_lines"),
        assemblyLineDS      : dataStore(apiUrl + "item_lines"),
        txnDS               : dataStore(apiUrl + "transactions"),
        numberDS            : dataStore(apiUrl + "transactions/number"),
        balanceDS           : dataStore(apiUrl + "transactions/balance"),
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        recurringDS         : dataStore(apiUrl + "transactions"),
        recurringLineDS     : dataStore(apiUrl + "item_lines"),
        referenceDS         : dataStore(apiUrl + "transactions"),
        referenceLineDS     : dataStore(apiUrl + "item_lines"),
        depositDS           : dataStore(apiUrl + "transactions"),
        wacDS               : dataStore(apiUrl + "items/weighted_average_costing"),
        itemDS              : dataStore(apiUrl + "items"),
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
        categoryDS          : new kendo.data.DataSource({
            data: banhji.source.categoryList,
            filter: [
                { field:"item_type_id", value: 1 },
                { field:"id", operator:"neq", value: 5 },
                { field:"id", operator:"neq", value: 6 }
            ]
        }),
        itemGroupDS         : banhji.source.itemGroupDS,
        contactDS           : banhji.source.customerDS,
        employeeDS          : banhji.source.employeeDS,
        statusObj           : banhji.source.statusObj,
        paymentTermDS       : banhji.source.paymentTermDS,
        paymentMethodDS     : banhji.source.paymentMethodDS,
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
        barcode             : "",
        barcodeVisible      : false,
        category_id         : 0,
        item_group_id       : 0,
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
        loadData            : function(){
            this.setRate();
            this.setTerm();
            this.loadBalance();
            this.loadDeposit();
            this.loadReference();
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
                    tax_item_id         : 0,
                    item_id             : data.id,
                    assembly_id         : 0,
                    measurement_id      : data.measurement_id,
                    description         : data.sale_description,
                    quantity            : 1,
                    conversion_ratio    : 1,
                    cost                : wac[0].cost * rate,
                    price               : data.price,
                    amount              : data.price,
                    discount            : 0,
                    discount_percentage : 0,
                    tax                 : 0,
                    rate                : rate,
                    locale              : data.locale,
                    movement            : -1,
                    reference_no        : "",

                    item                : data,
                    item_price          : item_price,
                    tax_item            : { id:"", name:"" }
                });
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

                if(term){
                    duedate.setDate(duedate.getDate() + term.net_due);
                    obj.set("due_date", duedate);
                }
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

            //Item base price
            var item_price = {
                measurement_id  : item.measurement_id,
                price           : kendo.parseFloat(item.price),
                conversion_ratio: 1,
                measurement     : item.measurement.name
            };
            row.set("item_price", item_price);

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
            var self = banhji.invoice;

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
                }else if(arg.field=="item_price"){
                    var dataRow = arg.items[0];

                    dataRow.set("measurement_id", dataRow.item_price.measurement_id);
                    dataRow.set("price", dataRow.item_price.price * dataRow.rate);
                    dataRow.set("conversion_ratio", dataRow.item_price.conversion_ratio);
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

                    self.set("obj", view[0]);
                    self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));
                    self.set("amount_due", kendo.toString(view[0].amount - view[0].deposit, "c2", view[0].locale));
                    self.setStatus();
                    self.loadDeposit();

                    self.lineDS.query({
                        filter: [
                            { field: "transaction_id", value: id },
                            { field: "assembly_id", value: 0 }
                        ]
                    });

                    self.assemblyLineDS.query({
                        filter:[
                            { field: "transaction_id", value: id },
                            { field: "assembly_id >", value: 0 }
                        ]
                    });

                    self.journalLineDS.query({
                        filter: { field: "transaction_id", value: id }
                    });

                    self.attachmentDS.filter({ field: "transaction_id", value: id });

                    //Segment
                    var segments = [];
                    $.each(view[0].segments, function(index, value){
                        segments.push(value);
                    });
                    self.segmentItemDS.query({
                        filter: { field: "id", operator:"where_in", value: segments }
                    });

                    self.loadReference();
                });
            }
        },
        addEmpty            : function(){
            this.dataSource.data([]);
            this.lineDS.data([]);
            this.assemblyLineDS.data([]);
            this.depositDS.data([]);
            this.journalLineDS.data([]);
            this.attachmentDS.data([]);
            this.referenceDS.data([]);

            this.set("isEdit", false);
            this.set("obj", null);
            this.set("total_deposit", 0);
            this.set("total", 0);
            this.set("amount_due", 0);
            this.set("amtDueColor", banhji.source.amtDueColor);

            //Set Date
            var duedate = new Date();
            duedate.setDate(duedate.getDate() + 30);

            this.dataSource.insert(0, {
                contact_id          : "",//Customer
                transaction_template_id : 3,
                discount_account_id : 0,
                payment_term_id     : 0,
                payment_method_id   : 0,
                reference_id        : "",
                recurring_id        : "",
                job_id              : 0,
                user_id             : this.get("user_id"),
                employee_id         : "",//Sale Rep
                type                : "Commercial_Invoice",//Required
                number              : "",
                sub_total           : 0,
                discount            : 0,
                tax                 : 0,
                deposit             : 0,
                amount              : 0,
                remaining           : 0,
                credit_allowed      : 0,
                rate                : 1,//Required
                movement            : 1,
                locale              : banhji.locale,//Required
                issued_date         : new Date(),//Required
                due_date            : duedate,
                bill_to             : "",
                ship_to             : "",
                memo                : "",
                memo2               : "",
                note                : "",
                status              : 0,
                progress            : "",
                references          : [],
                segments            : [],
                is_journal          : 1,//Required
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

                contact             : { id:"", name:"" }
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
                item_price          : { measurement_id:"", measurement:"" },
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
                    { field: "status", value:0 },
                    { field: "reuse", operator:"or_where", value:1 },
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
                            item_price          : value.item_price,
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
                        item_price          : value.item_price,
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
        }
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

    // Report
    banhji.saleSummaryByCustomer =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/sale_summary_by_customer"),
        contactDS           : banhji.source.customerDS,
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { contactIds: [] },
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
                filter:para,
                page: 1,
                pageSize: 100,
            }).then(function(){
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value){
                    amount += value.amount;
                });

                self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [
                            { value: self.company.name, textAlign: "center", colSpan: 4 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Sale Summary by Customer",bold: true, fontSize: 20, textAlign: "center", colSpan: 4 }
                        ]
                    });
                    if(self.displayDate){
                        self.exArray.push({
                            cells: [
                                { value: self.displayDate, textAlign: "center", colSpan: 4 }
                            ]
                        });
                    };
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 4 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Customer", background: "#496cad", color: "#ffffff" },
                            { value: "Number of Invoice", background: "#496cad", color: "#ffffff" },
                            { value: "Number of Cash Sale", background: "#496cad", color: "#ffffff" },
                            { value: "Total Sale", background: "#496cad", color: "#ffffff" },
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++){
                            self.exArray.push({
                                cells: [
                                    { value: response.results[i].name },
                                    { value: response.results[i].invoice_count },
                                    { value: response.results[i].cash_sale_count },
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
            var self = this,
            Win, pHeight, pWidth, ts;
            Win = window.open('', '', 'width=1000, height=900');
            pHeight = "210mm";
            pWidth = "150mm";
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
                '<link href="<?php echo base_url(); ?>resources/common/theme/css/style-default-menus-dark.css" rel="stylesheet" />' +
                '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                '<style type="text/css" media="print">' +
                '@page { size: portrait; margin:0.5cm;' +
                'size: A5;' +
                '} ' +
                '@media print {' +
                'html, body {' +
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
            }, 2000);
        },
        ExportExcel         : function(){
            var workbook = new kendo.ooxml.Workbook({
              sheets: [
                {
                  columns: [
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true },
                    { autoWidth: true }
                  ],
                  title: "Sale Summary Customer",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleSummaryCustomer.xlsx"});
        }
    });
    banhji.saleSummaryByProduct =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/sale_summary_by_product"),
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
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { itemIds: [] },
        company             : banhji.institute,
        displayDate         : "",
        avg_sale            : 0,
        total_sale          : 0,
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
            if(obj.itemIds.length>0){
                var itemIds = [];
                $.each(obj.itemIds, function(index, value){
                    itemIds.push(value);
                });
                para.push({ field:"item_id", operator:"where_in", value:itemIds });
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
                page: 1,
                pageSize : 20,
            }).then(function(){
                var view = self.dataSource.view();

                var txnCount = 0, amount = 0;
                $.each(view, function(index, value){
                    txnCount += value.txn_count;
                    amount += value.amount;
                });

                var avgSale = 0;
                if(txnCount>0){
                    avgSale = amount/txnCount;
                }

                self.set("avg_sale", kendo.toString(avgSale, "c2", banhji.locale));
                self.set("total_sale", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [
                            { value: self.company.name, textAlign: "center", colSpan: 6 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Sale Summary by Product/Service",bold: true, fontSize: 20, textAlign: "center", colSpan: 6 }
                        ]
                    });
                    if(self.displayDate){
                        self.exArray.push({
                            cells: [
                                { value: self.displayDate, textAlign: "center", colSpan: 6 }
                            ]
                        });
                    };
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 6 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Item", background: "#496cad", color: "#ffffff" },
                            { value: "QTY", background: "#496cad", color: "#ffffff" },
                            { value: "Amount", background: "#496cad", color: "#ffffff" },
                            { value: "AVG Price", background: "#496cad", color: "#ffffff" },
                            { value: "AVG Cost", background: "#496cad", color: "#ffffff" },
                            { value: "Gross Profit Margin", background: "#496cad", color: "#ffffff" },
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++){
                            self.exArray.push({
                                cells: [
                                    { value: response.results[i].name },
                                    { value: kendo.parseFloat(response.results[i].quantity)},
                                    { value: kendo.parseFloat(response.results[i].amount)},
                                    { value: kendo.parseFloat(response.results[i].avg_price)},
                                    { value: kendo.parseFloat(response.results[i].avg_cost)},
                                    { value: kendo.parseFloat(response.results[i].gpm)},
                                ]
                            });
                        self.exArray.push({
                            cells: [
                                { value: "", colSpan: 6 }
                            ]
                        });
                    }
                }
            });
        },
        printGrid           : function() {
            var self = this,
            Win, pHeight, pWidth, ts;
            Win = window.open('', '', 'width=1000, height=900');
            pHeight = "210mm";
            pWidth = "150mm";
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
                '<link href="<?php echo base_url(); ?>resources/common/theme/css/style-default-menus-dark.css" rel="stylesheet" />' +
                '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                '<style type="text/css" media="print">' +
                '@page { size: portrait; margin:0.5cm;' +
                'size: A5;' +
                '} ' +
                '@media print {' +
                'html, body {' +
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
            }, 2000);
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
                  title: "Sale Summary Product",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleSummaryProduct.xlsx"});
        }
    });
    banhji.saleDetailByCustomer =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/sale_detail_by_customer"),
        contactDS           : banhji.source.customerDS,
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { contactIds: [] },
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
                filter:para,
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.dataSource.view();

                var amount = 0;
                $.each(view, function(index, value){
                    $.each(value.line, function(ind, val){
                        amount += val.amount;
                    });
                });

                self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response, balanceCal = 0, balance= 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [
                            { value: self.company.name, textAlign: "center", colSpan: 4}
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Sale Detail by Customer",bold: true, fontSize: 20, textAlign: "center", colSpan: 4 }
                        ]
                    });
                    if(self.displayDate){
                        self.exArray.push({
                            cells: [
                                { value: self.displayDate, textAlign: "center", colSpan: 4 }
                            ]
                        });
                    }
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 4 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Type", background: "#496cad", color: "#ffffff" },
                            { value: "Date", background: "#496cad", color: "#ffffff" },
                            { value: "Reference", background: "#496cad", color: "#ffffff" },
                            { value: "Amount", background: "#496cad", color: "#ffffff" },
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++){
                        self.exArray.push({
                            cells: [
                                { value: response.results[i].name, bold: true, },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                            ]

                        });
                        for(var j = 0; j < response.results[i].line.length; j++){
                            balance += response.results[i].line[j].amount;
                            self.exArray.push({
                                cells: [
                                    { value: response.results[i].line[j].type },
                                    { value: response.results[i].line[j].issued_date },
                                    { value: response.results[i].line[j].number},
                                    { value: response.results[i].line[j].amount },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [
                                { value: "", colSpan: 4 }
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
                  ],
                  title: "Sale Detail by Customer",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleDetailCustomer.xlsx"});
        }
    });
    banhji.saleDetailByProduct =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/sale_detail_by_product"),
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
        sortList            : banhji.source.sortList,
        sorter              : "month",
        sdate               : "",
        edate               : "",
        obj                 : { itemIds: [] },
        company             : banhji.institute,
        displayDate         : "",
        product_sale        : 0,
        total_sale          : 0,
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

            //Items
            if(obj.itemIds.length>0){
                var itemIds = [];
                $.each(obj.itemIds, function(index, value){
                    itemIds.push(value);
                });
                para.push({ field:"item_id", operator:"where_in", value:itemIds });
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
                page: 1,
                pageSize : 50,
            }).then(function(){
                var view = self.dataSource.view();

                var txnCount = 0, amount = 0;
                $.each(view, function(index, value){
                    $.each(value.line, function(ind, val){
                        txnCount++;
                        amount += val.amount;
                    });
                });

                var avgSale = 0;
                if(txnCount>0){
                    avgSale = amount/txnCount;
                }

                self.set("product_sale", kendo.toString(avgSale, "c2", banhji.locale));
                self.set("total_sale", kendo.toString(amount, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response, balanceCal = 0, balance= 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [
                            { value: self.company.name, textAlign: "center", colSpan: 7}
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Sale Detail by Product/Service",bold: true, fontSize: 20, textAlign: "center", colSpan: 7 }
                        ]
                    });
                    if(self.displayDate){
                        self.exArray.push({
                            cells: [
                                { value: self.displayDate, textAlign: "center", colSpan: 7 }
                            ]
                        });
                    }
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 7 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Type", background: "#496cad", color: "#ffffff" },
                            { value: "Customer", background: "#496cad", color: "#ffffff" },
                            { value: "Invoice Date", background: "#496cad", color: "#ffffff" },
                            { value: "Reference", background: "#496cad", color: "#ffffff" },
                            { value: "QTY", background: "#496cad", color: "#ffffff" },
                            { value: "Price", background: "#496cad", color: "#ffffff" },
                            { value: "Amount", background: "#496cad", color: "#ffffff" },
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
                            ]

                        });
                        for(var j = 0; j < response.results[i].line.length; j++){
                            var aaa = response.results[i].line[j].quantity + response.results[i].line[j].measurement;
                            self.exArray.push({
                                cells: [
                                    { value: response.results[i].line[j].type },
                                    { value: response.results[i].line[j].customer },
                                    { value: response.results[i].line[j].issued_date},
                                    { value: response.results[i].line[j].number },
                                    { value: aaa},
                                    { value: response.results[i].line[j].price },
                                    { value: response.results[i].line[j].amount },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [
                                { value: "", colSpan: 7}
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
                  title: "Sale Detail by Product/Service",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "saleDetailProduct.xlsx"});
        }
    });
    banhji.customerBalanceSummary =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/balance_summary"),
        obj                 : null,
        company             : banhji.institute,
        as_of               : new Date(),
        displayDate         : "",
        totalTxn            : 0,
        totalBalance        : 0,
        exArray             : [],
        pageLoad            : function(){
            this.search();
        },
        search              : function(){
            var self = this, para = [],
                as_of = this.get("as_of"),
                displayDate = "";

            if(as_of){
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate()+1);

                para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
            }

            this.dataSource.query({
                filter:para
            }).then(function(){
                var view = self.dataSource.view();

                var balance = 0, txnCount = 0;
                $.each(view, function(index, value){
                    txnCount += value.txn_count;
                    balance += value.amount;
                });

                self.set("total_txn", kendo.toString(txnCount, "n0"));
                self.set("total_balance", kendo.toString(balance, "c2", banhji.locale));
            });
                        this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [
                            { value: self.company.name, textAlign: "center", colSpan: 3}
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Cash Sale Summary by Customer",bold: true, fontSize: 20, textAlign: "center", colSpan: 3}
                        ]
                    });
                    if(self.displayDate){
                        self.exArray.push({
                            cells: [
                                { value: self.displayDate, textAlign: "center", colSpan: 3}
                            ]
                        });
                    };
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 3}
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Customer", background: "#496cad", color: "#ffffff" },
                            { value: "No. OF Transaction", background: "#496cad", color: "#ffffff" },
                            { value: "Balance", background: "#496cad", color: "#ffffff" },
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++){
                            self.exArray.push({
                                cells: [
                                    { value: response.results[i].name },
                                    { value: response.results[i].txn_count },
                                    { value: kendo.parseFloat(response.results[i].amount)},
                                ]
                            });
                        self.exArray.push({
                            cells: [
                                { value: "", colSpan: 3 }
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
                  ],
                  title: "Customer Balance Summary",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "customerBalanceSummary.xlsx"});
        }
    });
    banhji.customerBalanceDetail =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/balance_detail"),
        obj                 : null,
        company             : banhji.institute,
        contactDS           : banhji.source.customerDS,
        as_of               : new Date(),
        displayDate         : "",
        obj                 : { contactIds: [] },
        totalTxn            : 0,
        totalBalance        : 0,
        exArray             : [],
        pageLoad            : function(){
            this.search();
        },
        search              : function(){
            var self = this, para = [], 
                obj = this.get("obj"),
                as_of = this.get("as_of"),
                displayDate = "";

            //Customer
            if(obj.contactIds.length>0){
                var contactIds = [];
                $.each(obj.contactIds, function(index, value){
                    contactIds.push(value);
                });
                para.push({ field:"contact_id", operator:"where_in", value:contactIds });
            }
        
            if(as_of){
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate()+1);
                
                para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
            }

            this.dataSource.query({
                filter:para,
                sort:[
                    { field:"issued_date", dir:"asc" },
                    { field:"number", operator:"order_by_related_contact", dir:"asc" }
                ]
            }).then(function(){
                var view = self.dataSource.view();

                var balance = 0, txnCount = 0;
                $.each(view, function(index, value){
                    txnCount += value.line.length;
                    $.each(value.line, function(ind, val){
                        balance += val.amount;
                    });
                });

                self.set("total_txn", kendo.toString(txnCount, "n0"));
                self.set("total_balance", kendo.toString(balance, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){             
                if(e.type=="read"){
                    var response = e.response, balanceCal = 0, balance= 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [
                            { value: self.company.name, textAlign: "center", colSpan: 4}
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Customer Balance Summary",bold: true, fontSize: 20, textAlign: "center", colSpan: 4 }
                        ]
                    });
                    if(self.displayDate){
                        self.exArray.push({
                            cells: [
                                { value: self.displayDate, textAlign: "center", colSpan: 4 }
                            ]
                        });
                    }
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 4 }
                        ]
                    });
                    self.exArray.push({ 
                        cells: [
                            { value: "Type", background: "#496cad", color: "#ffffff" },
                            { value: "Invoice Date", background: "#496cad", color: "#ffffff" },
                            { value: "Reference", background: "#496cad", color: "#ffffff" },
                            { value: "Balance", background: "#496cad", color: "#ffffff" },
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++){
                        self.exArray.push({
                            cells: [
                                { value: response.results[i].name, bold: true, },
                                { value: "" },
                                { value: "" },
                                { value: "" },
                            ]
                            
                        });
                        for(var j = 0; j < response.results[i].line.length; j++){
                            self.exArray.push({
                                cells: [
                                    { value: response.results[i].line[j].type },
                                    { value: response.results[i].line[j].issued_date },
                                    { value: response.results[i].line[j].number},
                                    { value: response.results[i].line[j].amount },
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [
                                { value: "", colSpan: 4 }
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
                  ],
                  title: "Customer Balance Detail",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "customerBalanceDetail.xlsx"});
        }
    });
    banhji.receivableAgingSummary =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/aging_summary"),
        contactDS           : banhji.source.customerDS,
        obj                 : null,
        company             : banhji.institute,
        as_of               : new Date(),
        displayDate         : "",
        totalBalance        : 0,
        exArray             : [],
        pageLoad            : function(){
            this.search();
        },
        search              : function(){
            var self = this, para = [],
                as_of = this.get("as_of"),
                displayDate = "";

            if(as_of){
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate()+1);

                para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
            }

            this.dataSource.query({
                filter:para
            }).then(function(){
                var view = self.dataSource.view();

                var balance = 0;
                $.each(view, function(index, value){
                    balance += value.total;
                });

                self.set("totalBalance", kendo.toString(balance, "c2", banhji.locale));
            });
                        this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [
                            { value: self.company.name, textAlign: "center", colSpan: 7}
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Receivable Aging Summary",bold: true, fontSize: 20, textAlign: "center", colSpan: 7}
                        ]
                    });
                    if(self.displayDate){
                        self.exArray.push({
                            cells: [
                                { value: self.displayDate, textAlign: "center", colSpan: 7}
                            ]
                        });
                    };
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 7}
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Name", background: "#496cad", color: "#ffffff" },
                            { value: "Current", background: "#496cad", color: "#ffffff" },
                            { value: "1-30", background: "#496cad", color: "#ffffff" },
                            { value: "31-60", background: "#496cad", color: "#ffffff" },
                            { value: "61-90", background: "#496cad", color: "#ffffff" },
                            { value: "Over 90", background: "#496cad", color: "#ffffff" },
                            { value: "Total", background: "#496cad", color: "#ffffff" },
                        ]
                    });
                    for (var i = 0; i < response.results.length; i++){
                            self.exArray.push({
                                cells: [
                                    { value: response.results[i].name },
                                    { value: response.results[i].current },
                                    { value: response.results[i].in30 },
                                    { value: response.results[i].in60 },
                                    { value: response.results[i].in90 },
                                    { value: response.results[i].over90 },
                                    { value: kendo.parseFloat(response.results[i].total)},
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
                  title: "Receivable Aging Summary",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "receivableAgingSummary.xlsx"});
        }
    });
    banhji.receivableAgingDetail =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/aging_detail"),
        contactDS           : banhji.source.customerDS,
        obj                 : { customers: [] },
        company             : banhji.institute,
        as_of               : new Date(),
        displayDate         : "",
        totalBalance        : 0,
        exArray             : [],
        pageLoad            : function(){
            this.search();
        },
        search              : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                as_of = this.get("as_of"),
                displayDate = "";

            //Customer
            if(obj.customers.length>0){
                var customers = [];
                $.each(obj.customers, function(index, value){
                    customers.push(value);
                });
                para.push({ field:"contact_id", operator:"where_in", value:customers });
            }

            if(as_of){
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate()+1);

                para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
            }

            this.dataSource.query({
                filter:para,
                sort:[
                    { field:"issued_date", dir:"asc" },
                    { field:"number", operator:"order_by_related_contact", dir:"asc" }
                ]
            }).then(function(){
                var view = self.dataSource.view();

                var balance = 0;
                $.each(view, function(index, value){
                    $.each(value.line, function(ind, val){
                        balance += val.amount;
                    });
                });

                self.set("totalBalance", kendo.toString(balance, "c2", banhji.locale));
            });
            this.dataSource.bind("requestEnd", function(e){
                if(e.type=="read"){
                    var response = e.response, balanceCal = 0, balance= 0;
                    self.exArray = [];

                    self.exArray.push({
                        cells: [
                            { value: self.company.name, textAlign: "center", colSpan: 7}
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Receivable Aging Detail",bold: true, fontSize: 20, textAlign: "center", colSpan: 7 }
                        ]
                    });
                    if(self.displayDate){
                        self.exArray.push({
                            cells: [
                                { value: self.displayDate, textAlign: "center", colSpan: 7 }
                            ]
                        });
                    }
                    self.exArray.push({
                        cells: [
                            { value: "", colSpan: 7 }
                        ]
                    });
                    self.exArray.push({
                        cells: [
                            { value: "Type", background: "#496cad", color: "#ffffff" },
                            { value: "Invoice Date", background: "#496cad", color: "#ffffff" },
                            { value: "Due Date", background: "#496cad", color: "#ffffff" },
                            { value: "Reference", background: "#496cad", color: "#ffffff" },
                            { value: "Status", background: "#496cad", color: "#ffffff" },
                            { value: "Amount", background: "#496cad", color: "#ffffff" },
                            { value: "Balance", background: "#496cad", color: "#ffffff" },
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
                            ]

                        });
                        for(var j = 0; j < response.results[i].line.length; j++){
                            var date = new Date(), dueDates = new Date(response.results[i].line[j].due_date).getTime(),overDue, toDay = new Date(date).getTime();
                            if(dueDates < toDay) {
                                overDue = "Over Due "+Math.floor((toDay - dueDates)/(1000*60*60*24))+"days";
                            } else {
                                overDue = Math.floor((dueDates - toDay)/(1000*60*60*24))+"days to pay";
                            }
                            balance =+ response.results[i].line[j].amount ;
                            self.exArray.push({
                                cells: [
                                    { value: response.results[i].line[j].type },
                                    { value: response.results[i].line[j].issued_date },
                                    { value: response.results[i].line[j].due_date},
                                    { value: response.results[i].line[j].number },
                                    { value: overDue},
                                    { value: response.results[i].line[j].amount },
                                    { value: balance},
                                ]
                            });
                        }
                        self.exArray.push({
                            cells: [
                                { value: "", colSpan: 7}
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
                  title: "Receivable Aging Detail",
                  rows: this.exArray
                }
              ]
            });
            //save the file as Excel file with extension xlsx
            kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "receivableAgingDetail.xlsx"});
        }
    });
    banhji.collectInvoice =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "sales/collect_invoice"),
        contactDS           : banhji.source.customerDS,
        obj                 : { customers: [] },
        company             : banhji.institute,
        as_of               : new Date(),
        displayDate         : "",
        total_txn           : 0,
        totalAmount         : 0,
        exArray             : [],
        pageLoad            : function(){
            this.search();
        },
        search              : function(){
            var self = this, para = [],
                obj = this.get("obj"),
                as_of = this.get("as_of"),
                displayDate = "";

            //Customer
            if(obj.customers.length>0){
                var customers = [];
                $.each(obj.customers, function(index, value){
                    customers.push(value);
                });
                para.push({ field:"contact_id", operator:"where_in", value:customers });
            }

            if(as_of){
                as_of = new Date(as_of);
                var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
                this.set("displayDate", displayDate);
                as_of.setDate(as_of.getDate()+1);

                para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
            }

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

        // Report
        saleSummaryByCustomer: new kendo.Layout("#saleSummaryByCustomer", {model: banhji.saleSummaryByCustomer}),
        saleDetailByCustomer: new kendo.Layout("#saleDetailByCustomer", {model: banhji.saleDetailByCustomer}),
        saleSummaryByProduct: new kendo.Layout("#saleSummaryByProduct", {model: banhji.saleSummaryByProduct}),
        saleDetailByProduct : new kendo.Layout("#saleDetailByProduct", {model: banhji.saleDetailByProduct}),
        customerBalanceSummary : new kendo.Layout("#customerBalanceSummary", {model: banhji.customerBalanceSummary}),
        customerBalanceDetail : new kendo.Layout("#customerBalanceDetail", {model: banhji.customerBalanceDetail}),
        receivableAgingSummary : new kendo.Layout("#receivableAgingSummary", {model: banhji.receivableAgingSummary}),
        receivableAgingDetail : new kendo.Layout("#receivableAgingDetail", {model: banhji.receivableAgingDetail}),
        collectInvoice : new kendo.Layout("#collectInvoice", {model: banhji.collectInvoice}),
        collectionReport : new kendo.Layout("#collectionReport", {model: banhji.collectionReport}),
        customerTransactionList: new kendo.Layout("#customerTransactionList", {model: banhji.customerTransactionList}),

        // Function
        quote: new kendo.Layout("#quote", {model: banhji.quote}),
        saleOrder: new kendo.Layout("#saleOrder", {model: banhji.saleOrder}),
        customerDeposit: new kendo.Layout("#customerDeposit", {model: banhji.customerDeposit}),
        cashSale: new kendo.Layout("#cashSale", {model: banhji.cashSale}),
        invoice: new kendo.Layout("#invoice", {model: banhji.invoice}),
        cashReceipt: new kendo.Layout("#cashReceipt", {model: banhji.cashReceipt}),
        cashRefund: new kendo.Layout("#cashRefund", {model: banhji.cashRefund}),
        invoiceForm: new kendo.Layout("#printBill", {model: banhji.invoiceForm}),
        // Add Customer
        customer: new kendo.Layout("#customer", {model: banhji.customer}),


        // Menu
        tapMenu: new kendo.View("#tapMenu", {model: banhji.tapMenu}),
        reports: new kendo.View("#reports", {model: banhji.reports}),
        checkOut: new kendo.View("#checkOut", {model: banhji.checkOut}),
        transactions: new kendo.View("#transactions", {model: banhji.transactions}),
        customers: new kendo.View("#customers", {model: banhji.customers}),
        printBill: new kendo.Layout("#printBill", {
            model: banhji.printBill
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
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.checkOut);

        var vm = banhji.checkOut;
        if(banhji.pageLoaded["index"]==undefined){
            banhji.pageLoaded["index"] = true;
            
            vm.lineDS.bind("change", vm.lineDSChanges);
        }        
        
        vm.pageLoad();        
    });
    banhji.router.route('/reports', function() {
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.reports);

        var vm = banhji.reports;
        if(banhji.pageLoaded["reports"]==undefined){
            banhji.pageLoaded["reports"] = true;

            vm.sorterChanges();
        }
        
        vm.pageLoad();
    });
    banhji.router.route('/transactions', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.transactions);

        var vm= banhji.transactions;

        if(banhji.pageLoaded["transactions"]==undefined){
            banhji.pageLoaded["transactions"] = true;

            vm.sorterChanges();
        }

        //load MVVM
        vm.pageLoad();
    });
    banhji.router.route("/customer_transaction_list", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.customerTransactionList);

            var vm = banhji.customerTransactionList;
            banhji.userManagement.addMultiTask("Customer Transaction List","customer_transaction_list",null);

            if(banhji.pageLoaded["customer_transaction_list"]==undefined){
                banhji.pageLoaded["customer_transaction_list"] = true;

                vm.sorterChanges();
            }
            vm.pageLoad();
        }
    });
    banhji.router.route('/customers', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.customers);

        if(banhji.pageLoaded["customers"]==undefined){
            banhji.pageLoaded["customers"] = true;
            
            // banhji.source.supplierDS.filter({
            //     field: "parent_id",
            //     operator: "where_related_contact_type",
            //     value: 2
            // });
        }        

        //load MVVM
        banhji.customers.pageLoad();
    });

    // Add Cutomer
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
                // kendo.fx($("#slide-form")).slideIn("down").play();

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

    // Function
    banhji.router.route("/quote(/:id)", function(id){
        // banhji.accessPage.query({
        //  filter:[
        //      { field:"name", value:"quotation" },
        //      { field:'username', operator:"where_related_user", value: JSON.parse(localStorage.getItem('userData/user')).username }
        //  ]
        // }).then(function(e){
        //  if(banhji.accessPage.data().length > 0) {

                banhji.view.layout.showIn("#content", banhji.view.quote);
                kendo.fx($("#slide-form")).slideIn("down").play();

                var vm = banhji.quote;
                banhji.userManagement.addMultiTask("Quotation","quote",vm);

                if(banhji.pageLoaded["quote"]==undefined){
                    banhji.pageLoaded["quote"] = true;

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

        //  } else {
        //      window.location.replace(baseUrl + "admin");
        //  }
        // });
    });
    banhji.router.route("/sale_order(/:id)", function(id){
        // banhji.accessMod.query({
        //  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        // }).then(function(e){
        //  var allowed = false;
        //  if(banhji.accessMod.data().length > 0) {
        //      for(var i = 0; i < banhji.accessMod.data().length; i++) {
        //          if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
        //              allowed = true;
        //              break;
        //          }
        //      }
        //  }
        //  if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.saleOrder);
                kendo.fx($("#slide-form")).slideIn("down").play();

                var vm = banhji.saleOrder;
                banhji.userManagement.addMultiTask("Sale Order","sale_order",vm);

                if(banhji.pageLoaded["sale_order"]==undefined){
                    banhji.pageLoaded["sale_order"] = true;

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
        //  } else {
        //      window.location.replace(baseUrl + "admin");
        //  }
        // });
    });
    banhji.router.route("/customer_deposit(/:id)", function(id){
        // banhji.accessMod.query({
        //  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        // }).then(function(e){
        //  var allowed = false;
        //  if(banhji.accessMod.data().length > 0) {
        //      for(var i = 0; i < banhji.accessMod.data().length; i++) {
        //          if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
        //              allowed = true;
        //              break;
        //          }
        //      }
        //  }
        //  if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.customerDeposit);
                kendo.fx($("#slide-form")).slideIn("down").play();

                var vm = banhji.customerDeposit;
                banhji.userManagement.addMultiTask("Customer Deposit","customer_deposit",vm);

                if(banhji.pageLoaded["customer_deposit"]==undefined){
                    banhji.pageLoaded["customer_deposit"] = true;

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
        //  } else {
        //      window.location.replace(baseUrl + "admin");
        //  }
        // });
    });
    banhji.router.route("/cash_sale(/:id)", function(id){
        // banhji.accessMod.query({
        //  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        // }).then(function(e){
        //  var allowed = false;
        //  if(banhji.accessMod.data().length > 0) {
        //      for(var i = 0; i < banhji.accessMod.data().length; i++) {
        //          if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
        //              allowed = true;
        //              break;
        //          }
        //      }
        //  }
        //  if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.cashSale);
                kendo.fx($("#slide-form")).slideIn("down").play();

                var vm = banhji.cashSale;
                banhji.userManagement.addMultiTask("Cash Sale","cash_sale",vm);

                if(banhji.pageLoaded["cash_sale"]==undefined){
                    banhji.pageLoaded["cash_sale"] = true;

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

        //  } else {
        //      window.location.replace(baseUrl + "admin");
        //  }
        // });
    });
    banhji.router.route("/commercial_cash_sale(/:id)", function(id){
        // banhji.accessMod.query({
        //  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        // }).then(function(e){
        //  var allowed = false;
        //  if(banhji.accessMod.data().length > 0) {
        //      for(var i = 0; i < banhji.accessMod.data().length; i++) {
        //          if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
        //              allowed = true;
        //              break;
        //          }
        //      }
        //  }
        //  if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.cashSale);
                kendo.fx($("#slide-form")).slideIn("down").play();

                var vm = banhji.cashSale;
                banhji.userManagement.addMultiTask("Cash Sale","cash_sale",vm);

                if(banhji.pageLoaded["cash_sale"]==undefined){
                    banhji.pageLoaded["cash_sale"] = true;

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

        //  } else {
        //      window.location.replace(baseUrl + "admin");
        //  }
        // });
    });
    banhji.router.route("/vat_cash_sale(/:id)", function(id){
        // banhji.accessMod.query({
        //  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        // }).then(function(e){
        //  var allowed = false;
        //  if(banhji.accessMod.data().length > 0) {
        //      for(var i = 0; i < banhji.accessMod.data().length; i++) {
        //          if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
        //              allowed = true;
        //              break;
        //          }
        //      }
        //  }
        //  if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.cashSale);
                kendo.fx($("#slide-form")).slideIn("down").play();

                var vm = banhji.cashSale;
                banhji.userManagement.addMultiTask("Cash Sale","cash_sale",vm);

                if(banhji.pageLoaded["cash_sale"]==undefined){
                    banhji.pageLoaded["cash_sale"] = true;

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

        //  } else {
        //      window.location.replace(baseUrl + "admin");
        //  }
        // });
    });
    banhji.router.route("/invoice(/:id)", function(id){
        banhji.view.layout.showIn("#content", banhji.view.invoice);
        kendo.fx($("#slide-form")).slideIn("down").play();

        var vm = banhji.invoice;
        banhji.userManagement.addMultiTask("Invoice","invoice",vm);

        if(banhji.pageLoaded["invoice"]==undefined){
            banhji.pageLoaded["invoice"] = true;

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
    });
    banhji.router.route("/commercial_invoice(/:id)", function(id){
        // banhji.accessMod.query({
        //  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        // }).then(function(e){
        //  var allowed = false;
        //  if(banhji.accessMod.data().length > 0) {
        //      for(var i = 0; i < banhji.accessMod.data().length; i++) {
        //          if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
        //              allowed = true;
        //              break;
        //          }
        //      }
        //  }
        //  if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.invoice);
                kendo.fx($("#slide-form")).slideIn("down").play();

                var vm = banhji.invoice;
                banhji.userManagement.addMultiTask("Invoice","invoice",vm);

                if(banhji.pageLoaded["invoice"]==undefined){
                    banhji.pageLoaded["invoice"] = true;

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
        //  } else {
        //      window.location.replace(baseUrl + "admin");
        //  }
        // });
    });
    banhji.router.route("/vat_invoice(/:id)", function(id){
        // banhji.accessMod.query({
        //  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        // }).then(function(e){
        //  var allowed = false;
        //  if(banhji.accessMod.data().length > 0) {
        //      for(var i = 0; i < banhji.accessMod.data().length; i++) {
        //          if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
        //              allowed = true;
        //              break;
        //          }
        //      }
        //  }
        //  if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.invoice);
                kendo.fx($("#slide-form")).slideIn("down").play();

                var vm = banhji.invoice;
                banhji.userManagement.addMultiTask("Invoice","invoice",vm);

                if(banhji.pageLoaded["invoice"]==undefined){
                    banhji.pageLoaded["invoice"] = true;

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
        //  } else {
        //      window.location.replace(baseUrl + "admin");
        //  }
        // });
    });
    banhji.router.route("/cash_receipt(/:id)", function(id){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else {
            banhji.view.layout.showIn("#content", banhji.view.cashReceipt);
            kendo.fx($("#slide-form")).slideIn("down").play();

            var vm = banhji.cashReceipt;
            banhji.userManagement.addMultiTask("Cash Receipt","cash_receipt",vm);

            if(banhji.pageLoaded["cash_receipt"]==undefined){
                banhji.pageLoaded["cash_receipt"] = true;

                vm.dataSource.bind("change", vm.dataSourceChanges);

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

                $("#savePrint").click(function(e){
                    e.preventDefault();

                    if(validator.validate()){
                        vm.set("savePrint", true);
                        vm.save();
                    }else{
                        $("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
                    }
                });
            }

            vm.pageLoad(id);
        }
    });
    banhji.router.route("/cash_refund(/:id)", function(id){
        banhji.view.layout.showIn("#content", banhji.view.cashRefund);
        kendo.fx($("#slide-form")).slideIn("down").play();

        var vm = banhji.cashRefund;
        banhji.userManagement.addMultiTask("Cash Refund","cash_refund",vm);

        if(banhji.pageLoaded["cash_refund"]==undefined){
            banhji.pageLoaded["cash_refund"] = true;

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
        }

        vm.pageLoad(id);
    });

    // Report
    banhji.router.route("/sale_summary_by_customer", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.saleSummaryByCustomer);

            var vm = banhji.saleSummaryByCustomer;
            banhji.userManagement.addMultiTask("Sale Summary By Customer","sale_summary_by_customer",null);

            if(banhji.pageLoaded["sale_summary_by_customer"]==undefined){
                banhji.pageLoaded["sale_summary_by_customer"] = true;

                vm.sorterChanges();
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/sale_detail_by_customer", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.saleDetailByCustomer);

            var vm = banhji.saleDetailByCustomer;
            banhji.userManagement.addMultiTask("Sale Detail By Customer","sale_detail_by_customer",null);

            if(banhji.pageLoaded["sale_detail_by_customer"]==undefined){
                banhji.pageLoaded["sale_detail_by_customer"] = true;

                vm.sorterChanges();
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/sale_summary_by_product", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.saleSummaryByProduct);

            var vm = banhji.saleSummaryByProduct;
            banhji.userManagement.addMultiTask("Sale Summary By Product","sale_summary_by_product",null);

            if(banhji.pageLoaded["sale_summary_by_product"]==undefined){
                banhji.pageLoaded["sale_summary_by_product"] = true;

                vm.sorterChanges();
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/sale_detail_by_product", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.saleDetailByProduct);

            var vm = banhji.saleDetailByProduct;
            banhji.userManagement.addMultiTask("Sale Detail By Product","sale_detail_by_product",null);

            if(banhji.pageLoaded["sale_detail_by_product"]==undefined){
                banhji.pageLoaded["sale_detail_by_product"] = true;

                vm.sorterChanges();
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_balance_summary", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.customerBalanceSummary);

            var vm = banhji.customerBalanceSummary;
            banhji.userManagement.addMultiTask("Customer Balance Summary","customer_balance_summary",null);

            if(banhji.pageLoaded["customer_balance_summary"]==undefined){
                banhji.pageLoaded["customer_balance_summary"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_balance_detail", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            var vm = banhji.customerBalanceDetail;
            banhji.userManagement.addMultiTask("Customer Balance Detail","customer_balance_detail",null);
            banhji.view.layout.showIn("#content", banhji.view.customerBalanceDetail);
            if(banhji.pageLoaded["customer_balance_detail"]==undefined){
                banhji.pageLoaded["customer_balance_detail"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/receivable_aging_summary", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.receivableAgingSummary);

            var vm = banhji.receivableAgingSummary;
            banhji.userManagement.addMultiTask("Receivable Aging Summary","receivable_aging_summary",null);

            if(banhji.pageLoaded["receivable_aging_summary"]==undefined){
                banhji.pageLoaded["receivable_aging_summary"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/receivable_aging_detail", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.receivableAgingDetail);

            var vm = banhji.receivableAgingDetail;
            banhji.userManagement.addMultiTask("Receivable Aging Detail","receivable_aging_detail",null);

            if(banhji.pageLoaded["receivable_aging_detail"]==undefined){
                banhji.pageLoaded["receivable_aging_detail"] = true;
            }
            vm.pageLoad();
        }
    });
    banhji.router.route("/collect_invoice", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.collectInvoice);

            var vm = banhji.collectInvoice;
            banhji.userManagement.addMultiTask("List Invoice Collect","collect_invoice",null);

            if(banhji.pageLoaded["collect_invoice"]==undefined){
                banhji.pageLoaded["collect_invoice"] = true;
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
    banhji.router.route('/invoice_form(/:id)', function(id) {
        var blank = new kendo.View('#blank-tmpl');
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.invoiceForm);
        banhji.invoiceForm.pageLoad(id);
    });
    banhji.router.route('/print_bill(/:id)', function(id) {
        var blank = new kendo.View('#blank-tmpl');
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.printBill);
        banhji.printBill.pageLoad(id);
    });
    //Router Start 
    $(function() {
        banhji.router.start();
        banhji.source.pageLoad();
    });
</script>