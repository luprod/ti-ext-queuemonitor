# Queue Monitor for shared Web Hosting 

Monitor queue process on a shared web hosting where you cannot install a governor/supervisor.

### Installing

Simply install the extension from the marketplace and add this cronjob to your server:

`* * * * * php /path_from_root_to_laravel_proj_folder/artisan schedule:run >> /dev/null 2>&1`

#### Remember to check System logs to ensure everything is working as expected

**Note**: System mutex to avoid precess overlapping is cache based instead of file based so if you have problem manually clear the cache
