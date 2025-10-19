<?php

declare(strict_types=1);

namespace App\Enums;

use Prism\Prism\Enums\Provider;

enum ModelName: string
{
    case GPT_5_MINI = 'gpt-5-mini';
    case GPT_5_NANO = 'gpt-5-nano';
    case MISTRAL_L = 'mistral-large-latest';
    case MISTRAL_M = 'mistral-medium-latest';
    case MISTRAL_S = 'mistral-small-latest';
    case MAGISTRAL = 'magistral-latest';
    case MAGISTRAL_N = 'magistral-medium-';
    case DEVSTRAL_M = 'devstral-medium-latest';
    case DEVSTRAL_S = 'devstral-small-latest';
    case PIXTRAL_L = 'pixtral-large-latest';
    case PIXTRAL_M = 'pixtral-medium-latest';
    case PIXTRAL_S = 'pixtral-small-latest';
    case VOXTRAL_L = 'voxtral-large-latest';
    case VOXTRAL_M = 'voxtral-medium-latest';
    case VOXTRAL_S = 'voxtral-small-latest';
    case CODESTRAL = 'codestral-latest';




    /**
     * @return array{id: string, name: string, description: string, provider: string}[]
     */
    public static function getAvailableModels(): array
    {
        return array_map(
            fn (ModelName $model): array => $model->toArray(),
            self::cases()
        );
    }

    public function getName(): string
    {
        return match ($this) {
            self::GPT_5_MINI => 'GPT-5 mini',
            self::GPT_5_NANO => 'GPT-5 Nano',
            self::MISTRAL_L => 'Mistral Large',
            self::MISTRAL_M => 'Mistral Medium',
            self::MISTRAL_S => 'Mistral Small',
            self::MAGISTRAL => 'Magistral',
            self::MAGISTRAL_N => 'Magistral Medium',
            self::DEVSTRAL_M => 'Devstral Medium',
            self::DEVSTRAL_S => 'Devstral Small',
            self::PIXTRAL_L => 'Pixtral Large',
            self::PIXTRAL_M => 'Pixtral Medium',
            self::PIXTRAL_S => 'Pixtral Small',
            self::VOXTRAL_L => 'Voxtral Large',
            self::VOXTRAL_M => 'Voxtral Medium',
            self::VOXTRAL_S => 'Voxtral Small',
            self::CODESTRAL => 'Codestral',
        };
    }

    public function getDescription(): string
    {
        return match ($this) {
            self::GPT_5_MINI => 'Cheapest model, best for smarter tasks',
            self::GPT_5_NANO => 'Cheapest model, best for simpler tasks',
            self::MISTRAL_L => 'Modelo de alto rendimiento para tareas complejas, optimizado para velocidad y precisión.',
            self::MISTRAL_M => 'Modelo equilibrado para una variedad de aplicaciones, ofreciendo buen rendimiento y eficiencia.',
            self::MISTRAL_S => 'Modelo ligero ideal para tareas simples y respuestas rápidas con bajo consumo de recursos.',
            self::MAGISTRAL => 'Modelo avanzado diseñado para aplicaciones exigentes que requieren alta capacidad de procesamiento.',
            self::MAGISTRAL_N => 'Versión media del modelo Magistral, equilibrando rendimiento y eficiencia.',
            self::DEVSTRAL_M => 'Modelo de desarrollo medio, adecuado para pruebas y aplicaciones en etapa inicial.',
            self::DEVSTRAL_S => 'Modelo de desarrollo pequeño, ideal para tareas ligeras y experimentación rápida.',
            self::PIXTRAL_L => 'High-resolution image generation model suitable for detailed and complex visuals.',
            self::PIXTRAL_M => 'Balanced image generation model for a variety of visual content needs.',
            self::PIXTRAL_S => 'Lightweight image generation model for quick and simple visuals.',
            self::VOXTRAL_L => 'High-quality audio generation model for rich and immersive soundscapes.',
            self::VOXTRAL_M => 'Versatile audio generation model for a range of sound design applications.',
            self::VOXTRAL_S => 'Efficient audio generation model for basic sound needs.',
            self::CODESTRAL => 'Specialized model for code generation and programming tasks.',
        };
    }

    public function getProvider(): Provider
    {
        return match ($this) {
            self::GPT_5_MINI, self::GPT_5_NANO => Provider::OpenAI,
            self::MISTRAL_L,
            self::MISTRAL_M,
            self::MISTRAL_S,
            self::MAGISTRAL,
            self::MAGISTRAL_N,
            self::DEVSTRAL_M,
            self::DEVSTRAL_S,
            self::PIXTRAL_L,
            self::PIXTRAL_M,
            self::PIXTRAL_S,
            self::VOXTRAL_L,
            self::VOXTRAL_M,
            self::VOXTRAL_S,
            self::CODESTRAL => Provider::Mistral

        };
    }

    /**
     * @return array{id: string, name: string, description: string, provider: string}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->value,
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'provider' => $this->getProvider()->value,
        ];
    }

}
