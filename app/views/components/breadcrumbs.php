<div class="flex items-center space-x-4">
    <?php
    $breadcrumbs = generateBreadcrumbs();
    foreach ($breadcrumbs as $breadcrumb) {
        if (!empty($breadcrumb['url'])) {
            echo '<a href="' . $breadcrumb['url'] . '" class="text-blue-500 hover:underline">' . $breadcrumb['label'] . '</a>';
        } else {
            echo '<span>' . $breadcrumb['label'] . '</span>';
        }

        // Add separator if it's not the last breadcrumb
        if ($breadcrumb !== end($breadcrumbs)) {
            echo '<span>/</span>';
        }
    }
    ?>
</div>

<?php
/* A custom function for manage pages to have breadcrumbs */
function generateBreadcrumbs() {
    $breadcrumbs = array();
    $currentUrl = $_SERVER['REQUEST_URI'];

    /* Extract URL page name and parameters */
    $urlParts = parse_url($currentUrl);
    $path = $urlParts['path'];
    $query = $urlParts['query'] ?? '';

    /* Extract the exact page name */
    $pathParts = explode('/', $path);
    $breadcrumbs[] = array('label' => 'Home', 'url' => '/'); // Home breadcrumb
    $breadcrumbUrl = '/';
    foreach ($pathParts as $part) {
        if ($part !== '') {
            $breadcrumbUrl .= $part . '/';
            $breadcrumbs[] = array('label' => ucfirst($part), 'url' => $breadcrumbUrl);
        }
    }

    /* Extract and add the parameters if it exists for the last breadcrumb */
    if (!empty($query)) {
        parse_str($query, $params);
        $paramsString = '';
        foreach ($params as $key => $value) {
            $paramsString .= '&' . $key . '=' . $value;
        }
        $breadcrumbs[count($breadcrumbs) - 1]['label'] .= ' ' . ucfirst(key($params)) . ' ' . $params[key($params)];
        $breadcrumbs[count($breadcrumbs) - 1]['url'] .= '?' . ltrim($paramsString, '&');
    }

    return $breadcrumbs;
}

?>
