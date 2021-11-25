<?php

    class Model extends Database
    {
        protected String $table = "";
        private const DEFAULT_LIMIT = 4;
        private const DEFAULT_STR = "*";
        protected String $second_table = "";
        protected String $foreign_key = "";

        public function getAllData($data = self::DEFAULT_STR, $where = NULL, $sort = NULL, $esc = true, $limit = self::DEFAULT_LIMIT) {
            $sql = "select $data from $this->table ";
            $sql = $this->queryGetData($sql, $where, $sort, $esc, $limit);
            if ($where != NULL) {
                $values = array_values($where);
                $query = $this->conn->prepare($sql);
                $query->execute($values);
            }else {
                $query = $this->conn->prepare($sql);
                $query->execute();
            }
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getData($data = self::DEFAULT_STR, $where = null) {
            $sql = "select $data from $this->table ";
            $sql = $this->queryGetData($sql, $where);
            if ($where != NULL) {
                $values = array_values($where);
                $query = $this->conn->prepare($sql);
                $query->execute($values);
            }else {
                $query = $this->conn->prepare($sql);
                $query->execute();
            }

            return $query->fetch(PDO::FETCH_ASSOC);
        }

        public function getDatafromMultiTable($data = self::DEFAULT_STR, $where = null) {
            $sql = "select $data from $this->table inner join $this->second_table on $this->table.$this->foreign_key = $this->second_table.$this->foreign_key ";
            $sql = $this->queryGetData($sql, $where);
            if ($where != NULL) {
                $values = array_values($where);
                $query = $this->conn->prepare($sql);
                $query->execute($values);
            }else {
                $query = $this->conn->prepare($sql);
                $query->execute();
            }

            return $query->fetch(PDO::FETCH_ASSOC);
        }

        public function getAllDatafromMultiTable($data = self::DEFAULT_STR, $where = NULL, $sort = NULL, $esc = true, $limit = self::DEFAULT_LIMIT, $offset = NULL) {
            $sql = "select $data from $this->table inner join $this->second_table on $this->table.$this->foreign_key = $this->second_table.$this->foreign_key ";
            $sql = $this->queryGetData($sql, $where, $sort, $esc, $limit, $offset);
            if ($where != NULL) {
                $values = array_values($where);
                $query = $this->conn->prepare($sql);
                $query->execute($values);
            }else {
                $query = $this->conn->prepare($sql);
                $query->execute();
            }
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllDatafromThirdTable($data = self::DEFAULT_STR, $where = NULL, $sort = NULL, $esc = true, $limit = self::DEFAULT_LIMIT, $offset = NULL) {
            $sql = "select $data 
            from ($this->table inner join $this->second_table on $this->table.$this->foreign_key = $this->second_table.$this->foreign_key)
                inner join $this->third_table on $this->second_table.$this->foreign_key = $this->third_table.$this->foreign_key
            ";
            
        }

        public function queryGetData($sql, $where = NULL, $sort = NULL, $esc = true, $limit = self::DEFAULT_LIMIT, $offset = NULL) {
            if ($where != NULL) {
                $fields = array_keys($where);
                $isFields = true;
                $stringWhere = "where";
                for($i=0; $i < count($fields); $i++) {
                    if(!$isFields) {
                        $sql .= " and ";
                        $stringWhere = "";
                    }
                    $isFields = false;
                    $sql .= "$stringWhere $fields[$i] = ?";
                }
                if($sort != NULL) {
                    $sql .=" order by ";
                    $sql = $esc? ($sql.$sort) : ($sql.$sort." desc");
                }
            }else {
                if($sort != NULL) {
                    $sql .=' order by ';
                    $sql = $esc? ($sql.$sort) : ($sql.$sort." desc");
                }
            }
            if (!is_null($limit)) {
                $sql .= " limit $limit ";
                if(!is_null($offset)) {
                    $sql .= "offset $offset";
                }
            }
           
            return $sql;
        }

        public function searchPost($data =  self::DEFAULT_STR, $search_value, $limit = self::DEFAULT_LIMIT, $offset = NULL) {
            $sql = "select $data " 
            ."from $this->table inner join $this->second_table "
            ."on $this->table.$this->foreign_key = $this->second_table.$this->foreign_key "
            ."where TieuDe like CONCAT('%',?,'%')";
            
            if (!is_null($limit)) {
                $sql .= " limit $limit ";
                if(!is_null($offset)) {
                    $sql .= "offset $offset";
                }
            }

            $query = $this->conn->prepare($sql);
            $query->execute([$search_value]);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addData($data = NULL) {
            $fields = array_keys($data);
            $fields_list = implode(",", $fields);
            $values = array_values($data);
            $qr = str_repeat("?,", count($fields) -1);
            $sql = "insert into $this->table($fields_list) values ($qr?)";
            $query = $this->conn->prepare($sql);
            if ($query->execute($values)) {
                return json_encode(array(
                    "type" => "success",
                    "message" => "insert data successfully",
                    "id" => $this->conn->lastInsertId()
                ));
            }
            else {
                return json_encode(array(
                    "type" => "failure",
                    "message" => "insert data unsuccessfully",
                ));
            }
        }

        public function updateData($data=null, $where=null) {
            if($data != null && $where != null) {
                $fields = array_keys($data);
                $values = array_values($data);
                $where_array = array_keys($where);
                $values_where = array_values($where);
                $sql = "update $this->table set ";
                $isFields = true;
                $isFields_where = true;
                $stringWhere = "where";
                for ($i=0; $i < count($fields); $i++) {
                    if(!$isFields) {
                        $sql .= ", ";
                    }
                    $isFields = false;
                    $sql .= "".$fields[$i]." = ?";
                }
                for ($i=0; $i < count($where_array); $i++) {
                    if(!$isFields_where) {
                        $sql .= " and ";
                        $stringWhere = "";
                    }
                    $isFields_where = false;
                    $sql .= " $stringWhere $where_array[$i] = $values_where[$i]";
                }
                $query = $this->conn->prepare($sql);
                if ($query->execute($values)) {
                    return json_encode(array(
                        "type" => "success",
                        "message" => "update data successfully",
                    ));
                }
                else {
                    return json_encode(array(
                        "type" => "failure",
                        "message" => "update data unsuccessfully",
                    ));
                }
            }
        }

        public function deleteData($where = null) {
            $sql = "delete from $this->table";
            $values_where = array();
            if ($where != null) {
                $where_array = array_keys($where);
                $values_where = array_values($where);
                $isFields_where = true;
                $stringWhere = "where";
                for ($i = 0; $i < count($where_array); $i++) {
                    if (!$isFields_where) {
                        $sql .= " and ";
                        $stringWhere = "";
                    }
                    $isFields_where = false;
                    $sql .= " $stringWhere $where_array[$i] = ?";
                }
            }
            $query = $this->conn->prepare($sql);
            if ($query->execute($values_where)) {
                return json_encode(array(
                    "type" => "success",
                    "message" => "delete data successfully",
                ));
            }
            else {
                return json_encode(array(
                    "type" => "failure",
                    "message" => "delete data unsuccessfully",
                ));
            }
        }

        public function closeConnection() {
            $this->conn = NULL;
        }

        public function setupSecondTable($second_table, $foreign_key) {
            $this->second_table = $second_table;
            $this->foreign_key = $foreign_key;
        }

        public function getTable()
        {
            return $this->table;
        }

        public function setTable($table)
        {
            $this->table = $table;
            return $this;
        }
    }

?>