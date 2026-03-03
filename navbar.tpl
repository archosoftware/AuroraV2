{if $PRELOADERVIEW eq '1'}
    <div class="preloader" id="preloader">
        <div
            class="ui active {if $PRELOADERSPEED eq 'normal'}{else}{$PRELOADERSPEED}{/if} {if $PRELOADERSTYLE eq 'normal'}{else}{$PRELOADERSTYLE}{/if} {$PRELOADERCOLOR} large inverted loader">
        </div>
        <h3 style="margin-top: 100px;"><span class="ui inverted {$PRELOADERCOLOR} text">{$PRELOADERTEXT}</span></h3>
    </div>
{/if}
<div class="ui vertical inverted sidebar menu left" id="toc">
    <div class="item">
        <h3>{$SITE_NAME}</h3>
    </div>
    {foreach from=$NAV_LINKS key=name item=item}
        {if isset($item.items)}
            <div class="item">
                <div class="header">{$item.title} <span class="icon">{$item.icon}</span></div>
                <div class="menu">
                    {foreach from=$item.items item=dropdown}
                        <a class="item" href="{$dropdown.link}" target="{$dropdown.target}">{$dropdown.icon} {$dropdown.title}</a>
                    {/foreach}
                </div>
            </div>
        {else}
            <a class="item{if isset($item.active)} active{/if}" href="{$item.link}" target="{$item.target}">{$item.icon}
                {$item.title}
            </a>
        {/if}
    {/foreach}
</div>

<div class="pusher">
    <div id="wrapper">
{if $NAVBARSTYLE eq '2'}
{include file='aurora/modern_navbar.tpl'}
{else}
        <div class="ui secondary {if $NAVBARTYPE eq '0'} pointing {/if} menu" style="height: 55px;" id="navbar">
            <div class="ui container">
              {if $NAVBARSTYLE eq '0'}{if isset($LOGO_IMAGE)}<img class="ui small image" {if $LOGOWIDTH}style="width:{$LOGOWIDTH}px;"{/if} src="{$LOGO_IMAGE}" id="pcnavbar">&nbsp; {else} <h2>{$SITE_NAME} </h2> {/if}{/if}
                {foreach from=$NAV_LINKS key=name item=item}
                    {if isset($item.items)}
                        <div class="ui dropdown item">
                            {$item.icon} {$item.title}
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <div class="header">{$item.title}</div>
                                {foreach from=$item.items item=dropdown}
                                    {if isset($dropdown.separator)}
                                        <div class="divider"></div>
                                    {else}
                                        <a class="item" href="{$dropdown.link}" target="{$dropdown.target}">
                                            {$dropdown.icon} {$dropdown.title}
                                        </a>
                                    {/if}
                                {/foreach}
                            </div>
                        </div>
                    {else}
                        <a class="item{if isset($item.active)} active{/if}" href="{$item.link}" target="{$item.target}">
                            {$item.icon} {$item.title}
                        </a>
                    {/if}
                {/foreach}
                <a class="toc item">
                    <i class="sidebar icon"></i>
                </a>
                <div class="right menu">
                    {foreach from=$USER_SECTION key=name item=item}
                    {if isset($item.items)}
                    {if ($name == "account")}
                    <a class="ui medium image label" data-toggle="popup" data-position="bottom right"
                        id="button-{$name}">{$item.icon} {$item.title}</a>
                    {else}
                    <a class="ui small default icon button" data-toggle="popup" data-position="bottom right"
                        id="button-{$name}">{$item.icon}</a>
                    {/if}
                    <div class="ui wide basic popup">
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
                    <a class="ui small primary icon button" href="{$item.link}" target="{$item.target}">{$item.icon}</a>
                    {elseif ($name == "register")}
                    <a class="ui small primary button" href="{$item.link}" target="{$item.target}">{$item.title}</a>
                    {else}
                    <a class="ui small default button" href="{$item.link}" target="{$item.target}">{$item.title}</a>
                    {/if}
                    {/if}
                    {/foreach}
                </div>
            </div>
        </div>
   {if $NAVBARSTYLE eq '0'}
    <div class="ui secondary segment" style="margin-top: 0; border-radius: 0;">
       <div class="ui container">
         <div class="row">
           <div class="ui icon buttons">
              <a href="{$SOCIALLINK1}" class="ui button"><i class="fa-brands fa-youtube"></i></a>
              <a href="{$SOCIALLINK2}" class="ui button"><i class="fa-brands fa-discord"></i></a>
              <a href="{$SOCIALLINK3}" class="ui button"><i class="fa-brands fa-twitter"></i></a>
              <a href="{$SOCIALLINK4}" class="ui button"><i class="fa-brands fa-facebook"></i></a>
          </div>
          {if $DISCORDVIEW eq '1'}
           <button class="ui right floated large button" onclick="dslinkopen()" 
            data-tooltip="{$CLICK_TO_JOIN}" data-variation="mini" data-inverted="" id="pcnavbar">
           <i class="discord icon"></i>{$DISCORD_SERVER['members']} Users Online</button>
          {/if}
          {if $MINECRAFTVIEW eq '1'}
           <button class="ui right floated large button" onclick="copy('#ip')" 
            data-tooltip="{$CLICK_TO_COPY_TOOLTIP}" data-variation="mini" data-inverted="" id="pcnavbar">
           <i class="circle play icon"></i><b id="minecraftplayers">Loading</b></button>
          {/if}
       </div>
     </div>
   </div>
   {else}
  <div class="ui stackable three column grid"
    style="background-image:url('{$BANNER_IMAGE}'); padding: 45px; margin-top:0px!important; border-bottom-left-radius: 85% 20%; border-bottom-right-radius: 85% 20%;">
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
        <div class="column" style="text-align: center; margin-top: 2.8rem;" id="pcnavbar">
            <div class="ui steps">
                <div class="step" style="background: transparent;color: white;border: none;">
                    <i class="discord icon"></i>
                    <div class="content">
                        <div class="title" style="text-transform: uppercase;">{$DISCORD_SERVER['members']} Users Online</div>
                        <div class="description" onclick="dslinkopen()" style="color:white;cursor:pointer;" data-tooltip="{$CLICK_TO_JOIN}">{$DISCORD_SERVER['name']}</div>
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
                        <div class="title" id="minecraftplayers" style="text-transform: uppercase;">Loading..</div>
                        <div class="description" onclick="copy('#ip')" style="color:white;cursor:pointer;" data-tooltip="{$CLICK_TO_COPY}">{$MINECRAFTDOMAIN}</div>
                    </div>
                </div>
            </div>
        </div>
    {/if}
