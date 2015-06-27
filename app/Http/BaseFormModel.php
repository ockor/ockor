<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/16
 * Time: 12:40
 */
abstract class BaseFormModel
{

    private $_validator;

    protected function init($input, $rule = array())
    {
        $this->_validator = Validator::make($input, $rule);

        $formKey = array_keys(get_class_vars(get_class($this)));
        // 遍历表单键值 并赋予类成员
        foreach ($formKey as $value)
        {
            if(isset($input[$value]))
            {
                $this->$value = $input[$value];
            }
        }
    }

    public function validator()
    {
        return $_validator;
    }

    public function isValid()
    {
        return !$_validator->fails();
    }

}