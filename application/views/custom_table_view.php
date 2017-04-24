<!DOCTYPE html>
<html>
<head>
    <title>MVVM</title>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/styles/kendo.common.core.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/styles/kendo.common.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/styles/kendo.common-material.core.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/styles/kendo.common-material.min.css">
    <script src="<?php echo base_url()?>assets/kendo/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/kendo/js/kendo.all.min.js"></script>
        
    <!-- <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script> -->

</head>
<body>
    <div id="example">
        <div>
            <input type="number" class="k-textbox" data-bind="value: id" />
            <input type="button" class="k-button" data-bind="click: searchTxn" value="Transaction" />
        </div>

        <br>

        <h2>Transaction</h2>

        <div data-role="grid"
             data-editable="true"
             data-auto-bind="false"
             data-toolbar="['create', 'save', 'cancel']"
             data-columns="[
                 { 'field': 'type' },
                 { 'field': 'number' },
                 { 'field': 'sub_total' },
                 { 'field': 'discount' },
                 { 'field': 'tax' },
                 { 'field': 'amount' },
                 { 'field': 'deposit' },
                 { 'field': 'remaining' },
                 { 'field': 'issued_date' },
                 { 'field': 'due_date' },
                 { 'field': 'deleted' }
             ]"
             data-bind="source: txnDS"></div>

        <h2>Item Line</h2>

        <div data-role="grid"
             data-editable="true"
             data-auto-bind="false"
             data-toolbar="['create', 'save', 'cancel']"
             data-columns="[
                 { 'field': 'quantity' },
                 { 'field': 'unit_value' },
                 { 'field': 'cost' },
                 { 'field': 'price' },
                 { 'field': 'amount' },
                 { 'field': 'rate' },
                 { 'field': 'locale' },
                 { 'field': 'movement' }
             ]"
             data-bind="source: itemLineDS"></div>

        <h2>Account Line</h2>

        <div data-role="grid"
             data-editable="true"
             data-auto-bind="false"
             data-toolbar="['create', 'save', 'cancel']"
             data-columns="[
                 { 'field': 'account_id' },
                 { 'field': 'description' },
                 { 'field': 'amount' },
                 { 'field': 'rate' },
                 { 'field': 'locale' },
                 { 'field': 'movement' }
             ]"
             data-bind="source: accountLineDS"></div>

        <h2>Journal Line</h2>

        <div data-role="grid"
             data-editable="true"
             data-auto-bind="false"
             data-toolbar="['create', 'save', 'cancel']"
             data-columns="[
                 { 'field': 'account_id' },
                 { 'field': 'description' },
                 { 'field': 'dr' },
                 { 'field': 'cr' },
                 { 'field': 'rate' },
                 { 'field': 'locale' },
                 { 'field': 'deleted' }
             ]"
             data-bind="source: journalLineDS"></div>

    </div>

    <script>
        // localforage.config({
        //     driver: localforage.LOCALSTORAGE,
        //     name: 'userData'
        // });
        var banhji = banhji || {};
        var baseUrl = "<?php echo base_url(); ?>";
        var apiUrl = baseUrl + 'api/';
        var dataStore = function(url) {
        var o = new kendo.data.DataSource({
                transport: {
                    read    : {
                        url: url,
                        type: "GET",
                        headers: banhji.header,
                        dataType: 'json'
                    },
                    create  : {
                        url: url,
                        type: "POST",
                        headers: banhji.header,
                        dataType: 'json'
                    },
                    update  : {
                        url: url,
                        type: "PUT",
                        headers: banhji.header,
                        dataType: 'json'
                    },
                    destroy     : {
                        url: url,
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
                batch: true,
                serverFiltering: true,
                serverSorting: true,
                serverPaging: true,
                page: 1,
                pageSize: 100
            });
            return o;
        };
        // banhji.userManagement = kendo.observable({
        //     checkRole  : function(e) {
        //         e.preventDefault();
        //         if(JSON.parse(localStorage.getItem('userData/user')).role == 1) {
        //             banhji.router.navigate("");
        //         } else {
        //             window.location.replace("<?php echo base_url(); ?>admin");
        //         }
        //     },
        //     auth : new kendo.data.DataSource({
        //         transport: {
        //             read    : {
        //                 url: apiUrl + 'authentication',
        //                 type: "GET",
        //                 dataType: 'json'
        //             },
        //             create  : {
        //                 url: apiUrl + 'authentication',
        //                 type: "POST",
        //                 dataType: 'json'
        //             },
        //             update  : {
        //                 url: apiUrl + 'authentication',
        //                 type: "PUT",
        //                 dataType: 'json'
        //             },
        //             destroy : {
        //                 url: apiUrl + 'authentication',
        //                 type: "DELETE",
        //                 dataType: 'json'
        //             },
        //             parameterMap: function(options, operation) {
        //                 if(operation === 'read') {
        //                     return {
        //                         limit: options.pageSize,
        //                         page: options.page,
        //                         filter: options.filter
        //                     };
        //                 } else {
        //                     return {models: kendo.stringify(options.models)};
        //                 }
        //             }
        //         },
        //         schema  : {
        //             model: {
        //                 id: 'id'
        //             },
        //             data: 'results',
        //             total: 'count'
        //         },
        //         batch: true,
        //         serverFiltering: true,
        //         serverPaging: true,
        //         // pageSize: 100
        //     }),     
        //     inst     : new kendo.data.DataSource({
        //         transport: {
        //             read    : {
        //                 url: apiUrl + 'banhji/company',
        //                 type: "GET",
        //                 dataType: 'json'
        //             },
        //             create  : {
        //                 url: apiUrl + 'banhji/company',
        //                 type: "POST",
        //                 dataType: 'json'
        //             },
        //             update  : {
        //                 url: apiUrl + 'banhji/company',
        //                 type: "PUT",
        //                 dataType: 'json'
        //             },
        //             destroy : {
        //                 url: apiUrl + 'banhji/company',
        //                 type: "DELETE",
        //                 dataType: 'json'
        //             },
        //             parameterMap: function(options, operation) {
        //                 if(operation === 'read') {
        //                     return {
        //                         limit: options.pageSize,
        //                         page: options.page,
        //                         filter: options.filter
        //                     };
        //                 } else {
        //                     return {models: kendo.stringify(options.models)};
        //                 }
        //             }
        //         },
        //         schema  : {
        //             model: {
        //                 id: 'id'
        //             },
        //             data: 'results',
        //             total: 'count'
        //         },
        //         batch: true,
        //         serverFiltering: true,
        //         serverPaging: true,
        //         // pageSize: 100
        //     }),
        //     instMod     : new kendo.data.DataSource({
        //         transport: {
        //             read    : {
        //                 url: apiUrl + 'admin/modules_institute',
        //                 type: "GET",
        //                 dataType: 'json'
        //             },
        //             create  : {
        //                 url: apiUrl + 'admin/modules_institute',
        //                 type: "POST",
        //                 dataType: 'json'
        //             },
        //             update  : {
        //                 url: apiUrl + 'admin/modules_institute',
        //                 type: "PUT",
        //                 dataType: 'json'
        //             },
        //             destroy : {
        //                 url: apiUrl + 'admin/modules_institute',
        //                 type: "DELETE",
        //                 dataType: 'json'
        //             },
        //             parameterMap: function(options, operation) {
        //                 if(operation === 'read') {
        //                     return {
        //                         limit: options.pageSize,
        //                         page: options.page,
        //                         filter: options.filter
        //                     };
        //                 } else {
        //                     return {models: kendo.stringify(options.models)};
        //                 }
        //             }
        //         },
        //         schema  : {
        //             model: {
        //                 id: 'id'
        //             },
        //             data: 'results',
        //             total: 'count'
        //         },
        //         batch: true,
        //         serverFiltering: true,
        //         serverPaging: true,
        //         filter: {field: 'id', value: 1}
        //         // pageSize: 100
        //     }),
        //     onSuccessUpload: function(e){
        //         var logo = e.response.results.url;
        //         this.get('newInst').set('logo', logo);
        //         this.saveIntitute();
        //         // console.log(logo);
        //     },   
        //     close       : function() {
        //         window.history.back(-1);
        //         if(this.inst.hasChanges()) {
        //             this.inst.cancelChanges();
        //         }
        //         if(this.auth.hasChanges()) {
        //             this.auth.cancelChanges();
        //         }
        //     },
        //     getUsername : function() {
        //         var x = banhji.userData.username.substring(0,2);
        //         return x.toUpperCase();
        //     },
        //     username : null,
        //     password : null,
        //     _password: null,
        //     pwdDS    : new kendo.data.DataSource({
        //         transport: {
        //             create  : {
        //                 url: apiUrl + 'banhji/password',
        //                 type: "POST",
        //                 dataType: 'json'
        //             },
        //             parameterMap: function(options, operation) {
        //                 if(operation === 'read') {
        //                     return {
        //                         limit: options.pageSize,
        //                         page: options.page,
        //                         filter: options.filter
        //                     };
        //                 } else {
        //                     return {models: kendo.stringify(options.models)};
        //                 }
        //             }
        //         },
        //         schema  : {
        //             model: {
        //                 id: 'id'
        //             },
        //             data: 'results',
        //             total: 'count'
        //         },
        //         batch: true,
        //         serverFiltering: true,
        //         serverPaging: true,
        //         pageSize: 100
        //     }),
        //     validateEmail: function() {
        //         var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
        //         var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
        //         var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
        //         var sQuotedPair = '\\x5c[\\x00-\\x7f]';
        //         var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
        //         var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
        //         var sDomain_ref = sAtom;
        //         var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
        //         var sWord = '(' + sAtom + '|' + sQuotedString + ')';
        //         var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
        //         var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
        //         var sAddrSpec = sLocalPart + '\\x40' + sDomain; // complete RFC822 email address spec
        //         var sValidEmail = '^' + sAddrSpec + '$'; // as whole string

        //         var reValidEmail = new RegExp(sValidEmail);

        //         if(!reValidEmail.test(this.get('username'))){
        //             alert("Please enter valid address");
        //             this.set('passed', false);
        //         }
        //         this.set('passed', false);
        //     },
        //     loginBtn : function() {
        //         banhji.view.layout.showIn('#content', banhji.view.loginView);
        //     },
        //     login    : function() {
        //         this.auth.query({
        //             filter: [
        //                 {field: 'username', value: banhji.userManagement.get('username')},
        //                 {field: 'password', value: banhji.userManagement.get('password')}
        //             ]
        //         }).done(function(e){
        //             var data = banhji.userManagement.auth.data();
        //             if(data.length > 0) {
        //                 var user = banhji.userManagement.auth.data()[0];
        //                 localforage.setItem('user', user);
        //                 if(user.institute.length === 0) {
        //                     banhji.router.navigate('/no-page');
        //                 } else {
        //                     banhji.router.navigate('/');
        //                 }
        //             } else {
        //                 console.log('bad');
        //             }
        //         });
        //     },
        //     registerBtn: function() {
        //         banhji.view.layout.showIn('#content', banhji.view.signupView);  
        //     },
        //     logout      : function(e) {
        //         e.preventDefault();
        //         var userData = {
        //             Username : userPool.getCurrentUser().username,
        //             Pool : userPool
        //         };
        //         var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
        //         if(cognitoUser != null) {
        //             cognitoUser.signOut();
        //             localforage.removeItem('user').then(function() {
        //                 // Run this code once the key has been removed.
        //                 console.log('Key is cleared!');
        //             }).catch(function(err) {
        //                 // This code runs if there were any errors
        //                 console.log(err);
        //             });
        //             window.location.replace("<?php echo base_url(); ?>login");
        //         } else {
        //             console.log('No user');
        //         }
        //     },
        //     setCurrent : function(current) {
        //         this.set('current', current);
        //     },
        //     changePwd  : function() {
        //         if(this.get('password') !== this.get('_password')) {
        //             alert("Password does not match");
        //         } else {
        //             this.pwdDS.sync();
        //         }
        //     },
        //     getLogin    : function() {
        //         return JSON.parse(localStorage.getItem('userData/user'));
        //     },
        //     page     : function() {
        //         if(banhji.userManagement.getLogin()) {
        //             if(banhji.userManagement.getLogin().perm === 1) {
        //                 return 'admin';
        //             }
        //         } else {
        //             return 'home';
        //         }
        //         // if(this.getLogin()) {
        //         //  return '\#/page';
        //         // } else {
        //         //  return '\#/page/';
        //         // }
                
        //     },
        //     createComp : function() {
        //         banhji.router.navigate('/create_company');
        //     },
        //     setInstitute: function(newIns) {
        //         this.set('newInst', newIns);
        //     },
        //     addInst    : function() {
        //         this.inst.insert(0, {
        //             name: "",
        //             email: "",
        //             address: "",
        //             description: "",
        //             industry: {id: null, name: null},
        //             type: {id: null, name: null},
        //             country: {id: null, code: null, name: null},
        //             province: {id: null, local: null, english: null},
        //             vat_no: null,
        //             fiscal_date: null,
        //             tax_regime: null,
        //             locale : null,
        //             legal_name: null,
        //             date_founded: null,
        //             logo: ""
        //         });
        //         this.setInstitute(this.inst.at(0));
        //     },
        //     cancelInst : function() {
        //         this.inst.cancelChanges();
        //     },
        //     saveIntitute: function() {
        //         if(this.get('newInst').industry.id !== null || this.get('newInst').province.id || this.get('newInst').country.id) {
        //             this.inst.sync();
        //             this.inst.bind('requestEnd', function(e){
        //                 var type = e.type, res = e.response.results;
        //                 if(e.response.error === false) {
        //                     if(e.type === 'create') {
        //                         $('#createComMessage').text("created. Please wait till site admin created database for you.");
        //                     } else {
        //                         localforage.removeItem('company', function(err){
        //                             //
        //                         });
        //                         localforage.setItem('company', res);
        //                         $('#createComMessage').text("Updated");
        //                     }
        //                 } else {
        //                     $('#createComMessage').text("error creating company.");
        //                 }
        //             });
        //         } else {
        //             alert('filling all fields');
        //         }
        //     },
        //     signup     : function() {
        //         this.auth.add({username: this.get('username'), password: this.get('password')});
        //         this.sync();
        //         this.auth.bind('requestEnd', function(e){
        //             if(e.type === 'create' && e.response.error === false) {
        //                 alert("អ្នកបានចុះឈ្មោះរួច");
        //                 banhji.router.route('')
        //             }
        //         });
        //     },
        //     onFileSelect: function(e) {
        //         console.log(e.files[0]);
        //     },
        //     sync: function() {
        //         this.auth.sync();
        //         this.auth.bind('requestEnd', function(e){
        //             var type = e.type;
        //             var result = e.response.results;
        //             if(type === "read" && e.error !== true) {
        //                 // get login info
        //                 console.log('true');
        //             } else if(type === "create") {
        //                 if(e.response.error === true) {
        //                     banhji.userManagement.auth.cancelChanges();
        //                     alert('មានរួចហើយ');
        //                 } else {
        //                     var user = banhji.userManagement.auth.data()[0];
        //                     localforage.setItem('user', user);
        //                     if(!user.institute) {
        //                         banhji.router.navigate('/page', false);
        //                     } else {
        //                         banhji.router.navigate('/app', false);
        //                     }
        //                 }
        //             }
        //         });
        //     }
        // });
        // banhji.userData = JSON.parse(localStorage.getItem('userData/user')) ? JSON.parse(localStorage.getItem('userData/user')) : "";
        // if(banhji.userData == "") {
        //     banhji.companyDS.fetch(function() {
        //         banhji.profileDS.fetch(function(){
        //             var data = banhji.companyDS.data();
        //             var id = 0;
        //             id = banhji.profileDS.data()[0].id;
        //             if(data.length > 0) {
        //                 var user = {
        //                     id: id,
        //                     username: userPool.getCurrentUser().username,
        //                     institute: data
        //                 };
        //                 localforage.setItem('user', user);
        //             }
        //             banhji.userData = JSON.parse(localStorage.getItem('userData/user'));
        //         });
        //     });
        // }
        banhji.institute = 1; //banhji.userData ? banhji.userData.institute : "";
        banhji.header = { Institute: 1 };
        var viewModel = kendo.observable({
            id              : 6,
            txnDS           : dataStore(apiUrl+"transactions"),
            itemLineDS      : dataStore(apiUrl+"item_lines"),
            accountLineDS   : dataStore(apiUrl+"account_lines"),
            journalLineDS   : dataStore(apiUrl+"journal_lines"),
            pageLoad        : function(){
            },
            searchTxn       : function(){
                var id = this.get("id");

                this.txnDS.filter({ field:"id", value: id });
                this.itemLineDS.filter({ field:"transaction_id", value: id });
                this.accountLineDS.filter({ field:"transaction_id", value: id });
                this.journalLineDS.filter({ field:"transaction_id", value: id });
            }
        });
        kendo.bind($("#example"), viewModel);
    </script>

</body>
</html>
