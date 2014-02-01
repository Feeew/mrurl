<?php

function createShortURL($id) {
    return 'http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"] . '?' . $id;  
}