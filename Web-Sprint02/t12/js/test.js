let phrase1 = concat("Hulk", "smash!");
let output = phrase1;
console.log(output); // Hulk smash!
let phrase2 = concat("Leave");
output = phrase2();
// a prompt appears. Enter "Hulk alone!" into the prompt
console.log(output); // Leave Hulk alone!
console.log(phrase2.count); // 1
output = phrase2();
// a prompt appears. Enter "me alone, please!" into the prompt
console.log(output); // Leave me alone, please!
output = phrase2();
// a prompt appears. Enter "HULK ALONE!" into the prompt
console.log(output); // Leave HULK ALONE!
console.log(phrase2.count); // 3
let phrase3 = concat("Go");
output = phrase3();
// a prompt appears. Enter "away!" into the prompt
console.log(output); // Go away!
console.log(phrase3.count); // 1
console.log(phrase2.count); // 3
/* Result in Console panel:
Hulk smash!
Leave Hulk alone!
1
Leave me alone, please!
Leave HULK ALONE!
3
Go away!
1 3 */