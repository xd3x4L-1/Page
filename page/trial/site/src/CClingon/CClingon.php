<?php
/**
* Sample controller for a site builder.
*/
	class CClingon extends CObject implements IController {

  /**
* Constructor
*/
		public function __construct() { parent::__construct(); }
  

  /**
* The page about me
*/
	public function Index() {
			
    $content = new CMContent(15);
    $this->views->SetTitle(''.htmlEnt($content['title']))
                ->AddInclude(__DIR__ . '/page.tpl.php', array(
                  'content' => $content,
                ));
  }
  
   public function del2() {
	   
    $content = new CMContent(16);
    $this->views->SetTitle(''.htmlEnt($content['title']))
                ->AddInclude(__DIR__ . '/page.tpl.php', array(
                  'content' => $content,
                ));
  }
  
   public function del3() {
	   
    $content = new CMContent(17);
    $this->views->SetTitle(''.htmlEnt($content['title']))
                ->AddInclude(__DIR__ . '/page.tpl.php', array(
                  'content' => $content,
                ));
  }
  
    public function info() {
		
    $content = new CMContent(20);
    $this->views->SetTitle(''.htmlEnt($content['title']))
                ->AddInclude(__DIR__ . '/page.tpl.php', array(
                  'content' => $content,
                ));
  }
  
    public function dok() {
		
    $content = new CMContent(21);
    $this->views->SetTitle(''.htmlEnt($content['title']))
                ->AddInclude(__DIR__ . '/page.tpl.php', array(
                  'content' => $content,
                ));
  }


  /**
* The blog.
*/

	public function Blog() {
		
    $content = new CMContent();
    $this->views->SetTitle('My blog')
                ->AddInclude(__DIR__ . '/blog.tpl.php', array(
                  'contents' => $content->ListAll(array('type'=>'post', 'order-by'=>'title', 'order-order'=>'DESC')),
                ));
  }






	}