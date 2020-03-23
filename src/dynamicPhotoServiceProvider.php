<?php

namespace MichaelFrank\EditorPost;

use Illuminate\Support\ServiceProvider;

class EditorPostServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'\config\dynamicPhoto.php' => config_path('dynamicPhoto.php'),
        ]);
    }

}
