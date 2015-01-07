<header>
  <div class="top-bar">
    <div class="left">
      <div class="left">
        <img class="logo" src="themes/attic/images/ATTIC_LOGO_BANNER_WHITE.png" alt="The Attic" />
      </div>
      <div class="right">
        <img src="themes/attic/images/ATTIC_EST_BANNER_WHITE.png" id="attic-established" alt="Established 2011 - Dunedin, New Zealand" />
      </div>
    </div>
    <div class="right">
      <a class="social-btn facebook" href="https://www.facebook.com/theatticdunedin"></a>
      <a class="social-btn twitter" href="https://www.twitter.com/theatticdunedin"></a>
      <a class="social-btn mail"href="mailto:theatticrattle@gmail.com"></a>
    </div>
  </div>
  <div class="bottom-bar">
      <div class="banner" style="background-image: url('<% if SinglesClub %>themes/attic/images/SINGLES_CLUB_BANNER.jpg<% else_if $SiteConfig.BannerImage %>$SiteConfig.BannerImage.url<% else %>themes/attic/images/ATTIC_BANNER_OC.jpg<% end_if %>');">
      </div>
      <% include _Navigation %>
  </div>
</header>
