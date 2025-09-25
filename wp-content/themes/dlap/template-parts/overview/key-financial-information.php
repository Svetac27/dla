<section>
    <h2 class="tile-heading w-full py-2">KEY FINANCIAL INFORMATION</h2>
        
    <div class="w-full py-2">
        <?php
        get_template_part( 'template-parts/tiles/tile-3.table', null, [
            'number' => '2.83',
            'symbol' => 'm',
            'text' => 'Total Revenue Global',
            'small_text' => '(GBP)',
            'progress' => 100,
            'progress_color' => 'red'
        ]
    ); 
    ?>
    </div>
    <div class="w-full py-2">
        <?php
        get_template_part( 'template-parts/tiles/tile-3.table', null, [
            'number' => '1.25', 
            'symbol' => 'm',
            'small_text' => '(GBP)',
            'text' => 'Total Revenue International',
            'progress' => 33,
            'progress_color' => 'green'
        ]); 
        
        ?>
    </div>
    <div class="w-full py-2">
        <?php
        $collapsibles = [
            [
                'figure' => 556,
                'figure_on_right' => true,
                'symbol' => 'k',
                'text' => '2022',
                'small_text' => '(GBP)',
                'progress' => 77.4,
                'progress_color' => 'green'
            ],
            [
                'figure' => 582,
                'figure_on_right' => true,
                'symbol' => 'k',
                'text' => '2023',
                'small_text' => '(GBP)',
                'progress' => 100,
                'progress_color' => 'red'
            ]
        ];
        get_template_part( 'template-parts/tiles/tile-9.table', null, [
            'figure' => '2.8',
            'symbol' => '%',
            'text' => 'Increase in year-on-year revenue per lawyer',
            'collapsible' => $collapsibles,
        ]); 
        
        ?>
    </div>
</section>
