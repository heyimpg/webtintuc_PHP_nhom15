<?php
    class AdminPostModel extends Model
    {
        protected String $table = "baiviet";

        public function postList(){		
            $sqlQuery = "select baiviet.ID_BaiViet, baiviet.TieuDe, baiviet.NgayDang, baiviet.SoLuotThich, theloai.TenTheLoai from ".$this->table." inner join theloai on baiviet.ID_TheLoai = theloai.ID_TheLoai ";
            if(!empty($_POST["search"]["value"])){
                $sqlQuery .= 'where (ID_BaiViet LIKE "%'.$_POST["search"]["value"].'%" ';
                $sqlQuery .= ' OR TieuDe LIKE "%'.$_POST["search"]["value"].'%" ';			
                $sqlQuery .= ' OR AnhDaiDien LIKE "%'.$_POST["search"]["value"].'%" ';
                $sqlQuery .= ' OR baiviet.ID_TheLoai LIKE "%'.$_POST["search"]["value"].'%" ';
                $sqlQuery .= ' OR SoLuotThich LIKE "%'.$_POST["search"]["value"].'%") ';
            }
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Phân trang	
            $numRows = $stmt->rowCount();

            // Chuyển từ dạng [key => value] về dạng [index => value]   
            $postData = array();
            foreach($posts as $post){		
                $postRows = array();			
                $postRows[] = $post['TieuDe'];
                $postRows[] = $post['TenTheLoai'];	
                $date = new DateTime($post['NgayDang']);
                $result = $date->format('d/m/Y');
                if ($result) {
                    $postRows[] = $result;
                } else { // format failed
                    $postRows[] = $post['NgayDang'];
                }
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