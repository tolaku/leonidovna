<?php defined('VOROBEY') or die('Простите, не нужно...'); ?>

                    <aside class="right-side">

                <!-- Main content -->
                <section class="content">



                    <div class="row">

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
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Главная</td>
                                    <td>
                                      <div class="pull-right hidden-phone">
                                        
                                        <a href="?view=sections"><button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button></a>
                                      </div>
                                    </td>
                                </tr>
                              <?php $i=1; ?>
                              <?php foreach($pages as $item): $i++; ?>
                                <tr>
                                  <td><?=$i?></td>
                                  <td><?=$item['name']?></td>
                                  <td>
                                    <div class="pull-right hidden-phone">
                                        
                                        <a href="?view=<?=$item['url_page']?>">
                                          <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                        </a>
                                    </div>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
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
                                              <input type="checkbox" class="flat-grey list-child"/>
                                              <!-- <input type="checkbox" class="square-grey"/> -->
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Director is Modern Dashboard</span>
                                              <span class="label label-success">2 Days</span>
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
                


        