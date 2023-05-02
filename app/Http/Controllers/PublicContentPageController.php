<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\ContentPage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PublicContentPageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $startDate = Carbon::now()->subDays(7);
        $endDate = Carbon::now();

        $contentPagesAll = ContentPage::with(['categories', 'tags', 'media'])->get();
        $contentPages = ContentPage::with(['categories', 'tags', 'media'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->take(3)
            ->get();

        return view('pages.news', compact('contentPages', 'contentPagesAll'));
    }

    public function show($title)
    {
        $contentPage = ContentPage::where('title', $title)->first();
        $contentPage->load('categories', 'tags');

        return view('pages.newsShow', compact('contentPage'));
    }
}
