<?php defined('VOROBEY') or die('Простите, не нужно...'); ?>
                
                    <aside class="right-side">
                <!-- Main content -->
                <section class="content">
                	<div class="col-md-5">
                    <?php 
                                    /* Если не удалось загрузить картинку на сервер, выводим сообщение */
                                    if(isset($_SESSION['answer'])){
                                        echo "<div class='error'>".$_SESSION['answer']."</div>";
                                        unset($_SESSION['answer']);
                                    }
                                    /* Успешно загрузили картинку на сервер */
                                    if(isset($_SESSION['res']['ok'])) {
                                        echo $_SESSION['res']['ok'];
                                        unset($_SESSION['res']);
                                    }
                                    ?>
                            <div class="panel">
                                <header class="panel-heading">
                                    Добавить фото в галерею
                                </header>
                            <?php if($get_gallery): ?>
                                <ul class="list-group teammates">
                                    <li class="list-group-item">
                                    <span class="small">Для редактирования или удаления картинки, кликните по ней</span>
                                    <div class="clear"> </div>
                                    <?php foreach($get_gallery as $item): ?>
                                        <a href="?view=edit_gallery&amp;id=<?=$item['id']?>"><img src="/images/gallery/thumbs/<?=$item['img_thumbs']?>" width="100" height="100"></a>
                                    <?php endforeach; ?>
                                    </li>
                                  
                                </ul>
                            <?php else: echo "<p>Галерея пуста!</p>"; ?>
                            <?php endif; ?>
                                <div class="panel-footer bg-white">
                                    <form method="post" enctype="multipart/form-data">
                                        <label for="file">Загрузить фотографии</label>
                                        <p><input type="file" name="files[]" id="file" multiple></p>
                                        <p><input type="text" name="title" placeholder=" № класса"></p>
                                        <p><input type="text" name="name_a" placeholder=" имя"></p>
                                        <p><input type="text" name="name_b" placeholder=" событие"></p>
                                        <p><textarea rows="4" cols="45" name="text" placeholder="Мы стараемся дорожить друг другом ....."></textarea></p>
                                        
                                        <button class="btn btn-primary btn-addon btn-sm">
                                            <i class="fa fa-plus"></i>
                                            Добавить
                                        </button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        </section>


                    

                   