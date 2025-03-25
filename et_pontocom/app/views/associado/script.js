function toggleDropdown() {
    const dropdown = document.getElementById('dropdown');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
}

function selectDDD(ddd) {
    document.getElementById('selected-ddd').innerText = ddd;
    toggleDropdown();
}

document.addEventListener('click', function (event) {
    const dropdown = document.getElementById('dropdown');
    const button = document.querySelector('.ddd-button');
    if (!button.contains(event.target)) {
        dropdown.style.display = 'none';
    }
});