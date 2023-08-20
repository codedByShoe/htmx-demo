<?php

namespace App\Libraries;

use Valitron\Validator;

class Validation
{
    protected $validator;
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->validator = new Validator($data);
    }

    public function validateFields(): self
    {
        foreach ($this->data as $field => $value) {
            $this->validator->rule('required', $field);
        }
        return $this;
    }

    public function validateEmail(): self
    {
        $this->validator->rule('email', 'email');
        return $this;
    }

    public function validatePassword(): self
    {
        $this->validator->rule('lengthMin', 'password', 6);
        return $this;
    }

    public function validateConfirmPassword(): self
    {
        $this->validator->rule('equals', 'confirm_password', 'password');
        return $this;
    }

    // Builder method to add rules outside of authentication
    public function addRule(string $rule, $field, $param = null): self
    {
        if ($param) {
            $this->validator->rule($rule, $field, $param);
        } else {
            $this->validator->rule($rule, $field);
        }
        return $this;
    }

    public function isValid(): bool
    {
        return $this->validator->validate();
    }

    public function errors(): array
    {
        return $this->validator->errors();
    }
}
