// /js/scripts.js

jQuery(document).ready(function($) {
    var contactMenuItem = $('#menu-principal .popup');

    // Initialiser la fenêtre modale
    var modal = $('#modal-contact').dialog({
        autoOpen: false,
        modal: true,
        width: 400,
        // Autres options selon vos besoins
    });

    // Activer la fermeture de la fenêtre modale en cliquant sur l'overlay ou en dehors du formulaire
    $('#modal-contact').on('click', function(e) {
        var target = $(e.target);

        // Si l'élément cliqué a la classe 'popup-overlay' ou est en dehors du formulaire, fermer la fenêtre modale
        if (target.hasClass('popup-overlay') || !target.closest('.wpcf7').length) {
            // Ajouter la classe pour l'animation
            $('.popup-overlay').addClass('fade-out-overlay');
            
            // Fermer la fenêtre modale après une courte pause pour laisser le temps à l'animation de se jouer
            setTimeout(function() {
                modal.dialog('close');
            }, 500); // Vous pouvez ajuster la durée selon vos besoins
        }
    });

    // Écouter le clic sur l'élément de menu "Contact"
    contactMenuItem.on('click', function(e) {
        e.preventDefault();
        // Réinitialiser la classe pour garantir que l'animation fonctionne correctement lors de l'ouverture suivante
        $('.popup-overlay').removeClass('fade-out-overlay');
        // Ouvrir la fenêtre modale au clic
        modal.dialog('open');
    });

    // ... Autres fonctionnalités selon vos besoins
});




