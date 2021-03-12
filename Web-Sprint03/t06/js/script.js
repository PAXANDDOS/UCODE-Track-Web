console.log(`Enter 'exit' to exit.`)
let prev = 1;
while (true) {
    let input = prompt(`Previous result: ${prev}. Enter a new number:`);
    if (+input)
        prev += (+input);
    else console.error('Invalid number!');
    if (input === 'exit') break;
    if (prev > 10000) prev = 1;
}
