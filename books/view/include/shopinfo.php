  <div id="shop_info">
    <div id="shop_info_wrap">
      <div class="container_12">
        <div id="shop_description" class="grid_3">
          <h2>Books</h2>
          <p>Pellentesque a arcu ut nisi semper cursus. Nullam vehicula dapibus ultrices. Integer nunc risus, fringilla ut hendrerit a, dapibus vestibulum ante. In ullamcorper erat et orci mattis rutrum et a enim. Curabitur semper, erat sit amet condimentum volutpat, enim nisi auctor augue, id fringilla est dui non lectus. Cras in urna ante, sit amet dignissim orci. Proin nibh urna, consectetur vitae placerat luctus.</p>
        </div>
        <div id="shop_contacts" class="grid_3">
          <h2>Contact Us</h2>
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td valign="middle"><span class="s_icon_32"><span class="s_icon s_phone_32"></span>5234452 <br /></span></td>
            </tr>
            <tr>
              <td valign="middle"><span class="s_icon_32"><span class="s_icon s_mail_32"></span>pinko@example.com <br /> pinko@example.com</span></td>
            </tr>
            <tr>
              <td valign="middle"><span class="s_icon_32"><span class="s_icon s_skype_32"></span>my_skype <br /> </span></td>
            </tr>
          </table>
        </div>
        <div id="twitter" class="grid_3">
          <h2>Twitter</h2>
          <ul id="twitter_update_list"><li></li></ul>
            <div class="twitter-container">

            <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a>
            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

<!-- <a class="twitter-timeline" data-dnt="true" data-lang="ru" data-theme="dark" data-tweet-limit="3" data-chrome="noheader nofooter noborders noscrollbar transparent" href="https://twitter.com/sad_pingved"  data-widget-id="430050879">Твиты пользователя @sad_pingved</a> -->
</div>
            <script type="text/javascript" charset="utf-8">
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
    $(function () {      
        var $cont = $(".twitter-container"),
        prd = setInterval(function () {
            if ($cont.find("> iframe").contents().find(".twitter-timeline").length > 0) {
                var $body = $cont.find("> iframe").contents().find("body");
                clearInterval(prd)
                $body.attr("id", "twitterStyled")
                .append($("#twitterStyle"));
            }
        }, 100);
    });
            </script>
        </div>
        <div id="facebook" class="grid_3">
          <h2>VK</h2>
          <div class="s_widget_holder">
            

<!-- VK Widget -->

          </div>
<div id="vk_groups"></div>
<script type="text/javascript">
VK.Widgets.Group("vk_groups", {mode: 4, no_cover: 1, height: "100"}, 54315157);
</script>

        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>