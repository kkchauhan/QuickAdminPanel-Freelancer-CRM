<?php
$dir = new RecursiveDirectoryIterator(__DIR__ . '/app/Http/Controllers');
$iterator = new RecursiveIteratorIterator($dir);
$count = 0;
foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $content = file_get_contents($file->getPathname());
        if (strpos($content, '$request->all()') !== false) {
            $newContent = str_replace('$request->all()', '$request->validated()', $content);
            file_put_contents($file->getPathname(), $newContent);
            echo "Updated: " . $file->getPathname() . "\n";
            $count++;
        }
    }
}
echo "Total files updated: $count\n";
