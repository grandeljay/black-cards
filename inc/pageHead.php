<?php
$pageHead = [
    '<meta charset="UTF-8">',
    '<meta name="viewport" content="width=device-width, initial-scale=1.0">',

    '<link rel="preconnect" href="https://fonts.gstatic.com">',
    '<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">',

    '<link rel="stylesheet" href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/css/base.css">',
    '<link rel="stylesheet" href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/css/index.css">',
    '<link rel="stylesheet" href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/css/responsive.css">'
];

$pageHeadTitle = [
    'new-game' => 'Start a new Game'
];
$pageHeadTitleFound = false;

foreach ($pageHeadTitle as $key => $value) {
    if (str_ends_with(str_replace('\\', '/', $_SERVER['SCRIPT_FILENAME']), $key . '/index.php')) {
        $pageHead[] = '<title>' . $value . ' - Black Cards: A Cards Against Humanity clone</title>';
        $pageHeadTitleFound = true;
        break;
    }
}

if (!$pageHeadTitleFound) {
    $pageHead[] = '<title>Black Cards: A Cards Against Humanity clone</title>';
}

echo implode(PHP_EOL . '    ', $pageHead);
?>