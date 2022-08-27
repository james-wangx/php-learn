let result = document.querySelector("#result div");

// 键盘输入
document.addEventListener('keydown', (evt) => {
    let key = evt.key;
    switch (key) {
        case "Enter":
            calc();
            break;
        case "Escape":
            result.style = "outline-width: 0;";
            clean();
            break;
        case "Backspace":
            back();
            break;
        default:
            if ("+-*/%.".indexOf(key) !== -1) {
                result.style = "outline: solid 2px red;";
                if (key === '*') {
                    clickOperator('×');
                } else if (key === "/") {
                    clickOperator('÷');
                } else {
                    clickOperator(key);
                }
            } else if (/^[0-9]$/.test(key)) {
                result.style = "outline: solid 2px red;";
                clickNumber(key);
            }
            break;
    }
});

// Enter 键快捷输入
document.addEventListener('keypress', (evt) => {
    if (evt.key === "Enter")
        // result.blur() 取消聚焦
        result.focus();
})

/**
 * 在结果框显示数字
 * @param number 传入的数字
 */
function clickNumber(number) {
    result.innerText += number;
}

/**
 * 在结果框显示运算符
 * @param operator 传入的运算符
 */
function clickOperator(operator) {
    let expression = result.innerText;
    let len = expression.length;
    let last = expression[len - 1];

    // 禁止连续输入符号
    if (expression === "" && ("+×÷%.".indexOf(operator) !== -1))
        return;
    else if ("+-×÷%.".indexOf(last) !== -1)
        return;

    result.innerText += operator;
}

/**
 * 计算并显示结果
 */
function calc() {
    let expression = result.innerText;
    let newExpression = "";
    let char = ""

    // 替换符号：* => ×, ÷ => /
    for (let i = 0; i < expression.length; i++) {
        char = expression[i];
        if (char === "÷")
            char = "/"
        else if (expression[i] === "×")
            char = "*"
        newExpression += char
    }

    result.innerText = eval(newExpression);
}

/**
 * 清空结果
 */
function clean() {
    result.innerText = null;
}

/**
 * 删除一个字符或数字
 */
function back() {
    let expression = result.innerText;
    let len = expression.length;
    result.innerText = expression.substring(0, len - 1);
}