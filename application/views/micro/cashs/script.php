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
    banhji.dateFormat = "dd-MM-yyyy";
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
        frequencyList               : [
            { id: 'Daily', name: 'Day' },
            { id: 'Weekly', name: 'Week' },
            { id: 'Monthly', name: 'Month' },
            { id: 'Annually', name: 'Annual' }
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
        lang     : langVM,
    });
    banhji.tapMenu =  kendo.observable({
        lang                : langVM,
        goReports          : function(){
            banhji.router.navigate('/');
        },
        goTransactions      : function(){
            banhji.router.navigate('/transactions');
        },
        goMenuCashs        : function(){
            banhji.router.navigate('/cashs');
        },
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

                        var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

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
        }
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
        frequencyList       : banhji.source.frequencyList,
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
        cashs: new kendo.View("#cashs", {model: banhji.accountingCenter}),
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
        banhji.view.Index.showIn('#indexContent', banhji.view.reports);

        var vm = banhji.reports;
        if(banhji.pageLoaded["index"]==undefined){
            banhji.pageLoaded["index"] = true;

            vm.sorterChanges();
        }

        vm.pageLoad();        
    });
    banhji.router.route('/transactions', function() {
        
        banhji.view.layout.showIn('#content', banhji.view.Index);
        banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
        banhji.view.Index.showIn('#indexContent', banhji.view.transactions);

        //load MVVM
        //banhji.transactions.pageLoad();
    });
    banhji.router.route('/cashs', function() {
        
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
            banhji.view.layout.showIn("#content", banhji.view.cashTransaction);
            kendo.fx($("#slide-form")).slideIn("down").play();

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