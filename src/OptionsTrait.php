<?php

namespace Tiix\Form;

trait OptionsTrait
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return array
     */
    public function options()
    {
        return $this->options;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function setOption($key, $value)
    {
        $this->options[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public function option($key)
    {
        if(!isset($this->options[$key])) {
            throw new Exception("Option [$key] does not exist");
        }

        return $this->options[$key];
    }

    /**
     * @param array $options
     * @return $this
     */
    public function mergeOptions(array $options)
    {
        $this->options = array_merge($this->options, $options);

        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function mergeOption($key, $value)
    {
        $this->options[$key] = isset($this->options[$key]) ? $this->options[$key] . ' ' . $value : $value;

        return $this;
    }

    /**
     * @return string
     */
    public function optionsToString()
    {
        $result = [];

        foreach($this->options as $key => $value) {
            $result[] = sprintf('%s="%s"', $key, $value);
        }

        return implode(' ', $result);
    }
}