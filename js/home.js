function toggleMenu() {
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('show');
}

// Fetch Weather Data (OpenWeatherMap API)
async function fetchWeather() {
    const apiKey = '15f8d887d3d1476f573db502295a47ae';
    const city = 'qatar';
    try {
        const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}`);
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const data = await response.json();
        document.getElementById('weatherData').textContent = `Temperature: ${(data.main.temp - 273.15).toFixed(2)}°C, Weather: ${data.weather[0].description}`;
    } catch (error) {
        document.getElementById('weatherData').textContent = 'Failed to load weather data.';
        console.error('Error fetching weather:', error);
    }
}

// Fetch Daily Quote (Quotable API)
async function fetchQuote() {
    const apiKey = '/RadM/mLFGB7/cc85mj+oQ==pMfQPHvH2qTPqHUg';  // Replace with your actual API key from API Ninjas
    try {
        const response = await fetch('https://api.api-ninjas.com/v1/quotes', {
            method: 'GET',
            headers: { 'X-Api-Key': apiKey },
        });
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const data = await response.json();
        document.getElementById('quoteData').textContent = data[0].quote;
    } catch (error) {
        document.getElementById('quoteData').textContent = 'Failed to load quote.';
        console.error('Error fetching quote:', error);
    }
}

// List of available pages with their titles
const pages = [
    { title: "Home", url: "home.html" },
    { title: "Campaign Info", url: "information.html" },
    { title: "Most Popular Apps", url: "apps.html" },
    { title: "How Parents Can Help", url: "parents.html" },
    { title: "Livestreaming", url: "livestreaming.html" },
    { title: "Contact", url: "contact.html" },
    { title: "Legislation", url: "legislation.html" }
];

// Search function
function searchFunction() {
    const input = document.getElementById("searchBar").value.toLowerCase();
    const resultsDiv = document.getElementById("searchResults");
    
    // Clear previous results
    resultsDiv.innerHTML = '';
    
    if (input) {
        // Filter pages based on the input
        const filteredPages = pages.filter(page => page.title.toLowerCase().includes(input));

        // If there are matches, show the results
        if (filteredPages.length > 0) {
            resultsDiv.style.display = 'block';
            filteredPages.forEach(page => {
                const resultItem = document.createElement('div');
                resultItem.textContent = page.title;
                resultItem.className = 'search-result-item';
                resultItem.onclick = () => {
                    window.location.href = page.url;
                };
                resultsDiv.appendChild(resultItem);
            });
        } else {
            resultsDiv.style.display = 'none';
        }
    } else {
        resultsDiv.style.display = 'none';
    }
}


// Initialize the data fetching
fetchWeather();
fetchQuote();

document.addEventListener('DOMContentLoaded', function () {
    const dropdowns = document.querySelectorAll('.dropbtn');
    dropdowns.forEach(dropbtn => {
        dropbtn.addEventListener('click', function (event) {
            event.preventDefault();
            const dropdownContent = this.nextElementSibling;
            dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
        });
    });

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            const dropdownContents = document.querySelectorAll('.dropdown-content');
            dropdownContents.forEach(content => {
                if (content.style.display === 'block') {
                    content.style.display = 'none';
                }
            });
        }
    }
});

