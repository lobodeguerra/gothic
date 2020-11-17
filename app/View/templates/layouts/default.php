<?php
/**
 * The main layout file.
 *
 * PHP version 7.4
 *
 * @category  MVC_Framework
 * @package   Gothic
 * @author    Isaac L. Felix <isaac@lobodeguerra.com>
 * @copyright 2020 Gothic PHP Framework
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link      https://gothic.com
 */

use App\View\View;
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
        <?php View::render() ?>
    </main>
    <footer>

    </footer>

    <script src="/dist/js/app.js"></script>
</body>
</html>
