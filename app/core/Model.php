<?php

    class Model extends Database
    {
        protected String $table = "";

        public function select_array($data = "*", $where = NULL) {
            $sql = "select $data from $this->table ";
            if ($where != NULL) {
                $fields = array_keys($where);
                $fields_list = implode("", $fields);
                $values = array_values($where);
                $isFields = true;
                $stringWhere = "where";
                // where
                for($i=0; $i < count($fields); $i++) {
                    if(!$isFields) {
                        $sql .= " and ";
                        $stringWhere = "";
                    }
                    $isFields = false;
                    $sql .= "$stringWhere $fields[$i] = ?";
                }
                $query = $this->conn->prepare($sql);
                $query->execute($values);
            }
            else {
                $query = $this->conn->prepare($sql);
                $query->execute();
            }
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function add($data = NULL) {
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

        public function update($data=null, $where=null) {
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

        public function delete($where = null) {
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

        public function select_row($data = "*", $where = null) {
            $sql = "select $data from $this->table ";
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
            $query->execute($values_where);
            return $query->fetch(PDO::FETCH_ASSOC);
        }
    }

?>