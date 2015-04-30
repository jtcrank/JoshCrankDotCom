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
This is the view for the Tweet page. It initializes the collection, makes the
RESTful call for the collection, appends the template, and allows for updates
without reloading the page.

Dependencies:
* backbone.js
* underscore.js
* models/tweet.js
* collections/tweets.js
* tweet.php template
-------------------------------------------------------------------------*/

define(
   ['backbone', 'models/tweet', 'collections/tweets', 'text!templates/tweet.php'],
   function(Backbone, TweetModel, TweetCollection, TweetTemplate) {
      return Backbone.View.extend({
         el: $('#twitter'),
//
         template: _.template(TweetTemplate),

         events: {
            'click #new_tweet': 'update',
            'click #refresh'  : 'initialize'
         },

         initialize: function()
         {
            var self = this;

            tweets = new TweetCollection();

            tweets.fetch({
               success: function(collection) {
                  self.TweetCollection = collection;
                  self.render();
                },
                error: function() {
                    alert('Error in fetch!');
                }
            });

            self.render();
         },

         update: function()
         {
            var self = this;
            var form = this.$el.find('#tweet_form');
            var new_t = new TweetModel({text: form.find('#twext').val()});
            new_t.save(null, {
               success: function() {
                  self.initialize();
               },
               error: function(child, response){
                  alert(response.responseJSON.msg);
               }
            });
            return false;
         },

         render: function()
         {
            this.$el.html(this.template({ tweets: tweets.toJSON() }));
            return this;
         }

      });
   }
);
