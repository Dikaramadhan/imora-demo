<?php
// app/Http/Controllers/Basic/PrimaryLoveController.php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\TemplateController;

class PrimaryLoveController extends TemplateController
{
    protected string $galleryPath = 'img/template/basic/primary-love/gallery';
    protected string $view = 'template.basic.primary-love.index';
}
