<?php
    class AdminCategoryModel extends Model
    {
        protected String $table = "theloai";

        public function executeIndexQuery() {
            $sql = "select theloai.ID_TheLoai, theloai.TenTheLoai, chitiettheloai.ID_CTTheLoai, chitiettheloai.TenCTTheLoai, chitiettheloai.NgayTao, theloai.NgayKhoiTao, theloai.HienThiCha, chitiettheloai.HienThiCon from chitiettheloai left join theloai on theloai.ID_TheLoai = chitiettheloai.ID_TheLoai union select theloai.ID_TheLoai, theloai.TenTheLoai, chitiettheloai.ID_CTTheLoai, chitiettheloai.TenCTTheLoai, chitiettheloai.NgayTao, theloai.NgayKhoiTao, theloai.HienThiCha, chitiettheloai.HienThiCon from chitiettheloai right join theloai ON theloai.ID_TheLoai = chitiettheloai.ID_TheLoai;";
            $categoriesQuery = $this->queryGetData($sql, null, null, true, 100);
            $query = $this->conn->prepare($categoriesQuery);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function executeAddQuery() {
            $sql = "select theloai.TenTheLoai, theloai.ID_TheLoai from chitiettheloai right join theloai on chitiettheloai.ID_TheLoai = theloai.ID_TheLoai";
            $categoriesQuery = $this->queryGetData($sql, null, null, true, 100);
            $query = $this->conn->prepare($categoriesQuery);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>