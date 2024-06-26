<?php

use function Laravel\Prompts\text;

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    | Here you can change the default title of your admin panel.
    |
    */

    'title' => 'Tablar',
    'title_prefix' => '',
    'title_postfix' => '',
    'bottom_title' => 'Tablar',
    'current_version' => 'v4.8',


    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    */

    'logo' => '<b>Tab</b>LAR',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can set up an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    */

    'auth_logo' => [
        'enabled' => true,
        'img' => [
            'path' => 'assets/PcFlex-logo.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 70,
            'height' => 70,
        ],
    ],

  

    'views_path' => null,

   

    'layout' => 'combo',
    //boxed, combo, condensed, fluid, fluid-vertical, horizontal, navbar-overlap, navbar-sticky, rtl, vertical, vertical-right, vertical-transparent

    'layout_light_sidebar' => null,
    'layout_light_topbar' => true,
    'layout_enable_top_header' => false,



    'sticky_top_nav_bar' => false,



    'classes_body' => '',


    'use_route_url' => true,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password.request',
    'password_email_url' => 'password.email',
    'profile_url' => false,
    'setting_url' => false,


    'display_alert' => false,




    'menu' => [
        [
            'text' => 'Home',
            'icon' => 'ti ti-home',
            'url' => 'home',
           
        ],
        [
            'text' => 'Bibliotecario',
            'icon' => 'ti ti-users',
            'url' => 'bibliotecarios',
            'hasAnyRole' => ['bibliotecario'] // Ocultar solo para bibliotecario
        ],
        [
            'text' => 'Usuarios',
            'icon' => 'ti ti-users-group',
            'url' => 'users',
           
        ],
        [
            'text' => 'Equipos',
            'icon' => 'ti ti-device-desktop',
            'url' => 'equipment',
            
        ],
        [
            'text' => 'Fichas',
            'icon' => 'ti ti-align-box-left-bottom',
            'url' => 'indexcards',
            'hasAnyRole' => ['cordinador'] 
            
        ],
        [
            'text' => 'Programas',
            'icon' => 'ti ti-tournament',
            'url' => 'programs',
            'hasAnyRole' => ['cordinador'] 
        ],
        [
            'text' => 'Ambientes',
            'icon' => 'ti ti-smart-home',
            'url' => 'environments',
            'hasAnyRole' => ['cordinador'] 
        ],
        [
            'text' => 'Historial',
            'icon' => 'ti ti-history',
            'url' => 'historial',
            
        ],
        [
            'text' => 'Reportes',
            'icon' => 'ti ti-message-report',
            'url' => 'disabilities',
            
        ],
    ],
    

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    |
    */

    'filters' => [
      //  TakiElias\Tablar\Menu\Filters\GateFilter::class,
        TakiElias\Tablar\Menu\Filters\HrefFilter::class,
        TakiElias\Tablar\Menu\Filters\SearchFilter::class,
        TakiElias\Tablar\Menu\Filters\ActiveFilter::class,
        TakiElias\Tablar\Menu\Filters\ClassesFilter::class,
        TakiElias\Tablar\Menu\Filters\LangFilter::class,
        TakiElias\Tablar\Menu\Filters\DataFilter::class,
        App\Filter\RolePermissionMenuFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Vite
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Vite support.
    |
    | For detailed instructions you can look the Vite here:
    | https://laravel-vite.dev
    |
    */

    'vite' => true,
];
