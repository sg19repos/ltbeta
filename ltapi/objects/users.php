<?php
    class Users{
    
        // database connection and table name
        private $conn;
        private $table_name = "lt_users";
    
        // object properties
        public $userId;
        public $userName;
        public $userPassword;
        public $userEmailId;
        public $userMobileNo;
        public $userGeoLocation;
    
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // create product
        function create(){
        
            // query to insert record
            $query = "INSERT INTO
                        " . $this->table_name . "
                    SET
                    user_name=:user_name,user_password=:user_password, user_emailid=:user_emailid, user_mobileno=:user_mobileno, user_geolocation=:user_geolocation";
        
            // prepare query
            $stmt = $this->conn->prepare($query);
        
            // sanitize
            $this->userName=htmlspecialchars(strip_tags($this->userName));
            $this->userPassword=htmlspecialchars(strip_tags($this->userPassword));
            $this->userEmailId=htmlspecialchars(strip_tags($this->userEmailId));
            $this->userMobileNo=htmlspecialchars(strip_tags($this->userMobileNo));
            $this->userGeoLocation=htmlspecialchars(strip_tags($this->userGeoLocation));
        
            // bind values
            $stmt->bindParam(":user_name", $this->userName);
            $stmt->bindParam(":user_password", $this->userPassword);
            $stmt->bindParam(":user_emailid", $this->userEmailId);
            $stmt->bindParam(":user_mobileno", $this->userMobileNo);
            $stmt->bindParam(":user_geolocation", $this->userGeoLocation);
        
            // execute query
            if($stmt->execute()){
                return true;
            }
        
            return false;
            
        }
        
        // used when filling up the update product form
        function readOne(){
        
            // query to read single record
            $query = "SELECT
                        user_id, user_name
                    FROM
                        " . $this->table_name . "
                    WHERE
                    user_name =:user_name AND user_password =:user_password";
        

            // $query = "SELECT
            //          user_id, user_name
            //      FROM
            //          " . $this->table_name . "
            //      WHERE
            //          user_name ='Kygo' AND user_password ='121212'";
        

            // prepare query statement
            $stmt = $this->conn->prepare( $query );

            // sanitize
            $this->userName=htmlspecialchars(strip_tags($this->userName));
            $this->userPassword=htmlspecialchars(strip_tags($this->userPassword));

            // bind values
            $stmt->bindParam(":user_name", $this->userName);
            $stmt->bindParam(":user_password", $this->userPassword);
        
            // execute query
            // if($stmt->execute()){
            //     // get retrieved row
            //     $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            //     // set values to object properties
            //     $this->userId = $row['user_id'];
            //     $this->userName = $row['user_name'];
            // }

             // execute query
             $stmt->execute();
        
             // get retrieved row
             $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
             // set values to object properties
             $this->userName = $row['user_name'];
             $this->userId = $row['user_id'];
        }
        
        // used for paging products
        public function count(){
            $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "
            WHERE 
                user_name=:user_name and user_password =:user_password";
        
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            return $row['total_rows'];
        }
        
    }
?>