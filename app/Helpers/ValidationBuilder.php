<?php

namespace App\Helpers;

use App\Enums\ValidationRule;
use Illuminate\Validation\Rules\Password;

class ValidationBuilder
{
    /**
     * @var array<ValidationRule | string>
     */
    private array $validationRules = [];

    public function make(): array
    {
        return collect($this->validationRules)->map(function ($validation) {
            return $validation instanceof ValidationRule
                ? $validation->value
                : $validation;
        })->all();
    }

    public function required(): self
    {
        $this->validationRules[] = ValidationRule::REQUIRED;

        return $this;
    }

    public function nullable(): self
    {
        $this->validationRules[] = ValidationRule::NULLABLE;

        return $this;
    }


    public function maxLength(int $value): self
    {
        $this->validationRules[] = $this->getCompoundRule(ValidationRule::MAX_LENGTH, $value);

        return $this;
    }

    public function minLength(int $value): self
    {
        $this->validationRules[] = $this->getCompoundRule(ValidationRule::MIN_LENGTH, $value);

        return $this;
    }

    public function date(): self
    {
        $this->validationRules[] = ValidationRule::DATE;

        return $this;
    }


    public function email(): self
    {
        $this->validationRules[] = ValidationRule::EMAIL;

        return $this;
    }

    public function integer():self
    {
        $this->validationRules[] = ValidationRule::INTEGER;

        return $this;
    }

    public function string():self
    {
        $this->validationRules[] = ValidationRule::STRING;

        return $this;
    }

    public function password(): self
    {
        $this->validationRules[] = Password::min(8)
            ->max(100)
            ->letters()
			->numbers()
            ->mixedCase();

        return $this;
    }

    public function before(string $before): self
    {
        $this->validationRules[] = $this->getCompoundRule(ValidationRule::BEFORE, $before);

        return $this;
    }

    public function beforeToday(): self
    {
        return $this->before('today');
    }

    public function requiredWith(string $fieldName): self
    {
        $this->validationRules[] = $this->getCompoundRule(ValidationRule::REQUIRED_WITH, $fieldName);

        return $this;
    }

    public function same(string $fieldName): self
    {
        $this->validationRules[] = $this->getCompoundRule(ValidationRule::SAME, $fieldName);

        return $this;
    }

    public function different(string $fieldName): self
    {
        $this->validationRules[] = $this->getCompoundRule(ValidationRule::DIFFERENT, $fieldName);

        return $this;
    }

    private function getCompoundRule(ValidationRule $rule, $value): string
    {
        return $rule->value . ":" . $value;
    }
}
