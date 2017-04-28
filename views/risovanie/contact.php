
            <div class="main">
                    <div class="inner">
                    	<div class="col-3">
                        	<?=constants('contact')?>
                            <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2457.1970591573527!2d26.115510815797148!3d52.12245657974082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4727a15f8e238e8f%3A0xb156d68784323de7!2z0JPQuNC80L3QsNC30LjRjyDihJYgMQ!5e1!3m2!1sru!2sru!4v1493370514895" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></p>
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
                                        <textarea class="form_textarea" name="message" placeholder="Сообщение"></textarea>
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
			