function post() {
    // 获取表单元素的值
    let username = $("#username").val();
    let password = $("#password").val();
    let code = $("#code").val();

    // 通过字符串的方式
    let param = "username=" + username + "&password=" + password + "&code=" + code;

    // 利用 Ajax 发送 POST 请求，并和获取响应
    $.post("login.php", param, (data) => {
        $("#username").val(data);
    });
}