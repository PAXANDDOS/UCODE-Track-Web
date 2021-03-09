let beginRange = +prompt('Enter the number for the beginning of a range', '1');
let endRange = +prompt('Enter the number for the end of a range', '100');

checkDivision(beginRange, endRange);

function checkDivision(beginRange, endRange) {
    for (let i = beginRange; i <= endRange; i++) {
        let description = " - "

        if (i % 2 === 0) {
            description = " is even"
        }
        if (i % 3 === 0 && i % 2 !== 0) {
            description = " is a multiple of 3"
        }
        else if (i % 3 === 0) {
            description = description.concat(", a multiple of 3")
        }
        if (i % 10 === 0) {
            description = description.concat(", a multiple of 10")
        }
        
        console.log(i + description + "\n")
    }
}