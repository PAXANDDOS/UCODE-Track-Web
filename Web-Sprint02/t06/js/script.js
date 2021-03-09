let firstName = String(prompt("What is your first name?"));
let lastName = String(prompt("What is your last name?"));
let check1 = firstName.match(/^[a-z]+$/i)
let check2 = lastName.match(/^[a-z]+$/i)

if (check1 && check2) {
    firstName = firstName.charAt(0).toUpperCase() + firstName.slice(1).toLowerCase();
    lastName = lastName.charAt(0).toUpperCase() + lastName.slice(1).toLowerCase();

    console.log(`Hey, ${firstName} ${lastName}`);
    alert(`Hey, ${firstName} ${lastName}`);
}
else {
    console.log("Wrong input!");
    alert("Wrong input!");
}
