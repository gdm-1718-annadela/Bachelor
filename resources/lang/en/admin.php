<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'username' => 'Username',
            'name' => 'Name',
            'firstname' => 'Firstname',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            'age' => 'Age',
            'story' => 'Story',
            'picturetitle' => 'Picturetitle',
            'picturepath' => 'Picturepath',
            'password' => 'Password',
            'type_id' => 'Type',
            
        ],
    ],

    'mood' => [
        'title' => 'Mood',

        'actions' => [
            'index' => 'Mood',
            'create' => 'New Mood',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'mood' => 'Mood',
            'picturetitle' => 'Picturetitle',
            'picturepath' => 'Picturepath',
            
        ],
    ],

    'category' => [
        'title' => 'Category',

        'actions' => [
            'index' => 'Category',
            'create' => 'New Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'type' => 'Type',
            
        ],
    ],

    'message' => [
        'title' => 'Message',

        'actions' => [
            'index' => 'Message',
            'create' => 'New Message',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'message' => 'Message',
            'sender_id' => 'Sender',
            'receiver_id' => 'Receiver',
            'chat_id' => 'Chat',
            
        ],
    ],

    'contact' => [
        'title' => 'Contact',

        'actions' => [
            'index' => 'Contact',
            'create' => 'New Contact',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'comment' => 'Comment',
            'user_id' => 'User',
            
        ],
    ],

    'image' => [
        'title' => 'Image',

        'actions' => [
            'index' => 'Image',
            'create' => 'New Image',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'path' => 'Path',
            'caption' => 'Caption',
            'title' => 'Title',
            'type' => 'Type',
            'story_id' => 'Story',
            
        ],
    ],

    'story' => [
        'title' => 'Story',

        'actions' => [
            'index' => 'Story',
            'create' => 'New Story',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'user_id' => 'User',
            'category_id' => 'Category',
            'mood_id' => 'Mood',
            'type_id' => 'Type',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];