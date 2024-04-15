let profileDropdownList = document.querySelector(".profile-dropdown-list");
let btn = document.querySelector(".profile-dropdown-btn");

let classList = profileDropdownList.classList;

const toggle = () => classList.toggle("active");

window.addEventListener("click", function (e) {
  if (!btn.contains(e.target)) classList.remove("active");
});

// Get the social media buttons
const instagramBtn = document.getElementById('instagram');
const telegramBtn = document.getElementById('telegram');
const dribbleBtn = document.getElementById('dribble');

// Add click event listeners to the buttons
instagramBtn.addEventListener('click', openInstagram);
telegramBtn.addEventListener('click', openTelegram);
dribbleBtn.addEventListener('click', openDribble);

// Functions to open the respective social media links
function openInstagram() {
  window.open('https://www.instagram.com/', '_blank');
}

function openTelegram() {
  window.open('https://web.telegram.org/', '_blank');
}

function openDribble() {
  window.open('https://dribbble.com/', '_blank');
}

// Get the follow button
const followBtn = document.getElementById('followBtn');

// Add a click event listener to the follow button
followBtn.addEventListener('click', toggleFollowText);

function toggleFollowText() {
  if (followBtn.textContent === 'Follow') {
    followBtn.textContent = 'Followed';
    ;
  } else {
    followBtn.textContent = 'Follow';
    followBtn.style.backgroundColor = 'white';
    followBtn.style.color = '#ff574a';
  }
}