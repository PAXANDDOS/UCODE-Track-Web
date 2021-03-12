String.prototype.removeDuplicates = function removeDuplicates() {
    let str = this.replace(/ +(?= )/g,'').trim();
    let arr = str.split(' ');

    str = arr.filter((item, index, arr) => {
        return arr.indexOf(item) === index;
    }).join(' ');

    return str;
};
