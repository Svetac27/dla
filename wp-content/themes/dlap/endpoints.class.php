<?php

class CustomEndpoints {

    public static function test () {
        echo 'jeck';
    }

    private static function mapObject ($obj, $fieldsToShow) {
        $attachments = [
            'site_logo',
            'icon'
        ];

        $newObj = [];
        foreach ($fieldsToShow as $key => $value) {
            $returnField = $value;
            if (is_numeric($key)) {
                $field = $value;
            } else {
                $field = $key;
            }

            if (isset($obj[$field])) {
                $newObj[$returnField] = $obj[$field];

                if (in_array($field, $attachments)) {
                    $newObj[$field . '_url'] = wp_get_attachment_url($obj[$field]);
                }
            }
        }
        return (object)$newObj;
    }

    public static function get_menus () {
                
        $locations = get_nav_menu_locations();
        $menuId = array_values($locations)[0];
        $menu = wp_get_nav_menu_object($menuId);
        $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

        $filterByParent = function ($array, $parent = 0) {
            return array_filter($array, function ($arr) use ($parent) {
                $parentId = isset($arr->menu_item_parent) ? $arr->menu_item_parent : 0;
                return intval($parentId) == intval($parent);
            });
        };

        $fieldsToShow = [
            'ID',
            'post_title',
            'menu_order',
            'menu_item_parent',
            'type_label' => 'type',
            'title',
            'url',
            'target',
            'attr_title',
            'description',
            'sub_menus',
            'icon',
            'icon_class',
            'classes'
        ];
        
        // assign submenus
        $handleMenus = $menuitems;

        array_map(function ($menu) use ($filterByParent, $handleMenus, $fieldsToShow) {

            // mapping - remove unused fields
            $keys = array_keys((array)$menu);

            foreach ($keys as $key) {
                if (!in_array($key, $fieldsToShow)) {
                    unset($menu->{$key});
                }
            }

            // get menu post metas
            $options = array_map(function($meta) {
                return is_array($meta) ? $meta[0] : $meta;
            }, get_post_meta($menu->ID));

            // set post meta as main data
            foreach ($options as $key => $value) {
                if (!str_starts_with($key, '_')) {
                    $menu->{$key} = $value;
                }
            }

            // get icon if uploaded
            $menu->image_icon_url = get_field('image_icon', $menu->ID);

            // get sub menus
            $parentId = $menu->ID;
            $sub_menus = $filterByParent($handleMenus, $parentId);

            $menu->sub_menus = $sub_menus;

            /* not showing second level sub menu */
            // $menu->sub_menus = array_map(function ($sub_menu) use ($fieldsToShow) {
            //     return self::mapObject((array)$sub_menu, $fieldsToShow);
            // }, $sub_menus);

            return $menu;
        }, $menuitems);

        return $filterByParent($menuitems);
    } 

    public static function global_settings () {

        $alloptions = get_alloptions();

        $optionsToReturn = [
            'siteurl',
            'home',
            'blogname',
            'blogdescription',
            'admin_email',
            'site_logo'
        ];
        return self::mapObject($alloptions, $optionsToReturn);
    }
}

