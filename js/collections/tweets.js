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

-------------------------------------------------------------------------
File Description:
Collection for Tweet models.  Utilizes the get_tweets.php file for RESTful calls.

Dependencies:
* backbone.js
* models/tweet.js
* get_tweets.php
-------------------------------------------------------------------------*/

define(
   ['backbone',
    'models/tweet'],
    function( Backbone, TweetModel) {
      'use strict';

      return Backbone.Collection.extend({
         url: '/get_tweets.php',
         model: TweetModel
      });
   }
);
