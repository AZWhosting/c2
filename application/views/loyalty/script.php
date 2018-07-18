<script>    
    //-----------------------------------------
    banhji.Index = kendo.observable({
        lang            : langVM,
        Institute       : banhji.institute,
        actualCash      : 0,
        dataSource      : dataStore(apiUrl + "customer_modules/dashboard"),
        inventoryDS     : dataStore(apiUrl + "inventory_modules/dashboard"),
        vendorDS        : dataStore(apiUrl + "vendor_modules/dashboard"),
        graphDS         : dataStore(apiUrl + "customer_modules/monthly_sale"),
        cashDS          : dataStore(apiUrl + "micro_modules/cash_general_ledger"),
        obj             : {},
        companyInf          : function() {
            var company = JSON.parse(localStorage.getItem('userData/user'));
            return company;
        },
        getLogo             : function() {
            banhji.companyDS.fetch(function(){
                if(banhji.companyDS.data().length > 0) {
                    banhji.index.set('companyLogo', banhji.companyDS.data()[0].logo);
                }
            });
        },
        companyName         : banhji.institute.name,
        companyLogo         : banhji.institute.logo.url,
        today           : new Date(),
        setObj          : function(){
            this.set("obj", {
                //Sale
                sale            : 0,
                sale_customer   : 0,
                sale_product    : 0,
                sale_ordered    : 0,
                //AR
                ar              : 0,
                ar_open         : 0,
                ar_customer     : 0,
                ar_overdue      : 0,
                collection_day  : 0
            });
        },
        pageLoad: function() {
            var self = this, obj = this.get("obj");
            this.graphDS.read();

            this.dataSource.query({
                filter: []
            }).then(function(){
                var view = self.dataSource.view();

                obj.set("sale", kendo.toString(view[0].sale, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
                obj.set("sale_customer", kendo.toString(view[0].sale_customer, "n0"));
                obj.set("sale_product", kendo.toString(view[0].sale_product, "n0"));
                obj.set("sale_ordered", kendo.toString(view[0].sale_ordered, "n0"));

                obj.set("ar", kendo.toString(view[0].ar, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
                obj.set("ar_open", kendo.toString(view[0].ar_open, "n0"));
                obj.set("ar_customer", kendo.toString(view[0].ar_customer, "n0"));
                obj.set("ar_overdue", kendo.toString(view[0].ar_overdue, "n0"));

                obj.set("collection_day", kendo.toString(view[0].collection_day, "n0"));

                self.set("obj", view[0]);
            });

            //Inventory
            this.inventoryDS.query({
                filter: []
            }).then(function(){
                var view = self.inventoryDS.view();

                self.set("objInventory", view[0]);
            });

            // VendorDS
            this.vendorDS.query({
                filter: [],
                page: 1,
                pageSize: 100
            }).then(function(){
                var view = self.vendorDS.view();

                self.set("objVendor", view[0]);
            });
            this.cashDS.query({});
            this.cashDS.bind("requestEnd", function(e){
                self.set("checkin", e.response.cash_in);
                self.set("checkout", e.response.cash_out);
                self.set("cashbalance", e.response.cash_balance);
            });
        },
        checkin: 0,
        checkout: 0,
        cashbalance: 0,
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

        var vm = banhji.Index;
        banhji.userManagement.addMultiTask("Home","home",vm);
    });
    
    //Router Start 
    $(function() {
        banhji.router.start();
        banhji.source.pageLoad();
    });
</script>