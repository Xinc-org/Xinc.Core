<?php
/**
 * Xinc - Continuous Integration.
 * This model represents one project with its processes.
 * It is loaded from the configuration.
 *
 * PHP version 5
 *
 * @category  Development
 * @package   Xinc.Core
 * @author    Alexander Opitz <opitz.alexander@googlemail.com>
 * @copyright 2014 Alexander Opitz, Leipzig
 * @license   http://www.gnu.org/copyleft/lgpl.html GNU/LGPL, see license.php
 *            This file is part of Xinc.
 *            Xinc is free software; you can redistribute it and/or modify
 *            it under the terms of the GNU Lesser General Public License as
 *            published by the Free Software Foundation; either version 2.1 of
 *            the License, or (at your option) any later version.
 *
 *            Xinc is distributed in the hope that it will be useful,
 *            but WITHOUT ANY WARRANTY; without even the implied warranty of
 *            MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *            GNU Lesser General Public License for more details.
 *
 *            You should have received a copy of the GNU Lesser General Public
 *            License along with Xinc, write to the Free Software Foundation,
 *            Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * @link      http://code.google.com/p/xinc/
 */

namespace Xinc\Core\Models;

class Project
{
    /**
     * @var string The name of the project.
     */
    private $name;

    /**
     * @see Xinc\Core\Project\Status
     * @var integer Current status of the project
     */
    private $status = 1;

    /**
     * @see Xinc\Core\Plugin\Slot
     * @var array Used Processes
     */
    private $processes = array();

    /**
     * Sets the project name for display purposes.
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns this project's name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * sets the status of the project
     *
     * @see Xinc\Core\Project\Status
     * @param integer $status
     * @return void
     */
    public function setStatus($status)
    {
        Xinc_Logger::getInstance()->info('[project] ' . $this->getName() . ': Setting status to ' . $status);
        $this->status = $status;
    }

    /**
     * Retrieves the status of the current project
     * @see Xinc\Core\Project\Status
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Adds a process with appropriate slot to the project
     *
     * @param integer $slot
     * @param ? $process
     * @return void
     */
    public function addProcess($slot, $process)
    {
        $this->processes[$slot][] = $process;
    }
}
