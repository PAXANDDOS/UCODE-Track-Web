let movies = ['Zootopia', 'Sing', 'Shazam', 'Balto', 'Zootopiaplus'];
let current = 'Zootopia';

let element = document.getElementsByClassName("element");
let title = document.getElementById("title");
let info = document.getElementById("info");
let actor1 = document.getElementById("actor1");
let actor2 = document.getElementById("actor2");
let actor3 = document.getElementById("actor3");
let actor4 = document.getElementById("actor4");
let actor5 = document.getElementById("actor5");
let description = document.getElementById("description");
let image = document.getElementById("imageSource");

function zootopia() {
    if(current == "Zootopia")
        return;
    else {
        current = "Zootopia";
        update();
    }
}
function sing() {
    if(current == "Sing")
        return;
    else {
        current = "Sing";
        update();
    }
}
function shazam() {
    if(current == "Shazam")
        return;
    else {
        current = "Shazam";
        update();
    }
}
function balto() {
    if(current == "Balto")
        return;
    else {
        current = "Balto";
        update();
    }
}
function zootopiaplus() {
    if(current == "Zootopiaplus")
        return;
    else {
        current = "Zootopiaplus";
        update();
    }
}

function update() {
    if(current === movies[0]){
        for (let i = 0; i < element.length; i++) {
            element[i].style.backgroundColor = "#97B3DA";
            element[i].style.borderLeft = 'none';
            element[i].style.borderTopLeftRadius = '10px';
            element[i].style.borderBottomLeftRadius = '10px';
        }
        document.getElementById('Zootopia').style.borderLeft = 'solid 3.9px #b6d5ff';
        document.getElementById('Zootopia').style.borderTopLeftRadius = '2px';
        document.getElementById('Zootopia').style.borderBottomLeftRadius = '2px';
        title.innerText = "Zootopia"
        info.innerHTML = "PG &nbsp;&nbsp;&#124&nbsp;&nbsp; 1h 48min &nbsp;&nbsp;&#124&nbsp;&nbsp; Animation, Adventure, Comedy &nbsp;&nbsp;&#124&nbsp;&nbsp; 4 March 2016 (USA)";
        actor1.innerText = "Ginnifer Goodwin";
        actor2.innerText = "Jason Bateman";
        actor3.innerText = "Idris Elba";
        actor4.innerText = "Jenny Slate";
        actor5.innerText = "Shakira";
        description.innerText = "From the largest elephant to the smallest shrew, the city of Zootopia is a mammal metropolis where various animals live and thrive. When Judy Hopps becomes the first rabbit to join the police force, she quickly learns how tough it is to enforce the law. Determined to prove herself, Judy jumps at the opportunity to solve a mysterious case. Unfortunately, that means working with Nick Wilde, a wily fox who makes her job even harder.";
        crossfade("https://mypostercollection.com/wp-content/uploads/2018/05/Zootopia-Poster-4.jpg");
    }
    else if(current === movies[1]){
        for (let i = 0; i < element.length; i++) {
            element[i].style.backgroundColor = "#0C8ACA";
            element[i].style.borderLeft = 'none';
            element[i].style.borderTopLeftRadius = '10px';
            element[i].style.borderBottomLeftRadius = '10px';
        }
        document.getElementById('Sing').style.borderLeft = 'solid 3.9px #284791';
        document.getElementById('Sing').style.borderTopLeftRadius = '2px';
        document.getElementById('Sing').style.borderBottomLeftRadius = '2px';
        title.innerText = "Sing"
        info.innerHTML = "PG &nbsp;&nbsp;&#124&nbsp;&nbsp; 1h 48min &nbsp;&nbsp;&#124&nbsp;&nbsp; Animation, Comedy, Family &nbsp;&nbsp;&#124&nbsp;&nbsp; 21 December 2016 (USA)";
        actor1.innerText = "Matthew McConaughey";
        actor2.innerText = "Reese Witherspoon";
        actor3.innerText = "Seth MacFarlane";
        actor4.innerText = "Scarlett Johansson";
        actor5.innerText = "Taron Egerton";
        description.innerText = "In a world of anthropomorphic animals, koala Buster Moon owns a theater, having been interested in show business since his father took him to his first music show as a child. Following financial problems brought up by the bank representative Judith, he tells his wealthy friend Eddie that he will host a singing competition with a prize of $1,000. But Buster's assistant, Miss Crawly, accidentally appends two extra zeroes, and the promotional fliers showing $100,000 are blown out of Buster's office into the city streets.";
        crossfade("https://fs.kinomania.ru/file/film_poster/e/84/e84ef5cd19e4d7af63842e558a828162.jpeg")
    }
    else if(current === movies[2]){
        for (let i = 0; i < element.length; i++) {
            element[i].style.backgroundColor = "#C13128";
            element[i].style.borderLeft = 'none';
            element[i].style.borderTopLeftRadius = '10px';
            element[i].style.borderBottomLeftRadius = '10px';
        }
        document.getElementById('Shazam').style.borderLeft = 'solid 3.9px #2B0908';
        document.getElementById('Shazam').style.borderTopLeftRadius = '2px';
        document.getElementById('Shazam').style.borderBottomLeftRadius = '2px';
        title.innerText = "Shazam!"
        info.innerHTML = "PG-13 &nbsp;&nbsp;&#124&nbsp;&nbsp; 2h 12min &nbsp;&nbsp;&#124&nbsp;&nbsp; Action, Adventure, Comedy &nbsp;&nbsp;&#124&nbsp;&nbsp; 5 April 2019 (USA)";
        actor1.innerText = "Zachary Levi";
        actor2.innerText = "Asher Angel";
        actor3.innerText = "Mark Strong";
        actor4.innerText = "Jack Dylan Grazer";
        actor5.innerText = "Adam Brody";
        description.innerText = "In Philadelphia, Billy Batson is an abandoned child who is proving a nuisance to Child Services and the authorities with his stubborn search for his lost mother. However, in his latest foster home, Billy makes a new friend, Freddy, and finds himself selected by the Wizard Shazam to be his new champion. Now endowed with the ability to instantly become an adult superhero by speaking the wizard's name, Billy gleefully explores his new powers with Freddy. However, Billy soon learns that he has a deadly enemy, Dr. Thaddeus Sivana, who was previously rejected by the wizard and has accepted the power of the Seven Deadly Sins instead. Now pursued by this mad scientist for his own power as well, Billy must face up to the responsibilities of his calling while learning the power of a special magic with his true family that Sivana can never understand.";
        crossfade("https://images-na.ssl-images-amazon.com/images/I/81dZo1PAfvL._AC_SL1500_.jpg");
    }
    else if(current === movies[3]){
        for (let i = 0; i < element.length; i++) {
            element[i].style.backgroundColor = "#367995";
            element[i].style.borderLeft = 'none';
            element[i].style.borderTopLeftRadius = '10px';
            element[i].style.borderBottomLeftRadius = '10px';
        }
        document.getElementById('Balto').style.borderLeft = 'solid 3.9px #191C20';
        document.getElementById('Balto').style.borderTopLeftRadius = '2px';
        document.getElementById('Balto').style.borderBottomLeftRadius = '2px';
        title.innerText = "Balto"
        info.innerHTML = "G &nbsp;&nbsp;&#124&nbsp;&nbsp; 1h 18min &nbsp;&nbsp;&#124&nbsp;&nbsp; Animation, Adventure, Drama &nbsp;&nbsp;&#124&nbsp;&nbsp; 22 December 1995 (USA)";
        actor1.innerText = "Kevin Bacon";
        actor2.innerText = "Bob Hoskins";
        actor3.innerText = "Bridget Fonda";
        actor4.innerText = "Jim Cummings";
        actor5.innerText = "Phil Collins";
        description.innerText = "A half-wolf, half-husky named Balto gets a chance to become a hero when an outbreak of diphtheria threatens the children of Nome, Alaska in the winter of 1925. He leads a dog team on a 600-mile trip across the Alaskan wilderness to get medical supplies. The film is based on a true story which inspired the Iditarod dog sled race";
        crossfade("https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/82dd0c8c-b8cd-4e81-a2c7-bc7f3af7c66c/d9kwkze-e2f3598a-22f1-466a-9250-280378f0e865.png/v1/fill/w_1024,h_1608,strp/balto_20th_anibersary_by_abcsan_d9kwkze-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3siaGVpZ2h0IjoiPD0xNjA4IiwicGF0aCI6IlwvZlwvODJkZDBjOGMtYjhjZC00ZTgxLWEyYzctYmM3ZjNhZjdjNjZjXC9kOWt3a3plLWUyZjM1OThhLTIyZjEtNDY2YS05MjUwLTI4MDM3OGYwZTg2NS5wbmciLCJ3aWR0aCI6Ijw9MTAyNCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.2zRtY8OSDCZGEWt-Dobyhw9FMfQ8KzXKYz8M-OB5WkM");
    }
    else if(current === movies[4]){
        for (let i = 0; i < element.length; i++) {
            element[i].style.backgroundColor = "#5AB870";
            element[i].style.borderLeft = 'none';
            element[i].style.borderTopLeftRadius = '10px';
            element[i].style.borderBottomLeftRadius = '10px';
        }
        document.getElementById('Zootopiaplus').style.borderLeft = 'solid 3.9px #d36e01';
        document.getElementById('Zootopiaplus').style.borderTopLeftRadius = '2px';
        document.getElementById('Zootopiaplus').style.borderBottomLeftRadius = '2px';
        title.innerText = "Zootopia+"
        info.innerHTML = "TBA &nbsp;&nbsp;&#124&nbsp;&nbsp; TBA &nbsp;&nbsp;&#124&nbsp;&nbsp; Animation, Adventure, Comedy &nbsp;&nbsp;&#124&nbsp;&nbsp; 2022-";
        actor1.innerText = "Ginnifer Goodwin";
        actor2.innerText = "Jason Bateman";
        actor3.innerText = "Idris Elba";
        actor4.innerText = "Jenny Slate";
        actor5.innerText = "Shakira";
        description.innerText = "The adventures of the creatures of the most incredible metropolis: Zootopia.";
        crossfade("https://i.ytimg.com/vi/s6T-zBCPCPE/maxresdefault.jpg");
    }
}
  
function crossfade(name) {
    setTimeout(() => image.classList.add("crossfade"), 200);
    setTimeout(() => image.src = name, 250);
    setTimeout(() => image.classList.remove("crossfade"), 300);
}
