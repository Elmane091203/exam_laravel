<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'departement' => 'c,r,u,d',
            'position' => 'c,r,u,d',
            'itineraire' => 'c,r,u,d',
            'passagers' => 'r,u',
            'profile' => 'r,u'
        ],
        'chauffeur' => [
            'itineraire' => 'r,u',
            'profile' => 'r,u'
        ],
        'client' => [
            'itineraire' => 'r,u',
            'profile' => 'r,u'
        ]
    ],
    'region_structure' => [
        "Dakar" => ["Dakar"],
        "Diourbel" => ["Bambey", "Diourbel", "Mbacké"],
        "Fatick" => ["Fatick", "Foundiougne", "Gossas"],
        "Kaolack" => ["Guinguinéo", "Kaolack", "Nioro du Rip"],
        "Kédougou" => ["Kédougou", "Salémata", "Saraya"],
        "Kolda" => ["Kolda", "Médina Yoro Foulah", "Vélingara"],
        "Louga" => ["Kébémer", "Linguère", "Louga"],
        "Matam" => ["Kanel", "Matam", "Ranérou"],
        "Saint-Louis" => ["Dagana", "Podor", "Saint-Louis"],
        "Sédhiou" => ["Bounkiling", "Goudomp", "Sédhiou"],
        "Tambacounda" => ["Bakel", "Goudiry", "Koumpentoum", "Tambacounda"],
        "Thiès" => ["Mbour", "Thiès", "Tivaouane"]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
