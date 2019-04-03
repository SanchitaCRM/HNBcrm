<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
 *  @copyright SimpleCRM http://www.simplecrm.com.sg
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SimpleCRM <info@simplecrm.com.sg>
 */

    /*
    Create note for closed case.
    Date       : April-10-2017
    php version : 5.6
    */
	class RandomNumberGenerator {
		function randomNumber($bean, $event, $arguments){
      global $db;
      $sql = "SELECT count(id) as total FROM cases";
      $result = $db->query($sql);
      $row = $db->fetchByAssoc($result);
      $ticketNumber = $row['total'];
      $text = 'HNB - ';
      if(empty($ticketNumber)) {
        $bean->name = $text.str_pad($ticketNumber, 5, '0', STR_PAD_LEFT);
      } else {
        $bean->name = $text.str_pad(++$ticketNumber, 5, '0', STR_PAD_LEFT);
      } 
    }	
	}
?>
