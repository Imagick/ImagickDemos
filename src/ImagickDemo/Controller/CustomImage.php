<?php


class CustomImage {

    //function setupExampleInjection
    function render(\Auryn\Provider $injector, $category, $example) {
        
        $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\CategoryNav::class);
        $injector->define(\ImagickDemo\Navigation\CategoryNav::class, [
            ':category' => $category,
            ':example' => $example
        ]);

        $categoryNav = $injector->make(\ImagickDemo\Navigation\CategoryNav::class);
        $exampleDefinition = $categoryNav->getExampleDefinition($category, $example);
        $function = $exampleDefinition[0];
        $controlClass = $exampleDefinition[1];

        if (array_key_exists('defaultParams', $exampleDefinition) == true) {
            foreach($exampleDefinition['defaultParams'] as $name => $value) {
                $defaultName = 'default'.ucfirst($name);
                $injector->defineParam($defaultName, $value);
            }
        }

        $injector->defineParam('imageBaseURL', '/image/'.$category.'/'.$example);
        $injector->defineParam('customImageBaseURL', '/customImage/'.$category.'/'.$example);
        $injector->defineParam('activeCategory', $category);
        $injector->defineParam('activeExample', $example);

        $injector->alias(\ImagickDemo\Control::class, $controlClass);
        $injector->share($controlClass);

        $injector->define(\ImagickDemo\DocHelper::class, [
            ':category' => $category,
            ':example' => $example
        ]);

        delegateAllTheThings($injector, $controlClass);
        $injector->alias(\ImagickDemo\Example::class, sprintf('ImagickDemo\%s\%s', $category, $function));

        return $function;
    }

}

 