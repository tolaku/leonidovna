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
                                    <td><a href="?view=sections">Главная</a></td>
                                    <td>

                                    </td>
                                </tr>
                              <?php $i=1; ?>
                              <?php foreach($pages as $item): $i++; ?>
                                <tr>
                                  <td><?=$i?></td>
                                    <td><a href="?view=<?=$item['url_page']?>"><?=$item['name']?></a></td>
                                  <td>

                                  </td>
                                </tr>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  </div>
              </section>


          </div><!--end col-6 -->
          
                    </div>
                    
              <!-- row end -->
                


        