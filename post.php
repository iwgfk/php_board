<?php
    include "mysqlConnect.php";

    $title = $_POST['title'];
    $name = $_POST['name'];
    $content = $_POST['content'];
   
    
    $title = mysqli_real_escape_string($connect, $title);
    $name = mysqli_real_escape_string($connect, $name);
    $content = mysqli_real_escape_string($connect, $content);
    $regdate = date("Y-m-d H:i:s");
   
    if(isset($_POST['lock']) ){
        $password = password_hash(mysqli_real_escape_string($connect, $_POST['pw']), PASSWORD_DEFAULT);
        $sql = "insert into php_board(title, name, content, regdate, pwd) values('$title', '$name', '$content', '$regdate', '$password')";
    }else{
        $sql = "insert into php_board(title, name, content, regdate) values('$title', '$name', '$content', '$regdate')";
    }
    mysqli_query($connect, $sql);
?>

<script>
    location.href="list.php";
</script>