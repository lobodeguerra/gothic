<?php
/**
 * The main layout file.
 *
 * PHP version 8.0
 *
 * @category  MVC_Framework
 * @package   Gothic
 * @author    Isaac Félix <isaac.felix@lobodeguerra.com>
 * @copyright 2022 Gothic PHP Framework
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link      https://lobodeguerra.com
 */

use Gothic\View\View;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gothic</title>

    <link rel="stylesheet" href="/dist/css/main.css" />
</head>
<body>
    <header>

    </header>
    <main>
        <?php View::inject($data) ?>
    </main>
    <footer>

    </footer>

    <script src="/dist/js/app.js"></script>
</body>
</html>
