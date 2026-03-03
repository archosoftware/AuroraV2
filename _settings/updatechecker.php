<?php
/*
 * Aurora Template
 * (updatechecker.php)
 * @license MIT
 */

require_once(ROOT_PATH . '/custom/templates/AuroraV2/template.php');

// Get Current Version of Aurora
$currentVersion = $template->getVersion();
$isDev = ($currentVersion === 'dev');

$versionInfoUrl = "https://www.archosoftware.com/api/v2/aurora/get-version";

$updateInfo = @file_get_contents($versionInfoUrl);

if ($updateInfo !== false) {
    $updateInfo = json_decode($updateInfo, true);

    if (isset($updateInfo['version']) && isset($updateInfo['download_url'])) {
        $latestVersion = $updateInfo['version'];
        $downloadUrl = $updateInfo['download_url'];
        $updateDescription = isset($updateInfo['description']) ? $updateInfo['description'] : "";

        // Get the mandatory update version
        $updatemandatory = isset($updateInfo['updatemandatory']) ? $updateInfo['updatemandatory'] : "";
        $updateRequired = version_compare($currentVersion, $updatemandatory, '<');
        $updateAvailable = version_compare($currentVersion, $latestVersion, '<');
    } else {
        $updateAvailable = false;
        $updateRequired = false;
    }
} else {
    $updateAvailable = false;
    $updateRequired = false;
}

// Assign Variables
$current_template->getEngine()->addVariables([
    'updateAvailable' => $updateAvailable,
    'updateRequired' => $updateRequired,
    'currentVersion' => $currentVersion,
    'isDev' => $isDev,
    'latestVersion' => $latestVersion,
    'downloadUrl' => $downloadUrl,
    'updateDescription' => $updateDescription
]);
