function copyObj(obj) {
    let copy = {};
    for(let value in obj)
        copy[value] = obj[value];
    return copy;
}
