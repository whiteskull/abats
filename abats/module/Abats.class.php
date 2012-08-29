<?php
	class Abats {
	   
        public $debug = false;
        public $template = 'standart';
        public $header;
        public $title;
        public $config = array();
        public $content;
        
		function __construct() {			
            
            global $db;
            
            // get config site
            $res = $db->select('name, value', 'a_config');
            $result = $db->fetchAll($res);
            foreach ($result as $i) {
                $this->config[$i['name']] = $i['value'];
            }
            // set template
            if ($this->template != $this->config['TEMPLATE']) {
                $this->template = $this->config['TEMPLATE'];
            }
            // set title
            $this->title = $this->config['TITLE_PAGES'];
		}
        
		// add component
		public function addComponent($name, $component, $params = false) {

   			global $smarty;
            
			$parts = explode(':', $component);
			$folder = $parts[0].'/'.$parts[1].'/';
            $template = ($parts[2]) ? 'template/'.$parts[2].'/' : 'template/standart/';
            
            // if not exists template, error
            if (!file_exists(DOCUMENT.'abats/components/'.$folder.$template.'index.tpl')) {
                if ($this->debug) {
                    die('No file template: '.DOCUMENT.'abats/components/'.$folder.$template.'index.tpl');
                } else {
                    return;
                }
            }
            
			// if exists style, include it
			if (file_exists(DOCUMENT.'abats/components/'.$folder.$template.'style.css') && !strpos($this->header, '/abats/components/'.$folder.$template.'style.css')) {
				$style = '/abats/components/'.$folder.$template.'style.css';
				$this->setStyle($style);
				//$addHeader .= '<link rel="stylesheet" href="'.$style.'" type="text/css" />'."\n";
			}

			// if exists script, include it
			if (file_exists(DOCUMENT.'abats/components/'.$folder.$template.'script.js')  && !strpos($this->header, '/abats/components/'.$folder.$template.'script.js')) {
				$script = '/abats/components/'.$folder.$template.'script.js';
				$this->setScript($script);
			}
			
			// if exists file component, include it
			if (file_exists(DOCUMENT.'abats/components/'.$folder.'component.php')) {
				require(DOCUMENT.'abats/components/'.$folder.'component.php');
			}
			
            // if exists parameters of component, pass its
            if ($data) {
                $smarty->assign('data', $data);    
            }
            
            $smarty->assign('path', '/abats/components/'.$folder.$template); // path to template of component
			$smarty->assign($name, $smarty->fetch(DOCUMENT.'abats/components/'.$folder.$template.'/index.tpl')); 
		}
		
		// set style
		public function setStyle($src) {
            if (file_exists(DOCUMENT.$src)) {
    			$this->header .= '<link rel="stylesheet" href="'.$src.'" type="text/css" />'."\n";
            } else if($this->debug){
                die('No such file: '.DOCUMENT.$src);
            }
		}
		
		// set script
		public function setScript($src) {
            if (file_exists(DOCUMENT.$src)) {
    			$this->header .= '<script type="text/javascript" src="'.$src.'"></script>'."\n";
            } else if($this->debug){
                die('No such file: '.DOCUMENT.$src);
            }
		}
        
        // create menu
        public function getMenu() {
            if(file_exists(DOCUMENT.'.top.menu.php')) {
        		require_once(DOCUMENT.'/.top.menu.php');
        		// define active menu
        		foreach($menuLinks as &$menu) {
        			if (stripos($_SERVER['REQUEST_URI'], $menu['href']) || $_SERVER['REQUEST_URI'] == $menu['href']) {
        				$menu['active'] = true;
        			}
        			if ($menu['href'] == '/') {
        				$menu['href'] = "";
        			}
        		}
                return $menuLinks;
        	}
        }
        
        // add content
        public function addContent($src) {
            global $smarty;
            $this->content .= $smarty->fetch(DOCUMENT.TEMPLATE.$src);
        }
        
	}