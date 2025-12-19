<?php
namespace app\modeles;

use Flight;

class Model {
    protected static function db() {
        return Flight::db();
    }
}
?>
