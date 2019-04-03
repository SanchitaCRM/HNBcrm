<?php
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
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class SendEmail{    
    function sendEamilFunction($bean, $event, $arguments){
        global $db, $sugar_config;

        $id = $bean->id;
        $status = $bean->status;

        if ($status == 'Closed_Closed'){
            include_once('modules/Accounts/Account.php');
            $obj = new Account();
            $obj->retrieve($bean->account_id);
            require_once('include/SugarPHPMailer.php');
            $emailObj = new Email();
            $defaults = $emailObj->getSystemDefaultEmail();
            $mail = new SugarPHPMailer();
            $mail->setMailerForSystem();
            $mail->From =  $defaults['email'];
            $mail->FromName = $defaults['name'];
            //$subject = 'Ticket is closed';
            $subject = 'Email ack for the complaint';
            $mail->Subject = $subject;

            $mail->IsHTML(true);
          
            /*$body = <<<EOF
            <p style = "margin-bottom: 0in;"><span>Dear <strong>$bean->account_name</strong><br/></span></p>
            <p style = "margin-bottom: 0in;">&nbsp;</p>
            <p style = "margin-bottom: 0in;"><span>We hope your ticket number&nbsp; #<strong>$bean->name</strong> has been resolved. In case you face any further issues, please feel free to contact us and we will be happy to resolve it for you.<span lang = "en-US"><span style = "text-decoration: underline;"><a href = "mailto:simplecrm2@gmail.com">simplecrm2@gmail.com</a></span></span>.</span></p>
            <p style = "margin-bottom: 0in;">&nbsp;</p>
            <p style = "margin-bottom: 0in;"><span>Regards,</span></p>
            <p style = "margin-bottom: 0in;"><span>Team SimpleCRM Support</span></p>
EOF;*/
            
            $body = <<<EOF
            <p style = "margin-bottom: 0in;"><span>Dear Sir/Madam, <strong>$bean->account_name</strong>,<br/></span></p>
            <p style = "margin-bottom: 0in;">&nbsp;</p>
            <p style = "margin-bottom: 0in;"><span>Thank you for writing to Bank of Maharashtra.</p>
            <p style = "margin-bottom: 0in;">&nbsp;</p>
            <p style = "margin-bottom: 0in;"><span>This has been registered in the bank with following Reference Number - Complaint No: <strong>$bean->name</strong></p>
            <p style = "margin-bottom: 0in;">&nbsp;</p>
            <p style = "margin-bottom: 0in;"><span>We have received your feedback as : <strong>upi claim amt 500rs date 8feb 2018 CRM11021919211217995 </strong></p>
            <p style = "margin-bottom: 0in;">&nbsp;</p>
            <p style = "margin-bottom: 0in;">&nbsp;</p>
            <p style = "margin-bottom: 0in;"><span>This is system generated mail.</p>
            <p style = "margin-bottom: 0in;">&nbsp;</p>
            <p style = "margin-bottom: 0in;">&nbsp;</p>
            <p style = "margin-bottom: 0in;"><span>Regards,</span></p>
            <p style = "margin-bottom: 0in;"><span>Asst. Gen. Manager,</span></p>
            <p style = "margin-bottom: 0in;"><span>Bank of Maharashtra,</span></p>
            <p style = "margin-bottom: 0in;"><span>Head Office, Pune</span></p>
EOF;
            $mail->Body = $body;
            $mail->prepForOutbound();
            $email = $obj->email1;
            $mail->AddAddress($email);
            @$mail->Send();
        }
    }
}
?>
