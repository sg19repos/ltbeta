<?php
    class GroupShells{
    
        // database connection and table name
        private $conn;
        private $table_name = "lt_group_shells";
    
        // object properties
        public $groupShellId;
        public $groupShellUser;
        public $groupShellList;
        
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
                    group_shell_user=:group_shell_user, group_shell_list=:group_shell_list";
        
            // prepare query
            $stmt = $this->conn->prepare($query);
        
            // sanitize
            $this->groupShellUser=htmlspecialchars(strip_tags($this->groupShellUser));
            $this->groupShellList=htmlspecialchars(strip_tags($this->groupShellList));
        
            // bind values
            $stmt->bindParam(":group_shell_user", $this->groupShellUser);
            $stmt->bindParam(":group_shell_list", $this->groupShellList);
        
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
                        group_shell_list
                    FROM
                        " . $this->table_name . "
                    WHERE
                    group_shell_user =:group_shell_user";
        
            // prepare query statement
            $stmt = $this->conn->prepare( $query );

            // sanitize
            $this->groupShellUser=htmlspecialchars(strip_tags($this->groupShellUser));
            $this->groupShellList=htmlspecialchars(strip_tags($this->groupShellList));

            // bind values
            $stmt->bindParam(":group_shell_user", $this->groupShellUser);
        
             $stmt->execute();
        
             // get retrieved row
             $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
             // set values to object properties
             $this->groupShellList = $row['group_shell_list'];
        }
        
        // used for paging products
        public function count(){
            $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "
            WHERE 
            group_shell_user=:group_shell_user";
        
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            return $row['total_rows'];
        }

        // update the product
        public function update(){
        
            // update query
            $query = "UPDATE
                        " . $this->table_name . "
                    SET
                    group_shell_list = concat(group_shell_list, ',' :group_shell_list)
                    WHERE
                    group_shell_user = :group_shell_user";
            
                // prepare query statement
                $stmt = $this->conn->prepare($query);
            
                // sanitize
                $this->groupShellUser=htmlspecialchars(strip_tags($this->groupShellUser));
                $this->groupShellList=htmlspecialchars(strip_tags($this->groupShellList));
            
                // bind new values
                $stmt->bindParam(':group_shell_user', $this->groupShellUser);
                $stmt->bindParam(':group_shell_list', $this->groupShellList);
            
                // execute the query
                if($stmt->execute()){
                    return true;
                    // return $stmt;
                }
            
                return false;
                // return $stmt;
            }
        
    }
?>