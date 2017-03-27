<?php defined('VOROBEY') or die('Простите, не нужно...'); ?>
                
                    <aside class="right-side">

                <!-- Main content -->
                <section class="content">
                <?php 
if(isset($_SESSION['add']['res'])){
  echo $_SESSION['add']['res'];
  unset($_SESSION['add']['res']);
  } ?>
<div class="row">
    <div class="col-md-12">
        <section class="panel">
          <header class="panel-heading">
             Добавить раздел
          </header>
          <div class="panel-body">
            <script type="text/javascript">
             
            </script>
              <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                  
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Название</label>
                      <div class="col-sm-10">
                          <input type="text" id="name" class="form-control" name="name" onkeyup="checkParams()" autocomplete="off">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Фото</label>
                      <div class="col-sm-10">
                          <input type="file" name="files" >
                          <?php 
                             if(isset($_SESSION['answer'])){
                             echo $_SESSION['answer'];
                             unset($_SESSION['answer']);
                            } 
                          ?>
                      </div>
                  </div>
                  <!-- CKEditor -->
                    <script type="text/javascript" src="<?=TEMPLATE_ADMIN?>js/ckeditor/ckeditor.js"></script>
                  <!-- :CKEditor -->                  
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Мини текст</label>
                      <div class="col-sm-10">
                          <textarea id="editor1" class="form-control" name="text_min" cols="40" rows="3"></textarea>
                          <script>
                             CKEDITOR.replace( 'editor1' );
                          </script>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Полный текст</label>
                      <div class="col-sm-10">
                          <textarea id="editor2" class="form-control" name="text_full" cols="40" rows="3"></textarea>
                          <script>
                             CKEDITOR.replace( 'editor2' );
                          </script>
                      </div>
                  </div>
                  <div class=" add-task-row">
                    <input id="submit" class="btn btn-success btn-sm pull-left" href type="submit" name="submit" value="Добавить" disabled>
                  </div>
              </form>
          </div>
        </section>
    </div>
</div>