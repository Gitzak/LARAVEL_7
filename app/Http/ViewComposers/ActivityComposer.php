<?php 

namespace App\Http\ViewComposers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ActivityComposer
{
    public function Compose(View $view){
        $mostCommented = Cache::remember('mostCommented', now()->addSeconds(10), function () {
            return Post::mostCommented()->take(5)->get();
        });

        $mostUserActive = Cache::remember('mostUserActive', now()->addSeconds(10), function () {
            return User::mostUserActive()->take(5)->get();
        });

        $mostUserActiveInLastMonth = Cache::remember('mostUserActiveInLastMonth', now()->addSeconds(10), function () {
            return User::mostUserActiveInLastMonth()->take(5)->get();
        });

        $view->with([
            'mostCommented' => $mostCommented,
            'mostUserActive' => $mostUserActive,
            'mostUserActiveInLastMonth' => $mostUserActiveInLastMonth,
        ]);

        

    }
}

?>