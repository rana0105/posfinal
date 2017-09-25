<?php

namespace App;

class Permission extends \Spatie\Permission\Models\Permission
{

    public static function defaultPermissions()
    {
        return [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_posts',
            'add_posts',
            'edit_posts',
            'delete_posts',

            'view_procategories',
            'add_procategories',
            'edit_procategories',
            'delete_procategories',

            'view_brands',
            'add_brands',
            'edit_brands',
            'delete_brands',

            'view_suppliers',
            'add_suppliers',
            'edit_suppliers',
            'delete_suppliers',

            'view_customertypes',
            'add_customertypes',
            'edit_customertypes',
            'delete_customertypes',

            'view_customers',
            'add_customers',
            'edit_customers',
            'delete_customers',

            'view_products',
            'add_products',
            'edit_products',
            'delete_products',

            'view_stocks',
            'add_stocks',
            'edit_stocks',
            'delete_stocks',

            'view_stocks',
            'add_stocks',
            'edit_stocks',
            'delete_stocks',

            'view_purchases',
            'add_purchases',
            'edit_purchases',
            'delete_purchases',

            'view_sales',
            'add_sales',
            'edit_sales',
            'delete_sales',

            'view_accounts',
            'add_accounts',
            'edit_accounts',
            'delete_accounts',

            'view_sinvoices',
            'add_sinvoices',
            'edit_sinvoices',
            'delete_sinvoices',
        ];
    }
}
