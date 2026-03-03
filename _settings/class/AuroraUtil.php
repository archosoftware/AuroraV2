<?php
/*
 * Aurora Template
 * github.com/archointeractive/AuroraV2
 * LICENSE: MIT
 */

class AuroraUtil
{
    private static Language $_aurora_language;

    public static function getLanguage(string $file, string $term, array $variables = []): string
    {
        if (!isset(self::$_aurora_language)) {
            self::$_aurora_language = new Language(ROOT_PATH . '/custom/templates/AuroraV2/_language', LANGUAGE);
        }
        return self::$_aurora_language->get($file, $term, $variables);
    }

    public static function getDsServer($id): array
    {
        $discord_server = [];
        if ($id !== '') {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_URL, 'https://discordapp.com/api/servers/' . $id . '/widget.json');
            $result = curl_exec($ch);
            $result = json_decode($result);
            curl_close($ch);
            $discord_server = [
                'name' => $result->name,
                'members' => $result->presence_count,
                'link' => $result->instant_invite
            ];
        }
        return $discord_server;
    }

    public static function getSettingsToSmarty(): array
    {
        $settings_data = DB::getInstance()->get('aurora', ['id', '<>', 0])->results();
        $result = [];
        if (count($settings_data)) {
            foreach ($settings_data as $value) {
                $settings_data_array[$value->name] = [
                    'id' => Output::getClean($value->id),
                    'value' => Output::getClean($value->value)
                ];
                $result[strtoupper($value->name)] = htmlspecialchars_decode($settings_data_array[$value->name]['value']);
            }
        }
        return $result;
    }

    public static function updateOrCreateParam($key, $value)
    {
        $array = DB::getInstance()->get('aurora', ['name', '=', $key])->results();
        $data = end($array);
        if (!empty($data)) {
            DB::getInstance()->update('aurora', $data->id, [
                'value' => $value
            ]);
        } else {
            DB::getInstance()->insert('aurora', [
                'name' => $key,
                'value' => $value
            ]);
        }
    }
    public static function initialise()
    {   
     if (DB::getInstance()->showTables('aurora')) {
         return;
     }
     try {
            $group = DB::getInstance()->get('groups', ['id', '=', 2])->results();
            $group = $group[0];
            $group_permissions = json_decode($group->permissions, TRUE);
            $group_permissions['admincp.aurora'] = 1;
            $group_permissions = json_encode($group_permissions);
            DB::getInstance()->update('groups', 2, ['permissions' => $group_permissions]);
        } catch (Exception $e) {
            // Error
        }
        try {
            DB::getInstance()->createTable("aurora", "`id` int(11) NOT NULL AUTO_INCREMENT, `name` varchar(255) NOT NULL, `value` varchar(5000) NOT NULL, PRIMARY KEY (`id`)");
        } catch (Exception $e) {
            // Error
        }

        $settings_data = self::getDefaultSettings();

        foreach ($settings_data as $key => $value) {
            try {
                DB::getInstance()->insert('aurora', [
                    'name' => $key,
                    'value' => $value,
                ]);
            } catch (Exception $e) {
                // Error
            }
        }
    }

    public static function getDefaultSettings()
    {
        return [
                'btnColour' => '#dc3545',
                'btnEnabled' => 1,
                'navbarType' => 0,
                'navbarStyle' => 2,
                'discordView' => 1,
                'discordID' => 1002478941111599144,
                'minecraftView' => 1,
                'minecraftDomain' => 'mc.cubedcraft.com',
                'minecraftIP' => 'mc.cubedcraft.com',
                'minecraftPort' => 25565,
                'shadowEffects' => 0,
                'cardt' => 'Portfolio',
                'cardw' => 'https://devnex.pro/resources',
                'card1t' => 'My Project',
                'card1w' => 'https://devnex.pro/resources',
                'card1v' => 'https://i.imgur.com/nvWYgJY.png',
                'card1h' => 'https://i.imgur.com/9nZfJ0c.png',
                'card2t' => 'My Project',
                'card2w' => 'https://devnex.pro/resources',
                'card2v' => 'https://i.imgur.com/nvWYgJY.png',
                'card2h' => 'https://i.imgur.com/9nZfJ0c.png',
                'card3t' => 'My Project',
                'card3w' => 'https://devnex.pro/resources',
                'card3v' => 'https://i.imgur.com/nvWYgJY.png',
                'card3h' => 'https://i.imgur.com/9nZfJ0c.png',
                'card4t' => 'My Project',
                'card4w' => 'https://devnex.pro/resources',
                'card4v' => 'https://i.imgur.com/nvWYgJY.png',
                'card4h' => 'https://i.imgur.com/9nZfJ0c.png',
                'button1t' => 'Home',
                'button1i' => 'fa-solid fa-house',
                'button1l' => '/',
                'button2t' => 'Forum',
                'button2i' => 'fa-solid fa-comments',
                'button2l' => '/forum',
                'button3t' => 'Store',
                'button3i' => 'fa-solid fa-cart-shopping',
                'button3l' => '/store',
                'button4t' => 'Members',
                'button4i' => 'fa-solid fa-users',
                'button4l' => '/members',
                'socialLink1' => 'https://www.youtube.com/@devnexlabs',
                'socialLink2' => 'https://discord.gg/gA9YYxpEp9',
                'socialLink3' => 'https://twitter.com/devnexlabs',
                'socialLink4' => 'https://facebook.com/',
                'footerAbout' => 'Our community has been around for many years and pride ourselves on offering unbiased, critical discussion among people of all different backgrounds. We are working every day to make sure our community is one of the best.',
                'footerStyle' => 0,
                'customCSS' => '/* Aurora Template */',
                'customJS' => '// Aurora Template',
                'Keywords' => '',
                'welcomeSection' => 0,
                'welcomeHeader' => 'Welcome to Aurora',
                'welcomeDescription' => 'To join our community, please authenticate.',
                'widgetBot' => 0,
                'serverID' => '299881420891881473',
                'channelID' => '355719584830980096',
                'logoHeight' => '150',
                'logoWidth' => '40',
                'preloaderView' => 0,
                'preloaderText' => 'Loading...',
                'preloaderColor' => 'red',
                'preloaderSpeed' => 'normal',
                'preloaderStyle' => 'normal',
                'darkMode' => 0,
                'themeSwitcher' => 1,
                'bgPrimary' => '#f9fcfb',
                'bgSecondary' => '#f8fbfa',
                'bgTertiary' => '#ede9d8',
                'borderPrimary' => '#212124',
                'bgPrimaryDark' => '#070709',
                'bgSecondaryDark' => '#131416',
                'bgTertiaryDark' => '#282828',
                'borderPrimaryDark' => '#212124'
        ];
    }

    public static function ensureAllParamsExist()
    {
        $settings_data = self::getDefaultSettings();
    
        foreach ($settings_data as $key => $value) {
            $existing = DB::getInstance()->get('aurora', ['name', '=', $key])->first();
    
            if ($existing) {
                if ($existing->value === null || $existing->value === '') {
                    DB::getInstance()->update('aurora', $existing->id, ['value' => $value]);
                }
            } else {
                // doesnt exist
                DB::getInstance()->insert('aurora', [
                    'name' => $key,
                    'value' => $value
                ]);
            }
        }
    }
    
    
}