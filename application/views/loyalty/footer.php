            <footer class="footer" style="margin-left: 0;">
                &copy; <?php echo date('Y'); ?> BanhJi PTE. Ltd. All rights reserved.
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url()?>assets/micro/bootstrap.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109087721-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-109087721-1');
    </script> -->
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109087721-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-109087721-2');
    </script>

    <!-- Script MVVM User -->
    <script >
        var baseUrl = "<?php echo base_url()?>";
        banhji.accessMod = new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/users/access',
              type: "GET",
              dataType: 'json'
            },
            parameterMap: function(options, operation) {
              if(operation === 'read') {
                return {
                  limit: options.pageSize,
                  page: options.page,
                  filter: options.filter
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
          serverPaging: true,
          pageSize: 1
        });
        banhji.accessMod.query({
            filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
        }).then(function(e){
            var allowed = false;
            if(banhji.accessMod.data().length > 0) {
                for(var i = 0; i < banhji.accessMod.data().length; i++) {
                    if("micro" == banhji.accessMod.data()[i].name.toLowerCase()) {
                        allowed = true;
                        break;
                    }
                }
            }
            if(allowed === false) {
                window.location.replace(baseUrl + "admin");
            }
        });
        var viewModel = kendo.observable({
            lang        : langVM,
            userDS          : new kendo.data.DataSource({
                transport: {
                    read: {
                        url: baseUrl + 'api/users',
                        type: "GET",
                        dataType: 'json'
                    },
                    create: {
                        url: baseUrl + 'api/users',
                        type: "POST",
                        dataType: 'json'
                    },
                    destroy: {
                        url: baseUrl + 'api/users',
                        type: "DELETE",
                        dataType: 'json'
                    },
                    update: {
                        url: baseUrl + 'api/users',
                        type: "PUT",
                        dataType: 'json'
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
                filter: {
                    field: 'id',
                    operator:"where",
                    value: JSON.parse(localStorage.getItem('userData/user')).id
                },
                pageSize: 50
            }),
            logout          : function(e) {
                e.preventDefault();
                var userData = {
                    Username : userPool.getCurrentUser().username,
                    Pool : userPool
                };
                var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
                if(cognitoUser != null) {
                    cognitoUser.signOut();
                    localforage.removeItem('user').then(function() {
                        // Run this code once the key has been removed.
                        console.log('Key is cleared!');
                    }).catch(function(err) {
                        // This code runs if there were any errors
                        console.log(err);
                    });
                    window.location.replace("<?php echo base_url(); ?>micro/login");
                } else {
                    console.log('No user');
                }
            }
        });

        kendo.bind($("#examplee"), viewModel);

        viewModel.userDS.read();
    </script>

    <!-- Facebook -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '387834344756149',
                xfbml: true,
                version: 'v2.7'
            });
            FB.AppEvents.logPageView();
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <script>
        // Google Font
        WebFontConfig = {
            google: {
                families: ['Battambang::khmer']
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>
</body>
</html>