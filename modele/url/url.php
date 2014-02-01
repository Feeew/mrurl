<?php
function get_urls()
{
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;
        
    // TODO écrire la requête qui permet de récupérer toutes les URL en base
    $sql = ''; 
    $req = $bdd->prepare($sql);
    $req->execute();
    $urls = $req->fetchAll();
    
    return $urls;
}


function get_url_by_id($id) 
{
    global $bdd;

    $req = $bdd->prepare('
        SELECT originale
        FROM url
        WHERE id=:id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $url = $req->fetch();
    
    return $url['originale'];
}


function incremente_compteur($id)
{
    global $bdd;

    // TODO écrire la requête qui met à jour le compteur d'une URL
    $sql = '';
    $req = $bdd->prepare($sql);
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    
    return $req->execute();  
}

function ajouter_url($url) 
{
    global $bdd;

    // TODO écrire la requête d'insertion de l'URL en base
    $sql = '';
    $req = $bdd->prepare($sql);
    $req->bindParam(':url', $url, PDO::PARAM_STR);
    $req->bindParam(':date', date('Y-m-d H:i:s'), PDO::PARAM_STR);

    return $req->execute(); 
}

function delete_url($id) 
{
    // TODO écrire le code de la fonction delete_url qui supprime une URL de la base
}