<?php
namespace App\Http\Middleware;
use App\Models\User;
use Closure;
use Auth;
use Cache;
use Carbon\Carbon;
class ActivityByUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(1); // keep online for 1 min
            Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
            // last seen
            User::where('id', Auth::user()->id)->update(['updated_at' => (new \DateTime())->format("Y-m-d H:i:s")]);
        }
        return $next($request);
    }
}