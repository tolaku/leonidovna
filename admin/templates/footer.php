<?php defined('VOROBEY') or die('Простите, не нужно...'); ?>
</section><!-- /.content -->
                <div class="footer-main">
                    Copyright &copy Marfa <?php echo date("Y");  ?>
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->

<!-- jQuery 2.0.2 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="<?=TEMPLATE_ADMIN?>js/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="<?=TEMPLATE_ADMIN?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?=TEMPLATE_ADMIN?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?=TEMPLATE_ADMIN?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="<?=TEMPLATE_ADMIN?>js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="<?=TEMPLATE_ADMIN?>js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="<?=TEMPLATE_ADMIN?>js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="<?=TEMPLATE_ADMIN?>js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="<?=TEMPLATE_ADMIN?>js/Director/dashboard.js" type="text/javascript"></script>

        <!-- Подключение скриптов для нужд админки -->
        <script src="<?=TEMPLATE_ADMIN?>js/workscripts.js" type="text/javascript"></script>

        <!-- Director for demo purposes -->
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>

</body>
</html>