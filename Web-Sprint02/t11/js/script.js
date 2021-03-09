//function to clean arr
let cleanArr = (x) => {
    let arr = []
    for (let i = 0; i < x.length; i++) {
        if (x[i]) {
            arr.push(x[i])
        }
    }
    let secarr = [];
    for (let i = 0; i < arr.length; i++) {
        let current = arr[i];
        if (!~secarr.indexOf(current)) {
            secarr.push(current)
        }
    }
    return secarr
}

//function to add words

let addWords = (obj, wrds) => {
    let addArr = Object.values(obj)
    addArr = String(addArr)
    addArr = addArr + " " + wrds
    addArr = addArr.split(" ")
    addArr = cleanArr(addArr)
    obj["words"] = addArr.join(" ")
    return obj
}

//function to remove words

let removeWords = (obj, wrds) => {
    let rem = Object.values(obj)
    rem = String(rem)
    rem = rem.split(" ")
    rem = cleanArr(rem)
    let rems = cleanArr(wrds.split(" "))

    for (let i = 0; i < rems.length; i++) {
        let elem = rems[i]
        let index = rem.indexOf(elem)
        if (index > -1) {
            rem.splice(index, i)
        }
    }
    obj["words"] = rem.join(" ")
    return obj
}

//function to changee words

let changeWords = (obj, wrds, newwords) => {
    let changeArr = Object.values(obj)
    changeArr = String(changeArr)
    changeArr = changeArr.split(" ")
    changeArr = cleanArr(changeArr)
    let news = cleanArr(newwords.split(" "))
    let olds = cleanArr(wrds.split(" "))

    for (let i = 0; i < olds.length; i++) {
        let elem = olds[i]
        let index = changeArr.indexOf(elem)
        if (index > -1) {
            changeArr.splice(index, i)
        }
    }
    for (let i = 0; i < news.length; i++) {
        let elem = news[i]
        changeArr.push(elem)
    }

    obj["words"] = changeArr.join(" ")
    return obj
}