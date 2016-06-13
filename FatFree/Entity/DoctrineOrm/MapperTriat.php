<?php

namespace FatFree\Entity\DoctrineOrm;

trait MapperTriat
{
    /**
     * Assign entity properties using an array
     * @param array $values assoc array of values to assign
     * @return null
     */
    public function fromArray(array $values)
    {
        foreach ($values as $name => $value) {
            if (property_exists($this, $name)) {
                $methodName = $this->_getSetterName($name);
                if ($methodName) {
                    $this->{$methodName}($value);
                } else {
                    $this->$name = $value;
                }
            }
        }
    }

    /**
     * Get property setter method name (if exists)
     * @param string $propertyName entity property name
     * @return false|string
     */
    protected function _getSetterName($propertyName)
    {
        $prefixes = array('add', 'set');

        foreach ($prefixes as $prefix) {
            $methodName = sprintf('%s%s', $prefix, ucfirst(strtolower($propertyName)));

            if (method_exists($this, $methodName)) {
                return $methodName;
            }
        }
        return false;
    }
}
