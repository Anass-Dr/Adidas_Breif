<?php

namespace App\Services;

use App\Models\Token as TokenModel;
use Carbon\Carbon;
use Illuminate\Support\Str;


class Token
{
    public static function generate($user)
    {
        $genToken = Str::random(40);
        $expiredTime = Carbon::now('UTC')->addMinutes(10);

        $token = TokenModel::where('user_id', $user->user_id)->first();

        if (!$token) {
            $token = new TokenModel();
            $token->user_id = $user->id;
        }
        $token->content = $genToken;
        $token->expiredAt = $expiredTime;
        $token->save();
        return $genToken;
    }

    public static function check ($token) {
        $tokenRecord = TokenModel::where('content', $token)->first();
        if ($tokenRecord && $tokenRecord->expiredAt > Carbon::now('UTC')) {
            return true;
        } else {
            return false;
        }
    }
}
