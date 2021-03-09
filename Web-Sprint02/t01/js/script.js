let num = 2;
let bigint = 10n;
let string = "Dude";
let bool = true;
let nothing = null;
let undef;
let obj = {};
let symbol = Symbol('symbol');
let func = () => {};

alert(`Number is ${typeof num}
BigInt is ${typeof bigint}
String is ${typeof str}
Boolean is ${typeof bool}
Null is null
Undefined is ${typeof undef}
Object is ${typeof obj}
Symbol is ${typeof symbol}
Function is ${typeof func}`);

// ${typeof nothing} will return 'object' so it decided to write it directly.
// See also https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Operators/typeof#null
