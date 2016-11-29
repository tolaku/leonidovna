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

                                <ul class="list-group teammates">
                                  
                                    <li class="list-group-item">
                                        <img src="http://leonidovna/views/risovanie/images/thumbs/2.jpg" width="100" height="100">
                                        <form class="form-horizontal tasi-form" method="post"><br />
                                            <input type="text" class="form-control" name="img" value="Title">
                                            <input type="text" class="form-control" name="img" value="Name_a">
                                        </form>
                                    </li>
                                    <li class="list-group-item">
                                        <img src="http://leonidovna/views/risovanie/images/thumbs/1.jpg" width="100" height="100">
                                        
                                    </li>
                                   
                                </ul>
                                <div class="panel-footer bg-white">
                                    <!-- <span class="pull-right badge badge-info">32</span> -->
                                    <button class="btn btn-primary btn-addon btn-sm">
                                        <i class="fa fa-plus"></i>
                                        Добавить
                                    </button>
                                </div>
                            </div>
                        </div>

                   