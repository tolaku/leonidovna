<div class="main">
	<div class="inner">

        <!-- Хлебные крошки -->
		<div class="kroshka">
            <?php if($viewId['page_id'] == 1): ?>
			     <a href="/">Главная</a> / <?=$viewId['name']?>
            <?php endif; ?>
            <?php if($viewId['page_id'] == 3): ?>
                <a href="/?view=teacher">Учитель</a> / <?=$viewId['name']?>  
            <?php endif; ?>
		</div>
        <!-- :хлебные крошки -->
        <h2><?=$viewId['name']?></h2>
      
        <div class="view"><?=$viewId['text_full']?></div>
  <div class="col-text"><img src="/images/gallery/thumbs/<?=$viewId['img']?>" alt=""></div>

    </div>

</div>
<div class="clr"></div>