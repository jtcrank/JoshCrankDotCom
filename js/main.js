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
<<<<<<<< DEPRICATED >>>>>>>>>>
-------------------------------------------------------------------------*/
requirejs.config({
   paths: {
      jquery:     'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min',
      bootstrap:  'http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.mins',
      underscore: 'libs/underscore',
      backbone:   'libs/backbone',
      text:       'libs/text'
   },

   shim: {
      underscore: {
         exports: '_'
      },
      backbone: {
         deps: ['underscore', 'jquery'],
         exports: 'Backbone'
      }
   }
});

requirejs(
      ['backbone', 'collections/tweets', 'models/tweet', 'views/tweets'],
      function (Backbone, TweetCollection, TweetModel, TweetsView){
         'use strict';

         var view = new TweetsView();
      }
);
