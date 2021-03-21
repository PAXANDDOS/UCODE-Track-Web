/* */
let blockInput = false;
let memValue = "";
let currentMode = 'default';
let currentSystem = 'dec';


///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////


let meter = new Array(
    {to: 'm',
    coef: 1},

    {to: 'mm',
    coef: 1000},

    {to: 'cm',
    coef: 100},

    {to: 'km',
    coef: 0.001},

    {to: 'dm',
    coef: 10}
);

let millimeter = new Array(
    {to: 'm',
    coef: 0.001},

    {to: 'mm',
    coef: 1},

    {to: 'cm',
    coef: 0.1},

    {to: 'km',
    coef: 1e-6},

    {to: 'dm',
    coef: 0.01}
);

let centimeter = new Array(
    {to: 'm',
    coef: 0.01},

    {to: 'mm',
    coef: 10},

    {to: 'cm',
    coef: 1},

    {to: 'km',
    coef: 1e-5},

    {to: 'dm',
    coef: 0.1}
);

let kilometer = new Array(
    {to: 'm',
    coef: 1000},

    {to: 'mm',
    coef: 1000000},

    {to: 'cm',
    coef: 100000},

    {to: 'km',
    coef: 1},

    {to: 'dm',
    coef: 10000}
);

let decimeter = new Array(
    {to: 'm',
    coef: 0.1},

    {to: 'mm',
    coef: 100},

    {to: 'cm',
    coef: 10},

    {to: 'km',
    coef: 0.0001},

    {to: 'dm',
    coef: 1}
);

let factorsLen = new Array(
    meter,
    millimeter,
    centimeter,
    kilometer,
    decimeter
);


let inputConvLen = document.querySelector('.length .convertor input[name="input"]');
document.querySelectorAll('.length .num').forEach(num => {
    num.addEventListener('click', function() {
        convLen(this.value);
    });
});

document.querySelectorAll('.length .convertor select').forEach(num => {
    num.addEventListener('change', function() {
        convLen("");
    });
});


function convLen(value) {
    try {


        switch (value) {
            case 'clear':
                inputConvLen.value = "";
                break;
            case 'Backspace':
                inputConvLen.value = inputConvLen.value.substring(0, inputConvLen.value.length -1); 
                break;
            
            default:
                inputConvLen.value += value;
                break;
        }
        let convFrom = document.querySelector(".length .convertFrom select").selectedIndex;
        let convTo = document.querySelector(".length .convertTo select").selectedIndex;
        let factor = factorsLen[convFrom][convTo];
        
        document.querySelector('.length .convertor input[name="output"]').value = Math.round((Number(inputConvLen.value) * factor.coef + Number.EPSILON) * 1000000) / 1000000;
    } catch (error) {
        console.log(error);
    }
    
}


///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////


let gram = new Array(
    {to: 'g',
    coef: 1},

    {to: 'mg',
    coef: 1000},

    {to: 'kg',
    coef: 0.001},

    {to: 't',
    coef: 1e-6}
);

let milligram = new Array(
    {to: 'g',
    coef: 0.01},

    {to: 'mg',
    coef: 1},

    {to: 'kg',
    coef: 0.001},

    {to: 't',
    coef: 1e-6}
);

let kilogram = new Array(
    {to: 'g',
    coef: 1000},

    {to: 'mg',
    coef: 1000000},

    {to: 'kg',
    coef: 1},

    {to: 't',
    coef: 0.001}
);

let tonne = new Array(
    {to: 'g',
    coef: 1000000},

    {to: 'mg',
    coef: 1e9},

    {to: 'kg',
    coef: 1000},

    {to: 't',
    coef: 1}
);

let factorsMass = new Array(
    gram,
    milligram,
    kilogram,
    tonne
);


let inputConvMass = document.querySelector('.mass .convertor input[name="input"]');

document.querySelectorAll('.mass .num').forEach(num => {
    num.addEventListener('click', function() {
        convMass(this.value);
    });
});

document.querySelectorAll('.mass .convertor select').forEach(num => {
    num.addEventListener('change', function() {
        convMass("");
    });
});


