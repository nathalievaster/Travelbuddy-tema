const typeSelect = document.getElementById("filter-type");
const destinationSelect = document.getElementById("filter-destination");
const lengthSelect = document.getElementById("filter-length");

const cards = document.querySelectorAll(".card");

[typeSelect, destinationSelect, lengthSelect].forEach(select => {
    select.addEventListener("change", filterTrips);
});

function filterTrips() {
    const type = typeSelect.value;
    const destination = destinationSelect.value;
    const length = lengthSelect.value;

    cards.forEach(card => {
        const matchType = type === "all" || card.dataset.type === type;
        const matchDestination =
            destination === "all" || card.dataset.destination === destination;
        const matchLength =
            length === "all" || card.dataset.length === length;

        card.style.display =
            matchType && matchDestination && matchLength ? "grid" : "none";
    });
}
