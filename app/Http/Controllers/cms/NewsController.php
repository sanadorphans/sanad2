<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    //
    public function index()
    {
        $news = News::orderBy('order','asc')->paginate(12);
        return view('cms.news.index')->with('news', $news);
    }

    public function show($id)
    {
        $new = News::find($id);
        $EnglishMonth = [
            "", "", "", "", "", "", "",
            "", "", "", "", ""
        ];
        $ArabicMonth = [
            "January", "February", "March", "April", "May", "June", "July",
            "August", "September", "October", "November", "December"
        ];

        $date = date('F Y', strtotime($new->created_at));

        if (app()->getLocale() == 'ar') {
            $date = to_arabic_number($date);
        }

        $title = $new->title;
        $other_news = News::limit(3)->get();
        return view('cms.news.show', compact(['new', 'other_news','title','date']));
    }

}
function to_arabic_number($Month)
    {
        $Month = str_replace("1", "۱", $Month);
        $Month = str_replace("2", "۲", $Month);
        $Month = str_replace("3", "۳", $Month);
        $Month = str_replace("4", "٤", $Month);
        $Month = str_replace("5", "٥", $Month);
        $Month = str_replace("6", "٦", $Month);
        $Month = str_replace("7", "۷", $Month);
        $Month = str_replace("8", "۸", $Month);
        $Month = str_replace("9", "۹", $Month);
        $Month = str_replace("0", "۰", $Month);
        $Month = str_replace("January", "يناير", $Month);
        $Month = str_replace("February", "فبراير", $Month);
        $Month = str_replace("March", "مارس", $Month);
        $Month = str_replace("April", "أبريل", $Month);
        $Month = str_replace("May", "مايو", $Month);
        $Month = str_replace("June", "يونيو", $Month);
        $Month = str_replace("July", "يليو", $Month);
        $Month = str_replace("August", "أغسطس", $Month);
        $Month = str_replace("September", "سبتمبر", $Month);
        $Month = str_replace("October", "أكتوبر", $Month);
        $Month = str_replace("November", "نوفمبر", $Month);
        $Month = str_replace("December", "ديسمبر", $Month);
        return $Month;
    }
