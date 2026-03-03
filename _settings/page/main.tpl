<div class="container">
{if $updateRequired}
<div class="alert alert-danger" role="alert">
  <div class="alert-content">
    <h4 class="alert-title"><i class="fas fa-exclamation-triangle"></i> {$AURORA_OUTDATED}</h4>
    <p>{$AURORA_OUTDATED_INFO}</p>
  </div>
</div>
{/if}

  <div class="row justify-content-center">
    <div class="btn-group" role="group">
      <a href="https://wiki.archosoftware.com/aurora-namelessmc" target="_blank" class="btn btn-info">
        <i class="fas fa-book"></i> <span class="d-none d-md-inline">Wiki</span>
      </a>
      <a href="https://archosoftware.com/discord" target="_blank" class="btn btn-primary">
        <i class="fab fa-discord"></i> <span class="d-none d-md-inline">Discord</span>
      </a>
      <a href="https://youtube.com/@bijjuxd" target="_blank" class="btn btn-danger">
        <i class="fab fa-youtube"></i> <span class="d-none d-md-inline">YouTube</span>
      </a>
      <a href="https://ko-fi.com/reviactyl" target="_blank" class="btn" style="background-color:pink">
        <i class="fas fa-heart"></i> <span class="d-none d-md-inline">Donate</span>
      </a>
    </div>
  </div>
</div>

</div>
</div>

<!-- Page Content -->
<div class="row">
    <div class="col-sm-3">
        {include file="{$TPL_PATH}navigation.tpl"}
    </div>

    <div class="col-sm-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade {if empty($TPL_NAME_SESSION) or $TPL_NAME_SESSION eq 'home'}show active{/if}"
                id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                {include file="{$TPL_PATH}home.tpl"}
            </div>
            <div class="tab-pane fade {if $TPL_NAME_SESSION eq 'theme'}show active{/if}" id="v-pills-theme"
                role="tabpanel" aria-labelledby="v-pills-theme-tab">
                {include file="{$TPL_PATH}theme.tpl"}
            </div>
            <div class="tab-pane fade {if $TPL_NAME_SESSION eq 'colours'}show active{/if}" id="v-pills-colours"
                role="tabpanel" aria-labelledby="v-pills-colours-tab">
                {include file="{$TPL_PATH}colours.tpl"}
            </div>
            <div class="tab-pane fade {if $TPL_NAME_SESSION eq 'navbar'}show active{/if}" id="v-pills-navbar"
                role="tabpanel" aria-labelledby="v-pills-navbar-tab">
                {include file="{$TPL_PATH}navbar.tpl"}
            </div>
            <div class="tab-pane fade {if $TPL_NAME_SESSION eq 'connections'}show active{/if}" id="v-pills-connections"
                role="tabpanel" aria-labelledby="v-pills-connections-tab">
                {include file="{$TPL_PATH}connections.tpl"}
            </div>
            <div class="tab-pane fade {if $TPL_NAME_SESSION eq 'addons'}show active{/if}" id="v-pills-addons"
                role="tabpanel" aria-labelledby="v-pills-addons-tab">
                {include file="{$TPL_PATH}addons.tpl"}
            </div>
            <div class="tab-pane fade {if $TPL_NAME_SESSION eq 'cardcontent'}show active{/if}" id="v-pills-cardcontent"
                role="tabpanel" aria-labelledby="v-pills-cardcontent-tab">
                {include file="{$TPL_PATH}cards.tpl"}
            </div>

            <div class="tab-pane fade {if $TPL_NAME_SESSION eq 'portal'}show active{/if}" id="v-pills-portal"
                role="tabpanel" aria-labelledby="v-pills-portal-tab">
                {include file="{$TPL_PATH}portal.tpl"}
            </div>

            <div class="tab-pane fade {if $TPL_NAME_SESSION eq 'welcome'}show active{/if}" id="v-pills-welcome"
                role="tabpanel" aria-labelledby="v-pills-welcome-tab">
                {include file="{$TPL_PATH}welcome.tpl"}
            </div>

            <div class="tab-pane fade {if $TPL_NAME_SESSION eq 'footer'}show active{/if}" id="v-pills-footer"
                role="tabpanel" aria-labelledby="v-pills-footer-tab">
                {include file="{$TPL_PATH}footer.tpl"}
            </div>
            <div class="tab-pane fade {if $TPL_NAME_SESSION eq 'custom'}show active{/if}" id="v-pills-custom"
                role="tabpanel" aria-labelledby="v-pills-custom-tab">
                {include file="{$TPL_PATH}custom.tpl"}
            </div>
            <div class="tab-pane fade {if $TPL_NAME_SESSION eq 'seo'}show active{/if}" id="v-pills-seo"
                role="tabpanel" aria-labelledby="v-pills-seo-tab">
                {include file="{$TPL_PATH}seo.tpl"}
            </div>
            <div class="tab-pane fade {if $TPL_NAME_SESSION eq 'about'}show active{/if}" id="v-pills-about"
                role="tabpanel" aria-labelledby="v-pills-about-tab">
                {include file="{$TPL_PATH}about.tpl"}
            </div>
        </div>
    </div>
</div>

