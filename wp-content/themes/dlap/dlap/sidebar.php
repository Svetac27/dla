<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DLAP
 */

$menus = getMenus();

?>

<nav>
    <ul class="menus grid grid-cols-5 items-end">
        <?php foreach ($menus as $menu): ?>
            <li class="w-full <?php echo implode(' ', $menu->classes); ?>">
                <a href="<?php echo $menu->url; ?>">
                    <span class="w-full block">
                        <?php if (isset($menu->icon_class) && strlen($menu->icon_class) > 0): ?>
                            <i class="icon-<?php echo $menu->icon_class; ?>"></i>
                        <?php else: ?>
                            &nbsp;
                        <?php endif; ?>
                    </span>
                    <span class="w-full block text-[0.8rem] font-[400]"><?php echo $menu->title; ?></span>
                </a>        
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
