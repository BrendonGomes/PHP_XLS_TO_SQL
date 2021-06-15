<?php return array(
    'root' => array(
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => '97fac56b6bfc5d6d2d377cb8c3a993bc6b437418',
        'name' => '__root__',
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => '97fac56b6bfc5d6d2d377cb8c3a993bc6b437418',
            'dev_requirement' => false,
        ),
        'components/jquery' => array(
            'pretty_version' => '3.5.1',
            'version' => '3.5.1.0',
            'type' => 'component',
            'install_path' => __DIR__ . '/../components/jquery',
            'aliases' => array(),
            'reference' => 'b33e8f0f9a1cb2ae390cf05d766a900b53d2125b',
            'dev_requirement' => false,
        ),
        'twbs/bootstrap' => array(
            'pretty_version' => 'v5.0.1',
            'version' => '5.0.1.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../twbs/bootstrap',
            'aliases' => array(),
            'reference' => '58b1be927f43c779377e478df2d119f2ddf956ca',
            'dev_requirement' => false,
        ),
        'twitter/bootstrap' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => 'v5.0.1',
            ),
        ),
    ),
);