</div>
{/if}
{/if}
<div class="ui container">
    {if $WELCOMESECTION eq '0' && !isset($LOGGED_IN_USER)}
<div class="ui clearing segment">
  <div class="ui centered header">
    {$WELCOMEHEADER}
  <h4 class="description">
    {$WELCOMEDESCRIPTION}
  </h4>
                    <a href="/login" class="ui small button">{$LOGIN}</a>
                    <a href="/register" class="ui small primary button">{$REGISTER}</a>
  </div>
</div> 
  {/if}

            <div class="ui negative icon message" id="ie-message">
                <i class="exclamation triangle icon"></i>
                <div class="content">
                    <div class="header">
                        {$INTERNET_EXPLORER_HEADER}
                    </div>
                    <p>{$INTERNET_EXPLORER_INFO}</p>
                </div>
            </div>

            {if isset($NEW_UPDATE)}
            {if $NEW_UPDATE_URGENT eq true}
            <div class="ui negative icon message" id="update-message">
                {else}
                <div class="ui info icon message" id="update-message">
                    <i class="close icon"></i>
                    {/if}
                    <a href="{$NAMELESS_UPDATE_LINK}">
                        <i class="download icon"></i>
                    </a>
                    <div class="content">
                        <div class="header">{$NEW_UPDATE}</div>
                        <ul class="list">
                            <li>{$CURRENT_VERSION}</li>
                            <li>{$NEW_VERSION}</li>
                        </ul>
                    </div>
                </div>
                {/if}

                {if !empty($ANNOUNCEMENTS)}
                {foreach from=$ANNOUNCEMENTS item=$ANNOUNCEMENT}
                <div class="ui {if $ANNOUNCEMENT->icon} icon {/if} message announcement"
                    id="announcement-{$ANNOUNCEMENT->id}"
                    style="background-color:{$ANNOUNCEMENT->background_colour}; color:{$ANNOUNCEMENT->text_colour}">
                    {if $ANNOUNCEMENT->closable}
                    <i class="close icon"></i>
                    {/if}
                    {if $ANNOUNCEMENT->icon}
                    <i class="{$ANNOUNCEMENT->icon} icon"></i>
                    {/if}
                    <div class="content">
                        <div class="header">{$ANNOUNCEMENT->header}</div>
                        <p>{$ANNOUNCEMENT->message|escape}</p>
                    </div>
                </div>
                {/foreach}
                {/if}

                {if isset($MUST_VALIDATE_ACCOUNT)}
                <div class="ui message">
                    {$MUST_VALIDATE_ACCOUNT}
                </div>
                {/if}

                {if isset($MAINTENANCE_ENABLED)}
                <div class="ui warning message">
                    <i class="close icon"></i>
                    {$MAINTENANCE_ENABLED}
                </div>
                {/if}