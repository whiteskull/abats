<?
    class Abats {
		
		public $debug = false;	
        
        // get tree pages, inner directory
    	public function getFolderTree($dir = DOCUMENT){				
    		
            $folder = $this->getFolder($dir);		
    		if (!$folder) return false;						
    		$dh = opendir($dir);				
    		while($filename = readdir($dh))
    		{	
    			if (($filename!='..') && ($filename!='.') && is_dir($dir.$filename)){				
    				$children = $this->getFolderTree($dir.$filename.'/');
    				if ($children)
    					$folder['children'][] = $children;
    			}
    		}
            if ($folder['shortpath'] == '/') $folder['page'] = 'Index';
    		return $folder;	
    	}
    
    	// get folder
    	private function getFolder($dir){
    	    $current = basename($dir);
            if ($current == 'abats' || $current == 'temp') return false;
    		$folder = array();
            $folder['page'] = $current;
            $folder['path'] = $dir;
			$folder['shortpath'] = str_replace(DOCUMENT, '/', $dir);
			foreach (glob($dir."*.php") as $filename) {
                $content = file_get_contents($filename, false, null, 0, 100);
                if (preg_match('/abats\/begin.php/', $content)) {
                   	$folder['pages'][] = basename($filename); 
                }
			}						
			return $folder;
    	}
        
        // view tree pages
    	public function printFolderTree($tree, $current, $params, &$content = null, &$level = 0, $key = 0){				
    		if (!is_array($tree)) return false;		
    		$level++;		
    		$margin = 15;		

    		$have_children = (is_array($tree['children']) && count($tree['children'])) || is_array($tree['pages']) && count($tree['pages']);
    		
    		$content .= '<div class="level_'.$level.'" id="page_'.$level.'_'.$key.'" style="padding-left:'.$margin.'px; white-space: nowrap;">';		
    		$content .= $have_children ? '<span style="cursor:pointer" onclick="$(\'.tree-pages-children\',$(this).parent()).first().slideToggle(\'fast\')"><img unselectable="on" src="img/minus.png" onclick="changeTree($(this))" width="11" height="11" align="absmiddle" style="padding-left: 3px;" /></span><img src="img/folder.png" width="15" height="15" align="absmiddle" />' : '<span><img src="img/empty.png" width="11" height="11" align="absmiddle" style="padding-left: 3px;" /><img src="img/folder.png" width="15" height="15" align="absmiddle" /></span>';		
    		$content .= '<span class="tree-folder'.(($current==$tree['path']) ? ' page-selected' : '').'"><a href="'.$tree['path'].'">'.$tree['page'].'</a></span>';
    		
    		if ($have_children){			
    			$content .= '<div class="tree-pages-children" id="page_'.$level.'_'.$key.'_children" >';								
    			
    			if (is_array($tree['pages']) && count($tree['pages'])){
    				foreach ($tree['pages'] as $key => $page){												
    					$content .= '<div><span class="tree-page" style="padding-left:'.($margin + 1).'px"><span><img src="img/page.png" width="15" height="15" align="absmiddle" /></span><a href="'.$tree['path'].$page.'">'.$page.'</a></span></div>';	
    				}
    			}
    			if (is_array($tree['children']) && count($tree['children'])){
    				foreach ($tree['children'] as $key=>$folder){												
    						$this->printFolderTree($folder, $current, $params, $content, $level, $key);				
    						$level = 1;
    				}
    			}
    			$content .= '</div>';		
    		}		
    		$content .= '</div>';				
    		return $content;
    	
    	}
        
    }