<?php
return array(
    'controllers' => array(
        'invokables' => array(
            
        ),
        'factories' => array(
            'market-post-controller'  => 'Market\Factory\PostControllerFactory',
            'market-index-controller' => 'Market\Factory\IndexControllerFactory',
            'market-view-controller'  => 'Market\Factory\ViewControllerFactory'
        ),
        'aliases' => array(
            'alt' => 'market-view-controller'
        )
    ),
    
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Literal',
                'options'=> array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'market-index-controller',
                        'action' => 'index'
                    )
                )
            ),
            
            'market' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/market',
                    'defaults' => array(
                        'controller' => 'market-index-controller',
                        'action' => 'index'
                    )
                ),
                
                'may_terminate' =>true,
                
                'child_routes' => array(
                    'slash' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/',
                            'defaults' => array(
                                'controller' => 'market-index-controller',
                                'action'     => 'index'
                            )
                        )
                    ),
                    
                    'view' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/view',
                            'defaults' => array(
                                'controller' => 'market-view-controller',
                                'action' => 'index'
                            )
                        ),
                        
                        'may_terminate' => true,
                        
                        'child_routes' => array(
                            'slash' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/',
                                    'defaults' => array(
                                        'controller' => 'market-view-controller',
                                        'action' => 'index'
                                    )
                                )
                            ),
                            
                            'index' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/main[/:category][/]',
                                    'defaults' => array(
                                        'action'=>'index'
                                    )
                                )
                            ),

                            'item' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/item[/:itemId][/]',
                                    'defaults' => array(
                                        'action' => 'item'
                                    )
                                ),
                                'constraints' => array(
                                    'itemId' => '[0-9]*'
                                )
                            )
                        )
                    ),
                    
                    
                    'market-post' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/post[/]',
                            'defaults' =>array(
                                'controller' => 'market-post-controller',
                                'action' => 'index'
                            )
                            
                        )
                    )
                )
            )
        )
    ),
    
    'service_manager' => array(
        'factories' => array(
            'market-post-form'   => 'Market\Factory\PostFormFactory',
            'market-post-filter' => 'Market\Factory\PostFilterFactory',
            'general-adapter'    => 'Zend\Db\Adapter\AdapterServiceFactory',
            'listings-table'     => 'Market\Factory\ListingsTableFactory'
        ),
        
        'services' => array(
            'date-expires' => [
                1  => "01", 
                7  => "07", 
                15 => "15", 
                21 => "21", 
                28 => "28"],
            
            'market-captcha-options' => array(
                'font' =>  __DIR__ . '/../../../data/fonts/DejaVuSans.ttf',
                'imgDir'    => $_SERVER['DOCUMENT_ROOT'] . '/img/captcha',
                'imgUrl'    => '/img/captcha',
                'fontSize' => 24,
                'height' => 50,
                'width' => 100,
                'imgAlt' => 'Captcha',
                'dotNoiseLevel' => 30,
                'lineNoiseLevel' => 6
            )
        )
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'Market' => __DIR__ . '/../view',
        )
    )
);
