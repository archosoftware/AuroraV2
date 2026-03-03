{assign var="navbarexcludeexploded" value="/"|@explode:$NAVBAREXCLUDE}
<div style="background-image:url('{$BANNER_IMAGE}'); background-size: cover; background-position: center; padding-bottom: 65px; margin-top:0 !important; border-bottom-left-radius: 85% 20%; border-bottom-right-radius: 85% 20%; position: relative;">
<div class="ui secondary small menu" id="navbar" style="background: transparent !important;">
    <a class="toc item">
        <i class="sidebar icon navbar-item" style="color:white;"></i>
    </a>
    <div class="ui container" style="justify-content: center;" id="pcnavbar">
        {foreach from=$NAV_LINKS key=name item=item}
            {if isset($item.items)}
                <div class="ui pointing dropdown link">
                    <button class="ui aurora navbar button"
                        style="cursor: pointer; color: rgba(255, 255, 255, 0.6);">{$item.icon}
                        {$item.title} <i class="dropdown icon navbar-item"></i></button>
                    <div class="menu">
                        <div class="header">{$item.title}</div>
                        {foreach from=$item.items item=dropdown}
                            {if isset($dropdown.separator)}
                                <div class="divider navbar-item"></div>
                            {else}
                                <a class="item navbar-item" href="{$dropdown.link}" target="{$dropdown.target}">
                                    {$dropdown.icon}{$dropdown.title}</a>
                            {/if}
                        {/foreach}
                    </div>
                </div>
            {else}
{if $item.title == 'Store' && $BTNENABLED == 1}
    {if !in_array($item.title, $navbarexcludeexploded)}
        <button class="ui store navbar button" onclick="location.href='{$item.link}'" style="cursor: pointer; color:white;">
            {$item.icon}{$item.title}
        </button>
    {/if}
{else}
    {if !in_array($item.title, $navbarexcludeexploded)}
        <button class="ui aurora navbar button" onclick="location.href='{$item.link}'" style="cursor: pointer; color: rgba(255, 255, 255, 0.6);">
            {$item.icon}{$item.title}
        </button>
    {/if}
{/if}            {/if}
        {/foreach}
    </div>
</div>
<div class="ui secondary small menu" id="navbar" style="background: transparent !important;">
    <div class="ui container" style="justify-content: end;">
        {foreach from=$USER_SECTION key=name item=item}
            {if isset($item.items)}
                {if ($name == "account")}
                    <a class="ui mini circular image" data-toggle="popup" data-position="bottom right" id="button-{$name}"
                        style="background: transparent !important; cursor: pointer; margin-top: -55px; color: rgba(255, 255, 255, 0.6);">{$item.icon}</a>
                {else}
                    <a class="ui small default icon button" data-toggle="popup" data-position="bottom right" id="button-{$name}"
                        style="background: transparent !important; margin-top: -55px; color: rgba(255, 255, 255, 0.6);">{$item.icon}</a>
                {/if}
                <div class="ui basic popup" style="margin-top:20px;">
                    <h4 class="ui header">{$item.title}</h4>
                    <div class="ui relaxed link list" id="list-{$name}">
                        {foreach from=$item.items item=dropdown}
                            {if isset($dropdown.separator)}
                                <div class="ui divider"></div>
                            {else}
                                {if isset($dropdown.action)}
                                    <a class="item" href="#" data-link="{$dropdown.link}" data-action="{$dropdown.action}">
                                        {$dropdown.icon} {$dropdown.title}
                                    </a>
                                {else}
                                    <a class="item" href="{$dropdown.link}" target="{$dropdown.target}">
                                        {$dropdown.icon} {$dropdown.title}
                                    </a>
                                {/if}
                            {/if}
                        {/foreach}
                    </div>
                    {if !empty($item.meta)}
                        <div class="ui link list">
                            <div class="ui divider"></div>
                            <a class="item" href="{$item.link}">{$item.meta}</a>
                        </div>
                    {/if}
                </div>
            {else}
                {if ($name == "panel")}
                    <a class="ui small primary icon button" href="{$item.link}" target="{$item.target}"
                        style="background: transparent !important; margin-top: -55px; color: rgba(255, 255, 255, 0.6);">{$item.icon}</a>
                {elseif ($name == "register")}
                    <a class="ui small default button" href="{$item.link}" target="{$item.target}"
                        style="background: transparent; margin-top: -55px; color: rgba(255, 255, 255, 0.6);">{$item.title}</a>
                {else}
                    <a class="ui small default button" href="{$item.link}" target="{$item.target}"
                        style="background: transparent; margin-top: -55px; color: rgba(255, 255, 255, 0.6);">{$item.title}</a>
                {/if}
            {/if}
        {/foreach}
    </div>
</div>
    <div class="ui stackable three column grid">
    <div class="column" style="text-align: center; margin-top: 2.8rem; display: none;" id="mobnavbar">
        <div class="ui steps">
            <div class="step" style="background: transparent; color: white; flex-direction: row;">
                {if $DISCORDVIEW eq '1'}
                    <i class="discord icon" id="dslink"></i>
                {/if}
                {if $MINECRAFTVIEW eq '1'}
                    <i class="circle play icon" onclick="copy('#ip')"></i>
                {/if}
            </div>
        </div>
    </div>
    {if $DISCORDVIEW eq '1'}
        <div class="column" style="text-align: center; margin-top: 2rem;" id="pcnavbar">
            <div class="ui steps">
                <div class="step" style="background: transparent;color: white;border: none;">
                    <i class="discord icon"></i>
                    <div class="content">
                        <div class="title" style="text-transform: uppercase;">{$DISCORD_SERVER['members']} Users Online</div>
                            <div onclick="dslinkopen()" class="ui vertical animated button">
                                <div class="hidden content">
                                    <div class="description" style="color: white;"><strong>{$CLICK_TO_JOIN}</strong>
                                    </div>
                                </div>
                                <div class="visible content">
                                    <div class="description" style="color: white;"><strong>{$DISCORD_SERVER['name']}</strong></div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    {else}
        <div class="column" id="pcnavbar"></div>
    {/if}
    <div class="column" style="text-align: center;">
        <div class="ui medium image">
           <img src="{if $LOGO_IMAGE}{$LOGO_IMAGE}{else}/core/assets/img/namelessmc_logo.png{/if}" style="cursor:pointer; display: unset; max-width: 100%; height: {if isset ($LOGOHEIGHT)}{$LOGOHEIGHT}px{else}150px{/if};">
        </div>
    </div>
    {if $MINECRAFTVIEW eq '1'}
        <div class="column" style="text-align: center; margin-top: 2rem;" id="pcnavbar">
            <div class="ui steps">
                <div class="step" style="background: transparent; color: white;">
                    <i class="circle play icon"></i>
                    <div class="content" class="ui text shape">
                        <div class="title" id="minecraftplayers" style="text-transform: uppercase;margin-top:1px;">Loading..</div>
                            <div onclick="copy('#ip')" class="ui vertical animated button">
                                <div class="hidden content">
                                    <div class="description" style="color: white;"><strong>{$CLICK_TO_COPY}</strong>
                                    </div>
                                </div>
                                <div class="visible content">
                                    <div class="description" style="color: white;"><strong>{$MINECRAFTDOMAIN}</strong></div>
                                </div>
                            </div>
                        </div>
                   </div>
                   </div>
            </div>
        {/if}
    </div>
</div> 