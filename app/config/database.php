<?php
return [

    "default" => [

        "DB_HOST" => getenv("DB_HOST", ""),

        "DB_USERNAME" => getenv("DB_USERNAME", ""),

        "DB_PASSWORD" => getenv("DB_PASSWORD", ""),

        "DB_DBNAME" => getenv("DB_DBNAME", ""),
    ],
];
