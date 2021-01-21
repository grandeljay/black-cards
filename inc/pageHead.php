<?php
function getPageHead(): array {
    $pageHead = array_merge(
        getDefault(),
        getStylesheets(),
        getTitle(),
        getScripts()
    );

    return $pageHead;
}

function getDefault(): array {
    $default = [
        '<meta charset="UTF-8">',
        '<meta name="viewport" content="width=device-width, initial-scale=1.0">',

        '<link rel="preconnect" href="https://fonts.gstatic.com">',
        '<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">',
    ];

    return $default;
}

function getStylesheets(): array {
    $stylesheets = [
        '<link rel="stylesheet" href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/css/base.css">',
    ];

    $stylesheet = 'css' . str_replace('.php', '.css', $_SERVER['ORIG_PATH_INFO']);
    if (file_exists($stylesheet)) {
        $stylesheets[] = '<link rel="stylesheet" href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $stylesheet . '">';
    }

    $stylesheets[] = '<link rel="stylesheet" href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/css/responsive.css">';

    return $stylesheets;
}

function getScripts(): array {
    $scripts = [];

    $script = 'js' . str_replace('.php', '.js', $_SERVER['ORIG_PATH_INFO']);
    if (file_exists($script)) {
        $scripts[] = '<script defer src="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $script . '"></script>';
    }

    return $scripts;
}

function getTitle(): array {
    $pageHeadTitle = [];
    $pageHeadTitles = [
        'new-game' => 'Start a new Game'
    ];
    $pageHeadTitleFound = false;

    foreach ($pageHeadTitles as $key => $value) {
        if (str_ends_with(str_replace('\\', '/', $_SERVER['SCRIPT_FILENAME']), $key . '/index.php')) {
            $pageHeadTitle[] = '<title>' . $value . ' - Black Cards: A Cards Against Humanity clone</title>';
            $pageHeadTitleFound = true;
            break;
        }
    }

    if (!$pageHeadTitleFound) {
        $pageHeadTitle[] = '<title>Black Cards: A Cards Against Humanity clone</title>';
    }

    return $pageHeadTitle;
}

echo implode(PHP_EOL . '    ', getPageHead()) . PHP_EOL;
?>