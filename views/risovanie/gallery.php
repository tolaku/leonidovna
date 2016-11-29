<?php//print_arr($gallery) ?>
            <div class="main">
            		<div class="inner">
                    	<section>
				<ul class="lb-album">
					<?php $i=0; ?>
					<?php foreach($gallery as $item): $i++?>
					<li>
						<a href="#<?=$i?>">
							<img src="<?=TEMPLATE?><?=$item['img_thumbs']?>">
							<span><?=$item['title']?></span>
						</a>
						<div class="lb-overlay" id="<?=$i?>">
							<img src="<?=TEMPLATE?><?=$item['img_full']?>" />
							<div>
								<h3><?=$item['name_a']?> <span>/<?=$item['name_b']?>/</h3>
								<p><?=$item['text']?></p>
								<a href="#<?=$i-1?>" class="lb-prev">Prev</a>
								<a href="#<?=$i+1?>" class="lb-next">Next</a>
							</div>
							<a href="#page" class="lb-close">x Close</a>
						</div>
					</li>
					<?php endforeach; ?>

				</ul>
			</section>
                    </div>
            </div>
            <div class="clr"></div>
            
			