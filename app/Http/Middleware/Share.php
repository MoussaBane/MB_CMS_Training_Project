<?php

namespace App\Http\Middleware;

use App\Models\Page;
use App\Models\Settings;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Share
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $settings = Settings::all();
        //dd($settings);

        foreach ($settings as $setting) {
            $data[$setting->settings_key] = $setting->settings_value;
        }


        $page = Page::orderBy('page_must')->first();
        $data['slug'] = $page->page_slug;

        //dd($data);
        View::share($data);

        return $next($request);
    }
}
