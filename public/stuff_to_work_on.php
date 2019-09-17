<?php

declare(strict_types = 1);


class WorkItem
{
    /** @var string */
    private $title;

    /** @var string */
    private $description;

    /** @var string */
    private $link;

    /**
     *
     * @param string $title
     * @param string $description
     * @param string $link
     */
    public function __construct(string $title, string $description, string $link)
    {
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }
}










$rfcsToWorkOn = [];


$rfcsToWorkOn[] = new WorkItem(
    'Resource to object conversion in extensions',
    'The \'resource\' type was needed before PHP had classes to represent non-trivial types. However since PHP now has classes, it would be good to replace the resource types used internally.',
    'https://github.com/php-pecl/ProjectCoordination/blob/master/change_resource_to_specific_type.md'
);

$rfcsToWorkOn[] = new WorkItem(
    'Annotate internal function types',
    'We now have the capabilty to add type information to PHP core functions. The work is not difficult, but there is a large amount of it.',
    'https://github.com/php-pecl/ProjectCoordination/blob/master/annotate_internal_function_types.md'
);



$infrastructureChanges[] = new WorkItem(
    'Move documentation from SVN to Git/github',
    'Editing the documentation is currently quite difficult. Moving it to git/github would make it easier.',
    'https://github.com/phpdoctest/meta'
);


$bugsToWorkOn[] = new WorkItem(
    'PDO -> PDO driver error conditions',
    'There is an oversight between PDO and some PDO drivers on how certain error conditions are missed. This leads to some error conditions having their error message or exception not triggered:  https://bugs.php.net/bug.php?id=77490',
    'https://github.com/php/php-src/pull/4288'
);

$work = [
    'Internal stuff to work on' => $rfcsToWorkOn,
    'Infrastructure stuff to work on' => $infrastructureChanges,
    'Bugs to work on' => $bugsToWorkOn
];

$introduction = <<< HTML
<h1>PHP project coordination</h1>

<p>
This page is an experiment that attempts to make it much easier for people to find things to work on for PHP internals, related infrastructure, extensions and most other non-userland things.
</p>

<p>
Due to it being an experiment, it's currently deployed on my own server. PR's accepted at <a href="https://github.com/imagick/imagick">https://github.com/imagick/imagick</a>.
</p>
HTML;


echo $introduction;

foreach ($work as $title => $workItems) {
    printf(
        "<h2>%s</h2>",
        $title
    );

    foreach ($workItems as $workItem) {
        /** @var WorkItem $workItem */

$HTML = <<< HTML
<h3>%s</h3>

<p>%s</p>

<p>Link: <a href="%s">%s</a></p>
HTML;

        printf(
            $HTML,
            $workItem->getTitle(),
            $workItem->getDescription(),
            $workItem->getLink(),
            $workItem->getLink()
        );
    }
}












































