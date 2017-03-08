<?php defined('VOROBEY') or die('Простите, не нужно...'); ?>
                
                    <aside class="right-side">

                <!-- Main content -->
                <section class="content">
                <?php 
                  if(isset($_SESSION['res'])){
                    echo $_SESSION['res'];
                    unset($_SESSION['res']);
                 } ?>
                	<div class="col-md-5">
                            <div class="panel">
                                <header class="panel-heading">
                                    Разделы
                                </header>

                                <ul class="list-group teammates">
                                  <?php foreach ($section as $value): ?>
                                    <li class="list-group-item">
                                        <a href="?view=edit_section&amp;id=<?=$value['id']?>"><img src="<?=PATH.TEMPLATE.$value['img']?>" width="50" height="50">
                                        <span class="pull-right label label-danger inline m-t-15">редактировать</span></a>
                                        <a href="?view=edit_section&amp;id=<?=$value['id']?>"><?=$value['name']?></a>
                                    </li>
                                   <?php endforeach; ?>
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

                   