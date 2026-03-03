<?php
/*
 * Aurora Template
 * (settings.php)
 * @license MIT
 */

$template_file = 'page/main.tpl';

require_once('class/AuroraUtil.php');
require_once('updatechecker.php');
require_once(ROOT_PATH . '/core/templates/backend_init.php');


$current_template->getEngine()->addVariables(AuroraUtil::getSettingsToSmarty());
$current_template->getEngine()->addVariables([
        'TPL_PATH' => ROOT_PATH . '/custom/templates/AuroraV2/_settings/page/',
        'SETTINGS_TEMPLATE' => ROOT_PATH . '/custom/templates/AuroraV2/_settings/' . $template_file,
        'SUBMIT' => $language->get('general', 'submit'),
        'YES' => $language->get('general', 'yes'),
        'NO' => $language->get('general', 'no'),
        'BACK' => $language->get('general', 'back'),
        'ARE_YOU_SURE' => $language->get('general', 'are_you_sure'),
        'CONFIRM_DELETE' => $language->get('general', 'confirm_delete'),
        'NAME' => $language->get('admin', 'name'),
        'INFO' => $language->get('general', 'info'),
        'ENABLED' => $language->get('admin', 'enabled'),
        'DISABLED' => $language->get('admin', 'disabled'),
        'CHECK_AGAIN' => $language->get('admin', 'check_again'),
        'WARNING' => $language->get('general', 'warning'),

    // Aurora Main
        'AURORA_OUTDATED' => AuroraUtil::getLanguage('main', 'aurora_outdated'),
        'AURORA_OUTDATED_INFO' => AuroraUtil::getLanguage('main', 'aurora_outdated_info'),
        'DEBUG_LABEL' => AuroraUtil::getLanguage('main', 'debug_label'),
        'AURORA_VER' => AuroraUtil::getLanguage('frontend', 'template_version', [
            'version' => $template->getVersion(),
        ]),
        'AURORA_AUTHOR' => AuroraUtil::getLanguage('frontend', 'template_author'),
        'ABOUT' => AuroraUtil::getLanguage('frontend', 'about'),

    // Navigation
        'NAVIGATION' => AuroraUtil::getLanguage('navigation', 'navigation'),
        'HOME_PAGE' => AuroraUtil::getLanguage('navigation', 'home_page'),
        'THEME_PAGE' => AuroraUtil::getLanguage('navigation', 'theme_page'),
        'COLOURS_PAGE' => AuroraUtil::getLanguage('navigation', 'colours_page'),
        'NAVBAR_PAGE' => AuroraUtil::getLanguage('navigation', 'navbar_page'),
        'CONNECTIONS_PAGE' => AuroraUtil::getLanguage('navigation', 'connections_page'),
        'ADDONS_PAGE' => AuroraUtil::getLanguage('navigation', 'addons_page'),
        'CARDCONTENT_PAGE' => AuroraUtil::getLanguage('navigation', 'cardcontent_page'),
        'FOOTER_PAGE' => AuroraUtil::getLanguage('navigation', 'footer_page'),
        'PORTAL_PAGE' => AuroraUtil::getLanguage('navigation', 'portal_page'),
        'WELCOME_PAGE' => AuroraUtil::getLanguage('navigation', 'welcome_page'),
        'CUSTOM_PAGE' => AuroraUtil::getLanguage('navigation', 'custom_page'),
        'SEO_PAGE' => AuroraUtil::getLanguage('navigation', 'seo_page'),
        'SUPPORT_PAGE' => AuroraUtil::getLanguage('navigation', 'support_page'),

    // Home Page
        'REVIEW_INFO' => AuroraUtil::getLanguage('home', 'review_info', [
           'riLinkStart' => '<a href=\'https://github.com/bijju089/aurora-theme\' target=\'_blank\'>',
           'riLinkEnd' => '</a>'
        ]),
        'UPDATE_AVAILABLE' => AuroraUtil::getLanguage('home', 'update_available'),
        'DOWNLOAD_UPDATE' => AuroraUtil::getLanguage('home', 'download_update'),
        'REQUIRE_SUPPORT' => AuroraUtil::getLanguage('home', 'require_support'),
        'REQUIRE_SUPPORT_DESC' => AuroraUtil::getLanguage('home', 'require_support_desc'),
        'JOIN_DISCORD' => AuroraUtil::getLanguage('home', 'join_discord'),
        'RATE_AURORA' => AuroraUtil::getLanguage('home', 'rate_theme'),
        'RATE_AURORA_DESC' => AuroraUtil::getLanguage('home', 'rate_theme_desc'),
        'RATE_NOW' => AuroraUtil::getLanguage('home', 'rate_now'),
        'DEV_INFO' => AuroraUtil::getLanguage('home', 'dev_info'),

    // Theme Options
        'SHADOWEFFECTS_LABEL' => AuroraUtil::getLanguage('theme', 'shadoweffects_label'),
        'THEMESWITCHER_LABEL' => AuroraUtil::getLanguage('theme', 'themeswitcher_label'),
        'SHADOWEFFECTS_INFO_LABEL' => AuroraUtil::getLanguage('theme', 'shadoweffects_info_label'),
        'DARKMODE_LABEL' => AuroraUtil::getLanguage('theme', 'darkmode_label'),
        'PRELOADERVIEW_LABEL' => AuroraUtil::getLanguage('theme', 'preloaderview_label'),
        'PRELOADERVIEW_INFO_LABEL' => AuroraUtil::getLanguage('theme', 'preloaderview_info_label'),
        'PRELOADERTEXT_LABEL' => AuroraUtil::getLanguage('theme', 'preloadertext_label'),
        'PRELOADERLOADING_LABEL' => AuroraUtil::getLanguage('theme', 'preloaderloading_label'),
        'PRELOADERCOLOR_LABEL' => AuroraUtil::getLanguage('theme', 'preloadercolor_label'),
        'PRELOADER_RED' => $language->get('general', 'red'),
        'PRELOADER_ORANGE' => $language->get('general', 'orange'),
        'PRELOADER_YELLOW' => $language->get('general', 'yellow'),
        'PRELOADER_OLIVE' => $language->get('general', 'olive'),
        'PRELOADER_GREEN' => $language->get('general', 'green'),
        'PRELOADER_TEAL' => $language->get('general', 'teal'),
        'PRELOADER_BLUE' => $language->get('general', 'blue'),
        'PRELOADER_VIOLET' => $language->get('general', 'violet'),
        'PRELOADER_PURPLE' => $language->get('general', 'purple'),
        'PRELOADER_PINK' => $language->get('general', 'pink'),
        'PRELOADER_BROWN' => $language->get('general', 'brown'),
        'PRELOADER_GRAY' => $language->get('general', 'grey'),
        'PRELOADER_BLACK' => AuroraUtil::getLanguage('theme', 'preloader_black'),
        'PRELOADERSPEED_LABEL' => AuroraUtil::getLanguage('theme', 'preloaderspeed_label'),
        'PRELOADER_SLOW' => AuroraUtil::getLanguage('theme', 'preloader_slow'),
        'PRELOADER_NORMAL' => AuroraUtil::getLanguage('theme', 'preloader_normal'),
        'PRELOADER_FAST' => AuroraUtil::getLanguage('theme', 'preloader_fast'),
        'PRELOADERSTYLE_LABEL' => AuroraUtil::getLanguage('theme', 'preloaderstyle_label'),
        'PRELOADER_DOUBLE' => AuroraUtil::getLanguage('theme', 'preloader_double'),
        'PRELOADER_ELASTIC' => AuroraUtil::getLanguage('theme', 'preloader_elastic'),

    // Navbar
        'MODERNNAV_INFO' => AuroraUtil::getLanguage('navbar', 'modernnav_info'),
        'NAVBARLOGO_LABEL' => AuroraUtil::getLanguage('navbar', 'navbarlogo_label'),
        'NAVBARLOGO_INFO_LABEL' => AuroraUtil::getLanguage('navbar', 'navbarlogo_info_label'),
        'NAVBARBANNER_LABEL' => AuroraUtil::getLanguage('navbar', 'navbarbanner_label'),
        'NAVBARBANNER_INFO_LABEL' => AuroraUtil::getLanguage('navbar', 'navbarbanner_info_label'),
        'NAVBAREXCLUDE_LABEL' => AuroraUtil::getLanguage('navbar', 'navbarexclude_label'),
        'NAVBAREXCLUDE_INFO_LABEL' => AuroraUtil::getLanguage('navbar', 'navbarexclude_info_label', [
            'slashCodeStart' => '<code>',
            'slashCodeEnd' => '</code>'
        ]),
        'NAVBARTYPE_LABEL' => AuroraUtil::getLanguage('navbar', 'navbartype_label'),
        'NAVBARTYPE_INFO_LABEL' => AuroraUtil::getLanguage('navbar', 'navbartype_info_label'),
        'NAVBARSTYLE_LABEL' => AuroraUtil::getLanguage('navbar', 'navbarstyle_label'),
        'NAVBARSTYLE_INFO_LABEL' => AuroraUtil::getLanguage('navbar', 'navbarstyle_info_label'),
        'NAVBARELEGANT_LABEL' => AuroraUtil::getLanguage('navbar', 'navbarelegant_label'),
        'NAVBARDYNAMIC_LABEL' => AuroraUtil::getLanguage('navbar', 'navbardynamic_label'),
        'NAVBARMODERN_LABEL' => AuroraUtil::getLanguage('navbar', 'navbarmodern_label'),
        'NAVBARMINIMAL_LABEL' => AuroraUtil::getLanguage('navbar', 'navbarminimal_label'),
        'NAVBARCLEAN_LABEL' => AuroraUtil::getLanguage('navbar', 'navbarclean_label'),
        'BTNCOLOUR_LABEL' => AuroraUtil::getLanguage('navbar', 'btncolour_label'),
        'BTNENABLED_LABEL' => AuroraUtil::getLanguage('navbar', 'btnenabled_label'),
        'UPLOAD_IMAGE' => AuroraUtil::getLanguage('navbar', 'upload_image'),
        'UPLOAD_BANNER' => AuroraUtil::getLanguage('navbar', 'upload_banner'),
        'SOCIAL_LINK' => AuroraUtil::getLanguage('navbar', 'social_link'),


    // Connections
        // Discord
            'DISCORD_LABEL' => AuroraUtil::getLanguage('connections', 'discord_label'),
            'DISCORDVIEW_LABEL' => AuroraUtil::getLanguage('connections', 'discordview_label'),
            'DISCORDVIEW_INFO_LABEL' => AuroraUtil::getLanguage('connections', 'discordview_info_label'),
            'DISCORDID_LABEL' => AuroraUtil::getLanguage('connections', 'discordid_label'),
            'DISCORDID_INFO_LABEL' => AuroraUtil::getLanguage('connections', 'discordid_info_label', [
                'moreinfoLinkStart' => '<a href=\'https://support.discord.com/hc/en-us/articles/206346498\' target=\'_blank\'>',
                'moreinfoLinkEnd' => '</a>'
            ]),

        // Minecraft
            'MINECRAFT_LABEL' => AuroraUtil::getLanguage('connections', 'minecraft_label'),
            'MINECRAFTVIEW_LABEL' => AuroraUtil::getLanguage('connections', 'minecraftview_label'),
            'MINECRAFTDOMAIN_LABEL' => AuroraUtil::getLanguage('connections', 'minecraftdomain_label'),
            'MINECRAFTIP_LABEL' => AuroraUtil::getLanguage('connections', 'minecraftip_label'),
            'MINECRAFTPORT_LABEL' => AuroraUtil::getLanguage('connections', 'minecraftport_label'),
            'MINECRAFTSTYLE_LABEL' => AuroraUtil::getLanguage('connections', 'minecraftstyle_label'),
            'MINECRAFTSTYLE_INFO_LABEL' => AuroraUtil::getLanguage('connections', 'minecraftstyle_info_label'),
            'SIMPLE_LABEL' => AuroraUtil::getLanguage('connections', 'simple_label'),
            'ADVANCED_LABEL' => AuroraUtil::getLanguage('connections', 'advanced_label'),

    // Addons
        // WidgetBot
            'WIDGETBOT_INFO' => AuroraUtil::getLanguage('addons', 'widgetbot_info', [
               'wbLinkStart' => '<a href=\'https://docs.widgetbot.io/embed/html-embed/tutorial/#setting-your-server\' target=\'_blank\'>',
               'wbLinkEnd' => '</a>'
            ]),
            'SERVERID_LABEL' => AuroraUtil::getLanguage('addons', 'serverid_label'),
            'SERVERID_INFO_LABEL' => AuroraUtil::getLanguage('addons', 'serverid_info_label'),
            'CHANNELID_LABEL' => AuroraUtil::getLanguage('addons', 'channelid_label'),
            'CHANNELID_INFO_LABEL' => AuroraUtil::getLanguage('addons', 'channelid_info_label'),

    // Card
        'CARD_TITLE' => AuroraUtil::getLanguage('card', 'card_title'),
        'CARD_LINK' => AuroraUtil::getLanguage('card', 'card_link'),
        'CARD_VISIBLEIMAGE' => AuroraUtil::getLanguage('card', 'card_visibleimage'),
        'CARD_HIDENIMAGE' => AuroraUtil::getLanguage('card', 'card_hidenimage'),
        'CUSTOM_CONTENT_NOT_SET' => AuroraUtil::getLanguage('card', 'custom_content_not_set'),
        'CARDCONTENT_INFO' => AuroraUtil::getLanguage('card', 'cardcontent_info'),

    // Welcome Section
        'WELCOMESECTION_INFO_LABEL' => AuroraUtil::getLanguage('welcome', 'welcomesection_info_label'),
        'WELCOMESECTION_LABEL' => AuroraUtil::getLanguage('welcome', 'welcomesection_label'),
        'WELCOMEHEADER_LABEL' => AuroraUtil::getLanguage('welcome', 'welcomeheader_label'),
        'WELCOMEDESCRIPTION_LABEL' => AuroraUtil::getLanguage('welcome', 'welcomedescription_label'),

    // Footer
        'FOOTERABOUT_LABEL' => AuroraUtil::getLanguage('options', 'footerabout_label'),
        'FOOTERABOUT_PLACEHOLDER_LABEL' => AuroraUtil::getLanguage('options', 'footerabout_placeholder_label'),

    // Portal
        'PORTAL_INFO' => AuroraUtil::getLanguage('portal', 'portal_info', [
           'piLinkStart' => '<a href=\'https://wiki.devnex.pro/aurora-namelessmc\' target=\'_blank\'>',
           'piLinkEnd' => '</a>'
        ]),
        'PORTAL_NOT_SET' => AuroraUtil::getLanguage('portal', 'portal_not_set'),
        'PORTAL_BTN_TITLE' => AuroraUtil::getLanguage('portal', 'portal_btn_title'),
        'PORTAL_BTN_LINK' => AuroraUtil::getLanguage('portal', 'portal_btn_link'),
        'PORTAL_BTN_ICON' => AuroraUtil::getLanguage('portal', 'portal_btn_icon'),


    // Custom Code
        'CUSTOMCSS_LABEL' => AuroraUtil::getLanguage('options', 'customcss_label'),
        'CUSTOMCSS_INFO_LABEL' => AuroraUtil::getLanguage('options', 'customcss_info_label'),
        'CUSTOMJS_LABEL' => AuroraUtil::getLanguage('options', 'customjs_label'),
        'CUSTOMJS_INFO_LABEL' => AuroraUtil::getLanguage('options', 'customjs_info_label'),
        'LEAVE_BLANK_TO_DISABLE' => AuroraUtil::getLanguage('custom', 'leave_blank_to_disable'),

    // SEO
        'MOREOPTIONS_LABEL' => AuroraUtil::getLanguage('seo', 'moreoptions_label'),
        'MOREOPTIONS' => AuroraUtil::getLanguage('seo', 'moreoptions'),
        'KEYWORDS_LABEL' => AuroraUtil::getLanguage('seo', 'keywords_label'),
        'KEYWORDS_INFO_LABEL' => AuroraUtil::getLanguage('seo', 'keywords_info_label'),
]);

