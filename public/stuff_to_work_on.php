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

    /** @var string */
    private $contact;

    /**
     *
     * @param string $title
     * @param string $description
     * @param string $link
     * @param string $contact
     */
    public function __construct(string $title, string $description, string $link, string $contact = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
        $this->contact = $contact ?? 'internals@lists.php.net';
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

    /**
     * @return string
     */
    public function getContact(): string
    {
        return $this->contact;
    }
}



$rfcItemsToWorkOn[] = new WorkItem(
    'Union Types v2',
    'Proposal for the addition of union types T1|T2|.... There has been a <a href=\'https://wiki.php.net/rfc/union_types\'>previous proposal</a> on this topic, which has been declined.',
    'https://github.com/php/php-rfcs/pull/1'
);







$internalItemsToWorkOn = [];


$internalItemsToWorkOn[] = new WorkItem(
    'ext/* - Resource to object conversion in extensions',
    'The \'resource\' type was needed before PHP had classes to represent non-trivial types. However since PHP now has classes, it would be good to replace the resource types used internally.',
    'https://github.com/php-pecl/ProjectCoordination/blob/master/change_resource_to_specific_type.md'
);

$internalItemsToWorkOn[] = new WorkItem(
    'Core - Annotate internal function types',
    'We now have the capabilty to add type information to PHP core functions. The work is not difficult, but there is a large amount of it.',
    'https://github.com/php-pecl/ProjectCoordination/blob/master/annotate_internal_function_types.md'
);

$internalItemsToWorkOn[] = new WorkItem(
    'ext/phar - Phar Extension - Need OSS Fuzz coverage',
    'OSS Fuzz aims to find bugs by randomizing ("fuzzing") input. Phar has had a few bugs owing to edge cases in path processing and, being widely distributed form of PHP code, would benefit from fuzz testing. See https://github.com/google/oss-fuzz/tree/master/projects/php',
    'https://github.com/php/php-src/tree/master/sapi/fuzzer',
    'bishop@php.net'
);

$internalItemsToWorkOn[] = new WorkItem(
    'ext/imap - Imap Extension - Reboot',
    'The IMAP extension, while used across many open projects, performs poorly when compared to userspace implementations like Horde/Imap_Client. The library on which it is based (c-client) is unmaintained since 2011. And, there are a ton of bugs. We need to formulate a plan to either (a) accept the performance/features for what they are and just fix bugs or (b) reboot the extension from the ground up. Help wanted to steer and implement.',
    'https://github.com/php/php-src/tree/master/sapi/fuzzer',
    'bishop@php.net'
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
    'RFCs to work on' => $rfcItemsToWorkOn,
    'Internal stuff to work on' => $internalItemsToWorkOn,
    'Infrastructure stuff to work on' => $infrastructureChanges,
    'Bugs to work on' => $bugsToWorkOn
];

$introduction = <<< HTML
<h1>PHP project coordination</h1>

<p>
This page is an experiment that attempts to make it much easier for people to find things to work on for PHP internals, related infrastructure, extensions and most other non-userland things.
</p>

<p>
Due to it being an experiment, it's currently deployed on my own server. PR's accepted at <a href="https://github.com/imagick/imagick">https://github.com/imagick/imagick</a> for the file <a href="https://github.com/Danack/Imagick-demos/blob/master/public/stuff_to_work_on.php">https://github.com/Danack/Imagick-demos/blob/master/public/stuff_to_work_on.php</a>.
</p>
HTML;


echo $introduction;

foreach ($work as $title => $workItems) {
    printf(
        "<h2>%s</h2>",
        $title
    );

    usort($workItems, function ($a, $b) { return $a->getTitle() <=> $b->getTitle(); });
    foreach ($workItems as $workItem) {
        /** @var WorkItem $workItem */

$HTML = <<<'HTML'
<h3>%1$s</h3>

<p>%2$s</p>

<p>Link: <a href="%3$s">%3$s</a></p>

<p>Contact: <a href="mailto:%4$s">%4$s</a>
HTML;

        printf(
            $HTML,
            $workItem->getTitle(),
            $workItem->getDescription(),
            $workItem->getLink(),
            $workItem->getContact()
        );
    }
}












































