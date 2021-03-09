const calc = new Calculator();
console.log(
    calc
        .init(6)
        .add(3)
        .mul(2)
        .div(3)
        .sub(3).result // result = 3
);
calc.alert();
