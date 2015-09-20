<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'market-index-controller' => 'Market\Controller\IndexController',
            'market-view-controller'  => 'Market\Controller\ViewController'
        ),
        'factories' => array(
            'market-post-controller' => 'Market\Factory\PostControllerFactory'            
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
            'market-post-form' => 'Market\Factory\PostFormFactory',
            'market-post-filter' => 'Market\Factory\PostFilterFactory'
        ),
        
        'services' => array(
            'date-expires' => [
                1  => "01", 
                7  => "07", 
                15 => "15", 
                21 => "21", 
                28 => "28"]
        )
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'Market' => __DIR__ . '/../view',
        )
    )
);
