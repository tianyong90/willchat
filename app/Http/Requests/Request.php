<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 返回字段别名，用于报错信息.
     *
     * 从模型自动获取，请在模型里添加：
     * <pre>
     * public static $alias = [
     *                         'filed1' => '别名',
     *                         //...
     *                        ];
     * </pre>
     *
     * @return array
     */
    public function attributes()
    {
        $class = explode('\\', get_class($this));

        if (!empty($class[3]) && class_exists($model = 'App\\'.$class[3])) {
            return $model::$aliases;
        }
    }
}
