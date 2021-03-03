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
                    <form action="">
                        <input type="text" name="API" placeholder="nhap vao day">
                        <button type="submit" name="submit">submit</button>
                    </form>
                </div>
                <div class="toDoList">
                    <div class="listItem border">
                        <div class="TitleToDo">
                            <p class="demo"></p>
                        </div>
                        <button class="active">done</button>
                        <button class="delete">delete</button>
                    </div>
                    <div class="listItem border">
                        <div class="TitleToDo">
                            <p class="demo"></p>
                        </div>
                        <button class="active">done</button>
                        <button class="delete">delete</button>
                    </div>
                    <div class="listItem border">
                        <div class="TitleToDo">
                            <p class="demo"></p>
                        </div>
                        <button class="active">done</button>
                        <button class="delete">delete</button>
                    </div>
                    <div class="listItem border">
                        <div class="TitleToDo">
                            <p class="demo"></p>
                        </div>
                        <button class="active">done</button>
                        <button class="delete">delete</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
<script>
 fetch('https://jsonplaceholder.typicode.com/posts')
  .then((response) => response.json())
  .then((json) => myFunction(json));
  function myFunction(arr){
     text="";
    for (i = 0; i < arr.length; i++) {
  text = arr[i].title + "<br>";
  document.getElementsByClassName("demo")[i].innerHTML=text;
}

 }
 
</script>
   
</body>

</html>