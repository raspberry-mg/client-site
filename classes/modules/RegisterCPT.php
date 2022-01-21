<?php

namespace client_site\classes\modules;

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

    private function get_config() {
        return include get_template_directory() .  '/custom-config/CustomCPT.php';
    }

}
