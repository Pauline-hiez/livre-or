<?php

// Configuration et connexion à la base de données
function get_db_connection()
{
    static $pdo = null;

    if ($pdo === null) {

        try {
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    return $pdo;
}

// Exécuter une requête (INSERT, UPDATE, DELETE)
function db_execute($query, $params = [])
{
    try {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare($query);
        return $stmt->execute($params);
    } catch (PDOException $e) {
        error_log("Erreur SQL: " . $e->getMessage());
        return false;
    }
}

// Récupérer plusieurs lignes (SELECT)
function db_select($query, $params = [])
{
    try {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("Erreur SQL: " . $e->getMessage());
        return [];
    }
}

// Récupérer une seule ligne (SELECT)
function db_select_one($query, $params = [])
{
    try {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch();
    } catch (PDOException $e) {
        error_log("Erreur SQL: " . $e->getMessage());
        return false;
    }
}

// Récupérer l'ID de la dernière insertion
function db_last_insert_id()
{
    $pdo = get_db_connection();
    return $pdo->lastInsertId();
}
