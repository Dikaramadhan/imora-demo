<?php
// app/Http/Controllers/Basic/ModernaLiteController.php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\TemplateController;

class ModernaLiteController extends TemplateController
{
    protected string $galleryPath = 'img/template/basic/moderna-lite/gallery';
    protected string $view = 'template.basic.moderna-lite.index';
}
