<?php
class navigation extends Controller
{
    private CategoryModel $categoryModel;

    public function __construct()
    {
        $this->categoryModel = $this->model("CategoryModel");
    }

    public function index()
    {
        $navigation = $this->categoryModel->getAllData("ID_CTTheLoai, TenCTTheLoai", NULL, NULL, true, 10);
        return $navigation;
    }

    public function format_navigation($navigation) {
       
    }
}