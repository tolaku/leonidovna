<?php defined('VOROBEY') or die('Простите, не нужно...'); ?>
                
                    <aside class="right-side">

                <!-- Main content -->
                <section class="content">

<div class="row">
    <div class="col-md-12">
        <section class="panel">
          <header class="panel-heading">
             Редактируем - <?=$get_section['name'];?>
          </header>
          <div class="panel-body">
              <form class="form-horizontal tasi-form" method="post">
                  
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Название</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="<?=htmlspecialchars($get_section['name']);?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Фото</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="img" value="<?=$get_section['img'];?>">
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Мини текст</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" name="text_min" cols="40" rows="3"><?=htmlspecialchars($get_section['text_min']);?></textarea>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Полный текст</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" name="text_full" cols="40" rows="3"><?=htmlspecialchars($get_section['text_full']);?></textarea>
                      </div>
                  </div>
                  <div class=" add-task-row">
                    <input type="hidden" name="id" value="<?=$get_section['id']?>">
                    <input class="btn btn-success btn-sm pull-left" href type="submit" name="submit" value="Обновить">
                  </div>
              </form>
          </div>
        </section>
    </div>
</div>