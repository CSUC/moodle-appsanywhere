<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


/**
 *
 * Settings for AppsAnywhere
 *
 * @package    mod_appsanywhere
 * @copyright  2020 Consorci de Serveis Universitaris de Catalunya CSUC
 * @author     Miguel Angel Flores (miguel [dot] angel [dot] flores [at] csuc [dot] cat)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    global $SITE;

    $settings->add(new admin_setting_configtext ('appsanywhere/serverurl',
        get_string('url', 'appsanywhere'),
        get_string('configurl', 'appsanywhere'), 'https://www.software2.com'));

    $param = new stdClass();
    $param->csuclogo = $CFG->wwwroot.'/mod/appsanywhere/pix/csuc.png';
    $param->csucurl = 'http://csuc.cat';
    $param->s2url = 'https://www.software2.com/appsanywhere';

    $settings->add(new admin_setting_heading('appsanywhere/intro', '',
                    get_string('abouts2hub', 'appsanywhere', $param)));
}

