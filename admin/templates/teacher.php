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
                                    Разделы - Учитель
                                </header>

                                <ul class="list-group teammates">
                                  <?php foreach ($teacher as $value): ?>
                                    <li class="list-group-item">
                                        <a class="del" href="?view=teacher&amp;del=<?=$value['id']?>"><button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button></a>
                                        <a href="?view=edit_teacher&amp;id=<?=$value['id']?>"><img src="../images/gallery/thumbs/<?=$value['img']?>" width="50" height="50">
                                        <span class="pull-right label label-danger inline m-t-15">редактировать</span></a>
                                        <a href="?view=edit_teacher&amp;id=<?=$value['id']?>"><?=$value['name']?></a>
                                    </li>
                                   <?php endforeach; ?>
                                </ul>
                                <div class="panel-footer bg-white">
                                    <!-- <span class="pull-right badge badge-info">32</span> -->
                                    <a href="?view=add_teacher">
                                        <button class="btn btn-primary btn-addon btn-sm">
                                            <i class="fa fa-plus"></i>
                                            Добавить
                                        </button>
                                    </a>
                                </div>
                                <?php 
                                    if(isset($_SESSION['answer'])){
                                        echo $_SESSION['answer'];
                                        unset($_SESSION['answer']);
                                    } 
                                ?>
                            </div>
                        </div>

                   