# fleet\_battles\_mod
FleetBattles Mod for [Eve Development Killboard] (https://github.com/evekb/evedev-kb)

##Installation
Upload the cron and mods folder to your killboard directory. The cron folder contains a Cron Job for building the fleet battles cache, the mods folder contains the actual mod.
Activate and configure the mod in ACP -> Modules.

##Changelog

#####Version 0.2.3 (2017/06/05)
* Fix: Kill Lists show kill system security status in the proper color
* Fixed a problem with setting side assignments for cached battles

#####Version 0.2.2 (2016/02/09)
* release of version 0.2.2
* fixes for compatibility with PHP 7
* added a top list showing the killboard owner's top fleet battle attendees to the Fleet Battles Overview page
 * Pre-Upgrade: Backup your database!
 * Upgrade option 1: Delete and re-add your cache table (and then re-build your cache, which might take VERY long)
 * Upgrade option 2: Execute the following SQL script on your killboard's database:
```sql
CREATE TABLE `kb3_battles_owner_pilots` (
    `battle_id` int unsigned NOT NULL,
    `plt_id` int unsigned NOT NULL,
    PRIMARY KEY (`battle_id`, `plt_id`)
) ENGINE=InnoDB";
```
* added option to manually set start- and end-time when showing related kills (no GUI support yet):
 * add GET argument starttime to specify the start time, e.g. ```&starttime=2016-01-01 00:05:00```
 * add GET argument endtime to specify the end time, eg ```&endtime=2016-01-01 00:10:00```
* Seconds portion of kill timestamps is now handled correctly, making the timeline view more informative
* made the Pod image for kills with related pod kills clickable on the Battle Overview page
* added Meta Tags providing metadata about a kill report



#####Version 0.2.1 (2012/09/15)
* release of version 0.2.1
* improved compatibility to various javascript libraries/frameworks
* ship class listing in balance of power can now be customized per ship class via css-classes (see css/style.css)
* improved performance
* added number of involved killboard owners to battle list overview (recreation of the kb3_battles_cache table is necessary!)
* added filtering options for fleet battle overview page
* fixed loot overview (count, prices)
* fixed an error where multiple engagements at the same time in different systems might interefere with side assignment and result in an empty battle report

* files affected : css\style.css; include\class.battles.php; include\class.helpers.php; js\fleetBattles.js; template\battle_balance.tpl; template\battle_setup.tpl; template\battlelisttable.tpl; battles.php; init.php; kb3_battles_cache.sql.txt; kill_related.php
* files added: js\toggleFilter.js; template\battlelisttable_filter.tpl; template\battlelisttable_stats.tpl
* files removed: js\fleetBattles.js.js; .htaccess

#####Version 0.2 (2012/04/01)
* release of version 0.2
* added possibility for admins to manuall asside sides for involved parties of a battle
* style-upgrade for Balance Of Power table
* added Damage Overview tab (credits to protoburger, thx!)
* fixed several minor bugs
* changed default sliding time from 12h to 4h
* fixed a bug in the way fleet battles are determined, please rebuild your fleet battle cache


#####Version 0.1.3 (2012/03/23)
* release of version 0.1.3
* complete code refactoring on the base of kill_related.php in EDK 4.0.4
* added kill lists tab
* added enabling/disabling of timeline, loss value lists, kill lists and loot overview to the settings
* some layout optimizations
* performance optimizations
* ship filters now apply correctly
* tabs now initialize immediately instead of waiting for images to load
* changed time line algorithm so that pod kills will always appear after the ship kill in the timeline
* AJAX-driven tab loading

Removed File: js/toggle.js

#####Version 0.1.2 (2012/03/13)
* release of version 0.1.2
* includes now a cronjob for automatic updating the fleet battles cache
* fixed minor bugs

#####Version 0.1.1 (2012/03/11)
* release of version 0.1.1
* destroyed indicator (red background) is now defined by the class .br-destroyed (defined in css/style.css)
* added "include adjacent" functionality (not (yet) available for fleet battle displaying, only for related kills atm)
* fixed displaying of pod images in battle overview

#####2012/03/11
* added support for simple urls
* fixed a wrong linkage in Battle Overview

#####2012/03/10
* fixed bug preventing map images in battle overview from displaying

#####2012/03/10
* initial version