function convMass(value) {
    try {
        switch (value) {
            case 'clear':
                inputConvMass.value = "";
                break;
            case 'Backspace':
                inputConvMass.value = inputConvMass.value.substring(0, inputConvMass.value.length -1); 
                break;
            
            default:
                inputConvMass.value += value;
                break;
        }
        let convFrom = document.querySelector(".mass .convertFrom select").selectedIndex;
        let convTo = document.querySelector(".mass .convertTo select").selectedIndex;
        let factor = factorsMass[convFrom][convTo];
        
        document.querySelector('.mass .convertor input[name="output"]').value = Math.round((Number(inputConvMass.value) * factor.coef + Number.EPSILON) * 1000000) / 1000000;
    } catch (error) {
    } 
}


///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////

let msquare = new Array(
    {to: 'msquare',
    coef: 1},

    {to: 'ksquare',
    coef: 1e-6}
);

let ksquare = new Array(
    {to: 'msquare',
    coef: 1000000},

    {to: 'ksquare',
    coef: 1}
);

let factorsArea = new Array(
    msquare,
    ksquare
);

let inputConvArea = document.querySelector('.area .convertor input[name="input"]');

document.querySelectorAll('.area .num').forEach(num => {
    num.addEventListener('click', function() {
        convArea(this.value);
    });
});

document.querySelectorAll('.area .convertor select').forEach(num => {
    num.addEventListener('change', function() {
        convArea("");
    });
});

function convArea(value) {
    try {
        switch (value) {
            case 'clear':
                inputConvArea.value = "";
                break;
            case 'Backspace':
                inputConvArea.value = inputConvArea.value.substring(0, inputConvArea.value.length -1); 
                break;
            
            default:
                inputConvArea.value += value;
                break;
        }
        let convFrom = document.querySelector(".area .convertFrom select").selectedIndex;
        let convTo = document.querySelector(".area .convertTo select").selectedIndex;
        let factor = factorsArea[convFrom][convTo];
        
        document.querySelector('.area .convertor input[name="output"]').value = Math.round((Number(inputConvArea.value) * factor.coef + Number.EPSILON) * 1000000) / 1000000;
    } catch (error) {
        console.log(error);
    } 
}


function hexToDec(expr) {
    let regexp = /[0-9a-fA-F]+/g;
    let result;
  while(result = regexp.exec(expr)) {
        let oldIndex = regexp.lastIndex;
        let oldLen = expr.length;
        expr = expr.replace(result[0], parseInt(result[0], 16));
        regexp.lastIndex = oldIndex - (oldLen - expr.length);
  }
    
  return expr;
}


function binToDec(expr) {
    let regexp = /[0-1]+/g;
    let result;
  while(result = regexp.exec(expr)) {
    let oldIndex = regexp.lastIndex;
    let oldLen = expr.length;
    expr = expr.replace(result[0], parseInt(result[0], 2));
    regexp.lastIndex = oldIndex - (oldLen - expr.length);
    
  }
  return expr;
}


