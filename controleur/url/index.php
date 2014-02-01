<?php
include_once('controleur/url/tools.php');

// R�cup�ration des derni�res URL
include_once('modele/url/url.php');

// On a pass� un param�tre � l'application
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'add') {
        // on souhaite ajouter une nouvelle URL en base
        ajouter_url($_POST['url']);
    }
}
else if ($_GET != array()) {
    // on a un param�tre en GET, c'est qu'on souhaite rediriger
    // il faut donc rediriger vers l'URL originale
    $id = key($_GET);
    // on r�cup�re l'URL d'origine
    $url = get_url_by_id($id);
    // compteur de statistiques � mettre � jour
    incremente_compteur($id);
    // redirection
    header('Location: ' . $url);
    exit;
}

$urls = get_urls();

foreach ($urls as $key => $url) {
    $urls[$key]['url_courte'] = createShortURL($url['id']);
    $urls[$key]['url_originale'] = $url['originale'];
    $date = new DateTime($url['date_creation']);
    $urls[$key]['date'] = $date->format('d-m-Y');
}

// On affiche la page (vue)
include_once('vues/url/index.php');