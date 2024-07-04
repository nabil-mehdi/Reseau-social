
document.addEventListener('DOMContentLoaded', function () {
    var dropdownToggle = document.querySelector('.fa-caret-down');
    var dropdownMenu = document.querySelector('.dropdown-menu');

    dropdownToggle.addEventListener('click', function () {
        if (dropdownMenu.style.display === 'block') {
            dropdownMenu.style.display = 'none';
        } else {
            dropdownMenu.style.display = 'block';
        }
    });

    // Fermez la liste déroulante si vous cliquez en dehors de celle-ci
    window.addEventListener('click', function (e) {
        if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.style.display = 'none';
        }
    });
});
$(document).ready(function () {
    // Ouvrir le modal lorsque le lien est cliqué
    $('#loadPublicationForm').on('click', function (event) {
        event.preventDefault(); // Empêche l'action par défaut du lien

        $.ajax({
            url: $(this).attr('href'), // Récupère l'URL à partir du lien
            method: 'GET',
            success: function (response) {
                $('#publicationFormContainer').html(response); // Charge la réponse dans le conteneur
                $('#publicationModal').show(); // Affiche le modal
            },
            error: function (xhr) {
                console.error("Une erreur s'est produite: " + xhr.status + " " + xhr.statusText);
            }
        });
    });

    // Fermer le modal lorsque le bouton de fermeture est cliqué
    $('.close').on('click', function () {
        $('#publicationModal').hide();
    });

    // Fermer le modal lorsqu'on clique en dehors du modal
    $(window).on('click', function (event) {
        if ($(event.target).is('#publicationModal')) {
            $('#publicationModal').hide();
        }
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const optionIcons = document.querySelectorAll('.options-icon');

    optionIcons.forEach(icon => {
        icon.addEventListener('click', function (event) {
            const menu = this.nextElementSibling;
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        });
    });

    document.addEventListener('click', function (event) {
        if (!event.target.classList.contains('options-icon') && !event.target.closest('.options-menu')) {
            document.querySelectorAll('.options-menu').forEach(menu => {
                menu.style.display = 'none';
            });
        }
    });
});

