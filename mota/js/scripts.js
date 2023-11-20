jQuery(document).ready(function($) {
    var contactMenuButton = $('#menu-principal .popup');
    var contactButton = $('.contact-link, .contact-button'); 
    var modalMenu = $('#modal-contact').dialog({
        autoOpen: false,
        modal: true,
        width: 400,
        // Autres options selon vos besoins
    });
    var modalContact = $('#modal-contact').dialog({
        autoOpen: false,
        modal: true,
        width: 400,
        // Autres options selon vos besoins
    });

    // Activer la fermeture de la fenêtre modale du menu
    $('#modal-menu').on('click', function(e) {
        var target = $(e.target);
        if (target.hasClass('popup-overlay') || !target.closest('.wpcf7').length) {
            $('.popup-overlay').addClass('fade-out-overlay');
            setTimeout(function() {
                modalMenu.dialog('close');
            }, 500);
        }
    });

    // Activer la fermeture de la fenêtre modale du contact
    $('#modal-contact').on('click', function(e) {
        var target = $(e.target);
        if (target.hasClass('popup-overlay') || !target.closest('.wpcf7').length) {
            $('.popup-overlay').addClass('fade-out-overlay');
            setTimeout(function() {
                modalContact.dialog('close');
            }, 500);
        }
    });

    // Écouter le clic sur l'élément du menu "Contact"
    contactMenuButton.on('click', function(e) {
        e.preventDefault();
        modalMenu.dialog('open');
    });

    // Écouter le clic sur le bouton "Contact"
    contactButton.on('click', function(e) {
        e.preventDefault();
        var photoRef = $(this).data('réf.photo');
        $('#referenceField').val(photoRef);
        // Réinitialiser la classe pour garantir que l'animation fonctionne correctement lors de l'ouverture suivante
        $('.popup-overlay').removeClass('fade-out-overlay');
        modalContact.dialog('open');
    });

    // ... Autres fonctionnalités selon vos besoins
});




// Fonction pour pré-remplir le champ de référence
jQuery(document).ready(function($) {
    // Fonction pour pré-remplir le champ de référence
    function prefillReferenceField() {
        // Utiliser la variable reference_data pour pré-remplir le champ
        $('input[name="your-subject"]').val(reference_data);
    }

    // Appeler la fonction pour préremplir le champ au chargement du document
    prefillReferenceField();
});






