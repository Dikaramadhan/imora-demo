<?php
// app/Http/Controllers/Basic/CoreSeriesController.php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\TemplateController;

class CoreSeriesController extends TemplateController
{
    protected string $galleryPath = 'img/template/basic/core-series/gallery';
    protected string $view = 'template.basic.core-series.index';
}
