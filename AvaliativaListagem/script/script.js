function confirmarExclusao(){
    return confirm("Tem certeza que deseja excluir esse filme?");
}

document.addEventListener('DOMContentLoaded', function() {
    const searchToggle = document.getElementById('searchToggle');
    const searchBarContainer = document.getElementById('searchBarContainer');
    const searchInput = document.getElementById('searchInput');
    const movieCards = document.querySelectorAll('.card'); 

    if (searchToggle && searchBarContainer) {
        searchToggle.addEventListener('click', function() {
            if (searchBarContainer.style.display === 'none') {
                searchBarContainer.style.display = 'block'; 
                searchInput.focus(); 
            } else {
                searchBarContainer.style.display = 'none';
                searchInput.value = ''; 
               
                movieCards.forEach(card => {
                    card.style.display = 'block';
                });
            }
        });
    }

    if (searchInput && movieCards.length > 0) { 
        searchInput.addEventListener('keyup', function() {
            const searchTerm = searchInput.value.toLowerCase().trim(); 

            movieCards.forEach(card => {
                const titleElement = card.querySelector('h5');
                if (titleElement) {
                    const movieTitle = titleElement.textContent.toLowerCase();

                    if (movieTitle.includes(searchTerm)) {
                        card.style.display = 'block'; 
                    } else {
                        card.style.display = 'none';
                    }
                }
            });
        });
    }
});
