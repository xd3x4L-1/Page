<?php
/**
* A user controller to manage content.
*
* @package LydiaCore
*/

	class CCContent extends CObject implements IController {


  /**
* Constructor
*/
		public function __construct() { parent::__construct(); }


  /**
* Show a listing of all content.
*/
		public function Index() {
	  
			$content = new CMContent();
			
			if (!isset($this->user->profile['hasRoleAdmin'])) {
		
				$urdata= array();
				
				$urdata['type'] = 'post';
	
				$this->views->SetTitle('Content Controller')
					->AddInclude(__DIR__ . '/index.tpl.php', array(
					 'user'=>$this->user,
                  'content'=>$content,
					'contents' => $content->ListAll($urdata),
                ));
	
			}
	
			else {
				
				$this->views->SetTitle('Content Controller')
					->AddInclude(__DIR__ . '/index.tpl.php', array(
					
				
					'contents' => $content->ListAll(),
                ));
				
			}			
					
		}
  

 /**
* Edit a selected content, or prepare to create new content if argument is missing.
*
* @param id integer the id of the content.
*/



		public function Edit($id=null) {
			
			$content = new CMContent($id);
			
			$return = 'user';
			
			if(isset($id)) {
			
				if( ($content->data['idUser'] == $this->user->profile['id'])    || ($content->data['idUser'] == 1 || $this->user->profile['id'] == 2 ) ){ 
			

					if (!isset($this->user->profile['hasRoleAdmin'])) {
	
	
					if (isset($content->data['type'])) {
	
						if($content->data['type'] == 'page'){ $this->RedirectTo($return);}
					}
	
					}
	
					if (!isset($this->user->profile['hasRoleAdmin'])) {
	
						$form = new CFormBlog($content);
					}
	
					else { $form = new CFormContent($content); }
	
				$status = $form->Check();
				
				if($status === false) {
					
					$this->AddMessage('notice', 'The form could not be processed.');
					$this->RedirectToController('edit', $id);
				} else if($status === true) {
					
					$this->RedirectToController('edit', $content['id']);
				}
    
				$title = isset($id) ? 'Edit' : 'Create';
				
				$this->views->SetTitle("$title content: ".htmlEnt($content['title']))
                ->AddInclude(__DIR__ . '/edit.tpl.php', array(
                  'user'=>$this->user,
                  'content'=>$content,
                  'form'=>$form,
                ));
				
				
			}
			
			else{
				
				$this->RedirectTo('user','index');
					
			}
		}
		
		else{
			
			if (!isset($this->user->profile['hasRoleAdmin'])) {
	
				if (isset($content->data['type'])) {
	
					if($content->data['type'] == 'page'){ $this->RedirectTo($return);}
				}
	
			}
	
			if (!isset($this->user->profile['hasRoleAdmin'])) {
	
				$form = new CFormBlog($content);
			}
	
			else { $form = new CFormContent($content); }
	
			$status = $form->Check();
			
			if($status === false) {
				$this->AddMessage('notice', 'The form could not be processed.');
				$this->RedirectToController('edit', $id);
			} else if($status === true) {
				$this->RedirectToController('edit', $content['id']);
			}
    
	
			$title = isset($id) ? 'Edit' : 'Create';
			$this->views->SetTitle("$title content: ".htmlEnt($content['title']))
                ->AddInclude(__DIR__ . '/edit.tpl.php', array(
                  'user'=>$this->user,
                  'content'=>$content,
                  'form'=>$form,
                ));
		}
		
	}
  

  /**
* Create new content.
*/
  public function Create() {
    $this->Edit();
  }


  /**
* Init the content database.
*/
  public function Init() {
    $content = new CMContent();
    $content->Init();
    $this->RedirectToController();
  }
  

} 