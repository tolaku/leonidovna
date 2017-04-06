<?php defined('VOROBEY') or die('Простите, не нужно...'); ?>
                
                    <aside class="right-side">
<?php echo $name; ?>
                <!-- Main content -->
                <section class="content">
<?php 
if(isset($_SESSION['edit']['res'])){
  echo $_SESSION['edit']['res'];
  unset($_SESSION['edit']['res']);
  } ?>
<div class="row">
    <div class="col-md-12">
        <section class="panel">
          <header class="panel-heading">
             Редактируем - <?=$constant['title']?>
          </header>
          <div class="panel-body">
              <form class="form-horizontal tasi-form" method="post">

                  <!-- CKEditor -->
                    <script type="text/javascript" src="<?=TEMPLATE_ADMIN?>js/ckeditor/ckeditor.js"></script>
                  <!-- :CKEditor -->                  
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Текст</label>
                      <div class="col-sm-10">
                          <textarea id="editor1" class="form-control" name="value" cols="40" rows="3"><?=$constant['value'];?></textarea>
                          <script>
                             CKEDITOR.replace( 'editor1' );
                          </script>
                      </div>
                  </div>

                  <div class=" add-task-row">
                    <input type="hidden" name="name" value="<?=$constant['name']?>">
                    <input class="btn btn-success btn-sm pull-left" href type="submit" name="submit" value="Обновить">
                  </div>
              </form>
          </div>
        </section>
    </div>
</div>