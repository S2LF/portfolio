const init = () => {

  // recupère les villes en utilisant fetch
  fetch('./assets/apiweather/js/cities-fr.json')
    // parse le resultat pour le mettre sous format JSON 
    .then(res => res.json())
    // On utilise les villes pour créer les options puis récupérer le currentWeather
    .then(cities => {
      //create options pour le selector
      createOptions(cities);
      //On crée une promesse
      const promises = [getCurrentWeather(cities[0]), getForecastWeather(cities[0])];
      return Promise.all(promises);
    })

    // [ currentWeather, forecastWeather ] = weather

    .then(([currentWeather, forecastWeather]) => {
      displayWeather(currentWeather);
      displayForecastWeather(forecastWeather);
    //  console.log(currentWeather);
    //  console.log(forecastWeather);
    });
}


// Création du select des villes
const createOptions = (cities) => {
  const selector = document.getElementById('select-city');

  for (let i = 0; i < cities.length; i++) {
    const option = document.createElement('option');
    option.value = cities[i].id;
    option.text = cities[i].nm;
    selector.add(option);
  }


  // Crée le onChange pour afficher la ville sélectionner dans le selector
  selector.onchange = () => {
    const index = document.getElementById('select-city').selectedIndex;

    getCurrentWeather(cities[index])
      .then(displayWeather);
    getForecastWeather(cities[index])
      .then(displayForecastWeather);
  };
}
// Envoie des données de Current day (City, Icon et Weather) .
const displayWeather = (weather) => {
  //    console.log(weather);
  document.getElementById('current-city').innerHTML = weather.name;
  document.getElementById('current-icon').className = `wi-icon-${weather.cod}`;
  document.getElementById('current-weather').innerHTML = `${weather.main.temp.toFixed(0)}°C`;
}

// Météo actuelle en format métric (Celsius)
const getCurrentWeather = (city) => {
  return fetch('https://api.openweathermap.org/data/2.5/weather?id=' + city.id + '&appid=025351b8fc539b5baf5dc390033fb417&units=metric')
    .then(res => res.json());
}

// Format date YYYY MM DD
const addDays = (days) => {
  const d = new Date();
  d.setDate(d.getDate() + days),
  month = '' + (d.getMonth() + 1),
  day = '' + d.getDate(),
  year = d.getFullYear();



  if (month.length < 2) month = '0' + month;
  if (day.length < 2) day = '0' + day;

  return [year, month, day].join('-');
}


// Pour la météo des 3 prochains jours

const getForecastWeather = (city) => {
  return fetch('https://api.openweathermap.org/data/2.5/forecast?id=' + city.id + '&appid=025351b8fc539b5baf5dc390033fb417&units=metric')
    .then(res => res.json());
}
const displayForecastWeather = (weather) => {

  const options = { weekday: "short" };

  const day1 = addDays(1);
  const day2 = addDays(2);
  const day3 = addDays(3);

  document.getElementById('day1').innerHTML = new Date(day1).toLocaleDateString("fr-FR", options);
  document.getElementById('day2').innerHTML = new Date(day2).toLocaleDateString("fr-FR", options);
  document.getElementById('day3').innerHTML = new Date(day3).toLocaleDateString("fr-FR", options);

  days = [day1, day2, day3];

  for (let i = 0; i < days.length; i++) {
    const weatherByDay = weather.list.filter((weatherCurrent) => {
      return weatherCurrent.dt_txt.split(' ')[0] === days[i];
    });
    let min, max;
    const ForecastIcon = `wi-icon-${weatherByDay[1].weather[0].id}`;

    for (let j = 0; j < weatherByDay.length; j++) {
      const maxW = weatherByDay[j].main.temp_max;
      const minW = weatherByDay[j].main.temp_min;


      if (min === undefined) { min = minW }
      if (max === undefined) { max = maxW }

      if (min > minW) { min = minW }
      if (max < maxW) { max = maxW }

    }

    document.getElementById(`forecast${i + 1}-icon`).className = ForecastIcon;
    document.getElementById(`day${i + 1}-min`).innerHTML = `Min : ${min.toFixed(0)}°C`;
    document.getElementById(`day${i + 1}-max`).innerHTML = `Max : ${max.toFixed(0)}°C`;
  }
};

init();
