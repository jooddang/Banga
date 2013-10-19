<?php
class Customer{

    var $customer_id = 0;
    var $phonenumber = "";
	var $name = "";
	var $address = "";
	var $zipcode = "";
	var $city = "";
	var $country = "";
	var $email = "";
     
    function __construct($customer_id = 0){
        $this->customer_id = $customer_id;
        $this->fetch();
    }
    
    private function fetch(){
        if(!is_null($this->customer_id) && $this->customer_id > 0){
            $SQL = "SELECT * FROM customer WHERE customer_id = '".$this->customer_id."'";
            
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
    	if($this->customer_id > 0){
        	/**
             *  Object bestaat, bestaande rij in de database bijwerken.
             */
        	$SQL = "UPDATE customer SET customer_id = '".mysql_real_escape_string($this->customer_id)."',  phonenumber = '".mysql_real_escape_string($this->phonenumber)."',  name = '".mysql_real_escape_string($this->name)."',  address = '".mysql_real_escape_string($this->address)."',  zipcode = '".mysql_real_escape_string($this->zipcode)."',  city = '".mysql_real_escape_string($this->city)."',  country = '".mysql_real_escape_string($this->country)."',  email = '".mysql_real_escape_string($this->email)."' WHERE customer_id = '".$this->customer_id."'";  
			
            if(@mysql_query($SQL)){
            	return true;
            }else{
            	print("Error saving Customer into table customer: <br /><pre>".mysql_error()."<br />".$SQL."</pre>");
                return false;
            }           
        }else{
    		$SQL = "INSERT INTO customer (customer_id, phonenumber, name, address, zipcode, city, country, email) VALUES ('".mysql_real_escape_string($this->customer_id)."', '".mysql_real_escape_string($this->phonenumber)."', '".mysql_real_escape_string($this->name)."', '".mysql_real_escape_string($this->address)."', '".mysql_real_escape_string($this->zipcode)."', '".mysql_real_escape_string($this->city)."', '".mysql_real_escape_string($this->country)."', '".mysql_real_escape_string($this->email)."');"; 
            
            $RS = mysql_query($SQL) or print("Error saving Repair into table repair: <br /><pre>".mysql_error()."<br />".$SQL."</pre>");

            if($id = @mysql_insert_id()){
            	$this->customer_id = $id;
                return true;
            }else{
            	return false;
            }
        }
		return false;
    }
    
    public function delete(){
    	if($this->customer_id > 0){
        	
        	$SQL = "DELETE FROM customer WHERE customer_id = '".$this->customer_id."' LIMIT 1; "; 
			
            $RS = mysql_query($SQL) or die("Error deleting Customer from table customer: <br /><pre>".mysql_error()."<br />".$SQL."</pre>");
            
            if(mysql_affected_rows() > 0){
 				return true;
			}
        }else{
        	return false;
        }        
    }
	
	public static function overzicht(){
		
		$SQL = "SELECT customer_id FROM customer";
		
		$RS = mysql_query($SQL);
		
		$customers = array();
		while ($row = mysql_fetch_assoc($RS)){
			 $customers[] = new Customer($row['customer_id']); 
		}
		
		return $customers;
	}
	
    function __toString(){
    	$output = "<pre>Object type: Customer \n";
        $output .= "Gekoppelde tabel: customer \n";
        $output .= "Identifier (customer_id): ".$this->customer_id."\n\n";
        $output .= "------Veldgegevens------------\n";        
		$output .= "phonenumber (varchar): ".$this->phonenumber." \n";
        $output .= "name (varchar): ".$this->name." \n";
		$output .= "address (varchar): ".$this->address." \n";
		$output .= "zipcode (varchar): ".$this->zipcode." \n";
		$output .= "city (varchar): ".$this->city." \n";
		$output .= "country (varchar): ".$this->country." \n";
		$output .= "email (varchar): ".$this->email." \n";
		
        $output .= "------Einde Veldgegevens------\n\n</pre>"; 
        return $output;    	
    }
}
?>