<?php


class View
    implements Iterator
{
    const PATH = __DIR__ . '/../views/';
    protected $data = [];


    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
       return $this->data[$k];
    }

    public function render($template)
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        ob_start();
        $path = self::PATH . $template;
        if (!file_exists($path)) {
            throw new E404Exception('страница не найдена');
        } else {

            include self::PATH . $template;
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }

    }

    public function display($template)
    {
        echo $this->render($template);
    }


    public function current()
    {

        return current($this->data);
    }

    public function next()
    {

        next($this->data);
    }

    public function key()
    {

        return key($this->data);
    }

    public function valid()
    {

        $key = $this->key();
        $data = ($key !== null && $key !== false);
        return $data;
    }

    public function rewind()
    {
        reset($this->data);
    }


}