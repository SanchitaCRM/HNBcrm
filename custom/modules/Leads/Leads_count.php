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

	class LeadDaysCount {

		function LeadCountNumberOfDays($bean, $event, $arguments){       
      $dt = new DateTime($bean->date_entered);
      $datetime1 = $dt->format('Y-m-d');      
      $date1 = date_create($datetime1);
      $date2 = date_create(date('Y-m-d'));
      $diff = date_diff($date1,$date2);
      
      if($diff->days == '') {
        $bean->lead_days_c = 0;       
      } else {
        $bean->lead_days_c = $diff->days;
      }     
    } 
  }

?>



