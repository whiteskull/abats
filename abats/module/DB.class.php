<?
    class DB {

        private $db = null;
        public $debug = false;
        private $debug_lastBuiltQuery; //last query
        private $store_lastBuiltQuery = false; //store last query
        
        // connecting to db
		function __construct($host, $user, $password, $base, $charset = 'utf8', $port = null) {			
			
            $this->db = new mysqli($host, $user, $password, $base, $port);
            $this->db->set_charset($charset);			            
		}
        
        public function select($select_fields, $from_table, $where_clause='', $groupBy = '', $orderBy = '', $limit = '') {
    		
            $query = 'SELECT ' . $select_fields . ' FROM ' . $from_table .
    			(strlen($where_clause) > 0 ? ' WHERE ' . $where_clause : '');
    			// Group by:
    		$query .= (strlen($groupBy) > 0 ? ' GROUP BY ' . $groupBy : '');
    			// Order by:
    		$query .= (strlen($orderBy) > 0 ? ' ORDER BY ' . $orderBy : '');
    			// Limit:
    		$query .= (strlen($limit) > 0 ? ' LIMIT ' . $limit : '');
    			// Return query:
    		if ($this->debug || $this->store_lastBuiltQuery) {
    			$this->debug_lastBuiltQuery = $query;
    		}
            
            $result = $this->db->query($query);            
             
    		if ($this->db->errno && $this->debug) {
    			$this->debug('select');
    		}
            	
            return $result;
    	}
        
        public function insert($table, $fields_values, $no_quote_fields = false) {
    		
            if (is_array($fields_values) && count($fields_values)) {
    				// quote and escape values
    			$fields_values = $this->fullQuoteArray($fields_values, $no_quote_fields);
    				// Build query:
    			$query = 'INSERT INTO ' . $table .
    				'(' . implode(',', array_keys($fields_values)) . ') VALUES ' .
    				'(' . implode(',', $fields_values) . ')';
    				// Return query:
    			if ($this->debug || $this->store_lastBuiltQuery) {
        			$this->debug_lastBuiltQuery = $query;
        		}
    		}
            
            $res = $this->db->query($query);
    		if ($this->db->errno && $this->debug) {
    			$this->debug('insert');
    		}
    		return $res;
    	}
        
        public function update($table, $where, $fields_values, $no_quote_fields = false) {
    		
            if (is_string($where)) {
    			$fields = array();
    			if (is_array($fields_values) && count($fields_values)) {
    
    				// quote and escape values
    				$nArr = $this->fullQuoteArray($fields_values, $no_quote_fields);
    
    				foreach ($nArr as $k => $v) {
    					$fields[] = $k.'='.$v;
    				}
    			}
    				// Build query:
    			$query = 'UPDATE ' . $table . ' SET ' . implode(',', $fields) .
    				(strlen($where) > 0 ? ' WHERE ' . $where : '');
    
    			if ($this->debug || $this->store_lastBuiltQuery) {
        			$this->debug_lastBuiltQuery = $query;
        		}
    		} else {
    			throw new InvalidArgumentException(
    				'DB Fatal Error: "Where" clause argument for UPDATE query was not a string in $this->update() !',
    				1270853880
    			);
    		}
            
            $res = $this->db->query($query);
    		if ($this->db->errno && $this->debug) {
    			$this->debug('update');
    		}
    		return $res;
    	}
        
        public function delete($table, $where) {
            
            if (is_string($where)) {
    			$query = 'DELETE FROM ' . $table .
    				(strlen($where) > 0 ? ' WHERE ' . $where : '');
    
    			if ($this->debug || $this->store_lastBuiltQuery) {
        			$this->debug_lastBuiltQuery = $query;
        		}

    		} else {
    			throw new InvalidArgumentException(
    				'DB Fatal Error: "Where" clause argument for DELETE query was not a string in $this->delete() !',
    				1270853881
    			);
    		}
            
    		$res = $this->db->query($query);
    		if ($this->db->errno && $this->debug) {
    			$this->debug('delete');
    		}
    		return $res;
    	}
        
        public function where($str, $values) {
            foreach ($values as $value) {
                if (!is_numeric($value)) {
                    $value = $this->fullQuoteStr($value);
                }
                $str = preg_replace('/\?/', $value, $str, 1);
            }
            return $str;
        }
        
        public function fetchRow($res, $assoc = true) {
            if (is_object($res)) {
  				return ($assoc) ? $res->fetch_assoc() : $res->fetch_row();
    		} else {
    			return false;
    		}
    	}
        
        public function fetchAll($res, $assoc = true) {
    		if(is_object($res)) {
    			$data = array();
    			while($row = ($assoc) ? $res->fetch_assoc() : $res->fetch_row()){
    				$data[] = $row;
    			}
    			return $data;							
    		} else {
    			return false;
    		}
    	}
        
        public function insert_id() {
            return $this->db->insert_id;
        }
        
        public function affected_rows() {
    		return $this->db->affected_rows;
    	}
        
        private function fullQuoteArray($arr, $noQuote = false) {
    		if (is_string($noQuote)) {
    			$noQuote = explode(',', $noQuote);
    			// sanity check
    		} elseif (!is_array($noQuote)) {
    			$noQuote = FALSE;
    		}
    
    		foreach($arr as $k => $v) {
    			if ($noQuote === false || !in_array($k, $noQuote)) {
    				$arr[$k] = $this->fullQuoteStr($v);
    			}
    		}
    		return $arr;
    	}
    	
    	private function fullQuoteStr($str) {
    		return '\''.$this->db->real_escape_string($str).'\'';
    	}
        
        private function debug($func, $query = '') {						
			$debug = array(
				'caller' => 'DB::' . $func,
				'ERROR' => $this->db->error,
                'Code' => $this->db->errno,
				'lastBuiltQuery' => ($query ? $query : $this->debug_lastBuiltQuery),					
			);					
			die(print_r($debug));				
		}     
    }