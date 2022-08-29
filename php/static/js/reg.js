function reg() {
    let username = $("#username").val();
    let password = $("#password").val();
    let password2 = $("#password2").val();
    let params = "username=" + username + "&password=" + password + "&password2=" + password2;

    $.post("reg.php", params, (data) => {
        if (data === "reg-pass") {
            window.alert("注册成功！");
            location.href = "login-ajax.html";
        } else if (data === "password-error") {
            window.alert("密码不正确！");
        } else if (data === "user-exists") {
            window.alert("用户名已经注册！");
        } else {
            window.alert("注册失败！");
        }
    });
}