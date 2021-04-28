<?php

namespace Luca\QueueMonitor;

class Extension extends \System\Classes\BaseExtension
{

    public function registerSchedule($schedule)
    {
        $schedule->command('cache:clear')
            ->weekly();

        $schedule->command('queue:restart')
            ->hourly();

        $schedule->command('queue:work --sleep=3 --timeout=60 --tries=3 --queue=high,default,low')
            ->runInBackground()
            ->withoutOverlapping()
            ->everyMinute()
            ->appendOutputTo(storage_path().'/logs/system.log');
    }

}
