<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'description', 'active', 'main_category', 'is_hase_sub_category', 'type_category', 'sort', 'created_at', 'updated_at',
    ];



    ############################ Begain main category ######################################################
    public function ScopeSortNumberLastMainCategory($query){
        try {
            return $query ->select('sort')-> where('main_category', 0)->orderBy('id', 'DESC')->first()->sort;
        }catch (\Exception $ex){
            return 0;
        }

    }

    public function ScopeActiveMainCategory($query){
        return $query -> where(['active'=> 1, 'main_category'=> 0]);
    }


    public function ScopeGetAllMainCategory($query){

        return $query-> select('id', 'name', 'description', 'type_category', 'is_hase_sub_category', 'image','active','sort')->where('main_category', 0)->orderBy('sort', 'asc');
    }

    public function getActive(){
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function getImageAttribute($val){
        return ($val !== null) ? asset('assets/'. $val) : "";
    }

    ############################ End main category ######################################################


    ############################ Begain sub category ######################################################
    public function ScopeSortNumberLastSubCategory($query, $mainCategory){
        try {

           return  $this->where('main_category',$mainCategory)->orderBy('sort', 'desc')->first()->sort;
        }catch (\Exception $ex){
            return 0;
        }
        //ErrorException: Trying to get property 'sort' of non-object in C:\wamp64\www\ecommerce\app\Models\Category.php:51Stack trace:#0 C:\wamp64\www\ecommerce\app\Models\Category.php(51): Illuminate\Foundation\Bootstrap\HandleExceptions->handleError(8, 'Trying to get p...', 'C:\\wamp64\\www\\e...', 51, Array)#1 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Database\Eloquent\Model.php(1164): App\Models\Category->ScopeSortNumberLastSubCategory(Object(Illuminate\Database\Eloquent\Builder), '11')#2 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Database\Eloquent\Builder.php(1007): Illuminate\Database\Eloquent\Model->callNamedScope('sortNumberLastS...', Array)#3 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Database\Eloquent\Builder.php(988): Illuminate\Database\Eloquent\Builder->Illuminate\Database\Eloquent\{closure}(Object(Illuminate\Database\Eloquent\Builder), '11')#4 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Database\Eloquent\Builder.php(1006): Illuminate\Database\Eloquent\Builder->callScope(Object(Closure), Array)#5 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Database\Eloquent\Builder.php(1399): Illuminate\Database\Eloquent\Builder->callNamedScope('sortNumberLastS...', Array)#6 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Support\Traits\ForwardsCalls.php(23): Illuminate\Database\Eloquent\Builder->__call('sortNumberLastS...', Array)#7 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Database\Eloquent\Model.php(1732): Illuminate\Database\Eloquent\Model->forwardCallTo(Object(Illuminate\Database\Eloquent\Builder), 'sortNumberLastS...', Array)#8 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Database\Eloquent\Model.php(1744): Illuminate\Database\Eloquent\Model->__call('sortNumberLastS...', Array)#9 C:\wamp64\www\ecommerce\app\Http\Controllers\Admin\CategoryController.php(114): Illuminate\Database\Eloquent\Model::__callStatic('sortNumberLastS...', Array)#10 [internal function]: App\Http\Controllers\Admin\CategoryController->create_sub_category('11')#11 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Routing\Controller.php(54): call_user_func_array(Array, Array)#12 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Routing\ControllerDispatcher.php(45): Illuminate\Routing\Controller->callAction('create_sub_cate...', Array)#13 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Routing\Route.php(239): Illuminate\Routing\ControllerDispatcher->dispatch(Object(Illuminate\Routing\Route), Object(App\Http\Controllers\Admin\CategoryController), 'create_sub_cate...')#14 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Routing\Route.php(196): Illuminate\Routing\Route->runController()#15 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Routing\Router.php(685): Illuminate\Routing\Route->run()#16 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(128): Illuminate\Routing\Router->Illuminate\Routing\{closure}(Object(Illuminate\Http\Request))#17 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Routing\Middleware\SubstituteBindings.php(41): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#18 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(167): Illuminate\Routing\Middleware\SubstituteBindings->handle(Object(Illuminate\Http\Request), Object(Closure))#19 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Auth\Middleware\Authenticate.php(44): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#20 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(167): Illuminate\Auth\Middleware\Authenticate->handle(Object(Illuminate\Http\Request), Object(Closure), 'admin')#21 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken.php(76): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#22 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(167): Illuminate\Foundation\Http\Middleware\VerifyCsrfToken->handle(Object(Illuminate\Http\Request), Object(Closure))#23 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\View\Middleware\ShareErrorsFromSession.php(49): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#24 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(167): Illuminate\View\Middleware\ShareErrorsFromSession->handle(Object(Illuminate\Http\Request), Object(Closure))#25 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php(116): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#26 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php(62): Illuminate\Session\Middleware\StartSession->handleStatefulRequest(Object(Illuminate\Http\Request), Object(Illuminate\Session\Store), Object(Closure))#27 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(167): Illuminate\Session\Middleware\StartSession->handle(Object(Illuminate\Http\Request), Object(Closure))#28 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse.php(37): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#29 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(167): Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse->handle(Object(Illuminate\Http\Request), Object(Closure))#30 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Cookie\Middleware\EncryptCookies.php(66): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#31 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(167): Illuminate\Cookie\Middleware\EncryptCookies->handle(Object(Illuminate\Http\Request), Object(Closure))#32 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(103): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#33 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Routing\Router.php(687): Illuminate\Pipeline\Pipeline->then(Object(Closure))#34 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Routing\Router.php(662): Illuminate\Routing\Router->runRouteWithinStack(Object(Illuminate\Routing\Route), Object(Illuminate\Http\Request))#35 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Routing\Router.php(628): Illuminate\Routing\Router->runRoute(Object(Illuminate\Http\Request), Object(Illuminate\Routing\Route))#36 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Routing\Router.php(617): Illuminate\Routing\Router->dispatchToRoute(Object(Illuminate\Http\Request))#37 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php(165): Illuminate\Routing\Router->dispatch(Object(Illuminate\Http\Request))#38 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(128): Illuminate\Foundation\Http\Kernel->Illuminate\Foundation\Http\{closure}(Object(Illuminate\Http\Request))#39 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php(21): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#40 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(167): Illuminate\Foundation\Http\Middleware\TransformsRequest->handle(Object(Illuminate\Http\Request), Object(Closure))#41 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php(21): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#42 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(167): Illuminate\Foundation\Http\Middleware\TransformsRequest->handle(Object(Illuminate\Http\Request), Object(Closure))#43 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\ValidatePostSize.php(27): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#44 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(167): Illuminate\Foundation\Http\Middleware\ValidatePostSize->handle(Object(Illuminate\Http\Request), Object(Closure))#45 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode.php(63): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#46 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(167): Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode->handle(Object(Illuminate\Http\Request), Object(Closure))#47 C:\wamp64\www\ecommerce\vendor\fruitcake\laravel-cors\src\HandleCors.php(37): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#48 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(167): Fruitcake\Cors\HandleCors->handle(Object(Illuminate\Http\Request), Object(Closure))#49 C:\wamp64\www\ecommerce\vendor\fideloper\proxy\src\TrustProxies.php(57): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#50 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(167): Fideloper\Proxy\TrustProxies->handle(Object(Illuminate\Http\Request), Object(Closure))#51 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(103): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}(Object(Illuminate\Http\Request))#52 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php(140): Illuminate\Pipeline\Pipeline->then(Object(Closure))#53 C:\wamp64\www\ecommerce\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php(109): Illuminate\Foundation\Http\Kernel->sendRequestThroughRouter(Object(Illuminate\Http\Request))#54 C:\wamp64\www\ecommerce\index.php(55): Illuminate\Foundation\Http\Kernel->handle(Object(Illuminate\Http\Request))#55 {main}
    }

    public function ScopeActiveSubCategory($query, $mainCategory){
        return $query -> where(['active'=> 1, 'main_category'=> $mainCategory]);
    }

    public function ScopeGetAllSubCategory($query, $mainCategory){

        return $query-> select('id', 'name', 'type_category', 'image','active','sort')->where('main_category', $mainCategory)->orderBy('id', 'desc');
    }
    ############################ End sub category ######################################################
}
