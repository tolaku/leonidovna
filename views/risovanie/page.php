<div class="main">
	<div class="inner">

        <!-- Выводим разделы -->
        <?php if($sections): ?>
            <?php foreach($sections as $section): ?>
            	<div class="col-1">
                    <h2>
                        <a href="?view=section&amp;id=<?=$section['id']?>"> <?=$section['name']?></a>
                    </h2>
                    <a href="?view=section&amp;id=<?=$section['id']?>">
                	   <img src="<?=TEMPLATE?><?=$section['img']?>" />
                    </a>
                    <?=$section['text_min']?>
                    <p class="read"><a href="?view=section&amp;id=<?=$section['id']?>">Подробнее &raquo;</a></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Раздела пока нет!</p>
        <?php endif; ?>
            <!-- :выводим разделы -->

    </div>
    <div class="inner">
   
        <div class="col-2">
        	<?=constants('ask')?>
        </div>
    </div>
</div>
<div class="clr"></div>