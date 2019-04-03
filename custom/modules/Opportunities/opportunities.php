<?php
//ini_set('display_errors','On');
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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

	class OpportunitiesAmount {
      function TotalOpportunitiesAmount($bean, $event, $arguments){  
          $account_bean = BeanFactory::getBean('Accounts', $bean->account_id);
          $account_bean->load_relationship('opportunities');
          $opportunity_bean = $account_bean->opportunities->getBeans();

          $total_opportunities = 0;
          foreach($opportunity_bean as $opportunitybean){ 
              if($opportunitybean->deleted != '0' || $opportunitybean->sales_stage != 'Closed Lost') {
                  $total_opportunities = $total_opportunities + $opportunitybean->amount;  
              }
          }
          $account_bean->total_opportunities_c = $total_opportunities;   
          $account_bean->save();
      } 

      function deleteOpportunities($bean, $event, $arguments){    
          $account_bean = BeanFactory::getBean('Accounts', $bean->account_id);
          $account_bean->load_relationship('opportunities');
          $opportunity_bean = $account_bean->opportunities->getBeans();

          $total_opportunities = 0;
          foreach($opportunity_bean as $opportunitybean){ 
              if($opportunitybean->deleted != '0' || $opportunitybean->sales_stage != 'Closed Lost') {
                  $total_opportunities = $total_opportunities + $opportunitybean->amount;  
              }
          }
          $account_bean->total_opportunities_c = $total_opportunities;   
          $account_bean->save();
      }
  }

?>



