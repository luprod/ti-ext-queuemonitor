<?php

namespace LuProd\QueueMonitor;

use System\Classes\BaseExtension;

class Extension extends BaseExtension
{

    /**
     * @param string $schedule
     */
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
