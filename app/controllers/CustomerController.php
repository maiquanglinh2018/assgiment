<?php
namespace App\Controllers;
use App\Models\Customer;

class CustomerController extends BaseController {
    public $customer;
    public function __construct() {
//        echo "Đây là Customer controller";
        $this->customer = new Customer();
    }
    public function index() {
        $customers = $this->customer->getCustomer();
        $title = "ABC";
        $header = "Đây là trang danh sách customer";
        return $this->render('customer.index',compact('title','header','customers'));
    }
    public function add() {
        return $this->render('customer.add');
    }
    public function postCustomer() {
        if (isset($_POST['add']) ){
            // validate tạo ra 1 mảng rỗng để chứa lỗi
            $errors = [];
            //nếu như bỏ trống tên sản phẩm
            if (empty($_POST['name'])) {
                // push lỗi vào trong mảng errors
                $errors[] = "Bạn không được để trống tên sản phẩm";
            }
            // nếu như bỏ trống đơn giá
            if (empty($_POST['age'])) {
                // push lỗi vào mảng errors
                $errors[] = "Bạn không được để trống lỗi";
            }
            if (count($errors) > 0) { //có lỗi
                flash('errors',$errors,'add-customer');
            } else {
                $result = $this->customer->addCustomer(NULL,$_POST['name'],$_POST['age']);
                if ($result) {
                    flash('success',"Thêm thành công sp",'add-customer');
                }
            }

        }
        // khi nào ấn submit dữ liệu sẽ gửi vào trong này
    }
    public function detailCustomer($id) {
        $customer =  $this->customer->getDetailCustomer($id);
        return $this->render('customer.edit',compact('customer'));
    }
    public function updateCustomer($id){
        if(isset($_POST['edit'])){
            $result = $this->customer->updateCustomer($id, $_POST['name'], $_POST['age']);
            if ($result){
                flash('success', 'Sửa thành công', 'list-product');
            }
        }
    }

    public function deleteCustomer($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

}