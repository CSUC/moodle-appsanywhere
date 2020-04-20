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
 *
 * @package    mod_appsanywhere
 * @copyright  2017 Consorci de Serveis Universitaris de Catalunya CSUC
 * @author     Miguel Angel Flores (miguel [dot] angel [dot] flores [at] csuc [dot] cat)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Replace appsanywhere with the name of your module and remove this line.

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT); // Course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // appsanywhere instance ID - it should be named as the first character of the module.

if ($id) {
    $cm         = get_coursemodule_from_id('appsanywhere', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $appsanywhere  = $DB->get_record('appsanywhere', array('id' => $cm->instance), '*', MUST_EXIST);
} else if ($n) {
    $appsanywhere  = $DB->get_record('appsanywhere', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $appsanywhere->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('appsanywhere', $appsanywhere->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);

$event = \mod_appsanywhere\event\course_module_viewed::create(array(
    'objectid' => $PAGE->cm->instance,
    'context' => $PAGE->context,
));
$event->add_record_snapshot('course', $PAGE->course);
$event->add_record_snapshot($PAGE->cm->modname, $appsanywhere);
$event->trigger();

// Print the page header.

$PAGE->set_url('/mod/appsanywhere/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($appsanywhere->name));
$PAGE->set_heading(format_string($course->fullname));

// Output starts here.
echo $OUTPUT->header();

// Conditions to show the intro can change to look for own settings or whatever.
if ($appsanywhere->intro) {
    echo $OUTPUT->box(format_module_intro('appsanywhere', $appsanywhere, $cm->id), 'generalbox mod_introbox', 'appsanywhereintro');
}

$renderer = $PAGE->get_renderer('mod_appsanywhere');

$bc = new block_contents();
$bc->content = $renderer->display_appsanywhere_detail($appsanywhere, $id);
$bc->title = get_string('appsanywherelaunch', 'appsanywhere');


echo $OUTPUT->block($bc, BLOCK_POS_LEFT);

// Finish the page.
echo $OUTPUT->footer();
