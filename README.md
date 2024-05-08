# Larevel Middleware



## Create Middleware

```
php artisan make:middleware IsMaintenanceMode
```


## IsMaintenanceMode middleware content

<b>Note:</b> check app/Http/Middleware folder and here you see the file name <b>IsMaintenanceMode.php</b>

```
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('api/*')) {
            // If the request is from an API route, return 'api'
            $response = [
                'success' => false,
                'message' => 'Web is in maintenanace mode!!',
            ];
    
            $code = '404';
            
            
            return response()->json($response, $code);
        } else {
            return response()->view('main');

        }
    }
}

```


## Go to app/Http/Kernel.php

Here you register your middleware
if you register in <b>$middleware</b> variable then it register global like in web and api both 

![image](https://github.com/junaid1109/laravelMiddleware/assets/151192808/13abc3b7-d766-4458-89d1-fc5e18f6ec9c)

# for only web routes

You can write in <b>$middlewareGroups</b> and then <b>web</b> variable

![image](https://github.com/junaid1109/laravelMiddleware/assets/151192808/2e837dd4-6c0b-4c6b-9970-47ad0bafeedc)

# for only api routes

You can write in <b>$middlewareGroups</b> and then <b>api</b> variable

![image](https://github.com/junaid1109/laravelMiddleware/assets/151192808/80c7ab3a-1967-4f75-a515-e4feeb5a4f65)
