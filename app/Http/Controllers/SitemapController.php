<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $baseUrl = config('app.url');

        $pages = [
            [
                'url'      => $baseUrl . '/',
                'priority' => '1.0',
                'freq'     => 'weekly',
            ],
        ];

        $templates = [
            'platinum-lite',
            'serene-glow',
            'aura-silver',
            'serenity-luxe',
            'platinum-minimal',
            'stellar-grace',
            'core-series',
            'moderna-lite',
        ];

        foreach ($templates as $slug) {
            $pages[] = [
                'url'      => $baseUrl . '/template/' . $slug,
                'priority' => '0.8',
                'freq'     => 'monthly',
            ];
        }

        $xml = view('sitemap', compact('pages'))->render();

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
}
