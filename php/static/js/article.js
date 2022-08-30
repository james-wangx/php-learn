/**
 * 登录
 */
function login() {
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


/**
 * 注册
 */
function register() {
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


/**
 * 删除文章
 *
 * @param articleId 文章 ID
 */
function deleteArticle(articleId) {
    if (!window.confirm("你确认要删除这篇文章吗？")) {
        return;
    }

    $.post("delete.php", "articleid=" + articleId, (data) => {
        if (data === "delete-ok") {
            window.alert("删除成功");
            location.reload();
        } else {
            window.alert("删除失败");
        }
    });
}