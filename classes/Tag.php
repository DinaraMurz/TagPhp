<?php
    /**
     * Class Tag
     * @method static Tag a(array $attributes = [])
     * @method static Tag div(array $attributes = [])
     * @method static Tag img(array $attributes = [])
     * @method static Tag form(array $attributes = [])
     * @method static Tag br(array $attributes = [])
     * @method static Tag head(array $attributes = [])
     * @method static Tag header(array $attributes = [])
     * @method static Tag body(array $attributes = [])
     * @method static Tag input(array $attributes = [])
     * @method static Tag label(array $attributes = [])
     * @method static Tag h1(array $attributes = [])
     * @method static Tag h2(array $attributes = [])
     * @method static Tag frame(array $attributes = [])
     * @method static Tag button(array $attributes = [])
     * @method static Tag link(array $attributes = [])
     * @method static Tag code(array $attributes = [])
     * @method static Tag html(array $attributes = [])
     * @method static Tag title(array $attributes = [])
     * @method static Tag meta(array $attributes = [])
     */
class Tag extends BaseTag
{


    public static function __callStatic($name, $arguments){
        array_unshift($arguments, $name);
        return call_user_func_array([self::class, 'make'], $arguments);

    }

    public static function make($name, array $attributes = []){
        return new self($name, $attributes);
    }
}