<?php






function getExamples() {


    $directory = new RecursiveDirectoryIterator('../src');
    $iterator = new RecursiveIteratorIterator($directory);
    $files = new RegexIterator($iterator, '/^.+\.php$/i', RecursiveRegexIterator::MATCH);
    
    $examples = [];
    
    $category = null;
    $function = null;
    
    foreach ($files as $file) {
        /** @var $file SplFileInfo */
    
        $filename = $file->getPath()."/".$file->getFilename();
    
        //echo $filename."\n";
        
        // open the file 
        $fileLines = file($filename);
        
        if (!$fileLines) {
            throw new \Exception("Failed to open $filename");
        }
        
        $currentExample = null;
        
        foreach ($fileLines as $fileLine) {
            $match = false;
            $pattern = "#^//Example (Imagick|ImagickDraw|ImagickPixel|ImagickPixelIterator|Tutorial)::(\w+)#";
            $matchCount = preg_match($pattern, $fileLine, $matches);
    
            if ($matchCount == true) {
                if ($currentExample != null) {
                    $examples[$category][$function] = $currentExample;
                }
                $currentExample = '';
                $category = $matches[0];
                $function = $matches[1];
            }
    
            if ($currentExample != null) {
                $currentExample[] = $fileLine;
            
                if (substr_compare($fileLine, "}", 0, 1) === 0) {
                    if ($currentExample != null) {
                        $examples[$category][$function] = $currentExample;
                    }
                    $currentExample = null;
                    $category = null;
                    $function = null;
                }
            }
        }
    
        if ($currentExample != null) {
            if ($currentExample != null) {
                $examples[$category][$function] = $currentExample;
            }
            $currentExample = null;
        }
    }

    return $examples;
}