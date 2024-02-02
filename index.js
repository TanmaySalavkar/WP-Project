function openPopup() {
    document.getElementById("popupContainer").style.display = "block";
}

// Function to close the popup
function closePopup() {
    document.getElementById("popupContainer").style.display = "none";
}

// Event listener for the login button
document.getElementById("repo-btn").addEventListener("click", openPopup);





const audio = document.getElementById('audio');

function playaudio() {
    audio.play();
}

function pauseaudio() {
    audio.pause();
    audio.currentTime = 0; // Reset audio to the beginning
}









const navbar = document.getElementById('navbar');
const sidebar = document.getElementById('sidebar');

window.addEventListener('scroll', () => {
    const navbarHeight = navbar.offsetHeight;
    const scrolled = window.scrollY;

    if (scrolled > navbarHeight) {
        sidebar.style.top = '0';
    } else {
        sidebar.style.top = `${navbarHeight - scrolled}px`;
    }
});









// script.js
document.addEventListener('DOMContentLoaded', function() {
    fetch('large-content.json')
        .then(response => response.json())
        .then(data => {
            const template = Handlebars.compile(document.getElementById('contentTemplate').innerHTML);
            document.getElementById('contentContainer').innerHTML = template(data);
        })
        .catch(error => console.error('Error fetching content:', error));
});
