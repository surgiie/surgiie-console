<?php

namespace Surgiie\Console\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MustBeReadable implements ValidationRule
{
    protected string $error = 'The :name :type is not readable.';

    public function __construct(string $error = null)
    {
        if (! is_null($error)) {
            $this->error = $error;
        }
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_readable($value)) {
            $fail($this->error);
        }
    }
}
