<!doctype html>

<html lang='en'>

	<head>

		<meta charset='utf-8'/>
  
		<title><?=$title?></title>
  
		<link rel='shortcut icon' href='<?=theme_url($favicon)?>'/>

		<link rel='stylesheet' href='<?=theme_url($stylesheet)?>'/>

		<?php if(isset($inline_style)): ?>
	
			<style><?=$inline_style?></style>
	
		<?php endif; ?>

	</head>

	<body>
	
		<div id='body'>
		
		<?=get_messages_from_session()?> 
		
			<div id='log'>
						
				<div id='over'>
				</div>
						
				<div id='header'>
							
					<div id='banner'>
				
						<a href='<?=base_url()?>'><img id='site-logo' src='<?=theme_url($logo)?>' alt='logo' width='<?=$logo_width?>' height='<?=$logo_height?>' /></a>
					
						<span id='site-title'><a href='<?=base_url()?>'><?=$header?></a></span> 
					
						<span id='site-slogan'><?=$slogan?></span> 
								
					</div>
								
					<div id='login-menu'><?=login_own()?>
				
					</div>
					
					<div id='navbar'>

						<?php if(region_has_content('navbar')): ?>
				
							<?=render_own('navbar')?>
				
						<?php endif; ?>				
								
					</div>
								
				</div>
							
			</div>		
		
			<div id='top'>
			
				<div id='outer-wrap-header'>
				
					<div id='inner-wrap-header'>
					
						<div id='login'>
						
						</div>
						
					</div>
					
				</div>
				
			</div>
			
			<div id='outer'>

				<div id='outer-wrap-main'>
	
					<div id='inner-wrap-main'>
			
						<div id='primary'>
						
							<?=@$main?> 
							
							<?=render_views('primary')?> 
							
							<?=render_views()?>
						
						</div>
			
					</div>
		
				</div>
	
			</div>
			
			<div id='bottom'>
	
				<div id='outer-wrap-footer'>

					<div id='inner-wrap-footer'>
				
						<div id='footer'>
						
							<?=$footer?><?=get_own()?>
							
							<?php if(isset($Origo->user->profile['hasRoleAdmin'])): ?>

								<?=get_debug()?>

							<?php endif; ?>
							
							<?php if(region_has_content('sidebar')): ?>
				
								<div id='sidebar'><?=render_views('sidebar')?></div>
				
							<?php endif; ?>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
	
	</body>

</html>