
            <div class="main">
                    <div class="inner">
                    <?php foreach($sections as $section): ?>
                    	<div class="col-3">
                        	<h1><?=$section['name']?></h1>
                        	<img src="<?=$section['img']?>"/>
                            <!-- выводим текст -->
                            <?=$section['text_min']?>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <div class="clr"></div>
                    <div class="inner">
                    	<div class="col-2">
                        	<h2><a href="#">Vijay Raj</a></h2>
                            <img src="img/team-01.jpg"/>
                            <p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitt accusam.</p>
                            <p class="read"><a href="#" title="Follow him on Twitter">@iamdesigner</a></p>
                        </div>
                        <div class="col-2">
                        	<h2><a href="#">Chris Neil</a></h2>
                            <img src="img/team-02.jpg"/>
                            <p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitt accusam.</p>
                            <p class="read"><a href="#" title="Follow him on Twitter">@chrisneil</a></p>
                        </div>
                        <div class="col-2">
                        	<h2><a href="#">Micky Smith</a></h2>
                            <img src="img/team-03.jpg"/>
                            <p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitt accusam.</p>
                            <p class="read"><a href="#" title="Follow him on Twitter">@mickys</a></p>
                        </div>
                    </div>
            </div>
            <div class="clr"></div>
			