
            <div class="main">
                    <div class="inner">
                    	<div class="col-3">
                        	<?=constants('contact')?>
                            <p><img src="<?=TEMPLATE?>img/map.jpg" class="map-image" /></p>
                        </div>
                        <div class="col-3">
                        	<h1>Написать нам</h1>
                            <?php if(isset($_SESSION['contact'])): ?>
                                <?php echo $_SESSION['contact']['res']; ?>
                            <?php else: ?>
                                <form id="ajax-contact-form" action="" method="post">
    								<fieldset class="info_fieldset" style="border:none;">
                                        <div class="form_row">
                                        <input type="text" class="form_input" name="name" placeholder="Имя" />
                                        </div>
                                        
                                        <div class="form_row">
                                        <input type="text" class="form_input" name="email" placeholder="Email" />
                                        </div>
                                        
                                        <div class="form_row">
                                        <input type="text" class="form_input" name="subject" placeholder="Тема" />
                                        </div>
                                        
                                        <div class="form_row">
                                        <input type="text" class="form_input" name="phone" placeholder="Телефон" />
                                        </div>
                                        
                                        <div class="form_row">
                                        <textarea class="form_textarea" name="message" placeholder="Сообщение: А давайте мы вам поможем :)"></textarea>
                                        </div>

                                        <div class="form_row">
                                        <input type="submit" class="form_submit" name="submit" id="submit" value="Отправить!" /> 
                                        </div>
                        			</fieldset>
                    			</form>  
                            <?php endif; ?>  
                        </div>
                    </div>
                    <?php unset($_SESSION['contact']); ?>
                    <div class="clr"></div>
                    
            </div>
            <div class="clr"></div>
			