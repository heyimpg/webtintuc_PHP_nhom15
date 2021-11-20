<?php
class navigation extends Controller
{
    private CategoryModel $categoryModel;

    public function __construct()
    {
        $this->categoryModel = $this->model("CategoryModel");
    }

    public function getMenu()
    {
        $menu = $this->categoryModel->getAllData("ID_TheLoai, TenTheLoai", NULL, NULL, true, 10);
        return $menu;
    }

    public function getSubMenu() {
        $this->categoryModel->setupSecondTable("chitiettheloai", "ID_TheLoai");
        $sub_menu = $this->categoryModel->getAllDatafromMultiTable(
            $this->categoryModel->getTable().".ID_TheLoai,ID_CTTheLoai, TenCTTheLoai"
        );
        return $sub_menu;
    }
}