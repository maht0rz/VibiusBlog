		
		<div class="container">
			<div class="row content">
				<div class="col-xs-12 col-lg-9">
					<div class="well well-lg well-snip">
						<div class="row">
							<div class="col-xs-12">
								<textarea rows="20" class="form-control customForm"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="col-xs-12 col-lg-12 well well-lg well-snip">
					<?php
						if(isset($error)){

							?>
								<div class="alert alert-danger alert-dismissable">
									  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									  <strong>Error!</strong> - Invalid captcha
									</div>
							<?php
						}
					?>
							<br>
							<img src="<?php echo URL::base(); ?>captcha">

								<form action="<?php echo URL::base() ?>submit" method="post">
								<input type="text" name="captcha" placeholder="Enter captcha text" class="form-control customForm">
								<input type="submit" class="btn btn-default btn-add" value="Submit">
							</form>
							
							</div>
							<img class="img-responsive logo-itsmash" src="<?php echo URL::to('assets/img/') ?>/itsmash_03.png" alt="www.itsmash.sk">
				</div>
			</div>
		</div>
		
		
		 