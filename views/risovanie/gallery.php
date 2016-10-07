<?php//print_arr($gallery) ?>
            <div class="main">
            		<div class="inner">
                    	<section>
				<ul class="lb-album">
					<?php foreach($gallery as $item): ?>
					<li>
						<a href="#image-1">
							<img src="<?=TEMPLATE?><?=$item['img_thumbs']?>" alt="image01">
							<span><?=$item['title']?></span>
						</a>
						<div class="lb-overlay" id="image-1">
							<img src="<?=TEMPLATE?><?=$item['img_full']?>" alt="image01" />
							<div>
								<h3><?=$item['name_a']?> <span>/<?=$item['name_b']?>/</h3>
								<p><?=$item['text']?></p>
								<a href="#image-10" class="lb-prev">Prev</a>
								<a href="#image-2" class="lb-next">Next</a>
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
            
			