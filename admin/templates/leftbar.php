<?php defined('VOROBEY') or die('Простите, не нужно...'); ?>
 <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- Sidebar user panel -->
                            <div class="user-panel">
                                <div class="pull-left image">
                                    <img src="<?=TEMPLATE_ADMIN?>img/26115.jpg" class="img-circle" />
                                </div>
                                <div class="pull-left info">
                                    <p><?=$_SESSION['auth']['admin'];?></p>

                                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                                </div>
                            </div>
 
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <ul class="sidebar-menu">
                                <li class="active">
                                    <a href="?view=sections">
                                        <i class="fa fa-dashboard"></i> <span>Главная</span>
                                    </a>
                                </li>
                            <?php foreach($pages as $item): ?>
                                <li>
                                    <a href="?view=<?=$item['url_page']?>">
                                        <i class="fa fa-dashboard"></i> <span><?=$item['name']?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                                <li class="active">
                                    <a href="?view=constants">
                                        <i class="fa fa-dashboard"></i> <span>Константы</span>
                                    </a>
                                </li>
                            </ul>
                        </section>
                        <!-- /.sidebar -->
                    </aside>