<?php 
    namespace Model;
    interface IModelCRUD{
        // thêm
        public function Post($item);
        // sửa
        public function Put($item);
        // xem
        public function Get();
        public function GetById($id);
        // xem
        public function GetPaging($params,$pageIndex
        ,$pageNumber, &$totalRows);
        // xóa = xóa trong database
        public function Delete($id);
        // xóa == không hiển thị
        public function Remove($id);
    }

?>