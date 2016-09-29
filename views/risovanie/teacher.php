
            <div class="main">
                    <div class="inner">
                    <?php foreach($sections as $section): ?>
                    	<div class="col-3">
                        	<h1><?=$section['name']?></h1>
                        	<img src="<?=TEMPLATE?><?=$section['img']?>"/>
                            <!-- выводим текст -->
                            <?=$section['text_min']?>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <div class="clr"></div>
                    <div class="inner">
                    	<div class="col-2">
                        	<h2><a href="#">Светлана Леонидовна</a></h2>
                            <img src="img/team-01.jpg"/>
                            <p>Люблю вышивать по вечерам. Пишу стихи, езжу на рыбалку )).</p>
                            <p class="read"><a href="#" title="Follow him on Twitter">@leonedovna</a></p>
                        </div>
             
                    </div>
            </div>
            <div class="clr"></div>
			