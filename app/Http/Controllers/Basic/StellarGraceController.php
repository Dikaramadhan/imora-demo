<?php
// app/Http/Controllers/Basic/StellarGraceController.php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\TemplateController;

class StellarGraceController extends TemplateController
{
    protected string $galleryPath = 'img/template/basic/stellar-grace/gallery';
    protected string $view = 'template.basic.stellar-grace.index';
}
