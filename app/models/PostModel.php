<?php

    class PostModel extends Model
    {
        protected String $table = "baiviet";
        protected String $second_table;
        protected String $foreign_key;

        function setupSecondTable($second_table, $foreign_key) {
            $this->second_table = $second_table;
            $this->foreign_key = $foreign_key;
        }

        /**
         * Get the value of table
         */ 
        public function getTable()
        {
                return $this->table;
        }

        /**
         * Set the value of table
         */ 
        public function setTable($table)
        {
                $this->table = $table;

                return $this;
        }
    }
?>