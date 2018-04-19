        <footer class="footer">
            &copy; <?php echo date('Y'); ?> BanhJi PTE. Ltd. All rights reserved.
        </footer>
    </div>
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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109087721-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-109087721-1');
    </script>
    <script src="<?php echo base_url()?>assets/micro/bootstrap.min.js"></script>
</body>
</html>