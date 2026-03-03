<div class="ui fluid {if $SHADOWEFFECTS eq '0' }raised{/if} card" id="widget-latest-posts">
    <div class="content">
        <div class="ui fluid centered label" style="margin-bottom:10px;"><i class="fa-solid fa-server"></i> {$SERVER_STATUS}</div>
        <div class="description">
            {if isset($SERVER)}
                <div class="ui relaxed">
                    <div class="content">
                        {if $SERVER.status_value eq 1}
                            <span class="ui label large green">{$ONLINE}
                        {else}
                            <span class="ui label large red">{$OFFLINE}
                        {/if}
                            <div class="detail">{$SERVER.name}</div>
                        </span>

                        <div class="ui divider"></div>

                        {if $SERVER.status_value eq 1}
                            <p>
                                {$ONLINE}: <strong>{$SERVER.player_count} / {$SERVER.player_count_max}</strong>
                            </p>
                            {if isset($SERVER.format_player_list) && count($SERVER.format_player_list) && ($SERVER.player_count > 0)}
                                <p>
                                    {foreach from=$SERVER.format_player_list item=player}
                                        <a href="{$player.profile}" data-toggle="tooltip" data-content="{$player.username}">
                                            <img class="ui avatar" src="{$player.avatar}" alt="{$player.username}" />
                                        </a>
                                    {/foreach}
                                </p>
                            {/if}
                            {if isset($VERSION)}
                                <p>{$VERSION}: <strong>{$SERVER.version}</strong></p>
                            {/if}
                        {/if}
                        <p>{$IP}: <strong>{$SERVER.join_at}</strong></p>
                    </div>
                </div>
            {else}
                {$NO_SERVERS}
            {/if}
        </div>
    </div>
</div>