///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
function calc(value) {
    if (blockInput) {
        return;
    }
    if (/[\+\-]$/g.test(output.value) && /\-$/g.test(value)) {
        return;
    }

        if( /[\+\-\*%/\^]$/g.test(output.value) && /[\+\*\/%\^]$/g.test(value) ||
     output.value.length == 0 && /[\+\*\/%\^]$/g.test(value)) {
            return;
        }
    if (/[\(]$/g.test(output.value) && /[\*\/%\^]$/g.test(value)) {
        return;
    }
    switch (currentSystem) {
        case 'dec':
            
            if (value.match(/=|Enter/)) {
                try {
                    if (output.value.length > 0) {
        
                        let expr = output.value.replace(/\u221A/gi, 'Math.sqrt');
                        expr = expr.replace('^', '**');
                        let result = Math.round((eval(expr) + Number.EPSILON) * 1000) / 1000;
                        history.innerHTML = output.value;
                        if (result == 0 || result == -0) {
                            result = "";
                        }
                        output.value = result;
                    }
                } catch (error){
                    console.log(error);
                    let prevValue = output.value;
                    output.value = "Error";
                    blockInput = true;
                    setTimeout(() => {
                        output.value = prevValue;
                        blockInput = false;
                    }, 1500);
                }
            }
            else {
                switch (value) {
                    case 'clear':
                        output.value = "";
                        break;
                    case 'Backspace':
                        output.value = output.value.substring(0, output.value.length -1);
                        break;
                
                    case 'ms':
                        memValue = Math.trunc( eval(output.value));
                        break;
                    case 'mc':
                        memValue = "";
                        break; 
                    case 'mr':
                        output.value += memValue;
                        break;
                    case 'mplus':
                        memValue = Number(memValue) + Number(Math.trunc( eval(output.value)));
                        break;
                    case 'mminus':
                        memValue = Number(memValue) - Number(Math.trunc( eval(output.value)));
                        break;
                    case 'sqrt':
                        output.value += "\u221A(";
                        break;
                    
                    case '!':
                        let reg = /(\(.+\))|(\d+)$/i;
                        let factor = output.value.match(reg);
                        if (factor == null) {
                            return;
                        }
                        factor = factor[0];
                        factor = factor.replace(/\(|\)/gi, "");
                        factor = eval(factor);
                         
                        factor = math.factorial(factor);
                        output.value = output.value.replace(reg, factor);
                        break;
                    case '^':
                        output.value += '^';
                        break;
                    case '0':
                    case '00':
                        if ( output.value.length != 0) {
                            output.value += value;
                        }
                        break;
                    default:
                        output.value += value;
                        break;
                }
            }
            break;
        case 'hex':
            if (value.match(/=|Enter/)) {
                try {
                    if (output.value.length > 0) {
        
                        let expr = output.value.replace(/\u221A/gi, 'Math.sqrt');
                        expr = expr.replace('^', '**');
                        expr = hexToDec(expr);
                        let result = Math.trunc(eval(expr) + Number.EPSILON);
                        if (result == 0 || result == -0) {
                            result = "";
                        }
                        result = result.toString(16);
                        result = result.toUpperCase();
                        history.innerHTML = output.value;
                        output.value = result;
                    }
                } catch (error){
                    console.log(error);
                    let prevValue = output.value;
                    output.value = "Error";
                    blockInput = true;
                    setTimeout(() => {
                        output.value = prevValue;
                        blockInput = false;
                    }, 1500);
                }
            }
            else {
                switch (value) {
                    case 'clear':
                        output.value = "";
                        break;
                    case 'Backspace':
                        output.value = output.value.substring(0, output.value.length -1);
                        break;
                
                    case 'ms':
                        memValue = Math.trunc(eval(output.value));
                        break;
                    case 'mc':
                        memValue = "";
                        break; 
                    case 'mr':
                        output.value += memValue;
                        break;
                    case 'mplus':
                        memValue = Number(memValue) + Number(Math.trunc(eval(output.value)));
                        break;
                    case 'mminus':
                        memValue = Number(memValue) - Number(Math.trunc(eval(output.value)));
                        break;
                    case 'sqrt':
                        output.value += "\u221A(";
                        break;
                    
                    case '!':
                        let reg = /(\(.+\))|([\da-fA-f]+)$/i;
                        let factor = output.value.match(reg);
                        factor = factor[0];
                         
                        factor = factor.replace(/\(|\)/gi, "");
                        factor = eval(factor);
                         
                        factor = math.factorial(factor);
                        output.value = output.value.replace(reg, factor);
                        break;
                    case '^':
                        output.value += '^';
                        break;
    
                    default:
                        output.value += value;
                        break;
                }
            } 
            break;
        case 'bin':
            if (value.match(/=|Enter/)) {
                try {
                    if (output.value.length > 0) {
        
                        let expr = output.value.replace(/\u221A/gi, 'Math.sqrt');
                        expr = expr.replace('^', '**');
                        expr = binToDec(expr);
                        let result = Math.trunc(eval(expr) + Number.EPSILON);
                        if (result == 0 || result == -0) {
                            result = "";
                        }
                        result = result.toString(2);
                        result = result.toUpperCase();
                        history.innerHTML = output.value;
                        output.value = result;
                    }
                } catch (error){
                    console.log(error);
                    let prevValue = output.value;
                    output.value = "Error";
                    blockInput = true;
                    setTimeout(() => {
                        output.value = prevValue;
                        blockInput = false;
                    }, 1500);
                }
            }
            else {
                switch (value) {
                    case 'clear':
                        output.value = "";
                        break;
                    case 'Backspace':
                        output.value = output.value.substring(0, output.value.length -1);
                        break;
                
                    case 'ms':
                        memValue = Math.trunc( eval(output.value));
                        break;
                    case 'mc':
                        memValue = "";
                        break; 
                    case 'mr':
                        output.value += memValue;
                        break;
                    case 'mplus':
                        memValue = Number(memValue) + Number(Math.trunc( eval(output.value)));
                        break;
                    case 'mminus':
                        memValue = Number(memValue) - Number(Math.trunc( eval(output.value)));
                        break;
                    case 'sqrt':
                        output.value += "\u221A(";
                        break;
                    
                    case '!':
                        let reg = /(\(.+\))|(\d+)$/i;
                        let factor = output.value.match(reg);
                        factor = factor[0];
                         
                        factor = factor.replace(/\(|\)/gi, "");
                        factor = eval(factor);
                         
                        factor = math.factorial(factor);
                        output.value = output.value.replace(reg, factor);
                        break;
                    case '^':
                        output.value += '^';
                        break;
    
                    default:
                        output.value += value;
                        break;
                }
            }
            break;
            
        default:
            break;
    }
    
}



let output = document.getElementsByClassName('value');
output = output[0];
let history =  document.getElementById('latestValue');

document.querySelectorAll('.container .num').forEach(num => {
    num.addEventListener('click', function() {
        calc(this.value);
    });
});


function outputDest(value) {
    switch (currentMode) {
        case 'default':
            calc(value);
            break;
        case 'lengthConvertor':
            convLen(value);
            break;
        case 'massConvertor':
            convMass(value);
            break;
        case 'areaConvertor':
            convArea(value);
            break;
                             
        default:
            break;
    }
}

document.addEventListener('keydown', event => {
    if ((event.key).match(/Backspace|Enter/)) {
        outputDest(event.key);
    }
})






document.getElementById(currentMode).classList.toggle('active');
function modeSwitcher(id) {
    if(currentMode === id)
        return;
    switch(id){
        case 'default': {
            document.getElementById(currentMode).classList.toggle('active');

            currentMode = 'default';
            document.getElementsByClassName('length')[0].style.display = "none";
            document.getElementsByClassName('mass')[0].style.display = "none";
            document.getElementsByClassName('area')[0].style.display = "none";
            document.getElementsByClassName('container')[0].style.display = "flex";
            document.getElementById(currentMode).classList.toggle('active');
            break;
        }
        case 'lengthConvertor': {
            document.getElementById(currentMode).classList.toggle('active');

            currentMode = 'lengthConvertor';
            document.getElementsByClassName('mass')[0].style.display = "none";
            document.getElementsByClassName('area')[0].style.display = "none";
            document.getElementsByClassName('container')[0].style.display = "none";
            document.getElementsByClassName('length')[0].style.display = "flex";
            document.getElementById(currentMode).classList.toggle('active');
            break;
        }
        case 'massConvertor': {
            document.getElementById(currentMode).classList.toggle('active');

            currentMode = 'massConvertor';
            document.getElementsByClassName('area')[0].style.display = "none";
            document.getElementsByClassName('container')[0].style.display = "none";
            document.getElementsByClassName('length')[0].style.display = "none";
            document.getElementsByClassName('mass')[0].style.display = "flex";
            document.getElementById(currentMode).classList.toggle('active');
            break;
        }
        case 'areaConvertor': {
            document.getElementById(currentMode).classList.toggle('active');

            currentMode = 'areaConvertor';
            document.getElementsByClassName('mass')[0].style.display = "none";
            document.getElementsByClassName('container')[0].style.display = "none";
            document.getElementsByClassName('length')[0].style.display = "none";
            document.getElementsByClassName('area')[0].style.display = "flex";
            document.getElementById(currentMode).classList.toggle('active');
            break;
        }
    }
}

function systemSwitcher(value) {
    switch(value) {
        case 'decimal': {
            currentSystem = 'dec';
            output.value = "";
            history.innerHTML = "";
            document.getElementById('hex').style.display = "none";
            document.getElementById('binary').style.display = "none";
            document.getElementById('decimal').style.display = "block";
            break;
        }
        case 'binary': {
            currentSystem = 'bin';
            output.value = "";
            history.innerHTML = "";
            document.getElementById('hex').style.display = "none";
            document.getElementById('decimal').style.display = "none";
            document.getElementById('binary').style.display = "block";
            break;
        }
        case 'hex': {
            currentSystem = 'hex';
            output.value = "";
            history.innerHTML = "";
            document.getElementById('binary').style.display = "none";
            document.getElementById('decimal').style.display = "none";
            document.getElementById('hex').style.display = "block";
            break;
        }
    }
}