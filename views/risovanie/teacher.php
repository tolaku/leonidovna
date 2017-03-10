
            <div class="main">
                    <div class="inner">
                    <?php foreach($sections as $section): ?>
                    	<div class="col-3">
                        	<h1><?=$section['name']?></h1>
                        	<img src="images/gallery/thumbs/<?=$section['img']?>"/>
                            <!-- выводим текст -->
                            <?=$section['text_min']?>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <div class="clr"></div>
                    <div class="inner">
                    	<div class="col-2">
                        	<?=constants('svetlana')?>
                        </div>
             
                    </div>
            </div>
            <div class="clr"></div>
			