<?php
session_start();
if(isset($_POST["loginsubmit"]) && $_POST["loginsubmit"] == "Sign in")
{
$username = trim($_POST["username"]);
$password = md5(trim($_POST["password"]));
    if($username == "" || $password == "")
    {
        echo "<script>alert('请输入用户名和密码！');history.go(-1);</script>";
    }
    else
    {
        $conn = mysqli_connect("localhost", "", "");
        if(mysqli_errno($conn))
        {
            echo mysqli_errno($conn);
            exit;
        }
    }
    mysqli_select_db($conn, "erbgalpha");
    mysqli_set_charset($conn, "utf8");
    $sql = "select username, password from erbg_user where username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num)
    {
        echo "<script>alert('登录成功！'); window.location.href='http://mengyoutu.cn/erbg';</script>";
    }
    else
    {
        echo "<script>alert('用户名密码不正确!');history.go(-1);</script>";
    }
}
else
{
    echo "<script>alert('提交不成功 ！');</script>";
}
?>