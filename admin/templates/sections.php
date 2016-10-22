<?php defined('VOROBEY') or die('Простите, не нужно...'); ?>
                
                    <aside class="right-side">

                <!-- Main content -->
                <section class="content">
                <?php //print_arr($section) ?>
                	<div class="col-md-5">
                            <div class="panel">
                                <header class="panel-heading">
                                    Разделы
                                </header>

                                <ul class="list-group teammates">
                                  <?php foreach ($section as $value): ?>
                                    <li class="list-group-item">
                                        <a href="?view=edit_section&amp;id=<?=$value['id']?>"><img src="<?=PATH.TEMPLATE.$value['img']?>" width="50" height="50"></a>
                                        <span class="pull-right label label-danger inline m-t-15">Admin</span>
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

                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                              <header class="panel-heading">
                                 Form Elements
                              </header>
                              <div class="panel-body">
                                  <form class="form-horizontal tasi-form" method="get">
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Default</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Help text</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control">
                                              <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Rounder</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control round-input">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Input focus</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" id="focusedInput" type="text" value="This is focused...">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Disabled</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Placeholder</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" placeholder="placeholder">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Password</label>
                                          <div class="col-sm-10">
                                              <input type="password" class="form-control" placeholder="">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 col-sm-2 control-label">Static control</label>
                                          <div class="col-lg-10">
                                              <p class="form-control-static">email@example.com</p>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                            </section>
                        </div>
                    </div>