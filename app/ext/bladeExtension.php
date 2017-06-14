<?php

/**
 *
 * {? $old_section = "whatever" ?}
 *
 */
Blade::extend(function($value) {
    return preg_replace('/\{\?(.+)\?\}/', '<?php ${1} ?>', $value);
});

Blade::extend(function($view, $compiler)
{
    $pattern = $compiler->createMatcher('datetime');

    return preg_replace($pattern, '$1<?php echo $2->format(\'m/d/Y H:i\'); ?>', $view);
});
