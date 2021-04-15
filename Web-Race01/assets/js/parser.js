// let txt = '{"playerName":"Vlad","health":20,"mana":4,"cards":[{"alias":"Thanos","attack":10,"defence":10,"cost":10},{"alias":"Black Cat","attack":7,"defence":5,"cost":6},{"alias":"Black Panther","attack":7,"defence":6,"cost":6},{"alias":"Captain America","attack":6,"defence":9,"cost":8},{"alias":"Healer","attack":4,"defence":8,"cost":5}],"usedCards":[]}';
// let txt1 = '{"playerName":"Vlad","health":20,"mana":4,"cards":[{"alias":"Thanos","attack":10,"defence":10,"cost":10},{"alias":"Black Cat","attack":7,"defence":5,"cost":6},{"alias":"Black Panther","attack":7,"defence":6,"cost":6},{"alias":"Captain America","attack":6,"defence":9,"cost":8},{"alias":"Healer","attack":4,"defence":8,"cost":5}],"usedCards":[]}';
// let array = [txt, txt1];

function parseToObj(dataArray) {
    // let resultArray = [];
    let obj = JSON.parse(dataArray);
    // for (let i = 0; i < dataArray.length; i++) {
    //     console.log(i);
    //     let obj = JSON.parse(dataArray[i]);
    //     resultArray.push(obj);
    // }
    return obj;
}

// let obj = parseToObj(array);
// console.log(obj);

function changeTurn() {

    let obj = {
        nameOfOperation: "changeTurn",
    };
    let json = JSON.stringify(obj);
    return json;

}

// let json1 = changeTurn(1);
// console.log(json1);

function dropCard(idCard) {
    let obj = {
        nameOfOperation: "dropCard",
        indexOfCard: idCard
    };
    let json = JSON.stringify(obj);
    return json;
    //{ nameOfOperation: "dropCard", indexofCard: 1 }
}

// let json2 = dropCard(5);
// console.log(json2);

function attackCard(idCard, idToAttack) {
    let obj = {
        nameOfOperation: "attackCard",
        indexOfCard: idCard,
        indexCardToAttack: idToAttack
    };
    let json = JSON.stringify(obj);
    return json;
}

// let json3 = attackCard(2, 4);
// console.log(json3);

function attackPlayer(idCard) {
    let obj = {
        nameOfOperation: "attackPlayer",
        indexOfCard: idCard
    };
    let json = JSON.stringify(obj);
    return json;
    //{ nameOfOperation: "atackPlayer", indexOfCard }
}

// let json = attackCard(2);
// console.log(json);