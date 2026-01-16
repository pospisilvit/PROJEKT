const btn = document.getElementById("theme-toggle");
const currentTheme = localStorage.getItem("theme");

// Pokud uživatel už dříve zvolil dark mode, nastavíme ho hned
if (currentTheme === "dark") {
  document.body.classList.add("dark-mode");
}

btn.addEventListener("click", function() {
  document.body.classList.toggle("dark-mode");
  
  // Uložíme aktuální stav do paměti prohlížeče
  let theme = "light";
  if (document.body.classList.contains("dark-mode")) {
    theme = "dark";
  }
  localStorage.setItem("theme", theme);
});

fetch('content.json')
  .then(response => response.json())
  .then(data => {
    document.querySelector('header h1').innerText = data.projekt.nazev;
  });