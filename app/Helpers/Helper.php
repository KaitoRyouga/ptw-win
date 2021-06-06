<?php
const BASE_URL = 'https://ptw.devf.tech/';
function uploadFile($file, $path): string
{
    $base_folder = 'admin/img';

    //  Lấy tên file
    $name = explode('.', $file['name']);
    $file_name = explode('/', $file['name'])[count(explode('/', $file['name'])) - 1];
    $file_name_insert = str_replace(end($name), '', $file_name) . end($name);

    //  Lấy đường dẫn file
    $dir_name = $path . '/' . date('Y') . '/' . date('m') . '/' . date('d') ;

    //  Kiểm tra nếu mà folder chứa ảnh cho ngày hiện tại mà chưa có thì tạo mới
    if (!is_dir($base_folder . '/' . $dir_name)) {
        // Tạo thư mục của chúng tôi nếu nó không tồn tại
        mkdir($base_folder . '/' . $dir_name, 0755, true);
    }
    move_uploaded_file($file['tmp_name'], $base_folder . '/' . $dir_name . '/' . $file_name_insert);
    return $dir_name . '/' . $file_name_insert;
}
function deleteFile($file) {
     $base_folder='admin/img';
     $filename = $base_folder.'/'.$file;
     unlink($filename);
}