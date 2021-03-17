const api = {
    key: "303332f795ec198811841aeb73fc22e2",
    base: "https://api.openweathermap.org/data/2.5/",
    image: "http://openweathermap.org/img/wn/"
}

let body = document.getElementById('body');

const input = document.querySelector('.inputValue');
input.addEventListener('keypress', setQuery);

let city = document.getElementById('city');
let today = document.getElementById('today');
let temp = document.getElementById('temp');
let currentImage = document.getElementById('currentImage');
let status = document.getElementById('status');

let forecastDate = document.getElementsByClassName('forecastDate');
let forecastImage = document.getElementsByClassName('forecastImage');
let forecastTemp = document.getElementsByClassName('forecastTemp');

getResults('Kharkiv');

function setQuery(evt) {
    if (evt.keyCode == 13)
      getResults(input.value);
}
  
function getResults(query) {
    fetch(`${api.base}forecast?q=${query}&units=metric&APPID=${api.key}`)
        .then(weather => { return weather.json(); }).then(displayCurrent);
}
function displayCurrent(weather) {    
    if (weather.cod === "404") {
        console.error('Invalid city name. Rejected');
        return;
    }

    city.innerText = `${weather.city.name}, ${weather.city.country}`;

    let now = new Date();
    today.innerHTML = dateBuilder(now);

    currentImage.src = `${api.image}${weather.list[0].weather[0].icon}@4x.png`;

    temp.innerText = `${Math.round(weather.list[0].main.temp)}°C`;
    status.innerText = weather.list[0].weather[0].main;
    console.log(weather)
    displayForecast(weather);

    switch(weather.list[0].weather[0].main) {
        case 'Clear': {
            body.style.backgroundImage = "url('https://media.giphy.com/media/RAFOR6gbo1bEc/giphy.gif')";
            body.style.animation = 'none';
            body.style.backgroundSize = '100% 135%';
            break;
        }
        case 'Thunderstorm': {
            body.style.backgroundImage = "url('https://media.giphy.com/media/3o7TKAZ5N3YHQzGKK4/giphy.gif')";
            body.style.animation = 'none';
            body.style.backgroundSize = '100% 135%';
            break;
        }
        case 'Drizzle': {
            body.style.backgroundImage = "url('https://coalregioncanary.com/wp-content/uploads/2020/07/drizzle-gif.gif')";
            body.style.animation = 'none';
            body.style.backgroundSize = '100% 135%';
            break;
        }
        case 'Rain': {
            body.style.backgroundImage = "url('https://www.wtoc.com/resizer/E1LKZmbJn8qTavJ4YvNJQ5UNv8k=/1200x600/cloudfront-us-east-1.images.arcpublishing.com/raycom/SZRS43TDQFAK5JCUUTXZJHV5MQ.gif')";
            body.style.animation = 'none';
            body.style.backgroundSize = '100% 135%';
            break;
        }
        case 'Snow': {
            body.style.backgroundImage = "url('https://img.traveltriangle.com/blog/wp-content/tr:w-700,h-400/uploads/2017/12/ozR1ill.gif')";
            body.style.animation = 'none';
            body.style.backgroundSize = '100% 135%';
            break;
        }
        case 'Atmosphere': {
            body.style.backgroundImage = "url('https://i.gifer.com/9pwX.gif')";
            body.style.animation = 'none';
            body.style.backgroundSize = '100% 135%';
            break;
        }
        case 'Clouds': {
            body.style.backgroundImage = "url('https://i.pinimg.com/originals/64/8f/0f/648f0f2dad03c3a0adbbda57c7df7e60.gif')";
            body.style.animation = 'none';
            body.style.backgroundSize = '100% 135%';
            break;
        }
    }
    
}

function displayForecast(weather) {
    let forecast = [8, 16, 24, 32, 39];
    for(let i = 0; i < forecast.length; i++) {
        let now = new Date(weather.list[forecast[i]].dt_txt);
        forecastDate[i].innerHTML = dateBuilder(now);
        forecastTemp[i].innerHTML = `${Math.round(weather.list[forecast[i]].main.temp)}°C`;
        forecastImage[i].src = `${api.image}${weather.list[forecast[i]].weather[0].icon}@4x.png`;
    }
}

function dateBuilder(now) { 
    let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
  
    let day = days[now.getDay()];
    let date = now.getDate();
    let month = months[now.getMonth()];
  
    return `${day} ${date}<br>${month}`;
}
