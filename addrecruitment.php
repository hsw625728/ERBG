<?php
if(isset($_POST["submit"]) && $_POST["submit"] == "submit")
{
    $title = $_POST["title"];
    $location = $_POST["location"];
    $department = $_POST["department"];
    $deadline = $_POST["deadline"];
    $description = $_POST["description"];
    $salary = $_POST["salary"];
    $jobdescription = $_POST["jobdescription"];
    $jobqualification = $_POST["jobqualification"];
    $otherdescription = $_POST["otherdescription"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];

    if($title == "")
    {
        echo "<script>alert('职位不能为空！');history.go(-1);</script>";
    }
    else
    {
        $conn = mysqli_connect("localhost", "", "");
        if(mysqli_errno($conn))
        {
            echo "<script>alert('数据库连接失败！');history.to(-1);</script>";
            exit;
        }
    }
    mysqli_select_db($conn, "erbgalpha");
    mysqli_set_charset($conn, "utf8");
    $sql = "INSERT INTO erbg_recruitment(title, location, department, deadline, description, salary, jobdescription, jobqualification, otherdescription, email, telephone) VALUE('$title', '$location', '$department', '$deadline', '$description', '$salary', '$jobdescription', '$jobqualification', '$otherdescription', '$email', '$telephone')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        echo "<script>alert('添加成功！');history.to(-1);</script>";
    }
    else
    {
        echo "<script>alert('添加失败！');history.to(-1);</script>";
    }
}
else
{
        echo "<script>alert('连接失败！');history.go(-1);</script>";
}
?>