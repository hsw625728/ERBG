<?php
if(isset($_POST["registersubmit"]) && $_POST["registersubmit"] == "Register")
{
$username = trim($_POST["username"]);
$password = md5(trim($_POST["password"]));
$confirm = md5(trim($_POST["confirm"]));

    if($username == "" || $password == "" || $confirm == "")
    {
        echo "<script>alert('输入有误！');history.go(-1);</script>";
    }
    else
    {
        if($password == $confirm)
        {
            $conn = mysqli_connect("localhost", "", "");
            if(mysqli_errno($conn))
            {
                echo mysqli_errno($conn);
                exit;
            }
            else
            {
                mysqli_select_db($conn, "erbgalpha");
                mysqli_set_charset($conn, "utf8");
                $sql = "select username from erbg_user where username='$username'";
                $result = mysqli_query($conn, $sql);
                if($result)
                {
                    $num = mysqli_num_rows($result);
                    if($num)
                    {
                        echo "<script>alert('该账号已经注册过！');history.go(-1);</script>";
                    }
                    else
                    {
                        $ip = ip2long($_SERVER['REMOTE_ADDR']);
                        $time = time();
                        $sql_insert = "insert into erbg_user(username, password, createtime, createip) value ('$username', '$password', $time, $ip)";
                        $result_insert = mysqli_query($conn, $sql_insert);
                        if($result_insert)
                        {
                            echo "<script>alert('注册成功！');history.go(-1);</script>";
                        }
                        else
                        {
                            echo "<script>alert('数据库繁忙！');history.go(-1);</script>";
                        }
                    }
                }
                else
                {
                    echo "<script>alert('查询失败！');history.go(-1);</script>";
                }
            }
        }
        else
        {
            echo "<script>alert('密码不一致！');history.go(-1);</script>";
        }
    }
}
else
{
    echo "<script>alert('提交注册失败！');history.go(-1);</script>";
}
?>