<?php
    class AdminPostModel extends Model
    {
        protected String $table = "baiviet";

        public function postList(){		
            $sqlQuery = "SELECT * FROM ".$this->table." ";
            if(!empty($_POST["search"]["value"])){
                $sqlQuery .= 'where(ID_BaiViet LIKE "%'.$_POST["search"]["value"].'%" ';
                $sqlQuery .= ' OR TieuDe LIKE "%'.$_POST["search"]["value"].'%" ';			
                $sqlQuery .= ' OR AnhDaiDien LIKE "%'.$_POST["search"]["value"].'%" ';
                $sqlQuery .= ' OR ID_TheLoai LIKE "%'.$_POST["search"]["value"].'%" ';
                $sqlQuery .= ' OR SoLuotThich LIKE "%'.$_POST["search"]["value"].'%") ';			
            }
            // if(!empty($_POST["order"])){
            //     $sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
            // } else {
            //     $sqlQuery .= 'ORDER BY ID_BaiViet DESC ';
            // }
            // if($_POST["length"] != -1){
            //     $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
            // }
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Phân trang	
            $numRows = $stmt->rowCount();
            // $sqlQuery1 = "SELECT * FROM ".$this->table." ";
            // $result1 = mysqli_query($this->dbConnect, $sqlQuery1);
            // $numRows = mysqli_num_rows($result1);
            
            // Chuyển từ dạng [key => value] về dạng [index => value]   
            $postData = array();
            foreach($posts as $post){		
                $postRows = array();			
                $postRows[] = $post['TieuDe'];
                $postRows[] = $post['ID_TheLoai'];	
                $postRows[] = $post['NgayDang'];
                $postRows[] = $post['SoLuotThich'];					
                $postRows[] = '<button type="button" name="update" id="'.$post["ID_BaiViet"].'" class="btn btn-warning btn-xs update">Sửa</button><button type="button" name="delete" id="'.$post["ID_BaiViet"].'" class="btn btn-danger btn-xs delete" >Xóa</button>';
                $postData[] = $postRows;
            }
            $output = array(
                "draw"				=>	intval($_POST["draw"]),
                "recordsTotal"  	=>  $numRows,
                "recordsFiltered" 	=> 	$numRows,
                "data"    			=> 	$postData
            );
            echo json_encode($output);
        }
    }
?>