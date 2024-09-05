<?php

namespace App\Infrastructure\Serializer;

class JsonDeserializer
{
    public static function deserialize(string $json): array
    {
        return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }
}