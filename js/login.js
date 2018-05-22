function init(){
    if(loginform.username.value=="")
    {
        alert('用户名不能为空！');
        loginform.username.focus();
        return false;
    }
    if(loginform.password.value=="")
    {
        alert('密码不能为空！');
        loginform.password.focus();
        return false;
    }
}