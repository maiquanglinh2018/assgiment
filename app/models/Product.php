<?php
// đặt tên name space sẽ theo quy tắc từ
// thư mục cha \ tên thư mục con
// (và viết hoa chữ cái đầu)
namespace App\Models;
class Product extends  BaseModel {
    protected $table = "product";
    // xây hàm truy vấn lấy ra danh sách sản phẩm
    public function getProduct() {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();//lấy ra nhiều dòng dữ liệu
    }
    //lấy ra 1 dòng sản phẩm theo id đã được truyền vào
    public function getDetailProduct($id) {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]); // lấy ra 1 dòng dữ liệu
    }
    //xây dựng hàm thêm sản phẩm
    public function addProduct($id,$tenSP,$gia){
        $sql = "INSERT INTO $this->table values (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$tenSP,$gia]);
    }
    //xây dựn hàm cập nhập sản phẩm
    public function updateProduct($id,$tenSP,$gia) {
        $sql = "UPDATE $this->table SET ten_sp = ?,gia = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$tenSP,$gia,$id]);
    }
    // xây dựng hàm xóa sản phẩm
}