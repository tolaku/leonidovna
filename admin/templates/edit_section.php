<?php defined('VOROBEY') or die('Простите, не нужно...'); ?>
                
                    <aside class="right-side">

                <!-- Main content -->
                <section class="content">
<?php print_arr($get_section); ?>

<div class="row">
    <div class="col-md-12">
        <section class="panel">
          <header class="panel-heading">
             Редактируем - 
          </header>
          <div class="panel-body">
              <form class="form-horizontal tasi-form" method="get">
                  
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Название</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?=$get_section['name'];?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Фото</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?=$get_section['img'];?>">
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Мини текст</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" cols="40" rows="3"><?=$get_section['text_min'];?></textarea>
                      </div>
                  </div>

              </form>
          </div>
        </section>
    </div>
</div>