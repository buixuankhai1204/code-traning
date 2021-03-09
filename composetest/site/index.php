<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    
    <div id="wrapper">
        <p id="demo"></p>
        <header>
            <div class="bg-menu">
                <div class="menu flex container ">
                    <div class="menuList Home flexItem">Home</div>
                    <div class="menuList Category flexItem">Category</div>
                    <div class="menuList News flexItem">News</div>
                    <div class="menuList about flexItem">About</div>
                    <div class="menuList Contact flexItem">Contact</div>
                </div>
            </div>

            <div class="banner">
                <img src="images/slider.jpg" alt="">
                <div class="textBanner">
                    <div class="titleBanner">FADO.COM</div>
                    <div class="textSmallBanner">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus optio non veritatis velit natus sint et, suscipit totam fugit fuga doloremque, rem, ratione deleniti voluptates quis mollitia maxime maiores ab!</div>
                </div>
            </div>
        </header>
        <div id="body">
            <div id="sideBarLeft">
                <div class="category border">
                    <div class="titleCategory border-b">
                        <p>
                            Danh muc(todo list)
                        </p>
                    </div>
                    <div class="contentCategory">
                        <p>All</p>
                        <p>Done(gia trang thai active)</p>
                        <p>Undone</p>
                    </div>

                </div>
                <div class="newPost border">
                    <div class="titleCategory border-b">
                        <p>
                            Danh muc(todo list)
                        </p>
                    </div>
                    <div class="contentCategory">
                        <p>-bai viet 1</p>
                        <p>-bai viet 2</p>
                        <p>-bai viet 3</p>
                    </div>
                </div>
            </div>
            <div id="content">
                <div class="form">
                    <form action="" method="POST">
                        <input id="nameItem" type="text" name="nameItem" value="">
                        <button type="submit" name="submit" id="submit">submit</button>
                    </form>
                </div>
                <div class="toDoList">

                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var result1 = "";
        var btnIdDel = 0;
        $.ajax({
            type: "GET",
            url: "http://localhost:8081/get.php",

            contentType: "application/json",
            cache: false,
            dataType: "json",
            success: function(result) {

                for (i = 0; i < result['data'].length; i++) {
                    if (!(result['data'][i])) {
                        i++;
                    }
                    result1 += '<div class="listItem border">' +
                        '<div class="TitleToDo">' +
                        '<p class="demo">' + result['data'][i]['name'] + '</p>' +
                        '</div>' +
                        '<button type="button" value="' + result['data'][i]['status'] + '" id="active">' + 'done' + '</button>' +
                        '<button type="button" value="' + i + '">' + 'delete' + '</button>' +
                        '</div>'

                }
                $(".toDoList").html(result1);
            }
        });


        $("#submit").click(function() {
            var nameItem = $("#nameItem").val();
            var data = {
                nameItem: nameItem
            }

            $.ajax({
                type: "POST",
                url: "http://localhost:8081/post.php",
                contentType: "application/x-www-form-urlencoded",
                data: data,
                cache: false,
                dataType: "json",
                success: function(result) {
                    if (result['status_code'] == 200) {
                        location.reload();
                    }
                }
            });
        });
        $('.toDoList').on("click", 'button', function() {
            abc = $(this).val();
            var data = {
                arraId: abc,
            };
            $.ajax({

                type: "POST",
                url: "http://localhost:8081/delete.php",
                contentType: "application/x-www-form-urlencoded",
                cache: true,
                data: data,
                dataType: "json",
                success: function(result) {
                    if (result['status_code'] == 200) {
                        location.reload();

                    }
                }
            });
        });


        $('.toDoList').on("click", '#active', function() {
            abc = $(this).val();
            var data = {
                arraVal: abc,
            };
            $.ajax({
                type: "POST",
                url: "http://localhost:8081/change.php",
                contentType: "application/x-www-form-urlencoded",
                cache: false,
                data: data,
                dataType: "json",
                success: function(result) {
                    if (result['status_code'] == "200") {
                        location.reload();
                    }
                }
            });
        });
    });
</script>

</html>