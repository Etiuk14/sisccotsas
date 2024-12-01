<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ErrorNotification;
use Throwable;

class Handler extends ExceptionHandler
{
    // ...

    public function report(Throwable $exception)
    {
        if ($this->shouldReport($exception)) {
            Notification::route('slack', config('services.slack.webhook_url'))
                ->notify(new ErrorNotification($exception->getMessage()));
        }

        parent::report($exception);
    }

    // ...
}