<?php
namespace App\Controllers;
use App\Models\Product;
class ProductController extends BaseController {
    public $product;
    public function __construct() {
//        echo "Đây là product controller";
        $this->product = new Product();
    }
    public function index() {
       $products = $this->product->getProduct();
       $title = "ABC";
       $header = "Đây là trang danh sách product";
       return $this->render('product.index',compact('title','header','products'));
    }
    public function add() {
        return $this->render('product.add');
    }
    public function postProduct() {
        if (isset($_POST['add']) ){
            // validate tạo ra 1 mảng rỗng để chứa lỗi
            $errors = [];
            //nếu như bỏ trống tên sản phẩm
            if (empty($_POST['ten_sp'])) {
                // push lỗi vào trong mảng errors
                $errors[] = "Bạn không được để trống tên sản phẩm";
            }
            // nếu như bỏ trống đơn giá
            if (empty($_POST['gia'])) {
                // push lỗi vào mảng errors
                $errors[] = "Bạn không được để trống lỗi";
            }
            if (count($errors) > 0) { //có lỗi
                flash('errors',$errors,'add-product');
            } else {
                $result = $this->product->addProduct(NULL,$_POST['ten_sp'],$_POST['gia']);
                if ($result) {
                    flash('success',"Thêm thành công sp",'add-product');
                }
            }

        }
        // khi nào ấn submit dữ liệu sẽ gửi vào trong này
    }
    public function detailProduct($id) {
       $product =  $this->product->getDetailProduct($id);
       return $this->render('product.edit',compact('product'));
    }
    public function updateProduct($id){
        if(isset($_POST['edit'])){
            $result = $this->product->updateProduct($id, $_POST['ten_sp'], $_POST['gia']);
            if ($result){
                flash('success', 'Sửa thành công', 'list-product');
            }
        }
    }

    public function deleteProduct($id)
    {
        $this->model->deleteProduct($id);
        return header("Location:" . BASE_URL . "list-product");
    }

}