if (isset($_POST['sel_btn_session'])) {
    Session::flash('sel_btn_session', $_POST['sel_btn_session']);
}

if (!isset($_POST['sel_btn'])) {
    if (Input::exists()) {
        $errors = [];

        foreach ($_POST as $key => $value) {
            if ($key == 'token' or $key == 'sel_btn_session') {
                continue;
            }
            AuroraUtil::updateOrCreateParam($key, $value);
        }

        if (empty($errors)) {
            Session::flash('staff', $language->get('admin', 'successfully_updated'));
            Redirect::to(URL::build($_SESSION['last_page']));
            die();
        }
    }
}

if (Session::exists('staff'))
    $success = Session::flash('staff');
    AuroraUtil::ensureAllParamsExist();
    $TPL_NAME_SESSION = '';

if (Session::exists('sel_btn_session'))
    $TPL_NAME_SESSION = Session::flash('sel_btn_session');

$current_template->getEngine()->addVariables([
    'TPL_NAME_SESSION' => $TPL_NAME_SESSION
]);


if (isset($success))
    $current_template->getEngine()->addVariables([
        'SUCCESS' => $success,
        'SUCCESS_TITLE' => $language->get('general', 'success')
    ]);

if (isset($errors) && count($errors))
    $current_template->getEngine()->addVariables([
        'ERRORS' => $errors,
        'ERRORS_TITLE' => $language->get('general', 'error')
    ]);

$current_template->getEngine()->addVariables([
    'TOKEN' => Token::get(),
]);