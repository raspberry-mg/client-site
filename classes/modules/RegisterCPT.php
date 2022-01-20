<?php

namespace theme_for_nix\classes\modules;

class RegisterCPT
{
    public function __construct(){
        add_action( 'init', [ $this, 'registerCPT' ] );
    }

    public function registerCPT() {
        $config = $this->get_config();

        foreach ( $config as $CPT ) {
            $name = $CPT[ 'name' ];
            $args = $CPT[ 'args' ];

            register_post_type( $name, $args );
        }
    }

    private function get_config(): array {
        return include get_template_directory() . '/customConfigs/CustomCPT.php';
    }

}
