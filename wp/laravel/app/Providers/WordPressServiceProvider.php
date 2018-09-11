<?php

class WordPressServiceProvider extends ServiceProvider {

    protected $bootstrapFilePath = '../../wp-load.php';

    public function boot() {
        // Load assets
        wp_enqueue_style('app', '/app/public/app.css');
    }

    public function register() {
        // Load wordpress bootstrap file
        if(File::exists($this->bootstrapFilePath)) {
            require_once $this->bootstrapFilePath;
        } else throw new \RuntimeException('WordPress Bootstrap file not found!');
    }

}