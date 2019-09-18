<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'AdminLTE 2',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Admin</b>LTE',

    'logo_mini' => '<b>A</b>LT',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | light variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we have the option to enable a right sidebar.
    | When active, you can use @section('right-sidebar')
    | The icon you configured will be displayed at the end of the top menu,
    | and will show/hide de sidebar.
    | The slide option will slide the sidebar over the content, while false
    | will push the content, and have no animation.
    | You can also choose the sidebar theme (dark or light).
    | The right Sidebar can only be used if layout is not top-nav.
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'admin',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and a URL. You can also specify an icon from Font
    | Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    */

    'menu' => [
        [
            'text' => 'search',
            'search' => true,
        ],
        ['header' => 'main_navigation'],
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => 'dashboard',
            'url'         => 'admin',
            'icon'        => 'fas fa-fw fa-tachometer-alt',
        ],
        [
            'text'        => 'menu',
            'url'         => 'admin/inf_menus',
            'icon'        => 'fas fa-fw fa-bars',
//            'label'       => 4,
//            'label_color' => 'success',
        ],
        [
            'text'        => 'pages',
            'url'         => 'admin/inf_pages',
            'icon'        => 'far fa-file',
        ],
        [
            'text'        => 'purposes',
            'url'         => 'admin/purposes',
            'icon'        => 'far fa-dot-circle',
        ],
        [
            'text'        => 'what_to_do',
            'url'         => 'admin/what_to_do_points',
            'icon'        => 'fas fa-map-marker-alt',
        ],
        [
            'text'        => 'terms',
            'url'         => 'admin/terms',
            'icon'        => 'fas fa-file-alt',
        ],
        [
            'text'    => 'faq',
            'icon'    => 'far fa-question-circle',
            'submenu' => [
                [
                    'text' => 'faq_questions',
                    'url'  => 'admin/faq_questions',
                    'icon' => 'fas fa-question-circle',
                ],
                [
                    'text' => 'faq_answers',
                    'url'  => 'admin/faq_answers',
                    'icon' => 'fas fa-info-circle',
                ],
            ],
        ],
        [
            'text'    => 'constitution',
            'icon'    => 'fas fa-balance-scale',
            'submenu' => [
                [
                    'text' => 'const_sections',
                    'url'  => 'admin/const_sections',
                    'icon' => 'fas fa-balance-scale-right',
                ],
                [
                    'text' => 'const_articles',
                    'url'  => 'admin/const_articles',
                    'icon' => 'fas fa-gavel',
                ],
            ],
        ],
        [
            'text'    => 'images',
            'icon'    => 'far fa-images',
            'submenu' => [
                [
                    'text' => 'images_categories',
                    'url'  => 'admin/image_categories',
                    'icon' => 'fas fa-list-alt',
                ],
                [
                    'text' => 'images',
                    'url'  => 'admin/images',
                    'icon' => 'fas fa-image',
                ],
            ],
        ],
        [
            'text'    => 'descriptions',
            'icon'    => 'fas fa-th-large',
            'submenu' => [
                [
                    'text' => 'des_blocks',
                    'url'  => 'admin/desc_blocks',
                    'icon' => 'fas fa-th-large',
                ],
                [
                    'text' => 'descriptions',
                    'url'  => 'admin/descriptions',
                    'icon' => 'fas fa-bars',
                ],
            ],
        ],
        [
            'text'    => 'components',
            'icon'    => 'fas fa-chart-pie',
            'submenu' => [
                [
                    'text' => 'languages',
                    'url'  => 'admin/languages',
                    'icon' => 'fas fa-globe',
                ],
                [
                    'text' => 'documents_id',
                    'url'  => 'admin/id_documents',
                    'icon' => 'far fa-newspaper',
                ],
                [
                    'text' => 'countries',
                    'url'  => 'admin/countries',
                    'icon' => 'fas fa-flag',
                ],
                [
                    'text' => 'social_links',
                    'url'  => 'admin/social_links',
                    'icon' => 'fas fa-users',
                ],
            ],
        ],
        [
            'text'    => 'home_page',
            'icon'    => 'fas fa-home',
            'submenu' => [
                [
                    'text' => 'introduction_points',
                    'url'  => 'admin/introduction_points',
                    'icon' => 'fas fa-map-marker-alt',
                ],
                [
                    'text' => 'introduction',
                    'url'  => 'admin/introductions',
                    'icon' => 'far fa-list-alt',
                ],
            ],
        ],
        [
            'text'    => 'active_plan',
            'icon'    => 'far fa-clock',
            'submenu' => [
                [
                    'text' => 'phases_plan',
                    'url'  => 'admin/inf_plan_phases',
                    'icon' => 'fas fa-qrcode',
                ],
                [
                    'text' => 'phases_plan_directions',
                    'url'  => 'admin/inf_plan_phase_sections',
                    'icon' => 'fas fa-map-signs',
                ],
                [
                    'text' => 'plan_points',
                    'url'  => 'admin/inf_plan_phase_section_points',
                    'icon' => 'fas fa-map-pin',
                ],
            ],
        ],
        [
            'text'    => 'video',
            'icon'    => 'far fa-play-circle',
            'submenu' => [
                [
                    'text' => 'video_groups',
                    'url'  => 'admin/inf_video_groups',
                    'icon' => 'far fa-file-video',
                ],
                [
                    'text' => 'video_group_sectors',
                    'url'  => 'admin/inf_video_group_sections',
                    'icon' => 'fas fa-file-audio',
                ],
                [
                    'text' => 'videos',
                    'url'  => 'admin/inf_videos',
                    'icon' => 'fab fa-youtube',
                ],
            ],
        ],
        [
            'text' => 'subscribers',
            'url'  => 'admin/subscribers',
            'icon' => 'fas fa-user-plus',
        ],
        ['header' => 'account_settings'],
        [
            'text' => 'profile',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'change_password',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-lock',
        ],
        [
            'text'    => 'multilevel',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
                [
                    'text'    => 'level_one',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
            ],
        ],
        ['header' => 'labels'],
        [
            'text'       => 'important',
            'icon_color' => 'red',
        ],
        [
            'text'       => 'warning',
            'icon_color' => 'yellow',
        ],
        [
            'text'       => 'information',
            'icon_color' => 'aqua',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Configure which JavaScript plugins should be included. At this moment,
    | DataTables, Select2, Chartjs and SweetAlert are added out-of-the-box,
    | including the Javascript and CSS files from a CDN via script and link tag.
    | Plugin Name, active status and files array (even empty) are required.
    | Files, when added, need to have type (js or css), asset (true or false) and location (string).
    | When asset is set to true, the location will be output using asset() function.
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css',
                ],
            ],
        ],
        [
            'name' => 'Select2',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        [
            'name' => 'Chartjs',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        [
            'name' => 'Pace',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        [
            'name' => 'bootstrap-wysihtml5',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
                ],
            ],
        ],
    ],
];
