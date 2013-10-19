<?php
class cart_item
{

    var $ciid = 0;
	var $uid = "";
	var $iid = "";
	var $quantity = "";
	var $tid = "";
     
    function __construct($ciid = 0){
        $this->ciid = $ciid;
        $this->fetch();
    }
    
    private function fetch(){
        if(!is_null($this->ciid) && $this->ciid > 0){
            $SQL = "SELECT * FROM cart_item WHERE ciid = '".$this->ciid."'";
            
            $RS = mysql_query($SQL) or die("Fout bij het ophalen van de $classNaam: ".mysql_error());
            
            if($row = mysql_fetch_assoc($RS)){
                foreach($row as $key => $value){
                    $this->$key = $value;
                }
                return true;
            }
        }
        return false;
    }
	
    public function get($field){
        
        switch($field){
        
            default:
                return $this->$field;
            break;
        }
    }
    
    public function set($field, $value){
        
        switch($field){
     
            default:    
                $this->$field = $value;
            break;
        }
    }

    function save(){
    	if($this->ciid > 0){
        	/**
             *  Object bestaat, bestaande rij in de database bijwerken.
             */
        	$SQL = "UPDATE cart_item SET ciid = '".mysql_real_escape_string($this->ciid).
                "', uid = '".mysql_real_escape_string($this->uid).
                "',  iid = '".mysql_real_escape_string($this->iid).
                "',  quantity = '".mysql_real_escape_string($this->quantity).
                "',  tid = '".mysql_real_escape_string($this->tid)."' WHERE ciid = '".$this->ciid."'";
			
            if(@mysql_query($SQL)){
            	return true;
            }else{
            	print("Error saving cart_item point into table cart_item: <br /><pre>".mysql_error()."<br />".$SQL."</pre>");
                return false;
            }           
        }else{
    		$SQL = "INSERT INTO cart_item (ciid, uid, iid, quantity, tid, amount) VALUES ('".
                        mysql_real_escape_string($this->ciid).
                        "', '".mysql_real_escape_string($this->uid).
                        "', '".mysql_real_escape_string($this->iid).                        
                        "', '".mysql_real_escape_string($this->quantity).
                        "', '".mysql_real_escape_string($this->tid)."');"; 
            
            $RS = mysql_query($SQL) or print("Error saving cart_item point into table cart_item: <br /><pre>".mysql_error()."<br />".$SQL."</pre>");

            if($ciid = @mysql_insert_ciid()){
            	$this->ciid = $ciid;
                return true;
            }else{
            	return false;
            }
        }
		return false;
    }
    
    public function delete(){
    	if($this->ciid > 0){
        	
        	$SQL = "DELETE FROM cart_item WHERE ciid = '".$this->ciid."' LIMIT 1; "; 
			
            $RS = mysql_query($SQL) or die("Error deleting cart_item point from table cart_item: <br /><pre>".mysql_error()."<br />".$SQL."</pre>");
            
            if(mysql_affected_rows() > 0){
 				return true;
			}
        }else{
        	return false;
        }        
    }
	
	public static function overzicht(){
		
		$SQL = "SELECT ciid FROM cart_item WHERE quantity > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 1 DAY) ORDER BY quantity ASC";
		
		$RS = mysql_query($SQL);
		
        $num_rows = mysql_num_rows($RS);
        
		$cart_items = array();
		while ($row = mysql_fetch_assoc($RS)){
			 $cart_items[] = new cart_item($row['ciid']); 
		}
		
		return $cart_items;
	}

    public static function overzichtFilter($uid){
        
        $SQL = "SELECT ciid FROM cart_item WHERE quantity > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 1 DAY) AND uid = ".$uid." ORDER BY quantity ASC";
        
        $RS = mysql_query($SQL);
        
        $cart_items = array();
        while ($row = mysql_fetch_assoc($RS)){
             $cart_items[] = new cart_item($row['ciid']); 
        }
        
        return $cart_items;
    }
	
    function __toString(){
    	$output = "<pre>Object type: cart_item \n";
        $output .= "Gekoppelde tabel: cart_item \n";
        $output .= "ciidentifier (ciid): ".$this->ciid."\n\n";
        $output .= "------Veldgegevens------------\n";        
        $output .= "uid (int): ".$this->uid." \n";
		$output .= "quantity (varchar): ".$this->quantity." \n";
		$output .= "tid (varchar): ".$this->tid." \n";
		$output .= "iid (varchar): ".$this->iid." \n";
		
        $output .= "------Einde Veldgegevens------\n\n</pre>"; 
        return $output;    	
    }
}
?>