let word = document.getElementById("word");
let text = document.getElementById("text");
let output = document.getElementById("output");
let phoneSpan = document.getElementById('phone');
let countSpan = document.getElementById('count');
let replaceSpan = document.getElementById('replace');

let phone = 0;
let count = 0;
let replace = 0;

let parsePhone = () => {
    let wordInput = word.value.trim();
    if (validation(wordInput)) 
        return;
    if (wordInput.match(/^\d{10}$/g))
        output.value = `${wordInput.slice(0,3)}-${wordInput.slice(3,6)}-${wordInput.slice(6,10)}`;
    else output.value = 'Invalid phone number.';

    phoneSpan.innerHTML = ++phone;
    document.cookie = `phone=${phone}`;
}

let wordCount = () => {
    let wordInput = word.value.trim();
    let textInput = text.value.trim();
    if (validation(wordInput, textInput)) 
        return;
    if (wordInput.match(/^\w+$/gi))
        output.value = 'Word count: ' + (text.value.match(new RegExp(`${wordInput}`, 'g')) || []).length;
    else output.value = 'Invalid input.';

    countSpan.innerHTML = ++count;
    document.cookie = `count=${count}`;
}

let wordReplace = () => {
    let wordInput = word.value.trim();
    let textInput = text.value.trim();
    if (validation(wordInput, textInput)) 
        return;
    if (wordInput.match(/^\w+$/gi))
        output.value = textInput.replace(/\S+/g, wordInput);
    else output.value = 'Invalid input.';

    replaceSpan.innerHTML = ++replace;;
    document.cookie = `replace=${replace}`;
}

let validation = (wordInput, textInput) => {
    if (word.value === '' || wordInput.length === 0) {
        alert('Word input is empty. Try to input something in "Word input".');
        return true;
    }
    if (textInput !== undefined && (text.value === '' || textInput.length === 0)) {
        alert('Text iInput is empty. Try to input something in "Text input".');
        return true;
    }
    return false;
}

let setCookies = () => {
    phone = 0, count = 0, replace = 0;
    document.cookie = `phone=0`, document.cookie = `count=0`, document.cookie = `replace=0`;
    word.value = '', text.value = '', output.value = '';
    updateCounters();
}
let getCookies = () => {
    return document.cookie.split(';').reduce((res, c) => {
        const [key, val] = c.trim().split('=').map(decodeURIComponent);
        try {
            return Object.assign(res, { [key]: JSON.parse(val) });
        } catch (e) {
            return Object.assign(res, { [key]: val });
        }
    }, {});
}
let updateCounters = () => {
    phoneSpan.innerText = phone;
    countSpan.innerText = count;
    replaceSpan.innerText = replace;
}

let cookies = getCookies()
if (cookies.phone === undefined)
    setCookies();
else {
    phone = cookies.phone;
    count = cookies.count;
    replace = cookies.replace;
    updateCounters();
}
setInterval(setCookies, 60000);
