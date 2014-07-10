<?php namespace validator;

use Validator as V;

abstract class ValidatorMod {

    private $failed;
    private $messages;

    public function __construct()
    {
        $this->messages = [];
        $this->failed = false;
    }

    public function failed()
    {
        return $this->failed;
    }

    public function messages()
    {
        return $this->messages;
    }

    protected function validate(array $attributes, array $rules, $merge_messages = false)
    {
        $v = V::make($attributes, $rules);

        if (!$v->fails()) return;

        $this->failed = true;
        $this->addMessages($v->messages()->toArray(), $merge_messages);
    }

    private function addMessages(array $errors, $mergeMessages)
    {
        if ($mergeMessages)
        {
            $this->messages = array_merge($this->messages, $errors);
        }
        else
        {
            $this->messages = $errors;
        }
    }

}