<?php


	function get_own() {
	
		global $Origo;
		
		return <<<EOD
		
			<p>Tools:
				<a href="http://validator.w3.org/check/referer">html5</a>
				<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">css3</a>
				<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css21">css21</a>
				<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">unicorn</a>
				<a href="http://validator.w3.org/checklink?uri={$Origo->request->current_url}">links</a>
				<a href="http://qa-dev.w3.org/i18n-checker/index?async=false&amp;docAddr={$Origo->request->current_url}">i18n</a>

				<a href="http://csslint.net/">css-lint</a>
				<a href="http://jslint.com/">js-lint</a>
				<a href="http://jsperf.com/">js-perf</a>
				<a href="http://www.workwithcolor.com/hsl-color-schemer-01.htm">colors</a>
				<a href="http://dbwebb.se/style">style</a>
			</p>

			<p>Docs:
				<a href="http://www.w3.org/2009/cheatsheet">cheatsheet</a>
				<a href="http://dev.w3.org/html5/spec/spec.html">html5</a>
				<a href="http://www.w3.org/TR/CSS2">css2</a>
				<a href="http://www.w3.org/Style/CSS/current-work#CSS3">css3</a>
				<a href="http://php.net/manual/en/index.php">php</a>
				<a href="http://www.sqlite.org/lang.html">sqlite</a>
				<a href="http://www.blueprintcss.org/">blueprint</a>
			</p>
			
			
EOD;

	}



	function login_own() {
	
		$Origo = Origin::Instance();
  
		if($Origo->user['isAuthenticated']) {
	  
			$items = "<img class='gravatar' src='". create_url()."site/themes/lingon/img/Gerald-G-Simple-Fruit-FF-Menu-5-300pxgreen.png' alt='hittar inte'>  <a href='" . create_url('user/profile') . "'>  <span id='acronymtext'>" . $Origo->user['acronym'] . "</span></a> ";
	
			if (isset($Origo->user->profile['hasRoleAdmin'])) {
	
				$items .= "<a href='" . create_url('acp') . "'>  <span id='paneltext'>acp</span></a> ";
    
			}
	
		$items .= "<a href='" . create_url('user/logout') . "'><span id='loguttext'>logout</span></a> ";
	
		} 
  
		else {
	  
			$items = "	<img class='gravatar' src='". create_url()."site/themes/lingon/img/Gerald-G-Simple-Fruit-FF-Menu-5-300px.png' alt='hittar inte' ><a href='" . create_url('user/login') . "'><span id='logintext'> login</span></a> ";

		}
  
		return "<nav id='nyid'>$items</nav>";
  
	}


	function render_own($region='default', $nav='site/themes/lingon/meny.tpl.php') {
	
		$Origo = Origin::Instance();
	
		$info=$Origo->config['menus']['lingon'];

		return Origin::Instance()->views->Render($region, $nav, $info);
	}


















