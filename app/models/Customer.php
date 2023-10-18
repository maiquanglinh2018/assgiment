<?php
// đặt tên name space sẽ theo quy tắc từ
// thư mục cha \ tên thư mục con
// (và viết hoa chữ cái đầu)
namespace App\Models;
class Customer extends  BaseModel {
    protected $table = "customer";
    // xây hàm truy vấn lấy ra danh sách sản phẩm
    public function getCustomer() {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();//lấy ra nhiều dòng dữ liệu
    }
    //lấy ra 1 dòng sản phẩm theo id đã được truyền vào
    public function getDetailCustomer($id) {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]); // lấy ra 1 dòng dữ liệu
    }
    //xây dựng hàm thêm sản phẩm
    public function addCustomer($id,$name,$age){
        $sql = "INSERT INTO $this->table values (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$name,$age]);
    }
    //xây dựn hàm cập nhập sản phẩm
    public function updateCustomer($id,$name,$age) {
        $sql = "UPDATE $this->table SET name = ?,age = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$name,$age,$id]);
    }
    public function deleteCustomer($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }


}