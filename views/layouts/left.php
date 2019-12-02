<aside class="main-sidebar">

    <section class="sidebar">

    <?php
        $session = Yii::$app->session;
        if($session->has('email')){
            if($session->get('jabatan') === 'admin'){
                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                        'items' => [
                            ['label' => 'Home','icon' => 'home','url' => ['/site/index']],    
                            ['label' => 'Master Organisasi','icon' => 'clipboard','url' =>['/master-daftar-organisasi']],                  
                            ['label' => 'Master Tenggat Waktu','icon' => 'clipboard','url' => ['/master-tenggat-waktu']],
                            ['label' => 'Master Periode','icon' => 'clipboard','url' => ['/master-periode']],
                            ['label' => 'Master TTD','icon' => 'clipboard','url' => ['/master-ttd']],
                            ['label' => 'Program Kerja','icon' => 'clipboard','url' =>['/program-kerja']],
                            ['label' => 'Proposal','icon' => 'clipboard','url' =>['/monitoring-proposal']],
                            ['label' => 'LPK','icon' => 'clipboard','url' =>['/lembar-pertanggung-jawaban-keuangan']],
                            ['label' => 'LPJ','icon' => 'clipboard','url' =>['/lat']],
                            [
                                'label' => 'Some tools',
                                'icon' => 'share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                                    [
                                        'label' => 'Level One',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                            [
                                                'label' => 'Level Two',
                                                'icon' => 'circle-o',
                                                'url' => '#',
                                                'items' => [
                                                    ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                                    ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ]
                );
            }
        } else {
            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                    'items' => [
                        ['label' => 'Home','icon' => 'home','url' => ['/site/index']],            
                    ],
                ]
            );
        }
    ?>
    </section>

</aside>
