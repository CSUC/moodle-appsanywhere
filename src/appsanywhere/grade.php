<?php
/** This file is part of AppsAnywhere plugin.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 *
 *
 * @package    mod_appsanywhere
 * @copyright  2017 Consorci de Serveis Universitaris de Catalunya CSUC
 * @author     Miguel Angel Flores (miguel [dot] angel [dot] flores [at] csuc [dot] cat)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . "../../../config.php");

$id = required_param('id', PARAM_INT);// Course module ID.
/** Item number may be != 0 for activities that allow more than one grade per user. */
$itemnumber = optional_param('itemnumber', 0, PARAM_INT);
$userid = optional_param('userid', 0, PARAM_INT); /** Graded user ID (optional). */

/** In the simplest case just redirect to the view page. */
redirect('view.php?id='.$id);
