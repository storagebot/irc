<?php
/*
 -------------------------------------------------------------------------
 irc plugin for GLPI
 Copyright (C) 2017 by the irc Development Team.

 https://github.com/pluginsGLPI/irc
 -------------------------------------------------------------------------

 LICENSE

 This file is part of irc.

 irc is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 irc is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with irc. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

define('PLUGIN_IRC_VERSION', '0.0.1');

/**
 * Init hooks of the plugin.
 * REQUIRED
 *
 * @return void
 */
function plugin_init_irc() {
   global $PLUGIN_HOOKS;
   $plugin = new Plugin();

   $PLUGIN_HOOKS['csrf_compliant']['irc'] = true;

   if ($plugin->isActivated('irc')) {
      NotificationTemplateTemplate::registerMode(
         NotificationTemplateTemplate::MODE_IRC,
         __('IRC', 'plugin_irc'),
         'irc'
      );
   }
}


/**
 * Get the name and the version of the plugin
 * REQUIRED
 *
 * @return array
 */
function plugin_version_irc() {
   return [
      'name'           => 'irc',
      'version'        => PLUGIN_IRC_VERSION,
      'author'         => '<a href="http://www.teclib.com">Teclib\'</a>',
      'license'        => '',
      'homepage'       => '',
      'minGlpiVersion' => '9.2'
   ];
}

/**
 * Check pre-requisites before install
 * OPTIONNAL, but recommanded
 *
 * @return boolean
 */
function plugin_irc_check_prerequisites() {
   // Strict version check (could be less strict, or could allow various version)
   if (version_compare(GLPI_VERSION, '9.2', 'lt')) {
      if (method_exists('Plugin', 'messageIncompatible')) {
         echo Plugin::messageIncompatible('core', '9.2');
      } else {
         echo "This plugin requires GLPI >= 9.2";
      }
      return false;
   }
   return true;
}

/**
 * Check configuration process
 *
 * @param boolean $verbose Whether to display message on failure. Defaults to false
 *
 * @return boolean
 */
function plugin_irc_check_config($verbose = false) {
   if (true) { // Your configuration check
      return true;
   }

   if ($verbose) {
      _e('Installed / not configured', 'irc');
   }
   return false;
}
