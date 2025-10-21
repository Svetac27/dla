<?php
	/* Template Name: Tiles */
?>

<?php get_header(); ?>

<style>
/* for this page only */
.tile-heading.w-full {
    margin-bottom: 5.25rem;
    font-size: 12px;
}

</style>

<div class="text-white">
	<div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-x-14 gap-y-20">
        <div class="w-full">
            <h2 class="header-text w-full">Tile M1</h2>
            <div class="tile-heading w-full">Tile with Icon and List</div>

            <?php
                get_template_part( 'template-parts/tiles/tile-m1-info', null, [
                    'title' => 'Bold',
                    'description' => 'We are fearless and inquisitive, challenging ourselves to think big and find creative new solutions',
                    'image' => 'https://quickfactsapp.wpenginepowered.com/wp-content/uploads/2024/02/BE-BOLD.png',
                    'smallerImage' => true,
                ]);
            ?>
        </div>
        <div class="w-full">
        <h2 class="header-text w-full">Tile M2</h2>
        <div class="tile-heading w-full">Tile Campaign</div>

        <?php
            get_template_part( 'template-parts/tiles/tile-m2-campaign', null, [
                'title' => 'DLA Piper and UN AI for Good',
                'description' => 'DLA Piper is proud to be the founding law firm of the United Nations’ AI for Good Law Track',
                'link' => '/dla-piper-and-un',
                'backgroundUrl' => '../wp-content/uploads/2025/10/image.jpg'
            ]);
        ?>
        </div>
        <div class="w-full">
            <h2 class="header-text w-full">Tile M3</h2>
            <div class="tile-heading w-full">Tile with Icon, Title and List</div>

            <?php
                get_template_part( 'template-parts/tiles/tile-m3-list', null, [
                    'title' => 'STRATEGIC AMBITIONS',
                    'image' => '/wp-content/uploads/2024/09/groups_24dp_FCBE04_FILL1_wght200_GRAD0_opsz24.png',
                    'bulletColor' => '#fcbe04',
                    'list' => [
                        'Empower our people to excel',
                        'Elevate our client base',
                        'Unlock the potential of our global platform and brand'
                    ],
                ]);
            ?>
        </div>
        <div class="w-full">
            <h2 class="header-text w-full">Tile M4</h2>
            <div class="tile-heading w-full">Tile with Rich Text</div>

            <?php
                get_template_part( 'template-parts/tiles/tile-m4-rich-text', null, [
                    'title' => 'LAW&, PEOPLE, TECHNOLOGY, INNOVATION',
                    'image' => '/wp-content/uploads/2024/09/groups_24dp_FCBE04_FILL1_wght200_GRAD0_opsz24.png',
                    'bulletColor' => '#fcbe04',
                    'description' => '<h3>This is a heading</h3>
                    <p>This is some placeholder body text lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a href="#">This is a link</a>
                    <bold>This is bold text</bold>
                    <italic>This is italic text</italic>',
                    'richText' => '
                    <h3>This is a heading</h3>
                    <p>This is some placeholder body text lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a href="#">This is a link</a>
                    <bold>This is bold text</bold>
                    <italic>This is italic text</italic>
                    <ol>
                        <li>This is an order list item</li>
                        <li>This is an order list item</li>
                        <li>This is an order list item</li>
                    </ol>
                    <ul>
                        <li>This is an unordered list item</li>
                        <li>This is an unordered list item</li>
                        <li>This is an unordered list item</li>
                        <li>This is an unordered list item</li>
                    </ul>
                    ',
                ]);
            ?>
        </div>
        <div class="w-full">
            <h2 class="header-text w-full">Tile M5</h2>
            <div class="tile-heading w-full">Tile with Text</div>

            <?php
                get_template_part( 'template-parts/tiles/tile-m5-simple', null, [
                    'title' => 'LAW&, PEOPLE, TECHNOLOGY, INNOVATION',
                    'text' => 'This is some placeholder body text lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                ]);
            ?>
        </div>
        <div class="w-full">
            <h2 class="header-text w-full">Tile M6</h2>
            <div class="tile-heading w-full">Tile with Notification</div>

            <?php
                get_template_part( 'template-parts/tiles/tile-m6-notification', null, [
                    'title' => 'Recent Updates',
                    'message' => 'DLA Piper continues to share timely insights and updates for clients, colleagues, and partners across industries. Recent announcements highlight the firm’s work in supporting businesses navigating evolving regulations, market shifts, and global challenges.\n\nThe firm has been active in publishing quick analyses of policy changes, providing practical takeaways for businesses operating in complex legal landscapes. These updates are designed to be concise, accessible, and directly relevant to decision makers.\n\nIn addition, DLA Piper regularly announces upcoming events, client alerts, and thought leadership pieces. These resources aim to help clients anticipate and respond to developments that could impact their operations.\n\nBy using this app, readers can stay connected to the latest news and announcements in one convenient place. Each notification provides a quick entry point into the broader set of insights available through DLA Piper’s global platform.\n',
                    'created_at' => '5 hours ago',
                    'slug' => '/notifications',
                    'readed' => false,
                ]);
            ?>
        </div>
        <div class="w-full">
            <h2 class="header-text w-full">Tile 1</h2>
            <div class="tile-heading w-full">Figure with Text</div>

            <?php
                get_template_part( 'template-parts/tiles/tile-1.table', null, [
                    'number' => 215,
                    'symbol' => 'K',
                    'text' => 'Over 215,000 pro bono hours in 2022'
                ]);
            ?>
        </div>

        <div class="w-full">
            <h2 class="header-text w-full">Tile 2</h2>
            <div class="tile-heading w-full">Figure with Text and Progress Bar</div>
            <?php $value = rand(0, 100);
                $colors = availableColors();
            ?>
            <?php get_template_part( 'template-parts/tiles/tile-1.table', null, [
                'figure' => $value,
                'symbol' => '%',
                'text' => 'Promoted partners in 2023 from underrepresented groups, with a target of at least 50% each year',
                'progress' => $value,
                'progress_color' => $colors[rand(0, 4)]
            ]); ?>
        </div>

        <div class="w-full">
            <h2 class="header-text w-full">Tile 3</h2>
            <div class="tile-heading w-full">Progress Bar with Figure</div>

            <?php
            $value = rand(0, 100);
            get_template_part( 'template-parts/tiles/tile-3.table', null, [
                'number' => '2.83',
                'symbol' => 'm',
                'text' => 'Total Revenue Global',
                'small_text' => 'USD',
                'progress' => $value,
                'progress_color' => $colors[rand(0, 4)]
            ]); ?>
        </div>

        <div class="w-full">
            <h2 class="header-text w-full">Tile 4</h2>
            <div class="tile-heading w-full">Tile with Donut Graphs</div>

            <?php get_template_part( 'template-parts/tiles/tile-4', null, [
                'title' => 'FEMALE PARTNERS',
                'items' => [
                    [
                        'progress' => [25, 'green'],
                        'text' => 2023
                    ],
                    [
                        'progress' => [30, 'yellow'],
                        'text' => 'by 2025'
                    ],
                    [
                        'progress' => [40, 'red'],
                        'text' => 'by 2030'
                    ]
                ]
            ]); ?>
        </div>
        <div class="w-full">
            <h2 class="header-text w-full">Tile 5</h2>
            <div class="tile-heading w-full">Tile with donut graphs and additional text</div>

            <?php get_template_part( 'template-parts/tiles/tile-4', null, [
                'title' => 'Reduction in Emissions',
                'sub-title' => 'against our 2019 baseline year',
                'text' => '*Targets externally validated by SBTi (Science Based Targets initiative)',
                'items' => [
                    [
                        'progress' => [41, 'green'],
                        'text' => 2023
                    ],
                    [
                        'progress' => [50, 'yellow'],
                        'text' => 'by 2030*'
                    ],
                    [
                        'progress' => [100, 'red'],
                        'text' => 'by 2040*'
                    ]
                ]
            ]); ?>
        </div>
        <div class="w-full">
            <h2 class="header-text w-full">Tile 6</h2>
            <div class="tile-heading w-full">Icon with bullet points</div>

            <?php
                get_template_part( 'template-parts/tiles/tile-6', null, [
                    'image' => '/wp-content/uploads/2024/02/trophy_FILL0_wght100_GRAD0_opsz24.png',
                    'items' => [
                        'Financial Times Innovative Lawyers Awards',
                        'Law.com Local Innovations Awards',
                        'Only law firm featured in the Reuters 50 Leaders of Change series'
                    ],
                ]); ?>
        </div>
        <div class="w-full">
            <h2 class="header-text w-full">Tile 7</h2>
            <div class="tile-heading w-full">Figure with title</div>

            <div class="max-w-40">
                <?php get_template_part( 'template-parts/tiles/tile-7', null, [
                    'figure' => '00',
                    'symbol' => '+',
                    'title' => 'Lorem'
                ]); ?>
            </div>
        </div>

        <div class="w-full">
            <h2 class="header-text w-full">Tile 8</h2>
            <div class="tile-heading w-full">Figure with title and link</div>

            <div class="max-w-40">
                <?php get_template_part( 'template-parts/tiles/tile-7', null, [
                    'figure' => '00',
                    'symbol' => '+',
                    'title' => 'Lorem',
                    'link' => '/test'
                ]); ?>
            </div>
        </div>


        <div class="w-full">
            <h2 class="header-text w-full">Tile 9</h2>
            <div class="tile-heading w-full">Figure with title and collapsible</div>

            <?php get_template_part( 'template-parts/tiles/tile-9.table', null, [
                    'figure' => '00',
                    'symbol' => '+',
                    'title' => 'Lorem',
                    'items' => [
                        'Item 1',
                        'Item 2',
                        'Item 3',
                        'Item 4',
                        'Item 5',
                    ]
            ]); ?>
        </div>


        <div class="w-full">
            <h2 class="header-text w-full">Tile 10</h2>
            <div class="tile-heading w-full">Figure with text and collapsible</div>

            <?php get_template_part( 'template-parts/tiles/tile-9.table', null, [
                    'figure' => '00',
                    'symbol' => '%',
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do',
                    'items' => [
                        'Item 1',
                        'Item 2',
                        'Item 3',
                        'Item 4',
                        'Item 5',
                    ]
            ]); ?>
        </div>

        <div class="w-full">
            <h2 class="header-text w-full">Tile 11</h2>
            <div class="tile-heading w-full">Open collapsible with figures and progress bars</div>
            <?php
                $colors = availableColors();
                $collapsibles = [];
                $numberOfitems = 5;
                for ($i = 0; $i < $numberOfitems; $i++) {
                    $colorClass = $colors[rand(0, 4)];
                    $progress_color = $colorClass;
                    $figure = rand(1, 100);

                    $collapsibles[] = [
                        'figure' => $figure,
                        'text' => 'Lorem',
                        'progress' => $figure,
                        'progress_color' => $progress_color
                    ];
                }
            ?>
            <?php get_template_part( 'template-parts/tiles/tile-9.table', null, [
                    'figure' => '000',
                    'symbol' => '+',
                    'title' => 'Lorem',
                    'collapsible' => $collapsibles,
                    'is_opened' => true
            ]); ?>
        </div>

        <div class="w-full">
            <h2 class="header-text w-full">Tile 12</h2>
            <div class="tile-heading w-full">Open collapsible with progress bars and figures</div>
            <?php
                $colors = availableColors();
                $collapsibles = [];
                $numberOfitems = 5;
                for ($i = 0; $i < $numberOfitems; $i++) {
                    $colorClass = $colors[rand(0, 4)];
                    $progress_color = $colorClass;
                    $figure = rand(1, 100);

                    $collapsibles[] = [
                        'figure' => $figure,
                        'figure_on_right' => true,
                        'symbol' => 'K',
                        'text' => 'Lorem',
                        'small_text' => '(GBP)',
                        'progress' => $figure,
                        'progress_color' => $progress_color
                    ];
                }
            ?>
            <?php get_template_part( 'template-parts/tiles/tile-9.table', null, [
                    'figure' => '000',
                    'symbol' => '%',
                    'text' => 'Lorem ipsum dolor sit amet, consectetur',
                    'collapsible' => $collapsibles,
                    'is_opened' => true
            ]); ?>
        </div>


        <div class="w-full">
            <h2 class="header-text w-full">Tile 13</h2>
            <div class="tile-heading w-full">Title, sub-title and link</div>

            <div class="max-w-40">
            <?php get_template_part( 'template-parts/tiles/tile-13', null, [
                'title' => 'Africa',
                'text' => '20 countries',
                'link' => '/regions/africa'
            ]); ?>
        </div>
        </div>

        <div class="w-full">
            <h2 class="header-text w-full">Tile 14</h2>
            <div class="tile-heading w-full">Title with external link</div>

            <?php get_template_part( 'template-parts/tiles/tile-14', null, [
                'title' => 'Lorem',
                'link' => '/test',
                'is_external_link' => true
            ]); ?>
        </div>

        <div class="w-full">
            <h2 class="header-text w-full">Tile 15</h2>
            <div class="tile-heading w-full">Title with collapsible</div>

            <?php get_template_part( 'template-parts/tiles/tile-9.table', null, [
                    'title' => 'Lorem',
                    'items' => [
                        'Item 1',
                        'Item 2',
                        'Item 3',
                        'Item 4',
                        'Item 5',
                    ]
            ]); ?>
        </div>

        <div class="w-full">
            <h2 class="header-text w-full">Tile 16</h2>
            <div class="tile-heading w-full">Open collapsible with bullet point list</div>

            <?php get_template_part( 'template-parts/tiles/tile-9.table', null, [
                    'title' => 'Lorem',
                    'is_opened' => true,
                    'items' => [
                        'Item 1',
                        'Item 2',
                        'Item 3',
                        'Item 4',
                        'Item 5',
                    ]
            ]); ?>
        </div>


        <div class="w-full">
            <h2 class="header-text w-full">Tile 17</h2>
            <div class="tile-heading w-full">Icon with Title and text</div>

            <?php get_template_part( 'template-parts/tiles/tile-6', null, [
                'image' => 'https://quickfactsapp.wpenginepowered.com/wp-content/uploads/2024/02/BE-BOLD.png',
                'title' => 'Lorem',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do'
            ]); ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>