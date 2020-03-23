<?php

namespace MichaelFrank\dynamicphoto;

use Illuminate\Support\ServiceProvider;

class dynamicPhotoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'\config\dynamicPhoto.php' => config_path('dynamicPhoto.php'),
        ]);
    }

}
