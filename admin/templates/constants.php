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
                                    Разделы - Констант
                                </header>

                                <ul class="list-group teammates">
                                <?php foreach($const as $item): ?>
                                    <li class="list-group-item">
                                        <a href="?view=edit_constant&amp;name=<?=$item['name']?>"><span class="pull-right label label-danger inline m-t-16">edit</span></a></a>
                                        <a href="?view=edit_constant&amp;name=<?=$item['name']?>"><?=$item['title']?></a>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                   