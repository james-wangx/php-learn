function post() {
    // 获取表单元素的值
    let username = $("#username").val();
    let password = $("#password").val();
    let code = $("#code").val();

    // 通过字符串的方式
    let params = "username=" + username + "&password=" + password + "&code=" + code;

    // 利用 Ajax 发送 POST 请求，并和获取响应
    $.post("login.php", params, (data) => {
        switch (data) {
            case "login-pass":
                window.alert("登录成功！");
                location.href = "list.php";
                break;
            case "username-error":
                window.alert("用户不存在！");
                location.reload();
                break;
            case "password-error":
                window.alert("密码错误！");
                location.reload();
                break;
            case "code-error":
                window.alert("验证码错误！");
                location.reload();
                break;
            default:
                window.alert("未知错误！");
                location.reload();
                break;
        }
    });
}