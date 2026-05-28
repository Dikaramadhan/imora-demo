<?php
// app/Http/Controllers/Basic/PlatinumMinimalController.php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\TemplateController;

class PlatinumMinimalController extends TemplateController
{
    protected string $galleryPath = 'img/template/basic/platinum-minimal/gallery';
    protected string $view = 'template.basic.platinum-minimal.index';
}
