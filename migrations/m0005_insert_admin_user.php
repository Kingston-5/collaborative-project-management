<?php

class m0005_insert_admin_user {
    public function up()
    {
        $db = kingston\icarus\Application::$app->db;
        $SQL = "INSERT INTO users (
            email,
            firstname,
            lastname,
            password
        ) VALUES (
            'admin@localhost.com',
            'Super',
            'Admin',
            '". password_hash("adminpassword", PASSWORD_DEFAULT) ."'
            )";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = kingston\icarus\Application::$app->db;
        $SQL = "DELETE FROM users WHERE `email` = 'admin@localhost.com';";
        $db->pdo->exec($SQL);
    }
}

