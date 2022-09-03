window.onload = () => {
    $.get("list-json.php", (data) => {
        // 注意通过 Ajax 获取到的数据类型可能为 text/plain 或 text/html，需要使用 eval 将其转为 JS 对象
        // 如果数据类型为 application/json，则不需要使用 eval
        data = eval(data);
        let content = "";

        data.forEach(article => {
            content += "<tr>";
            // content += "<td>" + article.articleid + "</td>";
            content += "<td>" + article["articleid"] + "</td>";
            content += "<td>" + article["author"] + "</td>";
            content += "<td>" + article["headline"] + "</td>";
            content += "<td>" + article["viewcount"] + "</td>";
            content += "<td>" + article["createtime"] + "</td>";
            content += "<td><button>删除</button></td>";
            content += "</tr>";
        });
        $("#articleBody").append(content);
    });
}