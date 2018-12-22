<?php
namespace ProxyRotator\Responses;

use Modeler\Model;
use Modeler\Properties\BaseProperty;
use Modeler\Properties\BooleanProperty;
use Modeler\Properties\FloatProperty;
use Modeler\Properties\IntegerProperty;
use Modeler\Properties\RelationProperty;
use Modeler\Properties\StringProperty;
use Modeler\Property;

class SuggestionGenerator extends ProxyDetectionResponse
{
    public function generate()
    {
        $properties = static::mapProperties();

        $methods = [];

        foreach ($properties as $propertyName => $propertyType)
        {
            /**
             * @var BaseProperty $propertyType
             */
            foreach (['has', 'get'] as $prefix) {
                $methods[] = sprintf('* @method %s %s%s()', ($prefix === 'has' ? 'boolean' : static::getTypeName($propertyType)), $prefix, static::underscoreToCamelCase($propertyName));
            }
        }

        return implode(PHP_EOL, $methods);
    }

    /**
     * @param $string
     * @return string|null
     */
    private static function underscoreToCamelCase($string)
    {
        $result = null;
        foreach (explode('_', $string) as $strPart) {
            $result .= ucfirst($strPart);
        }
        return $result;
    }

    /**
     * @param $propertyType
     * @return string|null
     */
    private static function getTypeName($propertyType)
    {
        switch (get_class($propertyType)) {
            case(StringProperty::class): return 'string';
            case(IntegerProperty::class): return 'integer';
            case(FloatProperty::class): return 'float';
            case(BooleanProperty::class): return 'boolean';
            case(RelationProperty::class): /** @var RelationProperty $propertyType */return $propertyType->getRelationClass();
        }

    }
}