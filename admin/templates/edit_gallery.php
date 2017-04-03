<?php defined('VOROBEY') or die('Простите, не нужно...'); ?>
                
                    <aside class="right-side">
                <!-- Main content -->

                <section class="content">
                	<div class="col-md-5">
                            <div class="panel">
                                <header class="panel-heading">
                                    <a href="/admin/index.php?view=gallery">Добавить фото</a> | Редактируем фото
                                </header>
                            <?php if($get_gallery): ?>
                                <ul class="list-group teammates">
                                    <li class="list-group-item">
                                    
                                    <div class="clear"> </div>
                                    <?php foreach($get_gallery as $item): ?>
                                        <span style="width: 20px">
                                            <a href="?view=edit_gallery&amp;id=<?=$item['id']?>">
                                                <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                            </a>
                                            <a class="del" href="?view=edit_gallery&amp;del_id=<?=$item['id']?>">
                                                <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                            </a>
                                        </span>
                                        <a href="?view=edit_gallery&amp;id=<?=$item['id']?>"><img src="/images/gallery/thumbs/<?=$item['img_thumbs']?>" width="100" height="100"></a>
                                    <?php endforeach; ?>
                                    </li>
                                  
                                </ul>
                            <?php else: echo "<p>Галерея пуста!</p>"; ?>
                            <?php endif; ?>
                                <div class="panel-footer bg-white">
                                    <form method="post" enctype="multipart/form-data">
                                        <label for="file">Изменить фото</label>
                                        <p><input type="file" name="files" id="file"></p>
                                        <?php if(isset($get_gallery_id['img_thumbs'])): ?>
                                        <p><img src="/images/gallery/thumbs/<?=$get_gallery_id['img_thumbs']?>" width="100" height="100"></p>
                                        <?php endif; ?>
                                        <input type="hidden" name="img_thumbs" value="<?=$get_gallery_id['img_thumbs']?>">
                                        <p><input type="text" name="title" value="<?=$get_gallery_id['title']?>" placeholder=" № класса"></p>
                                        <p><input type="text" name="name_a" value="<?=$get_gallery_id['name_a']?>" placeholder=" имя"></p>
                                        <p><input type="text" name="name_b" value="<?=$get_gallery_id['name_b']?>" placeholder=" событие"></p>
                                        <input type="hidden" name="get_gallery_id" value="<?=$get_gallery_id['id']?>">
                                        <p><textarea rows="4" cols="45" name="text" placeholder="Мы стараемся дорожить друг другом ....."><?=$get_gallery_id['text']?></textarea></p>
                                        
                                        <button class="btn btn-primary btn-addon btn-sm">
                                            <i class="fa fa-plus"></i>
                                            <?php if(isset($_GET['id'])) echo 'Обновить'; else echo 'Добавить'; ?>
                                        </button>
                                    </form>
                                    <?php 
                                    /* Если не удалось загрузить картинку на сервер, выводим сообщение */
                                    if(isset($_SESSION['answer'])){
                                        echo "<div class='error'>".$_SESSION['answer']."</div>";
                                        unset($_SESSION['answer']);
                                    }
                                    /* Успешно загрузили картинку на сервер */
                                    if(isset($_SESSION['res']['ok'])) echo $_SESSION['res']['ok'];
                                    ?>
                                    <?php unset($_SESSION['res']) ?>
                                </div>
                            </div>
                        </div>
                        </section>