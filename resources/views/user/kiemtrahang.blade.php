<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        main {
            min-height: calc(100vh - 140px); /* 140px là tổng chiều cao của header và footer */
            overflow-y: auto; /* Thêm thanh cuộn khi nội dung vượt quá chiều cao tối thiểu */
        }

        nav {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav li {
            display: inline;
            margin: 0 13px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-size: 13px;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
        }

        main {
            min-height: calc(100vh - 140px);
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            
            bottom: 0;
            width: 100%;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .nut {
            border-radius: 5px;
            color: aqua;
            background-color: rgb(24, 1, 1);
        }

        .new-comment-container {
            background-color: #fff;
            border: 1px solid #ddd;
            margin: 10px;
            padding: 10px;

        }

        .new-comment-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ccc;
        }

        .new-comment-input {
            flex-grow: 1;
            margin-left: 20px;
        }

        .new-comment-input textarea {
            width: 400px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .new-comment-button {
            margin-top: 15px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            margin-right:550px;
            width: 70px;
            height: 30px;
            margin-left: 20px;
        }

        .new-comment-button:hover {
            background-color: #0056b3;
        }

        .comment-container {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            display: flex;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ccc;
            display: inline-block;
            align-self: flex-start;
        }

        .comment-content {
            display: inline-block;
            margin-left: 10px;
            flex-grow: 1;
        }

        .user-name {
            font-weight: bold;
            margin-top: 0;
        }

        .comment-actions {
            margin-top: 10px;
        }

        .comment-actions a {
            text-decoration: none;
            margin-right: 10px;
            color: #333;
        }

        .comment-actions a:hover {
            text-decoration: underline;
        }

        .comment-image {
            max-width: 100%;
            height: auto;
        }

        .like-icon {
            cursor: pointer;
        }

        .liked {
            font-weight: bold;
        }

        .reply-input {
            display: none;
        }

        .reply-button {
            cursor: pointer;
            color: blue;
        }

        .add-image-button {
            cursor: pointer;
            color: blue;
        }

        .add-image-section {
            display: none;
        }

        .comment-textarea {
            width: 40%;
            height: 60px;
        }
        .comment-text {
            margin-top: 5px;
            }
        .comment-image {
            height: 150px;
        }
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.custom-table {
    border-collapse: collapse;
    width: 80%;
    margin: 20px auto;
}

.custom-table th, .custom-table td {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
}

.custom-table th {
    background-color: #007bff;
}

.custom-table td:nth-child(odd) {
    background-color: #0056b3;
}

.custom-table td:nth-child(even) {
    background-color: #0088e0;
}

.custom-table th:first-child {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
}

.custom-table th:last-child {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}

    </style>

</head>
<body>
<nav>
    <div class="container">
        <ul>
       
            <li><a href="#">Nền tảng</a></li>
            <li><a href="{{asset("trang chu")}}">Trang chủ</a></li>
            <li><a href="#">Quản trị</a></li>
            <li><a href="#">Sản phẩm</a></li>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Liên hệ</a></li>
            <li>
                <input type="text" placeholder="Tìm kiếm">
                <button class="nut">Tìm kiếm</button>
            </li>
            <li><a href="#">Giỏ hàng</a></li>
            <li><a href="#">Đăng nhập</a></li>
        </ul>
    </div>
</nav>
<main>
    
    <table class="custom-table">

        <tr>
            <th>Fullname</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>

            {{-- <th>Fullname</th> --}}

            <th>Số điện thoại</th>
            <th>Gmail</th>
            <th>Địa chỉ</th>
            <th>Ghi chú</th>
            <th>Trạng thái</th>
            <th>Đổi thông tin</th>
            <th>Hủy đơn hàng</th>
        </tr>
        @foreach ($orders as $pro_item)
                

        <tr>
            <td>{{$pro_item->order_name}} </td>
            <td>{{$pro_item->product_name}} </td>
            {{-- <td>{{$pro_item->order_receiver}} </td> --}}
            <td>{{$pro_item->order_total}} </td>

            <td>{{$pro_item->order_phone}} </td>
            <td>{{$pro_item->order_gmail}} </td>
            <td>{{$pro_item->oder_address}} </td>
            <td>{{$pro_item->order_note}} </td>
            <td>
                @if ($pro_item->order_status == 0)
                    Đơn hàng đang được xử lý
                @else
                    Đơn hàng đang gửi đến bạn
                @endif
            </td>
            
            <td>
             
                <input type="submit" value="Sửa" onclick="showEditTable()">
    
            </td>
            <td>
               <a href="{{URL::to('/Xoa-order/'.$pro_item->order_id )}}">
                    <button type="submit">Hủy Đơn</button>
                </a>
            </td>
        </tr>
       
        @endforeach
    </table>
    
    <table class="edit-table" style="display: none; margin: 0 auto;">
        <tr>
            <th>Fullname</th>
            <th>Số điện thoại</th>
            <th>Gmail</th>
            <th>Địa chỉ</th>
            <th>Ghi chú</th>
            <th></th>
        </tr>
        @foreach ($orders as $pro_item)
        <tr>
            <form action="{{ url("/sua-thong-tin") }}" method="POST">
                @csrf
                   <input type="hidden" id="order_id" name="order_id" value="{{ $pro_item->order_id }}">

                <td>
                    <input type="text" id="order_id" name="name" value="{{ $pro_item->order_name }}">
                </td>
                <td>
                    <input type="text" id="phone" name="phone" value="{{ $pro_item->order_phone }}">
                </td>
                <td>
                    <input type="text" id="email" name="email" value="{{ $pro_item->order_gmail }}">
                </td>
                <td>
                    <input type="text" id="address" name="address" value="{{ $pro_item->oder_address }}">
                </td>
                <td>
                    <input type="text" id="note" name="note" value="{{ $pro_item->order_note }}">
                </td>
               
                <td>
                    <input type="submit" value="Lưu">
                </td>
            </form>
        </tr>
        @endforeach
    </table>
    
    
    
</main>
<footer>
    <div class="container">
        &copy; 2023 Tên Công Ty - Tất cả quyền đã được bảo lưu.
    </div>
</footer>
</body>

<script>

function showEditTable() {
const editTable = document.querySelector(".edit-table");
editTable.style.display = "table";
}



document.querySelector("input[value='sua']").addEventListener("click", showEditTable);

    function toggleReplyInput(commentId) {
        var replyInput = document.getElementById(commentId + "-reply-input");
        var replyButton = document.getElementById(commentId + "-reply-button");
        if (replyInput.style.display === "none") {
            replyInput.style.display = "block";
            replyButton.style.color = "gray";
        } else {
            replyInput.style.display = "none";
            replyButton.style.color = "blue";
        }
    }

    

    function toggleLike(commentId) {
        var likeIcon = document.getElementById(commentId + "-like-icon");
        likeIcon.classList.toggle('liked');
    }

    function postNewComment() {
        var newCommentText = document.getElementById("new-comment-text").value;
        if (newCommentText.trim() === "") {
            return;
        }
        var commentContainer = document.createElement("div");
        commentContainer.className = "comment-container";
        var userAvatar = document.createElement("div");
        userAvatar.className = "user-avatar";
        var commentContent = document.createElement("div");
        commentContent.className = "comment-content";
        var userName = document.createElement("div");
        userName.className = "user-name";
        userName.appendChild(document.createTextNode("Tôi"));
        var commentTextarea = document.createElement("textarea");
        commentTextarea.className = "comment-textarea";
        commentTextarea.value = newCommentText;
        commentContent.appendChild(userName);
        commentContent.appendChild(commentTextarea);
        var commentActions = document.createElement("div");
        commentActions.className = "comment-actions";
        var likeLink = document.createElement("a");
        likeLink.className = "like-icon";
        likeLink.id = "new-comment-like-icon";
        likeLink.onclick = function () {
            toggleLike("new-comment");
        };
        likeLink.innerHTML = '<i class="fa fa-thumbs-up"></i> Like';
        var replyButton = document.createElement("a");
        replyButton.className = "reply-button";
        replyButton.id = "new-comment-reply-button";
        replyButton.onclick = function () {
            toggleReplyInput("new-comment");
        };
        replyButton.appendChild(document.createTextNode("Reply"));
        var addImageButton = document.createElement("a");
        addImageButton.className = "add-image-button";
        addImageButton.id = "new-comment-add-image-button";
        addImageButton.onclick = function () {
            toggleAddImageSection("new-comment");
        };
        addImageButton.appendChild(document.createTextNode("Thêm ảnh"));
        var deleteButton = document.createElement("a");
        deleteButton.className = "reply-button";
        deleteButton.appendChild(document.createTextNode("Xóa"));
        deleteButton.onclick = function () {
            commentContainer.style.display = "none";
        };
        commentActions.appendChild(likeLink);
        commentActions.appendChild(replyButton);
        commentActions.appendChild(addImageButton);
        commentActions.appendChild(deleteButton);
        var addImageSection = document.createElement("div");
        addImageSection.className = "add-image-section";
        addImageSection.id = "new-comment-add-image-section";
        addImageSection.style.display = "none";
        var input = document.createElement("input");
        input.type = "file";
        input.accept = "image/*";
        input.className = "choose-file-button";
        input.onchange = function () {
            // Thêm xử lý tải ảnh lên ở đây nếu cần
        };
        addImageSection.appendChild(input);
        var replyInput = document.createElement("div");
        replyInput.className = "reply-input";
        replyInput.id = "new-comment-reply-input";
        replyInput.style.display = "none";
        var replyTextarea = document.createElement("textarea");
        replyTextarea.placeholder = "Add a comment...";
        var replySubmitButton = document.createElement("button");
        replySubmitButton.appendChild(document.createTextNode("Submit"));
        replyInput.appendChild(replyTextarea);
        replyInput.appendChild(replySubmitButton);
        commentContainer.appendChild(userAvatar);
        commentContainer.appendChild(commentContent);
        commentContainer.appendChild(commentActions);
        commentContainer.appendChild(addImageSection);
        commentContainer.appendChild(replyInput);

        // Tìm comment container cuối cùng và chèn bình luận mới vào sau nó
        var commentContainers = document.getElementsByClassName("comment-container");
        if (commentContainers.length > 0) {
            commentContainers[commentContainers.length - 1].insertAdjacentElement("afterend", commentContainer);
        } else {
            // Nếu không có bình luận nào, chèn vào sau phần new-comment-container
            var newCommentContainer = document.getElementsByClassName("new-comment-container")[0];
            newCommentContainer.insertAdjacentElement("afterend", commentContainer);
        }

        document.getElementById("new-comment-text").value = "";
    }
</script>
</html>
