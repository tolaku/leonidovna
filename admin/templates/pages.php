<?php defined('VOROBEY') or die('Простите, не нужно...'); ?>
<aside class="right-side">

                <!-- Main content -->
                <section class="content">
                   
                    <div class="row">
<?php print_arr($pages) ?>
                        <div class="col-md-8">
                            <section class="panel">
                              <header class="panel-heading">
                                  Страницы
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Название</th>
                                  </tr>
                                </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td class="toggle">Главная</td>
                                  <td>
                                    <ul>
                                        <li>
                                          <div>
                                              <span>Раздел 1</span>
                                              <div>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                              </div>
                                          </div>
                                        </li>
                                    </ul>
                                  </td>
                                </tr>
                              
                              <!-- Блок для редактирования 

                                    <ul class="task-list">
                                        <li>
                                          <div class="task-title">
                                              <span class="task-title-sp">Раздел 1</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                              </div>
                                          </div>
                                        </li>
                                    </ul>

                               :блок для редактирования -->

                          </tbody>
                      </table>
                  </div>
              </section>


          </div><!--end col-6 -->

                    </div>
                    <div class="row">

                        <div class="col-md-7">
                          <section class="panel tasks-widget">
                              <header class="panel-heading">
                                  Todo list
                            </header>
                            <div class="panel-body">

                              <div class="task-content">

                                  <ul class="task-list">
                                      <li>
                                          <div class="task-checkbox">
                                              <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                              <input type="checkbox" class="flat-grey"/>
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Give feedback for the template</span>
                                              <span class="label label-success">2 Days</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                              <input type="checkbox" class="flat-grey"/>
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Tell your friends about this admin template</span>
                                              <span class="label label-danger">Now</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                              </div>
                                          </div>
                                      </li>

                                  </ul>
                              </div>

                              <div class=" add-task-row">
                                  <a class="btn btn-success btn-sm pull-left" href="#">Add New Tasks</a>
                                  <a class="btn btn-default btn-sm pull-right" href="#">See All Tasks</a>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- row end -->
                </section><!-- /.content -->
                <div class="footer-main">
                    Copyright &copy Director, 2014
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->
        <!-- accordion -->
        <script type="text/javascript" src="<?=TEMPLATE_ADMIN?>js/accordion/jquery.js"></script>
        <script type="text/javascript" src="<?=TEMPLATE_ADMIN?>js/accordion/jquery-ui.js"></script>
        <script type="text/javascript" src="<?=TEMPLATE_ADMIN?>js/workscripts.js"></script>
        <!-- jQuery 2.0.2 -->
        <script src="<?=TEMPLATE_ADMIN?>http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="<?=TEMPLATE_ADMIN?>js/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="<?=TEMPLATE_ADMIN?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?=TEMPLATE_ADMIN?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?=TEMPLATE_ADMIN?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="<?=TEMPLATE_ADMIN?>js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="<?=TEMPLATE_ADMIN?>js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="<?=TEMPLATE_ADMIN?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="<?=TEMPLATE_ADMIN?>js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="<?=TEMPLATE_ADMIN?>js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="<?=TEMPLATE_ADMIN?>js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="<?=TEMPLATE_ADMIN?>js/Director/dashboard.js" type="text/javascript"></script>

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
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
            // Chart.defaults.global.responsive = true;
</script>
</body>
</html>