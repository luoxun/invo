<?php
return [

    "default" => [

        "host" => getenv("DB_HOST", ""),

        "username" => getenv("DB_USERNAME", ""),

        "password" => getenv("DB_PASSWORD", ""),

        "dbname" => getenv("DB_DBNAME", ""),

        "charset" => 'utf8',

        "port"=>3306,
    ],
];
