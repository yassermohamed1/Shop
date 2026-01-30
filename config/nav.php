<?php

return [

    [
        "title" => "Dashboard",
        "icon"  => "ri-home-line",
        "class" => "sidebar-link sidebar-title link-nav",
        "route" => "dashboard",
        "children" => []
    ],

    [
        "title" => "Product",
        "icon"  => "ri-store-3-line",
        "class" => "linear-icon-link sidebar-link sidebar-title",
        "children" => [
            ["title" => "Products", "route" => "products.index"],
            ["title" => "Add New Products", "route" => "products.create"],
        ]
    ],

    [
        "title" => "Category",
        "icon"  => "ri-list-check-2",
        "class" => "linear-icon-link sidebar-link sidebar-title",
        "children" => [
            ["title" => "Category List", "route" => "categories.index"],
            ["title" => "Add New Category", "route" => "categories.create"],
            ["title" => "Add New SubCategory", "route" => "sub-subcategories.create"],
        ]
    ],

    [
        "title" => "Attributes",
        "icon"  => "ri-list-settings-line",
        "class" => "linear-icon-link sidebar-link sidebar-title",
        "children" => [
            ["title" => "Attributes", "url" => "attributes.html"],
            ["title" => "Add Attributes", "url" => "add-new-attributes.html"],
        ]
    ],

    [
        "title" => "Users",
        "icon"  => "ri-user-3-line",
        "class" => "sidebar-link sidebar-title",
        "children" => [
            ["title" => "All Users", "route" => "users.index"],
            ["title" => "Add New User", "route" => "users.create"],
        ]
    ],

    [
        "title" => "Roles",
        "icon"  => "ri-user-3-line",
        "class" => "sidebar-link sidebar-title",
        "children" => [
            ["title" => "All Roles", "route" => "roles.index"],
            ["title" => "Create Role", "route" => "roles.create"],
        ]
    ],

    [
        "title" => "Orders",
        "icon"  => "ri-archive-line",
        "class" => "sidebar-link sidebar-title",
        "children" => [
            ["title" => "Order List", "url" => "order-list.html"],
            ["title" => "Order Detail", "url" => "order-detail.html"],
            ["title" => "Order Tracking", "url" => "order-tracking.html"],
        ]
    ],

    [
        "title" => "Localization",
        "icon"  => "ri-focus-3-line",
        "class" => "linear-icon-link sidebar-link sidebar-title",
        "children" => [
            ["title" => "Translation", "url" => "translation.html"],
            ["title" => "Currency Rates", "url" => "currency-rates.html"],
        ]
    ],

    [
        "title" => "Media",
        "icon"  => "ri-price-tag-3-line",
        "class" => "sidebar-link sidebar-title link-nav",
        "route" => "media.index",
        "children" => []
    ],

];
