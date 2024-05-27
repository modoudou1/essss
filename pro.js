// Liste des pharmacies avec leurs coordonnées et informations
var pharmacies = [
  {
    name: "Pharmacie LE GUIGON",
    latitude: 14.68107,
    longitude: -17.44672,
    address: "DAKAR, SENEGAL",
  },
  {
    name: "Pharmacie LE GUIGON",
    latitude: 14.66911300232175,
    longitude: -17.437098931508118,
    address: "RESIDENCE LE GOELAND DKR, DAKAR, SENEGAL",
  },
];

// Initialiser la carte centrée sur Dakar
var map = L.map("map").setView([14.6928, -17.4467], 13);

// Ajouter les tuiles OpenStreetMap
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution:
    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

// Ajouter les marqueurs pour chaque pharmacie
pharmacies.forEach(function (pharmacy) {
  var marker = L.marker([pharmacy.latitude, pharmacy.longitude]).addTo(map);
  marker.bindPopup("<b>" + pharmacy.name + "</b>");

  // Ajouter une étiquette avec le nom de la pharmacie
  marker
    .bindTooltip(pharmacy.name, {
      permanent: true,
      direction: "right",
      className: "leaflet-label",
    })
    .openTooltip();

  // Ajouter un événement 'click' à chaque marqueur
  marker.on("click", function () {
    // Afficher les informations de la pharmacie dans la bande latérale
    document.getElementById("pharmacy-info").innerHTML = `
              <div class="pharmacy-info">
                  <h3>${pharmacy.name}</h3>
                  <p>${pharmacy.address}</p>
                  <p><b>Latitude:</b> ${pharmacy.latitude}</p>
                  <p><b>Longitude:</b> ${pharmacy.longitude}</p>
              </div>
          `;
    // Afficher la bande latérale
    document.getElementById("sidebar").style.display = "block";
  });
});

// Fermer la bande latérale en cliquant sur la carte
map.on("click", function (e) {
  // Vérifier si le clic est sur un marqueur
  if (!e.originalEvent.target.closest(".leaflet-marker-icon")) {
    document.getElementById("sidebar").style.display = "none";
  }
});
