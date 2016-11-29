<?php defined('VOROBEY') or die('Простите, не нужно...'); ?>
                
                    <aside class="right-side">

                <!-- Main content -->
                <section class="content">
                <?php 
                  if(isset($_SESSION['answer'])){
                    echo $_SESSION['answer'];
                    unset($_SESSION['answer']);
                 } ?>
                	<div class="col-md-5">
                            <div class="panel">
                                <header class="panel-heading">
                                    Галерея
                                </header>
                            <?php if($get_gallery): ?>
                                <ul class="list-group teammates">
                                    <li class="list-group-item">
                                    <?php foreach($get_gallery as $item): ?>
                                        <img src="<?=TEMPLATE.$item['img_thumbs']?>" width="100" height="100">
                                    <?php endforeach; ?>
                                    <img src="http://leonidovna/views/risovanie/images/thumbs/2.jpg" width="100" height="100">
                                    <img src="http://leonidovna/views/risovanie/images/thumbs/2.jpg" width="100" height="100">
                                    <img src="http://leonidovna/views/risovanie/images/thumbs/2.jpg" width="100" height="100">
                                    <img src="http://leonidovna/views/risovanie/images/thumbs/2.jpg" width="100" height="100">
                                    </li>
                                  
                                </ul>
                            <?php else: echo "<p>Галерея пуста!</p>"; ?>
                            <?php endif; ?>
                                <div class="panel-footer bg-white">
                                    <!-- <span class="pull-right badge badge-info">32</span> -->
                                    <button class="btn btn-primary btn-addon btn-sm">
                                        <i class="fa fa-plus"></i>
                                        Добавить
                                    </button>
                                </div>
                            </div>
                        </div>
                        </section>


                         <section class="content">

                    <div class="row" style="margin-bottom:5px;">


                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
                                <div class="sm-st-info">
                                    <span>3200</span>
                                    Total Tasks
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
                                <div class="sm-st-info">
                                    <span>2200</span>
                                    Total Messages
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-blue"><i class="fa fa-dollar"></i></span>
                                <div class="sm-st-info">
                                    <span>100,320</span>
                                    Total Profit
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-green"><i class="fa fa-paperclip"></i></span>
                                <div class="sm-st-info">
                                    <span>4567</span>
                                    Total Documents
                                </div>
                            </div>
                        </div>
                    </div>

                    
              </section>

                   