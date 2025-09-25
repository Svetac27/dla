<section>
    <h2 class="tile-heading w-full py-2">QUICK FACTS</h2>
    <div class="row w-full flex">
        <div class="w-1/2 py-2 pr-2">
            <?php get_template_part( 'template-parts/tiles/tile-7', null, [
                'number' => 90,
                'symbol' => '+',
                'text' => 'Offices'
            ]); ?>
        </div>
        
        <div class="w-1/2 py-2 pl-2">
            <?php get_template_part( 'template-parts/tiles/tile-8', null, [
                'number' => 40,
                'symbol' => '+',
                'text' => 'Countries',
                'link' => '/regions'
            ]); ?>
        </div>
    </div>
    
        
    <div class="w-full py-2">
        <?php get_template_part( 'template-parts/tiles/tile-9.table', null, [
            'number' => '5,500',
            'symbol' => '+',
            'title' => 'Lawyers',
            'collapsible' => [
                [
                    'figure' => '4,734',
                    'text' => 'Firmwide Total Lawyers',
                    'progress' => 85,
                    'progress_color' => 'red'
                    
                ],
                [
                    'figure' => '1,309',
                    'text' => 'Firmwide Total Partners',
                    'progress' => 25,
                    'progress_color' => 'green'
                ],
                [
                    'figure' => '71',
                    'text' => 'Lateral Hires (2022-2023)',
                    'progress' => 5,
                    'progress_color' => 'mid-blue'
                ],
                [
                    'figure' => '72',
                    'text' => 'Partner Promotions (2022-2023)',
                    'progress' => 5,
                    'progress_color' => 'mid-blue'
                ],
            ]
        ]); ?>
    </div>
</section>
