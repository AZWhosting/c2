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
        lang     : langVM,
    });

    // Customer Setting
    banhji.customerSetting =  kendo.observable({
        lang                : langVM,
        contactTypeDS       : dataStore(apiUrl + "contacts/type"),
        patternDS           : dataStore(apiUrl + "contacts"),
        paymentMethodDS     : banhji.source.paymentMethodDS,
        paymentTermDS       : banhji.source.paymentTermDS,
        txnTemplateDS       : dataStore(apiUrl + "transaction_templates"),
        customFieldDS       : dataStore(apiUrl + "custom_fields"),
        membershipTypeDS    : dataStore(apiUrl + "membership_types"),
        contactTypeName     : "",
        contactTypeAbbr     : "",
        contactTypeCompany  : 0,
        paymentMethodName   : "",
        paymentTermName     : "",
        paymentTermNetDue   : "",
        paymentTermPeriod   : "",
        paymentTermPercentage   : "",
        prefixDS            : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "prefixes",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create  : {
                    url: apiUrl + "prefixes",
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update  : {
                    url: apiUrl + "prefixes",
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy     : {
                    url: apiUrl + "prefixes",
                    type: "DELETE",
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
            filter: { field:"type", operator:"where_in", value:["Quote", "Sale_Order", "Deposit","Commercial_Cash_Sale", "Vat_Cash_Sale", "Cash_Sale","Commercial_Invoice","Vat_Invoice", "Invoice", "Cash_Receipt", "GDN", "Sale_Return"] },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        pageLoad            : function() {
            this.txnTemplateDS.filter({ field: "moduls", value : "customer_mg" });
        },
        addContactType      : function(){
            var self = this, name = this.get("contactTypeName");

            if(name!==""){
                this.contactTypeDS.add({
                    parent_id   : 1,
                    name        : name,
                    abbr        : this.get("contactTypeAbbr"),
                    description : "",
                    is_company  : this.get("contactTypeCompany"),
                    is_system   : 0
                });

                this.contactTypeDS.sync();
                this.contactTypeDS.bind("requestEnd", function(e){
                    if(e.type==="create"){
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
        addPattern          : function(id){
            this.patternDS.insert(0, {
                "contact_type_id"       : id,
                "number"                : "",
                "locale"                : banhji.locale,
                "is_pattern"            : 1,
                "status"                : 1
            });
            this.patternDS.sync();
        },
        addPaymentMethod    : function(){
            var name = this.get("paymentMethodName");

            if(name!==""){
                this.paymentMethodDS.add({
                    name        : name,
                    description : "",
                    is_system   : 0
                });

                this.paymentMethodDS.sync();

                this.set("paymentMethodName", "");
            }
        },
        addPaymentTerm      : function(){
            var name = this.get("paymentTermName");

            if(name!==""){
                this.paymentTermDS.add({
                    name                : name,
                    net_due             : this.get("paymentTermNetDue"),
                    discount_period     : this.get("paymentTermPeriod"),
                    discount_percentage : this.get("paymentTermPercentage"),
                    is_system           : 0
                });

                this.paymentTermDS.sync();

                this.set("paymentTermName", "");
                this.set("paymentTermNetDue", "");
                this.set("paymentTermPeriod", "");
                this.set("paymentTermPercentage", "");
            }
        },
        deleteForm          : function(e){
            var data = e.data;
            if(confirm("Do you want to delete it?") == true) {
                this.txnTemplateDS.remove(data);
                this.txnTemplateDS.sync();
            }
        },
        goInvoiceCustom     : function(){
            window.location.assign(baseUrl + 'rrd#/invoice_custom');
        }
    });
    banhji.job = kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "jobs"),
        contactDS           : banhji.source.customerDS,
        obj                 : null,
        isVisible           : false,
        pageLoad            : function() {
        },
        addObj          : function(){
            this.dataSource.add({
                number              : "",
                name                : "",
                description         : "",
                contact_id          : "",
                contact             : []
            });
            var data = this.dataSource.data();
            var obj = data[data.length-1];
            this.set("obj", obj);
        },
        openWindow          : function(){
            this.addObj();
            this.set("isVisible", true);
        },
        closeWindow         : function(){
            this.dataSource.cancelChanges();

            this.set("isVisible", false);
        },
        save                : function(){
            var self = this, obj = this.get("obj");

            if(obj.name!=="" && obj.contact_id>0){
                this.dataSource.sync();
                this.dataSource.bind("requestEnd", function(e){
                    if( e.type == "create" || e.type == "update"){
                        self.set("isVisible", false);
                        banhji.source.loadJobs();
                    }
                });
            }else{
                alert("Name and Customer are required.");
            }
        },
        edit                : function(e){
            var data = e.data;
            this.set("obj", data);

            this.set("isVisible", true);
        },
        delete              : function(e){
            if (confirm("Are you sure, you want to delete it?")) {
                var data = e.data;
                this.dataSource.remove(data);
                this.dataSource.sync();
                this.dataSource.bind("requestEnd", function(e){
                    if(e.type=="destroy"){
                        banhji.source.loadJobs();
                    }
                });
            }
        },
        cancel          : function(){
            this.dataSource.cancelChanges();
            window.history.back();
        }
    });
    banhji.invoiceCustom =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transaction_templates"),
        txnFormDS           : dataStore(apiUrl + "transaction_forms"),
        contactDS           : new kendo.data.DataSource({
            data: { name: "", address: "", phone: ""},
            sort: { field:"number", dir:"asc" }
        }),
        obj                 : {type: "Quote", amount: "$500,000.00",title: "Quotation"},
        objForm             : null,
        formShow            : null,
        formTitle           : "Quotation",
        formType            : "Quote",
        company             : banhji.institute,
        saveClose           : false,
        selectTypeList      : banhji.source.customerFormList,
        selectCustom        : "customer_mg",
        isEdit              : false,
        onChange            : function(e) {
            var obj = this.get("obj"), self = this;
            this.txnFormDS.query({
                filter: [{ field:"type", value: obj.type }, {field:"moduls", value: obj.moduls }],
                page: 1,
                take: 100
            }).then(function(e){
                var view = self.txnFormDS.view();
                if(view.length > 0){
                    banhji.invoiceForm.set("obj", view[0]);
                    var obj = self.get("obj");
                    obj.set("type", view[0].type);
                    obj.set("title", view[0].title);
                    obj.set("note", view[0].note);
                }
            });
            setTimeout(function(e){ $('#formStyle a').eq(0).click(); },2000);
        },
        user_id             : banhji.source.user_id,
        pageLoad            : function(id){
            if(id){
                this.set("isEdit", true);
                this.loadObj(id);
            }else{
                var obj = this.get("obj"), self = this;
                if(this.formShow === null){
                    this.formShow = banhji.view.invoiceForm10;
                }
                banhji.view.invoiceCustom.showIn('#invFormContent', this.formShow);
                this.addRowLineDS();
                if(this.get("isEdit") || this.dataSource.total()==0){
                    this.addEmpty();
                    this.txnFormDS.query({
                        filter: { field:"type", value: obj.type },
                        page: 1,
                        take: 100
                    }).then(function(e){
                        var view = self.txnFormDS.view();
                        var obj = self.get("obj");
                        obj.set("type", view[0].type);
                        obj.set("title", view[0].title);
                        obj.set("note", view[0].note);

                    });
                }
                var name = banhji.invoiceForm.get("obj");
                name.set("title", this.formTitle);
                banhji.invoiceForm.contactDS.filter({field: "id", value: 1});
            }
        },
        addRowLineDS            : function(e){
            banhji.invoiceForm.lineDS.data([]);
            for (var i = 0; i < 15; i++) {
                banhji.invoiceForm.lineDS.add({
                    id          : i,
                    transaction_id      : i,
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
                    rate                : 1,
                    locale              : "",
                    movement            : -1,
                    reference_no        : "",
                    item                : { id:"", name:"" },
                    measurement         : { measurement_id:"", measurement:"" },
                    tax_item            : { id:"", name:"" },
                    variant             : [],
                    item_prices             : { measurement_id:"", measurement:"" },
                });
            }
        },
        activeInvoiceTmp        : function(e){
            var Active;
            switch(e) {
                case 1: Active = banhji.view.invoiceForm1; break;
                case 2: Active = banhji.view.invoiceForm2; break;
                //case 3: Active = banhji.view.invoiceForm3; break;
                //case 4: Active = banhji.view.invoiceForm4; break;
                //case 5: Active = banhji.view.invoiceForm5; break;
                case 6: Active = banhji.view.invoiceForm6; break;
                case 7: Active = banhji.view.invoiceForm7; break;
                case 8: Active = banhji.view.invoiceForm8; break;
                case 9: Active = banhji.view.invoiceForm9; break;
                case 10: Active = banhji.view.invoiceForm10; break;
                case 11: Active = banhji.view.invoiceForm11; break;
                case 12: Active = banhji.view.invoiceForm12; break;
                case 13: Active = banhji.view.invoiceForm13; break;
                case 14: Active = banhji.view.invoiceForm31; break;
                case 15: Active = banhji.view.invoiceForm15; break;
                case 16: Active = banhji.view.invoiceForm25; break;
                case 17: Active = banhji.view.invoiceForm17; break;
                case 18: Active = banhji.view.invoiceForm18; break;
                case 19: Active = banhji.view.invoiceForm19; break;
                case 20: Active = banhji.view.invoiceForm20; break;
                case 21: Active = banhji.view.invoiceForm21; break;
                case 22: Active = banhji.view.invoiceForm22; break;
                case 23: Active = banhji.view.invoiceForm28; break;
                case 24: Active = banhji.view.invoiceForm29; break;
                case 25: Active = banhji.view.invoiceForm35; break;
                case 26: Active = banhji.view.invoiceForm39; break;
                case 27: Active = banhji.view.invoiceForm19; break;
                case 28: Active = banhji.view.invoiceForm23; break; //old form 25 change Form
                case 29: Active = banhji.view.invoiceForm26; break;
                case 30: Active = banhji.view.invoiceForm25; break;
                case 31: Active = banhji.view.invoiceForm43; break; //old form 25 change Form
                case 32: Active = banhji.view.invoiceForm27; break;
                case 33: Active = banhji.view.invoiceForm30; break;
                case 34: Active = banhji.view.invoiceForm32; break;
                case 35: Active = banhji.view.invoiceForm33; break;
                case 36: Active = banhji.view.invoiceForm34; break;
                case 37: Active = banhji.view.invoiceForm36; break;
                case 38: Active = banhji.view.invoiceForm37; break;
                case 39: Active = banhji.view.invoiceForm38; break;
                case 40: Active = banhji.view.invoiceForm40; break;
                case 41: Active = banhji.view.invoiceForm41; break;
                case 42: Active = banhji.view.invoiceForm42; break;
                case 43: Active = banhji.view.formCaritasExpense; break;
                case 46: Active = banhji.view.purchaseSampleService; break;
                case 47: Active = banhji.view.invoiceTaxMekong; break;
                case 48: Active = banhji.view.invoiceMsp; break;
                case 50: Active = banhji.view.invoicePCGPADEE; break;
                case 51: Active = banhji.view.invoiceHDCom; break;
                case 52: Active = banhji.view.invoiceMAXConcrete; break;
                case 53: Active = banhji.view.invoiceVATMAXConcrete; break;
                case 54: Active = banhji.view.invoiceHeritageWalk; break;
                case 55: Active = banhji.view.invoiceVATHeritageWalk; break;
                case 56: Active = banhji.view.invoiceREACHS; break;
                case 57: Active = banhji.view.invoiceVATREACHS; break;
                case 58: Active = banhji.view.invoicePCG; break;
                case 59: Active = banhji.view.invoiceVATPCG; break;
                case 60: Active = banhji.view.normalInvoicePCG; break;
                case 61: Active = banhji.view.normalInvoiceREACHS; break;
                case 62: Active = banhji.view.recieptNoteRicemill; break;
                case 63: Active = banhji.view.depositHeritageWalk; break;
                case 64: Active = banhji.view.receiptHeritageWalk; break;
                case 65: Active = banhji.view.advanceVoucherPCG; break;
                case 68: Active = banhji.view.normalInvoiceKSLM; break;
                case 69: Active = banhji.view.commercialInvoiceKSLM; break;
                case 70: Active = banhji.view.vatInvoiceKSLM; break;
                case 71: Active = banhji.view.defaultCashAdvance; break;
                case 72: Active = banhji.view.defaultPurchase; break;
                case 73: Active = banhji.view.defaultSaleReturn; break;
                case 74: Active = banhji.view.defaultCashRefund; break;
                case 75: Active = banhji.view.invoiceHaveBalance; break;
            }
            banhji.view.invoiceCustom.showIn('#invFormContent', Active);
        },
        colorCC             : function(e){
            var Color = e.value;
            var tS = '';
            if(Color == '#000000' || Color =='#1f497d') tS = '#fff';
            else tS = '#333';
            $('.main-color').css({'background-color': e.value, 'color': tS});
            $('.main-color div').css({'color': tS});
            $('.main-color p').css({'color': tS});
            $('.main-color span').css({'color': tS});
            $('.main-color th').css({'color': tS});
        },
        selectedForm        : function(e){
            var Index = e.data.id;
            this.activeInvoiceTmp(Index);
            this.addRowLineDS();

            var data = e.data, obj = this.get("obj");
            obj.set("transaction_form_id", data.id);
        },
        loadObj             : function(id){
            var self = this;
            this.dataSource.query({
                filter: { field:"id", value: id },
                page: 1,
            }).then(function(e){
                var view = self.dataSource.view();
                self.set("obj", view[0]);

                banhji.invoiceForm.set("obj", view[0]);
                var Index = parseInt(view[0].transaction_form_id);
                self.activeInvoiceTmp(Index);
                self.addRowLineDS();

                self.txnFormDS.filter([
                    { field:"type", value: view[0].type },
                    { field:"moduls", value: view[0].moduls }
                ]);

                if(view[0].moduls == "customer_mg"){
                    self.set("selectTypeList", banhji.source.customerFormList);
                }else if(view[0].moduls == "vendor_mg"){
                    self.set("selectTypeList", banhji.source.vendorFormList);
                }
            });
        },
        addEmpty            : function(){
            this.dataSource.data([]);
            this.set("obj", null);
            this.set("isEdit", false);
            this.dataSource.insert(0,{
                user_id         : banhji.source.user_id,
                transaction_form_id : 0,
                type            : this.formType,
                name            : "",
                title           : "Quotation",
                note            : "",
                color           : null,
                moduls          : this.selectCustom,
                item_id         : '',
                status          : 0
            });
            var obj = this.dataSource.at(0);
            this.set("obj", obj);
        },
        save                : function(){
            var self = this,obj = this.get("obj");
            var dfd = $.Deferred();
            //Save Obj
            if(obj.name){
                this.dataSource.sync();
                this.dataSource.bind("requestEnd", function(e){
                    if(e.type != 'read' && e.response.results) {
                        self.cancel();
                        var notificat = $("#ntf1").data("kendoNotification");
                        notificat.hide();
                        notificat.success(self.lang.lang.success_message);
                    }
                });
                this.dataSource.bind("error", function(e){
                    dfd.reject(e.errorThrown);
                });
            }else{
                alert("Please Fill Name of Form!");
            }
        },
        cancel              : function(){
            this.dataSource.cancelChanges();
            window.history.back();
        }
    });
    banhji.invoiceForm =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "transactions"),
        referenceDS         : dataStore(apiUrl + "transactions"),
        txnTemplateDS       : dataStore(apiUrl + "transaction_templates"),
        obj                 : {title: "Quotation", issued_date : "<?php echo date('d/M/Y'); ?>", number : "QO123456", type : "Quote", amount: "$500,000.00", contact: []},
        company             : banhji.institute,
        paymentMethodDS     : banhji.source.paymentMethodDS,
        lineDS              : dataStore(apiUrl + "item_lines"),
        accountLineDS       : dataStore(apiUrl + "account_lines"),
        proaccountLineDS    : null,
        accountLine         : null,
        user_id             : banhji.source.user_id,
        selectForm          : null,
        contactDS           : dataStore(apiUrl + "contacts"),
        contactT            : null,
        paymentS            : null,
        accountDS           : null,
        journalLineDS       : dataStore(apiUrl + "journal_lines"),
        segmentItemDS       : banhji.source.segmentItemDS,
        totalCR             : 0,
        totalDR             : 0,
        netAmountDUE        : 0,
        isFalse             : false,
        numberToString      : '',
        numToWords          : function(number) {

            //Validates the number input and makes it a string
            if (typeof number === 'string') {
                number = parseInt(number, 10);
            }
            if (typeof number === 'number' && isFinite(number)) {
                number = number.toString(10);
            } else {
                return 'This is not a valid number';
            }

            //Creates an array with the number's digits and
            //adds the necessary amount of 0 to make it fully
            //divisible by 3
            var digits = number.split('');
            while (digits.length % 3 !== 0) {
                digits.unshift('0');
            }

            //Groups the digits in groups of three
            var digitsGroup = [];
            var numberOfGroups = digits.length / 3;
            for (var i = 0; i < numberOfGroups; i++) {
                digitsGroup[i] = digits.splice(0, 3);
            }
            //console.log(digitsGroup); //debug

            //Change the group's numerical values to text
            var digitsGroupLen = digitsGroup.length;
            var numTxt = [
                [null, 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'], //hundreds
                [null, 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'], //tens
                [null, 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'] //ones
                ];
            var tenthsDifferent = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];

            // j maps the groups in the digitsGroup
            // k maps the element's position in the group to the numTxt equivalent
            // k values: 0 = hundreds, 1 = tens, 2 = ones
            for (var j = 0; j < digitsGroupLen; j++) {
                for (var k = 0; k < 3; k++) {
                    var currentValue = digitsGroup[j][k];
                    digitsGroup[j][k] = numTxt[k][currentValue];
                    if (k === 0 && currentValue !== '0') { // !==0 avoids creating a string "null hundred"
                        digitsGroup[j][k] += ' hundred ';
                    } else if (k === 1 && currentValue === '1') { //Changes the value in the tens place and erases the value in the ones place
                        digitsGroup[j][k] = tenthsDifferent[digitsGroup[j][2]];
                        digitsGroup[j][2] = 0; //Sets to null. Because it sets the next k to be evaluated, setting this to null doesn't work.
                    }
                }
            }

            //Adds '-' for gramar, cleans all null values, joins the group's elements into a string
            for (var l = 0; l < digitsGroupLen; l++) {
                if (digitsGroup[l][1] && digitsGroup[l][2]) {
                    digitsGroup[l][1] += '-';
                }
                digitsGroup[l].filter(function (e) {return e !== null});
                digitsGroup[l] = digitsGroup[l].join('');
            }

            //Adds thousand, millions, billion and etc to the respective string.
            var posfix = [null, 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion'];
            if (digitsGroupLen > 1) {
                var posfixRange = posfix.splice(0, digitsGroupLen).reverse();
                for (var m = 0; m < digitsGroupLen - 1; m++) { //'-1' prevents adding a null posfix to the last group
                    if (digitsGroup[m]) {
                        digitsGroup[m] += ' ' + posfixRange[m];
                    }
                }
            }
            var word = digitsGroup.join(' ');
            if(this.get("obj").locale == 'en-US'){
                word = word + " USD only.";
            }else if(this.get("obj").locale == 'km-KH'){
                word = word + " Riel only.";
            }
            //Joins all the string into one and returns it
            this.set("numberToString", word.toUpperCase());
        },
        amountTotal         : "",
        offsetnumber        : "",
        offsetamount        : 0,
        balanceDS           : dataStore(apiUrl + "transactions"),
        pageLoad            : function(id, is_recurring){
            var self = this;
            this.dataSource.query({
                filter: { field:"id", value: id },
                page: 1,
                take: 1
            }).then(function(e){
                var view = self.dataSource.view();
                view[0].set("sub_total", kendo.toString(view[0].sub_total, "c", view[0].locale));
                view[0].set("tax", kendo.toString(view[0].tax, "c", view[0].locale));
                view[0].set("discount", kendo.toString(view[0].discount, "c", view[0].locale));
                self.set("amountTotal", view[0].amount);
                view[0].set("cash_receipt", kendo.toString(view[0].amount - view[0].deposit, "c", view[0].locale));
                //Get Customer ballance
                self.balanceDS.query({
                    filter: [
                        {field: "id <>", value: view[0].id},
                        {field: "contact_id", value: view[0].contact_id},
                        {field: "status <>", value: 1}
                    ]
                }).then(function(e){
                    var b = self.balanceDS.view();
                    if(b.length > 0){
                        self.calContactBalance(b);
                    }
                });
                view[0].set("deposit", kendo.toString(view[0].deposit, "c", view[0].locale));
                view[0].set("issued_date", kendo.toString(new Date(view[0].issued_date), 'D'));
                view[0].set("due_date", kendo.toString(new Date(view[0].due_date), "dd MMM yyyy"));
                view[0].set("amount", kendo.toString(view[0].amount, "c", view[0].locale));
                if(view[0].description == "null"){
                    view[0].set("description", "No Description");
                }
                if(view[0].payment_method_id){
                    self.paymentMethodDS.filter({field: "id", value: view[0].payment_method_id});
                }else{
                    self.paymentMethodDS.add({
                        name: 'Cash'
                    });
                }
                if(view[0].offset_invoice.length > 0){
                  var offamount = 0;
                  $.each(view[0].offset_invoice, function(i,v){
                    self.set("offsetnumber", self.get("offsetnumber") + " " + v.number);
                    offamount += kendo.parseFloat(v.amount);
                  });
                  self.set("offsetamount", kendo.toString(offamount, "c", view[0].locale));
                }
                self.set("obj", view[0]);
                var amountDue = kendo.parseFloat(view[0].amount) - kendo.parseFloat(view[0].deposit);
                self.get("obj").set("amount_due", kendo.toString(amountDue, "c", view[0].locale))
                self.loadObjTemplate(view[0].transaction_template_id, id);
                self.contactDS.filter({field: "id", value: view[0].contact_id});
                //give id
                var d = view[0];
                self.get("obj").set("qrcodevalue", "inv_num:"+d.number+"\ninv_amount:"+d.amount+"\ninv_date:"+d.issued_date+"\ncus_id:"+d.contact.id+"\ncus_name:"+d.contact.name+"\nstatus:"+d.status);
                if(self.get("obj").type == 'Direct_Expense'){
                    self.get("obj").set("title", "PAYMENT VOUCHER");
                }else if(self.get("obj").type == 'Reimbursement'){
                    self.get("obj").set("title", "REIMBURSEMENT VOUCHER");
                }else if(self.get("obj").type == 'Advance_Settlement'){
                    self.get("obj").set("title", "ADVANCE SETTLEMENT VOUCHER");
                }
                //get job
                if(view[0].job_id){
                    self.jobDS.filter({field: "id", value: view[0].job_id});
                }
            });
        },
        old_remain          : 0,
        amount_owed         : 0,
        calContactBalance   : function(data){
            var oldremain = 0;
            var obj = this.get("obj");
            $.each(data, function(i,v){
                var ba = v.amount - v.amount_paid;
                oldremain += ba;
            });
            this.set("old_remain", kendo.toString(oldremain, "c", obj.locale));
            this.set("amount_owed", kendo.toString(this.get("amountTotal") + oldremain, "c", obj.locale));
            $("#loading-inv").remove();
        },
        printGrid           : function() {
            var obj = this.get('obj'), colorM, ts;
            if(obj.color == null){
                colorM = "#10253f";
            }else{
                colorM = obj.color;
            }
            if(obj.color == '#000000' || obj.color =='#1f497d' || obj.color == null){
                ts = 'color: #fff!important;';
            } else { ts = 'color: #333;'; }
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
                    '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
                    '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
                    '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
                    '<link href="https://fonts.googleapis.com/css?family=Preahvihear" rel="stylesheet">' +
                    '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
                    '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
                    '<link href="https://fonts.googleapis.com/css?family=Preahvihear" rel="stylesheet" />' +
                    '<style>' +
                    'html { font: 11pt sans-serif; }' +
                    '.k-grid { border-top-width: 0; }' +
                    '.k-grid, .k-grid-content { height: auto !important; }' +
                    '.k-grid-content { overflow: visible !important; }' +
                    'div.k-grid table { table-layout: auto; width: 100% !important; }' +
                    '.k-grid .k-grid-header th { border-top: 1px solid; }' +
                    '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
                    '</style><style type="text/css" media="print"> @page { size: portrait; margin:0mm;margin-top: 1mm; }'+
                        '.inv1 .main-color {' +
                            'background-color: '+colorM+'!important; ' + ts +
                            '-webkit-print-color-adjust:exact; ' +
                        '} ' +
                        '.inv1 .main-color th{' +
                            'background-color: '+colorM+'!important; ' + ts +
                            '-webkit-print-color-adjust:exact; ' +
                        '} ' +
                        '.inv1 .light-blue-td { ' +
                            'background-color: #c6d9f1!important;' +
                            'text-align: left;' +
                            'padding-left: 5px;' +
                            '-webkit-print-color-adjust:exact; ' +
                        '}' +
                        '.inv1 thead tr {'+
                            'background-color: rgb(242, 242, 242)!important;'+
                            '-webkit-print-color-adjust:exact; ' +
                        '}'+
                        '.pcg .mid-title div {' + ts + '}' +
                        '.pcg .mid-header {' +
                            'background-color: #dce6f2!important; ' +
                            '-webkit-print-color-adjust:exact; ' +
                        '}'+
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
            setTimeout(function(){
                win.print();
                //win.close();
            },2000);
        },
        activeInvoiceTmp        : function(e){
            var Active;
            switch(e) {
                case 1: Active = banhji.view.invoiceForm1; break;
                case 2: Active = banhji.view.invoiceForm2; break;
                //case 3: Active = banhji.view.invoiceForm3; break;
                //case 4: Active = banhji.view.invoiceForm4; break;
                //case 5: Active = banhji.view.invoiceForm5; break;
                case 6: Active = banhji.view.invoiceForm6; break;
                case 7: Active = banhji.view.invoiceForm7; break;
                case 8: Active = banhji.view.invoiceForm8; break;
                case 9: Active = banhji.view.invoiceForm9; break;
                case 10: Active = banhji.view.invoiceForm10; break;
                case 11: Active = banhji.view.invoiceForm11; break;
                case 12: Active = banhji.view.invoiceForm12; break;
                case 13: Active = banhji.view.invoiceForm13; break;
                case 14: Active = banhji.view.invoiceForm31; break;
                case 15: Active = banhji.view.invoiceForm15; break;
                case 16: Active = banhji.view.invoiceForm25; break;
                case 17: Active = banhji.view.invoiceForm17; break;
                case 18: Active = banhji.view.invoiceForm18; break;
                case 19: Active = banhji.view.invoiceForm19; break;
                case 20: Active = banhji.view.invoiceForm20; break;
                case 21: Active = banhji.view.invoiceForm21; break;
                case 22: Active = banhji.view.invoiceForm22; break;
                case 23: Active = banhji.view.invoiceForm28; break;
                case 24: Active = banhji.view.invoiceForm29; break;
                case 25: Active = banhji.view.invoiceForm35; break;
                case 26: Active = banhji.view.invoiceForm39; break;
                case 27: Active = banhji.view.invoiceForm19; break;
                case 28: Active = banhji.view.invoiceForm25; break;
                case 29: Active = banhji.view.invoiceForm26; break;
                case 30: Active = banhji.view.invoiceForm25; break;
                case 31: Active = banhji.view.invoiceForm25; break;
                case 32: Active = banhji.view.invoiceForm27; break;
                case 33: Active = banhji.view.invoiceForm30; break;
                case 34: Active = banhji.view.invoiceForm32; break;
                case 35: Active = banhji.view.invoiceForm33; break;
                case 36: Active = banhji.view.invoiceForm34; break;
                case 37: Active = banhji.view.invoiceForm36; break;
                case 38: Active = banhji.view.invoiceForm37; break;
                case 39: Active = banhji.view.invoiceForm38; break;
                case 40: Active = banhji.view.invoiceForm40; break;
                case 41: Active = banhji.view.invoiceForm41; break;
                case 42: Active = banhji.view.invoiceForm42; break;
                case 43: Active = banhji.view.formCaritasExpense; break;
                case 44: Active = banhji.view.formCaritasJournal; break;
                case 50: Active = banhji.view.invoicePCGPADEE; break;
                case 51: Active = banhji.view.invoiceHDCom; break;
                case 52: Active = banhji.view.invoiceMAXConcrete; break;
                case 53: Active = banhji.view.invoiceVATMAXConcrete; break;
                case 54: Active = banhji.view.invoiceHeritageWalk; break;
                case 55: Active = banhji.view.invoiceVATHeritageWalk; break;
                case 56: Active = banhji.view.invoiceREACHS; break;
                case 57: Active = banhji.view.invoiceVATREACHS; break;
                case 58: Active = banhji.view.invoicePCG; break;
                case 59: Active = banhji.view.invoiceVATPCG; break;
                case 60: Active = banhji.view.normalInvoicePCG; break;
                case 61: Active = banhji.view.normalInvoiceREACHS; break;
                case 62: Active = banhji.view.recieptNoteRicemill; break;
                case 63: Active = banhji.view.depositHeritageWalk; break;
                case 64: Active = banhji.view.receiptHeritageWalk; break;
                case 65: Active = banhji.view.advanceVoucherPCG; break;
                case 68: Active = banhji.view.normalInvoiceKSLM; break;
                case 69: Active = banhji.view.commercialInvoiceKSLM; break;
                case 70: Active = banhji.view.vatInvoiceKSLM; break;
                case 71: Active = banhji.view.defaultCashAdvance; break;
                case 72: Active = banhji.view.defaultPurchase; break;
                case 73: Active = banhji.view.defaultSaleReturn; break;
                case 74: Active = banhji.view.defaultCashRefund; break;
                case 75: Active = banhji.view.invoiceHaveBalance; break;
            }
            banhji.view.invoiceForm.showIn('#invFormContent', Active);
        },
        segmentItemDS       : dataStore(apiUrl + "segments/item"),
        jobDS               : dataStore(apiUrl + "jobs"),
        haveAccount         : false,
        amountOfAccLine     : 0,
        loadObjTemplate     : function(id, transaction_id){
            var self = this, obj = this.get('obj');
            this.txnTemplateDS.query({
                filter: { field:"id", value: id },
                page: 1,
                take: 100
            }).then(function(e){
                var view = self.txnTemplateDS.view(), Index = parseInt(view[0].transaction_form_id), Active;
                obj.set("color", view[0].color);
                if(obj.type == "Advance_Settlement"){
                    obj.set("title", "Advance Settlement");
                }else{
                    obj.set("title", view[0].title);
                }
                self.activeInvoiceTmp(Index);
                self.lineDS.query({
                    filter: { field:"transaction_id", value: transaction_id }
                })
                .then(function(e){
                    var CountItemsRow = parseInt(self.lineDS.data().length);
                    var TotalRow = 10 - CountItemsRow;
                    if(banhji.institute.id != 1021){
                        if(TotalRow > 0){
                            if(view[0].transaction_form_id != '73' && view[0].transaction_form_id != '74'){
                                for (var i = 1; i < TotalRow; i++) {
                                    self.lineDS.add({
                                        id          : i,
                                        transaction_id      : i,
                                        tax_item_id         : 0,
                                        item_id             : 0,
                                        assembly_id         : 0,
                                        measurement_id      : 0,
                                        description         : "",
                                        quantity            : "",
                                        conversion_ratio    : 1,
                                        cost                : 0,
                                        price               : 0,
                                        amount              : "",
                                        discount            : 0,
                                        discount_percentage : 0,
                                        tax                 : 0,
                                        rate                : 1,
                                        locale              : "",
                                        movement            : -1,
                                        reference_no        : "",
                                        item                : { id:"", name:"" },
                                        measurement         : { measurement_id:"", measurement:"" },
                                        tax_item            : { id:"", name:"" },
                                        variant             : [],
                                        item_prices             : { measurement_id:"", measurement:"" },
                                    });
                                }
                            }
                        }
                    }
                    
                });
                self.accountLineDS.query({
                    filter: { field:"transaction_id", value: transaction_id }
                }).then(function(e){
                    if(banhji.invoiceForm.accountLineDS.data().length > 0){
                        $.each(banhji.source.accountList, function(i,v){
                            if(v.id == banhji.invoiceForm.accountLineDS.data()[0].account_id){
                                self.set("proaccountLineDS", v);
                                return false;
                            }
                        });
                        self.set("haveAccount", true);
                        self.set("amountOfAccLine", 0);
                        var amountOfAcc = 0;
                        $.each(self.accountLineDS.data(), function(i,v){
                            amountOfAcc += v.amount;
                        });
                        self.set("amountOfAccLine", kendo.toString(amountOfAcc, self.accountLineDS.data()[0].locale == 'km-KH'?'c':'c2', self.accountLineDS.data()[0].locale));
                    }else{
                        self.set("haveAccount", false);
                    }
                });
                if(self.get("obj").account_id){
                    $.each(banhji.source.accountList, function(i,v){
                        if(v.id == self.get("obj").account_id){
                            self.set("accountDS", v);
                            return false;
                        }
                    });
                }
                var SegMentID = '';
                self.journalLineDS.query({
                    filter:{field: "transaction_id", value: transaction_id}
                }).then(function(e){
                    if(self.journalLineDS.data().length > 0){
                        var DR = 0, CR = 0;
                        var that = self;
                        $.each(self.journalLineDS.data(),function(i,v){
                            //Calculate DR/CR
                            DR += v.dr;
                            CR += v.cr;
                        });
                        var journalLocale = banhji.invoiceForm.journalLineDS.data()[0].locale;
                        banhji.invoiceForm.set("totalCR", kendo.toString(CR, journalLocale == 'km-KH'?'c':'c2', journalLocale));
                        banhji.invoiceForm.set("totalDR", kendo.toString(DR, journalLocale == 'km-KH'?'c':'c2', journalLocale));
                        var D = kendo.parseFloat(banhji.invoiceForm.get("obj").deposit);
                        var NumToStr = banhji.invoiceForm.numToWords(DR - D);
                        // banhji.invoiceForm.set("numberToString", NumToStr.toUpperCase());
                        banhji.invoiceForm.set("netAmountDUE", kendo.toString(DR - D, journalLocale == 'km-KH'?'c':'c2', journalLocale));
                        var CountLineRow = parseInt(self.journalLineDS.data().length);
                        var TotalRow = 12 - CountLineRow;
                        if(TotalRow > 0){
                            self.setQR();
                        }
                    }
                });
                self.currencyDS.filter({field: "locale", value: obj.locale});
            });
        },
        setQR           :function(){
            var obj = this.get("obj");
            // var qrCode = $("#invQR").data("kendoQRCode");
            //  qrCode.destroy();
            $("#invQR").kendoQRCode({
                value: "inv_num:"+obj.number+"\ninv_amount:"+obj.amount+"\ninv_date:"+obj.issued_date+"\ncus_id:"+obj.contact.id+"\ncus_name:"+obj.contact.name+"\nstatus:"+obj.status,
                size: 120,
                color: "#10253f",
                encoding: "UTF_8",
                background: "transparent"
            });
        },
        refreshJournalDatasource : function(){
            var ListVW = $("#formListView").data("kendoListView");
            ListVW.refresh();
        },
        cancel              : function(){
            this.dataSource.cancelChanges();
            window.history.back();
        },
        totalDr: function() {
            var sum = 0;

            $.each(this.journalLineDS.data(), function(index, value) {
                sum += value.dr;
            });

            return sum;
        },
        totalCr: function() {
            var sum = 0;

            $.each(this.journalLineDS.data(), function(index, value) {
                sum += value.cr;
            });

            return sum;
        },
        currencyDS          : banhji.source.currencyDS,
    });
    banhji.customerGroup =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "contacts/group"),
        contactDS           : dataStore(apiUrl + "contacts"),
        contactTypeDS       : dataStore(apiUrl + "contacts/type"),
        textSearch          : "",
        contact_type_id     : 0,
        editMode            : false,
        obj                 : [],
        pageLoad            : function(){
        },
        search              : function(){
            var textSearch = this.get("textSearch"),
                contact_type_id = this.get("contact_type_id"),
                para = [];

            if(textSearch){
                var textParts = textSearch.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);

                para.push({ field:"abbr", value:textParts[0] });
                if(textParts[1]){
                    para.push({ field:"number", value:textParts[1] });
                }
                para.push({ field:"name", operator:"or_like", value:textSearch });
            }

            if(contact_type_id){
                para.push({ field: "contact_type_id", value: contact_type_id });
            }else{
                para.push({ field: "parent_id", operator:"where_related_contact_type", value: 1 });
            }

            this.contactDS.filter(para);

            this.set("textSearch", "");
            this.set("contact_type_id", 0);
        },
        setObj              : function(){
            this.set("editMode", false);
            this.set("obj", { name:"", description:"", contacts:[] });
        },
        edit                : function(e){
            var data = e.data;

            this.set("editMode", true);
            this.set("obj", data);
        },
        save                : function(){
            var self = this, obj = this.get("obj");

            if(obj.name){
                if(this.get("editMode")==false){
                    this.dataSource.insert(0, {
                        type        : "Customer",
                        name        : obj.name,
                        description : "",

                        contacts    : obj.contacts
                    });
                }

                this.dataSource.sync();
                this.dataSource.bind("requestEnd", function(){
                    self.setObj();
                });
            }else{
                $("#ntf1").data("kendoNotification").error("Group Name is required!");
            }
        },
        cancel              : function(){
            this.setObj();
            this.dataSource.cancelChanges();
        }
    });
    banhji.contactAssignee =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "contact_assignees/summary"),
        contactAssigneeDS   : dataStore(apiUrl + "contact_assignees"),
        contactDS           : dataStore(apiUrl + "contacts"),
        contactTypeDS       : dataStore(apiUrl + "contacts/type"),
        employeeDS          : dataStore(apiUrl + "contacts"),
        textSearch          : "",
        contact_type_id     : 0,
        editMode            : false,
        obj                 : [],
        pageLoad            : function(){
        },
        search              : function(){
            var textSearch = this.get("textSearch"),
                contact_type_id = this.get("contact_type_id"),
                para = [];

            if(textSearch){
                var textParts = textSearch.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);

                para.push({ field:"abbr", value:textParts[0] });
                if(textParts[1]){
                    para.push({ field:"number", value:textParts[1] });
                }
                para.push({ field:"name", operator:"or_like", value:textSearch });
            }

            if(contact_type_id){
                para.push({ field: "contact_type_id", value: contact_type_id });
            }else{
                para.push({ field: "parent_id", operator:"where_related_contact_type", value: 1 });
            }

            this.contactDS.filter(para);

            this.set("textSearch", "");
            this.set("contact_type_id", 0);
        },
        setObj              : function(){
            this.set("editMode", false);
            this.set("obj", { assignee:null, contacts:[] });
        },
        edit                : function(e){
            var data = e.data;

            this.set("editMode", true);
            this.set("obj", data);

            this.contactAssigneeDS.query({
                filter:{ field:"assignee_id", value: data.assignee_id }
            });
        },
        save                : function(){
            var self = this, obj = this.get("obj");

            if(obj.assignee && obj.contacts.length>0){
                //Remove previous List
                var raw = this.contactAssigneeDS.data();
                var item, i;
                for(i=raw.length-1; i>=0; i--){
                    item = raw[i];

                    this.contactAssigneeDS.remove(item);
                }

                var ids = [];
                $.each(obj.contacts, function(index, value){
                    ids.push(kendo.parseInt(value.id));
                });
                ids = jQuery.unique( ids );

                $.each(ids, function(index, value){
                    self.contactAssigneeDS.add({
                        assignee_id : obj.assignee.id,
                        contact_id  : value
                    });
                });

                this.contactAssigneeDS.sync();
                this.contactAssigneeDS.bind("requestEnd", function(e){
                    if(e.type!=="read"){
                        self.cancel();
                        self.dataSource.fetch();
                    }
                });
            }else{
                $("#ntf1").data("kendoNotification").error("Please select employee and customers");
            }
        },
        cancel              : function(){
            this.contactAssigneeDS.data([]);
            this.contactAssigneeDS.cancelChanges();
            this.setObj();
        }
    });
    banhji.addAccountingprefix =  kendo.observable({
        lang                : langVM,
        selectTypeList      : banhji.source.typeList,
        Type                : "Invoice",
        dataSource          : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "prefixes",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create  : {
                    url: apiUrl + "prefixes",
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update  : {
                    url: apiUrl + "prefixes",
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy     : {
                    url: apiUrl + "prefixes",
                    type: "DELETE",
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
            filter: { field:"type", operator:"where_not_in", value:["Electricity_Invoice", "Water_Invoice"] },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        pageLoad            : function(id){
            if(id){
                this.set("isEdit", true);
                this.loadObj(id);
            }else{
                this.cancel;
            }
        },
        loadObj             : function(id){
            var self = this;
            this.dataSource.query({
                filter: { field:"id", value: id },
                page: 1,
                take: 100
            }).then(function(e){
                var view = self.dataSource.view();
                self.set("obj", view[0]);

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
            //Save Obj
            this.objSync()
            .then(function(data){ //Success
                banhji.accountingSetting.prefixDS.fetch();

                return data;
            }, function(reason) { //Error
                $("#ntf1").data("kendoNotification").error(reason);
            }).then(function(result){
                $("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

                if(self.get("saveClose")){
                    //Save Close
                    self.set("saveClose", false);
                    self.cancel();
                    //window.history.back();
                }else{
                    //Save New
                    self.addEmpty();
                }
            });
        },
        cancel              : function(){
            this.dataSource.cancelChanges();
            window.history.back();
        }
    });


    // VENDOR SETTINGS
    banhji.vendorSetting =  kendo.observable({
        lang                : langVM,
        paymentMethodDS     : banhji.source.paymentMethodDS,
        paymentTermDS       : banhji.source.paymentTermDS,
        txnTemplateDS       : dataStore(apiUrl + "transaction_templates"),
        contactTypeDS       : dataStore(apiUrl + "contacts/type"),
        patternDS           : dataStore(apiUrl + "contacts"),
        contactTypeName     : "",
        contactTypeAbbr     : "",
        contactTypeCompany  : 0,
        paymentMethodName   : "",
        paymentTermName     : "",
        paymentTermNetDue   : "",
        paymentTermPeriod   : "",
        paymentTermPercentage   : "",
        prefixDS            : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "prefixes",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create  : {
                    url: apiUrl + "prefixes",
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update  : {
                    url: apiUrl + "prefixes",
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy     : {
                    url: apiUrl + "prefixes",
                    type: "DELETE",
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
            filter: { field:"type", operator:"where_in", value:["Purchase_Order", "GRN", "Cash_Payment", "Deposit", "Purchase_Return", "Cash_Purchase", "Credit_Purchase", "Cash_Payment"] },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        pageLoad            : function() {
            this.txnTemplateDS.filter({ field: "moduls", value : "vendor_mg" });
        },
        addContactType      : function(){
            var self = this, name = this.get("contactTypeName");

            if(name!==""){
                this.contactTypeDS.add({
                    parent_id   : 2,
                    name        : name,
                    abbr        : this.get("contactTypeAbbr"),
                    description : "",
                    is_company  : this.get("contactTypeCompany"),
                    is_system   : 0
                });

                this.contactTypeDS.sync();
                this.contactTypeDS.bind("requestEnd", function(e){
                    if(e.type==="create"){
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
        addPattern          : function(id){
            this.patternDS.insert(0, {
                "contact_type_id"       : id,
                "number"                : "",
                "locale"                : banhji.locale,
                "is_pattern"            : 1,
                "status"                : 1
            });
            this.patternDS.sync();
        },
        addPaymentMethod        : function(){
            var name = this.get("paymentMethodName");

            if(name!==""){
                this.paymentMethodDS.add({
                    name        : name,
                    description : "",
                    is_system   : 0
                });

                this.paymentMethodDS.sync();

                this.set("paymentMethodName", "");
            }
        },
        addPaymentTerm      : function(){
            var name = this.get("paymentTermName");

            if(name!==""){
                this.paymentTermDS.add({
                    name                : name,
                    net_due             : this.get("paymentTermNetDue"),
                    discount_period     : this.get("paymentTermPeriod"),
                    discount_percentage : this.get("paymentTermPercentage"),
                    is_system           : 0
                });

                this.paymentTermDS.sync();

                this.set("paymentTermName", "");
                this.set("paymentTermNetDue", "");
                this.set("paymentTermPeriod", "");
                this.set("paymentTermPercentage", "");
            }
        },
        deleteForm      : function(e){
            var data = e.data;
            if(confirm("Do you want to delete it?") == true) {
                this.txnTemplateDS.remove(data);
                this.txnTemplateDS.sync();
            }
        },
        goInvoiceCustom : function(){

            banhji.invoiceCustom.set("selectTypeList", banhji.source.vendorFormList);
            banhji.invoiceCustom.set("selectCustom", "vendor_mg");
            banhji.invoiceCustom.set("formShow", banhji.view.invoiceForm35);
            banhji.invoiceCustom.set("formTitle", "Purchase Order");
            banhji.invoiceCustom.set("formType", "Purchase_Order");
            var obj= banhji.invoiceCustom.get("obj");
            obj.set("type", "Purchase_Order");
            //banhji.router.navigate('/invoice_custom');
            window.location.assign(baseUrl + 'rrd#/invoice_custom');
        }
    });
    
    // INVENTORY SETTING
    banhji.itemSetting =  kendo.observable({
        lang                : langVM,
        itemTypeDS          : dataStore(apiUrl + "item_types"),
        categoryDS          : dataStore(apiUrl + "categories"),
        itemGroupDS         : dataStore(apiUrl + "items/group"),
        brandDS             : dataStore(apiUrl + "brands"),
        measurementDS       : dataStore(apiUrl + "measurements"),
        measurementCategoryDS: dataStore(apiUrl + "measurement_categories"),
        patternDS           : dataStore(apiUrl + "items"),
        category_code       : "",
        category_name       : "",
        category_abbr       : "",
        category_item_type_id : 1,
        item_group_category_id : 0,
        item_group_code     : "",
        item_group_name     : "",
        item_group_abbr     : "",
        measurement_name    : "",
        measurement_category_id : 0,
        brand_code          : "",
        brand_name          : "",
        brand_abbr          : "",
        prefixDS            : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "prefixes",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create  : {
                    url: apiUrl + "prefixes",
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update  : {
                    url: apiUrl + "prefixes",
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy     : {
                    url: apiUrl + "prefixes",
                    type: "DELETE",
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
            filter: { field:"type", operator:"where_in", value:["GRN", "GDN", "Item_Adjustment", "Internal_Usage"] },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        pageLoad            : function() {
        },
        addCategory         : function(){
            var self = this,
            name = this.get("category_name"),
            abbr = this.get("category_abbr");

            if(name!=="" && abbr!==""){
                this.categoryDS.add({
                    sub_of          : 0,
                    item_type_id    : this.get("category_item_type_id"),
                    item_id         : 0,
                    code            : "",
                    name            : name,
                    abbr            : abbr,
                    is_system       : 0,
                    item_type       : []
                });

                this.categoryDS.sync();
                var saved = false;
                this.categoryDS.bind("requestEnd", function(e){
                    if(e.type==="create" && saved==false){
                        saved = true;

                        var response = e.response.results[0];
                        // self.addPattern(response.id, response.item_type_id);
                        banhji.source.loadCategories();
                    }
                });

                this.set("category_name", "");
                this.set("category_abbr", "");
            }else{
                alert("required abbr and name!");
            }
        },
        categoryChanges     : function(){
            banhji.source.loadCategories();
        },
        addPattern          : function(category_id, item_type_id){
            this.patternDS.insert(0, {
                item_type_id            : item_type_id,
                category_id             : category_id,
                number                  : "",
                is_pattern              : 1,
                status                  : 1
            });

            this.patternDS.sync();
        },
        addItemGroup        : function(){
            var self = this,
            category_id = this.get("item_group_category_id"),
            name = this.get("item_group_name"),
            abbr = this.get("item_group_abbr");

            if(category_id>0 && name!=="" && abbr!==""){
                this.itemGroupDS.add({
                    category_id     : category_id,
                    sub_of          : 0,
                    code            : "",
                    name            : name,
                    abbr            : abbr,
                    is_system       : 0,

                    category        : [{name:""}]
                });

                this.itemGroupDS.sync();
                var saved = false;
                this.itemGroupDS.bind("requestEnd", function(e){
                    if(e.type==="create" && saved==false){
                        saved = true;
                        banhji.source.loadItemGroups();
                    }
                });

                self.set("item_group_category_id", 0);
                self.set("item_group_code", "");
                self.set("item_group_name", "");
                self.set("item_group_abbr", "");
            }else{
                alert("required category, abbr, and name!");
            }
        },
        addMeasurementCategory      : function(){
            var name = this.get("measurement_category_name");

            if(name!==""){
                this.measurementCategoryDS.add({
                    name        : name,
                    is_system   : 0
                });

                this.measurementCategoryDS.sync();

                this.set("measurement_category_name", "");
            }else{
                alert("required name");
            }
        },
        addMeasurement      : function(){
            var self = this,
                measurement_category_id = this.get("measurement_category_id"),
                name = this.get("measurement_name");

            if(name!=="" && measurement_category_id>0){
                var category = this.measurementCategoryDS.get(measurement_category_id);

                this.measurementDS.add({
                    measurement_category_id : measurement_category_id,
                    name        : name,
                    description : name,
                    is_system   : 0,
                    category    : category.name
                });

                this.measurementDS.sync();
                var saved = false;
                this.measurementDS.bind("requestEnd", function(e){
                    if(saved==false){
                        saved = true;
                        banhji.source.loadMeasurements();
                    }
                });

                this.set("measurement_category_id", 0);
                this.set("measurement_name", "");
            }else{
                alert("required both name and category");
            }
        },
        addBrand            : function(){
            var self = this,
            code = this.get("brand_code"),
            name = this.get("brand_name");

            if(name!=="" && code!==""){
                this.brandDS.add({
                    sub_of      : this.get("brand_sub_of"),
                    code        : code,
                    name        : name,
                    abbr        : this.get("brand_abbr")
                });

                this.brandDS.sync();

                this.set("brand_code", "");
                this.set("brand_name", "");
                this.set("brand_abbr", "");
            }else{
                alert("required number and name!");
            }
        },
        goPattern           : function(e){
            var data = e.data;

            if(data.item_type_id==1){
                banhji.router.navigate('/item/0/'+data.id);
            }else if(data.item_type_id==2){
                banhji.router.navigate('/non_inventory_part/0/'+data.id);
            }else if(data.item_type_id==3){
                banhji.router.navigate('/fixed_assets/0/'+data.id);
            }else if(data.item_type_id==4){
                banhji.router.navigate('/item_service/0/'+data.id);
            }else if(data.item_type_id==5){
                banhji.router.navigate('/txn_item/0/'+data.id);
            }
        }
    });
    banhji.serviceSetting =  kendo.observable({
        lang                : langVM,
        categoryDS          : dataStore(apiUrl + "categories"),
        itemGroupDS         : dataStore(apiUrl + "items/group"),
        measurementDS       : dataStore(apiUrl + "measurements"),
        itemTypeDS          : dataStore(apiUrl + "item_types"),
        category_code       : "",
        category_name       : "",
        category_abbr       : "",
        category_item_type_id : 4,
        item_group_category_id : 0,
        item_group_code     : "",
        item_group_name     : "",
        item_group_abbr     : "",
        measurement_name    : "",
        pageLoad            : function() {

        },
        addCategory         : function(){
            var self = this,
            name = this.get("category_name"),
            code = this.get("category_code");

            if(name!=="" && code!==""){
                this.categoryDS.add({
                    sub_of          : 0,
                    item_type_id    : this.get("category_item_type_id"),
                    item_id         : 0,
                    code            : code,
                    name            : name,
                    abbr            : this.get("category_abbr"),
                    is_system       : 0,
                    item_type       : []
                });

                this.categoryDS.sync();
                this.set("category_code", "");
                this.set("category_name", "");
                this.set("category_abbr", "");
            }else{
                alert("required number and name!");
            }
        },
        addItemGroup        : function(){
            var self = this,
            category_id = this.get("item_group_category_id"),
            name = this.get("item_group_name"),
            code = this.get("item_group_code");

            if(category_id>0 && name!=="" && code!==""){
                this.itemGroupDS.add({
                    category_id     : category_id,
                    sub_of          : 0,
                    code            : code,
                    name            : name,
                    abbr            : this.get("item_group_abbr"),
                    is_system       : 0
                });

                this.itemGroupDS.sync();

                self.set("item_group_category_id", 0);
                self.set("item_group_code", "");
                self.set("item_group_name", "");
                self.set("item_group_abbr", "");
            }else{
                alert("required category, number, and name!");
            }
        },
        addMeasurement      : function(){
            var self = this,
            name = this.get("measurement_name");

            if(name!==""){
                this.measurementDS.add({
                    name        : name,
                    description : name,
                    is_system   : 0
                });

                this.measurementDS.sync();

                this.set("measurement_name", "");
            }else{
                alert("required name");
            }
        },
        goPattern   : function(e){
            var data = e.data;

            if(kendo.parseInt(data.item_id)>0){
                banhji.router.navigate('/item_service/'+data.item_id+'/1');
            }else{
                banhji.router.navigate('/item_service');
                banhji.item.setPattern(data.id);
            }
        }
    });
    banhji.variants =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "variant_attributes"),
        attributeValueDS    : dataStore(apiUrl + "attribute_values"),
        pageLoad            : function() {
        },
        addNew              : function(){
            var listView = $("#listView").data("kendoListView");
            // add item
            listView.add();
        },
        addNewAttributeValue: function(e){
            var self = this, data = e.data;

            this.attributeValueDS.query({
                filter: { field:"variant_attribute_id", value: data.id }
            }).then(function(){
                self.attributeValueDS.insert(0, {
                    variant_attribute_id    : data.id,
                    name                    : "",
                    color_code              : "",
                    image_url               : ""
                });
            });

        },
        viewAttributeValue  : function(e){
            var data = e.data;

            this.attributeValueDS.filter({ field:"variant_attribute_id", value: data.id });
        }
    });
    banhji.warehouses =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "warehouses"),
        locationDS          : dataStore(apiUrl + "locations"),
        locationTypeDS      : dataStore(apiUrl + "location_types"),
        zoneDS              : dataStore(apiUrl + "zones"),
        sectionDS           : dataStore(apiUrl + "sections"),
        rackDS              : dataStore(apiUrl + "racks"),
        levelDS             : dataStore(apiUrl + "levels"),
        positionDS          : dataStore(apiUrl + "positions"),
        binLocationDS       : dataStore(apiUrl + "bin_locations"),
        pageLoad            : function() {
        },
        addNew              : function(){
            var listView = $("#listView").data("kendoListView");
            // add item
            listView.add();
        },
        addNewLocation      : function(e){
            var data = e.data;

            this.locationDS.insert(0, {
                warehouse_id        : data.id,
                location_type_id    : 0,
                number              : "",
                name                : "",
                location_type       : { id:0, name:"" }
            });
        },
        viewLocation        : function(e){
            var data = e.data;
            this.locationDS.filter({ field:"warehouse_id", value: data.id });
        },
        addNewBinLocation   : function(){
            var lvBinLocation = $("#lvBinLocation").data("kendoListView");
            // add item
            lvBinLocation.add();
        },
        generateNumber      : function(e){
            var data = e.data, number = "";

            if(data.warehouse_id>0){
                var warehouse = this.dataSource.get(data.warehouse_id);
                number += warehouse.number;
            }

            if(data.location_id>0){
                var location = this.locationDS.get(data.location_id);
                number += location.number;
            }

            if(data.zone_id>0){
                var zone = this.zoneDS.get(data.zone_id);
                number += zone.number;
            }

            if(data.section_id>0){
                var section = this.sectionDS.get(data.section_id);
                number += section.number;
            }

            if(data.rack_id>0){
                var rack = this.rackDS.get(data.rack_id);
                number += rack.number;
            }

            if(data.level_id>0){
                var level = this.levelDS.get(data.level_id);
                number += level.number;
            }

            if(data.position_id>0){
                var position = this.positionDS.get(data.position_id);
                number += position.number;
            }
            console.log(number);
            // data.set("number", "xxxx");

            // this.binLocationDS.sync();
        },
        binLocationDSChanges: function(arg){
            var self = banhji.warehouses;

            if(arg.field){
                var dataRow = arg.items[0],
                    number = "";

                if(dataRow.autoNumber){
                    if(dataRow.warehouse_id){
                        var warehouse = self.dataSource.get(dataRow.warehouse_id);
                        number += warehouse.number;
                    }

                    if(dataRow.location_id){
                        var location = self.locationDS.get(dataRow.location_id);
                        number += location.number;
                    }

                    if(dataRow.zone_id>0){
                        var zone = self.zoneDS.get(dataRow.zone_id);
                        number += zone.number;
                    }

                    if(dataRow.section_id>0){
                        var section = self.sectionDS.get(dataRow.section_id);
                        number += section.number;
                    }

                    if(dataRow.rack_id>0){
                        var rack = self.rackDS.get(dataRow.rack_id);
                        number += rack.number;
                    }

                    if(dataRow.level_id>0){
                        var level = self.levelDS.get(dataRow.level_id);
                        number += level.number;
                    }

                    if(dataRow.position_id>0){
                        var position = self.positionDS.get(dataRow.position_id);
                        number += position.number;
                    }

                    dataRow.set("number", number);
                }
            }
        }
    });
    banhji.binLocations =  kendo.observable({
        lang                : langVM,
        dataSource          : dataStore(apiUrl + "variant_attributes"),
        attributeValueDS    : dataStore(apiUrl + "attribute_values"),
        pageLoad            : function() {
        },
        addNew              : function(){
            var listView = $("#listView").data("kendoListView");
            // add item
            listView.add();
        },
        addNewAttributeValue: function(e){
            var data = e.data;

            this.attributeValueDS.insert(0, {
                variant_attribute_id : data.id,
                name                    : "",
                color_code              : "",
                image_url               : ""
            });
        },
        viewAttributeValue  : function(e){
            var data = e.data;

            this.attributeValueDS.filter({ field:"variant_attribute_id", value: data.id });
        }
    });
    banhji.employeeItemLocation =  kendo.observable({
        lang                : langVM,
        dataSource          : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "contacts/item_location",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create  : {
                    url: apiUrl + "contacts/item_location",
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update  : {
                    url: apiUrl + "contacts/item_location",
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy : {
                    url: apiUrl + "contacts/item_location",
                    type: "DELETE",
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
            filter: { field:"parent_id", operator:"where_related_contact_type", value: 3 },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        warehouseDS         : dataStore(apiUrl + "warehouses"),
        locationDS          : dataStore(apiUrl + "locations"),
        employeeDS          : dataStore(apiUrl + "contacts"),
        editMode            : false,
        obj                 : [],
        warehouse_id        : 0,
        pageLoad            : function(){
        },
        search              : function(){
            var warehouse_id = this.get("warehouse_id"),
                para = [];

            if(warehouse_id){
                para.push({ field: "warehouse_id", value: warehouse_id });
            }

            this.locationDS.filter(para);

            this.set("warehouse_id", 0);
        },
        setObj              : function(){
            this.set("editMode", false);

            this.set("obj", {
                contact     : { abbr:"", number:"", name:"" },
                locations   : []
            });
        },
        edit                : function(e){
            var data = e.data;

            this.set("editMode", true);
            this.set("obj", data);
        },
        save                : function(){
            var self = this, obj = this.get("obj");

            if(obj.contact && obj.locations.length>0){
                this.dataSource.add(obj);

                this.dataSource.sync();
                this.dataSource.bind("requestEnd", function(e){
                    if(e.type=="create" || e.type=="update"){
                        self.setObj();
                        self.dataSource.fetch();
                    }
                });
            }else{
                $("#ntf1").data("kendoNotification").error("Please select employee and locations");
            }
        },
        cancel              : function(){
            this.dataSource.data([]);
            this.dataSource.cancelChanges();

            self.cancel();
        }
    });


    // Cash Setting
    banhji.accountingSetting =  kendo.observable({
        lang                : langVM,
        contactTypeDS       : banhji.source.contactTypeDS,
        patternDS           : dataStore(apiUrl + "contacts"),
        txnTemplateDS       : dataStore(apiUrl + "transaction_templates"),
        prefixDS            : new kendo.data.DataSource({
            transport: {
                read    : {
                    url: apiUrl + "prefixes",
                    type: "GET",
                    headers: banhji.header,
                    dataType: 'json'
                },
                create  : {
                    url: apiUrl + "prefixes",
                    type: "POST",
                    headers: banhji.header,
                    dataType: 'json'
                },
                update  : {
                    url: apiUrl + "prefixes",
                    type: "PUT",
                    headers: banhji.header,
                    dataType: 'json'
                },
                destroy     : {
                    url: apiUrl + "prefixes",
                    type: "DELETE",
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
            filter: { field:"type", operator:"where_not_in", value:["Electricity_Invoice", "Water_Invoice", "Journal", "Cash_Advance", "Reimbursement","Direct_Expense", "Advance_Settlement"] },
            batch: true,
            serverFiltering: true,
            serverSorting: true,
            serverPaging: true,
            page:1,
            pageSize: 100
        }),
        contactTypeName     : "",
        contactTypeAbbr     : "",
        contactTypeCompany  : 0,
        paymentMethodName   : "",
        paymentTermName     : "",
        paymentTermNetDue   : "",
        paymentTermPeriod   : "",
        paymentTermPercentage   : "",
        pageLoad            : function() {
            this.txnTemplateDS.filter({ field: "moduls", value : "customer_mg" });
        },
        addContactType      : function(){
            var name = this.get("contactTypeName");

            if(name!==""){
                this.contactTypeDS.add({
                    parent_id   : 1,
                    name        : name,
                    abbr        : this.get("contactTypeAbbr"),
                    description : "",
                    is_company  : this.get("contactTypeCompany"),
                    is_system   : 0
                });

                this.contactTypeDS.sync();
                this.contactTypeDS.bind("requestEnd", function(e){
                    if(e.type==="create" || e.type==="update"){
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
        addPattern          : function(id){
            this.patternDS.insert(0, {
                "contact_type_id"       : id,
                "number"                : "",
                "locale"                : banhji.locale,
                "is_pattern"            : 1,
                "status"                : 1
            });
            this.patternDS.sync();
        },
        addPaymentMethod        : function(){
            var name = this.get("paymentMethodName");

            if(name!==""){
                this.paymentMethodDS.add({
                    name        : name,
                    description : "",
                    is_system   : 0
                });

                this.paymentMethodDS.sync();

                this.set("paymentMethodName", "");
            }
        },
        addPaymentTerm      : function(){
            var name = this.get("paymentTermName");

            if(name!==""){
                this.paymentTermDS.add({
                    name                : name,
                    net_due             : this.get("paymentTermNetDue"),
                    discount_period     : this.get("paymentTermPeriod"),
                    discount_percentage : this.get("paymentTermPercentage"),
                    is_system           : 0
                });

                this.paymentTermDS.sync();

                this.set("paymentTermName", "");
                this.set("paymentTermNetDue", "");
                this.set("paymentTermPeriod", "");
                this.set("paymentTermPercentage", "");
            }
        },
        goPattern   : function(e){
            var data = e.data;

            if(kendo.parseInt(data.contact_id)>0){
                banhji.router.navigate('/customer/'+data.contact_id+'/1');
            }else{
                banhji.router.navigate('/customer');
                banhji.customer.set("contact_type_id",data.id);
            }
        },
        deleteForm      : function(e){
            var data = e.data;
            if(confirm("Do you want to delete it?") == true) {
                this.txnTemplateDS.remove(data);
                this.txnTemplateDS.sync();
            }
        },
        goInvoiceCustom : function(){

            banhji.invoiceCustom.set("selectTypeList", banhji.source.customerFormList);
            banhji.invoiceCustom.set("formShow", banhji.view.invoiceForm10);
            //banhji.router.navigate('/invoice_custom');
            window.location.assign(baseUrl + 'rrd#/invoice_custom');
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

        customerSetting: new kendo.Layout("#customerSetting", {model: banhji.customerSetting}),
        job: new kendo.Layout("#job", {model: banhji.job}),
        customerGroup: new kendo.Layout("#customerGroup", {model: banhji.customerGroup}),
        contactAssignee: new kendo.Layout("#contactAssignee", {model: banhji.contactAssignee}),
        employeeItemLocation: new kendo.Layout("#employeeItemLocation", {model: banhji.employeeItemLocation}),
        
        vendorSetting: new kendo.Layout("#vendorSetting", {model: banhji.vendorSetting}),
        itemSetting: new kendo.Layout("#itemSetting", {model: banhji.itemSetting}),
        variants: new kendo.Layout("#variants", {model: banhji.variants}),
        warehouses: new kendo.Layout("#warehouses", {model: banhji.warehouses}),
        accountingSetting: new kendo.Layout("#accountingSetting", {model: banhji.accountingSetting}),
        addAccountingprefix: new kendo.Layout("#addAccountingprefix", {model: banhji.addAccountingprefix}),
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
       //banhji.view.Index.showIn('#indexContent', banhji.view.customerType);

        //banhji.customerType.pageLoad();        
    });
    
    // Customser Setting
    banhji.router.route("/customer_setting", function(){
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
                // banhji.view.layout.showIn("#content", banhji.view.customerSetting);
                // banhji.view.layout.showIn('#menu', banhji.view.menu);
                // banhji.view.menu.showIn('#secondary-menu', banhji.view.customerMenu);


                banhji.view.layout.showIn('#content', banhji.view.customerSetting);

                var vm = banhji.customerSetting;
                banhji.userManagement.addMultiTask("Customer Setting","customer_setting",null);
                if(banhji.pageLoaded["customer_setting"]==undefined){
                    banhji.pageLoaded["customer_setting"] = true;

                    vm.contactTypeDS.filter({ field:"parent_id", value:1 });
                }

                vm.pageLoad();
            } else {
                window.location.replace(baseUrl + "admin");
            }
        });
    });
    banhji.router.route("/job", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            // banhji.view.layout.showIn("#content", banhji.view.job);
            // banhji.view.layout.showIn('#menu', banhji.view.menu);

            banhji.view.layout.showIn('#content', banhji.view.job);

            var vm = banhji.job;
            banhji.userManagement.addMultiTask("Job","job",null);
            if(banhji.pageLoaded["job"]==undefined){
                banhji.pageLoaded["job"] = true;
            }

            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_group", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.customerGroup);
            // banhji.view.layout.showIn('#menu', banhji.view.menu);
            // banhji.view.menu.showIn('#secondary-menu', banhji.view.customerMenu);

            var vm = banhji.customerGroup;
            banhji.userManagement.addMultiTask("Group Customer","customer_group",null);
            if(banhji.pageLoaded["customer_group"]==undefined){
                banhji.pageLoaded["customer_group"] = true;

                vm.dataSource.filter({ field:"type", value: "customer" });
                vm.contactTypeDS.filter({ field:"parent_id", value: 1 });
                vm.setObj();
            }

            vm.pageLoad();
        }
    });
    banhji.router.route("/customer_assignee", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.contactAssignee);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.customerMenu);

            var vm = banhji.contactAssignee;
            banhji.userManagement.addMultiTask("Customer Assignee","customer_assignee",null);
            if(banhji.pageLoaded["customer_assignee"]==undefined){
                banhji.pageLoaded["customer_assignee"] = true;

                vm.contactTypeDS.filter({ field:"parent_id", value: 1 });
                vm.employeeDS.filter({ field:"parent_id", operator:"where_related_contact_type", value: 3 });
                vm.setObj();
            }

            vm.pageLoad();
        }
    });
    banhji.router.route("/add_accountingprefix(/:id)", function(id){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.addAccountingprefix);
            kendo.fx($("#slide-form")).slideIn("down").play();

            var vm = banhji.addAccountingprefix;
            banhji.userManagement.addMultiTask("Add Accounting Prefix","add_accountingprefix",null);
            if(banhji.pageLoaded["add_accountingprefix"]==undefined){
                banhji.pageLoaded["add_accountingprefix"] = true;
                setTimeout(function(){
                    var validator = $("#example").kendoValidator().data("kendoValidator");
                    var notification = $("#notification").kendoNotification({
                        autoHideAfter: 5000,
                        width: 300,
                        height: 50
                    }).data('kendoNotification');
                    $("#saveNew").click(function(e){

                        e.preventDefault();
                        if(validator.validate()){
                            vm.save();

                            notification.success("Save Successful");
                        }else{
                            notification.error("Warning, please review it again!");
                        }
                    });
                    $("#saveClose").click(function(e){
                        e.preventDefault();

                        if(validator.validate()){
                            vm.save();
                            window.history.back();

                            notification.success("Save Successful");
                        }else{
                            notification.error("Warning, please review it again!");
                        }
                    });
                },2000);

            };

            vm.pageLoad(id);
        };
    });
    
    // Purchase Setting
    banhji.router.route("/vendor_setting", function(){
        banhji.accessMod.query({
            filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        }).then(function(e){
            var allowed = false;
            if(banhji.accessMod.data().length > 0) {
                for(var i = 0; i < banhji.accessMod.data().length; i++) {
                    if("supplier" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            }
            if(allowed) {
                banhji.view.layout.showIn("#content", banhji.view.vendorSetting);
                // banhji.view.layout.showIn('#menu', banhji.view.menu);
                // banhji.view.menu.showIn('#secondary-menu', banhji.view.vendorMenu);

                var vm = banhji.vendorSetting;
                banhji.userManagement.addMultiTask("Supplier Setting","vendor_setting",null);

                if(banhji.pageLoaded["vendor_setting"]==undefined){
                    banhji.pageLoaded["vendor_setting"] = true;

                    vm.contactTypeDS.filter({ field:"parent_id", value: 2 });
                }

                vm.pageLoad();
            } else {
                window.location.replace(baseUrl + "admin");
            }
        });
    });

    // Item Setting
    banhji.router.route("/item_setting", function(){
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
                banhji.view.layout.showIn("#content", banhji.view.itemSetting);
                // banhji.view.layout.showIn('#menu', banhji.view.menu);
                // banhji.view.menu.showIn('#secondary-menu', banhji.view.inventoryMenu);

                var vm = banhji.itemSetting;

                banhji.userManagement.addMultiTask("General Products/ Services Setting","item_setting",null);

                if(banhji.pageLoaded["item_setting"]==undefined){
                    banhji.pageLoaded["item_setting"] = true;

                    vm.categoryDS.bind("requestEnd", vm.categoryChanges);

                    vm.itemTypeDS.filter({ field:"id <>", value:3 });
                    vm.categoryDS.filter({ field:"item_type_id <>", value:3 });
                    vm.measurementDS.query({
                        filter:{ operator:"measurement_category" },
                        sort:{ field:"measurement_category_id", dir:"asc" }
                    });
                }
            } else {
                window.location.replace(baseUrl + "admin");
            }
        });
    });
    banhji.router.route("/service_setting", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.serviceSetting);
            banhji.view.layout.showIn('#menu', banhji.view.menu);
            banhji.view.menu.showIn('#secondary-menu', banhji.view.inventoryMenu);

            var vm = banhji.serviceSetting;

            banhji.userManagement.addMultiTask("General Service Setting","service_setting",null);

            if(banhji.pageLoaded["service_setting"]==undefined){
                banhji.pageLoaded["service_setting"] = true;

                vm.categoryDS.filter({ field:"item_type_id", operator:"where_in", value: [4,6] });
                vm.itemTypeDS.filter({ field:"id", operator:"where_in", value: [4,6] });
                vm.itemGroupDS.filter({ field:"id", operator:"where_in", value: [3,4] });
            }

            vm.pageLoad();
        }
    });
    banhji.router.route("/variants", function(){
        banhji.view.layout.showIn("#content", banhji.view.variants);

        var vm = banhji.variants;
        banhji.userManagement.addMultiTask("Variants","variants",null);
        if(banhji.pageLoaded["variants"]==undefined){
            banhji.pageLoaded["variants"] = true;

        }
    });
    banhji.router.route("/warehouses", function(){
        banhji.view.layout.showIn("#content", banhji.view.warehouses);

        var vm = banhji.warehouses;
        banhji.userManagement.addMultiTask("Warehouses","warehouses",null);
        if(banhji.pageLoaded["warehouses"]==undefined){
            banhji.pageLoaded["warehouses"] = true;

            vm.binLocationDS.bind("change", vm.binLocationDSChanges);
        }
    });
    banhji.router.route("/bin_locations", function(){
        banhji.view.layout.showIn("#content", banhji.view.binLocations);

        var vm = banhji.binLocations;
        banhji.userManagement.addMultiTask("Bin Locations","bin_locations",null);
        if(banhji.pageLoaded["bin_locations"]==undefined){
            banhji.pageLoaded["bin_locations"] = true;

        }
    });
    banhji.router.route("/employee_item_location", function(){
        if(!banhji.userManagement.getLogin()){
            banhji.router.navigate('/manage');
        }else{
            banhji.view.layout.showIn("#content", banhji.view.employeeItemLocation);
            banhji.view.layout.showIn('#menu', banhji.view.menu);

            var vm = banhji.employeeItemLocation;
            banhji.userManagement.addMultiTask("Employee Item Location","employee_item_location",null);
            if(banhji.pageLoaded["employee_item_location"]==undefined){
                banhji.pageLoaded["employee_item_location"] = true;

                vm.employeeDS.filter({ field:"parent_id", operator:"where_related_contact_type", value: 3 });
                vm.setObj();
            }

            vm.pageLoad();
        }
    });

    // Cash Setting
    banhji.router.route("/accounting_setting", function(){
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
                banhji.view.layout.showIn("#content", banhji.view.accountingSetting);
                banhji.view.layout.showIn('#menu', banhji.view.menu);
                banhji.view.menu.showIn('#secondary-menu', banhji.view.accountingMenu);

                var vm = banhji.vendorSetting;
                banhji.userManagement.addMultiTask("General Accounting Setting","accounting_setting",null);

                if(banhji.pageLoaded["accounting_setting"]==undefined){
                    banhji.pageLoaded["accounting_setting"] = true;

                    vm.contactTypeDS.filter({ field:"parent_id", value: 2 });
                }

                vm.pageLoad();
            } else {
                window.location.replace(baseUrl + "admin");
            }
        });
    });




   
    $(function() {
        banhji.router.start();
        banhji.source.pageLoad();
    });
</script> 