<!--
/*  Copyright (C) <2015>
*  Josh Crank - crank.5@wright.edu
*  This program is free software: you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation, either version 3 of the License, or
*  (at your option) any later version.
*
*  This program is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  You should have received a copy of the GNU General Public License
*  along with this program.  If not, see <http://www.gnu.org/licenses/>.


File Description:
This is the template for the view of the tweets page. Called via the tweet view

Dependencies:
* underscore.js

-->
<nav class="navbar navbar-inverse">
   <div class="container">

      <!-- Navbar Header -->
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a href="index.html" class="navbar-brand logo_font"><span class="first_name" >Josh</span><span class="last_name"> Crank</span></a>
      </div>

      <!-- Navbar Items -->
      <div class="collapse navbar-collapse" id="myNavbar">
         <ul class="nav navbar-nav">
            <li class="test"><a href="index.html">Home</a></li>
            <li><a href="personal.html">Personal</a></li>
           <li><a href="#">Professional</a></li>
           <li><a href="tweets.html" class="nav_active">Tweets! <span class="badge">new</span></a></li>
         </ul>
         <ul class="nav navbar-nav navbar-right nav-pills">
            <li><a href="https://www.facebook.com/JTCrank" target="_blank"><img src="images/Facebook.png" alt="Facebook Link"></a></li>
            <li><a href="https://www.linkedin.com/in/joshcrank" target="_blank"><img class="si-image" src="images/Linkedin.png" alt="Linkedin Link"></a></li>
            <li><a href="https://twitter.com/JTCrank" target="_blank"><img class="si-image" src="images/Twitter.png" alt="Twitter Link"></a></li>
            <li><a href="mailto:jt.crank121@gmail.com" target="_top"><img class="si-image" src="images/Email.png" alt="Email Link"></a></li>
         </ul>
      </div>
   </nav>

   <div class="jumbotron" id="tweet_jumbo">
      <div class="row">
         <div class="col-sm-8 col-sm-push-4">
            <h1 id="tweet_logo">@JTCrank</h1>
         </div>
         <div class="col-sm-4 col-sm-pull-8" id="twitter-banner">
            <div style="clear:both;"></div>

               <img src="images/twitter-bannerfade3.png" class="img-respnosive pull-left" id="twitter_pic">

         </div>
      </div><!-- end row -->
      <div style="clear: both;"></div>
   </div><!-- end Jumbotron -->
   <button type="button" class="btn btn-info btn-lg btn-block wide_button" id="refresh">Refresh Tweets &nbsp&nbsp<span class="glyphicon glyphicon-refresh" style="font-size: .8em;"></button>



      <% var col_num = 0;
         _.each(tweets, function(tweet) {
            if (col_num == 0) { %>
      <div class="row padded_row" style="text-align: center;">
         <div class="balance_height">
            <% } %>
            <div class="col-sm-4 tweet_container" style="margin-bottom: 15px;">
               <div class="padded_cell tweet_box">
                  <div class="tweet_user">
                     <h2><span class="glyphicon glyphicon-user" style="font-size: .8em;"></span>&nbsp&nbsp<%= tweet.user %></h2>
                  </div>
                  <div style="clear:both;"></div><br>
                  <p><div class="text-wrapper twitter-bg">
                  <?php
                     $text = '<%= tweet.text %>';

                     echo '<pre class="tweet-body">'.str_pad($text, 150).'</pre>';
                  ?>
                  </div></p><hr>
                  <h5><small>Tweeted at: <%= tweet.timestamp %></small></h5>
               </div>
            </div>
            <%
            col_num += 1;
            if (col_num == 3) {
               col_num = 0; %>
         </div>
      </div>

      <%
      }
      }); %>
</div><!-- end container -->
<script>
   var col_count = 0;
</script>
