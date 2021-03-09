function animalCheck() {
    let animal = prompt('What animal is the superhero most similar to?', '');
    let regex = RegExp('^[a-zA-Z]+$');

    if (animal.length > 20 || !regex.test(animal)) {
        alert('ERROR: Accepts only one word, which consists only of Latin letters and its length does not exceed 20 characters.');
        animal = null;
    }
    else {
        alert('Animal name is ' + animal);
    }
    return animal;
}

function genderCheck() {
    let gender =  prompt('Is the superhero male or female? Leave blank if unknown or other.', '');
    let reqGender = RegExp('^male$|^female$|^$', 'i')

    if (!reqGender.test(gender)) {
        alert('ERROR: Accepts only male, female gender or blank (not case sensitive)!');
        gender = null;
    }
    else {
        alert('Gender is ' + gender);
    }
    return gender;
}

function ageCheck() {
    let age = prompt('How old is the superhero?', '');
    let reqAge = RegExp(/^[1-9]|[0-9]{0,4}$/)

    if (age.length > 5 || !reqAge.test(age)) {
        alert('ERROR: Accepts only digits, cannot start with a zero, no more than 5 characters!');
        age = null;
    }
    else {
        alert('Age is ' + age);
    }
    return age;
}

function superName() {
    let description;
    let animal, gender, age;
    while(animal == null) {
        animal = animalCheck();
    }
    while(gender == null) {
        gender = genderCheck();
    }
    while(age == null) {
        age = ageCheck();
    }
    if (RegExp('^male$', 'i').test(gender) && age < 18) {
        description = "boy";
    }
    else if (RegExp('^male$', 'i').test(gender) && age >= 18) {
        description = "man";
    }
    else if (RegExp('^female$', 'i').test(gender) && age < 18) {
        description = "girl";
    }
    else if (RegExp('^female$', 'i').test(gender) && age >= 18) {
        description = "woman";
    }
    else if (RegExp('^$').test(gender) && age < 18) {
        description = "kid";
    }
    else if (RegExp('^$').test(gender) && age >= 18) {
        description = "hero";
    }

    alert(animal + '-' + description);
}

superName();
